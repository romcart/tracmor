<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
// Include the classfile for CompanyEditPanelBase
require(__PANELBASE_CLASSES__ . '/CompanyEditPanelBase.class.php');

class CompanyMassEditPanel extends CompanyEditPanelBase {

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../contacts/CompanyMassEditPanel.tpl.php';
	// An array of custom fields

	// Primary Address inputs for new company
	public $arrCheckboxes = array();
	public $arrCustomFields;
	public $arrCustomFieldsToEdit = array();
	public $txtLongDescription;
	public $chkLongDescription;
	public $arrCompaniesToEdit = array();

	public function __construct($objParentObject, $strClosePanelMethod, $arrayCompanyId) {

		try {
			parent::__construct($objParentObject, $strClosePanelMethod);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->arrCompaniesToEdit = $arrayCompanyId;
		$this->txtLongDescription_Create();
		$this->chkLongDescription_Create();
		$this->btnSave->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to edit these items?'));

		$this->strOverflow = QOverflow::Auto;

		$objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Company, false);
		if (count($objCustomFieldArray)>0) {
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);
			foreach ($this->arrCustomFields as $field) {
				$field['input']->Enabled = false;
				$this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
				$this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
				$this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
			}
			$this->txtLongDescription->Enabled = false;
		}
		//$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;
	}

	// Create and Setup txtLongDescription
	protected function txtLongDescription_Create() {
		$this->txtLongDescription = new QTextBox($this);
		$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		$this->txtLongDescription->Name = QApplication::Translate('Long Description');
		$this->txtLongDescription->strControlId = 'LongDescription';
	}

	// Create and Setup chkShortDescription
	public function chkLongDescription_Create() {
		$this->chkLongDescription = new QCheckBox($this,'chkLongDescription');
		$this->chkLongDescription->Name = 'Description';
		$this->chkLongDescription->Checked = false;
		$this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	// Save Button Click Actions
	public function btnSave_Click($strFormId, $strControlId, $strParameter) {
		$this->clearWarnings();
		$blnError = false;
		// Get an instance of the database
		$objDatabase = QApplication::$Database[1];
		// Begin a MySQL Transaction to be either committed or rolled back
		$objDatabase->TransactionBegin();
		$strQuery = sprintf("
			UPDATE `company`
			SET `long_description`='%s'
			WHERE `company_id` IN (%s)
			", $this->txtLongDescription->Text,
			implode(",", $this->arrCompaniesToEdit));
		try {
			if (count($this->arrCustomFields)>0) {
				$customFieldIdArray = array();

				foreach ($this->arrCustomFields as $field) {
					if ($this->arrCheckboxes[$field['input']->strControlId]->Checked) {
						if ($field['input'] instanceof QTextBox
							&& $field['input']->Required
							&& $field['input']->Text == null
							||$field['input'] instanceof QListBox
								&& $field['input']->Required
								&& $field['input']->SelectedValue == null
						) {
							$blnError = true;
							$field['input']->Warning = "Required.";
						} else {
							$this->arrCustomFieldsToEdit[] = $field;
							$customFieldIdArray[] = (int)(str_replace('cf','',$field['input']->strControlId));
						}
					}
				}

				if (count($this->arrCustomFieldsToEdit)>0 && !$blnError) {
					// preparing data to edit
					// Save the values from all of the custom field controls to save the asset
					foreach ($this->arrCompaniesToEdit as $intCompanyId) {
						$objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Company, false);
						$selectedCustomFieldsArray = array();
						foreach ($objCustomFieldsArray as $objCustomField) {
							if (in_array($objCustomField->CustomFieldId,$customFieldIdArray)) {
								$selectedCustomFieldsArray[]= $objCustomField;
							}
						}
						CustomField::SaveControls($selectedCustomFieldsArray,
												  true,
												  $this->arrCustomFieldsToEdit,
												  $intCompanyId,
												  EntityQtype::Company);
					}

				}

				if ($this->chkLongDescription->Checked  && !$blnError) {
					$objDatabase->NonQuery($strQuery);
				}
			} else {
				$objDatabase->NonQuery($strQuery);
			}
			$objDatabase->TransactionCommit();
		} catch (QMySqliDatabaseException $objExc) {
			$objDatabase->TransactionRollback();
			throw new QDatabaseException();
		}

		if (!$blnError) {
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
			QApplication::Redirect('');
		} else {
			$objDatabase->TransactionRollback();
			$this->arrCustomFieldsToEdit = array();
			$this->uncheck();
		}
	}

	// Cancel Button Click Action
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->ParentControl->RemoveChildControls(true);
		$this->CloseSelf(true);
		QApplication::Redirect('');
	}

	public function uncheck() {
		$this->chkLongDescription->Checked = false;
		foreach($this->arrCustomFields as $field) {
			$this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
		}
	}

	public function clearWarnings() {
		if (count($this->arrCustomFields)>0) {
			foreach ($this->arrCustomFields as $field) {
				$field['input']->Warning = '';
			}
			$this->txtLongDescription->Enabled = false;
		}
	}
}
?>