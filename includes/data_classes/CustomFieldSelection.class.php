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
	//require(__DATAGEN_CLASSES__ . '/CustomFieldSelectionGen.class.php');

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
	class CustomFieldSelection extends QBaseClass {
		
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
		
		/* BEGIN: CODE GENERATED METHODS
		 * These methods were originally in CustomFieldSelectionGen.class.php, but were moved here in October 2009 when the CustomFieldSelection table was removed from the data model
		
		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'CustomFieldSelectionId':
					/**
					 * Gets the value for intCustomFieldSelectionId (Read-Only PK)
					 * @return integer
					 */
					return $this->intCustomFieldSelectionId;

				case 'CustomFieldValueId':
					/**
					 * Gets the value for intCustomFieldValueId (Not Null)
					 * @return integer
					 */
					return $this->intCustomFieldValueId;

				case 'EntityQtypeId':
					/**
					 * Gets the value for intEntityQtypeId (Not Null)
					 * @return integer
					 */
					return $this->intEntityQtypeId;

				case 'EntityId':
					/**
					 * Gets the value for intEntityId (Not Null)
					 * @return integer
					 */
					return $this->intEntityId;


				///////////////////
				// Member Objects
				///////////////////
				case 'CustomFieldValue':
					/**
					 * Gets the value for the CustomFieldValue object referenced by intCustomFieldValueId (Not Null)
					 * @return CustomFieldValue
					 */
					try {
						if ((!$this->objCustomFieldValue) && (!is_null($this->intCustomFieldValueId)))
							$this->objCustomFieldValue = CustomFieldValue::Load($this->intCustomFieldValueId);
						return $this->objCustomFieldValue;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'CustomFieldSelectionId':
					/**
					 * Sets the value for intCustomFieldId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCustomFieldSelectionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case 'CustomFieldValueId':
					/**
					 * Sets the value for intCustomFieldValueId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCustomFieldValue = null;
						return ($this->intCustomFieldValueId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EntityQtypeId':
					/**
					 * Sets the value for intEntityQtypeId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEntityQtypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EntityId':
					/**
					 * Sets the value for intEntityId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEntityId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CustomFieldValue':
					/**
					 * Sets the value for the CustomFieldValue object referenced by intCustomFieldValueId (Not Null)
					 * @param CustomFieldValue $mixValue
					 * @return CustomFieldValue
					 */
					if (is_null($mixValue)) {
						$this->intCustomFieldValueId = null;
						$this->objCustomFieldValue = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CustomFieldValue object
						try {
							$mixValue = QType::Cast($mixValue, 'CustomFieldValue');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CustomFieldValue object
						if (is_null($mixValue->CustomFieldValueId))
							throw new QCallerException('Unable to set an unsaved CustomFieldValue for this CustomFieldSelection');

						// Update Local Member Variables
						$this->objCustomFieldValue = $mixValue;
						$this->intCustomFieldValueId = $mixValue->CustomFieldValueId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column custom_field_selection.custom_field_selection_id
		 * @var integer intCustomFieldSelectionId
		 */
		protected $intCustomFieldSelectionId;
		const CustomFieldSelectionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_selection.custom_field_value_id
		 * @var integer intCustomFieldValueId
		 */
		protected $intCustomFieldValueId;
		const CustomFieldValueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_selection.entity_qtype_id
		 * @var integer intEntityQtypeId
		 */
		protected $intEntityQtypeId;
		const EntityQtypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_selection.entity_id
		 * @var integer intEntityId
		 */
		protected $intEntityId;
		const EntityIdDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;



		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column custom_field_selection.custom_field_value_id.
		 *
		 * NOTE: Always use the CustomFieldValue property getter to correctly retrieve this CustomFieldValue object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CustomFieldValue objCustomFieldValue
		 */
		protected $objCustomFieldValue;






		////////////////////////////////////////////////////////
		// METHODS for MANUAL QUERY SUPPORT (aka Beta 2 Queries)
		////////////////////////////////////////////////////////

		/**
		 * Internally called method to assist with SQL Query options/preferences for single row loaders.
		 * Any Load (single row) method can use this method to get the Database object.
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function QueryHelper(&$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];
		}

		////////////////////////////////////////
		// COLUMN CONSTANTS for OBJECT EXPANSION
		////////////////////////////////////////
		const ExpandCustomFieldValue = 'custom_field_value_id';




		////////////////////////////////////////
		// METHODS for WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CustomFieldSelection"><sequence>';
			$strToReturn .= '<element name="CustomFieldSelectionId" type="xsd:int"/>';
			$strToReturn .= '<element name="CustomFieldValue" type="xsd1:CustomFieldValue"/>';
			$strToReturn .= '<element name="EntityQtypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="EntityId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CustomFieldSelection', $strComplexTypeArray)) {
				$strComplexTypeArray['CustomFieldSelection'] = CustomFieldSelection::GetSoapComplexTypeXml();
				CustomFieldValue::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CustomFieldSelection::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CustomFieldSelection();
			if (property_exists($objSoapObject, 'CustomFieldSelectionId'))
				$objToReturn->intCustomFieldSelectionId = $objSoapObject->CustomFieldSelectionId;
			if ((property_exists($objSoapObject, 'CustomFieldValue')) &&
				($objSoapObject->CustomFieldValue))
				$objToReturn->CustomFieldValue = CustomFieldValue::GetObjectFromSoapObject($objSoapObject->CustomFieldValue);
			if (property_exists($objSoapObject, 'EntityQtypeId'))
				$objToReturn->intEntityQtypeId = $objSoapObject->EntityQtypeId;
			if (property_exists($objSoapObject, 'EntityId'))
				$objToReturn->intEntityId = $objSoapObject->EntityId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CustomFieldSelection::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCustomFieldValue)
				$objObject->objCustomFieldValue = CustomFieldValue::GetSoapObjectFromObject($objObject->objCustomFieldValue, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCustomFieldValueId = null;
			return $objObject;
		}

	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

		
		
		/* END: Generated Code */	

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
				case 9: 
					$strPrimaryKey = 'address_id';
					$strId = 'address`.`address_id';
					$strHelperTable = '`address_custom_field_helper`';
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
			
			$strShortDescription = $objDbRow->GetColumn('cfv_' . $intCustomFieldId, 'String');
			
			$objCustomFieldSelection = new CustomFieldSelection();
			$objCustomFieldSelection->intEntityQtypeId = $intEntityQtypeId;
			$objCustomFieldSelection->intEntityId = $intEntityId;
			$objCustomFieldSelection->CustomFieldSelectionId = 0;
			
			$objCustomField = CustomField::Load($intCustomFieldId);
			// If it is a select custom field
			if ($objCustomField->CustomFieldQtypeId == 2 && !empty($strShortDescription)) {
				@$objCustomFieldValue = CustomFieldValue::LoadByCustomFieldShortDescription($intCustomFieldId, $strShortDescription);
				$objCustomFieldSelection->CustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
			}
			else {
				$objCustomFieldSelection->CustomFieldValueId = 0;
				$objCustomFieldValue = new CustomFieldValue();
				$objCustomFieldValue->CustomFieldValueId = 0;
				$objCustomFieldValue->CustomFieldId = $intCustomFieldId;
				//$objCustomFieldValue->ShortDescription = $objDbRow->GetColumn('cfv_' . $intCustomFieldId, 'String');
				$objCustomFieldValue->ShortDescription = $strShortDescription;
			}
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
		  //parent::Save($blnForceInsert, $blnForceUpdate);
		  
		  $objCustomFieldValue = $this->CustomFieldValue;
		  if (!$objCustomFieldValue) {
		  	$objCustomFieldValue = $this->newCustomFieldValue;
		  }
		  
		  if ($intCustomFieldId = $objCustomFieldValue->CustomFieldId) {
			  // If helper table exists
				if ($strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($this->EntityQtypeId)) {
  				$strHelperTable = $strHelperTableArray[0];
    		  $strTableName = $strHelperTableArray[1];
				  
    		  $objDatabase = CustomField::GetDatabase();
    		  $strShortDescription = $objDatabase->SqlVariable($objCustomFieldValue->ShortDescription);
    		  $intEntityId = $objDatabase->SqlVariable($this->EntityId);
				  $strQuery = sprintf("UPDATE %s SET `cfv_%s`=%s where `%s_id`=%s;", $strHelperTable, $intCustomFieldId, $strShortDescription, $strTableName, $intEntityId);
  			  $objDatabase->NonQuery($strQuery);
				}
			}
		}
		
		// This also deletes the data from helper tables
		public function Delete() {
			$objCustomFieldValue = CustomFieldValue::Load($this->CustomFieldValueId);
			//parent::Delete();
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