<?php
	define("KALTURA_SERVER_URL", "http://www.kaltura.com");
	define("KALTURA_CDN_URL", "http://cdn.kaltura.com");
	define("KALTURA_ANONYMOUS_USER_ID", "Anonymous");
	define("KALTURA_KSE_UICONF", 502);
	define("KALTURA_KCW_UICONF", 501);
	define("KALTURA_KCW_UICONF_COMMENTS", 503);
	define("KALTURA_KCW_UICONF_FOR_SE", 504);
	define("KALTURA_THUMBNAIL_UICONF", 533);
	define("KALTURA_LOGGER", false);
	
	$KALTURA_GLOBAL_PLAYERS = array (
		"whiteblue" => 
			array(
				"name" => "White/Blue", 
				"uiConfId" => 530,
				"horizontalSpacer" => 0,
				"verticalSpacer" => 65,
				"previewHeaderColor" => "#000"
			),
		"dark" => 
			array(
				"name" => "Dark", 
				"uiConfId" => 531,
				"horizontalSpacer" => 0,
				"verticalSpacer" => 65,
				"previewHeaderColor" => "#fff"
			),
		"grey" => 
			array(
				"name" => "Grey", 
				"uiConfId" => 532,
				"horizontalSpacer" => 0,
				"verticalSpacer" => 65,
				"previewHeaderColor" => "#31302E"
			)
	);
?>