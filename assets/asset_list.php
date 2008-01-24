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
	require_once(__FORMBASE_CLASSES__ . '/AssetListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Asset class.  It extends from the code-generated
	 * abstract AssetListFormBase class.
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
	class AssetListForm extends AssetListFormBase {

		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// Basic Inputs
		protected $lstCategory;
		protected $lstManufacturer;
		protected $lstLocation;
		protected $txtShortDescription;
		protected $txtAssetCode;
		protected $chkOffsite;
		protected $lblAssetModelId;
		protected $arrCustomFields;
		
		// Buttons
		protected $btnSearch;
		protected $blnSearch;
		protected $btnClear;
		
		// Advanced Label/Link
		protected $lblAdvanced;
		// Boolean that toggles Advanced Search display
		protected $blnAdvanced;
		// Advanced Search Composite control
		protected $ctlAdvanced;
		
		// Search Values
		protected $intLocationId;
		protected $intAssetModelId;
		protected $strShortDescription;
		protected $strAssetCode;
		protected $intCategoryId;
		protected $intManufacturerId;
		protected $blnOffsite;
		protected $strAssetModelCode;
		protected $intReservedBy;
		protected $intCheckedOutBy;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;
		protected $blnAttachment;
		
		protected function Form_Create() {
			
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
			
			$this->dtgAsset = new QDataGrid($this);
			$this->dtgAsset->Name = 'asset_list';
  		$this->dtgAsset->CellPadding = 5;
  		$this->dtgAsset->CellSpacing = 0;
  		$this->dtgAsset->CssClass = "datagrid";
      		
      // Disable AJAX for the datagrid
      $this->dtgAsset->UseAjax = false;
      
      // Allow for column toggling
      $this->dtgAsset->ShowColumnToggle = true;
      
      // Allow for CSV Export
      $this->dtgAsset->ShowExportCsv = true;
      
      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgAsset);
      $this->dtgAsset->Paginator = $objPaginator;
      $this->dtgAsset->ItemsPerPage = 20;
      
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment_gray.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Code', '<?= $_ITEM->__toStringWithLink("bluelink") ?> <?= $_ITEM->ToStringHoverTips($_CONTROL) ?>', 'SortByCommand="asset_code ASC"', 'ReverseSortByCommand="asset_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Model', '<?= $_ITEM->AssetModel->__toStringWithLink("bluelink") ?>', 'SortByCommand="asset__asset_model_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM->AssetModel->Category->__toString() ?>', 'SortByCommand="asset__asset_model_id__category_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__category_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->AssetModel->Manufacturer->__toString() ?>', 'SortByCommand="asset__asset_model_id__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM->Location->__toString() ?>', 'SortByCommand="asset__location_id__short_description ASC"', 'ReverseSortByCommand="asset__location_id__short_description DESC"', 'CssClass="dtg_column"'));
      
      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		$this->dtgAsset->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      	}
      }
      
      // Column to originally sort by (defaults to asset_id, which is what we want
      $this->dtgAsset->SortColumnIndex = 1;
      $this->dtgAsset->SortDirection = 0;
      
      $objStyle = $this->dtgAsset->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgAsset->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgAsset->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
      
      $this->dtgAsset->SetDataBinder('dtgAsset_Bind');
      
      $this->lstCategory_Create();
      $this->lstManufacturer_Create();
      $this->lstLocation_Create();
      $this->txtShortDescription_Create();
      $this->txtAssetCode_Create();
      $this->chkOffsite_Create();
      $this->lblAssetModelId_Create();
      $this->btnSearch_Create();
      $this->btnClear_Create();
      $this->ctlAdvanced_Create();
      $this->lblAdvanced_Create();
			
      	
			if (QApplication::QueryString('intAssetModelId')) {
				$this->lblAssetModelId->Text = QApplication::QueryString('intAssetModelId');
				$this->blnSearch = true;
			}
  	}
  	
		protected function dtgAsset_Bind() {
			
			// If the search button has been pressed or the AssetModelId was sent in the query string from the asset models page
			if ($this->blnSearch) {
				$this->assignSearchValues();
			}
			
			$strAssetCode = $this->strAssetCode;
			$intLocationId = $this->intLocationId;
			$intAssetModelId = $this->intAssetModelId;
			$intCategoryId = $this->intCategoryId;
			$intManufacturerId = $this->intManufacturerId;
			$blnOffsite = $this->blnOffsite;
			$strAssetModelCode = $this->strAssetModelCode;
			$intReservedBy = $this->intReservedBy;
			$intCheckedOutBy = $this->intCheckedOutBy;
			$strShortDescription = $this->strShortDescription;
			$strDateModifiedFirst = $this->strDateModifiedFirst;
			$strDateModifiedLast = $this->strDateModifiedLast;
			$strDateModified = $this->strDateModified;
			$blnAttachment = $this->blnAttachment;
			$arrCustomFields = $this->arrCustomFields;
					
			// Enable Profiling
      //QApplication::$Database[1]->EnableProfiling();
      

      // Expand the Asset object to include the AssetModel, Category, Manufacturer, and Location Objects
      $objExpansionMap[Asset::ExpandAssetModel][AssetModel::ExpandCategory] = true;
      $objExpansionMap[Asset::ExpandAssetModel][AssetModel::ExpandManufacturer] = true;
      $objExpansionMap[Asset::ExpandLocation] = true;

			$this->dtgAsset->TotalItemCount = Asset::CountBySearch($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $objExpansionMap);
			if ($this->dtgAsset->TotalItemCount == 0) {
				$this->dtgAsset->ShowHeader = false;
			}
			else {
				$this->dtgAsset->DataSource = Asset::LoadArrayBySearch($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $this->dtgAsset->SortInfo, $this->dtgAsset->LimitInfo, $objExpansionMap);
				$this->dtgAsset->ShowHeader = true;
			}
			$this->blnSearch = false;
    }
  	
  	 // protected function Form_Exit() {
  	  // Output database profiling - it shows you the queries made to create this page
  	  // This will not work on pages with the AJAX Pagination
      // QApplication::$Database[1]->OutputProfiling();
  	 // }
  	
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}  	
  	
  	protected function ctlAdvanced_Create() {
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this, 1);
  		$this->ctlAdvanced->Display = false;
  	}


		
		/*************************
		 *	CREATE INPUT METHODS
		*************************/
  	
  	protected function lstLocation_Create() {
  		$this->lstLocation = new QListBox($this);
  		$this->lstLocation->Name = 'Location';
  		$this->lstLocation->AddItem('- ALL -', null);
  		foreach (Location::LoadAllLocations(true, true, 'short_description') as $objLocation) {
  			// Keep Shipped and To Be Received at the top of the list
  			if ($objLocation->LocationId == 2 || $objLocation->LocationId == 5) {
  				$this->lstLocation->AddItemAt(1, new QListItem($objLocation->ShortDescription, $objLocation->LocationId));
  			}
  			else {
  				$this->lstLocation->AddItem($objLocation->ShortDescription, $objLocation->LocationId);
  			}
  		}
      $this->lstLocation->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->lstLocation->AddAction(new QEnterKeyEvent(), new QTerminateAction());  		
  	}
	  
	  protected function lstCategory_Create() {
	  	$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = 'Category';
			$this->lstCategory->AddItem('- ALL -', null);
			foreach (Category::LoadAllWithFlags(true, false, 'short_description') as $objCategory) {
				$this->lstCategory->AddItem($objCategory->ShortDescription, $objCategory->CategoryId);
			}
	  }
	  
	  protected function lstManufacturer_Create() {
      $this->lstManufacturer = new QListBox($this);
			$this->lstManufacturer->Name = 'Manufacturer';
			$this->lstManufacturer->AddItem('- ALL -', null);
			foreach (Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription))) as $objManufacturer) {
				$this->lstManufacturer->AddItem($objManufacturer->ShortDescription, $objManufacturer->ManufacturerId);
			}
	  }
	  
	  protected function txtShortDescription_Create() {
	    $this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = 'Model';
			// Because the enter key will also call form.submit() on some browsers, which we
      // absolutely DON'T want to have happen, let's be sure to terminate any additional
      // actions on EnterKey
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());

	  }
	  
	  protected function txtAssetCode_Create() {
	  	$this->txtAssetCode = new QTextBox($this);
	  	$this->txtAssetCode->Name = 'Asset Code';
	  	$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
	  	$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  protected function chkOffsite_Create() {
	  	$this->chkOffsite = new QCheckBox($this);
	  	$this->chkOffsite->Text = 'Show Offsite Assets';
	  }
	  
	  protected function lblAssetModelId_Create() {
	  	$this->lblAssetModelId = new QLabel($this);
	  	$this->lblAssetModelId->Text = '';
	  	$this->lblAssetModelId->Visible = false;
	  }
	  
	  /**************************
	   *	CREATE BUTTON METHODS
	  **************************/
		
	  protected function btnSearch_Create() {
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Name = 'search';
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QServerAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  protected function btnClear_Create() {
	  	$this->btnClear = new QButton($this);
			$this->btnClear->Name = 'clear';
			$this->btnClear->Text = 'Clear';
			$this->btnClear->AddAction(new QClickEvent(), new QServerAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
	  }
	  
	  protected function lblAdvanced_Create() {
	  	$this->lblAdvanced = new QLabel($this);
	  	$this->lblAdvanced->Name = 'Advanced';
	  	$this->lblAdvanced->Text = 'Advanced Search';
	  	$this->lblAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->ctlAdvanced));
	  	$this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblAdvanced_Click'));
	  	$this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
	  	$this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
	  }

/*    // This method (declared as public) will help with the checkbox column rendering
    public function chkSelected_Render(Asset $objAsset) {
        // In order to keep track whether or not an Asset's Checkbox has been rendered,
        // we will use explicitly defined control ids.
        $strControlId = 'chkSelected' . $objAsset->AssetId;

        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);
        
        if (!$chkSelected) {
            // Define the Checkbox -- it's parent is the Datagrid (b/c the datagrid is the one calling
            // this method which is responsible for rendering the checkbox.  Also, we must
            // explicitly specify the control ID
            $chkSelected = new QCheckBox($this->dtgAsset, $strControlId);
            $chkSelected->Text = '';
            
            // We'll use Control Parameters to help us identify the Person ID being copied
            $chkSelected->ActionParameter = $objAsset->AssetId;
            
            // Let's assign a server action on click
            // $chkSelected->AddAction(new QClickEvent(), new QServerAction('chkSelected_Click'));
        }

        // Render the checkbox.  We want to *return* the contents of the rendered Checkbox,
        // not display it.  (The datagrid is responsible for the rendering of this column).
        // Therefore, we must specify "false" for the optional blnDisplayOutput parameter.
        return $chkSelected->Render(false);
    }	  */
	  
	  protected function btnSearch_Click() {
	  	$this->blnSearch = true;
			$this->dtgAsset->PageNumber = 1;
	  }
	  
	  protected function btnClear_Click() {
	  	if ($this->intAssetModelId) {
	  		QApplication::Redirect('asset_list.php');
	  	}
	  	else {
	  		// Set controls to null
		  	$this->lstCategory->SelectedIndex = 0;
		  	$this->lstManufacturer->SelectedIndex = 0;
		  	$this->txtShortDescription->Text = '';
		  	$this->txtAssetCode->Text = '';
		  	$this->chkOffsite->Checked = false;
		  	$this->lstLocation->SelectedIndex = 0;
		  	$this->ctlAdvanced->ClearControls();
		  	
		  	// Set search variables to null
		  	$this->intCategoryId = null;
		  	$this->intManufacturerId = null;
		  	$this->intLocationId = null;
		  	$this->intAssetModelId = null;
		  	$this->strShortDescription = null;
		  	$this->strAssetCode = null;
		  	$this->blnOffsite = false;
		  	$this->strAssetModelCode = null;
		  	$this->intReservedBy = null;
		  	$this->intCheckedOutBy = null;
		  	$this->strDateModified = null;
		  	$this->strDateModifiedFirst = null;
		  	$this->strDateModifiedLast = null;
		  	$this->blnAttachment = false;
		  	if ($this->arrCustomFields) {
		  		foreach ($this->arrCustomFields as $field) {
		  			$field['value'] = null;
		  		}
		  	}
		  	$this->dtgAsset->SortColumnIndex = 1;
		  	$this->blnSearch = false;
	  	}
	  }
	  
	  protected function lblAdvanced_Click() {
	  	if ($this->blnAdvanced) {
	  		
	  		$this->blnAdvanced = false;
	  		$this->lblAdvanced->Text = 'Advanced Search';
	  		
	  		$this->ctlAdvanced->ClearControls();
	  		
	  	}
	  	else {
	  		$this->blnAdvanced = true;
	  		$this->lblAdvanced->Text = 'Hide Advanced';
	  	}
	  }
	  
	  protected function assignSearchValues() {
	  	$this->intCategoryId = $this->lstCategory->SelectedValue;
			$this->intManufacturerId = $this->lstManufacturer->SelectedValue;
			$this->strShortDescription = $this->txtShortDescription->Text;
			$this->strAssetCode = $this->txtAssetCode->Text;
			$this->blnOffsite = $this->chkOffsite->Checked;
			$this->intLocationId = $this->lstLocation->SelectedValue;
			$this->intAssetModelId = $this->lblAssetModelId->Text;
			$this->strAssetModelCode = $this->ctlAdvanced->AssetModelCode;
			$this->intReservedBy = $this->ctlAdvanced->ReservedBy;
			$this->intCheckedOutBy = $this->ctlAdvanced->CheckedOutBy;
			$this->strDateModified = $this->ctlAdvanced->DateModified;
			$this->strDateModifiedFirst = $this->ctlAdvanced->DateModifiedFirst;
			$this->strDateModifiedLast = $this->ctlAdvanced->DateModifiedLast;
			$this->blnAttachment = $this->ctlAdvanced->Attachment;
			
			$this->arrCustomFields = $this->ctlAdvanced->CustomFieldArray;
			if ($this->arrCustomFields) {
				foreach ($this->arrCustomFields as &$field) {
					if ($field['input'] instanceof QListBox) {
						$field['value'] = $field['input']->SelectedValue;
					}
					elseif ($field['input'] instanceof QTextBox) {
						$field['value'] = $field['input']->Text;
					}
				}
			}
	  }
	}  

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/asset_edit.php.inc as the included HTML template file
	// AssetListForm::Run('AssetListForm', './Qcodo/assets/asset_list.php.inc');
	AssetListForm::Run('AssetListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/assets/asset_list.tpl.php');
?>