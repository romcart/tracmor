<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the InventoryTransaction class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single InventoryTransaction object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a InventoryTransactionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read InventoryTransaction $InventoryTransaction the actual InventoryTransaction data class being edited
	 * property QLabel $InventoryTransactionIdControl
	 * property-read QLabel $InventoryTransactionIdLabel
	 * property QListBox $InventoryLocationIdControl
	 * property-read QLabel $InventoryLocationIdLabel
	 * property QListBox $TransactionIdControl
	 * property-read QLabel $TransactionIdLabel
	 * property QIntegerTextBox $QuantityControl
	 * property-read QLabel $QuantityLabel
	 * property QListBox $SourceLocationIdControl
	 * property-read QLabel $SourceLocationIdLabel
	 * property QListBox $DestinationLocationIdControl
	 * property-read QLabel $DestinationLocationIdLabel
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

	class InventoryTransactionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var InventoryTransaction objInventoryTransaction
		 * @access protected
		 */
		protected $objInventoryTransaction;

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

		// Controls that allow the editing of InventoryTransaction's individual data fields
        /**
         * @var QLabel lblInventoryTransactionId;
         * @access protected
         */
		protected $lblInventoryTransactionId;

        /**
         * @var QListBox lstInventoryLocation;
         * @access protected
         */
		protected $lstInventoryLocation;

        /**
         * @var QListBox lstTransaction;
         * @access protected
         */
		protected $lstTransaction;

        /**
         * @var QIntegerTextBox txtQuantity;
         * @access protected
         */
		protected $txtQuantity;

        /**
         * @var QListBox lstSourceLocation;
         * @access protected
         */
		protected $lstSourceLocation;

        /**
         * @var QListBox lstDestinationLocation;
         * @access protected
         */
		protected $lstDestinationLocation;

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


		// Controls that allow the viewing of InventoryTransaction's individual data fields
        /**
         * @var QLabel lblInventoryLocationId
         * @access protected
         */
		protected $lblInventoryLocationId;

        /**
         * @var QLabel lblTransactionId
         * @access protected
         */
		protected $lblTransactionId;

        /**
         * @var QLabel lblQuantity
         * @access protected
         */
		protected $lblQuantity;

        /**
         * @var QLabel lblSourceLocationId
         * @access protected
         */
		protected $lblSourceLocationId;

        /**
         * @var QLabel lblDestinationLocationId
         * @access protected
         */
		protected $lblDestinationLocationId;

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
		 * InventoryTransactionMetaControl to edit a single InventoryTransaction object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single InventoryTransaction object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryTransactionMetaControl
		 * @param InventoryTransaction $objInventoryTransaction new or existing InventoryTransaction object
		 */
		 public function __construct($objParentObject, InventoryTransaction $objInventoryTransaction) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this InventoryTransactionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked InventoryTransaction object
			$this->objInventoryTransaction = $objInventoryTransaction;

			// Figure out if we're Editing or Creating New
			if ($this->objInventoryTransaction->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryTransactionMetaControl
		 * @param integer $intInventoryTransactionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryTransaction object creation - defaults to CreateOrEdit
 		 * @return InventoryTransactionMetaControl
		 */
		public static function Create($objParentObject, $intInventoryTransactionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intInventoryTransactionId)) {
				$objInventoryTransaction = InventoryTransaction::Load($intInventoryTransactionId);

				// InventoryTransaction was found -- return it!
				if ($objInventoryTransaction)
					return new InventoryTransactionMetaControl($objParentObject, $objInventoryTransaction);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a InventoryTransaction object with PK arguments: ' . $intInventoryTransactionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new InventoryTransactionMetaControl($objParentObject, new InventoryTransaction());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryTransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryTransaction object creation - defaults to CreateOrEdit
		 * @return InventoryTransactionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryTransactionId = QApplication::PathInfo(0);
			return InventoryTransactionMetaControl::Create($objParentObject, $intInventoryTransactionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryTransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryTransaction object creation - defaults to CreateOrEdit
		 * @return InventoryTransactionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryTransactionId = QApplication::QueryString('intInventoryTransactionId');
			return InventoryTransactionMetaControl::Create($objParentObject, $intInventoryTransactionId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblInventoryTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryTransactionId_Create($strControlId = null) {
			$this->lblInventoryTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryTransactionId->Name = QApplication::Translate('Inventory Transaction Id');
			if ($this->blnEditMode)
				$this->lblInventoryTransactionId->Text = $this->objInventoryTransaction->InventoryTransactionId;
			else
				$this->lblInventoryTransactionId->Text = 'N/A';
			return $this->lblInventoryTransactionId;
		}

		/**
		 * Create and setup QListBox lstInventoryLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstInventoryLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstInventoryLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstInventoryLocation->Name = QApplication::Translate('Inventory Location');
			$this->lstInventoryLocation->Required = true;
			if (!$this->blnEditMode)
				$this->lstInventoryLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objInventoryLocationCursor = InventoryLocation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objInventoryLocation = InventoryLocation::InstantiateCursor($objInventoryLocationCursor)) {
				$objListItem = new QListItem($objInventoryLocation->__toString(), $objInventoryLocation->InventoryLocationId);
				if (($this->objInventoryTransaction->InventoryLocation) && ($this->objInventoryTransaction->InventoryLocation->InventoryLocationId == $objInventoryLocation->InventoryLocationId))
					$objListItem->Selected = true;
				$this->lstInventoryLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstInventoryLocation;
		}

		/**
		 * Create and setup QLabel lblInventoryLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryLocationId_Create($strControlId = null) {
			$this->lblInventoryLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryLocationId->Name = QApplication::Translate('Inventory Location');
			$this->lblInventoryLocationId->Text = ($this->objInventoryTransaction->InventoryLocation) ? $this->objInventoryTransaction->InventoryLocation->__toString() : null;
			$this->lblInventoryLocationId->Required = true;
			return $this->lblInventoryLocationId;
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
				if (($this->objInventoryTransaction->Transaction) && ($this->objInventoryTransaction->Transaction->TransactionId == $objTransaction->TransactionId))
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
			$this->lblTransactionId->Text = ($this->objInventoryTransaction->Transaction) ? $this->objInventoryTransaction->Transaction->__toString() : null;
			$this->lblTransactionId->Required = true;
			return $this->lblTransactionId;
		}

		/**
		 * Create and setup QIntegerTextBox txtQuantity
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuantity_Create($strControlId = null) {
			$this->txtQuantity = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuantity->Name = QApplication::Translate('Quantity');
			$this->txtQuantity->Text = $this->objInventoryTransaction->Quantity;
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
			$this->lblQuantity->Text = $this->objInventoryTransaction->Quantity;
			$this->lblQuantity->Required = true;
			$this->lblQuantity->Format = $strFormat;
			return $this->lblQuantity;
		}

		/**
		 * Create and setup QListBox lstSourceLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSourceLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSourceLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstSourceLocation->Name = QApplication::Translate('Source Location');
			$this->lstSourceLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSourceLocationCursor = Location::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSourceLocation = Location::InstantiateCursor($objSourceLocationCursor)) {
				$objListItem = new QListItem($objSourceLocation->__toString(), $objSourceLocation->LocationId);
				if (($this->objInventoryTransaction->SourceLocation) && ($this->objInventoryTransaction->SourceLocation->LocationId == $objSourceLocation->LocationId))
					$objListItem->Selected = true;
				$this->lstSourceLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSourceLocation;
		}

		/**
		 * Create and setup QLabel lblSourceLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSourceLocationId_Create($strControlId = null) {
			$this->lblSourceLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSourceLocationId->Name = QApplication::Translate('Source Location');
			$this->lblSourceLocationId->Text = ($this->objInventoryTransaction->SourceLocation) ? $this->objInventoryTransaction->SourceLocation->__toString() : null;
			return $this->lblSourceLocationId;
		}

		/**
		 * Create and setup QListBox lstDestinationLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDestinationLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDestinationLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstDestinationLocation->Name = QApplication::Translate('Destination Location');
			$this->lstDestinationLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDestinationLocationCursor = Location::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDestinationLocation = Location::InstantiateCursor($objDestinationLocationCursor)) {
				$objListItem = new QListItem($objDestinationLocation->__toString(), $objDestinationLocation->LocationId);
				if (($this->objInventoryTransaction->DestinationLocation) && ($this->objInventoryTransaction->DestinationLocation->LocationId == $objDestinationLocation->LocationId))
					$objListItem->Selected = true;
				$this->lstDestinationLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDestinationLocation;
		}

		/**
		 * Create and setup QLabel lblDestinationLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDestinationLocationId_Create($strControlId = null) {
			$this->lblDestinationLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDestinationLocationId->Name = QApplication::Translate('Destination Location');
			$this->lblDestinationLocationId->Text = ($this->objInventoryTransaction->DestinationLocation) ? $this->objInventoryTransaction->DestinationLocation->__toString() : null;
			return $this->lblDestinationLocationId;
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
				if (($this->objInventoryTransaction->CreatedByObject) && ($this->objInventoryTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objInventoryTransaction->CreatedByObject) ? $this->objInventoryTransaction->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objInventoryTransaction->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objInventoryTransaction->CreationDate) ? $this->objInventoryTransaction->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objInventoryTransaction->ModifiedByObject) && ($this->objInventoryTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objInventoryTransaction->ModifiedByObject) ? $this->objInventoryTransaction->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objInventoryTransaction->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local InventoryTransaction object.
		 * @param boolean $blnReload reload InventoryTransaction from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objInventoryTransaction->Reload();

			if ($this->lblInventoryTransactionId) if ($this->blnEditMode) $this->lblInventoryTransactionId->Text = $this->objInventoryTransaction->InventoryTransactionId;

			if ($this->lstInventoryLocation) {
					$this->lstInventoryLocation->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstInventoryLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objInventoryLocationArray = InventoryLocation::LoadAll();
				if ($objInventoryLocationArray) foreach ($objInventoryLocationArray as $objInventoryLocation) {
					$objListItem = new QListItem($objInventoryLocation->__toString(), $objInventoryLocation->InventoryLocationId);
					if (($this->objInventoryTransaction->InventoryLocation) && ($this->objInventoryTransaction->InventoryLocation->InventoryLocationId == $objInventoryLocation->InventoryLocationId))
						$objListItem->Selected = true;
					$this->lstInventoryLocation->AddItem($objListItem);
				}
			}
			if ($this->lblInventoryLocationId) $this->lblInventoryLocationId->Text = ($this->objInventoryTransaction->InventoryLocation) ? $this->objInventoryTransaction->InventoryLocation->__toString() : null;

			if ($this->lstTransaction) {
					$this->lstTransaction->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTransaction->AddItem(QApplication::Translate('- Select One -'), null);
				$objTransactionArray = Transaction::LoadAll();
				if ($objTransactionArray) foreach ($objTransactionArray as $objTransaction) {
					$objListItem = new QListItem($objTransaction->__toString(), $objTransaction->TransactionId);
					if (($this->objInventoryTransaction->Transaction) && ($this->objInventoryTransaction->Transaction->TransactionId == $objTransaction->TransactionId))
						$objListItem->Selected = true;
					$this->lstTransaction->AddItem($objListItem);
				}
			}
			if ($this->lblTransactionId) $this->lblTransactionId->Text = ($this->objInventoryTransaction->Transaction) ? $this->objInventoryTransaction->Transaction->__toString() : null;

			if ($this->txtQuantity) $this->txtQuantity->Text = $this->objInventoryTransaction->Quantity;
			if ($this->lblQuantity) $this->lblQuantity->Text = $this->objInventoryTransaction->Quantity;

			if ($this->lstSourceLocation) {
					$this->lstSourceLocation->RemoveAllItems();
				$this->lstSourceLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objSourceLocationArray = Location::LoadAll();
				if ($objSourceLocationArray) foreach ($objSourceLocationArray as $objSourceLocation) {
					$objListItem = new QListItem($objSourceLocation->__toString(), $objSourceLocation->LocationId);
					if (($this->objInventoryTransaction->SourceLocation) && ($this->objInventoryTransaction->SourceLocation->LocationId == $objSourceLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstSourceLocation->AddItem($objListItem);
				}
			}
			if ($this->lblSourceLocationId) $this->lblSourceLocationId->Text = ($this->objInventoryTransaction->SourceLocation) ? $this->objInventoryTransaction->SourceLocation->__toString() : null;

			if ($this->lstDestinationLocation) {
					$this->lstDestinationLocation->RemoveAllItems();
				$this->lstDestinationLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objDestinationLocationArray = Location::LoadAll();
				if ($objDestinationLocationArray) foreach ($objDestinationLocationArray as $objDestinationLocation) {
					$objListItem = new QListItem($objDestinationLocation->__toString(), $objDestinationLocation->LocationId);
					if (($this->objInventoryTransaction->DestinationLocation) && ($this->objInventoryTransaction->DestinationLocation->LocationId == $objDestinationLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstDestinationLocation->AddItem($objListItem);
				}
			}
			if ($this->lblDestinationLocationId) $this->lblDestinationLocationId->Text = ($this->objInventoryTransaction->DestinationLocation) ? $this->objInventoryTransaction->DestinationLocation->__toString() : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objInventoryTransaction->CreatedByObject) && ($this->objInventoryTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objInventoryTransaction->CreatedByObject) ? $this->objInventoryTransaction->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objInventoryTransaction->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objInventoryTransaction->CreationDate) ? $this->objInventoryTransaction->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objInventoryTransaction->ModifiedByObject) && ($this->objInventoryTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objInventoryTransaction->ModifiedByObject) ? $this->objInventoryTransaction->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objInventoryTransaction->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC INVENTORYTRANSACTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's InventoryTransaction instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveInventoryTransaction() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstInventoryLocation) $this->objInventoryTransaction->InventoryLocationId = $this->lstInventoryLocation->SelectedValue;
				if ($this->lstTransaction) $this->objInventoryTransaction->TransactionId = $this->lstTransaction->SelectedValue;
				if ($this->txtQuantity) $this->objInventoryTransaction->Quantity = $this->txtQuantity->Text;
				if ($this->lstSourceLocation) $this->objInventoryTransaction->SourceLocationId = $this->lstSourceLocation->SelectedValue;
				if ($this->lstDestinationLocation) $this->objInventoryTransaction->DestinationLocationId = $this->lstDestinationLocation->SelectedValue;
				if ($this->lstCreatedByObject) $this->objInventoryTransaction->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objInventoryTransaction->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objInventoryTransaction->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the InventoryTransaction object
				$this->objInventoryTransaction->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's InventoryTransaction instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteInventoryTransaction() {
			$this->objInventoryTransaction->Delete();
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
				case 'InventoryTransaction': return $this->objInventoryTransaction;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to InventoryTransaction fields -- will be created dynamically if not yet created
				case 'InventoryTransactionIdControl':
					if (!$this->lblInventoryTransactionId) return $this->lblInventoryTransactionId_Create();
					return $this->lblInventoryTransactionId;
				case 'InventoryTransactionIdLabel':
					if (!$this->lblInventoryTransactionId) return $this->lblInventoryTransactionId_Create();
					return $this->lblInventoryTransactionId;
				case 'InventoryLocationIdControl':
					if (!$this->lstInventoryLocation) return $this->lstInventoryLocation_Create();
					return $this->lstInventoryLocation;
				case 'InventoryLocationIdLabel':
					if (!$this->lblInventoryLocationId) return $this->lblInventoryLocationId_Create();
					return $this->lblInventoryLocationId;
				case 'TransactionIdControl':
					if (!$this->lstTransaction) return $this->lstTransaction_Create();
					return $this->lstTransaction;
				case 'TransactionIdLabel':
					if (!$this->lblTransactionId) return $this->lblTransactionId_Create();
					return $this->lblTransactionId;
				case 'QuantityControl':
					if (!$this->txtQuantity) return $this->txtQuantity_Create();
					return $this->txtQuantity;
				case 'QuantityLabel':
					if (!$this->lblQuantity) return $this->lblQuantity_Create();
					return $this->lblQuantity;
				case 'SourceLocationIdControl':
					if (!$this->lstSourceLocation) return $this->lstSourceLocation_Create();
					return $this->lstSourceLocation;
				case 'SourceLocationIdLabel':
					if (!$this->lblSourceLocationId) return $this->lblSourceLocationId_Create();
					return $this->lblSourceLocationId;
				case 'DestinationLocationIdControl':
					if (!$this->lstDestinationLocation) return $this->lstDestinationLocation_Create();
					return $this->lstDestinationLocation;
				case 'DestinationLocationIdLabel':
					if (!$this->lblDestinationLocationId) return $this->lblDestinationLocationId_Create();
					return $this->lblDestinationLocationId;
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
					// Controls that point to InventoryTransaction fields
					case 'InventoryTransactionIdControl':
						return ($this->lblInventoryTransactionId = QType::Cast($mixValue, 'QControl'));
					case 'InventoryLocationIdControl':
						return ($this->lstInventoryLocation = QType::Cast($mixValue, 'QControl'));
					case 'TransactionIdControl':
						return ($this->lstTransaction = QType::Cast($mixValue, 'QControl'));
					case 'QuantityControl':
						return ($this->txtQuantity = QType::Cast($mixValue, 'QControl'));
					case 'SourceLocationIdControl':
						return ($this->lstSourceLocation = QType::Cast($mixValue, 'QControl'));
					case 'DestinationLocationIdControl':
						return ($this->lstDestinationLocation = QType::Cast($mixValue, 'QControl'));
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