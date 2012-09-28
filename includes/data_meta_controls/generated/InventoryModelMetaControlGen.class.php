<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the InventoryModel class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single InventoryModel object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a InventoryModelMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read InventoryModel $InventoryModel the actual InventoryModel data class being edited
	 * property QLabel $InventoryModelIdControl
	 * property-read QLabel $InventoryModelIdLabel
	 * property QListBox $CategoryIdControl
	 * property-read QLabel $CategoryIdLabel
	 * property QListBox $ManufacturerIdControl
	 * property-read QLabel $ManufacturerIdLabel
	 * property QTextBox $InventoryModelCodeControl
	 * property-read QLabel $InventoryModelCodeLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QTextBox $ImagePathControl
	 * property-read QLabel $ImagePathLabel
	 * property QFloatTextBox $PriceControl
	 * property-read QLabel $PriceLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $InventoryModelCustomFieldHelperControl
	 * property-read QLabel $InventoryModelCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class InventoryModelMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var InventoryModel objInventoryModel
		 * @access protected
		 */
		protected $objInventoryModel;

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

		// Controls that allow the editing of InventoryModel's individual data fields
        /**
         * @var QLabel lblInventoryModelId;
         * @access protected
         */
		protected $lblInventoryModelId;

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
         * @var QTextBox txtInventoryModelCode;
         * @access protected
         */
		protected $txtInventoryModelCode;

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
         * @var QFloatTextBox txtPrice;
         * @access protected
         */
		protected $txtPrice;

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


		// Controls that allow the viewing of InventoryModel's individual data fields
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
         * @var QLabel lblInventoryModelCode
         * @access protected
         */
		protected $lblInventoryModelCode;

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
         * @var QLabel lblPrice
         * @access protected
         */
		protected $lblPrice;

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
         * @var QListBox lstInventoryModelCustomFieldHelper
         * @access protected
         */
		protected $lstInventoryModelCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblInventoryModelCustomFieldHelper
         * @access protected
         */
		protected $lblInventoryModelCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * InventoryModelMetaControl to edit a single InventoryModel object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single InventoryModel object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelMetaControl
		 * @param InventoryModel $objInventoryModel new or existing InventoryModel object
		 */
		 public function __construct($objParentObject, InventoryModel $objInventoryModel) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this InventoryModelMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked InventoryModel object
			$this->objInventoryModel = $objInventoryModel;

			// Figure out if we're Editing or Creating New
			if ($this->objInventoryModel->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelMetaControl
		 * @param integer $intInventoryModelId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryModel object creation - defaults to CreateOrEdit
 		 * @return InventoryModelMetaControl
		 */
		public static function Create($objParentObject, $intInventoryModelId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intInventoryModelId)) {
				$objInventoryModel = InventoryModel::Load($intInventoryModelId);

				// InventoryModel was found -- return it!
				if ($objInventoryModel)
					return new InventoryModelMetaControl($objParentObject, $objInventoryModel);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a InventoryModel object with PK arguments: ' . $intInventoryModelId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new InventoryModelMetaControl($objParentObject, new InventoryModel());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryModel object creation - defaults to CreateOrEdit
		 * @return InventoryModelMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryModelId = QApplication::PathInfo(0);
			return InventoryModelMetaControl::Create($objParentObject, $intInventoryModelId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryModel object creation - defaults to CreateOrEdit
		 * @return InventoryModelMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryModelId = QApplication::QueryString('intInventoryModelId');
			return InventoryModelMetaControl::Create($objParentObject, $intInventoryModelId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblInventoryModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryModelId_Create($strControlId = null) {
			$this->lblInventoryModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryModelId->Name = QApplication::Translate('Inventory Model Id');
			if ($this->blnEditMode)
				$this->lblInventoryModelId->Text = $this->objInventoryModel->InventoryModelId;
			else
				$this->lblInventoryModelId->Text = 'N/A';
			return $this->lblInventoryModelId;
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
				if (($this->objInventoryModel->Category) && ($this->objInventoryModel->Category->CategoryId == $objCategory->CategoryId))
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
			$this->lblCategoryId->Text = ($this->objInventoryModel->Category) ? $this->objInventoryModel->Category->__toString() : null;
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
				if (($this->objInventoryModel->Manufacturer) && ($this->objInventoryModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
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
			$this->lblManufacturerId->Text = ($this->objInventoryModel->Manufacturer) ? $this->objInventoryModel->Manufacturer->__toString() : null;
			return $this->lblManufacturerId;
		}

		/**
		 * Create and setup QTextBox txtInventoryModelCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtInventoryModelCode_Create($strControlId = null) {
			$this->txtInventoryModelCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtInventoryModelCode->Name = QApplication::Translate('Inventory Model Code');
			$this->txtInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
			$this->txtInventoryModelCode->Required = true;
			$this->txtInventoryModelCode->MaxLength = InventoryModel::InventoryModelCodeMaxLength;
			return $this->txtInventoryModelCode;
		}

		/**
		 * Create and setup QLabel lblInventoryModelCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryModelCode_Create($strControlId = null) {
			$this->lblInventoryModelCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryModelCode->Name = QApplication::Translate('Inventory Model Code');
			$this->lblInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
			$this->lblInventoryModelCode->Required = true;
			return $this->lblInventoryModelCode;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objInventoryModel->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = InventoryModel::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objInventoryModel->ShortDescription;
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
			$this->txtLongDescription->Text = $this->objInventoryModel->LongDescription;
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
			$this->lblLongDescription->Text = $this->objInventoryModel->LongDescription;
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
			$this->txtImagePath->Text = $this->objInventoryModel->ImagePath;
			$this->txtImagePath->MaxLength = InventoryModel::ImagePathMaxLength;
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
			$this->lblImagePath->Text = $this->objInventoryModel->ImagePath;
			return $this->lblImagePath;
		}

		/**
		 * Create and setup QFloatTextBox txtPrice
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtPrice_Create($strControlId = null) {
			$this->txtPrice = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtPrice->Name = QApplication::Translate('Price');
			$this->txtPrice->Text = $this->objInventoryModel->Price;
			return $this->txtPrice;
		}

		/**
		 * Create and setup QLabel lblPrice
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPrice_Create($strControlId = null, $strFormat = null) {
			$this->lblPrice = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrice->Name = QApplication::Translate('Price');
			$this->lblPrice->Text = $this->objInventoryModel->Price;
			$this->lblPrice->Format = $strFormat;
			return $this->lblPrice;
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
				if (($this->objInventoryModel->CreatedByObject) && ($this->objInventoryModel->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objInventoryModel->CreatedByObject) ? $this->objInventoryModel->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objInventoryModel->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objInventoryModel->CreationDate) ? $this->objInventoryModel->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objInventoryModel->ModifiedByObject) && ($this->objInventoryModel->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objInventoryModel->ModifiedByObject) ? $this->objInventoryModel->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objInventoryModel->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstInventoryModelCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstInventoryModelCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstInventoryModelCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstInventoryModelCustomFieldHelper->Name = QApplication::Translate('Inventory Model Custom Field Helper');
			$this->lstInventoryModelCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objInventoryModelCustomFieldHelperCursor = InventoryModelCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objInventoryModelCustomFieldHelper = InventoryModelCustomFieldHelper::InstantiateCursor($objInventoryModelCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objInventoryModelCustomFieldHelper->__toString(), $objInventoryModelCustomFieldHelper->InventoryModelId);
				if ($objInventoryModelCustomFieldHelper->InventoryModelId == $this->objInventoryModel->InventoryModelId)
					$objListItem->Selected = true;
				$this->lstInventoryModelCustomFieldHelper->AddItem($objListItem);
			}

			// Because InventoryModelCustomFieldHelper's InventoryModelCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstInventoryModelCustomFieldHelper->SelectedValue)
				$this->lstInventoryModelCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstInventoryModelCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblInventoryModelCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryModelCustomFieldHelper_Create($strControlId = null) {
			$this->lblInventoryModelCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryModelCustomFieldHelper->Name = QApplication::Translate('Inventory Model Custom Field Helper');
			$this->lblInventoryModelCustomFieldHelper->Text = ($this->objInventoryModel->InventoryModelCustomFieldHelper) ? $this->objInventoryModel->InventoryModelCustomFieldHelper->__toString() : null;
			return $this->lblInventoryModelCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local InventoryModel object.
		 * @param boolean $blnReload reload InventoryModel from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objInventoryModel->Reload();

			if ($this->lblInventoryModelId) if ($this->blnEditMode) $this->lblInventoryModelId->Text = $this->objInventoryModel->InventoryModelId;

			if ($this->lstCategory) {
					$this->lstCategory->RemoveAllItems();
				$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objCategoryArray = Category::LoadAll();
				if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
					$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
					if (($this->objInventoryModel->Category) && ($this->objInventoryModel->Category->CategoryId == $objCategory->CategoryId))
						$objListItem->Selected = true;
					$this->lstCategory->AddItem($objListItem);
				}
			}
			if ($this->lblCategoryId) $this->lblCategoryId->Text = ($this->objInventoryModel->Category) ? $this->objInventoryModel->Category->__toString() : null;

			if ($this->lstManufacturer) {
					$this->lstManufacturer->RemoveAllItems();
				$this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);
				$objManufacturerArray = Manufacturer::LoadAll();
				if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
					$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
					if (($this->objInventoryModel->Manufacturer) && ($this->objInventoryModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
						$objListItem->Selected = true;
					$this->lstManufacturer->AddItem($objListItem);
				}
			}
			if ($this->lblManufacturerId) $this->lblManufacturerId->Text = ($this->objInventoryModel->Manufacturer) ? $this->objInventoryModel->Manufacturer->__toString() : null;

			if ($this->txtInventoryModelCode) $this->txtInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
			if ($this->lblInventoryModelCode) $this->lblInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objInventoryModel->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objInventoryModel->ShortDescription;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objInventoryModel->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objInventoryModel->LongDescription;

			if ($this->txtImagePath) $this->txtImagePath->Text = $this->objInventoryModel->ImagePath;
			if ($this->lblImagePath) $this->lblImagePath->Text = $this->objInventoryModel->ImagePath;

			if ($this->txtPrice) $this->txtPrice->Text = $this->objInventoryModel->Price;
			if ($this->lblPrice) $this->lblPrice->Text = $this->objInventoryModel->Price;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objInventoryModel->CreatedByObject) && ($this->objInventoryModel->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objInventoryModel->CreatedByObject) ? $this->objInventoryModel->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objInventoryModel->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objInventoryModel->CreationDate) ? $this->objInventoryModel->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objInventoryModel->ModifiedByObject) && ($this->objInventoryModel->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objInventoryModel->ModifiedByObject) ? $this->objInventoryModel->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objInventoryModel->ModifiedDate;

			if ($this->lstInventoryModelCustomFieldHelper) {
				$this->lstInventoryModelCustomFieldHelper->RemoveAllItems();
				$this->lstInventoryModelCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objInventoryModelCustomFieldHelperArray = InventoryModelCustomFieldHelper::LoadAll();
				if ($objInventoryModelCustomFieldHelperArray) foreach ($objInventoryModelCustomFieldHelperArray as $objInventoryModelCustomFieldHelper) {
					$objListItem = new QListItem($objInventoryModelCustomFieldHelper->__toString(), $objInventoryModelCustomFieldHelper->InventoryModelId);
					if ($objInventoryModelCustomFieldHelper->InventoryModelId == $this->objInventoryModel->InventoryModelId)
						$objListItem->Selected = true;
					$this->lstInventoryModelCustomFieldHelper->AddItem($objListItem);
				}
				// Because InventoryModelCustomFieldHelper's InventoryModelCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstInventoryModelCustomFieldHelper->SelectedValue)
					$this->lstInventoryModelCustomFieldHelper->Enabled = false;
				else
					$this->lstInventoryModelCustomFieldHelper->Enabled = true;
			}
			if ($this->lblInventoryModelCustomFieldHelper) $this->lblInventoryModelCustomFieldHelper->Text = ($this->objInventoryModel->InventoryModelCustomFieldHelper) ? $this->objInventoryModel->InventoryModelCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC INVENTORYMODEL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's InventoryModel instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveInventoryModel() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCategory) $this->objInventoryModel->CategoryId = $this->lstCategory->SelectedValue;
				if ($this->lstManufacturer) $this->objInventoryModel->ManufacturerId = $this->lstManufacturer->SelectedValue;
				if ($this->txtInventoryModelCode) $this->objInventoryModel->InventoryModelCode = $this->txtInventoryModelCode->Text;
				if ($this->txtShortDescription) $this->objInventoryModel->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLongDescription) $this->objInventoryModel->LongDescription = $this->txtLongDescription->Text;
				if ($this->txtImagePath) $this->objInventoryModel->ImagePath = $this->txtImagePath->Text;
				if ($this->txtPrice) $this->objInventoryModel->Price = $this->txtPrice->Text;
				if ($this->lstCreatedByObject) $this->objInventoryModel->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objInventoryModel->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objInventoryModel->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstInventoryModelCustomFieldHelper) $this->objInventoryModel->InventoryModelCustomFieldHelper = InventoryModelCustomFieldHelper::Load($this->lstInventoryModelCustomFieldHelper->SelectedValue);

				// Save the InventoryModel object
				$this->objInventoryModel->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's InventoryModel instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteInventoryModel() {
			$this->objInventoryModel->Delete();
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
				case 'InventoryModel': return $this->objInventoryModel;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to InventoryModel fields -- will be created dynamically if not yet created
				case 'InventoryModelIdControl':
					if (!$this->lblInventoryModelId) return $this->lblInventoryModelId_Create();
					return $this->lblInventoryModelId;
				case 'InventoryModelIdLabel':
					if (!$this->lblInventoryModelId) return $this->lblInventoryModelId_Create();
					return $this->lblInventoryModelId;
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
				case 'InventoryModelCodeControl':
					if (!$this->txtInventoryModelCode) return $this->txtInventoryModelCode_Create();
					return $this->txtInventoryModelCode;
				case 'InventoryModelCodeLabel':
					if (!$this->lblInventoryModelCode) return $this->lblInventoryModelCode_Create();
					return $this->lblInventoryModelCode;
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
				case 'PriceControl':
					if (!$this->txtPrice) return $this->txtPrice_Create();
					return $this->txtPrice;
				case 'PriceLabel':
					if (!$this->lblPrice) return $this->lblPrice_Create();
					return $this->lblPrice;
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
				case 'InventoryModelCustomFieldHelperControl':
					if (!$this->lstInventoryModelCustomFieldHelper) return $this->lstInventoryModelCustomFieldHelper_Create();
					return $this->lstInventoryModelCustomFieldHelper;
				case 'InventoryModelCustomFieldHelperLabel':
					if (!$this->lblInventoryModelCustomFieldHelper) return $this->lblInventoryModelCustomFieldHelper_Create();
					return $this->lblInventoryModelCustomFieldHelper;
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
					// Controls that point to InventoryModel fields
					case 'InventoryModelIdControl':
						return ($this->lblInventoryModelId = QType::Cast($mixValue, 'QControl'));
					case 'CategoryIdControl':
						return ($this->lstCategory = QType::Cast($mixValue, 'QControl'));
					case 'ManufacturerIdControl':
						return ($this->lstManufacturer = QType::Cast($mixValue, 'QControl'));
					case 'InventoryModelCodeControl':
						return ($this->txtInventoryModelCode = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'ImagePathControl':
						return ($this->txtImagePath = QType::Cast($mixValue, 'QControl'));
					case 'PriceControl':
						return ($this->txtPrice = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'InventoryModelCustomFieldHelperControl':
						return ($this->lstInventoryModelCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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