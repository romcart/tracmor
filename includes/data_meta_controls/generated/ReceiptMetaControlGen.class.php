<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Receipt class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Receipt object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ReceiptMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Receipt $Receipt the actual Receipt data class being edited
	 * property QLabel $ReceiptIdControl
	 * property-read QLabel $ReceiptIdLabel
	 * property QListBox $TransactionIdControl
	 * property-read QLabel $TransactionIdLabel
	 * property QListBox $FromCompanyIdControl
	 * property-read QLabel $FromCompanyIdLabel
	 * property QListBox $FromContactIdControl
	 * property-read QLabel $FromContactIdLabel
	 * property QListBox $ToContactIdControl
	 * property-read QLabel $ToContactIdLabel
	 * property QListBox $ToAddressIdControl
	 * property-read QLabel $ToAddressIdLabel
	 * property QTextBox $ReceiptNumberControl
	 * property-read QLabel $ReceiptNumberLabel
	 * property QDateTimePicker $DueDateControl
	 * property-read QLabel $DueDateLabel
	 * property QDateTimePicker $ReceiptDateControl
	 * property-read QLabel $ReceiptDateLabel
	 * property QCheckBox $ReceivedFlagControl
	 * property-read QLabel $ReceivedFlagLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $ReceiptCustomFieldHelperControl
	 * property-read QLabel $ReceiptCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ReceiptMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Receipt objReceipt
		 * @access protected
		 */
		protected $objReceipt;

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

		// Controls that allow the editing of Receipt's individual data fields
        /**
         * @var QLabel lblReceiptId;
         * @access protected
         */
		protected $lblReceiptId;

        /**
         * @var QListBox lstTransaction;
         * @access protected
         */
		protected $lstTransaction;

        /**
         * @var QListBox lstFromCompany;
         * @access protected
         */
		protected $lstFromCompany;

        /**
         * @var QListBox lstFromContact;
         * @access protected
         */
		protected $lstFromContact;

        /**
         * @var QListBox lstToContact;
         * @access protected
         */
		protected $lstToContact;

        /**
         * @var QListBox lstToAddress;
         * @access protected
         */
		protected $lstToAddress;

        /**
         * @var QTextBox txtReceiptNumber;
         * @access protected
         */
		protected $txtReceiptNumber;

        /**
         * @var QDateTimePicker calDueDate;
         * @access protected
         */
		protected $calDueDate;

        /**
         * @var QDateTimePicker calReceiptDate;
         * @access protected
         */
		protected $calReceiptDate;

        /**
         * @var QCheckBox chkReceivedFlag;
         * @access protected
         */
		protected $chkReceivedFlag;

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


		// Controls that allow the viewing of Receipt's individual data fields
        /**
         * @var QLabel lblTransactionId
         * @access protected
         */
		protected $lblTransactionId;

        /**
         * @var QLabel lblFromCompanyId
         * @access protected
         */
		protected $lblFromCompanyId;

        /**
         * @var QLabel lblFromContactId
         * @access protected
         */
		protected $lblFromContactId;

        /**
         * @var QLabel lblToContactId
         * @access protected
         */
		protected $lblToContactId;

        /**
         * @var QLabel lblToAddressId
         * @access protected
         */
		protected $lblToAddressId;

        /**
         * @var QLabel lblReceiptNumber
         * @access protected
         */
		protected $lblReceiptNumber;

        /**
         * @var QLabel lblDueDate
         * @access protected
         */
		protected $lblDueDate;

        /**
         * @var QLabel lblReceiptDate
         * @access protected
         */
		protected $lblReceiptDate;

        /**
         * @var QLabel lblReceivedFlag
         * @access protected
         */
		protected $lblReceivedFlag;

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
        /**
         * @var QListBox lstReceiptCustomFieldHelper
         * @access protected
         */
		protected $lstReceiptCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblReceiptCustomFieldHelper
         * @access protected
         */
		protected $lblReceiptCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ReceiptMetaControl to edit a single Receipt object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Receipt object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptMetaControl
		 * @param Receipt $objReceipt new or existing Receipt object
		 */
		 public function __construct($objParentObject, Receipt $objReceipt) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ReceiptMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Receipt object
			$this->objReceipt = $objReceipt;

			// Figure out if we're Editing or Creating New
			if ($this->objReceipt->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptMetaControl
		 * @param integer $intReceiptId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Receipt object creation - defaults to CreateOrEdit
 		 * @return ReceiptMetaControl
		 */
		public static function Create($objParentObject, $intReceiptId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intReceiptId)) {
				$objReceipt = Receipt::Load($intReceiptId);

				// Receipt was found -- return it!
				if ($objReceipt)
					return new ReceiptMetaControl($objParentObject, $objReceipt);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Receipt object with PK arguments: ' . $intReceiptId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ReceiptMetaControl($objParentObject, new Receipt());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Receipt object creation - defaults to CreateOrEdit
		 * @return ReceiptMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intReceiptId = QApplication::PathInfo(0);
			return ReceiptMetaControl::Create($objParentObject, $intReceiptId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Receipt object creation - defaults to CreateOrEdit
		 * @return ReceiptMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intReceiptId = QApplication::QueryString('intReceiptId');
			return ReceiptMetaControl::Create($objParentObject, $intReceiptId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblReceiptId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceiptId_Create($strControlId = null) {
			$this->lblReceiptId = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceiptId->Name = QApplication::Translate('Receipt Id');
			if ($this->blnEditMode)
				$this->lblReceiptId->Text = $this->objReceipt->ReceiptId;
			else
				$this->lblReceiptId->Text = 'N/A';
			return $this->lblReceiptId;
		}

		/**
		 * Create and setup QListBox lstTransaction
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTransaction_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTransaction = new QListBox($this->objParentObject, $strControlId);
			$this->lstTransaction->Name = QApplication::Translate('Transaction');
			$this->lstTransaction->Required = true;
			if (!$this->blnEditMode)
				$this->lstTransaction->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTransactionCursor = Transaction::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTransaction = Transaction::InstantiateCursor($objTransactionCursor)) {
				$objListItem = new QListItem($objTransaction->__toString(), $objTransaction->TransactionId);
				if (($this->objReceipt->Transaction) && ($this->objReceipt->Transaction->TransactionId == $objTransaction->TransactionId))
					$objListItem->Selected = true;
				$this->lstTransaction->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTransaction;
		}

		/**
		 * Create and setup QLabel lblTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionId_Create($strControlId = null) {
			$this->lblTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionId->Name = QApplication::Translate('Transaction');
			$this->lblTransactionId->Text = ($this->objReceipt->Transaction) ? $this->objReceipt->Transaction->__toString() : null;
			$this->lblTransactionId->Required = true;
			return $this->lblTransactionId;
		}

		/**
		 * Create and setup QListBox lstFromCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFromCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFromCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstFromCompany->Name = QApplication::Translate('From Company');
			$this->lstFromCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFromCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFromCompany = Company::InstantiateCursor($objFromCompanyCursor)) {
				$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
				if (($this->objReceipt->FromCompany) && ($this->objReceipt->FromCompany->CompanyId == $objFromCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstFromCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFromCompany;
		}

		/**
		 * Create and setup QLabel lblFromCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromCompanyId_Create($strControlId = null) {
			$this->lblFromCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromCompanyId->Name = QApplication::Translate('From Company');
			$this->lblFromCompanyId->Text = ($this->objReceipt->FromCompany) ? $this->objReceipt->FromCompany->__toString() : null;
			$this->lblFromCompanyId->Required = true;
			return $this->lblFromCompanyId;
		}

		/**
		 * Create and setup QListBox lstFromContact
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFromContact_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFromContact = new QListBox($this->objParentObject, $strControlId);
			$this->lstFromContact->Name = QApplication::Translate('From Contact');
			$this->lstFromContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromContact->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFromContactCursor = Contact::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFromContact = Contact::InstantiateCursor($objFromContactCursor)) {
				$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
				if (($this->objReceipt->FromContact) && ($this->objReceipt->FromContact->ContactId == $objFromContact->ContactId))
					$objListItem->Selected = true;
				$this->lstFromContact->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFromContact;
		}

		/**
		 * Create and setup QLabel lblFromContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromContactId_Create($strControlId = null) {
			$this->lblFromContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromContactId->Name = QApplication::Translate('From Contact');
			$this->lblFromContactId->Text = ($this->objReceipt->FromContact) ? $this->objReceipt->FromContact->__toString() : null;
			$this->lblFromContactId->Required = true;
			return $this->lblFromContactId;
		}

		/**
		 * Create and setup QListBox lstToContact
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToContact_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToContact = new QListBox($this->objParentObject, $strControlId);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstToContact->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToContactCursor = Contact::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToContact = Contact::InstantiateCursor($objToContactCursor)) {
				$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
				if (($this->objReceipt->ToContact) && ($this->objReceipt->ToContact->ContactId == $objToContact->ContactId))
					$objListItem->Selected = true;
				$this->lstToContact->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToContact;
		}

		/**
		 * Create and setup QLabel lblToContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToContactId_Create($strControlId = null) {
			$this->lblToContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToContactId->Name = QApplication::Translate('To Contact');
			$this->lblToContactId->Text = ($this->objReceipt->ToContact) ? $this->objReceipt->ToContact->__toString() : null;
			$this->lblToContactId->Required = true;
			return $this->lblToContactId;
		}

		/**
		 * Create and setup QListBox lstToAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstToAddress->Name = QApplication::Translate('To Address');
			$this->lstToAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstToAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToAddress = Address::InstantiateCursor($objToAddressCursor)) {
				$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
				if (($this->objReceipt->ToAddress) && ($this->objReceipt->ToAddress->AddressId == $objToAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstToAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToAddress;
		}

		/**
		 * Create and setup QLabel lblToAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToAddressId_Create($strControlId = null) {
			$this->lblToAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToAddressId->Name = QApplication::Translate('To Address');
			$this->lblToAddressId->Text = ($this->objReceipt->ToAddress) ? $this->objReceipt->ToAddress->__toString() : null;
			$this->lblToAddressId->Required = true;
			return $this->lblToAddressId;
		}

		/**
		 * Create and setup QTextBox txtReceiptNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtReceiptNumber_Create($strControlId = null) {
			$this->txtReceiptNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtReceiptNumber->Name = QApplication::Translate('Receipt Number');
			$this->txtReceiptNumber->Text = $this->objReceipt->ReceiptNumber;
			$this->txtReceiptNumber->Required = true;
			$this->txtReceiptNumber->MaxLength = Receipt::ReceiptNumberMaxLength;
			return $this->txtReceiptNumber;
		}

		/**
		 * Create and setup QLabel lblReceiptNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceiptNumber_Create($strControlId = null) {
			$this->lblReceiptNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceiptNumber->Name = QApplication::Translate('Receipt Number');
			$this->lblReceiptNumber->Text = $this->objReceipt->ReceiptNumber;
			$this->lblReceiptNumber->Required = true;
			return $this->lblReceiptNumber;
		}

		/**
		 * Create and setup QDateTimePicker calDueDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDueDate_Create($strControlId = null) {
			$this->calDueDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDueDate->Name = QApplication::Translate('Due Date');
			$this->calDueDate->DateTime = $this->objReceipt->DueDate;
			$this->calDueDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDueDate;
		}

		/**
		 * Create and setup QLabel lblDueDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDueDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDueDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblDueDate->Name = QApplication::Translate('Due Date');
			$this->strDueDateDateTimeFormat = $strDateTimeFormat;
			$this->lblDueDate->Text = sprintf($this->objReceipt->DueDate) ? $this->objReceipt->DueDate->__toString($this->strDueDateDateTimeFormat) : null;
			return $this->lblDueDate;
		}

		protected $strDueDateDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calReceiptDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calReceiptDate_Create($strControlId = null) {
			$this->calReceiptDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calReceiptDate->Name = QApplication::Translate('Receipt Date');
			$this->calReceiptDate->DateTime = $this->objReceipt->ReceiptDate;
			$this->calReceiptDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calReceiptDate;
		}

		/**
		 * Create and setup QLabel lblReceiptDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblReceiptDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblReceiptDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceiptDate->Name = QApplication::Translate('Receipt Date');
			$this->strReceiptDateDateTimeFormat = $strDateTimeFormat;
			$this->lblReceiptDate->Text = sprintf($this->objReceipt->ReceiptDate) ? $this->objReceipt->ReceiptDate->__toString($this->strReceiptDateDateTimeFormat) : null;
			return $this->lblReceiptDate;
		}

		protected $strReceiptDateDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkReceivedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkReceivedFlag_Create($strControlId = null) {
			$this->chkReceivedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkReceivedFlag->Name = QApplication::Translate('Received Flag');
			$this->chkReceivedFlag->Checked = $this->objReceipt->ReceivedFlag;
			return $this->chkReceivedFlag;
		}

		/**
		 * Create and setup QLabel lblReceivedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceivedFlag_Create($strControlId = null) {
			$this->lblReceivedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceivedFlag->Name = QApplication::Translate('Received Flag');
			$this->lblReceivedFlag->Text = ($this->objReceipt->ReceivedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblReceivedFlag;
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
				if (($this->objReceipt->CreatedByObject) && ($this->objReceipt->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objReceipt->CreatedByObject) ? $this->objReceipt->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objReceipt->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objReceipt->CreationDate) ? $this->objReceipt->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objReceipt->ModifiedByObject) && ($this->objReceipt->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objReceipt->ModifiedByObject) ? $this->objReceipt->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objReceipt->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstReceiptCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstReceiptCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstReceiptCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstReceiptCustomFieldHelper->Name = QApplication::Translate('Receipt Custom Field Helper');
			$this->lstReceiptCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objReceiptCustomFieldHelperCursor = ReceiptCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objReceiptCustomFieldHelper = ReceiptCustomFieldHelper::InstantiateCursor($objReceiptCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objReceiptCustomFieldHelper->__toString(), $objReceiptCustomFieldHelper->ReceiptId);
				if ($objReceiptCustomFieldHelper->ReceiptId == $this->objReceipt->ReceiptId)
					$objListItem->Selected = true;
				$this->lstReceiptCustomFieldHelper->AddItem($objListItem);
			}

			// Because ReceiptCustomFieldHelper's ReceiptCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstReceiptCustomFieldHelper->SelectedValue)
				$this->lstReceiptCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstReceiptCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblReceiptCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceiptCustomFieldHelper_Create($strControlId = null) {
			$this->lblReceiptCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceiptCustomFieldHelper->Name = QApplication::Translate('Receipt Custom Field Helper');
			$this->lblReceiptCustomFieldHelper->Text = ($this->objReceipt->ReceiptCustomFieldHelper) ? $this->objReceipt->ReceiptCustomFieldHelper->__toString() : null;
			return $this->lblReceiptCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Receipt object.
		 * @param boolean $blnReload reload Receipt from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objReceipt->Reload();

			if ($this->lblReceiptId) if ($this->blnEditMode) $this->lblReceiptId->Text = $this->objReceipt->ReceiptId;

			if ($this->lstTransaction) {
					$this->lstTransaction->RemoveAllItems();
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
			if ($this->lblTransactionId) $this->lblTransactionId->Text = ($this->objReceipt->Transaction) ? $this->objReceipt->Transaction->__toString() : null;

			if ($this->lstFromCompany) {
					$this->lstFromCompany->RemoveAllItems();
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
			if ($this->lblFromCompanyId) $this->lblFromCompanyId->Text = ($this->objReceipt->FromCompany) ? $this->objReceipt->FromCompany->__toString() : null;

			if ($this->lstFromContact) {
					$this->lstFromContact->RemoveAllItems();
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
			if ($this->lblFromContactId) $this->lblFromContactId->Text = ($this->objReceipt->FromContact) ? $this->objReceipt->FromContact->__toString() : null;

			if ($this->lstToContact) {
					$this->lstToContact->RemoveAllItems();
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
			if ($this->lblToContactId) $this->lblToContactId->Text = ($this->objReceipt->ToContact) ? $this->objReceipt->ToContact->__toString() : null;

			if ($this->lstToAddress) {
					$this->lstToAddress->RemoveAllItems();
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
			if ($this->lblToAddressId) $this->lblToAddressId->Text = ($this->objReceipt->ToAddress) ? $this->objReceipt->ToAddress->__toString() : null;

			if ($this->txtReceiptNumber) $this->txtReceiptNumber->Text = $this->objReceipt->ReceiptNumber;
			if ($this->lblReceiptNumber) $this->lblReceiptNumber->Text = $this->objReceipt->ReceiptNumber;

			if ($this->calDueDate) $this->calDueDate->DateTime = $this->objReceipt->DueDate;
			if ($this->lblDueDate) $this->lblDueDate->Text = sprintf($this->objReceipt->DueDate) ? $this->objReceipt->__toString($this->strDueDateDateTimeFormat) : null;

			if ($this->calReceiptDate) $this->calReceiptDate->DateTime = $this->objReceipt->ReceiptDate;
			if ($this->lblReceiptDate) $this->lblReceiptDate->Text = sprintf($this->objReceipt->ReceiptDate) ? $this->objReceipt->__toString($this->strReceiptDateDateTimeFormat) : null;

			if ($this->chkReceivedFlag) $this->chkReceivedFlag->Checked = $this->objReceipt->ReceivedFlag;
			if ($this->lblReceivedFlag) $this->lblReceivedFlag->Text = ($this->objReceipt->ReceivedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objReceipt->CreatedByObject) && ($this->objReceipt->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objReceipt->CreatedByObject) ? $this->objReceipt->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objReceipt->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objReceipt->CreationDate) ? $this->objReceipt->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objReceipt->ModifiedByObject) && ($this->objReceipt->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objReceipt->ModifiedByObject) ? $this->objReceipt->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objReceipt->ModifiedDate;

			if ($this->lstReceiptCustomFieldHelper) {
				$this->lstReceiptCustomFieldHelper->RemoveAllItems();
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
				else
					$this->lstReceiptCustomFieldHelper->Enabled = true;
			}
			if ($this->lblReceiptCustomFieldHelper) $this->lblReceiptCustomFieldHelper->Text = ($this->objReceipt->ReceiptCustomFieldHelper) ? $this->objReceipt->ReceiptCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RECEIPT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Receipt instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveReceipt() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstTransaction) $this->objReceipt->TransactionId = $this->lstTransaction->SelectedValue;
				if ($this->lstFromCompany) $this->objReceipt->FromCompanyId = $this->lstFromCompany->SelectedValue;
				if ($this->lstFromContact) $this->objReceipt->FromContactId = $this->lstFromContact->SelectedValue;
				if ($this->lstToContact) $this->objReceipt->ToContactId = $this->lstToContact->SelectedValue;
				if ($this->lstToAddress) $this->objReceipt->ToAddressId = $this->lstToAddress->SelectedValue;
				if ($this->txtReceiptNumber) $this->objReceipt->ReceiptNumber = $this->txtReceiptNumber->Text;
				if ($this->calDueDate) $this->objReceipt->DueDate = $this->calDueDate->DateTime;
				if ($this->calReceiptDate) $this->objReceipt->ReceiptDate = $this->calReceiptDate->DateTime;
				if ($this->chkReceivedFlag) $this->objReceipt->ReceivedFlag = $this->chkReceivedFlag->Checked;
				if ($this->lstCreatedByObject) $this->objReceipt->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objReceipt->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objReceipt->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstReceiptCustomFieldHelper) $this->objReceipt->ReceiptCustomFieldHelper = ReceiptCustomFieldHelper::Load($this->lstReceiptCustomFieldHelper->SelectedValue);

				// Save the Receipt object
				$this->objReceipt->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Receipt instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteReceipt() {
			$this->objReceipt->Delete();
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
				case 'Receipt': return $this->objReceipt;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Receipt fields -- will be created dynamically if not yet created
				case 'ReceiptIdControl':
					if (!$this->lblReceiptId) return $this->lblReceiptId_Create();
					return $this->lblReceiptId;
				case 'ReceiptIdLabel':
					if (!$this->lblReceiptId) return $this->lblReceiptId_Create();
					return $this->lblReceiptId;
				case 'TransactionIdControl':
					if (!$this->lstTransaction) return $this->lstTransaction_Create();
					return $this->lstTransaction;
				case 'TransactionIdLabel':
					if (!$this->lblTransactionId) return $this->lblTransactionId_Create();
					return $this->lblTransactionId;
				case 'FromCompanyIdControl':
					if (!$this->lstFromCompany) return $this->lstFromCompany_Create();
					return $this->lstFromCompany;
				case 'FromCompanyIdLabel':
					if (!$this->lblFromCompanyId) return $this->lblFromCompanyId_Create();
					return $this->lblFromCompanyId;
				case 'FromContactIdControl':
					if (!$this->lstFromContact) return $this->lstFromContact_Create();
					return $this->lstFromContact;
				case 'FromContactIdLabel':
					if (!$this->lblFromContactId) return $this->lblFromContactId_Create();
					return $this->lblFromContactId;
				case 'ToContactIdControl':
					if (!$this->lstToContact) return $this->lstToContact_Create();
					return $this->lstToContact;
				case 'ToContactIdLabel':
					if (!$this->lblToContactId) return $this->lblToContactId_Create();
					return $this->lblToContactId;
				case 'ToAddressIdControl':
					if (!$this->lstToAddress) return $this->lstToAddress_Create();
					return $this->lstToAddress;
				case 'ToAddressIdLabel':
					if (!$this->lblToAddressId) return $this->lblToAddressId_Create();
					return $this->lblToAddressId;
				case 'ReceiptNumberControl':
					if (!$this->txtReceiptNumber) return $this->txtReceiptNumber_Create();
					return $this->txtReceiptNumber;
				case 'ReceiptNumberLabel':
					if (!$this->lblReceiptNumber) return $this->lblReceiptNumber_Create();
					return $this->lblReceiptNumber;
				case 'DueDateControl':
					if (!$this->calDueDate) return $this->calDueDate_Create();
					return $this->calDueDate;
				case 'DueDateLabel':
					if (!$this->lblDueDate) return $this->lblDueDate_Create();
					return $this->lblDueDate;
				case 'ReceiptDateControl':
					if (!$this->calReceiptDate) return $this->calReceiptDate_Create();
					return $this->calReceiptDate;
				case 'ReceiptDateLabel':
					if (!$this->lblReceiptDate) return $this->lblReceiptDate_Create();
					return $this->lblReceiptDate;
				case 'ReceivedFlagControl':
					if (!$this->chkReceivedFlag) return $this->chkReceivedFlag_Create();
					return $this->chkReceivedFlag;
				case 'ReceivedFlagLabel':
					if (!$this->lblReceivedFlag) return $this->lblReceivedFlag_Create();
					return $this->lblReceivedFlag;
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
				case 'ReceiptCustomFieldHelperControl':
					if (!$this->lstReceiptCustomFieldHelper) return $this->lstReceiptCustomFieldHelper_Create();
					return $this->lstReceiptCustomFieldHelper;
				case 'ReceiptCustomFieldHelperLabel':
					if (!$this->lblReceiptCustomFieldHelper) return $this->lblReceiptCustomFieldHelper_Create();
					return $this->lblReceiptCustomFieldHelper;
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
					// Controls that point to Receipt fields
					case 'ReceiptIdControl':
						return ($this->lblReceiptId = QType::Cast($mixValue, 'QControl'));
					case 'TransactionIdControl':
						return ($this->lstTransaction = QType::Cast($mixValue, 'QControl'));
					case 'FromCompanyIdControl':
						return ($this->lstFromCompany = QType::Cast($mixValue, 'QControl'));
					case 'FromContactIdControl':
						return ($this->lstFromContact = QType::Cast($mixValue, 'QControl'));
					case 'ToContactIdControl':
						return ($this->lstToContact = QType::Cast($mixValue, 'QControl'));
					case 'ToAddressIdControl':
						return ($this->lstToAddress = QType::Cast($mixValue, 'QControl'));
					case 'ReceiptNumberControl':
						return ($this->txtReceiptNumber = QType::Cast($mixValue, 'QControl'));
					case 'DueDateControl':
						return ($this->calDueDate = QType::Cast($mixValue, 'QControl'));
					case 'ReceiptDateControl':
						return ($this->calReceiptDate = QType::Cast($mixValue, 'QControl'));
					case 'ReceivedFlagControl':
						return ($this->chkReceivedFlag = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'ReceiptCustomFieldHelperControl':
						return ($this->lstReceiptCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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