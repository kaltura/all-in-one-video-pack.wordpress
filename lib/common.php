<?php
class KalturaWordpressLogger 
{
	function log($str) 
	{
		//print ($str . "<br />\n");
	}
}

function kalturaGetServiceConfiguration() 
{
	$partnerId = get_option('kaltura_partner_id');
	$subPartnerId = get_option('kaltura_subp_id');
	$config = new KalturaConfiguration($partnerId, $subPartnerId);
	$config->serviceUrl = kalturaGetServerUrl();
	$config->setLogger(new KalturaWordpressLogger());
	return $config;
}

function kalturaGetServerUrl() 
{
	$url = KALTURA_SERVER_URL;

	// remove the last slash from the url
	if (substr($url, strlen($url) - 1, 1) == '/')
		$url = substr($url, 0, strlen($url) - 1);
		
	return $url;
}

function kalturaGetCdnUrl() 
{
	$url = KALTURA_CDN_URL;
	
	// remove the last slash from the url
	if (substr($url, strlen($url) - 1, 1) == '/')
		$url = substr($url, 0, strlen($url) - 1);
		
	return $url;
}

function kalturaGetSessionUser() 
{
	global $user_ID, $user_identity;
	$kaltura_user = new KalturaSessionUser();
	
	if (!$user_ID) {
		$kaltura_user->userId = KALTURA_ANONYMOUS_USER_ID; 
		return $kaltura_user;
	}
	
	$kaltura_user->userId = $user_ID;
	$kaltura_user->screenName = $user_identity;
	return $kaltura_user;
}

function kalturaGetPluginUrl() 
{
	$plugin_name = plugin_basename(__FILE__);   
	$indx = strpos($plugin_name, "/");
	$plugin_dir = substr($plugin_name, 0, $indx);
	$plugin_url = get_settings('siteurl') . '/wp-content/plugins/' . $plugin_dir;
	return $plugin_url;
}

function getKalturaClient($isAdmin = false, $privileges = null)
{
	// get the configuration to use the kaltura client
	$kalturaConfig = kalturaGetServiceConfiguration();
	
	// inititialize the kaltura client using the above configurations
	$kalturaClient = new KalturaClient($kalturaConfig);

	// get the current logged in user
	$sessionUser = kalturaGetSessionUser();
	
	if ($isAdmin)
	{
		$adminSecret = get_option("kaltura_admin_secret");
		$result = $kalturaClient->startsession($sessionUser, $adminSecret, true, $privileges);
	}
	else
	{
		$secret = get_option("kaltura_secret");
		$result = $kalturaClient->startsession($sessionUser, $secret, false, $privileges);
	}
		
	if (count(@$result["error"]))
	{
		return null;
	}
	else
	{
		// now lets get the session key
		$session = $result["result"]["ks"];
		
		// set the session so we can use other service methods
		$kalturaClient->setKs($session);
	}
	
	return $kalturaClient;
}
	
function kalturaGenerateTabUrl($params) 
{
	$url = $_SERVER["REQUEST_URI"];
	
	if (!@$params["kaction"])
		$params["kaction"] = null;
		
	if (!@$params["sendtoeditor"])
		$params["sendtoeditor"] = null;
		
	if (!@$params["kshowid"])
		$params["kshowid"] = null;

	if (!@$params["paged"])
		$params["paged"] = null;
		
	if (!@$params["firstedit"])
		$params["firstedit"] = null;
		
	return add_query_arg($params, $url, null);
}

function kalturaGetRequestUrl()
{
	return $_SERVER["REQUEST_URI"];
}

?>