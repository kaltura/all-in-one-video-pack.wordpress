<?php
if ( ! defined( 'ABSPATH' ) ) {// to be on the safe side
	die;
}

return array(
	'server_url'                   => ( is_ssl() ) ? 'https://www.kaltura.com' : 'http://www.kaltura.com',
	'cdn_url'                      => ( is_ssl() ) ? 'https://cdn.kaltura.com' : 'http://cdn.kaltura.com',
	'anonymous_user_id'            => 'Anonymous',
	'kcw_ui_conf_id_admin'         => 15333782,
	'categoriesRootId'             => 0,
	'thumbnail_player_ui_conf_id'  => 14969192,
	'kaltura_default_player_type'  => 11958362, // default player if player was not chosen in plugin admin screen
	'kaltura_show_media_from'	   => 'all_account', // when browsing media - should the media be from the whole account or just the logged in user's?
	'kaltura_enable_kcw'           => false, // enables the legacy flash uploader instead of html5 uploader
);