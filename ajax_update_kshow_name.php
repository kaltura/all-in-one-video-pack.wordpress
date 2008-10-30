<?php 
	define('WP_USE_THEMES', false);
	require('../../../wp-blog-header.php');
	define('WP_ADMIN', TRUE);
	auth_redirect();
	require_once('settings.php');
	require_once('lib/common.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	$sessionUser = kalturaGetSessionUser();
	
	$kshowId = @$_GET["kshowId"];
	
	// update the kshow
	$kshowUpdate = new KalturaKShow();
	$kshowUpdate->name = "Untitled";
	$kalturaClient = getKalturaClient(false, "edit:".$kshowId);  
	KalturaModel::updateKshow($kalturaClient, $kshowId, $kshowUpdate);
?>