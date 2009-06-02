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

class QFieldLevelAuthComposite extends QControl {

	public $chkEntityView;
	public $chkEntityEdit;
	public $chkBuiltInView;
	public $chkBuiltInEdit;
	public $arrCustomChecks;
	public $intEntityQtypeId;
	public $objParentObject;
	
	// We want to override the constructor in order to setup the subcontrols
	public function __construct($objParentObject, $intEntityQtypeId = null, $strControlId = null) {
	    // First, call the parent to do most of the basic setup
	    try {
	        parent::__construct($objParentObject, $strControlId);
	    } catch (QCallerException $objExc) {
	        $objExc->IncrementOffset();
	        throw $objExc;
	    }
	    
	       $this->objParentObject = $objParentObject;
	    $this->intEntityQtypeId = $intEntityQtypeId;
	$this->chkEntityView = new QCheckBox($this);
			
			$this->chkEntityEdit = new QCheckBox($this);
			$this->chkBuiltInView = new QCheckBox($this);
			$this->chkBuiltInView->Enabled=false;
			$this->chkBuiltInView->Checked=true;
			$intRoleId = QApplication::QueryString('intRoleId');
			if($intRoleId)
				$objBuiltInViewAuth = RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId($intRoleId,$intEntityQtypeId,1);
			
			if(isset($objBuiltInViewAuth))
				$this->chkBuiltInView->Checked=$objBuiltInViewAuth->AuthorizedFlag;
				
				
			$this->chkBuiltInEdit = new QCheckBox($this);
			
			if($intRoleId)
				$objBuiltInEditAuth = RoleEntityQtypeBuiltInAuthorization::LoadByRoleIdEntityQtypeIdAuthorizationId($intRoleId,$intEntityQtypeId,2);
			
			if(isset($objBuiltInEditAuth))
				$this->chkBuiltInEdit->Checked=$objBuiltInEditAuth->AuthorizedFlag;
				
				
			// Load all custom fields and their values into an array arrCustomChecks
			
			$objCustomFieldArray = CustomField::LoadObjCustomFieldArray($intEntityQtypeId, false, null);
			foreach ($objCustomFieldArray as $objCustomField){
				$chkCustomView = new QCheckBox($this);
				$chkCustomEdit = new QCheckBox($this);
				$objEntityQtypeCustomField=EntityQtypeCustomField::LoadByEntityQtypeIdCustomFieldId($intEntityQtypeId,$objCustomField->CustomFieldId);
				if($objEntityQtypeCustomField){
					$objCustomAuthView=RoleEntityQtypeCustomFieldAuthorization::LoadByRoleIdEntityQtypeCustomFieldIdAuthorizationId($intRoleId,$objEntityQtypeCustomField->EntityQtypeCustomFieldId,1);
					if($objCustomAuthView)
						$chkCustomView->Checked=$objCustomAuthView->AuthorizedFlag;
					
					$objCustomAuthEdit=RoleEntityQtypeCustomFieldAuthorization::LoadByRoleIdEntityQtypeCustomFieldIdAuthorizationId($intRoleId,$objEntityQtypeCustomField->EntityQtypeCustomFieldId,2);
					if($objCustomAuthEdit)
						$chkCustomEdit->Checked=$objCustomAuthEdit->AuthorizedFlag;
				}								
				$this->arrCustomChecks[] = array('name' => $objCustomField->ShortDescription.':', 'view' => $chkCustomView,'edit' => $chkCustomEdit);
			}
      
	}
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
		require('../common/field_level_auth_composite.tpl.php');
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
	
 
	
public function uncheckAll(){
		$this->chkEntityView->Checked=false;
		$this->chkEntityEdit->Checked=false;
		$this->chkBuiltInView->Checked=false;
		$this->chkBuiltInEdit->Checked=false;
		if($this->arrCustomChecks)foreach($this->arrCustomChecks as $chkCustom){
			$chkCustom['view']->Checked=false;
			$chkCustom['edit']->Checked=false;
		}
	}
	public function disabledAll(){
		$this->chkEntityView->Enabled=false;
		$this->chkEntityEdit->Enabled=false;
		$this->chkBuiltInView->Enabled=false;
		$this->chkBuiltInEdit->Enabled=false;
		if($this->arrCustomChecks)foreach($this->arrCustomChecks as $chkCustom){
			$chkCustom['view']->Enabled=false;
			$chkCustom['edit']->Enabled=false;
		}
	}
	public function enableView(){
		//$this->chkEntityView->Enabled=true;
		$this->chkBuiltInView->Checked=true;
		$this->chkBuiltInView->Enabled=true;
		if($this->arrCustomChecks)foreach($this->arrCustomChecks as $chkCustom){
			$chkCustom['view']->Enabled=true;
		}
	}
	

	
  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
			
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