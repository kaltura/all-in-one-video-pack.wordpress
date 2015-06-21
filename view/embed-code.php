<?php
KalturaHelpers::protectView( $this );
if (!is_array($this->attrs))
	$this->attrs = array();
// get the embed options from the attributes
$embedOptions = KalturaHelpers::getEmbedOptions( $this->attrs );
$wid            = $embedOptions['wid'] ? $embedOptions['wid'] : '_' . KalturaHelpers::getOption( 'kaltura_partner_id' );
$entryId        = $embedOptions['entryId'];
$width          = $embedOptions['width'];
$height         = $embedOptions['height'];
$randId         = md5( $wid . $entryId . rand( 0, time() ) );
$divId          = 'kaltura_wrapper_' . $randId;
$thumbnailDivId = 'kaltura_thumbnail_' . $randId;
$playerId       = 'kaltura_player_' . $randId;
$scriptSrc      = KalturaHelpers::getServerUrl() . '/p/' . KalturaHelpers::getOption( 'kaltura_partner_id' ) . '/sp/' . KalturaHelpers::getOption( 'kaltura_partner_id' ) . '00/embedIframeJs/uiconf_id/' . (int)$embedOptions['uiconfid'] . '/partner_id/' . KalturaHelpers::getOption( 'kaltura_partner_id' );
?>

<script src="<?php echo esc_url($scriptSrc); ?>"></script>

<?php
	$style  = '';
	if ( isset( $embedOptions['align'] ) ) {
		$style .= 'float:' . $embedOptions['align'] . ';';
	}
	// append the manual style properties
	if ( isset( $embedOptions['style'] ) ) {
		$style .= $embedOptions['style'];
	}
?>
<div id="<?php echo esc_attr($playerId);?>_wrapper" class="kaltura-player-wrapper">
	<div id="<?php echo esc_attr($playerId); ?>" style="width:<?php echo esc_attr($width); ?>px; height: <?php echo esc_attr($height + 10); ?>px; <?php echo esc_attr($style); ?>">
		<a href="http://corp.kaltura.com/Products/Features/Video-Management">Video Management</a>, <a href="http://corp.kaltura.com/Products/Features/Video-Hosting">Video Hosting</a>, <a href="http://corp.kaltura.com/Products/Features/Video-Streaming">Video Streaming</a>, <a href="http://corp.kaltura.com/products/video-platform-features">Video Platform</a>
	</div>
	<div class="kaltura-powered-by" style="width: <?php echo esc_attr($embedOptions['width']); ?>px">
		<div>
			<a href="http://corp.kaltura.com/Products/Features/Video-Player" target="_blank">Video Player</a> by <a href="http://corp.kaltura.com/" target="_blank">Kaltura</a>
		</div>
	</div>
</div>
<script>
	kWidget.embed({
		"targetId": <?php echo wp_json_encode($playerId); ?>,
		"wid": <?php echo wp_json_encode($wid); ?>,
		"uiconf_id": <?php echo wp_json_encode($embedOptions['uiconfid']); ?>,
		"entry_id": <?php echo wp_json_encode($entryId); ?>
	});
</script>