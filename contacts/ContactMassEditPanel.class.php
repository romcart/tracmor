<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
// Include the classfile for ContactEditPanelBase
require('ContactEditPanel.class.php');

class ContactMassEditPanel extends ContactEditPanel {

   // Specify the Location of the Template (feel free to modify) for this Panel
   protected $strTemplate = '../contacts/ContactMassEditPanel.tpl.php';
   // An array of custom fields

   // Primary Address inputs for new company

    public $chkCompany;
    public $lstCompany;
    public $chkDescription;
    public $txtDescription;
    public $btnMassEditApply;
    public $btnMassEditCancel;
    public $arrCustomFieldsToEdit = array();
    public $arrCustomFields;
    public $arrCheckboxes;

    public $arrContactToEdit = array();

    public function __construct($objParentObject, $strClosePanelMethod, $arrayContactId) {

        try {
            parent::__construct($objParentObject, $strClosePanelMethod);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->lstAddress->Enabled = false;
        $this->lstCompany->Enabled = false;

        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Contact, false);
        if($objCustomFieldArray){
            //$this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);

            foreach($this->arrCustomFields as $field){
                $field['input']->Enabled = false;
                $this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
                $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
                $this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
            }
        }

        $this->arrContactToEdit = $arrayContactId;
        $this->chkCompany_Create();
        $this->chkDescription_Create();
        $this->txtDescription_Create();
        $this->strOverflow = QOverflow::Auto;
        $this->btnMassEditApply_Create();
        $this->btnMassEditCancel_Create();
        //$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;
    }

    // Create checkbox for Company
    protected function chkCompany_Create(){
       $this->chkCompany = new QCheckBox($this, 'chkCompany');
        $this->chkCompany->Name = 'company';
        $this->chkCompany->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this,['Address'])"));
    }

    // Create checkbox for Description
    protected function chkDescription_Create(){
        $this->chkDescription = new QCheckBox($this,'chkDescription');
        $this->chkDescription->Name = 'description';
        $this->chkDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
    }

    // Create and Setup txtShortDescription
    protected function txtDescription_Create() {
        $this->txtDescription = new QTextBox($this);
        $this->txtDescription->Name = 'Description';
        $this->txtDescription->strControlId = 'Description';
        $this->txtDescription->Warning = '';
        $this->txtDescription->Enabled = false;
        $this->txtDescription->TextMode = QTextMode::MultiLine;
    }

    // Save Button Click Actions
    public function btnMassEditApply_Click($strFormId, $strControlId, $strParameter) {
        $this->clearWarnings();
        $blnError = false;
        // Get an instance of the database
        $objDatabase = QApplication::$Database[1];
        // Begin a MySQL Transaction to be either committed or rolled back
        $objDatabase->TransactionBegin();
        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));
        if($this->chkDescription->Checked)
        {
            $set[] = sprintf('`description` ="%s"', $this->txtDescription->Text);
        }

        if($this->chkCompany->Checked)
        {
            if($this->lstCompany->SelectedValue !== null
               && $this->lstAddress->SelectedValue !== null){
                $set[] = sprintf('`company_id` = %s' , $this->lstCompany->SelectedValue);
                $set[] = sprintf('`address_id` = %s' , $this->lstAddress->SelectedValue);
            }
            else{
                $blnError = true;
                $this->lstCompany->Warning=($this->lstCompany->SelectedValue == null)?'Company can\'t be empty':'';
                $this->lstAddress->Warning=($this->lstAddress->SelectedValue == null)?'Address can\'t be empty':'';
            }
        }

        $strQuery = sprintf("UPDATE `contact`
				             SET ". implode(",",$set). "
				             WHERE `contact_id` IN (%s)",
                             implode(",", $this->arrContactToEdit));
        // Custom Fields handling
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

        // Transaction
        if(!$blnError)
        {
            try{
                if (count($this->arrCustomFieldsToEdit)>0) {
                    // preparing data to edit
                    foreach($this->arrContactToEdit as $intContactId){
                        $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::Contact, false);
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
                            $intContactId,
                            EntityQtype::Contact);
                    }
                }
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

    protected function btnMassEditApply_Create(){
        $this->btnMassEditApply = new QButton($this);
        $this->btnMassEditApply->Text = 'Apply';
        $this->btnMassEditApply
             ->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to edit these items?'));
        $this->btnMassEditApply->AddAction(new QClickEvent(),new QAjaxAction('btnMassEditApply_Click'));
        $this->btnMassEditApply->AddAction(new QEnterKeyEvent(),new QAjaxAction('btnMassEditApply_Click'));
        $this->btnMassEditApply->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    }

    protected function btnMassEditCancel_Create(){
        $this->btnMassEditCancel = new QButton($this);
        $this->btnMassEditCancel->Text = 'Cancel';
        $this->btnMassEditCancel->AddAction(new QClickEvent(), new QAjaxAction('btnMassEditCancel_Click'));
        $this->btnMassEditCancel->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassEditCancel_Click'));
        $this->btnMassEditCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    }

    // Cancel Button Click Action
    public function btnMassEditCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->ParentControl->HideDialogBox();
        QApplication::Redirect('');
    }

    public function uncheck(){
        $this->chkCompany->Checked = false;
        $this->chkDescription->Checked = false;
        foreach($this->arrCustomFields as $field)
        {
            $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
        }
    }

    public function clearWarnings(){
        $this->lstCompany->Warning = '';
        $this->txtDescription->Warning = '';
        $this->lstAddress->Warning = '';

        foreach($this->arrCustomFields as $field){
            $field['input']->Warning = '';
        }

    }
}
?>