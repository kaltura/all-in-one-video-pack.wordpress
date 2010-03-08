<?php 
	define('DOING_AJAX', true);
	define('WP_ADMIN', TRUE);
	require_once('../../../wp-load.php');
	auth_redirect();
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	$entryId = isset($_POST['entryId']) ? $_POST['entryId'] : null;
	$entryName = isset($_POST['entryName']) ? $_POST['entryName'] : null;
	
	if ($entryId && $entryName)
	{
		$kmodel = KalturaModel::getInstance();
		$baseEntry = new KalturaBaseEntry();
		$baseEntry->name = $entryName;
		$kmodel->updateBaseEntry($entryId, $baseEntry);
	}
?>