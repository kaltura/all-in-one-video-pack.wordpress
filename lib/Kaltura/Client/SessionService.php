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
class Kaltura_Client_SessionService extends Kaltura_Client_ServiceBase {
	function __construct( Kaltura_Client_Client $client = null ) {
		parent::__construct( $client );
	}

	function start( $secret, $userId = '', $type = 0, $partnerId = null, $expiry = 86400, $privileges = null ) {
		$kparams = array();
		$this->client->addParam( $kparams, 'secret', $secret );
		$this->client->addParam( $kparams, 'userId', $userId );
		$this->client->addParam( $kparams, 'type', $type );
		$this->client->addParam( $kparams, 'partnerId', $partnerId );
		$this->client->addParam( $kparams, 'expiry', $expiry );
		$this->client->addParam( $kparams, 'privileges', $privileges );
		$this->client->queueServiceActionCall( 'session', 'start', null, $kparams );
		if ( $this->client->isMultiRequest() ) {
			return $this->client->getMultiRequestResult();
		}
		$resultXml       = $this->client->doQueue();
		$resultXmlObject = new \SimpleXMLElement( $resultXml );
		Kaltura_Client_ParseUtils::checkIfError( $resultXmlObject->result );
		$resultObject = (string) Kaltura_Client_ParseUtils::unmarshalSimpleType( $resultXmlObject->result );

		return $resultObject;
	}
}
