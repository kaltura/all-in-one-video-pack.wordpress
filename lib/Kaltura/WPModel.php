<?php

class Kaltura_WPModel {
	const WIDGET_STATUS_UNPUBLISHED = 0;
	const WIDGET_STATUS_PUBLISHED   = 1;

	const WIDGET_TYPE_COMMENT = 'comment';
	const WIDGET_TYPE_POST    = 'post';

	public static function insertWidget( $widget ) {
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		$data                     = array();
		$data['id']               = $widget['id'];
		$data['entry_id']         = $widget['entry_id'];
		$data['type']             = $widget['type'];
		$data['status']           = $widget['status'];
		$data['post_id']          = $widget['post_id'];
		$data['comment_id']       = $widget['comment_id'];
		$data['add_permissions']  = $widget['add_permissions'];
		$data['edit_permissions'] = $widget['edit_permissions'];
		$data['created_at']       = current_time( 'mysql' );
		$wpdb->insert( $table, $data );
	}

	public static function updateWidget( $widget ) {
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		$data                     = array();
		$data['type']             = $widget['type'];
		$data['status']           = $widget['status'];
		$data['post_id']          = $widget['post_id'];
		$data['comment_id']       = $widget['comment_id'];
		$data['add_permissions']  = $widget['add_permissions'];
		$data['edit_permissions'] = $widget['edit_permissions'];

		$where             = array();
		$where['id']       = $widget['id'];
		$where['entry_id'] = $widget['entry_id'];

		$wpdb->update( $table, $data, $where );
	}

	public static function unpublishWidget() {

	}

	public static function insertOrUpdateWidget( $widget ) {
		// set the defaults
		if ( ! isset( $widget['post_id'] ) ) {
			$widget['post_id'] = 0;
		}

		if ( ! isset( $widget['comment_id'] ) ) {
			$widget['comment_id'] = 0;
		}

		$widgetFromDb = Kaltura_WPModel::getWidget( $widget['id'], $widget['entry_id'] );
		if ( ! $widgetFromDb ) {
			Kaltura_WPModel::insertWidget( $widget );
		} else {
			Kaltura_WPModel::updateWidget( $widget );
		}
	}

	public static function unpublishWidgets( $widgets ) {
		global $wpdb;
		$table = $wpdb->prefix . Kaltura_WPDB::WIDGET_TABLE;

		// check if one widget was passed and its not in an array
		if ( ! is_array( $widgets ) ) {
			$widgetsTemp = $widgets;
			$widgets     = array( $widgetsTemp );
		}
		foreach ( $widgets as $widget ) {
			$data  = array( 'status' => Kaltura_WPModel::WIDGET_STATUS_UNPUBLISHED );
			$where = array( 'id' => $widget['id'], 'entry_id' => $widget['entry_id'] );
			$wpdb->update( $table, $data, $where );
		}
	}

	public static function isCategoryExists( $name ) {
		$sanitizer = new KalturaSanitizer();
		$name      = $sanitizer->sanitizer( $name, 'string' );

		return term_exists( $name, 'category' );
	}

	public static function getCategoryByName( $name ) {
		$sanitizer = new KalturaSanitizer();
		$name      = $sanitizer->sanitizer( $name, 'string' );

		if ( $term = get_term_by( 'name', $name, 'category' ) ) {
			$cat = get_category( $term->term_id );
			if ( is_wp_error( $cat ) ) {
				return null;
			} else {
				return $cat;
			}
		} else {
			return null;
		}
	}
}