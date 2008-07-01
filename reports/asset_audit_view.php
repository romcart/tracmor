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
	
	class AssetAuditViewForm extends QForm {
		// Header Menu
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// The view type radio button list
		protected $rblDiscrepancy;
		
		// The Audit Datagrid
		protected $dtgAudit;
		
		// The Audit Objects Array By AssetId
		protected $objAssetArrayById;
		
		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
			$this->rblDiscrepancy_Create();
			$this->dtgAudit_Create();
		}
		
		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}
		
		// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}
  	
  	// Create and Setup the Discrepancy Radio Button List
  	protected function rblDiscrepancy_Create() {
  		$this->rblDiscrepancy = new QRadioButtonList($this);
			$this->rblDiscrepancy->AddItem(new QListItem('View Discrepancies Only', 'discrepancies', true));
			$this->rblDiscrepancy->AddItem(new QListItem('View All', 'all'));
			$this->rblDiscrepancy->AddAction(new QChangeEvent(), new QAjaxAction('rblDiscrepancy_Change'));
  	}
  	
  	// Create and Setup the Asset Audit List
  	protected function dtgAudit_Create() {
  		$this->dtgAudit = new QDataGrid($this);
			$this->dtgAudit->Name = 'asset_audit_list';
  		$this->dtgAudit->CellPadding = 5;
  		$this->dtgAudit->CellSpacing = 0;
  		$this->dtgAudit->CssClass = "datagrid";
  		
  		// Enable Pagination, and set to 1000 items per page
      $objPaginator = new QPaginator($this->dtgAudit);
      $this->dtgAudit->Paginator = $objPaginator;
      $this->dtgAudit->ItemsPerPage = 1000;
  		
  		$this->dtgAudit->UseAjax = true;
  		// Allow for column toggling
      $this->dtgAudit->ShowColumnToggle = true;
      // Allow for CSV Export
      $this->dtgAudit->ShowExportCsv = true;
      
  		
  		//QApplication::$Database[1]->EnableProfiling();
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM->Location->ShortDescription ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->LocationId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->LocationId, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('Asset Code', '<?= $_ITEM->Asset->AssetCode ?>',
  			array('OrderByClause' => QQ::OrderBy(AuditScan::AuditScanExt()->Asset->AssetCode), 'ReverseOrderByClause' => QQ::OrderBy(AuditScan::AuditScanExt()->Asset->AssetCode, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('Asset Model', '<?= $_ITEM->Asset->AssetModel->ShortDescription ?>',
  			array('OrderByClause' => QQ::OrderBy(AuditScan::AuditScanExt()->Asset->AssetModel->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(AuditScan::AuditScanExt()->Asset->AssetModel->ShortDescription, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('PDT Count', '<?= $_ITEM->Count ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->Count), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->Count, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('System Count', '<?= $_ITEM->SystemCount ?>',
  			array()));
  			
  		$this->dtgAudit->SetDataBinder('dtgAudit_Bind');
  	}
  	
  	protected function dtgAudit_Bind() {
  		$objAuditScanArray = AuditScan::QueryArray(QQ::Equal(QQN::AuditScan()->AuditId, $_GET['intAuditId']), QQ::Clause(QQ::Expand(QQN::AuditScan()->Location), $this->dtgAudit->OrderByClause));
  	  
      if ($objAuditScanArray) {
      	$i = 0;
      	foreach ($objAuditScanArray as $objAuditScan) {
      		$objAuditScan->Asset = Asset::QuerySingle(QQ::Equal(QQN::Asset()->AssetId, $objAuditScan->EntityId), QQ::Clause(QQ::Expand(QQN::Asset()->AssetModel)));
      		/*if ($objAuditScan->Location->LocationId != $objAuditScan->Asset->LocationId) {
      			$objAuditScan->SystemCount = 0;
      		}
      		else {
      			$objAuditScan->SystemCount = 1;
      			if ($this->rblDiscrepancy->SelectedValue == 'discrepancies') {
      				unset($objAuditScanArray[$i]);
      			}
      		}
      		$i++;*/
      	}
      }
  	  $this->dtgAudit->DataSource = $objAuditScanArray;
  	}
  	
  	protected function rblDiscrepancy_Change($strFormId, $strControlId, $strParameter) {
  		// This is where you will toggle between showing only the discrepancies in the datagrid or showing all of the audit scans.
  		$this->dtgAudit->MarkAsModified();
  	}
  	
	}
	
	// Go ahead and run this form object to generate the page
	AssetAuditViewForm::Run('AssetAuditViewForm', 'asset_audit_view.tpl.php');
	//QApplication::$Database[1]->OutputProfiling();	
?>