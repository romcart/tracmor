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

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	QApplication::Authenticate();

	class AdminLabelsForm extends QForm {
		// Header Menu
		protected $ctlHeaderMenu;

		protected $pnlStepOne;
		protected $pnlStepTwo;
		protected $pnlStepThree;
		protected $lstFieldSeparator;
		protected $txtFieldSeparator;
    protected $lstTextDelimiter;
		protected $txtTextDelimiter;
		protected $flcFileCsv;
		protected $chkHeaderRow;
		protected $btnNext;
		protected $btnCancel;
		protected $intStep;
		protected $lblStepTwo;

		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->pnlStepOne_Create();
			$this->pnlStepTwo_Create();
			$this->pnlStepThree_Create();
			$this->Buttons_Create();
			$this->intStep = 1;
		}

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		protected function pnlStepOne_Create() {
			$this->pnlStepOne = new QPanel($this);
      $this->pnlStepOne->Template = "asset_import_pnl_step1.tpl.php";

			// Step 1
			$this->lstFieldSeparator = new QListBox($this->pnlStepOne);
			$this->lstFieldSeparator->Name = "Field Separator: ";
			$this->lstFieldSeparator->Width = 100;
			$this->lstFieldSeparator->AddItem(new QListItem('comma', 1));
			$this->lstFieldSeparator->AddItem(new QListItem('tab', 2));
			$this->lstFieldSeparator->AddItem(new QListItem('other', 'other'));
			$this->lstFieldSeparator->AddAction(new QChangeEvent(), new QAjaxAction('lstFieldSeparator_Change'));
			$this->txtFieldSeparator = new QTextBox($this->pnlStepOne);
			$this->txtFieldSeparator->Name = "Enter the Field Separator: ";
			$this->txtFieldSeparator->Width = 20;
			$this->txtFieldSeparator->Display = false;
			$this->lstTextDelimiter = new QListBox($this->pnlStepOne);
			$this->lstTextDelimiter->Name = "Text Delimiter: ";
			$this->lstTextDelimiter->Width = 100;
			$this->lstTextDelimiter->AddItem(new QListItem('none', null));
			$this->lstTextDelimiter->AddItem(new QListItem('quote', 1));
			$this->lstTextDelimiter->AddItem(new QListItem('double-quote', 2));
			$this->lstTextDelimiter->AddItem(new QListItem('other', 'other'));
			$this->lstTextDelimiter->AddAction(new QChangeEvent(), new QAjaxAction('lstTextDelimiter_Change'));
			$this->txtTextDelimiter = new QTextBox($this->pnlStepOne);
			$this->txtTextDelimiter->Name = "Enter the Text Delimiter: ";
			$this->txtTextDelimiter->Width = 20;
			$this->txtTextDelimiter->Display = false;
			$this->flcFileCsv = new QFileControlExt($this->pnlStepOne);
			$this->flcFileCsv->Name = "File To Upload: ";
			$this->chkHeaderRow = new QCheckBox($this->pnlStepOne);
			$this->chkHeaderRow->Name = "Header Row: ";
    }

    protected function pnlStepTwo_Create() {
			$this->pnlStepTwo = new QPanel($this);
			$this->pnlStepTwo->AutoRenderChildren = true;
			$this->pnlStepTwo->Display = false;

      // Step 2
      $this->lblStepTwo = new QLabel($this->pnlStepTwo);
      $this->lblStepTwo->Text = "Step 2 – Map & Import";
      $this->lblStepTwo->CssClass = "title";
    }

    protected function pnlStepThree_Create() {
			$this->pnlStepThree = new QPanel($this);
      $this->pnlStepThree->Display = false;
      $this->pnlStepThree->AutoRenderChildren = true;

      // Step 3

    }

    protected function Buttons_Create() {
      // Buttons
			$this->btnNext = new QButton($this);
			$this->btnNext->Text = "Next";
			$this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
			$this->btnNext->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnNext_Click'));
			$this->btnNext->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    }

		protected function lstFieldSeparator_Change() {
		  switch ($this->lstFieldSeparator->SelectedValue) {
		    case 'other':
		      $this->txtFieldSeparator->Display = true;
		      break;
		    default:
		      $this->txtFieldSeparator->Display = false;
		  }
		}

		protected function lstTextDelimiter_Change() {
      switch ($this->lstTextDelimiter->SelectedValue) {
		    case 'other':
		      $this->txtTextDelimiter->Display = true;
		      break;
		    default:
		      $this->txtTextDelimiter->Display = false;
		  }
		}

		// Next button click action
		protected function btnNext_Click() {
		  $this->intStep++;
		  switch ($this->intStep) {
		    case 4:
		      $this->DisplayStepForm(1);
		      $this->intStep = 1;
		      //echo "1";
		     break;
		    default:
		      $this->DisplayStepForm($this->intStep);
		      //echo "def";
		      break;
		  }
	  }

    protected function DisplayStepForm($intStep) {
      switch ($intStep) {
       case 1:
         $this->pnlStepOne->Display = true;
		     $this->pnlStepOne->Visible = true;
		     $this->pnlStepTwo->Display = false;
		     $this->pnlStepTwo->Visible = false;
		     $this->pnlStepThree->Display = false;
		     $this->pnlStepThree->Visible = false;
		     break;
		   case 2:
		     $this->pnlStepOne->Display = false;
		     $this->pnlStepOne->Visible = false;
		     $this->pnlStepTwo->Display = true;
		     $this->pnlStepTwo->Visible = true;
		     $this->pnlStepThree->Display = false;
		     $this->pnlStepThree->Visible = false;
		     break;
		   case 3:
		     $this->pnlStepOne->Display = false;
		     $this->pnlStepOne->Visible = false;
		     $this->pnlStepTwo->Display = false;
		     $this->pnlStepTwo->Visible = false;
		     $this->pnlStepThree->Display = true;
		     $this->pnlStepThree->Visible = true;
		     break;
      }
    }

		// Cancel button click action
		protected function btnCancel_Click() {

    }

	}
	// Go ahead and run this form object to generate the page
	AdminLabelsForm::Run('AdminLabelsForm', 'asset_import.tpl.php');
?>