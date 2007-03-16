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

	require_once('../includes/prepend.inc.php');
	QApplication::Authenticate(4);
	require_once(__FORMBASE_CLASSES__ . '/AddressEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Address class.  It extends from the code-generated
	 * abstract AddressEditFormBase class.
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
	class AddressEditForm extends AddressEditFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// Custom Field Objects
		public $arrCustomFields;	
		
		// Labels
		protected $lblCompany;
		protected $lblShortDescription;
		protected $lblHeaderAddress;
		protected $lblAddress1;
		protected $lblAddress2;
		protected $lblCity;
		protected $lblStateProvince;
		protected $lblCountry;
		protected $lblPostalCode;
		protected $lblCreationDate;
		protected $lblModifiedDate;
		
		// Buttons
		protected $btnEdit;
		
		// Tab Index
		protected $intTabIndex;
		
		protected function Form_Create() {
			
			$this->intTabIndex = 1;
			
			// Call SetupAddress to either Load/Edit Existing or Create New
			$this->SetupAddress();
			if (!$this->blnEditMode) {
				
				// Load the Company from the $_GET variable passed
				$this->objAddress->CompanyId = QApplication::QueryString('intCompanyId');
			}
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			// Create labels for Address information
			$this->lblCompany_Create();
			$this->lblShortDescription_Create();
			$this->lblHeaderAddress_Create();
			$this->lblAddress1_Create();
			$this->lblAddress2_Create();
			$this->lblCity_Create();
			$this->lblStateProvince_Create();
			$this->lblCountry_Create();
			$this->lblPostalCode_Create();
			$this->lblCreationDate_Create();
			$this->lblModifiedDate_Create();
			$this->UpdateAddressLabels();

			// Create/Setup Controls for Address' Data Fields
			$this->txtShortDescription_Create();
			$this->lstCountry_Create();
			$this->txtAddress1_Create();
			$this->txtAddress2_Create();
			$this->txtCity_Create();
			$this->lstStateProvince_Create();
			$this->txtPostalCode_Create();
			$this->UpdateAddressControls();
			
			// Create all custom contact fields
			$this->customFields_Create();		

			// Create/Setup Button Action controls
			$this->btnEdit_Create();
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
			
			// Display labels for the existing address
			if ($this->blnEditMode) {
				$this->displayLabels();
			}
			// Display empty inputs to create a new address
			else {
				$this->displayInputs();
			}
		}
		
		protected function SetupAddress() {
			parent::SetupAddress();
			QApplication::AuthorizeEntity($this->objAddress, $this->blnEditMode);
		}
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}		
		
		// Create the company label
		protected function lblCompany_Create() {
			$this->lblCompany = new QLabel($this);
			$this->lblCompany->Name = 'Company';
		}
		
		// Create the Short Description Label (Address Name)
		protected function lblShortDescription_Create() {
			$this->lblShortDescription = new QLabel($this);
			$this->lblShortDescription->Name = 'Address Name';
		}
		
		protected function lblHeaderAddress_Create() {
			$this->lblHeaderAddress = new QLabel($this);
		}
		
		// Create the Address1 Label
		protected function lblAddress1_Create() {
			$this->lblAddress1 = new QLabel($this);
			$this->lblAddress1->Name = 'Address Line 1';
		}
		
		// Create the Address2 Label
		protected function lblAddress2_Create() {
			$this->lblAddress2 = new QLabel($this);
			$this->lblAddress2->Name = 'Address Line 2';
		}
		
		// Create the City Label
		protected function lblCity_Create() {
			$this->lblCity = new QLabel($this);
			$this->lblCity->Name = 'City';
		}
		
		// Create the State/Province Label
		protected function lblStateProvince_Create() {
			$this->lblStateProvince = new QLabel($this);
			$this->lblStateProvince->Name = 'State/Province';
		}
		
		// Create the Country Label
		protected function lblCountry_Create() {
			$this->lblCountry = new QLabel($this);
			$this->lblCountry->Name = 'Country';
		}
		
		// Create the Posal Code Label
		protected function lblPostalCode_Create() {
			$this->lblPostalCode = new QLabel($this);
			$this->lblPostalCode->Name = 'Postal Code';
		}
		
		// Create the Creation Date Label
		protected function lblCreationDate_Create() {
			$this->lblCreationDate = new QLabel($this);
			$this->lblCreationDate->Name = 'Date Created';
			if (!$this->blnEditMode) {
				$this->lblCreationDate->Visible = false;
			}
		}
		
		// Create the Modified Date Label
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = 'Last Modified';
			if (!$this->blnEditMode) {
				$this->lblModifiedDate->Visible = false;
			}
		}
		
		// Create the Short Description (Address Name) Input
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtShortDescription->TabIndex = $this->intTabIndex++;
			QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->txtShortDescription->ControlId));
		}
		
		// Create the Address1 Input
		protected function txtAddress1_Create() {
			parent::txtAddress1_Create();
			$this->txtAddress1->CausesValidation = true;
			$this->txtAddress1->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtAddress1->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAddress1->TabIndex = $this->intTabIndex++;
		}
		
		// Create the Address2 Input
		protected function txtAddress2_Create() {
			parent::txtAddress2_Create();
			$this->txtAddress2->CausesValidation = true;
			$this->txtAddress2->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtAddress2->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAddress2->TabIndex = $this->intTabIndex++;
		}
		
		// Create the City Input
		protected function txtCity_Create() {
			parent::txtCity_Create();
			$this->txtCity->CausesValidation = true;
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtCity->TabIndex = $this->intTabIndex++;
		}
		
		// Create the State/Province Input
		protected function lstStateProvince_Create() {
			parent::lstStateProvince_Create();
			$this->lstStateProvince->TabIndex = $this->intTabIndex++;
		}
		
		// Create the Country Input
		protected function lstCountry_Create() {
			$this->lstCountry = new QListBox($this);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->Required = true;
			if (!$this->blnEditMode) {
				$this->lstCountry->AddItem('- Select One -', null);
				$this->lstCountry->AddItem('United States', 228);
			}	
			$objCountryArray = Country::LoadAll();
			if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
				if (($this->objAddress->Country) && ($this->objAddress->Country->CountryId == $objCountry->CountryId))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}
			$this->lstCountry->AddAction(new QChangeEvent(), new QAjaxAction('lstCountry_Select'));
			$this->lstCountry->TabIndex = $this->intTabIndex++;
		}
		
		// Create the Postal Code Input
		protected function txtPostalCode_Create() {
			parent::txtPostalCode_Create();
			$this->txtPostalCode->CausesValidation = true;
			$this->txtPostalCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtPostalCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPostalCode->TabIndex = $this->intTabIndex++;
		}		
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objAddress->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(9, $this->blnEditMode, $this->objAddress->AddressId);
			
			if ($this->objAddress->objCustomFieldArray) {
				// Create the Custom Field Controls - labels and inputs (text or list) for each
				$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAddress->objCustomFieldArray, $this->blnEditMode, $this, true, true);
				if ($this->arrCustomFields) {
					foreach ($this->arrCustomFields as $field) {
						$field['input']->TabIndex = $this->intTabIndex++;
					}
				}
			}
		}				
		
		// Setup Edit Button
		protected function btnEdit_Create() {
		  $this->btnEdit = new QButton($this);
	    $this->btnEdit->Text = 'Edit';
	    $this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
	    $this->btnEdit->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnEdit_Click'));
	    $this->btnEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	    $this->btnEdit->CausesValidation = false;
	    QApplication::AuthorizeControl($this->objAddress, $this->btnEdit, 2);
		}
		
		// Setup Save Button
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnSave->TabIndex = $this->intTabIndex++;
			$this->btnSave->CausesValidation = true;
		}
		
		// Setup Cancel Button
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnCancel->CausesValidation = false;
		}
		
		// Setup Delete Button
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Address')));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->AddAction(new QEnterKeyEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Address')));
			$this->btnDelete->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnDelete->CausesValidation = false;
			QApplication::AuthorizeControl($this->objAddress, $this->btnDelete, 3);
		}
		
		// Update state/province list when country is selected
		protected function lstCountry_Select() {
			
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
		
		// Edit Button Click
		protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {

			// Hide labels and display inputs where appropriate
			$this->displayInputs();
		}

		// Save Button Click
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				$this->UpdateAddressFields();
				$this->objAddress->Save();
				
				// Assign input values to custom fields
				if ($this->arrCustomFields) {
					// Save the values from all of the custom field controls to save the asset
					CustomField::SaveControls($this->objAddress->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objAddress->AddressId, 9);
				}					
	
				if ($this->blnEditMode) {
					$this->SetupAddress();
					$this->UpdateAddressLabels();
					$this->DisplayLabels();
				}
				elseif (!$this->blnEditMode) {
					QApplication::Redirect('address_edit.php?intAddressId='.$this->objAddress->AddressId);
				}
			}
			catch (QExtendedOptimisticLockingException $objExc) {
				$this->btnCancel->Warning = sprintf('This address has been updated by another user. You must <a href="address_edit.php?intAddressId=%s">Refresh</a> to edit this address.', $this->objAddress->AddressId);
			}
		}
		
		// Cancel Button Click Actions
		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			if ($this->blnEditMode) {
				$this->DisplayLabels();
				$this->UpdateAddressControls();
			}
			else {
				QApplication::Redirect('company_edit.php?intCompanyId='.$this->objAddress->CompanyId);
			}
		}
		
		// Delete Button Click Action
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				$strRedirect = 'company_edit.php?intCompanyId='.$this->objAddress->CompanyId;
				$objCustomFieldArray = $this->objAddress->objCustomFieldArray;
				$this->objAddress->Delete();
				// Custom Field Values for text fields must be manually deleted because MySQL ON DELETE will not cascade to them
				// The values should not get deleted for select values
				CustomField::DeleteTextValues($objCustomFieldArray);
				QApplication::Redirect($strRedirect);
			}
			catch (QDatabaseExceptionBase $objExc) {
				if ($objExc->ErrorNumber == 1451) {
					$this->btnDelete->Warning = 'This address cannot be deleted because it is associated with one or more shipments or receipts.';
				}
				else {
					throw new QDatabaseExceptionBase();
				}
			}
		}
		
		// Protected Update Methods
		protected function UpdateAddressFields() {
			
			$this->objAddress->ShortDescription = $this->txtShortDescription->Text;
			$this->objAddress->Address1 = $this->txtAddress1->Text;
			$this->objAddress->Address2 = $this->txtAddress2->Text;
			$this->objAddress->City = $this->txtCity->Text;
			$this->objAddress->StateProvinceId = $this->lstStateProvince->SelectedValue;
			$this->objAddress->CountryId = $this->lstCountry->SelectedValue;
			$this->objAddress->PostalCode = $this->txtPostalCode->Text;
		}
		
		// Update the address controls with the original values on Cancel
		protected function UpdateAddressControls() {
			
			$this->txtShortDescription->Text = $this->objAddress->ShortDescription;
			$this->txtAddress1->Text = $this->objAddress->Address1;
			$this->txtAddress2->Text = $this->objAddress->Address2;
			$this->txtCity->Text = $this->objAddress->City;
			$this->lstCountry->SelectedValue = $this->objAddress->CountryId;
			$this->lstCountry_Select();
			$this->lstStateProvince->SelectedValue = $this->objAddress->StateProvinceId;
			$this->txtPostalCode->Text = $this->objAddress->PostalCode;
			$this->arrCustomFields = CustomField::UpdateControls($this->objAddress->objCustomFieldArray, $this->arrCustomFields);
		}
		
		// Update the Company Labels
		protected function UpdateAddressLabels() {
			
			if ($this->blnEditMode) {
				$this->lblHeaderAddress->Text = $this->objAddress->ShortDescription;
			} else {
				$this->lblHeaderAddress->Text = 'New Address';
			}
			if ($this->objAddress->CompanyId) {
				$this->lblCompany->Text = $this->objAddress->Company->ShortDescription;
			}
			$this->lblShortDescription->Text = $this->objAddress->ShortDescription;
			$this->lblAddress1->Text = $this->objAddress->Address1;
			$this->lblAddress2->Text = $this->objAddress->Address2;
			$this->lblCity->Text = $this->objAddress->City;
			if ($this->objAddress->StateProvince) {
				$this->lblStateProvince->Text = $this->objAddress->StateProvince->__toString();
			}
			if ($this->objAddress->Country) {
				$this->lblCountry->Text = $this->objAddress->Country->__toString();
			}
			$this->lblPostalCode->Text = $this->objAddress->PostalCode;
			if ($this->objAddress->CreationDate) {
				$this->lblCreationDate->Text = $this->objAddress->CreationDate->PHPDate('Y-m-d H:i:s') . ' by ' . $this->objAddress->CreatedByObject->__toStringFullName();
			}
			if ($this->objAddress->ModifiedDate) {
				$this->lblModifiedDate->Text = $this->objAddress->ModifiedDate . ' by ' . $this->objAddress->ModifiedByObject->__toStringFullName();
			}
			else {
				$this->lblModifiedDate->Text = '';
			}
			
			// Update custom labels
			if ($this->arrCustomFields) {
				CustomField::UpdateLabels($this->arrCustomFields);
			}
		}
		
		// Display the labels and buttons for Contact Viewing mode
		protected function DisplayLabels() {
	
			// Do not display inputs
			$this->txtShortDescription->Display = false;
			$this->txtAddress1->Display = false;
			$this->txtAddress2->Display = false;
			$this->txtCity->Display = false;
			$this->lstStateProvince->Display = false;
			$this->lstCountry->Display = false;
			$this->txtPostalCode->Display = false;
			
			// Do not display Cancel and Save buttons
			$this->btnCancel->Display = false;
			$this->btnSave->Display = false;		
			
			// Display Labels for Viewing mode
			$this->lblShortDescription->Display = true;
			$this->lblAddress1->Display = true;
			$this->lblAddress2->Display = true;
			$this->lblCity->Display = true;
			$this->lblStateProvince->Display = true;
			$this->lblCountry->Display = true;
			$this->lblPostalCode->Display = true;
			
			// Display custom field labels
			if ($this->arrCustomFields) {
				CustomField::DisplayLabels($this->arrCustomFields);
			}	
	
			// Display Edit and Delete buttons
			$this->btnEdit->Display = true;
			$this->btnDelete->Display = true;
		}
		
		// Display the inputs for Contact Edit mode
		protected function DisplayInputs() {
			
			// Do not display labels
			$this->lblShortDescription->Display = false;
			$this->lblAddress1->Display = false;
			$this->lblAddress2->Display = false;
			$this->lblCity->Display = false;
			$this->lblStateProvince->Display = false;
			$this->lblCountry->Display = false;
			$this->lblPostalCode->Display = false;
	
			// Do not display Edit and Delete buttons
			$this->btnEdit->Display = false;
			$this->btnDelete->Display = false;
			
			// Display inputs
			$this->txtShortDescription->Display = true;
			$this->txtAddress1->Display = true;
			$this->txtAddress2->Display = true;
			$this->txtCity->Display = true;
			$this->lstStateProvince->Display = true;
			$this->lstCountry->Display = true;
			$this->txtPostalCode->Display = true;
			
			// Display custom field inputs
	    if ($this->arrCustomFields) {
	    	CustomField::DisplayInputs($this->arrCustomFields);
	    }	
			
			// Display Cancel and Save buttons
			$this->btnCancel->Display = true;
			$this->btnSave->Display = true;		
		}				
	}
	AddressEditForm::Run('AddressEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/contacts/address_edit.tpl.php');
?>