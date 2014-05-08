<?php
class KalturaModel
{
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
     * @var KalturaSanitizer
     */
    public $_sanitizer = null;

    /**
     * @var string
     */
    protected $_userId = null;

    /**
     * @var string
     */
    protected $_partnerId = null;


    private function KalturaModel()
	{
		$config = KalturaHelpers::getKalturaConfiguration();
		$this->_client = new Kaltura_Client_Client($config);
        $this->_sanitizer = new KalturaSanitizer();
        $this->_userId = $this->_sanitizer->sanitizer(KalturaHelpers::getLoggedUserId(), 'string');
        $this->_partnerId = $this->_sanitizer->sanitizer(KalturaHelpers::getOption("kaltura_partner_id"), 'string');
		$this->startSession();
	}

	public static function getInstance()
	{
		if (self::$_instance == null)
			self::$_instance = new KalturaModel();

		return self::$_instance;
	}

	public function startSession()
	{
		if (!KalturaHelpers::getOption("kaltura_partner_id"))
			return;

		$ks = $this->getAdminSession("edit:*");
		$this->_client->setKs($ks);
		$this->_session = $ks;
	}

	public function getAdminSession($privileges = "")
	{
        $privileges = $this->_sanitizer->sanitizer($privileges, 'string');

        return $this->createKS($this->_partnerId, $this->_userId, Kaltura_Client_Enum_SessionType::ADMIN, $privileges);
	}

	public function getClientSideSession($privileges = "", $expiry = 86400)
	{
        $privileges = $this->_sanitizer->sanitizer($privileges, 'string');
        $expiry = $this->_sanitizer->sanitizer($expiry, 'int');

		return $this->createKS($this->_partnerId, $this->_userId, Kaltura_Client_Enum_SessionType::USER, $privileges, $expiry);
	}

	public function getAdminSessionUsingApi($privileges = "", $expiry = 86400)
	{
        $privileges = $this->_sanitizer->sanitizer($privileges, 'string');
        $expiry = $this->_sanitizer->sanitizer($expiry, 'int');
        $adminSecret = $this->_sanitizer->sanitizer(KalturaHelpers::getOption("kaltura_admin_secret"), 'string');

		$this->_client->setKs(null);
		$this->_client->getConfig()->partnerId = null;

		return $this->_client->session->start($adminSecret, $this->_userId, Kaltura_Client_Enum_SessionType::ADMIN, $this->_partnerId, $expiry, $privileges);
	}

	public function getClientSideSessionUsingApi($privileges = "", $expiry = 86400)
	{
        $privileges = $this->_sanitizer->sanitizer($privileges, 'string');
        $expiry = $this->_sanitizer->sanitizer($expiry, 'int');
        $secret = $this->_sanitizer->sanitizer(KalturaHelpers::getOption("kaltura_secret"), 'string');

		$this->_client->setKs(null);
		$this->_client->getConfig()->partnerId = null;

		return $this->_client->session->start($secret, $this->_userId, Kaltura_Client_Enum_SessionType::USER, $this->_partnerId, $expiry, $privileges);
	}

	public function createKS($partnerId, $userId, $sessionType = Kaltura_Client_Enum_SessionType::USER, $privileges = "", $expiry = 86400)
	{
        $privileges = $this->_sanitizer->sanitizer($privileges, 'string');
        $expiry = $this->_sanitizer->sanitizer($expiry, 'int');
        $userId = $this->_sanitizer->sanitizer($userId , 'string');
        $partnerId = $this->_sanitizer->sanitizer($partnerId, 'string');

		$rand   = microtime(true);
		$expiry = time() + $expiry;
		$fields = array($partnerId, '', $expiry, $sessionType, $rand, $userId, $privileges);
		$str    = implode(";", $fields);

		$salt        = KalturaHelpers::getOption("kaltura_admin_secret");
		$hashed_str  = sha1($salt . $str) . "|" . $str;
		$decoded_str = base64_encode($hashed_str);

		return $decoded_str;
	}

	public function getSecrets($partnerId, $email, $password)
	{
        $email = $this->_sanitizer->sanitizer($email, 'email');
        $password = $this->_sanitizer->sanitizer($password, 'string');
        $partnerId = $this->_sanitizer->sanitizer($partnerId, 'string');

		$this->_client->setKs(null);
		$this->_client->getConfig()->partnerId = null;

        return $this->_client->partner->getSecrets($partnerId, $email, $password);
	}

	public function getEntry($entryId)
	{
        $entryId = $this->_sanitizer->sanitizer($entryId, 'string');

        return $this->_client->baseEntry->get($entryId);
	}

	public function getEntriesByIds($ids)
	{
        $ids = $this->_sanitizer->sanitizer($ids, 'arr');
		$statuses = array(
			Kaltura_Client_Enum_EntryStatus::ERROR_CONVERTING,
			Kaltura_Client_Enum_EntryStatus::ERROR_IMPORTING,
			Kaltura_Client_Enum_EntryStatus::IMPORT,
			Kaltura_Client_Enum_EntryStatus::PRECONVERT,
			Kaltura_Client_Enum_EntryStatus::READY);
		$filter  = new Kaltura_Client_Type_BaseEntryFilter();
		$filter->statusIn = implode(',', $statuses);
		if (is_array($ids))
			$filter->idIn = implode(',', $ids);
		else
			return array();
		$result = $this->_client->baseEntry->listAction($filter);

        return $result->objects;
	}

	public function updateBaseEntry($baseEntryId, Kaltura_Client_Type_BaseEntry $baseEntry)
	{
        $baseEntryId = $this->_sanitizer->sanitizer($baseEntryId, 'string');

        return $this->_client->baseEntry->update($baseEntryId, $baseEntry);
	}

	public function updateMediaEntry($mediaEntryId, $mediaEntry)
	{
        $mediaEntryId = $this->_sanitizer->sanitizer($mediaEntryId, 'string');

		return $this->_client->media->update($mediaEntryId, $mediaEntry);
	}

	public function listEntriesByTypes($types, $pageSize, $page)
	{
        $page = $this->_sanitizer->sanitizer($page, 'string');
        $pageSize = $this->_sanitizer->sanitizer($pageSize, 'int');

		$filter = new Kaltura_Client_Type_BaseEntryFilter();
		$filter->orderBy = Kaltura_Client_Enum_BaseEntryOrderBy::CREATED_AT_DESC;
		$filter->typeIn = $types;

		$pager  = new Kaltura_Client_Type_FilterPager();
		$pager->pageSize = $pageSize;
		$pager->pageIndex = $page;

		return $this->_client->baseEntry->listAction($filter, $pager);
	}

	public function listMediaEntries($pageSize, $page)
	{
        $page = $this->_sanitizer->sanitizer($page, 'string');
        $pageSize = $this->_sanitizer->sanitizer($pageSize, 'int');

		return $this->listEntriesByTypes(Kaltura_Client_Enum_EntryType::MEDIA_CLIP, $pageSize, $page);
	}

	public function listEntries($pageSize, $page)
	{
        $page = $this->_sanitizer->sanitizer($page, 'string');
        $pageSize = $this->_sanitizer->sanitizer($pageSize, 'int');

		$types = implode(",", array(Kaltura_Client_Enum_EntryType::MEDIA_CLIP));
		return $this->listEntriesByTypes($types, $pageSize, $page);
	}

    public function listRootCategory($pageSize, $page, $categories)
    {
        $page = $this->_sanitizer->sanitizer($page, 'string');
        $pageSize = $this->_sanitizer->sanitizer($pageSize, 'int');

        $filter = new Kaltura_Client_Type_BaseEntryFilter();
        $filter->orderBy = "-createdAt";
        /** If no category queried then query the root category. */
        if (!$categories)
        {
            $categories = array(KalturaHelpers::getOption("kaltura_root_category"));
        }
        $pager = new Kaltura_Client_Type_FilterPager();
        $pager->pageSize = $pageSize;
        $pager->pageIndex = $page;
    }

    public function listEntriesByCategoriesAndWord($pageSize, $page, $categories, $word)
    {
        $page = $this->_sanitizer->sanitizer($page, 'string');
        $pageSize = $this->_sanitizer->sanitizer($pageSize, 'int');
        $word = $this->_sanitizer->sanitizer($word, 'string');
        $categories = $this->_sanitizer->sanitizer($categories, 'arr');

        $rootCategory = $this->_sanitizer->sanitizer(KalturaHelpers::getOption("kaltura_root_category"), 'string');
        $rootCategory = !empty($rootCategory) ? $rootCategory : 0;
        $filter = new Kaltura_Client_Type_BaseEntryFilter();
        $filter->orderBy = "-createdAt";
        $filter->typeIn = Kaltura_Client_Enum_EntryType::MEDIA_CLIP;


        $filter->categoryAncestorIdIn = null;
        $filter->categoriesIdsMatchOr = '';

        /** If no category queried then query the root category. */
        if (!$categories)
        {
            if($rootCategory) {
                $categories = array($rootCategory);
                $filter->categoryAncestorIdIn = join(', ', $categories);
            }
        }
        else // Query the relevant categories.
        {
            $filter->categoriesIdsMatchOr = join(', ', $categories);
        }
        $filter->searchTextMatchOr = $word;

        $pager = new Kaltura_Client_Type_FilterPager();
        $pager->pageSize = $pageSize;
        $pager->pageIndex = $page;

        return $this->_client->baseEntry->listAction($filter, $pager);
    }

	public function listAllEntriesByCategory($category)
	{
		$filter  = new Kaltura_Client_Type_BaseEntryFilter();
		$filter->orderBy = Kaltura_Client_Enum_BaseEntryOrderBy::CREATED_AT_DESC;
		$filter->categoriesMatchOr = $category;

        $filter->typeIn = Kaltura_Client_Enum_EntryType::MEDIA_CLIP;

		$pager = new Kaltura_Client_Type_FilterPager();
		$pager->pageSize = 500;
		$pager->pageIndex = 1;
		$entries = array();
		while (true)
		{
			$result = $this->_client->baseEntry->listAction($filter, $pager);
			$entries = array_merge($entries, $result->objects);
			if (count($result->objects) == 0 || count($result->objects) == $result->totalCount)
				break;
			$pager->pageIndex++;
		}
		return $entries;
	}

	public function deleteEntry($mediaEntryId)
	{
        $mediaEntryId = $this->_sanitizer->sanitizer($mediaEntryId, 'string');

        return $this->_client->baseEntry->delete($mediaEntryId);
	}

	public function pingTest()
	{
		try
		{
			return $this->_client->system->ping();
		}
		catch(Exception $ex)
		{
			return false;
		}
	}

	public function registerPartner($partner)
	{
		$config = $this->_client->getConfig();
		$this->_client->setKs(null);
		$config->partnerId = null;
		$oldTimeout = $config->curlTimeout;
		$config->curlTimeout = 40;
		$result = $this->_client->partner->register($partner);
		$config->curlTimeout = $oldTimeout;
		return $result;
	}

	public function listUserEntries($userId, $pageSize, $page)
	{
        $page = $this->_sanitizer->sanitizer($page, 'string');
        $pageSize = $this->_sanitizer->sanitizer($pageSize, 'int');
        $userId = $this->_sanitizer->sanitizer($userId , 'string');

		$filter = new Kaltura_Client_Type_BaseEntryFilter();
		$filter->orderBy = "-createdAt";
		$filter->userIdEqual = $userId;

		$pager = new Kaltura_Client_Type_FilterPager();
		$pager->pageSize = $pageSize;
		$pager->pageIndex = $page;

		return $this->_client->baseEntry->listAction($filter, $pager);
	}

	public function listRootCategoriesOrderByName()
	{
		$filter = new Kaltura_Client_Type_CategoryFilter();
		$filter->orderBy = Kaltura_Client_Enum_CategoryOrderBy::FULL_NAME_ASC;
		$filter->depthEqual = 0; // for now, support only top level
		return $this->_client->category->listAction($filter);
	}

    public function generateRootTree()
    {
        $filter = new Kaltura_Client_Type_CategoryFilter();
        $filter->orderBy = Kaltura_Client_Enum_CategoryOrderBy::FULL_NAME_ASC;
        return $this->_client->category->listAction($filter);

    }

    public function listSelectedRootCategories()
    {
        $rootCategory = !empty($rootCategory) ? $rootCategory : 0;
        $filter = new Kaltura_Client_Type_CategoryFilter();
        $filter->orderBy = Kaltura_Client_Enum_CategoryOrderBy::FULL_NAME_ASC;
        if ($rootCategory && $rootCategory != '0') {
            $filter->ancestorIdIn = $rootCategory;
        }

        return $this->_client->category->listAction($filter);
    }

	public function listUiConfs()
	{
		$filter = new Kaltura_Client_Type_UiConfFilter();
		$filter->orderBy = Kaltura_Client_Enum_UiConfOrderBy::CREATED_AT_DESC;
		return $this->_client->uiConf->listAction($filter);
	}

	public function listPlayersUiConfs()
	{
		$filter = new Kaltura_Client_Type_UiConfFilter();
		$filter->objTypeEqual = Kaltura_Client_Enum_UiConfObjType::PLAYER;
		$filter->orderBy = Kaltura_Client_Enum_UiConfOrderBy::CREATED_AT_DESC;
        $filter->creationModeIn = "1,2";

		try
		{
			$uiConfs = $this->_client->uiConf->listAction($filter);
		}
		catch(Kaltura_Client_Exception $ex)
		{
			$uiConfs = new stdClass();
			$uiConfs->objects = array();
		}

        $playerIds = KalturaHelpers::getOption('default_players');
        $uiConfs->objects = array_reverse($uiConfs->objects); // default players should be first
        foreach ($playerIds as $playerId)
        {
            $name = KalturaHelpers::getOption('player.'.$playerId.'.name');
            $width = KalturaHelpers::getOption('player.'.$playerId.'.width');
            $height = KalturaHelpers::getOption('player.'.$playerId.'.height');
            if (!$name)
                $name = "Untitled player";

            $tempUiConf         = new Kaltura_Client_Type_UiConf();
            $tempUiConf->id     = $playerId;
            $tempUiConf->name   = $name;
            $tempUiConf->width  = $width;
            $tempUiConf->height = $height;
            $uiConfs->objects[] = $tempUiConf;
            $uiConfs->totalCount++;
        }
        $uiConfs->objects = array_reverse($uiConfs->objects);

        return $uiConfs;
	}

    public function listKCWUiConfs()
    {
        $filter = new Kaltura_Client_Type_UiConfFilter();
        $filter->objTypeEqual = Kaltura_Client_Enum_UiConfObjType::CONTRIBUTION_WIZARD;
        $pager = new Kaltura_Client_Type_FilterPager;
        $pager->pageSize = 1000;

        try
        {
            $uiConfs = $this->_client->uiConf->listAction($filter, $pager);
        }
        catch(Kaltura_Client_Exception $ex)
        {
            $uiConfs = new stdClass();
            $uiConfs->objects = array();
        }

        foreach ($uiConfs->objects as $key => $kcw)
        {

            if (strpos($kcw->swfUrl, 'ContributionWizard.swf') === false)
            {
                unset($uiConfs->objects[$key]);
                $uiConfs->totalCount--;
            }
        }

        return $uiConfs;
    }

	public function getPlayerUiConf($uiConfId)
	{
        $uiConfId = $this->_sanitizer->sanitizer($uiConfId, 'string');

		return $this->_client->uiConf->get($uiConfId);
	}

	public function getEntryMetadata($entryId, $metadataProfileId)
	{
        $metadataProfileId = $this->_sanitizer->sanitizer($metadataProfileId, 'string');
        $entryId = $this->_sanitizer->sanitizer($entryId, 'string');

		$filter = new Kaltura_Client_Metadata_Type_MetadataFilter();
		$filter->objectIdEqual = $entryId;
		$filter->metadataProfileIdEqual = $metadataProfileId;
		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get($this->_client);

		return $metadataPlugin->metadata->listAction($filter);
	}

	public function updateEntryMetadata($metadataId, $xmlData)
	{
		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get($this->_client);

        return $metadataPlugin->metadata->update($metadataId, $xmlData);
	}

	public function addEntryMetadata($metadataProfileId, $entryId, $xmlData)
	{
        $metadataProfileId = $this->_sanitizer->sanitizer($metadataProfileId, 'string');
        $entryId = $this->_sanitizer->sanitizer($entryId, 'string');

        $metadataPlugin = Kaltura_Client_Metadata_Plugin::get($this->_client);
		$objectType = Kaltura_Client_Metadata_Enum_MetadataObjectType::ENTRY;

		return $metadataPlugin->metadata->add($metadataProfileId, $objectType, $entryId, $xmlData);
	}

	public function getMetadataProfilesTypeEntry()
	{
		$filter = new Kaltura_Client_Metadata_Type_MetadataProfileFilter();
		$filter->metadataObjectTypeEqual = Kaltura_Client_Metadata_Enum_MetadataObjectType::ENTRY;
		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get($this->_client);

        return $metadataPlugin->metadataProfile->listAction($filter);
	}

	public function getMetadataProfileFields($metadataProfileId)
	{
        $metadataProfileId = $this->_sanitizer->sanitizer($metadataProfileId, 'string');

		$metadataPlugin = Kaltura_Client_Metadata_Plugin::get($this->_client);

        return $metadataPlugin->metadataProfile->listFields($metadataProfileId);
	}

	public function updateEntryPermalinkMetadata($entryId, $permalink, $metadataProfileId, $metadataFieldName)
	{
        $entryId = $this->_sanitizer->sanitizer($entryId, 'string');
        $permalink = $this->_sanitizer->sanitizer($permalink, 'string');
        $metadataProfileId = $this->_sanitizer->sanitizer($metadataProfileId, 'string');
        $metadataFieldName = $this->_sanitizer->sanitizer($metadataFieldName, 'string');

        $result = $this->getEntryMetadata($entryId, $metadataProfileId);
		$xmlData = '<metadata><'.$metadataFieldName.'>'.$permalink.'</'.$metadataFieldName.'></metadata>';
		if($result->totalCount == 0)
		{
			$this->addEntryMetadata($metadataProfileId, $entryId, $xmlData);
		}
		else
		{
			/* @var $metadata Kaltura_Client_Metadata_Type_Metadata */
			$metadata = $result->objects[0];
			$this->updateEntryMetadata($metadata->id, $xmlData);
		}
	}

	public function updateEntryPermalink($postId)
	{
        $postId = $this->_sanitizer->sanitizer($postId, 'int');
		$metadataProfileId = KalturaHelpers::getOption('kaltura_permalink_metadata_profile_id');
		$metadataFieldsResponse = $this->getMetadataProfileFields($metadataProfileId);

		// the metadata profile should have only one field.
		if ($metadataFieldsResponse->totalCount != 1)
			return;

		$metadataField = $metadataFieldsResponse->objects[0];
		$permalink = get_permalink($postId);
		$content = KalturaHelpers::getRequestPostParam('content');
		if (!$content)
			return;

		$matches = null;
		if (preg_match_all('/entryid=\\\\"([^\\\\]*)/', $content, $matches))
		{
			foreach ($matches[1] as $entryId)
			{
				$this->updateEntryPermalinkMetadata($entryId, $permalink, $metadataProfileId, $metadataField->key);
			}
		}
	}
}