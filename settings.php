<?php
if ( ! defined( 'ABSPATH' ) ) {// to be on the safe side
	die;
}

return array(
	'server_url'                   => 'http://www.kaltura.com',
	'cdn_url'                      => 'http://cdn.kaltura.com',
	'anonymous_user_id'            => 'Anonymous',
	'kcw_ui_conf_id_admin'         => 15333782,
	'kcw_ui_conf_comments'         => 15333792,
	'categoriesRootId'             => 0,
	'thumbnail_player_ui_conf_id'  => 14969192,
	'kaltura_comments_player_type' => 11958362, // default player if comments player was not chosen in plugin admin screen
	'kaltura_default_player_type'  => 11958362, // default player if player was not chosen in plugin admin screen

	'default_players'              => array(),

	'player.11958362.name'         => 'Light Skin',
	'player.11958362.width'        => 400,
	'player.11958362.height'       => 330,

	'player.11958342.name'         => 'Dark Skin',
	'player.11958342.width'        => 400,
	'player.11958342.height'       => 330,
);