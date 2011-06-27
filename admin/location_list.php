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
	// Include the classfile for LocationListFormBase
	require(__FORMBASE_CLASSES__ . '/LocationListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Location class.  It extends from the code-generated
	 * abstract LocationListFormBase class.
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
	class LocationListForm extends LocationListFormBase {

		// Header Menu
		protected $ctlHeaderMenu;

		protected $btnNew;
		protected $btnImport;

		protected function Form_Create() {

			// Create the Header Menu
			$this->ctlHeaderMenu_Create();

			$this->btnNew_Create();
			$this->btnImport_Create();
			$this->dtgLocation_Create();
		}

		/*protected function Form_PreRender() {
			$objExpansionMap[Location::ExpandCreatedByObject] = true;
			// Get Total Count b/c of Pagination
			$this->dtgLocation->TotalItemCount = Location::CountAllLocations();
			if ($this->dtgLocation->TotalItemCount == 0) {
				$this->dtgLocation->ShowHeader = false;
			}
			else {
				$this->dtgLocation->DataSource = Location::LoadAllLocations(false, false, $this->dtgLocation->SortInfo, $this->dtgLocation->LimitInfo, $objExpansionMap);
				$this->dtgLocation->ShowHeader = true;
			}
		}*/

		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

		// Create/Setup the New Location button
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Location';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		// Create/Setup the Import button
		protected function btnImport_Create() {
			$this->btnImport = new QButton($this);
			$this->btnImport->Text = 'Import Locations';
			$this->btnImport->AddAction(new QClickEvent(), new QServerAction('btnImport_Click'));
		}

		// Create/Setup the Location datagrid
		protected function dtgLocation_Create() {

		  $this->dtgLocation = new QDataGrid($this);
  		$this->dtgLocation->CellPadding = 5;
  		$this->dtgLocation->CellSpacing = 0;
  		$this->dtgLocation->Name = "location_list";
  		$this->dtgLocation->CssClass = "datagrid";
  		$this->dtgLocation->SortColumnIndex = 0;

      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgLocation->UseAjax = true;

      $this->dtgLocation->ShowColumnToggle = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgLocation);
      $this->dtgLocation->Paginator = $objPaginator;
      $this->dtgLocation->ItemsPerPage = 20;
      $this->dtgLocation->ShowExportCsv = true;

      $this->dtgLocation->AddColumn(new QDataGridColumnExt('ID', '<?= $_ITEM->LocationId ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->LocationId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->LocationId, false)), 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgLocation->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->ShortDescription, false)), 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgLocation->AddColumn(new QDataGridColumnExt('Description', '<?= $_ITEM->LongDescription ?>', 'Width=200', array('OrderByClause' => QQ::OrderBy(QQN::Location()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->LongDescription, false)), 'CssClass="dtg_column"'));
      $this->dtgLocation->AddColumn(new QDataGridColumnExt('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', 'SortByCommand="location__created_by__last_name DESC, location__created_by__first_name DESC"', 'ReverseSortByCommand="location__created_by__last_name ASC, location__created_by__first_name ASC"', 'CssClass="dtg_column"'));

      $this->dtgLocation->SortColumnIndex = 1;
    	$this->dtgLocation->SortDirection = 0;

      $objStyle = $this->dtgLocation->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgLocation->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgLocation->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';

      $this->dtgLocation->SetDataBinder('dtgLocation_Bind');
		}

		protected function dtgLocation_Bind() {
		  $objExpansionMap[Location::ExpandCreatedByObject] = true;
			// Get Total Count b/c of Pagination
			$this->dtgLocation->TotalItemCount = Location::CountAllLocations();
			if ($this->dtgLocation->TotalItemCount == 0) {
				$this->dtgLocation->ShowHeader = false;
			}
			else {
				$this->dtgLocation->DataSource = Location::LoadAllLocations(false, false, $this->dtgLocation->SortInfo, $this->dtgLocation->LimitInfo, $objExpansionMap);
				$this->dtgLocation->ShowHeader = true;
			}
		}

		protected function btnNew_Click() {

			QApplication::Redirect('location_edit.php');
		}

		protected function btnImport_Click() {

			QApplication::Redirect('location_import.php');
		}
	}
	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/Location_edit.php.inc as the included HTML template file
	LocationListForm::Run('LocationListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/location_list.tpl.php');
?>