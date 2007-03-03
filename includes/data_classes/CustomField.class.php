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
	require(__DATAGEN_CLASSES__ . '/CustomFieldGen.class.php');

	/**
	 * The CustomField class defined here contains any
	 * customized code for the CustomField class in the
	 * Object Relational Model.  It represents the "custom_field" table 
	 * in the database, and extends from the code generated abstract CustomFieldGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class CustomField extends CustomFieldGen {
		
		public $CustomFieldSelection;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCustomField->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strShortDescription);
		}
		
		// This adds the created by and creation date before saving a new asset
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
			return sprintf('<a href="custom_field_edit.php?intCustomFieldId=%s">%s</a>', $this->intCustomFieldId, $this->__toString());
		}
		
		// Return the <IMG> tag (either a check or an X based on the boolean value
		public function __toStringActiveFlag() {
			return BooleanImage($this->ActiveFlag);
		}
		
		// Return the <IMG> tag (either a check or an X based on the boolean value
		public function __toStringRequiredFlag() {
			return BooleanImage($this->RequiredFlag);
		}
		
		/**
		 * When creating a new entity, this static method assigns all of the CustomFieldSelections and CustomFieldValues
		 * for all required custom fields.
		 *
		 * @param integer $intEntityQtypeId
		 * @param integer $intEntityId
		 */
		public static function AssignNewEntityDefaultValues($intEntityQtypeId, $intEntityId) {
			$objExpansionMap[CustomField::ExpandDefaultCustomFieldValue] = true;
			$objCustomFieldArray = CustomField::LoadArrayByActiveFlagEntity(true, $intEntityQtypeId, null, null, $objExpansionMap);
			if ($objCustomFieldArray) {
				foreach ($objCustomFieldArray as $objCustomField) {
					if ($objCustomField->RequiredFlag && $objCustomField->DefaultCustomFieldValueId) {
						if ($objCustomField->CustomFieldQtypeId != 2) {
							$objCustomFieldValue = new CustomFieldValue();
							$objCustomFieldValue->CustomFieldId = $objCustomField->CustomFieldId;
							$objCustomFieldValue->ShortDescription = $objCustomField->DefaultCustomFieldValue->ShortDescription;
							$objCustomFieldValue->Save();
							$intCustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
						}
						else {
							$intCustomFieldValueId = $objCustomField->DefaultCustomFieldValueId;
						}
							
						$objCustomFieldSelection = new CustomFieldSelection();
						$objCustomFieldSelection->CustomFieldValueId = $intCustomFieldValueId;
						$objCustomFieldSelection->EntityQtypeId = $intEntityQtypeId;
						$objCustomFieldSelection->EntityId = $intEntityId;
						$objCustomFieldSelection->Save();
					}
				}
			}
		}
		
		/**
		 * This method will update the CustomFieldSelections for one Required Custom Field
		 *
		 */
		public function UpdateRequiredFieldSelections() {
			
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->CustomFieldId);
			if ($objEntityQtypeCustomFieldArray) {
				
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					
					$strEntity = EntityQtype::ToStringPrimaryKeySql($objEntityQtypeCustomField->EntityQtypeId);
					$strEntityTable = EntityQtype::ToStringTable($objEntityQtypeCustomField->EntityQtypeId);
					
					// This query returns entities which do not have a custom_field_selection for this specific Custom Field/Entity QType combination
					$strQuery = sprintf("
					SELECT %s AS entity_id
					FROM %s
					LEFT JOIN (custom_field_selection JOIN custom_field_value ON custom_field_selection.custom_field_value_id = custom_field_value.custom_field_value_id AND custom_field_value.custom_field_id = %s) ON %s = custom_field_selection.entity_id AND custom_field_selection.entity_qtype_id = %s
					WHERE custom_field_selection.custom_field_selection_id IS NULL"
					, $strEntity, $strEntityTable, $this->CustomFieldId, $strEntity, $objEntityQtypeCustomField->EntityQtypeId);
					
					$objDatabase = QApplication::$Database[1];
					$objDbResult = $objDatabase->Query($strQuery);
					while ($mixRow = $objDbResult->FetchArray()) {
						
						// If it is not a SELECT custom field, then create a new CustomFieldValue
						if ($this->CustomFieldQtypeId != 2) {
							$objCustomFieldValue = new CustomFieldValue();
							$objCustomFieldValue->CustomFieldId = $this->CustomFieldId;
							$objCustomFieldValue->ShortDescription = $this->DefaultCustomFieldValue->ShortDescription;
							$objCustomFieldValue->Save();
							$intCustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
						}
						// If it is a SELECT custom field, the CustomFieldValue is already created, so just assign the CustomFieldValueId to intCustomFieldValueId
						else {
							$intCustomFieldValueId = $this->DefaultCustomFieldValueId;
						}
						
						// Create the new CustomFieldSelection for this Entity Qtype/Entity Id/Custom Field Id
						$objCustomFieldSelection = new CustomFieldSelection();
						$objCustomFieldSelection->CustomFieldValueId = $intCustomFieldValueId;
						$objCustomFieldSelection->EntityQtypeId = $objEntityQtypeCustomField->EntityQtypeId;
						$objCustomFieldSelection->EntityId = $mixRow['entity_id'];
						$objCustomFieldSelection->Save();
					}
				}
			}
		}		
		
		/**
		 * Generate the SQL for a list page to include custom fields as virtual attributes (add __ before an alias to make a virutal attribute)
		 * The virtual attributes can then be accessed by $objAsset->GetVirtualAttribute('name_of_attribute') where the name doesn't include the __
		 * This method was added so that custom fields can be added to the customizable datagrids as hidden columns
		 *
		 * @param integer $intEntityQtypeId
		 * @return array $arrCustomFieldSql - with two elements: strSelect and strFrom which are to be included in a SQL statement
		 */
		public static function GenerateSql($intEntityQtypeId) {
			$arrCustomFieldSql = array();
			$arrCustomFieldSql['strSelect'] = '';
			$arrCustomFieldSql['strFrom'] = '';
			$objCustomFields = CustomField::LoadObjCustomFieldArray($intEntityQtypeId, false);
			// This could be better. This will have to be updated if we want to add custom fields.
			// IMPORTANT - LOOK CAREFULLY BELOW - SOME ARE BACKTICKS AND SOME ARE SINGLE QUOTES
			switch ($intEntityQtypeId) {
				case 1: $strId = 'asset`.`asset_id';
					break;
				case 2: $strId = 'inventory_model`.`inventory_model_id';
					break;
				case 4: $strId = 'asset_model`.`asset_model_id';
					break;
				case 5: $strId = 'manufacturer`.`manufacturer_id';
					break;
				case 6: $strId = 'category`.`category_id';
					break;
				case 7: $strId = 'company`.`company_id';
					break;
				case 8: $strId = 'contact`.`contact_id';
					break;
				case 9: $strId = 'address`.`address_id';
					break;
				
				default:
					throw new Exception('Not a valid EntityQtypeId.');
			}
			
			if ($objCustomFields) {
				foreach ($objCustomFields as $objCustomField) {
					$strAlias = $objCustomField->CustomFieldId;
					$arrCustomFieldSql['strSelect'] .= sprintf(', `cfv_%s`.`short_description` AS `%s`', $strAlias, '__' . $strAlias);
					$arrCustomFieldSql['strFrom'] .= sprintf('LEFT JOIN (`custom_field_selection` AS `cfs_%s` JOIN `custom_field_value` AS `cfv_%s` ON `cfv_%s`.`custom_field_id` = %s AND `cfs_%s`.`custom_field_value_id` = `cfv_%s`.`custom_field_value_id` AND `cfs_%s`.`entity_qtype_id` = %s) ON `cfs_%s`.`entity_id` = `%s`', $strAlias, $strAlias, $strAlias, $objCustomField->CustomFieldId, $strAlias, $strAlias, $strAlias, $intEntityQtypeId, $strAlias, $strId);
				}
			}
			
			return $arrCustomFieldSql;
		}
		
		/**
		 * This loads the array of custom fields, and their selections and values if an existing entity
		 * If it is a new entity, it only loads the custom fields without values.
		 *
		 * @param integer $intEntityQtypeId e.g., 1 == Asset, 2 == Inventory
		 * @param bool $blnEditMode if creating a new entity or editing an existing one
		 * @param integer $intEntityId e.g., AssetId, InventoryId
		 * @return Array $objCustomFieldArray of CustomField objects
		 */
		public static function LoadObjCustomFieldArray($intEntityQtypeId, $blnEditMode, $intEntityId = null) {
			$objExpansionMap[CustomField::ExpandDefaultCustomFieldValue] = true;
			$objCustomFieldArray = CustomField::LoadArrayByActiveFlagEntity(true, $intEntityQtypeId, null, null, $objExpansionMap);
			if ($objCustomFieldArray && $blnEditMode) {
				foreach ($objCustomFieldArray as $objCustomField) {
					$objCustomField->LoadExpandedArrayByEntity($intEntityQtypeId, $intEntityId);
				}
			}
			return $objCustomFieldArray;
		}
		
		/**
		 * Loads selections and values into a CustomField object
		 * Locally called protected method.
		 *
		 * @param integer $intEntityQtypeId e.g., 1 == Asset, 2 == Inventory
		 * @param integer $intEntityId e.g., AssetId, InvetoryId
		 */
		protected function LoadExpandedArrayByEntity($intEntityQtypeId, $intEntityId) {
			$this->CustomFieldSelection = CustomFieldSelection::LoadExpandedArray($intEntityId, $intEntityQtypeId, $this->intCustomFieldId);
		}
		
		/**
		 * Loads an array of entities (assets, inventory, e.g.) based on their active flag and entity qtype
		 *
		 * @param bool $blnActiveFlag if the field is active or inactive
		 * @param integer $intEntityId AssetId, InventoryId, e.g. based on 
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param Object ExpansionMap $objExpansionMap
		 * @return Array CustomField[]
		 */
		public static function LoadArrayByActiveFlagEntity($blnActiveFlag, $intEntityQtypeId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			CustomField::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$blnActiveFlag = $objDatabase->SqlVariable($blnActiveFlag, true);
			$intEntityQtypeId = $objDatabase->SqlVariable($intEntityQtypeId, true);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`custom_field`.*
					%s
				FROM
					`entity_qtype_custom_field` AS `entity_qtype_custom_field`,
					`custom_field` AS `custom_field`
					%s
				WHERE
					`custom_field`.`active_flag` %s AND
					`custom_field`.`custom_field_id` = `entity_qtype_custom_field`.`custom_field_id` AND
					`entity_qtype_custom_field`.`entity_qtype_id` %s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$blnActiveFlag, $intEntityQtypeId, 
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return CustomField::InstantiateDbResult($objDbResult);
		}
		
		/**
		 * Creates the custom field controls while looping through an array of CustomField objects
		 *
		 * @param array $objCustomFieldArray of CustomField objects
		 * @param bool $blnEditMode if creating a new entity or editing an existing one
		 * @param QForm $objForm e.g., AssetEditForm
		 * @return array $arrCustomFields of labels and inputs for all custom field controls
		 */
		public static function CustomFieldControlsCreate($objCustomFieldArray, $blnEditMode, $objForm, $blnLabels = true, $blnInputs = true, $blnSearch = false) {

			$arrCustomFields = array();
			
			for ($i=0; $i < count($objCustomFieldArray); $i++) {
				
				if ($blnLabels) {
					// Create Label for each custom field
					if (CustomFieldQtype::ToString($objCustomFieldArray[$i]->CustomFieldQtypeId) == 'textarea') {
						$arrCustomFields[$i]['lbl'] = new QPanel($objForm);
						$arrCustomFields[$i]['lbl']->CssClass='scrollBox';
					}
					else {
						$arrCustomFields[$i]['lbl'] = new QLabel($objForm);
					}
	 				$arrCustomFields[$i]['lbl']->Name = $objCustomFieldArray[$i]->ShortDescription;
	 				if ($blnEditMode && $objCustomFieldArray[$i]->CustomFieldSelection) {
	 					$arrCustomFields[$i]['lbl']->Text = nl2br($objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValue->ShortDescription);
	 				}
	 				elseif ($blnEditMode && !$objCustomFieldArray[$i]->CustomFieldSelection) {
	 					$arrCustomFields[$i]['lbl']->Text = 'None';
	 				}
				}
				
				if ($blnInputs) {
	 				// Create input for each custom field (either text or list)
	 				// Create text inputs
	 				if (CustomFieldQtype::ToString($objCustomFieldArray[$i]->CustomFieldQtypeId) == 'text' || CustomFieldQtype::ToString($objCustomFieldArray[$i]->CustomFieldQtypeId) == 'textarea') {
	 					$arrCustomFields[$i]['input'] = new QTextBox($objForm);
	 					$arrCustomFields[$i]['input']->Name = $objCustomFieldArray[$i]->ShortDescription;
	 					$arrCustomFields[$i]['input']->Required = false;
	 					if (CustomFieldQtype::ToString($objCustomFieldArray[$i]->CustomFieldQtypeId) == 'textarea' && !$blnSearch) {
	 						$arrCustomFields[$i]['input']->TextMode = QTextMode::MultiLine;
	 					}
	 					// This is so that the browser doesn't form.submit() when the user presses the enter key on a text input
	 					if (!$blnSearch && CustomFieldQtype::ToString($objCustomFieldArray[$i]->CustomFieldQtypeId) != 'textarea') {
	 						//$arrCustomFields[$i]['input']->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($objForm, 'btnSave_Click'));
	 						$arrCustomFields[$i]['input']->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
	 						$arrCustomFields[$i]['input']->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	 					}
	 					elseif ($blnSearch) {
	 						$arrCustomFields[$i]['input']->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
	 						$arrCustomFields[$i]['input']->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	 					}
	      		
	 					if ($blnEditMode && $objCustomFieldArray[$i]->CustomFieldSelection) {
	 						$arrCustomFields[$i]['input']->Text = $objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValue->ShortDescription;
	 					}
	 					// If it is a required text field, then assign the default text for a new entity only
	 					elseif (!$blnEditMode && !$blnSearch && $objCustomFieldArray[$i]->RequiredFlag && $objCustomFieldArray[$i]->DefaultCustomFieldValueId) {
	 						$arrCustomFields[$i]['input']->Text = $objCustomFieldArray[$i]->DefaultCustomFieldValue->ShortDescription;
	 					}
	 				}
	 				// Create list inputs
	 				elseif (CustomFieldQtype::ToString($objCustomFieldArray[$i]->CustomFieldQtypeId) == 'select') {
						$arrCustomFields[$i]['input'] = new QListBox($objForm);
						$arrCustomFields[$i]['input']->Name = $objCustomFieldArray[$i]->ShortDescription;
						$arrCustomFields[$i]['input']->Required = false;
								
						$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($objCustomFieldArray[$i]->CustomFieldId);
						if ($objCustomFieldValueArray) {
							// The - Select One - item cannot be removed without also updating CustomField::UpdateControls()
							$arrCustomFields[$i]['input']->AddItem('- Select One -', null);
							foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
								$objListItem = new QListItem($objCustomFieldValue->__toString(), $objCustomFieldValue->CustomFieldValueId);
								if ($blnEditMode && ($objCustomFieldArray[$i]->CustomFieldSelection) && ($objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValueId == $objCustomFieldValue->CustomFieldValueId)) {
									$objListItem->Selected = true;
								}
								// If it is a required field, then select the value on new entities by default
								elseif (!$blnEditMode && !$blnSearch && $objCustomFieldArray[$i]->RequiredFlag && $objCustomFieldArray[$i]->DefaultCustomFieldValueId && $objCustomFieldArray[$i]->DefaultCustomFieldValueId == $objCustomFieldValue->CustomFieldValueId) {
									$objListItem->Selected = true;
								}
								$arrCustomFields[$i]['input']->AddItem($objListItem);
							}
						}
	 				}
	 				
	 				if ($objCustomFieldArray[$i]->RequiredFlag && !$blnSearch) {
	 					$arrCustomFields[$i]['input']->Required = true;
	 				}
				}
 				
 				// Set reference IDs for btnSave_Click() for each custom field
 				$arrCustomFields[$i]['CustomFieldId'] = $objCustomFieldArray[$i]->CustomFieldId;
 				if ($blnEditMode && $objCustomFieldArray[$i]->CustomFieldSelection) {
 					$arrCustomFields[$i]['CustomFieldSelectionId'] = $objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldSelectionId;
 				}
			}
			
			return $arrCustomFields;
		}
		
		/**
		 * Saves the values of all of the custom controls
		 *
		 * @param array $objCustomFieldArray of CustomField objects
		 * @param bool $blnEditMode if creating a new entity or editing an existing one
		 * @param array $arrCustomFields of QControl custom fields (labels and inputs)
		 * @param integer $intEntityId e.g., AssetId, InventoryId
		 * @param integer $intEntityQtypeId e.g., 1 == Asset, 2 == Inventory
		 */
		public static function SaveControls($objCustomFieldArray, $blnEditMode, $arrCustomFields, $intEntityId, $intEntityQtypeId) {
			for ($i=0; $i < count($objCustomFieldArray); $i++) {
				
				// Text Boxes
				// if ($arrCustomFields[$i]['input'] instanceof QTextBox) {
				if ($objCustomFieldArray[$i]->CustomFieldQtypeId == 1 || $objCustomFieldArray[$i]->CustomFieldQtypeId == 3) {
					// If editing an existing asset, first create the new field value, then a selection entry for that field
					// newCustomFieldValue was used here as a workaround. QCodo creates CustomAssetFieldValue when using early binding object expansion ...
					// ... so you cannot use that variable because it gives an error
					if (!$blnEditMode || !$objCustomFieldArray[$i]->CustomFieldSelection) {
						$objCustomFieldArray[$i]->CustomFieldSelection = new CustomFieldSelection;
						$objCustomFieldArray[$i]->CustomFieldSelection->newCustomFieldValue = new CustomFieldValue;
						$objCustomFieldArray[$i]->CustomFieldSelection->newCustomFieldValue->CustomFieldId = $arrCustomFields[$i]['CustomFieldId'];
						$objCustomFieldArray[$i]->CustomFieldSelection->newCustomFieldValue->ShortDescription = $arrCustomFields[$i]['input']->Text;
						$objCustomFieldArray[$i]->CustomFieldSelection->newCustomFieldValue->Save();
						$objCustomFieldArray[$i]->CustomFieldSelection->EntityId = $intEntityId;
						$objCustomFieldArray[$i]->CustomFieldSelection->EntityQtypeId = $intEntityQtypeId;
						$objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValueId = $objCustomFieldArray[$i]->CustomFieldSelection->newCustomFieldValue->CustomFieldValueId;
						$objCustomFieldArray[$i]->CustomFieldSelection->Save();							
					}
					else {
						$objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValue->ShortDescription = $arrCustomFields[$i]['input']->Text;
						$objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValue->Save();
					}
				}
				// List Boxes
				// elseif ($arrCustomFields[$i]['input'] instanceof QListBox && $arrCustomFields[$i]['input']->SelectedValue != null) {
				elseif ($objCustomFieldArray[$i]->CustomFieldQtypeId == 2 && $arrCustomFields[$i]['input']->SelectedValue != null) {
					if (!$blnEditMode || !$objCustomFieldArray[$i]->CustomFieldSelection) {
						$objCustomFieldArray[$i]->CustomFieldSelection = new CustomFieldSelection;						
					}
					$objCustomFieldArray[$i]->CustomFieldSelection->EntityId = $intEntityId;
					$objCustomFieldArray[$i]->CustomFieldSelection->EntityQtypeId = $intEntityQtypeId;
 					$objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValueId = $arrCustomFields[$i]['input']->SelectedValue;
					$objCustomFieldArray[$i]->CustomFieldSelection->Save();						
				}
				// If the selected value is null, delete the CustomAssetFieldSelection
				elseif ($objCustomFieldArray[$i]->CustomFieldQtypeId == 2 && $arrCustomFields[$i]['input']->SelectedValue == null && $blnEditMode && $objCustomFieldArray[$i]->CustomFieldSelection) {
					$objCustomFieldArray[$i]->CustomFieldSelection->Delete();
				}
			}
		}
		
		/**
		 * Update the controls in arrCustomFields with the values from objCustomFieldArray
		 *
		 * @param CustomField[] $objCustomFieldArray
		 * @param array $arrCustomFields
		 * @return array $arrCustomFields with updated input values
		 */
		public static function UpdateControls($objCustomFieldArray, $arrCustomFields) {
			
			// Loop through all custom fields
			for ($i=0; $i < count($objCustomFieldArray); $i++) {
				// Text Boxes
				if ($objCustomFieldArray[$i]->CustomFieldQtypeId == 1 || $objCustomFieldArray[$i]->CustomFieldQtypeId == 3) {
					if ($objCustomFieldArray[$i]->CustomFieldSelection) {
						if ($objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValue) {
							$arrCustomFields[$i]['input']->Text = $objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValue->ShortDescription;
						}
					}
					else {
						$arrCustomFields[$i]['input']->Text = '';
					}
				}
				// List Boxes
				elseif ($objCustomFieldArray[$i]->CustomFieldQtypeId == 2) {
					if ($objCustomFieldArray[$i]->CustomFieldSelection != null) {
						
						$arrCustomFields[$i]['input']->SelectedValue = $objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValueId;
/*						$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($objCustomFieldArray[$i]->CustomFieldId);
						if ($objCustomFieldValueArray) {
							for ($j=0; $j < count($objCustomFieldValueArray); $j++) {
								// Set the Selected Index to the equal index plus one to account for the - Select One - list item
								// This will only work as long as the Select One option is included in every control
								if ($objCustomFieldValueArray[$j]->CustomFieldValueId == $objCustomFieldArray[$i]->CustomFieldSelection->CustomFieldValueId) {
									$arrCustomFields[$i]['input']->SelectedIndex = $j+1;
								}
							}*/
					}
					// I'm not so sure that this isn't going to cause a problem.
					// It does allow for me to set the tab index correctly because I can create the custom fields, then run UpdateControls, and the default value still gets selected 
					elseif ($objCustomFieldArray[$i]->RequiredFlag && $objCustomFieldArray[$i]->DefaultCustomFieldValueId) {
						$arrCustomFields[$i]['input']->SelectedValue = $objCustomFieldArray[$i]->DefaultCustomFieldValueId;
					}
					else {
						$arrCustomFields[$i]['input']->SelectedIndex = 0;
					}
				}
			}
			
			return $arrCustomFields;
		}
		
		/**
		 * Displays inputs and hides labels for an array of custom field controls
		 *
		 * @param array $arrCustomFields of QControls
		 */
		public static function DisplayInputs($arrCustomFields) {
			if ($arrCustomFields) {
				foreach ($arrCustomFields as $field) {
					$field['input']->Display = true;
					$field['lbl']->Display = false;
				}
			}
		}
		
		/**
		 * Displays labels and hides inputs for an array of custom field controls
		 *
		 * @param array $arrCustomFields of custom field QControls
		 */
		public static function DisplayLabels($arrCustomFields) {
			if ($arrCustomFields) {
				foreach ($arrCustomFields as $field) {
					$field['input']->Display = false;
					$field['lbl']->Display = true;
				}
			}
		}
		
		/**
		 * Updating custom field labels with their input values
		 *
		 * @param array $arrCustomFields of Custom Field QControls
		 */
		public static function UpdateLabels($arrCustomFields) {
			if ($arrCustomFields) {
				foreach ($arrCustomFields as $field) {
					if ($field['input'] instanceof QTextBox || $field['input'] instanceof QPanel) {
						$field['lbl']->Text = nl2br($field['input']->Text);
					}
					elseif ($field['input'] instanceof QListBox) {
						if ($field['input']->SelectedValue) {
						  $field['lbl']->Text = $field['input']->SelectedName;
						}
						else {
							$field['lbl']->Text = 'None';
						}
					}
				}
			}
		}
		
		public static function DeleteTextValues($objCustomFieldArray) {
			// Manually delete the CustomFieldValues for Text fields because the MySQL ON DELETE functionality will not handle it
			if ($objCustomFieldArray) {
				foreach ($objCustomFieldArray as $objCustomField) {
					// If it is a text field
					if ($objCustomField->CustomFieldQtypeId == 1 || $objCustomField->CustomFieldQtypeId == 3) {
						if ($objCustomField->CustomFieldSelection) {
							if ($objCustomField->CustomFieldSelection->CustomFieldValue) {
								$objCustomField->CustomFieldSelection->CustomFieldValue->Delete();
							}
						}
					}
				}
			}
		}
	}
?>