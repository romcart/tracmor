<?php
// Company (Sender)[1], Company (Recipient)[1], Note, Date Due, Date Received
class ReceiptMassEditPanel extends QPanel {

    /**
     * @var  QCheckBox      $chkFromCompany
     * @var  QCheckBox      $chkToCompany
     * @var  QCheckBox      $chkNote
     * @var  QCheckBox      $chkDateDue
     * @var  QCheckBox      $chkDateReceived
     *
     * @var QTextBox        $txtNote
     * @var QDateTimePicker $calDateDue
     * @var QDateTimePicker $calDateReceived
     * @var QListBox        $lstFromCompany
     * @var QListBox        $lstFromContact
     * @var QListBox        $lstToCompany
     * @var QListBox        $lstToContact
     */

    // Specify the Location of the Template (feel free to modify) for this Panel
    protected $strTemplate = '../receiving/ReceiptMassEditPanel.tpl.php';

    // Inputs for can be Edited
    // public $txtLongDescription;
    protected $objCompanyArray;

    public $arrReceiptToEdit = array();
    public $arrCheckboxes = array();
    public $arrCustomFields;
    public $arrCustomFieldsToEdit = array();
//	public $arrFields = array();
//
    public $chkFromCompany;
    public $chkToCompany;
    public $chkNote;
    public $chkDateDue;
    public $chkDateReceived;

    public $lstFromCompany;
    public $lstFromContact;
    public $lstFromAddress;
    public $lstToCompany;
    public $lstToContact;
    public $lstToAddress;
    public $calDateDue;
    public $calDateReceived;
    public $txtNote;

    public $btnApply;
    public $btnCancel;
    public $lblWarning;

    public function __construct($objParentObject, $strClosePanelMethod , $arrayReceiptId) {

        try {
            parent::__construct($objParentObject);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));

        $this->arrReceiptToEdit = $arrayReceiptId;

        $this->chkDateDue_Create();
        $this->chkDateReceived_Create();
        $this->chkToCompany_Create();
        $this->chkFromCompany_Create();
        $this->chkNote_Create();

        $this->calDateDue_Create();
        $this->calDateReceived_Create();
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
        $this->calDateDue->Enabled = false;
        $this->calDateReceived->Enabled = false;
        $this->lstToCompany->Enabled = false;
        $this->lstToContact->Enabled = false;
        $this->lstToAddress->Enabled = false;
        $this->lstFromCompany->Enabled = false;
        $this->lstFromAddress->Enabled = false;
        $this->lstFromContact->Enabled = false;
        $this->txtNote->Enabled = false;

        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(11, false);
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

    // Create and Setup lstFromCompany
    protected function lstFromCompany_Create() {
        $this->lstFromCompany = new QListBox($this,'FromCompany');
        $this->lstFromCompany->Name = QApplication::Translate('From Company');
        $this->lstFromCompany->AddItem('- Select One -', null);
        if ($this->objCompanyArray) foreach ($this->objCompanyArray as $objToCompany) {
            $objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
            $this->lstFromCompany->AddItem($objListItem);
        }
        $this->lstFromCompany->AddAction(new QChangeEvent, new QAjaxAction('lstFromCompany_Select'));
    }

    public function chkFromCompany_Create(){
        $this->chkFromCompany = new QCheckBox($this,'chkFromCompany');
        $this->chkFromCompany->Name = 'from_company';
        $this->chkFromCompany->Checked = false;
        $this->chkFromCompany->AddAction(new QClickEvent(),
            new QJavaScriptAction("enableInput(this,['from_contact','from_address'])"));

    }

    // Create and Setup lstToCompany
    protected function lstToCompany_Create() {
        $this->lstToCompany = new QListBox($this,'ToCompany');
        $this->lstToCompany->Name = QApplication::Translate('To Company');
        $this->lstToCompany->AddItem('- Select One -', null);
        if ($this->objCompanyArray) foreach ($this->objCompanyArray as $objToCompany) {
            $objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
            $this->lstToCompany->AddItem($objListItem);
        }
        $this->lstToCompany->AddAction(new QChangeEvent, new QAjaxAction('lstToCompany_Select'));
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
        $this->lstToContact = new QListBox($this,'ToContact');
        $this->lstToContact->Name = 'To Contact';
    }

    public function lstToAddress_Create(){
        $this->lstToAddress = new QListBox($this,'ToAddress');
        $this->lstToAddress->Name = 'To Address';
        $objToAddressArray = Address::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
        if (is_array($objToAddressArray) && count($objToAddressArray)>0)
        {
            foreach ($objToAddressArray as $objToAddress)
            {
                $objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
                $this->lstToAddress->AddItem($objListItem);
            }
        }
    }
    // From Contact, To Address inputs
    public function lstFromContact_Create(){
        $this->lstFromContact = new QListBox($this,'FromContact');
        $this->lstFromContact->Name = 'From Contact';
    }

    public function lstFromAddress_Create(){
        $this->lstFromAddress = new QListBox($this,'FromAddress');
        $this->lstFromAddress->Name = 'From Address';
        $intCompanyId = QApplication::$TracmorSettings->CompanyId;
        $objFromAddressArray = Address::LoadArrayByCompanyId($intCompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
        if ($objFromAddressArray)
        {
            foreach ($objFromAddressArray as $objFromAddress)
            {
                $objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
                $this->lstFromAddress->AddItem($objListItem);
            }
        }
    }

    // Date Due Inputs
    public function calDateDue_Create(){
        $this->calDateDue = new QDateTimePickerExt($this);
        $this->calDateDue->Name = QApplication::Translate('Date Due');
        $this->calDateDue->DateTimePickerType = QDateTimePickerType::Date;
        $this->calDateDue->DateTime = new QDateTime(QDateTime::Now);
        $dttNow = new QDateTime(QDateTime::Now);
        $this->calDateDue->MaximumYear = $dttNow->Year + 30;
        $this->calDateDue->strControlId = 'date_due';
    }
    //
    public function chkDateDue_Create(){
        $this->chkDateDue = new QCheckBox($this);
        $this->chkDateDue->Name = 'date_due';
        $this->chkDateDue->strControlId = 'chk_date_due';
        $this->chkDateDue->Checked = false;
        $this->chkDateDue->AddAction(new QClickEvent(), new QJavaScriptAction('enableCalInput(this)'));
    }
    // Date Received Inputs
    public function calDateReceived_Create(){
        $this->calDateReceived = new QDateTimePickerExt($this);
        $this->calDateReceived->Name = QApplication::Translate('Date Received');
        $this->calDateReceived->DateTimePickerType = QDateTimePickerType::Date;
        $this->calDateReceived->DateTime = new QDateTime(QDateTime::Now);
        $dttNow = new QDateTime(QDateTime::Now);
        $this->calDateReceived->MaximumYear = $dttNow->Year + 30;
        $this->calDateReceived->strControlId = 'date_received';
    }
    public function chkDateReceived_Create(){
        $this->chkDateReceived = new QCheckBox($this);
        $this->chkDateReceived->Name = 'date_received';
        $this->chkDateReceived->strControlId = 'chk_date_received';
        $this->chkDateReceived->Checked = false;
        $this->chkDateReceived->AddAction(new QClickEvent(), new QJavaScriptAction('enableCalInput(this)'));
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
            // preparing data to edit
            foreach ($this->arrCustomFields as $field){
                if($this->arrCheckboxes[$field['input']->strControlId]->Checked){
                    $this->arrCustomFieldsToEdit[] = $field;
                    $customFieldIdArray[] = (int)(str_replace('cf','',$field['input']->strControlId));
                }
            }

            if (count($this->arrCustomFieldsToEdit)>0) {
                // Save the values from all of the custom field controls to save the asset
                foreach($this->arrReceiptToEdit as $intReceiptId){
                    $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Receipt, false);
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
                        $intReceiptId,
                        EntityQtype::Receipt);
                }
                $this->arrCustomFieldsToEdit = array();
            }
        }
        // Apply checked main_table fields
        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));

        // Edit TransAction
        // Apdate main table
        $strQuery = sprintf("UPDATE `receipt`
				                 SET ". implode(",",$set). "
				                 WHERE `receipt_id` IN (%s)",
            implode(",", $this->arrReceiptToEdit));

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