<?php 
require_once('../../../wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/admin.php');
auth_redirect();
nocache_headers();
require_once('settings.php');
require_once('lib/kaltura_model.php');
require_once('lib/kaltura_helpers.php');
  
kaltura_register_js();

$body_id = "previewPage";
 
function update_thumbnail_frame()
{
	$entryId = @$_GET['entryId'];
	
	if (!$entryId)
	{
		wp_die(__('The video is missing or invalid.'));
	}
	
	global $KALTURA_DEFAULT_PLAYERS;
	$swfUrl	= KalturaHelpers::getSwfUrlForWidget(null, $KALTURA_DEFAULT_PLAYERS[0]["id"]);
	$flashVars = KalturaHelpers::getKalturaPlayerFlashVars(null, null, $entryId);
	$flashVars["autoPlay"] = "true";
	$flashVarsStr = KalturaHelpers::flashVarsToString($flashVars);
	?>
<div class="playerWrapper">
	<div id="kplayer">
		<script type="text/javascript">

			if (window.parent)
				window.parent.jQuery('#TB_title').css({'background-color':'#222','color':'#cfcfcf'}); // copied from media-upload.js
			
			var kalturaSwf = new SWFObject("<?php echo $swfUrl; ?>", "swfKalturaPlayer", "350", "320", "9", "#000000");
			kalturaSwf.addParam("flashVars", "<?php echo $flashVarsStr; ?>");
			kalturaSwf.addParam("wmode", "opaque");
			kalturaSwf.addParam("allowScriptAccess", "always");
			kalturaSwf.addParam("allowFullScreen", "true");
			kalturaSwf.addParam("allowNetworking", "all");
			kalturaSwf.write("kplayer");
		</script>
	</div>
	<?php 
}
 
wp_iframe("update_thumbnail_frame");

?>