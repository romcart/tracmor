<?php
/*
 * Copyright (c)  2009, Tracmor, LLC
 *
 * This file is part of Tracmor.
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
	require(__DATAGEN_CLASSES__ . '/LocationGen.class.php');

	/**
	 * The Location class defined here contains any
	 * customized code for the Location class in the
	 * Object Relational Model.  It represents the "location" table
	 * in the database, and extends from the code generated abstract LocationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My Application
	 * @subpackage DataObjects
	 *
	 */
	class Location extends LocationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objLocation->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf($this->strShortDescription);
		}

		// This adds the created by and creation date before saving a new location
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
			}
			parent::Save($blnForceInsert, $blnForceUpdate);
		}

		public function __toStringWithLink() {
			return sprintf('<a href="location_edit.php?intLocationId=%s">%s</a>', $this->intLocationId, $this->__toString());
		}

		// Counts locations, unless $blnShowTBR is false, in which case it hides the 'To Be Received' location
		public static function CountAllLocations($blnShowTBR = false) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Location::QueryHelper($objDatabase);

			// Location #5 = 'To Be Received' (TBR)
			if (!$blnShowTBR) {
				$TBRQuery = "AND `location_id` != 5";
			}
			else {
				$TBRQuery = "";
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					COUNT(DISTINCT location.location_id) AS row_count
				FROM
					`location` AS `location`
				WHERE
					`location_id` != 1
					AND `location_id` != 2
					AND `location_id` != 3
					AND `location_id` != 4
					%s', $TBRQuery);

			// Perform the Query and Return the Count
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}

		/**
		 * Load all Locations, except for locations 1 & 2 for checked out and shipped
		 * @param bool $blnShowTBR boolean value to decide whether to show the 'To Be Received' location
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return Location[]
		*/
		public static function LoadAllLocations($blnShowTBR = false, $blnShowShipped = false, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Location::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Location #2 = 'Shipped'
			if (!$blnShowShipped) {
				$ShippedQuery = "AND `location_id` != 2";
			}
			else {
				$ShippedQuery = "";
			}

			// Location #5 = 'To Be Received' (TBR)
			if (!$blnShowTBR) {
				$TBRQuery = "AND `location_id` != 5";
			}
			else {
				$TBRQuery = "";
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`location`.`location_id` AS `location_id`,
					`location`.`short_description` AS `short_description`,
					`location`.`long_description` AS `long_description`,
					`location`.`created_by` AS `created_by`,
					`location`.`creation_date` AS `creation_date`,
					`location`.`modified_by` AS `modified_by`,
					`location`.`modified_date` AS `modified_date`
					%s
				FROM
					`location` AS `location`
					%s
				WHERE
					`location_id` != 1
					AND `location_id` != 3
					AND `location_id` != 4
					AND `location_id` != 6
					%s
					%s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom, $TBRQuery, $ShippedQuery,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Location::InstantiateDbResult($objDbResult);
		}

		public static function LoadAllLocationsAsCustomArray($blnShowTBR = false, $blnShowShipped = false, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Location::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Location #2 = 'Shipped'
			if (!$blnShowShipped) {
				$ShippedQuery = "AND `location_id` != 2";
			}
			else {
				$ShippedQuery = "";
			}

			// Location #5 = 'To Be Received' (TBR)
			if (!$blnShowTBR) {
				$TBRQuery = "AND `location_id` != 5";
			}
			else {
				$TBRQuery = "";
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`location`.`location_id` AS `location_id`,
					`location`.`short_description` AS `short_description`
					%s
				FROM
					`location` AS `location`
					%s
				WHERE
					`location_id` != 1
					AND `location_id` != 3
					AND `location_id` != 4
					AND `location_id` != 6
					%s
					%s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom, $TBRQuery, $ShippedQuery,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			$objToReturn = array();
			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;
			$item = Array();
			while ($objDbRow = $objDbResult->GetNextRow()) {
				$item['location_id'] = $objDbRow->GetColumn('location_id', 'Integer');
				$item['short_description'] = $objDbRow->GetColumn('short_description');
				array_push($objToReturn,$item);
			}
			return $objToReturn;
		}
	}
?>