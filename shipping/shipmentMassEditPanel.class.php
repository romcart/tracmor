<?php
/**
 *Company (Sender)[1], Company (Recipient)[1], Shipping Courier, Note, Ship Date
 */
class ShipmentMassEditPanel extends QPanel {

	/**
	 * @var  QCheckBox      $chkFromCompany
	 * @var  QCheckBox      $chkToCompany
	 * @var  QCheckBox      $chkCourier
	 * @var  QCheckBox      $chkNote
	 * @var  QCheckBox      $chkShipDate
	 *
	 * @var QTextBox        $txtNote
	 * @var QDateTimePicker $txtShipDate
	 * @var QListBox        $lstCourier
	 * @var QListBox        $lstFromCompany
	 * @var QListBox        $lstFromContact
	 * @var QListBox        $lstToCompany
	 * @var QListBox        $lstToContact
	 */

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../shipping/shipmentMassEditPanel.tpl.php';

	// Inputs for can be Edited
	// public $txtLongDescription;
    protected $objCompanyArray;

	public $arrShipmentToEdit = array();
    public $arrCheckboxes = array();
    public $arrCustomFields;
//	public $arrFields = array();
//
	public $chkFromCompany;
	public $chkToCompany;
	public $chkCourier;
	public $chkNote;
	public $chkShipDate;

	public $lstFromCompany;
	public $lstFromContact;
	public $lstFromAddress;
	public $lstToCompany;
	public $lstToContact;
	public $lstToAddress;
	public $lstCourier;
	public $calShipDate;
	public $txtNote;

	public $btnApply;
	public $btnCancel;
	public $lblWarning;

	public function __construct($objParentObject, $strClosePanelMethod , $arrayShipmentId) {

		try {
			parent::__construct($objParentObject);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));

		$this->arrShipmentToEdit = $arrayShipmentId;

		$this->chkShipDate_Create();
		$this->chkCourier_Create();
		$this->chkToCompany_Create();
		$this->chkFromCompany_Create();
		$this->chkNote_Create();

		$this->calShipDate_Create();
		$this->lstCourier_Create();
		$this->lstToCompany_Create();
		$this->lstToContact_Create();
		$this->lstToAddress_Create();
		$this->lstFromCompany_Create();
		$this->lstFromContact_Create();
		$this->lstFromAddress_Create();
		$this->txtNote_Create();

		$this->btnApply_Create();
		$this->btnCancel_Create();

		// Disable inputs
		$this->calShipDate->Enabled = false;
		$this->lstToCompany->Enabled = false;
		$this->lstToContact->Enabled = false;
		$this->lstToAddress->Enabled = false;
		$this->lstFromCompany->Enabled = false;
		$this->lstFromAddress->Enabled = false;
		$this->lstFromContact->Enabled = false;
		$this->lstCourier->Enabled = false;
		$this->txtNote->Enabled = false;

        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Shipment, false);
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

	// Create the Note Input
	protected function txtNote_Create() {
		$this->txtNote = new QTextBox($this, 'Note');
		$this->txtNote->Name = QApplication::Translate('Note');
		$this->txtNote->TextMode = QTextMode::MultiLine;
		$this->txtNote->Height=80;
	}

	public function chkNote_Create(){
		$this->chkNote = new QCheckBox($this,'chkNote');
		$this->chkNote->Name = 'note';
		$this->chkNote->Checked = false;
		$this->chkNote->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	// Create the Courier Input
	protected function lstCourier_Create() {
		$this->lstCourier = new QListBox($this,'Courier');
		$this->lstCourier->Name = QApplication::Translate('Courier');
		$this->lstCourier->Required = true;
		$this->lstCourier->AddItem('- Select One -', null);
		$objCourierArray = Courier::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Courier()->ShortDescription)));
		if ($objCourierArray) foreach ($objCourierArray as $objCourier) {
			if ($objCourier->ActiveFlag) {
				$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
				$this->lstCourier->AddItem($objListItem);
			}
		}
		$this->lstCourier->AddItem('Other', null);
	}

	public function chkCourier_Create(){
		$this->chkCourier = new QCheckBox($this,'chkCourier');
		$this->chkCourier->Name = 'courier';
		$this->chkCourier->Checked = false;
		$this->chkCourier->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

	// Create and Setup lstFromCompany
	protected function lstFromCompany_Create() {
		$this->lstFromCompany = new QListBox($this,'FromCompany');
		$this->lstFromCompany->Name = QApplication::Translate('From Company');
		$this->lstFromCompany->AddItem('- Select One -', null);
		if ($this->objCompanyArray) foreach ($this->objCompanyArray as $objToCompany) {
			$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
			$this->lstFromCompany->AddItem($objListItem);
		}
	}

	public function chkFromCompany_Create(){
		$this->chkFromCompany = new QCheckBox($this,'chkFromCompany');
		$this->chkFromCompany->Name = 'from_company';
		$this->chkFromCompany->Checked = false;
		$this->chkFromCompany->AddAction(new QClickEvent(),
			                             new QJavaScriptAction("enableInput(this,['from_contact','from_address'])"));

	}

	// Create and Setup txtLongDescription
	protected function lstToCompany_Create() {
		$this->lstToCompany = new QListBox($this,'ToCompany');
		$this->lstToCompany->Name = QApplication::Translate('To Company');
		$this->lstToCompany->AddItem('- Select One -', null);
		if ($this->objCompanyArray) foreach ($this->objCompanyArray as $objToCompany) {
			$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
			$this->lstToCompany->AddItem($objListItem);
		}
	}

	public function chkToCompany_Create(){
		$this->chkToCompany = new QCheckBox($this,'chkToCompany');
		$this->chkToCompany->Name = 'to_company';
		$this->chkToCompany->Checked = false;
		$this->chkToCompany->AddAction(new QClickEvent(),
			                           new QJavaScriptAction("enableInput(this,['to_contact','to_address'])"));
	}

	// To Contact, To Address inputs
	public function lstToContact_Create(){
		$this->lstToContact = new QListBox($this);
		$this->lstToContact->Name = 'To Contact';
		$this->lstToContact->strControlId = 'to_contact';
	}

	public function lstToAddress_Create(){
		$this->lstToAddress = new QListBox($this);
		$this->lstToAddress->Name = 'To Address';
		$this->lstToAddress->strControlId = 'to_address';
	}
	// From Contact, To Address inputs
	public function lstFromContact_Create(){
		$this->lstFromContact = new QListBox($this);
		$this->lstFromContact->Name = 'From Contact';
		$this->lstFromContact->strControlId = 'from_contact';
	}

	public function lstFromAddress_Create(){
		$this->lstFromAddress = new QListBox($this);
		$this->lstFromAddress->Name = 'From Address';
		$this->lstFromAddress->strControlId = 'from_address';
	}

	// Shipment Date Inputs
	public function calShipDate_Create(){
		$this->calShipDate = new QDateTimePickerExt($this);
		$this->calShipDate->Name = QApplication::Translate('Ship Date');
		$this->calShipDate->DateTimePickerType = QDateTimePickerType::Date;
		$this->calShipDate->DateTime = new QDateTime(QDateTime::Now);
		$dttNow = new QDateTime(QDateTime::Now);
//		$intDayOfWeek = date('w', time());
//		// Sunday - just add five days
//		if ($intDayOfWeek == 0) {
//			$dttFiveDaysFromNow = QDateTime::FromTimestamp($dttNow->Timestamp + 432000);
//		}// Monday - Friday, add seven days
//		elseif ($intDayOfWeek > 0 && $intDayOfWeek < 6) {
//			$dttFiveDaysFromNow = QDateTime::FromTimestamp($dttNow->Timestamp + 604800);
//		}
//		// Saturday - add six days
//		elseif ($intDayOfWeek == 6) {
//			$dttFiveDaysFromNow = QDateTime::FromTimestamp($dttNow->Timestamp + 518400);
//		$this->calShipDate->MaximumYear = $dttFiveDaysFromNow->Year;
//		$this->calShipDate->MaximumMonth = $dttFiveDaysFromNow->Month;
//		$this->calShipDate->MaximumDay = $dttFiveDaysFromNow->Day;
//		$this->chkShipDate->strControlId = 'ship_date';
//		$this->calShipDate->AddAction(new QChangeEvent(), new QAjaxAction('calShipDate_Select'));
//	    }
		$this->calShipDate->MaximumYear = $dttNow->Year + 30;
		$this->calShipDate->strControlId = 'ship_date';
	}
	//
	public function chkShipDate_Create(){
		$this->chkShipDate = new QCheckBox($this);
		$this->chkShipDate->Name = 'ship_date';
		$this->chkShipDate->strControlId = 'chk_ship_date';
		$this->chkShipDate->Checked = false;
		$this->chkShipDate->AddAction(new QClickEvent(), new QJavaScriptAction('enableCalInput(this)'));
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

	public function lstToCompany_Select(){

	}

	public function lstFromCompany_Select(){

	}
}
?>