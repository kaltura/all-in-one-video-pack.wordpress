<?php KalturaHelpers::protectView( $this ); ?>
<div class="wrap kaltura-wrap">
	<h2><?php echo esc_html( 'Creating Video Post from Category' ); ?></h2>
	<?php $this->renderView( 'library/library-menu.php' ); ?>
	<br clear="all" />
	<?php if ( $this->numOfCreatedPosts === 1 ): ?>
		<p><?php echo esc_html( $this->numOfCreatedPosts ); ?> video post have been created and saved as draft!</p>
	<?php elseif ( $this->numOfCreatedPosts === 0 ): ?>
		<p>No videos found!</p>
	<?php
	else: ?>
		<p><?php echo intval( $this->numOfCreatedPosts ); ?> video posts have been created and saved as drafts!</p>
	<?php endif; ?>
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="button" value="<?php echo esc_html( 'View Posts' ); ?>" onclick="window.location.href = 'edit.php';" name="doaction2" id="doaction2" class="button-secondary action" />
			<br class="clear" />
		</div>
		<br class="clear" />
	</div>
</div>