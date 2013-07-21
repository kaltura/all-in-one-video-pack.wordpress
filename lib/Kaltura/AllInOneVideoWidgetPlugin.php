<?php

class Kaltura_AllInOneVideoWidgetPlugin
{
	public function __construct()
	{
		add_action('publish_post', $this->callback('publishPost'), 10, 2);
		add_action('publish_page', $this->callback('publishPost'), 10, 2);
		add_action('transition_post_status', $this->callback('postStatusChange'), 10, 3);
		add_action('deleted_post', $this->callback('deletePost'), 10, 1);
		add_action('wp_set_comment_status', $this->callback('setCommentStatus'), 10, 2);
		add_action('comment_post', $this->callback('commentPost'), 10, 2);
		add_action('widgets_init', $this->callback('registerWidget'));
		add_action('wp_ajax_kaltura_widget_ajax', $this->callback('executeSidebarWidgetController'));
		add_action('wp_ajax_nopriv_kaltura_widget_ajax', $this->callback('executeSidebarWidgetController'));
		add_action('wp_enqueue_scripts', $this->callback('enqueueScripts'));
	}

	public function registerWidget()
	{
		$description = "The most recent posted videos and comments in your blog";
		$options     = array("classname" => "widget_text", "description" => $description);
		$id          = "all-in-one-video-pack-widget";
		$name        = "Recent Videos Widget";
		wp_register_sidebar_widget($id, $name, $this->callback('displayWidget'), $options);
	}

	public function enqueueScripts()
	{
		wp_enqueue_script('kaltura', KalturaHelpers::jsUrl('js/kaltura.js'));
		wp_localize_script('kaltura', 'KalturaSidebarWidget', array('ajaxurl' => admin_url('admin-ajax.php' )));
	}

	public function displayWidget($args)
	{
		extract($args);

		echo $before_widget;
		echo $before_title;
		echo 'Recent Videos';
		echo $after_title;
		echo '<div id="kaltura-sidebar-menu">' . "\n";
		echo '<a id="kaltura-posts-button" onclick="Kaltura.switchSidebarTab(this, \'videoposts\', 1);">' . __("Posted Videos") . '</a> | ' . "\n";
		echo '<a id="kaltura-comments-button" onclick="Kaltura.switchSidebarTab(this, \'videocomments\', 1);">' . __("Video Comments") . '</a>' . "\n";
		echo '</div>' . "\n";

		echo '<div id="kaltura-loader"><img src="' . KalturaHelpers::getPluginUrl() . '/images/loader.gif" alt="Loading..." /></div>' . "\n";
		echo '<div id="kaltura-sidebar-container"></div>' . "\n";
		echo '<script type="text/javascript">' . "\n";
		echo 'jQuery("#kaltura-posts-button").click()' . "\n";
		echo '</script>' . "\n";

		echo $after_widget;
	}

	/*
	 * Occurs when publishing the post, and on every save while the post is published
	 *
	 * @param $postId
	 * @param $post
	 */
	public function publishPost($post_id, $post)
	{
		$content = $post->post_content;

		$shortcode_tags = array();

		global $kaltura_post_id, $kaltura_widgets_in_post;
		$kaltura_post_id         = $post_id;
		$kaltura_widgets_in_post = array();
		KalturaHelpers::runKalturaShortcode($content, $this->callback('findPostWidgets'));

		// delete all widgets that doesn't exists in the post anymore
		Kaltura_WPModel::deleteUnusedWidgetsByPost($kaltura_post_id, $kaltura_widgets_in_post);
	}

	/*
	 * Occurs on evey status change, we need to mark our widgets as unpublished when status of the post is not publish
	 *
	 * @param $oldStatus
	 * @param $newStatus
	 * @param $post
	 */
	public function postStatusChange($new_status, $old_status, $post)
	{
		// get all widgets linked to this post and mark them as not published
		$statuses = array("inherit", "publish");
		// we don't handle "inherit" status because it not the real post, but the revision
		// we don't handle "publish" status because it's handled in: "kaltura_publish_post"
		if (!in_array($new_status, $statuses))
		{
			$widgets = Kaltura_WPModel::getWidgetsByPost($post->ID);
			Kaltura_WPModel::unpublishWidgets($widgets);
		}
	}

	/*
	 * Occurs on post delete, and deleted all widgets for that post
	 * @param $post_id
	 */
	public function deletePost($post_id)
	{
		Kaltura_WPModel::deleteUnusedWidgetsByPost($post_id, array());
	}


	/*
	 * Occurs when comment status is changed
	 * @param $comment_id
	 * @param $status
	 */
	public function setCommentStatus($comment_id, $status)
	{
		switch ($status)
		{
			case "approve":
				$this->commentPost($comment_id, 1);
				break;
			default:
				Kaltura_WPModel::deleteWidgetsByComment($comment_id);
		}
	}

	/*
	 * Occurs when posting a comment
	 * @param $comment_id
	 * @param $approved
	 */
	public function commentPost($comment_id, $approved)
	{
		if ($approved)
		{
			global $kaltura_comment_id;
			$kaltura_comment_id = $comment_id;

			$comment = get_comment($comment_id);
			KalturaHelpers::runKalturaShortcode($comment->comment_content, $this->callback('findCommentWidgets'));
		}
	}

	public function findPostWidgets($args)
	{
		$wid = isset($args["wid"]) ? $args["wid"] : null;
		$entryId = isset($args["entryid"]) ? $args["entryid"] : null;
		if (!$wid && !$entryId)
			return;

		global $kaltura_post_id;
		global $kaltura_widgets_in_post;
		$kaltura_widgets_in_post[] = array($wid, $entryId); // later we will use it to delete the widgets that are not in the post

		$widget = array();
		$widget["id"] = $wid;
		$widget["entry_id"] = $entryId;
		$widget["type"] = Kaltura_WPModel::WIDGET_TYPE_POST;
		$widget["add_permissions"] = $args["addpermission"];
		$widget["edit_permissions"] = $args["editpermission"];
		$widget["post_id"] = $kaltura_post_id;
		$widget["status"] = Kaltura_WPModel::WIDGET_STATUS_PUBLISHED;
		Kaltura_WPModel::insertOrUpdateWidget($widget);
	}

	public function findCommentWidgets($args)
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
		$widget["type"] = Kaltura_WPModel::WIDGET_TYPE_COMMENT;
		$widget["post_id"] = $comment->comment_post_ID;
		$widget["comment_id"] = $kaltura_comment_id;
		$widget["status"] = Kaltura_WPModel::WIDGET_STATUS_PUBLISHED;

		Kaltura_WPModel::insertOrUpdateWidget($widget);
	}

	function executeSidebarWidgetController()
	{
		$controller = new Kaltura_SidebarWidgetController();
		$controller->execute();
	}

	private function callback($functionName)
	{
		return array($this, $functionName);
	}
}