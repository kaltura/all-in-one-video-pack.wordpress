<?php

/**
 * Created by PhpStorm.
 * User: royc
 * Date: 5/5/14
 * Time: 1:12 PM
 */
class KalturaSanitizer extends Kaltura_BaseController {

	protected function allowedActions() {
		return array(
			'sanitizer',
		);
	}

	/**
	 * This is the main function to sanitize variables.
	 *
	 * @param $value Any - Can be of any type. This is the variable to sanitize.
	 * @param
	 */
	public function sanitizer( $value, $sanitizeType, $objectType = null ) {
		if ( is_string( $sanitizeType ) && method_exists( $this, $sanitizeType ) ) {
			$valid = $this->$sanitizeType( $value, $objectType ) || empty( $value );
			if ( $valid ) {
				return $value;
			} else {
				$params                 = array();
				$params['value']        = $value;
				$params['expectedType'] = $sanitizeType;
				$params['valueType']    = gettype( $value );
				$params['backtrace ']   = debug_backtrace();

				return $this->renderView( 'sanitize-error.php', $params );
			}
		}

		return $this->renderView( 'sanitize-error.php' );
	}

	private function boolean( $value ) {
		return is_bool( $value );
	}

	private function integer( $value ) {
		return is_integer( $value );
	}

	private function int( $value ) {
		return $this->integer( $value );
	}

	private function string( $value ) {
		return is_string( $value );
	}

	private function text( $value ) {
		return $this->string( $value );
	}

	private function object( $value, $objectType = null ) {
		if ( ! empty( $objectType ) ) {
			return is_a( $value, $objectType );
		}

		return is_object( $value );
	}

	private function arr( $value ) {
		return is_array( $value );
	}

	private function email( $value ) {
		return filter_var( $value, FILTER_VALIDATE_EMAIL );
	}

	private function playerRatio( $value ) {
		$regex = '/^([0-9]+)(:)([0-9]+)$/';

		return preg_match( $regex, $value );
	}

	private function url( $value ) {
		$regex = '/^((?:http(?:s)?\:\/\/)?[a-zA-Z0-9_-]+(?:.[a-zA-Z0-9_-]+)*.[a-zA-Z]{2,4}(?:\/[a-zA-Z0-9_]+)*(?:\/[a-zA-Z0-9_]+.[a-zA-Z]{2,4}(?:\?[a-zA-Z0-9_]+\=[a-zA-Z0-9_]+)?)?(?:\&[a-zA-Z0-9_]+\=[a-zA-Z0-9_]+)*)$/';

		return esc_url(preg_match( $regex, $value ));
	}

	private function generateTabUrl( $params ) {
		$valid         = true;
		$allowedParams = array(
			'page'      => 'string',
			'kaction'   => 'string',
			'isLibrary' => 'boolean',
			'tab'       => 'string',
			'firstedit' => 'string',
			'entryIds'  => 'arr',
		);
		foreach ( $params as $key => $value ) {
			/** Check the key is in the allowed params. */
			$valid = array_key_exists( $key, $allowedParams );
			if ( ! $valid ) {
				return $valid;
			}
			/** Check the value is in the expected type. */
			$functionName = $allowedParams[$key];
			$valid        = $this->$functionName( $value );
			if ( ! $valid ) {
				return $valid;
			}
		}

		return $valid;
	}

	private function intOrString( $value ) {
		return is_string( $value ) || is_integer( $value );
	}

	private function flashVarsToString( $params ) {
		$valid         = true;
		$allowedParams = array(
			'userId'           => 'string',
			'sessionId'        => 'string',
			'partnerId'        => 'string',
			'subPartnerId'     => 'int',
			'afterAddentry'    => 'string',
			'close'            => 'string',
			'termsOfUse'       => 'string',
			'showCloseButton'  => 'string',
			'categoriesRootId' => 'intOrString',
			'entryId'          => 'string',
			'ks'               => 'string',
			'uid'              => 'intOrString',
			'subpId'           => 'intOrString',
			'autoPlay'         => 'string',
		);
		foreach ( $params as $key => $value ) {
			/** Check the key is in the allowed params. */
			$valid = array_key_exists( $key, $allowedParams );
			if ( ! $valid ) {
				return $valid;
			}
			/** Check the value is in the expected type. */
			$functionName = $allowedParams[$key];
			$valid        = $this->$functionName( $value );
			if ( ! $valid ) {
				return $valid;
			}
		}

		return $valid;
	}
} 