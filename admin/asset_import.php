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
	require(__DOCROOT__ . __PHP_ASSETS__ . '/csv/DataSource.php');
	QApplication::Authenticate();

	class AdminLabelsForm extends QForm {
		// Header Menu
		protected $ctlHeaderMenu;

		protected $pnlMain;
		protected $pnlStepOne;
		protected $pnlStepTwo;
		protected $pnlStepThree;
		protected $lstFieldSeparator;
		protected $txtFieldSeparator;
    protected $lstTextDelimiter;
		protected $txtTextDelimiter;
		protected $flcFileCsv;
		protected $FileCsvData;
		protected $arrCsvHeader;
		protected $arrMapFields;
		protected $strFilePathArray;
		protected $lstMapHeaderArray;
		protected $txtMapDefaultValueArray;
		protected $lstMapDefaultValueArray;
		protected $dtpDateArray;
		protected $strAcceptibleMimeArray;
		protected $chkHeaderRow;
		protected $blnHeaderRow;
		protected $btnNext;
		protected $btnCancel;
		protected $intStep;
		protected $arrAssetCustomField;
		protected $arrAssetModelCustomField;
		protected $arrTracmorField;
		protected $dtgCategory;
		protected $objNewCategoryArray;
		protected $dtgManufacturer;
		protected $objNewManufacturerArray;
		protected $dtgLocation;
		protected $objNewLocationArray;
		protected $dtgAssetModel;
		protected $objNewAssetModelArray;
		protected $dtgAsset;
		protected $objNewAssetArray;
		protected $blnImportEnd;
		protected $intImportStep;
		protected $intLocationKey;
    protected $intCategoryKey;
    protected $intManufacturerKey;
    protected $intCreatedByKey;
    protected $intCreatedDateKey;
    protected $intModifiedByKey;
    protected $intModifiedDateKey;
    protected $intUserArray;
    protected $lblImportSuccess;
    protected $intSkippedRecordCount;
    protected $strFilePath;
    protected $btnUndoLastImport;
    protected $btnImportMore;
    protected $btnReturnToAssets;

		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->pnlMain_Create();
			$this->pnlStepOne_Create();
			$this->Buttons_Create();
			$this->intStep = 1;
			$this->intSkippedRecordCount = 0;
			$this->blnImportEnd = true;
			$this->arrAssetCustomField = array();
			foreach (CustomField::LoadArrayByActiveFlagEntity(1, 1) as $objCustomField) {
			  $this->arrAssetCustomField[$objCustomField->CustomFieldId] = $objCustomField;
			}
			$this->arrAssetModelCustomField = array();
			foreach (CustomField::LoadArrayByActiveFlagEntity(1, 4) as $objCustomField) {
			  $this->arrAssetModelCustomField[$objCustomField->CustomFieldId] = $objCustomField;
			}
			$this->intUserArray = array();
			foreach (UserAccount::LoadAll() as $objUser) {
			  $this->intUserArray[strtolower($objUser->Username)] = $objUser->UserAccountId;
			}
			$this->strAcceptibleMimeArray = array(
						'text/plain' => 'txt',
  				  'application/vnd.ms-excel' => 'csv');
		}

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		protected function pnlMain_Create() {
		  $this->pnlMain = new QPanel($this);
		  $this->pnlMain->AutoRenderChildren = true;
		}

		protected function pnlStepOne_Create() {
			$this->pnlStepOne = new QPanel($this->pnlMain);
      $this->pnlStepOne->Template = "asset_import_pnl_step1.tpl.php";

			// Step 1
			$this->lstFieldSeparator = new QRadioButtonList($this->pnlStepOne);
			$this->lstFieldSeparator->Name = "Field Separator: ";
			$this->lstFieldSeparator->Width = 200;
			$this->lstFieldSeparator->AddItem(new QListItem('Comma Separated', 1));
			$this->lstFieldSeparator->AddItem(new QListItem('Tab Separated', 2));
			$this->lstFieldSeparator->AddItem(new QListItem('Other', 'other'));
			$this->lstFieldSeparator->SelectedIndex = 0;
			$this->lstFieldSeparator->AddAction(new QChangeEvent(), new QAjaxAction('lstFieldSeparator_Change'));
			$this->txtFieldSeparator = new QTextBox($this->pnlStepOne);
			$this->txtFieldSeparator->Width = 100;
			$this->txtFieldSeparator->Display = false;
			$this->lstTextDelimiter = new QListBox($this->pnlStepOne);
			$this->lstTextDelimiter->Name = "Text Delimiter: ";
			$this->lstTextDelimiter->Width = 150;
			$this->lstTextDelimiter->AddItem(new QListItem('None', 1));
			$this->lstTextDelimiter->AddItem(new QListItem('Single Quote (\')', 2));
			$this->lstTextDelimiter->AddItem(new QListItem('Double Quote (")', 3));
			$this->lstTextDelimiter->AddItem(new QListItem('Other', 'other'));
			$this->lstTextDelimiter->AddAction(new QChangeEvent(), new QAjaxAction('lstTextDelimiter_Change'));
			$this->txtTextDelimiter = new QTextBox($this->pnlStepOne);
			$this->txtTextDelimiter->Width = 100;
			$this->txtTextDelimiter->Display = false;
			$this->flcFileCsv = new QFileControlExt($this->pnlStepOne);
			$this->flcFileCsv->Name = "Select File: ";
			$this->chkHeaderRow = new QCheckBox($this->pnlStepOne);
			$this->chkHeaderRow->Name = "Header Row: ";
    }

    protected function pnlStepTwo_Create() {
			$this->pnlStepTwo = new QPanel($this->pnlMain);
      $this->pnlStepTwo->Template = "asset_import_pnl_step2.tpl.php";
    }

    protected function pnlStepThree_Create() {
			$this->pnlStepThree = new QPanel($this->pnlMain);
      $this->pnlStepThree->Template = "asset_import_pnl_step3.tpl.php";
    }

    protected function Buttons_Create() {
      // Buttons
			$this->btnNext = new QButton($this);
			$this->btnNext->Text = "Next";
			$this->btnNext->AddAction(new QClickEvent(), new QServerAction('btnNext_Click'));
			$this->btnNext->AddAction(new QEnterKeyEvent(), new QServerAction('btnNext_Click'));
			$this->btnNext->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QTerminateAction());
    }

		protected function lstFieldSeparator_Change() {
		  switch ($this->lstFieldSeparator->SelectedValue) {
		    case 'other':
		      $this->txtFieldSeparator->Display = true;
		      break;
		    default:
		      $this->txtFieldSeparator->Display = false;
		  }
		}

		protected function lstTextDelimiter_Change() {
      switch ($this->lstTextDelimiter->SelectedValue) {
		    case 'other':
		      $this->txtTextDelimiter->Display = true;
		      break;
		    default:
		      $this->txtTextDelimiter->Display = false;
		  }
		}

		// Next button click action
		protected function btnNext_Click() {
		  $blnError = false;
		  if ($this->intStep == 1) {
		    if ($this->chkHeaderRow->Checked) {
		      $this->blnHeaderRow = true;
		    }
		    else {
		      $this->blnHeaderRow = false;
		    }
		    // Check errors
		    if ($this->lstFieldSeparator->SelectedValue == 'other' && !$this->txtFieldSeparator->Text) {
		      $this->flcFileCsv->Warning = "Please enter the field separator.";
		      $blnError = true;
		    }
		    elseif ($this->lstTextDelimiter->SelectedValue == 'other' && !$this->txtTextDelimiter->Text) {
		      $this->flcFileCsv->Warning = "Please enter the text delimiter.";
		      $blnError = true;
		    }
		    else {
  		    // Step 1 complete
          // File Not Uploaded
    			if (!file_exists($this->flcFileCsv->File) || !$this->flcFileCsv->Size) {
    				throw new QCallerException('FileAssetType must be a valid QFileAssetType constant value');
    			// File Has Incorrect MIME Type (only if an acceptiblemimearray is setup)
    			} elseif (is_array($this->strAcceptibleMimeArray) && (!array_key_exists($this->flcFileCsv->Type, $this->strAcceptibleMimeArray))) {
    				$this->flcFileCsv->Warning = "Extension must be 'csv' or 'txt'";
    				$blnError = true;
    			// File Successfully Uploaded
    			} else {
    			  $this->flcFileCsv->Warning = "";
    				// Setup Filename, Base Filename and Extension
    				$strFilename = $this->flcFileCsv->FileName;
    				$intPosition = strrpos($strFilename, '.');

    				/*if (is_array($this->strAcceptibleMimeArray) && array_key_exists($this->flcFileCsv->Type, $this->strAcceptibleMimeArray))
    					$strExtension = $this->strAcceptibleMimeArray[$this->flcFileCsv->Type];
    				else {
    					if ($intPosition)
    						$strExtension = substr($strFilename, $intPosition + 1);
    					else
    						$strExtension = null;
    				}*/

    				//$strBaseFilename = substr($strFilename, 0, $intPosition);
    				//$strExtension = strtolower($strExtension);

    				// Save the File in a slightly more permanent temporary location
    				//$strTempFilePath = __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__ . '/'.$_SESSION['intUserAccountId'] .'.' . 'csv';
    				//copy($this->flcFileCsv->File, $strTempFilePath);
    				//$this->File = $strTempFilePath;

    				// Cleanup and Save Filename
    				//$this->strFileName = preg_replace('/[^A-Z^a-z^0-9_\-]/', '', $strBaseFilename) . '.' . $strExtension;
    			}
    			if (!$blnError) {
    			  $this->FileCsvData = new File_CSV_DataSource();
    			  $this->FileCsvData->settings($this->GetCsvSettings());
    			  $file = fopen($this->flcFileCsv->File, "r");
            // Counter of fles
            $i=1;
            // Counter of rows
            $j=1;
            $this->strFilePathArray = array();
            // The uploaded file splits up in order to avoid out of memory
            while ($row = fgets($file, 1000)) {
              if ($j == 1) {
                $strFilePath = sprintf('%s/%s_%s.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId'], $i);
                $this->strFilePathArray[] = $strFilePath;
                $file_part = fopen($strFilePath, "w+");
              }

              /*while ($row != $row_new = str_replace($this->FileCsvData->settings['escape'].$this->FileCsvData->settings['escape'], $this->FileCsvData->settings['escape'].$this->FileCsvData->settings['delimiter'].$this->FileCsvData->settings['delimiter'].$this->FileCsvData->settings['escape'], $row)) {
                $row = $row_new;
              }*/

              fwrite($file_part, $row);
              $j++;
              if ($j > 1000) {
                $j = 1;
                $i++;
                fclose($file_part);
              }
            }
            $this->arrMapFields = array();
            $this->arrTracmorField = array();
            // Load first file
            $this->FileCsvData->load($this->strFilePathArray[0]);
            // Get Headers
            if ($this->blnHeaderRow) {
              $this->arrCsvHeader = $this->FileCsvData->getHeaders();
            }
            else {
              $this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
            }
            $file_skipped = fopen($this->strFilePath = sprintf('%s/%s_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "a");
            $strFirstRowArray = $this->FileCsvData->getRow(0);
            for ($i=0; $i<count($strFirstRowArray); $i++) {
              $this->arrMapFields[$i] = array();
              if ($this->blnHeaderRow) {
                $this->arrMapFields[$i]['select_list'] = $this->lstMapHeader_Create($this, $i, $this->arrCsvHeader[$i]);
                $this->arrMapFields[$i]['header'] = $this->arrCsvHeader[$i];
                $this->PutSkippedRecordInFile($file_skipped, $strFirstRowArray);
              }
              else {
                $this->arrMapFields[$i]['select_list'] = $this->lstMapHeader_Create($this, $i);
              }
              if ($this->blnHeaderRow && $this->arrCsvHeader[$i] || !$this->blnHeaderRow) {
                $txtDefaultValue = new QTextBox($this);
                $txtDefaultValue->Width = 200;
                $this->txtMapDefaultValueArray[] = $txtDefaultValue;

                $lstDefaultValue = new QListBox($this);
                $lstDefaultValue->Width = 200;
                $lstDefaultValue->Display = false;
                $this->lstMapDefaultValueArray[] = $lstDefaultValue;

                $dtpDate = new QDateTimePicker($this);
              	$dtpDate->DateTimePickerType = QDateTimePickerType::Date;
              	$dtpDate->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
              	$dtpDate->Display = false;
              	$this->dtpDateArray[] = $dtpDate;
              }
              $this->arrMapFields[$i]['row1'] = $strFirstRowArray[$i];
            }
            $this->btnNext->Text = "Import Now";
            fclose($file_skipped);
    			}
		    }
		  }
		  elseif ($this->intStep == 2) {
		    // Step 2 complete
		    $blnError = false;
        $blnAssetCode = false;
        $blnLocation = false;
        $blnAssetModelCode = false;
        $blnAssetModelShortDescription = false;
        $blnCategory = false;
        $blnManufacturer = false;
        foreach ($this->lstMapHeaderArray as $lstMapHeader) {
          $strSelectedValue = strtolower($lstMapHeader->SelectedValue);
          if ($strSelectedValue == "location") {
            $blnLocation = true;
          }
          elseif ($strSelectedValue == "asset code") {
            $blnAssetCode = true;
          }
          elseif ($strSelectedValue == "asset model short description") {
            $blnAssetModelShortDescription = true;
          }
          elseif ($strSelectedValue == "asset model code") {
            $blnAssetModelCode = true;
          }
          elseif ($strSelectedValue == "category") {
            $blnCategory = true;
          }
          elseif ($strSelectedValue == "manufacturer") {
            $blnManufacturer = true;
          }
        }
        if ($this->lstMapDefaultValueArray) {
          foreach ($this->lstMapDefaultValueArray as $lstDefault) {
            if ($lstDefault->Display && $lstDefault->Required && !$lstDefault->SelectedValue) {
              $lstDefault->Warning = "You must select one default value.";
              $blnError = true;
              break;
            }
            else {
              $blnError = false;
              $lstDefault->Warning = "";
            }
          }
        }
        if ($this->txtMapDefaultValueArray) {
          foreach ($this->txtMapDefaultValueArray as $txtDefault) {
            if ($txtDefault->Display && $txtDefault->Required && !$txtDefault->Text) {
              $txtDefault->Warning = "You must enter default value.";
              break;
            }
            else {
              $txtDefault->Warning = "";
            }
          }
        }
        if (!$blnError && $blnAssetCode && $blnAssetModelCode && $blnAssetModelShortDescription && $blnLocation && $blnCategory && $blnManufacturer) {
          $this->btnNext->Warning = "";
          foreach ($this->arrTracmorField as $key => $value) {
            if ($value == 'location') {
              $this->intLocationKey = $key;
            }
            elseif ($value == 'category') {
              $this->intCategoryKey = $key;
            }
            elseif ($value == 'manufacturer') {
              $this->intManufacturerKey = $key;
            }
            elseif ($value == 'created by') {
              $this->intCreatedByKey = $key;
            }
            elseif ($value == 'created date') {
              $this->intCreatedDateKey = $key;
            }
            elseif ($value == 'modified by') {
              $this->intModifiedByKey = $key;
            }
            elseif ($value == 'modified date') {
              $this->intModifiedDateKey = $key;
            }
          }

          $strLocationArray = array();
          foreach (Location::LoadAll() as $objLocation) {
            $strLocationArray[] = $objLocation->ShortDescription;
          }
          $txtDefaultValue = trim($this->txtMapDefaultValueArray[$this->intLocationKey]->Text);
          if ($txtDefaultValue && !$this->in_array_nocase($txtDefaultValue, $strLocationArray)) {
            $strLocationArray[] = $txtDefaultValue;
            $objNewLocation = new Location();
            $objNewLocation->ShortDescription = $txtDefaultValue;
            $objNewLocation->Save();
            $this->objNewLocationArray[$objNewLocation->LocationId] = $objNewLocation->ShortDescription;
          }
          $this->objNewLocationArray = array();
          $this->objNewCategoryArray = array();
          $this->objNewManufacturerArray = array();
          $this->objNewAssetModelArray = array();
          $this->blnImportEnd = false;
          $j=1;
          foreach ($this->strFilePathArray as $strFilePath) {
            if ($j != 1) {
              $this->FileCsvData->load($strFilePath);
              $this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
            }
            // Location Import
            for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
              $strRowArray = $this->FileCsvData->getRow($i);
              if (trim($strRowArray[$this->intLocationKey]) && !$this->in_array_nocase(trim($strRowArray[$this->intLocationKey]), $strLocationArray)) {
                $strLocationArray[] = trim($strRowArray[$this->intLocationKey]);
                $objNewLocation = new Location();
                $objNewLocation->ShortDescription = trim($strRowArray[$this->intLocationKey]);
                $objNewLocation->Save();
                $this->objNewLocationArray[$objNewLocation->LocationId] = $objNewLocation->ShortDescription;
              }
            }
            $j++;
          }
          $this->btnNext->RemoveAllActions('onclick');
          $this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
          $this->btnNext->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnNext));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnNext_Click'));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QToggleEnableAction($this->btnNext));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $this->btnNext->Warning = "Locations have been imported. Please wait...";
          $this->intImportStep = 2;

          $this->dtgLocation = new QDataGrid($this);
          $this->dtgLocation->Name = 'location_list';
      		$this->dtgLocation->CellPadding = 5;
      		$this->dtgLocation->CellSpacing = 0;
      		$this->dtgLocation->CssClass = "datagrid";
          $this->dtgLocation->UseAjax = true;
          $this->dtgLocation->ShowColumnToggle = false;
          $this->dtgLocation->ShowExportCsv = false;
          $this->dtgLocation->ShowHeader = false;

          // Enable Pagination, and set to 20 items per page
          //$objPaginator = new QPaginator($this->dtgLocation);
          //$this->dtgLocation->Paginator = $objPaginator;
          //$this->dtgLocation->ItemsPerPage = 20;

          $this->dtgLocation->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
          //$this->dtgLocation->DataSource = $this->objNewLocationArray;
          //$this->dtgLocation->TotalItemCount = count($this->objNewLocationArray);

          $this->dtgCategory = new QDataGrid($this);
          $this->dtgCategory->Name = 'category_list';
      		$this->dtgCategory->CellPadding = 5;
      		$this->dtgCategory->CellSpacing = 0;
      		$this->dtgCategory->CssClass = "datagrid";
          $this->dtgCategory->UseAjax = true;
          $this->dtgCategory->ShowColumnToggle = false;
          $this->dtgCategory->ShowExportCsv = false;
          $this->dtgCategory->ShowHeader = false;

          // Enable Pagination, and set to 20 items per page
          //$objPaginator = new QPaginator($this->dtgCategory);
          //$this->dtgCategory->Paginator = $objPaginator;
          //$this->dtgCategory->ItemsPerPage = 20;

          $this->dtgCategory->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
          //$this->dtgCategory->DataSource = $this->objNewCategoryArray;
          //$this->dtgCategory->TotalItemCount = count($this->objNewCategoryArray);

          $this->dtgManufacturer = new QDataGrid($this);
          $this->dtgManufacturer->Name = 'manufacturer_list';
      		$this->dtgManufacturer->CellPadding = 5;
      		$this->dtgManufacturer->CellSpacing = 0;
      		$this->dtgManufacturer->CssClass = "datagrid";
          $this->dtgManufacturer->UseAjax = true;
          $this->dtgManufacturer->ShowColumnToggle = false;
          $this->dtgManufacturer->ShowExportCsv = false;
          $this->dtgManufacturer->ShowHeader = false;

          // Enable Pagination, and set to 20 items per page
          //$objPaginator = new QPaginator($this->dtgManufacturer);
          //$this->dtgManufacturer->Paginator = $objPaginator;
          //$this->dtgManufacturer->ItemsPerPage = 20;

          $this->dtgManufacturer->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
          //$this->dtgManufacturer->DataSource = $this->objNewManufacturerArray;
          //$this->dtgManufacturer->TotalItemCount = count($this->objNewManufacturerArray);

          $this->dtgAssetModel = new QDataGrid($this);
          $this->dtgAssetModel->Name = 'asset_model_list';
      		$this->dtgAssetModel->CellPadding = 5;
      		$this->dtgAssetModel->CellSpacing = 0;
      		$this->dtgAssetModel->CssClass = "datagrid";
          $this->dtgAssetModel->UseAjax = true;
          $this->dtgAssetModel->ShowColumnToggle = false;
          $this->dtgAssetModel->ShowExportCsv = false;
          $this->dtgAssetModel->ShowHeader = false;

          // Enable Pagination, and set to 20 items per page
          //$objPaginator = new QPaginator($this->dtgAssetModel);
          //$this->dtgAssetModel->Paginator = $objPaginator;
          //$this->dtgAssetModel->ItemsPerPage = 20;

          $this->dtgAssetModel->AddColumn(new QDataGridColumnExt('Asset Model', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
          //$this->dtgAssetModel->DataSource = $this->objNewAssetModelArray;
          //$this->dtgAssetModel->TotalItemCount = count($this->objNewAssetModelArray);

          $this->dtgAsset = new QDataGrid($this);
          $this->dtgAsset->Name = 'asset_list';
      		$this->dtgAsset->CellPadding = 5;
      		$this->dtgAsset->CellSpacing = 0;
      		$this->dtgAsset->CssClass = "datagrid";
          $this->dtgAsset->UseAjax = true;
          $this->dtgAsset->ShowColumnToggle = false;
          $this->dtgAsset->ShowExportCsv = false;
          $this->dtgAsset->ShowHeader = false;

          // Enable Pagination, and set to 20 items per page
          //$objPaginator = new QPaginator($this->dtgAsset);
          //$this->dtgAsset->Paginator = $objPaginator;
          //$this->dtgAsset->ItemsPerPage = 20;

          $this->dtgAsset->AddColumn(new QDataGridColumnExt('Asset', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));
          //$this->dtgAsset->DataSource = $this->objNewAssetArray;
          //$this->dtgAsset->TotalItemCount = count($this->objNewAssetArray);

          $this->lblImportSuccess = new QLabel($this);
        	$this->lblImportSuccess->HtmlEntities = false;
        	$this->lblImportSuccess->Display = false;

        	$this->btnUndoLastImport = new QButton($this);
        	$this->btnUndoLastImport->Text = "Undo Last Import";
        	$this->btnUndoLastImport->Display = false;
        	$this->btnUndoLastImport->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
    			$this->btnUndoLastImport->AddAction(new QEnterKeyEvent(), new QServerAction('btnCancel_Click'));
    			$this->btnUndoLastImport->AddAction(new QEnterKeyEvent(), new QTerminateAction());

    			$this->btnImportMore = new QButton($this);
        	$this->btnImportMore->Text = "Import More";
        	$this->btnImportMore->Display = false;
        	$this->btnImportMore->AddAction(new QClickEvent(), new QServerAction('btnImportMore_Click'));
    			$this->btnImportMore->AddAction(new QEnterKeyEvent(), new QServerAction('btnImportMore_Click'));
    			$this->btnImportMore->AddAction(new QEnterKeyEvent(), new QTerminateAction());

    			$this->btnReturnToAssets = new QButton($this);
        	$this->btnReturnToAssets->Text = "Return to Assets";
        	$this->btnReturnToAssets->Display = false;
        	$this->btnReturnToAssets->AddAction(new QClickEvent(), new QServerAction('btnReturnToAssets_Click'));
    			$this->btnReturnToAssets->AddAction(new QEnterKeyEvent(), new QServerAction('btnReturnToAssets_Click'));
    			$this->btnReturnToAssets->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        }
        /*elseif (!$blnAssetCode) {
          $this->btnNext->Warning = "1";
        }
        elseif (!$blnAssetModelCode) {
          $this->btnNext->Warning = "2";
        }
        elseif (!$blnAssetModelShortDescription) {
          $this->btnNext->Warning = "3";
        }
        elseif (!$blnLocation) {
          $this->btnNext->Warning = "4";
        }*/
        else {
          $this->btnNext->Warning = "You must select all required fields (Asset Code, Asset Model Code, Asset Model Short Description, Location, Category and Manifacturer).";
          $blnError = true;
        }
		  }
		  else {
		    // Step 3 complete
		    set_time_limit(0);
		    $file_skipped = fopen($strFilePath = sprintf('%s/%s_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "a");
		    if (!$this->blnImportEnd) {
          if ($this->intImportStep == 2) {
            $strCategoryArray = array();
            $this->objNewCategoryArray = array();
            foreach (Category::LoadAll() as $objCategory) {
              $strCategoryArray[] = $objCategory->ShortDescription;
            }
            $txtDefaultValue = trim($this->txtMapDefaultValueArray[$this->intCategoryKey]->Text);
            if ($txtDefaultValue && !$this->in_array_nocase($txtDefaultValue, $strCategoryArray)) {
              $strCategoryArray[] = $txtDefaultValue;
              $objNewCategory = new Category();
              $objNewCategory->ShortDescription = $txtDefaultValue;
              $objNewCategory->AssetFlag = true;
              $objNewCategory->InventoryFlag = false;
              $objNewCategory->Save();
              $this->objNewCategoryArray[$objNewCategory->CategoryId] = $objNewCategory->ShortDescription;
            }
            $this->btnNext->Warning = "Categories have been imported. Please wait...";
          }
          elseif ($this->intImportStep == 3) {
            $strManufacturerArray = array();
            $this->objNewManufacturerArray = array();
            foreach (Manufacturer::LoadAll() as $objManufacturer) {
              $strManufacturerArray[] = $objManufacturer->ShortDescription;
            }
            $txtDefaultValue = trim($this->txtMapDefaultValueArray[$this->intManufacturerKey]->Text);
            if ($txtDefaultValue && !$this->in_array_nocase($txtDefaultValue, $strManufacturerArray)) {
              $strManufacturerArray[] = $txtDefaultValue;
              $objNewManufacturer = new Manufacturer();
              $objNewManufacturer->ShortDescription = $txtDefaultValue;
              $objNewManufacturer->Save();
              $this->objNewManufacturerArray[$objNewManufacturer->ManufacturerId] = $objNewManufacturer->ShortDescription;
            }
            $this->btnNext->Warning = "Manufacturers have been imported. Please wait...";
          }
          elseif ($this->intImportStep == 4) {
            $intCategoryArray = array();
            foreach (Category::LoadAllWithFlags(true, false) as $objCategory) {
              //$intCategoryArray["'" . strtolower($objCategory->ShortDescription) . "'"] = $objCategory->CategoryId;
              $intCategoryArray[$objCategory->CategoryId] = strtolower($objCategory->ShortDescription);
            }
            $intManufacturerArray = array();
            foreach (Manufacturer::LoadAll() as $objManufacturer) {
              //$intManufacturerArray["'" . strtolower($objManufacturer->ShortDescription) . "'"] = $objManufacturer->ManufacturerId;
              $intManufacturerArray[$objManufacturer->ManufacturerId] = strtolower($objManufacturer->ShortDescription);
            }

            $intModelCustomFieldKeyArray = array();
            $arrAssetModelCustomField = array();
            foreach ($this->arrTracmorField as $key => $value) {
              if ($value == 'asset model short description') {
                $intModelShortDescriptionKey = $key;
              }
              elseif ($value == 'asset model long description') {
                $intModelLongDescriptionKey = $key;
              }
              elseif ($value == 'asset model code') {
                $intModelCodeKey = $key;
              }
              elseif ($value == 'asset code') {
                $intAssetCode = $key;
              }
              elseif (substr($value, 0, 6) == 'model_') {
                $intModelCustomFieldKeyArray[substr($value, 6)] = $key;
                $arrAssetModelCustomField[substr($value, 6)] = $this->arrAssetCustomField[substr($value, 6)];
              }
            }
            $strAssetModelArray = array();
            foreach (AssetModel::LoadAll() as $objAssetModel) {
              $strAssetModelArray[] = strtolower($objAssetModel->ShortDescription);
            }
            $this->btnNext->Warning = "Asset Models have been imported. Please wait...";
          }
          elseif ($this->intImportStep == 5) {
            $intAssetModelArray = array();
            foreach (AssetModel::LoadAll() as $objAssetModel) {
              //$intAssetModelArray["'" . strtolower($objAssetModel->ShortDescription) . "'"] = $objAssetModel->AssetModelId;
              $intAssetModelArray[$objAssetModel->AssetModelId] = strtolower($objAssetModel->ShortDescription);
            }
            $intAssetCustomFieldKeyArray = array();
            $arrAssetCustomField = array();
            foreach ($this->arrTracmorField as $key => $value) {
              if ($value == 'asset model short description') {
                $intModelShortDescriptionKey = $key;
              }
              elseif ($value == 'asset code') {
                $intAssetCode = $key;
              }
              elseif (substr($value, 0, 6) == 'asset_') {
                $intAssetCustomFieldKeyArray[substr($value, 6)] = $key;
                $arrAssetCustomField[substr($value, 6)] = $this->arrAssetCustomField[substr($value, 6)];
              }
            }
            $intLocationArray = array();
            foreach (Location::LoadAll() as $objLocation) {
              //$intLocationArray["'" . strtolower($objLocation->ShortDescription) . "'"] = $objLocation->LocationId;
              $intLocationArray[$objLocation->LocationId] = strtolower($objLocation->ShortDescription);
            }

            $strAssetArray = array();
            foreach (Asset::LoadAll() as $objAsset) {
              $strAssetArray[] = strtolower($objAsset->AssetCode);
            }
            $this->btnNext->Warning = "Assets have been imported. Please wait...";
          }

          $j=1;
          foreach ($this->strFilePathArray as $strFilePath) {
            if ($j != 1) {
              $this->FileCsvData->load($strFilePath);
              $this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
            }
            // Category Import
            if ($this->intImportStep == 2) {
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                if (trim($strRowArray[$this->intCategoryKey]) && !$this->in_array_nocase(trim($strRowArray[$this->intCategoryKey]), $strCategoryArray)) {
                  $strCategoryArray[] = trim($strRowArray[$this->intCategoryKey]);
                  $objNewCategory = new Category();
                  $objNewCategory->ShortDescription = trim($strRowArray[$this->intCategoryKey]);
                  $objNewCategory->AssetFlag = true;
                  $objNewCategory->InventoryFlag = false;
                  $objNewCategory->Save();
                  $this->objNewCategoryArray[$objNewCategory->CategoryId] = $objNewCategory->ShortDescription;
                }
              }
            }
            // Manufacturer Import
            elseif ($this->intImportStep == 3) {
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                if (trim($strRowArray[$this->intManufacturerKey]) && !$this->in_array_nocase(trim($strRowArray[$this->intManufacturerKey]), $strManufacturerArray)) {
                  $strManufacturerArray[] = trim($strRowArray[$this->intManufacturerKey]);
                  $objNewManufacturer = new Manufacturer();
                  $objNewManufacturer->ShortDescription = trim($strRowArray[$this->intManufacturerKey]);
                  $objNewManufacturer->Save();
                  $this->objNewManufacturerArray[$objNewManufacturer->ManufacturerId] = $objNewManufacturer->ShortDescription;
                }
              }
            }
            // Asset Model import
            elseif ($this->intImportStep == 4) {
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                if (trim($strRowArray[$intModelShortDescriptionKey]) && !$this->in_array_nocase(trim($strRowArray[$intModelShortDescriptionKey]), $strAssetModelArray)) {
                  $strAssetModelArray[] = strtolower(trim($strRowArray[$intModelShortDescriptionKey]));
                  $objNewAssetModel = new AssetModel();
                  $objNewAssetModel->ShortDescription = trim($strRowArray[$intModelShortDescriptionKey]);
                  $objNewAssetModel->AssetModelCode = trim($strRowArray[$intModelCodeKey]);
                  if ($intCategoryId = array_keys($intCategoryArray, strtolower(trim($strRowArray[$this->intCategoryKey]))) || $intCategoryId = array_keys($intCategoryArray, strtolower(trim($this->txtMapDefaultValueArray[$this->intCategoryKey]->Text)))) {
                    $objNewAssetModel->CategoryId = $intCategoryId[0];
                  }
                  else {
                    $this->intSkippedRecordCount++;
                    $this->PutSkippedRecordInFile($file_skipped, $strRowArray);
                    break;
                  }
                  if ($intManufacturerId = array_keys($intManufacturerArray, strtolower(trim($strRowArray[$this->intManufacturerKey]))) || $intManufacturerId = array_keys($intManufacturerArray, strtolower(trim($this->txtMapDefaultValueArray[$this->intManufacturerKey]->Text)))) {
                    $objNewAssetModel->ManufacturerId = $intManufacturerId[0];
                  }
                  else {
                    $this->intSkippedRecordCount++;
                    $this->PutSkippedRecordInFile($file_skipped, $strRowArray);
                    break;
                  }
                  if (isset($intModelLongDescriptionKey)) {
                    $objNewAssetModel->LongDescription = trim($strRowArray[$intModelLongDescriptionKey]);
                  }
                  $objNewAssetModel->Save();
                  // Asset Model Custom Field import
                  foreach ($arrAssetModelCustomField as $objCustomField) {
                    if ($objCustomField->CustomFieldQtypeId != 2) {
                      $objCustomField->CustomFieldSelection = new CustomFieldSelection;
          						$objCustomField->CustomFieldSelection->newCustomFieldValue = new CustomFieldValue;
          						$objCustomField->CustomFieldSelection->newCustomFieldValue->CustomFieldId = $objCustomField->CustomFieldId;
          						if (trim($strRowArray[$intModelCustomFieldKeyArray[$objCustomField->CustomFieldId]])) {
          						  $objCustomField->CustomFieldSelection->newCustomFieldValue->ShortDescription = trim($strRowArray[$intModelCustomFieldKeyArray[$objCustomField->CustomFieldId]]);
          						}
          						else {
          						  $objCustomField->CustomFieldSelection->newCustomFieldValue->ShortDescription = $this->txtMapDefaultValueArray[$intModelCustomFieldKeyArray[$objCustomField->CustomFieldId]]->Text;
          						}
          						$objCustomField->CustomFieldSelection->newCustomFieldValue->Save();
          						$objCustomField->CustomFieldSelection->EntityId = $objNewAssetModel->AssetModelId;
          						$objCustomField->CustomFieldSelection->EntityQtypeId = 4;
          						$objCustomField->CustomFieldSelection->CustomFieldValueId = $objCustomField->CustomFieldSelection->newCustomFieldValue->CustomFieldValueId;
          						$objCustomField->CustomFieldSelection->Save();
                    }
                    else {
                      $data = trim($strRowArray[$intModelCustomFieldKeyArray[$objCustomField->CustomFieldId]]);
                      $blnInList = false;
                      $objCustomField->CustomFieldSelection = new CustomFieldSelection;
                			$objCustomField->CustomFieldSelection->EntityId = $objNewAssetModel->AssetModelId;
                			$objCustomField->CustomFieldSelection->EntityQtypeId = 4;
                			foreach (CustomFieldValue::LoadArrayByCustomFieldId($objCustomField->CustomFieldId) as $objCustomFieldValue) {
            					  if (strtolower($objCustomFieldValue->ShortDescription) == $data) {
                 					$objCustomField->CustomFieldSelection->CustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
                					$blnInList = true;
                					break;
            					  }
            					}
            					if (!$blnInList && $this->lstMapDefaultValueArray[$intModelCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedValue != null) {
             					  $objCustomField->CustomFieldSelection->CustomFieldValueId = $this->lstMapDefaultValueArray[$intModelCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedValue;
             					  $objCustomField->CustomFieldSelection->Save();
            					}
            					elseif ($data) {
            					  $objCustomField->CustomFieldSelection->Save();
            					}
                    }
                  }
                  $this->objNewAssetModelArray[$objNewAssetModel->AssetModelId] = $objNewAssetModel->ShortDescription;
                }
              }
            }
            // Asset import
            elseif ($this->intImportStep == 5) {
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                if (trim($strRowArray[$intAssetCode]) && !$this->in_array_nocase(trim($strRowArray[$intAssetCode]), $strAssetArray)) {
                  if (array_keys($intLocationArray, strtolower(trim($strRowArray[$this->intLocationKey]))) && array_keys($intAssetModelArray, strtolower(trim($strRowArray[$intModelShortDescriptionKey])))) {
                    $strAssetArray[] = strtolower(trim($strRowArray[$intAssetCode]));
                    $objNewAsset = new Asset();
                    $objNewAsset->AssetCode = trim($strRowArray[$intAssetCode]);
                    $location_id = array_keys($intLocationArray, strtolower(trim($strRowArray[$this->intLocationKey])));
                    $objNewAsset->LocationId = $location_id[0];
                    $asset_model_id = array_keys($intAssetModelArray, strtolower(trim($strRowArray[$intModelShortDescriptionKey])));
                    $objNewAsset->AssetModelId = $asset_model_id[0];
                    if (isset($this->intCreatedByKey)) {
                      if (isset($this->intUserArray[strtolower(trim($strRowArray[$this->intCreatedByKey]))])) {
                        $objNewAsset->CreatedBy = $this->intUserArray[strtolower(trim($strRowArray[$this->intCreatedByKey]))];
                      }
                      else {
                        $objNewAsset->CreatedBy = $this->lstMapDefaultValueArray[$this->intCreatedByKey]->SelectedValue;
                      }
                    }
                    $objNewAsset->Save();
                    // Asset Custom Field import
                    foreach ($arrAssetCustomField as $objCustomField) {
                      if ($objCustomField->CustomFieldQtypeId != 2) {
                        $objCustomField->CustomFieldSelection = new CustomFieldSelection;
            						$objCustomField->CustomFieldSelection->newCustomFieldValue = new CustomFieldValue;
            						$objCustomField->CustomFieldSelection->newCustomFieldValue->CustomFieldId = $objCustomField->CustomFieldId;
            						if (trim($strRowArray[$intAssetCustomFieldKeyArray[$objCustomField->CustomFieldId]])) {
            						  $objCustomField->CustomFieldSelection->newCustomFieldValue->ShortDescription = trim($strRowArray[$intAssetCustomFieldKeyArray[$objCustomField->CustomFieldId]]);
            						}
            						else {
            						  $objCustomField->CustomFieldSelection->newCustomFieldValue->ShortDescription = $this->txtMapDefaultValueArray[$intAssetCustomFieldKeyArray[$objCustomField->CustomFieldId]]->Text;
            						}
            						$objCustomField->CustomFieldSelection->newCustomFieldValue->Save();
            						$objCustomField->CustomFieldSelection->EntityId = $objNewAsset->AssetId;
            						$objCustomField->CustomFieldSelection->EntityQtypeId = 1;
            						$objCustomField->CustomFieldSelection->CustomFieldValueId = $objCustomField->CustomFieldSelection->newCustomFieldValue->CustomFieldValueId;
            						$objCustomField->CustomFieldSelection->Save();
                      }
                      else {
                        $data = trim($strRowArray[$intAssetCustomFieldKeyArray[$objCustomField->CustomFieldId]]);
                        $blnInList = false;
                        $objCustomField->CustomFieldSelection = new CustomFieldSelection;
                  			$objCustomField->CustomFieldSelection->EntityId = $objNewAsset->AssetId;
                  			$objCustomField->CustomFieldSelection->EntityQtypeId = 1;
                  			foreach (CustomFieldValue::LoadArrayByCustomFieldId($objCustomField->CustomFieldId) as $objCustomFieldValue) {
              					  if (strtolower($objCustomFieldValue->ShortDescription) == $data) {
                   					$objCustomField->CustomFieldSelection->CustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
                  					$blnInList = true;
                  					break;
              					  }
              					}
              					if (!$blnInList && $this->lstMapDefaultValueArray[$intAssetCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedValue != null) {
               					  $objCustomField->CustomFieldSelection->CustomFieldValueId = $this->lstMapDefaultValueArray[$intAssetCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedValue;
               					  $objCustomField->CustomFieldSelection->Save();
              					}
              					elseif ($data) {
              					  $objCustomField->CustomFieldSelection->Save();
              					}
                      }
                    }
                    $this->objNewAssetArray[$objNewAsset->AssetId] = $objNewAsset->AssetCode;
                  }
                  // Add records skipped due to errors
                  else {
                   // $this->btnNext->Warning = trim($strRowArray[$intAssetCode]). "bla bla bla..." . trim($strRowArray[$intModelShortDescriptionKey]);
                    $this->intSkippedRecordCount++;
                    $this->PutSkippedRecordInFile($file_skipped, $strRowArray);
                  }
                }
              }
            }
            $j++;
          }
          if ($this->intImportStep == 6) {
            $this->blnImportEnd = true;
            $this->btnNext->Warning = "";
            $this->dtgLocation->DataSource = $this->objNewLocationArray;
            $this->dtgCategory->DataSource = $this->objNewCategoryArray;
            $this->dtgManufacturer->DataSource = $this->objNewManufacturerArray;
            $this->dtgAssetModel->DataSource = $this->objNewAssetModelArray;
            $this->dtgAsset->DataSource = $this->objNewAssetArray;
            $this->btnNext->Display = false;
            $this->btnCancel->Display = false;
            $this->btnUndoLastImport->Display = true;
            $this->btnImportMore->Display = true;
            $this->btnReturnToAssets->Display = true;
            $this->lblImportSuccess->Display = true;
            $this->lblImportSuccess->Text = "Success:<br/>" .
                                             "<b>" . count($this->objNewAssetArray) . "</b> Records imported successfully<br/>" .
                                             "<b>" . $this->intSkippedRecordCount . "</b> Records skipped due to error<br/>";
            if ($this->intSkippedRecordCount) {
               $this->lblImportSuccess->Text .= sprintf("<a href='http://%s%s/%s_skipped.csv'>Click here to download records that could not be imported</a><br/>", $_SERVER['SERVER_NAME'] . __SUBDIRECTORY__, __TRACMOR_TMP__, $_SESSION['intUserAccountId']);
            }

            $this->intImportStep = -1;
          }
          // Enable Next button
          $this->btnNext->Enabled = true;
          if (!$this->blnImportEnd) {
            $this->intImportStep++;
          }
        }
        fclose($file_skipped);
		  }
		  if (!$blnError) {
		    if (($this->blnImportEnd || $this->intImportStep == 2) && $this->intImportStep != -1) {
  		    $this->intStep++;
    		  $this->DisplayStepForm($this->intStep);
		    }
    		if (!$this->blnImportEnd) {
  		    QApplication::ExecuteJavaScript("document.getElementById('".$this->btnNext->ControlId."').click();");
  		  }
		  }
	  }

	  // Case-insensitive in array function
    protected function in_array_nocase($search, &$array) {
      $search = strtolower($search);
      foreach ($array as $item)
        if (strtolower($item) == $search)
          return TRUE;
      return FALSE;
    }

	  protected function lstMapHeader_Create($objParentObject, $intId, $strName = null) {
	    if ($this->chkHeaderRow->Checked && !$strName) {
	      return false;
	    }
	    $strName = strtolower($strName);
	    $lstMapHeader = new QListBox($objParentObject);
	    $lstMapHeader->Name = "lst".$intId;
	    $strAssetGroup = "Asset";
	    $strAssetModelGroup = "Asset Model";
	    $lstMapHeader->AddItem("- Not Mapped -", null);
	    $lstMapHeader->AddItem("Asset Code", "Asset Code", ($strName == 'asset code') ? true : false, $strAssetGroup);
	    foreach ($this->arrAssetCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "asset_".$objCustomField->CustomFieldId,  ($strName == strtolower($objCustomField->ShortDescription)) ? true : false, $strAssetGroup);
	    }
	    $lstMapHeader->AddItem("Location", "Location", ($strName == 'location') ? true : false, $strAssetGroup);
	    $lstMapHeader->AddItem("Created By", "Created By", ($strName == 'created by') ? true : false, $strAssetGroup);
	    $lstMapHeader->AddItem("Created Date", "Created Date", ($strName == 'created date') ? true : false, $strAssetGroup);
	    $lstMapHeader->AddItem("Modified By", "Modified By", ($strName == 'modified by') ? true : false, $strAssetGroup);
	    $lstMapHeader->AddItem("Modified Date", "Modified Date", ($strName == 'modified date') ? true : false, $strAssetGroup);
	    $lstMapHeader->AddItem("Asset Model Code", "Asset Model Code", ($strName == 'asset model code') ? true : false, $strAssetModelGroup);
	    $lstMapHeader->AddItem("Asset Model Short Description", "Asset Model Short Description", ($strName == 'asset model short description') ? true : false, $strAssetModelGroup);
	    $lstMapHeader->AddItem("Asset Model Long Description", "Asset Model Long Description", ($strName == 'asset model long description') ? true : false, $strAssetModelGroup);
	    foreach ($this->arrAssetModelCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "model_".$objCustomField->CustomFieldId, ($strName == strtolower($objCustomField->ShortDescription)) ? true : false, $strAssetModelGroup);
	    }
	    $lstMapHeader->AddItem("Category", "Category", ($strName == 'category') ? true : false, $strAssetModelGroup);
	    $lstMapHeader->AddItem("Manufacturer", "Manufacturer", ($strName == 'manufacturer') ? true : false, $strAssetModelGroup);
	    $lstMapHeader->AddAction(new QChangeEvent(), new QAjaxAction('lstTramorField_Change'));
	    $this->lstMapHeaderArray[] = $lstMapHeader;
	    if ($strName && $lstMapHeader->SelectedValue) {
	      $this->arrTracmorField[$intId] = strtolower($lstMapHeader->SelectedValue);
	    }
	    return true;
	  }

	  protected function lstTramorField_Change($strFormId, $strControlId, $strParameter) {
      $objControl = QForm::GetControl($strControlId);
      if ($objControl->SelectedValue != null) {
        $search = strtolower($objControl->SelectedValue);
        if ($this->in_array_nocase($search, $this->arrTracmorField)) {
          $objControl->Warning = "This value has already been selected.";
          $objControl->SelectedIndex = 0;
          unset($this->arrTracmorField[substr($objControl->Name, 3)]);
        }
        else {
          $objControl->Warning = "";
          $txtDefault = $this->txtMapDefaultValueArray[substr($objControl->Name, 3)];
          $lstDefault = $this->lstMapDefaultValueArray[substr($objControl->Name, 3)];
          $dtpDefault = $this->dtpDateArray[substr($objControl->Name, 3)];
          $this->arrTracmorField[substr($objControl->Name, 3)] = $search;
          if (substr($objControl->SelectedValue, 0, 6) == "model_" || substr($objControl->SelectedValue, 0, 6) == "asset_") {
            $objCustomField = CustomField::LoadByCustomFieldId(substr($objControl->SelectedValue, 6));
            // type = Text or TextBox
            if ($objCustomField->CustomFieldQtypeId != 2) {
              $txtDefault->Required = $objCustomField->RequiredFlag;
              // If it is a required text field, then assign the default text for a new entity only
  	 					if ($objCustomField->RequiredFlag && $objCustomField->DefaultCustomFieldValueId) {
  	 						$txtDefault->Text = $objCustomField->DefaultCustomFieldValue->ShortDescription;
  	 					}
  	 					else {
  	 					  $txtDefault->Text = "";
  	 					}
              $txtDefault->Display = true;
              $lstDefault->Display = false;
              $dtpDefault->Display = false;
            }
            // type = Select
            else {
              $lstDefault->RemoveAllItems();
  						$lstDefault->AddItem('- Select One -', null);
  						$lstDefault->Required = $objCustomField->RequiredFlag;

  						$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId(substr($objControl->SelectedValue, 6), QQ::Clause(QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription)));
  						if ($objCustomFieldValueArray) {
                foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
  								$objListItem = new QListItem($objCustomFieldValue->__toString(), $objCustomFieldValue->CustomFieldValueId);
  								// If it is a required field, then select the value on new entities by default
  								if ($objCustomField->RequiredFlag && $objCustomField->DefaultCustomFieldValueId && $objCustomField->DefaultCustomFieldValueId == $objCustomFieldValue->CustomFieldValueId) {
  									$objListItem->Selected = true;
  								}
								  $lstDefault->AddItem($objListItem);
  							}
  						}

  						$txtDefault->Display = false;
              $lstDefault->Display = true;
              $dtpDefault->Display = false;
            }
          }
          elseif ($objControl->SelectedValue == "Created By" || $objControl->SelectedValue == "Modified By") {
            $lstDefault->RemoveAllItems();
            foreach ($this->intUserArray as $strUsername => $intUserId) {
              $objListItem = new QListItem($strUsername, $intUserId, ($intUserId != $_SESSION['intUserAccountId']) ? false : true);
              $lstDefault->AddItem($objListItem);
            }
            $txtDefault->Display = false;
            $lstDefault->Display = true;
            $dtpDefault->Display = false;
          }
          elseif ($objControl->SelectedValue == "Created Date" || $objControl->SelectedValue == "Modified Date") {
            $txtDefault->Display = false;
            $lstDefault->Display = false;
            $dtpDefault->Display = true;
          }
          else {
            $txtDefault->Display = true;
            $lstDefault->Display = false;
            $dtpDefault->Display = false;
          }
        }
      }
      else {
        unset($this->arrTracmorField[substr($objControl->Name, 3)]);
      }
	  }

	  protected function GetCsvSettings() {
	    switch ($this->lstFieldSeparator->SelectedValue) {
	      case 1:
          $strSeparator = ",";
          break;
	      case 2:
	        $strSeparator = "\t";
	        break;
	      default:
	        $strSeparator = $this->txtFieldSeparator->Text;
	        break;
	    }
	    switch ($this->lstTextDelimiter->SelectedValue) {
	      case 1:
          $strDelimiter = null;
          break;
	      case 2:
	        $strDelimiter = "'";
	        break;
	      case 3:
	        $strDelimiter = '"';
	        break;
	      default:
	        $strDelimiter = $this->txtTextDelimiter->Text;
	        break;
	    }
	    return $settings = array(
              'delimiter' => $strSeparator,
              'eol' => ";",
              'length' => null,
              'escape' => $strDelimiter
             );
	  }

    protected function DisplayStepForm($intStep) {
      switch ($intStep) {
       case 1:
         $this->pnlMain->RemoveChildControls($this->pnlMain);
		     $this->pnlStepOne_Create();
		     break;
		   case 2:
		     $this->pnlMain->RemoveChildControls($this->pnlMain);
		     $this->pnlStepTwo_Create();
		     break;
		   case 3:
		     $this->pnlMain->RemoveChildControls($this->pnlMain);
		     $this->pnlStepThree_Create();
		     break;
		   case 4:
		     $this->DisplayStepForm(1);
		     $this->intStep = 1;
		     break;
      }
    }

		// Cancel button click action
		protected function btnCancel_Click() {
		  $this->UndoImport();
      QApplication::Redirect("./asset_import.php");
    }

    protected function btnImportMore_Click() {
      QApplication::Redirect("./asset_import.php");
    }

    protected function btnReturnToAssets_Click() {
      QApplication::Redirect("../assets/asset_list.php");
    }

    // Delete All imported Assets, Asset Models, Manufacturers, Categories and Locations
    protected function UndoImport() {
      $objDatabase = Asset::GetDatabase();
		  if (count($this->objNewAssetArray)) {
        $strQuery = sprintf("DELETE FROM `asset` WHERE `asset_id` IN (%s)", implode(", ", array_keys($this->objNewAssetArray)));
        $objDatabase->NonQuery($strQuery);
		  }
		  if (count($this->objNewAssetModelArray)) {
        $strQuery = sprintf("DELETE FROM `asset_model` WHERE `asset_model_id` IN (%s)", implode(", ", array_keys($this->objNewAssetModelArray)));
        $objDatabase->NonQuery($strQuery);
		  }
		  if (count($this->objNewManufacturerArray)) {
        $strQuery = sprintf("DELETE FROM `manufacturer` WHERE `manufacturer_id` IN (%s)", implode(", ", array_keys($this->objNewManufacturerArray)));
        $objDatabase->NonQuery($strQuery);
		  }
		  if (count($this->objNewCategoryArray)) {
        $strQuery = sprintf("DELETE FROM `category` WHERE `category_id` IN (%s)", implode(", ", array_keys($this->objNewCategoryArray)));
        $objDatabase->NonQuery($strQuery);
		  }
		  if (count($this->objNewLocationArray)) {
        $strQuery = sprintf("DELETE FROM `location` WHERE `location_id` IN (%s)", implode(", ", array_keys($this->objNewLocationArray)));
        $objDatabase->NonQuery($strQuery);
		  }
    }

    protected function PutSkippedRecordInFile ($file, $strRowArray) {
      fputcsv($file, $strRowArray, $this->FileCsvData->settings['delimiter'], $this->FileCsvData->settings['eol']);
    }

	}
	// Go ahead and run this form object to generate the page
	AdminLabelsForm::Run('AdminLabelsForm', 'asset_import.tpl.php');
?>