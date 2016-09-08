<?php KalturaHelpers::protectView( $this ); ?>
<?php if ( $this->error ): ?>
	<div class="wrap">
		<h2>All in One Video Pack Settings</h2>
		<br />

		<div id="message" class="updated">
			<p>
				<strong>Failed to verify partner details</strong> (<?php echo esc_html( $this->error ); ?>)
			</p></div>
		<form name="form1" method="post" >

		<p class="submit" style="text-align: left; ">
			<input type="button" value="Click here to edit partner details manually" onclick="window.location = '<?php echo esc_url( admin_url( 'options-general.php?page=kaltura_options&partner_login=true' ) ); ?>';" />
		</p>
		<input type="hidden" id="manual_edit" name="manual_edit" value="true" />
		</form>
	</div>
<?php else : ?>
	<div class="wrap">
		<?php if ( $this->showMessage ): ?>
			<div id="message" class="updated">
				<p>
					<strong>The All in One Video Pack settings have been saved.</strong>
				</p>
			</div>
		<?php endif; ?>
		<?php if ( $this->isNetworkActive ): ?>
			<div class="notice notice-warning">
				<p>
					<strong>
						<?php echo __( 'Note: The All in One Video plugin settings are controlled by the network admin. You may view the settings, but not update them.' ); ?>
					</strong>
				</p>
			</div>
		<?php endif; ?>
		<h2>All in One Video Pack Settings</h2>

		<form name="form1" method="post">
			<?php wp_nonce_field( 'info', '_kalturanonce' ); ?>
			<br />
			<table id="kaltura-cms-login">
				<tr class="kalturaFirstRow">
					<th align="left">Partner ID:</th>
					<td style="padding-right: 90px;">
						<strong><?php echo esc_html(KalturaHelpers::getOption( 'kaltura_partner_id' )); ?></strong></td>
				</tr>
				<tr>
					<th align="left">KMC username:</th>
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
					<td><label for="root_category">Root Category:</label></td>
					<td>
						<select name="root_category" id="root_category" size="1">
							<option id="root_category_default" value="0" <?php echo selected( KalturaHelpers::getOption( 'kaltura_root_category' ), 0 ); ?>>Root (default)</option>
							<?php foreach ( $this->categories->objects as $category ): ?>
								<option id="root_category<?php echo esc_attr( $category->id ); ?>" value="<?php echo esc_attr( $category->id ); ?>" <?php echo selected( KalturaHelpers::getOption( 'kaltura_root_category' ), esc_attr( $category->id ) ); ?>><?php echo esc_html( $category->fullName ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<td><label for="default_player_type">Default player design:</label></td>
					<td>
						<select name="default_player_type" id="default_player_type">
							<?php foreach ( $this->players as $player ): ?>
								<option id="default_player_type_<?php echo esc_attr( $player->id ); ?>" value="<?php echo esc_attr( $player->id ); ?>" <?php echo selected( KalturaHelpers::getOption( 'kaltura_default_player_type' ), $player->id ); ?>><?php echo esc_html( $player->name ); ?></option>
							<?php endforeach; ?>
						</select>
						<br />
					</td>
				</tr>

				<tr valign="top">
					<td><label>Allow users to select existing media:</label></td>
					<td>
						<input type="radio" name="show_media_from" id="show_media_from_all_account" value="all_account" <?php echo checked( KalturaHelpers::getOption( 'kaltura_show_media_from' ) === 'all_account' ); ?>/>
						<label for="show_media_from_all_account">All media in publisher account</label>
						<br />
						<input type="radio" name="show_media_from" id="show_media_from_logged_in_user" value="logged_in_user" <?php echo checked( KalturaHelpers::getOption( 'kaltura_show_media_from' ) === 'logged_in_user' ); ?> />
						<label for="show_media_from_logged_in_user">Only the user’s own media</label>
					</td>
				</tr>

				<tr>
					<td colspan="2"><a href="javascript:;" id="advanced-button">Advanced settings</a>
					</td>
				</tr>
				<tr valign="top" class="advanced user_identifier">
					<td width="200">WordPress user identifier field to be used by Kaltura:</td>
					<td>
						<input type="radio" id="kaltura_user_identifier_user_login" name="kaltura_user_identifier" value="user_id" <?php echo checked( KalturaHelpers::getOption( 'kaltura_user_identifier', 'user_login' ) == "user_id" ); ?> />
						<label for="kaltura_user_identifier_user_login">ID</label>
						<br />

						<div class="user_identifier_desc">
							This identifier was used in previous versions of Kaltura All in One WordPress plugin. Choose this option if you have upgraded from a previous version of Kaltura and want to keep the existing media content associated with the users that uploaded it.
						</div>

						<input type="radio" id="kaltura_user_identifier_user_id" name="kaltura_user_identifier" value="user_login" <?php echo checked( KalturaHelpers::getOption( 'kaltura_user_identifier', 'user_login' ) == "user_login" ); ?> />
						<label for="kaltura_user_identifier_user_id">user_login</label>
						<br />

						<div class="user_identifier_desc">
							This identifier is a unique identifier across WordPress Multisite. Choose this option if this is a new installation of Kaltura All in one WordPress plugin.
						</div>
						<br />
						<br />
					</td>
				</tr>

				<tr valign="top" class="advanced">
					<td><label for="enable_kcw">Enable legacy flash uploader:</label></td>
					<td>
						<input type="checkbox" name="enable_kcw" id="enable_kcw" <?php echo checked( KalturaHelpers::getOption( 'kaltura_enable_kcw', false ) ); ?>" />
						<br />
					</td>
				</tr>

				<tr valign="top" class="advanced">
					<td><label for="default_kcw_type">UICONF for Kaltura Contribution Wizard:</label></td>
					<td>
						<input name="default_kcw_type" id="default_kcw_type" value="<?php echo esc_attr( KalturaHelpers::getOption( 'kaltura_default_kcw_type', KalturaHelpers::getOption( 'kcw_ui_conf_id_admin' ) ) ); ?>" />
						<br />
					</td>
				</tr>


				<tr valign="top" class="advanced available-players">
					<td><label>Allowed players:</label></td>
					<td>
						<div class="players-scroll">
						<?php foreach ( $this->players as $player ): ?>
							<label><input type="checkbox" class="radio" value="<?php echo esc_attr( $player->id ); ?>" <?php echo checked(isset($this->allowedPlayers[$player->id])); ?> name="allowed_players[]" /><?php echo esc_html( $player->name ); ?></label>
						<?php endforeach; ?>
						</div>
						<br />
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<br />

						<p class="submit" style="text-align: left; ">
							<input type="submit" name="update" value="Update" /></p>
					</td>
				</tr>
			</table>
			<br />
			<br />

			Please feel free to contact <a href="mailto:support@kaltura.com">support@kaltura.com</a> with any questions.
		</form>

		<script type="text/javascript">
			<?php if($this->isNetworkActive): ?>
			jQuery( 'input, select' ).attr( 'disabled', true );
			jQuery( '.kalturaLastRow' ).hide();
			<?php endif; ?>
			jQuery('#advanced-button').click(function () {
				jQuery(this).hide();
				jQuery('tr.advanced').show();
			});

			function setKcwState() {
				if (jQuery('#enable_kcw').prop('checked'))
					jQuery('#default_kcw_type').prop('disabled', false);
				else
					jQuery('#default_kcw_type').prop('disabled', true);
			}

			jQuery('#enable_kcw').change(setKcwState);
			setKcwState();

		</script>
	</div>
<?php endif;