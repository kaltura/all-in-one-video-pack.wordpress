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
class Kaltura_Client_Type_ServerFileResource extends Kaltura_Client_Type_GenericDataCenterContentResource
{
	public function getKalturaObjectType()
	{
		return 'KalturaServerFileResource';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->localFilePath))
			$this->localFilePath = (string)$xml->localFilePath;
		if(count($xml->keepOriginalFile))
		{
			if(!empty($xml->keepOriginalFile) && ((int) $xml->keepOriginalFile === 1 || strtolower((string)$xml->keepOriginalFile) === 'true'))
				$this->keepOriginalFile = true;
			else
				$this->keepOriginalFile = false;
		}
	}
	/**
	 * Full path to the local file
	 *
	 * @var string
	 */
	public $localFilePath = null;

	/**
	 * Should keep original file (false = mv, true = cp)
	 *
	 * @var bool
	 */
	public $keepOriginalFile = null;


}

