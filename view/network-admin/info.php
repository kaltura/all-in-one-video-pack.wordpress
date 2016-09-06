<?php KalturaHelpers::protectView( $this );
$sanitizer = new KalturaSanitizer(); ?>
<?php if ( $this->error ): ?>
	<div class="wrap">
		<h2><?php echo esc_html( 'All in One Video Pack Settings' ); ?></h2>
		<br />

		<div id="message" class="updated"><p>
				<strong><?php echo esc_html( 'Failed to verify partner details' ); ?></strong> (<?php echo esc_html( $this->error ); ?>)
			</p></div>
		<a href="settings.php?page=all-in-one-video-pack-mu-settings&amp;partner_login">Change settings</a>
	</div>
	<?php else : ?>
		<div class="wrap">
			<?php if ( $this->showMessage ): ?>
				<div id="message" class="updated"><p>
						<strong><?php echo esc_html( 'The All in One Video Pack settings have been saved.' ); ?></strong></p></div>
			<?php endif; ?>
			<h2><?php echo esc_html( 'All in One Video Pack Settings' ); ?></h2>
			<br />

			<p>
				In this page you can configure the default settings for all blogs under the current WordPress MU installation
			</p>
			<table id="kaltura-cms-login">
				<tr class="kalturaFirstRow">
					<th align="left"><?php echo esc_html( 'Partner ID' ); ?>:</th>
					<td style="padding-right: 90px;"><strong><?php echo esc_html( sanitize_text_field( get_site_option( 'kaltura_partner_id' ) ) ); ?></strong>
					</td>
				</tr>
				<tr>
					<th align="left"><?php echo esc_html( 'KMC username' ); ?>:</th>
					<td style="padding-right: 90px;"><strong><?php echo esc_html( sanitize_text_field( get_site_option( 'kaltura_cms_user' ) ) ); ?></strong>
					</td>
				</tr>
			</table>
			<a href="settings.php?page=all-in-one-video-pack-mu-settings&amp;partner_login=1">Change settings</a>
		</div>
		<?php endif;
