<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Transaction class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Transaction object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this TransactionEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class TransactionEditFormBase extends QForm {
		// General Form Variables
		protected $objTransaction;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Transaction's Data Fields
		protected $lblTransactionId;
		protected $lstEntityQtype;
		protected $lstTransactionType;
		protected $txtNote;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstReceipt;
		protected $lstShipment;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupTransaction() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intTransactionId = QApplication::QueryString('intTransactionId');
			if (($intTransactionId)) {
				$this->objTransaction = Transaction::Load(($intTransactionId));

				if (!$this->objTransaction)
					throw new Exception('Could not find a Transaction object with PK arguments: ' . $intTransactionId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objTransaction = new Transaction();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupTransaction to either Load/Edit Existing or Create New
			$this->SetupTransaction();

			// Create/Setup Controls for Transaction's Data Fields
			$this->lblTransactionId_Create();
			$this->lstEntityQtype_Create();
			$this->lstTransactionType_Create();
			$this->txtNote_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstReceipt_Create();
			$this->lstShipment_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblTransactionId
		protected function lblTransactionId_Create() {
			$this->lblTransactionId = new QLabel($this);
			$this->lblTransactionId->Name = QApplication::Translate('Transaction Id');
			if ($this->blnEditMode)
				$this->lblTransactionId->Text = $this->objTransaction->TransactionId;
			else
				$this->lblTransactionId->Text = 'N/A';
		}

		// Create and Setup lstEntityQtype
		protected function lstEntityQtype_Create() {
			$this->lstEntityQtype = new QListBox($this);
			$this->lstEntityQtype->Name = QApplication::Translate('Entity Qtype');
			$this->lstEntityQtype->Required = true;
			foreach (EntityQtype::$NameArray as $intId => $strValue)
				$this->lstEntityQtype->AddItem(new QListItem($strValue, $intId, $this->objTransaction->EntityQtypeId == $intId));
		}

		// Create and Setup lstTransactionType
		protected function lstTransactionType_Create() {
			$this->lstTransactionType = new QListBox($this);
			$this->lstTransactionType->Name = QApplication::Translate('Transaction Type');
			$this->lstTransactionType->Required = true;
			if (!$this->blnEditMode)
				$this->lstTransactionType->AddItem(QApplication::Translate('- Select One -'), null);
			$objTransactionTypeArray = TransactionType::LoadAll();
			if ($objTransactionTypeArray) foreach ($objTransactionTypeArray as $objTransactionType) {
				$objListItem = new QListItem($objTransactionType->__toString(), $objTransactionType->TransactionTypeId);
				if (($this->objTransaction->TransactionType) && ($this->objTransaction->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
					$objListItem->Selected = true;
				$this->lstTransactionType->AddItem($objListItem);
			}
		}

		// Create and Setup txtNote
		protected function txtNote_Create() {
			$this->txtNote = new QTextBox($this);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->Text = $this->objTransaction->Note;
			$this->txtNote->TextMode = QTextMode::MultiLine;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objTransaction->CreatedByObject) && ($this->objTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objTransaction->CreationDate;
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
				if (($this->objTransaction->ModifiedByObject) && ($this->objTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objTransaction->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstReceipt
		protected function lstReceipt_Create() {
			$this->lstReceipt = new QListBox($this);
			$this->lstReceipt->Name = QApplication::Translate('Receipt');
			$this->lstReceipt->AddItem(QApplication::Translate('- Select One -'), null);
			$objReceiptArray = Receipt::LoadAll();
			if ($objReceiptArray) foreach ($objReceiptArray as $objReceipt) {
				$objListItem = new QListItem($objReceipt->__toString(), $objReceipt->ReceiptId);
				if ($objReceipt->TransactionId == $this->objTransaction->TransactionId)
					$objListItem->Selected = true;
				$this->lstReceipt->AddItem($objListItem);
			}
			// Because Receipt's Receipt is not null, if a value is already selected, it cannot be changed.
			if ($this->lstReceipt->SelectedValue)
				$this->lstReceipt->Enabled = false;
		}

		// Create and Setup lstShipment
		protected function lstShipment_Create() {
			$this->lstShipment = new QListBox($this);
			$this->lstShipment->Name = QApplication::Translate('Shipment');
			$this->lstShipment->AddItem(QApplication::Translate('- Select One -'), null);
			$objShipmentArray = Shipment::LoadAll();
			if ($objShipmentArray) foreach ($objShipmentArray as $objShipment) {
				$objListItem = new QListItem($objShipment->__toString(), $objShipment->ShipmentId);
				if ($objShipment->TransactionId == $this->objTransaction->TransactionId)
					$objListItem->Selected = true;
				$this->lstShipment->AddItem($objListItem);
			}
			// Because Shipment's Shipment is not null, if a value is already selected, it cannot be changed.
			if ($this->lstShipment->SelectedValue)
				$this->lstShipment->Enabled = false;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Transaction')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateTransactionFields() {
			$this->objTransaction->EntityQtypeId = $this->lstEntityQtype->SelectedValue;
			$this->objTransaction->TransactionTypeId = $this->lstTransactionType->SelectedValue;
			$this->objTransaction->Note = $this->txtNote->Text;
			$this->objTransaction->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objTransaction->CreationDate = $this->calCreationDate->DateTime;
			$this->objTransaction->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objTransaction->Receipt = Receipt::Load($this->lstReceipt->SelectedValue);
			$this->objTransaction->Shipment = Shipment::Load($this->lstShipment->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateTransactionFields();
			$this->objTransaction->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objTransaction->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('transaction_list.php');
		}
	}
?>