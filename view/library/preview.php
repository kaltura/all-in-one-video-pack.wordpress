<?php KalturaHelpers::protectView($this); ?>
<?php $this->renderView('library/no-wp-toolbar-css.php'); ?>
<?php $GLOBALS['body_id'] = 'preview-page'; ?>
<div class="player-wrapper">
	<div id="kplayer"></div>
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
