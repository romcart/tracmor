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

	require_once('../includes/prepend.inc.php');
	QApplication::Authenticate(2);
	require_once(__FORMBASE_CLASSES__ . '/AssetModelEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the AssetModel class.  It extends from the code-generated
	 * abstract AssetModelEditFormBase class.
	 *
	 * Any display custimizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * Additional qform control objects can also be defined and used here, as well.
	 * 
	 * @package Application
	 * @subpackage FormDraftObjects
	 * 
	 */
	class AssetModelEditForm extends AssetModelEditFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		protected $lblShortDescription;
		protected $lblAssetModelHeader;
		protected $lblAssetModelCode;
		protected $lblCategory;
		protected $lblManufacturer;
		protected $btnEdit;
		protected $ifcImage;
		protected $lblImage;
		protected $pnlLongDescription;
		
		// Custom Field Objects
		public $arrCustomFields;
		
		// Generate tab indexes
		protected $intNextTabIndex = 1;

		protected function Form_Create() {
			
      // Call SetupAssetModel to either Load/Edit Existing or Create New
			$this->SetupAssetModel();
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			// Create labels and buttons not included in generated form
			$this->lblShortDescription_Create();
			$this->lblAssetModelCode_Create();
			$this->lblAssetModelHeader_Create();
			$this->lblCategory_Create();
			$this->lblManufacturer_Create();
			$this->txtShortDescription_Create();
			$this->lstCategory_Create();
			$this->txtLongDescription_Create();
			$this->txtAssetModelCode_Create();
			$this->lstManufacturer_Create();
			$this->txtImagePath_Create(); 
			$this->ifcImage_Create();
			// Image label must be created AFTER image control
			$this->lblImage_Create();
			$this->pnlLongDescription_Create();
			
			// Create all custom asset fields
			$this->customFields_Create();

			// Create/Setup Button Action controls
			$this->btnEdit_Create();
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();

			// $this->btnClone_Create();	
			
			// Display labels for the existing asset
			if ($this->blnEditMode) {
				$this->displayLabels();
			}
			// Display empty inputs to create a new asset
			else {
				$this->displayInputs();
			}
			
			// Output the database profile - for debugging purposes only
			// QApplication::$Database[1]->OutputProfiling();	
		
		}
		
		protected function SetupAssetModel() {
			parent::SetupAssetModel();
			QApplication::AuthorizeEntity($this->objAssetModel, $this->blnEditMode);			
		}
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}		
		
		// Create the Short Description label (Asset Model Name)
		protected function lblShortDescription_Create() {
			$this->lblShortDescription = new QLabel($this);
		  $this->lblShortDescription->Name = 'Asset Model';
		  if ($this->blnEditMode) {
		  	$this->lblShortDescription->Text = $this->objAssetModel->__toString();
		  }
		}		
		
		// Create the Asset Model Header label (Asset Model Name)
		protected function lblAssetModelHeader_Create() {
			$this->lblAssetModelHeader = new QLabel($this);
			$this->lblAssetModelHeader->Name = 'Asset Model';
			$this->lblAssetModelHeader->Text = $this->objAssetModel->__toString();
		}		
		
		// Create the Asset Model Code label
		protected function lblAssetModelCode_Create() {
			// It is better to use late-binding here because we are only getting one record
			$this->lblAssetModelCode = new QLabel($this);
			$this->lblAssetModelCode->Name = 'Asset Model Code';		
			if ($this->blnEditMode) {
			  $this->lblAssetModelCode->Text = $this->objAssetModel->AssetModelCode;
			}
		}
		
		// Create the Category Label
		protected function lblCategory_Create() {
			$this->lblCategory = new QLabel($this);
			$this->lblCategory->Name = 'Category';
			if ($this->blnEditMode) {
				$this->lblCategory->Text = $this->objAssetModel->Category->ShortDescription;
			}
		}
		
		// Create the Manufacturer Label
		protected function lblManufacturer_Create() {
			$this->lblManufacturer = new QLabel($this);
			$this->lblManufacturer->Name = 'Manufacturer';
			if ($this->blnEditMode) {
				$this->lblManufacturer->Text = $this->objAssetModel->Manufacturer->ShortDescription;
			}
		}
		
		// Output the image
		protected function lblImage_Create() {
			$this->lblImage = new QLabel($this);
			$this->lblImage->Text = $this->ifcImage->GetDisplayHtml($this->objAssetModel->ImagePath);
			$this->lblImage->HtmlEntities = false;
		}
		
		// Create the Long Description Panel
		protected function pnlLongDescription_Create() {
			$this->pnlLongDescription = new QPanel($this);
			$this->pnlLongDescription->CssClass='scrollBox';
			if ($this->blnEditMode) {
				$this->pnlLongDescription->Text= nl2br($this->objAssetModel->LongDescription);
			}
		}
		
		// Create the Image File Control
		protected function ifcImage_Create() {
			$this->ifcImage = new QImageFileControl($this);
			// $this->ifcImage->UploadPath = "/www/imagestorage/";
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
			$this->ifcImage->TabIndex=6;
			$this->intNextTabIndex++;
		}
		
		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QServerAction('btnSave_Click'));
   		$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtShortDescription->TabIndex=1;
			$this->intNextTabIndex++;
			QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->txtShortDescription->ControlId));
		}
		
		// Create and Setup txtAssetModelCode
		protected function txtAssetModelCode_Create() {
			parent::txtAssetModelCode_Create();
			$this->txtAssetModelCode->Required = true;
			$this->txtAssetModelCode->CausesValidation = true;
			$this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnSave_Click'));
   			$this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAssetModelCode->TabIndex=4;
			$this->intNextTabIndex++;
		}
		
		// Create and Setup txtLongDescription
		protected function txtLongDescription_Create() {
			parent::txtLongDescription_Create();
			$this->txtLongDescription->TabIndex=5;
			$this->intNextTabIndex++;
		}
		
		// Create and Setup lstCategory
		protected function lstCategory_Create() {
			$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = QApplication::Translate('Category');
			$this->lstCategory->Required = true;
			if (!$this->blnEditMode)
				$this->lstCategory->AddItem('- Select One -', null);
			$objCategoryArray = Category::LoadAllWithFlags(true, false, 'short_description ASC');
			if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
				$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
				if (($this->objAssetModel->Category) && ($this->objAssetModel->Category->CategoryId == $objCategory->CategoryId))
					$objListItem->Selected = true;
				$this->lstCategory->AddItem($objListItem);
			}
			$this->lstCategory->TabIndex=2;
			$this->intNextTabIndex++;
		}
		
		// Create and Setup lstManufacturer
		protected function lstManufacturer_Create() {
			$this->lstManufacturer = new QListBox($this);
			$this->lstManufacturer->Name = QApplication::Translate('Manufacturer');
			$this->lstManufacturer->Required = true;
			if (!$this->blnEditMode)
				$this->lstManufacturer->AddItem('- Select One -', null);
			// $objManufacturerArray = Manufacturer::LoadAll('short_description ASC');
			$objManufacturerArray = Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription)));
			if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
				$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
				if (($this->objAssetModel->Manufacturer) && ($this->objAssetModel->Manufacturer->ManufacturerId == $objManufacturer->ManufacturerId))
					$objListItem->Selected = true;
				$this->lstManufacturer->AddItem($objListItem);
			}
			$this->lstManufacturer->TabIndex=3;
			$this->intNextTabIndex++;
		}
		
		// Create all Custom Asset Fields
		protected function customFields_Create() {
		
			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objAssetModel->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(4, $this->blnEditMode, $this->objAssetModel->AssetModelId);
			
			// Create the Custom Field Controls - labels and inputs (text or list) for each
			$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAssetModel->objCustomFieldArray, $this->blnEditMode, $this, true, true);
			
			foreach ($this->arrCustomFields as $objCustomField) {
				$objCustomField['input']->TabIndex=$this->GetNextTabIndex();
			}
		}
		
	  // Setup Save Button
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CausesValidation = true;
			// This cannot be Ajax because Javascript cannot access local files
			$this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
			$this->btnSave->AddAction(new QEnterKeyEvent(), new QServerAction('btnSave_Click'));
			$this->btnSave->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnSave->TabIndex= ++$this->intNextTabIndex;
			
		}
		
		// Setup Cancel Button
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
			$this->btnCancel->TabIndex = ++$this->intNextTabIndex;
		}		
		
		// Setup Edit Button
		protected function btnEdit_Create() {
		  $this->btnEdit = new QButton($this);
      $this->btnEdit->Text = 'Edit';
      $this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
      $this->btnEdit->CausesValidation = false;
			QApplication::AuthorizeControl($this->objAssetModel, $this->btnEdit, 2);       
		}
		
		// Setup Delete Button
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this Asset Model?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode) {
				$this->btnDelete->Display = false;
			}
			QApplication::AuthorizeControl($this->objAssetModel, $this->btnDelete, 3);			
		}
		
		// Edit Button Click
		protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {

			$this->displayInputs();
		}
		
		// Save Button Click Actions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$this->UpdateAssetModelFields();
			$this->objAssetModel->Save();
			
			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				
				// Save the values from all of the custom field controls to save the asset
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
			
			if ($this->blnEditMode) {
				$this->UpdateLabels();
				// This was necessary because it was not saving the changes of a second edit/save in a row
				// Reload all custom fields
				$this->objAssetModel->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(4, $this->blnEditMode, $this->objAssetModel->AssetModelId);
				$this->displayLabels();
			}
			else {
				// Display the asset model list page
				$strRedirect = "asset_model_list.php";
				QApplication::Redirect($strRedirect);
			}
		}
		
		// Cancel Button Click Actions
		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			if ($this->blnEditMode) {
				$this->displayLabels();
				$this->UpdateAssetModelControls();
			}
			else {
				QApplication::Redirect('asset_model_list.php');
			}
		}
		
		// Delete Button Click Actions - Erase Image and erase entry
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->ifcImage->Delete($this->objAssetModel->ImagePath);
			
			try {
				$strImagePath = $this->objAssetModel->ImagePath;
				$objCustomFieldArray = $this->objAssetModel->objCustomFieldArray;
				$this->objAssetModel->Delete();
				$this->ifcImage->Delete($strImagePath);
				// Custom Field Values for text fields must be manually deleted because MySQL ON DELETE will not cascade to them
				// The values should not get deleted for select values
				CustomField::DeleteTextValues($objCustomFieldArray);
				$this->RedirectToListPage();
			}
			catch (QDatabaseExceptionBase $objExc) {
				if ($objExc->ErrorNumber == 1451) {
					$this->btnDelete->Warning = 'This asset model cannot be deleted because it is associated with one or more assets.';
				}
				else {
					throw new QDatabaseExceptionBase();
				}
			}
		}
		
		// Protected Update Methods
		protected function UpdateAssetModelFields() {
			$this->objAssetModel->CategoryId = $this->lstCategory->SelectedValue;
			$this->objAssetModel->ManufacturerId = $this->lstManufacturer->SelectedValue;
			$this->objAssetModel->AssetModelCode = $this->txtAssetModelCode->Text;
			$this->objAssetModel->ShortDescription = $this->txtShortDescription->Text;
			$this->objAssetModel->LongDescription = $this->txtLongDescription->Text;
			// $this->objAssetModel->ImagePath = $this->txtImagePath->Text;
		}
		
		// Assign the original values to all Asset Controls
		protected function UpdateAssetModelControls() {
			
			$this->lstCategory->SelectedValue = $this->objAssetModel->CategoryId;
			$this->lstManufacturer->SelectedValue = $this->objAssetModel->ManufacturerId;
			$this->txtAssetModelCode->Text = $this->objAssetModel->AssetModelCode;
			$this->txtShortDescription->Text = $this->objAssetModel->ShortDescription;
			$this->txtLongDescription->Text = $this->objAssetModel->LongDescription;
			$this->txtImagePath->Text = $this->objAssetModel->ImagePath;
			$this->arrCustomFields = CustomField::UpdateControls($this->objAssetModel->objCustomFieldArray, $this->arrCustomFields);
		}

		// Display the labels and buttons for Asset Model Viewing mode
		protected function displayLabels() {
			
			$this->lblImage->Display = true;
			$this->ifcImage->Display = false;

			// Do not display inputs
			$this->txtShortDescription->Display = false;
			$this->txtAssetModelCode->Display = false;			
			$this->lstCategory->Display = false;
			$this->lstManufacturer->Display = false;
			$this->txtLongDescription->Display = false;
			
			// Do not display Cancel and Save buttons
			$this->btnCancel->Display = false;
			$this->btnSave->Display = false;		
			
			// Display Labels/Panels for Viewing mode
			$this->lblShortDescription->Display = true;
			$this->lblAssetModelCode->Display = true;
			$this->lblCategory->Display = true;
			$this->lblManufacturer->Display = true;
			$this->pnlLongDescription->Display = true;		

			// Display Edit and Delete buttons
			$this->btnEdit->Display = true;
			$this->btnDelete->Display = true;
			// $this->btnClone->Display = true;
			
			// Display custom field labels
			if ($this->arrCustomFields) {
				CustomField::DisplayLabels($this->arrCustomFields);
			}
		}
		
		// Display the inputs and buttons for Edit or Create mode
		protected function displayInputs() {
			
			// Do not display labels/panels
			$this->lblShortDescription->Display = false;
			$this->lblAssetModelCode->Display = false;
			$this->lblCategory->Display = false;
			$this->lblManufacturer->Display = false;
			$this->lblImage->Display = false;
			$this->pnlLongDescription->Display = false;		
      
			// Display inputs
			$this->txtShortDescription->Display = true;
			$this->txtAssetModelCode->Display = true;
			$this->lstCategory->Display = true;
			$this->lstManufacturer->Display = true;
			$this->txtLongDescription->Display = true;
			$this->ifcImage->Display = true;
			      
      // Do not display Edit and Delete buttons
      $this->btnEdit->Display = false;
      $this->btnDelete->Display = false;
			
      // Display Cancel and Save butons    
      $this->btnCancel->Display = true;
      $this->btnSave->Display = true;
      
      // Display custom field inputs
	    if ($this->arrCustomFields) {
	    	CustomField::DisplayInputs($this->arrCustomFields);
	    }
		}
		
		protected function UpdateLabels() {
			
			$this->lblShortDescription->Text = $this->txtShortDescription->Text;
			$this->lblAssetModelCode->Text = $this->txtAssetModelCode->Text;
			$this->lblCategory->Text = $this->lstCategory->SelectedName;
			$this->lblManufacturer->Text = $this->lstManufacturer->SelectedName;
			$this->pnlLongDescription->Text = nl2br($this->txtLongDescription->Text);
			$this->lblImage->Text = $this->ifcImage->GetDisplayHtml($this->objAssetModel->ImagePath);
			
			// Update custom labels
			if ($this->arrCustomFields) {
				CustomField::UpdateLabels($this->arrCustomFields);
			}
			
			// From AssetModelEditFormBase, this loads an Asset Model object or creates a new one
			$this->SetupAssetModel();
		}
		
		protected function getNextTabIndex() {
			return ++$this->intNextTabIndex;
		}
		
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/asset_model_edit.php.inc as the included HTML template file
	AssetModelEditForm::Run('AssetModelEditForm', 'asset_model_edit.tpl.php');
?>