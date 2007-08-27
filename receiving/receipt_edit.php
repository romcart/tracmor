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
	QApplication::Authenticate(6);
	require_once(__FORMBASE_CLASSES__ . '/ReceiptEditFormBase.class.php');
	require('../contacts/CompanyEditPanel.class.php');
	require('../contacts/ContactEditPanel.class.php');
	require('../contacts/AddressEditPanel.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Receipt class.  It extends from the code-generated
	 * abstract ReceiptEditFormBase class.
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
	class ReceiptEditForm extends ReceiptEditFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		// Shortcut Menu
		protected $ctlShortcutMenu;		

		// Booleans
		protected $blnModifyAssets = false;
		protected $blnModifyInventory = false;
		
		// Labels
		protected $lblHeaderReceipt;
		protected $lblFromCompany;
		protected $lblFromContact;
		protected $lblToContact;
		protected $lblToAddress;
		protected $pnlNote;
		protected $lblDueDate;
		protected $lblReceiptDate;
		protected $lblNewFromCompany;
		protected $lblNewFromContact;
		protected $lblNewToContact;
		protected $lblNewToAddress;
		
		
		// Inputs
		protected $txtNote;
		protected $txtNewAssetCode;
		protected $txtNewInventoryModelCode;
		protected $txtQuantity;
		protected $rblAssetType;
		protected $lstAssetModel;
		protected $chkAutoGenerateAssetCode;
		protected $calDueDate;
		
		// Buttons
		protected $btnEdit;
		protected $btnAddAsset;
		protected $btnAddInventory;
		
		// Datagrids
		protected $dtgAssetTransact;
		protected $dtgInventoryTransact;
		
		// Arrays
		protected $arrAssetTransactionToDelete;
		protected $arrInventoryTransactionToDelete;
		
		// Objects
		protected $objAssetTransactionArray;
		protected $objInventoryTransactionArray;
		protected $objTransaction;
		protected $dttNow;
		
		// Integers
		protected $intNewTempId = 1;
		
		// Dialog
		protected $dlgNew;
		
		protected function Form_Create() {
			
			// Call Setup Receipt to either load existing or create new receipt
			$this->SetupReceipt();
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			// Create the labels
			$this->lblHeaderReceipt_Create();
			$this->lblFromCompany_Create();
			$this->lblFromContact_Create();
			$this->lblToContact_Create();
			$this->lblToAddress_Create();
			$this->pnlNote_Create();
			$this->lblDueDate_Create();
			$this->lblReceiptDate_Create();
			
			// Create the inputs
			$this->lstFromCompany_Create();
			$this->lblNewFromCompany_Create();
			$this->lstFromContact_Create();
			$this->lblNewFromContact_Create();
			$this->lstToContact_Create();
			$this->lblNewToContact_Create();
			$this->lstToAddress_Create();
			$this->lblNewToAddress_Create();
			$this->txtNote_Create();
			$this->txtNewAssetCode_Create();
			$this->txtNewInventoryModelCode_Create();
			$this->txtQuantity_Create();
			$this->rblAssetType_Create();
			$this->lstAssetModel_Create();
			$this->chkAutoGenerateAssetCode_Create();
			$this->calDueDate_Create();
			
			// Create the buttons
			$this->btnSave_Create();
			$this->btnEdit_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
			$this->btnAddAsset_Create();
			$this->btnAddInventory_Create();
			
			// Create the datagrids
			$this->dtgAssetTransact_Create();
			$this->dtgInventoryTransact_Create();
			
			// New entities Dialog
			$this->dlgNew_Create();
			
			// Load the objAssetTransactionArray and objInventoryTransactionArray for the first time
			if ($this->blnEditMode) {

				$objClauses = array();
				if ($objClause = $this->dtgAssetTransact->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgAssetTransact->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->Asset->AssetModel))
					array_push($objClauses, $objClause);
				$this->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->objReceipt->TransactionId, $objClauses);
				$objClauses = null;
				
				$objClauses = array();
				if ($objClause = $this->dtgInventoryTransact->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgInventoryTransact->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->InventoryLocation->InventoryModel));
					array_push($objClauses, $objClause);
				$this->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->objReceipt->TransactionId, $objClauses);
				
				$this->DisplayLabels();
			}
			elseif (!$this->blnEditMode) {
				$this->DisplayInputs();
			}
			
			// Check if there is an Asset or InventoryModel ID in the query string to automatically add them - they would be coming from AssetEdit or InventoryEdit
			if (!$this->blnEditMode) {
				$intAssetId = QApplication::QueryString('intAssetId');
				// If an Asset was passed in the query string, load the txt in the Asset Code text box and click the add button
				if (($intAssetId)) {
					$objAsset = Asset::Load($intAssetId);
					if ($objAsset) {
						$this->txtNewAssetCode->Text = $objAsset->AssetCode;
						$this->btnAddAsset_Click($this, null, null);
					}
				}
				$intInventoryModelId = QApplication::QueryString('intInventoryModelId');
				// If an InventoryModel was passed in the query string, load the text in the InventoryModel text box and set the focus to the quantity box
				if ($intInventoryModelId) {
					$objInventoryModel = InventoryModel::Load($intInventoryModelId);
					if ($objInventoryModel) {
						$this->txtNewInventoryModelCode->Text = $objInventoryModel->InventoryModelCode;
						QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->txtQuantity->ControlId));
					}
				}
			}
		}
		
		// Datagrids must load their datasource in this step, because the data is not stored in the FormState variable like everything else
		protected function Form_PreRender() {
			
			// Load the data for the AssetTransact datagrid
			if ($this->blnModifyAssets || $this->blnEditMode) {
				$this->blnModifyAssets = false;
				$this->dtgAssetTransact->TotalItemCount = count($this->objAssetTransactionArray);
				if ($this->dtgAssetTransact->TotalItemCount > 0) {
					$this->dtgAssetTransact->DataSource = $this->objAssetTransactionArray;
					$this->dtgAssetTransact->ShowHeader = true;
				}
				else {
					$this->dtgAssetTransact->ShowHeader = false;
				}
			}
			
			// Load the data for the InventoryTransact datagrid
			if ($this->blnModifyInventory || $this->blnEditMode) {
				$this->blnModifyInventory = false;	
				$this->dtgInventoryTransact->TotalItemCount = count($this->objInventoryTransactionArray);
				if ($this->dtgInventoryTransact->TotalItemCount > 0) {
					$this->dtgInventoryTransact->DataSource = $this->objInventoryTransactionArray;
					$this->dtgInventoryTransact->ShowHeader = true;
				}
				// Do not show the header if there are no items in the datagrid
				else {
					$this->dtgInventoryTransact->ShowHeader = false;
				}
			}
		}
		
		protected function SetupReceipt() {
			parent::SetupReceipt();
			QApplication::AuthorizeEntity($this->objReceipt, $this->blnEditMode);
		}
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}
		
		//**************
		// CREATE LABELS
		//**************
		
		// Create Header Label
		protected function lblHeaderReceipt_Create() {
			$this->lblHeaderReceipt = new QLabel($this);
			if ($this->blnEditMode) {
				$this->lblHeaderReceipt->Text = sprintf('Receipt #%s',$this->objReceipt->ReceiptNumber); 
			}
			else {
				$this->lblHeaderReceipt->Text = 'Schedule Receipt';
			}
			
		}
		
		// Create and Setup From Company label
		protected function lblFromCompany_Create() {
			$this->lblFromCompany = new QLabel($this);
			$this->lblFromCompany->Name = 'Receive From Company';
			if ($this->objReceipt->FromCompanyId) {
				$this->lblFromCompany->Text = $this->objReceipt->FromCompany->__toString();
			}
		}
		
		// Create and Setup From Contact label
		protected function lblFromContact_Create() {
			$this->lblFromContact = new QLabel($this);
			$this->lblFromContact->Name = 'Receive From Contact';
			if ($this->objReceipt->FromContactId) {
				$this->lblFromContact->Text = $this->objReceipt->FromContact->__toString();
			}
		}
		
		// Create and Setup To Contact label
		protected function lblToContact_Create() {
			$this->lblToContact = new QLabel($this);
			$this->lblToContact->Name = 'Receiver Contact';
			if ($this->objReceipt->ToContactId) {
				$this->lblToContact->Text = $this->objReceipt->ToContact->__toString();
			}
		}
		
		// Create and Setup To Address label
		protected function lblToAddress_Create() {
			$this->lblToAddress = new QLabel($this);
			$this->lblToAddress->Name = 'Receiver Address';
			if ($this->objReceipt->ToAddressId) {
				$this->lblToAddress->Text = $this->objReceipt->ToAddress->__toString();
			}
		}
		
		// Create and Setup Note panel
		protected function pnlNote_Create() {
			$this->pnlNote = new QPanel($this);
			$this->pnlNote->CssClass = 'scrollBox';
			$this->pnlNote->Name = 'Note';
			if ($this->objReceipt->TransactionId) {
				$this->pnlNote->Text = nl2br($this->objReceipt->Transaction->Note);
			}
		}
		
		// Create and Setup Due Date Label
		protected function lblDueDate_Create() {
			$this->lblDueDate = new QLabel($this);
			$this->lblDueDate->Name = 'Date Due';
			if ($this->objReceipt->DueDate) {
				$this->lblDueDate->Text = $this->objReceipt->DueDate->__toString();
			}
		}
		
		// Create and Setup Receipt Date Label
		protected function lblReceiptDate_Create() {
			$this->lblReceiptDate = new QLabel($this);
			$this->lblReceiptDate->Name = 'Receipt Due';
			if ($this->objReceipt->ReceiptDate) {
				$this->lblReceiptDate->Text = $this->objReceipt->ReceiptDate->__toString();
			}
		}
		
		protected function lblNewFromCompany_Create() {
			$this->lblNewFromCompany = new QLabel($this);
			$this->lblNewFromCompany->HtmlEntities = false;
			$this->lblNewFromCompany->Text = '<img src="../images/add.png">';
			$this->lblNewFromCompany->ToolTip = "New Company";
			$this->lblNewFromCompany->CssClass = "add_icon";
			$this->lblNewFromCompany->AddAction(new QClickEvent(), new QAjaxAction('lblNewFromCompany_Click'));
			$this->lblNewFromCompany->ActionParameter = $this->lstFromCompany->ControlId;
		}
		
		protected function lblNewFromContact_Create() {
			$this->lblNewFromContact = new QLabel($this);
			$this->lblNewFromContact->HtmlEntities = false;
			$this->lblNewFromContact->Text = '<img src="../images/add.png">';
			$this->lblNewFromContact->ToolTip = "New Contact";
			$this->lblNewFromContact->CssClass = "add_icon";
			$this->lblNewFromContact->AddAction(new QClickEvent(), new QAjaxAction('lblNewFromContact_Click'));
			$this->lblNewFromContact->ActionParameter = $this->lstFromContact->ControlId;
		}
		
		protected function lblNewToContact_Create() {
			$this->lblNewToContact = new QLabel($this);
			$this->lblNewToContact->HtmlEntities = false;
			$this->lblNewToContact->Text = '<img src="../images/add.png">';
			$this->lblNewToContact->ToolTip = "New Contact";
			$this->lblNewToContact->CssClass = "add_icon";
		  	$this->lblNewToContact->AddAction(new QClickEvent(), new QAjaxAction('lblNewToContact_Click'));
			$this->lblNewToContact->ActionParameter = $this->lstToContact->ControlId;
		}
		
		protected function lblNewToAddress_Create() {
			$this->lblNewToAddress = new QLabel($this);
			$this->lblNewToAddress->HtmlEntities = false;
			$this->lblNewToAddress->Text = '<img src="../images/add.png">';
			$this->lblNewToAddress->ToolTip = "New Address";
			$this->lblNewToAddress->CssClass = "add_icon";
			$this->lblNewToAddress->AddAction(new QClickEvent(), new QAjaxAction('lblNewToAddress_Click'));
		 	$this->lblNewToAddress->ActionParameter = $this->lstToAddress->ControlId;
		}
		
		//*****************
		// CREATE INPUTS
		//*****************

		// Create and Setup lstFromCompany
		protected function lstFromCompany_Create() {
			$this->lstFromCompany = new QListBox($this);
			$this->lstFromCompany->Name = QApplication::Translate('From Company');
			$this->lstFromCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromCompany->AddItem('- Select One -', null);
			$objFromCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
			if ($objFromCompanyArray) foreach ($objFromCompanyArray as $objFromCompany) {
				$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
				if (($this->objReceipt->FromCompany) && ($this->objReceipt->FromCompany->CompanyId == $objFromCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstFromCompany->AddItem($objListItem);
			}
			$this->lstFromCompany->AddAction(new QChangeEvent, new QAjaxAction('lstFromCompany_Select'));
			$this->lstFromCompany->TabIndex=1;
			QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->lstFromCompany->ControlId));
		}

		// Create and Setup lstFromContact
		protected function lstFromContact_Create() {
			$this->lstFromContact = new QListBox($this);
			$this->lstFromContact->Name = QApplication::Translate('From Contact');
			$this->lstFromContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromContact->AddItem('- Select One -', null);
			if ($this->lstFromCompany->SelectedValue) {
				$intFromCompanyId = $this->lstFromCompany->SelectedValue;
				$objFromContactArray = Contact::LoadArrayByCompanyId($intFromCompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
				if ($objFromContactArray) foreach ($objFromContactArray as $objFromContact) {
					$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
					if (($this->objReceipt->FromContact) && ($this->objReceipt->FromContact->ContactId == $objFromContact->ContactId))
						$objListItem->Selected = true;
					$this->lstFromContact->AddItem($objListItem);
				}
			}
			$this->lstFromContact->TabIndex=2;		
		}

		// Create and Setup lstToContact
		protected function lstToContact_Create() {
			$this->lstToContact = new QListBox($this);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstToContact->AddItem('- Select One -', null);
			$objToContactArray = Contact::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
			if ($objToContactArray) foreach ($objToContactArray as $objToContact) {
				$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
				if (($this->objReceipt->ToContact) && ($this->objReceipt->ToContact->ContactId == $objToContact->ContactId))
					$objListItem->Selected = true;
				$this->lstToContact->AddItem($objListItem);
			}
			$this->lstToContact->TabIndex=3;			
		}

		// Create and Setup lstToAddress
		protected function lstToAddress_Create() {
			$this->lstToAddress = new QListBox($this);
			$this->lstToAddress->Name = QApplication::Translate('To Address');
			$this->lstToAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstToAddress->AddItem('- Select One -', null);
			$objToAddressArray = Address::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
			if ($objToAddressArray) foreach ($objToAddressArray as $objToAddress) {
				$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
				if (($this->objReceipt->ToAddress) && ($this->objReceipt->ToAddress->AddressId == $objToAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstToAddress->AddItem($objListItem);
			}
			$this->lstToAddress->TabIndex=4;	
		}	
		
		// Create and Setup Note textbox
		protected function txtNote_Create() {
			$this->txtNote = new QTextBox($this);
			$this->txtNote->Name = 'Note';
			$this->txtNote->TextMode = QTextMode::MultiLine;
			if ($this->objReceipt->TransactionId) {
				$this->txtNote->Text = $this->objReceipt->Transaction->Note;
			}
			$this->txtNote->TabIndex=5;
		}
		
		// Create and Setup calDueDate
		protected function calDueDate_Create() {
			$this->calDueDate = new QDateTimePicker($this);
			$this->calDueDate->Name = QApplication::Translate('Due Date');
			$this->calDueDate->DateTimePickerType = QDateTimePickerType::Date;
			if ($this->blnEditMode) {
				$this->calDueDate->DateTime = $this->objReceipt->DueDate;
			}
			elseif (!$this->blnEditMode) {
				$this->calDueDate->DateTime = new QDateTime(QDateTime::Now);
			}
			$this->calDueDate->Required = true;
			$this->dttNow = new QDateTime(QDateTime::Now);
			$this->calDueDate->MinimumYear = $this->dttNow->Year;
		}
		
		// Create the text field to enter new asset codes to add to the transaction
		// Eventually this field will receive information from the AML
		protected function txtNewAssetCode_Create() {
			$this->txtNewAssetCode = new QTextBox($this);
			$this->txtNewAssetCode->Name = 'Asset Code:';
			$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtNewAssetCode->CausesValidation = false;
			$this->txtNewAssetCode->TabIndex=6;
		}

		// Create the text field to enter new inventory_model codes to add to the transaction
		// Eventually this field will receive information from the AML
		protected function txtNewInventoryModelCode_Create() {
			$this->txtNewInventoryModelCode = new QTextBox($this);
			$this->txtNewInventoryModelCode->Name = 'Inventory Code:';
			$this->txtNewInventoryModelCode->CausesValidation = false;
			$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create the quantity text field for new inventory
		protected function txtQuantity_Create() {
			$this->txtQuantity = new QTextBox($this);
			$this->txtQuantity->Name = 'Quantity:';
			$this->txtQuantity->CausesValidation = false;
			$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create the Asset Type Radio Button List (new or existing)
		protected function rblAssetType_Create() {
			$this->rblAssetType = new QRadioButtonList($this);
			$this->rblAssetType->AddItem(new QListItem('Existing Asset', 'existing', true));
			$this->rblAssetType->AddItem(new QListItem('New Asset', 'new'));
			$this->rblAssetType->AddAction(new QChangeEvent(), new QAjaxAction('rblAssetType_Change'));
		}
		
		// Create the Asset Model List for creating new assets
		protected function lstAssetModel_Create() {
			$this->lstAssetModel = new QListBox($this);
			$this->lstAssetModel->Name = 'Asset Model';
			$this->lstAssetModel->AddItem('- Select One -', null, true);
			$this->lstAssetModel->Display = false;
		}
		
		// Create the Auto Generate Asset Code Checkbox
		protected function chkAutoGenerateAssetCode_Create() {
			$this->chkAutoGenerateAssetCode = new QCheckBox($this);
			$this->chkAutoGenerateAssetCode->Name = 'Auto Generate';
			$this->chkAutoGenerateAssetCode->Text = 'Auto Generate';
			$this->chkAutoGenerateAssetCode->AddAction(new QClickEvent(), new QToggleEnableAction($this->txtNewAssetCode));
			$this->chkAutoGenerateAssetCode->Display = false;
		}
		
		//*******************
		// CREATE BUTTONS
		//*******************
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
		}

		// Setup btnCancel
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;	
		}		
		
		// Create and Setup the Edit Button
		protected function btnEdit_Create() {
			$this->btnEdit = new Qbutton($this);
			$this->btnEdit->Text = 'Edit';
			$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
			$this->btnEdit->CausesValidation = false;
			QApplication::AuthorizeControl($this->objReceipt, $this->btnEdit, 2);			
		}
		
		// Setup btnDelete
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('All assets that were created while scheduling this receipt will also be deleted. Are you SURE you want to DELETE this %s?'), 'Receipt')));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			QApplication::AuthorizeControl($this->objReceipt, $this->btnDelete, 3);
		}
		
		// Setup AddAsset Button
		protected function btnAddAsset_Create() {
			$this->btnAddAsset = new QButton($this);
			$this->btnAddAsset->Text = 'Add';
			$this->btnAddAsset->AddAction(new QClickEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->btnAddAsset->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->btnAddAsset->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnAddAsset->CausesValidation = false;
			$this->btnAddAsset->TabIndex=7;
		}
		
		// Setup Add Inventory Button
		protected function btnAddInventory_Create() {
			$this->btnAddInventory = new QButton($this);
			$this->btnAddInventory->Text = 'Add';
			$this->btnAddInventory->AddAction(new QClickEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->btnAddInventory->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->btnAddInventory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnAddInventory->CausesValidation = false;
		}
		
		//*****************
		// CREATE DIALOG
		//*****************
		// New Entity (Company, Contact, Address Dialog Box)
		protected function dlgNew_Create() {
			$this->dlgNew = new QDialogBox($this);
			$this->dlgNew->AutoRenderChildren = true;
			$this->dlgNew->Width = '440px';
			$this->dlgNew->Overflow = QOverflow::Auto;
			$this->dlgNew->Padding = '10px';
			$this->dlgNew->Display = false;
			$this->dlgNew->BackColor = '#FFFFFF';
			$this->dlgNew->MatteClickable = false;
			$this->dlgNew->CssClass = "modal_dialog";
		}		
		
		//*****************
		// ONSELECT METHODS
		//*****************
		
		// This method runs every time a 'From Company' is selected
		protected function lstFromCompany_Select() {
			if ($this->lstFromCompany->SelectedValue) {
				$objCompany = Company::Load($this->lstFromCompany->SelectedValue);
				if ($objCompany) {
					// Load the values for the 'From Contact' List
					if ($this->lstFromContact) {
						$objFromContactArray = Contact::LoadArrayByCompanyId($objCompany->CompanyId);
						
						if ($this->lstFromContact->SelectedValue) {
							$SelectedContactId = $this->lstFromContact->SelectedValue;
						}
						elseif ($this->objReceipt->FromContactId) {
							$SelectedContactId = $this->objReceipt->FromContactId;
						}
						else {
							$SelectedContactId = null;
						}
						$this->lstFromContact->RemoveAllItems();
						$this->lstFromContact->AddItem('- Select One -', null);
						if ($objFromContactArray) {
							foreach ($objFromContactArray as $objFromContact) {
								$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
								if ($SelectedContactId == $objFromContact->ContactId) {
									$objListItem->Selected = true;
								}
								$this->lstFromContact->AddItem($objListItem);
							}
						}
						$this->lstFromContact->Enabled = true;
					}
				}
			}
		}
		
		//******************
		// CREATE DATAGRIDS
		//******************
		
		// Setup the AssetTransact datagrid
		protected function dtgAssetTransact_Create() {
			
			$this->dtgAssetTransact = new QDataGrid($this);
			$this->dtgAssetTransact->CellPadding = 5;
			$this->dtgAssetTransact->CellSpacing = 0;
			$this->dtgAssetTransact->CssClass = "datagrid";
			
	    // Enable AJAX - this won't work while using the DB profiler
	    $this->dtgAssetTransact->UseAjax = true;
	
	    // Enable Pagination, and set to 20 items per page
	    $objPaginator = new QPaginator($this->dtgAssetTransact);
	    $this->dtgAssetTransact->Paginator = $objPaginator;
	    $this->dtgAssetTransact->ItemsPerPage = 20;
	    
    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Asset Code', '<?= $_ITEM->Asset->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Asset->AssetCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Asset->AssetCode, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->Asset->AssetModel->__toStringWithLink("bluelink") ?>', array('Width' => "200", 'OrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Asset->AssetModel->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Asset->AssetModel->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->__toStringStatus() ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	
	    $objStyle = $this->dtgAssetTransact->RowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#FFFFFF';
	    $objStyle->FontSize = 12;
	
	    $objStyle = $this->dtgAssetTransact->AlternateRowStyle;
	    $objStyle->BackColor = '#EFEFEF';
	
	    $objStyle = $this->dtgAssetTransact->HeaderRowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#EFEFEF';
	    $objStyle->CssClass = 'dtg_header';
	    
	    $this->dtgAssetTransact->ShowHeader = false;
		}
		
		// Render the remove button column in the AssetTransact datagrid
		public function RemoveAssetColumn_Render(AssetTransaction $objAssetTransaction) {
			
			// Only Display the remove button if it has not been received
			if ($objAssetTransaction->blnReturnReceivedStatus()) {
				return '';
			}
			else {
				// Assign the asset a TempId and increment it by one
	      $objAssetTransaction->Asset->TempId = $this->intNewTempId++;
	      $strControlId = 'btnRemoveAsset' . $objAssetTransaction->Asset->TempId;
	      // I don't know why this line is here. I guess it is to make sure the control hasn't already been created
	      $btnRemove = $this->GetControl($strControlId);
	      if (!$btnRemove) {
	          // Create the Remove button for this row in the DataGrid
	          $btnRemove = new QButton($this->dtgAssetTransact, $strControlId);
	          if ($objAssetTransaction->NewAssetFlag) {
	          	$btnRemove->Text = 'Remove and Delete';
	          }
	          else {
	          	$btnRemove->Text = 'Remove';
	          }
	          // Use ActionParameter to specify the TempId of the asset
	          // Using TempId because newly created (but not yet saved to the db) assets all have an AssetId of 0, so we needed another unique identifier	          
	          $btnRemove->ActionParameter = $objAssetTransaction->Asset->TempId;
	          $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemoveAssetTransaction_Click'));
	          $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemoveAssetTransaction_Click'));
	          $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	          $btnRemove->CausesValidation = false;
	      }
	      
	      return $btnRemove->Render(false);
			}
		}
		
		// Render the receive button in the AssetTransact datagrid
		public function btnReceiveAssetTransaction_Render(AssetTransaction $objAssetTransaction) {
			
			if (!$objAssetTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'btnReceiveAssetTransaction' . $objAssetTransaction->AssetTransactionId;
				$btnReceiveAsset = $this->GetControl($strControlId);
				if (!$btnReceiveAsset) {
					// Create the Receive button for this row in the datagrid
					// Use ActionParameter to specify the ID of the AssetTransaction
					$btnReceiveAsset = new QButton($this->dtgAssetTransact, $strControlId);
					$btnReceiveAsset->Text = 'Receive';
					$btnReceiveAsset->ActionParameter = $objAssetTransaction->AssetTransactionId;
					$btnReceiveAsset->AddAction(new QClickEvent(), new QAjaxAction('btnReceiveAssetTransaction_Click'));
					$btnReceiveAsset->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnReceiveAssetTransaction_Click'));
					$btnReceiveAsset->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					$btnReceiveAsset->CausesValidation = false;
				}
				
				QApplication::AuthorizeControl($this->objReceipt, $btnReceiveAsset, 2);				
				
				// QApplication::AuthorizeControl($this->objReceipt, $btnReceiveAsset, 2);
				return $btnReceiveAsset->Render(false);
			}
		}
		
		// Render the cancel receipt button in the AssetTransact datagrid
		// We are not using this button at all anymore
/*		public function btnCancelAssetTransaction_Render(AssetTransaction $objAssetTransaction) {
			
			if ($objAssetTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'btnCancelAssetTransaction' . $objAssetTransaction->AssetTransactionId;
				$btnCancelAsset = $this->GetControl($strControlId);
				if (!$btnCancelAsset) {
					// Create the Cancel button for this rown in the datagrid
					// Use ActionParameter to specify the ID of the AssetTransaction
					$btnCancelAsset = new QButton($this->dtgAssetTransact, $strControlId);
					$btnCancelAsset->Text = 'Cancel';
					$btnCancelAsset->ActionParameter = $objAssetTransaction->AssetTransactionId;
					$btnCancelAsset->AddAction(new QClickEvent(), new QAjaxAction('btnCancelAssetTransaction_Click'));
					$btnCancelAsset->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancelAssetTransaction_Click'));
					$btnCancelAsset->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					$btnCancelAsset->CausesValidation = false;
				}
				
				QApplication::AuthorizeControl($this->objReceipt, $btnCancelAsset, 2);
				
				return $btnCancelAsset->Render(false);
			}
		}*/
		
		// Render the location received list in the AssetTransact datagrid
		public function lstLocationAssetReceived_Render(AssetTransaction $objAssetTransaction) {
			
			if (!$objAssetTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'lstLocationAssetReceived' . $objAssetTransaction->AssetTransactionId;
				$lstLocationAssetReceived = $this->GetControl($strControlId);
				if (!$lstLocationAssetReceived) {
					// Create the drop down list for this row in the datagrid
					// Use ActionParameter to specify the Id of the AssetTransaction
					$lstLocationAssetReceived = new QListBox($this->dtgAssetTransact, $strControlId);
					$lstLocationAssetReceived->Name = 'Location To Receive';
					$lstLocationAssetReceived->ActionParameter = $objAssetTransaction->AssetTransactionId;
					$lstLocationAssetReceived->AddItem('- Select One -', null);
					$objLocationArray = Location::LoadAllLocations(false, false, 'short_description');
					if ($objLocationArray) {
						foreach ($objLocationArray as $objLocation) {
							$lstLocationAssetReceived->AddItem($objLocation->__toString(), $objLocation->LocationId);
						}
					}
					$lstLocationAssetReceived->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnReceiveAssetTransaction'));
					$lstLocationAssetReceived->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				}
				QApplication::AuthorizeControl($this->objReceipt, $lstLocationAssetReceived, 2);
				
				return $lstLocationAssetReceived->Render(false);
			}
		}
		

		
		// Setup the InventoryTransact datagrid
		protected function dtgInventoryTransact_Create() {
			
			$this->dtgInventoryTransact = new QDataGrid($this);
			$this->dtgInventoryTransact->CellPadding = 5;
			$this->dtgInventoryTransact->CellSpacing = 0;
			$this->dtgInventoryTransact->CssClass = "datagrid";
			
	    // Enable AJAX - this won't work while using the DB profiler
	    $this->dtgInventoryTransact->UseAjax = true;
	
	    // Enable Pagination, and set to 20 items per page
	    $objPaginator = new QPaginator($this->dtgInventoryTransact);
	    $this->dtgInventoryTransact->Paginator = $objPaginator;
	    $this->dtgInventoryTransact->ItemsPerPage = 20;
	    
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Inventory Code', '<?= $_ITEM->InventoryLocation->InventoryModel->__toStringWithLink("bluelink") ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Inventory Model', '<?= $_ITEM->InventoryLocation->InventoryModel->ShortDescription ?>', array('Width' => "200", 'CssClass' => "dtg_column")));
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Quantity', '<?= $_ITEM->Quantity ?>', array('CssClass' => "dtg_column")));
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->__toStringStatus() ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    
/*	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveInventoryColumn_Render($_ITEM) ?>', 'CssClass=dtg_column'));*/
	
	    $objStyle = $this->dtgInventoryTransact->RowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#FFFFFF';
	    $objStyle->FontSize = 12;
	
	    $objStyle = $this->dtgInventoryTransact->AlternateRowStyle;
	    $objStyle->BackColor = '#EFEFEF';
	
	    $objStyle = $this->dtgInventoryTransact->HeaderRowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#EFEFEF';
	    $objStyle->CssClass = 'dtg_header';
	    
	    $this->dtgInventoryTransact->ShowHeader = false;
		}
		
		// Render the Remove Button Column in the Inventory Transaction datagrid
		public function RemoveInventoryColumn_Render(InventoryTransaction $objInventoryTransaction) {
			
			// Only display the remove button if it has not been received
			if ($objInventoryTransaction->blnReturnReceivedStatus()) {
				return '';
			}
			else {
		    //$strControlId = 'btnRemoveInventory' . $objInventoryTransaction->InventoryLocation->InventoryLocationId;
		    $strControlId = 'btnRemoveInventory' . $objInventoryTransaction->InventoryLocationId;
	      $btnRemove = $this->GetControl($strControlId);
	      if (!$btnRemove) {
	        // Create the Remove button for this row in the DataGrid
	        // Use ActionParameter to specify the ID of the InventoryLocationId
	        $btnRemove = new QButton($this->dtgInventoryTransact, $strControlId);
	        $btnRemove->Text = 'Remove';
	        $btnRemove->ActionParameter = $objInventoryTransaction->InventoryLocationId;
	        $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemoveInventory_Click'));
	        $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemoveInventory_Click'));
	        $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	        $btnRemove->CausesValidation = false;
		    }
		    return $btnRemove->Render(false);
			}
		}
		
		// Render the receive button in the InventoryTransact datagrid
		public function btnReceiveInventoryTransaction_Render(InventoryTransaction $objInventoryTransaction) {
			
			if (!$objInventoryTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'btnReceiveInventoryTransaction' . $objInventoryTransaction->InventoryTransactionId;
				$btnReceiveInventory = $this->GetControl($strControlId);
				if (!$btnReceiveInventory) {
					// Create the Receive button for this row in the datagrid
					// Use ActionParameter to specify the ID of the InventoryTransaction
					$btnReceiveInventory = new QButton($this->dtgInventoryTransact, $strControlId);
					$btnReceiveInventory->Text = 'Receive';
					$btnReceiveInventory->ActionParameter = $objInventoryTransaction->InventoryTransactionId;
					$btnReceiveInventory->AddAction(new QClickEvent(), new QAjaxAction('btnReceiveInventoryTransaction_Click'));
					$btnReceiveInventory->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnReceiveInventoryTransaction_Click'));
					$btnReceiveInventory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					$btnReceiveInventory->CausesValidation = false;
				}
				QApplication::AuthorizeControl($this->objReceipt, $btnReceiveInventory, 2);	
				return $btnReceiveInventory->Render(false);
			}
		}
		
		// Render the cancel button in the InventoryTransact datagrid
/*		public function btnCancelInventoryTransaction_Render(InventoryTransaction $objInventoryTransaction) {
			
			if ($objInventoryTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'btnCancelInventoryTransaction' . $objInventoryTransaction->InventoryTransactionId;
				$btnCancelInventory = $this->GetControl($strControlId);
				if (!$btnCancelInventory) {
					// Create the Cnacel button for this row in the datagrid
					// Use ActionParameter to specify the ID of the InventoryTransaction
					$btnCancelInventory = new QButton($this->dtgInventoryTransact, $strControlId);
					$btnCancelInventory->Text = 'Cancel';
					$btnCancelInventory->ActionParameter = $objInventoryTransaction->InventoryTransactionId;
					$btnCancelInventory->AddAction(new QClickEvent(), new QAjaxAction('btnCancelInventoryTransaction_Click'));
					$btnCancelInventory->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancelInventoryTransaction_Click'));
					$btnCancelInventory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					$btnCancelInventory->CausesValidation = false;
				}
				
				QApplication::AuthorizeControl($this->objReceipt, $btnCancelInventory, 2);
				return $btnCancelInventory->Render(false);
			}
		}*/
		
		// Render the quantity textbox in the InventoryTransact datagrid
		public function txtQuantityReceived_Render(InventoryTransaction $objInventoryTransaction) {
			if (!$objInventoryTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'txtQuantityReceived' . $objInventoryTransaction->InventoryTransactionId;
				$txtQuantityReceived = $this->GetControl($strControlId);
				if (!$txtQuantityReceived) {
					// Create the text box for this row in the datagrid
					// Use ActionParameter to specify the Id of the AssetTransaction
					$txtQuantityReceived = new QIntegerTextBox($this->dtgInventoryTransact, $strControlId);
					$txtQuantityReceived->Name = 'Qty';
					$txtQuantityReceived->Width = 40;
					$txtQuantityReceived->ActionParameter = $objInventoryTransaction->InventoryTransactionId;
					$txtQuantityReceived->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnReceiveInventoryTransaction'));
					$txtQuantityReceived->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				}
				
				QApplication::AuthorizeControl($this->objReceipt, $txtQuantityReceived, 2);	
				return $txtQuantityReceived->RenderWithNameLeft(false);
			}
		}
		
		// Render the location received list in the InventoryTransact datagrid
		public function lstLocationInventoryReceived_Render(InventoryTransaction $objInventoryTransaction) {
			
			if (!$objInventoryTransaction->blnReturnReceivedStatus()) {
				$strControlId = 'lstLocationInventoryReceived' . $objInventoryTransaction->InventoryTransactionId;
				$lstLocationInventoryReceived = $this->GetControl($strControlId);
				if (!$lstLocationInventoryReceived) {
					// Create the drop down list for this row in the datagrid
					// Use ActionParameter to specify the Id of the AssetTransaction
					$lstLocationInventoryReceived = new QListBox($this->dtgInventoryTransact, $strControlId);
					$lstLocationInventoryReceived->Name = 'Location To Receive';
					$lstLocationInventoryReceived->ActionParameter = $objInventoryTransaction->InventoryTransactionId;
					$lstLocationInventoryReceived->AddItem('- Select One -', null);
					$objLocationArray = Location::LoadAllLocations(false, false, 'short_description');
					if ($objLocationArray) {
						foreach ($objLocationArray as $objLocation) {
							$lstLocationInventoryReceived->AddItem($objLocation->__toString(), $objLocation->LocationId);
						}
					}
					$lstLocationInventoryReceived->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnReceiveInventoryTransaction'));
					$lstLocationInventoryReceived->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				}
				QApplication::AuthorizeControl($this->objReceipt, $lstLocationInventoryReceived, 2);	
				return $lstLocationInventoryReceived->Render(false);
			}
		}		

		//************************
		// ONCLICK BUTTON METHODS
		// These methods are run when buttons are clicked
		//************************
		
		// This is called when the 'new' label is clicked
		public function lblNewFromCompany_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				// Create the panel, assigning it to the Dialog Box
				$pnlEdit = new CompanyEditPanel($this->dlgNew, 'CloseNewFromCompanyPanel');
				$pnlEdit->ActionParameter = $strParameter;
				// Show the dialog box
				$this->dlgNew->ShowDialogBox();
				$pnlEdit->txtShortDescription->Focus();
			}
		}
		
		// This is called when the 'new' label is clicked
		public function lblNewFromContact_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				// Create the panel, assigning it to the Dialog Box
				$pnlEdit = new ContactEditPanel($this->dlgNew, 'CloseNewPanel', null, null, $this->lstFromCompany->SelectedValue);
				$pnlEdit->ActionParameter = $strParameter;
				// Show the dialog box
				$this->dlgNew->ShowDialogBox();
				$pnlEdit->lstCompany->Focus();
			}
		}
		
		// This is called when the 'new' label is clicked
		public function lblNewToContact_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				// Create the panel, assigning it to the Dialog Box
				$pnlEdit = new ContactEditPanel($this->dlgNew, 'CloseNewPanel', null, null, QApplication::$TracmorSettings->CompanyId);
				$pnlEdit->ActionParameter = $strParameter;
				$pnlEdit->lstCompany->Enabled = false;
				// Show the dialog box
				$this->dlgNew->ShowDialogBox();
				$pnlEdit->lstCompany->Focus();
			}
		}
		
		// This is called when the 'new' label is clicked
		public function lblNewToAddress_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				// Create the panel, assigning it to the Dialog Box
				$pnlEdit = new AddressEditPanel($this->dlgNew, 'CloseNewPanel', null, null, QApplication::$TracmorSettings->CompanyId);
				$pnlEdit->ActionParameter = $strParameter;
				$pnlEdit->lstCompany->Enabled = false;
				// Show the dialog box
				$this->dlgNew->ShowDialogBox();
				$pnlEdit->lstCompany->Focus();
			}
		}
		
		// Cancel editing an existing receipt, or cancel adding a new receipt and return to the list page
		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			if ($this->blnEditMode) {
				$this->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->objReceipt->TransactionId);
				$this->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->objReceipt->TransactionId);
				$this->DisplayLabels();
				$this->UpdateReceiptControls();
			}
			else {
				QApplication::Redirect('receipt_list.php');
			}
		}		
		
		// Edit an existing receipt by displaying inputs and hiding the labels
		protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {
			$this->DisplayInputs();
		}
		
		// This triggers any time the Asset Type Radio Button List is changed (not clicked)
		protected function rblAssetType_Change($strFormId, $strControlId, $strParameter) {
			
			$this->txtNewAssetCode->Text = '';
			
			// If adding an existing asset to the receipt
			if ($this->rblAssetType->SelectedValue == 'existing') {
				$this->lstAssetModel->Display = false;
				$this->chkAutoGenerateAssetCode->Checked = false;
				$this->chkAutoGenerateAssetCode->Display = false;
				$this->txtNewAssetCode->Enabled = true;
			}
			// If adding a new receipt to the receipt
			elseif ($this->rblAssetType->SelectedValue == 'new') {
				$objAssetModelArray = AssetModel::LoadAll(QQ::Clause(QQ::OrderBy(QQN::AssetModel()->ShortDescription)));
				if ($objAssetModelArray) foreach ($objAssetModelArray as $objAssetModel) {
					$objListItem = new QListItem($objAssetModel->__toString(), $objAssetModel->AssetModelId);
					$this->lstAssetModel->AddItem($objListItem);
				}
				// Display the list of possible asset models
				$this->lstAssetModel->Display = true;
				// Display the Auto Generate Asset Code checkbox if a minimum value exists
				if (QApplication::$TracmorSettings->MinAssetCode) {
					$this->chkAutoGenerateAssetCode->Display = true;
				}
			}
		}
		
		// AddAsset Button Click
		public function btnAddAsset_Click($strFormId, $strControlId, $strParameter) {
			
			if ($this->rblAssetType->SelectedValue == 'new') {
				$blnError = false;
				// Assign an empty string to the asset code for now (NULL won't work to render properly in the datagrid
				if ($this->chkAutoGenerateAssetCode->Checked == true) {
					$strAssetCode = '';
				}
				else {
					$strAssetCode = $this->txtNewAssetCode->Text;
					if (!$strAssetCode) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = 'You must enter an asset code.';
					}
				}
				// Generate an error if that asset code already exists
				if ($objDuplicate = Asset::LoadByAssetCode($strAssetCode)) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = 'That asset code already exists. Choose another.';
				}
				if (!$blnError) {
					$objNewAsset = new Asset();
					$objNewAsset->AssetModelId = $this->lstAssetModel->SelectedValue;
					$objNewAsset->LocationId = 5; // To Be Received
					$objNewAsset->AssetCode = $strAssetCode;
					// Set the AssetId to 0. This is so that it can be assigned to an AssetTransaction object without being saved to the db
					// We don't want to save this until btnSave_Click, because we don't want to create new assets that could get orphaned
					$objNewAsset->AssetId = 0;
					
					// This can be combined with the code below it
					$this->txtNewAssetCode->Text = null;
					$this->txtNewAssetCode->Enabled = true;
					$this->chkAutoGenerateAssetCode->Checked = false;
					$this->lstAssetModel->SelectedValue = null;
					$objNewAssetTransaction = new AssetTransaction();
					// The source location can either be 'Shipped'(2) or 'To Be Received'(5)
					$objNewAssetTransaction->SourceLocationId = $objNewAsset->LocationId;
					// $objNewAssetTransaction->AssetId = $objNewAsset->AssetId;
					$objNewAssetTransaction->Asset = $objNewAsset;
					$this->objAssetTransactionArray[] = $objNewAssetTransaction;
					// Set this boolean to true so that the datagrid updates
					$this->blnModifyAssets = true;
				}
			}
			
			elseif ($this->rblAssetType->SelectedValue == 'existing') {
			
				$strAssetCode = $this->txtNewAssetCode->Text;
				$blnDuplicate = false;
				$blnError = false;
				
				if ($strAssetCode) {
					// Begin error checking
					if ($this->objAssetTransactionArray) {
						foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
							if ($objAssetTransaction && $objAssetTransaction->Asset->AssetCode == $strAssetCode) {
								$blnError = true;
								$this->txtNewAssetCode->Warning = "That asset has already been added.";
							}
						}
					}
					
					if (!$blnError) {
						$objNewAsset = Asset::LoadByAssetCode($this->txtNewAssetCode->Text);
						if (!($objNewAsset instanceof Asset)) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset code does not exist.";
						}
						elseif ($objNewAsset->CheckedOutFlag) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset is checked out.";
						}
						elseif ($objNewAsset->ReservedFlag) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset is reserved.";
						}
						// Asset must either be 'To Be Received' or 'Shipped'
						elseif (!($objNewAsset->LocationId == 5 || $objNewAsset->LocationId == 2)) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset has already been received.";
						}
						elseif (!QApplication::AuthorizeEntityBoolean($objNewAsset, 2)) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "You do not have authorization to perform a transaction on this asset.";
						}
						// Check that the asset isn't already in another pending receipt
						elseif ($objNewAsset && $objPendingReceipt = AssetTransaction::PendingReceipt($objNewAsset->AssetId)) {
							if (($this->blnEditMode && $objPendingReceipt->TransactionId != $this->objReceipt->TransactionId) || !$this->blnEditMode) {
								$blnError = true;
								$this->txtNewAssetCode->Warning = 'That asset is already pending receipt.';
							}
							// If an asset was removed, and then added again in the same 'Edit', without saving in between, it needs to be removed from the ToDelete array
							// This seems totally absurd, but it is indeed the best way I could come up with to avoid a bug that wouldn't allow you to add an asset that was just removed.
							// This is also in shipment_edit.php - if you change one, change the other.
							else {
								if ($this->arrAssetTransactionToDelete) {
									foreach ($this->arrAssetTransactionToDelete as $key => $value) {
										if ($value) {
											$objOffendingAssetTransaction = AssetTransaction::Load($value);
											if ($objOffendingAssetTransaction->AssetId == $objNewAsset->AssetId) {
												$objOffendingAssetTransaction->Delete();
												unset($this->arrAssetTransactionToDelete[$key]);
											}
										}
									}
								}
							}
						}
						// Check that the asset isn't in a pending shipment. This should be impossible, as you can not add items to a shipment that are TBR (to be received) or shipped.
						// This means that they will be caught be the error checker above where LocationId must be 5 or 2
						elseif ($objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = 'That asset is in a pending shipment.';

						}
						// Create a new, but incomplete AssetTransaction
						if (!$blnError) {
							$this->txtNewAssetCode->Text = null;
							$this->txtNewAssetCode->Enabled = true;
							$this->chkAutoGenerateAssetCode->Checked = false;
							$this->lstAssetModel->SelectedValue = null;
							$objNewAssetTransaction = new AssetTransaction();
							// We can assign the AssetId for existing assets because they have already been saved to the db
							$objNewAssetTransaction->AssetId = $objNewAsset->AssetId;
							// The source location can either be 'Shipped'(2) or 'To Be Received'(5)
							$objNewAssetTransaction->SourceLocationId = $objNewAsset->LocationId;
							$this->objAssetTransactionArray[] = $objNewAssetTransaction;
							// Set this boolean to true so that the datagrid updates
							$this->blnModifyAssets = true;
						}
					}
				}
			}
		}
		
		public function btnAddInventory_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			
			// Assign the values from the user submitted form input
			$strInventoryModelCode = $this->txtNewInventoryModelCode->Text;
			$intTransactionQuantity = $this->txtQuantity->Text;
			// Check that the quantity is valid
			if (!$intTransactionQuantity || !ctype_digit($intTransactionQuantity) || $intTransactionQuantity <= 0) {
				$this->txtQuantity->Warning = "That is not a valid quantity.";
				$blnError = true;
			}
			elseif ($strInventoryModelCode) {
				$objNewInventoryModel = InventoryModel::LoadByInventoryModelCode($strInventoryModelCode);
				if ($objNewInventoryModel) {
					if ($this->objInventoryTransactionArray) {
						foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
							if ($objInventoryTransaction && $objInventoryTransaction->InventoryLocation->InventoryModelId == $objNewInventoryModel->InventoryModelId) {
								$blnError = true;
								$this->txtNewInventoryModelCode->Warning = "That inventory has already been added.";
							}
						}
					}
					if (!$blnError && !QApplication::AuthorizeEntityBoolean($objNewInventoryModel, 2)) {
						$blnError = true;
						$this->txtNewInventoryModelCode->Warning = "You do not have authorization to perform a transaction on this inventory model.";
					}
					if (!$blnError) {
						$objNewInventoryLocation = InventoryLocation::LoadByLocationIdInventoryModelId(5, $objNewInventoryModel->InventoryModelId);
						// If the 'To Be Received' inventory location for this InventoryModelId does not exist
						// Create a new InventoryLocation with a quantity of 0. The quantity will be added to this location when the receipt is saved
						if (!$objNewInventoryLocation) {
							$objNewInventoryLocation = new InventoryLocation();
							$objNewInventoryLocation->InventoryModelId = $objNewInventoryModel->InventoryModelId;
							$objNewInventoryLocation->LocationId = 5;
							$objNewInventoryLocation->Quantity = 0;
							$objNewInventoryLocation->Save();
						}
						
						// Create the new Inventory Transaction
						$objNewInventoryTransaction = new InventoryTransaction();
						$objNewInventoryTransaction->InventoryLocationId = $objNewInventoryLocation->InventoryLocationId;
						$objNewInventoryTransaction->Quantity = $intTransactionQuantity;
						$objNewInventoryTransaction->SourceLocationId = 5;
						$this->objInventoryTransactionArray[] = $objNewInventoryTransaction;
						
						// Reset the input values
						$this->txtNewInventoryModelCode->Text = null;
						$this->txtQuantity->Text = null;
						
						// This is so the datagrid knows to reload
						$this->blnModifyInventory = true;
					}
				}
				else {
					$blnError = true;
					$this->txtNewInventoryModelCode->Warning = "That is not a valid inventory code.";
				}
			}
			else {
				$blnError = true;
				$this->txtNewInventoryModelCode->Warning = "Please enter an inventory code.";
			}
		}		
		
		// Remove button click action for each asset in the datagrid
		// Item is added to an array 'ToDelete', and then deleted when the Save button is clicked
		public function btnRemoveAssetTransaction_Click($strFormId, $strControlId, $strParameter) {

			$intTempId = $strParameter;
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $key => $value) {
					if ($value->Asset->TempId == $intTempId) {
						// Prepare to delete from the database when the Save button is clicked
						if ($this->blnEditMode) {
							$this->arrAssetTransactionToDelete[] = $value->AssetTransactionId;
						}
						$this->blnModifyAssets = true;
						unset ($this->objAssetTransactionArray[$key]);
					}
				}
			}
		}

		// Remove button click action for each InventoryLocation in the datagrid
		// Item is added to an array 'ToDelete', and then deleted when the Save button is clicked
		public function btnRemoveInventory_Click($strFormId, $strControlId, $strParameter) {

			if ($this->objInventoryTransactionArray) {
				foreach ($this->objInventoryTransactionArray as $key => $value) {
					// If the button parameter matches the InventoryLocation and it is TBR (do not remove those from this InventoryLocation which have alreay been received)
					if ($value->InventoryLocation->InventoryLocationId == $strParameter && $value->DestinationLocationId == null) {
						if ($this->blnEditMode) {
							// Prepare to delete from the database when the Save button is clicked
							$this->arrInventoryTransactionToDelete[] = $value->InventoryTransactionId;
						}
						$this->blnModifyInventory = true;
						unset ($this->objInventoryTransactionArray[$key]);
					}
				}
			}
		}
		
		// Cancel Asset Click
		// We are not using this method anymore.
		// We cannot allow people to reverse transactions, because other users could have conducted a transaction on this asset after it was received
/*		public function btnCancelAssetTransaction_Click($strFormId, $strControlId, $strParameter) {
			
			$intAssetTransactionId = $strParameter;
			if ($this->objAssetTransactionArray) {
				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();
					
					$blnError = false;
					
					foreach ($this->objAssetTransactionArray as &$objAssetTransaction) {
						if ($objAssetTransaction->AssetTransactionId == $intAssetTransactionId) {
							
							// Set the Asset's location back to 'To Be Received'
							$objAssetTransaction->Asset->LocationId = $objAssetTransaction->SourceLocationId;
							$objAssetTransaction->Asset->Save();
							$objAssetTransaction->Asset = Asset::Load($objAssetTransaction->AssetId);
							
							// Set the DestinationLocation to be null to signify it is a pending AssetTransaction
							$objAssetTransaction->DestinationLocationId = null;
							$objAssetTransaction->Save();
							
							// Reload the AssetTransaction to properly generate an OLE if someone else edits this AssetTransaction
							$objAssetTransaction = AssetTransaction::Load($objAssetTransaction->AssetTransactionId);
						}
					}
					
					// Make sure the received flag is set to false
					if ($this->objReceipt->ReceivedFlag) {
						$this->objReceipt->ReceivedFlag = false;
						$this->objReceipt->Save();
						$this->objReceipt = Receipt::Load($this->objReceipt->ReceiptId);
					}
					// Commit all of the transactions to the database
					$objDatabase->TransactionCommit();
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					
					// Rollback the database transactions if an exception was thrown
					$objDatabase->TransactionRollback();
					
					if ($objExc->Class == 'AssetTransaction' || $objExc->Class == 'Asset') {
						$this->dtgAssetTransact->Warning = sprintf('That asset has been added, removed, or received by another user. You must <a href="receipt_edit.php?intReceiptId=%s">Refresh</a> to edit this receipt.', $this->objReceipt->ReceiptId);
					}
					else {
						throw new QOptimisticLockingException($objExc->Class);
					}
				}
			}
		}*/
		
		// Receive asset click
		public function btnReceiveAssetTransaction_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			
			$intAssetTransactionId = $strParameter;
			if ($this->objAssetTransactionArray) {
				
				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();
					// This boolean later lets us know if we need to flip the ReceivedFlag
					$blnAllAssetsReceived = true;
					foreach ($this->objAssetTransactionArray as &$objAssetTransaction) {
						if ($objAssetTransaction->AssetTransactionId == $intAssetTransactionId) {
							// Get the value of the location where this Asset is being received to
							$lstLocationAssetReceived = $this->GetControl('lstLocationAssetReceived' . $objAssetTransaction->AssetTransactionId);
							if ($lstLocationAssetReceived && $lstLocationAssetReceived->SelectedValue) {
								// Set the DestinationLocation of the AssetTransaction
								$objAssetTransaction->DestinationLocationId = $lstLocationAssetReceived->SelectedValue;
								$objAssetTransaction->Save();
								// Reload AssetTransaction to avoid Optimistic Locking Exception if this receipt is edited and saved.
								$objAssetTransaction = AssetTransaction::Load($objAssetTransaction->AssetTransactionId);
								// Move the asset to the new location
								$objAssetTransaction->Asset->LocationId = $lstLocationAssetReceived->SelectedValue;
								$objAssetTransaction->Asset->Save();
								$objAssetTransaction->Asset = Asset::Load($objAssetTransaction->AssetId);
							}
							else {
								$blnError = true;
								$lstLocationAssetReceived->Warning = "Please Select a Location.";
							}
						}
						// If any AssetTransaction still does not have a DestinationLocation, it is still Pending
						if (!$objAssetTransaction->DestinationLocationId) {
							$blnAllAssetsReceived = false;
						}
					}
				
					// If all the assets have been received, check that all the inventory has been received
					if ($blnAllAssetsReceived) {
						$blnAllInventoryReceived = true;
						if ($this->objInventoryTransactionArray) {
							foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
								if (!$objInventoryTransaction->DestinationLocationId) {
									$blnAllInventoryReceived = false;
								}
							}
						}
						// Set the entire receipt as received if assets and inventory have all been received
						if ($blnAllInventoryReceived) {
							$this->objReceipt->ReceivedFlag = true;
							$this->objReceipt->ReceiptDate = new QDateTime(QDateTime::Now);
							$this->objReceipt->Save();
							// Reload to get new timestamp to avoid optimistic locking if edited/saved again without reload
							$this->objReceipt = Receipt::Load($this->objReceipt->ReceiptId);
							// Update labels (specifically we want to update Received Date)
							$this->UpdateReceiptLabels();
						}
					}
					
					// Commit all of the transactions to the database
					$objDatabase->TransactionCommit();
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					
					// Rollback the database transactions if an exception was thrown
					$objDatabase->TransactionRollback();
					
					if ($objExc->Class == 'AssetTransaction' || $objExc->Class == 'Asset') {
						// Set the offending AssetTransaction DestinationLocation to null so that the value doesn't change in the datagrid
						if ($objExc->Class == 'AssetTransaction' && $this->objAssetTransactionArray)
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								if ($objAssetTransaction->AssetTransactionId == $objExc->EntityId) {
									$objAssetTransaction->DestinationLocationId = null;
								}
							}
						$this->dtgAssetTransact->Warning = sprintf('That asset has been added, removed, or received by another user. You must <a href="receipt_edit.php?intReceiptId=%s">Refresh</a> to edit this receipt.', $this->objReceipt->ReceiptId);
					}
					else {
						throw new QOptimisticLockingException($objExc->Class);
					}
				}
			}
		}
		
		// Cancel Inventory Click
/*		public function btnCancelInventoryTransaction_Click($strFormId, $strControlId, $strParameter) {
			
			$intInventoryTransactionId = $strParameter;
			if ($this->objInventoryTransactionArray) {
				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();
					
					foreach ($this->objInventoryTransactionArray as &$objInventoryTransaction) {
						if ($objInventoryTransaction->InventoryTransactionId == $intInventoryTransactionId) {
							
							// Remove Quantity from InventoryLocation
							$objNewInventoryLocation = InventoryLocation::LoadByLocationIdInventoryModelId($objInventoryTransaction->DestinationLocationId, $objInventoryTransaction->InventoryLocation->InventoryModelId);
							$objNewInventoryLocation->Quantity -= $objInventoryTransaction->Quantity;
							$objNewInventoryLocation->Save();
							
							// Add Quantity back to TBR InventoryLocation
							// Have to load the inventory location before and after. See comments in btnReceiveInventoryTransaction_Click for explanation
							$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
							$objInventoryTransaction->InventoryLocation->Quantity += $objInventoryTransaction->Quantity;
							$objInventoryTransaction->InventoryLocation->Save();
							$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
							
							// Set InventoryTransation->DestinationLocationId back to null
							$objInventoryTransaction->DestinationLocationId = null;
							$objInventoryTransaction->Save();
							// Reload the InventoryTransaction so that it will generate an OLE when appropriate
							$objInventoryTransaction = InventoryTransaction::Load($objInventoryTransaction->InventoryTransactionId);
						}
					}
					
					// Make sure the received flag is set to false
					if ($this->objReceipt->ReceivedFlag) {
						$this->objReceipt->ReceivedFlag = false;
						$this->objReceipt->Save();
						$this->objReceipt = Receipt::Load($this->objReceipt->ReceiptId);
					}					
					
					// Commit all of the transactions to the database
					$objDatabase->TransactionCommit();
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					
					// Rollback the database transactions if an exception was thrown
					$objDatabase->TransactionRollback();
					
					if ($objExc->Class == 'InventoryTransaction' || $objExc->Class == 'InventoryLocation') {
						$this->dtgInventoryTransact->Warning = sprintf('That inventory has been added, removed, or received by another user. You must <a href="receipt_edit.php?intReceiptId=%s">Refresh</a> to edit this receipt.', $this->objReceipt->ReceiptId);
					}
					else {
						throw new QOptimisticLockingException($objExc->Class);
					}
				}
			}
		}*/
		
		// Receive Inventory Click - Holy Shit
		public function btnReceiveInventoryTransaction_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			
			$intInventoryTransactionId = $strParameter;
			if ($this->objInventoryTransactionArray) {
				
				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();
									
					// This bool later tells us if we need to flip the ReceivedFlag for the entire Receipt
					$blnAllInventoryReceived = true;
					foreach ($this->objInventoryTransactionArray as &$objInventoryTransaction) {
						// If the button pressed is for this InventoryTransaction
						if ($objInventoryTransaction->InventoryTransactionId == $intInventoryTransactionId) {
							// Get the user submitted Location value selected for this row
							$lstLocationInventoryReceived = $this->GetControl('lstLocationInventoryReceived' . $objInventoryTransaction->InventoryTransactionId);
							if ($lstLocationInventoryReceived && $lstLocationInventoryReceived->SelectedValue) {
								// Get the user submitted Quantity value provided for this InventoryTransaction
								$txtQuantityReceived = $this->GetControl('txtQuantityReceived' . $objInventoryTransaction->InventoryTransactionId);
								// Error check the Quantity Value
								if ($txtQuantityReceived && $txtQuantityReceived->Text && ctype_digit($txtQuantityReceived->Text) && $txtQuantityReceived->Text >= 0 && $txtQuantityReceived->Text <= $objInventoryTransaction->Quantity) {

									// Set local values for user inputs
									$intQuantity = $txtQuantityReceived->Text;
									$intDestinationLocationId = $lstLocationInventoryReceived->SelectedValue;
									
									// Split the InventoryTransaction into two if it is only a partial receipt
									if ($objInventoryTransaction->Quantity > $intQuantity) {
										
										$objNewInventoryTransaction = new InventoryTransaction();
										$objNewInventoryTransaction->InventoryLocationId = $objInventoryTransaction->InventoryLocationId;
										$objNewInventoryTransaction->TransactionId = $this->objReceipt->TransactionId;
										$objNewInventoryTransaction->Quantity = $intQuantity;
										$objNewInventoryTransaction->SourceLocationId = $objInventoryTransaction->SourceLocationId;
										$objNewInventoryTransaction->DestinationLocationId = $intDestinationLocationId;
										$objNewInventoryTransaction->Save();
										
										// Add the new InventoryTransaction to the InvetnoryTransaction array for immediate display in the datagrid
										$this->objInventoryTransactionArray[] = $objNewInventoryTransaction;
										
										// Subtract the partial receipt quantity from the original InventoryTransaction
										$objInventoryTransaction->Quantity -= $intQuantity;
										
										// If a partial receipt has taken place, then all inventory has not been received
										$blnAllInventoryReceived = false;
									}
									else {
										$objInventoryTransaction->DestinationLocationId = $intDestinationLocationId;
									}
									
									// See if the InventoryLocation already exists
									$objNewInventoryLocation = InventoryLocation::LoadByLocationIdInventoryModelId($intDestinationLocationId, $objInventoryTransaction->InventoryLocation->InventoryModelId);
									// Create a new InventoryLocation if it doesn't exist already
									if (!$objNewInventoryLocation) {
										$objNewInventoryLocation = new InventoryLocation();
										$objNewInventoryLocation->LocationId = $intDestinationLocationId;
										$objNewInventoryLocation->InventoryModelId = $objInventoryTransaction->InventoryLocation->InventoryModelId;
										$objNewInventoryLocation->Quantity = 0;
									}
									
									// The problem here is that two different InventoryTransactions have the same InventoryLocation
									// So if you receive two of the same InventoryModels without a reload, it generates an OLE
									// So we were reloading one here, but not the other one, and that's the one that is changed the next time
									// So now I reload before, and if it's a genuine OLE, then the InventoryTransaction will catch it
									// It also reloads after
									// Remove the inventory from the 'To Be Received' Location
									$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
									$objInventoryTransaction->InventoryLocation->Quantity -= $intQuantity;
									$objInventoryTransaction->InventoryLocation->Save();
									$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
									

									// Add the inventory that came from 'TBR' into the new location
									$objNewInventoryLocation->Quantity += $intQuantity;
									$objNewInventoryLocation->Save();
									
									$objInventoryTransaction->Save();
									// Reload the InventoryTransaction to get the new timestamp so that it doesn't generate an optimistic locking exception
									$objInventoryTransaction = InventoryTransaction::Load($objInventoryTransaction->InventoryTransactionId);
								}
								else {
									$blnError = true;
									$this->dtgInventoryTransact->Warning = "Please enter a valid quantity.";
								}
							}
							else {
								$blnError = true;
								$this->dtgInventoryTransact->Warning = "Please Select a Location.";
							}
						}
						if (!$objInventoryTransaction->DestinationLocationId) {
							$blnAllInventoryReceived = false;
						}
					}
					// If all Inventory is received, check to see if all assets have been received
					if ($blnAllInventoryReceived) {
						$blnAllAssetsReceived = true;
						if ($this->objAssetTransactionArray) {
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								if (!$objAssetTransaction->DestinationLocationId) {
									$blnAllAssetsReceived = false;
								}
							}
						}
						// If all Inventory and Assets have been received
						if ($blnAllAssetsReceived) {
							// Flip the received flag for the entire Receipt
							$this->objReceipt->ReceivedFlag = true;
							$this->objReceipt->ReceiptDate = new QDateTime(QDateTime::Now);
							$this->objReceipt->Save();
							// Reload to get new timestamp to avoid optimistic locking if edited/saved again without reload
							$this->objReceipt = Receipt::Load($this->objReceipt->ReceiptId);
							// Update labels (specifically we want to update Received Date)
							$this->UpdateReceiptLabels();
						}
					}
					
					// Commit all of the transactions to the database
					$objDatabase->TransactionCommit();
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					
					// Rollback the database transactions if an exception was thrown
					$objDatabase->TransactionRollback();
					
					if ($objExc->Class == 'InventoryTransaction' || $objExc->Class == 'InventoryLocation') {
						$this->dtgInventoryTransact->Warning = sprintf('That inventory has been added, removed, or received by another user. You must <a href="receipt_edit.php?intReceiptId=%s">Refresh</a> to edit this receipt.%s', $this->objReceipt->ReceiptId, $objExc->Class.$objExc->EntityId);
					}
					else {
						throw new QOptimisticLockingException($objExc->Class);
					}
				}
			}
		}
		
		// Save a new or existing receipt
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			
			if ($this->objAssetTransactionArray && $this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::AssetInventory;
			}
			elseif ($this->objAssetTransactionArray) {
				$intEntityQtypeId = EntityQtype::Asset;
			}
			elseif ($this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::Inventory;
			}
			else {
				$blnError = true;
				$this->btnCancel->Warning = 'There are no assets nor inventory in this receipt.';
			}
			
			if (!$this->lstFromCompany->SelectedValue) {
				$blnError = true;
				$this->lstFromCompany->Warning = 'You must select a From Company';
			}
			if (!$this->lstFromContact->SelectedValue) {
				$blnError = true;
				$this->lstFromContact->Warning = 'You must select a From Contact';
			}
			if (!$this->lstToContact->SelectedValue) {
				$blnError = true;
				$this->lstToContact->Warning = 'You must select a To Contact';
			}
			if (!$this->lstToAddress->SelectedValue) {
				$blnError = true;
				$this->lstToAddress->Warning = 'You must select a To Address';
			}
			
			if (!$blnError) {
				if (!$this->blnEditMode) {
					
					try {
						// Get an instance of the database
						$objDatabase = QApplication::$Database[1];
						// Begin a MySQL Transaction to be either committed or rolled back
						$objDatabase->TransactionBegin();
						
						// Create the new transaction object and save it
						$this->objTransaction = new Transaction();
						$this->objTransaction->EntityQtypeId = $intEntityQtypeId;
						$this->objTransaction->TransactionTypeId = 7; // Receive
						$this->objTransaction->Note = $this->txtNote->Text;
						$this->objTransaction->Save();
						
						if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Asset) {
						// Assign different source and destinations depending on transaction type
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								// Save the asset just to update the modified_date field so it can trigger an Optimistic Locking Exception when appropriate
								if ($objAssetTransaction->Asset instanceof Asset) {
									// Save the asset to update the modified_date field so it can trigger an Optimistic Locking Exception when appropriate
									// Also set the location to 5 (TBR). This is in case the current LocationId is 2 (Shipped), because they can be received.
									$objAssetTransaction->Asset->LocationId = 5;
									// If the AssetId==0, then it is a newly created asset that hasn't been saved to the db yet
									// We have to create a new asset object and assign it to the AssetTransaction
									// Just resetting the values for the existing asset object won't work for some reason (not sure why).
									if ($objAssetTransaction->Asset->AssetId == 0) {
										$objNewAsset = new Asset();
										$objNewAsset->AssetModelId = $objAssetTransaction->Asset->AssetModelId;
										$objNewAsset->TempId = $objAssetTransaction->Asset->TempId;
										$objNewAsset->LocationId = $objAssetTransaction->Asset->LocationId;
										// If the asset was selected for autogeneration, it will be blank, so create the asset code here (right before save)
										if ($objAssetTransaction->Asset->AssetCode == '') {
											$objAssetTransaction->Asset->AssetCode = Asset::GenerateAssetCode();
										}
										$objNewAsset->AssetCode = $objAssetTransaction->Asset->AssetCode;
										// Save the new asset
										$objNewAsset->Save();
										
										// Assign any default custom field values
										CustomField::AssignNewEntityDefaultValues(1, $objNewAsset->AssetId);
										
										// Assign the new asset to the AssetTransaction
										$objAssetTransaction->Asset = $objNewAsset;
										
										$objAssetTransaction->NewAssetFlag = true;
									}
									else {
										$objAssetTransaction->NewAssetFlag = false;
										$objAssetTransaction->Asset->Save();
									}									
									// Create the new assettransaction object and save it
									$objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
									$objAssetTransaction->Save();
								}
							}
						}
						
						if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Inventory) {
							// Assign different source and destinations depending on transaction type
							foreach ($this->objInventoryTransactionArray as &$objInventoryTransaction) {
								
								// Finish the InventoryTransaction and save it
								$objInventoryTransaction->InventoryLocation->Quantity += $objInventoryTransaction->Quantity;
								$objInventoryTransaction->InventoryLocation->Save();
								$objInventoryTransaction->TransactionId = $this->objTransaction->TransactionId;
								$objInventoryTransaction->Save();
							}
						}
					
						$this->UpdateReceiptFields();
						$this->objReceipt->ReceivedFlag = false;
						$this->objReceipt->Save();
						
						$objDatabase->TransactionCommit();
						
						QApplication::Redirect('receipt_list.php');
					}
					catch (QExtendedOptimisticLockingException $objExc) {
						
						// Rollback the database
						$objDatabase->TransactionRollback();
						
						if ($objExc->Class == 'Asset') {
							// $this->btnRemoveAssetTransaction_Click($this->FormId, 'btnRemoveAsset' . $objExc->EntityId, $objExc->EntityId);
							$this->btnRemoveAssetTransaction_Click($this->FormId, null, $objExc->EntityId);
							
							$objAsset = Asset::Load($objExc->EntityId);
							if ($objAsset) {
								$this->btnCancel->Warning = sprintf('The Asset %s has been modified by another user and removed from this shipment. You may add the asset again or save the transaction without it.', $objAsset->AssetCode);
							}
							else {
								$this->btnCancel->Warning = 'An Asset has been deleted by another user and removed from this shipment.';
							}
						}
						if ($objExc->Class == 'AssetTransaction') {
							$this->btnCancel->Warning = 'This asset transaction has been modified by another user. You may reload the receipt and try your modifications again.';
						}
						if ($objExc->Class == 'InventoryLocation') {
							$this->btnRemoveInventory_Click($this->FormId, 'btnRemoveInventory' . $objExc->EntityId, $objExc->EntityId);
							$objInventoryLocation = InventoryLocation::Load($objExc->EntityId);
							if ($objInventoryLocation) {
								$this->btnCancel->Warning = sprintf('The Inventory %s has been modified by another user and removed from this shipment. You may add the inventory again or save the shipment without it.', $objInventoryLocation->InventoryModel->InventoryModelCode);
							}
							else {
								$this->btnCancel->Warning = 'Inventory has been deleted by another user and removed from this shipment.';
							}
						}
					}
				}
				elseif ($this->blnEditMode) {
					
					try {
						// Get an instance of the database
						$objDatabase = QApplication::$Database[1];
						// Begin a MySQL Transaction to be either committed or rolled back
						$objDatabase->TransactionBegin();
						
						// This should probably be changed to $this->objReceipt->Transaction
						$this->objTransaction = Transaction::Load($this->objReceipt->TransactionId);
						$this->objTransaction->EntityQtypeId = $intEntityQtypeId;
						$this->objTransaction->Note = $this->txtNote->Text;
						$this->objTransaction->Save();
						
						// Remove AssetTransactions that were removed when editing
						if ($this->arrAssetTransactionToDelete) {
							foreach ($this->arrAssetTransactionToDelete as $intAssetTransactionId) {
								$objAssetTransactionToDelete = AssetTransaction::Load($intAssetTransactionId);
								// Make sure that it wasn't added and then removed
								if ($objAssetTransactionToDelete) {
									// If a new asset was created in this receipt, it needs to be deleted
									if ($objAssetTransactionToDelete->NewAssetFlag) {
										$objAssetTransactionToDelete->Asset->Delete();
									}
									// Otherwise, just revert to it's old location
									else {
										// Change back location
										$objAssetTransactionToDelete->Asset->LocationId = $objAssetTransactionToDelete->SourceLocationId;
										$objAssetTransactionToDelete->Asset->Save();
									}
									// Delete the asset transaction
									$objAssetTransactionToDelete->Delete();
									unset($objAssetTransactionToDelete);
								}
							}
						}
						
						// Save existing AssetTransactions
						if ($this->objAssetTransactionArray) {
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								if (!$objAssetTransaction->AssetTransactionId) {
									$objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
									// This is done in case the original location is 'Shipped'(2), not 'To Be Received'(5)
									$objAssetTransaction->SourceLocationId = $objAssetTransaction->Asset->LocationId;
									$objAssetTransaction->Asset->LocationId = 5; // To Be Received
									// If the AssetId is 0 (it hasn't been saved to the database yet), then create a new Asset in the conventional way
									// We have to create a new asset object and assign it to the AssetTransaction
									// Just resetting the values for the existing asset object won't work for some reason (not sure why).
									if ($objAssetTransaction->Asset->AssetId == 0) {
										$objNewAsset = new Asset();
										$objNewAsset->AssetModelId = $objAssetTransaction->Asset->AssetModelId;
										$objNewAsset->TempId = $objAssetTransaction->Asset->TempId;
										$objNewAsset->LocationId = $objAssetTransaction->Asset->LocationId;
										// If the asset was selected for autogeneration, it will be blank, so create the asset code here (right before save)
										if ($objAssetTransaction->Asset->AssetCode == '') {
											$objAssetTransaction->Asset->AssetCode = Asset::GenerateAssetCode();
										}
										$objNewAsset->AssetCode = $objAssetTransaction->Asset->AssetCode;
										// Save the new asset
										$objNewAsset->Save();
										
										// Assign any default custom field values
										CustomField::AssignNewEntityDefaultValues(1, $objNewAsset->AssetId);
										
										// Associate the new asset with the AssetTransaction
										$objAssetTransaction->Asset = $objNewAsset;
										$objAssetTransaction->NewAssetFlag = true;
									}
									else {
										$objAssetTransaction->NewAssetFlag = false;
										$objAssetTransaction->Asset->Save();
									}
								}
								// Always save the asset transaction, to generate an Optimistic Locking Exception when appropriate
								$objAssetTransaction->Save();
								// Reload AssetTransaction to avoid Optimistic Locking Exception if this receipt is edited and saved.
								$objAssetTransaction = AssetTransaction::Load($objAssetTransaction->AssetTransactionId);
							}
						}
						
						// Remove InventoryTransactions
						if ($this->arrInventoryTransactionToDelete) {
							foreach ($this->arrInventoryTransactionToDelete as $intInventoryTransactionId) {
								$objInventoryTransactionToDelete = InventoryTransaction::Load($intInventoryTransactionId);
								// Make sure that it wasn't added then removed
								if ($objInventoryTransactionToDelete) {
									// Change back the quantity
									$objInventoryTransactionToDelete->InventoryLocation->Quantity -= $objInventoryTransactionToDelete->Quantity;
									$objInventoryTransactionToDelete->InventoryLocation->Save();
									// Delete the InventoryTransaction
									$objInventoryTransactionToDelete->Delete();
									unset($objInventoryTransactionToDelete);
								}
							}
						}
						
						// Save InventoryTransactions
						if ($this->objInventoryTransactionArray) {
							foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
								if (!$objInventoryTransaction->InventoryTransactionId) {
								
									// Reload the InventoryLocation. If it was deleted and added in the same save click, then it will throw an Optimistic Locking Exception
									$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
									$objInventoryTransaction->InventoryLocation->Quantity += $objInventoryTransaction->Quantity;
									$objInventoryTransaction->TransactionId = $this->objTransaction->TransactionId;
									$objInventoryTransaction->InventoryLocation->Save();
									$SourceLocationId = 5; // To Be Received
									$objInventoryTransaction->SourceLocationId = $SourceLocationId;
								}
								// Always save the InventoryTransaction, to generate an Optimistic Locking Exception when appropriate
								$objInventoryTransaction->Save();
								// Reload the InventoryTransaction to get the new timestamp so that it doesn't generate an optimistic locking exception
								$objInventoryTransaction = InventoryTransaction::Load($objInventoryTransaction->InventoryTransactionId);
							}
						}
						
						// Check to see if all Inventory and Assets have been received (if the final entity was removed from the receipt without receiving it).
						// Check to see if all assets have been received
						$blnAllAssetsReceived = true;
						if ($this->objAssetTransactionArray) {
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								if (!$objAssetTransaction->DestinationLocationId) {
									$blnAllAssetsReceived = false;
								}
							}
						}
						
						// Check to see if all inventory have been received
						$blnAllInventoryReceived = true;
						if ($this->objInventoryTransactionArray) {
							foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
								if (!$objInventoryTransaction->DestinationLocationId) {
									$blnAllInventoryReceived = false;
								}
							}
						}
						
						// If all Inventory and Assets have been received
						if ($blnAllAssetsReceived && $blnAllInventoryReceived) {
							// Flip the received flag for the entire Receipt
							$this->objReceipt->ReceivedFlag = true;
							$this->objReceipt->ReceiptDate = new QDateTime(QDateTime::Now);						
						}
						
						$this->UpdateReceiptFields();
						$this->UpdateReceiptLabels();
						$this->objReceipt->Save();
						// Reload to get new timestamp to avoid optimistic locking if edited/saved again without reload
						$this->objReceipt = Receipt::Load($this->objReceipt->ReceiptId);
						$this->DisplayLabels();
						
						$objDatabase->TransactionCommit();
					}
					catch (QExtendedOptimisticLockingException $objExc) {
						
						$objDatabase->TransactionRollback();
						
						if ($objExc->Class == 'Receipt' || $objExc->Class == 'AssetTransaction' || $objExc->Class == 'InventoryTransaction') {
							$this->btnCancel->Warning = sprintf('This receipt has been modified by another user. You must <a href="receipt_edit.php?intReceiptId=%s">Refresh</a> to edit this receipt.', $this->objReceipt->ReceiptId);
						}
						// This shouldn't be possible. What if they are on the same receipt?
						elseif ($objExc->Class == 'Asset') {
							// $this->btnRemoveAssetTransaction_Click($this->FormId, 'btnRemoveAsset' . $objExc->EntityId, $objExc->EntityId);
							$this->btnRemoveAssetTransaction_Click($this->FormId, null, $objExc->EntityId);
							$objAsset = Asset::Load($objExc->EntityId);
							if ($objAsset) {
								$this->btnCancel->Warning = sprintf('The Asset %s has been modified by another user and removed from this shipment. You may add the asset again or save the transaction without it.', $objAsset->AssetCode);
							}
							else {
								$this->btnCancel->Warning = 'An Asset has been deleted by another user and removed from this shipment.';
							}
						}
						elseif ($objExc->Class == 'InventoryLocation') {
							$this->btnRemoveInventory_Click($this->FormId, 'btnRemoveInventory' . $objExc->EntityId, $objExc->EntityId);
							$objInventoryLocation = InventoryLocation::Load($objExc->EntityId);
							if ($objInventoryLocation) {
								$this->btnCancel->Warning = sprintf('The Inventory %s has been modified by another user and removed from this shipment. You may add the inventory again or save the shipment without it.', $objInventoryLocation->InventoryModel->InventoryModelCode);
							}
							else {
								$this->btnCancel->Warning = 'Inventory has been deleted by another user and removed from this shipment.';
							}
						}
						else {
							throw new QOptimisticLockingException($objExc->Class);
						}
					}
				}
			}			
		}
		
		// Delete a receipt
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					if ($objAssetTransaction->blnReturnReceivedStatus()) {
						$blnError = true;
						$this->btnDelete->Warning = 'All Assets and Inventory must be Pending to delete this receipt.';
					}
				}
			}
			
			if ($this->objInventoryTransactionArray) {
				foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
					if ($objInventoryTransaction->blnReturnReceivedStatus()) {
						$blnError = true;
						$this->btnDelete->Warning = 'All Assets and Inventory must be Pending to delete this receipt.';
					}
				}
			}
			
			if (!$blnError) {
				
				// Take out the inventory from the TBR InventoryLocation
				if ($this->objInventoryTransactionArray) {
					foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
						$objInventoryTransaction->InventoryLocation->Quantity -= $objInventoryTransaction->Quantity;
						$objInventoryTransaction->InventoryLocation->Save();
					}
				}
				
				// Delete any assets that were created while scheduling this receipt
				if ($this->objAssetTransactionArray) {
					foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
						if ($objAssetTransaction->NewAssetFlag) {
							$objAssetTransaction->Asset->Delete();
						}
					}
				}
				
				// Load the Transaction
				$this->objTransaction = Transaction::Load($this->objReceipt->TransactionId);
				// Delete the Transaction Object and let it MySQL CASCADE down to asset_transaction, inventory_transaction, and receipt
				$this->objTransaction->Delete();

				$this->RedirectToListPage();

			}
		}
		
		//*****************
		// CUSTOM METHODS
		//*****************

		// Protected Update Methods
		protected function UpdateReceiptFields() {
			$this->objReceipt->TransactionId = $this->objTransaction->TransactionId;
			if (!$this->blnEditMode) {
				$this->objReceipt->ReceiptNumber = Receipt::LoadNewReceiptNumber();
			}
			$this->objReceipt->FromCompanyId = $this->lstFromCompany->SelectedValue;
			$this->objReceipt->FromContactId = $this->lstFromContact->SelectedValue;
			$this->objReceipt->ToContactId = $this->lstToContact->SelectedValue;
			$this->objReceipt->ToAddressId = $this->lstToAddress->SelectedValue;
			$this->objReceipt->DueDate = $this->calDueDate->DateTime;
			$this->objTransaction->Note = $this->txtNote->Text;
			
			// Reload the Assets and inventory locations so that they don't trigger an OLE if edit/save adding assets or inventory multiple times
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					$objAssetTransaction->Asset = Asset::Load($objAssetTransaction->AssetId);
				}
			}
			if ($this->objInventoryTransactionArray) {
				foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
					$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
				}
			}			
		}
		
		// Resets the receipt controls on Cancel Click
		protected function UpdateReceiptControls() {
			$this->lstFromCompany->SelectedValue = $this->objReceipt->FromCompanyId;
			$this->lstFromCompany_Select();
			$this->lstFromContact->SelectedValue = $this->objReceipt->FromContactId;
			$this->lstToContact->SelectedValue = $this->objReceipt->ToContactId;
			$this->lstToAddress->SelectedValue = $this->objReceipt->ToAddressId;
			$this->txtNote->Text = $this->objReceipt->Transaction->Note;
			$this->calDueDate->DateTime = $this->objReceipt->DueDate;
		}		
		
		protected function UpdateReceiptLabels() {
			$this->lblFromCompany->Text = $this->objReceipt->FromCompany->__toString();
			$this->lblFromContact->Text = $this->objReceipt->FromContact->__toString();
			$this->lblToContact->Text = $this->objReceipt->ToContact->__toString();
			$this->lblToAddress->Text = $this->objReceipt->ToAddress->__toString();
			$this->pnlNote->Text = nl2br($this->objReceipt->Transaction->Note);
			$this->lblDueDate->Text = ($this->objReceipt->DueDate) ? $this->objReceipt->DueDate->__toString() : '';
			$this->lblReceiptDate->Text = ($this->objReceipt->ReceiptDate) ? $this->objReceipt->ReceiptDate->__toString() : '';
		}
		
		protected function DisplayLabels() {
			
			// Hide inputs
			$this->lstFromCompany->Display = false;
			$this->lstFromContact->Display = false;
			$this->lstToContact->Display = false;
			$this->lstToAddress->Display = false;
			$this->txtNote->Display = false;
			$this->calDueDate->Display = false;
			if ($this->blnEditMode) {
				$this->dtgAssetTransact->RemoveColumnByName('&nbsp;');
				$this->dtgInventoryTransact->RemoveColumnByName('&nbsp;');
			}
			$this->btnSave->Display = false;
			$this->btnCancel->Display = false;
			$this->rblAssetType->Display = false;
			$this->txtNewAssetCode->Display = false;
			$this->lstAssetModel->Display = false;
			$this->chkAutoGenerateAssetCode->Display = false;
			$this->btnAddAsset->Display = false;
			$this->txtNewInventoryModelCode->Display = false;
			$this->txtQuantity->Display = false;
			$this->btnAddInventory->Display = false;
			
			// Display labels
			$this->lblFromCompany->Display = true;
			$this->lblFromContact->Display = true;
			$this->lblToContact->Display = true;
			$this->lblToAddress->Display = true;
			$this->pnlNote->Display = true;
			$this->lblDueDate->Display = true;
			$this->btnEdit->Display = true;
			$this->btnDelete->Display = true;
			if ($this->blnEditMode) {
				$this->dtgAssetTransact->AddColumn(new QDataGridColumn('&nbsp;', '<?= $_FORM->lstLocationAssetReceived_Render($_ITEM) ?> <?= $_FORM->btnReceiveAssetTransaction_Render($_ITEM) ?>', array('CssClass' => "dtgcolumn", 'HtmlEntities' => false)));
				$this->dtgInventoryTransact->AddColumn(new QDataGridColumn('&nbsp;', '<?= $_FORM->lstLocationInventoryReceived_Render($_ITEM) ?> <?= $_FORM->txtQuantityReceived_Render($_ITEM) ?> <?= $_FORM->btnReceiveInventoryTransaction_Render($_ITEM) ?>', array('CssClass' => "dtgcolumn", 'HtmlEntities' => false)));
			}
			$this->lblNewFromCompany->Display = false;
			$this->lblNewFromContact->Display = false;
			$this->lblNewToContact->Display = false;
			$this->lblNewToAddress->Display = false;
		}
		
		protected function DisplayInputs() {
			
			// Hide labels
			$this->lblFromCompany->Display = false;
			$this->lblFromContact->Display = false;
			$this->lblToContact->Display = false;
			$this->lblToAddress->Display = false;
			$this->pnlNote->Display = false;
			$this->lblDueDate->Display = false;
			$this->btnEdit->Display = false;
			$this->btnDelete->Display = false;
			if ($this->blnEditMode) {
				$this->dtgAssetTransact->RemoveColumnByName('&nbsp;');
				$this->dtgInventoryTransact->RemoveColumnByName('&nbsp;');
			}			
			
			// Display inputs
			$this->lstFromCompany->Display = true;
			$this->lstFromContact->Display = true;
			$this->lstToContact->Display = true;
			$this->lstToAddress->Display = true;
			$this->txtNote->Display = true;
			$this->calDueDate->Display = true;
			$this->btnSave->Display = true;
			$this->btnCancel->Display = true;
			if (!$this->objReceipt->ReceivedFlag) {
				$this->rblAssetType->SelectedIndex = 0;
				$this->rblAssetType->Display = true;
				$this->txtNewAssetCode->Text = '';
				$this->txtNewAssetCode->Enabled = true;
				$this->txtNewAssetCode->Display = true;
				$this->lstAssetModel->SelectedIndex = 0;
				$this->lstAssetModel->Display = false;
				$this->chkAutoGenerateAssetCode->Checked = false;
				$this->chkAutoGenerateAssetCode->Display = false;
				$this->btnAddAsset->Display = true;
				$this->txtNewInventoryModelCode->Display = true;
				$this->txtQuantity->Display = true;
				$this->btnAddInventory->Display = true;
	    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('&nbsp;', '<?= $_FORM->RemoveAssetColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    	$this->dtgInventoryTransact->AddColumn(new QDataGridColumn('&nbsp;', '<?= $_FORM->RemoveInventoryColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
			}
			$this->lblNewFromCompany->Display = true;
			$this->lblNewFromContact->Display = true;
			$this->lblNewToContact->Display = true;
			$this->lblNewToAddress->Display = true;
		}
		
		// This method is run when the new entity edit dialog box is closed
		public function CloseNewPanel($blnUpdates) {
			$this->dlgNew->HideDialogBox();
		}
		
		public function CloseNewFromCompanyPanel($blnUpdates) {
			$this->lstFromCompany_Select();
			$this->CloseNewPanel($blnUpdates);
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/receipt_edit.php.inc as the included HTML template file
	ReceiptEditForm::Run('ReceiptEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/receiving/receipt_edit.tpl.php');
?>