<?php if (!defined("WP_ADMIN")) die();?>
<?php
$messages[3] = __('Category updated.');
$messages[5] = __('Category not updated.'); 
?>
<div class="wrap kalturaWrapFix">
	<h2>All in One Video</h2>
	<?php require_once(dirname(__FILE__) . "/view_library_menu.php"); ?>
	<br clear="all" />
	<?php
	if ( isset($_GET['message']) && ( $msg = (int) $_GET['message'] ) ) : ?>
	<div id="message" class="updated fade"><p><?php echo $messages[$msg]; ?></p></div>
	<?php $_SERVER['REQUEST_URI'] = remove_query_arg(array('message'), $_SERVER['REQUEST_URI']);
	endif; ?>
	<p>
		<?php _e('If you have created categories in your Kaltura Management Console (KMC), this page allows you to automatically generate a post that includes videos from your KMC, by category. These posts will be saved as drafts. '); ?>
	</p>
	<?php if (count($viewData["categories"]) == 0): ?>
	<p>
		<?php _e('To begin, go to your KMC and assign categories to your content. When you return to your WordPress admin panel, these categories will be displayed in this table.'); ?>
	</p> 
	<?php else: ?>
	<form action="<?php echo $page; ?>?page=interactive_video_library&kaction=videoposts&screen=2" method="post">
	<table class="widefat page fixed" cellspacing="0">
		<thead>
			<tr>
				<th scope="col" id="cb" class="manage-column column-cb check-column" style="">
				<?php if (KalturaHelpers::compareWPVersion('2.7', '>=')): ?> 
					<input type="checkbox" />
				<?php endif; ?>
				</th>
				<th scope="col" id="name" class="manage-column column-name" style=""><?php _e("Name"); ?></th>
				<th scope="col" id="description" class="manage-column column-description" style=""><?php _e("Description"); ?></th>
				<th scope="col" id="slug" class="manage-column column-slug" style=""><?php _e("Slug"); ?></th>
				<th scope="col" id="posts" class="manage-column column-posts num" style=""><?php _e("Posts"); ?></th>
			</tr>
		</thead>
		<?php if (KalturaHelpers::compareWPVersion('2.7', '>=')): ?> 
		<tfoot>
			<tr>
				<th scope="col"  class="manage-column column-cb check-column" style=""><input type="checkbox" /></th>
				<th scope="col"  class="manage-column column-name" style=""><?php _e("Name"); ?></th>
				<th scope="col"  class="manage-column column-description" style=""><?php _e("Description"); ?></th>
				<th scope="col"  class="manage-column column-slug" style=""><?php _e("Slug"); ?></th>
				<th scope="col"  class="manage-column column-posts num" style=""><?php _e("Posts"); ?></th>
			</tr>
		</tfoot>
		<?php endif; ?>
		<tbody>
			<?php $alternate = true; ?>
			<?php foreach($viewData["categories"] as $category): ?>
				<?php foreach($viewData["wpCategories"] as $wpCategory): ?>
				<?php 
				if (strtolower($wpCategory->name) == strtolower($category->name)) 
					break;
				else
					$wpCategory = null;
				?>
				<?php endforeach; ?>
				<tr class="iedit <?php echo ($alternate) ? "alternate" : ""; $alternate = !$alternate; ?>">
					<th scope="row" class="check-column"><input type="checkbox" name="categories[]" value="<?php echo $category->name; ?>" /></th>
					<?php if ($wpCategory): ?>
					<td class="post-title page-title column-name">
						<strong><a class="row-title" href="categories.php?action=edit&cat_ID=<?php echo $wpCategory->cat_ID; ?>&_wp_original_http_referer=<?php echo urlencode($_SERVER["REQUEST_URI"]."&forredirect=categories.php"); ?>" title="Edit"><?php echo $category->fullName; ?></a></strong>
					</td>
					<td class="author column-description"><?php echo $wpCategory->description; ?></td>
					<td class="comments column-slug">
						<?php echo $wpCategory->slug; ?>
					</td>
					<td class="date column-date"><?php echo $wpCategory->count; ?></td>
					<?php else: ?>
					<td class="post-title page-title column-name">
						<strong><?php echo $category->fullName; ?></strong>
					</td>
					<td class="author column-description"><?php _e("KMC Category"); ?></td>
					<td class="comments column-slug"></td>
					<td class="date column-date"></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="tablenav">
		<div class="alignleft actions">
			<select>
				<option>Create posts from category</option>
			</select>
			<input type="submit" value="Apply" name="doaction2" id="doaction2" class="button-secondary action" />
			<br class="clear" />
		</div>
		<br class="clear" />
	</div>
	</form>
	<?php endif; ?>
</div>