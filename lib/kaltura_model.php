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
        $secret = get_option("kaltura_admin_secret");
		return $this->client->session->start($secret, $userId, KalturaSessionType_ADMIN, $partnerId, 86400, $privileges);        
    }
    
    function getClientSideSession($privileges = "")
    {
        $userId = KalturaHelpers::getLoggedUserId();
        $partnerId = get_option("kaltura_partner_id");
        $secret = get_option("kaltura_secret");
		return $this->client->session->start($secret, $userId, KalturaSessionType_USER, $partnerId, 86400, $privileges);        
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
		$filter->orderBy = "-createdAt";
		
		$pager = new KalturaFilterPager();
		$pager->pageSize = $pageSize;
		$pager->pageIndex = $page;
		
		return $this->client->baseEntry->listAction($filter, $pager);
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
}
?>