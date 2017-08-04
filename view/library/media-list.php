<?php
KalturaHelpers::protectView( $this );
?>
<ul id="kaltura-browse" class="<?php echo esc_attr($this->browseClass); ?>">
	<?php foreach ( $this->result->objects as $mediaEntry ): ?>
		<?php $mediaCategories = KalturaHelpers::getCategoriesString($mediaEntry); ?>
		<li>
			<?php
			$sendToEditorUrl = KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_browse', 'kaction' => 'sendtoeditor', 'entryIds' => array( $mediaEntry->id ) ) );
			?>
			<?php
			$canUserEditMedia = $mediaEntry->canUserEditMedia;
			$entryNameClass = $canUserEditMedia ? 'showName' : '';
			?>
			<div id="entryId_<?php echo esc_attr( $mediaEntry->id ); ?>" class="entryTitle <?php echo $entryNameClass; ?>" title="<?php if( $canUserEditMedia ) echo esc_attr( 'Click to edit' ); ?>">
				<?php echo esc_html( $mediaEntry->name ); ?><br />
			</div>
			<div class="thumb">
				<?php $entryUrl = $mediaEntry->thumbnailUrl . "/width/120/height/90/type/2/bgcolor/000"?>
				<?php if ( $this->isLibrary ): ?>
					<img src="<?php echo esc_url( $entryUrl ); ?>" alt="<?php echo esc_attr( $mediaEntry->name ); ?>" title="Categories&#10;<?php echo esc_attr( $mediaCategories ); ?>" width="120" height="90" />
				<?php else: ?>
					<a href="<?php echo esc_url( $sendToEditorUrl ); ?>">
						<img src="<?php echo esc_url( $entryUrl ); ?>" alt="<?php echo esc_attr( $mediaEntry->name ); ?>" title="Categories&#10;<?php echo esc_attr( $mediaCategories ); ?>" width="120" height="90" />
					</a>
				<?php endif; ?>
			</div>
			<div class="submit">
				<?php if ( ! $this->isLibrary ): ?>
					<input type="button" title="Insert into post" class="add" onclick="window.location = '<?php echo esc_url( $sendToEditorUrl ); ?>';" />
				<?php endif; ?>
				<?php if ( $this->isLibrary && $mediaEntry->isUserMediaOwner ): ?>
					<input type="button" title="Delete video" class="delete" data-id="<?php echo esc_attr( $mediaEntry->id ); ?>" />
				<?php endif; ?>
				<br clear="all" />
			</div>
		</li>
	<?php endforeach; ?>
</ul>