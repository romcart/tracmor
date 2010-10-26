<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Company class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Company object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CompanyEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CompanyEditFormBase extends QForm {
		// General Form Variables
		protected $objCompany;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Company's Data Fields
		protected $lblCompanyId;
		protected $lstAddress;
		protected $txtShortDescription;
		protected $txtWebsite;
		protected $txtTelephone;
		protected $txtFax;
		protected $txtEmail;
		protected $txtLongDescription;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstCompanyCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupCompany() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intCompanyId = QApplication::QueryString('intCompanyId');
			if (($intCompanyId)) {
				$this->objCompany = Company::Load(($intCompanyId));

				if (!$this->objCompany)
					throw new Exception('Could not find a Company object with PK arguments: ' . $intCompanyId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objCompany = new Company();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupCompany to either Load/Edit Existing or Create New
			$this->SetupCompany();

			// Create/Setup Controls for Company's Data Fields
			$this->lblCompanyId_Create();
			$this->lstAddress_Create();
			$this->txtShortDescription_Create();
			$this->txtWebsite_Create();
			$this->txtTelephone_Create();
			$this->txtFax_Create();
			$this->txtEmail_Create();
			$this->txtLongDescription_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstCompanyCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblCompanyId
		protected function lblCompanyId_Create() {
			$this->lblCompanyId = new QLabel($this);
			$this->lblCompanyId->Name = QApplication::Translate('Company Id');
			if ($this->blnEditMode)
				$this->lblCompanyId->Text = $this->objCompany->CompanyId;
			else
				$this->lblCompanyId->Text = 'N/A';
		}

		// Create and Setup lstAddress
		protected function lstAddress_Create() {
			$this->lstAddress = new QListBox($this);
			$this->lstAddress->Name = QApplication::Translate('Address');
			$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
			$objAddressArray = Address::LoadAll();
			if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
				if (($this->objCompany->Address) && ($this->objCompany->Address->AddressId == $objAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstAddress->AddItem($objListItem);
			}
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCompany->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Company::ShortDescriptionMaxLength;
		}

		// Create and Setup txtWebsite
		protected function txtWebsite_Create() {
			$this->txtWebsite = new QTextBox($this);
			$this->txtWebsite->Name = QApplication::Translate('Website');
			$this->txtWebsite->Text = $this->objCompany->Website;
			$this->txtWebsite->MaxLength = Company::WebsiteMaxLength;
		}

		// Create and Setup txtTelephone
		protected function txtTelephone_Create() {
			$this->txtTelephone = new QTextBox($this);
			$this->txtTelephone->Name = QApplication::Translate('Telephone');
			$this->txtTelephone->Text = $this->objCompany->Telephone;
			$this->txtTelephone->MaxLength = Company::TelephoneMaxLength;
		}

		// Create and Setup txtFax
		protected function txtFax_Create() {
			$this->txtFax = new QTextBox($this);
			$this->txtFax->Name = QApplication::Translate('Fax');
			$this->txtFax->Text = $this->objCompany->Fax;
			$this->txtFax->MaxLength = Company::FaxMaxLength;
		}

		// Create and Setup txtEmail
		protected function txtEmail_Create() {
			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objCompany->Email;
			$this->txtEmail->MaxLength = Company::EmailMaxLength;
		}

		// Create and Setup txtLongDescription
		protected function txtLongDescription_Create() {
			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objCompany->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objCompany->CreatedByObject) && ($this->objCompany->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objCompany->CreationDate;
			$this->calCreationDate->DateTimePickerType = QDateTimePickerType::DateTime;
		}

		// Create and Setup lstModifiedByObject
		protected function lstModifiedByObject_Create() {
			$this->lstModifiedByObject = new QListBox($this);
			$this->lstModifiedByObject->Name = QApplication::Translate('Modified By Object');
			$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objModifiedByObjectArray = UserAccount::LoadAll();
			if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
				$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
				if (($this->objCompany->ModifiedByObject) && ($this->objCompany->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objCompany->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstCompanyCustomFieldHelper
		protected function lstCompanyCustomFieldHelper_Create() {
			$this->lstCompanyCustomFieldHelper = new QListBox($this);
			$this->lstCompanyCustomFieldHelper->Name = QApplication::Translate('Company Custom Field Helper');
			$this->lstCompanyCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objCompanyCustomFieldHelperArray = CompanyCustomFieldHelper::LoadAll();
			if ($objCompanyCustomFieldHelperArray) foreach ($objCompanyCustomFieldHelperArray as $objCompanyCustomFieldHelper) {
				$objListItem = new QListItem($objCompanyCustomFieldHelper->__toString(), $objCompanyCustomFieldHelper->CompanyId);
				if ($objCompanyCustomFieldHelper->CompanyId == $this->objCompany->CompanyId)
					$objListItem->Selected = true;
				$this->lstCompanyCustomFieldHelper->AddItem($objListItem);
			}
			// Because CompanyCustomFieldHelper's CompanyCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstCompanyCustomFieldHelper->SelectedValue)
				$this->lstCompanyCustomFieldHelper->Enabled = false;
		}


		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}

		// Setup btnCancel
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
		}

		// Setup btnDelete
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Company')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateCompanyFields() {
			$this->objCompany->AddressId = $this->lstAddress->SelectedValue;
			$this->objCompany->ShortDescription = $this->txtShortDescription->Text;
			$this->objCompany->Website = $this->txtWebsite->Text;
			$this->objCompany->Telephone = $this->txtTelephone->Text;
			$this->objCompany->Fax = $this->txtFax->Text;
			$this->objCompany->Email = $this->txtEmail->Text;
			$this->objCompany->LongDescription = $this->txtLongDescription->Text;
			$this->objCompany->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objCompany->CreationDate = $this->calCreationDate->DateTime;
			$this->objCompany->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objCompany->CompanyCustomFieldHelper = CompanyCustomFieldHelper::Load($this->lstCompanyCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateCompanyFields();
			$this->objCompany->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objCompany->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('company_list.php');
		}
	}
?>