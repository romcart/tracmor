<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Address class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Address object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AddressMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Address $Address the actual Address data class being edited
	 * property QLabel $AddressIdControl
	 * property-read QLabel $AddressIdLabel
	 * property QListBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QListBox $CountryIdControl
	 * property-read QLabel $CountryIdLabel
	 * property QTextBox $Address1Control
	 * property-read QLabel $Address1Label
	 * property QTextBox $Address2Control
	 * property-read QLabel $Address2Label
	 * property QTextBox $CityControl
	 * property-read QLabel $CityLabel
	 * property QListBox $StateProvinceIdControl
	 * property-read QLabel $StateProvinceIdLabel
	 * property QTextBox $PostalCodeControl
	 * property-read QLabel $PostalCodeLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $AddressCustomFieldHelperControl
	 * property-read QLabel $AddressCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AddressMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Address objAddress
		 * @access protected
		 */
		protected $objAddress;

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

		// Controls that allow the editing of Address's individual data fields
        /**
         * @var QLabel lblAddressId;
         * @access protected
         */
		protected $lblAddressId;

        /**
         * @var QListBox lstCompany;
         * @access protected
         */
		protected $lstCompany;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QListBox lstCountry;
         * @access protected
         */
		protected $lstCountry;

        /**
         * @var QTextBox txtAddress1;
         * @access protected
         */
		protected $txtAddress1;

        /**
         * @var QTextBox txtAddress2;
         * @access protected
         */
		protected $txtAddress2;

        /**
         * @var QTextBox txtCity;
         * @access protected
         */
		protected $txtCity;

        /**
         * @var QListBox lstStateProvince;
         * @access protected
         */
		protected $lstStateProvince;

        /**
         * @var QTextBox txtPostalCode;
         * @access protected
         */
		protected $txtPostalCode;

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


		// Controls that allow the viewing of Address's individual data fields
        /**
         * @var QLabel lblCompanyId
         * @access protected
         */
		protected $lblCompanyId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblCountryId
         * @access protected
         */
		protected $lblCountryId;

        /**
         * @var QLabel lblAddress1
         * @access protected
         */
		protected $lblAddress1;

        /**
         * @var QLabel lblAddress2
         * @access protected
         */
		protected $lblAddress2;

        /**
         * @var QLabel lblCity
         * @access protected
         */
		protected $lblCity;

        /**
         * @var QLabel lblStateProvinceId
         * @access protected
         */
		protected $lblStateProvinceId;

        /**
         * @var QLabel lblPostalCode
         * @access protected
         */
		protected $lblPostalCode;

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
         * @var QListBox lstAddressCustomFieldHelper
         * @access protected
         */
		protected $lstAddressCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblAddressCustomFieldHelper
         * @access protected
         */
		protected $lblAddressCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AddressMetaControl to edit a single Address object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Address object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param Address $objAddress new or existing Address object
		 */
		 public function __construct($objParentObject, Address $objAddress) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AddressMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Address object
			$this->objAddress = $objAddress;

			// Figure out if we're Editing or Creating New
			if ($this->objAddress->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param integer $intAddressId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
 		 * @return AddressMetaControl
		 */
		public static function Create($objParentObject, $intAddressId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAddressId)) {
				$objAddress = Address::Load($intAddressId);

				// Address was found -- return it!
				if ($objAddress)
					return new AddressMetaControl($objParentObject, $objAddress);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Address object with PK arguments: ' . $intAddressId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AddressMetaControl($objParentObject, new Address());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
		 * @return AddressMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAddressId = QApplication::PathInfo(0);
			return AddressMetaControl::Create($objParentObject, $intAddressId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
		 * @return AddressMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAddressId = QApplication::QueryString('intAddressId');
			return AddressMetaControl::Create($objParentObject, $intAddressId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressId_Create($strControlId = null) {
			$this->lblAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressId->Name = QApplication::Translate('Address Id');
			if ($this->blnEditMode)
				$this->lblAddressId->Text = $this->objAddress->AddressId;
			else
				$this->lblAddressId->Text = 'N/A';
			return $this->lblAddressId;
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
				if (($this->objAddress->Company) && ($this->objAddress->Company->CompanyId == $objCompany->CompanyId))
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
			$this->lblCompanyId->Text = ($this->objAddress->Company) ? $this->objAddress->Company->__toString() : null;
			$this->lblCompanyId->Required = true;
			return $this->lblCompanyId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAddress->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Address::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objAddress->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QListBox lstCountry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCountry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCountry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->Required = true;
			if (!$this->blnEditMode)
				$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCountryCursor = Country::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCountry = Country::InstantiateCursor($objCountryCursor)) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
				if (($this->objAddress->Country) && ($this->objAddress->Country->CountryId == $objCountry->CountryId))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCountry;
		}

		/**
		 * Create and setup QLabel lblCountryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountryId_Create($strControlId = null) {
			$this->lblCountryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountryId->Name = QApplication::Translate('Country');
			$this->lblCountryId->Text = ($this->objAddress->Country) ? $this->objAddress->Country->__toString() : null;
			$this->lblCountryId->Required = true;
			return $this->lblCountryId;
		}

		/**
		 * Create and setup QTextBox txtAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress1_Create($strControlId = null) {
			$this->txtAddress1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objAddress->Address1;
			$this->txtAddress1->Required = true;
			$this->txtAddress1->MaxLength = Address::Address1MaxLength;
			return $this->txtAddress1;
		}

		/**
		 * Create and setup QLabel lblAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress1_Create($strControlId = null) {
			$this->lblAddress1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress1->Name = QApplication::Translate('Address 1');
			$this->lblAddress1->Text = $this->objAddress->Address1;
			$this->lblAddress1->Required = true;
			return $this->lblAddress1;
		}

		/**
		 * Create and setup QTextBox txtAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress2_Create($strControlId = null) {
			$this->txtAddress2 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress2->Name = QApplication::Translate('Address 2');
			$this->txtAddress2->Text = $this->objAddress->Address2;
			$this->txtAddress2->MaxLength = Address::Address2MaxLength;
			return $this->txtAddress2;
		}

		/**
		 * Create and setup QLabel lblAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress2_Create($strControlId = null) {
			$this->lblAddress2 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress2->Name = QApplication::Translate('Address 2');
			$this->lblAddress2->Text = $this->objAddress->Address2;
			return $this->lblAddress2;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objAddress->City;
			$this->txtCity->Required = true;
			$this->txtCity->MaxLength = Address::CityMaxLength;
			return $this->txtCity;
		}

		/**
		 * Create and setup QLabel lblCity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCity_Create($strControlId = null) {
			$this->lblCity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCity->Name = QApplication::Translate('City');
			$this->lblCity->Text = $this->objAddress->City;
			$this->lblCity->Required = true;
			return $this->lblCity;
		}

		/**
		 * Create and setup QListBox lstStateProvince
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStateProvince_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStateProvince = new QListBox($this->objParentObject, $strControlId);
			$this->lstStateProvince->Name = QApplication::Translate('State Province');
			$this->lstStateProvince->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStateProvinceCursor = StateProvince::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStateProvince = StateProvince::InstantiateCursor($objStateProvinceCursor)) {
				$objListItem = new QListItem($objStateProvince->__toString(), $objStateProvince->StateProvinceId);
				if (($this->objAddress->StateProvince) && ($this->objAddress->StateProvince->StateProvinceId == $objStateProvince->StateProvinceId))
					$objListItem->Selected = true;
				$this->lstStateProvince->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStateProvince;
		}

		/**
		 * Create and setup QLabel lblStateProvinceId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStateProvinceId_Create($strControlId = null) {
			$this->lblStateProvinceId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStateProvinceId->Name = QApplication::Translate('State Province');
			$this->lblStateProvinceId->Text = ($this->objAddress->StateProvince) ? $this->objAddress->StateProvince->__toString() : null;
			return $this->lblStateProvinceId;
		}

		/**
		 * Create and setup QTextBox txtPostalCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPostalCode_Create($strControlId = null) {
			$this->txtPostalCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPostalCode->Name = QApplication::Translate('Postal Code');
			$this->txtPostalCode->Text = $this->objAddress->PostalCode;
			$this->txtPostalCode->Required = true;
			$this->txtPostalCode->MaxLength = Address::PostalCodeMaxLength;
			return $this->txtPostalCode;
		}

		/**
		 * Create and setup QLabel lblPostalCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPostalCode_Create($strControlId = null) {
			$this->lblPostalCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostalCode->Name = QApplication::Translate('Postal Code');
			$this->lblPostalCode->Text = $this->objAddress->PostalCode;
			$this->lblPostalCode->Required = true;
			return $this->lblPostalCode;
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
				if (($this->objAddress->CreatedByObject) && ($this->objAddress->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objAddress->CreatedByObject) ? $this->objAddress->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objAddress->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objAddress->CreationDate) ? $this->objAddress->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objAddress->ModifiedByObject) && ($this->objAddress->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objAddress->ModifiedByObject) ? $this->objAddress->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objAddress->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstAddressCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAddressCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAddressCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstAddressCustomFieldHelper->Name = QApplication::Translate('Address Custom Field Helper');
			$this->lstAddressCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAddressCustomFieldHelperCursor = AddressCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAddressCustomFieldHelper = AddressCustomFieldHelper::InstantiateCursor($objAddressCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objAddressCustomFieldHelper->__toString(), $objAddressCustomFieldHelper->AddressId);
				if ($objAddressCustomFieldHelper->AddressId == $this->objAddress->AddressId)
					$objListItem->Selected = true;
				$this->lstAddressCustomFieldHelper->AddItem($objListItem);
			}

			// Because AddressCustomFieldHelper's AddressCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAddressCustomFieldHelper->SelectedValue)
				$this->lstAddressCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstAddressCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblAddressCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressCustomFieldHelper_Create($strControlId = null) {
			$this->lblAddressCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressCustomFieldHelper->Name = QApplication::Translate('Address Custom Field Helper');
			$this->lblAddressCustomFieldHelper->Text = ($this->objAddress->AddressCustomFieldHelper) ? $this->objAddress->AddressCustomFieldHelper->__toString() : null;
			return $this->lblAddressCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Address object.
		 * @param boolean $blnReload reload Address from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAddress->Reload();

			if ($this->lblAddressId) if ($this->blnEditMode) $this->lblAddressId->Text = $this->objAddress->AddressId;

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
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
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objAddress->Company) ? $this->objAddress->Company->__toString() : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objAddress->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objAddress->ShortDescription;

			if ($this->lstCountry) {
					$this->lstCountry->RemoveAllItems();
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
			if ($this->lblCountryId) $this->lblCountryId->Text = ($this->objAddress->Country) ? $this->objAddress->Country->__toString() : null;

			if ($this->txtAddress1) $this->txtAddress1->Text = $this->objAddress->Address1;
			if ($this->lblAddress1) $this->lblAddress1->Text = $this->objAddress->Address1;

			if ($this->txtAddress2) $this->txtAddress2->Text = $this->objAddress->Address2;
			if ($this->lblAddress2) $this->lblAddress2->Text = $this->objAddress->Address2;

			if ($this->txtCity) $this->txtCity->Text = $this->objAddress->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objAddress->City;

			if ($this->lstStateProvince) {
					$this->lstStateProvince->RemoveAllItems();
				$this->lstStateProvince->AddItem(QApplication::Translate('- Select One -'), null);
				$objStateProvinceArray = StateProvince::LoadAll();
				if ($objStateProvinceArray) foreach ($objStateProvinceArray as $objStateProvince) {
					$objListItem = new QListItem($objStateProvince->__toString(), $objStateProvince->StateProvinceId);
					if (($this->objAddress->StateProvince) && ($this->objAddress->StateProvince->StateProvinceId == $objStateProvince->StateProvinceId))
						$objListItem->Selected = true;
					$this->lstStateProvince->AddItem($objListItem);
				}
			}
			if ($this->lblStateProvinceId) $this->lblStateProvinceId->Text = ($this->objAddress->StateProvince) ? $this->objAddress->StateProvince->__toString() : null;

			if ($this->txtPostalCode) $this->txtPostalCode->Text = $this->objAddress->PostalCode;
			if ($this->lblPostalCode) $this->lblPostalCode->Text = $this->objAddress->PostalCode;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objAddress->CreatedByObject) && ($this->objAddress->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objAddress->CreatedByObject) ? $this->objAddress->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objAddress->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objAddress->CreationDate) ? $this->objAddress->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objAddress->ModifiedByObject) && ($this->objAddress->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objAddress->ModifiedByObject) ? $this->objAddress->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objAddress->ModifiedDate;

			if ($this->lstAddressCustomFieldHelper) {
				$this->lstAddressCustomFieldHelper->RemoveAllItems();
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
				else
					$this->lstAddressCustomFieldHelper->Enabled = true;
			}
			if ($this->lblAddressCustomFieldHelper) $this->lblAddressCustomFieldHelper->Text = ($this->objAddress->AddressCustomFieldHelper) ? $this->objAddress->AddressCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ADDRESS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Address instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAddress() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCompany) $this->objAddress->CompanyId = $this->lstCompany->SelectedValue;
				if ($this->txtShortDescription) $this->objAddress->ShortDescription = $this->txtShortDescription->Text;
				if ($this->lstCountry) $this->objAddress->CountryId = $this->lstCountry->SelectedValue;
				if ($this->txtAddress1) $this->objAddress->Address1 = $this->txtAddress1->Text;
				if ($this->txtAddress2) $this->objAddress->Address2 = $this->txtAddress2->Text;
				if ($this->txtCity) $this->objAddress->City = $this->txtCity->Text;
				if ($this->lstStateProvince) $this->objAddress->StateProvinceId = $this->lstStateProvince->SelectedValue;
				if ($this->txtPostalCode) $this->objAddress->PostalCode = $this->txtPostalCode->Text;
				if ($this->lstCreatedByObject) $this->objAddress->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objAddress->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objAddress->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstAddressCustomFieldHelper) $this->objAddress->AddressCustomFieldHelper = AddressCustomFieldHelper::Load($this->lstAddressCustomFieldHelper->SelectedValue);

				// Save the Address object
				$this->objAddress->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Address instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAddress() {
			$this->objAddress->Delete();
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
				case 'Address': return $this->objAddress;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Address fields -- will be created dynamically if not yet created
				case 'AddressIdControl':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
				case 'AddressIdLabel':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
				case 'CompanyIdControl':
					if (!$this->lstCompany) return $this->lstCompany_Create();
					return $this->lstCompany;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'CountryIdControl':
					if (!$this->lstCountry) return $this->lstCountry_Create();
					return $this->lstCountry;
				case 'CountryIdLabel':
					if (!$this->lblCountryId) return $this->lblCountryId_Create();
					return $this->lblCountryId;
				case 'Address1Control':
					if (!$this->txtAddress1) return $this->txtAddress1_Create();
					return $this->txtAddress1;
				case 'Address1Label':
					if (!$this->lblAddress1) return $this->lblAddress1_Create();
					return $this->lblAddress1;
				case 'Address2Control':
					if (!$this->txtAddress2) return $this->txtAddress2_Create();
					return $this->txtAddress2;
				case 'Address2Label':
					if (!$this->lblAddress2) return $this->lblAddress2_Create();
					return $this->lblAddress2;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'StateProvinceIdControl':
					if (!$this->lstStateProvince) return $this->lstStateProvince_Create();
					return $this->lstStateProvince;
				case 'StateProvinceIdLabel':
					if (!$this->lblStateProvinceId) return $this->lblStateProvinceId_Create();
					return $this->lblStateProvinceId;
				case 'PostalCodeControl':
					if (!$this->txtPostalCode) return $this->txtPostalCode_Create();
					return $this->txtPostalCode;
				case 'PostalCodeLabel':
					if (!$this->lblPostalCode) return $this->lblPostalCode_Create();
					return $this->lblPostalCode;
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
				case 'AddressCustomFieldHelperControl':
					if (!$this->lstAddressCustomFieldHelper) return $this->lstAddressCustomFieldHelper_Create();
					return $this->lstAddressCustomFieldHelper;
				case 'AddressCustomFieldHelperLabel':
					if (!$this->lblAddressCustomFieldHelper) return $this->lblAddressCustomFieldHelper_Create();
					return $this->lblAddressCustomFieldHelper;
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
					// Controls that point to Address fields
					case 'AddressIdControl':
						return ($this->lblAddressId = QType::Cast($mixValue, 'QControl'));
					case 'CompanyIdControl':
						return ($this->lstCompany = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'CountryIdControl':
						return ($this->lstCountry = QType::Cast($mixValue, 'QControl'));
					case 'Address1Control':
						return ($this->txtAddress1 = QType::Cast($mixValue, 'QControl'));
					case 'Address2Control':
						return ($this->txtAddress2 = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'StateProvinceIdControl':
						return ($this->lstStateProvince = QType::Cast($mixValue, 'QControl'));
					case 'PostalCodeControl':
						return ($this->txtPostalCode = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'AddressCustomFieldHelperControl':
						return ($this->lstAddressCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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