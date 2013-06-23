<?php KalturaHelpers::protectView($this); ?>
<?php if ($this->error): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Installation'); ?></h2>
		<br />
		<div class="error">
			<p>
				<strong><?php echo $this->error; ?></strong>
			</p>
		</div>
		<br />
		<div class="wrap">
			<a href="#" onclick="history.go(-1);"><?php _e('Back'); ?></a>
		</div>
	</div>
<?php elseif ($this->success === true): ?>
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
		<div class="wrap">
			<a href="#" onclick="window.location.href = 'options-general.php?page=kaltura_options'"><?php _e('Continue...'); ?></a>
		</div>
	</div>
<?php else: ?>
	<div class="wrap">
	<h2><?php _e('All in One Video Pack Installation'); ?></h2>
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
		
		<p class="submit" style="text-align: left;"><input type="submit" name="Submit" value="<?php _e('Complete installation') ?>" /></p>
	</form>
	</div>
<?php endif;