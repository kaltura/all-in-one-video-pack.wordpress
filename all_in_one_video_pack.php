<?php
require_once('settings.php');
require_once('lib/kaltura_client.php');
require_once('lib/kaltura_helpers.php');
require_once('lib/common.php');
 
// comments filter
if (KalturaHelpers::compareWPVersion("2.5", "=")) 
	// in wp 2.5 there was a bug in wptexturize which corrupted our tag with unicode html entities
	// thats why we run our filter before (using lower priority)
	add_filter('comment_text', 'kaltura_the_comment', -1);
else
	// in wp 2.5.1 and higher we can use the default priority
	add_filter('comment_text', 'kaltura_the_comment');

// tag shortcode
add_shortcode('kaltura-widget', 'kaltura_shortcode');

if (KalturaHelpers::videoCommentsEnabled()) {
	add_action('comment_form', 'kaltura_comment_form');
}

// js
add_filter('print_scripts_array', 'kaltura_print_js'); // print js files
add_action('wp_print_scripts', 'kaltura_register_js'); // register js files

// css
add_action('wp_head', 'kaltura_head'); // print css

// footer
add_action('wp_footer', 'kaltura_footer');

// admin css
add_filter('admin_head', 'kaltura_add_admin_css'); // print admin css

// admin menu & tabs
add_action('admin_menu', 'kaltura_add_admin_menu'); // add kaltura admin menu

add_filter("media_buttons_context", "kaltura_add_media_button"); // will add button over the rich text editor
add_filter("media_upload_tabs", "kaltura_add_upload_tab"); // will add tab to the modal media box

add_action("media_upload_kaltura", "kaltura_tab");
add_action("media_upload_kaltura_browse", "kaltura_browse_tab");

if (KalturaHelpers::compareWPVersion("2.6", "<")) {
	add_action("admin_head_kaltura_tab_content", "media_admin_css");
	add_action("admin_head_kaltura_tab_browse_content", "media_admin_css");
}

// tiny mce
add_filter('mce_external_plugins', 'kaltura_add_mce_plugin'); // add the kaltura mce plugin
add_filter('tiny_mce_version', 'kaltura_mce_version');

/*
 * Occures when publishing the post, and on every save while the post is published
 * 
 * @param $postId
 * @param $post
 * @return unknown_type
 */
function kaltura_publish_post($post_id, $post)
{
	require_once("lib/kaltura_wp_model.php");

	$content = $post->post_content;

	$shortcode_tags = array();
	
	global $kaltura_post_id, $kaltura_widgets_in_post;
	$kaltura_post_id = $post_id;
	$kaltura_widgets_in_post = array();
	
	function kaltura_find_post_widgets($args) {
		$wid = @$args["wid"];
		if (!$wid)
			return;
		global $kaltura_post_id;
		global $kaltura_widgets_in_post;
		$kaltura_widgets_in_post[] = $wid; // later will use it to delete the widgets that are not in the post 
		
		$widget = array();
		$widget["id"] = $wid;
		$widget["type"] = KALTURA_WIDGET_TYPE_POST;
		$widget["add_permissions"] = $args["addpermission"];
		$widget["edit_permissions"] = $args["editpermission"];
		$widget["post_id"] = $kaltura_post_id;
		$widget["status"] = KALTURA_WIDGET_STATUS_PUBLISHED;

		$widget = KalturaWPModel::insertOrUpdateWidget($widget);
	}
	
	KalturaHelpers::runKalturaShortcode($content, "kaltura_find_post_widgets");

	// delete all widgets that doesn't exists in the post anymore
	KalturaWPModel::deleteUnusedWidgetsByPost($kaltura_post_id, $kaltura_widgets_in_post);
}

add_action("publish_post", "kaltura_publish_post", 10, 2);


/*
 * Occures on evey status change, we need to mark our widgets as unpublished when status of the post is not publish
 * 
 * @param $oldStatus
 * @param $newStatus
 * @param $post
 * @return unknown_type
 */
function kaltura_post_status_change($new_status, $old_status, $post)
{
	// get all widgets linked to this post and mark them as not published
	$statuses = array("inherit", "publish");
	// we don't handle "inherit" status because it not the real post, but the revision
	// we don't handle "publish" status because it's handled in: "kaltura_publish_post"
	if (!in_array($new_status, $statuses))
	{
		require_once("lib/kaltura_wp_model.php");
		$widgets = KalturaWPModel::getWidgetsByPost($post->ID);
		KalturaWPModel::unpublishWidgets($widgets);
	}
}

add_action("transition_post_status", "kaltura_post_status_change", 10, 3); 


/*
 * Occures when comment status is changed
 * @param $comment_id
 * @param $status
 * @return unknown_type
 */
function kaltura_set_comment_status($comment_id, $status)
{
	require_once("lib/kaltura_wp_model.php");

	switch ($status)
	{
		case "approve":
			kaltura_comment_post($comment_id, 1);
			break;
		default:
			KalturaWPModel::deleteWidgetsByComment($comment_id);
	}
}

add_action("wp_set_comment_status", "kaltura_set_comment_status", 10, 2);


/*
 * Occured when posting a comment
 * @param $comment_id
 * @param $approved
 * @return unknown_type
 */
function kaltura_comment_post($comment_id, $approved)
{
	if ($approved) 
	{
		require_once("lib/kaltura_wp_model.php");
		

		global $kaltura_comment_id;
		$kaltura_comment_id = $comment_id;
		function kaltura_find_comment_widgets($args)
		{
			$wid = @$args["wid"];
			if (!$wid)
				return;
			
			global $kaltura_comment_id;
			// add new widget
			$widget = array();
			$widget["id"] = $wid;
			$widget["type"] = KALTURA_WIDGET_TYPE_COMMENT;
			$widget["comment_id"] = $kaltura_comment_id;
			$widget["status"] = KALTURA_WIDGET_STATUS_PUBLISHED;
			
			$widget = KalturaWPModel::insertOrUpdateWidget($widget);
		}
		
		$comment = get_comment($comment_id);
		KalturaHelpers::runKalturaShortcode($comment->comment_content, "kaltura_find_comment_widgets");
	}
}

add_action("comment_post", "kaltura_comment_post", 10, 2);

/*
 * Occures when the plugin is activated 
 * @return unknown_type
 */
function kaltura_activate()
{
	update_option("kaltura_default_player_type", "whiteblue");
	update_option("kaltura_comments_player_type", "whiteblue");

	require_once("kaltura_db.php");
	kaltura_install_db();
}

register_activation_hook(KALTURA_PLUGIN_FILE, 'kaltura_activate');


function kaltura_admin_page()
{
	require_once("lib/kaltura_model.php");
	require_once('admin/kaltura_admin_controller.php');
}

function kaltura_library_page()
{
	require_once("lib/kaltura_library_controller.php");
}

function kaltura_add_mce_plugin($content) {
	$pluginUrl = kalturaGetPluginUrl();
	$content["kaltura"] = $pluginUrl . "/tinymce/kaltura_tinymce.js?v".kaltura_get_version();
	return $content;
}

function kaltura_mce_version($content) {
	return $content . '_k'.kaltura_get_version();
}
  
function kaltura_add_admin_menu() {
	add_options_page('All in One Video', 'All in One Video', 8, 'interactive_video', 'kaltura_admin_page');
	add_management_page('All in One Video Library', 'All in One Video Library', 8, 'interactive_video_library', 'kaltura_library_page');
}

function kaltura_the_content($content) {
	return _kaltura_replace_tags($content, false);
}

function kaltura_the_comment($content) {
	global $shortcode_tags;
	
	// we want to run our shortcode and not all
	$shortcode_tags_backup = $shortcode_tags;
	$shortcode_tags = array();
	
	add_shortcode('kaltura-widget', 'kaltura_shortcode');
	$content = do_shortcode($content);
	
	// restore the original array
	$shortcode_tags = $shortcode_tags_backup;
	
	return $content;
}

function kaltura_print_js($content) {
	$content[] = 'kaltura';
	$content[] = 'jquery';
	$content[] = 'kaltura_swfobject_1.5';
	
	KalturaHelpers::addWPVersionJS();
	
	return $content;
}

function kaltura_register_js() {
	$plugin_url = kalturaGetPluginUrl();
	wp_register_script('kaltura', $plugin_url . '/js/kaltura.js?v'.kaltura_get_version());
	wp_register_script('kaltura_swfobject_1.5', $plugin_url . '/js/swfobject.js?v'.kaltura_get_version(), array(), '1.5');
}

function kaltura_head() {
	$plugin_url = kalturaGetPluginUrl();
	echo('<link rel="stylesheet" href="' . $plugin_url . '/css/kaltura.css?v'.kaltura_get_version().'" type="text/css" />');
}

function kaltura_footer() {
	$plugin_url = kalturaGetPluginUrl();
	echo ' 
	<script type="text/javascript">
		function handleGotoContribWizard (widgetId) {
			KalturaModal.openModal("contribution_wizard", "' . $plugin_url . '/page_contribution_wizard_front_end.php?wid=" + widgetId, { width: 680, height: 360 } );
			jQuery("#contribution_wizard").addClass("modalContributionWizard");
		}
	
		function handleGotoEditorWindow (widgetId) {
			KalturaModal.openModal("simple_editor", "' . $plugin_url . '/page_simple_editor_front_end.php?wid=" + widgetId, { width: 890, height: 546 } );
			jQuery("#simple_editor").addClass("modalSimpleEditor");
		}
	</script>
	
	';
}

function kaltura_add_admin_css($content) {
	$plugin_url = kalturaGetPluginUrl();
	$content .= '<link rel="stylesheet" href="' . $plugin_url . '/css/kaltura.css?v'.kaltura_get_version().'" type="text/css" />' . "\n";
	echo $content;
}

function kaltura_create_tab() 
{
	require_once('tab_create.php');
}

function kaltura_add_media_button($content)
{
	global $post_ID, $temp_ID;
	$uploading_iframe_ID = (int) (0 == $post_ID ? $temp_ID : $post_ID);
	$media_upload_iframe_src = "media-upload.php?post_id=$uploading_iframe_ID";
	$kaltura_iframe_src = apply_filters('kaltura_iframe_src', "$media_upload_iframe_src&amp;tab=kaltura");
	$kaltura_browse_iframe_src = apply_filters('kaltura_iframe_src', "$media_upload_iframe_src&amp;tab=kaltura_browse");
	$kaltura_title = __('Add Interactive Video');
	$kaltura_button_src = kalturaGetPluginUrl() . '/images/interactive_video_button.gif';
	$content .= <<<EOF
		<a href="{$kaltura_iframe_src}&amp;TB_iframe=true&amp;height=500&amp;width=640" class="thickbox" title='$kaltura_title'><img src='$kaltura_button_src' alt='$kaltura_title' /></a>
EOF;

	return $content;
}

function kaltura_add_upload_tab($content)
{
	$content["kaltura"] = __("All in One Video");
	return $content;
}

function kaltura_add_upload_tab_interactive_video_only($content)
{
	$content = array();
	$content["kaltura"] = __("Add Interactive Video");
	$content["kaltura_browse"] = __("Browse Interactive Videos");
	return $content;
}

function kaltura_tab()
{
	// only for 2.6 and higher
	if (KalturaHelpers::compareWPVersion("2.6", ">="))
	{
		wp_enqueue_style('media');
	}
	wp_iframe('kaltura_tab_content');
}

function kaltura_tab_content()
{
	unset($GLOBALS['wp_filter']['media_upload_tabs']); // remove all registerd filters for the tabs
	add_filter("media_upload_tabs", "kaltura_add_upload_tab_interactive_video_only"); // register our filter for the tabs
	media_upload_header(); // will add the tabs menu
	if (!get_option('kaltura_partner_id'))
	{
		?>
			<div class="kalturaTab">
				To get started, you need to get a Partner ID. <a href="options-general.php?page=interactive_video" target="_parent">Click here</a> to get one
			</div>
		<?php
	}
	else
	{
		require_once("lib/kaltura_model.php");
		require_once("lib/kaltura_helpers.php");
	
		$kalturaClient = getKalturaClient();
		if (!$kalturaClient)
		{
			wp_die(__('Failed to start new session.'));
		}
		$ks = $kalturaClient->getKs();
		
		$kshowId = "-2";
		
		$viewData["flashVars"] 	= KalturaHelpers::getContributionWizardFlashVars($ks, $kshowId);
		$viewData["flashVars"]["showCloseButton"] 	= "false";
		$viewData["swfUrl"]    	= KalturaHelpers::getContributionWizardUrl(KALTURA_KCW_UICONF);
		$viewData["kshowId"] 	= $kshowId;
		
		require_once("view/view_contribution_wizard_admin.php");
	}
}

function kaltura_browse_tab()
{
	// only for 2.6 and higher
	if (KalturaHelpers::compareWPVersion("2.6", ">="))
	{
		wp_enqueue_style('media');
	}
	wp_iframe('kaltura_tab_browse_content');
}

function kaltura_tab_browse_content()
{
	unset($GLOBALS['wp_filter']['media_upload_tabs']); // remove all registerd filters for the tabs
	add_filter("media_upload_tabs", "kaltura_add_upload_tab_interactive_video_only"); // register our filter for the tabs
	media_upload_header(); // will add the tabs menu
	
	require_once("lib/kaltura_library_controller.php");
}

function kaltura_comment_form($post_id) {
	$user = wp_get_current_user();
	if (!$user->ID && !KalturaHelpers::anonymousCommentsAllowed())
	{
		echo "You must be <a href=" . get_option('siteurl') . "/wp-login.php?redirect_to=" . urlencode(get_permalink()) . ">logged in</a> to post a <br /> video comment.";
	}
	else
	{
		$plugin_url = kalturaGetPluginUrl();
		$js_click_code = "Kaltura.openCommentCW('".$plugin_url."'); ";
		echo "<input type=\"button\" id=\"kaltura_video_comment\" name=\"kaltura_video_comment\" tabindex=\"6\" value=\"Add Video Comment\" onclick=\"" . $js_click_code . "\" />";
	}
}

function kaltura_shortcode($attrs) {
	// for wordpress 2.5, in wordpress 2.6+ shortcodes are striped in rss feedds
	if (is_feed())
		return "";
		
	// get the embed options from the attributes
	$embedOptions = _kaltura_get_embed_options($attrs);

	$isComment		= (@$attrs["size"] == "comments") ? true : false;
	$wid 			= $embedOptions["wid"];
	$width 			= $embedOptions["width"];
	$height 		= $embedOptions["height"];
	$divId 			= "kaltura_wrapper_" . $wid;
	$thumbnailDivId = "kaltura_thumbnail_" . $wid;
	$playerId 		= "kaltura_player_" . $wid;
	
	$link = '';
	$link .= '<a href="http://corp.kaltura.com/">open source video</a><br />';
	$link .= '<a href="http://corp.kaltura.com/technology/video_player">free video player</a><br />';
	$link .= '<a href="http://corp.kaltura.com/technology/video_editor">open source editor</a><br />';
	$link .= '<a href="http://corp.kaltura.com/technology/video_management">video management</a><br />';
	$link .= '<a href="http://corp.kaltura.com/solutions/overview">online video</a><br />';
	$link .= '<a href="http://corp.kaltura.com/technology/premium_video_editor">video editor</a><br />';
	$link .= '<a href="http://corp.kaltura.com/download">video plugin</a><br />';
	
	$powerdByBox ='<div class="poweredByKaltura" style="width: ' . $embedOptions["width"] . 'px; "><div><a href="http://corp.kaltura.com/wordpress_video_plugin?general&campaign=wordpress_plugin_HTML_link" target="_blank">Video player</a> by <a href="http://corp.kaltura.com" target="_blank">Kaltura</a></div></div>';
	
	if ($isComment)
	{
		$thumbnailPlaceHolderUrl = KalturaHelpers::getCommentPlaceholderThumbnailUrl($wid);

		$embedOptions["flashVars"] .= "&autoPlay=true";
		$html = '
				<div id="' . $thumbnailDivId . '" style="width:'.$width.'px;height:'.$height.'px;" class="kalturaHand" onclick="Kaltura.activatePlayer(\''.$thumbnailDivId.'\',\''.$divId.'\');">
					<img src="' . $thumbnailPlaceHolderUrl . '" style="" />
				</div>
				<div id="' . $divId . '" style="height: '.$height.'px"">'.$link.'</div>
				<script type="text/javascript">
					jQuery("#'.$divId.'").hide();
					var kaltura_swf = new SWFObject("' . $embedOptions["swfUrl"] . '", "' . $playerId . '", "' . $width . '", "' . $height . '", "9", "#000000");
					kaltura_swf.addParam("wmode", "opaque");
					kaltura_swf.addParam("flashVars", "' . $embedOptions["flashVars"] . '");
					kaltura_swf.addParam("allowScriptAccess", "always");
					kaltura_swf.addParam("allowFullScreen", "true");
					kaltura_swf.addParam("allowNetworking", "all");
					kaltura_swf.write("' . $divId . '");
				</script>
		';
	}
	else
	{
		$divId = "kaltura_wrapper_" . $embedOptions["wid"];
		$playerId = "kaltura_player_" . $embedOptions["wid"];
		$style = '';
		$style .= 'width:' . $embedOptions["width"] .'px;';
		$style .= 'height:' . ($embedOptions["height"] + 10) . 'px;'; // + 10 is for the powered by div
		if (@$embedOptions["align"])
			$style .= 'float:' . $embedOptions["align"] . ';';
			
		// append the manual style properties
		if (@$embedOptions["style"])
			$style .= $embedOptions["style"];
			
		$html = '
				<span id="'.$divId.'" style="'.$style.'">'.$link.$powerdByBox.'</span>
				<script type="text/javascript">
					var kaltura_swf = new SWFObject("' . $embedOptions["swfUrl"] . '", "' . $playerId . '", "' . $embedOptions["width"] . '", "' . $embedOptions["height"] . '", "9", "#000000");
					kaltura_swf.addParam("wmode", "opaque");
					kaltura_swf.addParam("flashVars", "' . $embedOptions["flashVars"] . '");
					kaltura_swf.addParam("allowScriptAccess", "always");
					kaltura_swf.addParam("allowFullScreen", "true");
					kaltura_swf.addParam("allowNetworking", "all");
					kaltura_swf.write("' . $divId . '");
					jQuery("#'.$divId.'").append("'.str_replace("\"", "\\\"", $powerdByBox).'"); 
				</script>
		';
		//                                              ^ escape quotes for javascript ^
	}
		
	return $html;
}
function kaltura_get_version() {
	$plugin_data = implode( '', file( str_replace('all_in_one_video_pack.php', 'interactive_video.php', __FILE__)));
	if ( preg_match( "|Version:(.*)|i", $plugin_data, $version ))
		$version = trim( $version[1] );
	else
		$version = '';
	
	return $version;
}

function _kaltura_get_embed_options($params) {
	if (@$params["size"] == "comments") // comments player
	{
		if (get_option('kaltura_comments_player_type'))
			$type = get_option('kaltura_comments_player_type');
		else
			$type = get_option('kaltura_default_player_type'); 
			
		$params["width"] = 250;
		$params["height"] = 244;
		$layoutId = "tinyPlayer";
	}
	else 
	{ 
		// backward compatibility
		switch($params["size"])
		{
			case "large":
				$params["width"] = 410;
				$params["height"] = 364;
				break;
			case "small":
				$params["width"] = 250;
				$params["height"] = 244;
				break;
		}
		
		// if width is missing set some default
		if (!@$params["width"]) 
			$params["width"] = 410;

		// if height is missing, recalculate it
		if (!@$params["height"])
			$params["height"] = KalturaHelpers::calculatePlayerHeight(get_option('kaltura_default_player_type'), $params["width"]);
			
		// check the permissions
		if (KalturaHelpers::userCanEdit(@$params["editpermission"]))
		{
			$layoutId = "full";
		}
		else if (KalturaHelpers::userCanAdd(@$params["addpermission"]))
		{
			$layoutId = "addOnly";
		}
		else
		{ 
			$layoutId = "playerOnly";
		}
			
		if ($params["size"] == "large_wide_screen")  // FIXME: temp hack
			$layoutId .= "&wideScreen=1";
	}
	
	// align
	switch ($params["align"])
	{
		case "r":
		case "right":
			$align = "right";
			break;
		case "m": 
		case "center":
			$align = "center";
			break;
		case "l":
		case "left":
			$align = "left";
			break;
		default:
			$align = "";			
	}
		
	if ($_SERVER["SERVER_PORT"] == 443)
		$protocol = "https://";
	else
		$protocol = "http://";
		 
	$postUrl = $protocol . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	$flashVarsStr =  "layoutId=" . $layoutId;
	
	$wid = $params["wid"];
	$swfUrl = KalturaHelpers::getSwfUrlForWidget($wid);

	return array(
		"flashVars" => $flashVarsStr,
		"height" => $params["height"],
		"width" => $params["width"],
		"align" => $align,
		"style" => @$params["style"],
		"wid" => $wid,
		"swfUrl" => $swfUrl
	);
}

if ( !get_option('kaltura_partner_id') && !isset($_POST['submit']) && !strpos($_SERVER["REQUEST_URI"], "page=interactive_video")) {
	function kaltura_warning() {
		echo "
		<div class='updated fade'><p><strong>".__('To complete the All in One Video Pack installation, <a href="'.get_settings('siteurl').'/wp-admin/options-general.php?page=interactive_video">you must get a Partner ID.</a>')."</strong></p></div>
		";
	}
	add_action('admin_notices', 'kaltura_warning');
}
?>