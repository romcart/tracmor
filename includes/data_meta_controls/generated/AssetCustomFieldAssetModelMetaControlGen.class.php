<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AssetCustomFieldAssetModel class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AssetCustomFieldAssetModel object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetCustomFieldAssetModelMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AssetCustomFieldAssetModel $AssetCustomFieldAssetModel the actual AssetCustomFieldAssetModel data class being edited
	 * property QLabel $AssetCustomFieldAssetModelIdControl
	 * property-read QLabel $AssetCustomFieldAssetModelIdLabel
	 * property QListBox $AssetModelIdControl
	 * property-read QLabel $AssetModelIdLabel
	 * property QListBox $CustomFieldIdControl
	 * property-read QLabel $CustomFieldIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AssetCustomFieldAssetModelMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AssetCustomFieldAssetModel objAssetCustomFieldAssetModel
		 * @access protected
		 */
		protected $objAssetCustomFieldAssetModel;

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

		// Controls that allow the editing of AssetCustomFieldAssetModel's individual data fields
        /**
         * @var QLabel lblAssetCustomFieldAssetModelId;
         * @access protected
         */
		protected $lblAssetCustomFieldAssetModelId;

        /**
         * @var QListBox lstAssetModel;
         * @access protected
         */
		protected $lstAssetModel;

        /**
         * @var QListBox lstCustomField;
         * @access protected
         */
		protected $lstCustomField;


		// Controls that allow the viewing of AssetCustomFieldAssetModel's individual data fields
        /**
         * @var QLabel lblAssetModelId
         * @access protected
         */
		protected $lblAssetModelId;

        /**
         * @var QLabel lblCustomFieldId
         * @access protected
         */
		protected $lblCustomFieldId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AssetCustomFieldAssetModelMetaControl to edit a single AssetCustomFieldAssetModel object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AssetCustomFieldAssetModel object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldAssetModelMetaControl
		 * @param AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel new or existing AssetCustomFieldAssetModel object
		 */
		 public function __construct($objParentObject, AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetCustomFieldAssetModelMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AssetCustomFieldAssetModel object
			$this->objAssetCustomFieldAssetModel = $objAssetCustomFieldAssetModel;

			// Figure out if we're Editing or Creating New
			if ($this->objAssetCustomFieldAssetModel->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldAssetModelMetaControl
		 * @param integer $intAssetCustomFieldAssetModelId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AssetCustomFieldAssetModel object creation - defaults to CreateOrEdit
 		 * @return AssetCustomFieldAssetModelMetaControl
		 */
		public static function Create($objParentObject, $intAssetCustomFieldAssetModelId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetCustomFieldAssetModelId)) {
				$objAssetCustomFieldAssetModel = AssetCustomFieldAssetModel::Load($intAssetCustomFieldAssetModelId);

				// AssetCustomFieldAssetModel was found -- return it!
				if ($objAssetCustomFieldAssetModel)
					return new AssetCustomFieldAssetModelMetaControl($objParentObject, $objAssetCustomFieldAssetModel);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AssetCustomFieldAssetModel object with PK arguments: ' . $intAssetCustomFieldAssetModelId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetCustomFieldAssetModelMetaControl($objParentObject, new AssetCustomFieldAssetModel());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldAssetModelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetCustomFieldAssetModel object creation - defaults to CreateOrEdit
		 * @return AssetCustomFieldAssetModelMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetCustomFieldAssetModelId = QApplication::PathInfo(0);
			return AssetCustomFieldAssetModelMetaControl::Create($objParentObject, $intAssetCustomFieldAssetModelId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldAssetModelMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetCustomFieldAssetModel object creation - defaults to CreateOrEdit
		 * @return AssetCustomFieldAssetModelMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetCustomFieldAssetModelId = QApplication::QueryString('intAssetCustomFieldAssetModelId');
			return AssetCustomFieldAssetModelMetaControl::Create($objParentObject, $intAssetCustomFieldAssetModelId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAssetCustomFieldAssetModelId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetCustomFieldAssetModelId_Create($strControlId = null) {
			$this->lblAssetCustomFieldAssetModelId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetCustomFieldAssetModelId->Name = QApplication::Translate('Asset Custom Field Asset Model Id');
			if ($this->blnEditMode)
				$this->lblAssetCustomFieldAssetModelId->Text = $this->objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId;
			else
				$this->lblAssetCustomFieldAssetModelId->Text = 'N/A';
			return $this->lblAssetCustomFieldAssetModelId;
		}

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
				if (($this->objAssetCustomFieldAssetModel->AssetModel) && ($this->objAssetCustomFieldAssetModel->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
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
			$this->lblAssetModelId->Text = ($this->objAssetCustomFieldAssetModel->AssetModel) ? $this->objAssetCustomFieldAssetModel->AssetModel->__toString() : null;
			$this->lblAssetModelId->Required = true;
			return $this->lblAssetModelId;
		}

		/**
		 * Create and setup QListBox lstCustomField
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCustomField_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCustomField = new QListBox($this->objParentObject, $strControlId);
			$this->lstCustomField->Name = QApplication::Translate('Custom Field');
			$this->lstCustomField->Required = true;
			if (!$this->blnEditMode)
				$this->lstCustomField->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCustomFieldCursor = CustomField::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCustomField = CustomField::InstantiateCursor($objCustomFieldCursor)) {
				$objListItem = new QListItem($objCustomField->__toString(), $objCustomField->CustomFieldId);
				if (($this->objAssetCustomFieldAssetModel->CustomField) && ($this->objAssetCustomFieldAssetModel->CustomField->CustomFieldId == $objCustomField->CustomFieldId))
					$objListItem->Selected = true;
				$this->lstCustomField->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCustomField;
		}

		/**
		 * Create and setup QLabel lblCustomFieldId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCustomFieldId_Create($strControlId = null) {
			$this->lblCustomFieldId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCustomFieldId->Name = QApplication::Translate('Custom Field');
			$this->lblCustomFieldId->Text = ($this->objAssetCustomFieldAssetModel->CustomField) ? $this->objAssetCustomFieldAssetModel->CustomField->__toString() : null;
			$this->lblCustomFieldId->Required = true;
			return $this->lblCustomFieldId;
		}



		/**
		 * Refresh this MetaControl with Data from the local AssetCustomFieldAssetModel object.
		 * @param boolean $blnReload reload AssetCustomFieldAssetModel from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAssetCustomFieldAssetModel->Reload();

			if ($this->lblAssetCustomFieldAssetModelId) if ($this->blnEditMode) $this->lblAssetCustomFieldAssetModelId->Text = $this->objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId;

			if ($this->lstAssetModel) {
					$this->lstAssetModel->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAssetModel->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetModelArray = AssetModel::LoadAll();
				if ($objAssetModelArray) foreach ($objAssetModelArray as $objAssetModel) {
					$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
					if (($this->objAssetCustomFieldAssetModel->AssetModel) && ($this->objAssetCustomFieldAssetModel->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
						$objListItem->Selected = true;
					$this->lstAssetModel->AddItem($objListItem);
				}
			}
			if ($this->lblAssetModelId) $this->lblAssetModelId->Text = ($this->objAssetCustomFieldAssetModel->AssetModel) ? $this->objAssetCustomFieldAssetModel->AssetModel->__toString() : null;

			if ($this->lstCustomField) {
					$this->lstCustomField->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCustomField->AddItem(QApplication::Translate('- Select One -'), null);
				$objCustomFieldArray = CustomField::LoadAll();
				if ($objCustomFieldArray) foreach ($objCustomFieldArray as $objCustomField) {
					$objListItem = new QListItem($objCustomField->__toString(), $objCustomField->CustomFieldId);
					if (($this->objAssetCustomFieldAssetModel->CustomField) && ($this->objAssetCustomFieldAssetModel->CustomField->CustomFieldId == $objCustomField->CustomFieldId))
						$objListItem->Selected = true;
					$this->lstCustomField->AddItem($objListItem);
				}
			}
			if ($this->lblCustomFieldId) $this->lblCustomFieldId->Text = ($this->objAssetCustomFieldAssetModel->CustomField) ? $this->objAssetCustomFieldAssetModel->CustomField->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSETCUSTOMFIELDASSETMODEL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AssetCustomFieldAssetModel instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAssetCustomFieldAssetModel() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAssetModel) $this->objAssetCustomFieldAssetModel->AssetModelId = $this->lstAssetModel->SelectedValue;
				if ($this->lstCustomField) $this->objAssetCustomFieldAssetModel->CustomFieldId = $this->lstCustomField->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AssetCustomFieldAssetModel object
				$this->objAssetCustomFieldAssetModel->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AssetCustomFieldAssetModel instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAssetCustomFieldAssetModel() {
			$this->objAssetCustomFieldAssetModel->Delete();
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
				case 'AssetCustomFieldAssetModel': return $this->objAssetCustomFieldAssetModel;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AssetCustomFieldAssetModel fields -- will be created dynamically if not yet created
				case 'AssetCustomFieldAssetModelIdControl':
					if (!$this->lblAssetCustomFieldAssetModelId) return $this->lblAssetCustomFieldAssetModelId_Create();
					return $this->lblAssetCustomFieldAssetModelId;
				case 'AssetCustomFieldAssetModelIdLabel':
					if (!$this->lblAssetCustomFieldAssetModelId) return $this->lblAssetCustomFieldAssetModelId_Create();
					return $this->lblAssetCustomFieldAssetModelId;
				case 'AssetModelIdControl':
					if (!$this->lstAssetModel) return $this->lstAssetModel_Create();
					return $this->lstAssetModel;
				case 'AssetModelIdLabel':
					if (!$this->lblAssetModelId) return $this->lblAssetModelId_Create();
					return $this->lblAssetModelId;
				case 'CustomFieldIdControl':
					if (!$this->lstCustomField) return $this->lstCustomField_Create();
					return $this->lstCustomField;
				case 'CustomFieldIdLabel':
					if (!$this->lblCustomFieldId) return $this->lblCustomFieldId_Create();
					return $this->lblCustomFieldId;
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
					// Controls that point to AssetCustomFieldAssetModel fields
					case 'AssetCustomFieldAssetModelIdControl':
						return ($this->lblAssetCustomFieldAssetModelId = QType::Cast($mixValue, 'QControl'));
					case 'AssetModelIdControl':
						return ($this->lstAssetModel = QType::Cast($mixValue, 'QControl'));
					case 'CustomFieldIdControl':
						return ($this->lstCustomField = QType::Cast($mixValue, 'QControl'));
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