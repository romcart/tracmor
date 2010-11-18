<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the UserAccount class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single UserAccount object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this UserAccountEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class UserAccountEditFormBase extends QForm {
		// General Form Variables
		protected $objUserAccount;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for UserAccount's Data Fields
		protected $lblUserAccountId;
		protected $txtFirstName;
		protected $txtLastName;
		protected $txtUsername;
		protected $txtPasswordHash;
		protected $txtEmailAddress;
		protected $chkActiveFlag;
		protected $chkAdminFlag;
		protected $chkPortableAccessFlag;
		protected $txtPortableUserPin;
		protected $lstRole;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupUserAccount() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intUserAccountId = QApplication::QueryString('intUserAccountId');
			if (($intUserAccountId)) {
				$this->objUserAccount = UserAccount::Load(($intUserAccountId));

				if (!$this->objUserAccount)
					throw new Exception('Could not find a UserAccount object with PK arguments: ' . $intUserAccountId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objUserAccount = new UserAccount();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupUserAccount to either Load/Edit Existing or Create New
			$this->SetupUserAccount();

			// Create/Setup Controls for UserAccount's Data Fields
			$this->lblUserAccountId_Create();
			$this->txtFirstName_Create();
			$this->txtLastName_Create();
			$this->txtUsername_Create();
			$this->txtPasswordHash_Create();
			$this->txtEmailAddress_Create();
			$this->chkActiveFlag_Create();
			$this->chkAdminFlag_Create();
			$this->chkPortableAccessFlag_Create();
			$this->txtPortableUserPin_Create();
			$this->lstRole_Create();
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
		// Create and Setup lblUserAccountId
		protected function lblUserAccountId_Create() {
			$this->lblUserAccountId = new QLabel($this);
			$this->lblUserAccountId->Name = QApplication::Translate('User Account Id');
			if ($this->blnEditMode)
				$this->lblUserAccountId->Text = $this->objUserAccount->UserAccountId;
			else
				$this->lblUserAccountId->Text = 'N/A';
		}

		// Create and Setup txtFirstName
		protected function txtFirstName_Create() {
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objUserAccount->FirstName;
			$this->txtFirstName->Required = true;
			$this->txtFirstName->MaxLength = UserAccount::FirstNameMaxLength;
		}

		// Create and Setup txtLastName
		protected function txtLastName_Create() {
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objUserAccount->LastName;
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = UserAccount::LastNameMaxLength;
		}

		// Create and Setup txtUsername
		protected function txtUsername_Create() {
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objUserAccount->Username;
			$this->txtUsername->Required = true;
			$this->txtUsername->MaxLength = UserAccount::UsernameMaxLength;
		}

		// Create and Setup txtPasswordHash
		protected function txtPasswordHash_Create() {
			$this->txtPasswordHash = new QTextBox($this);
			$this->txtPasswordHash->Name = QApplication::Translate('Password Hash');
			$this->txtPasswordHash->Text = $this->objUserAccount->PasswordHash;
			$this->txtPasswordHash->Required = true;
			$this->txtPasswordHash->MaxLength = UserAccount::PasswordHashMaxLength;
		}

		// Create and Setup txtEmailAddress
		protected function txtEmailAddress_Create() {
			$this->txtEmailAddress = new QTextBox($this);
			$this->txtEmailAddress->Name = QApplication::Translate('Email Address');
			$this->txtEmailAddress->Text = $this->objUserAccount->EmailAddress;
			$this->txtEmailAddress->MaxLength = UserAccount::EmailAddressMaxLength;
		}

		// Create and Setup chkActiveFlag
		protected function chkActiveFlag_Create() {
			$this->chkActiveFlag = new QCheckBox($this);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objUserAccount->ActiveFlag;
		}

		// Create and Setup chkAdminFlag
		protected function chkAdminFlag_Create() {
			$this->chkAdminFlag = new QCheckBox($this);
			$this->chkAdminFlag->Name = QApplication::Translate('Admin Flag');
			$this->chkAdminFlag->Checked = $this->objUserAccount->AdminFlag;
		}

		// Create and Setup chkPortableAccessFlag
		protected function chkPortableAccessFlag_Create() {
			$this->chkPortableAccessFlag = new QCheckBox($this);
			$this->chkPortableAccessFlag->Name = QApplication::Translate('Portable Access Flag');
			$this->chkPortableAccessFlag->Checked = $this->objUserAccount->PortableAccessFlag;
		}

		// Create and Setup txtPortableUserPin
		protected function txtPortableUserPin_Create() {
			$this->txtPortableUserPin = new QIntegerTextBox($this);
			$this->txtPortableUserPin->Name = QApplication::Translate('Portable User Pin');
			$this->txtPortableUserPin->Text = $this->objUserAccount->PortableUserPin;
		}

		// Create and Setup lstRole
		protected function lstRole_Create() {
			$this->lstRole = new QListBox($this);
			$this->lstRole->Name = QApplication::Translate('Role');
			$this->lstRole->Required = true;
			if (!$this->blnEditMode)
				$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);
			$objRoleArray = Role::LoadAll();
			if ($objRoleArray) foreach ($objRoleArray as $objRole) {
				$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
				if (($this->objUserAccount->Role) && ($this->objUserAccount->Role->RoleId == $objRole->RoleId))
					$objListItem->Selected = true;
				$this->lstRole->AddItem($objListItem);
			}
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objUserAccount->CreatedByObject) && ($this->objUserAccount->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objUserAccount->CreationDate;
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
				if (($this->objUserAccount->ModifiedByObject) && ($this->objUserAccount->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objUserAccount->ModifiedDate;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'UserAccount')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateUserAccountFields() {
			$this->objUserAccount->FirstName = $this->txtFirstName->Text;
			$this->objUserAccount->LastName = $this->txtLastName->Text;
			$this->objUserAccount->Username = $this->txtUsername->Text;
			$this->objUserAccount->PasswordHash = $this->txtPasswordHash->Text;
			$this->objUserAccount->EmailAddress = $this->txtEmailAddress->Text;
			$this->objUserAccount->ActiveFlag = $this->chkActiveFlag->Checked;
			$this->objUserAccount->AdminFlag = $this->chkAdminFlag->Checked;
			$this->objUserAccount->PortableAccessFlag = $this->chkPortableAccessFlag->Checked;
			$this->objUserAccount->PortableUserPin = $this->txtPortableUserPin->Text;
			$this->objUserAccount->RoleId = $this->lstRole->SelectedValue;
			$this->objUserAccount->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objUserAccount->CreationDate = $this->calCreationDate->DateTime;
			$this->objUserAccount->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateUserAccountFields();
			$this->objUserAccount->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objUserAccount->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('user_account_list.php');
		}
	}
?>