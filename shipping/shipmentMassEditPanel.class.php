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
    protected $objCustomFieldArray;
	public $arrShipmentToEdit = array();
    public $arrCheckboxes = array();
    public $arrCustomFields;
    public $arrCustomFieldsToEdit = array();

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
        $this->lblWarning_Create();

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
        $this->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Shipment, false);
        if($this->objCustomFieldArray){
            $this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objCustomFieldArray, false, $this, true, true, false);

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
        $this->lstFromCompany->AddAction(new QChangeEvent, new QAjaxAction('lstFromCompany_Select'));
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
		$this->lstToContact = new QListBox($this);
		$this->lstToContact->Name = 'To Contact';
		$this->lstToContact->strControlId = 'to_contact';
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
		$this->lstFromContact = new QListBox($this);
		$this->lstFromContact->Name = 'From Contact';
		$this->lstFromContact->strControlId = 'from_contact';
	}

	public function lstFromAddress_Create(){
		$this->lstFromAddress = new QListBox($this, 'FromAddress');
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
		$this->calShipDate->strControlId = 'ShipDate';
	}
	//
	public function chkShipDate_Create(){
		$this->chkShipDate = new QCheckBox($this);
		$this->chkShipDate->Name = 'ship_date';
		$this->chkShipDate->strControlId = 'chkShipDate';
		$this->chkShipDate->Checked = false;
		$this->chkShipDate->AddAction(new QClickEvent(), new QJavaScriptAction('enableCalInput(this)'));
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
        $objDatabase = QApplication::$Database[1];
        // Begin a MySQL Transaction to be either committed or rolled back
        $objDatabase->TransactionBegin();
        // Check "Contact To", "Contact From", "Coutrier" wasn't changed for shipped items
        if(Shipment::QueryCount(QQ::AndCondition(QQ::Equal(QQN::Shipment()->ShippedFlag, 1),
                 QQ::In(QQN::Shipment()->ShipmentId,$this->arrShipmentToEdit)))>0 &&
           ($this->chkToCompany->Checked || $this->chkFromCompany->Checked || $this->chkCourier->Checked))
        {
            $this->lblWarning->Text = '"To Company", "From Company", "Courier" shouldn\'t be changed for already
                                        Shipped items';
            $blnError = true;
        }
        if(!$blnError){
            // Apply checked main_table fields
            $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));

            if($this->chkToCompany->Checked)
            {
                if($this->lstToCompany->SelectedValue){
                    $set[] = sprintf('`to_company_id`="%s"' , $this->lstToCompany->SelectedValue);
                }
                else{
                    $this->lstToCompany->Warning = 'Company name must be chosen';
                    $blnError = true;
                }
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
                    $this->lstToContact->Warning = 'Address name must be chosen';
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
                if($this->lstFromAddress->SelectedValue){
                    $set[] = sprintf('`from_address_id`="%s"' , $this->lstFromAddress->SelectedValue);
                }
                else{
                    $this->lstFromAddress->Warning = 'Address name must be chosen';
                    $blnError = true;
                }
            }
            if($this->chkCourier->Checked){
                $set[] = sprintf('`courier_id`="%s"', $this->lstCourier->SelectedValue);
            }
            if($this->chkShipDate->Checked && $this->calShipDate->DateTime)
            {
                $set[] = sprintf('`ship_date`="%s"' , $this->calShipDate->DateTime->__toString('YYYY-MM-DD'));
            }
        }
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
                    )
                    {
                        $blnError = true;
                        $field['input']->Warning = "Required.";
                    }
                    else
                    {
                        $this->arrCustomFieldsToEdit[] = $field;
                        $customFieldIdArray[] = (int)(str_replace('cf','',$field['input']->strControlId));
                    }
                }
            }
        }
        // Apdate main table
        if(!$blnError){
            try{
                // Edit Transactions
                foreach($this->arrShipmentToEdit as $intShipmetId){
                    $objTransaction = Transaction::Load(Shipment::Load($intShipmetId)->Transaction->TransactionId);
                    $objTransaction->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
                    if($this->chkNote->Checked){
                        $objTransaction->Note = $this->txtNote->Text;
                    }
                    $objTransaction->Save();
                }
                if (count($this->arrCustomFieldsToEdit)>0) {
                    // preparing data to edit
                    // Save the values from all of the custom field controls to save the asset
                    foreach($this->arrShipmentToEdit as $intShipmentId){
                        $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Shipment, false);
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
                            $intShipmentId,
                            EntityQtype::Shipment);
                    }
                }

                $strQuery = sprintf("UPDATE `shipment`
                                     SET ". implode(",",$set). "
                                     WHERE `shipment_id` IN (%s)",
                                     implode(",", $this->arrShipmentToEdit));
                $objDatabase->NonQuery($strQuery);
                $objDatabase->TransactionCommit();
                $this->ParentControl->HideDialogBox();
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

	public function lstToCompany_Select(){

	}

	public function lstFromCompany_Select(){

	}

    public function uncheck(){
        $this->chkNote->Checked = false;
        $this->chkShipDate->Checked = false;
        $this->chkToCompany->Checked = false;
        $this->chkCourier->Checked = false;
        $this->chkFromCompany->Checked = false;
        $this->txtNote->Enabled = false;
        foreach($this->arrCustomFields as $field)
        {
            $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
        }
    }

    public function clearWarnings(){
        $this->lblWarning->Text = '';
        $this->calShipDate->Warning = '';
        $this->lstCourier->Warning = '';
        $this->lstToCompany->Warning = '';
        $this->lstToAddress->Warning = '';
        $this->lstToContact->Warning = '';
        $this->lstFromCompany->Warning = '';
        $this->lstFromContact->Warning = '';
        $this->lstFromAddress->Warning = '';
        if(count($this->arrCustomFields)>0){
            foreach($this->arrCustomFields as $field){
                $field['input']->Warning = '';
            }
        }
    }
}
?>