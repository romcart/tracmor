<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Shortcut class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Shortcut object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ShortcutMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Shortcut $Shortcut the actual Shortcut data class being edited
	 * property QLabel $ShortcutIdControl
	 * property-read QLabel $ShortcutIdLabel
	 * property QListBox $ModuleIdControl
	 * property-read QLabel $ModuleIdLabel
	 * property QListBox $AuthorizationIdControl
	 * property-read QLabel $AuthorizationIdLabel
	 * property QListBox $TransactionTypeIdControl
	 * property-read QLabel $TransactionTypeIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LinkControl
	 * property-read QLabel $LinkLabel
	 * property QTextBox $ImagePathControl
	 * property-read QLabel $ImagePathLabel
	 * property QListBox $EntityQtypeIdControl
	 * property-read QLabel $EntityQtypeIdLabel
	 * property QCheckBox $CreateFlagControl
	 * property-read QLabel $CreateFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ShortcutMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Shortcut objShortcut
		 * @access protected
		 */
		protected $objShortcut;

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

		// Controls that allow the editing of Shortcut's individual data fields
        /**
         * @var QLabel lblShortcutId;
         * @access protected
         */
		protected $lblShortcutId;

        /**
         * @var QListBox lstModule;
         * @access protected
         */
		protected $lstModule;

        /**
         * @var QListBox lstAuthorization;
         * @access protected
         */
		protected $lstAuthorization;

        /**
         * @var QListBox lstTransactionType;
         * @access protected
         */
		protected $lstTransactionType;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtLink;
         * @access protected
         */
		protected $txtLink;

        /**
         * @var QTextBox txtImagePath;
         * @access protected
         */
		protected $txtImagePath;

        /**
         * @var QListBox lstEntityQtype;
         * @access protected
         */
		protected $lstEntityQtype;

        /**
         * @var QCheckBox chkCreateFlag;
         * @access protected
         */
		protected $chkCreateFlag;


		// Controls that allow the viewing of Shortcut's individual data fields
        /**
         * @var QLabel lblModuleId
         * @access protected
         */
		protected $lblModuleId;

        /**
         * @var QLabel lblAuthorizationId
         * @access protected
         */
		protected $lblAuthorizationId;

        /**
         * @var QLabel lblTransactionTypeId
         * @access protected
         */
		protected $lblTransactionTypeId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblLink
         * @access protected
         */
		protected $lblLink;

        /**
         * @var QLabel lblImagePath
         * @access protected
         */
		protected $lblImagePath;

        /**
         * @var QLabel lblEntityQtypeId
         * @access protected
         */
		protected $lblEntityQtypeId;

        /**
         * @var QLabel lblCreateFlag
         * @access protected
         */
		protected $lblCreateFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ShortcutMetaControl to edit a single Shortcut object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Shortcut object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShortcutMetaControl
		 * @param Shortcut $objShortcut new or existing Shortcut object
		 */
		 public function __construct($objParentObject, Shortcut $objShortcut) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ShortcutMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Shortcut object
			$this->objShortcut = $objShortcut;

			// Figure out if we're Editing or Creating New
			if ($this->objShortcut->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShortcutMetaControl
		 * @param integer $intShortcutId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Shortcut object creation - defaults to CreateOrEdit
 		 * @return ShortcutMetaControl
		 */
		public static function Create($objParentObject, $intShortcutId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intShortcutId)) {
				$objShortcut = Shortcut::Load($intShortcutId);

				// Shortcut was found -- return it!
				if ($objShortcut)
					return new ShortcutMetaControl($objParentObject, $objShortcut);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Shortcut object with PK arguments: ' . $intShortcutId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ShortcutMetaControl($objParentObject, new Shortcut());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShortcutMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Shortcut object creation - defaults to CreateOrEdit
		 * @return ShortcutMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intShortcutId = QApplication::PathInfo(0);
			return ShortcutMetaControl::Create($objParentObject, $intShortcutId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShortcutMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Shortcut object creation - defaults to CreateOrEdit
		 * @return ShortcutMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intShortcutId = QApplication::QueryString('intShortcutId');
			return ShortcutMetaControl::Create($objParentObject, $intShortcutId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblShortcutId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShortcutId_Create($strControlId = null) {
			$this->lblShortcutId = new QLabel($this->objParentObject, $strControlId);
			$this->lblShortcutId->Name = QApplication::Translate('Shortcut Id');
			if ($this->blnEditMode)
				$this->lblShortcutId->Text = $this->objShortcut->ShortcutId;
			else
				$this->lblShortcutId->Text = 'N/A';
			return $this->lblShortcutId;
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
				if (($this->objShortcut->Module) && ($this->objShortcut->Module->ModuleId == $objModule->ModuleId))
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
			$this->lblModuleId->Text = ($this->objShortcut->Module) ? $this->objShortcut->Module->__toString() : null;
			$this->lblModuleId->Required = true;
			return $this->lblModuleId;
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
				if (($this->objShortcut->Authorization) && ($this->objShortcut->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
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
			$this->lblAuthorizationId->Text = ($this->objShortcut->Authorization) ? $this->objShortcut->Authorization->__toString() : null;
			return $this->lblAuthorizationId;
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
			$this->lstTransactionType->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTransactionTypeCursor = TransactionType::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTransactionType = TransactionType::InstantiateCursor($objTransactionTypeCursor)) {
				$objListItem = new QListItem($objTransactionType->__toString(), $objTransactionType->TransactionTypeId);
				if (($this->objShortcut->TransactionType) && ($this->objShortcut->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
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
			$this->lblTransactionTypeId->Text = ($this->objShortcut->TransactionType) ? $this->objShortcut->TransactionType->__toString() : null;
			return $this->lblTransactionTypeId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objShortcut->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Shortcut::ShortDescriptionMaxLength;
			return $this->txtShortDescription;
		}

		/**
		 * Create and setup QLabel lblShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShortDescription_Create($strControlId = null) {
			$this->lblShortDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblShortDescription->Name = QApplication::Translate('Short Description');
			$this->lblShortDescription->Text = $this->objShortcut->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtLink
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLink_Create($strControlId = null) {
			$this->txtLink = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLink->Name = QApplication::Translate('Link');
			$this->txtLink->Text = $this->objShortcut->Link;
			$this->txtLink->Required = true;
			$this->txtLink->MaxLength = Shortcut::LinkMaxLength;
			return $this->txtLink;
		}

		/**
		 * Create and setup QLabel lblLink
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLink_Create($strControlId = null) {
			$this->lblLink = new QLabel($this->objParentObject, $strControlId);
			$this->lblLink->Name = QApplication::Translate('Link');
			$this->lblLink->Text = $this->objShortcut->Link;
			$this->lblLink->Required = true;
			return $this->lblLink;
		}

		/**
		 * Create and setup QTextBox txtImagePath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtImagePath_Create($strControlId = null) {
			$this->txtImagePath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objShortcut->ImagePath;
			$this->txtImagePath->MaxLength = Shortcut::ImagePathMaxLength;
			return $this->txtImagePath;
		}

		/**
		 * Create and setup QLabel lblImagePath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblImagePath_Create($strControlId = null) {
			$this->lblImagePath = new QLabel($this->objParentObject, $strControlId);
			$this->lblImagePath->Name = QApplication::Translate('Image Path');
			$this->lblImagePath->Text = $this->objShortcut->ImagePath;
			return $this->lblImagePath;
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

			$this->lstEntityQtype->AddItems(EntityQtype::$NameArray, $this->objShortcut->EntityQtypeId);
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
			$this->lblEntityQtypeId->Text = ($this->objShortcut->EntityQtypeId) ? EntityQtype::$NameArray[$this->objShortcut->EntityQtypeId] : null;
			$this->lblEntityQtypeId->Required = true;
			return $this->lblEntityQtypeId;
		}

		/**
		 * Create and setup QCheckBox chkCreateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCreateFlag_Create($strControlId = null) {
			$this->chkCreateFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCreateFlag->Name = QApplication::Translate('Create Flag');
			$this->chkCreateFlag->Checked = $this->objShortcut->CreateFlag;
			return $this->chkCreateFlag;
		}

		/**
		 * Create and setup QLabel lblCreateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreateFlag_Create($strControlId = null) {
			$this->lblCreateFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreateFlag->Name = QApplication::Translate('Create Flag');
			$this->lblCreateFlag->Text = ($this->objShortcut->CreateFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCreateFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local Shortcut object.
		 * @param boolean $blnReload reload Shortcut from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objShortcut->Reload();

			if ($this->lblShortcutId) if ($this->blnEditMode) $this->lblShortcutId->Text = $this->objShortcut->ShortcutId;

			if ($this->lstModule) {
					$this->lstModule->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstModule->AddItem(QApplication::Translate('- Select One -'), null);
				$objModuleArray = Module::LoadAll();
				if ($objModuleArray) foreach ($objModuleArray as $objModule) {
					$objListItem = new QListItem($objModule->__toString(), $objModule->ModuleId);
					if (($this->objShortcut->Module) && ($this->objShortcut->Module->ModuleId == $objModule->ModuleId))
						$objListItem->Selected = true;
					$this->lstModule->AddItem($objListItem);
				}
			}
			if ($this->lblModuleId) $this->lblModuleId->Text = ($this->objShortcut->Module) ? $this->objShortcut->Module->__toString() : null;

			if ($this->lstAuthorization) {
					$this->lstAuthorization->RemoveAllItems();
				$this->lstAuthorization->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuthorizationArray = Authorization::LoadAll();
				if ($objAuthorizationArray) foreach ($objAuthorizationArray as $objAuthorization) {
					$objListItem = new QListItem($objAuthorization->__toString(), $objAuthorization->AuthorizationId);
					if (($this->objShortcut->Authorization) && ($this->objShortcut->Authorization->AuthorizationId == $objAuthorization->AuthorizationId))
						$objListItem->Selected = true;
					$this->lstAuthorization->AddItem($objListItem);
				}
			}
			if ($this->lblAuthorizationId) $this->lblAuthorizationId->Text = ($this->objShortcut->Authorization) ? $this->objShortcut->Authorization->__toString() : null;

			if ($this->lstTransactionType) {
					$this->lstTransactionType->RemoveAllItems();
				$this->lstTransactionType->AddItem(QApplication::Translate('- Select One -'), null);
				$objTransactionTypeArray = TransactionType::LoadAll();
				if ($objTransactionTypeArray) foreach ($objTransactionTypeArray as $objTransactionType) {
					$objListItem = new QListItem($objTransactionType->__toString(), $objTransactionType->TransactionTypeId);
					if (($this->objShortcut->TransactionType) && ($this->objShortcut->TransactionType->TransactionTypeId == $objTransactionType->TransactionTypeId))
						$objListItem->Selected = true;
					$this->lstTransactionType->AddItem($objListItem);
				}
			}
			if ($this->lblTransactionTypeId) $this->lblTransactionTypeId->Text = ($this->objShortcut->TransactionType) ? $this->objShortcut->TransactionType->__toString() : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objShortcut->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objShortcut->ShortDescription;

			if ($this->txtLink) $this->txtLink->Text = $this->objShortcut->Link;
			if ($this->lblLink) $this->lblLink->Text = $this->objShortcut->Link;

			if ($this->txtImagePath) $this->txtImagePath->Text = $this->objShortcut->ImagePath;
			if ($this->lblImagePath) $this->lblImagePath->Text = $this->objShortcut->ImagePath;

			if ($this->lstEntityQtype) $this->lstEntityQtype->SelectedValue = $this->objShortcut->EntityQtypeId;
			if ($this->lblEntityQtypeId) $this->lblEntityQtypeId->Text = ($this->objShortcut->EntityQtypeId) ? EntityQtype::$NameArray[$this->objShortcut->EntityQtypeId] : null;

			if ($this->chkCreateFlag) $this->chkCreateFlag->Checked = $this->objShortcut->CreateFlag;
			if ($this->lblCreateFlag) $this->lblCreateFlag->Text = ($this->objShortcut->CreateFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SHORTCUT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Shortcut instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveShortcut() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstModule) $this->objShortcut->ModuleId = $this->lstModule->SelectedValue;
				if ($this->lstAuthorization) $this->objShortcut->AuthorizationId = $this->lstAuthorization->SelectedValue;
				if ($this->lstTransactionType) $this->objShortcut->TransactionTypeId = $this->lstTransactionType->SelectedValue;
				if ($this->txtShortDescription) $this->objShortcut->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLink) $this->objShortcut->Link = $this->txtLink->Text;
				if ($this->txtImagePath) $this->objShortcut->ImagePath = $this->txtImagePath->Text;
				if ($this->lstEntityQtype) $this->objShortcut->EntityQtypeId = $this->lstEntityQtype->SelectedValue;
				if ($this->chkCreateFlag) $this->objShortcut->CreateFlag = $this->chkCreateFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Shortcut object
				$this->objShortcut->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Shortcut instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteShortcut() {
			$this->objShortcut->Delete();
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
				case 'Shortcut': return $this->objShortcut;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Shortcut fields -- will be created dynamically if not yet created
				case 'ShortcutIdControl':
					if (!$this->lblShortcutId) return $this->lblShortcutId_Create();
					return $this->lblShortcutId;
				case 'ShortcutIdLabel':
					if (!$this->lblShortcutId) return $this->lblShortcutId_Create();
					return $this->lblShortcutId;
				case 'ModuleIdControl':
					if (!$this->lstModule) return $this->lstModule_Create();
					return $this->lstModule;
				case 'ModuleIdLabel':
					if (!$this->lblModuleId) return $this->lblModuleId_Create();
					return $this->lblModuleId;
				case 'AuthorizationIdControl':
					if (!$this->lstAuthorization) return $this->lstAuthorization_Create();
					return $this->lstAuthorization;
				case 'AuthorizationIdLabel':
					if (!$this->lblAuthorizationId) return $this->lblAuthorizationId_Create();
					return $this->lblAuthorizationId;
				case 'TransactionTypeIdControl':
					if (!$this->lstTransactionType) return $this->lstTransactionType_Create();
					return $this->lstTransactionType;
				case 'TransactionTypeIdLabel':
					if (!$this->lblTransactionTypeId) return $this->lblTransactionTypeId_Create();
					return $this->lblTransactionTypeId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'LinkControl':
					if (!$this->txtLink) return $this->txtLink_Create();
					return $this->txtLink;
				case 'LinkLabel':
					if (!$this->lblLink) return $this->lblLink_Create();
					return $this->lblLink;
				case 'ImagePathControl':
					if (!$this->txtImagePath) return $this->txtImagePath_Create();
					return $this->txtImagePath;
				case 'ImagePathLabel':
					if (!$this->lblImagePath) return $this->lblImagePath_Create();
					return $this->lblImagePath;
				case 'EntityQtypeIdControl':
					if (!$this->lstEntityQtype) return $this->lstEntityQtype_Create();
					return $this->lstEntityQtype;
				case 'EntityQtypeIdLabel':
					if (!$this->lblEntityQtypeId) return $this->lblEntityQtypeId_Create();
					return $this->lblEntityQtypeId;
				case 'CreateFlagControl':
					if (!$this->chkCreateFlag) return $this->chkCreateFlag_Create();
					return $this->chkCreateFlag;
				case 'CreateFlagLabel':
					if (!$this->lblCreateFlag) return $this->lblCreateFlag_Create();
					return $this->lblCreateFlag;
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
					// Controls that point to Shortcut fields
					case 'ShortcutIdControl':
						return ($this->lblShortcutId = QType::Cast($mixValue, 'QControl'));
					case 'ModuleIdControl':
						return ($this->lstModule = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationIdControl':
						return ($this->lstAuthorization = QType::Cast($mixValue, 'QControl'));
					case 'TransactionTypeIdControl':
						return ($this->lstTransactionType = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LinkControl':
						return ($this->txtLink = QType::Cast($mixValue, 'QControl'));
					case 'ImagePathControl':
						return ($this->txtImagePath = QType::Cast($mixValue, 'QControl'));
					case 'EntityQtypeIdControl':
						return ($this->lstEntityQtype = QType::Cast($mixValue, 'QControl'));
					case 'CreateFlagControl':
						return ($this->chkCreateFlag = QType::Cast($mixValue, 'QControl'));
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