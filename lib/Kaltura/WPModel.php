<?php

class Kaltura_WPModel {
	public static function isCategoryExists( $name ) {
		$sanitizer = new KalturaSanitizer();
		$name      = $sanitizer->sanitizer( $name, 'string' );

		return term_exists( $name, 'category' );
	}

	public static function getCategoryByName( $name ) {
		$sanitizer = new KalturaSanitizer();
		$name      = $sanitizer->sanitizer( $name, 'string' );

		if ( $term = get_term_by( 'name', $name, 'category' ) ) {
			$cat = get_category( $term->term_id );
			if ( is_wp_error( $cat ) ) {
				return null;
			} else {
				return $cat;
			}
		} else {
			return null;
		}
	}
}