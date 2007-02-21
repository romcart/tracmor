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

class QInventoryEditComposite extends QControl {
	
	public $objInventoryModel;
	public $strTitleVerb;
	public $blnEditMode;
	public $objParentObject;
	
	// Labels
	protected $lblShortDescription;
	protected $lblHeaderInventoryModelCode;
	protected $lblInventoryModelCode;
	protected $lblManufacturer;
	protected $lblCategory;
	protected $lblTotalQuantity;
	protected $lblCreationDate;
	protected $lblModifiedDate;
	public $lblShipmentReceipt;
	
	protected $pnlLongDescription;
	
	// Inputs
	protected $txtShortDescription;
	protected $lstCategory;
	protected $lstManufacturer;
	protected $txtLongDescription;
	protected $txtInventoryModelCode;
	
	// Buttons
	protected $btnSave;
	protected $btnDelete;
	protected $btnEdit;
	protected $btnCancel;		
	protected $btnMove;
	protected $btnTakeOut;
	protected $btnRestock;
	protected $btnShip;
	protected $btnReceive;

	// Quantities By Location Datagrid
	public $dtgInventoryQuantities;
	
	// Transaction History Datagrid
	public $dtgInventoryTransaction;
	public $dtgShipmentReceipt;
	
	// Custom Field Objects
	// protected $objCustomFieldArray;
	// Array of Custom Field inputs and labels
	protected $arrCustomFields;
	
	// We want to override the constructor in order to setup the subcontrols
	public function __construct($objParentObject, $strControlId = null) {
		
	    // First, call the parent to do most of the basic setup
    try {
        parent::__construct($objParentObject, $strControlId);
    } catch (QCallerException $objExc) {
        $objExc->IncrementOffset();
        throw $objExc;
    }
    
    // Assign the parent object (InventoryModelEditForm from inventory_edit.php)
    $this->objParentObject = $objParentObject;
    $this->objParentObject->SetupInventoryModel($this);
    
    // Create Labels
		$this->lblShortDescription_Create();
		$this->lblHeaderInventoryModelCode_Create();
		$this->lblCategory_Create();
		$this->lblManufacturer_Create();
		$this->lblInventoryModelCode_Create();
		$this->lblTotalQuantity_Create();
		$this->lblCreationDate_Create();
		$this->lblModifiedDate_Create();
		$this->pnlLongDescription_Create();
		$this->UpdateInventoryLabels();
		
		// Create Inputs
		$this->txtShortDescription_Create();
		$this->lstCategory_Create();
		$this->lstManufacturer_Create();
		$this->txtInventoryModelCode_Create();
		$this->txtLongDescription_Create();
		$this->UpdateInventoryControls();

		// Create all custom inventory fields
		$this->customFields_Create();
				
		// Create Buttons
		$this->btnSave_Create();
		$this->btnDelete_Create();
		$this->btnEdit_Create();
		$this->btnCancel_Create();
		// Only create transaction buttons if editing an existing inventory model
		if ($this->blnEditMode) {
			$this->btnMove_Create();
			$this->btnTakeOut_Create();
			$this->btnRestock_Create();
			$this->btnShip_Create();
			$this->btnReceive_Create();
			$this->EnableTransactionButtons();
		}
		
		// Display labels for the existing inventory model
		if ($this->blnEditMode) {
			// Create the Quantities by Location datagrid
			$this->dtgInventoryQuantities_Create();
			// Create the transaction history datagrid
			$this->dtgInventoryTransaction_Create();
			$this->lblShipmentReceipt_Create();
			$this->dtgShipmentReceipt_Create();
			// Display Labels
			$this->displayLabels();
		}
		// Display empty inputs to create a new inventory model
		else {
			$this->displayInputs();
		}
	}
	
	// Every composite control must have this function declared
	public function ParsePostData() {}
	
	public function GetJavaScriptAction() {return "onchange";}	
	
	public function Validate() {return true;}
	
	protected function GetControlHtml() {
		
		$strStyle = $this->GetStyleAttributes();
		if ($strStyle) {
			$strStyle = sprintf('style="%s"', $strStyle);
		}
		$strAttributes = $this->GetAttributes();

		// Store the Output Buffer locally
		$strAlreadyRendered = ob_get_contents();
		ob_clean();

		// Evaluate the template
		require('inventory_edit_control.inc.php');
		$strTemplateEvaluated = ob_get_contents();
		ob_clean();

		// Restore the output buffer and return evaluated template
		print($strAlreadyRendered);
		
		$strToReturn =  sprintf('<span id="%s" %s%s>%s</span>',
		$this->strControlId,
		$strStyle,
		$strAttributes,
		$strTemplateEvaluated);
		
		return $strToReturn;		
	}
	
	// Generate tab indexes
	protected $intNextTabIndex = 1;
	protected function getNextTabIndex() {
		return ++$this->intNextTabIndex;
	}
		
	// Create all Custom Fields
	protected function customFields_Create() {
		
		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
		$this->objInventoryModel->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, $this->blnEditMode, $this->objInventoryModel->InventoryModelId);
		
		// Create the Custom Field Controls - labels and inputs (text or list) for each
		$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objInventoryModel->objCustomFieldArray, $this->blnEditMode, $this, true, true);
	
		foreach ($this->arrCustomFields as $objCustomField) {
			$objCustomField['input']->TabIndex=$this->GetNextTabIndex();
		}
	}
	
	// Create Short Description Label
	protected function lblShortDescription_Create() {
		$this->lblShortDescription = new QLabel($this);
		$this->lblShortDescription->Name = 'Inventory Model';
	}
	
	protected function lblHeaderInventoryModelCode_Create() {
		$this->lblHeaderInventoryModelCode = new QLabel($this);
	}
	
	// Create Category Label
	protected function lblCategory_Create() {
		$this->lblCategory = new QLabel($this);
		$this->lblCategory->Name = 'Category';
	}
	
	// Create Manufacturer Label
	protected function lblManufacturer_Create() {
		$this->lblManufacturer = new QLabel($this);
		$this->lblManufacturer->Name = 'Manufacturer';
	}
	
	// Create Inventory Model Code Label
	protected function lblInventoryModelCode_Create() {
		$this->lblInventoryModelCode = new QLabel($this);
		$this->lblInventoryModelCode->Name = 'Inventory Code';
	}
	
	// Create Long Description Panel
	protected function pnlLongDescription_Create() {
		$this->pnlLongDescription = new QPanel($this);
		$this->pnlLongDescription->CssClass='scrollBox';
		$this->pnlLongDescription->Name = 'Long Description';
	}
	
	// Create Total Quantity Label
	protected function lblTotalQuantity_Create() {
		$this->lblTotalQuantity = new QLabel($this);
		$this->lblTotalQuantity->Name = 'Quantity';
	}
	
	// Create the Creation Date Label
	protected function lblCreationDate_Create() {
		$this->lblCreationDate = new QLabel($this);
		$this->lblCreationDate->Name = 'Date Created';
		if ($this->blnEditMode) {
			$this->lblCreationDate->Text = $this->objInventoryModel->CreationDate->PHPDate('Y-m-d H:i:s') . ' by ' . $this->objInventoryModel->CreatedByObject->__toStringFullName();
		}
		else {
			$this->lblCreationDate->Visible = false;
		}
	}
	
	// Create the Modified Date Label
	protected function lblModifiedDate_Create() {
		$this->lblModifiedDate = new QLabel($this);
		$this->lblModifiedDate->Name = 'Last Modified';
		if (!$this->blnEditMode) {
			$this->lblModifiedDate->Visible = false;
		}
	}
	
	// Create the Short Description Input
	protected function txtShortDescription_Create() {
		$this->txtShortDescription = new QTextBox($this);
		$this->txtShortDescription->Name = 'Inventory Model';
		$this->txtShortDescription->Required = true;
		$this->txtShortDescription->CausesValidation = true;
		$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtShortDescription->TabIndex=1;
		$this->intNextTabIndex++;
		QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->txtShortDescription->ControlId));
	}
	
	// Create the Catetgory Input
	protected function lstCategory_Create() {
		$this->lstCategory = new QListBox($this);
		$this->lstCategory->Name = QApplication::Translate('Category');
		$this->lstCategory->Required = true;
		if (!$this->blnEditMode)
			$this->lstCategory->AddItem('- Select One -', null);
		$objCategoryArray = Category::LoadAllWithFlags(false, true);
		if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
			$objListItem = new QListItem($objCategory->__toString(), $objCategory->CategoryId);
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
		$objManufacturerArray = Manufacturer::LoadAll();
		if ($objManufacturerArray) foreach ($objManufacturerArray as $objManufacturer) {
			$objListItem = new QListItem($objManufacturer->__toString(), $objManufacturer->ManufacturerId);
			$this->lstManufacturer->AddItem($objListItem);
		}
		$this->lstManufacturer->TabIndex=3;
		$this->intNextTabIndex++;
	}
	
	// Create and Setup txtLongDescription
	protected function txtLongDescription_Create() {
		$this->txtLongDescription = new QTextBox($this);
		$this->txtLongDescription->Name = QApplication::Translate('Long Description');
		$this->txtLongDescription->TextMode = QTextMode::MultiLine;
		$this->txtLongDescription->TabIndex=5;
		$this->intNextTabIndex++;
	}
	
	// Create and Setup txtInventoryModelCode
	protected function txtInventoryModelCode_Create() {
		$this->txtInventoryModelCode = new QTextBox($this);
		$this->txtInventoryModelCode->Name = QApplication::Translate('Inventory Model Code');
		$this->txtInventoryModelCode->Required = true;
		$this->txtInventoryModelCode->CausesValidation = true;
		$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtInventoryModelCode->TabIndex=4;
		$this->intNextTabIndex++;
	}
	
	// Setup Edit Button
	protected function btnEdit_Create() {
		$this->btnEdit = new QButton($this);
		$this->btnEdit->Text = 'Edit';
		$this->btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEdit_Click'));
		$this->btnEdit->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnEdit_Click'));
		$this->btnEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnEdit->CausesValidation = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnEdit, 2);
	}
	
  // Setup Save Button
	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnSave->CausesValidation = true;
		$this->btnSave->TabIndex=$this->GetNextTabIndex();
	}
	
	// Setup Cancel Button
	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnCancel->CausesValidation = false;
	}			
	
	// Setup Delete Button
	protected function btnDelete_Create() {
		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = QApplication::Translate('Delete');
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Inventory')));
		$this->btnDelete->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Inventory')));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnDelete->CausesValidation = false;
		if (!$this->blnEditMode)
			$this->btnDelete->Visible = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnDelete, 3);			
	}
	
	// Setup Move Button
	protected function btnMove_Create() {
		$this->btnMove = new QButton($this);
		$this->btnMove->Text = 'Move';
		$this->btnMove->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnMove_Click'));
		$this->btnMove->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnMove_Click'));
		$this->btnMove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnMove->CausesValidation = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnMove, 2);		
	}
	
	// Setup Take Out Button
	protected function btnTakeOut_Create() {
		$this->btnTakeOut = new QButton($this);
		$this->btnTakeOut->Text = 'Take Out';
		$this->btnTakeOut->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnTakeOut_Click'));
		$this->btnTakeOut->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnTakeOut_Click'));
		$this->btnTakeOut->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnTakeOut->CausesValidation = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnTakeOut, 2);
	}
	
	// Setup Take Out Button
	protected function btnRestock_Create() {
		$this->btnRestock = new QButton($this);
		$this->btnRestock->Text = 'Restock';
		$this->btnRestock->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRestock_Click'));
		$this->btnRestock->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnRestock_Click'));
		$this->btnRestock->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnRestock->CausesValidation = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnRestock, 2);		
	}
	
	// Setup Ship Button
	protected function btnShip_Create() {
		$this->btnShip = new QButton($this);
		$this->btnShip->Text = 'Ship';
		$this->btnShip->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnShip_Click'));
		$this->btnShip->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnShip_Click'));
		$this->btnShip->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnShip->CausesValidation = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnShip, 2);
	}
	
	// Setup Receive Button
	protected function btnReceive_Create() {
		$this->btnReceive = new QButton($this);
		$this->btnReceive->Text = 'Receive';
		$this->btnReceive->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnReceive_Click'));
		$this->btnReceive->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnReceive_Click'));
		$this->btnReceive->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnReceive->CausesValidation = false;
		QApplication::AuthorizeControl($this->objInventoryModel, $this->btnReceive, 2);
	}
	
	protected function dtgInventoryQuantities_Create() {
		$this->dtgInventoryQuantities = new QDataGrid($this);
		$this->dtgInventoryQuantities->Name = 'Quantities By Location';
		$this->dtgInventoryQuantities->CellPadding = 5;
		$this->dtgInventoryQuantities->CellSpacing = 0;
		$this->dtgInventoryQuantities->CssClass = "datagrid";
		
    // Enable AJAX - this won't work while using the DB profiler
    $this->dtgInventoryQuantities->UseAjax = true;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgInventoryQuantities);
    $this->dtgInventoryQuantities->Paginator = $objPaginator;
    $this->dtgInventoryQuantities->ItemsPerPage = 10;
    
    $this->dtgInventoryQuantities->AddColumn(new QDataGridColumn('Location', '<?= $_ITEM->Location->__toString() ?>', 'SortByCommand="inventory_location__location_id__short_description ASC"', 'ReverseSortByCommand="inventory_location__location_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgInventoryQuantities->AddColumn(new QDataGridColumn('Quantity', '<?= $_ITEM->Quantity ?>', 'SortByCommand="quantity ASC"', 'ReverseSortByCommand="quantity DESC"', 'CssClass="dtg_column"'));
    
    $objStyle = $this->dtgInventoryQuantities->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgInventoryQuantities->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgInventoryQuantities->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';		
	}	
	
	protected function dtgInventoryTransaction_Create() {
		$this->dtgInventoryTransaction = new QDataGrid($this);
		$this->dtgInventoryTransaction->Name = 'Transaction History';
		$this->dtgInventoryTransaction->CellPadding = 5;
		$this->dtgInventoryTransaction->CellSpacing = 0;
		$this->dtgInventoryTransaction->CssClass = "datagrid";
		
    // Enable AJAX - this won't work while using the DB profiler
    $this->dtgInventoryTransaction->UseAjax = true;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgInventoryTransaction);
    $this->dtgInventoryTransaction->Paginator = $objPaginator;
    $this->dtgInventoryTransaction->ItemsPerPage = 20;

    $this->dtgInventoryTransaction->AddColumn(new QDataGridColumn('Transaction Type', '<?= $_ITEM->Transaction->__toStringWithLink() ?>',  array('OrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->Transaction->TransactionType->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->Transaction->TransactionType->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgInventoryTransaction->AddColumn(new QDataGridColumn('Quantity', '<?= $_ITEM->Quantity ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->Quantity), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->Quantity, false), 'CssClass' => "dtg_column")));
    $this->dtgInventoryTransaction->AddColumn(new QDataGridColumn('From', '<?= $_ITEM->__toStringSourceLocation() ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->SourceLocation->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->SourceLocation->ShortDescription, false), 'CssClass' => "dtg_column")));
    $this->dtgInventoryTransaction->AddColumn(new QDataGridColumn('To', '<?= $_ITEM->__toStringDestinationLocation() ?>', array('OrderByClause' => QQ::Orderby(QQN::InventoryTransaction()->DestinationLocation->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->DestinationLocation->ShortDescription, false), 'CssClass' => "dtg_column")));
    $this->dtgInventoryTransaction->AddColumn(new QDataGridColumn('User', '<?= $_ITEM->Transaction->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::Orderby(QQN::InventoryTransaction()->CreatedByObject->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->CreatedByObject->LastName, false), 'CssClass' => "dtg_column")));
    $this->dtgInventoryTransaction->AddColumn(new QDataGridColumn('Date', '<?= $_ITEM->Transaction->CreationDate->PHPDate("Y-m-d H:i:s"); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->Transaction->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryTransaction()->Transaction->CreationDate, false), 'CssClass' => "dtg_column")));
    
    $this->dtgInventoryTransaction->SortColumnIndex = 5;
    $this->dtgInventoryTransaction->SortDirection = 1;
    
    $objStyle = $this->dtgInventoryTransaction->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgInventoryTransaction->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgInventoryTransaction->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';		
	}
	
	protected function lblShipmentReceipt_Create() {
		$this->lblShipmentReceipt = new QLabel($this);
		$this->lblShipmentReceipt->Name = 'Shipping/Receiving History';
		$this->lblShipmentReceipt->Text = 'Shipping/Receiving History';
		$this->lblShipmentReceipt->CssClass = 'title';
	}
	
	protected function dtgShipmentReceipt_Create() {
		$this->dtgShipmentReceipt = new QDataGrid($this);
		$this->dtgShipmentReceipt->Name = 'Shipping/Receiving History';
		$this->dtgShipmentReceipt->CellPadding = 5;
		$this->dtgShipmentReceipt->CellSpacing = 0;
		$this->dtgShipmentReceipt->CssClass = "datagrid";
		$this->dtgShipmentReceipt->UseAjax = true;
		
		$objPaginator = new QPaginator($this->dtgShipmentReceipt);
		$this->dtgShipmentReceipt->Paginator = $objPaginator;
		$this->dtgShipmentReceipt->ItemsPerPage = 20;
		
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Transaction->TransactionType->__toString() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Number', '<?= $_ITEM->Transaction->ToStringNumberWithLink() ?> <?= $_ITEM->Transaction->ToStringHoverTips($_CONTROL); ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Company', '<?= $_ITEM->Transaction->ToStringCompany() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Contact', '<?= $_ITEM->Transaction->ToStringContact() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Scheduled By', '<?= $_ITEM->Transaction->CreatedByObject->__toString() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->Transaction->ToStringStatusStyled() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Tracking', '<?= $_ITEM->Transaction->ToStringTrackingNumber() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		
		//$this->dtgShipmentReceipt->SortColumnIndex = 4;
    //$this->dtgShipmentReceipt->SortDirection = 1;
    
    $objStyle = $this->dtgShipmentReceipt->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgShipmentReceipt->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgShipmentReceipt->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';		
	}	
	
	// Edit Button Click
	public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

		// Hide labels and display inputs where appropriate
		$this->displayInputs();
		
		// Deactivate the transaction buttons
		$this->disableTransactionButtons();
	}

	// Save Button Click Actions
	public function btnSave_Click($strFormId, $strControlId, $strParameter) {
		
		try {
			// Get an instance of the database
			$objDatabase = QApplication::$Database[1];
			// Begin a MySQL Transaction to be either committed or rolled back
			$objDatabase->TransactionBegin();
		
			// This happens whether or not they are creating a new one or editing an existing one
			$this->objInventoryModel->ShortDescription = $this->txtShortDescription->Text;
			$this->objInventoryModel->CategoryId = $this->lstCategory->SelectedValue;
			$this->objInventoryModel->ManufacturerId = $this->lstManufacturer->SelectedValue;
			$this->objInventoryModel->LongDescription = $this->txtLongDescription->Text;
			$this->objInventoryModel->InventoryModelCode = $this->txtInventoryModelCode->Text;
			
			$blnError = false;
	
			// If a new inventory model is being created
			if (!$this->blnEditMode) {
				
				// Check to see if the InventoryModelCode already exists
				$InventoryModelDuplicate = InventoryModel::LoadbyInventoryModelCode($this->objInventoryModel->InventoryModelCode);
				if ($InventoryModelDuplicate) {
					$blnError = true;
					$this->txtInventoryModelCode->Warning = "That inventory code is already in use. Please try another.";
				}
				
				if (!$blnError) {
					// Object should be saved only if it is new, to obtain the proper InventoryModelId to add to the custom field tables
					$this->objInventoryModel->Save();
				}			
			}
	
			// Assign input values to custom fields
			if ($this->arrCustomFields) {
				
				// Save the values from all of the custom field controls to save the inventory model
				CustomField::SaveControls($this->objInventoryModel->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objInventoryModel->InventoryModelId, 2);
			}
			
			if ($this->blnEditMode) {
				
				// Update the values of all fields for an Ajax reload
				$this->UpdateInventoryFields();
				
				// If inventory model is not new, it must be saved after updating the inventoryfields
				$this->objInventoryModel->Save();
				
				// Setup the InventoryModel again to retrieve the latest Modified information
				$this->objParentObject->SetupInventoryModel($this);
				
				// Give the labels their appropriate values before display
				$this->UpdateInventoryLabels();
				
				// This was necessary because it was not saving the changes of a second edit/save in a row
				// Reload all custom fields
				$this->objInventoryModel->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, $this->blnEditMode, $this->objInventoryModel->InventoryModelId);
				// Hide inputs and display labels
				$this->displayLabels();
				// Enable the appropriate transaction buttons
				$this->EnableTransactionButtons();
				
			}
			elseif (!$blnError) {
				
				// Commit the above transactions to the database
				$objDatabase->TransactionCommit();
				
				// Reload the edit inventory page with the newly created model
				$strRedirect = "inventory_edit.php?intInventoryModelId=" . $this->objInventoryModel->InventoryModelId;
				QApplication::Redirect($strRedirect);
			}
			
			// Commit the above transactions to the database
			$objDatabase->TransactionCommit();
		}
		catch (QOptimisticLockingException $objExc) {
			
			// Rollback the database
			$objDatabase->TransactionRollback();
			
			// Output the error
			$this->btnCancel->Warning = sprintf('This inventory has been updated by another user. You must <a href="inventory_edit.php?intInventoryModelId=%s">Refresh</a> to edit this Inventory.', $this->objInventoryModel->InventoryModelId);
		}		
	}
	
	// Cancel Button Click Actions
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		if ($this->blnEditMode) {
			$this->displayLabels();
			$this->EnableTransactionButtons();
			$this->UpdateInventoryControls();
		}
		else {
			QApplication::Redirect('inventory_model_list.php');
		}
	}
	
	// Delete Button Click Actions
	public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		
		// Custom Field Values for text fields must be manually deleted because MySQL ON DELETE will not cascade to them
		// The values do not get deleted for select values
		CustomField::DeleteTextValues($this->objInventoryModel->objCustomFieldArray);

		// This delete will cascade down to inventory_location and inventory_transaction tables
		$this->objInventoryModel->Delete();

		QApplication::Redirect('inventory_model_list.php');
	}
	
	// Move Button Click Actions
	public function btnMove_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 1 is the transaction_type_id for the move transaction
		$this->objParentObject->DisplayTransaction(true, 1);
	}

	// Move Button Click Actions
	public function btnTakeOut_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 1 is the transaction_type_id for the move transaction
		$this->objParentObject->DisplayTransaction(true, 5);
	}
	
	// Move Button Click Actions
	public function btnRestock_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 1 is the transaction_type_id for the move transaction
		$this->objParentObject->DisplayTransaction(true, 4);
	}
	
	// Ship Button Click Actions
	public function btnShip_Click($strFormId, $strControlId, $strParameter) {
		QApplication::Redirect(sprintf('../shipping/shipment_edit.php?intInventoryModelId=%s', $this->objInventoryModel->InventoryModelId));
	}
	
	// Receive Button Click Actions
	public function btnReceive_Click($strFormId, $strControlId, $strParameter) {
		QApplication::Redirect(sprintf('../receiving/receipt_edit.php?intInventoryModelId=%s', $this->objInventoryModel->InventoryModelId));
	}	
	
	// Display the labels and buttons for Inventory Viewing mode
	public function displayLabels() {

		// Do not display inputs
		$this->txtShortDescription->Display = false;
		$this->lstCategory->Display = false;
		$this->lstManufacturer->Display = false;
		$this->txtLongDescription->Display = false;
		$this->txtInventoryModelCode->Display = false;
		
		// Do not display Cancel and Save buttons
		$this->btnCancel->Display = false;
		$this->btnSave->Display = false;
		
		// Display Labels for Viewing mode
		$this->lblShortDescription->Display = true;
		$this->lblCategory->Display = true;
		$this->lblManufacturer->Display = true;
		$this->lblInventoryModelCode->Display = true;
		$this->pnlLongDescription->Display = true;

		// Display Edit and Delete buttons
		$this->btnEdit->Display = true;
		$this->btnDelete->Display = true;
		
		// Display custom field labels
		if ($this->arrCustomFields) {
			CustomField::DisplayLabels($this->arrCustomFields);
		}
	}
	
	// Display the inputs and buttons for Edit or Create mode
	public function displayInputs() {
		
		// Do not display labels
		$this->lblShortDescription->Display = false;
		$this->lblCategory->Display = false;
		$this->lblManufacturer->Display = false;
		$this->lblInventoryModelCode->Display = false;
		$this->pnlLongDescription->Display = false;
	
    	// Do not display Edit and Delete buttons
    	$this->btnEdit->Display = false;
    	$this->btnDelete->Display = false;
    
    	// Display inputs
		$this->txtShortDescription->Display = true;
		$this->lstCategory->Display = true;
		$this->lstManufacturer->Display = true;
		$this->txtLongDescription->Display = true;
		$this->txtInventoryModelCode->Display = true;
		
    	// Display Cancel and Save butons    
    	$this->btnCancel->Display = true;
    	$this->btnSave->Display = true;
    
    	// Display custom field inputs
    	if ($this->arrCustomFields) {
    		CustomField::DisplayInputs($this->arrCustomFields);
    	} 
	}
	
	// Disable all transaction buttons while editing
	public function DisableTransactionButtons() {
		if ($this->blnEditMode) {
			$this->btnMove->Enabled = false;
			$this->btnTakeOut->Enabled = false;
			$this->btnRestock->Enabled = false;
		}
	}

	// Enable the transaction buttons
	public function EnableTransactionButtons() {
		if ($this->blnEditMode) {
			if (InventoryModel::GetTotalQuantityByInventoryModelId($this->objInventoryModel->InventoryModelId) == 0) {
				$this->btnMove->Enabled = false;
				$this->btnTakeOut->Enabled = false;
			}
			else {
				$this->btnMove->Enabled = true;
				$this->btnTakeOut->Enabled = true;
			}
			$this->btnRestock->Enabled = true;
		}
	}
	
	// Update the Inventory labels with the values from the inventory inputs
	public function UpdateInventoryLabels() {

		$this->lblHeaderInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
		$this->lblShortDescription->Text = $this->objInventoryModel->ShortDescription;
		if ($this->objInventoryModel->CategoryId) {
			$this->lblCategory->Text = $this->objInventoryModel->Category->__toString();
		}
		if ($this->objInventoryModel->ManufacturerId) {
			$this->lblManufacturer->Text = $this->objInventoryModel->Manufacturer->__toString();
		}
		$this->pnlLongDescription->Text = nl2br($this->objInventoryModel->LongDescription);
		$this->lblInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
		$this->lblTotalQuantity->Text = InventoryModel::GetTotalQuantityByInventoryModelId($this->objInventoryModel->InventoryModelId);
		if ($this->objInventoryModel->ModifiedDate) {
			$this->lblModifiedDate->Text = $this->objInventoryModel->ModifiedDate . ' by ' . $this->objInventoryModel->ModifiedByObject->__toStringFullName();
		}
		
		// Update custom labels
		if ($this->arrCustomFields) {
			CustomField::UpdateLabels($this->arrCustomFields);
		}		
	}
	
	// Protected Update Methods
	protected function UpdateInventoryFields() {
		$this->objInventoryModel->ShortDescription = $this->txtShortDescription->Text;
		$this->objInventoryModel->CategoryId = $this->lstCategory->SelectedValue;
		$this->objInventoryModel->ManufacturerId = $this->lstManufacturer->SelectedValue;
		$this->objInventoryModel->LongDescription = $this->txtLongDescription->Text;
		$this->objInventoryModel->InventoryModelCode = $this->txtInventoryModelCode->Text;
	}	
	
	// Resets control values on Cancel Click
	protected function UpdateInventoryControls() {
		$this->txtShortDescription->Text = $this->objInventoryModel->ShortDescription;
		$this->lstCategory->SelectedValue = $this->objInventoryModel->CategoryId;
		$this->lstManufacturer->SelectedValue = $this->objInventoryModel->ManufacturerId;
		$this->txtLongDescription->Text = $this->objInventoryModel->LongDescription;
		$this->txtInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
		$this->arrCustomFields = CustomField::UpdateControls($this->objInventoryModel->objCustomFieldArray, $this->arrCustomFields);
	}	
	
  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
	  	case "objInventoryModel": return $this->objInventoryModel;
	  	case "blnEditMode": return $this->blnEditMode;
	  	case "dtgInventoryTransaction": return $this->dtgInventoryTransaction;
      default:
        try {
            return parent::__get($strName);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
	  }
  }
  
	/////////////////////////
	// Public Properties: SET
	/////////////////////////
	public function __set($strName, $mixValue) {
		$this->blnModified = true;

		switch ($strName) {
	    case "objInventoryModel": $this->objInventoryModel = $mixValue;
	    	break;
	    case "blnEditMode": $this->blnEditMode = $mixValue;
	    	break;
	    case "strTitleVerb": $this->strTitleVerb = $mixValue;
	    	break;
	    case "dtgInventoryTransaction": $this->dtgInventoryTransaction = $mixValue;
	    	break;  	
			default:
				try {
					parent::__set($strName, $mixValue);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
				break;
		}
	}    
}
?>
