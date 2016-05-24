<?php KalturaHelpers::protectView( $this ); ?>
<?php
$rootCategory = KalturaHelpers::getOption( 'kaltura_root_category' );
$rootCategory = ! empty( $rootCategory ) ? $rootCategory : 0;
?>
<ul id="filter-categories">
	<?php
	$categories = $this->filters->objects;
	foreach ( $categories as $key => $category ): ?>
		<?php
		$depth = substr_count( $category->fullName, '>' );
		if ( $rootCategory != 0 ) {
			$depth --;
		}

		$widthStyle  = $depth * 20;
		$hasChildren = false;
		if ( isset($categories[$key + 1]) && strpos( $categories[$key + 1]->fullName, $category->fullName ) !== false ) {
			$hasChildren = true;
		} else // Add the caret size to the total width.
		{
			$widthStyle += 13;
		}

		/** Remove root category if we select other category then default. */
		$fullNameWithoutRoot = "";
		if ( $rootCategory != 0 ) {
			$pos = strpos( $category->fullName, '>' );
			if ( $pos !== false ) {
				$fullNameWithoutRoot = substr( $category->fullName, $pos + 1 );
			}
		} else {
			$fullNameWithoutRoot = $category->fullName;
		}

		?>
		<li class="filter-category-div-wrapper" id="<?php echo esc_attr($fullNameWithoutRoot) ?>" style="margin-left: <?php echo esc_attr($widthStyle) ?>px">
			<?php if ( $hasChildren ) {
				echo '<span class="kaltura-caret kaltura-caret-down">&#9660</span>';
			} ?>
			<label class="filter-category-label">
				<?php $checked = is_array($this->selectedCategories) && in_array($category->id, $this->selectedCategories); ?>
				<input id="<?php echo esc_attr($category->fullIds); ?>" class="filter-category-input" type='checkbox' name='categoryvar[]' value="<?php echo esc_attr($category->id) ?>" <?php echo checked($checked) ?>/>
				<?php echo esc_html($category->name) ?>
			</label>
			<br>
		</li>

	<?php endforeach; ?>
</ul>