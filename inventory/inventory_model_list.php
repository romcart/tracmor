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
	QApplication::Authenticate(3);
	require_once(__FORMBASE_CLASSES__ . '/InventoryModelListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the InventoryModel class.  It extends from the code-generated
	 * abstract InventoryModelListFormBase class.
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
	class InventoryModelListForm extends InventoryModelListFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;		
		
		// Basic Inputs
		protected $lstCategory;
		protected $lstManufacturer;
		protected $lstLocation;
		protected $txtShortDescription;
		protected $txtInventoryModelCode;
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
		protected $intInventoryModelId;
		protected $strShortDescription;
		protected $strInventoryModelCode;
		protected $intCategoryId;
		protected $intManufacturerId;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;
		
		protected function Form_Create() {
			
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();			
			
			$this->dtgInventoryModel = new QDataGrid($this);
			$this->dtgInventoryModel->Name = 'inventory_model_list';
  		$this->dtgInventoryModel->CellPadding = 5;
  		$this->dtgInventoryModel->CellSpacing = 0;
  		$this->dtgInventoryModel->CssClass = "datagrid";
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgInventoryModel->UseAjax = true;
      
      // Allow for column toggling
      $this->dtgInventoryModel->ShowColumnToggle = true;
      
      // Allow for CSV Export
      $this->dtgInventoryModel->ShowExportCsv = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgInventoryModel);
      $this->dtgInventoryModel->Paginator = $objPaginator;
      $this->dtgInventoryModel->ItemsPerPage = 20;
          
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Inventory Code', '<?= $_ITEM->__toStringWithLink("bluelink"); ?>', 'SortByCommand="inventory_model_code ASC"', 'ReverseSortByCommand="inventory_model_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Model', '<?= $_ITEM->ShortDescription ?>', 'Width=200', 'SortByCommand="short_description ASC"', 'ReverseSortByCommand="short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM->Category->__toString(); ?>', 'SortByCommand="inventory_model__category_id__short_description ASC"', 'ReverseSortByCommand="inventory_model__category_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->Manufacturer->__toString(); ?>', 'SortByCommand="inventory_model__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="inventory_model__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Quantity', '<?= $_ITEM->__toStringQuantity(); ?>', 'SortByCommand="inventory_model_quantity ASC"', 'ReverseSortByCommand="inventory_model_quantity DESC"', 'CssClass="dtg_column"'));
      
      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		$this->dtgInventoryModel->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      	}
      }

      $this->dtgInventoryModel->SortColumnIndex = 1;
    	$this->dtgInventoryModel->SortDirection = 0;
      
      $objStyle = $this->dtgInventoryModel->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgInventoryModel->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgInventoryModel->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
      
      $this->dtgInventoryModel->SetDataBinder('dtgInventoryModel_Bind');
      
      $this->lstCategory_Create();
      $this->lstManufacturer_Create();
      $this->lstLocation_Create();
      $this->txtShortDescription_Create();
      $this->txtInventoryModelCode_Create();
      $this->btnSearch_Create();
      $this->btnClear_Create();
      $this->ctlAdvanced_Create();
      $this->lblAdvanced_Create();
  	}
  	
		protected function dtgInventoryModel_Bind() {
			
			// If the search button has been pressed
			if ($this->blnSearch) {
				$this->assignSearchValues();
			}
			
			$strInventoryModelCode = $this->strInventoryModelCode;
			$intLocationId = $this->intLocationId;
			$intInventoryModelId = $this->intInventoryModelId;
			$intCategoryId = $this->intCategoryId;
			$intManufacturerId = $this->intManufacturerId;
			$strShortDescription = $this->strShortDescription;
			$strDateModifiedFirst = $this->strDateModifiedFirst;
			$strDateModifiedLast = $this->strDateModifiedLast;
			$strDateModified = $this->strDateModified;
			$arrCustomFields = $this->arrCustomFields;
					
			// Enable Profiling
      // QApplication::$Database[1]->EnableProfiling();
      

      // Expand the Asset object to include the AssetModel, Category, Manufacturer, and Location Objects
      $objExpansionMap[InventoryModel::ExpandCategory] = true;
      $objExpansionMap[InventoryModel::ExpandManufacturer] = true;

      // If the search form has been posted
			$this->dtgInventoryModel->TotalItemCount = InventoryModel::CountBySearch($strInventoryModelCode, $intLocationId, $intInventoryModelId, $intCategoryId, $intManufacturerId, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $objExpansionMap);
			if ($this->dtgInventoryModel->TotalItemCount == 0) {
				$this->dtgInventoryModel->ShowHeader = false;
			}
			else {
				$this->dtgInventoryModel->ShowHeader = true;
				$this->dtgInventoryModel->DataSource = InventoryModel::LoadArrayBySearch($strInventoryModelCode, $intLocationId, $intInventoryModelId, $intCategoryId, $intManufacturerId, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $this->dtgInventoryModel->SortInfo, $this->dtgInventoryModel->LimitInfo, $objExpansionMap);
			}
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
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this, 2);
  		$this->ctlAdvanced->Display = false;
  	}

		/*************************
		 *	CREATE INPUT METHODS
		*************************/
  	
  	protected function lstLocation_Create() {
  		$this->lstLocation = new QListBox($this);
  		$this->lstLocation->Name = 'Location';
  		$this->lstLocation->AddItem('- ALL -', null);
  		foreach (Location::LoadAllLocations(false, false, 'short_description') as $objLocation) {
  			$this->lstLocation->AddItem($objLocation->ShortDescription, $objLocation->LocationId);
  		}
      $this->lstLocation->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
      $this->lstLocation->AddAction(new QEnterKeyEvent(), new QTerminateAction());  		
  	}

	  protected function lstCategory_Create() {
	  	$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = 'Category';
			$this->lstCategory->AddItem('- ALL -', null);
			foreach (Category::LoadAllWithFlags(false, true, 'short_description') as $objCategory) {
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
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  protected function txtInventoryModelCode_Create() {
	  	$this->txtInventoryModelCode = new QTextBox($this);
	  	$this->txtInventoryModelCode->Name = 'Inventory Code';
	  	$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
	  	$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  /**************************
	   *	CREATE BUTTON METHODS
	  **************************/
		
	  protected function btnSearch_Create() {
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Name = 'search';
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  protected function btnClear_Create() {
	  	$this->btnClear = new QButton($this);
			$this->btnClear->Name = 'clear';
			$this->btnClear->Text = 'Clear';
			$this->btnClear->AddAction(new QClickEvent(), new QAjaxAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnClear_Click'));
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
			$this->dtgInventoryModel->PageNumber = 1;
	  }

	  protected function btnClear_Click() {
  		// Set controls to null
	  	$this->lstCategory->SelectedIndex = 0;
	  	$this->lstManufacturer->SelectedIndex = 0;
	  	$this->txtShortDescription->Text = '';
	  	$this->txtInventoryModelCode->Text = '';
	  	$this->lstLocation->SelectedIndex = 0;
	  	$this->ctlAdvanced->ClearControls();
	  	
	  	// Set search variables to null
	  	$this->intCategoryId = null;
	  	$this->intManufacturerId = null;
	  	$this->intLocationId = null;
	  	$this->intInventoryModelId = null;
	  	$this->strShortDescription = null;
	  	$this->strInventoryModelCode = null;
	  	$this->strDateModified = null;
	  	$this->strDateModifiedFirst = null;
	  	$this->strDateModifiedLast = null;
	  	if ($this->arrCustomFields) {
	  		foreach ($this->arrCustomFields as $field) {
	  			$field['value'] = null;
	  		}
	  	}
	  	$this->blnSearch = false;
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
			$this->strInventoryModelCode = $this->txtInventoryModelCode->Text;
			$this->intLocationId = $this->lstLocation->SelectedValue;
			$this->intInventoryModelId = QApplication::QueryString('intInventoryModelId');
			$this->strDateModified = $this->ctlAdvanced->DateModified;
			$this->strDateModifiedFirst = $this->ctlAdvanced->DateModifiedFirst;
			$this->strDateModifiedLast = $this->ctlAdvanced->DateModifiedLast;
			
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
	// generated/inventory_model_edit.php.inc as the included HTML template file
	InventoryModelListForm::Run('InventoryModelListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/inventory/inventory_model_list.tpl.php');
?>