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
// Copyright (C) 2006-2015  Kaltura Inc.
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
class Kaltura_Client_Client extends Kaltura_Client_ClientBase
{
	/**
	 * @var string
	 */
	protected $apiVersion = '3.1.6';

	/**
	 * Base Entry Service
	 *  
	 * @var Kaltura_Client_BaseEntryService
	 */
	public $baseEntry = null;

	/**
	 * Add & Manage Categories
	 *  
	 * @var Kaltura_Client_CategoryService
	 */
	public $category = null;

	/**
	 * Media service lets you upload and manage media files (images / videos & audio)
	 *  
	 * @var Kaltura_Client_MediaService
	 */
	public $media = null;

	/**
	 * partner service allows you to change/manage your partner personal details and settings as well
	 *  
	 * @var Kaltura_Client_PartnerService
	 */
	public $partner = null;

	/**
	 * Session service
	 *  
	 * @var Kaltura_Client_SessionService
	 */
	public $session = null;

	/**
	 * System service is used for internal system helpers & to retrieve system level information
	 *  
	 * @var Kaltura_Client_SystemService
	 */
	public $system = null;

	/**
	 * UiConf service lets you create and manage your UIConfs for the various flash components
	 *  This service is used by the KMC-ApplicationStudio
	 *  
	 * @var Kaltura_Client_UiConfService
	 */
	public $uiConf = null;

	/**
	 * Kaltura client constructor
	 *
	 * @param Kaltura_Client_Configuration $config
	 */
	public function __construct(Kaltura_Client_Configuration $config)
	{
		parent::__construct($config);
		
		$this->baseEntry = new Kaltura_Client_BaseEntryService($this);
		$this->category = new Kaltura_Client_CategoryService($this);
		$this->media = new Kaltura_Client_MediaService($this);
		$this->partner = new Kaltura_Client_PartnerService($this);
		$this->session = new Kaltura_Client_SessionService($this);
		$this->system = new Kaltura_Client_SystemService($this);
		$this->uiConf = new Kaltura_Client_UiConfService($this);
	}
	
}
