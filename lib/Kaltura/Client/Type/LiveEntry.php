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
abstract class Kaltura_Client_Type_LiveEntry extends Kaltura_Client_Type_MediaEntry {
	public function get_kaltura_object_type() {
		return 'KalturaLiveEntry';
	}

	public function __construct( SimpleXMLElement $xml = null ) {
		parent::__construct( $xml );

		if ( is_null( $xml ) ) {
			return;
		}

		$this->offlineMessage = (string) $xml->offlineMessage;
		if ( count( $xml->recordStatus ) ) {
			$this->recordStatus = (int) $xml->recordStatus;
		}
		if ( count( $xml->dvrStatus ) ) {
			$this->dvrStatus = (int) $xml->dvrStatus;
		}
		if ( count( $xml->dvrWindow ) ) {
			$this->dvrWindow = (int) $xml->dvrWindow;
		}
		if ( empty( $xml->liveStreamConfigurations ) ) {
			$this->liveStreamConfigurations = array();
		} else {
			$this->liveStreamConfigurations = Kaltura_Client_ParseUtils::unmarshalArray( $xml->liveStreamConfigurations, 'KalturaLiveStreamConfiguration' );
		}
		$this->recordedEntryId = (string) $xml->recordedEntryId;
	}

	/**
	 * The message to be presented when the stream is offline
	 *
	 *
	 * @var string
	 */
	public $offlineMessage = null;

	/**
	 * Recording Status Enabled/Disabled
	 *
	 *
	 * @var Kaltura_Client_Enum_RecordStatus
	 * @insertonly
	 */
	public $recordStatus = null;

	/**
	 * DVR Status Enabled/Disabled
	 *
	 *
	 * @var Kaltura_Client_Enum_DVRStatus
	 * @insertonly
	 */
	public $dvrStatus = null;

	/**
	 * Window of time which the DVR allows for backwards scrubbing (in minutes)
	 *
	 *
	 * @var int
	 * @insertonly
	 */
	public $dvrWindow = null;

	/**
	 * Array of key value protocol->live stream url objects
	 *
	 *
	 * @var array of KalturaLiveStreamConfiguration
	 */
	public $liveStreamConfigurations;

	/**
	 * Recorded entry id
	 *
	 *
	 * @var string
	 */
	public $recordedEntryId = null;


}

