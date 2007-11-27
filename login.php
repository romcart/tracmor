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

	require_once('./includes/prepend.inc.php');
	
	class LoginForm extends QForm {
		
		protected $txtUsername;
		protected $txtPassword;
		protected $btnLogin;
		protected $lblLogo;
		
		protected function Form_Create() {
			$this->txtUsername_Create();
			$this->txtPassword_Create();
			$this->btnLogin_Create();
			$this->lblLogo_Create();
		}
		
		protected function txtUsername_Create() {
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username:';
			$this->txtUsername->Required = true;
			QApplication::ExecuteJavaScript(sprintf("document.getElementById('%s').focus()", $this->txtUsername->ControlId));
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
			$this->lblLogo->Text = sprintf('<img src="images/%s">', QApplication::$TracmorSettings->CompanyLogo);
			$this->lblLogo->HtmlEntities = false;
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
				$this->txtUsername->Warning = $errorMessage;
			}
			// Check that the user account is Active
			elseif (!$objUserAccount->ActiveFlag) {
				$blnError = true;
				$this->txtUsername->Warning = $errorMessage;
			}
			// Check to see if the password hashes match
			elseif (sha1($strPassword) != $objUserAccount->PasswordHash) {
				$blnError = true;
				$this->txtPassword->Warning = $errorMessage;
			}
			else {
				QApplication::Login($objUserAccount);
				
				// If the user has access to the assets module, send them there. Otherwise, send them to the home module.
				$objRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, 2);
				if ($objRoleModule->AccessFlag) {
					QApplication::Redirect('./assets/');
				}
				else {
					Qapplication::Redirect('./home/');
				}
			}
		}
	}
	
	LoginForm::Run('LoginForm', QApplication::$DocumentRoot . __SUBDIRECTORY__ . '/login.tpl.php');
?>
	