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
	require(__DATAGEN_CLASSES__ . '/ManufacturerGen.class.php');

	/**
	 * The Manufacturer class defined here contains any
	 * customized code for the Manufacturer class in the
	 * Object Relational Model.  It represents the "manufacturer" table
	 * in the database, and extends from the code generated abstract ManufacturerGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My Application
	 * @subpackage DataObjects
	 *
	 */
	class Manufacturer extends ManufacturerGen {

		public $objCustomFieldArray;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objManufacturer->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf($this->strShortDescription);
		}

		public function __toStringWithLink() {
			return sprintf('<a href="manufacturer_edit.php?intManufacturerId=%s">%s</a>', $this->intManufacturerId, $this->__toString());
		}

		// This adds the created by and creation date before saving a new manufacturer
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
				parent::Save($blnForceInsert, $blnForceUpdate);

				// If we have no errors then will add the data to the helper table
  			$objDatabase = Manufacturer::GetDatabase();
  			$strQuery = sprintf('INSERT INTO `manufacturer_custom_field_helper` (`manufacturer_id`) VALUES (%s);', $this->ManufacturerId);
  			$objDatabase->NonQuery($strQuery);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
		}
		
		public static function LoadAllAsCustomArray($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			Manufacturer::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Manufacturer::ExpandQuery('manufacturer', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			
			$strQuery = sprintf('
				SELECT
					%s
					`manufacturer`.`manufacturer_id` AS `manufacturer_id`,
					`manufacturer`.`short_description` AS `short_description`
					%s
				FROM
					`manufacturer` AS `manufacturer`
					%s
				WHERE
				1=1
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), 
				$objQueryExpansion->GetFromSql("", "\n					"), 
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);
			$objToReturn = array();
			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;			
			$item = Array();
			while ($objDbRow = $objDbResult->GetNextRow()) {				
				$item['manufacturer_id'] = $objDbRow->GetColumn('manufacturer_id', 'Integer');
				$item['short_description'] = $objDbRow->GetColumn('short_description');
				array_push($objToReturn,$item);
			}
			return $objToReturn;
		}

		public static function LoadAllWithCustomFields($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			Manufacturer::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Manufacturer::ExpandQuery('manufacturer', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrCustomFieldSql = CustomField::GenerateSql(5);

			$strQuery = sprintf('
				SELECT
					%s
					`manufacturer`.`manufacturer_id` AS `manufacturer_id`,
					`manufacturer`.`short_description` AS `short_description`,
					`manufacturer`.`long_description` AS `long_description`,
					`manufacturer`.`image_path` AS `image_path`,
					`manufacturer`.`created_by` AS `created_by`,
					`manufacturer`.`creation_date` AS `creation_date`,
					`manufacturer`.`modified_by` AS `modified_by`,
					`manufacturer`.`modified_date` AS `modified_date`
					%s
					%s
				FROM
					`manufacturer` AS `manufacturer`
					%s
					%s
				WHERE
				1=1
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'],
				$objQueryExpansion->GetFromSql("", "\n					"), $arrCustomFieldSql['strFrom'],
				$strOrderBy, $strLimitSuffix);

				//echo($strQuery); exit;

			$objDbResult = $objDatabase->Query($strQuery);
			return Manufacturer::InstantiateDbResult($objDbResult);

		}

		public static function LoadAllWithCustomFieldsHelper($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			Manufacturer::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Manufacturer::ExpandQuery('manufacturer', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrCustomFieldSql = CustomField::GenerateHelperSql(5);

			$strQuery = sprintf('
				SELECT
					%s
					`manufacturer`.`manufacturer_id` AS `manufacturer_id`,
					`manufacturer`.`short_description` AS `short_description`,
					`manufacturer`.`long_description` AS `long_description`,
					`manufacturer`.`image_path` AS `image_path`,
					`manufacturer`.`created_by` AS `created_by`,
					`manufacturer`.`creation_date` AS `creation_date`,
					`manufacturer`.`modified_by` AS `modified_by`,
					`manufacturer`.`modified_date` AS `modified_date`
					%s
					%s
				FROM
					`manufacturer` AS `manufacturer`
					%s
					%s
				WHERE
				1=1
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'],
				$objQueryExpansion->GetFromSql("", "\n					"), $arrCustomFieldSql['strFrom'],
				$strOrderBy, $strLimitSuffix);

				//echo($strQuery); exit;

			$objDbResult = $objDatabase->Query($strQuery);
			return Manufacturer::InstantiateDbResult($objDbResult);

		}
	}
?>