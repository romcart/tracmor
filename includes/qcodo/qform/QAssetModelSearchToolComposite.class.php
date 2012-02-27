<?php
 class QAssetModelSearchToolComposite extends QControl {

  // Parent Object
  protected $objParentObject;
  public $ctlAssetModelSearch;

  // Dialog Box
  public $dlgAssetModelSearchTool;

  // Buttons
  public $btnAssetModelSearchToolAdd;
  public $btnAssetModelSearchToolCancel;

  public $lblWarning;
  
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
    $this->dlgAssetModelSearchTool_Create();
  }

  protected function dlgAssetModelSearchTool_Create() {
    $this->dlgAssetModelSearchTool = new QDialogBox($this);
    $this->dlgAssetModelSearchTool->Text = '';

    // Let's setup some basic appearance options
    $this->dlgAssetModelSearchTool->Width = '900px';
    $this->dlgAssetModelSearchTool->Height = '470px';
    $this->dlgAssetModelSearchTool->Overflow = QOverflow::Auto;
    $this->dlgAssetModelSearchTool->Padding = '10px';
    $this->dlgAssetModelSearchTool->BackColor = '#ffffff';
    // Make sure this Dialog Box is "hidden"
    $this->dlgAssetModelSearchTool->Display = false;
    $this->dlgAssetModelSearchTool->CssClass = 'modal_dialog';
    $this->dlgAssetModelSearchTool->AutoRenderChildren = true;

    $this->ctlAssetModelSearch = new QAssetModelSearchComposite($this->dlgAssetModelSearchTool, null, true, true, true);
    $this->ctlAssetModelSearch->dtgAssetModel->ItemsPerPage = 10;

    $this->btnAssetModelSearchToolAdd = new QButton($this->dlgAssetModelSearchTool);
    $this->btnAssetModelSearchToolAdd->Text = "Add Selected";
    // If the parent object is the QControl.
    // In this way, we show Qcodo where to search the action methods. In this case in the parent QControl object.
    if ($this->objParentObject instanceof QControl) {
       $this->btnAssetModelSearchToolAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this->objParentObject, 'btnAssetModelSearchToolAdd_Click'));
       $this->btnAssetModelSearchToolAdd->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this->objParentObject, 'btnAssetModelSearchToolAdd_Click'));
    }
    else {
       $this->btnAssetModelSearchToolAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAssetModelSearchToolAdd_Click'));
       $this->btnAssetModelSearchToolAdd->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAssetModelSearchToolAdd_Click'));
    }
      $this->btnAssetModelSearchToolAdd->AddAction(new QEnterKeyEvent(), new QTerminateAction());

    $this->btnAssetModelSearchToolCancel = new QButton($this->dlgAssetModelSearchTool);
    $this->btnAssetModelSearchToolCancel->Text = "Cancel";
    $this->btnAssetModelSearchToolCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAssetModelSearchToolCancel_Click'));
    $this->btnAssetModelSearchToolCancel->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnAssetModelSearchToolCancel_Click'));
    $this->btnAssetModelSearchToolCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());

    // Add break line after buttons
    $lblBreak = new QLabel($this->dlgAssetModelSearchTool);
    $lblBreak->HtmlEntities = false;
    $lblBreak->Text = "<br />";

    $this->lblWarning = new QLabel($this->dlgAssetModelSearchTool);
    $this->lblWarning->Text = "";
    $this->lblWarning->CssClass = "warning";
  }

  public function ParsePostData()
  {
    // TODO: Implement ParsePostData() method.
  }

  protected function GetControlHtml()
  {
    $strStyle = $this->GetStyleAttributes();
    if ($strStyle) {
      $strStyle = sprintf('style="%s"', $strStyle);
    }

    $strAttributes = $this->GetAttributes();

    // Store the Output Buffer locally
    $strAlreadyRendered = ob_get_contents();
    ob_clean();

    // Evaluate the template
    require('../assets/asset_model_search_tool_composite.tpl.php');
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

  public function Validate()
  {
    return true;
  }
  public function lblLookup_Click() {
    $this->Refresh();
    $this->btnAssetModelSearchToolAdd->Text = "Add";
    $this->dlgAssetModelSearchTool->ShowDialogBox();
  }

  public function btnAssetModelSearchToolCancel_Click() {
    $this->btnAssetModelSearchToolCancel->Warning = "";
    $this->dlgAssetModelSearchTool->HideDialogBox();
  }

  public function Refresh() {
    $this->ctlAssetModelSearch->Refresh();
  }
}
?>