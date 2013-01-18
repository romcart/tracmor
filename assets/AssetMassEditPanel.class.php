<?php
// Include the classfile for InventoryEditPanel

class AssetMassEditPanel extends QPanel {

	/**
	 * @var  QCheckBox $chkModel
	 * @var  QCheckBox $chkChkLockToParent
	 * @var  QCheckBox $chkParentAssetCode
	 *
	 * @var QCheckBox $chkLockToParent
	 * @var QTextBox $txtParentAssetCode
	 * @var QListBox $lstModel
	 */

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../assets/AssetMassEditPanel.tpl.php';

	// Inputs for can be Edited
	// public $txtLongDescription;

	public $arrAssetToEdit = array();
//	public $arrFields = array();
//
    public $arrCustomFields;
    public $arrCheckboxes = array();
    public $arrCustomFieldsToEdit = array();
	public $chkModel;
	public $chkParentAssetCode;
	public $chkChkLockToParent;
    public $txtParentAssetCode;
    public $lblIconParentAssetCode;
    public $ctlAssetSearchTool;
    public $chkLockToParent;
	public $lstModel;
	public $btnApply;
	public $btnCancel;
	public $lblWarning;

	public function __construct($objParentObject, $strClosePanelMethod , $arrayAssetId) {

		try {
			parent::__construct($objParentObject);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->arrAssetToEdit = $arrayAssetId;

		$this->lstModel_Create();
        $this->txtParentAssetCode_Create();
        $this->chkLockToParent_Create();
        $this->lblIconParentAssetCode_Create();
		$this->chkModel_Create();
        $this->chkChkLockToParent_Create();
        $this->chkParentAssetCode_Create();

        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Asset, false);
        if($objCustomFieldArray){
            $this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);

            foreach($this->arrCustomFields as $field){
                $field['input']->Enabled = false;
                $this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
                $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
                $this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
            }
        }

		$this->btnApply_Create();
		$this->btnCancel_Create();

		// Disable inputs
		$this->lstModel->Enabled = false;
	}

	// Create the Model Input
	protected function lstModel_Create() {
		$this->lstModel = new QListBox($this,'Model');
		$this->lstModel->Name = 'Model';
		$this->lstModel->AddItem('- Select One -', null);
		$assetModelArray = AssetModel::LoadAllIntoArray();
		if ($assetModelArray) foreach ($assetModelArray as $assetModel) {
			$objListItem = new QListItem($assetModel['short_description'], $assetModel['asset_model_id']);
			$this->lstModel->AddItem($objListItem);
		}
	}

    // Create the Asset Tag text input
    protected function txtParentAssetCode_Create() {
        $this->txtParentAssetCode = new QTextBox($this, 'ParentAssetCode');
        $this->txtParentAssetCode->Name = 'Parent Asset';
        $this->txtParentAssetCode->Width = '230';
        $this->txtParentAssetCode->Required = false;
        $this->txtParentAssetCode->CausesValidation = true;
        $this->txtParentAssetCode->Enabled = false;
    }

    // Create the Lock to Parent checkbox
    protected function chkLockToParent_Create() {
        $this->chkLockToParent = new QCheckBox($this,'ChkLockToParent');
        $this->chkLockToParent->Name = 'Lock to parent';
        $this->chkLockToParent->Text = 'Lock to parent';
        $this->chkLockToParent->CausesValidation = true;
        $this->chkLockToParent->Enabled = false;
    }

	public function chkModel_Create(){
		$this->chkModel = new QCheckBox($this);
		$this->chkModel->Name = 'model';
		$this->chkModel->strControlId = 'chkModel';
		$this->chkModel->Checked = false;
		$this->chkModel->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

    // Create the clickable label
    protected function lblIconParentAssetCode_Create() {
        $this->lblIconParentAssetCode = new QLabel($this);
        $this->lblIconParentAssetCode->HtmlEntities = false;
        $this->lblIconParentAssetCode->Text = '<img src="../images/icons/lookup.png" border="0" style="cursor:pointer;">';
        $this->lblIconParentAssetCode->AddAction(new QClickEvent(), new QAjaxAction('lblIconParentAssetCode_Click'));
        $this->lblIconParentAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('lblIconParentAssetCode_Click'));
        $this->lblIconParentAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    }

    // Create checkbox to Parent Asset Code text input
    protected function chkParentAssetCode_Create() {
        $this->chkParentAssetCode = new QCheckBox($this);
        $this->chkParentAssetCode->Name = 'chkParentAssetCode';
        $this->chkParentAssetCode->strControlId = 'chkParentAssetCode';
        $this->chkParentAssetCode->Checked = false;
        $this->chkParentAssetCode->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

    }

    // Create the Lock to Parent checkbox
    protected function chkChkLockToParent_Create() {
        $this->chkChkLockToParent = new QCheckBox($this);
        $this->chkChkLockToParent->Name = 'chkChkLockToParent';
        $this->chkChkLockToParent->strControlId = 'chkChkLockToParent';
        $this->chkChkLockToParent->Checked = false;
        $this->chkChkLockToParent->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

    }

	public function btnApply_Create(){

		$this->btnApply = new QButton($this);
		$this->btnApply->Name = 'Apply';
		$this->btnApply->Text = 'Apply';
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
        if(count($this->arrCustomFields)>0)
        {
            $customFieldIdArray = array();

            foreach ($this->arrCustomFields as $field){
                if($this->arrCheckboxes[$field['input']->strControlId]->Checked){
                    $this->arrCustomFieldsToEdit[] = $field;
                    $customFieldIdArray[] = (int)(str_replace('cf','',$field['input']->strControlId));
                }
            }

            if (count($this->arrCustomFieldsToEdit)>0) {
                // preparing data to edit
                // Save the values from all of the custom field controls to save the asset
                foreach($this->arrAssetToEdit as $intAssetId){
                    $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Asset, false);
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
                        $intAssetId,
                        EntityQtype::Asset);
                }
                $this->arrCustomFieldsToEdit = array();
            }
        }
        // Apply checked main_table fields
        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));

        // Edit TransAction
        // Apdate main table
        $strQuery = sprintf("UPDATE `asset`
				                 SET ". implode(",",$set). "
				                 WHERE `asset_id` IN (%s)",
            implode(",", $this->arrAssetToEdit));

        $objDatabase = QApplication::$Database[1];
        $objDatabase->NonQuery($strQuery);

		$this->ParentControl->HideDialogBox();
	}


	// Cancel Button Click Action
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		//$this->ParentControl->RemoveChildControls(true);
		//$this->CloseSelf(true);
		$this->ParentControl->HideDialogBox();
	}
}
?>