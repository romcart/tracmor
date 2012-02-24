<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RoleEntityQtypeBuiltInAuthorization class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RoleEntityQtypeBuiltInAuthorization object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RoleEntityQtypeBuiltInAuthorizationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read RoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorization the actual RoleEntityQtypeBuiltInAuthorization data class being edited
	 * property QLabel $RoleEntityBuiltInIdControl
	 * property-read QLabel $RoleEntityBuiltInIdLabel
	 * property QListBox $RoleIdControl
	 * property-read QLabel $RoleIdLabel
	 * property QListBox $EntityQtypeIdControl
	 * property-read QLabel $EntityQtypeIdLabel
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

	class RoleEntityQtypeBuiltInAuthorizationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RoleEntityQtypeBuiltInAuthorization objRoleEntityQtypeBuiltInAuthorization
		 * @access protected
		 */
		protected $objRoleEntityQtypeBuiltInAuthorization;

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

		// Controls that allow the editing of RoleEntityQtypeBuiltInAuthorization's individual data fields
        /**
         * @var QLabel lblRoleEntityBuiltInId;
         * @access protected
         */
		protected $lblRoleEntityBuiltInId;

        /**
         * @var QListBox lstRole;
         * @access protected
         */
		protected $lstRole;

        /**
         * @var QListBox lstEntityQtype;
         * @access protected
         */
		protected $lstEntityQtype;

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


		// Controls that allow the viewing of RoleEntityQtypeBuiltInAuthorization's individual data fields
        /**
         * @var QLabel lblRoleId
         * @access protected
         */
		protected $lblRoleId;

        /**
         * @var QLabel lblEntityQtypeId
         * @access protected
         */
		protected $lblEntityQtypeId;

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
		 * RoleEntityQtypeBuiltInAuthorizationMetaControl to edit a single RoleEntityQtypeBuiltInAuthorization object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RoleEntityQtypeBuiltInAuthorization object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeBuiltInAuthorizationMetaControl
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization new or existing RoleEntityQtypeBuiltInAuthorization object
		 */
		 public function __construct($objParentObject, RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RoleEntityQtypeBuiltInAuthorizationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RoleEntityQtypeBuiltInAuthorization object
			$this->objRoleEntityQtypeBuiltInAuthorization = $objRoleEntityQtypeBuiltInAuthorization;

			// Figure out if we're Editing or Creating New
			if ($this->objRoleEntityQtypeBuiltInAuthorization->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeBuiltInAuthorizationMetaControl
		 * @param integer $intRoleEntityBuiltInId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RoleEntityQtypeBuiltInAuthorization object creation - defaults to CreateOrEdit
 		 * @return RoleEntityQtypeBuiltInAuthorizationMetaControl
		 */
		public static function Create($objParentObject, $intRoleEntityBuiltInId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intRoleEntityBuiltInId)) {
				$objRoleEntityQtypeBuiltInAuthorization = RoleEntityQtypeBuiltInAuthorization::Load($intRoleEntityBuiltInId);

				// RoleEntityQtypeBuiltInAuthorization was found -- return it!
				if ($objRoleEntityQtypeBuiltInAuthorization)
					return new RoleEntityQtypeBuiltInAuthorizationMetaControl($objParentObject, $objRoleEntityQtypeBuiltInAuthorization);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RoleEntityQtypeBuiltInAuthorization object with PK arguments: ' . $intRoleEntityBuiltInId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RoleEntityQtypeBuiltInAuthorizationMetaControl($objParentObject, new RoleEntityQtypeBuiltInAuthorization());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeBuiltInAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleEntityQtypeBuiltInAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleEntityQtypeBuiltInAuthorizationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleEntityBuiltInId = QApplication::PathInfo(0);
			return RoleEntityQtypeBuiltInAuthorizationMetaControl::Create($objParentObject, $intRoleEntityBuiltInId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleEntityQtypeBuiltInAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleEntityQtypeBuiltInAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleEntityQtypeBuiltInAuthorizationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleEntityBuiltInId = QApplication::QueryString('intRoleEntityBuiltInId');
			return RoleEntityQtypeBuiltInAuthorizationMetaControl::Create($objParentObject, $intRoleEntityBuiltInId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblRoleEntityBuiltInId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleEntityBuiltInId_Create($strControlId = null) {
			$this->lblRoleEntityBuiltInId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleEntityBuiltInId->Name = QApplication::Translate('Role Entity Built In Id');
			if ($this->blnEditMode)
				$this->lblRoleEntityBuiltInId->Text = $this->objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId;
			else
				$this->lblRoleEntityBuiltInId->Text = 'N/A';
			return $this->lblRoleEntityBuiltInId;
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
				if (($this->objRoleEntityQtypeBuiltInAuthorization->Role) && ($this->objRoleEntityQtypeBuiltInAuthorization->Role->RoleId == $objRole->RoleId))
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
			$this->lblRoleId->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->Role) ? $this->objRoleEntityQtypeBuiltInAuthorization->Role->__toString() : null;
			$this->lblRoleId->Required = true;
			return $this->lblRoleId;
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

			$this->lstEntityQtype->AddItems(EntityQtype::$NameArray, $this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId);
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
			$this->lblEntityQtypeId->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId) ? EntityQtype::$NameArray[$this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId] : null;
			$this->lblEntityQtypeId->Required = true;
			return $this->lblEntityQtypeId;
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
				if (($this->objRoleEntityQtypeBuiltInAuthorization->Authorization) && ($this->objRoleEntityQtypeBuiltInAuthorization->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
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
			$this->lblAuthorizationId->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->Authorization) ? $this->objRoleEntityQtypeBuiltInAuthorization->Authorization->__toString() : null;
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
			$this->chkAuthorizedFlag->Checked = $this->objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag;
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
			$this->lblAuthorizedFlag->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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
				if (($this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject) && ($this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject) ? $this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objRoleEntityQtypeBuiltInAuthorization->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objRoleEntityQtypeBuiltInAuthorization->CreationDate) ? $this->objRoleEntityQtypeBuiltInAuthorization->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject) && ($this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject) ? $this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objRoleEntityQtypeBuiltInAuthorization->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local RoleEntityQtypeBuiltInAuthorization object.
		 * @param boolean $blnReload reload RoleEntityQtypeBuiltInAuthorization from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRoleEntityQtypeBuiltInAuthorization->Reload();

			if ($this->lblRoleEntityBuiltInId) if ($this->blnEditMode) $this->lblRoleEntityBuiltInId->Text = $this->objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId;

			if ($this->lstRole) {
					$this->lstRole->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);
				$objRoleArray = Role::LoadAll();
				if ($objRoleArray) foreach ($objRoleArray as $objRole) {
					$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
					if (($this->objRoleEntityQtypeBuiltInAuthorization->Role) && ($this->objRoleEntityQtypeBuiltInAuthorization->Role->RoleId == $objRole->RoleId))
						$objListItem->Selected = true;
					$this->lstRole->AddItem($objListItem);
				}
			}
			if ($this->lblRoleId) $this->lblRoleId->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->Role) ? $this->objRoleEntityQtypeBuiltInAuthorization->Role->__toString() : null;

			if ($this->lstEntityQtype) $this->lstEntityQtype->SelectedValue = $this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId;
			if ($this->lblEntityQtypeId) $this->lblEntityQtypeId->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId) ? EntityQtype::$NameArray[$this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId] : null;

			if ($this->lstAuthorization) {
					$this->lstAuthorization->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAuthorization->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuthorizationArray = Authorization::LoadAll();
				if ($objAuthorizationArray) foreach ($objAuthorizationArray as $objAuthorization) {
					$objListItem = new QListItem($objAuthorization->__toString(), $objAuthorization->AuthorizationId);
					if (($this->objRoleEntityQtypeBuiltInAuthorization->Authorization) && ($this->objRoleEntityQtypeBuiltInAuthorization->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
						$objListItem->Selected = true;
					$this->lstAuthorization->AddItem($objListItem);
				}
			}
			if ($this->lblAuthorizationId) $this->lblAuthorizationId->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->Authorization) ? $this->objRoleEntityQtypeBuiltInAuthorization->Authorization->__toString() : null;

			if ($this->chkAuthorizedFlag) $this->chkAuthorizedFlag->Checked = $this->objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag;
			if ($this->lblAuthorizedFlag) $this->lblAuthorizedFlag->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject) && ($this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject) ? $this->objRoleEntityQtypeBuiltInAuthorization->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objRoleEntityQtypeBuiltInAuthorization->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objRoleEntityQtypeBuiltInAuthorization->CreationDate) ? $this->objRoleEntityQtypeBuiltInAuthorization->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject) && ($this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject) ? $this->objRoleEntityQtypeBuiltInAuthorization->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objRoleEntityQtypeBuiltInAuthorization->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ROLEENTITYQTYPEBUILTINAUTHORIZATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RoleEntityQtypeBuiltInAuthorization instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRoleEntityQtypeBuiltInAuthorization() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstRole) $this->objRoleEntityQtypeBuiltInAuthorization->RoleId = $this->lstRole->SelectedValue;
				if ($this->lstEntityQtype) $this->objRoleEntityQtypeBuiltInAuthorization->EntityQtypeId = $this->lstEntityQtype->SelectedValue;
				if ($this->lstAuthorization) $this->objRoleEntityQtypeBuiltInAuthorization->AuthorizationId = $this->lstAuthorization->SelectedValue;
				if ($this->chkAuthorizedFlag) $this->objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag = $this->chkAuthorizedFlag->Checked;
				if ($this->lstCreatedByObject) $this->objRoleEntityQtypeBuiltInAuthorization->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objRoleEntityQtypeBuiltInAuthorization->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objRoleEntityQtypeBuiltInAuthorization->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RoleEntityQtypeBuiltInAuthorization object
				$this->objRoleEntityQtypeBuiltInAuthorization->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RoleEntityQtypeBuiltInAuthorization instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRoleEntityQtypeBuiltInAuthorization() {
			$this->objRoleEntityQtypeBuiltInAuthorization->Delete();
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
				case 'RoleEntityQtypeBuiltInAuthorization': return $this->objRoleEntityQtypeBuiltInAuthorization;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RoleEntityQtypeBuiltInAuthorization fields -- will be created dynamically if not yet created
				case 'RoleEntityBuiltInIdControl':
					if (!$this->lblRoleEntityBuiltInId) return $this->lblRoleEntityBuiltInId_Create();
					return $this->lblRoleEntityBuiltInId;
				case 'RoleEntityBuiltInIdLabel':
					if (!$this->lblRoleEntityBuiltInId) return $this->lblRoleEntityBuiltInId_Create();
					return $this->lblRoleEntityBuiltInId;
				case 'RoleIdControl':
					if (!$this->lstRole) return $this->lstRole_Create();
					return $this->lstRole;
				case 'RoleIdLabel':
					if (!$this->lblRoleId) return $this->lblRoleId_Create();
					return $this->lblRoleId;
				case 'EntityQtypeIdControl':
					if (!$this->lstEntityQtype) return $this->lstEntityQtype_Create();
					return $this->lstEntityQtype;
				case 'EntityQtypeIdLabel':
					if (!$this->lblEntityQtypeId) return $this->lblEntityQtypeId_Create();
					return $this->lblEntityQtypeId;
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
					// Controls that point to RoleEntityQtypeBuiltInAuthorization fields
					case 'RoleEntityBuiltInIdControl':
						return ($this->lblRoleEntityBuiltInId = QType::Cast($mixValue, 'QControl'));
					case 'RoleIdControl':
						return ($this->lstRole = QType::Cast($mixValue, 'QControl'));
					case 'EntityQtypeIdControl':
						return ($this->lstEntityQtype = QType::Cast($mixValue, 'QControl'));
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