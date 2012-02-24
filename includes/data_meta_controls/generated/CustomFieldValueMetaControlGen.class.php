<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CustomFieldValue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CustomFieldValue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CustomFieldValueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read CustomFieldValue $CustomFieldValue the actual CustomFieldValue data class being edited
	 * property QLabel $CustomFieldValueIdControl
	 * property-read QLabel $CustomFieldValueIdLabel
	 * property QListBox $CustomFieldIdControl
	 * property-read QLabel $CustomFieldIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
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

	class CustomFieldValueMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CustomFieldValue objCustomFieldValue
		 * @access protected
		 */
		protected $objCustomFieldValue;

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

		// Controls that allow the editing of CustomFieldValue's individual data fields
        /**
         * @var QLabel lblCustomFieldValueId;
         * @access protected
         */
		protected $lblCustomFieldValueId;

        /**
         * @var QListBox lstCustomField;
         * @access protected
         */
		protected $lstCustomField;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

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


		// Controls that allow the viewing of CustomFieldValue's individual data fields
        /**
         * @var QLabel lblCustomFieldId
         * @access protected
         */
		protected $lblCustomFieldId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

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
		 * CustomFieldValueMetaControl to edit a single CustomFieldValue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CustomFieldValue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldValueMetaControl
		 * @param CustomFieldValue $objCustomFieldValue new or existing CustomFieldValue object
		 */
		 public function __construct($objParentObject, CustomFieldValue $objCustomFieldValue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CustomFieldValueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CustomFieldValue object
			$this->objCustomFieldValue = $objCustomFieldValue;

			// Figure out if we're Editing or Creating New
			if ($this->objCustomFieldValue->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldValueMetaControl
		 * @param integer $intCustomFieldValueId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CustomFieldValue object creation - defaults to CreateOrEdit
 		 * @return CustomFieldValueMetaControl
		 */
		public static function Create($objParentObject, $intCustomFieldValueId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCustomFieldValueId)) {
				$objCustomFieldValue = CustomFieldValue::Load($intCustomFieldValueId);

				// CustomFieldValue was found -- return it!
				if ($objCustomFieldValue)
					return new CustomFieldValueMetaControl($objParentObject, $objCustomFieldValue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CustomFieldValue object with PK arguments: ' . $intCustomFieldValueId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CustomFieldValueMetaControl($objParentObject, new CustomFieldValue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldValueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CustomFieldValue object creation - defaults to CreateOrEdit
		 * @return CustomFieldValueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCustomFieldValueId = QApplication::PathInfo(0);
			return CustomFieldValueMetaControl::Create($objParentObject, $intCustomFieldValueId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CustomFieldValueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CustomFieldValue object creation - defaults to CreateOrEdit
		 * @return CustomFieldValueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCustomFieldValueId = QApplication::QueryString('intCustomFieldValueId');
			return CustomFieldValueMetaControl::Create($objParentObject, $intCustomFieldValueId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblCustomFieldValueId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCustomFieldValueId_Create($strControlId = null) {
			$this->lblCustomFieldValueId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCustomFieldValueId->Name = QApplication::Translate('Custom Field Value Id');
			if ($this->blnEditMode)
				$this->lblCustomFieldValueId->Text = $this->objCustomFieldValue->CustomFieldValueId;
			else
				$this->lblCustomFieldValueId->Text = 'N/A';
			return $this->lblCustomFieldValueId;
		}

		/**
		 * Create and setup QListBox lstCustomField
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCustomField_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCustomField = new QListBox($this->objParentObject, $strControlId);
			$this->lstCustomField->Name = QApplication::Translate('Custom Field');
			$this->lstCustomField->Required = true;
			if (!$this->blnEditMode)
				$this->lstCustomField->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCustomFieldCursor = CustomField::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCustomField = CustomField::InstantiateCursor($objCustomFieldCursor)) {
				$objListItem = new QListItem($objCustomField->__toString(), $objCustomField->CustomFieldId);
				if (($this->objCustomFieldValue->CustomField) && ($this->objCustomFieldValue->CustomField->CustomFieldId == $objCustomField->CustomFieldId))
					$objListItem->Selected = true;
				$this->lstCustomField->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCustomField;
		}

		/**
		 * Create and setup QLabel lblCustomFieldId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCustomFieldId_Create($strControlId = null) {
			$this->lblCustomFieldId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCustomFieldId->Name = QApplication::Translate('Custom Field');
			$this->lblCustomFieldId->Text = ($this->objCustomFieldValue->CustomField) ? $this->objCustomFieldValue->CustomField->__toString() : null;
			$this->lblCustomFieldId->Required = true;
			return $this->lblCustomFieldId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCustomFieldValue->ShortDescription;
			$this->txtShortDescription->TextMode = QTextMode::MultiLine;
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
			$this->lblShortDescription->Text = $this->objCustomFieldValue->ShortDescription;
			return $this->lblShortDescription;
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
				if (($this->objCustomFieldValue->CreatedByObject) && ($this->objCustomFieldValue->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objCustomFieldValue->CreatedByObject) ? $this->objCustomFieldValue->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objCustomFieldValue->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objCustomFieldValue->CreationDate) ? $this->objCustomFieldValue->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objCustomFieldValue->ModifiedByObject) && ($this->objCustomFieldValue->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objCustomFieldValue->ModifiedByObject) ? $this->objCustomFieldValue->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objCustomFieldValue->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local CustomFieldValue object.
		 * @param boolean $blnReload reload CustomFieldValue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCustomFieldValue->Reload();

			if ($this->lblCustomFieldValueId) if ($this->blnEditMode) $this->lblCustomFieldValueId->Text = $this->objCustomFieldValue->CustomFieldValueId;

			if ($this->lstCustomField) {
					$this->lstCustomField->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCustomField->AddItem(QApplication::Translate('- Select One -'), null);
				$objCustomFieldArray = CustomField::LoadAll();
				if ($objCustomFieldArray) foreach ($objCustomFieldArray as $objCustomField) {
					$objListItem = new QListItem($objCustomField->__toString(), $objCustomField->CustomFieldId);
					if (($this->objCustomFieldValue->CustomField) && ($this->objCustomFieldValue->CustomField->CustomFieldId == $objCustomField->CustomFieldId))
						$objListItem->Selected = true;
					$this->lstCustomField->AddItem($objListItem);
				}
			}
			if ($this->lblCustomFieldId) $this->lblCustomFieldId->Text = ($this->objCustomFieldValue->CustomField) ? $this->objCustomFieldValue->CustomField->__toString() : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objCustomFieldValue->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objCustomFieldValue->ShortDescription;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objCustomFieldValue->CreatedByObject) && ($this->objCustomFieldValue->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objCustomFieldValue->CreatedByObject) ? $this->objCustomFieldValue->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objCustomFieldValue->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objCustomFieldValue->CreationDate) ? $this->objCustomFieldValue->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objCustomFieldValue->ModifiedByObject) && ($this->objCustomFieldValue->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objCustomFieldValue->ModifiedByObject) ? $this->objCustomFieldValue->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objCustomFieldValue->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CUSTOMFIELDVALUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CustomFieldValue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCustomFieldValue() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCustomField) $this->objCustomFieldValue->CustomFieldId = $this->lstCustomField->SelectedValue;
				if ($this->txtShortDescription) $this->objCustomFieldValue->ShortDescription = $this->txtShortDescription->Text;
				if ($this->lstCreatedByObject) $this->objCustomFieldValue->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objCustomFieldValue->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objCustomFieldValue->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CustomFieldValue object
				$this->objCustomFieldValue->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CustomFieldValue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCustomFieldValue() {
			$this->objCustomFieldValue->Delete();
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
				case 'CustomFieldValue': return $this->objCustomFieldValue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CustomFieldValue fields -- will be created dynamically if not yet created
				case 'CustomFieldValueIdControl':
					if (!$this->lblCustomFieldValueId) return $this->lblCustomFieldValueId_Create();
					return $this->lblCustomFieldValueId;
				case 'CustomFieldValueIdLabel':
					if (!$this->lblCustomFieldValueId) return $this->lblCustomFieldValueId_Create();
					return $this->lblCustomFieldValueId;
				case 'CustomFieldIdControl':
					if (!$this->lstCustomField) return $this->lstCustomField_Create();
					return $this->lstCustomField;
				case 'CustomFieldIdLabel':
					if (!$this->lblCustomFieldId) return $this->lblCustomFieldId_Create();
					return $this->lblCustomFieldId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
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
					// Controls that point to CustomFieldValue fields
					case 'CustomFieldValueIdControl':
						return ($this->lblCustomFieldValueId = QType::Cast($mixValue, 'QControl'));
					case 'CustomFieldIdControl':
						return ($this->lstCustomField = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
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