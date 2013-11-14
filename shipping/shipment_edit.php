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
	QApplication::Authenticate(5);
	require_once(__FORMBASE_CLASSES__ . '/ShipmentEditFormBase.class.php');
	require('../contacts/CompanyEditPanel.class.php');
	require('../contacts/ContactEditPanel.class.php');
	require('../contacts/AddressEditPanel.class.php');



	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Shipment class.  It extends from the code-generated
	 * abstract ShipmentEditFormBase class.
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
	class ShipmentEditForm extends ShipmentEditFormBase {

		// Header Tabs
		protected $ctlHeaderMenu;

		// Shortcut Menu
		protected $ctlShortcutMenu;

		// Booleans
		protected $blnModifyAssets = false;
		protected $blnModifyInventory = false;
		protected $blnShowInventory = false;

		// Inputs
		protected $txtShipmentNumber;
		protected $txtNote;
		protected $txtNewAssetCode;
		protected $txtNewInventoryModelCode;
		protected $lstSourceLocation;
		protected $txtQuantity;
		protected $chkScheduleReceipt;
		protected $rblAssetType;
		protected $txtReceiptAssetCode;
		protected $chkAutoGenerateAssetCode;
		protected $dtpScheduleReceiptDueDate;
		protected $dlgExchange;
		protected $dlgDueDate;
		public $lstFromCompany;
		public $lstFromContact;
		public $lstFromAddress;
		public $lstToCompany;
		public $lstToContact;
		public $lstToAddress;
		protected $ctlAssetSearchTool;
		protected $ctlInventorySearchTool;

		// Buttons
		protected $btnEdit;
		protected $atcAttach;
		protected $pnlAttachments;
		protected $btnAddAsset;
		protected $btnLookup;
		protected $lblLookup;
		protected $btnAddInventory;
		protected $btnCompleteShipment;
		protected $btnCancelShipment;
		// We are not allowing users to cancel complete shipments any longer. Creates a problem if transactions are conducted on assets/inventory after they are shipped.
		// We are now allowing users to cancel complete shipments, only if there have not been any related transactions after the shipment was completed.
		// Users can still cancel a shipment if they have scheduled a return, but only if the return has not been received
		protected $btnCancelCompleteShipment;
		protected $btnSaveExchange;
		protected $btnCancelExchange;
		protected $btnSaveDueDate;
		protected $btnCancelDueDate;

		// Labels
		protected $lblHeaderShipment;
		protected $lblTrackingNumber;
		protected $lblShipmentNumber;
		protected $lblShipDate;
		protected $lblFromCompany;
		protected $lblFromContact;
		protected $lblFromAddress;
		protected $lblFromAddressFull;
		protected $lblToCompany;
		protected $lblToContact;
		protected $lblToAddress;
		protected $lblToAddressFull;
		protected $lblCourier;
		protected $pnlNote;
		protected $lblPackingListLink;
		protected $lblNewFromCompany;
		protected $lblNewFromContact;
		protected $lblNewFromAddress;
		protected $lblNewToCompany;
		protected $lblNewToContact;
		protected $lblNewToAddress;
		protected $lblAddAsset;
		protected $dlgNew;

		// Datagrids
		protected $dtgAssetTransact;
		protected $dtgInventoryTransact;

		// Arrays
		protected $arrAssetTransactionToDelete;
		protected $arrInventoryTransactionToDelete;
		protected $objCompanyArray;

		// Objects
		protected $objAssetTransactionArray;
		protected $objInventoryTransactionArray;
		protected $objTransaction;
		protected $dttNow;
		protected $dttFiveDaysFromNow;
    	protected $receiveInternalShipmentTransaction;

		// Integers
		protected $intNewTempId = 1;

		// Custom Field Objects
		public $arrCustomFields;

		// Set true if the Built-in Fields has to be rendered
		public $blnViewBuiltInFields;
		public $blnEditBuiltInFields;

		protected function Form_Create() {

			// check rigths for the Inventory to Ship
			$this->blnShowInventory = true;
			$objRoleModule = RoleModule::LoadByRoleIdModuleId(QApplication::$objUserAccount->RoleId, 3);
			if ($objRoleModule->AccessFlag) {
				$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId($objRoleModule->RoleModuleId, 2);
				if ($objRoleModuleAuthorization->AuthorizationLevelId == 3) $this->blnShowInventory = false;
			} else $this->blnShowInventory = false;

			// Call SetupShipment to either Load/Edit Existing or Create New
			$this->SetupShipment();

			$this->objCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));

			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();

			// Packing List Link
			$this->lblPackingListLink_Create();

			// Shipping Labels
			$this->lblShipmentNumber_Create();
			$this->lblHeaderShipment_Create();

			$this->lblShipDate_Create();
			$this->lblFromCompany_Create();
			$this->lblFromContact_Create();
			$this->lblFromAddress_Create();

			$this->lstToCompany_Create();
			$this->lblNewToCompany_Create();
			$this->lstToContact_Create();
			$this->lblNewToContact_Create();
			$this->lstToAddress_Create();
            $this->lblNewToAddress_Create();

			$this->lblFromAddressFull_Create();
			$this->lblToCompany_Create();
			$this->lblToContact_Create();
			$this->lblToAddress_Create();
			$this->lblToAddressFull_Create();
			$this->lblCourier_Create();
			$this->pnlNote_Create();
			$this->lblTrackingNumber_Create();

			// Shipping Inputs
			$this->dlgExchange_Create();
			$this->dlgDueDate_Create();
			$this->calShipDate_Create();
			$this->lstFromCompany_Create();
			$this->lblNewFromCompany_Create();
			$this->lstFromContact_Create();
			$this->lblNewFromContact_Create();
			$this->lstFromAddress_Create();
			$this->lblNewFromAddress_Create();
			
			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->txtShipmentNumber_Create();
			}
			$this->lstCourier_Create();
			$this->txtNote_Create();
			$this->txtNewAssetCode_Create();

			if ($this->blnShowInventory) {
				$this->txtNewInventoryModelCode_Create();
				$this->btnLookup_Create();
				$this->ctlInventorySearchTool_Create();
				$this->lstSourceLocation_Create();
				$this->txtQuantity_Create();
				$this->btnAddInventory_Create();
			}

			$this->txtTrackingNumber_Create();
			//$this->lblAdvanced_Create();
			$this->txtReceiptAssetCode_Create();
			$this->chkAutoGenerateAssetCode_Create();
			$this->dtpScheduleReceiptDueDate_Create();
			$this->rblAssetType_Create();
			$this->chkScheduleReceipt_Create();
			$this->btnAddAsset_Create();
			$this->ctlAssetSearchTool_Create();

			$this->btnSaveExchange_Create();
			$this->btnCancelExchange_Create();
			$this->btnSaveDueDate_Create();
			$this->btnCancelDueDate_Create();
			$this->pnlAttachments_Create();

			// Create all custom asset fields
			$this->customFields_Create();
			//Set display logic of Built-In Fields
			$this->UpdateBuiltInFields();
			$this->UpdateAddressAccess();
			$this->UpdateCompanyAccess();
			$this->UpdateContactAccess();

			// New entities Dialog
			$this->dlgNew_Create();

			if (!$this->objShipment->ShippedFlag) {
				// Shipping Buttons
				$this->btnDelete_Create();
			}
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnEdit_Create();
			$this->atcAttach_Create();

			// Complete Shipment Buttons
			$this->btnCompleteShipment_Create();
			$this->btnCancelShipment_Create();
			$this->btnCancelCompleteShipment_Create();

			// Shipping Datagrids
			$this->dtgAssetTransact_Create();
			$this->dtgInventoryTransact_Create();

			// Load the objAssetTransactionArray and objInventoryTransactionArray for the first time
			if ($this->blnEditMode) {

				$objClauses = array();
				if ($objClause = $this->dtgAssetTransact->OrderByClause)
					array_push($objClauses, $objClause);
				/*if ($objClause = $this->dtgAssetTransact->LimitClause)
					array_push($objClauses, $objClause);*/
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->Asset->AssetModel))
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->SourceLocation));
					array_push($objClauses, $objClause);
				$this->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId, $objClauses);
				$objClauses = null;

				$objClauses = array();
				if ($objClause = $this->dtgInventoryTransact->OrderByClause)
					array_push($objClauses, $objClause);
				/*if ($objClause = $this->dtgInventoryTransact->LimitClause)
					array_push($objClauses, $objClause);*/
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->InventoryLocation->InventoryModel));
					array_push($objClauses, $objClause);
				$this->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId, $objClauses);

				// If shipped, display labels. Otherwise, we don't need to call DisplayLabels because only labels are on the QPanel.
				$this->DisplayLabels();
			}
			// For a new shipment, display the inputs
			elseif (!$this->blnEditMode) {
				$this->DisplayInputs();
			}



			// Check if there is an Asset or InventoryModel ID in the query string to automatically add them - they would be coming from AssetEdit or InventoryEdit
			if (!$this->blnEditMode) {
				$intAssetId = QApplication::QueryString('intAssetId');
				// If an Asset was passed in the query string, load the txt in the Asset Tag text box and click the add button
				if (($intAssetId)) {
					$objAsset = Asset::Load($intAssetId);
					if ($objAsset) {
						$this->txtNewAssetCode->Text = $objAsset->AssetCode;
						$this->btnAddAsset_Click($this, null, null);
					}
				}
				$intInventoryModelId = QApplication::QueryString('intInventoryModelId');
				// If an InventoryModel was passed in the query string, load the text in the InventoryModel text box and set the focus to the quantity box
				if ($intInventoryModelId) {
					$objInventoryModel = InventoryModel::Load($intInventoryModelId);
					if ($objInventoryModel) {
						$this->txtNewInventoryModelCode->Text = $objInventoryModel->InventoryModelCode;
						$this->btnLookup_Click($this, null, null);
						QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->lstSourceLocation->ControlId));
					}
				}
			}
		}

		// Datagrids must load their datasource in this step, because the data is not stored in the FormState variable like everything else
		protected function Form_PreRender() {

			$this->dtgAssetTransact->SetDataBinder('dtgAssetTransact_Bind');

			$this->dtgInventoryTransact->SetDataBinder('dtgInventoryTransact_Bind');

		}

		protected function dtgAssetTransact_Bind() {
			// Load the data for the AssetTransact datagrid - only if it has changed or is new
			if ($this->blnModifyAssets || $this->blnEditMode) {
				//$this->blnModifyAssets = false;
				$this->dtgAssetTransact->TotalItemCount = count($this->objAssetTransactionArray);
				if ($this->dtgAssetTransact->TotalItemCount > 0) {
				  // Create new array without child assets
				  /*$objAssetTransactionArray = array();
				  foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
				    if (!$objAssetTransaction->Asset->LinkedFlag) {
				      $objAssetTransactionArray[] = $objAssetTransaction;
				    }
				  }
				  $this->dtgAssetTransact->TotalItemCount = count($objAssetTransactionArray);
					$this->dtgAssetTransact->DataSource = $objAssetTransactionArray;*/
				  $intItemsPerPage = $this->dtgAssetTransact->ItemsPerPage;
					$intItemOffset = ($this->dtgAssetTransact->PageNumber - 1) * $intItemsPerPage;
					$arrDataSource = array_slice($this->objAssetTransactionArray, $intItemOffset, $intItemsPerPage);
					//$this->dtgAssetTransact->DataSource = $this->objAssetTransactionArray;
					$this->dtgAssetTransact->DataSource = $arrDataSource;
					$this->dtgAssetTransact->ShowHeader = true;
				}
				else {
					$this->dtgAssetTransact->ShowHeader = false;
				}
			}
		}

		protected function dtgInventoryTransact_Bind() {
			// Load the data for the InventoryTransact datagrid - only if it has changed or is new
			if ($this->blnModifyInventory || $this->blnEditMode) {
				//$this->blnModifyInventory = false;
				$intItemsPerPage = $this->dtgInventoryTransact->ItemsPerPage;
				$intItemOffset = ($this->dtgInventoryTransact->PageNumber - 1) * $intItemsPerPage;
				$arrDataSource = array_slice($this->objInventoryTransactionArray, $intItemOffset, $intItemsPerPage);

				$this->dtgInventoryTransact->TotalItemCount = count($this->objInventoryTransactionArray);
				if ($this->dtgInventoryTransact->TotalItemCount > 0) {
					//$this->dtgInventoryTransact->DataSource = $this->objInventoryTransactionArray;
					$this->dtgInventoryTransact->DataSource = $arrDataSource;
					$this->dtgInventoryTransact->ShowHeader = true;
				}
				else {
					$this->dtgInventoryTransact->ShowHeader = false;
				}
			}
		}

		protected function SetupShipment() {
			parent::SetupShipment();
			QApplication::AuthorizeEntity($this->objShipment, $this->blnEditMode);
		}

		//**************
		// CREATE PANELS
		//**************

  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
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

  	protected function ctlInventorySearchTool_Create() {
  	  $this->ctlInventorySearchTool = new QInventorySearchToolComposite($this);

  	  $this->lblLookup = new QLabel($this);
		  $this->lblLookup->HtmlEntities = false;
		  $this->lblLookup->Text = '<img src="../images/icons/inventory_lookup.png" border="0" style="cursor:pointer;">';
		  $this->lblLookup->AddAction(new QClickEvent(), new QAjaxControlAction($this->ctlInventorySearchTool, 'lblLookup_Click'));
		  $this->lblLookup->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this->ctlInventorySearchTool, 'lblLookup_Click'));
		  $this->lblLookup->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	}

   	// Create and Setup the Modal Dialog Box
  	protected function dlgExchange_Create() {
  		$this->dlgExchange = new QDialogBox($this);
  		$this->dlgExchange->AutoRenderChildren = false;
  		$this->dlgExchange->Template = 'dlg_exchange.inc.php';
  		$this->dlgExchange->Width = '300px';
  		$this->dlgExchange->Height = '60px';
  		$this->dlgExchange->Padding = '10px';
  		$this->dlgExchange->Display = false;
  		$this->dlgExchange->BackColor = '#FFFFFF';
  		$this->dlgExchange->MatteClickable = false;
  		$this->dlgExchange->SetCustomStyle('overflow', 'auto');
    }

    // Create and Setup the Due Date Modal Dialog Box
    protected function dlgDueDate_Create() {
    	$this->dlgDueDate = new QDialogBox($this);
    	$this->dlgDueDate->AutoRenderChildren = true;
    	$this->dlgDueDate->Template = 'dlg_due_date.inc.php';
    	$this->dlgDueDate->Width = '200px';
    	$this->dlgDueDate->Height = '80px';
    	$this->dlgDueDate->Padding = '10px';
    	$this->dlgDueDate->Display = false;
    	$this->dlgDueDate->BackColor = '#FFFFFF';
    	$this->dlgDueDate->MatteClickable = false;
    	$this->dlgDueDate->SetCustomStyle('overflow', 'auto');
    }

		//**************
		// CREATE LABELS
		//**************

		// Create and Setup lblPackingListLink
		protected function lblPackingListLink_Create() {
			$this->lblPackingListLink = new QLabel($this);
			$this->lblPackingListLink->HtmlEntities = false;
			if ($this->blnEditMode) {
				$this->lblPackingListLink->Text = $this->objShipment->__toStringPackingListLink("bluelink");
			}
		}

		// Create and Setup lblTrackingNumber
		protected function lblTrackingNumber_Create() {
			$this->lblTrackingNumber = new QLabel($this);
			$this->lblTrackingNumber->Name = 'Tracking Number';
			$this->lblTrackingNumber->HtmlEntities = false;
			$this->lblTrackingNumber->Text = $this->objShipment->__toStringTrackingNumber();
		}

		// Create and Setup lblShipmentNumber
		protected function lblShipmentNumber_Create() {
			$this->lblShipmentNumber = new QLabel($this);
			$this->lblShipmentNumber->Name = 'Shipment Number';
			if (!$this->blnEditMode) {
				$this->lblShipmentNumber->Text = '';
			}
			elseif ($this->blnEditMode) {
				$this->lblShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			}
		}

		// Create and Setup lblHeaderShipment
		protected function lblHeaderShipment_Create() {
			$this->lblHeaderShipment = new QLabel($this);
			if ($this->blnEditMode) {
				$this->lblHeaderShipment->Text = sprintf('Shipment #%s',$this->objShipment->ShipmentNumber);
			} else {
				$this->lblHeaderShipment->Text = 'Schedule Shipment';
			}
		}

		// Create and Setup lblShipDate
		protected function lblShipDate_Create() {
			$this->lblShipDate = new QLabel($this);
			$this->lblShipDate->Name = QApplication::Translate('Ship Date');
			if ($this->blnEditMode && $this->objShipment->ShipDate) {
				$this->lblShipDate->Text = $this->objShipment->ShipDate->__toString();
			}
		}

		// Create and Setup lblFromCompany
		protected function lblFromCompany_Create() {
			$this->lblFromCompany = new QLabel($this);
			$this->lblFromCompany->Name = 'From Company';
			if ($this->blnEditMode && $this->objShipment->FromCompanyId) {
				$this->lblFromCompany->Text = $this->objShipment->FromCompany->__toStringWithLink();
			}
			$this->lblFromCompany->HtmlEntities = false;
		}

		// Create and Setup lblFromContact
		protected function lblFromContact_Create() {
			$this->lblFromContact = new QLabel($this);
			$this->lblFromContact->Name = 'From Contact';
			if ($this->blnEditMode && $this->objShipment->FromContactId) {
				$this->lblFromContact->Text = $this->objShipment->FromContact->__toStringWithLink();
			}
			$this->lblFromContact->HtmlEntities = false;
		}

		// Create and Setup lblFrom Address
		protected function lblFromAddress_Create() {
			$this->lblFromAddress = new QLabel($this);
			$this->lblFromAddress->Name = 'From Address';
			if ($this->blnEditMode && $this->objShipment->FromAddressId) {
				$this->lblFromAddress->Text = $this->objShipment->FromAddress->__toStringWithLink();
			}
			$this->lblFromAddress->HtmlEntities = false;
		}

		// Create and Setup lblFromAddressFull
		protected function lblFromAddressFull_Create() {
			$this->lblFromAddressFull = new QLabel($this);
			$this->lblFromAddressFull->HtmlEntities = false;
			$this->lblFromAddressFull->Name = 'Full Address';
			if ($this->blnEditMode && $this->objShipment->FromAddressId)
			$this->lblFromAddressFull->Text = $this->objShipment->FromAddress->__ToStringFullAddress();
		}

		// Create and Setup lblToCompany
		protected function lblToCompany_Create() {
			$this->lblToCompany = new QLabel($this);
			$this->lblToCompany->Name = 'To Company';
			if ($this->blnEditMode && $this->objShipment->ToCompanyId) {
				$this->lblToCompany->Text = $this->objShipment->ToCompany->__toStringWithLink();
			}
			$this->lblToCompany->HtmlEntities = false;
		}

		// Create and Setup lblToContact
		protected function lblToContact_Create() {
			$this->lblToContact = new QLabel($this);
			$this->lblToContact->Name = 'To Contact';
			if ($this->blnEditMode && $this->objShipment->ToContactId) {
				$this->lblToContact->Text = $this->objShipment->ToContact->__toStringWithLink();
			}
			$this->lblToContact->HtmlEntities = false;
		}

		// Create and Setp lblToAddress
		protected function lblToAddress_Create() {
			$this->lblToAddress = new QLabel($this);
			$this->lblToAddress->Name = 'To Address';
			if ($this->blnEditMode && $this->objShipment->ToAddressId) {
				$this->lblToAddress->Text = $this->objShipment->ToAddress->__toStringWithLink();
			}
			$this->lblToAddress->HtmlEntities = false;
		}

		// Create and Setup lblToAddressFull
		protected function lblToAddressFull_Create() {
			$this->lblToAddressFull = new QLabel($this);
			$this->lblToAddressFull->HtmlEntities = false;
			$this->lblToAddressFull->Name = 'Full Address';
			if ($this->blnEditMode && $this->objShipment->ToAddressId)
			$this->lblToAddressFull->Text = $this->objShipment->ToAddress->__ToStringFullAddress();
		}

		// Create and Setup lblCourier
		protected function lblCourier_Create() {
			$this->lblCourier = new QLabel($this);
			$this->lblCourier->Name = 'Courier';
			$this->lblCourier->Text = ($this->objShipment->CourierId) ? $this->objShipment->Courier->__toString() : 'Other';
		}

		// Create and Setup lblAdvanced
		protected function lblAdvanced_Create() {
			$this->lblAdvanced = new QLabel($this);
			$this->lblAdvanced->Name = 'Advanced';
			$this->lblAdvanced->Text = 'Show Advanced';
			$this->lblAdvanced->HtmlEntities = false;
			$this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
			$this->lblAdvanced->SetCustomStyle('padding-left', '5px');
	  		$this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
			$this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblAdvanced_Click'));
			if ($this->blnEditMode) {
				$this->lblAdvanced->Display = false;
			}
			//$this->lblAdvanced->TabIndex = 29;
		}

		protected function lblNewFromCompany_Create() {
			$this->lblNewFromCompany = new QLabel($this);
			$this->lblNewFromCompany->HtmlEntities = false;
			$this->lblNewFromCompany->Text = '<img src="../images/add.png">';
			$this->lblNewFromCompany->ToolTip = "New Company";
			$this->lblNewFromCompany->CssClass = "add_icon";
			$this->lblNewFromCompany->AddAction(new QClickEvent(), new QAjaxAction('lblNewFromCompany_Click'));
			$this->lblNewFromCompany->ActionParameter = $this->lstFromCompany->ControlId;
		}

		protected function lblNewFromContact_Create() {
			$this->lblNewFromContact = new QLabel($this);
			$this->lblNewFromContact->HtmlEntities = false;
			$this->lblNewFromContact->Text = '<img src="../images/add.png">';
			$this->lblNewFromContact->ToolTip = "New Contact";
			$this->lblNewFromContact->CssClass = "add_icon";
			$this->lblNewFromContact->AddAction(new QClickEvent(), new QAjaxAction('lblNewFromContact_Click'));
			$this->lblNewFromContact->ActionParameter = $this->lstFromContact->ControlId;
		}

		protected function lblNewFromAddress_Create() {
			$this->lblNewFromAddress = new QLabel($this);
			$this->lblNewFromAddress->HtmlEntities = false;
			$this->lblNewFromAddress->Text = '<img src="../images/add.png">';
			$this->lblNewFromAddress->ToolTip = "New Address";
			$this->lblNewFromAddress->CssClass = "add_icon";
			$this->lblNewFromAddress->AddAction(new QClickEvent(), new QAjaxAction('lblNewFromAddress_Click'));
			$this->lblNewFromAddress->ActionParameter = $this->lstFromAddress->ControlId;
		}

		protected function lblNewToCompany_Create() {
			$this->lblNewToCompany = new QLabel($this);
			$this->lblNewToCompany->HtmlEntities = false;
			$this->lblNewToCompany->Text = '<img src="../images/add.png">';
			$this->lblNewToCompany->ToolTip = "New Company";
			$this->lblNewToCompany->CssClass = "add_icon";
			$this->lblNewToCompany->AddAction(new QClickEvent(), new QAjaxAction('lblNewToCompany_Click'));
			$this->lblNewToCompany->ActionParameter = $this->lstToCompany->ControlId;
		}

		protected function lblNewToContact_Create() {
			$this->lblNewToContact = new QLabel($this);
			$this->lblNewToContact->HtmlEntities = false;
			$this->lblNewToContact->Text = '<img src="../images/add.png">';
			$this->lblNewToContact->ToolTip = "New Contact";
			$this->lblNewToContact->CssClass = "add_icon";
			$this->lblNewToContact->ActionParameter = $this->lstToContact->ControlId;
			$this->lblNewToContact->AddAction(new QClickEvent(), new QAjaxAction('lblNewToContact_Click'));
		}

		protected function lblNewToAddress_Create() {
			$this->lblNewToAddress = new QLabel($this);
			$this->lblNewToAddress->HtmlEntities = false;
			$this->lblNewToAddress->Text = '<img src="../images/add.png">';
			$this->lblNewToAddress->ToolTip = "New Address";
			$this->lblNewToAddress->CssClass = "add_icon";
			$this->lblNewToAddress->AddAction(new QClickEvent(), new QAjaxAction('lblNewToAddress_Click'));
			$this->lblNewToAddress->ActionParameter = $this->lstToAddress->ControlId;
		}

		// Create and Setup pnlNote
		protected function pnlNote_Create() {
			$this->pnlNote = new QPanel($this);
			$this->pnlNote->CssClass = 'scrollBox';
			$this->pnlNote->Name = 'Note';
			if ($this->blnEditMode) {
				$this->pnlNote->Text = nl2br($this->objShipment->Transaction->Note);
			}
		}

		//**************
		// CREATE INPUTS
		//**************

		// Create and Setup txtTrackingNumber
		protected function txtTrackingNumber_Create() {
			$this->txtTrackingNumber = new QTextBox($this);
			$this->txtTrackingNumber->Name = QApplication::Translate('Tracking Number');
			$this->txtTrackingNumber->Text = $this->objShipment->TrackingNumber;
			$this->txtTrackingNumber->CausesValidation = true;
			$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtTrackingNumber->TabIndex = 8;
		}

		// Create and Setup calShipDate
		protected function calShipDate_Create() {
			$this->calShipDate = new QDateTimePickerExt($this);
			$this->calShipDate->Name = QApplication::Translate('Ship Date');
			$this->calShipDate->DateTimePickerType = QDateTimePickerType::Date;
			if ($this->blnEditMode) {
				$this->calShipDate->DateTime = $this->objShipment->ShipDate;
			}
			elseif (!$this->blnEditMode) {
				$this->calShipDate->DateTime = new QDateTime(QDateTime::Now);
			}
			$this->calShipDate->Required = true;

			$this->dttNow = new QDateTime(QDateTime::Now);
			// $this->calShipDate->MinimumYear = $this->dttNow->Year;
			// $this->calShipDate->MinimumMonth = $this->dttNow->Month;
			// $this->calShipDate->MinimumDay = $this->dttNow->Day;
      		// 5 Days: 432000
      		// 6 Days: 518400
      		// 7 Days: 604800
      		// 10 Days: 864000
      		// 200 Days: 17280000

      		$intDayOfWeek = date('w', time());
      		// Sunday - just add five days
      		if ($intDayOfWeek == 0) {
      			$this->dttFiveDaysFromNow = QDateTime::FromTimestamp($this->dttNow->Timestamp + 432000); // new QDateTime($this->dttNow->Timestamp + 432000);
      		}
      		// Monday - Friday, add seven days
      		elseif ($intDayOfWeek > 0 && $intDayOfWeek < 6) {
      			$this->dttFiveDaysFromNow = QDateTime::FromTimestamp($this->dttNow->Timestamp + 604800); //new QDateTime($this->dttNow->Timestamp + 604800);
      		}
      		// Saturday - add six days
      		elseif ($intDayOfWeek == 6) {
      			$this->dttFiveDaysFromNow = QDateTime::FromTimestamp($this->dttNow->Timestamp + 518400); //new QDateTime($this->dttNow->Timestamp + 518400);
      		}
      		$this->calShipDate->MaximumYear = $this->dttFiveDaysFromNow->Year;
      		$this->calShipDate->MaximumMonth = $this->dttFiveDaysFromNow->Month;
      		$this->calShipDate->MaximumDay = $this->dttFiveDaysFromNow->Day;

     		$this->calShipDate->AddAction(new QChangeEvent(), new QAjaxAction('calShipDate_Select'));
 			QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->calShipDate->ControlId));

 			$this->calShipDate->TabIndex=10;
		}

		// Create and Setup lstFromCompany
		protected function lstFromCompany_Create() {
			$this->lstFromCompany = new QListBox($this);
			$this->lstFromCompany->Name = QApplication::Translate('From Company');
			$this->lstFromCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromCompany->AddItem('- Select One -', null);
			$objFromCompanyArray = $this->objCompanyArray;
			$intCompanyId = QApplication::$TracmorSettings->CompanyId;
			if ($objFromCompanyArray) foreach ($objFromCompanyArray as $objFromCompany) {
				$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
				if (($this->objShipment->FromCompanyId && $this->objShipment->FromCompanyId == $objFromCompany->CompanyId) || (!$this->blnEditMode && $intCompanyId && $intCompanyId == $objFromCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstFromCompany->AddItem($objListItem);
			}

			$this->lstFromCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstFromCompany_Select'));
			//$this->lstFromCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstFxServiceType_Update'));
			$this->lstFromCompany->TabIndex=1;
		}

		// Create and Setup lstFromContact
		protected function lstFromContact_Create() {
			$this->lstFromContact = new QListBox($this);
			$this->lstFromContact->Name = QApplication::Translate('From Contact');
			$this->lstFromContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromContact->AddItem('- Select One -', null);
			$intCompanyId = ($this->objShipment->FromCompanyId) ? $this->objShipment->FromCompanyId : QApplication::$TracmorSettings->CompanyId;
			$objFromContactArray = Contact::LoadArrayByCompanyId($intCompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
			if ($objFromContactArray) foreach ($objFromContactArray as $objFromContact) {
				$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
				if (($this->objShipment->FromContactId) && ($this->objShipment->FromContactId == $objFromContact->ContactId))
					$objListItem->Selected = true;
				$this->lstFromContact->AddItem($objListItem);
			}
			$this->lstFromContact->AddAction(new QChangeEvent(), new QAjaxAction('lstFromContact_Select'));
			$this->lstFromContact->TabIndex=2;
		}

		// Create and Setup lstFromAddress
		protected function lstFromAddress_Create() {
			$this->lstFromAddress = new QListBox($this);
			$this->lstFromAddress->Name = QApplication::Translate('From Address');
			$this->lstFromAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromAddress->AddItem('- Select One -', null);
			$intCompanyId = ($this->objShipment->FromCompanyId) ? $this->objShipment->FromCompanyId : QApplication::$TracmorSettings->CompanyId;
			$objFromAddressArray = Address::LoadArrayByCompanyId($intCompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
			if ($objFromAddressArray) foreach ($objFromAddressArray as $objFromAddress) {
				$objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
				if (($this->objShipment->FromAddressId) && ($this->objShipment->FromAddressId == $objFromAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstFromAddress->AddItem($objListItem);
			}
			$this->lstFromAddress->AddAction(new QChangeEvent(), new QAjaxAction('lstFromAddress_Select'));
			//$this->lstFromAddress->AddAction(new QChangeEvent(), new QAjaxAction('lstFxServiceType_Update'));
			$this->lstFromAddress->TabIndex=3;
		}

		// Create and Setup lstToCompany
		protected function lstToCompany_Create() {
			$this->lstToCompany = new QListBox($this);
			$this->lstToCompany->Name = QApplication::Translate('To Company');
			$this->lstToCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstToCompany->AddItem('- Select One -', null);
			$objToCompanyArray = $this->objCompanyArray;
			if ($objToCompanyArray) foreach ($objToCompanyArray as $objToCompany) {
				$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
				if (($this->objShipment->ToCompanyId) && ($this->objShipment->ToCompanyId == $objToCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstToCompany->AddItem($objListItem);
			}
			$this->lstToCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstToCompany_Select'));
			$this->lstToCompany->TabIndex=4;
		}

		// Create and Setup lstToContact
		protected function lstToContact_Create() {
			$this->lstToContact = new QListBox($this);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->Required = true;

			if (!$this->blnEditMode) {
				$this->lstToContact->AddItem('- Select One -', null);
			} elseif ($this->blnEditMode && $this->lstToCompany->SelectedValue) {
				$this->lstToContact->Enabled = true;
				$this->lstToCompany_Select();
			}
			else {
				$this->lstToContact->AddItem('- Select One -', null);
				$objToContactArray = Contact::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName), QQ::OrderBy(QQN::Contact()->FirstName)));
				if ($objToContactArray) foreach ($objToContactArray as $objToContact) {
					$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
					if (($this->objShipment->ToContactId) && ($this->objShipment->ToContactId == $objToContact->ContactId))
						$objListItem->Selected = true;
					$this->lstToContact->AddItem($objListItem);
				}
			}

		//	$this->lstToContact->AddAction(new QChangeEvent(), new QAjaxAction('lstToContact_Select'));
			$this->lstToContact->TabIndex=5;
		}

		// Create and Setup lstToAddress
		protected function lstToAddress_Create() {
			$this->lstToAddress = new QListBox($this);
			$this->lstToAddress->Name = QApplication::Translate('To Address');
			$this->lstToAddress->Required = true;
			if (!$this->blnEditMode) {
				$this->lstToAddress->AddItem('- Select One -', null);
			}
			elseif ($this->blnEditMode && $this->lstToCompany->SelectedValue) {
				$objToAddressArray = Address::LoadArrayByCompanyId($this->objShipment->ToCompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
				$this->lstToAddress->AddItem('- Select One -', null);
				if ($objToAddressArray) {
					foreach ($objToAddressArray as $objToAddress) {
						$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
						if ($this->objShipment->ToAddressId == $objToAddress->AddressId) {
							$objListItem->Selected = true;
						}
						$this->lstToAddress->AddItem($objListItem);
					}
					$this->lstToAddress->Enabled = true;
				}
			}
			$this->lstToAddress->AddAction(new QChangeEvent(), new QAjaxAction('lstToAddress_Select'));
			$this->lstToAddress->TabIndex=6;
		}

		// Create and Setup txtShipmentNumber
		protected function txtShipmentNumber_Create() {
			$this->txtShipmentNumber = new QTextBox($this);
			$this->txtShipmentNumber->Name = 'Shipment Number';
			if ($this->blnEditMode) {
				$this->txtShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			}
			$this->txtShipmentNumber->Required = true;
		}

		// Create and Setup lstCourier
		protected function lstCourier_Create() {
			$this->lstCourier = new QListBox($this);
			$this->lstCourier->Name = QApplication::Translate('Courier');
			$this->lstCourier->Required = true;
			//if (!$this->blnEditMode)
				$this->lstCourier->AddItem('- Select One -', null);
			$objCourierArray = Courier::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Courier()->ShortDescription)));
			if ($objCourierArray) foreach ($objCourierArray as $objCourier) {
				if ($objCourier->ActiveFlag) {
					$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
					if (($this->objShipment->CourierId) && ($this->objShipment->CourierId == $objCourier->CourierId))
						$objListItem->Selected = true;
					$this->lstCourier->AddItem($objListItem);
				}
			}
			if ($this->blnEditMode && !$this->objShipment->CourierId) {
				$this->lstCourier->AddItem('Other', null, true);
			}
			else {
				$this->lstCourier->AddItem('Other', null);
			}
			$this->lstCourier->TabIndex=7;
		}

		// Create and Setup txtNote
		protected function txtNote_Create() {
			$this->txtNote = new QTextBox($this);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->TextMode = QTextMode::MultiLine;
			$this->txtNote->Height=80;
			if ($this->blnEditMode) {
				$this->txtNote->Text = $this->objShipment->Transaction->Note;
			}
			$this->txtNote->TabIndex=9;
		}

		// Create the text field to enter new asset tags to add to the transaction
		// Eventually this field will receive information from the AML
		protected function txtNewAssetCode_Create() {
			$this->txtNewAssetCode = new QTextBox($this);
			$this->txtNewAssetCode->Name = 'Asset Tag';
			$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtNewAssetCode->CausesValidation = false;
			$this->txtNewAssetCode->TabIndex=47;
		}

		// Create the text field to enter new inventory_model codes to add to the transaction
		// Eventually this field will receive information from the AML
		protected function txtNewInventoryModelCode_Create() {
			$this->txtNewInventoryModelCode = new QTextBox($this);
			$this->txtNewInventoryModelCode->Name = 'Inventory Code';
			$this->txtNewInventoryModelCode->CausesValidation = false;
			$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnLookup_Click'));
			$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create and Setup lstSourceLocation
		protected function lstSourceLocation_Create() {
			$this->lstSourceLocation = new QListBox($this);
			$this->lstSourceLocation->Name = 'Location';
			$this->lstSourceLocation->Required = false;
			$this->lstSourceLocation->AddItem('- Select One -', null);
			$this->lstSourceLocation->CausesValidation = false;
			$this->lstSourceLocation->Enabled = false;
		}

		protected function txtQuantity_Create() {
			$this->txtQuantity = new QTextBox($this);
			$this->txtQuantity->Name = 'Quantity';
			$this->txtQuantity->CausesValidation = false;
			$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtQuantity->Enabled = false;
		}

		protected function chkScheduleReceipt_Create() {
			$this->chkScheduleReceipt = new QCheckBox($this);
			$this->chkScheduleReceipt->Name = 'Schedule Receipt';
			$this->chkScheduleReceipt->Text = 'Schedule an Exchange or Return:';
			$this->chkScheduleReceipt->Display = false;
			$this->chkScheduleReceipt->AddAction(new QClickEvent(), new QAjaxAction('chkScheduleReceipt_Click'));
		}

		protected function rblAssetType_Create() {
			$this->rblAssetType = new QRadioButtonList($this);
			$this->rblAssetType->HtmlEntities = false;
			$this->rblAssetType->AddItem(new QListItem('<img src="../images/icons/receipt_datagrid.png"> Return', 'this', true));
			$this->rblAssetType->AddItem(new QListItem('<img src="../images/icons/receipt_datagrid.png"> Exchange', 'new'));
			$this->rblAssetType->Enabled = false;
			$this->rblAssetType->Display = false;
			// $this->rblAssetType->AddAction(new QChangeEvent(), new QAjaxAction('rblAssetType_Change'));
			$this->rblAssetType->AddAction(new QChangeEvent(), new QToggleDisplayAction($this->txtReceiptAssetCode));
			if (QApplication::$TracmorSettings->MinAssetCode) {
				$this->rblAssetType->AddAction(new QChangeEvent(), new QToggleDisplayAction($this->chkAutoGenerateAssetCode));
			}
		}

		protected function txtReceiptAssetCode_Create() {
			$this->txtReceiptAssetCode = new QTextBox($this->dlgExchange);
			$this->txtReceiptAssetCode->Name = 'Asset Tag';
			//$this->txtReceiptAssetCode->Display = false;
		}

		protected function chkAutoGenerateAssetCode_Create() {
			$this->chkAutoGenerateAssetCode = new QCheckBox($this->dlgExchange);
			$this->chkAutoGenerateAssetCode->Name = 'Auto Generate';
			$this->chkAutoGenerateAssetCode->Text = 'Auto Generate';
			$this->chkAutoGenerateAssetCode->AddAction(new QClickEvent(), new QToggleEnableAction($this->txtReceiptAssetCode));
			if (!QApplication::$TracmorSettings->MinAssetCode) {
				$this->chkAutoGenerateAssetCode->Display = false;
			}
			//$this->chkAutoGenerateAssetCode->Display = false;
		}

		protected function dtpScheduleReceiptDueDate_Create() {
			$this->dtpScheduleReceiptDueDate = new QDateTimePicker($this->dlgDueDate);
			$this->dtpScheduleReceiptDueDate->Name = 'Due Date';
			$this->dtpScheduleReceiptDueDate->DateTimePickerType = QDateTimePickerType::Date;
			$this->dtpScheduleReceiptDueDate->MinimumYear = date('Y');
			$this->dtpScheduleReceiptDueDate->MaximumYear = date('Y') + 2;
		}

		//******************
		// CREATE DATAGRIDS
		//******************

		// Setup the AssetTransact datagrid
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

    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Asset Tag', '<?= $_ITEM->Asset->__toStringWithLink("bluelink") ?> <?= $_ITEM->ToStringHovertips($_CONTROL) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->Asset->AssetModel->__toStringWithLink("bluelink") ?>', array('Width' => "200", 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Location', '<?= $_ITEM->SourceLocation->__toString() ?>', array('CssClass' => "dtg_column")));

	    if (!$this->blnEditMode) {
    		$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveAssetColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Advanced', '<?= $_FORM->AdvancedColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Due Date', '<?= $_FORM->DueDateColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    }

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

	    $this->dtgAssetTransact->ShowHeader = false;
		}

		// Render the advanced listbox in the AssetTransact datagrid
		public function AdvancedColumn_Render(AssetTransaction $objAssetTransaction) {
			if (!$objAssetTransaction->Asset->TempId) {
				$objAssetTransaction->Asset->TempId = $this->intNewTempId++;
			}
			$strControlId = 'lstAdvanced' . $objAssetTransaction->Asset->TempId;
			$lstAdvanced = $this->GetControl($strControlId);
			if (!$lstAdvanced) {
				// Create the advanced label for this row in the datagrid
				// Use ActionParameter to specify the Temp ID of the asset
				$lstAdvanced = new QListBox($this->dtgAssetTransact, $strControlId);
				$lstAdvanced->ActionParameter = $objAssetTransaction->Asset->TempId;
				$lstAdvanced->CausesValidation = false;
				$lstAdvanced->AddItem('None', 0);
				$lstAdvanced->AddItem('Schedule for Return', 1);
				$lstAdvanced->AddItem('Schedule for Exchange', 2);
				$lstAdvanced->AddAction(new QChangeEvent(), new QAjaxAction('lstAdvancedColumn_Change'));
				$lstAdvanced->Width = 200;
				if ($objAssetTransaction->Asset->LinkedFlag) {
          $lstAdvanced->Enabled = false;
        }
			}

			if ($objAssetTransaction->ScheduleReceiptFlag) {
				if ($objAssetTransaction->NewAssetFlag) {
					$lstAdvanced->SelectedValue = 2;
				}
				else {
					$lstAdvanced->SelectedValue = 1;
				}
			}
			else {
				$lstAdvanced->SelectedValue = 0;
			}


			return $lstAdvanced->Render(false);
		}

		public function DueDateColumn_Render(AssetTransaction $objAssetTransaction) {
			$strControlId = 'lblDueDate' . $objAssetTransaction->Asset->TempId;
			$lblDueDate = $this->GetControl($strControlId);
			if (!$lblDueDate) {
				// Create the due date label for this row in the datagrid
				// Use the ActionParameter to specify the Temp ID of the asset
				$lblDueDate = new QLabel($this->dtgAssetTransact, $strControlId);
				$lblDueDate->ActionParameter = $objAssetTransaction->Asset->TempId;
				$lblDueDate->CausesValidation = false;
				if ($objAssetTransaction->ScheduleReceiptDueDate && $objAssetTransaction->ScheduleReceiptFlag) {
					$lblDueDate->Text = $objAssetTransaction->ScheduleReceiptDueDate->__toString();
				}
				elseif ($objAssetTransaction->ScheduleReceiptFlag) {
					$lblDueDate->Text = 'Set Due Date';
				}
				else {
					$lblDueDate->Text = 'Set Due Date';
					$lblDueDate->Visible = false;
				}
				$lblDueDate->SetCustomStyle('text-decoration', 'underline');
	  		$lblDueDate->SetCustomStyle('cursor', 'pointer');
				$lblDueDate->AddAction(new QClickEvent(), new QAjaxAction('lblDueDate_Click'));
			}

			return $lblDueDate->Render(false);
		}

		// Render the remove button column in the AssetTransact datagrid
		public function RemoveAssetColumn_Render(AssetTransaction $objAssetTransaction) {

			// Assign the asset a TempId and increment it by one
			// Only if it wasn't already created when making the advanced label
			if (!$objAssetTransaction->Asset->TempId) {
	    	$objAssetTransaction->Asset->TempId = $this->intNewTempId++;
			}
      //$strControlId = 'btnRemoveAsset' . $objAssetTransaction->Asset->AssetId;
      $strControlId = 'btnRemoveAsset' . $objAssetTransaction->Asset->TempId;
      $btnRemove = $this->GetControl($strControlId);
      if (!$btnRemove) {
          // Create the Remove button for this row in the DataGrid
          // Use ActionParameter to specify the ID of the asset
          $btnRemove = new QButton($this->dtgAssetTransact, $strControlId);
          $btnRemove->Text = 'Remove';
          // $btnRemove->ActionParameter = $objAssetTransaction->Asset->AssetId;
          $btnRemove->ActionParameter = $objAssetTransaction->Asset->TempId;
          $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemoveAssetTransaction_Click'));
          $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemoveAssetTransaction_Click'));
          $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $btnRemove->CausesValidation = false;
          if ($objAssetTransaction->Asset->LinkedFlag) {
            $btnRemove->Enabled = false;
          }
      }

      return $btnRemove->Render(false);
		}

		// Setup the InventoryTransact datagrid
		protected function dtgInventoryTransact_Create() {

			$this->dtgInventoryTransact = new QDataGrid($this);
			$this->dtgInventoryTransact->CellPadding = 5;
			$this->dtgInventoryTransact->CellSpacing = 0;
			$this->dtgInventoryTransact->CssClass = "datagrid";

	    // Enable AJAX - this won't work while using the DB profiler
	    $this->dtgInventoryTransact->UseAjax = true;

	    // Enable Pagination, and set to 20 items per page
	    $objPaginator = new QPaginator($this->dtgInventoryTransact);
	    $this->dtgInventoryTransact->Paginator = $objPaginator;
	    $this->dtgInventoryTransact->ItemsPerPage = 20;

	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Inventory Code', '<?= $_ITEM->InventoryLocation->InventoryModel->__toStringWithLink("bluelink") ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Inventory Model', '<?= $_ITEM->InventoryLocation->InventoryModel->ShortDescription ?>', array('Width' => "200", 'CssClass' => "dtg_column")));
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Source Location', '<?= $_ITEM->SourceLocation->__toString() ?>', array('CssClass' => "dtg_column")));
	    $this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Quantity', '<?= $_ITEM->Quantity ?>', array('CssClass' => "dtg_column")));
	    if (!$this->blnEditMode) {
	    	$this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveInventoryColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    }

	    $objStyle = $this->dtgInventoryTransact->RowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#FFFFFF';
	    $objStyle->FontSize = 12;

	    $objStyle = $this->dtgInventoryTransact->AlternateRowStyle;
	    $objStyle->BackColor = '#EFEFEF';

	    $objStyle = $this->dtgInventoryTransact->HeaderRowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#EFEFEF';
	    $objStyle->CssClass = 'dtg_header';

	    $this->dtgInventoryTransact->ShowHeader = false;
		}

		// Render the Remove Button Column in the Inventory Transaction datagrid
		public function RemoveInventoryColumn_Render(InventoryTransaction $objInventoryTransaction) {

	    $strControlId = 'btnRemoveInventory' . $objInventoryTransaction->InventoryLocation->InventoryLocationId;
      $btnRemove = $this->GetControl($strControlId);
      if (!$btnRemove) {
        // Create the Remove button for this row in the DataGrid
        // Use ActionParameter to specify the ID of the InventoryLocationId
        $btnRemove = new QButton($this->dtgInventoryTransact, $strControlId);
        $btnRemove->Text = 'Remove';
        $btnRemove->ActionParameter = $objInventoryTransaction->InventoryLocation->InventoryLocationId;
        $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemoveInventory_Click'));
        $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemoveInventory_Click'));
        $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $btnRemove->CausesValidation = false;
	    }
	    return $btnRemove->Render(false);
		}

		//****************
		// CREATE BUTTONS
		//****************

		// Create and Setup btnCompleteShipment
		protected function btnCompleteShipment_Create() {
			$this->btnCompleteShipment = new QButton($this);
			$this->btnCompleteShipment->Text = 'Complete Shipment';
			$this->btnCompleteShipment->AddAction(new QClickEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->btnCompleteShipment->CausesValidation = true;
			QApplication::AuthorizeControl($this->objShipment, $this->btnCompleteShipment, 2);
		}

		// Create and Setup btnCancelShipment
		protected function btnCancelShipment_Create() {
			$this->btnCancelShipment = new QButton($this);
			$this->btnCancelShipment->Text = 'Cancel Shipment';
			$this->btnCancelShipment->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to CANCEL this %s?'), 'Shipment')));
			$this->btnCancelShipment->AddAction(new QClickEvent(), new QServerAction('btnCancelShipment_Click'));
			$this->btnCancelShipment->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnCancelShipment, 2);
		}

		// Create and Setup btnCancelCompleteShipment
		protected function btnCancelCompleteShipment_Create() {
			$this->btnCancelCompleteShipment = new QButton($this);
			$this->btnCancelCompleteShipment->Text = 'Cancel Complete Shipment';
			$this->btnCancelCompleteShipment->AddAction(new QClickEvent(), new QAjaxAction('btnCancelCompleteShipment_Click'));
			$this->btnCancelCompleteShipment->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnCancelCompleteShipment, 2);
		}

		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
			//$this->btnSave->TabIndex=15;
		}

		// Setup btnEdit
		protected function btnEdit_Create() {
			$this->btnEdit = new Qbutton($this);
			$this->btnEdit->Text = 'Edit';
			$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
			$this->btnEdit->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnEdit, 2);
		}

		// Setup btnCancel
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
			//$this->btnCancel->TabIndex=16;
		}

		// Setup btnDelete
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnDelete, 3);
		}

		// Setup Attach File Asset Button
		protected function atcAttach_Create() {
			$this->atcAttach = new QAttach($this, null, EntityQtype::Shipment, $this->objShipment->ShipmentId);
			QApplication::AuthorizeControl($this->objShipment, $this->atcAttach, 2);
		}

		// Setup Attachments Panel
		public function pnlAttachments_Create() {
			$this->pnlAttachments = new QAttachments($this, null, EntityQtype::Shipment, $this->objShipment->ShipmentId);
		}

		// Setup AddAsset Button
		protected function btnAddAsset_Create() {
			$this->btnAddAsset = new QButton($this);
			$this->btnAddAsset->Text = 'AddAsset';
			$this->btnAddAsset->AddAction(new QClickEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->btnAddAsset->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->btnAddAsset->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnAddAsset->CausesValidation = false;
			$this->btnAddAsset->TabIndex=45;
		}

		// Create the lookup button
		protected function btnLookup_Create() {
			$this->btnLookup = new QButton($this);
			$this->btnLookup->Text = 'Lookup';
			$this->btnLookup->AddAction(new QClickEvent(), new QAjaxAction('btnLookup_Click'));
			$this->btnLookup->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnLookup_Click'));
			$this->btnLookup->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnLookup->CausesValidation = false;
		}

		// Setup Add Inventory Button
		protected function btnAddInventory_Create() {
			$this->btnAddInventory = new QButton($this);
			$this->btnAddInventory->Text = 'Add';
			$this->btnAddInventory->AddAction(new QClickEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->btnAddInventory->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->btnAddInventory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnAddInventory->CausesValidation = false;
		}

		// Create Save Exchange Button
		protected function btnSaveExchange_Create() {
			$this->btnSaveExchange = new QButton($this->dlgExchange);
			$this->btnSaveExchange->Text = 'Save';
			$this->btnSaveExchange->AddAction(new QClickEvent(), new QAjaxAction('btnSaveExchange_Click'));
			$this->btnSaveExchange->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSaveExchange_Click'));
			$this->btnSaveExchange->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create Cancel Exchange Button
		protected function btnCancelExchange_Create() {
			$this->btnCancelExchange = new QButton($this->dlgExchange);
			$this->btnCancelExchange->Text = 'Cancel';
			$this->btnCancelExchange->AddAction(new QClickEvent(), new QAjaxAction('btnCancelExchange_Click'));
			$this->btnCancelExchange->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancelExchange_Click'));
			$this->btnCancelExchange->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create Save Due Date Button
		protected function btnSaveDueDate_Create() {
			$this->btnSaveDueDate = new QButton($this->dlgDueDate);
			$this->btnSaveDueDate->Text = 'Save';
			$this->btnSaveDueDate->AddAction(new QClickEvent(), new QAjaxAction('btnSaveDueDate_Click'));
			$this->btnSaveDueDate->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSaveDueDate_Click'));
			$this->btnSaveDueDate->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create Cancel Exchange Button
		protected function btnCancelDueDate_Create() {
			$this->btnCancelDueDate = new QButton($this->dlgDueDate);
			$this->btnCancelDueDate->Text = 'Cancel';
			$this->btnCancelDueDate->AddAction(new QClickEvent(), new QAjaxAction('btnCancelDueDate_Click'));
			$this->btnCancelDueDate->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancelDueDate_Click'));
			$this->btnCancelDueDate->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create all Custom Company Fields
		protected function customFields_Create() {

			// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
			$this->objShipment->objCustomFieldArray = CustomField::LoadObjCustomFieldArray(10, $this->blnEditMode, $this->objShipment->ShipmentId);

			// Create the Custom Field Controls - labels and inputs (text or list) for each
			if ($this->objShipment->objCustomFieldArray) {
				$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objShipment->objCustomFieldArray, $this->blnEditMode, $this, true, true);

			}
			$this->UpdateCustomFields();
		}

		// New Entity (Company, Contact, Address Dialog Box)
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

		//******************
		// ONSELECT METHODS
		// These methods are run every time a value is selected in their respective inputs
		//******************

		// This is run every time a 'From Company' is selected
		// It loads the values for the 'From Address' and 'From Contact' drop-downs for the selected company
		protected function lstFromCompany_Select() {
      $this->disableAdvancedIfInternal();
			// Clear any displayed warnings
			$this->lblNewFromContact->Warning = '';
			$this->lblNewFromAddress->Warning = '';
			
			if ($this->lstFromCompany->SelectedValue) {
				// this SelectedValue is incorrect - it still thinks Fictional, INC. is selected
				$objCompany = Company::Load($this->lstFromCompany->SelectedValue);
				if ($objCompany) {
					// Load the values for the 'From Contact' List
					if ($this->lstFromContact) {
						$objFromContactArray = Contact::LoadArrayByCompanyId($objCompany->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
						if ($this->lstFromContact->SelectedValue) {
							$SelectedContactId = $this->lstFromContact->SelectedValue;
						}
						elseif ($this->objShipment->FromContactId) {
							$SelectedContactId = $this->objShipment->FromContactId;
						}
						else {
							$SelectedContactId = null;
						}
						$this->lstFromContact->RemoveAllItems();
						$this->lstFromContact->AddItem('- Select One -', null);
						if ($objFromContactArray) {
							foreach ($objFromContactArray as $objFromContact) {
								$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
								if ($SelectedContactId == $objFromContact->ContactId) {
									$objListItem->Selected = true;
								}
								$this->lstFromContact->AddItem($objListItem);
							}
							$this->lstFromContact->Enabled = true;
						}
					}
					// Load the values for the 'From Address' List
					if ($this->lstFromAddress) {
						$objFromAddressArray = Address::LoadArrayByCompanyId($objCompany->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
						if ($this->lstFromAddress->SelectedValue) {
							$SelectedAddressId = $this->lstFromAddress->SelectedValue;
						}
						elseif ($this->objShipment->FromAddressId) {
							$SelectedAddressId = $this->objShipment->FromAddressId;
						}
						else {
							$SelectedAddressId = null;
						}
						$this->lstFromAddress->RemoveAllItems();
						$this->lstFromAddress->AddItem('- Select One -', null);
						if ($objFromAddressArray) {
							foreach ($objFromAddressArray as $objFromAddress) {
								$objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
								$this->lstFromAddress->AddItem($objListItem);
								if ($SelectedAddressId == $objFromAddress->AddressId) {
									$objListItem->Selected = true;
								}
							}
							$this->lstFromAddress->Enabled = true;
						}
					}
				}
			}
		}

		// This is run every time a 'From Contact' is selected
		protected function lstFromContact_Select() {
			if ($this->lstFromContact->SelectedValue) {
				$objContact = Contact::Load($this->lstFromContact->SelectedValue);
			}
		}

		// This is run every time a 'To Company' is selected
		// It loads the values for the 'To Address' and 'To Contact' drop-downs for the selected company
		protected function lstToCompany_Select() {
      $this->disableAdvancedIfInternal();
			// Clear any displayed warnings
			if ($this->lblNewToContact) {
				$this->lblNewToContact->Warning = '';
				$this->lblNewToAddress->Warning = '';
			}
			
			if ($this->lstToCompany->SelectedValue) {
				$objCompany = Company::Load($this->lstToCompany->SelectedValue);
				if ($objCompany) {
					// Load the values for the 'To Contact' List
					if ($this->lstToContact) {
						$objToContactArray = Contact::LoadArrayByCompanyId($objCompany->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
						if ($this->lstToContact->SelectedValue) {
							$SelectedContactId = $this->lstToContact->SelectedValue;
						}
						elseif ($this->objShipment->ToContactId) {
							$SelectedContactId = $this->objShipment->ToContactId;
						}
						else {
							$SelectedContactId = null;
						}
						$this->lstToContact->RemoveAllItems();
						$this->lstToContact->AddItem('- Select One -', null);
						if ($objToContactArray) {
							foreach ($objToContactArray as $objToContact) {
								$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
								if ($SelectedContactId == $objToContact->ContactId) {
									$objListItem->Selected = true;
								}
								$this->lstToContact->AddItem($objListItem);
							}
							$this->lstToContact->Enabled = true;
						}
					}
					// Load the values for the 'To Address' List
					if ($this->lstToAddress) {
						$objToAddressArray = Address::LoadArrayByCompanyId($objCompany->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));

						if ($this->lstToAddress->SelectedValue) {
							$SelectedAddressId = $this->lstToAddress->SelectedValue;
						}
						elseif ($this->objShipment->ToAddressId) {
							$SelectedAddressId = $this->objShipment->ToAddressId;
						}
						else {
							$SelectedAddressId = null;
						}
						$this->lstToAddress->RemoveAllItems();
						$this->lstToAddress->AddItem('- Select One -', null);
						if ($objToAddressArray) {
							foreach ($objToAddressArray as $objToAddress) {
								$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
								if ($SelectedAddressId == $objToAddress->AddressId) {
									$objListItem->Selected = true;
								}
								$this->lstToAddress->AddItem($objListItem);
							}
							$this->lstToAddress->Enabled = true;
							$this->lstToAddress_Select();
						}
					}
				}
			}
		}

		// Set the From Address Label text when it is selected from the drop-down
		protected function lstFromAddress_Select() {
			$objAddress = Address::Load($this->lstFromAddress->SelectedValue);
			if ($objAddress) {
				$this->lblFromAddressFull->Text = $objAddress->__toStringFullAddress();
			}
			else {
				$this->lblFromAddressFull->Text = '';
			}
		}

		// Set the To Address Label text when it is selected from the drop-down
		protected function lstToAddress_Select() {
			$objAddress = Address::Load($this->lstToAddress->SelectedValue);
			if ($objAddress) {
				$this->lblToAddressFull->Text = $objAddress->__toStringFullAddress();
			}
			else {
				$this->lblToAddressFull->Text = '';
			}
			//$this->lstFxServiceType_Update();
		}

		// Enables/Disables the ShippingAccountOther text box when a choice is selected from the listbox
		protected function lstShippingAccount_Select() {
			if ($this->lstShippingAccount->SelectedValue) {
				$this->txtShippingAccountOther->Text = '';
				$this->txtShippingAccountOther->Enabled = false;
			}
			elseif ($this->lstShippingAccount->SelectedName == 'Other') {
				$this->txtShippingAccountOther->Enabled = true;
			}
			//$this->lstFxServiceType_Update();
		}

		// This method, along with QDateTimePickerExt.inc, allow for a min and max date availble to be selected
		// This method has not been tested rigorously, but will work for the five day period for this form.
		protected function calShipDate_Select($strFormId, $strControlId, $strParameter) {

			if($this->calShipDate->DateTime ) {
				if($this->calShipDate->DateTime->Year > $this->dttNow->Year && $this->calShipDate->DateTime->Year <= $this->dttFiveDaysFromNow->Year) {
			    $this->calShipDate->MinimumMonth = 1;
			    $this->calShipDate->MinimumDay = 1;
			    $this->calShipDate->MaximumMonth = $this->dttFiveDaysFromNow->Month;
			    $this->calShipDate->MaximumDay = $this->dttFiveDaysFromNow->Day;
				}
				elseif($this->calShipDate->DateTime->Year == $this->dttNow->Year) {
			    $this->calShipDate->MinimumMonth = $this->dttNow->Month ;
			    $this->calShipDate->MinimumDay = $this->dttNow->Day;
			    if ($this->calShipDate->DateTime->Year == $this->dttFiveDaysFromNow->Year) {
			    	$this->calShipDate->MaximumMonth = $this->dttFiveDaysFromNow->Month;
			    	$this->calShipDate->MaximumDay = $this->dttFiveDaysFromNow->Day;
			    }
			    elseif ($this->calShipDate->DateTime->Year < $this->dttFiveDaysFromNow->Year) {
			    	$this->calShipDate->MaximumMonth = 12;
			    }
				}
				if($this->calShipDate->DateTime->Month > $this->dttNow->Month) {
			    $this->calShipDate->MinimumDay = 1;
				}
			}
			else {
			  $this->calShipDate->DateTime = new QDateTime(QDateTime::Now);
			  $this->calShipDate->MinimumYear = $this->dttNow->Year;
			  $this->calShipDate->MinimumMonth = $this->dttNow->Month;
			  $this->calShipDate->MinimumDay = $this->dttNow->Day;
			}
		}

		// Switches between displaying Sender Account or Recipient/third party account inputs
		protected function lstBillTransportationTo_Select() {
			if ($this->lstBillTransportationTo->SelectedValue) {
				if ($this->lstBillTransportationTo->SelectedValue === 1) {
					$this->lstShippingAccount->Display=TRUE;
					$this->txtRecipientThirdPartyAccount->Display=FALSE;
					$this->lblSenderLabel->Text = 'Sender Account';
				} else {
					$this->lstShippingAccount->Display=FALSE;
					$this->txtRecipientThirdPartyAccount->Display=TRUE;
					$this->lblSenderLabel->Text = 'Account #';
				}
			}
		}

		//************************
		// ONCLICK BUTTON METHODS
		// These methods are run when buttons are clicked
		//************************

		public function btnAssetSearchToolAdd_Click() {
		  $this->ctlAssetSearchTool->lblWarning->Text = "";
      $intSelectedAssetId = $this->ctlAssetSearchTool->ctlAssetSearch->dtgAsset->GetSelected("AssetId");
      if (count($intSelectedAssetId) < 1) {
        $this->ctlAssetSearchTool->lblWarning->Text = "No selected assets.";
      }
      else {
        $lblNewWarning = "";
        foreach (Asset::QueryArray(QQ::In(QQN::Asset()->AssetId, $intSelectedAssetId)) as $objAsset) {
          $this->txtNewAssetCode->Text = $objAsset->AssetCode;
          $this->btnAddAsset_Click($this, null, null);
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

		public function btnInventorySearchToolAdd_Click() {
		  $intSelectedInventoryModelId = $this->ctlInventorySearchTool->ctlInventorySearch->dtgInventoryModel->GetSelected("InventoryId");
      if (count($intSelectedInventoryModelId) > 1) {
        $this->ctlInventorySearchTool->lblWarning->Text = "You must select only one inventory.";
      }
      elseif (count($intSelectedInventoryModelId) != 1) {
        $this->ctlInventorySearchTool->lblWarning->Text = "No selected inventories.";
      }
      elseif ($objInventoryModel = InventoryModel::LoadByInventoryModelId($intSelectedInventoryModelId[0])) {
        $this->txtNewInventoryModelCode->Text = $objInventoryModel->InventoryModelCode;
        $this->ctlInventorySearchTool->dlgInventorySearchTool->HideDialogBox();
        $this->btnLookup_Click($this, null, null);
  		}
  		// Uncheck all items but SelectAll checkbox
      $this->UncheckAllItems();
		}

		// Uncheck all items but SelectAll checkbox
		public function UncheckAllItems() {
		  foreach ($this->GetAllControls() as $objControl) {
        if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
          $objControl->Checked = false;
        }
      }
		}

		// This is called when the 'new' label is clicked
		public function lblNewFromCompany_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				// Create the panel, assigning it to the Dialog Box
				$pnlEdit = new CompanyEditPanel($this->dlgNew, 'CloseNewFromCompanyPanel');
				$pnlEdit->ActionParameter = $strParameter;
				// Show the dialog box
				$this->dlgNew->ShowDialogBox();
				$pnlEdit->txtShortDescription->Focus();
			}
		}

		// This is called when the 'new' label is clicked
		public function lblNewFromContact_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				if ($this->lstFromCompany->SelectedValue) {
					// Create the panel, assigning it to the Dialog Box
					$pnlEdit = new ContactEditPanel($this->dlgNew, 'CloseNewPanel', null, null, $this->lstFromCompany->SelectedValue);
					$pnlEdit->ActionParameter = $strParameter;
					// Show the dialog box
					$this->dlgNew->ShowDialogBox();
					if ($pnlEdit->lstCompany->Enabled) {
						$pnlEdit->lstCompany->Focus();
					} else {
						$pnlEdit->txtFirstName->Focus();
					}
				} else {
					$this->lblNewFromContact->Warning = 'You must select a company first.';
				}
			}
		}

		// This is called when the 'new' label is clicked
		public function lblNewFromAddress_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				if ($this->lstFromCompany->SelectedValue) {
					// Create the panel, assigning it to the Dialog Box
					$pnlEdit = new AddressEditPanel($this->dlgNew, 'CloseNewPanel', null, null, $this->lstFromCompany->SelectedValue);
					$pnlEdit->ActionParameter = $strParameter;
					// Show the dialog box
					$this->dlgNew->ShowDialogBox();
					if ($pnlEdit->lstCompany->Enabled) {
						$pnlEdit->lstCompany->Focus();
					} else {
						$pnlEdit->txtShortDescription->Focus();
					}
				} else {
					$this->lblNewFromAddress->Warning = 'You must select a company first.';
				}
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
					if ($pnlEdit->lstCompany->Enabled) {
						$pnlEdit->lstCompany->Focus();
					} else {
						$pnlEdit->txtFirstName->Focus();
					}
				}
				else {
					$this->lblNewToContact->Warning = 'You must select a company first.';
				}
			}
		}

		// This is called when the 'new' label is clicked
		public function lblNewToAddress_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->dlgNew->Display) {
				if ($this->lstToCompany->SelectedValue) {
					// Create the panel, assigning it to the Dialog Box
					$pnlEdit = new AddressEditPanel($this->dlgNew, 'CloseNewToAddressPanel', null, null, $this->lstToCompany->SelectedValue);
					$pnlEdit->ActionParameter = $strParameter;
					// Show the dialog box
					$this->dlgNew->ShowDialogBox();
					if ($pnlEdit->lstCompany->Enabled) {
						$pnlEdit->lstCompany->Focus();
					} else {
						$pnlEdit->txtShortDescription->Focus();
					}
				}
				else {
					$this->lblNewToAddress->Warning = 'You must select a company first.';
				}
			}
		}

		// When 'Hold at Location' checkbox is clicked,  show HAL panel
		public function chkHoldAtLocationFlag_Click($strFormId, $strControlId, $strParameter) {
			if ($this->chkHoldAtLocationFlag->Checked) {
				QApplication::ExecuteJavascript('document.getElementById("HAL").style.display="";');
			} else {
				QApplication::ExecuteJavascript('document.getElementById("HAL").style.display="none";');
			}
		}

		// Cancel editing an existing shipment, or cancel adding a new shipment and return to the list page
		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			if ($this->blnEditMode) {
				$this->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId);
				$this->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId);
				$this->DisplayLabels();
				$this->UpdateShipmentControls();
			}
			else {
				QApplication::Redirect('shipment_list.php');
			}
		}

		// Edit an existing shipment by displaying inputs and hiding the labels
		protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {
			$this->DisplayInputs();

			$this->UpdateBuiltInFields();
			$this->UpdateCustomFields();
		}

		// AddAsset Button Click
		public function btnAddAsset_Click($strFormId, $strControlId, $strParameter) {
			// Clear if warning from previous attempt exists
			$this->txtNewAssetCode->Warning ='';
			$strAssetCode = $this->txtNewAssetCode->Text;
			$blnDuplicate = false;
			$blnError = false;

			if ($strAssetCode) {
				// Begin error checking
				if ($this->objAssetTransactionArray) {
					foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
						if ($objAssetTransaction && $objAssetTransaction->Asset->AssetCode == $strAssetCode) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset has already been added.";
						}
					}
				}

				if (!$blnError) {
					$objNewAsset = Asset::LoadByAssetCode($this->txtNewAssetCode->Text);
					if (!($objNewAsset instanceof Asset)) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset tag does not exist.";
					}
					// Cannot ship any linked assets
					elseif ($objNewAsset->LinkedFlag) {
					  $blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is locked to a parent asset.";
					}
					// Cannot ship any archived assets
					elseif ($objNewAsset->ArchivedFlag) {
					  $blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is archived.";
					}
					// Cannot ship any assets that are checked out
					elseif ($objNewAsset->LocationId == 1) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is checked out.";
					}
					// Cannot ship any assets that have already been shipped
					elseif ($objNewAsset->LocationId == 2) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset has already been shipped.";
					}
					// Cannot ship any assets that are scheduled to be received
					elseif ($objNewAsset->LocationId == 5) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is currently scheduled to be received.";
					}
					elseif ($objNewAsset->CheckedOutFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is checked out.";
					}
					elseif ($objNewAsset->ReservedFlag) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset is reserved.";
					}
					elseif (!QApplication::AuthorizeEntityBoolean($objNewAsset, 2)) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "You do not have authorization to perform a transaction on this asset.";
					}
					else {
					  $objLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objNewAsset->AssetId);
					  $strAssetCodeArray = array();
					  $objCheckedLinkedAssetArray = array();
					  if ($objLinkedAssetArray) {
					    foreach ($objLinkedAssetArray as $objLinkedAsset) {
					      if (!QApplication::AuthorizeEntityBoolean($objLinkedAsset, 2)) {
					        $blnError = true;
						      $this->txtNewAssetCode->Warning = sprintf("You do not have authorization to perform a transaction on locked asset %s.", $objLinkedAsset->AssetCode);
						      break;
					      }
					      else {
					        $strAssetCodeArray[] = $objLinkedAsset->AssetCode;
					        $objCheckedLinkedAssetArray[] = $objLinkedAsset;
					      }
					    }
					    if (!$blnError) {
					      $this->txtNewAssetCode->Warning = sprintf("The following asset(s) have been added to the transaction because they are locked to asset (%s):<br />%s", $objNewAsset->AssetCode, implode('<br />', $strAssetCodeArray));
					    }
					  }
					}

					if ($objNewAsset && $objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
						if ($objPendingShipment->TransactionId != $this->objShipment->TransactionId) {
							$blnError = true;
							$this->txtNewAssetCode->Warning = "That asset was already scheduled for shipment.";
						}
						// If an asset was removed, and then added again in the same 'Edit', without saving in between, it needs to be removed from the ToDelete array
						// This seems totally absurd, but it is indeed the best way I could come up with to avoid a bug that wouldn't allow you to add an asset that was just removed.
						// This is also in receipt_edit.php. If you change one, change the other.
						else {
							if ($this->arrAssetTransactionToDelete) {
								foreach ($this->arrAssetTransactionToDelete as $key => $value) {
									if ($value) {
										$objOffendingAssetTransaction = AssetTransaction::Load($value);
										if ($objOffendingAssetTransaction->AssetId == $objNewAsset->AssetId) {
											$objOffendingAssetTransaction->Delete();
											unset($this->arrAssetTransactionToDelete[$key]);
										}
									}
								}
							}
						}
					}
/*					elseif ($this->lblAdvanced->Text == 'Hide Advanced' && $this->chkScheduleReceipt->Checked && $this->rblAssetType->SelectedValue == 'new' && !$this->chkAutoGenerateAssetCode->Checked && $this->txtReceiptAssetCode->Text == '') {
						$blnError = true;
						$this->txtReceiptAssetCode->Warning = "You must provide an asset tag for the new asset.";
					}*/
						// Create a new, but incomplete AssetTransaction
					if (!$blnError) {
						// Clear out the AssetCode field
						$this->txtNewAssetCode->Text = null;
						$objNewAssetTransaction = new AssetTransaction();
						// $objNewAssetTransaction->Asset = $objNewAsset;
						$objNewAssetTransaction->AssetId = $objNewAsset->AssetId;
						$objNewAssetTransaction->SourceLocationId = $objNewAsset->LocationId;
						// If scheduling a receipt for this asset
/*						if ($this->lblAdvanced->Text == "Hide Advanced" && $this->chkScheduleReceipt->Checked) {
							// If creating a new asset
							if ($this->rblAssetType->SelectedValue == 'new') {
								$objReceiptAsset = new Asset();
								// AssetId must be set so that it can be assigned to the AssetTransaction
								$objReceiptAsset->AssetId = 0;
								// The new receipt asset will be the same AssetModel as the asset being shipped (but a new asset)
								$objReceiptAsset->AssetModelId = $objNewAsset->AssetModelId;
								// Set Location to TBR
								$objReceiptAsset->LocationId = 5;
								// Set the asset tag to empty so that we'll know to auto generate later
								if ($this->chkAutoGenerateAssetCode->Checked) {
									$strAssetCode = '';
								}
								else {
									$strAssetCode = $this->txtReceiptAssetCode->Text;
								}
								$objReceiptAsset->AssetCode = $strAssetCode;
								$objNewAssetTransaction->NewAsset = $objReceiptAsset;
							}
							// Set this flag so that it will schedule this asset for receipt once the shipment is completed
							$objNewAssetTransaction->ScheduleReceiptFlag = true;
							$this->lblAdvanced_Click($this->FormId, $this->lblAdvanced->ControlId, null);
						}*/
						$this->objAssetTransactionArray[] = $objNewAssetTransaction;
						$this->blnModifyAssets = true;

						foreach ($objCheckedLinkedAssetArray as $objCheckedLinkedAsset) {
						  $objPendingShipment = AssetTransaction::PendingShipment($objCheckedLinkedAsset->AssetId);
						  $objLinkedAssetTransaction = new AssetTransaction();
  						$objLinkedAssetTransaction->AssetId = $objCheckedLinkedAsset->AssetId;
  						$objLinkedAssetTransaction->SourceLocationId = $objCheckedLinkedAsset->LocationId;
  						$this->objAssetTransactionArray[] = $objLinkedAssetTransaction;
						}

					}
					$this->dtgAssetTransact->Refresh();
				}
			}
			else {
				$this->txtNewAssetCode->Warning = 'Please enter an asset tag.';
				$blnError = true;
			}
			
			$this->txtNewAssetCode->Focus();
			$this->txtNewAssetCode->Select();
			
		}

		// Advanced listbox change action for each AssetTransaction in the datagrid
		public function lstAdvancedColumn_Change($strFormId, $strControlId, $strParameter) {

			$intTempId = $strParameter;
			$lstAdvanced = $this->GetControl($strControlId);
			if ($this->objAssetTransactionArray) {
			  $objNewAssetTransactionArray = array();
			  foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
			    $objNewAssetTransactionArray[$objAssetTransaction->Asset->AssetCode] = $objAssetTransaction;
			  }
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					if ($objAssetTransaction->Asset->TempId == $intTempId) {
						$lblDueDate = $this->GetControl('lblDueDate' . $intTempId);
						// 'None'
						if ($lstAdvanced->SelectedValue == 0) {
							$objAssetTransaction->ScheduleReceiptFlag = false;
							$objAssetTransaction->NewAssetFlag = false;
							$objAssetTransaction->NewAssetId = null;
							$objAssetTransaction->NewAsset = null;
							$lblDueDate->Visible = false;

							if ($objLinkedAssetCodeArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId)) {
							  foreach ($objLinkedAssetCodeArray as $objLinkedAssetCode) {
							    $objLinkedAssetTransaction = $objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode];
							    $objLinkedAssetTransaction->ScheduleReceiptFlag = false;
    							$objLinkedAssetTransaction->NewAssetFlag = false;
    							$objLinkedAssetTransaction->NewAssetId = null;
    							$objLinkedAssetTransaction->NewAsset = null;
							  }
							}
						}
						// Return
						elseif ($lstAdvanced->SelectedValue == 1) {
							$objAssetTransaction->ScheduleReceiptFlag = true;
							$objAssetTransaction->NewAssetFlag = false;
							$objAssetTransaction->NewAssetId = null;
							$objAssetTransaction->NewAsset = null;
							$lblDueDate->Visible = true;

							if ($objLinkedAssetCodeArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId)) {
							  foreach ($objLinkedAssetCodeArray as $objLinkedAssetCode) {
							    $objLinkedAssetTransaction = $objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode];
							    $objLinkedAssetTransaction->ScheduleReceiptFlag = true;
    							$objLinkedAssetTransaction->NewAssetFlag = false;
    							$objLinkedAssetTransaction->NewAssetId = null;
    							$objLinkedAssetTransaction->NewAsset = null;
							  }
							}
						}
						// Exchange
						elseif ($lstAdvanced->SelectedValue == 2) {
							$objAssetTransaction->ScheduleReceiptFlag = true;
							$objAssetTransaction->NewAssetFlag = true;
							$this->dlgExchange->ActionParameter = $intTempId;
							$this->dlgExchange->ShowDialogBox();
							$lblDueDate->Visible = true;

							if ($objLinkedAssetCodeArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId)) {
							  foreach ($objLinkedAssetCodeArray as $objLinkedAssetCode) {
							    $objLinkedAssetTransaction = $objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode];
							    $objLinkedAssetTransaction->ScheduleReceiptFlag = true;
    							$objLinkedAssetTransaction->NewAssetFlag = true;
							  }
							}
						}
					}
				}
				$this->blnModifyAssets = true;
			}
		}

		// Due Date Click Action for each AssetTransaction in the datagrid
		public function lblDueDate_Click($strFormId, $strControlId, $strParameter) {

			$intTempId = $strParameter;
			$this->dlgDueDate->ActionParameter = $intTempId;
			$this->dlgDueDate->ShowDialogBox();

			//$lblDueDate = $this->GetControl($strControlId);
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					if ($objAssetTransaction->Asset->TempId == $intTempId) {
						if ($objAssetTransaction->ScheduleReceiptDueDate) {
							$this->dtpScheduleReceiptDueDate->DateTime = new QDateTime($objAssetTransaction->ScheduleReceiptDueDate);
						}
						else {
							$this->dtpScheduleReceiptDueDate->DateTime = new QDateTime(QDateTime::Now);
						}
					}
				}
			}

			$this->blnModifyAssets = true;
		}

		// Remove button click action for each asset in the datagrid
		public function btnRemoveAssetTransaction_Click($strFormId, $strControlId, $strParameter) {

		  $intTempId = $strParameter;
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $key => $value) {
					if ($value->Asset->TempId == $intTempId) {
						// Prepare to delete from the database when the Save button is clicked
						if ($this->blnEditMode) {
							$this->arrAssetTransactionToDelete[] = $value->AssetTransactionId;
						}
						$objLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($value->Asset->AssetId);
						// If the asset in transaction has some children
						if ($objLinkedAssetArray) {
						  $intLinkedAssetIdArray = array();
						  foreach ($objLinkedAssetArray as $objLinkedAsset) {
						    $intLinkedAssetIdArray[$objLinkedAsset->AssetId] = true;
						  }
						  foreach ($this->objAssetTransactionArray as $key2 => $value2) {
    						if (array_key_exists($value2->Asset->AssetId, $intLinkedAssetIdArray)) {
    						  if ($this->blnEditMode) {
    						    $this->arrAssetTransactionToDelete[] = $value2->AssetTransactionId;
    						  }
    						  unset ($this->objAssetTransactionArray[$key2]);
    						}
						  }
						}

						$this->blnModifyAssets = true;
						unset ($this->objAssetTransactionArray[$key]);
					}
				}
				$this->dtgAssetTransact->Refresh();
			}
		}

		// Remove button click action for each InventoryLocation in the datagrid
		public function btnRemoveInventory_Click($strFormId, $strControlId, $strParameter) {

			if ($this->objInventoryTransactionArray) {
				foreach ($this->objInventoryTransactionArray as $key => $value) {
					if ($value->InventoryLocation->InventoryLocationId == $strParameter) {
						if ($this->blnEditMode) {
							// Prepare to delete from the database when the Save button is clicked
							$this->arrInventoryTransactionToDelete[] = $value->InventoryTransactionId;
						}
						$this->blnModifyInventory = true;
						unset ($this->objInventoryTransactionArray[$key]);
					}
				}
				$this->dtgInventoryTransact->Refresh();
			}
		}

		// Lookup Button Click - looks up an inventory model, loads the inventorylocation listbox
		// Enables InventoryLocation list and txtQuantity
		public function btnLookup_Click($strFormId, $strControlId, $strParameter) {
			// Clear if warning from previous attempt exists
			$this->txtNewInventoryModelCode->Warning ='';
			// Assign the value submitted from the form
			$strInventoryModelCode = $this->txtNewInventoryModelCode->Text;

			if ($strInventoryModelCode) {
				// Load the inventory model object based on the inventory_model_code submitted
				$objInventoryModel = InventoryModel::LoadByInventoryModelCode($strInventoryModelCode);

				if ($objInventoryModel) {
					// Load the array of InventoryLocations based on the InventoryModelId of the InventoryModel object
					$InventorySourceLocationArray = InventoryLocation::LoadArrayByInventoryModelIdLocations($objInventoryModel->InventoryModelId);
					$this->lstSourceLocation->RemoveAllItems();
					$this->lstSourceLocation->AddItem('- Select One -', null);
					if ($InventorySourceLocationArray) {
						// Populate the Source Location list box
						foreach ($InventorySourceLocationArray as $InventoryLocation) {
							// Do not display locations where the quantity is 0
							if ($InventoryLocation->Quantity != 0) {
								$this->lstSourceLocation->AddItem($InventoryLocation->__toStringWithQuantity(), $InventoryLocation->InventoryLocationId);
							}
						}
						$this->lstSourceLocation->Enabled = true;
						$this->txtQuantity->Enabled = true;
					}
					else {
						$this->txtNewInventoryModelCode->Warning = 'There is no inventory for that inventory code';
						$this->lstSourceLocation->Enabled = false;
						$this->txtQuantity->Enabled = false;
					}
				}
				else {
					$this->txtNewInventoryModelCode->Warning = 'That is not a valid inventory code.';
				}
			}
			else {
				$this->txtNewInventoryModelCode->Warning = 'Please enter an inventory code.';
			}
		}

		// Add Inventory Button Click
		public function btnAddInventory_Click($strFormId, $strControlId, $strParameter) {

			$blnError = false;
			$this->txtQuantity->Warning = '';
			$this->txtNewInventoryModelCode->Warning = '';
			// Assign the values from the user submitted form input
			$intNewInventoryLocationId = $this->lstSourceLocation->SelectedValue;
			$intTransactionQuantity = $this->txtQuantity->Text;

			if ($intNewInventoryLocationId) {
				// Begin error checking
				if ($this->objInventoryTransactionArray) {
					foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
						if ($objInventoryTransaction && $objInventoryTransaction->InventoryLocation->InventoryLocationId == $intNewInventoryLocationId) {
							$blnError = true;
							$this->txtNewInventoryModelCode->Warning = "That Inventory has already been added.";
						}
					}
				}
				if (!$blnError) {
					$objNewInventoryLocation = InventoryLocation::LoadLocations($intNewInventoryLocationId);
					// This should not be possible because the list is populated with existing InventoryLocations
					if (!($objNewInventoryLocation instanceof InventoryLocation)) {
						$this->txtNewInventoryModelCode->Warning = "That Inventory location does not exist.";
						$blnError = true;
					}
					elseif (!$intTransactionQuantity || !ctype_digit($intTransactionQuantity) || $intTransactionQuantity <= 0) {
						$this->txtQuantity->Warning = "That is not a valid quantity.";
						$blnError = true;
					}
					elseif ($objNewInventoryLocation->Quantity < $intTransactionQuantity) {
						$this->txtQuantity->Warning = "Quantity shipped cannot exceed quantity available.";
						$blnError = true;
					}
					elseif (!QApplication::AuthorizeEntityBoolean($objNewInventoryLocation->InventoryModel, 2)) {
						$blnError = true;
						$this->txtQuantity->Warning = "You do not have authorization to perform a transaction on this inventory model.";
					}

					// Check to see if that InventoryLocation has some quantity scheduled for shipment
					// If so, make sure that there is enough inventory available to add the new quantity.
					// This can be made faster by making a more targeted SQL query
					/*else {
						$objExpansionMap[InventoryTransaction::ExpandTransaction] = true;
						$objInventoryTransactionArray = InventoryTransaction::LoadArrayByInventoryLocationId($objNewInventoryLocation->InventoryLocationId, null, null, $objExpansionMap);
						if ($objInventoryTransactionArray) {
							$intQuantityScheduled = 0;
							foreach ($objInventoryTransactionArray as $objInventoryTransaction) {
								// If there is a pending shipment
								if ($objInventoryTransaction->Transaction->TransactionTypeId == 6) {

									$objShipment = Shipment::LoadByTransactionId($objInventoryTransaction->TransactionId);
									if ($objShipment && !$objShipment->ShippedFlag) {
										$intQuantityScheduled += $objInventoryTransaction->Quantity;
									}
								}
							}
							if ($intTransactionQuantity > ($objNewInventoryLocation->Quantity - $intQuantityScheduled)) {
								$blnError = true;
								$this->txtNewInventoryModelCode->Warning = sprintf("That inventory has %s units already scheduled for shipment. Not enough available inventory.", $intQuantityScheduled);
							}
						}
					}*/
					$this->dtgInventoryTransact->Refresh();
				}
			}
			else {
				$this->txtNewInventoryModelCode->Warning = "Please select a source location.";
				$blnError = true;
			}

			if (!$blnError && $objNewInventoryLocation instanceof InventoryLocation)  {
				$objInventoryTransaction = new InventoryTransaction();
				$objInventoryTransaction->InventoryLocationId = $objNewInventoryLocation->InventoryLocationId;
				// $objInventoryTransaction->InventoryLocation = $objNewInventoryLocation;
				$objInventoryTransaction->Quantity = $intTransactionQuantity;
				$objInventoryTransaction->SourceLocationId = $objNewInventoryLocation->LocationId;
				$this->objInventoryTransactionArray[] = $objInventoryTransaction;
				$this->txtNewInventoryModelCode->Text = null;
				$this->lstSourceLocation->SelectedIndex = 0;
				$this->txtQuantity->Text = null;
				$this->lstSourceLocation->Enabled = false;
				$this->txtQuantity->Enabled = false;
				$this->blnModifyInventory = true;
			}
		}

		// Save 'Complete Shipment' fields and mark ShippedFlag as true
		protected function btnCompleteShipment_Click($strFormId, $strControlId, $strParameter) {

			$blnError = false;

			if ($this->objAssetTransactionArray && $this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::AssetInventory;
			}
			elseif ($this->objAssetTransactionArray) {
				$intEntityQtypeId = EntityQtype::Asset;
			}
			elseif ($this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::Inventory;
			}
			else {
				$blnError = true;
				$this->btnCompleteShipment->Warning = 'There are no assets or inventory in this shipment.';
			}

			if($this->objAssetTransactionArray){
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					if ($objAssetTransaction->Asset instanceof Asset) {
						$arrAssetTransactions = AssetTransaction::LoadArrayByAssetId($objAssetTransaction->Asset->AssetId,
						                                                             array(QQ::OrderBy(QQN::AssetTransaction()->CreationDate,false)));
						if (count($arrAssetTransactions)>0){
							$intLastTransactionId = $arrAssetTransactions[0]->TransactionId;
							$transaction = Transaction::load($intLastTransactionId);
							if($transaction->TransactionTypeId == 6 && $transaction->Shipment->ShippedFlag){
								$blnError = true;
								$this->btnCompleteShipment->Warning = $objAssetTransaction->Asset->__toStringWithLink() . ' already shipped.';
							}
						}
					}
				}
			}

			if (!$blnError) {

				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();

					if (!$this->blnEditMode) {
						// this is a new shipment so save the transaction & shipment before completing

						// Create the new transaction object and save it
						$this->objTransaction = new Transaction();
						$this->objTransaction->EntityQtypeId = $intEntityQtypeId;
						$this->objTransaction->TransactionTypeId = 6;
						$this->objTransaction->Note = $this->txtNote->Text;
						$this->objTransaction->Save();

						$this->UpdateShipmentFields();
						$this->objShipment->Save(true);

						if ($this->arrCustomFields) {
							// Save the values from all of the custom field controls to save the shipment
							CustomField::SaveControls($this->objShipment->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objShipment->ShipmentId, 10);
						}

					}

					if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Asset) {

						$objTransaction = '';
						$objReceipt = '';
            $objNewAssetTransactionArray = array();
            foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
							$objNewAssetTransactionArray[$objAssetTransaction->Asset->AssetCode] = $objAssetTransaction;
						}
            // Create receipt transaction for internal shipment
            if($this->objShipment->ToCompanyId == $this->objShipment->FromCompanyId){
              $this->receiveInternalShipmentTransaction = new Transaction();
              $this->receiveInternalShipmentTransaction->EntityQtypeId = EntityQtype::Asset;
              $this->receiveInternalShipmentTransaction->TransactionTypeId = 7;
              $note = sprintf('This receipt was automatically created when creating internal shipment Number %s. ',  $this->objShipment->ShipmentNumber);
              $this->receiveInternalShipmentTransaction->Note = $note . $this->txtNote->Text;
              $this->receiveInternalShipmentTransaction->Save();
              // Create a new receipt
              $objInternalReceipt = new Receipt();
              $objInternalReceipt->TransactionId = $this->receiveInternalShipmentTransaction->TransactionId;
             // The receipt will mimic the shipment information
              $objInternalReceipt->FromCompanyId = $this->objShipment->FromCompanyId;
              $objInternalReceipt->FromContactId = $this->objShipment->FromContactId;
              $objInternalReceipt->ToContactId = $this->objShipment->ToContactId;
              $objInternalReceipt->ToAddressId = $this->objShipment->ToAddressId;
              $objInternalReceipt->ReceivedFlag = 0;
              $objInternalReceipt->ReceiptNumber = Receipt::LoadNewReceiptNumber();
              $objInternalReceipt->Save();
            }
						// Assign a destinationLocation to the AssetTransaction, and change the Location of the asset
						foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
							if ($objAssetTransaction->Asset instanceof Asset) {

								// LocationId #2 == Shipped
								$DestinationLocationId = 2;

								if ($objAssetTransaction->ScheduleReceiptFlag && $objAssetTransaction->Asset->LinkedFlag) {
								  $objAssetTransaction = $objNewAssetTransactionArray[$objAssetTransaction->Asset->AssetCode];
								}

								$objAssetTransaction->Asset->LocationId = $DestinationLocationId;
								$objAssetTransaction->Asset->Save();
								if (!$this->blnEditMode) {
									// Assign the TransactionId
									$objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
								}
								$objAssetTransaction->DestinationLocationId = $DestinationLocationId;

								// No any actions with linked items (LinkedFlag = 1) which have been scheduled for receipt
								if ($objAssetTransaction->ScheduleReceiptFlag && !$objAssetTransaction->Asset->LinkedFlag){
									if ($objAssetTransaction->NewAsset && $objAssetTransaction->NewAsset instanceof Asset && $objAssetTransaction->NewAsset->AssetId == null) {
										// We have to create the new asset before we can
										$objReceiptAsset = new Asset();
										$objReceiptAsset->AssetModelId = $objAssetTransaction->NewAsset->AssetModelId;
										$objReceiptAsset->LocationId = $objAssetTransaction->NewAsset->LocationId;
										if ($objAssetTransaction->NewAsset->AssetCode == '') {
											$objReceiptAsset->AssetCode = Asset::GenerateAssetCode();
										}
										else {
											$objReceiptAsset->AssetCode = $objAssetTransaction->NewAsset->AssetCode;
										}
										$objReceiptAsset->Save();

										// Assign any default custom field values
										CustomField::AssignNewEntityDefaultValues(1, $objReceiptAsset->AssetId);

										// Associate the new Asset with the AssetTransaction
										$objAssetTransaction->NewAsset = $objReceiptAsset;
									}

									// If it doesn't exist, create a new transaction object and receipt object
									if (!($objTransaction instanceof Transaction) && !($objReceipt instanceof Receipt)) {
										$objTransaction = new Transaction();
										// Transaction is asset only
										$objTransaction->EntityQtypeId = 1;
										// Transaction is a receipt
										$objTransaction->TransactionTypeId = 7;
										// Set a note showing how this receipt was created
										if (!$objAssetTransaction->NewAssetId) {
											$strTransactionType = 'return';
										}
										else {
											$strTransactionType = 'exchange';
										}
										$objTransaction->Note = sprintf('This %s receipt was automatically created when creating Shipment Number %s.', $strTransactionType, $this->objShipment->ShipmentNumber);
										// Save the transaction
										$objTransaction->Save();
										// Create a new receipt
										$objReceipt = new Receipt();
										$objReceipt->TransactionId = $objTransaction->TransactionId;
										// The receipt will be coming from the company that was shipped to
										$objReceipt->FromCompanyId = $this->objShipment->ToCompanyId;
										$objReceipt->FromContactId = $this->objShipment->ToContactId;
										$objReceipt->ToContactId = $this->objShipment->FromContactId;
										$objReceipt->ToAddressId = $this->objShipment->FromAddressId;
										$objReceipt->ReceivedFlag = 0;
										$objReceipt->ReceiptNumber = Receipt::LoadNewReceiptNumber();
										if ($objAssetTransaction->ScheduleReceiptDueDate) {
											$objReceipt->DueDate = $objAssetTransaction->ScheduleReceiptDueDate;
										}

										$objReceipt->Save();
									}

									$objReceiptAssetTransaction = new AssetTransaction();
									// If this is a return
									if (!$objAssetTransaction->NewAssetId) {
										$objReceiptAssetTransaction->AssetId = $objAssetTransaction->AssetId;
									}
									// If this is an exchange
									else {
										// Both the shipmentAssetTranscation (objAssetTransaction and the objReceiptAssetTransaction were involved in creating a new asset
										// Asset Transactions where NewAssetFlag = true but AssetId is NULL are receipt asset transactions for exchanges.
										$objReceiptAssetTransaction->AssetId = $objAssetTransaction->NewAssetId;
										$objReceiptAssetTransaction->NewAssetFlag = true;
										$objAssetTransaction->NewAssetFlag = true;
										$objAssetTransaction->Save();
									}
									$objReceiptAssetTransaction->TransactionId = $objTransaction->TransactionId;
									$objReceiptAssetTransaction->SourceLocationId = $objAssetTransaction->DestinationLocationId;
									// This is not right. NewAssetFlag should be set only if a new asset was created when creating this AssetTransaction
									// It should not be true on the new AssetTransaction, but only on the AssetTransaction that caused the new asset to be created.
									// $objReceiptAssetTransaction->NewAssetFlag = true;
									$objReceiptAssetTransaction->Save();

									// Load all child assets
									if ($objLinkedAssetCodeArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId)) {
									  foreach ($objLinkedAssetCodeArray as $objLinkedAssetCode) {
									    $objLinkedAssetTransaction = $objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode];
									    $objLinkedReceiptAssetTransaction = new AssetTransaction();
									    // If this is a return
									    if (!$objAssetTransaction->NewAssetId) {
									        $objLinkedReceiptAssetTransaction->AssetId = $objLinkedAssetTransaction->AssetId;
									        $objLinkedReceiptAssetTransaction->TransactionId = $objTransaction->TransactionId;
    									    $objLinkedReceiptAssetTransaction->SourceLocationId = $objAssetTransaction->DestinationLocationId;
    									    $objLinkedReceiptAssetTransaction->Save();
									    }
									    // If this is an exchange
									    else {
                        // Both the shipmentAssetTranscation (objAssetTransaction and the objReceiptAssetTransaction were involved in creating a new asset
    										// Asset Transactions where NewAssetFlag = true but AssetId is NULL are receipt asset transactions for exchanges.
    										$objLinkedReceiptAssetTransaction->AssetId = $objAssetTransaction->NewAssetId;
									    }
    									$objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode] = $objLinkedAssetTransaction;
									  }
									}

								}
								$objAssetTransaction->Save();

								if ($objAssetTransaction->ScheduleReceiptFlag) {
									// Set the Receipt Asset Transaction as child of the Shipment Asset Transaction
									$objAssetTransaction->AssociateChildAssetTransaction($objReceiptAssetTransaction);
								}
                if(($this->objShipment->ToCompanyId == $this->objShipment->FromCompanyId) && !$objAssetTransaction->Asset->LinkedFlag){
                  $objReceiptAssetTransaction = new AssetTransaction();
									$objReceiptAssetTransaction->AssetId = $objAssetTransaction->AssetId;
									$objReceiptAssetTransaction->TransactionId = $this->receiveInternalShipmentTransaction->TransactionId;
                  $objReceiptAssetTransaction->SourceLocationId = $objAssetTransaction->SourceLocationId;
                  $objReceiptAssetTransaction->Save();
                   // Load all child assets
									if ($objLinkedAssetCodeArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId)) {
									  foreach ($objLinkedAssetCodeArray as $objLinkedAssetCode) {
									    $objLinkedAssetTransaction = $objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode];
									    $objLinkedReceiptAssetTransaction = new AssetTransaction();
									    // add data to linked asset
									    $objLinkedReceiptAssetTransaction->AssetId = $objLinkedAssetTransaction->AssetId;
									    $objLinkedReceiptAssetTransaction->TransactionId = $this->receiveInternalShipmentTransaction->TransactionId;
    									$objLinkedReceiptAssetTransaction->SourceLocationId = $objAssetTransaction->SourceLocationId;
    									$objLinkedReceiptAssetTransaction->Save();

									  }
									}
                }

								$objReceipt = null;
								$objTransaction = null;
							}
						}
					}

					if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Inventory) {
						// Assign different source and destinations depending on transaction type

						foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {

							// LocationId #2 == Shipped
							$DestinationLocationId = 2;

							if (!$this->blnEditMode) {
								$objInventoryTransaction->TransactionId = $this->objTransaction->TransactionId;
							}


							// Remove the inventory quantity from the source
							$objInventoryTransaction->InventoryLocation->Quantity = $objInventoryTransaction->InventoryLocation->Quantity - $objInventoryTransaction->Quantity;
							$objInventoryTransaction->InventoryLocation->Save();

							// Finish the InventoryTransaction and save it
							$objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
							$objInventoryTransaction->Save();
						}
					}

					if ($this->blnEditMode) {
						$this->UpdateShipmentFields();
					}

					$this->objShipment->ShippedFlag = true;
					// $this->objShipment->Save(false, true);
					$this->objShipment->Save();
					$objDatabase->TransactionCommit();

					QApplication::Redirect(sprintf('../shipping/shipment_edit.php?intShipmentId=%s', $this->objShipment->ShipmentId));
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					$objDatabase->TransactionRollback();

					if ($objExc->Class == 'Shipment') {
						$this->btnCancelShipment->Warning = sprintf('This shipment has been modified by another user. You must <a href="shipment_edit.php?intShipmentId=%s">Refresh</a> to complete this shipment.', $this->objShipment->ShipmentId);
					}
					else {
						throw new QOptimisticLockingException($objExc->Class);
					}
				}
			}
		}

		// Cancel/Delete entire incomplete shipment
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$objCustomFieldArray = $this->objShipment->objCustomFieldArray;

			// Just delete the transaction and MySQL CASCADE down to shipment, asset_transaction, and inventory_transaction
			$this->objTransaction = Transaction::Load($this->objShipment->TransactionId);
			$this->objTransaction->Delete();
			// CustomField::DeleteTextValues($objCustomFieldArray);

			QApplication::Redirect('../shipping/shipment_list.php');
		}

		// Cancel/Delete Completed Shipment
		protected function btnCancelCompleteShipment_Click($strFormId, $strControlId, $strParameter) {

			// Determine the entity type(s) of this transaction
			if ($this->objAssetTransactionArray && $this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::AssetInventory;
			}
			elseif ($this->objAssetTransactionArray) {
				$intEntityQtypeId = EntityQtype::Asset;
			}
			elseif ($this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::Inventory;
			}
			else {
				$this->btnCancelCompleteShipment->Warning = 'There are no assets or inventory in this shipment.';
				return;
			}
			try {
				// Get an instance of the database
				$objDatabase = QApplication::$Database[1];
				// Begin a MySQL Transaction to be either committed or rolled back
				$objDatabase->TransactionBegin();

				// Assets
				if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Asset) {
				// Set the DestinationLocation of the AssetTransction to null and set the Asset's location to the SourceLocationId of the Asset Transaction
					foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
						if ($objNewerAssetTransaction = $objAssetTransaction->NewerTransaction()) {
							// If this is an automatically scheduled return receipt, then we just delete it also
							if ($objAssetTransaction->ScheduleReceiptFlag && $objNewerAssetTransaction->DestinationLocationId == null
                  ||$this->objShipment->ToCompanyId == $this->objShipment->FromCompanyId && $objNewerAssetTransaction->DestinationLocationId == null){
								// Delete the unreceived, automatically scheduled receipt
								$objNewerAssetTransaction->Delete();
								// If the receipt is empty (no AssetTransactions and no InventoryTransactions, you also need to delete the transaction here also.
								if ($objNewerAssetTransaction->Transaction->IsEmpty()) {
									$objNewerAssetTransaction->Transaction->Delete();
								}
							}
							// Generate an error
							else {
								$this->btnCancelCompleteShipment->Warning = sprintf('The asset %s has been involved in a transaction since this shipment was completed.', $objAssetTransaction->Asset->AssetCode);
								$objDatabase->TransactionRollback();
								return;
							}
						}

						// If this is an automatically scheduled exchange receipt, then we delete the asset, which will cascade to the asset_transaction as well
						if ($objAssetTransaction->NewAssetFlag && $objAssetTransaction->NewAsset instanceof Asset) {
							$objChildAssetTransactionArray = $objAssetTransaction->GetChildAssetTransactionArray();
							if ($objChildAssetTransactionArray) {
								foreach ($objChildAssetTransactionArray as $objChildAssetTransaction) {
									$objChildAssetTransaction->Asset->Delete();
									if ($objChildAssetTransaction->Transaction->IsEmpty()) {
										$objChildAssetTransaction->Transaction->Delete();
									}
								}
							}
							// The new asset no longer exists
							$objAssetTransaction->NewAssetId = null;
						}

						// Set the destination location to null
						$objAssetTransaction->DestinationLocationId = null;
						$objAssetTransaction->Save();

						// Return the asset to its original location
						$objAssetTransaction->Asset->LocationId = $objAssetTransaction->SourceLocationId;
						$objAssetTransaction->Asset->Save();
					}
				}

				// Inventory
				if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Inventory) {

					// Set the DestinationLocation of the InventoryTransaction to null and add the inventory quantity back to the source
					foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
						// Set the destination location to null
						$objInventoryTransaction->DestinationLocationId = null;
						$objInventoryTransaction->Save();
						// Add the inventory back to it's source location
						$objInventoryTransaction->InventoryLocation->Quantity += $objInventoryTransaction->Quantity;
            $objInventoryTransaction->InventoryLocation->Save();

					}
				}

				// Set the TrackingNumber back to null
				//$this->objShipment->TrackingNumber = null;

				// Set the shipment as pending
				$this->objShipment->ShippedFlag = false;
				$this->objShipment->Save();

				// Commit the transaction to the database
				$objDatabase->TransactionCommit();

				QApplication::Redirect('../shipping/shipment_edit.php?intShipmentId='.$this->objShipment->ShipmentId);
			}
			catch (QExtendedOptimisticLockingException $objExc) {

				// Roll back the database transaction
				$objDatabase->TransactionRollback();

				// Output error message
				if ($objExc->Class == 'Shipment') {
					$this->btnCancelCompleteShipment->Warning = sprintf('This shipment has been modified by another user. You must <a href="shipment_edit.php?intShipmentId=%s">Refresh</a> to edit this shipment.', $this->objShipment->ShipmentId);
				}
				else {
					throw new QOptimisticLockingException($objExc->Class);
				}
			}
		}

		// Save new or existing shipment
		// This does not complete a shipment
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {

			$blnError = false;

			if ($this->objAssetTransactionArray && $this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::AssetInventory;
			}
			elseif ($this->objAssetTransactionArray) {
				$intEntityQtypeId = EntityQtype::Asset;
			}
			elseif ($this->objInventoryTransactionArray) {
				$intEntityQtypeId = EntityQtype::Inventory;
			}
			else {
				$blnError = true;
				$this->btnCancel->Warning = 'There are no assets or inventory in this shipment.';
			}

			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				if ($objShipment = Shipment::LoadByShipmentNumber($this->txtShipmentNumber->Text)) {
					if ($objShipment->ShipmentId != $this->objShipment->ShipmentId) {
						$blnError = true;
						$this->txtShipmentNumber->Warning = 'That is a duplicate shipment number.';
					}
				}
			}

			if (!$blnError) {

				if (!$this->blnEditMode) {

					try {
						// Get an instance of the database
						$objDatabase = QApplication::$Database[1];
						// Begin a MySQL Transaction to be either committed or rolled back
						$objDatabase->TransactionBegin();

						// Create the new transaction object and save it
						$this->objTransaction = new Transaction();
						$this->objTransaction->EntityQtypeId = $intEntityQtypeId;
						$this->objTransaction->TransactionTypeId = 6;
						$this->objTransaction->Note = $this->txtNote->Text;
						$this->objTransaction->Save();

						if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Asset) {
						// Assign different source and destinations depending on transaction type
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								if ($objAssetTransaction->Asset instanceof Asset) {
									// Save the asset just to update the modified_date field so it can trigger an Optimistic Locking Exception when appropriate
									$objAssetTransaction->Asset->Save();
									// Assign the TransactionId
									$objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
									// Create the new asset if it was scheduled for receipt
									if ($objAssetTransaction->ScheduleReceiptFlag && $objAssetTransaction->NewAsset && $objAssetTransaction->NewAsset instanceof Asset) {
										$objReceiptAsset = new Asset();
										$objReceiptAsset->AssetModelId = $objAssetTransaction->NewAsset->AssetModelId;
										$objReceiptAsset->LocationId = $objAssetTransaction->NewAsset->LocationId;
										//if ($objReceiptAsset->AssetCode == '') {
										if ($objAssetTransaction->NewAsset->AssetCode == '') {
											$objReceiptAsset->AssetCode = Asset::GenerateAssetCode();
										}
										else {
											$objReceiptAsset->AssetCode = $objAssetTransaction->NewAsset->AssetCode;
										}
										$objReceiptAsset->Save();

										// Assign any default custom field values
										CustomField::AssignNewEntityDefaultValues(1, $objReceiptAsset->AssetId);

										// Associate the new Asset with the AssetTransaction
										$objAssetTransaction->NewAsset = $objReceiptAsset;
									}
									// $objAssetTransaction->DestinationLocationId = $DestinationLocationId;
									$objAssetTransaction->Save();
									/*$objLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId);
									if ($objLinkedAssetArray) {
									  foreach ($objLinkedAssetArray as $objLinkedAsset) {
									    $objLinkedAssetTransaction = new AssetTransaction();
          						$objLinkedAssetTransaction->AssetId = $objLinkedAsset->AssetId;
          						$objLinkedAssetTransaction->SourceLocationId = $objLinkedAsset->LocationId;
          						$objLinkedAssetTransaction->TransactionId = $objAssetTransaction->TransactionId;
          						$objLinkedAssetTransaction->Save();
									  }
									}*/
								}
							}
						}

						if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Inventory) {
							// Assign different source and destinations depending on transaction type
							foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
								// Save the inventory location just to update the modified_date field so it can triggern an Optimistic Locking Exception when appropriate
								$objInventoryTransaction->InventoryLocation->Save();
								// Assign the TransactionId
								$objInventoryTransaction->TransactionId = $this->objTransaction->TransactionId;
								// $objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
								$objInventoryTransaction->Save();
							}
						}

						$this->UpdateShipmentFields();
						$this->objShipment->ShippedFlag = false;
						$this->objShipment->Save();

						if ($this->arrCustomFields) {
							// Save the values from all of the custom field controls to save the shipment
							CustomField::SaveControls($this->objShipment->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objShipment->ShipmentId, 10);
						}

						$objDatabase->TransactionCommit();
						QApplication::Redirect('shipment_list.php');
					}
					catch (QExtendedOptimisticLockingException $objExc) {

						// Rollback the database
						$objDatabase->TransactionRollback();

						if ($objExc->Class == 'Asset') {
							// $this->btnRemoveAssetTransaction_Click($this->FormId, 'btnRemoveAsset' . $objExc->EntityId, $objExc->EntityId);
							$this->btnRemoveAssetTransaction_Click($this->FormId, null, $objExc->EntityId);
							$objAsset = Asset::Load($objExc->EntityId);
							if ($objAsset) {
								$this->btnCancel->Warning = sprintf('The Asset %s has been modified by another user and removed from this shipment. You may add the asset again or save the transaction without it.', $objAsset->AssetCode);
							}
							else {
								$this->btnCancel->Warning = 'An Asset has been deleted by another user and removed from this shipment.';
							}
						}
						if ($objExc->Class == 'InventoryLocation') {
							$this->btnRemoveInventory_Click($this->FormId, 'btnRemoveInventory' . $objExc->EntityId, $objExc->EntityId);
							$objInventoryLocation = InventoryLocation::Load($objExc->EntityId);
							if ($objInventoryLocation) {
								$this->btnCancel->Warning = sprintf('The Inventory %s has been modified by another user and removed from this shipment. You may add the inventory again or save the shipment without it.', $objInventoryLocation->InventoryModel->InventoryModelCode);
							}
							else {
								$this->btnCancel->Warning = 'Inventory has been deleted by another user and removed from this shipment.';
							}
						}
					}
				}
				elseif ($this->blnEditMode) {

					try {
						// Get an instance of the database
						$objDatabase = QApplication::$Database[1];
						// Begin a MySQL Transaction to be either committed or rolled back
						$objDatabase->TransactionBegin();

						$this->objTransaction = Transaction::Load($this->objShipment->TransactionId);
						$this->objTransaction->EntityQtypeId = $intEntityQtypeId;
						$this->objTransaction->Note = $this->txtNote->Text;
						$this->objTransaction->Save();

						// Remove AssetTransactions that were removed when editing
						if ($this->arrAssetTransactionToDelete) {
							foreach ($this->arrAssetTransactionToDelete as $intAssetTransactionId) {
								$objAssetTransactionToDelete = AssetTransaction::Load($intAssetTransactionId);
								// Make sure that it wasn't added and then removed
								if ($objAssetTransactionToDelete) {
									// Change back location
									$objAssetTransactionToDelete->Asset->LocationId = $objAssetTransactionToDelete->SourceLocationId;
									$objAssetTransactionToDelete->Asset->Save();
									// Delete the asset that was created for a new receipt
									if ($objAssetTransactionToDelete->NewAsset && $objAssetTransactionToDelete->NewAsset instanceof Asset && $objAssetTransactionToDelete->ScheduleReceiptFlag) {
										$objAssetTransactionToDelete->NewAsset->Delete();
									}
									// Delete the asset transaction
									$objAssetTransactionToDelete->Delete();
									unset($objAssetTransactionToDelete);
								}
							}
						}

						// Save new AssetTransactions
						if ($this->objAssetTransactionArray) {
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								// If the AssetTransaction has not been saved
								if (!$objAssetTransaction->AssetTransactionId) {
									$objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
									// Save the asset just to update the modified_date field so it can trigger an Optimistic Locking Exception when appropriate
									$objAssetTransaction->Asset->Save();
									// Create the new asset if it was scheduled for receipt
									// $DestinationLocationId = 2; // Shipped
									// $objAssetTransaction->DestinationLocationId = $DestinationLocationId;
									// $objAssetTransaction->Asset->LocationId = $DestinationLocationId;
									// $objAssetTransaction->Asset->Save();
								}

								if ($objAssetTransaction->ScheduleReceiptFlag && $objAssetTransaction->NewAsset && $objAssetTransaction->NewAsset instanceof Asset && !$objAssetTransaction->NewAssetId) {
									$objReceiptAsset = new Asset();
									$objReceiptAsset->AssetModelId = $objAssetTransaction->NewAsset->AssetModelId;
									$objReceiptAsset->LocationId = $objAssetTransaction->NewAsset->LocationId;
									if ($objAssetTransaction->NewAsset->AssetCode == '') {
										$objReceiptAsset->AssetCode = Asset::GenerateAssetCode();
									}
									else {
										$objReceiptAsset->AssetCode = $objAssetTransaction->NewAsset->AssetCode;
									}
									$objReceiptAsset->Save();

									// Assign any default custom field values
									CustomField::AssignNewEntityDefaultValues(1, $objReceiptAsset->AssetId);

									// Associate the new Asset with the AssetTransaction
									$objAssetTransaction->NewAsset = $objReceiptAsset;
								}

								$objAssetTransaction->Save();
							}
						}

						// Remove InventoryTransactions
						if ($this->arrInventoryTransactionToDelete) {
							foreach ($this->arrInventoryTransactionToDelete as $intInventoryTransactionId) {
								$objInventoryTransactionToDelete = InventoryTransaction::Load($intInventoryTransactionId);
								// Make sure that it wasn't added then removed
								if ($objInventoryTransactionToDelete) {
									// Change back the quantity
									//$objInventoryTransactionToDelete->InventoryLocation->Quantity += $objInventoryTransactionToDelete->Quantity;
									//$objInventoryTransactionToDelete->InventoryLocation->Save();
									// Delete the InventoryTransaction
									$objInventoryTransactionToDelete->Delete();
									unset($objInventoryTransactionToDelete);
								}
							}
						}

						// Save InventoryTransactions
						if ($this->objInventoryTransactionArray) {
							foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
								if (!$objInventoryTransaction->InventoryTransactionId) {
									// Reload the InventoryLocation. If it was deleted and added in the same save click, then it will throw an Optimistic Locking Exception
									$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
									$objInventoryTransaction->TransactionId = $this->objTransaction->TransactionId;
									// Save the inventory location just to update the modified_date field so it can triggern an Optimistic Locking Exception when appropriate
									$objInventoryTransaction->InventoryLocation->Save();
									// $DestinationLocationId = 2; // Shipped
									// $objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
									// $objInventoryTransaction->InventoryLocation->Quantity -= $objInventoryTransaction->Quantity;
									// $objInventoryTransaction->InventoryLocation->Save();
									$objInventoryTransaction->Save();
								}
							}
						}

						$this->UpdateShipmentFields();
						// $this->objShipment->Save(false, true);
						$this->objShipment->Save();

						if ($this->arrCustomFields) {
							// Save the values from all of the custom field controls to save the shipment
							CustomField::SaveControls($this->objShipment->objCustomFieldArray, $this->blnEditMode, $this->arrCustomFields, $this->objShipment->ShipmentId, 10);
						}

						$objDatabase->TransactionCommit();
						//$this->UpdateShipmentLabels();
						//$this->SetupShipment();
						//$this->DisplayLabels();
						//$this->txtTrackingNumber->Enabled = true;
						QApplication::Redirect('shipment_edit.php?intShipmentId=' . $this->objShipment->ShipmentId);

					}
					catch (QExtendedOptimisticLockingException $objExc) {

						$objDatabase->TransactionRollback();

						if ($objExc->Class == 'Shipment') {
							$this->btnCancel->Warning = sprintf('This shipment has been modified by another user. You must <a href="shipment_edit.php?intShipmentId=%s">Refresh</a> to edit this shipment.', $this->objShipment->ShipmentId);
						}
						// This shouldn't be possible. What if they are on the same shipment?
						elseif ($objExc->Class == 'Asset') {
							//$this->btnRemoveAssetTransaction_Click($this->FormId, 'btnRemoveAsset' . $objExc->EntityId, $objExc->EntityId);
							$this->btnRemoveAssetTransaction_Click($this->FormId, null, $objExc->EntityId);
							$objAsset = Asset::Load($objExc->EntityId);
							if ($objAsset) {
								$this->btnCancel->Warning = sprintf('The Asset %s has been modified by another user and removed from this shipment. You may add the asset again or save the transaction without it.', $objAsset->AssetCode);
							}
							else {
								$this->btnCancel->Warning = 'An Asset has been deleted by another user and removed from this shipment.';
							}
						}
						elseif ($objExc->Class == 'InventoryLocation') {
							$this->btnRemoveInventory_Click($this->FormId, 'btnRemoveInventory' . $objExc->EntityId, $objExc->EntityId);
							$objInventoryLocation = InventoryLocation::Load($objExc->EntityId);
							if ($objInventoryLocation) {
								$this->btnCancel->Warning = sprintf('The Inventory %s has been modified by another user and removed from this shipment. You may add the inventory again or save the shipment without it.', $objInventoryLocation->InventoryModel->InventoryModelCode);
							}
							else {
								$this->btnCancel->Warning = 'Inventory has been deleted by another user and removed from this shipment.';
							}
						}
					}
				}
			}
		}

		// Save Exchange Button Click
		protected function btnSaveExchange_Click($strFormId, $strControlId, $strParameter) {
			$intTempId = $this->dlgExchange->ActionParameter;
			$blnError = false;
			if ($this->chkAutoGenerateAssetCode->Checked) {
				$strAssetCode = '';
				$this->txtReceiptAssetCode->Text = '';
			}
			elseif ($this->txtReceiptAssetCode->Text) {
				$objAsset = Asset::LoadByAssetCode($this->txtReceiptAssetCode->Text);
				if ($objAsset) {
					$blnError = true;
					$this->txtReceiptAssetCode->Warning = 'That asset tag is already in use. Please input another.';
				}
				else {
					$strAssetCode = $this->txtReceiptAssetCode->Text;
				}
			}
			if (!$blnError) {
				if ($this->objAssetTransactionArray) {
					foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
						if ($objAssetTransaction->NewAsset instanceof Asset && $objAssetTransaction->NewAsset->AssetCode == $strAssetCode) {
							$blnError = true;
							$this->txtReceiptAssetCode->Warning = 'That asset tag is already in use. Please input another.';
						}
						if (!$blnError) {
							if ($objAssetTransaction->Asset->TempId == $intTempId) {
								$objAssetTransaction->ScheduleReceiptFlag = true;
								$objAssetTransaction->NewAssetFlag = true;
								$objReceiptAsset = new Asset();
								// AssetId must be set so that it can be assigned to the AssetTransaction
								$objReceiptAsset->AssetId = 0;
								// The new receipt asset will be the same AssetModel as the asset being shipped (but a new asset)
								$objReceiptAsset->AssetModelId = $objAssetTransaction->Asset->AssetModelId;
								// Set Location to TBR
								$objReceiptAsset->LocationId = 5;
								// Set the asset tag to empty so that we'll know to auto generate later
								/*if ($this->chkAutoGenerateAssetCode->Checked) {
									$strAssetCode = '';
									$this->txtReceiptAssetCode->Text = '';
								}
								else {
									$strAssetCode = $this->txtReceiptAssetCode->Text;
								}*/
								$objReceiptAsset->AssetCode = $strAssetCode;
								$objAssetTransaction->NewAsset = $objReceiptAsset;
							}
						}
					}
				}
				if (!$blnError) {
					$this->dlgExchange->ActionParameter = null;
					$this->dlgExchange->HideDialogBox();
				}
			}
		}

		// Cancel Exchange Button Click
		protected function btnCancelExchange_Click($strFormId, $strControlId, $strParameter) {

			$intTempId = $this->dlgExchange->ActionParameter;
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					if ($objAssetTransaction->Asset->TempId == $intTempId) {
						$objAssetTransaction->ScheduleReceiptFlag = false;
						$objAssetTransaction->NewAssetFlag = false;
						$objAssetTransaction->NewAsset = null;
						$lblDueDate = $this->GetControl('lblDueDate' . $intTempId);
						$lblDueDate->Visible = false;
					}
				}
			}

			$this->dlgExchange->ActionParameter = null;
			$this->dlgExchange->HideDialogBox();
			$this->dtpScheduleReceiptDueDate->DateTime = null;
		}

		// Save Due Date Button Click
		protected function btnSaveDueDate_Click($strFormId, $strControlId, $strParameter) {
			$intTempId = $this->dlgDueDate->ActionParameter;
			$lblDueDate = $this->GetControl('lblDueDate' . $intTempId);
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					if ($objAssetTransaction->Asset->TempId == $intTempId) {
						$objAssetTransaction->ScheduleReceiptDueDate = $this->dtpScheduleReceiptDueDate->DateTime;
						$lblDueDate->Text = $objAssetTransaction->ScheduleReceiptDueDate->__toString();
					}
				}
			}
			$this->blnModifyAssets = true;

			$this->dlgDueDate->HideDialogBox();
			$this->dlgDueDate->ActionParameter = null;
			$this->dtpScheduleReceiptDueDate->DateTime = null;

		}

		// Cancel Due Date Button Click
		protected function btnCancelDueDate_Click($strFormId, $strControlId, $strParameter) {

			$this->dlgDueDate->HideDialogBox();
			$this->blnModifyAssets = true;
			$this->dtpScheduleReceiptDueDate->DateTime = null;
		}

		// This method triggers if the Advanced label gets clicked. It shows or hides the advanced fields for scheduling receipts
		protected function lblAdvanced_Click($strFormId, $strControlId, $strParameter) {
			if ($this->lblAdvanced->Text == 'Show Advanced') {
				$this->chkScheduleReceipt->Display = true;
				$this->rblAssetType->Display = true;
				if ($this->rblAssetType->SelectedValue == 'new') {
					$this->txtReceiptAssetCode->Display = true;
					if (QApplication::$TracmorSettings->MinAssetCode) {
						$this->chkAutoGenerateAssetCode->Display = true;
					}
				}
				$this->lblAdvanced->Text = 'Hide Advanced';
			}
			elseif ($this->lblAdvanced->Text == 'Hide Advanced') {
				$this->chkScheduleReceipt->Display = false;
				$this->rblAssetType->Display = false;
				$this->txtReceiptAssetCode->Display = false;
				$this->chkAutoGenerateAssetCode->Display = false;
				$this->lblAdvanced->Text = 'Show Advanced';
			}
		}

		// This method triggers when the Schedule Receipt checkbox gets clicked
		protected function chkScheduleReceipt_Click($strFormId, $strControlId, $strParameter) {
			if ($this->chkScheduleReceipt->Checked) {
				$this->rblAssetType->Enabled = true;
				$this->txtReceiptAssetCode->Enabled = true;
				$this->chkAutoGenerateAssetCode->Enabled = true;
			}
			else {
				$this->rblAssetType->Enabled = false;
				$this->txtReceiptAssetCode->Enabled = false;
				$this->chkAutoGenerateAssetCode->Enabled = false;
			}
		}

		//*****************
		// CUSTOM METHODS
		//*****************

		// Protected Update Methods
		// This assigns the new values to the Shipment Object
		protected function UpdateShipmentFields() {
			if (!$this->blnEditMode) {
				//$this->objShipment->TransactionId = $this->objTransaction->TransactionId;
				$this->objShipment->Transaction = $this->objTransaction;
			}

			if ($this->blnEditMode) {
				if (!$this->objTransaction) {
					$this->objTransaction = Transaction::Load($this->objShipment->TransactionId);
				}
				$this->objShipment->Transaction = $this->objTransaction;
				$this->objShipment->ShipmentNumber = $this->lblShipmentNumber->Text;
			}
			elseif (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->objShipment->ShipmentNumber = $this->txtShipmentNumber->Text;
			}
			else {
				$this->objShipment->ShipmentNumber = Shipment::LoadNewShipmentNumber();
			}
			$this->objShipment->ToContactId = $this->lstToContact->SelectedValue;
			$this->objShipment->FromCompanyId = $this->lstFromCompany->SelectedValue;
			$this->objShipment->FromContactId = $this->lstFromContact->SelectedValue;
			$this->objShipment->ShipDate = $this->calShipDate->DateTime;
			$this->objShipment->FromAddressId = $this->lstFromAddress->SelectedValue;
			$this->objShipment->ToCompanyId = $this->lstToCompany->SelectedValue;
			$this->objShipment->ToAddressId = $this->lstToAddress->SelectedValue;
			$this->objShipment->CourierId = $this->lstCourier->SelectedValue;
			//if (!$this->lstCourier->SelectedValue) {
				$this->objShipment->TrackingNumber = $this->txtTrackingNumber->Text;
			//}

			// Reload the Assets and inventory locations so that they don't trigger an OLE if completing the shipment without reloading after adding an asset or inventory.
			if ($this->objAssetTransactionArray) {
				foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
					$objAssetTransaction->Asset = Asset::Load($objAssetTransaction->AssetId);
				}
			}
			if ($this->objInventoryTransactionArray) {
				foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
					$objInventoryTransaction->InventoryLocation = InventoryLocation::Load($objInventoryTransaction->InventoryLocationId);
				}
			}
		}

		// This resets control values when Cancel is clicked
		protected function UpdateShipmentControls() {
			$this->lstToContact->SelectedValue = $this->objShipment->ToContactId;
			//$this->lstToContact_Select();
			$this->lstFromCompany->SelectedValue = $this->objShipment->FromCompanyId;
			$this->lstFromContact->SelectedValue = $this->objShipment->FromContactId;
			$this->calShipDate->DateTime = $this->objShipment->ShipDate;
			$this->lstFromAddress->SelectedValue = $this->objShipment->FromAddressId;
			$this->lstToCompany->SelectedValue = $this->objShipment->ToCompanyId;
			$this->lstToCompany_Select();
			$this->lstToAddress->SelectedValue = $this->objShipment->ToAddressId;
			$this->lstToAddress_Select();
			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->txtShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			}
			$this->lstCourier->SelectedValue = $this->objShipment->CourierId;
			$this->txtTrackingNumber->Text = $this->objShipment->TrackingNumber;
			$this->txtNote->Text = $this->objShipment->Transaction->Note;
			$this->arrCustomFields = CustomField::UpdateControls($this->objShipment->objCustomFieldArray, $this->arrCustomFields);
		}

		protected function DisplayLabels() {

			// Hide Inputs
			$this->calShipDate->Display = false;
			$this->lstFromCompany->Display = false;
			$this->lstFromContact->Display = false;
			$this->lstFromAddress->Display = false;
			$this->lstToCompany->Display = false;
			$this->lstToContact->Display = false;
			$this->lstToAddress->Display = false;
			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->txtShipmentNumber->Display = false;
			}
			$this->lstCourier->Display = false;
			$this->txtNote->Display = false;
			$this->txtTrackingNumber->Display = false;
			$this->txtNewAssetCode->Display = false;
			$this->btnAddAsset->Display = false;
			$this->lblAddAsset->Display = false;
			$this->btnLookup->Display = false;
			$this->lblLookup->Display = false;
			$this->btnAddInventory->Display = false;
			$this->txtNewInventoryModelCode->Display = false;
			$this->lstSourceLocation->Display = false;
			$this->txtQuantity->Display = false;
			$this->lblNewFromCompany->Display = false;
			$this->lblNewFromContact->Display = false;
			$this->lblNewFromAddress->Display = false;
			$this->lblNewToCompany->Display = false;
			$this->lblNewToContact->Display = false;
			$this->lblNewToAddress->Display = false;

/*			if ($this->lblAdvanced->Text == 'Hide Advanced') {
				$this->lblAdvanced_Click($this->FormId, $this->lblAdvanced->ControlId, null);
			}*/

			if (!$this->objShipment->ShippedFlag) {
				//$this->lblAdvanced->Display = false;
				$this->btnCancelCompleteShipment->Display = false;
			}
			else {
				$this->btnCancelCompleteShipment->Display = true;
			}

			$this->btnSave->Display = false;
			$this->btnCancel->Display = false;

			if ($this->blnEditMode) {

				$this->dtgAssetTransact->RemoveColumnByName('Action');
				$this->dtgInventoryTransact->RemoveColumnByName('Action');
				$this->dtgAssetTransact->RemoveColumnByName('Advanced');
				$this->dtgAssetTransact->RemoveColumnByName('Due Date');
			}

			// Display Labels
			$this->lblShipDate->Display = true;
			$this->lblFromCompany->Display = true;
			$this->lblFromContact->Display = true;
			$this->lblFromAddress->Display = true;
			$this->lblFromAddressFull->Display = true;
			$this->lblToCompany->Display = true;
			$this->lblToContact->Display = true;
			$this->lblToAddress->Display = true;
			$this->lblToAddressFull->Display = true;
			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->lblShipmentNumber->Display = true;
			}
			$this->lblCourier->Display = true;
			$this->pnlNote->Display = true;
			$this->lblTrackingNumber->Display = true;

			if ($this->arrCustomFields) {
				CustomField::DisplayLabels($this->arrCustomFields);
			}

			//if (!$this->objShipment->ShippedFlag) {
			$this->btnEdit->Display = true;
			//}
			$this->atcAttach->btnUpload->Display = true;

			// This is not necessary, because this method is only being called in EditMode
			if ($this->blnEditMode) {
				$this->btnCompleteShipment->Enabled = true;
			}
		}

		// Update the 'Text' values for all shipment labels for an ajax reload
		protected function UpdateShipmentLabels() {
			$this->lblShipDate->Text = $this->objShipment->ShipDate->__toString();
			$this->lblFromCompany->Text = $this->objShipment->FromCompany->__toStringWithLink();
			$this->lblFromContact->Text = $this->objShipment->FromContact->__toStringWithLink();
			$this->lblFromAddress->Text = $this->objShipment->FromAddress->__toStringWithLink();
			$this->lblToCompany->Text = $this->objShipment->ToCompany->__toStringWithLink();
			$this->lblToContact->Text = $this->objShipment->ToContact->__toStringWithLink();
			$this->lblToAddress->Text = $this->objShipment->ToAddress->__toStringWithLink();
			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->lblShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			}
			$this->lblCourier->Text = ($this->objShipment->CourierId) ? $this->objShipment->Courier->__toString() : "Other";
			$this->lblTrackingNumber->Text = $this->objShipment->__toStringTrackingNumber();
			$this->pnlNote->Text = nl2br($this->objShipment->Transaction->Note);

			if ($this->arrCustomFields) {
				CustomField::UpdateLabels($this->arrCustomFields);
			}

		}

		protected function DisplayInputs() {

			// Hide Labels
			$this->lblShipDate->Display = false;
			$this->lblFromCompany->Display = false;
			$this->lblFromContact->Display = false;
			$this->lblFromAddress->Display = false;
			$this->lblToCompany->Display = false;
			$this->lblToContact->Display = false;
			$this->lblToAddress->Display = false;
			if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
				$this->lblShipmentNumber->Display = false;
			}
			$this->lblCourier->Display = false;
			$this->pnlNote->Display = false;
			$this->lblTrackingNumber->Display = false;


			if (!$this->objShipment->ShippedFlag) {
				$this->calShipDate->Display = true;
				$this->lstFromCompany->Display = true;
				$this->lstFromContact->Display = true;
				$this->lstFromAddress->Display = true;
				$this->lstToCompany->Display = true;
				$this->lstToContact->Display = true;
				$this->lstToAddress->Display = true;


				if (QApplication::$TracmorSettings->CustomShipmentNumbers) {
					$this->txtShipmentNumber->Display = true;
				}

				$this->lstCourier->Display = true;
				$this->txtTrackingNumber->Display = true;
				$this->txtNewAssetCode->Display = true;
				//$this->lblAdvanced->Display = true;
				$this->btnAddAsset->Display = true;
				$this->lblAddAsset->Display = true;
				$this->txtNewInventoryModelCode->Display = true;
				$this->btnLookup->Display = true;
				$this->lblLookup->Display = true;
				$this->lstSourceLocation->Display = true;
				$this->txtQuantity->Display = true;
				$this->btnAddInventory->Display = true;

    			$this->lblNewFromCompany->Display = true;
				$this->lblNewFromContact->Display = true;
				$this->lblNewFromAddress->Display = true;
				$this->lblNewToCompany->Display = true;
				$this->lblNewToContact->Display = true;
				$this->lblNewToAddress->Display = true;

			}

			if ($this->blnEditMode) {
	    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveAssetColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    	$this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveInventoryColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
                if($this->lstFromCompany->SelectedValue!=$this->lstToCompany->SelectedValue){
                    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Advanced', '<?= $_FORM->AdvancedColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
                    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Due Date', '<?= $_FORM->DueDateColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
                }
            }

			// If the user is not authorized to edit built-in fields, the fields are render as labels.
			// Also used if editing a completed shipment
			if(!$this->blnEditBuiltInFields || $this->objShipment->ShippedFlag)
				$this->DisplayLabels();

			$this->calShipDate->Display = true;
			$this->lblShipDate->Display = false;
			
			$this->pnlNote->Display = false;
			$this->txtNote->Display = true;
			
			$this->btnEdit->Display = false;
			$this->atcAttach->btnUpload->Display = false;
			$this->btnSave->Display = true;
			$this->btnCancel->Display = true;
			if ($this->blnEditMode) {
				$this->btnCompleteShipment->Enabled = false;
			}

			// Display custom field inputs
	    if ($this->arrCustomFields) {
	    	CustomField::DisplayInputs($this->arrCustomFields);
	    }
		}

		// This method is run when the company edit dialog box is closed
		public function CloseNewPanel($blnUpdates) {
			$this->dlgNew->HideDialogBox();
		}

		public function CloseNewFromCompanyPanel($blnUpdates) {
			$this->lstFromCompany_Select();
			$this->CloseNewPanel($blnUpdates);
		}

		public function CloseNewToCompanyPanel($blnUpdates) {
			$this->lstToCompany_Select();
			$this->CloseNewPanel($blnUpdates);
		}

		public function CloseNewToContactPanel($blnUpdates) {
			$this->lstToContact->Enabled = true;
			//$this->lstToContact_Select();
			$this->CloseNewPanel($blnUpdates);
		}

		public function CloseNewToAddressPanel($blnUpdates) {
			$this->lstToAddress->Enabled = true;
			$this->lstToAddress_Select();
			$this->CloseNewPanel($blnUpdates);
		}
	//Set display logic of the BuiltInFields in View Access and Edit Access
		protected function UpdateBuiltInFields() {
		//Set View Display Logic of Built-In Fields
		$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Shipment,1);
		if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag)
			$this->blnViewBuiltInFields=true;
		else
			$this->blnViewBuiltInFields=false;

		//Set Edit Display Logic of Built-In Fields
		$objRoleEntityQtypeBuiltInAuthorization2= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Shipment,2);
		if($objRoleEntityQtypeBuiltInAuthorization2 && $objRoleEntityQtypeBuiltInAuthorization2->AuthorizedFlag)
			$this->blnEditBuiltInFields=true;
		else
			$this->blnEditBuiltInFields=false;


		}
		//Set display logic for the CustomFields
		protected function UpdateCustomFields(){
			if($this->arrCustomFields)foreach ($this->arrCustomFields as $objCustomField) {

				//In Create Mode, if the role doesn't have edit access for the custom field and the custom field is required, the field shows as a label with the default value
				if (!$this->blnEditMode && !$objCustomField['blnEdit'] && $objCustomField['blnRequired']){
					if ($objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue) $objCustomField['lbl']->Text=$objCustomField['EditAuth']->EntityQtypeCustomField->CustomField->DefaultCustomFieldValue->__toString();
					$objCustomField['lbl']->Display=true;
					$objCustomField['input']->Display=false;
				}
			}

		}
		//Set display logic of the GreenPlusButton of Address
		protected function UpdateAddressAccess() {
			//checks if the entity has edit authorization
			$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Address,2);
			if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
				$this->lblNewFromAddress->Visible=true;
				$this->lblNewToAddress->Visible=true;
			}
			else{
				$this->lblNewFromAddress->Visible=false;
				$this->lblNewToAddress->Visible=false;
			}
	
		}
			//Set display logic of the GreenPlusButton of Company
		protected function UpdateCompanyAccess() {
			//checks if the entity  has edit authorization
			$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Company,2);
			if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
				$this->lblNewFromCompany->Visible=true;
				$this->lblNewToCompany->Visible=true;
			}
			else{
				$this->lblNewFromCompany->Visible=false;
				$this->lblNewToCompany->Visible=false;
			}
	
		}
			//Set display logic of the GreenPlusButton of Contact
		protected function UpdateContactAccess() {
			//checks if the entity  has edit authorization
			$objRoleEntityQtypeBuiltInAuthorization= RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId(QApplication::$objRoleModule->RoleId,EntityQtype::Contact,2);
			if($objRoleEntityQtypeBuiltInAuthorization && $objRoleEntityQtypeBuiltInAuthorization->AuthorizedFlag){
				$this->lblNewFromContact->Visible=true;
				$this->lblNewToContact->Visible=true;
			}
			else{
				$this->lblNewFromContact->Visible=false;
				$this->lblNewToContact->Visible=false;
			}
	
		}
		
	  protected function disableAdvancedIfInternal(){
			if(!$this->lblFromCompany->Display){
	
				if($this->lstToCompany->SelectedValue==$this->lstFromCompany->SelectedValue){
				
					// switch off advansed parameters
					if ($this->objAssetTransactionArray) {
						$objNewAssetTransactionArray = array();
						foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
						  $objNewAssetTransactionArray[$objAssetTransaction->Asset->AssetCode] = $objAssetTransaction;
						}
					foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
			
						// set advansed to 'None'
							$objAssetTransaction->ScheduleReceiptFlag = false;
							$objAssetTransaction->NewAssetFlag = false;
							$objAssetTransaction->NewAssetId = null;
							$objAssetTransaction->NewAsset = null;
						              $objAssetTransaction->ScheduleReceiptDueDate = null;
						
							if ($objLinkedAssetCodeArray = Asset::LoadChildLinkedArrayByParentAssetId($objAssetTransaction->Asset->AssetId)) {
							  foreach ($objLinkedAssetCodeArray as $objLinkedAssetCode) {
							    $objLinkedAssetTransaction = $objNewAssetTransactionArray[$objLinkedAssetCode->AssetCode];
							    $objLinkedAssetTransaction->ScheduleReceiptFlag = false;
									$objLinkedAssetTransaction->NewAssetFlag = false;
									$objLinkedAssetTransaction->NewAssetId = null;
									$objLinkedAssetTransaction->NewAsset = null;
						                  $objLinkedAssetTransaction->ScheduleReceiptDueDate = null;
							  }
							}
						
						// Return
			
	 				}
	 				$this->blnModifyAssets = true;
	 			}
				//
				$this->dtgAssetTransact->RemoveColumnByName('Advanced');
				$this->dtgAssetTransact->RemoveColumnByName('Due Date');
			}	
			else {
			    if(!$this->dtgAssetTransact->GetColumnByName('Advanced')){
			       $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Advanced', '<?= $_FORM->AdvancedColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
			       $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Due Date', '<?= $_FORM->DueDateColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
				  }
			 	}
			}
		}
	}
	
	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/shipment_edit.php.inc as the included HTML template file
	ShipmentEditForm::Run('ShipmentEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/shipping/shipment_edit.tpl.php');
?>
