<?php
/*
 * Copyright (c)  2009, Universal Diagnostic Solutions, Inc.
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

class QInventorySearchToolComposite extends QControl {

  // Parent Object
  protected $objParentObject;
  public $ctlInventorySearch;

  // Dialog Box
  public $dlgInventorySearchTool;

  // Buttons
  public $btnInventorySearchToolAdd;
	public $btnInventorySearchToolCancel;

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
    $this->dlgInventorySearchTool_Create();
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
		require('../inventory/inventory_search_tool_composite.tpl.php');
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

	protected function dlgInventorySearchTool_Create() {
	  $this->dlgInventorySearchTool = new QDialogBox($this);
    $this->dlgInventorySearchTool->Text = '';

    // Let's setup some basic appearance options
    $this->dlgInventorySearchTool->Width = '900px';
    $this->dlgInventorySearchTool->Height = '470px';
    $this->dlgInventorySearchTool->Overflow = QOverflow::Auto;
    $this->dlgInventorySearchTool->Padding = '10px';
    $this->dlgInventorySearchTool->BackColor = '#ffffff';
    // Make sure this Dialog Box is "hidden"
    $this->dlgInventorySearchTool->Display = false;
    $this->dlgInventorySearchTool->CssClass = 'modal_dialog';
    $this->dlgInventorySearchTool->AutoRenderChildren = true;

    //$this->dlgInventorySearchTool->Position = QPosition::Absolute;
    //$this->dlgInventorySearchTool->AddControlToMove();

    $this->ctlInventorySearch = new QInventorySearchComposite($this->dlgInventorySearchTool, null, true, true, true);
		$this->ctlInventorySearch->dtgInventoryModel->ItemsPerPage = 10;

		$this->btnInventorySearchToolAdd = new QButton($this->dlgInventorySearchTool);
		$this->btnInventorySearchToolAdd->Text = "Add Selected";
		if ($this->objParentObject instanceof QControl) {
  		$this->btnInventorySearchToolAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this->objParentObject, 'btnInventorySearchToolAdd_Click'));
  		$this->btnInventorySearchToolAdd->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this->objParentObject, 'btnInventorySearchToolAdd_Click'));
		}
		else {
		  $this->btnInventorySearchToolAdd->AddAction(new QClickEvent(), new QAjaxAction('btnInventorySearchToolAdd_Click'));
  		$this->btnInventorySearchToolAdd->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnInventorySearchToolAdd_Click'));
		}
    $this->btnInventorySearchToolAdd->AddAction(new QEnterKeyEvent(), new QTerminateAction());

		$this->btnInventorySearchToolCancel = new QButton($this->dlgInventorySearchTool);
		$this->btnInventorySearchToolCancel->Text = "Cancel";
		$this->btnInventorySearchToolCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnInventorySearchToolCancel_Click'));
		$this->btnInventorySearchToolCancel->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnInventorySearchToolCancel_Click'));
		$this->btnInventorySearchToolCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());

		// Add break line after buttons
		$lblBreak = new QLabel($this->dlgInventorySearchTool);
		$lblBreak->HtmlEntities = false;
		$lblBreak->Text = "<br />";

		$this->lblWarning = new QLabel($this->dlgInventorySearchTool);
		$this->lblWarning->Text = "";
		$this->lblWarning->CssClass = "warning";
	}

	/*
	public function btnInventorySearchToolAdd_Click() {
	  $this->objParentObject->btnInventorySearchToolAdd_Click();
	}
  */

	public function btnInventorySearchToolCancel_Click() {
	  $this->btnInventorySearchToolCancel->Warning = "";
	  $this->dlgInventorySearchTool->HideDialogBox();
	}

	public function Refresh() {
	  $this->ctlInventorySearch->Refresh();
	}
}

?>