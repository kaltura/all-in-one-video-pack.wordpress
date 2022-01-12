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
abstract class Kaltura_Client_Type_BaseEntryBaseFilter extends Kaltura_Client_Type_RelatedFilter
{
	public function getKalturaObjectType()
	{
		return 'KalturaBaseEntryBaseFilter';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->idEqual))
			$this->idEqual = (string)$xml->idEqual;
		if(count($xml->idIn))
			$this->idIn = (string)$xml->idIn;
		if(count($xml->idNotIn))
			$this->idNotIn = (string)$xml->idNotIn;
		if(count($xml->nameLike))
			$this->nameLike = (string)$xml->nameLike;
		if(count($xml->nameMultiLikeOr))
			$this->nameMultiLikeOr = (string)$xml->nameMultiLikeOr;
		if(count($xml->nameMultiLikeAnd))
			$this->nameMultiLikeAnd = (string)$xml->nameMultiLikeAnd;
		if(count($xml->nameEqual))
			$this->nameEqual = (string)$xml->nameEqual;
		if(count($xml->partnerIdEqual))
			$this->partnerIdEqual = (int)$xml->partnerIdEqual;
		if(count($xml->partnerIdIn))
			$this->partnerIdIn = (string)$xml->partnerIdIn;
		if(count($xml->userIdEqual))
			$this->userIdEqual = (string)$xml->userIdEqual;
		if(count($xml->userIdIn))
			$this->userIdIn = (string)$xml->userIdIn;
		if(count($xml->userIdNotIn))
			$this->userIdNotIn = (string)$xml->userIdNotIn;
		if(count($xml->creatorIdEqual))
			$this->creatorIdEqual = (string)$xml->creatorIdEqual;
		if(count($xml->tagsLike))
			$this->tagsLike = (string)$xml->tagsLike;
		if(count($xml->tagsMultiLikeOr))
			$this->tagsMultiLikeOr = (string)$xml->tagsMultiLikeOr;
		if(count($xml->tagsMultiLikeAnd))
			$this->tagsMultiLikeAnd = (string)$xml->tagsMultiLikeAnd;
		if(count($xml->adminTagsLike))
			$this->adminTagsLike = (string)$xml->adminTagsLike;
		if(count($xml->adminTagsMultiLikeOr))
			$this->adminTagsMultiLikeOr = (string)$xml->adminTagsMultiLikeOr;
		if(count($xml->adminTagsMultiLikeAnd))
			$this->adminTagsMultiLikeAnd = (string)$xml->adminTagsMultiLikeAnd;
		if(count($xml->categoriesMatchAnd))
			$this->categoriesMatchAnd = (string)$xml->categoriesMatchAnd;
		if(count($xml->categoriesMatchOr))
			$this->categoriesMatchOr = (string)$xml->categoriesMatchOr;
		if(count($xml->categoriesNotContains))
			$this->categoriesNotContains = (string)$xml->categoriesNotContains;
		if(count($xml->categoriesIdsMatchAnd))
			$this->categoriesIdsMatchAnd = (string)$xml->categoriesIdsMatchAnd;
		if(count($xml->categoriesIdsMatchOr))
			$this->categoriesIdsMatchOr = (string)$xml->categoriesIdsMatchOr;
		if(count($xml->categoriesIdsNotContains))
			$this->categoriesIdsNotContains = (string)$xml->categoriesIdsNotContains;
		if(count($xml->categoriesIdsEmpty))
			$this->categoriesIdsEmpty = (int)$xml->categoriesIdsEmpty;
		if(count($xml->statusEqual))
			$this->statusEqual = (string)$xml->statusEqual;
		if(count($xml->statusNotEqual))
			$this->statusNotEqual = (string)$xml->statusNotEqual;
		if(count($xml->statusIn))
			$this->statusIn = (string)$xml->statusIn;
		if(count($xml->statusNotIn))
			$this->statusNotIn = (string)$xml->statusNotIn;
		if(count($xml->moderationStatusEqual))
			$this->moderationStatusEqual = (int)$xml->moderationStatusEqual;
		if(count($xml->moderationStatusNotEqual))
			$this->moderationStatusNotEqual = (int)$xml->moderationStatusNotEqual;
		if(count($xml->moderationStatusIn))
			$this->moderationStatusIn = (string)$xml->moderationStatusIn;
		if(count($xml->moderationStatusNotIn))
			$this->moderationStatusNotIn = (string)$xml->moderationStatusNotIn;
		if(count($xml->typeEqual))
			$this->typeEqual = (string)$xml->typeEqual;
		if(count($xml->typeIn))
			$this->typeIn = (string)$xml->typeIn;
		if(count($xml->createdAtGreaterThanOrEqual))
			$this->createdAtGreaterThanOrEqual = (int)$xml->createdAtGreaterThanOrEqual;
		if(count($xml->createdAtLessThanOrEqual))
			$this->createdAtLessThanOrEqual = (int)$xml->createdAtLessThanOrEqual;
		if(count($xml->updatedAtGreaterThanOrEqual))
			$this->updatedAtGreaterThanOrEqual = (int)$xml->updatedAtGreaterThanOrEqual;
		if(count($xml->updatedAtLessThanOrEqual))
			$this->updatedAtLessThanOrEqual = (int)$xml->updatedAtLessThanOrEqual;
		if(count($xml->rankLessThanOrEqual))
			$this->rankLessThanOrEqual = (float)$xml->rankLessThanOrEqual;
		if(count($xml->rankGreaterThanOrEqual))
			$this->rankGreaterThanOrEqual = (float)$xml->rankGreaterThanOrEqual;
		if(count($xml->totalRankLessThanOrEqual))
			$this->totalRankLessThanOrEqual = (int)$xml->totalRankLessThanOrEqual;
		if(count($xml->totalRankGreaterThanOrEqual))
			$this->totalRankGreaterThanOrEqual = (int)$xml->totalRankGreaterThanOrEqual;
		if(count($xml->groupIdEqual))
			$this->groupIdEqual = (int)$xml->groupIdEqual;
		if(count($xml->searchTextMatchAnd))
			$this->searchTextMatchAnd = (string)$xml->searchTextMatchAnd;
		if(count($xml->searchTextMatchOr))
			$this->searchTextMatchOr = (string)$xml->searchTextMatchOr;
		if(count($xml->accessControlIdEqual))
			$this->accessControlIdEqual = (int)$xml->accessControlIdEqual;
		if(count($xml->accessControlIdIn))
			$this->accessControlIdIn = (string)$xml->accessControlIdIn;
		if(count($xml->startDateGreaterThanOrEqual))
			$this->startDateGreaterThanOrEqual = (int)$xml->startDateGreaterThanOrEqual;
		if(count($xml->startDateLessThanOrEqual))
			$this->startDateLessThanOrEqual = (int)$xml->startDateLessThanOrEqual;
		if(count($xml->startDateGreaterThanOrEqualOrNull))
			$this->startDateGreaterThanOrEqualOrNull = (int)$xml->startDateGreaterThanOrEqualOrNull;
		if(count($xml->startDateLessThanOrEqualOrNull))
			$this->startDateLessThanOrEqualOrNull = (int)$xml->startDateLessThanOrEqualOrNull;
		if(count($xml->endDateGreaterThanOrEqual))
			$this->endDateGreaterThanOrEqual = (int)$xml->endDateGreaterThanOrEqual;
		if(count($xml->endDateLessThanOrEqual))
			$this->endDateLessThanOrEqual = (int)$xml->endDateLessThanOrEqual;
		if(count($xml->endDateGreaterThanOrEqualOrNull))
			$this->endDateGreaterThanOrEqualOrNull = (int)$xml->endDateGreaterThanOrEqualOrNull;
		if(count($xml->endDateLessThanOrEqualOrNull))
			$this->endDateLessThanOrEqualOrNull = (int)$xml->endDateLessThanOrEqualOrNull;
		if(count($xml->referenceIdEqual))
			$this->referenceIdEqual = (string)$xml->referenceIdEqual;
		if(count($xml->referenceIdIn))
			$this->referenceIdIn = (string)$xml->referenceIdIn;
		if(count($xml->replacingEntryIdEqual))
			$this->replacingEntryIdEqual = (string)$xml->replacingEntryIdEqual;
		if(count($xml->replacingEntryIdIn))
			$this->replacingEntryIdIn = (string)$xml->replacingEntryIdIn;
		if(count($xml->replacedEntryIdEqual))
			$this->replacedEntryIdEqual = (string)$xml->replacedEntryIdEqual;
		if(count($xml->replacedEntryIdIn))
			$this->replacedEntryIdIn = (string)$xml->replacedEntryIdIn;
		if(count($xml->replacementStatusEqual))
			$this->replacementStatusEqual = (string)$xml->replacementStatusEqual;
		if(count($xml->replacementStatusIn))
			$this->replacementStatusIn = (string)$xml->replacementStatusIn;
		if(count($xml->partnerSortValueGreaterThanOrEqual))
			$this->partnerSortValueGreaterThanOrEqual = (int)$xml->partnerSortValueGreaterThanOrEqual;
		if(count($xml->partnerSortValueLessThanOrEqual))
			$this->partnerSortValueLessThanOrEqual = (int)$xml->partnerSortValueLessThanOrEqual;
		if(count($xml->rootEntryIdEqual))
			$this->rootEntryIdEqual = (string)$xml->rootEntryIdEqual;
		if(count($xml->rootEntryIdIn))
			$this->rootEntryIdIn = (string)$xml->rootEntryIdIn;
		if(count($xml->parentEntryIdEqual))
			$this->parentEntryIdEqual = (string)$xml->parentEntryIdEqual;
		if(count($xml->entitledUsersEditMatchAnd))
			$this->entitledUsersEditMatchAnd = (string)$xml->entitledUsersEditMatchAnd;
		if(count($xml->entitledUsersEditMatchOr))
			$this->entitledUsersEditMatchOr = (string)$xml->entitledUsersEditMatchOr;
		if(count($xml->entitledUsersPublishMatchAnd))
			$this->entitledUsersPublishMatchAnd = (string)$xml->entitledUsersPublishMatchAnd;
		if(count($xml->entitledUsersPublishMatchOr))
			$this->entitledUsersPublishMatchOr = (string)$xml->entitledUsersPublishMatchOr;
		if(count($xml->entitledUsersViewMatchAnd))
			$this->entitledUsersViewMatchAnd = (string)$xml->entitledUsersViewMatchAnd;
		if(count($xml->entitledUsersViewMatchOr))
			$this->entitledUsersViewMatchOr = (string)$xml->entitledUsersViewMatchOr;
		if(count($xml->tagsNameMultiLikeOr))
			$this->tagsNameMultiLikeOr = (string)$xml->tagsNameMultiLikeOr;
		if(count($xml->tagsAdminTagsMultiLikeOr))
			$this->tagsAdminTagsMultiLikeOr = (string)$xml->tagsAdminTagsMultiLikeOr;
		if(count($xml->tagsAdminTagsNameMultiLikeOr))
			$this->tagsAdminTagsNameMultiLikeOr = (string)$xml->tagsAdminTagsNameMultiLikeOr;
		if(count($xml->tagsNameMultiLikeAnd))
			$this->tagsNameMultiLikeAnd = (string)$xml->tagsNameMultiLikeAnd;
		if(count($xml->tagsAdminTagsMultiLikeAnd))
			$this->tagsAdminTagsMultiLikeAnd = (string)$xml->tagsAdminTagsMultiLikeAnd;
		if(count($xml->tagsAdminTagsNameMultiLikeAnd))
			$this->tagsAdminTagsNameMultiLikeAnd = (string)$xml->tagsAdminTagsNameMultiLikeAnd;
	}
	/**
	 * This filter should be in use for retrieving only a specific entry (identified by its entryId).
	 *
	 * @var string
	 */
	public $idEqual = null;

	/**
	 * This filter should be in use for retrieving few specific entries (string should include comma separated list of entryId strings).
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idNotIn = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry names (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $nameLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $nameMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $nameMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving entries with a specific name.
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * This filter should be in use for retrieving only entries which were uploaded by/assigned to users of a specific Kaltura Partner (identified by Partner ID).
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * This filter should be in use for retrieving only entries within Kaltura network which were uploaded by/assigned to users of few Kaltura Partners  (string should include comma separated list of PartnerIDs)
	 *
	 * @var string
	 */
	public $partnerIdIn = null;

	/**
	 * This filter parameter should be in use for retrieving only entries, uploaded by/assigned to a specific user (identified by user Id).
	 *
	 * @var string
	 */
	public $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userIdNotIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $creatorIdEqual = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $tagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags set by an ADMIN user (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $adminTagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $adminTagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 *
	 * @var string
	 */
	public $adminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesMatchAnd = null;

	/**
	 * All entries within these categories or their child categories.
	 *
	 * @var string
	 */
	public $categoriesMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesNotContains = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesIdsMatchAnd = null;

	/**
	 * All entries of the categories, excluding their child categories.
	 * 	 To include entries of the child categories, use categoryAncestorIdIn, or categoriesMatchOr.
	 *
	 * @var string
	 */
	public $categoriesIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesIdsNotContains = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $categoriesIdsEmpty = null;

	/**
	 * This filter should be in use for retrieving only entries, at a specific {
	 *
	 * @var Kaltura_Client_Enum_EntryStatus
	 */
	public $statusEqual = null;

	/**
	 * This filter should be in use for retrieving only entries, not at a specific {
	 *
	 * @var Kaltura_Client_Enum_EntryStatus
	 */
	public $statusNotEqual = null;

	/**
	 * This filter should be in use for retrieving only entries, at few specific {
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * This filter should be in use for retrieving only entries, not at few specific {
	 *
	 * @var string
	 */
	public $statusNotIn = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_EntryModerationStatus
	 */
	public $moderationStatusEqual = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_EntryModerationStatus
	 */
	public $moderationStatusNotEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $moderationStatusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $moderationStatusNotIn = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_EntryType
	 */
	public $typeEqual = null;

	/**
	 * This filter should be in use for retrieving entries of few {
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * This filter parameter should be in use for retrieving only entries which were created at Kaltura system after a specific time/date (standard timestamp format).
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * This filter parameter should be in use for retrieving only entries which were created at Kaltura system before a specific time/date (standard timestamp format).
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $rankLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $rankGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $totalRankLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $totalRankGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $groupIdEqual = null;

	/**
	 * This filter should be in use for retrieving specific entries while search match the input string within all of the following metadata attributes: name, description, tags, adminTags.
	 *
	 * @var string
	 */
	public $searchTextMatchAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries while search match the input string within at least one of the following metadata attributes: name, description, tags, adminTags.
	 *
	 * @var string
	 */
	public $searchTextMatchOr = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $accessControlIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $accessControlIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateLessThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateGreaterThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateLessThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $referenceIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $referenceIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacingEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacingEntryIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacedEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacedEntryIdIn = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_EntryReplacementStatus
	 */
	public $replacementStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacementStatusIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValueGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValueLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rootEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rootEntryIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parentEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersEditMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersEditMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersPublishMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersPublishMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersViewMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersViewMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsNameMultiLikeAnd = null;


}

