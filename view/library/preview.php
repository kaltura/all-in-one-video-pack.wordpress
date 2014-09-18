<?php KalturaHelpers::protectView( $this ); ?>
<?php $this->renderView( 'library/no-wp-toolbar-css.php' ); ?>
<div id="preview-page">
	<div class="player-wrapper">
		<div id="kplayer"></div>
	</div>
</div>

<script type="text/javascript">
	kWidget.embed({
		"targetId" : 'kplayer',
		"wid"      : '<?php echo esc_js($this->widgetId); ?>',
		"uiconf_id": '<?php echo esc_js($this->uiConfId); ?>',
		"entry_id" : '<?php echo esc_js($this->entryId); ?>',
		"flashvars": <?php echo json_encode($this->flashVars); ?>
	});
</script>

<?php echo "testDavid" . esc_html($this->uiConfId);