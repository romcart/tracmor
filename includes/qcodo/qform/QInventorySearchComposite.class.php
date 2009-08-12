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

class QInventorySearchComposite extends QControl {

	// Basic Inputs
	protected $lstCategory;
	protected $lstManufacturer;
	protected $lstLocation;
	protected $txtShortDescription;
	protected $txtInventoryModelCode;
	protected $arrCustomFields;

	// Buttons
	protected $btnSearch;
	protected $blnSearch;
	protected $btnClear;

	// Advanced Label/Link
	protected $lblAdvanced;
	// Boolean that toggles Advanced Search display
	protected $blnAdvanced;
	// Advanced Search Composite control
	protected $ctlAdvanced;

	// Search Values
	protected $intLocationId;
	protected $intInventoryModelId;
	protected $strShortDescription;
	protected $strInventoryModelCode;
	protected $intCategoryId;
	protected $intManufacturerId;
	protected $strDateModified;
	protected $strDateModifiedFirst;
	protected $strDateModifiedLast;
	protected $blnAttachment;

	// Use Ajax
	protected $blnUseAjax;
	// Do not create any links in DataGrid
	protected $blnRemoveAllLinks;

	public $dtgInventoryModel;
	public $objParentObject;

	// We want to override the constructor in order to setup the subcontrols
	public function __construct($objParentObject, $strControlId = null, $blnShowCheckboxes = false, $blnUseAjax = false, $blnRemoveAllLinks = false) {

    // First, call the parent to do most of the basic setup
    try {
        parent::__construct($objParentObject, $strControlId);
    } catch (QCallerException $objExc) {
        $objExc->IncrementOffset();
        throw $objExc;
    }

    $this->objParentObject = $objParentObject;
    $this->blnUseAjax = $blnUseAjax;
    $this->blnRemoveAllLinks = $blnRemoveAllLinks;

		$this->dtgInventoryModel = new QDataGrid($this);
		$this->dtgInventoryModel->Name = 'inventory_model_list';
  	$this->dtgInventoryModel->CellPadding = 5;
  	$this->dtgInventoryModel->CellSpacing = 0;
  	$this->dtgInventoryModel->CssClass = "datagrid";

    // Enable/Disable AJAX for the datagrid
    $this->dtgInventoryModel->UseAjax = $this->blnUseAjax;

    // Allow for column toggling
    $this->dtgInventoryModel->ShowColumnToggle = true;

    // Allow for CSV Export
    $this->dtgInventoryModel->ShowExportCsv = true;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgInventoryModel);
    $this->dtgInventoryModel->Paginator = $objPaginator;
    $this->dtgInventoryModel->ItemsPerPage = 20;

    // If the user wants the checkboxes column
    if ($blnShowCheckboxes) {
    	// This will render all of the necessary controls and actions. chkSelected_Render expects a unique ID for each row of the database.
    	$this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('<?=$_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->InventoryModelId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    }
    $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment_gray.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    // Removing any links in the column data
    if ($this->blnRemoveAllLinks) {
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Inventory Code', '<?= $_ITEM->InventoryModelCode; ?>', 'SortByCommand="inventory_model_code ASC"', 'ReverseSortByCommand="inventory_model_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    }
    else {
      $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Inventory Code', '<?= $_ITEM->__toStringWithLink("bluelink"); ?>', 'SortByCommand="inventory_model_code ASC"', 'ReverseSortByCommand="inventory_model_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    }
    $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Model', '<?= $_ITEM->ShortDescription ?>', 'Width=200', 'SortByCommand="short_description ASC"', 'ReverseSortByCommand="short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM->Category->__toString(); ?>', 'SortByCommand="inventory_model__category_id__short_description ASC"', 'ReverseSortByCommand="inventory_model__category_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->Manufacturer->__toString(); ?>', 'SortByCommand="inventory_model__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="inventory_model__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgInventoryModel->AddColumn(new QDataGridColumnExt('Quantity', '<?= $_ITEM->__toStringQuantity(); ?>', 'SortByCommand="inventory_model_quantity ASC"', 'ReverseSortByCommand="inventory_model_quantity DESC"', 'CssClass="dtg_column"'));

    // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
    $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(2, false);
    if ($objCustomFieldArray) {
    	foreach ($objCustomFieldArray as $objCustomField) {
    		//Only add the custom field column if the role has authorization to view it.
     		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
     			$this->dtgInventoryModel->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
     		}
     	}
    }

    $this->dtgInventoryModel->SortColumnIndex = 2;
    $this->dtgInventoryModel->SortDirection = 0;

    $objStyle = $this->dtgInventoryModel->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgInventoryModel->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgInventoryModel->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';

    $this->dtgInventoryModel->SetDataBinder('dtgInventoryModel_Bind', $this);

    $this->lstCategory_Create();
    $this->lstManufacturer_Create();
    $this->lstLocation_Create();
    $this->txtShortDescription_Create();
    $this->txtInventoryModelCode_Create();
    $this->btnSearch_Create();
    $this->btnClear_Create();
    $this->ctlAdvanced_Create();
    $this->lblAdvanced_Create();
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
		require('../inventory/inventory_search_composite.tpl.php');
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

	public function GetDataGridObjectNameId() {
	  $strToReturn = array();
	  // DataGrid name
	  $strToReturn[0] = "dtgInventoryModel";
	  // Id
	  $strToReturn[1] = "InventoryModelId";
	  // For Label generation
	  $strToReturn[2] = "InventoryModelCode";
	  return $strToReturn;
	}

  public function dtgInventoryModel_Bind() {

		// If the search button has been pressed
		if ($this->blnSearch) {
			$this->assignSearchValues();
		}

		$strInventoryModelCode = $this->strInventoryModelCode;
		$intLocationId = $this->intLocationId;
		$intInventoryModelId = $this->intInventoryModelId;
		$intCategoryId = $this->intCategoryId;
		$intManufacturerId = $this->intManufacturerId;
		$strShortDescription = $this->strShortDescription;
		$strDateModifiedFirst = $this->strDateModifiedFirst;
		$strDateModifiedLast = $this->strDateModifiedLast;
		$strDateModified = $this->strDateModified;
		$blnAttachment = $this->blnAttachment;
		$arrCustomFields = $this->arrCustomFields;

		// Enable Profiling
    // QApplication::$Database[1]->EnableProfiling();

    // Expand the Asset object to include the AssetModel, Category, Manufacturer, and Location Objects
    $objExpansionMap[InventoryModel::ExpandCategory] = true;
    $objExpansionMap[InventoryModel::ExpandManufacturer] = true;

    // If the search form has been posted
		$this->dtgInventoryModel->TotalItemCount = InventoryModel::CountBySearchHelper($strInventoryModelCode, $intLocationId, $intInventoryModelId, $intCategoryId, $intManufacturerId, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $objExpansionMap);
		if ($this->dtgInventoryModel->TotalItemCount == 0) {
			$this->dtgInventoryModel->ShowHeader = false;
		}
		else {
			$this->dtgInventoryModel->ShowHeader = true;
			$this->dtgInventoryModel->DataSource = InventoryModel::LoadArrayBySearchHelper($strInventoryModelCode, $intLocationId, $intInventoryModelId, $intCategoryId, $intManufacturerId, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $this->dtgInventoryModel->SortInfo, $this->dtgInventoryModel->LimitInfo, $objExpansionMap);
		}
		$this->blnSearch = false;
  }

  protected function ctlAdvanced_Create() {
  	$this->ctlAdvanced = new QAdvancedSearchComposite($this, 2);
  	$this->ctlAdvanced->Display = false;
  }

	/*************************
	*	CREATE INPUT METHODS
	*************************/

	protected function lstLocation_Create() {
 		$this->lstLocation = new QListBox($this);
 		$this->lstLocation->Name = 'Location';
 		$this->lstLocation->AddItem('- ALL -', null);
 		foreach (Location::LoadAllLocations(false, false, 'short_description') as $objLocation) {
 			$this->lstLocation->AddItem($objLocation->ShortDescription, $objLocation->LocationId);
 		}
 		if ($this->blnUseAjax) {
 		  $this->lstLocation->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
 		}
    else {
      $this->lstLocation->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
    }
    $this->lstLocation->AddAction(new QEnterKeyEvent(), new QTerminateAction());
 	}

	protected function lstCategory_Create() {
	 	$this->lstCategory = new QListBox($this);
		$this->lstCategory->Name = 'Category';
		$this->lstCategory->AddItem('- ALL -', null);
		foreach (Category::LoadAllWithFlags(false, true, 'short_description') as $objCategory) {
			$this->lstCategory->AddItem($objCategory->ShortDescription, $objCategory->CategoryId);
		}
	}

	protected function lstManufacturer_Create() {
    $this->lstManufacturer = new QListBox($this);
		$this->lstManufacturer->Name = 'Manufacturer';
		$this->lstManufacturer->AddItem('- ALL -', null);
		foreach (Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription))) as $objManufacturer) {
			$this->lstManufacturer->AddItem($objManufacturer->ShortDescription, $objManufacturer->ManufacturerId);
		}
	}

	protected function txtShortDescription_Create() {
	  $this->txtShortDescription = new QTextBox($this);
		$this->txtShortDescription->Name = 'Model';
		if ($this->blnUseAjax) {
		  $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
		}
    else {
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
    }
    $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	protected function txtInventoryModelCode_Create() {
	 	$this->txtInventoryModelCode = new QTextBox($this);
	 	$this->txtInventoryModelCode->Name = 'Inventory Code';
	 	if ($this->blnUseAjax) {
	 	  $this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
	 	}
	 	else {
	 	  $this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
	 	}
	 	$this->txtInventoryModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

  protected function chkOffsite_Create() {
  	$this->chkOffsite = new QCheckBox($this);
  	$this->chkOffsite->Text = 'Show Offsite Inventory';
  }

  /**************************
   *	CREATE BUTTON METHODS
  **************************/

  protected function btnSearch_Create() {
		$this->btnSearch = new QButton($this);
		$this->btnSearch->Name = 'search';
		$this->btnSearch->Text = 'Search';
		if ($this->blnUseAjax) {
  		$this->btnSearch->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
  		$this->btnSearch->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
		}
		else {
  		$this->btnSearch->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnSearch_Click'));
  		$this->btnSearch->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
		}
		$this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function btnClear_Create() {
  	$this->btnClear = new QButton($this);
		$this->btnClear->Name = 'clear';
		$this->btnClear->Text = 'Clear';
		if ($this->blnUseAjax) {
  		$this->btnClear->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnClear_Click'));
  		$this->btnClear->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnClear_Click'));
		}
		else {
		  $this->btnClear->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnClear_Click'));
  		$this->btnClear->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnClear_Click'));
		}
		$this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function lblAdvanced_Create() {
  	$this->lblAdvanced = new QLabel($this);
  	$this->lblAdvanced->Name = 'Advanced';
  	$this->lblAdvanced->Text = 'Advanced Search';
  	$this->lblAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->ctlAdvanced));
  	$this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'lblAdvanced_Click'));
  	$this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
  	$this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
  }

  public function btnSearch_Click() {
  	$this->blnSearch = true;
		$this->dtgInventoryModel->PageNumber = 1;
  }

  public function btnClear_Click() {
 		// Set controls to null
  	$this->lstCategory->SelectedIndex = 0;
  	$this->lstManufacturer->SelectedIndex = 0;
  	$this->txtShortDescription->Text = '';
  	$this->txtInventoryModelCode->Text = '';
  	$this->lstLocation->SelectedIndex = 0;
  	$this->ctlAdvanced->ClearControls();

  	// Set search variables to null
  	$this->intCategoryId = null;
  	$this->intManufacturerId = null;
  	$this->intLocationId = null;
  	$this->intInventoryModelId = null;
  	$this->strShortDescription = null;
  	$this->strInventoryModelCode = null;
  	$this->strDateModified = null;
  	$this->strDateModifiedFirst = null;
  	$this->strDateModifiedLast = null;
  	$this->blnAttachment = false;
  	if ($this->arrCustomFields) {
  		foreach ($this->arrCustomFields as $field) {
  			$field['value'] = null;
  		}
  	}
  	$this->btnSearch_Click();
  	$this->blnSearch = false;
  }

  public function lblAdvanced_Click() {
  	if ($this->blnAdvanced) {

  		$this->blnAdvanced = false;
  		$this->lblAdvanced->Text = 'Advanced Search';

  		$this->ctlAdvanced->ClearControls();

  	}
  	else {
  		$this->blnAdvanced = true;
  		$this->lblAdvanced->Text = 'Hide Advanced';
  	}
  }

  protected function assignSearchValues() {
  	$this->intCategoryId = $this->lstCategory->SelectedValue;
		$this->intManufacturerId = $this->lstManufacturer->SelectedValue;
		$this->strShortDescription = $this->txtShortDescription->Text;
		$this->strInventoryModelCode = $this->txtInventoryModelCode->Text;
		$this->intLocationId = $this->lstLocation->SelectedValue;
		$this->intInventoryModelId = QApplication::QueryString('intInventoryModelId');
		$this->strDateModified = $this->ctlAdvanced->DateModified;
		$this->strDateModifiedFirst = $this->ctlAdvanced->DateModifiedFirst;
		$this->strDateModifiedLast = $this->ctlAdvanced->DateModifiedLast;
		$this->blnAttachment = $this->ctlAdvanced->Attachment;

		$this->arrCustomFields = $this->ctlAdvanced->CustomFieldArray;
		if ($this->arrCustomFields) {
			foreach ($this->arrCustomFields as &$field) {
				if ($field['input'] instanceof QListBox) {
					$field['value'] = $field['input']->SelectedValue;
				}
				elseif ($field['input'] instanceof QTextBox) {
					$field['value'] = $field['input']->Text;
				}
			}
		}
  }

  public function Refresh() {
    $this->btnClear_Click();
  }

	// And our public getter/setters
  public function __get($strName) {
	  switch ($strName) {
			case "ParentObject": return $this->objParentObject;
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