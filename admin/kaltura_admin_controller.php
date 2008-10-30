<?php
	if (!defined("WP_ADMIN"))
		die();
	
	$kalturaPartnerId = get_option('kaltura_partner_id');
	$partnerLogin = @$_GET['partner_login'];
	if ($partnerLogin == "true")
	{
		require_once('kaltura_admin_login_partner_form.php');
	}
	else if (!$kalturaPartnerId)
	{
		require_once('kaltura_admin_register_partner_form.php');
	}
	else
	{
		require_once('kaltura_admin_partner_info_form.php');
	}
?>