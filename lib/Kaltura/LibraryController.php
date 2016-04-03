<?php

class Kaltura_LibraryController extends Kaltura_BaseController {

	protected function allowedActions() {
		return array(
			'upload',
			'delete',
			'sendtoeditor',
			'library',
			'browse',
			'getplayers',
			'saveentryname',
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
			$isResponsive = !empty(KalturaHelpers::getRequestPostParam( 'makeResponsive' ));

			$player = $kmodel->getPlayerUiConf( intval($uiConfId) );

			$params['entryId']      = $entryId;
			$params['nextEntryIds'] = $entryIds;
			$params['playerWidth']  = $width;
			$params['playerHeight'] = KalturaHelpers::calculatePlayerHeight( $player, $width, $playerRatio );
			$params['uiConfId']     = $uiConfId;
			$params['isResponsive'] = $isResponsive ? 'true': 'false';
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
		$page         = absint( KalturaHelpers::getRequestParam( 'paged', 1 ) );
		$isLibrary    = (bool) KalturaHelpers::getRequestParam( 'isLibrary', false );
		$categoryIds  = array_map( 'absint', KalturaHelpers::getRequestParam( 'categoryvar', array() ) );
		$searchString = sanitize_text_field( KalturaHelpers::getRequestParam( 'search' ) );

		if ( $isLibrary ) {
			$pageSize = 16;
		} else {
			$pageSize = 18;
		}

		$kmodel     = KalturaModel::getInstance();
		$result     = $kmodel->listEntriesByCategoriesAndWord( $pageSize, $page, $categoryIds, $searchString );
		$totalCount = $result->totalCount;

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
		$this->renderView( 'library/browse.php', $params );
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
}