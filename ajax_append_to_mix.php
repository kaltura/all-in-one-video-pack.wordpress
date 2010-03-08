<?php 
	define('DOING_AJAX', true);
	require_once('../../../wp-load.php');
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	require_once('lib/kaltura_wp_model.php');
	
	$entryIds = isset($_GET["entryIds"]) && is_array($_GET["entryIds"]) ? $_GET["entryIds"] : array();
	$widgetId = isset($_GET['wid']) ? $_GET['wid'] : "";
	$mixId = isset($_GET['mixId']) ? $_GET['mixId'] : "";
	
	if (!$widgetId && !$mixId)
		wp_die(__('The interactive video is missing.<br/><br/>'));
		
	// check widget permissions at wordpress db
	$widgetDb = KalturaWPModel::getWidget($widgetId, $mixId);
	if (!$widgetDb)
		wp_die(__('The interactive video was not found (Maybe the post was not published yet?).<br/><br/>'));
	
	if (!KalturaHelpers::userCanAdd((string)$widgetDb["add_permissions"]))
		wp_die(__('You do not have sufficient permissions to access this page.<br/><br/>'));

	$kmodel = KalturaModel::getInstance();
	if (!$mixId) // for backward compatibility
	{
		// get the widget from kaltura to find the entry its linked to
		$widget = $kmodel->getWidget($widgetId);
		$mixId = $widget->entryId;
	}

	if (!$mixId || !$widgetDb)
		wp_die(__('The video was not found.<br/><br/>'));
		
	foreach($entryIds as $entryId)
	{
		$kmodel->appendMediaToMix($mixId, $entryId);
	}
?>
