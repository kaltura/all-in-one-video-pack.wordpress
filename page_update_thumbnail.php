<?php 
define("ABSPATH", realpath("../../../") . "/" );

require_once("../../../wp-admin/admin.php");
require_once('settings.php');
require_once('lib/common.php');
require_once('lib/kaltura_helpers.php');
  
kaltura_register_js();

$body_id = "updateThumbnailFrame";
 
function update_thumbnail_frame()
{
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
	
	$swfUrl	= KalturaHelpers::getSwfUrlForWidget(KALTURA_THUMBNAIL_WIDGET);
	$flashVars = KalturaHelpers::getKalturaPlayerFlashVars($ks, $kshowId);
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
	<div class="text">
		
	</div>
	<div class="submit">
		<div>Play the video and you will see an "Update thumbnail" button on top of the video.  Click the button on the frame you want to capture, wait for a confirmation message and then click "Done".</div>
		<input type="button" value="Done" onclick="window.parent.location.reload(); window.parent.tb_remove();" />
	</div>
	<?php 
}
 
wp_iframe("update_thumbnail_frame");

?>