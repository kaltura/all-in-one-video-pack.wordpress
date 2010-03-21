<?php
if (!defined("WP_ADMIN"))
	die();

$kaction = @$_GET['kaction'];
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
	require_once("kaltura_wp_model.php");
	
	switch($kaction)
	{
		case "delete":
			kaltura_library_delete();
			break;
		case "sendtoeditor":
			kaltura_library_sendtoeditor();
			break;
		case "videoposts":
			kaltura_library_videoposts();
			break;
		case "entries":
			kaltura_library_entries();
			break;
		case "mixes":
			kaltura_library_mixes();
			break;
		case "upload":
			kaltura_library_upload();
			break;
		case "choosevideos":
			kaltura_library_choosevideos();
			break;
		default: 
			kaltura_library_browse(); 
			break;
	}
}

function kaltura_library_upload()
{
	$kmodel = KalturaModel::getInstance();
	$ks = $kmodel->getClientSideSession();
	if (!$ks)
	{
		KalturaHelpers::dieWithConnectionErrorMsg();
	}
	$viewData["flashVars"] 	= KalturaHelpers::getContributionWizardFlashVars($ks);
	$viewData["flashVars"]["showCloseButton"] 	= "false";
	$viewData["swfUrl"]		= KalturaHelpers::getContributionWizardUrl(KALTURA_KCW_UICONF_ADMIN);
	require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
	require_once(dirname(__FILE__) . "/../view/view_contribution_wizard_admin.php");
}

function kaltura_library_delete()
{
	$entryId = @$_GET['entryid'];
	$kmodel = KalturaModel::getInstance();
	$res = $kmodel->deleteEntry($entryId);
	if (isset($_GET['nextUrl']))
		$redirectUrl = $_GET['nextUrl'];
	else
		$redirectUrl = KalturaHelpers::generateTabUrl(array("page" => "interactive_video_library"));
	$viewData["jsCode"] = "window.location.href = '" . $redirectUrl . "';";
	$viewData["redirectUrl"] = $redirectUrl;
	require_once(dirname(__FILE__) . "/../view/view_deleted.php");
	require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
}

function kaltura_library_sendtoeditor()
{
	$entryIds = (isset($_GET['entryIds'])) ? $_GET['entryIds'] : array();
	$entryId = null;
	if (is_array($entryIds) && count($entryIds) > 0)
		$entryId = $entryIds[0];
		
	if (is_null($entryId))
		wp_die("No entry specified");
		
	if (!@$_POST["sendToEditorButton"])
	{
		$kmodel = KalturaModel::getInstance();
		
		$entry = $kmodel->getEntry($entryId);
		$clientSideSession = $kmodel->getClientSideSession();
		$flashVars = KalturaHelpers::getKalturaPlayerFlashVars(null, $clientSideSession, $entryId);
		$thumbnail = KalturaHelpers::getPluginUrl() . "/thumbnails/get_preview_thumbnail.php?thumbnail_url=" . $entry->thumbnailUrl;
		$viewData["entry"] = $entry;
		$viewData["entryId"] = $entryId;
		$viewData["nextEntryIds"] = $entryIds;
		$viewData["flashVars"] = $flashVars;
		$viewData["flashVars"]["autoPlay"] = "true";
		$viewData["thumbnailPlaceHolderUrl"] = $thumbnail;
		require_once(dirname(__FILE__) . "/../view/view_send_to_editor.php");
		require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
	}
	else 
	{
		// update the entry name
		$kmodel = KalturaModel::getInstance();
		
		$baseEntry = new KalturaBaseEntry();
		$baseEntry->name = $_POST["ktitle"];
		$kmodel->updateBaseEntry($entryId, $baseEntry);

		array_shift($entryIds); // done with 1 entry, maybe we have more
		$width = $_POST["playerWidth"];
		$uiConfId = $_POST["uiConfId"];
		$addPermission = $_POST["addPermission"];
		$editPermission = $_POST["editPermission"];
		$playerRatio = $_POST["playerRatio"];
		
		$viewData["entryId"] = $entryId;
		$viewData["nextEntryIds"] = $entryIds;
		$viewData["playerWidth"] = $width;
		$viewData["playerHeight"] = KalturaHelpers::calculatePlayerHeight($uiConfId, $width, $playerRatio);
		$viewData["uiConfId"] = $uiConfId;
		$viewData["addPermission"] = $addPermission;
		$viewData["editPermission"] = $editPermission;
		$redirectUrl = KalturaHelpers::generateTabUrl(array("kaction" => "browse"));
		require_once(dirname(__FILE__) . "/../view/view_send_to_editor.php");
		require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php"); 
	}
}

function kaltura_library_videoposts() 
{
	if (KalturaHelpers::compareWPVersion('2.7', '<'))
		$page = "edit.php";
	else
		$page = "upload.php";
	$kmodel = KalturaModel::getInstance();
	$screen = (isset($_GET["screen"]) ? (int)$_GET["screen"] : 1);
	if ($screen == 3)
	{
		$entries = $_POST["entries"];
		$createdPosts = 0;
		$uiConfId = $_POST["uiconf_id"];
		$width = $_POST["width"];
		$height = $_POST["height"];
		foreach($entries as $entryCat)
		{
			$arr = unserialize(base64_decode($entryCat));
			$entryId = $arr[0];
			$entryName = $arr[1];
			$categoryName = $arr[2];
			
			// do we need to create new category?
			if (!KalturaWPModel::isCategoryExists($categoryName))
			{
				$newCat = array("cat_name" => $categoryName);
				wp_insert_category($newCat);
				wp_cache_set('last_changed', microtime(true), 'terms'); // otherwise the category won't return when retrieving it later in the code
			}
			
			$category = KalturaWPModel::getCategoryByName($categoryName);
			
			$post = KalturaWPModel::getPostByTitle($entryName);
			if (!$post)
			{
				// create the post for the video
				$partnerId = get_option("kaltura_partner_id");
				$shortCode = "[kaltura-widget uiconfid=\"$uiConfId\" entryid=\"$entryId\" width=\"$width\" height=\"$height\" /]";
				$newPost = array(
					"post_title" => $entryName,
					"post_content" => $shortCode,
				);
				$postId = wp_insert_post($newPost);
				if ($postId)
					$createdPosts++;
			}
			else
			{
				$postId = $post->ID;
			}
			// link the post to the category
			$categories = wp_get_post_categories($postId);
			$categories[] =  $category->cat_ID;
			wp_set_post_categories($postId, $categories);
		}
		$viewData["numOfCreatedPosts"] = $createdPosts;
		require_once(dirname(__FILE__) . "/../view/view_video_posts_screen_3.php");
	}
	elseif ($screen == 2)
	{
		$categories = array();
		$hasEntries = false;
		$_POST["categories"] = isset($_POST["categories"]) && is_array($_POST["categories"]) ? $_POST["categories"] : array();
		foreach($_POST["categories"] as $category)
		{
			$entries = $kmodel->listAllEntriesByCategory($category);
			
			// remove the entries that have posts
			$newEntries = array();
			for($i = 0; $i < count($entries); $i++)
			{
				$entry = $entries[$i];
				if (!KalturaWPModel::getPostByTitle($entry->name))
				{
					$hasEntries = true;
					$newEntries[] = $entry;
				}
			} 
			$categories[$category] = $newEntries;
		}
		
		$viewData["uiConfs"] = $kmodel->listPlayersUiConfs();;
		$viewData["categories"] = $categories;
		$viewData["hasEntries"] = $hasEntries;
		require_once(dirname(__FILE__) . "/../view/view_video_posts_screen_2.php");
	}
	else
	{
		$categories = $kmodel->listCategoriesOrderByName();
		$viewData["categories"] = $categories->objects;
		$viewData["wpCategories"] = get_categories('get=all');
		require_once(dirname(__FILE__) . "/../view/view_video_posts_screen_1.php");
	}
}

function kaltura_library_browse() 
{
	$kmodel = KalturaModel::getInstance();
	$pageSize = 18;
	$page = @$_GET["paged"] ? $_GET["paged"] : 1;
	$result = $kmodel->listEntries($pageSize, $page);
	$error = $kmodel->getLastError();
	if ($error)
		KalturaHelpers::dieWithConnectionErrorMsg($error["message"]);
		
	$totalCount = $result->totalCount;
	$viewData["page"] 		= $page;
	$viewData["pageSize"] 	= $pageSize;
	$viewData["totalCount"] = $totalCount;
	$viewData["totalPages"] = ceil($totalCount / $pageSize);
	$viewData["result"] 	= $result;
	require_once(dirname(__FILE__) . "/../view/view_browse.php");
	require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
}

function kaltura_library_mixes() 
{
	$viewData["isLibrary"] = true;
	$kmodel = KalturaModel::getInstance();
	$pageSize = 20;
	
	$page = @$_GET["paged"] ? $_GET["paged"] : 1;
	$result = $kmodel->listMixEntries($pageSize, $page);
	$error = $kmodel->getLastError();
	if ($error)
		KalturaHelpers::dieWithConnectionErrorMsg($error["message"]);
		
	$viewData["page"] 		= $page;
	$viewData["pageSize"] 	= $pageSize;
	$viewData["totalCount"] = $result->totalCount;
	$viewData["totalPages"] = ceil($result->totalCount / $pageSize);
	$viewData["result"] 	= $result;
	require_once(dirname(__FILE__) . "/../view/view_browse.php");
	require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
}

function kaltura_library_entries() 
{
	$viewData["isLibrary"] = true;
	$kmodel = KalturaModel::getInstance();
	$pageSize = 20;
	
	$page = @$_GET["paged"] ? $_GET["paged"] : 1;
	$result = $kmodel->listMediaEntries($pageSize, $page);
	$error = $kmodel->getLastError();
	if ($error)
		KalturaHelpers::dieWithConnectionErrorMsg($error["message"]);
		
	$viewData["page"] 		= $page;
	$viewData["pageSize"] 	= $pageSize;
	$viewData["totalCount"] = $result->totalCount;
	$viewData["totalPages"] = ceil($result->totalCount / $pageSize);
	$viewData["result"] 	= $result;
	require_once(dirname(__FILE__) . "/../view/view_browse.php");
	require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
}

function kaltura_library_choosevideos()
{
	$entryIds = (isset($_GET["entryIds"])) ? $_GET["entryIds"] : array();
	$kmodel = KalturaModel::getInstance();
	$entries = $kmodel->getEntriesByIds($entryIds);
	$viewData["entries"] = $entries;
	require_once(dirname(__FILE__) . "/../view/view_choose_videos.php");
	require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
}
?>