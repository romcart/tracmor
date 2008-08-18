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

class QUserSearchComposite extends QControl {
	
  // Basic Inputs
	protected $txtUsername;
	
  // Buttons
	protected $btnSearch;
	protected $blnSearch;
	protected $btnClear;
	
	// Search Values
	protected $strUsername;
	
	public $dtgUserAccount;
	public $objParentObject;
	
	// We want to override the constructor in order to setup the subcontrols
	public function __construct($objParentObject, $strControlId = null, $blnShowCheckboxes = false) {
		
    // First, call the parent to do most of the basic setup
    try {
        parent::__construct($objParentObject, $strControlId);
    } catch (QCallerException $objExc) {
        $objExc->IncrementOffset();
        throw $objExc;
    }
    
    $this->objParentObject = $objParentObject;
    
		$this->dtgUserAccount = new QDataGrid($this);
		$this->dtgUserAccount->Name = 'user_list';
		$this->dtgUserAccount->CellPadding = 5;
  	$this->dtgUserAccount->CellSpacing = 0;
  	$this->dtgUserAccount->CssClass = "datagrid";
      		
    // Disable AJAX for the datagrid
    $this->dtgUserAccount->UseAjax = false;
      
    // Allow for column toggling
    $this->dtgUserAccount->ShowColumnToggle = true;
      
    // Allow for CSV Export
    $this->dtgUserAccount->ShowExportCsv = true;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgUserAccount);
    $this->dtgUserAccount->Paginator = $objPaginator;
    $this->dtgUserAccount->ItemsPerPage = 20;
    
    // If the user wants the checkboxes column
    if ($blnShowCheckboxes) {
    	// This will render all of the necessary controls and actions. chkSelected_Render expects a unique ID for each row of the database.
    	$this->dtgUserAccount->AddColumn(new QDataGridColumnExt('<?=$_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->UserAccountId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    }
    $this->dtgUserAccount->AddColumn(new QDataGridColumnExt('Username', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->Username), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->Username, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgUserAccount->AddColumn(new QDataGridColumnExt('Name', '<?= $_ITEM->FirstName ?> <?= $_ITEM->LastName ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->LastName, false, QQN::UserAccount()->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->LastName, QQN::UserAccount()->FirstName), 'CssClass' => "dtg_column")));
    $this->dtgUserAccount->AddColumn(new QDataGridColumnExt('User Role', '<?= $_ITEM->Role->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->Role->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->Role->ShortDescription, false), 'CssClass' => "dtg_column")));
    $this->dtgUserAccount->AddColumn(new QDataGridColumnExt('Active', '<?= $_ITEM->__toStringActiveFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->ActiveFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->ActiveFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgUserAccount->AddColumn(new QDataGridColumnExt('Admin', '<?= $_ITEM->__toStringAdminFlag() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->AdminFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->AdminFlag, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgUserAccount->AddColumn(new QDataGridColumnExt('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->CreatedByObject->LastName, false, QQN::UserAccount()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->CreatedByObject->LastName, QQN::UserAccount()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
    
    // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
    $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, false);
    if ($objCustomFieldArray) {
    	foreach ($objCustomFieldArray as $objCustomField) {
    		//Only add the custom field column if the role has authorization to view it.
     		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
     			$this->dtgUserAccount->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
     		}
     	}
    }
    
    $this->dtgUserAccount->SortColumnIndex = 1;
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
      
    $this->dtgUserAccount->SetDataBinder('dtgUserAccount_Bind', $this);
    
    $this->txtUsername_Create();
    $this->btnSearch_Create();
    $this->btnClear_Create();
  }
	
	public function ParsePostData() {
		
	}
	
	public function GetJavaScriptAction() {
			return "onchange";
	}
	
	public function Validate() {return true;}
	
	protected function GetControlHtml() {
		
		$strStyle = $this->GetStyleAttributes();
		if ($strStyle) {
			$strStyle = sprintf('style="%s"', $strStyle);
		}
		
		$strAttributes = $this->GetAttributes();
		
		// Store the Output Buffer locally
		$strAlreadyRendered = ob_get_contents();
		ob_clean();

		// Evaluate the template
		require('../admin/user_search_composite.tpl.php');
		$strTemplateEvaluated = ob_get_contents();
		ob_clean();

		// Restore the output buffer and return evaluated template
		print($strAlreadyRendered);
		
		$strToReturn =  sprintf('<span id="%s" %s%s>%s</span>',
		$this->strControlId,
		$strStyle,
		$strAttributes,
		$strTemplateEvaluated);
		
		return $strToReturn;		
	}
	
	public function GetDataGridObjectNameId() {
	  $strToReturn = array();
	  // DataGrid name
	  $strToReturn[0] = "dtgUserAccount";
	  // Id
	  $strToReturn[1] = "UserAccountId";
	  // For Label generation
	  $strToReturn[2] = "Username";
	  return $strToReturn;
	}
	
  public function dtgUserAccount_Bind() {
    $objClauses = array();
		if ($objClause = $this->dtgUserAccount->OrderByClause)
			array_push($objClauses, $objClause);
		$objClause = QQ::Expand(QQN::UserAccount()->CreatedByObject);
			array_push($objClauses, $objClause);
		$objClause = QQ::Expand(QQN::UserAccount()->Role);
			array_push($objClauses, $objClause);	
		
    $this->strUsername = $this->txtUsername->Text;
		if ($this->strUsername) {
		  $this->dtgUserAccount->TotalItemCount = UserAccount::QueryCount(QQ::Like(QQN::UserAccount()->Username, '%' . $this->strUsername . '%'), $objClauses);
		  if ($this->dtgUserAccount->TotalItemCount > 0) {
		    $this->dtgUserAccount->ShowHeader = true;
		    // Add the LimitClause information, as well
				if ($objClause = $this->dtgUserAccount->LimitClause)
					array_push($objClauses, $objClause);
		    $this->dtgUserAccount->DataSource = UserAccount::QueryArray(QQ::Like(QQN::UserAccount()->Username, '%' . $this->strUsername . '%'), $objClauses);
		  }
		  else {
		    $this->dtgUserAccount->ShowHeader = false;
		  }
		}
		else {
		  // Get Total Count b/c of Pagination
  		$this->dtgUserAccount->TotalItemCount = UserAccount::CountAll();
  		if ($this->dtgUserAccount->TotalItemCount == 0) {
  			$this->dtgUserAccount->ShowHeader = false;
  		}
  		else {
  			if ($objClause = $this->dtgUserAccount->LimitClause)
  				array_push($objClauses, $objClause);
  			$this->dtgUserAccount->DataSource = UserAccount::LoadAll($objClauses);
  			$this->dtgUserAccount->ShowHeader = true;
		  }
		}
  }
  
  protected function txtUsername_Create() {
  	$this->txtUsername = new QTextBox($this);
  	$this->txtUsername->Name = 'Username';
  	$this->txtUsername->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
  	$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }
  
  protected function btnSearch_Create() {
		$this->btnSearch = new QButton($this);
		$this->btnSearch->Name = 'search';
		$this->btnSearch->Text = 'Search';
		$this->btnSearch->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnSearch_Click'));
		$this->btnSearch->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
		$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }
  
  protected function btnClear_Create() {
  	$this->btnClear = new QButton($this);
		$this->btnClear->Name = 'clear';
		$this->btnClear->Text = 'Clear';
		$this->btnClear->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnClear_Click'));
		$this->btnClear->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
		$this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());			
  }
  
  public function btnSearch_Click() {
  	$this->blnSearch = true;
		$this->dtgUserAccount->PageNumber = 1;
  }
  
  public function btnClear_Click() {
  	// Set controls to null
	  $this->txtUsername->Text = '';
	  	
	  // Set search variables to null
	  $this->strUsername = null;
	  
	  $this->dtgUserAccount->SortColumnIndex = 1;
	  $this->blnSearch = false;
  }
  
 	// And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
			case "ParentObject": return $this->objParentObject;
				break;
      default:
        try {
            return parent::__get($strName);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
	  }
  }
  
  /////////////////////////
	// Public Properties: SET
	/////////////////////////
	public function __set($strName, $mixValue) {
		$this->blnModified = true;

		switch ($strName) {
			default:
				try {
					parent::__set($strName, $mixValue);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
				break;
		}
	}
}