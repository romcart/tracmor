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
	require(__DATAGEN_CLASSES__ . '/CustomFieldValueGen.class.php');

	/**
	 * The CustomFieldValue class defined here contains any
	 * customized code for the CustomFieldValue class in the
	 * Object Relational Model.  It represents the "custom_field_value" table 
	 * in the database, and extends from the code generated abstract CustomFieldValueGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class CustomFieldValue extends CustomFieldValueGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCustomFieldValue->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return $this->ShortDescription;
		}
		
		public function LoadByCustomFieldShortDescription($intCustomFieldId, $strShortDescription) {
			
			// Call CustomFieldValue::QueryArray to perform the LoadByCustFieldShortDescription query
			try {
				return CustomFieldValue::QuerySingle(
					QQ::AndCondition(QQ::Equal(QQN::CustomFieldValue()->CustomFieldId, $intCustomFieldId), QQ::Equal(QQN::CustomFieldValue()->ShortDescription, $strShortDescription)));
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
		}

		// This adds the created by and creation date before saving a new asset
		// And also updates the data into helper tables if short_description has been modified
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
				
				// Load the CustomFieldValue object before modifing 
				$objOldCustomFieldValue = CustomFieldValue::LoadByCustomFieldValueId($this->CustomFieldValueId);
				parent::Save($blnForceInsert, $blnForceUpdate);				
				// If short_description have been modified
				if ($this->ShortDescription != $objOldCustomFieldValue->ShortDescription) {
  				if ($objCustomField = $this->CustomField) {
  				  $objDatabase = CustomFieldValue::GetDatabase();
  				  $objCustomFieldSelectionArray = CustomFieldSelection::LoadArrayByCustomFieldValueId($this->CustomFieldValueId);
  				  foreach ($objCustomFieldSelectionArray as $objCustomFieldSelection) {
  				    // If helper table exists
  				    if ($strHelperTableArray = $this->GetHelperTableByEntityQtypeId($objCustomFieldSelection->EntityQtypeId)) {
  				      $strHelperTable = $strHelperTableArray[0];
  				      $strTableName = $strHelperTableArray[1];
      				  
  				      // Update the data into helper table
      				  $strQuery = sprintf("UPDATE %s SET `cfv_%s`=%s WHERE `%s_id`='%s';", $strHelperTable, $objCustomField->CustomFieldId, $objDatabase->SqlVariable($this->ShortDescription), $strTableName, $objCustomFieldSelection->EntityId);
        			  $objDatabase->NonQuery($strQuery);
      				}
  				  }
  				}
				}
			}
		}
		
		// This also deletes the data from helper tables
		public function Delete() {
		  $objCondition = QQ::Equal(QQN::CustomFieldSelection()->CustomFieldValueId, $this->CustomFieldValueId);
			$objClauses = QQ::Clause(QQ::Expand(QQN::CustomFieldSelection()->CustomFieldValue));
			// Select all CustomFieldSelections (and expanded CustomFieldValues) by CustomFieldValueId
			$objCustomFieldSelectionArray = CustomFieldSelection::QueryArray($objCondition, $objClauses);
			//parent::Delete();
			$intRowsToDeleteArray = array();
			// Create an array switched by helper tables (to minimize number of queries)
			foreach ($objCustomFieldSelectionArray as $objCustomFieldSelection) {
			  if ($this->GetHelperTableByEntityQtypeId($objCustomFieldSelection->EntityQtypeId)) {
			    $intRowsToDeleteArray[$objCustomFieldSelection->EntityQtypeId][] = $objCustomFieldSelection->EntityId;
			  }
			}
			$objDatabase = CustomFieldValue::GetDatabase();
			// For each helper table
			foreach (array_keys($intRowsToDeleteArray) as $intEntityQtypeId) {
				$strHelperTableArray = $this->GetHelperTableByEntityQtypeId($intEntityQtypeId);
				$strHelperTable = $strHelperTableArray[0];
  			$strTableName = $strHelperTableArray[1];
				
				$strQuery = sprintf("UPDATE %s SET `cfv_%s`='' WHERE `%s_id` IN (%s);", $strHelperTable, $objCustomFieldSelection->CustomFieldValue->CustomFieldId, $strTableName, implode(', ', $intRowsToDeleteArray[$intEntityQtypeId]));
        $objDatabase->NonQuery($strQuery);
			}
		}
		
		public function GetHelperTableByEntityQtypeId($intEntityQtypeId) {
		  switch ($intEntityQtypeId) {
    	  case 1: 
    		  $strTableName = "asset";
    			$strHelperTable = '`asset_custom_field_helper`';
    			break;
    		case 2: 
    			$strTableName = "inventory_model";
    			$strHelperTable = '`inventory_model_custom_field_helper`';
    			break;
    		case 4: 
    			$strTableName = "asset_model";
    			$strHelperTable = '`asset_model_custom_field_helper`';
    			break;
    		case 5: 
    			$strTableName = "manufacturer";
    			$strHelperTable = '`manufacturer_custom_field_helper`';
    			break;
    		case 6: 
    			$strTableName = "category";
    			$strHelperTable = '`category_custom_field_helper`';
    			break;
    		case 7: 
    			$strTableName = "company";
    			$strHelperTable = '`company_custom_field_helper`';
    			break;
    		case 8: 
    			$strTableName = "contact";
    			$strHelperTable = '`contact_custom_field_helper`';
    			break;
    		case 9: 
    			$strTableName = "address";
    			$strHelperTable = '`address_custom_field_helper`';
    			break;
    		case 10: 
    			$strTableName = "shipment";
    			$strHelperTable = '`shipment_custom_field_helper`';
    			break;
    		case 11: 
    			$strTableName = "receipt";
    			$strHelperTable = '`receipt_custom_field_helper`';
    			break;
        default:
       	  return false;
      }
		  return array($strHelperTable, $strTableName);
		}
		
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'CustomFieldValueId':
					/**
					 * Sets the value for intCustomFieldId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCustomFieldValueId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
					default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>