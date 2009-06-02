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
class FieldLevelAuthPanel extends QPanel{

	public $chkEntityView;
	public $chkEntityEdit;
	public $chkBuiltInView;
	public $chkBuiltInEdit;
	public $arrCustomChecks;
	public $intEntityQtypeId;
	public $objModule;
	public $arrControls;
	public $strPnlName;
	public $blnEditMode;

	
	public function __construct($objParentObject, $intEntityQtypeId, $arrControls, $intModuleId,$strPnlName,$blnEditMode,$strControlId = null) {
		// Call the Parent
		try {
			parent::__construct($objParentObject, $strControlId);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		//Setup Panel Grid
		$this->Template = 'FieldLevelAuthPanel.tpl.php';
		$this->Display=false;
		$this->intEntityQtypeId=$intEntityQtypeId;
		$this->objModule = Module::Load($intModuleId);
		$this->arrControls = $arrControls;
		$this->strPnlName=$strPnlName;
		$this->blnEditMode=$blnEditMode;

		//First, setup the checkbox of the entity. This checkboxs select/deselect all the checkbox of the entity
		$this->chkEntity_Create();
		// Setup 2 Built In checkbox. One for View Access (chkBuiltInView) and one for the Edit Access(chkBuiltInEdit)
		$this->chkBuiltIn_Create();
		// Setup 2 Checkbox for each CustomField associated to the entity
		$this->chkCustom_Create();
	}
	//Create/Setup chkEntityView and chkEntityEdit
	protected function chkEntity_Create(){
		$this->chkEntityView = new QCheckBox($this);
		$this->chkEntityView->AddAction(new QClickEvent(), new QAjaxAction('chkEntityView_Click'));
		$this->chkEntityView->ActionParameter=$this->strPnlName;	
		$this->chkEntityEdit = new QCheckBox($this);
		$this->chkEntityEdit->AddAction(new QClickEvent(), new QAjaxAction('chkEntityEdit_Click'));
		$this->chkEntityEdit->ActionParameter=$this->strPnlName;
	}
	//Create/Setup chkBuiltInView and chkBuiltInEdit
	protected function chkBuiltIn_Create(){
		$this->chkBuiltInView = new QCheckBox($this);
		//because many built-in fields must be visible to navigate within Tracmor 
		//the View privilege for built-in fields will always be set as enabled for 
		//entities within modules which a user role has module-level access to
		//The View privilege is checked and unchecked automatically, acording to the module-level-access 
		$this->chkBuiltInView->Enabled=false;
		$this->chkBuiltInView->Checked=true;
		$intRoleId = QApplication::QueryString('intRoleId');
		$this->chkBuiltInEdit = new QCheckBox($this);
		
		//	If $intRoleId is set, then it is Edit Mode, so we load the EditPrivilege of BuiltIn Fields
		if($intRoleId){
			$objBuiltInEditAuth = RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId($intRoleId,$this->intEntityQtypeId,2);
		}
		//If Creation Mode, the Edit Privilege of the BuiltIn Fields is checked by default
		if(!$this->blnEditMode){
			$this->chkBuiltInEdit->Checked=1;
		}//If Edit Mode, the BuiltIn Edit checkbox privilege is set according to the db data.
		elseif(isset($objBuiltInEditAuth)){
			$this->chkBuiltInEdit->Checked=$objBuiltInEditAuth->AuthorizedFlag;
		}
	}

	// Load all custom fields and their values into an array arrCustomChecks
	protected function chkCustom_Create(){
		$intRoleId = QApplication::QueryString('intRoleId');
			
		$objCustomFieldArray = CustomField::LoadObjCustomFieldArray($this->intEntityQtypeId, false, null);
		foreach ($objCustomFieldArray as $objCustomField){
			//For each Custom Field, we setup one checkbox for View Access and one for Edit Access
			$chkCustomView = new QCheckBox($this);
			$chkCustomView->AddAction(new QClickEvent(), new QAjaxAction('chkCustom_Click'));
			$chkCustomEdit = new QCheckBox($this);
			//When we click in a View Checkbox, we need to control the Edit Checkbox Control too in the chkCustom_Click method.
			$chkCustomView->ActionParameter=$chkCustomEdit->ControlId;
			//In order to manipulate the RoleEntityQtypeCustomFieldAuthorization table, we need to obtain the EntityQtypeCustomFieldId field.
			$objEntityQtypeCustomField=EntityQtypeCustomField::LoadByEntityQtypeIdCustomFieldId($this->intEntityQtypeId,$objCustomField->CustomFieldId);
			if($objEntityQtypeCustomField){
				$objCustomAuthView=RoleEntityQtypeCustomFieldAuthorization::LoadByRoleIdEntityQtypeCustomFieldIdAuthorizationId($intRoleId,$objEntityQtypeCustomField->EntityQtypeCustomFieldId,1);
				//If Creation Mode, the View Privilege of the Custom Fields is checked by default
				if(!$this->blnEditMode){
					$chkCustomView->Checked=1;
				}//If Edit Mode, the Custom View checkbox privilege is set according to the db data.
				elseif(isset($objCustomAuthView)){
					$chkCustomView->Checked=$objCustomAuthView->AuthorizedFlag;
				}		
				$objCustomAuthEdit=RoleEntityQtypeCustomFieldAuthorization::LoadByRoleIdEntityQtypeCustomFieldIdAuthorizationId($intRoleId,$objEntityQtypeCustomField->EntityQtypeCustomFieldId,2);
				//If Creation Mode, the Edit Privilege of the Custom Fields is checked by default
				if(!$this->blnEditMode){
					$chkCustomEdit->Checked=1;
				}//If Edit Mode, the Custom Edit checkbox privilege is set according to the db data.
				elseif(isset($objCustomAuthEdit)){
					$chkCustomEdit->Checked=$objCustomAuthEdit->AuthorizedFlag;
				}
				//if view access is not authorized, edit access won't be authorized
				if(!$chkCustomView->Checked){
					$chkCustomEdit->Enabled=false;
					$chkCustomEdit->Checked=false;
				}
			}
			//In order to manipulate all the custom checkbox of the entity, we save them in an associated array.
			$this->arrCustomChecks[] = array('name' => $objCustomField->ShortDescription.':', 'view' => $chkCustomView,'edit' => $chkCustomEdit,'id' => $objCustomField->CustomFieldId);

		}
	}
	//Uncheck all the checkboxs of Edit Column and View Column
	public function UnCheckAll(){
		$this->UnCheckEditColumn();
		$this->UnCheckViewColumn();
	}
	//Check all checkboxs of Edit Column and View Column
	public function CheckAll(){
		$this->CheckEditColumn();
		$this->CheckViewColumn();
	}
	//Disable all checkboxs of Edit Column and View Column
	public function DisabledAll(){
		$this->DisableEditColumn();
		$this->DisableViewColumn();
	}
	
	//Enable all the checkboxs from the Edit Column and View Column
	public function EnableAll(){
		$this->chkEntityView->Enabled=true;
		$this->chkBuiltInView->Checked=true;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				$chkCustom['view']->Enabled=true;
			}
		}
		//If the Edit Module Access is "All" or "Owner", we can enable all the Edit Column
		if($this->arrControls[$this->objModule->ShortDescription]['edit']->SelectedValue==1 || $this->arrControls[$this->objModule->ShortDescription]['edit']->SelectedValue==2){
			$this->chkEntityEdit->Enabled=true;
			$this->chkBuiltInEdit->Enabled=true;
			$this->chkBuiltInEdit->Checked=true;
			if($this->arrCustomChecks){
				foreach($this->arrCustomChecks as $chkCustom){
					$chkCustom['edit']->Enabled=true;
				}
			}
		}
	}
	//Enable all the checkboxs from the Edit Column, including all the CustomChecks
	public function EnableEditColumn(){
		$this->chkEntityEdit->Enabled=true;
		$this->chkBuiltInEdit->Enabled=true;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				if ($chkCustom['view']->Checked){
					//we only enable the Edit Custom Checkbox if the View Custom Checkbox is checked.
					$chkCustom['edit']->Enabled=true;
				}
			}
		}
	}
	// Uncheck all the checkboxs from the Edit Column, including all the CustomChecks
	public function UnCheckEditColumn(){
		$this->chkEntityEdit->Checked=false;
		$this->chkBuiltInEdit->Checked=false;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				$chkCustom['edit']->Checked=false;
			}
		}
	}
	// Check all the checkboxs from the Edit Column, including all the CustomChecks
	public function CheckEditColumn(){
		$this->chkEntityEdit->Checked=true;
		$this->chkBuiltInEdit->Checked=true;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				//We only checks the Edit Custom Checkbox if the View Custom Checkbox is also checked
				if($chkCustom['view']->Checked){
					$chkCustom['edit']->Checked=true;
				}
			}
		}
	}
	// Uncheck all the checkboxs from the View Column, including all the CustomChecks
	public function UnCheckViewColumn(){
		$this->chkBuiltInView->Checked=false;
		$this->chkEntityView->Checked=false;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				//if we uncheck the View Custom Checkbox, we must uncheck and disable the Edit Custom Checkbox because
				//The edit privilege cannot be enabled for a field unless the view privilege is first enabled 
				$chkCustom['view']->Checked=false;
				$chkCustom['edit']->Checked=false;
				$chkCustom['edit']->Enabled=false;
			}
		}
	}
	//Check all the checkboxs from the View Column, including all the CustomChecks
	public function CheckViewColumn(){
		$this->chkEntityView->Checked=true;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				//if we check the View Custom Checkbox, we are able to grant Edit Privilege, so we enable the Edit Custom Checkbox
				$chkCustom['view']->Checked=true;
				$chkCustom['edit']->Enabled=true;
			}
		}
	}
	//Disable all the checkboxs from the Edit Column
	public function DisableEditColumn(){
		$this->chkEntityEdit->Enabled=false;
		$this->chkBuiltInEdit->Enabled=false;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				$chkCustom['edit']->Enabled=false;
			}
		}
	}
	//Disable all the checkboxs from the View Column
	public function DisableViewColumn(){
		$this->chkBuiltInView->Enabled=false;
		if($this->arrCustomChecks){
			foreach($this->arrCustomChecks as $chkCustom){
				$chkCustom['view']->Enabled=false;
			}
		}
	}
}
?>