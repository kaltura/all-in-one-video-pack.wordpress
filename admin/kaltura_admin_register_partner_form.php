<?php
	if (!defined("WP_ADMIN"))
		die();
		
	if (@$_POST['is_postback'] == "postback")
	{
		$blogName 		= $_POST['blog_name'];
		$adminName 		= $_POST['admin_name'];
		$adminEmail 	= $_POST['admin_email'];
		$webSiteUrl 	= $_POST['web_site_url'];
		$agreeToTerms 	= $_POST['agree_to_terms'];
	
		if ($agreeToTerms)
		{
			$partner = new KalturaPartner();
			$partner->name = $blogName;
			$partner->adminName = $adminName;
			$partner->url1 = $webSiteUrl;
			$partner->adminEmail = $adminEmail;
			global $wp_version;
			$partner->description = "Wordpress all-in-one plugin|".$wp_version;
	
			$sessionUser = kalturaGetSessionUser();
			$config = kalturaGetServiceConfiguration();
			$kalturaClient 	= new KalturaClient($config);
			$result = $kalturaClient->registerPartner($sessionUser, $partner);

			// check for errors
			if (count(@$result["error"]))
			{
				$viewData["error"] = @$result["error"][0]["desc"];
			}
			else
			{
				$partnerId = $result["result"]["partner"]["id"];
				$subPartnerId = $result["result"]["subp_id"];
				$secret = $result["result"]["partner"]["secret"];
				$adminSecret = $result["result"]["partner"]["adminSecret"];
				$cmsUser = $result["result"]["partner"]["adminEmail"];
				$cmsPassword = $result["result"]["cms_password"];
		
				// save partner details
				update_option("kaltura_partner_id", $partnerId);
				update_option("kaltura_subp_id", $subPartnerId);
				update_option("kaltura_secret", $secret);
				update_option("kaltura_admin_secret", $adminSecret);
				update_option("kaltura_cms_user", $cmsUser);
				update_option("kaltura_cms_password", $cmsPassword);
				update_option("kaltura_permissions_add", 0);
				update_option("kaltura_permissions_edit", 0);
				update_option("kaltura_enable_video_comments", true);
				update_option("kaltura_allow_anonymous_comments", true);
				$viewData["success"] = true;
			}
		}
		else
		{
			$viewData["error"] = "You must agree to the Kaltura Terms of Use";
		}
	}
	else
	{
		global $user_ID;
		$profileuser = get_user_to_edit($user_ID);
		$viewData["profile"] = $profileuser;
		
		$config = kalturaGetServiceConfiguration();
		$kalturaClient = new KalturaClient($config);
		$viewData["pingOk"] = KalturaModel::pingTest($kalturaClient);
	}
?>


<?php if (!$viewData["pingOk"]): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Installation'); ?></h2>
		<br />
		<div class="error">
			<p>
				<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry installation.</strong>
			</p>
		</div>
		<?php
			global $wp_version;
			$php_version = phpversion();
			$details = urlencode(get_option('home'));
		?>
		<iframe src="http://corp.kaltura.com/stats/wordpress?status=ping_failed&wp_version=<?php echo $wp_version; ?>&php_version=<?php echo $php_version?>&details=<?php echo $details; ?>" width="1" height="1" border="0" style="border: 0;"></iframe>
	</div>
<?php elseif ($viewData["error"]): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Installation'); ?></h2>
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
		<p>
			Next time you write a post, you will see a new icon in the Add Media toolbar that allows you to upload and edit Interactive Videos. <br />
			<br />
			Note that a Kaltura Partner ID has been created for you, and an email has been sent to the specified email address containing the ID information. The email you received also includes a link and a password to the Kaltura Content Management System (CMS), where you can track and manage all information related to the All in One Video Pack.<br />
		</p>
		<br />
		<iframe src="http://corp.kaltura.com/activation/wordpress/p/<?php echo get_option("kaltura_partner_id"); ?>" width="1" height="1" border="0" style="border: 0;"></iframe>
		<div class="wrap">
			<a href="#" onclick="window.location.href = 'options-general.php?page=interactive_video'"><?php _e('Continue...'); ?></a>
		</div>
		<img src="http://www.kaltura.com/images/campaign.gif?type=wp&pid=<?php echo get_option("kaltura_partner_id"); ?>" alt="">
	</div>
<?php else: ?>
	<div class="wrap">
	<h2><?php _e('All in One Video Pack Installation'); ?></h2>
	<p>
		<a href="options-general.php?page=interactive_video&partner_login=true">Click here if you already have a Partner ID</a>
	</p>
    <p>
    	Once you complete the form below and click "Complete installation", the All in One Video Pack will be fully installed and ready to use. 
    </p>
	<h3><?php _e("Get a Partner ID"); ?></h3>
	<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" />
		<table class="form-table">
			<!-- Step 1 -->
			<tr valign="top">
				<th scope="row"><?php _e("Blog Name"); ?>:</th>
				<td><input type="text" id="blog_name" name="blog_name" value="<?php bloginfo('name'); ?>" size="30" readonly="readonly" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Administrator's Name"); ?>:</th>
				<td><input type="text" id="admin_name" name="admin_name" value="<?php echo $viewData["profile"]->nickname; ?>" size="30" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Administrator's Email Address"); ?>:</th>
				<td><input type="text" id="admin_email" name="admin_email" value="<?php echo $viewData["profile"]->user_email; ?>" size="40" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Website URL"); ?>:</th>
				<td><input type="text" id="web_site_url" name="web_site_url" value="<?php echo form_option('home'); ?>" size="40"" /></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="checkbox" name="agree_to_terms" id="agree_to_terms" /> <label for="agree_to_terms">I agree to comply with the <a href="http://www.kaltura.com/index.php/corp/tandc" target="_blank">Kaltura Terms of Use</a></label></td>
			</tr>
		</table>
		
		<p class="submit" style="text-align: left; "><input type="submit" name="Submit" value="<?php _e('Complete installation') ?>" /></p>
					
		<input type="hidden" name="is_postback" value="postback" />
	</form>
	</div>
<?php endif; ?>
