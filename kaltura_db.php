<?php

global $kaltura_db_version;
$kaltura_db_version = "1.1";

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
		add_option("kaltura_db_version", "1.0");
	}
	
	// upgrades
	$installed_ver = get_option("kaltura_db_version");

	if($installed_ver == "1.0") {
		$sql = "ALTER TABLE " . $table_name . " DROP PRIMARY KEY;";
		$wpdb->query($sql);
		
		$sql = "ALTER TABLE " . $table_name . "
 				CHANGE id id VARCHAR(20) NOT NULL,
 				ADD entry_id VARCHAR(20) NOT NULL AFTER id;"; 
		$wpdb->query($sql);
		
		$sql = "ALTER TABLE " . $table_name . " ADD PRIMARY KEY  (id, entry_id);";
		$wpdb->query($sql);
		
		update_option("kaltura_db_version", "1.1");
	}
}

?>