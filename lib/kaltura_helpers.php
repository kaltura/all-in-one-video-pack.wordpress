<?php
class KalturaHelpers
{
	function getContributionWizardFlashVars($ks, $kshowId)
	{
		$sessionUser = kalturaGetSessionUser();
		$config = kalturaGetServiceConfiguration();
		
		$flashVars = array();

		$flashVars["userId"] = $sessionUser->userId;
		$flashVars["sessionId"] = $ks;
	
		if ($sessionUserId == KALTURA_ANONYMOUS_USER_ID) {
			 $flashVars["isAnonymous"] = true;
		}
			
		$flashVars["partnerId"] 	= $config->partnerId;
		$flashVars["subPartnerId"] 	= $config->subPartnerId;
		$flashVars["kshow_id"] 		= $kshowId;
		$flashVars["afterAddentry"] = "onContributionWizardAfterAddEntry";
		$flashVars["close"] 		= "onContributionWizardClose";
		$flashVars["terms_of_use"] 	= "http://corp.kaltura.com/static/tandc" ;
		
		return $flashVars;
	}
	
	function getSimpleEditorFlashVars($ks, $kshowId)
	{
		$config = kalturaGetServiceConfiguration();
		$sessionUser = kalturaGetSessionUser();
		
		$flashVars = array();
		
		$flashVars["entry_id"] 		= -1;
		$flashVars["kshow_id"] 		= $kshowId;
		$flashVars["partner_id"] 	= $config->partnerId;;
		$flashVars["subp_id"] 		= $config->subPartnerId;
		$flashVars["uid"] 			= $sessionUser->userId;
		$flashVars["ks"] 			= $ks;
		$flashVars["backF"] 		= "onSimpleEditorBackClick";
		$flashVars["saveF"] 		= "onSimpleEditorSaveClick";
		
		return $flashVars;
	}
	
	function getKalturaPlayerFlashVars($ks, $kshowId = -1, $entryId = -1)
	{
		$config = kalturaGetServiceConfiguration();
		$sessionUser = kalturaGetSessionUser();
		
		$flashVars = array();
		
		$flashVars["kshowId"] 		= $kshowId;
		$flashVars["entryId"] 		= $entryId;
		$flashVars["partner_id"] 	= $config->partnerId;
		$flashVars["subp_id"] 		= $config->subPartnerId;
		$flashVars["uid"] 			= $sessionUser->userId;
		$flashVars["ks"] 			= $ks;
		
		return $flashVars;
	}
	
	function getTinyPlayerFlashVars($ks, $kshowId) {
		$sessionUser = kalturaGetSessionUser();
		$flashVars = KalturaHelpers::getKalturaPlayerFlashVars($ks, $kshowId, -1);
		$flashVars["layoutId"] = "playerOnly";
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
		return kalturaGetServerUrl() . "/index.php/kwidget/wid/" . $player["uiConfId"];
	}
	
	function getSwfUrlForWidget($widgetId)
	{
		return kalturaGetServerUrl() . "/index.php/kwidget/wid/" . $widgetId;
	}
	
	function getContributionWizardUrl($uiConfId)
	{
		return kalturaGetServerUrl() . "/kse/ui_conf_id/" . $uiConfId;
	}
	
	function getSimpleEditorUrl($uiConfId)
	{
		return kalturaGetServerUrl() . "/kcw/ui_conf_id/" . $uiConfId;
	}

	function userCanEdit($override = null) {
		global $current_user;

		$roles = array();
		foreach($current_user->roles as $key => $val)
			$roles[$val] = 1;
			 
		if ($override !== "0" && $override !== "1" && $override !== "2" && $override !== "3") 
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
		
		if ($override !== "0" && $override !== "1" && $override !== "2" && $override !== "3")
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
		$config = kalturaGetServiceConfiguration();
		$url = kalturaGetServerUrl();
		$url .= "/p/" . $config->partnerId;
		$url .= "/sp/" . $config->subPartnerId;
		$url .= "/thumbnail";
		if ($widgetId)
			$url .= "/widget_id/" . $widgetId;
		else if ($entryId)
			$url .= "/entry_id/" . $entryId;
		$url .= "/width/" . $width;
		$url .= "/height/" . $height;
		$url .= "/type/2";
		$url .= "/bgcolor/000000"; 
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
	
	function addWPVersionJS()
	{
		global $wp_version;
		echo("<script type='text/javascript'>");
		echo('var Kaltura_WPVersion = "' . $wp_version . '";');
		echo("</script>");
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
	
	function calculatePlayerHeight($type, $width)
	{
		$player = KalturaHelpers::getPlayerByType($type);
		
		$aspectRatio = (@$player["videoAspectRatio"] ? $player["videoAspectRatio"] : "4:3");
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
}
?>