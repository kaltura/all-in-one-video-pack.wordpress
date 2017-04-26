<?php

class KalturaHelpers {
	private static $_settings = null;

	public static function getKalturaConfiguration() {
		$config = new Kaltura_Client_Configuration( KalturaHelpers::getOption( 'kaltura_partner_id' ) );
		$config->serviceUrl = KalturaHelpers::getServerUrl();
		$config = apply_filters('kaltura_client_config_filter', $config);

		return $config;
	}

	public static function getServerUrl($path = null) {
		$url =  KalturaHelpers::getOption( 'server_url' );
		$url = rtrim( $url, '/' );
		if ($path)
			$url .= $path;

		return esc_url_raw( $url );
	}

	public static function getCdnUrl($path = null) {
		$url = KalturaHelpers::getOption( 'cdn_url' );
		$url = rtrim( $url, '/' );
		if ($path)
			$url .= $path;

		return esc_url_raw( $url );
	}

	public static function getLoggedUserId() {
		global $user_ID, $user_login;
		if ( ! $user_ID && ! $user_login ) {
			return sanitize_user( KalturaHelpers::getOption( 'anonymous_user_id' ) );
		} elseif ( get_option( 'kaltura_user_identifier', 'user_login' ) == 'user_id' ) {
			return sanitize_user( $user_ID );
		} else {
			return sanitize_user( $user_login );
		}
	}

	public static function getPluginUrl() {
		return self::pluginUrl( '' );
	}

	public static function generateTabUrl( $params ) {
		$params = KalturaSanitizer::browseParams( $params );

		$query = remove_query_arg( array_keys( $_GET ), esc_url_raw( self::getRequestUrl() ) );

		$query = add_query_arg( $params, $query );

		return $query;
	}

	public static function getRequestUrl() {
		return esc_url_raw($_SERVER['REQUEST_URI']);
	}

	public static function getRequestPostParam( $param, $default = null ) {
		if ( isset( $_POST[ $param ] ) ) {
			return $_POST[ $param ];
		} else {
			return $default;
		}
	}

	public static function getRequestParam( $param, $default = null ) {
		if ( isset( $_GET[ $param ] ) ) {
			if ( is_array( $_GET[ $param ] ) ) {
				return array_map( 'wp_check_invalid_utf8', $_GET[ $param ]);
			}
			else {
				return wp_check_invalid_utf8( $_GET[ $param ] );
			}
		} else {
			return $default;
		}
	}

	public static function protectView( Kaltura_ViewRenderer $view ) {
		if ( ! isset( $view->allowViewRendering ) || $view->allowViewRendering !== true ) {
			wp_die( 'Access denied' );
		}
	}

	public static function getContributionWizardFlashVars( $ks ) {
		$flashVars                  = array();
		$flashVars['userId']        = sanitize_user( KalturaHelpers::getLoggedUserId() );
		$flashVars['sessionId']     = sanitize_text_field( $ks );
		$flashVars['partnerId']     = intval( KalturaHelpers::getOption( 'kaltura_partner_id' ) );
		$flashVars['subPartnerId']  = intval( KalturaHelpers::getOption( 'kaltura_partner_id' ) ) * 100;
		$flashVars['afterAddentry'] = 'kaltura_onContributionWizardAfterAddEntry';
		$flashVars['close']         = 'kaltura_onContributionWizardClose';
		$flashVars['termsOfUse']    = 'http://corp.kaltura.com/static/tandc';

		return $flashVars;
	}

	public static function getKalturaPlayerFlashVars( $ks = null, $entryId = null ) {
		$ks                     = sanitize_text_field( $ks );
		$entryId                = sanitize_key( $entryId );
		$flashVars              = array();
		$flashVars['partnerId'] = intval( KalturaHelpers::getOption( 'kaltura_partner_id' ) );
		$flashVars['subpId']    = intval( KalturaHelpers::getOption( 'kaltura_partner_id' ) ) * 100;
		$flashVars['uid']       = sanitize_user( KalturaHelpers::getLoggedUserId() );

		if ( $ks ) {
			$flashVars['ks'] = $ks;
		}
		if ( $entryId ) {
			$flashVars['entryId'] = $entryId;
		}

		return $flashVars;
	}

	public static function flashVarsToString( $flashVars = array() ) {
		$flashVarsStr = http_build_query($flashVars);
		return sanitize_text_field(substr( $flashVarsStr, 0, strlen( $flashVarsStr ) - 1 ));
	}

	public static function getHtml5IframeUrl( $uiConfId = null ) {
		$scriptSrc = KalturaHelpers::getServerUrl() . '/p/' . KalturaHelpers::getOption( 'kaltura_partner_id' ) . '/sp/' . KalturaHelpers::getOption( 'kaltura_partner_id' ) . '00/embedIframeJs';
		if ($uiConfId)
			$scriptSrc .= '/uiconf_id/' . (int)$uiConfId;
		$scriptSrc .= '/partner_id/' . KalturaHelpers::getOption( 'kaltura_partner_id' );
		return esc_url_raw($scriptSrc);
	}

	public static function getContributionWizardUrl( $uiConfId ) {
		return esc_url_raw ( KalturaHelpers::getServerUrl() . '/kcw/ui_conf_id/' . intval($uiConfId) );
	}

	public static function getFileUploadParams( $ks ) {
		$params = array(
				'maxChunkSize'                     => 3000000,
				'dynamicChunkSizeInitialChunkSize' => 1000000,
				'dynamicChunkSizeThreshold'        => 50000000,
				'dynamixChunkSizeMaxTime'          => 30,
				'host'                             => KalturaHelpers::getServerUrl(),
				'apiURL'                           => KalturaHelpers::getServerUrl( '/api_v3/' ),
				'url'                              => KalturaHelpers::getServerUrl( '/api_v3/?service=uploadToken&action=upload&format=1' ),
				'ks'                               => $ks,
				'fileTypes'                        => '*.mts;*.MTS;*.qt;*.mov;*.mpg;*.avi;*.mp3;*.m4a;*.wav;*.mp4;*.wma;*.vob;*.flv;*.f4v;*.asf;*.qt;*.mov;*.mpeg;*.avi;*.wmv;*.m4v;*.3gp;*.jpg;*.jpeg;*.bmp;*.png;*.gif;*.tif;*.tiff;*.mkv;*.QT;*.MOV;*.MPG;*.AVI;*.MP3;*.M4A;*.WAV;*.MP4;*.WMA;*.VOB;*.FLV;*.F4V;*.ASF;*.QT;*.MOV;*.MPEG;*.AVI;*.WMV;*.M4V;*.3GP;*.JPG;*.JPEG;*.BMP;*.PNG;*.GIF;*.TIF;*.TIFF;*.MKV;*.AIFF;*.arf;*.ARF;*.webm;*.WEBM;*.rm;*.RM;*.ra;*.RA;*.RV;*.rv;*.aiff',
				'context'                          => '',
				'categoryId'                       => - 1,
				'messages'                         => array(
						'acceptFileTypes' => 'File type not allowed',
						'maxFileSize'     => 'File is too large',
						'minFileSize'     => 'File is too small'
				)
		);
		return $params;
	}

	public static function calculatePlayerHeight( $width, $playerRatio = '16:9' ) {
		$width    = intval($width);

		if ( empty( $width ) ) {
			$width = 400;
		}

		if ( empty( $playerRatio ) ) {
			$playerRatio = '16:9';
		}

		if ( $playerRatio == '16:9' ) {
			$height = ( $width / 16 ) * 9;
		} else {
			$height = ( $width / 4 ) * 3;
		}

		return (int) $height;
	}

	public static function getOption( $name, $default = null ) {
		$name    = is_string( $name ) ? $name : null;
		$default = is_bool( $default ) ? $default : null;

		$value = self::isPluginNetworkActivated() ? get_site_option( $name, $default ) : get_option( $name, $default );
		if ( ! empty( $value ) ) {
			return $value;
		}

		if ( is_null( self::$_settings ) ) {
			self::$_settings = self::getDefaultSettings();
		}
		$settings = self::$_settings;

		if ( isset( $settings[$name] ) ) {
			return $settings[$name];
		} else {
			return $default;
		}
	}

	public static function isPluginNetworkActivated() {
		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		return is_plugin_active_for_network( str_replace(DIRECTORY_SEPARATOR, '/', self::getKalturaPluginPath()) );
	}

	private static function getKalturaPluginPath() {
		$pluginsPath = DIRECTORY_SEPARATOR . 'wp-content' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR;
		return substr( KALTURA_PLUGIN_FILE, strpos( KALTURA_PLUGIN_FILE, $pluginsPath ) + strlen( $pluginsPath ) );
	}

	public static function getDefaultSettings() {
		$defaultSettings = require( plugin_dir_path(KALTURA_PLUGIN_FILE) . 'settings.php' );
		return $defaultSettings;
	}

	public static function isFeatureEnabled($name) {
		$name = is_string( $name ) ? $name : null;
		$features = self::getFeatures();
		$optionFeatureName = 'kaltura_feature_'.$name;
		$enabledByOption = get_option( $optionFeatureName, null );
		if ( ! is_null( $enabledByOption ) ) {
			return (bool)$enabledByOption;
		}

		$enabledByFilter = apply_filters($optionFeatureName, null);
		if ( ! is_null( $enabledByFilter ) ) {
			return (bool)$enabledByFilter;
		}

		return isset($features[$name]) ? (bool)$features[$name] : false;
	}

	public static function getFeatures() {
		$defaultSettings = require( plugin_dir_path(KALTURA_PLUGIN_FILE) . 'features.php' );
		return $defaultSettings;
	}

	public static function pluginUrl( $uri = '' ) {
		// In addition to providing the produced url, also provide the $uri
		return apply_filters( 'all_in_one_video_pack_plugin_url', plugins_url( $uri, KALTURA_PLUGIN_FILE ), $uri );
	}

	public static function jsUrl( $uri = '' ) {
		return self::pluginUrl( $uri );
	}

	public static function cssUrl( $uri = '' ) {
		return self::pluginUrl( $uri );
	}

	public static function getEmbedOptions( $params ) {
		// make sure that all keys exists in the array so we won't need to check with isset() for every array access
		$arrayKeys = array( 'width', 'height', 'uiconfid', 'align', 'wid', 'entryid', 'style', 'responsive', 'hoveringcontrols' );
		foreach ( $arrayKeys as $key ) {
			if ( ! isset( $params[$key] ) ) {
				$params[$key] = null;
			}
		}

		// align
		switch ( $params['align'] ) {
			case 'r':
			case 'right':
				$align = 'right';
				break;
			case 'm':
			case 'center':
				$align = 'center';
				break;
			case 'l':
			case 'left':
				$align = 'left';
				break;
			default:
				$align = '';
		}

		return array(
			'height'        => $params['height'],
			'width'         => $params['width'],
			'align'         => $align,
			'style'         => $params['style'],
			'wid'           => $params['wid'],
			'entryId'       => $params['entryid'],
			'uiconfid'      => $params['uiconfid'],
			'responsive'    => $params['responsive'],
			'hoveringControls' => $params['hoveringcontrols']
		);
	}

	public static function getAllowedPlayers() {
		$allowedPlayers = KalturaHelpers::getOption( 'kaltura_allowed_players' );
		if (!$allowedPlayers)
			$allowedPlayers = array();

		$allPlayers = KalturaModel::getInstance()->listPlayersUiConfs();
		$allPlayers = self::_filterOldPlayers($allPlayers->objects);
		$players    = array();
		foreach ( $allPlayers as $player ) {
			if ( in_array( $player->id, $allowedPlayers ) || ! $allowedPlayers ) {
				$players[ $player->id ] = $player;
			}
		}

		return $players;
	}

	private static function _filterOldPlayers($players) {
		$allowedPlayers = array();
		foreach($players as $player) {
			if(!empty($player->html5Url)) {
				$htmlPlayerUrl = $player->html5Url;
				$htmlPlayerUrlParts = explode('/', $htmlPlayerUrl);
				if(isset($htmlPlayerUrlParts[3]) && substr($htmlPlayerUrlParts[3], 1, 1) === '2') {
					$allowedPlayers[] = $player;
				}
			}
		}

		return $allowedPlayers;
	}

	/**
	 * Create string of media categories that assigned to the entry.
	 *
	 * @param Kaltura_Client_Type_BaseEntry $baseEntry
	 * @return array
	 */
	public static function getCategoriesString( Kaltura_Client_Type_BaseEntry $baseEntry, $maxCategories = 14 ) {
		$rootCategory = KalturaHelpers::getOption( 'kaltura_root_category' );
		if ( $baseEntry->categories ) {
			$mediaCategories = explode( ',', $baseEntry->categories );
			$mediaCategories = array_slice( $mediaCategories, 0, $maxCategories );
			foreach ( $mediaCategories as $key => $mediaCategory ) {
				$fullEntryCategoryWithoutRoot = '';
				if ( $rootCategory ) {
					$pos = strpos( $mediaCategory, '>' );
					if ( $pos !== false ) {
						$fullEntryCategoryWithoutRoot = substr( $mediaCategory, $pos + 1 );
					}
				} else {
					$fullEntryCategoryWithoutRoot = $mediaCategory;
				}

				$fullEntryCategoryWithoutRoot = str_replace( '>', ' > ', $fullEntryCategoryWithoutRoot );
				$fullEntryCategoryWithoutRoot = '&#32;&#32;&#8211; ' . $fullEntryCategoryWithoutRoot;
				$mediaCategories[$key] = $fullEntryCategoryWithoutRoot;
			}
			$mediaCategories = join( '&#10;', $mediaCategories );
		} else {
			$mediaCategories = 'No Category';
		}
		return $mediaCategories;
	}

	public static function getCountries() {
		return array(
			'AF' => 'Afghanistan (افغانستان)',
			'AX' => 'Aland Islands',
			'AL' => 'Albania (Shqipëria)',
			'DZ' => 'Algeria (الجزائر)',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia (Հայաստան)',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria (Österreich)',
			'AZ' => 'Azerbaijan (Azərbaycan)',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain (البحرين)',
			'BD' => 'Bangladesh (বাংলাদেশ)',
			'BB' => 'Barbados',
			'BY' => 'Belarus (Белару́сь)',
			'BE' => 'Belgium (België)',
			'BZ' => 'Belize',
			'BJ' => 'Benin (Bénin)',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan (འབྲུག་ཡུལ)',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia and Herzegovina (Bosna i Hercegovina)',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil (Brasil)',
			'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei (Brunei Darussalam)',
			'BG' => 'Bulgaria (България)',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi (Uburundi)',
			'KH' => 'Cambodia (Kampuchea)',
			'CM' => 'Cameroon (Cameroun)',
			'CA' => 'Canada',
			'CV' => 'Cape Verde (Cabo Verde)',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic (République Centrafricaine)',
			'TD' => 'Chad (Tchad)',
			'CL' => 'Chile',
			'CN' => 'China (中国)',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros (Comores)',
			'CG' => 'Congo',
			'CD' => 'Congo, Democratic Republic of the',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => 'Côte d&#39;Ivoire',
			'HR' => 'Croatia (Hrvatska)',
			'CU' => 'Cuba',
			'CY' => 'Cyprus (Κυπρος)',
			'CZ' => 'Czech Republic (Česko)',
			'DK' => 'Denmark (Danmark)',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'EC' => 'Ecuador',
			'EG' => 'Egypt (مصر)',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea (Guinea Ecuatorial)',
			'ER' => 'Eritrea (Ertra)',
			'EE' => 'Estonia (Eesti)',
			'ET' => 'Ethiopia (Ityop&#39;iya)',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland (Suomi)',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia (საქართველო)',
			'DE' => 'Germany (Deutschland)',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece (Ελλάς)',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea (Guinée)',
			'GW' => 'Guinea-Bissau (Guiné-Bissau)',
			'GY' => 'Guyana',
			'HT' => 'Haiti (Haïti)',
			'HM' => 'Heard Island and McDonald Islands',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary (Magyarország)',
			'IS' => 'Iceland (Ísland)',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran (ایران)',
			'IQ' => 'Iraq (العراق)',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel (ישראל)',
			'IT' => 'Italy (Italia)',
			'JM' => 'Jamaica',
			'JP' => 'Japan (日本)',
			'JE' => 'Jersey',
			'JO' => 'Jordan (الاردن)',
			'KZ' => 'Kazakhstan (Қазақстан)',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KW' => 'Kuwait (الكويت)',
			'KG' => 'Kyrgyzstan (Кыргызстан)',
			'LA' => 'Laos (ນລາວ)',
			'LV' => 'Latvia (Latvija)',
			'LB' => 'Lebanon (لبنان)',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya (ليبيا)',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania (Lietuva)',
			'LU' => 'Luxembourg (Lëtzebuerg)',
			'MO' => 'Macao',
			'MK' => 'Macedonia (Македонија)',
			'MG' => 'Madagascar (Madagasikara)',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania (موريتانيا)',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico (México)',
			'FM' => 'Micronesia',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia (Монгол Улс)',
			'ME' => 'Montenegro (Црна Гора)',
			'MS' => 'Montserrat',
			'MA' => 'Morocco (المغرب)',
			'MZ' => 'Mozambique (Moçambique)',
			'MM' => 'Myanmar (Burma)',
			'NA' => 'Namibia',
			'NR' => 'Nauru (Naoero)',
			'NP' => 'Nepal (नेपाल)',
			'NL' => 'Netherlands (Nederland)',
			'AN' => 'Netherlands Antilles',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'KP' => 'North Korea (조선)',
			'NO' => 'Norway (Norge)',
			'OM' => 'Oman (عمان)',
			'PK' => 'Pakistan (پاکستان)',
			'PW' => 'Palau (Belau)',
			'PS' => 'Palestinian Territories',
			'PA' => 'Panama (Panamá)',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru (Perú)',
			'PH' => 'Philippines (Pilipinas)',
			'PN' => 'Pitcairn',
			'PL' => 'Poland (Polska)',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar (قطر)',
			'RE' => 'Reunion',
			'RO' => 'Romania (România)',
			'RU' => 'Russia (Россия)',
			'RW' => 'Rwanda',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'São Tomé and Príncipe',
			'SA' => 'Saudi Arabia (المملكة العربية السعودية)',
			'SN' => 'Senegal (Sénégal)',
			'RS' => 'Serbia (Србија)',
			'CS' => 'Serbia and Montenegro (Србија и Црна Гора)',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore (Singapura)',
			'SK' => 'Slovakia (Slovensko)',
			'SI' => 'Slovenia (Slovenija)',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia (Soomaaliya)',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'KR' => 'South Korea (한국)',
			'ES' => 'Spain (España)',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan (السودان)',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden (Sverige)',
			'CH' => 'Switzerland (Schweiz)',
			'SY' => 'Syria (سوريا)',
			'TW' => 'Taiwan (台灣)',
			'TJ' => 'Tajikistan (Тоҷикистон)',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand (ราชอาณาจักรไทย)',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia (تونس)',
			'TR' => 'Turkey (Türkiye)',
			'TM' => 'Turkmenistan (Türkmenistan)',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine (Україна)',
			'AE' => 'United Arab Emirates (الإمارات العربيّة المتّحدة)',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'UM' => 'United States minor outlying islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan (O&#39;zbekiston)',
			'VU' => 'Vanuatu',
			'VA' => 'Vatican City (Città del Vaticano)',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam (Việt Nam)',
			'VG' => 'Virgin Islands, British',
			'VI' => 'Virgin Islands, U.S.',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara (الصحراء الغربية)',
			'YE' => 'Yemen (اليمن)',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);
	}

	public static function getStates() {
		return array(
			'AK' => 'AK',
			'AL' => 'AL',
			'AR' => 'AR',
			'AZ' => 'AZ',
			'CA' => 'CA',
			'CO' => 'CO',
			'CT' => 'CT',
			'DE' => 'DE',
			'FL' => 'FL',
			'GA' => 'GA',
			'HI' => 'HI',
			'IA' => 'IA',
			'ID' => 'ID',
			'IL' => 'IL',
			'IN' => 'IN',
			'KS' => 'KS',
			'KY' => 'KY',
			'LA' => 'LA',
			'MA' => 'MA',
			'MD' => 'MD',
			'ME' => 'ME',
			'MI' => 'MI',
			'MN' => 'MN',
			'MO' => 'MO',
			'MS' => 'MS',
			'MT' => 'MT',
			'NC' => 'NC',
			'ND' => 'ND',
			'NE' => 'NE',
			'NH' => 'NH',
			'NJ' => 'NJ',
			'NM' => 'NM',
			'NV' => 'NV',
			'NY' => 'NY',
			'OH' => 'OH',
			'OK' => 'OK',
			'OR' => 'OR',
			'PA' => 'PA',
			'RI' => 'RI',
			'SC' => 'SC',
			'SD' => 'SD',
			'TN' => 'TN',
			'TX' => 'TX',
			'UT' => 'UT',
			'VA' => 'VA',
			'VT' => 'VT',
			'WA' => 'WA',
			'WI' => 'WI',
			'WV' => 'WV',
			'WY' => 'WY',
		);
	}
}