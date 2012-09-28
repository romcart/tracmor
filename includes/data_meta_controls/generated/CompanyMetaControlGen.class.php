<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Company class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Company object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CompanyMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Company $Company the actual Company data class being edited
	 * property QLabel $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QListBox $AddressIdControl
	 * property-read QLabel $AddressIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $WebsiteControl
	 * property-read QLabel $WebsiteLabel
	 * property QTextBox $TelephoneControl
	 * property-read QLabel $TelephoneLabel
	 * property QTextBox $FaxControl
	 * property-read QLabel $FaxLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $CompanyCustomFieldHelperControl
	 * property-read QLabel $CompanyCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CompanyMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Company objCompany
		 * @access protected
		 */
		protected $objCompany;

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

		// Controls that allow the editing of Company's individual data fields
        /**
         * @var QLabel lblCompanyId;
         * @access protected
         */
		protected $lblCompanyId;

        /**
         * @var QListBox lstAddress;
         * @access protected
         */
		protected $lstAddress;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtWebsite;
         * @access protected
         */
		protected $txtWebsite;

        /**
         * @var QTextBox txtTelephone;
         * @access protected
         */
		protected $txtTelephone;

        /**
         * @var QTextBox txtFax;
         * @access protected
         */
		protected $txtFax;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtLongDescription;
         * @access protected
         */
		protected $txtLongDescription;

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


		// Controls that allow the viewing of Company's individual data fields
        /**
         * @var QLabel lblAddressId
         * @access protected
         */
		protected $lblAddressId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblWebsite
         * @access protected
         */
		protected $lblWebsite;

        /**
         * @var QLabel lblTelephone
         * @access protected
         */
		protected $lblTelephone;

        /**
         * @var QLabel lblFax
         * @access protected
         */
		protected $lblFax;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblLongDescription
         * @access protected
         */
		protected $lblLongDescription;

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
         * @var QListBox lstCompanyCustomFieldHelper
         * @access protected
         */
		protected $lstCompanyCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblCompanyCustomFieldHelper
         * @access protected
         */
		protected $lblCompanyCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CompanyMetaControl to edit a single Company object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Company object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param Company $objCompany new or existing Company object
		 */
		 public function __construct($objParentObject, Company $objCompany) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CompanyMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Company object
			$this->objCompany = $objCompany;

			// Figure out if we're Editing or Creating New
			if ($this->objCompany->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param integer $intCompanyId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Company object creation - defaults to CreateOrEdit
 		 * @return CompanyMetaControl
		 */
		public static function Create($objParentObject, $intCompanyId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCompanyId)) {
				$objCompany = Company::Load($intCompanyId);

				// Company was found -- return it!
				if ($objCompany)
					return new CompanyMetaControl($objParentObject, $objCompany);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Company object with PK arguments: ' . $intCompanyId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CompanyMetaControl($objParentObject, new Company());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Company object creation - defaults to CreateOrEdit
		 * @return CompanyMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCompanyId = QApplication::PathInfo(0);
			return CompanyMetaControl::Create($objParentObject, $intCompanyId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Company object creation - defaults to CreateOrEdit
		 * @return CompanyMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCompanyId = QApplication::QueryString('intCompanyId');
			return CompanyMetaControl::Create($objParentObject, $intCompanyId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompanyId_Create($strControlId = null) {
			$this->lblCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyId->Name = QApplication::Translate('Company Id');
			if ($this->blnEditMode)
				$this->lblCompanyId->Text = $this->objCompany->CompanyId;
			else
				$this->lblCompanyId->Text = 'N/A';
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
				if (($this->objCompany->Address) && ($this->objCompany->Address->AddressId == $objAddress->AddressId))
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
			$this->lblAddressId->Text = ($this->objCompany->Address) ? $this->objCompany->Address->__toString() : null;
			return $this->lblAddressId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCompany->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Company::ShortDescriptionMaxLength;
			return $this->txtShortDescription;
		}

		/**
		 * Create and setup QLabel lblShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShortDescription_Create($strControlId = null) {
			$this->lblShortDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblShortDescription->Name = QApplication::Translate('Short Description');
			$this->lblShortDescription->Text = $this->objCompany->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtWebsite
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtWebsite_Create($strControlId = null) {
			$this->txtWebsite = new QTextBox($this->objParentObject, $strControlId);
			$this->txtWebsite->Name = QApplication::Translate('Website');
			$this->txtWebsite->Text = $this->objCompany->Website;
			$this->txtWebsite->MaxLength = Company::WebsiteMaxLength;
			return $this->txtWebsite;
		}

		/**
		 * Create and setup QLabel lblWebsite
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWebsite_Create($strControlId = null) {
			$this->lblWebsite = new QLabel($this->objParentObject, $strControlId);
			$this->lblWebsite->Name = QApplication::Translate('Website');
			$this->lblWebsite->Text = $this->objCompany->Website;
			return $this->lblWebsite;
		}

		/**
		 * Create and setup QTextBox txtTelephone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTelephone_Create($strControlId = null) {
			$this->txtTelephone = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTelephone->Name = QApplication::Translate('Telephone');
			$this->txtTelephone->Text = $this->objCompany->Telephone;
			$this->txtTelephone->MaxLength = Company::TelephoneMaxLength;
			return $this->txtTelephone;
		}

		/**
		 * Create and setup QLabel lblTelephone
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTelephone_Create($strControlId = null) {
			$this->lblTelephone = new QLabel($this->objParentObject, $strControlId);
			$this->lblTelephone->Name = QApplication::Translate('Telephone');
			$this->lblTelephone->Text = $this->objCompany->Telephone;
			return $this->lblTelephone;
		}

		/**
		 * Create and setup QTextBox txtFax
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFax_Create($strControlId = null) {
			$this->txtFax = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFax->Name = QApplication::Translate('Fax');
			$this->txtFax->Text = $this->objCompany->Fax;
			$this->txtFax->MaxLength = Company::FaxMaxLength;
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
			$this->lblFax->Text = $this->objCompany->Fax;
			return $this->lblFax;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objCompany->Email;
			$this->txtEmail->MaxLength = Company::EmailMaxLength;
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
			$this->lblEmail->Text = $this->objCompany->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLongDescription_Create($strControlId = null) {
			$this->txtLongDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objCompany->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
			return $this->txtLongDescription;
		}

		/**
		 * Create and setup QLabel lblLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLongDescription_Create($strControlId = null) {
			$this->lblLongDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblLongDescription->Name = QApplication::Translate('Long Description');
			$this->lblLongDescription->Text = $this->objCompany->LongDescription;
			return $this->lblLongDescription;
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
				if (($this->objCompany->CreatedByObject) && ($this->objCompany->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objCompany->CreatedByObject) ? $this->objCompany->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objCompany->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objCompany->CreationDate) ? $this->objCompany->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objCompany->ModifiedByObject) && ($this->objCompany->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objCompany->ModifiedByObject) ? $this->objCompany->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objCompany->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstCompanyCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCompanyCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCompanyCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstCompanyCustomFieldHelper->Name = QApplication::Translate('Company Custom Field Helper');
			$this->lstCompanyCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCompanyCustomFieldHelperCursor = CompanyCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCompanyCustomFieldHelper = CompanyCustomFieldHelper::InstantiateCursor($objCompanyCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objCompanyCustomFieldHelper->__toString(), $objCompanyCustomFieldHelper->CompanyId);
				if ($objCompanyCustomFieldHelper->CompanyId == $this->objCompany->CompanyId)
					$objListItem->Selected = true;
				$this->lstCompanyCustomFieldHelper->AddItem($objListItem);
			}

			// Because CompanyCustomFieldHelper's CompanyCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstCompanyCustomFieldHelper->SelectedValue)
				$this->lstCompanyCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstCompanyCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblCompanyCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompanyCustomFieldHelper_Create($strControlId = null) {
			$this->lblCompanyCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyCustomFieldHelper->Name = QApplication::Translate('Company Custom Field Helper');
			$this->lblCompanyCustomFieldHelper->Text = ($this->objCompany->CompanyCustomFieldHelper) ? $this->objCompany->CompanyCustomFieldHelper->__toString() : null;
			return $this->lblCompanyCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Company object.
		 * @param boolean $blnReload reload Company from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCompany->Reload();

			if ($this->lblCompanyId) if ($this->blnEditMode) $this->lblCompanyId->Text = $this->objCompany->CompanyId;

			if ($this->lstAddress) {
					$this->lstAddress->RemoveAllItems();
				$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objAddressArray = Address::LoadAll();
				if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
					$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
					if (($this->objCompany->Address) && ($this->objCompany->Address->AddressId == $objAddress->AddressId))
						$objListItem->Selected = true;
					$this->lstAddress->AddItem($objListItem);
				}
			}
			if ($this->lblAddressId) $this->lblAddressId->Text = ($this->objCompany->Address) ? $this->objCompany->Address->__toString() : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objCompany->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objCompany->ShortDescription;

			if ($this->txtWebsite) $this->txtWebsite->Text = $this->objCompany->Website;
			if ($this->lblWebsite) $this->lblWebsite->Text = $this->objCompany->Website;

			if ($this->txtTelephone) $this->txtTelephone->Text = $this->objCompany->Telephone;
			if ($this->lblTelephone) $this->lblTelephone->Text = $this->objCompany->Telephone;

			if ($this->txtFax) $this->txtFax->Text = $this->objCompany->Fax;
			if ($this->lblFax) $this->lblFax->Text = $this->objCompany->Fax;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objCompany->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objCompany->Email;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objCompany->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objCompany->LongDescription;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objCompany->CreatedByObject) && ($this->objCompany->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objCompany->CreatedByObject) ? $this->objCompany->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objCompany->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objCompany->CreationDate) ? $this->objCompany->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objCompany->ModifiedByObject) && ($this->objCompany->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objCompany->ModifiedByObject) ? $this->objCompany->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objCompany->ModifiedDate;

			if ($this->lstCompanyCustomFieldHelper) {
				$this->lstCompanyCustomFieldHelper->RemoveAllItems();
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
				else
					$this->lstCompanyCustomFieldHelper->Enabled = true;
			}
			if ($this->lblCompanyCustomFieldHelper) $this->lblCompanyCustomFieldHelper->Text = ($this->objCompany->CompanyCustomFieldHelper) ? $this->objCompany->CompanyCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC COMPANY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Company instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCompany() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAddress) $this->objCompany->AddressId = $this->lstAddress->SelectedValue;
				if ($this->txtShortDescription) $this->objCompany->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtWebsite) $this->objCompany->Website = $this->txtWebsite->Text;
				if ($this->txtTelephone) $this->objCompany->Telephone = $this->txtTelephone->Text;
				if ($this->txtFax) $this->objCompany->Fax = $this->txtFax->Text;
				if ($this->txtEmail) $this->objCompany->Email = $this->txtEmail->Text;
				if ($this->txtLongDescription) $this->objCompany->LongDescription = $this->txtLongDescription->Text;
				if ($this->lstCreatedByObject) $this->objCompany->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objCompany->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objCompany->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstCompanyCustomFieldHelper) $this->objCompany->CompanyCustomFieldHelper = CompanyCustomFieldHelper::Load($this->lstCompanyCustomFieldHelper->SelectedValue);

				// Save the Company object
				$this->objCompany->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Company instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCompany() {
			$this->objCompany->Delete();
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
				case 'Company': return $this->objCompany;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Company fields -- will be created dynamically if not yet created
				case 'CompanyIdControl':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'AddressIdControl':
					if (!$this->lstAddress) return $this->lstAddress_Create();
					return $this->lstAddress;
				case 'AddressIdLabel':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'WebsiteControl':
					if (!$this->txtWebsite) return $this->txtWebsite_Create();
					return $this->txtWebsite;
				case 'WebsiteLabel':
					if (!$this->lblWebsite) return $this->lblWebsite_Create();
					return $this->lblWebsite;
				case 'TelephoneControl':
					if (!$this->txtTelephone) return $this->txtTelephone_Create();
					return $this->txtTelephone;
				case 'TelephoneLabel':
					if (!$this->lblTelephone) return $this->lblTelephone_Create();
					return $this->lblTelephone;
				case 'FaxControl':
					if (!$this->txtFax) return $this->txtFax_Create();
					return $this->txtFax;
				case 'FaxLabel':
					if (!$this->lblFax) return $this->lblFax_Create();
					return $this->lblFax;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'LongDescriptionControl':
					if (!$this->txtLongDescription) return $this->txtLongDescription_Create();
					return $this->txtLongDescription;
				case 'LongDescriptionLabel':
					if (!$this->lblLongDescription) return $this->lblLongDescription_Create();
					return $this->lblLongDescription;
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
				case 'CompanyCustomFieldHelperControl':
					if (!$this->lstCompanyCustomFieldHelper) return $this->lstCompanyCustomFieldHelper_Create();
					return $this->lstCompanyCustomFieldHelper;
				case 'CompanyCustomFieldHelperLabel':
					if (!$this->lblCompanyCustomFieldHelper) return $this->lblCompanyCustomFieldHelper_Create();
					return $this->lblCompanyCustomFieldHelper;
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
					// Controls that point to Company fields
					case 'CompanyIdControl':
						return ($this->lblCompanyId = QType::Cast($mixValue, 'QControl'));
					case 'AddressIdControl':
						return ($this->lstAddress = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'WebsiteControl':
						return ($this->txtWebsite = QType::Cast($mixValue, 'QControl'));
					case 'TelephoneControl':
						return ($this->txtTelephone = QType::Cast($mixValue, 'QControl'));
					case 'FaxControl':
						return ($this->txtFax = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'CompanyCustomFieldHelperControl':
						return ($this->lstCompanyCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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