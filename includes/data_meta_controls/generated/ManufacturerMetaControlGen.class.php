<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Manufacturer class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Manufacturer object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ManufacturerMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Manufacturer $Manufacturer the actual Manufacturer data class being edited
	 * property QLabel $ManufacturerIdControl
	 * property-read QLabel $ManufacturerIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QTextBox $ImagePathControl
	 * property-read QLabel $ImagePathLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $ManufacturerCustomFieldHelperControl
	 * property-read QLabel $ManufacturerCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ManufacturerMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Manufacturer objManufacturer
		 * @access protected
		 */
		protected $objManufacturer;

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

		// Controls that allow the editing of Manufacturer's individual data fields
        /**
         * @var QLabel lblManufacturerId;
         * @access protected
         */
		protected $lblManufacturerId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtLongDescription;
         * @access protected
         */
		protected $txtLongDescription;

        /**
         * @var QTextBox txtImagePath;
         * @access protected
         */
		protected $txtImagePath;

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


		// Controls that allow the viewing of Manufacturer's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblLongDescription
         * @access protected
         */
		protected $lblLongDescription;

        /**
         * @var QLabel lblImagePath
         * @access protected
         */
		protected $lblImagePath;

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
         * @var QListBox lstManufacturerCustomFieldHelper
         * @access protected
         */
		protected $lstManufacturerCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblManufacturerCustomFieldHelper
         * @access protected
         */
		protected $lblManufacturerCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ManufacturerMetaControl to edit a single Manufacturer object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Manufacturer object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerMetaControl
		 * @param Manufacturer $objManufacturer new or existing Manufacturer object
		 */
		 public function __construct($objParentObject, Manufacturer $objManufacturer) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ManufacturerMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Manufacturer object
			$this->objManufacturer = $objManufacturer;

			// Figure out if we're Editing or Creating New
			if ($this->objManufacturer->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerMetaControl
		 * @param integer $intManufacturerId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Manufacturer object creation - defaults to CreateOrEdit
 		 * @return ManufacturerMetaControl
		 */
		public static function Create($objParentObject, $intManufacturerId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intManufacturerId)) {
				$objManufacturer = Manufacturer::Load($intManufacturerId);

				// Manufacturer was found -- return it!
				if ($objManufacturer)
					return new ManufacturerMetaControl($objParentObject, $objManufacturer);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Manufacturer object with PK arguments: ' . $intManufacturerId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ManufacturerMetaControl($objParentObject, new Manufacturer());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Manufacturer object creation - defaults to CreateOrEdit
		 * @return ManufacturerMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intManufacturerId = QApplication::PathInfo(0);
			return ManufacturerMetaControl::Create($objParentObject, $intManufacturerId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Manufacturer object creation - defaults to CreateOrEdit
		 * @return ManufacturerMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intManufacturerId = QApplication::QueryString('intManufacturerId');
			return ManufacturerMetaControl::Create($objParentObject, $intManufacturerId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblManufacturerId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblManufacturerId_Create($strControlId = null) {
			$this->lblManufacturerId = new QLabel($this->objParentObject, $strControlId);
			$this->lblManufacturerId->Name = QApplication::Translate('Manufacturer Id');
			if ($this->blnEditMode)
				$this->lblManufacturerId->Text = $this->objManufacturer->ManufacturerId;
			else
				$this->lblManufacturerId->Text = 'N/A';
			return $this->lblManufacturerId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objManufacturer->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Manufacturer::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objManufacturer->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLongDescription_Create($strControlId = null) {
			$this->txtLongDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objManufacturer->LongDescription;
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
			$this->lblLongDescription->Text = $this->objManufacturer->LongDescription;
			return $this->lblLongDescription;
		}

		/**
		 * Create and setup QTextBox txtImagePath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtImagePath_Create($strControlId = null) {
			$this->txtImagePath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objManufacturer->ImagePath;
			$this->txtImagePath->MaxLength = Manufacturer::ImagePathMaxLength;
			return $this->txtImagePath;
		}

		/**
		 * Create and setup QLabel lblImagePath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblImagePath_Create($strControlId = null) {
			$this->lblImagePath = new QLabel($this->objParentObject, $strControlId);
			$this->lblImagePath->Name = QApplication::Translate('Image Path');
			$this->lblImagePath->Text = $this->objManufacturer->ImagePath;
			return $this->lblImagePath;
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
				if (($this->objManufacturer->CreatedByObject) && ($this->objManufacturer->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objManufacturer->CreatedByObject) ? $this->objManufacturer->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objManufacturer->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objManufacturer->CreationDate) ? $this->objManufacturer->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objManufacturer->ModifiedByObject) && ($this->objManufacturer->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objManufacturer->ModifiedByObject) ? $this->objManufacturer->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objManufacturer->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstManufacturerCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstManufacturerCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstManufacturerCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstManufacturerCustomFieldHelper->Name = QApplication::Translate('Manufacturer Custom Field Helper');
			$this->lstManufacturerCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objManufacturerCustomFieldHelperCursor = ManufacturerCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objManufacturerCustomFieldHelper = ManufacturerCustomFieldHelper::InstantiateCursor($objManufacturerCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objManufacturerCustomFieldHelper->__toString(), $objManufacturerCustomFieldHelper->ManufacturerId);
				if ($objManufacturerCustomFieldHelper->ManufacturerId == $this->objManufacturer->ManufacturerId)
					$objListItem->Selected = true;
				$this->lstManufacturerCustomFieldHelper->AddItem($objListItem);
			}

			// Because ManufacturerCustomFieldHelper's ManufacturerCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstManufacturerCustomFieldHelper->SelectedValue)
				$this->lstManufacturerCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstManufacturerCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblManufacturerCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblManufacturerCustomFieldHelper_Create($strControlId = null) {
			$this->lblManufacturerCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblManufacturerCustomFieldHelper->Name = QApplication::Translate('Manufacturer Custom Field Helper');
			$this->lblManufacturerCustomFieldHelper->Text = ($this->objManufacturer->ManufacturerCustomFieldHelper) ? $this->objManufacturer->ManufacturerCustomFieldHelper->__toString() : null;
			return $this->lblManufacturerCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Manufacturer object.
		 * @param boolean $blnReload reload Manufacturer from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objManufacturer->Reload();

			if ($this->lblManufacturerId) if ($this->blnEditMode) $this->lblManufacturerId->Text = $this->objManufacturer->ManufacturerId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objManufacturer->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objManufacturer->ShortDescription;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objManufacturer->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objManufacturer->LongDescription;

			if ($this->txtImagePath) $this->txtImagePath->Text = $this->objManufacturer->ImagePath;
			if ($this->lblImagePath) $this->lblImagePath->Text = $this->objManufacturer->ImagePath;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objManufacturer->CreatedByObject) && ($this->objManufacturer->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objManufacturer->CreatedByObject) ? $this->objManufacturer->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objManufacturer->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objManufacturer->CreationDate) ? $this->objManufacturer->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objManufacturer->ModifiedByObject) && ($this->objManufacturer->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objManufacturer->ModifiedByObject) ? $this->objManufacturer->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objManufacturer->ModifiedDate;

			if ($this->lstManufacturerCustomFieldHelper) {
				$this->lstManufacturerCustomFieldHelper->RemoveAllItems();
				$this->lstManufacturerCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objManufacturerCustomFieldHelperArray = ManufacturerCustomFieldHelper::LoadAll();
				if ($objManufacturerCustomFieldHelperArray) foreach ($objManufacturerCustomFieldHelperArray as $objManufacturerCustomFieldHelper) {
					$objListItem = new QListItem($objManufacturerCustomFieldHelper->__toString(), $objManufacturerCustomFieldHelper->ManufacturerId);
					if ($objManufacturerCustomFieldHelper->ManufacturerId == $this->objManufacturer->ManufacturerId)
						$objListItem->Selected = true;
					$this->lstManufacturerCustomFieldHelper->AddItem($objListItem);
				}
				// Because ManufacturerCustomFieldHelper's ManufacturerCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstManufacturerCustomFieldHelper->SelectedValue)
					$this->lstManufacturerCustomFieldHelper->Enabled = false;
				else
					$this->lstManufacturerCustomFieldHelper->Enabled = true;
			}
			if ($this->lblManufacturerCustomFieldHelper) $this->lblManufacturerCustomFieldHelper->Text = ($this->objManufacturer->ManufacturerCustomFieldHelper) ? $this->objManufacturer->ManufacturerCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MANUFACTURER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Manufacturer instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveManufacturer() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objManufacturer->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLongDescription) $this->objManufacturer->LongDescription = $this->txtLongDescription->Text;
				if ($this->txtImagePath) $this->objManufacturer->ImagePath = $this->txtImagePath->Text;
				if ($this->lstCreatedByObject) $this->objManufacturer->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objManufacturer->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objManufacturer->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstManufacturerCustomFieldHelper) $this->objManufacturer->ManufacturerCustomFieldHelper = ManufacturerCustomFieldHelper::Load($this->lstManufacturerCustomFieldHelper->SelectedValue);

				// Save the Manufacturer object
				$this->objManufacturer->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Manufacturer instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteManufacturer() {
			$this->objManufacturer->Delete();
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
				case 'Manufacturer': return $this->objManufacturer;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Manufacturer fields -- will be created dynamically if not yet created
				case 'ManufacturerIdControl':
					if (!$this->lblManufacturerId) return $this->lblManufacturerId_Create();
					return $this->lblManufacturerId;
				case 'ManufacturerIdLabel':
					if (!$this->lblManufacturerId) return $this->lblManufacturerId_Create();
					return $this->lblManufacturerId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'LongDescriptionControl':
					if (!$this->txtLongDescription) return $this->txtLongDescription_Create();
					return $this->txtLongDescription;
				case 'LongDescriptionLabel':
					if (!$this->lblLongDescription) return $this->lblLongDescription_Create();
					return $this->lblLongDescription;
				case 'ImagePathControl':
					if (!$this->txtImagePath) return $this->txtImagePath_Create();
					return $this->txtImagePath;
				case 'ImagePathLabel':
					if (!$this->lblImagePath) return $this->lblImagePath_Create();
					return $this->lblImagePath;
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
				case 'ManufacturerCustomFieldHelperControl':
					if (!$this->lstManufacturerCustomFieldHelper) return $this->lstManufacturerCustomFieldHelper_Create();
					return $this->lstManufacturerCustomFieldHelper;
				case 'ManufacturerCustomFieldHelperLabel':
					if (!$this->lblManufacturerCustomFieldHelper) return $this->lblManufacturerCustomFieldHelper_Create();
					return $this->lblManufacturerCustomFieldHelper;
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
					// Controls that point to Manufacturer fields
					case 'ManufacturerIdControl':
						return ($this->lblManufacturerId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'ImagePathControl':
						return ($this->txtImagePath = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'ManufacturerCustomFieldHelperControl':
						return ($this->lstManufacturerCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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