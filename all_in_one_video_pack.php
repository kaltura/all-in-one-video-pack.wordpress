<?php
define('KALTURA_ROOT', dirname(__FILE__));

require_once(KALTURA_ROOT.'/settings.php');
require_once(KALTURA_ROOT.'/lib/kaltura_client.php');
require_once(KALTURA_ROOT.'/lib/kaltura_helpers.php');
require_once(KALTURA_ROOT.'/lib/kaltura_model.php');
 

// a workaround when using symbolic links and __FILE__ holds the resolved path
$all_in_one_video_pack_file = KALTURA_PLUGIN_FILE;
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
	$wid 			= $embedOptions["wid"] ? $embedOptions["wid"]: "_" . KalturaHelpers::getOption("kaltura_partner_id");
	$entryId 		= $embedOptions["entryId"];
	$width 			= $embedOptions["width"];
	$height 		= $embedOptions["height"];
	$randId 		= md5($wid . $entryId . rand(0, time()));
	$divId 			= "kaltura_wrapper_" . $randId;
	$thumbnailDivId = "kaltura_thumbnail_" . $randId;
	$playerId 		= "kaltura_player_" . $randId;

	$link = '';
	$link .= '<a href="http://corp.kaltura.com/Products/Features/Video-Management">Video Management</a>, ';
	$link .= '<a href="http://corp.kaltura.com/Products/Features/Video-Hosting">Video Hosting</a>, ';
	$link .= '<a href="http://corp.kaltura.com/Products/Features/Video-Streaming">Video Streaming</a>, ';
	$link .= '<a href="http://corp.kaltura.com/products/video-platform-features">Video Platform</a>';
	$html ='<script src="http://www.kaltura.com/p/'.KalturaHelpers::getOption("kaltura_partner_id").'/sp/'.KalturaHelpers::getOption("kaltura_partner_id").'00/embedIframeJs/uiconf_id/'.$embedOptions['uiconfid'].'/partner_id/'.KalturaHelpers::getOption("kaltura_partner_id").'"></script>';
	$powerdByBox ='<div class="poweredByKaltura" style="width: ' . $embedOptions["width"] . 'px; "><div><a href="http://corp.kaltura.com/Products/Features/Video-Player" target="_blank">Video Player</a> by <a href="http://corp.kaltura.com/" target="_blank">Kaltura</a></div></div>';
	
	if ($isComment)
	{
		$embedOptions["flashVars"] .= '"autoPlay":"true",';
		$html.='
			<div id="' . $thumbnailDivId . '" style="width:'.$width.'px;height:'.$height.'px;">'.$link.'</div>
			<script>
				kWidget.thumbEmbed({
					"targetId": "'.$thumbnailDivId.'",
					"wid": "'.$wid.'",
					"uiconf_id": "'.$embedOptions['uiconfid'].'",
					"flashvars": {'.$embedOptions["flashVars"].'},
					"entry_id": "'.$entryId.'"
				});
			</script>
		';
	}
	else
	{
		$style = '';
		$style .= 'width:' . $width .'px;';
		$style .= 'height:' . ($height + 10) . 'px;'; // + 10 is for the powered by div
		if (@$embedOptions["align"])
			$style .= 'float:' . $embedOptions["align"] . ';';
			
		// append the manual style properties
		if (@$embedOptions["style"])
			$style .= $embedOptions["style"];
			
		$html.='
			<div id="' . $playerId . '" style="'.$style.'">'.$link.'</div>
			<script>
				kWidget.embed({
					"targetId": "'.$playerId.'",
					"wid": "'.$wid.'",
					"uiconf_id": "'.$embedOptions['uiconfid'].'",
					"flashvars": {'.$embedOptions["flashVars"].'},
					"entry_id": "'.$entryId.'"
				});';
		if (KalturaHelpers::compareWPVersion("2.6", ">=")) {
			$html .= 'jQuery("#'.$playerId.'").append("'.str_replace("\"", "\\\"", $powerdByBox).'");';
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
	global $KALTURA_DEFAULT_PLAYERS;
	if (@$params["size"] == "comments") // comments player
	{
		if (get_option('kaltura_comments_player_type',$KALTURA_DEFAULT_PLAYERS[0]['id']))
			$type = get_option('kaltura_comments_player_type',$KALTURA_DEFAULT_PLAYERS[0]['id']);
		else
			$type = get_option('kaltura_default_player_type',$KALTURA_DEFAULT_PLAYERS[0]['id']); 
			
		// backward compatibility
		if ($type == "whiteblue")
			$params["uiconfid"] = 11958352;
		elseif ($type == "dark")
			$params["uiconfid"] = 11958342;
		elseif ($type == "grey")
			$params["uiconfid"] = 11958362;
		elseif ($type)
			$params["uiconfid"] = $type;
		else 
		{
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
			$params["height"] = KalturaHelpers::calculatePlayerHeight(get_option('kaltura_default_player_type',$KALTURA_DEFAULT_PLAYERS[0]['id']), $params["width"]);
		}
			
		// check the permissions
		$externalInterfaceDisabled = null;
		
		$layoutId = "playerOnly";
			
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
	$flashVarsStr .=  '"layoutId":"'.$layoutId.'",';
	if ($externalInterfaceDisabled === false)
		$flashVarsStr .= '"externalInterfaceDisabled":"false",';

	
	$wid = $params["wid"];
		
	$entryId = null;
	if (isset($params["entryid"]))
	{
		$entryId = $params["entryid"];
	}
		
	return array(
		"flashVars" => $flashVarsStr,
		"height" => $params["height"],
		"width" => $params["width"],
		"align" => $align,
		"style" => @$params["style"],
		"wid" => $wid,
		"entryId" => $entryId,
		"uiconfid"=> $params["uiconfid"],
	);
}


if ( !KalturaHelpers::getOption('kaltura_partner_id') && !isset($_POST['submit']) && !strpos($_SERVER["REQUEST_URI"], "page=interactive_video")) {
	function kaltura_warning() {
		echo "
		<div class='updated fade'><p><strong>".__('To complete the All in One Video Pack installation, <a href="'.get_settings('siteurl').'/wp-admin/options-general.php?page=interactive_video">you must get a Partner ID.</a>')."</strong></p></div>
		";
	}
	add_action('admin_notices', 'kaltura_warning');
}

add_action('save_post', 'kaltura_save_post_entries_permalink');
	
//save the post permalink in the entries metadata ipon save_post event.
function kaltura_save_post_entries_permalink($post_ID)
{
	$kmodel = KalturaModel::getInstance();
	if(!KalturaHelpers::getOption("kaltura_save_permalink"))
		return;
		
	$metadataProfileId = KalturaHelpers::getOption("kaltura_permalink_metadata_profile_id");
	$metadataFieldsResponse = $kmodel->getMetadataProfileFields($metadataProfileId);
	//the metadata profile should have only one field.
	if ($metadataFieldsResponse->totalCount != 1)
		return;
		
	$metadataField = $metadataFieldsResponse->objects[0];
	$permalink = get_permalink($post_ID);
	$content = $_POST['content'];
	$matches = null;
	preg_match_all('/entryid=\\\\"([^\\\\]*)/', $content ,$matches);
	if ($matches && is_array($matches) && isset($matches[1]) && is_array($matches[1]) && count($matches[1])){
		foreach ($matches[1] as $entryId){
			_update_entry_permalink($entryId,$permalink,$metadataProfileId,$metadataField->key);
		}
	}
}

function _update_entry_permalink($entryId, $permalink, $metadataProfileId, $metadataFieldName){
	$kmodel = KalturaModel::getInstance();
	$result = $kmodel->getEntryMetadata($entryId, $metadataProfileId);
	$xmlData = '<metadata><'.$metadataFieldName.'>'.$permalink.'</'.$metadataFieldName.'></metadata>';
	if($result->totalCount == 0){
		$kmodel->addEntryMetadata($metadataProfileId, $entryId, $xmlData);
	}
	else{
		/* @var $metadata KalturaMetadata */
		$metadata = $result->objects[0];
		$kmodel->updateEntryMetadata($metadata->id, $xmlData);
	}
}


if (defined('MULTISITE') && defined('WP_ALLOW_MULTISITE') && WP_ALLOW_MULTISITE)
{
	add_action('network_admin_menu', 'add_network_admin_menu');

	function add_network_admin_menu()
	{
		add_submenu_page('settings.php', 'All in One Video', 'All in One Video', 'manage_network_options', 'all-in-one-video-pack-mu-settings',  'kaltura_show_network_settings');
	}

	function kaltura_show_network_settings()
	{
		require_once("lib/kaltura_model.php");
		require_once('admin-mu/kaltura_admin_mu_controller.php');
	}
	

}