<div class="<?php echo ($viewData["isLibrary"]) ? "wrap kalturaWrapFix" : "kalturaTab"?>">
	<?php if (!count($viewData["result"]->objects)): ?>
		<div class="updated kalturaUpdated">No interactive videos created yet</div>
	<?php else: ?>
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
				if (res)
					window.location = '<?php echo KalturaHelpers::generateTabUrl(array("kaction" => "delete", "entryid" => null)); ?>&entryid=' + entryId; 
			}
		</script>
		<ul id="kalturaBrowse">
		<?php foreach($result->objects as $mediaEntry): ?>
			<li>
				<?php 
					$sendToEditorUrl =  KalturaHelpers::generateTabUrl(array("kaction" => "sendtoeditor", "entryid" => $mediaEntry->id));
				?>
				
				<div class="showName">
					<?php echo $mediaEntry->name ?><br />
				</div>
				<div class="thumb">
					<?php if ($viewData["isLibrary"]): ?>
						<img src="<?php echo $mediaEntry->thumbnailUrl; ?>" alt="<?php $mediaEntry->name ?>" />
					<?php else: ?>
					<a href="<?php echo $sendToEditorUrl; ?>">
						<img src="<?php echo $mediaEntry->thumbnailUrl; ?>" alt="<?php $mediaEntry->name ?>" />
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
    					<?php else: ?>
    						<input type="button" title="Edit video" class="edit_video" onclick="window.location = '<?php echo KalturaHelpers::getPluginUrl() ?>/page_simple_editor_admin.php?entryId=<?php echo $mediaEntry->id; ?>&backurl=<?php echo urlencode(KalturaHelpers::getRequestUrl()); ?>';" />
    					<?php endif; ?>
					<?php endif; ?>
					<?php $isVideo = ($mediaEntry->type == KalturaEntryType_MEDIA_CLIP && $mediaEntry->mediaType == KalturaMediaType_VIDEO); ?>
					<?php $isMix = ($mediaEntry->type == KalturaEntryType_MIX); ?>
					<?php if ($viewData["isLibrary"] && ($isVideo || $isMix)): ?>
						<input type="button" title="Update thumbnail" class="thumb thickbox" alt="<?php echo KalturaHelpers::getPluginUrl() ?>/page_update_thumbnail.php?entryId=<?php echo $mediaEntry->id; ?>&TB_iframe=true&height=425&width=750"" />
					<?php endif; ?>
					<input type="button" title="Delete video" class="del" onclick="deleteEntry('<?php echo $mediaEntry->id; ?>');" />
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
	});
</script>
