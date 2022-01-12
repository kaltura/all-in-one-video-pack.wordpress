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
class Kaltura_Client_Type_ClipAttributes extends Kaltura_Client_Type_OperationAttributes
{
	public function getKalturaObjectType()
	{
		return 'KalturaClipAttributes';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->offset))
			$this->offset = (int)$xml->offset;
		if(count($xml->duration))
			$this->duration = (int)$xml->duration;
		if(count($xml->globalOffsetInDestination))
			$this->globalOffsetInDestination = (int)$xml->globalOffsetInDestination;
		if(count($xml->effectArray))
		{
			if(empty($xml->effectArray))
				$this->effectArray = array();
			else
				$this->effectArray = Kaltura_Client_ParseUtils::unmarshalArray($xml->effectArray, "KalturaEffect");
		}
	}
	/**
	 * Offset in milliseconds
	 *
	 * @var int
	 */
	public $offset = null;

	/**
	 * Duration in milliseconds
	 *
	 * @var int
	 */
	public $duration = null;

	/**
	 * global Offset In Destination in milliseconds
	 *
	 * @var int
	 */
	public $globalOffsetInDestination = null;

	/**
	 * global Offset In Destination in milliseconds
	 *
	 * @var array of KalturaEffect
	 */
	public $effectArray;


}

