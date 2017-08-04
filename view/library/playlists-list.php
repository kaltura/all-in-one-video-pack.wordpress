<?php
KalturaHelpers::protectView( $this );
?>
<div id="select-playlist">Select playlist</div>
<ul id="kaltura-browse" class="pull-left playlist-view">
	<?php foreach ( $this->result->objects as $key => $playlist ): ?>
		<li class="<?php echo ($key == 0) ? 'active' : '' ?>">
			
			<?php
			$sendToEditorUrl = KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_browse', 'kaction' => 'sendtoeditor', 'isplaylist' => 1, 'entryIds' => array( $playlist->id ) ) );
			?>
			<input class="playlist-info" type="hidden" value="<?php echo esc_attr( $playlist->id ); ?>" data-url="<?php echo esc_url( $sendToEditorUrl ); ?>">
			<div class="playlists-wrap">
				<div id="entryId_<?php echo esc_attr( $playlist->id ); ?>" class="playlist-title" data-playlist="<?php echo esc_attr( $playlist->id ); ?>">
					<?php echo esc_html( $playlist->name ); ?><br />
				</div>
			</div>
			
		</li>
	<?php endforeach; ?>
</ul>
<div class="playlist-items" >
		<?php foreach ($this->playlistItems as $playlistId => $mediaEntry): ?>
			<div class="playlist-item" data-playlist="<?php echo esc_attr( $playlistId ); ?>">
				<div class="media-name">
					<?php echo esc_attr($mediaEntry->name); ?>
				</div>
				<div class="media-description">
					<?php echo esc_attr($mediaEntry->name); ?>
				</div>
			</div>
		<?php endforeach; ?>
</div>
	<div class="submit">
			<?php if ( ! $this->isLibrary ): ?>
				<input type="button" title="Insert into post" class="add" onclick="window.location = '<?php echo esc_url( $sendToEditorUrl ); ?>';" />
			<?php endif; ?>

			<br clear="all" />
			</div>