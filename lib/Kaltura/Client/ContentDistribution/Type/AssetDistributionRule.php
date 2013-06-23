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
class Kaltura_Client_ContentDistribution_Type_AssetDistributionRule extends Kaltura_Client_ObjectBase
{
	public function getKalturaObjectType()
	{
		return 'KalturaAssetDistributionRule';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		$this->validationError = (string)$xml->validationError;
		if(empty($xml->assetDistributionConditions))
			$this->assetDistributionConditions = array();
		else
			$this->assetDistributionConditions = Kaltura_Client_Client::unmarshalItem($xml->assetDistributionConditions);
	}
	/**
	 * The validation error description that will be set on the "data" property on KalturaDistributionValidationErrorMissingAsset if rule was not fulfilled
	 * 	 
	 *
	 * @var string
	 */
	public $validationError = null;

	/**
	 * An array of asset distribution conditions
	 * 	 
	 *
	 * @var array of KalturaAssetDistributionCondition
	 */
	public $assetDistributionConditions;


}

