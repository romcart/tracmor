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

	require_once('../includes/prepend.inc.php');
	QApplication::Authenticate(2);
	require_once(__FORMBASE_CLASSES__ . '/AssetListFormBase.class.php');
    require('../assets/AssetMassEditPanel.class.php');
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
		/**
		 * @var  QLabel     $lblWarning
		 * @var  QDialogBox $dlgMassEdit
		 * @var  QDialogBox $dlgMassDelete
		 * @var  QButton    $btnMassDelete
		 * @var  QButton    $btnMassEdit
		 * @var  QAssetSearchToolComposite $ctlAssetSearchTool
		 */

		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// Search Menu
		public $ctlSearchMenu;
		
		/*// Basic Inputs
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
		protected $blnAttachment;*/
        public $arrToEdit;
        protected $pnlAssetMassEdit;
		protected $lblWarning;
		protected $dlgMassEdit;
		protected $dlgMassDelete;
		protected $btnMassEdit;
		protected $btnMassDelete;
        public    $ctlAssetSearchTool;

		protected function Form_Create() {
			
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
			$this->ctlSearchMenu_Create();
			
/*			$this->dtgAsset = new QDataGrid($this);
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
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Tag', '<?= $_ITEM->__toStringWithLink("bluelink") ?> <?= $_ITEM->ToStringHoverTips($_CONTROL) ?>', 'SortByCommand="asset_code ASC"', 'ReverseSortByCommand="asset_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Model', '<?= $_ITEM->AssetModel->__toStringWithLink("bluelink") ?>', 'SortByCommand="asset__asset_model_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM->AssetModel->Category->__toString() ?>', 'SortByCommand="asset__asset_model_id__category_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__category_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->AssetModel->Manufacturer->__toString() ?>', 'SortByCommand="asset__asset_model_id__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM->Location->__toString() ?>', 'SortByCommand="asset__location_id__short_description ASC"', 'ReverseSortByCommand="asset__location_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Model Code', '<?=$_ITEM->AssetModel->AssetModelCode ?>', 'SortByCommand="asset__asset_model_id__asset_model_code"', 'ReverseSortByCommand="asset__asset_model_id__asset_model_code DESC"', 'CssClass="dtg_column"', 'Display="false"'));
      
      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		//Only add the custom field column if the role has authorization to view it.
      		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
      			$this->dtgAsset->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      		}
      	}
      }
      
      // Column to originally sort by (Asset Model)
      $this->dtgAsset->SortColumnIndex = 2;
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
      $this->lblAdvanced_Create();*/
				
	      	
			/*if (QApplication::QueryString('intAssetModelId')) {
				$this->lblAssetModelId->Text = QApplication::QueryString('intAssetModelId');
				$this->blnSearch = true;
			}*/
			// Mass Actions controls create
            $this->ctlAssetSearchTool_Create();
			$this->lblWarning_Create();
			$this->dlgMassEdit_Create();
			$this->dlgMassDelete_Create();
			$this->btnMassDelete_Create();
			$this->btnMassEdit_Create();
  	}
  	
		/*protected function dtgAsset_Bind() {
			
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
    }*/
  	
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
  	
  	// Create and Setup the Asset Search Composite Control
  	protected function ctlSearchMenu_Create() {
  		$this->ctlSearchMenu = new QAssetSearchComposite($this, null, false);
  	}
  	
  	/*protected function ctlAdvanced_Create() {
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this, 1);
  		$this->ctlAdvanced->Display = false;
  	}*/


		
		/*************************
		 *	CREATE INPUT METHODS
		*************************/
  	
/*  	protected function lstLocation_Create() {
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
	  	$this->txtAssetCode->Name = 'Asset Tag';
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
	  }*/
	  
	  /**************************
	   *	CREATE BUTTON METHODS
	  **************************/
		
	  /*protected function btnSearch_Create() {
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
	  }*/

/* THIS WAS ALREADY COMMENTED OUT BEFORE MOVING THIS TO A COMPOSITE CONTROL
    // This method (declared as public) will help with the checkbox column rendering
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
	  
/*	  protected function btnSearch_Click() {
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
	  }*/
		// Mass Actions controls creating/handling functions
		protected function dlgMassDelete_Create(){
			$this->dlgMassDelete = new QDialogBox($this);
			$this->dlgMassDelete->AutoRenderChildren = true;
			$this->dlgMassDelete->Width = '440px';
			$this->dlgMassDelete->Overflow = QOverflow::Auto;
			$this->dlgMassDelete->Padding = '10px';
			$this->dlgMassDelete->Display = false;
			$this->dlgMassDelete->BackColor = '#FFFFFF';
			$this->dlgMassDelete->MatteClickable = false;
			$this->dlgMassDelete->CssClass = "modal_dialog";
		}

		protected function dlgMassEdit_Create(){
			$this->dlgMassEdit = new QDialogBox($this, 'MassEdit');
			$this->dlgMassEdit->AutoRenderChildren = true;
			$this->dlgMassEdit->Width = '440px';
			$this->dlgMassEdit->Overflow = QOverflow::Auto;
			$this->dlgMassEdit->Padding = '10px';
			$this->dlgMassEdit->Display = false;
			$this->dlgMassEdit->BackColor = '#FFFFFF';
			$this->dlgMassEdit->MatteClickable = false;
			$this->dlgMassEdit->CssClass = "modal_dialog";
		}

		protected function btnMassDelete_Create(){
			$this->btnMassDelete = new QButton($this);
			$this->btnMassDelete->Name = "delete";
			$this->btnMassDelete->Text = "Delete";
			$this->btnMassDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to delete these items?'));
			$this->btnMassDelete->AddAction(new QClickEvent(), new QAjaxAction('btnMassDelete_Click'));
			$this->btnMassDelete->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassDelete_Click'));
			$this->btnMassDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnMassEdit_Create(){
			$this->btnMassEdit = new QButton($this);
			$this->btnMassEdit->Text = "edit";
			$this->btnMassEdit->Text = "Edit";
			$this->btnMassEdit->AddAction(new QClickEvent(), new  QAjaxAction('btnMassEdit_Click'));
			$this->btnMassEdit->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassEdit_Click'));
			$this->btnMassEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function lblWarning_Create(){
			$this->lblWarning = new QLabel($this);
			$this->lblWarning->Text = "";
			$this->lblWarning->CssClass = "warning";
		}

		protected function btnMassDelete_Click(){
			$items = $this->ctlSearchMenu->dtgAsset->getSelected('AssetId');
			if(count($items)>0){
				$this->lblWarning->Text = "";
				// TODO perform validate
                foreach($items as $item){
                    try {
                        // Get an instance of the database
                        $objDatabase = QApplication::$Database[1];
                        // Begin a MySQL Transaction to be either committed or rolled back
                        $objDatabase->TransactionBegin();
                        // ParentAssetId Field must be manually deleted because MySQL ON DELETE will not cascade to them
                        Asset::ResetParentAssetIdToNullByAssetId($item);
                        // Delete any audit scans of this asset
                        Asset::DeleteAuditScanByAssetId($item);
                        // Delete the asset
                        Asset::LoadByAssetId($item)->Delete();
                        $objDatabase->TransactionCommit();
                    }
                    catch (QMySqliDatabaseException $objExc) {
                        // Rollback the transaction
                        $objDatabase->TransactionRollback();
                        throw new QDatabaseException();
                    }
                }
			}else{
				$this->lblWarning->Text = "You haven't chosen any Asset to Delete" ;
			}
		}

		protected function btnMassEdit_Click(){
			$this->arrToEdit = $this->ctlSearchMenu->dtgAsset->getSelected('AssetId');
			if(count($this->arrToEdit)>0){
				$this->lblWarning->Text = "";
                if(!$this->pnlAssetMassEdit instanceof AssetMassEditPanel){
                    $this->pnlAssetMassEdit = new AssetMassEditPanel($this->dlgMassEdit,
                                                     'pnlAssetMassEditCancel_Click',
                                                      $this->arrToEdit);
                }
				$this->dlgMassEdit->ShowDialogBox();
                $this->UncheckAllItems($this);
			}else{
				$this->lblWarning->Text = "You haven't chosen any Asset to Edit" ;
			}
		}

		public function pnlAssetMassEditCancel_Click(){
			$this->dlgMassEdit->HideDialogBox();
		}

        public function lblIconParentAssetCode_Click() {
            // Uncheck all items but SelectAll checkbox
           // $this->UncheckAllItems($this->pnlAssetMassEdit->ctlAssetSearchTool);
            if($this->ctlAssetSearchTool instanceof QAssetSearchToolComposite){
                $this->ctlAssetSearchTool->Refresh();
                $this->ctlAssetSearchTool->btnAssetSearchToolAdd->Text = "Add Parent Asset";
                $this->ctlAssetSearchTool->dlgAssetSearchTool->ShowDialogBox();
                $this->dlgMassEdit->HideDialogBox();
            }
        }

        public function UncheckAllItems($object) {
            foreach ($object->GetAllControls() as $objControl) {
                if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
                    $objControl->Checked = false;
                }
            }
        }
        public function ctlAssetSearchTool_Create() {
            $this->ctlAssetSearchTool = new QAssetSearchToolComposite($this);
        }

        public function btnAssetSearchToolAdd_Click() {
            $this->ctlAssetSearchTool->lblWarning->Text = "";
            $intSelectedAssetId = $this->ctlAssetSearchTool->ctlAssetSearch->dtgAsset->GetSelected("AssetId");
            if (count($intSelectedAssetId) > 1) {
                $this->ctlAssetSearchTool->lblWarning->Text = "You must select only one parent asset.";
            }
            elseif (count($intSelectedAssetId) != 1) {
                $this->ctlAssetSearchTool->lblWarning->Text = "No selected assets.";
            }
            else {
                if (!($objParentAsset = Asset::LoadByAssetId($intSelectedAssetId[0]))) {
                    $this->ctlAssetSearchTool->lblWarning->Text = "That asset tag does not exist. Please try another.";

                }
                elseif (in_array($objParentAsset->AssetId, $this->arrToEdit)) {
                    $this->ctlAssetSearchTool->lblWarning->Text = "Parent asset tag must not be the same as asset tag. Please try another.";
                }
                else {
                    $this->pnlAssetMassEdit->txtParentAssetCode->Text = $objParentAsset->AssetCode;
                    //$this->UncheckAllItems($this);
                    $this->dlgMassEdit->ShowDialogBox();
                    $this->ctlAssetSearchTool->dlgAssetSearchTool->HideDialogBox();
                }
            }
            // Set properly checked/unchecked items
            if($this->pnlAssetMassEdit->chkParentAssetCode->Checked){
                $this->pnlAssetMassEdit->txtParentAssetCode->Enabled = true;
            }
            if($this->pnlAssetMassEdit->chkChkLockToParent->Checked){
                $this->pnlAssetMassEdit->chkLockToParent->Enabled = true;
            }
            if($this->pnlAssetMassEdit->chkModel->Checked){
                $this->pnlAssetMassEdit->lstModel->Enabled = true;
            }
            foreach($this->pnlAssetMassEdit->arrCustomFields as $field){
                if($this->pnlAssetMassEdit->arrCheckboxes[$field['input']->ControlId]->Checked) {
                    $field['input']->Enabled = true;
                }
            }


        }

    }

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/asset_edit.php.inc as the included HTML template file
	// AssetListForm::Run('AssetListForm', './Qcodo/assets/asset_list.php.inc');
	AssetListForm::Run('AssetListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/assets/asset_list.tpl.php');
?>