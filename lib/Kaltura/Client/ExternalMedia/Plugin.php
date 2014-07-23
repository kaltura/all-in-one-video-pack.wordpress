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
class Kaltura_Client_ExternalMedia_Plugin extends Kaltura_Client_Plugin {
	protected function __construct( Kaltura_Client_Client $client ) {
		parent::__construct( $client );
	}

	/**
	 * @return Kaltura_Client_ExternalMedia_Plugin
	 */
	public static function get( Kaltura_Client_Client $client ) {
		return new Kaltura_Client_ExternalMedia_Plugin( $client );
	}

	/**
	 * @return array<Kaltura_Client_ServiceBase>
	 */
	public function getServices() {
		$services = array();

		return $services;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'externalMedia';
	}
}

