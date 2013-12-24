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
    protected $objCustomFieldArray;
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
        $this->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Asset, false, null, false, 'all');
        if($this->objCustomFieldArray){
            $this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objCustomFieldArray, false, $this, true, true, false);

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

        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));
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
        if ($this->chkParentAssetCode->Checked && $this->txtParentAssetCode->Text) {
            // Check if the parent asset tag is already a child asset of this asset
            foreach ($this->arrAssetToEdit as $intAssetToEditId){
            $arrChildAsset = Asset::LoadArrayByParentAssetId($intAssetToEditId);
            foreach ($arrChildAsset as $objChildAsset) {
                if ($objChildAsset->AssetCode == $this->txtParentAssetCode->Text) {
                    $blnError = true;
                    $this->txtParentAssetCode->Warning = "Parent asset tag is already a child of this asset. Please try another.";
                    break;
                }
            }
            if (!$blnError) {
                $objAsset = Asset::Load($intAssetToEditId);
                if ($this->txtParentAssetCode->Text != $objAsset->AssetCode) {
                    $objParentAsset = Asset::LoadByAssetCode($this->txtParentAssetCode->Text);
                    if (!$objParentAsset) {
                        $blnError = true;
                        $this->txtParentAssetCode->Warning = "That asset tag does not exist. Please try another.";
                    }
                    else if ($this->chkLockToParent->Checked
                             && !($objAsset->ParentAssetId == $objParentAsset->AssetId
                             && $objAsset->LinkedFlag == 1)
                             && $objParentAsset->LocationId != $objAsset->LocationId) {
                        // If locking child to parent, make sure assets are at the same location
                        $blnError = true;
                        $this->chkLockToParent->Warning = 'Cannot lock to parent asset at another location.';
                    } else if ($this->chkLockToParent->Checked
                               && !($objAsset->ParentAssetId == $objParentAsset->AssetId
                               && $objAsset->LinkedFlag == 1)
                               && ($objParentAsset->CheckedOutFlag
                               || $objParentAsset->ReservedFlag
                               || $objParentAsset->ArchivedFlag
                               || $objParentAsset->LocationId == 2
                               || $objParentAsset->LocationId == 5
                               || AssetTransaction::PendingTransaction($objParentAsset->AssetId))) {
                        $blnError = true;
                        $this->chkLockToParent->Warning = "Parent asset tag (" . $objParentAsset->AssetCode . ") must not be currently Archived, Checked Out, Pending Shipment, Shipped/TBR, or Reserved.";
                    } else if ($this->chkLockToParent->Checked
                              && !($objAsset->ParentAssetId == $objParentAsset->AssetId
                              && $objAsset->LinkedFlag == 1)
                              && ($objAsset->CheckedOutFlag
                              || $objAsset->ReservedFlag
                              || $objAsset->ArchivedFlag
                              || $objAsset->LocationId == 2
                              || $objAsset->LocationId == 5
                              || AssetTransaction::PendingTransaction($objAsset->AssetId))) {
                        $blnError = true;
                        $this->chkLockToParent->Warning .= "Child asset must not be currently Archived, Checked Out, Pending Shipment, Shipped/TBR, or Reserved.";
                    }
                    else {
                        $objAsset->ParentAssetId = $objParentAsset->AssetId;
                        if ($this->chkLockToParent->Checked) {
                            $objAsset->LinkedFlag = 1;
                        } else {
                            $objAsset->LinkedFlag = 0;
                        }
                    }
                }
                else {
                    $blnError = true;
                    $this->txtParentAssetCode->Warning = "Parent asset tag must not be the same as asset tag. Please try another.";
                }
            }
            else {
                // If txtParentAssetCode is empty
                $objAsset->LinkedFlag = false;
                $objAsset->ParentAssetId = null;
                $this->chkLockToParent->Checked = false;
            }
        }
    }

         // Apply checked main_table fields
         if($this->chkModel->Checked){
             if($this->lstModel->SelectedValue !== null){
                 $set[] = sprintf('`asset_model_id`="%s"' , $this->lstModel->SelectedValue);
             }
             else{
                 $blnError = true;
                 $this->lstModel->Warning = 'Model can\'t be empty';
             }
         }
         if($this->chkChkLockToParent->Checked){
             $set[] = sprintf('`linked_flag`=%s', $this->chkLockToParent->Checked?1:"NULL");
         }
         if($this->chkParentAssetCode->Checked){

             $parent_asset = Asset::LoadByAssetCode($this->txtParentAssetCode->Text);
             if($parent_asset instanceof Asset){
                 $parent_asset_id = $parent_asset->AssetId;
             }
             else{
                 $parent_asset_id = "NULL";
                 $set[] = sprintf('`linked_flag`=%s',"NULL");
             }
             $set[] = sprintf('`parent_asset_id`=%s', $parent_asset_id);
         }

        if (!$blnError){
            try{
                if (count($this->arrCustomFieldsToEdit)>0) {
                    // preparing data to edit
                    // Save the values from all of the custom field controls to save the asset
                    foreach($this->arrAssetToEdit as $intAssetId){
                        $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Asset, false, null, false, 'all');
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

                }
                 // Edit TransAction
                 // Apdate main table
                $strQuery = sprintf("UPDATE `asset`
                             SET ". implode(",",$set). " WHERE `asset_id` IN (%s)",
                            implode(",", $this->arrAssetToEdit));
                //print $strQuery; exit;
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
            $this->arrCustomFieldsToEdit = array();
            $this->uncheck();
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
        $this->chkChkLockToParent->Checked = false;
        $this->chkParentAssetCode->Checked = false;
        $this->chkModel->Checked = false;
        foreach($this->arrCustomFields as $field)
        {
            $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
        }
    }

    public function clearWarnings(){
        $this->lblWarning->Text = '';
        $this->chkLockToParent->Warning = '';
        $this->txtParentAssetCode->Warning = '';
        $this->lstModel->Warning = '';
        if(count($this->arrCustomFields)>0){
            foreach($this->arrCustomFields as $field){
                $field['input']->Warning = '';
            }
        }
    }
}
?>