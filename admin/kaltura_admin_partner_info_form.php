<?php
	global $KALTURA_DEFAULT_PLAYERS;
	if (!defined("WP_ADMIN"))
		die();
		
	if (@$_POST['is_postback'] == "postback")
	{
		$enable_video_comments = @$_POST["enable_video_comments"] ? true : false;
		$allow_anonymous_comments = @$_POST["allow_anonymous_comments"] ? true : false;
		$default_player_type = $_POST["default_player_type"];
		$comments_player_type = $_POST["comments_player_type"];
		$user_identifier = $_POST["kaltura_user_identifier"];
		$permalink_metadata_profile_id = $_POST["permalink_metadata_profile_id"];
		$save_permalink = $_POST["save_permalink"];
		
		update_option("kaltura_enable_video_comments", $enable_video_comments);
		update_option("kaltura_allow_anonymous_comments", $allow_anonymous_comments);
		update_option("kaltura_default_player_type", $default_player_type);
		update_option("kaltura_comments_player_type", $comments_player_type);
		update_option("kaltura_user_identifier", $user_identifier);
		update_option("kaltura_permalink_metadata_profile_id", $permalink_metadata_profile_id);
		update_option("kaltura_save_permalink", $save_permalink);
		
		
		$viewData["showMessage"] = true;
	}
	else
	{
		// try to create new session to make sure that the details are ok
		$userId 	    = KalturaHelpers::getLoggedUserID();
		$config 		= KalturaHelpers::getKalturaConfiguration();
		$secret 		= KalturaHelpers::getOption("kaltura_secret");
		$adminSecret	= KalturaHelpers::getOption("kaltura_admin_secret");
		$kalturaClient 	= new KalturaClient($config);
		
		$kmodel = KalturaModel::getInstance();
		
		$ks = $kmodel->getAdminSession();
		if ($kmodel->getLastError())
		{
			$error = $kmodel->getLastError();
		    $viewData["error"] = $error["message"] . ' - ' . $error["code"];
		}   
		
		$ks = $kmodel->getClientSideSession();
		if ($kmodel->getLastError())
		{
			$error = $kmodel->getLastError();
		    $viewData["error"] = $error["message"] . ' - ' . $error["code"];
		}
	}
?>


<?php if ($viewData["error"]): ?>

<div class="wrap">
	<h2><?php _e('All in One Video Pack Settings'); ?></h2>
	<br />
	<div id="message" class="updated"><p><strong><?php _e('Failed to verify partner details'); ?></strong> (<?php echo $viewData["error"]; ?>)</p></div>
	<form name="form1" method="post" />
	<p class="submit" style="text-align: left; "><input type="button" value="<?php _e('Click here to edit partner details manually'); ?>" onclick="window.location = 'options-general.php?page=interactive_video&partner_login=true';"></input></p>
	<input type="hidden" id="manual_edit" name="manual_edit" value="true" />
	</form>
</div>

<?php else: ?>
<div class="wrap">
<?php if ($viewData["showMessage"]): ?>
	<div id="message" class="updated"><p><strong><?php _e('The All in One Video Pack settings have been saved.'); ?></strong></p></div>
	<?php endif; ?>
	<h2><?php _e('All in One Video Pack Settings'); ?></h2>
	<form name="form1" method="post" />
		<br />
		<table id="kalturaCmsLogin">
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
					Learn More about <a href="http://wordpress.kaltura.org/" target="_blank">new plugin features</a>
				</td>
			</tr>
		</table>
		<table>
			<tr valign="top">
				<td><?php _e("Enable video comments?"); ?></td>
				<td>
					<input type="checkbox" id="enable_video_comments" name="enable_video_comments" <?php echo KalturaHelpers::getOption("kaltura_enable_video_comments",true) ? "checked=\"checked\"" : ""; ?> />
					<br />
					<br />
				</td>
			</tr>
			<tr valign="top">
				<td><?php _e("Allow anonymous video comments?"); ?></td>
				<td>
					<input type="checkbox" id="allow_anonymous_comments" name="allow_anonymous_comments" <?php echo KalturaHelpers::getOption("kaltura_allow_anonymous_comments",true) ? "checked=\"checked\"" : ""; ?> />
					<br />
					<br />
					<br />
				</td>
			</tr>
			<?php
				$kmodel = KalturaModel::getInstance();
				$players = $kmodel->listPlayersUiConfs(); 
			?>
			<tr valign="top">
				<td><?php _e("Video comments player design:"); ?></td>
				<td>
					<?php foreach($players->objects as $player): ?>
						<input type="radio" name="comments_player_type" id="comments_player_type_<?php echo $player->id; ?>" value="<?php echo $player->id; ?>" <?php echo @get_option("kaltura_comments_player_type",$KALTURA_DEFAULT_PLAYERS[0]['id']) == $player->id ? "checked=\"checked\"" : ""; ?>/>&nbsp;&nbsp;<label for="comments_player_type_<?php echo $player->id; ?>"><?php echo $player->name; ?></label><br />
					<?php endforeach; ?>
					<br />
				</td>
			</tr>
			<tr valign="top">
				<td><?php _e("Default player design:"); ?></td>
				<td>
					<?php foreach($players->objects as $player): ?>
						<input type="radio" name="default_player_type" id="default_player_type_<?php echo $player->id; ?>" value="<?php echo $player->id; ?>" <?php echo @get_option("kaltura_default_player_type",$KALTURA_DEFAULT_PLAYERS[0]['id']) == $player->id ? "checked=\"checked\"" : ""; ?>/>&nbsp;&nbsp;<label for="default_player_type_<?php echo $player->id; ?>"><?php echo $player->name; ?></label><br />
					<?php endforeach; ?>
					<br />
				</td>
			</tr>
			<?php 
				/* @var $metadataProfile KalturaMetadataProfile */
				$metadataProfilesResponse = $kmodel->getMetadataProfilesTypeEntry();
			?>
			<tr valign="top">
				<td style="padding-top:6px;"><?php _e("Save permalink in entry metadata?"); ?></td>
				<td>
					<input type="checkbox" name="save_permalink" id="save_permalink" <?php echo @get_option("kaltura_save_permalink",false) ? "checked=\"checked\"" : ""; ?>/>
					<select id="permalink_metadata_profile_id" name="permalink_metadata_profile_id">
						<?php foreach ($metadataProfilesResponse->objects as $metadataProfile):?>
								<option  value="<?php echo $metadataProfile->id;?>" <?php echo @get_option("kaltura_permalink_metadata_profile_id") == $metadataProfile->id ? "selected=\"selected\"" : ""; ?>><?php echo $metadataProfile->name;?></option>
						<? endforeach;?>
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
		<input type="hidden" name="is_postback" value="postback" />
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
		if(!savePermalink){
			jQuery("#permalink_metadata_profile_id").hide();
		}

		jQuery("#save_permalink").click(function(){
			var savePermalink  = jQuery(this).is(':checked');
			if(!savePermalink){
				jQuery("#permalink_metadata_profile_id").hide();
			}
			else{
				jQuery("#permalink_metadata_profile_id").show();
			}
		});
		
		
		jQuery("input[type=checkbox]").click(updateFormState);
		
		// simulate the click to restore the ui state as it should be

		jQuery('#advanced-button').click(function(){
			jQuery(this).hide();
			jQuery('tr.advanced').show();
		});
	</script>
</div>
<?php endif; ?>