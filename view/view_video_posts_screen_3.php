<?php if (!defined("WP_ADMIN")) die();?>
<div class="wrap kalturaWrapFix">
	<h2><?php _e("Creating Video Post from Category"); ?></h2>
	<?php require_once(dirname(__FILE__) . "/view_library_menu.php"); ?>
	<br clear="all" />
	<?php if ($viewData["numOfCreatedPosts"] === 1): ?>
	<p><?php echo $viewData["numOfCreatedPosts"];?> video post have been created and saved as draft!</p>
	<?php elseif ($viewData["numOfCreatedPosts"] === 0): ?>
	<p>No videos found!</p>
	<?php else: ?>
	<p><?php echo $viewData["numOfCreatedPosts"];?> video posts have been created and saved as drafts!</p>
	<?php endif; ?>
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="submit" value="<?php _e("View Posts"); ?>" onclick="window.location.href = 'edit.php';" name="doaction2" id="doaction2" class="button-secondary action" />
			<br class="clear" />
		</div>
		<br class="clear" />
	</div>
	</form>
</div>