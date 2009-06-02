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

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for UserAccountListFormBase
	require(__FORMBASE_CLASSES__ . '/UserAccountListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the UserAccount class.  It extends from the code-generated
	 * abstract UserAccountListFormBase class.
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
	class UserAccountListForm extends UserAccountListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;

		protected $btnNew;

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			$this->btnNew_Create();
			$this->dtgUserAccount_Create();
		}
		
		protected function Form_PreRender() {
			$objExpansionMap[UserAccount::ExpandCreatedByObject] = true;
			$objExpansionMap[UserAccount::ExpandRole] = true;
			// Get Total Count b/c of Pagination
			$this->dtgUserAccount->TotalItemCount = UserAccount::CountAll();
			if ($this->dtgUserAccount->TotalItemCount == 0) {
				$this->dtgUserAccount->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgUserAccount->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgUserAccount->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::UserAccount()->CreatedByObject))
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::UserAccount()->Role))
				$this->dtgUserAccount->DataSource = UserAccount::LoadAll($objClauses);
				$this->dtgUserAccount->ShowHeader = true;
			}
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		// Create/Setup New button
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New User Account';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		// Create/Setup User Account datagrid
		protected function dtgUserAccount_Create() {

		$this->dtgUserAccount = new QDataGrid($this);
  		$this->dtgUserAccount->CellPadding = 5;
  		$this->dtgUserAccount->CellSpacing = 0;
  		$this->dtgUserAccount->CssClass = "datagrid";
  		$this->dtgUserAccount->SortColumnIndex = 0;
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgUserAccount->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgUserAccount);
      $this->dtgUserAccount->Paginator = $objPaginator;
      $this->dtgUserAccount->ItemsPerPage = 20;
          
      $this->dtgUserAccount->AddColumn(new QDataGridColumn('Username', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->Username), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->Username, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgUserAccount->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->FirstName ?> <?= $_ITEM->LastName ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->LastName, false, QQN::UserAccount()->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->LastName, QQN::UserAccount()->FirstName), 'CssClass' => "dtg_column")));
      $this->dtgUserAccount->AddColumn(new QDataGridColumn('User Role', '<?= $_ITEM->Role->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->Role->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->Role->ShortDescription, false), 'CssClass' => "dtg_column")));
      $this->dtgUserAccount->AddColumn(new QDataGridColumn('Active', '<?= $_ITEM->__toStringActiveFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->ActiveFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->ActiveFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgUserAccount->AddColumn(new QDataGridColumn('Admin', '<?= $_ITEM->__toStringAdminFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->AdminFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->AdminFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgUserAccount->AddColumn(new QDataGridColumn('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->CreatedByObject->LastName, false, QQN::UserAccount()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->CreatedByObject->LastName, QQN::UserAccount()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
      
      $this->dtgUserAccount->SortColumnIndex = 0;
    	$this->dtgUserAccount->SortDirection = 0;
      
      $objStyle = $this->dtgUserAccount->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgUserAccount->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgUserAccount->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  			
		}
		
		protected function btnNew_Click() {
			
			QApplication::Redirect('user_account_edit.php');
		}		
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/user_account_edit.php.inc as the included HTML template file
	UserAccountListForm::Run('UserAccountListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/user_account_list.tpl.php');
?>