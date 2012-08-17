<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AdminSetting class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AdminSetting object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AdminSettingMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AdminSetting $AdminSetting the actual AdminSetting data class being edited
	 * property QLabel $SettingIdControl
	 * property-read QLabel $SettingIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AdminSettingMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AdminSetting objAdminSetting
		 * @access protected
		 */
		protected $objAdminSetting;

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

		// Controls that allow the editing of AdminSetting's individual data fields
        /**
         * @var QLabel lblSettingId;
         * @access protected
         */
		protected $lblSettingId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtValue;
         * @access protected
         */
		protected $txtValue;


		// Controls that allow the viewing of AdminSetting's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblValue
         * @access protected
         */
		protected $lblValue;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AdminSettingMetaControl to edit a single AdminSetting object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AdminSetting object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AdminSettingMetaControl
		 * @param AdminSetting $objAdminSetting new or existing AdminSetting object
		 */
		 public function __construct($objParentObject, AdminSetting $objAdminSetting) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AdminSettingMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AdminSetting object
			$this->objAdminSetting = $objAdminSetting;

			// Figure out if we're Editing or Creating New
			if ($this->objAdminSetting->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AdminSettingMetaControl
		 * @param integer $intSettingId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AdminSetting object creation - defaults to CreateOrEdit
 		 * @return AdminSettingMetaControl
		 */
		public static function Create($objParentObject, $intSettingId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intSettingId)) {
				$objAdminSetting = AdminSetting::Load($intSettingId);

				// AdminSetting was found -- return it!
				if ($objAdminSetting)
					return new AdminSettingMetaControl($objParentObject, $objAdminSetting);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AdminSetting object with PK arguments: ' . $intSettingId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AdminSettingMetaControl($objParentObject, new AdminSetting());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AdminSettingMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AdminSetting object creation - defaults to CreateOrEdit
		 * @return AdminSettingMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSettingId = QApplication::PathInfo(0);
			return AdminSettingMetaControl::Create($objParentObject, $intSettingId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AdminSettingMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AdminSetting object creation - defaults to CreateOrEdit
		 * @return AdminSettingMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSettingId = QApplication::QueryString('intSettingId');
			return AdminSettingMetaControl::Create($objParentObject, $intSettingId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblSettingId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSettingId_Create($strControlId = null) {
			$this->lblSettingId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSettingId->Name = QApplication::Translate('Setting Id');
			if ($this->blnEditMode)
				$this->lblSettingId->Text = $this->objAdminSetting->SettingId;
			else
				$this->lblSettingId->Text = 'N/A';
			return $this->lblSettingId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAdminSetting->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = AdminSetting::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objAdminSetting->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objAdminSetting->Value;
			$this->txtValue->TextMode = QTextMode::MultiLine;
			return $this->txtValue;
		}

		/**
		 * Create and setup QLabel lblValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblValue_Create($strControlId = null) {
			$this->lblValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblValue->Name = QApplication::Translate('Value');
			$this->lblValue->Text = $this->objAdminSetting->Value;
			return $this->lblValue;
		}



		/**
		 * Refresh this MetaControl with Data from the local AdminSetting object.
		 * @param boolean $blnReload reload AdminSetting from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAdminSetting->Reload();

			if ($this->lblSettingId) if ($this->blnEditMode) $this->lblSettingId->Text = $this->objAdminSetting->SettingId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objAdminSetting->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objAdminSetting->ShortDescription;

			if ($this->txtValue) $this->txtValue->Text = $this->objAdminSetting->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objAdminSetting->Value;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ADMINSETTING OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AdminSetting instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAdminSetting() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objAdminSetting->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtValue) $this->objAdminSetting->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AdminSetting object
				$this->objAdminSetting->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AdminSetting instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAdminSetting() {
			$this->objAdminSetting->Delete();
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
				case 'AdminSetting': return $this->objAdminSetting;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AdminSetting fields -- will be created dynamically if not yet created
				case 'SettingIdControl':
					if (!$this->lblSettingId) return $this->lblSettingId_Create();
					return $this->lblSettingId;
				case 'SettingIdLabel':
					if (!$this->lblSettingId) return $this->lblSettingId_Create();
					return $this->lblSettingId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'ValueControl':
					if (!$this->txtValue) return $this->txtValue_Create();
					return $this->txtValue;
				case 'ValueLabel':
					if (!$this->lblValue) return $this->lblValue_Create();
					return $this->lblValue;
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
					// Controls that point to AdminSetting fields
					case 'SettingIdControl':
						return ($this->lblSettingId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
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