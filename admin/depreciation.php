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

	class DepreciationForm extends QForm {

		// Header Menu
		protected $ctlHeaderMenu;
		protected $pnlSaveNotification;
		protected $chkAssetDepreciation;
		protected $btnNew;
		protected $dtgDepreciationClass;

		protected function Form_Create() {

			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->pnlSaveNotification_Create();
			$this->chkAssetDepreciation_Create();
			$this->btnNew_Create();
			$this->dtgDepreciationClass_Create();
		}

  		// Create and Setup the Header Composite Control
  		protected function ctlHeaderMenu_Create() {
	  		$this->ctlHeaderMenu = new QHeaderMenu($this);
	  	}

	  	// Create and Setup the Save Notification Panel
		protected function pnlSaveNotification_Create() {
			$this->pnlSaveNotification = new QPanel($this);
			$this->pnlSaveNotification->Text = '';
			$this->pnlSaveNotification->CssClass="save_notification";
			$this->pnlSaveNotification->Display = false;
		}

	  	// Asset Depreciation option
		protected function chkAssetDepreciation_Create(){
			$this->chkAssetDepreciation = new QCheckBox($this, 'chkAssetDepreciation');
			$this->chkAssetDepreciation->Name = "Enable Asset Depreciation";
			$this->chkAssetDepreciation->Checked = (QApplication::$TracmorSettings->DepreciationFlag);
			$this->chkAssetDepreciation->AddAction(new QClickEvent(0, "!qcodo.getControl('chkAssetDepreciation').checked"), new QConfirmAction('Are you SURE you want to disable Asset Depreciation? Any existing Purchase Date and Purchase Cost data will be lost!'));
			$this->chkAssetDepreciation->AddAction(new QClickEvent(), new QAjaxAction('chkAssetDepreciation_Check'));
		}

		protected function chkAssetDepreciation_Check() {
			QApplication::$TracmorSettings->DepreciationFlag = (string) $this->chkAssetDepreciation->Checked;
			$this->pnlSaveNotification->Text = ($this->chkAssetDepreciation->Checked) ? 'Asset Depreciation is now enabled.' : 'Asset Depreciation is now disabled.';

			// Wipe out all depreciation data from assets and models
			if(QApplication::$TracmorSettings->DepreciationFlag=='1'){
				$objDatabase = QApplication::$Database[1];
				$strQuery = 'UPDATE `asset` SET `depreciation_flag`=null,
				                                `purchase_date` = null,
				                                `purchase_cost` = null WHERE asset_id>0';
				$objDatabase->NonQuery($strQuery);
				$strQuery = 'UPDATE `asset_model` SET `depreciation_class_id`=null WHERE `asset_model_id`>0';
				$objDatabase->NonQuery($strQuery);
			}

			$this->pnlSaveNotification->Display = true;
		}

		// Create/Setup the new button
		protected function btnNew_Create() {
			$this->btnNew = new QButton($this);
			$this->btnNew->Text = 'New Depreciation Class';
			$this->btnNew->AddAction(new QClickEvent(), new QServerAction('btnNew_Click'));
		}

		protected function btnNew_Click() {
			QApplication::Redirect('depreciation_class_edit.php');
		}

		protected function dtgDepreciationClass_Create() {
			$this->dtgDepreciationClass = new QDatagrid($this);
			$this->dtgDepreciationClass->CssClass = "datagrid";
			$this->dtgDepreciationClass->CellPadding = 5;
			$this->dtgDepreciationClass->CellSpacing = 0;
			$this->dtgDepreciationClass->UseAjax = true;

			// Enable Pagination, and set to 20 items per page
			$objPaginator = new QPaginator($this->dtgDepreciationClass);
			$this->dtgDepreciationClass->Paginator = $objPaginator;
			$this->dtgDepreciationClass->ItemsPerPage = 20;

			$this->dtgDepreciationClass->AddColumn(new QDatagridColumn('Depreciation Class', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::DepreciationClass()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::DepreciationClass()->ShortDescription, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
			$this->dtgDepreciationClass->AddColumn(new QDatagridColumn('Method', '<?= DepreciationMethodQtype::ToString($_ITEM->DepreciationMethodQtypeId) ?>', array('OrderByClause' => QQ::OrderBy(QQN::DepreciationClass()->DepreciationMethodQtypeId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::DepreciationClass()->DepreciationMethodQtypeId, false), 'CssClass' => "dtg_column")));
			$this->dtgDepreciationClass->AddColumn(new QDatagridColumn('Life', '<?= $_ITEM->Life ?> months', array('OrderByClause' => QQ::OrderBy(QQN::DepreciationClass()->Life), 'ReverseOrderByClause' => QQ::OrderBy(QQN::DepreciationClass()->Life, false), 'CssClass' => "dtg_column")));
			$objStyle = $this->dtgDepreciationClass->RowStyle;
			$objStyle->ForeColor = '#000000';
			$objStyle->BackColor = '#FFFFFF';
			$objStyle->FontSize = 12;
			$objStyle = $this->dtgDepreciationClass->AlternateRowStyle;
			$objStyle->BackColor = '#EFEFEF';
			$objStyle = $this->dtgDepreciationClass->HeaderRowStyle;
			$objStyle->ForeColor = '#000000';
			$objStyle->BackColor = '#EFEFEF';
			$objStyle->CssClass = 'dtg_header';

			$this->dtgDepreciationClass->SetDataBinder('dtgDepreciationClass_Bind');
		}

		protected function dtgDepreciationClass_Bind() {
			$this->dtgDepreciationClass->TotalItemCount = DepreciationClass::CountAll();
			if ($this->dtgDepreciationClass->TotalItemCount == 0) {
				$this->dtgDepreciationClass->ShowHeader = false;
			} else {
				$this->dtgDepreciationClass->DataSource = DepreciationClass::LoadAll();
				$this->dtgDepreciationClass->ShowHeader = true;
			}
		}

	}

	DepreciationForm::Run('DepreciationForm', 'depreciation.tpl.php');
?>