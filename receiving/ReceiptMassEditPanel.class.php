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
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Receipt, false);
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
        $objFromAddressArray = Address::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
        if (is_array($objFromAddressArray) && count($objFromAddressArray)>0)
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
        $this->calDateDue->strControlId = 'DateDue';
    }
    //
    public function chkDateDue_Create(){
        $this->chkDateDue = new QCheckBox($this,'chkDateDue');
        $this->chkDateDue->Name = 'DateDue';
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
        $this->calDateReceived->strControlId = 'DateReceived';
    }
    public function chkDateReceived_Create(){
        $this->chkDateReceived = new QCheckBox($this,'chkDateReceived');
        $this->chkDateReceived->Name = 'date_received';
        $this->chkDateReceived->Checked = false;
        $this->chkDateReceived->AddAction(new QClickEvent(), new QJavaScriptAction('enableCalInput(this)'));
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
        $this->lblWarning->CssClass = 'warning';
        $this->lblWarning->Text = '';
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
            // preparing data to edit
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
        if($this->chkToCompany->Checked)
        {
            if($this->lstToContact->SelectedValue){
                $set[] = sprintf('`to_contact_id`="%s"' , $this->lstToContact->SelectedValue);
            }
            else{
                $this->lstToContact->Warning = 'Contact name must be chosen';
                $blnError = true;
            }
            if($this->lstToAddress->SelectedValue){
                $set[] = sprintf('`to_address_id`="%s"' , $this->lstToAddress->SelectedValue);
            }
            else{
                $this->lstToAddress->Warning = 'Address name must be chosen';
                $blnError = true;
            }
        }
        if($this->chkFromCompany->Checked)
        {
            if($this->lstFromCompany->SelectedValue){
                $set[] = sprintf('`from_company_id`="%s"' , $this->lstFromCompany->SelectedValue);
            }
            else{
                $this->lstFromCompany->Warning = 'Company name must be chosen';
                $blnError = true;
            }
            if($this->lstFromContact->SelectedValue){
                $set[] = sprintf('`from_contact_id`="%s"' , $this->lstFromContact->SelectedValue);
            }
            else{
                $this->lstFromContact->Warning = 'Contact name must be chosen';
                $blnError = true;
            }
        }

        if($this->chkDateReceived->Checked && $this->calDateReceived->DateTime)
        {   // Check all receipts are completed
            if(Receipt::QueryCount(QQ::AndCondition(QQ::Equal(QQN::Receipt()->ReceivedFlag, 0),
                                   QQ::In(QQN::Receipt()->ReceiptId,$this->arrReceiptToEdit)))>0)
            {
                $this->calDateReceived->Warning = 'Can be set only for completed receipts';
                $blnError = true;
            }
            else{
                $set[] = sprintf('`receipt_date`="%s"' , $this->calDateReceived->DateTime->__toString('YYYY-MM-DD'));
            }
        }
        if($this->chkDateDue->Checked && $this->calDateDue->DateTime){
            $set[] = sprintf('`due_date`="%s"' ,$this->calDateDue->DateTime->__toString('YYYY-MM-DD'));
        }

        if(!$blnError){
            try{
                // Modifying transactions
                foreach($this->arrReceiptToEdit as $intReceiptId){
                    $objTransaction = Transaction::Load(Receipt::Load($intReceiptId)->Transaction->TransactionId);
                    $objTransaction->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
                    if($this->chkNote->Checked){
                        $objTransaction->Note = $this->txtNote->Text;
                    }
                    $objTransaction->Save();
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
                // Update Transaction
                // Update main table
                $strQuery = sprintf("UPDATE `receipt`
                                     SET ". implode(",",$set). "
                                     WHERE `receipt_id` IN (%s)",
                    implode(",", $this->arrReceiptToEdit));

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

        $this->chkNote->Checked = false;
        $this->chkDateReceived->Checked = false;
        $this->chkToCompany->Checked = false;
        $this->chkDateDue->Checked = false;
        $this->chkFromCompany->Checked = false;
        $this->txtNote->Enabled = false;
        foreach($this->arrCustomFields as $field)
        {
            $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
        }
    }

    public function clearWarnings(){
        $this->lblWarning = '';
        $this->calDateReceived->Warning = '';
        $this->calDateDue->Warning = '';
        $this->lstToAddress->Warning = '';
        $this->lstToContact->Warning = '';
        $this->lstFromCompany->Warning = '';
        $this->lstFromContact->Warning = '';
        if(count($this->arrCustomFields)>0){
            foreach($this->arrCustomFields as $field){
                $field['input']->Warning = '';
            }
        }
    }
}
?>