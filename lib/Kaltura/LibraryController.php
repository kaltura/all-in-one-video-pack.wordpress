<?php

class Kaltura_LibraryController extends Kaltura_BaseController {

	protected function allowedActions() {
		return array(
			'upload',
			'delete',
			'sendtoeditor',
			'library',
			'browse',
			'choosevideos',
			'preview',
			'updatethumbnail',
			'getplayers',
			'saveentryname',
			'videoposts',
			'getentriesstatus',
		);
	}

	public function execute() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			wp_die( 'Access denied' );
		}

		wp_enqueue_script( 'kaltura' );
		wp_enqueue_script( 'kaltura-admin' );
		wp_enqueue_style( 'kaltura-admin' );

		if ( ! KalturaHelpers::getOption( 'kaltura_partner_id' ) ) {
			$this->renderView( 'library/partner-id-missing.php' );
		} else {
			parent::execute();
		}
	}

	public function uploadAction() {
		wp_enqueue_style( 'media' );
		$kmodel      = KalturaModel::getInstance();
		$pingSuccess = $kmodel->pingTest();
		if ( ! $pingSuccess ) {
			$this->renderView( 'connection-error.php' );

			return;
		}

		$kcwUiConfId  = KalturaHelpers::getOption( 'kaltura_default_kcw_type' ) ? KalturaHelpers::getOption( 'kaltura_default_kcw_type' ) : KalturaHelpers::getOption( 'kcw_ui_conf_id_admin' );
		$rootCategory = KalturaHelpers::getOption( 'kaltura_root_category' );
		$rootCategory = ! empty( $rootCategory ) ? $rootCategory : 0;

		$ks                                      = $kmodel->getClientSideSession();
		$params['flashVars']                     = KalturaHelpers::getContributionWizardFlashVars( $ks );
		$params['flashVars']['showCloseButton']  = 'false';
		$params['flashVars']['categoriesRootId'] = $rootCategory;
		$params['swfUrl']                        = KalturaHelpers::getContributionWizardUrl( $kcwUiConfId );
		$params['rootCategory']                  = $rootCategory;
		$this->renderView( 'library/contribution-wizard-admin.php', $params );
	}

	public function deleteAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryid' );
		$kmodel  = KalturaModel::getInstance();
		$kmodel->deleteEntry( $entryId );
		echo 'ok';
		die;
	}

	public function sendtoeditorAction() {
		wp_enqueue_style( 'media' );
		wp_enqueue_script( 'kaltura-player-selector' );

		$entryIds = KalturaHelpers::getRequestParam( 'entryIds', array() );
		$entryId  = null;
		if ( is_array( $entryIds ) && count( $entryIds ) > 0 ) {
			$entryId = $entryIds[0];
		}

		if ( is_null( $entryId ) ) {
			wp_die( 'No entry specified' );
		}

		$params = array_fill_keys(
			array(
			'entry', 'entryId', 'nextEntryIds', 'flashVars', 'thumbnailPlaceHolderUrl',
			'playerWidth', 'playerHeight', 'uiConfId', 'isLibrary',
		), null
		);
		if ( ! count( $_POST ) ) {
			$kmodel = KalturaModel::getInstance();

			$entry                             = $kmodel->getEntry( $entryId );
			$clientSideSession                 = $kmodel->getClientSideSession();
			$flashVars                         = KalturaHelpers::getKalturaPlayerFlashVars( $clientSideSession, $entryId );
			$thumbnail                         = KalturaHelpers::getPluginUrl() . '/thumbnails/get_preview_thumbnail.php?thumbnail_url=' . $entry->thumbnailUrl;
			$params['entry']                   = $entry;
			$params['entryId']                 = $entryId;
			$params['nextEntryIds']            = $entryIds;
			$params['flashVars']               = $flashVars;
			$params['flashVars']['autoPlay']   = 'true';
			$params['thumbnailPlaceHolderUrl'] = $thumbnail;
		} else {
			// update the entry name
			$kmodel = KalturaModel::getInstance();

			$baseEntry       = new Kaltura_Client_Type_BaseEntry();
			$baseEntry->name = KalturaHelpers::getRequestPostParam( 'ktitle' );
			$kmodel->updateBaseEntry( $entryId, $baseEntry );

			array_shift( $entryIds ); // done with 1 entry, maybe we have more
			$width       = KalturaHelpers::getRequestPostParam( 'playerWidth' );
			$uiConfId    = KalturaHelpers::getRequestPostParam( 'uiConfId' );
			$playerRatio = KalturaHelpers::getRequestPostParam( 'playerRatio' );

			$params['entryId']      = $entryId;
			$params['nextEntryIds'] = $entryIds;
			$params['playerWidth']  = $width;
			$params['playerHeight'] = KalturaHelpers::calculatePlayerHeight( $uiConfId, $width, $playerRatio );
			$params['uiConfId']     = $uiConfId;
		}
		$this->renderView( 'library/send-to-editor.php', $params );
	}

	public function libraryAction() {
		$_GET['isLibrary'] = true;
		add_thickbox();
		$this->browseAction();
	}

	public function browseAction() {
		wp_enqueue_style( 'media' );
		wp_enqueue_script( 'kaltura-editable-name' );
		$kmodel    = KalturaModel::getInstance();
		$isLibrary = KalturaHelpers::getRequestParam( 'isLibrary', false );
		if ( $isLibrary ) {
			$pageSize = 16;
		} else {
			$pageSize = 18;
		}
		$page                         = KalturaHelpers::getRequestParam( 'paged', '1' );
		$result                       = $this->searchvideosAction( $pageSize, $page );
		$totalCount                   = $result->totalCount;
		$params['page']               = $page;
		$params['pageSize']           = $pageSize;
		$params['totalCount']         = $totalCount;
		$params['totalPages']         = ceil( $totalCount / $pageSize );
		$params['result']             = $result;
		$params['isLibrary']          = (bool) $isLibrary;
		$params['filters']            = $kmodel->listSelectedRootCategories();
		$params['selectedCategories'] = KalturaHelpers::getRequestParam( 'categoryvar' );
		$params['searchWord']         = KalturaHelpers::getRequestParam( 'search' );
		$params['postId']             = KalturaHelpers::getRequestParam( 'post_id' );
		$this->renderView( 'library/browse.php', $params );
	}

	public function searchvideosAction( $pageSize, $page ) {
		$kmodel      = KalturaModel::getInstance();
		$page        = $kmodel->_sanitizer->sanitizer( $page, 'string' );
		$pageSize    = $kmodel->_sanitizer->sanitizer( $pageSize, 'int' );
		$queryString = $kmodel->_sanitizer->sanitizer( KalturaHelpers::getRequestParam( 'search' ), 'string' );
		$categories  = $kmodel->_sanitizer->sanitizer( KalturaHelpers::getRequestParam( 'categoryvar' ), 'arr' );

		$result = $kmodel->listEntriesByCategoriesAndWord( $pageSize, $page, $categories, $queryString );

		return $result;
	}

	public function choosevideosAction() {
		wp_enqueue_style( 'media' );
		wp_enqueue_script( 'kaltura-editable-name' );
		wp_enqueue_script( 'kaltura-entry-status-checker' );
		$entryIds          = KalturaHelpers::getRequestParam( 'entryIds', array() );
		$kmodel            = KalturaModel::getInstance();
		$entries           = $kmodel->getEntriesByIds( $entryIds );
		$params['entries'] = $entries;
		$this->renderView( 'library/choose-videos.php', $params );
	}

	public function previewAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryid' );
		if ( ! $entryId ) {
			wp_die( esc_html__( 'The video is missing or invalid.' ) );
		}

		$uiConfId = KalturaHelpers::getOption( 'kaltura_default_player_type' );
		KalturaHelpers::enqueueHtml5Lib( $uiConfId );
		wp_enqueue_script( 'jquery' );

		$flashVars             = array();
		$flashVars['autoPlay'] = 'true';
		$params                = array(
			'widgetId'  => '_' . KalturaHelpers::getOption( 'kaltura_partner_id' ),
			'uiConfId'  => $uiConfId,
			'entryId'   => $entryId,
			'flashVars' => $flashVars,
		);
		$this->renderView( 'library/preview.php', $params );
	}

	public function updatethumbnailAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryid' );
		if ( ! $entryId ) {
			wp_die( esc_html__( 'The video is missing or invalid.' ) );
		}

		$uiConfId = KalturaHelpers::getOption( 'thumbnail_player_ui_conf_id' );
		KalturaHelpers::enqueueHtml5Lib( $uiConfId );
		wp_enqueue_script( 'jquery' );

		$kmodel          = KalturaModel::getInstance();
		$ks              = $kmodel->getAdminSession();
		$flashVars       = array();
		$flashVars['ks'] = $ks;
		$params          = array(
			'widgetId'  => '_' . KalturaHelpers::getOption( 'kaltura_partner_id' ),
			'uiConfId'  => $uiConfId,
			'entryId'   => $entryId,
			'flashVars' => $flashVars,
		);
		$this->renderView( 'library/update-thumbnail.php', $params );
		$kmodel = KalturaModel::getInstance();
	}

	public function getplayersAction() {
		$kmodel  = KalturaModel::getInstance();
		$uiConfs = $kmodel->listPlayersUiConfs();
		echo json_encode( $uiConfs );
		die;
	}

	public function saveentrynameAction() {
		$entryId   = KalturaHelpers::getRequestPostParam( 'entryId' );
		$entryName = KalturaHelpers::getRequestPostParam( 'entryName' );

		if ( $entryId && $entryName ) {
			$kmodel          = KalturaModel::getInstance();
			$baseEntry       = new Kaltura_Client_Type_BaseEntry();
			$baseEntry->name = $entryName;
			$kmodel->updateBaseEntry( $entryId, $baseEntry );
		}
		echo 'ok';
		die;
	}

	public function videopostsAction() {
		$step = KalturaHelpers::getRequestParam( 'step', 1 );
		if ( $step == 1 ) {
			$this->videopostsStep1();
		} elseif ( $step == 2 ) {
			$this->videopostsStep2();
		} elseif ( $step == 3 ) {
			$this->videopostsStep3();
		}
	}

	public function getentriesstatusAction() {
		$entryIds = KalturaHelpers::getRequestParam( 'entryIds', array() );
		$kmodel   = KalturaModel::getInstance();
		$entries  = $kmodel->getEntriesByIds( $entryIds );

		$idsWithStatus = array();
		foreach ( $entries as $entry ) {
			$idsWithStatus[$entry->id] = $entry->status;
		}

		echo json_encode( $idsWithStatus );
		die;
	}

	protected function videopostsStep1() {
		$kmodel                 = KalturaModel::getInstance();
		$categories             = $kmodel->listRootCategoriesOrderByName();
		$params['categories']   = $categories->objects;
		$params['wpCategories'] = get_categories( 'get=all' );
		$this->renderView( 'library/video-posts-screen-1.php', $params );
	}

	protected function videopostsStep2() {
		$hasEntries = false;
		$categories = KalturaHelpers::getRequestPostParam( 'categories', array() );
		$kmodel     = KalturaModel::getInstance();
		foreach ( $categories as $category ) {
			$entries = $kmodel->listAllEntriesByCategory( $category );

			// remove the entries that have posts
			$newEntries = array();
			for ( $i = 0; $i < count( $entries ); $i ++ ) {
				$entry        = $entries[$i];
				$hasEntries   = true;
				$newEntries[] = $entry;
			}
			$categories[$category] = $newEntries;
		}

		$params['uiConfs']    = $kmodel->listPlayersUiConfs();;
		$params['categories'] = $categories;
		$params['hasEntries'] = $hasEntries;
		$this->renderView( 'library/video-posts-screen-2.php', $params );
	}

	protected function videopostsStep3() {
		$entries      = KalturaHelpers::getRequestPostParam( 'entries', array() );
		$createdPosts = 0;
		$uiConfId     = (string)KalturaHelpers::getRequestPostParam( 'uiconf_id' );
		$width        = (string)KalturaHelpers::getRequestPostParam( 'width' );
		$height       = (string)KalturaHelpers::getRequestPostParam( 'height' );

		foreach ( $entries as $entryCat ) {
			$arr          = unserialize( base64_decode( $entryCat ) );
			$entryId      = $arr[0];
			$entryName    = $arr[1];
			$categoryName = $arr[2];
			$categoryName = esc_html($categoryName);

			// do we need to create new category?
			if ( ! Kaltura_WPModel::isCategoryExists( $categoryName ) ) {
				$newCat = array( 'cat_name' => $categoryName );
				wp_insert_category( $newCat );
				wp_cache_set( 'last_changed', microtime( true ), 'terms' ); // otherwise the category won't return when retrieving it later in the code
			}

			$category = Kaltura_WPModel::getCategoryByName( $categoryName );

			// create the post for the video
			$shortCode = '[kaltura-widget uiconfid="' . esc_attr($uiConfId) . '" entryid="' . esc_attr($entryId) . '" width="' . esc_attr($width) . '" height="' . esc_attr($height) . '" /]';
			$newPost   = array(
				'post_title'   => esc_html($entryName),
				'post_content' => $shortCode,
			);
			$postId = wp_insert_post( $newPost );
			if ( $postId ) {
				$createdPosts ++;
			}

			// link the post to the category
			$categories   = wp_get_post_categories( $postId );
			$categories[] = $category->cat_ID;
			wp_set_post_categories( $postId, $categories );
		}
		$params['numOfCreatedPosts'] = $createdPosts;
		$this->renderView( 'library/video-posts-screen-3.php', $params );
	}
}