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

	require_once('./includes/prepend.inc.php');

	class LoginForm extends QForm {

		protected $txtUsername;
		protected $txtPassword;
		protected $btnLogin;
		protected $lblForgotPassword;
		protected $txtEmail;
		protected $btnRecoverPassword;

		protected function Form_Create() {
			$this->txtUsername_Create();
			$this->txtPassword_Create();
			$this->btnLogin_Create();
			$this->txtEmail_Create();
			$this->lblForgotPassword_Create();
			$this->btnRecoverPassword_Create();
		}

		protected function txtUsername_Create() {
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username:';
			$this->txtUsername->SetCustomStyle('padding', '4px');
			$this->txtUsername->SetCustomAttribute('placeholder', 'Username');
			$this->txtUsername->Required = true;
			$this->txtUsername->Focus();
		}

		protected function txtPassword_Create() {
			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Password:';
			$this->txtPassword->SetCustomStyle('padding', '4px');
			$this->txtPassword->SetCustomAttribute('placeholder', 'Password');
			$this->txtPassword->Required = true;
			$this->txtPassword->TextMode = QTextMode::Password;
		}

		protected function btnLogin_Create() {
			$this->btnLogin = new QButton($this);
			$this->btnLogin->Text = 'Sign In';
			$this->btnLogin->PrimaryButton = true;
			$this->btnLogin->SetCustomStyle('padding','4px 16px');
			$this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnLogin_Click'));
		}

		protected function lblForgotPassword_Create() {
			$this->lblForgotPassword = new QLabel($this);
			$this->lblForgotPassword->Text = 'Forgot your password?';
			$this->lblForgotPassword->Cursor = QCursor::Pointer;
			$this->lblForgotPassword->ForeColor = '#102c3d';
			$this->lblForgotPassword->FontUnderline = true;
			$this->lblForgotPassword->HtmlEntities = false;
			$this->lblForgotPassword->SetCustomStyle('line-height', '150%');
			$this->lblForgotPassword->AddAction(new QClickEvent(), new QAjaxAction('lblForgotPassword_Click'));
		}

		protected function lblForgotPassword_Click() {
			$this->txtUsername->Enabled = false;
			$this->txtPassword->Enabled = false;
			$this->btnLogin->Enabled = false;
			$this->lblForgotPassword->Display = false;
			$this->txtEmail->Visible = true;
			$this->btnRecoverPassword->Display = true;
			QApplication::ExecuteJavaScript(sprintf("if (!('placeholder' in document.createElement('input'))) qc.getC('%s').value = 'E-Mail Address'",$this->txtEmail->ControlId));
			$this->txtEmail->Focus();
			$this->txtEmail->Blink();
			$this->txtEmail->Select();
		}

		protected function txtEmail_Create() {
			$this->txtEmail = new QTextBox($this, 'txtEmail');
			$this->txtEmail->SetCustomAttribute('placeholder', 'E-Mail Address');
			$this->txtEmail->SetCustomStyle('padding', '4px');
			$this->txtEmail->Width = '175px';
			$this->txtEmail->Visible = false;
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRecoverPassword_Click'));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnRecoverPassword_Create() {
			$this->btnRecoverPassword = new QButton($this);
			$this->btnRecoverPassword->Text = 'Send link';
			$this->btnRecoverPassword->SetCustomStyle('padding','4px 16px');
			$this->btnRecoverPassword->Display = false;
			$this->btnRecoverPassword->AddAction(new QClickEvent(), new QAjaxAction('btnRecoverPassword_Click', 'default', null, $this->btnRecoverPassword));
		}

		protected function btnRecoverPassword_Click() {
			$blnError = false;
			$objUserAccount = null;

			if (!filter_var($this->txtEmail->Text, FILTER_VALIDATE_EMAIL)) {
				$blnError = true;
			} else {
				$objUserAccount = UserAccount::QuerySingle(
					QQ::AndCondition(
						QQ::Equal(QQN::UserAccount()->EmailAddress, $this->txtEmail->Text),
						QQ::Equal(QQN::UserAccount()->ActiveFlag, '1')
					)
				);

				if (!$objUserAccount) {
					$blnError = true;					
				}
			}

			if (!$blnError) {
				
				// Hide password reset controls and show instructions
				$this->txtEmail->Visible = false;
				$this->btnRecoverPassword->Display = false;
				$this->lblForgotPassword->Text = sprintf('A link to reset your password has been sent to:<br/><strong>%s</strong>', $this->txtEmail->Text);
				$this->lblForgotPassword->FontUnderline = false;
				$this->lblForgotPassword->Cursor = null;
				$this->lblForgotPassword->RemoveAllActions('onclick');
				$this->lblForgotPassword->Display = true;
				$this->lblForgotPassword->Blink();

				// Re-enable login controls
				$this->txtUsername->Enabled = $this->txtPassword->Enabled = $this->btnLogin->Enabled = true;
				$this->txtUsername->Focus();

				$objUserAccount->SendPasswordResetEmail();

			} else {
				$this->txtEmail->Warning = 'Unrecognized email address';
				$this->txtEmail->Blink();
				$this->txtEmail->Focus();
				$this->txtEmail->Select();
			}
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {

			$blnError = false;

			$strUsername = $this->txtUsername->Text;
			$strPassword = $this->txtPassword->Text;

			$objUserAccount = UserAccount::LoadByUsername($strUsername);
			$errorMessage = 'Invalid username or password.';

			// Check if that username exists
			if (!$objUserAccount) {
				$blnError = true;
				$this->txtPassword->Warning = $errorMessage;
			}
			// Check that the user account is Active
			elseif (!$objUserAccount->ActiveFlag) {
				$blnError = true;
				$this->txtPassword->Warning = $errorMessage;
			}
			// Check to see if the password hashes match
			elseif (!QApplication::CheckPassword(sha1($strPassword), $objUserAccount->PasswordHash)) {
				$blnError = true;
				$this->txtPassword->Warning = $errorMessage;
			}
			else {
				QApplication::Login($objUserAccount);

				$objAssetRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 2);
				$objInventoryRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 3);
				$objContactsRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 4);
				$objShippingRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 5);
				$objReceivingRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 6);
				$objReportsRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 7);

				$strRedirect = '';
				$intModule = null;

				if (array_key_exists('strReferer', $_GET)) {
					$strRedirect = $_GET['strReferer'];
				} else if ($objAssetRoleModule->AccessFlag) {
				// If the user has access to the assets module, send them there, otherwise...
					$strRedirect = __SUBDIRECTORY__ . '/assets/';
					$intModule = 2;
				}
				// If the user has access to the inventory module, send them there.
				else if ($objInventoryRoleModule->AccessFlag) {
					$strRedirect = __SUBDIRECTORY__ . '/inventory/';
					$intModule = 3;
				}
				// If the user has access to the contacts module, send them there.
				else if ($objContactsRoleModule->AccessFlag) {
					$strRedirect = __SUBDIRECTORY__ . '/contacts/';
					$intModule = 4;
				}
				// If the user has access to the shipping module, send them there.
				else if ($objShippingRoleModule->AccessFlag) {
					$strRedirect = __SUBDIRECTORY__ . '/shipping/';
					$intModule = 5;
				}
				// If the user has access to the receiving module, send them there.
				else if ($objReceivingRoleModule->AccessFlag) {
					$strRedirect = __SUBDIRECTORY__ . '/receiving/';
					$intModule = 6;
				}
				// If the user has access to the reports module, send them there.
				else if ($objReportsRoleModule->AccessFlag) {
					$strRedirect = __SUBDIRECTORY__ . '/reports/';
					$intModule = 7;
				}

				QApplication::Redirect($strRedirect);
			}
		}
	}

	LoginForm::Run('LoginForm', QApplication::$DocumentRoot . __SUBDIRECTORY__ . '/login.tpl.php');
?>
