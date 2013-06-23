<?php
class Kaltura_NetworkAdminController extends Kaltura_BaseController
{
	public function execute()
	{
		if (!current_user_can('manage_network_options'))
			wp_die('Access denied');

		wp_enqueue_script('kaltura-admin');
		$kalturaPartnerId = get_site_option('kaltura_partner_id');
		$partnerLogin = isset($_GET['partner_login']) ? true : false;
		if (!$kalturaPartnerId || $partnerLogin)
			$this->loginAction();
		else
			$this->infoAction();
	}

	public function loginAction()
	{
		$params['error'] = null;
		$params['success'] = false;
		if (count($_POST)) {
			$email = KalturaHelpers::getRequestPostParam('email');
			$password = KalturaHelpers::getRequestPostParam('password');
			$partnerId = KalturaHelpers::getRequestPostParam('partner_id');

			$config = KalturaHelpers::getKalturaConfiguration();
			$config->partnerId = $partnerId;
			$kmodel = KalturaModel::getInstance();
			try
			{
				$partner = $kmodel->getSecrets($partnerId, $email, $password);
			}
			catch(Exception $ex)
			{
				$params['error'] = $ex->getMessage();
			}

			if (!$params['error'])
			{
				$partnerId = $partner->id;
				$secret = $partner->secret;
				$adminSecret = $partner->adminSecret;
				$cmsUser = $partner->adminEmail;

				// save partner details
				update_site_option('kaltura_partner_id', $partnerId);
				update_site_option('kaltura_secret', $secret);
				update_site_option('kaltura_admin_secret', $adminSecret);
				update_site_option('kaltura_cms_user', $cmsUser);

				$params['success'] = true;
			}
		}
		$this->renderView('network-admin/login.php', $params);
	}

	public function infoAction()
	{
		$params['error'] = null;
		// try to create new session to make sure that the details are ok
		$kmodel = KalturaModel::getInstance();
		try
		{
			$kmodel->getAdminSessionUsingApi();
		}
		catch(Exception $ex)
		{
			$params['error'] = $ex->getMessage().' - '.$ex->getCode();
		}

		try
		{
			$kmodel->getClientSideSessionUsingApi();
		}
		catch(Exception $ex)
		{
			$params['error'] = $ex->getMessage().' - '.$ex->getCode();
		}

		$this->renderView('network-admin/info.php', $params);
	}
}