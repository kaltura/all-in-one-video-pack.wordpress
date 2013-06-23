<?php

class Kaltura_ViewRenderer
{
	public function renderView($viewFile, array $params = array())
	{
		// sent params to current scope
		foreach($params as $key => $value)
		{
			$this->$key = $value;
		}
		$this->allowViewRendering = true;
		include(dirname(__FILE__).'/../../view/'.$viewFile);
	}
}