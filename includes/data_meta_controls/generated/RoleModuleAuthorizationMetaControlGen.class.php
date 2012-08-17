<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RoleModuleAuthorization class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RoleModuleAuthorization object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RoleModuleAuthorizationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read RoleModuleAuthorization $RoleModuleAuthorization the actual RoleModuleAuthorization data class being edited
	 * property QLabel $RoleModuleAuthorizationIdControl
	 * property-read QLabel $RoleModuleAuthorizationIdLabel
	 * property QListBox $RoleModuleIdControl
	 * property-read QLabel $RoleModuleIdLabel
	 * property QListBox $AuthorizationIdControl
	 * property-read QLabel $AuthorizationIdLabel
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

	class RoleModuleAuthorizationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RoleModuleAuthorization objRoleModuleAuthorization
		 * @access protected
		 */
		protected $objRoleModuleAuthorization;

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

		// Controls that allow the editing of RoleModuleAuthorization's individual data fields
        /**
         * @var QLabel lblRoleModuleAuthorizationId;
         * @access protected
         */
		protected $lblRoleModuleAuthorizationId;

        /**
         * @var QListBox lstRoleModule;
         * @access protected
         */
		protected $lstRoleModule;

        /**
         * @var QListBox lstAuthorization;
         * @access protected
         */
		protected $lstAuthorization;

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


		// Controls that allow the viewing of RoleModuleAuthorization's individual data fields
        /**
         * @var QLabel lblRoleModuleId
         * @access protected
         */
		protected $lblRoleModuleId;

        /**
         * @var QLabel lblAuthorizationId
         * @access protected
         */
		protected $lblAuthorizationId;

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
		 * RoleModuleAuthorizationMetaControl to edit a single RoleModuleAuthorization object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RoleModuleAuthorization object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleAuthorizationMetaControl
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization new or existing RoleModuleAuthorization object
		 */
		 public function __construct($objParentObject, RoleModuleAuthorization $objRoleModuleAuthorization) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RoleModuleAuthorizationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RoleModuleAuthorization object
			$this->objRoleModuleAuthorization = $objRoleModuleAuthorization;

			// Figure out if we're Editing or Creating New
			if ($this->objRoleModuleAuthorization->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleAuthorizationMetaControl
		 * @param integer $intRoleModuleAuthorizationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RoleModuleAuthorization object creation - defaults to CreateOrEdit
 		 * @return RoleModuleAuthorizationMetaControl
		 */
		public static function Create($objParentObject, $intRoleModuleAuthorizationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intRoleModuleAuthorizationId)) {
				$objRoleModuleAuthorization = RoleModuleAuthorization::Load($intRoleModuleAuthorizationId);

				// RoleModuleAuthorization was found -- return it!
				if ($objRoleModuleAuthorization)
					return new RoleModuleAuthorizationMetaControl($objParentObject, $objRoleModuleAuthorization);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RoleModuleAuthorization object with PK arguments: ' . $intRoleModuleAuthorizationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RoleModuleAuthorizationMetaControl($objParentObject, new RoleModuleAuthorization());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleModuleAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleModuleAuthorizationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleModuleAuthorizationId = QApplication::PathInfo(0);
			return RoleModuleAuthorizationMetaControl::Create($objParentObject, $intRoleModuleAuthorizationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleAuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleModuleAuthorization object creation - defaults to CreateOrEdit
		 * @return RoleModuleAuthorizationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleModuleAuthorizationId = QApplication::QueryString('intRoleModuleAuthorizationId');
			return RoleModuleAuthorizationMetaControl::Create($objParentObject, $intRoleModuleAuthorizationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblRoleModuleAuthorizationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleModuleAuthorizationId_Create($strControlId = null) {
			$this->lblRoleModuleAuthorizationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleModuleAuthorizationId->Name = QApplication::Translate('Role Module Authorization Id');
			if ($this->blnEditMode)
				$this->lblRoleModuleAuthorizationId->Text = $this->objRoleModuleAuthorization->RoleModuleAuthorizationId;
			else
				$this->lblRoleModuleAuthorizationId->Text = 'N/A';
			return $this->lblRoleModuleAuthorizationId;
		}

		/**
		 * Create and setup QListBox lstRoleModule
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRoleModule_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRoleModule = new QListBox($this->objParentObject, $strControlId);
			$this->lstRoleModule->Name = QApplication::Translate('Role Module');
			$this->lstRoleModule->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRoleModuleCursor = RoleModule::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRoleModule = RoleModule::InstantiateCursor($objRoleModuleCursor)) {
				$objListItem = new QListItem($objRoleModule->__toString(), $objRoleModule->RoleModuleId);
				if (($this->objRoleModuleAuthorization->RoleModule) && ($this->objRoleModuleAuthorization->RoleModule->RoleModuleId == $objRoleModule->RoleModuleId))
					$objListItem->Selected = true;
				$this->lstRoleModule->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRoleModule;
		}

		/**
		 * Create and setup QLabel lblRoleModuleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleModuleId_Create($strControlId = null) {
			$this->lblRoleModuleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleModuleId->Name = QApplication::Translate('Role Module');
			$this->lblRoleModuleId->Text = ($this->objRoleModuleAuthorization->RoleModule) ? $this->objRoleModuleAuthorization->RoleModule->__toString() : null;
			return $this->lblRoleModuleId;
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
			$this->lstAuthorization->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAuthorizationCursor = Authorization::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAuthorization = Authorization::InstantiateCursor($objAuthorizationCursor)) {
				$objListItem = new QListItem($objAuthorization->__toString(), $objAuthorization->AuthorizationId);
				if (($this->objRoleModuleAuthorization->Authorization) && ($this->objRoleModuleAuthorization->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
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
			$this->lblAuthorizationId->Text = ($this->objRoleModuleAuthorization->Authorization) ? $this->objRoleModuleAuthorization->Authorization->__toString() : null;
			return $this->lblAuthorizationId;
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
			$this->lstAuthorizationLevel->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAuthorizationLevelCursor = AuthorizationLevel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAuthorizationLevel = AuthorizationLevel::InstantiateCursor($objAuthorizationLevelCursor)) {
				$objListItem = new QListItem($objAuthorizationLevel->__toString(), $objAuthorizationLevel->AuthorizationLevelId);
				if (($this->objRoleModuleAuthorization->AuthorizationLevel) && ($this->objRoleModuleAuthorization->AuthorizationLevel->AuthorizationLevelId == $objAuthorizationLevel->AuthorizationLevelId))
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
			$this->lblAuthorizationLevelId->Text = ($this->objRoleModuleAuthorization->AuthorizationLevel) ? $this->objRoleModuleAuthorization->AuthorizationLevel->__toString() : null;
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
				if (($this->objRoleModuleAuthorization->CreatedByObject) && ($this->objRoleModuleAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objRoleModuleAuthorization->CreatedByObject) ? $this->objRoleModuleAuthorization->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objRoleModuleAuthorization->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objRoleModuleAuthorization->CreationDate) ? $this->objRoleModuleAuthorization->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objRoleModuleAuthorization->ModifiedByObject) && ($this->objRoleModuleAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objRoleModuleAuthorization->ModifiedByObject) ? $this->objRoleModuleAuthorization->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objRoleModuleAuthorization->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local RoleModuleAuthorization object.
		 * @param boolean $blnReload reload RoleModuleAuthorization from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRoleModuleAuthorization->Reload();

			if ($this->lblRoleModuleAuthorizationId) if ($this->blnEditMode) $this->lblRoleModuleAuthorizationId->Text = $this->objRoleModuleAuthorization->RoleModuleAuthorizationId;

			if ($this->lstRoleModule) {
					$this->lstRoleModule->RemoveAllItems();
				$this->lstRoleModule->AddItem(QApplication::Translate('- Select One -'), null);
				$objRoleModuleArray = RoleModule::LoadAll();
				if ($objRoleModuleArray) foreach ($objRoleModuleArray as $objRoleModule) {
					$objListItem = new QListItem($objRoleModule->__toString(), $objRoleModule->RoleModuleId);
					if (($this->objRoleModuleAuthorization->RoleModule) && ($this->objRoleModuleAuthorization->RoleModule->RoleModuleId == $objRoleModule->RoleModuleId))
						$objListItem->Selected = true;
					$this->lstRoleModule->AddItem($objListItem);
				}
			}
			if ($this->lblRoleModuleId) $this->lblRoleModuleId->Text = ($this->objRoleModuleAuthorization->RoleModule) ? $this->objRoleModuleAuthorization->RoleModule->__toString() : null;

			if ($this->lstAuthorization) {
					$this->lstAuthorization->RemoveAllItems();
				$this->lstAuthorization->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuthorizationArray = Authorization::LoadAll();
				if ($objAuthorizationArray) foreach ($objAuthorizationArray as $objAuthorization) {
					$objListItem = new QListItem($objAuthorization->__toString(), $objAuthorization->AuthorizationId);
					if (($this->objRoleModuleAuthorization->Authorization) && ($this->objRoleModuleAuthorization->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
						$objListItem->Selected = true;
					$this->lstAuthorization->AddItem($objListItem);
				}
			}
			if ($this->lblAuthorizationId) $this->lblAuthorizationId->Text = ($this->objRoleModuleAuthorization->Authorization) ? $this->objRoleModuleAuthorization->Authorization->__toString() : null;

			if ($this->lstAuthorizationLevel) {
					$this->lstAuthorizationLevel->RemoveAllItems();
				$this->lstAuthorizationLevel->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuthorizationLevelArray = AuthorizationLevel::LoadAll();
				if ($objAuthorizationLevelArray) foreach ($objAuthorizationLevelArray as $objAuthorizationLevel) {
					$objListItem = new QListItem($objAuthorizationLevel->__toString(), $objAuthorizationLevel->AuthorizationLevelId);
					if (($this->objRoleModuleAuthorization->AuthorizationLevel) && ($this->objRoleModuleAuthorization->AuthorizationLevel->AuthorizationLevelId == $objAuthorizationLevel->AuthorizationLevelId))
						$objListItem->Selected = true;
					$this->lstAuthorizationLevel->AddItem($objListItem);
				}
			}
			if ($this->lblAuthorizationLevelId) $this->lblAuthorizationLevelId->Text = ($this->objRoleModuleAuthorization->AuthorizationLevel) ? $this->objRoleModuleAuthorization->AuthorizationLevel->__toString() : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objRoleModuleAuthorization->CreatedByObject) && ($this->objRoleModuleAuthorization->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objRoleModuleAuthorization->CreatedByObject) ? $this->objRoleModuleAuthorization->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objRoleModuleAuthorization->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objRoleModuleAuthorization->CreationDate) ? $this->objRoleModuleAuthorization->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objRoleModuleAuthorization->ModifiedByObject) && ($this->objRoleModuleAuthorization->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objRoleModuleAuthorization->ModifiedByObject) ? $this->objRoleModuleAuthorization->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objRoleModuleAuthorization->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ROLEMODULEAUTHORIZATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RoleModuleAuthorization instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRoleModuleAuthorization() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstRoleModule) $this->objRoleModuleAuthorization->RoleModuleId = $this->lstRoleModule->SelectedValue;
				if ($this->lstAuthorization) $this->objRoleModuleAuthorization->AuthorizationId = $this->lstAuthorization->SelectedValue;
				if ($this->lstAuthorizationLevel) $this->objRoleModuleAuthorization->AuthorizationLevelId = $this->lstAuthorizationLevel->SelectedValue;
				if ($this->lstCreatedByObject) $this->objRoleModuleAuthorization->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objRoleModuleAuthorization->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objRoleModuleAuthorization->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RoleModuleAuthorization object
				$this->objRoleModuleAuthorization->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RoleModuleAuthorization instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRoleModuleAuthorization() {
			$this->objRoleModuleAuthorization->Delete();
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
				case 'RoleModuleAuthorization': return $this->objRoleModuleAuthorization;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RoleModuleAuthorization fields -- will be created dynamically if not yet created
				case 'RoleModuleAuthorizationIdControl':
					if (!$this->lblRoleModuleAuthorizationId) return $this->lblRoleModuleAuthorizationId_Create();
					return $this->lblRoleModuleAuthorizationId;
				case 'RoleModuleAuthorizationIdLabel':
					if (!$this->lblRoleModuleAuthorizationId) return $this->lblRoleModuleAuthorizationId_Create();
					return $this->lblRoleModuleAuthorizationId;
				case 'RoleModuleIdControl':
					if (!$this->lstRoleModule) return $this->lstRoleModule_Create();
					return $this->lstRoleModule;
				case 'RoleModuleIdLabel':
					if (!$this->lblRoleModuleId) return $this->lblRoleModuleId_Create();
					return $this->lblRoleModuleId;
				case 'AuthorizationIdControl':
					if (!$this->lstAuthorization) return $this->lstAuthorization_Create();
					return $this->lstAuthorization;
				case 'AuthorizationIdLabel':
					if (!$this->lblAuthorizationId) return $this->lblAuthorizationId_Create();
					return $this->lblAuthorizationId;
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
					// Controls that point to RoleModuleAuthorization fields
					case 'RoleModuleAuthorizationIdControl':
						return ($this->lblRoleModuleAuthorizationId = QType::Cast($mixValue, 'QControl'));
					case 'RoleModuleIdControl':
						return ($this->lstRoleModule = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationIdControl':
						return ($this->lstAuthorization = QType::Cast($mixValue, 'QControl'));
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