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
/**
 * @var  QCheckBox $chkImage
 * @var  QCheckBox $chkCategory
 * @var  QCheckBox $chkManufacturer
 * @var  QCheckBox $chkLongDescription
 * @var  QCheckBox $chkImage
 */
?>

<?php
// Include the classfile for AssetModelEditPanelBase
require(__PANELBASE_CLASSES__ . '/AssetModelEditPanelBase.class.php');

/**
 * This is a quick-and-dirty draft panel object to do Create, Edit, and Delete functionality
 * of the AssetModel class.  It extends from the code-generated
 * abstract AssetModelEditPanelBase class.
 *
 * Any display custimizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * Additional qform control objects can also be defined and used here, as well.
 *
 * @package My Application
 * @subpackage PanelDraftObjects
 *
 */
class ModelMassEditPanel extends AssetModelEditPanelBase {

    // Specify the Location of the Template (feel free to modify) for this Panel
    protected $strTemplate = 'ModelMassEditPanel.tpl.php';
    // Image File Control
    public $ifcImage;
    // An array of custom fields
    public $arrCustomFields;

    public $arrModelsToEdit = array();
    public $arrFields = array();
    public $arrCheckboxes = array();
    public $arrCustomFieldsToEdit = array();
    public $chkShortDescription;
    public $chkCategory;
    public $chkManufacturer;
    public $chkLongDescription;
    public $chkImage;
    public $btnApply;
    public $lblWarning;

    public function __construct($objParentObject, $strClosePanelMethod, $arrayModelId) {

        try {
            parent::__construct($objParentObject, $strClosePanelMethod);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->arrModelsToEdit = $arrayModelId;


        $this->txtShortDescription->Required = false;

        // Create the Image File Control
        $this->ifcImage_Create();
        // Create Asset Custom Fields
        $this->UpdateCustomFields();

        // Create Checkboxes
        $this->chkShortDescription_Create();
        $this->chkCategory_Create();
        $this->chkManufacturer_Create();
        $this->chkLongDescription_Create();
        $this->chkImage_Create();
        $this->btnApply_Create();

        // Load Custom Fields
        $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::AssetModel, false);
        if($objCustomFieldArray){
            $this->arrCustomFields = CustomField::CustomFieldControlsCreate($objCustomFieldArray, false, $this, true, true, false);

            foreach($this->arrCustomFields as $field){
                $this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
                $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
                $this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
            }
        }



        $this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;

        $this->strOverflow = QOverflow::Auto;
        // Modify Code Generated Controls
       // $this->btnSave->RemoveAllActions('onclick');
        $this->btnSave->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnSave_Click'));
    }

    public function setItems($arrayModelId){
        $this->arrModelsToEdit = $arrayModelId;
    }

    // Create and Setup lstCategory with alphabetic ordering
    protected function lstCategory_Create() {
        $this->lstCategory = new QListBox($this);
        $this->lstCategory->Name = QApplication::Translate('Category');
        $this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);
        $objCategoryArray = Category::LoadAllWithFlags(true, false, 'short_description ASC');
        if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
            $objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
            if (($this->objAssetModel->Category) && ($this->objAssetModel->Category->CategoryId == $objCategory->CategoryId))
                $objListItem->Selected = true;
            $this->lstCategory->AddItem($objListItem);
        }
    }

    // Create and Setup lstManufacturer with alphabetic ordering
    protected function lstManufacturer_Create() {
        $this->lstManufacturer = new QListBox($this);
        $this->lstManufacturer->Name = QApplication::Translate('Manufacturer');
        $this->lstManufacturer->AddItem(QApplication::Translate('- Select One -'), null);
        $objManufacturerArray = Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription)));
        if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
            $objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
            if (($this->objAssetModel->Manufacturer) && ($this->objAssetModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
                $objListItem->Selected = true;
            $this->lstManufacturer->AddItem($objListItem);
        }
    }

    // Create the Image File Control
    protected function ifcImage_Create() {
        $this->ifcImage = new QImageFileControl($this,'Image');
        $this->ifcImage->UploadPath = "../images/asset_models/";
        $this->ifcImage->WebPath = "../images/asset_models/";
        $this->ifcImage->ThumbUploadPath = "../images/asset_models/thumbs/";
        $this->ifcImage->ThumbWebPath = "../images/asset_models/thumbs/";
        // $this->ifcImage->FileName = $this->objAssetModel->ImagePath;
        $this->ifcImage->Name = 'Upload Picture';
        $this->ifcImage->BuildThumbs = true;
        $this->ifcImage->ThumbWidth = 150;
        $this->ifcImage->ThumbHeight = 250;
        $this->ifcImage->Required = false;
        // $this->ifcImage->ThumbPrefix = "thumb_";
        $this->ifcImage->Prefix = QApplication::$TracmorSettings->ImageUploadPrefix;
        $this->ifcImage->Suffix = "_asset_model";
    }

    public function chkShortDescription_Create(){
        $this->chkShortDescription = new QCheckBox($this, 'chk' . $this->txtShortDescription->ControlId );
        $this->chkShortDescription->Name = 'ShortDescription';
        $this->chkShortDescription->Checked = false;
        $this->chkShortDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
    }

    public function chkCategory_Create(){
        $this->chkCategory = new QCheckBox($this,'chk' . $this->lstCategory->ControlId);
        $this->chkCategory->Name = 'Category';
        $this->chkCategory->Checked = false;
        $this->chkCategory->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

    }

    public function chkManufacturer_Create(){
        $this->chkManufacturer = new QCheckBox($this ,'chk' . $this->lstManufacturer->ControlId );
        $this->chkManufacturer->Name = 'Manufacturer';
        $this->chkManufacturer->Checked = false;
        $this->chkManufacturer->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

    }

    public function chkLongDescription_Create(){
        $this->chkLongDescription = new QCheckBox($this, 'chk' . $this->txtLongDescription->ControlId);
        $this->chkLongDescription->Name = 'LongDescription';
        $this->chkLongDescription->Checked = false;
        $this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
    }

    public function chkImage_Create(){
        $this->chkImage = new QCheckBox($this,'chk'.$this->ifcImage->strControlId);
        $this->chkImage->Name = 'image';
        $this->chkImage->Checked = false;
        $this->chkImage->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
    }

    // Save Button Click Actions
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->clearWarnings();
        $blnError = false;
        // Get an instance of the database
        $objDatabase = QApplication::$Database[1];
        // Begin a MySQL Transaction to be either committed or rolled back
        $objDatabase->TransactionBegin();

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
        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));
        if ($this->ifcImage->FileName) {
            // Retrieve the extension (.jpg, .gif) from the filename
            $explosion = explode(".", $this->ifcImage->FileName);
            // Set the file name to ID_asset_model.ext
            $blnOnceUploaded = false;
            foreach($this->arrModelsToEdit as $AssetModelId){
                $this->ifcImage->FileName = sprintf('%s%s%s.%s', $this->ifcImage->Prefix,
                                                    $AssetModelId, $this->ifcImage->Suffix, $explosion[1]);
                if(!$blnOnceUploaded){
                    $blnOnceUploaded = true;
                    $upoadedFile = $this->ifcImage->ProcessUpload();
                }
                else{
                    $this->ifcImage->CopyUploaded($upoadedFile, $this->ifcImage->FileName);
                }

            }

            // Save the image path information to the AssetModel object
            $set[] = sprintf('`image_path`= CONCAT("%s" , %s , "%s")',$this->ifcImage->Prefix, '`asset_model_id`',
                                                   sprintf('%s.%s', $this->ifcImage->Suffix, $explosion[1]));
        }
        if($this->chkShortDescription->Checked){
            if(trim($this->txtShortDescription->Text)!== ''){
                $set[] = sprintf('`short_description`="%s"' , $this->txtShortDescription->Text);
            }
            else{
                $blnError = true;
                $this->txtShortDescription->Warning = 'Name shouldn\'t be empty';
            }
        }
        if($this->chkLongDescription->Checked){
            $set[] = sprintf('`long_description`="%s"', $this->txtLongDescription->Text);
        }
        if($this->chkManufacturer->Checked){
            if($this->lstManufacturer->SelectedValue !== null){
                $set[] = sprintf('`manufacturer_id`=%s', $this->lstManufacturer->SelectedValue);
            }
            else{
                $blnError = true;
                $this->lstManufacturer->Warning = 'Manufacturer shouldn\'t be empty';
            }
        }
        if($this->chkCategory->Checked){
            if($this->lstCategory->SelectedValue!== null){
                $set[] = sprintf('`category_id`= %s', $this->lstCategory->SelectedValue);
            }
            else{
                $blnError = true;
                $this->lstCategory->Warning = 'Category shouldn\'t be empty';
            }
        }
        if(!$blnError){
            try{
                if (count($this->arrCustomFieldsToEdit)>0) {
                    // preparing data to edit
                    // Save the values from all of the custom field controls to save the asset
                    foreach($this->arrModelsToEdit as $intModelId){
                        $objCustomFieldsArray = CustomField::LoadObjCustomFieldArray(EntityQtype::AssetModel, false);
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
                            $intModelId,
                            EntityQtype::AssetModel);
                    }
                }
                $strQuery = sprintf("UPDATE `asset_model`
                                     SET ". implode(",",$set). "
                                     WHERE `asset_model_id` IN (%s)",
                                    implode(",", $this->arrModelsToEdit));

                // print $strQuery; exit;
                $objDatabase->NonQuery($strQuery);
                $objDatabase->TransactionCommit();
                $this->uncheck();
                //$this->ParentControl->RemoveChildControls(true);
                $this->CloseSelf(true);
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
        $this->ParentControl->RemoveChildControls(true);
        $this->CloseSelf(true);
        QApplication::Redirect('');
    }
    //Set display logic for the CustomFields
    protected function UpdateCustomFields(){
        if($this->arrCustomFields){
            foreach ($this->arrCustomFields as $objCustomField) {
                //If the role doesn't have edit access for the custom field and the custom field is required, the field shows as a label with the default value
                if (!$objCustomField['blnEdit']){
                    $objCustomField['lbl']->Display=true;
                    $objCustomField['input']->Display=false;
                    if(($objCustomField['blnRequired']))
                        $objCustomField['lbl']->Text=$objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue->__toString();
                }
            }
        }

    }

    public function btnApply_Create(){
        $this->btnApply = new QButton($this);
        $this->btnApply->Name = 'Apply';
        $this->btnApply->Text = 'Apply';
        $this->btnApply->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to edit these items?'));
        $this->btnApply->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnSave_Click'));
        $this->btnApply->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSave_Click'));
        $this->btnApply->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    }

    public function uncheck(){
        $this->chkShortDescription->Checked = false;
        $this->chkLongDescription->Checked = false;
        $this->chkCategory->Checked = false;
        $this->chkManufacturer->Checked = false;
        $this->chkImage->Checked = false;
        if(count($this->arrCustomFields)>0)  {
            foreach($this->arrCustomFields as $field)
            {
                $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
            }
        }
    }

    public function clearWarnings(){
        $this->txtShortDescription->Warning = '';
        $this->txtLongDescription->Warning = '';
        $this->lstCategory->Warning = '';
        $this->lstManufacturer->Warning = '';
        $this->ifcImage->Warning = '';
        if(count($this->arrCustomFields)>0){
            foreach($this->arrCustomFields as $field){
                $field['input']->Warning = '';
            }
        }
    }
}
?>