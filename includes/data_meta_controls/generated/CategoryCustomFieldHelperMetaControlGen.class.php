<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CategoryCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CategoryCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CategoryCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read CategoryCustomFieldHelper $CategoryCustomFieldHelper the actual CategoryCustomFieldHelper data class being edited
	 * property QListBox $CategoryIdControl
	 * property-read QLabel $CategoryIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CategoryCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CategoryCustomFieldHelper objCategoryCustomFieldHelper
		 * @access protected
		 */
		protected $objCategoryCustomFieldHelper;

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

		// Controls that allow the editing of CategoryCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstCategory;
         * @access protected
         */
		protected $lstCategory;


		// Controls that allow the viewing of CategoryCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblCategoryId
         * @access protected
         */
		protected $lblCategoryId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CategoryCustomFieldHelperMetaControl to edit a single CategoryCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CategoryCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryCustomFieldHelperMetaControl
		 * @param CategoryCustomFieldHelper $objCategoryCustomFieldHelper new or existing CategoryCustomFieldHelper object
		 */
		 public function __construct($objParentObject, CategoryCustomFieldHelper $objCategoryCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CategoryCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CategoryCustomFieldHelper object
			$this->objCategoryCustomFieldHelper = $objCategoryCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objCategoryCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryCustomFieldHelperMetaControl
		 * @param integer $intCategoryId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CategoryCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return CategoryCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intCategoryId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCategoryId)) {
				$objCategoryCustomFieldHelper = CategoryCustomFieldHelper::Load($intCategoryId);

				// CategoryCustomFieldHelper was found -- return it!
				if ($objCategoryCustomFieldHelper)
					return new CategoryCustomFieldHelperMetaControl($objParentObject, $objCategoryCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CategoryCustomFieldHelper object with PK arguments: ' . $intCategoryId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CategoryCustomFieldHelperMetaControl($objParentObject, new CategoryCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CategoryCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return CategoryCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCategoryId = QApplication::PathInfo(0);
			return CategoryCustomFieldHelperMetaControl::Create($objParentObject, $intCategoryId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CategoryCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return CategoryCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCategoryId = QApplication::QueryString('intCategoryId');
			return CategoryCustomFieldHelperMetaControl::Create($objParentObject, $intCategoryId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

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
			$this->lstCategory->Required = true;
			if (!$this->blnEditMode)
				$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCategoryCursor = Category::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCategory = Category::InstantiateCursor($objCategoryCursor)) {
				$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
				if (($this->objCategoryCustomFieldHelper->Category) && ($this->objCategoryCustomFieldHelper->Category->CategoryId == $objCategory->CategoryId))
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
			$this->lblCategoryId->Text = ($this->objCategoryCustomFieldHelper->Category) ? $this->objCategoryCustomFieldHelper->Category->__toString() : null;
			$this->lblCategoryId->Required = true;
			return $this->lblCategoryId;
		}



		/**
		 * Refresh this MetaControl with Data from the local CategoryCustomFieldHelper object.
		 * @param boolean $blnReload reload CategoryCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCategoryCustomFieldHelper->Reload();

			if ($this->lstCategory) {
					$this->lstCategory->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objCategoryArray = Category::LoadAll();
				if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
					$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
					if (($this->objCategoryCustomFieldHelper->Category) && ($this->objCategoryCustomFieldHelper->Category->CategoryId == $objCategory->CategoryId))
						$objListItem->Selected = true;
					$this->lstCategory->AddItem($objListItem);
				}
			}
			if ($this->lblCategoryId) $this->lblCategoryId->Text = ($this->objCategoryCustomFieldHelper->Category) ? $this->objCategoryCustomFieldHelper->Category->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CATEGORYCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CategoryCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCategoryCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCategory) $this->objCategoryCustomFieldHelper->CategoryId = $this->lstCategory->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CategoryCustomFieldHelper object
				$this->objCategoryCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CategoryCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCategoryCustomFieldHelper() {
			$this->objCategoryCustomFieldHelper->Delete();
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
				case 'CategoryCustomFieldHelper': return $this->objCategoryCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CategoryCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'CategoryIdControl':
					if (!$this->lstCategory) return $this->lstCategory_Create();
					return $this->lstCategory;
				case 'CategoryIdLabel':
					if (!$this->lblCategoryId) return $this->lblCategoryId_Create();
					return $this->lblCategoryId;
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
					// Controls that point to CategoryCustomFieldHelper fields
					case 'CategoryIdControl':
						return ($this->lstCategory = QType::Cast($mixValue, 'QControl'));
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