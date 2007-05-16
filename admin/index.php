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
	
	class AdminIndexForm extends QForm {
		// Header Menu
		protected $ctlHeaderMenu;
		
		// Inputs
		protected $txtMinAssetCode;
		protected $txtImageUploadPrefix;
		protected $pnlSaveNotification;
		
		// Buttons
		protected $btnSave;
		
		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			// Create Inputs
			$this->txtMinAssetCode_Create();
			$this->txtImageUploadPrefix_Create();
			
			// Create Buttons
			$this->btnSave_Create();
			
			// Create Panels
			$this->pnlSaveNotification_Create();
		}
		
		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}
		
		// Create and Setup the MinAssetCode Text Field
		protected function txtMinAssetCode_Create() {
			$this->txtMinAssetCode = new QTextBox($this);
			$this->txtMinAssetCode->Name = 'Minimum Asset Code';
			$this->txtMinAssetCode->Text = QApplication::$TracmorSettings->MinAssetCode;
		}
		
		// Create and Setup the MinAssetCode Text Field
		protected function txtImageUploadPrefix_Create() {
			$this->txtImageUploadPrefix = new QTextBox($this);
			$this->txtImageUploadPrefix->Name = 'Image Upload Prefix';
			$this->txtImageUploadPrefix->Text = QApplication::$TracmorSettings->ImageUploadPrefix;
		}			
		
		// Create and Setup the Save Buttons
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
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
			QApplication::$TracmorSettings->MinAssetCode = $this->txtMinAssetCode->Text;
			QApplication::$TracmorSettings->ImageUploadPrefix = $this->txtImageUploadPrefix->Text;
			
			// Show saved notification
			$this->pnlSaveNotification->Display = true;
		}
	}

  	// Go ahead and run this form object to generate the page
	AdminIndexForm::Run('AdminIndexForm', 'index.tpl.php');	
?>