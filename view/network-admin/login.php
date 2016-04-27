<?php KalturaHelpers::protectView( $this ); ?>
<?php if ( $this->error ): ?>
	<div class="wrap">
		<h2><?php echo esc_html( 'All in One Video Pack Settings' ); ?></h2>
		<br />

		<div class="error">
			<p>
				<strong><?php echo esc_html( $this->error ); ?></strong>
			</p>
		</div>
		<br />
		<div class="wrap">
			<a href="#" onclick="history.go(-1);"><?php echo esc_html( 'Back' ); ?></a>
		</div>
	</div>
<?php elseif ( $this->success ): ?>
	<div class="wrap">
		<h2><?php echo esc_html( 'Congratulations!' ); ?></h2>
		<br />

		<div class="updated fade">
			<p>
				<strong>You have successfully installed the All in One Video Pack. </strong>
			</p>
		</div>
		<br />

		<div class="wrap">
			<a href="#" onclick="window.location.href = 'settings.php?page=all-in-one-video-pack-mu-settings'"><?php echo esc_html( 'Continue...' ); ?></a>
		</div>
	</div>
<?php
else: ?>
	<div class="wrap">
		<h2><?php echo esc_html( 'All in One Video Pack MU Installation' ); ?></h2>

		<p>
			This installation page should be used in order to configure the default Kaltura integration settings for all sub blogs.
		</p>

		<p>
			Please enter your Kaltura Management Console (KMC) Email &amp; password
		</p>

		<form name="form1" method="post">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php echo esc_html( 'Partner ID' ); ?>:</th>
					<td><input type="text" id="partner_id" name="partner_id" value="" size="10" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php echo esc_html( 'Email' ); ?>:</th>
					<td><input type="text" id="email" name="email" value="" size="40" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php echo esc_html( 'Password' ); ?>:</th>
					<td><input type="password" id="password" name="password" value="" size="20" />
						<a href="<?php echo esc_attr( KalturaHelpers::getServerUrl() ); ?>/index.php/kmc">forgot password?</a>
					</td>
				</tr>
			</table>

			<p class="submit" style="text-align: left; ">
				<input type="submit" name="Submit" value="<?php echo esc_html( 'Complete installation' ) ?>" /></p>
		</form>
	</div>
<?php endif;