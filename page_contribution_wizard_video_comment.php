<?php 
	define('WP_USE_THEMES', false);
	require('../../../wp-blog-header.php');
	require_once('settings.php');
	require_once('lib/kaltura_helpers.php');
	require_once("lib/kaltura_model.php");
	
	function kalturaValidateVideoComment() {
		$js_error = "";
		
		// wordpress validation code from wp-comments-post (with slight changes)
		$comment_author       = trim(strip_tags($_GET['author']));
		$comment_author_email = trim($_GET['email']);
		
		$user = wp_get_current_user();
		if ( $user->ID ) {
			global $wpdb;
			$comment_author       = $wpdb->escape($user->display_name);
			$comment_author_email = $wpdb->escape($user->user_email);
			$comment_author_url   = $wpdb->escape($user->user_url);
		} else {
			if ( get_option('comment_registration') )
				return __('Sorry, you must be logged in to post a comment.');
		}
		
		if ( get_option('require_name_email') && !$user->ID ) {
			if ( 6 > strlen($comment_author_email) || '' == $comment_author ) 
				return __('Error: please fill the required fields (name, email).');
			elseif ( !is_email($comment_author_email))
				return __('Error: please enter a valid email address.');
		}
		// end of wordpress validation code

		if (!KalturaHelpers::videoCommentsEnabled())
		{
			return __('You do not have sufficient permissions to access this page.');
		}
		if (!KalturaHelpers::anonymousCommentsAllowed() && !$user->ID)
		{
			return __('You must be logged in to post a comment.');
		}
	
		$post_id = $_GET["postid"];
		
		if (!$post_id)
		{
			return __('Invalid post id.'); 
		}
		
		return "";
	}
	
	$js_error = kalturaValidateVideoComment();

	if ($js_error == "") {
		$kmodel = KalturaModel::getInstance();
		$ks = $kmodel->getClientSideSession();
		if (!$ks)
		{
			$js_error = __('Failed to start new session.');
		}
		else
		{
			$viewData["swfUrl"]    		= KalturaHelpers::getContributionWizardUrl(KALTURA_KCW_UICONF_COMMENTS);
			$viewData["flashVars"] 		= KalturaHelpers::getContributionWizardFlashVars($ks);
			$viewData["postId"] = $_GET["postid"];
		}
	}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo KalturaHelpers::getPluginUrl(); ?>/css/kaltura.css"/>
<style type="text/css">
	html, body { margin:0; padding:0; }
</style>
<script type="text/javascript" src="<?php echo KalturaHelpers::getPluginUrl(); ?>/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo KalturaHelpers::getPluginUrl(); ?>/js/kaltura.js"></script>
<script type="text/javascript" src="<?php echo KalturaHelpers::getPluginUrl(); ?>/../../../wp-includes/js/jquery/jquery.js"></script>

<?php if ($js_error != ""): ?>
<script type="text/javascript">
	var topWindow = Kaltura.getTopWindow();
	topWindow.Kaltura.doErrorFromComments("<?php echo $js_error; ?>");
</script>
<?php else: ?>		
<script type="text/javascript">
	var entryIds = "";
	var topWindow = Kaltura.getTopWindow();
	function onContributionWizardAfterAddEntry(obj)
	{
		if (obj && obj.length)
		{
			for(var i = 0; i < obj.length; i++)
			{
				entryIds += (obj[i].entryId + ",");
			}
			entryIds = entryIds.substr(0, entryIds.length - 1);
		}
	}
	
	function onContributionWizardClose(modified)
	{
		setTimeout("onContributionWizardCloseTimeouted("+modified+");");
	}
	
	function onContributionWizardCloseTimeouted(modified)
	{
		if (modified && entryIds.length > 0) 
		{
			jQuery.ajax(
				{
					url: "<?php echo KalturaHelpers::getPluginUrl(); ?>/ajax_prepare_comment_widget.php",
					success: addWidgetSuccessHandler,
					error: addWidgetErrorHandler,
					dataType: "html",
					method: "GET",
					data: { entryIds: entryIds, postId: <?php echo $viewData["postId"] ?> }
				}
			);
		}
		else
		{
			topWindow.KalturaModal.closeModal();
		}
	}
	
	function addWidgetSuccessHandler(data, status)
	{
		var jqComments = topWindow.jQuery("#comment,[name=comment]");
		var jqSubmitButton = topWindow.jQuery("#submit,[name=submit]");

		if (jqComments.size() > 0 && jqSubmitButton.size() > 0)
		{
			// get only the first submit button that was found
			jqSubmitButton = jQuery(jqSubmitButton[0]);
			
			var html = jqComments.val();
			if (html.replace(" ", "") != "")
				html += "\n";
				
			html += data;
			jqComments.val(html);
			jqComments.attr('readonly', true);
			jqSubmitButton.click();
			jqSubmitButton.val("Please wait...");
			jqSubmitButton.attr("disabled", true);
		}
		
		topWindow.KalturaModal.closeModal();
	}
	
	function addWidgetErrorHandler()
	{
		topWindow.Kaltura.doErrorFromComments("Failed to add your comment");
	}
	
</script>
</head>
<body>

<?php
	require_once("view/view_contribution_wizard.php");
?>

</body>
<?php endif; ?>
</html>
