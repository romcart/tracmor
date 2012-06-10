<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AssetTransaction class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AssetTransaction object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetTransactionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AssetTransaction $AssetTransaction the actual AssetTransaction data class being edited
	 * property QLabel $AssetTransactionIdControl
	 * property-read QLabel $AssetTransactionIdLabel
	 * property QListBox $AssetIdControl
	 * property-read QLabel $AssetIdLabel
	 * property QListBox $TransactionIdControl
	 * property-read QLabel $TransactionIdLabel
	 * property QListBox $ParentAssetTransactionIdControl
	 * property-read QLabel $ParentAssetTransactionIdLabel
	 * property QListBox $SourceLocationIdControl
	 * property-read QLabel $SourceLocationIdLabel
	 * property QListBox $DestinationLocationIdControl
	 * property-read QLabel $DestinationLocationIdLabel
	 * property QCheckBox $NewAssetFlagControl
	 * property-read QLabel $NewAssetFlagLabel
	 * property QListBox $NewAssetIdControl
	 * property-read QLabel $NewAssetIdLabel
	 * property QCheckBox $ScheduleReceiptFlagControl
	 * property-read QLabel $ScheduleReceiptFlagLabel
	 * property QDateTimePicker $ScheduleReceiptDueDateControl
	 * property-read QLabel $ScheduleReceiptDueDateLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $AssetTransactionCheckoutControl
	 * property-read QLabel $AssetTransactionCheckoutLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AssetTransactionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AssetTransaction objAssetTransaction
		 * @access protected
		 */
		protected $objAssetTransaction;

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

		// Controls that allow the editing of AssetTransaction's individual data fields
        /**
         * @var QLabel lblAssetTransactionId;
         * @access protected
         */
		protected $lblAssetTransactionId;

        /**
         * @var QListBox lstAsset;
         * @access protected
         */
		protected $lstAsset;

        /**
         * @var QListBox lstTransaction;
         * @access protected
         */
		protected $lstTransaction;

        /**
         * @var QListBox lstParentAssetTransaction;
         * @access protected
         */
		protected $lstParentAssetTransaction;

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
         * @var QCheckBox chkNewAssetFlag;
         * @access protected
         */
		protected $chkNewAssetFlag;

        /**
         * @var QListBox lstNewAsset;
         * @access protected
         */
		protected $lstNewAsset;

        /**
         * @var QCheckBox chkScheduleReceiptFlag;
         * @access protected
         */
		protected $chkScheduleReceiptFlag;

        /**
         * @var QDateTimePicker calScheduleReceiptDueDate;
         * @access protected
         */
		protected $calScheduleReceiptDueDate;

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


		// Controls that allow the viewing of AssetTransaction's individual data fields
        /**
         * @var QLabel lblAssetId
         * @access protected
         */
		protected $lblAssetId;

        /**
         * @var QLabel lblTransactionId
         * @access protected
         */
		protected $lblTransactionId;

        /**
         * @var QLabel lblParentAssetTransactionId
         * @access protected
         */
		protected $lblParentAssetTransactionId;

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
         * @var QLabel lblNewAssetFlag
         * @access protected
         */
		protected $lblNewAssetFlag;

        /**
         * @var QLabel lblNewAssetId
         * @access protected
         */
		protected $lblNewAssetId;

        /**
         * @var QLabel lblScheduleReceiptFlag
         * @access protected
         */
		protected $lblScheduleReceiptFlag;

        /**
         * @var QLabel lblScheduleReceiptDueDate
         * @access protected
         */
		protected $lblScheduleReceiptDueDate;

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
         * @var QListBox lstAssetTransactionCheckout
         * @access protected
         */
		protected $lstAssetTransactionCheckout;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblAssetTransactionCheckout
         * @access protected
         */
		protected $lblAssetTransactionCheckout;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AssetTransactionMetaControl to edit a single AssetTransaction object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AssetTransaction object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionMetaControl
		 * @param AssetTransaction $objAssetTransaction new or existing AssetTransaction object
		 */
		 public function __construct($objParentObject, AssetTransaction $objAssetTransaction) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetTransactionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AssetTransaction object
			$this->objAssetTransaction = $objAssetTransaction;

			// Figure out if we're Editing or Creating New
			if ($this->objAssetTransaction->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionMetaControl
		 * @param integer $intAssetTransactionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AssetTransaction object creation - defaults to CreateOrEdit
 		 * @return AssetTransactionMetaControl
		 */
		public static function Create($objParentObject, $intAssetTransactionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetTransactionId)) {
				$objAssetTransaction = AssetTransaction::Load($intAssetTransactionId);

				// AssetTransaction was found -- return it!
				if ($objAssetTransaction)
					return new AssetTransactionMetaControl($objParentObject, $objAssetTransaction);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AssetTransaction object with PK arguments: ' . $intAssetTransactionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetTransactionMetaControl($objParentObject, new AssetTransaction());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetTransaction object creation - defaults to CreateOrEdit
		 * @return AssetTransactionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetTransactionId = QApplication::PathInfo(0);
			return AssetTransactionMetaControl::Create($objParentObject, $intAssetTransactionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetTransaction object creation - defaults to CreateOrEdit
		 * @return AssetTransactionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetTransactionId = QApplication::QueryString('intAssetTransactionId');
			return AssetTransactionMetaControl::Create($objParentObject, $intAssetTransactionId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAssetTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetTransactionId_Create($strControlId = null) {
			$this->lblAssetTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetTransactionId->Name = QApplication::Translate('Asset Transaction Id');
			if ($this->blnEditMode)
				$this->lblAssetTransactionId->Text = $this->objAssetTransaction->AssetTransactionId;
			else
				$this->lblAssetTransactionId->Text = 'N/A';
			return $this->lblAssetTransactionId;
		}

		/**
		 * Create and setup QListBox lstAsset
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAsset_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAsset = new QListBox($this->objParentObject, $strControlId);
			$this->lstAsset->Name = QApplication::Translate('Asset');
			$this->lstAsset->Required = true;
			if (!$this->blnEditMode)
				$this->lstAsset->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetCursor = Asset::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAsset = Asset::InstantiateCursor($objAssetCursor)) {
				$objListItem = new QListItem($objAsset->__toString(), $objAsset->AssetId);
				if (($this->objAssetTransaction->Asset) && ($this->objAssetTransaction->Asset->AssetId == $objAsset->AssetId))
					$objListItem->Selected = true;
				$this->lstAsset->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAsset;
		}

		/**
		 * Create and setup QLabel lblAssetId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetId_Create($strControlId = null) {
			$this->lblAssetId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetId->Name = QApplication::Translate('Asset');
			$this->lblAssetId->Text = ($this->objAssetTransaction->Asset) ? $this->objAssetTransaction->Asset->__toString() : null;
			$this->lblAssetId->Required = true;
			return $this->lblAssetId;
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
				if (($this->objAssetTransaction->Transaction) && ($this->objAssetTransaction->Transaction->TransactionId == $objTransaction->TransactionId))
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
			$this->lblTransactionId->Text = ($this->objAssetTransaction->Transaction) ? $this->objAssetTransaction->Transaction->__toString() : null;
			$this->lblTransactionId->Required = true;
			return $this->lblTransactionId;
		}

		/**
		 * Create and setup QListBox lstParentAssetTransaction
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentAssetTransaction_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentAssetTransaction = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentAssetTransaction->Name = QApplication::Translate('Parent Asset Transaction');
			$this->lstParentAssetTransaction->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentAssetTransactionCursor = AssetTransaction::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentAssetTransaction = AssetTransaction::InstantiateCursor($objParentAssetTransactionCursor)) {
				$objListItem = new QListItem($objParentAssetTransaction->__toString(), $objParentAssetTransaction->AssetTransactionId);
				if (($this->objAssetTransaction->ParentAssetTransaction) && ($this->objAssetTransaction->ParentAssetTransaction->AssetTransactionId == $objParentAssetTransaction->AssetTransactionId))
					$objListItem->Selected = true;
				$this->lstParentAssetTransaction->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentAssetTransaction;
		}

		/**
		 * Create and setup QLabel lblParentAssetTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentAssetTransactionId_Create($strControlId = null) {
			$this->lblParentAssetTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentAssetTransactionId->Name = QApplication::Translate('Parent Asset Transaction');
			$this->lblParentAssetTransactionId->Text = ($this->objAssetTransaction->ParentAssetTransaction) ? $this->objAssetTransaction->ParentAssetTransaction->__toString() : null;
			return $this->lblParentAssetTransactionId;
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
				if (($this->objAssetTransaction->SourceLocation) && ($this->objAssetTransaction->SourceLocation->LocationId == $objSourceLocation->LocationId))
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
			$this->lblSourceLocationId->Text = ($this->objAssetTransaction->SourceLocation) ? $this->objAssetTransaction->SourceLocation->__toString() : null;
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
				if (($this->objAssetTransaction->DestinationLocation) && ($this->objAssetTransaction->DestinationLocation->LocationId == $objDestinationLocation->LocationId))
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
			$this->lblDestinationLocationId->Text = ($this->objAssetTransaction->DestinationLocation) ? $this->objAssetTransaction->DestinationLocation->__toString() : null;
			return $this->lblDestinationLocationId;
		}

		/**
		 * Create and setup QCheckBox chkNewAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkNewAssetFlag_Create($strControlId = null) {
			$this->chkNewAssetFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkNewAssetFlag->Name = QApplication::Translate('New Asset Flag');
			$this->chkNewAssetFlag->Checked = $this->objAssetTransaction->NewAssetFlag;
			return $this->chkNewAssetFlag;
		}

		/**
		 * Create and setup QLabel lblNewAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNewAssetFlag_Create($strControlId = null) {
			$this->lblNewAssetFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblNewAssetFlag->Name = QApplication::Translate('New Asset Flag');
			$this->lblNewAssetFlag->Text = ($this->objAssetTransaction->NewAssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblNewAssetFlag;
		}

		/**
		 * Create and setup QListBox lstNewAsset
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstNewAsset_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstNewAsset = new QListBox($this->objParentObject, $strControlId);
			$this->lstNewAsset->Name = QApplication::Translate('New Asset');
			$this->lstNewAsset->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objNewAssetCursor = Asset::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objNewAsset = Asset::InstantiateCursor($objNewAssetCursor)) {
				$objListItem = new QListItem($objNewAsset->__toString(), $objNewAsset->AssetId);
				if (($this->objAssetTransaction->NewAsset) && ($this->objAssetTransaction->NewAsset->AssetId == $objNewAsset->AssetId))
					$objListItem->Selected = true;
				$this->lstNewAsset->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstNewAsset;
		}

		/**
		 * Create and setup QLabel lblNewAssetId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNewAssetId_Create($strControlId = null) {
			$this->lblNewAssetId = new QLabel($this->objParentObject, $strControlId);
			$this->lblNewAssetId->Name = QApplication::Translate('New Asset');
			$this->lblNewAssetId->Text = ($this->objAssetTransaction->NewAsset) ? $this->objAssetTransaction->NewAsset->__toString() : null;
			return $this->lblNewAssetId;
		}

		/**
		 * Create and setup QCheckBox chkScheduleReceiptFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkScheduleReceiptFlag_Create($strControlId = null) {
			$this->chkScheduleReceiptFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkScheduleReceiptFlag->Name = QApplication::Translate('Schedule Receipt Flag');
			$this->chkScheduleReceiptFlag->Checked = $this->objAssetTransaction->ScheduleReceiptFlag;
			return $this->chkScheduleReceiptFlag;
		}

		/**
		 * Create and setup QLabel lblScheduleReceiptFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblScheduleReceiptFlag_Create($strControlId = null) {
			$this->lblScheduleReceiptFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblScheduleReceiptFlag->Name = QApplication::Translate('Schedule Receipt Flag');
			$this->lblScheduleReceiptFlag->Text = ($this->objAssetTransaction->ScheduleReceiptFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblScheduleReceiptFlag;
		}

		/**
		 * Create and setup QDateTimePicker calScheduleReceiptDueDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calScheduleReceiptDueDate_Create($strControlId = null) {
			$this->calScheduleReceiptDueDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calScheduleReceiptDueDate->Name = QApplication::Translate('Schedule Receipt Due Date');
			$this->calScheduleReceiptDueDate->DateTime = $this->objAssetTransaction->ScheduleReceiptDueDate;
			$this->calScheduleReceiptDueDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calScheduleReceiptDueDate;
		}

		/**
		 * Create and setup QLabel lblScheduleReceiptDueDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblScheduleReceiptDueDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblScheduleReceiptDueDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblScheduleReceiptDueDate->Name = QApplication::Translate('Schedule Receipt Due Date');
			$this->strScheduleReceiptDueDateDateTimeFormat = $strDateTimeFormat;
			$this->lblScheduleReceiptDueDate->Text = sprintf($this->objAssetTransaction->ScheduleReceiptDueDate) ? $this->objAssetTransaction->ScheduleReceiptDueDate->__toString($this->strScheduleReceiptDueDateDateTimeFormat) : null;
			return $this->lblScheduleReceiptDueDate;
		}

		protected $strScheduleReceiptDueDateDateTimeFormat;

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
				if (($this->objAssetTransaction->CreatedByObject) && ($this->objAssetTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objAssetTransaction->CreatedByObject) ? $this->objAssetTransaction->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objAssetTransaction->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objAssetTransaction->CreationDate) ? $this->objAssetTransaction->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objAssetTransaction->ModifiedByObject) && ($this->objAssetTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objAssetTransaction->ModifiedByObject) ? $this->objAssetTransaction->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objAssetTransaction->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstAssetTransactionCheckout
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssetTransactionCheckout_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssetTransactionCheckout = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssetTransactionCheckout->Name = QApplication::Translate('Asset Transaction Checkout');
			$this->lstAssetTransactionCheckout->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetTransactionCheckoutCursor = AssetTransactionCheckout::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssetTransactionCheckout = AssetTransactionCheckout::InstantiateCursor($objAssetTransactionCheckoutCursor)) {
				$objListItem = new QListItem($objAssetTransactionCheckout->__toString(), $objAssetTransactionCheckout->AssetTransactionCheckoutId);
				if ($objAssetTransactionCheckout->AssetTransactionId == $this->objAssetTransaction->AssetTransactionId)
					$objListItem->Selected = true;
				$this->lstAssetTransactionCheckout->AddItem($objListItem);
			}

			// Because AssetTransactionCheckout's AssetTransactionCheckout is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAssetTransactionCheckout->SelectedValue)
				$this->lstAssetTransactionCheckout->Enabled = false;

			// Return the QListBox
			return $this->lstAssetTransactionCheckout;
		}

		/**
		 * Create and setup QLabel lblAssetTransactionCheckout
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetTransactionCheckout_Create($strControlId = null) {
			$this->lblAssetTransactionCheckout = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetTransactionCheckout->Name = QApplication::Translate('Asset Transaction Checkout');
			$this->lblAssetTransactionCheckout->Text = ($this->objAssetTransaction->AssetTransactionCheckout) ? $this->objAssetTransaction->AssetTransactionCheckout->__toString() : null;
			return $this->lblAssetTransactionCheckout;
		}



		/**
		 * Refresh this MetaControl with Data from the local AssetTransaction object.
		 * @param boolean $blnReload reload AssetTransaction from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAssetTransaction->Reload();

			if ($this->lblAssetTransactionId) if ($this->blnEditMode) $this->lblAssetTransactionId->Text = $this->objAssetTransaction->AssetTransactionId;

			if ($this->lstAsset) {
					$this->lstAsset->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAsset->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetArray = Asset::LoadAll();
				if ($objAssetArray) foreach ($objAssetArray as $objAsset) {
					$objListItem = new QListItem($objAsset->__toString(), $objAsset->AssetId);
					if (($this->objAssetTransaction->Asset) && ($this->objAssetTransaction->Asset->AssetId == $objAsset->AssetId))
						$objListItem->Selected = true;
					$this->lstAsset->AddItem($objListItem);
				}
			}
			if ($this->lblAssetId) $this->lblAssetId->Text = ($this->objAssetTransaction->Asset) ? $this->objAssetTransaction->Asset->__toString() : null;

			if ($this->lstTransaction) {
					$this->lstTransaction->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTransaction->AddItem(QApplication::Translate('- Select One -'), null);
				$objTransactionArray = Transaction::LoadAll();
				if ($objTransactionArray) foreach ($objTransactionArray as $objTransaction) {
					$objListItem = new QListItem($objTransaction->__toString(), $objTransaction->TransactionId);
					if (($this->objAssetTransaction->Transaction) && ($this->objAssetTransaction->Transaction->TransactionId == $objTransaction->TransactionId))
						$objListItem->Selected = true;
					$this->lstTransaction->AddItem($objListItem);
				}
			}
			if ($this->lblTransactionId) $this->lblTransactionId->Text = ($this->objAssetTransaction->Transaction) ? $this->objAssetTransaction->Transaction->__toString() : null;

			if ($this->lstParentAssetTransaction) {
					$this->lstParentAssetTransaction->RemoveAllItems();
				$this->lstParentAssetTransaction->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentAssetTransactionArray = AssetTransaction::LoadAll();
				if ($objParentAssetTransactionArray) foreach ($objParentAssetTransactionArray as $objParentAssetTransaction) {
					$objListItem = new QListItem($objParentAssetTransaction->__toString(), $objParentAssetTransaction->AssetTransactionId);
					if (($this->objAssetTransaction->ParentAssetTransaction) && ($this->objAssetTransaction->ParentAssetTransaction->AssetTransactionId == $objParentAssetTransaction->AssetTransactionId))
						$objListItem->Selected = true;
					$this->lstParentAssetTransaction->AddItem($objListItem);
				}
			}
			if ($this->lblParentAssetTransactionId) $this->lblParentAssetTransactionId->Text = ($this->objAssetTransaction->ParentAssetTransaction) ? $this->objAssetTransaction->ParentAssetTransaction->__toString() : null;

			if ($this->lstSourceLocation) {
					$this->lstSourceLocation->RemoveAllItems();
				$this->lstSourceLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objSourceLocationArray = Location::LoadAll();
				if ($objSourceLocationArray) foreach ($objSourceLocationArray as $objSourceLocation) {
					$objListItem = new QListItem($objSourceLocation->__toString(), $objSourceLocation->LocationId);
					if (($this->objAssetTransaction->SourceLocation) && ($this->objAssetTransaction->SourceLocation->LocationId == $objSourceLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstSourceLocation->AddItem($objListItem);
				}
			}
			if ($this->lblSourceLocationId) $this->lblSourceLocationId->Text = ($this->objAssetTransaction->SourceLocation) ? $this->objAssetTransaction->SourceLocation->__toString() : null;

			if ($this->lstDestinationLocation) {
					$this->lstDestinationLocation->RemoveAllItems();
				$this->lstDestinationLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objDestinationLocationArray = Location::LoadAll();
				if ($objDestinationLocationArray) foreach ($objDestinationLocationArray as $objDestinationLocation) {
					$objListItem = new QListItem($objDestinationLocation->__toString(), $objDestinationLocation->LocationId);
					if (($this->objAssetTransaction->DestinationLocation) && ($this->objAssetTransaction->DestinationLocation->LocationId == $objDestinationLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstDestinationLocation->AddItem($objListItem);
				}
			}
			if ($this->lblDestinationLocationId) $this->lblDestinationLocationId->Text = ($this->objAssetTransaction->DestinationLocation) ? $this->objAssetTransaction->DestinationLocation->__toString() : null;

			if ($this->chkNewAssetFlag) $this->chkNewAssetFlag->Checked = $this->objAssetTransaction->NewAssetFlag;
			if ($this->lblNewAssetFlag) $this->lblNewAssetFlag->Text = ($this->objAssetTransaction->NewAssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstNewAsset) {
					$this->lstNewAsset->RemoveAllItems();
				$this->lstNewAsset->AddItem(QApplication::Translate('- Select One -'), null);
				$objNewAssetArray = Asset::LoadAll();
				if ($objNewAssetArray) foreach ($objNewAssetArray as $objNewAsset) {
					$objListItem = new QListItem($objNewAsset->__toString(), $objNewAsset->AssetId);
					if (($this->objAssetTransaction->NewAsset) && ($this->objAssetTransaction->NewAsset->AssetId == $objNewAsset->AssetId))
						$objListItem->Selected = true;
					$this->lstNewAsset->AddItem($objListItem);
				}
			}
			if ($this->lblNewAssetId) $this->lblNewAssetId->Text = ($this->objAssetTransaction->NewAsset) ? $this->objAssetTransaction->NewAsset->__toString() : null;

			if ($this->chkScheduleReceiptFlag) $this->chkScheduleReceiptFlag->Checked = $this->objAssetTransaction->ScheduleReceiptFlag;
			if ($this->lblScheduleReceiptFlag) $this->lblScheduleReceiptFlag->Text = ($this->objAssetTransaction->ScheduleReceiptFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calScheduleReceiptDueDate) $this->calScheduleReceiptDueDate->DateTime = $this->objAssetTransaction->ScheduleReceiptDueDate;
			if ($this->lblScheduleReceiptDueDate) $this->lblScheduleReceiptDueDate->Text = sprintf($this->objAssetTransaction->ScheduleReceiptDueDate) ? $this->objAssetTransaction->__toString($this->strScheduleReceiptDueDateDateTimeFormat) : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objAssetTransaction->CreatedByObject) && ($this->objAssetTransaction->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objAssetTransaction->CreatedByObject) ? $this->objAssetTransaction->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objAssetTransaction->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objAssetTransaction->CreationDate) ? $this->objAssetTransaction->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objAssetTransaction->ModifiedByObject) && ($this->objAssetTransaction->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objAssetTransaction->ModifiedByObject) ? $this->objAssetTransaction->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objAssetTransaction->ModifiedDate;

			if ($this->lstAssetTransactionCheckout) {
				$this->lstAssetTransactionCheckout->RemoveAllItems();
				$this->lstAssetTransactionCheckout->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetTransactionCheckoutArray = AssetTransactionCheckout::LoadAll();
				if ($objAssetTransactionCheckoutArray) foreach ($objAssetTransactionCheckoutArray as $objAssetTransactionCheckout) {
					$objListItem = new QListItem($objAssetTransactionCheckout->__toString(), $objAssetTransactionCheckout->AssetTransactionCheckoutId);
					if ($objAssetTransactionCheckout->AssetTransactionId == $this->objAssetTransaction->AssetTransactionId)
						$objListItem->Selected = true;
					$this->lstAssetTransactionCheckout->AddItem($objListItem);
				}
				// Because AssetTransactionCheckout's AssetTransactionCheckout is not null, if a value is already selected, it cannot be changed.
				if ($this->lstAssetTransactionCheckout->SelectedValue)
					$this->lstAssetTransactionCheckout->Enabled = false;
				else
					$this->lstAssetTransactionCheckout->Enabled = true;
			}
			if ($this->lblAssetTransactionCheckout) $this->lblAssetTransactionCheckout->Text = ($this->objAssetTransaction->AssetTransactionCheckout) ? $this->objAssetTransaction->AssetTransactionCheckout->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSETTRANSACTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AssetTransaction instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAssetTransaction() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAsset) $this->objAssetTransaction->AssetId = $this->lstAsset->SelectedValue;
				if ($this->lstTransaction) $this->objAssetTransaction->TransactionId = $this->lstTransaction->SelectedValue;
				if ($this->lstParentAssetTransaction) $this->objAssetTransaction->ParentAssetTransactionId = $this->lstParentAssetTransaction->SelectedValue;
				if ($this->lstSourceLocation) $this->objAssetTransaction->SourceLocationId = $this->lstSourceLocation->SelectedValue;
				if ($this->lstDestinationLocation) $this->objAssetTransaction->DestinationLocationId = $this->lstDestinationLocation->SelectedValue;
				if ($this->chkNewAssetFlag) $this->objAssetTransaction->NewAssetFlag = $this->chkNewAssetFlag->Checked;
				if ($this->lstNewAsset) $this->objAssetTransaction->NewAssetId = $this->lstNewAsset->SelectedValue;
				if ($this->chkScheduleReceiptFlag) $this->objAssetTransaction->ScheduleReceiptFlag = $this->chkScheduleReceiptFlag->Checked;
				if ($this->calScheduleReceiptDueDate) $this->objAssetTransaction->ScheduleReceiptDueDate = $this->calScheduleReceiptDueDate->DateTime;
				if ($this->lstCreatedByObject) $this->objAssetTransaction->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objAssetTransaction->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objAssetTransaction->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstAssetTransactionCheckout) $this->objAssetTransaction->AssetTransactionCheckout = AssetTransactionCheckout::Load($this->lstAssetTransactionCheckout->SelectedValue);

				// Save the AssetTransaction object
				$this->objAssetTransaction->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AssetTransaction instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAssetTransaction() {
			$this->objAssetTransaction->Delete();
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
				case 'AssetTransaction': return $this->objAssetTransaction;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AssetTransaction fields -- will be created dynamically if not yet created
				case 'AssetTransactionIdControl':
					if (!$this->lblAssetTransactionId) return $this->lblAssetTransactionId_Create();
					return $this->lblAssetTransactionId;
				case 'AssetTransactionIdLabel':
					if (!$this->lblAssetTransactionId) return $this->lblAssetTransactionId_Create();
					return $this->lblAssetTransactionId;
				case 'AssetIdControl':
					if (!$this->lstAsset) return $this->lstAsset_Create();
					return $this->lstAsset;
				case 'AssetIdLabel':
					if (!$this->lblAssetId) return $this->lblAssetId_Create();
					return $this->lblAssetId;
				case 'TransactionIdControl':
					if (!$this->lstTransaction) return $this->lstTransaction_Create();
					return $this->lstTransaction;
				case 'TransactionIdLabel':
					if (!$this->lblTransactionId) return $this->lblTransactionId_Create();
					return $this->lblTransactionId;
				case 'ParentAssetTransactionIdControl':
					if (!$this->lstParentAssetTransaction) return $this->lstParentAssetTransaction_Create();
					return $this->lstParentAssetTransaction;
				case 'ParentAssetTransactionIdLabel':
					if (!$this->lblParentAssetTransactionId) return $this->lblParentAssetTransactionId_Create();
					return $this->lblParentAssetTransactionId;
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
				case 'NewAssetFlagControl':
					if (!$this->chkNewAssetFlag) return $this->chkNewAssetFlag_Create();
					return $this->chkNewAssetFlag;
				case 'NewAssetFlagLabel':
					if (!$this->lblNewAssetFlag) return $this->lblNewAssetFlag_Create();
					return $this->lblNewAssetFlag;
				case 'NewAssetIdControl':
					if (!$this->lstNewAsset) return $this->lstNewAsset_Create();
					return $this->lstNewAsset;
				case 'NewAssetIdLabel':
					if (!$this->lblNewAssetId) return $this->lblNewAssetId_Create();
					return $this->lblNewAssetId;
				case 'ScheduleReceiptFlagControl':
					if (!$this->chkScheduleReceiptFlag) return $this->chkScheduleReceiptFlag_Create();
					return $this->chkScheduleReceiptFlag;
				case 'ScheduleReceiptFlagLabel':
					if (!$this->lblScheduleReceiptFlag) return $this->lblScheduleReceiptFlag_Create();
					return $this->lblScheduleReceiptFlag;
				case 'ScheduleReceiptDueDateControl':
					if (!$this->calScheduleReceiptDueDate) return $this->calScheduleReceiptDueDate_Create();
					return $this->calScheduleReceiptDueDate;
				case 'ScheduleReceiptDueDateLabel':
					if (!$this->lblScheduleReceiptDueDate) return $this->lblScheduleReceiptDueDate_Create();
					return $this->lblScheduleReceiptDueDate;
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
				case 'AssetTransactionCheckoutControl':
					if (!$this->lstAssetTransactionCheckout) return $this->lstAssetTransactionCheckout_Create();
					return $this->lstAssetTransactionCheckout;
				case 'AssetTransactionCheckoutLabel':
					if (!$this->lblAssetTransactionCheckout) return $this->lblAssetTransactionCheckout_Create();
					return $this->lblAssetTransactionCheckout;
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
					// Controls that point to AssetTransaction fields
					case 'AssetTransactionIdControl':
						return ($this->lblAssetTransactionId = QType::Cast($mixValue, 'QControl'));
					case 'AssetIdControl':
						return ($this->lstAsset = QType::Cast($mixValue, 'QControl'));
					case 'TransactionIdControl':
						return ($this->lstTransaction = QType::Cast($mixValue, 'QControl'));
					case 'ParentAssetTransactionIdControl':
						return ($this->lstParentAssetTransaction = QType::Cast($mixValue, 'QControl'));
					case 'SourceLocationIdControl':
						return ($this->lstSourceLocation = QType::Cast($mixValue, 'QControl'));
					case 'DestinationLocationIdControl':
						return ($this->lstDestinationLocation = QType::Cast($mixValue, 'QControl'));
					case 'NewAssetFlagControl':
						return ($this->chkNewAssetFlag = QType::Cast($mixValue, 'QControl'));
					case 'NewAssetIdControl':
						return ($this->lstNewAsset = QType::Cast($mixValue, 'QControl'));
					case 'ScheduleReceiptFlagControl':
						return ($this->chkScheduleReceiptFlag = QType::Cast($mixValue, 'QControl'));
					case 'ScheduleReceiptDueDateControl':
						return ($this->calScheduleReceiptDueDate = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'AssetTransactionCheckoutControl':
						return ($this->lstAssetTransactionCheckout = QType::Cast($mixValue, 'QControl'));
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