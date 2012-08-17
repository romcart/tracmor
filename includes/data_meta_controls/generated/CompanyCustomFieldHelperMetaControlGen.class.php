<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CompanyCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CompanyCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CompanyCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read CompanyCustomFieldHelper $CompanyCustomFieldHelper the actual CompanyCustomFieldHelper data class being edited
	 * property QListBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CompanyCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CompanyCustomFieldHelper objCompanyCustomFieldHelper
		 * @access protected
		 */
		protected $objCompanyCustomFieldHelper;

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

		// Controls that allow the editing of CompanyCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstCompany;
         * @access protected
         */
		protected $lstCompany;


		// Controls that allow the viewing of CompanyCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblCompanyId
         * @access protected
         */
		protected $lblCompanyId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CompanyCustomFieldHelperMetaControl to edit a single CompanyCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CompanyCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyCustomFieldHelperMetaControl
		 * @param CompanyCustomFieldHelper $objCompanyCustomFieldHelper new or existing CompanyCustomFieldHelper object
		 */
		 public function __construct($objParentObject, CompanyCustomFieldHelper $objCompanyCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CompanyCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CompanyCustomFieldHelper object
			$this->objCompanyCustomFieldHelper = $objCompanyCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objCompanyCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyCustomFieldHelperMetaControl
		 * @param integer $intCompanyId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CompanyCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return CompanyCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intCompanyId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intCompanyId)) {
				$objCompanyCustomFieldHelper = CompanyCustomFieldHelper::Load($intCompanyId);

				// CompanyCustomFieldHelper was found -- return it!
				if ($objCompanyCustomFieldHelper)
					return new CompanyCustomFieldHelperMetaControl($objParentObject, $objCompanyCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CompanyCustomFieldHelper object with PK arguments: ' . $intCompanyId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CompanyCustomFieldHelperMetaControl($objParentObject, new CompanyCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CompanyCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return CompanyCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCompanyId = QApplication::PathInfo(0);
			return CompanyCustomFieldHelperMetaControl::Create($objParentObject, $intCompanyId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CompanyCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return CompanyCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intCompanyId = QApplication::QueryString('intCompanyId');
			return CompanyCustomFieldHelperMetaControl::Create($objParentObject, $intCompanyId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstCompany->Name = QApplication::Translate('Company');
			$this->lstCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCompany = Company::InstantiateCursor($objCompanyCursor)) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
				if (($this->objCompanyCustomFieldHelper->Company) && ($this->objCompanyCustomFieldHelper->Company->CompanyId == $objCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCompany;
		}

		/**
		 * Create and setup QLabel lblCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompanyId_Create($strControlId = null) {
			$this->lblCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyId->Name = QApplication::Translate('Company');
			$this->lblCompanyId->Text = ($this->objCompanyCustomFieldHelper->Company) ? $this->objCompanyCustomFieldHelper->Company->__toString() : null;
			$this->lblCompanyId->Required = true;
			return $this->lblCompanyId;
		}



		/**
		 * Refresh this MetaControl with Data from the local CompanyCustomFieldHelper object.
		 * @param boolean $blnReload reload CompanyCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCompanyCustomFieldHelper->Reload();

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
					if (($this->objCompanyCustomFieldHelper->Company) && ($this->objCompanyCustomFieldHelper->Company->CompanyId == $objCompany->CompanyId))
						$objListItem->Selected = true;
					$this->lstCompany->AddItem($objListItem);
				}
			}
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objCompanyCustomFieldHelper->Company) ? $this->objCompanyCustomFieldHelper->Company->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC COMPANYCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CompanyCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCompanyCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCompany) $this->objCompanyCustomFieldHelper->CompanyId = $this->lstCompany->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CompanyCustomFieldHelper object
				$this->objCompanyCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CompanyCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCompanyCustomFieldHelper() {
			$this->objCompanyCustomFieldHelper->Delete();
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
				case 'CompanyCustomFieldHelper': return $this->objCompanyCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CompanyCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'CompanyIdControl':
					if (!$this->lstCompany) return $this->lstCompany_Create();
					return $this->lstCompany;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
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
					// Controls that point to CompanyCustomFieldHelper fields
					case 'CompanyIdControl':
						return ($this->lstCompany = QType::Cast($mixValue, 'QControl'));
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