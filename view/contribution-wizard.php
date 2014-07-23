<?php KalturaHelpers::protectView( $this ); ?>
<?php
$flashVarsStr = '';
if ( is_array( $this->flashVars ) ) {
	$flashVarsStr = KalturaHelpers::flashVarsToString( $this->flashVars );
}
?>

<object id="kcw" type="application/x-shockwave-flash" data="<?php echo esc_url( $this->swfUrl ); ?>" width="100%" height="360">
	<param name="allowScriptAccess" value="always" />
	<param name="allowNetworking" value="all" />
	<param name="wmode" value="transparent" />
	<param name="flashvars" value="<?php echo esc_attr( $flashVarsStr ); ?>" />
	<param name="movie" value="<?php echo esc_url( $this->swfUrl ); ?>" />
</object>

<script type="text/javascript">
	var topWindow = Kaltura.getTopWindow();
	// fix for IE6, scroll the page up so modal would animate in the center of the window
	if (jQuery.browser.msie && jQuery.browser.version < 7)
		topWindow.scrollTo(0, 0);
</script>