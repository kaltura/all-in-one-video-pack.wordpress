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
 * @package    Kaltura
 * @subpackage Client
 */
class Kaltura_Client_Type_BaseEntryFilter extends Kaltura_Client_Type_BaseEntryBaseFilter {
	public function get_kaltura_object_type() {
		return 'KalturaBaseEntryFilter';
	}

	public function __construct( SimpleXMLElement $xml = null ) {
		parent::__construct( $xml );

		if ( is_null( $xml ) ) {
			return;
		}

		$this->freeText = (string) $xml->freeText;
		if ( count( $xml->isRoot ) ) {
			$this->isRoot = (int) $xml->isRoot;
		}
		$this->categoriesFullNameIn = (string) $xml->categoriesFullNameIn;
		$this->categoryAncestorIdIn = (string) $xml->categoryAncestorIdIn;
		$this->redirectFromEntryId  = (string) $xml->redirectFromEntryId;
	}

	/**
	 *
	 *
	 * @var string
	 */
	public $freeText = null;

	/**
	 *
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $isRoot = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $categoriesFullNameIn = null;

	/**
	 * All entries within this categoy or in child categories
	 *
	 *
	 * @var string
	 */
	public $categoryAncestorIdIn = null;

	/**
	 * The id of the original entry
	 *
	 *
	 * @var string
	 */
	public $redirectFromEntryId = null;


}

