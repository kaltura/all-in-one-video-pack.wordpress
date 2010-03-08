<?php 
	define('DOING_AJAX', true);
	define('WP_ADMIN', TRUE);
	require_once('../../../wp-load.php');
	auth_redirect();
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	$kmodel = KalturaModel::getInstance();
	$uiConfs = $kmodel->listPlayersUiConfs();
	echo json_encode($uiConfs);
?>