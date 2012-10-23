<?php
// Include the classfile for InventoryEditPanel

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

	// Inputs for can be Edited
	// public $txtLongDescription;

	public $arrInventoryToEdit = array();
//	public $arrFields = array();
//
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

	// Create the Category Input
	protected function lstCategory_Create() {
		$this->lstCategory = new QListBox($this);
		$this->lstCategory->Name = QApplication::Translate('Category');
		$this->lstCategory->AddItem('- Select One -', null);
		$objCategoryArray = Category::LoadAllWithFlags(false, true, 'short_description');
		if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
			$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
			$this->lstCategory->AddItem($objListItem);
		}
		$this->lstCategory->strControlId = 'category';
	}

	public function chkCategory_Create(){
		$this->chkCategory = new QCheckBox($this);
		$this->chkCategory->Name = 'category';
		$this->chkCategory->strControlId = 'chk_category';
		$this->chkCategory->Checked = false;
		$this->chkCategory->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}
	// Create and Setup lstManufacturer
	protected function lstManufacturer_Create() {
		$this->lstManufacturer = new QListBox($this);
		$this->lstManufacturer->Name = QApplication::Translate('Manufacturer');
		$this->lstManufacturer->Required = true;
		$this->lstManufacturer->AddItem('- Select One -', null);
		$objManufacturerArray = Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription)));
		if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
			$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
			$this->lstManufacturer->AddItem($objListItem);
		}
		$this->lstManufacturer->strControlId = 'manufacturer';
	}

	public function chkManufacturer_Create(){
		$this->chkManufacturer = new QCheckBox($this);
		$this->chkManufacturer->Name = 'manufacturer';
		$this->chkManufacturer->strControlId = 'chk_manufacturer';
		$this->chkManufacturer->Checked = false;
		$this->chkManufacturer->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

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