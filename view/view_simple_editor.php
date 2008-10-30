<?php
	$flashVarsStr = KalturaHelpers::flashVarsToString($viewData["flashVars"]);
?>

<div id="kaltura_simple_editor_wrapper"></div>
<script type="text/javascript">
	var seWidth = 890;
	var seHeight = 546;
	
	var topWindow = Kaltura.getTopWindow();
	
	topWindow.Kaltura.animateModalSize(
		seWidth, 
		seHeight, 
		function () {
			var kaltura_swf = new SWFObject("<?php echo $viewData["swfUrl"]; ?>", "kaltura_simple_editor", seWidth, seHeight, "9", "#000000");
			kaltura_swf.addParam("flashVars", "<?php echo $flashVarsStr; ?>");
			kaltura_swf.addParam("allowScriptAccess", "always");
			kaltura_swf.addParam("allowNetworking", "all");
			kaltura_swf.write("kaltura_simple_editor_wrapper");
		}
	);
</script>