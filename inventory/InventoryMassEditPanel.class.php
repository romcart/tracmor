<?php

class InventoryMassEditPanel extends QPanel {

	/**
	 * @var  QCheckBox $chkCategory
	 * @var  QCheckBox $chkManufacturer
	 * @var  QCheckBox $chkLongDescription
	 *
	 * @var QTextBox $txtLongDescription
	 * @var QListBox $lstManufacturer
	 * @var QListBox $lstCategory
	 */

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../inventory/InventoryMassEditPanel.tpl.php';

	public $objInventoryModel;
	public $arrInventoryToEdit = array();
	public $arrCustomFieldsToEdit = array();
	public $arrCustomFields;
	public $arrCheckboxes = array();
	public $chkCategory;
	public $chkManufacturer;
	public $chkLongDescription;
	public $txtLongDescription;
	public $lstManufacturer;
	public $lstCategory;
	public $btnApply;
	public $btnCancel;
	public $blnEditBuiltInFields;

	public function __construct($objParentObject, $strClosePanelMethod , $arrayInventoryId) {

		try {
			parent::__construct($objParentObject);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->arrInventoryToEdit = $arrayInventoryId;

		//Set Edit Display Logic of Built-In Fields
		$objRoleEntityQtypeBuiltInAuthorization = RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Inventory,2);
		if ($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag) {
			$this->blnEditBuiltInFields=true;
		} else{
			$this->blnEditBuiltInFields=false;
		}

		$this->txtLongDescription_Create();
		$this->lstCategory_Create();
		$this->lstManufacturer_Create();

		$this->chkCategory_Create();
		$this->chkManufacturer_Create();
		$this->chkLongDescription_Create();
		$this->btnApply_Create();
		$this->btnCancel_Create();

		// Load Custom Fields
		$objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, false);
		if ($objCustomFieldArray) {
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);

			foreach ($this->arrCustomFields as $field) {
				$field['input']->Enabled = false;
				$this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
				$this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
				$this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
				$this->arrCheckboxes[$field['input']->strControlId]->Enabled = $field['blnEdit'];
			}
		}
	}

	// Create the Category Input
	protected function lstCategory_Create() {
		$this->lstCategory = new QListBox($this, 'Category');
		$this->lstCategory->Name = QApplication::Translate('Category');
		$this->lstCategory->AddItem('- Select One -', null);
		$objCategoryArray = Category::LoadAllWithFlags(false, true, 'short_description');
		if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
			$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
			$this->lstCategory->AddItem($objListItem);
		}
		$this->lstCategory->Enabled = false;
	}

	public function chkCategory_Create() {
		$this->chkCategory = new QCheckBox($this, 'chkCategory');
		$this->chkCategory->Name = 'category';
		$this->chkCategory->Checked = false;
		$this->chkCategory->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
		$this->chkCategory->Enabled = $this->blnEditBuiltInFields;
	}

	// Create and Setup lstManufacturer
	protected function lstManufacturer_Create() {
		$this->lstManufacturer = new QListBox($this, 'Manufacturer');
		$this->lstManufacturer->Name = QApplication::Translate('Manufacturer');
		$this->lstManufacturer->Required = true;
		$this->lstManufacturer->AddItem('- Select One -', null);
		$objManufacturerArray = Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription)));
		if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
			$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
			$this->lstManufacturer->AddItem($objListItem);
		}
		$this->lstManufacturer->Enabled = false;
	}

	public function chkManufacturer_Create() {
		$this->chkManufacturer = new QCheckBox($this, 'chkManufacturer');
		$this->chkManufacturer->Name = 'manufacturer';
		$this->chkManufacturer->Checked = false;
		$this->chkManufacturer->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
		$this->chkManufacturer->Enabled = $this->blnEditBuiltInFields;
	}

	// Create and Setup txtLongDescription
	protected function txtLongDescription_Create() {
		$this->txtLongDescription = new QTextBox($this, 'LongDescription');
		$this->txtLongDescription->Name = QApplication::Translate('Long Description');
		$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		$this->txtLongDescription->Enabled = false;
	}

	public function chkLongDescription_Create() {
		$this->chkLongDescription = new QCheckBox($this, 'chkLongDescription');
		$this->chkLongDescription->Name = 'long_description';
		$this->chkLongDescription->Checked = false;
		$this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
		$this->chkLongDescription->Enabled = $this->blnEditBuiltInFields;
	}

	public function btnApply_Create() {
		$this->btnApply = new QButton($this);
		$this->btnApply->Name = 'Apply';
		$this->btnApply->Text = 'Apply';
		$this->btnApply->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
	}

	public function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Name = 'Cancel';
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->AddAction(new QClickEvent(), new QHideDialogBox($this->ParentControl));
	}

	public function btnApply_Click($strFormId, $strControlId, $strParameter) {
		$this->EnableSelectedControls();
		$this->ClearWarnings();
		$blnError = false;

		// Make sure at least one checkbox is checked
		if (!$this->chkCategory->Checked && !$this->chkManufacturer->Checked && !$this->chkLongDescription->Checked) {
			$blnChecked = false;
			foreach ($this->arrCheckboxes as $objCheckBox) {
				if ($objCheckBox->Checked) {
					$blnChecked = true;
					break;
				}
			}

			if (!$blnChecked) {
				$blnError = true;
				$this->btnCancel->Warning = 'You must select at least one field to edit.';
				return;
			}
		}

		// Get an instance of the database
		$objDatabase = QApplication::$Database[1];
		// Begin a MySQL Transaction to be either committed or rolled back
		$objDatabase->TransactionBegin();
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
		}
		// Apply checked main_table fields
		$set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));
		
		// Force modified_date timestamp update
		$set[] = '`modified_date` = NOW()';

		if ($this->chkLongDescription->Checked) {
			$set[] = sprintf('`long_description`="%s"', $this->txtLongDescription->Text);
		}
		if ($this->chkManufacturer->Checked) {
			if ($this->lstManufacturer->SelectedValue !== null) {
				$set[] = sprintf('`manufacturer_id`=%s', $this->lstManufacturer->SelectedValue);
			} else {
				$blnError = true;
				$this->lstManufacturer->Warning = 'You must select a Manufacturer.';
			}
		}
		if ($this->chkCategory->Checked) {
			if ($this->lstCategory->SelectedValue!== null) {
				$set[] = sprintf('`category_id`= %s', $this->lstCategory->SelectedValue);
			} else {
				$blnError = true;
				$this->lstCategory->Warning = 'You must select a Category.';
			}
		}

		// First check that the user is authorized to edit this inventory
		foreach ($this->arrInventoryToEdit as $intInventoryId) {
			$objInventoryModel = InventoryModel::Load($intInventoryId);
			if (!QApplication::AuthorizeEntityBoolean($objInventoryModel, 2)) {
				$blnError = true;
				$this->btnCancel->Warning = 'You are not authorized to edit one or more of the selected inventory models.';
				break;
			}
		}

		// Save
		if (!$blnError)	{
			try {
				if (count($this->arrCustomFieldsToEdit)>0) {
					// preparing data to edit
					// Save the values from all of the custom field controls to save the asset
					foreach ($this->arrInventoryToEdit as $intInventoryId) {
						$objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Inventory, false);
						$selectedCustomFieldsArray = array();
						foreach ($objCustomFieldsArray as $objCustomField) {
							if (in_array($objCustomField->CustomFieldId,$customFieldIdArray)) {
								$selectedCustomFieldsArray[]= $objCustomField;
							}
						}
						CustomField::SaveControls($selectedCustomFieldsArray,
							true,
							$this->arrCustomFieldsToEdit,
							$intInventoryId,
							EntityQtype::Inventory);
					}
				}
				$strQuery = sprintf("UPDATE `inventory_model`
									 SET ". implode(",",$set). "
									 WHERE `inventory_model_id` IN (%s)",
									 implode(",", $this->arrInventoryToEdit));

				$objDatabase = QApplication::$Database[1];
				$objDatabase->NonQuery($strQuery);
				$objDatabase->TransactionCommit();
				QApplication::Redirect('');
			}
			catch (QMySqliDatabaseException $objExc) {
				$objDatabase->TransactionRollback();
				throw new QDatabaseException();
			}
		} else {
			$objDatabase->TransactionRollback();
		}
	}

	public function clearWarnings() {
		$this->txtLongDescription->Warning = '';
		$this->lstCategory->Warning = '';
		$this->lstManufacturer->Warning = '';

		if ($this->arrCustomFields) {
			foreach ($this->arrCustomFields as $field) {
				$field['input']->Warning = '';
			}
		}
	}

	public function EnableSelectedControls() {
		$this->lstCategory->Enabled = $this->chkCategory->Checked;
		$this->lstManufacturer->Enabled = $this->chkManufacturer->Checked;
		$this->txtLongDescription->Enabled = $this->chkLongDescription->Checked;

		if ($this->arrCustomFields) {
			foreach ($this->arrCustomFields as $field) {
				$field['input']->Enabled = $this->arrCheckboxes[$field['input']->strControlId]->Checked;
			}
		}
	}
}
?>
