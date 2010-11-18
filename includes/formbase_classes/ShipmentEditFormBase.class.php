<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Shipment class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Shipment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ShipmentEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ShipmentEditFormBase extends QForm {
		// General Form Variables
		protected $objShipment;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Shipment's Data Fields
		protected $lblShipmentId;
		protected $txtShipmentNumber;
		protected $lstTransaction;
		protected $lstFromCompany;
		protected $lstFromContact;
		protected $lstFromAddress;
		protected $lstToCompany;
		protected $lstToContact;
		protected $lstToAddress;
		protected $lstCourier;
		protected $txtTrackingNumber;
		protected $calShipDate;
		protected $chkShippedFlag;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstShipmentCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupShipment() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intShipmentId = QApplication::QueryString('intShipmentId');
			if (($intShipmentId)) {
				$this->objShipment = Shipment::Load(($intShipmentId));

				if (!$this->objShipment)
					throw new Exception('Could not find a Shipment object with PK arguments: ' . $intShipmentId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objShipment = new Shipment();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupShipment to either Load/Edit Existing or Create New
			$this->SetupShipment();

			// Create/Setup Controls for Shipment's Data Fields
			$this->lblShipmentId_Create();
			$this->txtShipmentNumber_Create();
			$this->lstTransaction_Create();
			$this->lstFromCompany_Create();
			$this->lstFromContact_Create();
			$this->lstFromAddress_Create();
			$this->lstToCompany_Create();
			$this->lstToContact_Create();
			$this->lstToAddress_Create();
			$this->lstCourier_Create();
			$this->txtTrackingNumber_Create();
			$this->calShipDate_Create();
			$this->chkShippedFlag_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstShipmentCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblShipmentId
		protected function lblShipmentId_Create() {
			$this->lblShipmentId = new QLabel($this);
			$this->lblShipmentId->Name = QApplication::Translate('Shipment Id');
			if ($this->blnEditMode)
				$this->lblShipmentId->Text = $this->objShipment->ShipmentId;
			else
				$this->lblShipmentId->Text = 'N/A';
		}

		// Create and Setup txtShipmentNumber
		protected function txtShipmentNumber_Create() {
			$this->txtShipmentNumber = new QTextBox($this);
			$this->txtShipmentNumber->Name = QApplication::Translate('Shipment Number');
			$this->txtShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			$this->txtShipmentNumber->Required = true;
			$this->txtShipmentNumber->MaxLength = Shipment::ShipmentNumberMaxLength;
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
				if (($this->objShipment->Transaction) && ($this->objShipment->Transaction->TransactionId == $objTransaction->TransactionId))
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
				if (($this->objShipment->FromCompany) && ($this->objShipment->FromCompany->CompanyId == $objFromCompany->CompanyId))
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
				if (($this->objShipment->FromContact) && ($this->objShipment->FromContact->ContactId == $objFromContact->ContactId))
					$objListItem->Selected = true;
				$this->lstFromContact->AddItem($objListItem);
			}
		}

		// Create and Setup lstFromAddress
		protected function lstFromAddress_Create() {
			$this->lstFromAddress = new QListBox($this);
			$this->lstFromAddress->Name = QApplication::Translate('From Address');
			$this->lstFromAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromAddress->AddItem(QApplication::Translate('- Select One -'), null);
			$objFromAddressArray = Address::LoadAll();
			if ($objFromAddressArray) foreach ($objFromAddressArray as $objFromAddress) {
				$objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
				if (($this->objShipment->FromAddress) && ($this->objShipment->FromAddress->AddressId == $objFromAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstFromAddress->AddItem($objListItem);
			}
		}

		// Create and Setup lstToCompany
		protected function lstToCompany_Create() {
			$this->lstToCompany = new QListBox($this);
			$this->lstToCompany->Name = QApplication::Translate('To Company');
			$this->lstToCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstToCompany->AddItem(QApplication::Translate('- Select One -'), null);
			$objToCompanyArray = Company::LoadAll();
			if ($objToCompanyArray) foreach ($objToCompanyArray as $objToCompany) {
				$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
				if (($this->objShipment->ToCompany) && ($this->objShipment->ToCompany->CompanyId == $objToCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstToCompany->AddItem($objListItem);
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
				if (($this->objShipment->ToContact) && ($this->objShipment->ToContact->ContactId == $objToContact->ContactId))
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
				if (($this->objShipment->ToAddress) && ($this->objShipment->ToAddress->AddressId == $objToAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstToAddress->AddItem($objListItem);
			}
		}

		// Create and Setup lstCourier
		protected function lstCourier_Create() {
			$this->lstCourier = new QListBox($this);
			$this->lstCourier->Name = QApplication::Translate('Courier');
			$this->lstCourier->AddItem(QApplication::Translate('- Select One -'), null);
			$objCourierArray = Courier::LoadAll();
			if ($objCourierArray) foreach ($objCourierArray as $objCourier) {
				$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
				if (($this->objShipment->Courier) && ($this->objShipment->Courier->CourierId == $objCourier->CourierId))
					$objListItem->Selected = true;
				$this->lstCourier->AddItem($objListItem);
			}
		}

		// Create and Setup txtTrackingNumber
		protected function txtTrackingNumber_Create() {
			$this->txtTrackingNumber = new QTextBox($this);
			$this->txtTrackingNumber->Name = QApplication::Translate('Tracking Number');
			$this->txtTrackingNumber->Text = $this->objShipment->TrackingNumber;
			$this->txtTrackingNumber->MaxLength = Shipment::TrackingNumberMaxLength;
		}

		// Create and Setup calShipDate
		protected function calShipDate_Create() {
			$this->calShipDate = new QDateTimePicker($this);
			$this->calShipDate->Name = QApplication::Translate('Ship Date');
			$this->calShipDate->DateTime = $this->objShipment->ShipDate;
			$this->calShipDate->DateTimePickerType = QDateTimePickerType::Date;
			$this->calShipDate->Required = true;
		}

		// Create and Setup chkShippedFlag
		protected function chkShippedFlag_Create() {
			$this->chkShippedFlag = new QCheckBox($this);
			$this->chkShippedFlag->Name = QApplication::Translate('Shipped Flag');
			$this->chkShippedFlag->Checked = $this->objShipment->ShippedFlag;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objShipment->CreatedByObject) && ($this->objShipment->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objShipment->CreationDate;
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
				if (($this->objShipment->ModifiedByObject) && ($this->objShipment->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objShipment->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstShipmentCustomFieldHelper
		protected function lstShipmentCustomFieldHelper_Create() {
			$this->lstShipmentCustomFieldHelper = new QListBox($this);
			$this->lstShipmentCustomFieldHelper->Name = QApplication::Translate('Shipment Custom Field Helper');
			$this->lstShipmentCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objShipmentCustomFieldHelperArray = ShipmentCustomFieldHelper::LoadAll();
			if ($objShipmentCustomFieldHelperArray) foreach ($objShipmentCustomFieldHelperArray as $objShipmentCustomFieldHelper) {
				$objListItem = new QListItem($objShipmentCustomFieldHelper->__toString(), $objShipmentCustomFieldHelper->ShipmentId);
				if ($objShipmentCustomFieldHelper->ShipmentId == $this->objShipment->ShipmentId)
					$objListItem->Selected = true;
				$this->lstShipmentCustomFieldHelper->AddItem($objListItem);
			}
			// Because ShipmentCustomFieldHelper's ShipmentCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstShipmentCustomFieldHelper->SelectedValue)
				$this->lstShipmentCustomFieldHelper->Enabled = false;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Shipment')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateShipmentFields() {
			$this->objShipment->ShipmentNumber = $this->txtShipmentNumber->Text;
			$this->objShipment->TransactionId = $this->lstTransaction->SelectedValue;
			$this->objShipment->FromCompanyId = $this->lstFromCompany->SelectedValue;
			$this->objShipment->FromContactId = $this->lstFromContact->SelectedValue;
			$this->objShipment->FromAddressId = $this->lstFromAddress->SelectedValue;
			$this->objShipment->ToCompanyId = $this->lstToCompany->SelectedValue;
			$this->objShipment->ToContactId = $this->lstToContact->SelectedValue;
			$this->objShipment->ToAddressId = $this->lstToAddress->SelectedValue;
			$this->objShipment->CourierId = $this->lstCourier->SelectedValue;
			$this->objShipment->TrackingNumber = $this->txtTrackingNumber->Text;
			$this->objShipment->ShipDate = $this->calShipDate->DateTime;
			$this->objShipment->ShippedFlag = $this->chkShippedFlag->Checked;
			$this->objShipment->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objShipment->CreationDate = $this->calCreationDate->DateTime;
			$this->objShipment->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objShipment->ShipmentCustomFieldHelper = ShipmentCustomFieldHelper::Load($this->lstShipmentCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateShipmentFields();
			$this->objShipment->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objShipment->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('shipment_list.php');
		}
	}
?>