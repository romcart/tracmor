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
require(__PANELBASE_CLASSES__ . '/ContactEditPanelBase.class.php');

class ContactMassEditPanel extends ContactEditPanelBase {

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
        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(8, false);
        if($objCustomFieldArray){
            $this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);

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
        $this->lstCompany_Create();
        $this->strOverflow = QOverflow::Auto;
        $this->btnMassEditApply_Create();
        $this->btnMassEditCancel_Create();
        //$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;
    }

    // Create checkbox for Company
    protected function chkCompany_Create(){
       $this->chkCompany = new QCheckBox($this, 'chkCompany');
        $this->chkCompany->Name = 'company';
        $this->chkCompany->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
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
    }

    protected function lstCompany_Create(){
    $this->lstCompany = new QListBox($this);
    $this->lstCompany->Name = 'Company';
    $this->lstCompany->strControlId = 'Company';
    $this->lstCompany->AddItem('- Select One -', null);
    $objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
    if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
        $objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
        if ((QApplication::$TracmorSettings->CompanyId) && (QApplication::$TracmorSettings->CompanyId == $objCompany->CompanyId))
            $objListItem->Selected = true;
        $this->lstCompany->AddItem($objListItem);
    }
    $this->lstCompany->Enabled = false;
}

    // Save Button Click Actions
    public function btnMassEditApply_Click($strFormId, $strControlId, $strParameter) {

//        $strQuery = sprintf("
//				UPDATE `company`
//				SET `long_description`='%s'
//				WHERE `company_id` IN (%s)
//			", $this->txtLongDescription->Text,
//            implode(",", $this->arrCompaniesToEdit));
//
//        $objDatabase = QApplication::$Database[1];
//        $objDatabase->NonQuery($strQuery);
//
//
//        $this->ParentControl->RemoveChildControls(true);
//        $this->CloseSelf(true);
//        QApplication::Redirect('');
    }

    protected function btnMassEditApply_Create(){
        $this->btnMassEditApply = new QButton($this);
        $this->btnMassEditApply->Text = 'Apply';
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
    }
}
?>