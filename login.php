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
		protected $lblLogo;
		protected $lblMessage;

		protected function Form_Create() {
			$this->txtUsername_Create();
			$this->txtPassword_Create();
			$this->btnLogin_Create();
			$this->lblLogo_Create();
			$this->lblMessage_Create();

			// Hide login controls if logins are disabled for this site
			if (QApplication::$TracmorSettings->DisableLogins)
			  $this->txtUsername->Display = $this->txtPassword->Display = $this->btnLogin->Display = false;
		}

		protected function txtUsername_Create() {
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username:';
			$this->txtUsername->Required = true;
			$this->txtUsername->Focus();
		}

		protected function txtPassword_Create() {
			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Password:';
			$this->txtPassword->Required = true;
			$this->txtPassword->TextMode = QTextMode::Password;
		}

		protected function btnLogin_Create() {
			$this->btnLogin = new QButton($this);
			$this->btnLogin->Text = 'Login';
			$this->btnLogin->PrimaryButton = true;
			$this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnLogin_Click'));
		}

		protected function lblLogo_Create() {
			$this->lblLogo = new QLabel($this);
			$strImagePath = (AWS_S3) ? sprintf('https://s3.amazonaws.com/%s/images', AWS_BUCKET) : 'images';
			if (!QApplication::$TracmorSettings->CompanyLogo) {
			  $this->lblLogo->Text = '<img src="images/empty.gif">';
		    } else {
			  $this->lblLogo->Text = sprintf('<img src="%s/%s">', $strImagePath, QApplication::$TracmorSettings->CompanyLogo);
			}
			$this->lblLogo->HtmlEntities = false;
		}

		protected function lblMessage_Create() {
		  $this->lblMessage = new QLabel($this);
		  $this->lblMessage->Text = (QApplication::$TracmorSettings->DisableLogins) ? QApplication::Translate('Logins are currently disabled for this Tracmor site.') : QApplication::Translate('Please enter your username and password.');
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
			elseif (sha1($strPassword) != $objUserAccount->PasswordHash) {
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

				if (array_key_exists('strReferer', $_GET)) {
					QApplication::Redirect($_GET['strReferer']);
				} else if ($objAssetRoleModule->AccessFlag) {
				// If the user has access to the assets module, send them there, otherwise...
					QApplication::Redirect('./assets/');
				}
				// If the user has access to the inventory module, send them there.
				else if ($objInventoryRoleModule->AccessFlag) {
					Qapplication::Redirect('./inventory/');
				}
				// If the user has access to the contacts module, send them there.
				else if ($objContactsRoleModule->AccessFlag) {
					Qapplication::Redirect('./contacts/');
				}
				// If the user has access to the shipping module, send them there.
				else if ($objShippingRoleModule->AccessFlag) {
					Qapplication::Redirect('./shipping/');
				}
				// If the user has access to the receiving module, send them there.
				else if ($objReceivingRoleModule->AccessFlag) {
					Qapplication::Redirect('./receiving/');
				}
				// If the user has access to the reports module, send them there.
				else if ($objReportsRoleModule->AccessFlag) {
					Qapplication::Redirect('./reports/');
				}
			}
		}
	}

	LoginForm::Run('LoginForm', QApplication::$DocumentRoot . __SUBDIRECTORY__ . '/login.tpl.php');
?>
