<div class="chooseVideoType">
<center>
    <h3>Do you want to allow users to upload to or edit your video?</h3>
    <table>
    	<tr>
    		<td>
    			<a href="<?php echo KalturaHelpers::generateTabUrl(array("kaltura_entry_type" => KalturaEntryType_MIX)); ?>">[Yes, I want users to remix this video]</a><br />
    			<p class="small">If you add several files, they will play as a sequence that you can then add to, edit and allow users to upload and remix too.</p>
			</td>
			<td>
				<a href="<?php echo KalturaHelpers::generateTabUrl(array("kaltura_entry_type" => KalturaEntryType_MEDIA_CLIP)); ?>">[No, I just want to post a video]</a><br />
    			<p class="small">This will display a single video.  (If you add more than one video, only the first will appear in player.)</p>
			</td>
		</tr>
	</table>
</center>
</div>

<script type="text/javascript">
    //add event for the tabs menu link to restore the original modal dimensions
    jQuery('#media-upload-header li a').click(function () {
    	if (jQuery(this).parent().get(0).id == "tab-kaltura")
    		return false;
    		
    	topWindow.jQuery("#TB_iframeContent").stop();
    	topWindow.jQuery("#TB_window").stop();
    	
    	jQuery("#kaltura_contribution_wizard_wrapper").empty();
    	
    	jQuery("#tab-kaltura a").removeClass("current");
    	jQuery(this).addClass("current");
    	
    	jQuery(".chooseVideoType").empty();
    	
    	var tabHref = this.href;
    	topWindow.Kaltura.restoreModalSize(
    		function () {
    			topWindow.Kaltura.bindOverlayClick();
          		window.location.href = tabHref;
      		}
      	); 
    
    	return false;
    });

	var cwWidth = 680;
	var cwHeight = 360;
	
	var topWindow = Kaltura.getTopWindow();
	
    if (Kaltura.compareWPVersion("2.6", ">=")) {
    	topWindow.Kaltura.hackModalBoxWp26();
    }
    
	// fix for IE6, scroll the page up so modal would animate in the center of the window
	if (jQuery.browser.msie && jQuery.browser.version < 7)
		topWindow.scrollTo(0,0);

	topWindow.Kaltura.animateModalSize(
		cwWidth, 
		cwHeight + 34,
		function() {
		} 
	);
</script>