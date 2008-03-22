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
	QApplication::Authenticate();

	// Include the classfile for CourierEditFormBase
	require(__FORMBASE_CLASSES__ . '/CourierEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Courier class.  It extends from the code-generated
	 * abstract CourierEditFormBase class.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * Additional qform control objects can also be defined and used here, as well.
	 * 
	 * @package My Application
	 * @subpackage FormDraftObjects
	 * 
	 */
	class CourierEditForm extends CourierEditFormBase {
		// Header Menu
		protected $ctlHeaderMenu;
		protected $lblHeaderCourier;
		
		protected function Form_Create() {	
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			parent::Form_Create();	
			$this->lblHeaderCourier_Create();
		}
		
		// Create and Setup the Header Composite Control
  		protected function ctlHeaderMenu_Create() {
	  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  		}
  		
  		// Create and Setup lblHeaderCourier
		protected function lblHeaderCourier_Create() {
			$this->lblHeaderCourier = new QLabel($this);
			$this->lblHeaderCourier->Text = ($this->objCourier->ShortDescription != '') ? $this->objCourier->ShortDescription : 'New Shipping Courier';
		}
		
		// Create and Setup txtShortDescription
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			
			// FedEx is built-in,  so don't allow it's short description to be edited
			$this->txtShortDescription->ReadOnly = ($this->objCourier->CourierId === 1) ? true : false;
		}
		
		// Setup btnDelete
		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Courier')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			
			// FedEx is built-in,  so don't allow it to be deleted
			if (!$this->blnEditMode || $this->objCourier->CourierId ===1)
				$this->btnDelete->Visible = false;
		}
		
		// Create and Setup chkActiveFlag
		protected function chkActiveFlag_Create() {
			$this->chkActiveFlag = new QCheckBox($this);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = ($this->blnEditMode) ? $this->objCourier->ActiveFlag : true;
		}
		
		protected function RedirectToListPage() {
			QApplication::Redirect('shipping_account_list.php');
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/courier_edit.tpl.php as the included HTML template file
	CourierEditForm::Run('CourierEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/courier_edit.tpl.php');
?>