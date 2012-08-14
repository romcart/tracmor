<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AssetCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AssetCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AssetCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AssetCustomFieldHelper $AssetCustomFieldHelper the actual AssetCustomFieldHelper data class being edited
	 * property QListBox $AssetIdControl
	 * property-read QLabel $AssetIdLabel
	 * property QTextBox $Cfv1Control
	 * property-read QLabel $Cfv1Label
	 * property QTextBox $Cfv3Control
	 * property-read QLabel $Cfv3Label
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AssetCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		protected $objAssetCustomFieldHelper;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of AssetCustomFieldHelper's individual data fields
		protected $lstAsset;
		protected $txtCfv1;
		protected $txtCfv3;

		// Controls that allow the viewing of AssetCustomFieldHelper's individual data fields
		protected $lblAssetId;
		protected $lblCfv1;
		protected $lblCfv3;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AssetCustomFieldHelperMetaControl to edit a single AssetCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AssetCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldHelperMetaControl
		 * @param AssetCustomFieldHelper $objAssetCustomFieldHelper new or existing AssetCustomFieldHelper object
		 */
		 public function __construct($objParentObject, AssetCustomFieldHelper $objAssetCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AssetCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AssetCustomFieldHelper object
			$this->objAssetCustomFieldHelper = $objAssetCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objAssetCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldHelperMetaControl
		 * @param integer $intAssetId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AssetCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return AssetCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intAssetId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetId)) {
				$objAssetCustomFieldHelper = AssetCustomFieldHelper::Load($intAssetId);

				// AssetCustomFieldHelper was found -- return it!
				if ($objAssetCustomFieldHelper)
					return new AssetCustomFieldHelperMetaControl($objParentObject, $objAssetCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AssetCustomFieldHelper object with PK arguments: ' . $intAssetId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AssetCustomFieldHelperMetaControl($objParentObject, new AssetCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return AssetCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetId = QApplication::PathInfo(0);
			return AssetCustomFieldHelperMetaControl::Create($objParentObject, $intAssetId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AssetCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AssetCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return AssetCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetId = QApplication::QueryString('intAssetId');
			return AssetCustomFieldHelperMetaControl::Create($objParentObject, $intAssetId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstAsset
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstAsset_Create($strControlId = null) {
			$this->lstAsset = new QListBox($this->objParentObject, $strControlId);
			$this->lstAsset->Name = QApplication::Translate('Asset');
			$this->lstAsset->Required = true;
			if (!$this->blnEditMode)
				$this->lstAsset->AddItem(QApplication::Translate('- Select One -'), null);
			$objAssetArray = Asset::LoadAll();
			if ($objAssetArray) foreach ($objAssetArray as $objAsset) {
				$objListItem = new QListItem($objAsset->__toString(), $objAsset->AssetId);
				if (($this->objAssetCustomFieldHelper->Asset) && ($this->objAssetCustomFieldHelper->Asset->AssetId == $objAsset->AssetId))
					$objListItem->Selected = true;
				$this->lstAsset->AddItem($objListItem);
			}
			return $this->lstAsset;
		}

		/**
		 * Create and setup QLabel lblAssetId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetId_Create($strControlId = null) {
			$this->lblAssetId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetId->Name = QApplication::Translate('Asset');
			$this->lblAssetId->Text = ($this->objAssetCustomFieldHelper->Asset) ? $this->objAssetCustomFieldHelper->Asset->__toString() : null;
			$this->lblAssetId->Required = true;
			return $this->lblAssetId;
		}

		/**
		 * Create and setup QTextBox txtCfv1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCfv1_Create($strControlId = null) {
			$this->txtCfv1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCfv1->Name = QApplication::Translate('Cfv 1');
			$this->txtCfv1->Text = $this->objAssetCustomFieldHelper->Cfv1;
			$this->txtCfv1->TextMode = QTextMode::MultiLine;
			return $this->txtCfv1;
		}

		/**
		 * Create and setup QLabel lblCfv1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCfv1_Create($strControlId = null) {
			$this->lblCfv1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblCfv1->Name = QApplication::Translate('Cfv 1');
			$this->lblCfv1->Text = $this->objAssetCustomFieldHelper->Cfv1;
			return $this->lblCfv1;
		}

		/**
		 * Create and setup QTextBox txtCfv3
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCfv3_Create($strControlId = null) {
			$this->txtCfv3 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCfv3->Name = QApplication::Translate('Cfv 3');
			$this->txtCfv3->Text = $this->objAssetCustomFieldHelper->Cfv3;
			$this->txtCfv3->TextMode = QTextMode::MultiLine;
			return $this->txtCfv3;
		}

		/**
		 * Create and setup QLabel lblCfv3
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCfv3_Create($strControlId = null) {
			$this->lblCfv3 = new QLabel($this->objParentObject, $strControlId);
			$this->lblCfv3->Name = QApplication::Translate('Cfv 3');
			$this->lblCfv3->Text = $this->objAssetCustomFieldHelper->Cfv3;
			return $this->lblCfv3;
		}



		/**
		 * Refresh this MetaControl with Data from the local AssetCustomFieldHelper object.
		 * @param boolean $blnReload reload AssetCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAssetCustomFieldHelper->Reload();

			if ($this->lstAsset) {
					$this->lstAsset->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAsset->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetArray = Asset::LoadAll();
				if ($objAssetArray) foreach ($objAssetArray as $objAsset) {
					$objListItem = new QListItem($objAsset->__toString(), $objAsset->AssetId);
					if (($this->objAssetCustomFieldHelper->Asset) && ($this->objAssetCustomFieldHelper->Asset->AssetId == $objAsset->AssetId))
						$objListItem->Selected = true;
					$this->lstAsset->AddItem($objListItem);
				}
			}
			if ($this->lblAssetId) $this->lblAssetId->Text = ($this->objAssetCustomFieldHelper->Asset) ? $this->objAssetCustomFieldHelper->Asset->__toString() : null;

			if ($this->txtCfv1) $this->txtCfv1->Text = $this->objAssetCustomFieldHelper->Cfv1;
			if ($this->lblCfv1) $this->lblCfv1->Text = $this->objAssetCustomFieldHelper->Cfv1;

			if ($this->txtCfv3) $this->txtCfv3->Text = $this->objAssetCustomFieldHelper->Cfv3;
			if ($this->lblCfv3) $this->lblCfv3->Text = $this->objAssetCustomFieldHelper->Cfv3;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ASSETCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AssetCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAssetCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAsset) $this->objAssetCustomFieldHelper->AssetId = $this->lstAsset->SelectedValue;
				if ($this->txtCfv1) $this->objAssetCustomFieldHelper->Cfv1 = $this->txtCfv1->Text;
				if ($this->txtCfv3) $this->objAssetCustomFieldHelper->Cfv3 = $this->txtCfv3->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AssetCustomFieldHelper object
				$this->objAssetCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AssetCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAssetCustomFieldHelper() {
			$this->objAssetCustomFieldHelper->Delete();
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
				case 'AssetCustomFieldHelper': return $this->objAssetCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AssetCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'AssetIdControl':
					if (!$this->lstAsset) return $this->lstAsset_Create();
					return $this->lstAsset;
				case 'AssetIdLabel':
					if (!$this->lblAssetId) return $this->lblAssetId_Create();
					return $this->lblAssetId;
				case 'Cfv1Control':
					if (!$this->txtCfv1) return $this->txtCfv1_Create();
					return $this->txtCfv1;
				case 'Cfv1Label':
					if (!$this->lblCfv1) return $this->lblCfv1_Create();
					return $this->lblCfv1;
				case 'Cfv3Control':
					if (!$this->txtCfv3) return $this->txtCfv3_Create();
					return $this->txtCfv3;
				case 'Cfv3Label':
					if (!$this->lblCfv3) return $this->lblCfv3_Create();
					return $this->lblCfv3;
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
					// Controls that point to AssetCustomFieldHelper fields
					case 'AssetIdControl':
						return ($this->lstAsset = QType::Cast($mixValue, 'QControl'));
					case 'Cfv1Control':
						return ($this->txtCfv1 = QType::Cast($mixValue, 'QControl'));
					case 'Cfv3Control':
						return ($this->txtCfv3 = QType::Cast($mixValue, 'QControl'));
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