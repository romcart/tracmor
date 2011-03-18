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
	require_once(__FORMBASE_CLASSES__ . '/AssetModelListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the AssetModel class.  It extends from the code-generated
	 * abstract AssetModelListFormBase class.
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
	class AssetModelListForm extends AssetModelListFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// Advanced Label/Link
		protected $lblAdvanced;
		// Boolean that toggles Advanced Search display
		protected $blnAdvanced;
		// Advanced Search Composite control
		protected $ctlAdvanced;
		
		protected $lstCategory;
		protected $lstManufacturer;
		protected $txtDescription;
		protected $txtAssetModelCode;
		protected $arrCustomFields;
		protected $btnSearch;
		protected $btnClear;
		protected $blnSearch;
		protected $intCategoryId;
		protected $intManufacturerId;
		protected $strDescription;
		protected $strAssetModelCode;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;
		protected $blnAttachment;

		protected function Form_Create() {
			
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();			
			
			$this->dtgAssetModel = new QDataGrid($this);
			$this->dtgAssetModel->Name = 'asset_model_list';
      $this->dtgAssetModel->CellPadding = 5;
      $this->dtgAssetModel->CellSpacing = 0;
      $this->dtgAssetModel->CssClass = "datagrid";
      		
      // Disable AJAX for the datagrid
      $this->dtgAssetModel->UseAjax = false;
      
      // Allow for column toggling
      $this->dtgAssetModel->ShowColumnToggle = true;
      
      // Allow for CSV Export
      $this->dtgAssetModel->ShowExportCsv = true;

      // Enable Pagination
      $objPaginator = new QPaginator($this->dtgAssetModel);
      $this->dtgAssetModel->Paginator = $objPaginator;
      $this->dtgAssetModel->ItemsPerPage = QApplication::$TracmorSettings->SearchResultsPerPage;
      
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Assets', '<?= $_ITEM->__toStringWithAssetCountLink($_ITEM,"bluelink"); ?>', 'SortByCommand="asset_count ASC"', 'ReverseSortByCommand="asset_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Name', '<?= $_ITEM->__toStringWithLink($_ITEM,"bluelink"); ?>', 'SortByCommand="short_description ASC"', 'ReverseSortByCommand="short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Category', '<?= $_FORM->dtgAssetModel_Category_Render($_ITEM); ?>', 'SortByCommand="asset_model__category_id__short_description ASC"', 'ReverseSortByCommand="asset_model__category_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_FORM->dtgAssetModel_Manufacturer_Render($_ITEM); ?>', 'SortByCommand="asset_model__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="asset_model__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Asset Model Code', '<?= htmlentities(QString::Truncate($_ITEM->AssetModelCode, 200)); ?>', 'FontBold=true', 'SortByCommand="asset_model_code ASC"', 'ReverseSortByCommand="asset_model_code DESC"', 'CssClass="dtg_column"'));
      
      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::AssetModel, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		//Only add the custom field column if the role has authorization to view it.
      		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
      			$this->dtgAssetModel->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      		}
      	}
      }
      
      $this->dtgAssetModel->SortColumnIndex = 2;
    	$this->dtgAssetModel->SortDirection = 0;
      
      $objStyle = $this->dtgAssetModel->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgAssetModel->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgAssetModel->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
      
      $this->dtgAssetModel->SetDataBinder('dtgAssetModel_Bind');
      
      $this->lstCategory_Create();
      $this->lstManufacturer_Create();
      $this->txtDescription_Create();
      $this->txtAssetModelCode_Create();
      $this->btnSearch_Create();
      $this->btnClear_Create();
      $this->ctlAdvanced_Create();
      $this->lblAdvanced_Create();
  	}

		protected function dtgAssetModel_Bind() {
			
			if ($this->blnSearch) {
				$this->assignSearchValues();
			}
			
			$intCategoryId = $this->intCategoryId;
			$intManufacturerId = $this->intManufacturerId;
			$strDescription = $this->strDescription;
			$strAssetModelCode = $this->strAssetModelCode;
			$arrCustomFields = $this->arrCustomFields;
			$strDateModifiedFirst = $this->strDateModifiedFirst;
			$strDateModifiedLast = $this->strDateModifiedLast;
			$strDateModified = $this->strDateModified;
			$blnAttachment = $this->blnAttachment;
			
      $objExpansionMap[AssetModel::ExpandCategory] = true;
      $objExpansionMap[AssetModel::ExpandManufacturer] = true;
      
      // If the search form has been posted
      // if ($intCategoryId || $intManufacturerId || $strDescription || $strAssetModelCode) {
    	$this->dtgAssetModel->TotalItemCount = AssetModel::CountBySearchHelper($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $objExpansionMap);
			$this->dtgAssetModel->DataSource = AssetModel::LoadArrayBySearchHelper($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $this->dtgAssetModel->SortInfo, $this->dtgAssetModel->LimitInfo, $objExpansionMap);
			$this->blnSearch = false;
    }

  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}
  	
  	protected function ctlAdvanced_Create() {
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this, EntityQtype::AssetModel);
  		$this->ctlAdvanced->Display = false;
  	}

  	protected function lstCategory_Create() {
	  	$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = 'Category';
			$this->lstCategory->AddItem(new QListItem('- ALL -', null));
			$objCategoryArray = Category::LoadAllWithFlags(true, false, 'short_description');
			if ($objCategoryArray) {
				foreach ($objCategoryArray as $objCategory) {
					$this->lstCategory->AddItem(new QListItem($objCategory->ShortDescription, $objCategory->CategoryId));
				}
			}
			$this->lstCategory->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->lstCategory->AddAction(new QEnterKeyEvent(), new QTerminateAction());	
	  }
	  
	  protected function lstManufacturer_Create() {
      $this->lstManufacturer = new QListBox($this);
			$this->lstManufacturer->Name = 'Manufacturer';
			$this->lstManufacturer->AddItem(new QListItem('- ALL -', null));
			// foreach (Manufacturer::LoadAll('short_description') as $objManufacturer) {
			foreach (Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription))) as $objManufacturer) {
				$this->lstManufacturer->AddItem(new QListItem($objManufacturer->ShortDescription, $objManufacturer->ManufacturerId));
			}
      $this->lstManufacturer->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->lstManufacturer->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
	  }

	  protected function txtDescription_Create() {
	    $this->txtDescription = new QTextBox($this);
			$this->txtDescription->Name = 'Description';
      $this->txtDescription->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->txtDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  protected function txtAssetModelCode_Create() {
      $this->txtAssetModelCode = new QTextBox($this);
			$this->txtAssetModelCode->Name = 'Asset Model Code';
      $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());	  	
	  }
	  
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
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QServerAction('btnClear_Click'));
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
	  
	  protected function btnSearch_Click() {
	  	$this->blnSearch = true;
			$this->dtgAssetModel->PageNumber = 1;
	  }
	  
	  protected function btnClear_Click() {
	  	// Clear out the input values
	  	$this->lstCategory->SelectedIndex = 0;
	  	$this->lstManufacturer->SelectedIndex = 0;
	  	$this->txtDescription->Text = '';
	  	$this->txtAssetModelCode->Text = '';
	  	$this->ctlAdvanced->ClearControls();
	  	
	  	$this->intCategoryId = null;
	  	$this->intManufacturerId = null;
	  	$this->strDescription = null;
	  	$this->strAssetModelCode = null;
	  	$this->strDateModified = null;
	  	$this->strDateModifiedFirst = null;
	  	$this->strDateModifiedLast = null;
	  	$this->blnAttachment = false;
	  	if ($this->arrCustomFields) {
		  		foreach ($this->arrCustomFields as $field) {
		  			$field['value'] = null;
		  		}
		  	}
	  	
	  	// Assign the class variables the null values
			$this->assignSearchValues();
			$this->dtgAssetModel->PageNumber = 1;			
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
			$this->strDescription = $this->txtDescription->Text;
			$this->strAssetModelCode = $this->txtAssetModelCode->Text;
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
	// generated/asset_model_edit.php.inc as the included HTML template file
	AssetModelListForm::Run('AssetModelListForm', 'asset_model_list.tpl.php');
?>
