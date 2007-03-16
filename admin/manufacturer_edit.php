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
	// Include the classfile for ManufacturerEditFormBase
	require(__FORMBASE_CLASSES__ . '/ManufacturerEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Manufacturer class.  It extends from the code-generated
	 * abstract ManufacturerEditFormBase class.
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
	class ManufacturerEditForm extends ManufacturerEditFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		protected $lblHeaderManufacturer;
		
		// Custom Field Objects
		public $arrCustomFields;
		
		// Generate tab indexes
		protected $intNextTabIndex = 1;
		
		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			// Call SetupManufacturer to either Load/Edit Existing or Create New
			$this->SetupManufacturer();

			// Create/Setup Controls for Manufacturer's Data Fields
			$this->lblHeaderManufacturer_Create();
			$this->lblManufacturerId_Create();
			$this->txtShortDescription_Create();
			$this->txtLongDescription_Create();
			$this->txtImagePath_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create all custom asset fields
			$this->customFields_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		protected function lblHeaderManufacturer_Create() {
			$this->lblHeaderManufacturer = new QLabel($this);
			$this->lblHeaderManufacturer->Text = ($this->objManufacturer->ShortDescription != '') ? $this->objManufacturer->ShortDescription : 'New Manufacturer';
		}
		
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtShortDescription->TabIndex=1;
			$this->intNextTabIndex++;
		}
		
		protected function txtLongDescription_Create() {
			parent::txtLongDescription_Create();
			$this->txtLongDescription->TabIndex=2;
			$this->intNextTabIndex++;
		}
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objManufacturer->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(5, $this->blnEditMode, $this->objManufacturer->ManufacturerId);
			
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objManufacturer->objCustomFieldArray, $this->blnEditMode, $this, true, true);
			
			foreach ($this->arrCustomFields as $objCustomField) {
				$objCustomField['input']->TabIndex=$this->GetNextTabIndex();
			}
		}
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->TabIndex = $this->getNextTabIndex();
		}		
		
		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				$this->UpdateManufacturerFields();
				$this->objManufacturer->Save();
	
				// Assign input values to custom fields
				if ($this->arrCustomFields) {
					// Save the values from all of the custom field controls to save the asset
					CustomField::SaveControls($this->objManufacturer->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objManufacturer->ManufacturerId, 5);
				}
	
				$this->RedirectToListPage();
			}
			catch(QExtendedOptimisticLockingException $objExc) {
				
				$this->btnCancel->Warning = sprintf('This manufacturer has been updated by another user. You must <a href="manufacturer_edit.php?intManufacturerId=%s">Refresh</a> to edit this manufacturer.', $this->objManufacturer->ManufacturerId);
			}
		}
		
		// Delete Manufacturer
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			
			
			try {
				$objCustomFieldArray = $this->objManufacturer->objCustomFieldArray;
				$this->objManufacturer->Delete();
				// Custom Field Values for text fields must be manually deleted because MySQL ON DELETE will not cascade to them
				// The values should not get deleted for select values
				CustomField::DeleteTextValues($objCustomFieldArray);
				$this->RedirectToListPage();
			}
			catch (QDatabaseExceptionBase $objExc) {
				if ($objExc->ErrorNumber == 1451) {
					$this->btnCancel->Warning = 'This manufacturer cannot be deleted because it is associated with one or more models.';
				}
				else {
					throw new QDatabaseExceptionBase();
				}
			}
		}
		
		protected function getNextTabIndex() {
			return ++$this->intNextTabIndex;
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/manufacturer_edit.php.inc as the included HTML template file
	ManufacturerEditForm::Run('ManufacturerEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/manufacturer_edit.tpl.php');
?>