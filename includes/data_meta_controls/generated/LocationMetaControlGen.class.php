<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Location class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Location object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LocationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Location $Location the actual Location data class being edited
	 * property QLabel $LocationIdControl
	 * property-read QLabel $LocationIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QCheckBox $EnabledFlagControl
	 * property-read QLabel $EnabledFlagLabel
	 * property QCheckBox $AssetFlagControl
	 * property-read QLabel $AssetFlagLabel
	 * property QCheckBox $InventoryFlagControl
	 * property-read QLabel $InventoryFlagLabel
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

	class LocationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Location objLocation
		 * @access protected
		 */
		protected $objLocation;

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

		// Controls that allow the editing of Location's individual data fields
        /**
         * @var QLabel lblLocationId;
         * @access protected
         */
		protected $lblLocationId;

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
         * @var QCheckBox chkEnabledFlag;
         * @access protected
         */
		protected $chkEnabledFlag;

        /**
         * @var QCheckBox chkAssetFlag;
         * @access protected
         */
		protected $chkAssetFlag;

        /**
         * @var QCheckBox chkInventoryFlag;
         * @access protected
         */
		protected $chkInventoryFlag;

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


		// Controls that allow the viewing of Location's individual data fields
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
         * @var QLabel lblEnabledFlag
         * @access protected
         */
		protected $lblEnabledFlag;

        /**
         * @var QLabel lblAssetFlag
         * @access protected
         */
		protected $lblAssetFlag;

        /**
         * @var QLabel lblInventoryFlag
         * @access protected
         */
		protected $lblInventoryFlag;

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
		 * LocationMetaControl to edit a single Location object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Location object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param Location $objLocation new or existing Location object
		 */
		 public function __construct($objParentObject, Location $objLocation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LocationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Location object
			$this->objLocation = $objLocation;

			// Figure out if we're Editing or Creating New
			if ($this->objLocation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param integer $intLocationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Location object creation - defaults to CreateOrEdit
 		 * @return LocationMetaControl
		 */
		public static function Create($objParentObject, $intLocationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intLocationId)) {
				$objLocation = Location::Load($intLocationId);

				// Location was found -- return it!
				if ($objLocation)
					return new LocationMetaControl($objParentObject, $objLocation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Location object with PK arguments: ' . $intLocationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LocationMetaControl($objParentObject, new Location());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Location object creation - defaults to CreateOrEdit
		 * @return LocationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intLocationId = QApplication::PathInfo(0);
			return LocationMetaControl::Create($objParentObject, $intLocationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Location object creation - defaults to CreateOrEdit
		 * @return LocationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intLocationId = QApplication::QueryString('intLocationId');
			return LocationMetaControl::Create($objParentObject, $intLocationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocationId_Create($strControlId = null) {
			$this->lblLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocationId->Name = QApplication::Translate('Location Id');
			if ($this->blnEditMode)
				$this->lblLocationId->Text = $this->objLocation->LocationId;
			else
				$this->lblLocationId->Text = 'N/A';
			return $this->lblLocationId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objLocation->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Location::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objLocation->ShortDescription;
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
			$this->txtLongDescription->Text = $this->objLocation->LongDescription;
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
			$this->lblLongDescription->Text = $this->objLocation->LongDescription;
			return $this->lblLongDescription;
		}

		/**
		 * Create and setup QCheckBox chkEnabledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkEnabledFlag_Create($strControlId = null) {
			$this->chkEnabledFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkEnabledFlag->Name = QApplication::Translate('Enabled Flag');
			$this->chkEnabledFlag->Checked = $this->objLocation->EnabledFlag;
			return $this->chkEnabledFlag;
		}

		/**
		 * Create and setup QLabel lblEnabledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEnabledFlag_Create($strControlId = null) {
			$this->lblEnabledFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblEnabledFlag->Name = QApplication::Translate('Enabled Flag');
			$this->lblEnabledFlag->Text = ($this->objLocation->EnabledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblEnabledFlag;
		}

		/**
		 * Create and setup QCheckBox chkAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAssetFlag_Create($strControlId = null) {
			$this->chkAssetFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->chkAssetFlag->Checked = $this->objLocation->AssetFlag;
			return $this->chkAssetFlag;
		}

		/**
		 * Create and setup QLabel lblAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetFlag_Create($strControlId = null) {
			$this->lblAssetFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->lblAssetFlag->Text = ($this->objLocation->AssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAssetFlag;
		}

		/**
		 * Create and setup QCheckBox chkInventoryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInventoryFlag_Create($strControlId = null) {
			$this->chkInventoryFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->chkInventoryFlag->Checked = $this->objLocation->InventoryFlag;
			return $this->chkInventoryFlag;
		}

		/**
		 * Create and setup QLabel lblInventoryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryFlag_Create($strControlId = null) {
			$this->lblInventoryFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->lblInventoryFlag->Text = ($this->objLocation->InventoryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInventoryFlag;
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
				if (($this->objLocation->CreatedByObject) && ($this->objLocation->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objLocation->CreatedByObject) ? $this->objLocation->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objLocation->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objLocation->CreationDate) ? $this->objLocation->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objLocation->ModifiedByObject) && ($this->objLocation->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objLocation->ModifiedByObject) ? $this->objLocation->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objLocation->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local Location object.
		 * @param boolean $blnReload reload Location from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLocation->Reload();

			if ($this->lblLocationId) if ($this->blnEditMode) $this->lblLocationId->Text = $this->objLocation->LocationId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objLocation->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objLocation->ShortDescription;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objLocation->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objLocation->LongDescription;

			if ($this->chkEnabledFlag) $this->chkEnabledFlag->Checked = $this->objLocation->EnabledFlag;
			if ($this->lblEnabledFlag) $this->lblEnabledFlag->Text = ($this->objLocation->EnabledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkAssetFlag) $this->chkAssetFlag->Checked = $this->objLocation->AssetFlag;
			if ($this->lblAssetFlag) $this->lblAssetFlag->Text = ($this->objLocation->AssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkInventoryFlag) $this->chkInventoryFlag->Checked = $this->objLocation->InventoryFlag;
			if ($this->lblInventoryFlag) $this->lblInventoryFlag->Text = ($this->objLocation->InventoryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objLocation->CreatedByObject) && ($this->objLocation->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objLocation->CreatedByObject) ? $this->objLocation->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objLocation->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objLocation->CreationDate) ? $this->objLocation->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objLocation->ModifiedByObject) && ($this->objLocation->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objLocation->ModifiedByObject) ? $this->objLocation->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objLocation->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LOCATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Location instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLocation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objLocation->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLongDescription) $this->objLocation->LongDescription = $this->txtLongDescription->Text;
				if ($this->chkEnabledFlag) $this->objLocation->EnabledFlag = $this->chkEnabledFlag->Checked;
				if ($this->chkAssetFlag) $this->objLocation->AssetFlag = $this->chkAssetFlag->Checked;
				if ($this->chkInventoryFlag) $this->objLocation->InventoryFlag = $this->chkInventoryFlag->Checked;
				if ($this->lstCreatedByObject) $this->objLocation->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objLocation->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objLocation->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Location object
				$this->objLocation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Location instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLocation() {
			$this->objLocation->Delete();
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
				case 'Location': return $this->objLocation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Location fields -- will be created dynamically if not yet created
				case 'LocationIdControl':
					if (!$this->lblLocationId) return $this->lblLocationId_Create();
					return $this->lblLocationId;
				case 'LocationIdLabel':
					if (!$this->lblLocationId) return $this->lblLocationId_Create();
					return $this->lblLocationId;
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
				case 'EnabledFlagControl':
					if (!$this->chkEnabledFlag) return $this->chkEnabledFlag_Create();
					return $this->chkEnabledFlag;
				case 'EnabledFlagLabel':
					if (!$this->lblEnabledFlag) return $this->lblEnabledFlag_Create();
					return $this->lblEnabledFlag;
				case 'AssetFlagControl':
					if (!$this->chkAssetFlag) return $this->chkAssetFlag_Create();
					return $this->chkAssetFlag;
				case 'AssetFlagLabel':
					if (!$this->lblAssetFlag) return $this->lblAssetFlag_Create();
					return $this->lblAssetFlag;
				case 'InventoryFlagControl':
					if (!$this->chkInventoryFlag) return $this->chkInventoryFlag_Create();
					return $this->chkInventoryFlag;
				case 'InventoryFlagLabel':
					if (!$this->lblInventoryFlag) return $this->lblInventoryFlag_Create();
					return $this->lblInventoryFlag;
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
					// Controls that point to Location fields
					case 'LocationIdControl':
						return ($this->lblLocationId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'EnabledFlagControl':
						return ($this->chkEnabledFlag = QType::Cast($mixValue, 'QControl'));
					case 'AssetFlagControl':
						return ($this->chkAssetFlag = QType::Cast($mixValue, 'QControl'));
					case 'InventoryFlagControl':
						return ($this->chkInventoryFlag = QType::Cast($mixValue, 'QControl'));
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