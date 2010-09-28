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
	require(__DATAGEN_CLASSES__ . '/CategoryGen.class.php');

	/**
	 * The Category class defined here contains any
	 * customized code for the Category class in the
	 * Object Relational Model.  It represents the "category" table
	 * in the database, and extends from the code generated abstract CategoryGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My Application
	 * @subpackage DataObjects
	 *
	 */
	class Category extends CategoryGen {

		public $objCustomFieldArray;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCategory->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return $this->strShortDescription;
		}

		public function __toStringWithLink() {
			return sprintf('<a href="category_edit.php?intCategoryId=%s">%s</a>', $this->intCategoryId, $this->__toString());
		}

		// This adds the created by and creation date before saving a new category
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
				parent::Save($blnForceInsert, $blnForceUpdate);

				// If we have no errors then will add the data to the helper table
  			$objDatabase = Category::GetDatabase();
  			$strQuery = sprintf('INSERT INTO `category_custom_field_helper` (`category_id`) VALUES (%s);', $this->CategoryId);
  			$objDatabase->NonQuery($strQuery);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
		}

		/**
		 * Load all Categories according to asset flag
		 * If both variables are true, returns categories that are Asset OR Inventory, or both
		 * If both flags are false, returns categories that are NOT ASSET AND NOT INVENTORY
		 * @param bool $blnAssetFlag
		 * @param bool $blnInventoryFlag
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return Category[]
		*/
		public static function LoadAllWithFlags($blnAssetFlag = true, $blnInventoryFlag = true, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Category::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			if ($blnAssetFlag && $blnInventoryFlag) {
				$sqlWhere = "`category`.`asset_flag` = 1 OR `category`.`inventory_flag` = 1";
			}
			elseif ($blnAssetFlag) {
				$sqlWhere = "`category`.`asset_flag` = 1";
			}
			elseif ($blnInventoryFlag) {
				$sqlWhere = "`category`.`inventory_flag` = 1";
			}
			else {
				$sqlWhere = "`category`.`asset_flag` = 0 AND `category`.`inventory_flag` = 0";
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`category`.`category_id` AS `category_id`,
					`category`.`short_description` AS `short_description`,
					`category`.`long_description` AS `long_description`,
					`category`.`image_path` AS `image_path`,
					`category`.`asset_flag` AS `asset_flag`,
					`category`.`inventory_flag` AS `inventory_flag`,
					`category`.`created_by` AS `created_by`,
					`category`.`creation_date` AS `creation_date`,
					`category`.`modified_by` AS `modified_by`,
					`category`.`modified_date` AS `modified_date`
					%s
				FROM
					`category` AS `category`
					%s
				WHERE
					%s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$sqlWhere,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Category::InstantiateDbResult($objDbResult);
		}
		
		/**
		 * Load all Categories according to asset flag
		 * If both variables are true, returns categories that are Asset OR Inventory, or both
		 * If both flags are false, returns categories that are NOT ASSET AND NOT INVENTORY
		 * @param bool $blnAssetFlag
		 * @param bool $blnInventoryFlag
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return Category[]
		*/
		public static function LoadAllAsCustomArray($blnAssetFlag = true, $blnInventoryFlag = true, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Category::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			if ($blnAssetFlag && $blnInventoryFlag) {
				$sqlWhere = "`category`.`asset_flag` = 1 OR `category`.`inventory_flag` = 1";
			}
			elseif ($blnAssetFlag) {
				$sqlWhere = "`category`.`asset_flag` = 1";
			}
			elseif ($blnInventoryFlag) {
				$sqlWhere = "`category`.`inventory_flag` = 1";
			}
			else {
				$sqlWhere = "`category`.`asset_flag` = 0 AND `category`.`inventory_flag` = 0";
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`category`.`category_id` AS `category_id`,
					`category`.`short_description` AS `short_description`
					%s
				FROM
					`category` AS `category`
					%s
				WHERE
					%s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$sqlWhere,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			$objToReturn = array();
			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;			
			$item = Array();
			while ($objDbRow = $objDbResult->GetNextRow()) {				
				$item['category_id'] = $objDbRow->GetColumn('category_id', 'Integer');
				$item['short_description'] = $objDbRow->GetColumn('short_description');
				array_push($objToReturn,$item);
			}
			return $objToReturn;
		}

		/**
		 * Count all Categories with their associated flags
		 * @param bool $blnAssetFlag
		 * @param bool $blnInventoryFlag
		 * @return int
		*/
		public static function CountAllWithFlags($blnAssetFlag = true, $blnInventoryFlag = true) {
			// Call to QueryHelper to Get the Database Object
			Category::QueryHelper($objDatabase);

			if ($blnAssetFlag) {
				$sqlAssetWhere = "`category`.`asset_flag` = 1";
			}
			else {
				$sqlAssetWhere = "`category`.`asset_flag` = 0";
			}
			if ($blnInventoryFlag) {
				$sqlInventoryWhere = " AND `category`.`inventory_flag` = 1";
			}
			else {
				$sqlInventoryWhere .= " AND `category`.`inventory_flag` = 0";
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					COUNT(*) as row_count
				FROM
					`category`
				WHERE
					%s
					%s', $sqlAssetWhere, $sqlInventoryWhere);

			// Perform the Query and Return the Count
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}

		public static function LoadAllWithCustomFields($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			Category::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Category::ExpandQuery('category', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrCustomFieldSql = CustomField::GenerateSql(6);

			$strQuery = sprintf('
				SELECT
					%s
					`category`.`category_id` AS `category_id`,
					`category`.`short_description` AS `short_description`,
					`category`.`long_description` AS `long_description`,
					`category`.`image_path` AS `image_path`,
					`category`.`asset_flag` AS `asset_flag`,
					`category`.`inventory_flag` AS `inventory_flag`,
					`category`.`created_by` AS `created_by`,
					`category`.`creation_date` AS `creation_date`,
					`category`.`modified_by` AS `modified_by`,
					`category`.`modified_date` AS `modified_date`
					%s
					%s
				FROM
					`category` AS `category`
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
			return Category::InstantiateDbResult($objDbResult);

		}

		public static function LoadAllWithCustomFieldsHelper($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			Category::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Category::ExpandQuery('category', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrCustomFieldSql = CustomField::GenerateHelperSql(6);

			$strQuery = sprintf('
				SELECT
					%s
					`category`.`category_id` AS `category_id`,
					`category`.`short_description` AS `short_description`,
					`category`.`long_description` AS `long_description`,
					`category`.`image_path` AS `image_path`,
					`category`.`asset_flag` AS `asset_flag`,
					`category`.`inventory_flag` AS `inventory_flag`,
					`category`.`created_by` AS `created_by`,
					`category`.`creation_date` AS `creation_date`,
					`category`.`modified_by` AS `modified_by`,
					`category`.`modified_date` AS `modified_date`
					%s
					%s
				FROM
					`category` AS `category`
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
			return Category::InstantiateDbResult($objDbResult);

		}
	}
?>