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
class Kaltura_Client_Metadata_Type_MetadataProfile extends Kaltura_Client_ObjectBase {
	public function get_kaltura_object_type() {
		return 'KalturaMetadataProfile';
	}

	public function __construct( SimpleXMLElement $xml = null ) {
		parent::__construct( $xml );

		if ( is_null( $xml ) ) {
			return;
		}

		if ( count( $xml->id ) ) {
			$this->id = (int) $xml->id;
		}
		if ( count( $xml->partnerId ) ) {
			$this->partnerId = (int) $xml->partnerId;
		}
		$this->metadataObjectType = (string) $xml->metadataObjectType;
		if ( count( $xml->version ) ) {
			$this->version = (int) $xml->version;
		}
		$this->name        = (string) $xml->name;
		$this->systemName  = (string) $xml->systemName;
		$this->description = (string) $xml->description;
		if ( count( $xml->createdAt ) ) {
			$this->createdAt = (int) $xml->createdAt;
		}
		if ( count( $xml->updatedAt ) ) {
			$this->updatedAt = (int) $xml->updatedAt;
		}
		if ( count( $xml->status ) ) {
			$this->status = (int) $xml->status;
		}
		$this->xsd   = (string) $xml->xsd;
		$this->views = (string) $xml->views;
		$this->xslt  = (string) $xml->xslt;
		if ( count( $xml->createMode ) ) {
			$this->createMode = (int) $xml->createMode;
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
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 *
	 *
	 * @var Kaltura_Client_Metadata_Enum_MetadataObjectType
	 */
	public $metadataObjectType = null;

	/**
	 *
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

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
	public $systemName = null;

	/**
	 *
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
	public $createdAt = null;

	/**
	 *
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 *
	 *
	 * @var Kaltura_Client_Metadata_Enum_MetadataProfileStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 *
	 *
	 * @var string
	 * @readonly
	 */
	public $xsd = null;

	/**
	 *
	 *
	 * @var string
	 * @readonly
	 */
	public $views = null;

	/**
	 *
	 *
	 * @var string
	 * @readonly
	 */
	public $xslt = null;

	/**
	 *
	 *
	 * @var Kaltura_Client_Metadata_Enum_MetadataProfileCreateMode
	 */
	public $createMode = null;


}

