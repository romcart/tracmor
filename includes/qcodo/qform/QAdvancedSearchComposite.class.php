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
	protected $lstDateModified;
	protected $dtpDateModifiedFirst;
	protected $dtpDateModifiedLast;
	protected $strAssetModelCode;
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
	    
	    $this->txtAssetModelCode_Create();
	    $this->lstDateModified_Create();
      $this->dtpDateModifiedFirst_Create();
      $this->dtpDateModifiedLast_Create();
      $this->customFields_Create();
      
	}
	public function ParsePostData() {
		$this->strAssetModelCode = $this->txtAssetModelCode->Text;
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
		
		$strMessage = $this->txtAssetModelCode->RenderWithNameLeft(false);
		$strMessage .= $this->lstDateModified->RenderWithNameLeft(false);
		$strMessage .= $this->dtpDateModifiedFirst->RenderWithNameLeft(false);
		$strMessage .= $this->dtpDateModifiedLast->RenderWithNameLeft(false);
		foreach ($this->arrCustomFields as $field) {
			$strMessage .= $field['input']->RenderWithNameLeft(false);
		}
		
		$strToReturn =  sprintf('<span id="%s" %s%s>%s</span>',
		$this->strControlId,
		$strStyle,
		$strAttributes,
		$strMessage);
		
		return $strToReturn;
	}
	
  protected function txtAssetModelCode_Create() {
    $this->txtAssetModelCode = new QTextBox($this);
		$this->txtAssetModelCode->Name = 'Part Number';
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
		$this->txtAssetModelCode->Text = '';
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