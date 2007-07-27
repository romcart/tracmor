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

	require_once('../includes/prepend.inc.php');
	QApplication::Authenticate(4);
	require_once(__FORMBASE_CLASSES__ . '/ContactListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Contact class.  It extends from the code-generated
	 * abstract ContactListFormBase class.
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
	class ContactListForm extends ContactListFormBase {
		
		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;		

		// Basic Inputs
		protected $txtFirstName;
		protected $txtLastName;
		protected $txtCompany;
		
		// Buttons
		protected $btnSearch;
		protected $blnSearch;
		protected $btnClear;
		
		// Advanced Label/Link
		protected $lblAdvanced;
		// Boolean that toggles Advanced Search display
		protected $blnAdvanced;
		// Advanced Search Composite control
		protected $ctlAdvanced;
		// Custom Fields array
		protected $arrCustomFields;		

		// Search Values
		protected $strFirstName;
		protected $strLastName;
		protected $strCompany;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;					

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			$this->txtFirstName_Create();
			$this->txtLastName_Create();
			$this->txtCompany_Create();
			$this->btnSearch_Create();
			$this->btnClear_Create();
			$this->ctlAdvanced_Create();
			$this->lblAdvanced_Create();
			$this->dtgContact_Create();
		}
		
		protected function dtgContact_Bind() {
			
			// Assing the class member values from the search form inputs
			if ($this->blnSearch) {
				$this->assignSearchValues();
			}			
			
			// Assign local method variables
			$strFirstName = $this->strFirstName;
			$strLastName = $this->strLastName;
			$strCompany = $this->strCompany;
			$strDateModifiedFirst = $this->strDateModifiedFirst;
			$strDateModifiedLast = $this->strDateModifiedLast;
			$strDateModified = $this->strDateModified;
			$arrCustomFields = $this->arrCustomFields;
			
			// Expand to include the primary address, State/Province, and Country
			$objExpansionMap[Contact::ExpandCompany] = true;
			
			// QApplication::$Database[1]->EnableProfiling();
			
			$this->dtgContact->TotalItemCount = Contact::CountBySearch($strFirstName, $strLastName, $strCompany, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $objExpansionMap);
			if ($this->dtgContact->TotalItemCount == 0) {
				$this->dtgContact->ShowHeader = false;
			}
			else {
				$this->dtgContact->DataSource = Contact::LoadArrayBySearch($strFirstName, $strLastName, $strCompany, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $this->dtgContact->SortInfo, $this->dtgContact->LimitInfo, $objExpansionMap);
				$this->dtgContact->ShowHeader = true;
			}
			$this->blnSearch = false;
		}
		
/*		protected function Form_Exit() {
			// QApplication::$Database[1]->OutputProfiling();
		}*/
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}		

		// Setup the First Name Search Input
	  protected function txtFirstName_Create() {
	    $this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';
      $this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
      $this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  // Setup the Last Name Search Input
	  protected function txtLastName_Create() {
	    $this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
      $this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
      $this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  // Setup the Company Search Input
	  protected function txtCompany_Create() {
	    $this->txtCompany = new QTextBox($this);
			$this->txtCompany->Name = 'Company';
      $this->txtCompany->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
      $this->txtCompany->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  /**************************
	   *	CREATE BUTTON METHODS
	  **************************/
		
	  // Create the Search Button
	  protected function btnSearch_Create() {
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Name = 'search';
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  // Create the Clear Button
	  protected function btnClear_Create() {
	  	$this->btnClear = new QButton($this);
			$this->btnClear->Name = 'clear';
			$this->btnClear->Text = 'Clear';
			$this->btnClear->AddAction(new QClickEvent(), new QAjaxAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  // Create the 'Advanced Search' Label
	  protected function lblAdvanced_Create() {
	  	$this->lblAdvanced = new QLabel($this);
	  	$this->lblAdvanced->Name = 'Advanced';
	  	$this->lblAdvanced->Text = 'Advanced Search';
	  	$this->lblAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->ctlAdvanced));
	  	$this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblAdvanced_Click'));
	  	$this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
	  	$this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
	  }
	  
	  // Create the Advanced Search Composite Control
  	protected function ctlAdvanced_Create() {
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this, 8);
  		$this->ctlAdvanced->Display = false;
  	}

	  // Create the Contact datagrid
  	protected function dtgContact_Create() {
			$this->dtgContact = new QDataGrid($this);
			$this->dtgContact->Name = 'contact_list';
  		$this->dtgContact->CellPadding = 5;
  		$this->dtgContact->CellSpacing = 0;
  		$this->dtgContact->CssClass = "datagrid";
      		
      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgContact->UseAjax = true;
      
      // Allow for column toggling
      $this->dtgContact->ShowColumnToggle = true;
      
      // Allow for CSV Export
      $this->dtgContact->ShowExportCsv = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgContact);
      $this->dtgContact->Paginator = $objPaginator;
      $this->dtgContact->ItemsPerPage = 20;
          
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Name', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', 'SortByCommand="last_name ASC, first_name DESC"', 'ReverseSortByCommand="last_name DESC, first_name DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Title', '<?= $_ITEM->Title ?>', 'Width=200', 'SortByCommand="title ASC"', 'ReverseSortByCommand="title DESC"', 'CssClass="dtg_column"'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Company', '<?= $_ITEM->Company->__toStringWithLink("bluelink") ?>', 'SortByCommand="contact__company_id__short_description ASC"', 'ReverseSortByCommand="contact__company_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Email', '<?= $_ITEM->Email ?>', 'SortByCommand="email ASC"', 'ReverseSortByCommand="email DESC"', 'CssClass="dtg_column"'));
      
      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(8, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		$this->dtgContact->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      	}
      }      
      
      $this->dtgContact->SortColumnIndex = 0;
    	$this->dtgContact->SortDirection = 0;
      
      $objStyle = $this->dtgContact->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgContact->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgContact->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
      
      $this->dtgContact->SetDataBinder('dtgContact_Bind');
  	}
  	
	  protected function btnSearch_Click() {
	  	$this->blnSearch = true;
			$this->dtgContact->PageNumber = 1;
	  }

	  protected function btnClear_Click() {

  		// Set controls to null
	  	$this->txtFirstName->Text = '';
	  	$this->txtLastName->Text = '';
	  	$this->txtCompany->Text = '';
	  	$this->ctlAdvanced->ClearControls();
	  	
	  	// Set search variables to null
	  	$this->strFirstName = null;
	  	$this->strLastName = null;
	  	$this->strCompany = null;
	  	$this->strDateModified = null;
	  	$this->strDateModifiedFirst = null;
	  	$this->strDateModifiedLast = null;
  		if ($this->arrCustomFields) {
	  		foreach ($this->arrCustomFields as $field) {
	  			$field['value'] = null;
	  		}
	  	}	  	
	  	$this->blnSearch = false;
  	}
  	
  	// Display or hide the Advanced Search Composite Control
	  protected function lblAdvanced_Click() {
	  	if ($this->blnAdvanced) {
	  		$this->blnAdvanced = false;
	  		$this->lblAdvanced->Text = 'Advanced Search';
	  		
	  		$this->ctlAdvanced->ClearControls();
	  	}
	  	else {
	  		$this->blnAdvanced = true;
	  		$this->lblAdvanced->Text = 'Hide Advanced';
	  	}
	  }

	  // Assign the search variables values from the form inputs
	  protected function assignSearchValues() {
	  	
	  	$this->strFirstName = $this->txtFirstName->Text;
	  	$this->strLastName = $this->txtLastName->Text;
	  	$this->strCompany = $this->txtCompany->Text;
			$this->strDateModified = $this->ctlAdvanced->DateModified;
			$this->strDateModifiedFirst = $this->ctlAdvanced->DateModifiedFirst;
			$this->strDateModifiedLast = $this->ctlAdvanced->DateModifiedLast;
			
			$this->arrCustomFields = $this->ctlAdvanced->CustomFieldArray;
			if ($this->arrCustomFields) {
				foreach ($this->arrCustomFields as &$field) {
					if ($field['input'] instanceof QListBox) {
						$field['value'] = $field['input']->SelectedValue;
					}
					elseif ($field['input'] instanceof QTextBox) {
						$field['value'] = $field['input']->Text;
					}
				}
			}					
	  }	     	
	}
	ContactListForm::Run('ContactListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/contacts/contact_list.tpl.php');
?>