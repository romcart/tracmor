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
QApplication::Authenticate(7);

class InventoryLocationReportForm extends QForm {

	// Header Tabs
	protected $ctlHeaderMenu;

	// Shortcut Menu
	protected $ctlShortcutMenu;

	// Basic Inputs
	protected $txtInventoryModel;
	protected $txtInventoryCode;
	protected $lstCategory;
	protected $lstManufacturer;
	protected $lstGenerateOptions;
	protected $lstLocationFilterTypes;
	protected $txtLocation;
	protected $lblReport;

	// Buttons
	protected $btnGenerate;
	protected $btnClear;

	// Data repeater
	protected $dtrInventoryLocation;

	protected function Form_Create() {

		$this->ctlHeaderMenu_Create();
		$this->ctlShortcutMenu_Create();

		$this->txtInventoryModel_Create();
		$this->txtInventoryCode_Create();
		$this->lstCategory_Create();
		$this->lstManufacturer_Create();
		$this->lstGenerateOptions_Create();
		$this->lstLocationFilterTypes_Create();
		$this->txtLocation_Create();
		$this->btnGenerate_Create();
		$this->btnClear_Create();

		// The report code will be rendered in a Qlabel
		$this->lblReport = new QLabel($this);
		$this->lblReport->HtmlEntities = false;
	}

	// Create and Setup the Header Composite Control
	protected function ctlHeaderMenu_Create() {
		$this->ctlHeaderMenu = new QHeaderMenu($this);
	}

	// Create and Setp the Shortcut Menu Composite Control
	protected function ctlShortcutMenu_Create() {
		$this->ctlShortcutMenu = new QShortcutMenu($this);
	}

	/*************************
	 *	CREATE INPUT METHODS
	 *************************/

	protected function lstGenerateOptions_Create() {
		$this->lstGenerateOptions = new QListBox($this);
		$this->lstGenerateOptions->AddItem('Report', null);
		$this->lstGenerateOptions->AddItem('CSV Export', 'csv');
	}

	protected function txtInventoryModel_Create() {
		$this->txtInventoryModel = new QTextBox($this);
	}

	protected function txtInventoryCode_Create() {
		$this->txtInventoryCode = new QTextBox($this);
	}

	protected function lstCategory_Create() {
		$this->lstCategory = new QListBox($this);
		$this->lstCategory->AddItem('- ALL -', null);
		$arrCategory = Category::QueryArray(QQ::Equal(QQN::Category()->InventoryFlag, 1));
		foreach ($arrCategory as $objCategory) {
			$this->lstCategory->AddItem($objCategory->ShortDescription, $objCategory->CategoryId);
		}
	}

	protected function lstManufacturer_Create() {
		$this->lstManufacturer = new QListBox($this);
		$this->lstManufacturer->AddItem('- ALL -', null);
		$arrManufacturer = Manufacturer::LoadAll();
		foreach ($arrManufacturer as $objManufacturer) {
			$this->lstManufacturer->AddItem($objManufacturer->ShortDescription, $objManufacturer->ManufacturerId);
		}
	}

	protected function lstLocationFilterTypes_Create() {
		$this->lstLocationFilterTypes = new QListBox($this);
		$this->lstLocationFilterTypes->AddItem('Starts with', '%s%%');
		$this->lstLocationFilterTypes->AddItem('Contains', '%%%s%%');		
		$this->lstLocationFilterTypes->AddItem('Ends with', '%%%s');
	}

	protected function txtLocation_Create() {
		$this->txtLocation = new QTextBox($this);
	}

	/**************************
	*	CREATE BUTTON METHODS
	**************************/

	protected function btnGenerate_Create() {
		$this->btnGenerate = new QButton($this);
		$this->btnGenerate->Name = 'Generate';
		$this->btnGenerate->Text = 'Generate';
		$this->btnGenerate->AddAction(new QClickEvent(), new QServerAction('btnGenerate_Click'));
		$this->btnGenerate->AddAction(new QEnterKeyEvent(), new QServerAction('btnGenerate_Click'));
		$this->btnGenerate->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	protected function btnClear_Create() {
		$this->btnClear = new QButton($this);
		$this->btnClear->Name = 'clear';
		$this->btnClear->Text = 'Clear';
		$this->btnClear->AddAction(new QClickEvent(), new QServerAction('btnClear_Click'));
		$this->btnClear->AddAction(new QEnterKeyEvent(), new QServerAction('btnClear_Click'));
		$this->btnClear->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}

	protected function btnClear_Click() {
		// Reload the page fresh.
		QApplication::Redirect('inventory_location_report.php');
	}

	protected function btnGenerate_Click() {
		if ($this->lstGenerateOptions->SelectedValue == 'csv') {
			$arrConditions = $this->GetFilterConditions();
			$objOrderByClause = $this->GetOrderByClause();
			$dataSource = InventoryLocation::QueryArray(QQ::AndCondition($arrConditions), $objOrderByClause);
			ob_end_clean();
			header("Content-type: text/csv");
			header("Content-Disposition: attachment; filename=Inventory_Location_Report.csv");
			header("Pragma: no-cache");
			header("Expires: 0");
			print '"Location","Inventory Code","Inventory Model","Quantity"'."\r\n";
			foreach($dataSource as $record){
				$arrColumnText = array(
					$this->prepare($record->Location->ShortDescription),
					$this->prepare($record->InventoryModel->InventoryModelCode),
					$this->prepare($record->InventoryModel->ShortDescription),
					$this->prepare($record->Quantity)
				);
				$strColumnsHtml = implode('","', $arrColumnText);
				$strColumnsHtml = '"' . $strColumnsHtml . '"' . "\r\n";
				print $strColumnsHtml;
			}
			
			ob_get_contents();
			@ob_flush();
			flush();
			exit;
		} else {
			$this->dtrInventoryLocation = new QDataRepeater($this);
			$this->dtrInventoryLocation->Paginator = new QPaginator($this);
			$this->dtrInventoryLocation->ItemsPerPage = 6;
			$this->dtrInventoryLocation->PaginatorAlternate = new QPaginator($this);
			$this->dtrInventoryLocation->UseAjax = true;
			$this->dtrInventoryLocation->Template = 'dtr_inventory_location.tpl.php';
			$this->dtrInventoryLocation->SetDataBinder('dtrInventoryLocation_Bind');
		}
	}

	protected function dtrInventoryLocation_Bind() {
		$arrConditions = $this->GetFilterConditions();
		$objOrderByClause = $this->GetOrderByClause();
		$this->dtrInventoryLocation->TotalItemCount = InventoryLocation::QueryCount(QQ::AndCondition($arrConditions), $objOrderByClause);
		$this->dtrInventoryLocation->DataSource = InventoryLocation::QueryArray(QQ::AndCondition($arrConditions), $objOrderByClause);
	}

	protected function GetFilterConditions() {
		// Exclude inventory locations with zero qty
		$arrConditions = array(QQ::NotEqual(QQN::InventoryLocation()->Quantity, 0));

		// Inventory Model
		if (strlen($this->txtInventoryModel->Text) > 0) {
			array_push($arrConditions, QQ::Like(QQN::InventoryLocation()->InventoryModel->ShortDescription, '%' . $this->txtInventoryModel->Text . '%'));
		}

		// Inventory Code
		if (strlen($this->txtInventoryCode->Text) > 0) {
			array_push($arrConditions, QQ::Like(QQN::InventoryLocation()->InventoryModel->InventoryModelCode, '%' . $this->txtInventoryCode->Text . '%'));
		}

		// Category
		if ($this->lstCategory->SelectedValue) {
			array_push($arrConditions, QQ::Equal(QQN::InventoryLocation()->InventoryModel->CategoryId, $this->lstCategory->SelectedValue));
		}

		// Manufacturer
		if ($this->lstManufacturer->SelectedValue) {
			array_push($arrConditions, QQ::Equal(QQN::InventoryLocation()->InventoryModel->ManufacturerId, $this->lstManufacturer->SelectedValue));
		}

		// Location
		if (strlen($this->txtLocation->Text) > 0) {
			array_push($arrConditions, QQ::Like(QQN::InventoryLocation()->Location->ShortDescription, sprintf($this->lstLocationFilterTypes->SelectedValue, $this->txtLocation->Text)));
		}

		return $arrConditions;
	}

	protected function GetOrderByClause() {
		$objOrderByClause = QQ::Clause(
			QQ::OrderBy(
				QQN::InventoryLocation()->Location->ShortDescription, 
				QQN::InventoryLocation()->InventoryModel->ShortDescription
			)
		);

		return $objOrderByClause;
	}

	public function prepare($strHtml){
		$strHtml = htmlspecialchars_decode($strHtml);
		$strHtml = str_replace('"', '""', $strHtml);
		//$strHtml = $this->StripControls($strHtml);
		$strHtml = strip_tags($strHtml);
		$strHtml = trim($strHtml);
		return $strHtml;
	}
}

InventoryLocationReportForm::Run('InventoryLocationReportForm');
?>