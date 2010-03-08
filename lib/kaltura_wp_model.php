<?php 
class KalturaWPModel
{
	function insertWidget($widget)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		
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
	
	function updateWidget($widget)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;

		$data = array();
		$data["type"] 				= $widget["type"];
		$data["status"] 			= $widget["status"];
		$data["post_id"] 			= $widget["post_id"];
		$data["comment_id"] 		= $widget["comment_id"];
		$data["add_permissions"] 	= $widget["add_permissions"];
		$data["edit_permissions"] 	= $widget["edit_permissions"];
		
		$where = array();
		$where["id"] 		= $widget["id"];
		$where["entry_id"] = $widget["entry_id"];
		
		$wpdb->update($table, $data, $where);
	}
	
	function getWidget($widgetId, $entryId)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		if ($widgetId) {
			$sql = $wpdb->prepare("SELECT * FROM " . $table . " WHERE id = %s", $widgetId);
		} else {
			$sql = $wpdb->prepare("SELECT * FROM " . $table . " WHERE entry_id = %s", $entryId); 
		}
		return $wpdb->get_row($sql, ARRAY_A);
	}
	
	function unpublishWidget()
	{
		
	}
	
	function insertOrUpdateWidget($widget)
	{
		// set the defaults
		if (!@$widget["post_id"])
			$widget["post_id"] = 0;
			
		if (!@$widget["comment_id"])
			$widget["comment_id"] = 0;
		
		if (!array_key_exists("add_permissions", $widget)) // beacuse 0 is counted as false
			$widget["add_permissions"] = -1;
			
		if (!array_key_exists("edit_permissions", $widget)) // beacuse 0 is counted as false
			$widget["edit_permissions"] = -1;
			
		$widgetFromDb = KalturaWPModel::getWidget($widget["id"], $widget["entry_id"]);
		if (!$widgetFromDb) 
		{
			KalturaWPModel::insertWidget($widget);
		}
		else
		{
			KalturaWPModel::updateWidget($widget);
		}
	}
	
	function getWidgetsByPost($post_id)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $table . " WHERE post_id = %d", $post_id), ARRAY_A);
		if (!is_array($result))
			$result = array();
		return $result;
	}
	
	function unpublishWidgets($widgets)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		
		// check if one widget was passed and its not in an array
		if (!is_array($widgets))
		{
			$widgetsTemp = $widgets;
			$widgets = array($widgetsTemp);
		}
		foreach($widgets as $widget)
		{
			$data = array("status" => KALTURA_WIDGET_STATUS_UNPUBLISHED);
			$where = array("id" => $widget["id"], "entry_id" => $widget["entry_id"]);
			$wpdb->update($table, $data, $where);
		}
	}
	
	function deleteUnusedWidgetsByPost($post_id, $used_widgets)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		$wid_ids = array();
		$entry_ids = array();
		
		$current_widgets = KalturaWPModel::getWidgetsByPost($post_id);
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
	
	function deleteWidgetsByComment($comment_id)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		
		$query = $wpdb->prepare("DELETE FROM " . $table . " WHERE comment_id = %d", $comment_id);
		
		$wpdb->query($query);
	}
	
	function getLastPublishedPostWidgets($page, $page_size)
	{
		return KalturaWPModel::getPublishedWidgetsByType(KALTURA_WIDGET_TYPE_POST, $page, $page_size);
	}
	
	function getLastPublishedCommentWidgets($page, $page_size)
	{
		return KalturaWPModel::getPublishedWidgetsByType(KALTURA_WIDGET_TYPE_COMMENT, $page, $page_size);	
	}
	
	function getPublishedWidgetsByType($type, $page, $page_size)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		$offset = ($page - 1) * $page_size;
		$query = $wpdb->prepare(
			"SELECT * 
			FROM ".$table." 
			WHERE 
				status = %d AND
				type = '" . $wpdb->escape($type) . "' 
			ORDER BY created_at DESC 
			LIMIT %d, %d", 
			KALTURA_WIDGET_STATUS_PUBLISHED, 
			$offset, 
			$page_size);

		return $wpdb->get_results($query, ARRAY_A);
	}
	
	function getLastPublishedPostWidgetsCount()
	{
		return KalturaWPModel::getPublishedWidgetsByTypeCount(KALTURA_WIDGET_TYPE_POST);
	}
	
	function getLastPublishedCommentWidgetsCount()
	{
		return KalturaWPModel::getPublishedWidgetsByTypeCount(KALTURA_WIDGET_TYPE_COMMENT);	
	}
	
	function getPublishedWidgetsByTypeCount($type)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		$offset = ($page - 1) * $page_size;
		$query = $wpdb->prepare(
			"SELECT count(*) 
			FROM ".$table." 
			WHERE 
				status = %d AND
				type = '" . $wpdb->escape($type) . "'", 
			KALTURA_WIDGET_STATUS_PUBLISHED);

		return $wpdb->get_var($query);
	}
	
	function isCategoryExists($name)
	{
		$categories = get_categories('get=all');
		foreach($categories as $category)
		{
			if (strtolower($category->name) == strtolower($name))
				return true;
		}
		
		return false;
	}
	
	function getCategoryByName($name)
	{
		$categories = get_categories('get=all');
		foreach($categories as $category)
		{
			if (strtolower($category->name) == strtolower($name))
				return $category;
		}
		return null;
	}
	
	function getPostByTitle($title) {
		$post_arr = sanitize_post(array("post_title" => $title), 'db');
		$post_arr = $post_arr["post_title"];
		global $wpdb;
		$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='post'", $title ));
		if ($post)
			return get_post($post, OBJECT);
		return null;
	}
}
?>