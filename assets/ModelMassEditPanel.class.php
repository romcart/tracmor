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
// Include the classfile for CompanyEditPanelBase
require(__PANELBASE_CLASSES__ . '/AssetModelEditPanelBase.class.php');

class ModelMassEditPanel extends AssetModelEditPanelBase {

	/**
	 * @var  QCheckBox $chkImage
	 * @var  QCheckBox $chkCategory
	 * @var  QCheckBox $chkManufacturer
	 * @var  QCheckBox $chkLongDescription
	 * @var  QCheckBox $chkImage
	 */

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../assets/ModelMassEditPanel.tpl.php';


	// Inputs for can be Edited
    // public $txtLongDescription;

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
    public $ifcImage;
    public $arrCustomFields;

	public function __construct($objParentObject, $strClosePanelMethod , $arrayModelId) {

		try {
			parent::__construct($objParentObject, $strClosePanelMethod);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->arrModelsToEdit = $arrayModelId;
		$this->strOverflow = QOverflow::Auto;
		$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;

        //
        $this->ifcImage_Create();
		// Setup id for controls
		$this->lstCategory->strControlId = 'Category';
		$this->lstManufacturer->strControlId = 'Manufacturer';
		$this->txtShortDescription->strControlId = 'ShortDescription';
		$this->ifcImage->strControlId = 'Image';
		$this->txtLongDescription->strControlId = 'LongDescription';

		// Disable inputs
		$this->lstCategory->Enabled = false;
		$this->lstManufacturer->Enabled = false;
		$this->txtShortDescription->Enabled = false;
		$this->ifcImage->Enabled = false;
		$this->txtLongDescription->Enabled = false;

		$this->chkShortDescription_Create();
		$this->chkCategory_Create();
		$this->chkManufacturer_Create();
		$this->chkLongDescription_Create();
		$this->chkImage_Create();
		$this->btnApply_Create();

        $this->objAssetModel->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(4, $this->blnEditMode, $this->objAssetModel->AssetModelId);
        $this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAssetModel->objCustomFieldArray, $this->blnEditMode, $this, false, true, false);
        foreach($this->arrCustomFields as $field){
            $field['input']->Enabled = false;
            $this->arrCheckboxes[$field['input']->strControlId] = new QCheckBox($this, 'chk'.$field['input']->strControlId);
            $this->arrCheckboxes[$field['input']->strControlId]->Checked = false;
            $this->arrCheckboxes[$field['input']->strControlId]->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
        }

	}

	public function chkShortDescription_Create(){
		$this->chkShortDescription = new QCheckBox($this, 'chkShortDescription');
		$this->chkShortDescription->Name = 'ShortDescription';
		$this->chkShortDescription->Checked = false;
		$this->chkShortDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	public function chkCategory_Create(){
		$this->chkCategory = new QCheckBox($this,'chkCategory');
		$this->chkCategory->Name = 'Category';
		$this->chkCategory->Checked = false;
		$this->chkCategory->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

	public function chkManufacturer_Create(){
		$this->chkManufacturer = new QCheckBox($this,'chkManufacturer');
		$this->chkManufacturer->Name = 'Manufacturer';
		$this->chkManufacturer->Checked = false;
		$this->chkManufacturer->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

	public function chkLongDescription_Create(){
		$this->chkLongDescription = new QCheckBox($this,'chkLongDescription');
		$this->chkLongDescription->Name = 'LongDescription';
		$this->chkLongDescription->Checked = false;
		$this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	public function chkImage_Create(){
		$this->chkImage = new QCheckBox($this,'chkImage');
		$this->chkImage->Name = 'image';
		$this->chkImage->Checked = false;
		$this->chkImage->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

    // Create the Image File Control
    protected function ifcImage_Create() {
        $this->ifcImage = new QImageFileControl($this);
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
        //$this->ifcImage->ThumbPrefix = "thumb_";
        $this->ifcImage->Prefix = QApplication::$TracmorSettings->ImageUploadPrefix;
        $this->ifcImage->Suffix = "_asset_model";
    }

	public function btnApply_Create(){

		$this->btnApply = new QButton($this);
		$this->btnApply->Name = 'Apply';
		$this->btnApply->Text = 'Apply';
		$this->btnApply->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
		$this->btnApply->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
		$this->btnApply->AddAction(new QEnterKeyEvent(), new QTerminateAction());

	}

	public function lblWarning_Create(){
		$this->lblWarning = new QLabel($this);
		//$this->lblWarning->Class = 'warning';
	}

	public function btnApply_Click($strFormId, $strControlId, $strParameter){
        if(count($this->arrCustomFields)>0)
        {
            $customFieldIdArray = array();

            foreach ($this->arrCustomFields as $field){
                if($this->arrCheckboxes[$field['input']->strControlId]->Checked){
                    $this->arrCustomFieldsToEdit[] = $field;
                    $customFieldIdArray[] = (int)(str_replace('cf','',$field['input']->strControlId));
                }
            }

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
                $this->arrCustomFieldsToEdit = array();
            }
        }
        // Apply checked main_table fields
        $set = array(sprintf('`modified_by`= %s',QApplication::$objUserAccount->UserAccountId));
        if($this->chkShortDescription->Checked && $this->txtShortDescription->Text!==null){
            $set[] = sprintf('`short_description`="%s"' , $this->txtShortDescription->Text);
        }
        if($this->chkLongDescription->Checked){
            $set[] = sprintf('`long_description`="%s"', $this->txtLongDescription->Text);
        }
        if($this->chkManufacturer->Checked && $this->lstManufacturer->SelectedValue !== null){
            $set[] = sprintf('`manufacturer_id`=%s', $this->lstManufacturer->SelectedValue);
        }
        if($this->chkCategory->Checked && $this->lstCategory->SelectedValue!== null){
            $set[] = sprintf('`category_id`= %s', $this->lstCategory->SelectedValue);
        }


        if( $this->chkImage->Checked){
            // Retrieve the extension (.jpg, .gif) from the filename
            echo $this->ifcImage->FileName; exit;
            $explosion = explode(".", $this->ifcImage->FileName);
            // Set the file name to ID_asset_model.ext
            $this->ifcImage->strFileName = sprintf('%s%s%s.%s',
                                                $this->ifcImage->Prefix,
                                                $this->arrModelsToEdit[0],
                                                $this->ifcImage->Suffix, $explosion[1]);
            // Set the image path for saving the asset model
            $this->txtImagePath->Text = $this->ifcImage->FileName;
            // Upload the file to the server
            $this->ifcImage->ProcessUpload();

            // Save the image path information to the AssetModel object
            $set[] = sprintf('`image_path`="%s"',$this->txtImagePath->Text);
        }

        $strQuery = sprintf("UPDATE `asset_model`
				                 SET ". implode(",",$set). "
				                 WHERE `asset_model_id` IN (%s)",
            implode(",", $this->arrModelsToEdit));

        $objDatabase = QApplication::$Database[1];
        $objDatabase->NonQuery($strQuery);
		$this->ParentControl->RemoveChildControls(true);
		$this->CloseSelf(true);
	}

	// Cancel Button Click Action
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->ParentControl->RemoveChildControls(true);
		$this->CloseSelf(true);
	}
}
?>