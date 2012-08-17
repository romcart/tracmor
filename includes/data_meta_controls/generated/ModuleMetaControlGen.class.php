<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Module class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Module object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ModuleMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Module $Module the actual Module data class being edited
	 * property QLabel $ModuleIdControl
	 * property-read QLabel $ModuleIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ModuleMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Module objModule
		 * @access protected
		 */
		protected $objModule;

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

		// Controls that allow the editing of Module's individual data fields
        /**
         * @var QLabel lblModuleId;
         * @access protected
         */
		protected $lblModuleId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;


		// Controls that allow the viewing of Module's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ModuleMetaControl to edit a single Module object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Module object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ModuleMetaControl
		 * @param Module $objModule new or existing Module object
		 */
		 public function __construct($objParentObject, Module $objModule) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ModuleMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Module object
			$this->objModule = $objModule;

			// Figure out if we're Editing or Creating New
			if ($this->objModule->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ModuleMetaControl
		 * @param integer $intModuleId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Module object creation - defaults to CreateOrEdit
 		 * @return ModuleMetaControl
		 */
		public static function Create($objParentObject, $intModuleId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intModuleId)) {
				$objModule = Module::Load($intModuleId);

				// Module was found -- return it!
				if ($objModule)
					return new ModuleMetaControl($objParentObject, $objModule);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Module object with PK arguments: ' . $intModuleId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ModuleMetaControl($objParentObject, new Module());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ModuleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Module object creation - defaults to CreateOrEdit
		 * @return ModuleMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intModuleId = QApplication::PathInfo(0);
			return ModuleMetaControl::Create($objParentObject, $intModuleId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ModuleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Module object creation - defaults to CreateOrEdit
		 * @return ModuleMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intModuleId = QApplication::QueryString('intModuleId');
			return ModuleMetaControl::Create($objParentObject, $intModuleId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblModuleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModuleId_Create($strControlId = null) {
			$this->lblModuleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblModuleId->Name = QApplication::Translate('Module Id');
			if ($this->blnEditMode)
				$this->lblModuleId->Text = $this->objModule->ModuleId;
			else
				$this->lblModuleId->Text = 'N/A';
			return $this->lblModuleId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objModule->ShortDescription;
			$this->txtShortDescription->MaxLength = Module::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objModule->ShortDescription;
			return $this->lblShortDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local Module object.
		 * @param boolean $blnReload reload Module from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objModule->Reload();

			if ($this->lblModuleId) if ($this->blnEditMode) $this->lblModuleId->Text = $this->objModule->ModuleId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objModule->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objModule->ShortDescription;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MODULE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Module instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveModule() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objModule->ShortDescription = $this->txtShortDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Module object
				$this->objModule->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Module instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteModule() {
			$this->objModule->Delete();
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
				case 'Module': return $this->objModule;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Module fields -- will be created dynamically if not yet created
				case 'ModuleIdControl':
					if (!$this->lblModuleId) return $this->lblModuleId_Create();
					return $this->lblModuleId;
				case 'ModuleIdLabel':
					if (!$this->lblModuleId) return $this->lblModuleId_Create();
					return $this->lblModuleId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
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
					// Controls that point to Module fields
					case 'ModuleIdControl':
						return ($this->lblModuleId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
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