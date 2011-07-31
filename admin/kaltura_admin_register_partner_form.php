<?php
	if (!defined("WP_ADMIN"))
		die();
		
	if (@$_POST['is_postback'] == "postback")
	{
		if ($_POST['agree_to_terms'])
		{
			global $wp_version;
			$partner = new KalturaPartner();
			$partner->name = ($_POST['company']) ? $_POST['company'] : $_POST['first_name'] . ' ' . $_POST['last_name'];
			$partner->adminEmail = $_POST['email'];
			$partner->firstName = $_POST['first_name'];
			$partner->lastName = $_POST['last_name'];
			$partner->website = $_POST['website'];
			$partner->description = $_POST['description'] . "\nWordpress all-in-one plugin|" . $wp_version;
			$partner->country = strlen($_POST['country']) == 2 ? $_POST['country'] : null;
			$partner->state = strlen($_POST['state']) == 2 ? $_POST['state'] : null;
			$partner->commercialUse = KalturaCommercialUseType_NON_COMMERCIAL_USE;
			$partner->phone = $_POST['phone'];
			$partner->type = KalturaPartnerType_WORDPRESS;
			$partner->defConversionProfileType = "wp_default";
			$partner->additionalParams = array();
			
			$keyValue = new KalturaKeyValue();
			$keyValue->key = 'company';
			$keyValue->value = $_POST['company'];
			$partner->additionalParams[] = $keyValue;
			
			$keyValue = new KalturaKeyValue();
			$keyValue->key = 'title';
			$keyValue->value = $_POST['job_title'];
			$partner->additionalParams[] = $keyValue;
			
			$keyValue = new KalturaKeyValue();
			$keyValue->key = 'would_you_like_to_be_contacted';
			$keyValue->value = $_POST['would_you_like'];
			$partner->additionalParams[] = $keyValue;
			
			$keyValue = new KalturaKeyValue();
			$keyValue->key = 'vertical';
			$keyValue->value = $_POST['describe_yourself'];
			$partner->additionalParams[] = $keyValue;
	
			$kmodel = KalturaModel::getInstance();
			$partner = $kmodel->registerPartner($partner);
			
			// check for errors
			$error = $kmodel->getLastError();
			if ($error)
			{
				$viewData["error"] = $error["message"];
			}
			else
			{
				$partnerId = $partner->id;
				$subPartnerId = $partnerId * 100;
				$secret = $partner->secret;
				$adminSecret = $partner->adminSecret;
				$cmsUser = $partner->adminEmail;
				$cmsPassword = $partner->cmsPassword;
		
				// save partner details
				update_option("kaltura_partner_id", $partnerId);
				update_option("kaltura_subp_id", $subPartnerId);
				update_option("kaltura_secret", $secret);
				update_option("kaltura_admin_secret", $adminSecret);
				update_option("kaltura_cms_user", $cmsUser);
				update_option("kaltura_cms_password", $cmsPassword);
				update_option("kaltura_permissions_add", 0);
				update_option("kaltura_permissions_edit", 0);
				update_option("kaltura_enable_video_comments", true);
				update_option("kaltura_allow_anonymous_comments", true);
				$viewData["success"] = true;
			}
		}
		else
		{
			$viewData["error"] = "You must agree to the Kaltura Terms of Use";
		}
		
		$viewData["pingOk"] = true;
	}
	else
	{
		global $user_ID;
		$profileuser = get_user_to_edit($user_ID);
		
		// set defaults
		$_POST['first_name'] = $profileuser->first_name;
		$_POST['last_name'] = $profileuser->last_name;
		$_POST['email'] = $profileuser->user_email;
		$_POST['company'] = bloginfo('name');
		$_POST['website'] = form_option('home');
		
		$config = KalturaHelpers::getKalturaConfiguration();
		$config->partnerId = 0; // no need to pass partner id for ping
		$config->subPartnerId = 0;
		$kalturaClient = new KalturaClient($config);
		$kmodel = KalturaModel::getInstance();
		$viewData["pingOk"] = $kmodel->pingTest($kalturaClient);
	}
	
	$countries = array(
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
		'MV' => 'Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ)',
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
	
	$states = array(
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
?>


<?php if (!$viewData["pingOk"]): ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Installation'); ?></h2>
		<br />
		<div class="error">
			<p>
				<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry installation.</strong>
			</p>
		</div>
	</div>
<?php elseif (@$viewData["success"] === true): ?>
	<div class="wrap">
		<h2><?php _e('Congratulations!'); ?></h2>
		<br />
		<div class="updated fade">
			<p>
				<strong>You have successfully installed the All in One Video Pack. </strong>
			</p>
		</div>
		<p>
			Next time you write a post, you will see a new icon in the Add Media toolbar that allows you to upload and edit Interactive Videos. <br />
			<br />
			Note that a Kaltura Partner ID has been created for you, and an email has been sent to the specified email address containing the ID information. The email you received also includes a link and a password to the Kaltura Management Console (KMC), where you can track and manage all information related to the All in One Video Pack.<br />
		</p>
		<br />
		<div class="wrap">
			<a href="#" onclick="window.location.href = 'options-general.php?page=interactive_video'"><?php _e('Continue...'); ?></a>
		</div>
	</div>
<?php else: ?>
	<div class="wrap">
		<h2><?php _e('All in One Video Pack Installation'); ?></h2>
		<?php if (isset($viewData["error"])): ?>
		<br />
		<div class="error">
			<p>
				<strong><?php echo $viewData["error"]; ?></strong>
			</p>
		</div>
		<?php endif; ?>
		<p>
			<a href="options-general.php?page=interactive_video&partner_login=true">Click here if you already have a Partner ID</a>
		</p>
		<p>
			Once you complete the form below and click "Complete installation", the All in One Video Pack will be fully installed and ready to use. 
		</p>
		<h3><?php _e("Get a Partner ID"); ?></h3>
		<form name="form1" method="post" class="registration" />
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e("First Name"); ?>: *</th>
					<td><input type="text" id="first_name" name="first_name" value="<?php echo @$_POST['first_name']; ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e("Last Name"); ?>: *</th>
					<td><input type="text" id="last_name" name="last_name" value="<?php echo @$_POST['last_name']; ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e("Email"); ?>: *</th>
					<td><input type="text" id="email" name="email" value="<?php echo @$_POST['email']; ?>" size="50" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e("Phone"); ?>: *</th>
					<td><input type="text" id="phone" name="phone" value="<?php echo @$_POST['phone']; ?>" size="30" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e("Company"); ?>: *</th>
					<td><input type="text" id="company" name="company" value="<?php echo @$_POST['company']; ?>" size="30" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e("Website"); ?>:</th>
					<td><input type="text" id="website" name="website" value="<?php echo @$_POST['website']; ?>" size="50" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e("Job Title"); ?>: *</th>
					<td><input type="text" id="job_title" name="job_title" value="<?php echo @$_POST['job_title']; ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row">Describe yourself: *</th>
					<td>
						<select id="describe_yourself" name="describe_yourself">
							<option value="">Please select...</option>
							<?php 
								$selectData = array(
									'Enterprise / Small Business / Government Agency' => 'Enterprise',
									'Education Organization' => 'Education',
									'Media Company / Agency' => 'Media',
									'CDN / ISP / Integrator / Hosting Provider' => 'Service Provider',
									'Other' => 'Other',
								);
							?>
							<?php foreach($selectData as $name => $value): ?>
								<option value="<?php echo $value; ?>" <?php echo (@$_POST['describe_yourself'] == $value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Country: *</th>
					<td>
						<select id="country" name="country">
							<option value="">Please select...</option>
						<?php foreach($countries as $value => $name): ?>
							<option value="<?php echo $value; ?>" <?php echo (@$_POST['country'] == $value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">State/Province: *</th>
					<td>
						<select id="state" name="state">
						<?php $statesNew = array(); ?>
						<?php $statesNew[''] = ''; ?> 
						<?php $states = array_merge($statesNew, $states); ?> 
						<?php foreach($states as $value => $name): ?>
							<option value="<?php echo $value; ?>" <?php echo (@$_POST['state'] == $value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Would you like a Kaltura Video Expert <br />to contact you? *</th>
					<td>
						<?php 
							$selectData = array(
								'' => 'Please select...',
								'1' => 'Yes',
								'0' => 'Not right now',
							);
						?>
						<select id="would_you_like" name="would_you_like">
						<?php foreach($selectData as $value => $name): ?>
							<option value="<?php echo $value; ?>" <?php echo (@$_POST['would_you_like'] == (string)$value) ? ' selected="selected"' : ''; ?>><?php echo $name; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">How do you plan to use Kaltura's video platform?</th>
					<td>
						<textarea id="description" name="description"><?php echo(@$_POST['description']) ?></textarea>
					</td>
				</tr>
				<tr class="agree_to_terms">
					<th colspan="2">
						<input type="checkbox" name="agree_to_terms" id="agree_to_terms" value="1" <?php echo ($_POST['agree_to_terms'] == '1') ? ' checked="checked"' : ''; ?> /> 
						<label for="agree_to_terms">I Accept </label><a href="http://corp.kaltura.com/tandc" target="_blank">Terms of Use</a> *
					</th>
				</tr>
				<tr>
					<th colspan="2">* Required fields</th>
				</tr>
			</table>
			
			<p class="submit" style="text-align: left; "><input type="submit" name="Submit" value="<?php _e('Complete installation') ?>" /></p>
						
			<input type="hidden" name="is_postback" value="postback" />
		</form>
	</div>
<?php endif; ?>
