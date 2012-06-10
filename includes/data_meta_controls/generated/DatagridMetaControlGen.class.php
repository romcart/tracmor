<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Datagrid class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Datagrid object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DatagridMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Datagrid $Datagrid the actual Datagrid data class being edited
	 * property QLabel $DatagridIdControl
	 * property-read QLabel $DatagridIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DatagridMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Datagrid objDatagrid
		 * @access protected
		 */
		protected $objDatagrid;

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

		// Controls that allow the editing of Datagrid's individual data fields
        /**
         * @var QLabel lblDatagridId;
         * @access protected
         */
		protected $lblDatagridId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;


		// Controls that allow the viewing of Datagrid's individual data fields
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
		 * DatagridMetaControl to edit a single Datagrid object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Datagrid object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridMetaControl
		 * @param Datagrid $objDatagrid new or existing Datagrid object
		 */
		 public function __construct($objParentObject, Datagrid $objDatagrid) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DatagridMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Datagrid object
			$this->objDatagrid = $objDatagrid;

			// Figure out if we're Editing or Creating New
			if ($this->objDatagrid->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridMetaControl
		 * @param integer $intDatagridId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Datagrid object creation - defaults to CreateOrEdit
 		 * @return DatagridMetaControl
		 */
		public static function Create($objParentObject, $intDatagridId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intDatagridId)) {
				$objDatagrid = Datagrid::Load($intDatagridId);

				// Datagrid was found -- return it!
				if ($objDatagrid)
					return new DatagridMetaControl($objParentObject, $objDatagrid);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Datagrid object with PK arguments: ' . $intDatagridId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DatagridMetaControl($objParentObject, new Datagrid());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Datagrid object creation - defaults to CreateOrEdit
		 * @return DatagridMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDatagridId = QApplication::PathInfo(0);
			return DatagridMetaControl::Create($objParentObject, $intDatagridId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Datagrid object creation - defaults to CreateOrEdit
		 * @return DatagridMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDatagridId = QApplication::QueryString('intDatagridId');
			return DatagridMetaControl::Create($objParentObject, $intDatagridId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblDatagridId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDatagridId_Create($strControlId = null) {
			$this->lblDatagridId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDatagridId->Name = QApplication::Translate('Datagrid Id');
			if ($this->blnEditMode)
				$this->lblDatagridId->Text = $this->objDatagrid->DatagridId;
			else
				$this->lblDatagridId->Text = 'N/A';
			return $this->lblDatagridId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objDatagrid->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Datagrid::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objDatagrid->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local Datagrid object.
		 * @param boolean $blnReload reload Datagrid from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDatagrid->Reload();

			if ($this->lblDatagridId) if ($this->blnEditMode) $this->lblDatagridId->Text = $this->objDatagrid->DatagridId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objDatagrid->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objDatagrid->ShortDescription;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DATAGRID OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Datagrid instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDatagrid() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objDatagrid->ShortDescription = $this->txtShortDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Datagrid object
				$this->objDatagrid->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Datagrid instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDatagrid() {
			$this->objDatagrid->Delete();
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
				case 'Datagrid': return $this->objDatagrid;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Datagrid fields -- will be created dynamically if not yet created
				case 'DatagridIdControl':
					if (!$this->lblDatagridId) return $this->lblDatagridId_Create();
					return $this->lblDatagridId;
				case 'DatagridIdLabel':
					if (!$this->lblDatagridId) return $this->lblDatagridId_Create();
					return $this->lblDatagridId;
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
					// Controls that point to Datagrid fields
					case 'DatagridIdControl':
						return ($this->lblDatagridId = QType::Cast($mixValue, 'QControl'));
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