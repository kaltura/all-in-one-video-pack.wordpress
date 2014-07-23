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
abstract class Kaltura_Client_Type_UiConfBaseFilter extends Kaltura_Client_Type_Filter {
	public function get_kaltura_object_type() {
		return 'KalturaUiConfBaseFilter';
	}

	public function __construct( SimpleXMLElement $xml = null ) {
		parent::__construct( $xml );

		if ( is_null( $xml ) ) {
			return;
		}

		if ( count( $xml->idEqual ) ) {
			$this->idEqual = (int) $xml->idEqual;
		}
		$this->idIn     = (string) $xml->idIn;
		$this->nameLike = (string) $xml->nameLike;
		if ( count( $xml->partnerIdEqual ) ) {
			$this->partnerIdEqual = (int) $xml->partnerIdEqual;
		}
		$this->partnerIdIn = (string) $xml->partnerIdIn;
		if ( count( $xml->objTypeEqual ) ) {
			$this->objTypeEqual = (int) $xml->objTypeEqual;
		}
		$this->objTypeIn        = (string) $xml->objTypeIn;
		$this->tagsMultiLikeOr  = (string) $xml->tagsMultiLikeOr;
		$this->tagsMultiLikeAnd = (string) $xml->tagsMultiLikeAnd;
		if ( count( $xml->createdAtGreaterThanOrEqual ) ) {
			$this->createdAtGreaterThanOrEqual = (int) $xml->createdAtGreaterThanOrEqual;
		}
		if ( count( $xml->createdAtLessThanOrEqual ) ) {
			$this->createdAtLessThanOrEqual = (int) $xml->createdAtLessThanOrEqual;
		}
		if ( count( $xml->updatedAtGreaterThanOrEqual ) ) {
			$this->updatedAtGreaterThanOrEqual = (int) $xml->updatedAtGreaterThanOrEqual;
		}
		if ( count( $xml->updatedAtLessThanOrEqual ) ) {
			$this->updatedAtLessThanOrEqual = (int) $xml->updatedAtLessThanOrEqual;
		}
		if ( count( $xml->creationModeEqual ) ) {
			$this->creationModeEqual = (int) $xml->creationModeEqual;
		}
		$this->creationModeIn          = (string) $xml->creationModeIn;
		$this->versionEqual            = (string) $xml->versionEqual;
		$this->versionMultiLikeOr      = (string) $xml->versionMultiLikeOr;
		$this->versionMultiLikeAnd     = (string) $xml->versionMultiLikeAnd;
		$this->partnerTagsMultiLikeOr  = (string) $xml->partnerTagsMultiLikeOr;
		$this->partnerTagsMultiLikeAnd = (string) $xml->partnerTagsMultiLikeAnd;
	}

	/**
	 *
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $nameLike = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $partnerIdIn = null;

	/**
	 *
	 *
	 * @var Kaltura_Client_Enum_UiConfObjType
	 */
	public $objTypeEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $objTypeIn = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 *
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
	 * @var Kaltura_Client_Enum_UiConfCreationMode
	 */
	public $creationModeEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $creationModeIn = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $versionEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $versionMultiLikeOr = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $versionMultiLikeAnd = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $partnerTagsMultiLikeOr = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $partnerTagsMultiLikeAnd = null;


}

