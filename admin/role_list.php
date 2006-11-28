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
	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for RoleListFormBase
	require(__FORMBASE_CLASSES__ . '/RoleListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Role class.  It extends from the code-generated
	 * abstract RoleListFormBase class.
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
	class RoleListForm extends RoleListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;

		protected $btnNew;

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			$this->btnNew_Create();
			$this->dtgRole_Create();
		}
		
		protected function Form_PreRender() {
			$objExpansionMap[Role::ExpandCreatedByObject] = true;
			// Get Total Count b/c of Pagination
			$this->dtgRole->TotalItemCount = Role::CountAll();
			if ($this->dtgRole->TotalItemCount == 0) {
				$this->dtgRole->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgRole->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgRole->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::Role()->CreatedByObject))
					array_push($objClauses, $objClause);
				$this->dtgRole->DataSource = Role::LoadAll($objClauses);
				$this->dtgRole->ShowHeader = true;
			}
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		// Create/Setup the New butotn
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Role';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		// Create/Setup the Role datagrid
		protected function dtgRole_Create() {

		$this->dtgRole = new QDataGrid($this);
  		$this->dtgRole->CellPadding = 5;
  		$this->dtgRole->CellSpacing = 0;
  		$this->dtgRole->CssClass = "datagrid";
  		$this->dtgRole->SortColumnIndex = 0;
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgRole->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgRole);
      $this->dtgRole->Paginator = $objPaginator;
      $this->dtgRole->ItemsPerPage = 20;
          
      $this->dtgRole->AddColumn(new QDataGridColumn('Role', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgRole->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->LongDescription ?>', array('Width' => "200", 'OrderByClause' => QQ::OrderBy(QQN::Role()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->LongDescription, false), 'CssClass' => "dtg_column")));
      $this->dtgRole->AddColumn(new QDataGridColumn('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->CreatedByObject->LastName, false, QQN::Role()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->CreatedByObject->LastName, QQN::Role()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
      
      $this->dtgRole->SortColumnIndex = 0;
    	$this->dtgRole->SortDirection = 0;
      
      $objStyle = $this->dtgRole->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgRole->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgRole->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  			
		}
		
		protected function btnNew_Click() {
			
			QApplication::Redirect('role_edit.php');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/role_edit.php.inc as the included HTML template file
	RoleListForm::Run('RoleListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/role_list.tpl.php');
?>