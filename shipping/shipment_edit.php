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
	QApplication::Authenticate(5);
	require_once(__FORMBASE_CLASSES__ . '/ShipmentEditFormBase.class.php');
	require_once('./fedexdc.class.php');
	
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

		// Qpanel
		protected $pnlShippingInfo;
		protected $pnlCompleteShipmentInputs;
		protected $pnlCompleteShipmentLabels;
		protected $pnlCompleteShipment;
		
		// Booleans
		protected $blnModifyAssets = false;
		protected $blnModifyInventory = false;
		
		// Inputs
		protected $txtNote;
		protected $txtNewAssetCode;
		protected $txtNewInventoryModelCode;
		protected $lstSourceLocation;
		protected $txtQuantity;
		protected $lstFxServiceType;
		protected $chkScheduleReceipt;
		protected $rblAssetType;
		protected $txtReceiptAssetCode;
		protected $chkAutoGenerateAssetCode;
		
		// Buttons
		protected $btnEdit;
		protected $btnAddAsset;
		protected $btnLookup;
		protected $btnAddInventory;
		protected $btnCompleteShipment;
		protected $btnCancelShipment;
		// We are not allowing users to cancel complete shipments any longer. Creates a problem if transactions are conducted on assets/inventory after they are shipped.
		// protected $btnCancelCompleteShipment;
		
		// Labels
		protected $lblHeaderShipment;
		protected $lblPackageType;
		protected $lblPackageWeight;
		protected $lblWeightUnit;
		protected $lblPackageLength;
		protected $lblPackageWidth;
		protected $lblPackageHeight;
		protected $lblLengthUnit;
		protected $lblValue;
		protected $lblCurrencyUnit;
		protected $lblNotificationFlag;
		protected $lblTrackingNumber;
		protected $lblShipmentNumber;
		protected $lblShipDate;
		protected $lblFromCompany;
		protected $lblFromContact;
		protected $lblFromAddress;
		protected $lblToCompany;
		protected $lblToContact;
		protected $lblToAddress;
		protected $lblToPhone;
		protected $lblToAddressFull;
		protected $lblCourier;
		protected $lblShippingAccount;
		protected $lblFxServiceType;
		protected $lblReference;
		protected $pnlNote;
		protected $lblPackingListLink;
		protected $lblFedexShippingLabelLink;
		protected $lblAdvanced;
		
		// Datagrids
		protected $dtgAssetTransact;
		protected $dtgInventoryTransact;
		
		// Arrays
		protected $arrAssetTransactionToDelete;
		protected $arrInventoryTransactionToDelete;
		
		// Objects
		protected $objAssetTransactionArray;
		protected $objInventoryTransactionArray;
		protected $objTransaction;
		protected $dttNow;
		protected $dttFiveDaysFromNow;
		
		// Integers
		protected $intNewTempId = 1;

		protected function Form_Create() {
			
			// Call SetupShipment to either Load/Edit Existing or Create New
			$this->SetupShipment();
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();			
			
			// QPanel for shipping info
			$this->pnlShippingInfo_Create();
			
			// QPanels for completing shipment
			$this->pnlCompleteShipmentLabels_Create();
			$this->pnlCompleteShipmentInputs_Create();
			$this->pnlCompleteShipment_Create();
			
			// Packing List Link
			$this->lblPackingListLink_Create();
			$this->lblFedexShippingLabelLink_Create();
			
			// Shipping Info Panel Labels
			$this->lblShipmentNumber_Create();
			$this->lblHeaderShipment_Create();
			// $this->lblHeaderCompleteShipment_Create();
			$this->lblShipDate_Create();
			$this->lblFromCompany_Create();
			$this->lblFromContact_Create();
			$this->lblFromAddress_Create();
			$this->lblToCompany_Create();
			$this->lblToContact_Create();
			$this->lblToPhone_Create();
			$this->lblToAddress_Create();
			$this->lblToAddressFull_Create();
			$this->lblCourier_Create();
			$this->lblShippingAccount_Create();
			$this->lblFxServiceType_Create();
			$this->lblReference_Create();
			$this->pnlNote_Create();
			
			if (!$this->objShipment->ShippedFlag) {
			  // Shipping Info Panel Inputs
				$this->calShipDate_Create();
				$this->lstFromCompany_Create();
				$this->lstFromContact_Create();
				$this->lstFromAddress_Create();
				$this->lstToCompany_Create();
				$this->lstToContact_Create();
				$this->txtToPhone_Create();
				$this->lstToAddress_Create();
				$this->lstCourier_Create();
				$this->lstFxServiceType_Create();				
				$this->txtCourierOther_Create();
				$this->lstShippingAccount_Create();
				$this->txtShippingAccountOther_Create();
				$this->txtReference_Create();
				$this->txtNote_Create();
				$this->txtNewAssetCode_Create();
				$this->txtNewInventoryModelCode_Create();
				$this->lstSourceLocation_Create();
				$this->txtQuantity_Create();
			}
			
			// Complete Shipment Panel Labels
			$this->lblPackageType_Create();
			$this->lblPackageWeight_Create();
			$this->lblWeightUnit_Create();
			$this->lblPackageLength_Create();
			$this->lblPackageWidth_Create();
			$this->lblPackageHeight_Create();
			$this->lblLengthUnit_Create();
			$this->lblValue_Create();
			$this->lblCurrencyUnit_Create();
			$this->lblNotificationFlag_Create();
			$this->lblTrackingNumber_Create();
			
			if (!$this->objShipment->ShippedFlag) {
				// Complete Shipment Panel Inputs
				$this->lstPackageType_Create();
				$this->txtPackageWeight_Create();
				$this->lstWeightUnit_Create();
				$this->txtPackageLength_Create();
				$this->txtPackageWidth_Create();
				$this->txtPackageHeight_Create();
				$this->lstLengthUnit_Create();
				$this->txtValue_Create();
				$this->lstCurrencyUnit_Create();
				$this->chkNotificationFlag_Create();
				$this->txtTrackingNumber_Create();
				$this->lblAdvanced_Create();
				$this->txtReceiptAssetCode_Create();
				
				$this->chkAutoGenerateAssetCode_Create();
				$this->rblAssetType_Create();
				$this->chkScheduleReceipt_Create();
			
				// Shipping Info Panel Buttons
				$this->btnSave_Create();
				$this->btnCancel_Create();
				$this->btnEdit_Create();
				$this->btnDelete_Create();
				$this->btnAddAsset_Create();
				$this->btnLookup_Create();
				$this->btnAddInventory_Create();
			}
			
			// Complete Shipment Buttons
			$this->btnCompleteShipment_Create();
			$this->btnCancelShipment_Create();
			//$this->btnCancelCompleteShipment_Create();
			
			// Shipping Info Panel Datagrids
			$this->dtgAssetTransact_Create();
			$this->dtgInventoryTransact_Create();
			
			if (!$this->blnEditMode) {
				$this->pnlCompleteShipment->Visible = false;
			}
			
			// Load the objAssetTransactionArray and objInventoryTransactionArray for the first time
			if ($this->blnEditMode) {
				/*$objExpansionMap[AssetTransaction::ExpandSourceLocation] = true;
				$objExpansionMap[AssetTransaction::ExpandAsset][Asset::ExpandAssetModel] = true;
				$this->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId, $this->dtgAssetTransact->SortInfo, $this->dtgAssetTransact->LimitInfo, $objExpansionMap);
				$objExpansionMap = null;*/
				
				$objClauses = array();
				if ($objClause = $this->dtgAssetTransact->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgAssetTransact->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->Asset->AssetModel))
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->SourceLocation));
					array_push($objClauses, $objClause);
				$this->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId, $objClauses);
				$objClauses = null;
				
/*				$objExpansionMap[InventoryTransaction::ExpandSourceLocation] = true;
				$objExpansionMap[InventoryTransaction::ExpandInventoryLocation][InventoryLocation::ExpandInventoryModel] = true;
				$this->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId, $this->dtgInventoryTransact->SortInfo, $this->dtgInventoryTransact->LimitInfo, $objExpansionMap);*/

				$objClauses = array();
				if ($objClause = $this->dtgInventoryTransact->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgInventoryTransact->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->InventoryLocation->InventoryModel));
					array_push($objClauses, $objClause);
				$this->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->objShipment->TransactionId, $objClauses);
				
				// If shipped, display labels. Otherwise, we don't need to call DisplayLabels because only labels are on the QPanel.
				if (!$this->objShipment->ShippedFlag) {
					$this->DisplayLabels();
				}
			}
			// For a new shipment, display the inputs
			elseif (!$this->blnEditMode) {
				$this->DisplayInputs();
			}
			
			// Check if there is an Asset or InventoryModel ID in the query string to automatically add them - they would be coming from AssetEdit or InventoryEdit
			if (!$this->blnEditMode) {
				$intAssetId = QApplication::QueryString('intAssetId');
				// If an Asset was passed in the query string, load the txt in the Asset Code text box and click the add button
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
			
			// Load the data for the AssetTransact datagrid - only if it has changed or is new
			if ($this->blnModifyAssets || $this->blnEditMode) {
				$this->blnModifyAssets = false;
				$this->dtgAssetTransact->TotalItemCount = count($this->objAssetTransactionArray);
				if ($this->dtgAssetTransact->TotalItemCount > 0) {
					$this->dtgAssetTransact->DataSource = $this->objAssetTransactionArray;
					$this->dtgAssetTransact->ShowHeader = true;
				}
				else {
					$this->dtgAssetTransact->ShowHeader = false;
				}
			}
			
			// Load the data for the InventoryTransact datagrid - only if it has changed or is new
			if ($this->blnModifyInventory || $this->blnEditMode) {
				$this->blnModifyInventory = false;	
				$this->dtgInventoryTransact->TotalItemCount = count($this->objInventoryTransactionArray);
				if ($this->dtgInventoryTransact->TotalItemCount > 0) {
					$this->dtgInventoryTransact->DataSource = $this->objInventoryTransactionArray;
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
		
		// Create and Setup either Complete Shipment inputs or labels
		// Assign one of those panels to pnlCompleteShipment
		protected function pnlCompleteShipment_Create() {
			if ($this->objShipment->ShippedFlag) {
				$this->pnlCompleteShipment = $this->pnlCompleteShipmentLabels;
			}
			else {
				$this->pnlCompleteShipment = $this->pnlCompleteShipmentInputs;
			}
		}
		
		// Create and Setup pnlShippingInfo
		protected function pnlShippingInfo_Create() {
			$this->pnlShippingInfo = new QPanel($this);
			$this->pnlShippingInfo->AutoRenderChildren = false;
			// Use template with only labels if it has been shipped
			if ($this->objShipment->ShippedFlag) {
				$this->pnlShippingInfo->Template = 'pnl_shipping_info_labels.inc.php';
			}
			// Use template with labels and inputs
			else {
				$this->pnlShippingInfo->Template = 'pnl_shipping_info.inc.php';
			}
		}
		
		// Create and Setup pnlCompleteShipmentInputs
		protected function pnlCompleteShipmentInputs_Create() {
			$this->pnlCompleteShipmentInputs = new QPanel($this);
			$this->pnlCompleteShipmentInputs->Template = 'pnl_complete_shipment_inputs.inc.php';
			$this->pnlCompleteShipmentInputs->AutoRenderChildren = false;
			QApplication::AuthorizeControl($this->objShipment, $this->pnlCompleteShipmentInputs, 2);
		}
		
		// Create and Setup pnlCompleteShipmentLabels
		protected function pnlCompleteShipmentLabels_Create() {
			$this->pnlCompleteShipmentLabels = new QPanel($this);
			$this->pnlCompleteShipmentLabels->Template = 'pnl_complete_shipment_labels.inc.php';
			$this->pnlCompleteShipmentLabels->AutoRenderChildren = false;
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
		
		// Create and Setup lblFedexShippingLabelLink
		protected function lblFedexShippingLabelLink_Create() {
			$this->lblFedexShippingLabelLink = new QLabel($this);
			$this->lblFedexShippingLabelLink->HtmlEntities = false;
			if ($this->blnEditMode) {
				$this->lblFedexShippingLabelLink->Text = $this->objShipment->__toStringFedexShippingLabelLink("bluelink");
			}
		}

		// Create and Setup lblPackageType
		protected function lblPackageType_Create() {
			$this->lblPackageType = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblPackageType->Name = 'Package Type';
			if ($this->objShipment->PackageTypeId) {
				$this->lblPackageType->Text = $this->objShipment->PackageType->__toString();
			}
		}
		
		// Create and Setup lblPackageWeight
		protected function lblPackageWeight_Create() {
			$this->lblPackageWeight = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblPackageWeight->Name = 'Estimated Weight';
			$this->lblPackageWeight->Text = $this->objShipment->PackageWeight;
		}
		
		// Create and Setup lblWeightUnit
		protected function lblWeightUnit_Create() {
			$this->lblWeightUnit = new QLabel($this->pnlCompleteShipmentLabels);
			if ($this->objShipment->WeightUnitId) {
				$this->lblWeightUnit->Text = $this->objShipment->WeightUnit->__toString();
			}
		}
		
		// Create and Setup lblPackageLength
		protected function lblPackageLength_Create() {
			$this->lblPackageLength = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblPackageLength->Name = 'L';
			$this->lblPackageLength->Text = $this->objShipment->PackageLength;
		}
		
		// Create and Setup lblPackageWidth
		protected function lblPackageWidth_Create() {
			$this->lblPackageWidth = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblPackageWidth->Name = 'W';
			$this->lblPackageWidth->Text = $this->objShipment->PackageWidth;
		}
		
		// Create and Setup lblPackageHeight
		protected function lblPackageHeight_Create() {
			$this->lblPackageHeight = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblPackageHeight->Name = 'H';
			$this->lblPackageHeight->Text = $this->objShipment->PackageHeight;
		}
		
		// Create and Setup lblLengthUnit
		protected function lblLengthUnit_Create() {
			$this->lblLengthUnit = new QLabel($this->pnlCompleteShipmentLabels);
			if ($this->objShipment->LengthUnitId) {
				$this->lblLengthUnit->Text = $this->objShipment->LengthUnit->__toString();
			}
		}
		
		// Create and Setup lblValue 
		protected function lblValue_Create() {
			$this->lblValue = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblValue->Name = 'Declared Value';
			$this->lblValue->Text = $this->objShipment->Value;
		}
		
		// Create and Setup lblCurrencyUnit
		protected function lblCurrencyUnit_Create() {
			$this->lblCurrencyUnit = new QLabel($this->pnlCompleteShipmentLabels);
			if ($this->objShipment->CurrencyUnitId) {
				$this->lblCurrencyUnit->Text = $this->objShipment->CurrencyUnit->__toString();
			}
		}
		
		// Create and Setup lblNotificationFlag
		protected function lblNotificationFlag_Create() {
			$this->lblNotificationFlag = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblNotificationFlag->Name = 'Sent Shipment Notification: ';
			if ($this->objShipment->NotificationFlag) {
				$this->lblNotificationFlag->Text = 'YES';
			}
			else {
				$this->lblNotificationFlag->Text = 'NO';
			}
		}
		
		// Create and Setup lblTrackingNumber
		protected function lblTrackingNumber_Create() {
			$this->lblTrackingNumber = new QLabel($this->pnlCompleteShipmentLabels);
			$this->lblTrackingNumber->Name = 'Tracking Number';
			$this->lblTrackingNumber->HtmlEntities = false;
			$this->lblTrackingNumber->Text = $this->objShipment->__toStringTrackingNumber();
		}
		
		// Create and Setup lblShipmentNumber
		protected function lblShipmentNumber_Create() {
			$this->lblShipmentNumber = new QLabel($this->pnlShippingInfo);
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
			$this->lblShipDate = new QLabel($this->pnlShippingInfo);
			$this->lblShipDate->Name = QApplication::Translate('Ship Date');
			if ($this->blnEditMode && $this->objShipment->ShipDate) {
				$this->lblShipDate->Text = $this->objShipment->ShipDate->__toString();
			}
		}
		
		// Create and Setup lblFromCompany
		protected function lblFromCompany_Create() {
			$this->lblFromCompany = new QLabel($this->pnlShippingInfo);
			$this->lblFromCompany->Name = 'From Company';
			if ($this->blnEditMode && $this->objShipment->FromCompanyId) {
				$this->lblFromCompany->Text = $this->objShipment->FromCompany->__toString();
			}
		}	
		
		// Create and Setup lblFromContact
		protected function lblFromContact_Create() {
			$this->lblFromContact = new QLabel($this->pnlShippingInfo);
			$this->lblFromContact->Name = 'From Contact';
			if ($this->blnEditMode && $this->objShipment->FromContactId) {
				$this->lblFromContact->Text = $this->objShipment->FromContact->__toString();
			}
		}
		
		// Create and Setup lblFrom Address
		protected function lblFromAddress_Create() {
			$this->lblFromAddress = new QLabel($this->pnlShippingInfo);
			$this->lblFromAddress->Name = 'From Address';
			if ($this->blnEditMode && $this->objShipment->FromAddressId) {
				$this->lblFromAddress->Text = $this->objShipment->FromAddress->__toString();
			}
		}
		
		// Create and Setup lblToCompany
		protected function lblToCompany_Create() {
			$this->lblToCompany = new QLabel($this->pnlShippingInfo);
			$this->lblToCompany->Name = 'To Company';
			if ($this->blnEditMode && $this->objShipment->ToCompanyId) {
				$this->lblToCompany->Text = $this->objShipment->ToCompany->__toString();
			}
		}
		
		// Create and Setup lblToContact
		protected function lblToContact_Create() {
			$this->lblToContact = new QLabel($this->pnlShippingInfo);
			$this->lblToContact->Name = 'To Contact';
			if ($this->blnEditMode && $this->objShipment->ToContactId) {
				$this->lblToContact->Text = $this->objShipment->ToContact->__toString();
			}
		}
		
		// Create and Setup lblToPhone
		protected function lblToPhone_Create() {
			$this->lblToPhone = new QLabel($this->pnlShippingInfo);
			$this->lblToPhone->Name = 'To Phone';
			if ($this->blnEditMode) {
				$this->lblToPhone->Text = $this->objShipment->ToPhone;
			}
		}

		// Create and Setp lblToAddress
		protected function lblToAddress_Create() {
			$this->lblToAddress = new QLabel($this->pnlShippingInfo);
			$this->lblToAddress->Name = 'To Address';
			if ($this->blnEditMode && $this->objShipment->ToAddressId) {
				$this->lblToAddress->Text = $this->objShipment->ToAddress->__toString();
			}
		}
		
		// Create and Setup lblToAddressFull
		protected function lblToAddressFull_Create() {
			$this->lblToAddressFull = new QLabel($this->pnlShippingInfo);
			$this->lblToAddressFull->HtmlEntities = false;
			$this->lblToAddressFull->Name = 'Full Address';
			$this->lblToAddressFull->Text = '<br><br>';
		}
		
		// Create and Setup lblCourier
		protected function lblCourier_Create() {
			$this->lblCourier = new QLabel($this->pnlShippingInfo);
			$this->lblCourier->Name = 'Courier';
			if ($this->objShipment->CourierId) {
				$this->lblCourier->Text = $this->objShipment->Courier->__toString();
			}
			elseif ($this->objShipment->CourierOther) {
				$this->lblCourier->Text = $this->objShipment->CourierOther;
			}
		}
		
		// Create and Setup lblShippingAccount
		protected function lblShippingAccount_Create() {
			$this->lblShippingAccount = new QLabel($this->pnlShippingInfo);
			$this->lblShippingAccount->Name = 'Shipping Account';
			if ($this->blnEditMode) {
				if ($this->objShipment->ShippingAccountId) {
					$this->lblShippingAccount->Text = $this->objShipment->ShippingAccount->__toString();
				}
				elseif ($this->objShipment->ShippingAccountOther) {
					$this->lblShippingAccount->Text = $this->objShipment->ShippingAccountOther;
				}
			}
		}
		
		// Create and Setup lblFxServiceType
		protected function lblFxServiceType_Create() {
			$this->lblFxServiceType = new QLabel($this->pnlShippingInfo);
			$this->lblFxServiceType->Name = 'Fedex Service Type';
			if ($this->blnEditMode) {
				if ($this->objShipment->FedexServiceType) {
					$this->lblFxServiceType->Text = $this->objShipment->FedexServiceType->__toString();
				}
			}
		}
		
		// Create and Setup lblReference
		protected function lblReference_Create() {
			$this->lblReference = new QLabel($this->pnlShippingInfo);
			$this->lblReference->Name = 'Reference';
			if ($this->blnEditMode) {
				$this->lblReference->Text = $this->objShipment->Reference;
			}
		}
		
		// Create and Setup lblAdvanced
		protected function lblAdvanced_Create() {
			$this->lblAdvanced = new QLabel($this);
			$this->lblAdvanced->Name = 'Advanced';
			$this->lblAdvanced->Text = 'Show Advanced';
			$this->lblAdvanced->HtmlEntities = false;
			$this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
	  	$this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
			$this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblAdvanced_Click'));
			if ($this->blnEditMode) {
				$this->lblAdvanced->Display = false;
			}
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
		
		// Create and Setup lstPackageType
		protected function lstPackageType_Create() {
			$this->lstPackageType = new QListBox($this->pnlCompleteShipmentInputs);
			$this->lstPackageType->Name = QApplication::Translate('Package Type');
							
			$this->LoadPackageTypes();

			// Disable Package type selection if not using FedEx
			if ($this->objShipment->CourierId !== 1) {
				$this->lstPackageType->Enabled = false;
			}
			$this->lstPackageType->Required = false;
		}
		
		// Create and Setup txtPackageWeight
		protected function txtPackageWeight_Create() {
			$this->txtPackageWeight = new QFloatTextBox($this->pnlCompleteShipmentInputs);
			$this->txtPackageWeight->Name = QApplication::Translate('Weight');
			$this->txtPackageWeight->Text = $this->objShipment->PackageWeight;
			$this->txtPackageWeight->SetCustomStyle('Width','50px');
			$this->txtPackageWeight->CausesValidation = true;
			$this->txtPackageWeight->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtPackageWeight->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create and Setup lstWeightUnit
		protected function lstWeightUnit_Create() {
			$this->lstWeightUnit = new QListBox($this->pnlCompleteShipmentInputs);
			$this->lstWeightUnit->Name = QApplication::Translate('Weight Unit');
			$this->lstWeightUnit->AddItem('- Select One -', null);
			$objWeightUnitArray = WeightUnit::LoadAll(QQ::Clause(QQ::OrderBy(QQN::WeightUnit()->ShortDescription)));
			if ($objWeightUnitArray) foreach ($objWeightUnitArray as $objWeightUnit) {
				$objListItem = new QListItem($objWeightUnit->__toString(), $objWeightUnit->WeightUnitId);
				if (($this->objShipment->WeightUnit) && ($this->objShipment->WeightUnit->WeightUnitId == $objWeightUnit->WeightUnitId))
					$objListItem->Selected = true;
				$this->lstWeightUnit->AddItem($objListItem);
			}
			$this->lstWeightUnit->SetCustomStyle('Width','120px');
		}

		// Create and Setup txtPackageLength
		protected function txtPackageLength_Create() {
			$this->txtPackageLength = new QFloatTextBox($this->pnlCompleteShipmentInputs);
			$this->txtPackageLength->Name = QApplication::Translate('L');
			$this->txtPackageLength->Text = $this->objShipment->PackageLength;
			$this->txtPackageLength->CausesValidation = true;
			$this->txtPackageLength->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtPackageLength->AddAction(new QEnterKeyEvent(), new QTerminateAction());	
			$this->txtPackageLength->SetCustomStyle('Width','30px');				
		}

		// Create and Setup txtPackageWidth
		protected function txtPackageWidth_Create() {
			$this->txtPackageWidth = new QFloatTextBox($this->pnlCompleteShipmentInputs);
			$this->txtPackageWidth->Name = QApplication::Translate('W');
			$this->txtPackageWidth->Text = $this->objShipment->PackageWidth;
			$this->txtPackageWidth->CausesValidation = true;
			$this->txtPackageWidth->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtPackageWidth->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPackageWidth->SetCustomStyle('Width','30px');		
		}

		// Create and Setup txtPackageHeight
		protected function txtPackageHeight_Create() {
			$this->txtPackageHeight = new QFloatTextBox($this->pnlCompleteShipmentInputs);
			$this->txtPackageHeight->Name = QApplication::Translate('H');
			$this->txtPackageHeight->Text = $this->objShipment->PackageHeight;
			$this->txtPackageHeight->CausesValidation = true;
			$this->txtPackageHeight->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtPackageHeight->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPackageHeight->SetCustomStyle('Width','30px');	
		}

		// Create and Setup lstLengthUnit
		protected function lstLengthUnit_Create() {
			$this->lstLengthUnit = new QListBox($this->pnlCompleteShipmentInputs);
			$this->lstLengthUnit->Name = QApplication::Translate('Length Unit');
			$this->lstLengthUnit->AddItem('- Select One -', null);
			$objLengthUnitArray = LengthUnit::LoadAll(QQ::Clause(QQ::OrderBy(QQN::LengthUnit()->ShortDescription)));
			if ($objLengthUnitArray) foreach ($objLengthUnitArray as $objLengthUnit) {
				$objListItem = new QListItem($objLengthUnit->__toString(), $objLengthUnit->LengthUnitId);
				if (($this->objShipment->LengthUnit) && ($this->objShipment->LengthUnit->LengthUnitId == $objLengthUnit->LengthUnitId))
					$objListItem->Selected = true;
				$this->lstLengthUnit->AddItem($objListItem);
			}
			$this->lstLengthUnit->SetCustomStyle('Width','120px');	
		}

		// Create and Setup txtValue
		protected function txtValue_Create() {
			$this->txtValue = new QFloatTextBox($this->pnlCompleteShipmentInputs);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objShipment->Value;
			$this->txtValue->CausesValidation = true;
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtValue->SetCustomStyle('Width','50px');
		}

		// Create and Setup lstCurrencyUnit
		protected function lstCurrencyUnit_Create() {
			$this->lstCurrencyUnit = new QListBox($this->pnlCompleteShipmentInputs);
			$this->lstCurrencyUnit->Name = QApplication::Translate('Currency Unit');
			$this->lstCurrencyUnit->AddItem('- Select One -', null);
			$objCurrencyUnitArray = CurrencyUnit::LoadAll(QQ::Clause(QQ::OrderBy(QQN::CurrencyUnit()->ShortDescription)));
			if ($objCurrencyUnitArray) foreach ($objCurrencyUnitArray as $objCurrencyUnit) {
				$objListItem = new QListItem($objCurrencyUnit->__toString(), $objCurrencyUnit->CurrencyUnitId);
				if (($this->objShipment->CurrencyUnit) && ($this->objShipment->CurrencyUnit->CurrencyUnitId == $objCurrencyUnit->CurrencyUnitId))
					$objListItem->Selected = true;
				$this->lstCurrencyUnit->AddItem($objListItem);
			}
			$this->lstCurrencyUnit->SetCustomStyle('Width','120px');
		}

		// Create and Setup chkNotificationFlag
		protected function chkNotificationFlag_Create() {
			$this->chkNotificationFlag = new QCheckBox($this->pnlCompleteShipmentInputs);
			$this->chkNotificationFlag->Name = QApplication::Translate('Shipment Notification');
			$this->chkNotificationFlag->Checked = $this->objShipment->NotificationFlag;
		}

		// Create and Setup txtTrackingNumber
		protected function txtTrackingNumber_Create() {
			$this->txtTrackingNumber = new QTextBox($this->pnlCompleteShipmentInputs);
			$this->txtTrackingNumber->Name = QApplication::Translate('Tracking Number');
			$this->txtTrackingNumber->Text = $this->objShipment->TrackingNumber;
			$this->txtTrackingNumber->CausesValidation = true;
			$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			// Do not show the tracking number field if this is a FedEx shipment
			if ($this->objShipment->CourierId == 1) {
				$this->txtTrackingNumber->Enabled = false;
			}
		}
		
		// Create and Setup calShipDate
		protected function calShipDate_Create() {
			$this->calShipDate = new QDateTimePickerExt($this->pnlShippingInfo);
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
			$this->calShipDate->MinimumYear = $this->dttNow->Year;
			$this->calShipDate->MinimumMonth = $this->dttNow->Month;
			$this->calShipDate->MinimumDay = $this->dttNow->Day;
      		// 5 Days: 432000
      		// 6 Days: 518400
      		// 7 Days: 604800
      		// 10 Days: 864000
      		// 200 Days: 17280000
      
      		$intDayOfWeek = date('w', time());
      		// Sunday - just add five days
      		if ($intDayOfWeek == 0) {
      			$this->dttFiveDaysFromNow = new QDateTime($this->dttNow->Timestamp + 432000);
      		}
      		// Monday - Friday, add seven days
      		elseif ($intDayOfWeek > 0 && $intDayOfWeek < 6) {
      			$this->dttFiveDaysFromNow = new QDateTime($this->dttNow->Timestamp + 604800);
      		}
      		// Saturday - add six days
      		elseif ($intDayOfWeek == 6) {
      			$this->dttFiveDaysFromNow = new QDateTime($this->dttNow->Timestamp + 518400);
      		}
      		$this->calShipDate->MaximumYear = $this->dttFiveDaysFromNow->Year;
      		$this->calShipDate->MaximumMonth = $this->dttFiveDaysFromNow->Month;
      		$this->calShipDate->MaximumDay = $this->dttFiveDaysFromNow->Day;
      
     		 $this->calShipDate->AddAction(new QChangeEvent(), new QAjaxAction('calShipDate_Select'));
 			if (!$this->blnEditMode) {
 				QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->calShipDate->ControlId));
 			}
 			$this->calShipDate->TabIndex=1;
		}
		
		// Create and Setup lstFromCompany
		protected function lstFromCompany_Create() {
			$this->lstFromCompany = new QListBox($this->pnlShippingInfo);
			$this->lstFromCompany->Name = QApplication::Translate('From Company');
			$this->lstFromCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromCompany->AddItem('- Select One -', null);
			$objFromCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
			if ($objFromCompanyArray) foreach ($objFromCompanyArray as $objFromCompany) {
				$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
				if (($this->objShipment->FromCompanyId && $this->objShipment->FromCompanyId == $objFromCompany->CompanyId) || (QApplication::$TracmorSettings->CompanyId && QApplication::$TracmorSettings->CompanyId == $objFromCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstFromCompany->AddItem($objListItem);
			}
			if (QApplication::$TracmorSettings->CompanyId) {
					
			}
			$this->lstFromCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstFromCompany_Select'));
			$this->lstFromCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstFxServiceType_Update'));	
			$this->lstFromCompany->TabIndex=2;
		}
		
		// Create and Setup lstFromContact
		protected function lstFromContact_Create() {
			$this->lstFromContact = new QListBox($this->pnlShippingInfo);
			$this->lstFromContact->Name = QApplication::Translate('From Contact');
			$this->lstFromContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromContact->AddItem('- Select One -', null);
			// $objFromContactArray = Contact::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, 'last_name ASC, first_name ASC');
			$objFromContactArray = Contact::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Contact()->LastName, QQN::Contact()->FirstName)));
			if ($objFromContactArray) foreach ($objFromContactArray as $objFromContact) {
				$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
				if (($this->objShipment->FromContactId) && ($this->objShipment->FromContactId == $objFromContact->ContactId))
					$objListItem->Selected = true;
				$this->lstFromContact->AddItem($objListItem);
			}
			$this->lstFromContact->AddAction(new QChangeEvent(), new QAjaxAction('lstFxServiceType_Update'));	
			$this->lstFromContact->TabIndex=3;
		}
		
		// Create and Setup lstFromAddress
		protected function lstFromAddress_Create() {
			$this->lstFromAddress = new QListBox($this->pnlShippingInfo);
			$this->lstFromAddress->Name = QApplication::Translate('From Address');
			$this->lstFromAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromAddress->AddItem('- Select One -', null);
			$objFromAddressArray = Address::LoadArrayByCompanyId(QApplication::$TracmorSettings->CompanyId, QQ::Clause(QQ::OrderBy(QQN::Address()->ShortDescription)));
			if ($objFromAddressArray) foreach ($objFromAddressArray as $objFromAddress) {
				$objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
				if (($this->objShipment->FromAddressId) && ($this->objShipment->FromAddressId == $objFromAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstFromAddress->AddItem($objListItem);
			}
			
			$this->lstFromAddress->AddAction(new QChangeEvent(), new QAjaxAction('lstFxServiceType_Update'));	
			$this->lstFromAddress->TabIndex=4;
		}
		
		// Create and Setup lstToCompany
		protected function lstToCompany_Create() {
			$this->lstToCompany = new QListBox($this->pnlShippingInfo);
			$this->lstToCompany->Name = QApplication::Translate('To Company');
			$this->lstToCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstToCompany->AddItem('- Select One -', null);
			$objToCompanyArray = Company::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Company()->ShortDescription)));
			if ($objToCompanyArray) foreach ($objToCompanyArray as $objToCompany) {
				$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
				if (($this->objShipment->ToCompanyId) && ($this->objShipment->ToCompanyId == $objToCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstToCompany->AddItem($objListItem);
			}
			$this->lstToCompany->AddAction(new QChangeEvent(), new QAjaxAction('lstToCompany_Select'));
			$this->lstToCompany->TabIndex=5;
		}
		
		// Create and Setup lstToContact
		protected function lstToContact_Create() {
			$this->lstToContact = new QListBox($this->pnlShippingInfo);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->Required = true;
			
			if (!$this->blnEditMode) {
				$this->lstToContact->Enabled = false;
			}
			elseif ($this->blnEditMode && $this->lstToCompany->SelectedValue) {
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
			
			$this->lstToContact->AddAction(new QChangeEvent(), new QAjaxAction('lstToContact_Select'));
			$this->lstToContact->TabIndex=6;
		}
		
		// Create and Setup txtToPhone
		protected function txtToPhone_Create() {
			$this->txtToPhone = new QTextBox($this->pnlShippingInfo);
			$this->txtToPhone->Name = QApplication::Translate('To Phone');
			if ($this->blnEditMode) {
				$this->txtToPhone->Text = $this->objShipment->ToPhone;
			}
			$this->txtToPhone->CausesValidation = true;
			$this->txtToPhone->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtToPhone->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtToPhone->TabIndex=8;
		}		
		
		// Create and Setup lstToAddress
		protected function lstToAddress_Create() {
			$this->lstToAddress = new QListBox($this->pnlShippingInfo);
			$this->lstToAddress->Name = QApplication::Translate('To Address');
			$this->lstToAddress->Required = true;
			if (!$this->blnEditMode) {
				$this->lstToAddress->Enabled = false;
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
			$this->lstToAddress->TabIndex=7;
		}
		
		// Create and Setup lstCourier
		protected function lstCourier_Create() {
			$this->lstCourier = new QListBox($this->pnlShippingInfo);
			$this->lstCourier->Name = QApplication::Translate('Courier');
			$this->lstCourier->Required = false;
			if (!$this->blnEditMode)
				$this->lstCourier->AddItem('- Select One -', null);
			$objCourierArray = Courier::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Courier()->ShortDescription)));				
			if ($objCourierArray) foreach ($objCourierArray as $objCourier) {
				$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
				if (($this->objShipment->CourierId) && ($this->objShipment->CourierId == $objCourier->CourierId))
					$objListItem->Selected = true;				
				$this->lstCourier->AddItem($objListItem);
			}
			if ($this->blnEditMode && !$this->objShipment->CourierId) {
				$this->lstCourier->AddItem('Other', null, true);
			}
			else {
				$this->lstCourier->AddItem('Other', null);
			}
			$this->lstCourier->AddAction(new QChangeEvent(), new QAjaxAction('lstCourier_Select'));
			$this->lstCourier->TabIndex=9;
		}
		
		// Create and Setup lstFxServiceType
		protected function lstFxServiceType_Create() {
			$this->lstFxServiceType = new QListBox($this->pnlShippingInfo);
			$this->lstFxServiceType->Name = QApplication::Translate('FedEx Service Type');
			
			if (!$this->blnEditMode) {
				$this->lstFxServiceType->Required = false;
				$this->lstFxServiceType->Enabled = false;
			}
			elseif ($this->blnEditMode && $this->objShipment->FedexServiceTypeId) {
				$this->lstFxServiceType->Enabled = true;
				$this->lstFxServiceType->Required = true;
			}
			$this->lstFxServiceType->TabIndex=13;
		}
		
		// Create and Setup txtCourier
		protected function txtCourierOther_Create() {
			$this->txtCourierOther = new QTextBox($this->pnlShippingInfo);
			$this->txtCourierOther->Name = QApplication::Translate('Courier');
			if ($this->blnEditMode) {
				if ($this->objShipment->CourierOther) {
					$this->txtCourierOther->Enabled = true;
					$this->txtCourierOther->Text = $this->objShipment->CourierOther;
				}
				else {
					$this->txtCourierOther->Enabled = false;
				}
			}
			elseif (!$this->blnEditMode) {
				$this->txtCourierOther->Enabled = false;
			}
			$this->txtCourierOther->CausesValidation = true;
			$this->txtCourierOther->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtCourierOther->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtCourierOther->TabIndex=10;
		}
		
		// Create and Setup lstShippingAccount
		protected function lstShippingAccount_Create() {
			$this->lstShippingAccount = new QListBox($this->pnlShippingInfo);
			$this->lstShippingAccount->Name = QApplication::Translate('Shipping Account');
			$this->lstShippingAccount->Required = false;
			if (!$this->blnEditMode) {
				$this->lstShippingAccount->Enabled = false;
			}
			elseif ($this->blnEditMode && $this->objShipment->CourierId) {
			$objShippingAccountArray = ShippingAccount::LoadArrayByCourierId($this->lstCourier->SelectedValue, QQ::Clause(QQ::Orderby(QQN::ShippingAccount()->ShortDescription)));
				if ($objShippingAccountArray) foreach ($objShippingAccountArray as $objShippingAccount) {
					$objListItem = new QListItem($objShippingAccount->__toString(), $objShippingAccount->ShippingAccountId);
					if ($this->objShipment->ShippingAccountId && $this->objShipment->ShippingAccountId == $objShippingAccount->ShippingAccountId) {
						$objListItem->Selected = true;
					}
					$this->lstShippingAccount->AddItem($objListItem);
				}
				// Removed choice of 'Other' for Beta1 - too buggy
				// $this->lstShippingAccount->AddItem('Other', null);
			}
			elseif ($this->blnEditMode && !$this->objShipment->CourierId) {
				$this->lstShippingAccount->AddItem('Other', null, true);
			}
			$this->lstShippingAccount->AddAction(new QChangeEvent(), new QAjaxAction('lstShippingAccount_Select'));
			$this->lstShippingAccount->TabIndex=11;
		}
		
		// Create and Setup txtShippingAccount
		protected function txtShippingAccountOther_Create() {
			$this->txtShippingAccountOther = new QTextBox($this->pnlShippingInfo);
			$this->txtShippingAccountOther->Name = QApplication::Translate('Shipping Account');
			if ($this->blnEditMode && $this->objShipment->ShippingAccountOther) {
				$this->txtShippingAccountOther->Enabled = true;
				$this->txtShippingAccountOther->Text = $this->objShipment->ShippingAccountOther;
			}
			elseif (!$this->blnEditMode) {
				$this->txtShippingAccountOther->Enabled = false;
			}
			$this->txtShippingAccountOther->CausesValidation = true;
			$this->txtShippingAccountOther->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShippingAccountOther->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtShippingAccountOther->TabIndex=12;
		}
		
		// Create and Setup txtReference
		protected function txtReference_Create() {
			$this->txtReference = new QTextBox($this->pnlShippingInfo);
			$this->txtReference->Name = QApplication::Translate('Reference');
			if ($this->blnEditMode) {
				$this->txtReference->Text = $this->objShipment->Reference;
			}
			$this->txtReference->CausesValidation = true;
			$this->txtReference->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtReference->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtReference->TabIndex=14;
		}
		
		// Create and Setup txtNote
		protected function txtNote_Create() {
			$this->txtNote = new QTextBox($this->pnlShippingInfo);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->TextMode = QTextMode::MultiLine;
			if ($this->blnEditMode) {
				$this->txtNote->Text = $this->objShipment->Transaction->Note;
			}
			$this->txtNote->TabIndex=15;
		}
		
		// Create the text field to enter new asset codes to add to the transaction
		// Eventually this field will receive information from the AML
		protected function txtNewAssetCode_Create() {
			$this->txtNewAssetCode = new QTextBox($this->pnlShippingInfo);
			$this->txtNewAssetCode->Name = 'Asset Code';
			$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->txtNewAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtNewAssetCode->CausesValidation = false;
			$this->txtNewAssetCode->TabIndex=16;
		}
		
		// Create the text field to enter new inventory_model codes to add to the transaction
		// Eventually this field will receive information from the AML
		protected function txtNewInventoryModelCode_Create() {
			$this->txtNewInventoryModelCode = new QTextBox($this->pnlShippingInfo);
			$this->txtNewInventoryModelCode->Name = 'Inventory Code';
			$this->txtNewInventoryModelCode->CausesValidation = false;
			$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnLookup_Click'));
			$this->txtNewInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Create and Setup lstSourceLocation
		protected function lstSourceLocation_Create() {
			$this->lstSourceLocation = new QListBox($this->pnlShippingInfo);
			$this->lstSourceLocation->Name = 'Location';
			$this->lstSourceLocation->Required = false;
			$this->lstSourceLocation->AddItem('- Select One -', null);
			$this->lstSourceLocation->CausesValidation = false;
			$this->lstSourceLocation->Enabled = false;
		}
		
		protected function txtQuantity_Create() {
			$this->txtQuantity = new QTextBox($this->pnlShippingInfo);
			$this->txtQuantity->Name = 'Quantity';
			$this->txtQuantity->CausesValidation = false;
			$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->txtQuantity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtQuantity->Enabled = false;
		}
		
		protected function chkScheduleReceipt_Create() {
			$this->chkScheduleReceipt = new QCheckBox($this->pnlShippingInfo);
			$this->chkScheduleReceipt->Name = 'Schedule Receipt';
			$this->chkScheduleReceipt->Text = 'Schedule a Corresponding Receipt for:';
			$this->chkScheduleReceipt->Display = false;
			$this->chkScheduleReceipt->AddAction(new QClickEvent(), new QAjaxAction('chkScheduleReceipt_Click'));
		}
		
		protected function rblAssetType_Create() {
			$this->rblAssetType = new QRadioButtonList($this->pnlShippingInfo);
			$this->rblAssetType->AddItem(new QListItem('This Asset', 'this', true));
			$this->rblAssetType->AddItem(new QListItem('New Asset', 'new'));
			$this->rblAssetType->Enabled = false;
			$this->rblAssetType->Display = false;
			// $this->rblAssetType->AddAction(new QChangeEvent(), new QAjaxAction('rblAssetType_Change'));
			$this->rblAssetType->AddAction(new QChangeEvent(), new QToggleDisplayAction($this->txtReceiptAssetCode));
			if (QApplication::$TracmorSettings->MinAssetCode) {
				$this->rblAssetType->AddAction(new QChangeEvent(), new QToggleDisplayAction($this->chkAutoGenerateAssetCode));
			}
			
			
		}
		
		protected function txtReceiptAssetCode_Create() {
			$this->txtReceiptAssetCode = new QTextBox($this->pnlShippingInfo);
			$this->txtReceiptAssetCode->Name = 'Asset Code';
			$this->txtReceiptAssetCode->Display = false;
			
		}
		
		protected function chkAutoGenerateAssetCode_Create() {
			$this->chkAutoGenerateAssetCode = new QCheckBox($this->pnlShippingInfo);
			$this->chkAutoGenerateAssetCode->Name = 'Auto Generate';
			$this->chkAutoGenerateAssetCode->Text = 'Auto Generate';
			$this->chkAutoGenerateAssetCode->AddAction(new QClickEvent(), new QToggleEnableAction($this->txtReceiptAssetCode));
			$this->chkAutoGenerateAssetCode->Display = false;
		}
		
		//******************
		// CREATE DATAGRIDS
		//******************
		
		// Setup the AssetTransact datagrid
		protected function dtgAssetTransact_Create() {
			
			$this->dtgAssetTransact = new QDataGrid($this->pnlShippingInfo);
			$this->dtgAssetTransact->CellPadding = 5;
			$this->dtgAssetTransact->CellSpacing = 0;
			$this->dtgAssetTransact->CssClass = "datagrid";
			
	    // Enable AJAX - this won't work while using the DB profiler
	    $this->dtgAssetTransact->UseAjax = true;
	
	    // Enable Pagination, and set to 20 items per page
	    $objPaginator = new QPaginator($this->dtgAssetTransact);
	    $this->dtgAssetTransact->Paginator = $objPaginator;
	    $this->dtgAssetTransact->ItemsPerPage = 20;
	    
    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Asset Code', '<?= $_ITEM->Asset->__toStringWithLink("bluelink") ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->Asset->AssetModel->__toStringWithLink("bluelink") ?>', array('Width' => "200", 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgAssetTransact->AddColumn(new QDataGridColumn('Location', '<?= $_ITEM->SourceLocation->__toString() ?>', array('CssClass' => "dtg_column")));
	    if (!$this->blnEditMode) {
    		$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveAssetColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
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
		
		// Render the remove button column in the AssetTransact datagrid
		public function RemoveAssetColumn_Render(AssetTransaction $objAssetTransaction) {
			
			// Assign the asset a TempId and increment it by one
	    $objAssetTransaction->Asset->TempId = $this->intNewTempId++;
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
      }
      
      return $btnRemove->Render(false);
		}		
		
		// Setup the InventoryTransact datagrid
		protected function dtgInventoryTransact_Create() {
			
			$this->dtgInventoryTransact = new QDataGrid($this->pnlShippingInfo);
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
			$this->btnCompleteShipment = new QButton($this->pnlCompleteShipmentInputs);
			$this->btnCompleteShipment->Text = 'Complete Shipment';
			$this->btnCompleteShipment->AddAction(new QClickEvent(), new QAjaxAction('btnCompleteShipment_Click'));
			$this->btnCompleteShipment->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnCompleteShipment, 2);
		}
		
		// Create and Setup btnCancelShipment
		protected function btnCancelShipment_Create() {
			$this->btnCancelShipment = new QButton($this->pnlCompleteShipment);
			$this->btnCancelShipment->Text = 'Cancel Shipment';
			$this->btnCancelShipment->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to CANCEL this %s?'), 'Shipment')));
			$this->btnCancelShipment->AddAction(new QClickEvent(), new QServerAction('btnCancelShipment_Click'));
			$this->btnCancelShipment->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnCancelShipment, 2);
		}
		
		// Create and Setup btnCancelCompleteShipment
/*		protected function btnCancelCompleteShipment_Create() {
			$this->btnCancelCompleteShipment = new QButton($this->pnlCompleteShipmentLabels);
			$this->btnCancelCompleteShipment->Text = 'Cancel Shipment';
			$this->btnCancelCompleteShipment->AddAction(new QClickEvent(), new QAjaxAction('btnCancelCompleteShipment_Click'));
			$this->btnCancelCompleteShipment->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnCancelCompleteShipment, 2);
		}*/
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this->pnlShippingInfo);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
			//$this->btnSave->TabIndex=15;
		}
		
		// Setup btnEdit
		protected function btnEdit_Create() {
			$this->btnEdit = new Qbutton($this->pnlShippingInfo);
			$this->btnEdit->Text = 'Edit';
			$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
			$this->btnEdit->CausesValidation = false;
			QApplication::AuthorizeControl($this->objShipment, $this->btnEdit, 2);
		}

		// Setup btnCancel
		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this->pnlShippingInfo);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
			//$this->btnCancel->TabIndex=16;
		}
		
		// Setup AddAsset Button
		protected function btnAddAsset_Create() {
			$this->btnAddAsset = new QButton($this->pnlShippingInfo);
			$this->btnAddAsset->Text = 'AddAsset';
			$this->btnAddAsset->AddAction(new QClickEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->btnAddAsset->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddAsset_Click'));
			$this->btnAddAsset->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnAddAsset->CausesValidation = false;
			$this->btnAddAsset->TabIndex=16;
		}
		
		// Create the lookup button
		protected function btnLookup_Create() {
			$this->btnLookup = new QButton($this->pnlShippingInfo);
			$this->btnLookup->Text = 'Lookup';
			$this->btnLookup->AddAction(new QClickEvent(), new QAjaxAction('btnLookup_Click'));
			$this->btnLookup->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnLookup_Click'));
			$this->btnLookup->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnLookup->CausesValidation = false;
		}
		
		// Setup Add Inventory Button
		protected function btnAddInventory_Create() {
			$this->btnAddInventory = new QButton($this->pnlShippingInfo);
			$this->btnAddInventory->Text = 'Add';
			$this->btnAddInventory->AddAction(new QClickEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->btnAddInventory->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAddInventory_Click'));
			$this->btnAddInventory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnAddInventory->CausesValidation = false;
		}		

		//******************
		// ONSELECT METHODS
		// These methods are run every time a value is selected in their respective inputs
		//******************
		
		// This is run every time a 'From Company' is selected
		// It loads the values for the 'From Address' and 'From Contact' drop-downs for the selected company 
		protected function lstFromCompany_Select() {
			if ($this->lstFromCompany->SelectedValue) {
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
								if ($SelectedAddressId == $objFromAddress->AddressId) {
									$objListItem->Selected = true;
								}
								$this->lstFromAddress->AddItem($objListItem);
							}
							$this->lstFromAddress->Enabled = true;
						}
					}
				}
			}
		}
		
		// This is run every time a 'To Company' is selected
		// It loads the values for the 'To Address' and 'To Contact' drop-downs for the selected company 
		protected function lstToCompany_Select() {
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
		
		// This method is run when a Courier is selected
		// Decides whether to enable the courier text box, loads the ShippingAccount list or enables the ShippingAccount text box.
		protected function lstCourier_Select() {
			// If a value is selected (not including 'Other', where the value is null)
			if ($this->lstCourier->SelectedValue) {
				// Do not enable custom courier text box
				$this->txtCourierOther->Text = '';
				$this->txtCourierOther->Enabled = false;
				// Reload the shipping account list box for only accounts for this courier
				$SelectedShippingAccountId = $this->lstShippingAccount->SelectedValue;
				$this->lstShippingAccount->RemoveAllItems();
				if (!$this->blnEditMode) {
					$this->lstShippingAccount->AddItem('- Select One -', null);
				}
				$objShippingAccountArray = ShippingAccount::LoadArrayByCourierId($this->lstCourier->SelectedValue, QQ::Clause(QQ::OrderBy(QQN::ShippingAccount()->ShortDescription)));
				if ($objShippingAccountArray) foreach ($objShippingAccountArray as $objShippingAccount) {
					$objListItem = new QListItem($objShippingAccount->__toString(), $objShippingAccount->ShippingAccountId);
					if (($this->objShipment->ShippingAccount) && ($this->objShipment->ShippingAccount->ShippingAccountId == $objShippingAccount->ShippingAccountId))
						$objListItem->Selected = true;
					$this->lstShippingAccount->AddItem($objListItem);
				}
				// Setting the third parameter to true makes the item selected
				// If 'Other' was already selected as the Shipping Account
				if (!$SelectedShippingAccountId && $this->blnEditMode) {
					$this->lstShippingAccount->AddItem('Other', null, true);
				}
				else {
					$this->lstShippingAccount->AddItem('Other', null);
				}
			}
			elseif ($this->lstCourier->SelectedName == 'Other') {
				$this->txtCourierOther->Enabled = true;
				$this->lstShippingAccount->RemoveAllItems();
				if (!$this->blnEditMode) {
					$this->lstShippingAccount->AddItem('- Select One -', null);
				}
				$this->lstShippingAccount->AddItem('Other', null, true);
				$this->lstFxServiceType->RemoveAllItems();
				$this->lstFxServiceType->Enabled = false;
				$this->lstFxServiceType->Required = false;
			}
			$this->lstShippingAccount->Enabled = true;
			$this->lstShippingAccount_Select();
		}

		protected function lstFxServiceType_Update() {
			
			$this->lstFxServiceType->RemoveAllItems();
			$this->lstFxServiceType->Enabled = false;
			$this->lstFxServiceType->Required = false;			

			if ($this->lstCourier->SelectedValue == 1 && $this->lstToAddress->SelectedValue && $this->lstFromAddress->SelectedValue && $this->lstShippingAccount->SelectedValue)
			{			
				$this->lstFxServiceType->Enabled = true;
				$this->lstFxServiceType->Required = true;
				$this->lstFxServiceType->AddItem('- Select One -', null);
				
				$objFedexServiceTypeArr = FedexServiceType::LoadAll(QQ::Clause(QQ::OrderBy(QQN::FedexServiceType()->ShortDescription)));
				if ($objFedexServiceTypeArr) foreach ($objFedexServiceTypeArr as $objFedexServiceType) {
					$objListItem = new QListItem($objFedexServiceType->ShortDescription, $objFedexServiceType->FedexServiceTypeId);
					if ($this->objShipment->FedexServiceTypeId == $objFedexServiceType->FedexServiceTypeId) {
						$objListItem->Selected = true;
					}
					$this->lstFxServiceType->AddItem($objListItem);
				}
			}
		}

		// Fill the txtToPhone field with the ToContact's phone number if it exists
		protected function lstToContact_Select() {
			
			if ($this->lstToContact->SelectedValue) {
				$objContact = Contact::Load($this->lstToContact->SelectedValue);
				if ($objContact) {
					if ($objContact->PhoneOffice) {
						$this->txtToPhone->Text = $objContact->PhoneOffice;
					}
				}
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
			$this->lstFxServiceType_Update();
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
			$this->lstFxServiceType_Update();
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
					// echo("How About HERE"); exit;
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
		
		//************************
		// ONCLICK BUTTON METHODS
		// These methods are run when buttons are clicked
		//************************
		
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
		}		
		
		// AddAsset Button Click
		public function btnAddAsset_Click($strFormId, $strControlId, $strParameter) {
			
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
						$this->txtNewAssetCode->Warning = "That asset code does not exist.";
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
					elseif ($objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
						$blnError = true;
						$this->txtNewAssetCode->Warning = "That asset was already scheduled for shipment.";
					}
					elseif ($this->lblAdvanced->Text == 'Hide Advanced' && $this->chkScheduleReceipt->Checked && $this->rblAssetType->SelectedValue == 'new' && !$this->chkAutoGenerateAssetCode->Checked && $this->txtReceiptAssetCode->Text == '') {
						$blnError = true;
						$this->txtReceiptAssetCode->Warning = "You must provide an asset code for the new asset.";
					}
						// Create a new, but incomplete AssetTransaction
					if (!$blnError) {
						// Clear out the AssetCode field
						$this->txtNewAssetCode->Text = null;
						$objNewAssetTransaction = new AssetTransaction();
						// $objNewAssetTransaction->Asset = $objNewAsset;
						$objNewAssetTransaction->AssetId = $objNewAsset->AssetId;
						$objNewAssetTransaction->SourceLocationId = $objNewAsset->LocationId;
						// If scheduling a receipt for this asset
						if ($this->lblAdvanced->Text == "Hide Advanced" && $this->chkScheduleReceipt->Checked) {
							// If creating a new asset
							if ($this->rblAssetType->SelectedValue == 'new') {
								$objReceiptAsset = new Asset();
								// AssetId must be set so that it can be assigned to the AssetTransaction
								$objReceiptAsset->AssetId = 0;
								// The new receipt asset will be the same AssetModel as the asset being shipped (but a new asset)
								$objReceiptAsset->AssetModelId = $objNewAsset->AssetModelId;
								// Set Location to TBR
								$objReceiptAsset->LocationId = 5;
								// Set the asset code to empty so that we'll know to auto generate later
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
						}
						$this->objAssetTransactionArray[] = $objNewAssetTransaction;
						$this->blnModifyAssets = true;
					}
				}
			}
			else {
				$this->txtNewAssetCode->Warning = 'Please enter an asset code.';
				$blnError = true;
			}
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
						$this->blnModifyAssets = true;
						unset ($this->objAssetTransactionArray[$key]);
					}
				}
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
			}
		}
		
		// Lookup Button Click - looks up an inventory model, loads the inventorylocation listbox
		// Enables InventoryLocation list and txtQuantity
		public function btnLookup_Click($strFormId, $strControlId, $strParameter) {
			
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
					
					// Check to see if that InventoryLocation has some quantity scheduled for shipment
					// If so, make sure that there is enough inventory available to add the new quantity.
					// This can be made faster by making a more targeted SQL query
					else {
						$objExpansionMap[InventoryTransaction::ExpandTransaction] = true;
						$objInventoryTransactionArray = InventoryTransaction::LoadArrayByInventoryLocationId($objNewInventoryLocation->InventoryLocationId, null, null, $objExpansionMap);
						if ($objInventoryTransactionArray) {
							$intQuantityScheduled = 0;
							foreach ($objInventoryTransactionArray as $objInventoryTransaction) {
								// If there is a pending shipment
								if ($objInventoryTransaction->Transaction->TransactionTypeId == 6) {
/*
									QCodo Beta3 is not generating a LoadArrayByTransactionId method anymore. Instead, it generates LoadByTransactionId.
									That is actually better, so we will use that from now on.
									$objShipmentArray = Shipment::LoadArrayByTransactionId($objInventoryTransaction->TransactionId);
									if ($objShipmentArray) {
										foreach ($objShipmentArray as $objShipment) {
											if (!$objShipment->ShippedFlag) {
												$intQuantityScheduled += $objInventoryTransaction->Quantity;
											}
										}
									}*/
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
					}
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

			//if (!$this->lstPackageType->SelectedValue) {
			//	$blnError = true;
			//	$this->lstPackageType->Warning = "Please select a package type.";
			//}
			if (!$this->txtPackageWeight->Text) {
				$blnError = true;
				$this->txtPackageWeight->Warning = "Please enter a weight for this package.";
			}
			if (!$this->lstWeightUnit->SelectedValue) {
				$blnError = true;
				$this->lstWeightUnit->Warning = "Please select a weight unit.";
			}
			if (!$this->txtValue->Text) {
				$blnError = true;
				$this->txtValue->Warning = "Please enter a value.";
			}
			if (!$this->lstCurrencyUnit->SelectedValue) {
				$blnError = true;
				$this->lstCurrencyUnit->Warning = "Please select a currency type.";
			}
			
			if(!$blnError && $this->objShipment->CourierId == 1) {
				if ($this->FedEx()) {
					$blnError = false;
				}
				else {
					$blnError = true;
				}
			}
			
			if (!$blnError) {
				
				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();
				
					if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Asset) {
						
						$objTransaction = '';
						$objReceipt = '';
						
						// Assign a destinationLocation to the AssetTransaction, and change the Location of the asset
						foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
							if ($objAssetTransaction->Asset instanceof Asset) {
							
								// LocationId #2 == Shipped
								$DestinationLocationId = 2;
								
								$objAssetTransaction->Asset->LocationId = $DestinationLocationId;
								$objAssetTransaction->Asset->Save();
								
								$objAssetTransaction->DestinationLocationId = $DestinationLocationId;
								$objAssetTransaction->Save();
								
								if ($objAssetTransaction->ScheduleReceiptFlag) {
									// If it doesn't exist, create a new transaction object and receipt object
									if (!($objTransaction instanceof Transaction) && !($objReceipt instanceof Receipt)) {
										$objTransaction = new Transaction();
										// Transaction is asset only
										$objTransaction->EntityQtypeId = 1;
										// Transaction is a receipt
										$objTransaction->TransactionTypeId = 7;
										// Set a note showing how this receipt was created
										$objTransaction->Note = sprintf('This receipt was automatically created when creating Shipment Number %s.', $this->objShipment->ShipmentNumber);
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
										$objReceipt->ReceiptNumber = Receipt::LoadNewReceiptNumber();
										
										$objReceipt->Save();
									}
									
									$objReceiptAssetTransaction = new AssetTransaction();
									if (!$objAssetTransaction->NewAssetId) {
										$objReceiptAssetTransaction->AssetId = $objAssetTransaction->AssetId;
									}
									else {
										$objReceiptAssetTransaction->AssetId = $objAssetTransaction->NewAssetId;
									}
									$objReceiptAssetTransaction->TransactionId = $objTransaction->TransactionId;
									$objReceiptAssetTransaction->SourceLocationId = $objAssetTransaction->DestinationLocationId;
									$objReceiptAssetTransaction->NewAssetFlag = true;
									$objReceiptAssetTransaction->Save();
								}
							}
						}
					}
					
					if ($intEntityQtypeId == EntityQtype::AssetInventory || $intEntityQtypeId == EntityQtype::Inventory) {
						// Assign different source and destinations depending on transaction type
						foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
							
							// LocationId #2 == Shipped
							$DestinationLocationId = 2;
							
							// Remove the inventory quantity from the source
							$objInventoryTransaction->InventoryLocation->Quantity = $objInventoryTransaction->InventoryLocation->Quantity - $objInventoryTransaction->Quantity;
							$objInventoryTransaction->InventoryLocation->Save();
												
							// Finish the InventoryTransaction and save it
							$objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
							$objInventoryTransaction->Save();
						}
					}
					
					$this->UpdateCompleteShipmentFields();
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
		protected function btnCancelShipment_Click($strFormId, $strControlId, $strParameter) {
			
			// Just delete the transaction and MySQL CASCADE down to shipment, asset_transaction, and inventory_transaction
			$this->objTransaction = Transaction::Load($this->objShipment->TransactionId);
			$this->objTransaction->Delete();
			
			QApplication::Redirect('../shipping/shipment_list.php');
		}
		
		// Cancel/Delete Completed Shipment
/*		protected function btnCancelCompleteShipment_Click($strFormId, $strControlId, $strParameter) {
			
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
				
				// Cancel FedEx Shipment
				if ($this->objShipment->CourierId == 1) {
					if (!$this->FedExCancel()) {
						$objDatabase->TransactionRollback();
						return;
					}
				}
				
				// Set all 'Complete Shipment' information to null
				$this->objShipment->PackageTypeId = null;
				$this->objShipment->PackageWeight = null;
				$this->objShipment->WeightUnitId = null;
				$this->objShipment->PackageLength = null;
				$this->objShipment->PackageWidth = null;
				$this->objShipment->PackageHeight = null;
				$this->objShipment->LengthUnitId = null;
				$this->objShipment->Value = null;
				$this->objShipment->CurrencyUnitId = null;
				$this->objShipment->NotificationFlag = null;
				$this->objShipment->TrackingNumber = null;
				
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
		}*/
		
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
			
			if($this->lstFxServiceType->SelectedValue)
			{			
				$objtoFxAddress = Address::Load($this->lstToAddress->SelectedValue);
				if (!$objtoFxAddress || !$objtoFxAddress->PostalCode || !$objtoFxAddress->CountryId || !$objtoFxAddress->Address1) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "Not a valid To Address.";
				}
				$objfromFxAddress = Address::Load($this->lstFromAddress->SelectedValue);
				if (!$objfromFxAddress || !$objfromFxAddress->PostalCode || !$objfromFxAddress->Address1 || !$objfromFxAddress->CountryId) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "Not a valid From Address.";
				}
				
				$objfromFxContact = Contact::Load($this->lstFromContact->SelectedValue);
				if (!$objfromFxContact) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "Not a valid From Contact.";
				}
				$objfromFxCompany = Company::Load($this->lstFromCompany->SelectedValue);
				if (!$objfromFxCompany) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "Not a valid From Company.";
				}
				elseif (!$objfromFxCompany->Telephone) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "The Shipping Company must have a telephone number.";
				}
		
				$objShippingAccount = ShippingAccount::Load($this->lstShippingAccount->SelectedValue);
				if (!$objShippingAccount) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "Not a valid Shipping Account.";
				}			
/*				$fed = new FedExDC($objShippingAccount->Value);
				
				$aRet = $fed->subscribe(
					array(
						1 => $this->lblShipmentNumber->Text, // Don't really need this but can be used for ref
						4003 => $objfromFxContact->__toString(),
						4008 => $objfromFxAddress->Address1,
						4009 => $objfromFxAddress->Address2,
						4011 => $objfromFxAddress->City,
						4012 => $objfromFxAddress->__toStringStateProvinceAbbreviation(),
						4013 => $objfromFxAddress->PostalCode,
						4014 => $objfromFxAddress->__toStringCountryAbbreviation(),
						4015 => $this->FxStrip($objfromFxCompany->Telephone),
					)
				);
				
				if ($error = $fed->getError()) {
					$blnError = true;
					$this->lstFxServiceType->Warning = $error;
				}
				elseif (!$aRet[498]) {
					$blnError = true;
					$this->lstFxServiceType->Warning = "Fedex response is improperly formed.";
				}
				else {
					$this->objShipment->FedexMeterNumber = $aRet[498];
				}*/
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
										if ($objReceiptAsset->AssetCode == '') {
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
								if (!$objAssetTransaction->AssetTransactionId) {
									$objAssetTransaction->TransactionId = $this->objTransaction->TransactionId;
									// Save the asset just to update the modified_date field so it can trigger an Optimistic Locking Exception when appropriate
									$objAssetTransaction->Asset->Save();
									// Create the new asset if it was scheduled for receipt
									if ($objAssetTransaction->ScheduleReceiptFlag && $objAssetTransaction->NewAsset && $objAssetTransaction->NewAsset instanceof Asset) {
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
									// $DestinationLocationId = 2; // Shipped
									// $objAssetTransaction->DestinationLocationId = $DestinationLocationId;
									// $objAssetTransaction->Asset->LocationId = $DestinationLocationId;
									// $objAssetTransaction->Asset->Save();
									$objAssetTransaction->Save();
								}
							}
						}
						
						// Remove InventoryTransactions
						if ($this->arrInventoryTransactionToDelete) {
							foreach ($this->arrInventoryTransactionToDelete as $intInventoryTransactionId) {
								$objInventoryTransactionToDelete = InventoryTransaction::Load($intInventoryTransactionId);
								// Make sure that it wasn't added then removed
								if ($objInventoryTransactionToDelete) {
									// Change back the quantity
									$objInventoryTransactionToDelete->InventoryLocation->Quantity += $objInventoryTransactionToDelete->Quantity;
									$objInventoryTransactionToDelete->InventoryLocation->Save();
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
						$objDatabase->TransactionCommit();
						$this->UpdateShipmentLabels();
						$this->SetupShipment();
						$this->DisplayLabels();
						
						if ($this->objShipment->CourierId == 1) {
							$this->txtTrackingNumber->Enabled = false;
							$this->lstPackageType->Enabled = true;
						}
						else {
							$this->txtTrackingNumber->Enabled = true;
							$this->lstPackageType->Enabled = false;
						}
						
						// Reload lstPackageType 
						$this->lstPackageType->RemoveAllItems();
						$this->LoadPackageTypes();
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
			$this->objShipment->TransactionId = $this->objTransaction->TransactionId;
			if ($this->blnEditMode) {
				$this->objShipment->ShipmentNumber = $this->lblShipmentNumber->Text;
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
			$this->objShipment->ToPhone = $this->txtToPhone->Text;
			$this->objShipment->CourierId = $this->lstCourier->SelectedValue;
			$this->objShipment->CourierOther = $this->txtCourierOther->Text;
			$this->objShipment->ShippingAccountId = $this->lstShippingAccount->SelectedValue;
			$this->objShipment->ShippingAccountOther = $this->txtShippingAccountOther->Text;
			$this->objShipment->Reference = $this->txtReference->Text;
			$this->objShipment->FedexServiceTypeId = $this->lstFxServiceType->SelectedValue;
			
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
			$this->lstToContact_Select();
			$this->lstFromCompany->SelectedValue = $this->objShipment->FromCompanyId;
			$this->lstFromContact->SelectedValue = $this->objShipment->FromContactId;
			$this->calShipDate->DateTime = $this->objShipment->ShipDate;
			$this->lstFromAddress->SelectedValue = $this->objShipment->FromAddressId;
			$this->lstToCompany->SelectedValue = $this->objShipment->ToCompanyId;
			$this->lstToCompany_Select();
			$this->lstToAddress->SelectedValue = $this->objShipment->ToAddressId;
			$this->lstToAddress_Select();
			$this->txtToPhone->Text = $this->objShipment->ToPhone;
			$this->lstCourier->SelectedValue = $this->objShipment->CourierId;
			$this->lstCourier_Select();
			$this->txtCourierOther->Text = $this->objShipment->CourierOther;
			$this->lstShippingAccount->SelectedValue = $this->objShipment->ShippingAccountId;
			$this->lstShippingAccount_Select();
			$this->txtShippingAccountOther->Text = $this->objShipment->ShippingAccountOther;
			$this->txtReference->Text = $this->objShipment->Reference;
			$this->txtNote->Text = $this->objShipment->Transaction->Note;
			$this->lstFxServiceType->SelectedValue = $this->objShipment->FedexServiceTypeId;
		}
		
		// Update Complete Shipment Information
		// Assigns Complete Shipment values to the Shipment Object
		protected function UpdateCompleteShipmentFields() {
			$this->objShipment->PackageTypeId = $this->lstPackageType->SelectedValue;
			$this->objShipment->PackageWeight = $this->txtPackageWeight->Text;
			$this->objShipment->WeightUnitId = $this->lstWeightUnit->SelectedValue;
			$this->objShipment->PackageLength = $this->txtPackageLength->Text;
			$this->objShipment->PackageWidth = $this->txtPackageWidth->Text;
			$this->objShipment->PackageHeight = $this->txtPackageHeight->Text;
			$this->objShipment->LengthUnitId = $this->lstLengthUnit->SelectedValue;
			// Strip any commas or dollar signs from the declared value field
			$this->objShipment->Value = str_ireplace("$", "", str_ireplace(",", "", $this->txtValue->Text));
			$this->objShipment->CurrencyUnitId = $this->lstCurrencyUnit->SelectedValue;
			$this->objShipment->NotificationFlag = $this->chkNotificationFlag->Checked;
			$this->objShipment->TrackingNumber = $this->txtTrackingNumber->Text;
		}
		
		// Load the Package Type options for the Shipment
		protected function LoadPackageTypes() {
			$this->lstPackageType->AddItem('- Select One -', null);
			$objPackageTypeArray = PackageType::LoadAll(QQ::Clause(QQ::OrderBy(QQN::PackageType()->ShortDescription)));
			if ($objPackageTypeArray) foreach ($objPackageTypeArray as $objPackageType) {
		
				// FedexServiceTypeId 6 = 'FedEx Ground', PackageTypeId 1 = 'Other Packaging'
				// For FedEx Ground shipments, allow only 'Other Packaging'
				if ($this->objShipment->FedexServiceTypeId == 6 && $objPackageType->PackageTypeId !== 1) {
					continue;
				}
				$objListItem = new QListItem($objPackageType->__toString(), $objPackageType->PackageTypeId);
				if (($this->objShipment->PackageType) && ($this->objShipment->PackageType->PackageTypeId == $objPackageType->PackageTypeId))
					$objListItem->Selected = true;
				$this->lstPackageType->AddItem($objListItem);
			}
		}
		
		// Fedex	
		protected function FedEx(){
			
			// create new FedExDC object
			// $fed = new FedExDC($this->objShipment->ShippingAccount->Value);
			
			$fxWeightUnit = WeightUnit::Load($this->lstWeightUnit->SelectedValue);
			$fxLengthUnit = LengthUnit::Load($this->lstLengthUnit->SelectedValue);
			if ($fxLengthUnit) {
				$fxLengthUnitShortDescription = $fxLengthUnit->ShortDescription;
			}
			else {
				$fxLengthUnitShortDescription = '';
			}
			
			// Package Type
			$fxPackageType = PackageType::Load($this->lstPackageType->SelectedValue);
			
			//$fxPackageCount // Not implemented yet - FIXME
			
			$shipdate = $this->FxStrip($this->calShipDate->DateTime->__toString(QDateTime::FormatSoap));
			$shipdate = substr($shipdate,0,8);
			
			// create new FedExDC object
			// $fed = new FedExDC($this->objShipment->ShippingAccount->Value, $this->objShipment->FedexMeterNumber);
			if ($this->objShipment->ShippingAccountId) {
				$fed = new FedExDC($this->objShipment->ShippingAccount->Value, QApplication::$TracmorSettings->FedexMeterNumber);
			}
			else {
				$fed = new FedExDC($this->objShipment->ShippingAccountOther, QApplication::$TracmorSettings->FedexMeterNumber);
			}
			
			if ($this->objShipment->ToPhone) {
				$strRecipientPhone = $this->objShipment->ToPhone;
			}
			else {
				$strRecipientPhone = '';
			}
				
			//If Shipment Notification checkbox is checked
			if($this->chkNotificationFlag->Checked)
			{
				$notify = 'Y';
			}
			else
			{
				$notify = 'N';
			}
			
			if(($this->objShipment->FromAddress->__toStringCountryAbbreviation() != $this->objShipment->ToAddress->__toStringCountryAbbreviation()) && ($this->objShipment->FromAddress->__toStringCountryAbbreviation() <> 'US' || $this->objShipment->ToAddress->__toStringCountryAbbreviation() != 'CA') && ($this->objShipment->ToAddress->__toStringCountryAbbreviation() != 'US' || $this->objShipment->FromAddress->__toStringCountryAbbreviation() != 'CA'))
			{
				$fxIntlSSN = ''; //$this->objShipment->FromContact->Social								//Sender's SSN				
				$fxCurrencyUnit = CurrencyUnit::Load($this->lstCurrencyUnit->SelectedValue);
				$fxIntlCurrencyUnit = $fxCurrencyUnit->ShortDescription;								//Recipient Currency				
				$fxIntlCustomsValue = number_format(round($this->txtValue->Text,2), 2, '.', '');		//Total Customs Value
				$fxIntlDutiesPayType = '1';																//Duties Pay Type
				$fxIntlTermsofSale = '1';																//Terms of Sale
				$fxIntlPartiestoTransation = 'N';														//Parties to Transaction
			}
			else
			{
				$fxIntlSSN = '';																		//Sender's SSN				
				$fxIntlCurrencyUnit = '';																//Recipient Currency			
				$fxIntlCustomsValue = '';																//Total Customs Value
				$fxIntlDutiesPayType = '';																//Duties Pay Type
				$fxIntlTermsofSale = '';																//Terms of Sale
				$fxIntlPartiestoTransation = '';														//Parties to Transaction			
			}

				$fdx_arr = array(
						1 => $this->lblShipmentNumber->Text,											//Shipment #
						4 => $this->objShipment->FromCompany->__toString(),								//Sender Company
						32 => $this->objShipment->FromContact->__toString(),							//Sender Contact
						5 => $this->objShipment->FromAddress->Address1,									//Sender Address1
						6 => $this->objShipment->FromAddress->Address2,									//Sender Address2
						7 => $this->objShipment->FromAddress->City,										//Sender City
						8 => $this->objShipment->FromAddress->__toStringStateProvinceAbbreviation(),	//Sender State
						9 => $this->objShipment->FromAddress->PostalCode,								//Sender Zip
						117 => $this->objShipment->FromAddress->__toStringCountryAbbreviation(), 		//Sender Country
						183 => $this->FxStrip($this->objShipment->FromCompany->Telephone),				//Sender Phone
						11 => $this->objShipment->ToCompany->__toString(),								//Recipient Company
						12 => $this->objShipment->ToContact->__toString(),								//Recipient Contact
						13 => $this->objShipment->ToAddress->Address1,									//Recipient Address1
						14 => $this->objShipment->ToAddress->Address2,									//Recipient Address2
						15 => $this->objShipment->ToAddress->City,										//Recipient City
						16 => $this->objShipment->ToAddress->__toStringStateProvinceAbbreviation(),		//Recipient State
						17 => $this->objShipment->ToAddress->PostalCode,								//Recipient Zip
						18 => $this->FxStrip($strRecipientPhone),										//Recipient Phone
						50 => $this->objShipment->ToAddress->__toStringCountryAbbreviation(),			//Recipient Country
						57 => round($this->txtPackageHeight->Text,0),									//Package Height
						58 => round($this->txtPackageWidth->Text,0),									//Package Width
						59 => round($this->txtPackageLength->Text,0),									//Package Length
						23 => '1',																		//Recipient Pay Type ; 1 = Bill Sender (prepaid)
						75 => strtoupper($fxWeightUnit->ShortDescription),								//Weight Units
						1116 => strtoupper(substr($fxLengthUnitShortDescription,0,1)),					//Volume Units
						1273 => $fxPackageType->Value,													//Packaging Type ; 01 = Customer Packaging
						1274 => $this->objShipment->FedexServiceType->Value,							//Service Type ; 01 = Fedex Priority
						1333 => '1',																	//Drop off Type ; 1 = Regular Pickup
						1368 => 2,																		//Label Type ; 2 = 2D Common
						1369 => 1,																		//Label Printer Type ; 1 = Laser Printer
						1370 => 5,																		//Label Media Type ; 5 = Plain Paper
						1401 => number_format(round($this->txtPackageWeight->Text, 1), 1, '.', ''),		//Total Package Weight
						1201 => $this->objShipment->FromContact->Email,									//Sender EMail
						1204 => $this->objShipment->ToContact->Email,									//Recipient EMail
						1206 => $notify,																//EMail Shipped Flag
						1139 => $fxIntlSSN,																//Sender's SSN
						68 => $fxIntlCurrencyUnit,														//Recipient Currency
						1411 =>	$fxIntlCustomsValue,													//Total Customs Value
						70 => $fxIntlDutiesPayType,														//Duties Pay Type
						72 => $fxIntlTermsofSale,														//Terms of Sale
						73 => $fxIntlPartiestoTransation,												//Parties to Transaction
						79 => '',																		//Description of Contents
						80 => '',																		//Country of Manufacture
						24 => $shipdate,																//Ship Date
						1119 => 'Y',																		//Future Shipment Date Flag
						25 => $this->objShipment->Reference					// Customer Reference
				);

			if($this->objShipment->FedexServiceType->Value	== '92')
			{	
				$ship_Ret = $fed->ground_ship($fdx_arr);
			}
			else
			{
				$ship_Ret = $fed->express_ship($fdx_arr);
			}
		
			if($error = $fed->getError()) 
			{
				$blnError = true;
				$this->btnCompleteShipment->Warning = $error;
				return false;
			}
			else 
			{
				// decode and save label
				$this->txtTrackingNumber->Text = $ship_Ret[29];
				$fed->label('../images/shipping_labels/fedex/' . QApplication::$TracmorSettings->ImageUploadPrefix . $this->objShipment->ShipmentNumber . '.png');
				return true;
			}
		}
		
		// Cancel a FedEx shipment using the FedExDC class
		protected function FedExCancel(){
			
			// create new FedExDC object
			$fed = new FedExDC($this->objShipment->ShippingAccount->Value, QApplication::$TracmorSettings->FedexMeterNumber);
			
			// Populate an array with the necessary information
			$fdx_arr = array(
					1 => $this->objShipment->ShipmentNumber,											//Shipment #
					29 => $this->objShipment->TrackingNumber											//Tracking Number
			);
			
			// If ground service
			if($this->objShipment->FedexServiceType->Value	== '92')
			{	
				$cancel_Ret = $fed->ground_cancel($fdx_arr);
			}
			// If express service
			else
			{
				$cancel_Ret = $fed->express_cancel($fdx_arr);
			}

			// If there is an error, display it and return false
			if($error = $fed->getError()) 
			{
				$this->btnCancelCompleteShipment->Warning = $error;
				return false;
			}
			else 
			{
				return true;
			}
		}		
		
		// Strip function -- remove '-' and '(' and ')'
		protected function FxStrip($txtValue) {
			$txtValue = str_replace('-','',$txtValue);
			$txtValue = str_replace('(','',$txtValue);
			$txtValue = str_replace(')','',$txtValue);
			$txtValue = str_replace(' ','',$txtValue);
			
			return $txtValue;
		}


		protected function DisplayLabels() {
			
			// Hide Inputs
			$this->calShipDate->Display = false;
			$this->lstFromCompany->Display = false;
			$this->lstFromContact->Display = false;
			$this->lstFromAddress->Display = false;
			$this->lstToCompany->Display = false;
			$this->lstToContact->Display = false;
			$this->txtToPhone->Display = false;
			$this->lstToAddress->Display = false;
			$this->lblToAddressFull->Display = false;
			$this->lstCourier->Display = false;
			$this->lstFxServiceType->Display = false;
			$this->txtCourierOther->Display = false;
			$this->lstShippingAccount->Display = false;
			$this->txtShippingAccountOther->Display = false;
			$this->txtReference->Display = false;
			$this->txtNote->Display = false;
			$this->txtNewAssetCode->Display = false;
			if ($this->lblAdvanced->Text == 'Hide Advanced') {
				$this->lblAdvanced_Click($this->FormId, $this->lblAdvanced->ControlId, null);
			}
			$this->lblAdvanced->Display = false;
			$this->btnAddAsset->Display = false;
			$this->txtNewInventoryModelCode->Display = false;
			$this->btnLookup->Display = false;
			$this->lstSourceLocation->Display = false;
			$this->txtQuantity->Display = false;
			$this->btnAddInventory->Display = false;
			$this->btnSave->Display = false;
			$this->btnCancel->Display = false;
			if ($this->blnEditMode) {
				$this->dtgAssetTransact->RemoveColumnByName('Action');
				$this->dtgInventoryTransact->RemoveColumnByName('Action');
			}
			
			// Display Labels
			$this->lblShipDate->Display = true;
			$this->lblFromCompany->Display = true;
			$this->lblFromContact->Display = true;
			$this->lblFromAddress->Display = true;
			$this->lblToCompany->Display = true;
			$this->lblToContact->Display = true;
			$this->lblToPhone->Display = true;
			$this->lblToAddress->Display = true;
			$this->lblCourier->Display = true;
			$this->lblShippingAccount->Display = true;
			if ($this->lblFxServiceType->Text != '') {
				$this->lblFxServiceType->Display = true;
			}
			else {
				$this->lblFxServiceType->Display = false;
			}
			$this->lblReference->Display = true;
			$this->pnlNote->Display = true;
			$this->btnEdit->Display = true;
			// This is not necessary, because this method is only being called in EditMode
			if ($this->blnEditMode) {
				$this->btnCompleteShipment->Enabled = true;
			}
		}
		
		// Update the 'Text' values for all shipment labels for an ajax reload
		protected function UpdateShipmentLabels() {
			$this->lblShipDate->Text = $this->objShipment->ShipDate->__toString();
			$this->lblFromCompany->Text = $this->objShipment->FromCompany->__toString();
			$this->lblFromContact->Text = $this->objShipment->FromContact->__toString();
			$this->lblFromAddress->Text = $this->objShipment->FromAddress->__toString();
			$this->lblToCompany->Text = $this->objShipment->ToCompany->__toString();
			$this->lblToContact->Text = $this->objShipment->ToContact->__toString();
			$this->lblToPhone->Text = $this->objShipment->ToPhone;
			$this->lblToAddress->Text = $this->objShipment->ToAddress->__toString();
			if ($this->objShipment->CourierId) {
				$this->lblCourier->Text = $this->objShipment->Courier->__toString();
			}
			$this->lblCourier->Text = $this->objShipment->CourierOther;
			if ($this->objShipment->ShippingAccountId) {
				$this->lblShippingAccount->Text = $this->objShipment->ShippingAccount->__toString();
			}
			$this->lblShippingAccount->Text = $this->objShipment->ShippingAccountOther;
			if ($this->objShipment->FedexServiceTypeId) {
				$this->lblFxServiceType->Text = $this->objShipment->FedexServiceType->__toString();
			}
			else {
				$this->lblFxServiceType->Text = '';
			}
			$this->lblReference->Text = $this->objShipment->Reference;
			$this->pnlNote->Text = nl2br($this->objShipment->Transaction->Note);
		}		
		
		protected function DisplayInputs() {
			
			// Hide Labels
			$this->lblShipDate->Display = false;
			$this->lblFromCompany->Display = false;
			$this->lblFromContact->Display = false;
			$this->lblFromAddress->Display = false;
			$this->lblToCompany->Display = false;
			$this->lblToContact->Display = false;
			$this->lblToPhone->Display = false;
			$this->lblToAddress->Display = false;
			$this->lblCourier->Display = false;
			$this->lblShippingAccount->Display = false;
			$this->lblFxServiceType->Display = false;
			$this->lblReference->Display = false;
			$this->pnlNote->Display = false;
			$this->btnEdit->Display = false;
			if ($this->blnEditMode) {
				$this->btnCompleteShipment->Enabled = false;
			}			
			
			// Show Inputs
			$this->calShipDate->Display = true;
			$this->lstFromCompany->Display = true;
			$this->lstFromContact->Display = true;
			$this->lstFromAddress->Display = true;
			$this->lstToCompany->Display = true;
			$this->lstToContact->Display = true;
			$this->txtToPhone->Display = true;
			$this->lstToAddress->Display = true;
			$this->lblToAddressFull->Display = true;
			$this->lstCourier->Display = true;
			$this->lstFxServiceType_Update();
			$this->lstFxServiceType->Display = true;			
			$this->txtCourierOther->Display = true;
			$this->lstShippingAccount->Display = true;
			$this->txtShippingAccountOther->Display = true;
			$this->txtReference->Display = true;
			$this->txtNote->Display = true;
			$this->txtNewAssetCode->Display = true;
			$this->lblAdvanced->Display = true;
			$this->btnAddAsset->Display = true;
			$this->txtNewInventoryModelCode->Display = true;
			$this->btnLookup->Display = true;
			$this->lstSourceLocation->Display = true;
			$this->txtQuantity->Display = true;
			$this->btnAddInventory->Display = true;
			$this->btnSave->Display = true;
			$this->btnCancel->Display = true;
			if ($this->blnEditMode) {
	    	$this->dtgAssetTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveAssetColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    	$this->dtgInventoryTransact->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveInventoryColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
			}
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/shipment_edit.php.inc as the included HTML template file
	ShipmentEditForm::Run('ShipmentEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/shipping/shipment_edit.tpl.php');
?>