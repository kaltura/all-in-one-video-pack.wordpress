<?php KalturaHelpers::protectView( $this ); ?>
<?php if ( $this->uiConfId ): ?>
	<script type="text/javascript">
		var playerWidth = <?php echo wp_json_encode($this->playerWidth); ?>;
		var playerHeight = <?php echo wp_json_encode($this->playerHeight); ?>;
		var uiConfId = <?php echo wp_json_encode($this->uiConfId); ?>;
		var entryId = <?php echo wp_json_encode($this->entryId); ?>;
		var isResponsive = <?php echo wp_json_encode($this->isResponsive); ?>;

		var htmlArray = [];
		htmlArray.push('[');
		htmlArray.push('kaltura-widget ');
		htmlArray.push('uiconfid="' + uiConfId + '" ');
		htmlArray.push('entryid="' + entryId + '" ');
		htmlArray.push('width="' + playerWidth + '" ');
		htmlArray.push('height="' + playerHeight + '" ');
		htmlArray.push('responsive="' + isResponsive + '" ');
		htmlArray.push('/]');
		htmlArray.push('\n');


		var html = htmlArray.join('');

		// lets make it safe
		try {
			var topWindow = Kaltura.getTopWindow();

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
	$flashVarsStr = KalturaHelpers::flashVarsToString( $this->flashVars );
	$backUrl = esc_attr( KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_browse' ) ) );
	$backImageUrl = esc_attr( KalturaHelpers::getPluginUrl() ) . "/images/back.gif";

	?>

	<div id="send-to-editor" class="kaltura-tab">
		<?php if ( KalturaHelpers::getRequestParam( 'firstedit' ) != 'true' ) { ?>
			<div class="backDiv">
				<a href="<?php echo esc_url($backUrl); ?>"><img src="<?php echo esc_url($backImageUrl); ?>" alt="Back" /></a>
			</div>
		<?php }
		$senToPostUrl = esc_attr( KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_upload', 'kaction' => 'sendtoeditor', 'firstedit' => 'true', 'entryIds' => $this->nextEntryIds ) ) );
		?>
		<form method="post" class="kaltura-form" action="<?php echo esc_url($senToPostUrl); ?>">
			<table class="form-table">
				<tr>
					<td valign="top">
						<table class="options">
							<tr>
								<td style="padding-bottom:22px;" colspan="2">
									<?php if ($this->isLibrary) ?>
									<span>Title: <?php echo esc_attr( $this->entry->name ); ?></span>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<div class="selectBox">
										<label for="uiConfId">Select player design:</label>
										<select name="uiConfId" id="uiConfId"></select>
										<?php if ( isset( $selectedPlayerName ) ): ?>
											<script type="text/javascript">
												embedPreviewPlayer('<?php echo esc_js($selectedPlayerName); ?>');
											</script>
										<?php endif; ?>
									</div>
									<div class="checkBox">
										<input type="checkbox" name="makeResponsive" id="makeResponsive" onchange="kaltura_updateResponsiveState();">
										<label for="makeResponsive">Make responsive</label>
									</div>
								</td>
								<td valign="top" style="padding-left:25px;">
									<strong>Player Dimensions:</strong>

									<div class="playerRatioDiv">
										<span><input type="radio" class="iradio" name="playerRatio" id="playerRatioNormal" onclick="kaltura_updateRatio();" value="4:3" checked="checked" /><label for="playerRatioNormal">Normal</label></span>&nbsp;&nbsp;
										<span><input type="radio" class="iradio" name="playerRatio" id="playerRatioWide" onclick="kaltura_updateRatio();" value="16:9" /><label for="playerRatioWide">Widescreen</label></span>
									</div>
									<strong>Select player size:</strong>

									<div class="radioBox">
										<input type="radio" class="iradio" name="playerWidth" id="playerWidthLarge" value="608" checked="checked" /><label for="playerWidthLarge"></label><br />
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
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" width="240">
						<div class="kaltura-loader"></div>
						<div id="divKalturaPlayer"></div>
						<script type="text/javascript">
							function kaltura_updateRatio() {
								var ratio = jQuery("input[name=playerRatio]:checked").val();
								if (ratio == "16:9") {
									jQuery("#playerWidthLarge").next().text("Large (608x372)");
									jQuery("#playerWidthMedium").next().text("Medium (400x255)");
									jQuery("#playerWidthSmall").next().text("Small (304x201)");
								}
								else {
									jQuery("#playerWidthLarge").next().text("Large (608x486)");
									jQuery("#playerWidthMedium").next().text("Medium (400x330)");
									jQuery("#playerWidthSmall").next().text("Small (304x258)");
								}
							}

							function kaltura_updateResponsiveState() {
								var $elements = jQuery();
								$elements = $elements.add('#playerWidthLarge,#playerWidthMedium,#playerWidthSmall');
								$elements = $elements.add('#playerWidthCustom,#playerCustomWidth');
								if (jQuery('#makeResponsive').prop('checked')) {
									jQuery("#playerWidthMedium").click();
									$elements.prop('disabled', true);
								}
								else {
									$elements.prop('disabled', false);
								}

							}
						</script>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" value="<?php echo esc_attr__( 'Insert into Post' ); ?>" name="sendToEditorButton" class="button-secondary" />
			</p>
		</form>
	</div>
	<script type="text/javascript">
		jQuery(function () {
			kaltura_updateRatio();
			kaltura_updateResponsiveState();

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

			jQuery.kalturaPlayerSelector({
				url        : ajaxurl + '?action=kaltura_ajax&kaction=getplayers',
				defaultId  : <?php echo wp_json_encode(get_option('kaltura_default_player_type')); ?>,
				html5Url : <?php echo wp_json_encode(esc_url(KalturaHelpers::getHtml5IframeUrl())); ?>,
				previewId  : 'divKalturaPlayer',
				entryId    : <?php echo wp_json_encode($this->entry->id); ?>,
				playersList: '#uiConfId',
				dimensions : 'input[name=playerRatio]',
				submit     : 'input[name=sendToEditorButton]',
				onSelect   : function () {
					kaltura_fixHeight();
				}
			});

			function kaltura_fixHeight() {
				var topWindow = Kaltura.getTopWindow();
			}

			kaltura_fixHeight();
		});
	</script>
<?php endif;
