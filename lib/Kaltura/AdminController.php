<?php

class Kaltura_AdminController extends Kaltura_BaseController {
	public function allowedActions() {
		return array(
			'partnerLogin',
			'info',
			'register'
		);
	}

	public function execute() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Access denied' );
		}

		wp_enqueue_script( 'kaltura-admin' );
		wp_enqueue_script( 'kaltura-jquery-validate' );
		$kalturaPartnerId  = KalturaHelpers::getOption( 'kaltura_partner_id' );
		$partnerLogin      = KalturaHelpers::getRequestParam( 'partner_login' );
		$forceRegistration = KalturaHelpers::getRequestParam( 'force_registration' );
		if ( $partnerLogin == 'true' ) {
			$this->partnerLoginAction();
		} else {
			if ( ! $kalturaPartnerId || $forceRegistration ) {
				$this->registerAction();
			} else {
				$this->infoAction();
			}
		}
	}

	public function partnerLoginAction() {
		$params            = array();
		$params['success'] = false;
		$params['error']   = false;
		if ( count( $_POST ) ) {
			KalturaHelpers::verifyNonce( 'partnerLogin' );
			$email     = KalturaHelpers::getRequestPostParam( 'email' );
			$password  = KalturaHelpers::getRequestPostParam( 'password' );
			$partnerId = KalturaHelpers::getRequestPostParam( 'partner_id' );

			$kmodel = KalturaModel::getInstance();
			try {
				$partner = $kmodel->getSecrets( $partnerId, $email, $password );
			} catch ( Exception $ex ) {
				$params['error'] = $ex->getMessage();
				$this->renderView( 'admin/partner-login.php', $params );

				return;
			}

			$partnerId   = $partner->id;
			$secret      = $partner->secret;
			$adminSecret = $partner->adminSecret;
			$cmsUser     = $partner->adminEmail;

			// save partner details
			update_option( 'kaltura_partner_id', sanitize_text_field((string)$partnerId) );
			update_option( 'kaltura_secret', sanitize_text_field((string)$secret) );
			update_option( 'kaltura_admin_secret', sanitize_text_field((string)$adminSecret) );
			update_option( 'kaltura_cms_user', sanitize_text_field((string)$cmsUser) );

			$params['success'] = true;
		}
		$this->renderView( 'admin/partner-login.php', $params );
	}

	public function registerAction() {
		$params = array(
			'success' => false,
		);
		if ( count( $_POST ) ) {
			KalturaHelpers::verifyNonce( 'register' );
			if ( KalturaHelpers::getRequestPostParam( 'agree_to_terms' ) ) {
				global $wp_version;
				$partner                           = new Kaltura_Client_Type_Partner();
				$partner->name                     = KalturaHelpers::getRequestPostParam( 'company', KalturaHelpers::getRequestPostParam( 'first_name' ) . ' ' . KalturaHelpers::getRequestPostParam( 'last_name' ) );
				$partner->adminEmail               = KalturaHelpers::getRequestPostParam( 'email' );
				$partner->firstName                = KalturaHelpers::getRequestPostParam( 'first_name' );
				$partner->lastName                 = KalturaHelpers::getRequestPostParam( 'last_name' );
				$partner->website                  = KalturaHelpers::getRequestPostParam( 'website' );
				$partner->description              = KalturaHelpers::getRequestPostParam( 'description' ) . "\nWordpress all-in-one plugin|" . $wp_version;
				$partner->country                  = strlen( KalturaHelpers::getRequestPostParam( 'country' ) ) == 2 ? KalturaHelpers::getRequestPostParam( 'country' ) : null;
				$partner->state                    = strlen( KalturaHelpers::getRequestPostParam( 'state' ) ) == 2 ? KalturaHelpers::getRequestPostParam( 'state' ) : null;
				$partner->commercialUse            = Kaltura_Client_Enum_CommercialUseType::NON_COMMERCIAL_USE;
				$partner->phone                    = KalturaHelpers::getRequestPostParam( 'phone' );
				$partner->type                     = Kaltura_Client_Enum_PartnerType::WORDPRESS;
				$partner->defConversionProfileType = 'wp_default';
				$partner->additionalParams         = array();

				$keyValue                    = new Kaltura_Client_Type_KeyValue();
				$keyValue->key               = 'company';
				$keyValue->value             = KalturaHelpers::getRequestPostParam( 'company' );
				$partner->additionalParams[] = $keyValue;

				$keyValue                    = new Kaltura_Client_Type_KeyValue();
				$keyValue->key               = 'title';
				$keyValue->value             = KalturaHelpers::getRequestPostParam( 'job_title' );
				$partner->additionalParams[] = $keyValue;

				$keyValue                    = new Kaltura_Client_Type_KeyValue();
				$keyValue->key               = 'would_you_like_to_be_contacted';
				$keyValue->value             = KalturaHelpers::getRequestPostParam( 'would_you_like' );
				$partner->additionalParams[] = $keyValue;

				$keyValue                    = new Kaltura_Client_Type_KeyValue();
				$keyValue->key               = 'vertical';
				$keyValue->value             = KalturaHelpers::getRequestPostParam( 'describe_yourself' );
				$partner->additionalParams[] = $keyValue;

				$kmodel = KalturaModel::getInstance();
				$error  = null;
				try {
					$partner = $kmodel->registerPartner( $partner );
				} catch ( \Exception $ex ) {
					$error = $ex;
				}

				if ( $error ) {
					$params['error'] = $error->getMessage();
				} else {
					$partnerId    = $partner->id;
					$subPartnerId = $partnerId * 100;
					$secret       = $partner->secret;
					$adminSecret  = $partner->adminSecret;
					$cmsUser      = $partner->adminEmail;

					// save partner details
					update_option( 'kaltura_partner_id', sanitize_text_field((string)$partnerId) );
					update_option( 'kaltura_subp_id', sanitize_text_field((string)$subPartnerId) );
					update_option( 'kaltura_secret', sanitize_text_field((string)$secret) );
					update_option( 'kaltura_admin_secret', sanitize_text_field((string)$adminSecret) );
					update_option( 'kaltura_cms_user', sanitize_text_field((string)$cmsUser) );
					$params['success'] = true;
				}
			} else {
				$params['error'] = 'You must agree to the Kaltura Terms of Use';
			}

			$params['pingOk'] = true;
		} else {
			global $user_ID;
			$profileuser = get_user_to_edit( $user_ID );

			// set defaults
			$_POST['first_name'] = $profileuser->first_name;
			$_POST['last_name']  = $profileuser->last_name;
			$_POST['email']      = $profileuser->user_email;
			$_POST['company']    = get_bloginfo( 'name' );
			$_POST['website']    = get_option( 'home' );

			$config               = KalturaHelpers::getKalturaConfiguration();
			$config->partnerId    = 0; // no need to pass partner id for ping
			$config->subPartnerId = 0;
			$kalturaClient        = new KalturaWordpressClientBase( $config );
			$kmodel               = KalturaModel::getInstance();
			$params['pingOk']     = $kmodel->pingTest( $kalturaClient );
		}

		$params['countries'] = KalturaHelpers::getCountries();
		$params['states']    = KalturaHelpers::getStates();

		$this->renderView( 'admin/register.php', $params );
	}

	public function infoAction() {

		$params                = array();
		$params['error']       = null;
		$params['showMessage'] = false;
		if ( count( $_POST ) ) {
			KalturaHelpers::verifyNonce( 'info' );

			$enableVideoComments    = KalturaHelpers::getRequestPostParam( 'enable_video_comments' ) ? true : false;
			$allowAnonymousComments = KalturaHelpers::getRequestPostParam( 'allow_anonymous_comments' ) ? true : false;
			$defaultPlayerType      = KalturaHelpers::getRequestPostParam( 'default_player_type' );
			$defaultKCWType         = KalturaHelpers::getRequestPostParam( 'default_kcw_type' );
			$defaultKCWType         = ! empty( $defaultKCWType ) ? $defaultKCWType : KalturaHelpers::getOption( 'kcw_ui_conf_id_admin' );

			$commentsKCWType = KalturaHelpers::getRequestPostParam( 'comments_kcw_type' );
			$commentsKCWType = ! empty( $commentsKCWType ) ? $commentsKCWType : KalturaHelpers::getOption( 'kcw_ui_conf_comments' );

			$commentsPlayerType         = KalturaHelpers::getRequestPostParam( 'comments_player_type' );
			$userIdentifier             = KalturaHelpers::getRequestPostParam( 'kaltura_user_identifier' );
			$permalinkMetadataProfileId = KalturaHelpers::getRequestPostParam( 'permalink_metadata_profile_id' );
			$savePermalink              = KalturaHelpers::getRequestPostParam( 'save_permalink' );
			$rootCategory               = KalturaHelpers::getRequestPostParam( 'root_category' );
			$rootCategory               = ! empty( $rootCategory ) ? $rootCategory : 0;

			update_option( 'kaltura_enable_video_comments', (bool)$enableVideoComments );
			update_option( 'kaltura_allow_anonymous_comments', (bool)$allowAnonymousComments );
			update_option( 'kaltura_default_player_type', sanitize_text_field((string)$defaultPlayerType));
			update_option( 'kaltura_default_kcw_type', sanitize_text_field((string)$defaultKCWType) );
			update_option( 'kaltura_comments_kcw_type', sanitize_text_field((string)$commentsKCWType) );
			update_option( 'kaltura_comments_player_type', sanitize_text_field((string)$commentsPlayerType) );
			update_option( 'kaltura_user_identifier', sanitize_text_field((string)$userIdentifier) );
			update_option( 'kaltura_permalink_metadata_profile_id', sanitize_text_field((string)$permalinkMetadataProfileId) );
			update_option( 'kaltura_save_permalink', sanitize_text_field((string)$savePermalink) );
			update_option( 'kaltura_root_category', sanitize_text_field((string)$rootCategory) );

			$params['showMessage'] = true;
		} else {
			$kmodel = KalturaModel::getInstance();
			try {
				$kmodel->pingTest();
			} catch ( Kaltura_Client_Exception $ex ) {
				$params['error'] = $ex->getMessage() . ' - ' . $ex->getCode();
			}
		}

		$kmodel                   = KalturaModel::getInstance();
		$players                  = $kmodel->listPlayersUiConfs();
		$kcws                     = $kmodel->listKCWUiConfs();
		$metadataProfilesResponse = $kmodel->getMetadataProfilesTypeEntry();
		$categories               = $kmodel->generateRootTree();

		$params['players']                  = $players;
		$params['kcws']                     = $kcws;
		$params['categories']               = $categories;
		$params['metadataProfilesResponse'] = $metadataProfilesResponse;
		$this->renderView( 'admin/info.php', $params );
	}
}