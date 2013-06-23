<?php KalturaHelpers::protectView($this); ?>
<div id="kaltura-tab-choose-videos" class="kaltura-tab" >
	<div class="loader"></div>
	<div class="scroll">
		<p>
			Content has now been added to your All in One Video library. <br />
			Select the content you want to insert into post and then how you would like it to be displayed: each clip in its own video player or all selected content as a video mix in a single player.
		</p>
		<ul id="kaltura-browse">
		<?php foreach($this->entries as $entry): ?>
			<?php
				$status = "statusReady";
				if (in_array($entry->status, array(Kaltura_Client_Enum_EntryStatus::ERROR_IMPORTING, Kaltura_Client_Enum_EntryStatus::ERROR_CONVERTING, Kaltura_Client_Enum_EntryStatus::DELETED)))
					$status = "statusError";
				if (in_array($entry->status, array(Kaltura_Client_Enum_EntryStatus::IMPORT, Kaltura_Client_Enum_EntryStatus::PRECONVERT)))
					$status = "statusConverting";
			?>
			<li class="<?php echo $status; ?>">
				<div id="entryId_<?php echo $entry->id?>" class="entryId showName" title="<?php _e('Click to edit'); ?>">
					<?php echo $entry->name ?><br />
				</div>
				<div class="thumb">
					<img src="<?php echo $entry->thumbnailUrl; ?>/width/120/height/90/type/2/bgcolor/000" alt="<?php $entry->name ?>" width="120" height="90" />
					<div class="status convertingMsg">Converting</div>
					<div class="status errorMsg">Error</div>
					<div class="overlay"></div>
				</div>
				<div class="submit">
					<input id="ckbEntryId_<?php echo $entry->id?>" name="entryIds" type="checkbox" value="<?php echo $entry->id; ?>" class="checkbox" />
					<label for="ckbEntryId_<?php echo $entry->id?>"><?php _e('Add to player'); ?></label>
					<br clear="all" />
				</div>
			</li>
		<?php endforeach; ?>
		</ul>
		<br class="clear" />
	</div>
	<div class="options">
		<a class="button" disabled="disabled" onclick="sendToEditor();"><?php _e("Create a player for each selected"); ?></a>
	</div>
	<div class="fixIe7">&nbsp;</div>
</div>

<script type="text/javascript">
	

	function getSelectedIds() {
		var entryIds = [];
		jQuery('input[type=checkbox]:checked').each(function(index, element) {
			entryIds.push(element.value);
		});
		return entryIds;
	}

	function sendToEditor(entryIds, ignoreStatus) {
		if (!entryIds) {
			entryIds = getSelectedIds();
		}
		
		if (entryIds.length == 0)
		{
			alert('<?php _e('Please select at least one item'); ?>');
			return;
		}

		var url =  "<?php echo KalturaHelpers::generateTabUrl(array("tab" => "kaltura_upload", "kaction" => "sendtoeditor", "firstedit" => "true")); ?>";
		var entryIdsParams = '&entryIds[]=';
		entryIdsParams += entryIds.join('&entryIds[]=');
		url += entryIdsParams;

		window.location.href = url;
	}

	function refreshButtonsState() {
		if (jQuery('ul li input[type=checkbox]:checked').size() == 0) {
			jQuery('.options a').attr('disabled', true);
		}
		else {
			jQuery('.options a').removeAttr('disabled');
		}
	}
	
	jQuery(function () {
		var topWindow = Kaltura.getTopWindow();
		topWindow.Kaltura.animateModalSize(680, 394);
		
		jQuery('li div.showName').kalturaEditableName({
			namePostParam: 'entryName',
			idPostParam: 'entryId',
			idPrefix: 'entryId_',
			url: ajaxurl+'?action=kaltura_ajax&kaction=saveentryname'
		});

		jQuery('ul').kalturaEntryStatusChecker({
			url: ajaxurl+'?action=kaltura_ajax&kaction=getentriesstatus',
			idPrefix: 'entryId_',
			idSelector: '.entryId',
			loader: jQuery('.loader')
		});

		jQuery('ul li input[type=checkbox]').click(refreshButtonsState);
		refreshButtonsState();
	});
</script>
