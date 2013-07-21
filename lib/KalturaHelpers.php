<?php
class KalturaHelpers
{
	private static $_settings = null;

	public static function getKalturaConfiguration()
	{
		$config = new Kaltura_Client_Configuration(KalturaHelpers::getOption("kaltura_partner_id"));
		$config->serviceUrl = KalturaHelpers::getServerUrl();
		return $config;
	}

	public static function getServerUrl()
	{
		$url = KalturaHelpers::getOption('server_url');

		// remove the last slash from the url
		if (substr($url, strlen($url) - 1, 1) == '/')
			$url = substr($url, 0, strlen($url) - 1);

		return $url;
	}

	public static function getCdnUrl()
	{
		$url = KalturaHelpers::getOption('cdn_url');

		// remove the last slash from the url
		if (substr($url, strlen($url) - 1, 1) == '/')
			$url = substr($url, 0, strlen($url) - 1);

		return $url;
	}

	public static function getLoggedUserId()
	{
		global $user_ID, $user_login;
		if (!$user_ID && !$user_login)
			return KalturaHelpers::getOption('anonymous_user_id');
		elseif (get_option('kaltura_user_identifier', 'user_login') == 'user_id')
			return $user_ID;
		else
			return $user_login;
	}

	public static function getPluginUrl()
	{
		return self::pluginUrl('');
	}

	public static function getPluginVersion()
	{
		$pluginFileData = file_get_contents(KALTURA_PLUGIN_FILE);
		if (preg_match("|Version:(.*)|i", $pluginFileData, $version))
			$version = trim($version[1]);
		else
			$version = '';

		return $version;
	}

	public static function generateTabUrl($params)
	{
		$query = $_SERVER["REQUEST_URI"];
		foreach ($_GET as $k => $v)
			$query = add_query_arg($k, false, $query);

		$query = add_query_arg($params, $query);
		return $query;
	}

	public static function getRequestUrl()
	{
		return $_SERVER["REQUEST_URI"];
	}

	public static function getRequestPostParam($param, $default = null)
	{
		return isset($_POST[$param]) ? $_POST[$param] : $default;
	}

	public static function getRequestParam($param, $default = null)
	{
		return isset($_GET[$param]) ? $_GET[$param] : $default;
	}

	public static function protectView($view)
	{
		if (!isset($view->allowViewRendering) || $view->allowViewRendering !== true)
			wp_die('Access denied');
	}

	public static function getContributionWizardFlashVars($ks, $entryId = null)
	{
		$flashVars                  = array();
		$flashVars["userId"]        = KalturaHelpers::getLoggedUserId();
		$flashVars["sessionId"]     = $ks;
		$flashVars["partnerId"]     = KalturaHelpers::getOption("kaltura_partner_id");
		$flashVars["subPartnerId"]  = KalturaHelpers::getOption("kaltura_partner_id") * 100;
		$flashVars["afterAddentry"] = "onContributionWizardAfterAddEntry";
		$flashVars["close"]         = "onContributionWizardClose";
		$flashVars["termsOfUse"]    = "http://corp.kaltura.com/static/tandc";

		return $flashVars;
	}

	public static function getKalturaPlayerFlashVars($uiConfId = null, $ks = null, $entryId = null)
	{
		$flashVars              = array();
		$flashVars["partnerId"] = KalturaHelpers::getOption("kaltura_partner_id");
		$flashVars["subpId"]    = KalturaHelpers::getOption("kaltura_partner_id") * 100;
		$flashVars["uid"]       = KalturaHelpers::getLoggedUserId();

		if ($ks)
			$flashVars["ks"] = $ks;
		if ($uiConfId)
			$flashVars["uiConfId"] = $ks;
		if ($entryId)
			$flashVars["entryId"] = $entryId;

		return $flashVars;
	}

	public static function flashVarsToString($flashVars = array())
	{
		$flashVarsStr = "";
		foreach ($flashVars as $key => $value)
		{
			$flashVarsStr .= ($key . "=" . $value . "&");
		}
		return substr($flashVarsStr, 0, strlen($flashVarsStr) - 1);
	}

	public static function getSwfUrlForWidget($widgetId = null, $uiConfId = null)
	{
		if (!$widgetId)
			$widgetId = "_" . KalturaHelpers::getOption("kaltura_partner_id");

		$url = KalturaHelpers::getServerUrl() . "/index.php/kwidget/wid/" . $widgetId;
		if ($uiConfId)
			$url .= ("/ui_conf_id/" . $uiConfId);

		return $url;
	}

	public static function enqueueHtml5Lib($uiConfId)
	{
		$html5LibUrl = ''.
			self::getServerUrl().
			'/p/'.KalturaHelpers::getOption("kaltura_partner_id").
			'/sp/'.KalturaHelpers::getOption("kaltura_partner_id").'00'.
			'/embedIframeJs'.
			'/uiconf_id/'.$uiConfId.
			'/partner_id/'.KalturaHelpers::getOption("kaltura_partner_id");
		wp_register_script('kaltura-html5lib-'.$uiConfId, $html5LibUrl);
		wp_enqueue_script('kaltura-html5lib-'.$uiConfId);
	}

	public static function getContributionWizardUrl($uiConfId)
	{
		return KalturaHelpers::getServerUrl() . "/kcw/ui_conf_id/" . $uiConfId;
	}

	public static function anonymousCommentsAllowed()
	{
		return KalturaHelpers::getOption("kaltura_allow_anonymous_comments", true) == true ? true : false;
	}

	public static function videoCommentsEnabled()
	{
		return KalturaHelpers::getOption("kaltura_enable_video_comments", true) == true ? true : false;
	}

	public static function getThumbnailUrl($widgetId = null, $entryId = null, $width = 240, $height = 180, $version = 100000)
	{
		$config = KalturaHelpers::getKalturaConfiguration();
		$url    = KalturaHelpers::getCdnUrl();
		$url .= "/p/" . KalturaHelpers::getOption("kaltura_partner_id");
		$url .= "/sp/" . KalturaHelpers::getOption("kaltura_partner_id") * 100;
		$url .= "/thumbnail";
		if ($widgetId)
			$url .= "/widget_id/" . $widgetId;
		if ($entryId)
			$url .= "/entry_id/" . $entryId;
		$url .= "/width/" . $width;
		$url .= "/height/" . $height;
		$url .= "/type/2";
		$url .= "/bgcolor/000000";
		if ($version !== null)
			$url .= "/version/" . $version;
		return $url;
	}

	public static function getCommentPlaceholderThumbnailUrl($widgetId = null, $entryId = null, $width = 240, $height = 180, $version = 100000)
	{
		$url = KalturaHelpers::getThumbnailUrl($widgetId, $entryId, $width, $height, $version);
		$url .= "/crop_provider/wordpress_comment_placeholder";
		return $url;
	}

	public static function compareWPVersion($compareVersion, $operator)
	{
		global $wp_version;

		return version_compare($wp_version, $compareVersion, $operator);
	}

	public static function compareKalturaVersion($compareVersion, $operator)
	{
		$kversion = self::getPluginVersion();

		return version_compare($kversion, $compareVersion, $operator);
	}

	public static function addWPVersionJS()
	{
		global $wp_version;
		echo("<script type='text/javascript'>\n");
		echo('var Kaltura_WPVersion = "' . $wp_version . '";' . "\n");
		echo("</script>\n");
	}

	public static function calculatePlayerHeight($uiConfId, $width, $playerRatio = '4:3')
	{
		$kmodel = KalturaModel::getInstance();
		$player = $kmodel->getPlayerUiConf($uiConfId);

		$spacer = $player->height - ($player->width / 4) * 3; // assume the width and height saved in kaltura is 4/3
		if ($playerRatio == '16:9')
			$height = ($width / 16) * 9 + $spacer;
		else
			$height = ($width / 4) * 3 + $spacer;

		return (int)$height;
	}

	public static function runKalturaShortcode($content, $callback)
	{
		global $shortcode_tags;

		// we will backup the shortcode array, and run only our shortcode
		$shortcode_tags_backup = $shortcode_tags;

		add_shortcode('kaltura-widget', $callback);

		$content = do_shortcode($content);

		// now we can restore the original shortcode list
		$shortcode_tags = $shortcode_tags_backup;
	}

	public static function dieWithConnectionErrorMsg($errorDesc = '')
	{
		echo '
		<div class="error">
			<p>
				<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry.</strong> (' . $errorDesc . ')
			</p>
		</div>';
		die();
	}

	public static function getCloseLinkForModals()
	{
		return '<a href="#" onclick="((window.opener) ? window.opener : (window.parent) ? window.parent : window.top).KalturaModal.closeModal();">' . __('Close') . '</a>';
	}

	/**
	 * sometimes wordpress thinks our url is a permalink and sets 404 header, calling this function will force back to 200
	 */
	public static function force200Header()
	{
		status_header(200);
	}

	public static function getOption($name, $default = null)
	{
		$value = get_option($name, $default);
		if (!is_null($value))
			return $value;

		$value = get_site_option($name, $default);
		if (!is_null($value))
			return $value;

		if (is_null(self::$_settings))
			self::$_settings = parse_ini_file(dirname(__FILE__).'/../settings.ini');
		$settings = self::$_settings;

		if (isset($settings[$name]))
			return $settings[$name];
		else
			return $default;
	}

	public static function pluginUrl($uri = '')
	{
		// In addition to providing the produced url, also provide the $uri
		return apply_filters('all_in_one_video_pack_plugin_url', plugins_url($uri, KALTURA_PLUGIN_FILE), $uri);
	}

	public static function jsUrl($uri = '')
	{
		$version = self::getPluginVersion();
		return self::pluginUrl($uri.'?kversion='.$version);
	}

	public static function cssUrl($uri = '')
	{
		$version = self::getPluginVersion();
		return self::pluginUrl($uri.'?kversion='.$version);
	}

	public static function getEmbedOptions($params)
	{
		// make sure that all keys exists in the array so we won't need to check with isset() for every array access
		$arrayKeys = array('size', 'width', 'height', 'uiconfid', 'align', 'wid', 'entryid', 'style');
		foreach($arrayKeys as $key)
		{
			if (!isset($params[$key]))
				$params[$key] = null;
		}

		if ($params['size'] == 'comments') // comments player
		{
			$type = KalturaHelpers::getOption('kaltura_comments_player_type');
			$params['uiconfid'] = $type;
			$params['width'] = 250;
			$params['height'] = 244;
		}
		else
		{
			// backward compatibility
			switch($params['size'])
			{
				case 'large':
					$params['width'] = 410;
					$params['height'] = 364;
					break;
				case 'small':
					$params['width'] = 250;
					$params['height'] = 244;
					break;
			}

			// if width is missing set some default
			if (!$params['width'])
				$params['width'] = 400;

			// if height is missing, recalculate it
			if (!$params['height'])
			{
				$params['height'] = KalturaHelpers::calculatePlayerHeight($params['uiconfid'], $params['width']);
			}
		}

		// align
		switch ($params['align'])
		{
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

		if ($_SERVER['SERVER_PORT'] == 443)
			$protocol = 'https://';
		else
			$protocol = 'http://';

		$flashVarsStr = '';

		return array(
			'flashVars' => $flashVarsStr,
			'height' => $params['height'],
			'width' => $params['width'],
			'align' => $align,
			'style' => $params['style'],
			'wid' => $params['wid'],
			'entryId' => $params['entryid'],
			'uiconfid'=> $params['uiconfid'],
		);
	}

	public static function getCountries()
	{
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
			'ZW' => 'Zimbabwe'
		);
	}

	public static function getStates()
	{
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