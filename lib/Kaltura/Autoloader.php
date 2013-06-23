<?php

class Kaltura_Autoloader
{
	protected $_basePath;

	public function __construct($basePath)
	{
		$this->_basePath = $basePath;
	}

	public function autoload($class)
	{
		$classPath = str_replace('_', '/', $class);
		$classPath = $this->_basePath.'/lib/'.$classPath.'.php';
		if (file_exists($classPath))
			include($classPath);
	}

	public function register()
	{
		spl_autoload_register(array($this, 'autoload'));
	}
}