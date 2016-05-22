<?php
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Features can be overridden by one of the following options:
 *  1. Setting a WP database option with the following name "kaltura_feature_%FEATURE_NAME%" to true or false
 *  2. Hooking into a filter "kaltura_feature_%FEATURE_NAME%" and returning true or false
 */

return array(
    'youtube_entries' => true,
);