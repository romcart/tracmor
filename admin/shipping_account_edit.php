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

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for ShippingAccountEditFormBase
	require(__FORMBASE_CLASSES__ . '/ShippingAccountEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the ShippingAccount class.  It extends from the code-generated
	 * abstract ShippingAccountEditFormBase class.
	 *
	 * Any display custimizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * Additional qform control objects can also be defined and used here, as well.
	 * 
	 * @package Application
	 * @subpackage FormDraftObjects
	 * 
	 */
	class ShippingAccountEditForm extends ShippingAccountEditFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		protected $lblHeaderAccount;
		
		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			parent::Form_Create();
			$this->lblHeaderAccount_Create();	
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		protected function lblHeaderAccount_Create() {
			$this->lblHeaderAccount = new QLabel($this);
			$this->lblHeaderAccount->Text = ($this->objShippingAccount->ShortDescription != '') ? $this->objShippingAccount->ShortDescription : 'New Shipping Account';
		}
		
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}		
		
		// Create and Setup txtValue
		// Overridden because we want to name it 'Account Number' 
		protected function txtValue_Create() {
			$this->txtValue = new QTextBox($this);
			$this->txtValue->Name = QApplication::Translate('Account Number');
			$this->txtValue->Text = $this->objShippingAccount->Value;
			$this->txtValue->Required = true;
			$this->txtValue->CausesValidation = true;
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
		}		
		
		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			try {
				$this->UpdateShippingAccountFields();
				$this->objShippingAccount->Save();
	
	
				$this->RedirectToListPage();
			}
			catch(QExtendedOptimisticLockingException $objExc) {
				
				$this->btnCancel->Warning = sprintf('This shipping account has been updated by another user. You must <a href="shipping_account_edit.php?intShippingAccountId=%s">Refresh</a> to edit this shipping account.', $this->objShippingAccount->ShippingAccountId);
			}
		}						
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/shipping_account_edit.php.inc as the included HTML template file
	ShippingAccountEditForm::Run('ShippingAccountEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/shipping_account_edit.tpl.php');
?>