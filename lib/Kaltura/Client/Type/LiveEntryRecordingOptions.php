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
class Kaltura_Client_Type_LiveEntryRecordingOptions extends Kaltura_Client_ObjectBase
{
	public function getKalturaObjectType()
	{
		return 'KalturaLiveEntryRecordingOptions';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->shouldCopyEntitlement))
			$this->shouldCopyEntitlement = (int)$xml->shouldCopyEntitlement;
		if(count($xml->shouldCopyScheduling))
			$this->shouldCopyScheduling = (int)$xml->shouldCopyScheduling;
		if(count($xml->shouldCopyThumbnail))
			$this->shouldCopyThumbnail = (int)$xml->shouldCopyThumbnail;
		if(count($xml->shouldMakeHidden))
			$this->shouldMakeHidden = (int)$xml->shouldMakeHidden;
		if(count($xml->shouldAutoArchive))
			$this->shouldAutoArchive = (int)$xml->shouldAutoArchive;
		if(count($xml->nonDeletedCuePointsTags))
			$this->nonDeletedCuePointsTags = (string)$xml->nonDeletedCuePointsTags;
		if(count($xml->archiveVodSuffixTimezone))
			$this->archiveVodSuffixTimezone = (string)$xml->archiveVodSuffixTimezone;
	}
	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $shouldCopyEntitlement = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $shouldCopyScheduling = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $shouldCopyThumbnail = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $shouldMakeHidden = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $shouldAutoArchive = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nonDeletedCuePointsTags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $archiveVodSuffixTimezone = null;


}

