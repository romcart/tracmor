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
 	
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	QApplication::Authenticate(7);
	// SERGEI - this will generate an error until you add the tables to the data model and re-codegenerate (then codegen will create this file).
	require_once(__FORMBASE_CLASSES__ . '/AuditListFormBase.class.php');
	
	class AssetAuditListForm extends AuditListFormBase {
		// Header Menu
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		protected $dtgAssetAudit;
		
		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
			$this->dtgAssetAudit_Create();
		}
		
		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}
		
		// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}
  	
  	// Create and Setup the Asset Audir List
  	protected function dtgAssetAuditList_Create() {
  		$this->dtgAssetAudit = new QDataGrid($this);
			$this->dtgAssetAudit->Name = 'asset_audit_list';
  		$this->dtgAssetAudit->CellPadding = 5;
  		$this->dtgAssetAudit->CellSpacing = 0;
  		$this->dtgAssetAudit->CssClass = "datagrid";
  		$this->dtgAssetAudit->UseAjax = true;
  		$this->dtgAssetAudit->SetDataBinder('dtgAssetAudit_Bind');
  		
  		// You should create here a datagrid with two columns: Date and Created By. Date should be linked to the asset_audit_view.php?intAuditId=x
  		/*
  		$this->dtgAsset->AddColumn(new QDataGridColumnExt('Date', '<?= $_ITEM->ToStringDateWithLink("bluelink") ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::Audit()->AuditId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Audit()->Id, false))));
  		$this->dtgAsset->AddColumn(new QDataGridColumnExt('Created By' ...));
  		*/
  	}
  	
  	protected function dtgAssetAudit_Bind() {
  		// This is where you will use a QQuery to select all audits where entity_qtype_id = 1 (Assets)
  		//$this->dtgAssetAudit->DataSource = AssetAudit::
  	}
  	
	}
	
	// Go ahead and run this form object to generate the page
	ReportIndexForm::Run('ReportIndexForm', 'index.tpl.php');	
?>