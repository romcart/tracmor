<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Courier class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Courier object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CourierMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Courier $Courier the actual Courier data class being edited
	 * property QLabel $CourierIdControl
	 * property-read QLabel $CourierIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CourierMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Courier objCourier
		 * @access protected
		 */
		protected $objCourier;

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

		// Controls that allow the editing of Courier's individual data fields
        /**
         * @var QLabel lblCourierId;
         * @access protected
         */
		protected $lblCourierId;

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


		// Controls that allow the viewing of Courier's individual data fields
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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CourierMetaControl to edit a single Courier object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Courier object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CourierMetaControl
		 * @param Courier $objCourier new or existing Courier object
		 */
		 public function __construct($objParentObject, Courier $objCourier) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CourierMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Courier object
			$this->objCourier = $objCourier;

			// Figure out if we're Editing or Creating New
			if ($this->objCourier->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CourierMetaControl
		 * @param integer $intCourierId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Courier object creation - defaults to CreateOrEdit
 		 * @return CourierMetaControl
		 */
		public static function Create($objParentObject, $intCourierId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCourierId)) {
				$objCourier = Courier::Load($intCourierId);

				// Courier was found -- return it!
				if ($objCourier)
					return new CourierMetaControl($objParentObject, $objCourier);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Courier object with PK arguments: ' . $intCourierId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CourierMetaControl($objParentObject, new Courier());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CourierMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Courier object creation - defaults to CreateOrEdit
		 * @return CourierMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCourierId = QApplication::PathInfo(0);
			return CourierMetaControl::Create($objParentObject, $intCourierId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CourierMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Courier object creation - defaults to CreateOrEdit
		 * @return CourierMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCourierId = QApplication::QueryString('intCourierId');
			return CourierMetaControl::Create($objParentObject, $intCourierId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblCourierId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCourierId_Create($strControlId = null) {
			$this->lblCourierId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCourierId->Name = QApplication::Translate('Courier Id');
			if ($this->blnEditMode)
				$this->lblCourierId->Text = $this->objCourier->CourierId;
			else
				$this->lblCourierId->Text = 'N/A';
			return $this->lblCourierId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCourier->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Courier::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objCourier->ShortDescription;
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
			$this->chkActiveFlag->Checked = $this->objCourier->ActiveFlag;
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
			$this->lblActiveFlag->Text = ($this->objCourier->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local Courier object.
		 * @param boolean $blnReload reload Courier from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCourier->Reload();

			if ($this->lblCourierId) if ($this->blnEditMode) $this->lblCourierId->Text = $this->objCourier->CourierId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objCourier->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objCourier->ShortDescription;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objCourier->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objCourier->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC COURIER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Courier instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCourier() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objCourier->ShortDescription = $this->txtShortDescription->Text;
				if ($this->chkActiveFlag) $this->objCourier->ActiveFlag = $this->chkActiveFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Courier object
				$this->objCourier->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Courier instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCourier() {
			$this->objCourier->Delete();
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
				case 'Courier': return $this->objCourier;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Courier fields -- will be created dynamically if not yet created
				case 'CourierIdControl':
					if (!$this->lblCourierId) return $this->lblCourierId_Create();
					return $this->lblCourierId;
				case 'CourierIdLabel':
					if (!$this->lblCourierId) return $this->lblCourierId_Create();
					return $this->lblCourierId;
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
					// Controls that point to Courier fields
					case 'CourierIdControl':
						return ($this->lblCourierId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
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