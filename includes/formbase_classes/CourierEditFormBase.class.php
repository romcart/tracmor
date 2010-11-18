<?php
	/**
	 * This is the abstract Form class for the Create, Edit, and Delete functionality
	 * of the Courier class.  This code-generated class
	 * contains all the basic Qform elements to display an HTML form that can
	 * manipulate a single Courier object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CourierEditFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CourierEditFormBase extends QForm {
		// General Form Variables
		protected $objCourier;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls for Courier's Data Fields
		protected $lblCourierId;
		protected $txtShortDescription;
		protected $chkActiveFlag;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Button Actions
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function SetupCourier() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intCourierId = QApplication::QueryString('intCourierId');
			if (($intCourierId)) {
				$this->objCourier = Courier::Load(($intCourierId));

				if (!$this->objCourier)
					throw new Exception('Could not find a Courier object with PK arguments: ' . $intCourierId);

				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->objCourier = new Courier();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			// Call SetupCourier to either Load/Edit Existing or Create New
			$this->SetupCourier();

			// Create/Setup Controls for Courier's Data Fields
			$this->lblCourierId_Create();
			$this->txtShortDescription_Create();
			$this->chkActiveFlag_Create();

			// Create/Setup ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		// Protected Create Methods
		// Create and Setup lblCourierId
		protected function lblCourierId_Create() {
			$this->lblCourierId = new QLabel($this);
			$this->lblCourierId->Name = QApplication::Translate('Courier Id');
			if ($this->blnEditMode)
				$this->lblCourierId->Text = $this->objCourier->CourierId;
			else
				$this->lblCourierId->Text = 'N/A';
		}

		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objCourier->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Courier::ShortDescriptionMaxLength;
		}

		// Create and Setup chkActiveFlag
		protected function chkActiveFlag_Create() {
			$this->chkActiveFlag = new QCheckBox($this);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objCourier->ActiveFlag;
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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Courier')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}
		
		// Protected Update Methods
		protected function UpdateCourierFields() {
			$this->objCourier->ShortDescription = $this->txtShortDescription->Text;
			$this->objCourier->ActiveFlag = $this->chkActiveFlag->Checked;
		}


		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->UpdateCourierFields();
			$this->objCourier->Save();


			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$this->objCourier->Delete();

			$this->RedirectToListPage();
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('courier_list.php');
		}
	}
?>