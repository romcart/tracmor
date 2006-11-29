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
			$this->objModuleArray = Module::LoadAll();
			// Load an array of all Authorization types
			$this->objAuthorizationArray = Authorization::LoadAll();
			// Create/Setup Controls for Authorizations
			$this->arrControls_Create();
			
			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();			
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
					$objEnabledItem = new QListItem('Enabled', 1, false, 'CssClass="greentext"');
					$objDisabledItem = new QListItem('Disabled', 0, false, 'CssClass="redtext"');
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
							$objControl->AddItem($objAllItem);
							$objControl->AddItem($objOwnerItem);
							$objControl->AddItem($objNoneItem);
							$objAllItem = null;
							$objOwnerItem = null;
							$objNoneItem = null;
							// Assign the Controls array
							$this->arrControls[$objModule->ShortDescription][$objAuthorization->ShortDescription] = $objControl;
							$objControl = null;
						}
					}
					$objRoleModule = null;
				}
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
		}
		
		protected function lblHeaderRole_Create() {
			$this->lblHeaderRole = new QLabel($this);
			$this->lblHeaderRole->Text = ($this->objRole->ShortDescription != '') ? $this->objRole->ShortDescription : 'New Role';
		}
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
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
/*
			// Delete all RoleModules - this will cascade to all RoleModuleAuthorizations also
			if ($this->blnEditMode) {
				// Set the Role Module Access
				$objRoleModuleArray = RoleModule::LoadArrayByRoleId($this->objRole->RoleId);
				if ($objRoleModuleArray) {
					foreach ($objRoleModuleArray as $objRoleModule) {
						$objRoleModule->Delete();
						$objRoleModule = null;
					}
				}
			}
				
			if ($this->objModuleArray) {
				
				foreach ($this->objModuleArray as $objModule) {
					
					$objRoleModule = new RoleModule();
					$objRoleModule->ModuleId = $objModule->ModuleId;
					$objRoleModule->RoleId = $this->objRole->RoleId;
					$objRoleModule->AccessFlag = $this->arrControls[$objModule->ShortDescription]['access']->SelectedValue;
					$objRoleModule->Save();
					
					if ($this->objAuthorizationArray) {
						foreach ($this->objAuthorizationArray as $objAuthorization) {
							$objRoleModuleAuthorization = new RoleModuleAuthorization();
							$objRoleModuleAuthorization->RoleModuleId = $objRoleModule->RoleModuleId;
							$objRoleModuleAuthorization->AuthorizationId = $objAuthorization->AuthorizationId;
							$objRoleModuleAuthorization->AuthorizationLevelId = $this->arrControls[$objModule->ShortDescription][$objAuthorization->ShortDescription]->SelectedValue;
							$objRoleModuleAuthorization->Save();
							$objRoleModuleAuthorization = null;
						}
					}
					$objRoleModule = null;
				}
			}*/
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/role_edit.php.inc as the included HTML template file
	RoleEditForm::Run('RoleEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/role_edit.tpl.php');
?>