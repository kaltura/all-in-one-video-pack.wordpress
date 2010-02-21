<?php
require_once("kaltura_client_base.php");

define("KalturaAccessControlOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaAccessControlOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaAudioCodec_NONE", "");
define("KalturaAudioCodec_MP3", "mp3");
define("KalturaAudioCodec_AAC", "aac");

define("KalturaBaseEntryOrderBy_NAME_ASC", "+name");
define("KalturaBaseEntryOrderBy_NAME_DESC", "-name");
define("KalturaBaseEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaBaseEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaBaseEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBaseEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaBaseEntryOrderBy_RANK_ASC", "+rank");
define("KalturaBaseEntryOrderBy_RANK_DESC", "-rank");

define("KalturaBaseJobOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBaseJobOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaBaseJobOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaBaseJobOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");

define("KalturaBaseSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaBaseSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaBaseSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaBaseSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaBaseSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaBaseSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaBaseSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBaseSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaBatchJobOrderBy_STATUS_ASC", "+status");
define("KalturaBatchJobOrderBy_STATUS_DESC", "-status");
define("KalturaBatchJobOrderBy_QUEUE_TIME_ASC", "+queueTime");
define("KalturaBatchJobOrderBy_QUEUE_TIME_DESC", "-queueTime");
define("KalturaBatchJobOrderBy_FINISH_TIME_ASC", "+finishTime");
define("KalturaBatchJobOrderBy_FINISH_TIME_DESC", "-finishTime");
define("KalturaBatchJobOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBatchJobOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaBatchJobOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaBatchJobOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");

define("KalturaBatchJobStatus_PENDING", 0);
define("KalturaBatchJobStatus_QUEUED", 1);
define("KalturaBatchJobStatus_PROCESSING", 2);
define("KalturaBatchJobStatus_PROCESSED", 3);
define("KalturaBatchJobStatus_MOVEFILE", 4);
define("KalturaBatchJobStatus_FINISHED", 5);
define("KalturaBatchJobStatus_FAILED", 6);
define("KalturaBatchJobStatus_ABORTED", 7);
define("KalturaBatchJobStatus_ALMOST_DONE", 8);
define("KalturaBatchJobStatus_RETRY", 9);
define("KalturaBatchJobStatus_FATAL", 10);
define("KalturaBatchJobStatus_DONT_PROCESS", 11);

define("KalturaBatchJobType_CONVERT", 0);
define("KalturaBatchJobType_IMPORT", 1);
define("KalturaBatchJobType_DELETE", 2);
define("KalturaBatchJobType_FLATTEN", 3);
define("KalturaBatchJobType_BULKUPLOAD", 4);
define("KalturaBatchJobType_DVDCREATOR", 5);
define("KalturaBatchJobType_DOWNLOAD", 6);
define("KalturaBatchJobType_OOCONVERT", 7);
define("KalturaBatchJobType_CONVERT_PROFILE", 10);
define("KalturaBatchJobType_POSTCONVERT", 11);
define("KalturaBatchJobType_PULL", 12);
define("KalturaBatchJobType_REMOTE_CONVERT", 13);
define("KalturaBatchJobType_EXTRACT_MEDIA", 14);
define("KalturaBatchJobType_MAIL", 15);
define("KalturaBatchJobType_NOTIFICATION", 16);
define("KalturaBatchJobType_CLEANUP", 17);
define("KalturaBatchJobType_SCHEDULER_HELPER", 18);
define("KalturaBatchJobType_BULKDOWNLOAD", 19);
define("KalturaBatchJobType_PROJECT", 1000);

define("KalturaCategoryOrderBy_DEPTH_ASC", "+depth");
define("KalturaCategoryOrderBy_DEPTH_DESC", "-depth");
define("KalturaCategoryOrderBy_FULL_NAME_ASC", "+fullName");
define("KalturaCategoryOrderBy_FULL_NAME_DESC", "-fullName");
define("KalturaCategoryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaCategoryOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaCommercialUseType_COMMERCIAL_USE", "commercial_use");
define("KalturaCommercialUseType_NON_COMMERCIAL_USE", "non-commercial_use");

define("KalturaContainerFormat_FLV", "flv");
define("KalturaContainerFormat_MP4", "mp4");
define("KalturaContainerFormat_AVI", "avi");
define("KalturaContainerFormat_MOV", "mov");
define("KalturaContainerFormat_MP3", "mp3");
define("KalturaContainerFormat__3GP", "3gp");

define("KalturaControlPanelCommandOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaControlPanelCommandOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaControlPanelCommandOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaControlPanelCommandOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaControlPanelCommandStatus_PENDING", 1);
define("KalturaControlPanelCommandStatus_HANDLED", 2);
define("KalturaControlPanelCommandStatus_DONE", 3);
define("KalturaControlPanelCommandStatus_FAILED", 4);

define("KalturaControlPanelCommandTargetType_DATA_CENTER", 1);
define("KalturaControlPanelCommandTargetType_SCHEDULER", 2);
define("KalturaControlPanelCommandTargetType_JOB_TYPE", 3);
define("KalturaControlPanelCommandTargetType_JOB", 4);
define("KalturaControlPanelCommandTargetType_BATCH", 5);

define("KalturaControlPanelCommandType_STOP", 1);
define("KalturaControlPanelCommandType_START", 2);
define("KalturaControlPanelCommandType_CONFIG", 3);
define("KalturaControlPanelCommandType_KILL", 4);

define("KalturaConversionProfileOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaConversionProfileOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaCountryRestrictionType_RESTRICT_COUNTRY_LIST", 0);
define("KalturaCountryRestrictionType_ALLOW_COUNTRY_LIST", 1);

define("KalturaDataEntryOrderBy_NAME_ASC", "+name");
define("KalturaDataEntryOrderBy_NAME_DESC", "-name");
define("KalturaDataEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaDataEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaDataEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaDataEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaDataEntryOrderBy_RANK_ASC", "+rank");
define("KalturaDataEntryOrderBy_RANK_DESC", "-rank");

define("KalturaDirectoryRestrictionType_DONT_DISPLAY", 0);
define("KalturaDirectoryRestrictionType_DISPLAY_WITH_LINK", 1);

define("KalturaDocumentEntryOrderBy_NAME_ASC", "+name");
define("KalturaDocumentEntryOrderBy_NAME_DESC", "-name");
define("KalturaDocumentEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaDocumentEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaDocumentEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaDocumentEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaDocumentEntryOrderBy_RANK_ASC", "+rank");
define("KalturaDocumentEntryOrderBy_RANK_DESC", "-rank");

define("KalturaDocumentType_DOCUMENT", 11);
define("KalturaDocumentType_SWF", 12);

define("KalturaDurationType_NOT_AVAILABLE", "notavailable");
define("KalturaDurationType_SHORT", "short");
define("KalturaDurationType_MEDIUM", "medium");
define("KalturaDurationType_LONG", "long");

define("KalturaEditorType_SIMPLE", 1);
define("KalturaEditorType_ADVANCED", 2);

define("KalturaEntryModerationStatus_PENDING_MODERATION", 1);
define("KalturaEntryModerationStatus_APPROVED", 2);
define("KalturaEntryModerationStatus_REJECTED", 3);
define("KalturaEntryModerationStatus_FLAGGED_FOR_REVIEW", 5);
define("KalturaEntryModerationStatus_AUTO_APPROVED", 6);

define("KalturaEntryStatus_ERROR_IMPORTING", -2);
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

define("KalturaFileSyncObjectType_ENTRY", 1);
define("KalturaFileSyncObjectType_UICONF", 2);
define("KalturaFileSyncObjectType_BATCHJOB", 3);
define("KalturaFileSyncObjectType_FLAVOR_ASSET", 4);

define("KalturaFileSyncOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaFileSyncOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaFileSyncOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaFileSyncOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaFileSyncOrderBy_READY_AT_ASC", "+readyAt");
define("KalturaFileSyncOrderBy_READY_AT_DESC", "-readyAt");
define("KalturaFileSyncOrderBy_SYNC_TIME_ASC", "+syncTime");
define("KalturaFileSyncOrderBy_SYNC_TIME_DESC", "-syncTime");
define("KalturaFileSyncOrderBy_FILE_SIZE_ASC", "+fileSize");
define("KalturaFileSyncOrderBy_FILE_SIZE_DESC", "-fileSize");

define("KalturaFileSyncStatus_ERROR", -1);
define("KalturaFileSyncStatus_PENDING", 1);
define("KalturaFileSyncStatus_READY", 2);
define("KalturaFileSyncStatus_DELETED", 3);
define("KalturaFileSyncStatus_PURGED", 4);

define("KalturaFileSyncType_FILE", 1);
define("KalturaFileSyncType_LINK", 2);
define("KalturaFileSyncType_URL", 3);

define("KalturaFlavorAssetStatus_ERROR", -1);
define("KalturaFlavorAssetStatus_QUEUED", 0);
define("KalturaFlavorAssetStatus_CONVERTING", 1);
define("KalturaFlavorAssetStatus_READY", 2);
define("KalturaFlavorAssetStatus_DELETED", 3);
define("KalturaFlavorAssetStatus_NOT_APPLICABLE", 4);



define("KalturaGender_UNKNOWN", 0);
define("KalturaGender_MALE", 1);
define("KalturaGender_FEMALE", 2);

define("KalturaGoogleSyndicationFeedAdultValues_YES", "Yes");
define("KalturaGoogleSyndicationFeedAdultValues_NO", "No");

define("KalturaGoogleVideoSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaGoogleVideoSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaGoogleVideoSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaGoogleVideoSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaGoogleVideoSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaGoogleVideoSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaGoogleVideoSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaGoogleVideoSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaITunesSyndicationFeedAdultValues_YES", "yes");
define("KalturaITunesSyndicationFeedAdultValues_NO", "no");
define("KalturaITunesSyndicationFeedAdultValues_CLEAN", "clean");

define("KalturaITunesSyndicationFeedCategories_ARTS", "Arts");
define("KalturaITunesSyndicationFeedCategories_ARTS_DESIGN", "Arts/Design");
define("KalturaITunesSyndicationFeedCategories_ARTS_FASHION_BEAUTY", "Arts/Fashion &amp; Beauty");
define("KalturaITunesSyndicationFeedCategories_ARTS_FOOD", "Arts/Food");
define("KalturaITunesSyndicationFeedCategories_ARTS_LITERATURE", "Arts/Literature");
define("KalturaITunesSyndicationFeedCategories_ARTS_PERFORMING_ARTS", "Arts/Performing Arts");
define("KalturaITunesSyndicationFeedCategories_ARTS_VISUAL_ARTS", "Arts/Visual Arts");
define("KalturaITunesSyndicationFeedCategories_BUSINESS", "Business");
define("KalturaITunesSyndicationFeedCategories_BUSINESS_BUSINESS_NEWS", "Business/Business News");
define("KalturaITunesSyndicationFeedCategories_BUSINESS_CAREERS", "Business/Careers");
define("KalturaITunesSyndicationFeedCategories_BUSINESS_INVESTING", "Business/Investing");
define("KalturaITunesSyndicationFeedCategories_BUSINESS_MANAGEMENT_MARKETING", "Business/Management &amp; Marketing");
define("KalturaITunesSyndicationFeedCategories_BUSINESS_SHOPPING", "Business/Shopping");
define("KalturaITunesSyndicationFeedCategories_COMEDY", "Comedy");
define("KalturaITunesSyndicationFeedCategories_EDUCATION", "Education");
define("KalturaITunesSyndicationFeedCategories_EDUCATION_TECHNOLOGY", "Education/Education Technology");
define("KalturaITunesSyndicationFeedCategories_EDUCATION_HIGHER_EDUCATION", "Education/Higher Education");
define("KalturaITunesSyndicationFeedCategories_EDUCATION_K_12", "Education/K-12");
define("KalturaITunesSyndicationFeedCategories_EDUCATION_LANGUAGE_COURSES", "Education/Language Courses");
define("KalturaITunesSyndicationFeedCategories_EDUCATION_TRAINING", "Education/Training");
define("KalturaITunesSyndicationFeedCategories_GAMES_HOBBIES", "Games &amp; Hobbies");
define("KalturaITunesSyndicationFeedCategories_GAMES_HOBBIES_AUTOMOTIVE", "Games &amp; Hobbies/Automotive");
define("KalturaITunesSyndicationFeedCategories_GAMES_HOBBIES_AVIATION", "Games &amp; Hobbies/Aviation");
define("KalturaITunesSyndicationFeedCategories_GAMES_HOBBIES_HOBBIES", "Games &amp; Hobbies/Hobbies");
define("KalturaITunesSyndicationFeedCategories_GAMES_HOBBIES_OTHER_GAMES", "Games &amp; Hobbies/Other Games");
define("KalturaITunesSyndicationFeedCategories_GAMES_HOBBIES_VIDEO_GAMES", "Games &amp; Hobbies/Video Games");
define("KalturaITunesSyndicationFeedCategories_GOVERNMENT_ORGANIZATIONS", "Government &amp; Organizations");
define("KalturaITunesSyndicationFeedCategories_GOVERNMENT_ORGANIZATIONS_LOCAL", "Government &amp; Organizations/Local");
define("KalturaITunesSyndicationFeedCategories_GOVERNMENT_ORGANIZATIONS_NATIONAL", "Government &amp; Organizations/National");
define("KalturaITunesSyndicationFeedCategories_GOVERNMENT_ORGANIZATIONS_NON_PROFIT", "Government &amp; Organizations/Non-Profit");
define("KalturaITunesSyndicationFeedCategories_GOVERNMENT_ORGANIZATIONS_REGIONAL", "Government &amp; Organizations/Regional");
define("KalturaITunesSyndicationFeedCategories_HEALTH", "Health");
define("KalturaITunesSyndicationFeedCategories_HEALTH_ALTERNATIVE_HEALTH", "Health/Alternative Health");
define("KalturaITunesSyndicationFeedCategories_HEALTH_FITNESS_NUTRITION", "Health/Fitness &amp; Nutrition");
define("KalturaITunesSyndicationFeedCategories_HEALTH_SELF_HELP", "Health/Self-Help");
define("KalturaITunesSyndicationFeedCategories_HEALTH_SEXUALITY", "Health/Sexuality");
define("KalturaITunesSyndicationFeedCategories_KIDS_FAMILY", "Kids &amp; Family");
define("KalturaITunesSyndicationFeedCategories_MUSIC", "Music");
define("KalturaITunesSyndicationFeedCategories_NEWS_POLITICS", "News &amp; Politics");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY", "Religion &amp; Spirituality");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_BUDDHISM", "Religion &amp; Spirituality/Buddhism");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_CHRISTIANITY", "Religion &amp; Spirituality/Christianity");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_HINDUISM", "Religion &amp; Spirituality/Hinduism");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_ISLAM", "Religion &amp; Spirituality/Islam");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_JUDAISM", "Religion &amp; Spirituality/Judaism");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_OTHER", "Religion &amp; Spirituality/Other");
define("KalturaITunesSyndicationFeedCategories_RELIGION_SPIRITUALITY_SPIRITUALITY", "Religion &amp; Spirituality/Spirituality");
define("KalturaITunesSyndicationFeedCategories_SCIENCE_MEDICINE", "Science &amp; Medicine");
define("KalturaITunesSyndicationFeedCategories_SCIENCE_MEDICINE_MEDICINE", "Science &amp; Medicine/Medicine");
define("KalturaITunesSyndicationFeedCategories_SCIENCE_MEDICINE_NATURAL_SCIENCES", "Science &amp; Medicine/Natural Sciences");
define("KalturaITunesSyndicationFeedCategories_SCIENCE_MEDICINE_SOCIAL_SCIENCES", "Science &amp; Medicine/Social Sciences");
define("KalturaITunesSyndicationFeedCategories_SOCIETY_CULTURE", "Society &amp; Culture");
define("KalturaITunesSyndicationFeedCategories_SOCIETY_CULTURE_HISTORY", "Society &amp; Culture/History");
define("KalturaITunesSyndicationFeedCategories_SOCIETY_CULTURE_PERSONAL_JOURNALS", "Society &amp; Culture/Personal Journals");
define("KalturaITunesSyndicationFeedCategories_SOCIETY_CULTURE_PHILOSOPHY", "Society &amp; Culture/Philosophy");
define("KalturaITunesSyndicationFeedCategories_SOCIETY_CULTURE_PLACES_TRAVEL", "Society &amp; Culture/Places &amp; Travel");
define("KalturaITunesSyndicationFeedCategories_SPORTS_RECREATION", "Sports &amp; Recreation");
define("KalturaITunesSyndicationFeedCategories_SPORTS_RECREATION_AMATEUR", "Sports &amp; Recreation/Amateur");
define("KalturaITunesSyndicationFeedCategories_SPORTS_RECREATION_COLLEGE_HIGH_SCHOOL", "Sports &amp; Recreation/College &amp; High School");
define("KalturaITunesSyndicationFeedCategories_SPORTS_RECREATION_OUTDOOR", "Sports &amp; Recreation/Outdoor");
define("KalturaITunesSyndicationFeedCategories_SPORTS_RECREATION_PROFESSIONAL", "Sports &amp; Recreation/Professional");
define("KalturaITunesSyndicationFeedCategories_TECHNOLOGY", "Technology");
define("KalturaITunesSyndicationFeedCategories_TECHNOLOGY_GADGETS", "Technology/Gadgets");
define("KalturaITunesSyndicationFeedCategories_TECHNOLOGY_TECH_NEWS", "Technology/Tech News");
define("KalturaITunesSyndicationFeedCategories_TECHNOLOGY_PODCASTING", "Technology/Podcasting");
define("KalturaITunesSyndicationFeedCategories_TECHNOLOGY_SOFTWARE_HOW_TO", "Technology/Software How-To");
define("KalturaITunesSyndicationFeedCategories_TV_FILM", "TV &amp; Film");

define("KalturaITunesSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaITunesSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaITunesSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaITunesSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaITunesSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaITunesSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaITunesSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaITunesSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaLicenseType_UNKNOWN", -1);
define("KalturaLicenseType_NONE", 0);
define("KalturaLicenseType_COPYRIGHTED", 1);
define("KalturaLicenseType_PUBLIC_DOMAIN", 2);
define("KalturaLicenseType_CREATIVECOMMONS_ATTRIBUTION", 3);
define("KalturaLicenseType_CREATIVECOMMONS_ATTRIBUTION_SHARE_ALIKE", 4);
define("KalturaLicenseType_CREATIVECOMMONS_ATTRIBUTION_NO_DERIVATIVES", 5);
define("KalturaLicenseType_CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL", 6);
define("KalturaLicenseType_CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL_SHARE_ALIKE", 7);
define("KalturaLicenseType_CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL_NO_DERIVATIVES", 8);
define("KalturaLicenseType_GFDL", 9);
define("KalturaLicenseType_GPL", 10);
define("KalturaLicenseType_AFFERO_GPL", 11);
define("KalturaLicenseType_LGPL", 12);
define("KalturaLicenseType_BSD", 13);
define("KalturaLicenseType_APACHE", 14);
define("KalturaLicenseType_MOZILLA", 15);

define("KalturaMailJobOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMailJobOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMailJobOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaMailJobOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");

define("KalturaPlayableEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaPlayableEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaPlayableEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaPlayableEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaPlayableEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaPlayableEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaPlayableEntryOrderBy_NAME_ASC", "+name");
define("KalturaPlayableEntryOrderBy_NAME_DESC", "-name");
define("KalturaPlayableEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaPlayableEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaPlayableEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPlayableEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPlayableEntryOrderBy_RANK_ASC", "+rank");
define("KalturaPlayableEntryOrderBy_RANK_DESC", "-rank");

define("KalturaMediaEntryOrderBy_MEDIA_TYPE_ASC", "+mediaType");
define("KalturaMediaEntryOrderBy_MEDIA_TYPE_DESC", "-mediaType");
define("KalturaMediaEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaMediaEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaMediaEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaMediaEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaMediaEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaMediaEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaMediaEntryOrderBy_NAME_ASC", "+name");
define("KalturaMediaEntryOrderBy_NAME_DESC", "-name");
define("KalturaMediaEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaMediaEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaMediaEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMediaEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMediaEntryOrderBy_RANK_ASC", "+rank");
define("KalturaMediaEntryOrderBy_RANK_DESC", "-rank");


define("KalturaMediaType_VIDEO", 1);
define("KalturaMediaType_IMAGE", 2);
define("KalturaMediaType_AUDIO", 5);

define("KalturaMixEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaMixEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaMixEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaMixEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaMixEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaMixEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaMixEntryOrderBy_NAME_ASC", "+name");
define("KalturaMixEntryOrderBy_NAME_DESC", "-name");
define("KalturaMixEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaMixEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaMixEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMixEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMixEntryOrderBy_RANK_ASC", "+rank");
define("KalturaMixEntryOrderBy_RANK_DESC", "-rank");

define("KalturaModerationFlagStatus_PENDING", 1);
define("KalturaModerationFlagStatus_MODERATED", 2);

define("KalturaModerationFlagType_SEXUAL_CONTENT", 1);
define("KalturaModerationFlagType_VIOLENT_REPULSIVE", 2);
define("KalturaModerationFlagType_HARMFUL_DANGEROUS", 3);
define("KalturaModerationFlagType_SPAM_COMMERCIALS", 4);

define("KalturaModerationObjectType_ENTRY", 2);
define("KalturaModerationObjectType_USER", 3);

define("KalturaNotificationOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaNotificationOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaNotificationOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaNotificationOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");

define("KalturaNotificationType_ENTRY_ADD", 1);
define("KalturaNotificationType_ENTR_UPDATE_PERMISSIONS", 2);
define("KalturaNotificationType_ENTRY_DELETE", 3);
define("KalturaNotificationType_ENTRY_BLOCK", 4);
define("KalturaNotificationType_ENTRY_UPDATE", 5);
define("KalturaNotificationType_ENTRY_UPDATE_THUMBNAIL", 6);
define("KalturaNotificationType_ENTRY_UPDATE_MODERATION", 7);
define("KalturaNotificationType_USER_ADD", 21);
define("KalturaNotificationType_USER_BANNED", 26);

define("KalturaNullableBoolean_NULL_VALUE", -1);
define("KalturaNullableBoolean_FALSE_VALUE", 0);
define("KalturaNullableBoolean_TRUE_VALUE", 1);

define("KalturaPartnerOrderBy_ID_ASC", "+id");
define("KalturaPartnerOrderBy_ID_DESC", "-id");
define("KalturaPartnerOrderBy_NAME_ASC", "+name");
define("KalturaPartnerOrderBy_NAME_DESC", "-name");
define("KalturaPartnerOrderBy_WEBSITE_ASC", "+website");
define("KalturaPartnerOrderBy_WEBSITE_DESC", "-website");
define("KalturaPartnerOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPartnerOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPartnerOrderBy_ADMIN_NAME_ASC", "+adminName");
define("KalturaPartnerOrderBy_ADMIN_NAME_DESC", "-adminName");
define("KalturaPartnerOrderBy_ADMIN_EMAIL_ASC", "+adminEmail");
define("KalturaPartnerOrderBy_ADMIN_EMAIL_DESC", "-adminEmail");
define("KalturaPartnerOrderBy_STATUS_ASC", "+status");
define("KalturaPartnerOrderBy_STATUS_DESC", "-status");

define("KalturaPartnerType_KMC", 1);
define("KalturaPartnerType_WIKI", 100);
define("KalturaPartnerType_WORDPRESS", 101);
define("KalturaPartnerType_DRUPAL", 102);
define("KalturaPartnerType_DEKIWIKI", 103);
define("KalturaPartnerType_MOODLE", 104);
define("KalturaPartnerType_COMMUNITY_EDITION", 105);
define("KalturaPartnerType_JOOMLA", 106);

define("KalturaPlaylistOrderBy_NAME_ASC", "+name");
define("KalturaPlaylistOrderBy_NAME_DESC", "-name");
define("KalturaPlaylistOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaPlaylistOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaPlaylistOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPlaylistOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPlaylistOrderBy_RANK_ASC", "+rank");
define("KalturaPlaylistOrderBy_RANK_DESC", "-rank");

define("KalturaPlaylistType_DYNAMIC", 10);
define("KalturaPlaylistType_STATIC_LIST", 3);
define("KalturaPlaylistType_EXTERNAL", 101);

define("KalturaReportType_TOP_CONTENT", 1);
define("KalturaReportType_CONTENT_DROPOFF", 2);
define("KalturaReportType_CONTENT_INTERACTIONS", 3);
define("KalturaReportType_MAP_OVERLAY", 4);
define("KalturaReportType_TOP_CONTRIBUTORS", 5);
define("KalturaReportType_TOP_SYNDICATION", 6);
define("KalturaReportType_CONTENT_CONTRIBUTIONS", 7);
define("KalturaReportType_ADMIN_CONSOLE", 10);

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

define("KalturaSiteRestrictionType_RESTRICT_SITE_LIST", 0);
define("KalturaSiteRestrictionType_ALLOW_SITE_LIST", 1);

define("KalturaSourceType_FILE", 1);
define("KalturaSourceType_WEBCAM", 2);
define("KalturaSourceType_URL", 5);
define("KalturaSourceType_SEARCH_PROVIDER", 6);

define("KalturaStatsEventType_WIDGET_LOADED", 1);
define("KalturaStatsEventType_MEDIA_LOADED", 2);
define("KalturaStatsEventType_PLAY", 3);
define("KalturaStatsEventType_PLAY_REACHED_25", 4);
define("KalturaStatsEventType_PLAY_REACHED_50", 5);
define("KalturaStatsEventType_PLAY_REACHED_75", 6);
define("KalturaStatsEventType_PLAY_REACHED_100", 7);
define("KalturaStatsEventType_OPEN_EDIT", 8);
define("KalturaStatsEventType_OPEN_VIRAL", 9);
define("KalturaStatsEventType_OPEN_DOWNLOAD", 10);
define("KalturaStatsEventType_OPEN_REPORT", 11);
define("KalturaStatsEventType_BUFFER_START", 12);
define("KalturaStatsEventType_BUFFER_END", 13);
define("KalturaStatsEventType_OPEN_FULL_SCREEN", 14);
define("KalturaStatsEventType_CLOSE_FULL_SCREEN", 15);
define("KalturaStatsEventType_REPLAY", 16);
define("KalturaStatsEventType_SEEK", 17);
define("KalturaStatsEventType_OPEN_UPLOAD", 18);
define("KalturaStatsEventType_SAVE_PUBLISH", 19);
define("KalturaStatsEventType_CLOSE_EDITOR", 20);
define("KalturaStatsEventType_PRE_BUMPER_PLAYED", 21);
define("KalturaStatsEventType_POST_BUMPER_PLAYED", 22);
define("KalturaStatsEventType_BUMPER_CLICKED", 23);
define("KalturaStatsEventType_FUTURE_USE_1", 24);
define("KalturaStatsEventType_FUTURE_USE_2", 25);
define("KalturaStatsEventType_FUTURE_USE_3", 26);

define("KalturaStatsKmcEventType_CONTENT_PAGE_VIEW", 1001);
define("KalturaStatsKmcEventType_CONTENT_ADD_PLAYLIST", 1010);
define("KalturaStatsKmcEventType_CONTENT_EDIT_PLAYLIST", 1011);
define("KalturaStatsKmcEventType_CONTENT_DELETE_PLAYLIST", 1012);
define("KalturaStatsKmcEventType_CONTENT_DELETE_ITEM", 1058);
define("KalturaStatsKmcEventType_CONTENT_EDIT_ENTRY", 1013);
define("KalturaStatsKmcEventType_CONTENT_CHANGE_THUMBNAIL", 1014);
define("KalturaStatsKmcEventType_CONTENT_ADD_TAGS", 1015);
define("KalturaStatsKmcEventType_CONTENT_REMOVE_TAGS", 1016);
define("KalturaStatsKmcEventType_CONTENT_ADD_ADMIN_TAGS", 1017);
define("KalturaStatsKmcEventType_CONTENT_REMOVE_ADMIN_TAGS", 1018);
define("KalturaStatsKmcEventType_CONTENT_DOWNLOAD", 1019);
define("KalturaStatsKmcEventType_CONTENT_APPROVE_MODERATION", 1020);
define("KalturaStatsKmcEventType_CONTENT_REJECT_MODERATION", 1021);
define("KalturaStatsKmcEventType_CONTENT_BULK_UPLOAD", 1022);
define("KalturaStatsKmcEventType_CONTENT_ADMIN_KCW_UPLOAD", 1023);
define("KalturaStatsKmcEventType_CONTENT_CONTENT_GO_TO_PAGE", 1057);
define("KalturaStatsKmcEventType_CONTENT_ENTRY_DRILLDOWN", 1088);
define("KalturaStatsKmcEventType_CONTENT_OPEN_PREVIEW_AND_EMBED", 1089);
define("KalturaStatsKmcEventType_ACCOUNT_CHANGE_PARTNER_INFO", 1030);
define("KalturaStatsKmcEventType_ACCOUNT_CHANGE_LOGIN_INFO", 1031);
define("KalturaStatsKmcEventType_ACCOUNT_CONTACT_US_USAGE", 1032);
define("KalturaStatsKmcEventType_ACCOUNT_UPDATE_SERVER_SETTINGS", 1033);
define("KalturaStatsKmcEventType_ACCOUNT_ACCOUNT_OVERVIEW", 1034);
define("KalturaStatsKmcEventType_ACCOUNT_ACCESS_CONTROL", 1035);
define("KalturaStatsKmcEventType_ACCOUNT_TRANSCODING_SETTINGS", 1036);
define("KalturaStatsKmcEventType_ACCOUNT_ACCOUNT_UPGRADE", 1037);
define("KalturaStatsKmcEventType_ACCOUNT_SAVE_SERVER_SETTINGS", 1038);
define("KalturaStatsKmcEventType_ACCOUNT_ACCESS_CONTROL_DELETE", 1039);
define("KalturaStatsKmcEventType_ACCOUNT_SAVE_TRANSCODING_SETTINGS", 1040);
define("KalturaStatsKmcEventType_LOGIN", 1041);
define("KalturaStatsKmcEventType_DASHBOARD_IMPORT_CONTENT", 1042);
define("KalturaStatsKmcEventType_DASHBOARD_UPDATE_CONTENT", 1043);
define("KalturaStatsKmcEventType_DASHBOARD_ACCOUNT_CONTACT_US", 1044);
define("KalturaStatsKmcEventType_DASHBOARD_VIEW_REPORTS", 1045);
define("KalturaStatsKmcEventType_DASHBOARD_EMBED_PLAYER", 1046);
define("KalturaStatsKmcEventType_DASHBOARD_EMBED_PLAYLIST", 1047);
define("KalturaStatsKmcEventType_DASHBOARD_CUSTOMIZE_PLAYERS", 1048);
define("KalturaStatsKmcEventType_APP_STUDIO_NEW_PLAYER_SINGLE_VIDEO", 1050);
define("KalturaStatsKmcEventType_APP_STUDIO_NEW_PLAYER_PLAYLIST", 1051);
define("KalturaStatsKmcEventType_APP_STUDIO_NEW_PLAYER_MULTI_TAB_PLAYLIST", 1052);
define("KalturaStatsKmcEventType_APP_STUDIO_EDIT_PLAYER_SINGLE_VIDEO", 1053);
define("KalturaStatsKmcEventType_APP_STUDIO_EDIT_PLAYER_PLAYLIST", 1054);
define("KalturaStatsKmcEventType_APP_STUDIO_EDIT_PLAYER_MULTI_TAB_PLAYLIST", 1055);
define("KalturaStatsKmcEventType_APP_STUDIO_DUPLICATE_PLAYER", 1056);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_TAB", 1070);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_CONTENT_REPORTS_TAB", 1071);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_USERS_AND_COMMUNITY_REPORTS_TAB", 1072);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_TOP_CONTRIBUTORS", 1073);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_MAP_OVERLAYS", 1074);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_TOP_SYNDICATIONS", 1075);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_TOP_CONTENT", 1076);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_CONTENT_DROPOFF", 1077);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_CONTENT_INTERACTIONS", 1078);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_CONTENT_CONTRIBUTIONS", 1079);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_VIDEO_DRILL_DOWN", 1080);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_CONTENT_DRILL_DOWN_INTERACTION", 1081);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_CONTENT_CONTRIBUTIONS_DRILLDOWN", 1082);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_VIDEO_DRILL_DOWN_DROPOFF", 1083);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_MAP_OVERLAYS_DRILLDOWN", 1084);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_TOP_SYNDICATIONS_DRILL_DOWN", 1085);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_VIEW_MONTHLY", 1086);
define("KalturaStatsKmcEventType_REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_VIEW_YEARLY", 1087);

define("KalturaSyndicationFeedStatus_DELETED", -1);
define("KalturaSyndicationFeedStatus_ACTIVE", 1);

define("KalturaSyndicationFeedType_GOOGLE_VIDEO", 1);
define("KalturaSyndicationFeedType_YAHOO", 2);
define("KalturaSyndicationFeedType_ITUNES", 3);
define("KalturaSyndicationFeedType_TUBE_MOGUL", 4);

define("KalturaTubeMogulSyndicationFeedCategories_ARTS_AND_ANIMATION", "Arts &amp; Animation");
define("KalturaTubeMogulSyndicationFeedCategories_COMEDY", "Comedy");
define("KalturaTubeMogulSyndicationFeedCategories_ENTERTAINMENT", "Entertainment");
define("KalturaTubeMogulSyndicationFeedCategories_MUSIC", "Music");
define("KalturaTubeMogulSyndicationFeedCategories_NEWS_AND_BLOGS", "News &amp; Blogs");
define("KalturaTubeMogulSyndicationFeedCategories_SCIENCE_AND_TECHNOLOGY", "Science &amp; Technology");
define("KalturaTubeMogulSyndicationFeedCategories_SPORTS", "Sports");
define("KalturaTubeMogulSyndicationFeedCategories_TRAVEL_AND_PLACES", "Travel &amp; Places");
define("KalturaTubeMogulSyndicationFeedCategories_VIDEO_GAMES", "Video Games");
define("KalturaTubeMogulSyndicationFeedCategories_ANIMALS_AND_PETS", "Animals &amp; Pets");
define("KalturaTubeMogulSyndicationFeedCategories_AUTOS", "Autos");
define("KalturaTubeMogulSyndicationFeedCategories_VLOGS_PEOPLE", "Vlogs &amp; People");
define("KalturaTubeMogulSyndicationFeedCategories_HOW_TO_INSTRUCTIONAL_DIY", "How To/Instructional/DIY");
define("KalturaTubeMogulSyndicationFeedCategories_COMMERCIALS_PROMOTIONAL", "Commercials/Promotional");
define("KalturaTubeMogulSyndicationFeedCategories_FAMILY_AND_KIDS", "Family &amp; Kids");

define("KalturaTubeMogulSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaTubeMogulSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaTubeMogulSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaTubeMogulSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaTubeMogulSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaTubeMogulSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaTubeMogulSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaTubeMogulSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaUiConfCreationMode_WIZARD", 2);
define("KalturaUiConfCreationMode_ADVANCED", 3);

define("KalturaUiConfObjType_PLAYER", 1);
define("KalturaUiConfObjType_CONTRIBUTION_WIZARD", 2);
define("KalturaUiConfObjType_SIMPLE_EDITOR", 3);
define("KalturaUiConfObjType_ADVANCED_EDITOR", 4);
define("KalturaUiConfObjType_PLAYLIST", 5);
define("KalturaUiConfObjType_APP_STUDIO", 6);

define("KalturaUiConfOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaUiConfOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaUiConfOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaUiConfOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaUploadErrorCode_NO_ERROR", 0);
define("KalturaUploadErrorCode_GENERAL_ERROR", 1);
define("KalturaUploadErrorCode_PARTIAL_UPLOAD", 2);

define("KalturaUserOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaUserOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaUserStatus_BLOCKED", 0);
define("KalturaUserStatus_ACTIVE", 1);
define("KalturaUserStatus_DELETED", 2);

define("KalturaVideoCodec_NONE", "");
define("KalturaVideoCodec_VP6", "vp6");
define("KalturaVideoCodec_H263", "h263");
define("KalturaVideoCodec_H264", "h264");
define("KalturaVideoCodec_FLV", "flv");
define("KalturaVideoCodec_MPEG4", "mpeg4");

define("KalturaWidgetOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaWidgetOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaWidgetSecurityType_NONE", 1);
define("KalturaWidgetSecurityType_TIMEHASH", 2);

define("KalturaYahooSyndicationFeedAdultValues_ADULT", "adult");
define("KalturaYahooSyndicationFeedAdultValues_NON_ADULT", "nonadult");

define("KalturaYahooSyndicationFeedCategories_ACTION", "Action");
define("KalturaYahooSyndicationFeedCategories_ART_AND_ANIMATION", "Art &amp; Animation");
define("KalturaYahooSyndicationFeedCategories_ENTERTAINMENT_AND_TV", "Entertainment &amp; TV");
define("KalturaYahooSyndicationFeedCategories_FOOD", "Food");
define("KalturaYahooSyndicationFeedCategories_GAMES", "Games");
define("KalturaYahooSyndicationFeedCategories_HOW_TO", "How-To");
define("KalturaYahooSyndicationFeedCategories_MUSIC", "Music");
define("KalturaYahooSyndicationFeedCategories_PEOPLE_AND_VLOGS", "People &amp; Vlogs");
define("KalturaYahooSyndicationFeedCategories_SCIENCE_AND_ENVIRONMENT", "Science &amp; Environment");
define("KalturaYahooSyndicationFeedCategories_TRANSPORTATION", "Transportation");
define("KalturaYahooSyndicationFeedCategories_ANIMALS", "Animals");
define("KalturaYahooSyndicationFeedCategories_COMMERCIALS", "Commercials");
define("KalturaYahooSyndicationFeedCategories_FAMILY", "Family");
define("KalturaYahooSyndicationFeedCategories_FUNNY_VIDEOS", "Funny Videos");
define("KalturaYahooSyndicationFeedCategories_HEALTH_AND_BEAUTY", "Health &amp; Beauty");
define("KalturaYahooSyndicationFeedCategories_MOVIES_AND_SHORTS", "Movies &amp; Shorts");
define("KalturaYahooSyndicationFeedCategories_NEWS_AND_POLITICS", "News &amp; Politics");
define("KalturaYahooSyndicationFeedCategories_PRODUCTS_AND_TECH", "Products &amp; Tech.");
define("KalturaYahooSyndicationFeedCategories_SPORTS", "Sports");
define("KalturaYahooSyndicationFeedCategories_TRAVEL", "Travel");

define("KalturaYahooSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaYahooSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaYahooSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaYahooSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaYahooSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaYahooSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaYahooSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaYahooSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

class KalturaAccessControl extends KalturaObjectBase
{
	/**
	 * The id of the Access Control Profile
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The name of the Access Control Profile
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * The description of the Access Control Profile
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * Creation date as Unix timestamp (In seconds) 
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * True if this Conversion Profile is the default
	 * 
	 *
	 * @var KalturaNullableBoolean
	 */
	var $isDefault = null;

	/**
	 * Array of Access Control Restrictions
	 * 
	 *
	 * @var KalturaRestrictionArray
	 */
	var $restrictions;


}

class KalturaFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $orderBy = null;


}

class KalturaAccessControlFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
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
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;


}

class KalturaAccessControlListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaAccessControlArray
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
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Entry name (Min 1 chars)
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * Entry description
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
	 * The ID of the user who is the owner of this entry 
	 * 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * Entry tags
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators
	 * 
	 *
	 * @var string
	 */
	var $adminTags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $categories = null;

	/**
	 * 
	 *
	 * @var KalturaEntryStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * Entry moderation status
	 * 
	 *
	 * @var KalturaEntryModerationStatus
	 * @readonly
	 */
	var $moderationStatus = null;

	/**
	 * Number of moderation requests waiting for this entry
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $moderationCount = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 * 
	 *
	 * @var KalturaEntryType
	 * @readonly
	 */
	var $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Calculated rank
	 * 
	 *
	 * @var float
	 * @readonly
	 */
	var $rank = null;

	/**
	 * The total (sum) of all votes
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $totalRank = null;

	/**
	 * Number of votes
	 * 
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
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * Download URL for the entry
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $downloadUrl = null;

	/**
	 * Indexed search text for full text search
	 *
	 * @var string
	 * @readonly
	 */
	var $searchText = null;

	/**
	 * License type used for this entry
	 * 
	 *
	 * @var KalturaLicenseType
	 */
	var $licenseType = null;

	/**
	 * Version of the entry data
	 *
	 * @var int
	 * @readonly
	 */
	var $version = null;

	/**
	 * Thumbnail URL
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $thumbnailUrl = null;

	/**
	 * The Access Control ID assigned to this entry (null when not set, send -1 to remove)  
	 * 
	 *
	 * @var int
	 */
	var $accessControlId = null;

	/**
	 * Entry scheduling start date (null when not set, send -1 to remove)
	 * 
	 *
	 * @var int
	 */
	var $startDate = null;

	/**
	 * Entry scheduling end date (null when not set, send -1 to remove)
	 * 
	 *
	 * @var int
	 */
	var $endDate = null;


}

class KalturaBaseEntryFilter extends KalturaFilter
{
	/**
	 * This filter should be in use for retrieving only a specific entry (identified by its entryId).
	 * @var string
	 *
	 * @var string
	 */
	var $idEqual = null;

	/**
	 * This filter should be in use for retrieving few specific entries (string should include comma separated list of entryId strings).
	 * @var string
	 *
	 * @var string
	 */
	var $idIn = null;

	/**
	 * This filter should be in use for retrieving specific entries while applying an SQL 'LIKE' pattern matching on entry names. It should include only one pattern for matching entry names against.
	 * @var string
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * This filter should be in use for retrieving specific entries, while applying an SQL 'LIKE' pattern matching on entry names. It could include few (comma separated) patterns for matching entry names against, while applying an OR logic to retrieve entries that match at least one input pattern.
	 * @var string
	 *
	 * @var string
	 */
	var $nameMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries, while applying an SQL 'LIKE' pattern matching on entry names. It could include few (comma separated) patterns for matching entry names against, while applying an AND logic to retrieve entries that match all input patterns.
	 * @var string
	 *
	 * @var string
	 */
	var $nameMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving entries with a specific name.
	 * @var string
	 *
	 * @var string
	 */
	var $nameEqual = null;

	/**
	 * This filter should be in use for retrieving only entries which were uploaded by/assigned to users of a specific Kaltura Partner (identified by Partner ID).
	 * @var int
	 *
	 * @var int
	 */
	var $partnerIdEqual = null;

	/**
	 * This filter should be in use for retrieving only entries within Kaltura network which were uploaded by/assigned to users of few Kaltura Partners  (string should include comma separated list of PartnerIDs)
	 * @var string
	 *
	 * @var string
	 */
	var $partnerIdIn = null;

	/**
	 * This filter parameter should be in use for retrieving only entries, uploaded by/assigned to a specific user (identified by user Id).
	 * @var string
	 *
	 * @var string
	 */
	var $userIdEqual = null;

	/**
	 * This filter should be in use for retrieving specific entries while applying an SQL 'LIKE' pattern matching on entry tags. It should include only one pattern for matching entry tags against.
	 * @var string
	 *
	 * @var string
	 */
	var $tagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries, while applying an SQL 'LIKE' pattern matching on tags.  It could include few (comma separated) patterns for matching entry tags against, while applying an OR logic to retrieve entries that match at least one input pattern.
	 * @var string
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries, while applying an SQL 'LIKE' pattern matching on tags.  It could include few (comma separated) patterns for matching entry tags against, while applying an AND logic to retrieve entries that match all input patterns.
	 * @var string
	 *
	 * @var string
	 */
	var $tagsMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries while applying an SQL 'LIKE' pattern matching on entry tags, set by an ADMIN user. It should include only one pattern for matching entry tags against.
	 * @var string
	 *
	 * @var string
	 */
	var $adminTagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries, while applying an SQL 'LIKE' pattern matching on tags, set by an ADMIN user.  It could include few (comma separated) patterns for matching entry tags against, while applying an OR logic to retrieve entries that match at least one input pattern.
	 * @var string
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries, while applying an SQL 'LIKE' pattern matching on tags, set by an ADMIN user.  It could include few (comma separated) patterns for matching entry tags against, while applying an AND logic to retrieve entries that match all input patterns.
	 * @var string
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $categoriesMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $categoriesMatchOr = null;

	/**
	 * This filter should be in use for retrieving only entries, at a specific {@link ?object=KalturaEntryStatus KalturaEntryStatus}.
	 * @var KalturaEntryStatus
	 *
	 * @var KalturaEntryStatus
	 */
	var $statusEqual = null;

	/**
	 * This filter should be in use for retrieving only entries, not at a specific {@link ?object=KalturaEntryStatus KalturaEntryStatus}.
	 * @var KalturaEntryStatus
	 *
	 * @var KalturaEntryStatus
	 */
	var $statusNotEqual = null;

	/**
	 * This filter should be in use for retrieving only entries, at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).
	 * @var string
	 *
	 * @var string
	 */
	var $statusIn = null;

	/**
	 * This filter should be in use for retrieving only entries, not at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).
	 * @var KalturaEntryStatus
	 *
	 * @var KalturaEntryStatus
	 */
	var $statusNotIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryModerationStatus
	 */
	var $moderationStatusEqual = null;

	/**
	 * 
	 *
	 * @var KalturaEntryModerationStatus
	 */
	var $moderationStatusNotEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $moderationStatusIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryModerationStatus
	 */
	var $moderationStatusNotIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryType
	 */
	var $typeEqual = null;

	/**
	 * This filter should be in use for retrieving entries of few {@link ?object=KalturaEntryType KalturaEntryType} (string should include a comma separated list of {@link ?object=KalturaEntryType KalturaEntryType} enumerated parameters).
	 * @var string
	 *
	 * @var string
	 */
	var $typeIn = null;

	/**
	 * This filter parameter should be in use for retrieving only entries which were created at Kaltura system after a specific time/date (standard timestamp format).
	 * @var int
	 *
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * This filter parameter should be in use for retrieving only entries which were created at Kaltura system before a specific time/date (standard timestamp format).
	 * @var int
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $groupIdEqual = null;

	/**
	 * This filter should be in use for retrieving specific entries while search match the input string within all of the following metadata attributes: name, description, tags, adminTags.
	 * @var string
	 *
	 * @var string
	 */
	var $searchTextMatchAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries while search match the input string within at least one of the following metadata attributes: name, description, tags, adminTags.
	 * @var string
	 *
	 * @var string
	 */
	var $searchTextMatchOr = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $accessControlIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $accessControlIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $startDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $startDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $startDateGreaterThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $startDateLessThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $endDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $endDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $endDateGreaterThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $endDateLessThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAdminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAdminTagsNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAdminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsAdminTagsNameMultiLikeAnd = null;


}

class KalturaBaseEntryListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaBaseEntryArray
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

class KalturaBaseJobFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $idEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $idGreaterThanOrEqual = null;

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
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;


}

class KalturaBaseRestriction extends KalturaObjectBase
{

}

class KalturaBaseSyndicationFeed extends KalturaObjectBase
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
	 * @readonly
	 */
	var $feedUrl = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * link a playlist that will set what content the feed will include
	 * if empty, all content will be included in feed
	 * 
	 *
	 * @var string
	 */
	var $playlistId = null;

	/**
	 * feed name
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * feed status
	 * 
	 *
	 * @var KalturaSyndicationFeedStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * feed type
	 * 
	 *
	 * @var KalturaSyndicationFeedType
	 * @readonly
	 */
	var $type = null;

	/**
	 * Base URL for each video, on the partners site
	 * This is required by all syndication types.
	 *
	 * @var string
	 */
	var $landingPage = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * allow_embed tells google OR yahoo weather to allow embedding the video on google OR yahoo video results
	 * or just to provide a link to the landing page.
	 * it is applied on the video-player_loc property in the XML (google)
	 * and addes media-player tag (yahoo)
	 *
	 * @var bool
	 */
	var $allowEmbed = null;

	/**
	 * Select a uiconf ID as player skin to include in the kwidget url
	 *
	 * @var int
	 */
	var $playerUiconfId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $flavorParamId = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $transcodeExistingContent = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $addToDefaultConversionProfile = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $categories = null;


}

class KalturaBaseSyndicationFeedFilter extends KalturaFilter
{

}

class KalturaBaseSyndicationFeedListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaBaseSyndicationFeedArray
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

class KalturaBatchJobFilter extends KalturaBaseJobFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var KalturaBatchJobType
	 */
	var $jobTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $jobTypeIn = null;

	/**
	 * 
	 *
	 * @var KalturaBatchJobType
	 */
	var $jobTypeNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $jobSubTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $jobSubTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $onStressDivertToIn = null;

	/**
	 * 
	 *
	 * @var KalturaBatchJobStatus
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
	var $workGroupIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $queueTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $queueTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $finishTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $finishTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $errTypeIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $fileSizeLessThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $fileSizeGreaterThan = null;


}

class KalturaBatchJobFilterExt extends KalturaBatchJobFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $jobTypeAndSubTypeIn = null;


}

class KalturaBulkUpload extends KalturaObjectBase
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
	 * @var string
	 */
	var $uploadedBy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $uploadedOn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $numOfEntries = null;

	/**
	 * 
	 *
	 * @var KalturaBatchJobStatus
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $logFileUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $csvFileUrl = null;

	/**
	 * 
	 *
	 * @var KalturaBulkUploadResultArray
	 */
	var $results;


}

class KalturaBulkUploadListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaBulkUploads
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

class KalturaBulkUploadResult extends KalturaObjectBase
{
	/**
	 * The id of the result
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * The id of the parent job
	 * 
	 *
	 * @var int
	 */
	var $bulkUploadJobId = null;

	/**
	 * The index of the line in the CSV
	 * 
	 *
	 * @var int
	 */
	var $lineIndex = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerId = null;

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
	var $entryStatus = null;

	/**
	 * The data as recieved in the csv
	 * 
	 *
	 * @var string
	 */
	var $rowData = null;

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
	var $contentType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $conversionProfileId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $accessControlProfileId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $category = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $scheduleStartDate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $scheduleEndDate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbnailUrl = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $thumbnailSaved = null;

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
	var $errorDescription = null;


}

class KalturaCEError extends KalturaObjectBase
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
	 * @var int
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $browser = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $serverIp = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $serverOs = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $phpVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $ceAdminEmail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $type = null;

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
	var $data = null;


}

class KalturaCategory extends KalturaObjectBase
{
	/**
	 * The id of the Category
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $parentId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $depth = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The name of the Category. 
	 * The following characters are not allowed: '<', '>', ','
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * The full name of the Category
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $fullName = null;

	/**
	 * Number of entries in this Category (including child categories)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $entriesCount = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;


}

class KalturaCategoryFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
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
	 * @var int
	 */
	var $parentIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $parentIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $depthEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $fullNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $fullNameStartsWith = null;


}

class KalturaCategoryListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaCategoryArray
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

class KalturaControlPanelCommandFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
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
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdByIdEqual = null;

	/**
	 * 
	 *
	 * @var KalturaControlPanelCommandType
	 */
	var $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $typeIn = null;

	/**
	 * 
	 *
	 * @var KalturaControlPanelCommandTargetType
	 */
	var $targetTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $targetTypeIn = null;

	/**
	 * 
	 *
	 * @var KalturaControlPanelCommandStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaConversionProfile extends KalturaObjectBase
{
	/**
	 * The id of the Conversion Profile
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The name of the Conversion Profile
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * The description of the Conversion Profile
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * Creation date as Unix timestamp (In seconds) 
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * List of included flavor ids (comma separated)
	 * 
	 *
	 * @var string
	 */
	var $flavorParamsIds = null;

	/**
	 * True if this Conversion Profile is the default
	 * 
	 *
	 * @var KalturaNullableBoolean
	 */
	var $isDefault = null;

	/**
	 * Cropping dimensions
	 * 
	 *
	 * @var KalturaCropDimensions
	 */
	var $cropDimensions;

	/**
	 * Clipping start position (in miliseconds)
	 * 
	 *
	 * @var int
	 */
	var $clipStart = null;

	/**
	 * Clipping duration (in miliseconds)
	 * 
	 *
	 * @var int
	 */
	var $clipDuration = null;


}

class KalturaConversionProfileFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $idIn = null;


}

class KalturaConversionProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaConversionProfileArray
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

class KalturaCountryRestriction extends KalturaBaseRestriction
{
	/**
	 * Country restriction type (Allow or deny)
	 * 
	 *
	 * @var KalturaCountryRestrictionType
	 */
	var $countryRestrictionType = null;

	/**
	 * Comma separated list of country codes to allow to deny 
	 * 
	 *
	 * @var string
	 */
	var $countryList = null;


}

class KalturaCropDimensions extends KalturaObjectBase
{
	/**
	 * Crop left point
	 * 
	 *
	 * @var int
	 */
	var $left = null;

	/**
	 * Crop top point
	 * 
	 *
	 * @var int
	 */
	var $top = null;

	/**
	 * Crop width
	 * 
	 *
	 * @var int
	 */
	var $width = null;

	/**
	 * Crop height
	 * 
	 *
	 * @var int
	 */
	var $height = null;


}

class KalturaDataEntry extends KalturaBaseEntry
{
	/**
	 * The data of the entry
	 *
	 * @var string
	 */
	var $dataContent = null;


}

class KalturaDataEntryFilter extends KalturaBaseEntryFilter
{

}

class KalturaDataListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaDataEntryArray
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

class KalturaDirectoryRestriction extends KalturaBaseRestriction
{
	/**
	 * Kaltura directory restriction type
	 * 
	 *
	 * @var KalturaDirectoryRestrictionType
	 */
	var $directoryRestrictionType = null;


}

class KalturaDocumentEntry extends KalturaBaseEntry
{
	/**
	 * The type of the document
	 *
	 * @var KalturaDocumentType
	 * @insertonly
	 */
	var $documentType = null;


}

class KalturaDocumentEntryFilter extends KalturaBaseEntryFilter
{
	/**
	 * 
	 *
	 * @var KalturaDocumentType
	 */
	var $documentTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $documentTypeIn = null;


}

class KalturaEntryContextDataParams extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $referrer = null;


}

class KalturaEntryContextDataResult extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var bool
	 */
	var $isSiteRestricted = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $isCountryRestricted = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $isSessionRestricted = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $previewLength = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $isScheduledNow = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $isAdmin = null;


}

class KalturaFileSyncFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var KalturaFileSyncObjectType
	 */
	var $objectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $objectTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $objectIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $objectIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $versionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $versionIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $objectSubTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $objectSubTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $dcEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $dcIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $originalEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $readyAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $readyAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $syncTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $syncTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var KalturaFileSyncStatus
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
	 * @var KalturaFileSyncType
	 */
	var $fileTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $fileTypeIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $linkedIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $linkCountGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $linkCountLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $fileSizeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $fileSizeLessThanOrEqual = null;


}

class KalturaFilterPager extends KalturaObjectBase
{
	/**
	 * The number of objects to retrieve. (Default is 30, maximum page size is 500).
	 * 
	 *
	 * @var int
	 */
	var $pageSize = null;

	/**
	 * The page number for which {pageSize} of objects should be retrieved (Default is 1).
	 * 
	 *
	 * @var int
	 */
	var $pageIndex = null;


}

class KalturaFlavorAsset extends KalturaObjectBase
{
	/**
	 * The ID of the Flavor Asset
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * The entry ID of the Flavor Asset
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $entryId = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The status of the Flavor Asset
	 * 
	 *
	 * @var KalturaFlavorAssetStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * The Flavor Params used to create this Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $flavorParamsId = null;

	/**
	 * The version of the Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $version = null;

	/**
	 * The width of the Flavor Asset 
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $width = null;

	/**
	 * The height of the Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $height = null;

	/**
	 * The overall bitrate (in KBits) of the Flavor Asset 
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $bitrate = null;

	/**
	 * The frame rate (in FPS) of the Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $frameRate = null;

	/**
	 * The size (in KBytes) of the Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $size = null;

	/**
	 * True if this Flavor Asset is the original source
	 * 
	 *
	 * @var bool
	 */
	var $isOriginal = null;

	/**
	 * Tags used to identify the Flavor Asset in various scenarios
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * True if this Flavor Asset is playable in KDP
	 * 
	 *
	 * @var bool
	 */
	var $isWeb = null;

	/**
	 * The file extension
	 * 
	 *
	 * @var string
	 */
	var $fileExt = null;

	/**
	 * The container format
	 * 
	 *
	 * @var string
	 */
	var $containerFormat = null;

	/**
	 * The video codec
	 * 
	 *
	 * @var string
	 */
	var $videoCodecId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $deletedAt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $description = null;


}

class KalturaFlavorAssetWithParams extends KalturaObjectBase
{
	/**
	 * The Flavor Asset (Can be null when there are params without asset)
	 * 
	 *
	 * @var KalturaFlavorAsset
	 */
	var $flavorAsset;

	/**
	 * The Flavor Params
	 * 
	 *
	 * @var KalturaFlavorParams
	 */
	var $flavorParams;

	/**
	 * The entry id
	 * 
	 *
	 * @var string
	 */
	var $entryId = null;


}

class KalturaFlavorParams extends KalturaObjectBase
{
	/**
	 * The id of the Flavor Params
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The name of the Flavor Params
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * The description of the Flavor Params
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * True if those Flavor Params are part of system defaults
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $isSystemDefault = null;

	/**
	 * The Flavor Params tags are used to identify the flavor for different usage (e.g. web, hd, mobile)
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * The container format of the Flavor Params
	 * 
	 *
	 * @var KalturaContainerFormat
	 */
	var $format;

	/**
	 * The video codec of the Flavor Params
	 * 
	 *
	 * @var KalturaVideoCodec
	 */
	var $videoCodec;

	/**
	 * The video bitrate (in KBits) of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $videoBitrate = null;

	/**
	 * The audio codec of the Flavor Params
	 * 
	 *
	 * @var KalturaAudioCodec
	 */
	var $audioCodec;

	/**
	 * The audio bitrate (in KBits) of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $audioBitrate = null;

	/**
	 * The number of audio channels for "downmixing"
	 * 
	 *
	 * @var int
	 */
	var $audioChannels = null;

	/**
	 * The audio sample rate of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $audioSampleRate = null;

	/**
	 * The desired width of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $width = null;

	/**
	 * The desired height of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $height = null;

	/**
	 * The frame rate of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $frameRate = null;

	/**
	 * The gop size of the Flavor Params
	 * 
	 *
	 * @var int
	 */
	var $gopSize = null;

	/**
	 * The list of conversion engines (comma separated)
	 * 
	 *
	 * @var string
	 */
	var $conversionEngines = null;

	/**
	 * The list of conversion engines extra params (separated with "|")
	 * 
	 *
	 * @var string
	 */
	var $conversionEnginesExtraParams = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $twoPass = null;


}

class KalturaFlavorParamsFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 */
	var $isSystemDefaultEqual = null;


}

class KalturaFlavorParamsListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaFlavorParamsArray
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

class KalturaFlavorParamsOutput extends KalturaFlavorParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $flavorParamsId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $commandLinesStr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorParamsVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorAssetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorAssetVersion = null;


}

class KalturaFlavorParamsOutputFilter extends KalturaFlavorParamsFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $flavorParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorParamsVersionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorAssetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorAssetVersionEqual = null;


}

class KalturaGoogleVideoSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var KalturaGoogleSyndicationFeedAdultValues
	 */
	var $adultContent;


}

class KalturaGoogleVideoSyndicationFeedFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaITunesSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * feed description
	 * 
	 *
	 * @var string
	 */
	var $feedDescription = null;

	/**
	 * feed language
	 * 
	 *
	 * @var string
	 */
	var $language = null;

	/**
	 * feed landing page (i.e publisher website)
	 * 
	 *
	 * @var string
	 */
	var $feedLandingPage = null;

	/**
	 * author/publisher name
	 * 
	 *
	 * @var string
	 */
	var $ownerName = null;

	/**
	 * publisher email
	 * 
	 *
	 * @var string
	 */
	var $ownerEmail = null;

	/**
	 * podcast thumbnail
	 * 
	 *
	 * @var string
	 */
	var $feedImageUrl = null;

	/**
	 * 
	 *
	 * @var KalturaITunesSyndicationFeedCategories
	 * @readonly
	 */
	var $category;

	/**
	 * 
	 *
	 * @var KalturaITunesSyndicationFeedAdultValues
	 */
	var $adultContent;

	/**
	 * 
	 *
	 * @var string
	 */
	var $feedAuthor = null;


}

class KalturaITunesSyndicationFeedFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaMailJobFilter extends KalturaBaseJobFilter
{

}

class KalturaPlayableEntry extends KalturaBaseEntry
{
	/**
	 * Number of plays
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $plays = null;

	/**
	 * Number of views
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $views = null;

	/**
	 * The width in pixels
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $width = null;

	/**
	 * The height in pixels
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $height = null;

	/**
	 * The duration in seconds
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $duration = null;

	/**
	 * The duration type (short for 0-4 mins, medium for 4-20 mins, long for 20+ mins)
	 * 
	 *
	 * @var KalturaDurationType
	 * @readonly
	 */
	var $durationType;


}

class KalturaMediaEntry extends KalturaPlayableEntry
{
	/**
	 * The media type of the entry
	 * 
	 *
	 * @var KalturaMediaType
	 * @insertonly
	 */
	var $mediaType = null;

	/**
	 * Override the default conversion quality  
	 * 
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

	/**
	 * Comma separated flavor params ids that exists for this media entry
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $flavorParamsIds = null;


}

class KalturaPlayableEntryFilter extends KalturaBaseEntryFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $durationLessThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $durationGreaterThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $durationLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $durationGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $durationTypeMatchOr = null;


}

class KalturaMediaEntryFilter extends KalturaPlayableEntryFilter
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
	var $mediaDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $mediaDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorParamsIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorParamsIdsMatchAnd = null;


}

class KalturaMediaEntryFilterForPlaylist extends KalturaMediaEntryFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $limit = null;


}

class KalturaMediaInfoFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorAssetIdEqual = null;


}

class KalturaMediaListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaMediaEntryArray
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
	 *
	 * @var bool
	 * @readonly
	 */
	var $hasRealThumbnail = null;

	/**
	 * The editor type used to edit the metadata
	 * 
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


}

class KalturaMixEntryFilter extends KalturaPlayableEntryFilter
{

}

class KalturaMixListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaMixEntryArray
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

class KalturaModerationFlag extends KalturaObjectBase
{
	/**
	 * Moderation flag id
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * The user id that added the moderation flag
	 *
	 * @var string
	 * @readonly
	 */
	var $userId = null;

	/**
	 * The type of the moderation flag (entry or user)
	 *
	 * @var KalturaModerationObjectType
	 * @readonly
	 */
	var $moderationObjectType = null;

	/**
	 * If moderation flag is set for entry, this is the flagged entry id
	 *
	 * @var string
	 */
	var $flaggedEntryId = null;

	/**
	 * If moderation flag is set for user, this is the flagged user id
	 *
	 * @var string
	 */
	var $flaggedUserId = null;

	/**
	 * The moderation flag status
	 *
	 * @var KalturaModerationFlagStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * The comment that was added to the flag
	 *
	 * @var string
	 */
	var $comments = null;

	/**
	 * 
	 *
	 * @var KalturaModerationFlagType
	 */
	var $flagType = null;

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


}

class KalturaModerationFlagListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaModerationFlagArray
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

class KalturaNotificationFilter extends KalturaBaseJobFilter
{

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
	 * @var KalturaCommercialUseType
	 */
	var $commercialUse;

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
	 * @var KalturaPartnerType
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
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerPackage = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $secret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $adminSecret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $cmsPassword = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $allowMultiNotification = null;


}

class KalturaPartnerFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
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
	 * @var int
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
	var $partnerNameDescriptionWebsiteAdminNameAdminEmailLike = null;


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
	 * XML if the playlistType is dynamic 
	 * text if the playlistType is static 
	 * url if the playlistType is mRss 
	 *
	 * @var string
	 */
	var $playlistContent = null;

	/**
	 * 
	 *
	 * @var KalturaMediaEntryFilterForPlaylistArray
	 */
	var $filters;

	/**
	 * 
	 *
	 * @var int
	 */
	var $totalResults = null;

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


}

class KalturaPlaylistFilter extends KalturaBaseEntryFilter
{

}

class KalturaPlaylistListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaPlaylistArray
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

class KalturaSessionRestriction extends KalturaBaseRestriction
{

}

class KalturaPreviewRestriction extends KalturaSessionRestriction
{
	/**
	 * The preview restriction length 
	 * 
	 *
	 * @var int
	 */
	var $previewLength = null;


}

class KalturaReportGraph extends KalturaObjectBase
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
	var $data = null;


}

class KalturaReportInputFilter extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $fromDate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $toDate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $keywords = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $searchInTags = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $searchInAdminTags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $categories = null;


}

class KalturaReportTable extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $header = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $data = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $totalCount = null;


}

class KalturaReportTotal extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $header = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $data = null;


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
	 *
	 * @var string
	 */
	var $extraData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $authData = null;


}

class KalturaSearchAuthData extends KalturaObjectBase
{
	/**
	 * The authentication data that further should be used for search
	 * 
	 *
	 * @var string
	 */
	var $authData = null;

	/**
	 * Login URL when user need to sign-in and authorize the search
	 *
	 * @var string
	 */
	var $loginUrl = null;

	/**
	 * Information when there was an error
	 *
	 * @var string
	 */
	var $message = null;


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

class KalturaSearchResultResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaSearchResultArray
	 * @readonly
	 */
	var $objects;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	var $needMediaInfo = null;


}

class KalturaSiteRestriction extends KalturaBaseRestriction
{
	/**
	 * The site restriction type (allow or deny)
	 * 
	 *
	 * @var KalturaSiteRestrictionType
	 */
	var $siteRestrictionType = null;

	/**
	 * Comma separated list of sites (domains) to allow or deny
	 * 
	 *
	 * @var string
	 */
	var $siteList = null;


}

class KalturaStartWidgetSessionResponse extends KalturaObjectBase
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
	var $userId = null;


}

class KalturaStatsEvent extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $clientVer = null;

	/**
	 * 
	 *
	 * @var KalturaStatsEventType
	 */
	var $eventType = null;

	/**
	 * the client's timestamp of this event
	 * 
	 *
	 * @var float
	 */
	var $eventTimestamp = null;

	/**
	 * a unique string generated by the client that will represent the client-side session: the primary component will pass it on to other components that sprout from it
	 *
	 * @var string
	 */
	var $sessionId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryId = null;

	/**
	 * the UV cookie - creates in the operational system and should be passed on ofr every event 
	 *
	 * @var string
	 */
	var $uniqueViewer = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $widgetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $uiconfId = null;

	/**
	 * the partner's user id 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * the timestamp along the video when the event happend 
	 *
	 * @var int
	 */
	var $currentPoint = null;

	/**
	 * the duration of the video in milliseconds - will make it much faster than quering the db for each entry 
	 *
	 * @var int
	 */
	var $duration = null;

	/**
	 * will be retrieved from the request of the user 
	 *
	 * @var string
	 * @readonly
	 */
	var $userIp = null;

	/**
	 * the time in milliseconds the event took
	 *
	 * @var int
	 */
	var $processDuration = null;

	/**
	 * the id of the GUI control - will be used in the future to better understand what the user clicked
	 *
	 * @var string
	 */
	var $controlId = null;

	/**
	 * true if the user ever used seek in this session 
	 *
	 * @var bool
	 */
	var $seek = null;

	/**
	 * timestamp of the new point on the timeline of the video after the user seeks 
	 *
	 * @var int
	 */
	var $newPoint = null;

	/**
	 * the referrer of the client
	 *
	 * @var string
	 */
	var $referrer = null;

	/**
	 * will indicate if the event is thrown for the first video in the session
	 *
	 * @var bool
	 */
	var $isFirstInSession = null;


}

class KalturaStatsKmcEvent extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $clientVer = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $kmcEventActionPath = null;

	/**
	 * 
	 *
	 * @var KalturaStatsKmcEventType
	 */
	var $kmcEventType = null;

	/**
	 * the client's timestamp of this event
	 * 
	 *
	 * @var float
	 */
	var $eventTimestamp = null;

	/**
	 * a unique string generated by the client that will represent the client-side session: the primary component will pass it on to other components that sprout from it
	 *
	 * @var string
	 */
	var $sessionId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $widgetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $uiconfId = null;

	/**
	 * the partner's user id 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * will be retrieved from the request of the user 
	 *
	 * @var string
	 * @readonly
	 */
	var $userIp = null;


}

class KalturaSyndicationFeedEntryCount extends KalturaObjectBase
{
	/**
	 * the total count of entries that should appear in the feed without flavor filtering
	 *
	 * @var int
	 */
	var $totalEntryCount = null;

	/**
	 * count of entries that will appear in the feed (including all relevant filters)
	 *
	 * @var int
	 */
	var $actualEntryCount = null;

	/**
	 * count of entries that requires transcoding in order to be included in feed
	 *
	 * @var int
	 */
	var $requireTranscodingCount = null;


}

class KalturaTubeMogulSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var KalturaTubeMogulSyndicationFeedCategories
	 * @readonly
	 */
	var $category;


}

class KalturaTubeMogulSyndicationFeedFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaUiConf extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
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
	 * 
	 *
	 * @var KalturaUiConfCreationMode
	 */
	var $creationMode = null;


}

class KalturaUiConfFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
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
	var $nameLike = null;

	/**
	 * 
	 *
	 * @var KalturaUiConfObjType
	 */
	var $objTypeEqual = null;

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
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var KalturaUiConfCreationMode
	 */
	var $creationModeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $creationModeIn = null;


}

class KalturaUiConfListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaUiConfArray
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

class KalturaUploadResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $uploadTokenId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $fileSize = null;

	/**
	 * 
	 *
	 * @var KalturaUploadErrorCode
	 */
	var $errorCode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $errorDescription = null;


}

class KalturaUser extends KalturaObjectBase
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
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

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
	 * @var int
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
	var $thumbnailUrl = null;

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
	 * Admin tags can be updated only by using an admin session
	 *
	 * @var string
	 */
	var $adminTags = null;

	/**
	 * 
	 *
	 * @var KalturaGender
	 */
	var $gender = null;

	/**
	 * 
	 *
	 * @var KalturaUserStatus
	 */
	var $status = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Last update date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

	/**
	 * Can be used to store various partner related data as a string 
	 *
	 * @var string
	 */
	var $partnerData = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $indexedPartnerDataInt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $indexedPartnerDataString = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $storageSize = null;


}

class KalturaUserFilter extends KalturaFilter
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
	 * @var int
	 */
	var $partnerIdEqual = null;

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
	var $screenNameStartsWith = null;

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
	var $emailStartsWith = null;

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
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;


}

class KalturaUserListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaUserArray
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
	 * Can be used to store various partner related data as a string 
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

class KalturaWidgetFilter extends KalturaFilter
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
	var $sourceWidgetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $rootWidgetIdEqual = null;

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
	var $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $uiConfIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerDataLike = null;


}

class KalturaWidgetListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaWidgetArray
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

class KalturaYahooSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var KalturaYahooSyndicationFeedCategories
	 * @readonly
	 */
	var $category;

	/**
	 * 
	 *
	 * @var KalturaYahooSyndicationFeedAdultValues
	 */
	var $adultContent;

	/**
	 * feed description
	 * 
	 *
	 * @var string
	 */
	var $feedDescription = null;

	/**
	 * feed landing page (i.e publisher website)
	 * 
	 *
	 * @var string
	 */
	var $feedLandingPage = null;


}

class KalturaYahooSyndicationFeedFilter extends KalturaBaseSyndicationFeedFilter
{

}


class KalturaAccessControlService extends KalturaServiceBase
{
	function KalturaAccessControlService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($accessControl)
	{
		$kparams = array();
		$this->client->addParam($kparams, "accessControl", $accessControl->toParams());
		$resultObject = $this->client->callService("accesscontrol", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAccessControl");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("accesscontrol", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAccessControl");
		return $resultObject;
	}

	function update($id, $accessControl)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "accessControl", $accessControl->toParams());
		$resultObject = $this->client->callService("accesscontrol", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAccessControl");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("accesscontrol", "delete", $kparams);
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
		$resultObject = $this->client->callService("accesscontrol", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAccessControlListResponse");
		return $resultObject;
	}
}

class KalturaAdminUserService extends KalturaServiceBase
{
	function KalturaAdminUserService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function updatePassword($email, $password, $newEmail = "", $newPassword = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$this->client->addParam($kparams, "password", $password);
		$this->client->addParam($kparams, "newEmail", $newEmail);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$resultObject = $this->client->callService("adminuser", "updatePassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAdminUser");
		return $resultObject;
	}

	function resetPassword($email)
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$resultObject = $this->client->callService("adminuser", "resetPassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function login($email, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$this->client->addParam($kparams, "password", $password);
		$resultObject = $this->client->callService("adminuser", "login", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
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

	function get($entryId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "version", $version);
		$resultObject = $this->client->callService("baseentry", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function update($entryId, $baseEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "baseEntry", $baseEntry->toParams());
		$resultObject = $this->client->callService("baseentry", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function getByIds($entryIds)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryIds", $entryIds);
		$resultObject = $this->client->callService("baseentry", "getByIds", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
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

	function count($filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$resultObject = $this->client->callService("baseentry", "count", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	function upload($fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("baseentry", "upload", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function updateThumbnailJpeg($entryId, $fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("baseentry", "updateThumbnailJpeg", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function updateThumbnailFromUrl($entryId, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("baseentry", "updateThumbnailFromUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function updateThumbnailFromSourceEntry($entryId, $sourceEntryId, $timeOffset)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
		$this->client->addParam($kparams, "timeOffset", $timeOffset);
		$resultObject = $this->client->callService("baseentry", "updateThumbnailFromSourceEntry", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function flag($moderationFlag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "moderationFlag", $moderationFlag->toParams());
		$resultObject = $this->client->callService("baseentry", "flag", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function reject($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("baseentry", "reject", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function approve($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("baseentry", "approve", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listFlags($entryId, $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("baseentry", "listFlags", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaModerationFlagListResponse");
		return $resultObject;
	}

	function anonymousRank($entryId, $rank)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "rank", $rank);
		$resultObject = $this->client->callService("baseentry", "anonymousRank", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function getContextData($entryId, $contextDataParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
		$resultObject = $this->client->callService("baseentry", "getContextData", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryContextDataResult");
		return $resultObject;
	}
}

class KalturaBulkUploadService extends KalturaServiceBase
{
	function KalturaBulkUploadService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($conversionProfileId, $csvFileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
		$this->client->addParam($kparams, "csvFileData", $csvFileData->toParams());
		$resultObject = $this->client->callService("bulkupload", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUpload");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("bulkupload", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUpload");
		return $resultObject;
	}

	function listAction($pager = null)
	{
		$kparams = array();
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("bulkupload", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUploadListResponse");
		return $resultObject;
	}
}

class KalturaCategoryService extends KalturaServiceBase
{
	function KalturaCategoryService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($category)
	{
		$kparams = array();
		$this->client->addParam($kparams, "category", $category->toParams());
		$resultObject = $this->client->callService("category", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategory");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("category", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategory");
		return $resultObject;
	}

	function update($id, $category)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "category", $category->toParams());
		$resultObject = $this->client->callService("category", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategory");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("category", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction($filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$resultObject = $this->client->callService("category", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryListResponse");
		return $resultObject;
	}
}

class KalturaConversionProfileService extends KalturaServiceBase
{
	function KalturaConversionProfileService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($conversionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "conversionProfile", $conversionProfile->toParams());
		$resultObject = $this->client->callService("conversionprofile", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConversionProfile");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("conversionprofile", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConversionProfile");
		return $resultObject;
	}

	function update($id, $conversionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "conversionProfile", $conversionProfile->toParams());
		$resultObject = $this->client->callService("conversionprofile", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConversionProfile");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("conversionprofile", "delete", $kparams);
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
		$resultObject = $this->client->callService("conversionprofile", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConversionProfileListResponse");
		return $resultObject;
	}
}

class KalturaDataService extends KalturaServiceBase
{
	function KalturaDataService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($dataEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "dataEntry", $dataEntry->toParams());
		$resultObject = $this->client->callService("data", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDataEntry");
		return $resultObject;
	}

	function get($entryId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "version", $version);
		$resultObject = $this->client->callService("data", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDataEntry");
		return $resultObject;
	}

	function update($entryId, $documentEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
		$resultObject = $this->client->callService("data", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDataEntry");
		return $resultObject;
	}

	function delete($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("data", "delete", $kparams);
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
		$resultObject = $this->client->callService("data", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDataListResponse");
		return $resultObject;
	}
}

class KalturaFlavorAssetService extends KalturaServiceBase
{
	function KalturaFlavorAssetService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("flavorasset", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFlavorAsset");
		return $resultObject;
	}

	function getByEntryId($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("flavorasset", "getByEntryId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function getWebPlayableByEntryId($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("flavorasset", "getWebPlayableByEntryId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function convert($entryId, $flavorParamsId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
		$resultObject = $this->client->callService("flavorasset", "convert", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function reconvert($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("flavorasset", "reconvert", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("flavorasset", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function getDownloadUrl($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("flavorasset", "getDownloadUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function getFlavorAssetsWithParams($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("flavorasset", "getFlavorAssetsWithParams", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

class KalturaFlavorParamsService extends KalturaServiceBase
{
	function KalturaFlavorParamsService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($flavorParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "flavorParams", $flavorParams->toParams());
		$resultObject = $this->client->callService("flavorparams", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFlavorParams");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("flavorparams", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFlavorParams");
		return $resultObject;
	}

	function update($id, $flavorParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "flavorParams", $flavorParams->toParams());
		$resultObject = $this->client->callService("flavorparams", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFlavorParams");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("flavorparams", "delete", $kparams);
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
		$resultObject = $this->client->callService("flavorparams", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFlavorParamsListResponse");
		return $resultObject;
	}

	function getByConversionProfileId($conversionProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
		$resultObject = $this->client->callService("flavorparams", "getByConversionProfileId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

class KalturaMediaService extends KalturaServiceBase
{
	function KalturaMediaService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function addFromBulk($mediaEntry, $url, $bulkUploadId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "url", $url);
		$this->client->addParam($kparams, "bulkUploadId", $bulkUploadId);
		$resultObject = $this->client->callService("media", "addFromBulk", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
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

	function addFromSearchResult($mediaEntry = null, $searchResult = null)
	{
		$kparams = array();
		if ($mediaEntry !== null)
			$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		if ($searchResult !== null)
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

	function addFromRecordedWebcam($mediaEntry, $webcamTokenId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "webcamTokenId", $webcamTokenId);
		$resultObject = $this->client->callService("media", "addFromRecordedWebcam", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function get($entryId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "version", $version);
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

	function count($filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$resultObject = $this->client->callService("media", "count", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	function upload($fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("media", "upload", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
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

	function updateThumbnailFromSourceEntry($entryId, $sourceEntryId, $timeOffset)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
		$this->client->addParam($kparams, "timeOffset", $timeOffset);
		$resultObject = $this->client->callService("media", "updateThumbnailFromSourceEntry", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function updateThumbnailJpeg($entryId, $fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("media", "updateThumbnailJpeg", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function updateThumbnailFromUrl($entryId, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("media", "updateThumbnailFromUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseEntry");
		return $resultObject;
	}

	function requestConversion($entryId, $fileFormat)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileFormat", $fileFormat);
		$resultObject = $this->client->callService("media", "requestConversion", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	function flag($moderationFlag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "moderationFlag", $moderationFlag->toParams());
		$resultObject = $this->client->callService("media", "flag", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function reject($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("media", "reject", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function approve($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("media", "approve", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listFlags($entryId, $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("media", "listFlags", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaModerationFlagListResponse");
		return $resultObject;
	}

	function anonymousRank($entryId, $rank)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "rank", $rank);
		$resultObject = $this->client->callService("media", "anonymousRank", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
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

	function get($entryId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "version", $version);
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

	function count($filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$resultObject = $this->client->callService("mixing", "count", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
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
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	function getMixesByMediaId($mediaEntryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaEntryId", $mediaEntryId);
		$resultObject = $this->client->callService("mixing", "getMixesByMediaId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function getReadyMediaEntries($mixId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mixId", $mixId);
		$this->client->addParam($kparams, "version", $version);
		$resultObject = $this->client->callService("mixing", "getReadyMediaEntries", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function anonymousRank($entryId, $rank)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "rank", $rank);
		$resultObject = $this->client->callService("mixing", "anonymousRank", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
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

	function getSecrets($partnerId, $adminEmail, $cmsPassword)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "adminEmail", $adminEmail);
		$this->client->addParam($kparams, "cmsPassword", $cmsPassword);
		$resultObject = $this->client->callService("partner", "getSecrets", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	function getInfo()
	{
		$kparams = array();
		$resultObject = $this->client->callService("partner", "getInfo", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	function getUsage($year = "", $month = 1, $resolution = "days")
	{
		$kparams = array();
		$this->client->addParam($kparams, "year", $year);
		$this->client->addParam($kparams, "month", $month);
		$this->client->addParam($kparams, "resolution", $resolution);
		$resultObject = $this->client->callService("partner", "getUsage", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartnerUsage");
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

	function get($id, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "version", $version);
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
		$this->client->validateObjectType($resultObject, "KalturaPlaylist");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("playlist", "delete", $kparams);
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
		$resultObject = $this->client->callService("playlist", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaylistListResponse");
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

	function executeFromFilters(array $filters, $totalResults, $detailed = false)
	{
		$kparams = array();
		foreach(filters as $obj)
		{
			$this->client->addParam($kparams, "filters", $obj->toParams());
		}
		$this->client->addParam($kparams, "totalResults", $totalResults);
		$this->client->addParam($kparams, "detailed", $detailed);
		$resultObject = $this->client->callService("playlist", "executeFromFilters", $kparams);
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
		$this->client->validateObjectType($resultObject, "KalturaPlaylist");
		return $resultObject;
	}
}

class KalturaReportService extends KalturaServiceBase
{
	function KalturaReportService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function getGraphs($reportType, $reportInputFilter, $dimension = null, $objectIds = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "reportType", $reportType);
		$this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($kparams, "dimension", $dimension);
		$this->client->addParam($kparams, "objectIds", $objectIds);
		$resultObject = $this->client->callService("report", "getGraphs", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function getTotal($reportType, $reportInputFilter, $objectIds = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "reportType", $reportType);
		$this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($kparams, "objectIds", $objectIds);
		$resultObject = $this->client->callService("report", "getTotal", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReportTotal");
		return $resultObject;
	}

	function getTable($reportType, $reportInputFilter, $pager, $order = null, $objectIds = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "reportType", $reportType);
		$this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->addParam($kparams, "order", $order);
		$this->client->addParam($kparams, "objectIds", $objectIds);
		$resultObject = $this->client->callService("report", "getTable", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReportTable");
		return $resultObject;
	}

	function getUrlForReportAsCsv($reportTitle, $reportText, $headers, $reportType, $reportInputFilter, $dimension = null, $pager = null, $order = null, $objectIds = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "reportTitle", $reportTitle);
		$this->client->addParam($kparams, "reportText", $reportText);
		$this->client->addParam($kparams, "headers", $headers);
		$this->client->addParam($kparams, "reportType", $reportType);
		$this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($kparams, "dimension", $dimension);
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->addParam($kparams, "order", $order);
		$this->client->addParam($kparams, "objectIds", $objectIds);
		$resultObject = $this->client->callService("report", "getUrlForReportAsCsv", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
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
		$this->client->validateObjectType($resultObject, "KalturaSearchResultResponse");
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

	function externalLogin($searchSource, $userName, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "searchSource", $searchSource);
		$this->client->addParam($kparams, "userName", $userName);
		$this->client->addParam($kparams, "password", $password);
		$resultObject = $this->client->callService("search", "externalLogin", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchAuthData");
		return $resultObject;
	}
}

class KalturaSessionService extends KalturaServiceBase
{
	function KalturaSessionService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function start($secret, $userId = "", $type = 0, $partnerId = -1, $expiry = 86400, $privileges = null)
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
		$this->client->validateObjectType($resultObject, "KalturaStartWidgetSessionResponse");
		return $resultObject;
	}
}

class KalturaStatsService extends KalturaServiceBase
{
	function KalturaStatsService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function collect($event)
	{
		$kparams = array();
		$this->client->addParam($kparams, "event", $event->toParams());
		$resultObject = $this->client->callService("stats", "collect", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function kmcCollect($kmcEvent)
	{
		$kparams = array();
		$this->client->addParam($kparams, "kmcEvent", $kmcEvent->toParams());
		$resultObject = $this->client->callService("stats", "kmcCollect", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function reportKceError($kalturaCEError)
	{
		$kparams = array();
		$this->client->addParam($kparams, "kalturaCEError", $kalturaCEError->toParams());
		$resultObject = $this->client->callService("stats", "reportKceError", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCEError");
		return $resultObject;
	}
}

class KalturaSyndicationFeedService extends KalturaServiceBase
{
	function KalturaSyndicationFeedService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($syndicationFeed)
	{
		$kparams = array();
		$this->client->addParam($kparams, "syndicationFeed", $syndicationFeed->toParams());
		$resultObject = $this->client->callService("syndicationfeed", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseSyndicationFeed");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("syndicationfeed", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseSyndicationFeed");
		return $resultObject;
	}

	function update($id, $syndicationFeed)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "syndicationFeed", $syndicationFeed->toParams());
		$resultObject = $this->client->callService("syndicationfeed", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseSyndicationFeed");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("syndicationfeed", "delete", $kparams);
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
		$resultObject = $this->client->callService("syndicationfeed", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBaseSyndicationFeedListResponse");
		return $resultObject;
	}

	function getEntryCount($feedId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "feedId", $feedId);
		$resultObject = $this->client->callService("syndicationfeed", "getEntryCount", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSyndicationFeedEntryCount");
		return $resultObject;
	}

	function requestConversion($feedId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "feedId", $feedId);
		$resultObject = $this->client->callService("syndicationfeed", "requestConversion", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
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

	function listTemplates($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("uiconf", "listTemplates", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUiConfListResponse");
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
		$this->client->validateObjectType($resultObject, "KalturaUiConfListResponse");
		return $resultObject;
	}
}

class KalturaUploadService extends KalturaServiceBase
{
	function KalturaUploadService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function upload($fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("upload", "upload", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function getUploadedFileTokenByFileName($fileName)
	{
		$kparams = array();
		$this->client->addParam($kparams, "fileName", $fileName);
		$resultObject = $this->client->callService("upload", "getUploadedFileTokenByFileName", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadResponse");
		return $resultObject;
	}
}

class KalturaUserService extends KalturaServiceBase
{
	function KalturaUserService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($user)
	{
		$kparams = array();
		$this->client->addParam($kparams, "user", $user->toParams());
		$resultObject = $this->client->callService("user", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function update($userId, $user)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "user", $user->toParams());
		$resultObject = $this->client->callService("user", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function get($userId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$resultObject = $this->client->callService("user", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function delete($userId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
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
		$this->client->validateObjectType($resultObject, "KalturaUserListResponse");
		return $resultObject;
	}

	function notifyBan($userId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$resultObject = $this->client->callService("user", "notifyBan", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
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
		$this->client->validateObjectType($resultObject, "KalturaWidgetListResponse");
		return $resultObject;
	}
}

class KalturaXInternalService extends KalturaServiceBase
{
	function KalturaXInternalService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function xAddBulkDownload($entryIds, $flavorParamsId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryIds", $entryIds);
		$this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
		$resultObject = $this->client->callService("xinternal", "xAddBulkDownload", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}
}

class KalturaClient extends KalturaClientBase
{
	/**
	 * Add & Manage Access Controls
	 *
	 * @var KalturaAccessControlService
	 */
	var $accessControl = null;

	/**
	 * Manage details for the administrative user
	 *
	 * @var KalturaAdminUserService
	 */
	var $adminUser = null;

	/**
	 * Base Entry Service
	 *
	 * @var KalturaBaseEntryService
	 */
	var $baseEntry = null;

	/**
	 * Bulk upload service is used to upload & manage bulk uploads using CSV files
	 *
	 * @var KalturaBulkUploadService
	 */
	var $bulkUpload = null;

	/**
	 * Add & Manage Categories
	 *
	 * @var KalturaCategoryService
	 */
	var $category = null;

	/**
	 * Add & Manage Conversion Profiles
	 *
	 * @var KalturaConversionProfileService
	 */
	var $conversionProfile = null;

	/**
	 * Data service lets you manage data content (textual content)
	 *
	 * @var KalturaDataService
	 */
	var $data = null;

	/**
	 * Retrieve information and invoke actions on Flavor Asset
	 *
	 * @var KalturaFlavorAssetService
	 */
	var $flavorAsset = null;

	/**
	 * Add & Manage Flavor Params
	 *
	 * @var KalturaFlavorParamsService
	 */
	var $flavorParams = null;

	/**
	 * Media service lets you upload and manage media files (images / videos & audio)
	 *
	 * @var KalturaMediaService
	 */
	var $media = null;

	/**
	 * A Mix is an XML unique format invented by Kaltura, it allows the user to create a mix of videos and images, in and out points, transitions, text overlays, soundtrack, effects and much more...
	 * Mixing service lets you create a new mix, manage its metadata and make basic manipulations.   
	 *
	 * @var KalturaMixingService
	 */
	var $mixing = null;

	/**
	 * Notification Service
	 *
	 * @var KalturaNotificationService
	 */
	var $notification = null;

	/**
	 * partner service allows you to change/manage your partner personal details and settings as well
	 *
	 * @var KalturaPartnerService
	 */
	var $partner = null;

	/**
	 * Playlist service lets you create,manage and play your playlists
	 * Playlists could be static (containing a fixed list of entries) or dynamic (baseed on a filter)
	 *
	 * @var KalturaPlaylistService
	 */
	var $playlist = null;

	/**
	 * api for getting reports data by the report type and some inputFilter
	 *
	 * @var KalturaReportService
	 */
	var $report = null;

	/**
	 * Search service allows you to search for media in various media providers
	 * This service is being used mostly by the CW component
	 *
	 * @var KalturaSearchService
	 */
	var $search = null;

	/**
	 * Session service
	 *
	 * @var KalturaSessionService
	 */
	var $session = null;

	/**
	 * Stats Service
	 *
	 * @var KalturaStatsService
	 */
	var $stats = null;

	/**
	 * Add & Manage Syndication Feeds
	 *
	 * @var KalturaSyndicationFeedService
	 */
	var $syndicationFeed = null;

	/**
	 * System service is used for internal system helpers & to retrieve system level information
	 *
	 * @var KalturaSystemService
	 */
	var $system = null;

	/**
	 * UiConf service lets you create and manage your UIConfs for the various flash components
	 * This service is used by the KMC-ApplicationStudio
	 *
	 * @var KalturaUiConfService
	 */
	var $uiConf = null;

	/**
	 * 
	 *
	 * @var KalturaUploadService
	 */
	var $upload = null;

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
	 * Internal Service is used for actions that are used internally in Kaltura applications and might be changed in the future without any notice.
	 *
	 * @var KalturaXInternalService
	 */
	var $xInternal = null;


	function KalturaClient($config)
	{
		parent::KalturaClientBase(/*KalturaConfiguration*/ $config);
		$this->accessControl = new KalturaAccessControlService($this);
		$this->adminUser = new KalturaAdminUserService($this);
		$this->baseEntry = new KalturaBaseEntryService($this);
		$this->bulkUpload = new KalturaBulkUploadService($this);
		$this->category = new KalturaCategoryService($this);
		$this->conversionProfile = new KalturaConversionProfileService($this);
		$this->data = new KalturaDataService($this);
		$this->flavorAsset = new KalturaFlavorAssetService($this);
		$this->flavorParams = new KalturaFlavorParamsService($this);
		$this->media = new KalturaMediaService($this);
		$this->mixing = new KalturaMixingService($this);
		$this->notification = new KalturaNotificationService($this);
		$this->partner = new KalturaPartnerService($this);
		$this->playlist = new KalturaPlaylistService($this);
		$this->report = new KalturaReportService($this);
		$this->search = new KalturaSearchService($this);
		$this->session = new KalturaSessionService($this);
		$this->stats = new KalturaStatsService($this);
		$this->syndicationFeed = new KalturaSyndicationFeedService($this);
		$this->system = new KalturaSystemService($this);
		$this->uiConf = new KalturaUiConfService($this);
		$this->upload = new KalturaUploadService($this);
		$this->user = new KalturaUserService($this);
		$this->widget = new KalturaWidgetService($this);
		$this->xInternal = new KalturaXInternalService($this);
	}
}
