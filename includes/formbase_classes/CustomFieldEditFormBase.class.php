<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the CustomField class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single CustomField object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CustomFieldEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CustomFieldEditFormBase extends QForm {
		// General Form Variables
		protected $objCustomField;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for CustomField's Data Fields
		protected $lblCustomFieldId;
		protected $lstCustomFieldQtype;
		protected $lstDefaultCustomFieldValue;
		protected $txtShortDescription;
		protected $chkActiveFlag;
		protected $chkRequiredFlag;
		protected $lstCreatedByObject;
		protected $calCreationDate;
		protected $lstModifiedByObject;
		protected $lblModifiedDate;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupCustomField() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intCustomFieldId = QApplication::QueryString('intCustomFieldId');
			if (($intCustomFieldId)) {
				$this->objCustomField = CustomField::Load(($intCustomFieldId));

				if (!$this->objCustomField)
					throw new Exception('Could not find a CustomField object with PK arguments: ' . $intCustomFieldId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objCustomField = new CustomField();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupCustomField to either Load/Edit Existing or Create New
			$this->SetupCustomField();

			// Create/Setup Controls for CustomField's Data Fields
			$this->lblCustomFieldId_Create();
			$this->lstCustomFieldQtype_Create();
			$this->lstDefaultCustomFieldValue_Create();
			$this->txtShortDescription_Create();
			$this->chkActiveFlag_Create();
			$this->chkRequiredFlag_Create();
			$this->lstCreatedByObject_Create();
			$this->calCreationDate_Create();
			$this->lstModifiedByObject_Create();
			$this->lblModifiedDate_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblCustomFieldId
		protected function lblCustomFieldId_Create() {
			$this->lblCustomFieldId = new QLabel($this);
			$this->lblCustomFieldId->Name = QApplication::Translate('Custom Field Id');
			if ($this->blnEditMode)
				$this->lblCustomFieldId->Text = $this->objCustomField->CustomFieldId;
			else
				$this->lblCustomFieldId->Text = 'N/A';
		}

		// Create and Setup lstCustomFieldQtype
		protected function lstCustomFieldQtype_Create() {
			$this->lstCustomFieldQtype = new QListBox($this);
			$this->lstCustomFieldQtype->Name = QApplication::Translate('Custom Field Qtype');
			$this->lstCustomFieldQtype->Required = true;
			foreach (CustomFieldQtype::$NameArray as $intId => $strValue)
				$this->lstCustomFieldQtype->AddItem(new QListItem($strValue, $intId, $this->objCustomField->CustomFieldQtypeId == $intId));
		}

		// Create and Setup lstDefaultCustomFieldValue
		protected function lstDefaultCustomFieldValue_Create() {
			$this->lstDefaultCustomFieldValue = new QListBox($this);
			$this->lstDefaultCustomFieldValue->Name = QApplication::Translate('Default Custom Field Value');
			$this->lstDefaultCustomFieldValue->AddItem(QApplication::Translate('- Select One -'), null);
			$objDefaultCustomFieldValueArray = CustomFieldValue::LoadAll();
			if ($objDefaultCustomFieldValueArray) foreach ($objDefaultCustomFieldValueArray as $objDefaultCustomFieldValue) {
				$objListItem = new QListItem($objDefaultCustomFieldValue->__toString(), $objDefaultCustomFieldValue->CustomFieldValueId);
				if (($this->objCustomField->DefaultCustomFieldValue) && ($this->objCustomField->DefaultCustomFieldValue->CustomFieldValueId == $objDefaultCustomFieldValue->CustomFieldValueId))
					$objListItem->Selected = true;
				$this->lstDefaultCustomFieldValue->AddItem($objListItem);
			}
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCustomField->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = CustomField::ShortDescriptionMaxLength;
		}

		// Create and Setup chkActiveFlag
		protected function chkActiveFlag_Create() {
			$this->chkActiveFlag = new QCheckBox($this);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objCustomField->ActiveFlag;
		}

		// Create and Setup chkRequiredFlag
		protected function chkRequiredFlag_Create() {
			$this->chkRequiredFlag = new QCheckBox($this);
			$this->chkRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->chkRequiredFlag->Checked = $this->objCustomField->RequiredFlag;
		}

		// Create and Setup lstCreatedByObject
		protected function lstCreatedByObject_Create() {
			$this->lstCreatedByObject = new QListBox($this);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objCreatedByObjectArray = UserAccount::LoadAll();
			if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objCustomField->CreatedByObject) && ($this->objCustomField->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup calCreationDate
		protected function calCreationDate_Create() {
			$this->calCreationDate = new QDateTimePicker($this);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objCustomField->CreationDate;
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
				if (($this->objCustomField->ModifiedByObject) && ($this->objCustomField->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}
		}

		// Create and Setup lblModifiedDate
		protected function lblModifiedDate_Create() {
			$this->lblModifiedDate = new QLabel($this);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objCustomField->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'CustomField')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateCustomFieldFields() {
			$this->objCustomField->CustomFieldQtypeId = $this->lstCustomFieldQtype->SelectedValue;
			$this->objCustomField->DefaultCustomFieldValueId = $this->lstDefaultCustomFieldValue->SelectedValue;
			$this->objCustomField->ShortDescription = $this->txtShortDescription->Text;
			$this->objCustomField->ActiveFlag = $this->chkActiveFlag->Checked;
			$this->objCustomField->RequiredFlag = $this->chkRequiredFlag->Checked;
			$this->objCustomField->CreatedBy = $this->lstCreatedByObject->SelectedValue;
			$this->objCustomField->CreationDate = $this->calCreationDate->DateTime;
			$this->objCustomField->ModifiedBy = $this->lstModifiedByObject->SelectedValue;
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateCustomFieldFields();
			$this->objCustomField->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objCustomField->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('custom_field_list.php');
		}
	}
?>