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
	require_once(__FORMBASE_CLASSES__ . '/InventoryModelEditFormBase.class.php');

	/**
	 * 
	 * @package Application
	 * @subpackage FormDraftObjects
	 * 
	 */
	class InventoryModelEditForm extends InventoryModelEditFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		// Shortcut Menu
		protected $ctlShortcutMenu;		
		
		protected $ctlInventoryEdit;
		protected $ctlInventoryTransact;
		protected $intTransactionTypeId;
		
		// These are needed for the hovertips in the Shipping/Receiving datagrid
		public $objAssetTransactionArray;
		public $objInventoryTransactionArray;

		// Override the Form_Create method in InventoryEditFormBase.inc
		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			// QApplication::$Database[1]->EnableProfiling();
			
			// Assign the Transaction Type from the query string, if it exists.
			$this->intTransactionTypeId = QApplication::QueryString('intTransactionTypeId');
			
			// Create the two composite controls
			$this->ctlInventoryEdit_Create();
			$this->ctlInventoryTransact_Create();	
			
			// Display transaction form if passed an intTransactionTypeId (from shortcut menu)
			if ($this->intTransactionTypeId) {
				$this->DisplayEdit(false);
				$this->DisplayTransaction(true, $this->intTransactionTypeId);
			}
			// Display the edit form
			else {
				$this->DisplayTransaction(false);
				$this->DisplayEdit(true);
			}
		}
		
		protected function Form_Exit() {
			// QApplication::$Database[1]->OutputProfiling();
		}
		
		// Datagrid values must be assigned here because they are not encoded like all other controls
		protected function Form_PreRender() {
			
			// If an existing InventoryModel is being edited, render the Quantities by Location and Transaction history datagrids
			if ($this->ctlInventoryEdit->blnEditMode) {

				// Render the Quantities by Location datagrid
				$objExpansionMap[InventoryLocation::ExpandLocation] = true;
				$this->ctlInventoryEdit->dtgInventoryQuantities->TotalItemCount = InventoryLocation::CountByInventoryModelIdLocations($this->ctlInventoryEdit->objInventoryModel->InventoryModelId);
				// If there are no rows in the datagrid, do not show the header column
				if ($this->ctlInventoryEdit->dtgInventoryQuantities->TotalItemCount == 0) {
					$this->ctlInventoryEdit->dtgInventoryQuantities->ShowHeader = false;
				}
				else {
					$this->ctlInventoryEdit->dtgInventoryQuantities->ShowHeader = true;
					// $this->ctlInventoryEdit->dtgInventoryQuantities->DataSource = InventoryLocation::LoadArrayByInventoryModelId($this->ctlInventoryEdit->objInventoryModel->InventoryModelId, $this->ctlInventoryEdit->dtgInventoryQuantities->SortInfo, $this->ctlInventoryEdit->dtgInventoryQuantities->LimitInfo, $objExpansionMap);
					$this->ctlInventoryEdit->dtgInventoryQuantities->DataSource = InventoryLocation::LoadArrayByInventoryModelIdLocations($this->ctlInventoryEdit->objInventoryModel->InventoryModelId, $this->ctlInventoryEdit->dtgInventoryQuantities->SortInfo, $this->ctlInventoryEdit->dtgInventoryQuantities->LimitInfo, $objExpansionMap);
				}
				$objExpansionMap = null;

			// Specify the local databind method this datagrid will use
			$this->ctlInventoryEdit->dtgInventoryTransaction->SetDataBinder('dtgInventoryTransaction_Bind');
			
			// Specify the local databind method this datagrid will use
			$this->ctlInventoryEdit->dtgShipmentReceipt->SetDataBinder('dtgShipmentReceipt_Bind');
			
			}

			// If InventoryLocations are in the array, finish setting up the datagrid of InventorieLocations prepared for a transaction
			if ($this->ctlInventoryTransact->objInventoryLocationArray) {
				// Using the array instead of querying the database again. This means sorting will not work because the db is not being queried each time.
				$this->ctlInventoryTransact->dtgInventoryTransact->TotalItemCount = count($this->ctlInventoryTransact->objInventoryLocationArray);
				$this->ctlInventoryTransact->dtgInventoryTransact->DataSource = $this->ctlInventoryTransact->objInventoryLocationArray;
				$this->ctlInventoryTransact->dtgInventoryTransact->ShowHeader = true;
			}
			// Do not show the header row if the table is empty.
			else {
				$this->ctlInventoryTransact->dtgInventoryTransact->TotalItemCount = 0;
				$this->ctlInventoryTransact->dtgInventoryTransact->ShowHeader = false;
			}
		}
		
		protected function dtgInventoryTransaction_Bind() {

			$this->ctlInventoryEdit->dtgInventoryTransaction->TotalItemCount = InventoryTransaction::CountShipmentReceiptByInventoryModelId($this->ctlInventoryEdit->objInventoryModel->InventoryModelId, false);
			if ($this->ctlInventoryEdit->dtgInventoryTransaction->TotalItemCount === 0) {
				$this->ctlInventoryEdit->dtgInventoryTransaction->ShowHeader = false;
			}
			else {
				$this->ctlInventoryEdit->dtgInventoryTransaction->ShowHeader = true;
			}

			$objClauses = array();
			if ($objClause = $this->ctlInventoryEdit->dtgInventoryTransaction->OrderByClause) {
				array_push($objClauses, $objClause);
			}
			if ($objClause = $this->ctlInventoryEdit->dtgInventoryTransaction->LimitClause) {
				array_push($objClauses, $objClause);
			}
			if ($objClause = QQ::Expand(QQN::InventoryTransaction()->Transaction->TransactionType))
				array_push($objClauses, $objClause);
			if ($objClause = QQ::Expand(QQN::InventoryTransaction()->SourceLocation))
				array_push($objClauses, $objClause);
			if ($objClause = QQ::Expand(QQN::InventoryTransaction()->DestinationLocation))
				array_push($objClauses, $objClause);
				
			$objCondition = QQ::AndCondition(QQ::Equal(QQN::InventoryTransaction()->InventoryLocation->InventoryModelId, $this->ctlInventoryEdit->objInventoryModel->InventoryModelId), QQ::NotEqual(QQN::InventoryTransaction()->Transaction->TransactionTypeId, 6), QQ::NotEqual(QQN::InventoryTransaction()->Transaction->TransactionTypeId, 7));				
				
			$this->ctlInventoryEdit->dtgInventoryTransaction->DataSource = InventoryTransaction::QueryArray($objCondition, $objClauses);
			
		}
		
		protected function dtgShipmentReceipt_Bind() {
			// Get Total Count for Pagination
			
			$objClauses = array();
			
			$this->ctlInventoryEdit->dtgShipmentReceipt->TotalItemCount = InventoryTransaction::CountShipmentReceiptByInventoryModelId($this->ctlInventoryEdit->objInventoryModel->InventoryModelId);
			
			if ($this->ctlInventoryEdit->dtgShipmentReceipt->TotalItemCount === 0) {
				$this->ctlInventoryEdit->lblShipmentReceipt->Display = false;
				$this->ctlInventoryEdit->dtgShipmentReceipt->ShowHeader = false;
			}
			else {
			
				$objClauses = array();
				if ($objClause = QQ::OrderBy(QQN::InventoryTransaction()->Transaction->CreationDate, false)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = $this->ctlInventoryEdit->dtgShipmentReceipt->LimitClause) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->Transaction->Shipment)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->Transaction->Receipt)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->SourceLocation)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->DestinationLocation)) {
					array_push($objClauses, $objClause);			
				}
				
				$objCondition = QQ::AndCondition(QQ::Equal(QQN::InventoryTransaction()->InventoryLocation->InventoryModelId, $this->ctlInventoryEdit->objInventoryModel->InventoryModelId), QQ::OrCondition(QQ::Equal(QQN::InventoryTransaction()->Transaction->TransactionTypeId, 6), QQ::Equal(QQN::InventoryTransaction()->Transaction->TransactionTypeId, 7)));
				
				$this->ctlInventoryEdit->dtgShipmentReceipt->DataSource = InventoryTransaction::QueryArray($objCondition, $objClauses);
			}
		}		
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}		
		
		// Create the InventoryEdit composite control
		protected function ctlInventoryEdit_Create() {
			$this->ctlInventoryEdit = new QInventoryEditComposite($this);
		}
		
		// Create the InventoryTransact Composite control
		protected function ctlInventoryTransact_Create() {
			$this->ctlInventoryTransact = new QInventoryTransactComposite($this);
		}		

		public function SetupInventoryModel($objCaller) {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			// Overridden from InventoryModelEditForm to add the $objCaller parameter
			$intInventoryModelId = QApplication::QueryString('intInventoryModelId');
			
			if (($intInventoryModelId)) {
				$objCaller->objInventoryModel = InventoryModel::Load(($intInventoryModelId));

				if (!$objCaller->objInventoryModel)
					throw new Exception('Could not find a InventoryModel object with PK arguments: ' . $intInventoryModelId);

				$objCaller->strTitleVerb = QApplication::Translate('Edit');
				$objCaller->blnEditMode = true;
			} else {
				$objCaller->objInventoryModel = new InventoryModel();
				$objCaller->strTitleVerb = QApplication::Translate('Create');
				$objCaller->blnEditMode = false;
			}
			QApplication::AuthorizeEntity($objCaller->objInventoryModel, $objCaller->blnEditMode);			
		}
		
		// Render the Remove Button Column in the Inventory Transaction datagrid
		public function RemoveColumn_Render(InventoryLocation $objInventoryLocation) {
			
			// If the transaction is a Move or a Take Out, use the InventoryLocationId as the Action Parameter
			if ($this->ctlInventoryTransact->intTransactionTypeId == 1 || $this->ctlInventoryTransact->intTransactionTypeId == 5) {
	      $strControlId = 'btnRemove' . $objInventoryLocation->InventoryLocationId;
			}
			// If the transaction is a Restock, the Action Parameter must be InventoryModelId, because the InventoryLocationId does not exist yet.
			elseif ($this->ctlInventoryTransact->intTransactionTypeId == 4) {
				$strControlId = 'btnRemove' . $objInventoryLocation->InventoryModelId;
			}
			
      $btnRemove = $this->GetControl($strControlId);
      if (!$btnRemove) {
        // Create the Remove button for this row in the DataGrid
        // Use ActionParameter to specify the ID of the InventoryLocation or InventoryModelId, depending on the transaction type
        $btnRemove = new QButton($this->ctlInventoryTransact->dtgInventoryTransact, $strControlId);
        $btnRemove->Text = 'Remove';
        // If the transaction is a Move or a Take Out, use the InventoryLocationId as the Action Parameter
				if ($this->ctlInventoryTransact->intTransactionTypeId == 1 || $this->ctlInventoryTransact->intTransactionTypeId == 5) {
	        $btnRemove->ActionParameter = $objInventoryLocation->InventoryLocationId;
				}
				// If the transaction is a Restock, the Action Parameter must be InventoryModelId, because the InventoryLocationId does not exist yet.
				elseif ($this->ctlInventoryTransact->intTransactionTypeId == 4) {
					$btnRemove->ActionParameter = $objInventoryLocation->InventoryModelId;
				}
        $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemove_Click'));
        $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemove_Click'));
        $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $btnRemove->CausesValidation = false;
	    }
	    return $btnRemove->Render(false);
		}
		
		// Remove button click action for each InventoryLocation in the datagrid
		public function btnRemove_Click($strFormId, $strControlId, $strParameter) {

			if ($this->ctlInventoryTransact->objInventoryLocationArray) {
				foreach ($this->ctlInventoryTransact->objInventoryLocationArray as $key => $value) {
					// If the transaction type is a move or a take out, and the InventoryLocationIds match, remove the index from the array.
					// Or if the transaction type is a restock and the InventoryModelId matches, remove the index from the array.
					if ((($this->ctlInventoryTransact->intTransactionTypeId == 1 || $this->ctlInventoryTransact->intTransactionTypeId == 4) && $value->InventoryLocationId == $strParameter) || ($this->ctlInventoryTransact->intTransactionTypeId == 4 && $value->InventoryModelId == $strParameter)) {
						unset ($this->ctlInventoryTransact->objInventoryLocationArray[$key]);
					}
				}
			}
		}
		
		// Display the edit form
		public function DisplayEdit($blnDisplay) {
			if ($blnDisplay) {
				$this->ctlInventoryEdit->Display = true;
			}
			else {
				$this->ctlInventoryEdit->Display = false;
			}
		}
		
		// Display the transaction form
		public function DisplayTransaction($blnDisplay, $intTransactionTypeId = null) {
			if ($blnDisplay) {
				$this->ctlInventoryTransact->SetupDisplay($intTransactionTypeId);
				$this->ctlInventoryTransact->Display = true;
			}
			else {
				$this->ctlInventoryTransact->Display = false;
			}
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/inventory_location_edit.php.inc as the included HTML template file
	InventoryModelEditForm::Run('InventoryModelEditForm', 'inventory_edit.tpl.php');
?>