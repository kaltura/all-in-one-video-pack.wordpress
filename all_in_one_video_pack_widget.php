<?php
/*
Plugin Name: All in One Video Pack Sidebar Widget
Plugin URI: http://kaltura.org/community/viewtopic.php?f=4&t=3
Description: This is not just another video embed tool - it includes every functionality you might need for video and rich-media, including playing, uploading and editing.  
Version: 2.0
Author: Kaltura
Author URI: http://corp.kaltura.com
*/

require_once('settings.php');
require_once('lib/kaltura_client.php');
require_once('lib/kaltura_helpers.php');
require_once('lib/common.php');


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
		register_sidebar_widget("All in One Video Pack Widget", array(&$this, 'displayWidget'));
	}
	
	function displayWidget($args)
	{
		extract($args);

        echo $before_widget;
        echo $before_title;
        echo 'Title';
        echo $after_title;
        echo '<ul id="kaltura-sidebar-menu">' . "\n";
	    echo '    <li style="float:right;"><a id="kaltura-comments-button" onclick="Kaltura.switchSidebarTab(this, \'comments\');">'.__("Video Comments").'</a></li>' . "\n";
	    echo '    <li><a id="kaltura-posts-button" onclick="Kaltura.switchSidebarTab(this, \'posts\');">'.__("Video Posts").'</a></li>' . "\n";
        echo '</ul>' . "\n";
        
        echo '<div id="kaltura-loader"><img src="'.kalturaGetPluginUrl().'/images/loader.gif" alt="Loading..." /></div>';
        echo '<div id="kaltura-sidebar-container"></div>';
        echo '<script type="text/javascript">jQuery("#kaltura-posts-button").click();</script>';
        
        echo $after_widget;
	}
}

// initialize the plugin after all plugin where loaded because we depend on the main on our main plugin
add_action("plugins_loaded", create_function("", '$allInOneVideoWidget = new AllInOneVideoWidget();'));

?>