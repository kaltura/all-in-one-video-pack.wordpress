<?php

class Kaltura_WPModel
{
	public static function isCategoryExists($name)
	{
		return term_exists($name, 'category');
	}

	public static function getCategoryByName($name)
	{
		return get_term($name, 'category');
	}

	public static function getPostByTitle($title)
	{
		$post_arr = sanitize_post(array("post_title" => $title), 'db');
		$post_arr = $post_arr["post_title"];
		global $wpdb;
		$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='post'", $title ));
		if ($post)
			return get_post($post, OBJECT);
		return null;
	}
}
