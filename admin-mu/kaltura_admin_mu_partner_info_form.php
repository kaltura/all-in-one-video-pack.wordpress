<?php
	if (!defined("WP_ADMIN"))
		die();
		
	// try to create new session to make sure that the details are ok
	$userId 	    = KalturaHelpers::getLoggedUserID();
	$config 		= KalturaHelpers::getKalturaConfiguration();
	$secret 		= get_site_option("kaltura_secret");
	$adminSecret	= get_site_option("kaltura_admin_secret");
	$kalturaClient 	= new KalturaClient($config);

	$kmodel = KalturaModel::getInstance();

	$ks = $kmodel->getAdminSession();
	if ($kmodel->getLastError())
	{
		$error = $kmodel->getLastError();
		$viewData["error"] = $error["message"] . ' - ' . $error["code"];
	}

	$ks = $kmodel->getClientSideSession();
	if ($kmodel->getLastError())
	{
		$error = $kmodel->getLastError();
		$viewData["error"] = $error["message"] . ' - ' . $error["code"];
	}
?>


<?php if ($viewData["error"]): ?>

<div class="wrap">
	<h2><?php _e('All in One Video Pack Settings'); ?></h2>
	<br />
	<div id="message" class="updated"><p><strong><?php _e('Failed to verify partner details'); ?></strong> (<?php echo $viewData["error"]; ?>)</p></div>
	<form name="form1" method="post" />
	<p class="submit" style="text-align: left; "><input type="button" value="<?php _e('Click here to edit partner details manually'); ?>" onclick="window.location = 'options-general.php?page=interactive_video&partner_login=true';"></input></p>
	<input type="hidden" id="manual_edit" name="manual_edit" value="true" />
	</form>
</div>

<?php else: ?>
<div class="wrap">
<?php if ($viewData["showMessage"]): ?>
	<div id="message" class="updated"><p><strong><?php _e('The All in One Video Pack settings have been saved.'); ?></strong></p></div>
	<?php endif; ?>
	<h2><?php _e('All in One Video Pack Settings'); ?></h2>
	<br />
	<p>
		In this page you can configure the default settings for all blogs under the current WordPress MU installation
	</p>
	<table id="kalturaCmsLogin">
		<tr class="kalturaFirstRow">
			<th align="left"><?php _e('Partner ID'); ?>:</th>
			<td style="padding-right: 90px;"><strong><?php echo get_site_option("kaltura_partner_id"); ?></strong></td>
		</tr>
		<tr>
			<th align="left"><?php _e('KMC username'); ?>:</th>
			<td style="padding-right: 90px;"><strong><?php echo get_site_option("kaltura_cms_user"); ?></strong></td>
		</tr>
	</table>
	<a href="settings.php?page=all-in-one-video-pack-mu-settings&partner_login">Change settings</a>
</div>
<?php endif; ?>