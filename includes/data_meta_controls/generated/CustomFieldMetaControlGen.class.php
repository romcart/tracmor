<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CustomField class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CustomField object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CustomFieldMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read CustomField $CustomField the actual CustomField data class being edited
	 * property QLabel $CustomFieldIdControl
	 * property-read QLabel $CustomFieldIdLabel
	 * property QListBox $CustomFieldQtypeIdControl
	 * property-read QLabel $CustomFieldQtypeIdLabel
	 * property QListBox $DefaultCustomFieldValueIdControl
	 * property-read QLabel $DefaultCustomFieldValueIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property QCheckBox $RequiredFlagControl
	 * property-read QLabel $RequiredFlagLabel
	 * property QCheckBox $AllAssetModelsFlagControl
	 * property-read QLabel $AllAssetModelsFlagLabel
	 * property QCheckBox $SearchableFlagControl
	 * property-read QLabel $SearchableFlagLabel
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

	class CustomFieldMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CustomField objCustomField
		 * @access protected
		 */
		protected $objCustomField;

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

		// Controls that allow the editing of CustomField's individual data fields
        /**
         * @var QLabel lblCustomFieldId;
         * @access protected
         */
		protected $lblCustomFieldId;

        /**
         * @var QListBox lstCustomFieldQtype;
         * @access protected
         */
		protected $lstCustomFieldQtype;

        /**
         * @var QListBox lstDefaultCustomFieldValue;
         * @access protected
         */
		protected $lstDefaultCustomFieldValue;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QCheckBox chkActiveFlag;
         * @access protected
         */
		protected $chkActiveFlag;

        /**
         * @var QCheckBox chkRequiredFlag;
         * @access protected
         */
		protected $chkRequiredFlag;

        /**
         * @var QCheckBox chkAllAssetModelsFlag;
         * @access protected
         */
		protected $chkAllAssetModelsFlag;

        /**
         * @var QCheckBox chkSearchableFlag;
         * @access protected
         */
		protected $chkSearchableFlag;

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


		// Controls that allow the viewing of CustomField's individual data fields
        /**
         * @var QLabel lblCustomFieldQtypeId
         * @access protected
         */
		protected $lblCustomFieldQtypeId;

        /**
         * @var QLabel lblDefaultCustomFieldValueId
         * @access protected
         */
		protected $lblDefaultCustomFieldValueId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblActiveFlag
         * @access protected
         */
		protected $lblActiveFlag;

        /**
         * @var QLabel lblRequiredFlag
         * @access protected
         */
		protected $lblRequiredFlag;

        /**
         * @var QLabel lblAllAssetModelsFlag
         * @access protected
         */
		protected $lblAllAssetModelsFlag;

        /**
         * @var QLabel lblSearchableFlag
         * @access protected
         */
		protected $lblSearchableFlag;

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
		 * CustomFieldMetaControl to edit a single CustomField object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CustomField object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldMetaControl
		 * @param CustomField $objCustomField new or existing CustomField object
		 */
		 public function __construct($objParentObject, CustomField $objCustomField) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CustomFieldMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CustomField object
			$this->objCustomField = $objCustomField;

			// Figure out if we're Editing or Creating New
			if ($this->objCustomField->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldMetaControl
		 * @param integer $intCustomFieldId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CustomField object creation - defaults to CreateOrEdit
 		 * @return CustomFieldMetaControl
		 */
		public static function Create($objParentObject, $intCustomFieldId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCustomFieldId)) {
				$objCustomField = CustomField::Load($intCustomFieldId);

				// CustomField was found -- return it!
				if ($objCustomField)
					return new CustomFieldMetaControl($objParentObject, $objCustomField);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CustomField object with PK arguments: ' . $intCustomFieldId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CustomFieldMetaControl($objParentObject, new CustomField());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CustomField object creation - defaults to CreateOrEdit
		 * @return CustomFieldMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCustomFieldId = QApplication::PathInfo(0);
			return CustomFieldMetaControl::Create($objParentObject, $intCustomFieldId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CustomField object creation - defaults to CreateOrEdit
		 * @return CustomFieldMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCustomFieldId = QApplication::QueryString('intCustomFieldId');
			return CustomFieldMetaControl::Create($objParentObject, $intCustomFieldId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblCustomFieldId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCustomFieldId_Create($strControlId = null) {
			$this->lblCustomFieldId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCustomFieldId->Name = QApplication::Translate('Custom Field Id');
			if ($this->blnEditMode)
				$this->lblCustomFieldId->Text = $this->objCustomField->CustomFieldId;
			else
				$this->lblCustomFieldId->Text = 'N/A';
			return $this->lblCustomFieldId;
		}

		/**
		 * Create and setup QListBox lstCustomFieldQtype
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCustomFieldQtype_Create($strControlId = null) {
			$this->lstCustomFieldQtype = new QListBox($this->objParentObject, $strControlId);
			$this->lstCustomFieldQtype->Name = QApplication::Translate('Custom Field Qtype');
			$this->lstCustomFieldQtype->Required = true;

			$this->lstCustomFieldQtype->AddItems(CustomFieldQtype::$NameArray, $this->objCustomField->CustomFieldQtypeId);
			return $this->lstCustomFieldQtype;
		}

		/**
		 * Create and setup QLabel lblCustomFieldQtypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCustomFieldQtypeId_Create($strControlId = null) {
			$this->lblCustomFieldQtypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCustomFieldQtypeId->Name = QApplication::Translate('Custom Field Qtype');
			$this->lblCustomFieldQtypeId->Text = ($this->objCustomField->CustomFieldQtypeId) ? CustomFieldQtype::$NameArray[$this->objCustomField->CustomFieldQtypeId] : null;
			$this->lblCustomFieldQtypeId->Required = true;
			return $this->lblCustomFieldQtypeId;
		}

		/**
		 * Create and setup QListBox lstDefaultCustomFieldValue
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDefaultCustomFieldValue_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDefaultCustomFieldValue = new QListBox($this->objParentObject, $strControlId);
			$this->lstDefaultCustomFieldValue->Name = QApplication::Translate('Default Custom Field Value');
			$this->lstDefaultCustomFieldValue->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDefaultCustomFieldValueCursor = CustomFieldValue::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDefaultCustomFieldValue = CustomFieldValue::InstantiateCursor($objDefaultCustomFieldValueCursor)) {
				$objListItem = new QListItem($objDefaultCustomFieldValue->__toString(), $objDefaultCustomFieldValue->CustomFieldValueId);
				if (($this->objCustomField->DefaultCustomFieldValue) && ($this->objCustomField->DefaultCustomFieldValue->CustomFieldValueId == $objDefaultCustomFieldValue->CustomFieldValueId))
					$objListItem->Selected = true;
				$this->lstDefaultCustomFieldValue->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDefaultCustomFieldValue;
		}

		/**
		 * Create and setup QLabel lblDefaultCustomFieldValueId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDefaultCustomFieldValueId_Create($strControlId = null) {
			$this->lblDefaultCustomFieldValueId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDefaultCustomFieldValueId->Name = QApplication::Translate('Default Custom Field Value');
			$this->lblDefaultCustomFieldValueId->Text = ($this->objCustomField->DefaultCustomFieldValue) ? $this->objCustomField->DefaultCustomFieldValue->__toString() : null;
			return $this->lblDefaultCustomFieldValueId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCustomField->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = CustomField::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objCustomField->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objCustomField->ActiveFlag;
			return $this->chkActiveFlag;
		}

		/**
		 * Create and setup QLabel lblActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActiveFlag_Create($strControlId = null) {
			$this->lblActiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->lblActiveFlag->Text = ($this->objCustomField->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}

		/**
		 * Create and setup QCheckBox chkRequiredFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkRequiredFlag_Create($strControlId = null) {
			$this->chkRequiredFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->chkRequiredFlag->Checked = $this->objCustomField->RequiredFlag;
			return $this->chkRequiredFlag;
		}

		/**
		 * Create and setup QLabel lblRequiredFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRequiredFlag_Create($strControlId = null) {
			$this->lblRequiredFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->lblRequiredFlag->Text = ($this->objCustomField->RequiredFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblRequiredFlag;
		}

		/**
		 * Create and setup QCheckBox chkAllAssetModelsFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAllAssetModelsFlag_Create($strControlId = null) {
			$this->chkAllAssetModelsFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAllAssetModelsFlag->Name = QApplication::Translate('All Asset Models Flag');
			$this->chkAllAssetModelsFlag->Checked = $this->objCustomField->AllAssetModelsFlag;
			return $this->chkAllAssetModelsFlag;
		}

		/**
		 * Create and setup QLabel lblAllAssetModelsFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAllAssetModelsFlag_Create($strControlId = null) {
			$this->lblAllAssetModelsFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAllAssetModelsFlag->Name = QApplication::Translate('All Asset Models Flag');
			$this->lblAllAssetModelsFlag->Text = ($this->objCustomField->AllAssetModelsFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAllAssetModelsFlag;
		}

		/**
		 * Create and setup QCheckBox chkSearchableFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkSearchableFlag_Create($strControlId = null) {
			$this->chkSearchableFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkSearchableFlag->Name = QApplication::Translate('Searchable Flag');
			$this->chkSearchableFlag->Checked = $this->objCustomField->SearchableFlag;
			return $this->chkSearchableFlag;
		}

		/**
		 * Create and setup QLabel lblSearchableFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSearchableFlag_Create($strControlId = null) {
			$this->lblSearchableFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblSearchableFlag->Name = QApplication::Translate('Searchable Flag');
			$this->lblSearchableFlag->Text = ($this->objCustomField->SearchableFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblSearchableFlag;
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
				if (($this->objCustomField->CreatedByObject) && ($this->objCustomField->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objCustomField->CreatedByObject) ? $this->objCustomField->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objCustomField->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objCustomField->CreationDate) ? $this->objCustomField->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objCustomField->ModifiedByObject) && ($this->objCustomField->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objCustomField->ModifiedByObject) ? $this->objCustomField->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objCustomField->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local CustomField object.
		 * @param boolean $blnReload reload CustomField from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCustomField->Reload();

			if ($this->lblCustomFieldId) if ($this->blnEditMode) $this->lblCustomFieldId->Text = $this->objCustomField->CustomFieldId;

			if ($this->lstCustomFieldQtype) $this->lstCustomFieldQtype->SelectedValue = $this->objCustomField->CustomFieldQtypeId;
			if ($this->lblCustomFieldQtypeId) $this->lblCustomFieldQtypeId->Text = ($this->objCustomField->CustomFieldQtypeId) ? CustomFieldQtype::$NameArray[$this->objCustomField->CustomFieldQtypeId] : null;

			if ($this->lstDefaultCustomFieldValue) {
					$this->lstDefaultCustomFieldValue->RemoveAllItems();
				$this->lstDefaultCustomFieldValue->AddItem(QApplication::Translate('- Select One -'), null);
				$objDefaultCustomFieldValueArray = CustomFieldValue::LoadAll();
				if ($objDefaultCustomFieldValueArray) foreach ($objDefaultCustomFieldValueArray as $objDefaultCustomFieldValue) {
					$objListItem = new QListItem($objDefaultCustomFieldValue->__toString(), $objDefaultCustomFieldValue->CustomFieldValueId);
					if (($this->objCustomField->DefaultCustomFieldValue) && ($this->objCustomField->DefaultCustomFieldValue->CustomFieldValueId == $objDefaultCustomFieldValue->CustomFieldValueId))
						$objListItem->Selected = true;
					$this->lstDefaultCustomFieldValue->AddItem($objListItem);
				}
			}
			if ($this->lblDefaultCustomFieldValueId) $this->lblDefaultCustomFieldValueId->Text = ($this->objCustomField->DefaultCustomFieldValue) ? $this->objCustomField->DefaultCustomFieldValue->__toString() : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objCustomField->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objCustomField->ShortDescription;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objCustomField->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objCustomField->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkRequiredFlag) $this->chkRequiredFlag->Checked = $this->objCustomField->RequiredFlag;
			if ($this->lblRequiredFlag) $this->lblRequiredFlag->Text = ($this->objCustomField->RequiredFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkAllAssetModelsFlag) $this->chkAllAssetModelsFlag->Checked = $this->objCustomField->AllAssetModelsFlag;
			if ($this->lblAllAssetModelsFlag) $this->lblAllAssetModelsFlag->Text = ($this->objCustomField->AllAssetModelsFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkSearchableFlag) $this->chkSearchableFlag->Checked = $this->objCustomField->SearchableFlag;
			if ($this->lblSearchableFlag) $this->lblSearchableFlag->Text = ($this->objCustomField->SearchableFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objCustomField->CreatedByObject) && ($this->objCustomField->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objCustomField->CreatedByObject) ? $this->objCustomField->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objCustomField->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objCustomField->CreationDate) ? $this->objCustomField->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objCustomField->ModifiedByObject) && ($this->objCustomField->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objCustomField->ModifiedByObject) ? $this->objCustomField->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objCustomField->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CUSTOMFIELD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CustomField instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCustomField() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCustomFieldQtype) $this->objCustomField->CustomFieldQtypeId = $this->lstCustomFieldQtype->SelectedValue;
				if ($this->lstDefaultCustomFieldValue) $this->objCustomField->DefaultCustomFieldValueId = $this->lstDefaultCustomFieldValue->SelectedValue;
				if ($this->txtShortDescription) $this->objCustomField->ShortDescription = $this->txtShortDescription->Text;
				if ($this->chkActiveFlag) $this->objCustomField->ActiveFlag = $this->chkActiveFlag->Checked;
				if ($this->chkRequiredFlag) $this->objCustomField->RequiredFlag = $this->chkRequiredFlag->Checked;
				if ($this->chkAllAssetModelsFlag) $this->objCustomField->AllAssetModelsFlag = $this->chkAllAssetModelsFlag->Checked;
				if ($this->chkSearchableFlag) $this->objCustomField->SearchableFlag = $this->chkSearchableFlag->Checked;
				if ($this->lstCreatedByObject) $this->objCustomField->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objCustomField->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objCustomField->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CustomField object
				$this->objCustomField->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CustomField instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCustomField() {
			$this->objCustomField->Delete();
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
				case 'CustomField': return $this->objCustomField;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CustomField fields -- will be created dynamically if not yet created
				case 'CustomFieldIdControl':
					if (!$this->lblCustomFieldId) return $this->lblCustomFieldId_Create();
					return $this->lblCustomFieldId;
				case 'CustomFieldIdLabel':
					if (!$this->lblCustomFieldId) return $this->lblCustomFieldId_Create();
					return $this->lblCustomFieldId;
				case 'CustomFieldQtypeIdControl':
					if (!$this->lstCustomFieldQtype) return $this->lstCustomFieldQtype_Create();
					return $this->lstCustomFieldQtype;
				case 'CustomFieldQtypeIdLabel':
					if (!$this->lblCustomFieldQtypeId) return $this->lblCustomFieldQtypeId_Create();
					return $this->lblCustomFieldQtypeId;
				case 'DefaultCustomFieldValueIdControl':
					if (!$this->lstDefaultCustomFieldValue) return $this->lstDefaultCustomFieldValue_Create();
					return $this->lstDefaultCustomFieldValue;
				case 'DefaultCustomFieldValueIdLabel':
					if (!$this->lblDefaultCustomFieldValueId) return $this->lblDefaultCustomFieldValueId_Create();
					return $this->lblDefaultCustomFieldValueId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
				case 'RequiredFlagControl':
					if (!$this->chkRequiredFlag) return $this->chkRequiredFlag_Create();
					return $this->chkRequiredFlag;
				case 'RequiredFlagLabel':
					if (!$this->lblRequiredFlag) return $this->lblRequiredFlag_Create();
					return $this->lblRequiredFlag;
				case 'AllAssetModelsFlagControl':
					if (!$this->chkAllAssetModelsFlag) return $this->chkAllAssetModelsFlag_Create();
					return $this->chkAllAssetModelsFlag;
				case 'AllAssetModelsFlagLabel':
					if (!$this->lblAllAssetModelsFlag) return $this->lblAllAssetModelsFlag_Create();
					return $this->lblAllAssetModelsFlag;
				case 'SearchableFlagControl':
					if (!$this->chkSearchableFlag) return $this->chkSearchableFlag_Create();
					return $this->chkSearchableFlag;
				case 'SearchableFlagLabel':
					if (!$this->lblSearchableFlag) return $this->lblSearchableFlag_Create();
					return $this->lblSearchableFlag;
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
					// Controls that point to CustomField fields
					case 'CustomFieldIdControl':
						return ($this->lblCustomFieldId = QType::Cast($mixValue, 'QControl'));
					case 'CustomFieldQtypeIdControl':
						return ($this->lstCustomFieldQtype = QType::Cast($mixValue, 'QControl'));
					case 'DefaultCustomFieldValueIdControl':
						return ($this->lstDefaultCustomFieldValue = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'RequiredFlagControl':
						return ($this->chkRequiredFlag = QType::Cast($mixValue, 'QControl'));
					case 'AllAssetModelsFlagControl':
						return ($this->chkAllAssetModelsFlag = QType::Cast($mixValue, 'QControl'));
					case 'SearchableFlagControl':
						return ($this->chkSearchableFlag = QType::Cast($mixValue, 'QControl'));
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