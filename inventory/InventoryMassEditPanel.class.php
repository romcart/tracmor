<?php

class InventoryMassEditPanel extends QPanel {

	/**
	 * @var  QCheckBox $chkCategory
	 * @var  QCheckBox $chkManufacturer
	 * @var  QCheckBox $chkLongDescription
	 * @var  QCheckBox $chkShortDescription
	 *
	 * @var QTextBox $txtLongDescription
	 * @var QTextBox $txtShortDescription
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

	public $chkShortDescription;
	public $chkCategory;
	public $chkManufacturer;
	public $chkLongDescription;

	public $txtShortDescription;
	public $txtLongDescription;
	public $lstManufacturer;
	public $lstCategory;

	public $btnApply;
	public $btnCancel;
	public $lblWarning;

	public function __construct($objParentObject, $strClosePanelMethod , $arrayInventoryId) {

		try {
			parent::__construct($objParentObject);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->arrInventoryToEdit = $arrayInventoryId;

		$this->txtShortDescription_Create();
		$this->txtLongDescription_Create();
		$this->lstCategory_Create();
		$this->lstManufacturer_Create();


		$this->chkShortDescription_Create();
		$this->chkCategory_Create();
		$this->chkManufacturer_Create();
		$this->chkLongDescription_Create();
		$this->btnApply_Create();
		$this->btnCancel_Create();

		// Disable inputs
		$this->lstCategory->Enabled = false;
		$this->lstManufacturer->Enabled = false;
		$this->txtShortDescription->Enabled = false;
		$this->txtLongDescription->Enabled = false;

        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, false);
        if($objCustomFieldArray){
            $this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);

            foreach($this->arrCustomFields as $field){
                $field['input']->Enabled = false;
                $this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
                $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
                $this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
            }
        }
    }

	// Create the Short Description Input
	protected function txtShortDescription_Create() {
		$this->txtShortDescription = new QTextBox($this, 'ShortDescription');
		$this->txtShortDescription->Name = 'Short Description';
	}

	public function chkShortDescription_Create(){
		$this->chkShortDescription = new QCheckBox($this, 'chkShortDescription');
		$this->chkShortDescription->Name = 'Short Description';
		$this->chkShortDescription->Checked = false;
		$this->chkShortDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
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
	}

	public function chkCategory_Create(){
		$this->chkCategory = new QCheckBox($this, 'chkCategory');
		$this->chkCategory->Name = 'category';
		$this->chkCategory->Checked = false;
		$this->chkCategory->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

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
	}

	public function chkManufacturer_Create(){
		$this->chkManufacturer = new QCheckBox($this, 'chkManufacturer');
		$this->chkManufacturer->Name = 'manufacturer';
		$this->chkManufacturer->Checked = false;
		$this->chkManufacturer->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	// Create and Setup txtLongDescription
	protected function txtLongDescription_Create() {
		$this->txtLongDescription = new QTextBox($this, 'LongDescription');
		$this->txtLongDescription->Name = QApplication::Translate('Long Description');
		$this->txtLongDescription->TextMode = QTextMode::MultiLine;
	}

	public function chkLongDescription_Create(){
		$this->chkLongDescription = new QCheckBox($this, 'chkLongDescription');
		$this->chkLongDescription->Name = 'long_description';
		$this->chkLongDescription->Checked = false;
		$this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	public function btnApply_Create(){

		$this->btnApply = new QButton($this);
		$this->btnApply->Name = 'Apply';
		$this->btnApply->Text = 'Apply';
        $this->btnApply->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to edit these items?'));
		$this->btnApply->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
		$this->btnApply->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
		$this->btnApply->AddAction(new QEnterKeyEvent(), new QTerminateAction());

	}

	public function btnCancel_Create(){

		$this->btnCancel = new QButton($this);
		$this->btnCancel->Name = 'Cancel';
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());

	}

	public function lblWarning_Create(){
		$this->lblWarning = new QLabel($this);
		$this->lblWarning->Class = 'warning';
	}

	public function btnApply_Click($strFormId, $strControlId, $strParameter){
        $this->clearWarnings();
        $blnError = false;
        // Get an instance of the database
        $objDatabase = QApplication::$Database[1];
        // Begin a MySQL Transaction to be either committed or rolled back
        $objDatabase->TransactionBegin();
        if(count($this->arrCustomFields)>0)
        {
            $customFieldIdArray = array();

            foreach ($this->arrCustomFields as $field){
                if($this->arrCheckboxes[$field['input']->strControlId]->Checked){
                    if($field['input'] instanceof QTextBox
                        && $field['input']->Required
                        && $field['input']->Text == null
                        ||$field['input'] instanceof QListBox
                            && $field['input']->Required
                            && $field['input']->SelectedValue == null
                    ){
                        $blnError = true;
                        $field['input']->Warning = "Required.";
                    }
                    else{
                        $this->arrCustomFieldsToEdit[] = $field;
                        $customFieldIdArray[] = (int)(str_replace('cf','',$field['input']->strControlId));
                    }
                }
            }
        }
        // Apply checked main_table fields
        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));
        if($this->chkShortDescription->Checked){
            if(trim($this->txtShortDescription->Text)!== ''){
                $set[] = sprintf('`short_description`="%s"' , $this->txtShortDescription->Text);
            }
            else{
                $blnError = true;
                $this->txtShortDescription->Warning = 'Name shouldn\'t be empty';
            }
        }
        if($this->chkLongDescription->Checked){
            $set[] = sprintf('`long_description`="%s"', $this->txtLongDescription->Text);
        }
        if($this->chkManufacturer->Checked){
            if($this->lstManufacturer->SelectedValue !== null){
                $set[] = sprintf('`manufacturer_id`=%s', $this->lstManufacturer->SelectedValue);
            }
            else{
                $blnError = true;
                $this->lstManufacturer->Warning = 'Manufacturer can\'t be empty';
            }
        }
        if($this->chkCategory->Checked)
        {
            if($this->lstCategory->SelectedValue!== null){
                $set[] = sprintf('`category_id`= %s', $this->lstCategory->SelectedValue);
            }
            else{
                $blnError = true;
                $this->lstCategory->Warning = 'Category can\'t be empty';
            }
        }
        // Save
        if(!$blnError)
        {
            try{
                if (count($this->arrCustomFieldsToEdit)>0) {
                    // preparing data to edit
                    // Save the values from all of the custom field controls to save the asset
                    foreach($this->arrInventoryToEdit as $intInventoryId){
                        $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Inventory, false);
                        $selectedCustomFieldsArray = array();
                        foreach ($objCustomFieldsArray as $objCustomField){
                            if(in_array($objCustomField->CustomFieldId,$customFieldIdArray))
                            {
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
            catch(QMySqliDatabaseException $objExc) {
                $objDatabase->TransactionRollback();
                throw new QDatabaseException();
            }
        }
        else{
            $objDatabase->TransactionRollback();
            $this->uncheck();
            $this->arrCustomFieldsToEdit = array();
        }
	}


	// Cancel Button Click Action
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		//$this->ParentControl->RemoveChildControls(true);
		//$this->CloseSelf(true);
		$this->ParentControl->HideDialogBox();
        QApplication::Redirect('');
	}

    public function uncheck(){
        $this->chkShortDescription->Checked = false;
        $this->chkCategory->Checked = false;
        $this->chkManufacturer->Checked = false;
        $this->chkLongDescription->Checked = false;
        foreach($this->arrCustomFields as $field){
            $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
        }
    }

    public function clearWarnings(){
        $this->txtShortDescription->Warning = '';
        $this->txtLongDescription->Warning = '';
        $this->lstCategory->Warning = '';
        $this->lstManufacturer->Warning = '';
        $this->lblWarning->Text ='';
        foreach($this->arrCustomFields as $field){
            $field['input']->Warning = '';
        }

    }
}
?>
