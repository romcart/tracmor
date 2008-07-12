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
require_once(__FORMBASE_CLASSES__ . '/ContactEditFormBase.class.php');
require('../contacts/CompanyEditPanel.class.php');
require('../contacts/AddressEditPanel.class.php');

/**
 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
 * of the Contact class.  It extends from the code-generated
 * abstract ContactEditFormBase class.
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
class ContactEditForm extends ContactEditFormBase {

	// General Form Variables
	protected $objCompany;

	// Header Tabs
	protected $ctlHeaderMenu;
	// Shortcut Menu
	protected $ctlShortcutMenu;

	// This needs to be public so that the New Company Dialog can access it
	public $lstCompany;

	// Custom Field Objects
	public $arrCustomFields;

	// Company Custom Field array
	public $arrCompanyCustomFields;

	// Labels
	protected $lblCompany;
	protected $lblHeaderContact;
	protected $lblFirstName;
	protected $lblLastName;
	protected $lblTitle;
	protected $lblEmail;
	protected $pnlDescription;
	protected $lblAddress;
	protected $lblPhoneOffice;
	protected $lblPhoneMobile;
	protected $lblPhoneHome;
	protected $lblFax;
	protected $lblCreationDate;
	protected $lblModifiedDate;
	protected $lblNewCompany;
	protected $lblNewAddress;

	// Inputs
	public $lstAddress;

	// Buttons
	protected $btnEdit;
	protected $atcAttach;
	protected $pnlAttachments;

	// Dialog Boxes
	protected $dlgNewCompany;
	protected $dlgNewAddress;

	// Tab Index
	protected $intTabIndex;

	// Set true if the Built-in Fields has to be rendered
	public $blnViewBuiltInFields;
	public $blnEditBuiltInFields;


	protected function Form_Create() {
			
		$this->intTabIndex = 1;
			
		// Call SetupCompany to either Load/Edit Existing or Create New
		$this->SetupContact();
		if (!$this->blnEditMode && QApplication::QueryString('intCompanyId')) {
			// Load the Company from the $_GET variable passed
			$this->objContact->CompanyId = QApplication::QueryString('intCompanyId');
		}
			
		// Create the Header Menu
		$this->ctlHeaderMenu_Create();
		// Create the Shortcut Menu
		$this->ctlShortcutMenu_Create();
			
		// Create labels for Contact information
		$this->lblCompany_Create();
		$this->lblHeaderContact_Create();
		$this->lblFirstName_Create();
		$this->lblLastName_Create();
		$this->lblTitle_Create();
		$this->lblEmail_Create();
		$this->lblAddress_Create();
		$this->pnlDescription_Create();
		$this->lblPhoneOffice_Create();
		$this->lblPhoneMobile_Create();
		$this->lblPhoneHome_Create();
		$this->lblFax_Create();
		$this->lblCreationDate_Create();
		$this->lblModifiedDate_Create();
		$this->lblNewCompany_Create();
		$this->lblNewAddress_Create();
		$this->UpdateContactLabels();

		// Create/Setup Controls for Contact's Data Fields
		$this->lstCompany_Create();
		$this->txtFirstName_Create();
		$this->txtLastName_Create();
		$this->txtTitle_Create();
		$this->txtEmail_Create();
		$this->txtDescription_Create();
		$this->txtPhoneOffice_Create();
		$this->txtPhoneHome_Create();
		$this->txtPhoneMobile_Create();
		$this->txtFax_Create();
		$this->lstAddress_Create();
			
		// New Dialog Boxes
		$this->dlgNewCompany_Create();
		$this->dlgNewAddress_Create();
			
		// Create all custom contact fields
		$this->customFields_Create();
		// Set Display logic of BuiltIn
		$this->UpdateBuiltInFields();
		// Set Display logic of Contact Green Plus Button
		$this->UpdateCompanyAccess();
		//Set Display logic of Address Green Plus Button
		$this->UpdateAddressAccess();

		$this->UpdateContactControls();
			
		// Create all custom company fields
		//$this->arrCompanyCustomFields_Create();
			
		// Create/Setup Button Action controls
		$this->btnEdit_Create();
		$this->btnSave_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();
		$this->atcAttach_Create();
		$this->pnlAttachments_Create();
			
		// Display labels for the existing company
		if ($this->blnEditMode) {
			$this->displayLabels();
		}
		// Display empty inputs to create a new contact
		else {
			$this->displayInputs();
		}
	}

	protected function SetupContact() {
		parent::SetupContact();
		QApplication::AuthorizeEntity($this->objContact, $this->blnEditMode);
	}

	// Create and Setup the Header Composite Control
	protected function ctlHeaderMenu_Create() {
		$this->ctlHeaderMenu = new QHeaderMenu($this);
	}

	// Create and Setp the Shortcut Menu Composite Control
	protected function ctlShortcutMenu_Create() {
		$this->ctlShortcutMenu = new QShortcutMenu($this);
	}

	// Setup the Company Label
	protected function lblCompany_Create() {
		$this->lblCompany = new QLabel($this);
		$this->lblCompany->Name = 'Company';
		$this->lblCompany->HtmlEntities = false;
	}

	// Setup Contact Header Label
	protected function lblHeaderContact_Create() {
		$this->lblHeaderContact = new Qlabel($this);
	}

	// Setup the First Name Label
	protected function lblFirstName_Create() {
		$this->lblFirstName = new Qlabel($this);
		$this->lblFirstName->Name = 'First Name';
	}

	// Setup the Last Name Label
	protected function lblLastName_Create() {
		$this->lblLastName = new Qlabel($this);
		$this->lblLastName->Name = 'First Name';
	}

	// Setup the Title Label
	protected function lblTitle_Create() {
		$this->lblTitle = new QLabel($this);
		$this->lblTitle->Name = 'Title';
	}

	// Setup the Email Label
	protected function lblEmail_Create() {
		$this->lblEmail = new QLabel($this);
		$this->lblEmail->Name = 'Email';
	}

	// Setup the Description Panel
	protected function pnlDescription_Create() {
		$this->pnlDescription = new QPanel($this);
		$this->pnlDescription->CssClass = 'scrollBox';
		$this->pnlDescription->Name = 'Description';
	}

	// Setup the Primary Address Label
	protected function lblAddress_Create() {
		$this->lblAddress = new QLabel($this);
		$this->lblAddress->Name = 'Primary Address';
		$this->lblAddress->HtmlEntities = false;
	}

	// Setup the Office Phone Label
	protected function lblPhoneOffice_Create() {
		$this->lblPhoneOffice = new QLabel($this);
		$this->lblPhoneOffice->Name = 'Office Phone';
	}

	// Setup the Mobile Phone Label
	protected function lblPhoneMobile_Create() {
		$this->lblPhoneMobile = new QLabel($this);
		$this->lblPhoneMobile->Name = 'Mobile Phone';
	}

	// Setup the Home Phone Label
	protected function lblPhoneHome_Create() {
		$this->lblPhoneHome = new QLabel($this);
		$this->lblPhoneHome->Name = 'Home Phone';
	}

	// Setup the Fax Label
	protected function lblFax_Create() {
		$this->lblFax = new QLabel($this);
		$this->lblFax->Name = 'Fax';
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

	protected function lblNewCompany_Create() {
		$this->lblNewCompany = new QLabel($this);
		$this->lblNewCompany->HtmlEntities = false;
		$this->lblNewCompany->Text = '<img src="../images/add.png">';
		$this->lblNewCompany->ToolTip = "New Company";
		$this->lblNewCompany->CssClass = "add_icon";
		$this->lblNewCompany->AddAction(new QClickEvent(), new QAjaxAction('lblNewCompany_Click'));
	}

	protected function lblNewAddress_Create() {
		$this->lblNewAddress = new QLabel($this);
		$this->lblNewAddress->HtmlEntities = false;
		$this->lblNewAddress->Text = '<img src="../images/add.png">';
		$this->lblNewAddress->ToolTip = "New Address";
		$this->lblNewAddress->CssClass = "add_icon";
		$this->lblNewAddress->AddAction(new QClickEvent(), new QAjaxAction('lblNewAddress_Click'));
	}

	// Setup the Company Input
	protected function lstCompany_Create() {
		$this->lstCompany = new QListBox($this);
		$this->lstCompany->Name = QApplication::Translate('Company');
		$this->lstCompany->Required = true;
		if (!$this->blnEditMode) {
			$this->lstCompany->AddItem('- Select One -', null);
			//$this->lstCompany->AddItem('New Company', -1, false);
		}
			
		$objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
		if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
			$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
			if (($this->objContact->Company) && ($this->objContact->Company->CompanyId == $objCompany->CompanyId))
			$objListItem->Selected = true;
			$this->lstCompany->AddItem($objListItem);
		}
		$this->lstCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstCompany_Select'));
		QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->lstCompany->ControlId));
		$this->lstCompany->TabIndex = $this->intTabIndex++;
	}

	// Setup the First Name Input
	protected function txtFirstName_Create() {
		parent::txtFirstName_Create();
		$this->txtFirstName->CausesValidation = true;
		$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtFirstName->TabIndex = $this->intTabIndex++;
	}

	// Setup the Last Name Input
	protected function txtLastName_Create() {
		parent::txtLastName_Create();
		$this->txtLastName->CausesValidation = true;
		$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtLastName->TabIndex = $this->intTabIndex++;
	}

	// Setup the Title Input
	protected function txtTitle_Create() {
		parent::txtTitle_Create();
		$this->txtTitle->CausesValidation = true;
		$this->txtTitle->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtTitle->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtTitle->TabIndex = $this->intTabIndex++;
	}

	// Setup the Email Input
	protected function txtEmail_Create() {
		parent::txtEmail_Create();
		$this->txtEmail->CausesValidation = true;
		$this->txtEmail->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtEmail->TabIndex = $this->intTabIndex++;
	}

	// Setup the Description Input
	protected function txtDescription_Create() {
		parent::txtDescription_Create();
		$this->txtDescription->TabIndex = $this->intTabIndex++;
	}

	// Setup the Office Phone Input
	protected function txtPhoneOffice_Create() {
		parent::txtPhoneOffice_Create();
		$this->txtPhoneOffice->CausesValidation = true;
		$this->txtPhoneOffice->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtPhoneOffice->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtPhoneOffice->TabIndex = $this->intTabIndex++;
	}

	// Setup the Mobile Phone Input
	protected function txtPhoneMobile_Create() {
		parent::txtPhoneMobile_Create();
		$this->txtPhoneMobile->CausesValidation = true;
		$this->txtPhoneMobile->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtPhoneMobile->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtPhoneMobile->TabIndex = $this->intTabIndex++;
	}

	// Setup the Home Phone Input
	protected function txtPhoneHome_Create() {
		parent::txtPhoneHome_Create();
		$this->txtPhoneHome->CausesValidation = true;
		$this->txtPhoneHome->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtPhoneHome->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtPhoneHome->TabIndex = $this->intTabIndex++;
	}

	// Setup the Fax Input
	protected function txtFax_Create() {
		parent::txtFax_Create();
		$this->txtFax->CausesValidation = true;
		$this->txtFax->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtFax->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtFax->TabIndex = $this->intTabIndex++;
	}

	// Create and Setup Primary Address Input
	protected function lstAddress_Create() {
		$this->lstAddress = new QListBox($this);
		$this->lstAddress->Name = 'Primary Address';
		$this->lstAddress->AddItem('- Select One -', null);
		if ($this->blnEditMode || $this->objContact->CompanyId) {
			$objAddressArray = $this->objContact->Company->GetAddressArray();
			if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
				$this->lstAddress->AddItem($objListItem);
			}
		}
		$this->lstAddress->TabIndex = $this->intTabIndex++;
	}

	// New Company Dialog Box
	protected function dlgNewCompany_Create() {
		$this->dlgNewCompany = new QDialogBox($this);
		$this->dlgNewCompany->AutoRenderChildren = true;
		$this->dlgNewCompany->Width = '440px';
		$this->dlgNewCompany->Overflow = QOverflow::Auto;
		$this->dlgNewCompany->Padding = '10px';
		$this->dlgNewCompany->Display = false;
		$this->dlgNewCompany->BackColor = '#FFFFFF';
		$this->dlgNewCompany->MatteClickable = false;
		$this->dlgNewCompany->CssClass = "modal_dialog";
	}

	// New Company Dialog Box
	protected function dlgNewAddress_Create() {
		$this->dlgNewAddress = new QDialogBox($this);
		$this->dlgNewAddress->AutoRenderChildren = true;
		$this->dlgNewAddress->Width = '440px';
		$this->dlgNewAddress->Overflow = QOverflow::Auto;
		$this->dlgNewAddress->Padding = '10px';
		$this->dlgNewAddress->Display = false;
		$this->dlgNewAddress->BackColor = '#FFFFFF';
		$this->dlgNewAddress->MatteClickable = false;
		$this->dlgNewAddress->CssClass = "modal_dialog";
	}

	// Create all Custom Contact Fields
	protected function customFields_Create() {

		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
		$this->objContact->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(8, $this->blnEditMode, $this->objContact->ContactId);
			
		if ($this->objContact->objCustomFieldArray) {
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objContact->objCustomFieldArray, $this->blnEditMode, $this, true, true);

		}
		$this->UpdateCustomFields();
	}

	// Setup Edit Button
	protected function btnEdit_Create() {
		$this->btnEdit = new QButton($this);
		$this->btnEdit->Text = 'Edit';
		$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
		$this->btnEdit->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnEdit_Click'));
		$this->btnEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnEdit->CausesValidation = false;
		QApplication::AuthorizeControl($this->objContact, $this->btnEdit, 2);
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
		$this->btnCancel->TabIndex = $this->intTabIndex++;
	}

	// Setup Delete Button
	protected function btnDelete_Create() {
		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Contact')));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Contact')));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnDelete->CausesValidation = false;
		QApplication::AuthorizeControl($this->objContact, $this->btnDelete, 3);
	}

	// Setup Attach File Asset Button
	protected function atcAttach_Create() {
		$this->atcAttach = new QAttach($this, null, EntityQtype::Contact, $this->objContact->ContactId);
		QApplication::AuthorizeControl($this->objContact, $this->atcAttach, 2);
	}

	// Setup Attachments Panel
	public function pnlAttachments_Create() {
		$this->pnlAttachments = new QAttachments($this, null, EntityQtype::Contact, $this->objContact->ContactId);
	}

	// Update address field when company is selected
	public function lstCompany_Select() {
			
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
			//$objAddressArray = Address::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
			//$this->lstAddress->Enabled = true;
			$objAddressArray = null;
		}
		$this->lstAddress->AddItem('- Select One -', null);
		if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
			$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
			// Select the proper AddressID if editing an existing contact
			if ($this->blnEditMode && ($this->objContact->Address) && ($this->objContact->AddressId == $objAddress->AddressId))
			$objListItem->Selected = true;
			$this->lstAddress->AddItem($objListItem);
		}
			
		/*			if ($this->lstCompany->SelectedValue && $this->lstCompany->SelectedValue == -1) {
		 $this->pnlNewCompany->Visible = true;
			}
			else {
			$this->pnlNewCompany->Visible = false;
			}*/
	}

	// This is called when the 'new' label is clicked
	public function lblNewCompany_Click($strFormId, $strControlId, $strParameter) {
		// Avoid Doubleclick issues
		if (!$this->dlgNewCompany->Display) {
			// Create the panel, assigning it to the Dialog Box
			$pnlCompanyEdit = new CompanyEditPanel($this->dlgNewCompany, 'CloseCompanyEditPanel');
			// Show the dialog box
			$this->dlgNewCompany->ShowDialogBox();
		}
	}

	// This is called when the 'new' label is clicked
	public function lblNewAddress_Click($strFormId, $strControlId, $strParameter) {
		// Avoid doubleclick issues
		if (!$this->dlgNewAddress->Display) {
			// Create the panel, assigning it to the Dialog Box
			$pnlAddressEdit = new AddressEditPanel($this->dlgNewAddress, 'CloseAddressEditPanel', null, null, $this->lstCompany->SelectedValue);
			// Show the dialog box
			$this->dlgNewAddress->ShowDialogBox();
		}
	}

	// Edit Button Click
	protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {

		// Hide labels and display inputs where appropriate
		$this->displayInputs();
			
		$this->UpdateBuiltInFields();
		$this->UpdateCustomFields();
	}

	// Control ServerActions
	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		try {

			/*				if ($this->pnlNewCompany->Visible) {
			 if (!$this->txtCompanyShortDescription->Text) {
			 $this->txtCompanyShortDescription->Warning = 'Company Name is a required field.';
			 return;
			 }
			 else {
			 $this->SaveNewCompany();
			 }
				}*/

			$this->UpdateContactFields();
			$this->objContact->Save();

			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				// Save the values from all of the custom field controls to save the asset
				CustomField::SaveControls($this->objContact->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objContact->ContactId, 8);
			}

			if ($this->blnEditMode) {
				//$this->SetupContact();
				$this->UpdateContactLabels();
				$this->DisplayLabels();
			}
			elseif (!$this->blnEditMode) {
				QApplication::Redirect('company_edit.php?intCompanyId='.$this->objContact->CompanyId);
			}
		}
		catch (QExtendedOptimisticLockingException $objExc) {
			$this->btnCancel->Warning = sprintf('This contact has been updated by another user. You must <a href="contact_edit.php?intContactId=%s">Refresh</a> to edit this contact.', $this->objContact->ContactId);
		}
	}

	// Cancel Button Click Actions
	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		if ($this->blnEditMode) {
			$this->DisplayLabels();
			$this->UpdateContactControls();
		}
		else {
			if (QApplication::QueryString('intCompanyId')) {
				QApplication::Redirect(sprintf('company_edit.php?intCompanyId=%s', QApplication::QueryString('intCompanyId')));
			}
			elseif ($this->objContact->CompanyId) {
				QApplication::Redirect(sprintf('company_edit.php?intCompanyId=%s', $this->objContact->CompanyId));
			}
			else {
				QApplication::Redirect('contact_list.php');
			}
		}
	}

	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

		try {
			$objCustomFieldArray = $this->objContact->objCustomFieldArray;
			$this->objContact->Delete();
			// Custom Field Values for text fields must be manually deleted because MySQL ON DELETE will not cascade to them
			// The values should not get deleted for select values
			CustomField::DeleteTextValues($objCustomFieldArray);
			$this->RedirectToListPage();
		}
		catch (QDatabaseExceptionBase $objExc) {
			if ($objExc->ErrorNumber == 1451) {
				$this->btnDelete->Warning = 'This contact cannot be deleted because it is associated with one or more shipments or receipts.';
			}
			else {
				throw new QDatabaseExceptionBase();
			}
		}
	}

	// Protected Update Methods
	protected function UpdateContactFields() {
			
		// Assign the new CompanyId if it was just created
		//			if ($this->pnlNewCompany->Visible) {
		//				$this->objContact->CompanyId = $this->objCompany->CompanyId;
		//			}
		//			// Assign the selected Company
		//			else {
		$this->objContact->CompanyId = $this->lstCompany->SelectedValue;
		//			}
		$this->objContact->FirstName = $this->txtFirstName->Text;
		$this->objContact->LastName = $this->txtLastName->Text;
		$this->objContact->Title = $this->txtTitle->Text;
		$this->objContact->Email = $this->txtEmail->Text;
		$this->objContact->AddressId = $this->lstAddress->SelectedValue;
		$this->objContact->Description = $this->txtDescription->Text;
		$this->objContact->PhoneOffice = $this->txtPhoneOffice->Text;
		$this->objContact->PhoneMobile = $this->txtPhoneMobile->Text;
		$this->objContact->PhoneHome = $this->txtPhoneHome->Text;
		$this->objContact->Fax = $this->txtFax->Text;
		}

		// Update Contact Controls
		protected function UpdateContactControls() {
				
			$this->lstCompany->SelectedValue = $this->objContact->CompanyId;
			$this->lstCompany_Select();
			$this->txtFirstName->Text = $this->objContact->FirstName;
			$this->txtLastName->Text = $this->objContact->LastName;
			$this->txtTitle->Text = $this->objContact->Title;
			$this->txtEmail->Text = $this->objContact->Email;
			$this->lstAddress->SelectedValue = $this->objContact->AddressId;
			$this->txtDescription->Text = $this->objContact->Description;
			$this->txtPhoneOffice->Text = $this->objContact->PhoneOffice;
			$this->txtPhoneMobile->Text = $this->objContact->PhoneMobile;
			$this->txtPhoneHome->Text = $this->objContact->PhoneHome;
			$this->txtFax->Text = $this->objContact->Fax;
			$this->arrCustomFields = CustomField::UpdateControls($this->objContact->objCustomFieldArray, $this->arrCustomFields);
		}

		// Update the Contact Labels
		protected function UpdateContactLabels() {
				
			if ($this->blnEditMode) {
				$this->lblHeaderContact->Text = sprintf('%s %s', $this->objContact->FirstName, $this->objContact->LastName);
			} else {
				$this->lblHeaderContact->Text = 'New Contact';
			}
			if ($this->objContact->CompanyId) {
				$this->lblCompany->Text = $this->objContact->Company->__toStringWithLink();
			}
			$this->lblFirstName->Text = $this->objContact->FirstName;
			$this->lblLastName->Text = $this->objContact->LastName;
			$this->lblTitle->Text = $this->objContact->Title;
			$this->lblEmail->Text = $this->objContact->Email;
			if ($this->objContact->AddressId) {
				$this->lblAddress->Text = $this->objContact->Address->__toStringWithLink();
			}
			$this->pnlDescription->Text = nl2br($this->objContact->Description);
			$this->lblPhoneOffice->Text = $this->objContact->PhoneOffice;
			$this->lblPhoneMobile->Text = $this->objContact->PhoneMobile;
			$this->lblPhoneHome->Text = $this->objContact->PhoneHome;
			$this->lblFax->Text = $this->objContact->Fax;
			if ($this->objContact->CreationDate) {
				$this->lblCreationDate->Text = $this->objContact->CreationDate->PHPDate('Y-m-d H:i:s') . ' by ' . $this->objContact->CreatedByObject->__toStringFullName();
			}
			if ($this->objContact->ModifiedDate) {
				$this->lblModifiedDate->Text = $this->objContact->ModifiedDate . ' by ' . $this->objContact->ModifiedByObject->__toStringFullName();
			}
				
			// Update custom labels
			if ($this->arrCustomFields) {
				CustomField::UpdateLabels($this->arrCustomFields);
			}
		}

		// Display the labels and buttons for Contact Viewing mode
		protected function DisplayLabels() {

			// Do not display inputs
			$this->lstCompany->Display = false;
			$this->txtFirstName->Display = false;
			$this->txtLastName->Display = false;
			$this->txtTitle->Display = false;
			$this->txtEmail->Display = false;
			$this->lstAddress->Display = false;
			$this->txtDescription->Display = false;
			$this->txtPhoneOffice->Display = false;
			$this->txtPhoneMobile->Display = false;
			$this->txtPhoneHome->Display = false;
			$this->txtFax->Display = false;
			$this->lblNewCompany->Display = false;
			$this->lblNewAddress->Display = false;
				
			// Do not display Cancel and Save buttons
			$this->btnCancel->Display = false;
			$this->btnSave->Display = false;
				
			// Display Labels for Viewing mode
			$this->lblCompany->Display = true;
			$this->lblFirstName->Display = true;
			$this->lblLastName->Display = true;
			$this->lblTitle->Display = true;
			$this->lblEmail->Display = true;
			$this->pnlDescription->Display = true;
			$this->lblAddress->Display = true;
			$this->lblPhoneOffice->Display = true;
			$this->lblPhoneMobile->Display = true;
			$this->lblPhoneHome->Display = true;
			$this->lblFax->Display = true;
				
			// Display custom field labels
			if ($this->arrCustomFields) {
				CustomField::DisplayLabels($this->arrCustomFields);
			}

			// Display Edit and Delete buttons
			$this->btnEdit->Display = true;
			$this->btnDelete->Display = true;
			$this->atcAttach->btnUpload->Display = true;
		}

		// Display the inputs for Contact Edit mode
		protected function DisplayInputs() {
				
			// Do Not Display Labels for Viewing mode
			$this->lblCompany->Display = false;
			$this->lblFirstName->Display = false;
			$this->lblLastName->Display = false;
			$this->lblTitle->Display = false;
			$this->lblEmail->Display = false;
			$this->pnlDescription->Display = false;
			$this->lblAddress->Display = false;
			$this->lblPhoneOffice->Display = false;
			$this->lblPhoneMobile->Display = false;
			$this->lblPhoneHome->Display = false;
			$this->lblFax->Display = false;

			// Do Not Display Edit and Delete buttons
			$this->btnEdit->Display = false;
			$this->btnDelete->Display = false;
			$this->atcAttach->btnUpload->Display = false;
				
			// Display inputs
			$this->lstCompany->Display = true;
			$this->txtFirstName->Display = true;
			$this->txtLastName->Display = true;
			$this->txtTitle->Display = true;
			$this->txtEmail->Display = true;
			$this->lstAddress->Display = true;
			$this->txtDescription->Display = true;
			$this->txtPhoneOffice->Display = true;
			$this->txtPhoneMobile->Display = true;
			$this->txtPhoneHome->Display = true;
			$this->txtFax->Display = true;
			$this->lblNewCompany->Display = true;
			$this->lblNewAddress->Display = true;
				

			//If the user is not authorized to edit built-in fields, the fields are render as labels.
			if(!$this->blnEditBuiltInFields){
				$this->DisplayLabels();
			}
				

				
			// Display custom field inputs
			if ($this->arrCustomFields) {
				CustomField::DisplayInputs($this->arrCustomFields);
			}
				
			// Display Cancel and Save buttons
			$this->btnCancel->Display = true;
			$this->btnSave->Display = true;
		}

		// This method is run when the company edit dialog box is closed
		public function CloseCompanyEditPanel($blnUpdates) {
			$objPanel = $this->dlgNewCompany;
			$objPanel->HideDialogBox();
			$this->lstCompany_Select();
		}

		// This method is run when the address edit dialog box is closed
		public function CloseAddressEditPanel($blnUpdates) {
			$objPanel = $this->dlgNewAddress;
			$objPanel->HideDialogBox();
		}
		//Set display logic of the BuiltInFields in View Access and Edit Access
		protected function UpdateBuiltInFields() {
			//Set View Display Logic of Built-In Fields
			$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Contact,1);
			if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
				$this->blnViewBuiltInFields=true;
			}
			else{
				$this->blnViewBuiltInFields=false;
			}

			//Set Edit Display Logic of Built-In Fields
			$objRoleEntityQtypeBuiltInAuthorization2= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Contact,2);
			if($objRoleEntityQtypeBuiltInAuthorization2 && $objRoleEntityQtypeBuiltInAuthorization2->AuthorizedFlag){
				$this->blnEditBuiltInFields=true;
			}
			else{
				$this->blnEditBuiltInFields=false;
			}


		}
		//Set display logic for the CustomFields
		protected function UpdateCustomFields(){
			if($this->arrCustomFields)foreach ($this->arrCustomFields as $objCustomField) {
				//Set NextTabIndex only if the custom field is show
				if($objCustomField['ViewAuth'] && $objCustomField['ViewAuth']->AuthorizedFlag){
					$objCustomField['input']->TabIndex=$this->GetNextTabIndex();
				}

				//In Create Mode, if the role doesn't have edit access for the custom field and the custom field is required, the field shows as a label with the default value
				if (!$this->blnEditMode && !$objCustomField['blnEdit']){
					$objCustomField['lbl']->Display=true;
					$objCustomField['input']->Display=false;
					if(($objCustomField['blnRequired'])){
						$objCustomField['lbl']->Text=$objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue->__toString();
					}
				}
			}
				
		}

		//Set display logic of the GreenPlusButton of Company
		protected function UpdateCompanyAccess() {
			//checks if the entity 4 (AssetModel) has edit authorization
			$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Company,2);
			if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
				$this->lblNewCompany->Visible=true;
			}
			else{
				$this->lblNewCompany->Visible=false;
			}
		}
		//Set display logic of the GreenPlusButton of Address
		protected function UpdateAddressAccess() {
			//checks if the entity 4 (AssetModel) has edit authorization
			$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Address,2);
			if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
				$this->lblNewAddress->Visible=true;
			}
			else{
				$this->lblNewAddress->Visible=false;
			}
		}
}
ContactEditForm::Run('ContactEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/contacts/contact_edit.tpl.php');
?>