<?php

abstract class Kaltura_BaseController {
	/**
	 * Implement and return list of allowed actions
	 *
	 * @return array
	 */
	abstract protected function allowedActions();

	public function execute() {
		$this->validateAccess();
		$kaction    = $this->getKAction();
		$methodName = $kaction . 'Action';
		if ( method_exists( $this, $methodName ) ) {
			call_user_func( array( $this, $methodName ) );
		}
	}

	public function renderView( $viewFile, array $params = array() ) {
		$viewRenderer = new Kaltura_ViewRenderer();
		$viewRenderer->renderView( $viewFile, $params );
	}

	protected function validateAccess() {
		$kaction = $this->getKAction();
		if ( ! in_array( $kaction, $this->allowedActions(), true ) ) {
			die( 'Access denied' );
		}
	}

	protected function getKAction() {
		return KalturaSanitizer::kaction( KalturaHelpers::getRequestParam( 'kaction' ) );
	}
}