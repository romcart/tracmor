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
	// Include the classfile for CustomFieldListFormBase
	require(__FORMBASE_CLASSES__ . '/CustomFieldListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the CustomField class.  It extends from the code-generated
	 * abstract CustomFieldListFormBase class.
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
	class CustomFieldListForm extends CustomFieldListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
				
		protected $btnNew;

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();			
			
			$this->btnNew_Create();
			$this->dtgCustomField_Create();
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		protected function Form_PreRender() {
			$objExpansionMap[CustomField::ExpandCreatedByObject] = true;
			// Get Total Count b/c of Pagination
			$this->dtgCustomField->TotalItemCount = CustomField::CountAll();
			if ($this->dtgCustomField->TotalItemCount == 0) {
				$this->dtgCustomField->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgCustomField->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgCustomField->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::CustomField()->CreatedByObject))
					array_push($objClauses, $objClause);
				$this->dtgCustomField->DataSource = CustomField::LoadAll($objClauses);
				$this->dtgCustomField->ShowHeader = true;
			}
		}
		
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Custom Field';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		protected function dtgCustomField_Create() {

		$this->dtgCustomField = new QDataGrid($this);
  		$this->dtgCustomField->CellPadding = 5;
  		$this->dtgCustomField->CellSpacing = 0;
  		$this->dtgCustomField->CssClass = "datagrid";
  		$this->dtgCustomField->SortColumnIndex = 0;
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgCustomField->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgCustomField);
      $this->dtgCustomField->Paginator = $objPaginator;
      $this->dtgCustomField->ItemsPerPage = 20;
          
      $this->dtgCustomField->AddColumn(new QDataGridColumn('Field Name', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgCustomField->AddColumn(new QDataGridColumn('Type', '<?= CustomFieldQtype::ToString($_ITEM->CustomFieldQtypeId) ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->CustomFieldQtypeId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CustomFieldQtypeId, false), 'CssClass' => "dtg_column")));
      $this->dtgCustomField->AddColumn(new QDataGridColumn('Enabled', '<?= $_ITEM->__toStringActiveFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->ActiveFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->ActiveFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgCustomField->AddColumn(new QDataGridColumn('Required', '<?= $_ITEM->__toStringRequiredFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->RequiredFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->RequiredFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgCustomField->AddColumn(new QDataGridColumn('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->CreatedByObject->LastName, false, QQN::CustomField()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CreatedByObject->LastName, QQN::CustomField()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
      
      $this->dtgCustomField->SortColumnIndex = 0;
    	$this->dtgCustomField->SortDirection = 0;
      
      $objStyle = $this->dtgCustomField->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgCustomField->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgCustomField->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  			
		}
		
		protected function btnNew_Click() {
			
			QApplication::Redirect('custom_field_edit.php');
		}		
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/custom_field_edit.php.inc as the included HTML template file
	CustomFieldListForm::Run('CustomFieldListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/custom_field_list.tpl.php');
?>