<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the UserAccount class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single UserAccount object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UserAccountMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read UserAccount $UserAccount the actual UserAccount data class being edited
	 * property QLabel $UserAccountIdControl
	 * property-read QLabel $UserAccountIdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $UsernameControl
	 * property-read QLabel $UsernameLabel
	 * property QTextBox $PasswordHashControl
	 * property-read QLabel $PasswordHashLabel
	 * property QTextBox $EmailAddressControl
	 * property-read QLabel $EmailAddressLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property QCheckBox $AdminFlagControl
	 * property-read QLabel $AdminFlagLabel
	 * property QCheckBox $PortableAccessFlagControl
	 * property-read QLabel $PortableAccessFlagLabel
	 * property QIntegerTextBox $PortableUserPinControl
	 * property-read QLabel $PortableUserPinLabel
	 * property QListBox $RoleIdControl
	 * property-read QLabel $RoleIdLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UserAccountMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var UserAccount objUserAccount
		 * @access protected
		 */
		protected $objUserAccount;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of UserAccount's individual data fields
        /**
         * @var QLabel lblUserAccountId;
         * @access protected
         */
		protected $lblUserAccountId;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtUsername;
         * @access protected
         */
		protected $txtUsername;

        /**
         * @var QTextBox txtPasswordHash;
         * @access protected
         */
		protected $txtPasswordHash;

        /**
         * @var QTextBox txtEmailAddress;
         * @access protected
         */
		protected $txtEmailAddress;

        /**
         * @var QCheckBox chkActiveFlag;
         * @access protected
         */
		protected $chkActiveFlag;

        /**
         * @var QCheckBox chkAdminFlag;
         * @access protected
         */
		protected $chkAdminFlag;

        /**
         * @var QCheckBox chkPortableAccessFlag;
         * @access protected
         */
		protected $chkPortableAccessFlag;

        /**
         * @var QIntegerTextBox txtPortableUserPin;
         * @access protected
         */
		protected $txtPortableUserPin;

        /**
         * @var QListBox lstRole;
         * @access protected
         */
		protected $lstRole;

        /**
         * @var QListBox lstCreatedByObject;
         * @access protected
         */
		protected $lstCreatedByObject;

        /**
         * @var QDateTimePicker calCreationDate;
         * @access protected
         */
		protected $calCreationDate;

        /**
         * @var QListBox lstModifiedByObject;
         * @access protected
         */
		protected $lstModifiedByObject;

        /**
         * @var QLabel lblModifiedDate;
         * @access protected
         */
		protected $lblModifiedDate;


		// Controls that allow the viewing of UserAccount's individual data fields
        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblUsername
         * @access protected
         */
		protected $lblUsername;

        /**
         * @var QLabel lblPasswordHash
         * @access protected
         */
		protected $lblPasswordHash;

        /**
         * @var QLabel lblEmailAddress
         * @access protected
         */
		protected $lblEmailAddress;

        /**
         * @var QLabel lblActiveFlag
         * @access protected
         */
		protected $lblActiveFlag;

        /**
         * @var QLabel lblAdminFlag
         * @access protected
         */
		protected $lblAdminFlag;

        /**
         * @var QLabel lblPortableAccessFlag
         * @access protected
         */
		protected $lblPortableAccessFlag;

        /**
         * @var QLabel lblPortableUserPin
         * @access protected
         */
		protected $lblPortableUserPin;

        /**
         * @var QLabel lblRoleId
         * @access protected
         */
		protected $lblRoleId;

        /**
         * @var QLabel lblCreatedBy
         * @access protected
         */
		protected $lblCreatedBy;

        /**
         * @var QLabel lblCreationDate
         * @access protected
         */
		protected $lblCreationDate;

        /**
         * @var QLabel lblModifiedBy
         * @access protected
         */
		protected $lblModifiedBy;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * UserAccountMetaControl to edit a single UserAccount object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single UserAccount object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserAccountMetaControl
		 * @param UserAccount $objUserAccount new or existing UserAccount object
		 */
		 public function __construct($objParentObject, UserAccount $objUserAccount) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UserAccountMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked UserAccount object
			$this->objUserAccount = $objUserAccount;

			// Figure out if we're Editing or Creating New
			if ($this->objUserAccount->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserAccountMetaControl
		 * @param integer $intUserAccountId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing UserAccount object creation - defaults to CreateOrEdit
 		 * @return UserAccountMetaControl
		 */
		public static function Create($objParentObject, $intUserAccountId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intUserAccountId)) {
				$objUserAccount = UserAccount::Load($intUserAccountId);

				// UserAccount was found -- return it!
				if ($objUserAccount)
					return new UserAccountMetaControl($objParentObject, $objUserAccount);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a UserAccount object with PK arguments: ' . $intUserAccountId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UserAccountMetaControl($objParentObject, new UserAccount());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserAccountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UserAccount object creation - defaults to CreateOrEdit
		 * @return UserAccountMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intUserAccountId = QApplication::PathInfo(0);
			return UserAccountMetaControl::Create($objParentObject, $intUserAccountId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserAccountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UserAccount object creation - defaults to CreateOrEdit
		 * @return UserAccountMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intUserAccountId = QApplication::QueryString('intUserAccountId');
			return UserAccountMetaControl::Create($objParentObject, $intUserAccountId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblUserAccountId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUserAccountId_Create($strControlId = null) {
			$this->lblUserAccountId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUserAccountId->Name = QApplication::Translate('User Account Id');
			if ($this->blnEditMode)
				$this->lblUserAccountId->Text = $this->objUserAccount->UserAccountId;
			else
				$this->lblUserAccountId->Text = 'N/A';
			return $this->lblUserAccountId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objUserAccount->FirstName;
			$this->txtFirstName->Required = true;
			$this->txtFirstName->MaxLength = UserAccount::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objUserAccount->FirstName;
			$this->lblFirstName->Required = true;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objUserAccount->LastName;
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = UserAccount::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objUserAccount->LastName;
			$this->lblLastName->Required = true;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUsername_Create($strControlId = null) {
			$this->txtUsername = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objUserAccount->Username;
			$this->txtUsername->Required = true;
			$this->txtUsername->MaxLength = UserAccount::UsernameMaxLength;
			return $this->txtUsername;
		}

		/**
		 * Create and setup QLabel lblUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUsername_Create($strControlId = null) {
			$this->lblUsername = new QLabel($this->objParentObject, $strControlId);
			$this->lblUsername->Name = QApplication::Translate('Username');
			$this->lblUsername->Text = $this->objUserAccount->Username;
			$this->lblUsername->Required = true;
			return $this->lblUsername;
		}

		/**
		 * Create and setup QTextBox txtPasswordHash
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPasswordHash_Create($strControlId = null) {
			$this->txtPasswordHash = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPasswordHash->Name = QApplication::Translate('Password Hash');
			$this->txtPasswordHash->Text = $this->objUserAccount->PasswordHash;
			$this->txtPasswordHash->Required = true;
			$this->txtPasswordHash->MaxLength = UserAccount::PasswordHashMaxLength;
			return $this->txtPasswordHash;
		}

		/**
		 * Create and setup QLabel lblPasswordHash
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPasswordHash_Create($strControlId = null) {
			$this->lblPasswordHash = new QLabel($this->objParentObject, $strControlId);
			$this->lblPasswordHash->Name = QApplication::Translate('Password Hash');
			$this->lblPasswordHash->Text = $this->objUserAccount->PasswordHash;
			$this->lblPasswordHash->Required = true;
			return $this->lblPasswordHash;
		}

		/**
		 * Create and setup QTextBox txtEmailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmailAddress_Create($strControlId = null) {
			$this->txtEmailAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmailAddress->Name = QApplication::Translate('Email Address');
			$this->txtEmailAddress->Text = $this->objUserAccount->EmailAddress;
			$this->txtEmailAddress->MaxLength = UserAccount::EmailAddressMaxLength;
			return $this->txtEmailAddress;
		}

		/**
		 * Create and setup QLabel lblEmailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailAddress_Create($strControlId = null) {
			$this->lblEmailAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailAddress->Name = QApplication::Translate('Email Address');
			$this->lblEmailAddress->Text = $this->objUserAccount->EmailAddress;
			return $this->lblEmailAddress;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objUserAccount->ActiveFlag;
			return $this->chkActiveFlag;
		}

		/**
		 * Create and setup QLabel lblActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActiveFlag_Create($strControlId = null) {
			$this->lblActiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->lblActiveFlag->Text = ($this->objUserAccount->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}

		/**
		 * Create and setup QCheckBox chkAdminFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAdminFlag_Create($strControlId = null) {
			$this->chkAdminFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAdminFlag->Name = QApplication::Translate('Admin Flag');
			$this->chkAdminFlag->Checked = $this->objUserAccount->AdminFlag;
			return $this->chkAdminFlag;
		}

		/**
		 * Create and setup QLabel lblAdminFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAdminFlag_Create($strControlId = null) {
			$this->lblAdminFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAdminFlag->Name = QApplication::Translate('Admin Flag');
			$this->lblAdminFlag->Text = ($this->objUserAccount->AdminFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAdminFlag;
		}

		/**
		 * Create and setup QCheckBox chkPortableAccessFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkPortableAccessFlag_Create($strControlId = null) {
			$this->chkPortableAccessFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkPortableAccessFlag->Name = QApplication::Translate('Portable Access Flag');
			$this->chkPortableAccessFlag->Checked = $this->objUserAccount->PortableAccessFlag;
			return $this->chkPortableAccessFlag;
		}

		/**
		 * Create and setup QLabel lblPortableAccessFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPortableAccessFlag_Create($strControlId = null) {
			$this->lblPortableAccessFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblPortableAccessFlag->Name = QApplication::Translate('Portable Access Flag');
			$this->lblPortableAccessFlag->Text = ($this->objUserAccount->PortableAccessFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblPortableAccessFlag;
		}

		/**
		 * Create and setup QIntegerTextBox txtPortableUserPin
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPortableUserPin_Create($strControlId = null) {
			$this->txtPortableUserPin = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPortableUserPin->Name = QApplication::Translate('Portable User Pin');
			$this->txtPortableUserPin->Text = $this->objUserAccount->PortableUserPin;
			return $this->txtPortableUserPin;
		}

		/**
		 * Create and setup QLabel lblPortableUserPin
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPortableUserPin_Create($strControlId = null, $strFormat = null) {
			$this->lblPortableUserPin = new QLabel($this->objParentObject, $strControlId);
			$this->lblPortableUserPin->Name = QApplication::Translate('Portable User Pin');
			$this->lblPortableUserPin->Text = $this->objUserAccount->PortableUserPin;
			$this->lblPortableUserPin->Format = $strFormat;
			return $this->lblPortableUserPin;
		}

		/**
		 * Create and setup QListBox lstRole
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRole_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRole = new QListBox($this->objParentObject, $strControlId);
			$this->lstRole->Name = QApplication::Translate('Role');
			$this->lstRole->Required = true;
			if (!$this->blnEditMode)
				$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRoleCursor = Role::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRole = Role::InstantiateCursor($objRoleCursor)) {
				$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
				if (($this->objUserAccount->Role) && ($this->objUserAccount->Role->RoleId == $objRole->RoleId))
					$objListItem->Selected = true;
				$this->lstRole->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRole;
		}

		/**
		 * Create and setup QLabel lblRoleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleId_Create($strControlId = null) {
			$this->lblRoleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleId->Name = QApplication::Translate('Role');
			$this->lblRoleId->Text = ($this->objUserAccount->Role) ? $this->objUserAccount->Role->__toString() : null;
			$this->lblRoleId->Required = true;
			return $this->lblRoleId;
		}

		/**
		 * Create and setup QListBox lstCreatedByObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreatedByObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreatedByObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreatedByObjectCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreatedByObject = UserAccount::InstantiateCursor($objCreatedByObjectCursor)) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objUserAccount->CreatedByObject) && ($this->objUserAccount->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreatedByObject;
		}

		/**
		 * Create and setup QLabel lblCreatedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreatedBy_Create($strControlId = null) {
			$this->lblCreatedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedBy->Name = QApplication::Translate('Created By Object');
			$this->lblCreatedBy->Text = ($this->objUserAccount->CreatedByObject) ? $this->objUserAccount->CreatedByObject->__toString() : null;
			return $this->lblCreatedBy;
		}

		/**
		 * Create and setup QDateTimePicker calCreationDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreationDate_Create($strControlId = null) {
			$this->calCreationDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objUserAccount->CreationDate;
			$this->calCreationDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calCreationDate;
		}

		/**
		 * Create and setup QLabel lblCreationDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreationDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreationDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreationDate->Name = QApplication::Translate('Creation Date');
			$this->strCreationDateDateTimeFormat = $strDateTimeFormat;
			$this->lblCreationDate->Text = sprintf($this->objUserAccount->CreationDate) ? $this->objUserAccount->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
			return $this->lblCreationDate;
		}

		protected $strCreationDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstModifiedByObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstModifiedByObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstModifiedByObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstModifiedByObject->Name = QApplication::Translate('Modified By Object');
			$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objModifiedByObjectCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objModifiedByObject = UserAccount::InstantiateCursor($objModifiedByObjectCursor)) {
				$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
				if (($this->objUserAccount->ModifiedByObject) && ($this->objUserAccount->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstModifiedByObject;
		}

		/**
		 * Create and setup QLabel lblModifiedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModifiedBy_Create($strControlId = null) {
			$this->lblModifiedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblModifiedBy->Name = QApplication::Translate('Modified By Object');
			$this->lblModifiedBy->Text = ($this->objUserAccount->ModifiedByObject) ? $this->objUserAccount->ModifiedByObject->__toString() : null;
			return $this->lblModifiedBy;
		}

		/**
		 * Create and setup QLabel lblModifiedDate
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModifiedDate_Create($strControlId = null) {
			$this->lblModifiedDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objUserAccount->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local UserAccount object.
		 * @param boolean $blnReload reload UserAccount from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUserAccount->Reload();

			if ($this->lblUserAccountId) if ($this->blnEditMode) $this->lblUserAccountId->Text = $this->objUserAccount->UserAccountId;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objUserAccount->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objUserAccount->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objUserAccount->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objUserAccount->LastName;

			if ($this->txtUsername) $this->txtUsername->Text = $this->objUserAccount->Username;
			if ($this->lblUsername) $this->lblUsername->Text = $this->objUserAccount->Username;

			if ($this->txtPasswordHash) $this->txtPasswordHash->Text = $this->objUserAccount->PasswordHash;
			if ($this->lblPasswordHash) $this->lblPasswordHash->Text = $this->objUserAccount->PasswordHash;

			if ($this->txtEmailAddress) $this->txtEmailAddress->Text = $this->objUserAccount->EmailAddress;
			if ($this->lblEmailAddress) $this->lblEmailAddress->Text = $this->objUserAccount->EmailAddress;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objUserAccount->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objUserAccount->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkAdminFlag) $this->chkAdminFlag->Checked = $this->objUserAccount->AdminFlag;
			if ($this->lblAdminFlag) $this->lblAdminFlag->Text = ($this->objUserAccount->AdminFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkPortableAccessFlag) $this->chkPortableAccessFlag->Checked = $this->objUserAccount->PortableAccessFlag;
			if ($this->lblPortableAccessFlag) $this->lblPortableAccessFlag->Text = ($this->objUserAccount->PortableAccessFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtPortableUserPin) $this->txtPortableUserPin->Text = $this->objUserAccount->PortableUserPin;
			if ($this->lblPortableUserPin) $this->lblPortableUserPin->Text = $this->objUserAccount->PortableUserPin;

			if ($this->lstRole) {
					$this->lstRole->RemoveAllItems();
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
			if ($this->lblRoleId) $this->lblRoleId->Text = ($this->objUserAccount->Role) ? $this->objUserAccount->Role->__toString() : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objUserAccount->CreatedByObject) && ($this->objUserAccount->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objUserAccount->CreatedByObject) ? $this->objUserAccount->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objUserAccount->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objUserAccount->CreationDate) ? $this->objUserAccount->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objUserAccount->ModifiedByObject) && ($this->objUserAccount->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objUserAccount->ModifiedByObject) ? $this->objUserAccount->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objUserAccount->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC USERACCOUNT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's UserAccount instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUserAccount() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtFirstName) $this->objUserAccount->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objUserAccount->LastName = $this->txtLastName->Text;
				if ($this->txtUsername) $this->objUserAccount->Username = $this->txtUsername->Text;
				if ($this->txtPasswordHash) $this->objUserAccount->PasswordHash = $this->txtPasswordHash->Text;
				if ($this->txtEmailAddress) $this->objUserAccount->EmailAddress = $this->txtEmailAddress->Text;
				if ($this->chkActiveFlag) $this->objUserAccount->ActiveFlag = $this->chkActiveFlag->Checked;
				if ($this->chkAdminFlag) $this->objUserAccount->AdminFlag = $this->chkAdminFlag->Checked;
				if ($this->chkPortableAccessFlag) $this->objUserAccount->PortableAccessFlag = $this->chkPortableAccessFlag->Checked;
				if ($this->txtPortableUserPin) $this->objUserAccount->PortableUserPin = $this->txtPortableUserPin->Text;
				if ($this->lstRole) $this->objUserAccount->RoleId = $this->lstRole->SelectedValue;
				if ($this->lstCreatedByObject) $this->objUserAccount->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objUserAccount->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objUserAccount->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the UserAccount object
				$this->objUserAccount->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's UserAccount instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUserAccount() {
			$this->objUserAccount->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'UserAccount': return $this->objUserAccount;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to UserAccount fields -- will be created dynamically if not yet created
				case 'UserAccountIdControl':
					if (!$this->lblUserAccountId) return $this->lblUserAccountId_Create();
					return $this->lblUserAccountId;
				case 'UserAccountIdLabel':
					if (!$this->lblUserAccountId) return $this->lblUserAccountId_Create();
					return $this->lblUserAccountId;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'UsernameControl':
					if (!$this->txtUsername) return $this->txtUsername_Create();
					return $this->txtUsername;
				case 'UsernameLabel':
					if (!$this->lblUsername) return $this->lblUsername_Create();
					return $this->lblUsername;
				case 'PasswordHashControl':
					if (!$this->txtPasswordHash) return $this->txtPasswordHash_Create();
					return $this->txtPasswordHash;
				case 'PasswordHashLabel':
					if (!$this->lblPasswordHash) return $this->lblPasswordHash_Create();
					return $this->lblPasswordHash;
				case 'EmailAddressControl':
					if (!$this->txtEmailAddress) return $this->txtEmailAddress_Create();
					return $this->txtEmailAddress;
				case 'EmailAddressLabel':
					if (!$this->lblEmailAddress) return $this->lblEmailAddress_Create();
					return $this->lblEmailAddress;
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
				case 'AdminFlagControl':
					if (!$this->chkAdminFlag) return $this->chkAdminFlag_Create();
					return $this->chkAdminFlag;
				case 'AdminFlagLabel':
					if (!$this->lblAdminFlag) return $this->lblAdminFlag_Create();
					return $this->lblAdminFlag;
				case 'PortableAccessFlagControl':
					if (!$this->chkPortableAccessFlag) return $this->chkPortableAccessFlag_Create();
					return $this->chkPortableAccessFlag;
				case 'PortableAccessFlagLabel':
					if (!$this->lblPortableAccessFlag) return $this->lblPortableAccessFlag_Create();
					return $this->lblPortableAccessFlag;
				case 'PortableUserPinControl':
					if (!$this->txtPortableUserPin) return $this->txtPortableUserPin_Create();
					return $this->txtPortableUserPin;
				case 'PortableUserPinLabel':
					if (!$this->lblPortableUserPin) return $this->lblPortableUserPin_Create();
					return $this->lblPortableUserPin;
				case 'RoleIdControl':
					if (!$this->lstRole) return $this->lstRole_Create();
					return $this->lstRole;
				case 'RoleIdLabel':
					if (!$this->lblRoleId) return $this->lblRoleId_Create();
					return $this->lblRoleId;
				case 'CreatedByControl':
					if (!$this->lstCreatedByObject) return $this->lstCreatedByObject_Create();
					return $this->lstCreatedByObject;
				case 'CreatedByLabel':
					if (!$this->lblCreatedBy) return $this->lblCreatedBy_Create();
					return $this->lblCreatedBy;
				case 'CreationDateControl':
					if (!$this->calCreationDate) return $this->calCreationDate_Create();
					return $this->calCreationDate;
				case 'CreationDateLabel':
					if (!$this->lblCreationDate) return $this->lblCreationDate_Create();
					return $this->lblCreationDate;
				case 'ModifiedByControl':
					if (!$this->lstModifiedByObject) return $this->lstModifiedByObject_Create();
					return $this->lstModifiedByObject;
				case 'ModifiedByLabel':
					if (!$this->lblModifiedBy) return $this->lblModifiedBy_Create();
					return $this->lblModifiedBy;
				case 'ModifiedDateControl':
					if (!$this->lblModifiedDate) return $this->lblModifiedDate_Create();
					return $this->lblModifiedDate;
				case 'ModifiedDateLabel':
					if (!$this->lblModifiedDate) return $this->lblModifiedDate_Create();
					return $this->lblModifiedDate;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to UserAccount fields
					case 'UserAccountIdControl':
						return ($this->lblUserAccountId = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'UsernameControl':
						return ($this->txtUsername = QType::Cast($mixValue, 'QControl'));
					case 'PasswordHashControl':
						return ($this->txtPasswordHash = QType::Cast($mixValue, 'QControl'));
					case 'EmailAddressControl':
						return ($this->txtEmailAddress = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'AdminFlagControl':
						return ($this->chkAdminFlag = QType::Cast($mixValue, 'QControl'));
					case 'PortableAccessFlagControl':
						return ($this->chkPortableAccessFlag = QType::Cast($mixValue, 'QControl'));
					case 'PortableUserPinControl':
						return ($this->txtPortableUserPin = QType::Cast($mixValue, 'QControl'));
					case 'RoleIdControl':
						return ($this->lstRole = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>