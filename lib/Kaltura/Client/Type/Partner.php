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
class Kaltura_Client_Type_Partner extends Kaltura_Client_ObjectBase
{
	public function getKalturaObjectType()
	{
		return 'KalturaPartner';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->id))
			$this->id = (int)$xml->id;
		if(count($xml->name))
			$this->name = (string)$xml->name;
		if(count($xml->website))
			$this->website = (string)$xml->website;
		if(count($xml->notificationUrl))
			$this->notificationUrl = (string)$xml->notificationUrl;
		if(count($xml->appearInSearch))
			$this->appearInSearch = (int)$xml->appearInSearch;
		if(count($xml->createdAt))
			$this->createdAt = (int)$xml->createdAt;
		if(count($xml->adminName))
			$this->adminName = (string)$xml->adminName;
		if(count($xml->adminEmail))
			$this->adminEmail = (string)$xml->adminEmail;
		if(count($xml->description))
			$this->description = (string)$xml->description;
		if(count($xml->commercialUse))
			$this->commercialUse = (int)$xml->commercialUse;
		if(count($xml->landingPage))
			$this->landingPage = (string)$xml->landingPage;
		if(count($xml->userLandingPage))
			$this->userLandingPage = (string)$xml->userLandingPage;
		if(count($xml->contentCategories))
			$this->contentCategories = (string)$xml->contentCategories;
		if(count($xml->type))
			$this->type = (int)$xml->type;
		if(count($xml->phone))
			$this->phone = (string)$xml->phone;
		if(count($xml->describeYourself))
			$this->describeYourself = (string)$xml->describeYourself;
		if(count($xml->adultContent))
		{
			if(!empty($xml->adultContent) && ((int) $xml->adultContent === 1 || strtolower((string)$xml->adultContent) === 'true'))
				$this->adultContent = true;
			else
				$this->adultContent = false;
		}
		if(count($xml->defConversionProfileType))
			$this->defConversionProfileType = (string)$xml->defConversionProfileType;
		if(count($xml->notify))
			$this->notify = (int)$xml->notify;
		if(count($xml->status))
			$this->status = (int)$xml->status;
		if(count($xml->allowQuickEdit))
			$this->allowQuickEdit = (int)$xml->allowQuickEdit;
		if(count($xml->mergeEntryLists))
			$this->mergeEntryLists = (int)$xml->mergeEntryLists;
		if(count($xml->notificationsConfig))
			$this->notificationsConfig = (string)$xml->notificationsConfig;
		if(count($xml->allowedFromEmailWhiteList))
			$this->allowedFromEmailWhiteList = (string)$xml->allowedFromEmailWhiteList;
		if(count($xml->maxUploadSize))
			$this->maxUploadSize = (int)$xml->maxUploadSize;
		if(count($xml->partnerPackage))
			$this->partnerPackage = (int)$xml->partnerPackage;
		if(count($xml->secret))
			$this->secret = (string)$xml->secret;
		if(count($xml->adminSecret))
			$this->adminSecret = (string)$xml->adminSecret;
		if(count($xml->cmsPassword))
			$this->cmsPassword = (string)$xml->cmsPassword;
		if(count($xml->allowMultiNotification))
			$this->allowMultiNotification = (int)$xml->allowMultiNotification;
		if(count($xml->adminLoginUsersQuota))
			$this->adminLoginUsersQuota = (int)$xml->adminLoginUsersQuota;
		if(count($xml->adminUserId))
			$this->adminUserId = (string)$xml->adminUserId;
		if(count($xml->firstName))
			$this->firstName = (string)$xml->firstName;
		if(count($xml->lastName))
			$this->lastName = (string)$xml->lastName;
		if(count($xml->country))
			$this->country = (string)$xml->country;
		if(count($xml->state))
			$this->state = (string)$xml->state;
		if(count($xml->additionalParams))
		{
			if(empty($xml->additionalParams))
				$this->additionalParams = array();
			else
				$this->additionalParams = Kaltura_Client_ParseUtils::unmarshalArray($xml->additionalParams, "KalturaKeyValue");
		}
		if(count($xml->publishersQuota))
			$this->publishersQuota = (int)$xml->publishersQuota;
		if(count($xml->partnerGroupType))
			$this->partnerGroupType = (int)$xml->partnerGroupType;
		if(count($xml->defaultEntitlementEnforcement))
		{
			if(!empty($xml->defaultEntitlementEnforcement) && ((int) $xml->defaultEntitlementEnforcement === 1 || strtolower((string)$xml->defaultEntitlementEnforcement) === 'true'))
				$this->defaultEntitlementEnforcement = true;
			else
				$this->defaultEntitlementEnforcement = false;
		}
		if(count($xml->defaultDeliveryType))
			$this->defaultDeliveryType = (string)$xml->defaultDeliveryType;
		if(count($xml->defaultEmbedCodeType))
			$this->defaultEmbedCodeType = (string)$xml->defaultEmbedCodeType;
		if(count($xml->deliveryTypes))
		{
			if(empty($xml->deliveryTypes))
				$this->deliveryTypes = array();
			else
				$this->deliveryTypes = Kaltura_Client_ParseUtils::unmarshalArray($xml->deliveryTypes, "KalturaPlayerDeliveryType");
		}
		if(count($xml->embedCodeTypes))
		{
			if(empty($xml->embedCodeTypes))
				$this->embedCodeTypes = array();
			else
				$this->embedCodeTypes = Kaltura_Client_ParseUtils::unmarshalArray($xml->embedCodeTypes, "KalturaPlayerEmbedCodeType");
		}
		if(count($xml->templatePartnerId))
			$this->templatePartnerId = (int)$xml->templatePartnerId;
		if(count($xml->ignoreSeoLinks))
		{
			if(!empty($xml->ignoreSeoLinks) && ((int) $xml->ignoreSeoLinks === 1 || strtolower((string)$xml->ignoreSeoLinks) === 'true'))
				$this->ignoreSeoLinks = true;
			else
				$this->ignoreSeoLinks = false;
		}
		if(count($xml->blockDirectLogin))
		{
			if(!empty($xml->blockDirectLogin) && ((int) $xml->blockDirectLogin === 1 || strtolower((string)$xml->blockDirectLogin) === 'true'))
				$this->blockDirectLogin = true;
			else
				$this->blockDirectLogin = false;
		}
		if(count($xml->host))
			$this->host = (string)$xml->host;
		if(count($xml->cdnHost))
			$this->cdnHost = (string)$xml->cdnHost;
		if(count($xml->isFirstLogin))
		{
			if(!empty($xml->isFirstLogin) && ((int) $xml->isFirstLogin === 1 || strtolower((string)$xml->isFirstLogin) === 'true'))
				$this->isFirstLogin = true;
			else
				$this->isFirstLogin = false;
		}
		if(count($xml->logoutUrl))
			$this->logoutUrl = (string)$xml->logoutUrl;
		if(count($xml->partnerParentId))
			$this->partnerParentId = (int)$xml->partnerParentId;
		if(count($xml->crmId))
			$this->crmId = (string)$xml->crmId;
		if(count($xml->referenceId))
			$this->referenceId = (string)$xml->referenceId;
		if(count($xml->timeAlignedRenditions))
		{
			if(!empty($xml->timeAlignedRenditions) && ((int) $xml->timeAlignedRenditions === 1 || strtolower((string)$xml->timeAlignedRenditions) === 'true'))
				$this->timeAlignedRenditions = true;
			else
				$this->timeAlignedRenditions = false;
		}
		if(count($xml->publisherEnvironmentType))
			$this->publisherEnvironmentType = (int)$xml->publisherEnvironmentType;
		if(count($xml->ovpEnvironmentUrl))
			$this->ovpEnvironmentUrl = (string)$xml->ovpEnvironmentUrl;
		if(count($xml->ottEnvironmentUrl))
			$this->ottEnvironmentUrl = (string)$xml->ottEnvironmentUrl;
		if(count($xml->eSearchLanguages))
		{
			if(empty($xml->eSearchLanguages))
				$this->eSearchLanguages = array();
			else
				$this->eSearchLanguages = Kaltura_Client_ParseUtils::unmarshalArray($xml->eSearchLanguages, "KalturaESearchLanguageItem");
		}
		if(count($xml->authenticationType))
			$this->authenticationType = (int)$xml->authenticationType;
		if(count($xml->extendedFreeTrailExpiryReason))
			$this->extendedFreeTrailExpiryReason = (string)$xml->extendedFreeTrailExpiryReason;
		if(count($xml->extendedFreeTrailExpiryDate))
			$this->extendedFreeTrailExpiryDate = (int)$xml->extendedFreeTrailExpiryDate;
		if(count($xml->extendedFreeTrail))
			$this->extendedFreeTrail = (int)$xml->extendedFreeTrail;
		if(count($xml->extendedFreeTrailEndsWarning))
		{
			if(!empty($xml->extendedFreeTrailEndsWarning) && ((int) $xml->extendedFreeTrailEndsWarning === 1 || strtolower((string)$xml->extendedFreeTrailEndsWarning) === 'true'))
				$this->extendedFreeTrailEndsWarning = true;
			else
				$this->extendedFreeTrailEndsWarning = false;
		}
		if(count($xml->eightyPercentWarning))
			$this->eightyPercentWarning = (int)$xml->eightyPercentWarning;
		if(count($xml->usageLimitWarning))
			$this->usageLimitWarning = (int)$xml->usageLimitWarning;
		if(count($xml->lastFreeTrialNotificationDay))
			$this->lastFreeTrialNotificationDay = (int)$xml->lastFreeTrialNotificationDay;
		if(count($xml->monitorUsage))
			$this->monitorUsage = (int)$xml->monitorUsage;
		if(count($xml->passwordStructureValidations))
		{
			if(empty($xml->passwordStructureValidations))
				$this->passwordStructureValidations = array();
			else
				$this->passwordStructureValidations = Kaltura_Client_ParseUtils::unmarshalArray($xml->passwordStructureValidations, "KalturaRegexItem");
		}
		if(count($xml->passwordStructureValidationsDescription))
			$this->passwordStructureValidationsDescription = (string)$xml->passwordStructureValidationsDescription;
		if(count($xml->passReplaceFreq))
			$this->passReplaceFreq = (int)$xml->passReplaceFreq;
		if(count($xml->maxLoginAttempts))
			$this->maxLoginAttempts = (int)$xml->maxLoginAttempts;
		if(count($xml->loginBlockPeriod))
			$this->loginBlockPeriod = (int)$xml->loginBlockPeriod;
		if(count($xml->numPrevPassToKeep))
			$this->numPrevPassToKeep = (int)$xml->numPrevPassToKeep;
		if(count($xml->twoFactorAuthenticationMode))
			$this->twoFactorAuthenticationMode = (int)$xml->twoFactorAuthenticationMode;
		if(count($xml->isSelfServe))
		{
			if(!empty($xml->isSelfServe) && ((int) $xml->isSelfServe === 1 || strtolower((string)$xml->isSelfServe) === 'true'))
				$this->isSelfServe = true;
			else
				$this->isSelfServe = false;
		}
	}
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $website = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $appearInSearch = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * deprecated - lastName and firstName replaces this field
	 *
	 * @var string
	 */
	public $adminName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $adminEmail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_CommercialUseType
	 */
	public $commercialUse = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $landingPage = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userLandingPage = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $contentCategories = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_PartnerType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $phone = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $describeYourself = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $adultContent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defConversionProfileType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $notify = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_PartnerStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $allowQuickEdit = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mergeEntryLists = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationsConfig = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $allowedFromEmailWhiteList = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxUploadSize = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerPackage = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $secret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $adminSecret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $cmsPassword = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $allowMultiNotification = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $adminLoginUsersQuota = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $adminUserId = null;

	/**
	 * firstName and lastName replace the old (deprecated) adminName
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * lastName and firstName replace the old (deprecated) adminName
	 *
	 * @var string
	 */
	public $lastName = null;

	/**
	 * country code (2char) - this field is optional
	 *
	 * @var string
	 */
	public $country = null;

	/**
	 * state code (2char) - this field is optional
	 *
	 * @var string
	 */
	public $state = null;

	/**
	 * 
	 *
	 * @var array of KalturaKeyValue
	 */
	public $additionalParams;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $publishersQuota = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_PartnerGroupType
	 * @readonly
	 */
	public $partnerGroupType = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $defaultEntitlementEnforcement = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $defaultDeliveryType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $defaultEmbedCodeType = null;

	/**
	 * 
	 *
	 * @var array of KalturaPlayerDeliveryType
	 * @readonly
	 */
	public $deliveryTypes;

	/**
	 * 
	 *
	 * @var array of KalturaPlayerEmbedCodeType
	 * @readonly
	 */
	public $embedCodeTypes;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $templatePartnerId = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $ignoreSeoLinks = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $blockDirectLogin = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $host = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $cdnHost = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isFirstLogin = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $logoutUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerParentId = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $crmId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $referenceId = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $timeAlignedRenditions = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $publisherEnvironmentType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $ovpEnvironmentUrl = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $ottEnvironmentUrl = null;

	/**
	 * 
	 *
	 * @var array of KalturaESearchLanguageItem
	 */
	public $eSearchLanguages;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_PartnerAuthenticationType
	 * @readonly
	 */
	public $authenticationType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $extendedFreeTrailExpiryReason = null;

	/**
	 * Unix timestamp (In seconds)
	 *
	 * @var int
	 * @readonly
	 */
	public $extendedFreeTrailExpiryDate = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $extendedFreeTrail = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $extendedFreeTrailEndsWarning = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $eightyPercentWarning = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $usageLimitWarning = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $lastFreeTrialNotificationDay = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $monitorUsage = null;

	/**
	 * 
	 *
	 * @var array of KalturaRegexItem
	 */
	public $passwordStructureValidations;

	/**
	 * 
	 *
	 * @var string
	 */
	public $passwordStructureValidationsDescription = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $passReplaceFreq = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxLoginAttempts = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $loginBlockPeriod = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $numPrevPassToKeep = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_TwoFactorAuthenticationMode
	 * @readonly
	 */
	public $twoFactorAuthenticationMode = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isSelfServe = null;


}

