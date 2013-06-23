<?php
require_once('../../../wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/admin.php');
auth_redirect();
nocache_headers();
$show_admin_bar = false;
//wp_enqueue_script('jquery');
$controller = new Kaltura_LibraryController();
// we want to execute out controller before the wordpress start outputting the html
ob_start();
$controller->execute();
$controllerOutput= ob_get_clean();
function get_controller_content()
{
	global $controllerOutput;
	echo $controllerOutput;
}

wp_iframe('get_controller_content');