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

class QAdvancedSearchComposite extends QControl {

	protected $txtAssetModelCode;
	protected $lstReservedBy;
	protected $lstCheckedOutBy;
	protected $txtFromCompany;
	protected $txtFromContact;
	protected $txtTrackingNumber;
	protected $lstCourier;
	protected $txtNote;
	protected $dtpShipmentDate;
	protected $dtpDueDate;
	protected $dtpReceiptDate;
	protected $chkAttachment;
	protected $lstDateModified;
	protected $dtpDateModifiedFirst;
	protected $dtpDateModifiedLast;
	protected $strAssetModelCode;
	protected $strTrackingNumber;
	protected $strNote;
	protected $blnAttachment;
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
	    
	    if ($objParentObject instanceof AssetListForm || $objParentObject instanceof QAssetSearchComposite) {
	    	$this->txtAssetModelCode_Create();
	    	$this->lstReservedBy_Create();
	    	$this->lstCheckedOutBy_Create();
	    }
	    
	    if ($objParentObject instanceof ShipmentListForm) {
	    	$this->txtFromCompany_Create();
	    	$this->txtFromContact_Create();
	    	$this->txtTrackingNumber_Create();
	    	$this->lstCourier_Create();
	    	$this->txtNote_Create();
	    	$this->dtpShipmentDate_Create();
	    }
	    if ($objParentObject instanceof ReceiptListForm) {
	    	$this->txtNote_Create();
	    	$this->dtpDueDate_Create();
	    	$this->dtpReceiptDate_Create();
	    }		
	  $this->lstDateModified_Create();
      $this->dtpDateModifiedFirst_Create();
      $this->dtpDateModifiedLast_Create();
      $this->chkAttachment_Create();
      $this->customFields_Create();
	}
	
	public function ParsePostData() {
		if ($this->objParentObject instanceof AssetListForm || $this->objParentObject instanceof QAssetSearchComposite) {
			$this->strAssetModelCode = $this->txtAssetModelCode->Text;
		}
		if ($this->objParentObject instanceof ShipmentListForm) {
			$this->strTrackingNumber = $this->txtTrackingNumber->Text;
			$this->strNote = $this->txtNote->Text;
		}
		if ($this->objParentObject instanceof ReceiptListForm) {
			$this->strNote = $this->txtNote->Text;
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
    $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QServerControlAction($this->objParentObject, 'btnSearch_Click'));
    $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    // if ($this->objParentObject instanceof AssetListFormBase) {
    if (get_class($this->objParentObject) == 'AssetListForm' || get_class($this->objParentObject) == 'QAssetSearchComposite') {
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
  	$objUserAccountArray = UserAccount::LoadAllAsCustomArray('username');
  	if ($objUserAccountArray) {
  		foreach ($objUserAccountArray as $arrUserAccount) {
  			$this->lstReservedBy->AddItem($arrUserAccount['username'], $arrUserAccount['user_account_id']);
  		}
  	}
  }
  
  protected function lstCheckedOutBy_Create() {
  	$this->lstCheckedOutBy = new QListBox($this);
  	$this->lstCheckedOutBy->Name = 'Checked Out By';
		$this->lstCheckedOutBy->AddItem('- Select One -', null, true);
  	$this->lstCheckedOutBy->AddItem('Any', 'any');
  	$objUserAccountArray = UserAccount::LoadAllAsCustomArray('username');
  	if ($objUserAccountArray) {
  		foreach ($objUserAccountArray as $arrUserAccount) {
  			$this->lstCheckedOutBy->AddItem($arrUserAccount['username'], $arrUserAccount['user_account_id']);
  		}
  	}
  }
  
  protected function txtFromCompany_Create() {
	$this->txtFromCompany = new QTextBox($this);
	$this->txtFromCompany->Name = 'Ship FromCompany';
	$this->txtFromCompany->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
	$this->txtFromCompany->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	$this->txtFromCompany->Visible = (get_class($this->objParentObject) == 'ShipmentListForm') ? true : false;
  }

  protected function txtFromContact_Create() {
	$this->txtFromContact = new QTextBox($this);
	$this->txtFromContact->Name = 'Ship From Contact';
	$this->txtFromContact->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
	$this->txtFromContact->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	$this->txtFromContact->Visible = (get_class($this->objParentObject) == 'ShipmentListForm') ? true : false;
  }
  
  protected function txtTrackingNumber_Create() {
		$this->txtTrackingNumber = new QTextBox($this);
		$this->txtTrackingNumber->Name = 'Tracking Number';
		$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
		$this->txtTrackingNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtTrackingNumber->Visible = (get_class($this->objParentObject) == 'ShipmentListForm') ? true : false;
  }
  
  protected function lstCourier_Create() {
  	$this->lstCourier = new QListBox($this);
  	$this->lstCourier->Name = 'Courier';
  	$this->lstCourier->AddItem('- Select One -', null, true);
  	$objCourierArray = Courier::LoadAll();
  	if ($objCourierArray) {
  		foreach ($objCourierArray as $objCourier) {
  			$this->lstCourier->AddItem($objCourier->__toString(), $objCourier->CourierId);
  		}
  	}
  }
  
  protected function txtNote_Create() {
  	$this->txtNote = new QTextBox($this);
  	$this->txtNote->Name = 'Note';
  	$this->txtNote->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
  	$this->txtNote->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  	$this->txtNote->Visible = (get_class($this->objParentObject) == 'ShipmentListForm' || get_class($this->objParentObject) == 'ReceiptListForm') ? true : false;
  }
  
  protected function chkAttachment_Create() {
  	$this->chkAttachment = new QCheckBox($this);
  	$this->chkAttachment->Name = 'Attachment(s)';
  	$this->chkAttachment->AddAction(new QEnterKeyEvent(), new QServerAction('btnSearch_Click'));
  	$this->chkAttachment->AddAction(new QEnterKeyEvent(), new QTerminateAction());
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
	
	protected function dtpShipmentDate_Create() {
  	$this->dtpShipmentDate = new QDateTimePicker($this);
  	$this->dtpShipmentDate->Name = '';
  	$this->dtpShipmentDate->DateTimePickerType = QDateTimePickerType::Date;
  	$this->dtpShipmentDate->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
  }
  
  protected function dtpDueDate_Create() {
  	$this->dtpDueDate = new QDateTimePicker($this);
  	$this->dtpDueDate->Name = '';
  	$this->dtpDueDate->DateTimePickerType = QDateTimePickerType::Date;
  	$this->dtpDueDate->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
  }
  
  protected function dtpReceiptDate_Create() {
  	$this->dtpReceiptDate = new QDateTimePicker($this);
  	$this->dtpReceiptDate->Name = '';
  	$this->dtpReceiptDate->DateTimePickerType = QDateTimePickerType::Date;
  	$this->dtpReceiptDate->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
  }
	
	protected function customFields_Create() {
		
		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
		$this->objCustomFieldArray = CustomField::LoadObjCustomFieldArray($this->intEntityQtypeId, false, null);
		// Create the Custom Field Controls - labels and inputs (text or list) for each
		$this->arrCustomFields = CustomField::CustomFieldControlsCreate($this->objCustomFieldArray, false, $this->objParentObject, false, true, true);
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
		if ($this->objParentObject instanceof AssetListForm || $this->objParentObject instanceof QAssetSearchComposite) {
			$this->txtAssetModelCode->Text = '';
			$this->lstCheckedOutBy->SelectedIndex = 0;
			$this->lstReservedBy->SelectedIndex = 0;
		}
		if ($this->objParentObject instanceof ShipmentListForm) {
			$this->txtTrackingNumber->Text = '';
			$this->lstCourier->SelectedIndex = 0;
			$this->txtNote->Text = '';
		}
		if ($this->objParentObject instanceof ReceiptListForm) {
			$this->txtNote->Text = '';
		}
		$this->lstDateModified->SelectedIndex = 0;
		$this->dtpDateModifiedFirst->DateTime = new QDateTime(QDateTime::Now);
		$this->dtpDateModifiedLast->DateTime = new QDateTime(QDateTime::Now);
		$this->dtpDateModifiedFirst->Enabled = false;
		$this->dtpDateModifiedLast->Enabled = false;
		$this->chkAttachment->Checked = false;
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
			case "FromCompany": return $this->txtFromCompany->Text;
				break;
			case "FromContact": return $this->txtFromContact->Text;
				break;			
			case "TrackingNumber": return $this->txtTrackingNumber->Text;
				break;
			case "CourierId": return $this->lstCourier->SelectedValue;
				break;
			case "Note": return $this->txtNote->Text;
				break;
			case "ShipmentDate": return $this->dtpShipmentDate->DateTime;
				break;
			case "DueDate": return $this->dtpDueDate->DateTime;
				break;
			case "ReceiptDate": return $this->dtpReceiptDate->DateTime;
				break;
			case "DateModified": return $this->lstDateModified->SelectedValue;
				break;
			case "DateModifiedFirst": return $this->dtpDateModifiedFirst->DateTime;
				break;
			case "DateModifiedLast": return $this->dtpDateModifiedLast->DateTime;
				break;
			case "Attachment": return $this->chkAttachment->Checked;
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
