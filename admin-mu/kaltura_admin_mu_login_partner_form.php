<?php
if (! defined("WP_ADMIN"))
    die();

if (@$_POST['is_postback'] == "postback") {
    $email = @$_POST['email'];
    $password = @$_POST['password'];
    $partnerId = @$_POST['partner_id'];
    
    $config = KalturaHelpers::getKalturaConfiguration();
    $config->partnerId = $partnerId;
    $kalturaClient = new KalturaClient($config);
    $kmodel = KalturaModel::getInstance();
    $partner = $kmodel->getSecrets($partnerId, $email, $password);
    
    // check for errors
    if ($kmodel->getLastError()) {
        $error = $kmodel->getLastError();
        $viewData["error"] = $error["message"];
    }
    else {
        $partnerId = $partner->id;
        $secret = $partner->secret;
        $adminSecret = $partner->adminSecret;
        $cmsUser = $partner->adminEmail;
        
        // save partner details
        update_site_option("kaltura_partner_id", $partnerId);
		update_site_option("kaltura_secret", $secret);
		update_site_option("kaltura_admin_secret", $adminSecret);
		update_site_option("kaltura_cms_user", $cmsUser);

		// set site default
		update_site_option("kaltura_permissions_add", 0);
		update_site_option("kaltura_permissions_edit", 0);
		update_site_option("kaltura_enable_video_comments", true);
		update_site_option("kaltura_allow_anonymous_comments", true);

        $viewData["success"] = true;
    }
}
?>

<?php if ($viewData["error"]): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Settings'); ?></h2>
		<br />
		<div class="error">
			<p>
				<strong><?php echo $viewData["error"]; ?></strong>
			</p>
		</div>
		<br />
		<div class="wrap">
			<a href="#" onclick="history.go(-1);"><?php _e('Back'); ?></a>
		</div>
	</div>
<?php elseif (@$viewData["success"] === true): ?>
	<div class="wrap">
		<h2><?php _e('Congratulations!'); ?></h2>
		<br />
		<div class="updated fade">
			<p>
				<strong>You have successfully installed the All in One Video Pack. </strong>
			</p>
		</div>
		<br />
		<div class="wrap">
			<a href="#" onclick="window.location.href = 'settings.php?page=all-in-one-video-pack-mu-settings'"><?php _e('Continue...'); ?></a>
		</div>
	</div>
<?php else: ?>
	<div class="wrap">
	<h2><?php _e('All in One Video Pack MU Installation'); ?></h2>
	<p>
		This installation page should be used in order to configure the default Kaltura integration settings for all sub blogs.
	</p>
    <p>
		Please enter your Kaltura Management Console (KMC) Email & password
    </p>
	<form name="form1" method="post" />
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e("Partner ID"); ?>:</th>
				<td><input type="text" id="partner_id" name="partner_id" value="" size="10" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Email"); ?>:</th>
				<td><input type="text" id="email" name="email" value="" size="40" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Password"); ?>:</th>
				<td><input type="password" id="password" name="password" value="" size="20" /> <a href="<?php echo KalturaHelpers::getServerUrl(); ?>/index.php/kmc">forgot password?</a></td>
			</tr>
		</table>
		
		<p class="submit" style="text-align: left; "><input type="submit" name="Submit" value="<?php _e('Complete installation') ?>" /></p>
					
		<input type="hidden" name="is_postback" value="postback" />
	</form>
	</div>
<?php endif; ?>
