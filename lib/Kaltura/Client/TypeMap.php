<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platfroms allow them to do with
// text.
//
// Copyright (C) 2006-2015  Kaltura Inc.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// @ignore
// ===================================================================================================

/**
 * @package Kaltura
 * @subpackage Client
 */
class Kaltura_Client_TypeMap
{
	private static $map = array(
		'KalturaBaseEntry' => 'Kaltura_Client_Type_BaseEntry',
		'KalturaBaseEntryBaseFilter' => 'Kaltura_Client_Type_BaseEntryBaseFilter',
		'KalturaBaseEntryFilter' => 'Kaltura_Client_Type_BaseEntryFilter',
		'KalturaBaseEntryListResponse' => 'Kaltura_Client_Type_BaseEntryListResponse',
		'KalturaCategory' => 'Kaltura_Client_Type_Category',
		'KalturaCategoryBaseFilter' => 'Kaltura_Client_Type_CategoryBaseFilter',
		'KalturaCategoryFilter' => 'Kaltura_Client_Type_CategoryFilter',
		'KalturaCategoryListResponse' => 'Kaltura_Client_Type_CategoryListResponse',
		'KalturaClipAttributes' => 'Kaltura_Client_Type_ClipAttributes',
		'KalturaConcatAttributes' => 'Kaltura_Client_Type_ConcatAttributes',
		'KalturaContentResource' => 'Kaltura_Client_Type_ContentResource',
		'KalturaDataCenterContentResource' => 'Kaltura_Client_Type_DataCenterContentResource',
		'KalturaDataEntry' => 'Kaltura_Client_Type_DataEntry',
		'KalturaDataEntryBaseFilter' => 'Kaltura_Client_Type_DataEntryBaseFilter',
		'KalturaDataEntryFilter' => 'Kaltura_Client_Type_DataEntryFilter',
		'KalturaDocumentEntry' => 'Kaltura_Client_Document_Type_DocumentEntry',
		'KalturaDocumentEntryBaseFilter' => 'Kaltura_Client_Document_Type_DocumentEntryBaseFilter',
		'KalturaDocumentEntryFilter' => 'Kaltura_Client_Document_Type_DocumentEntryFilter',
		'KalturaExternalMediaEntry' => 'Kaltura_Client_ExternalMedia_Type_ExternalMediaEntry',
		'KalturaExternalMediaEntryBaseFilter' => 'Kaltura_Client_ExternalMedia_Type_ExternalMediaEntryBaseFilter',
		'KalturaExternalMediaEntryFilter' => 'Kaltura_Client_ExternalMedia_Type_ExternalMediaEntryFilter',
		'KalturaFilter' => 'Kaltura_Client_Type_Filter',
		'KalturaFilterPager' => 'Kaltura_Client_Type_FilterPager',
		'KalturaKeyValue' => 'Kaltura_Client_Type_KeyValue',
		'KalturaLiveChannel' => 'Kaltura_Client_Type_LiveChannel',
		'KalturaLiveChannelBaseFilter' => 'Kaltura_Client_Type_LiveChannelBaseFilter',
		'KalturaLiveChannelFilter' => 'Kaltura_Client_Type_LiveChannelFilter',
		'KalturaLiveEntry' => 'Kaltura_Client_Type_LiveEntry',
		'KalturaLiveEntryBaseFilter' => 'Kaltura_Client_Type_LiveEntryBaseFilter',
		'KalturaLiveEntryFilter' => 'Kaltura_Client_Type_LiveEntryFilter',
		'KalturaLiveEntryRecordingOptions' => 'Kaltura_Client_Type_LiveEntryRecordingOptions',
		'KalturaLiveStreamAdminEntry' => 'Kaltura_Client_Type_LiveStreamAdminEntry',
		'KalturaLiveStreamAdminEntryBaseFilter' => 'Kaltura_Client_Type_LiveStreamAdminEntryBaseFilter',
		'KalturaLiveStreamAdminEntryFilter' => 'Kaltura_Client_Type_LiveStreamAdminEntryFilter',
		'KalturaLiveStreamBitrate' => 'Kaltura_Client_Type_LiveStreamBitrate',
		'KalturaLiveStreamConfiguration' => 'Kaltura_Client_Type_LiveStreamConfiguration',
		'KalturaLiveStreamEntry' => 'Kaltura_Client_Type_LiveStreamEntry',
		'KalturaLiveStreamEntryBaseFilter' => 'Kaltura_Client_Type_LiveStreamEntryBaseFilter',
		'KalturaLiveStreamEntryFilter' => 'Kaltura_Client_Type_LiveStreamEntryFilter',
		'KalturaLiveStreamPushPublishConfiguration' => 'Kaltura_Client_Type_LiveStreamPushPublishConfiguration',
		'KalturaLiveStreamPushPublishRTMPConfiguration' => 'Kaltura_Client_Type_LiveStreamPushPublishRTMPConfiguration',
		'KalturaMediaEntry' => 'Kaltura_Client_Type_MediaEntry',
		'KalturaMediaEntryBaseFilter' => 'Kaltura_Client_Type_MediaEntryBaseFilter',
		'KalturaMediaEntryFilter' => 'Kaltura_Client_Type_MediaEntryFilter',
		'KalturaMediaEntryFilterForPlaylist' => 'Kaltura_Client_Type_MediaEntryFilterForPlaylist',
		'KalturaMetadata' => 'Kaltura_Client_Metadata_Type_Metadata',
		'KalturaMetadataBaseFilter' => 'Kaltura_Client_Metadata_Type_MetadataBaseFilter',
		'KalturaMetadataFilter' => 'Kaltura_Client_Metadata_Type_MetadataFilter',
		'KalturaMetadataListResponse' => 'Kaltura_Client_Metadata_Type_MetadataListResponse',
		'KalturaMetadataProfile' => 'Kaltura_Client_Metadata_Type_MetadataProfile',
		'KalturaMetadataProfileBaseFilter' => 'Kaltura_Client_Metadata_Type_MetadataProfileBaseFilter',
		'KalturaMetadataProfileField' => 'Kaltura_Client_Metadata_Type_MetadataProfileField',
		'KalturaMetadataProfileFieldListResponse' => 'Kaltura_Client_Metadata_Type_MetadataProfileFieldListResponse',
		'KalturaMetadataProfileFilter' => 'Kaltura_Client_Metadata_Type_MetadataProfileFilter',
		'KalturaMetadataProfileListResponse' => 'Kaltura_Client_Metadata_Type_MetadataProfileListResponse',
		'KalturaMixEntry' => 'Kaltura_Client_Type_MixEntry',
		'KalturaMixEntryBaseFilter' => 'Kaltura_Client_Type_MixEntryBaseFilter',
		'KalturaMixEntryFilter' => 'Kaltura_Client_Type_MixEntryFilter',
		'KalturaOperationAttributes' => 'Kaltura_Client_Type_OperationAttributes',
		'KalturaPartner' => 'Kaltura_Client_Type_Partner',
		'KalturaPlayableEntry' => 'Kaltura_Client_Type_PlayableEntry',
		'KalturaPlayableEntryBaseFilter' => 'Kaltura_Client_Type_PlayableEntryBaseFilter',
		'KalturaPlayableEntryFilter' => 'Kaltura_Client_Type_PlayableEntryFilter',
		'KalturaPlayerDeliveryType' => 'Kaltura_Client_Type_PlayerDeliveryType',
		'KalturaPlayerEmbedCodeType' => 'Kaltura_Client_Type_PlayerEmbedCodeType',
		'KalturaPlaylist' => 'Kaltura_Client_Type_Playlist',
		'KalturaPlaylistBaseFilter' => 'Kaltura_Client_Type_PlaylistBaseFilter',
		'KalturaPlaylistFilter' => 'Kaltura_Client_Type_PlaylistFilter',
		'KalturaResource' => 'Kaltura_Client_Type_Resource',
		'KalturaSearchItem' => 'Kaltura_Client_Type_SearchItem',
		'KalturaUiConf' => 'Kaltura_Client_Type_UiConf',
		'KalturaUiConfBaseFilter' => 'Kaltura_Client_Type_UiConfBaseFilter',
		'KalturaUiConfFilter' => 'Kaltura_Client_Type_UiConfFilter',
		'KalturaUiConfListResponse' => 'Kaltura_Client_Type_UiConfListResponse',
	);
	
	public static function getZendType($kalturaType)
	{
		if(isset(self::$map[$kalturaType]))
			return self::$map[$kalturaType];
		return null;
	}
}
