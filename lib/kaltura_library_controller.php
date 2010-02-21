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
		require_once("kaltura_wp_model.php");
		
		if ($_GET["page"] == "interactive_video_library")
			$isLibrary = true;
		else
			$isLibrary = false;	
		
		$viewData["isLibrary"] = $isLibrary;
		switch($action)
		{
			case "delete":
				$entryId = @$_GET['entryid'];
				$kmodel = KalturaModel::getInstance();
				$res = $kmodel->deleteEntry($entryId);
				$redirectUrl = KalturaHelpers::generateTabUrl(null);
				$viewData["jsCode"] = "window.location.href = '" . $redirectUrl . "';";
				$viewData["redirectUrl"] = $redirectUrl;
				require_once(dirname(__FILE__) . "/../view/view_deleted.php");
				require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php");
				break;
			case "sendtoeditor":
				$entryId = @$_GET['entryid'];
				if (!@$_POST["sendToEditorButton"])
				{
					$kmodel = KalturaModel::getInstance();
					$entry = $kmodel->getEntry($entryId);
					$clientSideSession = $kmodel->getClientSideSession();
					$flashVars = KalturaHelpers::getKalturaPlayerFlashVars(null, $clientSideSession, $entryId);
					$entryId = @$kshow["showEntry"]["id"];
					$thumbnail = KalturaHelpers::getPluginUrl() . "/thumbnails/get_preview_thumbnail.php?thumbnail_url=" . $entry->thumbnailUrl;
					$viewData["entry"] = $entry;
					$viewData["entryId"] = $entryId;
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
					
					$entry = $kmodel->getEntry($entryId);
					
					if ($entry->type == KalturaEntryType_MEDIA_CLIP)
					{
    					$mediaEntry = new KalturaMediaEntry();
    					$mediaEntry->name = $_POST["ktitle"];
    					$kmodel->updateMediaEntry($entryId, $mediaEntry);
					}
					else if ($entry->type == KalturaEntryType_MIX)
					{
					    $mixEntry = new KalturaMixEntry();
    					$mixEntry->name = $_POST["ktitle"];
    					$kmodel->updateMixEntry($entryId, $mixEntry);
					}
	
					$width = $_POST["playerWidth"];
					$type = $_POST["playerType"];
					$addPermission = $_POST["addPermission"];
					$editPermission = $_POST["editPermission"];
					$playerRatio = $_POST["playerRatio"];
					
					// get player info by its type 
					$player = KalturaHelpers::getPlayerByType($type);
					
					// add widget
					$widget = $kmodel->addWidget($entryId, $player["uiConfId"]);
					
					$viewData["playerWidth"] = $width;
					$viewData["playerHeight"] = KalturaHelpers::calculatePlayerHeight($type, $width, $playerRatio);
					$viewData["playerType"] = $type;
					$viewData["widgetId"] = $widget->id;
					$viewData["addPermission"] = $addPermission;
					$viewData["editPermission"] = $editPermission;
					$redirectUrl = KalturaHelpers::generateTabUrl(array("kaction" => "browse"));
					require_once(dirname(__FILE__) . "/../view/view_send_to_editor.php");
					require_once(dirname(__FILE__) . "/../view/view_js_for_tabs.php"); 
				}
				break;
			default: // browse library & video posts 
				if (isset($_GET["tab"]) && $_GET["tab"] == "video-posts")
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
								$shortCode = "[kaltura-widget wid=\"_$partnerId\" uiConfId=\"$uiConfId\" entryId=\"$entryId\" width=\"$width\" height=\"$height\" /]";
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
						
						$viewData["uiConfs"] = $kmodel->listUiConfs();
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
				else
				{
					$kmodel = KalturaModel::getInstance();
	
					if ($isLibrary)
						$pageSize = 20;
					else
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
				break;
		}
	}
?>