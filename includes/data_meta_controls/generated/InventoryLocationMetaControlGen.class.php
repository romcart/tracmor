<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the InventoryLocation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single InventoryLocation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a InventoryLocationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read InventoryLocation $InventoryLocation the actual InventoryLocation data class being edited
	 * property QLabel $InventoryLocationIdControl
	 * property-read QLabel $InventoryLocationIdLabel
	 * property QListBox $InventoryModelIdControl
	 * property-read QLabel $InventoryModelIdLabel
	 * property QListBox $LocationIdControl
	 * property-read QLabel $LocationIdLabel
	 * property QIntegerTextBox $QuantityControl
	 * property-read QLabel $QuantityLabel
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

	class InventoryLocationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var InventoryLocation objInventoryLocation
		 * @access protected
		 */
		protected $objInventoryLocation;

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

		// Controls that allow the editing of InventoryLocation's individual data fields
        /**
         * @var QLabel lblInventoryLocationId;
         * @access protected
         */
		protected $lblInventoryLocationId;

        /**
         * @var QListBox lstInventoryModel;
         * @access protected
         */
		protected $lstInventoryModel;

        /**
         * @var QListBox lstLocation;
         * @access protected
         */
		protected $lstLocation;

        /**
         * @var QIntegerTextBox txtQuantity;
         * @access protected
         */
		protected $txtQuantity;

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


		// Controls that allow the viewing of InventoryLocation's individual data fields
        /**
         * @var QLabel lblInventoryModelId
         * @access protected
         */
		protected $lblInventoryModelId;

        /**
         * @var QLabel lblLocationId
         * @access protected
         */
		protected $lblLocationId;

        /**
         * @var QLabel lblQuantity
         * @access protected
         */
		protected $lblQuantity;

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
		 * InventoryLocationMetaControl to edit a single InventoryLocation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single InventoryLocation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryLocationMetaControl
		 * @param InventoryLocation $objInventoryLocation new or existing InventoryLocation object
		 */
		 public function __construct($objParentObject, InventoryLocation $objInventoryLocation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this InventoryLocationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked InventoryLocation object
			$this->objInventoryLocation = $objInventoryLocation;

			// Figure out if we're Editing or Creating New
			if ($this->objInventoryLocation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryLocationMetaControl
		 * @param integer $intInventoryLocationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryLocation object creation - defaults to CreateOrEdit
 		 * @return InventoryLocationMetaControl
		 */
		public static function Create($objParentObject, $intInventoryLocationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intInventoryLocationId)) {
				$objInventoryLocation = InventoryLocation::Load($intInventoryLocationId);

				// InventoryLocation was found -- return it!
				if ($objInventoryLocation)
					return new InventoryLocationMetaControl($objParentObject, $objInventoryLocation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a InventoryLocation object with PK arguments: ' . $intInventoryLocationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new InventoryLocationMetaControl($objParentObject, new InventoryLocation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryLocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryLocation object creation - defaults to CreateOrEdit
		 * @return InventoryLocationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryLocationId = QApplication::PathInfo(0);
			return InventoryLocationMetaControl::Create($objParentObject, $intInventoryLocationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryLocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryLocation object creation - defaults to CreateOrEdit
		 * @return InventoryLocationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryLocationId = QApplication::QueryString('intInventoryLocationId');
			return InventoryLocationMetaControl::Create($objParentObject, $intInventoryLocationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblInventoryLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryLocationId_Create($strControlId = null) {
			$this->lblInventoryLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryLocationId->Name = QApplication::Translate('Inventory Location Id');
			if ($this->blnEditMode)
				$this->lblInventoryLocationId->Text = $this->objInventoryLocation->InventoryLocationId;
			else
				$this->lblInventoryLocationId->Text = 'N/A';
			return $this->lblInventoryLocationId;
		}

		/**
		 * Create and setup QListBox lstInventoryModel
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstInventoryModel_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstInventoryModel = new QListBox($this->objParentObject, $strControlId);
			$this->lstInventoryModel->Name = QApplication::Translate('Inventory Model');
			$this->lstInventoryModel->Required = true;
			if (!$this->blnEditMode)
				$this->lstInventoryModel->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objInventoryModelCursor = InventoryModel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objInventoryModel = InventoryModel::InstantiateCursor($objInventoryModelCursor)) {
				$objListItem = new QListItem($objInventoryModel->__toString(), $objInventoryModel->InventoryModelId);
				if (($this->objInventoryLocation->InventoryModel) && ($this->objInventoryLocation->InventoryModel->InventoryModelId == $objInventoryModel->InventoryModelId))
					$objListItem->Selected = true;
				$this->lstInventoryModel->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstInventoryModel;
		}

		/**
		 * Create and setup QLabel lblInventoryModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryModelId_Create($strControlId = null) {
			$this->lblInventoryModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryModelId->Name = QApplication::Translate('Inventory Model');
			$this->lblInventoryModelId->Text = ($this->objInventoryLocation->InventoryModel) ? $this->objInventoryLocation->InventoryModel->__toString() : null;
			$this->lblInventoryModelId->Required = true;
			return $this->lblInventoryModelId;
		}

		/**
		 * Create and setup QListBox lstLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstLocation->Name = QApplication::Translate('Location');
			$this->lstLocation->Required = true;
			if (!$this->blnEditMode)
				$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLocationCursor = Location::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLocation = Location::InstantiateCursor($objLocationCursor)) {
				$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
				if (($this->objInventoryLocation->Location) && ($this->objInventoryLocation->Location->LocationId == $objLocation->LocationId))
					$objListItem->Selected = true;
				$this->lstLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLocation;
		}

		/**
		 * Create and setup QLabel lblLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocationId_Create($strControlId = null) {
			$this->lblLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocationId->Name = QApplication::Translate('Location');
			$this->lblLocationId->Text = ($this->objInventoryLocation->Location) ? $this->objInventoryLocation->Location->__toString() : null;
			$this->lblLocationId->Required = true;
			return $this->lblLocationId;
		}

		/**
		 * Create and setup QIntegerTextBox txtQuantity
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuantity_Create($strControlId = null) {
			$this->txtQuantity = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuantity->Name = QApplication::Translate('Quantity');
			$this->txtQuantity->Text = $this->objInventoryLocation->Quantity;
			$this->txtQuantity->Required = true;
			return $this->txtQuantity;
		}

		/**
		 * Create and setup QLabel lblQuantity
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQuantity_Create($strControlId = null, $strFormat = null) {
			$this->lblQuantity = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuantity->Name = QApplication::Translate('Quantity');
			$this->lblQuantity->Text = $this->objInventoryLocation->Quantity;
			$this->lblQuantity->Required = true;
			$this->lblQuantity->Format = $strFormat;
			return $this->lblQuantity;
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
				if (($this->objInventoryLocation->CreatedByObject) && ($this->objInventoryLocation->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objInventoryLocation->CreatedByObject) ? $this->objInventoryLocation->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objInventoryLocation->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objInventoryLocation->CreationDate) ? $this->objInventoryLocation->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objInventoryLocation->ModifiedByObject) && ($this->objInventoryLocation->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objInventoryLocation->ModifiedByObject) ? $this->objInventoryLocation->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objInventoryLocation->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local InventoryLocation object.
		 * @param boolean $blnReload reload InventoryLocation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objInventoryLocation->Reload();

			if ($this->lblInventoryLocationId) if ($this->blnEditMode) $this->lblInventoryLocationId->Text = $this->objInventoryLocation->InventoryLocationId;

			if ($this->lstInventoryModel) {
					$this->lstInventoryModel->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstInventoryModel->AddItem(QApplication::Translate('- Select One -'), null);
				$objInventoryModelArray = InventoryModel::LoadAll();
				if ($objInventoryModelArray) foreach ($objInventoryModelArray as $objInventoryModel) {
					$objListItem = new QListItem($objInventoryModel->__toString(), $objInventoryModel->InventoryModelId);
					if (($this->objInventoryLocation->InventoryModel) && ($this->objInventoryLocation->InventoryModel->InventoryModelId == $objInventoryModel->InventoryModelId))
						$objListItem->Selected = true;
					$this->lstInventoryModel->AddItem($objListItem);
				}
			}
			if ($this->lblInventoryModelId) $this->lblInventoryModelId->Text = ($this->objInventoryLocation->InventoryModel) ? $this->objInventoryLocation->InventoryModel->__toString() : null;

			if ($this->lstLocation) {
					$this->lstLocation->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objLocationArray = Location::LoadAll();
				if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
					$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
					if (($this->objInventoryLocation->Location) && ($this->objInventoryLocation->Location->LocationId == $objLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstLocation->AddItem($objListItem);
				}
			}
			if ($this->lblLocationId) $this->lblLocationId->Text = ($this->objInventoryLocation->Location) ? $this->objInventoryLocation->Location->__toString() : null;

			if ($this->txtQuantity) $this->txtQuantity->Text = $this->objInventoryLocation->Quantity;
			if ($this->lblQuantity) $this->lblQuantity->Text = $this->objInventoryLocation->Quantity;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objInventoryLocation->CreatedByObject) && ($this->objInventoryLocation->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objInventoryLocation->CreatedByObject) ? $this->objInventoryLocation->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objInventoryLocation->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objInventoryLocation->CreationDate) ? $this->objInventoryLocation->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objInventoryLocation->ModifiedByObject) && ($this->objInventoryLocation->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objInventoryLocation->ModifiedByObject) ? $this->objInventoryLocation->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objInventoryLocation->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC INVENTORYLOCATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's InventoryLocation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveInventoryLocation() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstInventoryModel) $this->objInventoryLocation->InventoryModelId = $this->lstInventoryModel->SelectedValue;
				if ($this->lstLocation) $this->objInventoryLocation->LocationId = $this->lstLocation->SelectedValue;
				if ($this->txtQuantity) $this->objInventoryLocation->Quantity = $this->txtQuantity->Text;
				if ($this->lstCreatedByObject) $this->objInventoryLocation->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objInventoryLocation->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objInventoryLocation->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the InventoryLocation object
				$this->objInventoryLocation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's InventoryLocation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteInventoryLocation() {
			$this->objInventoryLocation->Delete();
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
				case 'InventoryLocation': return $this->objInventoryLocation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to InventoryLocation fields -- will be created dynamically if not yet created
				case 'InventoryLocationIdControl':
					if (!$this->lblInventoryLocationId) return $this->lblInventoryLocationId_Create();
					return $this->lblInventoryLocationId;
				case 'InventoryLocationIdLabel':
					if (!$this->lblInventoryLocationId) return $this->lblInventoryLocationId_Create();
					return $this->lblInventoryLocationId;
				case 'InventoryModelIdControl':
					if (!$this->lstInventoryModel) return $this->lstInventoryModel_Create();
					return $this->lstInventoryModel;
				case 'InventoryModelIdLabel':
					if (!$this->lblInventoryModelId) return $this->lblInventoryModelId_Create();
					return $this->lblInventoryModelId;
				case 'LocationIdControl':
					if (!$this->lstLocation) return $this->lstLocation_Create();
					return $this->lstLocation;
				case 'LocationIdLabel':
					if (!$this->lblLocationId) return $this->lblLocationId_Create();
					return $this->lblLocationId;
				case 'QuantityControl':
					if (!$this->txtQuantity) return $this->txtQuantity_Create();
					return $this->txtQuantity;
				case 'QuantityLabel':
					if (!$this->lblQuantity) return $this->lblQuantity_Create();
					return $this->lblQuantity;
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
					// Controls that point to InventoryLocation fields
					case 'InventoryLocationIdControl':
						return ($this->lblInventoryLocationId = QType::Cast($mixValue, 'QControl'));
					case 'InventoryModelIdControl':
						return ($this->lstInventoryModel = QType::Cast($mixValue, 'QControl'));
					case 'LocationIdControl':
						return ($this->lstLocation = QType::Cast($mixValue, 'QControl'));
					case 'QuantityControl':
						return ($this->txtQuantity = QType::Cast($mixValue, 'QControl'));
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