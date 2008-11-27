<?php

global $kaltura_db_version;
$kaltura_db_version = "1.0";

function kaltura_install_db()
{
	global $wpdb;
	global $kaltura_db_version;

	$table_name = $wpdb->prefix . KALTURA_WIDGET_TABLE;
	if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
		$sql = "CREATE TABLE " . $table_name . " (
			id VARCHAR(10) NOT NULL,
			type VARCHAR(10) NOT NULL,
			post_id bigint(20) unsigned NOT NULL,
			comment_id bigint(20) unsigned NOT NULL,
			status TINYINT NOT NULL,
			add_permissions TINYINT NOT NULL,
			edit_permissions TINYINT NOT NULL,
			created_at DATETIME NOT NULL,
			PRIMARY KEY (id),
			KEY post_id (post_id),
			KEY status_created_at (status, created_at)
		);";
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		
		dbDelta($sql);

		add_option("kaltura_db_version", $kaltura_db_version);
	}
}

?>