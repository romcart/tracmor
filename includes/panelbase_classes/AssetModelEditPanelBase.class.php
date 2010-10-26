<?php
	/**
	 * This is the abstract Panel class for the Create, Edit, and Delete functionality
	 * of the AssetModel class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML DIV that can
	 * manipulate a single AssetModel object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Panel which extends this AssetModelEditPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage PanelBaseObjects
	 * 
	 */
	abstract class AssetModelEditPanelBase extends QPanel {
		// General Panel Variables
		protected $objAssetModel;
		protected $strTitleVerb;
		protected $blnEditMode;

		protected $strClosePanelMethod;

		// Controls for AssetModel's Data Fields
		public $lblAssetModelId;
		public $lstCategory;
		public $lstManufacturer;
		public $txtAssetModelCode;
		public $txtShortDescription;
		public $txtLongDescription;
		public $txtImagePath;
		public $lstCreatedByObject;
		public $calCreationDate;
		public $lstModifiedByObject;
		public $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstAssetModelCustomFieldHelper;

		// Button Actions
		public $btnSave;
		public $btnCancel;
		public $btnDelete;

		protected function SetupAssetModel($objAssetModel) {
			if ($objAssetModel) {
				$this->objAssetModel = $objAssetModel;
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objAssetModel = new AssetModel();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		public function __construct($objParentObject, $strClosePanelMethod, $objAssetModel = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Call SetupAssetModel to either Load/Edit Existing or Create New
			$this->SetupAssetModel($objAssetModel);
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Create/Setup Controls for AssetModel's Data Fields
			$this->lblAssetModelId_Create();
			$this->lstCategory_Create();
			$this->lstManufacturer_Create();
			$this->txtAssetModelCode_Create();
			$this->txtShortDescription_Create();
			$this->txtLongDescription_Create();
			$this->txtImagePath_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstAssetModelCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblAssetModelId
		protected function lblAssetModelId_Create() {
			$this->lblAssetModelId = new QLabel($this);
			$this->lblAssetModelId->Name = QApplication::Translate('Asset Model Id');
			if ($this->blnEditMode)
				$this->lblAssetModelId->Text = $this->objAssetModel->AssetModelId;
			else
				$this->lblAssetModelId->Text = 'N/A';
		}

		// Create and Setup lstCategory
		protected function lstCategory_Create() {
			$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = QApplication::Translate('Category');
			$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);
			$objCategoryArray = Category::LoadAll();
			if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
				$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
				if (($this->objAssetModel->Category) && ($this->objAssetModel->Category->CategoryId == $objCategory->CategoryId))
					$objListItem->Selected = true;
				$this->lstCategory->AddItem($objListItem);
			}
		}

		// Create and Setup lstManufacturer
		protected function lstManufacturer_Create() {
			$this->lstManufacturer = new QListBox($this);
			$this->lstManufacturer->Name = QApplication::Translate('Manufacturer');
			$this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);
			$objManufacturerArray = Manufacturer::LoadAll();
			if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
				$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
				if (($this->objAssetModel->Manufacturer) && ($this->objAssetModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
					$objListItem->Selected = true;
				$this->lstManufacturer->AddItem($objListItem);
			}
		}

		// Create and Setup txtAssetModelCode
		protected function txtAssetModelCode_Create() {
			$this->txtAssetModelCode = new QTextBox($this);
			$this->txtAssetModelCode->Name = QApplication::Translate('Asset Model Code');
			$this->txtAssetModelCode->Text = $this->objAssetModel->AssetModelCode;
			$this->txtAssetModelCode->MaxLength = AssetModel::AssetModelCodeMaxLength;
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objAssetModel->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = AssetModel::ShortDescriptionMaxLength;
		}

		// Create and Setup txtLongDescription
		protected function txtLongDescription_Create() {
			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objAssetModel->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		}

		// Create and Setup txtImagePath
		protected function txtImagePath_Create() {
			$this->txtImagePath = new QTextBox($this);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objAssetModel->ImagePath;
			$this->txtImagePath->MaxLength = AssetModel::ImagePathMaxLength;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objAssetModel->CreatedByObject) && ($this->objAssetModel->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objAssetModel->CreationDate;
			$this->calCreationDate->DateTimePickerType = QDateTimePickerType::DateTime;
		}

		// Create and Setup lstModifiedByObject
		protected function lstModifiedByObject_Create() {
			$this->lstModifiedByObject = new QListBox($this);
			$this->lstModifiedByObject->Name = QApplication::Translate('Modified By Object');
			$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objModifiedByObjectArray = UserAccount::LoadAll();
			if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
				$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
				if (($this->objAssetModel->ModifiedByObject) && ($this->objAssetModel->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objAssetModel->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstAssetModelCustomFieldHelper
		protected function lstAssetModelCustomFieldHelper_Create() {
			$this->lstAssetModelCustomFieldHelper = new QListBox($this);
			$this->lstAssetModelCustomFieldHelper->Name = QApplication::Translate('Asset Model Custom Field Helper');
			$this->lstAssetModelCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objAssetModelCustomFieldHelperArray = AssetModelCustomFieldHelper::LoadAll();
			if ($objAssetModelCustomFieldHelperArray) foreach ($objAssetModelCustomFieldHelperArray as $objAssetModelCustomFieldHelper) {
				$objListItem = new QListItem($objAssetModelCustomFieldHelper->__toString(), $objAssetModelCustomFieldHelper->AssetModelId);
				if ($objAssetModelCustomFieldHelper->AssetModelId == $this->objAssetModel->AssetModelId)
					$objListItem->Selected = true;
				$this->lstAssetModelCustomFieldHelper->AddItem($objListItem);
			}
			// Because AssetModelCustomFieldHelper's AssetModelCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAssetModelCustomFieldHelper->SelectedValue)
				$this->lstAssetModelCustomFieldHelper->Enabled = false;
		}


		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}

		// Setup btnCancel
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
		}

		// Setup btnDelete
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'AssetModel')));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateAssetModelFields() {
			$this->objAssetModel->CategoryId = $this->lstCategory->SelectedValue;
			$this->objAssetModel->ManufacturerId = $this->lstManufacturer->SelectedValue;
			$this->objAssetModel->AssetModelCode = $this->txtAssetModelCode->Text;
			$this->objAssetModel->ShortDescription = $this->txtShortDescription->Text;
			$this->objAssetModel->LongDescription = $this->txtLongDescription->Text;
			$this->objAssetModel->ImagePath = $this->txtImagePath->Text;
			$this->objAssetModel->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objAssetModel->CreationDate = $this->calCreationDate->DateTime;
			$this->objAssetModel->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objAssetModel->AssetModelCustomFieldHelper = AssetModelCustomFieldHelper::Load($this->lstAssetModelCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateAssetModelFields();
			$this->objAssetModel->Save();


			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objAssetModel->Delete();

			$this->CloseSelf(true);
		}
		
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>