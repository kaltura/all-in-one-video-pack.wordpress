<?php
/*
This file is part of the Kaltura Collaborative Media Suite which allows users
to do with audio, video, and animation what Wiki platfroms allow them to do with
text.

Copyright (C) 2006-2008 Kaltura Inc.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

define("KALTURA_API_VERSION", "0.7");
define("KALTURA_SERVICE_FORMAT_JSON", "1");
define("KALTURA_SERVICE_FORMAT_XML", "2");
define("KALTURA_SERVICE_FORMAT_PHP", "3");

class KalturaClientBase 
{

	/**
	 * @var KalturaConfiguration
	 */
	var $config;
	
	/**
	 * @var string
	 */
	var $ks;
	
	/**
	 * @var boolean
	 */
	var $shouldLog = false;
	
	/**
	 * Kaltura client constuctor, expecting configuration object 
	 *
	 * @param KalturaConfiguration $config
	 */
	function KalturaClientBase($config)
	{
		$this->config = $config;
		
		$logger = $this->config->getLogger();
		if ($logger)
		{
			$this->shouldLog = true;	
		}
	}
	
	function http_parse_query($array = null, $convention = "%s")
	{
		if( !$array || count( $array ) == 0 )
	        return ''; 
	        
		$query = ''; 
     
		foreach( $array as $key => $value )
		{
		    if( is_array( $value ) )
		    { 
				$new_convention = sprintf( $convention, $key ) . '[%s]'; 
			    $query .= http_parse_query( $value, $new_convention ); 
			} else { 
			    $key = urlencode( $key ); 
			    $value = urlencode( $value ); 
         
			    $query .= sprintf( $convention, $key ) . "=$value&"; 
            } 
		} 
 
		return $query; 
	}
		
	function do_post_request($url, $data, $optional_headers = null)
	{
		if (!function_exists('fsockopen'))
			return null;
		$start = strpos($url,'//')+2;
		$end = strpos($url,'/',$start);
		$host = substr($url, $start, $end-$start);
		$domain = substr($url,$end);
		$fp = fsockopen($host, 80);
		if(!$fp) return null;
		fputs ($fp,"POST $domain HTTP/1.1\n");
		fputs ($fp,"Host: $host\n");
		if ($optional_headers) {
			fputs($fp, $optional_headers);
		}
		fputs ($fp,"Content-type: application/x-www-form-urlencoded\n");
		fputs ($fp,"Content-length: ".strlen($data)."\n\n");
		fputs ($fp,"$data\n\n");
		
		$response = "";
		while(!feof($fp)) {
			$response .= fread($fp, 32768);
		}
	
		$pos = strpos($response, "\r\n\r\n");
		if ($pos)
			$response = substr($response, $pos + 4);
		else
			$response = "";
			
		fclose ($fp);
		return $response;
	}
	
	function hit($method, $session_user, $params)
	{
		$start_time = microtime(true);
		
		$this->log("service url: [" . $this->config->serviceUrl . "]");
		$this->log("trying to call method: [" . $method . "] for user id: [" . $session_user->userId . "] using session: [" .$this->ks . "]");
		
		// append the basic params
		$params["kaltura_api_version"] 	= KALTURA_API_VERSION;
		$params["partner_id"] 			= $this->config->partnerId;
		$params["subp_id"] 				= $this->config->subPartnerId;
		$params["format"] 				= $this->config->format;
		$params["uid"] 					= $session_user->userId;
		$this->addOptionalParam($params, "user_name", $session_user->screenName);
		$this->addOptionalParam($params, "ks", $this->ks);
		
		$url = $this->config->serviceUrl . "/index.php/partnerservices2/" . $method;
		$this->log("full reqeust url: [" . $url . "]");
		
		if (function_exists("curl_init"))
		{
			$this->log("using curl");
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERAGENT, "Kaltura PHP4 Client (API version ".KALTURA_API_VERSION."; curl; PHP ".phpversion().")");
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			
			$signature = $this->signature($params);
			$params["kalsig"] = $signature;
			
			$http_result = curl_exec($ch);
			
			$curl_error = curl_error($ch);
		}
		else
		{
			$this->log("not using curl");
			$curl_error = "";
			$params_string = $this->http_parse_query($params);

			$http_result = $this->do_post_request($url, $params_string);
		}
		
		if ($curl_error)
		{
			$result["error"] = array(array("code" => "CURL_ERROR", "desc" => $curl_error));
		}
		else 
		{
			$this->log("result (serialized): [" . $http_result . "]");
			
			if ($this->config->format == KALTURA_SERVICE_FORMAT_PHP)
			{
				$result = @unserialize($http_result);
				
				if (!$result) {
					$result["result"] = null;
					
					$result["error"] = array(array("code" => "SERIALIZE_ERROR", "desc"=>"failed to serialize server result"));
				}
				
				//$dump = print_r($result, true);
				//$this->log("result (object dump): " . $dump);
			}
			else
			{
				$result["error"] = array(array("code" => "UNSUPPORTED_FORMAT", "desc"=>"unsuppoted format [". $this->config->format . "]"));
			}
		}
		
		$end_time = microtime (true);
		
		$this->log("execution time for method [" . $method . "]: [" . ($end_time - $start_time) . "]");
		
		return $result;
	}

	function start($session_user, $secret, $admin = null, $privileges = null, $expiry = 86400)
	{
		$result = $this->startsession($session_user, $secret, $admin, $privileges, $expiry);

		$this->ks = @$result["result"]["ks"];
		return $result;
	}
	
	function signature($params)
	{
		ksort($params);
		$str = "";
		foreach ($params as $k => $v)
		{
			$str .= $k.$v;
		}
		return md5($str);
	}
		
	function getKs()
	{
		return $this->ks;
	}
	
	function setKs($ks)
	{
		$this->ks = $ks;
	}
	
	function addOptionalParam(&$params, $paramName, $paramValue)
	{
		if ($paramValue !== null)
		{
			$params[$paramName] = $paramValue;
		}
	}
	
	function log($msg)
	{
		if ($this->shouldLog)
		{
			$logger = $this->config->getLogger();
			$logger->log($msg);
		}
	}
}

class KalturaSessionUser
{
	var $userId;
	var $screenName;
}

class KalturaConfiguration
{
	var $logger;

	var $serviceUrl    = "http://www.kaltura.com";
	var $format        = KALTURA_SERVICE_FORMAT_PHP;
	var $partnerId     = null;
	var $subPartnerId  = null;
	
	/**
	 * Constructs new kaltura configuration object, expecting partner id & sub partner id
	 *
	 * @param int $partnerId
	 * @param int $subPartnerId
	 */
	function KalturaConfiguration($partnerId, $subPartnerId)
	{
		$this->partnerId 	= $partnerId;
		$this->subPartnerId = $subPartnerId;
	}
	
	/**
	 * Set logger to get kaltura client debug logs
	 *
	 * @param IKalturaLogger $log
	 */
	function setLogger($log)
	{
		$this->logger = $log;
	}
	
	/**
	 * Gets the logger (Internal client use)
	 *
	 * @return unknown
	 */
	function getLogger()
	{
		return $this->logger;
	}
}

/**
 * Implement to get kaltura client logs
 *
 */
class IKalturaLogger 
{
	function log($msg) {}
}


?>