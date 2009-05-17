<?php
require_once("kaltura_client_base.php");

define("KalturaEntryStatus_ERROR_CONVERTING", -1);
define("KalturaEntryStatus_IMPORT", 0);
define("KalturaEntryStatus_PRECONVERT", 1);
define("KalturaEntryStatus_READY", 2);
define("KalturaEntryStatus_DELETED", 3);
define("KalturaEntryStatus_PENDING", 4);
define("KalturaEntryStatus_MODERATE", 5);
define("KalturaEntryStatus_BLOCKED", 6);

define("KalturaEntryType_MEDIA_CLIP", 1);
define("KalturaEntryType_MIX", 2);
define("KalturaEntryType_PLAYLIST", 5);

define("KalturaLicenseType_UNKNOWN", -1);
define("KalturaLicenseType_NONE", 0);
define("KalturaLicenseType_CC25", 1);
define("KalturaLicenseType_CC3", 2);

define("KalturaMediaType_VIDEO", 1);
define("KalturaMediaType_IMAGE", 2);
define("KalturaMediaType_AUDIO", 5);

define("KalturaSourceType_FILE", 1);
define("KalturaSourceType_WEBCAM", 2);
define("KalturaSourceType_URL", 5);
define("KalturaSourceType_SEARCH_PROVIDER", 6);

define("KalturaSearchProviderType_FLICKR", 3);
define("KalturaSearchProviderType_YOUTUBE", 4);
define("KalturaSearchProviderType_MYSPACE", 7);
define("KalturaSearchProviderType_PHOTOBUCKET", 8);
define("KalturaSearchProviderType_JAMENDO", 9);
define("KalturaSearchProviderType_CCMIXTER", 10);
define("KalturaSearchProviderType_NYPL", 11);
define("KalturaSearchProviderType_CURRENT", 12);
define("KalturaSearchProviderType_MEDIA_COMMONS", 13);
define("KalturaSearchProviderType_KALTURA", 20);
define("KalturaSearchProviderType_KALTURA_USER_CLIPS", 21);
define("KalturaSearchProviderType_ARCHIVE_ORG", 22);
define("KalturaSearchProviderType_KALTURA_PARTNER", 23);
define("KalturaSearchProviderType_METACAFE", 24);
define("KalturaSearchProviderType_SEARCH_PROXY", 28);

class KalturaMediaEntry extends KalturaObjectBase
{
	/**
	 * Auto generated 10 characters alphanumeric string
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Entry name
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * Entry description
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The ID of the user who is the owner of this entry 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * Entry tags
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators and are not visible to the user
	 *
	 * @var string
	 */
	var $adminTags = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 *
	 * @var KalturaEntryType
	 * @readonly
	 */
	var $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Calculated rank
	 *
	 * @var int
	 * @readonly
	 */
	var $rank = null;

	/**
	 * The total (sum) of all votes
	 *
	 * @var int
	 * @readonly
	 */
	var $totalRank = null;

	/**
	 * Number of votes
	 *
	 * @var int
	 * @readonly
	 */
	var $votes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupId = null;

	/**
	 * Can be used to store various partner related data as a string 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * Download URL for the entry
	 *
	 * @var string
	 * @readonly
	 */
	var $downloadUrl = null;

	/**
	 * License type used for this entry
	 *
	 * @var KalturaLicenseType
	 */
	var $licenseType = null;

	/**
	 * Number of plays
	 *
	 * @var int
	 * @readonly
	 */
	var $plays = null;

	/**
	 * Number of views
	 *
	 * @var int
	 * @readonly
	 */
	var $views = null;

	/**
	 * The width in pixels
	 *
	 * @var int
	 * @readonly
	 */
	var $width = null;

	/**
	 * The height in pixels
	 *
	 * @var int
	 * @readonly
	 */
	var $height = null;

	/**
	 * Thumbnail URL
	 *
	 * @var string
	 * @readonly
	 */
	var $thumbnailUrl = null;

	/**
	 * The duration in seconds
	 *
	 * @var int
	 * @readonly
	 */
	var $duration = null;

	/**
	 * The media type of the entry
	 *
	 * @var KalturaMediaType
	 * @insertonly
	 */
	var $mediaType = null;

	/**
	 * Override the default conversion quality  
	 *
	 * @var string
	 * @insertonly
	 */
	var $conversionQuality = null;

	/**
	 * The source type of the entry 
	 *
	 * @var KalturaSourceType
	 * @readonly
	 */
	var $sourceType = null;

	/**
	 * The search provider type used to import this entry
	 *
	 * @var KalturaSearchProviderType
	 * @readonly
	 */
	var $searchProviderType = null;

	/**
	 * The ID of the media in the importing site
	 *
	 * @var string
	 * @readonly
	 */
	var $searchProviderId = null;

	/**
	 * The user name used for credits
	 *
	 * @var string
	 */
	var $creditUserName = null;

	/**
	 * The URL for credits
	 *
	 * @var string
	 */
	var $creditUrl = null;

	/**
	 * The media date extracted from EXIF data (For images) as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $mediaDate = null;

	/**
	 * The URL used for playback. This is not the download URL.
	 *
	 * @var string
	 * @readonly
	 */
	var $dataUrl = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "name", $this->name);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "userId", $this->userId);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "adminTags", $this->adminTags);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "type", $this->type);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "rank", $this->rank);
		$this->addIfNotNull($kparams, "totalRank", $this->totalRank);
		$this->addIfNotNull($kparams, "votes", $this->votes);
		$this->addIfNotNull($kparams, "groupId", $this->groupId);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		$this->addIfNotNull($kparams, "downloadUrl", $this->downloadUrl);
		$this->addIfNotNull($kparams, "licenseType", $this->licenseType);
		$this->addIfNotNull($kparams, "plays", $this->plays);
		$this->addIfNotNull($kparams, "views", $this->views);
		$this->addIfNotNull($kparams, "width", $this->width);
		$this->addIfNotNull($kparams, "height", $this->height);
		$this->addIfNotNull($kparams, "thumbnailUrl", $this->thumbnailUrl);
		$this->addIfNotNull($kparams, "duration", $this->duration);
		$this->addIfNotNull($kparams, "mediaType", $this->mediaType);
		$this->addIfNotNull($kparams, "conversionQuality", $this->conversionQuality);
		$this->addIfNotNull($kparams, "sourceType", $this->sourceType);
		$this->addIfNotNull($kparams, "searchProviderType", $this->searchProviderType);
		$this->addIfNotNull($kparams, "searchProviderId", $this->searchProviderId);
		$this->addIfNotNull($kparams, "creditUserName", $this->creditUserName);
		$this->addIfNotNull($kparams, "creditUrl", $this->creditUrl);
		$this->addIfNotNull($kparams, "mediaDate", $this->mediaDate);
		$this->addIfNotNull($kparams, "dataUrl", $this->dataUrl);
		return $kparams;
	}
}

class KalturaSearchResult extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $keyWords = null;

	/**
	 * 
	 *
	 * @var KalturaSearchProviderType
	 */
	var $searchSource = null;

	/**
	 * 
	 *
	 * @var KalturaMediaType
	 */
	var $mediaType = null;

	/**
	 * Use this field to pass dynamic data for searching
	 * For example - if you set this field to "mymovies_$partner_id"
	 * The $partner_id will be automatically replcaed with your real partner Id
	 *
	 * @var string
	 */
	var $extraData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $title = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $url = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $sourceLink = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $credit = null;

	/**
	 * 
	 *
	 * @var KalturaLicenseType
	 */
	var $licenseType = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "keyWords", $this->keyWords);
		$this->addIfNotNull($kparams, "searchSource", $this->searchSource);
		$this->addIfNotNull($kparams, "mediaType", $this->mediaType);
		$this->addIfNotNull($kparams, "extraData", $this->extraData);
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "title", $this->title);
		$this->addIfNotNull($kparams, "thumbUrl", $this->thumbUrl);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "url", $this->url);
		$this->addIfNotNull($kparams, "sourceLink", $this->sourceLink);
		$this->addIfNotNull($kparams, "credit", $this->credit);
		$this->addIfNotNull($kparams, "licenseType", $this->licenseType);
		return $kparams;
	}
}

class KalturaMediaEntryFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $typeIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $modifiedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $modifiedAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $moderationStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $moderationStatusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsAndNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsAndNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $searchTextMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $searchTextMatchOr = null;

	/**
	 * 
	 *
	 * @var KalturaMediaType
	 */
	var $mediaTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $mediaTypeIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $mediaDateGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $mediaDateLessThanEqual = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "idEqual", $this->idEqual);
		$this->addIfNotNull($kparams, "idIn", $this->idIn);
		$this->addIfNotNull($kparams, "userIdEqual", $this->userIdEqual);
		$this->addIfNotNull($kparams, "typeIn", $this->typeIn);
		$this->addIfNotNull($kparams, "statusEqual", $this->statusEqual);
		$this->addIfNotNull($kparams, "statusIn", $this->statusIn);
		$this->addIfNotNull($kparams, "nameLike", $this->nameLike);
		$this->addIfNotNull($kparams, "nameMultiLikeOr", $this->nameMultiLikeOr);
		$this->addIfNotNull($kparams, "nameMultiLikeAnd", $this->nameMultiLikeAnd);
		$this->addIfNotNull($kparams, "nameEqual", $this->nameEqual);
		$this->addIfNotNull($kparams, "tagsLike", $this->tagsLike);
		$this->addIfNotNull($kparams, "tagsMultiLikeOr", $this->tagsMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsMultiLikeAnd", $this->tagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "adminTagsLike", $this->adminTagsLike);
		$this->addIfNotNull($kparams, "adminTagsMultiLikeOr", $this->adminTagsMultiLikeOr);
		$this->addIfNotNull($kparams, "adminTagsMultiLikeAnd", $this->adminTagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "groupIdEqual", $this->groupIdEqual);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThenEqual", $this->createdAtLessThenEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThenEqual", $this->updatedAtLessThenEqual);
		$this->addIfNotNull($kparams, "modifiedAtGreaterThanEqual", $this->modifiedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "modifiedAtLessThenEqual", $this->modifiedAtLessThenEqual);
		$this->addIfNotNull($kparams, "partnerIdEqual", $this->partnerIdEqual);
		$this->addIfNotNull($kparams, "partnerIdIn", $this->partnerIdIn);
		$this->addIfNotNull($kparams, "moderationStatusEqual", $this->moderationStatusEqual);
		$this->addIfNotNull($kparams, "moderationStatusIn", $this->moderationStatusIn);
		$this->addIfNotNull($kparams, "tagsAndNameMultiLikeOr", $this->tagsAndNameMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsMultiLikeOr", $this->tagsAndAdminTagsMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsAndNameMultiLikeOr", $this->tagsAndAdminTagsAndNameMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndNameMultiLikeAnd", $this->tagsAndNameMultiLikeAnd);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsMultiLikeAnd", $this->tagsAndAdminTagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsAndNameMultiLikeAnd", $this->tagsAndAdminTagsAndNameMultiLikeAnd);
		$this->addIfNotNull($kparams, "searchTextMatchAnd", $this->searchTextMatchAnd);
		$this->addIfNotNull($kparams, "searchTextMatchOr", $this->searchTextMatchOr);
		$this->addIfNotNull($kparams, "mediaTypeEqual", $this->mediaTypeEqual);
		$this->addIfNotNull($kparams, "mediaTypeIn", $this->mediaTypeIn);
		$this->addIfNotNull($kparams, "mediaDateGreaterThanEqual", $this->mediaDateGreaterThanEqual);
		$this->addIfNotNull($kparams, "mediaDateLessThanEqual", $this->mediaDateLessThanEqual);
		return $kparams;
	}
}

class KalturaFilterPager extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $pageSize = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $pageIndex = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "pageSize", $this->pageSize);
		$this->addIfNotNull($kparams, "pageIndex", $this->pageIndex);
		return $kparams;
	}
}

class KalturaMediaListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaMediaEntries
	 * @readonly
	 */
	var $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $totalCount = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "totalCount", $this->totalCount);
		return $kparams;
	}
}

define("KalturaEditorType_SIMPLE", 1);
define("KalturaEditorType_ADVANCED", 2);

class KalturaMixEntry extends KalturaObjectBase
{
	/**
	 * Auto generated 10 characters alphanumeric string
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Entry name
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * Entry description
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The ID of the user who is the owner of this entry 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * Entry tags
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators and are not visible to the user
	 *
	 * @var string
	 */
	var $adminTags = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 *
	 * @var KalturaEntryType
	 * @readonly
	 */
	var $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Calculated rank
	 *
	 * @var int
	 * @readonly
	 */
	var $rank = null;

	/**
	 * The total (sum) of all votes
	 *
	 * @var int
	 * @readonly
	 */
	var $totalRank = null;

	/**
	 * Number of votes
	 *
	 * @var int
	 * @readonly
	 */
	var $votes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupId = null;

	/**
	 * Can be used to store various partner related data as a string 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * Download URL for the entry
	 *
	 * @var string
	 * @readonly
	 */
	var $downloadUrl = null;

	/**
	 * License type used for this entry
	 *
	 * @var KalturaLicenseType
	 */
	var $licenseType = null;

	/**
	 * Number of plays
	 *
	 * @var int
	 * @readonly
	 */
	var $plays = null;

	/**
	 * Number of views
	 *
	 * @var int
	 * @readonly
	 */
	var $views = null;

	/**
	 * The width in pixels
	 *
	 * @var int
	 * @readonly
	 */
	var $width = null;

	/**
	 * The height in pixels
	 *
	 * @var int
	 * @readonly
	 */
	var $height = null;

	/**
	 * Thumbnail URL
	 *
	 * @var string
	 * @readonly
	 */
	var $thumbnailUrl = null;

	/**
	 * The duration in seconds
	 *
	 * @var int
	 * @readonly
	 */
	var $duration = null;

	/**
	 * Indicates whether the user has submited a real thumbnail to the mix (Not the one that was generated automaticaly)
	 *
	 * @var bool
	 * @readonly
	 */
	var $hasRealThumbnail = null;

	/**
	 * The editor type used to edit the metadata
	 *
	 * @var KalturaEditorType
	 */
	var $editorType = null;

	/**
	 * The xml data of the mix
	 *
	 * @var string
	 */
	var $dataContent = null;

	/**
	 * The version of the mix
	 *
	 * @var int
	 * @readonly
	 */
	var $version = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "name", $this->name);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "userId", $this->userId);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "adminTags", $this->adminTags);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "type", $this->type);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "rank", $this->rank);
		$this->addIfNotNull($kparams, "totalRank", $this->totalRank);
		$this->addIfNotNull($kparams, "votes", $this->votes);
		$this->addIfNotNull($kparams, "groupId", $this->groupId);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		$this->addIfNotNull($kparams, "downloadUrl", $this->downloadUrl);
		$this->addIfNotNull($kparams, "licenseType", $this->licenseType);
		$this->addIfNotNull($kparams, "plays", $this->plays);
		$this->addIfNotNull($kparams, "views", $this->views);
		$this->addIfNotNull($kparams, "width", $this->width);
		$this->addIfNotNull($kparams, "height", $this->height);
		$this->addIfNotNull($kparams, "thumbnailUrl", $this->thumbnailUrl);
		$this->addIfNotNull($kparams, "duration", $this->duration);
		$this->addIfNotNull($kparams, "hasRealThumbnail", $this->hasRealThumbnail);
		$this->addIfNotNull($kparams, "editorType", $this->editorType);
		$this->addIfNotNull($kparams, "dataContent", $this->dataContent);
		$this->addIfNotNull($kparams, "version", $this->version);
		return $kparams;
	}
}

class KalturaMixEntryFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $typeIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $modifiedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $modifiedAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $moderationStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $moderationStatusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsAndNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsAndNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $searchTextMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $searchTextMatchOr = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "idEqual", $this->idEqual);
		$this->addIfNotNull($kparams, "idIn", $this->idIn);
		$this->addIfNotNull($kparams, "userIdEqual", $this->userIdEqual);
		$this->addIfNotNull($kparams, "typeIn", $this->typeIn);
		$this->addIfNotNull($kparams, "statusEqual", $this->statusEqual);
		$this->addIfNotNull($kparams, "statusIn", $this->statusIn);
		$this->addIfNotNull($kparams, "nameLike", $this->nameLike);
		$this->addIfNotNull($kparams, "nameMultiLikeOr", $this->nameMultiLikeOr);
		$this->addIfNotNull($kparams, "nameMultiLikeAnd", $this->nameMultiLikeAnd);
		$this->addIfNotNull($kparams, "nameEqual", $this->nameEqual);
		$this->addIfNotNull($kparams, "tagsLike", $this->tagsLike);
		$this->addIfNotNull($kparams, "tagsMultiLikeOr", $this->tagsMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsMultiLikeAnd", $this->tagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "adminTagsLike", $this->adminTagsLike);
		$this->addIfNotNull($kparams, "adminTagsMultiLikeOr", $this->adminTagsMultiLikeOr);
		$this->addIfNotNull($kparams, "adminTagsMultiLikeAnd", $this->adminTagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "groupIdEqual", $this->groupIdEqual);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThenEqual", $this->createdAtLessThenEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThenEqual", $this->updatedAtLessThenEqual);
		$this->addIfNotNull($kparams, "modifiedAtGreaterThanEqual", $this->modifiedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "modifiedAtLessThenEqual", $this->modifiedAtLessThenEqual);
		$this->addIfNotNull($kparams, "partnerIdEqual", $this->partnerIdEqual);
		$this->addIfNotNull($kparams, "partnerIdIn", $this->partnerIdIn);
		$this->addIfNotNull($kparams, "moderationStatusEqual", $this->moderationStatusEqual);
		$this->addIfNotNull($kparams, "moderationStatusIn", $this->moderationStatusIn);
		$this->addIfNotNull($kparams, "tagsAndNameMultiLikeOr", $this->tagsAndNameMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsMultiLikeOr", $this->tagsAndAdminTagsMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsAndNameMultiLikeOr", $this->tagsAndAdminTagsAndNameMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndNameMultiLikeAnd", $this->tagsAndNameMultiLikeAnd);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsMultiLikeAnd", $this->tagsAndAdminTagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsAndNameMultiLikeAnd", $this->tagsAndAdminTagsAndNameMultiLikeAnd);
		$this->addIfNotNull($kparams, "searchTextMatchAnd", $this->searchTextMatchAnd);
		$this->addIfNotNull($kparams, "searchTextMatchOr", $this->searchTextMatchOr);
		return $kparams;
	}
}

class KalturaMixListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaMixEntries
	 * @readonly
	 */
	var $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $totalCount = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "totalCount", $this->totalCount);
		return $kparams;
	}
}

class KalturaBaseEntry extends KalturaObjectBase
{
	/**
	 * Auto generated 10 characters alphanumeric string
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Entry name
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * Entry description
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The ID of the user who is the owner of this entry 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * Entry tags
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators and are not visible to the user
	 *
	 * @var string
	 */
	var $adminTags = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 *
	 * @var KalturaEntryType
	 * @readonly
	 */
	var $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Calculated rank
	 *
	 * @var int
	 * @readonly
	 */
	var $rank = null;

	/**
	 * The total (sum) of all votes
	 *
	 * @var int
	 * @readonly
	 */
	var $totalRank = null;

	/**
	 * Number of votes
	 *
	 * @var int
	 * @readonly
	 */
	var $votes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupId = null;

	/**
	 * Can be used to store various partner related data as a string 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * Download URL for the entry
	 *
	 * @var string
	 * @readonly
	 */
	var $downloadUrl = null;

	/**
	 * License type used for this entry
	 *
	 * @var KalturaLicenseType
	 */
	var $licenseType = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "name", $this->name);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "userId", $this->userId);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "adminTags", $this->adminTags);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "type", $this->type);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "rank", $this->rank);
		$this->addIfNotNull($kparams, "totalRank", $this->totalRank);
		$this->addIfNotNull($kparams, "votes", $this->votes);
		$this->addIfNotNull($kparams, "groupId", $this->groupId);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		$this->addIfNotNull($kparams, "downloadUrl", $this->downloadUrl);
		$this->addIfNotNull($kparams, "licenseType", $this->licenseType);
		return $kparams;
	}
}

class KalturaBaseEntryFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $typeIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $modifiedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $modifiedAtLessThenEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $moderationStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $moderationStatusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsAndNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAndAdminTagsAndNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $searchTextMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $searchTextMatchOr = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "idEqual", $this->idEqual);
		$this->addIfNotNull($kparams, "idIn", $this->idIn);
		$this->addIfNotNull($kparams, "userIdEqual", $this->userIdEqual);
		$this->addIfNotNull($kparams, "typeIn", $this->typeIn);
		$this->addIfNotNull($kparams, "statusEqual", $this->statusEqual);
		$this->addIfNotNull($kparams, "statusIn", $this->statusIn);
		$this->addIfNotNull($kparams, "nameLike", $this->nameLike);
		$this->addIfNotNull($kparams, "nameMultiLikeOr", $this->nameMultiLikeOr);
		$this->addIfNotNull($kparams, "nameMultiLikeAnd", $this->nameMultiLikeAnd);
		$this->addIfNotNull($kparams, "nameEqual", $this->nameEqual);
		$this->addIfNotNull($kparams, "tagsLike", $this->tagsLike);
		$this->addIfNotNull($kparams, "tagsMultiLikeOr", $this->tagsMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsMultiLikeAnd", $this->tagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "adminTagsLike", $this->adminTagsLike);
		$this->addIfNotNull($kparams, "adminTagsMultiLikeOr", $this->adminTagsMultiLikeOr);
		$this->addIfNotNull($kparams, "adminTagsMultiLikeAnd", $this->adminTagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "groupIdEqual", $this->groupIdEqual);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThenEqual", $this->createdAtLessThenEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThenEqual", $this->updatedAtLessThenEqual);
		$this->addIfNotNull($kparams, "modifiedAtGreaterThanEqual", $this->modifiedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "modifiedAtLessThenEqual", $this->modifiedAtLessThenEqual);
		$this->addIfNotNull($kparams, "partnerIdEqual", $this->partnerIdEqual);
		$this->addIfNotNull($kparams, "partnerIdIn", $this->partnerIdIn);
		$this->addIfNotNull($kparams, "moderationStatusEqual", $this->moderationStatusEqual);
		$this->addIfNotNull($kparams, "moderationStatusIn", $this->moderationStatusIn);
		$this->addIfNotNull($kparams, "tagsAndNameMultiLikeOr", $this->tagsAndNameMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsMultiLikeOr", $this->tagsAndAdminTagsMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsAndNameMultiLikeOr", $this->tagsAndAdminTagsAndNameMultiLikeOr);
		$this->addIfNotNull($kparams, "tagsAndNameMultiLikeAnd", $this->tagsAndNameMultiLikeAnd);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsMultiLikeAnd", $this->tagsAndAdminTagsMultiLikeAnd);
		$this->addIfNotNull($kparams, "tagsAndAdminTagsAndNameMultiLikeAnd", $this->tagsAndAdminTagsAndNameMultiLikeAnd);
		$this->addIfNotNull($kparams, "searchTextMatchAnd", $this->searchTextMatchAnd);
		$this->addIfNotNull($kparams, "searchTextMatchOr", $this->searchTextMatchOr);
		return $kparams;
	}
}

class KalturaBaseEntryListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaBaseEntries
	 * @readonly
	 */
	var $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $totalCount = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "totalCount", $this->totalCount);
		return $kparams;
	}
}

define("KalturaSessionType_USER", 0);
define("KalturaSessionType_ADMIN", 2);

define("KalturaUiConfObjType_PLAYER", 1);
define("KalturaUiConfObjType_CONTRIBUTION_WIZARD", 2);
define("KalturaUiConfObjType_SIMPLE_EDITOR", 3);
define("KalturaUiConfObjType_ADVANCED_EDITOR", 4);
define("KalturaUiConfObjType_PLAYLIST", 5);
define("KalturaUiConfObjType_APP_STUDIO", 6);

define("KalturaUiConfCreationMode_WIZARD", 2);
define("KalturaUiConfCreationMode_ADVANCED", 3);

class KalturaUiConf extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Name of the uiConf, this is not a primary key
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var KalturaUiConfObjType
	 */
	var $objType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $objTypeAsString = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $width = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $height = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $htmlParams = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $swfUrl = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $confFilePath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $confFile = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $confFileFeatures = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $confVars = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $useCdn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $swfUrlVersion = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

	/**
	 * Enter description here...
	 *
	 * @var KalturaUiConfCreationMode
	 */
	var $creationMode = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "name", $this->name);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "objType", $this->objType);
		$this->addIfNotNull($kparams, "objTypeAsString", $this->objTypeAsString);
		$this->addIfNotNull($kparams, "width", $this->width);
		$this->addIfNotNull($kparams, "height", $this->height);
		$this->addIfNotNull($kparams, "htmlParams", $this->htmlParams);
		$this->addIfNotNull($kparams, "swfUrl", $this->swfUrl);
		$this->addIfNotNull($kparams, "confFilePath", $this->confFilePath);
		$this->addIfNotNull($kparams, "confFile", $this->confFile);
		$this->addIfNotNull($kparams, "confFileFeatures", $this->confFileFeatures);
		$this->addIfNotNull($kparams, "confVars", $this->confVars);
		$this->addIfNotNull($kparams, "useCdn", $this->useCdn);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "swfUrlVersion", $this->swfUrlVersion);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "updatedAt", $this->updatedAt);
		$this->addIfNotNull($kparams, "creationMode", $this->creationMode);
		return $kparams;
	}
}

class KalturaUiConfFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $idGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtLessThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtLessThanEqual = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "idGreaterThanEqual", $this->idGreaterThanEqual);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "nameLike", $this->nameLike);
		$this->addIfNotNull($kparams, "tagsMultiLikeOr", $this->tagsMultiLikeOr);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThanEqual", $this->createdAtLessThanEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThanEqual", $this->updatedAtLessThanEqual);
		return $kparams;
	}
}

define("KalturaPlaylistType_DYNAMIC", 10);
define("KalturaPlaylistType_STATIC_LIST", 3);
define("KalturaPlaylistType_EXTERNAL", 101);

class KalturaPlaylist extends KalturaObjectBase
{
	/**
	 * Auto generated 10 characters alphanumeric string
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Entry name
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * Entry description
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The ID of the user who is the owner of this entry 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * Entry tags
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators and are not visible to the user
	 *
	 * @var string
	 */
	var $adminTags = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 *
	 * @var KalturaEntryType
	 * @readonly
	 */
	var $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Calculated rank
	 *
	 * @var int
	 * @readonly
	 */
	var $rank = null;

	/**
	 * The total (sum) of all votes
	 *
	 * @var int
	 * @readonly
	 */
	var $totalRank = null;

	/**
	 * Number of votes
	 *
	 * @var int
	 * @readonly
	 */
	var $votes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupId = null;

	/**
	 * Can be used to store various partner related data as a string 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * Download URL for the entry
	 *
	 * @var string
	 * @readonly
	 */
	var $downloadUrl = null;

	/**
	 * License type used for this entry
	 *
	 * @var KalturaLicenseType
	 */
	var $licenseType = null;

	/**
	 * Content of the playlist - 
	 *
	 * @var string
	 */
	var $playlistContent = null;

	/**
	 * Type of playlist  
	 *
	 * @var KalturaPlaylistType
	 */
	var $playlistType = null;

	/**
	 * Number of plays
	 *
	 * @var int
	 * @readonly
	 */
	var $plays = null;

	/**
	 * Number of views
	 *
	 * @var int
	 * @readonly
	 */
	var $views = null;

	/**
	 * The duration in seconds
	 *
	 * @var int
	 * @readonly
	 */
	var $duration = null;

	/**
	 * The version of the file
	 *
	 * @var string
	 * @readonly
	 */
	var $version = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "name", $this->name);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "userId", $this->userId);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "adminTags", $this->adminTags);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "type", $this->type);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "rank", $this->rank);
		$this->addIfNotNull($kparams, "totalRank", $this->totalRank);
		$this->addIfNotNull($kparams, "votes", $this->votes);
		$this->addIfNotNull($kparams, "groupId", $this->groupId);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		$this->addIfNotNull($kparams, "downloadUrl", $this->downloadUrl);
		$this->addIfNotNull($kparams, "licenseType", $this->licenseType);
		$this->addIfNotNull($kparams, "playlistContent", $this->playlistContent);
		$this->addIfNotNull($kparams, "playlistType", $this->playlistType);
		$this->addIfNotNull($kparams, "plays", $this->plays);
		$this->addIfNotNull($kparams, "views", $this->views);
		$this->addIfNotNull($kparams, "duration", $this->duration);
		$this->addIfNotNull($kparams, "version", $this->version);
		return $kparams;
	}
}

class KalturaPlaylistFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $idGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtLessThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtLessThanEqual = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "idGreaterThanEqual", $this->idGreaterThanEqual);
		$this->addIfNotNull($kparams, "statusEqual", $this->statusEqual);
		$this->addIfNotNull($kparams, "nameLike", $this->nameLike);
		$this->addIfNotNull($kparams, "tagsMultiLikeOr", $this->tagsMultiLikeOr);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThanEqual", $this->createdAtLessThanEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThanEqual", $this->updatedAtLessThanEqual);
		return $kparams;
	}
}

class KalturaUser extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $screenName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $fullName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $email = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $dateOfBirth = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $country = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $state = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $city = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $zip = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $urlList = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $picture = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $icon = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $aboutMe = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $mobileNum = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $gender = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $views = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $fans = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $entries = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $producedKshows = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $status = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Entry update date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $displayInSearch = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerData = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "screenName", $this->screenName);
		$this->addIfNotNull($kparams, "fullName", $this->fullName);
		$this->addIfNotNull($kparams, "email", $this->email);
		$this->addIfNotNull($kparams, "dateOfBirth", $this->dateOfBirth);
		$this->addIfNotNull($kparams, "country", $this->country);
		$this->addIfNotNull($kparams, "state", $this->state);
		$this->addIfNotNull($kparams, "city", $this->city);
		$this->addIfNotNull($kparams, "zip", $this->zip);
		$this->addIfNotNull($kparams, "urlList", $this->urlList);
		$this->addIfNotNull($kparams, "picture", $this->picture);
		$this->addIfNotNull($kparams, "icon", $this->icon);
		$this->addIfNotNull($kparams, "aboutMe", $this->aboutMe);
		$this->addIfNotNull($kparams, "tags", $this->tags);
		$this->addIfNotNull($kparams, "mobileNum", $this->mobileNum);
		$this->addIfNotNull($kparams, "gender", $this->gender);
		$this->addIfNotNull($kparams, "views", $this->views);
		$this->addIfNotNull($kparams, "fans", $this->fans);
		$this->addIfNotNull($kparams, "entries", $this->entries);
		$this->addIfNotNull($kparams, "producedKshows", $this->producedKshows);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "updatedAt", $this->updatedAt);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "displayInSearch", $this->displayInSearch);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		return $kparams;
	}
}

class KalturaUserFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $screenNameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $emailLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $countryLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $emailLikeRegexp = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtLessThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtLessThanEqual = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "screenNameLike", $this->screenNameLike);
		$this->addIfNotNull($kparams, "tagsLike", $this->tagsLike);
		$this->addIfNotNull($kparams, "emailLike", $this->emailLike);
		$this->addIfNotNull($kparams, "countryLike", $this->countryLike);
		$this->addIfNotNull($kparams, "emailLikeRegexp", $this->emailLikeRegexp);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThanEqual", $this->createdAtLessThanEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThanEqual", $this->updatedAtLessThanEqual);
		return $kparams;
	}
}

define("KalturaWidgetSecurityType_NONE", 1);
define("KalturaWidgetSecurityType_TIMEHASH", 2);

class KalturaWidget extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $sourceWidgetId = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $rootWidgetId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $kshowId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $uiConfId = null;

	/**
	 * 
	 *
	 * @var KalturaWidgetSecurityType
	 */
	var $securityType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $securityPolicy = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $widgetHTML = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "sourceWidgetId", $this->sourceWidgetId);
		$this->addIfNotNull($kparams, "rootWidgetId", $this->rootWidgetId);
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "kshowId", $this->kshowId);
		$this->addIfNotNull($kparams, "entryId", $this->entryId);
		$this->addIfNotNull($kparams, "uiConfId", $this->uiConfId);
		$this->addIfNotNull($kparams, "securityType", $this->securityType);
		$this->addIfNotNull($kparams, "securityPolicy", $this->securityPolicy);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "updatedAt", $this->updatedAt);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		$this->addIfNotNull($kparams, "widgetHTML", $this->widgetHTML);
		return $kparams;
	}
}

class KalturaWidgetFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $sourceWidgetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $rootWidgetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $uiConfId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $createdAtLessThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtGreaterThanEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updatedAtLessThanEqual = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "orderBy", $this->orderBy);
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "sourceWidgetId", $this->sourceWidgetId);
		$this->addIfNotNull($kparams, "rootWidgetId", $this->rootWidgetId);
		$this->addIfNotNull($kparams, "entryId", $this->entryId);
		$this->addIfNotNull($kparams, "uiConfId", $this->uiConfId);
		$this->addIfNotNull($kparams, "partnerData", $this->partnerData);
		$this->addIfNotNull($kparams, "createdAtGreaterThanEqual", $this->createdAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "createdAtLessThanEqual", $this->createdAtLessThanEqual);
		$this->addIfNotNull($kparams, "updatedAtGreaterThanEqual", $this->updatedAtGreaterThanEqual);
		$this->addIfNotNull($kparams, "updatedAtLessThanEqual", $this->updatedAtLessThanEqual);
		return $kparams;
	}
}

class KalturaSearch extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $keyWords = null;

	/**
	 * 
	 *
	 * @var KalturaSearchProviderType
	 */
	var $searchSource = null;

	/**
	 * 
	 *
	 * @var KalturaMediaType
	 */
	var $mediaType = null;

	/**
	 * Use this field to pass dynamic data for searching
	 * For example - if you set this field to "mymovies_$partner_id"
	 * The $partner_id will be automatically replcaed with your real partner Id
	 *
	 * @var string
	 */
	var $extraData = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "keyWords", $this->keyWords);
		$this->addIfNotNull($kparams, "searchSource", $this->searchSource);
		$this->addIfNotNull($kparams, "mediaType", $this->mediaType);
		$this->addIfNotNull($kparams, "extraData", $this->extraData);
		return $kparams;
	}
}

class KalturaPartner extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $website = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $notificationUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $appearInSearch = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminEmail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $commercialUse = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $landingPage = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userLandingPage = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $contentCategories = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $phone = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $describeYourself = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $adultContent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $defConversionProfileType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $notify = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $allowQuickEdit = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $mergeEntryLists = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $notificationsConfig = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $maxUploadSize = null;

	/**
	 * readonly
	 *
	 * @var int
	 */
	var $partnerPackage = null;

	/**
	 * readonly
	 *
	 * @var string
	 */
	var $secret = null;

	/**
	 * readonly
	 *
	 * @var string
	 */
	var $adminSecret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $cmsPassword = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "id", $this->id);
		$this->addIfNotNull($kparams, "name", $this->name);
		$this->addIfNotNull($kparams, "website", $this->website);
		$this->addIfNotNull($kparams, "notificationUrl", $this->notificationUrl);
		$this->addIfNotNull($kparams, "appearInSearch", $this->appearInSearch);
		$this->addIfNotNull($kparams, "createdAt", $this->createdAt);
		$this->addIfNotNull($kparams, "adminName", $this->adminName);
		$this->addIfNotNull($kparams, "adminEmail", $this->adminEmail);
		$this->addIfNotNull($kparams, "description", $this->description);
		$this->addIfNotNull($kparams, "commercialUse", $this->commercialUse);
		$this->addIfNotNull($kparams, "landingPage", $this->landingPage);
		$this->addIfNotNull($kparams, "userLandingPage", $this->userLandingPage);
		$this->addIfNotNull($kparams, "contentCategories", $this->contentCategories);
		$this->addIfNotNull($kparams, "type", $this->type);
		$this->addIfNotNull($kparams, "phone", $this->phone);
		$this->addIfNotNull($kparams, "describeYourself", $this->describeYourself);
		$this->addIfNotNull($kparams, "adultContent", $this->adultContent);
		$this->addIfNotNull($kparams, "defConversionProfileType", $this->defConversionProfileType);
		$this->addIfNotNull($kparams, "notify", $this->notify);
		$this->addIfNotNull($kparams, "status", $this->status);
		$this->addIfNotNull($kparams, "allowQuickEdit", $this->allowQuickEdit);
		$this->addIfNotNull($kparams, "mergeEntryLists", $this->mergeEntryLists);
		$this->addIfNotNull($kparams, "notificationsConfig", $this->notificationsConfig);
		$this->addIfNotNull($kparams, "maxUploadSize", $this->maxUploadSize);
		$this->addIfNotNull($kparams, "partnerPackage", $this->partnerPackage);
		$this->addIfNotNull($kparams, "secret", $this->secret);
		$this->addIfNotNull($kparams, "adminSecret", $this->adminSecret);
		$this->addIfNotNull($kparams, "cmsPassword", $this->cmsPassword);
		return $kparams;
	}
}

class KalturaPartnerUsage extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var float
	 * @readonly
	 */
	var $hostingGB = null;

	/**
	 * 
	 *
	 * @var float
	 * @readonly
	 */
	var $Percent = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $packageBW = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $usageGB = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $reachedLimitDate = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $usageGraph = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "hostingGB", $this->hostingGB);
		$this->addIfNotNull($kparams, "Percent", $this->Percent);
		$this->addIfNotNull($kparams, "packageBW", $this->packageBW);
		$this->addIfNotNull($kparams, "usageGB", $this->usageGB);
		$this->addIfNotNull($kparams, "reachedLimitDate", $this->reachedLimitDate);
		$this->addIfNotNull($kparams, "usageGraph", $this->usageGraph);
		return $kparams;
	}
}

class KalturaAdminUser extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $password = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $email = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $screenName = null;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "password", $this->password);
		$this->addIfNotNull($kparams, "email", $this->email);
		$this->addIfNotNull($kparams, "screenName", $this->screenName);
		return $kparams;
	}
}

class KalturaAdminLoginResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $subpId = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $ks = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $uid = null;

	/**
	 * 
	 *
	 * @var KalturaAdminUser
	 * @readonly
	 */
	var $adminUser;


	function toParams()
	{
		$kparams = array();
		$this->addIfNotNull($kparams, "partnerId", $this->partnerId);
		$this->addIfNotNull($kparams, "subpId", $this->subpId);
		$this->addIfNotNull($kparams, "ks", $this->ks);
		$this->addIfNotNull($kparams, "uid", $this->uid);
		return $kparams;
	}
}


class KalturaMediaService extends KalturaServiceBase
{
	function KalturaMediaService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function addFromUrl($mediaEntry, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("media", "addFromUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function addFromSearchResult($mediaEntry = null, $searchResult)
	{
		$kparams = array();
		if ($mediaEntry !== null)
			$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "searchResult", $searchResult->toParams());
		$resultObject = $this->client->callService("media", "addFromSearchResult", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function addFromUploadedFile($mediaEntry, $uploadTokenId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$resultObject = $this->client->callService("media", "addFromUploadedFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function get($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("media", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function update($entryId, $mediaEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$resultObject = $this->client->callService("media", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function delete($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("media", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("media", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaListResponse");
		return $resultObject;
	}

	function updateThumbnail($entryId, $timeOffset)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "timeOffset", $timeOffset);
		$resultObject = $this->client->callService("media", "updateThumbnail", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function requestConversion($entryId, $fileFormat)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileFormat", $fileFormat);
		$resultObject = $this->client->callService("media", "requestConversion", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "int");
		return $resultObject;
	}
}

class KalturaMixingService extends KalturaServiceBase
{
	function KalturaMixingService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($mixEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mixEntry", $mixEntry->toParams());
		$resultObject = $this->client->callService("mixing", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMixEntry");
		return $resultObject;
	}

	function get($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("mixing", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMixEntry");
		return $resultObject;
	}

	function update($entryId, $mixEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "mixEntry", $mixEntry->toParams());
		$resultObject = $this->client->callService("mixing", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMixEntry");
		return $resultObject;
	}

	function delete($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("mixing", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("mixing", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMixListResponse");
		return $resultObject;
	}

	function cloneAction($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("mixing", "clone", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMixEntry");
		return $resultObject;
	}

	function appendMediaEntry($mixEntryId, $mediaEntryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mixEntryId", $mixEntryId);
		$this->client->addParam($kparams, "mediaEntryId", $mediaEntryId);
		$resultObject = $this->client->callService("mixing", "appendMediaEntry", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMixEntry");
		return $resultObject;
	}

	function requestFlattening($entryId, $fileFormat, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileFormat", $fileFormat);
		$this->client->addParam($kparams, "version", $version);
		$resultObject = $this->client->callService("mixing", "requestFlattening", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "int");
		return $resultObject;
	}
}

class KalturaBaseEntryService extends KalturaServiceBase
{
	function KalturaBaseEntryService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function get($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("baseentry", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function delete($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("baseentry", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("baseentry", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntryListResponse");
		return $resultObject;
	}
}

class KalturaSessionService extends KalturaServiceBase
{
	function KalturaSessionService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function start($partnerId, $secret, $userId, $type = 0, $expiry = 86400, $privileges = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "expiry", $expiry);
		$this->client->addParam($kparams, "privileges", $privileges);
		$resultObject = $this->client->callService("session", "start", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function startWidgetSession($widgetId, $expiry = 86400)
	{
		$kparams = array();
		$this->client->addParam($kparams, "widgetId", $widgetId);
		$this->client->addParam($kparams, "expiry", $expiry);
		$resultObject = $this->client->callService("session", "startWidgetSession", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}
}

class KalturaUiConfService extends KalturaServiceBase
{
	function KalturaUiConfService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($uiConf)
	{
		$kparams = array();
		$this->client->addParam($kparams, "uiConf", $uiConf->toParams());
		$resultObject = $this->client->callService("uiconf", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUiConf");
		return $resultObject;
	}

	function update($id, $uiConf)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "uiConf", $uiConf->toParams());
		$resultObject = $this->client->callService("uiconf", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUiConf");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("uiconf", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUiConf");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("uiconf", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function cloneAction($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("uiconf", "clone", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUiConf");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("uiconf", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

class KalturaPlaylistService extends KalturaServiceBase
{
	function KalturaPlaylistService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($playlist, $updateStats = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "playlist", $playlist->toParams());
		$this->client->addParam($kparams, "updateStats", $updateStats);
		$resultObject = $this->client->callService("playlist", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaylist");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("playlist", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaylist");
		return $resultObject;
	}

	function update($id, $playlist, $updateStats = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "playlist", $playlist->toParams());
		$this->client->addParam($kparams, "updateStats", $updateStats);
		$resultObject = $this->client->callService("playlist", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUiConf");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("playlist", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaylist");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("playlist", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function execute($id, $detailed = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "detailed", $detailed);
		$resultObject = $this->client->callService("playlist", "execute", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function executeFromContent($playlistType, $playlistContent, $detailed = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "playlistType", $playlistType);
		$this->client->addParam($kparams, "playlistContent", $playlistContent);
		$this->client->addParam($kparams, "detailed", $detailed);
		$resultObject = $this->client->callService("playlist", "executeFromContent", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function getStatsFromContent($playlistType, $playlistContent)
	{
		$kparams = array();
		$this->client->addParam($kparams, "playlistType", $playlistType);
		$this->client->addParam($kparams, "playlistContent", $playlistContent);
		$resultObject = $this->client->callService("playlist", "getStatsFromContent", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

class KalturaUserService extends KalturaServiceBase
{
	function KalturaUserService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($id, $user)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "user", $user->toParams());
		$resultObject = $this->client->callService("user", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function update($id, $user)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "user", $user->toParams());
		$resultObject = $this->client->callService("user", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function updateid($id, $newId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "newId", $newId);
		$resultObject = $this->client->callService("user", "updateid", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("user", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("user", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("user", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

class KalturaWidgetService extends KalturaServiceBase
{
	function KalturaWidgetService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($widget)
	{
		$kparams = array();
		$this->client->addParam($kparams, "widget", $widget->toParams());
		$resultObject = $this->client->callService("widget", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaWidget");
		return $resultObject;
	}

	function update($id, $widget)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "widget", $widget->toParams());
		$resultObject = $this->client->callService("widget", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaWidget");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("widget", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaWidget");
		return $resultObject;
	}

	function cloneAction($widget)
	{
		$kparams = array();
		$this->client->addParam($kparams, "widget", $widget->toParams());
		$resultObject = $this->client->callService("widget", "clone", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaWidget");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("widget", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

class KalturaSearchService extends KalturaServiceBase
{
	function KalturaSearchService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function search($partnerId, $search, $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "search", $search->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("search", "search", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function getmediainfo($partnerId, $searchResult)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "searchResult", $searchResult->toParams());
		$resultObject = $this->client->callService("search", "getmediainfo", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchResult");
		return $resultObject;
	}

	function searchurl($partnerId, $mediaType, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "mediaType", $mediaType);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("search", "searchurl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchResult");
		return $resultObject;
	}
}

class KalturaPartnerService extends KalturaServiceBase
{
	function KalturaPartnerService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function register($partner, $cmsPassword = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "partner", $partner->toParams());
		$this->client->addParam($kparams, "cmsPassword", $cmsPassword);
		$resultObject = $this->client->callService("partner", "register", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	function update($partner, $allowEmpty = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partner", $partner->toParams());
		$this->client->addParam($kparams, "allowEmpty", $allowEmpty);
		$resultObject = $this->client->callService("partner", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	function getsecrets($partnerId, $adminEmail, $cmsPassword)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "adminEmail", $adminEmail);
		$this->client->addParam($kparams, "cmsPassword", $cmsPassword);
		$resultObject = $this->client->callService("partner", "getsecrets", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	function getinfo()
	{
		$kparams = array();
		$resultObject = $this->client->callService("partner", "getinfo", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	function getusage($year, $month = 1, $resolution = "days")
	{
		$kparams = array();
		$this->client->addParam($kparams, "year", $year);
		$this->client->addParam($kparams, "month", $month);
		$this->client->addParam($kparams, "resolution", $resolution);
		$resultObject = $this->client->callService("partner", "getusage", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartnerUsage");
		return $resultObject;
	}
}

class KalturaAdminuserService extends KalturaServiceBase
{
	function KalturaAdminuserService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function updatepassword($email, $password, $newEmail = "", $newPassword = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$this->client->addParam($kparams, "password", $password);
		$this->client->addParam($kparams, "newEmail", $newEmail);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$resultObject = $this->client->callService("adminuser", "updatepassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAdminUser");
		return $resultObject;
	}

	function resetpassword($email)
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$resultObject = $this->client->callService("adminuser", "resetpassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function login($email, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$this->client->addParam($kparams, "password", $password);
		$resultObject = $this->client->callService("adminuser", "login", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAdminLoginResponse");
		return $resultObject;
	}
}

class KalturaSystemService extends KalturaServiceBase
{
	function KalturaSystemService($client)
	{
		parent::KalturaServiceBase($client);
	}

	function ping()
	{
		$kparams = array();
		$resultObject = $this->client->callService("system", "ping", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "bool");
		return $resultObject;
	}
}

class KalturaClient extends KalturaClientBase
{
	/**
	 * Media Service
	 *
	 * @var KalturaMediaService
	 */
	var $media = null;

	/**
	 * Mixing Service
	 *
	 * @var KalturaMixingService
	 */
	var $mixing = null;

	/**
	 * Base Entry Service
	 *
	 * @var KalturaBaseEntryService
	 */
	var $baseEntry = null;

	/**
	 * Session service
	 *
	 * @var KalturaSessionService
	 */
	var $session = null;

	/**
	 * UiConf service lets you create and manage your UIConfs for the various flash components
	 * This service is used by the KMC-ApplicationStudio
	 *
	 * @var KalturaUiConfService
	 */
	var $uiConf = null;

	/**
	 * Playlist service lets you create,manage and play your playlists
	 * Playlists could be static (containing a fixed list of entries) or dynamic (baseed on a filter)
	 *
	 * @var KalturaPlaylistService
	 */
	var $playlist = null;

	/**
	 * Manage partner users on Kaltura's side
	 * The userId in kaltura is the unique Id in the partner's system, and the [partnerId,Id] couple are unique key in kaltura's DB
	 *
	 * @var KalturaUserService
	 */
	var $user = null;

	/**
	 * widget service for full widget management
	 *
	 * @var KalturaWidgetService
	 */
	var $widget = null;

	/**
	 * Search service allows you to search for media in various media providers
	 * This service is being used mostly by the CW component
	 *
	 * @var KalturaSearchService
	 */
	var $search = null;

	/**
	 * partner service allows you to change/manage your partner personal details and settings as well
	 *
	 * @var KalturaPartnerService
	 */
	var $partner = null;

	/**
	 * adminuser service
	 *
	 * @var KalturaAdminuserService
	 */
	var $adminuser = null;

	/**
	 * System Service
	 *
	 * @var KalturaSystemService
	 */
	var $system = null;


	function KalturaClient($config)
	{
		parent::KalturaClientBase($config);
		$this->media = new KalturaMediaService(&$this);
		$this->mixing = new KalturaMixingService(&$this);
		$this->baseEntry = new KalturaBaseEntryService(&$this);
		$this->session = new KalturaSessionService(&$this);
		$this->uiConf = new KalturaUiConfService(&$this);
		$this->playlist = new KalturaPlaylistService(&$this);
		$this->user = new KalturaUserService(&$this);
		$this->widget = new KalturaWidgetService(&$this);
		$this->search = new KalturaSearchService(&$this);
		$this->partner = new KalturaPartnerService(&$this);
		$this->adminuser = new KalturaAdminuserService(&$this);
		$this->system = new KalturaSystemService(&$this);
	}
}
