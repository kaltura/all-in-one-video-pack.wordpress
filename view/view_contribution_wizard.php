<?php
	$flashVarsStr = KalturaHelpers::flashVarsToString($viewData["flashVars"]);
?>

<div id="kaltura_contribution_wizard_wrapper"></div>

<script type="text/javascript">
	var cwWidth = 680;
	var cwHeight = 360;
	
	var topWindow = Kaltura.getTopWindow();
	// fix for IE6, scroll the page up so modal would animate in the center of the window
	if (jQuery.browser.msie && jQuery.browser.version < 7)
		topWindow.scrollTo(0,0);
	
	topWindow.Kaltura.animateModalSize(
		cwWidth, 
		(cwHeight + <?php echo (is_numeric($viewData["extraCWHeight"])) ? $viewData["extraCWHeight"] : "0"; ?>), 
		function () {
			var cwSwf = new SWFObject("<?php echo $viewData["swfUrl"]; ?>", "kaltura_contribution_wizard", cwWidth, cwHeight, "9", "#000000");
			cwSwf.addParam("flashVars", "<?php echo $flashVarsStr; ?>");
			cwSwf.addParam("allowScriptAccess", "always");
			cwSwf.addParam("allowNetworking", "all");
			cwSwf.write("kaltura_contribution_wizard_wrapper");
		}
	);
</script>