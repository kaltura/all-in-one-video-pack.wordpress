<?php

class Kaltura_ViewRenderer {
	public function renderView( $viewFile, array $params = array() ) {
		// sent params to current scope
		foreach ( $params as $key => $value ) {
			$this->$key = $value;
		}
		$this->allowViewRendering = true;
		if ( is_file( plugin_dir_path(KALTURA_PLUGIN_FILE) . '/view/' . $viewFile ) ) {
			include( plugin_dir_path(KALTURA_PLUGIN_FILE) . '/view/' . $viewFile );
		}
	}
}