<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platforms allow them to do with
// text.
//
// Copyright (C) 2006-2021  Kaltura Inc.
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
class Kaltura_Client_Type_BaseEntry extends Kaltura_Client_ObjectBase
{
	public function getKalturaObjectType()
	{
		return 'KalturaBaseEntry';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->id))
			$this->id = (string)$xml->id;
		if(count($xml->name))
			$this->name = (string)$xml->name;
		if(count($xml->description))
			$this->description = (string)$xml->description;
		if(count($xml->partnerId))
			$this->partnerId = (int)$xml->partnerId;
		if(count($xml->userId))
			$this->userId = (string)$xml->userId;
		if(count($xml->creatorId))
			$this->creatorId = (string)$xml->creatorId;
		if(count($xml->tags))
			$this->tags = (string)$xml->tags;
		if(count($xml->adminTags))
			$this->adminTags = (string)$xml->adminTags;
		if(count($xml->categories))
			$this->categories = (string)$xml->categories;
		if(count($xml->categoriesIds))
			$this->categoriesIds = (string)$xml->categoriesIds;
		if(count($xml->status))
			$this->status = (string)$xml->status;
		if(count($xml->moderationStatus))
			$this->moderationStatus = (int)$xml->moderationStatus;
		if(count($xml->moderationCount))
			$this->moderationCount = (int)$xml->moderationCount;
		if(count($xml->type))
			$this->type = (string)$xml->type;
		if(count($xml->createdAt))
			$this->createdAt = (int)$xml->createdAt;
		if(count($xml->updatedAt))
			$this->updatedAt = (int)$xml->updatedAt;
		if(count($xml->rank))
			$this->rank = (float)$xml->rank;
		if(count($xml->totalRank))
			$this->totalRank = (int)$xml->totalRank;
		if(count($xml->votes))
			$this->votes = (int)$xml->votes;
		if(count($xml->groupId))
			$this->groupId = (int)$xml->groupId;
		if(count($xml->partnerData))
			$this->partnerData = (string)$xml->partnerData;
		if(count($xml->downloadUrl))
			$this->downloadUrl = (string)$xml->downloadUrl;
		if(count($xml->searchText))
			$this->searchText = (string)$xml->searchText;
		if(count($xml->licenseType))
			$this->licenseType = (int)$xml->licenseType;
		if(count($xml->version))
			$this->version = (int)$xml->version;
		if(count($xml->thumbnailUrl))
			$this->thumbnailUrl = (string)$xml->thumbnailUrl;
		if(count($xml->accessControlId))
			$this->accessControlId = (int)$xml->accessControlId;
		if(count($xml->startDate))
			$this->startDate = (int)$xml->startDate;
		if(count($xml->endDate))
			$this->endDate = (int)$xml->endDate;
		if(count($xml->referenceId))
			$this->referenceId = (string)$xml->referenceId;
		if(count($xml->replacingEntryId))
			$this->replacingEntryId = (string)$xml->replacingEntryId;
		if(count($xml->replacedEntryId))
			$this->replacedEntryId = (string)$xml->replacedEntryId;
		if(count($xml->replacementStatus))
			$this->replacementStatus = (string)$xml->replacementStatus;
		if(count($xml->partnerSortValue))
			$this->partnerSortValue = (int)$xml->partnerSortValue;
		if(count($xml->conversionProfileId))
			$this->conversionProfileId = (int)$xml->conversionProfileId;
		if(count($xml->redirectEntryId))
			$this->redirectEntryId = (string)$xml->redirectEntryId;
		if(count($xml->rootEntryId))
			$this->rootEntryId = (string)$xml->rootEntryId;
		if(count($xml->parentEntryId))
			$this->parentEntryId = (string)$xml->parentEntryId;
		if(count($xml->operationAttributes))
		{
			if(empty($xml->operationAttributes))
				$this->operationAttributes = array();
			else
				$this->operationAttributes = Kaltura_Client_ParseUtils::unmarshalArray($xml->operationAttributes, "KalturaOperationAttributes");
		}
		if(count($xml->entitledUsersEdit))
			$this->entitledUsersEdit = (string)$xml->entitledUsersEdit;
		if(count($xml->entitledUsersPublish))
			$this->entitledUsersPublish = (string)$xml->entitledUsersPublish;
		if(count($xml->entitledUsersView))
			$this->entitledUsersView = (string)$xml->entitledUsersView;
		if(count($xml->capabilities))
			$this->capabilities = (string)$xml->capabilities;
		if(count($xml->templateEntryId))
			$this->templateEntryId = (string)$xml->templateEntryId;
		if(count($xml->displayInSearch))
			$this->displayInSearch = (int)$xml->displayInSearch;
		if(count($xml->application))
			$this->application = (string)$xml->application;
		if(count($xml->applicationVersion))
			$this->applicationVersion = (string)$xml->applicationVersion;
		if(count($xml->blockAutoTranscript))
		{
			if(!empty($xml->blockAutoTranscript) && ((int) $xml->blockAutoTranscript === 1 || strtolower((string)$xml->blockAutoTranscript) === 'true'))
				$this->blockAutoTranscript = true;
			else
				$this->blockAutoTranscript = false;
		}
	}
	/**
	 * Auto generated 10 characters alphanumeric string
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Entry name (Min 1 chars)
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Entry description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * The ID of the user who is the owner of this entry
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * The ID of the user who created this entry
	 *
	 * @var string
	 * @insertonly
	 */
	public $creatorId = null;

	/**
	 * Entry tags
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators
	 *
	 * @var string
	 */
	public $adminTags = null;

	/**
	 * Comma separated list of full names of categories to which this entry belongs. Only categories that don't have entitlement (privacy context) are listed, to retrieve the full list of categories, use the categoryEntry.list action.
	 *
	 * @var string
	 */
	public $categories = null;

	/**
	 * Comma separated list of ids of categories to which this entry belongs. Only categories that don't have entitlement (privacy context) are listed, to retrieve the full list of categories, use the categoryEntry.list action.
	 *
	 * @var string
	 */
	public $categoriesIds = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_EntryStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Entry moderation status
	 *
	 * @var Kaltura_Client_Enum_EntryModerationStatus
	 * @readonly
	 */
	public $moderationStatus = null;

	/**
	 * Number of moderation requests waiting for this entry
	 *
	 * @var int
	 * @readonly
	 */
	public $moderationCount = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 *
	 * @var Kaltura_Client_Enum_EntryType
	 */
	public $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Entry update date as Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * The calculated average rank. rank = totalRank / votes
	 *
	 * @var float
	 * @readonly
	 */
	public $rank = null;

	/**
	 * The sum of all rank values submitted to the baseEntry.anonymousRank action
	 *
	 * @var int
	 * @readonly
	 */
	public $totalRank = null;

	/**
	 * A count of all requests made to the baseEntry.anonymousRank action
	 *
	 * @var int
	 * @readonly
	 */
	public $votes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $groupId = null;

	/**
	 * Can be used to store various partner related data as a string
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * Download URL for the entry
	 *
	 * @var string
	 * @readonly
	 */
	public $downloadUrl = null;

	/**
	 * Indexed search text for full text search
	 *
	 * @var string
	 * @readonly
	 */
	public $searchText = null;

	/**
	 * License type used for this entry
	 *
	 * @var Kaltura_Client_Enum_LicenseType
	 */
	public $licenseType = null;

	/**
	 * Version of the entry data
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

	/**
	 * Thumbnail URL
	 *
	 * @var string
	 * @readonly
	 */
	public $thumbnailUrl = null;

	/**
	 * The Access Control ID assigned to this entry (null when not set, send -1 to remove)
	 *
	 * @var int
	 */
	public $accessControlId = null;

	/**
	 * Entry scheduling start date (null when not set, send -1 to remove)
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * Entry scheduling end date (null when not set, send -1 to remove)
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * Entry external reference id
	 *
	 * @var string
	 */
	public $referenceId = null;

	/**
	 * ID of temporary entry that will replace this entry when it's approved and ready for replacement
	 *
	 * @var string
	 * @readonly
	 */
	public $replacingEntryId = null;

	/**
	 * ID of the entry that will be replaced when the replacement approved and this entry is ready
	 *
	 * @var string
	 * @readonly
	 */
	public $replacedEntryId = null;

	/**
	 * Status of the replacement readiness and approval
	 *
	 * @var Kaltura_Client_Enum_EntryReplacementStatus
	 * @readonly
	 */
	public $replacementStatus = null;

	/**
	 * Can be used to store various partner related data as a numeric value
	 *
	 * @var int
	 */
	public $partnerSortValue = null;

	/**
	 * Override the default ingestion profile
	 *
	 * @var int
	 */
	public $conversionProfileId = null;

	/**
	 * IF not empty, points to an entry ID the should replace this current entry's id.
	 *
	 * @var string
	 */
	public $redirectEntryId = null;

	/**
	 * ID of source root entry, used for clipped, skipped and cropped entries that created from another entry
	 *
	 * @var string
	 * @readonly
	 */
	public $rootEntryId = null;

	/**
	 * ID of source root entry, used for defining entires association
	 *
	 * @var string
	 */
	public $parentEntryId = null;

	/**
	 * clipping, skipping and cropping attributes that used to create this entry
	 *
	 * @var array of KalturaOperationAttributes
	 */
	public $operationAttributes;

	/**
	 * list of user ids that are entitled to edit the entry (no server enforcement) The difference between entitledUsersEdit, entitledUsersPublish and entitledUsersView is applicative only
	 *
	 * @var string
	 */
	public $entitledUsersEdit = null;

	/**
	 * list of user ids that are entitled to publish the entry (no server enforcement) The difference between entitledUsersEdit, entitledUsersPublish and entitledUsersView is applicative only
	 *
	 * @var string
	 */
	public $entitledUsersPublish = null;

	/**
	 * list of user ids that are entitled to view the entry (no server enforcement) The difference between entitledUsersEdit, entitledUsersPublish and entitledUsersView is applicative only
	 *
	 * @var string
	 */
	public $entitledUsersView = null;

	/**
	 * Comma seperated string of the capabilities of the entry. Any capability needed can be added to this list.
	 *
	 * @var string
	 * @readonly
	 */
	public $capabilities = null;

	/**
	 * Template entry id
	 *
	 * @var string
	 * @insertonly
	 */
	public $templateEntryId = null;

	/**
	 * should we display this entry in search
	 *
	 * @var Kaltura_Client_Enum_EntryDisplayInSearchType
	 */
	public $displayInSearch = null;

	/**
	 * Entry application
	 *
	 * @var Kaltura_Client_Enum_EntryApplication
	 * @insertonly
	 */
	public $application = null;

	/**
	 * Entry application version
	 *
	 * @var string
	 * @insertonly
	 */
	public $applicationVersion = null;

	/**
	 * Block auto transcript on Entry
	 *
	 * @var bool
	 */
	public $blockAutoTranscript = null;


}

