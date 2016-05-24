<?php KalturaHelpers::protectView( $this ); ?>
<?php
media_upload_header();
$this->renderView( 'contribution-wizard.php' );
?>

<script type="text/javascript">
	var entryIds = [];

	function kaltura_onContributionWizardAfterAddEntry(obj) {
		if (obj && obj.length > 0) {
			for (var i = 0; i < obj.length; i++) {
				var entryId = (obj[i].entryId) ? obj[i].entryId : obj[i].uniqueID;
				entryIds.push(entryId);
			}
		}

		setTimeout("kaltura_onContributionWizardAfterAddEntryTimeouted()", 0); // because we are going to remove the flash from the dom
	}

	function kaltura_onContributionWizardAfterAddEntryTimeouted() {
		jQuery("#kaltura_contribution_wizard_wrapper").empty();

		var url;
		if (entryIds.length) {
			<?php $baseUrl = KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_upload', 'kaction' => 'sendtoeditor', 'firstedit' => 'true' ) ); ?>

			var baseUrl = <?php echo wp_json_encode( $baseUrl ); ?>;
			url = baseUrl + '&entryIds[]=' + entryIds[0];
		}
		else {
			alert("No Entries Uploaded");
		}

		window.location.href = url;
	}

	// fix mac firefox opacity bug
	if (Kaltura.isMacFF())
		Kaltura.hideTinyMCEToolbar();

	jQuery(window).unload(function () {
		// restore the mac firefox opacity bug workaround
		if (Kaltura.isMacFF())
			Kaltura.showTinyMCEToolbar();
	})
</script>