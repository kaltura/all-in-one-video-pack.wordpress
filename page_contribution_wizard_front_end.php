<?php 
	define('WP_USE_THEMES', false);
	require('../../../wp-blog-header.php');
	require_once('settings.php');
	require_once('lib/common.php');
	require_once('lib/kaltura_helpers.php');

	$kshowId = @$_GET['kshowid'];
	
	if (!$kshowId)
	{
		wp_die(__('The interactive video is missing or invalid.'));
	}
	
	$kalturaClient = getKalturaClient();
	if (!$kalturaClient)
	{
		wp_die(__('Failed to start new session.'));
	}
	
	$ks = $kalturaClient->getKs();
	
	$viewData["swfUrl"]    		= KalturaHelpers::getContributionWizardUrl(KALTURA_KCW_UICONF);
	$viewData["flashVars"] 		= KalturaHelpers::getContributionWizardFlashVars($ks, $kshowId);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo kalturaGetPluginUrl(); ?>/css/kaltura.css"/>
<style type="text/css">
	html, body { margin:0; padding:0; }
</style>
<script type="text/javascript" src="<?php echo kalturaGetPluginUrl(); ?>/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo kalturaGetPluginUrl(); ?>/js/kaltura.js"></script>
<script type="text/javascript" src="<?php echo kalturaGetPluginUrl(); ?>/../../../wp-includes/js/jquery/jquery.js"></script>
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
