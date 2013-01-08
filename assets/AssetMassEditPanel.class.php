<?php
// Include the classfile for InventoryEditPanel

class AssetMassEditPanel extends QPanel {

	/**
	 * @var  QCheckBox $chkModel
	 * @var  QCheckBox $chkLongDescription
	 * @var  QCheckBox $chkShortDescription
	 *
	 * @var QTextBox $txtLongDescription
	 * @var QTextBox $txtShortDescription
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

	public $chkModel;

	public $txtShortDescription;
	public $txtLongDescription;
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
		$this->chkModel_Create();

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
		$this->txtShortDescription->Enabled = false;
		$this->txtLongDescription->Enabled = false;

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

	public function chkModel_Create(){
		$this->chkModel = new QCheckBox($this);
		$this->chkModel->Name = 'model';
		$this->chkModel->strControlId = 'chkModel';
		$this->chkModel->Checked = false;
		$this->chkModel->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

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