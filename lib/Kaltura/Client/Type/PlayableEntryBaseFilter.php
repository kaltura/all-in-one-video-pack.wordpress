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
abstract class Kaltura_Client_Type_PlayableEntryBaseFilter extends Kaltura_Client_Type_BaseEntryFilter {
	public function get_kaltura_object_type() {
		return 'KalturaPlayableEntryBaseFilter';
	}

	public function __construct( SimpleXMLElement $xml = null ) {
		parent::__construct( $xml );

		if ( is_null( $xml ) ) {
			return;
		}

		if ( count( $xml->lastPlayedAtGreaterThanOrEqual ) ) {
			$this->lastPlayedAtGreaterThanOrEqual = (int) $xml->lastPlayedAtGreaterThanOrEqual;
		}
		if ( count( $xml->lastPlayedAtLessThanOrEqual ) ) {
			$this->lastPlayedAtLessThanOrEqual = (int) $xml->lastPlayedAtLessThanOrEqual;
		}
		if ( count( $xml->durationLessThan ) ) {
			$this->durationLessThan = (int) $xml->durationLessThan;
		}
		if ( count( $xml->durationGreaterThan ) ) {
			$this->durationGreaterThan = (int) $xml->durationGreaterThan;
		}
		if ( count( $xml->durationLessThanOrEqual ) ) {
			$this->durationLessThanOrEqual = (int) $xml->durationLessThanOrEqual;
		}
		if ( count( $xml->durationGreaterThanOrEqual ) ) {
			$this->durationGreaterThanOrEqual = (int) $xml->durationGreaterThanOrEqual;
		}
		$this->durationTypeMatchOr = (string) $xml->durationTypeMatchOr;
	}

	/**
	 *
	 *
	 * @var int
	 */
	public $lastPlayedAtGreaterThanOrEqual = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $lastPlayedAtLessThanOrEqual = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $durationLessThan = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $durationGreaterThan = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $durationLessThanOrEqual = null;

	/**
	 *
	 *
	 * @var int
	 */
	public $durationGreaterThanOrEqual = null;

	/**
	 *
	 *
	 * @var string
	 */
	public $durationTypeMatchOr = null;


}

