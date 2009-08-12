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

require(__DOCROOT__ . __SUBDIRECTORY__ . '/assets/AssetModelEditPanel.class.php');

class QAssetEditComposite extends QControl {

	public $objAsset;
	public $strTitleVerb;
	public $blnEditMode;
	public $objParentObject;

	// Labels
	protected $lblHeaderAssetCode;
	protected $lblAssetModel;
	protected $lblLocation;
	protected $lblAssetModelCode;
	protected $lblManufacturer;
	protected $lblCategory;
	protected $lblReservedBy;
	protected $lblAssetCode;
	protected $lblCreationDate;
	protected $lblModifiedDate;
	protected $chkAutoGenerateAssetCode;
	protected $lblNewAssetModel;
	protected $lblParentAssetCode;
	protected $lblIconParentAssetCode;
	public $lblShipmentReceipt;


	// Inputs
	public $lstAssetModel;
	protected $txtAssetCode;
	public $txtParentAssetCode;
	protected $lstLocation;
	protected $lstCreatedByObject;
	protected $lstModifiedByObject;

	// Buttons
	protected $btnSave;
	protected $btnDelete;
	protected $btnEdit;
	protected $btnCancel;
	protected $btnClone;
	protected $atcAttach;
	protected $pnlAttachments;
	protected $btnMove;
	protected $btnCheckOut;
	protected $btnCheckIn;
	protected $btnReserve;
	protected $btnUnreserve;
	protected $btnShip;
	protected $btnReceive;
	protected $btnArchive;

	// Transaction History Datagrid
	public $dtgAssetTransaction;
	public $dtgShipmentReceipt;

	// Custom Field Objects
	// protected $objCustomFieldArray;
	public $arrCustomFields;

	// Set true if the Built-in Fields have to be rendered
	public $blnViewBuiltInFields;
	public $blnEditBuiltInFields;

	// Dialog Box
	protected $dlgNewAssetModel;

	// Uses for dtgChildAssets DataSource
	public $objChildAssetArray;
	// New or Removed Child Assets
	public $objRemovedChildAssetArray;

	// We want to override the constructor in order to setup the subcontrols
	public function __construct($objParentObject, $strControlId = null) {
	    // First, call the parent to do most of the basic setup
    try {
        parent::__construct($objParentObject, $strControlId);
    } catch (QCallerException $objExc) {
        $objExc->IncrementOffset();
        throw $objExc;
    }

    $this->objParentObject = $objParentObject;
    $this->objParentObject->SetupAsset($this);

    // Create Labels
    $this->lblHeaderAssetCode_Create();
		$this->lblLocation_Create();
		$this->lblAssetModelCode_Create();
		$this->lblManufacturer_Create();
		$this->lblCategory_Create();
		$this->lblReservedBy_Create();
		$this->lblAssetCode_Create();
		$this->lblCreationDate_Create();
		$this->lblModifiedDate_Create();
		$this->lblNewAssetModel_Create();
		$this->lblParentAssetCode_Create();
		$this->lblIconParentAssetCode_Create();
		$this->lblAssetModel_Create();
		$this->UpdateAssetLabels();

		// Create Inputs
		$this->txtAssetCode_Create();
		$this->lstAssetModel_Create();
		$this->chkAutoGenerateAssetCode_Create();
		$this->dlgNewAssetModel_Create();
		$this->UpdateAssetControls();

		// Set a variable which defines whether the built-in fields must be rendered or not.
		$this->UpdateBuiltInFields();

		// Set a variable which defines whether the GreenPlusButton of the AssetModel must be rendered or not
		$this->UpdateAssetModelAccess();

		// Create all custom asset fields
		$this->customFields_Create();

		// Create parent asset code field
		$this->txtParentAssetCode_Create();

		// Create Buttons
		$this->btnSave_Create();
		$this->btnDelete_Create();
		$this->btnEdit_Create();
		$this->btnCancel_Create();
		$this->btnClone_Create();
		$this->atcAttach_Create();
		$this->pnlAttachments_Create();
		// Only create transaction buttons if editing an existing asset
		if ($this->blnEditMode) {
			$this->btnMove_Create();
			$this->btnCheckOut_Create();
			$this->btnCheckIn_Create();
			$this->btnReserve_Create();
			$this->btnUnreserve_Create();
			$this->btnShip_Create();
			$this->btnArchive_Create();
			$this->btnReceive_Create();
			$this->UpdateAssetControls();
			$this->EnableTransactionButtons();
		}

		// Display labels for the existing asset
		if ($this->blnEditMode) {
			// Create the transaction history datagrid
			$this->dtgAssetTransaction_Create();
			$this->lblShipmentReceipt_Create();
			$this->dtgShipmentReceipt_Create();
			$this->displayLabels();
		}
		// Display empty inputs to create a new asset
		else {
			$this->lstLocation_Create();
			$this->displayInputs();
		}
	}

	// Every composite control must have this function declared
	public function ParsePostData() {
	}

	public function GetJavaScriptAction() {return "onchange";}

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
		require('asset_edit_control.inc.php');
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

	// Generate tab indexes
	protected $intNextTabIndex = 1;
	protected function GetNextTabIndex() {
		return ++$this->intNextTabIndex;
	}

	// Create all Custom Asset Fields
	protected function customFields_Create() {

		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
		$this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode, $this->objAsset->AssetId);

		// Create the Custom Field Controls - labels and inputs (text or list) for each
		$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAsset->objCustomFieldArray, $this->blnEditMode, $this, true, true);

		// Add TabIndex for all txt custom fields
		foreach ($this->arrCustomFields as $arrCustomField) {
		  if (array_key_exists('input', $arrCustomField))
		    $arrCustomField['input']->TabIndex = $this->GetNextTabIndex();
		}

		//Setup Custom Fields
		$this->UpdateCustomFields();


	}
	// Create the Asset Code text input
	protected function txtAssetCode_Create() {
		$this->txtAssetCode = new QTextBox($this);
		$this->txtAssetCode->Name = 'Asset Code';
		$this->txtAssetCode->Required = true;
		$this->txtAssetCode->CausesValidation = true;
		$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
  	$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
   	$this->txtAssetCode->TabIndex = 2;
   	$this->intNextTabIndex++;
	}

	// Create the Asset Code text input
	protected function txtParentAssetCode_Create() {
		$this->txtParentAssetCode = new QTextBox($this);
		$this->txtParentAssetCode->Name = 'Parent Asset';
		$this->txtParentAssetCode->Width = '230';
		$this->txtParentAssetCode->Required = false;
		$this->txtParentAssetCode->CausesValidation = true;
		$this->txtParentAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
  	$this->txtParentAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
   	$this->txtParentAssetCode->TabIndex = $this->GetNextTabIndex();
	}

	// Create the clickable label
	protected function lblIconParentAssetCode_Create() {
	  $this->lblIconParentAssetCode = new QLabel($this);
		$this->lblIconParentAssetCode->HtmlEntities = false;
		$this->lblIconParentAssetCode->Display = false;
		$this->lblIconParentAssetCode->Text = '<img src="../images/icons/lookup.png" border="0" style="cursor:pointer;">';
		$this->lblIconParentAssetCode->AddAction(new QClickEvent(), new QAjaxAction('lblIconParentAssetCode_Click'));
		$this->lblIconParentAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('lblIconParentAssetCode_Click'));
		$this->lblIconParentAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	// Create and Setup lstAssetModel
	protected function lstAssetModel_Create() {
		$this->lstAssetModel = new QListBox($this);
		$this->lstAssetModel->Name = 'Asset Model';
		$this->lstAssetModel->Required = true;
		if (!$this->blnEditMode)
			$this->lstAssetModel->AddItem('- Select One -', null);
		$assetModelArray = AssetModel::LoadAllIntoArray();
		if ($assetModelArray) foreach ($assetModelArray as $assetModel) {
			$objListItem = new QListItem($assetModel['short_description'], $assetModel['asset_model_id']);
			$this->lstAssetModel->AddItem($objListItem);
			if (($this->objAsset->AssetModelId) && ($this->objAsset->AssetModelId == $assetModel['asset_model_id']))
				$objListItem->Selected = true;
		}
		$this->lstAssetModel->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstAssetModel_Select'));
		QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->lstAssetModel->ControlId));
		$this->lstAssetModel->TabIndex=1;
   		$this->intNextTabIndex++;
	}

	// Create and Setup lstLocation
	protected function lstLocation_Create() {
		$this->lstLocation = new QListBox($this);
		$this->lstLocation->Name = 'Location';
		$this->lstLocation->Required = true;
		$this->lstLocation->AddItem('- Select One -', null);
		$objLocationArray = Location::LoadAllLocations(true,false,'short_description');
		if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
			$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
			if ($objLocation->LocationId == 5) {
				$this->lstLocation->AddItemAt(1, $objListItem);
			}
			else {
				$this->lstLocation->AddItem($objListItem);
			}
		}
		$this->lstLocation->TabIndex=3;
		$this->intNextTabIndex++;
	}

	// Create The Header Asset Code label
	protected function lblHeaderAssetCode_Create() {
		$this->lblHeaderAssetCode = new QLabel($this);
	}

	// Create The Asset Model label (Asset Name)
	protected function lblAssetModel_Create() {
		$this->lblAssetModel = new QLabel($this);
	  $this->lblAssetModel->Name = 'Asset Model';
	}

	// Create the Location label
	protected function lblLocation_Create() {
		$this->lblLocation = new QLabel($this);
		$this->lblLocation->Name = 'Location';
	}

	// Create the Asset Model Code label
	protected function lblAssetModelCode_Create() {
		// It is better to use late-binding here because we are only getting one record
		$this->lblAssetModelCode = new QLabel($this);
		$this->lblAssetModelCode->Name = 'Asset Model Code';
	}

	// Create the Manufacturer Label
	protected function lblManufacturer_Create() {
		$this->lblManufacturer = new QLabel($this);
		$this->lblManufacturer->Name = 'Manufacturer';
	}

	// Create the Category Label
	protected function lblCategory_Create() {
		$this->lblCategory = new QLabel($this);
		$this->lblCategory->Name = 'Category';
	}

	// Create the Reserved By Label
	protected function lblReservedBy_Create() {
		$this->lblReservedBy = new QLabel($this);
		$this->lblReservedBy->Name = 'Reserved By';
		if ($this->objAsset->ReservedFlag) {
			$objUserAccount = $this->objAsset->GetLastTransactionUser();
			$this->lblReservedBy->Text = $objUserAccount->__toString();
			$this->lblReservedBy->Visible = true;
		}
		else {
			$this->lblReservedBy->Visible = false;
		}
	}

	// Create the Asset Code label
	protected function lblAssetCode_Create() {
		$this->lblAssetCode = new QLabel($this);
		$this->lblAssetCode->Name = 'Asset Code';
	}

	// Create the Creation Date Label
	protected function lblCreationDate_Create() {
		$this->lblCreationDate = new QLabel($this);
		$this->lblCreationDate->Name = 'Date Created';
		if ($this->blnEditMode) {
			$this->lblCreationDate->Text = $this->objAsset->CreationDate->PHPDate('Y-m-d H:i:s') . ' by ' . $this->objAsset->CreatedByObject->__toStringFullName();
		}
		else {
			$this->lblCreationDate->Visible = false;
		}
	}

	// Create the Modified Date Label
	protected function lblModifiedDate_Create() {
		$this->lblModifiedDate = new QLabel($this);
		$this->lblModifiedDate->Name = 'Last Modified';
		if (!$this->blnEditMode) {
			$this->lblModifiedDate->Visible = false;
		}
	}

	protected function lblNewAssetModel_Create() {
		$this->lblNewAssetModel = new QLabel($this);
		$this->lblNewAssetModel->HtmlEntities = false;
		$this->lblNewAssetModel->Text = '<img src="../images/add.png">';
		$this->lblNewAssetModel->ToolTip = "New Asset Model";
		$this->lblNewAssetModel->CssClass = "add_icon";
	  $this->lblNewAssetModel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'lblNewAssetModel_Click'));
	}

	// Create the Parent Asset Label
	protected function lblParentAssetCode_Create() {
		$this->lblParentAssetCode = new QLabel($this);
		$this->lblParentAssetCode->Name = 'Parent Asset';
		$this->lblParentAssetCode->HtmlEntities = false;
	}

	// Create the Auto Generate Asset Code Checkbox
	protected function chkAutoGenerateAssetCode_Create() {
		$this->chkAutoGenerateAssetCode = new QCheckBox($this);
		$this->chkAutoGenerateAssetCode->Name = 'Auto Generate';
		$this->chkAutoGenerateAssetCode->Text = 'Auto Generate';
		$this->chkAutoGenerateAssetCode->AddAction(new QClickEvent(), new QToggleEnableAction($this->txtAssetCode));
		if (!QApplication::$TracmorSettings->MinAssetCode) {
			$this->chkAutoGenerateAssetCode->Display = false;
		}
	}

	protected function dlgNewAssetModel_Create() {
		$this->dlgNewAssetModel = new QDialogBox($this);
		$this->dlgNewAssetModel->AutoRenderChildren = true;
		$this->dlgNewAssetModel->Width = '440px';
		$this->dlgNewAssetModel->Overflow = QOverflow::Auto;
		$this->dlgNewAssetModel->Padding = '10px';
		$this->dlgNewAssetModel->Display = false;
		$this->dlgNewAssetModel->BackColor = '#FFFFFF';
		$this->dlgNewAssetModel->MatteClickable = false;
		$this->dlgNewAssetModel->CssClass = "modal_dialog";
	}

	// Setup Delete Button
	// This still doesn't delete CustomAssetFieldValues for text selections
	protected function btnDelete_Create() {
		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this Asset?'));
		$this->btnDelete->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QConfirmAction('Are you SURE you want to DELETE this Asset?'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnDelete_Click'));
		$this->btnDelete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnDelete->CausesValidation = false;
		if (!$this->blnEditMode) {
			$this->btnDelete->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnDelete, 3);
	}

  // Setup Save Button
	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->btnSave->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnSave->CausesValidation = true;
		$this->btnSave->TabIndex=$this->GetNextTabIndex();
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

	// Setup Edit Button
	protected function btnEdit_Create() {
	  $this->btnEdit = new QButton($this);
    $this->btnEdit->Text = 'Edit';
    $this->btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEdit_Click'));
    $this->btnEdit->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnEdit_Click'));
    $this->btnEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    $this->btnEdit->CausesValidation = false;
    QApplication::AuthorizeControl($this->objAsset, $this->btnEdit, 2);
	}

	// Setup Clone Button
	protected function btnClone_Create() {
		$this->btnClone = new QButton($this);
		$this->btnClone->Text = 'Clone';
		$this->btnClone->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnClone_Click'));
		$this->btnClone->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnClone_Click'));
		$this->btnClone->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnClone->CausesValidation = false;
		QApplication::AuthorizeControl($this->objAsset, $this->btnClone, 2);
	}

	// Setup Attach File Asset Button
	protected function atcAttach_Create() {
		$this->atcAttach = new QAttach($this, null, EntityQtype::Asset, $this->objAsset->AssetId);
		QApplication::AuthorizeControl($this->objAsset, $this->atcAttach, 2);
	}

	// Setup Attachments Panel
	public function pnlAttachments_Create() {
		$this->pnlAttachments = new QAttachments($this, null, EntityQtype::Asset, $this->objAsset->AssetId);
	}

	// Setup Move Button
	protected function btnMove_Create() {
		$this->btnMove = new QButton($this);
		$this->btnMove->Text = 'Move';
		$this->btnMove->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnMove_Click'));
		$this->btnMove->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnMove_Click'));
		$this->btnMove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnMove->CausesValidation = false;
		QApplication::AuthorizeControl($this->objAsset, $this->btnMove, 2);
		RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnMove, 1);
	}

	// Setup Checkout Button
	protected function btnCheckOut_Create() {
		$this->btnCheckOut = new QButton($this);
		$this->btnCheckOut->Text = 'Check Out';
		$this->btnCheckOut->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCheckOut_Click'));
		$this->btnCheckOut->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnCheckOut_Click'));
		$this->btnCheckOut->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnCheckOut->CausesValidation = false;
		// If the asset is already checked out, you cannot check it out, so the check out button is not displayed
		if ($this->objAsset->CheckedOutFlag) {
			$this->btnCheckOut->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnCheckOut, 2);
		RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnCheckOut, 3);
	}

	// Setup Check In Button
	protected function btnCheckIn_Create() {
		$this->btnCheckIn = new QButton($this);
		$this->btnCheckIn->Text = 'Check In';
		$this->btnCheckIn->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCheckIn_Click'));
		$this->btnCheckIn->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnCheckIn_Click'));
		$this->btnCheckIn->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnCheckIn->CausesValidation = false;
		// If the asset is not checked out, you cannot check it in, so the check in button is not displayed
		// You can only check it in if you are the one that checked it out
		if (!$this->objAsset->CheckedOutFlag) {
			$this->btnCheckIn->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnCheckIn, 2);
		RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnCheckIn, 2);
	}

	// Setup Reserve Button
	protected function btnReserve_Create() {
		$this->btnReserve = new QButton($this);
		$this->btnReserve->Text = 'Reserve';
		$this->btnReserve->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnReserve_Click'));
		$this->btnReserve->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnReserve_Click'));
		$this->btnReserve->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnReserve->CausesValidation = false;
		// If the asset is reserved already, you cannot reserve it, so the reserve button is not displayed.
		if ($this->objAsset->ReservedFlag) {
			$this->btnReserve->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnReserve, 2);
		RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnReserve, 8);
	}

	// Setup Reserve Button
	protected function btnUnreserve_Create() {
		$this->btnUnreserve = new QButton($this);
		$this->btnUnreserve->Text = 'Unreserve';
		$this->btnUnreserve->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUnreserve_Click'));
		$this->btnUnreserve->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnUnreserve_Click'));
		$this->btnUnreserve->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnUnreserve->CausesValidation = false;
		// If the asset is not reserved, you cannot unreserve it, so the Unreserve button is not displayed
		// You can only unreserve it if you are the one that resrved it
		if (!$this->objAsset->ReservedFlag) {
			$this->btnUnreserve->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnUnreserve, 2);
		RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnUnreserve, 9);
	}

	// Setup Ship Button
	protected function btnShip_Create() {
		$this->btnShip = new QButton($this);
		$this->btnShip->Text = 'Ship';
		$this->btnShip->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnShip_Click'));
		$this->btnShip->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnShip_Click'));
		$this->btnShip->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnShip->CausesValidation = false;
		// Do not display the button if the asset is Shipped or To Be Received
		if ($this->objAsset->LocationId == 2 || $this->objAsset->LocationId == 5) {
			$this->btnShip->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnShip, 2);
		if ($this->btnShip->Visible) {
			// Check if they have the ability to create a new shipment
			QApplication::AuthorizeControl(null, $this->btnShip, 2, 5);
		}
	}

	// Setup Archive/Unarchive Button
	protected function btnArchive_Create() {
		$this->btnArchive = new QButton($this);
		$this->btnArchive->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnArchive_Click'));
		$this->btnArchive->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnArchive_Click'));
		$this->btnArchive->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnArchive->CausesValidation = false;

		QApplication::AuthorizeControl($this->objAsset, $this->btnArchive, 2);
		if ($this->btnArchive->Visible) {
			// Check if they have the ability to create a new Archivement
			QApplication::AuthorizeControl(null, $this->btnArchive, 2, 5);
			if ($this->objAsset->ArchivedFlag) {
  		  $this->btnArchive->Text = 'Unarchive';
  		  RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnArchive, 11);
  		}
  		else {
  		  $this->btnArchive->Text = 'Archive';
  		  RoleTransactionTypeAuthorization::AuthorizeControlByRoleTransactionType($this->objAsset, $this->btnArchive, 10);
  		}
		}
	}

	// Setup Receive Button
	protected function btnReceive_Create() {
		$this->btnReceive = new QButton($this);
		$this->btnReceive->Text = 'Receive';
		$this->btnReceive->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnReceive_Click'));
		$this->btnReceive->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnReceive_Click'));
		$this->btnReceive->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnReceive->CausesValidation = false;
		// Asset must be Shipped or To Be Received to display the Receive Button
		if ($this->objAsset->LocationId != 2 && $this->objAsset->LocationId != 5) {
			$this->btnReceive->Display = false;
		}
		QApplication::AuthorizeControl($this->objAsset, $this->btnReceive, 2);
		if ($this->btnReceive->Visible) {
			// Check if they have the ability to create a new shipment
			QApplication::AuthorizeControl(null, $this->btnReceive, 2, 6);
		}
	}

	protected function dtgAssetTransaction_Create() {
		$this->dtgAssetTransaction = new QDataGrid($this);
		$this->dtgAssetTransaction->Name = 'Transactions';
		$this->dtgAssetTransaction->CellPadding = 5;
		$this->dtgAssetTransaction->CellSpacing = 0;
		$this->dtgAssetTransaction->CssClass = "datagrid";

    // Enable AJAX - this won't work while using the DB profiler
    $this->dtgAssetTransaction->UseAjax = true;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgAssetTransaction);
    $this->dtgAssetTransaction->Paginator = $objPaginator;
    $this->dtgAssetTransaction->ItemsPerPage = 20;

    $this->dtgAssetTransaction->AddColumn(new QDataGridColumn('Transaction Type', '<?= $_ITEM->Transaction->__toStringWithLink() ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Transaction->TransactionType->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Transaction->TransactionType->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgAssetTransaction->AddColumn(new QDataGridColumn('From', '<?= $_ITEM->__toStringSourceLocation() ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->SourceLocation->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->SourceLocation->ShortDescription, false), 'CssClass' => "dtg_column")));
    $this->dtgAssetTransaction->AddColumn(new QDataGridColumn('To', '<?= $_ITEM->__toStringDestinationLocation() ?>', array('OrderByClause' => QQ::Orderby(QQN::AssetTransaction()->DestinationLocation->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->DestinationLocation->ShortDescription, false), 'CssClass' => "dtg_column")));
    $this->dtgAssetTransaction->AddColumn(new QDataGridColumn('User', '<?= $_ITEM->Transaction->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::Orderby(QQN::AssetTransaction()->CreatedByObject->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->CreatedByObject->LastName, false), 'CssClass' => "dtg_column")));
    $this->dtgAssetTransaction->AddColumn(new QDataGridColumn('Date', '<?= $_ITEM->Transaction->CreationDate->PHPDate("Y-m-d H:i:s"); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate, false), 'CssClass' => "dtg_column")));

    $this->dtgAssetTransaction->SortColumnIndex = 4;
    $this->dtgAssetTransaction->SortDirection = 1;

    $objStyle = $this->dtgAssetTransaction->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgAssetTransaction->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgAssetTransaction->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';
	}

	protected function lblShipmentReceipt_Create() {
		$this->lblShipmentReceipt = new QLabel($this);
		$this->lblShipmentReceipt->Name = 'Shipping/Receiving History';
		$this->lblShipmentReceipt->Text = 'Shipping/Receiving History';
		$this->lblShipmentReceipt->CssClass = 'title';
	}

	protected function dtgShipmentReceipt_Create() {
		$this->dtgShipmentReceipt = new QDataGrid($this);
		$this->dtgShipmentReceipt->Name = 'Shipping/Receiving History';
		$this->dtgShipmentReceipt->CellPadding = 5;
		$this->dtgShipmentReceipt->CellSpacing = 0;
		$this->dtgShipmentReceipt->CssClass = "datagrid";
		$this->dtgShipmentReceipt->UseAjax = true;

		$objPaginator = new QPaginator($this->dtgShipmentReceipt);
		$this->dtgShipmentReceipt->Paginator = $objPaginator;
		$this->dtgShipmentReceipt->ItemsPerPage = 20;

		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Transaction->TransactionType->__toString() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Number', '<?= $_ITEM->Transaction->ToStringNumberWithLink() ?> <?= $_ITEM->Transaction->ToStringHoverTips($_CONTROL); ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Company', '<?= $_ITEM->Transaction->ToStringCompany() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Contact', '<?= $_ITEM->Transaction->ToStringContact() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Scheduled By', '<?= $_ITEM->Transaction->CreatedByObject->__toString() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->Transaction->ToStringStatusStyled() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));
		$this->dtgShipmentReceipt->AddColumn(new QDataGridColumn('Tracking', '<?= $_ITEM->Transaction->ToStringTrackingNumber() ?>', array('CssClass' => 'dtg_column', 'HtmlEntities' => false)));

		//$this->dtgShipmentReceipt->SortColumnIndex = 4;
    //$this->dtgShipmentReceipt->SortDirection = 1;

    $objStyle = $this->dtgShipmentReceipt->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgShipmentReceipt->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgShipmentReceipt->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';
	}

	// Asset Model List Selection Action
	// Display the AssetModelCode for the given AssetModel once it is chosen
	public function lstAssetModel_Select($strFormId, $strControlId, $strParameter) {
		if ($this->lstAssetModel->SelectedValue != null) {
			$objAssetModel = AssetModel::Load($this->lstAssetModel->SelectedValue);
			if ($objAssetModel) {
				if ($objAssetModel->AssetModelCode) {
					$this->lblAssetModelCode->Text = $objAssetModel->AssetModelCode;
				}
				else {
					$this->lblAssetModelCode->Text = 'None';
				}
				if ($objAssetModel->Manufacturer) {
					$this->lblManufacturer->Text = $objAssetModel->Manufacturer->ShortDescription;
				}
				else {
					$this->lblManufactuerer->Text = 'None';
				}
				if ($objAssetModel->Category) {
					$this->lblCategory->Text = $objAssetModel->Category->ShortDescription;
				}
			}
		}
	}

	// This is called when the 'new' label is clicked
	public function lblNewAssetModel_Click($strFormId, $strControlId, $strParameter) {
		// Avoid doubleclick issues by checking if it is already displayed
		if (!$this->dlgNewAssetModel->Display) {
			// Create the panel, assigning it to the Dialog Box
			$pnlAssetModelEdit = new AssetModelEditPanel($this->dlgNewAssetModel, 'CloseAssetModelEditPanel');
			// Show the dialog box
			$this->dlgNewAssetModel->ShowDialogBox();
		}
	}

	// Edit Button Click
	public function btnEdit_Click($strFormId, $strControlId, $strParameter) {

		// Hide labels and display inputs where appropriate
		$this->displayInputs();

		// Set display logic in Edit Mode
		$this->UpdateBuiltInFields();
		$this->UpdateCustomFields();

		// Deactivate the transaction buttons
		$this->disableTransactionButtons();
	}

	// Save Button Click Actions
	public function btnSave_Click($strFormId, $strControlId, $strParameter) {

		try {

			// Get an instance of the database
			$objDatabase = QApplication::$Database[1];
			// Begin a MySQL Transaction to be either committed or rolled back
			$objDatabase->TransactionBegin();

			// Generate a new AssetCode based on the MinAssetCode value
			// This happens whether or not they are creating a new one or editing an existing one
			if ($this->chkAutoGenerateAssetCode->Checked) {
				$this->txtAssetCode->Text = Asset::GenerateAssetCode();
			}

			$this->objAsset->AssetCode = $this->txtAssetCode->Text;
			$this->objAsset->AssetModelId = $this->lstAssetModel->SelectedValue;

			$blnError = false;
			// If a new asset is being created
			if (!$this->blnEditMode) {

				// Do not allow creation of an asset if asset limit will be exceeded
				$intAssetLimit = (is_numeric(QApplication::$TracmorSettings->AssetLimit)) ? QApplication::$TracmorSettings->AssetLimit : false;

				if (!$this->blnEditMode) {
					if ($intAssetLimit && Asset::CountActive() >= $intAssetLimit) {
						$blnError = true;
						$this->txtAssetCode->Warning = "Your asset limit has been reached.";
					}
				}

				// Check to see if the asset code already exists
				$AssetDuplicate = Asset::LoadByAssetCode($this->txtAssetCode->Text);
				if ($AssetDuplicate) {
					$blnError = true;
					$this->txtAssetCode->Warning = "That asset code is already in use. Please try another.";
				}

				if (!$blnError && $this->txtParentAssetCode->Text) {
				  if ($this->txtParentAssetCode->Text != $this->objAsset->AssetCode) {
    				$objParentAsset = Asset::LoadByAssetCode($this->txtParentAssetCode->Text);
    				if (!$objParentAsset) {
    				  $blnError = true;
    					$this->txtParentAssetCode->Warning = "That asset code does not exist. Please try another.";
    				}
    				else {
    				  $this->objAsset->ParentAssetId = $objParentAsset->AssetId;
    				}
				  }
				  else {
				    $blnError = true;
    				$this->txtParentAssetCode->Warning = "Parent asset code must not be the same as asset code. Please try another.";
				  }
				}
				else {
				  // If txtParentAssetCode is empty
				  $this->objAsset->LinkedFlag = false;
				  $this->objAsset->ParentAssetId = null;
				}

				if (!$blnError) {
          // Location can only be decided when creating an asset. Otherwise they must conduct a transaction.
					if (!$this->blnEditMode) {
						$this->objAsset->LocationId = $this->lstLocation->SelectedValue;
					}

					// Save child assets
					$this->SaveChildAssets();

					// Object should be saved only if it is new, to obtain the proper AssetId to add to the custom field tables
					$this->objAsset->Save();

					$this->objParentObject->RefreshChildAssets();
				}
			}

			// Assign input values to custom fields
			if ($this->arrCustomFields && !$blnError) {

				// Save the values from all of the custom field controls to save the asset
				CustomField::SaveControls($this->objAsset->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objAsset->AssetId, 1);
			}

			if ($this->blnEditMode) {
				
				// Check to see if the asset code already exists (and is not the asset code of the asset that the user is currently editing
				$AssetDuplicate = Asset::LoadByAssetCode($this->txtAssetCode->Text);
				if ($AssetDuplicate && $AssetDuplicate->AssetId != $this->objAsset->AssetId) {
					$blnError = true;
					$this->txtAssetCode->Warning = "That asset code is already in use. Please try another.";
				}

				if (!$blnError && $this->txtParentAssetCode->Text) {
				  // Check if the parent asset code is already a child asset of this asset
				  $arrChildAsset = Asset::LoadArrayByParentAssetId($this->objAsset->AssetId);
				  foreach ($arrChildAsset as $objChildAsset) {
				    if ($objChildAsset->AssetCode == $this->txtParentAssetCode->Text) {
				      $blnError = true;
				      $this->txtParentAssetCode->Warning = "Parent asset code is already a child of this asset. Please try another.";
				      break;
				    }
				  }
				  if (!$blnError) {
  				  if ($this->txtParentAssetCode->Text != $this->objAsset->AssetCode) {
      				$objParentAsset = Asset::LoadByAssetCode($this->txtParentAssetCode->Text);
      				if (!$objParentAsset) {
      				  $blnError = true;
      					$this->txtParentAssetCode->Warning = "That asset code does not exist. Please try another.";
      				}
      				else {
      				  $this->objAsset->ParentAssetId = $objParentAsset->AssetId;
      				}
  				  }
  				  else {
  				    $blnError = true;
      				$this->txtParentAssetCode->Warning = "Parent asset code must not be the same as asset code. Please try another.";
  				  }
				  }
				}
				else {
				  // If txtParentAssetCode is empty
				  $this->objAsset->LinkedFlag = false;
				  $this->objAsset->ParentAssetId = null;
				}

				if (!$blnError) {

					// Update the values of all fields for an Ajax reload
					$this->UpdateAssetFields();

					// Save child assets
					$this->SaveChildAssets();

					// If asset is not new, it must be saved after updating the assetfields
					$this->objAsset->Save();

					// This is called to retrieve the new Modified Date and User
					$this->objParentObject->SetupAsset($this);

					// Give the labels their appropriate values before display
					$this->UpdateAssetLabels();

					// This was necessary because it was not saving the changes of a second edit/save in a row
					// Reload all custom fields
					$this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode, $this->objAsset->AssetId);

					// Commit the above transactions to the database
					$objDatabase->TransactionCommit();

					// Hide inputs and display labels
					$this->displayLabels();
					// Enable the appropriate transaction buttons
					$this->EnableTransactionButtons();

					$this->objParentObject->RefreshChildAssets();
				}

			}

			elseif (!$blnError) {

				// Commit the above transactions to the database
				$objDatabase->TransactionCommit();

				// Reload the edit asset page with the newly created asset
				$strRedirect = "asset_edit.php?intAssetId=" . $this->objAsset->AssetId;
				QApplication::Redirect($strRedirect);
			}
		}
		catch (QOptimisticLockingException $objExc) {

			// Rollback the database
			$objDatabase->TransactionRollback();

			// Output the error
			$this->btnCancel->Warning = sprintf('This asset has been updated by another user. You must <a href="asset_edit.php?intAssetId=%s">Refresh</a> to edit this Asset.', $this->objAsset->AssetId);
		}
	}

	// Cancel Button Click Actions
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		if ($this->blnEditMode) {
			$this->displayLabels();
			$this->EnableTransactionButtons();
			$this->UpdateAssetControls();
			$this->objParentObject->RefreshChildAssets();
		}
		else {
			QApplication::Redirect('asset_list.php');
		}
	}

	// Clone Button Click Actions
	public function btnClone_Click($strFormId, $strControlId, $strParameter) {
		// Creating a new asset
		$this->blnEditMode = false;

		// Create the asset model and location fields
		$this->lstAssetModel_Create();
		$this->lstAssetModel->SelectedValue = $this->objAsset->AssetModelId;
		$this->lstLocation_Create();
		$this->lstLocation->SelectedValue = $this->objAsset->LocationId;

		// Instantiate new Asset object
		$this->objAsset = new Asset();
		// Load custom fields for asset with values from original asset
		$this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode);
		// Set the asset_code to null because they are unique
		$this->lblHeaderAssetCode->Text = 'New Asset';
		$this->txtAssetCode->Text = '';

		$this->dtgAssetTransaction->MarkAsModified();
		$this->dtgShipmentReceipt->MarkAsModified();

		// Set the creation and modification fields to null because it hasn't been created or modified yet.
		$this->lblModifiedDate->Text = '';
		$this->lblCreationDate->Text = '';

		// Show the inputs so the user can change any information and add the asset code
		$this->displayInputs();
	}

	// Delete Button Click Actions
	public function btnDelete_Click($strFormId, $strControlId, $strParameter) {

		try {
			$objCustomFieldArray = $this->objAsset->objCustomFieldArray;
			$this->objAsset->Delete();
			// Custom Field Values for text fields must be manually deleted because MySQL ON DELETE will not cascade to them
			// The values do not get deleted for select values
			CustomField::DeleteTextValues($objCustomFieldArray);
			// ParentAssetId Field must be manually deleted because MySQL ON DELETE will not cascade to them
			Asset::ResetParentAssetIdToNullByAssetId($this->objAsset->AssetId);
			QApplication::Redirect('asset_list.php');
		}
		catch (QDatabaseExceptionBase $objExc) {
			if ($objExc->ErrorNumber == 1451) {
				$this->btnDelete->Warning = 'This asset cannot be deleted because it is associated with one or more transactions.';
			}
			else {
				throw new QDatabaseExceptionBase();
			}
		}
	}

	// Move Button Click Actions
	public function btnMove_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 1 is the transaction_type_id for the move transaction
		$this->objParentObject->DisplayTransaction(true, 1);
	}

	// Check In Button Click Actions
	public function btnCheckIn_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 2 is the transaction_type_id for the check in transaction
		$this->objParentObject->DisplayTransaction(true, 2);
	}

	// Check Out Button Click Actions
	public function btnCheckOut_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 3 is the transaction_type_id for the check out transaction
		$this->objParentObject->DisplayTransaction(true, 3);
	}

	// Archive/Unarchive Button Click Actions
	public function btnArchive_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		if ($this->objAsset->ArchivedFlag) {
		  // 11 is the transaction_type_id for the unarchive transaction
		  $this->objParentObject->DisplayTransaction(true, 11);
		}
		else {
		  // 10 is the transaction_type_id for the archive transaction
		  $this->objParentObject->DisplayTransaction(true, 10);
		}
	}

	// Reserve Button Click Actions
	public function btnReserve_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 8 is the thransaction_type_id for the reserve transaction
		$this->objParentObject->DisplayTransaction(true, 8);
	}

	// Unreserve Button Click Actions
	public function btnUnreserve_Click($strFormId, $strControlId, $strParameter) {
		$this->objParentObject->DisplayEdit(false);
		// 9 is the thransaction_type_id for the unreserve transaction
		$this->objParentObject->DisplayTransaction(true, 9);
	}

	// Ship Button Click Actions
	public function btnShip_Click($strFormId, $strControlId, $strParameter) {
		QApplication::Redirect(sprintf('../shipping/shipment_edit.php?intAssetId=%s', $this->objAsset->AssetId));
	}

	// Receive Button Click Actions
	public function btnReceive_Click($strFormId, $strControlId, $strParameter) {
		QApplication::Redirect(sprintf('../receiving/receipt_edit.php?intAssetId=%s', $this->objAsset->AssetId));
	}

	// Auto Generate Label Click Action
	public function chkAutoGenerateAssetCode_Click($strFormId, $strControlId, $strParameter) {
		$this->txtAssetCode->Enabled = false;
	}

	// Display the labels and buttons for Asset Viewing mode
	public function displayLabels() {

		// Do not display inputs
		$this->txtAssetCode->Display = false;
		$this->txtParentAssetCode->Display = false;
		$this->lstAssetModel->Display = false;
		$this->chkAutoGenerateAssetCode->Display = false;
		$this->lblNewAssetModel->Display = false;

		// Do not display Cancel and Save buttons
		$this->btnCancel->Display = false;
		$this->btnSave->Display = false;

		// Display Labels for Viewing mode
		$this->lblIconParentAssetCode->Display = false;
		$this->lblAssetModelCode->Display = true;
		$this->lblLocation->Display = true;
		$this->lblAssetCode->Display = true;
		$this->lblAssetModel->Display = true;
		$this->lblParentAssetCode->Display = true;

		// Display Edit and Delete buttons
		$this->btnEdit->Display = true;
		$this->btnDelete->Display = true;
		$this->btnClone->Display = true;
		$this->atcAttach->btnUpload->Display = true;
		if ($this->objAsset->ArchivedFlag) {
		  $this->btnEdit->Enabled = false;
  		$this->btnClone->Enabled = false;
  		$this->atcAttach->Enabled = false;
		}
		else {
		  $this->btnEdit->Enabled = true;
  		$this->btnClone->Enabled = true;
  		$this->atcAttach->Enabled = true;
		}

		// Display custom field labels
		if ($this->arrCustomFields) {
			CustomField::DisplayLabels($this->arrCustomFields);
		}
	}

	// Display the inputs and buttons for Edit or Create mode
	public function displayInputs() {

	// Do not display labels

    $this->lblAssetCode->Display = false;

    // Only display location list if creating a new asset
    if (!$this->blnEditMode) {
   		$this->lblAssetModel->Display = false;
   		$this->lblNewAssetModel->Display = true;
   		$this->lblLocation->Display = false;
   		$this->lstLocation->Display = true;
   		if (QApplication::$TracmorSettings->MinAssetCode) {
   			$this->chkAutoGenerateAssetCode->Display = true;
   		}
    }
    else {
      $this->lblAssetModelCode->Display = true;
      $this->lblAssetModel->Display = true;
   		$this->lblLocation->Display = true;
   		$this->lblParentAssetCode->Display = true;
   		$this->lblAssetModel->Display = false;
   		$this->chkAutoGenerateAssetCode->Display = false;
    }

    // Always display the label, never input, because it is associated with the AssetModelId
    $this->lblAssetModelCode->Display = true;

    $this->txtParentAssetCode->Display = true;
    $this->lblIconParentAssetCode->Display = true;
    $this->lblParentAssetCode->Display = false;

    // Do not display Edit and Delete buttons
    $this->btnEdit->Display = false;
    $this->btnDelete->Display = false;
    $this->btnClone->Display = false;
		$this->atcAttach->btnUpload->Display = false;

    // Display Asset Code and Asset Model input for edit mode
    // new: if the user is authorized to edit the built-in fields.
		if($this->blnEditBuiltInFields){
			$this->txtAssetCode->Display = true;
			$this->lstAssetModel->Display = true;
		}else{ //in edit mode, if the user is not authorized to edit built-in fields, the fields are render as labels.
			$this->lblAssetCode->Display = true;
			$this->lblAssetModel->Display = true;
		}

    // Display Cancel and Save butons
    $this->btnCancel->Display = true;
    $this->btnSave->Display = true;

    // Display custom field inputs
    if ($this->arrCustomFields) {
    	CustomField::DisplayInputs($this->arrCustomFields);
    }
	}

	// Disable all transaction buttons while editing
	public function DisableTransactionButtons() {
		if ($this->blnEditMode) {
			$this->btnMove->Enabled = false;
			$this->btnCheckIn->Enabled = false;
			$this->btnCheckOut->Enabled = false;
			$this->btnReserve->Enabled = false;
			$this->btnUnreserve->Enabled = false;
			$this->btnShip->Enabled = false;
			$this->btnReceive->Enabled = false;
			$this->btnArchive->Enabled = false;
		}
	}

	// Enable the transaction buttons where appropriate, depending on the status of the asset
	public function EnableTransactionButtons() {
		if ($this->blnEditMode) {
		  if ($this->objAsset->LinkedFlag) {
			  $this->DisableTransactionButtons();
			}
			else {
  			if (!$this->objAsset->ReservedFlag && !$this->objAsset->CheckedOutFlag && $this->objAsset->LocationId != 2 && $this->objAsset->LocationId != 5 && $this->objAsset->LocationId != 6 && !AssetTransaction::PendingTransaction($this->objAsset->AssetId)) {
  				$this->btnMove->Enabled = true;
  				$this->btnArchive->Enabled = true;
  			}
  			else {
  				$this->btnMove->Enabled = false;
  				if ($this->objAsset->ArchivedFlag) {
  				  $this->btnArchive->Enabled = true;
  				}
  				else {
  				  $this->btnArchive->Enabled = false;
  				}
  			}
  			if (!$this->objAsset->ReservedFlag && !$this->objAsset->CheckedOutFlag && $this->objAsset->LocationId != 2 && $this->objAsset->LocationId != 5 && $this->objAsset->LocationId != 6 && !AssetTransaction::PendingTransaction($this->objAsset->AssetId)) {
  				$this->btnCheckIn->Enabled = true;
  				$this->btnCheckOut->Enabled = true;
  			}
  			elseif ($this->objAsset->CheckedOutFlag && $this->objAsset->LocationId != 6) {
  				$objUserAccount = $this->objAsset->GetLastTransactionUser();
  				if ($objUserAccount && $objUserAccount->UserAccountId == QApplication::$objUserAccount->UserAccountId) {
  					$this->btnCheckIn->Enabled = true;
  					$this->btnCheckOut->Enabled = true;
  				}
  				else {
  					$this->btnCheckIn->Enabled = false;
  					$this->btnCheckOut->Enabled = false;
  				}
  			}
  			else {
  				$this->btnCheckIn->Enabled = false;
  				$this->btnCheckOut->Enabled = false;
  			}
  			if (!$this->objAsset->CheckedOutFlag && !$this->objAsset->ReservedFlag && $this->objAsset->LocationId != 2 && $this->objAsset->LocationId != 5 && $this->objAsset->LocationId != 6 && !AssetTransaction::PendingTransaction($this->objAsset->AssetId)) {
  				$this->btnUnreserve->Enabled = true;
  				$this->btnReserve->Enabled = true;
  			}
  			elseif ($this->objAsset->ReservedFlag && $this->objAsset->LocationId != 6) {
  				$objUserAccount = $this->objAsset->GetLastTransactionUser();
  				if ($objUserAccount && $objUserAccount->UserAccountId == QApplication::$objUserAccount->UserAccountId) {
  					$this->btnUnreserve->Enabled = true;
  					$this->btnReserve->Enabled = true;
  				}
  				else {
  					$this->btnUnreserve->Enabled = false;
  					$this->btnReserve->Enabled = false;
  				}
  			}
  			else {
  				$this->btnUnreserve->Enabled = false;
  				$this->btnReserve->Enabled = false;
  			}
  			if (!$this->objAsset->CheckedOutFlag && !$this->objAsset->ReservedFlag && $this->objAsset->LocationId != 6 && !AssetTransaction::PendingTransaction($this->objAsset->AssetId)) {
  				$this->btnShip->Enabled = true;
  				$this->btnReceive->Enabled = true;
  			}
  			else {
  				$this->btnShip->Enabled = false;
  				$this->btnReceive->Enabled = false;
  			}
			}
		}
	}

	// Update the Asset labels with the values from the asset inputs
	public function UpdateAssetLabels() {

		if ($this->objAsset->AssetModelId) {
			$this->lblAssetModel->Text = $this->objAsset->AssetModel->__toString();
			$this->lblAssetModelCode->Text = $this->objAsset->AssetModel->AssetModelCode;
			if ($this->objAsset->AssetModel->CategoryId) {
				$this->lblCategory->Text = $this->objAsset->AssetModel->Category->__toString();
			}
			if ($this->objAsset->AssetModel->ManufacturerId) {
				$this->lblManufacturer->Text = $this->objAsset->AssetModel->Manufacturer->__toString();
			}
		}
		if ($this->objAsset->LocationId) {
			$this->lblLocation->Text = $this->objAsset->Location->__toString();
		}
		$this->lblAssetCode->Text = $this->objAsset->AssetCode;
		$this->lblHeaderAssetCode->Text = $this->objAsset->AssetCode;
		if ($this->objAsset->ParentAssetId) {
  		$this->lblParentAssetCode->Text = $this->objAsset->ParentAsset->__toStringWithLink("bluelink");
		}
		else {
		  $this->lblParentAssetCode->Text = "";
		}
		if ($this->objAsset->ModifiedDate) {
			$this->lblModifiedDate->Text = $this->objAsset->ModifiedDate . ' by ' . $this->objAsset->ModifiedByObject->__toStringFullName();
		}

		// Update custom labels
		if ($this->arrCustomFields) {
			CustomField::UpdateLabels($this->arrCustomFields);
		}
	}

	// Protected Update Methods
	protected function UpdateAssetFields() {
		if (!$this->blnEditMode) {
			$this->objAsset->AssetModelId = $this->lstAssetModel->SelectedValue;
			$this->objAsset->LocationId = $this->lstLocation->SelectedValue;
		}
		// This is set in the btnSave method so doesn't need to be set again here.
		// $this->objAsset->AssetCode = $this->txtAssetCode->Text;
	}

	// Assign the original values to all Asset Controls
	protected function UpdateAssetControls() {

		$this->txtAssetCode->Text = $this->objAsset->AssetCode;
		if ($this->objAsset->ParentAssetId) {
		  $this->txtParentAssetCode->Text = $this->objAsset->ParentAsset->AssetCode;
		}
		else {
		  $this->txtParentAssetCode->Text = "";
		}
		$this->arrCustomFields = CustomField::UpdateControls($this->objAsset->objCustomFieldArray, $this->arrCustomFields);
	}
	//Set display logic of the BuiltInFields in View Access and Edit Access
	protected function UpdateBuiltInFields() {
		//Set View Display Logic of Built-In Fields
		$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,1,1);
		if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
			$this->blnViewBuiltInFields=true;
		}
		else{
			$this->blnViewBuiltInFields=false;
		}

		//Set Edit Display Logic of Built-In Fields
		$objRoleEntityQtypeBuiltInAuthorization2= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,1,2);
		if($objRoleEntityQtypeBuiltInAuthorization2 && $objRoleEntityQtypeBuiltInAuthorization2->AuthorizedFlag){
			$this->blnEditBuiltInFields=true;
		}
		else{
			$this->blnEditBuiltInFields=false;
		}

	}

//Set display logic for the CustomFields
		protected function UpdateCustomFields(){
			if($this->arrCustomFields)foreach ($this->arrCustomFields as $objCustomField) {
				//Set NextTabIndex only if the custom field is show
				if($objCustomField['input']->TabIndex == 0 && $objCustomField['ViewAuth'] && $objCustomField['ViewAuth']->AuthorizedFlag){
					$objCustomField['input']->TabIndex=$this->GetNextTabIndex();
				}

				//In Create Mode, if the role doesn't have edit access for the custom field and the custom field is required, the field shows as a label with the default value
				if (!$this->blnEditMode && !$objCustomField['blnEdit']){
					$objCustomField['lbl']->Display=true;
					$objCustomField['input']->Display=false;
					if(($objCustomField['blnRequired'])){
						$objCustomField['lbl']->Text=$objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue->__toString();
					}
				}
			}
		}
	//Set display logic of the GreenPlusButton of AssetModel
	protected function UpdateAssetModelAccess() {
		//checks if the entity 4 (AssetModel) has edit authorization
		$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::AssetModel,2);
		if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
			$this->lblNewAssetModel->Visible=true;
		}
		else{
			$this->lblNewAssetModel->Visible=false;
		}
	}

	public function lblIconParentAssetCode_Click() {
	  $this->objParentObject->lblIconParentAssetCode_Click();
	}

	public function SaveChildAssets() {
		  if (count($this->objChildAssetArray)) {
  		  foreach ($this->objChildAssetArray as $objChildAsset) {
  		    $objChildAsset->Save();
  		  }
		  }
		  if (count($this->objRemovedChildAssetArray)) {
  		  foreach ($this->objRemovedChildAssetArray as $objChildAsset) {
  		    $objChildAsset->Save();
  		  }
		  }
		}

  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
	  	case "objAsset": return $this->objAsset;
	  		break;
	  	case "blnEditMode": return $this->blnEditMode;
	  		break;
	  	case "dtgAssetTransaction": return $this->dtgAssetTransaction;
	  		break;
	  	case "dlgNewAssetModel": return $this->dlgNewAssetModel;
	  	  break;
	  	case "btnSaveDisplay": return $this->btnSave->Display;
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
	    case "objAsset": $this->objAsset = $mixValue;
	    	break;
	    case "blnEditMode": $this->blnEditMode = $mixValue;
	    	break;
	    case "strTitleVerb": $this->strTitleVerb = $mixValue;
	    	break;
	    case "dtgAssetTransaction": $this->dtgAssetTransaction = $mixValue;
	    	break;
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
