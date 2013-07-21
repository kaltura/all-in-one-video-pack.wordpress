<?php
class Kaltura_AdminController extends Kaltura_BaseController
{
	public function execute()
	{
		if (!current_user_can('manage_options'))
			wp_die('Access denied');

		wp_enqueue_script('kaltura-admin');
		wp_enqueue_script('kaltura-jquery-validate');
		$kalturaPartnerId = KalturaHelpers::getOption('kaltura_partner_id');
		$partnerLogin = isset($_GET['partner_login']) ? $_GET['partner_login'] : null;
		$forceRegistration = isset($_GET['force_registration']) ? $_GET['force_registration'] : null;
		if ($partnerLogin == "true")
			$this->partnerLoginAction();
		else if (!$kalturaPartnerId || $forceRegistration)
			$this->registerAction();
		else
			$this->infoAction();
	}

	public function partnerLoginAction()
	{
		$params = array();
		$params['success'] = false;
		$params['error'] = false;
		if (count($_POST))
		{
			$email = KalturaHelpers::getRequestPostParam('email');
			$password = KalturaHelpers::getRequestPostParam('password');
			$partnerId = KalturaHelpers::getRequestPostParam('partner_id');

			$kmodel = KalturaModel::getInstance();
			try
			{
				$partner = $kmodel->getSecrets($partnerId, $email, $password);
			}
			catch(Exception $ex)
			{
				$params['error'] = $ex->getMessage();
				$this->renderView('admin/partner-login.php', $params);
				return;
			}

			$partnerId = $partner->id;
			$secret = $partner->secret;
			$adminSecret = $partner->adminSecret;
			$cmsUser = $partner->adminEmail;

			// save partner details
			update_option('kaltura_partner_id', $partnerId);
			update_option('kaltura_secret', $secret);
			update_option('kaltura_admin_secret', $adminSecret);
			update_option('kaltura_cms_user', $cmsUser);

			$params['success'] = true;
		}
		$this->renderView('admin/partner-login.php', $params);
	}

	public function registerAction()
	{
		if (count($_POST))
		{
			if ($_POST['agree_to_terms'])
			{
				global $wp_version;
				$partner = new Kaltura_Client_Type_Partner();
				$partner->name = ($_POST['company']) ? $_POST['company'] : $_POST['first_name'] . ' ' . $_POST['last_name'];
				$partner->adminEmail = $_POST['email'];
				$partner->firstName = $_POST['first_name'];
				$partner->lastName = $_POST['last_name'];
				$partner->website = $_POST['website'];
				$partner->description = $_POST['description'] . "\nWordpress all-in-one plugin|" . $wp_version;
				$partner->country = strlen($_POST['country']) == 2 ? $_POST['country'] : null;
				$partner->state = strlen($_POST['state']) == 2 ? $_POST['state'] : null;
				$partner->commercialUse = Kaltura_Client_Enum_CommercialUseType::NON_COMMERCIAL_USE;
				$partner->phone = $_POST['phone'];
				$partner->type = Kaltura_Client_Enum_PartnerType::WORDPRESS;
				$partner->defConversionProfileType = 'wp_default';
				$partner->additionalParams = array();

				$keyValue = new Kaltura_Client_Type_KeyValue();
				$keyValue->key = 'company';
				$keyValue->value = $_POST['company'];
				$partner->additionalParams[] = $keyValue;

				$keyValue = new Kaltura_Client_Type_KeyValue();
				$keyValue->key = 'title';
				$keyValue->value = $_POST['job_title'];
				$partner->additionalParams[] = $keyValue;

				$keyValue = new Kaltura_Client_Type_KeyValue();
				$keyValue->key = 'would_you_like_to_be_contacted';
				$keyValue->value = $_POST['would_you_like'];
				$partner->additionalParams[] = $keyValue;

				$keyValue = new Kaltura_Client_Type_KeyValue();
				$keyValue->key = 'vertical';
				$keyValue->value = $_POST['describe_yourself'];
				$partner->additionalParams[] = $keyValue;

				$kmodel = KalturaModel::getInstance();
				$error = null;
				try
				{
					$partner = $kmodel->registerPartner($partner);
				}
				catch(\Exception $ex)
				{
					$error = $ex;
				}

				if ($error)
				{
					$params['error'] = $error->getMessage();
				}
				else
				{
					$partnerId = $partner->id;
					$subPartnerId = $partnerId * 100;
					$secret = $partner->secret;
					$adminSecret = $partner->adminSecret;
					$cmsUser = $partner->adminEmail;

					// save partner details
					update_option('kaltura_partner_id', $partnerId);
					update_option('kaltura_subp_id', $subPartnerId);
					update_option('kaltura_secret', $secret);
					update_option('kaltura_admin_secret', $adminSecret);
					update_option('kaltura_cms_user', $cmsUser);
					$params['success'] = true;
				}
			}
			else
			{
				$params['error'] = 'You must agree to the Kaltura Terms of Use';
			}

			$params['pingOk'] = true;
		}
		else
		{
			global $user_ID;
			$profileuser = get_user_to_edit($user_ID);

			// set defaults
			$_POST['first_name'] = $profileuser->first_name;
			$_POST['last_name'] = $profileuser->last_name;
			$_POST['email'] = $profileuser->user_email;
			$_POST['company'] = get_bloginfo('name');
			$_POST['website'] = get_option('home');

			$config = KalturaHelpers::getKalturaConfiguration();
			$config->partnerId = 0; // no need to pass partner id for ping
			$config->subPartnerId = 0;
			$kalturaClient = new Kaltura_Client_Client($config);
			$kmodel = KalturaModel::getInstance();
			$params['pingOk'] = $kmodel->pingTest($kalturaClient);
		}

		$params['countries'] = KalturaHelpers::getCountries();
		$params['states'] = KalturaHelpers::getStates();

		$this->renderView('admin/register.php', $params);
	}

	public function infoAction()
	{
		$params = array();
		$params['error'] = null;
		$params['showMessage'] = false;
		if (count($_POST))
		{
			$enableVideoComments = KalturaHelpers::getRequestPostParam('enable_video_comments') ? true : false;
			$allowAnonymousComments = KalturaHelpers::getRequestPostParam('allow_anonymous_comments') ? true : false;
			$defaultPlayerType = KalturaHelpers::getRequestPostParam('default_player_type');
			$commentsPlayerType = KalturaHelpers::getRequestPostParam('comments_player_type');
			$userIdentifier = KalturaHelpers::getRequestPostParam('kaltura_user_identifier');
			$permalinkMetadataProfileId = KalturaHelpers::getRequestPostParam('permalink_metadata_profile_id');
			$savePermalink = KalturaHelpers::getRequestPostParam('save_permalink');

			update_option('kaltura_enable_video_comments', $enableVideoComments);
			update_option('kaltura_allow_anonymous_comments', $allowAnonymousComments);
			update_option('kaltura_default_player_type', $defaultPlayerType);
			update_option('kaltura_comments_player_type', $commentsPlayerType);
			update_option('kaltura_user_identifier', $userIdentifier);
			update_option('kaltura_permalink_metadata_profile_id', $permalinkMetadataProfileId);
			update_option('kaltura_save_permalink', $savePermalink);

			$params['showMessage'] = true;
		}
		else
		{
			$kmodel = KalturaModel::getInstance();
			try
			{
				$kmodel->pingTest();
			}
			catch(Kaltura_Client_Exception $ex)
			{
				$params['error'] = $ex->getMessage().' - '.$ex->getCode();
			}
		}

		$kmodel = KalturaModel::getInstance();
		$players = $kmodel->listPlayersUiConfs();
		$metadataProfilesResponse = $kmodel->getMetadataProfilesTypeEntry();

		$params['players'] = $players;
		$params['metadataProfilesResponse'] = $metadataProfilesResponse;
		$this->renderView('admin/info.php', $params);
	}
}