<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the ShippingAccount class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single ShippingAccount object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ShippingAccountEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ShippingAccountEditFormBase extends QForm {
		// General Form Variables
		protected $objShippingAccount;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for ShippingAccount's Data Fields
		protected $lblShippingAccountId;
		protected $lstCourier;
		protected $txtShortDescription;
		protected $txtAccessId;
		protected $txtAccessCode;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupShippingAccount() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intShippingAccountId = QApplication::QueryString('intShippingAccountId');
			if (($intShippingAccountId)) {
				$this->objShippingAccount = ShippingAccount::Load(($intShippingAccountId));

				if (!$this->objShippingAccount)
					throw new Exception('Could not find a ShippingAccount object with PK arguments: ' . $intShippingAccountId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objShippingAccount = new ShippingAccount();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupShippingAccount to either Load/Edit Existing or Create New
			$this->SetupShippingAccount();

			// Create/Setup Controls for ShippingAccount's Data Fields
			$this->lblShippingAccountId_Create();
			$this->lstCourier_Create();
			$this->txtShortDescription_Create();
			$this->txtAccessId_Create();
			$this->txtAccessCode_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblShippingAccountId
		protected function lblShippingAccountId_Create() {
			$this->lblShippingAccountId = new QLabel($this);
			$this->lblShippingAccountId->Name = QApplication::Translate('Shipping Account Id');
			if ($this->blnEditMode)
				$this->lblShippingAccountId->Text = $this->objShippingAccount->ShippingAccountId;
			else
				$this->lblShippingAccountId->Text = 'N/A';
		}

		// Create and Setup lstCourier
		protected function lstCourier_Create() {
			$this->lstCourier = new QListBox($this);
			$this->lstCourier->Name = QApplication::Translate('Courier');
			$this->lstCourier->Required = true;
			if (!$this->blnEditMode)
				$this->lstCourier->AddItem(QApplication::Translate('- Select One -'), null);
			$objCourierArray = Courier::LoadAll();
			if ($objCourierArray) foreach ($objCourierArray as $objCourier) {
				$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
				if (($this->objShippingAccount->Courier) && ($this->objShippingAccount->Courier->CourierId == $objCourier->CourierId))
					$objListItem->Selected = true;
				$this->lstCourier->AddItem($objListItem);
			}
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objShippingAccount->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = ShippingAccount::ShortDescriptionMaxLength;
		}

		// Create and Setup txtAccessId
		protected function txtAccessId_Create() {
			$this->txtAccessId = new QTextBox($this);
			$this->txtAccessId->Name = QApplication::Translate('Access Id');
			$this->txtAccessId->Text = $this->objShippingAccount->AccessId;
			$this->txtAccessId->Required = true;
			$this->txtAccessId->MaxLength = ShippingAccount::AccessIdMaxLength;
		}

		// Create and Setup txtAccessCode
		protected function txtAccessCode_Create() {
			$this->txtAccessCode = new QTextBox($this);
			$this->txtAccessCode->Name = QApplication::Translate('Access Code');
			$this->txtAccessCode->Text = $this->objShippingAccount->AccessCode;
			$this->txtAccessCode->Required = true;
			$this->txtAccessCode->MaxLength = ShippingAccount::AccessCodeMaxLength;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objShippingAccount->CreatedByObject) && ($this->objShippingAccount->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objShippingAccount->CreationDate;
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
				if (($this->objShippingAccount->ModifiedByObject) && ($this->objShippingAccount->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objShippingAccount->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'ShippingAccount')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateShippingAccountFields() {
			$this->objShippingAccount->CourierId = $this->lstCourier->SelectedValue;
			$this->objShippingAccount->ShortDescription = $this->txtShortDescription->Text;
			$this->objShippingAccount->AccessId = $this->txtAccessId->Text;
			$this->objShippingAccount->AccessCode = $this->txtAccessCode->Text;
			$this->objShippingAccount->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objShippingAccount->CreationDate = $this->calCreationDate->DateTime;
			$this->objShippingAccount->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateShippingAccountFields();
			$this->objShippingAccount->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objShippingAccount->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('shipping_account_list.php');
		}
	}
?>