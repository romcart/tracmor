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
	public $chkShortDescription;
	public $chkModel;
	public $chkLongDescription;

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

		$this->txtShortDescription_Create();
		$this->txtLongDescription_Create();
		$this->lstModel_Create();


		$this->chkShortDescription_Create();
		$this->chkModel_Create();
		$this->chkLongDescription_Create();
		$this->btnApply_Create();
		$this->btnCancel_Create();

		// Disable inputs
		$this->lstModel->Enabled = false;
		$this->txtShortDescription->Enabled = false;
		$this->txtLongDescription->Enabled = false;

	}

	// Create the Short Description Input
	protected function txtShortDescription_Create() {
		$this->txtShortDescription = new QTextBox($this);
		$this->txtShortDescription->Name = 'Inventory Model';
		$this->txtShortDescription->strControlId = 'short_description';
	}

	public function chkShortDescription_Create(){
		$this->chkShortDescription = new QCheckBox($this);
		$this->chkShortDescription->Name = 'short_description';
		$this->chkShortDescription->strControlId = 'chk_short_description';
		$this->chkShortDescription->Checked = false;
		$this->chkShortDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	// Create the Model Input
	protected function lstModel_Create() {
		$this->lstModel = new QListBox($this);
		$this->lstModel->Name = 'Model';
		$this->lstModel->AddItem('- Select One -', null);
		$assetModelArray = AssetModel::LoadAllIntoArray();
		if ($assetModelArray) foreach ($assetModelArray as $assetModel) {
			$objListItem = new QListItem($assetModel['short_description'], $assetModel['asset_model_id']);
			$this->lstModel->AddItem($objListItem);
		}
		$this->lstModel->strControlId = 'model';
	}

	public function chkModel_Create(){
		$this->chkModel = new QCheckBox($this);
		$this->chkModel->Name = 'model';
		$this->chkModel->strControlId = 'chk_model';
		$this->chkModel->Checked = false;
		$this->chkModel->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

	// Create and Setup txtLongDescription
	protected function txtLongDescription_Create() {
		$this->txtLongDescription = new QTextBox($this);
		$this->txtLongDescription->Name = QApplication::Translate('Long Description');
		$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		$this->txtLongDescription->strControlId = 'long_description';
	}

	public function chkLongDescription_Create(){
		$this->chkLongDescription = new QCheckBox($this);
		$this->chkLongDescription->Name = 'long_description';
		$this->chkLongDescription->strControlId = 'chk_long_description';
		$this->chkLongDescription->Checked = false;
		$this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
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