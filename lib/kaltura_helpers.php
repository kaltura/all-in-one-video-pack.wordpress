<?php
class KalturaHelpers
{
    function getKalturaConfiguration() 
    {
    	$config = new KalturaConfiguration(get_option("kaltura_partner_id"));
    	$config->serviceUrl = KalturaHelpers::getServerUrl();
    	require_once("kaltura_wordpress_logger.php");
    	$config->setLogger(new KalturaWordpressLogger());
    	return $config;
    }
    
    function getServerUrl() 
    {
    	$url = KALTURA_SERVER_URL;
    
    	// remove the last slash from the url
    	if (substr($url, strlen($url) - 1, 1) == '/')
    		$url = substr($url, 0, strlen($url) - 1);
    		
    	return $url;
    }
    
   
    function getCdnUrl() 
    {
    	$url = KALTURA_CDN_URL;
    	
    	// remove the last slash from the url
    	if (substr($url, strlen($url) - 1, 1) == '/')
    		$url = substr($url, 0, strlen($url) - 1);
    		
    	return $url;
    }
    
    function getLoggedUserId() 
    {
    	global $user_ID, $user_identity;
    	
    	if (!$user_ID) 
    		return KALTURA_ANONYMOUS_USER_ID; 
    	else
        	return $user_ID;
    }
    
    function getPluginUrl() 
    {
    	$plugin_name = plugin_basename(__FILE__);   
    	$indx = strpos($plugin_name, "/");
    	$plugin_dir = substr($plugin_name, 0, $indx);
    	$plugin_url = get_settings('siteurl') . '/wp-content/plugins/' . $plugin_dir;
    	return $plugin_url;
    }
    
    function generateTabUrl($params) 
    {
    	$url = $_SERVER["REQUEST_URI"];
    	
    	if (!isset($params["kaction"]))
    		$params["kaction"] = null;
    		
    	if (!isset($params["sendtoeditor"]))
    		$params["sendtoeditor"] = null;
    		
    	if (!isset($params["entryid"]))
    		$params["entryid"] = null;
    
    	if (!isset($params["paged"]))
    		$params["paged"] = null;
    		
    	if (!isset($params["firstedit"]))
    		$params["firstedit"] = null;
    		
		if (!isset($params["kaltura_entry_type"]))
    		$params["kaltura_entry_type"] = null;
    		
    	return add_query_arg($params, $url, null);
    }
    
    function getRequestUrl()
    {
    	return $_SERVER["REQUEST_URI"];
    }

	function getContributionWizardFlashVars($ks, $entryId = null)
	{
		$flashVars = array();
		$flashVars["userId"] 		= KalturaHelpers::getLoggedUserId();
		$flashVars["sessionId"] 	= $ks;
		$flashVars["partnerId"] 	= get_option("kaltura_partner_id");
		$flashVars["subPartnerId"] 	= get_option("kaltura_partner_id") * 100;
		if ($entryId)
    		$flashVars["kshowId"] 		= "entry-".$entryId;
		else
			$flashVars["kshowId"] 		= "-2";
		$flashVars["afterAddentry"] = "onContributionWizardAfterAddEntry";
		$flashVars["close"] 		= "onContributionWizardClose";
		$flashVars["termsOfUse"] 	= "http://corp.kaltura.com/static/tandc" ;
		
		return $flashVars;
	}
	
	function getSimpleEditorFlashVars($ks, $entryId)
	{
		$flashVars = array();
		$flashVars["entryId"] 		= $entryId;
		$flashVars["kshowId"] 		= "entry-".$entryId;
		$flashVars["partnerId"] 	= get_option("kaltura_partner_id");
		$flashVars["subpId"] 		= get_option("kaltura_partner_id") * 100;
		$flashVars["uid"] 		    = KalturaHelpers::getLoggedUserId();
		$flashVars["ks"] 			= $ks;
		$flashVars["backF"] 		= "onSimpleEditorBackClick";
		$flashVars["saveF"] 		= "onSimpleEditorSaveClick";
		
		return $flashVars;
	}
	
	function getKalturaPlayerFlashVars($uiConfId = null, $ks = null, $entryId = null)
	{
		$flashVars = array();
		$flashVars["partnerId"] 	= get_option("kaltura_partner_id");
		$flashVars["subpId"] 		= get_option("kaltura_partner_id") * 100;
		$flashVars["uid"] 		    = KalturaHelpers::getLoggedUserId();
		
		if ($ks)
		    $flashVars["ks"] 		= $ks;
	    if ($uiConfId)
	        $flashVars["uiConfId"] 	= $ks;
        if ($entryId)
            $flashVars["entryId"] 	= $entryId;
		
		return $flashVars;
	}
	
	function flashVarsToString($flashVars)
	{
		$flashVarsStr = "";
		foreach($flashVars as $key => $value)
		{
			$flashVarsStr .= ($key . "=" . $value . "&"); 
		}
		return substr($flashVarsStr, 0, strlen($flashVarsStr) - 1);
	}
	
	function getSwfUrlForBaseWidget($type) 
	{
		$player = KalturaHelpers::getPlayerByType($type);
		return KalturaHelpers::getServerUrl() . "/index.php/kwidget/wid/_" . get_option("kaltura_partner_id") . "/ui_conf_id/" . $player["uiConfId"];
	}
	
	function getSwfUrlForWidget($widgetId = null, $uiConfId = null)
	{
	    if (!$widgetId)
	        $widgetId = "_" . get_option("kaltura_partner_id");
	        
	    $url = KalturaHelpers::getServerUrl() . "/index.php/kwidget/wid/" . $widgetId;
	    if ($uiConfId)
	        $url .= ("/ui_conf_id/" . $uiConfId);
	        
		return $url;
	}
	
	function getContributionWizardUrl($uiConfId)
	{
		return KalturaHelpers::getServerUrl() . "/kse/ui_conf_id/" . $uiConfId;
	}
	
	function getSimpleEditorUrl($uiConfId)
	{
		return KalturaHelpers::getServerUrl() . "/kcw/ui_conf_id/" . $uiConfId;
	}

	function userCanEdit($override = null) {
		global $current_user;

		$roles = array();
		foreach($current_user->roles as $key => $val)
			$roles[$val] = 1;
			 
		if ($override === null) 
			$permissionsEdit = @get_option('kaltura_permissions_edit');
		else
			$permissionsEdit = $override;
		// note - there are no breaks in the switch (code should jump to next case)
		switch($permissionsEdit)
		{
			case "0":
				return true;
			case "1":
				if (@$roles["subscriber"])
					return true;
			case "2":
				if (@$roles["editor"])
					return true;
				else if (@$roles["author"])
					return true;
				else if (@$roles["contributor"])
					return true;
			case "3":
				if (@$roles["administrator"])
					return true;
		}
		
		return false;
	}

	function userCanAdd($override = null) {
		global $current_user;
		
		$roles = array();
		foreach($current_user->roles as $key => $val)
			$roles[$val] = 1;
		
		if ($override === null)
			$permissionsAdd = @get_option('kaltura_permissions_add');
		else
			$permissionsAdd = $override;
			
		// note - there are no breaks in the switch (code should jump to next case)
		switch($permissionsAdd)
		{
			case "0":
				return true;
			case "1":
				if (@$roles["subscriber"])
					return true;
			case "2":
				if (@$roles["editor"])
					return true;
				else if (@$roles["author"])
					return true;
				else if (@$roles["contributor"])
					return true;
			case "3":
				if (@$roles["administrator"])
					return true;
		}
		return false;
	}

	function anonymousCommentsAllowed()
	{
		return @get_option("kaltura_allow_anonymous_comments") == true ? true : false;
	}
	
	function videoCommentsEnabled()
	{
		return @get_option("kaltura_enable_video_comments") == true ? true : false;
	}
	
	function getThumbnailUrl($widgetId = null, $entryId = null, $width = 240, $height= 180, $version = 100000)
	{
		$config = KalturaHelpers::getKalturaConfiguration();
		$url = KalturaHelpers::getCdnUrl();
		$url .= "/p/" . get_option("kaltura_partner_id");
		$url .= "/sp/" . get_option("kaltura_partner_id")*100;
		$url .= "/thumbnail";
		if ($widgetId)
			$url .= "/widget_id/" . $widgetId;
		else if ($entryId)
			$url .= "/entry_id/" . $entryId;
		$url .= "/width/" . $width;
		$url .= "/height/" . $height;
		$url .= "/type/2";
		$url .= "/bgcolor/000000"; 
		if ($version !== null)
			$url .= "/version/" . $version;
		return $url;
	}
	
	function getCommentPlaceholderThumbnailUrl($widgetId = null, $entryId = null, $width = 240, $height= 180, $version = 100000)
	{
		$url = KalturaHelpers::getThumbnailUrl($widgetId, $entryId, $width, $height, $version);
		$url .= "/crop_provider/wordpress_comment_placeholder";
		return $url;
	}

	function compareWPVersion($compareVersion, $operator)
	{
		global $wp_version;
		
		return version_compare($wp_version, $compareVersion, $operator);
	}
	
    function compareKalturaVersion($compareVersion, $operator)
	{
		$kversion = kaltura_get_version;
		
		return version_compare($kversion, $compareVersion, $operator);
	}
	
	function addWPVersionJS()
	{
		global $wp_version;
		echo("<script type='text/javascript'>\n");
		echo('var Kaltura_WPVersion = "' . $wp_version . '";'."\n");
		echo('var Kaltura_PluginUrl = "' . KalturaHelpers::getPluginUrl() . '";'."\n");
		echo("</script>\n");
	}
	
	function getPlayers() 
	{
		global $KALTURA_GLOBAL_PLAYERS;
		return $KALTURA_GLOBAL_PLAYERS;
	}
	
	function getPlayerByType($type)
	{
		$players = KalturaHelpers::getPlayers();
		if (array_key_exists($type, $players))
		{
			$player = $players[$type];
		}
		else
		{
			$player = $players[get_option('kaltura_default_player_type')];
		}
		
		return $player;
	}
	
	function calculatePlayerHeight($type, $width, $playerRatio = "4:3")
	{
		$player = KalturaHelpers::getPlayerByType($type);
		
		$aspectRatio = $playerRatio;
		$hSpacer = (@$player["horizontalSpacer"] ? $player["horizontalSpacer"] : 0);
		$vSpacer = (@$player["verticalSpacer"] ? $player["verticalSpacer"] : 0); 
		
		switch($aspectRatio)
		{
			case "4:3":
				$screenHeight = ($width - $hSpacer) / 4 * 3;
				$height = $screenHeight + $vSpacer;
				break;
			case "16:9":
				$screenHeight = ($width - $hSpacer) / 16 * 9;
				$height = $screenHeight + $vSpacer;
				break;
		}
		
		return round($height);
	}
	
	function runKalturaShortcode($content, $callback)
	{
		global $shortcode_tags;
		
		// we will backup the shortcode array, and run only our shortcode
		$shortcode_tags_backup = $shortcode_tags;
		
		add_shortcode('kaltura-widget', $callback);
			
		$content = do_shortcode($content);
		
		// now we can restore the original shortcode list
		$shortcode_tags = $shortcode_tags_backup;
	}
	
	function dieWithConnectionErrorMsg($errorDesc)
	{
		echo '
		<div class="error">
			<p>
				<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry.</strong> ('.$errorDesc.')
			</p>
		</div>';
		die();
	}
}
?>