<?php

class KalturaModel {
	/**
	 * @var KalturaModel
	 */
	private static $_instance;

	/**
	 * @var string
	 */
	protected $_session = null;

	/**
	 * @var Kaltura_Client_Client
	 */
	protected $_client = null;

	/**
	 * @var string
	 */
	protected $_userId = null;

	/**
	 * @var string
	 */
	protected $_partnerId = null;


	private function KalturaModel() {
		$config           = KalturaHelpers::getKalturaConfiguration();
		$this->_client    = new KalturaWordpressClientBase( $config );
		$this->_userId    = sanitize_user( KalturaHelpers::getLoggedUserId() );
		$this->_partnerId = intval( KalturaHelpers::getOption( 'kaltura_partner_id' ) );
		$this->startSession();
	}

	public static function getInstance() {
		if ( self::$_instance == null ) {
			self::$_instance = new KalturaModel();
		}

		return self::$_instance;
	}

	public function startSession() {
		if ( ! KalturaHelpers::getOption( 'kaltura_partner_id' ) ) {
			return;
		}

		$ks = sanitize_text_field( $this->getAdminSession( 'edit:*' ) );
		$this->_client->setKs( $ks );
		$this->_session = $ks;
	}

	public function getAdminSession( $privileges = '' ) {
		$privileges =  KalturaSanitizer::privileges( $privileges );

		return sanitize_text_field( $this->createKS( $this->_partnerId, $this->_userId, Kaltura_Client_Enum_SessionType::ADMIN, $privileges ) );
	}

	public function getClientSideSession( $privileges = '', $expiry = 86400 ) {
		$privileges = KalturaSanitizer::privileges( $privileges );
		$expiry     = intval( $expiry );

		return sanitize_text_field( $this->createKS( $this->_partnerId, $this->_userId, Kaltura_Client_Enum_SessionType::USER, $privileges, $expiry ) );
	}

	public function createKS( $partnerId, $userId, $sessionType = Kaltura_Client_Enum_SessionType::USER, $privileges = '', $expiry = 86400 ) {
		$partnerId  = intval( $partnerId );
		$userId     = sanitize_user( $userId );
		$privileges = KalturaSanitizer::privileges( $privileges );
		$expiry     = intval( $expiry );

		$rand   = microtime( true );
		$expiry = time() + $expiry;
		$fields = array( $partnerId, '', $expiry, $sessionType, $rand, $userId, $privileges );
		$str    = implode( ';', $fields );

		$salt        = sanitize_text_field( KalturaHelpers::getOption( 'kaltura_admin_secret' ) );
		$hashed_str  = sha1( $salt . $str ) . '|' . $str;
		$decoded_str = base64_encode( $hashed_str );

		return sanitize_text_field( $decoded_str );
	}

	public function getSecrets( $partnerId, $email, $password ) {
		$email     = sanitize_email( $email );
		$password  = sanitize_text_field( $password );
		$partnerId = intval( $partnerId );

		$this->_client->setKs( null );
		$this->_client->getConfig()->partnerId = null;

		return $this->_client->partner->getSecrets( $partnerId, $email, $password );
	}

	public function getEntry( $entryId ) {
		$entryId = sanitize_key( $entryId );

		return $this->_client->baseEntry->get( $entryId );
	}

	public function updateBaseEntry( $baseEntryId, Kaltura_Client_Type_BaseEntry $baseEntry ) {
		$baseEntryId = sanitize_key( $baseEntryId );

		return $this->_client->baseEntry->update( $baseEntryId, $baseEntry );
	}

	public function listEntriesByCategoriesAndWord( $pageSize, $page, $categoryIds, $word ) {
		$page       = intval( $page );
		$pageSize   = intval( $pageSize );
		$word       = sanitize_text_field( $word );
		$categoryIds =  array_map('absint', $categoryIds);
		$rootCategory    = absint( KalturaHelpers::getOption( 'kaltura_root_category' ) );

		$filter          = new Kaltura_Client_Type_BaseEntryFilter();
		$filter->orderBy = '-createdAt';
		$filter->typeIn  = Kaltura_Client_Enum_EntryType::MEDIA_CLIP;

		if ( $rootCategory )
			$categoryIds[] = $rootCategory;

		$filter->categoriesIdsMatchOr = join( ', ', $categoryIds );
		$filter->searchTextMatchOr = $word;

		$pager            = new Kaltura_Client_Type_FilterPager();
		$pager->pageSize  = $pageSize;
		$pager->pageIndex = $page;

		return $this->_client->baseEntry->listAction( $filter, $pager );
	}

	public function deleteEntry( $mediaEntryId ) {
		$mediaEntryId = sanitize_key( $mediaEntryId );

		return $this->_client->baseEntry->delete( $mediaEntryId );
	}

	public function pingTest() {
		try {
			return $this->_client->system->ping();
		} catch ( Exception $ex ) {
			return false;
		}
	}

	public function registerPartner( $partner ) {
		$config = $this->_client->getConfig();
		$this->_client->setKs( null );
		$config->partnerId   = null;
		$oldTimeout          = $config->curlTimeout;
		$config->curlTimeout = 40;
		$result              = $this->_client->partner->register( $partner );
		$config->curlTimeout = $oldTimeout;

		return $result;
	}

	public function generateRootTree() {
		$filter          = new Kaltura_Client_Type_CategoryFilter();
		$filter->orderBy = Kaltura_Client_Enum_CategoryOrderBy::FULL_NAME_ASC;

		return $this->_client->category->listAction( $filter, $this->getMaxPager() );

	}

	public function listSelectedRootCategories() {
		$rootCategory    = absint( KalturaHelpers::getOption( 'kaltura_root_category' ) );
		$filter          = new Kaltura_Client_Type_CategoryFilter();
		$filter->orderBy = Kaltura_Client_Enum_CategoryOrderBy::FULL_NAME_ASC;
		if ( $rootCategory ) {
			$filter->ancestorIdIn = $rootCategory;
		}

		return $this->_client->category->listAction( $filter, $this->getMaxPager() );
	}

	public function listPlayersUiConfs() {
		$filter                 = new Kaltura_Client_Type_UiConfFilter();
		$filter->objTypeEqual   = Kaltura_Client_Enum_UiConfObjType::PLAYER;
		$filter->orderBy        = Kaltura_Client_Enum_UiConfOrderBy::CREATED_AT_DESC;

		$uiConfs = $this->_client->uiConf->listAction( $filter );

		return $uiConfs;
	}

	public function listKCWUiConfs() {
		$filter               = new Kaltura_Client_Type_UiConfFilter();
		$filter->objTypeEqual = Kaltura_Client_Enum_UiConfObjType::CONTRIBUTION_WIZARD;
		$pager                = new Kaltura_Client_Type_FilterPager;
		$pager->pageSize      = 1000;

		try {
			$uiConfs = $this->_client->uiConf->listAction( $filter, $pager );
		} catch ( Kaltura_Client_Exception $ex ) {
			$uiConfs          = new stdClass();
			$uiConfs->objects = array();
		}

		foreach ( $uiConfs->objects as $key => $kcw ) {

			if ( strpos( $kcw->swfUrl, 'ContributionWizard.swf' ) === false ) {
				unset( $uiConfs->objects[$key] );
				$uiConfs->totalCount --;
			}
		}

		return $uiConfs;
	}

	public function getPlayerUiConf( $uiConfId ) {
		$uiConfId = intval( $uiConfId );

		return $this->_client->uiConf->get( $uiConfId );
	}

	public function getEntryMetadata( $entryId, $metadataProfileId ) {
		$metadataProfileId = intval( $metadataProfileId );
		$entryId           = sanitize_key( $entryId );

		$filter                         = new Kaltura_Client_Metadata_Type_MetadataFilter();
		$filter->objectIdEqual          = $entryId;
		$filter->metadataProfileIdEqual = $metadataProfileId;
		$metadataPlugin                 = Kaltura_Client_Metadata_Plugin::get( $this->_client );

		return $metadataPlugin->metadata->listAction( $filter );
	}

	public function updateEntryMetadata( $metadataId, $xmlData ) {
		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get( $this->_client );

		return $metadataPlugin->metadata->update( $metadataId, $xmlData );
	}

	public function addEntryMetadata( $metadataProfileId, $entryId, $xmlData ) {
		$metadataProfileId = intval( $metadataProfileId );
		$entryId           = sanitize_key( $entryId );

		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get( $this->_client );
		$objectType     = Kaltura_Client_Metadata_Enum_MetadataObjectType::ENTRY;

		return $metadataPlugin->metadata->add( $metadataProfileId, $objectType, $entryId, $xmlData );
	}

	public function getMetadataProfilesTypeEntry() {
		$filter                          = new Kaltura_Client_Metadata_Type_MetadataProfileFilter();
		$filter->metadataObjectTypeEqual = Kaltura_Client_Metadata_Enum_MetadataObjectType::ENTRY;
		$metadataPlugin                  = Kaltura_Client_Metadata_Plugin::get( $this->_client );

		return $metadataPlugin->metadataProfile->listAction( $filter );
	}

	public function getMetadataProfileFields( $metadataProfileId ) {
		$metadataProfileId = intval( $metadataProfileId );

		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get( $this->_client );

		return $metadataPlugin->metadataProfile->listFields( $metadataProfileId );
	}

	public function updateEntryPermalinkMetadata( $entryId, $permalink, $metadataProfileId, $metadataFieldName ) {
		$entryId           = sanitize_key( $entryId );
		$permalink         = sanitize_title( $permalink );
		$metadataProfileId = intval( $metadataProfileId );
		$metadataFieldName = tag_escape( $metadataFieldName );
		$xmlData = "<metadata><{$metadataFieldName}>{$permalink}</{$metadataFieldName}></metadata>";

		$result  = $this->getEntryMetadata( $entryId, $metadataProfileId );
		if ( $result->totalCount == 0 ) {
			$this->addEntryMetadata( $metadataProfileId, $entryId, $xmlData );
		} else {
			/* @var $metadata Kaltura_Client_Metadata_Type_Metadata */
			$metadata = $result->objects[0];
			$this->updateEntryMetadata( $metadata->id, $xmlData );
		}
	}

	public function updateEntryPermalink( $postId ) {
		$postId                 = intval( $postId );
		$metadataProfileId      = intval( KalturaHelpers::getOption( 'kaltura_permalink_metadata_profile_id' ) );
		$metadataFieldsResponse = $this->getMetadataProfileFields( $metadataProfileId );

		// the metadata profile should have only one field.
		if ( $metadataFieldsResponse->totalCount != 1 ) {
			return;
		}

		$metadataField = $metadataFieldsResponse->objects[0];
		$permalink     = get_permalink( $postId );
		$content       = KalturaHelpers::getRequestPostParam( 'content' );
		if ( ! $content ) {
			return;
		}

		$matches = null;
		if ( preg_match_all( '/entryid=\\\\"([^\\\\]*)/', $content, $matches ) ) {
			foreach ( $matches[1] as $entryId ) {
				$this->updateEntryPermalinkMetadata( $entryId, $permalink, $metadataProfileId, $metadataField->key );
			}
		}
	}

	protected function getMaxPager() {
		$pager           = new Kaltura_Client_Type_FilterPager();
		$pager->pageSize = 500;

		return $pager;
	}
}