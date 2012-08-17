<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Category class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Category object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CategoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Category $Category the actual Category data class being edited
	 * property QLabel $CategoryIdControl
	 * property-read QLabel $CategoryIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QTextBox $ImagePathControl
	 * property-read QLabel $ImagePathLabel
	 * property QCheckBox $AssetFlagControl
	 * property-read QLabel $AssetFlagLabel
	 * property QCheckBox $InventoryFlagControl
	 * property-read QLabel $InventoryFlagLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $CategoryCustomFieldHelperControl
	 * property-read QLabel $CategoryCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CategoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Category objCategory
		 * @access protected
		 */
		protected $objCategory;

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

		// Controls that allow the editing of Category's individual data fields
        /**
         * @var QLabel lblCategoryId;
         * @access protected
         */
		protected $lblCategoryId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtLongDescription;
         * @access protected
         */
		protected $txtLongDescription;

        /**
         * @var QTextBox txtImagePath;
         * @access protected
         */
		protected $txtImagePath;

        /**
         * @var QCheckBox chkAssetFlag;
         * @access protected
         */
		protected $chkAssetFlag;

        /**
         * @var QCheckBox chkInventoryFlag;
         * @access protected
         */
		protected $chkInventoryFlag;

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


		// Controls that allow the viewing of Category's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblLongDescription
         * @access protected
         */
		protected $lblLongDescription;

        /**
         * @var QLabel lblImagePath
         * @access protected
         */
		protected $lblImagePath;

        /**
         * @var QLabel lblAssetFlag
         * @access protected
         */
		protected $lblAssetFlag;

        /**
         * @var QLabel lblInventoryFlag
         * @access protected
         */
		protected $lblInventoryFlag;

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
         * @var QListBox lstCategoryCustomFieldHelper
         * @access protected
         */
		protected $lstCategoryCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblCategoryCustomFieldHelper
         * @access protected
         */
		protected $lblCategoryCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CategoryMetaControl to edit a single Category object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Category object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param Category $objCategory new or existing Category object
		 */
		 public function __construct($objParentObject, Category $objCategory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CategoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Category object
			$this->objCategory = $objCategory;

			// Figure out if we're Editing or Creating New
			if ($this->objCategory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param integer $intCategoryId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Category object creation - defaults to CreateOrEdit
 		 * @return CategoryMetaControl
		 */
		public static function Create($objParentObject, $intCategoryId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCategoryId)) {
				$objCategory = Category::Load($intCategoryId);

				// Category was found -- return it!
				if ($objCategory)
					return new CategoryMetaControl($objParentObject, $objCategory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Category object with PK arguments: ' . $intCategoryId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CategoryMetaControl($objParentObject, new Category());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Category object creation - defaults to CreateOrEdit
		 * @return CategoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCategoryId = QApplication::PathInfo(0);
			return CategoryMetaControl::Create($objParentObject, $intCategoryId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Category object creation - defaults to CreateOrEdit
		 * @return CategoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCategoryId = QApplication::QueryString('intCategoryId');
			return CategoryMetaControl::Create($objParentObject, $intCategoryId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategoryId_Create($strControlId = null) {
			$this->lblCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategoryId->Name = QApplication::Translate('Category Id');
			if ($this->blnEditMode)
				$this->lblCategoryId->Text = $this->objCategory->CategoryId;
			else
				$this->lblCategoryId->Text = 'N/A';
			return $this->lblCategoryId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCategory->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Category::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objCategory->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLongDescription_Create($strControlId = null) {
			$this->txtLongDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objCategory->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
			return $this->txtLongDescription;
		}

		/**
		 * Create and setup QLabel lblLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLongDescription_Create($strControlId = null) {
			$this->lblLongDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblLongDescription->Name = QApplication::Translate('Long Description');
			$this->lblLongDescription->Text = $this->objCategory->LongDescription;
			return $this->lblLongDescription;
		}

		/**
		 * Create and setup QTextBox txtImagePath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtImagePath_Create($strControlId = null) {
			$this->txtImagePath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objCategory->ImagePath;
			$this->txtImagePath->MaxLength = Category::ImagePathMaxLength;
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
			$this->lblImagePath->Text = $this->objCategory->ImagePath;
			return $this->lblImagePath;
		}

		/**
		 * Create and setup QCheckBox chkAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAssetFlag_Create($strControlId = null) {
			$this->chkAssetFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->chkAssetFlag->Checked = $this->objCategory->AssetFlag;
			return $this->chkAssetFlag;
		}

		/**
		 * Create and setup QLabel lblAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetFlag_Create($strControlId = null) {
			$this->lblAssetFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->lblAssetFlag->Text = ($this->objCategory->AssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAssetFlag;
		}

		/**
		 * Create and setup QCheckBox chkInventoryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInventoryFlag_Create($strControlId = null) {
			$this->chkInventoryFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->chkInventoryFlag->Checked = $this->objCategory->InventoryFlag;
			return $this->chkInventoryFlag;
		}

		/**
		 * Create and setup QLabel lblInventoryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryFlag_Create($strControlId = null) {
			$this->lblInventoryFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->lblInventoryFlag->Text = ($this->objCategory->InventoryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInventoryFlag;
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
				if (($this->objCategory->CreatedByObject) && ($this->objCategory->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objCategory->CreatedByObject) ? $this->objCategory->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objCategory->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objCategory->CreationDate) ? $this->objCategory->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objCategory->ModifiedByObject) && ($this->objCategory->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objCategory->ModifiedByObject) ? $this->objCategory->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objCategory->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstCategoryCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCategoryCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCategoryCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstCategoryCustomFieldHelper->Name = QApplication::Translate('Category Custom Field Helper');
			$this->lstCategoryCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCategoryCustomFieldHelperCursor = CategoryCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCategoryCustomFieldHelper = CategoryCustomFieldHelper::InstantiateCursor($objCategoryCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objCategoryCustomFieldHelper->__toString(), $objCategoryCustomFieldHelper->CategoryId);
				if ($objCategoryCustomFieldHelper->CategoryId == $this->objCategory->CategoryId)
					$objListItem->Selected = true;
				$this->lstCategoryCustomFieldHelper->AddItem($objListItem);
			}

			// Because CategoryCustomFieldHelper's CategoryCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstCategoryCustomFieldHelper->SelectedValue)
				$this->lstCategoryCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstCategoryCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblCategoryCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategoryCustomFieldHelper_Create($strControlId = null) {
			$this->lblCategoryCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategoryCustomFieldHelper->Name = QApplication::Translate('Category Custom Field Helper');
			$this->lblCategoryCustomFieldHelper->Text = ($this->objCategory->CategoryCustomFieldHelper) ? $this->objCategory->CategoryCustomFieldHelper->__toString() : null;
			return $this->lblCategoryCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Category object.
		 * @param boolean $blnReload reload Category from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCategory->Reload();

			if ($this->lblCategoryId) if ($this->blnEditMode) $this->lblCategoryId->Text = $this->objCategory->CategoryId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objCategory->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objCategory->ShortDescription;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objCategory->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objCategory->LongDescription;

			if ($this->txtImagePath) $this->txtImagePath->Text = $this->objCategory->ImagePath;
			if ($this->lblImagePath) $this->lblImagePath->Text = $this->objCategory->ImagePath;

			if ($this->chkAssetFlag) $this->chkAssetFlag->Checked = $this->objCategory->AssetFlag;
			if ($this->lblAssetFlag) $this->lblAssetFlag->Text = ($this->objCategory->AssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkInventoryFlag) $this->chkInventoryFlag->Checked = $this->objCategory->InventoryFlag;
			if ($this->lblInventoryFlag) $this->lblInventoryFlag->Text = ($this->objCategory->InventoryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objCategory->CreatedByObject) && ($this->objCategory->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objCategory->CreatedByObject) ? $this->objCategory->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objCategory->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objCategory->CreationDate) ? $this->objCategory->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objCategory->ModifiedByObject) && ($this->objCategory->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objCategory->ModifiedByObject) ? $this->objCategory->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objCategory->ModifiedDate;

			if ($this->lstCategoryCustomFieldHelper) {
				$this->lstCategoryCustomFieldHelper->RemoveAllItems();
				$this->lstCategoryCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objCategoryCustomFieldHelperArray = CategoryCustomFieldHelper::LoadAll();
				if ($objCategoryCustomFieldHelperArray) foreach ($objCategoryCustomFieldHelperArray as $objCategoryCustomFieldHelper) {
					$objListItem = new QListItem($objCategoryCustomFieldHelper->__toString(), $objCategoryCustomFieldHelper->CategoryId);
					if ($objCategoryCustomFieldHelper->CategoryId == $this->objCategory->CategoryId)
						$objListItem->Selected = true;
					$this->lstCategoryCustomFieldHelper->AddItem($objListItem);
				}
				// Because CategoryCustomFieldHelper's CategoryCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstCategoryCustomFieldHelper->SelectedValue)
					$this->lstCategoryCustomFieldHelper->Enabled = false;
				else
					$this->lstCategoryCustomFieldHelper->Enabled = true;
			}
			if ($this->lblCategoryCustomFieldHelper) $this->lblCategoryCustomFieldHelper->Text = ($this->objCategory->CategoryCustomFieldHelper) ? $this->objCategory->CategoryCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CATEGORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Category instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCategory() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objCategory->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLongDescription) $this->objCategory->LongDescription = $this->txtLongDescription->Text;
				if ($this->txtImagePath) $this->objCategory->ImagePath = $this->txtImagePath->Text;
				if ($this->chkAssetFlag) $this->objCategory->AssetFlag = $this->chkAssetFlag->Checked;
				if ($this->chkInventoryFlag) $this->objCategory->InventoryFlag = $this->chkInventoryFlag->Checked;
				if ($this->lstCreatedByObject) $this->objCategory->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objCategory->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objCategory->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstCategoryCustomFieldHelper) $this->objCategory->CategoryCustomFieldHelper = CategoryCustomFieldHelper::Load($this->lstCategoryCustomFieldHelper->SelectedValue);

				// Save the Category object
				$this->objCategory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Category instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCategory() {
			$this->objCategory->Delete();
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
				case 'Category': return $this->objCategory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Category fields -- will be created dynamically if not yet created
				case 'CategoryIdControl':
					if (!$this->lblCategoryId) return $this->lblCategoryId_Create();
					return $this->lblCategoryId;
				case 'CategoryIdLabel':
					if (!$this->lblCategoryId) return $this->lblCategoryId_Create();
					return $this->lblCategoryId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'LongDescriptionControl':
					if (!$this->txtLongDescription) return $this->txtLongDescription_Create();
					return $this->txtLongDescription;
				case 'LongDescriptionLabel':
					if (!$this->lblLongDescription) return $this->lblLongDescription_Create();
					return $this->lblLongDescription;
				case 'ImagePathControl':
					if (!$this->txtImagePath) return $this->txtImagePath_Create();
					return $this->txtImagePath;
				case 'ImagePathLabel':
					if (!$this->lblImagePath) return $this->lblImagePath_Create();
					return $this->lblImagePath;
				case 'AssetFlagControl':
					if (!$this->chkAssetFlag) return $this->chkAssetFlag_Create();
					return $this->chkAssetFlag;
				case 'AssetFlagLabel':
					if (!$this->lblAssetFlag) return $this->lblAssetFlag_Create();
					return $this->lblAssetFlag;
				case 'InventoryFlagControl':
					if (!$this->chkInventoryFlag) return $this->chkInventoryFlag_Create();
					return $this->chkInventoryFlag;
				case 'InventoryFlagLabel':
					if (!$this->lblInventoryFlag) return $this->lblInventoryFlag_Create();
					return $this->lblInventoryFlag;
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
				case 'CategoryCustomFieldHelperControl':
					if (!$this->lstCategoryCustomFieldHelper) return $this->lstCategoryCustomFieldHelper_Create();
					return $this->lstCategoryCustomFieldHelper;
				case 'CategoryCustomFieldHelperLabel':
					if (!$this->lblCategoryCustomFieldHelper) return $this->lblCategoryCustomFieldHelper_Create();
					return $this->lblCategoryCustomFieldHelper;
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
					// Controls that point to Category fields
					case 'CategoryIdControl':
						return ($this->lblCategoryId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'ImagePathControl':
						return ($this->txtImagePath = QType::Cast($mixValue, 'QControl'));
					case 'AssetFlagControl':
						return ($this->chkAssetFlag = QType::Cast($mixValue, 'QControl'));
					case 'InventoryFlagControl':
						return ($this->chkInventoryFlag = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'CategoryCustomFieldHelperControl':
						return ($this->lstCategoryCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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