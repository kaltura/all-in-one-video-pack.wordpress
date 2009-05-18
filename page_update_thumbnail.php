<?php 
define("ABSPATH", realpath("../../../") . "/" );

require_once("../../../wp-admin/admin.php");
require_once('settings.php');
require_once('lib/kaltura_model.php');
require_once('lib/kaltura_helpers.php');
  
kaltura_register_js();

$body_id = "updateThumbnailFrame";
 
function update_thumbnail_frame()
{
	if (!KalturaHelpers::userCanEdit())
	{
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	
	$entryId = @$_GET['entryId'];
	
	if (!$entryId)
	{
		wp_die(__('The video is missing or invalid.'));
	}
	
	$kmodel = KalturaModel::getInstance();
	$ks = $kmodel->getClientSideSession();
	if (!$ks)
	{
		wp_die(__('Failed to start new session.'));
	}
	
	$swfUrl	= KalturaHelpers::getSwfUrlForWidget(null, KALTURA_THUMBNAIL_UICONF);
	$flashVars = KalturaHelpers::getKalturaPlayerFlashVars(null, $ks, $entryId);
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
		<div>Play the video and you will see an "Capture Thumbnail" button on top of the video.  Click the button on the frame you want to capture, wait for a confirmation message and then click "Done".</div>
		<input type="button" value="Done" onclick="window.parent.location.reload(); window.parent.tb_remove();" />
	</div>
	<?php 
}
 
wp_iframe("update_thumbnail_frame");

?>