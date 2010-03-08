<?php 
	ob_start();
	define('DOING_AJAX', true);
	define('WP_ADMIN', TRUE);
	require_once('../../../wp-load.php');
	auth_redirect();
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	$entryIds = (isset($_GET["entryIds"]) ? $_GET["entryIds"] : array());
	$name = isset($_GET["name"]) ? $_GET["name"] : "Untitled Mix";
	
	$kmodel = KalturaModel::getInstance();
	
	$mixEntry = new KalturaMixEntry();
	$mixEntry->name = $name;
	$mixEntry->editorType = KalturaEditorType_SIMPLE;
	$mixEntry = $kmodel->addMixEntry($mixEntry);

	foreach($entryIds as $entryId)
	{
		$kmodel->appendMediaToMix($mixEntry->id, $entryId);
	}

	ob_clean();
	echo $mixEntry->id; 
	ob_flush();
?>
