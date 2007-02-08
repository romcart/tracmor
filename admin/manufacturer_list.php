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
	// Include the classfile for ManufacturerListFormBase
	require(__FORMBASE_CLASSES__ . '/ManufacturerListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Manufacturer class.  It extends from the code-generated
	 * abstract ManufacturerListFormBase class.
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
	class ManufacturerListForm extends ManufacturerListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;

		protected $btnNew;

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			$this->btnNew_Create();
			$this->dtgManufacturer_Create();
		}
		
		protected function Form_PreRender() {
			$objExpansionMap[Manufacturer::ExpandCreatedByObject] = true;
			// Get Total Count b/c of Pagination
			$this->dtgManufacturer->TotalItemCount = Manufacturer::CountAll();
			if ($this->dtgManufacturer->TotalItemCount == 0) {
				$this->dtgManufacturer->ShowHeader = false;
			}
			else {
/*				$objClauses = array();
				if ($objClause = $this->dtgManufacturer->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgManufacturer->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::Manufacturer()->CreatedByObject))
					array_push($objClauses, $objClause);
				$this->dtgManufacturer->DataSource = Manufacturer::LoadAll($objClauses);
				$this->dtgManufacturer->ShowHeader = true;*/

				$this->dtgManufacturer->DataSource = Manufacturer::LoadAllWithCustomFields($this->dtgManufacturer->SortInfo, $this->dtgManufacturer->LimitInfo, $objExpansionMap);
				$this->dtgManufacturer->ShowHeader = true;
			}
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		// Create/Setup the New Manufacturer button
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Manufacturer';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		// Create/Setup the Manufacturer datagrid
		protected function dtgManufacturer_Create() {

			$this->dtgManufacturer = new QDataGrid($this);
  		$this->dtgManufacturer->CellPadding = 5;
  		$this->dtgManufacturer->CellSpacing = 0;
  		$this->dtgManufacturer->CssClass = "datagrid";
  		$this->dtgManufacturer->SortColumnIndex = 0;
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgManufacturer->UseAjax = true;
      
      // Allow for column toggling
      $this->dtgManufacturer->ShowColumnToggle = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgManufacturer);
      $this->dtgManufacturer->Paginator = $objPaginator;
      $this->dtgManufacturer->ItemsPerPage = 20;
          
      $this->dtgManufacturer->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgManufacturer->AddColumn(new QDataGridColumnExt('Description', '<?= $_ITEM->LongDescription ?>', array('Width' => "200", 'OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->LongDescription, false), 'CssClass' => "dtg_column")));
/*      $this->dtgManufacturer->AddColumn(new QDataGridColumnExt('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->CreatedByObject->LastName, false, QQN::Manufacturer()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->CreatedByObject->LastName, QQN::Manufacturer()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));*/
      $this->dtgManufacturer->AddColumn(new QDataGridColumnExt('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('SortByCommand' => 'manufacturer__created_by__last_name DESC, manufacturer__created_by__first_name DESC', 'ReverseSortByCommand' => 'manufacturer__created_by__last_name ASC, manufacturer__created_by__first_name ASC', 'CssClass' => "dtg_column")));

      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(5, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		$this->dtgManufacturer->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      	}
      }
      
      $this->dtgManufacturer->SortColumnIndex = 0;
    	$this->dtgManufacturer->SortDirection = 0;
      
      $objStyle = $this->dtgManufacturer->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgManufacturer->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgManufacturer->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';  			
		}
		
		protected function btnNew_Click() {
			
			QApplication::Redirect('manufacturer_edit.php');
		}			
	}

	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/manufacturer_edit.php.inc as the included HTML template file
	ManufacturerListForm::Run('ManufacturerListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/manufacturer_list.tpl.php');
?>