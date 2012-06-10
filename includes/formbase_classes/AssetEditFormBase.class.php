<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Asset class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Asset object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this AssetEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class AssetEditFormBase extends QForm {
		// General Form Variables
		protected $objAsset;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Asset's Data Fields
		protected $lblAssetId;
		protected $lstParentAsset;
		protected $lstAssetModel;
		protected $lstLocation;
		protected $txtAssetCode;
		protected $txtImagePath;
		protected $chkCheckedOutFlag;
		protected $chkReservedFlag;
		protected $chkLinkedFlag;
		protected $chkArchivedFlag;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstAssetCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupAsset() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intAssetId = QApplication::QueryString('intAssetId');
			if (($intAssetId)) {
				$this->objAsset = Asset::Load(($intAssetId));

				if (!$this->objAsset)
					throw new Exception('Could not find a Asset object with PK arguments: ' . $intAssetId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objAsset = new Asset();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupAsset to either Load/Edit Existing or Create New
			$this->SetupAsset();

			// Create/Setup Controls for Asset's Data Fields
			$this->lblAssetId_Create();
			$this->lstParentAsset_Create();
			$this->lstAssetModel_Create();
			$this->lstLocation_Create();
			$this->txtAssetCode_Create();
			$this->txtImagePath_Create();
			$this->chkCheckedOutFlag_Create();
			$this->chkReservedFlag_Create();
			$this->chkLinkedFlag_Create();
			$this->chkArchivedFlag_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstAssetCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblAssetId
		protected function lblAssetId_Create() {
			$this->lblAssetId = new QLabel($this);
			$this->lblAssetId->Name = QApplication::Translate('Asset Id');
			if ($this->blnEditMode)
				$this->lblAssetId->Text = $this->objAsset->AssetId;
			else
				$this->lblAssetId->Text = 'N/A';
		}

		// Create and Setup lstParentAsset
		protected function lstParentAsset_Create() {
			$this->lstParentAsset = new QListBox($this);
			$this->lstParentAsset->Name = QApplication::Translate('Parent Asset');
			$this->lstParentAsset->AddItem(QApplication::Translate('- Select One -'), null);
			$objParentAssetArray = Asset::LoadAll();
			if ($objParentAssetArray) foreach ($objParentAssetArray as $objParentAsset) {
				$objListItem = new QListItem($objParentAsset->__toString(), $objParentAsset->AssetId);
				if (($this->objAsset->ParentAsset) && ($this->objAsset->ParentAsset->AssetId == $objParentAsset->AssetId))
					$objListItem->Selected = true;
				$this->lstParentAsset->AddItem($objListItem);
			}
		}

		// Create and Setup lstAssetModel
		protected function lstAssetModel_Create() {
			$this->lstAssetModel = new QListBox($this);
			$this->lstAssetModel->Name = QApplication::Translate('Model');
			$this->lstAssetModel->Required = true;
			if (!$this->blnEditMode)
				$this->lstAssetModel->AddItem(QApplication::Translate('- Select One -'), null);
			$objAssetModelArray = AssetModel::LoadAll();
			if ($objAssetModelArray) foreach ($objAssetModelArray as $objAssetModel) {
				$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
				if (($this->objAsset->AssetModel) && ($this->objAsset->AssetModel->AssetModelId == $objAssetModel->AssetModelId))
					$objListItem->Selected = true;
				$this->lstAssetModel->AddItem($objListItem);
			}
		}

		// Create and Setup lstLocation
		protected function lstLocation_Create() {
			$this->lstLocation = new QListBox($this);
			$this->lstLocation->Name = QApplication::Translate('Location');
			$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);
			$objLocationArray = Location::LoadAll();
			if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
				$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
				if (($this->objAsset->Location) && ($this->objAsset->Location->LocationId == $objLocation->LocationId))
					$objListItem->Selected = true;
				$this->lstLocation->AddItem($objListItem);
			}
		}

		// Create and Setup txtAssetCode
		protected function txtAssetCode_Create() {
			$this->txtAssetCode = new QTextBox($this);
			$this->txtAssetCode->Name = QApplication::Translate('Asset Tag');
			$this->txtAssetCode->Text = $this->objAsset->AssetCode;
			$this->txtAssetCode->Required = true;
			$this->txtAssetCode->MaxLength = Asset::AssetCodeMaxLength;
		}

		// Create and Setup txtImagePath
		protected function txtImagePath_Create() {
			$this->txtImagePath = new QTextBox($this);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objAsset->ImagePath;
			$this->txtImagePath->MaxLength = Asset::ImagePathMaxLength;
		}

		// Create and Setup chkCheckedOutFlag
		protected function chkCheckedOutFlag_Create() {
			$this->chkCheckedOutFlag = new QCheckBox($this);
			$this->chkCheckedOutFlag->Name = QApplication::Translate('Checked Out Flag');
			$this->chkCheckedOutFlag->Checked = $this->objAsset->CheckedOutFlag;
		}

		// Create and Setup chkReservedFlag
		protected function chkReservedFlag_Create() {
			$this->chkReservedFlag = new QCheckBox($this);
			$this->chkReservedFlag->Name = QApplication::Translate('Reserved Flag');
			$this->chkReservedFlag->Checked = $this->objAsset->ReservedFlag;
		}

		// Create and Setup chkLinkedFlag
		protected function chkLinkedFlag_Create() {
			$this->chkLinkedFlag = new QCheckBox($this);
			$this->chkLinkedFlag->Name = QApplication::Translate('Linked Flag');
			$this->chkLinkedFlag->Checked = $this->objAsset->LinkedFlag;
		}

		// Create and Setup chkArchivedFlag
		protected function chkArchivedFlag_Create() {
			$this->chkArchivedFlag = new QCheckBox($this);
			$this->chkArchivedFlag->Name = QApplication::Translate('Archived Flag');
			$this->chkArchivedFlag->Checked = $this->objAsset->ArchivedFlag;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objAsset->CreatedByObject) && ($this->objAsset->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objAsset->CreationDate;
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
				if (($this->objAsset->ModifiedByObject) && ($this->objAsset->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objAsset->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstAssetCustomFieldHelper
		protected function lstAssetCustomFieldHelper_Create() {
			$this->lstAssetCustomFieldHelper = new QListBox($this);
			$this->lstAssetCustomFieldHelper->Name = QApplication::Translate('Asset Custom Field Helper');
			$this->lstAssetCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objAssetCustomFieldHelperArray = AssetCustomFieldHelper::LoadAll();
			if ($objAssetCustomFieldHelperArray) foreach ($objAssetCustomFieldHelperArray as $objAssetCustomFieldHelper) {
				$objListItem = new QListItem($objAssetCustomFieldHelper->__toString(), $objAssetCustomFieldHelper->AssetId);
				if ($objAssetCustomFieldHelper->AssetId == $this->objAsset->AssetId)
					$objListItem->Selected = true;
				$this->lstAssetCustomFieldHelper->AddItem($objListItem);
			}
			// Because AssetCustomFieldHelper's AssetCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstAssetCustomFieldHelper->SelectedValue)
				$this->lstAssetCustomFieldHelper->Enabled = false;
		}


		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}

		// Setup btnCancel
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
		}

		// Setup btnDelete
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Asset')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateAssetFields() {
			$this->objAsset->ParentAssetId = $this->lstParentAsset->SelectedValue;
			$this->objAsset->AssetModelId = $this->lstAssetModel->SelectedValue;
			$this->objAsset->LocationId = $this->lstLocation->SelectedValue;
			$this->objAsset->AssetCode = $this->txtAssetCode->Text;
			$this->objAsset->ImagePath = $this->txtImagePath->Text;
			$this->objAsset->CheckedOutFlag = $this->chkCheckedOutFlag->Checked;
			$this->objAsset->ReservedFlag = $this->chkReservedFlag->Checked;
			$this->objAsset->LinkedFlag = $this->chkLinkedFlag->Checked;
			$this->objAsset->ArchivedFlag = $this->chkArchivedFlag->Checked;
			$this->objAsset->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objAsset->CreationDate = $this->calCreationDate->DateTime;
			$this->objAsset->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objAsset->AssetCustomFieldHelper = AssetCustomFieldHelper::Load($this->lstAssetCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateAssetFields();
			$this->objAsset->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objAsset->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('asset_list.php');
		}
	}
?>