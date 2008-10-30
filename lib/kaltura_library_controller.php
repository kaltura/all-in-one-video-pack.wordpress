<?php
	if (!defined("WP_ADMIN"))
		die();
		
	$action = @$_GET['kaction'];
	if (!get_option('kaltura_partner_id'))
	{
		?>
			<div class="kalturaTab">
				To get started, you need to get a Partner ID. <a href="options-general.php?page=interactive_video" target="_parent">Click here</a> to get one
			</div>
		<?php
	}
	else
	{
		require_once("kaltura_model.php");
		require_once("kaltura_helpers.php");
		
		if ($_GET["page"] == "interactive_video_library")
			$isLibrary = true;
		else
			$isLibrary = false;	
		
		$viewData["isLibrary"] = $isLibrary;
		switch($action)
		{
			case "delete":
				$kshowId = @$_GET['kshowid'];
				$kalturaAdminClient = getKalturaClient(true);
				$res = KalturaModel::deleteKShow($kalturaAdminClient, $kshowId);
				$redirectUrl = kalturaGenerateTabUrl(null);
				$viewData["jsCode"] = "window.location.href = '" . $redirectUrl . "';";
				$viewData["redirectUrl"] = $redirectUrl;
				require_once(dirname(__FILE__) . "/../view/view_deleted.php");
				require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
				break;
			case "sendtoeditor":
				$kshowId = @$_GET['kshowid'];
				if (!@$_POST["sendToEditorButton"])
				{
					$kalturaClient = getKalturaClient();
					$kshow = KalturaModel::getKshow($kalturaClient, $kshowId);
					$flashVars = KalturaHelpers::getTinyPlayerFlashVars($kalturaClient->getKs(), $kshowId);
					$entryId = @$kshow["showEntry"]["id"];
					$thumbnail = kalturaGetPluginUrl() . "/thumbnails/get_preview_thumbnail.php?thumbnail_url=" . @$kshow["showEntry"]["thumbnailUrl"];
					$viewData["kshow"] = $kshow;
					$viewData["entryId"] = $entryId;
					$viewData["flashVars"] = $flashVars;
					$viewData["flashVars"]["autoPlay"] = "true";
					$viewData["thumbnailPlaceHolderUrl"] = $thumbnail;
					require_once(dirname(__FILE__) . "/../view/view_send_to_editor.php");
					require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
				}
				else 
				{
					$kalturaClient = getKalturaClient(false, "edit:".$kshowId);
					
					// update the kshow name
					$kshowUpdate = new KalturaKShow();
					$kshowUpdate->name = $_POST["ktitle"];
					KalturaModel::updateKshow($kalturaClient, $kshowId, $kshowUpdate);
	
					$width = $_POST["playerWidth"];
					$type = $_POST["playerType"];
					$addPermission = $_POST["addPermission"];
					$editPermission = $_POST["editPermission"];
					
					// add widget
					$player = KalturaHelpers::getPlayerByType($type);
					$sessionUser = kalturaGetSessionUser();
					$widget = new KalturaWidget();
					$widget->kshowId = $kshowId;
					$widget->uiConfId = $player["uiConfId"];
					$result = $kalturaClient->addwidget($sessionUser, $widget);
					$widgetId = $result["result"]["widget"]["id"];
					
					$viewData["playerWidth"] = $width;
					$viewData["playerHeight"] = KalturaHelpers::calculatePlayerHeight($type, $width);
					$viewData["playerType"] = $type;
					$viewData["widgetId"] = $widgetId;
					$viewData["addPermission"] = $addPermission;
					$viewData["editPermission"] = $editPermission;
					$redirectUrl = kalturaGenerateTabUrl(array("kaction" => "browse"));
					require_once(dirname(__FILE__) . "/../view/view_send_to_editor.php");
					require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php"); 
				}
				break;
			default: // "browse"
				$kalturaAdminClient = getKalturaClient(true);
				if ($isLibrary)
					$pageSize = 20;
				else
					$pageSize = 18;
				$page = @$_GET["paged"] ? $_GET["paged"] : 1;
				$result = KalturaModel::getKshows($kalturaAdminClient, $pageSize, $page);
				$totalCount = $result["count"];

				$viewData["page"] 		= $page;
				$viewData["pageSize"] 	= $pageSize;
				$viewData["totalCount"] = $totalCount;
				$viewData["totalPages"] = ceil($totalCount / $pageSize);
				$viewData["result"] 	= $result;
				require_once(dirname(__FILE__) . "/../view/view_browse.php");
				require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
				break;
		}
	}
?>