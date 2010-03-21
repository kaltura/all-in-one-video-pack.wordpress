<?php if (!defined("WP_ADMIN")) die();?>
<div id="kalturaTabChooseVideos" class="kalturaTab" >
	<div class="loader"></div>
	<div class="scroll">
		<p>
			Content has now been added to your All in One Video library. <br />
			Select the content you want to insert into post and then how you would like it to be displayed: each clip in its own video player or all selected content as a video mix in a single player.
		</p>
		<ul id="kalturaBrowse">
		<?php foreach($viewData["entries"] as $entry): ?>
			<?php 
				$status = "statusReady";
				if (in_array($entry->status, array(KalturaEntryStatus_ERROR_IMPORTING, KalturaEntryStatus_ERROR_CONVERTING, KalturaEntryStatus_DELETED)))
					$status = "statusError";
				if (in_array($entry->status, array(KalturaEntryStatus_IMPORT, KalturaEntryStatus_PRECONVERT)))
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
		<a class="button" disabled="disabled" onclick="createMix();"><?php _e("Add selected to \"Mix\" (Single video)"); ?></a>
	</div>
	<div class="fixIe7">&nbsp;</div>
</div>

<script type="text/javascript">
	function createMix() {
		var entryIds = getSelectedIds();
		if (entryIds.length == 0) 
		{
			alert('<?php _e('Please select at least one item'); ?>');
			return;
		}

		var ready = true;
		jQuery.each(entryIds, function(index, entryId) {
			if (!jQuery('#entryId_'+entryId).parent().hasClass('statusReady')) {
				ready = false;
				return; // from jQuery each
			}
		});

		if (!ready)
		{
			alert("<?php _e('Only converted items can be added to mixes.\nPlease wait or reselect ready items only.\nYou can create your mix later. Conversion will continue in the background.'); ?>");
			return;
		}
		
		jQuery('.loader').show();
		jQuery.ajax({
			url: '<?php echo KalturaHelpers::getPluginUrl(); ?>/ajax_create_mix.php',
			data: { "entryIds[]": entryIds },
			success: createMixSuccess,
			error: createMixError
		});
	}

	function getSelectedIds() {
		var entryIds = [];
		jQuery('input[type=checkbox]:checked').each(function(index, element) {
			entryIds.push(element.value);
		});
		return entryIds;
	}

	function createMixSuccess(entryId) {
		var backurl = '<?php echo KalturaHelpers::generateTabUrl(array("tab" => "kaltura_upload", "kaction" => "sendtoeditor", "firstedit" => "true")); ?>';
		backurl += ('&entryIds[]=' + entryId);
		var url =  '<?php echo KalturaHelpers::getPluginUrl(); ?>/page_simple_editor_admin.php?entryId=' + entryId + '&backurl=' + escape(backurl);
		window.location.href = url;
	}

	function createMixError() {
		jQuery('.loader').hide();
		alert('<?php _e('Failed to create mix'); ?>');
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
			url: '<?php echo KalturaHelpers::getPluginUrl() ?>/ajax_save_entry_name.php'
		});

		jQuery('ul').kalturaEntryStatusChecker({
			url: '<?php echo KalturaHelpers::getPluginUrl() ?>/ajax_get_entries_status.php',
			idPrefix: 'entryId_',
			idSelector: '.entryId',
			loader: jQuery('.loader')
		});

		jQuery('ul li input[type=checkbox]').click(refreshButtonsState);
		refreshButtonsState();
	});
</script>
