<?php KalturaHelpers::protectView( $this ); ?>
<div id="filter-media-owner-type-wrap">
	<label for="filter-media-owner-type"><b>Filter Media</b></label>
	<select id="filter-media-owner-type" name="ownertype">
		<?php if ( KalturaHelpers::getOption( 'kaltura_show_media_from' ) === 'all_account' ): ?>
			<option value="all-media" <?php selected( $this->filterOwnerType, 'all-media' ); ?>>All Media</option>
		<?php endif; ?>
		<option value="my-media" <?php selected( $this->filterOwnerType, 'my-media' ); ?>>My Media</option>
		<option value="media-publish" <?php selected( $this->filterOwnerType, 'media-publish' ); ?>>Media I Can Publish</option>
		<option value="media-edit" <?php selected( $this->filterOwnerType, 'media-edit' ); ?>>Media I Can Edit</option>
		<?php if ( KalturaHelpers::getOption( 'kaltura_allow_embed_playlist' ) ): ?>
			<option value="my-playlist" <?php selected( $this->filterOwnerType, 'my-playlist' ); ?>>My playlists</option>
		<?php endif; ?>
	</select>
</div>