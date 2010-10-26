<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Receipt class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Receipt object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ReceiptEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ReceiptEditFormBase extends QForm {
		// General Form Variables
		protected $objReceipt;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Receipt's Data Fields
		protected $lblReceiptId;
		protected $lstTransaction;
		protected $lstFromCompany;
		protected $lstFromContact;
		protected $lstToContact;
		protected $lstToAddress;
		protected $txtReceiptNumber;
		protected $calDueDate;
		protected $calReceiptDate;
		protected $chkReceivedFlag;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstReceiptCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupReceipt() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intReceiptId = QApplication::QueryString('intReceiptId');
			if (($intReceiptId)) {
				$this->objReceipt = Receipt::Load(($intReceiptId));

				if (!$this->objReceipt)
					throw new Exception('Could not find a Receipt object with PK arguments: ' . $intReceiptId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objReceipt = new Receipt();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupReceipt to either Load/Edit Existing or Create New
			$this->SetupReceipt();

			// Create/Setup Controls for Receipt's Data Fields
			$this->lblReceiptId_Create();
			$this->lstTransaction_Create();
			$this->lstFromCompany_Create();
			$this->lstFromContact_Create();
			$this->lstToContact_Create();
			$this->lstToAddress_Create();
			$this->txtReceiptNumber_Create();
			$this->calDueDate_Create();
			$this->calReceiptDate_Create();
			$this->chkReceivedFlag_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstReceiptCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblReceiptId
		protected function lblReceiptId_Create() {
			$this->lblReceiptId = new QLabel($this);
			$this->lblReceiptId->Name = QApplication::Translate('Receipt Id');
			if ($this->blnEditMode)
				$this->lblReceiptId->Text = $this->objReceipt->ReceiptId;
			else
				$this->lblReceiptId->Text = 'N/A';
		}

		// Create and Setup lstTransaction
		protected function lstTransaction_Create() {
			$this->lstTransaction = new QListBox($this);
			$this->lstTransaction->Name = QApplication::Translate('Transaction');
			$this->lstTransaction->Required = true;
			if (!$this->blnEditMode)
				$this->lstTransaction->AddItem(QApplication::Translate('- Select One -'), null);
			$objTransactionArray = Transaction::LoadAll();
			if ($objTransactionArray) foreach ($objTransactionArray as $objTransaction) {
				$objListItem = new QListItem($objTransaction->__toString(), $objTransaction->TransactionId);
				if (($this->objReceipt->Transaction) && ($this->objReceipt->Transaction->TransactionId == $objTransaction->TransactionId))
					$objListItem->Selected = true;
				$this->lstTransaction->AddItem($objListItem);
			}
		}

		// Create and Setup lstFromCompany
		protected function lstFromCompany_Create() {
			$this->lstFromCompany = new QListBox($this);
			$this->lstFromCompany->Name = QApplication::Translate('From Company');
			$this->lstFromCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromCompany->AddItem(QApplication::Translate('- Select One -'), null);
			$objFromCompanyArray = Company::LoadAll();
			if ($objFromCompanyArray) foreach ($objFromCompanyArray as $objFromCompany) {
				$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
				if (($this->objReceipt->FromCompany) && ($this->objReceipt->FromCompany->CompanyId == $objFromCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstFromCompany->AddItem($objListItem);
			}
		}

		// Create and Setup lstFromContact
		protected function lstFromContact_Create() {
			$this->lstFromContact = new QListBox($this);
			$this->lstFromContact->Name = QApplication::Translate('From Contact');
			$this->lstFromContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromContact->AddItem(QApplication::Translate('- Select One -'), null);
			$objFromContactArray = Contact::LoadAll();
			if ($objFromContactArray) foreach ($objFromContactArray as $objFromContact) {
				$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
				if (($this->objReceipt->FromContact) && ($this->objReceipt->FromContact->ContactId == $objFromContact->ContactId))
					$objListItem->Selected = true;
				$this->lstFromContact->AddItem($objListItem);
			}
		}

		// Create and Setup lstToContact
		protected function lstToContact_Create() {
			$this->lstToContact = new QListBox($this);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstToContact->AddItem(QApplication::Translate('- Select One -'), null);
			$objToContactArray = Contact::LoadAll();
			if ($objToContactArray) foreach ($objToContactArray as $objToContact) {
				$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
				if (($this->objReceipt->ToContact) && ($this->objReceipt->ToContact->ContactId == $objToContact->ContactId))
					$objListItem->Selected = true;
				$this->lstToContact->AddItem($objListItem);
			}
		}

		// Create and Setup lstToAddress
		protected function lstToAddress_Create() {
			$this->lstToAddress = new QListBox($this);
			$this->lstToAddress->Name = QApplication::Translate('To Address');
			$this->lstToAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstToAddress->AddItem(QApplication::Translate('- Select One -'), null);
			$objToAddressArray = Address::LoadAll();
			if ($objToAddressArray) foreach ($objToAddressArray as $objToAddress) {
				$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
				if (($this->objReceipt->ToAddress) && ($this->objReceipt->ToAddress->AddressId == $objToAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstToAddress->AddItem($objListItem);
			}
		}

		// Create and Setup txtReceiptNumber
		protected function txtReceiptNumber_Create() {
			$this->txtReceiptNumber = new QTextBox($this);
			$this->txtReceiptNumber->Name = QApplication::Translate('Receipt Number');
			$this->txtReceiptNumber->Text = $this->objReceipt->ReceiptNumber;
			$this->txtReceiptNumber->Required = true;
			$this->txtReceiptNumber->MaxLength = Receipt::ReceiptNumberMaxLength;
		}

		// Create and Setup calDueDate
		protected function calDueDate_Create() {
			$this->calDueDate = new QDateTimePicker($this);
			$this->calDueDate->Name = QApplication::Translate('Due Date');
			$this->calDueDate->DateTime = $this->objReceipt->DueDate;
			$this->calDueDate->DateTimePickerType = QDateTimePickerType::Date;
		}

		// Create and Setup calReceiptDate
		protected function calReceiptDate_Create() {
			$this->calReceiptDate = new QDateTimePicker($this);
			$this->calReceiptDate->Name = QApplication::Translate('Receipt Date');
			$this->calReceiptDate->DateTime = $this->objReceipt->ReceiptDate;
			$this->calReceiptDate->DateTimePickerType = QDateTimePickerType::Date;
		}

		// Create and Setup chkReceivedFlag
		protected function chkReceivedFlag_Create() {
			$this->chkReceivedFlag = new QCheckBox($this);
			$this->chkReceivedFlag->Name = QApplication::Translate('Received Flag');
			$this->chkReceivedFlag->Checked = $this->objReceipt->ReceivedFlag;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objReceipt->CreatedByObject) && ($this->objReceipt->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objReceipt->CreationDate;
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
				if (($this->objReceipt->ModifiedByObject) && ($this->objReceipt->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objReceipt->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstReceiptCustomFieldHelper
		protected function lstReceiptCustomFieldHelper_Create() {
			$this->lstReceiptCustomFieldHelper = new QListBox($this);
			$this->lstReceiptCustomFieldHelper->Name = QApplication::Translate('Receipt Custom Field Helper');
			$this->lstReceiptCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objReceiptCustomFieldHelperArray = ReceiptCustomFieldHelper::LoadAll();
			if ($objReceiptCustomFieldHelperArray) foreach ($objReceiptCustomFieldHelperArray as $objReceiptCustomFieldHelper) {
				$objListItem = new QListItem($objReceiptCustomFieldHelper->__toString(), $objReceiptCustomFieldHelper->ReceiptId);
				if ($objReceiptCustomFieldHelper->ReceiptId == $this->objReceipt->ReceiptId)
					$objListItem->Selected = true;
				$this->lstReceiptCustomFieldHelper->AddItem($objListItem);
			}
			// Because ReceiptCustomFieldHelper's ReceiptCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstReceiptCustomFieldHelper->SelectedValue)
				$this->lstReceiptCustomFieldHelper->Enabled = false;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Receipt')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateReceiptFields() {
			$this->objReceipt->TransactionId = $this->lstTransaction->SelectedValue;
			$this->objReceipt->FromCompanyId = $this->lstFromCompany->SelectedValue;
			$this->objReceipt->FromContactId = $this->lstFromContact->SelectedValue;
			$this->objReceipt->ToContactId = $this->lstToContact->SelectedValue;
			$this->objReceipt->ToAddressId = $this->lstToAddress->SelectedValue;
			$this->objReceipt->ReceiptNumber = $this->txtReceiptNumber->Text;
			$this->objReceipt->DueDate = $this->calDueDate->DateTime;
			$this->objReceipt->ReceiptDate = $this->calReceiptDate->DateTime;
			$this->objReceipt->ReceivedFlag = $this->chkReceivedFlag->Checked;
			$this->objReceipt->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objReceipt->CreationDate = $this->calCreationDate->DateTime;
			$this->objReceipt->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objReceipt->ReceiptCustomFieldHelper = ReceiptCustomFieldHelper::Load($this->lstReceiptCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateReceiptFields();
			$this->objReceipt->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objReceipt->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('receipt_list.php');
		}
	}
?>