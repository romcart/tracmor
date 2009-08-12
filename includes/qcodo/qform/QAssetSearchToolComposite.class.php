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

class QAssetSearchToolComposite extends QControl {

  // Parent Object
  protected $objParentObject;
  public $ctlAssetSearch;

  // Search Archived assets
  public $blnSearchArchived;

  // Dialog Box
  public $dlgAssetSearchTool;

  // Buttons
  public $btnAssetSearchToolAdd;
	public $btnAssetSearchToolCancel;

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

    $this->blnSearchArchived = false;
    $this->objParentObject = $objParentObject;
    $this->dlgAssetSearchTool_Create();
	}

	public function ParsePostData() {

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
		require('../assets/asset_search_tool_composite.tpl.php');
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

	protected function dlgAssetSearchTool_Create() {
	  $this->dlgAssetSearchTool = new QDialogBox($this);
    $this->dlgAssetSearchTool->Text = '';

    // Let's setup some basic appearance options
    $this->dlgAssetSearchTool->Width = '900px';
    $this->dlgAssetSearchTool->Height = '470px';
    $this->dlgAssetSearchTool->Overflow = QOverflow::Auto;
    $this->dlgAssetSearchTool->Padding = '10px';
    $this->dlgAssetSearchTool->BackColor = '#ffffff';
    // Make sure this Dialog Box is "hidden"
    $this->dlgAssetSearchTool->Display = false;
    $this->dlgAssetSearchTool->CssClass = 'modal_dialog';
    $this->dlgAssetSearchTool->AutoRenderChildren = true;

    //$this->dlgAssetSearchTool->Position = QPosition::Absolute;
    //$this->dlgAssetSearchTool->AddControlToMove();

    $this->ctlAssetSearch = new QAssetSearchComposite($this->dlgAssetSearchTool, null, true, true, true);
		$this->ctlAssetSearch->dtgAsset->ItemsPerPage = 10;

		$this->btnAssetSearchToolAdd = new QButton($this->dlgAssetSearchTool);
		$this->btnAssetSearchToolAdd->Text = "Add Selected";
		// If the parent object is the QControl.
		// For example, we are loading the QAssetSearchToolComposite from QAssetTransactComposite.
		// In this way, we show Qcodo where to search the action methods. In this case in the parent QControl object.
		if ($this->objParentObject instanceof QControl) {
  		$this->btnAssetSearchToolAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this->objParentObject, 'btnAssetSearchToolAdd_Click'));
  		$this->btnAssetSearchToolAdd->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this->objParentObject, 'btnAssetSearchToolAdd_Click'));
		}
		// Else Qcodo will search the action methods in the form.
		else {
		  $this->btnAssetSearchToolAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAssetSearchToolAdd_Click'));
  		$this->btnAssetSearchToolAdd->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAssetSearchToolAdd_Click'));
		}
    $this->btnAssetSearchToolAdd->AddAction(new QEnterKeyEvent(), new QTerminateAction());

		$this->btnAssetSearchToolCancel = new QButton($this->dlgAssetSearchTool);
		$this->btnAssetSearchToolCancel->Text = "Cancel";
		$this->btnAssetSearchToolCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAssetSearchToolCancel_Click'));
		$this->btnAssetSearchToolCancel->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnAssetSearchToolCancel_Click'));
		$this->btnAssetSearchToolCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());

		// Add break line after buttons
		$lblBreak = new QLabel($this->dlgAssetSearchTool);
		$lblBreak->HtmlEntities = false;
		$lblBreak->Text = "<br />";

		$this->lblWarning = new QLabel($this->dlgAssetSearchTool);
		$this->lblWarning->Text = "";
		$this->lblWarning->CssClass = "warning";
	}

	public function lblAddAsset_Click() {
    $this->Refresh();
    if ($this->blnSearchArchived) {
      // Change location to "Archived"
      $this->ctlAssetSearch->ChangeLocationBySelectedIndex(3);
    }
    $this->btnAssetSearchToolAdd->Text = "Add Asset";
    $this->dlgAssetSearchTool->ShowDialogBox();
	}

	public function btnAssetSearchToolCancel_Click() {
	  $this->btnAssetSearchToolCancel->Warning = "";
	  $this->dlgAssetSearchTool->HideDialogBox();
	}

	public function Refresh() {
	  $this->ctlAssetSearch->Refresh();
	}
}

?>
