<div class="<?php echo ($viewData["isLibrary"]) ? "wrap kalturaWrapFix" : "kalturaTab"?>">
	<?php if (!count(@$viewData["result"]["kshows"])): ?>
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
			function deleteKShow(kshowId) {
				var res = confirm("Are you sure?");
				if (res)
					window.location = '<?php echo kalturaGenerateTabUrl(array("kaction" => "delete", "kshowid" => null)); ?>&kshowid=' + kshowId; 
			}
		</script>
		<ul id="kalturaBrowse">
		<?php foreach($viewData["result"]["kshows"] as $kshow): ?>
			<li>
				<?php 
					$desc = $kshow["showEntry"];
					$sendToEditorUrl =  kalturaGenerateTabUrl(array("kaction" => "sendtoeditor", "kshowid" => $kshow["id"]));
				?>
				
				<div class="showName">
					<?php echo $kshow["name"] ?><br />
				</div>
				<div class="thumb">
					<?php if ($viewData["isLibrary"]): ?>
						<img src="<?php echo $desc["thumbnailUrl"]; ?>" alt="<?php $kshow["name"] ?>" />
					<?php else: ?>
					<a href="<?php echo $sendToEditorUrl; ?>">
						<img src="<?php echo $desc["thumbnailUrl"]; ?>" alt="<?php $kshow["name"] ?>" />
					</a>
					<?php endif; ?>
				</div>
				<div class="submit">	
					<?php if (!$viewData["isLibrary"]): ?>
						<input type="button" title="Insert into post" class="add" onclick="window.location = '<?php echo $sendToEditorUrl; ?>';" />
					<?php endif; ?>
					<?php if ($viewData["isLibrary"]): ?>
						<input type="button" title="Edit video" class="edit_video" onclick="KalturaModal.openModal('simple_editor', '<?php echo kalturaGetPluginUrl() ?>/page_simple_editor_library.php?kshowid=<?php echo $kshow["id"]; ?>', { width: 890, height: 546 } ); jQuery('#simple_editor').addClass('modalSimpleEditor');" />
					<?php else: ?>
						<input type="button" title="Edit video" class="edit_video" onclick="window.location = '<?php echo kalturaGetPluginUrl() ?>/page_simple_editor_admin.php?kshowid=<?php echo $kshow["id"]; ?>&backurl=<?php echo urlencode(kalturaGetRequestUrl()); ?>';" />
					<?php endif; ?>
					<input type="button" title="Delete video" class="del" onclick="deleteKShow('<?php echo $kshow["id"]; ?>');" />
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
		jQuery('#kalturaBrowse div.submit input').tTips();
	});
</script>
