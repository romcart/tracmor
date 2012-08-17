<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ManufacturerCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ManufacturerCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ManufacturerCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ManufacturerCustomFieldHelper $ManufacturerCustomFieldHelper the actual ManufacturerCustomFieldHelper data class being edited
	 * property QListBox $ManufacturerIdControl
	 * property-read QLabel $ManufacturerIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ManufacturerCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ManufacturerCustomFieldHelper objManufacturerCustomFieldHelper
		 * @access protected
		 */
		protected $objManufacturerCustomFieldHelper;

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

		// Controls that allow the editing of ManufacturerCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstManufacturer;
         * @access protected
         */
		protected $lstManufacturer;


		// Controls that allow the viewing of ManufacturerCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblManufacturerId
         * @access protected
         */
		protected $lblManufacturerId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ManufacturerCustomFieldHelperMetaControl to edit a single ManufacturerCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ManufacturerCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerCustomFieldHelperMetaControl
		 * @param ManufacturerCustomFieldHelper $objManufacturerCustomFieldHelper new or existing ManufacturerCustomFieldHelper object
		 */
		 public function __construct($objParentObject, ManufacturerCustomFieldHelper $objManufacturerCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ManufacturerCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ManufacturerCustomFieldHelper object
			$this->objManufacturerCustomFieldHelper = $objManufacturerCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objManufacturerCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerCustomFieldHelperMetaControl
		 * @param integer $intManufacturerId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ManufacturerCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return ManufacturerCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intManufacturerId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intManufacturerId)) {
				$objManufacturerCustomFieldHelper = ManufacturerCustomFieldHelper::Load($intManufacturerId);

				// ManufacturerCustomFieldHelper was found -- return it!
				if ($objManufacturerCustomFieldHelper)
					return new ManufacturerCustomFieldHelperMetaControl($objParentObject, $objManufacturerCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ManufacturerCustomFieldHelper object with PK arguments: ' . $intManufacturerId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ManufacturerCustomFieldHelperMetaControl($objParentObject, new ManufacturerCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ManufacturerCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ManufacturerCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intManufacturerId = QApplication::PathInfo(0);
			return ManufacturerCustomFieldHelperMetaControl::Create($objParentObject, $intManufacturerId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ManufacturerCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ManufacturerCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ManufacturerCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intManufacturerId = QApplication::QueryString('intManufacturerId');
			return ManufacturerCustomFieldHelperMetaControl::Create($objParentObject, $intManufacturerId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

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
			$this->lstManufacturer->Required = true;
			if (!$this->blnEditMode)
				$this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objManufacturerCursor = Manufacturer::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objManufacturer = Manufacturer::InstantiateCursor($objManufacturerCursor)) {
				$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
				if (($this->objManufacturerCustomFieldHelper->Manufacturer) && ($this->objManufacturerCustomFieldHelper->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
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
			$this->lblManufacturerId->Text = ($this->objManufacturerCustomFieldHelper->Manufacturer) ? $this->objManufacturerCustomFieldHelper->Manufacturer->__toString() : null;
			$this->lblManufacturerId->Required = true;
			return $this->lblManufacturerId;
		}



		/**
		 * Refresh this MetaControl with Data from the local ManufacturerCustomFieldHelper object.
		 * @param boolean $blnReload reload ManufacturerCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objManufacturerCustomFieldHelper->Reload();

			if ($this->lstManufacturer) {
					$this->lstManufacturer->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);
				$objManufacturerArray = Manufacturer::LoadAll();
				if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
					$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
					if (($this->objManufacturerCustomFieldHelper->Manufacturer) && ($this->objManufacturerCustomFieldHelper->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
						$objListItem->Selected = true;
					$this->lstManufacturer->AddItem($objListItem);
				}
			}
			if ($this->lblManufacturerId) $this->lblManufacturerId->Text = ($this->objManufacturerCustomFieldHelper->Manufacturer) ? $this->objManufacturerCustomFieldHelper->Manufacturer->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MANUFACTURERCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ManufacturerCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveManufacturerCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstManufacturer) $this->objManufacturerCustomFieldHelper->ManufacturerId = $this->lstManufacturer->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ManufacturerCustomFieldHelper object
				$this->objManufacturerCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ManufacturerCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteManufacturerCustomFieldHelper() {
			$this->objManufacturerCustomFieldHelper->Delete();
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
				case 'ManufacturerCustomFieldHelper': return $this->objManufacturerCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ManufacturerCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'ManufacturerIdControl':
					if (!$this->lstManufacturer) return $this->lstManufacturer_Create();
					return $this->lstManufacturer;
				case 'ManufacturerIdLabel':
					if (!$this->lblManufacturerId) return $this->lblManufacturerId_Create();
					return $this->lblManufacturerId;
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
					// Controls that point to ManufacturerCustomFieldHelper fields
					case 'ManufacturerIdControl':
						return ($this->lstManufacturer = QType::Cast($mixValue, 'QControl'));
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