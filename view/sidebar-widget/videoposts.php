<div id="kaltura-video-posts">
	<?php if ($this->widgets): ?>
		<ul id="kaltura-items">
			<?php foreach($this->widgets as $widget): ?>
				<?php $post_id = $widget["post_id"]; ?>
				<?php $post = get_post($post_id); ?>
				<?php $user = get_userdata($post->post_author); ?>
				<li>
					<div class="thumb">
						<a href="<?php echo get_permalink($post_id); ?>">
							<img src="<?php echo KalturaHelpers::getThumbnailUrl($widget["id"], $widget["entry_id"], 120, 90, null); ?>" width="120" height="90" />
						</a>
					</div>
					<a href="<?php echo get_permalink($post_id); ?>"><?php echo $post->post_title; ?></a><br />
					<?php echo $user->display_name;?>, <?php echo mysql2date("M j", $widget["created_at"]); ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<ul class="kaltura-sidebar-pager">
			<li>
				<?php if (!$this->firstPage): ?>
					<a onclick="Kaltura.switchSidebarTab(this, 'videoposts', <?php echo ($this->page - 1); ?>);">Newer</a>
				<?php else: ?>
					&nbsp;
				<?php endif; ?>
			</li>
			<li>
				<?php if (!$this->lastPage): ?>
					<a onclick="Kaltura.switchSidebarTab(this, 'videoposts', <?php echo ($this->page + 1); ?>);">Older</a>
				<?php else: ?>
					&nbsp;
				<?php endif; ?>
			</li>
		</ul>
	<?php else: ?>
		No posted videos yet
	<?php endif; ?>
</div>