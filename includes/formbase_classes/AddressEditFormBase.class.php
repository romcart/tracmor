<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Address class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Address object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this AddressEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class AddressEditFormBase extends QForm {
		// General Form Variables
		protected $objAddress;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Address's Data Fields
		protected $lblAddressId;
		protected $lstCompany;
		protected $txtShortDescription;
		protected $lstCountry;
		protected $txtAddress1;
		protected $txtAddress2;
		protected $txtCity;
		protected $lstStateProvince;
		protected $txtPostalCode;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstAddressCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupAddress() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intAddressId = QApplication::QueryString('intAddressId');
			if (($intAddressId)) {
				$this->objAddress = Address::Load(($intAddressId));

				if (!$this->objAddress)
					throw new Exception('Could not find a Address object with PK arguments: ' . $intAddressId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objAddress = new Address();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupAddress to either Load/Edit Existing or Create New
			$this->SetupAddress();

			// Create/Setup Controls for Address's Data Fields
			$this->lblAddressId_Create();
			$this->lstCompany_Create();
			$this->txtShortDescription_Create();
			$this->lstCountry_Create();
			$this->txtAddress1_Create();
			$this->txtAddress2_Create();
			$this->txtCity_Create();
			$this->lstStateProvince_Create();
			$this->txtPostalCode_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstAddressCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblAddressId
		protected function lblAddressId_Create() {
			$this->lblAddressId = new QLabel($this);
			$this->lblAddressId->Name = QApplication::Translate('Address Id');
			if ($this->blnEditMode)
				$this->lblAddressId->Text = $this->objAddress->AddressId;
			else
				$this->lblAddressId->Text = 'N/A';
		}

		// Create and Setup lstCompany
		protected function lstCompany_Create() {
			$this->lstCompany = new QListBox($this);
			$this->lstCompany->Name = QApplication::Translate('Company');
			$this->lstCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
			$objCompanyArray = Company::LoadAll();
			if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
				if (($this->objAddress->Company) && ($this->objAddress->Company->CompanyId == $objCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstCompany->AddItem($objListItem);
			}
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAddress->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Address::ShortDescriptionMaxLength;
		}

		// Create and Setup lstCountry
		protected function lstCountry_Create() {
			$this->lstCountry = new QListBox($this);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->Required = true;
			if (!$this->blnEditMode)
				$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);
			$objCountryArray = Country::LoadAll();
			if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
				if (($this->objAddress->Country) && ($this->objAddress->Country->CountryId == $objCountry->CountryId))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}
		}

		// Create and Setup txtAddress1
		protected function txtAddress1_Create() {
			$this->txtAddress1 = new QTextBox($this);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objAddress->Address1;
			$this->txtAddress1->Required = true;
			$this->txtAddress1->MaxLength = Address::Address1MaxLength;
		}

		// Create and Setup txtAddress2
		protected function txtAddress2_Create() {
			$this->txtAddress2 = new QTextBox($this);
			$this->txtAddress2->Name = QApplication::Translate('Address 2');
			$this->txtAddress2->Text = $this->objAddress->Address2;
			$this->txtAddress2->MaxLength = Address::Address2MaxLength;
		}

		// Create and Setup txtCity
		protected function txtCity_Create() {
			$this->txtCity = new QTextBox($this);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objAddress->City;
			$this->txtCity->Required = true;
			$this->txtCity->MaxLength = Address::CityMaxLength;
		}

		// Create and Setup lstStateProvince
		protected function lstStateProvince_Create() {
			$this->lstStateProvince = new QListBox($this);
			$this->lstStateProvince->Name = QApplication::Translate('State Province');
			$this->lstStateProvince->AddItem(QApplication::Translate('- Select One -'), null);
			$objStateProvinceArray = StateProvince::LoadAll();
			if ($objStateProvinceArray) foreach ($objStateProvinceArray as $objStateProvince) {
				$objListItem = new QListItem($objStateProvince->__toString(), $objStateProvince->StateProvinceId);
				if (($this->objAddress->StateProvince) && ($this->objAddress->StateProvince->StateProvinceId == $objStateProvince->StateProvinceId))
					$objListItem->Selected = true;
				$this->lstStateProvince->AddItem($objListItem);
			}
		}

		// Create and Setup txtPostalCode
		protected function txtPostalCode_Create() {
			$this->txtPostalCode = new QTextBox($this);
			$this->txtPostalCode->Name = QApplication::Translate('Postal Code');
			$this->txtPostalCode->Text = $this->objAddress->PostalCode;
			$this->txtPostalCode->Required = true;
			$this->txtPostalCode->MaxLength = Address::PostalCodeMaxLength;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objAddress->CreatedByObject) && ($this->objAddress->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objAddress->CreationDate;
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
				if (($this->objAddress->ModifiedByObject) && ($this->objAddress->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objAddress->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstAddressCustomFieldHelper
		protected function lstAddressCustomFieldHelper_Create() {
			$this->lstAddressCustomFieldHelper = new QListBox($this);
			$this->lstAddressCustomFieldHelper->Name = QApplication::Translate('Address Custom Field Helper');
			$this->lstAddressCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objAddressCustomFieldHelperArray = AddressCustomFieldHelper::LoadAll();
			if ($objAddressCustomFieldHelperArray) foreach ($objAddressCustomFieldHelperArray as $objAddressCustomFieldHelper) {
				$objListItem = new QListItem($objAddressCustomFieldHelper->__toString(), $objAddressCustomFieldHelper->AddressId);
				if ($objAddressCustomFieldHelper->AddressId == $this->objAddress->AddressId)
					$objListItem->Selected = true;
				$this->lstAddressCustomFieldHelper->AddItem($objListItem);
			}
			// Because AddressCustomFieldHelper's AddressCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAddressCustomFieldHelper->SelectedValue)
				$this->lstAddressCustomFieldHelper->Enabled = false;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Address')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateAddressFields() {
			$this->objAddress->CompanyId = $this->lstCompany->SelectedValue;
			$this->objAddress->ShortDescription = $this->txtShortDescription->Text;
			$this->objAddress->CountryId = $this->lstCountry->SelectedValue;
			$this->objAddress->Address1 = $this->txtAddress1->Text;
			$this->objAddress->Address2 = $this->txtAddress2->Text;
			$this->objAddress->City = $this->txtCity->Text;
			$this->objAddress->StateProvinceId = $this->lstStateProvince->SelectedValue;
			$this->objAddress->PostalCode = $this->txtPostalCode->Text;
			$this->objAddress->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objAddress->CreationDate = $this->calCreationDate->DateTime;
			$this->objAddress->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objAddress->AddressCustomFieldHelper = AddressCustomFieldHelper::Load($this->lstAddressCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateAddressFields();
			$this->objAddress->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objAddress->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('address_list.php');
		}
	}
?>