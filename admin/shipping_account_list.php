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

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for ShippingAccountListFormBase
	require(__FORMBASE_CLASSES__ . '/ShippingAccountListFormBase.class.php');
	
	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the ShippingAccount class.  It extends from the code-generated
	 * abstract ShippingAccountListFormBase class.
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
	class ShippingAccountListForm extends ShippingAccountListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		protected $lstCompany;
		protected $btnSave;
		protected $btnNew;
		
		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			// Create Shipping/Receiving Company Fields
			$this->lstCompany_Create();
			$this->btnSave_Create();
			
			$this->btnNew_Create();
			$this->dtgShippingAccount_Create();
		}
		
		protected function Form_PreRender() {
			$objExpansionMap[ShippingAccount::ExpandCourier] = true;
			// Get Total Count b/c of Pagination
			$this->dtgShippingAccount->TotalItemCount = ShippingAccount::CountAll();
			if ($this->dtgShippingAccount->TotalItemCount == 0) {
				$this->dtgShippingAccount->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgShippingAccount->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgShippingAccount->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::ShippingAccount()->Courier))
					array_push($objClauses, $objClause);
				$this->dtgShippingAccount->DataSource = ShippingAccount::LoadAll($objClauses);
				$this->dtgShippingAccount->ShowHeader = true;
			}
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		// Create/Setup the Save button
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		}
		
		// Create and Setup lstCompany
		protected function lstCompany_Create() {
			$this->lstCompany = new QListBox($this);
			$this->lstCompany->Name = QApplication::Translate('Shipping & Receiving Company:');
			$this->lstCompany->Required = false;
			$this->lstCompany->AddItem('- Select One -', null);
			$objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
			if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->CompanyId);
				if ((QApplication::$TracmorSettings->CompanyId) && (QApplication::$TracmorSettings->CompanyId == $objCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstCompany->AddItem($objListItem);
			}
			$this->lstCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstCompany_Change'));
			$this->lstCompany->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->lstCompany->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}		
		
		// Create/Setup the New button
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Account';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		// Create/Setup the Shipping Account datagrid
		protected function dtgShippingAccount_Create() {

			$this->dtgShippingAccount = new QDataGrid($this);
  		$this->dtgShippingAccount->CellPadding = 5;
  		$this->dtgShippingAccount->CellSpacing = 0;
  		$this->dtgShippingAccount->CssClass = "datagrid";
  		$this->dtgShippingAccount->SortColumnIndex = 0;
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgShippingAccount->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgShippingAccount);
      $this->dtgShippingAccount->Paginator = $objPaginator;
      $this->dtgShippingAccount->ItemsPerPage = 20;
          
      $this->dtgShippingAccount->AddColumn(new QDataGridColumn('Account', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgShippingAccount->AddColumn(new QDataGridColumn('Courier', '<?= $_ITEM->Courier->__toString() ?>', array('Width' => "200", 'OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->Courier->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->Courier->ShortDescription, false), 'CssClass' => "dtg_column")));
      $this->dtgShippingAccount->AddColumn(new QDataGridColumn('Account Number', '<?= $_ITEM->Value ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->Value), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->Value, false), 'CssClass' => "dtg_column")));
      
      $this->dtgShippingAccount->SortColumnIndex = 0;
    	$this->dtgShippingAccount->SortDirection = 0;
      
      $objStyle = $this->dtgShippingAccount->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgShippingAccount->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgShippingAccount->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  			
		}
		
		// Create/Setup the Save button
		// Sets the Shipping/Receiving Company setting in the AdminSetting table
		protected function btnSave_Click() {
			
			$intCompanyId = $this->lstCompany->SelectedValue;
			$objCompany = Company::Load($intCompanyId);
			if (!$objCompany) {
				$this->lstCompany->Warning = "Not a valid company.";
			}
			elseif (!$objCompany->Telephone) {
				$this->lstCompany->Warning = "The Shipping/Receiving company must have a valid telephone number.";
			}
			else {
			  // Altered $TracmorSettings __set() method so that just setting a value will save it in the database.
				QApplication::$TracmorSettings->CompanyId = $intCompanyId;
				// Not really a warning, just need to display that it has been saved without changing pages.
				$this->lstCompany->Warning = "Saved";
			}
		}
		
		// Erase the 'Saved' warning if a new company is selected
		protected function lstCompany_Change() {
			
			$this->lstCompany->Warning = "";
		}
		
		protected function btnNew_Click() {
			
			QApplication::Redirect('shipping_account_edit.php');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/shipping_account_edit.php.inc as the included HTML template file
	ShippingAccountListForm::Run('ShippingAccountListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/shipping_account_list.tpl.php');
?>