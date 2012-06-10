<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Country class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Country object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CountryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Country $Country the actual Country data class being edited
	 * property QLabel $CountryIdControl
	 * property-read QLabel $CountryIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $AbbreviationControl
	 * property-read QLabel $AbbreviationLabel
	 * property QCheckBox $StateFlagControl
	 * property-read QLabel $StateFlagLabel
	 * property QCheckBox $ProvinceFlagControl
	 * property-read QLabel $ProvinceFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CountryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Country objCountry
		 * @access protected
		 */
		protected $objCountry;

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

		// Controls that allow the editing of Country's individual data fields
        /**
         * @var QLabel lblCountryId;
         * @access protected
         */
		protected $lblCountryId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtAbbreviation;
         * @access protected
         */
		protected $txtAbbreviation;

        /**
         * @var QCheckBox chkStateFlag;
         * @access protected
         */
		protected $chkStateFlag;

        /**
         * @var QCheckBox chkProvinceFlag;
         * @access protected
         */
		protected $chkProvinceFlag;


		// Controls that allow the viewing of Country's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblAbbreviation
         * @access protected
         */
		protected $lblAbbreviation;

        /**
         * @var QLabel lblStateFlag
         * @access protected
         */
		protected $lblStateFlag;

        /**
         * @var QLabel lblProvinceFlag
         * @access protected
         */
		protected $lblProvinceFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CountryMetaControl to edit a single Country object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Country object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CountryMetaControl
		 * @param Country $objCountry new or existing Country object
		 */
		 public function __construct($objParentObject, Country $objCountry) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CountryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Country object
			$this->objCountry = $objCountry;

			// Figure out if we're Editing or Creating New
			if ($this->objCountry->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CountryMetaControl
		 * @param integer $intCountryId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Country object creation - defaults to CreateOrEdit
 		 * @return CountryMetaControl
		 */
		public static function Create($objParentObject, $intCountryId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCountryId)) {
				$objCountry = Country::Load($intCountryId);

				// Country was found -- return it!
				if ($objCountry)
					return new CountryMetaControl($objParentObject, $objCountry);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Country object with PK arguments: ' . $intCountryId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CountryMetaControl($objParentObject, new Country());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CountryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Country object creation - defaults to CreateOrEdit
		 * @return CountryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCountryId = QApplication::PathInfo(0);
			return CountryMetaControl::Create($objParentObject, $intCountryId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CountryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Country object creation - defaults to CreateOrEdit
		 * @return CountryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCountryId = QApplication::QueryString('intCountryId');
			return CountryMetaControl::Create($objParentObject, $intCountryId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblCountryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountryId_Create($strControlId = null) {
			$this->lblCountryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountryId->Name = QApplication::Translate('Country Id');
			if ($this->blnEditMode)
				$this->lblCountryId->Text = $this->objCountry->CountryId;
			else
				$this->lblCountryId->Text = 'N/A';
			return $this->lblCountryId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCountry->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Country::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objCountry->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtAbbreviation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAbbreviation_Create($strControlId = null) {
			$this->txtAbbreviation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAbbreviation->Name = QApplication::Translate('Abbreviation');
			$this->txtAbbreviation->Text = $this->objCountry->Abbreviation;
			$this->txtAbbreviation->MaxLength = Country::AbbreviationMaxLength;
			return $this->txtAbbreviation;
		}

		/**
		 * Create and setup QLabel lblAbbreviation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAbbreviation_Create($strControlId = null) {
			$this->lblAbbreviation = new QLabel($this->objParentObject, $strControlId);
			$this->lblAbbreviation->Name = QApplication::Translate('Abbreviation');
			$this->lblAbbreviation->Text = $this->objCountry->Abbreviation;
			return $this->lblAbbreviation;
		}

		/**
		 * Create and setup QCheckBox chkStateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkStateFlag_Create($strControlId = null) {
			$this->chkStateFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkStateFlag->Name = QApplication::Translate('State Flag');
			$this->chkStateFlag->Checked = $this->objCountry->StateFlag;
			return $this->chkStateFlag;
		}

		/**
		 * Create and setup QLabel lblStateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStateFlag_Create($strControlId = null) {
			$this->lblStateFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblStateFlag->Name = QApplication::Translate('State Flag');
			$this->lblStateFlag->Text = ($this->objCountry->StateFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblStateFlag;
		}

		/**
		 * Create and setup QCheckBox chkProvinceFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkProvinceFlag_Create($strControlId = null) {
			$this->chkProvinceFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkProvinceFlag->Name = QApplication::Translate('Province Flag');
			$this->chkProvinceFlag->Checked = $this->objCountry->ProvinceFlag;
			return $this->chkProvinceFlag;
		}

		/**
		 * Create and setup QLabel lblProvinceFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblProvinceFlag_Create($strControlId = null) {
			$this->lblProvinceFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblProvinceFlag->Name = QApplication::Translate('Province Flag');
			$this->lblProvinceFlag->Text = ($this->objCountry->ProvinceFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblProvinceFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local Country object.
		 * @param boolean $blnReload reload Country from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCountry->Reload();

			if ($this->lblCountryId) if ($this->blnEditMode) $this->lblCountryId->Text = $this->objCountry->CountryId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objCountry->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objCountry->ShortDescription;

			if ($this->txtAbbreviation) $this->txtAbbreviation->Text = $this->objCountry->Abbreviation;
			if ($this->lblAbbreviation) $this->lblAbbreviation->Text = $this->objCountry->Abbreviation;

			if ($this->chkStateFlag) $this->chkStateFlag->Checked = $this->objCountry->StateFlag;
			if ($this->lblStateFlag) $this->lblStateFlag->Text = ($this->objCountry->StateFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkProvinceFlag) $this->chkProvinceFlag->Checked = $this->objCountry->ProvinceFlag;
			if ($this->lblProvinceFlag) $this->lblProvinceFlag->Text = ($this->objCountry->ProvinceFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC COUNTRY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Country instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCountry() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objCountry->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtAbbreviation) $this->objCountry->Abbreviation = $this->txtAbbreviation->Text;
				if ($this->chkStateFlag) $this->objCountry->StateFlag = $this->chkStateFlag->Checked;
				if ($this->chkProvinceFlag) $this->objCountry->ProvinceFlag = $this->chkProvinceFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Country object
				$this->objCountry->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Country instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCountry() {
			$this->objCountry->Delete();
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
				case 'Country': return $this->objCountry;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Country fields -- will be created dynamically if not yet created
				case 'CountryIdControl':
					if (!$this->lblCountryId) return $this->lblCountryId_Create();
					return $this->lblCountryId;
				case 'CountryIdLabel':
					if (!$this->lblCountryId) return $this->lblCountryId_Create();
					return $this->lblCountryId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'AbbreviationControl':
					if (!$this->txtAbbreviation) return $this->txtAbbreviation_Create();
					return $this->txtAbbreviation;
				case 'AbbreviationLabel':
					if (!$this->lblAbbreviation) return $this->lblAbbreviation_Create();
					return $this->lblAbbreviation;
				case 'StateFlagControl':
					if (!$this->chkStateFlag) return $this->chkStateFlag_Create();
					return $this->chkStateFlag;
				case 'StateFlagLabel':
					if (!$this->lblStateFlag) return $this->lblStateFlag_Create();
					return $this->lblStateFlag;
				case 'ProvinceFlagControl':
					if (!$this->chkProvinceFlag) return $this->chkProvinceFlag_Create();
					return $this->chkProvinceFlag;
				case 'ProvinceFlagLabel':
					if (!$this->lblProvinceFlag) return $this->lblProvinceFlag_Create();
					return $this->lblProvinceFlag;
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
					// Controls that point to Country fields
					case 'CountryIdControl':
						return ($this->lblCountryId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'AbbreviationControl':
						return ($this->txtAbbreviation = QType::Cast($mixValue, 'QControl'));
					case 'StateFlagControl':
						return ($this->chkStateFlag = QType::Cast($mixValue, 'QControl'));
					case 'ProvinceFlagControl':
						return ($this->chkProvinceFlag = QType::Cast($mixValue, 'QControl'));
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