<?php

class QAssetModelSearchComposite extends QControl {

  // Advanced Label/Link
  protected $lblAdvanced;
  // Boolean that toggles Advanced Search display
  protected $blnAdvanced;
  // Advanced Search Composite control
  protected $ctlAdvanced;

  protected $lstCategory;
  protected $lstManufacturer;
  protected $txtDescription;
  protected $txtAssetModelCode;
  protected $arrCustomFields;
  protected $btnSearch;
  protected $btnClear;
  protected $blnSearch;
  protected $intCategoryId;
  protected $intManufacturerId;
  protected $strDescription;
  protected $strAssetModelCode;
  protected $strDateModified;
  protected $strDateModifiedFirst;
  protected $strDateModifiedLast;
  protected $blnAttachment;

  // Use Ajax
  protected $blnUseAjax;
  // Do not create any links in DataGrid
  protected $blnRemoveAllLinks;

  public $dtgAssetModel;
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

    $this->dtgAssetModel = new QDataGrid($this);
    $this->dtgAssetModel->Name = 'asset_model_list';
    $this->dtgAssetModel->CellPadding = 5;
    $this->dtgAssetModel->CellSpacing = 0;
    $this->dtgAssetModel->CssClass = "datagrid";

    // Enable/Disable AJAX for the datagrid
    $this->dtgAssetModel->UseAjax = $this->blnUseAjax;

    $this->dtgAssetModel->ShowColumnToggle = true;
    $this->dtgAssetModel->ShowExportCsv = true;

    // Add a 'Select All' checkbox
    $this->dtgAssetModel->ShowCheckboxes = false;

    // Enable Pagination
    $objPaginator = new QPaginator($this->dtgAssetModel);
    $this->dtgAssetModel->Paginator = $objPaginator;
    $this->dtgAssetModel->ItemsPerPage = QApplication::$TracmorSettings->SearchResultsPerPage;

    // If the user wants the checkboxes column
    if ($blnShowCheckboxes) {
      // This will render all of the necessary controls and actions. chkSelected_Render expects a unique ID for each row of the database.
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('<?= $_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->AssetModelId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
    }
    $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('ID', '<?= $_ITEM->AssetModelId ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->AssetModelId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->AssetModelId, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
    $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('<img src=../images/icons/attachment.gif border=0 title=Attachments alt=Attachments>', '<?= Attachment::toStringIcon($_ITEM->GetVirtualAttribute(\'attachment_count\')); ?>', 'SortByCommand="__attachment_count ASC"', 'ReverseSortByCommand="__attachment_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    // Removing any links in the column data
    if ($this->blnRemoveAllLinks) {
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Assets', '<?= $_ITEM->__toStringAssetCount(); ?>', 'SortByCommand="asset_count ASC"', 'ReverseSortByCommand="asset_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('NAME', '<?= $_ITEM->ShortDescription ?>', 'SortByCommand="short_description ASC"', 'ReverseSortByCommand="short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    }
    else {
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Assets', '<?= $_ITEM->__toStringWithAssetCountLink($_ITEM,"bluelink"); ?>', 'SortByCommand="asset_count ASC"', 'ReverseSortByCommand="asset_count DESC"', 'CssClass="dtg_column"', 'HtmlEntities=false'));
      $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('NAME', '<?= $_ITEM->__toStringWithLink($_ITEM,"bluelink"); ?>', 'SortByCommand="short_description ASC"', 'ReverseSortByCommand="short_description DESC"', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
    }

    $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM->Category->__toString(); ?>', 'SortByCommand="asset_model__category_id__short_description ASC"', 'ReverseSortByCommand="asset_model__category_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM->Manufacturer->__toString(); ?>', 'SortByCommand="asset_model__manufacturer_id__short_description ASC"', 'ReverseSortByCommand="asset_model__manufacturer_id__short_description DESC"', 'CssClass="dtg_column"'));
    $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Model Number', '<?= htmlentities(QString::Truncate($_ITEM->AssetModelCode, 200)); ?>', 'FontBold=true', 'SortByCommand="asset_model_code ASC"', 'ReverseSortByCommand="asset_model_code DESC"', 'CssClass="dtg_column"'));

    // Add the custom field columns with Display set to false. These can be shown by using the column toggle menu.
    $objCustomFieldArray = CustomField::LoadObjCustomFieldArray(EntityQtype::AssetModel, false);
    if ($objCustomFieldArray) {
      foreach ($objCustomFieldArray as $objCustomField) {
        //Only add the custom field column if the role has authorization to view it.
        if($objCustomField->objRoleAuthView && $objCustomField->objRoleAuthView->AuthorizedFlag){
          $this->dtgAssetModel->AddColumn(new QDataGridColumnExt($objCustomField->ShortDescription, '<?= $_ITEM->GetVirtualAttribute(\''.$objCustomField->CustomFieldId.'\') ?>', 'SortByCommand="__'.$objCustomField->CustomFieldId.' ASC"', 'ReverseSortByCommand="__'.$objCustomField->CustomFieldId.' DESC"','HtmlEntities="false"', 'CssClass="dtg_column"', 'Display="false"'));
        }
      }
    }

    $this->dtgAssetModel->SortColumnIndex = 2;
    $this->dtgAssetModel->SortDirection = 0;

    $objStyle = $this->dtgAssetModel->RowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#FFFFFF';
    $objStyle->FontSize = 12;

    $objStyle = $this->dtgAssetModel->AlternateRowStyle;
    $objStyle->BackColor = '#EFEFEF';

    $objStyle = $this->dtgAssetModel->HeaderRowStyle;
    $objStyle->ForeColor = '#000000';
    $objStyle->BackColor = '#EFEFEF';
    $objStyle->CssClass = 'dtg_header';

    $this->dtgAssetModel->SetDataBinder('dtgAssetModel_Bind',$this);

    $this->lstCategory_Create();
    $this->lstManufacturer_Create();
    $this->txtDescription_Create();
    $this->txtAssetModelCode_Create();
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
    $strToReturn[0] = "dtgAssetModel";
    // Id
    $strToReturn[1] = "AssetModelId";
    // For Label generation
    $strToReturn[2] = "AssetModelCode";
    return $strToReturn;
  }

  public function GetJavaScriptAction() {
    return "onchange";
  }

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
    require('../assets/asset_model_search_composite.tpl.php');
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

  public function dtgAssetModel_Bind() {

    if ($this->blnSearch) {
      $this->assignSearchValues();
    }

    $intCategoryId = $this->intCategoryId;
    $intManufacturerId = $this->intManufacturerId;
    $strDescription = $this->strDescription;
    $strAssetModelCode = $this->strAssetModelCode;
    $arrCustomFields = $this->arrCustomFields;
    $strDateModifiedFirst = $this->strDateModifiedFirst;
    $strDateModifiedLast = $this->strDateModifiedLast;
    $strDateModified = $this->strDateModified;
    $blnAttachment = $this->blnAttachment;

    $objExpansionMap[AssetModel::ExpandCategory] = true;
    $objExpansionMap[AssetModel::ExpandManufacturer] = true;

    // If the search form has been posted
    // if ($intCategoryId || $intManufacturerId || $strDescription || $strAssetModelCode) {
    if ((!$this->objParentControl && $this->Display == true) || $this->objParentControl->Display == true) {
      $this->dtgAssetModel->TotalItemCount = AssetModel::CountBySearchHelper($intCategoryId,
                                                                             $intManufacturerId,
                                                                             $strDescription,
                                                                             $strAssetModelCode,
                                                                             $arrCustomFields,
                                                                             $strDateModified,
                                                                             $strDateModifiedFirst,
                                                                             $strDateModifiedLast,
                                                                             $blnAttachment,
                                                                             $objExpansionMap);
      if ($this->dtgAssetModel->TotalItemCount == 0) {
        $this->dtgAssetModel->ShowHeader = false;
      }
      else {
        $this->dtgAssetModel->DataSource = AssetModel::LoadArrayBySearchHelper($intCategoryId,
                                                                               $intManufacturerId,
                                                                               $strDescription,
                                                                               $strAssetModelCode,
                                                                               $arrCustomFields,
                                                                               $strDateModified,
                                                                               $strDateModifiedFirst,
                                                                               $strDateModifiedLast,
                                                                               $blnAttachment,
                                                                               $this->dtgAssetModel->SortInfo,
                                                                               $this->dtgAssetModel->LimitInfo,
                                                                               $objExpansionMap);
        $this->dtgAssetModel->ShowHeader = true;
      }
    }
    $this->blnSearch = false;
  }

  public function Validate() {
    return true;
  }

  protected function ctlAdvanced_Create() {
    $this->ctlAdvanced = new QAdvancedSearchComposite($this, EntityQtype::AssetModel);
    $this->ctlAdvanced->Display = false;
  }
  // CREATE METHODS
  protected function lstCategory_Create() {
    $this->lstCategory = new QListBox($this);
    $this->lstCategory->Name = 'Category';
    $this->lstCategory->AddItem(new QListItem('- ALL -', null));
    $objCategoryArray = Category::LoadAllWithFlags(true, false, 'short_description');
    if ($objCategoryArray) {
      foreach ($objCategoryArray as $objCategory) {
        $this->lstCategory->AddItem(new QListItem($objCategory->ShortDescription, $objCategory->CategoryId));
      }
    }
    if ($this->blnUseAjax) {
      $this->lstCategory->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnSearch_Click'));
    }
    else{
      $this->lstCategory->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnSearch_Click'));
    }
    $this->lstCategory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function lstManufacturer_Create() {
    $this->lstManufacturer = new QListBox($this);
    $this->lstManufacturer->Name = 'Manufacturer';
    $this->lstManufacturer->AddItem(new QListItem('- ALL -', null));
    // foreach (Manufacturer::LoadAll('short_description') as $objManufacturer) {
    foreach (Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription))) as $objManufacturer) {
      $this->lstManufacturer->AddItem(new QListItem($objManufacturer->ShortDescription, $objManufacturer->ManufacturerId));
    }
    if ($this->blnUseAjax) {
      $this->lstManufacturer->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'btnSearch_Click'));
    }
    else{
      $this->lstManufacturer->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnSearch_Click'));
    }
    $this->lstManufacturer->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function txtDescription_Create() {
    $this->txtDescription = new QTextBox($this);
    $this->txtDescription->Name = 'Description';
    if ($this->blnUseAjax) {
      $this->txtDescription->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'btnSearch_Click'));
    }
    else{
      $this->txtDescription->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnSearch_Click'));
    }
    $this->txtDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function txtAssetModelCode_Create() {
    $this->txtAssetModelCode = new QTextBox($this);
    $this->txtAssetModelCode->Name = 'Model Number';
    if ($this->blnUseAjax) {
     $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'btnSearch_Click'));
    }
    else{
      $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnSearch_Click'));
    }
    $this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function btnSearch_Create() {
    $this->btnSearch = new QButton($this);
    $this->btnSearch->Name = 'search';
    $this->btnSearch->Text = 'Search';
    if ($this->blnUseAjax) {
      $this->btnSearch->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSearch_Click'));
      $this->btnSearch->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'btnSearch_Click'));
    }
    else{
      $this->btnSearch->AddAction(new QClickEvent(), new QServerControlAction($this,'btnSearch_Click'));
      $this->btnSearch->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnSearch_Click'));
    }
    $this->btnSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function btnClear_Create() {
    $this->btnClear = new QButton($this);
    $this->btnClear->Name = 'clear';
    $this->btnClear->Text = 'Clear';
    if($this->blnUseAjax){
      $this->btnClear->AddAction(new QClickEvent(), new QServerControlAction($this,'btnClear_Click'));
      $this->btnClear->AddAction(new QEnterKeyEvent(), new QServerAction($this,'btnClear_Click'));
    }
    else{
      $this->btnClear->AddAction(new QClickEvent(), new QServerControlAction($this,'btnClear_Click'));
      $this->btnClear->AddAction(new QEnterKeyEvent(), new QServerControlAction($this,'btnClear_Click'));
    }
    $this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());
  }

  protected function lblAdvanced_Create() {
    $this->lblAdvanced = new QLabel($this);
    $this->lblAdvanced->Name = 'Advanced';
    $this->lblAdvanced->Text = 'Advanced Search';
    $this->lblAdvanced->AddAction(new QClickEvent(), new QToggleDisplayAction($this->ctlAdvanced));
    $this->lblAdvanced->AddAction(new QClickEvent(), new QAjaxControlAction($this,'lblAdvanced_Click'));
    $this->lblAdvanced->SetCustomStyle('text-decoration', 'underline');
    $this->lblAdvanced->SetCustomStyle('cursor', 'pointer');
  }

  public function btnSearch_Click() {
    $this->blnSearch = true;
    $this->dtgAssetModel->PageNumber = 1;
  }

  public function btnClear_Click() {
    // Clear out the input values
    $this->lstCategory->SelectedIndex = 0;
    $this->lstManufacturer->SelectedIndex = 0;
    $this->txtDescription->Text = '';
    $this->txtAssetModelCode->Text = '';
    $this->ctlAdvanced->ClearControls();

    $this->intCategoryId = null;
    $this->intManufacturerId = null;
    $this->strDescription = null;
    $this->strAssetModelCode = null;
    $this->strDateModified = null;
    $this->strDateModifiedFirst = null;
    $this->strDateModifiedLast = null;
    $this->blnAttachment = false;
    if ($this->arrCustomFields) {
      foreach ($this->arrCustomFields as $field) {
        $field['value'] = null;
      }
    }

    // Assign the class variables the null values
    $this->assignSearchValues();
    $this->dtgAssetModel->PageNumber = 1;
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
    $this->strDescription = $this->txtDescription->Text;
    $this->strAssetModelCode = $this->txtAssetModelCode->Text;
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
  /////////////////////////
  // Public Properties: GET
  /////////////////////////
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
  public function Refresh() {
    $this->btnClear_Click();
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
