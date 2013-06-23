<?php
	if (!defined("WP_ADMIN"))
		die();
	
	$kalturaPartnerId = get_site_option('kaltura_partner_id');
	$partnerLogin = isset($_GET['partner_login']) ? true : false;
	if (!$kalturaPartnerId || $partnerLogin)
	{
		require_once('kaltura_admin_mu_login_partner_form.php');
	}
	else
	{
		require_once('kaltura_admin_mu_partner_info_form.php');
	}