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
		
		protected $lstEntityQtype;
		protected $txtValue;
		protected $btnAdd;
		protected $dtgValue;
		protected $lblHeaderCustomField;
		
		protected function Form_Create() {
			
			// Call SetupCustomField to either Load/Edit Existing or Create New
			$this->SetupCustomField();
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();

			// Create/Setup Controls for CustomField's Data Fields
			$this->lstCustomFieldQtype_Create();
			$this->txtShortDescription_Create();
			$this->chkActiveFlag_Create();
			$this->chkRequiredFlag_Create();
			$this->lstEntityQtype_Create();
			$this->lblHeaderCustomField_Create();
			
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
			$this->lstCustomFieldQtype->Name = QApplication::Translate('Custom Field Qtype');
			$this->lstCustomFieldQtype->Required = true;
			foreach (CustomFieldQtype::$NameArray as $intId => $strValue)
				$this->lstCustomFieldQtype->AddItem(new QListItem(ucfirst($strValue), $intId, $this->objCustomField->CustomFieldQtypeId == $intId));
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
				}
			}
			$this->lstEntityQtype->AddItem($objAssetListItem);
			$this->lstEntityQtype->AddItem($objInventoryListItem);
			$this->lstEntityQtype->AddItem($objAssetModelListItem);
			$this->lstEntityQtype->AddItem($objManufacturerListItem);
			$this->lstEntityQtype->AddItem($objCategoryListItem);
		}
		
		// Create/Setup the Value textbox
		protected function txtValue_Create() {
			
			$this->txtValue = new QTextBox($this);
			$this->txtValue->Name = "Selection Option";
			$this->txtValue->CausesValidation = false;
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAdd_Click'));
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function chkActiveFlag_Create() {
			parent::chkActiveFlag_Create();
			$this->chkActiveFlag->CausesValidation = true;
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function chkRequiredFlag_Create() {
			parent::chkRequiredFlag_Create();
			$this->chkRequiredFlag->CausesValidation = true;
			$this->chkRequiredFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->chkRequiredFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}		
		
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
      
      return $btnRemove->Render(false);
		}
		
		// Remove button click action for each asset in the datagrid
		public function btnRemove_Click($strFormId, $strControlId, $strParameter) {

			$intCustomFieldValueId = $strParameter;
			$objCustomFieldValue = CustomFieldValue::Load($intCustomFieldValueId);
			// In case two users are removing CustomFieldValues at the same time
			if ($objCustomFieldValue instanceof CustomFieldValue) {
				$objCustomFieldValue->Delete();
			}
		}		
		
		// Create a new CustomFieldValue when the Add button is clicked
		protected function btnAdd_Click($strFormId, $strControlId, $strParameter) {
			
			$objCustomFieldValue = new CustomFieldValue();
			$objCustomFieldValue->CustomFieldId = $this->objCustomField->CustomFieldId;
			$objCustomFieldValue->ShortDescription = $this->txtValue->Text;
			$objCustomFieldValue->Save();
			$this->txtValue->Text = '';
		}
		
		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				$this->UpdateCustomFieldFields();
				$this->objCustomField->Save();
				$this->UpdateEntityQtypeCustomFields();
	
				// If it is a new select Custom Field, then stay to add options
				if (!$this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
					QApplication::Redirect('custom_field_edit.php?intCustomFieldId=' . $this->objCustomField->CustomFieldId);
				}
				else {
					QApplication::Redirect('custom_field_list.php');
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
			
			// Delete any existing EntityQtypeCustomFields
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
			if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					$objEntityQtypeCustomField->Delete();
				}
			}
			
			// Insert the new EntityQtypeCustomFields
			if ($this->lstCustomFieldQtype->SelectedItems) {
				foreach ($this->lstEntityQtype->SelectedItems as $objEntityQtypeItem) {
					$objEntityQtypeCustomField = new EntityQtypeCustomField();
					$objEntityQtypeCustomField->CustomFieldId = $this->objCustomField->CustomFieldId;
					$objEntityQtypeCustomField->EntityQtypeId = $objEntityQtypeItem->Value;
					$objEntityQtypeCustomField->Save();
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