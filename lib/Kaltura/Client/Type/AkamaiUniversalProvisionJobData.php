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
// Copyright (C) 2006-2011  Kaltura Inc.
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
class Kaltura_Client_Type_AkamaiUniversalProvisionJobData extends Kaltura_Client_Type_ProvisionJobData
{
	public function getKalturaObjectType()
	{
		return 'KalturaAkamaiUniversalProvisionJobData';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->streamId))
			$this->streamId = (int)$xml->streamId;
		$this->systemUserName = (string)$xml->systemUserName;
		$this->systemPassword = (string)$xml->systemPassword;
		$this->domainName = (string)$xml->domainName;
		if(count($xml->dvrEnabled))
			$this->dvrEnabled = (int)$xml->dvrEnabled;
		if(count($xml->dvrWindow))
			$this->dvrWindow = (int)$xml->dvrWindow;
		$this->primaryContact = (string)$xml->primaryContact;
		$this->secondaryContact = (string)$xml->secondaryContact;
		$this->streamType = (string)$xml->streamType;
		$this->notificationEmail = (string)$xml->notificationEmail;
	}
	/**
	 * 
	 *
	 * @var int
	 */
	public $streamId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemUserName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemPassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $domainName = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_DVRStatus
	 */
	public $dvrEnabled = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $dvrWindow = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $primaryContact = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $secondaryContact = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_AkamaiUniversalStreamType
	 */
	public $streamType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationEmail = null;


}

