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
	// Include the classfile for CategoryListFormBase
	require(__FORMBASE_CLASSES__ . '/CategoryListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Category class.  It extends from the code-generated
	 * abstract CategoryListFormBase class.
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
	class CategoryListForm extends CategoryListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
				
		protected $btnNew;
		
		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();		
				
			$this->btnNew_Create();
			$this->dtgCategory_Create();
		}
		
		protected function Form_PreRender() {
			$objExpansionMap[Category::ExpandCreatedByObject] = true;
			// Get Total Count b/c of Pagination
			$this->dtgCategory->TotalItemCount = Category::CountAll();
			if ($this->dtgCategory->TotalItemCount == 0) {
				$this->dtgCategory->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgCategory->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgCategory->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::Category()->CreatedByObject))
					array_push($objClauses, $objClause);
				$this->dtgCategory->DataSource = Category::LoadAll($objClauses);
				$this->dtgCategory->ShowHeader = true;
			}
		}
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}		
		
		// Create/Setup the new button
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Category';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		// Create/Setup the category datagrid
		protected function dtgCategory_Create() {

		$this->dtgCategory = new QDataGrid($this);
  		$this->dtgCategory->CellPadding = 5;
  		$this->dtgCategory->CellSpacing = 0;
  		$this->dtgCategory->CssClass = "datagrid";
  		$this->dtgCategory->SortColumnIndex = 0;
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgCategory->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgCategory);
      $this->dtgCategory->Paginator = $objPaginator;
      $this->dtgCategory->ItemsPerPage = 20;
          
      $this->dtgCategory->AddColumn(new QDataGridColumn('Category', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgCategory->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->LongDescription ?>', array('Width' => "200", 'OrderByClause' => QQ::OrderBy(QQN::Category()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->LongDescription, false), 'CssClass' => "dtg_column")));
      $this->dtgCategory->AddColumn(new QDataGridColumn('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->CreatedByObject->LastName, false, QQN::Category()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->CreatedByObject->LastName, QQN::Category()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
      
      $this->dtgCategory->SortColumnIndex = 0;
    	$this->dtgCategory->SortDirection = 0;
      
      $objStyle = $this->dtgCategory->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgCategory->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgCategory->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  			
		}
		
		protected function btnNew_Click() {
			
			QApplication::Redirect('category_edit.php');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/category_edit.php.inc as the included HTML template file
	CategoryListForm::Run('CategoryListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/category_list.tpl.php');
?>