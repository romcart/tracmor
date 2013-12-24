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
	QApplication::Authenticate(4);
    require_once(__FORMBASE_CLASSES__ . '/ContactListFormBase.class.php');
	require_once('ContactMassEditPanel.class.php');

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
		protected $blnAttachment;

		// Mass actions
		protected $lblWarning;
		protected $btnEdit;
		protected $btnDelete;
		protected $dlgMassEdit;
		protected $dlgDelete;
		protected $btnConfirm;
		protected $btnCancel;
		protected $dlgSimpleMessage;
	//	protected $btnEditConfirm;
	//	protected $btnEditCancel;
		protected $pnlContactEdit;
		protected $arrToDelete = array();

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

			// Mass Actions Controls
			$this->dlgDelete_Create();
			$this->dlgMassEdit_Create();
			$this->btnCancel_Create();
			$this->btnConfirm_Create();
	//		$this->btnEditConfirm_Create();
	//		$this->btnEditCancel_Create();

			$this->btnEdit_Create();
			$this->btnDelete_Create();
			$this->lblWarning_Create();
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
			$blnAttachment = $this->blnAttachment;
			$arrCustomFields = $this->arrCustomFields;

			// Expand to include the primary address, State/Province, and Country
			$objExpansionMap[Contact::ExpandCompany] = true;

			// Expand to include primary address
			$objExpansionMap[Contact::ExpandAddress] = true;

			// QApplication::$Database[1]->EnableProfiling();

			$this->dtgContact->TotalItemCount = Contact::CountBySearchHelper($strFirstName, $strLastName, $strCompany, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $objExpansionMap);
			if ($this->dtgContact->TotalItemCount == 0) {
				$this->dtgContact->ShowHeader = false;
			}
			else {
				$this->dtgContact->DataSource = Contact::LoadArrayBySearchHelper($strFirstName, $strLastName, $strCompany, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $this->dtgContact->SortInfo, $this->dtgContact->LimitInfo, $objExpansionMap);
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
      $this->txtFirstName->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }

	  // Setup the Last Name Search Input
	  protected function txtLastName_Create() {
	    $this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
      $this->txtLastName->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
      $this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }

	  // Setup the Company Search Input
	  protected function txtCompany_Create() {
	    $this->txtCompany = new QTextBox($this);
			$this->txtCompany->Name = 'Company';
      $this->txtCompany->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
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

	// Create Mass Edit Button
	protected function btnEdit_Create(){
		$this->btnEdit = new QButton($this);
		$this->btnEdit->Name = 'edit';
		$this->btnEdit->Text = 'Edit';
		$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
		$this->btnEdit->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnEdit_Click'));
		$this->btnEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	// Create Dialog box Edit
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
	// Create Dialog box delete
	protected function dlgDelete_Create(){
		$this->dlgDelete = new QDialogBox($this);
		$this->dlgDelete->AutoRenderChildren = true;
		$this->dlgDelete->Width = '440px';
		$this->dlgDelete->Overflow = QOverflow::Auto;
		$this->dlgDelete->Padding = '10px';
		$this->dlgDelete->Display = false;
		$this->dlgDelete->BackColor = '#FFFFFF';
		$this->dlgDelete->MatteClickable = false;
		$this->dlgDelete->CssClass = "modal_dialog";
	}
	//
	protected function lblWarning_Create(){
		$this->lblWarning = new QLabel($this);
		$this->lblWarning->Text = "";
		$this->lblWarning->CssClass = "warning";
	}

	protected function btnConfirm_Create(){
		$this->btnConfirm = new QButton($this->dlgDelete);
		$this->btnConfirm->Text = "Save";
		$this->btnConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnConfirm_Click'));
		$this->btnConfirm->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnConfirm_Click'));
	}

	protected function btnCancel_Create(){
		$this->btnCancel = new QButton($this->dlgDelete);
		$this->btnCancel->Text = "Cancel";
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancel_Click'));
	}
	// Create Mass Delete Button
	protected function btnDelete_Create(){
		$this->btnDelete = new QButton($this);
		$this->btnDelete->Name = 'delete';
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new QClickEvent(),
			                        new QConfirmAction("Are you sure you want to delete these objects?"));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	// Create Mass Delete Button
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

      // Disable AJAX for the datagrid
      $this->dtgContact->UseAjax = false;

      // Allow for column toggling
      $this->dtgContact->ShowColumnToggle = true;

      // Allow for CSV Export
      $this->dtgContact->ShowExportCsv = true;

      // Enable Pagination
      $objPaginator = new QPaginator($this->dtgContact);
      $this->dtgContact->Paginator = $objPaginator;
      $this->dtgContact->ItemsPerPage = QApplication::$TracmorSettings->SearchResultsPerPage;
	// Add Check boxes
	$this->dtgContact->AddColumn(new QDataGridColumnExt('<?= $_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->ContactId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));

      $this->dtgContact->AddColumn(new QDataGridColumnExt('ID', '<?= $_ITEM->ContactId ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->ContactId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->ContactId, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment_gray.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Name', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', 'SortByCommand="last_name ASC, first_name DESC"', 'ReverseSortByCommand="last_name DESC, first_name DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Title', '<?= $_ITEM->Title ?>', 'Width=200', 'SortByCommand="title ASC"', 'ReverseSortByCommand="title DESC"', 'CssClass="dtg_column"'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Company', '<?= $_ITEM->Company->__toStringWithLink("bluelink") ?>', 'SortByCommand="contact__company_id__short_description ASC"', 'ReverseSortByCommand="contact__company_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Email', '<?= $_ITEM->Email ?>', 'SortByCommand="email ASC"', 'ReverseSortByCommand="email DESC"', 'CssClass="dtg_column"'));
      $this->dtgContact->AddColumn(new QDataGridColumnExt('Address', '<?= ($_ITEM->Address instanceof Address) ? $_ITEM->Address->__toStringWithLink("bluelink") : "" ?>', 'SortByCommand="contact__address_id__short_description ASC"', 'ReverseSortByCommand="contact__address_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));

      // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
      $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(8, false);
      if ($objCustomFieldArray) {
      	foreach ($objCustomFieldArray as $objCustomField) {
      		//Only add the custom field column if the role has authorization to view it.
      		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
      			$this->dtgContact->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
      		}
      	}
      }

      $this->dtgContact->SortColumnIndex = 2;
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
	  	$this->blnAttachment = false;
  		if ($this->arrCustomFields) {
	  		foreach ($this->arrCustomFields as $field) {
	  			$field['value'] = null;
	  		}
	  	}
	  	$this->blnSearch = false;
  	}

    protected function btnEdit_Click(){
        $this->lblWarning->Text = "";
        $items = $this->dtgContact->getSelected('ContactId');
        if(count($items)>0){
            if (!$this->dlgMassEdit->Display) {
                // Create the panel, assigning it to the Dialog Box
                if (!$this->pnlContactEdit instanceof ContactMassEditPanel){
                    $this->pnlContactEdit = new ContactMassEditPanel($this->dlgMassEdit, 'dlgMassEdit_Close', $items);
                }
                // Show the dialog box
                $this->dlgMassEdit->ShowDialogBox();
            }
        }
        else{
            $this->lblWarning->Text = "You haven't chosen any Company to Edit" ;
        }
    }

    public function dlgMassEdit_Close(){
        $this->dlgMassEdit->HideDialogBox();
    }

	protected function btnDelete_Click($strFormId, $strControlId, $strParameter){
		$items = $this->dtgContact->getSelected('ContactId');
	    // Show confirm "Are you sure you want to {delete/edit} these objects?"
		if(count($items)>0){
		$this->lblWarning->Text = "";
			if (!$this->dlgDelete->Display) {
				$arrToBeSkipped = array();
				foreach ($items as $item){
					// Check if any Shipments or Receipts include selected contact
                    if(Shipment::hasContact($item)||Receipt::hasContact($item)){
						// append $item to  be skipped
						$arrToBeSkipped[] = $item;
					}
					else{
                        $this->arrToDelete[] = $item;
					}
				}
				if(count($arrToBeSkipped)>0){
                    if(count($arrToBeSkipped)==1){
                        $toBe = 'is';
                        $ending = '';
                    }
                    else{
                        $toBe = 'are';
                        $ending = 's';
                    }
					// Show dialog box "There are {number} {entity_type}s that are not able to be deleted. Would you like to continue the deletion process, skipping these items?"
					$this->dlgDelete->Text =sprintf("There %s %s contact%s that %s not able to be deleted.
					                                 Would you like to continue the deletion process,
					                                 skipping these item%s?<br />",
                                                     $toBe,count($arrToBeSkipped),$ending,$toBe,$ending);
					$this->dlgDelete->ShowDialogBox();
				}
				else{
					if (count($this->arrToDelete)>0){
						Contact::DeleteSelected($this->arrToDelete);
						$this->arrToDelete = array();
						QApplication::Redirect('');
					}
				}

			//	print_r(get_class_methods(get_class($this->dlgDelete)));exit;//$this->dlgDelete->ShowDialogBox() ;
			}
		}
		else{
		$this->lblWarning->Text = "You haven't chosen any Contact to Delete" ;
		}
	}
    public function btnCancel_Click($strFormId, $strControlId, $strParameter){
		$this->dlgDelete->HideDialogBox();
	}

	public function btnConfirm_Click($strFormId, $strControlId, $strParameter){
		if (count($this->arrToDelete)>0){
			Contact::DeleteSelected($this->arrToDelete);
			$this->arrToDelete = array();
		}
		$this->dlgDelete->HideDialogBox();
		QApplication::Redirect('');
	}
//	public function btnEditConfirm_Click(){
//		$items = $this->dtgContact->getSelected('ContactId');
//		$params = array();
//			$params['description'] = $this->txtDescription->Text;
//			$params['company_id'] = $this->lstCompany->SelectedValue;
//		if(count($params)==0){
//			//"No fields filled to changed";
//		}
//		else{
//			Contact::UpdateSelected($items,$params);
//			$this->dlgMassEdit->HideDialogBox();
//			QApplication::Redirect('');
//		}
//	}
//	public function btnEditCancel_Click(){
//		//$this->dtgContact->getColumn(0)->getControls();
//		$this->dlgMassEdit->HideDialogBox();
//	}
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
      public function btnMassEditCancel_Click(){
          $this->dlgMassEdit->HideDialogBox();
      }
    // Save Button Click Actions
    public function btnMassEditApply_Click($strFormId, $strControlId, $strParameter) {
       $this->pnlContactEdit->btnMassEditApply_Click($strFormId, $strControlId, $strParameter);
//       $this->dlgMassEdit->HideDialogBox();
//       QApplication::Redirect('');
    }

	}
	ContactListForm::Run('ContactListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/contacts/contact_list.tpl.php');
?>
