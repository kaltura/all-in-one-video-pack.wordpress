<?php if (!defined("WP_ADMIN")) die();?>
<?php $kaction = isset($_GET["kaction"]) ? $_GET["kaction"] : "browse"; ?>
<div class="<?php echo ($viewData["isLibrary"]) ? "wrap kalturaWrapFix $kaction" : "kalturaTab"?>">
	<?php if ($viewData["isLibrary"]): ?>
	<h2>All in One Video</h2>
	<?php require_once(dirname(__FILE__) . "/view_library_menu.php"); ?>
	<br clear="all" />
	<?php endif; ?>
	<?php if (!count($viewData["result"]->objects)): ?>
		<div class="updated kalturaUpdated">No interactive videos created yet</div>
	<?php else: ?>
		<?php if ($viewData["isLibrary"]): ?>
		<p class="info">Click title to edit entry title. Click thumbnail to preview.</p>
		<?php endif; ?>
		<?php
			$page_links = paginate_links( 
				array(
					'base' => add_query_arg( 'paged', '%#%' ),
					'format' => '',
					'total' => $viewData["totalPages"],
					'current' => $viewData["page"]
				)
			);
			if ($page_links)
				echo "<div class=\"kalturaPager\">$page_links</div>";
		?>
		<script type="text/javascript">
			function deleteEntry(entryId) {
				var res = confirm("Are you sure?");
				<?php $nextUrl = urlencode($_SERVER["REQUEST_URI"]); ?>
				if (res) 
					window.location = '<?php echo KalturaHelpers::generateTabUrl(array("page" => "interactive_video_library", "kaction" => "delete", "nextUrl" => $nextUrl, "entryIds" => null)); ?>&entryid=' + entryId; 
			}
		</script>
		<ul id="kalturaBrowse">
		<?php foreach($result->objects as $mediaEntry): ?>
			<li>
				<?php 
					$sendToEditorUrl =  KalturaHelpers::generateTabUrl(array("tab" => "kaltura_browse", "kaction" => "sendtoeditor", "entryIds" => array($mediaEntry->id)));
				?>
				
				<div id="entryId_<?php echo $mediaEntry->id?>" class="showName" title="<?php _e('Click to edit'); ?>">
					<?php echo $mediaEntry->name ?><br />
				</div>
				<div class="thumb">
					<?php if ($viewData["isLibrary"]): ?>
						<a href="<?php echo KalturaHelpers::getPluginUrl() ?>/page_preview.php?entryId=<?php echo $mediaEntry->id; ?>&TB_iframe=true&height=390&width=600" title="Preview" class="thickbox">
							<img src="<?php echo $mediaEntry->thumbnailUrl; ?>/width/120/height/90/type/2/bgcolor/000" alt="<?php $mediaEntry->name ?>" width="120" height="90" />
						</a>
					<?php else: ?>
					<a href="<?php echo $sendToEditorUrl; ?>">
						<img src="<?php echo $mediaEntry->thumbnailUrl; ?>/width/120/height/90/type/2/bgcolor/000" " alt="<?php $mediaEntry->name ?>" width="120" height="90" />
					</a>
					<?php endif; ?>
				</div>
				<div class="submit">	
					<?php if (!$viewData["isLibrary"]): ?>
						<input type="button" title="Insert into post" class="add" onclick="window.location = '<?php echo $sendToEditorUrl; ?>';" />
					<?php endif; ?>
					<?php if ($mediaEntry->type == KalturaEntryType_MIX): ?>
    					<?php if ($viewData["isLibrary"]): ?>
    						<input type="button" title="Edit video" class="edit_video" onclick="KalturaModal.openModal('simple_editor', '<?php echo KalturaHelpers::getPluginUrl() ?>/page_simple_editor_library.php?entryId=<?php echo $mediaEntry->id; ?>', { width: 890, height: 546 } ); jQuery('#simple_editor').addClass('modalSimpleEditor');" />
    					<?php endif; ?>
					<?php endif; ?>
					<?php $isVideo = ($mediaEntry->type == KalturaEntryType_MEDIA_CLIP && $mediaEntry->mediaType == KalturaMediaType_VIDEO); ?>
					<?php $isMix = ($mediaEntry->type == KalturaEntryType_MIX); ?>
					<?php if ($viewData["isLibrary"]): ?>
						<?php if (($isVideo || $isMix)) :?>
						<input type="button" title="Update thumbnail" class="thumb thickbox" alt="<?php echo KalturaHelpers::getPluginUrl() ?>/page_update_thumbnail.php?entryId=<?php echo $mediaEntry->id; ?>&TB_iframe=true&height=425&width=750"" />
						<?php endif; ?>
						<input type="button" title="Delete video" class="del" onclick="deleteEntry('<?php echo $mediaEntry->id; ?>');" />
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
					'total' => $viewData["totalPages"],
					'current' => $viewData["page"]
				)
			);

			if ($page_links)
				echo "<div class=\"kalturaPager\">$page_links</div>";
		?>
	<?php endif; ?>
</div>

<script type="text/javascript">
	jQuery(function () {
		if (jQuery.fn.tTips) { // in wp2.7, tTips was removed
			jQuery('#kalturaBrowse div.submit input').tTips();
		}

		jQuery('li div.showName').kalturaEditableName({
			namePostParam: 'entryName',
			idPostParam: 'entryId',
			idPrefix: 'entryId_',
			url: '<?php echo KalturaHelpers::getPluginUrl() ?>/ajax_save_entry_name.php'
		});
	});
</script>
