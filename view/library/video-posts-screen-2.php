<?php KalturaHelpers::protectView($this); ?>
<div class="wrap kaltura-wrap">
	<h2><?php _e("Creating Video Post from Category"); ?></h2>
	<?php $this->renderView('library/library_menu.php'); ?>
	<br clear="all" />
	<?php if (!$this->hasEntries): ?>
	<div class="tablenav">
		<?php _e("No videos found. There might not be any videos in your KMC or you have previously created video posts from these categories (you can create a video post once)."); ?>
	</div>
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="submit" value="<?php _e("Back"); ?>" onclick="history.go(-1);" name="doaction2" id="doaction2" class="button-secondary action" />
			<br class="clear" />
		</div>
		<br class="clear" />
	</div>
	<?php else: ?>
	<div class="tablenav">
		<?php _e('Here are the videos found in your KMC categories that match your WordPress categories. Select player and videos to create posts.'); ?>
	</div>
	<form action="?page=kaltura_library&kaction=videoposts&step=3" method="post">
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="uiconf_id"> Select player:</label></th>
			<td>
				<script type="text/javascript">
					function kaltura_updateWidthHeight()
					{
						var value = jQuery("form [name=uiconf_id]").val()
						<?php foreach($this->uiConfs->objects as $uiConf): ?>
						if (value == "<?php echo esc_js($uiConf->id); ?>")
						{
							jQuery("form [name=width]").val(<?php echo intval($uiConf->width); ?>);
							jQuery("form [name=height]").val(<?php echo intval($uiConf->height); ?>);
						}
						<?php endforeach; ?>
					}
				</script>
				<select name="uiconf_id" id="uiconf_id" onchange="kaltura_updateWidthHeight();">
					<?php foreach($this->uiConfs->objects as $uiConf): ?>
					<option value="<?php echo esc_attr($uiConf->id); ?>"><?php echo esc_html($uiConf->name); ?> (<?php echo intval($uiConf->width); ?>x<?php echo intval($uiConf->height); ?>)</option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" name="width" value="" />
				<input type="hidden" name="height" value="" />
				<script type="text/javascript">
					kaltura_updateWidthHeight();
				</script>
			</td>
		</tr>
	</table>
	<table class="widefat page fixed" cellspacing="0">
		<thead>
			<tr>
				<th scope="col" id="cb" class="manage-column column-cb check-column" style="">
				<input type="checkbox" />
				</th>
				<th scope="col" id="name" class="manage-column column-name" style=""><?php _e("Name"); ?></th>
				<th scope="col" id="posts" class="manage-column column-description" style=""><?php _e("Category"); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th scope="col"  class="manage-column column-cb check-column" style=""><input type="checkbox" /></th>
				<th scope="col"  class="manage-column column-name" style=""><?php _e("Name"); ?></th>
				<th scope="col"  class="manage-column column-description" style=""><?php _e("Category"); ?></th>
			</tr>
		</tfoot>
		<tbody>
			<?php $alternate = true; ?>
			<?php foreach($this->categories as $category => $entries): ?>
                <?php if (is_array($entries)): ?>
    				<?php foreach($entries as $entry): ?>
					<tr class="iedit <?php echo ($alternate) ? "alternate" : ""; $alternate = !$alternate; ?>">
						<th scope="row" class="check-column"><input type="checkbox" name="entries[]" value="<?php echo esc_attr(base64_encode(serialize(array($entry->id, $entry->name, $category)))); ?>" /></th>
						<td class="post-title page-title column-name"><?php echo esc_html($entry->name); ?></td>
						<td class="author column-description"><?php echo esc_html($category); ?></td>
					</tr>
	    			<?php endforeach; ?>
                <?php endif;?>
			<?php endforeach; ?>
		</<tbody>
	</table>
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="submit" value="<?php _e("Create Posts"); ?>" name="doaction2" id="doaction2" class="button-secondary action" />
			<br class="clear" />
		</div>
		<br class="clear" />
	</div>
	</form>
	<?php endif; ?>
</div>