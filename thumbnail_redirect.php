<?php
	ob_start();

	define('WP_USE_THEMES', false);
	
	require('../../../wp-blog-header.php');

	require_once("settings.php");
	require_once("lib/common.php");
	
	$width = $_GET["width"];
	$height = $_GET["height"];
	$widgetId = $_GET['widget_id'];
	$thumbnailPath .= "";
	$thumbnailPath .= "/p/" . get_option('kaltura_partner_id');
	$thumbnailPath .= "/sp/" . get_option('kaltura_subp_id');
	$thumbnailPath .= "/thumbnail";
	$thumbnailPath .= "/width/" . $width;
	$thumbnailPath .= "/height/" . $height;
	$thumbnailPath .= "/widget_id/" . $widgetId;
	$thumbnailPath .= "/type/2";
	$thumbnailPath .= "/bgcolor/000000";
	$thumbnailPath .= "/crop_provider/wordpress_placeholder";
	header("Location: " . kalturaGetServerUrl() . $thumbnailPath);
	
	ob_end_flush();
?>