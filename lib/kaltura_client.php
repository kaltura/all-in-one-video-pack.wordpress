<?php
require_once("kaltura_client_base.php");

define("KalturaAccessControlOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaAccessControlOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaAdminUserOrderBy_ID_ASC", "+id");
define("KalturaAdminUserOrderBy_ID_DESC", "-id");
define("KalturaAdminUserOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaAdminUserOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaAnnotationOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaAnnotationOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaAnnotationOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaAnnotationOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaApiActionPermissionItemOrderBy_ID_ASC", "+id");
define("KalturaApiActionPermissionItemOrderBy_ID_DESC", "-id");
define("KalturaApiActionPermissionItemOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaApiActionPermissionItemOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaApiActionPermissionItemOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaApiActionPermissionItemOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaApiParameterPermissionItemAction_READ", "read");
define("KalturaApiParameterPermissionItemAction_UPDATE", "update");
define("KalturaApiParameterPermissionItemAction_INSERT", "insert");

define("KalturaApiParameterPermissionItemOrderBy_ID_ASC", "+id");
define("KalturaApiParameterPermissionItemOrderBy_ID_DESC", "-id");
define("KalturaApiParameterPermissionItemOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaApiParameterPermissionItemOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaApiParameterPermissionItemOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaApiParameterPermissionItemOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaAssetOrderBy_SIZE_ASC", "+size");
define("KalturaAssetOrderBy_SIZE_DESC", "-size");
define("KalturaAssetOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaAssetOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaAssetOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaAssetOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaAssetOrderBy_DELETED_AT_ASC", "+deletedAt");
define("KalturaAssetOrderBy_DELETED_AT_DESC", "-deletedAt");



define("KalturaAssetType_FLAVOR", "1");
define("KalturaAssetType_THUMBNAIL", "2");
define("KalturaAssetType_DOCUMENT", "document.Document");
define("KalturaAssetType_SWF", "document.SWF");
define("KalturaAssetType_PDF", "document.PDF");

define("KalturaAudioCodec_NONE", "");
define("KalturaAudioCodec_MP3", "mp3");
define("KalturaAudioCodec_AAC", "aac");
define("KalturaAudioCodec_VORBIS", "vorbis");
define("KalturaAudioCodec_WMA", "wma");
define("KalturaAudioCodec_COPY", "copy");

define("KalturaAuditTrailAction_CREATED", "CREATED");
define("KalturaAuditTrailAction_COPIED", "COPIED");
define("KalturaAuditTrailAction_CHANGED", "CHANGED");
define("KalturaAuditTrailAction_DELETED", "DELETED");
define("KalturaAuditTrailAction_VIEWED", "VIEWED");
define("KalturaAuditTrailAction_CONTENT_VIEWED", "CONTENT_VIEWED");
define("KalturaAuditTrailAction_FILE_SYNC_CREATED", "FILE_SYNC_CREATED");
define("KalturaAuditTrailAction_RELATION_ADDED", "RELATION_ADDED");
define("KalturaAuditTrailAction_RELATION_REMOVED", "RELATION_REMOVED");

define("KalturaAuditTrailContext_CLIENT", -1);
define("KalturaAuditTrailContext_SCRIPT", 0);
define("KalturaAuditTrailContext_PS2", 1);
define("KalturaAuditTrailContext_API_V3", 2);

define("KalturaAuditTrailObjectType_ACCESS_CONTROL", "accessControl");
define("KalturaAuditTrailObjectType_ADMIN_KUSER", "adminKuser");
define("KalturaAuditTrailObjectType_BATCH_JOB", "BatchJob");
define("KalturaAuditTrailObjectType_CATEGORY", "category");
define("KalturaAuditTrailObjectType_CONVERSION_PROFILE_2", "conversionProfile2");
define("KalturaAuditTrailObjectType_EMAIL_INGESTION_PROFILE", "EmailIngestionProfile");
define("KalturaAuditTrailObjectType_ENTRY", "entry");
define("KalturaAuditTrailObjectType_FILE_SYNC", "FileSync");
define("KalturaAuditTrailObjectType_FLAVOR_ASSET", "flavorAsset");
define("KalturaAuditTrailObjectType_FLAVOR_PARAMS", "flavorParams");
define("KalturaAuditTrailObjectType_FLAVOR_PARAMS_CONVERSION_PROFILE", "flavorParamsConversionProfile");
define("KalturaAuditTrailObjectType_FLAVOR_PARAMS_OUTPUT", "flavorParamsOutput");
define("KalturaAuditTrailObjectType_KSHOW", "kshow");
define("KalturaAuditTrailObjectType_KSHOW_KUSER", "KshowKuser");
define("KalturaAuditTrailObjectType_KUSER", "kuser");
define("KalturaAuditTrailObjectType_MEDIA_INFO", "mediaInfo");
define("KalturaAuditTrailObjectType_MODERATION", "moderation");
define("KalturaAuditTrailObjectType_PARTNER", "Partner");
define("KalturaAuditTrailObjectType_ROUGHCUT", "roughcutEntry");
define("KalturaAuditTrailObjectType_SYNDICATION", "syndicationFeed");
define("KalturaAuditTrailObjectType_UI_CONF", "uiConf");
define("KalturaAuditTrailObjectType_UPLOAD_TOKEN", "UploadToken");
define("KalturaAuditTrailObjectType_WIDGET", "widget");
define("KalturaAuditTrailObjectType_METADATA", "Metadata");
define("KalturaAuditTrailObjectType_METADATA_PROFILE", "MetadataProfile");
define("KalturaAuditTrailObjectType_USER_LOGIN_DATA", "UserLoginData");
define("KalturaAuditTrailObjectType_USER_ROLE", "UserRole");
define("KalturaAuditTrailObjectType_PERMISSION", "Permission");

define("KalturaAuditTrailOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaAuditTrailOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaAuditTrailOrderBy_PARSED_AT_ASC", "+parsedAt");
define("KalturaAuditTrailOrderBy_PARSED_AT_DESC", "-parsedAt");

define("KalturaAuditTrailStatus_PENDING", 1);
define("KalturaAuditTrailStatus_READY", 2);
define("KalturaAuditTrailStatus_FAILED", 3);

define("KalturaBaseEntryOrderBy_NAME_ASC", "+name");
define("KalturaBaseEntryOrderBy_NAME_DESC", "-name");
define("KalturaBaseEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaBaseEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaBaseEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBaseEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaBaseEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaBaseEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaBaseEntryOrderBy_RANK_ASC", "+rank");
define("KalturaBaseEntryOrderBy_RANK_DESC", "-rank");

define("KalturaBaseJobOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBaseJobOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaBaseJobOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaBaseJobOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaBaseJobOrderBy_PROCESSOR_EXPIRATION_ASC", "+processorExpiration");
define("KalturaBaseJobOrderBy_PROCESSOR_EXPIRATION_DESC", "-processorExpiration");
define("KalturaBaseJobOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaBaseJobOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");
define("KalturaBaseJobOrderBy_LOCK_VERSION_ASC", "+lockVersion");
define("KalturaBaseJobOrderBy_LOCK_VERSION_DESC", "-lockVersion");

define("KalturaBaseSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaBaseSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaBaseSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaBaseSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaBaseSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaBaseSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaBaseSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBaseSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaBatchJobErrorTypes_APP", 0);
define("KalturaBatchJobErrorTypes_RUNTIME", 1);
define("KalturaBatchJobErrorTypes_HTTP", 2);
define("KalturaBatchJobErrorTypes_CURL", 3);
define("KalturaBatchJobErrorTypes_KALTURA_API", 4);
define("KalturaBatchJobErrorTypes_KALTURA_CLIENT", 5);

define("KalturaBatchJobOrderBy_STATUS_ASC", "+status");
define("KalturaBatchJobOrderBy_STATUS_DESC", "-status");
define("KalturaBatchJobOrderBy_CHECK_AGAIN_TIMEOUT_ASC", "+checkAgainTimeout");
define("KalturaBatchJobOrderBy_CHECK_AGAIN_TIMEOUT_DESC", "-checkAgainTimeout");
define("KalturaBatchJobOrderBy_PROGRESS_ASC", "+progress");
define("KalturaBatchJobOrderBy_PROGRESS_DESC", "-progress");
define("KalturaBatchJobOrderBy_UPDATES_COUNT_ASC", "+updatesCount");
define("KalturaBatchJobOrderBy_UPDATES_COUNT_DESC", "-updatesCount");
define("KalturaBatchJobOrderBy_PRIORITY_ASC", "+priority");
define("KalturaBatchJobOrderBy_PRIORITY_DESC", "-priority");
define("KalturaBatchJobOrderBy_QUEUE_TIME_ASC", "+queueTime");
define("KalturaBatchJobOrderBy_QUEUE_TIME_DESC", "-queueTime");
define("KalturaBatchJobOrderBy_FINISH_TIME_ASC", "+finishTime");
define("KalturaBatchJobOrderBy_FINISH_TIME_DESC", "-finishTime");
define("KalturaBatchJobOrderBy_FILE_SIZE_ASC", "+fileSize");
define("KalturaBatchJobOrderBy_FILE_SIZE_DESC", "-fileSize");
define("KalturaBatchJobOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaBatchJobOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaBatchJobOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaBatchJobOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaBatchJobOrderBy_PROCESSOR_EXPIRATION_ASC", "+processorExpiration");
define("KalturaBatchJobOrderBy_PROCESSOR_EXPIRATION_DESC", "-processorExpiration");
define("KalturaBatchJobOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaBatchJobOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");
define("KalturaBatchJobOrderBy_LOCK_VERSION_ASC", "+lockVersion");
define("KalturaBatchJobOrderBy_LOCK_VERSION_DESC", "-lockVersion");

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

define("KalturaBatchJobType_CONVERT", "0");
define("KalturaBatchJobType_IMPORT", "1");
define("KalturaBatchJobType_DELETE", "2");
define("KalturaBatchJobType_FLATTEN", "3");
define("KalturaBatchJobType_BULKUPLOAD", "4");
define("KalturaBatchJobType_DVDCREATOR", "5");
define("KalturaBatchJobType_DOWNLOAD", "6");
define("KalturaBatchJobType_OOCONVERT", "7");
define("KalturaBatchJobType_CONVERT_PROFILE", "10");
define("KalturaBatchJobType_POSTCONVERT", "11");
define("KalturaBatchJobType_PULL", "12");
define("KalturaBatchJobType_REMOTE_CONVERT", "13");
define("KalturaBatchJobType_EXTRACT_MEDIA", "14");
define("KalturaBatchJobType_MAIL", "15");
define("KalturaBatchJobType_NOTIFICATION", "16");
define("KalturaBatchJobType_CLEANUP", "17");
define("KalturaBatchJobType_SCHEDULER_HELPER", "18");
define("KalturaBatchJobType_BULKDOWNLOAD", "19");
define("KalturaBatchJobType_DB_CLEANUP", "20");
define("KalturaBatchJobType_PROVISION_PROVIDE", "21");
define("KalturaBatchJobType_CONVERT_COLLECTION", "22");
define("KalturaBatchJobType_STORAGE_EXPORT", "23");
define("KalturaBatchJobType_PROVISION_DELETE", "24");
define("KalturaBatchJobType_STORAGE_DELETE", "25");
define("KalturaBatchJobType_EMAIL_INGESTION", "26");
define("KalturaBatchJobType_METADATA_IMPORT", "27");
define("KalturaBatchJobType_METADATA_TRANSFORM", "28");
define("KalturaBatchJobType_FILESYNC_IMPORT", "29");
define("KalturaBatchJobType_CAPTURE_THUMB", "30");
define("KalturaBatchJobType_VIRUS_SCAN", "virusScan.VirusScan");
define("KalturaBatchJobType_DISTRIBUTION_SUBMIT", "contentDistribution.DistributionSubmit");
define("KalturaBatchJobType_DISTRIBUTION_UPDATE", "contentDistribution.DistributionUpdate");
define("KalturaBatchJobType_DISTRIBUTION_DELETE", "contentDistribution.DistributionDelete");
define("KalturaBatchJobType_DISTRIBUTION_FETCH_REPORT", "contentDistribution.DistributionFetchReport");
define("KalturaBatchJobType_DISTRIBUTION_ENABLE", "contentDistribution.DistributionEnable");
define("KalturaBatchJobType_DISTRIBUTION_DISABLE", "contentDistribution.DistributionDisable");
define("KalturaBatchJobType_DISTRIBUTION_SYNC", "contentDistribution.DistributionSync");

define("KalturaCategoryOrderBy_DEPTH_ASC", "+depth");
define("KalturaCategoryOrderBy_DEPTH_DESC", "-depth");
define("KalturaCategoryOrderBy_FULL_NAME_ASC", "+fullName");
define("KalturaCategoryOrderBy_FULL_NAME_DESC", "-fullName");
define("KalturaCategoryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaCategoryOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaCommercialUseType_COMMERCIAL_USE", 1);
define("KalturaCommercialUseType_NON_COMMERCIAL_USE", 0);

define("KalturaContainerFormat_FLV", "flv");
define("KalturaContainerFormat_MP4", "mp4");
define("KalturaContainerFormat_AVI", "avi");
define("KalturaContainerFormat_MOV", "mov");
define("KalturaContainerFormat_MP3", "mp3");
define("KalturaContainerFormat__3GP", "3gp");
define("KalturaContainerFormat_OGG", "ogg");
define("KalturaContainerFormat_WMV", "wmv");
define("KalturaContainerFormat_WMA", "wma");
define("KalturaContainerFormat_ISMV", "ismv");
define("KalturaContainerFormat_MKV", "mkv");
define("KalturaContainerFormat_WEBM", "webm");
define("KalturaContainerFormat_MPEG", "mpeg");
define("KalturaContainerFormat_MPEGTS", "mpegts");
define("KalturaContainerFormat_APPLEHTTP", "applehttp");
define("KalturaContainerFormat_SWF", "swf");
define("KalturaContainerFormat_PDF", "pdf");
define("KalturaContainerFormat_JPG", "jpg");

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

define("KalturaConversionEngineType_KALTURA_COM", "0");
define("KalturaConversionEngineType_ON2", "1");
define("KalturaConversionEngineType_FFMPEG", "2");
define("KalturaConversionEngineType_MENCODER", "3");
define("KalturaConversionEngineType_ENCODING_COM", "4");
define("KalturaConversionEngineType_EXPRESSION_ENCODER3", "5");
define("KalturaConversionEngineType_FFMPEG_VP8", "98");
define("KalturaConversionEngineType_FFMPEG_AUX", "99");
define("KalturaConversionEngineType_PDF2SWF", "201");
define("KalturaConversionEngineType_PDF_CREATOR", "202");
define("KalturaConversionEngineType_QUICK_TIME_PLAYER_TOOLS", "quickTimeTools.QuickTimeTools");
define("KalturaConversionEngineType_FAST_START", "fastStart.FastStart");
define("KalturaConversionEngineType_EXPRESSION_ENCODER", "expressionEncoder.ExpressionEncoder");
define("KalturaConversionEngineType_AVIDEMUX", "avidemux.Avidemux");
define("KalturaConversionEngineType_SEGMENTER", "segmenter.Segmenter");

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
define("KalturaDataEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaDataEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaDataEntryOrderBy_RANK_ASC", "+rank");
define("KalturaDataEntryOrderBy_RANK_DESC", "-rank");

define("KalturaDirectoryRestrictionType_DONT_DISPLAY", 0);
define("KalturaDirectoryRestrictionType_DISPLAY_WITH_LINK", 1);

define("KalturaDistributionAction_SUBMIT", 1);
define("KalturaDistributionAction_UPDATE", 2);
define("KalturaDistributionAction_DELETE", 3);
define("KalturaDistributionAction_FETCH_REPORT", 4);

define("KalturaDistributionErrorType_MISSING_FLAVOR", 1);
define("KalturaDistributionErrorType_MISSING_THUMBNAIL", 2);
define("KalturaDistributionErrorType_MISSING_METADATA", 3);
define("KalturaDistributionErrorType_INVALID_DATA", 4);

define("KalturaDistributionProfileActionStatus_DISABLED", 1);
define("KalturaDistributionProfileActionStatus_AUTOMATIC", 2);
define("KalturaDistributionProfileActionStatus_MANUAL", 3);

define("KalturaDistributionProfileOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaDistributionProfileOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaDistributionProfileOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaDistributionProfileOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaDistributionProfileStatus_DISABLED", 1);
define("KalturaDistributionProfileStatus_ENABLED", 2);
define("KalturaDistributionProfileStatus_DELETED", 3);

define("KalturaDistributionProtocol_FTP", 1);
define("KalturaDistributionProtocol_SCP", 2);
define("KalturaDistributionProtocol_SFTP", 3);
define("KalturaDistributionProtocol_HTTP", 4);
define("KalturaDistributionProtocol_HTTPS", 5);


define("KalturaDistributionProviderType_GENERIC", "1");
define("KalturaDistributionProviderType_SYNDICATION", "2");
define("KalturaDistributionProviderType_YOUTUBE_API", "youtubeApiDistribution.YOUTUBE_API");
define("KalturaDistributionProviderType_DAILYMOTION", "dailymotionDistribution.DAILYMOTION");
define("KalturaDistributionProviderType_MSN", "msnDistribution.MSN");
define("KalturaDistributionProviderType_VERIZON", "verizonDistribution.VERIZON");
define("KalturaDistributionProviderType_COMCAST", "comcastDistribution.COMCAST");
define("KalturaDistributionProviderType_YOUTUBE", "youTubeDistribution.YOUTUBE");

define("KalturaDocumentEntryOrderBy_NAME_ASC", "+name");
define("KalturaDocumentEntryOrderBy_NAME_DESC", "-name");
define("KalturaDocumentEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaDocumentEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaDocumentEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaDocumentEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaDocumentEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaDocumentEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaDocumentEntryOrderBy_RANK_ASC", "+rank");
define("KalturaDocumentEntryOrderBy_RANK_DESC", "-rank");

define("KalturaDocumentType_DOCUMENT", 11);
define("KalturaDocumentType_SWF", 12);
define("KalturaDocumentType_PDF", 13);

define("KalturaDurationType_NOT_AVAILABLE", "notavailable");
define("KalturaDurationType_SHORT", "short");
define("KalturaDurationType_MEDIUM", "medium");
define("KalturaDurationType_LONG", "long");

define("KalturaEditorType_SIMPLE", 1);
define("KalturaEditorType_ADVANCED", 2);

define("KalturaEmailIngestionProfileStatus_INACTIVE", 0);
define("KalturaEmailIngestionProfileStatus_ACTIVE", 1);

define("KalturaEntryDistributionFlag_NONE", 0);
define("KalturaEntryDistributionFlag_SUBMIT_REQUIRED", 1);
define("KalturaEntryDistributionFlag_DELETE_REQUIRED", 2);
define("KalturaEntryDistributionFlag_UPDATE_REQUIRED", 3);
define("KalturaEntryDistributionFlag_ENABLE_REQUIRED", 4);
define("KalturaEntryDistributionFlag_DISABLE_REQUIRED", 5);

define("KalturaEntryDistributionOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaEntryDistributionOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaEntryDistributionOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaEntryDistributionOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaEntryDistributionOrderBy_SUBMITTED_AT_ASC", "+submittedAt");
define("KalturaEntryDistributionOrderBy_SUBMITTED_AT_DESC", "-submittedAt");
define("KalturaEntryDistributionOrderBy_SUNRISE_ASC", "+sunrise");
define("KalturaEntryDistributionOrderBy_SUNRISE_DESC", "-sunrise");
define("KalturaEntryDistributionOrderBy_SUNSET_ASC", "+sunset");
define("KalturaEntryDistributionOrderBy_SUNSET_DESC", "-sunset");

define("KalturaEntryDistributionStatus_PENDING", 0);
define("KalturaEntryDistributionStatus_QUEUED", 1);
define("KalturaEntryDistributionStatus_READY", 2);
define("KalturaEntryDistributionStatus_DELETED", 3);
define("KalturaEntryDistributionStatus_SUBMITTING", 4);
define("KalturaEntryDistributionStatus_UPDATING", 5);
define("KalturaEntryDistributionStatus_DELETING", 6);
define("KalturaEntryDistributionStatus_ERROR_SUBMITTING", 7);
define("KalturaEntryDistributionStatus_ERROR_UPDATING", 8);
define("KalturaEntryDistributionStatus_ERROR_DELETING", 9);
define("KalturaEntryDistributionStatus_REMOVED", 10);

define("KalturaEntryDistributionSunStatus_BEFORE_SUNRISE", 1);
define("KalturaEntryDistributionSunStatus_AFTER_SUNRISE", 2);
define("KalturaEntryDistributionSunStatus_AFTER_SUNSET", 3);

define("KalturaEntryModerationStatus_PENDING_MODERATION", 1);
define("KalturaEntryModerationStatus_APPROVED", 2);
define("KalturaEntryModerationStatus_REJECTED", 3);
define("KalturaEntryModerationStatus_FLAGGED_FOR_REVIEW", 5);
define("KalturaEntryModerationStatus_AUTO_APPROVED", 6);

define("KalturaEntryStatus_ERROR_IMPORTING", "-2");
define("KalturaEntryStatus_ERROR_CONVERTING", "-1");
define("KalturaEntryStatus_IMPORT", "0");
define("KalturaEntryStatus_PRECONVERT", "1");
define("KalturaEntryStatus_READY", "2");
define("KalturaEntryStatus_DELETED", "3");
define("KalturaEntryStatus_PENDING", "4");
define("KalturaEntryStatus_MODERATE", "5");
define("KalturaEntryStatus_BLOCKED", "6");
define("KalturaEntryStatus_INFECTED", "virusScan.Infected");

define("KalturaEntryType_AUTOMATIC", "-1");
define("KalturaEntryType_MEDIA_CLIP", "1");
define("KalturaEntryType_MIX", "2");
define("KalturaEntryType_PLAYLIST", "5");
define("KalturaEntryType_DATA", "6");
define("KalturaEntryType_LIVE_STREAM", "7");
define("KalturaEntryType_DOCUMENT", "10");

define("KalturaFileSyncObjectType_ENTRY", "1");
define("KalturaFileSyncObjectType_UICONF", "2");
define("KalturaFileSyncObjectType_BATCHJOB", "3");
define("KalturaFileSyncObjectType_FLAVOR_ASSET", "4");
define("KalturaFileSyncObjectType_METADATA", "5");
define("KalturaFileSyncObjectType_METADATA_PROFILE", "6");
define("KalturaFileSyncObjectType_SYNDICATION_FEED", "7");
define("KalturaFileSyncObjectType_GENERIC_DISTRIBUTION_ACTION", "contentDistribution.GenericDistributionAction");
define("KalturaFileSyncObjectType_ENTRY_DISTRIBUTION", "contentDistribution.EntryDistribution");
define("KalturaFileSyncObjectType_DISTRIBUTION_PROFILE", "contentDistribution.DistributionProfile");

define("KalturaFlavorAssetOrderBy_SIZE_ASC", "+size");
define("KalturaFlavorAssetOrderBy_SIZE_DESC", "-size");
define("KalturaFlavorAssetOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaFlavorAssetOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaFlavorAssetOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaFlavorAssetOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaFlavorAssetOrderBy_DELETED_AT_ASC", "+deletedAt");
define("KalturaFlavorAssetOrderBy_DELETED_AT_DESC", "-deletedAt");

define("KalturaFlavorAssetStatus_ERROR", -1);
define("KalturaFlavorAssetStatus_QUEUED", 0);
define("KalturaFlavorAssetStatus_CONVERTING", 1);
define("KalturaFlavorAssetStatus_READY", 2);
define("KalturaFlavorAssetStatus_DELETED", 3);
define("KalturaFlavorAssetStatus_NOT_APPLICABLE", 4);
define("KalturaFlavorAssetStatus_TEMP", 5);



define("KalturaGender_UNKNOWN", 0);
define("KalturaGender_MALE", 1);
define("KalturaGender_FEMALE", 2);

define("KalturaGenericDistributionProviderActionOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaGenericDistributionProviderActionOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaGenericDistributionProviderActionOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaGenericDistributionProviderActionOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaGenericDistributionProviderOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaGenericDistributionProviderOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaGenericDistributionProviderOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaGenericDistributionProviderOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaGenericDistributionProviderParser_XSL", 1);
define("KalturaGenericDistributionProviderParser_XPATH", 2);
define("KalturaGenericDistributionProviderParser_REGEX", 3);

define("KalturaGenericDistributionProviderStatus_ACTIVE", 2);
define("KalturaGenericDistributionProviderStatus_DELETED", 3);

define("KalturaGenericSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaGenericSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaGenericSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaGenericSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaGenericSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaGenericSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaGenericSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaGenericSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaGenericXsltSyndicationFeedOrderBy_PLAYLIST_ID_ASC", "+playlistId");
define("KalturaGenericXsltSyndicationFeedOrderBy_PLAYLIST_ID_DESC", "-playlistId");
define("KalturaGenericXsltSyndicationFeedOrderBy_NAME_ASC", "+name");
define("KalturaGenericXsltSyndicationFeedOrderBy_NAME_DESC", "-name");
define("KalturaGenericXsltSyndicationFeedOrderBy_TYPE_ASC", "+type");
define("KalturaGenericXsltSyndicationFeedOrderBy_TYPE_DESC", "-type");
define("KalturaGenericXsltSyndicationFeedOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaGenericXsltSyndicationFeedOrderBy_CREATED_AT_DESC", "-createdAt");

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

define("KalturaIpAddressRestrictionType_RESTRICT_LIST", 0);
define("KalturaIpAddressRestrictionType_ALLOW_LIST", 1);

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

define("KalturaLiveStreamAdminEntryOrderBy_MEDIA_TYPE_ASC", "+mediaType");
define("KalturaLiveStreamAdminEntryOrderBy_MEDIA_TYPE_DESC", "-mediaType");
define("KalturaLiveStreamAdminEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaLiveStreamAdminEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaLiveStreamAdminEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaLiveStreamAdminEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaLiveStreamAdminEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaLiveStreamAdminEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaLiveStreamAdminEntryOrderBy_MS_DURATION_ASC", "+msDuration");
define("KalturaLiveStreamAdminEntryOrderBy_MS_DURATION_DESC", "-msDuration");
define("KalturaLiveStreamAdminEntryOrderBy_NAME_ASC", "+name");
define("KalturaLiveStreamAdminEntryOrderBy_NAME_DESC", "-name");
define("KalturaLiveStreamAdminEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaLiveStreamAdminEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaLiveStreamAdminEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaLiveStreamAdminEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaLiveStreamAdminEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaLiveStreamAdminEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaLiveStreamAdminEntryOrderBy_RANK_ASC", "+rank");
define("KalturaLiveStreamAdminEntryOrderBy_RANK_DESC", "-rank");

define("KalturaLiveStreamEntryOrderBy_MEDIA_TYPE_ASC", "+mediaType");
define("KalturaLiveStreamEntryOrderBy_MEDIA_TYPE_DESC", "-mediaType");
define("KalturaLiveStreamEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaLiveStreamEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaLiveStreamEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaLiveStreamEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaLiveStreamEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaLiveStreamEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaLiveStreamEntryOrderBy_MS_DURATION_ASC", "+msDuration");
define("KalturaLiveStreamEntryOrderBy_MS_DURATION_DESC", "-msDuration");
define("KalturaLiveStreamEntryOrderBy_NAME_ASC", "+name");
define("KalturaLiveStreamEntryOrderBy_NAME_DESC", "-name");
define("KalturaLiveStreamEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaLiveStreamEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaLiveStreamEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaLiveStreamEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaLiveStreamEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaLiveStreamEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaLiveStreamEntryOrderBy_RANK_ASC", "+rank");
define("KalturaLiveStreamEntryOrderBy_RANK_DESC", "-rank");

define("KalturaMailJobOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMailJobOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMailJobOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaMailJobOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaMailJobOrderBy_PROCESSOR_EXPIRATION_ASC", "+processorExpiration");
define("KalturaMailJobOrderBy_PROCESSOR_EXPIRATION_DESC", "-processorExpiration");
define("KalturaMailJobOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaMailJobOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");
define("KalturaMailJobOrderBy_LOCK_VERSION_ASC", "+lockVersion");
define("KalturaMailJobOrderBy_LOCK_VERSION_DESC", "-lockVersion");

define("KalturaMediaEntryOrderBy_MEDIA_TYPE_ASC", "+mediaType");
define("KalturaMediaEntryOrderBy_MEDIA_TYPE_DESC", "-mediaType");
define("KalturaMediaEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaMediaEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaMediaEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaMediaEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaMediaEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaMediaEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaMediaEntryOrderBy_MS_DURATION_ASC", "+msDuration");
define("KalturaMediaEntryOrderBy_MS_DURATION_DESC", "-msDuration");
define("KalturaMediaEntryOrderBy_NAME_ASC", "+name");
define("KalturaMediaEntryOrderBy_NAME_DESC", "-name");
define("KalturaMediaEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaMediaEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaMediaEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMediaEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMediaEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaMediaEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaMediaEntryOrderBy_RANK_ASC", "+rank");
define("KalturaMediaEntryOrderBy_RANK_DESC", "-rank");




define("KalturaMediaType_VIDEO", 1);
define("KalturaMediaType_IMAGE", 2);
define("KalturaMediaType_AUDIO", 5);
define("KalturaMediaType_LIVE_STREAM_FLASH", 201);
define("KalturaMediaType_LIVE_STREAM_WINDOWS_MEDIA", 202);
define("KalturaMediaType_LIVE_STREAM_REAL_MEDIA", 203);
define("KalturaMediaType_LIVE_STREAM_QUICKTIME", 204);

define("KalturaMetadataObjectType_ENTRY", 1);

define("KalturaMetadataOrderBy_METADATA_PROFILE_VERSION_ASC", "+metadataProfileVersion");
define("KalturaMetadataOrderBy_METADATA_PROFILE_VERSION_DESC", "-metadataProfileVersion");
define("KalturaMetadataOrderBy_VERSION_ASC", "+version");
define("KalturaMetadataOrderBy_VERSION_DESC", "-version");
define("KalturaMetadataOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMetadataOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMetadataOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaMetadataOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaMetadataProfileOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMetadataProfileOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMetadataProfileOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaMetadataProfileOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaMetadataProfileStatus_ACTIVE", 1);
define("KalturaMetadataProfileStatus_DEPRECATED", 2);
define("KalturaMetadataProfileStatus_TRANSFORMING", 3);

define("KalturaMetadataStatus_VALID", 1);
define("KalturaMetadataStatus_INVALID", 2);
define("KalturaMetadataStatus_DELETED", 3);

define("KalturaMixEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaMixEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaMixEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaMixEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaMixEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaMixEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaMixEntryOrderBy_MS_DURATION_ASC", "+msDuration");
define("KalturaMixEntryOrderBy_MS_DURATION_DESC", "-msDuration");
define("KalturaMixEntryOrderBy_NAME_ASC", "+name");
define("KalturaMixEntryOrderBy_NAME_DESC", "-name");
define("KalturaMixEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaMixEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaMixEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaMixEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaMixEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaMixEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
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
define("KalturaNotificationOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaNotificationOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaNotificationOrderBy_PROCESSOR_EXPIRATION_ASC", "+processorExpiration");
define("KalturaNotificationOrderBy_PROCESSOR_EXPIRATION_DESC", "-processorExpiration");
define("KalturaNotificationOrderBy_EXECUTION_ATTEMPTS_ASC", "+executionAttempts");
define("KalturaNotificationOrderBy_EXECUTION_ATTEMPTS_DESC", "-executionAttempts");
define("KalturaNotificationOrderBy_LOCK_VERSION_ASC", "+lockVersion");
define("KalturaNotificationOrderBy_LOCK_VERSION_DESC", "-lockVersion");

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
define("KalturaPartnerType_BLACKBOARD", 107);
define("KalturaPartnerType_SAKAI", 108);

define("KalturaPermissionItemOrderBy_ID_ASC", "+id");
define("KalturaPermissionItemOrderBy_ID_DESC", "-id");
define("KalturaPermissionItemOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPermissionItemOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPermissionItemOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaPermissionItemOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaPermissionItemType_API_ACTION_ITEM", "kApiActionPermissionItem");
define("KalturaPermissionItemType_API_PARAMETER_ITEM", "kApiParameterPermissionItem");

define("KalturaPermissionName_FEATURE_ANALYTICS_TAB", "FEATURE_ANALYTICS_TAB");
define("KalturaPermissionName_FEATURE_508_PLAYERS", "FEATURE_508_PLAYERS");
define("KalturaPermissionName_FEATURE_LIVE_STREAM", "FEATURE_LIVE_STREAM");
define("KalturaPermissionName_FEATURE_VAST", "FEATURE_VAST");
define("KalturaPermissionName_FEATURE_SILVERLIGHT", "FEATURE_SILVERLIGHT");
define("KalturaPermissionName_FEATURE_PS2_PERMISSIONS_VALIDATION", "FEATURE_PS2_PERMISSIONS_VALIDATION");
define("KalturaPermissionName_FEATURE_MOBILE_FLAVORS", "FEATURE_MOBILE_FLAVORS");
define("KalturaPermissionName_USER_SESSION_PERMISSION", "BASE_USER_SESSION_PERMISSION");
define("KalturaPermissionName_ALWAYS_ALLOWED_ACTIONS", "ALWAYS_ALLOWED_ACTIONS");
define("KalturaPermissionName_SYSTEM_FILESYNC", "SYSTEM_FILESYNC");
define("KalturaPermissionName_SYSTEM_INTERNAL", "SYSTEM_INTERNAL");
define("KalturaPermissionName_KMC_ACCESS", "KMC_ACCESS");
define("KalturaPermissionName_KMC_READ_ONLY", "KMC_READ_ONLY");
define("KalturaPermissionName_SYSTEM_ADMIN_BASE", "SYSTEM_ADMIN_BASE");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_BASE", "SYSTEM_ADMIN_PUBLISHER_BASE");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_KMC_ACCESS", "SYSTEM_ADMIN_PUBLISHER_KMC_ACCESS");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_CONFIG", "SYSTEM_ADMIN_PUBLISHER_CONFIG");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_BLOCK", "SYSTEM_ADMIN_PUBLISHER_BLOCK");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_REMOVE", "SYSTEM_ADMIN_PUBLISHER_REMOVE");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_ADD", "SYSTEM_ADMIN_PUBLISHER_ADD");
define("KalturaPermissionName_SYSTEM_ADMIN_PUBLISHER_USAGE", "SYSTEM_ADMIN_PUBLISHER_USAGE");
define("KalturaPermissionName_SYSTEM_ADMIN_USER_MANAGE", "SYSTEM_ADMIN_USER_MANAGE");
define("KalturaPermissionName_SYSTEM_ADMIN_SYSTEM_MONITOR", "SYSTEM_ADMIN_SYSTEM_MONITOR");
define("KalturaPermissionName_SYSTEM_ADMIN_DEVELOPERS_TAB", "SYSTEM_ADMIN_DEVELOPERS_TAB");
define("KalturaPermissionName_SYSTEM_ADMIN_BATCH_CONTROL", "SYSTEM_ADMIN_BATCH_CONTROL");
define("KalturaPermissionName_SYSTEM_ADMIN_BATCH_CONTROL_INPROGRESS", "SYSTEM_ADMIN_BATCH_CONTROL_INPROGRESS");
define("KalturaPermissionName_SYSTEM_ADMIN_BATCH_CONTROL_FAILED", "SYSTEM_ADMIN_BATCH_CONTROL_FAILED");
define("KalturaPermissionName_SYSTEM_ADMIN_BATCH_CONTROL_SETUP", "SYSTEM_ADMIN_BATCH_CONTROL_SETUP");
define("KalturaPermissionName_SYSTEM_ADMIN_STORAGE", "SYSTEM_ADMIN_STORAGE");
define("KalturaPermissionName_SYSTEM_ADMIN_VIRUS_SCAN", "SYSTEM_ADMIN_VIRUS_SCAN");
define("KalturaPermissionName_SYSTEM_ADMIN_EMAIL_INGESTION", "SYSTEM_ADMIN_EMAIL_INGESTION");
define("KalturaPermissionName_SYSTEM_ADMIN_CONTENT_DISTRIBUTION_BASE", "SYSTEM_ADMIN_CONTENT_DISTRIBUTION_BASE");
define("KalturaPermissionName_SYSTEM_ADMIN_CONTENT_DISTRIBUTION_MODIFY", "SYSTEM_ADMIN_CONTENT_DISTRIBUTION_MODIFY");
define("KalturaPermissionName_SYSTEM_ADMIN_PERMISSIONS_MANAGE", "SYSTEM_ADMIN_PERMISSIONS_MANAGE");
define("KalturaPermissionName_SYSTEM_ADMIN_ENTRY_INVESTIGATION", "SYSTEM_ADMIN_ENTRY_INVESTIGATION");
define("KalturaPermissionName_BATCH_BASE", "BATCH_BASE");
define("KalturaPermissionName_CONTENT_INGEST_UPLOAD", "CONTENT_INGEST_UPLOAD");
define("KalturaPermissionName_CONTENT_INGEST_BULK_UPLOAD", "CONTENT_INGEST_BULK_UPLOAD");
define("KalturaPermissionName_CONTENT_INGEST_FEED", "CONTENT_INGEST_FEED");
define("KalturaPermissionName_CONTENT_MANAGE_DISTRIBUTION_BASE", "CONTENT_MANAGE_DISTRIBUTION_BASE");
define("KalturaPermissionName_CONTENT_MANAGE_DISTRIBUTION_WHERE", "CONTENT_MANAGE_DISTRIBUTION_WHERE");
define("KalturaPermissionName_CONTENT_MANAGE_DISTRIBUTION_SEND", "CONTENT_MANAGE_DISTRIBUTION_SEND");
define("KalturaPermissionName_CONTENT_MANAGE_DISTRIBUTION_REMOVE", "CONTENT_MANAGE_DISTRIBUTION_REMOVE");
define("KalturaPermissionName_CONTENT_MANAGE_DISTRIBUTION_PROFILE_MODIFY", "CONTENT_MANAGE_DISTRIBUTION_PROFILE_MODIFY");
define("KalturaPermissionName_CONTENT_MANAGE_VIRUS_SCAN", "CONTENT_MANAGE_VIRUS_SCAN");
define("KalturaPermissionName_CONTENT_MANAGE_MIX", "CONTENT_MANAGE_MIX");
define("KalturaPermissionName_CONTENT_MANAGE_BASE", "CONTENT_MANAGE_BASE");
define("KalturaPermissionName_CONTENT_MANAGE_METADATA", "CONTENT_MANAGE_METADATA");
define("KalturaPermissionName_CONTENT_MANAGE_ASSIGN_CATEGORIES", "CONTENT_MANAGE_ASSIGN_CATEGORIES");
define("KalturaPermissionName_CONTENT_MANAGE_THUMBNAIL", "CONTENT_MANAGE_THUMBNAIL");
define("KalturaPermissionName_CONTENT_MANAGE_SCHEDULE", "CONTENT_MANAGE_SCHEDULE");
define("KalturaPermissionName_CONTENT_MANAGE_ACCESS_CONTROL", "CONTENT_MANAGE_ACCESS_CONTROL");
define("KalturaPermissionName_CONTENT_MANAGE_CUSTOM_DATA", "CONTENT_MANAGE_CUSTOM_DATA");
define("KalturaPermissionName_CONTENT_MANAGE_DELETE", "CONTENT_MANAGE_DELETE");
define("KalturaPermissionName_CONTENT_MANAGE_RECONVERT", "CONTENT_MANAGE_RECONVERT");
define("KalturaPermissionName_CONTENT_MANAGE_EDIT_CATEGORIES", "CONTENT_MANAGE_EDIT_CATEGORIES");
define("KalturaPermissionName_CONTENT_MANAGE_ANNOTATION", "CONTENT_MANAGE_ANNOTATION");
define("KalturaPermissionName_CONTENT_MANAGE_SHARE", "CONTENT_MANAGE_SHARE");
define("KalturaPermissionName_CONTENT_MANAGE_DOWNLOAD", "CONTENT_MANAGE_DOWNLOAD");
define("KalturaPermissionName_LIVE_STREAM_ADD", "LIVE_STREAM_ADD");
define("KalturaPermissionName_LIVE_STREAM_UPDATE", "LIVE_STREAM_UPDATE");
define("KalturaPermissionName_CONTENT_MODERATE_BASE", "CONTENT_MODERATE_BASE");
define("KalturaPermissionName_CONTENT_MODERATE_METADATA", "CONTENT_MODERATE_METADATA");
define("KalturaPermissionName_CONTENT_MODERATE_CUSTOM_DATA", "CONTENT_MODERATE_CUSTOM_DATA");
define("KalturaPermissionName_CONTENT_MODERATE_APPROVE_REJECT", "CONTENT_MODERATE_APPROVE_REJECT");
define("KalturaPermissionName_PLAYLIST_BASE", "PLAYLIST_BASE");
define("KalturaPermissionName_PLAYLIST_ADD", "PLAYLIST_ADD");
define("KalturaPermissionName_PLAYLIST_UPDATE", "PLAYLIST_UPDATE");
define("KalturaPermissionName_PLAYLIST_DELETE", "PLAYLIST_DELETE");
define("KalturaPermissionName_SYNDICATION_BASE", "SYNDICATION_BASE");
define("KalturaPermissionName_SYNDICATION_ADD", "SYNDICATION_ADD");
define("KalturaPermissionName_SYNDICATION_UPDATE", "SYNDICATION_UPDATE");
define("KalturaPermissionName_SYNDICATION_DELETE", "SYNDICATION_DELETE");
define("KalturaPermissionName_STUDIO_BASE", "STUDIO_BASE");
define("KalturaPermissionName_STUDIO_ADD_UICONF", "STUDIO_ADD_UICONF");
define("KalturaPermissionName_STUDIO_UPDATE_UICONF", "STUDIO_UPDATE_UICONF");
define("KalturaPermissionName_STUDIO_DELETE_UICONF", "STUDIO_DELETE_UICONF");
define("KalturaPermissionName_ACCOUNT_BASE", "ACCOUNT_BASE");
define("KalturaPermissionName_ACCOUNT_UPDATE_SETTINGS", "ACCOUNT_UPDATE_SETTINGS");
define("KalturaPermissionName_INTEGRATION_BASE", "INTEGRATION_BASE");
define("KalturaPermissionName_INTEGRATION_UPDATE_SETTINGS", "INTEGRATION_UPDATE_SETTINGS");
define("KalturaPermissionName_ACCESS_CONTROL_BASE", "ACCESS_CONTROL_BASE");
define("KalturaPermissionName_ACCESS_CONTROL_ADD", "ACCESS_CONTROL_ADD");
define("KalturaPermissionName_ACCESS_CONTROL_UPDATE", "ACCESS_CONTROL_UPDATE");
define("KalturaPermissionName_ACCESS_CONTROL_DELETE", "ACCESS_CONTROL_DELETE");
define("KalturaPermissionName_TRANSCODING_BASE", "TRANSCODING_BASE");
define("KalturaPermissionName_TRANSCODING_ADD", "TRANSCODING_ADD");
define("KalturaPermissionName_TRANSCODING_UPDATE", "TRANSCODING_UPDATE");
define("KalturaPermissionName_TRANSCODING_DELETE", "TRANSCODING_DELETE");
define("KalturaPermissionName_CUSTOM_DATA_PROFILE_BASE", "CUSTOM_DATA_PROFILE_BASE");
define("KalturaPermissionName_CUSTOM_DATA_PROFILE_ADD", "CUSTOM_DATA_PROFILE_ADD");
define("KalturaPermissionName_CUSTOM_DATA_PROFILE_UPDATE", "CUSTOM_DATA_PROFILE_UPDATE");
define("KalturaPermissionName_CUSTOM_DATA_PROFILE_DELETE", "CUSTOM_DATA_PROFILE_DELETE");
define("KalturaPermissionName_CUSTOM_DATA_FIELD_ADD", "CUSTOM_DATA_FIELD_ADD");
define("KalturaPermissionName_CUSTOM_DATA_FIELD_UPDATE", "CUSTOM_DATA_FIELD_UPDATE");
define("KalturaPermissionName_CUSTOM_DATA_FIELD_DELETE", "CUSTOM_DATA_FIELD_DELETE");
define("KalturaPermissionName_ADMIN_BASE", "ADMIN_BASE");
define("KalturaPermissionName_ADMIN_USER_ADD", "ADMIN_USER_ADD");
define("KalturaPermissionName_ADMIN_USER_UPDATE", "ADMIN_USER_UPDATE");
define("KalturaPermissionName_ADMIN_USER_DELETE", "ADMIN_USER_DELETE");
define("KalturaPermissionName_ADMIN_ROLE_ADD", "ADMIN_ROLE_ADD");
define("KalturaPermissionName_ADMIN_ROLE_UPDATE", "ADMIN_ROLE_UPDATE");
define("KalturaPermissionName_ADMIN_ROLE_DELETE", "ADMIN_ROLE_DELETE");
define("KalturaPermissionName_ADMIN_PERMISSION_ADD", "ADMIN_PERMISSION_ADD");
define("KalturaPermissionName_ADMIN_PERMISSION_UPDATE", "ADMIN_PERMISSION_UPDATE");
define("KalturaPermissionName_ADMIN_PERMISSION_DELETE", "ADMIN_PERMISSION_DELETE");
define("KalturaPermissionName_ADMIN_PUBLISHER_MANAGE", "ADMIN_PUBLISHER_MANAGE");
define("KalturaPermissionName_ANALYTICS_BASE", "ANALYTICS_BASE");
define("KalturaPermissionName_WIDGET_ADMIN", "WIDGET_ADMIN");
define("KalturaPermissionName_SEARCH_SERVICE", "SEARCH_SERVICE");
define("KalturaPermissionName_ANALYTICS_SEND_DATA", "ANALYTICS_SEND_DATA");
define("KalturaPermissionName_AUDIT_TRAIL_BASE", "AUDIT_TRAIL_BASE");
define("KalturaPermissionName_AUDIT_TRAIL_ADD", "AUDIT_TRAIL_ADD");
define("KalturaPermissionName_ADVERTISING_BASE", "ADVERTISING_BASE");
define("KalturaPermissionName_ADVERTISING_UPDATE_SETTINGS", "ADVERTISING_UPDATE_SETTINGS");
define("KalturaPermissionName_PLAYLIST_EMBED_CODE", "PLAYLIST_EMBED_CODE");
define("KalturaPermissionName_STUDIO_BRAND_UICONF", "STUDIO_BRAND_UICONF");
define("KalturaPermissionName_STUDIO_SELECT_CONTENT", "STUDIO_SELECT_CONTENT");
define("KalturaPermissionName_CONTENT_MANAGE_EMBED_CODE", "CONTENT_MANAGE_EMBED_CODE");
define("KalturaPermissionName_ADMIN_WHITE_BRANDING", "ADMIN_WHITE_BRANDING");

define("KalturaPermissionOrderBy_ID_ASC", "+id");
define("KalturaPermissionOrderBy_ID_DESC", "-id");
define("KalturaPermissionOrderBy_NAME_ASC", "+name");
define("KalturaPermissionOrderBy_NAME_DESC", "-name");
define("KalturaPermissionOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPermissionOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPermissionOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaPermissionOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaPermissionStatus_ACTIVE", 1);
define("KalturaPermissionStatus_BLOCKED", 2);
define("KalturaPermissionStatus_DELETED", 3);

define("KalturaPermissionType_NORMAL", 1);
define("KalturaPermissionType_SPECIAL_FEATURE", 2);
define("KalturaPermissionType_PLUGIN", 3);
define("KalturaPermissionType_PARTNER_GROUP", 4);

define("KalturaPlayableEntryOrderBy_PLAYS_ASC", "+plays");
define("KalturaPlayableEntryOrderBy_PLAYS_DESC", "-plays");
define("KalturaPlayableEntryOrderBy_VIEWS_ASC", "+views");
define("KalturaPlayableEntryOrderBy_VIEWS_DESC", "-views");
define("KalturaPlayableEntryOrderBy_DURATION_ASC", "+duration");
define("KalturaPlayableEntryOrderBy_DURATION_DESC", "-duration");
define("KalturaPlayableEntryOrderBy_MS_DURATION_ASC", "+msDuration");
define("KalturaPlayableEntryOrderBy_MS_DURATION_DESC", "-msDuration");
define("KalturaPlayableEntryOrderBy_NAME_ASC", "+name");
define("KalturaPlayableEntryOrderBy_NAME_DESC", "-name");
define("KalturaPlayableEntryOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaPlayableEntryOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaPlayableEntryOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPlayableEntryOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPlayableEntryOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaPlayableEntryOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaPlayableEntryOrderBy_RANK_ASC", "+rank");
define("KalturaPlayableEntryOrderBy_RANK_DESC", "-rank");

define("KalturaPlaylistOrderBy_NAME_ASC", "+name");
define("KalturaPlaylistOrderBy_NAME_DESC", "-name");
define("KalturaPlaylistOrderBy_MODERATION_COUNT_ASC", "+moderationCount");
define("KalturaPlaylistOrderBy_MODERATION_COUNT_DESC", "-moderationCount");
define("KalturaPlaylistOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaPlaylistOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaPlaylistOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaPlaylistOrderBy_UPDATED_AT_DESC", "-updatedAt");
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

define("KalturaSearchConditionComparison_EQUEL", 1);
define("KalturaSearchConditionComparison_GREATER_THAN", 2);
define("KalturaSearchConditionComparison_GREATER_THAN_OR_EQUEL", 3);
define("KalturaSearchConditionComparison_LESS_THAN", 4);
define("KalturaSearchConditionComparison_LESS_THAN_OR_EQUEL", 5);

define("KalturaSearchOperatorType_SEARCH_AND", 1);
define("KalturaSearchOperatorType_SEARCH_OR", 2);

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
define("KalturaSearchProviderType_PARTNER_SPECIFIC", 100);

define("KalturaSessionType_USER", 0);
define("KalturaSessionType_ADMIN", 2);

define("KalturaShortLinkOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaShortLinkOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaShortLinkOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaShortLinkOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaShortLinkOrderBy_EXPIRES_AT_ASC", "+expiresAt");
define("KalturaShortLinkOrderBy_EXPIRES_AT_DESC", "-expiresAt");

define("KalturaShortLinkStatus_DISABLED", 1);
define("KalturaShortLinkStatus_ENABLED", 2);
define("KalturaShortLinkStatus_DELETED", 3);

define("KalturaSiteRestrictionType_RESTRICT_SITE_LIST", 0);
define("KalturaSiteRestrictionType_ALLOW_SITE_LIST", 1);

define("KalturaSourceType_FILE", 1);
define("KalturaSourceType_WEBCAM", 2);
define("KalturaSourceType_URL", 5);
define("KalturaSourceType_SEARCH_PROVIDER", 6);
define("KalturaSourceType_AKAMAI_LIVE", 29);

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
define("KalturaStatsEventType_PREROLL_STARTED", 24);
define("KalturaStatsEventType_MIDROLL_STARTED", 25);
define("KalturaStatsEventType_POSTROLL_STARTED", 26);
define("KalturaStatsEventType_OVERLAY_STARTED", 27);
define("KalturaStatsEventType_PREROLL_CLICKED", 28);
define("KalturaStatsEventType_MIDROLL_CLICKED", 29);
define("KalturaStatsEventType_POSTROLL_CLICKED", 30);
define("KalturaStatsEventType_OVERLAY_CLICKED", 31);
define("KalturaStatsEventType_PREROLL_25", 32);
define("KalturaStatsEventType_PREROLL_50", 33);
define("KalturaStatsEventType_PREROLL_75", 34);
define("KalturaStatsEventType_MIDROLL_25", 35);
define("KalturaStatsEventType_MIDROLL_50", 36);
define("KalturaStatsEventType_MIDROLL_75", 37);
define("KalturaStatsEventType_POSTROLL_25", 38);
define("KalturaStatsEventType_POSTROLL_50", 39);
define("KalturaStatsEventType_POSTROLL_75", 40);

define("KalturaStatsKmcEventType_CONTENT_PAGE_VIEW", 1001);
define("KalturaStatsKmcEventType_CONTENT_ADD_PLAYLIST", 1010);
define("KalturaStatsKmcEventType_CONTENT_EDIT_PLAYLIST", 1011);
define("KalturaStatsKmcEventType_CONTENT_DELETE_PLAYLIST", 1012);
define("KalturaStatsKmcEventType_CONTENT_DELETE_ITEM", 1058);
define("KalturaStatsKmcEventType_CONTENT_DELETE_MIX", 1059);
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

define("KalturaStorageProfileProtocol_KALTURA_DC", 0);
define("KalturaStorageProfileProtocol_FTP", 1);
define("KalturaStorageProfileProtocol_SCP", 2);
define("KalturaStorageProfileProtocol_SFTP", 3);

define("KalturaStorageProfileStatus_DISABLED", 1);
define("KalturaStorageProfileStatus_AUTOMATIC", 2);
define("KalturaStorageProfileStatus_MANUAL", 3);

define("KalturaSyndicationFeedStatus_DELETED", -1);
define("KalturaSyndicationFeedStatus_ACTIVE", 1);

define("KalturaSyndicationFeedType_GOOGLE_VIDEO", 1);
define("KalturaSyndicationFeedType_YAHOO", 2);
define("KalturaSyndicationFeedType_ITUNES", 3);
define("KalturaSyndicationFeedType_TUBE_MOGUL", 4);
define("KalturaSyndicationFeedType_KALTURA", 5);
define("KalturaSyndicationFeedType_KALTURA_XSLT", 6);

define("KalturaThumbAssetOrderBy_SIZE_ASC", "+size");
define("KalturaThumbAssetOrderBy_SIZE_DESC", "-size");
define("KalturaThumbAssetOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaThumbAssetOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaThumbAssetOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaThumbAssetOrderBy_UPDATED_AT_DESC", "-updatedAt");
define("KalturaThumbAssetOrderBy_DELETED_AT_ASC", "+deletedAt");
define("KalturaThumbAssetOrderBy_DELETED_AT_DESC", "-deletedAt");

define("KalturaThumbCropType_RESIZE", 1);
define("KalturaThumbCropType_RESIZE_WITH_PADDING", 2);
define("KalturaThumbCropType_CROP", 3);
define("KalturaThumbCropType_CROP_FROM_TOP", 4);



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
define("KalturaUiConfObjType_KRECORD", 7);
define("KalturaUiConfObjType_PLAYER_V3", 8);
define("KalturaUiConfObjType_KMC_ACCOUNT", 9);
define("KalturaUiConfObjType_KMC_ANALYTICS", 10);
define("KalturaUiConfObjType_KMC_CONTENT", 11);
define("KalturaUiConfObjType_KMC_DASHBOARD", 12);
define("KalturaUiConfObjType_KMC_LOGIN", 13);
define("KalturaUiConfObjType_PLAYER_SL", 14);
define("KalturaUiConfObjType_CLIENTSIDE_ENCODER", 15);
define("KalturaUiConfObjType_KMC_GENERAL", 16);
define("KalturaUiConfObjType_KMC_ROLES_AND_PERMISSIONS", 17);

define("KalturaUiConfOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaUiConfOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaUiConfOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaUiConfOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaUploadErrorCode_NO_ERROR", 0);
define("KalturaUploadErrorCode_GENERAL_ERROR", 1);
define("KalturaUploadErrorCode_PARTIAL_UPLOAD", 2);

define("KalturaUploadTokenOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaUploadTokenOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaUploadTokenStatus_PENDING", 0);
define("KalturaUploadTokenStatus_PARTIAL_UPLOAD", 1);
define("KalturaUploadTokenStatus_FULL_UPLOAD", 2);
define("KalturaUploadTokenStatus_CLOSED", 3);
define("KalturaUploadTokenStatus_TIMED_OUT", 4);
define("KalturaUploadTokenStatus_DELETED", 5);

define("KalturaUserOrderBy_ID_ASC", "+id");
define("KalturaUserOrderBy_ID_DESC", "-id");
define("KalturaUserOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaUserOrderBy_CREATED_AT_DESC", "-createdAt");

define("KalturaUserRoleOrderBy_ID_ASC", "+id");
define("KalturaUserRoleOrderBy_ID_DESC", "-id");
define("KalturaUserRoleOrderBy_NAME_ASC", "+name");
define("KalturaUserRoleOrderBy_NAME_DESC", "-name");
define("KalturaUserRoleOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaUserRoleOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaUserRoleOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaUserRoleOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaUserRoleStatus_ACTIVE", 1);
define("KalturaUserRoleStatus_BLOCKED", 2);
define("KalturaUserRoleStatus_DELETED", 3);

define("KalturaUserStatus_BLOCKED", 0);
define("KalturaUserStatus_ACTIVE", 1);
define("KalturaUserStatus_DELETED", 2);

define("KalturaVideoCodec_NONE", "");
define("KalturaVideoCodec_VP6", "vp6");
define("KalturaVideoCodec_H263", "h263");
define("KalturaVideoCodec_H264", "h264");
define("KalturaVideoCodec_H264B", "h264b");
define("KalturaVideoCodec_H264M", "h264m");
define("KalturaVideoCodec_H264H", "h264h");
define("KalturaVideoCodec_FLV", "flv");
define("KalturaVideoCodec_MPEG4", "mpeg4");
define("KalturaVideoCodec_THEORA", "theora");
define("KalturaVideoCodec_WMV2", "wmv2");
define("KalturaVideoCodec_WMV3", "wmv3");
define("KalturaVideoCodec_WVC1A", "wvc1a");
define("KalturaVideoCodec_VP8", "vp8");
define("KalturaVideoCodec_COPY", "copy");

define("KalturaVirusFoundAction_NONE", 0);
define("KalturaVirusFoundAction_DELETE", 1);
define("KalturaVirusFoundAction_CLEAN_NONE", 2);
define("KalturaVirusFoundAction_CLEAN_DELETE", 3);

define("KalturaVirusScanEngineType_SYMANTEC_SCAN_ENGINE", "symantecScanEngine.SymantecScanEngine");

define("KalturaVirusScanProfileOrderBy_CREATED_AT_ASC", "+createdAt");
define("KalturaVirusScanProfileOrderBy_CREATED_AT_DESC", "-createdAt");
define("KalturaVirusScanProfileOrderBy_UPDATED_AT_ASC", "+updatedAt");
define("KalturaVirusScanProfileOrderBy_UPDATED_AT_DESC", "-updatedAt");

define("KalturaVirusScanProfileStatus_DISABLED", 1);
define("KalturaVirusScanProfileStatus_ENABLED", 2);

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

class KalturaBaseRestriction extends KalturaObjectBase
{

}

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
	 * @var array of KalturaBaseRestriction
	 */
	var $restrictions;


}

class KalturaSearchItem extends KalturaObjectBase
{

}

class KalturaFilter extends KalturaObjectBase
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
	 * @var KalturaSearchItem
	 */
	var $advancedSearch;


}

class KalturaAccessControlBaseFilter extends KalturaFilter
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

class KalturaAccessControlFilter extends KalturaAccessControlBaseFilter
{

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

class KalturaAccessControlListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaAccessControl
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

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	var $password = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $firstName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $lastName = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $isAdmin = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $lastLoginTime = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $statusUpdatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $deletedAt = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	var $loginEnabled = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $roleIds = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $roleNames = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	var $isAccountOwner = null;


}

class KalturaDynamicEnum extends KalturaObjectBase
{

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
	 * @var string
	 */
	var $categoriesIds = null;

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
	 * Entry update date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

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
	 * @insertonly
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

class KalturaBaseEntryBaseFilter extends KalturaFilter
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
	 * 
	 *
	 * @var string
	 */
	var $idNotIn = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry names (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $nameLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $nameMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
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
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $tagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $tagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $tagsMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags set by an ADMIN user (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $adminTagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 * @var string
	 *
	 * @var string
	 */
	var $adminTagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
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
	 * 
	 *
	 * @var string
	 */
	var $categoriesIdsMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $categoriesIdsMatchOr = null;

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
	 * @dynamicType KalturaEntryStatus
	 *
	 * @var string
	 */
	var $statusIn = null;

	/**
	 * This filter should be in use for retrieving only entries, not at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).
	 * @dynamicType KalturaEntryStatus
	 *
	 * @var string
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
	 * @var string
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
	 * @dynamicType KalturaEntryType
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

class KalturaBaseEntryFilter extends KalturaBaseEntryBaseFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $freeText = null;


}

class KalturaBaseEntryListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaBaseEntry
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
	 * @var array of KalturaModerationFlag
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
	 * @var bool
	 */
	var $isIpAddressRestricted = null;

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

class KalturaBulkUploadPluginData extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $field = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $value = null;


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

	/**
	 * 
	 *
	 * @var array of KalturaBulkUploadPluginData
	 */
	var $pluginsData;


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
	 * @var string
	 */
	var $uploadedByUserId = null;

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
	 * @var array of KalturaBulkUploadResult
	 */
	var $results;


}

class KalturaBulkUploadListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaBulkUpload
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

class KalturaCategoryBaseFilter extends KalturaFilter
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

class KalturaCategoryFilter extends KalturaCategoryBaseFilter
{

}

class KalturaCategoryListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaCategory
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

class KalturaConversionProfileBaseFilter extends KalturaFilter
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
	var $nameEqual = null;


}

class KalturaConversionProfileFilter extends KalturaConversionProfileBaseFilter
{

}

class KalturaConversionProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaConversionProfile
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

class KalturaDataEntry extends KalturaBaseEntry
{
	/**
	 * The data of the entry
	 *
	 * @var string
	 */
	var $dataContent = null;

	/**
	 * indicator whether to return the object for get action with the dataContent field.
	 *
	 * @var bool
	 * @insertonly
	 */
	var $retrieveDataContentByGet = null;


}

class KalturaDataEntryBaseFilter extends KalturaBaseEntryFilter
{

}

class KalturaDataEntryFilter extends KalturaDataEntryBaseFilter
{

}

class KalturaDataListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaDataEntry
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

class KalturaDocumentEntry extends KalturaBaseEntry
{
	/**
	 * The type of the document
	 *
	 * @var KalturaDocumentType
	 * @insertonly
	 */
	var $documentType = null;

	/**
	 * Conversion profile ID to override the default conversion profile
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	var $conversionProfileId = null;


}

class KalturaConversionAttribute extends KalturaObjectBase
{
	/**
	 * The id of the flavor params, set to null for source flavor
	 * 
	 *
	 * @var int
	 */
	var $flavorParamsId = null;

	/**
	 * Attribute name  
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * Attribute value  
	 * 
	 *
	 * @var string
	 */
	var $value = null;


}

class KalturaDocumentEntryBaseFilter extends KalturaBaseEntryFilter
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

class KalturaDocumentEntryFilter extends KalturaDocumentEntryBaseFilter
{

}

class KalturaDocumentListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaDocumentEntry
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

class KalturaEmailIngestionProfile extends KalturaObjectBase
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
	var $description = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $emailAddress = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $mailboxId = null;

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
	var $conversionProfile2Id = null;

	/**
	 * 
	 *
	 * @var KalturaEntryModerationStatus
	 */
	var $moderationStatus = null;

	/**
	 * 
	 *
	 * @var KalturaEmailIngestionProfileStatus
	 * @readonly
	 */
	var $status = null;

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
	var $defaultCategory = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $defaultUserId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $defaultTags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $defaultAdminTags = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $maxAttachmentSizeKbytes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $maxAttachmentsPerMail = null;


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
	 * The duration in miliseconds
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $msDuration = null;

	/**
	 * The duration type (short for 0-4 mins, medium for 4-20 mins, long for 20+ mins)
	 * 
	 *
	 * @var KalturaDurationType
	 * @readonly
	 */
	var $durationType = null;


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
	 * @insertonly
	 */
	var $sourceType = null;

	/**
	 * The search provider type used to import this entry
	 *
	 * @var KalturaSearchProviderType
	 * @insertonly
	 */
	var $searchProviderType = null;

	/**
	 * The ID of the media in the importing site
	 *
	 * @var string
	 * @insertonly
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

class KalturaAsset extends KalturaObjectBase
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
	 * @var int
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
	 * The version of the Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $version = null;

	/**
	 * The size (in KBytes) of the Flavor Asset
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $size = null;

	/**
	 * Tags used to identify the Flavor Asset in various scenarios
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * The file extension
	 * 
	 *
	 * @var string
	 */
	var $fileExt = null;

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
	 * @var int
	 * @readonly
	 */
	var $deletedAt = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $description = null;


}

class KalturaFlavorAsset extends KalturaAsset
{
	/**
	 * The Flavor Params used to create this Flavor Asset
	 * 
	 *
	 * @var int
	 */
	var $flavorParamsId = null;

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
	 * True if this Flavor Asset is the original source
	 * 
	 *
	 * @var bool
	 */
	var $isOriginal = null;

	/**
	 * True if this Flavor Asset is playable in KDP
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	var $isWeb = null;

	/**
	 * The container format
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $containerFormat = null;

	/**
	 * The video codec
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $videoCodecId = null;


}

class KalturaAssetBaseFilter extends KalturaFilter
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
	var $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryIdIn = null;

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
	 * @var KalturaFlavorAssetStatus
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
	var $statusNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $sizeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $sizeLessThanOrEqual = null;

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
	var $deletedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $deletedAtLessThanOrEqual = null;


}

class KalturaAssetFilter extends KalturaAssetBaseFilter
{

}

class KalturaFlavorAssetListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaFlavorAsset
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

class KalturaString extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $value = null;


}

class KalturaAssetParams extends KalturaObjectBase
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
	var $format = null;

	/**
	 * Array of partner permisison names that required for using this asset params
	 * 
	 *
	 * @var array of KalturaString
	 */
	var $requiredPermissions;


}

class KalturaFlavorParams extends KalturaAssetParams
{
	/**
	 * The video codec of the Flavor Params
	 * 
	 *
	 * @var KalturaVideoCodec
	 */
	var $videoCodec = null;

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
	var $audioCodec = null;

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

	/**
	 * 
	 *
	 * @var int
	 */
	var $deinterlice = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $rotate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $operators = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $engineVersion = null;


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

class KalturaAssetParamsBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 */
	var $isSystemDefaultEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tagsEqual = null;

	/**
	 * 
	 *
	 * @var KalturaContainerFormat
	 */
	var $formatEqual = null;


}

class KalturaAssetParamsFilter extends KalturaAssetParamsBaseFilter
{

}

class KalturaFlavorParamsBaseFilter extends KalturaAssetParamsFilter
{

}

class KalturaFlavorParamsFilter extends KalturaFlavorParamsBaseFilter
{

}

class KalturaFlavorParamsListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaFlavorParams
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

class KalturaLiveStreamBitrate extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $bitrate = null;

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


}

class KalturaLiveStreamEntry extends KalturaMediaEntry
{
	/**
	 * The message to be presented when the stream is offline
	 * 
	 *
	 * @var string
	 */
	var $offlineMessage = null;

	/**
	 * The stream id as provided by the provider
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $streamRemoteId = null;

	/**
	 * The backup stream id as provided by the provider
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $streamRemoteBackupId = null;

	/**
	 * Array of supported bitrates
	 * 
	 *
	 * @var array of KalturaLiveStreamBitrate
	 */
	var $bitrates;

	/**
	 * 
	 *
	 * @var string
	 */
	var $primaryBroadcastingUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $secondaryBroadcastingUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $streamName = null;


}

class KalturaLiveStreamAdminEntry extends KalturaLiveStreamEntry
{
	/**
	 * The broadcast primary ip
	 * 
	 *
	 * @var string
	 */
	var $encodingIP1 = null;

	/**
	 * The broadcast secondary ip
	 * 
	 *
	 * @var string
	 */
	var $encodingIP2 = null;

	/**
	 * The broadcast password
	 * 
	 *
	 * @var string
	 */
	var $streamPassword = null;

	/**
	 * The broadcast username
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $streamUsername = null;


}

class KalturaPlayableEntryBaseFilter extends KalturaBaseEntryFilter
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
	 * @var int
	 */
	var $msDurationLessThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $msDurationGreaterThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $msDurationLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $msDurationGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $durationTypeMatchOr = null;


}

class KalturaPlayableEntryFilter extends KalturaPlayableEntryBaseFilter
{

}

class KalturaMediaEntryBaseFilter extends KalturaPlayableEntryFilter
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

class KalturaMediaEntryFilter extends KalturaMediaEntryBaseFilter
{

}

class KalturaLiveStreamEntryBaseFilter extends KalturaMediaEntryFilter
{

}

class KalturaLiveStreamEntryFilter extends KalturaLiveStreamEntryBaseFilter
{

}

class KalturaLiveStreamListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaLiveStreamEntry
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

class KalturaMediaListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaMediaEntry
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

class KalturaMixEntryBaseFilter extends KalturaPlayableEntryFilter
{

}

class KalturaMixEntryFilter extends KalturaMixEntryBaseFilter
{

}

class KalturaMixListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaMixEntry
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

class KalturaKeyValue extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $key = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $value = null;


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
	 * deprecated - lastName and firstName replaces this field
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
	 */
	var $allowMultiNotification = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $adminLoginUsersQuota = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $adminUserId = null;

	/**
	 * firstName and lastName replace the old (deprecated) adminName
	 *
	 * @var string
	 */
	var $firstName = null;

	/**
	 * lastName and firstName replace the old (deprecated) adminName
	 *
	 * @var string
	 */
	var $lastName = null;

	/**
	 * country code (2char) - this field is optional
	 * 
	 *
	 * @var string
	 */
	var $country = null;

	/**
	 * state code (2char) - this field is optional
	 *
	 * @var string
	 */
	var $state = null;

	/**
	 * 
	 *
	 * @var array of KalturaKeyValue
	 * @insertonly
	 */
	var $additionalParams;


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

class KalturaPermissionItem extends KalturaObjectBase
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
	 * @var KalturaPermissionItemType
	 * @readonly
	 */
	var $type = null;

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
	var $tags = null;

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

class KalturaPermissionItemBaseFilter extends KalturaFilter
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
	 * @var KalturaPermissionItemType
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


}

class KalturaPermissionItemFilter extends KalturaPermissionItemBaseFilter
{

}

class KalturaPermissionItemListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaPermissionItem
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

class KalturaPermission extends KalturaObjectBase
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
	 * @var KalturaPermissionType
	 * @readonly
	 */
	var $type = null;

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
	var $friendlyName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $description = null;

	/**
	 * 
	 *
	 * @var KalturaPermissionStatus
	 */
	var $status = null;

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
	var $dependsOnPermissionNames = null;

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
	var $permissionItemsIds = null;

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
	var $partnerGroup = null;


}

class KalturaPermissionBaseFilter extends KalturaFilter
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
	 * @var KalturaPermissionType
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
	 * @var string
	 */
	var $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $friendlyNameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $descriptionLike = null;

	/**
	 * 
	 *
	 * @var KalturaPermissionStatus
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
	 * @var string
	 */
	var $dependsOnPermissionNamesMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $dependsOnPermissionNamesMultiLikeAnd = null;

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


}

class KalturaPermissionFilter extends KalturaPermissionBaseFilter
{

}

class KalturaPermissionListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaPermission
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

class KalturaMediaEntryFilterForPlaylist extends KalturaMediaEntryFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $limit = null;


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
	 * @var array of KalturaMediaEntryFilterForPlaylist
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

class KalturaPlaylistBaseFilter extends KalturaBaseEntryFilter
{

}

class KalturaPlaylistFilter extends KalturaPlaylistBaseFilter
{

}

class KalturaPlaylistListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaPlaylist
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

	/**
	 * time zone offset in minutes
	 *
	 * @var int
	 */
	var $timeZoneOffset = null;


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

class KalturaSearchResultResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaSearchResult
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

class KalturaBaseSyndicationFeedBaseFilter extends KalturaFilter
{

}

class KalturaBaseSyndicationFeedFilter extends KalturaBaseSyndicationFeedBaseFilter
{

}

class KalturaBaseSyndicationFeedListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaBaseSyndicationFeed
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

class KalturaThumbAsset extends KalturaAsset
{
	/**
	 * The Flavor Params used to create this Flavor Asset
	 * 
	 *
	 * @var int
	 */
	var $thumbParamsId = null;

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


}

class KalturaThumbParams extends KalturaAssetParams
{
	/**
	 * 
	 *
	 * @var KalturaThumbCropType
	 */
	var $cropType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $quality = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $cropX = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $cropY = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $cropWidth = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $cropHeight = null;

	/**
	 * 
	 *
	 * @var float
	 */
	var $videoOffset = null;

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
	 * @var float
	 */
	var $scaleWidth = null;

	/**
	 * 
	 *
	 * @var float
	 */
	var $scaleHeight = null;

	/**
	 * Hexadecimal value
	 *
	 * @var string
	 */
	var $backgroundColor = null;

	/**
	 * Id of the flavor params or the thumbnail params to be used as source for the thumbnail creation
	 *
	 * @var int
	 */
	var $sourceParamsId = null;


}

class KalturaThumbAssetListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaThumbAsset
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

class KalturaThumbParamsBaseFilter extends KalturaAssetParamsFilter
{

}

class KalturaThumbParamsFilter extends KalturaThumbParamsBaseFilter
{

}

class KalturaThumbParamsListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaThumbParams
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

class KalturaUiConfBaseFilter extends KalturaFilter
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
	 * @var KalturaUiConfObjType
	 */
	var $objTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $objTypeIn = null;

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

class KalturaUiConfFilter extends KalturaUiConfBaseFilter
{

}

class KalturaUiConfListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaUiConf
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

class KalturaUiConfTypeInfo extends KalturaObjectBase
{
	/**
	 * UiConf Type
	 * 
	 *
	 * @var KalturaUiConfObjType
	 */
	var $type = null;

	/**
	 * Available versions
	 * 
	 *
	 * @var array of KalturaString
	 */
	var $versions;

	/**
	 * The direcotry this type is saved at
	 * 
	 *
	 * @var string
	 */
	var $directory = null;

	/**
	 * Filename for this UiConf type
	 * 
	 *
	 * @var string
	 */
	var $filename = null;


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

class KalturaUploadToken extends KalturaObjectBase
{
	/**
	 * Upload token unique ID
	 *
	 * @var string
	 * @readonly
	 */
	var $id = null;

	/**
	 * Partner ID of the upload token
	 *
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * User id for the upload token
	 *
	 * @var string
	 * @readonly
	 */
	var $userId = null;

	/**
	 * Status of the upload token
	 *
	 * @var KalturaUploadTokenStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * Name of the file for the upload token, can be empty when the upload token is created and will be updated internally after the file is uploaded
	 *
	 * @var string
	 * @insertonly
	 */
	var $fileName = null;

	/**
	 * File size in bytes, can be empty when the upload token is created and will be updated internally after the file is uploaded
	 *
	 * @var float
	 * @insertonly
	 */
	var $fileSize = null;

	/**
	 * Uploaded file size in bytes, can be used to identify how many bytes were uploaded before resuming
	 *
	 * @var float
	 * @readonly
	 */
	var $uploadedFileSize = null;

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


}

class KalturaUploadTokenBaseFilter extends KalturaFilter
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
	 * @var KalturaUploadTokenStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaUploadTokenFilter extends KalturaUploadTokenBaseFilter
{

}

class KalturaUploadTokenListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaUploadToken
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

class KalturaUserRole extends KalturaObjectBase
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
	var $description = null;

	/**
	 * 
	 *
	 * @var KalturaUserRoleStatus
	 */
	var $status = null;

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
	var $permissionNames = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

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

class KalturaUserRoleBaseFilter extends KalturaFilter
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
	var $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $nameIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $descriptionLike = null;

	/**
	 * 
	 *
	 * @var KalturaUserRoleStatus
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


}

class KalturaUserRoleFilter extends KalturaUserRoleBaseFilter
{

}

class KalturaUserRoleListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaUserRole
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

class KalturaUserBaseFilter extends KalturaFilter
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
	 * @var KalturaUserStatus
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
	 * @var bool
	 */
	var $isAdminEqual = null;


}

class KalturaUserFilter extends KalturaUserBaseFilter
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
	 * @var bool
	 */
	var $loginEnabledEqual = null;


}

class KalturaUserListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaUser
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

class KalturaWidgetBaseFilter extends KalturaFilter
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

class KalturaWidgetFilter extends KalturaWidgetBaseFilter
{

}

class KalturaWidgetListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaWidget
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

class KalturaMetadataBaseFilter extends KalturaFilter
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
	 * @var int
	 */
	var $metadataProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $metadataProfileVersionEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $metadataProfileVersionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $metadataProfileVersionLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var KalturaMetadataObjectType
	 */
	var $metadataObjectTypeEqual = null;

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
	 * @var int
	 */
	var $versionEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $versionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $versionLessThanOrEqual = null;

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
	 * @var KalturaMetadataStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaMetadataFilter extends KalturaMetadataBaseFilter
{

}

class KalturaMetadata extends KalturaObjectBase
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
	var $metadataProfileId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $metadataProfileVersion = null;

	/**
	 * 
	 *
	 * @var KalturaMetadataObjectType
	 * @readonly
	 */
	var $metadataObjectType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $objectId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $version = null;

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
	 * @var KalturaMetadataStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $xml = null;


}

class KalturaMetadataListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaMetadata
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

class KalturaMetadataProfileBaseFilter extends KalturaFilter
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
	var $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var KalturaMetadataObjectType
	 */
	var $metadataObjectTypeEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $versionEqual = null;

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
	 * @var KalturaMetadataProfileStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaMetadataProfileFilter extends KalturaMetadataProfileBaseFilter
{

}

class KalturaMetadataProfile extends KalturaObjectBase
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
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var KalturaMetadataObjectType
	 */
	var $metadataObjectType = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $version = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $name = null;

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
	 * @var KalturaMetadataProfileStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $xsd = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $views = null;


}

class KalturaMetadataProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaMetadataProfile
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

class KalturaMetadataProfileField extends KalturaObjectBase
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
	 * @readonly
	 */
	var $xPath = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $key = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $label = null;


}

class KalturaMetadataProfileFieldListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaMetadataProfileField
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

class KalturaPartnerBaseFilter extends KalturaFilter
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

class KalturaPartnerFilter extends KalturaPartnerBaseFilter
{

}

class KalturaStorageProfile extends KalturaObjectBase
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
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

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
	var $desciption = null;

	/**
	 * 
	 *
	 * @var KalturaStorageProfileStatus
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var KalturaStorageProfileProtocol
	 */
	var $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $storageUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $storageBaseDir = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $storageUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $storagePassword = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $storageFtpPassiveMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $deliveryHttpBaseUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $deliveryRmpBaseUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $deliveryIisBaseUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $minFileSize = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $maxFileSize = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorParamsIds = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $maxConcurrentConnections = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $pathManagerClass = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $urlManagerClass = null;

	/**
	 * TODO - remove after events manager is implemented
	 * No need to create enum for temp field
	 * 
	 *
	 * @var int
	 */
	var $trigger = null;


}

class KalturaStorageProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaStorageProfile
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

class KalturaAuditTrailBaseFilter extends KalturaFilter
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
	var $parsedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $parsedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailStatus
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
	 * @var KalturaAuditTrailObjectType
	 */
	var $auditObjectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $auditObjectTypeIn = null;

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
	var $relatedObjectIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $relatedObjectIdIn = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailObjectType
	 */
	var $relatedObjectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $relatedObjectTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $masterPartnerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $masterPartnerIdIn = null;

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
	 * @var string
	 */
	var $requestIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $requestIdIn = null;

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
	var $userIdIn = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailAction
	 */
	var $actionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $actionIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $ksEqual = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailContext
	 */
	var $contextEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $contextIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryPointEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryPointIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $serverNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $serverNameIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $ipAddressEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $ipAddressIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $clientTagEqual = null;


}

class KalturaAuditTrailFilter extends KalturaAuditTrailBaseFilter
{

}

class KalturaAuditTrailInfo extends KalturaObjectBase
{

}

class KalturaAuditTrail extends KalturaObjectBase
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
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Indicates when the data was parsed
	 *
	 * @var int
	 * @readonly
	 */
	var $parsedAt = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailObjectType
	 */
	var $auditObjectType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $objectId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $relatedObjectId = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailObjectType
	 */
	var $relatedObjectType = null;

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
	 * @readonly
	 */
	var $masterPartnerId = null;

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
	var $requestId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userId = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailAction
	 */
	var $action = null;

	/**
	 * 
	 *
	 * @var KalturaAuditTrailInfo
	 */
	var $data;

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
	 * @var KalturaAuditTrailContext
	 * @readonly
	 */
	var $context = null;

	/**
	 * The API service and action that called and caused this audit
	 *
	 * @var string
	 * @readonly
	 */
	var $entryPoint = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $serverName = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $ipAddress = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $userAgent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $clientTag = null;

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
	 * @readonly
	 */
	var $errorDescription = null;


}

class KalturaAuditTrailListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaAuditTrail
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

class KalturaVirusScanProfileBaseFilter extends KalturaFilter
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
	 * @var KalturaVirusScanProfileStatus
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
	 * @var KalturaVirusScanEngineType
	 */
	var $engineTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $engineTypeIn = null;


}

class KalturaVirusScanProfileFilter extends KalturaVirusScanProfileBaseFilter
{

}

class KalturaVirusScanProfile extends KalturaObjectBase
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
	 * @var int
	 * @readonly
	 */
	var $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * 
	 *
	 * @var KalturaVirusScanProfileStatus
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var KalturaVirusScanEngineType
	 */
	var $engineType = null;

	/**
	 * 
	 *
	 * @var KalturaBaseEntryFilter
	 */
	var $entryFilter;

	/**
	 * 
	 *
	 * @var KalturaVirusFoundAction
	 */
	var $actionIfInfected = null;


}

class KalturaVirusScanProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaVirusScanProfile
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

class KalturaDistributionThumbDimensions extends KalturaObjectBase
{
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


}

class KalturaDistributionProfile extends KalturaObjectBase
{
	/**
	 * Auto generated unique id
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * Profile creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Profile last update date as Unix timestamp (In seconds)
	 * 
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
	 * @var KalturaDistributionProviderType
	 * @insertonly
	 */
	var $providerType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileStatus
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	var $submitEnabled = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	var $updateEnabled = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	var $deleteEnabled = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	var $reportEnabled = null;

	/**
	 * Comma separated flavor params ids that should be auto converted
	 *
	 * @var string
	 */
	var $autoCreateFlavors = null;

	/**
	 * Comma separated thumbnail params ids that should be auto generated
	 *
	 * @var string
	 */
	var $autoCreateThumb = null;

	/**
	 * Comma separated flavor params ids that should be submitted if ready
	 *
	 * @var string
	 */
	var $optionalFlavorParamsIds = null;

	/**
	 * Comma separated flavor params ids that required to be readt before submission
	 *
	 * @var string
	 */
	var $requiredFlavorParamsIds = null;

	/**
	 * Thumbnail dimensions that should be submitted if ready
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	var $optionalThumbDimensions;

	/**
	 * Thumbnail dimensions that required to be readt before submission
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	var $requiredThumbDimensions;

	/**
	 * If entry distribution sunrise not specified that will be the default since entry creation time, in seconds
	 *
	 * @var int
	 */
	var $sunriseDefaultOffset = null;

	/**
	 * If entry distribution sunset not specified that will be the default since entry creation time, in seconds
	 *
	 * @var int
	 */
	var $sunsetDefaultOffset = null;


}

class KalturaDistributionProfileBaseFilter extends KalturaFilter
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
	 * @var KalturaDistributionProfileStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaDistributionProfileFilter extends KalturaDistributionProfileBaseFilter
{

}

class KalturaDistributionProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaDistributionProfile
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

class KalturaDistributionValidationError extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaDistributionAction
	 */
	var $action = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionErrorType
	 */
	var $errorType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $description = null;


}

class KalturaEntryDistribution extends KalturaObjectBase
{
	/**
	 * Auto generated unique id
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * Entry distribution creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Entry distribution last update date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

	/**
	 * Entry distribution submission date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $submittedAt = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	var $entryId = null;

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
	 * @insertonly
	 */
	var $distributionProfileId = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionSunStatus
	 * @readonly
	 */
	var $sunStatus = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionFlag
	 * @readonly
	 */
	var $dirtyStatus = null;

	/**
	 * Comma separated thumbnail asset ids
	 *
	 * @var string
	 */
	var $thumbAssetIds = null;

	/**
	 * Comma separated flavor asset ids
	 *
	 * @var string
	 */
	var $flavorAssetIds = null;

	/**
	 * Entry distribution publish time as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 */
	var $sunrise = null;

	/**
	 * Entry distribution un-publish time as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 */
	var $sunset = null;

	/**
	 * The id as returned from the distributed destination
	 *
	 * @var string
	 * @readonly
	 */
	var $remoteId = null;

	/**
	 * The plays as retrieved from the remote destination reports
	 *
	 * @var int
	 * @readonly
	 */
	var $plays = null;

	/**
	 * The views as retrieved from the remote destination reports
	 *
	 * @var int
	 * @readonly
	 */
	var $views = null;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionValidationError
	 * @readonly
	 */
	var $validationErrors;

	/**
	 * 
	 *
	 * @var KalturaBatchJobErrorTypes
	 * @readonly
	 */
	var $errorType = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $errorNumber = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $errorDescription = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $hasSubmitResultsLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $hasSubmitSentDataLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $hasUpdateResultsLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $hasUpdateSentDataLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $hasDeleteResultsLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	var $hasDeleteSentDataLog = null;


}

class KalturaEntryDistributionBaseFilter extends KalturaFilter
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
	var $submittedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $submittedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $entryIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $distributionProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $distributionProfileIdIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionStatus
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
	 * @var KalturaEntryDistributionFlag
	 */
	var $dirtyStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $dirtyStatusIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $sunriseGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $sunriseLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $sunsetGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $sunsetLessThanOrEqual = null;


}

class KalturaEntryDistributionFilter extends KalturaEntryDistributionBaseFilter
{

}

class KalturaEntryDistributionListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaEntryDistribution
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

class KalturaDistributionProviderBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var KalturaDistributionProviderType
	 */
	var $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $typeIn = null;


}

class KalturaDistributionProviderFilter extends KalturaDistributionProviderBaseFilter
{

}

class KalturaDistributionProvider extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaDistributionProviderType
	 * @readonly
	 */
	var $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $name = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $scheduleUpdateEnabled = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $availabilityUpdateEnabled = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	var $deleteInsteadUpdate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $intervalBeforeSunrise = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $intervalBeforeSunset = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updateRequiredEntryFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $updateRequiredMetadataXPaths = null;


}

class KalturaDistributionProviderListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaDistributionProvider
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

class KalturaGenericDistributionProvider extends KalturaDistributionProvider
{
	/**
	 * Auto generated
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * Generic distribution provider creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Generic distribution provider last update date as Unix timestamp (In seconds)
	 * 
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
	 * @var bool
	 */
	var $isDefault = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $optionalFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $requiredFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	var $optionalThumbDimensions;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	var $requiredThumbDimensions;

	/**
	 * 
	 *
	 * @var string
	 */
	var $editableFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $mandatoryFields = null;


}

class KalturaGenericDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
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
	 * @var bool
	 */
	var $isDefaultEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $isDefaultIn = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaGenericDistributionProviderFilter extends KalturaGenericDistributionProviderBaseFilter
{

}

class KalturaGenericDistributionProviderListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaGenericDistributionProvider
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

class KalturaGenericDistributionProviderAction extends KalturaObjectBase
{
	/**
	 * Auto generated
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $id = null;

	/**
	 * Generic distribution provider action creation date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $createdAt = null;

	/**
	 * Generic distribution provider action last update date as Unix timestamp (In seconds)
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	var $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @insertonly
	 */
	var $genericDistributionProviderId = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionAction
	 * @insertonly
	 */
	var $action = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderStatus
	 * @readonly
	 */
	var $status = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderParser
	 */
	var $resultsParser = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProtocol
	 */
	var $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $serverAddress = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $remotePath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $remoteUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $remotePassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $editableFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $mandatoryFields = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $mrssTransformer = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $mrssValidator = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $resultsTransformer = null;


}

class KalturaGenericDistributionProviderActionBaseFilter extends KalturaFilter
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
	var $genericDistributionProviderIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $genericDistributionProviderIdIn = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionAction
	 */
	var $actionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $actionIn = null;


}

class KalturaGenericDistributionProviderActionFilter extends KalturaGenericDistributionProviderActionBaseFilter
{

}

class KalturaGenericDistributionProviderActionListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaGenericDistributionProviderAction
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

class KalturaAnnotationBaseFilter extends KalturaFilter
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
	var $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
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
	var $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userIdIn = null;


}

class KalturaAnnotationFilter extends KalturaAnnotationBaseFilter
{

}

class KalturaAnnotation extends KalturaObjectBase
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
	var $entryId = null;

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
	var $parentId = null;

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
	var $text = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $tags = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $startTime = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $endTime = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	var $userId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $partnerData = null;


}

class KalturaAnnotationListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaAnnotation
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

class KalturaShortLinkBaseFilter extends KalturaFilter
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
	var $expiresAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $expiresAtLessThanOrEqual = null;

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
	 * @var string
	 */
	var $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $userIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $systemNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $systemNameIn = null;

	/**
	 * 
	 *
	 * @var KalturaShortLinkStatus
	 */
	var $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $statusIn = null;


}

class KalturaShortLinkFilter extends KalturaShortLinkBaseFilter
{

}

class KalturaShortLink extends KalturaObjectBase
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
	 * @var int
	 */
	var $expiresAt = null;

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
	var $userId = null;

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
	var $systemName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $fullUrl = null;

	/**
	 * 
	 *
	 * @var KalturaShortLinkStatus
	 */
	var $status = null;


}

class KalturaShortLinkListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaShortLink
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

class KalturaIpAddressRestriction extends KalturaBaseRestriction
{
	/**
	 * Ip address restriction type (Allow or deny)
	 * 
	 *
	 * @var KalturaIpAddressRestrictionType
	 */
	var $ipAddressRestrictionType = null;

	/**
	 * Comma separated list of ip address to allow to deny 
	 * 
	 *
	 * @var string
	 */
	var $ipAddressList = null;


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

class KalturaSearchCondition extends KalturaSearchItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $field = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $value = null;


}

class KalturaSearchComparableCondition extends KalturaSearchCondition
{
	/**
	 * 
	 *
	 * @var KalturaSearchConditionComparison
	 */
	var $comparison = null;


}

class KalturaSearchOperator extends KalturaSearchItem
{
	/**
	 * 
	 *
	 * @var KalturaSearchOperatorType
	 */
	var $type = null;

	/**
	 * 
	 *
	 * @var array of KalturaSearchItem
	 */
	var $items;


}

class KalturaBaseJobBaseFilter extends KalturaFilter
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
	 * @var string
	 */
	var $partnerIdNotIn = null;

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
	var $processorExpirationGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $processorExpirationLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $executionAttemptsGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $executionAttemptsLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $lockVersionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $lockVersionLessThanOrEqual = null;


}

class KalturaBaseJobFilter extends KalturaBaseJobBaseFilter
{

}

class KalturaBatchJobBaseFilter extends KalturaBaseJobFilter
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
	 * @var string
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
	var $jobSubTypeNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $onStressDivertToEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $onStressDivertToIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $onStressDivertToNotIn = null;

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
	var $statusNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $abortEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $checkAgainTimeoutGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $checkAgainTimeoutLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $progressGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $progressLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatesCountGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $updatesCountLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $priorityGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $priorityLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $priorityEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $priorityIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $priorityNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $twinJobIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $twinJobIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $twinJobIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $bulkJobIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $bulkJobIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $bulkJobIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $parentJobIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $parentJobIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $parentJobIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $rootJobIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $rootJobIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $rootJobIdNotIn = null;

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
	 * @var KalturaBatchJobErrorTypes
	 */
	var $errTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $errTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $errTypeNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $errNumberEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $errNumberIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $errNumberNotIn = null;

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

	/**
	 * 
	 *
	 * @var bool
	 */
	var $lastWorkerRemoteEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $schedulerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $schedulerIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $schedulerIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $workerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $workerIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $workerIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $batchIndexEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $batchIndexIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $batchIndexNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $lastSchedulerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $lastSchedulerIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $lastSchedulerIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $lastWorkerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $lastWorkerIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $lastWorkerIdNotIn = null;

	/**
	 * 
	 *
	 * @var int
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
	 * @var string
	 */
	var $dcNotIn = null;


}

class KalturaControlPanelCommandBaseFilter extends KalturaFilter
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

class KalturaMailJobBaseFilter extends KalturaBaseJobFilter
{

}

class KalturaNotificationBaseFilter extends KalturaBaseJobFilter
{

}

class KalturaBatchJobFilter extends KalturaBatchJobBaseFilter
{

}

class KalturaControlPanelCommandFilter extends KalturaControlPanelCommandBaseFilter
{

}

class KalturaMailJobFilter extends KalturaMailJobBaseFilter
{

}

class KalturaNotificationFilter extends KalturaNotificationBaseFilter
{

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

class KalturaAssetParamsOutputBaseFilter extends KalturaAssetParamsFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $assetParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $assetParamsVersionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $assetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $assetVersionEqual = null;


}

class KalturaFlavorAssetBaseFilter extends KalturaAssetFilter
{

}

class KalturaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsFilter
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

class KalturaMediaFlavorParamsBaseFilter extends KalturaFlavorParamsFilter
{

}

class KalturaFlavorParamsOutputFilter extends KalturaFlavorParamsOutputBaseFilter
{

}

class KalturaMediaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter
{

}

class KalturaMediaInfoBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $flavorAssetIdEqual = null;


}

class KalturaThumbAssetBaseFilter extends KalturaAssetFilter
{

}

class KalturaThumbParamsOutputBaseFilter extends KalturaThumbParamsFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $thumbParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbParamsVersionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbAssetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbAssetVersionEqual = null;


}

class KalturaAssetParamsOutputFilter extends KalturaAssetParamsOutputBaseFilter
{

}

class KalturaFlavorAssetFilter extends KalturaFlavorAssetBaseFilter
{

}

class KalturaMediaFlavorParamsFilter extends KalturaMediaFlavorParamsBaseFilter
{

}

class KalturaMediaFlavorParamsOutputFilter extends KalturaMediaFlavorParamsOutputBaseFilter
{

}

class KalturaMediaInfoFilter extends KalturaMediaInfoBaseFilter
{

}

class KalturaThumbAssetFilter extends KalturaThumbAssetBaseFilter
{

}

class KalturaThumbParamsOutputFilter extends KalturaThumbParamsOutputBaseFilter
{

}

class KalturaLiveStreamAdminEntryBaseFilter extends KalturaLiveStreamEntryFilter
{

}

class KalturaLiveStreamAdminEntryFilter extends KalturaLiveStreamAdminEntryBaseFilter
{

}

class KalturaAdminUserBaseFilter extends KalturaUserFilter
{

}

class KalturaAdminUserFilter extends KalturaAdminUserBaseFilter
{

}

class KalturaGoogleVideoSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaGoogleVideoSyndicationFeedFilter extends KalturaGoogleVideoSyndicationFeedBaseFilter
{

}

class KalturaITunesSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaITunesSyndicationFeedFilter extends KalturaITunesSyndicationFeedBaseFilter
{

}

class KalturaTubeMogulSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaTubeMogulSyndicationFeedFilter extends KalturaTubeMogulSyndicationFeedBaseFilter
{

}

class KalturaYahooSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaYahooSyndicationFeedFilter extends KalturaYahooSyndicationFeedBaseFilter
{

}

class KalturaApiActionPermissionItemBaseFilter extends KalturaPermissionItemFilter
{

}

class KalturaApiParameterPermissionItemBaseFilter extends KalturaPermissionItemFilter
{

}

class KalturaApiActionPermissionItemFilter extends KalturaApiActionPermissionItemBaseFilter
{

}

class KalturaApiParameterPermissionItemFilter extends KalturaApiParameterPermissionItemBaseFilter
{

}

class KalturaGenericSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

class KalturaGenericSyndicationFeedFilter extends KalturaGenericSyndicationFeedBaseFilter
{

}

class KalturaGenericXsltSyndicationFeedBaseFilter extends KalturaGenericSyndicationFeedFilter
{

}

class KalturaGenericXsltSyndicationFeedFilter extends KalturaGenericXsltSyndicationFeedBaseFilter
{

}

class KalturaAssetParamsOutput extends KalturaAssetParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $assetParamsId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $assetParamsVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $assetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $assetVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	var $readyBehavior = null;


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

	/**
	 * 
	 *
	 * @var int
	 */
	var $readyBehavior = null;


}

class KalturaMediaFlavorParamsOutput extends KalturaFlavorParamsOutput
{

}

class KalturaMediaFlavorParams extends KalturaFlavorParams
{

}

class KalturaThumbParamsOutput extends KalturaThumbParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	var $thumbParamsId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbParamsVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbAssetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $thumbAssetVersion = null;


}

class KalturaApiActionPermissionItem extends KalturaPermissionItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $service = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $action = null;


}

class KalturaApiParameterPermissionItem extends KalturaPermissionItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $object = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $parameter = null;

	/**
	 * 
	 *
	 * @var KalturaApiParameterPermissionItemAction
	 */
	var $action = null;


}

class KalturaGenericSyndicationFeed extends KalturaBaseSyndicationFeed
{
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

class KalturaGenericXsltSyndicationFeed extends KalturaGenericSyndicationFeed
{
	/**
	 * 
	 *
	 * @var string
	 */
	var $xslt = null;


}

class KalturaGoogleVideoSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var KalturaGoogleSyndicationFeedAdultValues
	 */
	var $adultContent = null;


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
	var $category = null;

	/**
	 * 
	 *
	 * @var KalturaITunesSyndicationFeedAdultValues
	 */
	var $adultContent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	var $feedAuthor = null;


}

class KalturaTubeMogulSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var KalturaTubeMogulSyndicationFeedCategories
	 * @readonly
	 */
	var $category = null;


}

class KalturaYahooSyndicationFeed extends KalturaBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var KalturaYahooSyndicationFeedCategories
	 * @readonly
	 */
	var $category = null;

	/**
	 * 
	 *
	 * @var KalturaYahooSyndicationFeedAdultValues
	 */
	var $adultContent = null;

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

	function login($email, $password, $partnerId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$this->client->addParam($kparams, "password", $password);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$resultObject = $this->client->callService("adminuser", "login", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function setInitialPassword($hashKey, $newPassword)
	{
		$kparams = array();
		$this->client->addParam($kparams, "hashKey", $hashKey);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$resultObject = $this->client->callService("adminuser", "setInitialPassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}
}

class KalturaBaseEntryService extends KalturaServiceBase
{
	function KalturaBaseEntryService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function addFromUploadedFile($entry, $uploadTokenId, $type = null)
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

class KalturaEmailIngestionProfileService extends KalturaServiceBase
{
	function KalturaEmailIngestionProfileService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($EmailIP)
	{
		$kparams = array();
		$this->client->addParam($kparams, "EmailIP", $EmailIP->toParams());
		$resultObject = $this->client->callService("emailingestionprofile", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEmailIngestionProfile");
		return $resultObject;
	}

	function getByEmailAddress($emailAddress)
	{
		$kparams = array();
		$this->client->addParam($kparams, "emailAddress", $emailAddress);
		$resultObject = $this->client->callService("emailingestionprofile", "getByEmailAddress", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEmailIngestionProfile");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("emailingestionprofile", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEmailIngestionProfile");
		return $resultObject;
	}

	function update($id, $EmailIP)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "EmailIP", $EmailIP->toParams());
		$resultObject = $this->client->callService("emailingestionprofile", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEmailIngestionProfile");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("emailingestionprofile", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function addMediaEntry($mediaEntry, $uploadTokenId, $emailProfId, $fromAddress, $emailMsgId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$this->client->addParam($kparams, "emailProfId", $emailProfId);
		$this->client->addParam($kparams, "fromAddress", $fromAddress);
		$this->client->addParam($kparams, "emailMsgId", $emailMsgId);
		$resultObject = $this->client->callService("emailingestionprofile", "addMediaEntry", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
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

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("flavorasset", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFlavorAssetListResponse");
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

	function getDownloadUrl($id, $useCdn = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "useCdn", $useCdn);
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

class KalturaLiveStreamService extends KalturaServiceBase
{
	function KalturaLiveStreamService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($liveStreamEntry, $sourceType = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "liveStreamEntry", $liveStreamEntry->toParams());
		$this->client->addParam($kparams, "sourceType", $sourceType);
		$resultObject = $this->client->callService("livestream", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveStreamAdminEntry");
		return $resultObject;
	}

	function get($entryId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "version", $version);
		$resultObject = $this->client->callService("livestream", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveStreamEntry");
		return $resultObject;
	}

	function update($entryId, $liveStreamEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "liveStreamEntry", $liveStreamEntry->toParams());
		$resultObject = $this->client->callService("livestream", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveStreamAdminEntry");
		return $resultObject;
	}

	function delete($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("livestream", "delete", $kparams);
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
		$resultObject = $this->client->callService("livestream", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveStreamListResponse");
		return $resultObject;
	}

	function updateOfflineThumbnailJpeg($entryId, $fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("livestream", "updateOfflineThumbnailJpeg", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveStreamEntry");
		return $resultObject;
	}

	function updateOfflineThumbnailFromUrl($entryId, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("livestream", "updateOfflineThumbnailFromUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveStreamEntry");
		return $resultObject;
	}
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

	function addFromEntry($sourceEntryId, $mediaEntry = null, $sourceFlavorParamsId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
		if ($mediaEntry !== null)
			$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($kparams, "sourceFlavorParamsId", $sourceFlavorParamsId);
		$resultObject = $this->client->callService("media", "addFromEntry", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function addFromFlavorAsset($sourceFlavorAssetId, $mediaEntry = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "sourceFlavorAssetId", $sourceFlavorAssetId);
		if ($mediaEntry !== null)
			$this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
		$resultObject = $this->client->callService("media", "addFromFlavorAsset", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaEntry");
		return $resultObject;
	}

	function convert($entryId, $conversionProfileId = "", $dynamicConversionAttributes = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
		if ($dynamicConversionAttributes !== null)
			foreach(dynamicConversionAttributes as $obj)
			{
				$this->client->addParam($kparams, "dynamicConversionAttributes", $obj->toParams());
			}
		$resultObject = $this->client->callService("media", "convert", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
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

class KalturaPermissionItemService extends KalturaServiceBase
{
	function KalturaPermissionItemService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($permissionItem)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionItem", $permissionItem->toParams());
		$resultObject = $this->client->callService("permissionitem", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionItem");
		return $resultObject;
	}

	function get($permissionItemId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionItemId", $permissionItemId);
		$resultObject = $this->client->callService("permissionitem", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionItem");
		return $resultObject;
	}

	function update($permissionItemId, $permissionItem)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionItemId", $permissionItemId);
		$this->client->addParam($kparams, "permissionItem", $permissionItem->toParams());
		$resultObject = $this->client->callService("permissionitem", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionItem");
		return $resultObject;
	}

	function delete($permissionItemId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionItemId", $permissionItemId);
		$resultObject = $this->client->callService("permissionitem", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionItem");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("permissionitem", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionItemListResponse");
		return $resultObject;
	}
}

class KalturaPermissionService extends KalturaServiceBase
{
	function KalturaPermissionService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($permission)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permission", $permission->toParams());
		$resultObject = $this->client->callService("permission", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermission");
		return $resultObject;
	}

	function get($permissionName)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionName", $permissionName);
		$resultObject = $this->client->callService("permission", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermission");
		return $resultObject;
	}

	function update($permissionName, $permission)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionName", $permissionName);
		$this->client->addParam($kparams, "permission", $permission->toParams());
		$resultObject = $this->client->callService("permission", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermission");
		return $resultObject;
	}

	function delete($permissionName)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionName", $permissionName);
		$resultObject = $this->client->callService("permission", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermission");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("permission", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionListResponse");
		return $resultObject;
	}

	function getCurrentPermissions()
	{
		$kparams = array();
		$resultObject = $this->client->callService("permission", "getCurrentPermissions", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
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

	function cloneAction($id, $newPlaylist = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		if ($newPlaylist !== null)
			$this->client->addParam($kparams, "newPlaylist", $newPlaylist->toParams());
		$resultObject = $this->client->callService("playlist", "clone", $kparams);
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
		$this->client->validateObjectType($resultObject, "KalturaPlaylistListResponse");
		return $resultObject;
	}

	function execute($id, $detailed = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "detailed", $detailed);
		$resultObject = $this->client->callService("playlist", "execute", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function executeFromContent($playlistType, $playlistContent, $detailed = "")
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

	function executeFromFilters($filters, $totalResults, $detailed = "")
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

	function getGraphs($reportType, $reportInputFilter, $dimension = "", $objectIds = "")
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

	function getTotal($reportType, $reportInputFilter, $objectIds = "")
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

	function getTable($reportType, $reportInputFilter, $pager, $order = "", $objectIds = "")
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

	function getUrlForReportAsCsv($reportTitle, $reportText, $headers, $reportType, $reportInputFilter, $dimension = "", $pager = null, $order = "", $objectIds = "")
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

	function start($secret, $userId = "", $type = 0, $partnerId = "", $expiry = 86400, $privileges = "")
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

	function end()
	{
		$kparams = array();
		$resultObject = $this->client->callService("session", "end", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function impersonate($secret, $impersonatedPartnerId, $userId = "", $type = 0, $partnerId = "", $expiry = 86400, $privileges = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->addParam($kparams, "impersonatedPartnerId", $impersonatedPartnerId);
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "expiry", $expiry);
		$this->client->addParam($kparams, "privileges", $privileges);
		$resultObject = $this->client->callService("session", "impersonate", $kparams);
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

class KalturaThumbAssetService extends KalturaServiceBase
{
	function KalturaThumbAssetService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function setAsDefault($thumbAssetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
		$resultObject = $this->client->callService("thumbasset", "setAsDefault", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function generateByEntryId($entryId, $destThumbParamsId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "destThumbParamsId", $destThumbParamsId);
		$resultObject = $this->client->callService("thumbasset", "generateByEntryId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAsset");
		return $resultObject;
	}

	function generate($entryId, $thumbParams, $sourceAssetId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "thumbParams", $thumbParams->toParams());
		$this->client->addParam($kparams, "sourceAssetId", $sourceAssetId);
		$resultObject = $this->client->callService("thumbasset", "generate", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAsset");
		return $resultObject;
	}

	function regenerate($thumbAssetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
		$resultObject = $this->client->callService("thumbasset", "regenerate", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAsset");
		return $resultObject;
	}

	function get($thumbAssetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
		$resultObject = $this->client->callService("thumbasset", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAsset");
		return $resultObject;
	}

	function getByEntryId($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("thumbasset", "getByEntryId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("thumbasset", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAssetListResponse");
		return $resultObject;
	}

	function addFromUrl($entryId, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("thumbasset", "addFromUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAsset");
		return $resultObject;
	}

	function addFromImage($entryId, $fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("thumbasset", "addFromImage", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbAsset");
		return $resultObject;
	}

	function delete($thumbAssetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
		$resultObject = $this->client->callService("thumbasset", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}
}

class KalturaThumbParamsService extends KalturaServiceBase
{
	function KalturaThumbParamsService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($thumbParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "thumbParams", $thumbParams->toParams());
		$resultObject = $this->client->callService("thumbparams", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbParams");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("thumbparams", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbParams");
		return $resultObject;
	}

	function update($id, $thumbParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "thumbParams", $thumbParams->toParams());
		$resultObject = $this->client->callService("thumbparams", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbParams");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("thumbparams", "delete", $kparams);
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
		$resultObject = $this->client->callService("thumbparams", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaThumbParamsListResponse");
		return $resultObject;
	}

	function getByConversionProfileId($conversionProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
		$resultObject = $this->client->callService("thumbparams", "getByConversionProfileId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
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

	function getAvailableTypes()
	{
		$kparams = array();
		$resultObject = $this->client->callService("uiconf", "getAvailableTypes", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
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

class KalturaUploadTokenService extends KalturaServiceBase
{
	function KalturaUploadTokenService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($uploadToken = null)
	{
		$kparams = array();
		if ($uploadToken !== null)
			$this->client->addParam($kparams, "uploadToken", $uploadToken->toParams());
		$resultObject = $this->client->callService("uploadtoken", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadToken");
		return $resultObject;
	}

	function get($uploadTokenId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$resultObject = $this->client->callService("uploadtoken", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadToken");
		return $resultObject;
	}

	function upload($uploadTokenId, $fileData, $resume = false, $finalChunk = true, $resumeAt = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$this->client->addParam($kparams, "resume", $resume);
		$this->client->addParam($kparams, "finalChunk", $finalChunk);
		$this->client->addParam($kparams, "resumeAt", $resumeAt);
		$resultObject = $this->client->callService("uploadtoken", "upload", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadToken");
		return $resultObject;
	}

	function delete($uploadTokenId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$resultObject = $this->client->callService("uploadtoken", "delete", $kparams);
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
		$resultObject = $this->client->callService("uploadtoken", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadTokenListResponse");
		return $resultObject;
	}
}

class KalturaUserRoleService extends KalturaServiceBase
{
	function KalturaUserRoleService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($userRole)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userRole", $userRole->toParams());
		$resultObject = $this->client->callService("userrole", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}

	function get($userRoleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userRoleId", $userRoleId);
		$resultObject = $this->client->callService("userrole", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}

	function update($userRoleId, $userRole)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userRoleId", $userRoleId);
		$this->client->addParam($kparams, "userRole", $userRole->toParams());
		$resultObject = $this->client->callService("userrole", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}

	function delete($userRoleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userRoleId", $userRoleId);
		$resultObject = $this->client->callService("userrole", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("userrole", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRoleListResponse");
		return $resultObject;
	}

	function cloneAction($userRoleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userRoleId", $userRoleId);
		$resultObject = $this->client->callService("userrole", "clone", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
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

	function getByLoginId($loginId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "loginId", $loginId);
		$resultObject = $this->client->callService("user", "getByLoginId", $kparams);
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

	function login($partnerId, $userId, $password, $expiry = 86400, $privileges = "*")
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "password", $password);
		$this->client->addParam($kparams, "expiry", $expiry);
		$this->client->addParam($kparams, "privileges", $privileges);
		$resultObject = $this->client->callService("user", "login", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function loginByLoginId($loginId, $password, $partnerId = "", $expiry = 86400, $privileges = "*")
	{
		$kparams = array();
		$this->client->addParam($kparams, "loginId", $loginId);
		$this->client->addParam($kparams, "password", $password);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "expiry", $expiry);
		$this->client->addParam($kparams, "privileges", $privileges);
		$resultObject = $this->client->callService("user", "loginByLoginId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function updateLoginData($oldLoginId, $password, $newLoginId = "", $newPassword = "", $newFirstName = "", $newLastName = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "oldLoginId", $oldLoginId);
		$this->client->addParam($kparams, "password", $password);
		$this->client->addParam($kparams, "newLoginId", $newLoginId);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$this->client->addParam($kparams, "newFirstName", $newFirstName);
		$this->client->addParam($kparams, "newLastName", $newLastName);
		$resultObject = $this->client->callService("user", "updateLoginData", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function resetPassword($email)
	{
		$kparams = array();
		$this->client->addParam($kparams, "email", $email);
		$resultObject = $this->client->callService("user", "resetPassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function setInitialPassword($hashKey, $newPassword)
	{
		$kparams = array();
		$this->client->addParam($kparams, "hashKey", $hashKey);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$resultObject = $this->client->callService("user", "setInitialPassword", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function enableLogin($userId, $loginId, $password = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "loginId", $loginId);
		$this->client->addParam($kparams, "password", $password);
		$resultObject = $this->client->callService("user", "enableLogin", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
		return $resultObject;
	}

	function disableLogin($userId = "", $loginId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "loginId", $loginId);
		$resultObject = $this->client->callService("user", "disableLogin", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUser");
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

class KalturaMetadataService extends KalturaServiceBase
{
	function KalturaMetadataService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("metadata", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataListResponse");
		return $resultObject;
	}

	function add($metadataProfileId, $objectType, $objectId, $xmlData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($kparams, "objectType", $objectType);
		$this->client->addParam($kparams, "objectId", $objectId);
		$this->client->addParam($kparams, "xmlData", $xmlData);
		$resultObject = $this->client->callService("metadata", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}

	function addFromFile($metadataProfileId, $objectType, $objectId, $xmlFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($kparams, "objectType", $objectType);
		$this->client->addParam($kparams, "objectId", $objectId);
		$this->client->addParam($kparams, "xmlFile", $xmlFile->toParams());
		$resultObject = $this->client->callService("metadata", "addFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}

	function addFromUrl($metadataProfileId, $objectType, $objectId, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($kparams, "objectType", $objectType);
		$this->client->addParam($kparams, "objectId", $objectId);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("metadata", "addFromUrl", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}

	function addFromBulk($metadataProfileId, $objectType, $objectId, $url)
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($kparams, "objectType", $objectType);
		$this->client->addParam($kparams, "objectId", $objectId);
		$this->client->addParam($kparams, "url", $url);
		$resultObject = $this->client->callService("metadata", "addFromBulk", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("metadata", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function invalidate($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("metadata", "invalidate", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("metadata", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}

	function update($id, $xmlData = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xmlData", $xmlData);
		$resultObject = $this->client->callService("metadata", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}

	function updateFromFile($id, $xmlFile = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		if ($xmlFile !== null)
			$this->client->addParam($kparams, "xmlFile", $xmlFile->toParams());
		$resultObject = $this->client->callService("metadata", "updateFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadata");
		return $resultObject;
	}
}

class KalturaMetadataProfileService extends KalturaServiceBase
{
	function KalturaMetadataProfileService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("metadataprofile", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfileListResponse");
		return $resultObject;
	}

	function listFields($metadataProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
		$resultObject = $this->client->callService("metadataprofile", "listFields", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfileFieldListResponse");
		return $resultObject;
	}

	function add($metadataProfile, $xsdData, $viewsData = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfile", $metadataProfile->toParams());
		$this->client->addParam($kparams, "xsdData", $xsdData);
		$this->client->addParam($kparams, "viewsData", $viewsData);
		$resultObject = $this->client->callService("metadataprofile", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}

	function addFromFile($metadataProfile, $xsdFile, $viewsFile = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "metadataProfile", $metadataProfile->toParams());
		$this->client->addParam($kparams, "xsdFile", $xsdFile->toParams());
		if ($viewsFile !== null)
			$this->client->addParam($kparams, "viewsFile", $viewsFile->toParams());
		$resultObject = $this->client->callService("metadataprofile", "addFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("metadataprofile", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("metadataprofile", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}

	function update($id, $metadataProfile, $xsdData = "", $viewsData = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "metadataProfile", $metadataProfile->toParams());
		$this->client->addParam($kparams, "xsdData", $xsdData);
		$this->client->addParam($kparams, "viewsData", $viewsData);
		$resultObject = $this->client->callService("metadataprofile", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}

	function revert($id, $toVersion)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "toVersion", $toVersion);
		$resultObject = $this->client->callService("metadataprofile", "revert", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}

	function updateDefinitionFromFile($id, $xsdFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xsdFile", $xsdFile->toParams());
		$resultObject = $this->client->callService("metadataprofile", "updateDefinitionFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}

	function updateViewsFromFile($id, $viewsFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "viewsFile", $viewsFile->toParams());
		$resultObject = $this->client->callService("metadataprofile", "updateViewsFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetadataProfile");
		return $resultObject;
	}
}

class KalturaDocumentsService extends KalturaServiceBase
{
	function KalturaDocumentsService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function addFromUploadedFile($documentEntry, $uploadTokenId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$resultObject = $this->client->callService("documents", "addFromUploadedFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDocumentEntry");
		return $resultObject;
	}

	function addFromEntry($sourceEntryId, $documentEntry = null, $sourceFlavorParamsId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
		if ($documentEntry !== null)
			$this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
		$this->client->addParam($kparams, "sourceFlavorParamsId", $sourceFlavorParamsId);
		$resultObject = $this->client->callService("documents", "addFromEntry", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDocumentEntry");
		return $resultObject;
	}

	function addFromFlavorAsset($sourceFlavorAssetId, $documentEntry = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "sourceFlavorAssetId", $sourceFlavorAssetId);
		if ($documentEntry !== null)
			$this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
		$resultObject = $this->client->callService("documents", "addFromFlavorAsset", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDocumentEntry");
		return $resultObject;
	}

	function convert($entryId, $conversionProfileId = "", $dynamicConversionAttributes = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
		if ($dynamicConversionAttributes !== null)
			foreach(dynamicConversionAttributes as $obj)
			{
				$this->client->addParam($kparams, "dynamicConversionAttributes", $obj->toParams());
			}
		$resultObject = $this->client->callService("documents", "convert", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	function get($entryId, $version = -1)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "version", $version);
		$resultObject = $this->client->callService("documents", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDocumentEntry");
		return $resultObject;
	}

	function update($entryId, $documentEntry)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
		$resultObject = $this->client->callService("documents", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDocumentEntry");
		return $resultObject;
	}

	function delete($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("documents", "delete", $kparams);
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
		$resultObject = $this->client->callService("documents", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDocumentListResponse");
		return $resultObject;
	}

	function upload($fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "fileData", $fileData->toParams());
		$resultObject = $this->client->callService("documents", "upload", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	function convertPptToSwf($entryId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryId", $entryId);
		$resultObject = $this->client->callService("documents", "convertPptToSwf", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}
}

class KalturaStorageProfileService extends KalturaServiceBase
{
	function KalturaStorageProfileService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listByPartner($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("storageprofile", "listByPartner", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStorageProfileListResponse");
		return $resultObject;
	}

	function updateStatus($storageId, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "storageId", $storageId);
		$this->client->addParam($kparams, "status", $status);
		$resultObject = $this->client->callService("storageprofile", "updateStatus", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function get($storageProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "storageProfileId", $storageProfileId);
		$resultObject = $this->client->callService("storageprofile", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStorageProfile");
		return $resultObject;
	}

	function update($storageProfileId, $storageProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "storageProfileId", $storageProfileId);
		$this->client->addParam($kparams, "storageProfile", $storageProfile->toParams());
		$resultObject = $this->client->callService("storageprofile", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStorageProfile");
		return $resultObject;
	}

	function add($storageProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "storageProfile", $storageProfile->toParams());
		$resultObject = $this->client->callService("storageprofile", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStorageProfile");
		return $resultObject;
	}
}

class KalturaAuditTrailService extends KalturaServiceBase
{
	function KalturaAuditTrailService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("audittrail", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAuditTrailListResponse");
		return $resultObject;
	}

	function add($auditTrail)
	{
		$kparams = array();
		$this->client->addParam($kparams, "auditTrail", $auditTrail->toParams());
		$resultObject = $this->client->callService("audittrail", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAuditTrail");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("audittrail", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAuditTrail");
		return $resultObject;
	}
}

class KalturaVirusScanProfileService extends KalturaServiceBase
{
	function KalturaVirusScanProfileService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("virusscanprofile", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaVirusScanProfileListResponse");
		return $resultObject;
	}

	function add($virusScanProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "virusScanProfile", $virusScanProfile->toParams());
		$resultObject = $this->client->callService("virusscanprofile", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
		return $resultObject;
	}

	function get($virusScanProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "virusScanProfileId", $virusScanProfileId);
		$resultObject = $this->client->callService("virusscanprofile", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
		return $resultObject;
	}

	function update($virusScanProfileId, $virusScanProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "virusScanProfileId", $virusScanProfileId);
		$this->client->addParam($kparams, "virusScanProfile", $virusScanProfile->toParams());
		$resultObject = $this->client->callService("virusscanprofile", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
		return $resultObject;
	}

	function delete($virusScanProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "virusScanProfileId", $virusScanProfileId);
		$resultObject = $this->client->callService("virusscanprofile", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
		return $resultObject;
	}

	function scan($flavorAssetId, $virusScanProfileId = "")
	{
		$kparams = array();
		$this->client->addParam($kparams, "flavorAssetId", $flavorAssetId);
		$this->client->addParam($kparams, "virusScanProfileId", $virusScanProfileId);
		$resultObject = $this->client->callService("virusscanprofile", "scan", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}
}

class KalturaDistributionProfileService extends KalturaServiceBase
{
	function KalturaDistributionProfileService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($distributionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "distributionProfile", $distributionProfile->toParams());
		$resultObject = $this->client->callService("distributionprofile", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("distributionprofile", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function update($id, $distributionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "distributionProfile", $distributionProfile->toParams());
		$resultObject = $this->client->callService("distributionprofile", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function updateStatus($id, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "status", $status);
		$resultObject = $this->client->callService("distributionprofile", "updateStatus", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("distributionprofile", "delete", $kparams);
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
		$resultObject = $this->client->callService("distributionprofile", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfileListResponse");
		return $resultObject;
	}

	function listByPartner($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("distributionprofile", "listByPartner", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfileListResponse");
		return $resultObject;
	}
}

class KalturaEntryDistributionService extends KalturaServiceBase
{
	function KalturaEntryDistributionService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($entryDistribution)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryDistribution", $entryDistribution->toParams());
		$resultObject = $this->client->callService("entrydistribution", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function validate($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "validate", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function update($id, $entryDistribution)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "entryDistribution", $entryDistribution->toParams());
		$resultObject = $this->client->callService("entrydistribution", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "delete", $kparams);
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
		$resultObject = $this->client->callService("entrydistribution", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistributionListResponse");
		return $resultObject;
	}

	function submitAdd($id, $submitWhenReady = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "submitWhenReady", $submitWhenReady);
		$resultObject = $this->client->callService("entrydistribution", "submitAdd", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function submitUpdate($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "submitUpdate", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function submitFetchReport($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "submitFetchReport", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function submitDelete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "submitDelete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function retrySubmit($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("entrydistribution", "retrySubmit", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}
}

class KalturaDistributionProviderService extends KalturaServiceBase
{
	function KalturaDistributionProviderService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("distributionprovider", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProviderListResponse");
		return $resultObject;
	}
}

class KalturaGenericDistributionProviderService extends KalturaServiceBase
{
	function KalturaGenericDistributionProviderService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($genericDistributionProvider)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProvider", $genericDistributionProvider->toParams());
		$resultObject = $this->client->callService("genericdistributionprovider", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProvider");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("genericdistributionprovider", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProvider");
		return $resultObject;
	}

	function update($id, $genericDistributionProvider)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "genericDistributionProvider", $genericDistributionProvider->toParams());
		$resultObject = $this->client->callService("genericdistributionprovider", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProvider");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("genericdistributionprovider", "delete", $kparams);
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
		$resultObject = $this->client->callService("genericdistributionprovider", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderListResponse");
		return $resultObject;
	}
}

class KalturaGenericDistributionProviderActionService extends KalturaServiceBase
{
	function KalturaGenericDistributionProviderActionService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function add($genericDistributionProviderAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$resultObject = $this->client->callService("genericdistributionprovideraction", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssTransform($id, $xslData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xslData", $xslData);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "addMrssTransform", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssTransformFromFile($id, $xslFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xslFile", $xslFile->toParams());
		$resultObject = $this->client->callService("genericdistributionprovideraction", "addMrssTransformFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssValidate($id, $xsdData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xsdData", $xsdData);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "addMrssValidate", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssValidateFromFile($id, $xsdFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xsdFile", $xsdFile->toParams());
		$resultObject = $this->client->callService("genericdistributionprovideraction", "addMrssValidateFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addResultsTransform($id, $transformData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "transformData", $transformData);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "addResultsTransform", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addResultsTransformFromFile($id, $transformFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "transformFile", $transformFile->toParams());
		$resultObject = $this->client->callService("genericdistributionprovideraction", "addResultsTransformFromFile", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function getByProviderId($genericDistributionProviderId, $actionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($kparams, "actionType", $actionType);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "getByProviderId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function updateByProviderId($genericDistributionProviderId, $actionType, $genericDistributionProviderAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($kparams, "actionType", $actionType);
		$this->client->addParam($kparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$resultObject = $this->client->callService("genericdistributionprovideraction", "updateByProviderId", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function update($id, $genericDistributionProviderAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$resultObject = $this->client->callService("genericdistributionprovideraction", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function deleteByProviderId($genericDistributionProviderId, $actionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($kparams, "actionType", $actionType);
		$resultObject = $this->client->callService("genericdistributionprovideraction", "deleteByProviderId", $kparams);
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
		$resultObject = $this->client->callService("genericdistributionprovideraction", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderActionListResponse");
		return $resultObject;
	}
}

class KalturaAnnotationService extends KalturaServiceBase
{
	function KalturaAnnotationService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("annotation", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnotationListResponse");
		return $resultObject;
	}

	function add($annotation)
	{
		$kparams = array();
		$this->client->addParam($kparams, "annotation", $annotation->toParams());
		$resultObject = $this->client->callService("annotation", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnotation");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("annotation", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnotation");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("annotation", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function update($id, $annotation)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "annotation", $annotation->toParams());
		$resultObject = $this->client->callService("annotation", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnotation");
		return $resultObject;
	}
}

class KalturaShortLinkService extends KalturaServiceBase
{
	function KalturaShortLinkService(&$client)
	{
		parent::KalturaServiceBase($client);
	}

	function listAction($filter = null, $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$resultObject = $this->client->callService("shortlink", "list", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaShortLinkListResponse");
		return $resultObject;
	}

	function add($shortLink)
	{
		$kparams = array();
		$this->client->addParam($kparams, "shortLink", $shortLink->toParams());
		$resultObject = $this->client->callService("shortlink", "add", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaShortLink");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("shortlink", "get", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaShortLink");
		return $resultObject;
	}

	function update($id, $shortLink)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "shortLink", $shortLink->toParams());
		$resultObject = $this->client->callService("shortlink", "update", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaShortLink");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$resultObject = $this->client->callService("shortlink", "delete", $kparams);
		$this->client->checkForError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaShortLink");
		return $resultObject;
	}
}

class KalturaClient extends KalturaClientBase
{
	/**
	 * @var string
	 */
	var $apiVersion = '3.1.1';

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
	 * EmailIngestionProfile service lets you manage email ingestion profile records
	 *
	 * @var KalturaEmailIngestionProfileService
	 */
	var $EmailIngestionProfile = null;

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
	 * Live Stream service lets you manage live stream channels
	 *
	 * @var KalturaLiveStreamService
	 */
	var $liveStream = null;

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
	 * PermissionItem service lets you create and manage permission items
	 *
	 * @var KalturaPermissionItemService
	 */
	var $permissionItem = null;

	/**
	 * Permission service lets you create and manage user permissions
	 *
	 * @var KalturaPermissionService
	 */
	var $permission = null;

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
	 * Retrieve information and invoke actions on Thumb Asset
	 *
	 * @var KalturaThumbAssetService
	 */
	var $thumbAsset = null;

	/**
	 * Add & Manage Thumb Params
	 *
	 * @var KalturaThumbParamsService
	 */
	var $thumbParams = null;

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
	 * 
	 *
	 * @var KalturaUploadTokenService
	 */
	var $uploadToken = null;

	/**
	 * UserRole service lets you create and manage user roles
	 *
	 * @var KalturaUserRoleService
	 */
	var $userRole = null;

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

	/**
	 * Metadata service
	 *
	 * @var KalturaMetadataService
	 */
	var $metadata = null;

	/**
	 * Metadata Profile service
	 *
	 * @var KalturaMetadataProfileService
	 */
	var $metadataProfile = null;

	/**
	 * Document service lets you upload and manage document files
	 *
	 * @var KalturaDocumentsService
	 */
	var $documents = null;

	/**
	 * Storage Profiles service
	 *
	 * @var KalturaStorageProfileService
	 */
	var $storageProfile = null;

	/**
	 * Audit Trail service
	 *
	 * @var KalturaAuditTrailService
	 */
	var $auditTrail = null;

	/**
	 * Virus scan profile service
	 *
	 * @var KalturaVirusScanProfileService
	 */
	var $virusScanProfile = null;

	/**
	 * Distribution Profile service
	 *
	 * @var KalturaDistributionProfileService
	 */
	var $distributionProfile = null;

	/**
	 * Entry Distribution service
	 *
	 * @var KalturaEntryDistributionService
	 */
	var $entryDistribution = null;

	/**
	 * Distribution Provider service
	 *
	 * @var KalturaDistributionProviderService
	 */
	var $distributionProvider = null;

	/**
	 * Generic Distribution Provider service
	 *
	 * @var KalturaGenericDistributionProviderService
	 */
	var $genericDistributionProvider = null;

	/**
	 * Generic Distribution Provider Actions service
	 *
	 * @var KalturaGenericDistributionProviderActionService
	 */
	var $genericDistributionProviderAction = null;

	/**
	 * Annotation service - Video Annotation
	 *
	 * @var KalturaAnnotationService
	 */
	var $annotation = null;

	/**
	 * Short link service
	 *
	 * @var KalturaShortLinkService
	 */
	var $shortLink = null;


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
		$this->EmailIngestionProfile = new KalturaEmailIngestionProfileService($this);
		$this->flavorAsset = new KalturaFlavorAssetService($this);
		$this->flavorParams = new KalturaFlavorParamsService($this);
		$this->liveStream = new KalturaLiveStreamService($this);
		$this->media = new KalturaMediaService($this);
		$this->mixing = new KalturaMixingService($this);
		$this->notification = new KalturaNotificationService($this);
		$this->partner = new KalturaPartnerService($this);
		$this->permissionItem = new KalturaPermissionItemService($this);
		$this->permission = new KalturaPermissionService($this);
		$this->playlist = new KalturaPlaylistService($this);
		$this->report = new KalturaReportService($this);
		$this->search = new KalturaSearchService($this);
		$this->session = new KalturaSessionService($this);
		$this->stats = new KalturaStatsService($this);
		$this->syndicationFeed = new KalturaSyndicationFeedService($this);
		$this->system = new KalturaSystemService($this);
		$this->thumbAsset = new KalturaThumbAssetService($this);
		$this->thumbParams = new KalturaThumbParamsService($this);
		$this->uiConf = new KalturaUiConfService($this);
		$this->upload = new KalturaUploadService($this);
		$this->uploadToken = new KalturaUploadTokenService($this);
		$this->userRole = new KalturaUserRoleService($this);
		$this->user = new KalturaUserService($this);
		$this->widget = new KalturaWidgetService($this);
		$this->xInternal = new KalturaXInternalService($this);
		$this->metadata = new KalturaMetadataService($this);
		$this->metadataProfile = new KalturaMetadataProfileService($this);
		$this->documents = new KalturaDocumentsService($this);
		$this->storageProfile = new KalturaStorageProfileService($this);
		$this->auditTrail = new KalturaAuditTrailService($this);
		$this->virusScanProfile = new KalturaVirusScanProfileService($this);
		$this->distributionProfile = new KalturaDistributionProfileService($this);
		$this->entryDistribution = new KalturaEntryDistributionService($this);
		$this->distributionProvider = new KalturaDistributionProviderService($this);
		$this->genericDistributionProvider = new KalturaGenericDistributionProviderService($this);
		$this->genericDistributionProviderAction = new KalturaGenericDistributionProviderActionService($this);
		$this->annotation = new KalturaAnnotationService($this);
		$this->shortLink = new KalturaShortLinkService($this);
	}
}

