<?php
	if (!defined("WP_ADMIN"))
		die();
		
	if (@$_POST['is_postback'] == "postback")
	{
		$name 				= $_POST['name'];
		$email 				= $_POST['email'];
		$webSiteUrl 		= $_POST['web_site_url'];
		$phoneNumber 		= $_POST['phone_number'];
		$description 		= $_POST['description'];
		$contentCategory 	= $_POST['content_category'];
		$adultContent 		= ($_POST['adult_content'] == "yes" ? "1" : null);
		$agreeToTerms 		= $_POST['agree_to_terms'];
	
		if ($agreeToTerms)
		{
			$partner = new KalturaPartner();
			$partner->name = $name;
			$partner->adminName = $name;
			$partner->adminEmail = $email;
			$partner->website = $webSiteUrl;
			$partner->phone = $phoneNumber;
			global $wp_version;
			$partner->description = $description . "\nWordpress all-in-one plugin|" . $wp_version;
			$partner->contentCategories = $contentCategory;
			$partner->adultContent = $adultContent;
			$partner->commercialUse = "non-commercial_use";
			$partner->type = "101";
			$partner->defConversionProfileType = "wp_default";
	
			$kmodel = KalturaModel::getInstance();
			$partner = $kmodel->registerPartner($partner);
			
			// check for errors
			$error = $kmodel->getLastError();
            if ($error)
            {
                $viewData["error"] = $error["message"];
            }
			else
			{
				$partnerId = $partner->id;
				$subPartnerId = $partnerId * 100;
				$secret = $partner->secret;
				$adminSecret = $partner->adminSecret;
				$cmsUser = $partner->adminEmail;
				$cmsPassword = $partner->cmsPassword;
		
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
		
		$viewData["pingOk"] = true;
	}
	else
	{
		global $user_ID;
		$profileuser = get_user_to_edit($user_ID);
		$viewData["profile"] = $profileuser;
		
		$config = KalturaHelpers::getKalturaConfiguration();
		$config->partnerId = 0; // no need to pass partner id for ping
		$config->subPartnerId = 0;
		$kalturaClient = new KalturaClient($config);
		$kmodel = KalturaModel::getInstance();
		$viewData["pingOk"] = $kmodel->pingTest($kalturaClient);
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
			Note that a Kaltura Partner ID has been created for you, and an email has been sent to the specified email address containing the ID information. The email you received also includes a link and a password to the Kaltura Management Console (KMC), where you can track and manage all information related to the All in One Video Pack.<br />
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
	<form name="form1" method="post" />
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e("Blog Name"); ?>: *</th>
				<td><input type="text" id="blog_name" name="blog_name" value="<?php bloginfo('name'); ?>" size="30" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Enter Name"); ?>: *</th>
				<td><input type="text" id="name" name="name" value="<?php echo $viewData["profile"]->nickname; ?>" size="30" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Enter Email"); ?>: *</th>
				<td><input type="text" id="email" name="email" value="<?php echo $viewData["profile"]->user_email; ?>" size="50" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Website URL"); ?>: *</th>
				<td><input type="text" id="web_site_url" name="web_site_url" value="<?php echo form_option('home'); ?>" size="50" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Description"); ?>: *</th>
				<td><textarea id="description" name="description" rows="3" cols="30" onfocus="(!jQuery(this).hasClass('touched')) ? jQuery(this).val('') : null; jQuery(this).addClass('touched');"><?php _e("Please describe how you plan to use Kaltura's video platform"); ?></textarea></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Phone Number"); ?>:</th>
				<td><input type="text" id="phone_number" name="phone_number" value="<?php _e("Enter phone number for contact"); ?>" size="30" onfocus="(!jQuery(this).hasClass('touched')) ? jQuery(this).val('') : null; jQuery(this).addClass('touched');" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Content Type"); ?>:</th>
				<td>
					<select id="content_category" name="content_category" style="width: 250px;">
						<option selected="selected" value="unknown">What is the topic of your blog?</option>
						<option value="Arts &amp; Literature">Arts &amp; Literature</option>
						<option value="Automotive">Automotive</option>
						<option value="Business">Business</option>
						<option value="Comedy">Comedy</option>
						<option value="Education">Education</option>
						<option value="Entertainment">Entertainment</option>
						<option value="Film &amp; Animation">Film &amp; Animation</option>
						<option value="Gaming">Gaming</option>
						<option value="Howto &amp; Style">Howto &amp; Style</option>
						<option value="Lifestyle">Lifestyle</option>
						<option value="Men">Men</option>
						<option value="Music">Music</option>
						<option value="News &amp; Politics">News &amp; Politics</option>
						<option value="Nonprofits &amp; Activism">Nonprofits &amp; Activism</option>
						<option value="People &amp; Blogs">People &amp; Blogs</option>
						<option value="Pets &amp; Animals">Pets &amp; Animals</option>
						<option value="Science &amp; Technology">Science &amp; Technology</option>
						<option value="Sports">Sports</option>
						<option value="Travel &amp; Events">Travel &amp; Events</option>
						<option value="Women">Women</option>
						<option value="N/A">N/A</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Do you plan to display adult content?</th>
				<td>
					<label><input type="radio" name="adult_content" value="yes" /> Yes</label>
					<label><input type="radio" name="adult_content" value="no" checked="checked" /> No</label>
				</td>
			</tr>
			<tr>
				<th colspan="2"><br /></th>
			</tr>
			<tr>
				<th colspan="2"><input type="checkbox" name="agree_to_terms" id="agree_to_terms" /> <label for="agree_to_terms">I Accept </label><a href="http://corp.kaltura.com/tandc" target="_blank">Terms of Use</a> *</th>
			</tr>
			<tr>
				<th colspan="2">* Required fields</th>
			</tr>
		</table>
		
		<p class="submit" style="text-align: left; "><input type="submit" name="Submit" value="<?php _e('Complete installation') ?>" onclick="return validateKalturaForm(); " /></p>
					
		<input type="hidden" name="is_postback" value="postback" />
	</form>
	</div>
<?php endif; ?>
