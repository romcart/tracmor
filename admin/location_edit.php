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
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for LocationEditFormBase
	require(__FORMBASE_CLASSES__ . '/LocationEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Location class.  It extends from the code-generated
	 * abstract LocationEditFormBase class.
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
	class LocationEditForm extends LocationEditFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		protected $lblHeaderLocation;
		
		protected function Form_Create() {
			
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			
			parent::Form_Create();
			$this->lblHeaderLocation_Create();
		}
		
		// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}
		
		protected function lblHeaderLocation_Create() {
			$this->lblHeaderLocation = new QLabel($this);
			$this->lblHeaderLocation->Text = ($this->objLocation->ShortDescription != '') ? $this->objLocation->ShortDescription : 'New Location';			
		}
		
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}		
		
		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}
		
		// Control ServerActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			
			$blnError = false;
			
			// Do not allow duplicate Location names
			if ($this->blnEditMode) {
				$objLocationDuplicate = Location::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::Location()->ShortDescription, $this->txtShortDescription->Text), QQ::NotEqual(QQN::Location()->LocationId, $this->objLocation->LocationId)));
			}
			else {
				$objLocationDuplicate = Location::QuerySingle(QQ::Equal(QQN::Location()->ShortDescription, $this->txtShortDescription->Text));
			}
			if ($objLocationDuplicate) {
				$blnError = true;
				$this->txtShortDescription->Warning = 'This Location Name is already in use. Please try another.';
			}				
			
			if (!$blnError) {
			
				try {
					$this->UpdateLocationFields();
					$this->objLocation->Save();
		
		
					$this->RedirectToListPage();
				}
				catch(QExtendedOptimisticLockingException $objExc) {
					
					$this->btnCancel->Warning = sprintf('This location has been updated by another user. You must <a href="location_edit.php?intLocationId=%s">Refresh</a> to edit this location.', $this->objLocation->LocationId);
				}
			}
		}
		
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			try {
				$this->objLocation->Delete();
				$this->RedirectToListPage();
			}
			catch (QDatabaseExceptionBase $objExc) {
				if ($objExc->ErrorNumber == 1451) {
					$this->btnCancel->Warning = 'This location cannot be deleted because it is either not empty or associated with one or more transactions.';
				}
				else {
					throw new QDatabaseExceptionBase();
				}
			}
		}		
	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/location_edit.php.inc as the included HTML template file
	LocationEditForm::Run('LocationEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/location_edit.tpl.php');
?>