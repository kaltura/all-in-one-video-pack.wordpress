<?php KalturaHelpers::protectView($this); ?>
<?php if (!$this->pingOk): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Installation'); ?></h2>
		<br />
		<div class="error">
			<p>
				<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry installation.</strong>
			</p>
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
		<?php if (isset($this->error)): ?>
			<br />
			<div class="error">
				<p>
					<strong><?php echo $this->error; ?></strong>
				</p>
			</div>
		<?php endif; ?>
		<p>
			<a href="options-general.php?page=kaltura_options&partner_login=true">Click here if you already have a Partner ID</a>
		</p>
		<p>
			Once you complete the form below and click "Complete installation", the All in One Video Pack will be fully installed and ready to use.
		</p>
		<h3><?php _e("Get a Partner ID"); ?></h3>
		<form name="form1" method="post" class="registration" />
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e("First Name"); ?>: *</th>
				<td><input type="text" id="first_name" name="first_name" value="<?php echo KalturaHelpers::getRequestPostParam('first_name'); ?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Last Name"); ?>: *</th>
				<td><input type="text" id="last_name" name="last_name" value="<?php echo KalturaHelpers::getRequestPostParam('last_name'); ?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Email"); ?>: *</th>
				<td><input type="text" id="email" name="email" value="<?php echo KalturaHelpers::getRequestPostParam('email'); ?>" size="50" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Phone"); ?>: *</th>
				<td><input type="text" id="phone" name="phone" value="<?php echo KalturaHelpers::getRequestPostParam('phone'); ?>" size="30" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Company"); ?>: *</th>
				<td><input type="text" id="company" name="company" value="<?php echo KalturaHelpers::getRequestPostParam('company'); ?>" size="30" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Website"); ?>:</th>
				<td><input type="text" id="website" name="website" value="<?php echo KalturaHelpers::getRequestPostParam('website'); ?>" size="50" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e("Job Title"); ?>: *</th>
				<td><input type="text" id="job_title" name="job_title" value="<?php echo KalturaHelpers::getRequestPostParam('job_title'); ?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Describe yourself: *</th>
				<td>
					<select id="describe_yourself" name="describe_yourself">
						<option value="">Please select...</option>
						<?php
						$selectData = array(
							'Enterprise / Small Business / Government Agency' => 'Enterprise',
							'Education Organization' => 'Education',
							'Media Company / Agency' => 'Media',
							'CDN / ISP / Integrator / Hosting Provider' => 'Service Provider',
							'Other' => 'Other',
						);
						?>
						<?php foreach($selectData as $name => $value): ?>
							<option value="<?php echo $value; ?>" <?php echo (KalturaHelpers::getRequestPostParam('describe_yourself') == $value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Country: *</th>
				<td>
					<select id="country" name="country">
						<option value="">Please select...</option>
						<?php foreach($this->countries as $value => $name): ?>
							<option value="<?php echo $value; ?>" <?php echo (KalturaHelpers::getRequestPostParam('country') == $value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">State/Province: *</th>
				<td>
					<select id="state" name="state">
						<?php $statesNew = array(); ?>
						<?php $statesNew[''] = ''; ?>
						<?php $states = array_merge($statesNew, $this->states); ?>
						<?php foreach($states as $value => $name): ?>
							<option value="<?php echo $value; ?>" <?php echo (KalturaHelpers::getRequestPostParam('state') == $value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Would you like a Kaltura Video Expert <br />to contact you? *</th>
				<td>
					<?php
					$selectData = array(
						'' => 'Please select...',
						'1' => 'Yes',
						'0' => 'Not right now',
					);
					?>
					<select id="would_you_like" name="would_you_like">
						<?php foreach($selectData as $value => $name): ?>
							<option value="<?php echo $value; ?>" <?php echo (KalturaHelpers::getRequestPostParam('would_you_like') == (string)$value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">How do you plan to use Kaltura's video platform?</th>
				<td>
					<textarea id="description" name="description"><?php echo(KalturaHelpers::getRequestPostParam('description')) ?></textarea>
				</td>
			</tr>
			<tr class="agree_to_terms">
				<th colspan="2">
					<input type="checkbox" name="agree_to_terms" id="agree_to_terms" value="1" <?php echo ($_POST['agree_to_terms'] == '1') ? ' checked="checked"' : ''; ?> />
					<label for="agree_to_terms">I Accept </label><a href="http://corp.kaltura.com/tandc" target="_blank">Terms of Use</a> *
				</th>
			</tr>
			<tr>
				<th colspan="2">* Required fields</th>
			</tr>
		</table>

		<p class="submit" style="text-align: left; "><input type="submit" name="Submit" value="<?php _e('Complete installation') ?>" /></p>
		</form>
	</div>
<?php endif;