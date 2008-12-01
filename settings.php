<?php
	define("KALTURA_SERVER_URL", "http://www.kaltura.com");
	define("KALTURA_CDN_URL", "http://cdn.kaltura.com");
	define("KALTURA_ANONYMOUS_USER_ID", "Anonymous");
	define("KALTURA_KSE_UICONF", 502);
	define("KALTURA_KCW_UICONF", 501);
	define("KALTURA_KCW_UICONF_COMMENTS", 503);
	define("KALTURA_KCW_UICONF_FOR_SE", 504);
	
	$KALTURA_GLOBAL_PLAYERS = array (
		"whiteblue" => 
			array(
				"name" => "White/Blue", 
				"uiConfId" => 520,
				"horizontalSpacer" => 10,
				"verticalSpacer" => 64,
				"videoAspectRatio" => "4:3",
				"previewHeaderColor" => "#000"
			),
		"dark" => 
			array(
				"name" => "Dark", 
				"uiConfId" => 521,
				"horizontalSpacer" => 10,
				"verticalSpacer" => 64,
				"videoAspectRatio" => "4:3",
				"previewHeaderColor" => "#fff"
			),
		"grey" => 
			array(
				"name" => "Grey", 
				"uiConfId" => 522,
				"horizontalSpacer" => 10,
				"verticalSpacer" => 64,
				"videoAspectRatio" => "4:3",
				"previewHeaderColor" => "#31302E"
			)
	);
?>