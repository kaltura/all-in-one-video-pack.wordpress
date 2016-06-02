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

	/**
	 * @param $partnerId
	 * @param $email
	 * @param $password
	 *
	 * @return Kaltura_Client_Type_Partner
	 */
	public function getSecrets( $partnerId, $email, $password ) {
		$email     = sanitize_email( $email );
		$password  = sanitize_text_field( $password );
		$partnerId = intval( $partnerId );

		$this->_client->setKs( null );
		$this->_client->getConfig()->partnerId = null;

		return $this->_client->partner->getSecrets( $partnerId, $email, $password );
	}

	/**
	 * @param $entryId
	 *
	 * @return Kaltura_Client_Type_BaseEntry
	 */
	public function getEntry( $entryId ) {
		$entryId = sanitize_key( $entryId );

		return $this->_client->baseEntry->get( $entryId );
	}

	/**
	 * @param $baseEntryId
	 * @param Kaltura_Client_Type_BaseEntry $baseEntry
	 *
	 * @return Kaltura_Client_Type_BaseEntry
	 */
	public function updateBaseEntry( $baseEntryId, Kaltura_Client_Type_BaseEntry $baseEntry ) {
		$baseEntryId = sanitize_key( $baseEntryId );

		return $this->_client->baseEntry->update( $baseEntryId, $baseEntry );
	}

	/**
	 * @param $pageSize
	 * @param $page
	 * @param $categoryIds
	 * @param $word
	 * @param $ownerType
	 *
	 * @return Kaltura_Client_Type_BaseEntryListResponse
	 */
	public function listEntriesByCategoriesAndWord( $pageSize, $page, $categoryIds, $word, $ownerType ) {
		$page       = intval( $page );
		$pageSize   = intval( $pageSize );
		$word       = sanitize_text_field( $word );
		$categoryIds =  array_map('absint', $categoryIds);
		$rootCategory    = absint( KalturaHelpers::getOption( 'kaltura_root_category' ) );

		$filter          = new Kaltura_Client_Type_BaseEntryFilter();
		$filter->orderBy = '-createdAt';

		$types = array(
				Kaltura_Client_Enum_EntryType::MEDIA_CLIP
		);
		if ( KalturaHelpers::isFeatureEnabled( 'youtube_entries' ) ) {
			$types[] = Kaltura_Client_Enum_EntryType::EXTERNAL_MEDIA;
		}
		$filter->typeIn = implode( ',', $types );

		switch($ownerType)
		{
			case 'all-media':
				// default filter
				break;
			case 'my-media':
				$filter->userIdEqual = KalturaHelpers::getLoggedUserId();
				break;
			case 'media-publish':
				$filter->entitledUsersPublishMatchAnd = KalturaHelpers::getLoggedUserId();
				break;
			case 'media-edit':
				$filter->entitledUsersEditMatchAnd = KalturaHelpers::getLoggedUserId();
				break;
		}

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

	/**
	 * @return Kaltura_Client_Type_UiConfListResponse
	 */
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

	protected function getMaxPager() {
		$pager           = new Kaltura_Client_Type_FilterPager();
		$pager->pageSize = 500;

		return $pager;
	}
}