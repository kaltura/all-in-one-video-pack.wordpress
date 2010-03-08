<?php 
	define('WP_USE_THEMES', false);
	require('../../../wp-blog-header.php');
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once('lib/kaltura_model.php');    
	require_once('lib/kaltura_wp_model.php');

	KalturaHelpers::force200Header();
	
	$closeLink = KalturaHelpers::getCloseLinkForModals();
	$widgetId = isset($_GET['wid']) ? $_GET['wid'] : "";
	$entryId = isset($_GET['entryId']) ? $_GET['entryId'] : "";
	
	if ($widgetId == "_".get_option('kaltura_partner_id')) // backward compatibility for old players sending widget id when we use entries
		$widgetId = "";
		
	if (!$widgetId && !$entryId)
		wp_die(__('The interactive video is missing.<br/><br/>'.$closeLink));
	
	// check widget permissions at wordpress db
	$widgetDb = KalturaWPModel::getWidget($widgetId, $entryId);
	if (!$widgetDb)
		wp_die(__('The interactive video was not found (Maybe the post was not published yet?).<br/><br/>'.$closeLink));
	
	if (!KalturaHelpers::userCanAdd((string)$widgetDb["add_permissions"]))
		wp_die(__('You do not have sufficient permissions to access this page.<br/><br/>'.$closeLink));

	$kmodel = KalturaModel::getInstance();
	
	if (!$entryId) // for backward compatibility
	{
		// get the widget from kaltura to find the entry its linked to
		$widget = $kmodel->getWidget($widgetId);
		$entryId = $widget->entryId;
	}

	if (!$entryId || !$widgetDb)
		wp_die(__('The video was not found.<br/><br/>'.$closeLink));
	
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
	var entryIds = [];
	function onContributionWizardAfterAddEntry(obj) {
		if (obj && obj.length > 0) {
			for(var i = 0; i < obj.length; i++) {
				var entryId = (obj[i].entryId) ? obj[i].entryId : obj[i].uniqueID;
				entryIds.push(entryId);
			}
		}
	}
	
	function onContributionWizardClose(modified) {
		if (entryIds.length > 0) {
			jQuery.ajax({
				url: "<?php echo KalturaHelpers::getPluginUrl(); ?>/ajax_append_to_mix.php",
				data: { 
					"mixId": "<?php echo $entryId; ?>",
					"wid": "<?php echo $widgetId; ?>",
					"entryIds[]": entryIds 
				},
				success: function() {
					onContributionWizardCloseTimeouted(true);
				},
				error: function() {
					onContributionWizardCloseTimeouted(true);
				}
			});
		}
		else {
			setTimeout("onContributionWizardCloseTimeouted("+modified+");");
		}
	}
	
	function onContributionWizardCloseTimeouted(modified) {
		var topWindow = Kaltura.getTopWindow();
		topWindow.KalturaModal.closeModal();
		
		if (modified) {
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
<script type="text/javascript">
	cwSwf.write("kaltura_contribution_wizard_wrapper");
</script>"
</body>
</html>
