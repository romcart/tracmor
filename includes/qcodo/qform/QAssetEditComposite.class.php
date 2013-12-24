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

	require(__DOCROOT__ . __SUBDIRECTORY__ . '/assets/AssetModelEditPanel.class.php');

class QAssetEditComposite extends QControl {
    /**
	 * @var Asset $objAsset
	 */
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
	protected $lblCheckedOutTo;
	protected $lblAssetCode;
	protected $lblCreationDate;
	protected $lblModifiedDate;
	protected $chkAutoGenerateAssetCode;
	protected $lblNewAssetModel;
	protected $lblParentAssetCode;
	protected $lblIconParentAssetCode;
	public $lblLockedToParent;
	public $lblPurchaseDate;
	public $lblPurchaseCost;
	public $lblBookValue;

	// Inputs
	public $lstAssetModel;
	public $txtAssetCode;
	public $txtParentAssetCode;
	public $chkLockToParent;
	protected $lstLocation;
	protected $lstCreatedByObject;
	protected $lstModifiedByObject;
	public $chkAssetDepreciation;
	public $txtPurchaseCost;
	public $calPurchaseDate;

	// Buttons
	protected $btnSave;
	protected $btnDelete;
	protected $btnEdit;
	protected $btnCancel;
	protected $btnClone;
	protected $atcAttach;
	protected $btnPrintAssetTag;
	protected $pnlAttachments;
	protected $btnMove;
	protected $btnCheckOut;
	protected $btnCheckIn;
	protected $btnReserve;
	protected $btnUnreserve;
	protected $btnShip;
	protected $btnReceive;
	protected $btnArchive;

    // Custom Field Objects
	// protected $objCustomFieldArray;
	public $arrCustomFields;

	protected $dttNow;
	protected $dttFiveDaysFromNow;

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
		$this->lblCheckedOutTo_Create();
		$this->lblAssetCode_Create();
		$this->lblCreationDate_Create();
		$this->lblModifiedDate_Create();
		$this->lblNewAssetModel_Create();
		$this->lblParentAssetCode_Create();
		$this->lblIconParentAssetCode_Create();
		$this->lblAssetModel_Create();
		$this->lblLockedToParent_Create();
		$this->UpdateAssetLabels();

		// Create Inputs
		$this->txtAssetCode_Create();
		$this->lstAssetModel_Create();
		$this->chkAutoGenerateAssetCode_Create();
		$this->dlgNewAssetModel_Create();
		// Create parent asset tag field
		$this->txtParentAssetCode_Create();
		$this->chkLockToParent_Create();

		$this->UpdateAssetControls();

		// Set a variable which defines whether the built-in fields must be rendered or not.
		$this->UpdateBuiltInFields();

		// Set a variable which defines whether the GreenPlusButton of the AssetModel must be rendered or not
		$this->UpdateAssetModelAccess();

		// Create all custom asset fields
		$this->customFields_Create();

		// Create Buttons
		$this->btnSave_Create();
		$this->btnDelete_Create();
		$this->btnEdit_Create();
		$this->btnCancel_Create();
		$this->btnClone_Create();
		$this->atcAttach_Create();
		$this->btnPrintAssetTag_Create();
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
        	$this->displayLabels();
		}
		// Display empty inputs to create a new asset
		else {
			$this->lstLocation_Create();
			$this->displayInputs();
			$this->lblHeaderAssetCode->Text = 'New Asset';
		}

		// if asset depreciation enabled in application display Asset Depreciation checkBox
		if(QApplication::$TracmorSettings->DepreciationFlag == '1'){
			$this->lblPurchaseDate_Create();
			$this->calPurchaseDate_Create();
			$this->lblPurchaseCost_Create();
			$this->txtPurchaseCost_Create();
			$this->chkAssetDepreciation_Create();
			$this->lblBookValue_Create();
			$this->txtPurchaseCost->Display = false;
			$this->calPurchaseDate->Display = false;
			if(!$this->blnEditMode){
				$this->chkAssetDepreciation->Enabled = true;
				$this->chkAssetDepreciation->Display = false;
				$this->lblPurchaseCost->Display = false;
				$this->lblPurchaseDate->Display = false;
				$this->lblBookValue->Display = false;
			}
			else{
				$this->chkAssetDepreciation->Enabled = false;
				if(!$this->objAsset->DepreciationFlag){
					$this->lblBookValue->Display = false;
				}
			}
		}
	}

	// Every composite control must have this function declared
	public function ParsePostData() {
	}

	public function GetJavaScriptAction() {return "onchange";}

	public function Validate() {
		if (!$this->chkAutoGenerateAssetCode->Checked && trim($this->txtAssetCode->Text) == "") {
			$this->txtAssetCode->Warning = 'Asset tag is required';
			return false;
		}
		return true;
	}

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
		$this->intNextTabIndex = (int)$this->intNextTabIndex + 1;
		return $this->intNextTabIndex;
	}

	// Create all Custom Asset Fields
	protected function customFields_Create() {

		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
		if($this->blnEditMode){
    $this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode, $this->objAsset->AssetId, false, $this->objAsset->AssetModelId);
    }
    else{
      $this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode, $this->objAsset->AssetId, false, 'all');
    }
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
	// Create the Asset Tag text input
	protected function txtAssetCode_Create() {
		$this->txtAssetCode = new QTextBox($this);
		$this->txtAssetCode->Name = 'Asset Tag';
		$this->txtAssetCode->Required = true;
		$this->txtAssetCode->CausesValidation = true;
		$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtAssetCode->TabIndex = 2;
		$this->intNextTabIndex++;
	}

	// Create the Asset Tag text input
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

	// Created the Locked to Parent label
	protected function lblLockedToParent_Create() {
		$this->lblLockedToParent = new QLabel($this);
		$this->lblLockedToParent->Text = '<img src="../images/icons/locked.png" border="0" title="Locked to parent">';
		$this->lblLockedToParent->HtmlEntities = false;
		if ($this->blnEditMode && $this->objAsset->LinkedFlag) {
			$this->lblLockedToParent->Visible = true;
		} else {
			$this->lblLockedToParent->Visible = false;
		}
	}

	// Create the Lock to Parent checkbox
	protected function chkLockToParent_Create() {
		$this->chkLockToParent = new QCheckBox($this);
		$this->chkLockToParent->Name = 'Lock to parent';
		$this->chkLockToParent->Text = 'Lock to parent';
		$this->chkLockToParent->CausesValidation = true;
		$this->chkLockToParent->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		$this->chkLockToParent->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->chkLockToParent->TabIndex = $this->GetNextTabIndex();
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
		$this->lstAssetModel->Name = 'Model';
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
		$objLocationArray = Location::LoadAllLocations(true,false,'short_description',null,null,false,false,true,false);
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

	// Create The Header Asset Tag label
	protected function lblHeaderAssetCode_Create() {
		$this->lblHeaderAssetCode = new QLabel($this);
	}

	// Create The Asset Model label (Asset Name)
	protected function lblAssetModel_Create() {
		$this->lblAssetModel = new QLabel($this);
		$this->lblAssetModel->Name = 'Model';
		$this->lblAssetModel->HtmlEntities = false;
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
		$this->lblAssetModelCode->Name = 'Model Number';
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

	// Create the Checked Out To Label
	protected function lblCheckedOutTo_Create() {
		$this->lblCheckedOutTo = new QLabel($this);
		$this->lblCheckedOutTo->Name = 'Checked Out To';
		if ($this->objAsset->CheckedOutFlag) {
			$arrObjects = $this->objAsset->GetLastTransactionCheckoutObjectArray();
			$objAccount = $arrObjects['objAccount'];
			$objAssetTransactionCheckout = $arrObjects['objAssetTransactionCheckout'];
			if ($objAssetTransactionCheckout) {
			  if ($objAssetTransactionCheckout->ToContactId) {
			    $this->lblCheckedOutTo->Text = $objAssetTransactionCheckout->ToContact->__toString();
			  }
			  else {
			    $this->lblCheckedOutTo->Text = $objAssetTransactionCheckout->ToUser->__toString();
			  }
			  if ($objAssetTransactionCheckout->DueDate) {
          $this->lblCheckedOutTo->Text .= sprintf(", due %s", ($objAssetTransactionCheckout->DueDate) ? $objAssetTransactionCheckout->DueDate->format('m/d/Y g:i A') : "");
			  }
			}
			else {
			  $this->lblCheckedOutTo->Text = $objAccount->__toString();
			}
			$this->lblCheckedOutTo->Visible = true;
		}
		else {
			$this->lblCheckedOutTo->Visible = false;
		}
	}

	// Create the Asset Tag label
	protected function lblAssetCode_Create() {
		$this->lblAssetCode = new QLabel($this);
		$this->lblAssetCode->Name = 'Asset Tag';
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
		$this->lblNewAssetModel->ToolTip = "New Model";
		$this->lblNewAssetModel->CssClass = "add_icon";
	  $this->lblNewAssetModel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'lblNewAssetModel_Click'));
	}

	// Create the Parent Asset Label
	protected function lblParentAssetCode_Create() {
		$this->lblParentAssetCode = new QLabel($this);
		$this->lblParentAssetCode->Name = 'Parent Asset';
		$this->lblParentAssetCode->HtmlEntities = false;
	}

	// Create the Auto Generate Asset Tag Checkbox
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

	// Setup Print Asset Tag button
	protected function btnPrintAssetTag_Create() {
		$this->btnPrintAssetTag = new QButton($this);
		$this->btnPrintAssetTag->Text = QApplication::Translate('Print Asset Tag');
		$this->btnPrintAssetTag->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnPrintAssetTag_Click'));
		$this->btnPrintAssetTag->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnPrintAssetTag_Click'));
		$this->btnPrintAssetTag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->btnPrintAssetTag->CausesValidation = false;
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

	// Create Asset Depreciation checkBox
	protected function chkAssetDepreciation_Create(){
		$this->chkAssetDepreciation = new QCheckBox($this);
		$this->chkAssetDepreciation->Name = 'Asset Depreciation';
		$this->chkAssetDepreciation->AddAction(new QClickEvent(), new QAjaxControlAction($this,'chkAssetDepreciation_Click'));
		if ($this->blnEditMode
			&& $this->objAsset->DepreciationFlag){
			$this->chkAssetDepreciation->Checked = true;
			$this->lblPurchaseCost->Text = money_format('%i',$this->objAsset->PurchaseCost);
			$this->lblPurchaseDate->Text = $this->objAsset->PurchaseDate->__toString();
		}
		else{
			$this->chkAssetDepreciation->Checked = false;
			$this->lblPurchaseCost->Display = false;
			$this->lblPurchaseDate->Display = false;
		}
		if($this->blnEditMode&&!$this->objAsset->AssetModel->DepreciationClassId)
		{
			$this->chkAssetDepreciation->Display = false;
		}
		else{
			$this->chkAssetDepreciation->Display = true;
		}
		/*
		if($this->blnEditMode){
			$this->chkAssetDepreciation->Enabled = false;
		}*/
	}

	// Create Purchase Label
	protected function lblPurchaseDate_Create(){
		$this->lblPurchaseDate = new QLabel($this);
		$this->lblPurchaseDate->Name = 'Purchase Date: ';
		$this->lblPurchaseDate->HtmlEntities = false;
	}

	// Create and Setup calPurchaseDate
	protected function calPurchaseDate_Create() {

		$this->calPurchaseDate = new QDateTimePickerExt($this);
		$this->calPurchaseDate->Name =  'Purchase Date: ';  //QApplication::Translate('Purchase Date');
		$this->calPurchaseDate->DateTimePickerType = QDateTimePickerType::Date;
		if ($this->blnEditMode && $this->objAsset->DepreciationFlag && $this->objAsset->PurchaseDate) {
			$dateToSetup = $this->objAsset->PurchaseDate;
		}
		else {
			$dateToSetup = new QDateTime(QDateTime::Now);
		}

		$this->calPurchaseDate->DateTime = $dateToSetup;
		$this->calPurchaseDate->Required = true;

		$this->dttNow = new QDateTime(QDateTime::Now);
		// $this->calPurchaseDate->MinimumYear = $this->dttNow->Year;
		// $this->calPurchaseDate->MinimumMonth = $this->dttNow->Month;
		// $this->calPurchaseDate->MinimumDay = $this->dttNow->Day;
		// 5 Days: 432000
		// 6 Days: 518400
		// 7 Days: 604800
		// 10 Days: 864000
		// 200 Days: 17280000

		$this->calPurchaseDate->MinimumYear = $dateToSetup->Year < ($this->dttNow->Year-5) ?
			  $dateToSetup->Year : ($this->dttNow->Year-5);
		$this->calPurchaseDate->MaximumYear = $this->dttNow->Year+1;

		if(QApplication::$TracmorSettings->DepreciationFlag == '1'){
			$this->calPurchaseDate->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtPurchaseCost_Change'));
		}

		//$this->calPurchaseDate->AddAction(new QChangeEvent(), new QAjaxAction('calShipDate_Select'));
		//QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->calPurchaseDate->ControlId));

		//$this->calPurchaseDate->TabIndex=10;
	}

	// Create Purchase Cost Label
	protected function lblPurchaseCost_Create(){
		$this->lblPurchaseCost = new QLabel($this);
		$this->lblPurchaseCost->Name = 'Purchase Cost: ';
		$this->lblPurchaseDate->HtmlEntities = false;
	}

	// Create Purchase Cost Input
	protected function txtPurchaseCost_Create(){
		$this->txtPurchaseCost = new QTextBox($this);
		$this->txtPurchaseCost->Name =  'Purchase Cost: ';
		if(QApplication::$TracmorSettings->DepreciationFlag = '1'){
			$this->txtPurchaseCost->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtPurchaseCost_Change'));
		}
		if ($this->blnEditMode){
			$this->txtPurchaseCost->Text = money_format('%i',$this->objAsset->PurchaseCost);
		}
	}
	public function txtPurchaseCost_Change($control){
		$this->lblBookValue_Update();
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
				if ($objAssetModel->AssetModelId){
				  $this->reloadCustomFields($objAssetModel->AssetModelId);
				}
				else{
				  $this->reloadCustomFields('all');
				}
				$this->displayInputs();
			}
		}
        $this->lstAssetModel->Focus();
		$this->lstAssetModel->TabIndex = 1;
		$this->txtAssetCode->TabIndex = 2;
		if(QApplication::$TracmorSettings->DepreciationFlag == '1'){

			if($this->lstAssetModel->SelectedValue != null &&
			   $objAssetModel->DepreciationClassId>0)
			{
				$this->chkAssetDepreciation->Display = true;
				if(!$this->txtPurchaseCost->Display){
					$this->chkAssetDepreciation->Checked = false;
				}
				$this->lblBookValue_Update();
			}
			else
			{
				$this->chkAssetDepreciation->Display = false;
				$this->hideAssetDepreciationFields();
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
		$this->reloadCustomFields($this->objAsset->AssetModelId);
		// Hide labels and display inputs where appropriate
		$this->displayInputs();

		// Set display logic in Edit Mode
		$this->UpdateBuiltInFields();
		$this->UpdateCustomFields();

		// Deactivate the transaction buttons
		$this->disableTransactionButtons();

		// Activate Asset Depreciation inputs for Edit
		if(QApplication::$TracmorSettings->DepreciationFlag == '1'){
			$this->chkAssetDepreciation->Enabled = true;
			if($this->objAsset->DepreciationFlag == 1){
				$this->lblPurchaseDate->Display = false;
				$this->lblPurchaseCost->Display = false;
				$this->showAssetDepreciationFields();
			}
		}
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

//				 Check Depreciation fields
				if(QApplication::$TracmorSettings->DepreciationFlag == '1'){
					if($this->chkAssetDepreciation->Checked){
						if(!preg_match("/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/",$this->txtPurchaseCost->Text) || $this->txtPurchaseCost->Text <= 0){
							$blnError = true;
							$this->txtPurchaseCost->Warning = "Purchase Cost value isn't valid";
						}
						elseif(AssetModel::Load($this->lstAssetModel->SelectedValue)->DepreciationClassId!=null){
							//print $this->calPurchaseDate->DateTime ."||". $this->txtPurchaseCost->Text."|";exit;
							$this->objAsset->DepreciationFlag = true;
							$this->objAsset->PurchaseDate  = $this->calPurchaseDate->DateTime;
							$this->objAsset->PurchaseCost = str_replace(',','',$this->txtPurchaseCost->Text);
						}
						else{
							$blnError = true;
							$this->chkAssetDepreciation->Warning = "Chosen Model isn't assigned to any Depreciation Class";
						}
					}
				}

				// Check to see if the asset tag already exists
				$AssetDuplicate = Asset::LoadByAssetCode($this->txtAssetCode->Text);
				if ($AssetDuplicate) {
					$blnError = true;
					$this->txtAssetCode->Warning = "That asset tag is already in use. Please try another.";
				}

				if (!$blnError && $this->txtParentAssetCode->Text) {
				  if ($this->txtParentAssetCode->Text != $this->objAsset->AssetCode) {
    				$objParentAsset = Asset::LoadByAssetCode($this->txtParentAssetCode->Text);
    				if (!$objParentAsset) {
    				  $blnError = true;
    					$this->txtParentAssetCode->Warning = "That asset tag does not exist. Please try another.";
    				}
					else if ($this->chkLockToParent->Checked && $objParentAsset->LocationId != $this->lstLocation->SelectedValue) {
						// If locking child to parent, make sure assets are at the same location
						$blnError = true;
						$this->chkLockToParent->Warning = 'Cannot lock to parent asset at another location.';
					} else if ($this->chkLockToParent->Checked && ($objParentAsset->CheckedOutFlag || $objParentAsset->ReservedFlag || $objParentAsset->ArchivedFlag || $objParentAsset->LocationId == 2 || $objParentAsset->LocationId == 5 || AssetTransaction::PendingTransaction($objParentAsset->AssetId))) {
						$blnError = true;
						$this->chkLockToParent->Warning = "Parent asset tag (" . $objParentAsset->AssetCode . ") must not be currently Archived, Checked Out, Pending Shipment, Shipped/TBR, or Reserved.";
					}
    				else {
    				  $this->objAsset->ParentAssetId = $objParentAsset->AssetId;

					  if ($this->chkLockToParent->Checked)
						$this->objAsset->LinkedFlag = 1;
    				}
				  }
				  else {
				    $blnError = true;
    				$this->txtParentAssetCode->Warning = "Parent asset tag must not be the same as asset tag. Please try another.";
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
			if (is_array($this->arrCustomFields)&& count($this->arrCustomFields)>0 && !$blnError) {

				// Save the values from all of the custom field controls to save the asset
				CustomField::SaveControls($this->objAsset->objCustomFieldArray,
                                          $this->blnEditMode,
                                          $this->arrCustomFields,
                                          $this->objAsset->AssetId,
                                          1);
			}

			if ($this->blnEditMode) {

				// Check to see if the asset tag already exists (and is not the asset tag of the asset that the user is currently editing
				$AssetDuplicate = Asset::LoadByAssetCode($this->txtAssetCode->Text);
				if ($AssetDuplicate && $AssetDuplicate->AssetId != $this->objAsset->AssetId) {
					$blnError = true;
					$this->txtAssetCode->Warning = "That asset tag is already in use. Please try another.";
				}

				if (!$blnError && $this->txtParentAssetCode->Text) {
				  // Check if the parent asset tag is already a child asset of this asset
				  $arrChildAsset = Asset::LoadArrayByParentAssetId($this->objAsset->AssetId);
				  foreach ($arrChildAsset as $objChildAsset) {
				    if ($objChildAsset->AssetCode == $this->txtParentAssetCode->Text) {
				      $blnError = true;
				      $this->txtParentAssetCode->Warning = "Parent asset tag is already a child of this asset. Please try another.";
				      break;
				    }
				  }
				  if (!$blnError) {
  				  if ($this->txtParentAssetCode->Text != $this->objAsset->AssetCode) {
      				$objParentAsset = Asset::LoadByAssetCode($this->txtParentAssetCode->Text);
      				if (!$objParentAsset) {
      				  $blnError = true;
      					$this->txtParentAssetCode->Warning = "That asset tag does not exist. Please try another.";
      				}
					else if ($this->chkLockToParent->Checked && !($this->objAsset->ParentAssetId == $objParentAsset->AssetId && $this->objAsset->LinkedFlag == 1) && $objParentAsset->LocationId != $this->objAsset->LocationId) {
						// If locking child to parent, make sure assets are at the same location
						$blnError = true;
						$this->chkLockToParent->Warning = 'Cannot lock to parent asset at another location.';
					} else if ($this->chkLockToParent->Checked && !($this->objAsset->ParentAssetId == $objParentAsset->AssetId && $this->objAsset->LinkedFlag == 1) && ($objParentAsset->CheckedOutFlag || $objParentAsset->ReservedFlag || $objParentAsset->ArchivedFlag || $objParentAsset->LocationId == 2 || $objParentAsset->LocationId == 5 || AssetTransaction::PendingTransaction($objParentAsset->AssetId))) {
						$blnError = true;
						$this->chkLockToParent->Warning = "Parent asset tag (" . $objParentAsset->AssetCode . ") must not be currently Archived, Checked Out, Pending Shipment, Shipped/TBR, or Reserved.";
					} else if ($this->chkLockToParent->Checked && !($this->objAsset->ParentAssetId == $objParentAsset->AssetId && $this->objAsset->LinkedFlag == 1) && ($this->objAsset->CheckedOutFlag || $this->objAsset->ReservedFlag || $this->objAsset->ArchivedFlag || $this->objAsset->LocationId == 2 || $this->objAsset->LocationId == 5 || AssetTransaction::PendingTransaction($this->objAsset->AssetId))) {
						$blnError = true;
						$this->chkLockToParent->Warning .= "Child asset must not be currently Archived, Checked Out, Pending Shipment, Shipped/TBR, or Reserved.";
					}
      				else {
      				  $this->objAsset->ParentAssetId = $objParentAsset->AssetId;

					  if ($this->chkLockToParent->Checked) {
						$this->objAsset->LinkedFlag = 1;
					  } else {
						$this->objAsset->LinkedFlag = 0;
					  }
      				}
  				  }
  				  else {
  				    $blnError = true;
      				$this->txtParentAssetCode->Warning = "Parent asset tag must not be the same as asset tag. Please try another.";
  				  }
				  }
				}
				else {
				  // If txtParentAssetCode is empty
				  $this->objAsset->LinkedFlag = false;
				  $this->objAsset->ParentAssetId = null;
				  $this->chkLockToParent->Checked = false;
				}

				//				 Check Depreciation fields
				if(QApplication::$TracmorSettings->DepreciationFlag == '1'){
					if($this->chkAssetDepreciation->Checked){
						if(!preg_match("/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/",$this->txtPurchaseCost->Text) || $this->txtPurchaseCost->Text <= 0){
							$blnError = true;
							$this->txtPurchaseCost->Warning = "Purchase Cost isn't valid";
						}
						elseif(AssetModel::Load($this->lstAssetModel->SelectedValue)->DepreciationClassId!=null){
							//print $this->calPurchaseDate->DateTime ."||". $this->txtPurchaseCost->Text."|";exit;
							$this->objAsset->DepreciationFlag = true;
							$this->objAsset->PurchaseDate  = $this->calPurchaseDate->DateTime;
							$this->objAsset->PurchaseCost = str_replace(',','',$this->txtPurchaseCost->Text);
						}
						else{
							$blnError = true;
							$this->chkAssetDepreciation->Warning = "Chosen Model isn't assigned to any Depreciation Class";
						}
					}
					else{
						$this->objAsset->DepreciationFlag = false;
						$this->objAsset->PurchaseDate  = null;
						$this->objAsset->PurchaseCost = null;
					}
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
					$this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode, $this->objAsset->AssetId, false,$this->objAsset->AssetModelId);

                // Update not allowed custom fields set to null

        $arrAllowed = array( );
        foreach (AssetCustomFieldAssetModel::LoadArrayByAssetModelId($this->objAsset->AssetModelId) as $objAssetCustomField){
          $arrAllowed[]=$objAssetCustomField->CustomFieldId;
        }
        $arrToClear = array();

        foreach (EntityQtypeCustomField::LoadArrayByEntityQtypeId(1) as $objAssetCustomField){
          if(!in_array($objAssetCustomField->CustomFieldId,$arrAllowed) && $objAssetCustomField->CustomField->AllAssetModelsFlag != 1){
            $arrToClear[]=$objAssetCustomField->CustomFieldId;
          }
        }
        if($this->objAsset->AssetId && count($arrToClear)){
        	$arrForQuery = array();
          foreach ($arrToClear as $idToBeNull)
          {
            $arrForQuery[] = sprintf("`cfv_%s`= NULL", $idToBeNull);
          }
          $objDatabase = Asset::GetDatabase();
          $strQuery = sprintf("UPDATE `asset_custom_field_helper` SET %s WHERE `asset_id`='%s'", implode(", ", $arrForQuery), $this->objAsset->AssetId);
        //  print($strQuery); exit;
          $objDatabase->NonQuery($strQuery);
        }


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
				$strRedirect = sprintf('asset_edit.php?intAssetId=%s', $this->objAsset->AssetId);
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
			// Handle depreciation options view
			if (QApplication::$TracmorSettings->DepreciationFlag == '1'){
				if($this->objAsset->AssetModel->DepreciationClassId>0){
					$this->chkAssetDepreciation->Display = true;
				}
				else{
					$this->chkAssetDepreciation->Display = false;
				}
				$this->Refresh();
				if($this->objAsset->DepreciationFlag>0){
					$this->chkAssetDepreciation->Checked = true;
					// Return original values to recalculate bookvalue
					$this->lstAssetModel->SelectedValue = $this->objAsset->AssetModelId;
					$this->txtPurchaseCost->Text = money_format('%i',$this->objAsset->PurchaseCost);
					$this->calPurchaseDate->DateTime = $this->objAsset->PurchaseDate;
					$this->lblBookValue->Display = true;
					$this->lblBookValue_Update();
					// Display only labels
					$this->txtPurchaseCost->Display = false;
					$this->calPurchaseDate->Display = false;
					$this->lblPurchaseCost->Display = true;
					$this->lblPurchaseDate->Display = true;
				}else{
					$this->chkAssetDepreciation->Checked = false;
					$this->hideAssetDepreciationFields();
				};
				$this->chkAssetDepreciation->Enabled = false;
			}
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

		if(QApplication::$TracmorSettings->DepreciationFlag == '1'){
			$this->chkAssetDepreciation->Enabled = true;
			if($this->objAsset->DepreciationFlag){
				$this->showAssetDepreciationFields();
				$this->lblPurchaseCost->Display = false;
				$this->lblPurchaseDate->Display = false;
			}
		}

		$objAssetToClone = $this->objAsset;
		// Instantiate new Asset object
		$this->objAsset = new Asset();
		// Load custom fields for asset with values from original asset
		$this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, true, $objAssetToClone->AssetId, false,$objAssetToClone->AssetModelId);
		// Set the asset_code to null because they are unique
		$this->lblHeaderAssetCode->Text = 'New Asset';
		$this->txtAssetCode->Text = '';

        // Set the creation and modification fields to null because it hasn't been created or modified yet.
		$this->lblModifiedDate->Text = '';
		$this->lblCreationDate->Text = '';

		// Show the inputs so the user can change any information and add the asset tag
		$this->displayInputs();
	}

	// Print Asset Tag button Click Action
	public function btnPrintAssetTag_Click($strFormId, $strControlId, $strParameter) {
		$strImagePath = sprintf('../includes/php/barcode.php?code=%s', $this->objAsset->AssetCode);
		QApplication::ExecuteJavaScript('var pwin = window.open("", "Image");');
		QApplication::ExecuteJavaScript(sprintf('if (pwin) { pwin.document.writeln("<html><head><style type=\"text/css\">body { margin:0; padding:0; } </style></head><body><img src=\"%s\" /></body></html>");pwin.document.close();pwin.focus();pwin.print(); }', $strImagePath));
	}

	// Delete Button Click Actions
	public function btnDelete_Click($strFormId, $strControlId, $strParameter) {

		try {
			// Get an instance of the database
			$objDatabase = QApplication::$Database[1];

			// Begin a MySQL Transaction to be either committed or rolled back
			$objDatabase->TransactionBegin();

			// ParentAssetId Field must be manually deleted because MySQL ON DELETE will not cascade to them
			Asset::ResetParentAssetIdToNullByAssetId($this->objAsset->AssetId);

			// Delete any audit scans of this asset
			Asset::DeleteAuditScanByAssetId($this->objAsset->AssetId);

			// Delete the asset
			$this->objAsset->Delete();

			$objDatabase->TransactionCommit();
			QApplication::Redirect('asset_list.php');
		}
		catch (QMySqliDatabaseException $objExc) {
			// Rollback the transaction
			$objDatabase->TransactionRollback();

			throw new QDatabaseException();
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
		$this->chkLockToParent->Display = false;
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
		if ($this->objAsset->LinkedFlag) {
			$this->lblLockedToParent->Visible = true;
		} else {
			$this->lblLockedToParent->Visible = false;
		}

		// Display Edit and Delete buttons
		$this->btnEdit->Display = true;
		$this->btnDelete->Display = true;
		$this->btnClone->Display = true;
		$this->atcAttach->btnUpload->Display = true;
		$this->btnPrintAssetTag->Display = true;
		if ($this->objAsset->ArchivedFlag) {
			$this->btnEdit->Enabled = false;
			$this->btnClone->Enabled = false;
			$this->atcAttach->Enabled = false;
			$this->btnPrintAssetTag->Enabled = false;
		}
		else {
			$this->btnEdit->Enabled = true;
			$this->btnClone->Enabled = true;
			$this->atcAttach->Enabled = true;
			$this->btnPrintAssetTag->Enabled = true;
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
	$this->lblLockedToParent->Visible = false;

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

    // Do not display Edit and Delete buttons
    $this->btnEdit->Display = false;
    $this->btnDelete->Display = false;
    $this->btnClone->Display = false;
	$this->atcAttach->btnUpload->Display = false;
	$this->btnPrintAssetTag->Display = false;

    // Display Asset Tag and Asset Model input for edit mode
    // new: if the user is authorized to edit the built-in fields.
		if($this->blnEditBuiltInFields){
			$this->txtAssetCode->Display = true;
			$this->lstAssetModel->Display = true;
			$this->txtParentAssetCode->Display = true;
			$this->chkLockToParent->Display = true;
      $this->lblIconParentAssetCode->Display = true;
      $this->lblParentAssetCode->Display = false;
		}else{ //in edit mode, if the user is not authorized to edit built-in fields, the fields are render as labels.
			$this->lblAssetCode->Display = true;
			$this->lblAssetModel->Display = true;
			$this->lblParentAssetCode->Display = true;
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
  				if ((!QApplication::$TracmorSettings->StrictCheckinPolicy) || ($objUserAccount && $objUserAccount->UserAccountId == QApplication::$objUserAccount->UserAccountId)) {
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
			$this->lblAssetModel->Text = $this->objAsset->AssetModel->__toStringWithLink();
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
		if(QApplication::$TracmorSettings->DepreciationFlag == '1'
           && $this->chkAssetDepreciation instanceof QCheckBox){
			$this->chkAssetDepreciation->Enabled = false;
			$this->hideAssetDepreciationFields();
			if($this->objAsset->DepreciationFlag == 1){
				$this->lblPurchaseCost->Text = money_format('%i',$this->objAsset->PurchaseCost);
				$this->lblPurchaseDate->Text = $this->objAsset->PurchaseDate->__toString();
				$this->lblPurchaseCost->Display = true;
				$this->lblPurchaseDate->Display = true;
				$this->lblBookValue->Display = true;
			}
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
		  $this->chkLockToParent->Checked = $this->objAsset->LinkedFlag;
		}
		else {
		  @$this->txtParentAssetCode->Text = "";
		  @$this->chkLockToParent->Checked = false;
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
			if($this->arrCustomFields){
				$this->blnEditMode?$this->intNextTabIndex = 2:$this->intNextTabIndex = 3;
				foreach ($this->arrCustomFields as $objCustomField) {
					//Set NextTabIndex only if the custom field is show
					if($objCustomField['input']->TabIndex == 0 && $objCustomField['ViewAuth'] && $objCustomField['ViewAuth']->AuthorizedFlag){
						$objCustomField['input']->TabIndex=$this->GetNextTabIndex();
						$this->txtParentAssetCode->TabIndex = $objCustomField['input']->TabIndex + 1;
						$this->chkLockToParent->TabIndex = $this->txtParentAssetCode->TabIndex + 1;
					}

					// Enforce edit authorization
					if (!$objCustomField['blnEdit']){
						$objCustomField['lbl']->Display=true;
						$objCustomField['input']->Display=false;

						//In Create Mode, if the role doesn't have edit access for the custom field and the custom field is required, the field shows as a label with the default value
						if(!$this->blnEditMode && $objCustomField['blnRequired']){
						  if ($objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue) $objCustomField['lbl']->Text=$objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue->__toString();
						}
					}
			    }
			}
            else {
                $this->Refresh();
            }
		}
    //
  public function reloadCustomFields($intAssetModelId){
    // Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
          $this->objAsset->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, $this->blnEditMode, $this->objAsset->AssetId, false, $intAssetModelId);
            foreach($this->arrCustomFields as $objCustomField){
                $objCustomField['input']->Form->RemoveControl($objCustomField['input']->ControlId);
            }
    		// Create the Custom Field Controls - labels and inputs (text or list) for each
    		$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objAsset->objCustomFieldArray, $this->blnEditMode, $this, true, true, false);
	        // Add TabIndex for all txt custom fields
	        $this->blnEditMode?$this->intNextTabIndex = 2:$this->intNextTabIndex = 3;
    		foreach ($this->arrCustomFields as $arrCustomField) {
    		  if (array_key_exists('input', $arrCustomField))
			  {
				  $arrCustomField['input']->TabIndex = $this->GetNextTabIndex();
				  $this->txtParentAssetCode->TabIndex =  $arrCustomField['input']->TabIndex + 1;
				  $this->chkLockToParent->TabIndex = $this->txtParentAssetCode->TabIndex + 1;
				  $arrCustomField['lbl']->Display = false;
			  }
    		}

    		//Setup Custom Fields
    		$this->UpdateCustomFields();
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
	public function getShipReceiveDate($objItem) {
	  if ($objItem->Transaction->TransactionTypeId == 6) {
	    return $objItem->Transaction->Shipment->ShipDate;
	  }
	  else {
	    return $objItem->Transaction->Receipt->ReceiptDate;
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


	public function chkAssetDepreciation_Click(){
        if($this->chkAssetDepreciation->Checked){
		   $this->showAssetDepreciationFields();
	    }
		else{
			$this->hideAssetDepreciationFields();
		}
	}

	protected function hideAssetDepreciationFields(){
        if($this->calPurchaseDate instanceof QDateTimePickerExt && $this->txtPurchaseCost instanceof QTextBox){
            $this->calPurchaseDate->Display = false;
            $this->txtPurchaseCost->Display = false;
            $this->lblBookValue->Display = false;
            $this->Refresh();
        }
	}

	protected function showAssetDepreciationFields(){
		if ($this->calPurchaseDate->DateTime == null){
			$this->calPurchaseDate->DateTime = new QDateTime(QDateTime::Now);
		}
		$this->calPurchaseDate->Display = true;
		$this->txtPurchaseCost->Display = true;
		$this->lblBookValue->Display = true;
		$this->Refresh();
	}

	// Book Value functions
	protected function lblBookValue_Create(){
		$this->lblBookValue = new QLabel($this);
		$this->lblBookValue->Name = 'Book Value: ';
		$this->lblBookValue_Update();
	}

	protected function lblBookValue_Update(){

		if($objAssetModel = AssetModel::Load($this->lstAssetModel->SelectedValue)){
			$intDepreciationClassId = $objAssetModel->DepreciationClassId;
			if(!empty($intDepreciationClassId)  && DepreciationClass::Load($intDepreciationClassId))
			$life = DepreciationClass::Load($intDepreciationClassId)->Life;
		}
		if(is_numeric($this->txtPurchaseCost->Text)
		  && isset($life)
		  && ($this->calPurchaseDate->DateTime instanceof DateTime)
		  && QDateTime::Now() > $this->calPurchaseDate->DateTime
		  ){
			$interval = QDateTime::Now()->diff($this->calPurchaseDate->DateTime);
			$interval = $interval->y*12 + $interval->m;
			$fltBookValue =	$this->txtPurchaseCost->Text - ($this->txtPurchaseCost->Text * ($interval/$life));
			// prevent negative results
			$fltBookValue = $fltBookValue < 0 ?  0 : $fltBookValue;
			$this->lblBookValue->Text = money_format('%i', $fltBookValue);
		}
        else{
			$this->lblBookValue->Text = '...';
		}
	}

  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
	  	case "objAsset": return $this->objAsset;
	  		break;
	  	case "blnEditMode": return $this->blnEditMode;
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