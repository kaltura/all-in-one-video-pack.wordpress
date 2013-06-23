<?php
require_once('../../../wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/admin.php');
nocache_headers();
$controller = new Kaltura_FrontEndController();
ob_start();
$controller->execute();
$controllerOutput= ob_get_clean();
function get_controller_content()
{
	global $controllerOutput;
	echo $controllerOutput;
}
?>
<html>
<head>
<?php wp_head(); ?>
<style type="text/css">
	html { margin-top: 0px !important; }
	* html body { margin-top: 0px !important; }
	#wpadminbar { display: none; }
</style>
</head>
<body <?php body_class(); ?>>
<?php get_controller_content(); ?>
</body>
</html>