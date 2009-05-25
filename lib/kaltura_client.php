<?php
require_once("kaltura_client_base.php");

define("KalturaEditorType_SIMPLE", 1);
define("KalturaEditorType_ADVANCED", 2);

define("KalturaEntryStatus_ERROR_CONVERTING", -1);
define("KalturaEntryStatus_IMPORT", 0);
define("KalturaEntryStatus_PRECONVERT", 1);
define("KalturaEntryStatus_READY", 2);
define("KalturaEntryStatus_DELETED", 3);
define("KalturaEntryStatus_PENDING", 4);
define("KalturaEntryStatus_MODERATE", 5);
define("KalturaEntryStatus_BLOCKED", 6);

define("KalturaEntryType_AUTOMATIC", -1);
define("KalturaEntryType_MEDIA_CLIP", 1);
define("KalturaEntryType_MIX", 2);
define("KalturaEntryType_PLAYLIST", 5);
define("KalturaEntryType_DATA", 6);
define("KalturaEntryType_DOCUMENT", 10);

define("KalturaLicenseType_UNKNOWN", -1);
define("KalturaLicenseType_NONE", 0);
define("KalturaLicenseType_CC25", 1);
define("KalturaLicenseType_CC3", 2);

define("KalturaMediaType_VIDEO", 1);
define("KalturaMediaType_IMAGE", 2);
define("KalturaMediaType_AUDIO", 5);

define("KalturaNotificationType_ENTRY_ADD", 1);
define("KalturaNotificationType_ENTR_UPDATE_PERMISSIONS", 2);
define("KalturaNotificationType_ENTRY_DELETE", 3);
define("KalturaNotificationType_ENTRY_BLOCK", 4);
define("KalturaNotificationType_ENTRY_UPDATE", 5);
define("KalturaNotificationType_ENTRY_UPDATE_THUMBNAIL", 6);
define("KalturaNotificationType_ENTRY_UPDATE_MODERATION", 7);
define("KalturaNotificationType_USER_ADD", 21);
define("KalturaNotificationType_USER_BANNED", 26);

define("KalturaPlaylistType_DYNAMIC", 10);
define("KalturaPlaylistType_STATIC_LIST", 3);
define("KalturaPlaylistType_EXTERNAL", 101);

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

define("KalturaSessionType_USER", 0);
define("KalturaSessionType_ADMIN", 2);

define("KalturaSourceType_FILE", 1);
define("KalturaSourceType_WEBCAM", 2);
define("KalturaSourceType_URL", 5);
define("KalturaSourceType_SEARCH_PROVIDER", 6);

define("KalturaUiConfCreationMode_WIZARD", 2);
define("KalturaUiConfCreationMode_ADVANCED", 3);

define("KalturaUiConfObjType_PLAYER", 1);
define("KalturaUiConfObjType_CONTRIBUTION_WIZARD", 2);
define("KalturaUiConfObjType_SIMPLE_EDITOR", 3);
define("KalturaUiConfObjType_ADVANCED_EDITOR", 4);
define("KalturaUiConfObjType_PLAYLIST", 5);
define("KalturaUiConfObjType_APP_STUDIO", 6);

define("KalturaWidgetSecurityType_NONE", 1);
define("KalturaWidgetSecurityType_TIMEHASH", 2);

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


}

class KalturaBaseEntryFilter extends KalturaObjectBase
{
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


}

class KalturaClientNotification extends KalturaObjectBase
{
	/**
	 * The URL where the notification should be sent to 
	 *
	 * @var string
	 */
	var $url = null;

	/**
	 * The serialized notification data to send
	 *
	 * @var string
	 */
	var $data = null;


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


}

class KalturaPlayableEntry extends KalturaBaseEntry
{
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


}

class KalturaMediaEntry extends KalturaPlayableEntry
{
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


}

class KalturaMediaEntryFilter extends KalturaBaseEntryFilter
{
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


}

class KalturaMixEntry extends KalturaPlayableEntry
{
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


}

class KalturaMixEntryFilter extends KalturaBaseEntryFilter
{

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


}

class KalturaPlaylist extends KalturaBaseEntry
{
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


}

class KalturaPlaylistFilter extends KalturaObjectBase
{
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


}

class KalturaSearchResult extends KalturaSearch
{
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

	/**
	 * 
	 *
	 * @var string
	 */
	var $flashPlaybackType = null;


}

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


}

class KalturaUiConfFilter extends KalturaObjectBase
{
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


}

class KalturaUserFilter extends KalturaObjectBase
{
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


}

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


}

class KalturaWidgetFilter extends KalturaObjectBase
{
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


}


class KalturaMediaService extends KalturaServiceBase
{
	function KalturaMediaService(&$client)
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
	function KalturaMixingService(&$client)
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
	function KalturaBaseEntryService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function addFromUploadedFile($entry, $uploadTokenId, $type = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entry", $entry->toParams());
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$this->client->addParam($kparams, "type", $type);
		$resultObject = $this->client->callService("baseentry", "addFromUploadedFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
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
	function KalturaSessionService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function start($secret, $userId, $type = 0, $partnerId = -1, $expiry = 86400, $privileges = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "partnerId", $partnerId);
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
	function KalturaUiConfService(&$client)
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
	function KalturaPlaylistService(&$client)
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
	function KalturaUserService(&$client)
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
	function KalturaWidgetService(&$client)
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
	function KalturaSearchService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function search($search, $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "search", $search->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("search", "search", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function getMediaInfo($searchResult)
	{
		$kparams = array();
		$this->client->addParam($kparams, "searchResult", $searchResult->toParams());
		$resultObject = $this->client->callService("search", "getMediaInfo", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchResult");
		return $resultObject;
	}

	function searchUrl($mediaType, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaType", $mediaType);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("search", "searchUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchResult");
		return $resultObject;
	}
}

class KalturaPartnerService extends KalturaServiceBase
{
	function KalturaPartnerService(&$client)
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
	function KalturaAdminuserService(&$client)
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
	function KalturaSystemService(&$client)
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

class KalturaNotificationService extends KalturaServiceBase
{
	function KalturaNotificationService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function getClientNotification($entryId, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "type", $type);
		$resultObject = $this->client->callService("notification", "getClientNotification", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaClientNotification");
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

	/**
	 * Notification Service
	 *
	 * @var KalturaNotificationService
	 */
	var $notification = null;


	function KalturaClient($config)
	{
		parent::KalturaClientBase(/*KalturaConfiguration*/ $config);
		$this->media = new KalturaMediaService($this);
		$this->mixing = new KalturaMixingService($this);
		$this->baseEntry = new KalturaBaseEntryService($this);
		$this->session = new KalturaSessionService($this);
		$this->uiConf = new KalturaUiConfService($this);
		$this->playlist = new KalturaPlaylistService($this);
		$this->user = new KalturaUserService($this);
		$this->widget = new KalturaWidgetService($this);
		$this->search = new KalturaSearchService($this);
		$this->partner = new KalturaPartnerService($this);
		$this->adminuser = new KalturaAdminuserService($this);
		$this->system = new KalturaSystemService($this);
		$this->notification = new KalturaNotificationService($this);
	}
}
