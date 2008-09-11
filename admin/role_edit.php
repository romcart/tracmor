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

// Include prepend.inc to load Qcodo
require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
QApplication::Authenticate();
// Include the classfile for RoleEditFormBase
require(__FORMBASE_CLASSES__ . '/RoleEditFormBase.class.php');
require(__DOCROOT__ . __SUBDIRECTORY__ . '/admin/FieldLevelAuthPanel.class.php');
require(__DOCROOT__ . __SUBDIRECTORY__ . '/includes/qcodo/qform/QFieldLevelAuthComposite.php');
/**
 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
 * of the Role class.  It extends from the code-generated
 * abstract RoleEditFormBase class.
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
class RoleEditForm extends RoleEditFormBase {

	// Header Menu
	protected $ctlHeaderMenu;

	protected $objModuleArray;
	protected $objAuthorizationArray;
	protected $objRoleModuleAuthorizationArray;
	protected $arrControls;
	protected $lblHeaderRole;

	protected $pnlAssets;
	protected $pnlAssetModel;
	protected $pnlInventory;
	protected $pnlCompany;
	protected $pnlContact;
	protected $pnlAddress;
	protected $pnlShipping;
	protected $pnlReceiving;



	// Boolean that toggles FieldLevelAuth display
	public $blnAssetsAdvanced;
	public $blnInventoryAdvanced;
	public $blnContactsAdvanced;
	public $blnShippingAdvanced;
	public $blnReceivingAdvanced;
		
	public $lblAssetsAdvanced;
	public $lblInventoryAdvanced;
	public $lblContactsAdvanced;
	public $lblShippingAdvanced;
	public $lblReceivingAdvanced;
		

	protected function Form_Create() {
		//QApplication::$Database[1]->EnableProfiling();

		// Call SetupRole to either Load/Edit Existing or Create New
		$this->SetupRole();
			
		// Create the Header Menu
		$this->ctlHeaderMenu_Create();

		// Create/Setup Controls for Role's Data Fields
		$this->txtShortDescription_Create();
		$this->txtLongDescription_Create();
		$this->lblHeaderRole_Create();
			
		// Load an array of all modules
		//$this->objModuleArray = Module::LoadAll();
		$this->objModuleArray = Module::LoadAllButHome();
		// Load an array of all Authorization types
		$this->objAuthorizationArray = Authorization::LoadAll();
			
			
		// Create/Setup Controls for Authorizations
		$this->arrControls_Create();
			
		// Create/Setup Button Action controls
		$this->btnSave_Create();
		$this->btnCancel_Create();
		$this->btnDelete_Create();
			
		// Create/Setup Panel controls
		//Each Entity will have it's own Feld Level Authorization Grid.
		// The Field Level Authorization Grid will be a composite control instantiated 8 times.
		// The param is ModuleId	
		$this->pnlAssets_Create(2);
		$this->pnlAssetModel_Create(2);
		$this->pnlInventory_Create(3);
		$this->pnlContact_Create(4);
		$this->pnlCompany_Create(4);
		$this->pnlAddress_Create(4);
		$this->pnlShipping_Create(5);
		$this->pnlReceiving_Create(6);
		
		
		//creation of advance labels
		$this->lblAssetsAdvanced_Create();
		$this->lblInventoryAdvanced_Create();
		$this->lblContactsAdvanced_Create();
		$this->lblShippingAdvanced_Create();
		$this->lblReceivingAdvanced_Create();
			
	}

	// Create and Setup the Header Composite Control
	protected function ctlHeaderMenu_Create() {
		$this->ctlHeaderMenu = new QHeaderMenu($this);
	}
	 
	protected function txtShortDescription_Create() {
		parent::txtShortDescription_Create();
		$this->txtShortDescription->CausesValidation = true;
		$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
		$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	// Create/Setup All Authorization Controls
	protected function arrControls_Create() {
			
		if ($this->objModuleArray) {
			foreach ($this->objModuleArray as $objModule) {

				// Create Access List Controls
				$objAccessControl = new QListBox($this);
				$objAccessControl->ActionParameter = $objModule->ModuleId;
				$objAccessControl->Width=100;
				$objAccessControl->CssClass="greentext";
				$objEnabledItem = new QListItem('Enabled', 1, false, null, 'CssClass="greentext"');
				$objDisabledItem = new QListItem('Disabled', 0, false, null, 'CssClass="redtext"');
				if ($this->blnEditMode) {
					$objRoleModule = RoleModule::LoadByRoleIdModuleId($this->objRole->RoleId, $objModule->ModuleId);
					if ($objRoleModule) {
						if ($objRoleModule->AccessFlag) {
							$objEnabledItem->Selected = true;
							$objDisabledItem->Selected = false;
							$objAccessControl->CssClass="greentext";
						}
						else {
							$objEnabledItem->Selected = false;
							$objDisabledItem->Selected = true;
							$objAccessControl->CssClass="redtext";
						}
					}
				}
				// Add Items to Access Control
				$objAccessControl->AddItem($objEnabledItem);
				$objAccessControl->AddItem($objDisabledItem);
				$objAccessControl->AddAction(new QChangeEvent(), new QAjaxAction('lstAccessControl_Select'));			
					
				// Set the List Item objects to null because QCodo will maintain them in the formstate otherwise
				$objEnabledItem = null;
				$objDisabledItem = null;
				$this->arrControls[$objModule->ShortDescription]['access'] = $objAccessControl;
				$objAccessControl = null;
				if ($this->objAuthorizationArray) {
					foreach ($this->objAuthorizationArray as $objAuthorization) {
						// Create Authorization Controls foreach authorization type (view/edit/delete)
						// We could loop through AuthorizationLevels here, but no need to right now
						$objControl = new QListBox($this);
						$objControl->Width = 100;
						$objControl->ActionParameter = $objModule->ModuleId;
						$objAllItem = new QListItem('All', 1);
						$objOwnerItem = new QListItem('Owner', 2);
						$objNoneItem = new QListItem('None', 3);
						if ($this->blnEditMode && $objRoleModule) {
							$objControl->Enabled = ($objRoleModule->AccessFlag) ? true : false;
							$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId($objRoleModule->RoleModuleId, $objAuthorization->AuthorizationId);
							if ($objRoleModuleAuthorization) {
								// Select the Proper Authorization Level
								if ($objRoleModuleAuthorization->AuthorizationLevelId == 1) {
									$objAllItem->Selected = true;
									$objOwnerItem->Selected = false;
									$objNoneItem->Selected = false;
								}
								elseif ($objRoleModuleAuthorization->AuthorizationLevelId == 2) {
									$objAllItem->Selected = false;
									$objOwnerItem->Selected = true;
									$objNoneItem->Selected = false;
								}
								elseif ($objRoleModuleAuthorization->AuthorizationLevelId == 3) {
									$objAllItem->Selected = false;
									$objOwnerItem->Selected = false;
									$objNoneItem->Selected = true;
								}
							}
							// Add the RoleModuleAuthorization to an array so that it can be checked for Optimistic Locking Constraints when saving
							$this->objRoleModuleAuthorizationArray[$objRoleModule->RoleModuleId.'-'.$objAuthorization->AuthorizationId] = $objRoleModuleAuthorization;
							$objRoleModuleAuthorization = null;
						}
						else {
							$objAllItem->Selected = true;
						}
						$objControl->AddItem($objAllItem);
						$objControl->AddItem($objOwnerItem);
						// Do not include the 'None' List Item for View
						// If an administrator does not want to allow for viewing, they should disable access. This eliminates the problem of setting View: None, but Edit: All
						// The problem with View: Owner and Edit: All still exists
						if ($objAuthorization->AuthorizationId != 1) {
							$objControl->AddItem($objNoneItem);
						}
						$objAllItem = null;
						$objOwnerItem = null;
						$objNoneItem = null;
						// Assign the Controls array
						if ($objAuthorization->ShortDescription == 'edit') {
							$objControl->AddAction(new QChangeEvent(), new QAjaxAction('lstEdit_Change'));
							$arrEditControlIdModuleId[] = $objControl->ControlId . "-" . $objModule->ModuleId;
							//$this->lstEdit_Change($this->FormId, $objControl->ControlId, $objModule->ModuleId);
						}
						$this->arrControls[$objModule->ShortDescription][$objAuthorization->ShortDescription] = $objControl;
						$objControl = null;
					}
				}
				$objRoleModule = null;
			}
		}
		foreach ($arrEditControlIdModuleId as $strControlIdModuleId) {
			$arrExplode = explode("-", $strControlIdModuleId);
			$this->lstEdit_Change($this->FormId, $arrExplode[0], $arrExplode[1]);
		}
		// Create control for Move
		$objControl = new QListBox($this);
		$objControl->Width = 100;
		$objAllItem = new QListItem('All', 1);
		$objOwnerItem = new QListItem('Owner', 2);
		$objNoneItem = new QListItem('None', 3);
		$objControl->ActionParameter = 1;
		if ($this->blnEditMode) {
  		$objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId($this->objRole->RoleId,1);
  		if ($objRoleTransactionTypeAuthorization) {
  		  // Select the Proper Authorization Level
  			if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 1) {
  				$objAllItem->Selected = true;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = true;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = true;
  			}
  		}
		}
		$objControl->AddItem($objAllItem);
		$objControl->AddItem($objOwnerItem);
		$objControl->AddItem($objNoneItem);				
		$this->arrControls['move'] = $objControl;
		
		// Create control for Check In/Out
		$objControl = new QListBox($this);
		$objControl->Width = 100;
		$objAllItem = new QListItem('All', 1);
		$objOwnerItem = new QListItem('Owner', 2);
		$objNoneItem = new QListItem('None', 3);
		$objControl->ActionParameter = 2;
		if ($this->blnEditMode) {
  		$objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId($this->objRole->RoleId,2);
  		if ($objRoleTransactionTypeAuthorization) {
  		  // Select the Proper Authorization Level
  			if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 1) {
  				$objAllItem->Selected = true;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = true;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = true;
  			}
  		}
		}
		$objControl->AddItem($objAllItem);
		$objControl->AddItem($objOwnerItem);
		$objControl->AddItem($objNoneItem);				
		$this->arrControls['check_in_out'] = $objControl;
		
		// Create control for Reserve/Unreserve
		$objControl = new QListBox($this);
		$objControl->Width = 100;
		$objAllItem = new QListItem('All', 1);
		$objOwnerItem = new QListItem('Owner', 2);
		$objNoneItem = new QListItem('None', 3);
		$objControl->ActionParameter = 3;
		if ($this->blnEditMode) {
  		$objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId($this->objRole->RoleId,8);
  		if ($objRoleTransactionTypeAuthorization) {
  		  // Select the Proper Authorization Level
  			if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 1) {
  				$objAllItem->Selected = true;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = true;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = true;
  			}
  		}
		}
		$objControl->AddItem($objAllItem);
		$objControl->AddItem($objOwnerItem);
		$objControl->AddItem($objNoneItem);				
		$this->arrControls['reserve_unreserve'] = $objControl;
		
		// Create control for Take Out
		$objControl = new QListBox($this);
		$objControl->Width = 100;
		$objAllItem = new QListItem('All', 1);
		$objOwnerItem = new QListItem('Owner', 2);
		$objNoneItem = new QListItem('None', 3);
		$objControl->ActionParameter = 4;
		if ($this->blnEditMode) {
  		$objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId($this->objRole->RoleId,5);
  		if ($objRoleTransactionTypeAuthorization) {
  		  // Select the Proper Authorization Level
  			if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 1) {
  				$objAllItem->Selected = true;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = true;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = true;
  			}
  		}
		}
		$objControl->AddItem($objAllItem);
		$objControl->AddItem($objOwnerItem);
		$objControl->AddItem($objNoneItem);				
		$this->arrControls['take_out'] = $objControl;
		
		// Create control for Restock
		$objControl = new QListBox($this);
		$objControl->Width = 100;
		$objAllItem = new QListItem('All', 1);
		$objOwnerItem = new QListItem('Owner', 2);
		$objNoneItem = new QListItem('None', 3);
		$objControl->ActionParameter = 5;
		if ($this->blnEditMode) {
  		$objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::LoadByRoleIdTransactionTypeId($this->objRole->RoleId,4);
  		if ($objRoleTransactionTypeAuthorization) {
  		  // Select the Proper Authorization Level
  			if ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 1) {
  				$objAllItem->Selected = true;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 2) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = true;
  				$objNoneItem->Selected = false;
  			}
  			elseif ($objRoleTransactionTypeAuthorization->AuthorizationLevelId == 3) {
  				$objAllItem->Selected = false;
  				$objOwnerItem->Selected = false;
  				$objNoneItem->Selected = true;
  			}
  		}
		}
		$objControl->AddItem($objAllItem);
		$objControl->AddItem($objOwnerItem);
		$objControl->AddItem($objNoneItem);				
		$this->arrControls['restock'] = $objControl;
	}
	protected function lblHeaderRole_Create() {
		$this->lblHeaderRole = new QLabel($this);
		$this->lblHeaderRole->Text = ($this->objRole->ShortDescription != '') ? $this->objRole->ShortDescription : 'New Role';
	}

	protected function lblAssetsAdvanced_Create() {
		$this->lblAssetsAdvanced = new QLabel($this);
		$this->lblAssetsAdvanced->Name = 'Advanced';
		$this->lblAssetsAdvanced->Text = 'Advanced';
		//The Assets Module consist of Asset and AssetModel, so we toggle pnlAsset and pnlAssetModel
		$this->lblAssetsAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlAssets));
		$this->lblAssetsAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlAssetModel));
		$this->lblAssetsAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblAssetsAdvanced_Click'));
		$this->lblAssetsAdvanced->SetCustomStyle('text-decoration', 'underline');
		$this->lblAssetsAdvanced->SetCustomStyle('cursor', 'pointer');
	}
	protected function lblInventoryAdvanced_Create() {
		$this->lblInventoryAdvanced = new QLabel($this);
		$this->lblInventoryAdvanced->Name = 'InventoryAdvanced';
		$this->lblInventoryAdvanced->Text = 'Advanced';
		$this->lblInventoryAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlInventory));
		$this->lblInventoryAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblInventoryAdvanced_Click'));
		$this->lblInventoryAdvanced->SetCustomStyle('text-decoration', 'underline');
		$this->lblInventoryAdvanced->SetCustomStyle('cursor', 'pointer');
	}
	 
	//Contacts Advanced label creation
	protected function lblContactsAdvanced_Create() {
		$this->lblContactsAdvanced = new QLabel($this);
		$this->lblContactsAdvanced->Name = 'AdvancedContacts';
		$this->lblContactsAdvanced->Text = 'Advanced';
		//The Contact Module consist of Contact, Company, Address so we toggle pnlContact, pnlCompany and pnlAddress
		$this->lblContactsAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlContact));
		$this->lblContactsAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlCompany));
		$this->lblContactsAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlAddress));
		$this->lblContactsAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblContactsAdvanced_Click'));
		$this->lblContactsAdvanced->SetCustomStyle('text-decoration', 'underline');
		$this->lblContactsAdvanced->SetCustomStyle('cursor', 'pointer');
	}

	//Shipping Advanced label creation
	protected function lblShippingAdvanced_Create() {
		$this->lblShippingAdvanced = new QLabel($this);
		$this->lblShippingAdvanced->Name = 'AdvancedShipping';
		$this->lblShippingAdvanced->Text = 'Advanced';
		$this->lblShippingAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlShipping));
		$this->lblShippingAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblShippingAdvanced_Click'));
		$this->lblShippingAdvanced->SetCustomStyle('text-decoration', 'underline');
		$this->lblShippingAdvanced->SetCustomStyle('cursor', 'pointer');
	}
	//Receiving Advanced label creation
	protected function lblReceivingAdvanced_Create() {
		$this->lblReceivingAdvanced = new QLabel($this);
		$this->lblReceivingAdvanced->Name = 'AdvancedReceiving';
		$this->lblReceivingAdvanced->Text = 'Advanced';
		$this->lblReceivingAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlReceiving));
		$this->lblReceivingAdvanced->AddAction(new QClickEvent(), new QAjaxAction('lblReceivingAdvanced_Click'));
		$this->lblReceivingAdvanced->SetCustomStyle('text-decoration', 'underline');
		$this->lblReceivingAdvanced->SetCustomStyle('cursor', 'pointer');
	}
//Setup the Asset Entity Grid
protected function pnlAssets_Create($intModule){
		
		$this->pnlAssets = new FieldLevelAuthPanel($this,EntityQtype::Asset,$this->arrControls,$intModule,"pnlAssets",$this->blnEditMode);
		$this->pnlAssets->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
				$this->pnlAssets->EnableAll();
				$this->pnlAssets->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs 
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
				$this->pnlAssets->UnCheckAll();
				$this->pnlAssets->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
				$this->pnlAssets->DisableEditColumn();
				$this->pnlAssets->UnCheckEditColumn();
		}
	}
	protected function pnlAssetModel_Create($intModule){
		$this->pnlAssetModel = new FieldLevelAuthPanel($this,EntityQtype::AssetModel,$this->arrControls,$intModule,"pnlAssetModel",$this->blnEditMode);
		$this->pnlAssetModel->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
			$this->pnlAssetModel->EnableAll();
			$this->pnlAssetModel->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
				$this->pnlAssetModel->UnCheckAll();
				$this->pnlAssetModel->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
				$this->pnlAssetModel->DisableEditColumn();
				$this->pnlAssetModel->UnCheckEditColumn();
		}	
	}
	protected function pnlInventory_Create($intModule){
		$this->pnlInventory = new FieldLevelAuthPanel($this,EntityQtype::Inventory,$this->arrControls,$intModule,"pnlInventory",$this->blnEditMode);
		$this->pnlInventory->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
			$this->pnlInventory->EnableAll();
			$this->pnlInventory->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
			$this->pnlInventory->UnCheckAll();
			$this->pnlInventory->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
			$this->pnlInventory->DisableEditColumn();
			$this->pnlInventory->UnCheckEditColumn();
		}

	}
	protected function pnlContact_Create($intModule){
		$this->pnlContact = new FieldLevelAuthPanel($this,EntityQtype::Contact,$this->arrControls,$intModule,"pnlContact",$this->blnEditMode);
		$this->pnlContact->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
				$this->pnlContact->EnableAll();
				$this->pnlContact->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
			$this->pnlContact->UnCheckAll();
			$this->pnlContact->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
			$this->pnlContact->DisableEditColumn();
			$this->pnlContact->UnCheckEditColumn();
		}

	}
	protected function pnlShipping_Create($intModule){
		$this->pnlShipping = new FieldLevelAuthPanel($this,EntityQtype::Shipment,$this->arrControls,$intModule,"pnlShipping",$this->blnEditMode);
		$this->pnlShipping->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
				$this->pnlShipping->EnableAll();
				$this->pnlShipping->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
			$this->pnlShipping->UnCheckAll();
			$this->pnlShipping->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
			$this->pnlShipping->DisableEditColumn();
			$this->pnlShipping->UnCheckEditColumn();
		}

	}
	protected function pnlReceiving_Create($intModule){
		$this->pnlReceiving = new FieldLevelAuthPanel($this,EntityQtype::Receipt,$this->arrControls,$intModule,"pnlReceiving",$this->blnEditMode);
		$this->pnlReceiving->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
				$this->pnlReceiving->EnableAll();
				$this->pnlReceiving->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
			$this->pnlReceiving->UnCheckAll();
			$this->pnlReceiving->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
			$this->pnlReceiving->DisableEditColumn();
			$this->pnlReceiving->UnCheckEditColumn();
		}

	}
	protected function pnlCompany_Create($intModule){
		$this->pnlCompany = new FieldLevelAuthPanel($this,EntityQtype::Company,$this->arrControls,$intModule,"pnlCompany",$this->blnEditMode);
		$this->pnlCompany->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
				$this->pnlCompany->EnableAll();
				$this->pnlCompany->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
			$this->pnlCompany->UnCheckAll();
			$this->pnlCompany->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
			$this->pnlCompany->DisableEditColumn();
			$this->pnlCompany->UnCheckEditColumn();
		}

	}
	protected function pnlAddress_Create($intModule){
		$this->pnlAddress = new FieldLevelAuthPanel($this,EntityQtype::Address,$this->arrControls,$intModule,"pnlAddress",$this->blnEditMode);
		$this->pnlAddress->Display=false;
		$objModule= Module::Load($intModule);
		//If Creation Mode, all checkbox are checked by default
		if(!$this->blnEditMode){				
				$this->pnlAddress->EnableAll();
				$this->pnlAddress->CheckAll();
		}//If Edition Mode and module access is disabled, we must uncheck and disable all checkboxs
		elseif(!$this->arrControls[$objModule->ShortDescription]['access']->SelectedValue){
			$this->pnlAddress->UnCheckAll();
			$this->pnlAddress->DisabledAll();
		}//If Edition Mode and module access is Enabled and Edit access is "None", we must uncheck and disable all the Edit Checkboxs.
		elseif($this->arrControls[$objModule->ShortDescription]['edit']->SelectedValue==3){
			$this->pnlAddress->DisableEditColumn();
			$this->pnlAddress->UnCheckEditColumn();
		}
	}
	//Assets Advanced label event capture
	protected function lblAssetsAdvanced_Click() {
		if ($this->blnAssetsAdvanced) {
			$this->blnAssetsAdvanced = false;
			$this->lblAssetsAdvanced->Text = 'Advanced';
		}
		else {
			$this->blnAssetsAdvanced = true;
			$this->lblAssetsAdvanced->Text = 'Hide Advanced';
		}
	}
	//Inventory Advanced label event capture
	protected function lblInventoryAdvanced_Click() {
		if ($this->blnInventoryAdvanced) {
			$this->blnInventoryAdvanced = false;
			$this->lblInventoryAdvanced->Text = 'Advanced';
		}
		else {
			$this->blnInventoryAdvanced = true;
			$this->lblInventoryAdvanced->Text = 'Hide Advanced';
		}
	}
	//Contacts Advanced event capture
	protected function lblContactsAdvanced_Click() {
		if ($this->blnContactsAdvanced) {
			$this->blnContactsAdvanced = false;
			$this->lblContactsAdvanced->Text = 'Advanced';
		}
		else {
			$this->blnContactsAdvanced = true;
			$this->lblContactsAdvanced->Text = 'Hide Advanced';
		}
	}
	//Shipping Advanced event capture
	protected function lblShippingAdvanced_Click() {

		if ($this->blnShippingAdvanced) {
			$this->blnShippingAdvanced = false;
			$this->lblShippingAdvanced->Text = 'Advanced';
		}
		else {
			$this->blnShippingAdvanced = true;
			$this->lblShippingAdvanced->Text = 'Hide Advanced';
		}

	}
	//Receiving Advanced event capture
	protected function lblReceivingAdvanced_Click() {

		if ($this->blnReceivingAdvanced) {
			$this->blnReceivingAdvanced = false;
			$this->lblReceivingAdvanced->Text = 'Advanced';
		}
		else {
			$this->blnReceivingAdvanced = true;
			$this->lblReceivingAdvanced->Text = 'Hide Advanced';
		}

	}

	// Setup btnSave
	protected function btnSave_Create() {
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = QApplication::Translate('Save');
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->PrimaryButton = true;
		$this->btnSave->CausesValidation = true;
	}

	// Control ServerActions
	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {	
		try {

			// Get an instance of the database
			$objDatabase = QApplication::$Database[1];
			// Begin a MySQL Transaction to be either committed or rolled back
			$objDatabase->TransactionBegin();

			// Update the role fields
			$this->UpdateRoleFields();
			
			// Save the role
			$this->objRole->Save();

			// Update the authorizations for this role
			// This must be done after saving the Role. If it is new, we need a RoleId first.
			$this->UpdateAuthorizations();
			
			// Update the Role Field Authorization for this role
			$this->UpdateFieldLevelAuthorizations();
			
			// Update the Role Transaction Level Authorization for this role
			$this->UpdateTransactionLevelAuthorizations();
			
			// Commit the transaction to the database
			$objDatabase->TransactionCommit();

			QApplication::Redirect('role_list.php');
		}
		catch (QExtendedOptimisticLockingException $objExc) {

			// Roll back the transaction from the database
			$objDatabase->TransactionRollback();

			$this->btnCancel->Warning = sprintf('This role has been updated by another user. You must <a href="role_edit.php?intRoleId=%s">Refresh</a> to edit this role.', $this->objRole->RoleId);
		}
	}
	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		
		if ($objUserAccountArray = UserAccount::LoadArrayByRoleId($this->objRole->RoleId)) {
			$this->btnCancel->Warning = "You cannot delete roles with assigned user accounts.";
		}
		else {
			//Before deleting the role, we delete All Authorization Records in RoleEntytyQtype BuiltIn and Custom.
			foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByRoleId($this->objRole->RoleId) as $objRoleBuiltInAuth){
				$objRoleBuiltInAuth->Delete();			
			}
			foreach(RoleEntityQtypeCustomFieldAuthorization::LoadArrayByRoleId($this->objRole->RoleId) as $objRoleCustomAuth){
				$objRoleCustomAuth->Delete();
			}
			$this->objRole->Delete();
			
			$this->RedirectToListPage();
		}
	}
	// Update module authorization fields when enabling/disabling module access
	protected function lstAccessControl_Select($strFormId, $strControlId, $strParameter) {
		// Properly colorize the Enabled/Disabled selection
		$objAccessControl = $this->GetControl($strControlId);
		$objAccessControl->CssClass = ($objAccessControl->SelectedValue) ? "greentext" : "redtext";
		$objEnabledItem = $objAccessControl->GetItem(0);
		$objDisabledItem = $objAccessControl->GetItem(1);
		$objEnabledItem->ItemStyle->CssClass='greentext';
		$objDisabledItem->ItemStyle->CssClass='redtext';
			
		// Enable or disable authorization fields
		$objModule = Module::Load($strParameter);
		foreach ($this->objAuthorizationArray as $objAuthorization) {
			$this->arrControls[$objModule->ShortDescription][$objAuthorization->ShortDescription]->Enabled = ($objAccessControl->SelectedValue) ? true : false;
		}
		
		//If Module Access is Enabled, we enable all the checkbox of the panels of the module
		if($objAccessControl->SelectedValue){
			switch ($objModule->ModuleId) {
				case 2:
					$this->pnlAssets->EnableAll();
					$this->pnlAssetModel->EnableAll();
					break;
				case 3:
					$this->pnlInventory->EnableAll();
					break;
				case 4:
					$this->pnlCompany->EnableAll();
					$this->pnlContact->EnableAll();
					$this->pnlAddress->EnableAll();
					break;
				case 5:
					$this->pnlShipping->EnableAll();
					break;
				case 6:
					$this->pnlReceiving->EnableAll();
					break;
			}
		}else{
			//If Module Access is disabled, we disable and uncheck all the checkbox of the panels of the module
			switch ($objModule->ModuleId) {
				case 2:
					$this->pnlAssets->DisabledAll();
					$this->pnlAssets->UnCheckAll();
					$this->pnlAssetModel->DisabledAll();
					$this->pnlAssetModel->UnCheckAll();
					break;
				case 3:
					$this->pnlInventory->DisabledAll();
					$this->pnlInventory->UnCheckAll();
					break;
				case 4:
					$this->pnlCompany->DisabledAll();
					$this->pnlCompany->UnCheckAll();
					$this->pnlContact->DisabledAll();
					$this->pnlContact->UnCheckAll();
					$this->pnlAddress->DisabledAll();
					$this->pnlAddress->UnCheckAll();
					break;
				case 5:
					$this->pnlShipping->DisabledAll();
					$this->pnlShipping->UnCheckAll();
					break;
				case 6:
					$this->pnlReceiving->DisabledAll();
					$this->pnlReceiving->UnCheckAll();
					break;
			}
		}		
	}

	protected function lstEdit_Change($strFormId, $strControlId, $strParameter) {
		$objControl = $this->GetControl($strControlId);
		// $strParameter is the ModuleId
		$objModule = Module::Load($strParameter);
		$objDeleteControl = $this->arrControls[$objModule->ShortDescription]['delete'];
		if ($objControl->SelectedValue == 3) {
			if ($objDeleteControl->ItemCount < 3) {
				$objDeleteControl->AddItem('None', 3);
			}
			$objDeleteControl->SelectedValue = 3;
			$objDeleteControl->Enabled = false;
			
			//If we set Edit Access to "None", we must uncheck and disable all Edit Column
			switch ($objModule->ModuleId) {
				case 2:
					if(isset($this->pnlAssets)){
						$this->pnlAssets->DisableEditColumn();
						$this->pnlAssets->UnCheckEditColumn();
					}
					if(isset($this->pnlAssetModel)){
						$this->pnlAssetModel->DisableEditColumn();
						$this->pnlAssetModel->UnCheckEditColumn();
					}
					break;
				case 3:
					if(isset($this->pnlInventory)){
						$this->pnlInventory->DisableEditColumn();
						$this->pnlInventory->UnCheckEditColumn();
					}
					break;
				case 4:
					if(isset($this->pnlCompany)){
						$this->pnlCompany->DisableEditColumn();
						$this->pnlCompany->UnCheckEditColumn();
					}
					if(isset($this->pnlContact)){
						$this->pnlContact->DisableEditColumn();
						$this->pnlContact->UnCheckEditColumn();
					}
					if(isset($this->pnlAddress)){
						$this->pnlAddress->DisableEditColumn();
						$this->pnlAddress->UnCheckEditColumn();
					}
					break;
				case 5:
					if(isset($this->pnlShipping)){
						$this->pnlShipping->DisableEditColumn();
						$this->pnlShipping->UnCheckEditColumn();
					}
					break;
				case 6:
					if(isset($this->pnlReceiving)){
						$this->pnlReceiving->DisableEditColumn();
						$this->pnlReceiving->UnCheckEditColumn();
					}
					break;
			}
		}//if we set Edit Access to "Owner" or "All", we must enable and check all the checkboxs of the Edit Column
		elseif ($objControl->SelectedValue == 2) {
			if ($objDeleteControl->ItemCount == 3) {
				$objDeleteControl->RemoveItem(2);
			}
			$objDeleteControl->Enabled = true;

			switch ($objModule->ModuleId) {
				case 2:
					if(isset($this->pnlAssets))
					$this->pnlAssets->EnableEditColumn();
					if(isset($this->pnlAssetModel))
					$this->pnlAssetModel->EnableEditColumn();
					break;
				case 3:
					if(isset($this->pnlInventory))
					$this->pnlInventory->EnableEditColumn();
					break;
				case 4:
					if(isset($this->pnlCompany))
					$this->pnlCompany->EnableEditColumn();
					if(isset($this->pnlContact))
					$this->pnlContact->EnableEditColumn();
					if(isset($this->pnlAddress))
					$this->pnlAddress->EnableEditColumn();
					break;
				case 5:
					if(isset($this->pnlShipping))
					$this->pnlShipping->EnableEditColumn();
					break;
				case 6:
					if(isset($this->pnlReceiving))
					$this->pnlReceiving->EnableEditColumn();
					break;
			}
		}
		elseif ($objControl->SelectedValue == 1) {
			if ($objDeleteControl->ItemCount == 3) {
				$objDeleteControl->RemoveItem(2);
			}
			$objDeleteControl->Enabled = true;

			switch ($objModule->ModuleId) {
				case 2:
					if(isset($this->pnlAssets))
					$this->pnlAssets->EnableEditColumn();
					if(isset($this->pnlAssetModel))
					$this->pnlAssetModel->EnableEditColumn();
					break;
				case 3:
					if(isset($this->pnlInventory))
					$this->pnlInventory->EnableEditColumn();
					break;
				case 4:
					if(isset($this->pnlCompany))
					$this->pnlCompany->EnableEditColumn();
					if(isset($this->pnlContact))
					$this->pnlContact->EnableEditColumn();
					if(isset($this->pnlAddress))
					$this->pnlAddress->EnableEditColumn();
					break;
				case 5:
					if(isset($this->pnlShipping))
					$this->pnlShipping->EnableEditColumn();
					break;
				case 6:
					if(isset($this->pnlReceiving))
					$this->pnlReceiving->EnableEditColumn();
					break;
			}
		}
	}
	// Protected Update Methods
	protected function UpdateRoleFields() {
		$this->objRole->ShortDescription = $this->txtShortDescription->Text;
		$this->objRole->LongDescription = $this->txtLongDescription->Text;
	}

	// Protected Update Authorization
	protected function UpdateAuthorizations() {
			
		if ($this->objModuleArray) {
			foreach ($this->objModuleArray as $objModule) {
					
				if ($this->blnEditMode) {
					$objRoleModule = RoleModule::LoadByRoleIdModuleId($this->objRole->RoleId, $objModule->ModuleId);
				}
				else {
					$objRoleModule = new RoleModule();
					$objRoleModule->ModuleId = $objModule->ModuleId;
					$objRoleModule->RoleId = $this->objRole->RoleId;
				}
				$objRoleModule->AccessFlag = $this->arrControls[$objModule->ShortDescription]['access']->SelectedValue;
				$objRoleModule->Save();
					
				if ($this->objAuthorizationArray) {
					foreach ($this->objAuthorizationArray as $objAuthorization) {
						if ($this->blnEditMode) {
							$objRoleModuleAuthorization = $this->objRoleModuleAuthorizationArray[$objRoleModule->RoleModuleId.'-'.$objAuthorization->AuthorizationId];
						}
						else {
							$objRoleModuleAuthorization = new RoleModuleAuthorization();
							$objRoleModuleAuthorization->RoleModuleId = $objRoleModule->RoleModuleId;
							$objRoleModuleAuthorization->AuthorizationId = $objAuthorization->AuthorizationId;
						}
						$objRoleModuleAuthorization->AuthorizationLevelId = $this->arrControls[$objModule->ShortDescription][$objAuthorization->ShortDescription]->SelectedValue;
						$objRoleModuleAuthorization->Save();
					}
				}
			}
		}
		// If creating a new Role, manually give access to the Home module
		if (!$this->blnEditMode) {
			$objRoleModule = new RoleModule();
			$objRoleModule->ModuleId = 1;
			$objRoleModule->RoleId = $this->objRole->RoleId;
			$objRoleModule->AccessFlag = true;
			$objRoleModule->Save();
		}
	}


	//Save all the checkboxs to the db
	protected function UpdateFieldLevelAuthorizations(){
		if ($this->objModuleArray) {
			//First, we get all the panels that we need to manipulate 
			foreach ($this->objModuleArray as $objModule) {
				switch ($objModule->ModuleId) {
					case 2:
						$arrEntity[]=array('objPanel' => $this->pnlAssets, 'intEntity' => EntityQtype::Asset);
						$arrEntity[]=array('objPanel' => $this->pnlAssetModel, 'intEntity' => EntityQtype::AssetModel);
						break;
					case 3:
						$arrEntity[]=array('objPanel' => $this->pnlInventory, 'intEntity' => EntityQtype::Inventory);
						break;
					case 4:
						$arrEntity[]=array('objPanel' => $this->pnlCompany, 'intEntity' => EntityQtype::Company);
						$arrEntity[]=array('objPanel' => $this->pnlContact, 'intEntity' => EntityQtype::Contact);
						$arrEntity[]=array('objPanel' => $this->pnlAddress, 'intEntity' => EntityQtype::Address);
						break;
					case 5:
						$arrEntity[]=array('objPanel' => $this->pnlShipping, 'intEntity' => EntityQtype::Shipment);
						break;
					case 6:
						$arrEntity[]=array('objPanel' => $this->pnlReceiving, 'intEntity' => EntityQtype::Receipt);
						break;
				}
					
			}
			//One Panel= One Entity. For each entity, we must save chkBuiltIn for View and Edit and several CustomChecks, for View and Edit
			foreach($arrEntity as $entity){
				
				//We look for the BuiltIn View entry, searching by RoleId, EntityId and authorizationId=1 (View)
				$objRoleEntityQTypeBuiltInAuthView=RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId($this->objRole->RoleId,$entity['intEntity'],1);
				// If the entry doesn't exists, we create it.
				if(!$objRoleEntityQTypeBuiltInAuthView){
					$objRoleEntityQTypeBuiltInAuthView = new RoleEntityQtypeBuiltInAuthorization();
					$objRoleEntityQTypeBuiltInAuthView->RoleId=$this->objRole->RoleId;
					$objRoleEntityQTypeBuiltInAuthView->EntityQtypeId=$entity['intEntity'];
					$objRoleEntityQTypeBuiltInAuthView->AuthorizationId=1;
				}
				$objRoleEntityQTypeBuiltInAuthView->AuthorizedFlag=$entity['objPanel']->chkBuiltInView->Checked;
				$objRoleEntityQTypeBuiltInAuthView->Save();

				//We look for the BuiltIn Edit entry, searching by RoleId, EntityId and authorizationId=2 (Edit)
				$objRoleEntityQTypeBuiltInAuthEdit=RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId($this->objRole->RoleId,$entity['intEntity'],2);
				// If the entry doesn't exists, we create it.
				if(!$objRoleEntityQTypeBuiltInAuthEdit){
					$objRoleEntityQTypeBuiltInAuthEdit = new RoleEntityQtypeBuiltInAuthorization();
					$objRoleEntityQTypeBuiltInAuthEdit->RoleId=$this->objRole->RoleId;
					$objRoleEntityQTypeBuiltInAuthEdit->EntityQtypeId=$entity['intEntity'];
					$objRoleEntityQTypeBuiltInAuthEdit->AuthorizationId=2;
				}
				$objRoleEntityQTypeBuiltInAuthEdit->AuthorizedFlag=$entity['objPanel']->chkBuiltInEdit->Checked;
				$objRoleEntityQTypeBuiltInAuthEdit->Save();

				//We must now save the View and Edit checkboxs values of the Custom checks.
				if($entity['objPanel']->arrCustomChecks){
					foreach($entity['objPanel']->arrCustomChecks as $objCustomCheck){
						//We look into EntityQtypeCustomFieldId because we need to get EntityQtypeCustomFieldId in order to save into the RoleEntityCustom tables
						$objEntityQtypeCustomField = EntityQtypeCustomField::LoadByEntityQtypeIdCustomFieldId($entity['intEntity'],$objCustomCheck['id']);
							
						//We look for the Custom View entry, searching by RoleId, EntityQtypeCustomFieldId and authorization_id=1(View)
						$objRoleEntityQtypeCustomFieldView=RoleEntityQtypeCustomFieldAuthorization::LoadByRoleIdEntityQtypeCustomFieldIdAuthorizationId($this->objRole->RoleId,$objEntityQtypeCustomField->EntityQtypeCustomFieldId,1);
						// If the entry doesn't exists, we create it.
						if(!$objRoleEntityQtypeCustomFieldView){
							$objRoleEntityQtypeCustomFieldView = new RoleEntityQtypeCustomFieldAuthorization();
							$objRoleEntityQtypeCustomFieldView->RoleId=$this->objRole->RoleId;
							$objRoleEntityQtypeCustomFieldView->EntityQtypeCustomFieldId=$objEntityQtypeCustomField->EntityQtypeCustomFieldId;
							$objRoleEntityQtypeCustomFieldView->AuthorizationId=1;
	
						}
						$objRoleEntityQtypeCustomFieldView->AuthorizedFlag=$objCustomCheck['view']->Checked;
						$objRoleEntityQtypeCustomFieldView->Save();
							
						//We look for the Custom View entry, searching by RoleId, EntityQtypeCustomFieldId and authorization_id=2(Edit)
						$objRoleEntityQtypeCustomFieldEdit=RoleEntityQtypeCustomFieldAuthorization::LoadByRoleIdEntityQtypeCustomFieldIdAuthorizationId($this->objRole->RoleId,$objEntityQtypeCustomField->EntityQtypeCustomFieldId,2);
						// If the entry doesn't exists, we create it.
						if(!$objRoleEntityQtypeCustomFieldEdit){
							$objRoleEntityQtypeCustomFieldEdit = new RoleEntityQtypeCustomFieldAuthorization();
							$objRoleEntityQtypeCustomFieldEdit->RoleId=$this->objRole->RoleId;
							$objRoleEntityQtypeCustomFieldEdit->EntityQtypeCustomFieldId=$objEntityQtypeCustomField->EntityQtypeCustomFieldId;
							$objRoleEntityQtypeCustomFieldEdit->AuthorizationId=2;
						}
						$objRoleEntityQtypeCustomFieldEdit->AuthorizedFlag=$objCustomCheck['edit']->Checked;
						$objRoleEntityQtypeCustomFieldEdit->Save();
	
					}
				}
			}
		}
	}
	
	//Save all TransactionLevelAuthorizations to the db
	protected function UpdateTransactionLevelAuthorizations() {
	  if (!$this->blnEditMode) {
	    // Create a new RoleTransactionTypeAuthorization
			// Move
			$objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 1;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['move']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
		  // Check In
		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 2;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['check_in_out']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
		  // Check Out
		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 3;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['check_in_out']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
		  // Reserve
		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 8;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['reserve_unreserve']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
		  // Unreserve
		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 9;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['reserve_unreserve']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
		  // Take Out
		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 5;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['take_out']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
		  // Restock
		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
			$objRoleTransactionTypeAuthorization->TransactionTypeId = 4;
			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['restock']->SelectedValue;
		  $objRoleTransactionTypeAuthorization->Save();
	  }
	  else {
	    $objRoleTransactionTypeAuthorizationArray = RoleTransactionTypeAuthorization::LoadArrayByRoleId($this->objRole->RoleId);
		  if ($objRoleTransactionTypeAuthorizationArray) {
		    foreach ($objRoleTransactionTypeAuthorizationArray as $objRoleTransactionTypeAuthorization) {
		      if ($objRoleTransactionTypeAuthorization->TransactionTypeId == 1) {
		        $objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['move']->SelectedValue;
		      }
		      elseif ($objRoleTransactionTypeAuthorization->TransactionTypeId == 2 || $objRoleTransactionTypeAuthorization->TransactionTypeId == 3) {
		        $objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['check_in_out']->SelectedValue;
		      }
		      elseif ($objRoleTransactionTypeAuthorization->TransactionTypeId == 8 || $objRoleTransactionTypeAuthorization->TransactionTypeId == 9) {
		        $objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['reserve_unreserve']->SelectedValue;
		      }
 		      elseif ($objRoleTransactionTypeAuthorization->TransactionTypeId == 5) {
 		        $objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['take_out']->SelectedValue;
 		      }
          elseif ($objRoleTransactionTypeAuthorization->TransactionTypeId == 4) {
 		        $objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['restock']->SelectedValue;
 		      }
 		      $objRoleTransactionTypeAuthorization->Save();
		    }
		  }
		  else {
		    // Create a new RoleTransactionTypeAuthorization
  			// Move
  			$objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 1;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['move']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
  		  // Check In
  		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 2;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['check_in_out']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
  		  // Check Out
  		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 3;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['check_in_out']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
  		  // Reserve
  		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 8;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['reserve_unreserve']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
  		  // Unreserve
  		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 9;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['reserve_unreserve']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
  		  // Take Out
  		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 5;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['take_out']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
  		  // Restock
  		  $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
  			$objRoleTransactionTypeAuthorization->RoleId = $this->objRole->RoleId;
  			$objRoleTransactionTypeAuthorization->TransactionTypeId = 4;
  			$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->arrControls['restock']->SelectedValue;
  		  $objRoleTransactionTypeAuthorization->Save();
		  }
	  }
	}
	
	// Change properties of Edit Custom and View Custom checkbox according to the Click Action to a View Custom Checkbox
	protected function chkCustom_Click($strFormId, $strControlId, $strParameter) {
		 
		$objCustomView = $this->GetControl($strControlId);
		$objCustomEdit = $this->GetControl($strParameter);
		// If the View Custom Checkbox is not checked, we now want to disable and uncheck the Edit Custom Checkbox
		if(!$objCustomView->Checked){
			$objCustomEdit->Checked=false;
			$objCustomEdit->Enabled=false;
		}//If the View Custom Checkbox is checked, we now want to enable the Edit Custom Checkbox
		else{
			$objCustomEdit->Enabled=true;
		}
		 
	}
	// Select/deselect all View Column.
	protected function chkEntityView_Click($strFormId, $strControlId, $strParameter) {
		
		$chkEntityView = $this->GetControl($strControlId);
		// If we uncheck chkEntityView, we must uncheck all the View Column
		if(!$chkEntityView->Checked){
			//$strParameter = Name of the current Panel
			$this->$strParameter->UnCheckViewColumn();
			//but we always have to leave the chkBuiltInView checked
			$this->$strParameter->chkBuiltInView->Checked=true;
		}//If we check chkEntityView, we must check all the View Column
		else{
			$this->$strParameter->CheckViewColumn();
		}
	}
	// Select/deselect all Edit Column
	protected function chkEntityEdit_Click($strFormId, $strControlId, $strParameter) {
		$chkEntityEdit = $this->GetControl($strControlId);
		// If we uncheck $chkEntityEdit, we must uncheck all the Edit Column
		if(!$chkEntityEdit->Checked){
			//$strParameter = Name of the current Panel
			$this->$strParameter->UnCheckEditColumn();
		}//If we check $chkEntityEdit, we must check all the Edit Column
		else{
			$this->$strParameter->CheckEditColumn();
		}
	}
}

// Go ahead and run this form object to render the page and its event handlers, using
// generated/role_edit.php.inc as the included HTML template file
RoleEditForm::Run('RoleEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/role_edit.tpl.php');
?>