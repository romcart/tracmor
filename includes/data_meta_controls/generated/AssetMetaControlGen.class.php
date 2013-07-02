<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Asset class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Asset object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Asset $Asset the actual Asset data class being edited
	 * property QLabel $AssetIdControl
	 * property-read QLabel $AssetIdLabel
	 * property QListBox $ParentAssetIdControl
	 * property-read QLabel $ParentAssetIdLabel
	 * property QListBox $AssetModelIdControl
	 * property-read QLabel $AssetModelIdLabel
	 * property QListBox $LocationIdControl
	 * property-read QLabel $LocationIdLabel
	 * property QTextBox $AssetCodeControl
	 * property-read QLabel $AssetCodeLabel
	 * property QTextBox $ImagePathControl
	 * property-read QLabel $ImagePathLabel
	 * property QCheckBox $CheckedOutFlagControl
	 * property-read QLabel $CheckedOutFlagLabel
	 * property QCheckBox $ReservedFlagControl
	 * property-read QLabel $ReservedFlagLabel
	 * property QCheckBox $LinkedFlagControl
	 * property-read QLabel $LinkedFlagLabel
	 * property QCheckBox $ArchivedFlagControl
	 * property-read QLabel $ArchivedFlagLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QCheckBox $DepreciationFlagControl
	 * property-read QLabel $DepreciationFlagLabel
	 * property QDateTimePicker $PurchaseDateControl
	 * property-read QLabel $PurchaseDateLabel
	 * property QFloatTextBox $PurchaseCostControl
	 * property-read QLabel $PurchaseCostLabel
	 * property QListBox $AssetCustomFieldHelperControl
	 * property-read QLabel $AssetCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AssetMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Asset objAsset
		 * @access protected
		 */
		protected $objAsset;

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

		// Controls that allow the editing of Asset's individual data fields
        /**
         * @var QLabel lblAssetId;
         * @access protected
         */
		protected $lblAssetId;

        /**
         * @var QListBox lstParentAsset;
         * @access protected
         */
		protected $lstParentAsset;

        /**
         * @var QListBox lstAssetModel;
         * @access protected
         */
		protected $lstAssetModel;

        /**
         * @var QListBox lstLocation;
         * @access protected
         */
		protected $lstLocation;

        /**
         * @var QTextBox txtAssetCode;
         * @access protected
         */
		protected $txtAssetCode;

        /**
         * @var QTextBox txtImagePath;
         * @access protected
         */
		protected $txtImagePath;

        /**
         * @var QCheckBox chkCheckedOutFlag;
         * @access protected
         */
		protected $chkCheckedOutFlag;

        /**
         * @var QCheckBox chkReservedFlag;
         * @access protected
         */
		protected $chkReservedFlag;

        /**
         * @var QCheckBox chkLinkedFlag;
         * @access protected
         */
		protected $chkLinkedFlag;

        /**
         * @var QCheckBox chkArchivedFlag;
         * @access protected
         */
		protected $chkArchivedFlag;

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
         * @var QCheckBox chkDepreciationFlag;
         * @access protected
         */
		protected $chkDepreciationFlag;

        /**
         * @var QDateTimePicker calPurchaseDate;
         * @access protected
         */
		protected $calPurchaseDate;

        /**
         * @var QFloatTextBox txtPurchaseCost;
         * @access protected
         */
		protected $txtPurchaseCost;


		// Controls that allow the viewing of Asset's individual data fields
        /**
         * @var QLabel lblParentAssetId
         * @access protected
         */
		protected $lblParentAssetId;

        /**
         * @var QLabel lblAssetModelId
         * @access protected
         */
		protected $lblAssetModelId;

        /**
         * @var QLabel lblLocationId
         * @access protected
         */
		protected $lblLocationId;

        /**
         * @var QLabel lblAssetCode
         * @access protected
         */
		protected $lblAssetCode;

        /**
         * @var QLabel lblImagePath
         * @access protected
         */
		protected $lblImagePath;

        /**
         * @var QLabel lblCheckedOutFlag
         * @access protected
         */
		protected $lblCheckedOutFlag;

        /**
         * @var QLabel lblReservedFlag
         * @access protected
         */
		protected $lblReservedFlag;

        /**
         * @var QLabel lblLinkedFlag
         * @access protected
         */
		protected $lblLinkedFlag;

        /**
         * @var QLabel lblArchivedFlag
         * @access protected
         */
		protected $lblArchivedFlag;

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
         * @var QLabel lblDepreciationFlag
         * @access protected
         */
		protected $lblDepreciationFlag;

        /**
         * @var QLabel lblPurchaseDate
         * @access protected
         */
		protected $lblPurchaseDate;

        /**
         * @var QLabel lblPurchaseCost
         * @access protected
         */
		protected $lblPurchaseCost;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstAssetCustomFieldHelper
         * @access protected
         */
		protected $lstAssetCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblAssetCustomFieldHelper
         * @access protected
         */
		protected $lblAssetCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AssetMetaControl to edit a single Asset object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Asset object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetMetaControl
		 * @param Asset $objAsset new or existing Asset object
		 */
		 public function __construct($objParentObject, Asset $objAsset) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Asset object
			$this->objAsset = $objAsset;

			// Figure out if we're Editing or Creating New
			if ($this->objAsset->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetMetaControl
		 * @param integer $intAssetId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Asset object creation - defaults to CreateOrEdit
 		 * @return AssetMetaControl
		 */
		public static function Create($objParentObject, $intAssetId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetId)) {
				$objAsset = Asset::Load($intAssetId);

				// Asset was found -- return it!
				if ($objAsset)
					return new AssetMetaControl($objParentObject, $objAsset);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Asset object with PK arguments: ' . $intAssetId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetMetaControl($objParentObject, new Asset());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Asset object creation - defaults to CreateOrEdit
		 * @return AssetMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetId = QApplication::PathInfo(0);
			return AssetMetaControl::Create($objParentObject, $intAssetId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Asset object creation - defaults to CreateOrEdit
		 * @return AssetMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetId = QApplication::QueryString('intAssetId');
			return AssetMetaControl::Create($objParentObject, $intAssetId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAssetId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetId_Create($strControlId = null) {
			$this->lblAssetId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetId->Name = QApplication::Translate('Asset Id');
			if ($this->blnEditMode)
				$this->lblAssetId->Text = $this->objAsset->AssetId;
			else
				$this->lblAssetId->Text = 'N/A';
			return $this->lblAssetId;
		}

		/**
		 * Create and setup QListBox lstParentAsset
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentAsset_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentAsset = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentAsset->Name = QApplication::Translate('Parent Asset');
			$this->lstParentAsset->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentAssetCursor = Asset::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentAsset = Asset::InstantiateCursor($objParentAssetCursor)) {
				$objListItem = new QListItem($objParentAsset->__toString(), $objParentAsset->AssetId);
				if (($this->objAsset->ParentAsset) && ($this->objAsset->ParentAsset->AssetId == $objParentAsset->AssetId))
					$objListItem->Selected = true;
				$this->lstParentAsset->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentAsset;
		}

		/**
		 * Create and setup QLabel lblParentAssetId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentAssetId_Create($strControlId = null) {
			$this->lblParentAssetId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentAssetId->Name = QApplication::Translate('Parent Asset');
			$this->lblParentAssetId->Text = ($this->objAsset->ParentAsset) ? $this->objAsset->ParentAsset->__toString() : null;
			return $this->lblParentAssetId;
		}

		/**
		 * Create and setup QListBox lstAssetModel
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssetModel_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssetModel = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssetModel->Name = QApplication::Translate('Asset Model');
			$this->lstAssetModel->Required = true;
			if (!$this->blnEditMode)
				$this->lstAssetModel->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetModelCursor = AssetModel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssetModel = AssetModel::InstantiateCursor($objAssetModelCursor)) {
				$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
				if (($this->objAsset->AssetModel) && ($this->objAsset->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
					$objListItem->Selected = true;
				$this->lstAssetModel->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAssetModel;
		}

		/**
		 * Create and setup QLabel lblAssetModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetModelId_Create($strControlId = null) {
			$this->lblAssetModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetModelId->Name = QApplication::Translate('Asset Model');
			$this->lblAssetModelId->Text = ($this->objAsset->AssetModel) ? $this->objAsset->AssetModel->__toString() : null;
			$this->lblAssetModelId->Required = true;
			return $this->lblAssetModelId;
		}

		/**
		 * Create and setup QListBox lstLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstLocation->Name = QApplication::Translate('Location');
			$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLocationCursor = Location::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLocation = Location::InstantiateCursor($objLocationCursor)) {
				$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
				if (($this->objAsset->Location) && ($this->objAsset->Location->LocationId == $objLocation->LocationId))
					$objListItem->Selected = true;
				$this->lstLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLocation;
		}

		/**
		 * Create and setup QLabel lblLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocationId_Create($strControlId = null) {
			$this->lblLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocationId->Name = QApplication::Translate('Location');
			$this->lblLocationId->Text = ($this->objAsset->Location) ? $this->objAsset->Location->__toString() : null;
			return $this->lblLocationId;
		}

		/**
		 * Create and setup QTextBox txtAssetCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAssetCode_Create($strControlId = null) {
			$this->txtAssetCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAssetCode->Name = QApplication::Translate('Asset Code');
			$this->txtAssetCode->Text = $this->objAsset->AssetCode;
			$this->txtAssetCode->Required = true;
			$this->txtAssetCode->MaxLength = Asset::AssetCodeMaxLength;
			return $this->txtAssetCode;
		}

		/**
		 * Create and setup QLabel lblAssetCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetCode_Create($strControlId = null) {
			$this->lblAssetCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetCode->Name = QApplication::Translate('Asset Code');
			$this->lblAssetCode->Text = $this->objAsset->AssetCode;
			$this->lblAssetCode->Required = true;
			return $this->lblAssetCode;
		}

		/**
		 * Create and setup QTextBox txtImagePath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtImagePath_Create($strControlId = null) {
			$this->txtImagePath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objAsset->ImagePath;
			$this->txtImagePath->MaxLength = Asset::ImagePathMaxLength;
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
			$this->lblImagePath->Text = $this->objAsset->ImagePath;
			return $this->lblImagePath;
		}

		/**
		 * Create and setup QCheckBox chkCheckedOutFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCheckedOutFlag_Create($strControlId = null) {
			$this->chkCheckedOutFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCheckedOutFlag->Name = QApplication::Translate('Checked Out Flag');
			$this->chkCheckedOutFlag->Checked = $this->objAsset->CheckedOutFlag;
			return $this->chkCheckedOutFlag;
		}

		/**
		 * Create and setup QLabel lblCheckedOutFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCheckedOutFlag_Create($strControlId = null) {
			$this->lblCheckedOutFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblCheckedOutFlag->Name = QApplication::Translate('Checked Out Flag');
			$this->lblCheckedOutFlag->Text = ($this->objAsset->CheckedOutFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCheckedOutFlag;
		}

		/**
		 * Create and setup QCheckBox chkReservedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkReservedFlag_Create($strControlId = null) {
			$this->chkReservedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkReservedFlag->Name = QApplication::Translate('Reserved Flag');
			$this->chkReservedFlag->Checked = $this->objAsset->ReservedFlag;
			return $this->chkReservedFlag;
		}

		/**
		 * Create and setup QLabel lblReservedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReservedFlag_Create($strControlId = null) {
			$this->lblReservedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblReservedFlag->Name = QApplication::Translate('Reserved Flag');
			$this->lblReservedFlag->Text = ($this->objAsset->ReservedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblReservedFlag;
		}

		/**
		 * Create and setup QCheckBox chkLinkedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkLinkedFlag_Create($strControlId = null) {
			$this->chkLinkedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkLinkedFlag->Name = QApplication::Translate('Linked Flag');
			$this->chkLinkedFlag->Checked = $this->objAsset->LinkedFlag;
			return $this->chkLinkedFlag;
		}

		/**
		 * Create and setup QLabel lblLinkedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLinkedFlag_Create($strControlId = null) {
			$this->lblLinkedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblLinkedFlag->Name = QApplication::Translate('Linked Flag');
			$this->lblLinkedFlag->Text = ($this->objAsset->LinkedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblLinkedFlag;
		}

		/**
		 * Create and setup QCheckBox chkArchivedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkArchivedFlag_Create($strControlId = null) {
			$this->chkArchivedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkArchivedFlag->Name = QApplication::Translate('Archived Flag');
			$this->chkArchivedFlag->Checked = $this->objAsset->ArchivedFlag;
			return $this->chkArchivedFlag;
		}

		/**
		 * Create and setup QLabel lblArchivedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArchivedFlag_Create($strControlId = null) {
			$this->lblArchivedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblArchivedFlag->Name = QApplication::Translate('Archived Flag');
			$this->lblArchivedFlag->Text = ($this->objAsset->ArchivedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblArchivedFlag;
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
				if (($this->objAsset->CreatedByObject) && ($this->objAsset->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objAsset->CreatedByObject) ? $this->objAsset->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objAsset->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objAsset->CreationDate) ? $this->objAsset->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objAsset->ModifiedByObject) && ($this->objAsset->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objAsset->ModifiedByObject) ? $this->objAsset->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objAsset->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QCheckBox chkDepreciationFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDepreciationFlag_Create($strControlId = null) {
			$this->chkDepreciationFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDepreciationFlag->Name = QApplication::Translate('Depreciation Flag');
			$this->chkDepreciationFlag->Checked = $this->objAsset->DepreciationFlag;
			return $this->chkDepreciationFlag;
		}

		/**
		 * Create and setup QLabel lblDepreciationFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDepreciationFlag_Create($strControlId = null) {
			$this->lblDepreciationFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDepreciationFlag->Name = QApplication::Translate('Depreciation Flag');
			$this->lblDepreciationFlag->Text = ($this->objAsset->DepreciationFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDepreciationFlag;
		}

		/**
		 * Create and setup QDateTimePicker calPurchaseDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPurchaseDate_Create($strControlId = null) {
			$this->calPurchaseDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPurchaseDate->Name = QApplication::Translate('Purchase Date');
			$this->calPurchaseDate->DateTime = $this->objAsset->PurchaseDate;
			$this->calPurchaseDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calPurchaseDate;
		}

		/**
		 * Create and setup QLabel lblPurchaseDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblPurchaseDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblPurchaseDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblPurchaseDate->Name = QApplication::Translate('Purchase Date');
			$this->strPurchaseDateDateTimeFormat = $strDateTimeFormat;
			$this->lblPurchaseDate->Text = sprintf($this->objAsset->PurchaseDate) ? $this->objAsset->PurchaseDate->__toString($this->strPurchaseDateDateTimeFormat) : null;
			return $this->lblPurchaseDate;
		}

		protected $strPurchaseDateDateTimeFormat;

		/**
		 * Create and setup QFloatTextBox txtPurchaseCost
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtPurchaseCost_Create($strControlId = null) {
			$this->txtPurchaseCost = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtPurchaseCost->Name = QApplication::Translate('Purchase Cost');
			$this->txtPurchaseCost->Text = $this->objAsset->PurchaseCost;
			return $this->txtPurchaseCost;
		}

		/**
		 * Create and setup QLabel lblPurchaseCost
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPurchaseCost_Create($strControlId = null, $strFormat = null) {
			$this->lblPurchaseCost = new QLabel($this->objParentObject, $strControlId);
			$this->lblPurchaseCost->Name = QApplication::Translate('Purchase Cost');
			$this->lblPurchaseCost->Text = $this->objAsset->PurchaseCost;
			$this->lblPurchaseCost->Format = $strFormat;
			return $this->lblPurchaseCost;
		}

		/**
		 * Create and setup QListBox lstAssetCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssetCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssetCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssetCustomFieldHelper->Name = QApplication::Translate('Asset Custom Field Helper');
			$this->lstAssetCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetCustomFieldHelperCursor = AssetCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssetCustomFieldHelper = AssetCustomFieldHelper::InstantiateCursor($objAssetCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objAssetCustomFieldHelper->__toString(), $objAssetCustomFieldHelper->AssetId);
				if ($objAssetCustomFieldHelper->AssetId == $this->objAsset->AssetId)
					$objListItem->Selected = true;
				$this->lstAssetCustomFieldHelper->AddItem($objListItem);
			}

			// Because AssetCustomFieldHelper's AssetCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAssetCustomFieldHelper->SelectedValue)
				$this->lstAssetCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstAssetCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblAssetCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetCustomFieldHelper_Create($strControlId = null) {
			$this->lblAssetCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetCustomFieldHelper->Name = QApplication::Translate('Asset Custom Field Helper');
			$this->lblAssetCustomFieldHelper->Text = ($this->objAsset->AssetCustomFieldHelper) ? $this->objAsset->AssetCustomFieldHelper->__toString() : null;
			return $this->lblAssetCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Asset object.
		 * @param boolean $blnReload reload Asset from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAsset->Reload();

			if ($this->lblAssetId) if ($this->blnEditMode) $this->lblAssetId->Text = $this->objAsset->AssetId;

			if ($this->lstParentAsset) {
					$this->lstParentAsset->RemoveAllItems();
				$this->lstParentAsset->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentAssetArray = Asset::LoadAll();
				if ($objParentAssetArray) foreach ($objParentAssetArray as $objParentAsset) {
					$objListItem = new QListItem($objParentAsset->__toString(), $objParentAsset->AssetId);
					if (($this->objAsset->ParentAsset) && ($this->objAsset->ParentAsset->AssetId == $objParentAsset->AssetId))
						$objListItem->Selected = true;
					$this->lstParentAsset->AddItem($objListItem);
				}
			}
			if ($this->lblParentAssetId) $this->lblParentAssetId->Text = ($this->objAsset->ParentAsset) ? $this->objAsset->ParentAsset->__toString() : null;

			if ($this->lstAssetModel) {
					$this->lstAssetModel->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAssetModel->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetModelArray = AssetModel::LoadAll();
				if ($objAssetModelArray) foreach ($objAssetModelArray as $objAssetModel) {
					$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
					if (($this->objAsset->AssetModel) && ($this->objAsset->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
						$objListItem->Selected = true;
					$this->lstAssetModel->AddItem($objListItem);
				}
			}
			if ($this->lblAssetModelId) $this->lblAssetModelId->Text = ($this->objAsset->AssetModel) ? $this->objAsset->AssetModel->__toString() : null;

			if ($this->lstLocation) {
					$this->lstLocation->RemoveAllItems();
				$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objLocationArray = Location::LoadAll();
				if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
					$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
					if (($this->objAsset->Location) && ($this->objAsset->Location->LocationId == $objLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstLocation->AddItem($objListItem);
				}
			}
			if ($this->lblLocationId) $this->lblLocationId->Text = ($this->objAsset->Location) ? $this->objAsset->Location->__toString() : null;

			if ($this->txtAssetCode) $this->txtAssetCode->Text = $this->objAsset->AssetCode;
			if ($this->lblAssetCode) $this->lblAssetCode->Text = $this->objAsset->AssetCode;

			if ($this->txtImagePath) $this->txtImagePath->Text = $this->objAsset->ImagePath;
			if ($this->lblImagePath) $this->lblImagePath->Text = $this->objAsset->ImagePath;

			if ($this->chkCheckedOutFlag) $this->chkCheckedOutFlag->Checked = $this->objAsset->CheckedOutFlag;
			if ($this->lblCheckedOutFlag) $this->lblCheckedOutFlag->Text = ($this->objAsset->CheckedOutFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkReservedFlag) $this->chkReservedFlag->Checked = $this->objAsset->ReservedFlag;
			if ($this->lblReservedFlag) $this->lblReservedFlag->Text = ($this->objAsset->ReservedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkLinkedFlag) $this->chkLinkedFlag->Checked = $this->objAsset->LinkedFlag;
			if ($this->lblLinkedFlag) $this->lblLinkedFlag->Text = ($this->objAsset->LinkedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkArchivedFlag) $this->chkArchivedFlag->Checked = $this->objAsset->ArchivedFlag;
			if ($this->lblArchivedFlag) $this->lblArchivedFlag->Text = ($this->objAsset->ArchivedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objAsset->CreatedByObject) && ($this->objAsset->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objAsset->CreatedByObject) ? $this->objAsset->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objAsset->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objAsset->CreationDate) ? $this->objAsset->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objAsset->ModifiedByObject) && ($this->objAsset->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objAsset->ModifiedByObject) ? $this->objAsset->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objAsset->ModifiedDate;

			if ($this->chkDepreciationFlag) $this->chkDepreciationFlag->Checked = $this->objAsset->DepreciationFlag;
			if ($this->lblDepreciationFlag) $this->lblDepreciationFlag->Text = ($this->objAsset->DepreciationFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calPurchaseDate) $this->calPurchaseDate->DateTime = $this->objAsset->PurchaseDate;
			if ($this->lblPurchaseDate) $this->lblPurchaseDate->Text = sprintf($this->objAsset->PurchaseDate) ? $this->objAsset->__toString($this->strPurchaseDateDateTimeFormat) : null;

			if ($this->txtPurchaseCost) $this->txtPurchaseCost->Text = $this->objAsset->PurchaseCost;
			if ($this->lblPurchaseCost) $this->lblPurchaseCost->Text = $this->objAsset->PurchaseCost;

			if ($this->lstAssetCustomFieldHelper) {
				$this->lstAssetCustomFieldHelper->RemoveAllItems();
				$this->lstAssetCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetCustomFieldHelperArray = AssetCustomFieldHelper::LoadAll();
				if ($objAssetCustomFieldHelperArray) foreach ($objAssetCustomFieldHelperArray as $objAssetCustomFieldHelper) {
					$objListItem = new QListItem($objAssetCustomFieldHelper->__toString(), $objAssetCustomFieldHelper->AssetId);
					if ($objAssetCustomFieldHelper->AssetId == $this->objAsset->AssetId)
						$objListItem->Selected = true;
					$this->lstAssetCustomFieldHelper->AddItem($objListItem);
				}
				// Because AssetCustomFieldHelper's AssetCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstAssetCustomFieldHelper->SelectedValue)
					$this->lstAssetCustomFieldHelper->Enabled = false;
				else
					$this->lstAssetCustomFieldHelper->Enabled = true;
			}
			if ($this->lblAssetCustomFieldHelper) $this->lblAssetCustomFieldHelper->Text = ($this->objAsset->AssetCustomFieldHelper) ? $this->objAsset->AssetCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSET OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Asset instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAsset() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstParentAsset) $this->objAsset->ParentAssetId = $this->lstParentAsset->SelectedValue;
				if ($this->lstAssetModel) $this->objAsset->AssetModelId = $this->lstAssetModel->SelectedValue;
				if ($this->lstLocation) $this->objAsset->LocationId = $this->lstLocation->SelectedValue;
				if ($this->txtAssetCode) $this->objAsset->AssetCode = $this->txtAssetCode->Text;
				if ($this->txtImagePath) $this->objAsset->ImagePath = $this->txtImagePath->Text;
				if ($this->chkCheckedOutFlag) $this->objAsset->CheckedOutFlag = $this->chkCheckedOutFlag->Checked;
				if ($this->chkReservedFlag) $this->objAsset->ReservedFlag = $this->chkReservedFlag->Checked;
				if ($this->chkLinkedFlag) $this->objAsset->LinkedFlag = $this->chkLinkedFlag->Checked;
				if ($this->chkArchivedFlag) $this->objAsset->ArchivedFlag = $this->chkArchivedFlag->Checked;
				if ($this->lstCreatedByObject) $this->objAsset->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objAsset->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objAsset->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
				if ($this->chkDepreciationFlag) $this->objAsset->DepreciationFlag = $this->chkDepreciationFlag->Checked;
				if ($this->calPurchaseDate) $this->objAsset->PurchaseDate = $this->calPurchaseDate->DateTime;
				if ($this->txtPurchaseCost) $this->objAsset->PurchaseCost = $this->txtPurchaseCost->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstAssetCustomFieldHelper) $this->objAsset->AssetCustomFieldHelper = AssetCustomFieldHelper::Load($this->lstAssetCustomFieldHelper->SelectedValue);

				// Save the Asset object
				$this->objAsset->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Asset instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAsset() {
			$this->objAsset->Delete();
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
				case 'Asset': return $this->objAsset;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Asset fields -- will be created dynamically if not yet created
				case 'AssetIdControl':
					if (!$this->lblAssetId) return $this->lblAssetId_Create();
					return $this->lblAssetId;
				case 'AssetIdLabel':
					if (!$this->lblAssetId) return $this->lblAssetId_Create();
					return $this->lblAssetId;
				case 'ParentAssetIdControl':
					if (!$this->lstParentAsset) return $this->lstParentAsset_Create();
					return $this->lstParentAsset;
				case 'ParentAssetIdLabel':
					if (!$this->lblParentAssetId) return $this->lblParentAssetId_Create();
					return $this->lblParentAssetId;
				case 'AssetModelIdControl':
					if (!$this->lstAssetModel) return $this->lstAssetModel_Create();
					return $this->lstAssetModel;
				case 'AssetModelIdLabel':
					if (!$this->lblAssetModelId) return $this->lblAssetModelId_Create();
					return $this->lblAssetModelId;
				case 'LocationIdControl':
					if (!$this->lstLocation) return $this->lstLocation_Create();
					return $this->lstLocation;
				case 'LocationIdLabel':
					if (!$this->lblLocationId) return $this->lblLocationId_Create();
					return $this->lblLocationId;
				case 'AssetCodeControl':
					if (!$this->txtAssetCode) return $this->txtAssetCode_Create();
					return $this->txtAssetCode;
				case 'AssetCodeLabel':
					if (!$this->lblAssetCode) return $this->lblAssetCode_Create();
					return $this->lblAssetCode;
				case 'ImagePathControl':
					if (!$this->txtImagePath) return $this->txtImagePath_Create();
					return $this->txtImagePath;
				case 'ImagePathLabel':
					if (!$this->lblImagePath) return $this->lblImagePath_Create();
					return $this->lblImagePath;
				case 'CheckedOutFlagControl':
					if (!$this->chkCheckedOutFlag) return $this->chkCheckedOutFlag_Create();
					return $this->chkCheckedOutFlag;
				case 'CheckedOutFlagLabel':
					if (!$this->lblCheckedOutFlag) return $this->lblCheckedOutFlag_Create();
					return $this->lblCheckedOutFlag;
				case 'ReservedFlagControl':
					if (!$this->chkReservedFlag) return $this->chkReservedFlag_Create();
					return $this->chkReservedFlag;
				case 'ReservedFlagLabel':
					if (!$this->lblReservedFlag) return $this->lblReservedFlag_Create();
					return $this->lblReservedFlag;
				case 'LinkedFlagControl':
					if (!$this->chkLinkedFlag) return $this->chkLinkedFlag_Create();
					return $this->chkLinkedFlag;
				case 'LinkedFlagLabel':
					if (!$this->lblLinkedFlag) return $this->lblLinkedFlag_Create();
					return $this->lblLinkedFlag;
				case 'ArchivedFlagControl':
					if (!$this->chkArchivedFlag) return $this->chkArchivedFlag_Create();
					return $this->chkArchivedFlag;
				case 'ArchivedFlagLabel':
					if (!$this->lblArchivedFlag) return $this->lblArchivedFlag_Create();
					return $this->lblArchivedFlag;
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
				case 'DepreciationFlagControl':
					if (!$this->chkDepreciationFlag) return $this->chkDepreciationFlag_Create();
					return $this->chkDepreciationFlag;
				case 'DepreciationFlagLabel':
					if (!$this->lblDepreciationFlag) return $this->lblDepreciationFlag_Create();
					return $this->lblDepreciationFlag;
				case 'PurchaseDateControl':
					if (!$this->calPurchaseDate) return $this->calPurchaseDate_Create();
					return $this->calPurchaseDate;
				case 'PurchaseDateLabel':
					if (!$this->lblPurchaseDate) return $this->lblPurchaseDate_Create();
					return $this->lblPurchaseDate;
				case 'PurchaseCostControl':
					if (!$this->txtPurchaseCost) return $this->txtPurchaseCost_Create();
					return $this->txtPurchaseCost;
				case 'PurchaseCostLabel':
					if (!$this->lblPurchaseCost) return $this->lblPurchaseCost_Create();
					return $this->lblPurchaseCost;
				case 'AssetCustomFieldHelperControl':
					if (!$this->lstAssetCustomFieldHelper) return $this->lstAssetCustomFieldHelper_Create();
					return $this->lstAssetCustomFieldHelper;
				case 'AssetCustomFieldHelperLabel':
					if (!$this->lblAssetCustomFieldHelper) return $this->lblAssetCustomFieldHelper_Create();
					return $this->lblAssetCustomFieldHelper;
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
					// Controls that point to Asset fields
					case 'AssetIdControl':
						return ($this->lblAssetId = QType::Cast($mixValue, 'QControl'));
					case 'ParentAssetIdControl':
						return ($this->lstParentAsset = QType::Cast($mixValue, 'QControl'));
					case 'AssetModelIdControl':
						return ($this->lstAssetModel = QType::Cast($mixValue, 'QControl'));
					case 'LocationIdControl':
						return ($this->lstLocation = QType::Cast($mixValue, 'QControl'));
					case 'AssetCodeControl':
						return ($this->txtAssetCode = QType::Cast($mixValue, 'QControl'));
					case 'ImagePathControl':
						return ($this->txtImagePath = QType::Cast($mixValue, 'QControl'));
					case 'CheckedOutFlagControl':
						return ($this->chkCheckedOutFlag = QType::Cast($mixValue, 'QControl'));
					case 'ReservedFlagControl':
						return ($this->chkReservedFlag = QType::Cast($mixValue, 'QControl'));
					case 'LinkedFlagControl':
						return ($this->chkLinkedFlag = QType::Cast($mixValue, 'QControl'));
					case 'ArchivedFlagControl':
						return ($this->chkArchivedFlag = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'DepreciationFlagControl':
						return ($this->chkDepreciationFlag = QType::Cast($mixValue, 'QControl'));
					case 'PurchaseDateControl':
						return ($this->calPurchaseDate = QType::Cast($mixValue, 'QControl'));
					case 'PurchaseCostControl':
						return ($this->txtPurchaseCost = QType::Cast($mixValue, 'QControl'));
					case 'AssetCustomFieldHelperControl':
						return ($this->lstAssetCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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