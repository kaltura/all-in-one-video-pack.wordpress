<?php
class KalturaModel 
{
	function getKshow($kalturaClient, $kshowId) 
	{
		$sessionUser = kalturaGetSessionUser();
		$result = $kalturaClient->getKShow($sessionUser, $kshowId, true);
		return @$result["result"]["kshow"];
	}
	
	function updateKshow($kalturaClient, $kshowId, $kshowUpdate)
	{
		$sessionUser = kalturaGetSessionUser();
		$kalturaClient->updateKShow($sessionUser, $kshowId, $kshowUpdate);
	}
	
	function getKshows($kalturaAdminClient, $pageSize, $page)
	{
		$sessionUser = kalturaGetSessionUser();
					
		$filter = new KalturaKShowFilter();
		$filter->orderBy = KalturaKShowFilter_ORDER_BY_CREATED_AT_DESC;
		$result = $kalturaAdminClient->listKShows($sessionUser, $filter, true, $pageSize, $page);
		return $result["result"];
	}
	
	function addKshow($kalturaClient, $kshow)
	{
		$sessionUser = kalturaGetSessionUser();
		$res = $kalturaClient->addKShow($sessionUser, $kshow);
		return @$res["result"]["kshow"]["id"];
	}

	function getPartner($kalturaClient, $email, $password, $partnerId)
	{
		$sessionUser = kalturaGetSessionUser();
		$res = $kalturaClient->getPartner($sessionUser, $email, $password, $partnerId);
		return @$res;
	}

	function getLastKshow($kalturaClient)
	{
		$sessionUser = kalturaGetSessionUser();
		$filter = new KalturaKShowFilter();
		$filter->orderBy = KalturaKShowFilter_ORDER_BY_CREATED_AT_DESC;
		$res = $kalturaClient->listMyKShows($sessionUser, $filter, "true", 1, 1);
		return @$res["result"]["kshows"][0];
	}
	
	function deleteKShow($kalturaAdminClient, $kshowId)
	{
		$sessionUser = kalturaGetSessionUser();
		return $kalturaAdminClient->deleteKShow($sessionUser, $kshowId);
	}
	
	function addWidget($kalturaClient, $kshowId, $uiConfId) 
	{
		$sessionUser = kalturaGetSessionUser();
		$widget = new KalturaWidget();
		$widget->kshowId = $kshowId;
		$widget->uiConfId = $uiConfId;
		$result = $kalturaClient->addwidget($sessionUser, $widget);
		return @$result["result"]["widget"]["id"];
	}
	
	function getWidget($kalturaClient, $widgetId) 
	{
		$sessionUser = kalturaGetSessionUser();
		$result = $kalturaClient->getWidget($sessionUser, $widgetId);
		return @$result["result"]["widget"];
	}
	
	function pingTest($kalturaClient)
	{
		$sessionUser = kalturaGetSessionUser();
		$res = $kalturaClient->ping($sessionUser);
		if (@$res["result"]["status"] == "ok")
			return true;
		else
			return false;
	}
}
?>