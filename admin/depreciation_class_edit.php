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
	require('../includes/prepend.inc.php');

	QApplication::Authenticate();

	class DepreciationClassEditForm extends QForm {

		// Header Menu
		protected $ctlHeaderMenu;
		protected $lblHeaderDepreciationClass;
		protected $objDepreciationClass;
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;
		protected $txtShortDescription;
		protected $lstDepreciationMethod;
		protected $txtLife;
		protected $blnEditMode;

		protected function SetupDepreciationClass() {
			// Lookup Object PK information from PathInfo (if applicable)
			// Set mode to Edit or New depending on what's found
			$intDepreciationClassId = QApplication::QueryString('intDepreciationClassId');
			if (($intDepreciationClassId)) {
				$this->objDepreciationClass = DepreciationClass::Load(($intDepreciationClassId));

				if (!$this->objDepreciationClass)
					throw new Exception('Could not find a DepreciationClass object with PK arguments: ' . $intDepreciationClassId);

				$this->blnEditMode = true;
			} else {
				$this->objDepreciationClass = new DepreciationClass();
				$this->blnEditMode = false;
			}
		}

		protected function Form_Create() {
			$this->ctlHeaderMenu_Create();
			$this->SetupDepreciationClass();

			$this->lblHeaderDepreciationClass_Create();
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
			$this->txtShortDescription_Create();
			$this->lstDepreciationMethod_Create();
			$this->txtLife_Create();
		}

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		protected function lblHeaderDepreciationClass_Create() {
			$this->lblHeaderDepreciationClass = new QLabel($this);
			$this->lblHeaderDepreciationClass->Text = ($this->objDepreciationClass->ShortDescription != '') ? $this->objDepreciationClass->ShortDescription : 'New Depreciation Class';
		}

		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}

		protected function btnCancel_Create() {
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
			$this->btnCancel->CausesValidation = false;
		}

		protected function btnDelete_Create() {
			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), 'Depreciation Class')));
			$this->btnDelete->AddAction(new QClickEvent(), new QServerAction('btnDelete_Click'));
			$this->btnDelete->CausesValidation = false;
			if (!$this->blnEditMode)
				$this->btnDelete->Visible = false;
		}

		protected function txtShortDescription_Create() {
			$this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Text = $this->objDepreciationClass->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtShortDescription->Focus();
		}

		protected function lstDepreciationMethod_Create() {
			$this->lstDepreciationMethod = new QListBox($this);
			$this->lstDepreciationMethod->Required = true;
			$this->lstDepreciationMethod->CausesValidation = true;
			$this->lstDepreciationMethod->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->lstDepreciationMethod->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			foreach (DepreciationMethodQtype::$NameArray as $intDepreciationMethodId => $strDepreciationMethod) {
				$this->lstDepreciationMethod->AddItem($strDepreciationMethod, $intDepreciationMethodId);
			}
		}

		protected function txtLife_Create() {
			$this->txtLife = new QTextBox($this);
			$this->txtLife->Text = $this->objDepreciationClass->Life;
			$this->txtLife->Width='45px';
			$this->txtLife->Required = true;
			$this->txtLife->CausesValidation = true;
			$this->txtLife->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtLife->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnSave_Click() {
			$blnError = false;
			
			// Do not allow duplicate depreciation class names
			if ($this->blnEditMode) {
				$objDepreciationClassDuplicate = DepreciationClass::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::DepreciationClass()->ShortDescription, $this->txtShortDescription->Text), QQ::NotEqual(QQN::DepreciationClass()->DepreciationClassId, $this->objDepreciationClass->DepreciationClassId)));
			} else {
				$objDepreciationClassDuplicate = DepreciationClass::QuerySingle(QQ::Equal(QQN::DepreciationClass()->ShortDescription, $this->txtShortDescription->Text));
			}
			
			if ($objDepreciationClassDuplicate) {
				$blnError = true;
				$this->txtShortDescription->Warning = 'This Depreciation Class Name is already in use. Please try another.';
				$this->txtShortDescription->Focus();
			}

			// Enforce positive integer for Life
			if (!preg_match("/^[1-9][0-9]*$/", $this->txtLife->Text)) {
				$this->btnCancel->Warning = 'Life must be a positive whole number';
				$blnError = true;
			}

			if (!$blnError) {
				$this->UpdateDepreciationClassFields();
				$this->objDepreciationClass->Save();
				QApplication::Redirect('depreciation.php');
			}

		}

		protected function UpdateDepreciationClassFields() {
			$this->objDepreciationClass->ShortDescription = $this->txtShortDescription->Text;
			$this->objDepreciationClass->DepreciationMethodQtypeId = $this->lstDepreciationMethod->SelectedValue;
			$this->objDepreciationClass->Life = $this->txtLife->Text;
		}

		protected function btnCancel_Click() {
			QApplication::Redirect('depreciation.php');
		}

		protected function btnDelete_Click() {
			try {
				$this->objDepreciationClass->Delete();
				QApplication::Redirect('depreciation.php');
			} catch (QDatabaseExceptionBase $objExc) {
				if ($objExc->ErrorNumber == 1451) {
					$this->btnCancel->Warning = 'This Depreciation Class cannot be deleted because it is associated with one or more models.';
				}
				else {
					throw new QDatabaseExceptionBase();
				}
			}
		}
	}

	DepreciationClassEditForm::Run('DepreciationClassEditForm');
