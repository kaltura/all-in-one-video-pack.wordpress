<?php

class KalturaSanitizer {

	public static function shortCodeAttributes( array $attrs ) {
		$newAttrs = array();
		foreach ( $attrs as $key => $value ) {
			$newValue = null;
			switch ( $key ) {
				case 'height':
					$newValue = floatval( $value );
					break;
				case 'width':
				case 'uiconfid':
					$newValue = intval( $value );
					break;
				case 'align':
					$newValue = in_array(
						$value,
						array( 'r', 'l', 'm', 'right', 'left', 'center' ), true ) ? $value : null;
					break;
				case 'wid':
				case 'entryid':
					$newValue = sanitize_key( $value );
					break;
				case 'style':
					$newValue = sanitize_text_field( $value );
					break;
				case 'responsive':
				case 'hoveringcontrols':
					$newValue = $value === 'true';
					break;
			}

			if ( $newValue !== null ) {
				$newAttrs[ $key ] = $newValue;
			}
		}

		return $newAttrs;
	}

	public static function browseParams( array $params ) {
		$newParams = array();
		foreach ( $params as $key => $value ) {
			$newValue = null;
			switch ( $key ) {
				case 'page':
					$newValue = intval( $value );
					break;
				case 'tab':
				case 'kaction':
					$newValue = self::kaction( $value );
					break;
				case 'isLibrary':
					$newValue = (bool) $value;
					break;
				case 'firstedit':
					$newValue = $value === 'true' ? $value : null;
					break;
				case 'entryIds':
					$newValue = array_map('sanitize_key', $value);
					break;
				case 'entryid':
					$newValue = sanitize_key($value);
					break;
			}

			if ( $newValue !== null ) {
				$newParams[ $key ] = $newValue;
			}
		}

		return $newParams;
	}

	public static function privileges( $value ) {
		$value = strtolower( $value );
		$value = preg_replace( '/[^a-z0-9_\-\*:,\/]/', '', $value );

		return $value;
	}

	public static function kaction( $value ) {
		$value = strtolower( $value );
		$value = preg_replace( '/[^a-z_]/', '', $value );

		return $value;
	}
}