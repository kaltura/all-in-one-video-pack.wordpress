<?php 
	ob_start();
	define('DOING_AJAX', true);
	define('WP_ADMIN', TRUE);
	require_once('../../../wp-load.php');
	auth_redirect();
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	$entryIds = isset($_GET["entryIds"]) && is_array($_GET["entryIds"]) ? $_GET["entryIds"] : array();
	$kmodel = KalturaModel::getInstance();
	$entries = $kmodel->getEntriesByIds($entryIds);

	$idsWithStatus = array();
	foreach($entries as $entry)
	{
		$idsWithStatus[$entry->id] = $entry->status;
	}
	
	ob_clean();
	echo json_encode($idsWithStatus); 
	ob_flush();
?>
