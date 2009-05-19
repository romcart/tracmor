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

class QAssetSearchComposite extends QControl {

	// Basic Inputs
	protected $lstCategory;
	protected $lstManufacturer;
	protected $lstLocation;
	protected $txtShortDescription;
	protected $txtAssetCode;
	protected $chkOffsite;
	protected $lblAssetModelId;
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
	protected $intAssetModelId;
	protected $strShortDescription;
	protected $strAssetCode;
	protected $intCategoryId;
	protected $intManufacturerId;
	protected $blnOffsite;
	protected $strAssetModelCode;
	protected $intReservedBy;
	protected $intCheckedOutBy;
	protected $strDateModified;
	protected $strDateModifiedFirst;
	protected $strDateModifiedLast;
	protected $blnAttachment;

	// Use Ajax
	protected $blnUseAjax;
	// Do not create any links in DataGrid
	protected $blnRemoveAllLinks;

	public $dtgAsset;
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

		$this->dtgAsset = new QDataGrid($this);
		$this->dtgAsset->Name = 'asset_list';
		$this->dtgAsset->CellPadding = 5;
		$this->dtgAsset->CellSpacing = 0;
		$this->dtgAsset->CssClass = "datagrid";

    // Enable/Disable AJAX for the datagrid
    $this->dtgAsset->UseAjax = $this->blnUseAjax;

    $this->dtgAsset->ShowColumnToggle = true;
    $this->dtgAsset->ShowExportCsv = true;

    /*if (!$blnRemoveAllLinks) {
      // Allow for column toggling
      $this->dtgAsset->ShowColumnToggle = true;

      // Allow for CSV Export
      $this->dtgAsset->ShowExportCsv = true;
    }
    else {
      // Disallow for column toggling
      $this->dtgAsset->ShowColumnToggle = false;

      // Disallow for CSV Export
      $this->dtgAsset->ShowExportCsv = false;
    }*/

    // Add a 'Select All' checkbox
    $this->dtgAsset->ShowCheckboxes = false;

    // Enable Pagination, and set to 20 items per page
    $objPaginator = new QPaginator($this->dtgAsset);
    $this->dtgAsset->Paginator = $objPaginator;
    $this->dtgAsset->ItemsPerPage = 20;

    // If the user wants the checkboxes column
    if ($blnShowCheckboxes) {
    	// This will render all of the necessary controls and actions. chkSelected_Render expects a unique ID for each row of the database.
    	$this->dtgAsset->AddColumn(new QDataGridColumnExt('<?= $_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->AssetId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    }
    $this->dtgAsset->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment_gray.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    // Removing any links in the column data
    if ($this->blnRemoveAllLinks) {
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Code', '<?= $_ITEM->AssetCode ?> <?= $_ITEM->ToStringHoverTips($_CONTROL) ?>', 'SortByCommand="asset_code ASC"', 'ReverseSortByCommand="asset_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Model', '<?= $_ITEM->AssetModel->ShortDescription ?>', 'SortByCommand="asset__asset_model_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    }
    else {
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Code', '<?= $_ITEM->__toStringWithLink("bluelink") ?> <?= $_ITEM->ToStringHoverTips($_CONTROL) ?>', 'SortByCommand="asset_code ASC"', 'ReverseSortByCommand="asset_code DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
      $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Model', '<?= $_ITEM->AssetModel->__toStringWithLink("bluelink") ?>', 'SortByCommand="asset__asset_model_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    }
    $this->dtgAsset->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM->AssetModel->Category->__toString() ?>', 'SortByCommand="asset__asset_model_id__category_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__category_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgAsset->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->AssetModel->Manufacturer->__toString() ?>', 'SortByCommand="asset__asset_model_id__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="asset__asset_model_id__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgAsset->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM->Location->__toString() ?>', 'SortByCommand="asset__location_id__short_description ASC"', 'ReverseSortByCommand="asset__location_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset Model Code', '<?= $_ITEM->AssetModel->AssetModelCode ?>', 'SortByCommand="asset__asset_model_id__asset_model_code"', 'ReverseSortByCommand="asset__asset_model_id__asset_model_code DESC"', 'CssClass="dtg_column"', 'Display="false"'));
    $this->dtgAsset->AddColumn(new QDataGridColumnExt('Parent Asset Code', '<?= $_CONTROL->objParentControl->ParentAsset__toString($_ITEM) ?>', 'SortByCommand="asset__parent_asset_id__asset_code ASC"', 'ReverseSortByCommand="asset__parent_asset_id__asset_code DESC"', 'CssClass="dtg_column"', 'Display="false"', 'HtmlEntities="false"'));

    // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
    $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(1, false);	
    if ($objCustomFieldArray) {
    	foreach ($objCustomFieldArray as $objCustomField) {
    		//Only add the custom field column if the role has authorization to view it.
    		if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
    			$this->dtgAsset->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
    		}
    	}
    }

    // Column to originally sort by (Asset Model)
    $this->dtgAsset->SortColumnIndex = 2;
    $this->dtgAsset->SortDirection = 0;

    $objStyle = $this->dtgAsset->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgAsset->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgAsset->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';

    $this->dtgAsset->SetDataBinder('dtgAsset_Bind', $this);
    $this->lstCategory_Create();
    $this->lstManufacturer_Create();
    $this->lstLocation_Create();
    $this->txtShortDescription_Create();
    $this->txtAssetCode_Create();
    $this->chkOffsite_Create();
    $this->lblAssetModelId_Create();	
    $this->btnSearch_Create();
    $this->btnClear_Create();
    $this->ctlAdvanced_Create();	
    $this->lblAdvanced_Create();
	}

	public function ParsePostData() {

	}

	public function GetDataGridObjectNameId() {
	  $strToReturn = array();
	  // DataGrid name
	  $strToReturn[0] = "dtgAsset";
	  // Id
	  $strToReturn[1] = "AssetId";
	  // For Label generation
	  $strToReturn[2] = "AssetCode";
	  return $strToReturn;
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
		require('../assets/asset_search_composite.tpl.php');
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

	public function dtgAsset_Bind() {

		if (QApplication::QueryString('intAssetModelId')) {
			$this->lblAssetModelId->Text = QApplication::QueryString('intAssetModelId');
			$this->blnSearch = true;
		}

		// If the search button has been pressed or the AssetModelId was sent in the query string from the asset models page
		if ($this->blnSearch) {
			$this->assignSearchValues();
		}

		$strAssetCode = $this->strAssetCode;
		$intLocationId = $this->intLocationId;
		$intAssetModelId = $this->intAssetModelId;
		$intCategoryId = $this->intCategoryId;
		$intManufacturerId = $this->intManufacturerId;
		$blnOffsite = $this->blnOffsite;
		$strAssetModelCode = $this->strAssetModelCode;
		$intReservedBy = $this->intReservedBy;
		$intCheckedOutBy = $this->intCheckedOutBy;
		$strShortDescription = $this->strShortDescription;
		$strDateModifiedFirst = $this->strDateModifiedFirst;
		$strDateModifiedLast = $this->strDateModifiedLast;
		$strDateModified = $this->strDateModified;
		$blnAttachment = $this->blnAttachment;
		$arrCustomFields = $this->arrCustomFields;

		// Enable Profiling
    //QApplication::$Database[1]->EnableProfiling();


    // Expand the Asset object to include the AssetModel, Category, Manufacturer, and Location Objects
    $objExpansionMap[Asset::ExpandAssetModel][AssetModel::ExpandCategory] = true;
    $objExpansionMap[Asset::ExpandAssetModel][AssetModel::ExpandManufacturer] = true;
    $objExpansionMap[Asset::ExpandParentAsset] = true;
    $objExpansionMap[Asset::ExpandLocation] = true;
		//if ($this->blnSearch || !$this->blnUseAjax) {
		if ((!$this->objParentControl && $this->Display == true) || $this->objParentControl->Display == true) {
			$this->dtgAsset->TotalItemCount = Asset::CountBySearchHelper($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $objExpansionMap);
			if ($this->dtgAsset->TotalItemCount == 0) {
				$this->dtgAsset->ShowHeader = false;
			}
			else {
				$this->dtgAsset->DataSource = Asset::LoadArrayBySearchHelper($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $this->dtgAsset->SortInfo, $this->dtgAsset->LimitInfo, $objExpansionMap);
				$this->dtgAsset->ShowHeader = true;
			}
		}
		$this->blnSearch = false;
	
  }

  protected function ctlAdvanced_Create() {
		$this->ctlAdvanced = new QAdvancedSearchComposite($this, 1);
		$this->ctlAdvanced->Display = false;
	}

	/*************************
	*	CREATE INPUT METHODS
	*************************/

	protected function lstLocation_Create() {
		$this->lstLocation = new QListBox($this);
		$this->lstLocation->Name = 'Location';
		$this->lstLocation->AddItem('- ALL -', null);
		foreach (Location::LoadAllLocationsAsCustomArray(true, true, 'short_description') as $arrLocation) {
			// Keep Shipped and To Be Received at the top of the list
			if ($arrLocation['location_id'] == 2 || $arrLocation['location_id'] == 5) {
				$this->lstLocation->AddItemAt(1, new QListItem($arrLocation['short_description'], $arrLocation['location_id']));
			}
			else {
				$this->lstLocation->AddItem($arrLocation['short_description'], $arrLocation['location_id']);
			}
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
		foreach (Category::LoadAllAsCustomArray(true, false, 'short_description') as $arrCategory) {
			$this->lstCategory->AddItem($arrCategory['short_description'], $arrCategory['category_id']);
		}
  }

  protected function lstManufacturer_Create() {
    $this->lstManufacturer = new QListBox($this);
		$this->lstManufacturer->Name = 'Manufacturer';
		$this->lstManufacturer->AddItem('- ALL -', null);
		foreach (Manufacturer::LoadAllAsCustomArray('short_description') as $arrManufacturer) {
			$this->lstManufacturer->AddItem($arrManufacturer['short_description'], $arrManufacturer['manufacturer_id']);
		}
  }

  protected function txtShortDescription_Create() {
    $this->txtShortDescription = new QTextBox($this);
		$this->txtShortDescription->Name = 'Model';
		// Because the enter key will also call form.submit() on some browsers, which we
    // absolutely DON'T want to have happen, let's be sure to terminate any additional
    // actions on EnterKey
    if ($this->blnUseAjax) {
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
    }
    else {
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
    }
    $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());

  }

  protected function txtAssetCode_Create() {
  	$this->txtAssetCode = new QTextBox($this);
  	$this->txtAssetCode->Name = 'Asset Code';
  	if ($this->blnUseAjax) {
  	  $this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSearch_Click'));
  	}
  	else {
  	  $this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QServerControlAction($this, 'btnSearch_Click'));
  	}
  	$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function chkOffsite_Create() {
  	$this->chkOffsite = new QCheckBox($this);
  	$this->chkOffsite->Text = 'Show Offsite Assets';
  }

  protected function lblAssetModelId_Create() {
  	$this->lblAssetModelId = new QLabel($this);
  	$this->lblAssetModelId->Text = '';
  	$this->lblAssetModelId->Visible = false;
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
		$this->dtgAsset->PageNumber = 1;
  }

  public function btnClear_Click() {
  	if ($this->intAssetModelId) {
  		QApplication::Redirect('asset_list.php');
  	}
  	else {
  		// Set controls to null
	  	$this->lstCategory->SelectedIndex = 0;
	  	$this->lstManufacturer->SelectedIndex = 0;
	  	$this->txtShortDescription->Text = '';
	  	$this->txtAssetCode->Text = '';
	  	$this->chkOffsite->Checked = false;
	  	$this->lstLocation->SelectedIndex = 0;
	  	$this->ctlAdvanced->ClearControls();

	  	// Set search variables to null
	  	$this->intCategoryId = null;
	  	$this->intManufacturerId = null;
	  	$this->intLocationId = null;
	  	$this->intAssetModelId = null;
	  	$this->strShortDescription = null;
	  	$this->strAssetCode = null;
	  	$this->blnOffsite = false;
	  	$this->strAssetModelCode = null;
	  	$this->intReservedBy = null;
	  	$this->intCheckedOutBy = null;
	  	$this->strDateModified = null;
	  	$this->strDateModifiedFirst = null;
	  	$this->strDateModifiedLast = null;
	  	$this->blnAttachment = false;
	  	if ($this->arrCustomFields) {
	  		foreach ($this->arrCustomFields as $field) {
	  			$field['value'] = null;
	  		}
	  	}
	  	$this->dtgAsset->SortColumnIndex = 2;
	  	$this->dtgAsset->SortDirection = 0;
	  	$this->blnSearch = false;
	  	if ($this->blnUseAjax) {
	  	  $this->btnSearch_Click();
	  	}
  	}
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
		$this->strAssetCode = $this->txtAssetCode->Text;
		$this->blnOffsite = $this->chkOffsite->Checked;
		$this->intLocationId = $this->lstLocation->SelectedValue;
		$this->intAssetModelId = $this->lblAssetModelId->Text;
		$this->strAssetModelCode = $this->ctlAdvanced->AssetModelCode;
		$this->intReservedBy = $this->ctlAdvanced->ReservedBy;
		$this->intCheckedOutBy = $this->ctlAdvanced->CheckedOutBy;
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

  // If the parent asset exists then return the Parent Asset Code
  public function ParentAsset__toString($objAsset) {
    if ($objAsset->ParentAsset instanceof Asset) {
      if ($this->blnRemoveAllLinks) {
      	return $objAsset->ParentAsset->AssetCode;
      } else {
		return $objAsset->ParentAsset->__toStringWithLink("bluelink");
      }
    }
    else {
      return;
    }
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
