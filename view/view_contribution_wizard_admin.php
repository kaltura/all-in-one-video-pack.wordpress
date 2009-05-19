<script type="text/javascript">

    <?php if ($viewData["entryId"]): ?>
	var entryId = "<?php echo $viewData["entryId"]; ?>";
	<?php else: ?>
	var entryId = null;
	<?php endif; ?>
		
	
	var topWindow = Kaltura.getTopWindow();
	
	topWindow.Kaltura.unbindOverlayClick();
	
	function onContributionWizardAfterAddEntry(obj)
	{
		if (!entryId)
		{
    		if (obj && obj.length > 0 && obj[0].kshowId)
    			entryId = obj[0].entryId;
		}

		setTimeout("onContributionWizardAfterAddEntryTimeouted()", 0); // because we are going to remove the flash from the dom
	}

	function onContributionWizardAfterAddEntryTimeouted()
	{
		jQuery("#kaltura_contribution_wizard_wrapper").empty();
		
		// go to edit mode
		var url = "<?php echo KalturaHelpers::generateTabUrl(array("tab" => "kaltura_browse", "kaction" => "sendtoeditor", "firstedit" => "true")); ?>&entryid="+entryId;
		
		topWindow.Kaltura.restoreModalSize(
			function () {
				topWindow.Kaltura.bindOverlayClick();
				window.location.href = url
			}
		);
	}
	
	// fix mac firefox opacity bug
	if (Kaltura.isMacFF())
		Kaltura.hideTinyMCEToolbar();
	
	// fix the height of the tabs so the contribution wizard would be in full window height
	jQuery("#media-upload-header").css("height", "33px");

	// add event for the tabs menu link to restore the original modal dimensions
	jQuery('#media-upload-header li a').click(function () {
		if (jQuery(this).parent().get(0).id == "tab-kaltura")
			return false;
			
		topWindow.jQuery("#TB_iframeContent").stop();
		topWindow.jQuery("#TB_window").stop();
		
		jQuery("#kaltura_contribution_wizard_wrapper").empty();
		
		// restore the mac firefox opacity bug workaround
		if (Kaltura.isMacFF())
			Kaltura.showTinyMCEToolbar();
			
		jQuery("#tab-kaltura a").removeClass("current");
		jQuery(this).addClass("current");
		
		var tabHref = this.href;
		topWindow.Kaltura.restoreModalSize(
			function () {
				topWindow.Kaltura.bindOverlayClick();
	      		window.location.href = tabHref;
      		}
      	); 

		return false;
	});
	
	jQuery(window).unload(function () {
		// restore the mac firefox opacity bug workaround
		if (Kaltura.isMacFF())
			Kaltura.showTinyMCEToolbar();
	})
</script>

<?php
require_once("view_contribution_wizard.php");
?>