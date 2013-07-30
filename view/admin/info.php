<?php KalturaHelpers::protectView($this); ?>
<?php if ($this->error): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Settings'); ?></h2>
		<br />
		<div id="message" class="updated"><p><strong><?php _e('Failed to verify partner details'); ?></strong> (<?php echo $this->error; ?>)</p></div>
		<form name="form1" method="post" />
		<p class="submit" style="text-align: left; "><input type="button" value="<?php _e('Click here to edit partner details manually'); ?>" onclick="window.location = 'options-general.php?page=kaltura_options&partner_login=true';"></input></p>
		<input type="hidden" id="manual_edit" name="manual_edit" value="true" />
		</form>
	</div>
<?php else: ?>
	<div class="wrap">
		<?php if ($this->showMessage): ?>
			<div id="message" class="updated"><p><strong><?php _e('The All in One Video Pack settings have been saved.'); ?></strong></p></div>
		<?php endif; ?>
		<h2><?php _e('All in One Video Pack Settings'); ?></h2>
		<form name="form1" method="post">
			<br />
			<table id="kaltura-cms-login">
				<tr class="kalturaFirstRow">
					<th align="left"><?php _e('Partner ID'); ?>:</th>
					<td style="padding-right: 90px;"><strong><?php echo KalturaHelpers::getOption("kaltura_partner_id"); ?></strong></td>
				</tr>
				<tr>
					<th align="left"><?php _e('KMC username'); ?>:</th>
					<td style="padding-right: 90px;"><strong><?php echo KalturaHelpers::getOption("kaltura_cms_user"); ?></strong></td>
				</tr>
				<tr class="kalturaLastRow">
					<td colspan="2" align="left" style="padding-top: 10px;padding-left:10px">
						<a href="http://www.kaltura.com/index.php/kmc" target="_blank">Login</a> to the Kaltura Management Console (KMC) for advanced <br />media management<br />
						Learn more about the <a href="http://corp.kaltura.com/Products/Video-Applications/WordPress-Video-Plugin" target="_blank">new plugin features</a>
					</td>
				</tr>
			</table>
			<table>
				<tr valign="top">
					<td><label><?php _e("Default player design:"); ?></label></td>
					<td>
						<?php foreach($this->players->objects as $player): ?>
							<input type="radio" name="default_player_type" id="default_player_type_<?php echo $player->id; ?>" value="<?php echo $player->id; ?>" <?php echo KalturaHelpers::getOption("kaltura_default_player_type") == $player->id ? "checked=\"checked\"" : ""; ?>/>&nbsp;&nbsp;<label for="default_player_type_<?php echo $player->id; ?>"><?php echo $player->name; ?></label><br />
						<?php endforeach; ?>
						<br />
					</td>
				</tr>
				<tr valign="top">
					<td><label for="enable_video_comments"><?php _e("Enable video comments?"); ?></label></td>
					<td>
						<input type="checkbox" id="enable_video_comments" name="enable_video_comments" <?php echo KalturaHelpers::getOption("kaltura_enable_video_comments",true) ? "checked=\"checked\"" : ""; ?> />
						<br />
						<br />
					</td>
				</tr>
				<tr valign="top">
					<td><label for="allow_anonymous_comments"><?php _e("Allow anonymous video comments?"); ?></label></td>
					<td>
						<input type="checkbox" id="allow_anonymous_comments" name="allow_anonymous_comments" <?php echo KalturaHelpers::getOption("kaltura_allow_anonymous_comments",true) ? "checked=\"checked\"" : ""; ?> />
						<br />
						<br />
						<br />
					</td>
				</tr>
				<tr valign="top">
					<td><label><?php _e("Video comments player design:"); ?></label></td>
					<td>
						<?php foreach($this->players->objects as $player): ?>
							<input type="radio" name="comments_player_type" id="comments_player_type_<?php echo $player->id; ?>" value="<?php echo $player->id; ?>" <?php echo KalturaHelpers::getOption("kaltura_comments_player_type") == $player->id ? "checked=\"checked\"" : ""; ?>/>&nbsp;&nbsp;<label for="comments_player_type_<?php echo $player->id; ?>"><?php echo $player->name; ?></label><br />
						<?php endforeach; ?>
						<br />
					</td>
				</tr>

				<tr valign="top" class="parmalink_row">
					<td><label for="save_permalink"><?php _e("Save permalink in entry metadata?"); ?></label</td>
					<td>
						<input type="checkbox" name="save_permalink" id="save_permalink" <?php echo KalturaHelpers::getOption("kaltura_save_permalink",false) ? "checked=\"checked\"" : ""; ?>/>
						<select id="permalink_metadata_profile_id" name="permalink_metadata_profile_id">
							<?php foreach ($this->metadataProfilesResponse->objects as $metadataProfile):?>
								<option  value="<?php echo $metadataProfile->id;?>" <?php echo KalturaHelpers::getOption("kaltura_permalink_metadata_profile_id") == $metadataProfile->id ? "selected=\"selected\"" : ""; ?>><?php echo $metadataProfile->name;?></option>
							<?php endforeach;?>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2"><a href="javascript:;" id="advanced-button"><?php _e("Advanced settings"); ?></a></td>
				</tr>
				<tr valign="top" class="advanced user_identifier">
					<td width="200"><?php _e("WordPress user identifier field to be used by Kaltura:"); ?></td>
					<td>
						<input type="radio" id="kaltura_user_identifier_user_login" name="kaltura_user_identifier" value="user_id" <?php echo KalturaHelpers::getOption("kaltura_user_identifier", 'user_login') == "user_id" ? "checked=\"checked\"" : ""; ?> />
						<label for="kaltura_user_identifier_user_login"><?php _e("ID"); ?></label>
						<br />
						<div class="user_identifier_desc">
							<?php _e("This identifier was used in previous versions of Kaltura All in One WordPress plugin. Choose this option if you have upgraded from a previous version of Kaltura and want to keep the existing media content associated with the users that uploaded it."); ?>
						</div>

						<input type="radio" id="kaltura_user_identifier_user_id" name="kaltura_user_identifier" value="user_login" <?php echo KalturaHelpers::getOption("kaltura_user_identifier", 'user_login') == "user_login" ? "checked=\"checked\"" : ""; ?> />
						<label for="kaltura_user_identifier_user_id"><?php _e("user_login"); ?></label>
						<br />
						<div class="user_identifier_desc">
							<?php _e("This identifier is a unique identifier across WordPress Multisite. Choose this option if this is a new installation of Kaltura All in one WordPress plugin."); ?>
						</div>
						<br />
						<br />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<br />
						<p class="submit" style="text-align: left; "><input type="submit" name="update" value="<?php _e('Update') ?>" /></p>
					</td>
				</tr>
			</table>
			<br />
			<br />

			Please feel free to contact <a href="mailto:support@kaltura.com">support@kaltura.com</a> with any questions.
		</form>

		<script type="text/javascript">

			function updateFormState() {
				// video comments settings
				var enableVideoComments = jQuery("input[type=checkbox][id=enable_video_comments]").attr('checked');
				if (enableVideoComments)
				{
					jQuery("input[type=checkbox][id=allow_anonymous_comments]").attr('disabled', false);
				}
				else
				{
					jQuery("input[type=checkbox][id=allow_anonymous_comments]").attr('disabled', true);
					jQuery("input[type=checkbox][id=allow_anonymous_comments]").attr('checked', false);
				}
			}

			var savePermalink = jQuery("#save_permalink").is(':checked');
			if(!savePermalink) {
				jQuery("#permalink_metadata_profile_id").css('visibility', 'hidden');
			}

			jQuery("#save_permalink").change(function() {
				var savePermalink  = jQuery(this).is(':checked');
				if(!savePermalink)
					jQuery("#permalink_metadata_profile_id").css('visibility', 'hidden');
				else
					jQuery("#permalink_metadata_profile_id").css('visibility', '');
			});


			jQuery("input[type=checkbox]").click(updateFormState);

			updateFormState();
			jQuery('#advanced-button').click(function(){
				jQuery(this).hide();
				jQuery('tr.advanced').show();
			});
		</script>
	</div>
<?php endif;