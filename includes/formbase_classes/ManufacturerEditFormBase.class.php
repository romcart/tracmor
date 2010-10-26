<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Manufacturer class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Manufacturer object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ManufacturerEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ManufacturerEditFormBase extends QForm {
		// General Form Variables
		protected $objManufacturer;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Manufacturer's Data Fields
		protected $lblManufacturerId;
		protected $txtShortDescription;
		protected $txtLongDescription;
		protected $txtImagePath;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstManufacturerCustomFieldHelper;

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupManufacturer() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intManufacturerId = QApplication::QueryString('intManufacturerId');
			if (($intManufacturerId)) {
				$this->objManufacturer = Manufacturer::Load(($intManufacturerId));

				if (!$this->objManufacturer)
					throw new Exception('Could not find a Manufacturer object with PK arguments: ' . $intManufacturerId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objManufacturer = new Manufacturer();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupManufacturer to either Load/Edit Existing or Create New
			$this->SetupManufacturer();

			// Create/Setup Controls for Manufacturer's Data Fields
			$this->lblManufacturerId_Create();
			$this->txtShortDescription_Create();
			$this->txtLongDescription_Create();
			$this->txtImagePath_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
			$this->lstManufacturerCustomFieldHelper_Create();

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblManufacturerId
		protected function lblManufacturerId_Create() {
			$this->lblManufacturerId = new QLabel($this);
			$this->lblManufacturerId->Name = QApplication::Translate('Manufacturer Id');
			if ($this->blnEditMode)
				$this->lblManufacturerId->Text = $this->objManufacturer->ManufacturerId;
			else
				$this->lblManufacturerId->Text = 'N/A';
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objManufacturer->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Manufacturer::ShortDescriptionMaxLength;
		}

		// Create and Setup txtLongDescription
		protected function txtLongDescription_Create() {
			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objManufacturer->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		}

		// Create and Setup txtImagePath
		protected function txtImagePath_Create() {
			$this->txtImagePath = new QTextBox($this);
			$this->txtImagePath->Name = QApplication::Translate('Image Path');
			$this->txtImagePath->Text = $this->objManufacturer->ImagePath;
			$this->txtImagePath->MaxLength = Manufacturer::ImagePathMaxLength;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objManufacturer->CreatedByObject) && ($this->objManufacturer->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objManufacturer->CreationDate;
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
				if (($this->objManufacturer->ModifiedByObject) && ($this->objManufacturer->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objManufacturer->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
		}

		// Create and Setup lstManufacturerCustomFieldHelper
		protected function lstManufacturerCustomFieldHelper_Create() {
			$this->lstManufacturerCustomFieldHelper = new QListBox($this);
			$this->lstManufacturerCustomFieldHelper->Name = QApplication::Translate('Manufacturer Custom Field Helper');
			$this->lstManufacturerCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
			$objManufacturerCustomFieldHelperArray = ManufacturerCustomFieldHelper::LoadAll();
			if ($objManufacturerCustomFieldHelperArray) foreach ($objManufacturerCustomFieldHelperArray as $objManufacturerCustomFieldHelper) {
				$objListItem = new QListItem($objManufacturerCustomFieldHelper->__toString(), $objManufacturerCustomFieldHelper->ManufacturerId);
				if ($objManufacturerCustomFieldHelper->ManufacturerId == $this->objManufacturer->ManufacturerId)
					$objListItem->Selected = true;
				$this->lstManufacturerCustomFieldHelper->AddItem($objListItem);
			}
			// Because ManufacturerCustomFieldHelper's ManufacturerCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstManufacturerCustomFieldHelper->SelectedValue)
				$this->lstManufacturerCustomFieldHelper->Enabled = false;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Manufacturer')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateManufacturerFields() {
			$this->objManufacturer->ShortDescription = $this->txtShortDescription->Text;
			$this->objManufacturer->LongDescription = $this->txtLongDescription->Text;
			$this->objManufacturer->ImagePath = $this->txtImagePath->Text;
			$this->objManufacturer->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objManufacturer->CreationDate = $this->calCreationDate->DateTime;
			$this->objManufacturer->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
			$this->objManufacturer->ManufacturerCustomFieldHelper = ManufacturerCustomFieldHelper::Load($this->lstManufacturerCustomFieldHelper->SelectedValue);
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateManufacturerFields();
			$this->objManufacturer->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objManufacturer->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('manufacturer_list.php');
		}
	}
?>