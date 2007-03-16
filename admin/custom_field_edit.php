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

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for CustomFieldEditFormBase
	require(__FORMBASE_CLASSES__ . '/CustomFieldEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the CustomField class.  It extends from the code-generated
	 * abstract CustomFieldEditFormBase class.
	 *
	 * Any display custimizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * Additional qform control objects can also be defined and used here, as well.
	 * 
	 * @package Application
	 * @subpackage FormDraftObjects
	 * 
	 */
	class CustomFieldEditForm extends CustomFieldEditFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;		
		
		protected $lblCustomFieldQtype;
		protected $lstEntityQtype;
		protected $txtValue;
		protected $txtDefaultValue;
		protected $lstDefaultValue;
		protected $btnAdd;
		protected $dtgValue;
		protected $lblHeaderCustomField;
		protected $lblSelectionOption;
		
		protected function Form_Create() {
			
			// Call SetupCustomField to either Load/Edit Existing or Create New
			$this->SetupCustomField();
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();

			// Create/Setup Controls for CustomField's Data Fields
			$this->lstCustomFieldQtype_Create();
			$this->lblCustomFieldQtype_Create();
			$this->txtShortDescription_Create();
			$this->lstEntityQtype_Create();
			$this->txtDefaultValue_Create();
			$this->lstDefaultValue_Create();
			$this->chkActiveFlag_Create();
			$this->chkRequiredFlag_Create();
			$this->lblHeaderCustomField_Create();
			$this->lblSelectionOption_Create();
			
			// Create/Setup Controls for Custom Field Options
			// CustomFieldQtypeId 2 = Select
			$this->txtValue_Create();
			$this->btnAdd_Create();
			$this->dtgValue_Create();
			
			// If the Qtype is 'Select', show the list of options
			if ($this->objCustomField->CustomFieldQtypeId == 2) {
				$this->DisplayOptions(true);
			}
			else {
				$this->DisplayOptions(false);
			}

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();			
		}
		
		protected function Form_PreRender() {
			
			$this->dtgValue->TotalItemCount = CustomFieldValue::CountByCustomFieldId($this->objCustomField->CustomFieldId);
			if ($this->dtgValue->TotalItemCount == 0) {
				$this->dtgValue->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgValue->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgValue->LimitClause)
					array_push($objClauses, $objClause);
				$this->dtgValue->DataSource = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId, $objClauses);
				$this->dtgValue->ShowHeader = true;
			}
		}
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
  	
		// Create and Setup lstCustomFieldQtype
		protected function lstCustomFieldQtype_Create() {
			$this->lstCustomFieldQtype = new QListBox($this);
			$this->lstCustomFieldQtype->Name = QApplication::Translate('Field Type');
			$this->lstCustomFieldQtype->Required = true;
			foreach (CustomFieldQtype::$NameArray as $intId => $strValue)
				$this->lstCustomFieldQtype->AddItem(new QListItem(ucfirst($strValue), $intId, $this->objCustomField->CustomFieldQtypeId == $intId));
			$this->lstCustomFieldQtype->AddAction(new QChangeEvent(), new QAjaxAction('lstCustomFieldQtype_Change'));
			if ($this->blnEditMode) {
				// Even though sometimes this isn't displayed, it must be created because we use the selected value in some AJAX updates
				$this->lstCustomFieldQtype->Display = false;
			}
		}
		
		// Create and Setup lblCustomFieldQtype
		protected function lblCustomFieldQtype_Create() {
			$this->lblCustomFieldQtype = new QLabel($this);
			$this->lblCustomFieldQtype->Name = 'Field Type';
			if (!$this->blnEditMode) {
				$this->lblCustomFieldQtype->Display = false;
			}
			else {
				$this->lblCustomFieldQtype->Text = ucfirst(CustomFieldQtype::ToString($this->objCustomField->CustomFieldQtypeId));
			}
		}
		
		// Create/Setup the list of EntityQtypes (either Assets or Inventory)
		protected function lstEntityQtype_Create() {
			
			$this->lstEntityQtype = new QListBox($this);
			$this->lstEntityQtype->Name = 'Active For';
			$this->lstEntityQtype->SelectionMode = QSelectionMode::Multiple;
			$this->lstEntityQtype->Rows = 5;
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
			$objAssetListItem = new QListItem('Assets', 1);
			$objInventoryListItem = new QListItem('Inventory', 2);
			$objAssetModelListItem = new QListItem('Asset Model', 4);
			$objManufacturerListItem = new QListItem('Manufacturer', 5);
			$objCategoryListItem = new QListItem('Category', 6);
			$objCompanyListItem = new QListItem('Company', 7);
			$objContactListItem = new QListItem('Contact', 8);
			$objAddressListItem = new QListItem('Address', 9);
			if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					if ($objEntityQtypeCustomField->EntityQtypeId == 1) {
						$objAssetListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 2) {
						$objInventoryListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 4) {
						$objAssetModelListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 5) {
						$objManufacturerListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 6) {
						$objCategoryListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 7) {
						$objCompanyListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 8) {
						$objContactListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 9) {
						$objAddressListItem->Selected = true;
					}					
				}
			}
			$this->lstEntityQtype->AddItem($objAssetListItem);
			$this->lstEntityQtype->AddItem($objInventoryListItem);
			$this->lstEntityQtype->AddItem($objAssetModelListItem);
			$this->lstEntityQtype->AddItem($objManufacturerListItem);
			$this->lstEntityQtype->AddItem($objCategoryListItem);
			$this->lstEntityQtype->AddItem($objCompanyListItem);
			$this->lstEntityQtype->AddItem($objContactListItem);
			$this->lstEntityQtype->AddItem($objAddressListItem);
		}
		
		// Create/Setup the Value textbox
		protected function txtValue_Create() {
			
			$this->txtValue = new QTextBox($this);
			$this->txtValue->Name = "Selection Option";
			$this->txtValue->CausesValidation = false;
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAdd_Click'));
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create/Setup the Default Value textbox - for text or textarea custom fields
		protected function txtDefaultValue_Create() {
			
			$this->txtDefaultValue = new QTextBox($this);
			$this->txtDefaultValue->Name = "Default Value";
			$this->txtDefaultValue->CausesValidation = false;
			if (!$this->objCustomField->RequiredFlag) {
				$this->txtDefaultValue->Enabled = false;
			}
			if ($this->blnEditMode && $this->objCustomField->DefaultCustomFieldValueId && $this->objCustomField->CustomFieldQtypeId != 2) {
				$this->txtDefaultValue->Text = $this->objCustomField->DefaultCustomFieldValue->ShortDescription;
			}
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
				$this->txtDefaultValue->Display = false;
			}
			
			$this->txtDefaultValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtDefaultValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create/Setup the Default Value listbox - for select custom fields
		protected function lstDefaultValue_Create() {
			$this->lstDefaultValue = new QListBox($this);
			$this->lstDefaultValue->Name = "Default Value";
			$this->lstDefaultValue->CausesValidation = false;
			
			// Load all custom field values for this custom field
			$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
			if ($objCustomFieldValueArray) {
				foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
					$this->lstDefaultValue->AddItem(new QlistItem($objCustomFieldValue->ShortDescription, $objCustomFieldValue->CustomFieldValueId, $objCustomFieldValue->CustomFieldValueId == $this->objCustomField->DefaultCustomFieldValueId));
				}
			}
			// Only enable if there are values in the drop-down box and the required flag is checked
			if ($this->blnEditMode && $this->objCustomField->RequiredFlag && $objCustomFieldValueArray) {
				$this->lstDefaultValue->Enabled = true;
			}
			else {
				$this->lstDefaultValue->Enabled = false;
			}
			// Only display if this is a SELECT custom field (not a text or textarea)
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
				$this->lstDefaultValue->Display = true;
			}
			else {
				$this->lstDefaultValue->Display = false;
			}
			$this->lstDefaultValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->lstDefaultValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
		}
		
		// Create/Setup the active flag checkbox
		protected function chkActiveFlag_Create() {
			parent::chkActiveFlag_Create();
			
			// Select fields cannot be active unless they have selections
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2 && $this->lstDefaultValue->ItemCount == 0) {
				$this->chkActiveFlag->Enabled = false;
			}
			
			$this->chkActiveFlag->CausesValidation = true;
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create/Setup the Required Flag checkbox
		protected function chkRequiredFlag_Create() {
			parent::chkRequiredFlag_Create();
			
			// Don't enable the active flag for select custom fields unless there are already selections
			// This is because Required custom fields MUST have a default value
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId ==2 && $this->lstDefaultValue->ItemCount == 0) {
				$this->chkRequiredFlag->Enabled = false;
			}
			
			$this->chkRequiredFlag->CausesValidation = false;
			$this->chkRequiredFlag->AddAction(new QChangeEvent(), new QAjaxAction('chkRequiredFlag_Click'));
			$this->chkRequiredFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}		
		
		// Create/Setup the Short Description textbox
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}			
		
		// Create/Setup header label
		protected function lblHeaderCustomField_Create() {
			$this->lblHeaderCustomField = new QLabel($this);
			$this->lblHeaderCustomField->Text = ($this->objCustomField->ShortDescription != '') ? $this->objCustomField->ShortDescription : 'New Custom Field';			
		}
		
		//Create/Setup "Selection Option" label
		protected function lblSelectionOption_Create() {
			$this->lblSelectionOption = new QLabel($this);
			$this->lblSelectionOption->Text = 'Selection Option:';
			if (!$this->blnEditMode || $this->objCustomField->CustomFieldQtypeId != 2) {
				$this->lblSelectionOption->Display = false;
			}
		}
		
		// Create/Setup the Add button
		protected function btnAdd_Create() {
			
			$this->btnAdd = new QButton($this);
			$this->btnAdd->Text = 'Add';
			$this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));
			$this->btnAdd->CausesValidation = false;
		}

		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
		}		
		
		// Create/Setup the Options/Values datagrid
		protected function dtgValue_Create() {
			
			$this->dtgValue = new QDataGrid($this);
  		$this->dtgValue->CellPadding = 5;
  		$this->dtgValue->CellSpacing = 0;
  		$this->dtgValue->CssClass = "datagrid";
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgValue->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgValue);
      $this->dtgValue->Paginator = $objPaginator;
      $this->dtgValue->ItemsPerPage = 20;
          
      $this->dtgValue->AddColumn(new QDataGridColumn('Option', '<?= $_ITEM->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription, false), 'CssClass' => "dtg_column")));
      $this->dtgValue->AddColumn(new QDataGridColumn('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->CreatedByObject->LastName, false, QQN::CustomField()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CreatedByObject->LastName, QQN::CustomField()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
      $this->dtgValue->AddColumn(new QDataGridColumn('Creation Date', '<?= $_ITEM->CreationDate->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CreationDate, false), 'CssClass' => "dtg_column")));
      $this->dtgValue->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
      
      $objStyle = $this->dtgValue->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgValue->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgValue->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
		}
		
		// Render the remove button column in the datagrid
		public function RemoveColumn_Render(CustomFieldValue $objCustomFieldValue) {
			
      $strControlId = 'btnRemove' . $objCustomFieldValue->CustomFieldValueId;
      $btnRemove = $this->GetControl($strControlId);
      if (!$btnRemove) {
          // Create the Remove button for this row in the DataGrid
          // Use ActionParameter to specify the ID of the asset
          $btnRemove = new QButton($this->dtgValue, $strControlId);
          $btnRemove->Text = 'Remove';
          $btnRemove->ActionParameter = $objCustomFieldValue->CustomFieldValueId;
          $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemove_Click'));
          $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemove_Click'));
          $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $btnRemove->CausesValidation = false;
      }
      
      return $btnRemove->RenderWithError(false);
		}
		
		// This method triggers when the required checkbox is clicked
		protected function chkRequiredFlag_Click($strFormId, $strControlId, $strParameter) {
			
			// Enable the default value textbox or select box if appropriate
			if ($this->chkRequiredFlag->Checked == true) {
				// If the custom field qtype is text or textarea
				if ($this->lstCustomFieldQtype->SelectedValue != 2) {
					$this->txtDefaultValue->Enabled = true;
				}
				// If the custom field is SELECT and there is at least 1 selection available
				elseif ($this->lstCustomFieldQtype->SelectedValue == 2 && $this->lstDefaultValue->ItemCount > 0) {
					$this->lstDefaultValue->Enabled = true;
				}
			}
			// Disable textbox and listbox if the Required checkbox is unchecked
			elseif ($this->chkRequiredFlag->Checked == false) {
				$this->txtDefaultValue->Enabled = false;
				$this->lstDefaultValue->Enabled = false;
			}
		}
		
		// This method triggers when the custom field qtype listbox is changed
		// This can only happen when creating a new custom field - the ability to change custom field types has been removed for Beta2
		protected function lstCustomFieldQtype_Change($strFormId, $strControlId, $strParameter) {
			// If this is a select custom field
			if ($this->lstCustomFieldQtype->SelectedValue == 2) {
				$this->txtDefaultValue->Display = false;
				$this->lstDefaultValue->Display = true;
				// If there are selections for the custom field
				if ($this->lstDefaultValue->ItemCount > 0 && $this->chkRequiredFlag->Checked) {
					$this->lstDefaultValue->Enabled = true;
				}
				// If there are no selections for this custom field
				elseif ($this->lstDefaultValue->ItemCount == 0) {
					$this->lstDefaultValue->Enabled = false;
					$this->chkActiveFlag->Enabled = false;
					$this->chkActiveFlag->Checked = false;
					$this->chkRequiredFlag->Enabled = false;
					$this->chkRequiredFlag->Checked = false;
				}
				else {
					$this->lstDefaultValue->Enabled = false;
				}
			}
			// If the custom field is text or textarea
			elseif ($this->lstCustomFieldQtype->SelectedValue != 2) {
				$this->lstDefaultValue->Display = false;
				$this->txtDefaultValue->Display = true;
				if ($this->chkRequiredFlag->Checked == true) {
					$this->txtDefaultValue->Enabled = true;
				}
			}
		}
		
		// Remove button click action for each asset in the datagrid
		// This only affects select custom fields, not text or textarea
		public function btnRemove_Click($strFormId, $strControlId, $strParameter) {
			
			$intCustomFieldValueId = $strParameter;
			
			$blnError = false;
			// Trigger an error if a user tries to remove the default value of a required
			if ($intCustomFieldValueId == $this->objCustomField->DefaultCustomFieldValueId) {
				$blnError = true;
      	$this->dtgValue->Warning = "You cannot remove the default value. Please select another default value and then remove this selection.";
			}
			
			if (!$blnError) {
				$objCustomFieldValue = CustomFieldValue::Load($intCustomFieldValueId);
				
				// In case two users are removing CustomFieldValues at the same time
				if ($objCustomFieldValue instanceof CustomFieldValue) {
					$objCustomFieldValue->Delete();
				}
				
				// Rebuild the Default Value List
				// First remove all selections from the list
				$this->lstDefaultValue->RemoveAllItems();
				// Add back the items that are remaining
				$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
				if ($objCustomFieldValueArray) {
					foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
						$this->lstDefaultValue->AddItem(new QListItem($objCustomFieldValue->ShortDescription, $objCustomFieldValue->CustomFieldValueId, $objCustomFieldValue->CustomFieldValueId == $this->objCustomField->DefaultCustomFieldValueId));
					}
				}
				// Disable fields if there are no selections
				if ($this->lstDefaultValue->ItemCount == 0 && $this->chkRequiredFlag->Enabled == true) {
					
					$this->chkRequiredFlag->Enabled = false;
					$this->chkRequiredFlag->Checked = false;
					$this->chkActiveFlag->Enabled = false;
					$this->chkActiveFlag->Checked = false;
					
					// Save these flags in case the administrator clicks away without saving these two changes
					// Otherwise you could have a required and active Custom Field that doesn't have any selections
					$this->objCustomField->RequiredFlag = false;
					$this->objCustomField->ActiveFlag = false;
					$this->objCustomField->Save();
					
					$this->lstDefaultValue->Enabled = false;
				}
			}
		}		
		
		// Create a new CustomFieldValue when the Add button is clicked
		protected function btnAdd_Click($strFormId, $strControlId, $strParameter) {
			
			$objCustomFieldValue = new CustomFieldValue();
			$objCustomFieldValue->CustomFieldId = $this->objCustomField->CustomFieldId;
			$objCustomFieldValue->ShortDescription = $this->txtValue->Text;
			$objCustomFieldValue->Save();
			
			$this->lstDefaultValue->AddItem(new QListItem($objCustomFieldValue->ShortDescription, $objCustomFieldValue->CustomFieldValueId));
			$this->txtValue->Text = '';
			
			if ($this->lstDefaultValue->ItemCount > 0 && $this->chkRequiredFlag->Enabled == false) {
				$this->chkActiveFlag->Enabled = true;
				$this->chkRequiredFlag->Enabled = true;
			}
		}
		
		// Control AjaxActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				
				$blnError = false;
				
				if ($this->chkRequiredFlag->Checked) {
					if ($this->lstCustomFieldQtype->SelectedValue != 2 && $this->txtDefaultValue->Text == '') {
						$blnError = true;
						$this->btnCancel->Warning = 'A custom field must have a default value if it is required.';
					}
				}
				if (count($this->lstEntityQtype->SelectedItems) == 0) {
					$blnError = true;
					$this->btnCancel->Warning = 'You must select at least one field in the Apply To list box.';
				}
				
				if (!$blnError) {
					$this->UpdateCustomFieldFields();
					$this->objCustomField->Save();
					
					// If this field is a required field
					if ($this->objCustomField->RequiredFlag) {
						// If this custom field is a text or textarea, 
						if ($this->lstCustomFieldQtype->SelectedValue != 2) {
							// Assign the existing DefaultCustomFieldValue
							if ($this->blnEditMode && $this->objCustomField->DefaultCustomFieldValueId) {
								$objCustomFieldValue = CustomFieldValue::Load($this->objCustomField->DefaultCustomFieldValueId);
							}
							// Create a new CustomFieldValue
							else {
								$objCustomFieldValue = new CustomFieldValue();
								$objCustomFieldValue->CustomFieldId = $this->objCustomField->CustomFieldId;
							}
							// Save the new CustomFieldValue
							$objCustomFieldValue->ShortDescription = $this->txtDefaultValue->Text;
							$objCustomFieldValue->Save();
							// Set the DefaultCustomFieldValueId of the custom field
							$this->objCustomField->DefaultCustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
						}
						// If this is a select custom field
						elseif ($this->lstCustomFieldQtype->SelectedValue == 2) {
							$this->objCustomField->DefaultCustomFieldValueId = $this->lstDefaultValue->SelectedValue;
						}
						
						// Save the custom field
						$this->objCustomField->Save();
						// Update the EntityQtypeCustomFields if they have changed (or if it is a new custom field
						$this->UpdateEntityQtypeCustomFields();
						// Update all of the CustomFieldSelections and values for the EntityQtypes
						$this->objCustomField->UpdateRequiredFieldSelections();
					}
					// If the field is not a required field
					else {
						$this->objCustomField->DefaultCustomFieldValueId = null;
						$this->objCustomField->Save();
						$this->UpdateEntityQtypeCustomFields();
					}
	
					// If it is a new select Custom Field, then stay to add options
					if (!$this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
						QApplication::Redirect('custom_field_edit.php?intCustomFieldId=' . $this->objCustomField->CustomFieldId);
					}
					else {
						QApplication::Redirect('custom_field_list.php');
					}
				}
			}
			catch(QExtendedOptimisticLockingException $objExc) {
				
				$this->btnCancel->Warning = sprintf('This custom field has been updated by another user. You must <a href="custom_field_edit.php?intCustomFieldId=%s">Refresh</a> to edit this custom field.', $this->objCustomField->CustomFieldId);
			}
		}
		
		// Protected Update Methods
		protected function UpdateCustomFieldFields() {
			
			// If switching from select to text or textarea, delete any CustomFieldValues that may exist
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2 && ($this->lstCustomFieldQtype->SelectedValue == 1 || $this->lstCustomFieldQtype->SelectedValue == 3)) {
				$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
				if ($objCustomFieldValueArray) {
					foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
						$objCustomFieldValue->Delete();
					}
				}
			}
			
			// Assign the object variables from the form controls
			$this->objCustomField->CustomFieldQtypeId = $this->lstCustomFieldQtype->SelectedValue;
			$this->objCustomField->ShortDescription = $this->txtShortDescription->Text;
			$this->objCustomField->ActiveFlag = $this->chkActiveFlag->Checked;
			$this->objCustomField->RequiredFlag = $this->chkRequiredFlag->Checked;
		}
		
		protected function UpdateEntityQtypeCustomFields() {
			
			// Delete any EntityQtypeCustomFields that were selected but are no longer selected
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
			if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					// Determines whether or not a entityqtypecustomfield can stay or gets deleted
					$blnKeep = false;
					if ($this->lstEntityQtype->SelectedItems) {
						foreach ($this->lstEntityQtype->SelectedItems as $objEntityQtypeItem) {
							if ($objEntityQtypeCustomField->EntityQtypeId == $objEntityQtypeItem->Value) {
								$blnKeep = true;
							}
						}
					}
					// If the EntityQtype needs to be deleted, you must delete the CustomFieldValues for text and textarea, and CustomFieldSelections for all types
					if (!$blnKeep) {
						$objAndCondition = QQ::AndCondition(QQ::Equal(QQN::CustomFieldSelection()->EntityQtypeId, $objEntityQtypeCustomField->EntityQtypeId), QQ::Equal(QQN::CustomFieldSelection()->CustomFieldValue->CustomFieldId, $this->objCustomField->CustomFieldId));
						$objClauses = QQ::Clause(QQ::Expand(QQN::CustomFieldSelection()->CustomFieldValue));
						// Select all CustomFieldSelections (and expanded CustomFieldValues) by EntityQtypeId and CustomFieldId
						$objCustomFieldSelectionArray = CustomFieldSelection::QueryArray($objAndCondition, $objClauses);
						if ($objCustomFieldSelectionArray) {
							foreach ($objCustomFieldSelectionArray as $objCustomFieldSelection) {
								if ($this->objCustomField->CustomFieldQtypeId != 2) {
									// Deleting the CustomFieldValue will MySQL CASCADE to delete the CustomFieldSelection also
									$objCustomFieldSelection->CustomFieldValue->Delete();
								}
								else {
									// If it is a select box, only delete the CustomFieldSelection (the CustomFieldValue stays unless it is removed as a selection entirely)
									$objCustomFieldSelection->Delete();
								}
							}
						}
						// Delete the EntityQtypeCustomField last
						$objEntityQtypeCustomField->Delete();
					}
				}
			}
			
			// Insert the new EntityQtypeCustomFields
			if ($this->lstCustomFieldQtype->SelectedItems) {
				foreach ($this->lstEntityQtype->SelectedItems as $objEntityQtypeItem) {
					// If the field doesn't already exist, then it needs to be created
					if (!($objEntityQtypeCustomField = EntityQtypeCustomField::LoadByEntityQtypeIdCustomFieldId($objEntityQtypeItem->Value, $this->objCustomField->CustomFieldId))) {
						$objEntityQtypeCustomField = new EntityQtypeCustomField();
						$objEntityQtypeCustomField->CustomFieldId = $this->objCustomField->CustomFieldId;
						$objEntityQtypeCustomField->EntityQtypeId = $objEntityQtypeItem->Value;
						$objEntityQtypeCustomField->Save();
					}
				}
			}
		}
		
		// Display the fields for adding options to select lists
		protected function DisplayOptions($blnValue = true) {
			
			$this->txtValue->Visible = $blnValue;
			$this->btnAdd->Visible = $blnValue;
			$this->dtgValue->Visible = $blnValue;
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/custom_field_edit.php.inc as the included HTML template file
	CustomFieldEditForm::Run('CustomFieldEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/custom_field_edit.tpl.php');
?>