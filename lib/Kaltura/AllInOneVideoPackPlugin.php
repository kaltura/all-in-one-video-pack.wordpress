<?php

class Kaltura_AllInOneVideoPackPlugin
{
	public function __construct()
	{

	}

	public function init()
	{
		if (defined('MULTISITE') && defined('WP_ALLOW_MULTISITE') && WP_ALLOW_MULTISITE && apply_filters('kaltura_use_network_settings', true))
			add_action('network_admin_menu', $this->callback('networkAdminMenuAction'));

		if (!KalturaHelpers::getOption('kaltura_partner_id') &&
			!isset($_POST['submit']) &&
			!strpos($_SERVER['REQUEST_URI'], 'page=kaltura_options'))
		{
			add_action('admin_notices', $this->callback('adminWarning'));
			return;
		}

		// filters
		add_filter('comment_text', $this->callback('commentTextFilter'));
		add_filter('media_buttons_context', $this->callback('mediaButtonsContextFilter'));
		add_filter('media_upload_tabs', $this->callback('mediaUploadTabsFilter'));
		add_filter('mce_external_plugins', $this->callback('mceExternalPluginsFilter'));
		add_filter('tiny_mce_version', $this->callback('tinyMceVersionFilter'));

		// actions
		add_action('admin_menu', $this->callback('adminMenuAction'));
		add_action('wp_print_scripts', $this->callback('printScripts'));
		add_action('wp_enqueue_scripts', $this->callback('enqueueScripts'));
		add_action('wp_enqueue_styles', $this->callback('enqueueStyles'));
		add_action('admin_enqueue_scripts', $this->callback('adminEnqueueScripts'));

		// media upload actions
		add_action('media_upload_kaltura_upload', $this->callback('mediaUploadAction'));
		add_action('media_upload_kaltura_browse', $this->callback('mediaBrowseAction'));
		add_action('admin_print_scripts-media-upload-popup', $this->callback('mediaUploadPrintScriptsAction'));

		add_action('save_post', $this->callback('savePost'));
		add_action('wp_ajax_kaltura_ajax', $this->callback('executeLibraryController'));

		if (KalturaHelpers::videoCommentsEnabled())
			add_action('comment_form', $this->callback('commentFormAction'));

		add_shortcode('kaltura-widget', $this->callback('shortcodeHandler'));

		add_filter('parse_request', $this->callback('parseRequest'));
	}

	private function callback($functionName)
	{
		return array($this, $functionName);
	}

	public function adminWarning()
	{
		echo "
		<div class='updated fade'><p><strong>".__('To complete the All in One Video Pack installation, <a href="'.get_option('siteurl').'/wp-admin/options-general.php?page=kaltura_options">you must get a Partner ID.</a>')."</strong></p></div>
		";
	}

	public function mceExternalPluginsFilter($content)
	{
		$pluginUrl = KalturaHelpers::getPluginUrl();
		$content['kaltura'] = $pluginUrl . '/tinymce/kaltura_tinymce.js?v'.KalturaHelpers::getPluginVersion();
		return $content;
	}

	public function tinyMceVersionFilter($content)
	{
		return $content . '_k'.KalturaHelpers::getPluginVersion();
	}

	public function adminMenuAction()
	{
		add_options_page('All in One Video', 'All in One Video', 'manage_options', 'kaltura_options', $this->callback('executeAdminController'));
		add_media_page('All in One Video', 'All in One Video', 'edit_posts', 'kaltura_library', $this->callback('executeLibraryController'));
	}

	public function printScripts()
	{
		KalturaHelpers::addWPVersionJS();
	}

	public function enqueueStyles()
	{
	}

	public function enqueueScripts()
	{
		wp_enqueue_style('kaltura', KalturaHelpers::cssUrl('css/kaltura.css'));
		wp_enqueue_script('kaltura', KalturaHelpers::jsUrl('js/kaltura.js'));
		wp_enqueue_script('jquery');
	}

	public function adminEnqueueScripts()
	{
		wp_register_script('kaltura', KalturaHelpers::jsUrl('js/kaltura.js'));
		wp_register_script('kaltura-admin', KalturaHelpers::jsUrl('js/kaltura-admin.js'));
		wp_register_script('kaltura-player-selector', KalturaHelpers::jsUrl('js/kaltura-player-selector.js'));
		wp_register_script('kaltura-entry-status-checker', KalturaHelpers::jsUrl('js/kaltura-entry-status-checker.js'));
		wp_register_script('kaltura-editable-name', KalturaHelpers::jsUrl('js/kaltura-editable-name.js'));
		wp_register_script('kaltura-jquery-validate', KalturaHelpers::jsUrl('js/jquery.validate.min.js'));
		wp_register_style('kaltura-admin', KalturaHelpers::cssUrl('css/admin.css'));

		wp_enqueue_script('kaltura');
		wp_enqueue_style('kaltura');
		wp_enqueue_style('kaltura-admin');
	}

	function executeLibraryController()
	{
		if (!isset($_GET['kaction']))
			$_GET['kaction'] = 'library';
		$controller = new Kaltura_LibraryController();
		$controller->execute();
	}

	function executeAdminController()
	{
		$controller = new Kaltura_AdminController();
		$controller->execute();
	}

	public function commentTextFilter($content)
	{
		global $shortcode_tags;

		// we want to run our shortcode and not all
		$shortcode_tags_backup = $shortcode_tags;
		$shortcode_tags = array();

		add_shortcode('kaltura-widget', array($this, 'shortcodeHandler'));
		$content = do_shortcode($content);

		// restore the original array
		$shortcode_tags = $shortcode_tags_backup;

		return $content;
	}

	public function mediaButtonsContextFilter($content)
	{
		global $post_ID, $temp_ID;
		$uploading_iframe_ID = (int) (0 == $post_ID ? $temp_ID : $post_ID);
		$media_upload_iframe_src = "media-upload.php?post_id=$uploading_iframe_ID";
		$kaltura_iframe_src = apply_filters('kaltura_iframe_src', "$media_upload_iframe_src&amp;tab=kaltura_upload");
		$kaltura_browse_iframe_src = apply_filters('kaltura_iframe_src', "$media_upload_iframe_src&amp;tab=kaltura_browse");
		$kaltura_title = __('Add Kaltura Media');
		$kaltura_button_src = KalturaHelpers::getPluginUrl() . '/images/kaltura_button.png';
		$content .= <<<EOF
		<a href="{$kaltura_iframe_src}&amp;TB_iframe=true&amp;height=500&amp;width=640" class="thickbox" title='$kaltura_title'><img src='$kaltura_button_src' alt='$kaltura_title' /></a>
EOF;

		return $content;
	}

	public function mediaUploadTabsFilter($content)
	{
		$content['kaltura_upload'] = __('Add Media');
		$content['kaltura_browse'] = __('Browse Existing Media');
		return $content;
	}

	public function mediaUploadTabsFilterOnlyKaltura($content)
	{
		$content = array();
		return $this->mediaUploadTabsFilter($content);
	}

	public function mediaUploadAction()
	{
		$this->setKalturaOnlyMediaTabs();

		if (!isset($_GET['kaction']))
			$_GET['kaction'] = 'upload';

		$controller = new Kaltura_LibraryController();

		wp_iframe(array($controller, 'execute'));
	}

	public function mediaBrowseAction()
	{
		$this->setKalturaOnlyMediaTabs();

		if (!isset($_GET['kaction']))
			$_GET['kaction'] = 'browse';

		$controller = new Kaltura_LibraryController();

		wp_iframe(array($controller, 'execute'));
	}

	public function mediaUploadPrintScriptsAction()
	{
		wp_enqueue_script('kaltura_upload_popup', KalturaHelpers::jsUrl('js/upload-popup.js'));
	}

	public function commentFormAction($post_id)
	{
		if (wp_is_mobile())
			return;

		$user = wp_get_current_user();
		if (!$user->ID && !KalturaHelpers::anonymousCommentsAllowed())
		{
			echo "You must be <a href=" . get_option('siteurl') . "/wp-login.php?redirect_to=" . urlencode(get_permalink()) . ">logged in</a> to post a <br /> video comment.";
		}
		else
		{
			$js_click_code = "Kaltura.openCommentCW('".site_url().'?kaltura_iframe_handler'."'); ";
			echo "<input type=\"button\" id=\"kaltura_video_comment\" name=\"kaltura_video_comment\" tabindex=\"6\" value=\"Add Video Comment\" onclick=\"" . $js_click_code . "\" />";
		}
	}

	public function shortcodeHandler($attrs)
	{
		// prevent xss
		foreach($attrs as $key => $value)
		{
			$attrs[$key] = esc_js($value);
		}

		if (!isset($attrs['entryid']))
			return '';

		// get the embed options from the attributes
		$embedOptions = KalturaHelpers::getEmbedOptions($attrs);

		$isComment		= isset($attrs['size']) && ($attrs['size'] == 'comments') ? true : false;
		$wid 			= $embedOptions['wid'] ? $embedOptions['wid']: '_' . KalturaHelpers::getOption('kaltura_partner_id');
		$entryId 		= $embedOptions['entryId'];
		$width 			= $embedOptions['width'];
		$height 		= $embedOptions['height'];
		$randId 		= md5($wid . $entryId . rand(0, time()));
		$divId 			= 'kaltura_wrapper_' . $randId;
		$thumbnailDivId = 'kaltura_thumbnail_' . $randId;
		$playerId 		= 'kaltura_player_' . $randId;

		$link = '';
		$link .= '<a href="http://corp.kaltura.com/Products/Features/Video-Management">Video Management</a>, ';
		$link .= '<a href="http://corp.kaltura.com/Products/Features/Video-Hosting">Video Hosting</a>, ';
		$link .= '<a href="http://corp.kaltura.com/Products/Features/Video-Streaming">Video Streaming</a>, ';
		$link .= '<a href="http://corp.kaltura.com/products/video-platform-features">Video Platform</a>';
		$html ='<script src="'.KalturaHelpers::getServerUrl().'/p/'.KalturaHelpers::getOption("kaltura_partner_id").'/sp/'.KalturaHelpers::getOption("kaltura_partner_id").'00/embedIframeJs/uiconf_id/'.$embedOptions['uiconfid'].'/partner_id/'.KalturaHelpers::getOption("kaltura_partner_id").'"></script>';
		$poweredByBox ='<div class="kaltura-powered-by" style="width: ' . $embedOptions["width"] . 'px; "><div><a href="http://corp.kaltura.com/Products/Features/Video-Player" target="_blank">Video Player</a> by <a href="http://corp.kaltura.com/" target="_blank">Kaltura</a></div></div>';

		if ($isComment)
		{
			$embedOptions['flashVars'] .= '"autoPlay":"true",';
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
			if (isset($embedOptions['align']))
				$style .= 'float:' . $embedOptions['align'] . ';';

			// append the manual style properties
			if (isset($embedOptions['style']))
				$style .= $embedOptions['style'];

			$html.='
			<div id="'.$playerId.'_wrapper" class="kaltura-player-wrapper"><div id="' . $playerId . '" style="'.$style.'">'.$link.'</div>'.$poweredByBox.'</div>
			<script>
				kWidget.embed({
					"targetId": "'.$playerId.'",
					"wid": "'.$wid.'",
					"uiconf_id": "'.$embedOptions['uiconfid'].'",
					"flashvars": {'.$embedOptions['flashVars'].'},
					"entry_id": "'.$entryId.'"
				});';
			//$html .= 'alert(document.getElementById("'.$playerId.'_wrapper").innerHTML);jQuery("#'.$playerId.'_wrapper").append("'.str_replace("\"", "\\\"", $powerdByBox).'");';
			$html .= '</script>';
		}
		return $html;
	}

	public function savePost($postId)
	{
		if (!KalturaHelpers::getOption('kaltura_save_permalink'))
			return;

		// ignore revisions
		if (wp_is_post_revision($postId)) {
			return;
		}

		try
		{
			$kmodel = KalturaModel::getInstance();
			$kmodel->updateEntryPermalink($postId);
		}
		catch(Exception $ex)
		{
			error_log('An error occurred while updating entry\'s permalink - ' . $ex->getMessage() . ' - ' . $ex->getTraceAsString());
		}
	}

	public function networkAdminMenuAction()
	{
		add_submenu_page('settings.php', 'All in One Video', 'All in One Video', 'manage_network_options', 'all-in-one-video-pack-mu-settings',  $this->callback('networkSettings'));
	}

	public function networkSettings()
	{
		$controller = new Kaltura_NetworkAdminController();
		$controller->execute();
	}

	public function parseRequest($args)
	{
		if (isset($_GET['kaltura_iframe_handler']))
		{
			nocache_headers();
			$controller = new Kaltura_FrontEndController();
			$controller->execute();
			die;
		}
		elseif (isset($_GET['kaltura_admin_iframe_handler']))
		{
			auth_redirect();
			nocache_headers();
			global $show_admin_bar;
			$show_admin_bar = false;

			$controller = new Kaltura_LibraryController();
			// we want to execute our controller before wordpress starts outputting the html
			ob_start();
			$controller->execute();
			$this->controllerOutput = ob_get_clean();
			wp_iframe(create_function('', 'global $kalturaPlugin; echo $kalturaPlugin->controllerOutput;'));
			die;
		}
	}

	private function setKalturaOnlyMediaTabs()
	{
		unset($GLOBALS['wp_filter']['media_upload_tabs']); // remove all registerd filters for the tabs
		add_filter('media_upload_tabs', $this->callback('mediaUploadTabsFilterOnlyKaltura')); // register our filter for the tabs
		media_upload_header(); // will add the tabs menu
	}
}