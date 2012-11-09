<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DepreciationClass class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DepreciationClass object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DepreciationClassMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DepreciationClass $DepreciationClass the actual DepreciationClass data class being edited
	 * property QLabel $DepreciationClassIdControl
	 * property-read QLabel $DepreciationClassIdLabel
	 * property QListBox $DepreciationMethodQtypeIdControl
	 * property-read QLabel $DepreciationMethodQtypeIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QIntegerTextBox $LifeControl
	 * property-read QLabel $LifeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DepreciationClassMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DepreciationClass objDepreciationClass
		 * @access protected
		 */
		protected $objDepreciationClass;

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

		// Controls that allow the editing of DepreciationClass's individual data fields
        /**
         * @var QLabel lblDepreciationClassId;
         * @access protected
         */
		protected $lblDepreciationClassId;

        /**
         * @var QListBox lstDepreciationMethodQtype;
         * @access protected
         */
		protected $lstDepreciationMethodQtype;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QIntegerTextBox txtLife;
         * @access protected
         */
		protected $txtLife;


		// Controls that allow the viewing of DepreciationClass's individual data fields
        /**
         * @var QLabel lblDepreciationMethodQtypeId
         * @access protected
         */
		protected $lblDepreciationMethodQtypeId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblLife
         * @access protected
         */
		protected $lblLife;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DepreciationClassMetaControl to edit a single DepreciationClass object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DepreciationClass object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DepreciationClassMetaControl
		 * @param DepreciationClass $objDepreciationClass new or existing DepreciationClass object
		 */
		 public function __construct($objParentObject, DepreciationClass $objDepreciationClass) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DepreciationClassMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DepreciationClass object
			$this->objDepreciationClass = $objDepreciationClass;

			// Figure out if we're Editing or Creating New
			if ($this->objDepreciationClass->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DepreciationClassMetaControl
		 * @param integer $intDepreciationClassId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DepreciationClass object creation - defaults to CreateOrEdit
 		 * @return DepreciationClassMetaControl
		 */
		public static function Create($objParentObject, $intDepreciationClassId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intDepreciationClassId)) {
				$objDepreciationClass = DepreciationClass::Load($intDepreciationClassId);

				// DepreciationClass was found -- return it!
				if ($objDepreciationClass)
					return new DepreciationClassMetaControl($objParentObject, $objDepreciationClass);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DepreciationClass object with PK arguments: ' . $intDepreciationClassId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DepreciationClassMetaControl($objParentObject, new DepreciationClass());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DepreciationClassMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DepreciationClass object creation - defaults to CreateOrEdit
		 * @return DepreciationClassMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDepreciationClassId = QApplication::PathInfo(0);
			return DepreciationClassMetaControl::Create($objParentObject, $intDepreciationClassId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DepreciationClassMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DepreciationClass object creation - defaults to CreateOrEdit
		 * @return DepreciationClassMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDepreciationClassId = QApplication::QueryString('intDepreciationClassId');
			return DepreciationClassMetaControl::Create($objParentObject, $intDepreciationClassId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblDepreciationClassId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDepreciationClassId_Create($strControlId = null) {
			$this->lblDepreciationClassId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDepreciationClassId->Name = QApplication::Translate('Depreciation Class Id');
			if ($this->blnEditMode)
				$this->lblDepreciationClassId->Text = $this->objDepreciationClass->DepreciationClassId;
			else
				$this->lblDepreciationClassId->Text = 'N/A';
			return $this->lblDepreciationClassId;
		}

		/**
		 * Create and setup QListBox lstDepreciationMethodQtype
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstDepreciationMethodQtype_Create($strControlId = null) {
			$this->lstDepreciationMethodQtype = new QListBox($this->objParentObject, $strControlId);
			$this->lstDepreciationMethodQtype->Name = QApplication::Translate('Depreciation Method Qtype');
			$this->lstDepreciationMethodQtype->Required = true;

			$this->lstDepreciationMethodQtype->AddItems(DepreciationMethodQtype::$NameArray, $this->objDepreciationClass->DepreciationMethodQtypeId);
			return $this->lstDepreciationMethodQtype;
		}

		/**
		 * Create and setup QLabel lblDepreciationMethodQtypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDepreciationMethodQtypeId_Create($strControlId = null) {
			$this->lblDepreciationMethodQtypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDepreciationMethodQtypeId->Name = QApplication::Translate('Depreciation Method Qtype');
			$this->lblDepreciationMethodQtypeId->Text = ($this->objDepreciationClass->DepreciationMethodQtypeId) ? DepreciationMethodQtype::$NameArray[$this->objDepreciationClass->DepreciationMethodQtypeId] : null;
			$this->lblDepreciationMethodQtypeId->Required = true;
			return $this->lblDepreciationMethodQtypeId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objDepreciationClass->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = DepreciationClass::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objDepreciationClass->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QIntegerTextBox txtLife
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtLife_Create($strControlId = null) {
			$this->txtLife = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtLife->Name = QApplication::Translate('Life');
			$this->txtLife->Text = $this->objDepreciationClass->Life;
			return $this->txtLife;
		}

		/**
		 * Create and setup QLabel lblLife
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblLife_Create($strControlId = null, $strFormat = null) {
			$this->lblLife = new QLabel($this->objParentObject, $strControlId);
			$this->lblLife->Name = QApplication::Translate('Life');
			$this->lblLife->Text = $this->objDepreciationClass->Life;
			$this->lblLife->Format = $strFormat;
			return $this->lblLife;
		}



		/**
		 * Refresh this MetaControl with Data from the local DepreciationClass object.
		 * @param boolean $blnReload reload DepreciationClass from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDepreciationClass->Reload();

			if ($this->lblDepreciationClassId) if ($this->blnEditMode) $this->lblDepreciationClassId->Text = $this->objDepreciationClass->DepreciationClassId;

			if ($this->lstDepreciationMethodQtype) $this->lstDepreciationMethodQtype->SelectedValue = $this->objDepreciationClass->DepreciationMethodQtypeId;
			if ($this->lblDepreciationMethodQtypeId) $this->lblDepreciationMethodQtypeId->Text = ($this->objDepreciationClass->DepreciationMethodQtypeId) ? DepreciationMethodQtype::$NameArray[$this->objDepreciationClass->DepreciationMethodQtypeId] : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objDepreciationClass->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objDepreciationClass->ShortDescription;

			if ($this->txtLife) $this->txtLife->Text = $this->objDepreciationClass->Life;
			if ($this->lblLife) $this->lblLife->Text = $this->objDepreciationClass->Life;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DEPRECIATIONCLASS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DepreciationClass instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDepreciationClass() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstDepreciationMethodQtype) $this->objDepreciationClass->DepreciationMethodQtypeId = $this->lstDepreciationMethodQtype->SelectedValue;
				if ($this->txtShortDescription) $this->objDepreciationClass->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLife) $this->objDepreciationClass->Life = $this->txtLife->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DepreciationClass object
				$this->objDepreciationClass->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DepreciationClass instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDepreciationClass() {
			$this->objDepreciationClass->Delete();
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
				case 'DepreciationClass': return $this->objDepreciationClass;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DepreciationClass fields -- will be created dynamically if not yet created
				case 'DepreciationClassIdControl':
					if (!$this->lblDepreciationClassId) return $this->lblDepreciationClassId_Create();
					return $this->lblDepreciationClassId;
				case 'DepreciationClassIdLabel':
					if (!$this->lblDepreciationClassId) return $this->lblDepreciationClassId_Create();
					return $this->lblDepreciationClassId;
				case 'DepreciationMethodQtypeIdControl':
					if (!$this->lstDepreciationMethodQtype) return $this->lstDepreciationMethodQtype_Create();
					return $this->lstDepreciationMethodQtype;
				case 'DepreciationMethodQtypeIdLabel':
					if (!$this->lblDepreciationMethodQtypeId) return $this->lblDepreciationMethodQtypeId_Create();
					return $this->lblDepreciationMethodQtypeId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'LifeControl':
					if (!$this->txtLife) return $this->txtLife_Create();
					return $this->txtLife;
				case 'LifeLabel':
					if (!$this->lblLife) return $this->lblLife_Create();
					return $this->lblLife;
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
					// Controls that point to DepreciationClass fields
					case 'DepreciationClassIdControl':
						return ($this->lblDepreciationClassId = QType::Cast($mixValue, 'QControl'));
					case 'DepreciationMethodQtypeIdControl':
						return ($this->lstDepreciationMethodQtype = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LifeControl':
						return ($this->txtLife = QType::Cast($mixValue, 'QControl'));
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