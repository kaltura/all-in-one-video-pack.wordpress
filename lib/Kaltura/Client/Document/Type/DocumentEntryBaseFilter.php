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
abstract class Kaltura_Client_Document_Type_DocumentEntryBaseFilter extends Kaltura_Client_Type_BaseEntryFilter {
	public function get_kaltura_object_type() {
		return 'KalturaDocumentEntryBaseFilter';
	}

	public function __construct( SimpleXMLElement $xml = null ) {
		parent::__construct( $xml );

		if ( is_null( $xml ) ) {
			return;
		}

		if ( count( $xml->documentTypeEqual ) ) {
			$this->documentTypeEqual = (int) $xml->documentTypeEqual;
		}
		$this->documentTypeIn         = (string) $xml->documentTypeIn;
		$this->assetParamsIdsMatchOr  = (string) $xml->assetParamsIdsMatchOr;
		$this->assetParamsIdsMatchAnd = (string) $xml->assetParamsIdsMatchAnd;
	}

	/**
	 *
	 *
	 * @var Kaltura_Client_Document_Enum_DocumentType
	 */
	public $documentTypeEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $documentTypeIn = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $assetParamsIdsMatchOr = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $assetParamsIdsMatchAnd = null;


}

