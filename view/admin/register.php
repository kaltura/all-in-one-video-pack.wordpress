<?php KalturaHelpers::protectView( $this ); ?>
<?php if ( ! $this->pingOk ): ?>
	<div class="wrap">
		<h2>All in One Video Pack Installation</h2>
		<br />

		<div class="error">
			<p>
				<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry installation.</strong>
			</p>
		</div>
	</div>
<?php elseif ( $this->success === true ): ?>
	<div class="wrap">
		<h2>Congratulations!</h2>
		<br />

		<div class="updated fade">
			<p>
				<strong>You have successfully installed the All in One Video Pack. </strong>
			</p>
		</div>
		<p>
			Next time you write a post, you will see a new icon in the Add Media toolbar that allows you to upload and edit Interactive Videos.
			<br />
			<br />
			Note that a Kaltura Partner ID has been created for you, and an email has been sent to the specified email address containing the ID information. The email you received also includes a link and a password to the Kaltura Management Console (KMC), where you can track and manage all information related to the All in One Video Pack.<br />
		</p>
		<br />

		<div class="wrap">
			<a href="#" onclick="window.location.href = '<?php echo esc_js( admin_url( 'options-general.php?page=kaltura_options' ) ); ?>'">Continue...</a>
		</div>
	</div>
<?php
else: ?>
	<div class="wrap">
		<h2>All in One Video Pack Installation</h2>
		<?php if ( isset( $this->error ) ): ?>
			<br />
			<div class="error">
				<p>
					<strong><?php echo esc_html( $this->error ); ?></strong>
				</p>
			</div>
		<?php endif; ?>
		<p>
			<a href="<?php echo esc_url( admin_url( 'options-general.php?page=kaltura_options&partner_login=true' ) ); ?>">Click here if you already have a Partner ID</a>
		</p>

		<p>
			Once you complete the form below and click "Complete installation", the All in One Video Pack will be fully installed and ready to use.
		</p>

		<h3>Get a Partner ID</h3>

		<form name="form1" method="post" class="registration">
			<?php wp_nonce_field( 'register', '_kalturanonce' ); ?>

			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="first_name">First Name: *</label></th>
					<td>
						<input type="text" id="first_name" name="first_name" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'first_name' ) ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="last_name">Last Name: *</label></th>
					<td>
						<input type="text" id="last_name" name="last_name" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'last_name' ) ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="email">Email: *</label></th>
					<td>
						<input type="text" id="email" name="email" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'email' ) ); ?>" size="50" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="phone">Phone: *</label></th>
					<td>
						<input type="text" id="phone" name="phone" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'phone' ) ); ?>" size="30" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="company">Company: *</label></th>
					<td>
						<input type="text" id="company" name="company" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'company' ) ); ?>" size="30" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="website">Website:</label></th>
					<td>
						<input type="text" id="website" name="website" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'website' ) ); ?>" size="50" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="job_title">Job Title: *</label></th>
					<td>
						<input type="text" id="job_title" name="job_title" value="<?php echo esc_attr( KalturaHelpers::getRequestPostParam( 'job_title' ) ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="describe_yourself">Describe yourself: *</label></th>
					<td>
						<select id="describe_yourself" name="describe_yourself">
							<option value="">Please select...</option>
							<?php
							$selectData = array(
								'Enterprise / Small Business / Government Agency' => 'Enterprise',
								'Education Organization'                          => 'Education',
								'Media Company / Agency'                          => 'Media',
								'CDN / ISP / Integrator / Hosting Provider'       => 'Service Provider',
								'Other'                                           => 'Other',
							);
							?>
							<?php foreach ( $selectData as $name => $value ): ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( KalturaHelpers::getRequestPostParam( 'describe_yourself' ) == esc_attr( $value ) ); ?>><?php echo esc_html( $name ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="country">Country: *</label></th>
					<td>
						<select id="country" name="country">
							<option value="">Please select...</option>
							<?php foreach ( $this->countries as $value => $name ): ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( KalturaHelpers::getRequestPostParam( 'country' ) == esc_attr( $value ) ); ?>><?php echo esc_html( $name ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="state">State/Province: *</label></th>
					<td>
						<select id="state" name="state">
							<?php $statesNew = array(); ?>
							<?php $statesNew[''] = ''; ?>
							<?php $states = array_merge( $statesNew, $this->states ); ?>
							<?php foreach ( $states as $value => $name ): ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( KalturaHelpers::getRequestPostParam( 'state' ) == esc_attr( $value ) ); ?>><?php echo esc_html( $name ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="would_you_like">Would you like a Kaltura Video Expert <br />to contact you? *</label></th>
					<td>
						<?php
						$selectData = array(
							''  => 'Please select...',
							'1' => 'Yes',
							'0' => 'Not right now',
						);
						?>
						<select id="would_you_like" name="would_you_like">
							<?php foreach ( $selectData as $value => $name ): ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( KalturaHelpers::getRequestPostParam( 'would_you_like' ) == esc_attr( (string) $value ) ); ?>><?php echo esc_html( $name ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="description">How do you plan to use Kaltura's video platform?</label></th>
					<td>
						<textarea id="description" name="description"><?php echo esc_textarea ( ( KalturaHelpers::getRequestPostParam( 'description' ) ) ); ?></textarea>
					</td>
				</tr>
				<tr class="agree_to_terms">
					<th colspan="2">
						<input type="checkbox" name="agree_to_terms" id="agree_to_terms" value="1" <?php echo checked( KalturaHelpers::getRequestPostParam( 'agree_to_terms' ) == '1' ); ?> />
						<label for="agree_to_terms">I Accept </label><a href="http://corp.kaltura.com/tandc" target="_blank">Terms of Use</a> *
					</th>
				</tr>
				<tr>
					<th colspan="2">* Required fields</th>
				</tr>
			</table>

			<p class="submit" style="text-align: left; ">
				<input type="submit" name="Submit" value="Complete installation" />
			</p>
		</form>
	</div>
<?php endif;