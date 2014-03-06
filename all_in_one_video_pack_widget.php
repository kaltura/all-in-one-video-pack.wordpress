<?php
/*
Plugin Name: All in One Video Pack Sidebar Widget
Plugin URI: http://www.kaltura.org/
Description: A sidebar widget that allows you to display the most recent posted videos and comments in your blog.  
Version: 99.99(DEV)
Author: Kaltura
Author URI: http://www.kaltura.org/
*/

if (isset($plugin)) {
	if (!defined('KALTURA_WIDGET_PLUGIN_FILE'))
		define('KALTURA_WIDGET_PLUGIN_FILE', $plugin);
}
elseif (isset($network_plugin)) {
	if (!defined('KALTURA_WIDGET_PLUGIN_FILE'))
		define('KALTURA_WIDGET_PLUGIN_FILE', $network_plugin);
}
elseif (isset($mu_plugin)) {
	if (!defined('KALTURA_WIDGET_PLUGIN_FILE'))
		define('KALTURA_WIDGET_PLUGIN_FILE', $mu_plugin);
}
else {
	if (!defined('KALTURA_WIDGET_PLUGIN_FILE'))
		define('KALTURA_WIDGET_PLUGIN_FILE', __FILE__);
}

register_activation_hook(KALTURA_WIDGET_PLUGIN_FILE, 'kaltura_activate_widget_plugin');

function kaltura_initialize_widget_plugin()
{
	// initialize only if the main plugin is loadeded
	if (!defined('KALTURA_PLUGIN_FILE'))
	{
		add_action('admin_notices', function() {
            $msg    = __("Please activate \"All in One Video Pack\" before using the sidebar widget");
            $notice = '<div class="updated fade"><p><strong>' . $msg . '</strong></p></div>';
            echo $notice;
        });
		return;
	}

	new Kaltura_AllInOneVideoWidgetPlugin();
}



function kaltura_activate_widget_plugin()
{
	require_once('lib/Kaltura/WPDB.php');
	Kaltura_WPDB::install();
}

// initialize the plugin after all plugins are loaded because we depend on our main plugin
add_action("plugins_loaded", 'kaltura_initialize_widget_plugin');