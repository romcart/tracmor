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
			$this->rblDiscrepancy->AddItem(new QListItem('View Discrepancies Only', 'discrepanies', true));
			$this->rblDiscrepancy->AddItem(new QListItem('View All', 'all'));
			$this->rblDiscrepancy->AddAction(new QChangeEvent(), new QAjaxAction('rblDiscrepancy_Change'));
			// Add the values for 'View Discrepancies Only' and 'View All'
  		// Add a Ajax Click Action
  	}
  	
  	// Create and Setup the Asset Audir List
  	protected function dtgAudit_Create() {
  		$this->dtgAudit = new QDataGrid($this);
			$this->dtgAudit->Name = 'asset_audit_list';
  		$this->dtgAudit->CellPadding = 5;
  		$this->dtgAudit->CellSpacing = 0;
  		$this->dtgAudit->CssClass = "datagrid";
  		$this->dtgAudit->UseAjax = true;
  		$this->dtgAudit->SetDataBinder('dtgAudit_Bind');
  		QApplication::$Database[1]->EnableProfiling();
  		// You should create here a datagrid with five columns: Location, Asset Code, Asset Model, PDT Count, System Count
  		/*$this->dtgAudit->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM["audit_scan__location_id__short_description"] ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('Asset Code', '<?= $_ITEM["audit_scan__location_id__short_description"] ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('Asset Model', '<?= $_ITEM["audit_scan__location_id__short_description"] ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('PDT Count', '<?= $_ITEM["audit_scan__location_id__short_description"] ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription, false))));
  		$this->dtgAudit->AddColumn(new QDataGridColumnExt('System Count', '<?= $_ITEM["audit_scan__location_id__short_description"] ?>',
  			array('OrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AuditScan()->Location->ShortDescription, false))));
  	*/}
  	
  	protected function dtgAudit_Bind() {
  		// This is where you will use a generated method to select all audit_scans with a specific audit ID ...
  		// you will also need to calculate the system count so that you can 
  		 $strQuery = 
        "SELECT
          `audit_scan`.`audit_scan_id` AS `audit_scan_id`,
          `audit_scan`.`audit_id` AS `audit_id`,
          `audit_scan`.`location_id` AS `location_id`,
          `audit_scan`.`entity_id` AS `entity_id`,
          `audit_scan`.`count` AS `count`,
          `audit_scan__location_id`.`location_id` AS `audit_scan__location_id__location_id`,
          `audit_scan__location_id`.`short_description` AS `audit_scan__location_id__short_description`,
          `audit_scan__location_id`.`long_description` AS `audit_scan__location_id__long_description`,
          `audit_scan__location_id`.`created_by` AS `audit_scan__location_id__created_by`,
          `audit_scan__location_id`.`creation_date` AS `audit_scan__location_id__creation_date`,
          `audit_scan__location_id`.`modified_by` AS `audit_scan__location_id__modified_by`,
          `audit_scan__location_id`.`modified_date` AS `audit_scan__location_id__modified_date`,
          `asset`.`asset_id` AS `asset_id`,
          `asset`.`asset_model_id` AS `asset_model_id`,
          `asset`.`location_id` AS `location_id`,
          `asset`.`asset_code` AS `asset_code`,
          `asset`.`image_path` AS `image_path`,
          `asset`.`checked_out_flag` AS `checked_out_flag`,
          `asset`.`reserved_flag` AS `reserved_flag`,
          `asset`.`created_by` AS `created_by`,
          `asset`.`creation_date` AS `creation_date`,
          `asset`.`modified_by` AS `modified_by`,
          `asset`.`modified_date` AS `modified_date`,
          `asset__asset_model_id`.`asset_model_id` AS `asset__asset_model_id__asset_model_id`,
          `asset__asset_model_id`.`category_id` AS `asset__asset_model_id__category_id`,
          `asset__asset_model_id`.`manufacturer_id` AS `asset__asset_model_id__manufacturer_id`,
          `asset__asset_model_id`.`asset_model_code` AS `asset__asset_model_id__asset_model_code`,
          `asset__asset_model_id`.`short_description` AS `asset__asset_model_id__short_description`,
          `asset__asset_model_id`.`long_description` AS `asset__asset_model_id__long_description`,
          `asset__asset_model_id`.`image_path` AS `asset__asset_model_id__image_path`,
          `asset__asset_model_id`.`created_by` AS `asset__asset_model_id__created_by`,
          `asset__asset_model_id`.`creation_date` AS `asset__asset_model_id__creation_date`,
          `asset__asset_model_id`.`modified_by` AS `asset__asset_model_id__modified_by`,
          `asset__asset_model_id`.`modified_date` AS `asset__asset_model_id__modified_date`
        FROM
          `audit_scan` AS `audit_scan`
        LEFT JOIN `location` AS `audit_scan__location_id` ON `audit_scan`.`location_id` = `audit_scan__location_id`.`location_id`
        LEFT JOIN `asset` AS `asset` ON `audit_scan`.`entity_id` = `asset`.`asset_id`
        LEFT JOIN `asset_model` AS `asset__asset_model_id` ON `asset`.`asset_model_id` = `asset__asset_model_id`.`asset_model_id`
        WHERE
          `audit_scan`.`audit_id` = '".$_GET['intAuditId']."'";
  		//$this->dtgAudit->DataSource = AuditScan::LoadArrayByAuditId($_GET['intAuditId'],QQ::Clause(QQ::Expand(QQN::AuditScan()->Location)));
  	  //echo "<table cellspacing='0' cellpadding='5' border='1'><tr><td>Location</td><td>Asset Code</td><td>Asset Model</td><td>PDT Count</td><td>System Count</td></tr>";
  	  /* // Load AuditScan objects with short descriptions of locations
  	  $objAuditScanArray = AuditScan::LoadArrayByAuditId($objAudit->AuditId,QQ::Clause(QQ::Expand(QQN::AuditScan()->Location)));
  		$intEntityIdArray = array();
  		// Array of AssetId in that audit
  		foreach ($objCopyAuditScanArray=&$objAuditScanArray as $objNewAuditScan) {
  			$intEntityIdArray[] = $objNewAuditScan->EntityId;
  		}
  		// Load Asset objects by array of AssetId
  		$objAssetArray = Asset::QueryArray(QQ::In(QQN::Asset()->AssetId,$intEntityIdArray),QQ::Clause(QQ::Expand(QQN::Asset()->AssetModel)));
  		foreach ($objAssetArray as $objAsset) {
  			$objAssetArrayById[$objAsset->AssetId] = $objAsset;
  		}
  		// Display the report table
  	  foreach ($objAuditScanArray as $objAuditScan) {
  	    $intAssetId = $objAuditScan->EntityId;
  	    echo "<tr><td>".$objAuditScan->Location->ShortDescription."</td><td>".$objAssetArrayById[$intAssetId]->AssetCode."</td><td>".$objAssetArrayById[$intAssetId]->AssetModel."</td><td>".$objAuditScan->Count."</td><td>";
  	  	if ($objAuditScan->Location->LocationId != $objAssetArrayById[$intAssetId]->LocationId) {
  	  	  echo "0";
  	  	}
  	  	else {
  	  	  echo "1";
  	  	}
  	  	echo "</td></tr>";
  	  }
  	  echo "</table></td></tr>";*/
  	  
  	 
  	  
  	  $objDatabase = QApplication::$Database[1];
      // Perform the Query
      $objDbResult = $objDatabase->Query($strQuery);
      while ($objNextRow = $objDbResult->GetNextRow()) {
   	    $objDbRowArray[]=$objNextRow;
      }
      $this->dtgAudit->DataSource = $objDbRowArray;
  	}
  	
  	protected function rblDiscrepancy_Change($strFormId, $strControlId, $strParameter) {
  		// This is where you will toggle between showing only the discrepancies in the datagrid or showing all of the audit scans.
  	}
  	
	}
	
	// Go ahead and run this form object to generate the page
	AssetAuditViewForm::Run('AssetAuditViewForm', 'asset_audit_view.tpl.php');
	QApplication::$Database[1]->OutputProfiling();	
?>