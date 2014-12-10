<?php KalturaHelpers::protectView( $this ); ?>
<?php if ( $this->error ): ?>
	<div class="wrap">
		<h2><?php echo esc_html( 'All in One Video Pack Settings' ); ?></h2>
		<br />

		<div id="message" class="updated"><p>
				<strong><?php echo esc_html( 'Failed to verify partner details' ); ?></strong> (<?php echo esc_html( $this->error ); ?>)
			</p></div>
		<form name="form1" method="post" />

		<p class="submit" style="text-align: left; ">
			<input type="button" value="<?php echo esc_html( 'Click here to edit partner details manually' ); ?>" onclick="window.location = 'options-general.php?page=kaltura_options&partner_login=true';" />
		</p>
		<input type="hidden" id="manual_edit" name="manual_edit" value="true" />
		</form>
	</div>
<?php else : ?>
	<div class="wrap">
		<?php if ( $this->showMessage ): ?>
			<div id="message" class="updated"><p>
					<strong><?php echo esc_html( 'The All in One Video Pack settings have been saved.' ); ?></strong></p></div>
		<?php endif; ?>
		<h2><?php echo esc_html( 'All in One Video Pack Settings' ); ?></h2>

		<form name="form1" method="post">
			<?php wp_nonce_field( 'info', 'kaltura' ); ?>
			<br />
			<table id="kaltura-cms-login">
				<tr class="kalturaFirstRow">
					<th align="left"><?php echo esc_html( 'Partner ID' ); ?>:</th>
					<td style="padding-right: 90px;">
						<strong><?php echo esc_html(KalturaHelpers::getOption( 'kaltura_partner_id' )); ?></strong></td>
				</tr>
				<tr>
					<th align="left"><?php echo esc_html( 'KMC username' ); ?>:</th>
					<td style="padding-right: 90px;">
						<strong><?php echo esc_html(KalturaHelpers::getOption( 'kaltura_cms_user' )); ?></strong></td>
				</tr>
				<tr class="kalturaLastRow">
					<td colspan="2" align="left" style="padding-top: 10px;padding-left:10px">
						<a href="http://www.kaltura.com/index.php/kmc" target="_blank">Login</a> to the Kaltura Management Console (KMC) for advanced
						<br />media management<br />
						Learn more about the
						<a href="http://corp.kaltura.com/Products/Video-Applications/WordPress-Video-Plugin" target="_blank">new plugin features</a>
					</td>
				</tr>
			</table>
			<table>

				<tr valign="top">
					<td><label for="root_category"><?php echo esc_html( 'Root Category:' ); ?></label></td>
					<td>
						<select name="root_category" id="root_category" size="1">
							<option id="root_category_default" value="0" <?php echo KalturaHelpers::getOption( 'kaltura_root_category' ) ? "selected=\"selected\"" : ""; ?>>Root (default)</option>
							<?php foreach ( $this->categories->objects as $category ): ?>
								<option id="root_category<?php echo esc_attr( $category->id ); ?>" value="<?php echo esc_attr( $category->id ); ?>" <?php echo KalturaHelpers::getOption( 'kaltura_root_category' ) == esc_attr( $category->id ) ? "selected=\"selected\"" : ""; ?>><?php echo esc_html( $category->fullName ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<td><label><?php echo esc_html( 'Default player design:' ); ?></label></td>
					<td>
						<select name="default_player_type" id="default_player_type">

							<?php foreach ( $this->players->objects as $player ): ?>
								<option id="default_player_type_<?php echo esc_attr( $player->id ); ?>" value="<?php echo esc_attr( $player->id ); ?>" <?php echo KalturaHelpers::getOption( 'kaltura_default_player_type' ) == $player->id ? "selected=\"selected\"" : ""; ?>/><?php echo esc_html( $player->name ); ?>
							<?php endforeach; ?>
						</select>
						<br />
					</td>
				</tr>
				<tr valign="top">
					<td><label for="enable_video_comments"><?php echo esc_html( "Enable video comments?" ); ?></label></td>
					<td>
						<input type="checkbox" id="enable_video_comments" name="enable_video_comments" <?php echo KalturaHelpers::getOption( 'kaltura_enable_video_comments', true ) ? "checked=\"checked\"" : ""; ?> />
						<br />
						<br />
					</td>
				</tr>
				<tr valign="top">
					<td><label for="allow_anonymous_comments"><?php echo esc_html( "Allow anonymous video comments?" ); ?></label>
					</td>
					<td>
						<input type="checkbox" id="allow_anonymous_comments" name="allow_anonymous_comments" <?php echo KalturaHelpers::getOption( 'kaltura_allow_anonymous_comments', true ) ? "checked=\"checked\"" : ""; ?> />
						<br />
						<br />
						<br />
					</td>
				</tr>
				<tr valign="top">
					<td><label><?php echo esc_html( 'Video comments player design:' ); ?></label></td>
					<td>
						<select name="comments_player_type" id="comments_player_type">
							<?php foreach ( $this->players->objects as $player ): ?>
                                <option id="default_player_type_<?php echo esc_attr( $player->id ); ?>" value="<?php echo esc_attr( $player->id ); ?>" <?php echo KalturaHelpers::getOption( 'kaltura_comments_player_type' ) == $player->id ? "selected=\"selected\"" : ""; ?>/><?php echo esc_html( $player->name ); ?>
							<?php endforeach; ?>
						</select>
						<br />
					</td>
				</tr>

				<tr valign="top" class="parmalink_row">
					<td><label for="save_permalink"><?php echo esc_html( "Save permalink in entry metadata?" ); ?></label</td>
					<td>
						<input type="checkbox" name="save_permalink" id="save_permalink" <?php echo KalturaHelpers::getOption( 'kaltura_save_permalink', false ) ? "checked=\"checked\"" : ""; ?>/>
						<select id="permalink_metadata_profile_id" name="permalink_metadata_profile_id">
							<?php foreach ( $this->metadataProfilesResponse->objects as $metadataProfile ): ?>
								<option value="<?php echo esc_attr( $metadataProfile->id ); ?>" <?php echo KalturaHelpers::getOption( 'kaltura_permalink_metadata_profile_id' ) == esc_attr( $metadataProfile->id ) ? "selected=\"selected\"" : ""; ?>><?php echo esc_html( $metadataProfile->name ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2"><a href="javascript:;" id="advanced-button"><?php echo esc_html( 'Advanced settings' ); ?></a>
					</td>
				</tr>
				<tr valign="top" class="advanced user_identifier">
					<td width="200"><?php echo esc_html( 'WordPress user identifier field to be used by Kaltura:' ); ?></td>
					<td>
						<input type="radio" id="kaltura_user_identifier_user_login" name="kaltura_user_identifier" value="user_id" <?php echo KalturaHelpers::getOption( 'kaltura_user_identifier', 'user_login' ) == "user_id" ? "checked=\"checked\"" : ""; ?> />
						<label for="kaltura_user_identifier_user_login"><?php echo esc_html( "ID" ); ?></label>
						<br />

						<div class="user_identifier_desc">
							<?php echo esc_html( "This identifier was used in previous versions of Kaltura All in One WordPress plugin. Choose this option if you have upgraded from a previous version of Kaltura and want to keep the existing media content associated with the users that uploaded it." ); ?>
						</div>

						<input type="radio" id="kaltura_user_identifier_user_id" name="kaltura_user_identifier" value="user_login" <?php echo KalturaHelpers::getOption( 'kaltura_user_identifier', 'user_login' ) == "user_login" ? "checked=\"checked\"" : ""; ?> />
						<label for="kaltura_user_identifier_user_id"><?php echo esc_html( 'user_login' ); ?></label>
						<br />

						<div class="user_identifier_desc">
							<?php echo esc_html( "This identifier is a unique identifier across WordPress Multisite. Choose this option if this is a new installation of Kaltura All in one WordPress plugin." ); ?>
						</div>
						<br />
						<br />
					</td>

				<tr valign="top" class="advanced">
					<td><label><?php echo esc_html( 'UICONF for Kaltura Contribution Wizard:' ); ?></label></td>
					<td>
						<input name="default_kcw_type" id="default_kcw_type" value="<?php echo KalturaHelpers::getOption( 'kaltura_default_kcw_type' ) ? esc_attr(KalturaHelpers::getOption( 'kaltura_default_kcw_type' )) : esc_attr(KalturaHelpers::getOption( 'kcw_ui_conf_id_admin' )); ?>" />
						<br />
					</td>
				</tr>
				<tr valign="top" class="advanced">
					<td><label><?php echo esc_html( 'UICONF for Video Comments Contrubution Wizard:' ); ?></label></td>
					<td>
						<input name="comments_kcw_type" id="comments_kcw_type" value="<?php echo KalturaHelpers::getOption( 'kaltura_comments_kcw_type' ) ? esc_attr(KalturaHelpers::getOption( 'kaltura_comments_kcw_type' )) : esc_attr(KalturaHelpers::getOption( 'kcw_ui_conf_comments' )); ?>" />
						<br />
					</td>
				</tr>

				</tr>
				<tr>
					<td colspan="2">
						<br />

						<p class="submit" style="text-align: left; ">
							<input type="submit" name="update" value="<?php echo esc_html( 'Update' ) ?>" /></p>
					</td>
				</tr>
			</table>
			<br />
			<br />

			Please feel free to contact <a href="mailto:support@kaltura.com">support@kaltura.com</a> with any questions.
		</form>

		<script type="text/javascript">

			function kaltura_updateFormState() {
				// video comments settings
				var enableVideoComments = jQuery("input[type=checkbox][id=enable_video_comments]").attr('checked');
				if (enableVideoComments) {
					jQuery("input[type=checkbox][id=allow_anonymous_comments]").attr('disabled', false);
				}
				else {
					jQuery("input[type=checkbox][id=allow_anonymous_comments]").attr('disabled', true);
					jQuery("input[type=checkbox][id=allow_anonymous_comments]").attr('checked', false);
				}
			}

			var savePermalink = jQuery("#save_permalink").is(':checked');
			if (!savePermalink) {
				jQuery("#permalink_metadata_profile_id").css('visibility', 'hidden');
			}

			jQuery("#save_permalink").change(function () {
				var savePermalink = jQuery(this).is(':checked');
				if (!savePermalink)
					jQuery("#permalink_metadata_profile_id").css('visibility', 'hidden');
				else
					jQuery("#permalink_metadata_profile_id").css('visibility', '');
			});


			jQuery("input[type=checkbox]").click(kaltura_updateFormState);

			kaltura_updateFormState();
			jQuery('#advanced-button').click(function () {
				jQuery(this).hide();
				jQuery('tr.advanced').show();
			});

		</script>
	</div>
<?php endif;