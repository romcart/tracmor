<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AssetModelCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AssetModelCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetModelCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AssetModelCustomFieldHelper $AssetModelCustomFieldHelper the actual AssetModelCustomFieldHelper data class being edited
	 * property QListBox $AssetModelIdControl
	 * property-read QLabel $AssetModelIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AssetModelCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AssetModelCustomFieldHelper objAssetModelCustomFieldHelper
		 * @access protected
		 */
		protected $objAssetModelCustomFieldHelper;

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

		// Controls that allow the editing of AssetModelCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstAssetModel;
         * @access protected
         */
		protected $lstAssetModel;


		// Controls that allow the viewing of AssetModelCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblAssetModelId
         * @access protected
         */
		protected $lblAssetModelId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AssetModelCustomFieldHelperMetaControl to edit a single AssetModelCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AssetModelCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelCustomFieldHelperMetaControl
		 * @param AssetModelCustomFieldHelper $objAssetModelCustomFieldHelper new or existing AssetModelCustomFieldHelper object
		 */
		 public function __construct($objParentObject, AssetModelCustomFieldHelper $objAssetModelCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetModelCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AssetModelCustomFieldHelper object
			$this->objAssetModelCustomFieldHelper = $objAssetModelCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objAssetModelCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelCustomFieldHelperMetaControl
		 * @param integer $intAssetModelId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AssetModelCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return AssetModelCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intAssetModelId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetModelId)) {
				$objAssetModelCustomFieldHelper = AssetModelCustomFieldHelper::Load($intAssetModelId);

				// AssetModelCustomFieldHelper was found -- return it!
				if ($objAssetModelCustomFieldHelper)
					return new AssetModelCustomFieldHelperMetaControl($objParentObject, $objAssetModelCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AssetModelCustomFieldHelper object with PK arguments: ' . $intAssetModelId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetModelCustomFieldHelperMetaControl($objParentObject, new AssetModelCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetModelCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return AssetModelCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetModelId = QApplication::PathInfo(0);
			return AssetModelCustomFieldHelperMetaControl::Create($objParentObject, $intAssetModelId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetModelCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetModelCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return AssetModelCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetModelId = QApplication::QueryString('intAssetModelId');
			return AssetModelCustomFieldHelperMetaControl::Create($objParentObject, $intAssetModelId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstAssetModel
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssetModel_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssetModel = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssetModel->Name = QApplication::Translate('Asset Model');
			$this->lstAssetModel->Required = true;
			if (!$this->blnEditMode)
				$this->lstAssetModel->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetModelCursor = AssetModel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssetModel = AssetModel::InstantiateCursor($objAssetModelCursor)) {
				$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
				if (($this->objAssetModelCustomFieldHelper->AssetModel) && ($this->objAssetModelCustomFieldHelper->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
					$objListItem->Selected = true;
				$this->lstAssetModel->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAssetModel;
		}

		/**
		 * Create and setup QLabel lblAssetModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetModelId_Create($strControlId = null) {
			$this->lblAssetModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetModelId->Name = QApplication::Translate('Asset Model');
			$this->lblAssetModelId->Text = ($this->objAssetModelCustomFieldHelper->AssetModel) ? $this->objAssetModelCustomFieldHelper->AssetModel->__toString() : null;
			$this->lblAssetModelId->Required = true;
			return $this->lblAssetModelId;
		}



		/**
		 * Refresh this MetaControl with Data from the local AssetModelCustomFieldHelper object.
		 * @param boolean $blnReload reload AssetModelCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAssetModelCustomFieldHelper->Reload();

			if ($this->lstAssetModel) {
					$this->lstAssetModel->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAssetModel->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetModelArray = AssetModel::LoadAll();
				if ($objAssetModelArray) foreach ($objAssetModelArray as $objAssetModel) {
					$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
					if (($this->objAssetModelCustomFieldHelper->AssetModel) && ($this->objAssetModelCustomFieldHelper->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
						$objListItem->Selected = true;
					$this->lstAssetModel->AddItem($objListItem);
				}
			}
			if ($this->lblAssetModelId) $this->lblAssetModelId->Text = ($this->objAssetModelCustomFieldHelper->AssetModel) ? $this->objAssetModelCustomFieldHelper->AssetModel->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSETMODELCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AssetModelCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAssetModelCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAssetModel) $this->objAssetModelCustomFieldHelper->AssetModelId = $this->lstAssetModel->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AssetModelCustomFieldHelper object
				$this->objAssetModelCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AssetModelCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAssetModelCustomFieldHelper() {
			$this->objAssetModelCustomFieldHelper->Delete();
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
				case 'AssetModelCustomFieldHelper': return $this->objAssetModelCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AssetModelCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'AssetModelIdControl':
					if (!$this->lstAssetModel) return $this->lstAssetModel_Create();
					return $this->lstAssetModel;
				case 'AssetModelIdLabel':
					if (!$this->lblAssetModelId) return $this->lblAssetModelId_Create();
					return $this->lblAssetModelId;
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
					// Controls that point to AssetModelCustomFieldHelper fields
					case 'AssetModelIdControl':
						return ($this->lstAssetModel = QType::Cast($mixValue, 'QControl'));
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