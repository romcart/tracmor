<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AssetModel class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AssetModel object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetModelMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AssetModel $AssetModel the actual AssetModel data class being edited
	 * property QLabel $AssetModelIdControl
	 * property-read QLabel $AssetModelIdLabel
	 * property QListBox $CategoryIdControl
	 * property-read QLabel $CategoryIdLabel
	 * property QListBox $ManufacturerIdControl
	 * property-read QLabel $ManufacturerIdLabel
	 * property QTextBox $AssetModelCodeControl
	 * property-read QLabel $AssetModelCodeLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QTextBox $ImagePathControl
	 * property-read QLabel $ImagePathLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $DepreciationClassIdControl
	 * property-read QLabel $DepreciationClassIdLabel
	 * property QListBox $AssetModelCustomFieldHelperControl
	 * property-read QLabel $AssetModelCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AssetModelMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AssetModel objAssetModel
		 * @access protected
		 */
		protected $objAssetModel;

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

		// Controls that allow the editing of AssetModel's individual data fields
        /**
         * @var QLabel lblAssetModelId;
         * @access protected
         */
		protected $lblAssetModelId;

        /**
         * @var QListBox lstCategory;
         * @access protected
         */
		protected $lstCategory;

        /**
         * @var QListBox lstManufacturer;
         * @access protected
         */
		protected $lstManufacturer;

        /**
         * @var QTextBox txtAssetModelCode;
         * @access protected
         */
		protected $txtAssetModelCode;

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

        /**
         * @var QListBox lstDepreciationClass;
         * @access protected
         */
		protected $lstDepreciationClass;


		// Controls that allow the viewing of AssetModel's individual data fields
        /**
         * @var QLabel lblCategoryId
         * @access protected
         */
		protected $lblCategoryId;

        /**
         * @var QLabel lblManufacturerId
         * @access protected
         */
		protected $lblManufacturerId;

        /**
         * @var QLabel lblAssetModelCode
         * @access protected
         */
		protected $lblAssetModelCode;

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

        /**
         * @var QLabel lblDepreciationClassId
         * @access protected
         */
		protected $lblDepreciationClassId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstAssetModelCustomFieldHelper
         * @access protected
         */
		protected $lstAssetModelCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblAssetModelCustomFieldHelper
         * @access protected
         */
		protected $lblAssetModelCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AssetModelMetaControl to edit a single AssetModel object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AssetModel object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelMetaControl
		 * @param AssetModel $objAssetModel new or existing AssetModel object
		 */
		 public function __construct($objParentObject, AssetModel $objAssetModel) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetModelMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AssetModel object
			$this->objAssetModel = $objAssetModel;

			// Figure out if we're Editing or Creating New
			if ($this->objAssetModel->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelMetaControl
		 * @param integer $intAssetModelId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AssetModel object creation - defaults to CreateOrEdit
 		 * @return AssetModelMetaControl
		 */
		public static function Create($objParentObject, $intAssetModelId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetModelId)) {
				$objAssetModel = AssetModel::Load($intAssetModelId);

				// AssetModel was found -- return it!
				if ($objAssetModel)
					return new AssetModelMetaControl($objParentObject, $objAssetModel);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AssetModel object with PK arguments: ' . $intAssetModelId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetModelMetaControl($objParentObject, new AssetModel());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetModel object creation - defaults to CreateOrEdit
		 * @return AssetModelMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetModelId = QApplication::PathInfo(0);
			return AssetModelMetaControl::Create($objParentObject, $intAssetModelId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetModel object creation - defaults to CreateOrEdit
		 * @return AssetModelMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetModelId = QApplication::QueryString('intAssetModelId');
			return AssetModelMetaControl::Create($objParentObject, $intAssetModelId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAssetModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetModelId_Create($strControlId = null) {
			$this->lblAssetModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetModelId->Name = QApplication::Translate('Asset Model Id');
			if ($this->blnEditMode)
				$this->lblAssetModelId->Text = $this->objAssetModel->AssetModelId;
			else
				$this->lblAssetModelId->Text = 'N/A';
			return $this->lblAssetModelId;
		}

		/**
		 * Create and setup QListBox lstCategory
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCategory_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstCategory->Name = QApplication::Translate('Category');
			$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCategoryCursor = Category::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCategory = Category::InstantiateCursor($objCategoryCursor)) {
				$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
				if (($this->objAssetModel->Category) && ($this->objAssetModel->Category->CategoryId == $objCategory->CategoryId))
					$objListItem->Selected = true;
				$this->lstCategory->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCategory;
		}

		/**
		 * Create and setup QLabel lblCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategoryId_Create($strControlId = null) {
			$this->lblCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategoryId->Name = QApplication::Translate('Category');
			$this->lblCategoryId->Text = ($this->objAssetModel->Category) ? $this->objAssetModel->Category->__toString() : null;
			return $this->lblCategoryId;
		}

		/**
		 * Create and setup QListBox lstManufacturer
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstManufacturer_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstManufacturer = new QListBox($this->objParentObject, $strControlId);
			$this->lstManufacturer->Name = QApplication::Translate('Manufacturer');
			$this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objManufacturerCursor = Manufacturer::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objManufacturer = Manufacturer::InstantiateCursor($objManufacturerCursor)) {
				$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
				if (($this->objAssetModel->Manufacturer) && ($this->objAssetModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
					$objListItem->Selected = true;
				$this->lstManufacturer->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstManufacturer;
		}

		/**
		 * Create and setup QLabel lblManufacturerId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblManufacturerId_Create($strControlId = null) {
			$this->lblManufacturerId = new QLabel($this->objParentObject, $strControlId);
			$this->lblManufacturerId->Name = QApplication::Translate('Manufacturer');
			$this->lblManufacturerId->Text = ($this->objAssetModel->Manufacturer) ? $this->objAssetModel->Manufacturer->__toString() : null;
			return $this->lblManufacturerId;
		}

		/**
		 * Create and setup QTextBox txtAssetModelCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAssetModelCode_Create($strControlId = null) {
			$this->txtAssetModelCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAssetModelCode->Name = QApplication::Translate('Asset Model Code');
			$this->txtAssetModelCode->Text = $this->objAssetModel->AssetModelCode;
			$this->txtAssetModelCode->MaxLength = AssetModel::AssetModelCodeMaxLength;
			return $this->txtAssetModelCode;
		}

		/**
		 * Create and setup QLabel lblAssetModelCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetModelCode_Create($strControlId = null) {
			$this->lblAssetModelCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetModelCode->Name = QApplication::Translate('Asset Model Code');
			$this->lblAssetModelCode->Text = $this->objAssetModel->AssetModelCode;
			return $this->lblAssetModelCode;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAssetModel->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = AssetModel::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objAssetModel->ShortDescription;
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
			$this->txtLongDescription->Text = $this->objAssetModel->LongDescription;
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
			$this->lblLongDescription->Text = $this->objAssetModel->LongDescription;
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
			$this->txtImagePath->Text = $this->objAssetModel->ImagePath;
			$this->txtImagePath->MaxLength = AssetModel::ImagePathMaxLength;
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
			$this->lblImagePath->Text = $this->objAssetModel->ImagePath;
			return $this->lblImagePath;
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
				if (($this->objAssetModel->CreatedByObject) && ($this->objAssetModel->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objAssetModel->CreatedByObject) ? $this->objAssetModel->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objAssetModel->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objAssetModel->CreationDate) ? $this->objAssetModel->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objAssetModel->ModifiedByObject) && ($this->objAssetModel->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objAssetModel->ModifiedByObject) ? $this->objAssetModel->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objAssetModel->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstDepreciationClass
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDepreciationClass_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDepreciationClass = new QListBox($this->objParentObject, $strControlId);
			$this->lstDepreciationClass->Name = QApplication::Translate('Depreciation Class');
			$this->lstDepreciationClass->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDepreciationClassCursor = DepreciationClass::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDepreciationClass = DepreciationClass::InstantiateCursor($objDepreciationClassCursor)) {
				$objListItem = new QListItem($objDepreciationClass->__toString(), $objDepreciationClass->DepreciationClassId);
				if (($this->objAssetModel->DepreciationClass) && ($this->objAssetModel->DepreciationClass->DepreciationClassId == $objDepreciationClass->DepreciationClassId))
					$objListItem->Selected = true;
				$this->lstDepreciationClass->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDepreciationClass;
		}

		/**
		 * Create and setup QLabel lblDepreciationClassId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDepreciationClassId_Create($strControlId = null) {
			$this->lblDepreciationClassId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDepreciationClassId->Name = QApplication::Translate('Depreciation Class');
			$this->lblDepreciationClassId->Text = ($this->objAssetModel->DepreciationClass) ? $this->objAssetModel->DepreciationClass->__toString() : null;
			return $this->lblDepreciationClassId;
		}

		/**
		 * Create and setup QListBox lstAssetModelCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssetModelCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssetModelCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssetModelCustomFieldHelper->Name = QApplication::Translate('Asset Model Custom Field Helper');
			$this->lstAssetModelCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetModelCustomFieldHelperCursor = AssetModelCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssetModelCustomFieldHelper = AssetModelCustomFieldHelper::InstantiateCursor($objAssetModelCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objAssetModelCustomFieldHelper->__toString(), $objAssetModelCustomFieldHelper->AssetModelId);
				if ($objAssetModelCustomFieldHelper->AssetModelId == $this->objAssetModel->AssetModelId)
					$objListItem->Selected = true;
				$this->lstAssetModelCustomFieldHelper->AddItem($objListItem);
			}

			// Because AssetModelCustomFieldHelper's AssetModelCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAssetModelCustomFieldHelper->SelectedValue)
				$this->lstAssetModelCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstAssetModelCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblAssetModelCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetModelCustomFieldHelper_Create($strControlId = null) {
			$this->lblAssetModelCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetModelCustomFieldHelper->Name = QApplication::Translate('Asset Model Custom Field Helper');
			$this->lblAssetModelCustomFieldHelper->Text = ($this->objAssetModel->AssetModelCustomFieldHelper) ? $this->objAssetModel->AssetModelCustomFieldHelper->__toString() : null;
			return $this->lblAssetModelCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local AssetModel object.
		 * @param boolean $blnReload reload AssetModel from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAssetModel->Reload();

			if ($this->lblAssetModelId) if ($this->blnEditMode) $this->lblAssetModelId->Text = $this->objAssetModel->AssetModelId;

			if ($this->lstCategory) {
					$this->lstCategory->RemoveAllItems();
				$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objCategoryArray = Category::LoadAll();
				if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
					$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
					if (($this->objAssetModel->Category) && ($this->objAssetModel->Category->CategoryId == $objCategory->CategoryId))
						$objListItem->Selected = true;
					$this->lstCategory->AddItem($objListItem);
				}
			}
			if ($this->lblCategoryId) $this->lblCategoryId->Text = ($this->objAssetModel->Category) ? $this->objAssetModel->Category->__toString() : null;

			if ($this->lstManufacturer) {
					$this->lstManufacturer->RemoveAllItems();
				$this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);
				$objManufacturerArray = Manufacturer::LoadAll();
				if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
					$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
					if (($this->objAssetModel->Manufacturer) && ($this->objAssetModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
						$objListItem->Selected = true;
					$this->lstManufacturer->AddItem($objListItem);
				}
			}
			if ($this->lblManufacturerId) $this->lblManufacturerId->Text = ($this->objAssetModel->Manufacturer) ? $this->objAssetModel->Manufacturer->__toString() : null;

			if ($this->txtAssetModelCode) $this->txtAssetModelCode->Text = $this->objAssetModel->AssetModelCode;
			if ($this->lblAssetModelCode) $this->lblAssetModelCode->Text = $this->objAssetModel->AssetModelCode;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objAssetModel->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objAssetModel->ShortDescription;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objAssetModel->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objAssetModel->LongDescription;

			if ($this->txtImagePath) $this->txtImagePath->Text = $this->objAssetModel->ImagePath;
			if ($this->lblImagePath) $this->lblImagePath->Text = $this->objAssetModel->ImagePath;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objAssetModel->CreatedByObject) && ($this->objAssetModel->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objAssetModel->CreatedByObject) ? $this->objAssetModel->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objAssetModel->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objAssetModel->CreationDate) ? $this->objAssetModel->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objAssetModel->ModifiedByObject) && ($this->objAssetModel->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objAssetModel->ModifiedByObject) ? $this->objAssetModel->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objAssetModel->ModifiedDate;

			if ($this->lstDepreciationClass) {
					$this->lstDepreciationClass->RemoveAllItems();
				$this->lstDepreciationClass->AddItem(QApplication::Translate('- Select One -'), null);
				$objDepreciationClassArray = DepreciationClass::LoadAll();
				if ($objDepreciationClassArray) foreach ($objDepreciationClassArray as $objDepreciationClass) {
					$objListItem = new QListItem($objDepreciationClass->__toString(), $objDepreciationClass->DepreciationClassId);
					if (($this->objAssetModel->DepreciationClass) && ($this->objAssetModel->DepreciationClass->DepreciationClassId == $objDepreciationClass->DepreciationClassId))
						$objListItem->Selected = true;
					$this->lstDepreciationClass->AddItem($objListItem);
				}
			}
			if ($this->lblDepreciationClassId) $this->lblDepreciationClassId->Text = ($this->objAssetModel->DepreciationClass) ? $this->objAssetModel->DepreciationClass->__toString() : null;

			if ($this->lstAssetModelCustomFieldHelper) {
				$this->lstAssetModelCustomFieldHelper->RemoveAllItems();
				$this->lstAssetModelCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetModelCustomFieldHelperArray = AssetModelCustomFieldHelper::LoadAll();
				if ($objAssetModelCustomFieldHelperArray) foreach ($objAssetModelCustomFieldHelperArray as $objAssetModelCustomFieldHelper) {
					$objListItem = new QListItem($objAssetModelCustomFieldHelper->__toString(), $objAssetModelCustomFieldHelper->AssetModelId);
					if ($objAssetModelCustomFieldHelper->AssetModelId == $this->objAssetModel->AssetModelId)
						$objListItem->Selected = true;
					$this->lstAssetModelCustomFieldHelper->AddItem($objListItem);
				}
				// Because AssetModelCustomFieldHelper's AssetModelCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstAssetModelCustomFieldHelper->SelectedValue)
					$this->lstAssetModelCustomFieldHelper->Enabled = false;
				else
					$this->lstAssetModelCustomFieldHelper->Enabled = true;
			}
			if ($this->lblAssetModelCustomFieldHelper) $this->lblAssetModelCustomFieldHelper->Text = ($this->objAssetModel->AssetModelCustomFieldHelper) ? $this->objAssetModel->AssetModelCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSETMODEL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AssetModel instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAssetModel() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCategory) $this->objAssetModel->CategoryId = $this->lstCategory->SelectedValue;
				if ($this->lstManufacturer) $this->objAssetModel->ManufacturerId = $this->lstManufacturer->SelectedValue;
				if ($this->txtAssetModelCode) $this->objAssetModel->AssetModelCode = $this->txtAssetModelCode->Text;
				if ($this->txtShortDescription) $this->objAssetModel->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLongDescription) $this->objAssetModel->LongDescription = $this->txtLongDescription->Text;
				if ($this->txtImagePath) $this->objAssetModel->ImagePath = $this->txtImagePath->Text;
				if ($this->lstCreatedByObject) $this->objAssetModel->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objAssetModel->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objAssetModel->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
				if ($this->lstDepreciationClass) $this->objAssetModel->DepreciationClassId = $this->lstDepreciationClass->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstAssetModelCustomFieldHelper) $this->objAssetModel->AssetModelCustomFieldHelper = AssetModelCustomFieldHelper::Load($this->lstAssetModelCustomFieldHelper->SelectedValue);

				// Save the AssetModel object
				$this->objAssetModel->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AssetModel instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAssetModel() {
			$this->objAssetModel->Delete();
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
				case 'AssetModel': return $this->objAssetModel;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AssetModel fields -- will be created dynamically if not yet created
				case 'AssetModelIdControl':
					if (!$this->lblAssetModelId) return $this->lblAssetModelId_Create();
					return $this->lblAssetModelId;
				case 'AssetModelIdLabel':
					if (!$this->lblAssetModelId) return $this->lblAssetModelId_Create();
					return $this->lblAssetModelId;
				case 'CategoryIdControl':
					if (!$this->lstCategory) return $this->lstCategory_Create();
					return $this->lstCategory;
				case 'CategoryIdLabel':
					if (!$this->lblCategoryId) return $this->lblCategoryId_Create();
					return $this->lblCategoryId;
				case 'ManufacturerIdControl':
					if (!$this->lstManufacturer) return $this->lstManufacturer_Create();
					return $this->lstManufacturer;
				case 'ManufacturerIdLabel':
					if (!$this->lblManufacturerId) return $this->lblManufacturerId_Create();
					return $this->lblManufacturerId;
				case 'AssetModelCodeControl':
					if (!$this->txtAssetModelCode) return $this->txtAssetModelCode_Create();
					return $this->txtAssetModelCode;
				case 'AssetModelCodeLabel':
					if (!$this->lblAssetModelCode) return $this->lblAssetModelCode_Create();
					return $this->lblAssetModelCode;
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
				case 'DepreciationClassIdControl':
					if (!$this->lstDepreciationClass) return $this->lstDepreciationClass_Create();
					return $this->lstDepreciationClass;
				case 'DepreciationClassIdLabel':
					if (!$this->lblDepreciationClassId) return $this->lblDepreciationClassId_Create();
					return $this->lblDepreciationClassId;
				case 'AssetModelCustomFieldHelperControl':
					if (!$this->lstAssetModelCustomFieldHelper) return $this->lstAssetModelCustomFieldHelper_Create();
					return $this->lstAssetModelCustomFieldHelper;
				case 'AssetModelCustomFieldHelperLabel':
					if (!$this->lblAssetModelCustomFieldHelper) return $this->lblAssetModelCustomFieldHelper_Create();
					return $this->lblAssetModelCustomFieldHelper;
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
					// Controls that point to AssetModel fields
					case 'AssetModelIdControl':
						return ($this->lblAssetModelId = QType::Cast($mixValue, 'QControl'));
					case 'CategoryIdControl':
						return ($this->lstCategory = QType::Cast($mixValue, 'QControl'));
					case 'ManufacturerIdControl':
						return ($this->lstManufacturer = QType::Cast($mixValue, 'QControl'));
					case 'AssetModelCodeControl':
						return ($this->txtAssetModelCode = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'ImagePathControl':
						return ($this->txtImagePath = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'DepreciationClassIdControl':
						return ($this->lstDepreciationClass = QType::Cast($mixValue, 'QControl'));
					case 'AssetModelCustomFieldHelperControl':
						return ($this->lstAssetModelCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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