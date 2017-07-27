<?php KalturaHelpers::protectView( $this ); ?>

<table id="kaltura-cms-login">
	<tr class="kalturaFirstRow">
		<th align="left">Partner ID:</th>
		<td style="padding-right: 90px;">
			<strong><?php echo esc_html( KalturaHelpers::getOption( 'kaltura_partner_id' ) ); ?></strong></td>
	</tr>
	<?php if($this->showEmail): ?>
	<tr>
		<th align="left">KMC username:</th>
		<td style="padding-right: 90px;">
			<strong><?php echo esc_html( KalturaHelpers::getOption( 'kaltura_cms_user' ) ); ?></strong></td>
	</tr>
    <?php endif; ?>
	<tr class="kalturaLastRow">
		<td colspan="2" align="left" style="padding-top: 10px;padding-left:10px">
			<a href="http://www.kaltura.com/index.php/kmc" target="_blank">Login</a> to the Kaltura Management Console (KMC) for advanced
			<br />media management<br />
			Learn more about the
			<a href="http://corp.kaltura.com/Products/Video-Applications/WordPress-Video-Plugin" target="_blank">new plugin features</a>
		</td>
	</tr>
</table>