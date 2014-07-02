<?php KalturaHelpers::protectView( $this ); ?>
<div id="kaltura-tab-choose-videos" class="kaltura-tab">
	<div class="loader"></div>
	<div class="scroll">
		<p>
			Content has now been added to your All in One Video library. <br />
			Select the content you want to insert into post and then how you would like it to be displayed: each clip in its own video player or all selected content as a video mix in a single player.
		</p>
		<ul id="kaltura-browse">
			<?php foreach ( $this->entries as $entry ): ?>
				<?php
				$status = 'statusReady';
				if ( in_array( $entry->status, array( Kaltura_Client_Enum_EntryStatus::ERROR_IMPORTING, Kaltura_Client_Enum_EntryStatus::ERROR_CONVERTING, Kaltura_Client_Enum_EntryStatus::DELETED ) ) ) {
					$status = 'statusError';
				}
				if ( in_array( $entry->status, array( Kaltura_Client_Enum_EntryStatus::IMPORT, Kaltura_Client_Enum_EntryStatus::PRECONVERT ) ) ) {
					$status = 'statusConverting';
				}
				?>
				<li class="<?php echo esc_attr( $status ); ?>">
					<div id="entryId_<?php echo esc_attr( $entry->id ) ?>" class="entryId showName" title="<?php esc_html( 'Click to edit' ); ?>">
						<?php echo esc_html( $entry->name ) ?><br />
					</div>
					<div class="thumb">
						<img src="<?php echo esc_attr( $entry->thumbnailUrl ); ?>/width/120/height/90/type/2/bgcolor/000" alt="<?php esc_attr( $entry->name ) ?>" width="120" height="90" />

						<div class="status convertingMsg">Converting</div>
						<div class="status errorMsg">Error</div>
						<div class="overlay"></div>
					</div>
					<div class="submit">
						<input id="ckbEntryId_<?php echo esc_attr( $entry->id ) ?>" name="entryIds" type="checkbox" value="<?php echo esc_attr( $entry->id ); ?>" class="checkbox" />
						<label for="ckbEntryId_<?php echo esc_attr( $entry->id ) ?>"><?php esc_html( 'Add to player' ); ?></label>
						<br clear="all" />
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<br class="clear" />
	</div>
	<div class="options">
		<a class="button" disabled="disabled" onclick="kaltura_sendToEditor();"><?php esc_html( 'Create a player for each selected' ); ?></a>
	</div>
	<div class="fixIe7">&nbsp;</div>
</div>

<script type="text/javascript">


	function kaltura_getSelectedIds() {
		var entryIds = [];
		jQuery('input[type=checkbox]:checked').each(function (index, element) {
			entryIds.push(element.value);
		});
		return entryIds;
	}

	function kaltura_sendToEditor(entryIds, ignoreStatus) {
		if (!entryIds) {
			entryIds = kaltura_getSelectedIds();
		}

		if (entryIds.length == 0) {
			alert('<?php esc_html('Please select at least one item'); ?>');
			return;
		}

		var url = "<?php echo esc_js(KalturaHelpers::generateTabUrl(array('tab' => 'kaltura_upload', 'kaction' => 'sendtoeditor', 'firstedit' => 'true'))); ?>";
		var entryIdsParams = '&entryIds[]=';
		entryIdsParams += entryIds.join('&entryIds[]=');
		url += entryIdsParams;

		window.location.href = url;
	}

	function kaltura_refreshButtonsState() {
		if (jQuery('ul li input[type=checkbox]:checked').size() == 0) {
			jQuery('.options a').attr('disabled', true);
		}
		else {
			jQuery('.options a').removeAttr('disabled');
		}
	}

	jQuery(function () {
		var topWindow = Kaltura.getTopWindow();
		topWindow.Kaltura.animateModalSize(790, 394);

		jQuery('li div.showName').kalturaEditableName({
			namePostParam: 'entryName',
			idPostParam  : 'entryId',
			idPrefix     : 'entryId_',
			url          : ajaxurl + '?action=kaltura_ajax&kaction=saveentryname'
		});

		jQuery('ul').kalturaEntryStatusChecker({
			url       : ajaxurl + '?action=kaltura_ajax&kaction=getentriesstatus',
			idPrefix  : 'entryId_',
			idSelector: '.entryId',
			loader    : jQuery('.loader')
		});

		jQuery('ul li input[type=checkbox]').click(kaltura_refreshButtonsState);
		kaltura_refreshButtonsState();
	});
</script>
