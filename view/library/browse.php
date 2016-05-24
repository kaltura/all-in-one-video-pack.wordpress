<?php KalturaHelpers::protectView( $this ); ?>
<?php $kaction = KalturaHelpers::getRequestParam( 'kaction', 'browse' ); ?>
<?php $rootCategory = KalturaHelpers::getOption( 'kaltura_root_category' );
$rootCategory = ! empty( $rootCategory ) ? $rootCategory : 0; ?>
<?php if (!$this->isLibrary): ?>
	<?php media_upload_header(); ?>
<?php endif; ?>
<div class="<?php echo ( is_bool( $this->isLibrary ) ) ? 'wrap kaltura-wrap ' . esc_attr( $kaction ) : 'kaltura-tab' ?>">
	<?php if ( $this->isLibrary ): ?>
		<h2>All in One Video</h2>
		<?php $this->renderView( 'library/library-menu.php' ); ?>
		<br clear="all" />
	<?php endif; ?>
    <?php
        $selectedAction = $kaction == 'browse' ? 'media-upload.php' : 'upload.php';
        $browseFormUrlAction = admin_url($selectedAction . '?');
    ?>
	<form id="kaltura-browse-form" action="<?php echo esc_url($browseFormUrlAction) ?>" method="get">

		<ul id="kaltura-filter-categories">

			<?php if ( $kaction == 'browse' ) : ?>
				<input type="hidden" name="tab" value="kaltura_browse" />
				<input type="hidden" name="post_id" value="<?php echo esc_attr($this->postId) ?>" />
			<?php else: ?>
				<input type="hidden" name="page" value="kaltura_library" />
			<?php endif; ?>
			<input type="hidden" name="paged" value="1" />

			<ul class="filter-categories-header">
				<li id="filter-categories-title">
					<label for="filter-categories"><b>Categories (<?php echo esc_html( count( $this->filters->objects ) ) ?>)</b></label>
				</li>
				<input id="filter-categories-button" type="submit" value="Filter"></button>
			</ul>

			<?php
			$pageLinks = paginate_links(
				array(
					'base'    => add_query_arg( 'paged', '%#%' ),
					'format'  => '',
					'total'   => intval( $this->totalPages ),
					'current' => intval( $this->page )
				)
			);
			$pageLinksAllowedHtml = array(
				'a' => array(
					'href' => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array()
				),
			);
			?>
			<?php if ( $pageLinks ): ?>
				<div class="kaltura-pager"><?php echo wp_kses($pageLinks, $pageLinksAllowedHtml); ?></div>
			<?php endif; ?>

			<div class="entry-search-filter">
				<input name="search" placeholder="Search Entries" value="<?php echo esc_attr( $this->searchWord ) ?>" />
				<input type="submit" value="Go"></button>
			</div>

			<?php if ( ! count( $this->result->objects ) ): ?>
				<?php if ( $kaction == 'library' ) : ?>
					<p class="info">Result not found.</p>
				<?php else: ?>
					<div class="updated kaltura-updated">Result not found.</div>
				<?php endif; ?>
			<?php endif; ?>

		</ul>
		<div>
			<a href="javascript:;" id="clear_categories">Clear categories</a>
		</div>
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


		<ul id="kaltura-browse">
			<?php foreach ( $this->result->objects as $mediaEntry ):
				/** Create string of media categories that assigned to the entry. */
				if ( $mediaEntry->categories ) {
					$mediaCategories = explode( ',', $mediaEntry->categories );
					$mediaCategories = array_slice( $mediaCategories, 0, 14 );
					foreach ( $mediaCategories as $key => $mediaCategory ) {

						if ( $rootCategory ) {
							$pos = strpos( $mediaCategory, '>' );
							if ( $pos !== false ) {
								$fullEntryCategoryWithoutRoot = substr( $mediaCategory, $pos + 1 );
							}
						} else {
							$fullEntryCategoryWithoutRoot = $mediaCategory;
						}

						$fullEntryCategoryWithoutRoot = str_replace( '>', ' > ', $fullEntryCategoryWithoutRoot );
						$fullEntryCategoryWithoutRoot = '&#32;&#32;&#8211; ' . $fullEntryCategoryWithoutRoot;
						$mediaCategories[$key]        = $fullEntryCategoryWithoutRoot;

					}
					$mediaCategories = join( '&#10;', $mediaCategories );
				} else {
					$mediaCategories = 'No Category';
				}
				?>
				<li>
					<?php
					$sendToEditorUrl = KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_browse', 'kaction' => 'sendtoeditor', 'entryIds' => array( $mediaEntry->id ) ) );
					?>

					<div id="entryId_<?php echo esc_attr( $mediaEntry->id ); ?>" class="showName" title="<?php echo esc_attr( 'Click to edit' ); ?>">
						<?php echo esc_html( $mediaEntry->name ); ?><br />
					</div>
					<div class="thumb">
                        <?php $entryUrl = $mediaEntry->thumbnailUrl . "/width/120/height/90/type/2/bgcolor/000"?>
						<?php if ( $this->isLibrary ): ?>
							<img src="<?php echo esc_url( $entryUrl ); ?>" alt="<?php echo esc_attr( $mediaEntry->name ); ?>" title="Categories&#10;<?php echo esc_attr( $mediaCategories ); ?>" width="120" height="90" />
						<?php else: ?>
							<a href="<?php echo esc_url( $sendToEditorUrl ); ?>">
								<img src="<?php echo esc_url( $entryUrl ); ?>" alt="<?php echo esc_attr( $mediaEntry->name ); ?>" title="Categories&#10;<?php echo esc_attr( $mediaCategories ); ?>" width="120" height="90" />
							</a>
						<?php endif; ?>
					</div>
					<div class="submit">
						<?php if ( ! $this->isLibrary ): ?>
							<input type="button" title="Insert into post" class="add" onclick="window.location = '<?php echo esc_url( $sendToEditorUrl ); ?>';" />
						<?php endif; ?>
						<?php $isVideo = ( $mediaEntry->type == Kaltura_Client_Enum_EntryType::MEDIA_CLIP && $mediaEntry->mediaType == Kaltura_Client_Enum_MediaType::VIDEO ); ?>
						<?php if ( $this->isLibrary ): ?>
							<input type="button" title="Delete video" class="delete" data-id="<?php echo esc_attr( $mediaEntry->id ); ?>" />
						<?php endif; ?>
						<br clear="all" />
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</form>

	<br class="clear" />

	<ul class="filter-categories-header">
	</ul>
	<?php if ( $pageLinks ): ?>
		<div class="kaltura-pager"><?php echo wp_kses($pageLinks, $pageLinksAllowedHtml); ?></div>
	<?php endif; ?>
</div>

<script type="text/javascript">
	window.top.Kaltura.restoreModalBoxWp26();
    jQuery(function () {
		jQuery('li div.showName').kalturaEditableName({
			namePostParam: 'entryName',
			idPostParam  : 'entryId',
			idPrefix     : 'entryId_',
			url          : ajaxurl + '?action=kaltura_ajax&kaction=saveentryname'
		});
	});

	//window.top.Kaltura.restoreModalBoxWp26();
</script>
