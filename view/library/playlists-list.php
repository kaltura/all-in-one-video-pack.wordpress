<?php
KalturaHelpers::protectView( $this );
?>
<div class="playlist-errors-box"></div>
<div class="select-playlist-page">
	<ul id="kaltura-browse" class="pull-left playlist-view">
		<div class="kaltura-playlist" data-page="1" data-loading="false" data-page-size="<?php echo $this->pageSize; ?>" data-total-count="<?php echo $this->totalCount; ?>">
		<?php foreach ( $this->result->objects as $key => $playlist ): ?>
			<li class="<?php echo ($key == 0) ? 'active' : '' ?>"  data-playlist-id="<?php echo esc_attr( $playlist->id ); ?>">
				<div class="playlists-wrap">
					<div id="entryId_<?php echo esc_attr( $playlist->id ); ?>" class="playlist-title" data-playlist="<?php echo esc_attr( $playlist->id ); ?>">
						<?php echo esc_html( $playlist->name ); ?><br />
					</div>
				</div>
				
			</li>
		<?php endforeach; ?>
		</div>
		<li class="playlist-loading"><div class="kaltura-loader"></div></li>
	</ul>
	
	<div class="playlist-items"  >
		<div class="playlist-items-loader">
			<div class="kaltura-loader"></div>
		</div>
		<div class="playlist-item-box">
		</div>
	
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
	jQuery(function () {
		jQuery.kalturaPlaylistControl({
			url: ajaxurl + '?action=kaltura_ajax&kaction=getplaylistitems',
			playlistUrl: ajaxurl + '?action=kaltura_ajax&kaction=getplaylists',
			sendToEditorUrl: '<?php echo KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_browse', 'kaction' => 'sendtoeditor', 'isplaylist' => 1 ) ); ?>'
		});
	} );


</script>
