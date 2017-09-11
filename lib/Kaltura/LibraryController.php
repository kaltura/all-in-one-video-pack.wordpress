<?php

class Kaltura_LibraryController extends Kaltura_BaseController {

	protected function allowedActions() {
		return array(
			'upload',
			'edit',
			'delete',
			'sendtoeditor',
			'library',
			'browse',
			'getplayers',
			'getentrystatus',
			'saveentryname',
			'getplaylistitems',
			'getplaylists',
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
		wp_enqueue_script( 'kaltura-jquery.fileupload-kaltura-base' );
		wp_enqueue_style( 'kaltura-jquery.fileupload-ui-kaltura' );

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
		$params['fileUploadParams']              = KalturaHelpers::getFileUploadParams( $ks );
		if ( KalturaHelpers::getOption('kaltura_enable_kcw') ) {
			$this->renderView( 'library/contribution-wizard-admin.php', $params );
		} else {
			$this->renderView( 'library/upload.php', $params );
		}
	}

	public function editAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryid' );
		$kmodel  = KalturaModel::getInstance();
		$params  = array();
		if ( count( $_POST ) ) {
			$entryUpdate              = new Kaltura_Client_Type_BaseEntry();
			$entryUpdate->name        = KalturaHelpers::getRequestPostParam( 'entry-title' );
			$entryUpdate->description = KalturaHelpers::getRequestPostParam( 'entry-description' );
			$kmodel->updateBaseEntry( $entryId, $entryUpdate );
			$redirectUrl           = wp_sanitize_redirect( KalturaHelpers::generateTabUrl( array(
					'tab'        => 'kaltura_upload',
					'kaction'    => 'sendtoeditor',
					'firstedit'  => 'true',
					'entryIds' => array( $entryId )
			) ) );
			$params['redirectUrl'] = $redirectUrl;
		} else {
			$entry             = $kmodel->getEntry( $entryId );
			$params['entry']   = $entry;
			$params['formUrl'] = KalturaHelpers::generateTabUrl(
					array(
							'tab'     => 'kaltura_upload',
							'kaction' => 'edit',
							'entryid' => $entryId,
					) );
		}
		$this->renderView( 'library/edit.php', $params );
	}

	public function deleteAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryid' );
		$kmodel  = KalturaModel::getInstance();
		$kmodel->deleteEntry( $entryId );
		echo 'ok';
		die;
	}

	public function sendtoeditorAction() {
		wp_enqueue_script( 'kaltura-player-selector' );

		$entryIds = KalturaHelpers::getRequestParam( 'entryIds', array() );
		$isPlaylist = KalturaHelpers::getRequestParam( 'isplaylist', false );
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
			$ks                                = KalturaHelpers::getKSForPlayer( $entryId );
			$flashVars                         = KalturaHelpers::getKalturaPlayerFlashVars( $ks, $entryId, $isPlaylist);

			$thumbnail                         = KalturaHelpers::getPluginUrl() . '/thumbnails/get_preview_thumbnail.php?thumbnail_url=' . $entry->thumbnailUrl;
			$params['entry']                   = $entry;
			$params['entryId']                 = $entryId;
			$params['nextEntryIds']            = $entryIds;
			$params['flashVars']               = $flashVars;
			$params['thumbnailPlaceHolderUrl'] = $thumbnail;
			$params['entryError']              = $entry->status === Kaltura_Client_Enum_EntryStatus::ERROR_CONVERTING || $entry->status === Kaltura_Client_Enum_EntryStatus::ERROR_IMPORTING;
			$params['entryConverting']         = $entry->status !== Kaltura_Client_Enum_EntryStatus::READY && ! $params['entryError'];
			$params['isPlaylist']              = $isPlaylist;
		} else {
			$kmodel = KalturaModel::getInstance();

			array_shift( $entryIds ); // done with 1 entry, maybe we have more
			$width       = KalturaHelpers::getRequestPostParam( 'playerWidth' );
			$uiConfId    = KalturaHelpers::getRequestPostParam( 'uiConfId' );
			$playerRatio = KalturaHelpers::getRequestPostParam( 'playerRatio' );
			$hoveringControls = KalturaHelpers::getRequestPostParam( 'hoveringControls' );
			$isPlaylist = KalturaHelpers::getRequestPostParam( 'isplaylist', false );
			$isResponsive = $width === '100%';

			$params['entryId']      = $entryId;
			$params['nextEntryIds'] = $entryIds;
			$params['playerWidth']  = $width;
			if ( $isResponsive ) {
				$params['playerHeight'] = $playerRatio === '16:9' ? '56.25%' : '75%';
			} else {
				$params['playerHeight'] = KalturaHelpers::calculatePlayerHeight( $width, $playerRatio );
			}
			$params['uiConfId']     = $uiConfId;
			$params['isResponsive'] = $isResponsive ? 'true': 'false';
			$params['hoveringControls'] = $hoveringControls === 'true' ? 'true' : 'false';
			$params['isPlaylist']         = $isPlaylist;
		}
		$this->renderView( 'library/send-to-editor.php', $params );
	}

	public function libraryAction() {
		$_GET['isLibrary'] = true;
		add_thickbox();
		$this->browseAction();
	}

	public function browseAction() {
		wp_enqueue_script( 'kaltura-editable-name' );
		$subViewFile  = 'library/media-list.php';
		$page         = absint( KalturaHelpers::getRequestParam( 'paged', 1 ) );
		$isLibrary    = (bool) KalturaHelpers::getRequestParam( 'isLibrary', false );
		$isPlaylist   = false;
		$categoryIds  = array_map( 'absint', KalturaHelpers::getRequestParam( 'categoryvar', array() ) );
		$searchString = sanitize_text_field( KalturaHelpers::getRequestParam( 'search' ) );
		$allowedOwnerTypes = array(
				'all-media',
				'my-media',
				'media-publish',
				'media-edit',
				'my-playlist'
		);
		$ownerType = in_array( KalturaHelpers::getRequestParam( 'ownertype' ), $allowedOwnerTypes) ? KalturaHelpers::getRequestParam( 'ownertype' ) : null;

		// if only logger-in option is enabled, do no allow viewing all media
		if(($ownerType === 'all-media' || $ownerType == null) &&
		   KalturaHelpers::getOption('kaltura_show_media_from') === 'logged_in_user') {
			$ownerType = 'my-media';
		} elseif ($ownerType === 'my-playlist') {
			$isPlaylist = true;
		}

		if ( $isLibrary ) {
			$pageSize = 16;
		} else {
			$pageSize = 18;
		}
		
		$showCategory = true;
		$kalturaBrowseClassName = '';
		if (KalturaHelpers::getOption('kaltura_show_media_from') === 'logged_in_user' || $isPlaylist) {
			$showCategory = false;
			$kalturaBrowseClassName = 'pull-left';
		}
		
		$showEmail       = boolval(KalturaHelpers::getOption('kaltura_show_kmc_email'));
		$kmodel          = KalturaModel::getInstance();
		
		if (!$isPlaylist) {
			$result          = $kmodel->listEntriesByCategoriesAndWord( $pageSize, $page, $categoryIds, $searchString, $ownerType );
			$result->objects = $this->addUserPermissionsToEntry( $result->objects );;
		} else {
			wp_enqueue_style('kaltura-jquery-perfect-scrollbar');
			wp_enqueue_script( 'kaltura-jquery-perfect-scrollbar' );
			wp_enqueue_script( 'kaltura-playlist-control' );
			$pageSize = 15;
			$currentUser = KalturaHelpers::getLoggedUserId();
			$result = $kmodel->getUserPlaylists($currentUser, $pageSize, $page, $searchString);
			$subViewFile = 'library/playlists-list.php';
		}
		
		$totalCount      = $result->totalCount;

		$params['page']               = $page;
		$params['pageSize']           = $pageSize;
		$params['totalCount']         = $totalCount;
		$params['totalPages']         = ceil( $totalCount / $pageSize );
		$params['result']             = $result;
		$params['isLibrary']          = $isLibrary;
		$params['filters']            = $kmodel->listSelectedRootCategories();
		$params['selectedCategories'] = $categoryIds;
		$params['searchWord']         = $searchString;
		$params['postId']             = KalturaHelpers::getRequestParam( 'post_id' );
		$params['filterOwnerType']    = $ownerType;
		$params['showCategory']       = $showCategory;
		$params['browseClass']        = $kalturaBrowseClassName;
		$params['showEmail']          = $showEmail;
		$params['subViewFile']          = $subViewFile;
		$params['isPlaylist']          = $isPlaylist;
		
		$this->renderView( 'library/browse.php', $params );
	}

	private function addUserPermissionsToEntry( array $entries ) {
		$kalturaModel = KalturaModel::getInstance();
		foreach ( $entries as $entry ) {
			$entry->canUserEditMedia = $kalturaModel->canLoggedInUserEditMedia( $entry );
			$entry->isUserMediaOwner = $kalturaModel->isMediaOwner( $entry );
		}

		return $entries;
	}

	public function getplayersAction() {
		$isPlaylist = (bool) KalturaHelpers::getRequestParam( 'isplaylist', false );
		if (!$isPlaylist){
			$players = KalturaHelpers::getAllowedPlayers();
		} else {
			$players = KalturaHelpers::getAllowedPlaylistPlayers();
		}

		wp_send_json( array_values( $players ) );
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

	public function getentrystatusAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryId' );
		try {
			echo KalturaModel::getInstance()->getEntry( $entryId )->status;
		} catch ( Exception $ex ) {
			echo 'error';
		}
		die;
	}

	public function getplaylistitemsAction() {
		$entryId = KalturaHelpers::getRequestParam( 'entryId' );
		
		if ( is_null( $entryId ) ) {
			wp_die( 'No entry specified' );
		}
		$kmodel          = KalturaModel::getInstance();
		$playlistData    = $kmodel->getPlaylistsData($entryId);
		wp_send_json( array_values( $playlistData ) );
		die;
	}
	
	public function getplaylistsAction() {
		$page = (int)KalturaHelpers::getRequestParam( 'page' );
		$pageSize = (int)KalturaHelpers::getRequestParam( 'pageSize' );
		$searchString = sanitize_text_field( KalturaHelpers::getRequestParam( 'search' ) );
		$playlistObjects = array();
		
		$currentUser = KalturaHelpers::getLoggedUserId();
		$kmodel          = KalturaModel::getInstance();
		$playlistData    = $kmodel->getUserPlaylists($currentUser, $pageSize, $page, $searchString);
		$totalCount      = $playlistData->totalCount;
		$playlistObjects['items'] = array();
		foreach ($playlistData->objects as $key => $playlist) {
			$playlistObjects['items'][$key]['name'] = $playlist->name;
			$playlistObjects['items'][$key]['id'] = $playlist->id;
		}
		$playlistObjects['page'] = $page;
		$playlistObjects['totalCount'] = $totalCount;
		wp_send_json(  $playlistObjects  );
		die;
	}
}
