<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AssetTransactionCheckout class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AssetTransactionCheckout object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetTransactionCheckoutMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AssetTransactionCheckout $AssetTransactionCheckout the actual AssetTransactionCheckout data class being edited
	 * property QLabel $AssetTransactionCheckoutIdControl
	 * property-read QLabel $AssetTransactionCheckoutIdLabel
	 * property QListBox $AssetTransactionIdControl
	 * property-read QLabel $AssetTransactionIdLabel
	 * property QListBox $ToContactIdControl
	 * property-read QLabel $ToContactIdLabel
	 * property QListBox $ToUserIdControl
	 * property-read QLabel $ToUserIdLabel
	 * property QDateTimePicker $DueDateControl
	 * property-read QLabel $DueDateLabel
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

	class AssetTransactionCheckoutMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AssetTransactionCheckout objAssetTransactionCheckout
		 * @access protected
		 */
		protected $objAssetTransactionCheckout;

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

		// Controls that allow the editing of AssetTransactionCheckout's individual data fields
        /**
         * @var QLabel lblAssetTransactionCheckoutId;
         * @access protected
         */
		protected $lblAssetTransactionCheckoutId;

        /**
         * @var QListBox lstAssetTransaction;
         * @access protected
         */
		protected $lstAssetTransaction;

        /**
         * @var QListBox lstToContact;
         * @access protected
         */
		protected $lstToContact;

        /**
         * @var QListBox lstToUser;
         * @access protected
         */
		protected $lstToUser;

        /**
         * @var QDateTimePicker calDueDate;
         * @access protected
         */
		protected $calDueDate;

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


		// Controls that allow the viewing of AssetTransactionCheckout's individual data fields
        /**
         * @var QLabel lblAssetTransactionId
         * @access protected
         */
		protected $lblAssetTransactionId;

        /**
         * @var QLabel lblToContactId
         * @access protected
         */
		protected $lblToContactId;

        /**
         * @var QLabel lblToUserId
         * @access protected
         */
		protected $lblToUserId;

        /**
         * @var QLabel lblDueDate
         * @access protected
         */
		protected $lblDueDate;

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
		 * AssetTransactionCheckoutMetaControl to edit a single AssetTransactionCheckout object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AssetTransactionCheckout object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionCheckoutMetaControl
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout new or existing AssetTransactionCheckout object
		 */
		 public function __construct($objParentObject, AssetTransactionCheckout $objAssetTransactionCheckout) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetTransactionCheckoutMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AssetTransactionCheckout object
			$this->objAssetTransactionCheckout = $objAssetTransactionCheckout;

			// Figure out if we're Editing or Creating New
			if ($this->objAssetTransactionCheckout->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionCheckoutMetaControl
		 * @param integer $intAssetTransactionCheckoutId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AssetTransactionCheckout object creation - defaults to CreateOrEdit
 		 * @return AssetTransactionCheckoutMetaControl
		 */
		public static function Create($objParentObject, $intAssetTransactionCheckoutId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetTransactionCheckoutId)) {
				$objAssetTransactionCheckout = AssetTransactionCheckout::Load($intAssetTransactionCheckoutId);

				// AssetTransactionCheckout was found -- return it!
				if ($objAssetTransactionCheckout)
					return new AssetTransactionCheckoutMetaControl($objParentObject, $objAssetTransactionCheckout);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AssetTransactionCheckout object with PK arguments: ' . $intAssetTransactionCheckoutId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetTransactionCheckoutMetaControl($objParentObject, new AssetTransactionCheckout());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionCheckoutMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetTransactionCheckout object creation - defaults to CreateOrEdit
		 * @return AssetTransactionCheckoutMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetTransactionCheckoutId = QApplication::PathInfo(0);
			return AssetTransactionCheckoutMetaControl::Create($objParentObject, $intAssetTransactionCheckoutId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetTransactionCheckoutMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetTransactionCheckout object creation - defaults to CreateOrEdit
		 * @return AssetTransactionCheckoutMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetTransactionCheckoutId = QApplication::QueryString('intAssetTransactionCheckoutId');
			return AssetTransactionCheckoutMetaControl::Create($objParentObject, $intAssetTransactionCheckoutId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAssetTransactionCheckoutId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetTransactionCheckoutId_Create($strControlId = null) {
			$this->lblAssetTransactionCheckoutId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetTransactionCheckoutId->Name = QApplication::Translate('Asset Transaction Checkout Id');
			if ($this->blnEditMode)
				$this->lblAssetTransactionCheckoutId->Text = $this->objAssetTransactionCheckout->AssetTransactionCheckoutId;
			else
				$this->lblAssetTransactionCheckoutId->Text = 'N/A';
			return $this->lblAssetTransactionCheckoutId;
		}

		/**
		 * Create and setup QListBox lstAssetTransaction
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssetTransaction_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssetTransaction = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssetTransaction->Name = QApplication::Translate('Asset Transaction');
			$this->lstAssetTransaction->Required = true;
			if (!$this->blnEditMode)
				$this->lstAssetTransaction->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetTransactionCursor = AssetTransaction::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssetTransaction = AssetTransaction::InstantiateCursor($objAssetTransactionCursor)) {
				$objListItem = new QListItem($objAssetTransaction->__toString(), $objAssetTransaction->AssetTransactionId);
				if (($this->objAssetTransactionCheckout->AssetTransaction) && ($this->objAssetTransactionCheckout->AssetTransaction->AssetTransactionId == $objAssetTransaction->AssetTransactionId))
					$objListItem->Selected = true;
				$this->lstAssetTransaction->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAssetTransaction;
		}

		/**
		 * Create and setup QLabel lblAssetTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetTransactionId_Create($strControlId = null) {
			$this->lblAssetTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetTransactionId->Name = QApplication::Translate('Asset Transaction');
			$this->lblAssetTransactionId->Text = ($this->objAssetTransactionCheckout->AssetTransaction) ? $this->objAssetTransactionCheckout->AssetTransaction->__toString() : null;
			$this->lblAssetTransactionId->Required = true;
			return $this->lblAssetTransactionId;
		}

		/**
		 * Create and setup QListBox lstToContact
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToContact_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToContact = new QListBox($this->objParentObject, $strControlId);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToContactCursor = Contact::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToContact = Contact::InstantiateCursor($objToContactCursor)) {
				$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
				if (($this->objAssetTransactionCheckout->ToContact) && ($this->objAssetTransactionCheckout->ToContact->ContactId == $objToContact->ContactId))
					$objListItem->Selected = true;
				$this->lstToContact->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToContact;
		}

		/**
		 * Create and setup QLabel lblToContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToContactId_Create($strControlId = null) {
			$this->lblToContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToContactId->Name = QApplication::Translate('To Contact');
			$this->lblToContactId->Text = ($this->objAssetTransactionCheckout->ToContact) ? $this->objAssetTransactionCheckout->ToContact->__toString() : null;
			return $this->lblToContactId;
		}

		/**
		 * Create and setup QListBox lstToUser
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToUser_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToUser = new QListBox($this->objParentObject, $strControlId);
			$this->lstToUser->Name = QApplication::Translate('To User');
			$this->lstToUser->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToUserCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToUser = UserAccount::InstantiateCursor($objToUserCursor)) {
				$objListItem = new QListItem($objToUser->__toString(), $objToUser->UserAccountId);
				if (($this->objAssetTransactionCheckout->ToUser) && ($this->objAssetTransactionCheckout->ToUser->UserAccountId == $objToUser->UserAccountId))
					$objListItem->Selected = true;
				$this->lstToUser->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToUser;
		}

		/**
		 * Create and setup QLabel lblToUserId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToUserId_Create($strControlId = null) {
			$this->lblToUserId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToUserId->Name = QApplication::Translate('To User');
			$this->lblToUserId->Text = ($this->objAssetTransactionCheckout->ToUser) ? $this->objAssetTransactionCheckout->ToUser->__toString() : null;
			return $this->lblToUserId;
		}

		/**
		 * Create and setup QDateTimePicker calDueDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDueDate_Create($strControlId = null) {
			$this->calDueDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDueDate->Name = QApplication::Translate('Due Date');
			$this->calDueDate->DateTime = $this->objAssetTransactionCheckout->DueDate;
			$this->calDueDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDueDate;
		}

		/**
		 * Create and setup QLabel lblDueDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDueDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDueDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblDueDate->Name = QApplication::Translate('Due Date');
			$this->strDueDateDateTimeFormat = $strDateTimeFormat;
			$this->lblDueDate->Text = sprintf($this->objAssetTransactionCheckout->DueDate) ? $this->objAssetTransactionCheckout->DueDate->__toString($this->strDueDateDateTimeFormat) : null;
			return $this->lblDueDate;
		}

		protected $strDueDateDateTimeFormat;

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
				if (($this->objAssetTransactionCheckout->CreatedByObject) && ($this->objAssetTransactionCheckout->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objAssetTransactionCheckout->CreatedByObject) ? $this->objAssetTransactionCheckout->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objAssetTransactionCheckout->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objAssetTransactionCheckout->CreationDate) ? $this->objAssetTransactionCheckout->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objAssetTransactionCheckout->ModifiedByObject) && ($this->objAssetTransactionCheckout->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objAssetTransactionCheckout->ModifiedByObject) ? $this->objAssetTransactionCheckout->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objAssetTransactionCheckout->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local AssetTransactionCheckout object.
		 * @param boolean $blnReload reload AssetTransactionCheckout from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAssetTransactionCheckout->Reload();

			if ($this->lblAssetTransactionCheckoutId) if ($this->blnEditMode) $this->lblAssetTransactionCheckoutId->Text = $this->objAssetTransactionCheckout->AssetTransactionCheckoutId;

			if ($this->lstAssetTransaction) {
					$this->lstAssetTransaction->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAssetTransaction->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetTransactionArray = AssetTransaction::LoadAll();
				if ($objAssetTransactionArray) foreach ($objAssetTransactionArray as $objAssetTransaction) {
					$objListItem = new QListItem($objAssetTransaction->__toString(), $objAssetTransaction->AssetTransactionId);
					if (($this->objAssetTransactionCheckout->AssetTransaction) && ($this->objAssetTransactionCheckout->AssetTransaction->AssetTransactionId == $objAssetTransaction->AssetTransactionId))
						$objListItem->Selected = true;
					$this->lstAssetTransaction->AddItem($objListItem);
				}
			}
			if ($this->lblAssetTransactionId) $this->lblAssetTransactionId->Text = ($this->objAssetTransactionCheckout->AssetTransaction) ? $this->objAssetTransactionCheckout->AssetTransaction->__toString() : null;

			if ($this->lstToContact) {
					$this->lstToContact->RemoveAllItems();
				$this->lstToContact->AddItem(QApplication::Translate('- Select One -'), null);
				$objToContactArray = Contact::LoadAll();
				if ($objToContactArray) foreach ($objToContactArray as $objToContact) {
					$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
					if (($this->objAssetTransactionCheckout->ToContact) && ($this->objAssetTransactionCheckout->ToContact->ContactId == $objToContact->ContactId))
						$objListItem->Selected = true;
					$this->lstToContact->AddItem($objListItem);
				}
			}
			if ($this->lblToContactId) $this->lblToContactId->Text = ($this->objAssetTransactionCheckout->ToContact) ? $this->objAssetTransactionCheckout->ToContact->__toString() : null;

			if ($this->lstToUser) {
					$this->lstToUser->RemoveAllItems();
				$this->lstToUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objToUserArray = UserAccount::LoadAll();
				if ($objToUserArray) foreach ($objToUserArray as $objToUser) {
					$objListItem = new QListItem($objToUser->__toString(), $objToUser->UserAccountId);
					if (($this->objAssetTransactionCheckout->ToUser) && ($this->objAssetTransactionCheckout->ToUser->UserAccountId == $objToUser->UserAccountId))
						$objListItem->Selected = true;
					$this->lstToUser->AddItem($objListItem);
				}
			}
			if ($this->lblToUserId) $this->lblToUserId->Text = ($this->objAssetTransactionCheckout->ToUser) ? $this->objAssetTransactionCheckout->ToUser->__toString() : null;

			if ($this->calDueDate) $this->calDueDate->DateTime = $this->objAssetTransactionCheckout->DueDate;
			if ($this->lblDueDate) $this->lblDueDate->Text = sprintf($this->objAssetTransactionCheckout->DueDate) ? $this->objAssetTransactionCheckout->__toString($this->strDueDateDateTimeFormat) : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objAssetTransactionCheckout->CreatedByObject) && ($this->objAssetTransactionCheckout->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objAssetTransactionCheckout->CreatedByObject) ? $this->objAssetTransactionCheckout->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objAssetTransactionCheckout->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objAssetTransactionCheckout->CreationDate) ? $this->objAssetTransactionCheckout->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objAssetTransactionCheckout->ModifiedByObject) && ($this->objAssetTransactionCheckout->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objAssetTransactionCheckout->ModifiedByObject) ? $this->objAssetTransactionCheckout->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objAssetTransactionCheckout->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSETTRANSACTIONCHECKOUT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AssetTransactionCheckout instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAssetTransactionCheckout() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAssetTransaction) $this->objAssetTransactionCheckout->AssetTransactionId = $this->lstAssetTransaction->SelectedValue;
				if ($this->lstToContact) $this->objAssetTransactionCheckout->ToContactId = $this->lstToContact->SelectedValue;
				if ($this->lstToUser) $this->objAssetTransactionCheckout->ToUserId = $this->lstToUser->SelectedValue;
				if ($this->calDueDate) $this->objAssetTransactionCheckout->DueDate = $this->calDueDate->DateTime;
				if ($this->lstCreatedByObject) $this->objAssetTransactionCheckout->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objAssetTransactionCheckout->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objAssetTransactionCheckout->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AssetTransactionCheckout object
				$this->objAssetTransactionCheckout->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AssetTransactionCheckout instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAssetTransactionCheckout() {
			$this->objAssetTransactionCheckout->Delete();
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
				case 'AssetTransactionCheckout': return $this->objAssetTransactionCheckout;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AssetTransactionCheckout fields -- will be created dynamically if not yet created
				case 'AssetTransactionCheckoutIdControl':
					if (!$this->lblAssetTransactionCheckoutId) return $this->lblAssetTransactionCheckoutId_Create();
					return $this->lblAssetTransactionCheckoutId;
				case 'AssetTransactionCheckoutIdLabel':
					if (!$this->lblAssetTransactionCheckoutId) return $this->lblAssetTransactionCheckoutId_Create();
					return $this->lblAssetTransactionCheckoutId;
				case 'AssetTransactionIdControl':
					if (!$this->lstAssetTransaction) return $this->lstAssetTransaction_Create();
					return $this->lstAssetTransaction;
				case 'AssetTransactionIdLabel':
					if (!$this->lblAssetTransactionId) return $this->lblAssetTransactionId_Create();
					return $this->lblAssetTransactionId;
				case 'ToContactIdControl':
					if (!$this->lstToContact) return $this->lstToContact_Create();
					return $this->lstToContact;
				case 'ToContactIdLabel':
					if (!$this->lblToContactId) return $this->lblToContactId_Create();
					return $this->lblToContactId;
				case 'ToUserIdControl':
					if (!$this->lstToUser) return $this->lstToUser_Create();
					return $this->lstToUser;
				case 'ToUserIdLabel':
					if (!$this->lblToUserId) return $this->lblToUserId_Create();
					return $this->lblToUserId;
				case 'DueDateControl':
					if (!$this->calDueDate) return $this->calDueDate_Create();
					return $this->calDueDate;
				case 'DueDateLabel':
					if (!$this->lblDueDate) return $this->lblDueDate_Create();
					return $this->lblDueDate;
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
					// Controls that point to AssetTransactionCheckout fields
					case 'AssetTransactionCheckoutIdControl':
						return ($this->lblAssetTransactionCheckoutId = QType::Cast($mixValue, 'QControl'));
					case 'AssetTransactionIdControl':
						return ($this->lstAssetTransaction = QType::Cast($mixValue, 'QControl'));
					case 'ToContactIdControl':
						return ($this->lstToContact = QType::Cast($mixValue, 'QControl'));
					case 'ToUserIdControl':
						return ($this->lstToUser = QType::Cast($mixValue, 'QControl'));
					case 'DueDateControl':
						return ($this->calDueDate = QType::Cast($mixValue, 'QControl'));
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