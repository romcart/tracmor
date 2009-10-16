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
	require(__DATAGEN_CLASSES__ . '/CustomFieldSelectionGen.class.php');

	/**
	 * The CustomFieldSelection class defined here contains any
	 * customized code for the CustomFieldSelection class in the
	 * Object Relational Model.  It represents the "custom_field_selection" table 
	 * in the database, and extends from the code generated abstract CustomFieldSelectionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class CustomFieldSelection extends CustomFieldSelectionGen {
		
		// Cannot use $CustomAssetFieldValue here because it would override the variable QCodo creates
		// with the expanded load.		
		public $newCustomFieldValue;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCustomFieldSelection->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('CustomFieldSelection Object %s',  $this->intCustomFieldSelectionId);
		}

		/**
		 * This loads an expanded array of CustomFieldSelections and their associated values
		 * The values for each selection can be accessed by looping through: $CustomFieldSelections[$i]->CustomFieldValue->ShortDescription
		 *
		 * @param integer $intAssetId
		 * @param integer $intCustomAssetFieldId
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param ExpansionMap Object $objExpansionMap
		 * @return CustomAssetFieldSelection
		 */
		public static function LoadExpandedArray($intEntityId, $intEntityQtypeId, $intCustomFieldId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			switch ($intEntityQtypeId) {
				case 1: 
					$strPrimaryKey = 'asset_id';
					$strId = 'asset`.`asset_id';
					$strHelperTable = '`asset_custom_field_helper`';
					break;
				case 2:
					$strPrimaryKey = 'inventory_model_id';
					$strId = 'inventory_model`.`inventory_model_id';
					$strHelperTable = '`inventory_model_custom_field_helper`';
					break;
				case 4: 
					$strPrimaryKey = 'asset_model_id';
					$strId = 'asset_model`.`asset_model_id';
					$strHelperTable = '`asset_model_custom_field_helper`';
					break;
				case 5: 
					$strPrimaryKey = 'manufacturer_id';
					$strId = 'manufacturer`.`manufacturer_id';
					$strHelperTable = '`manufacturer_custom_field_helper`';
					break;
				case 6: 
					$strPrimaryKey = 'category_id';
					$strId = 'category`.`category_id';
					$strHelperTable = '`category_custom_field_helper`';
					break;
				case 7: 
					$strPrimaryKey = 'company_id';
					$strId = 'company`.`company_id';
					$strHelperTable = '`company_custom_field_helper`';
					break;
				case 8: 
					$strPrimaryKey = 'contact_id';
					$strId = 'contact`.`contact_id';
					$strHelperTable = '`contact_custom_field_helper`';
					break;
				case 10: 
					$strPrimaryKey = 'shipment_id';
					$strId = 'shipment`.`shipment_id';
					$strHelperTable = '`shipment_custom_field_helper`';
					break;
				case 11:
					$strPrimaryKey = 'receipt_id';
					$strId = 'receipt`.`receipt_id';
					$strHelperTable = '`receipt_custom_field_helper`';
					break;
			}
			
			$objDatabase = CustomField::GetDatabase();
			
			$strQuery = sprintf("SELECT * FROM %s WHERE %s = %s", $strHelperTable, $strPrimaryKey, $intEntityId);
			$objDbResult = $objDatabase->Query($strQuery);
			
			$objToReturn = array();
			$objDbRow = $objDbResult->GetNextRow();
			
			$objCustomFieldSelection = new stdClass();
			$objCustomFieldSelection->intEntityQtypeId = $intEntityQtypeId;
			$objCustomFieldSelection->intEntityId = $intEntityId;
			$objCustomFieldValue = new CustomFieldValue();
			$objCustomFieldValue->CustomFieldId = $intCustomFieldId;
			$objCustomFieldValue->ShortDescription = $objDbRow->GetColumn('cfv_' . $intCustomFieldId, 'String');
			$objCustomFieldSelection->CustomFieldValue = $objCustomFieldValue;
			$objToReturn = $objCustomFieldSelection;
			
			return $objToReturn;
			
/*			// Expand to include Values
			$objExpansionMap[CustomFieldSelection::ExpandCustomFieldValue] = true;
			
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			CustomFieldSelection::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intEntityId = $objDatabase->SqlVariable($intEntityId);
			$intEntityQtypeId = $objDatabase->SqlVariable($intEntityQtypeId);
			$intCustomFieldId = $objDatabase->SqlVariable($intCustomFieldId);
			
			$strQuery = sprintf('
				SELECT
					%s
					`custom_field_selection`.*
					%s
				FROM
					`custom_field_selection`
					%s
				WHERE
					`custom_field_selection` . `entity_id` = %s AND
					`custom_field_selection` . `entity_qtype_id` = %s AND
					`custom_field_selection__custom_field_value_id` . `custom_field_id` = %s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intEntityId, $intEntityQtypeId, $intCustomFieldId, 
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return CustomFieldSelection::InstantiateDbRow($objDbResult->GetNextRow());*/

		}
		
		// This inserts/updates the data into helper tables
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
		  parent::Save($blnForceInsert, $blnForceUpdate);
		  
		  $objCustomFieldValue = $this->CustomFieldValue;
		  if ($objCustomField = $objCustomFieldValue->CustomField) {
			  // If helper table exists
				if ($strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($this->EntityQtypeId)) {
  				$strHelperTable = $strHelperTableArray[0];
    		  $strTableName = $strHelperTableArray[1];
				  
    		  $objDatabase = CustomField::GetDatabase();
				  $strQuery = sprintf("UPDATE %s SET `cfv_%s`='%s' where `%s_id`='%s';", $strHelperTable, $objCustomField->CustomFieldId, $objCustomFieldValue->ShortDescription, $strTableName, $this->EntityId);
  			  $objDatabase->NonQuery($strQuery);
				}
			}
		}
		
		// This also deletes the data from helper tables
		public function Delete() {
			$objCustomFieldValue = CustomFieldValue::Load($this->CustomFieldValueId);
			parent::Delete();
			$objDatabase = CustomFieldSelection::GetDatabase();
			// If the helper table exists
			if ($objCustomFieldValue && $strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($this->EntityQtypeId)) {
  			$strHelperTable = $strHelperTableArray[0];
    		$strTableName = $strHelperTableArray[1];
  				
  			$strQuery = sprintf("UPDATE %s SET `cfv_%s`='' WHERE `%s_id`='%s';", $strHelperTable, $objCustomFieldValue->CustomFieldId, $strTableName, $this->EntityId);
        $objDatabase->NonQuery($strQuery);
			}
		}
	}
?>