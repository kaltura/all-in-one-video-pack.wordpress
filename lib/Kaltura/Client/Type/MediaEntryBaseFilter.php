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
abstract class Kaltura_Client_Type_MediaEntryBaseFilter extends Kaltura_Client_Type_PlayableEntryFilter
{
	public function getKalturaObjectType()
	{
		return 'KalturaMediaEntryBaseFilter';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->mediaTypeEqual))
			$this->mediaTypeEqual = (int)$xml->mediaTypeEqual;
		if(count($xml->mediaTypeIn))
			$this->mediaTypeIn = (string)$xml->mediaTypeIn;
		if(count($xml->sourceTypeEqual))
			$this->sourceTypeEqual = (string)$xml->sourceTypeEqual;
		if(count($xml->sourceTypeNotEqual))
			$this->sourceTypeNotEqual = (string)$xml->sourceTypeNotEqual;
		if(count($xml->sourceTypeIn))
			$this->sourceTypeIn = (string)$xml->sourceTypeIn;
		if(count($xml->sourceTypeNotIn))
			$this->sourceTypeNotIn = (string)$xml->sourceTypeNotIn;
		if(count($xml->mediaDateGreaterThanOrEqual))
			$this->mediaDateGreaterThanOrEqual = (int)$xml->mediaDateGreaterThanOrEqual;
		if(count($xml->mediaDateLessThanOrEqual))
			$this->mediaDateLessThanOrEqual = (int)$xml->mediaDateLessThanOrEqual;
		if(count($xml->flavorParamsIdsMatchOr))
			$this->flavorParamsIdsMatchOr = (string)$xml->flavorParamsIdsMatchOr;
		if(count($xml->flavorParamsIdsMatchAnd))
			$this->flavorParamsIdsMatchAnd = (string)$xml->flavorParamsIdsMatchAnd;
	}
	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_MediaType
	 */
	public $mediaTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mediaTypeIn = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_SourceType
	 */
	public $sourceTypeEqual = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_SourceType
	 */
	public $sourceTypeNotEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sourceTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sourceTypeNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mediaDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mediaDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsIdsMatchAnd = null;


}

