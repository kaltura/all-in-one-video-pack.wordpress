<?php 
class KalturaWPModel
{
	function insertWidget($widget)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		
		$data = array();
		$data["id"] = $widget["id"];
		$data["type"] = $widget["type"];
		$data["status"] = $widget["status"];
		$data["post_id"] = $widget["post_id"];
		$data["comment_id"] = $widget["comment_id"];
		$data["add_permissions"] = $widget["add_permissions"];
		$data["edit_permissions"] = $widget["edit_permissions"];
		$data["created_at"] = current_time('mysql');
		$wpdb->insert($table, $data);
	}
	
	function updateWidget($widget)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;

		$data = array();
		$data["type"] = $widget["type"];
		$data["status"] = $widget["status"];
		$data["post_id"] = $widget["post_id"];
		$data["comment_id"] = $widget["comment_id"];
		$data["add_permissions"] = $widget["add_permissions"];
		$data["edit_permissions"] = $widget["edit_permissions"];
		
		$where = array();
		$where["id"] = $widget["id"];
		
		$wpdb->update($table, $data, $where);
	}
	
	function getWidget($widgetId)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		return $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $table . " WHERE id = %s", $widgetId), ARRAY_A);
	}
	
	function unpublishWidget()
	{
		
	}
	
	function insertOrUpdateWidget($widget)
	{
		// set the defaults
		if (!@$widget["post_id"])
			$widget["post_id"] = -1;
			
		if (!@$widget["comment_id"])
			$widget["comment_id"] = -1;
		
		if (!array_key_exists("add_permissions", $widget)) // beacuse 0 is counted as false
			$widget["add_permissions"] = -1;
			
		if (!array_key_exists("edit_permissions", $widget)) // beacuse 0 is counted as false
			$widget["edit_permissions"] = -1;
			
		$widgetFromDb = KalturaWPModel::getWidget($widget["id"]);
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
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $table . " WHERE post_id = %d", $post_id), ARRAY_A);
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
			$where = array("id" => $widget["id"]);
			$wpdb->update($table, $data, $where);
		}
	}
	
	function deleteUnusedWidgetsByPost($post_id, $used_widgets)
	{
		global $wpdb;
		$table = $wpdb->prefix . KALTURA_WIDGET_TABLE;
		$wid_ids = array();
		foreach($used_widgets as $wid)
		{
			$wid_ids[] = "'" . $wpdb->escape($wid) . "'";
		}
		
		$query = $wpdb->prepare("DELETE FROM " . $table . " WHERE post_id = %d", $post_id);
		if (count($wid_ids) > 0) 
			$query .= " AND id NOT IN (".implode(", ", $wid_ids).")";

		$wpdb->query($query);
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
}
?>