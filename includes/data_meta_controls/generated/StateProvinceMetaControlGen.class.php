<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StateProvince class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StateProvince object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StateProvinceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read StateProvince $StateProvince the actual StateProvince data class being edited
	 * property QLabel $StateProvinceIdControl
	 * property-read QLabel $StateProvinceIdLabel
	 * property QListBox $CountryIdControl
	 * property-read QLabel $CountryIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $AbbreviationControl
	 * property-read QLabel $AbbreviationLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StateProvinceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StateProvince objStateProvince
		 * @access protected
		 */
		protected $objStateProvince;

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

		// Controls that allow the editing of StateProvince's individual data fields
        /**
         * @var QLabel lblStateProvinceId;
         * @access protected
         */
		protected $lblStateProvinceId;

        /**
         * @var QListBox lstCountry;
         * @access protected
         */
		protected $lstCountry;

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


		// Controls that allow the viewing of StateProvince's individual data fields
        /**
         * @var QLabel lblCountryId
         * @access protected
         */
		protected $lblCountryId;

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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StateProvinceMetaControl to edit a single StateProvince object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StateProvince object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StateProvinceMetaControl
		 * @param StateProvince $objStateProvince new or existing StateProvince object
		 */
		 public function __construct($objParentObject, StateProvince $objStateProvince) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StateProvinceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StateProvince object
			$this->objStateProvince = $objStateProvince;

			// Figure out if we're Editing or Creating New
			if ($this->objStateProvince->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StateProvinceMetaControl
		 * @param integer $intStateProvinceId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StateProvince object creation - defaults to CreateOrEdit
 		 * @return StateProvinceMetaControl
		 */
		public static function Create($objParentObject, $intStateProvinceId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intStateProvinceId)) {
				$objStateProvince = StateProvince::Load($intStateProvinceId);

				// StateProvince was found -- return it!
				if ($objStateProvince)
					return new StateProvinceMetaControl($objParentObject, $objStateProvince);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StateProvince object with PK arguments: ' . $intStateProvinceId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StateProvinceMetaControl($objParentObject, new StateProvince());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StateProvinceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StateProvince object creation - defaults to CreateOrEdit
		 * @return StateProvinceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intStateProvinceId = QApplication::PathInfo(0);
			return StateProvinceMetaControl::Create($objParentObject, $intStateProvinceId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StateProvinceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StateProvince object creation - defaults to CreateOrEdit
		 * @return StateProvinceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intStateProvinceId = QApplication::QueryString('intStateProvinceId');
			return StateProvinceMetaControl::Create($objParentObject, $intStateProvinceId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblStateProvinceId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStateProvinceId_Create($strControlId = null) {
			$this->lblStateProvinceId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStateProvinceId->Name = QApplication::Translate('State Province Id');
			if ($this->blnEditMode)
				$this->lblStateProvinceId->Text = $this->objStateProvince->StateProvinceId;
			else
				$this->lblStateProvinceId->Text = 'N/A';
			return $this->lblStateProvinceId;
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
			$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCountryCursor = Country::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCountry = Country::InstantiateCursor($objCountryCursor)) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
				if (($this->objStateProvince->Country) && ($this->objStateProvince->Country->CountryId == $objCountry->CountryId))
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
			$this->lblCountryId->Text = ($this->objStateProvince->Country) ? $this->objStateProvince->Country->__toString() : null;
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
			$this->txtShortDescription->Text = $this->objStateProvince->ShortDescription;
			$this->txtShortDescription->MaxLength = StateProvince::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objStateProvince->ShortDescription;
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
			$this->txtAbbreviation->Text = $this->objStateProvince->Abbreviation;
			$this->txtAbbreviation->MaxLength = StateProvince::AbbreviationMaxLength;
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
			$this->lblAbbreviation->Text = $this->objStateProvince->Abbreviation;
			return $this->lblAbbreviation;
		}



		/**
		 * Refresh this MetaControl with Data from the local StateProvince object.
		 * @param boolean $blnReload reload StateProvince from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStateProvince->Reload();

			if ($this->lblStateProvinceId) if ($this->blnEditMode) $this->lblStateProvinceId->Text = $this->objStateProvince->StateProvinceId;

			if ($this->lstCountry) {
					$this->lstCountry->RemoveAllItems();
				$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);
				$objCountryArray = Country::LoadAll();
				if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
					$objListItem = new QListItem($objCountry->__toString(), $objCountry->CountryId);
					if (($this->objStateProvince->Country) && ($this->objStateProvince->Country->CountryId == $objCountry->CountryId))
						$objListItem->Selected = true;
					$this->lstCountry->AddItem($objListItem);
				}
			}
			if ($this->lblCountryId) $this->lblCountryId->Text = ($this->objStateProvince->Country) ? $this->objStateProvince->Country->__toString() : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objStateProvince->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objStateProvince->ShortDescription;

			if ($this->txtAbbreviation) $this->txtAbbreviation->Text = $this->objStateProvince->Abbreviation;
			if ($this->lblAbbreviation) $this->lblAbbreviation->Text = $this->objStateProvince->Abbreviation;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STATEPROVINCE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StateProvince instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStateProvince() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCountry) $this->objStateProvince->CountryId = $this->lstCountry->SelectedValue;
				if ($this->txtShortDescription) $this->objStateProvince->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtAbbreviation) $this->objStateProvince->Abbreviation = $this->txtAbbreviation->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StateProvince object
				$this->objStateProvince->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StateProvince instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStateProvince() {
			$this->objStateProvince->Delete();
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
				case 'StateProvince': return $this->objStateProvince;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StateProvince fields -- will be created dynamically if not yet created
				case 'StateProvinceIdControl':
					if (!$this->lblStateProvinceId) return $this->lblStateProvinceId_Create();
					return $this->lblStateProvinceId;
				case 'StateProvinceIdLabel':
					if (!$this->lblStateProvinceId) return $this->lblStateProvinceId_Create();
					return $this->lblStateProvinceId;
				case 'CountryIdControl':
					if (!$this->lstCountry) return $this->lstCountry_Create();
					return $this->lstCountry;
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
					// Controls that point to StateProvince fields
					case 'StateProvinceIdControl':
						return ($this->lblStateProvinceId = QType::Cast($mixValue, 'QControl'));
					case 'CountryIdControl':
						return ($this->lstCountry = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'AbbreviationControl':
						return ($this->txtAbbreviation = QType::Cast($mixValue, 'QControl'));
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