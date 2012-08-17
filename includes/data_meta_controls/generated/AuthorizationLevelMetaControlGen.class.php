<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AuthorizationLevel class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AuthorizationLevel object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AuthorizationLevelMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AuthorizationLevel $AuthorizationLevel the actual AuthorizationLevel data class being edited
	 * property QLabel $AuthorizationLevelIdControl
	 * property-read QLabel $AuthorizationLevelIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AuthorizationLevelMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AuthorizationLevel objAuthorizationLevel
		 * @access protected
		 */
		protected $objAuthorizationLevel;

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

		// Controls that allow the editing of AuthorizationLevel's individual data fields
        /**
         * @var QLabel lblAuthorizationLevelId;
         * @access protected
         */
		protected $lblAuthorizationLevelId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;


		// Controls that allow the viewing of AuthorizationLevel's individual data fields
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
		 * AuthorizationLevelMetaControl to edit a single AuthorizationLevel object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AuthorizationLevel object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationLevelMetaControl
		 * @param AuthorizationLevel $objAuthorizationLevel new or existing AuthorizationLevel object
		 */
		 public function __construct($objParentObject, AuthorizationLevel $objAuthorizationLevel) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AuthorizationLevelMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AuthorizationLevel object
			$this->objAuthorizationLevel = $objAuthorizationLevel;

			// Figure out if we're Editing or Creating New
			if ($this->objAuthorizationLevel->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationLevelMetaControl
		 * @param integer $intAuthorizationLevelId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AuthorizationLevel object creation - defaults to CreateOrEdit
 		 * @return AuthorizationLevelMetaControl
		 */
		public static function Create($objParentObject, $intAuthorizationLevelId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAuthorizationLevelId)) {
				$objAuthorizationLevel = AuthorizationLevel::Load($intAuthorizationLevelId);

				// AuthorizationLevel was found -- return it!
				if ($objAuthorizationLevel)
					return new AuthorizationLevelMetaControl($objParentObject, $objAuthorizationLevel);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AuthorizationLevel object with PK arguments: ' . $intAuthorizationLevelId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AuthorizationLevelMetaControl($objParentObject, new AuthorizationLevel());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationLevelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AuthorizationLevel object creation - defaults to CreateOrEdit
		 * @return AuthorizationLevelMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAuthorizationLevelId = QApplication::PathInfo(0);
			return AuthorizationLevelMetaControl::Create($objParentObject, $intAuthorizationLevelId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationLevelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AuthorizationLevel object creation - defaults to CreateOrEdit
		 * @return AuthorizationLevelMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAuthorizationLevelId = QApplication::QueryString('intAuthorizationLevelId');
			return AuthorizationLevelMetaControl::Create($objParentObject, $intAuthorizationLevelId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAuthorizationLevelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizationLevelId_Create($strControlId = null) {
			$this->lblAuthorizationLevelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizationLevelId->Name = QApplication::Translate('Authorization Level Id');
			if ($this->blnEditMode)
				$this->lblAuthorizationLevelId->Text = $this->objAuthorizationLevel->AuthorizationLevelId;
			else
				$this->lblAuthorizationLevelId->Text = 'N/A';
			return $this->lblAuthorizationLevelId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAuthorizationLevel->ShortDescription;
			$this->txtShortDescription->MaxLength = AuthorizationLevel::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objAuthorizationLevel->ShortDescription;
			return $this->lblShortDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local AuthorizationLevel object.
		 * @param boolean $blnReload reload AuthorizationLevel from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAuthorizationLevel->Reload();

			if ($this->lblAuthorizationLevelId) if ($this->blnEditMode) $this->lblAuthorizationLevelId->Text = $this->objAuthorizationLevel->AuthorizationLevelId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objAuthorizationLevel->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objAuthorizationLevel->ShortDescription;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC AUTHORIZATIONLEVEL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AuthorizationLevel instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAuthorizationLevel() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objAuthorizationLevel->ShortDescription = $this->txtShortDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AuthorizationLevel object
				$this->objAuthorizationLevel->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AuthorizationLevel instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAuthorizationLevel() {
			$this->objAuthorizationLevel->Delete();
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
				case 'AuthorizationLevel': return $this->objAuthorizationLevel;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AuthorizationLevel fields -- will be created dynamically if not yet created
				case 'AuthorizationLevelIdControl':
					if (!$this->lblAuthorizationLevelId) return $this->lblAuthorizationLevelId_Create();
					return $this->lblAuthorizationLevelId;
				case 'AuthorizationLevelIdLabel':
					if (!$this->lblAuthorizationLevelId) return $this->lblAuthorizationLevelId_Create();
					return $this->lblAuthorizationLevelId;
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
					// Controls that point to AuthorizationLevel fields
					case 'AuthorizationLevelIdControl':
						return ($this->lblAuthorizationLevelId = QType::Cast($mixValue, 'QControl'));
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