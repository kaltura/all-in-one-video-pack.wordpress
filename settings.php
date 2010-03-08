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
	
	$KALTURA_DEFAULT_PLAYERS = array (
		array(
			"id" => 534,
			"name" => "KDP3 Light Player", 
			"width" => 400,
			"height" => 330
		),
		array(
			"id" => 535,
			"name" => "KDP3 Dark Player", 
			"width" => 400,
			"height" => 330
		),
	);
	
	
	$KALTURA_LEGACY_PLAYERS = array (
		array(
			"id" => 530,
			"name" => "White/Blue", 
			"width" => 400,
			"height" => 365,
		),
		array(
			"id" => 531,
			"name" => "Dark",
			"width" => 400,
			"height" => 365, 
		),
		array(
			"id" => 532,
			"name" => "Grey", 
			"width" => 400,
			"height" => 365,
		)
	);
?>