<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Transaction class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Transaction object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TransactionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Transaction $Transaction the actual Transaction data class being edited
	 * property QLabel $TransactionIdControl
	 * property-read QLabel $TransactionIdLabel
	 * property QListBox $EntityQtypeIdControl
	 * property-read QLabel $EntityQtypeIdLabel
	 * property QListBox $TransactionTypeIdControl
	 * property-read QLabel $TransactionTypeIdLabel
	 * property QTextBox $NoteControl
	 * property-read QLabel $NoteLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $ReceiptControl
	 * property-read QLabel $ReceiptLabel
	 * property QListBox $ShipmentControl
	 * property-read QLabel $ShipmentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TransactionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Transaction objTransaction
		 * @access protected
		 */
		protected $objTransaction;

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

		// Controls that allow the editing of Transaction's individual data fields
        /**
         * @var QLabel lblTransactionId;
         * @access protected
         */
		protected $lblTransactionId;

        /**
         * @var QListBox lstEntityQtype;
         * @access protected
         */
		protected $lstEntityQtype;

        /**
         * @var QListBox lstTransactionType;
         * @access protected
         */
		protected $lstTransactionType;

        /**
         * @var QTextBox txtNote;
         * @access protected
         */
		protected $txtNote;

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


		// Controls that allow the viewing of Transaction's individual data fields
        /**
         * @var QLabel lblEntityQtypeId
         * @access protected
         */
		protected $lblEntityQtypeId;

        /**
         * @var QLabel lblTransactionTypeId
         * @access protected
         */
		protected $lblTransactionTypeId;

        /**
         * @var QLabel lblNote
         * @access protected
         */
		protected $lblNote;

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
         * @var QListBox lstReceipt
         * @access protected
         */
		protected $lstReceipt;

        /**
         * @var QListBox lstShipment
         * @access protected
         */
		protected $lstShipment;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblReceipt
         * @access protected
         */
		protected $lblReceipt;

        /**
         * @var QLabel lblShipment
         * @access protected
         */
		protected $lblShipment;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TransactionMetaControl to edit a single Transaction object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Transaction object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param Transaction $objTransaction new or existing Transaction object
		 */
		 public function __construct($objParentObject, Transaction $objTransaction) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TransactionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Transaction object
			$this->objTransaction = $objTransaction;

			// Figure out if we're Editing or Creating New
			if ($this->objTransaction->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param integer $intTransactionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Transaction object creation - defaults to CreateOrEdit
 		 * @return TransactionMetaControl
		 */
		public static function Create($objParentObject, $intTransactionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intTransactionId)) {
				$objTransaction = Transaction::Load($intTransactionId);

				// Transaction was found -- return it!
				if ($objTransaction)
					return new TransactionMetaControl($objParentObject, $objTransaction);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Transaction object with PK arguments: ' . $intTransactionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TransactionMetaControl($objParentObject, new Transaction());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Transaction object creation - defaults to CreateOrEdit
		 * @return TransactionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intTransactionId = QApplication::PathInfo(0);
			return TransactionMetaControl::Create($objParentObject, $intTransactionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Transaction object creation - defaults to CreateOrEdit
		 * @return TransactionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intTransactionId = QApplication::QueryString('intTransactionId');
			return TransactionMetaControl::Create($objParentObject, $intTransactionId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionId_Create($strControlId = null) {
			$this->lblTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionId->Name = QApplication::Translate('Transaction Id');
			if ($this->blnEditMode)
				$this->lblTransactionId->Text = $this->objTransaction->TransactionId;
			else
				$this->lblTransactionId->Text = 'N/A';
			return $this->lblTransactionId;
		}

		/**
		 * Create and setup QListBox lstEntityQtype
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstEntityQtype_Create($strControlId = null) {
			$this->lstEntityQtype = new QListBox($this->objParentObject, $strControlId);
			$this->lstEntityQtype->Name = QApplication::Translate('Entity Qtype');
			$this->lstEntityQtype->Required = true;

			$this->lstEntityQtype->AddItems(EntityQtype::$NameArray, $this->objTransaction->EntityQtypeId);
			return $this->lstEntityQtype;
		}

		/**
		 * Create and setup QLabel lblEntityQtypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEntityQtypeId_Create($strControlId = null) {
			$this->lblEntityQtypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEntityQtypeId->Name = QApplication::Translate('Entity Qtype');
			$this->lblEntityQtypeId->Text = ($this->objTransaction->EntityQtypeId) ? EntityQtype::$NameArray[$this->objTransaction->EntityQtypeId] : null;
			$this->lblEntityQtypeId->Required = true;
			return $this->lblEntityQtypeId;
		}

		/**
		 * Create and setup QListBox lstTransactionType
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTransactionType_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTransactionType = new QListBox($this->objParentObject, $strControlId);
			$this->lstTransactionType->Name = QApplication::Translate('Transaction Type');
			$this->lstTransactionType->Required = true;
			if (!$this->blnEditMode)
				$this->lstTransactionType->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTransactionTypeCursor = TransactionType::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTransactionType = TransactionType::InstantiateCursor($objTransactionTypeCursor)) {
				$objListItem = new QListItem($objTransactionType->__toString(), $objTransactionType->TransactionTypeId);
				if (($this->objTransaction->TransactionType) && ($this->objTransaction->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
					$objListItem->Selected = true;
				$this->lstTransactionType->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTransactionType;
		}

		/**
		 * Create and setup QLabel lblTransactionTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionTypeId_Create($strControlId = null) {
			$this->lblTransactionTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionTypeId->Name = QApplication::Translate('Transaction Type');
			$this->lblTransactionTypeId->Text = ($this->objTransaction->TransactionType) ? $this->objTransaction->TransactionType->__toString() : null;
			$this->lblTransactionTypeId->Required = true;
			return $this->lblTransactionTypeId;
		}

		/**
		 * Create and setup QTextBox txtNote
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNote_Create($strControlId = null) {
			$this->txtNote = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->Text = $this->objTransaction->Note;
			$this->txtNote->TextMode = QTextMode::MultiLine;
			return $this->txtNote;
		}

		/**
		 * Create and setup QLabel lblNote
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNote_Create($strControlId = null) {
			$this->lblNote = new QLabel($this->objParentObject, $strControlId);
			$this->lblNote->Name = QApplication::Translate('Note');
			$this->lblNote->Text = $this->objTransaction->Note;
			return $this->lblNote;
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
				if (($this->objTransaction->CreatedByObject) && ($this->objTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objTransaction->CreatedByObject) ? $this->objTransaction->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objTransaction->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objTransaction->CreationDate) ? $this->objTransaction->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objTransaction->ModifiedByObject) && ($this->objTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objTransaction->ModifiedByObject) ? $this->objTransaction->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objTransaction->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstReceipt
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstReceipt_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstReceipt = new QListBox($this->objParentObject, $strControlId);
			$this->lstReceipt->Name = QApplication::Translate('Receipt');
			$this->lstReceipt->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objReceiptCursor = Receipt::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objReceipt = Receipt::InstantiateCursor($objReceiptCursor)) {
				$objListItem = new QListItem($objReceipt->__toString(), $objReceipt->ReceiptId);
				if ($objReceipt->TransactionId == $this->objTransaction->TransactionId)
					$objListItem->Selected = true;
				$this->lstReceipt->AddItem($objListItem);
			}

			// Because Receipt's Receipt is not null, if a value is already selected, it cannot be changed.
			if ($this->lstReceipt->SelectedValue)
				$this->lstReceipt->Enabled = false;

			// Return the QListBox
			return $this->lstReceipt;
		}

		/**
		 * Create and setup QLabel lblReceipt
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceipt_Create($strControlId = null) {
			$this->lblReceipt = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceipt->Name = QApplication::Translate('Receipt');
			$this->lblReceipt->Text = ($this->objTransaction->Receipt) ? $this->objTransaction->Receipt->__toString() : null;
			return $this->lblReceipt;
		}

		/**
		 * Create and setup QListBox lstShipment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstShipment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstShipment = new QListBox($this->objParentObject, $strControlId);
			$this->lstShipment->Name = QApplication::Translate('Shipment');
			$this->lstShipment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objShipmentCursor = Shipment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objShipment = Shipment::InstantiateCursor($objShipmentCursor)) {
				$objListItem = new QListItem($objShipment->__toString(), $objShipment->ShipmentId);
				if ($objShipment->TransactionId == $this->objTransaction->TransactionId)
					$objListItem->Selected = true;
				$this->lstShipment->AddItem($objListItem);
			}

			// Because Shipment's Shipment is not null, if a value is already selected, it cannot be changed.
			if ($this->lstShipment->SelectedValue)
				$this->lstShipment->Enabled = false;

			// Return the QListBox
			return $this->lstShipment;
		}

		/**
		 * Create and setup QLabel lblShipment
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShipment_Create($strControlId = null) {
			$this->lblShipment = new QLabel($this->objParentObject, $strControlId);
			$this->lblShipment->Name = QApplication::Translate('Shipment');
			$this->lblShipment->Text = ($this->objTransaction->Shipment) ? $this->objTransaction->Shipment->__toString() : null;
			return $this->lblShipment;
		}



		/**
		 * Refresh this MetaControl with Data from the local Transaction object.
		 * @param boolean $blnReload reload Transaction from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTransaction->Reload();

			if ($this->lblTransactionId) if ($this->blnEditMode) $this->lblTransactionId->Text = $this->objTransaction->TransactionId;

			if ($this->lstEntityQtype) $this->lstEntityQtype->SelectedValue = $this->objTransaction->EntityQtypeId;
			if ($this->lblEntityQtypeId) $this->lblEntityQtypeId->Text = ($this->objTransaction->EntityQtypeId) ? EntityQtype::$NameArray[$this->objTransaction->EntityQtypeId] : null;

			if ($this->lstTransactionType) {
					$this->lstTransactionType->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTransactionType->AddItem(QApplication::Translate('- Select One -'), null);
				$objTransactionTypeArray = TransactionType::LoadAll();
				if ($objTransactionTypeArray) foreach ($objTransactionTypeArray as $objTransactionType) {
					$objListItem = new QListItem($objTransactionType->__toString(), $objTransactionType->TransactionTypeId);
					if (($this->objTransaction->TransactionType) && ($this->objTransaction->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
						$objListItem->Selected = true;
					$this->lstTransactionType->AddItem($objListItem);
				}
			}
			if ($this->lblTransactionTypeId) $this->lblTransactionTypeId->Text = ($this->objTransaction->TransactionType) ? $this->objTransaction->TransactionType->__toString() : null;

			if ($this->txtNote) $this->txtNote->Text = $this->objTransaction->Note;
			if ($this->lblNote) $this->lblNote->Text = $this->objTransaction->Note;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objTransaction->CreatedByObject) && ($this->objTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objTransaction->CreatedByObject) ? $this->objTransaction->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objTransaction->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objTransaction->CreationDate) ? $this->objTransaction->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objTransaction->ModifiedByObject) && ($this->objTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objTransaction->ModifiedByObject) ? $this->objTransaction->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objTransaction->ModifiedDate;

			if ($this->lstReceipt) {
				$this->lstReceipt->RemoveAllItems();
				$this->lstReceipt->AddItem(QApplication::Translate('- Select One -'), null);
				$objReceiptArray = Receipt::LoadAll();
				if ($objReceiptArray) foreach ($objReceiptArray as $objReceipt) {
					$objListItem = new QListItem($objReceipt->__toString(), $objReceipt->ReceiptId);
					if ($objReceipt->TransactionId == $this->objTransaction->TransactionId)
						$objListItem->Selected = true;
					$this->lstReceipt->AddItem($objListItem);
				}
				// Because Receipt's Receipt is not null, if a value is already selected, it cannot be changed.
				if ($this->lstReceipt->SelectedValue)
					$this->lstReceipt->Enabled = false;
				else
					$this->lstReceipt->Enabled = true;
			}
			if ($this->lblReceipt) $this->lblReceipt->Text = ($this->objTransaction->Receipt) ? $this->objTransaction->Receipt->__toString() : null;

			if ($this->lstShipment) {
				$this->lstShipment->RemoveAllItems();
				$this->lstShipment->AddItem(QApplication::Translate('- Select One -'), null);
				$objShipmentArray = Shipment::LoadAll();
				if ($objShipmentArray) foreach ($objShipmentArray as $objShipment) {
					$objListItem = new QListItem($objShipment->__toString(), $objShipment->ShipmentId);
					if ($objShipment->TransactionId == $this->objTransaction->TransactionId)
						$objListItem->Selected = true;
					$this->lstShipment->AddItem($objListItem);
				}
				// Because Shipment's Shipment is not null, if a value is already selected, it cannot be changed.
				if ($this->lstShipment->SelectedValue)
					$this->lstShipment->Enabled = false;
				else
					$this->lstShipment->Enabled = true;
			}
			if ($this->lblShipment) $this->lblShipment->Text = ($this->objTransaction->Shipment) ? $this->objTransaction->Shipment->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TRANSACTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Transaction instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTransaction() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEntityQtype) $this->objTransaction->EntityQtypeId = $this->lstEntityQtype->SelectedValue;
				if ($this->lstTransactionType) $this->objTransaction->TransactionTypeId = $this->lstTransactionType->SelectedValue;
				if ($this->txtNote) $this->objTransaction->Note = $this->txtNote->Text;
				if ($this->lstCreatedByObject) $this->objTransaction->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objTransaction->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objTransaction->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstReceipt) $this->objTransaction->Receipt = Receipt::Load($this->lstReceipt->SelectedValue);
				if ($this->lstShipment) $this->objTransaction->Shipment = Shipment::Load($this->lstShipment->SelectedValue);

				// Save the Transaction object
				$this->objTransaction->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Transaction instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTransaction() {
			$this->objTransaction->Delete();
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
				case 'Transaction': return $this->objTransaction;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Transaction fields -- will be created dynamically if not yet created
				case 'TransactionIdControl':
					if (!$this->lblTransactionId) return $this->lblTransactionId_Create();
					return $this->lblTransactionId;
				case 'TransactionIdLabel':
					if (!$this->lblTransactionId) return $this->lblTransactionId_Create();
					return $this->lblTransactionId;
				case 'EntityQtypeIdControl':
					if (!$this->lstEntityQtype) return $this->lstEntityQtype_Create();
					return $this->lstEntityQtype;
				case 'EntityQtypeIdLabel':
					if (!$this->lblEntityQtypeId) return $this->lblEntityQtypeId_Create();
					return $this->lblEntityQtypeId;
				case 'TransactionTypeIdControl':
					if (!$this->lstTransactionType) return $this->lstTransactionType_Create();
					return $this->lstTransactionType;
				case 'TransactionTypeIdLabel':
					if (!$this->lblTransactionTypeId) return $this->lblTransactionTypeId_Create();
					return $this->lblTransactionTypeId;
				case 'NoteControl':
					if (!$this->txtNote) return $this->txtNote_Create();
					return $this->txtNote;
				case 'NoteLabel':
					if (!$this->lblNote) return $this->lblNote_Create();
					return $this->lblNote;
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
				case 'ReceiptControl':
					if (!$this->lstReceipt) return $this->lstReceipt_Create();
					return $this->lstReceipt;
				case 'ReceiptLabel':
					if (!$this->lblReceipt) return $this->lblReceipt_Create();
					return $this->lblReceipt;
				case 'ShipmentControl':
					if (!$this->lstShipment) return $this->lstShipment_Create();
					return $this->lstShipment;
				case 'ShipmentLabel':
					if (!$this->lblShipment) return $this->lblShipment_Create();
					return $this->lblShipment;
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
					// Controls that point to Transaction fields
					case 'TransactionIdControl':
						return ($this->lblTransactionId = QType::Cast($mixValue, 'QControl'));
					case 'EntityQtypeIdControl':
						return ($this->lstEntityQtype = QType::Cast($mixValue, 'QControl'));
					case 'TransactionTypeIdControl':
						return ($this->lstTransactionType = QType::Cast($mixValue, 'QControl'));
					case 'NoteControl':
						return ($this->txtNote = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'ReceiptControl':
						return ($this->lstReceipt = QType::Cast($mixValue, 'QControl'));
					case 'ShipmentControl':
						return ($this->lstShipment = QType::Cast($mixValue, 'QControl'));
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