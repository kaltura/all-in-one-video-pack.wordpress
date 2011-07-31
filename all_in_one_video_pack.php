<?php
require_once('settings.php');
require_once('lib/kaltura_client.php');
require_once('lib/kaltura_helpers.php');
 

// a workaround when using symbolic links and __FILE__ holds the resolved path
$all_in_one_video_pack_file = __FILE__;
if (isset($mu_plugin)) {
    $all_in_one_video_pack_file = $mu_plugin;
}
if (isset($network_plugin)) {
    $all_in_one_video_pack_file = $network_plugin;
}
if (isset( $plugin ) ) {
    $all_in_one_video_pack_file = $plugin;
}

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

if (KalturaHelpers::compareWPVersion("2.7", ">="))
	add_action('load-media_page_interactive_video_library', 'kaltura_library_page_load'); // to enqueue scripts and css
else
	add_action('load-manage_page_interactive_video_library', 'kaltura_library_page_load'); // to enqueue scripts and css

// admin menu & tabs
add_action('admin_menu', 'kaltura_add_admin_menu'); // add kaltura admin menu

add_filter("media_buttons_context", "kaltura_add_media_button"); // will add button over the rich text editor
add_filter("media_upload_tabs", "kaltura_add_upload_tab"); // will add tab to the modal media box

add_action("media_upload_kaltura_upload", "kaltura_upload_tab");
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
	KalturaHelpers::runKalturaShortcode($content, "_kaltura_find_post_widgets");

	// delete all widgets that doesn't exists in the post anymore
	KalturaWPModel::deleteUnusedWidgetsByPost($kaltura_post_id, $kaltura_widgets_in_post);
}

add_action("publish_post", "kaltura_publish_post", 10, 2);
add_action("publish_page", "kaltura_publish_post", 10, 2);


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
 * Occures on post delete, and deleted all widgets for that post
 * 
 * @param $post_id
 */
function kaltura_delete_post($post_id)
{
	require_once("lib/kaltura_wp_model.php");
	KalturaWPModel::deleteUnusedWidgetsByPost($post_id, array());
}

add_action("deleted_post", "kaltura_delete_post", 10, 1); 


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
		
		$comment = get_comment($comment_id);
		KalturaHelpers::runKalturaShortcode($comment->comment_content, "_kaltura_find_comment_widgets");
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
	$_GET["kaction"] = isset($_GET["kaction"]) ? $_GET["kaction"] : "entries";
	require_once("lib/kaltura_library_controller.php");
}

function kaltura_video_library_video_posts_page()
{
	require_once("lib/kaltura_library_controller.php");
}

function kaltura_library_page_load()
{
	if (KalturaHelpers::compareWPVersion("2.6", ">="))
		add_thickbox();
	else
		wp_enqueue_script('thickbox');
}

function kaltura_add_mce_plugin($content) {
	$pluginUrl = KalturaHelpers::getPluginUrl();
	$content["kaltura"] = $pluginUrl . "/tinymce/kaltura_tinymce.js?v".kaltura_get_version();
	return $content;
}

function kaltura_mce_version($content) 
{
	return $content . '_k'.kaltura_get_version();
}
  
function kaltura_add_admin_menu() 
{
	add_options_page('All in One Video', 'All in One Video', 8, 'interactive_video', 'kaltura_admin_page');
	
	$args = array('All in One Video', 'All in One Video', 8, 'interactive_video_library', 'kaltura_library_page');
	// because of the change in wordpress 2.7 menu structure, we move the library page under "Media" tab
	if (KalturaHelpers::compareWPVersion("2.7", ">=")) 
		call_user_func_array("add_media_page", $args);
	else
		call_user_func_array("add_management_page", $args);
}

function kaltura_the_content($content) 
{
	return _kaltura_replace_tags($content, false);
}

function kaltura_the_comment($content) 
{
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

function kaltura_print_js($content) 
{
	$content[] = 'kaltura';
	$content[] = 'jquery';
	$content[] = 'kaltura_swfobject_1.5';
	if (is_admin())
		$content[] = 'kadmin';
	KalturaHelpers::addWPVersionJS();
	
	return $content;
}

function kaltura_register_js() 
{
	$plugin_url = KalturaHelpers::getPluginUrl();
	wp_register_script('kaltura', $plugin_url . '/js/kaltura.js?v'.kaltura_get_version());
	if (is_admin())
		wp_register_script('kadmin', $plugin_url . '/js/kadmin.js?v'.kaltura_get_version());
	wp_register_script('kaltura_swfobject_1.5', $plugin_url . '/js/swfobject.js?v'.kaltura_get_version(), array(), '1.5');
}

function kaltura_head() 
{
	$plugin_url = KalturaHelpers::getPluginUrl();
	echo('<link rel="stylesheet" href="' . $plugin_url . '/css/kaltura.css?v'.kaltura_get_version().'" type="text/css" />');
}

function kaltura_footer() 
{
	$plugin_url = KalturaHelpers::getPluginUrl();
	echo ' 
	<script type="text/javascript">
		function handleGotoContribWizard (widgetId, entryId) {
			KalturaModal.openModal("contribution_wizard", "' . $plugin_url . '/page_contribution_wizard_front_end.php?wid=" + widgetId + "&entryId=" + entryId, { width: 680, height: 360 } );
			jQuery("#contribution_wizard").addClass("modalContributionWizard");
		}
	
		function handleGotoEditorWindow (widgetId, entryId) {
			KalturaModal.openModal("simple_editor", "' . $plugin_url . '/page_simple_editor_front_end.php?wid=" + widgetId + "&entryId=" + entryId, { width: 890, height: 546 } );
			jQuery("#simple_editor").addClass("modalSimpleEditor");
		}
		
		function gotoContributorWindow(entryId) {
			handleGotoContribWizard("", entryId);
		}
		
		function gotoEditorWindow(entryId) {
			handleGotoEditorWindow("", entryId);
		}
	</script>
	
	';
}

function kaltura_add_admin_css($content) 
{
	$plugin_url = KalturaHelpers::getPluginUrl();
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
	$kaltura_iframe_src = apply_filters('kaltura_iframe_src', "$media_upload_iframe_src&amp;tab=kaltura_upload");
	$kaltura_browse_iframe_src = apply_filters('kaltura_iframe_src', "$media_upload_iframe_src&amp;tab=kaltura_browse");
	$kaltura_title = __('Add Interactive Video');
	$kaltura_button_src = KalturaHelpers::getPluginUrl() . '/images/interactive_video_button.gif';
	$content .= <<<EOF
		<a href="{$kaltura_iframe_src}&amp;TB_iframe=true&amp;height=500&amp;width=640" class="thickbox" title='$kaltura_title'><img src='$kaltura_button_src' alt='$kaltura_title' /></a>
EOF;

	return $content;
}

function kaltura_add_upload_tab($content)
{
	$content["kaltura_upload"] = __("All in One Video");
	return $content;
}

function kaltura_add_upload_tab_interactive_video_only($content)
{
	$content = array();
	$content["kaltura_upload"] = __("Add Interactive Video");
	$content["kaltura_browse"] = __("Browse Interactive Videos");
	return $content;
}

function kaltura_upload_tab()
{
	// only for 2.6 and higher
	if (KalturaHelpers::compareWPVersion("2.6", ">="))
		wp_enqueue_style('media');
	
	wp_iframe('kaltura_upload_tab_content');
}

function kaltura_browse_tab()
{
	// only for 2.6 and higher
	if (KalturaHelpers::compareWPVersion("2.6", ">="))
		wp_enqueue_style('media');
		
	wp_iframe('kaltura_browse_tab_content');
}

function kaltura_upload_tab_content()
{
	unset($GLOBALS['wp_filter']['media_upload_tabs']); // remove all registerd filters for the tabs
	add_filter("media_upload_tabs", "kaltura_add_upload_tab_interactive_video_only"); // register our filter for the tabs
	media_upload_header(); // will add the tabs menu
	
	if (!isset($_GET["kaction"]))
		$_GET["kaction"] = "upload";
	require_once("lib/kaltura_library_controller.php");
}

function kaltura_browse_tab_content()
{
	unset($GLOBALS['wp_filter']['media_upload_tabs']); // remove all registerd filters for the tabs
	add_filter("media_upload_tabs", "kaltura_add_upload_tab_interactive_video_only"); // register our filter for the tabs
	media_upload_header(); // will add the tabs menu
	
	if (!isset($_GET["kaction"]))
		$_GET["kaction"] = "browse";
	require_once("lib/kaltura_library_controller.php");
}

function kaltura_comment_form($post_id) 
{
	$user = wp_get_current_user();
	if (!$user->ID && !KalturaHelpers::anonymousCommentsAllowed())
	{
		echo "You must be <a href=" . get_option('siteurl') . "/wp-login.php?redirect_to=" . urlencode(get_permalink()) . ">logged in</a> to post a <br /> video comment.";
	}
	else
	{
		$plugin_url = KalturaHelpers::getPluginUrl();
		$js_click_code = "Kaltura.openCommentCW('".$plugin_url."'); ";
		echo "<input type=\"button\" id=\"kaltura_video_comment\" name=\"kaltura_video_comment\" tabindex=\"6\" value=\"Add Video Comment\" onclick=\"" . $js_click_code . "\" />";
	}
}

function kaltura_shortcode($attrs) 
{
	// for wordpress 2.5, in wordpress 2.6+ shortcodes are striped in rss feedds
	if (is_feed())
		return "";

	// prevent xss
	foreach($attrs as $key => $value)
	{
		$attrs[$key] = js_escape($value);
	}
	
	// get the embed options from the attributes
	$embedOptions = _kaltura_get_embed_options($attrs);

	$isComment		= (@$attrs["size"] == "comments") ? true : false;
	$wid 			= $embedOptions["wid"];
	$entryId 		= $embedOptions["entryId"];
	$width 			= $embedOptions["width"];
	$height 		= $embedOptions["height"];
	$randId 		= md5($wid . $entryId . rand(0, time()));
	$divId 			= "kaltura_wrapper_" . $randId;
	$thumbnailDivId = "kaltura_thumbnail_" . $randId;
	$playerId 		= "kaltura_player_" . $randId;

	$link = '';
	$link .= '<a href="http://corp.kaltura.com/">open source video</a>, ';
	$link .= '<a href="http://corp.kaltura.com/">online video platform</a>, ';
	$link .= '<a href="http://corp.kaltura.com/video_platform/video_streaming">video streaming</a>, ';
	$link .= '<a href="http://corp.kaltura.com/solutions/video_solutions">video solutions</a>';
	
	$powerdByBox ='<div class="poweredByKaltura" style="width: ' . $embedOptions["width"] . 'px; "><div><a href="http://corp.kaltura.com/video_platform/video_player" target="_blank">Video Player</a> by <a href="http://corp.kaltura.com/" target="_blank">Kaltura</a></div></div>';
	
	if ($isComment)
	{
		$thumbnailPlaceHolderUrl = KalturaHelpers::getCommentPlaceholderThumbnailUrl($wid, $entryId, 240, 180, null);

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
		$style = '';
		$style .= 'width:' . $embedOptions["width"] .'px;';
		$style .= 'height:' . ($embedOptions["height"] + 10) . 'px;'; // + 10 is for the powered by div
		if (@$embedOptions["align"])
			$style .= 'float:' . $embedOptions["align"] . ';';
			
		// append the manual style properties
		if (@$embedOptions["style"])
			$style .= $embedOptions["style"];
			
		$html = '
				<span id="'.$divId.'" style="'.$style.'">'.$link.'</span>
				<script type="text/javascript">
					var kaltura_swf = new SWFObject("' . $embedOptions["swfUrl"] . '", "' . $playerId . '", "' . $embedOptions["width"] . '", "' . $embedOptions["height"] . '", "9", "#000000");
					kaltura_swf.addParam("wmode", "opaque");
					kaltura_swf.addParam("flashVars", "' . $embedOptions["flashVars"] . '");
					kaltura_swf.addParam("allowScriptAccess", "always");
					kaltura_swf.addParam("allowFullScreen", "true");
					kaltura_swf.addParam("allowNetworking", "all");
					kaltura_swf.write("' . $divId . '");
				';
		if (KalturaHelpers::compareWPVersion("2.6", ">=")) {
			$html .= '
					jQuery("#'.$divId.'").append("'.str_replace("\"", "\\\"", $powerdByBox).'"); 
				';
			//                                              ^ escape quotes for javascript ^
		}
		$html .= '</script>'; 
	}
		
	return $html;
}
function kaltura_get_version() 
{
	$plugin_data = implode( '', file( str_replace('all_in_one_video_pack.php', 'interactive_video.php', __FILE__)));
	if ( preg_match( "|Version:(.*)|i", $plugin_data, $version ))
		$version = trim( $version[1] );
	else
		$version = '';
	
	return $version;
}

function _kaltura_get_embed_options($params) 
{
	if (@$params["size"] == "comments") // comments player
	{
		if (get_option('kaltura_comments_player_type'))
			$type = get_option('kaltura_comments_player_type');
		else
			$type = get_option('kaltura_default_player_type'); 
			
		// backward compatibility
		if ($type == "whiteblue")
			$params["uiconfid"] = 530;
		elseif ($type == "dark")
			$params["uiconfid"] = 531;
		elseif ($type == "grey")
			$params["uiconfid"] = 532;
		elseif ($type)
			$params["uiconfid"] = $type;
		else 
		{
			global $KALTURA_DEFAULT_PLAYERS;
			$params["uiconfid"] = $KALTURA_DEFAULT_PLAYERS[0]["id"];
		}
			
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
			$params["width"] = 400;

		// if height is missing, recalculate it
		if (!@$params["height"])
		{
			require_once("lib/kaltura_model.php");
			$params["height"] = KalturaHelpers::calculatePlayerHeight(get_option('kaltura_default_player_type'), $params["width"]);
		}
			
		// check the permissions
		$kdp3LayoutFlashVars = "";
		$externalInterfaceDisabled = null;
		if (KalturaHelpers::userCanEdit(@$params["editpermission"]))
		{
			$layoutId = "full";
			$externalInterfaceDisabled = false;
			$kdp3LayoutFlashVars .= _kdp3_upload_layout_flashvars(true);
			$kdp3LayoutFlashVars .= "&";
			$kdp3LayoutFlashVars .= _kdp3_edit_layout_flashvars(true);
		}
		else if (KalturaHelpers::userCanAdd(@$params["addpermission"]))
		{
			$layoutId = "addOnly";
			$externalInterfaceDisabled = false;
			$kdp3LayoutFlashVars .= _kdp3_upload_layout_flashvars(true);
			$kdp3LayoutFlashVars .= "&";
			$kdp3LayoutFlashVars .= _kdp3_edit_layout_flashvars(false);
		}
		else
		{ 
			$layoutId = "playerOnly";
			$kdp3LayoutFlashVars .= _kdp3_upload_layout_flashvars(false);
			$kdp3LayoutFlashVars .= "&";
			$kdp3LayoutFlashVars .= _kdp3_edit_layout_flashvars(false);
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

	$flashVarsStr = "";
	$flashVarsStr .=  "layoutId=" . $layoutId;
	$flashVarsStr .= ("&" . $kdp3LayoutFlashVars);
	if ($externalInterfaceDisabled === false)
		$flashVarsStr .= "&externalInterfaceDisabled=false";

	
	$wid = $params["wid"];
	$swfUrl = KalturaHelpers::getSwfUrlForWidget($wid);

	if (isset($params["uiconfid"]))
		$swfUrl .= "/uiconf_id/".$params["uiconfid"];
		
	$entryId = null;
	if (isset($params["entryid"]))
	{
		$entryId = $params["entryid"];
		$swfUrl .= "/entry_id/".$entryId;
	}
		
	return array(
		"flashVars" => $flashVarsStr,
		"height" => $params["height"],
		"width" => $params["width"],
		"align" => $align,
		"style" => @$params["style"],
		"wid" => $wid,
		"entryId" => $entryId,
		"swfUrl" => $swfUrl
	);
}

function _kaltura_find_post_widgets($args) 
{
	$wid = isset($args["wid"]) ? $args["wid"] : null;
	$entryId = isset($args["entryid"]) ? $args["entryid"] : null;
	if (!$wid && !$entryId)
		return;
		
	global $kaltura_post_id;
	global $kaltura_widgets_in_post;
	$kaltura_widgets_in_post[] = array($wid, $entryId); // later will use it to delete the widgets that are not in the post 
	
	$widget = array();
	$widget["id"] = $wid;
	$widget["entry_id"] = $entryId;
	$widget["type"] = KALTURA_WIDGET_TYPE_POST;
	$widget["add_permissions"] = $args["addpermission"];
	$widget["edit_permissions"] = $args["editpermission"];
	$widget["post_id"] = $kaltura_post_id;
	$widget["status"] = KALTURA_WIDGET_STATUS_PUBLISHED;
	$widget = KalturaWPModel::insertOrUpdateWidget($widget);
}

function _kaltura_find_comment_widgets($args)
{
	$wid = isset($args["wid"]) ? $args["wid"] : null;
	$entryId = isset($args["entryid"]) ? $args["entryid"] : null;
	if (!$wid && !$entryId)
		return;
		
	if (!$wid)
		$wid = "_" . get_option("kaltura_partner_id");
		
	global $kaltura_comment_id;
	$comment = get_comment($kaltura_comment_id);
	
	// add new widget
	$widget = array();
	$widget["id"] = $wid;
	$widget["entry_id"] = $entryId;
	$widget["type"] = KALTURA_WIDGET_TYPE_COMMENT;
	$widget["post_id"] = $comment->comment_post_ID;
	$widget["comment_id"] = $kaltura_comment_id;
	$widget["status"] = KALTURA_WIDGET_STATUS_PUBLISHED;
	
	$widget = KalturaWPModel::insertOrUpdateWidget($widget);
}

function _kdp3_edit_layout_flashvars($enabled) {
	$enabled = ($enabled) ? 'true' : 'false';
	$params = array(
		"editBtnControllerScreen.includeInLayout" => $enabled,
		"editBtnControllerScreen.visible" => $enabled,
		"editBtnStartScreen.includeInLayout" => $enabled,
		"editBtnStartScreen.visible" => $enabled,
		"editBtnPauseScreen.includeInLayout" => $enabled,
		"editBtnPauseScreen.visible" => $enabled,
		"editBtnPlayScreen.includeInLayout" => $enabled,
		"editBtnPlayScreen.visible" => $enabled,
		"editBtnEndScreen.includeInLayout" => $enabled,
		"editBtnEndScreen.visible" => $enabled,
	);
	return http_build_query($params);
}

function _kdp3_upload_layout_flashvars($enabled) {
	$enabled = ($enabled) ? 'true' : 'false';
	$params = array(
		"uploadBtnControllerScreen.includeInLayout" => $enabled,
		"uploadBtnControllerScreen.visible" => $enabled,
		"uploadBtnStartScreen.includeInLayout" => $enabled,
		"uploadBtnStartScreen.visible" => $enabled,
		"uploadBtnPauseScreen.includeInLayout" => $enabled,
		"uploadBtnPauseScreen.visible" => $enabled,
		"uploadBtnPlayScreen.includeInLayout" => $enabled,
		"uploadBtnPlayScreen.visible" => $enabled,
		"uploadBtnEndScreen.includeInLayout" => $enabled,
		"uploadBtnEndScreen.visible" => $enabled,
	);
	return http_build_query($params);
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