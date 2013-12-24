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

	require_once('../includes/prepend.inc.php');
	QApplication::Authenticate(6);
	require_once(__FORMBASE_CLASSES__ . '/ReceiptListFormBase.class.php');
    require('../receiving/ReceiptMassEditPanel.class.php');
	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the Receipt class.  It extends from the code-generated
	 * abstract ReceiptListFormBase class.
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
	class ReceiptListForm extends ReceiptListFormBase {

	/**
	 * @var  QLabel     $lblWarning
	 * @var  QDialogBox $dlgMassEdit
	 * @var  QDialogBox $dlgMassDelete
	 * @var  QButton    $btnMassDelete
	 * @var  QButton    $btnMassEdit
	 *
	 */
		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;		
		
		// Basic Inputs
		protected $txtFromCompany;
		protected $txtFromContact;
		protected $txtReceiptNumber;
		protected $txtAssetCode;
		protected $txtInventoryModelCode;
		protected $lstStatus;
		
		/// Buttons
		protected $btnSearch;
		protected $blnSearch;
		protected $btnClear;
		
		// Advanced Label/Link
		protected $lblAdvanced;
		// Boolean that toggles Advanced Search display
		protected $blnAdvanced;
		// Advanced Search Composite control
		protected $ctlAdvanced;

		// Search Values
		protected $strFromCompany;
		protected $strFromContact;
		protected $strReceiptNumber;
		protected $strAssetCode;
		protected $strInventoryModelCode;
		protected $intStatus;
		protected $strNote;
		protected $strDueDate;
		protected $strReceiptDate;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;
		protected $blnAttachment;
		
		// Custom Fields array
		protected $arrCustomFields;
		
		// HoverTip Arrays
		public $objAssetTransactionArray;
		public $objInventoryTransactionArray;

		// Mass Action Controls
		protected $lblWarning;
		protected $dlgMassEdit;
		protected $dlgMassDelete;
		protected $btnMassEdit;
		protected $btnMassDelete;
        protected $pnlReceiptMassEdit;
        protected $btnMassDeleteConfirm;
        protected $btnMassDeleteCancel;

        protected $arrToDelete = array();

		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			$this->txtFromCompany_Create();
			$this->txtFromContact_Create();
			$this->txtReceiptNumber_Create();
			$this->txtAssetCode_Create();
			$this->txtInventoryModelCode_Create();
			$this->lstStatus_Create();
			$this->btnSearch_Create();
			$this->btnClear_Create();
			$this->ctlAdvanced_Create();
			$this->lblAdvanced_Create();
			$this->dtgReceipt_Create();

			// Mass Actions controls create
			$this->lblWarning_Create();
			$this->dlgMassEdit_Create();
			$this->dlgMassDelete_Create();
			$this->btnMassDelete_Create();
            $this->btnMassDeleteCancel_Create();
            $this->btnMassDeleteConfirm_Create();
			$this->btnMassEdit_Create();

		}
		
		protected function dtgReceipt_Bind() {
			
			// Assing the class member values from the search form inputs
			if ($this->blnSearch) {
				$this->assignSearchValues();
			}			
			
			// Assign local method variables
			$strFromCompany = $this->strFromCompany;
			$strFromContact = $this->strFromContact;
			$strReceiptNumber = $this->strReceiptNumber;
			$strAssetCode = $this->strAssetCode;
			$strInventoryModelCode = $this->strInventoryModelCode;
			$intStatus = $this->intStatus;
			$strNote = $this->strNote;
			$strDueDate = $this->strDueDate;
			$strReceiptDate = $this->strReceiptDate;
			$strDateModifiedFirst = $this->strDateModifiedFirst;
			$strDateModifiedLast = $this->strDateModifiedLast;
			$strDateModified = $this->strDateModified;
			$blnAttachment = $this->blnAttachment;
			$arrCustomFields = $this->arrCustomFields;
			
			// Expand to include the primary address, State/Province, and Country
			$objExpansionMap[Receipt::ExpandTransaction] = true;
			$objExpansionMap[Receipt::ExpandFromCompany] = true;
			$objExpansionMap[Receipt::ExpandFromContact] = true;
			$objExpansionMap[Receipt::ExpandToContact] = true;
			$objExpansionMap[Receipt::ExpandCreatedByObject] = true;
			
			// QApplication::$Database[1]->EnableProfiling();
			
			$this->dtgReceipt->TotalItemCount = Receipt::CountBySearchHelper($strFromCompany, $strFromContact, $strReceiptNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strNote, $strDueDate, $strReceiptDate, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $objExpansionMap);
			if ($this->dtgReceipt->TotalItemCount == 0) {
				$this->dtgReceipt->ShowHeader = false;
			}
			else {
				$this->dtgReceipt->DataSource = Receipt::LoadArrayBySearchHelper($strFromCompany, $strFromContact, $strReceiptNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strNote, $strDueDate, $strReceiptDate, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $this->dtgReceipt->SortInfo, $this->dtgReceipt->LimitInfo, $objExpansionMap);
				$this->dtgReceipt->ShowHeader = true;
			}
			$this->blnSearch = false;
		}
		
  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}		
		
		// Create and Setup txtFromCompany
		protected function txtFromCompany_Create() {
			$this->txtFromCompany = new QTextBox($this);
			$this->txtFromCompany->Name = 'Sender Company';
			$this->txtFromCompany->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->txtFromCompany->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create and Setup txtFromContact
		protected function txtFromContact_Create() {
			$this->txtFromContact = new QTextBox($this);
			$this->txtFromContact->Name = 'Sender Contact';
			$this->txtFromContact->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->txtFromContact->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create and Setup txtReceiptNumber
		protected function txtReceiptNumber_Create() {
			$this->txtReceiptNumber = new QTextBox($this);
			$this->txtReceiptNumber->Name = 'Receipt Number';
			$this->txtReceiptNumber->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->txtReceiptNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create and Setup txtAssetCode
		protected function txtAssetCode_Create() {
			$this->txtAssetCode = new QTextBox($this);
			$this->txtAssetCode->Name = 'Asset Tag';
			$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create and Setup txtInventoryModelCode
		protected function txtInventoryModelCode_Create() {
			$this->txtInventoryModelCode = new QTextBox($this);
			$this->txtInventoryModelCode->Name = 'Inventory Code';
			$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create and Setup lstStatus
		protected function lstStatus_Create() {
			$this->lstStatus = new QListBox($this);
			$this->lstStatus->Name = 'Status';
			$this->lstStatus->AddItem('- Select One -', null);
			$this->lstStatus->AddItem('Pending', 1);
			$this->lstStatus->AddItem('Received', 2);
			$this->lstStatus->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->lstStatus->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
	  /**************************
	   *	CREATE BUTTON METHODS
	  **************************/
		
	  // Create the Search Button
	  protected function btnSearch_Create() {
			$this->btnSearch = new QButton($this);
			$this->btnSearch->Name = 'search';
			$this->btnSearch->Text = 'Search';
			$this->btnSearch->AddAction(new QClickEvent(), new QServerAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
			$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }
	  
	  // Create the Clear Button
	  protected function btnClear_Create() {
	  	$this->btnClear = new QButton($this);
			$this->btnClear->Name = 'clear';
			$this->btnClear->Text = 'Clear';
			$this->btnClear->AddAction(new QClickEvent(), new QServerAction('btnClear_Click'));
			$this->btnClear->AddAction(new QEnterKeyEvent(), new QServerAction('btnClear_Click'));
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
  		$this->ctlAdvanced = new QAdvancedSearchComposite($this, 11);
  		$this->ctlAdvanced->Display = false;
  	}
	  
	  // Create the Receipt datagrid
  	protected function dtgReceipt_Create() {
			$this->dtgReceipt = new QDataGrid($this);
			$this->dtgReceipt->Name = 'receipt_list';
  		$this->dtgReceipt->CellPadding = 5;
  		$this->dtgReceipt->CellSpacing = 0;
  		$this->dtgReceipt->CssClass = "datagrid";
  		
  		// Allow for column toggling
      $this->dtgReceipt->ShowColumnToggle = true;
      
      // Allow for CSV Export
      $this->dtgReceipt->ShowExportCsv = true;
      		
      // Disable AJAX on the datagrid
      $this->dtgReceipt->UseAjax = false;

      // Enable Pagination
      $objPaginator = new QPaginator($this->dtgReceipt);
      $this->dtgReceipt->Paginator = $objPaginator;
      $this->dtgReceipt->ItemsPerPage = QApplication::$TracmorSettings->SearchResultsPerPage;
	  // Add column with checkBoxes to perform MassActions
	  $this->dtgReceipt->AddColumn(new QDataGridColumnExt('<?= $_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->ReceiptId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment_gray.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Receipt Number', '<?= $_ITEM->__toStringWithLink("bluelink") ?> <?= $_ITEM->__toStringHoverTips($_CONTROL) ?>', 'SortByCommand="receipt_number * 1 ASC"', 'ReverseSortByCommand="receipt_number * 1 DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Sender Company', '<?= $_ITEM->FromCompany->__toString() ?>', 'Width=200', 'SortByCommand="receipt__from_company_id__short_description ASC"', 'ReverseSortByCommand="receipt__from_company_id__short_description DESC"', 'CssClass="dtg_column"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Sender Contact', '<?= $_ITEM->FromContact->__toString() ?>', 'SortByCommand="receipt__from_contact_id__last_name ASC"', 'ReverseSortByCommand="receipt__from_contact_id__last_name DESC"', 'CssClass="dtg_column"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Scheduled By', '<?= $_ITEM->CreatedByObject->__toString() ?>', 'SortByCommand="receipt__created_by__last_name ASC"', 'ReverseSortByCommand="receipt__created_by__last_name DESC"', 'CssClass="dtg_column"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Status', '<?= $_ITEM->__toStringStatusWithHovertip($_CONTROL) ?>', 'SortByCommand="received_flag ASC, due_date ASC"', 'ReverseSortByCommand="received_flag DESC, due_date DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Date Due', '<?= $_FORM->DisplayDate($_ITEM->DueDate); ?>', 'SortByCommand="due_date ASC"', 'ReverseSortByCommand="due_date DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Date Received', '<?= $_FORM->DisplayDate($_ITEM->ReceiptDate); ?>', 'SortByCommand="receipt_date ASC"', 'ReverseSortByCommand="receipt_date DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"', 'Display="false"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Recipient Contact', '<?= $_ITEM->ToContact->__toString(); ?>', 'SortByCommand="receipt__to_contact_id__last_name ASC"', 'ReverseSortByCommand="receipt__to_contact_id__last_name DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"', 'Display="false"'));
      $this->dtgReceipt->AddColumn(new QDataGridColumnExt('Note', '<?= $_ITEM->Transaction->Note ?>', 'SortByCommand="receipt__transaction_id__note ASC"', 'ReverseSortByCommand="receipt__transaction_id__note DESC"', 'CssClass="dtg_column"', 'Width="160"', 'HtmlEntities="false"', 'Display="false"'));

      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(11, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		//Only add the custom field column if the role has authorization to view it.
      		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
      			$this->dtgReceipt->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      		}
      	}
      }
           
      $this->dtgReceipt->SortColumnIndex = 1;
    	$this->dtgReceipt->SortDirection = 1;
      
      $objStyle = $this->dtgReceipt->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgReceipt->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgReceipt->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';
      
      $this->dtgReceipt->SetDataBinder('dtgReceipt_Bind');
  	}
  	
  	public function DisplayDate($objDateTime) {
  		if ($objDateTime instanceof QDateTime) {
  			return $objDateTime->__toString();
  		}
  		else {
  			return null;
  		}
  	}

  	// Reset the page number to 1 if a new search is enacted
	  protected function btnSearch_Click() {
	  	$this->blnSearch = true;
			$this->dtgReceipt->PageNumber = 1;
	  }
	  
	  // Clear button click - clear all input values
	  protected function btnClear_Click() {

  		// Set controls to null
	  	$this->txtFromCompany->Text = '';
	  	$this->txtFromContact->Text = '';
	  	$this->txtReceiptNumber->Text = '';
	  	$this->txtAssetCode->Text = '';
	  	$this->txtInventoryModelCode->Text = '';
	  	$this->lstStatus->SelectedIndex = 0;
	  	$this->ctlAdvanced->ClearControls();
	  	
	  	// Set search variables to null
	  	$this->strFromCompany = null;
	  	$this->strFromContact = null;
	  	$this->strReceiptNumber = null;
	  	$this->strAssetCode = null;
	  	$this->strInventoryModelCode = null;
	  	$this->intStatus = null;
	  	$this->strNote = null;
	  	$this->strDueDate = null;
	  	$this->strReceiptDate = null;
	  	$this->strDateModified = null;
	  	$this->strDateModifiedFirst = null;
	  	$this->strDateModifiedLast = null;
	  	$this->blnAttachment = false;
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
	  	
	  	$this->strFromCompany = $this->txtFromCompany->Text;
	  	$this->strFromContact = $this->txtFromContact->Text;
	  	$this->strReceiptNumber = $this->txtReceiptNumber->Text;
	  	$this->strAssetCode = $this->txtAssetCode->Text;
	  	$this->strInventoryModelCode = $this->txtInventoryModelCode->Text;
	  	$this->intStatus = $this->lstStatus->SelectedValue;
	  	$this->strNote = $this->ctlAdvanced->Note;
	  	$this->strDueDate = $this->ctlAdvanced->DueDate;
	  	$this->strReceiptDate = $this->ctlAdvanced->ReceiptDate;
			$this->strDateModified = $this->ctlAdvanced->DateModified;
			$this->strDateModifiedFirst = $this->ctlAdvanced->DateModifiedFirst;
			$this->strDateModifiedLast = $this->ctlAdvanced->DateModifiedLast;
			$this->blnAttachment = $this->ctlAdvanced->Attachment;
			
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

		/**
		 * Mass Actions controls creating/handling functions
		*/
		protected function dlgMassDelete_Create(){
			$this->dlgMassDelete = new QDialogBox($this);
			$this->dlgMassDelete->AutoRenderChildren = true;
			$this->dlgMassDelete->Width = '440px';
			$this->dlgMassDelete->Overflow = QOverflow::Auto;
			$this->dlgMassDelete->Padding = '10px';
			$this->dlgMassDelete->Display = false;
			$this->dlgMassDelete->BackColor = '#FFFFFF';
			$this->dlgMassDelete->MatteClickable = false;
			$this->dlgMassDelete->CssClass = "modal_dialog";
		}

		protected function dlgMassEdit_Create(){
			$this->dlgMassEdit = new QDialogBox($this);
			$this->dlgMassEdit->AutoRenderChildren = true;
			$this->dlgMassEdit->Width = '440px';
			$this->dlgMassEdit->Overflow = QOverflow::Auto;
			$this->dlgMassEdit->Padding = '10px';
			$this->dlgMassEdit->Display = false;
			$this->dlgMassEdit->BackColor = '#FFFFFF';
			$this->dlgMassEdit->MatteClickable = false;
			$this->dlgMassEdit->CssClass = "modal_dialog";
		}

		protected function btnMassDelete_Create(){
			$this->btnMassDelete = new QButton($this);
			$this->btnMassDelete->Name = "delete";
			$this->btnMassDelete->Text = "Delete";
			$this->btnMassDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to delete these items?'));
			$this->btnMassDelete->AddAction(new QClickEvent(), new QAjaxAction('btnMassDelete_Click'));
			$this->btnMassDelete->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassDelete_Click'));
			$this->btnMassDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnMassEdit_Create(){
			$this->btnMassEdit = new QButton($this);
			$this->btnMassEdit->Text = "edit";
			$this->btnMassEdit->Text = "Edit";
			$this->btnMassEdit->AddAction(new QClickEvent(), new  QAjaxAction('btnMassEdit_Click'));
			$this->btnMassEdit->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassEdit_Click'));
			$this->btnMassEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function lblWarning_Create(){
			$this->lblWarning = new QLabel($this);
			$this->lblWarning->Text = "";
			$this->lblWarning->CssClass = "warning";
		}

		protected function btnMassDelete_Click(){
			$items = $this->dtgReceipt->getSelected('ReceiptId');
			if(count($items)>0){
				$this->lblWarning->Text = "";
                $arrToSkip = array();
                // Separating items able to be deleted
                foreach ($items as $item){
                    $receiptToDelete = Receipt::Load($item);
                    $objAssetTransactionArray     = AssetTransaction::LoadArrayByTransactionId($receiptToDelete->TransactionId);
                    $objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($receiptToDelete->TransactionId);
                    $blnError = false;
                    if ($objAssetTransactionArray) {
                        foreach ($objAssetTransactionArray as $objAssetTransaction) {
                            if ($objAssetTransaction->blnReturnReceivedStatus()) {
                                $blnError = true;
                            }
                        }
                    }

                    if ($objInventoryTransactionArray) {
                        foreach ($objInventoryTransactionArray as $objInventoryTransaction) {
                            if ($objInventoryTransaction->blnReturnReceivedStatus()) {
                                $blnError = true;
                            }
                        }
                    }

                    if ($blnError){
                        $arrToSkip[] = $receiptToDelete->ReceiptNumber;
                    }
                    else{
                        $this->arrToDelete[] = $receiptToDelete; // objects stored in array!
                    }
                }
                if (count($arrToSkip)>0){
                    if(count($arrToSkip)==1){
                        $toBe = 'is';
                        $ending = '';
                    }
                    else{
                        $toBe = 'are';
                        $ending = 's';
                    }
                    $this->dlgMassDelete->Text =sprintf("There %s %s Receipt%s that %s not able to be deleted.
                                                         Would you like to continue the deletion process,
                                                         skipping these item%s?<br />",
                                                         $toBe, count($arrToSkip), $ending, $toBe, $ending);
                    $this->dlgMassDelete->ShowDialogBox();
                }
                else{
                    if (count($this->arrToDelete)>0){
                        try{
                            // Get an instance of the database
                            $objDatabase = QApplication::$Database[1];
                            // Begin a MySQL Transaction to be either committed or rolled back
                            $objDatabase->TransactionBegin();
                            foreach($this->arrToDelete as $receipt){
                                $this->receiptDelete($receipt);
                            }
                            $objDatabase->TransactionCommit();
                            $this->arrToDelete = array();
                            QApplication::Redirect('');
                        }
                        catch(QMySqliDatabaseException $objExc) {
                            $objDatabase->TransactionRollback();
                            throw new QDatabaseException();
                        }
                    }
                }
			}else{
				$this->lblWarning->Text = "You haven't chosen any Receipt to Delete" ;
			}
		}

		protected function btnMassEdit_Click(){
			$items = $this->dtgReceipt->getSelected('ReceiptId');
			if(count($items)>0){
				$this->lblWarning->Text = "";
                if(!($this->pnlReceiptMassEdit instanceof ReceiptMassEditPanel)){
                    $this->pnlReceiptMassEdit = new ReceiptMassEditPanel($this->dlgMassEdit,
                        'pnlReceiptMassEdit_Close',
                        $items);
                }
				$this->dlgMassEdit->ShowDialogBox();
			}else{
				$this->lblWarning->Text = "You haven't chosen any Receipt to Edit" ;
			}
		}

        public function pnlReceiptMassEdit_Close(){
            $this->dlgMassEdit->HideDialogBox();
        }

        protected function btnMassDeleteCancel_Create(){
            $this->btnMassDeleteCancel = new QButton($this->dlgMassDelete);
            $this->btnMassDeleteCancel->Text = "Cancel";
            $this->btnMassDeleteCancel->AddAction(new QClickEvent(), new QAjaxAction('btnMassDeleteCancel_Click'));
            $this->btnMassDeleteCancel->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassDeleteCancel_Click'));
        }

        protected function btnMassDeleteConfirm_Create(){
            $this->btnMassDeleteConfirm = new QButton($this->dlgMassDelete);
            $this->btnMassDeleteConfirm->Text = "Confirm";
            $this->btnMassDeleteConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnMassDeleteConfirm_Click'));
            $this->btnMassDeleteConfirm->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassDeleteConfirm_Click'));
        }

        protected function btnMassDeleteConfirm_Click(){
            if (count($this->arrToDelete)>0){
                foreach($this->arrToDelete as $receipt){
                    $this->receiptDelete($receipt);
                }
                $this->arrToDelete = array();
            }
            $this->dlgMassDelete->HideDialogBox();
            QApplication::Redirect('');
        }

        protected function btnMassDeleteCancel_Click(){
            $this->dlgMassDelete->HideDialogBox();
            QApplication::Redirect('');
        }

        public function receiptDelete(Receipt $receipt){
            $objAssetTransactionArray     = AssetTransaction::LoadArrayByTransactionId($receipt->TransactionId);
            $objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($receipt->TransactionId);
            // Take out the inventory from the TBR InventoryLocation
            if ($objInventoryTransactionArray) {
                foreach ($objInventoryTransactionArray as $objInventoryTransaction) {
                    $objInventoryTransaction->InventoryLocation->Quantity -= $objInventoryTransaction->Quantity;
                    $objInventoryTransaction->InventoryLocation->Save();
                }
            }

            // Delete any assets that were created while scheduling this receipt
            if ($objAssetTransactionArray) {
                foreach ($objAssetTransactionArray as $objAssetTransaction) {
                    if ($objAssetTransaction->NewAssetFlag) {
                        $objAssetTransaction->Asset->Delete();
                    }
                }
            }

            // Load the Transaction
            $objTransaction = Transaction::Load($receipt->TransactionId);
            // Delete the Transaction Object and let it MySQL CASCADE down to asset_transaction, inventory_transaction, and receipt
            $objTransaction->Delete();
        }

        public function lstFromCompany_Select(){
            $objCompany = Company::Load($this->pnlReceiptMassEdit->lstFromCompany->SelectedValue);
            if ($objCompany) {
                // Load the values for the 'From Contact' List
                if ($this->pnlReceiptMassEdit->lstFromContact) {
                    $objFromContactArray = Contact::LoadArrayByCompanyId($objCompany->CompanyId);
                    $this->pnlReceiptMassEdit->lstFromContact->RemoveAllItems();
                    $this->pnlReceiptMassEdit->lstFromContact->AddItem('- Select One -', null);
                    if ($objFromContactArray) {
                        foreach ($objFromContactArray as $objFromContact) {
                            $objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
                            $this->pnlReceiptMassEdit->lstFromContact->AddItem($objListItem);
                        }

                        $this->pnlReceiptMassEdit->lstFromContact->Enabled = true;
                    }
                }
                if ($this->pnlReceiptMassEdit->lstFromAddress) {
                    $objFromAddressArray = Address::LoadArrayByCompanyId($objCompany->CompanyId,
                        QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
                    $this->pnlReceiptMassEdit->lstFromAddress->RemoveAllItems();
                    if (is_array($objFromAddressArray) && count($objFromAddressArray)>0) {
                        foreach ($objFromAddressArray as $objFromAddress) {
                            $objListItem = new QListItem($objFromAddress->__toString(),
                                                         $objFromAddress->AddressId);
                            $this->pnlReceiptMassEdit->lstFromAddress->AddItem($objListItem);
                        }
                        $this->pnlReceiptMassEdit->lstFromAddress->Enabled = true;
                        //$this->lstToAddress_Select();
                    }
                }
            }
        }

        public function lstToCompany_Select(){
            if ($this->pnlReceiptMassEdit->lstToCompany->SelectedValue) {
                $objCompany = Company::Load($this->pnlReceiptMassEdit->lstToCompany->SelectedValue);
                if ($objCompany) {
                    // Load the values for the 'To Contact' List
                    if ($this->pnlReceiptMassEdit->lstToContact) {
                        $objToContactArray = Contact::LoadArrayByCompanyId($objCompany->CompanyId,
                                                                          QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName,
                                                                                                 QQN::Contact()->FirstName)
                                                                                    )
                                                                          );
                        $this->pnlReceiptMassEdit->lstToContact->RemoveAllItems();
                        if ($objToContactArray) {
                            foreach ($objToContactArray as $objToContact) {
                                $objListItem = new QListItem($objToContact->__toString(),
                                                             $objToContact->ContactId);
                                $this->pnlReceiptMassEdit->lstToContact->AddItem($objListItem);
                            }
                            $this->pnlReceiptMassEdit->lstToContact->Enabled = true;
                        }
                    }
                    // Load the values for the 'To Address' List
                    if ($this->pnlReceiptMassEdit->lstToAddress) {
                        $objToAddressArray = Address::LoadArrayByCompanyId($objCompany->CompanyId,
                                                      QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
                        $this->pnlReceiptMassEdit->lstToAddress->RemoveAllItems();
                        if ($objToAddressArray) {
                            foreach ($objToAddressArray as $objToAddress) {
                                $objListItem = new QListItem($objToAddress->__toString(),
                                                             $objToAddress->AddressId);
                                $this->pnlReceiptMassEdit->lstToAddress->AddItem($objListItem);
                            }
                            $this->pnlReceiptMassEdit->lstToAddress->Enabled = true;
                            //$this->lstToAddress_Select();
                        }
                    }
                }
            }
        }
	}



	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/receipt_edit.php.inc as the included HTML template file
	ReceiptListForm::Run('ReceiptListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/receiving/receipt_list.tpl.php');
?>
