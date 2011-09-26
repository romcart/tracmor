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
?>

<?php
require('../contacts/CompanyEditPanel.class.php');
require('../contacts/ContactEditPanel.class.php');

class QAssetTransactComposite extends QControl {

	public $blnEditMode;
	public $objParentObject;
	public $strTitleVerb;
	public $objAssetArray;
	public $dtgAssetTransact;
	public $objAsset;

	public $blnTransactionModified;
	protected $lstLocation;
	protected $lstUser;
	protected $lstToCompany;
	protected $lstToContact;
	protected $lstCheckOutTo;
	protected $txtNote;
	protected $objAssetTransaction;
	protected $btnSave;
	protected $btnCancel;
	protected $btnAdd;
	protected $btnRemove;
	protected $txtNewAssetCode;
	protected $objTransaction;
	protected $intTransactionTypeId;
	protected $lblAddAsset;
	protected $ctlAssetSearchTool;
	protected $objCompanyArray;
	protected $dttDueDate;
	protected $lstDueDate;
	protected $lblNewToCompany;
	protected $lblNewToContact;
	protected $dlgNew;

	protected $pnlCheckOutTo;

	public function __construct($objParentObject, $strControlId = null) {
	    // First, call the parent to do most of the basic setup
    try {
        parent::__construct($objParentObject, $strControlId);
    } catch (QCallerException $objExc) {
        $objExc->IncrementOffset();
        throw $objExc;
    }

    // Assign the parent object (AssetEditForm from asset_edit.php)
    $this->objParentObject = $objParentObject;

    // Setup the Asset, which assigns objAsset and blnEditMode
    $this->objParentObject->SetupAsset($this);

    // Create an empty Asset Array
    $this->objAssetArray = array();

    if (!$this->intTransactionTypeId) {
      $this->intTransactionTypeId = QApplication::QueryString("intTransactionTypeId");
    }

    // Check Out
    //if ($this->intTransactionTypeId == 3) {
    $this->CheckOutTo_Create();
    $this->DueDate_Create();
    // Removed it from constructor and added where it used
    //$this->objCompanyArray = Company::LoadAllIntoArray();
    $this->lstToCompany_Create();
    $this->lstToContact_Create();
    $this->lblNewToCompany_Create();
    $this->lblNewToContact_Create();
    $this->dlgNew_Create();
    //}

    $this->btnCancel_Create();
    $this->lstLocation_Create();
    $this->txtNote_Create();
    $this->txtNewAssetCode_Create();
    $this->btnAdd_Create();
    $this->btnSave_Create();
    $this->dtgAssetTransact_Create();
    $this->ctlAssetSearchTool_Create();
	}

	// This method must be declared in all composite controls
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
		require('asset_transact_control.inc.php');
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

	// I'm pretty sure that this is not necessary
	// Create the Asset Code label
	protected function lblAssetCode_Create() {
		$this->lblAssetCode = new QLabel($this);
		$this->lblAssetCode->Name = 'Asset Code';
		$this->lblAssetCode->Text = $this->objAsset->AssetCode;
	}

	// Create the Note text field
	protected function txtNote_Create() {
		$this->txtNote = new QTextBox($this);
		$this->txtNote->Name = 'Note';
		$this->txtNote->TextMode = QTextMode::MultiLine;
		$this->txtNote->Columns = 80;
		$this->txtNote->Rows = 4;
		$this->txtNote->CausesValidation = false;
	}

	// Create and Setup lstLocation
	protected function lstLocation_Create() {
		$this->lstLocation = new QListBox($this);
		$this->lstLocation->Name = 'Location';
		$this->lstLocation->AddItem('- Select One -', null);
		$objLocationArray = Location::LoadAllLocations(false, false, 'short_description');
		if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
			$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
			$this->lstLocation->AddItem($objListItem);
		}
		$this->lstLocation->CausesValidation = false;
	}

	// Create the text field to enter new asset codes to add to the transaction
	// Eventually this field will receive information from the AML
	protected function txtNewAssetCode_Create() {
		$this->txtNewAssetCode = new QTextBox($this);
		$this->txtNewAssetCode->Name = 'Asset Code';
		$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtNewAssetCode->CausesValidation = false;
	}

	// Create the save button
	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnSave->CausesValidation = false;
	}

	// Setup Cancel Button
	protected function btnCancel_Create() {
		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = 'Cancel';
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
		$this->btnCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnCancel->CausesValidation = false;
	}

	// Setup Add Button
	protected function btnAdd_Create() {
		$this->btnAdd = new QButton($this);
		$this->btnAdd->Text = 'Add';
		$this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		$this->btnAdd->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		$this->btnAdd->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnAdd->CausesValidation = false;
	}

	protected function CheckOutTo_Create() {
		$this->lstCheckOutTo = new QRadioButtonList($this);
		$this->lstCheckOutTo->AddItem(new QListItem('User', 1, false, null, 'FontSize=12px'));
		$this->lstCheckOutTo->AddItem(new QListItem('Contact', 2, false, null, 'FontSize=12px'));
		$this->lstCheckOutTo->SelectedIndex = 0;
		$this->lstCheckOutTo->AddAction(new QChangeEvent(), new QAjaxAction('lstCheckOutTo_Select'));
		$this->lstUser = new QListBox($this);
		$this->lstUser->Name = 'User';
		$this->lstUser->AddItem('- Select One -', null);

		foreach (UserAccount::LoadAll(QQ::Clause(QQ::OrderBy(QQN::UserAccount()->Username))) as $objUser) {
			$this->lstUser->AddItem(sprintf("%s", $objUser->Username), $objUser->UserAccountId);
		}

		$this->lstCheckOutTo_Select();
	}

	protected function DueDate_Create() {
		$this->lstDueDate = new QRadioButtonList($this);
		$this->lstDueDate->AddItem(new QListItem('No due date', 1, false, null, 'FontSize=12px'));
		$this->lstDueDate->AddItem(new QListItem('Due Date:', 2, false, null, 'FontSize=12px'));
		$this->lstDueDate->SelectedIndex = 0;
		$this->lstDueDate->AddAction(new QChangeEvent(), new QAjaxAction('lstDueDate_Select'));

		$this->dttDueDate = new QDateTimePickerExt($this);
		$this->dttDueDate->DateTimePickerType = QDateTimePickerType::DateTime;
		$this->dttDueDate->Display = false;
		$dttNow = QDateTime::Now();
		$this->dttDueDate->MinimumYear = $dttNow->Year;
		$this->dttDueDate->__set('DateTime', QDateTime::FromTimestamp($dttNow->Timestamp + intval(QApplication::$TracmorSettings->DefaultCheckOutPeriod) * 3600));
		$this->dttDueDate->MaximumYear = $dttNow->Year+1;

		if (QApplication::$TracmorSettings->DueDateRequired == "1") {
			$this->dttDueDate->Display = true;
			$this->lstDueDate->SelectedIndex = 1;
		}
	}

	// New Entity (Company, Contact Dialog Box)
	protected function dlgNew_Create() {
		$this->dlgNew = new QDialogBox($this);
		$this->dlgNew->AutoRenderChildren = true;
		$this->dlgNew->Width = '440px';
		$this->dlgNew->Overflow = QOverflow::Auto;
		$this->dlgNew->Padding = '10px';
		$this->dlgNew->Display = false;
		$this->dlgNew->BackColor = '#FFFFFF';
		$this->dlgNew->MatteClickable = false;
		$this->dlgNew->CssClass = "modal_dialog";
	}

  // Create and Setup lstToCompany
	protected function lstToCompany_Create() {
		$this->lstToCompany = new QListBox($this);
		$this->lstToCompany->Name = "Company: ";
		$this->lstToCompany->Display = false;
		$this->lstToCompany->AddItem('- Select One -', null);
		$this->lstToCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstToCompany_Select'));
	}

	protected function lblNewToCompany_Create() {
		$this->lblNewToCompany = new QLabel($this);
		$this->lblNewToCompany->HtmlEntities = false;
		$this->lblNewToCompany->Text = '<img src="../images/add.png">';
		$this->lblNewToCompany->ToolTip = "New Company";
		$this->lblNewToCompany->CssClass = "add_icon";
		$this->lblNewToCompany->Display = false;
		$this->lblNewToCompany->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'lblNewToCompany_Click'));
		$this->lblNewToCompany->ActionParameter = $this->lstToCompany->ControlId;
	}

	// Create and Setup lstToContact
	protected function lstToContact_Create() {
		$this->lstToContact = new QListBox($this);
		$this->lstToContact->Name = "Contact: ";
		$this->lstToContact->Display = false;
		$this->lstToContact->Enabled = false;
		$this->lstToContact->AddItem('- Select One -', null);
	}

	protected function lblNewToContact_Create() {
	  $this->lblNewToContact = new QLabel($this);
		$this->lblNewToContact->HtmlEntities = false;
		$this->lblNewToContact->Text = '<img src="../images/add.png">';
		$this->lblNewToContact->ToolTip = "New Contact";
		$this->lblNewToContact->CssClass = "add_icon";
		$this->lblNewToContact->Display = false;
		$this->lblNewToContact->ActionParameter = $this->lstToContact->ControlId;
		$this->lblNewToContact->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'lblNewToContact_Click'));
	}

	// This is run every time a 'To Company' is selected
	// It loads the values for 'To Contact' drop-downs for the selected company
	public function lstToCompany_Select() {
		if ($this->lstToCompany->SelectedValue) {
			$objCompany = Company::Load($this->lstToCompany->SelectedValue);
			if ($objCompany) {
				// Load the values for the 'To Contact' List
				if ($this->lstToContact) {
					$objToContactArray = Contact::LoadArrayByCompanyId($objCompany->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
					$this->lstToContact->RemoveAllItems();
					$this->lstToContact->AddItem('- Select One -', null);
					if ($objToContactArray) {
						foreach ($objToContactArray as $objToContact) {
							$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
							$this->lstToContact->AddItem($objListItem);
						}
						$this->lstToContact->Enabled = true;
					}
				}
			}
		}
		else {
		  $this->lstToContact->Enabled = false;
		  $this->lstToContact->RemoveAllItems();
			$this->lstToContact->AddItem('- Select One -', null);
		}
	}

	// This is called when the 'new' label is clicked
	public function lblNewToCompany_Click($strFormId, $strControlId, $strParameter) {
		if (!$this->dlgNew->Display) {
			// Create the panel, assigning it to the Dialog Box
			$pnlEdit = new CompanyEditPanel($this->dlgNew, 'CloseNewToCompanyPanel');
			$pnlEdit->ActionParameter = $strParameter;
			// Show the dialog box
			$this->dlgNew->ShowDialogBox();
			$pnlEdit->txtShortDescription->Focus();
		}
	}

	// This is called when the 'new' label is clicked
	public function lblNewToContact_Click($strFormId, $strControlId, $strParameter) {
		if (!$this->dlgNew->Display) {
			if ($this->lstToCompany->SelectedValue) {
				// Create the panel, assigning it to the Dialog Box
				$pnlEdit = new ContactEditPanel($this->dlgNew, 'CloseNewToContactPanel', null, null, $this->lstToCompany->SelectedValue);
				$pnlEdit->ActionParameter = $strParameter;
				// Show the dialog box
				$this->dlgNew->ShowDialogBox();
				$pnlEdit->lstCompany->Focus();
			}
			else {
				$this->lblNewToContact->Warning = 'You must select a company first.';
			}
		}
	}

	// This method is run when company or contact edit dialog box is closed
	public function CloseNewPanel($blnUpdates) {
		$this->dlgNew->HideDialogBox();
	}

	public function CloseNewToCompanyPanel($blnUpdates) {
		$this->lstToCompany_Select();
		$this->CloseNewPanel($blnUpdates);
	}

	public function CloseNewToContactPanel($blnUpdates) {
		$this->lstToContact->Enabled = true;
		$this->CloseNewPanel($blnUpdates);
	}

	public function lstCheckOutTo_Select() {
	  switch ($this->lstCheckOutTo->SelectedValue) {
	    case 1:
	      if (QApplication::$TracmorSettings->CheckOutToOtherUsers != "1" && QApplication::$TracmorSettings->CheckOutToContacts == "1") {
	        $this->lstUser->RemoveAllItems();
	        $objUserAccount = QApplication::$objUserAccount;
	        $this->lstUser->AddItem(sprintf("%s", $objUserAccount->__toString()), $objUserAccount->UserAccountId);
	      }
	      $this->lstToCompany->Display = false;
	      $this->lblNewToCompany->Display = false;
	      $this->lstToContact->Display = false;
	      $this->lblNewToContact->Display = false;
	      $this->lstUser->Display = true;
  	    break;
  	  case 2:
  	    if (QApplication::$TracmorSettings->CheckOutToContacts != "1") {
  	      $this->lstCheckOutTo->SelectedIndex = 0;
  	      $this->lstCheckOutTo->Warning = "Check-out to contacts is disabled.";
	        $this->lstCheckOutTo_Select();
	        return;
  	    }
  	    if (!count($this->objCompanyArray)) {
  	      $this->objCompanyArray = Company::LoadAllIntoArray();
      		$objToCompanyArray = $this->objCompanyArray;
      		if ($objToCompanyArray) foreach ($objToCompanyArray as $arrToCompany) {
            $objListItem = new QListItem($arrToCompany['short_description'], $arrToCompany['company_id']);
      			$this->lstToCompany->AddItem($objListItem);
      		}
  	    }
  	    $this->lstToCompany->Display = true;
  	    $this->lblNewToCompany->Display = true;
	      $this->lstToContact->Display = true;
	      $this->lblNewToContact->Display = true;
	      $this->lstUser->Display = false;
  	    break;
  	  default:
  	    return;
	  }
	}

	public function lstDueDate_Select() {
	  switch ($this->lstDueDate->SelectedValue) {
	    case 1:
	      if (QApplication::$TracmorSettings->DueDateRequired == "1") {
	        $this->lstDueDate->SelectedIndex = 1;
  	      $this->lstDueDate->Warning = "Due date is required.";
	        $this->lstDueDate_Select();
	        return;
	      }
	      $this->dttDueDate->Enabled = false;
	      $this->dttDueDate->Display = false;
  	    break;
  	  case 2:
  	    $this->dttDueDate->Enabled = true;
	      $this->dttDueDate->Display = true;
  	    break;
	  }
	}

	// Setup the datagrid
	protected function dtgAssetTransact_Create() {

		$this->dtgAssetTransact = new QDataGrid($this);
		$this->dtgAssetTransact->CellPadding = 5;
		$this->dtgAssetTransact->CellSpacing = 0;
		$this->dtgAssetTransact->CssClass = "datagrid";

    // Enable AJAX - this won't work while using the DB profiler
    $this->dtgAssetTransact->UseAjax = true;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgAssetTransact);
    $this->dtgAssetTransact->Paginator = $objPaginator;
    $this->dtgAssetTransact->ItemsPerPage = 20;

    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Asset Code', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->AssetModel->__toStringWithLink("bluelink") ?>', array('Width' => 200, 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Current Location', '<?= $_ITEM->Location->__toString() ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));

/*    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Asset Code', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', 'SortByCommand="asset_code ASC"', 'ReverseSortByCommand="asset_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false"'));
    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->AssetModel->__toStringWithLink("bluelink") ?>', 'Width=200', 'SortByCommand="asset__asset_model_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false"'));
    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Current Location', '<?= $_ITEM->Location->__toString() ?>', 'SortByCommand="asset__location_id__short_description ASC"', 'ReverseSortByCommand="asset__location_id__short_description DESC"', 'CssClass=dtg_column', 'HtmlEntities=false"'));
    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveColumn_Render($_ITEM) ?>', 'CssClass=dtg_column', 'HtmlEntities=false"'));
*/
    $objStyle = $this->dtgAssetTransact->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgAssetTransact->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgAssetTransact->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';

		$this->blnTransactionModified = true;
	}

	protected function ctlAssetSearchTool_Create() {
	  $this->ctlAssetSearchTool = new QAssetSearchToolComposite($this);

	  $this->lblAddAsset = new QLabel($this);
		$this->lblAddAsset->HtmlEntities = false;
		$this->lblAddAsset->Text = '<img src="../images/icons/lookup.png" border="0" style="cursor:pointer;">';
	  $this->lblAddAsset->AddAction(new QClickEvent(), new QAjaxControlAction($this->ctlAssetSearchTool, 'lblAddAsset_Click'));
	  $this->lblAddAsset->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this->ctlAssetSearchTool, 'lblAddAsset_Click'));
	  $this->lblAddAsset->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	// Add Button Click
	public function btnAdd_Click($strFormId, $strControlId, $strParameter) {

	  $strAssetCode = $this->txtNewAssetCode->Text;
		$blnDuplicate = false;
		$blnError = false;

		if ($strAssetCode) {
			// Begin error checking
			if ($this->objAssetArray) {
				foreach ($this->objAssetArray as $asset) {
					if ($asset && $asset->AssetCode == $strAssetCode) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset has already been added.";
					}
				}
			}

			if (!$blnError) {
			  $objNewAsset = Asset::LoadByAssetCode($this->txtNewAssetCode->Text);
				if (!($objNewAsset instanceof Asset)) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = "That asset code does not exist.";
				}
				elseif ($objNewAsset->LinkedFlag) {
				  $blnError = true;
				  $this->txtNewAssetCode->Warning = "That asset is locked to a parent asset.";
				}
				// Cannot move, check out/in, nor reserve/unreserve any assets that have been archived
				elseif ($objNewAsset->LocationId == 6 && $this->intTransactionTypeId != 11) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = "That asset has already been archived.";
				}
				// Cannot move, check out/in, nor reserve/unreserve any assets that have been shipped
				elseif ($objNewAsset->LocationId == 2) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = "That asset has already been shipped.";
				}
				// Cannot move, check out/in, nor reserve/unreserve any assets that are scheduled to  be received
				elseif ($objNewAsset->LocationId == 5) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = "That asset is currently scheduled to be received.";
				}
				elseif ($objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = "That asset is already in a pending shipment.";
				}
				elseif (!QApplication::AuthorizeEntityBoolean($objNewAsset, 2)) {
					$blnError = true;
					$this->txtNewAssetCode->Warning = "You do not have authorization to perform a transaction on this asset.";
				}
				// Move
				elseif ($this->intTransactionTypeId == 1) {
					if ($objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is checked out.";
					}
					elseif ($objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is reserved.";
					}
				}
				// Check in
				elseif ($this->intTransactionTypeId == 2) {
					if (!$objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is not checked out.";
					}
					elseif ($objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is reserved.";
					}
					elseif ($objNewAsset->CheckedOutFlag) {
						$objUserAccount = $objNewAsset->GetLastTransactionUser();
						if ((QApplication::$TracmorSettings->StrictCheckinPolicy == '1') && ($objUserAccount->UserAccountId != QApplication::$objUserAccount->UserAccountId)) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset was not checked out by the current user.";
						}
					}
				}
				elseif ($this->intTransactionTypeId ==3) {
					if ($objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is already checked out.";
					}
					elseif ($objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is reserved.";
					}
				}
				elseif ($this->intTransactionTypeId == 8) {
					if ($objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is already reserved.";
					}
					elseif ($objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is checked out.";
					}
				}
				// Unreserver
				elseif ($this->intTransactionTypeId == 9) {
					if (!$objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is not reserved";
					}
					elseif ($objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is checked out.";
					}
					elseif ($objNewAsset->ReservedFlag) {
						$objUserAccount = $objNewAsset->GetLastTransactionUser();
						if ($objUserAccount->UserAccountId != QApplication::$objUserAccount->UserAccountId) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset was not reserved by the current user.";
						}
					}
				}
				// Archive
				elseif ($this->intTransactionTypeId == 10) {
					if ($objNewAsset->ArchivedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is already archived.";
					}
					elseif ($objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is checked out.";
					}
					elseif ($objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is reserved.";
					}
				}
				// Unarchive
				elseif ($this->intTransactionTypeId == 11) {
					if (!$objNewAsset->ArchivedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is not archived.";
					}
				}

				if (!$blnError && ($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 2 || $this->intTransactionTypeId == 3 || $this->intTransactionTypeId == 8 || $this->intTransactionTypeId == 9 || $this->intTransactionTypeId == 10 || $this->intTransactionTypeId == 11)) {
				  $objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId(QApplication::$objUserAccount->RoleId, $this->intTransactionTypeId);
          if ($objRoleTransactionTypeAuthorization) {
            // If the user has 'None' privileges for this transaction
            if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
    				  $blnError = true;
    					$this->txtNewAssetCode->Warning = "You do not have privileges for this transaction.";
  					}
  					// Check the user is the owner (if he has owner-only privileges)
    				elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2 && $objNewAsset->CreatedBy != QApplication::$objUserAccount->UserAccountId) {
    				  $blnError = true;
    					$this->txtNewAssetCode->Warning = "You are not the owner of this asset.";
    				}
          }
				}

				if (!$blnError && $objNewAsset instanceof Asset)  {
					$this->objAssetArray[] = $objNewAsset;
					$this->txtNewAssetCode->Text = null;
					// Load all linked assets
					$objLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objNewAsset->AssetId);
					if ($objLinkedAssetArray) {
					  $strAssetCodeArray = array();
					  foreach ($objLinkedAssetArray as $objLinkedAsset) {
					    $strAssetCodeArray[] = $objLinkedAsset->AssetCode;
					    $this->objAssetArray[] = $objLinkedAsset;
					  }
					  $this->txtNewAssetCode->Warning = sprintf("The following asset(s) have been added to the transaction because they are locked to asset (%s):<br />%s", $objNewAsset->AssetCode, implode('<br />', $strAssetCodeArray));
					}
					$this->dtgAssetTransact->Refresh();
				}
			}
		}
		else {
			$this->txtNewAssetCode->Warning = "Please enter an asset code.";
		}
		
		$this->txtNewAssetCode->Focus();
		$this->txtNewAssetCode->Select();
	}

	public function btnAssetSearchToolAdd_Click() {
	  $intSelectedAssetId = $this->ctlAssetSearchTool->ctlAssetSearch->dtgAsset->GetSelected("AssetId");
    if (count($intSelectedAssetId) < 1) {
      $this->ctlAssetSearchTool->lblWarning->Text = "No selected assets.";
    }
    else {
      $lblNewWarning = "";
      foreach (Asset::QueryArray(QQ::In(QQN::Asset()->AssetId, $intSelectedAssetId)) as $objAsset) {
        $this->txtNewAssetCode->Text = $objAsset->AssetCode;
        $this->btnAdd_Click($this, null, null);
        if ($this->txtNewAssetCode->Warning) {
          $lblNewWarning .= sprintf("<br />%s - %s", $objAsset->AssetCode, $this->txtNewAssetCode->Warning);
          $this->txtNewAssetCode->Warning = "";
        }
      }
      $this->txtNewAssetCode->Warning = $lblNewWarning;
      $this->ctlAssetSearchTool->dlgAssetSearchTool->HideDialogBox();
		}
		// Uncheck all items but SelectAll checkbox
    $this->UncheckAllItems();
	}

	// Save Button Click
	public function btnSave_Click($strFormId, $strControlId, $strParameter) {
	  $this->btnCancel->Warning = "";
		if ($this->objAssetArray) {
			$blnError = false;

			foreach ($this->objAssetArray as $asset) {
				// TransactionTypeId = 1 is for moves
				if ($this->intTransactionTypeId == 1) {
					if ($asset->LocationId == $this->lstLocation->SelectedValue) {
						$this->dtgAssetTransact->Warning = 'Cannot move an asset from a location to the same location.';
						$blnError = true;
					}
				}

				// For all transactions except Unreserve, make sure the asset is not already reserved
				if ($this->intTransactionTypeId != 9 && $asset->ReservedFlag) {
					$this->btnCancel->Warning = sprintf('The Asset %s is reserved.',$asset->AssetCode);
					$blnError = true;
				}
				// For all transactions except Unarchive, make sure the asset is not already archived
				if ($this->intTransactionTypeId != 11 && $asset->ArchivedFlag) {
					$this->btnCancel->Warning = sprintf('The Asset %s is archived.',$asset->AssetCode);
					$blnError = true;
				}

			}

			if (!$blnError) {
			  if ($this->intTransactionTypeId == 3) {
          $this->lstCheckOutTo->Warning = '';
          $this->lstDueDate->Warning = '';
          $intToUser = "";
          $intToContact = "";
          $dttDueDate = "";
  				if ((QApplication::$TracmorSettings->CheckOutToOtherUsers == "1" || QApplication::$TracmorSettings->CheckOutToContacts == "1") && $this->lstCheckOutTo->Display)
    				if ($this->lstCheckOutTo->SelectedValue == "1") {
    				  if (!$this->lstUser->SelectedValue) {
    				    $this->lstCheckOutTo->Warning = 'Please select a user.';
    				    $blnError = true;
    				  }
    				  else {
    				    $intToUser = $this->lstUser->SelectedValue;
    				  }
    				}
    				elseif ($this->lstCheckOutTo->SelectedValue == "2") {
    				  if (!$this->lstToContact->SelectedValue) {
    				    $this->lstCheckOutTo->Warning = 'Please select a contact.';
    				    $blnError = true;
    				  }
    				  else {
    				    $intToContact = $this->lstToContact->SelectedValue;
    				  }
    				}
    				else {
    				  $this->lstCheckOutTo->Warning = 'Please select one of the options';
    				  $blnError = true;
    				}
    			else {
    			  $intToUser = QApplication::$objUserAccount->UserAccountId;
    			}
    			if ($this->lstDueDate->Display)
      			if ($this->lstDueDate->SelectedValue == 2) {
      			  $dttDueDate = $this->dttDueDate;
				  if ($dttDueDate && $dttDueDate->DateTime < QDateTime::Now()) {
					$this->lstDueDate->Warning = 'Due date must be a future date';
					$blnError = true;
				  }
      			}
      			elseif (QApplication::$TracmorSettings->DueDateRequired == "1") {
      			  $this->lstDueDate->Warning = 'Due date is required';
      				$blnError = true;
      			}
			  }
			  if (QApplication::$TracmorSettings->ReasonRequired == "1" && !trim($this->txtNote->Text) && $this->intTransactionTypeId == 3) {
				  $this->txtNote->Warning = 'Reason is required.';
					$blnError = true;
				}
			  elseif (($this->intTransactionTypeId == 1 || $this->intTransactionTypeId == 2 || $this->intTransactionTypeId == 11) && is_null($this->lstLocation->SelectedValue)) {
					$this->lstLocation->Warning = 'Location is required.';
					$blnError = true;
				}
				elseif ($this->txtNote->Text == '' && $this->intTransactionTypeId != 3) {
					$this->txtNote->Warning = 'Note is required.';
					$blnError = true;
				}
			}
			if (!$blnError) {

				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();

					// Create the new transaction object and save it
					$this->objTransaction = new Transaction();
					// Entity Qtype is Asset
					$this->objTransaction->EntityQtypeId = EntityQtype::Asset;
					$this->objTransaction->TransactionTypeId = $this->intTransactionTypeId;
					$this->objTransaction->Note = $this->txtNote->Text;
					$this->objTransaction->Save();

					// Assign different source and destinations depending on transaction type
					foreach ($this->objAssetArray as $asset) {
						if ($asset instanceof Asset && $asset->LinkedFlag != 1) {

							$SourceLocationId = $asset->LocationId;
              // Load all linked assets
							$objLinkedAssetArrayByNewAsset = Asset::LoadChildLinkedArrayByParentAssetId($asset->AssetId);
							if (!$objLinkedAssetArrayByNewAsset) {
							  $objLinkedAssetArrayByNewAsset = array();
							}

							if ($this->intTransactionTypeId == 1) {
								$DestinationLocationId = $this->lstLocation->SelectedValue;
							}
							elseif ($this->intTransactionTypeId == 2) {
								$DestinationLocationId = $this->lstLocation->SelectedValue;
								$asset->CheckedOutFlag = false;
							}
							elseif ($this->intTransactionTypeId == 3) {
								$DestinationLocationId = 1;
								$asset->CheckedOutFlag = true;
							}
							elseif ($this->intTransactionTypeId == 8) {
								$DestinationLocationId = $asset->LocationId;
								$asset->ReservedFlag = true;
							}
							elseif ($this->intTransactionTypeId == 9) {
								$DestinationLocationId = $asset->LocationId;
								$asset->ReservedFlag = false;
							}
							// Archive
							elseif ($this->intTransactionTypeId == 10) {
								$DestinationLocationId = 6;
								$asset->ArchivedFlag = true;
								//$asset->CheckedOutFlag = false;
								//$asset->ReservedFlag = false;
							}
							// Unarchive
							elseif ($this->intTransactionTypeId == 11) {
								$DestinationLocationId = $this->lstLocation->SelectedValue;
								$asset->ArchivedFlag = false;
							}

							$asset->LocationId = $DestinationLocationId;
							// Transact all child linked assets
							foreach ($objLinkedAssetArrayByNewAsset as $objLinkedAsset) {
	              $objLinkedAsset->CheckedOutFlag = $asset->CheckedOutFlag;
	              $objLinkedAsset->ArchivedFlag = $asset->ArchivedFlag;
	              $objLinkedAsset->ReservedFlag = $asset->ReservedFlag;
	              $objLinkedAsset->LocationId = $asset->LocationId;
	              $objLinkedAsset->Save();

	              // Create the new assettransaction object and save it
  							$this->objAssetTransaction = new AssetTransaction();
  							$this->objAssetTransaction->AssetId = $objLinkedAsset->AssetId;
  							$this->objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
  							$this->objAssetTransaction->SourceLocationId = $SourceLocationId;
  							$this->objAssetTransaction->DestinationLocationId = $DestinationLocationId;
  							$this->objAssetTransaction->Save();

  							// Create the new AssetTransactionCheckout object and save it
  							if ($this->intTransactionTypeId == 3) {
  							  $objAssetTransactionCheckout = new AssetTransactionCheckout();
  								$objAssetTransactionCheckout->AssetTransactionId = $this->objAssetTransaction->AssetTransactionId;
  								$objAssetTransactionCheckout->ToContactId = $intToContact;
  								$objAssetTransactionCheckout->ToUserId = $intToUser;
  								if ($dttDueDate instanceof QDateTimePicker) {
  								  $objAssetTransactionCheckout->DueDate = $dttDueDate->DateTime;
  								}
  								$objAssetTransactionCheckout->Save();
                }
	            }
							$asset->Save();

							// Create the new assettransaction object and save it
							$this->objAssetTransaction = new AssetTransaction();
							$this->objAssetTransaction->AssetId = $asset->AssetId;
							$this->objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
							$this->objAssetTransaction->SourceLocationId = $SourceLocationId;
							$this->objAssetTransaction->DestinationLocationId = $DestinationLocationId;
							$this->objAssetTransaction->Save();

							// Create the new AssetTransactionCheckout object and save it for each linked asset
              if ($this->intTransactionTypeId == 3) {
							  $objAssetTransactionCheckout = new AssetTransactionCheckout();
								$objAssetTransactionCheckout->AssetTransactionId = $this->objAssetTransaction->AssetTransactionId;
  							$objAssetTransactionCheckout->ToContactId = $intToContact;
								$objAssetTransactionCheckout->ToUserId = $intToUser;
								if ($dttDueDate instanceof QDateTimePicker) {
								  $objAssetTransactionCheckout->DueDate = $dttDueDate->DateTime;
								}
								$objAssetTransactionCheckout->Save();
              }
						}
					}

					// Commit the above transactions to the database
					$objDatabase->TransactionCommit();

					QApplication::Redirect('../common/transaction_edit.php?intTransactionId='.$this->objTransaction->TransactionId);
				}
				catch (QOptimisticLockingException $objExc) {

					// Rollback the database
					$objDatabase->TransactionRollback();

					$objAsset = Asset::Load($objExc->EntityId);
					$this->objParentObject->btnRemove_Click($this->objParentObject->FormId, 'btnRemove' . $objExc->EntityId, $objExc->EntityId);
          // Lock Exception Thrown, Report the Error
          $this->btnCancel->Warning = sprintf('The Asset %s has been altered by another user and removed from the transaction. You may add the asset again or save the transaction without it.', $objAsset->AssetCode);
				}
			}
		}
		else {
		  $this->btnCancel->Warning = sprintf('Please provide at least one asset.');
		}
	}

	// Cancel Button Click
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {

		if ($this->blnEditMode) {
			$this->objParentObject->DisplayTransaction(false);
			$this->objAssetArray = null;
			$this->txtNewAssetCode->Text = null;
			$this->txtNote->Text = null;
			$this->objParentObject->DisplayEdit(true);
			$this->objAssetArray[] = $this->objAsset;
		}
		else {
			QApplication::Redirect('asset_list.php');
		}

	}

	// Prepare the Transaction form display depending on transaction type
	public function SetupDisplay($intTransactionTypeId) {
		$this->intTransactionTypeId = $intTransactionTypeId;
		$this->ctlAssetSearchTool->blnSearchArchived = false;
		switch ($this->intTransactionTypeId) {
			// Move
			case 1:
				$this->lstLocation->Display = true;
				break;
			// Check In
			case 2:
				$this->lstLocation->Display = true;
				break;
			// Check Out
			case 3:
				$this->lstLocation->Display = false;
				break;
			// Reserve
			case 8:
				$this->lstLocation->Display = false;
				break;
			// Unreserve
			case 9:
				$this->lstLocation->Display = false;
				break;
			// Archive
			case 10:
				$this->lstLocation->Display = false;
				break;
			// Unarchive
			case 11:
				$this->lstLocation->Display = true;
				$this->ctlAssetSearchTool->blnSearchArchived = true;
				break;
		}

		// Redeclare in case the asset has been edited
		$this->objAssetArray = null;
		if ($this->blnEditMode && $this->objAsset instanceof Asset) {
			$this->objAssetArray[] = Asset::Load($this->objAsset->AssetId);
			// Load all child assets
			$objLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($this->objAsset->AssetId);
			if ($objLinkedAssetArray) {
			  $strAssetCodeArray = array();
				foreach ($objLinkedAssetArray as $objLinkedAsset) {
				  $strAssetCodeArray[] = $objLinkedAsset->AssetCode;
				  $this->objAssetArray[] = $objLinkedAsset;
				}
				$this->txtNewAssetCode->Warning = sprintf("The following asset(s) have been added to the transaction because they are locked to asset (%s):<br />%s", $this->objAsset->AssetCode, implode('<br />', $strAssetCodeArray));
			}
		}

	}

	// Uncheck all items but SelectAll checkbox
	public function UncheckAllItems() {
	  foreach ($this->objParentObject->GetAllControls() as $objControl) {
      if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
        $objControl->Checked = false;
      }
    }
	}

  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
	  	case "objAsset": return $this->objAsset;
	  	case "objAssetArray": return $this->objAssetArray;
	  	case "dtgAssetTransact": return $this->dtgAssetTransact;
	  	case "intTransactionTypeId": return $this->intTransactionTypeId;
	  	case "blnTransactionModified": return $this->blnTransactionModified;
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
	    case "objAsset": $this->objAsset = $mixValue;
	    	break;
	    case "objAssetArray": $this->objAssetArray = $mixValue;
	    	break;
	    case "strTitleVerb": $this->strTitleVerb = $mixValue;
	    	break;
	    case "blnEditMode": $this->blnEditMode = $mixValue;
	    	break;
	    case "dtgAssetTransact": $this->dtgAssetTransact = $mixValue;
	    	break;
	    case "intTransactionTypeId": $this->intTransactionTypeId = $mixValue;
	    	break;
	    case "blnTransactionModified": $this->blnTransactionModified = $mixValue;
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

?>
