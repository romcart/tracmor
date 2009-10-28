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

class QHeaderMenu extends QControl {

	protected $objRoleModuleArray;
	protected $lblSignOut;
	protected $lblLogo;
	protected $objParentObject;
	
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

		  $objExpansionMap[RoleModule::ExpandModule] = true;
		  $this->objRoleModuleArray = RoleModule::LoadArrayByRoleIdAccessFlag(QApplication::$objUserAccount->RoleId, true, null, null, $objExpansionMap);
	    
	    $this->lblSignOut_Create();
	    $this->lblLogo_Create();
	    $this->objDefaultWaitIcon_Create();
	}
	
	public function ParsePostData() {}
	
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
    $JavaScriptArray = QApplication::$JavaScriptArray;
    $AlertMessageArray = QApplication::$AlertMessageArray;
    $JavaScriptArrayHighPriority = QApplication::$JavaScriptArrayHighPriority;
		ob_clean();

		// Evaluate the template
		require('../common/header_menu.tpl.php');
		$strTemplateEvaluated = ob_get_contents();
		ob_clean();

		// Restore the output buffer and return evaluated template
		print($strAlreadyRendered);		
		
		$strToReturn =  sprintf('<span id="%s" %s%s>%s</span>',
		$this->strControlId,
		$strStyle,
		$strAttributes,
		$strTemplateEvaluated);
    
    QApplication::$JavaScriptArray = $JavaScriptArray;
    QApplication::$AlertMessageArray = $AlertMessageArray;
    QApplication::$JavaScriptArrayHighPriority = $JavaScriptArrayHighPriority;
    
    return $strToReturn;
	}
	
	protected function lblSignOut_Create() {
		$this->lblSignOut = new QLabel($this);
		$this->lblSignOut->Text = 'Sign Out';
		$this->lblSignOut->AddAction(new QClickEvent(), new QServerControlAction($this, 'lblSignOut_Click'));
		$this->lblSignOut->ForeColor = '#555555';
		$this->lblSignOut->FontNames = 'arial';
		$this->lblSignOut->FontSize = '12px';
		$this->lblSignOut->FontUnderline = false;
		$this->lblSignOut->FontBold = true;
		$this->lblSignOut->SetCustomStyle('cursor', 'pointer');
		$this->lblSignOut->HtmlEntities = false;
	}
	
	protected function lblLogo_Create() {
		$this->lblLogo = new QLabel($this);
		$this->lblLogo->Text = sprintf('<img src="../images/%s">', QApplication::$TracmorSettings->CompanyLogo);
		$this->lblLogo->HtmlEntities = false;
	}
	
	protected function objDefaultWaitIcon_Create() {
		$this->objParentObject->objDefaultWaitIcon = new QWaitIcon($this->objParentObject);
		$this->objParentObject->objDefaultWaitIcon->TagName = 'div';
		$this->objParentObject->objDefaultWaitIcon->Padding = '0px 20px 14px 0px';
		$this->objParentObject->objDefaultWaitIcon->Text = sprintf('<img class="spinner" src="%s/spinner_14.gif" width="16" height="16" alt="Please Wait..."/>', __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__);
	}
	
	public function lblSignOut_Click() {
		QApplication::Logout();
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