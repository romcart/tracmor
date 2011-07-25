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

	class AdminCheckOutInForm extends QForm {
		// Header Menu
		protected $ctlHeaderMenu;

		// Inputs
		protected $txtDefaultCheckOutPeriod;
		protected $chkCheckOutToOtherUsers;
		protected $chkCheckOutToContacts;
		protected $chkDueDateRequired;
		protected $chkStrictCheckinPolicy;
		protected $chkReasonRequired;
		protected $pnlSaveNotification;
		protected $txtSearchResultsPerPage;

		// Buttons
		protected $btnSave;

		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();

			// Create Inputs
			$this->txtDefaultCheckOutPeriod_Create();
			$this->chkCheckOutToOtherUsers_Create();
			$this->chkCheckOutToContacts_Create();
			$this->chkDueDateRequired_Create();
			$this->chkReasonRequired_Create();
			$this->chkStrictCheckinPolicy_Create();

			// Create Buttons
			$this->btnSave_Create();

			// Create Panels
			$this->pnlSaveNotification_Create();
		}

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		// Create and Setup the DefaultCheckOutPeriod Text Field
		protected function txtDefaultCheckOutPeriod_Create() {
			$this->txtDefaultCheckOutPeriod = new QTextBox($this);
			$this->txtDefaultCheckOutPeriod->Name = 'Default check-out period';
			$this->txtDefaultCheckOutPeriod->Text = QApplication::$TracmorSettings->DefaultCheckOutPeriod;
			$this->txtDefaultCheckOutPeriod->Width = 32;
		}

		// Create and Setup the CheckOutToOtherUsers Checkbox
		protected function chkCheckOutToOtherUsers_Create() {
			$this->chkCheckOutToOtherUsers = new QCheckBox($this);
			$this->chkCheckOutToOtherUsers->Name = 'Check-out to other users';
			if (QApplication::$TracmorSettings->CheckOutToOtherUsers == '1') {
				$this->chkCheckOutToOtherUsers->Checked = true;
			}
			else {
				$this->chkCheckOutToOtherUsers->Checked = false;
			}
		}

		// Create and Setup the CheckOutToContacts Checkbox
		protected function chkCheckOutToContacts_Create() {
			$this->chkCheckOutToContacts = new QCheckBox($this);
			$this->chkCheckOutToContacts->Name = 'Check-out to contacts';
			if (QApplication::$TracmorSettings->CheckOutToContacts == '1') {
				$this->chkCheckOutToContacts->Checked = true;
			}
			else {
				$this->chkCheckOutToContacts->Checked = false;
			}
		}

		// Create and Setup the DueDateRequired Checkbox
		protected function chkDueDateRequired_Create() {
			$this->chkDueDateRequired = new QCheckBox($this);
			$this->chkDueDateRequired->Name = 'Due date required';
			if (QApplication::$TracmorSettings->DueDateRequired == '1') {
				$this->chkDueDateRequired->Checked = true;
			}
			else {
				$this->chkDueDateRequired->Checked = false;
			}
		}

		// Create and Setup the ReasonRequired Checkbox
		protected function chkReasonRequired_Create() {
			$this->chkReasonRequired = new QCheckBox($this);
			$this->chkReasonRequired->Name = 'Reason required';
			if (QApplication::$TracmorSettings->ReasonRequired == '1') {
				$this->chkReasonRequired->Checked = true;
			}
			else {
				$this->chkReasonRequired->Checked = false;
			}
		}

		protected function chkStrictCheckinPolicy_Create() {
			$this->chkStrictCheckinPolicy = new QCheckBox($this);
			$this->chkStrictCheckinPolicy->Name = 'Strict Check-In Policy';
			if (QApplication::$TracmorSettings->StrictCheckinPolicy == '1') {
				$this->chkStrictCheckinPolicy->Checked = true;
			} else {
				$this->chkStrictCheckinPolicy->Checked = false;
			}
		}

		// Create and Setup the Save Buttons
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		}

		// Create and Setup the Save Notification Panel
		protected function pnlSaveNotification_Create() {
			$this->pnlSaveNotification = new QPanel($this);
			$this->pnlSaveNotification->Name = 'Save Notification';
			$this->pnlSaveNotification->Text = 'Your settings have been saved';
			$this->pnlSaveNotification->CssClass="save_notification";
			$this->pnlSaveNotification->Display = false;
		}

		// Save button click action
		// Setting a TracmorSetting saves it to the database automagically because the __set() method has been altered
		protected function btnSave_Click() {
			$this->pnlSaveNotification->Display = false;
			$intDefaultCheckOutPeriod = intval(trim($this->txtDefaultCheckOutPeriod->Text));
			// Make sure a valid number is entered
			if (is_numeric(trim($this->txtDefaultCheckOutPeriod->Text)) && $intDefaultCheckOutPeriod >= 0) {
			  QApplication::$TracmorSettings->DefaultCheckOutPeriod = $intDefaultCheckOutPeriod;
			}
			else {
			  $this->txtDefaultCheckOutPeriod->Warning = "That is not a valid number";
			  $this->txtDefaultCheckOutPeriod->Blink();
			  $this->txtDefaultCheckOutPeriod->Focus();
			  return;
			}

			// We have to cast these to string because the admin_settings value column is TEXT, and checkboxes give boolean values
			QApplication::$TracmorSettings->CheckOutToOtherUsers = (string) $this->chkCheckOutToOtherUsers->Checked;
			QApplication::$TracmorSettings->CheckOutToContacts = (string) $this->chkCheckOutToContacts->Checked;
			QApplication::$TracmorSettings->DueDateRequired = (string) $this->chkDueDateRequired->Checked;
			QApplication::$TracmorSettings->ReasonRequired = (string) $this->chkReasonRequired->Checked;
			QApplication::$TracmorSettings->StrictCheckinPolicy = (string) $this->chkStrictCheckinPolicy->Checked;

			// Show saved notification
			$this->pnlSaveNotification->Display = true;
		}
	}

  	// Go ahead and run this form object to generate the page
	AdminCheckOutInForm::Run('AdminCheckOutInForm', 'asset_check_out_in.tpl.php');
?>