<?php
	ob_start();
	require('../../../../wp-blog-header.php'); 
	define('WP_USE_THEMES', false);
	define('WP_ADMIN', TRUE);
	auth_redirect();
	require_once('../settings.php');
	require_once('../lib/common.php');
	require_once('../lib/kaltura_helpers.php');
	
	if(!function_exists('imagecreatetruecolor') || !function_exists('imagecreatefrompng') || !function_exists('imagecopymerge')) 
	{
		$file_name = "preview_bg.jpg";
		header("Content-Type: image/jpeg");
		$fp = fopen($file_name, 'rb');
		header("Content-Length: " . filesize($file_name));
		ob_clean();
		fpassthru($fp);
		exit;
	}
	
	$thumbanilUrl = @$_GET['thumbnail_url'];
	$playerType = $_GET["player_type"];

	$sourcewidth = 240;
	$sourceheight = 180;
	$thumbail_image = imagecreatefromjpeg($thumbanilUrl."/type/2/width/".$sourcewidth."/height/".$sourceheight."/bgcolor/000000");
	
	$bg_path = "preview_bg_".$playerType.".jpg";
	list($placeholder_width, $placeholder_height)= getimagesize($bg_path);
	$bg_image = imagecreatefromjpeg($bg_path);

	$overlay_path = "wordpress_comment_play_overlay.png";
	list($overlay_width, $overlay_height)= getimagesize($overlay_path);
	$overlay_image = imagecreatefrompng($overlay_path);
	
	$width = 240;
	$height = 180;
	$im = imagecreatetruecolor($placeholder_width, $placeholder_height);
	imagecopy($im, $bg_image, 0, 0, 0, 0, $placeholder_width, $placeholder_height);
	
	// copy with opacity change
	imagecopymerge($im, $thumbail_image, 5 + ($width - $sourcewidth) / 2, 30 + ($height - $sourceheight) / 2, 0, 0, $sourcewidth, $sourceheight, 50);
	imagecopy($im, $overlay_image, ($placeholder_width - $overlay_width) / 2, ($placeholder_height - $overlay_height) / 2, 0, 0, $overlay_width, $overlay_height);
	
	imagedestroy($bg_image);
	imagedestroy($thumbail_image);
	imagedestroy($overlay_image);
	
	ob_clean();
	header("Content-Type: image/jpeg");
	if ($im) 
	{
		imagejpeg($im, null, 90);
	}
	exit;
?>