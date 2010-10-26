<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Category class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Category object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CategoryEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CategoryEditFormBase extends QForm {
		// General Form Variables
		protected $objCategory;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Category's Data Fields
		protected $lblCategoryId;
		protected $txtShortDescription;
		protected $txtLongDescription;
		protected $txtImagePath;
		protected $chkAssetFlag;
		protected $chkInventoryFlag;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstCategoryCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupCategory() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intCategoryId = QApplication::QueryString('intCategoryId');
			if (($intCategoryId)) {
				$this->objCategory = Category::Load(($intCategoryId));

				if (!$this->objCategory)
					throw new Exception('Could not find a Category object with PK arguments: ' . $intCategoryId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objCategory = new Category();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupCategory to either Load/Edit Existing or Create New
			$this->SetupCategory();

			// Create/Setup Controls for Category's Data Fields
			$this->lblCategoryId_Create();
			$this->txtShortDescription_Create();
			$this->txtLongDescription_Create();
			$this->txtImagePath_Create();
			$this->chkAssetFlag_Create();
			$this->chkInventoryFlag_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstCategoryCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblCategoryId
		protected function lblCategoryId_Create() {
			$this->lblCategoryId = new QLabel($this);
			$this->lblCategoryId->Name = QApplication::Translate('Category Id');
			if ($this->blnEditMode)
				$this->lblCategoryId->Text = $this->objCategory->CategoryId;
			else
				$this->lblCategoryId->Text = 'N/A';
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCategory->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Category::ShortDescriptionMaxLength;
		}

		// Create and Setup txtLongDescription
		protected function txtLongDescription_Create() {
			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objCategory->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		}

		// Create and Setup txtImagePath
		protected function txtImagePath_Create() {
			$this->txtImagePath = new QTextBox($this);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objCategory->ImagePath;
			$this->txtImagePath->MaxLength = Category::ImagePathMaxLength;
		}

		// Create and Setup chkAssetFlag
		protected function chkAssetFlag_Create() {
			$this->chkAssetFlag = new QCheckBox($this);
			$this->chkAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->chkAssetFlag->Checked = $this->objCategory->AssetFlag;
		}

		// Create and Setup chkInventoryFlag
		protected function chkInventoryFlag_Create() {
			$this->chkInventoryFlag = new QCheckBox($this);
			$this->chkInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->chkInventoryFlag->Checked = $this->objCategory->InventoryFlag;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objCategory->CreatedByObject) && ($this->objCategory->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objCategory->CreationDate;
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
				if (($this->objCategory->ModifiedByObject) && ($this->objCategory->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objCategory->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstCategoryCustomFieldHelper
		protected function lstCategoryCustomFieldHelper_Create() {
			$this->lstCategoryCustomFieldHelper = new QListBox($this);
			$this->lstCategoryCustomFieldHelper->Name = QApplication::Translate('Category Custom Field Helper');
			$this->lstCategoryCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objCategoryCustomFieldHelperArray = CategoryCustomFieldHelper::LoadAll();
			if ($objCategoryCustomFieldHelperArray) foreach ($objCategoryCustomFieldHelperArray as $objCategoryCustomFieldHelper) {
				$objListItem = new QListItem($objCategoryCustomFieldHelper->__toString(), $objCategoryCustomFieldHelper->CategoryId);
				if ($objCategoryCustomFieldHelper->CategoryId == $this->objCategory->CategoryId)
					$objListItem->Selected = true;
				$this->lstCategoryCustomFieldHelper->AddItem($objListItem);
			}
			// Because CategoryCustomFieldHelper's CategoryCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstCategoryCustomFieldHelper->SelectedValue)
				$this->lstCategoryCustomFieldHelper->Enabled = false;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Category')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateCategoryFields() {
			$this->objCategory->ShortDescription = $this->txtShortDescription->Text;
			$this->objCategory->LongDescription = $this->txtLongDescription->Text;
			$this->objCategory->ImagePath = $this->txtImagePath->Text;
			$this->objCategory->AssetFlag = $this->chkAssetFlag->Checked;
			$this->objCategory->InventoryFlag = $this->chkInventoryFlag->Checked;
			$this->objCategory->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objCategory->CreationDate = $this->calCreationDate->DateTime;
			$this->objCategory->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objCategory->CategoryCustomFieldHelper = CategoryCustomFieldHelper::Load($this->lstCategoryCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateCategoryFields();
			$this->objCategory->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objCategory->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('category_list.php');
		}
	}
?>