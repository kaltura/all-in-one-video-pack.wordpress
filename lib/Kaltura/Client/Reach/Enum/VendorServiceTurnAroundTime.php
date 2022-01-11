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
class Kaltura_Client_Reach_Enum_VendorServiceTurnAroundTime extends Kaltura_Client_EnumBase
{
	const BEST_EFFORT = -1;
	const IMMEDIATE = 0;
	const ONE_BUSINESS_DAY = 1;
	const TWO_BUSINESS_DAYS = 2;
	const THREE_BUSINESS_DAYS = 3;
	const FOUR_BUSINESS_DAYS = 4;
	const FIVE_BUSINESS_DAYS = 5;
	const SIX_BUSINESS_DAYS = 6;
	const SEVEN_BUSINESS_DAYS = 7;
	const THIRTY_MINUTES = 1800;
	const TWO_HOURS = 7200;
	const THREE_HOURS = 10800;
	const SIX_HOURS = 21600;
	const EIGHT_HOURS = 28800;
	const TWELVE_HOURS = 43200;
	const TWENTY_FOUR_HOURS = 86400;
	const FORTY_EIGHT_HOURS = 172800;
	const FOUR_DAYS = 345600;
	const FIVE_DAYS = 432000;
	const TEN_DAYS = 864000;
}

