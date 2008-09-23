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

class QInventoryTransactComposite extends QControl {
	
	public $blnEditMode;
	public $objParentObject;
	public $strTitleVerb;
	public $objInventoryLocationArray;
	public $dtgInventoryTransact;
	public $objInventoryModel;
	
	protected $btnLookup;
	protected $btnSave;
	protected $btnCancel;
	protected $btnAdd;
	protected $btnRemove;
	protected $lstDestinationLocation;
	protected $txtNote;
	protected $txtNewInventoryModelCode;
	protected $lstSourceLocation;
	protected $txtQuantity;
	protected $objTransaction;
	protected $objInventoryTransaction;
	protected $intTransactionTypeId;
	
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
    // This is necessary for blnEditMode, but not much else.
    // objInventoryModel is only declared because this is called, even though it is not used.
    $this->objParentObject->SetupInventoryModel($this);

    // Create the blank InventoryLocationArray
    $this->objInventoryLocationArray = array();
    
    $this->lstSourceLocation_Create();
    $this->txtNote_Create();
    $this->txtNewInventoryModelCode_Create();
    $this->lstDestinationLocation_Create();
    $this->txtQuantity_Create();
    $this->btnLookup_Create();
    $this->btnSave_Create();
    $this->btnCancel_Create();
    $this->btnAdd_Create();    
    $this->dtgInventoryTransact_Create();
    
	}
	
	// This method must be declared in all composite controls
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
		require('inventory_transact_control.inc.php');
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
	
	// Create and Setup lstDestinationLocation
	protected function lstDestinationLocation_Create() {
		$this->lstDestinationLocation = new QListBox($this);
		$this->lstDestinationLocation->Name = 'Location';
		$this->lstDestinationLocation->Required = false;
		$this->lstDestinationLocation->AddItem('- Select One -', null);
		$objLocationArray = Location::LoadAllLocations(false, false, 'short_description');
		if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
			$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
			$this->lstDestinationLocation->AddItem($objListItem);
		}
		$this->lstDestinationLocation->CausesValidation = false;
	}
	
	// Create the Note text field
	protected function txtNote_Create() {
		$this->txtNote = new QTextBox($this);
		$this->txtNote->Name = 'Note';
		$this->txtNote->TextMode = QTextMode::MultiLine;
		$this->txtNote->Columns = 80;
		$this->txtNote->Rows = 4;
		$this->txtNote->Required = false;
		$this->txtNote->CausesValidation = false;
	}
	
	// Create the text field to enter new inventory_model codes to add to the transaction
	// Eventually this field will receive information from the AML
	protected function txtNewInventoryModelCode_Create() {
		$this->txtNewInventoryModelCode = new QTextBox($this);
		$this->txtNewInventoryModelCode->Name = 'Inventory Code';
		$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnLookup_Click'));
		$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}
	
	// Create and Setup lstSourceLocation
	protected function lstSourceLocation_Create() {
		$this->lstSourceLocation = new QListBox($this);
		$this->lstSourceLocation->Name = 'Location';
		$this->lstSourceLocation->Required = false;
		$this->lstSourceLocation->AddItem('- Select One -', null);
		$this->lstSourceLocation->CausesValidation = false;
		$this->lstSourceLocation->Enabled = false;
	}

	protected function txtQuantity_Create() {
		$this->txtQuantity = new QTextBox($this);
		$this->txtQuantity->Name = 'Quantity';
		$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtQuantity->Enabled = false;
	}
	
	// Create the lookup button
	protected function btnLookup_Create() {
		$this->btnLookup = new QButton($this);
		$this->btnLookup->Text = 'Lookup';
		$this->btnLookup->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnLookup_Click'));
		$this->btnLookup->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnLookup_Click'));
		$this->btnLookup->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnLookup->CausesValidation = false;
	}
	
	// Create the save button
	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnSave->CausesValidation = false;
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

	// Setup Add Button
	protected function btnAdd_Create() {
		$this->btnAdd = new QButton($this);
		$this->btnAdd->Text = 'Add';
		$this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		$this->btnAdd->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		$this->btnAdd->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnAdd->CausesValidation = false;
	}
	
	// Setup the datagrid
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
    
    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Inventory Code', '<?= $_ITEM->InventoryModel->__toStringWithLink("bluelink") ?>', 'SortByCommand="inventory_location__inventory_model_id__inventory_model_code ASC"', 'ReverseSortByCommand="inventory_location__inventory_model_id__inventory_model_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Inventory Model', '<?= $_ITEM->InventoryModel->ShortDescription ?>', 'Width=200', 'SortByCommand="inventory_location__inventory_model_id__short_description ASC"', 'ReverseSortByCommand="inventory_location__inventory_model_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Source Location', '<?= $_ITEM->Location->__toString() ?>', 'CssClass="dtg_column"'));
    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Quantity', '<?= $_ITEM->intTransactionQuantity ?>', 'CssClass=dtg_column'));
    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveColumn_Render($_ITEM) ?>', 'CssClass=dtg_column', 'HtmlEntities=false'));

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
	}
	
	// Lookup Button Click
	// This button is only displayed for move or take out transactions
	public function btnLookup_Click($strFormId, $strControlId = null, $strParameter = null) {
		
		// Assign the value submitted from the form
		$strInventoryModelCode = $this->txtNewInventoryModelCode->Text;
		
		if ($strInventoryModelCode) {
			// Load the inventory model object based on the inventory_model_code submitted
			$objInventoryModel = InventoryModel::LoadByInventoryModelCode($strInventoryModelCode);
			
			if ($objInventoryModel) {
				// Load the array of InventoryLocations based on the InventoryModelId of the InventoryModel object
				$InventorySourceLocationArray = InventoryLocation::LoadArrayByInventoryModelIdLocations($objInventoryModel->InventoryModelId);
				$this->lstSourceLocation->RemoveAllItems();
				$this->lstSourceLocation->AddItem('- Select One -', null);
				if ($InventorySourceLocationArray) {
					// Populate the Source Location list box
					foreach ($InventorySourceLocationArray as $InventoryLocation) {
						// Do not display locations where the quantity is 0
						if ($InventoryLocation->Quantity != 0) {
							$this->lstSourceLocation->AddItem($InventoryLocation->__toStringWithQuantity(), $InventoryLocation->InventoryLocationId);
						}
					}
					$this->lstSourceLocation->Enabled = true;
					$this->txtQuantity->Enabled = true;
				}
				else {
					$this->txtNewInventoryModelCode->Warning = 'There is no inventory for that inventory code';
					$this->lstSourceLocation->Enabled = false;
					$this->txtQuantity->Enabled = false;
				}
				if ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 5) {
				  $objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId(QApplication::$objUserAccount->RoleId,$this->intTransactionTypeId);
          if ($objRoleTransactionTypeAuthorization) {
            // If the user has 'None' privileges for this transaction
            if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
      			  $this->txtNewInventoryModelCode->Warning = "You do not have privileges for this transaction.";
      			  $this->lstSourceLocation->Enabled = false;
					    $this->txtQuantity->Enabled = false;
    			  }
    			  // Check the user is the owner (if he has owner-only privileges)
      			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2 && $objInventoryModel->CreatedBy != QApplication::$objUserAccount->UserAccountId) {
      			  $this->txtNewInventoryModelCode->Warning = "You are not the owner of this inventory.";
      			  $this->lstSourceLocation->Enabled = false;
					    $this->txtQuantity->Enabled = false;
      			}
          }
				}
			}
			else {
				$this->txtNewInventoryModelCode->Warning = 'That is not a valid inventory code.';
			}
		}
		else {
			$this->txtNewInventoryModelCode->Warning = 'Please enter an inventory code.';
		}
	}
	
	// Add Button Click
	public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
		
		$blnError = false;
		
		// Assign the values from the user submitted form input
		$intNewInventoryLocationId = $this->lstSourceLocation->SelectedValue;
		$intTransactionQuantity = $this->txtQuantity->Text;
		// Create array of TransactionType (key) and AuthorizationLevel (value) by RoleId
		$objRoleTransactionTypeAuthorizationArray = RoleTransactionTypeAuthorization::LoadArrayByRoleId(QApplication::$objUserAccount->RoleId);
		$intAuthorizationLevelIdArray = array();
		if ($objRoleTransactionTypeAuthorizationArray) {
		  foreach ($objRoleTransactionTypeAuthorizationArray as $objRoleTransactionTypeAuthorization) {
		    $intAuthorizationLevelIdArray[$objRoleTransactionTypeAuthorization->TransactionTypeId] = $objRoleTransactionTypeAuthorization->AuthorizationLevelId;
		  }
		}
			  
		// If transaction is a move or take out
		if ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 5) {
			if ($intNewInventoryLocationId) {
				// Begin error checking
				if ($this->objInventoryLocationArray) {
					foreach ($this->objInventoryLocationArray as $objInventoryLocation) {
						if ($objInventoryLocation && $objInventoryLocation->InventoryLocationId == $intNewInventoryLocationId) {
							$blnError = true;
							$this->txtNewInventoryModelCode->Warning = "That Inventory has already been added.";
						}
					}
				}
				
				if (!$blnError) {
					$objNewInventoryLocation = InventoryLocation::LoadLocations($intNewInventoryLocationId);
					// This should not be possible because the list is populated with existing InventoryLocations
					if (!($objNewInventoryLocation instanceof InventoryLocation)) {
						$this->txtNewInventoryModelCode->Warning = "That Inventory location does not exist.";
						$blnError = true;
					}
					elseif (!ctype_digit($intTransactionQuantity) || $intTransactionQuantity <= 0) {
						$this->txtQuantity->Warning = "That is not a valid quantity.";
						$blnError = true;
					}
					// Move
					if ($this->intTransactionTypeId == 1) {
						if ($objNewInventoryLocation->Quantity < $intTransactionQuantity) {
							$this->txtQuantity->Warning = "Quantity moved cannot exceed quantity available.";
							$blnError = true;
						}
					}
					elseif ($this->intTransactionTypeId == 5) {
						if ($objNewInventoryLocation->Quantity < $intTransactionQuantity) {
							$this->txtQuantity->Warning = "Quantity taken out cannot exceed quantity available.";
							$blnError = true;
						}
					}
				}
			}
			elseif ($this->intTransactionTypeId != 4) {
				$this->txtNewInventoryModelCode->Warning = "Please select a source location.";
				$blnError = true;
			}
		}
		// Restock transaction
		elseif ($this->intTransactionTypeId == 4) {
			
			// Check for duplicate inventory code
			$strNewInventoryModelCode = $this->txtNewInventoryModelCode->Text;
			if (!($objNewInventoryModel = InventoryModel::LoadByInventoryModelCode($strNewInventoryModelCode))) {
				$blnError = true;
				$this->txtNewInventoryModelCode->Warning = "That is an invalid Inventory Code.";
			}
			elseif ($this->objInventoryLocationArray) {
				foreach ($this->objInventoryLocationArray as $objInventoryLocation) {
					if ($objInventoryLocation && $objInventoryLocation->InventoryModel->InventoryModelCode == $strNewInventoryModelCode) {
						$blnError = true;
						$this->txtNewInventoryModelCode->Warning = "That Inventory has already been added.";
					}
				}
			}
			if (!$blnError) {
			  $objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId(QApplication::$objUserAccount->RoleId,4);
        if ($objRoleTransactionTypeAuthorization) {
          // If the user has 'None' privileges for this transaction
          if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
      		  $this->txtNewInventoryModelCode->Warning = "You do not have privileges for this transaction.";
      		  $blnError = true;
    			}
    			// Check the user is the owner (if he has owner-only privileges)
      		elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2 && $objNewInventoryModel->CreatedBy != QApplication::$objUserAccount->UserAccountId) {
      		  $this->txtNewInventoryModelCode->Warning = "You are not the owner of this inventory.";
      		  $blnError = true;
      		}
        }
			}
			
			if (!$blnError) {
				// Create a new InventoryLocation for the time being
				// Before saving we will check to see if it already exists 
				$objNewInventoryLocation = new InventoryLocation();
				$objNewInventoryLocation->InventoryModelId = $objNewInventoryModel->InventoryModelId;
				$objNewInventoryLocation->Quantity = 0;
				// LocationID = 4 is 'New Inventory' Location
				$objNewInventoryLocation->LocationId = 4;
			}
		}
		
		if (!$blnError && isset($objNewInventoryModel) && !QApplication::AuthorizeEntityBoolean($objNewInventoryModel, 2)) {
			$blnError = true;
			$this->txtNewInventoryModelCode->Warning = "You do not have authorization to perform a transaction on this inventory model.";
		}
		
		if (!$blnError && $objNewInventoryLocation instanceof InventoryLocation)  {
			$objNewInventoryLocation->intTransactionQuantity = $intTransactionQuantity;
			$this->objInventoryLocationArray[] = $objNewInventoryLocation;
			$this->txtNewInventoryModelCode->Text = null;
			$this->lstSourceLocation->SelectedIndex = 0;
			$this->txtQuantity->Text = null;
			if ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 5) {
				$this->lstSourceLocation->Enabled = false;
				$this->txtQuantity->Enabled = false;
			}
		}		
	}
	
	// Save Button Click
	public function btnSave_Click($strFormId, $strControlId, $strParameter) {
		if ($this->objInventoryLocationArray) {
			$blnError = false;
			
			// If it is a move or a restock, lstDestinationLocation cannot be null
			if (($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 4) && !$this->lstDestinationLocation->SelectedValue) {
				
				$this->lstDestinationLocation->Warning = 'You must select a destination location.';
				$blnError = true;
			}
			
			foreach ($this->objInventoryLocationArray as $objInventoryLocation) {
				// TransactionTypeId = 1 is for moves
				if ($this->intTransactionTypeId == 1) {
					if ($objInventoryLocation->LocationId == $this->lstDestinationLocation->SelectedValue) {
						$this->dtgInventoryTransact->Warning = 'Cannot move inventory from a location to the same location.';
						$blnError = true;
					}
				}
			}
			
			if (!$blnError) {
				
				try {
				
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();								
					// Create the new transaction object and save it
					$this->objTransaction = new Transaction();
					$this->objTransaction->EntityQtypeId = EntityQtype::Inventory;
					$this->objTransaction->TransactionTypeId = $this->intTransactionTypeId;
					$this->objTransaction->Note = $this->txtNote->Text;
					$this->objTransaction->Save();
					
					// Assign different source and destinations depending on transaction type
					foreach ($this->objInventoryLocationArray as $objInventoryLocation) {
						
						// Move
						if ($this->intTransactionTypeId == 1) {
							$SourceLocationId = $objInventoryLocation->LocationId;
							$DestinationLocationId = $this->lstDestinationLocation->SelectedValue;
						}
						// Restock
						elseif ($this->intTransactionTypeId == 4) {
							// LocationId = 4 - 'New Inventory'
							$SourceLocationId = 4;
							$DestinationLocationId = $this->lstDestinationLocation->SelectedValue;
						}
						// Take Out
						elseif ($this->intTransactionTypeId == 5) {
							$SourceLocationId = $objInventoryLocation->LocationId;
							// LocationId = 3 - 'Taken Out'
							$DestinationLocationId = 3;
						}
						
						// Remove the inventory quantity from the source for moves and take outs
						if ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 5) {
							//$objInventoryLocation->Quantity = $objInventoryLocation->Quantity - $objInventoryLocation->intTransactionQuantity;
							$objInventoryLocation->Quantity = $objInventoryLocation->GetVirtualAttribute('actual_quantity') - $objInventoryLocation->intTransactionQuantity;
							$objInventoryLocation->Save();
						}
						
						// Add the new quantity where it belongs for moves and restocks
						if ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 4) {
						$objNewInventoryLocation = InventoryLocation::LoadByLocationIdInventoryModelId($DestinationLocationId, $objInventoryLocation->InventoryModelId);
							if ($objNewInventoryLocation) {
								//$objNewInventoryLocation->Quantity = $objNewInventoryLocation->GetVirtualAttribute('actual_quantity') + $objInventoryLocation->intTransactionQuantity;
								$objNewInventoryLocation->Quantity = $objNewInventoryLocation->Quantity + $objInventoryLocation->intTransactionQuantity;
							}
							else {
								$objNewInventoryLocation = new InventoryLocation();
								$objNewInventoryLocation->InventoryModelId = $objInventoryLocation->InventoryModelId;
								$objNewInventoryLocation->Quantity = $objInventoryLocation->intTransactionQuantity;
							}
							$objNewInventoryLocation->LocationId = $DestinationLocationId;
							$objNewInventoryLocation->Save();
						}
											
						// Create the new InventoryTransaction object and save it
						$this->objInventoryTransaction = new InventoryTransaction();
						if ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 4) {
							$this->objInventoryTransaction->InventoryLocationId = $objNewInventoryLocation->InventoryLocationId;
						}
						elseif ($this->intTransactionTypeId == 5) {
							$this->objInventoryTransaction->InventoryLocationId = $objInventoryLocation->InventoryLocationId;
						}
						$this->objInventoryTransaction->TransactionId = $this->objTransaction->TransactionId;
						$this->objInventoryTransaction->Quantity = $objInventoryLocation->intTransactionQuantity;
						$this->objInventoryTransaction->SourceLocationId = $SourceLocationId;
						$this->objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
						$this->objInventoryTransaction->Save();
					}
					
					// Commit the above transactions to the database
					$objDatabase->TransactionCommit();
					
					QApplication::Redirect('../common/transaction_edit.php?intTransactionId='.$this->objTransaction->TransactionId);
				}
				catch (QOptimisticLockingException $objExc) {
					
					// Rollback the database
					$objDatabase->TransactionRollback();
					
					$objInventoryLocation = InventoryLocation::Load($objExc->EntityId);
					$this->objParentObject->btnRemove_Click($this->objParentObject->FormId, 'btnRemove' . $objExc->EntityId, $objExc->EntityId);
          // Lock Exception Thrown, Report the Error
          $this->btnCancel->Warning = sprintf('The Inventory %s at %s has been altered by another user and removed from the transaction. You may add the inventory again or save the transaction without it.', $objInventoryLocation->InventoryModel->InventoryModelCode, $objInventoryLocation->Location->__toString());
				}
			}
		}
	}
	
	// Cancel Button Click
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		
		if ($this->blnEditMode) {
			$this->objParentObject->DisplayTransaction(false);
			$this->objInventoryLocationArray = null;
			$this->txtNewInventoryModelCode->Text = null;
			$this->txtNote->Text = null;
			$this->objParentObject->DisplayEdit(true);
		}
		else {
			QApplication::Redirect('inventory_model_list.php');
		}
	}
	
	// Prepare the Transaction form display depending on transaction type
	public function SetupDisplay($intTransactionTypeId) {
		$this->intTransactionTypeId = $intTransactionTypeId;
		switch ($this->intTransactionTypeId) {
			// Move
			case 1:
				$this->lstDestinationLocation->Display = true;
				$this->btnLookup->Display = true;
				$this->txtNewInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
				$this->lstSourceLocation->Display = true;
				$this->lstSourceLocation->Enabled = false;
				$this->txtQuantity->Display = true;
				$this->txtQuantity->Enabled = false;
				// Only lookup if there is an InventoryModelCode (clicking on the Move Inventory shortcut doesn't provide one)
				if ($this->txtNewInventoryModelCode->Text) {
					$this->btnLookup_Click($this->objParentObject->FormId);
				}
				break;
			// Restock
			case 4:
				$this->lstDestinationLocation->Display = true;
				$this->lstDestinationLocation->Name = 'Restock To';
				$this->txtNewInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
				$this->btnLookup->Display = false;
				$this->lstSourceLocation->Display = false;
				$this->txtQuantity->Display = true;
				$this->txtQuantity->Enabled = true;
				break;
			// Take Out
			case 5: 
				$this->lstDestinationLocation->Display = false;
				$this->btnLookup->Display = true;
				$this->txtNewInventoryModelCode->Text = $this->objInventoryModel->InventoryModelCode;
				$this->lstSourceLocation->Display = true;
				$this->lstSourceLocation->Enabled = false;
				$this->txtQuantity->Display = true;
				$this->txtQuantity->Enabled = false;
				// Only lookup if there is an InventoryModelCode (clicking on the Take Out Inventory shortcut doesn't provide one)
				if ($this->txtNewInventoryModelCode->Text) {
					$this->btnLookup_Click($this->objParentObject->FormId);
				}
				break;
		}
	}
	
  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
	  	case "objInventoryLocationArray": return $this->objInventoryLocationArray;
	  	case "dtgInventoryTransact": return $this->dtgInventoryTransact;
	  	case "intTransactionTypeId": return $this->intTransactionTypeId;
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
	    case "objInventoryLocationArray": $this->objInventoryLocationArray = $mixValue;
	    	break;
	    case "strTitleVerb": $this->strTitleVerb = $mixValue;
	    	break;
	    case "blnEditMode": $this->blnEditMode = $mixValue;
	    	break;
	    case "dtgInventoryTransact": $this->dtgInventoryTransact = $mixValue;
	    	break;
	    case "intTransactionTypeId": $this->intTransactionTypeId = $mixValue;
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