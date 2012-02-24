<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the EntityQtypeCustomField class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single EntityQtypeCustomField object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EntityQtypeCustomFieldMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read EntityQtypeCustomField $EntityQtypeCustomField the actual EntityQtypeCustomField data class being edited
	 * property QLabel $EntityQtypeCustomFieldIdControl
	 * property-read QLabel $EntityQtypeCustomFieldIdLabel
	 * property QListBox $EntityQtypeIdControl
	 * property-read QLabel $EntityQtypeIdLabel
	 * property QListBox $CustomFieldIdControl
	 * property-read QLabel $CustomFieldIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EntityQtypeCustomFieldMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var EntityQtypeCustomField objEntityQtypeCustomField
		 * @access protected
		 */
		protected $objEntityQtypeCustomField;

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

		// Controls that allow the editing of EntityQtypeCustomField's individual data fields
        /**
         * @var QLabel lblEntityQtypeCustomFieldId;
         * @access protected
         */
		protected $lblEntityQtypeCustomFieldId;

        /**
         * @var QListBox lstEntityQtype;
         * @access protected
         */
		protected $lstEntityQtype;

        /**
         * @var QListBox lstCustomField;
         * @access protected
         */
		protected $lstCustomField;


		// Controls that allow the viewing of EntityQtypeCustomField's individual data fields
        /**
         * @var QLabel lblEntityQtypeId
         * @access protected
         */
		protected $lblEntityQtypeId;

        /**
         * @var QLabel lblCustomFieldId
         * @access protected
         */
		protected $lblCustomFieldId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EntityQtypeCustomFieldMetaControl to edit a single EntityQtypeCustomField object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single EntityQtypeCustomField object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EntityQtypeCustomFieldMetaControl
		 * @param EntityQtypeCustomField $objEntityQtypeCustomField new or existing EntityQtypeCustomField object
		 */
		 public function __construct($objParentObject, EntityQtypeCustomField $objEntityQtypeCustomField) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EntityQtypeCustomFieldMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked EntityQtypeCustomField object
			$this->objEntityQtypeCustomField = $objEntityQtypeCustomField;

			// Figure out if we're Editing or Creating New
			if ($this->objEntityQtypeCustomField->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EntityQtypeCustomFieldMetaControl
		 * @param integer $intEntityQtypeCustomFieldId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing EntityQtypeCustomField object creation - defaults to CreateOrEdit
 		 * @return EntityQtypeCustomFieldMetaControl
		 */
		public static function Create($objParentObject, $intEntityQtypeCustomFieldId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intEntityQtypeCustomFieldId)) {
				$objEntityQtypeCustomField = EntityQtypeCustomField::Load($intEntityQtypeCustomFieldId);

				// EntityQtypeCustomField was found -- return it!
				if ($objEntityQtypeCustomField)
					return new EntityQtypeCustomFieldMetaControl($objParentObject, $objEntityQtypeCustomField);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a EntityQtypeCustomField object with PK arguments: ' . $intEntityQtypeCustomFieldId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EntityQtypeCustomFieldMetaControl($objParentObject, new EntityQtypeCustomField());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EntityQtypeCustomFieldMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EntityQtypeCustomField object creation - defaults to CreateOrEdit
		 * @return EntityQtypeCustomFieldMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intEntityQtypeCustomFieldId = QApplication::PathInfo(0);
			return EntityQtypeCustomFieldMetaControl::Create($objParentObject, $intEntityQtypeCustomFieldId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EntityQtypeCustomFieldMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EntityQtypeCustomField object creation - defaults to CreateOrEdit
		 * @return EntityQtypeCustomFieldMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intEntityQtypeCustomFieldId = QApplication::QueryString('intEntityQtypeCustomFieldId');
			return EntityQtypeCustomFieldMetaControl::Create($objParentObject, $intEntityQtypeCustomFieldId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblEntityQtypeCustomFieldId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEntityQtypeCustomFieldId_Create($strControlId = null) {
			$this->lblEntityQtypeCustomFieldId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEntityQtypeCustomFieldId->Name = QApplication::Translate('Entity Qtype Custom Field Id');
			if ($this->blnEditMode)
				$this->lblEntityQtypeCustomFieldId->Text = $this->objEntityQtypeCustomField->EntityQtypeCustomFieldId;
			else
				$this->lblEntityQtypeCustomFieldId->Text = 'N/A';
			return $this->lblEntityQtypeCustomFieldId;
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

			$this->lstEntityQtype->AddItems(EntityQtype::$NameArray, $this->objEntityQtypeCustomField->EntityQtypeId);
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
			$this->lblEntityQtypeId->Text = ($this->objEntityQtypeCustomField->EntityQtypeId) ? EntityQtype::$NameArray[$this->objEntityQtypeCustomField->EntityQtypeId] : null;
			$this->lblEntityQtypeId->Required = true;
			return $this->lblEntityQtypeId;
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
				if (($this->objEntityQtypeCustomField->CustomField) && ($this->objEntityQtypeCustomField->CustomField->CustomFieldId == $objCustomField->CustomFieldId))
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
			$this->lblCustomFieldId->Text = ($this->objEntityQtypeCustomField->CustomField) ? $this->objEntityQtypeCustomField->CustomField->__toString() : null;
			$this->lblCustomFieldId->Required = true;
			return $this->lblCustomFieldId;
		}



		/**
		 * Refresh this MetaControl with Data from the local EntityQtypeCustomField object.
		 * @param boolean $blnReload reload EntityQtypeCustomField from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEntityQtypeCustomField->Reload();

			if ($this->lblEntityQtypeCustomFieldId) if ($this->blnEditMode) $this->lblEntityQtypeCustomFieldId->Text = $this->objEntityQtypeCustomField->EntityQtypeCustomFieldId;

			if ($this->lstEntityQtype) $this->lstEntityQtype->SelectedValue = $this->objEntityQtypeCustomField->EntityQtypeId;
			if ($this->lblEntityQtypeId) $this->lblEntityQtypeId->Text = ($this->objEntityQtypeCustomField->EntityQtypeId) ? EntityQtype::$NameArray[$this->objEntityQtypeCustomField->EntityQtypeId] : null;

			if ($this->lstCustomField) {
					$this->lstCustomField->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCustomField->AddItem(QApplication::Translate('- Select One -'), null);
				$objCustomFieldArray = CustomField::LoadAll();
				if ($objCustomFieldArray) foreach ($objCustomFieldArray as $objCustomField) {
					$objListItem = new QListItem($objCustomField->__toString(), $objCustomField->CustomFieldId);
					if (($this->objEntityQtypeCustomField->CustomField) && ($this->objEntityQtypeCustomField->CustomField->CustomFieldId == $objCustomField->CustomFieldId))
						$objListItem->Selected = true;
					$this->lstCustomField->AddItem($objListItem);
				}
			}
			if ($this->lblCustomFieldId) $this->lblCustomFieldId->Text = ($this->objEntityQtypeCustomField->CustomField) ? $this->objEntityQtypeCustomField->CustomField->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ENTITYQTYPECUSTOMFIELD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's EntityQtypeCustomField instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEntityQtypeCustomField() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEntityQtype) $this->objEntityQtypeCustomField->EntityQtypeId = $this->lstEntityQtype->SelectedValue;
				if ($this->lstCustomField) $this->objEntityQtypeCustomField->CustomFieldId = $this->lstCustomField->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the EntityQtypeCustomField object
				$this->objEntityQtypeCustomField->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's EntityQtypeCustomField instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEntityQtypeCustomField() {
			$this->objEntityQtypeCustomField->Delete();
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
				case 'EntityQtypeCustomField': return $this->objEntityQtypeCustomField;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to EntityQtypeCustomField fields -- will be created dynamically if not yet created
				case 'EntityQtypeCustomFieldIdControl':
					if (!$this->lblEntityQtypeCustomFieldId) return $this->lblEntityQtypeCustomFieldId_Create();
					return $this->lblEntityQtypeCustomFieldId;
				case 'EntityQtypeCustomFieldIdLabel':
					if (!$this->lblEntityQtypeCustomFieldId) return $this->lblEntityQtypeCustomFieldId_Create();
					return $this->lblEntityQtypeCustomFieldId;
				case 'EntityQtypeIdControl':
					if (!$this->lstEntityQtype) return $this->lstEntityQtype_Create();
					return $this->lstEntityQtype;
				case 'EntityQtypeIdLabel':
					if (!$this->lblEntityQtypeId) return $this->lblEntityQtypeId_Create();
					return $this->lblEntityQtypeId;
				case 'CustomFieldIdControl':
					if (!$this->lstCustomField) return $this->lstCustomField_Create();
					return $this->lstCustomField;
				case 'CustomFieldIdLabel':
					if (!$this->lblCustomFieldId) return $this->lblCustomFieldId_Create();
					return $this->lblCustomFieldId;
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
					// Controls that point to EntityQtypeCustomField fields
					case 'EntityQtypeCustomFieldIdControl':
						return ($this->lblEntityQtypeCustomFieldId = QType::Cast($mixValue, 'QControl'));
					case 'EntityQtypeIdControl':
						return ($this->lstEntityQtype = QType::Cast($mixValue, 'QControl'));
					case 'CustomFieldIdControl':
						return ($this->lstCustomField = QType::Cast($mixValue, 'QControl'));
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