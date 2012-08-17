<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the InventoryModelCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single InventoryModelCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a InventoryModelCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read InventoryModelCustomFieldHelper $InventoryModelCustomFieldHelper the actual InventoryModelCustomFieldHelper data class being edited
	 * property QListBox $InventoryModelIdControl
	 * property-read QLabel $InventoryModelIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class InventoryModelCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var InventoryModelCustomFieldHelper objInventoryModelCustomFieldHelper
		 * @access protected
		 */
		protected $objInventoryModelCustomFieldHelper;

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

		// Controls that allow the editing of InventoryModelCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstInventoryModel;
         * @access protected
         */
		protected $lstInventoryModel;


		// Controls that allow the viewing of InventoryModelCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblInventoryModelId
         * @access protected
         */
		protected $lblInventoryModelId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * InventoryModelCustomFieldHelperMetaControl to edit a single InventoryModelCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single InventoryModelCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelCustomFieldHelperMetaControl
		 * @param InventoryModelCustomFieldHelper $objInventoryModelCustomFieldHelper new or existing InventoryModelCustomFieldHelper object
		 */
		 public function __construct($objParentObject, InventoryModelCustomFieldHelper $objInventoryModelCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this InventoryModelCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked InventoryModelCustomFieldHelper object
			$this->objInventoryModelCustomFieldHelper = $objInventoryModelCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objInventoryModelCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelCustomFieldHelperMetaControl
		 * @param integer $intInventoryModelId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryModelCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return InventoryModelCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intInventoryModelId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intInventoryModelId)) {
				$objInventoryModelCustomFieldHelper = InventoryModelCustomFieldHelper::Load($intInventoryModelId);

				// InventoryModelCustomFieldHelper was found -- return it!
				if ($objInventoryModelCustomFieldHelper)
					return new InventoryModelCustomFieldHelperMetaControl($objParentObject, $objInventoryModelCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a InventoryModelCustomFieldHelper object with PK arguments: ' . $intInventoryModelId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new InventoryModelCustomFieldHelperMetaControl($objParentObject, new InventoryModelCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryModelCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return InventoryModelCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryModelId = QApplication::PathInfo(0);
			return InventoryModelCustomFieldHelperMetaControl::Create($objParentObject, $intInventoryModelId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this InventoryModelCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing InventoryModelCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return InventoryModelCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intInventoryModelId = QApplication::QueryString('intInventoryModelId');
			return InventoryModelCustomFieldHelperMetaControl::Create($objParentObject, $intInventoryModelId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstInventoryModel
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstInventoryModel_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstInventoryModel = new QListBox($this->objParentObject, $strControlId);
			$this->lstInventoryModel->Name = QApplication::Translate('Inventory Model');
			$this->lstInventoryModel->Required = true;
			if (!$this->blnEditMode)
				$this->lstInventoryModel->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objInventoryModelCursor = InventoryModel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objInventoryModel = InventoryModel::InstantiateCursor($objInventoryModelCursor)) {
				$objListItem = new QListItem($objInventoryModel->__toString(), $objInventoryModel->InventoryModelId);
				if (($this->objInventoryModelCustomFieldHelper->InventoryModel) && ($this->objInventoryModelCustomFieldHelper->InventoryModel->InventoryModelId == $objInventoryModel->InventoryModelId))
					$objListItem->Selected = true;
				$this->lstInventoryModel->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstInventoryModel;
		}

		/**
		 * Create and setup QLabel lblInventoryModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryModelId_Create($strControlId = null) {
			$this->lblInventoryModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryModelId->Name = QApplication::Translate('Inventory Model');
			$this->lblInventoryModelId->Text = ($this->objInventoryModelCustomFieldHelper->InventoryModel) ? $this->objInventoryModelCustomFieldHelper->InventoryModel->__toString() : null;
			$this->lblInventoryModelId->Required = true;
			return $this->lblInventoryModelId;
		}



		/**
		 * Refresh this MetaControl with Data from the local InventoryModelCustomFieldHelper object.
		 * @param boolean $blnReload reload InventoryModelCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objInventoryModelCustomFieldHelper->Reload();

			if ($this->lstInventoryModel) {
					$this->lstInventoryModel->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstInventoryModel->AddItem(QApplication::Translate('- Select One -'), null);
				$objInventoryModelArray = InventoryModel::LoadAll();
				if ($objInventoryModelArray) foreach ($objInventoryModelArray as $objInventoryModel) {
					$objListItem = new QListItem($objInventoryModel->__toString(), $objInventoryModel->InventoryModelId);
					if (($this->objInventoryModelCustomFieldHelper->InventoryModel) && ($this->objInventoryModelCustomFieldHelper->InventoryModel->InventoryModelId == $objInventoryModel->InventoryModelId))
						$objListItem->Selected = true;
					$this->lstInventoryModel->AddItem($objListItem);
				}
			}
			if ($this->lblInventoryModelId) $this->lblInventoryModelId->Text = ($this->objInventoryModelCustomFieldHelper->InventoryModel) ? $this->objInventoryModelCustomFieldHelper->InventoryModel->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC INVENTORYMODELCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's InventoryModelCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveInventoryModelCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstInventoryModel) $this->objInventoryModelCustomFieldHelper->InventoryModelId = $this->lstInventoryModel->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the InventoryModelCustomFieldHelper object
				$this->objInventoryModelCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's InventoryModelCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteInventoryModelCustomFieldHelper() {
			$this->objInventoryModelCustomFieldHelper->Delete();
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
				case 'InventoryModelCustomFieldHelper': return $this->objInventoryModelCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to InventoryModelCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'InventoryModelIdControl':
					if (!$this->lstInventoryModel) return $this->lstInventoryModel_Create();
					return $this->lstInventoryModel;
				case 'InventoryModelIdLabel':
					if (!$this->lblInventoryModelId) return $this->lblInventoryModelId_Create();
					return $this->lblInventoryModelId;
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
					// Controls that point to InventoryModelCustomFieldHelper fields
					case 'InventoryModelIdControl':
						return ($this->lstInventoryModel = QType::Cast($mixValue, 'QControl'));
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