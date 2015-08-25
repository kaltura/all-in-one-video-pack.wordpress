<?php KalturaHelpers::protectView( $this ); ?>
<?php
$flashVarsStr = '';
if ( is_array( $this->flashVars ) ) {
	$flashVarsStr = KalturaHelpers::flashVarsToString( $this->flashVars );
}
?>

<div class="kaltura-tab">
	Add Media is currently not available. To upload video to the KMC, please use existing procedures. To add an existing video to your story click on the "Browse Existing Media Tab".
</div>

<script type="text/javascript">
	var topWindow = Kaltura.getTopWindow();
	// fix for IE6, scroll the page up so modal would animate in the center of the window
	if (jQuery.browser.msie && jQuery.browser.version < 7)
		topWindow.scrollTo(0, 0);
</script>