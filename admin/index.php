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
		protected $txtFedexGatewayUri;
		protected $txtPackingListTerms;
		
		// Buttons
		protected $btnSave;
		
		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			// Create Inputs
			$this->txtMinAssetCode_Create();
			$this->txtImageUploadPrefix_Create();
			$this->txtFedexGatewayUri_Create();
			$this->txtPackingListTerms_Create();
			
			// Create Buttons
			$this->btnSave_Create();
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
		
		// Create and Setup the MinAssetCode Text Field
		protected function txtFedexGatewayUri_Create() {
			$this->txtFedexGatewayUri = new QTextBox($this);
			$this->txtFedexGatewayUri->Name = 'Fedex Gateway URI';
			$this->txtFedexGatewayUri->Text = QApplication::$TracmorSettings->FedexGatewayUri;
		}
		
		// Create and Setup the MinAssetCode Text Field
		protected function txtPackingListTerms_Create() {
			$this->txtPackingListTerms = new QTextBox($this);
			$this->txtPackingListTerms->Name = 'Packing List Terms';
			$this->txtPackingListTerms->TextMode = QTextMode::MultiLine;
			$this->txtPackingListTerms->Text = QApplication::$TracmorSettings->PackingListTerms;
		}				
		
		// Create and Setup the Save Buttons
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		}
		
		// Save button click action
		// Setting a TracmorSetting saves it to the database automagically because the __set() method has been altered
		protected function btnSave_Click() {
			QApplication::$TracmorSettings->MinAssetCode = $this->txtMinAssetCode->Text;
			QApplication::$TracmorSettings->ImageUploadPrefix = $this->txtImageUploadPrefix->Text;
			QApplication::$TracmorSettings->FedexGatewayUri = $this->txtFedexGatewayUri->Text;
			QApplication::$TracmorSettings->PackingListTerms = $this->txtPackingListTerms->Text;
		}
	}

  	// Go ahead and run this form object to generate the page
	AdminIndexForm::Run('AdminIndexForm', 'index.tpl.php');	
?>