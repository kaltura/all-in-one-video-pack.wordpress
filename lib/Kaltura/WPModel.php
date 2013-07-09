<?php 
class Kaltura_WPModel
{
	const WIDGET_STATUS_UNPUBLISHED = 0;
	const WIDGET_STATUS_PUBLISHED = 1;

	const WIDGET_TYPE_COMMENT = 'comment';
	const WIDGET_TYPE_POST = 'post';

	public static function insertWidget($widget)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		$data = array();
		$data["id"] 				= $widget["id"];
		$data["entry_id"] 			= $widget["entry_id"];
		$data["type"] 				= $widget["type"];
		$data["status"] 			= $widget["status"];
		$data["post_id"] 			= $widget["post_id"];
		$data["comment_id"] 		= $widget["comment_id"];
		$data["add_permissions"] 	= $widget["add_permissions"];
		$data["edit_permissions"] 	= $widget["edit_permissions"];
		$data["created_at"] 		= current_time('mysql');
		$wpdb->insert($table, $data);
	}

	public static function updateWidget($widget)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		$data = array();
		$data["type"] 				= $widget["type"];
		$data["status"] 			= $widget["status"];
		$data["post_id"] 			= $widget["post_id"];
		$data["comment_id"] 		= $widget["comment_id"];
		$data["add_permissions"] 	= $widget["add_permissions"];
		$data["edit_permissions"] 	= $widget["edit_permissions"];

		$where = array();
		$where["id"] 		= $widget["id"];
		$where["entry_id"] 	= $widget["entry_id"];

		$wpdb->update($table, $data, $where);
	}

	public static function getWidget($widgetId, $entryId)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;
		$sql = $wpdb->prepare("SELECT * FROM " . $table . " WHERE id = %s AND entry_id = %s", $widgetId, $entryId);
		return $wpdb->get_row($sql, ARRAY_A);
	}

	public static function unpublishWidget()
	{

	}

	public static function insertOrUpdateWidget($widget)
	{
		// set the defaults
		if (!isset($widget["post_id"]))
			$widget["post_id"] = 0;

		if (!isset($widget["comment_id"]))
			$widget["comment_id"] = 0;

		$widgetFromDb = Kaltura_WPModel::getWidget($widget["id"], $widget["entry_id"]);
		if (!$widgetFromDb)
		{
			Kaltura_WPModel::insertWidget($widget);
		}
		else
		{
			Kaltura_WPModel::updateWidget($widget);
		}
	}

	public static function getWidgetsByPost($post_id)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;
		$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $table . " WHERE post_id = %d", $post_id), ARRAY_A);
		if (!is_array($result))
			$result = array();
		return $result;
	}

	public static function unpublishWidgets($widgets)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		// check if one widget was passed and its not in an array
		if (!is_array($widgets))
		{
			$widgetsTemp = $widgets;
			$widgets = array($widgetsTemp);
		}
		foreach($widgets as $widget)
		{
			$data = array("status" => Kaltura_WPModel::WIDGET_STATUS_UNPUBLISHED);
			$where = array("id" => $widget["id"], "entry_id" => $widget["entry_id"]);
			$wpdb->update($table, $data, $where);
		}
	}

	public static function deleteUnusedWidgetsByPost($post_id, $used_widgets)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;
		$wid_ids = array();
		$entry_ids = array();

		$current_widgets = Kaltura_WPModel::getWidgetsByPost($post_id);
		foreach($current_widgets as $temp_widget)
		{
			$should_delete = true;
			foreach($used_widgets as $wid_entry_id)
			{
				$wid = $wid_entry_id[0];
				$entry_id = $wid_entry_id[1];

				if ($temp_widget["id"] == $wid && $temp_widget["entry_id"] == $entry_id)
					$should_delete = false;
			}

			if ($should_delete)
			{
				$query = $wpdb->prepare("DELETE FROM " . $table . " WHERE post_id = %d AND id = %s and entry_id = %s", $post_id, $temp_widget["id"], $temp_widget["entry_id"]);
				$wpdb->query($query);
			}
		}
	}

	public static function deleteWidgetsByComment($comment_id)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		$query = $wpdb->prepare("DELETE FROM " . $table . " WHERE comment_id = %d", $comment_id);

		$wpdb->query($query);
	}

	public static function getLastPublishedPostWidgets($page, $page_size)
	{
		return Kaltura_WPModel::getPublishedWidgetsByType(Kaltura_WPModel::WIDGET_TYPE_POST, $page, $page_size);
	}

	public static function getLastPublishedCommentWidgets($page, $page_size)
	{
		return Kaltura_WPModel::getPublishedWidgetsByType(Kaltura_WPModel::WIDGET_TYPE_COMMENT, $page, $page_size);
	}

	public static function getPublishedWidgetsByType($type, $page, $page_size)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;
		$offset = ($page - 1) * $page_size;
		$query = $wpdb->prepare(
			"SELECT *
			FROM ".$table."
			WHERE
				status = %d AND
				type = '" . $wpdb->escape($type) . "'
			ORDER BY created_at DESC
			LIMIT %d, %d",
			Kaltura_WPModel::WIDGET_STATUS_PUBLISHED,
			$offset,
			$page_size);

		return $wpdb->get_results($query, ARRAY_A);
	}

	public static function getLastPublishedPostWidgetsCount()
	{
		return Kaltura_WPModel::getPublishedWidgetsByTypeCount(Kaltura_WPModel::WIDGET_TYPE_POST);
	}

	public static function getLastPublishedCommentWidgetsCount()
	{
		return Kaltura_WPModel::getPublishedWidgetsByTypeCount(Kaltura_WPModel::WIDGET_TYPE_COMMENT);
	}

	public static function getPublishedWidgetsByTypeCount($type)
	{
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;
		$query = $wpdb->prepare(
			"SELECT count(*)
			FROM ".$table."
			WHERE
				status = %d AND
				type = '" . $wpdb->escape($type) . "'",
			Kaltura_WPModel::WIDGET_STATUS_PUBLISHED);

		return $wpdb->get_var($query);
	}

	public static function isCategoryExists($name)
	{
		return term_exists($name, 'category');
	}

	public static function getCategoryByName($name)
	{
		return get_term($name, 'category');
	}

	public static function getPostByTitle($title)
	{
		$post_arr = sanitize_post(array("post_title" => $title), 'db');
		$post_arr = $post_arr["post_title"];
		global $wpdb;
		$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='post'", $title ));
		if ($post)
			return get_post($post, OBJECT);
		return null;
	}
}