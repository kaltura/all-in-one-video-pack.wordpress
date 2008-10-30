<?php
	require('../../../wp-blog-header.php'); 
	define('WP_USE_THEMES', false);
	define('WP_ADMIN', TRUE);
	auth_redirect();
	require_once('settings.php');
	require_once('lib/common.php');
	require_once('lib/kaltura_helpers.php');  
  
	if (!KalturaHelpers::userCanEdit())
	{
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	
	$kshowId = @$_GET['kshowid'];
	
	if (!$kshowId)
	{
		wp_die(__('The interactive video is missing or invalid.'));
	}

	$kalturaClient = getKalturaClient(false, "edit:".$kshowId);
	if (!$kalturaClient)
	{
		wp_die(__('Failed to start new session.'));
	}
	
	$ks = $kalturaClient->getKs();
	
	$viewData["swfUrl"] 	= KalturaHelpers::getSimpleEditorUrl(KALTURA_KSE_UICONF);
	$viewData["flashVars"] 	= KalturaHelpers::getSimpleEditorFlashVars($ks, $kshowId);
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
<?php 
	KalturaHelpers::addWPVersionJS();
?>
<script type="text/javascript">
	function onSimpleEditorSaveClick()
	{
		
	}
	
	function onSimpleEditorBackClick(modified)
	{
		setTimeout("onSimpleEditorBackClickTimedout("+modified+")", 0);
	}
	
	function onSimpleEditorBackClickTimedout(modified) 
	{
		var topWindow = Kaltura.getTopWindow();
		topWindow.KalturaModal.closeModal();
		
		if (modified) 
		{
			topWindow.location.reload();
		}
	}
</script>

</head>
<body>
<?php
	require_once("view/view_simple_editor.php"); 
?>
</body>
</html>
