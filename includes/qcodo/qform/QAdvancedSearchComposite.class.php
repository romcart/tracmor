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
?>

<?php

class QAdvancedSearchComposite extends QControl {

	protected $txtAssetModelCode;
	protected $lstReservedBy;
	protected $lstCheckedOutBy;
	protected $txtTrackingNumber;
	protected $lstDateModified;
	protected $dtpDateModifiedFirst;
	protected $dtpDateModifiedLast;
	protected $strAssetModelCode;
	protected $strTrackingNumber;
	protected $objCustomFieldArray;
	protected $arrCustomFields;
	protected $intEntityQtypeId;
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
	    
	    if ($objParentObject instanceof AssetListForm) {
	    	$this->txtAssetModelCode_Create();
	    	$this->lstReservedBy_Create();
	    	$this->lstCheckedOutBy_Create();
	    }
	    
	    if ($objParentObject instanceof ShipmentListForm) {
	    	$this->txtTrackingNumber_Create();
	    }
	    $this->lstDateModified_Create();
      $this->dtpDateModifiedFirst_Create();
      $this->dtpDateModifiedLast_Create();
      $this->customFields_Create();
      
	}
	public function ParsePostData() {
		if ($this->objParentObject instanceof AssetListForm) {
			$this->strAssetModelCode = $this->txtAssetModelCode->Text;
		}
		if ($this->objParentObject instanceof ShipmentListForm) {
			$this->strTrackingNumber = $this->txtTrackingNumber->Text;
		}
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
		require('../common/advanced_search_composite.tpl.php');
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
	
  protected function txtAssetModelCode_Create() {
    $this->txtAssetModelCode = new QTextBox($this);
		$this->txtAssetModelCode->Name = 'Asset Model Code';
    $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
    $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    // if ($this->objParentObject instanceof AssetListFormBase) {
    if (get_class($this->objParentObject) == 'AssetListForm') {
    	$this->txtAssetModelCode->Visible = true;
    }
    else {
    	$this->txtAssetModelCode->Visible = false;
    }
  }
  
  protected function lstReservedBy_Create() {
  	$this->lstReservedBy = new QListBox($this);
  	$this->lstReservedBy->Name = 'Reserved By';
  	$this->lstReservedBy->AddItem('- Select One -', null, true);
  	$this->lstReservedBy->AddItem('Any', 'any');
  	$objUserAccountArray = UserAccount::LoadAll();
  	if ($objUserAccountArray) {
  		foreach ($objUserAccountArray as $objUserAccount) {
  			$this->lstReservedBy->AddItem($objUserAccount->__toString(), $objUserAccount->UserAccountId);
  		}
  	}
  }
  
  protected function lstCheckedOutBy_Create() {
  	$this->lstCheckedOutBy = new QListBox($this);
  	$this->lstCheckedOutBy->Name = 'Checked Out By';
		$this->lstCheckedOutBy->AddItem('- Select One -', null, true);
  	$this->lstCheckedOutBy->AddItem('Any', 'any');
  	$objUserAccountArray = UserAccount::LoadAll();
  	if ($objUserAccountArray) {
  		foreach ($objUserAccountArray as $objUserAccount) {
  			$this->lstCheckedOutBy->AddItem($objUserAccount->__toString(), $objUserAccount->UserAccountId);
  		}
  	}
  }
  
  protected function txtTrackingNumber_Create() {
		$this->txtTrackingNumber = new QTextBox($this);
		$this->txtTrackingNumber->Name = 'Tracking Number';
		$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSearch_Click'));
		$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtTrackingNumber->Visible = (get_class($this->objParentObject) == 'ShipmentListForm') ? true : false;
  }
  
  protected function dtpDateModifiedFirst_Create() {
  	$this->dtpDateModifiedFirst = new QDateTimePicker($this);
  	$this->dtpDateModifiedFirst->Name = '';
  	$this->dtpDateModifiedFirst->DateTime = new QDateTime(QDateTime::Now);
  	$this->dtpDateModifiedFirst->DateTimePickerType = QDateTimePickerType::Date;
  	$this->dtpDateModifiedFirst->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
  	$this->dtpDateModifiedFirst->Enabled = false;
  }
  
  protected function dtpDateModifiedLast_Create() {
  	$this->dtpDateModifiedLast = new QDateTimePicker($this);
  	$this->dtpDateModifiedLast->Name = '';
  	$this->dtpDateModifiedLast->DateTime = new QDateTime(QDateTime::Now);
  	$this->dtpDateModifiedLast->DateTimePickerType = QDateTimePickerType::Date;
  	$this->dtpDateModifiedLast->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
  	$this->dtpDateModifiedLast->Enabled = false;
  }	
	
	protected function lstDateModified_Create() {
		$this->lstDateModified = new QListBox($this);
		$this->lstDateModified->Name = "Date Modified";
		$this->lstDateModified->AddItem('None', null, true);
		$this->lstDateModified->AddItem('Before', 'before');
		$this->lstDateModified->AddItem('After', 'after');
		$this->lstDateModified->AddItem('Between', 'between');
		$this->lstDateModified->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstDateModified_Select'));
	}
	
	protected function customFields_Create() {
		
		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
		$this->objCustomFieldArray = CustomField::LoadObjCustomFieldArray($this->intEntityQtypeId, false, null);
		// Create the Custom Field Controls - labels and inputs (text or list) for each
		$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objCustomFieldArray, false, $this, false, true, true);

	}
	
	public function lstDateModified_Select($strFormId, $strControlId, $strParameter) {
		$value = $this->lstDateModified->SelectedValue;
		if ($value == null) {
			$this->dtpDateModifiedFirst->Enabled = false;
			$this->dtpDateModifiedLast->Enabled = false;
		}
		elseif ($value == 'before') {
			$this->dtpDateModifiedFirst->Enabled = true;
			$this->dtpDateModifiedLast->Enabled = false;
		}
		elseif ($value == 'after') {
			$this->dtpDateModifiedFirst->Enabled = true;
			$this->dtpDateModifiedLast->Enabled = false;
		}
		elseif ($value == 'between') {
			$this->dtpDateModifiedFirst->Enabled = true;
			$this->dtpDateModifiedLast->Enabled = true;
		}
	}
	
	public function ClearControls() {
		if ($this->objParentObject instanceof AssetListForm) {
			$this->txtAssetModelCode->Text = '';
			$this->lstCheckedOutBy->SelectedIndex = 0;
			$this->lstReservedBy->SelectedIndex = 0;
		}
		if ($this->objParentObject instanceof ShipmentListForm) {
			$this->txtTrackingNumber->Text = '';
		}
		$this->lstDateModified->SelectedIndex = 0;
		$this->dtpDateModifiedFirst->DateTime = new QDateTime(QDateTime::Now);
		$this->dtpDateModifiedLast->DateTime = new QDateTime(QDateTime::Now);
		$this->dtpDateModifiedFirst->Enabled = false;
		$this->dtpDateModifiedLast->Enabled = false;
		foreach ($this->arrCustomFields as $field) {
			if ($field['input'] instanceof QTextBox) {
				$field['input']->Text = '';
			}
			elseif ($field['input'] instanceof QListBox) {
				$field['input']->SelectedIndex = null;
			}
		}
	}
	
  // And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
			case "AssetModelCode": return $this->txtAssetModelCode->Text;
				break;
			case "ReservedBy": return $this->lstReservedBy->SelectedValue;
				break;
			case "CheckedOutBy": return $this->lstCheckedOutBy->SelectedValue;
				break;				
			case "TrackingNumber": return $this->txtTrackingNumber->Text;
				break;
			case "DateModified": return $this->lstDateModified->SelectedValue;
				break;
			case "DateModifiedFirst": return $this->dtpDateModifiedFirst->DateTime;
				break;
			case "DateModifiedLast": return $this->dtpDateModifiedLast->DateTime;
				break;
			case "CustomFieldArray": return $this->arrCustomFields;
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
