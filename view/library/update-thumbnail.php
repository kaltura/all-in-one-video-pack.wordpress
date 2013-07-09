<?php KalturaHelpers::protectView($this); ?>
<?php $this->renderView('library/no-wp-toolbar-css.php'); ?>
<?php $GLOBALS['body_id'] = 'update-thumbnail-page'; ?>
<div class="page-wrapper">
	<div class="player-wrapper">
		<div id="kplayer"></div>
	</div>
	<p>
		Play the video and you will see a "Capture Thumbnail" button on top of the video.  Click the button on the frame you want to capture, wait for a confirmation message and then click "Done".
		<br />
		<button type="button" onclick="window.parent.location.reload(); window.parent.tb_remove();">Done</button>
	</p>
</div>
<script type="text/javascript">
	kWidget.embed({
		"targetId": 'kplayer',
		"wid": '<?php echo $this->widgetId; ?>',
		"uiconf_id": '<?php echo $this->uiConfId; ?>',
		"entry_id":  '<?php echo esc_js($this->entryId); ?>',
		"flashvars": <?php echo json_encode($this->flashVars); ?>,
		"entry_id": '<?php echo $this->entryId; ?>'
	});
</script>