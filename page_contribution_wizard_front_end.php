<?php 
	define('WP_USE_THEMES', false);
	require('../../../wp-blog-header.php');
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once('lib/kaltura_model.php');    
	require_once('lib/kaltura_wp_model.php');
  
	$widgetId = @$_GET['wid'];
	
	if (!$widgetId)
		wp_die(__('The interactive video is missing.'));
	
	// check widget permissions at wordpress db
	$widgetDb = KalturaWPModel::getWidget($widgetId);
	if (!$widgetDb)
		wp_die(__('The interactive video was not found (Maybe the post was not published yet?).'));
	
	if (!KalturaHelpers::userCanAdd((string)$widgetDb["add_permissions"]))
		wp_die(__('You do not have sufficient permissions to access this page.'));

	// get the widget from kaltura to find the kshow its linked to
	$kmodel = KalturaModel::getInstance();
	$widget = $kmodel->getWidget($widgetId);
	$entryId = $widget->entryId;

	if (!$entryId || !$widget)
		wp_die(__('The video was not found.'));
	
	$ks = $kmodel->getClientSideSession();
	
	$viewData["swfUrl"]    		= KalturaHelpers::getContributionWizardUrl(KALTURA_KCW_UICONF);
	$viewData["flashVars"] 		= KalturaHelpers::getContributionWizardFlashVars($ks, $entryId);
	
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo KalturaHelpers::getPluginUrl(); ?>/css/kaltura.css"/>
<style type="text/css">
	html, body { margin:0; padding:0; }
</style>
<script type="text/javascript" src="<?php echo KalturaHelpers::getPluginUrl(); ?>/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo KalturaHelpers::getPluginUrl(); ?>/js/kaltura.js"></script>
<script type="text/javascript" src="<?php echo KalturaHelpers::getPluginUrl(); ?>/../../../wp-includes/js/jquery/jquery.js"></script>
<script type="text/javascript">
	
	function onContributionWizardClose(modified)
	{
		setTimeout("onContributionWizardCloseTimeouted("+modified+");");
	}
	
	function onContributionWizardCloseTimeouted(modified)
	{
		var topWindow = Kaltura.getTopWindow();
		topWindow.KalturaModal.closeModal();
		
		if (modified) 
		{
			// reload the player
			topWindow.location.reload();
		}
	}
</script>
</head>
<body>
<?php
	require_once("view/view_contribution_wizard.php");
?>
</body>
</html>
