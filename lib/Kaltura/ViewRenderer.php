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
		if (is_file(dirname(__FILE__).'/../../view/'.$viewFile)) {
			include(dirname(__FILE__).'/../../view/'.$viewFile);
		}
	}
}