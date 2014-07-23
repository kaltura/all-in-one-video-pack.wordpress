<?php KalturaHelpers::protectView( $this ); ?>
<?php
$kaction = KalturaHelpers::getRequestParam( 'kaction', 'library' );

$menu = array(
	'Entries'                 => array( 'kaction' => 'library', 'screen' => null, 'paged' => null, 'step' => null ),
	'Bulk Create Video Posts' => array( 'kaction' => 'videoposts', 'paged' => null, 'step' => null ),
)
?>
<ul class="subsubsub">
	<?php $count = count( $menu );
	$i = 1; ?>
	<?php foreach ( $menu as $name => $params ): ?>
		<?php
		$last = ( $i ++ >= $count );
		if ( $params['kaction'] == $kaction )
			$current = 'class="current" ';
		else {
			$current = '';
		}
		?>
		<li>
			<a <?php echo $current; ?>href="<?php echo add_query_arg( $params ); ?>"><?php echo esc_html( $name ); ?></a>
			<?php if ( ! $last ): ?>
				|
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>
<table id="kaltura-cms-login">
	<tr class="kalturaFirstRow">
		<th align="left"><?php echo esc_html( 'Partner ID' ); ?>:</th>
		<td style="padding-right: 90px;">
			<strong><?php echo esc_html( KalturaHelpers::getOption( 'kaltura_partner_id' ) ); ?></strong></td>
	</tr>
	<tr>
		<th align="left"><?php echo esc_html( 'KMC username' ); ?>:</th>
		<td style="padding-right: 90px;">
			<strong><?php echo esc_html( KalturaHelpers::getOption( 'kaltura_cms_user' ) ); ?></strong></td>
	</tr>
	<tr class="kalturaLastRow">
		<td colspan="2" align="left" style="padding-top: 10px;padding-left:10px">
			<a href="http://www.kaltura.com/index.php/kmc" target="_blank">Login</a> to the Kaltura Management Console (KMC) for advanced
			<br />media management<br />
			Learn more about the
			<a href="http://corp.kaltura.com/Products/Video-Applications/WordPress-Video-Plugin" target="_blank">new plugin features</a>
		</td>
	</tr>
</table>