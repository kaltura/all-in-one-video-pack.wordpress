<?php
/*
Plugin Name: All in One Video Pack Sidebar Widget
Plugin URI: http://kaltura.org/
Description: A sidebar widget that allows you to display the most recent posted videos and comments in your blog.  
Version: 2.4.4
Author: Kaltura
Author URI: http://kaltura.org/
*/

require_once('settings.php');
require_once('lib/kaltura_client.php');
require_once('lib/kaltura_helpers.php');


class AllInOneVideoWidget 
{
	function AllInOneVideoWidget() 
	{
		// load only if the main plugin is loadeded
		if (defined("KALTURA_PLUGIN_FILE")) 
		{
			add_action("widgets_init", array(&$this, "registerWidget"));
		}
		else
		{
			$msg = __("Please activate \"All in One Video Pack\" before using the sidebar widget");
			$notice = '<div class="updated fade"><p><strong>'.$msg.'</strong></p></div>';
			add_action('admin_notices', create_function("", 'echo \''.$notice.'\';'));
		}
	}
	
	function registerWidget() 
	{
		$description = "The most recent posted videos and comments in your blog";
		$options = array("classname" => "widget_text", "description" => $description);
		$id = "all-in-one-video-pack-widget";
		$name = "Recent Videos Widget";
		wp_register_sidebar_widget($id, $name, array(&$this, 'displayWidget'), $options);
	}
	
	function displayWidget($args)
	{
		extract($args);

        echo $before_widget;
        echo $before_title;
        echo 'Recent Videos';
        echo $after_title;
        echo '<div id="kaltura-sidebar-menu">' . "\n";
	    echo '<a id="kaltura-posts-button" onclick="Kaltura.switchSidebarTab(this, \'posts\');">'.__("Posted Videos").'</a> | ' . "\n";
	    echo '<a id="kaltura-comments-button" onclick="Kaltura.switchSidebarTab(this, \'comments\');">'.__("Video Comments").'</a>' . "\n";
        echo '</div>' . "\n";
        
        echo '<div id="kaltura-loader"><img src="'.KalturaHelpers::getPluginUrl().'/images/loader.gif" alt="Loading..." /></div>' . "\n";
        echo '<div id="kaltura-sidebar-container"></div>' . "\n";
        echo '<script type="text/javascript">' . "\n";
        echo 'jQuery("#kaltura-posts-button").click()' . "\n";
        echo 'var kaltura_loader = new SWFObject("'.KalturaHelpers::getPluginUrl().'/images/loader.swf", "kaltura-loader-swf", 35, 35, "9", "#000000");' . "\n";
        echo 'kaltura_loader.addParam("wmode", "transparent");' . "\n";
        echo 'kaltura_loader.write("kaltura-loader");' . "\n";
        echo '</script>' . "\n";
        
        echo $after_widget;
	}
}

// initialize the plugin after all plugins are loaded because we depend on our main plugin
add_action("plugins_loaded", create_function("", '$allInOneVideoWidget = new AllInOneVideoWidget();'));

?>