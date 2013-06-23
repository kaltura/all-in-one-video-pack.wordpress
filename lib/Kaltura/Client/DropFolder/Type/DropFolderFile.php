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
 * @package Kaltura
 * @subpackage Client
 */
class Kaltura_Client_DropFolder_Type_DropFolderFile extends Kaltura_Client_ObjectBase
{
	public function getKalturaObjectType()
	{
		return 'KalturaDropFolderFile';
	}
	
	public function __construct(SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->id))
			$this->id = (int)$xml->id;
		if(count($xml->partnerId))
			$this->partnerId = (int)$xml->partnerId;
		if(count($xml->dropFolderId))
			$this->dropFolderId = (int)$xml->dropFolderId;
		$this->fileName = (string)$xml->fileName;
		if(count($xml->fileSize))
			$this->fileSize = (float)$xml->fileSize;
		if(count($xml->fileSizeLastSetAt))
			$this->fileSizeLastSetAt = (int)$xml->fileSizeLastSetAt;
		if(count($xml->status))
			$this->status = (int)$xml->status;
		$this->parsedSlug = (string)$xml->parsedSlug;
		$this->parsedFlavor = (string)$xml->parsedFlavor;
		if(count($xml->leadDropFolderFileId))
			$this->leadDropFolderFileId = (int)$xml->leadDropFolderFileId;
		if(count($xml->deletedDropFolderFileId))
			$this->deletedDropFolderFileId = (int)$xml->deletedDropFolderFileId;
		$this->entryId = (string)$xml->entryId;
		$this->errorCode = (string)$xml->errorCode;
		$this->errorDescription = (string)$xml->errorDescription;
		$this->lastModificationTime = (string)$xml->lastModificationTime;
		if(count($xml->createdAt))
			$this->createdAt = (int)$xml->createdAt;
		if(count($xml->updatedAt))
			$this->updatedAt = (int)$xml->updatedAt;
		if(count($xml->uploadStartDetectedAt))
			$this->uploadStartDetectedAt = (int)$xml->uploadStartDetectedAt;
		if(count($xml->uploadEndDetectedAt))
			$this->uploadEndDetectedAt = (int)$xml->uploadEndDetectedAt;
		if(count($xml->importStartedAt))
			$this->importStartedAt = (int)$xml->importStartedAt;
		if(count($xml->importEndedAt))
			$this->importEndedAt = (int)$xml->importEndedAt;
		if(count($xml->batchJobId))
			$this->batchJobId = (int)$xml->batchJobId;
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
	 * @var int
	 * @insertonly
	 */
	public $dropFolderId = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $fileName = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $fileSize = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $fileSizeLastSetAt = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_DropFolder_Enum_DropFolderFileStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedSlug = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedFlavor = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $leadDropFolderFileId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $deletedDropFolderFileId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var Kaltura_Client_DropFolder_Enum_DropFolderFileErrorCode
	 */
	public $errorCode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorDescription = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $lastModificationTime = null;

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
	 * @var int
	 */
	public $uploadStartDetectedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uploadEndDetectedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $importStartedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $importEndedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $batchJobId = null;


}

