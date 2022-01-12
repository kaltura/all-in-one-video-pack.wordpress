<?php KalturaHelpers::protectView( $this ); ?>
<?php
$defaultPlayerId =  KalturaHelpers::getOption('kaltura_default_player_type');
?>
<?php if ( $this->uiConfId ): ?>
	<script type="text/javascript">
		var playerWidth = <?php echo wp_json_encode($this->playerWidth); ?>;
		var playerHeight = <?php echo wp_json_encode($this->playerHeight); ?>;
		var uiConfId = <?php echo wp_json_encode($this->uiConfId); ?>;
		var entryId = <?php echo wp_json_encode($this->entryId); ?>;
		var isResponsive = <?php echo wp_json_encode($this->isResponsive); ?>;
		var hoveringControls = <?php echo wp_json_encode($this->hoveringControls); ?>;
		var isPlaylist = <?php echo wp_json_encode($this->isPlaylist); ?>;

		var htmlArray = [];
		htmlArray.push('[');
		htmlArray.push('kaltura-widget ');
		htmlArray.push('uiconfid="' + uiConfId + '" ');
		htmlArray.push('entryid="' + entryId + '" ');
		htmlArray.push('width="' + playerWidth + '" ');
		htmlArray.push('height="' + playerHeight + '" ');
		htmlArray.push('responsive="' + isResponsive + '" ');
		htmlArray.push('hoveringControls="' + hoveringControls + '" ');
		htmlArray.push('isplaylist="' + isPlaylist + '" ');
		htmlArray.push('/]');
		htmlArray.push('\n');

		var html = htmlArray.join('');

		function getTopWindow() {
			return (window.opener) ? window.opener : (window.parent) ? window.parent : window.top;
		}

		// let's make it safe
		try {
			var topWindow = getTopWindow();

			if (topWindow.tinyMCE && topWindow.tinyMCE.get('content') && !topWindow.tinyMCE.get('content').isHidden()) {
				var ed = topWindow.tinyMCE.activeEditor;
				if (topWindow.tinyMCE.isIE && ed.windowManager.insertimagebookmark)
					ed.selection.moveToBookmark(ed.windowManager.insertimagebookmark);

				topWindow.tinyMCE.execCommand('mceInsertRawHTML', false, html);
			}
			else {
				if (topWindow.edInsertContent) {
					topWindow.edInsertContent(topWindow.document.getElementById('content'), html);
				}
				else {
					var content = topWindow.jQuery('#content');
					content.val(content.val() + html);
				}
			}

			<?php if (count($this->nextEntryIds) > 0): ?>
			window.location.href = <?php echo wp_json_encode( esc_js( KalturaHelpers::generateTabUrl(array('tab' => 'kaltura_upload', 'kaction' => 'sendtoeditor', 'firstedit' => 'true', 'entryIds' => $this->nextEntryIds) ) ) ); ?>;
			<?php else: ?>
			setTimeout('topWindow.tb_remove()', 0);
			<?php endif; ?>
		}
		catch (e) {
			var displayEditTable = true;
		}
	</script>
	<div id="send-to-editor" class="kaltura-tab">
		<form method="post" class="kaltura-form">
			<table class="form-table" style="display: none;">
				<tr>
					<td>
						<b>We were unable to insert the player code into the editor. Please copy and paste the code as it appears below.</b>
						<br />
						<br />
						<textarea id="txtCode" rows="3" style="width: 90%" readonly="readonly"></textarea>
						<br />
						<br />
						<center>
							<input type="button" value="<?php echo esc_attr__( 'Close' ); ?>" onclick="setTimeout('topWindow.tb_remove()', 0);" name="close" class="button-secondary" />
						</center>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<script>
		if (displayEditTable) {
			jQuery("table").show();
			jQuery("#txtCode").val(html);
		}
	</script>
<?php else: ?>
	<?php
	$flashVarsStr = KalturaHelpers::sendToEditorFlashVars( $this->flashVars );
	$backUrl = esc_attr( KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_browse', 'chromeless'=>true) ) );
	$backImageUrl = esc_attr( KalturaHelpers::getPluginUrl() ) . "/images/back.gif";
	$isFirstEdit = KalturaHelpers::getRequestParam( 'firstedit' ) == 'true';
	$playersNotFoundMessage = 'No players were found in your account. Click %s to create a new player.';
	$containerClassName = 'kaltura-media-player';
	if ($this->isPlaylist) {
		$playersNotFoundMessage = 'No playlist players were found in your account. Click %s to create a new playlist player.';
		$containerClassName = 'kaltura-playlist-player';
	}
	$link = '<a target="_blank" href="' .  esc_url('http://kmc.kaltura.com/index.php/kmc/kmc4#studio|universal_studio') . '">' . __('here') . '</a>';

	?>
	<div id="send-to-editor" class="kaltura-tab <?php echo $isFirstEdit ? 'first-edit' : ''; ?> <?php echo $containerClassName;?>">
		<div class="error players-missing">
			<?php echo sprintf( __($playersNotFoundMessage), $link ); ?>
		</div>

		<?php if ( ! $isFirstEdit ) { ?>
			<div class="backDiv">
				<a href="<?php echo esc_url($backUrl); ?>"><img src="<?php echo esc_url($backImageUrl); ?>" alt="Back" /></a>
			</div>
			<div class="videoTitle">
				<h2>Title: <?php echo esc_attr( $this->entry->name ); ?></h2>
			</div>
		<?php }
		$senToPostUrl = esc_attr( KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_upload', 'kaction' => 'sendtoeditor', 'firstedit' => 'true', 'entryIds' => $this->nextEntryIds ) ) );
		?>
		<form method="post" class="kaltura-form" action="<?php echo esc_url($senToPostUrl); ?>">
			<input type="hidden" name="isplaylist"  value="<?php echo (bool) $this->isPlaylist?>" />
			<input type="hidden" class="iradio" name="playerRatio" id="playerRatioNormal"  value="<?php echo KalturaHelpers::getPlayerDimension(); ?>" />
			<div class="options">
				<div class="selectBox">
					<label for="uiConfId">Select player design:</label>
					<select name="uiConfId" id="uiConfId"></select>
				</div>
				<?php if (!$this->isPlaylist): ?>
					<div class="options-size">
						<strong>Select player size:</strong>
						<div class="radioBox">
							<input type="radio" class="iradio" name="playerWidth" id="makeResponsive" value="100%" checked><label for="makeResponsive">Responsive size</label>
						</div>

						<div class="radioBox">
							<input type="radio" class="iradio" name="playerWidth" id="playerWidthLarge" value="608" /><label for="playerWidthLarge"></label><br />
						</div>
						<div class="radioBox">
							<input type="radio" class="iradio" name="playerWidth" id="playerWidthMedium" value="400" /><label for="playerWidthMedium"></label>
						</div>
						<div class="radioBox">
							<input type="radio" class="iradio" name="playerWidth" id="playerWidthSmall" value="304" /><label for="playerWidthSmall"></label>
						</div>
						<div class="radioBox">
							<input type="radio" class="iradio" name="playerWidth" id="playerWidthCustom" value="" /><label for="playerCustomWidth">Custom width</label>
							<input type="text" name="playerCustomWidth" id="playerCustomWidth" maxlength="3" size="3" />
						</div>
					</div>
				<?php else: ?>
					<input type="hidden"  name="playerWidth" id="makeResponsive" value="100%">
				<?php endif; ?>
			</div>
			<div class="player-container">
				<div class="kaltura-loader"></div>
				<div class="entry-converting" style="display: none;">
							<span><?php echo __( 'Your media is being processed, and will appear here once it is ready.' ); ?><br><br>
								<?php echo __('You can continue and embed the media into the post without previewing.'); ?>
							</span>
				</div>
				<div class="entry-error" style="display: none;">
							<span><?php echo __( 'An error occurred while trying to process your media. Please try re-uploading the media.' ); ?><br><br>
								<?php echo __('If the error persists, please contact your site administrator.'); ?>
							</span>
				</div>
				<div class="kaltura-responsive-player-wrapper">
					<div class="player-aspect-ratio"></div>
					<div id="divKalturaPlayer"></div>
				</div>
			</div><div class="clear"></div>
			<p class="submit">
				<input type="submit" value="<?php echo esc_attr__( 'Insert into Post' ); ?>" name="sendToEditorButton" class="button-secondary" />
			</p>
		</form>
	</div>
	<script type="text/javascript">
		function kaltura_updateRatio() {
			var ratio = jQuery("input[name=playerRatio]").val();
			if (ratio == "16:9") {
				jQuery("#playerWidthLarge").next().text("Large (608x342)");
				jQuery("#playerWidthMedium").next().text("Medium (400x225)");
				jQuery("#playerWidthSmall").next().text("Small (304x171)");
			}
			else {
				jQuery("#playerWidthLarge").next().text("Large (608x456)");
				jQuery("#playerWidthMedium").next().text("Medium (400x300)");
				jQuery("#playerWidthSmall").next().text("Small (304x228)");
				jQuery("div.player-aspect-ratio").css("margin-top", "75%")
			}
		}
		jQuery(function () {
			kaltura_updateRatio();
			jQuery("#playerCustomWidth").click(function () {
				jQuery(this).siblings("[type=radio]").attr("checked", "checked");
			});

			jQuery("input[type=submit]").click(function () {
				jQuery("#playerWidthCustom").val(jQuery("#playerCustomWidth").val());
				if (jQuery("#playerWidthCustom").attr("checked")) {
					customWidth = jQuery("#playerCustomWidth").val();
					if (!customWidth.match(/^[0-9]+$/)) {
						jQuery("#playerCustomWidth").css("background-color", "red");
						return false;
					}
				}
				return true;
			});

			jQuery.kalturaPlayerSelector( {
				url            : ajaxurl + '?action=kaltura_ajax&kaction=getplayers' + <?php echo ($this->isPlaylist) ? "'&isplaylist=true'" : "''"?>,
				defaultId      : <?php echo wp_json_encode( $defaultPlayerId ); ?>,
				html5Url       : <?php echo wp_json_encode( esc_url( KalturaHelpers::getHtml5IframeUrl(null, $flashVarsStr) ) ); ?>,
				previewId      : 'divKalturaPlayer',
				entryId        : <?php echo wp_json_encode( $this->entry->id ); ?>,
				playersList    : '#uiConfId',
				dimensions     : 'input[name=playerRatio]',
				submit         : 'input[name=sendToEditorButton]',
				entryError     : <?php echo wp_json_encode( $this->entryError ); ?>,
				entryConverting: <?php echo wp_json_encode( $this->entryConverting ); ?>,
				isPlaylist     : <?php echo wp_json_encode( $this->isPlaylist); ?>,
				flashVars      : <?php echo wp_json_encode($flashVarsStr); ?>

			} );
		} );
	</script>
<?php endif;
