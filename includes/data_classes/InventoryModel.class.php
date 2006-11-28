<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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
	require(__DATAGEN_CLASSES__ . '/InventoryModelGen.class.php');

	/**
	 * The InventoryModel class defined here contains any
	 * customized code for the InventoryModel class in the
	 * Object Relational Model.  It represents the "inventory_model" table 
	 * in the database, and extends from the code generated abstract InventoryModelGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class InventoryModel extends InventoryModelGen {
		
		protected $intInventoryModelQuantity;
		public $objCustomFieldArray;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objInventoryModel->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf($this->strInventoryModelCode);
		}
			
		public function __toStringQuantity() {
			// return ($this->intInventoryModelQuantity);
			return InventoryModel::GetTotalQuantityByInventoryModelId($this->InventoryModelId);
		}
		
		// This adds the created by and creation date before saving a new inventory model
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

		/**
		 * "to string" handler that includes a link to the inventory_edit page
		 *
		 * @param string $cssClass
		 * @return string
		 */
		public function __toStringWithLink($cssClass=null) {
			return sprintf('<a href="../inventory/inventory_edit.php?intInventoryModelId=%s" class="%s">%s</a>',
				$this->InventoryModelId, $cssClass, $this->InventoryModelCode);
		}
		
		/**
		 * Returns an Account object the created the most recent transaction for this inventory model
		 *
		 * @return Object Account
		 */
		public function GetLastTransactionUser() {
			
			$objExpansionMap[InventoryTransaction::ExpandTransaction][Transaction::ExpandCreatedByObject] = true;
			$strOrderBy = 'inventory_transaction__transaction_id__creation_date DESC';
			$strLimit = '0,1';
			
			$InventoryTransactionArray = InventoryTransaction::LoadArrayByInventoryModelId($this->InventoryModelId, $strOrderBy, $strLimit, $objExpansionMap);
			
			$Account = $InventoryTransactionArray[0]->Transaction->CreatedByObject;
			
			return $Account;
		}
		
		/**
		 * Get the total quantity of one inventory model
		 * by InventoryModelId
		 * @param integer $intInventoryModelId
		 * @return integer Total Quantity
		 */
		public static function GetTotalQuantityByInventoryModelId($intInventoryModelId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intInventoryModelId = $objDatabase->SqlVariable($intInventoryModelId, true);
			
			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					SUM(`inventory_location`.quantity)
				%s
				FROM
					`inventory_location` AS `inventory_location`
					%s
				WHERE
					`inventory_location`.`inventory_model_id` %s
					%s
					%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
					$intInventoryModelId,
					$strOrderBy, $strLimitSuffix);
// Use this if you decide you don't want to include inventory that is pending shipment
/*			$strQuery = sprintf('
				SELECT
				%s
					SUM((`inventory_location`.`quantity` - IFNULL((SELECT SUM(`inventory_transaction`.`quantity`) AS `pending_quantity` FROM `inventory_transaction` AS `inventory_transaction` WHERE `inventory_transaction`.`inventory_location_id` = `inventory_location`.`inventory_location_id` AND `inventory_transaction`.`source_location_id` > 5 AND `inventory_transaction`.`destination_location_id` IS NULL), 0)))
				%s
				FROM
					`inventory_location` AS `inventory_location`
					%s
				WHERE
					`inventory_location`.`inventory_model_id` %s
					%s
					%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
					$intInventoryModelId,
					$strOrderBy, $strLimitSuffix);*/
					
			// Perform the Query and Return the Count
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			if (is_null($strDbRow[0])) {
				$strDbRow[0] = 0;
			}
			return QType::Cast($strDbRow[0], QType::Integer);					
		}		
		
    /**
     * Count the total inventory_models by the search criteria
     *
     * @param int $intCategoryId
     * @param int $intManufacturerId
     * @param string $strShortDescription
     * @param string $strInventoryModelCode
     * @param array $objExpansionMap
     * @return integer Count
     */
		public static function CountBySearch($strInventoryModelCode = null, $intLocationId = null, $intInventoryModelId = null, $intCategoryId = null, $intManufacturerId = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $objExpansionMap = null) {
		
			// Call to QueryHelper to Get the Database Object		
			InventoryModel::QueryHelper($objDatabase);
			
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					InventoryModel::ExpandQuery('inventory_model', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$strSearchSql = InventoryModel::GenerateSearchSql($strInventoryModelCode, $intLocationId, $intInventoryModelId, $intCategoryId, $intManufacturerId, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					COUNT(inventory_model.inventory_model_id) AS row_count
				FROM
					`inventory_model` AS `inventory_model`
					LEFT JOIN `inventory_location` AS `inventory_location` ON `inventory_model` . `inventory_model_id` = `inventory_location` . `inventory_model_id`
					%s
					%s
				WHERE
				  1=1
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"), $strSearchSql['strCustomFieldsFromSql'],
			$strSearchSql['strInventoryModelCodeSql'], $strSearchSql['strLocationSql'], $strSearchSql['strInventoryModelSql'], $strSearchSql['strCategorySql'], $strSearchSql['strManufacturerSql'], $strSearchSql['strShortDescriptionSql'], $strSearchSql['strCustomFieldsSql'], $strSearchSql['strDateModifiedSql'],
			$strSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
			
		}
		
    /**
     * Load an array of InventoryModel objects
		 * by CategoryId, ManufacturerId Index(es)
		 * InventoryModel ShortDescription, or InventoryModelCode
     *
     * @param string $strInventoryModelCode
     * @param int $intLocationId
     * @param int $intInventoryModelId
     * @param int $intCategoryId
     * @param int $intManufacturerId
     * @param string $strShortDescription
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return InventoryModel[]
     */
		public static function LoadArrayBySearch($strInventoryModelCode = null, $intLocationId = null, $intInventoryModelId = null, $intCategoryId = null, $intManufacturerId = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			InventoryModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					InventoryModel::ExpandQuery('inventory_model', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
					
			$strSearchSql = InventoryModel::GenerateSearchSql($strInventoryModelCode, $intLocationId, $intInventoryModelId, $intCategoryId, $intManufacturerId, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					%s
					SUM( `inventory_location` . `quantity` ) AS `inventory_model_quantity`,
					`inventory_model`.`inventory_model_id` AS `inventory_model_id`,
					`inventory_model`.`category_id` AS `category_id`,
					`inventory_model`.`manufacturer_id` AS `manufacturer_id`,
					`inventory_model`.`inventory_model_code` AS `inventory_model_code`,
					`inventory_model`.`short_description` AS `short_description`,
					`inventory_model`.`long_description` AS `long_description`,
					`inventory_model`.`image_path` AS `image_path`,
					`inventory_model`.`price` AS `price`,
					`inventory_model`.`created_by` AS `created_by`,
					`inventory_model`.`creation_date` AS `creation_date`,
					`inventory_model`.`modified_by` AS `modified_by`,
					`inventory_model`.`modified_date` AS `modified_date`
					%s
				FROM
					`inventory_model` AS `inventory_model`
					LEFT JOIN `inventory_location` AS `inventory_location` ON `inventory_model` . `inventory_model_id` = `inventory_location` . `inventory_model_id`
					%s
					%s
				WHERE
				1=1
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				GROUP BY `inventory_model_id`
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"),
				$objQueryExpansion->GetFromSql("", "\n					"), $strSearchSql['strCustomFieldsFromSql'],
				$strSearchSql['strInventoryModelCodeSql'], $strSearchSql['strLocationSql'], $strSearchSql['strInventoryModelSql'], $strSearchSql['strCategorySql'], $strSearchSql['strManufacturerSql'], $strSearchSql['strShortDescriptionSql'], $strSearchSql['strCustomFieldsSql'], $strSearchSql['strDateModifiedSql'],
				$strSearchSql['strAuthorizationSql'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return InventoryModel::InstantiateDbResult($objDbResult);			
		
		}
		
		public static function LoadAllWithQuantity($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					SUM( `inventory_location`.`quantity` ) AS `inventory_model_quantity`,
					`inventory_model`.`inventory_model_id` AS `inventory_model_id`,
					`inventory_model`.`category_id` AS `category_id`,
					`inventory_model`.`manufacturer_id` AS `manufacturer_id`,
					`inventory_model`.`inventory_model_code` AS `inventory_model_code`,
					`inventory_model`.`short_description` AS `short_description`,
					`inventory_model`.`long_description` AS `long_description`,
					`inventory_model`.`image_path` AS `image_path`,
					`inventory_model`.`price` AS `price`,
					`inventory_model`.`created_by` AS `created_by`,
					`inventory_model`.`creation_date` AS `creation_date`,
					`inventory_model`.`modified_by` AS `modified_by`,
					`inventory_model`.`modified_date` AS `modified_date`
					%s
				FROM
					`inventory_model` AS `inventory_model`
					LEFT JOIN `inventory_location` AS `inventory_location` ON `inventory_model` . `inventory_model_id` = `inventory_location` . `inventory_model_id`
					%s
				GROUP BY `inventory_model_id`
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return InventoryModel::InstantiateDbResult($objDbResult);
		}		
		
		/**
		 * This is an internally called method that generates the SQL
		 * for the WHERE portion of the query for searching by Category, 
		 * Manufacturer, Name, or Part Number. This is intended to be called 
		 * from InventoryModel::LoadArrayBySearch() and InventoryModel::CountBySearch
		 * This has been updated for calls from LoadArrayBySimpleSearch() but will
		 * also work with the LoadArrayBySearch() method is well.
		 * This was done in case we revert back to the older, advanced search.
		 *
		 * @param string $strInventoryModelCode
		 * @param int $intLocationId
		 * @param int $intInventoryModelId
		 * @param int $intCategoryId
		 * @param int $intManufacturerId
		 * @param string $strShortDescription
		 * @return array with seven keys, strInventoryModelCodeSql, strLocationSql, strInventoryModelSql, strCategorySql, strManufacturerSql, strShortDescriptionSql
		 */
	  protected static function GenerateSearchSql ($strInventoryModelCode = null, $intLocationId = null, $intInventoryModelId = null, $intCategoryId = null, $intManufacturerId = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null) {
			
	  	// Define all indexes for the array to be returned
			$arrSearchSql = array("strInventoryModelCodeSql" => "", "strLocationSql" => "", "strLocationsFromSql" => "", "strInventoryModelSql" => "", "strCategorySql" => "", "strManufacturerSql" => "", "strShortDescriptionSql" => "", "strCustomFieldsSql" => "", "strCustomFieldsFromSql" => "", "strDateModifiedSql" => "", "strAuthorizationSql" => "");

			if ($strInventoryModelCode) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strInventoryModelCode = QApplication::$Database[1]->SqlVariable("%" . $strInventoryModelCode . "%", false);
				$arrSearchSql['strInventoryModelCodeSql'] = "AND `inventory_model` . `inventory_model_code` LIKE $strInventoryModelCode";
			}
			if ($intLocationId) {
				$intLocationId = QApplication::$Database[1]->SqlVariable($intLocationId, true);
				$arrSearchSql['strLocationsFromSql'] = ", inventory_location";
				$arrSearchSql['strLocationSql'] = "AND `inventory_model` . `inventory_model_id` = `inventory_location` . `inventory_model_id`";
				$arrSearchSql['strLocationSql'] = sprintf("\nAND `inventory_location` . `location_id`%s", $intLocationId);
			}
			if ($intInventoryModelId) {
				$intInventoryModelId = QApplication::$Database[1]->SqlVariable($intInventoryModelId, true);
				$arrSearchSql['strInventoryModelSql'] = sprintf("AND `inventory_model` . `inventory_model_id`%s", $intInventoryModelId);
			}			
			if ($intCategoryId) {
				$intCategoryId = QApplication::$Database[1]->SqlVariable($intCategoryId, true);
				$arrSearchSql['strCategorySql'] = sprintf("AND `inventory_model`.`category_id`%s", $intCategoryId);
			}			
			if ($intManufacturerId) {		
  		  $intManufacturerId = QApplication::$Database[1]->SqlVariable($intManufacturerId, true);
				$arrSearchSql['strManufacturerSql'] = sprintf("AND `inventory_model`.`manufacturer_id`%s", $intManufacturerId);
			}
			if ($strShortDescription) {
				$strShortDescription = QApplication::$Database[1]->SqlVariable("%" . $strShortDescription . "%", false);
				$arrSearchSql['strShortDescriptionSql'] = "AND `inventory_model`.`short_description` LIKE $strShortDescription";
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`inventory_model`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`inventory_model`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am 
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`inventory_model`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`inventory_model`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}			
			if ($arrCustomFields) {
				foreach ($arrCustomFields as $field) {
					if (isset($field['value']) && !empty($field['value'])) {
						// echo("test");
						$field['CustomFieldId'] = QApplication::$Database[1]->SqlVariable($field['CustomFieldId'], false);
						
						$arrSearchSql['strCustomFieldsFromSql'] .= sprintf("\nLEFT JOIN `custom_field_selection` AS `custom_field_selection_%s` ON `inventory_model` . `inventory_model_id` = `custom_field_selection_%s` . `entity_id`", $field['CustomFieldId'], $field['CustomFieldId']);
						$arrSearchSql['strCustomFieldsFromSql'] .= sprintf("\nLEFT JOIN `custom_field_value` AS `custom_field_value_%s` ON `custom_field_selection_%s` . `custom_field_value_id` = `custom_field_value_%s` . `custom_field_value_id`", $field['CustomFieldId'], $field['CustomFieldId'], $field['CustomFieldId']);
						
						$arrSearchSql['strCustomFieldsSql'] .= sprintf("\nAND `custom_field_value_%s` . `custom_field_id` = %s", $field['CustomFieldId'], $field['CustomFieldId']);
						if ($field['input'] instanceof QTextBox) {
							$field['value'] = QApplication::$Database[1]->SqlVariable("%" . $field['value'] . "%", false);
							$arrSearchSql['strCustomFieldsSql'] .= "\nAND `custom_field_value_".$field['CustomFieldId']."` . `short_description` LIKE ".$field['value'];
						}
						elseif ($field['input'] instanceof QListBox) {
							$field['value'] = QApplication::$Database[1]->SqlVariable($field['value'], true);
							$arrSearchSql['strCustomFieldsSql'] .= sprintf("\nAND `custom_field_value_%s` . `custom_field_value_id`%s", $field['CustomFieldId'], $field['value']);
						}
					}
				}
			}
			
			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql('inventory_model');
			
			return $arrSearchSql;
	  }
	  
		/**
		 * Instantiate an InventoryModel object from a Database Row.
		 * Calls parent function, and adds InventoryModelQuantity.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @return AssetModel
		*/
		
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null) {
			
			$objToReturn = parent::InstantiateDbRow($objDbRow, $strAliasPrefix);
			// $objToReturn->intInventoryModelQuantity = $objDbRow->GetColumn($strAliasPrefix . 'inventory_model_quantity', 'Integer');
			
			return $objToReturn;
			
		}
	}
?>