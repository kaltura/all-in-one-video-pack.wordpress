<?php 
class Kaltura_WPModel
{

	public static function unpublishWidget()
	{
		
	}

	public static function isCategoryExists($name)
	{
		$categories = get_categories('get=all');
		foreach($categories as $category)
		{
			if (strtolower($category->name) == strtolower($name))
				return true;
		}
		
		return false;
	}

	public static function getCategoryByName($name)
	{
		$categories = get_categories('get=all');
		foreach($categories as $category)
		{
			if (strtolower($category->name) == strtolower($name))
				return $category;
		}
		return null;
	}
}