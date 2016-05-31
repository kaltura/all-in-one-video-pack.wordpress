<?php

class Kaltura_AdminController extends Kaltura_BaseController {
	public function allowedActions() {
		return array(
			'partnerlogin',
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
			$this->partnerloginAction();
		} else {
			if ( ! $kalturaPartnerId || $forceRegistration ) {
				$this->registerAction();
			} else {
				$this->infoAction();
			}
		}
	}

	public function partnerloginAction() {
		$params            = array();
		$params['success'] = false;
		$params['error']   = false;
		if ( count( $_POST ) ) {
			if ( !wp_verify_nonce( isset( $_POST['_kalturanonce'] ) ? $_POST['_kalturanonce'] : null, 'partnerlogin' )) {
				print 'Sorry, your nonce did not verify.';
				exit;
			}
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
			if ( !wp_verify_nonce( isset( $_POST['_kalturanonce'] ) ? $_POST['_kalturanonce'] : null, 'register' )) {
				print 'Sorry, your nonce did not verify.';
				exit;
			}
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
			$_POST['website']    = home_url();

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
		$kmodel                = KalturaModel::getInstance();
		$players               = $kmodel->listPlayersUiConfs();
		$players               = $players->objects;
		if ( count( $_POST ) ) {
			if ( !wp_verify_nonce( isset( $_POST['_kalturanonce'] ) ? $_POST['_kalturanonce'] : null, 'info' )) {
				print 'Sorry, your nonce did not verify.';
				exit;
			}

			$defaultPlayerType          = KalturaHelpers::getRequestPostParam( 'default_player_type' );
			$defaultKCWType             = KalturaHelpers::getRequestPostParam( 'default_kcw_type' );
			$defaultKCWType             = ! empty( $defaultKCWType ) ? $defaultKCWType : KalturaHelpers::getOption( 'kcw_ui_conf_id_admin' );
			$userIdentifier             = KalturaHelpers::getRequestPostParam( 'kaltura_user_identifier' );
			$showMediaFrom              = KalturaHelpers::getRequestPostParam( 'show_media_from' );
			$rootCategory               = KalturaHelpers::getRequestPostParam( 'root_category' );
			$rootCategory               = ! empty( $rootCategory ) ? $rootCategory : 0;
			$allowedPlayers             = KalturaHelpers::getRequestPostParam( 'allowed_players' );
			$allowedPlayers             = ! empty( $allowedPlayers ) && is_array($allowedPlayers) ? $allowedPlayers : array();
			$enableKcw                  = KalturaHelpers::getRequestPostParam( 'enable_kcw' );

			update_option( 'kaltura_default_player_type', sanitize_text_field((string)$defaultPlayerType));
			update_option( 'kaltura_show_media_from', sanitize_text_field((string)$showMediaFrom));
			update_option( 'kaltura_default_kcw_type', sanitize_text_field((string)$defaultKCWType) );
			update_option( 'kaltura_user_identifier', sanitize_text_field((string)$userIdentifier) );
			update_option( 'kaltura_root_category', sanitize_text_field((string)$rootCategory) );
			update_option( 'kaltura_enable_kcw', (bool)$enableKcw);

			// only set allowed players when it was provided and when not all players were selected
			if ( count( $allowedPlayers ) > 0 && count( $allowedPlayers ) < count( $players ) ) {
				update_option( 'kaltura_allowed_players', array_values( $allowedPlayers ) );
			} else {
				// otherwise, we reset to empty array to allow all players
				update_option( 'kaltura_allowed_players', array() );
			}
			$params['showMessage'] = true;
		} else {
			$kmodel = KalturaModel::getInstance();
			try {
				$kmodel->pingTest();
			} catch ( Kaltura_Client_Exception $ex ) {
				$params['error'] = $ex->getMessage() . ' - ' . $ex->getCode();
			}
		}

		$allowedPlayers           = KalturaHelpers::getAllowedPlayers();
		$categories               = $kmodel->generateRootTree();

		$params['players']                  = $players;
		$params['categories']               = $categories;
		$params['allowedPlayers']           = $allowedPlayers;
		$this->renderView( 'admin/info.php', $params );
	}
}
