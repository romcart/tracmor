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
	QApplication::Authenticate(5);
	require_once(__FORMBASE_CLASSES__ . '/ShipmentListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Shipment class.  It extends from the code-generated
	 * abstract ShipmentListFormBase class.
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
	class ShipmentListForm extends ShipmentListFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;		

		// Basic Inputs
		protected $txtToCompany;
		protected $txtToContact;
		protected $txtShipmentNumber;
		protected $txtAssetCode;
		protected $txtInventoryModelCode;
		protected $lstStatus;
		
		/// Buttons
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
		protected $strToCompany;
		protected $strToContact;
		protected $strShipmentNumber;
		protected $strAssetCode;
		protected $strInventoryModelCode;
		protected $intStatus;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;
		
		// HoverTip Arrays
		public $objAssetTransactionArray;
		public $objInventoryTransactionArray;
		

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			$this->txtToCompany_Create();
			$this->txtToContact_Create();
			$this->txtShipmentNumber_Create();
			$this->txtAssetCode_Create();
			$this->txtInventoryModelCode_Create();
			$this->lstStatus_Create();
			$this->btnSearch_Create();
			$this->btnClear_Create();
			$this->lblAdvanced_Create();
			$this->ctlAdvanced_Create();
			$this->dtgShipment_Create();
		}
		
		protected function Form_PreRender() {
			
			// Assing the class member values from the search form inputs
			if ($this->blnSearch) {
				$this->assignSearchValues();
			}			
			
			// Assign local method variables
			$strToCompany = $this->strToCompany;
			$strToContact = $this->strToContact;
			$strShipmentNumber = $this->strShipmentNumber;
			$strAssetCode = $this->strAssetCode;
			$strInventoryModelCode = $this->strInventoryModelCode;
			$intStatus = $this->intStatus;
			$strDateModifiedFirst = $this->strDateModifiedFirst;
			$strDateModifiedLast = $this->strDateModifiedLast;
			$strDateModified = $this->strDateModified;
			
			// Expand to include the primary address, State/Province, and Country
			$objExpansionMap[Shipment::ExpandToCompany] = true;
			$objExpansionMap[Shipment::ExpandToContact] = true;
			$objExpansionMap[Shipment::ExpandToAddress] = true;
			$objExpansionMap[Shipment::ExpandCreatedByObject] = true;
			
			// QApplication::$Database[1]->EnableProfiling();
			
			$this->dtgShipment->TotalItemCount = Shipment::CountBySearch($strToCompany, $strToContact, $strShipmentNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $objExpansionMap);
			if ($this->dtgShipment->TotalItemCount == 0) {
				$this->dtgShipment->ShowHeader = false;
			}
			else {
				$this->dtgShipment->DataSource = Shipment::LoadArrayBySearch($strToCompany, $strToContact, $strShipmentNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $this->dtgShipment->SortInfo, $this->dtgShipment->LimitInfo, $objExpansionMap);
				$this->dtgShipment->ShowHeader = true;
			}
			$this->blnSearch = false;
		}
		
		// protected function Form_Exit() {
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
		
		protected function txtToCompany_Create() {
			$this->txtToCompany = new QTextBox($this);
			$this->txtToCompany->Name = 'Ship to Company';
			$this->txtToCompany->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->txtToCompany->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function txtToContact_Create() {
			$this->txtToContact = new QTextBox($this);
			$this->txtToContact->Name = 'Ship to Contact';
			$this->txtToContact->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->txtToContact->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function txtShipmentNumber_Create() {
			$this->txtShipmentNumber = new QTextBox($this);
			$this->txtShipmentNumber->Name = 'Shipment Number';
			$this->txtShipmentNumber->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->txtShipmentNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function txtAssetCode_Create() {
			$this->txtAssetCode = new QTextBox($this);
			$this->txtAssetCode->Name = 'Asset Code';
			$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function txtInventoryModelCode_Create() {
			$this->txtInventoryModelCode = new QTextBox($this);
			$this->txtInventoryModelCode->Name = 'Inventory Code';
			$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function lstStatus_Create() {
			$this->lstStatus = new QListBox($this);
			$this->lstStatus->Name = 'Status';
			$this->lstStatus->AddItem('- Select One -', null);
			$this->lstStatus->AddItem('Pending', 1);
			$this->lstStatus->AddItem('Shipped', 2);
			$this->lstStatus->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->lstStatus->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
	  /**************************
	   *	CREATE BUTTON METHODS
	  **************************/
		
	  // Create the Search Button
	  protected function btnSearch_Create() {
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Name = 'search';
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  // Create the Clear Button
	  protected function btnClear_Create() {
	  	$this->btnClear = new QButton($this);
			$this->btnClear->Name = 'clear';
			$this->btnClear->Text = 'Clear';
			$this->btnClear->AddAction(new QClickEvent(), new QAjaxAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
	  }
	  
	  // Create the 'Advanced Search' Label
	  protected function lblAdvanced_Create() {
	  	$this->lblAdvanced = new QLabel($this);
	  	$this->lblAdvanced->Name = 'Advanced';
	  	$this->lblAdvanced->Text = 'Advanced Search';
	  	$this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblAdvanced_Click'));
	  	$this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
	  	$this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
	  }
	  
	  // Create the Advanced Search Composite Control
  	protected function ctlAdvanced_Create() {
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this);
  		$this->ctlAdvanced->Display = false;
  	}
	  
	  // Create the Shipment datagrid
  	protected function dtgShipment_Create() {
			$this->dtgShipment = new QDataGrid($this);
  		$this->dtgShipment->CellPadding = 5;
  		$this->dtgShipment->CellSpacing = 0;
  		$this->dtgShipment->CssClass = "datagrid";
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgShipment->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgShipment);
      $this->dtgShipment->Paginator = $objPaginator;
      $this->dtgShipment->ItemsPerPage = 20;
          
      $this->dtgShipment->AddColumn(new QDataGridColumn('Shipment Number', '<?= $_ITEM->__toStringWithLink("bluelink") ?> <?= $_ITEM->__toStringHoverTips($_CONTROL) ?>', 'SortByCommand="shipment_number ASC"', 'ReverseSortByCommand="shipment_number DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgShipment->AddColumn(new QDataGridColumn('Ship to Company', '<?= $_ITEM->ToCompany->__toString() ?>', 'Width=200', 'SortByCommand="shipment__to_company_id__short_description ASC"', 'ReverseSortByCommand="shipment__to_company_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgShipment->AddColumn(new QDataGridColumn('Ship to Contact', '<?= $_ITEM->ToContact->__toString() ?>', 'SortByCommand="shipment__to_contact_id__last_name ASC"', 'ReverseSortByCommand="shipment__to_contact_id__last_name DESC"', 'CssClass="dtg_column"'));
      $this->dtgShipment->AddColumn(new QDataGridColumn('Ship to Address', '<?= $_ITEM->ToAddress->__toString() ?>', 'SortByCommand="shipment__to_address_id__short_description ASC"', 'ReverseSortByCommand="shipment__to_address_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgShipment->AddColumn(new QDataGridColumn('Scheduled By', '<?= $_ITEM->CreatedByObject->__toString() ?>', 'SortByCommand="shipment__created_by__last_name ASC"', 'ReverseSortByCommand="shipment__created_by__last_name DESC"', 'CssClass="dtg_column"'));
      $this->dtgShipment->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->__toStringStatusStyled() ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgShipment->AddColumn(new QDataGridColumn('Tracking', '<?= $_ITEM->__toStringTrackingNumber() ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      
      
      $this->dtgShipment->SortColumnIndex = 0;
    	$this->dtgShipment->SortDirection = 1;
      
      $objStyle = $this->dtgShipment->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgShipment->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgShipment->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  		
  	}
  	
	  protected function btnSearch_Click() {
	  	$this->blnSearch = true;
			$this->dtgShipment->PageNumber = 1;
	  }
	  
	  protected function btnClear_Click() {

  		// Set controls to null
	  	$this->txtToCompany->Text = '';
	  	$this->txtToContact->Text = '';
	  	$this->txtShipmentNumber->Text = '';
	  	$this->txtAssetCode->Text = '';
	  	$this->txtInventoryModelCode->Text = '';
	  	$this->lstStatus->SelectedIndex = 0;
	  	$this->ctlAdvanced->ClearControls();
	  	
	  	// Set search variables to null
	  	$this->strToCompany = null;
	  	$this->strToContact = null;
	  	$this->strShipmentNumber = null;
	  	$this->strAssetCode = null;
	  	$this->strInventoryModelCode = null;
	  	$this->intStatus = null;
	  	$this->strDateModified = null;
	  	$this->strDateModifiedFirst = null;
	  	$this->strDateModifiedLast = null;
	  	$this->blnSearch = false;
  	}
  	
  	// Display or hide the Advanced Search Composite Control
	  protected function lblAdvanced_Click() {
	  	if ($this->blnAdvanced) {
	  		$this->blnAdvanced = false;
	  		$this->lblAdvanced->Text = 'Advanced Search';
	  		
	  		$this->ctlAdvanced->Display = false;
	  		$this->ctlAdvanced->ClearControls();
	  	}
	  	else {
	  		$this->blnAdvanced = true;
	  		$this->lblAdvanced->Text = 'Hide Advanced';
	  		$this->ctlAdvanced->Display = true;
	  	}
	  }

	  // Assign the search variables values from the form inputs
	  protected function assignSearchValues() {
	  	
	  	$this->strToCompany = $this->txtToCompany->Text;
	  	$this->strToContact = $this->txtToContact->Text;
	  	$this->strShipmentNumber = $this->txtShipmentNumber->Text;
	  	$this->strAssetCode = $this->txtAssetCode->Text;
	  	$this->strInventoryModelCode = $this->txtInventoryModelCode->Text;
	  	$this->intStatus = $this->lstStatus->SelectedValue;
			$this->strDateModified = $this->ctlAdvanced->DateModified;
			$this->strDateModifiedFirst = $this->ctlAdvanced->DateModifiedFirst;
			$this->strDateModifiedLast = $this->ctlAdvanced->DateModifiedLast;
	  }
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/shipment_edit.php.inc as the included HTML template file
	ShipmentListForm::Run('ShipmentListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/shipping/shipment_list.tpl.php');
?>