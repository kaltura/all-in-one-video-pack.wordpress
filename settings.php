<?php
	define("KALTURA_SERVER_URL", "http://www.kaltura.com");
	define("KALTURA_CDN_URL", "http://cdn.kaltura.com");
	define("KALTURA_ANONYMOUS_USER_ID", "Anonymous");
	define("KALTURA_KSE_UICONF", 540);
	define("KALTURA_KCW_UICONF", 542);
	define("KALTURA_KCW_UICONF_ADMIN", 543);
	define("KALTURA_KCW_UICONF_COMMENTS", 544);
	define("KALTURA_KCW_UICONF_FOR_SE", 541);
	define("KALTURA_THUMBNAIL_UICONF", 533);
	define("KALTURA_LOGGER", false);
	
	global $KALTURA_DEFAULT_PLAYERS; // although it looks like a global scope, when the plugin is activated it is executed in a sandbox function
	$KALTURA_DEFAULT_PLAYERS = array (
		array(
			"id" => 534,
			"name" => "Light Skin", 
			"width" => 400,
			"height" => 330
		),
		array(
			"id" => 535,
			"name" => "Dark Skin", 
			"width" => 400,
			"height" => 330
		),
	);
	
	global $KALTURA_LEGACY_PLAYERS;
	$KALTURA_LEGACY_PLAYERS = array ();
?>