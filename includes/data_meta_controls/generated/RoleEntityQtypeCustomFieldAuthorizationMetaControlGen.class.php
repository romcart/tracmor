<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RoleEntityQtypeCustomFieldAuthorization class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RoleEntityQtypeCustomFieldAuthorization object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RoleEntityQtypeCustomFieldAuthorizationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read RoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorization the actual RoleEntityQtypeCustomFieldAuthorization data class being edited
	 * property QLabel $RoleEntityQtypeCustomFieldAuthorizationIdControl
	 * property-read QLabel $RoleEntityQtypeCustomFieldAuthorizationIdLabel
	 * property QListBox $RoleIdControl
	 * property-read QLabel $RoleIdLabel
	 * property QListBox $EntityQtypeCustomFieldIdControl
	 * property-read QLabel $EntityQtypeCustomFieldIdLabel
	 * property QListBox $AuthorizationIdControl
	 * property-read QLabel $AuthorizationIdLabel
	 * property QCheckBox $AuthorizedFlagControl
	 * property-read QLabel $AuthorizedFlagLabel
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

	class RoleEntityQtypeCustomFieldAuthorizationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RoleEntityQtypeCustomFieldAuthorization objRoleEntityQtypeCustomFieldAuthorization
		 * @access protected
		 */
		protected $objRoleEntityQtypeCustomFieldAuthorization;

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

		// Controls that allow the editing of RoleEntityQtypeCustomFieldAuthorization's individual data fields
        /**
         * @var QLabel lblRoleEntityQtypeCustomFieldAuthorizationId;
         * @access protected
         */
		protected $lblRoleEntityQtypeCustomFieldAuthorizationId;

        /**
         * @var QListBox lstRole;
         * @access protected
         */
		protected $lstRole;

        /**
         * @var QListBox lstEntityQtypeCustomField;
         * @access protected
         */
		protected $lstEntityQtypeCustomField;

        /**
         * @var QListBox lstAuthorization;
         * @access protected
         */
		protected $lstAuthorization;

        /**
         * @var QCheckBox chkAuthorizedFlag;
         * @access protected
         */
		protected $chkAuthorizedFlag;

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


		// Controls that allow the viewing of RoleEntityQtypeCustomFieldAuthorization's individual data fields
        /**
         * @var QLabel lblRoleId
         * @access protected
         */
		protected $lblRoleId;

        /**
         * @var QLabel lblEntityQtypeCustomFieldId
         * @access protected
         */
		protected $lblEntityQtypeCustomFieldId;

        /**
         * @var QLabel lblAuthorizationId
         * @access protected
         */
		protected $lblAuthorizationId;

        /**
         * @var QLabel lblAuthorizedFlag
         * @access protected
         */
		protected $lblAuthorizedFlag;

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
		 * RoleEntityQtypeCustomFieldAuthorizationMetaControl to edit a single RoleEntityQtypeCustomFieldAuthorization object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RoleEntityQtypeCustomFieldAuthorization object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization new or existing RoleEntityQtypeCustomFieldAuthorization object
		 */
		 public function __construct($objParentObject, RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RoleEntityQtypeCustomFieldAuthorizationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RoleEntityQtypeCustomFieldAuthorization object
			$this->objRoleEntityQtypeCustomFieldAuthorization = $objRoleEntityQtypeCustomFieldAuthorization;

			// Figure out if we're Editing or Creating New
			if ($this->objRoleEntityQtypeCustomFieldAuthorization->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 * @param integer $intRoleEntityQtypeCustomFieldAuthorizationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RoleEntityQtypeCustomFieldAuthorization object creation - defaults to CreateOrEdit
 		 * @return RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 */
		public static function Create($objParentObject, $intRoleEntityQtypeCustomFieldAuthorizationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intRoleEntityQtypeCustomFieldAuthorizationId)) {
				$objRoleEntityQtypeCustomFieldAuthorization = RoleEntityQtypeCustomFieldAuthorization::Load($intRoleEntityQtypeCustomFieldAuthorizationId);

				// RoleEntityQtypeCustomFieldAuthorization was found -- return it!
				if ($objRoleEntityQtypeCustomFieldAuthorization)
					return new RoleEntityQtypeCustomFieldAuthorizationMetaControl($objParentObject, $objRoleEntityQtypeCustomFieldAuthorization);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RoleEntityQtypeCustomFieldAuthorization object with PK arguments: ' . $intRoleEntityQtypeCustomFieldAuthorizationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RoleEntityQtypeCustomFieldAuthorizationMetaControl($objParentObject, new RoleEntityQtypeCustomFieldAuthorization());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleEntityQtypeCustomFieldAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleEntityQtypeCustomFieldAuthorizationId = QApplication::PathInfo(0);
			return RoleEntityQtypeCustomFieldAuthorizationMetaControl::Create($objParentObject, $intRoleEntityQtypeCustomFieldAuthorizationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleEntityQtypeCustomFieldAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleEntityQtypeCustomFieldAuthorizationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleEntityQtypeCustomFieldAuthorizationId = QApplication::QueryString('intRoleEntityQtypeCustomFieldAuthorizationId');
			return RoleEntityQtypeCustomFieldAuthorizationMetaControl::Create($objParentObject, $intRoleEntityQtypeCustomFieldAuthorizationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblRoleEntityQtypeCustomFieldAuthorizationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleEntityQtypeCustomFieldAuthorizationId_Create($strControlId = null) {
			$this->lblRoleEntityQtypeCustomFieldAuthorizationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleEntityQtypeCustomFieldAuthorizationId->Name = QApplication::Translate('Role Entity Qtype Custom Field Authorization Id');
			if ($this->blnEditMode)
				$this->lblRoleEntityQtypeCustomFieldAuthorizationId->Text = $this->objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId;
			else
				$this->lblRoleEntityQtypeCustomFieldAuthorizationId->Text = 'N/A';
			return $this->lblRoleEntityQtypeCustomFieldAuthorizationId;
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
				if (($this->objRoleEntityQtypeCustomFieldAuthorization->Role) && ($this->objRoleEntityQtypeCustomFieldAuthorization->Role->RoleId == $objRole->RoleId))
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
			$this->lblRoleId->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->Role) ? $this->objRoleEntityQtypeCustomFieldAuthorization->Role->__toString() : null;
			$this->lblRoleId->Required = true;
			return $this->lblRoleId;
		}

		/**
		 * Create and setup QListBox lstEntityQtypeCustomField
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstEntityQtypeCustomField_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstEntityQtypeCustomField = new QListBox($this->objParentObject, $strControlId);
			$this->lstEntityQtypeCustomField->Name = QApplication::Translate('Entity Qtype Custom Field');
			$this->lstEntityQtypeCustomField->Required = true;
			if (!$this->blnEditMode)
				$this->lstEntityQtypeCustomField->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objEntityQtypeCustomFieldCursor = EntityQtypeCustomField::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objEntityQtypeCustomField = EntityQtypeCustomField::InstantiateCursor($objEntityQtypeCustomFieldCursor)) {
				$objListItem = new QListItem($objEntityQtypeCustomField->__toString(), $objEntityQtypeCustomField->EntityQtypeCustomFieldId);
				if (($this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField) && ($this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField->EntityQtypeCustomFieldId == $objEntityQtypeCustomField->EntityQtypeCustomFieldId))
					$objListItem->Selected = true;
				$this->lstEntityQtypeCustomField->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstEntityQtypeCustomField;
		}

		/**
		 * Create and setup QLabel lblEntityQtypeCustomFieldId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEntityQtypeCustomFieldId_Create($strControlId = null) {
			$this->lblEntityQtypeCustomFieldId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEntityQtypeCustomFieldId->Name = QApplication::Translate('Entity Qtype Custom Field');
			$this->lblEntityQtypeCustomFieldId->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField) ? $this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField->__toString() : null;
			$this->lblEntityQtypeCustomFieldId->Required = true;
			return $this->lblEntityQtypeCustomFieldId;
		}

		/**
		 * Create and setup QListBox lstAuthorization
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAuthorization_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAuthorization = new QListBox($this->objParentObject, $strControlId);
			$this->lstAuthorization->Name = QApplication::Translate('Authorization');
			$this->lstAuthorization->Required = true;
			if (!$this->blnEditMode)
				$this->lstAuthorization->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAuthorizationCursor = Authorization::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAuthorization = Authorization::InstantiateCursor($objAuthorizationCursor)) {
				$objListItem = new QListItem($objAuthorization->__toString(), $objAuthorization->AuthorizationId);
				if (($this->objRoleEntityQtypeCustomFieldAuthorization->Authorization) && ($this->objRoleEntityQtypeCustomFieldAuthorization->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
					$objListItem->Selected = true;
				$this->lstAuthorization->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAuthorization;
		}

		/**
		 * Create and setup QLabel lblAuthorizationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizationId_Create($strControlId = null) {
			$this->lblAuthorizationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizationId->Name = QApplication::Translate('Authorization');
			$this->lblAuthorizationId->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->Authorization) ? $this->objRoleEntityQtypeCustomFieldAuthorization->Authorization->__toString() : null;
			$this->lblAuthorizationId->Required = true;
			return $this->lblAuthorizationId;
		}

		/**
		 * Create and setup QCheckBox chkAuthorizedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAuthorizedFlag_Create($strControlId = null) {
			$this->chkAuthorizedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAuthorizedFlag->Name = QApplication::Translate('Authorized Flag');
			$this->chkAuthorizedFlag->Checked = $this->objRoleEntityQtypeCustomFieldAuthorization->AuthorizedFlag;
			return $this->chkAuthorizedFlag;
		}

		/**
		 * Create and setup QLabel lblAuthorizedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizedFlag_Create($strControlId = null) {
			$this->lblAuthorizedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizedFlag->Name = QApplication::Translate('Authorized Flag');
			$this->lblAuthorizedFlag->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->AuthorizedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAuthorizedFlag;
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
				if (($this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject) && ($this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject) ? $this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objRoleEntityQtypeCustomFieldAuthorization->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objRoleEntityQtypeCustomFieldAuthorization->CreationDate) ? $this->objRoleEntityQtypeCustomFieldAuthorization->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject) && ($this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject) ? $this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local RoleEntityQtypeCustomFieldAuthorization object.
		 * @param boolean $blnReload reload RoleEntityQtypeCustomFieldAuthorization from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRoleEntityQtypeCustomFieldAuthorization->Reload();

			if ($this->lblRoleEntityQtypeCustomFieldAuthorizationId) if ($this->blnEditMode) $this->lblRoleEntityQtypeCustomFieldAuthorizationId->Text = $this->objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId;

			if ($this->lstRole) {
					$this->lstRole->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);
				$objRoleArray = Role::LoadAll();
				if ($objRoleArray) foreach ($objRoleArray as $objRole) {
					$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
					if (($this->objRoleEntityQtypeCustomFieldAuthorization->Role) && ($this->objRoleEntityQtypeCustomFieldAuthorization->Role->RoleId == $objRole->RoleId))
						$objListItem->Selected = true;
					$this->lstRole->AddItem($objListItem);
				}
			}
			if ($this->lblRoleId) $this->lblRoleId->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->Role) ? $this->objRoleEntityQtypeCustomFieldAuthorization->Role->__toString() : null;

			if ($this->lstEntityQtypeCustomField) {
					$this->lstEntityQtypeCustomField->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstEntityQtypeCustomField->AddItem(QApplication::Translate('- Select One -'), null);
				$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadAll();
				if ($objEntityQtypeCustomFieldArray) foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					$objListItem = new QListItem($objEntityQtypeCustomField->__toString(), $objEntityQtypeCustomField->EntityQtypeCustomFieldId);
					if (($this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField) && ($this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField->EntityQtypeCustomFieldId == $objEntityQtypeCustomField->EntityQtypeCustomFieldId))
						$objListItem->Selected = true;
					$this->lstEntityQtypeCustomField->AddItem($objListItem);
				}
			}
			if ($this->lblEntityQtypeCustomFieldId) $this->lblEntityQtypeCustomFieldId->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField) ? $this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomField->__toString() : null;

			if ($this->lstAuthorization) {
					$this->lstAuthorization->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAuthorization->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuthorizationArray = Authorization::LoadAll();
				if ($objAuthorizationArray) foreach ($objAuthorizationArray as $objAuthorization) {
					$objListItem = new QListItem($objAuthorization->__toString(), $objAuthorization->AuthorizationId);
					if (($this->objRoleEntityQtypeCustomFieldAuthorization->Authorization) && ($this->objRoleEntityQtypeCustomFieldAuthorization->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
						$objListItem->Selected = true;
					$this->lstAuthorization->AddItem($objListItem);
				}
			}
			if ($this->lblAuthorizationId) $this->lblAuthorizationId->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->Authorization) ? $this->objRoleEntityQtypeCustomFieldAuthorization->Authorization->__toString() : null;

			if ($this->chkAuthorizedFlag) $this->chkAuthorizedFlag->Checked = $this->objRoleEntityQtypeCustomFieldAuthorization->AuthorizedFlag;
			if ($this->lblAuthorizedFlag) $this->lblAuthorizedFlag->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->AuthorizedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject) && ($this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject) ? $this->objRoleEntityQtypeCustomFieldAuthorization->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objRoleEntityQtypeCustomFieldAuthorization->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objRoleEntityQtypeCustomFieldAuthorization->CreationDate) ? $this->objRoleEntityQtypeCustomFieldAuthorization->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject) && ($this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject) ? $this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ROLEENTITYQTYPECUSTOMFIELDAUTHORIZATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RoleEntityQtypeCustomFieldAuthorization instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRoleEntityQtypeCustomFieldAuthorization() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstRole) $this->objRoleEntityQtypeCustomFieldAuthorization->RoleId = $this->lstRole->SelectedValue;
				if ($this->lstEntityQtypeCustomField) $this->objRoleEntityQtypeCustomFieldAuthorization->EntityQtypeCustomFieldId = $this->lstEntityQtypeCustomField->SelectedValue;
				if ($this->lstAuthorization) $this->objRoleEntityQtypeCustomFieldAuthorization->AuthorizationId = $this->lstAuthorization->SelectedValue;
				if ($this->chkAuthorizedFlag) $this->objRoleEntityQtypeCustomFieldAuthorization->AuthorizedFlag = $this->chkAuthorizedFlag->Checked;
				if ($this->lstCreatedByObject) $this->objRoleEntityQtypeCustomFieldAuthorization->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objRoleEntityQtypeCustomFieldAuthorization->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objRoleEntityQtypeCustomFieldAuthorization->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RoleEntityQtypeCustomFieldAuthorization object
				$this->objRoleEntityQtypeCustomFieldAuthorization->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RoleEntityQtypeCustomFieldAuthorization instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRoleEntityQtypeCustomFieldAuthorization() {
			$this->objRoleEntityQtypeCustomFieldAuthorization->Delete();
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
				case 'RoleEntityQtypeCustomFieldAuthorization': return $this->objRoleEntityQtypeCustomFieldAuthorization;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RoleEntityQtypeCustomFieldAuthorization fields -- will be created dynamically if not yet created
				case 'RoleEntityQtypeCustomFieldAuthorizationIdControl':
					if (!$this->lblRoleEntityQtypeCustomFieldAuthorizationId) return $this->lblRoleEntityQtypeCustomFieldAuthorizationId_Create();
					return $this->lblRoleEntityQtypeCustomFieldAuthorizationId;
				case 'RoleEntityQtypeCustomFieldAuthorizationIdLabel':
					if (!$this->lblRoleEntityQtypeCustomFieldAuthorizationId) return $this->lblRoleEntityQtypeCustomFieldAuthorizationId_Create();
					return $this->lblRoleEntityQtypeCustomFieldAuthorizationId;
				case 'RoleIdControl':
					if (!$this->lstRole) return $this->lstRole_Create();
					return $this->lstRole;
				case 'RoleIdLabel':
					if (!$this->lblRoleId) return $this->lblRoleId_Create();
					return $this->lblRoleId;
				case 'EntityQtypeCustomFieldIdControl':
					if (!$this->lstEntityQtypeCustomField) return $this->lstEntityQtypeCustomField_Create();
					return $this->lstEntityQtypeCustomField;
				case 'EntityQtypeCustomFieldIdLabel':
					if (!$this->lblEntityQtypeCustomFieldId) return $this->lblEntityQtypeCustomFieldId_Create();
					return $this->lblEntityQtypeCustomFieldId;
				case 'AuthorizationIdControl':
					if (!$this->lstAuthorization) return $this->lstAuthorization_Create();
					return $this->lstAuthorization;
				case 'AuthorizationIdLabel':
					if (!$this->lblAuthorizationId) return $this->lblAuthorizationId_Create();
					return $this->lblAuthorizationId;
				case 'AuthorizedFlagControl':
					if (!$this->chkAuthorizedFlag) return $this->chkAuthorizedFlag_Create();
					return $this->chkAuthorizedFlag;
				case 'AuthorizedFlagLabel':
					if (!$this->lblAuthorizedFlag) return $this->lblAuthorizedFlag_Create();
					return $this->lblAuthorizedFlag;
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
					// Controls that point to RoleEntityQtypeCustomFieldAuthorization fields
					case 'RoleEntityQtypeCustomFieldAuthorizationIdControl':
						return ($this->lblRoleEntityQtypeCustomFieldAuthorizationId = QType::Cast($mixValue, 'QControl'));
					case 'RoleIdControl':
						return ($this->lstRole = QType::Cast($mixValue, 'QControl'));
					case 'EntityQtypeCustomFieldIdControl':
						return ($this->lstEntityQtypeCustomField = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationIdControl':
						return ($this->lstAuthorization = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizedFlagControl':
						return ($this->chkAuthorizedFlag = QType::Cast($mixValue, 'QControl'));
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