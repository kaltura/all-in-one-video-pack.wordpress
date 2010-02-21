<?php if (!defined("WP_ADMIN")) die();?>
<div class="wrap kalturaWrapFix">
	<h2><?php _e("Creating Video Post from Category"); ?></h2>
	<ul class="subsubsub">
		<li><a href="<?php echo add_query_arg(array('tab'=>'library','screen'=>null,'tab'=>null)); ?>">Library</a> |</li>
		<li><a class="current" href="<?php echo add_query_arg(array('tab'=>'video-posts')); ?>">Video Posts</a></li>
	</ul>
	<br clear="all" />
	<p><?php echo $viewData["numOfCreatedPosts"];?> video posts have been created and saved as drafts!</p>
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="submit" value="<?php _e("View Posts"); ?>" onclick="window.location.href = 'edit.php';" name="doaction2" id="doaction2" class="button-secondary action" />
			<br class="clear" />
		</div>
		<br class="clear" />
	</div>
	</form>
</div>