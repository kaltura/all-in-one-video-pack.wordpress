<?php KalturaHelpers::protectView($this); ?>
<?php $kaction = isset($_GET["kaction"]) ? $_GET["kaction"] : "browse"; ?>
<div class="<?php echo ($this->isLibrary) ? "wrap kaltura-wrap ".esc_attr($kaction) : "kaltura-tab"?>">
	<?php if ($this->isLibrary): ?>
		<h2>All in One Video</h2>
		<?php $this->renderView('library/library_menu.php'); ?>
		<br clear="all" />
	<?php endif; ?>
	<?php if (!count($this->result->objects)): ?>
		<div class="updated kaltura-updated">No interactive videos created yet</div>
	<?php else: ?>
		<?php if ($this->isLibrary): ?>
			<p class="info">Click title to edit entry title. Click thumbnail to preview.</p>
		<?php endif; ?>
		<?php
			$page_links = paginate_links( 
				array(
					'base' => add_query_arg( 'paged', '%#%' ),
					'format' => '',
					'total' => $this->totalPages,
					'current' => $this->page
				)
			);
			if ($page_links)
				echo "<div class=\"kaltura-pager\">$page_links</div>";
		?>
		<ul id="kaltura-browse">
		<?php foreach($this->result->objects as $mediaEntry): ?>
			<li>
				<?php 
					$sendToEditorUrl =  KalturaHelpers::generateTabUrl(array("tab" => "kaltura_browse", "kaction" => "sendtoeditor", "entryIds" => array($mediaEntry->id)));
				?>
				
				<div id="entryId_<?php echo $mediaEntry->id?>" class="showName" title="<?php _e('Click to edit'); ?>">
					<?php echo $mediaEntry->name ?><br />
				</div>
				<div class="thumb">
					<?php if ($this->isLibrary): ?>
						<a href="<?php echo admin_url('upload.php') ?>?kaltura_admin_iframe_handler&kaction=preview&entryid=<?php echo $mediaEntry->id; ?>&TB_iframe=true&height=390&width=600" title="Preview" class="thickbox">
							<img src="<?php echo $mediaEntry->thumbnailUrl; ?>/width/120/height/90/type/2/bgcolor/000" alt="<?php $mediaEntry->name ?>" width="120" height="90" />
						</a>
					<?php else: ?>
					<a href="<?php echo $sendToEditorUrl; ?>">
						<img src="<?php echo $mediaEntry->thumbnailUrl; ?>/width/120/height/90/type/2/bgcolor/000" " alt="<?php $mediaEntry->name ?>" width="120" height="90" />
					</a>
					<?php endif; ?>
				</div>
				<div class="submit">	
					<?php if (!$this->isLibrary): ?>
						<input type="button" title="Insert into post" class="add" onclick="window.location = '<?php echo $sendToEditorUrl; ?>';" />
					<?php endif; ?>
					<?php $isVideo = ($mediaEntry->type == Kaltura_Client_Enum_EntryType::MEDIA_CLIP && $mediaEntry->mediaType == Kaltura_Client_Enum_MediaType::VIDEO); ?>
					<?php if ($this->isLibrary): ?>
						<?php if ($isVideo) :?>
						<input type="button" title="Update thumbnail" class="thumb thickbox" alt="<?php echo admin_url('upload.php'); ?>?kaltura_admin_iframe_handler&kaction=updatethumbnail&entryid=<?php echo $mediaEntry->id; ?>&TB_iframe=true&height=440&width=750"" />
						<?php endif; ?>
						<input type="button" title="Delete video" class="delete" data-id="<?php echo $mediaEntry->id; ?>" />
					<?php endif; ?>
					<br clear="all" />
				</div>
			</li>
		<?php endforeach; ?>
		</ul>
		<br class="clear" />
		
		<?php
			$page_links = paginate_links( 
				array(
					'base' => add_query_arg( 'paged', '%#%' ),
					'format' => '',
					'total' => $this->totalPages,
					'current' => $this->page
				)
			);

			if ($page_links)
				echo "<div class=\"kaltura-pager\">$page_links</div>";
		?>
	<?php endif; ?>
</div>

<script type="text/javascript">
	jQuery(function () {
		jQuery('li div.showName').kalturaEditableName({
			namePostParam: 'entryName',
			idPostParam: 'entryId',
			idPrefix: 'entryId_',
			url: ajaxurl+'?action=kaltura_ajax&kaction=saveentryname'
		});
	});
</script>
