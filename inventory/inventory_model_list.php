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
	QApplication::Authenticate(3);
	require_once(__FORMBASE_CLASSES__ . '/InventoryModelListFormBase.class.php');
	require('../inventory/InventoryMassEditPanel.class.php');
	/**
	 * This is a quick-and-dirty draft form object to do the List All functionality
	 * of the InventoryModel class.  It extends from the code-generated
	 * abstract InventoryModelListFormBase class.
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
	class InventoryModelListForm extends InventoryModelListFormBase {

	/**
	 * @var  QLabel $lblWarning
	 * @var  QDialogBox $dlgMassEdit
	 * @var  QDialogBox $dlgMassDelete
	 * @var  QButton $btnMassDelete
	 * @var  QButton $btnMassEdit
	 * @var  QInventorySearchComposite $ctlSearchMenu
	 */
		// Header Tabs
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;

		// Search Menu
		protected $ctlSearchMenu;

		// Mass Actions controls

		protected $lblWarning;
		protected $dlgMassEdit;
		protected $dlgMassDelete;
		protected $btnMassEdit;
		protected $btnMassDelete;
		protected $pnlInventoryMassEditPanel;
		protected $btnMassDeleteConfirm;
		protected $btnMassDeleteCancel;
		
		protected function Form_Create() {
			
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();			
			$this->ctlSearchMenu_Create();
			$this->lblWarning_Create();
			$this->dlgMassEdit_Create();
			$this->dlgMassDelete_Create();
			$this->btnMassDelete_Create();
			$this->btnMassEdit_Create();
			$this->btnMassDeleteConfirm_Create();
			$this->btnMassDeleteCancel_Create();
			$this->AddMassButtonActions();
		}
	
		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		// Create and Setp the Shortcut Menu Composite Control
		protected function ctlShortcutMenu_Create() {
			$this->ctlShortcutMenu = new QShortcutMenu($this);
		}
		
		// Create and Setup the Invnetory Search Composite Control
		protected function ctlSearchMenu_Create() {
			//require_once(__QCODO__ . '/qform/QInventorySearchComposite.class.php');
			$this->ctlSearchMenu = new QInventorySearchComposite($this, null, QApplication::AuthorizeEntityTypeBoolean(2));
		}

		// Mass Actions controls creating/handling functions
		protected function dlgMassDelete_Create() {
			$this->dlgMassDelete = new QDialogBox($this);
			$this->dlgMassDelete->AutoRenderChildren = true;
			$this->dlgMassDelete->Width = '440px';
			$this->dlgMassDelete->Overflow = QOverflow::Auto;
			$this->dlgMassDelete->Padding = '10px';
			$this->dlgMassDelete->Display = false;
			$this->dlgMassDelete->BackColor = '#FFFFFF';
			$this->dlgMassDelete->MatteClickable = false;
			$this->dlgMassDelete->CssClass = "modal_dialog";
		}

		protected function dlgMassEdit_Create() {
			$this->dlgMassEdit = new QDialogBox($this);
			$this->dlgMassEdit->AutoRenderChildren = true;
			$this->dlgMassEdit->Width = '440px';
			$this->dlgMassEdit->Overflow = QOverflow::Auto;
			$this->dlgMassEdit->Padding = '10px';
			$this->dlgMassEdit->Display = false;
			$this->dlgMassEdit->BackColor = '#FFFFFF';
			$this->dlgMassEdit->MatteClickable = false;
			$this->dlgMassEdit->CssClass = "modal_dialog";
		}

		protected function btnMassDelete_Create() {
			$this->btnMassDelete = new QButton($this);
			$this->btnMassDelete->Name = "delete";
			$this->btnMassDelete->Text = "Mass Delete";
			$this->btnMassDelete->Display = QApplication::AuthorizeEntityTypeBoolean(3);
			// Actions added in AddMassButtonActions()
			$this->btnMassDelete->AddAction(new QClickEvent(), new QAjaxAction('btnMassDelete_Click'));
		}

		protected function btnMassEdit_Create() {
			$this->btnMassEdit = new QButton($this);
			$this->btnMassEdit->Text = "edit";
			$this->btnMassEdit->Text = "Mass Edit";
			$this->btnMassEdit->Display = QApplication::AuthorizeEntityTypeBoolean(2);
			$this->btnMassEdit->AddAction(new QClickEvent(), new  QAjaxAction('btnMassEdit_Click'));
			$this->btnMassEdit->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnMassEdit_Click'));
			$this->btnMassEdit->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnMassDeleteConfirm_Create() {
			$this->btnMassDeleteConfirm = new QButton($this->dlgMassDelete);
			$this->btnMassDeleteConfirm->Text = 'Confirm';
			// Actions added in AddMassButtonActions()
		}

		protected function btnMassDeleteCancel_Create() {
			$this->btnMassDeleteCancel = new QButton($this->dlgMassDelete);
			$this->btnMassDeleteCancel->Text = 'Cancel';
			$this->btnMassDeleteCancel->SetCustomStyle('margin-left', '4px');
			$this->btnMassDeleteCancel->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgMassDelete));
		}

		protected function lblWarning_Create() {
			$this->lblWarning = new QLabel($this);
			$this->lblWarning->Text = "";
			$this->lblWarning->CssClass = "warning";
		}

		protected function AddMassButtonActions() {
			$this->btnMassDelete->AddAction(new QClickEvent(), new QAjaxAction('btnMassDelete_Click', null, null, array($this->btnMassEdit, $this->btnMassDelete)));
			$this->btnMassEdit->AddAction(new QClickEvent(), new  QAjaxAction('btnMassEdit_Click', null, null, array($this->btnMassEdit, $this->btnMassDelete)));
			$this->btnMassDeleteConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnMassDeleteConfirm_Click', null, null, array($this->btnMassDeleteCancel, $this->btnMassDeleteConfirm)));
		}

		protected function btnMassDelete_Click() {
			$items = $this->ctlSearchMenu->dtgInventoryModel->getSelected('InventoryModelId');
			if (count($items)>0) {
				$this->dlgMassDelete->Text = sprintf('<div class="title"> Inventory Mass Delete - %s records</div><hr/>', count($items));
				$this->dlgMassDelete->Text .= 'Are you sure you want to DELETE these inventory models?<br/><br/>';
				$this->dlgMassDelete->ShowDialogBox();
			} else {
				$this->lblWarning->Text = "You must select one or more inventory models to Delete";
			}
		}

		protected function btnMassDeleteConfirm_Click() {

			$items = $this->ctlSearchMenu->dtgInventoryModel->getSelected('InventoryModelId');

			foreach ($items as $item) {
				// First check that the user is authorized to delete this inventory
				$objInventoryModel = InventoryModel::Load($item);
				if (!QApplication::AuthorizeEntityBoolean($objInventoryModel, 3)) {
					$blnError = true;
					$this->lblWarning->Text = 'You are not authorized to delete one or more of the selected inventory models.';
					$this->dlgMassDelete->HideDialogBox();
					return;
				}
			}

			if (count($items)>0) {
				$this->lblWarning->Text = "";
				// TODO perform validate
				foreach ($items as $item) {
					try {
						// Get an instance of the database
						$objDatabase = QApplication::$Database[1];
						// Begin a MySQL Transaction to be either committed or rolled back
						$objDatabase->TransactionBegin();
						InventoryModel::Load($item)->Delete();
						$objDatabase->TransactionCommit();
						$this->UncheckAllItems($this);
						// Hide the dialog
						$this->dlgMassDelete->HideDialogBox();
					} catch (QDatabaseExceptionBase $objExc) {
						// Roll back the transaction from the database
						$objDatabase->TransactionRollback();
						if ($objExc->ErrorNumber == 1451) {
							$this->lblWarning->Text .= 'Inventory model '
													   . $item
													   .'cannot be deleted because it is associated with one or more transactions.';
						} else {
							throw new QDatabaseExceptionBase();
						}
					}
				}
			} else {
				$this->lblWarning->Text = "You haven't chosen any Inventory to Delete" ;
			}
		}

		protected function btnMassEdit_Click() {
			$items = $this->ctlSearchMenu->dtgInventoryModel->getSelected('InventoryModelId');
			if (count($items)>0) {
				$this->lblWarning->Text = "";
				$this->dlgMassEdit->RemoveChildControls(true);
				$this->pnlInventoryMassEditPanel = new InventoryMassEditPanel($this->dlgMassEdit, 'pnlInventoryMassEditPanelCancel_Click', $items);
				$this->dlgMassEdit->ShowDialogBox();
			} else {
				$this->lblWarning->Text = "You must select one or more Inventory to Edit" ;
			}
		}

		public function pnlInventoryMassEditPanelCancel_Click() {
			// TODO uncheck selected in DataGrid
			$this->dlgMassEdit->HideDialogBox();
		}

		public function UncheckAllItems($object) {
			foreach ($object->GetAllControls() as $objControl) {
				if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
					$objControl->Checked = false;
				}
			}
		}
	}


	// Go ahead and run this form object to generate the page and event handlers, using
	// generated/inventory_model_edit.php.inc as the included HTML template file
	InventoryModelListForm::Run('InventoryModelListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/inventory/inventory_model_list.tpl.php');
?>