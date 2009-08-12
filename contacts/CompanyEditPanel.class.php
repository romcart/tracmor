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
	// Include the classfile for CompanyEditPanelBase
	require(__PANELBASE_CLASSES__ . '/CompanyEditPanelBase.class.php');

	class CompanyEditPanel extends CompanyEditPanelBase {
		
		// Specify the Location of the Template (feel free to modify) for this Panel
		protected $strTemplate = '../contacts/CompanyEditPanel.tpl.php';
		// An array of custom fields
		public $arrCustomFields;
		public $arrAddressCustomFields;
		
		// Address Object
		protected $objAddress;
		
		// Primary Address inputs for new company
		public $txtAddressShortDescription;
		public $lstCountry;
		public $txtAddress1;
		public $txtAddress2;
		public $txtCity;
		public $lstStateProvince;
		public $txtPostalCode;	
		
		public function __construct($objParentObject, $strClosePanelMethod, $objCompany = null, $strControlId = null) {
			
			try {
				parent::__construct($objParentObject, $strClosePanelMethod, $objCompany, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			$this->txtAddressShortDescription_Create();
			$this->txtAddress1_Create();
			$this->txtAddress2_Create();
			$this->txtCity_Create();
			$this->lstStateProvince_Create();
			$this->txtPostalCode_Create();
			$this->lstCountry_Create();
			$this->arrAddressCustomFields_Create();
			
			// Create all custom asset model fields
			$this->customFields_Create();
			
			// Set Display logic of the Custom Fields
			$this->UpdateCustomFields();
			
			// Add Enter Key Events to each control except the Cancel Button
			$arrControls = array($this->txtShortDescription, $this->txtLongDescription, $this->txtWebsite, $this->txtEmail, $this->txtTelephone, $this->txtFax, $this->txtAddressShortDescription, $this->txtAddress1, $this->txtAddress2, $this->txtCity, $this->lstStateProvince, $this->txtPostalCode);
			foreach ($arrControls as $ctlControl) {
				$ctlControl->CausesValidation = true;
				$ctlControl->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
				$ctlControl->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			}
			
			$this->strOverflow = QOverflow::Auto;
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;
		}
		
		// Create and Setup txtShortDescription
		protected function txtAddressShortDescription_Create() {
			$this->txtAddressShortDescription = new QTextBox($this);
			$this->txtAddressShortDescription->Name = QApplication::Translate('Address Name');
			$this->txtAddressShortDescription->CausesValidation = true;
			$this->txtAddressShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtAddressShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create the Country Input
		protected function lstCountry_Create() {
			$this->lstCountry = new QListBox($this);
			$this->lstCountry->Name = QApplication::Translate('Country');
			if (!$this->blnEditMode) {
				$this->lstCountry->AddItem('- Select One -', null);
				$this->lstCountry->AddItem('United States', 228);
			}	
			$objCountryArray = Country::LoadAll();
			if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
				$this->lstCountry->AddItem($objListItem);
			}
			$this->lstCountry->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstCountry_Select'));
		}

		// Create and Setup txtAddress1
		protected function txtAddress1_Create() {
			$this->txtAddress1 = new QTextBox($this);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->CausesValidation = true;
			$this->txtAddress1->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtAddress1->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
		}

		// Create and Setup txtAddress2
		protected function txtAddress2_Create() {
			$this->txtAddress2 = new QTextBox($this);
			$this->txtAddress2->Name = QApplication::Translate('Address 2');
			$this->txtAddress2->CausesValidation = true;
			$this->txtAddress2->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtAddress2->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
		}

		// Create and Setup txtCity
		protected function txtCity_Create() {
			$this->txtCity = new QTextBox($this);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->CausesValidation = true;
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
		}

		// Create and Setup lstStateProvince
		protected function lstStateProvince_Create() {
			$this->lstStateProvince = new QListBox($this);
			$this->lstStateProvince->Name = QApplication::Translate('State Province');
			$this->lstStateProvince->AddItem('- Select One -', null);
			$objStateProvinceArray = StateProvince::LoadAll();
			if ($objStateProvinceArray) foreach ($objStateProvinceArray as $objStateProvince) {
				$objListItem = new QListItem($objStateProvince->__toString(), $objStateProvince->StateProvinceId);
				$this->lstStateProvince->AddItem($objListItem);
			}
		}

		// Create and Setup txtPostalCode
		protected function txtPostalCode_Create() {
			$this->txtPostalCode = new QTextBox($this);
			$this->txtPostalCode->Name = QApplication::Translate('Postal Code');
			$this->txtPostalCode->CausesValidation = true;
			$this->txtPostalCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtPostalCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());		
		}		
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objCompany->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Company, $this->blnEditMode, $this->objCompany->CompanyId);
			
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objCompany->objCustomFieldArray, $this->blnEditMode, $this, false, true, false);
		}
		
		// Create all custom fields for addresses (only when creating a new company
		protected function arrAddressCustomFields_Create() {
			
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objAddress = new Address();
			$this->objAddress->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Address, $this->blnEditMode);
			
			if ($this->objAddress->objCustomFieldArray) {
				$this->arrAddressCustomFields = CustomField::CustomFieldControlsCreate($this->objAddress->objCustomFieldArray, $this->blnEditMode, $this, false, true, false);
				if ($this->arrAddressCustomFields) {
					foreach ($this->arrAddressCustomFields as $field) {
						$field['input']->TabIndex = $this->intTabIndex++;
					}
				}
			}
		}
		
		// Update state/province list when country is selected for Primary address if creating a new company
		public function lstCountry_Select() {
			
			// Save the currently selected StateProvince
			$intStateProvinceId = $this->lstStateProvince->SelectedValue;
			// Clear out the items from lstAddress
			$this->lstStateProvince->RemoveAllItems();
			if ($this->lstCountry->SelectedValue) {
				// Load the selected country
				$objCountry = Country::Load($this->lstCountry->SelectedValue);
				// Get all available state/provinces for that company
				$objStateProvinceArray = $objCountry->GetStateProvinceArray();
			}
			else {
				// Or load all addresses for all companies
				$objStateProvinceArray = StateProvince::LoadAll();
			}
			$this->lstStateProvince->AddItem('- Select One -', null);
			if ($objStateProvinceArray) foreach ($objStateProvinceArray as $objStateProvince) {
				// Create a new ListItem Object
				$objListItem = new QListItem($objStateProvince->__toString(), $objStateProvince->StateProvinceId);
				// If this State/Province is the one previously selected, make it selected again
				if ($intStateProvinceId == $objStateProvince->StateProvinceId)
					$objListItem->Selected = true;
				// Add the ListItem object
				$this->lstStateProvince->AddItem($objListItem);
				// Enable the input
				$this->lstStateProvince->Enabled = true;
			}
			// If there are no State/Provinces for a country, disable the input
			else {
				$this->lstStateProvince->Enabled = false;
			}
		}		
		
		//Set display logic for the CustomFields
		protected function UpdateCustomFields(){
			if($this->arrCustomFields)foreach ($this->arrCustomFields as $objCustomField) {	
				//If the role doesn't have edit access for the custom field and the custom field is required, the field shows as a label with the default value
				if (!$objCustomField['blnEdit']){				
					$objCustomField['lbl']->Display=true;
					$objCustomField['input']->Display=false;
					if(($objCustomField['blnRequired']))
						$objCustomField['lbl']->Text=$objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue->__toString();			
				}		
			}
			
		}
		
		// Save Button Click Actions
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			
			if ($this->txtAddressShortDescription->Text) {
				if (!$this->txtAddress1->Text) {
					$this->txtAddress1->Warning = 'Address is a required field.';
					$blnError = true;
				}
				if (!$this->txtCity->Text) {
					$this->txtCity->Warning = 'City is a required field.';
					$blnError = true;
				}
				if (!$this->txtPostalCode->Text) {
					$this->txtPostalCode->Warning = 'Postal Code is a required field.';
					$blnError = true;
				}
				if (!$this->lstCountry->SelectedValue) {
					$this->lstCountry->Warning = 'Country is a required field.';
					$blnError = true;
				}
				if ($blnError) {
					return;
				}
			}
			elseif ($this->txtAddress1->Text || $this->txtAddress2->Text || $this->txtCity->Text || $this->lstStateProvince->SelectedValue || $this->txtPostalCode->Text || $this->lstCountry->SelectedValue) {
				$this->txtAddressShortDescription->Warning = 'Address Name is a required field.';
				return;
			}
			
			if (Company::LoadByShortDescription($this->txtShortDescription->Text)) {
				$this->txtShortDescription->Warning = 'A company with that name already exists. Please try another';
				$blnError = true;
				return;
			}
			
			$this->UpdateCompanyFields();
			$this->objCompany->Save();
			
			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				// Save the values from all of the custom field controls
				CustomField::SaveControls($this->objCompany->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objCompany->CompanyId, EntityQtype::Company);
			}
			$this->SaveNewAddress();
			
			if ($this->ActionParameter) {
				$lstCompany = $this->objForm->GetControl($this->ActionParameter);
			}
			elseif ($this->objForm->lstCompany) {
				$lstCompany = $this->objForm->lstCompany;
			}
			else {
				$lstCompany = null;
			}
			
			if ($lstCompany) {
				$lstCompany->AddItem($this->txtShortDescription->Text, $this->objCompany->CompanyId);
				$lstCompany->SelectedValue = $this->objCompany->CompanyId;
			}
			
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
		}
		
		// Save Primary Address for new Companies {
		protected function SaveNewAddress() {
			
			if ($this->txtAddressShortDescription->Text) {
				
				if ($this->objAddress->objCustomFieldArray) {
					$objAddressCustomFieldArray = $this->objAddress->objCustomFieldArray;
				}
				$this->objAddress = new Address();
				$this->objAddress->CompanyId = $this->objCompany->CompanyId;
				$this->objAddress->ShortDescription = $this->txtAddressShortDescription->Text;
				$this->objAddress->Address1 = $this->txtAddress1->Text;
				$this->objAddress->Address2 = $this->txtAddress2->Text;
				$this->objAddress->City = $this->txtCity->Text;
				$this->objAddress->StateProvinceId = $this->lstStateProvince->SelectedValue;
				$this->objAddress->PostalCode = $this->txtPostalCode->Text;
				$this->objAddress->CountryId = $this->lstCountry->SelectedValue;
				$this->objAddress->Save();
				$this->objCompany->AddressId = $this->objAddress->AddressId;
				$this->objCompany->Save();
				
				if ($this->arrAddressCustomFields) {
					CustomField::SaveControls($objAddressCustomFieldArray, $this->blnEditMode, $this->arrAddressCustomFields, $this->objCompany->Address->AddressId, 9);
				}
				
				return true;
			}
			else {
				return false;
			}
		}
		
		// Cancel Button Click Action
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
		}
	}
?>