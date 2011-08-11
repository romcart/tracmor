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
	
	require_once(__FORMBASE_CLASSES__ . '/TransactionEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Transaction class.  It extends from the code-generated
	 * abstract TransactionEditFormBase class.
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
	class TransactionEditForm extends TransactionEditFormBase {
		
		protected $lblCreationDate;
		protected $lblUser;
		protected $lblNote;
		protected $dtgEntity;
		protected $ctlHeaderMenu;
		protected $ctlShortcutMenu;
		
		// Override Form Event Handlers as Needed
//		protected function Form_Run() {}

//		protected function Form_Load() {}

		protected function Form_Create()  {
			
			// QApplication::$Database[1]->EnableProfiling();
			
			$this->SetupTransaction();
			
			if ($this->objTransaction->EntityQtypeId == EntityQtype::Asset) {
				QApplication::Authenticate(2);
			}
	
			if ($this->objTransaction->EntityQtypeId == EntityQtype::Inventory) {
				QApplication::Authenticate(3);
			}
			
			// $this->lblLocation_Create();
			$this->lblUser_Create();
			$this->lblNote_Create();
			$this->lblCreationDate_Create();
			$this->dtgEntity_Create();
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
		}
		
		protected function Form_Exit() {
			// QApplication::$Database[1]->OutputProfiling();
		}
		
		// Create and Setup the Header Composite Control
  		protected function ctlHeaderMenu_Create() {
  			$this->ctlHeaderMenu = new QHeaderMenu($this);
  		}
  		
  		// Create and Setp the Shortcut Menu Composite Control
  		protected function ctlShortcutMenu_Create() {
  			$this->ctlShortcutMenu = new QShortcutMenu($this);
  		}  		
  		
		// Create the creation date label
		protected function lblCreationDate_Create() {
			$this->lblCreationDate = new QLabel($this);
			$this->lblCreationDate->Name = 'Date';
			$this->lblCreationDate->Text = $this->objTransaction->CreationDate->__toString(QDateTime::FormatIso);
		}
		
		// Create the user label
		protected function lblUser_Create() {
			$this->lblUser = new QLabel($this);
			$this->lblUser->Name = 'User';
			$this->lblUser->Text = $this->objTransaction->CreatedByObject->__toStringFullName();
		}		
		
		// Create the note label
		protected function lblNote_Create() {
			$this->lblNote = new QLabel($this);
			$this->lblNote->Name = 'Note';
			$this->lblNote->Text = $this->objTransaction->Note;
		}
		
		// Create the datagrid of entities included in the transaction
		// Right now, only assets, but this will change
		protected function dtgEntity_Create() {
		
			$this->dtgEntity = new QDataGrid($this);
			$this->dtgEntity->CellPadding = 5;
			$this->dtgEntity->CellSpacing = 0;
			$this->dtgEntity->CssClass = "datagrid";
			
	    // Enable AJAX - this won't work while using the DB profiler
	    $this->dtgEntity->UseAjax = true;
	
	    // Enable Pagination, and set to 20 items per page
	    $objPaginator = new QPaginator($this->dtgEntity);
	    $this->dtgEntity->Paginator = $objPaginator;
	    $this->dtgEntity->ItemsPerPage = 10;
	    
	    // These datagrids are not sortable because they would need early expansion
	    // Sorting is possible to implement but not worth the time right now
	    if ($this->objTransaction->EntityQtypeId == EntityQtype::Asset) {
		    $this->dtgEntity->AddColumn(new QDataGridColumn('Asset Code', '<?= $_ITEM->Asset->__toStringWithLink("bluelink") ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
		    $this->dtgEntity->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->Asset->AssetModel->__toStringWithLink($_ITEM->Asset->AssetModel,"bluelink") ?>', 'Width=200', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
		    $this->dtgEntity->AddColumn(new QDataGridColumn('Source', '<?= $_ITEM->SourceLocation->__toString() ?>', 'CssClass="dtg_column"'));
		    $this->dtgEntity->AddColumn(new QDataGridColumn('Destination', '<?= $_ITEM->__toStringDestinationLocation() ?>', 'CssClass="dtg_column"'));
	    }
	    elseif ($this->objTransaction->EntityQtypeId == EntityQtype::Inventory) {
	    	$this->dtgEntity->AddColumn(new QDataGridColumn('Inventory Code', '<?= $_ITEM->InventoryLocation->InventoryModel->__toStringWithLink("bluelink") ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));	    	
	    	$this->dtgEntity->AddColumn(new QDataGridColumn('Inventory Model', '<?= $_ITEM->InventoryLocation->InventoryModel->ShortDescription ?>', 'CssClass="dtg_column"'));
	    	$this->dtgEntity->AddColumn(new QDataGridColumn('Source', '<?= $_ITEM->SourceLocation->__toString() ?>', 'CssClass="dtg_column"'));
	    	$this->dtgEntity->AddColumn(new QDataGridColumn('Destination', '<?= $_ITEM->DestinationLocation->__toString() ?>', 'CssClass="dtg_column"'));
	    	$this->dtgEntity->AddColumn(new QDataGridColumn('Quantity', '<?= $_ITEM->Quantity ?>', 'CssClass="dtg_column"'));
	    }
	    
	    $objStyle = $this->dtgEntity->RowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#FFFFFF';
	    $objStyle->FontSize = 12;
	
	    $objStyle = $this->dtgEntity->AlternateRowStyle;
	    $objStyle->BackColor = '#EFEFEF';
	
      $objStyle = $this->dtgEntity->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
		}
		
		protected function Form_PreRender() {
			
			if ($this->objTransaction->EntityQtypeId == EntityQtype::Asset) {
				$objExpansionMap[AssetTransaction::ExpandAsset][Asset::ExpandAssetModel] = true;
		    $this->dtgEntity->TotalItemCount = $this->objTransaction->CountAssetTransactions();
		    $this->dtgEntity->DataSource = $this->objTransaction->GetAssetTransactionArray();				
			}
			elseif ($this->objTransaction->EntityQtypeId == EntityQtype::Inventory) {
				$this->dtgEntity->TotalItemCount = $this->objTransaction->CountInventoryTransactions();
				$this->dtgEntity->DataSource = $this->objTransaction->GetInventoryTransactionArray();
			}
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/transaction_edit.php.inc as the included HTML template file
	TransactionEditForm::Run('TransactionEditForm', 'transaction_edit.tpl.php');
?>
