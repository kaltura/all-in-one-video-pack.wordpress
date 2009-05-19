<?php 
	ob_start();
	define('DOING_AJAX', true);
	require_once('../../../wp-load.php');
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	$entryIdsStr = str_replace(" ", "", @$_GET["entryIds"]);
	$entryIds = explode(",", $entryIdsStr);
	$postId = @$_GET["postId"];
	
	$kmodel = KalturaModel::getInstance();
	
	$mixEntry = new KalturaMixEntry();
    $mixEntry->name = "Video comment for post #".$postId;
    $mixEntry->editorType = KalturaEditorType_SIMPLE;
    $mixEntry = $kmodel->addMixEntry($mixEntry);

    foreach($entryIds as $entryId)
    {
        $kmodel->appendMediaToMix($mixEntry->id, $entryId);
    }
    
	// add widget
	$widget = new KalturaWidget();
	$player = KalturaHelpers::getPlayerByType(get_option('kaltura_comments_player_type'));
	$widget = $kmodel->addWidget($mixEntry->id, $player["uiConfId"]);
	$widgetId = $widget->id;
	$playerSize = "comments";
	
	ob_clean();
	echo '[kaltura-widget wid="'.$widgetId.'" size="'.$playerSize.'" /]'; 
	ob_flush();
?>