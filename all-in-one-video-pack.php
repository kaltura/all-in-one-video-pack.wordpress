<?php
/*
Plugin Name: All in One Video Pack
Plugin URI: http://www.kaltura.org/
Description: This is not just another video embed tool - it includes every functionality you might need for video and rich-media, including playing and uploading.
Version: 2.4.5
Author: Kaltura
Author URI: http://www.kaltura.org/
*/

define( 'KALTURA_PLUGIN_FILE_RESOLVED', __FILE__ );
define( 'KALTURA_ROOT', dirname( __FILE__ ) );

require_once( KALTURA_ROOT . '/lib/Kaltura/Autoloader.php' );

// a workaround when using symbolic links and __FILE__ holds the resolved path
$all_in_one_video_pack_file = KALTURA_PLUGIN_FILE_RESOLVED;
if ( isset( $plugin ) ) {
	if ( ! defined( 'KALTURA_PLUGIN_FILE' ) ) {
		define( 'KALTURA_PLUGIN_FILE', $plugin );
	}
} elseif ( isset( $network_plugin ) ) {
	if ( ! defined( 'KALTURA_PLUGIN_FILE' ) ) {
		define( 'KALTURA_PLUGIN_FILE', $network_plugin );
	}
} elseif ( isset( $mu_plugin ) ) {
	if ( ! defined( 'KALTURA_PLUGIN_FILE' ) ) {
		define( 'KALTURA_PLUGIN_FILE', $mu_plugin );
	}
} else {
	if ( ! defined( 'KALTURA_PLUGIN_FILE' ) ) {
		define( 'KALTURA_PLUGIN_FILE', KALTURA_PLUGIN_FILE_RESOLVED );
	}
}

$kalturaAutoloader = new Kaltura_Autoloader( plugin_dir_path( __FILE__ ) );
$kalturaAutoloader->register();

$kalturaPlugin = new Kaltura_AllInOneVideoPackPlugin();
$kalturaPlugin->init();