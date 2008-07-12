<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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
	class AssetModelEditPanel extends AssetModelEditPanelBase {
		
		// Specify the Location of the Template (feel free to modify) for this Panel
		protected $strTemplate = 'AssetModelEditPanel.tpl.php';
		// Image File Control
		public $ifcImage;
		// An array of custom fields
		public $arrCustomFields;
		
		public function __construct($objParentObject, $strClosePanelMethod, $objAssetModel = null, $strControlId = null) {
			
			try {
				parent::__construct($objParentObject, $strClosePanelMethod, $objAssetModel, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Create the Image File Control
			$this->ifcImage_Create();
			// Create all custom asset model fields
			$this->customFields_Create();
			
			$this->UpdateCustomFields();
			
			// Modify Code Generated Controls
			$this->lstCategory->Required = true;
			$this->lstManufacturer->Required = true;
			$this->btnSave->RemoveAllActions('onclick');
			$this->btnSave->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;
			
			// Add Enter Key Events to each control except the Cancel Button
			$arrControls = array($this->txtShortDescription, $this->lstCategory, $this->lstManufacturer, $this->txtAssetModelCode, $this->txtLongDescription, $this->ifcImage);
			foreach ($arrControls as $ctlControl) {
				$ctlControl->CausesValidation = true;
				$ctlControl->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSave_Click'));
				$ctlControl->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			}
			
			$this->strOverflow = QOverflow::Auto;
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
			// $this->ifcImage->ThumbPrefix = "thumb_";
			$this->ifcImage->Prefix = QApplication::$TracmorSettings->ImageUploadPrefix;
			$this->ifcImage->Suffix = "_asset_model";
		}
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objAssetModel->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(4, $this->blnEditMode, $this->objAssetModel->AssetModelId);
			
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAssetModel->objCustomFieldArray, $this->blnEditMode, $this, false, true, false);
		}
		
		// Save Button Click Actions
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$this->UpdateAssetModelFields();
			$this->objAssetModel->Save();
			
			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				// Save the values from all of the custom field controls
				CustomField::SaveControls($this->objAssetModel->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objAssetModel->AssetModelId, 4);
			}

			if ($this->ifcImage->FileName) {
				// Retrieve the extension (.jpg, .gif) from the filename
				$explosion = explode(".", $this->ifcImage->FileName);
				// Set the file name to ID_asset_model.ext
				$this->ifcImage->FileName = sprintf('%s%s%s.%s', $this->ifcImage->Prefix, $this->objAssetModel->AssetModelId, $this->ifcImage->Suffix, $explosion[1]);
				// Set the image path for saving the asset model
				$this->txtImagePath->Text = $this->ifcImage->FileName;
				// Upload the file to the server
				$this->ifcImage->ProcessUpload();
				
				// Save the image path information to the AssetModel object
				$this->objAssetModel->ImagePath = $this->txtImagePath->Text;
				$this->objAssetModel->Save(false, true);
			}
			
			$lstAssetModel = $this->ParentControl->ParentControl->lstAssetModel;
			$lstAssetModel->AddItem($this->txtShortDescription->Text, $this->objAssetModel->AssetModelId);
			$lstAssetModel->SelectedValue = $this->objAssetModel->AssetModelId;
			$this->ParentControl->ParentControl->lstAssetModel_Select($this->objForm->FormId, $this->ControlId, null);
			
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
		}
		
		// Cancel Button Click Action
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			
			$this->ParentControl->RemoveChildControls(true);
			$this->CloseSelf(true);
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
	}
?>