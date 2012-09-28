<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RoleModule class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RoleModule object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RoleModuleMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read RoleModule $RoleModule the actual RoleModule data class being edited
	 * property QLabel $RoleModuleIdControl
	 * property-read QLabel $RoleModuleIdLabel
	 * property QListBox $RoleIdControl
	 * property-read QLabel $RoleIdLabel
	 * property QListBox $ModuleIdControl
	 * property-read QLabel $ModuleIdLabel
	 * property QCheckBox $AccessFlagControl
	 * property-read QLabel $AccessFlagLabel
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

	class RoleModuleMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RoleModule objRoleModule
		 * @access protected
		 */
		protected $objRoleModule;

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

		// Controls that allow the editing of RoleModule's individual data fields
        /**
         * @var QLabel lblRoleModuleId;
         * @access protected
         */
		protected $lblRoleModuleId;

        /**
         * @var QListBox lstRole;
         * @access protected
         */
		protected $lstRole;

        /**
         * @var QListBox lstModule;
         * @access protected
         */
		protected $lstModule;

        /**
         * @var QCheckBox chkAccessFlag;
         * @access protected
         */
		protected $chkAccessFlag;

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


		// Controls that allow the viewing of RoleModule's individual data fields
        /**
         * @var QLabel lblRoleId
         * @access protected
         */
		protected $lblRoleId;

        /**
         * @var QLabel lblModuleId
         * @access protected
         */
		protected $lblModuleId;

        /**
         * @var QLabel lblAccessFlag
         * @access protected
         */
		protected $lblAccessFlag;

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
		 * RoleModuleMetaControl to edit a single RoleModule object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RoleModule object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleMetaControl
		 * @param RoleModule $objRoleModule new or existing RoleModule object
		 */
		 public function __construct($objParentObject, RoleModule $objRoleModule) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RoleModuleMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RoleModule object
			$this->objRoleModule = $objRoleModule;

			// Figure out if we're Editing or Creating New
			if ($this->objRoleModule->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleMetaControl
		 * @param integer $intRoleModuleId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RoleModule object creation - defaults to CreateOrEdit
 		 * @return RoleModuleMetaControl
		 */
		public static function Create($objParentObject, $intRoleModuleId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intRoleModuleId)) {
				$objRoleModule = RoleModule::Load($intRoleModuleId);

				// RoleModule was found -- return it!
				if ($objRoleModule)
					return new RoleModuleMetaControl($objParentObject, $objRoleModule);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RoleModule object with PK arguments: ' . $intRoleModuleId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RoleModuleMetaControl($objParentObject, new RoleModule());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleModule object creation - defaults to CreateOrEdit
		 * @return RoleModuleMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleModuleId = QApplication::PathInfo(0);
			return RoleModuleMetaControl::Create($objParentObject, $intRoleModuleId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RoleModuleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RoleModule object creation - defaults to CreateOrEdit
		 * @return RoleModuleMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRoleModuleId = QApplication::QueryString('intRoleModuleId');
			return RoleModuleMetaControl::Create($objParentObject, $intRoleModuleId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblRoleModuleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleModuleId_Create($strControlId = null) {
			$this->lblRoleModuleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleModuleId->Name = QApplication::Translate('Role Module Id');
			if ($this->blnEditMode)
				$this->lblRoleModuleId->Text = $this->objRoleModule->RoleModuleId;
			else
				$this->lblRoleModuleId->Text = 'N/A';
			return $this->lblRoleModuleId;
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
				if (($this->objRoleModule->Role) && ($this->objRoleModule->Role->RoleId == $objRole->RoleId))
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
			$this->lblRoleId->Text = ($this->objRoleModule->Role) ? $this->objRoleModule->Role->__toString() : null;
			$this->lblRoleId->Required = true;
			return $this->lblRoleId;
		}

		/**
		 * Create and setup QListBox lstModule
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstModule_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstModule = new QListBox($this->objParentObject, $strControlId);
			$this->lstModule->Name = QApplication::Translate('Module');
			$this->lstModule->Required = true;
			if (!$this->blnEditMode)
				$this->lstModule->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objModuleCursor = Module::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objModule = Module::InstantiateCursor($objModuleCursor)) {
				$objListItem = new QListItem($objModule->__toString(), $objModule->ModuleId);
				if (($this->objRoleModule->Module) && ($this->objRoleModule->Module->ModuleId == $objModule->ModuleId))
					$objListItem->Selected = true;
				$this->lstModule->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstModule;
		}

		/**
		 * Create and setup QLabel lblModuleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModuleId_Create($strControlId = null) {
			$this->lblModuleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblModuleId->Name = QApplication::Translate('Module');
			$this->lblModuleId->Text = ($this->objRoleModule->Module) ? $this->objRoleModule->Module->__toString() : null;
			$this->lblModuleId->Required = true;
			return $this->lblModuleId;
		}

		/**
		 * Create and setup QCheckBox chkAccessFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAccessFlag_Create($strControlId = null) {
			$this->chkAccessFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAccessFlag->Name = QApplication::Translate('Access Flag');
			$this->chkAccessFlag->Checked = $this->objRoleModule->AccessFlag;
			return $this->chkAccessFlag;
		}

		/**
		 * Create and setup QLabel lblAccessFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAccessFlag_Create($strControlId = null) {
			$this->lblAccessFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAccessFlag->Name = QApplication::Translate('Access Flag');
			$this->lblAccessFlag->Text = ($this->objRoleModule->AccessFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAccessFlag;
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
				if (($this->objRoleModule->CreatedByObject) && ($this->objRoleModule->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objRoleModule->CreatedByObject) ? $this->objRoleModule->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objRoleModule->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objRoleModule->CreationDate) ? $this->objRoleModule->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objRoleModule->ModifiedByObject) && ($this->objRoleModule->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objRoleModule->ModifiedByObject) ? $this->objRoleModule->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objRoleModule->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local RoleModule object.
		 * @param boolean $blnReload reload RoleModule from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRoleModule->Reload();

			if ($this->lblRoleModuleId) if ($this->blnEditMode) $this->lblRoleModuleId->Text = $this->objRoleModule->RoleModuleId;

			if ($this->lstRole) {
					$this->lstRole->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstRole->AddItem(QApplication::Translate('- Select One -'), null);
				$objRoleArray = Role::LoadAll();
				if ($objRoleArray) foreach ($objRoleArray as $objRole) {
					$objListItem = new QListItem($objRole->__toString(), $objRole->RoleId);
					if (($this->objRoleModule->Role) && ($this->objRoleModule->Role->RoleId == $objRole->RoleId))
						$objListItem->Selected = true;
					$this->lstRole->AddItem($objListItem);
				}
			}
			if ($this->lblRoleId) $this->lblRoleId->Text = ($this->objRoleModule->Role) ? $this->objRoleModule->Role->__toString() : null;

			if ($this->lstModule) {
					$this->lstModule->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstModule->AddItem(QApplication::Translate('- Select One -'), null);
				$objModuleArray = Module::LoadAll();
				if ($objModuleArray) foreach ($objModuleArray as $objModule) {
					$objListItem = new QListItem($objModule->__toString(), $objModule->ModuleId);
					if (($this->objRoleModule->Module) && ($this->objRoleModule->Module->ModuleId == $objModule->ModuleId))
						$objListItem->Selected = true;
					$this->lstModule->AddItem($objListItem);
				}
			}
			if ($this->lblModuleId) $this->lblModuleId->Text = ($this->objRoleModule->Module) ? $this->objRoleModule->Module->__toString() : null;

			if ($this->chkAccessFlag) $this->chkAccessFlag->Checked = $this->objRoleModule->AccessFlag;
			if ($this->lblAccessFlag) $this->lblAccessFlag->Text = ($this->objRoleModule->AccessFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objRoleModule->CreatedByObject) && ($this->objRoleModule->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objRoleModule->CreatedByObject) ? $this->objRoleModule->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objRoleModule->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objRoleModule->CreationDate) ? $this->objRoleModule->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objRoleModule->ModifiedByObject) && ($this->objRoleModule->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objRoleModule->ModifiedByObject) ? $this->objRoleModule->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objRoleModule->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ROLEMODULE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RoleModule instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRoleModule() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstRole) $this->objRoleModule->RoleId = $this->lstRole->SelectedValue;
				if ($this->lstModule) $this->objRoleModule->ModuleId = $this->lstModule->SelectedValue;
				if ($this->chkAccessFlag) $this->objRoleModule->AccessFlag = $this->chkAccessFlag->Checked;
				if ($this->lstCreatedByObject) $this->objRoleModule->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objRoleModule->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objRoleModule->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RoleModule object
				$this->objRoleModule->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RoleModule instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRoleModule() {
			$this->objRoleModule->Delete();
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
				case 'RoleModule': return $this->objRoleModule;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RoleModule fields -- will be created dynamically if not yet created
				case 'RoleModuleIdControl':
					if (!$this->lblRoleModuleId) return $this->lblRoleModuleId_Create();
					return $this->lblRoleModuleId;
				case 'RoleModuleIdLabel':
					if (!$this->lblRoleModuleId) return $this->lblRoleModuleId_Create();
					return $this->lblRoleModuleId;
				case 'RoleIdControl':
					if (!$this->lstRole) return $this->lstRole_Create();
					return $this->lstRole;
				case 'RoleIdLabel':
					if (!$this->lblRoleId) return $this->lblRoleId_Create();
					return $this->lblRoleId;
				case 'ModuleIdControl':
					if (!$this->lstModule) return $this->lstModule_Create();
					return $this->lstModule;
				case 'ModuleIdLabel':
					if (!$this->lblModuleId) return $this->lblModuleId_Create();
					return $this->lblModuleId;
				case 'AccessFlagControl':
					if (!$this->chkAccessFlag) return $this->chkAccessFlag_Create();
					return $this->chkAccessFlag;
				case 'AccessFlagLabel':
					if (!$this->lblAccessFlag) return $this->lblAccessFlag_Create();
					return $this->lblAccessFlag;
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
					// Controls that point to RoleModule fields
					case 'RoleModuleIdControl':
						return ($this->lblRoleModuleId = QType::Cast($mixValue, 'QControl'));
					case 'RoleIdControl':
						return ($this->lstRole = QType::Cast($mixValue, 'QControl'));
					case 'ModuleIdControl':
						return ($this->lstModule = QType::Cast($mixValue, 'QControl'));
					case 'AccessFlagControl':
						return ($this->chkAccessFlag = QType::Cast($mixValue, 'QControl'));
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