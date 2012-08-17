<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Authorization class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Authorization object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AuthorizationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Authorization $Authorization the actual Authorization data class being edited
	 * property QLabel $AuthorizationIdControl
	 * property-read QLabel $AuthorizationIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AuthorizationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Authorization objAuthorization
		 * @access protected
		 */
		protected $objAuthorization;

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

		// Controls that allow the editing of Authorization's individual data fields
        /**
         * @var QLabel lblAuthorizationId;
         * @access protected
         */
		protected $lblAuthorizationId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;


		// Controls that allow the viewing of Authorization's individual data fields
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
		 * AuthorizationMetaControl to edit a single Authorization object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Authorization object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationMetaControl
		 * @param Authorization $objAuthorization new or existing Authorization object
		 */
		 public function __construct($objParentObject, Authorization $objAuthorization) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AuthorizationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Authorization object
			$this->objAuthorization = $objAuthorization;

			// Figure out if we're Editing or Creating New
			if ($this->objAuthorization->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationMetaControl
		 * @param integer $intAuthorizationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Authorization object creation - defaults to CreateOrEdit
 		 * @return AuthorizationMetaControl
		 */
		public static function Create($objParentObject, $intAuthorizationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAuthorizationId)) {
				$objAuthorization = Authorization::Load($intAuthorizationId);

				// Authorization was found -- return it!
				if ($objAuthorization)
					return new AuthorizationMetaControl($objParentObject, $objAuthorization);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Authorization object with PK arguments: ' . $intAuthorizationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AuthorizationMetaControl($objParentObject, new Authorization());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Authorization object creation - defaults to CreateOrEdit
		 * @return AuthorizationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAuthorizationId = QApplication::PathInfo(0);
			return AuthorizationMetaControl::Create($objParentObject, $intAuthorizationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuthorizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Authorization object creation - defaults to CreateOrEdit
		 * @return AuthorizationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAuthorizationId = QApplication::QueryString('intAuthorizationId');
			return AuthorizationMetaControl::Create($objParentObject, $intAuthorizationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAuthorizationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizationId_Create($strControlId = null) {
			$this->lblAuthorizationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizationId->Name = QApplication::Translate('Authorization Id');
			if ($this->blnEditMode)
				$this->lblAuthorizationId->Text = $this->objAuthorization->AuthorizationId;
			else
				$this->lblAuthorizationId->Text = 'N/A';
			return $this->lblAuthorizationId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAuthorization->ShortDescription;
			$this->txtShortDescription->MaxLength = Authorization::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objAuthorization->ShortDescription;
			return $this->lblShortDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local Authorization object.
		 * @param boolean $blnReload reload Authorization from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAuthorization->Reload();

			if ($this->lblAuthorizationId) if ($this->blnEditMode) $this->lblAuthorizationId->Text = $this->objAuthorization->AuthorizationId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objAuthorization->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objAuthorization->ShortDescription;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC AUTHORIZATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Authorization instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAuthorization() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objAuthorization->ShortDescription = $this->txtShortDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Authorization object
				$this->objAuthorization->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Authorization instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAuthorization() {
			$this->objAuthorization->Delete();
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
				case 'Authorization': return $this->objAuthorization;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Authorization fields -- will be created dynamically if not yet created
				case 'AuthorizationIdControl':
					if (!$this->lblAuthorizationId) return $this->lblAuthorizationId_Create();
					return $this->lblAuthorizationId;
				case 'AuthorizationIdLabel':
					if (!$this->lblAuthorizationId) return $this->lblAuthorizationId_Create();
					return $this->lblAuthorizationId;
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
					// Controls that point to Authorization fields
					case 'AuthorizationIdControl':
						return ($this->lblAuthorizationId = QType::Cast($mixValue, 'QControl'));
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