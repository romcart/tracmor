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
		protected $txtQuickAdd;
		protected $btnQuickAdd;

		protected function Form_Create() {

			// Create the Header Menu
			$this->ctlHeaderMenu_Create();

			$this->btnNew_Create();
			$this->btnImport_Create();
			$this->txtQuickAdd_Create();
			$this->btnQuickAdd_Create();
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
	  $this->dtgLocation->AddColumn(new QDataGridColumnExt('Enabled', '<?= $_ITEM->ToStringEnabledFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->EnabledFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->EnabledFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
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
				$this->dtgLocation->DataSource = Location::LoadAllLocations(false, false, $this->dtgLocation->SortInfo, $this->dtgLocation->LimitInfo, $objExpansionMap, false, true);
				$this->dtgLocation->ShowHeader = true;
			}
		}

		protected function btnNew_Click() {

			QApplication::Redirect('location_edit.php');
		}

		protected function btnImport_Click() {

			QApplication::Redirect('location_import.php');
		}
		
		protected function txtQuickAdd_Create() {
			$this->txtQuickAdd = new QTextBox($this);
			$this->txtQuickAdd->Focus();
			$this->txtQuickAdd->Width = '160';
			$this->txtQuickAdd->CssClass = 'textbox';
			$this->txtQuickAdd->SetCustomStyle('vertical-align', 'baseline');
			$this->txtQuickAdd->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnQuickAdd_Click'));
			$this->txtQuickAdd->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		protected function btnQuickAdd_Create() {
			$this->btnQuickAdd = new QButton($this);
			$this->btnQuickAdd->Text = 'Quick Add';
			$this->btnQuickAdd->SetCustomStyle('vertical-align', 'baseline');
			$this->btnQuickAdd->AddAction(new QClickEvent(), new QAjaxAction('btnQuickAdd_Click'));
		}
		
		protected function btnQuickAdd_Click($strFormId, $strControlId, $strParameter) {
			$blnError = false;
			$this->btnQuickAdd->Warning = '';
			
			if (strlen(trim($this->txtQuickAdd->Text)) == 0) {
				$blnError = true;
				$this->btnQuickAdd->Warning = 'You must enter a Location name';
			}
			
			// Check for dupes
			$objLocationDuplicate = Location::QuerySingle(QQ::Equal(QQN::Location()->ShortDescription, $this->txtQuickAdd->Text));
			
			if ($objLocationDuplicate) {
				$blnError = true;
				$this->btnQuickAdd->Warning = 'This Location Name is already in use. Please try another.';
			}
			
			if (!$blnError) {
				$objLocation = new Location();
				$objLocation->ShortDescription = $this->txtQuickAdd->Text;
				$objLocation->EnabledFlag = '1';
				$objLocation->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$objLocation->CreationDate = QDateTime::Now();
				$objLocation->Save();
				$this->dtgLocation->Refresh();
				$this->txtQuickAdd->Text = '';
			}
			
			$this->txtQuickAdd->Focus();
			$this->txtQuickAdd->Select();
		}
		
	}
	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/Location_edit.php.inc as the included HTML template file
	LocationListForm::Run('LocationListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/location_list.tpl.php');
?>