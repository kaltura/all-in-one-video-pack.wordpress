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
abstract class Kaltura_Client_Type_LiveEntry extends Kaltura_Client_Type_MediaEntry
{
	public function getKalturaObjectType()
	{
		return 'KalturaLiveEntry';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->offlineMessage))
			$this->offlineMessage = (string)$xml->offlineMessage;
		if(count($xml->recordStatus))
			$this->recordStatus = (int)$xml->recordStatus;
		if(count($xml->dvrStatus))
			$this->dvrStatus = (int)$xml->dvrStatus;
		if(count($xml->dvrWindow))
			$this->dvrWindow = (int)$xml->dvrWindow;
		if(count($xml->lastElapsedRecordingTime))
			$this->lastElapsedRecordingTime = (int)$xml->lastElapsedRecordingTime;
		if(count($xml->liveStreamConfigurations))
		{
			if(empty($xml->liveStreamConfigurations))
				$this->liveStreamConfigurations = array();
			else
				$this->liveStreamConfigurations = Kaltura_Client_ParseUtils::unmarshalArray($xml->liveStreamConfigurations, "KalturaLiveStreamConfiguration");
		}
		if(count($xml->recordedEntryId))
			$this->recordedEntryId = (string)$xml->recordedEntryId;
		if(count($xml->pushPublishEnabled))
			$this->pushPublishEnabled = (int)$xml->pushPublishEnabled;
		if(count($xml->publishConfigurations))
		{
			if(empty($xml->publishConfigurations))
				$this->publishConfigurations = array();
			else
				$this->publishConfigurations = Kaltura_Client_ParseUtils::unmarshalArray($xml->publishConfigurations, "KalturaLiveStreamPushPublishConfiguration");
		}
		if(count($xml->firstBroadcast))
			$this->firstBroadcast = (int)$xml->firstBroadcast;
		if(count($xml->lastBroadcast))
			$this->lastBroadcast = (int)$xml->lastBroadcast;
		if(count($xml->currentBroadcastStartTime))
			$this->currentBroadcastStartTime = (float)$xml->currentBroadcastStartTime;
		if(count($xml->recordingOptions) && !empty($xml->recordingOptions))
			$this->recordingOptions = Kaltura_Client_ParseUtils::unmarshalObject($xml->recordingOptions, "KalturaLiveEntryRecordingOptions");
		if(count($xml->liveStatus))
			$this->liveStatus = (int)$xml->liveStatus;
		if(count($xml->segmentDuration))
			$this->segmentDuration = (int)$xml->segmentDuration;
		if(count($xml->explicitLive))
			$this->explicitLive = (int)$xml->explicitLive;
		if(count($xml->viewMode))
			$this->viewMode = (int)$xml->viewMode;
		if(count($xml->recordingStatus))
			$this->recordingStatus = (int)$xml->recordingStatus;
		if(count($xml->lastBroadcastEndTime))
			$this->lastBroadcastEndTime = (int)$xml->lastBroadcastEndTime;
		if(count($xml->broadcastTime))
			$this->broadcastTime = (int)$xml->broadcastTime;
	}
	/**
	 * The message to be presented when the stream is offline
	 *
	 * @var string
	 */
	public $offlineMessage = null;

	/**
	 * Recording Status Enabled/Disabled
	 *
	 * @var Kaltura_Client_Enum_RecordStatus
	 */
	public $recordStatus = null;

	/**
	 * DVR Status Enabled/Disabled
	 *
	 * @var Kaltura_Client_Enum_DVRStatus
	 */
	public $dvrStatus = null;

	/**
	 * Window of time which the DVR allows for backwards scrubbing (in minutes)
	 *
	 * @var int
	 */
	public $dvrWindow = null;

	/**
	 * Elapsed recording time (in msec) up to the point where the live stream was last stopped (unpublished).
	 *
	 * @var int
	 */
	public $lastElapsedRecordingTime = null;

	/**
	 * Array of key value protocol->live stream url objects
	 *
	 * @var array of KalturaLiveStreamConfiguration
	 */
	public $liveStreamConfigurations;

	/**
	 * Recorded entry id
	 *
	 * @var string
	 */
	public $recordedEntryId = null;

	/**
	 * Flag denoting whether entry should be published by the media server
	 *
	 * @var Kaltura_Client_Enum_LivePublishStatus
	 */
	public $pushPublishEnabled = null;

	/**
	 * Array of publish configurations
	 *
	 * @var array of KalturaLiveStreamPushPublishConfiguration
	 */
	public $publishConfigurations;

	/**
	 * The first time in which the entry was broadcast
	 *
	 * @var int
	 * @readonly
	 */
	public $firstBroadcast = null;

	/**
	 * The Last time in which the entry was broadcast
	 *
	 * @var int
	 * @readonly
	 */
	public $lastBroadcast = null;

	/**
	 * The time (unix timestamp in milliseconds) in which the entry broadcast started or 0 when the entry is off the air
	 *
	 * @var float
	 */
	public $currentBroadcastStartTime = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Type_LiveEntryRecordingOptions
	 */
	public $recordingOptions;

	/**
	 * the status of the entry of type EntryServerNodeStatus
	 *
	 * @var Kaltura_Client_Enum_EntryServerNodeStatus
	 * @readonly
	 */
	public $liveStatus = null;

	/**
	 * The chunk duration value in milliseconds
	 *
	 * @var int
	 */
	public $segmentDuration = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_NullableBoolean
	 */
	public $explicitLive = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_ViewMode
	 */
	public $viewMode = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_Enum_RecordingStatus
	 */
	public $recordingStatus = null;

	/**
	 * The time the last broadcast finished.
	 *
	 * @var int
	 * @readonly
	 */
	public $lastBroadcastEndTime = null;

	/**
	 * The time when the entry was first live with view_all
	 *
	 * @var int
	 */
	public $broadcastTime = null;


}

