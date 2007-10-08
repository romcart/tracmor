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
	// Include the classfile for AddressEditPanelBase
	require(__PANELBASE_CLASSES__ . '/AddressEditPanelBase.class.php');

	class AddressEditPanel extends AddressEditPanelBase {
		
		// Specify the Location of the Template (feel free to modify) for this Panel
		protected $strTemplate = '../contacts/AddressEditPanel.tpl.php';
		// An array of custom fields
		public $arrCustomFields;
		protected $intCompanyId;
		
		public function __construct($objParentObject, $strClosePanelMethod, $objAssetModel = null, $strControlId = null, $intCompanyId = null) {
			
			$this->intCompanyId = $intCompanyId;
			
			try {
				parent::__construct($objParentObject, $strClosePanelMethod, $objAssetModel, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Create all custom asset model fields
			$this->customFields_Create();
			
			// Add Enter Key Events to each control except the Cancel Button
			$arrControls = array($this->txtShortDescription, $this->txtAddress1, $this->txtAddress2, $this->txtCity, $this->lstStateProvince, $this->txtPostalCode);
			foreach ($arrControls as $ctlControl) {
				$ctlControl->CausesValidation = true;
				$ctlControl->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
				$ctlControl->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			}
			
			$this->strOverflow = QOverflow::Auto;
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;
		}
		
		protected function lstCompany_Create() {
			$this->lstCompany = new QListBox($this);
			$this->lstCompany->Name = QApplication::Translate('Company');
			$this->lstCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
			$objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
			if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
				if ($objCompany->CompanyId == $this->intCompanyId) {
					$objListItem->Selected = true;
				}
				$this->lstCompany->AddItem($objListItem);
			}
		}
		
		protected function lstCountry_Create() {
			$this->lstCountry = new QListBox($this);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->Required = true;
			$this->lstCountry->AddItem('- Select One -', null);
			$this->lstCountry->AddItem('United States', 228);
			$objCountryArray = Country::LoadAll();
			if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
				if (($this->objAddress->Country) && ($this->objAddress->Country->CountryId == $objCountry->CountryId))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}
			$this->lstCountry->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstCountry_Select'));
		}
		
		// Update state/province list when country is selected
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
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objAddress->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Address, $this->blnEditMode, $this->objAddress->AddressId);
			
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAddress->objCustomFieldArray, $this->blnEditMode, $this, false, true, false);
		}
		
		// Save Button Click Actions
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$this->UpdateAddressFields();
			$this->objAddress->Save();
			
			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				// Save the values from all of the custom field controls
				CustomField::SaveControls($this->objAddress->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objAddress->AddressId, EntityQtype::Address);
			}
			
			if ($this->ActionParameter) {
				$lstAddress = $this->objForm->GetControl($this->ActionParameter);
			}
			elseif ($this->objForm->lstAddress) {
				$lstAddress = $this->objForm->lstAddress;
			}
			else {
				$lstAddress = null;
			}
			$lstAddress->AddItem($this->txtShortDescription->Text, $this->objAddress->AddressId);
			$lstAddress->SelectedValue = $this->objAddress->AddressId;
			
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
		}
		
		// Cancel Button Click Action
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
		}
	}
?>