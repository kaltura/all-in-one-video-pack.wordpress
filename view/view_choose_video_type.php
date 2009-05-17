<div class="chooseVideoType">
<center>
    <h3>Do you want to allow users to upload to or edit your video?</h3>
    <table>
    	<tr>
    		<td>
    			<a href="<?php echo KalturaHelpers::generateTabUrl(array("kaltura_entry_type" => KalturaEntryType_MIX)); ?>">[Yes, I want users to remix video]</a><br />
    			<p class="small">If you add several files, they will play as a sequence that you can then edit and allow users to remix</p>
			</td>
			<td>
				<a href="<?php echo KalturaHelpers::generateTabUrl(array("kaltura_entry_type" => KalturaEntryType_MEDIA_CLIP)); ?>">[No, I just want to post a video]</a><br />
    			<p class="small">If you add more than one video, only the first will appear in player</p>
			</td>
		</tr>
	</table>
</center>
</div>