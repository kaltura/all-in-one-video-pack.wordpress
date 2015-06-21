<?php
/*
Plugin Name: All in One Video Pack
Plugin URI: http://www.kaltura.org/
Description: This is not just another video embed tool - it includes every functionality you might need for video and rich-media, including playing and uploading.
Version: 2.6
Author: Kaltura
Author URI: http://www.kaltura.org/
*/

define( 'KALTURA_PLUGIN_FILE', __FILE__ );
define( 'KALTURA_ROOT', dirname( __FILE__ ) );
define( 'KALTURA_PLUGIN_VERSION', '2.6' );

require_once( KALTURA_ROOT . '/lib/Kaltura/Autoloader.php' );

$kalturaAutoloader = new Kaltura_Autoloader( plugin_dir_path( __FILE__ ) );
$kalturaAutoloader->register();

$kalturaPlugin = new Kaltura_AllInOneVideoPackPlugin();
$kalturaPlugin->init();