<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Contact class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Contact object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ContactMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Contact $Contact the actual Contact data class being edited
	 * property QLabel $ContactIdControl
	 * property-read QLabel $ContactIdLabel
	 * property QListBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QListBox $AddressIdControl
	 * property-read QLabel $AddressIdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $PhoneOfficeControl
	 * property-read QLabel $PhoneOfficeLabel
	 * property QTextBox $PhoneHomeControl
	 * property-read QLabel $PhoneHomeLabel
	 * property QTextBox $PhoneMobileControl
	 * property-read QLabel $PhoneMobileLabel
	 * property QTextBox $FaxControl
	 * property-read QLabel $FaxLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $ContactCustomFieldHelperControl
	 * property-read QLabel $ContactCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ContactMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Contact objContact
		 * @access protected
		 */
		protected $objContact;

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

		// Controls that allow the editing of Contact's individual data fields
        /**
         * @var QLabel lblContactId;
         * @access protected
         */
		protected $lblContactId;

        /**
         * @var QListBox lstCompany;
         * @access protected
         */
		protected $lstCompany;

        /**
         * @var QListBox lstAddress;
         * @access protected
         */
		protected $lstAddress;

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
         * @var QTextBox txtTitle;
         * @access protected
         */
		protected $txtTitle;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtPhoneOffice;
         * @access protected
         */
		protected $txtPhoneOffice;

        /**
         * @var QTextBox txtPhoneHome;
         * @access protected
         */
		protected $txtPhoneHome;

        /**
         * @var QTextBox txtPhoneMobile;
         * @access protected
         */
		protected $txtPhoneMobile;

        /**
         * @var QTextBox txtFax;
         * @access protected
         */
		protected $txtFax;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

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


		// Controls that allow the viewing of Contact's individual data fields
        /**
         * @var QLabel lblCompanyId
         * @access protected
         */
		protected $lblCompanyId;

        /**
         * @var QLabel lblAddressId
         * @access protected
         */
		protected $lblAddressId;

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
         * @var QLabel lblTitle
         * @access protected
         */
		protected $lblTitle;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblPhoneOffice
         * @access protected
         */
		protected $lblPhoneOffice;

        /**
         * @var QLabel lblPhoneHome
         * @access protected
         */
		protected $lblPhoneHome;

        /**
         * @var QLabel lblPhoneMobile
         * @access protected
         */
		protected $lblPhoneMobile;

        /**
         * @var QLabel lblFax
         * @access protected
         */
		protected $lblFax;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

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
         * @var QListBox lstContactCustomFieldHelper
         * @access protected
         */
		protected $lstContactCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblContactCustomFieldHelper
         * @access protected
         */
		protected $lblContactCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ContactMetaControl to edit a single Contact object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Contact object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactMetaControl
		 * @param Contact $objContact new or existing Contact object
		 */
		 public function __construct($objParentObject, Contact $objContact) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ContactMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Contact object
			$this->objContact = $objContact;

			// Figure out if we're Editing or Creating New
			if ($this->objContact->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactMetaControl
		 * @param integer $intContactId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Contact object creation - defaults to CreateOrEdit
 		 * @return ContactMetaControl
		 */
		public static function Create($objParentObject, $intContactId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intContactId)) {
				$objContact = Contact::Load($intContactId);

				// Contact was found -- return it!
				if ($objContact)
					return new ContactMetaControl($objParentObject, $objContact);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Contact object with PK arguments: ' . $intContactId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ContactMetaControl($objParentObject, new Contact());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Contact object creation - defaults to CreateOrEdit
		 * @return ContactMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intContactId = QApplication::PathInfo(0);
			return ContactMetaControl::Create($objParentObject, $intContactId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Contact object creation - defaults to CreateOrEdit
		 * @return ContactMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intContactId = QApplication::QueryString('intContactId');
			return ContactMetaControl::Create($objParentObject, $intContactId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContactId_Create($strControlId = null) {
			$this->lblContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblContactId->Name = QApplication::Translate('Contact Id');
			if ($this->blnEditMode)
				$this->lblContactId->Text = $this->objContact->ContactId;
			else
				$this->lblContactId->Text = 'N/A';
			return $this->lblContactId;
		}

		/**
		 * Create and setup QListBox lstCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstCompany->Name = QApplication::Translate('Company');
			$this->lstCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCompany = Company::InstantiateCursor($objCompanyCursor)) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
				if (($this->objContact->Company) && ($this->objContact->Company->CompanyId == $objCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCompany;
		}

		/**
		 * Create and setup QLabel lblCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompanyId_Create($strControlId = null) {
			$this->lblCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyId->Name = QApplication::Translate('Company');
			$this->lblCompanyId->Text = ($this->objContact->Company) ? $this->objContact->Company->__toString() : null;
			$this->lblCompanyId->Required = true;
			return $this->lblCompanyId;
		}

		/**
		 * Create and setup QListBox lstAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstAddress->Name = QApplication::Translate('Address');
			$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAddress = Address::InstantiateCursor($objAddressCursor)) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
				if (($this->objContact->Address) && ($this->objContact->Address->AddressId == $objAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAddress;
		}

		/**
		 * Create and setup QLabel lblAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressId_Create($strControlId = null) {
			$this->lblAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressId->Name = QApplication::Translate('Address');
			$this->lblAddressId->Text = ($this->objContact->Address) ? $this->objContact->Address->__toString() : null;
			return $this->lblAddressId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objContact->FirstName;
			$this->txtFirstName->MaxLength = Contact::FirstNameMaxLength;
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
			$this->lblFirstName->Text = $this->objContact->FirstName;
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
			$this->txtLastName->Text = $this->objContact->LastName;
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = Contact::LastNameMaxLength;
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
			$this->lblLastName->Text = $this->objContact->LastName;
			$this->lblLastName->Required = true;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objContact->Title;
			$this->txtTitle->MaxLength = Contact::TitleMaxLength;
			return $this->txtTitle;
		}

		/**
		 * Create and setup QLabel lblTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitle_Create($strControlId = null) {
			$this->lblTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitle->Name = QApplication::Translate('Title');
			$this->lblTitle->Text = $this->objContact->Title;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objContact->Email;
			$this->txtEmail->MaxLength = Contact::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objContact->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtPhoneOffice
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhoneOffice_Create($strControlId = null) {
			$this->txtPhoneOffice = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhoneOffice->Name = QApplication::Translate('Phone Office');
			$this->txtPhoneOffice->Text = $this->objContact->PhoneOffice;
			$this->txtPhoneOffice->MaxLength = Contact::PhoneOfficeMaxLength;
			return $this->txtPhoneOffice;
		}

		/**
		 * Create and setup QLabel lblPhoneOffice
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhoneOffice_Create($strControlId = null) {
			$this->lblPhoneOffice = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhoneOffice->Name = QApplication::Translate('Phone Office');
			$this->lblPhoneOffice->Text = $this->objContact->PhoneOffice;
			return $this->lblPhoneOffice;
		}

		/**
		 * Create and setup QTextBox txtPhoneHome
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhoneHome_Create($strControlId = null) {
			$this->txtPhoneHome = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhoneHome->Name = QApplication::Translate('Phone Home');
			$this->txtPhoneHome->Text = $this->objContact->PhoneHome;
			$this->txtPhoneHome->MaxLength = Contact::PhoneHomeMaxLength;
			return $this->txtPhoneHome;
		}

		/**
		 * Create and setup QLabel lblPhoneHome
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhoneHome_Create($strControlId = null) {
			$this->lblPhoneHome = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhoneHome->Name = QApplication::Translate('Phone Home');
			$this->lblPhoneHome->Text = $this->objContact->PhoneHome;
			return $this->lblPhoneHome;
		}

		/**
		 * Create and setup QTextBox txtPhoneMobile
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhoneMobile_Create($strControlId = null) {
			$this->txtPhoneMobile = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhoneMobile->Name = QApplication::Translate('Phone Mobile');
			$this->txtPhoneMobile->Text = $this->objContact->PhoneMobile;
			$this->txtPhoneMobile->MaxLength = Contact::PhoneMobileMaxLength;
			return $this->txtPhoneMobile;
		}

		/**
		 * Create and setup QLabel lblPhoneMobile
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhoneMobile_Create($strControlId = null) {
			$this->lblPhoneMobile = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhoneMobile->Name = QApplication::Translate('Phone Mobile');
			$this->lblPhoneMobile->Text = $this->objContact->PhoneMobile;
			return $this->lblPhoneMobile;
		}

		/**
		 * Create and setup QTextBox txtFax
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFax_Create($strControlId = null) {
			$this->txtFax = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFax->Name = QApplication::Translate('Fax');
			$this->txtFax->Text = $this->objContact->Fax;
			$this->txtFax->MaxLength = Contact::FaxMaxLength;
			return $this->txtFax;
		}

		/**
		 * Create and setup QLabel lblFax
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFax_Create($strControlId = null) {
			$this->lblFax = new QLabel($this->objParentObject, $strControlId);
			$this->lblFax->Name = QApplication::Translate('Fax');
			$this->lblFax->Text = $this->objContact->Fax;
			return $this->lblFax;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objContact->Description;
			$this->txtDescription->TextMode = QTextMode::MultiLine;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objContact->Description;
			return $this->lblDescription;
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
				if (($this->objContact->CreatedByObject) && ($this->objContact->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objContact->CreatedByObject) ? $this->objContact->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objContact->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objContact->CreationDate) ? $this->objContact->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objContact->ModifiedByObject) && ($this->objContact->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objContact->ModifiedByObject) ? $this->objContact->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objContact->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstContactCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstContactCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstContactCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstContactCustomFieldHelper->Name = QApplication::Translate('Contact Custom Field Helper');
			$this->lstContactCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objContactCustomFieldHelperCursor = ContactCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objContactCustomFieldHelper = ContactCustomFieldHelper::InstantiateCursor($objContactCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objContactCustomFieldHelper->__toString(), $objContactCustomFieldHelper->ContactId);
				if ($objContactCustomFieldHelper->ContactId == $this->objContact->ContactId)
					$objListItem->Selected = true;
				$this->lstContactCustomFieldHelper->AddItem($objListItem);
			}

			// Because ContactCustomFieldHelper's ContactCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstContactCustomFieldHelper->SelectedValue)
				$this->lstContactCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstContactCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblContactCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContactCustomFieldHelper_Create($strControlId = null) {
			$this->lblContactCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblContactCustomFieldHelper->Name = QApplication::Translate('Contact Custom Field Helper');
			$this->lblContactCustomFieldHelper->Text = ($this->objContact->ContactCustomFieldHelper) ? $this->objContact->ContactCustomFieldHelper->__toString() : null;
			return $this->lblContactCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Contact object.
		 * @param boolean $blnReload reload Contact from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objContact->Reload();

			if ($this->lblContactId) if ($this->blnEditMode) $this->lblContactId->Text = $this->objContact->ContactId;

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
					if (($this->objContact->Company) && ($this->objContact->Company->CompanyId == $objCompany->CompanyId))
						$objListItem->Selected = true;
					$this->lstCompany->AddItem($objListItem);
				}
			}
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objContact->Company) ? $this->objContact->Company->__toString() : null;

			if ($this->lstAddress) {
					$this->lstAddress->RemoveAllItems();
				$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objAddressArray = Address::LoadAll();
				if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
					$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
					if (($this->objContact->Address) && ($this->objContact->Address->AddressId == $objAddress->AddressId))
						$objListItem->Selected = true;
					$this->lstAddress->AddItem($objListItem);
				}
			}
			if ($this->lblAddressId) $this->lblAddressId->Text = ($this->objContact->Address) ? $this->objContact->Address->__toString() : null;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objContact->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objContact->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objContact->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objContact->LastName;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objContact->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objContact->Title;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objContact->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objContact->Email;

			if ($this->txtPhoneOffice) $this->txtPhoneOffice->Text = $this->objContact->PhoneOffice;
			if ($this->lblPhoneOffice) $this->lblPhoneOffice->Text = $this->objContact->PhoneOffice;

			if ($this->txtPhoneHome) $this->txtPhoneHome->Text = $this->objContact->PhoneHome;
			if ($this->lblPhoneHome) $this->lblPhoneHome->Text = $this->objContact->PhoneHome;

			if ($this->txtPhoneMobile) $this->txtPhoneMobile->Text = $this->objContact->PhoneMobile;
			if ($this->lblPhoneMobile) $this->lblPhoneMobile->Text = $this->objContact->PhoneMobile;

			if ($this->txtFax) $this->txtFax->Text = $this->objContact->Fax;
			if ($this->lblFax) $this->lblFax->Text = $this->objContact->Fax;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objContact->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objContact->Description;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objContact->CreatedByObject) && ($this->objContact->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objContact->CreatedByObject) ? $this->objContact->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objContact->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objContact->CreationDate) ? $this->objContact->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objContact->ModifiedByObject) && ($this->objContact->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objContact->ModifiedByObject) ? $this->objContact->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objContact->ModifiedDate;

			if ($this->lstContactCustomFieldHelper) {
				$this->lstContactCustomFieldHelper->RemoveAllItems();
				$this->lstContactCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objContactCustomFieldHelperArray = ContactCustomFieldHelper::LoadAll();
				if ($objContactCustomFieldHelperArray) foreach ($objContactCustomFieldHelperArray as $objContactCustomFieldHelper) {
					$objListItem = new QListItem($objContactCustomFieldHelper->__toString(), $objContactCustomFieldHelper->ContactId);
					if ($objContactCustomFieldHelper->ContactId == $this->objContact->ContactId)
						$objListItem->Selected = true;
					$this->lstContactCustomFieldHelper->AddItem($objListItem);
				}
				// Because ContactCustomFieldHelper's ContactCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstContactCustomFieldHelper->SelectedValue)
					$this->lstContactCustomFieldHelper->Enabled = false;
				else
					$this->lstContactCustomFieldHelper->Enabled = true;
			}
			if ($this->lblContactCustomFieldHelper) $this->lblContactCustomFieldHelper->Text = ($this->objContact->ContactCustomFieldHelper) ? $this->objContact->ContactCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CONTACT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Contact instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveContact() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCompany) $this->objContact->CompanyId = $this->lstCompany->SelectedValue;
				if ($this->lstAddress) $this->objContact->AddressId = $this->lstAddress->SelectedValue;
				if ($this->txtFirstName) $this->objContact->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objContact->LastName = $this->txtLastName->Text;
				if ($this->txtTitle) $this->objContact->Title = $this->txtTitle->Text;
				if ($this->txtEmail) $this->objContact->Email = $this->txtEmail->Text;
				if ($this->txtPhoneOffice) $this->objContact->PhoneOffice = $this->txtPhoneOffice->Text;
				if ($this->txtPhoneHome) $this->objContact->PhoneHome = $this->txtPhoneHome->Text;
				if ($this->txtPhoneMobile) $this->objContact->PhoneMobile = $this->txtPhoneMobile->Text;
				if ($this->txtFax) $this->objContact->Fax = $this->txtFax->Text;
				if ($this->txtDescription) $this->objContact->Description = $this->txtDescription->Text;
				if ($this->lstCreatedByObject) $this->objContact->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objContact->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objContact->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstContactCustomFieldHelper) $this->objContact->ContactCustomFieldHelper = ContactCustomFieldHelper::Load($this->lstContactCustomFieldHelper->SelectedValue);

				// Save the Contact object
				$this->objContact->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Contact instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteContact() {
			$this->objContact->Delete();
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
				case 'Contact': return $this->objContact;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Contact fields -- will be created dynamically if not yet created
				case 'ContactIdControl':
					if (!$this->lblContactId) return $this->lblContactId_Create();
					return $this->lblContactId;
				case 'ContactIdLabel':
					if (!$this->lblContactId) return $this->lblContactId_Create();
					return $this->lblContactId;
				case 'CompanyIdControl':
					if (!$this->lstCompany) return $this->lstCompany_Create();
					return $this->lstCompany;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'AddressIdControl':
					if (!$this->lstAddress) return $this->lstAddress_Create();
					return $this->lstAddress;
				case 'AddressIdLabel':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
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
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'PhoneOfficeControl':
					if (!$this->txtPhoneOffice) return $this->txtPhoneOffice_Create();
					return $this->txtPhoneOffice;
				case 'PhoneOfficeLabel':
					if (!$this->lblPhoneOffice) return $this->lblPhoneOffice_Create();
					return $this->lblPhoneOffice;
				case 'PhoneHomeControl':
					if (!$this->txtPhoneHome) return $this->txtPhoneHome_Create();
					return $this->txtPhoneHome;
				case 'PhoneHomeLabel':
					if (!$this->lblPhoneHome) return $this->lblPhoneHome_Create();
					return $this->lblPhoneHome;
				case 'PhoneMobileControl':
					if (!$this->txtPhoneMobile) return $this->txtPhoneMobile_Create();
					return $this->txtPhoneMobile;
				case 'PhoneMobileLabel':
					if (!$this->lblPhoneMobile) return $this->lblPhoneMobile_Create();
					return $this->lblPhoneMobile;
				case 'FaxControl':
					if (!$this->txtFax) return $this->txtFax_Create();
					return $this->txtFax;
				case 'FaxLabel':
					if (!$this->lblFax) return $this->lblFax_Create();
					return $this->lblFax;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
				case 'ContactCustomFieldHelperControl':
					if (!$this->lstContactCustomFieldHelper) return $this->lstContactCustomFieldHelper_Create();
					return $this->lstContactCustomFieldHelper;
				case 'ContactCustomFieldHelperLabel':
					if (!$this->lblContactCustomFieldHelper) return $this->lblContactCustomFieldHelper_Create();
					return $this->lblContactCustomFieldHelper;
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
					// Controls that point to Contact fields
					case 'ContactIdControl':
						return ($this->lblContactId = QType::Cast($mixValue, 'QControl'));
					case 'CompanyIdControl':
						return ($this->lstCompany = QType::Cast($mixValue, 'QControl'));
					case 'AddressIdControl':
						return ($this->lstAddress = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'PhoneOfficeControl':
						return ($this->txtPhoneOffice = QType::Cast($mixValue, 'QControl'));
					case 'PhoneHomeControl':
						return ($this->txtPhoneHome = QType::Cast($mixValue, 'QControl'));
					case 'PhoneMobileControl':
						return ($this->txtPhoneMobile = QType::Cast($mixValue, 'QControl'));
					case 'FaxControl':
						return ($this->txtFax = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'ContactCustomFieldHelperControl':
						return ($this->lstContactCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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