<?php
class KalturaModel 
{
	var $session;
	
    function KalturaModel() 
    {
        $config = KalturaHelpers::getKalturaConfiguration();
        $this->client = &new KalturaClient($config); // & is needed because of the subclasses inititailzation inside the KalturaClient constructor        
    }
    
    function getInstance()
    {
        static $instance = null;
        
        if ($instance == null)    
        {
            $instance = &new KalturaModel();
        }
        
        return $instance;
    }

    function getLastError()
    {
        return $this->client->error;
    }
    
	function startSession()
    {
    	$ks = $this->getAdminSession("edit:*");
		$this->client->setKs($ks);
		$this->session = $ks;
    }
    
	function getAdminSession($privileges = "")
    {
        $userId = KalturaHelpers::getLoggedUserId();
        $partnerId = get_option("kaltura_partner_id");
		return $this->createKS($partnerId, $userId, KalturaSessionType_ADMIN, $privileges);        
    }
    
    function getClientSideSession($privileges = "", $expiry = 86400)
    {
        $userId = KalturaHelpers::getLoggedUserId();
        $partnerId = get_option("kaltura_partner_id");
        return $this->createKS($partnerId, $userId, KalturaSessionType_USER, $privileges, $expiry);
    }
    
	function createKS($partnerId, $userId, $sessionType = KalturaSessionType_USER, $privileges = "", $expiry = 86400)
	{
		$rand = rand(0, 32000);
		$rand = microtime(true);
		$expiry = time() + $expiry;
		$fields = array($partnerId, '', $expiry, $sessionType, $rand, $userId, $privileges);
		$str = implode(";", $fields);
		
		$salt = get_option("kaltura_admin_secret");
		$hashed_str = sha1($salt . $str) . "|" . $str;
		$decoded_str = base64_encode($hashed_str);
		
		return $decoded_str;
	}
   
    function getSecrets($partnerId, $email, $password)
    {
        return $this->client->partner->getSecrets($partnerId, $email, $password);
    }
    
	function getEntry($entryId) 
	{
		if (!$this->session)
			$this->startSession();
			
		return $this->client->baseEntry->get($entryId);
	}
	
	function updateMediaEntry($mediaEntryId, $mediaEntry)
	{
		if (!$this->session)
			$this->startSession();
			
		return $this->client->media->update($mediaEntryId, $mediaEntry);
	}
	
    function updateMixEntry($mixEntryId, $mediaEntry)
	{
		if (!$this->session)
			$this->startSession();
			
		return $this->client->mixing->update($mixEntryId, $mediaEntry);
	}
	
    function addMixEntry($mixEntry)
	{
		if (!$this->session)
			$this->startSession();
			
		return $this->client->mixing->add($mixEntry);
	}
	
	function appendMediaToMix($mixEntryId, $mediaEntryId)
	{
	    if (!$this->session)
			$this->startSession();
			
		return $this->client->mixing->appendMediaEntry($mixEntryId, $mediaEntryId);
	}
	
	function listEntries($pageSize, $page)
	{
		if (!$this->session)
			$this->startSession();
			
		$filter = new KalturaBaseEntryFilter();
		$filter->orderBy = KalturaBaseEntryOrderBy_CREATED_AT_DESC;
		$filter->typeIn = implode(",", array(KalturaEntryType_MEDIA_CLIP, KalturaEntryType_MIX));
		
		$pager = new KalturaFilterPager();
		$pager->pageSize = $pageSize;
		$pager->pageIndex = $page;
		
		return $this->client->baseEntry->listAction($filter, $pager);
	}
	
	function listAllEntriesByCategory($category)
	{
		if (!$this->session)
			$this->startSession();
			
		$filter = new KalturaBaseEntryFilter();
		$filter->orderBy = KalturaBaseEntryOrderBy_CREATED_AT_DESC;
		$filter->typeIn = implode(",", array(KalturaEntryType_MEDIA_CLIP, KalturaEntryType_MIX));
		$filter->categoriesMatchOr = $category;
		
		$pager = new KalturaFilterPager();
		$pager->pageSize = 500;
		$pager->pageIndex = 1;
		$entries = array();
		while(true)
		{
			$result = $this->client->baseEntry->listAction($filter, $pager);
			$entries = array_merge($entries, $result->objects);
			if (!count($result->objects) || count($result->objects) == $result->totalCount)
				break;
			$pager->pageIndex++;
		}
		return $entries;
	}

	function deleteEntry($mediaEntryId)
	{
		if (!$this->session)
			$this->startSession();
			
		return $this->client->baseEntry->delete($mediaEntryId);
	}
	
	function addWidget($entryId, $uiConfId) 
	{
		if (!$this->session)
			$this->startSession();
	
		$widget = new KalturaWidget();
		$widget->entryId = $entryId;
		$widget->uiConfId = $uiConfId;
		return $this->client->widget->add($widget);
	}
	
	function getWidget($widgetId) 
	{
		if (!$this->session)
			$this->startSession();
			
		return $this->client->widget->get($widgetId);
	}
	
	function pingTest()
	{
		return $this->client->system->ping();
	}
	
	function registerPartner($partner)
	{
	    return $this->client->partner->register($partner);
	}
	
	function listUserEntries($userId, $pageSize, $page)
	{
	    if (!$this->session)
			$this->startSession();
			
		$filter = new KalturaBaseEntryFilter();
		$filter->orderBy = "-createdAt";
		$filter->userIdEqual = $userId;
		
		$pager = new KalturaFilterPager();
		$pager->pageSize = $pageSize;
		$pager->pageIndex = $page;
		
		return $this->client->baseEntry->listAction($filter, $pager);
	}
	
	function listCategoriesOrderByName()
	{
		if (!$this->session)
			$this->startSession();
		$filter = new KalturaCategoryFilter();
		$filter->orderBy = KalturaCategoryOrderBy_FULL_NAME_ASC;
		$filter->depthEqual = 0; // for now, support only top level
		return $this->client->category->listAction($filter);
	}
	
	function listUiConfs()
	{
		if (!$this->session)
			$this->startSession();
		$filter = new KalturaUiConfFilter();
		$filter->orderBy = KalturaUiConfOrderBy_CREATED_AT_DESC;
		return $this->client->uiConf->listAction($filter);
	}
}
?>