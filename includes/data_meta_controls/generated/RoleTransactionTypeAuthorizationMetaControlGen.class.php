<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RoleTransactionTypeAuthorization class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RoleTransactionTypeAuthorization object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RoleTransactionTypeAuthorizationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read RoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization the actual RoleTransactionTypeAuthorization data class being edited
	 * property QLabel $RoleTransactionTypeAuthorizationIdControl
	 * property-read QLabel $RoleTransactionTypeAuthorizationIdLabel
	 * property QListBox $RoleIdControl
	 * property-read QLabel $RoleIdLabel
	 * property QListBox $TransactionTypeIdControl
	 * property-read QLabel $TransactionTypeIdLabel
	 * property QListBox $AuthorizationLevelIdControl
	 * property-read QLabel $AuthorizationLevelIdLabel
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

	class RoleTransactionTypeAuthorizationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RoleTransactionTypeAuthorization objRoleTransactionTypeAuthorization
		 * @access protected
		 */
		protected $objRoleTransactionTypeAuthorization;

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

		// Controls that allow the editing of RoleTransactionTypeAuthorization's individual data fields
        /**
         * @var QLabel lblRoleTransactionTypeAuthorizationId;
         * @access protected
         */
		protected $lblRoleTransactionTypeAuthorizationId;

        /**
         * @var QListBox lstRole;
         * @access protected
         */
		protected $lstRole;

        /**
         * @var QListBox lstTransactionType;
         * @access protected
         */
		protected $lstTransactionType;

        /**
         * @var QListBox lstAuthorizationLevel;
         * @access protected
         */
		protected $lstAuthorizationLevel;

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


		// Controls that allow the viewing of RoleTransactionTypeAuthorization's individual data fields
        /**
         * @var QLabel lblRoleId
         * @access protected
         */
		protected $lblRoleId;

        /**
         * @var QLabel lblTransactionTypeId
         * @access protected
         */
		protected $lblTransactionTypeId;

        /**
         * @var QLabel lblAuthorizationLevelId
         * @access protected
         */
		protected $lblAuthorizationLevelId;

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
		 * RoleTransactionTypeAuthorizationMetaControl to edit a single RoleTransactionTypeAuthorization object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RoleTransactionTypeAuthorization object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleTransactionTypeAuthorizationMetaControl
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization new or existing RoleTransactionTypeAuthorization object
		 */
		 public function __construct($objParentObject, RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RoleTransactionTypeAuthorizationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RoleTransactionTypeAuthorization object
			$this->objRoleTransactionTypeAuthorization = $objRoleTransactionTypeAuthorization;

			// Figure out if we're Editing or Creating New
			if ($this->objRoleTransactionTypeAuthorization->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleTransactionTypeAuthorizationMetaControl
		 * @param integer $intRoleTransactionTypeAuthorizationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RoleTransactionTypeAuthorization object creation - defaults to CreateOrEdit
 		 * @return RoleTransactionTypeAuthorizationMetaControl
		 */
		public static function Create($objParentObject, $intRoleTransactionTypeAuthorizationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intRoleTransactionTypeAuthorizationId)) {
				$objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::Load($intRoleTransactionTypeAuthorizationId);

				// RoleTransactionTypeAuthorization was found -- return it!
				if ($objRoleTransactionTypeAuthorization)
					return new RoleTransactionTypeAuthorizationMetaControl($objParentObject, $objRoleTransactionTypeAuthorization);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RoleTransactionTypeAuthorization object with PK arguments: ' . $intRoleTransactionTypeAuthorizationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RoleTransactionTypeAuthorizationMetaControl($objParentObject, new RoleTransactionTypeAuthorization());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleTransactionTypeAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleTransactionTypeAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleTransactionTypeAuthorizationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleTransactionTypeAuthorizationId = QApplication::PathInfo(0);
			return RoleTransactionTypeAuthorizationMetaControl::Create($objParentObject, $intRoleTransactionTypeAuthorizationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleTransactionTypeAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleTransactionTypeAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleTransactionTypeAuthorizationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleTransactionTypeAuthorizationId = QApplication::QueryString('intRoleTransactionTypeAuthorizationId');
			return RoleTransactionTypeAuthorizationMetaControl::Create($objParentObject, $intRoleTransactionTypeAuthorizationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblRoleTransactionTypeAuthorizationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleTransactionTypeAuthorizationId_Create($strControlId = null) {
			$this->lblRoleTransactionTypeAuthorizationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleTransactionTypeAuthorizationId->Name = QApplication::Translate('Role Transaction Type Authorization Id');
			if ($this->blnEditMode)
				$this->lblRoleTransactionTypeAuthorizationId->Text = $this->objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId;
			else
				$this->lblRoleTransactionTypeAuthorizationId->Text = 'N/A';
			return $this->lblRoleTransactionTypeAuthorizationId;
		}

		/**
		 * Create and setup QListBox lstRole
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRole_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRole = new QListBox($this->objParentObject, $strControlId);
			$this->lstRole->Name = QApplication::Translate('Role');
			$this->lstRole->Required = true;
			if (!$this->blnEditMode)
				$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRoleCursor = Role::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRole = Role::InstantiateCursor($objRoleCursor)) {
				$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
				if (($this->objRoleTransactionTypeAuthorization->Role) && ($this->objRoleTransactionTypeAuthorization->Role->RoleId == $objRole->RoleId))
					$objListItem->Selected = true;
				$this->lstRole->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRole;
		}

		/**
		 * Create and setup QLabel lblRoleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleId_Create($strControlId = null) {
			$this->lblRoleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleId->Name = QApplication::Translate('Role');
			$this->lblRoleId->Text = ($this->objRoleTransactionTypeAuthorization->Role) ? $this->objRoleTransactionTypeAuthorization->Role->__toString() : null;
			$this->lblRoleId->Required = true;
			return $this->lblRoleId;
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
				if (($this->objRoleTransactionTypeAuthorization->TransactionType) && ($this->objRoleTransactionTypeAuthorization->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
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
			$this->lblTransactionTypeId->Text = ($this->objRoleTransactionTypeAuthorization->TransactionType) ? $this->objRoleTransactionTypeAuthorization->TransactionType->__toString() : null;
			$this->lblTransactionTypeId->Required = true;
			return $this->lblTransactionTypeId;
		}

		/**
		 * Create and setup QListBox lstAuthorizationLevel
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAuthorizationLevel_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAuthorizationLevel = new QListBox($this->objParentObject, $strControlId);
			$this->lstAuthorizationLevel->Name = QApplication::Translate('Authorization Level');
			$this->lstAuthorizationLevel->Required = true;
			if (!$this->blnEditMode)
				$this->lstAuthorizationLevel->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAuthorizationLevelCursor = AuthorizationLevel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAuthorizationLevel = AuthorizationLevel::InstantiateCursor($objAuthorizationLevelCursor)) {
				$objListItem = new QListItem($objAuthorizationLevel->__toString(), $objAuthorizationLevel->AuthorizationLevelId);
				if (($this->objRoleTransactionTypeAuthorization->AuthorizationLevel) && ($this->objRoleTransactionTypeAuthorization->AuthorizationLevel->AuthorizationLevelId == $objAuthorizationLevel->AuthorizationLevelId))
					$objListItem->Selected = true;
				$this->lstAuthorizationLevel->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAuthorizationLevel;
		}

		/**
		 * Create and setup QLabel lblAuthorizationLevelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizationLevelId_Create($strControlId = null) {
			$this->lblAuthorizationLevelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizationLevelId->Name = QApplication::Translate('Authorization Level');
			$this->lblAuthorizationLevelId->Text = ($this->objRoleTransactionTypeAuthorization->AuthorizationLevel) ? $this->objRoleTransactionTypeAuthorization->AuthorizationLevel->__toString() : null;
			$this->lblAuthorizationLevelId->Required = true;
			return $this->lblAuthorizationLevelId;
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
				if (($this->objRoleTransactionTypeAuthorization->CreatedByObject) && ($this->objRoleTransactionTypeAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objRoleTransactionTypeAuthorization->CreatedByObject) ? $this->objRoleTransactionTypeAuthorization->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objRoleTransactionTypeAuthorization->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objRoleTransactionTypeAuthorization->CreationDate) ? $this->objRoleTransactionTypeAuthorization->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objRoleTransactionTypeAuthorization->ModifiedByObject) && ($this->objRoleTransactionTypeAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objRoleTransactionTypeAuthorization->ModifiedByObject) ? $this->objRoleTransactionTypeAuthorization->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objRoleTransactionTypeAuthorization->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local RoleTransactionTypeAuthorization object.
		 * @param boolean $blnReload reload RoleTransactionTypeAuthorization from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRoleTransactionTypeAuthorization->Reload();

			if ($this->lblRoleTransactionTypeAuthorizationId) if ($this->blnEditMode) $this->lblRoleTransactionTypeAuthorizationId->Text = $this->objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId;

			if ($this->lstRole) {
					$this->lstRole->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);
				$objRoleArray = Role::LoadAll();
				if ($objRoleArray) foreach ($objRoleArray as $objRole) {
					$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
					if (($this->objRoleTransactionTypeAuthorization->Role) && ($this->objRoleTransactionTypeAuthorization->Role->RoleId == $objRole->RoleId))
						$objListItem->Selected = true;
					$this->lstRole->AddItem($objListItem);
				}
			}
			if ($this->lblRoleId) $this->lblRoleId->Text = ($this->objRoleTransactionTypeAuthorization->Role) ? $this->objRoleTransactionTypeAuthorization->Role->__toString() : null;

			if ($this->lstTransactionType) {
					$this->lstTransactionType->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTransactionType->AddItem(QApplication::Translate('- Select One -'), null);
				$objTransactionTypeArray = TransactionType::LoadAll();
				if ($objTransactionTypeArray) foreach ($objTransactionTypeArray as $objTransactionType) {
					$objListItem = new QListItem($objTransactionType->__toString(), $objTransactionType->TransactionTypeId);
					if (($this->objRoleTransactionTypeAuthorization->TransactionType) && ($this->objRoleTransactionTypeAuthorization->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
						$objListItem->Selected = true;
					$this->lstTransactionType->AddItem($objListItem);
				}
			}
			if ($this->lblTransactionTypeId) $this->lblTransactionTypeId->Text = ($this->objRoleTransactionTypeAuthorization->TransactionType) ? $this->objRoleTransactionTypeAuthorization->TransactionType->__toString() : null;

			if ($this->lstAuthorizationLevel) {
					$this->lstAuthorizationLevel->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAuthorizationLevel->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuthorizationLevelArray = AuthorizationLevel::LoadAll();
				if ($objAuthorizationLevelArray) foreach ($objAuthorizationLevelArray as $objAuthorizationLevel) {
					$objListItem = new QListItem($objAuthorizationLevel->__toString(), $objAuthorizationLevel->AuthorizationLevelId);
					if (($this->objRoleTransactionTypeAuthorization->AuthorizationLevel) && ($this->objRoleTransactionTypeAuthorization->AuthorizationLevel->AuthorizationLevelId == $objAuthorizationLevel->AuthorizationLevelId))
						$objListItem->Selected = true;
					$this->lstAuthorizationLevel->AddItem($objListItem);
				}
			}
			if ($this->lblAuthorizationLevelId) $this->lblAuthorizationLevelId->Text = ($this->objRoleTransactionTypeAuthorization->AuthorizationLevel) ? $this->objRoleTransactionTypeAuthorization->AuthorizationLevel->__toString() : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objRoleTransactionTypeAuthorization->CreatedByObject) && ($this->objRoleTransactionTypeAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objRoleTransactionTypeAuthorization->CreatedByObject) ? $this->objRoleTransactionTypeAuthorization->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objRoleTransactionTypeAuthorization->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objRoleTransactionTypeAuthorization->CreationDate) ? $this->objRoleTransactionTypeAuthorization->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objRoleTransactionTypeAuthorization->ModifiedByObject) && ($this->objRoleTransactionTypeAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objRoleTransactionTypeAuthorization->ModifiedByObject) ? $this->objRoleTransactionTypeAuthorization->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objRoleTransactionTypeAuthorization->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ROLETRANSACTIONTYPEAUTHORIZATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RoleTransactionTypeAuthorization instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRoleTransactionTypeAuthorization() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstRole) $this->objRoleTransactionTypeAuthorization->RoleId = $this->lstRole->SelectedValue;
				if ($this->lstTransactionType) $this->objRoleTransactionTypeAuthorization->TransactionTypeId = $this->lstTransactionType->SelectedValue;
				if ($this->lstAuthorizationLevel) $this->objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->lstAuthorizationLevel->SelectedValue;
				if ($this->lstCreatedByObject) $this->objRoleTransactionTypeAuthorization->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objRoleTransactionTypeAuthorization->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objRoleTransactionTypeAuthorization->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RoleTransactionTypeAuthorization object
				$this->objRoleTransactionTypeAuthorization->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RoleTransactionTypeAuthorization instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRoleTransactionTypeAuthorization() {
			$this->objRoleTransactionTypeAuthorization->Delete();
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
				case 'RoleTransactionTypeAuthorization': return $this->objRoleTransactionTypeAuthorization;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RoleTransactionTypeAuthorization fields -- will be created dynamically if not yet created
				case 'RoleTransactionTypeAuthorizationIdControl':
					if (!$this->lblRoleTransactionTypeAuthorizationId) return $this->lblRoleTransactionTypeAuthorizationId_Create();
					return $this->lblRoleTransactionTypeAuthorizationId;
				case 'RoleTransactionTypeAuthorizationIdLabel':
					if (!$this->lblRoleTransactionTypeAuthorizationId) return $this->lblRoleTransactionTypeAuthorizationId_Create();
					return $this->lblRoleTransactionTypeAuthorizationId;
				case 'RoleIdControl':
					if (!$this->lstRole) return $this->lstRole_Create();
					return $this->lstRole;
				case 'RoleIdLabel':
					if (!$this->lblRoleId) return $this->lblRoleId_Create();
					return $this->lblRoleId;
				case 'TransactionTypeIdControl':
					if (!$this->lstTransactionType) return $this->lstTransactionType_Create();
					return $this->lstTransactionType;
				case 'TransactionTypeIdLabel':
					if (!$this->lblTransactionTypeId) return $this->lblTransactionTypeId_Create();
					return $this->lblTransactionTypeId;
				case 'AuthorizationLevelIdControl':
					if (!$this->lstAuthorizationLevel) return $this->lstAuthorizationLevel_Create();
					return $this->lstAuthorizationLevel;
				case 'AuthorizationLevelIdLabel':
					if (!$this->lblAuthorizationLevelId) return $this->lblAuthorizationLevelId_Create();
					return $this->lblAuthorizationLevelId;
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
					// Controls that point to RoleTransactionTypeAuthorization fields
					case 'RoleTransactionTypeAuthorizationIdControl':
						return ($this->lblRoleTransactionTypeAuthorizationId = QType::Cast($mixValue, 'QControl'));
					case 'RoleIdControl':
						return ($this->lstRole = QType::Cast($mixValue, 'QControl'));
					case 'TransactionTypeIdControl':
						return ($this->lstTransactionType = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationLevelIdControl':
						return ($this->lstAuthorizationLevel = QType::Cast($mixValue, 'QControl'));
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