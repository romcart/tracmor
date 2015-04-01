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

	require_once('../includes/prepend.inc.php');

	class PasswordResetForm extends QForm {

		protected $objUserAccount;
		protected $blnValidResetCode;

		protected $txtNewPassword;
		protected $txtNewPassword2;
		protected $btnResetPassword;
		protected $lblInstructions;

		protected function Form_Create() {
			$strPasswordResetCode = (isset($_GET['c'])) ? $_GET['c'] : '';
			$this->objUserAccount = UserAccount::LoadByPasswordResetCode($strPasswordResetCode);
			$this->blnValidResetCode = ($this->objUserAccount) ? true : false;
			
			$this->lblInstructions_Create();
			$this->txtNewPassword_Create();
			$this->txtNewPassword2_Create();
			$this->btnResetPassword_Create();
		}

		protected function lblInstructions_Create() {
			$this->lblInstructions = new QLabel($this);
			$this->lblInstructions->HtmlEntities = false;

			if ($this->blnValidResetCode) {
				$this->lblInstructions->Text = 'Please choose a new password.';
			} else if (isset($_GET['c']) && $_GET['c'] == 'success') {
				$this->lblInstructions->Text = 'Your password has been successfully reset.<br/><br/><a href="../login.php" class="bluelink">Sign in</a>';
			} else {
				$this->lblInstructions->Text = 'This password reset request is invalid or expired.';
			}
		}

		protected function txtNewPassword_Create() {
			$this->txtNewPassword = new QTextBox($this);
			$this->txtNewPassword->TextMode = QTextMode::Password;
			$this->txtNewPassword->Display = $this->blnValidResetCode;
			$this->txtNewPassword->SetCustomStyle('padding', '4px');
			$this->txtNewPassword->Required = true;
			$this->txtNewPassword->Focus();
			$this->txtNewPassword->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnResetPassword_Click'));
			$this->txtNewPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function txtNewPassword2_Create() {
			$this->txtNewPassword2 = new QTextBox($this);
			$this->txtNewPassword2->TextMode = QTextMode::Password;
			$this->txtNewPassword2->Display = $this->blnValidResetCode;
			$this->txtNewPassword2->SetCustomStyle('padding', '4px');
			$this->txtNewPassword2->Required = true;
			$this->txtNewPassword2->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnResetPassword_Click'));
			$this->txtNewPassword2->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnResetPassword_Create() {
			$this->btnResetPassword = new QButton($this);
			$this->btnResetPassword->Text = 'Reset Password';
			$this->btnResetPassword->SetCustomStyle('padding','4px 16px');
			$this->btnResetPassword->Display = $this->blnValidResetCode;
			$this->btnResetPassword->CausesValidation = true;
			$this->btnResetPassword->AddAction(new QClickEvent(), new QAjaxAction('btnResetPassword_Click', 'default', null, $this->btnResetPassword));
		}

		protected function btnResetPassword_Click() {
			
			$blnError = false;

			if ($this->txtNewPassword->Text != $this->txtNewPassword2->Text) {
				$blnError = true;
				$this->txtNewPassword2->Warning = "The passwords do not match.";
			} else if (strlen($this->txtNewPassword->Text) < 8) {
				$blnError = true;
				$this->txtNewPassword2->Warning = "Password must be at least 8 characters.";
			}

			if (!$blnError) {
				// Reset the password
				$this->objUserAccount->PasswordHash = QApplication::HashPassword(sha1($this->txtNewPassword->Text));

				// Clear the password reset code and expiry
				$this->objUserAccount->PasswordResetCode = null;
				$this->objUserAccount->PasswordResetExpiry = null;

				// Save the User Account
				$this->objUserAccount->Save();

				QApplication::Redirect('./reset.php?c=success');

			} else {
				$this->txtNewPassword->Blink();
				$this->txtNewPassword2->Blink();
				$this->txtNewPassword->Focus();
			}
		}
	}

	PasswordResetForm::Run('PasswordResetForm');
?>