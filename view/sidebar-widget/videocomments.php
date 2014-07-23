<div id="kaltura-video-comments">
	<?php if ( $this->widgets ): ?>
		<ul id="kaltura-items">
			<?php foreach ( $this->widgets as $widget ): ?>
				<?php $post_id = intval( $widget['post_id'] ); ?>
				<?php $comment_id = intval( $widget['comment_id'] ); ?>
				<?php $post = get_post( $post_id ); ?>
				<?php $comment = get_comment( $comment_id ); ?>
				<li>
					<div class="thumb">
						<a href="<?php echo esc_attr( get_permalink( $post_id ) ); ?>#comment-<?php echo esc_attr( $comment_id ); ?>">
							<img src="<?php echo esc_attr( KalturaHelpers::getThumbnailUrl( $widget['id'], $widget['entry_id'], 120, 90, null ) ); ?>" width="120" height="90" />
						</a>
					</div>
					Reply to
					<a href="<?php echo esc_attr( get_permalink( $post_id ) ); ?>"><?php echo esc_html( $post->post_title ); ?></a><br />
					<?php echo esc_html( $comment->comment_author ) . ', ' . mysql2date( 'M j', $comment->comment_date ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<ul class="kaltura-sidebar-pager">
			<li>
				<?php if ( ! $this->firstPage ): ?>
					<a onclick="Kaltura.switchSidebarTab(this, 'videocomments', <?php echo esc_attr( $this->page - 1 ); ?>);">Newer</a>
				<?php else: ?>
					&nbsp;
				<?php endif; ?>
			</li>
			<li>
				<?php if ( ! $this->lastPage ): ?>
					<a onclick="Kaltura.switchSidebarTab(this, 'videocomments', <?php echo esc_attr( $this->page + 1 ); ?>);">Older</a>
				<?php else: ?>
					&nbsp;
				<?php endif; ?>
			</li>
		</ul>
	<?php else: ?>
		No video comments yet
	<?php endif; ?>
</div>