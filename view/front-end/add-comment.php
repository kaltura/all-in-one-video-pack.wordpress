<?php KalturaHelpers::protectView($this); ?>
<?php if ($this->jsError): ?>
	<script type="text/javascript">
		var topWindow = Kaltura.getTopWindow();
		topWindow.Kaltura.doErrorFromComments("<?php echo esc_js($this->jsError); ?>");
	</script>
<?php else: ?>
<script type="text/javascript">
	var entryId = "";
	var topWindow = Kaltura.getTopWindow();
	function onContributionWizardAfterAddEntry(obj)
	{
		if (obj && obj.length > 0)
		{
			entryId = (obj[0].entryId) ? obj[0].entryId : obj[0].uniqueID;
		}
	}

	function onContributionWizardClose(modified)
	{
		setTimeout("onContributionWizardCloseTimeouted("+modified+");");
	}

	function onContributionWizardCloseTimeouted(modified)
	{
		if (modified)
		{
			if (!entryId)
				topWindow.Kaltura.doErrorFromComments("Failed to add your comment");

			var jqComments = topWindow.jQuery("#comment,[name=comment]");
			var jqSubmitButton = topWindow.jQuery("#submit,[name=submit]");
			var widgetHtml = '[kaltura-widget entryid="'+entryId+'" size="comments" /]';

			if (jqComments.size() > 0 && jqSubmitButton.size() > 0)
			{
				// get only the first submit button that was found
				jqSubmitButton = jQuery(jqSubmitButton[0]);

				var html = jqComments.val();
				if (html.replace(" ", "") != "")
					html += "\n";

				html += widgetHtml;
				jqComments.val(html);
				jqComments.attr('readonly', true);
				jqSubmitButton.click();
				jqSubmitButton.val("Please wait...");
				jqSubmitButton.attr("disabled", true);
			}

			topWindow.KalturaModal.closeModal();
		}
		else
		{
			topWindow.KalturaModal.closeModal();
		}
	}
</script>
<?php $this->renderView('contribution-wizard.php'); ?>
<?php endif; ?>