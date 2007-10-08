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
	// Include the classfile for ContactEditPanelBase
	require(__PANELBASE_CLASSES__ . '/ContactEditPanelBase.class.php');

	class ContactEditPanel extends ContactEditPanelBase {
		
		// Specify the Location of the Template (feel free to modify) for this Panel
		protected $strTemplate = '../contacts/ContactEditPanel.tpl.php';
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
			$arrControls = array($this->txtFirstName, $this->txtLastName, $this->txtTitle, $this->txtEmail, $this->txtDescription, $this->txtPhoneOffice, $this->txtPhoneHome, $this->txtPhoneMobile, $this->txtFax);
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
			
			$this->lstCompany->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstCompany_Change'));
		}
		
		protected function lstAddress_Create() {
			$this->lstAddress = new QListBox($this);
			$this->lstAddress->Name = QApplication::Translate('Address');
			$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
			if ($this->lstCompany->SelectedValue) {
				$objAddressArray = Address::LoadArrayByCompanyId($this->lstCompany->SelectedValue);
			}
			else {
				$objAddressArray = Address::LoadAll();
			}
			if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
				if (($this->objContact->Address) && ($this->objContact->Address->AddressId == $objAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstAddress->AddItem($objListItem);
			}
		}
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objContact->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Contact, $this->blnEditMode, $this->objContact->ContactId);
			
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objContact->objCustomFieldArray, $this->blnEditMode, $this, false, true, false);
		}
		
		// Update address field when company is selected
		public function lstCompany_Change() {
			// Clear out the items from lstAddress
			$this->lstAddress->RemoveAllItems();
			if ($this->lstCompany->SelectedValue) {
				// Load the selected company
				$objCompany = Company::Load($this->lstCompany->SelectedValue);
				// Get all available addresses for that company
				if ($objCompany) {
					$objAddressArray = $objCompany->GetAddressArray();
					$this->lstAddress->Enabled = true;
				}
				else {
					$objAddressArray = null;
					$this->lstAddress->Enabled = false;
				}
			}
			else {
				// Or load all addresses for all companies
				$objAddressArray = Address::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
				$this->lstAddress->Enabled = true;
			}
			$this->lstAddress->AddItem('- Select One -', null);
			if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
				$this->lstAddress->AddItem($objListItem);
			}
		}
		
		// Save Button Click Actions
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$this->UpdateContactFields();
			$this->objContact->Save();
			
			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				// Save the values from all of the custom field controls
				CustomField::SaveControls($this->objContact->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objContact->ContactId, EntityQtype::Contact);
			}
			
			if ($this->ActionParameter) {
				$lstContact = $this->objForm->GetControl($this->ActionParameter);
			}
			elseif ($this->objForm->lstContact) {
				$lstContact = $this->objForm->lstContact;
			}
			else {
				$lstContact = null;
			}
			
			if ($lstContact) {
				$lstContact->AddItem($this->objContact->__toString(), $this->objContact->ContactId);
				$lstContact->SelectedValue = $this->objContact->ContactId;
			}
			
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