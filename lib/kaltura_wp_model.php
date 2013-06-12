<?php 
class KalturaWPModel
{

	
	function unpublishWidget()
	{
		
	}
	
	function isCategoryExists($name)
	{
		$categories = get_categories('get=all');
		foreach($categories as $category)
		{
			if (strtolower($category->name) == strtolower($name))
				return true;
		}
		
		return false;
	}
	
	function getCategoryByName($name)
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
?>