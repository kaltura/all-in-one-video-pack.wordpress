<?php
KalturaHelpers::protectView( $this );
$kaction = KalturaHelpers::getRequestParam( 'kaction', 'browse' );
?>
<?php if (!$this->isLibrary): ?>
	<?php media_upload_header(); ?>
<?php endif; ?>
<div class="<?php echo ( is_bool( $this->isLibrary ) ) ? 'wrap kaltura-wrap ' . esc_attr( $kaction ) : 'kaltura-tab' ?>">
	<?php if ( $this->isLibrary ): ?>
		<h2>All in One Video</h2>
		<?php $this->renderView( 'library/library-menu.php' ); ?>
		<div class="clear"> </div>
	<?php endif; ?>
    <?php
        $selectedAction = $kaction == 'browse' ? 'media-upload.php' : 'upload.php';
        $browseFormUrlAction = admin_url($selectedAction . '?');

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
	<form id="kaltura-browse-form" action="<?php echo esc_url($browseFormUrlAction) ?>" method="get">

		<?php if ( ! count( $this->result->objects ) ): ?>
			<?php if ( $kaction == 'library' ) : ?>
				<p class="info">Result not found.</p>
			<?php else: ?>
				<div class="updated kaltura-updated">Result not found.</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if ( $this->showCategory ): ?>
		<div class="filter-side">
			<div id="filter-categories-header">
				<label for="filter-categories"><b>Categories (<?php echo esc_html( count( $this->filters->objects ) ) ?>)</b></label>
				<div>
					<a href="javascript:;" id="clear-categories">Clear categories</a>
				</div>
			</div>
			<?php $this->renderView( 'filter-categories.php' ); ?>
			<div>
				<input id="filter-categories-button" type="submit" value="Filter" />
			</div>
		</div>
		<?php endif;?>
		<?php if ( $kaction == 'browse' ) : ?>
			<input type="hidden" name="tab" value="kaltura_browse" />
			<input type="hidden" name="post_id" value="<?php echo esc_attr($this->postId) ?>" />
			<input type="hidden" name="chromeless" value="<?php echo esc_attr(KalturaHelpers::getRequestParam('chromeless')); ?>" />
		<?php else: ?>
			<input type="hidden" name="page" value="kaltura_library" />
		<?php endif; ?>
		<input type="hidden" name="paged" value="1" />

		<div class="right-side-container">
			<div class="kaltura-filter-bar">
				<?php $this->renderView( 'filter-media-owner.php' ); ?>
				<?php if( isset($this->isPlaylist) && $this->isPlaylist && !$this->isLibrary ): ?>
					<div id="select-playlist" class="disabled">Select playlist</div>
				<?php endif; ?>
				<div class="entry-search-filter">
					<input name="search" placeholder="Search <?php echo (!$this->isPlaylist) ? 'Entries' : 'Playlists'; ?>" value="<?php echo esc_attr( $this->searchWord ) ?>" />
					<input type="submit" value="Go" />
				</div>

			</div>
			
			<?php $this->renderView( $this->subViewFile ); ?>
		</div>
	</form>

	<div class="clear"> </div>

	<?php if ( $pageLinks && !$this->isPlaylist): ?>
		<div class="kaltura-pager <?php echo esc_attr($this->browseClass); ?>"><?php echo wp_kses($pageLinks, $pageLinksAllowedHtml); ?></div>
	<?php endif; ?>
</div>

<script type="text/javascript">
    jQuery(function () {
		jQuery('li div.showName').kalturaEditableName({
			namePostParam: 'entryName',
			idPostParam  : 'entryId',
			idPrefix     : 'entryId_',
			url          : ajaxurl + '?action=kaltura_ajax&kaction=saveentryname'
		});
	});
</script>
