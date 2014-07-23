<?php KalturaHelpers::protectView( $this ); ?>
<div class="wrap kaltura-wrap">
	<h2>All in One Video</h2>
	<?php $this->renderView( 'library/library-menu.php' ); ?>
	<br clear="all" />

	<p>
		<?php echo esc_html( 'If you have created categories in your Kaltura Management Console (KMC), this page allows you to automatically generate a post that includes videos from your KMC, by category. These posts will be saved as drafts. ' ); ?>
	</p>
	<?php if ( count( $this->categories ) == 0 ): ?>
		<p>
			<?php echo esc_html( 'To begin, go to your KMC and assign categories to your content. When you return to your WordPress admin panel, these categories will be displayed in this table.' ); ?>
		</p>
	<?php else: ?>
		<form action="?page=kaltura_library&kaction=videoposts&step=2" method="post">
			<table class="widefat page fixed" cellspacing="0">
				<thead>
				<tr>
					<th scope="col" id="cb" class="manage-column column-cb check-column" style="">
						<input type="checkbox" />
					</th>
					<th scope="col" id="name" class="manage-column column-name" style=""><?php echo esc_html( 'Name' ); ?></th>
					<th scope="col" id="description" class="manage-column column-description" style=""><?php echo esc_html( 'Description' ); ?></th>
					<th scope="col" id="slug" class="manage-column column-slug" style=""><?php echo esc_html( 'Slug' ); ?></th>
					<th scope="col" id="posts" class="manage-column column-posts num" style=""><?php echo esc_html( 'Posts' ); ?></th>
				</tr>
				</thead>
				<tfoot>
				<tr>
					<th scope="col" class="manage-column column-cb check-column" style=""><input type="checkbox" /></th>
					<th scope="col" class="manage-column column-name" style=""><?php echo esc_html( 'Name' ); ?></th>
					<th scope="col" class="manage-column column-description" style=""><?php echo esc_html( 'Description' ); ?></th>
					<th scope="col" class="manage-column column-slug" style=""><?php echo esc_html( 'Slug' ); ?></th>
					<th scope="col" class="manage-column column-posts num" style=""><?php echo esc_html( 'Posts' ); ?></th>
				</tr>
				</tfoot>
				<tbody>
				<?php $alternate = true; ?>
				<?php $wpCategory = null; ?>
				<?php foreach ( $this->categories as $category ): ?>
					<?php foreach ( $this->wpCategories as $wpCategory ): ?>
						<?php
						if ( strtolower( $wpCategory->name ) == strtolower( $category->name ) ) {
							break;
						} else {
							$wpCategory = null;
						}
						?>
					<?php endforeach; ?>
					<tr class="iedit <?php echo ( $alternate ) ? 'alternate' : '';
					$alternate = ! $alternate; ?>">
						<th scope="row" class="check-column">
							<input type="checkbox" name="categories[]" value="<?php echo esc_attr( $category->name ); ?>" />
						</th>
						<?php if ( $wpCategory ): ?>
							<td class="post-title page-title column-name">
								<strong><a class="row-title" href="edit-tags.php?action=edit&taxonomy=category&tag_ID=<?php echo esc_attr( $wpCategory->cat_ID ); ?>" title="Edit"><?php echo esc_html( $category->fullName ); ?></a></strong>
							</td>
							<td class="author column-description"><?php echo esc_html( $wpCategory->description ); ?></td>
							<td class="comments column-slug">
								<?php echo esc_html( $wpCategory->slug ); ?>
							</td>
							<td class="date column-date"><?php echo esc_html( $wpCategory->count ); ?></td>
						<?php else: ?>
							<td class="post-title page-title column-name">
								<strong><?php echo esc_html( $category->fullName ); ?></strong>
							</td>
							<td class="author column-description"><?php echo esc_html( 'KMC Category' ); ?></td>
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