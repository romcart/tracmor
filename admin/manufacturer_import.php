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
		protected $lstImportAction;
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
		protected $arrItemCustomField;
		protected $arrTracmorField;
		protected $dtgManufacturer;
		protected $objNewManufacturerArray;
		protected $dtgLocation;
		protected $objNewLocationArray;
		protected $arrOldItemArray;
		protected $dtgUpdatedItems;
		protected $objUpdatedItemArray;
		protected $blnImportEnd;
		protected $intImportStep;
		protected $intLocationKey;
    protected $intManufacturerKey;
    protected $intManufacturerDescriptionKey;
    protected $intCreatedByKey;
    protected $intCreatedDateKey;
    protected $intModifiedByKey;
    protected $intModifiedDateKey;
    protected $intItemIdKey;
    protected $intUserArray;
    protected $lblImportSuccess;
    protected $intSkippedRecordCount;
    protected $strFilePath;
    protected $btnUndoLastImport;
    protected $btnImportMore;
    protected $btnReturnTo;
    protected $objDatabase;
    protected $btnRemoveArray;
    protected $intTotalCount;
    protected $intCurrentFile;
    protected $strSelectedValueArray;
    protected $lblImportResults;
    protected $lblImportUpdatedItems;
    protected $lblImportCategories;
    protected $lblImportManufacturers;
    protected $lblImportLocations;

		protected function Form_Create() {
			if (QApplication::QueryString('intDownloadCsv')) {
        $this->RenderBegin(false);

  			session_cache_limiter('must-revalidate');    // force a "no cache" effect
        header("Pragma: hack"); // IE chokes on "no cache", so set to something, anything, else.
        $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT";
        header($ExpStr);
        header('Content-Type: text/csv');
  			header('Content-Disposition: csv; filename=skipped_records.csv');

        $file = fopen(sprintf("%s%s/%s_manufacturer_skipped.csv", __DOCROOT__ . __SUBDIRECTORY__, __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "r");
        ob_end_clean();
        while ($row = fgets($file, 1000)) {
          print $row;
          @ob_flush();
  				flush();
        }

        QApplication::$JavaScriptArray = array();
  			QApplication::$JavaScriptArrayHighPriority = array();
  			$this->RenderEnd(false);
  			exit();
      }
      // Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->pnlMain_Create();
			$this->pnlStepOne_Create();
			$this->Buttons_Create();
			$this->intStep = 1;
			$this->intSkippedRecordCount = 0;
			$this->blnImportEnd = true;
			$this->btnRemoveArray = array();
			$this->arrItemCustomField = array();
      $this->Labels_Create();
			$this->objDatabase = Asset::GetDatabase();
			// Load Custom Field
			foreach (CustomField::LoadArrayByActiveFlagEntity(1, EntityQtype::Manufacturer) as $objCustomField) {
			  $this->arrItemCustomField[$objCustomField->CustomFieldId] = $objCustomField;
			}
			/*$this->arrAssetModelCustomField = array();
			// Load Asset Model Custom Field
			foreach (CustomField::LoadArrayByActiveFlagEntity(1, 4) as $objCustomField) {
			  $this->arrAssetModelCustomField[$objCustomField->CustomFieldId] = $objCustomField;
			}*/
			$this->intUserArray = array();
			// Load Users
			foreach (UserAccount::LoadAll() as $objUser) {
			  $this->intUserArray[strtolower($objUser->Username)] = $objUser->UserAccountId;
			}
			$this->strAcceptibleMimeArray = array(
						'text/plain' => 'txt',
						'text/comma-separated-values' => 'csv',
						'text/csv' => 'csv',
						'text/x-comma-separated-values' => 'csv',
  				  'application/vnd.ms-excel' => 'csv',
  				  'application/csv' => 'csv',
  				  'text/x-csv' => 'csv');
		}

		protected function Form_PreRender() {

			/*if ($this->dtgLocation && count($this->objNewLocationArray) > 0 && $this->dtgLocation->Paginator) {
				$this->dtgLocation->TotalItemCount = count($this->objNewLocationArray);
      	$this->dtgLocation->DataSource = $this->return_array_chunk($this->dtgLocation, $this->objNewLocationArray);
			}*/

			if ($this->dtgManufacturer && count($this->objNewManufacturerArray) > 0 && $this->dtgManufacturer->Paginator) {
				$this->dtgManufacturer->TotalItemCount = count($this->objNewManufacturerArray);
      	$this->dtgManufacturer->DataSource = $this->return_array_chunk($this->dtgManufacturer, $this->objNewManufacturerArray);
			}

			if ($this->dtgUpdatedItems && count($this->objUpdatedItemArray) > 0 && $this->dtgUpdatedItems->Paginator) {
				$this->dtgUpdatedItems->TotalItemCount = count($this->objUpdatedItemArray);
      	$this->dtgUpdatedItems->DataSource = $this->return_array_chunk($this->dtgUpdatedItems, $this->objUpdatedItemArray);
			}

		}

    // Create labels
    protected function Labels_Create() {
      $this->lblImportResults = new QLabel($this);
      $this->lblImportResults->HtmlEntities = false;
      $this->lblImportResults->Display = false;
      $this->lblImportResults->CssClass = "title";
      $this->lblImportResults->Text = "Import Results<br/><br/>";

      $this->lblImportUpdatedItems = new QLabel($this);
      $this->lblImportUpdatedItems->HtmlEntities = false;
      $this->lblImportUpdatedItems->Display = false;
      $this->lblImportUpdatedItems->CssClass = "title";
      $this->lblImportUpdatedItems->Text = "Last Updated Categories";

      $this->lblImportManufacturers = new QLabel($this);
      $this->lblImportManufacturers->HtmlEntities = false;
      $this->lblImportManufacturers->Display = false;
      $this->lblImportManufacturers->CssClass = "title";
      $this->lblImportManufacturers->Text = "<br/><br/>Last Imported Manufacturers";

/*
      $this->lblImportLocations = new QLabel($this);
      $this->lblImportLocations->Display = false;
      $this->lblImportLocations->CssClass = "title";
      $this->lblImportLocations->Text = "Last Imported Locations";*/
    }

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		// Main Panel
		protected function pnlMain_Create() {
		  $this->pnlMain = new QPanel($this);
		  $this->pnlMain->AutoRenderChildren = true;
		}

		// Step 1 Panel
		protected function pnlStepOne_Create() {
			$this->pnlStepOne = new QPanel($this->pnlMain);
      $this->pnlStepOne->Template = "manufacturer_import_pnl_step1.tpl.php";

			// Step 1
			$this->lstFieldSeparator = new QRadioButtonList($this->pnlStepOne);
			$this->lstFieldSeparator->Name = "Field Separator: ";
			$this->lstFieldSeparator->Width = 150;
			$this->lstFieldSeparator->AddItem(new QListItem('Comma Separated', 1));
			$this->lstFieldSeparator->AddItem(new QListItem('Tab Separated', 2));
			$this->lstFieldSeparator->AddItem(new QListItem('Other', 'other'));
			$this->lstFieldSeparator->SelectedIndex = 0;
			$this->lstFieldSeparator->AddAction(new QChangeEvent(), new QAjaxAction('lstFieldSeparator_Change'));
			$this->txtFieldSeparator = new QTextBox($this->pnlStepOne);
			$this->txtFieldSeparator->Width = 50;
			$this->txtFieldSeparator->SetCustomStyle('margin-left', '26px');
			$this->txtFieldSeparator->MaxLength = 1;
			$this->txtFieldSeparator->Display = false;
			$this->lstTextDelimiter = new QListBox($this->pnlStepOne);
			$this->lstTextDelimiter->Name = "Text Delimiter: ";
			$this->lstTextDelimiter->Width = 170;
			$this->lstTextDelimiter->AddItem(new QListItem('None', 1));
			$this->lstTextDelimiter->AddItem(new QListItem('Single Quote (\')', 2));
			$this->lstTextDelimiter->AddItem(new QListItem('Double Quote (")', 3));
			$this->lstTextDelimiter->AddItem(new QListItem('Other', 'other'));
			$this->lstTextDelimiter->AddAction(new QChangeEvent(), new QAjaxAction('lstTextDelimiter_Change'));
			$this->txtTextDelimiter = new QTextBox($this->pnlStepOne);
			$this->txtTextDelimiter->Name = 'Other: ';
			$this->txtTextDelimiter->Width = 50;
			$this->txtTextDelimiter->MaxLength = 1;
			$this->txtTextDelimiter->Display = false;
			$this->flcFileCsv = new QFileControlExt($this->pnlStepOne);
			$this->flcFileCsv->Name = "Select File: ";
			$this->chkHeaderRow = new QCheckBox($this->pnlStepOne);
			$this->chkHeaderRow->Name = "Header Row: ";
			$this->lstImportAction = new QRadioButtonList($this->pnlStepOne);
			$this->lstImportAction->Name = "Action Import: ";
			$this->lstImportAction->Width = 150;
			$this->lstImportAction->AddItem(new QListItem('Create Records', 1));
			$this->lstImportAction->AddItem(new QListItem('Create and Update Records', 2));
			$this->lstImportAction->SelectedIndex = 0;
    }


    // Step 2 Panel
    protected function pnlStepTwo_Create() {
			$this->pnlStepTwo = new QPanel($this->pnlMain);
      $this->pnlStepTwo->Template = "manufacturer_import_pnl_step2.tpl.php";
    }

    // Step 3 Panel
    protected function pnlStepThree_Create() {
			$this->pnlStepThree = new QPanel($this->pnlMain);
      $this->pnlStepThree->Template = "manufacturer_import_pnl_step3.tpl.php";
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
			$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QEnterKeyEvent(), new QServerAction('btnCancel_Click'));
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
    				//throw new QCallerException('FileAssetType must be a valid QFileAssetType constant value');
    				$this->flcFileCsv->Warning = 'The file could not be uploaded. Please provide a valid file.';
    				$blnError = true;
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
    			}
    			if (!$blnError) {
    			  $this->FileCsvData = new File_CSV_DataSource();
    			  // Setup the settings which have got on step 1
    			  $this->FileCsvData->settings($this->GetCsvSettings());
    			  $file = fopen($this->flcFileCsv->File, "r");
            // Counter of files
            $i=1;
            // Counter of rows
            $j=1;
            $this->strFilePathArray = array();
            // The uploaded file splits up in order to avoid out of memory
            while ($row = fgets($file, 1000)) {
              if ($j == 1) {
                $strFilePath = sprintf('%s/%s_man_%s.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId'], $i);
                $this->strFilePathArray[] = $strFilePath;
                $file_part = fopen($strFilePath, "w+");
                if ($i == 1) {
                  $strHeaderRow = $row;
                }
                else {
                  fwrite($file_part, $strHeaderRow);
                }
              }

              fwrite($file_part, $row);
              $j++;
              if ($j > 200) {
                $j = 1;
                $i++;
                fclose($file_part);
              }
            }
            $this->intTotalCount = ($i-1)*200 + $j-1;
            if (true && QApplication::$TracmorSettings->AssetLimit != null && QApplication::$TracmorSettings->AssetLimit < ($this->intTotalCount + Asset::CountAll())) {
              $blnError = true;
              $this->btnNext->Warning = $i . " " . $j . "Sorry that is too many assets. Your asset limit is = " . QApplication::$TracmorSettings->AssetLimit . ", this import has " . ($this->intTotalCount) . " assets, and you already have " . Asset::CountAll() . " assets in the database.";
            }
            else {
              $this->arrMapFields = array();
              $this->arrTracmorField = array();
              // Load first file
              $this->FileCsvData->load($this->strFilePathArray[0]);
              $file_skipped = fopen($this->strFilePath = sprintf('%s/%s_manufacturer_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "w+");
              // Get Headers
              if ($this->blnHeaderRow) {
                $this->arrCsvHeader = $this->FileCsvData->getHeaders();
                // Create the header row in the skipped error file
                $this->PutSkippedRecordInFile($file_skipped, $this->arrCsvHeader);
              }
              /*else {
                // If it is not first file
                $this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
              }*/
              $strFirstRowArray = $this->FileCsvData->getRow(0);
              for ($i=0; $i<count($strFirstRowArray); $i++) {
                $this->arrMapFields[$i] = array();
                if ($this->blnHeaderRow && array_key_exists($i, $this->arrCsvHeader)) {
                	if ($this->arrCsvHeader[$i] == '') {
                		$this->arrCsvHeader[$i] = ' ';
                	}
                  $this->lstMapHeader_Create($this, $i, $this->arrCsvHeader[$i]);
                  $this->arrMapFields[$i]['header'] = $this->arrCsvHeader[$i];
                }
                else {
                  $this->lstMapHeader_Create($this, $i);
                }
                // Create Default Value TextBox, ListBox and DateTimePicker
                if ($this->blnHeaderRow && array_key_exists($i, $this->arrCsvHeader) && $this->arrCsvHeader[$i] || !$this->blnHeaderRow) {
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

                	if (array_key_exists($i, $this->lstMapHeaderArray)) {
                  	$this->lstTramorField_Change(null, $this->lstMapHeaderArray[$i]->ControlId, null);
                	}
                }
                $this->arrMapFields[$i]['row1'] = $strFirstRowArray[$i];
              }
              $this->btnNext->Text = "Import Now";
              fclose($file_skipped);
              // Create Add Field button
              $btnAddField = new QButton($this);
              $btnAddField->Text = "Add Field";
              $btnAddField->AddAction(new QClickEvent(), new QServerAction('btnAddField_Click'));
              $btnAddField->AddAction(new QEnterKeyEvent(), new QServerAction('btnAddField_Click'));
              $btnAddField->AddAction(new QEnterKeyEvent(), new QTerminateAction());
              $this->lstMapHeaderArray[] = $btnAddField;
            }
    			}
		    }
		  }
		  elseif ($this->intStep == 2) {
		    // Step 2 complete
		    $blnError = false;
        /*$blnLocation = false;
        */
        $blnManufacturer = false;
        $blnManufacturerId = false;
        //$blnManufacturer = false;
        for ($i=0; $i < count($this->lstMapHeaderArray)-1; $i++) {
          $lstMapHeader = $this->lstMapHeaderArray[$i];
          $strSelectedValue = strtolower($lstMapHeader->SelectedValue);
          /*if ($strSelectedValue == "location") {
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
          else*/if ($strSelectedValue == "manufacturer name") {
            $blnManufacturer = true;
          }
          elseif ($strSelectedValue == "id") {
            $blnManufacturerId = true;
          }
          /*elseif ($strSelectedValue == "manufacturer") {
            $blnManufacturer = true;
          }*/
        }
        if ($this->lstMapDefaultValueArray) {
          // Checking errors for required Default Value text fields
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
          // Checking errors for required Default Value lst fields
          foreach ($this->txtMapDefaultValueArray as $txtDefault) {
            if ($txtDefault->Display && $txtDefault->Required && !$txtDefault->Text) {
              $txtDefault->Warning = "You must enter default value.";
              break;
            }
            else {
              $blnError = false;
              $txtDefault->Warning = "";
            }
          }
        }
        // If all required fields have no errors
        if (!$blnError && $blnManufacturer && ($this->lstImportAction->SelectedValue != 2 || $blnManufacturerId)) {
          $this->btnNext->Warning = "";
          // Setup keys for main required fields
          foreach ($this->arrTracmorField as $key => $value) {
            if ($value == 'manufacturer name') {
              $this->intManufacturerKey = $key;
            }
            elseif ($value == 'manufacturer description') {
              $this->intManufacturerDescriptionKey = $key;
            }
            elseif ($this->lstImportAction->SelectedValue == 2 && $value == 'id') {
              $this->intItemIdKey = $key;
            }
          }
          $this->objNewManufacturerArray = array();
          $this->blnImportEnd = false;
          $j=1;
          /*$strLocationValuesArray = array();*/
          // Add all unique locations in database
          /*
          foreach ($this->strFilePathArray as $strFilePath) {
            $this->FileCsvData->load($strFilePath);
            if ($j != 1) {
              //$this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
            }
            // Location Import
            for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
              $strRowArray = $this->FileCsvData->getRow($i);
              if (trim($strRowArray[$this->intLocationKey]) && !$this->in_array_nocase(trim($strRowArray[$this->intLocationKey]), $strLocationArray)) {
                $strLocationArray[] = trim($strRowArray[$this->intLocationKey]);
                /*$objNewLocation = new Location();
                $objNewLocation->ShortDescription = addslashes(trim($strRowArray[$this->intLocationKey]));
                $objNewLocation->Save();*/
                /*$strLocationValuesArray[] = sprintf("('%s', '%s', NOW())", addslashes(trim($strRowArray[$this->intLocationKey])), $_SESSION['intUserAccountId']);
                $strNewLocation[] = addslashes(trim($strRowArray[$this->intLocationKey]));
                //$this->objNewLocationArray[$objNewLocation->LocationId] = $objNewLocation->ShortDescription;
              }
            }
            $j++;
          }
          if (count($strLocationValuesArray)) {
            $objDatabase = Location::GetDatabase();
            $objDatabase->NonQuery(sprintf("INSERT INTO `location` (`short_description`, `created_by`, `creation_date`) VALUES %s;", implode(", ", $strLocationValuesArray)));
            $intStartId = $objDatabase->InsertId();
            for ($i=0; $i<count($strNewLocation); $i++) {
              $this->objNewLocationArray[$intStartId+$i] = $strNewLocation[$i];
            }
          }*/
          $this->btnNext->RemoveAllActions('onclick');
          // Add new ajax actions for button
          $this->btnNext->AddAction(new QClickEvent(), new QServerAction('btnNext_Click'));
          $this->btnNext->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnNext));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnNext_Click'));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QToggleEnableAction($this->btnNext));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $this->btnNext->Warning = "Please wait...";
          $this->intImportStep = 2;
          $this->intCurrentFile = 0;
          $this->strSelectedValueArray = array();
/*
          // New locations
          $this->dtgLocation = new QDataGrid($this);
          $this->dtgLocation->Name = 'location_list';
      		$this->dtgLocation->CellPadding = 5;
      		$this->dtgLocation->CellSpacing = 0;
      		$this->dtgLocation->CssClass = "datagrid";
          $this->dtgLocation->UseAjax = true;
          $this->dtgLocation->ShowColumnToggle = false;
          $this->dtgLocation->ShowExportCsv = false;
          $this->dtgLocation->ShowHeader = false;
          $this->dtgLocation->AddColumn(new QDataGridColumnExt('Location', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));*/

          // New manufacturers
          $this->dtgManufacturer = new QDataGrid($this);
          $this->dtgManufacturer->Name = 'manufacturer_list';
      		$this->dtgManufacturer->CellPadding = 5;
      		$this->dtgManufacturer->CellSpacing = 0;
      		$this->dtgManufacturer->CssClass = "datagrid";
          $this->dtgManufacturer->UseAjax = true;
          $this->dtgManufacturer->ShowColumnToggle = false;
          $this->dtgManufacturer->ShowExportCsv = false;
          $this->dtgManufacturer->ShowHeader = false;
          $this->dtgManufacturer->AddColumn(new QDataGridColumnExt('Manufacturer', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));

          // Updated categories
          $this->dtgUpdatedItems = new QDataGrid($this);
          $this->dtgUpdatedItems->Name = 'updated_manufacturer_list';
      		$this->dtgUpdatedItems->CellPadding = 5;
      		$this->dtgUpdatedItems->CellSpacing = 0;
      		$this->dtgUpdatedItems->CssClass = "datagrid";
          $this->dtgUpdatedItems->UseAjax = true;
          $this->dtgUpdatedItems->ShowColumnToggle = false;
          $this->dtgUpdatedItems->ShowExportCsv = false;
          $this->dtgUpdatedItems->ShowHeader = false;
          $this->dtgUpdatedItems->AddColumn(new QDataGridColumnExt('manufacturer name', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));

          // Create the label for successful import
          $this->lblImportSuccess = new QLabel($this);
        	$this->lblImportSuccess->HtmlEntities = false;
        	$this->lblImportSuccess->Display = false;

        	// Undo Last Import button
        	$this->btnUndoLastImport = new QButton($this);
        	$this->btnUndoLastImport->Text = "Undo Last Import";
        	$this->btnUndoLastImport->Display = false;
        	$this->btnUndoLastImport->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
    			$this->btnUndoLastImport->AddAction(new QEnterKeyEvent(), new QServerAction('btnCancel_Click'));
    			$this->btnUndoLastImport->AddAction(new QEnterKeyEvent(), new QTerminateAction());

    			// Import More button
    			$this->btnImportMore = new QButton($this);
        	$this->btnImportMore->Text = "Import More";
        	$this->btnImportMore->Display = false;
        	$this->btnImportMore->AddAction(new QClickEvent(), new QServerAction('btnImportMore_Click'));
    			$this->btnImportMore->AddAction(new QEnterKeyEvent(), new QServerAction('btnImportMore_Click'));
    			$this->btnImportMore->AddAction(new QEnterKeyEvent(), new QTerminateAction());

    			// Return to Assets button
    			$this->btnReturnTo = new QButton($this);
        	$this->btnReturnTo->Text = "Return to Manufacturers";
        	$this->btnReturnTo->Display = false;
        	$this->btnReturnTo->AddAction(new QClickEvent(), new QServerAction('btnReturnTo_Click'));
    			$this->btnReturnTo->AddAction(new QEnterKeyEvent(), new QServerAction('btnReturnTo_Click'));
    			$this->btnReturnTo->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        }
        else {
          $this->btnNext->Warning = "You must select all required fields.";
          $blnError = true;
        }
		  }
		  else {
		    // Step 3 complete
		    set_time_limit(0);
		    $file_skipped = fopen($strFilePath = sprintf('%s/%s_manufacturer_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "a");
		    if (!$this->blnImportEnd) {
		      if ($this->intImportStep == 2) {
            $strManufacturerArray = array();
            $this->objNewManufacturerArray = array();
            // Load all manufacturers
            foreach (Manufacturer::LoadAll() as $objManufacturer) {
              $strManufacturerArray[] = stripslashes($objManufacturer->ShortDescription);
            }
            $txtDefaultValue = trim($this->txtMapDefaultValueArray[$this->intManufacturerKey]->Text);
            // Add Default Value
            if ($txtDefaultValue && !$this->in_array_nocase($txtDefaultValue, $strManufacturerArray)) {
              $strManufacturerArray[] = $txtDefaultValue;
              $objNewManufacturer = new Manufacturer();
              $objNewManufacturer->ShortDescription = addslashes($txtDefaultValue);
              $objNewManufacturer->Save();
              $this->objNewManufacturerArray[$objNewManufacturer->ManufacturerId] = $objNewManufacturer->ShortDescription;
            }
            $this->btnNext->Warning = "Manufacturers have been imported. Please wait...";
          }

          for ($j=$this->intCurrentFile; $j<count($this->strFilePathArray); $j++) {
            $this->FileCsvData->load($this->strFilePathArray[$j]);
            if (!$j) {
              //$this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
            }
            // Manufacturer Import
            if ($this->intImportStep == 2) {
              $arrItemCustomField = array();
              foreach ($this->arrTracmorField as $key => $value) {
                if (substr($value, 0, 13) == 'manufacturer_') {
                  $intItemCustomFieldKeyArray[substr($value, 13)] = $key;
                  if (array_key_exists(substr($value, 13), $this->arrItemCustomField)) {
                  	$arrItemCustomField[substr($value, 13)] = $this->arrItemCustomField[substr($value, 13)];
                  }
                }
              }
              $strManufacturerValuesArray = array();
              $strUpdatedManufacturerValuesArray = array();
              $strItemCFVArray = array();
              $strUpdatedItemCFVArray = array();
              $strNewManufacturerArray = array();
              $intManufacturerArray = array();
              $this->arrOldItemArray = array();
              $this->objUpdatedItemArray = array();
              $objManufacturerArray = array();
              foreach (Manufacturer::LoadAllWithCustomFieldsHelper() as $objManufacturer) {
                $objManufacturerArray[strtolower($objManufacturer->ShortDescription)] = $objManufacturer;
              }
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                $objManufacturer = null;
                if ($this->lstImportAction->SelectedValue == 2) {
                  $intItemId = intval(trim($strRowArray[$this->intItemIdKey]));
                  foreach ($objManufacturerArray as $objItem) {
                    if ($objItem->ManufacturerId == $intItemId) {
                      $objManufacturer = $objItem;
                      break;
                    }
                  }
                }
                else {
                  $intItemId = 0;
                }
                // Create action
                if (trim($strRowArray[$this->intManufacturerKey]) && (!$intItemId || !$objManufacturer) && !$this->in_array_nocase(trim($strRowArray[$this->intManufacturerKey]), $strManufacturerArray)) {
                  $strManufacturerArray[] = trim($strRowArray[$this->intManufacturerKey]);
                  $strManufacturerDescription = "";
                  if (isset($this->intManufacturerDescriptionKey))
                    if (trim($strRowArray[$this->intManufacturerDescriptionKey]))
                      $strManufacturerDescription = trim($strRowArray[$this->intManufacturerDescriptionKey]);
                    else
                      $strManufacturerDescription = (isset($this->txtMapDefaultValueArray[$this->intManufacturerDescriptionKey])) ? trim($this->txtMapDefaultValueArray[$this->intManufacturerDescriptionKey]->Text) : '';
                  $strManufacturerValuesArray[] = sprintf("('%s', '%s', '%s', NOW())", addslashes(trim($strRowArray[$this->intManufacturerKey])), addslashes($strManufacturerDescription), $_SESSION['intUserAccountId']);
                  $strNewManufacturerArray[] = addslashes(trim($strRowArray[$this->intManufacturerKey]));

                  $strCFVArray = array();
                  // Custom Field import
                  foreach ($arrItemCustomField as $objCustomField) {
                    if ($objCustomField->CustomFieldQtypeId != 2) {
                     	 $strShortDescription = (trim($strRowArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]])) ? addslashes(trim($strRowArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]])) : addslashes($this->txtMapDefaultValueArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]->Text);
                      $strCFVArray[$objCustomField->CustomFieldId] = ($strShortDescription) ? sprintf("'%s'", $strShortDescription) : "NULL";
                    }
                        else {
                        	$objDatabase = CustomField::GetDatabase();
                          $strShortDescription = addslashes(trim($strRowArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]));
                          $blnInList = false;
                          foreach (CustomFieldValue::LoadArrayByCustomFieldId($objCustomField->CustomFieldId) as $objCustomFieldValue) {
                					  if (strtolower($objCustomFieldValue->ShortDescription) == strtolower($strShortDescription)) {
                    					$blnInList = true;
                    					break;
                					  }
                					}
                					// Add the CustomFieldValue
                					if (!$blnInList && !in_array($strShortDescription, $strAddedCFVArray)) {
                						$strQuery = sprintf("INSERT INTO custom_field_value (custom_field_id, short_description, created_by, creation_date) VALUES (%s, '%s', %s, NOW());", $objCustomField->CustomFieldId, $strShortDescription, $_SESSION['intUserAccountId']);
                						$objDatabase->NonQuery($strQuery);
                						$strAddedCFVArray[] = $strShortDescription;
                					}
                					elseif (!$blnInList && $this->lstMapDefaultValueArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedValue != null) {
                            $strShortDescription = $this->lstMapDefaultValueArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedName;
                 					}
                          if ($strShortDescription/* && $intCustomFieldValueId*/) {
                            $strCFVArray[$objCustomField->CustomFieldId] = sprintf("'%s'", $strShortDescription);
                          }
                          else {
                            $strCFVArray[$objCustomField->CustomFieldId] = "NULL";
                          }
                        }
                 }
                 if (count($strCFVArray)) {
                   $strItemCFVArray[] = implode(', ', $strCFVArray);
                 }
                 else {
                   $strItemCFVArray[] = "";
                 }

                }
                // Update action
                elseif (trim($strRowArray[$this->intManufacturerKey]) && $this->lstImportAction->SelectedValue == 2  && !$this->in_array_nocase(trim($strRowArray[$this->intManufacturerKey]), $this->objUpdatedItemArray) && $objManufacturer) {
                  if (!$blnError) {
                    $strManufacturerDescription = "";
                    if (isset($this->intManufacturerDescriptionKey))
                      if (trim($strRowArray[$this->intManufacturerDescriptionKey]))
                        $strManufacturerDescription = trim($strRowArray[$this->intManufacturerDescriptionKey]);
                      else
                        $strManufacturerDescription = (isset($this->txtMapDefaultValueArray[$this->intManufacturerDescriptionKey])) ? trim($this->txtMapDefaultValueArray[$this->intManufacturerDescriptionKey]->Text) : '';
                    $this->arrOldItemArray[$objManufacturer->ManufacturerId] = $objManufacturer;
                    $strUpdatedManufacturerValuesArray[] = sprintf("UPDATE `manufacturer` SET `short_description`='%s', `long_description`='%s' WHERE `manufacturer_id`='%s'", addslashes(trim($strRowArray[$this->intManufacturerKey])), addslashes($strManufacturerDescription), $objManufacturer->ManufacturerId);
                    $this->objUpdatedItemArray[$objManufacturer->ManufacturerId] = $objManufacturer->ShortDescription;

                    foreach ($arrItemCustomField as $objCustomField) {
                      if ($objCustomField->CustomFieldQtypeId != 2) {
                       	$strShortDescription = (trim($strRowArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]])) ? addslashes(trim($strRowArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]])) : addslashes($this->txtMapDefaultValueArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]->Text);
                              $strCFVArray[$objCustomField->CustomFieldId] = ($strShortDescription) ? sprintf("'%s'", $strShortDescription) : "NULL";
                            }
                      else {
                       	$objDatabase = CustomField::GetDatabase();
                        $strShortDescription = addslashes(trim($strRowArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]));
                        $strCFVArray[$objCustomField->CustomFieldId] = ($strShortDescription) ? sprintf("'%s'", $strShortDescription) : "NULL";
                        $blnInList = false;
                        foreach (CustomFieldValue::LoadArrayByCustomFieldId($objCustomField->CustomFieldId) as $objCustomFieldValue) {
                    	    if (strtolower($objCustomFieldValue->ShortDescription) == strtolower($strShortDescription)) {
                         		//$intItemKeyntCustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
                        		$blnInList = true;
                        		break;
                    			}
                    		}
                    		// Add the CustomFieldValue
                    		if (!$blnInList && !in_array($strShortDescription, $strAddedCFVArray)) {
                    			$strQuery = sprintf("INSERT INTO custom_field_value (custom_field_id, short_description, created_by, creation_date) VALUES (%s, '%s', %s, NOW());", $objCustomField->CustomFieldId, $strShortDescription, $_SESSION['intUserAccountId']);
                    			$objDatabase->NonQuery($strQuery);
                    			$strAddedCFVArray[] = $strShortDescription;
                    		}
                    		elseif (!$blnInList && $this->lstMapDefaultValueArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedValue != null) {
                                $strShortDescription = $this->lstMapDefaultValueArray[$intItemCustomFieldKeyArray[$objCustomField->CustomFieldId]]->SelectedName;
               					}
                        if ($strShortDescription) {
                          $strCFVArray[$objCustomField->CustomFieldId] = sprintf("'%s'", $strShortDescription);
                        }
                        else {
                          $strCFVArray[$objCustomField->CustomFieldId] = "NULL";
                        }
                      }
                      if (count($strCFVArray)) {
                        $strUpdatedItemCFVArray[$objManufacturer->ManufacturerId] = $strCFVArray;
                      }
                      else {
                        $strUpdatedItemCFVArray[$intItemId] = "";
                      }
                    }
                  }
                  else {
                    $this->intSkippedRecordCount++;
                    $this->PutSkippedRecordInFile($file_skipped, $strRowArray);
                  }
                }
                else {
                  $this->intSkippedRecordCount++;
                  $this->PutSkippedRecordInFile($file_skipped, $strRowArray);
                }
              }

              if (count($strManufacturerValuesArray)) {
                $objDatabase = Manufacturer::GetDatabase();
                $objDatabase->NonQuery(sprintf("INSERT INTO `manufacturer` (`short_description`, `long_description`, `created_by`, `creation_date`) VALUES %s;", implode(", ", $strManufacturerValuesArray)));
                $intStartId = $objDatabase->InsertId();
                $strItemIdArray = array();
                for ($i=0; $i<count($strNewManufacturerArray); $i++) {
                  $this->objNewManufacturerArray[$intStartId+$i] = $strNewManufacturerArray[$i];
                  $objDatabase = CustomField::GetDatabase();
                  $strItemCFVArray[$i] = sprintf("('%s', %s)", $intStartId+$i, $strItemCFVArray[$i]);
                  $strItemIdArray[$i] = sprintf("(%s)", $intStartId+$i);
                }

                $strCFVNameArray = array();
                foreach ($arrItemCustomField as $objCustomField) {
                  $strCFVNameArray[] = sprintf("`cfv_%s`", $objCustomField->CustomFieldId);
                }
                if (count($strItemCFVArray) > 0 && count($strCFVNameArray) > 0)  {
                	$strQuery = sprintf("INSERT INTO `manufacturer_custom_field_helper` (`manufacturer_id`, %s) VALUES %s", implode(", ", $strCFVNameArray), implode(", ", $strItemCFVArray));
                } else {
                	$strQuery = sprintf("INSERT INTO `manufacturer_custom_field_helper` (`manufacturer_id`) VALUES %s", implode(", ", $strItemIdArray));
                }
                $objDatabase->NonQuery($strQuery);
              }
              if (count($strUpdatedManufacturerValuesArray)) {
                $objDatabase = Manufacturer::GetDatabase();
                foreach ($strUpdatedManufacturerValuesArray as $query) {
                  $objDatabase->NonQuery($query);
                }
                foreach ($this->objUpdatedItemArray as $intItemKey => $objUpdatedItem) {
                  if (isset($strUpdatedItemCFVArray[$intItemKey]) && count($strUpdatedItemCFVArray[$intItemKey])) {
                    $strCFVArray = array();
                    foreach ($arrItemCustomField as $objCustomField) {
                      $strCFVArray[] = sprintf("`cfv_%s`=%s", $objCustomField->CustomFieldId, $strUpdatedItemCFVArray[$intItemKey][$objCustomField->CustomFieldId]);
                    }
                    if (count($strCFVArray)) {
                      $strQuery = sprintf("UPDATE `manufacturer_custom_field_helper` SET %s WHERE `manufacturer_id`='%s'", implode(", ", $strCFVArray), $intItemKey);
                      $objDatabase->NonQuery($strQuery);
                    }
                  }
                }
              }
            }
          }
          if ($this->intImportStep == 6) {
            /*if (count($this->strSelectedValueArray)) {
              $objDatabase = CustomField::GetDatabase();
              $strQuery = sprintf("INSERT INTO `custom_field_selection` " .
                                  "(`entity_id`,`entity_qtype_id`, `custom_field_value_id`) " .
                                  "VALUES %s;", implode(", ", $this->strSelectedValueArray));
              $objDatabase->NonQuery($strQuery);
            }*/
            $this->blnImportEnd = true;
            $this->btnNext->Warning = "";


            $this->lblImportResults->Display = true;
            if (count($this->objUpdatedItemArray)) {
              $this->lblImportUpdatedItems->Display = true;
              $this->dtgUpdatedItems->Paginator = new QPaginator($this->dtgUpdatedItems);
              $this->dtgUpdatedItems->ItemsPerPage = 20;

            }

            if (count($this->objNewManufacturerArray)) {
              $this->lblImportManufacturers->Display = true;
              $this->dtgManufacturer->Paginator = new QPaginator($this->dtgManufacturer);
              $this->dtgManufacturer->ItemsPerPage = 20;
            }
            /*if (count($this->objNewLocationArray)) {
              $this->lblImportLocations->Display = true;
              $this->dtgLocation->Paginator = new QPaginator($this->dtgLocation);
              $this->dtgLocation->ItemsPerPage = 20;
            }*/
            $this->btnNext->Display = false;
            $this->btnCancel->Display = false;
            $this->btnUndoLastImport->Display = true;
            $this->btnImportMore->Display = true;
            $this->btnReturnTo->Display = true;
            $this->lblImportSuccess->Display = true;
            $this->lblImportSuccess->Text = sprintf("Success:<br/>" .
                                             "<b>%s</b> Records imported successfully<br/>" .
                                             "<b>%s</b> Records skipped due to error<br/>", count($this->objNewManufacturerArray) + count($this->objUpdatedItemArray), $this->intSkippedRecordCount);
            if ($this->intSkippedRecordCount) {
               $this->lblImportSuccess->Text .= sprintf("<a href='./manufacturer_import.php?intDownloadCsv=1'>Click here to download records that could not be imported</a>");
            }
            $this->lblImportSuccess->Text .= "<br/><br/>";
            $this->intImportStep = -1;
          }
          // Enable Next button
          $this->btnNext->Enabled = true;
          if (!$this->blnImportEnd && !$this->intCurrentFile) {
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
        if (!($this->intCurrentFile < count($this->strFilePathArray))) {
          $this->intCurrentFile = 0;
          $this->intImportStep++;
        }
		  }
	  }

	  public function return_array_chunk($dtgDatagrid, $strArray) {
	  	if (count($strArray) > 0) {
		  	$intPageNumber = $dtgDatagrid->Paginator->PageNumber;
		  	$arrChunks = array_chunk($strArray, 20);
		  	$intKey = $intPageNumber-1;
		  	return $arrChunks[$intKey];
	  	} else {
	  		return false;
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
	      $strName = 'abcdefg';
	    }
	    $strName = strtolower($strName);
	    $lstMapHeader = new QListBox($objParentObject);
	    $lstMapHeader->Name = "lst".$intId;
	    $strManufactrerGroup = "Manufacturer";
	    $lstMapHeader->AddItem("- Not Mapped -", null);
	    //$lstMapHeader->AddItem("Location", "Location", ($strName == 'location') ? true : false, $strManufactrerGroup, 'CssClass="redtext"');
	    // Add ID for update imports only
	    if ($this->lstImportAction->SelectedValue == 2) {
	      $lstMapHeader->AddItem("ID", "ID", ($strName == 'id') ? true : false, $strManufactrerGroup, 'CssClass="redtext"');
	    }
	    $lstMapHeader->AddItem("manufacturer name", "manufacturer name", ($strName == 'manufacturer') ? true : false, $strManufactrerGroup, 'CssClass="redtext"');
	    $lstMapHeader->AddItem("manufacturer description", "manufacturer description", ($strName == 'description') ? true : false, $strManufactrerGroup);
	    $lstMapHeader->AddAction(new QChangeEvent(), new QAjaxAction('lstTramorField_Change'));
	    $this->lstMapHeaderArray[] = $lstMapHeader;
	    foreach ($this->arrItemCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "manufacturer_".$objCustomField->CustomFieldId,  ($strName == strtolower($objCustomField->ShortDescription)) ? true : false, $strManufactrerGroup);
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
          if (substr($objControl->SelectedValue, 0, 13) == "manufacturer_") {
            $objCustomField = CustomField::LoadByCustomFieldId(substr($objControl->SelectedValue, 13));
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
  						$lstDefault->Required = true;

  						$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId(substr($objControl->SelectedValue, 13), QQ::Clause(QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription)));
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
          $txtDefault->Display = true;
          $lstDefault->Display = false;
          $dtpDefault->Display = false;
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
	    		$strDelimiter = '"';
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
              'eol' => "\n",
              'length' => 9999,
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
      QApplication::Redirect("./manufacturer_import.php");
    }

    protected function btnImportMore_Click() {
      QApplication::Redirect("./manufacturer_import.php");
    }

    protected function btnReturnTo_Click() {
      QApplication::Redirect("./manufacturer_list.php");
    }

    // Delete All imported
    protected function UndoImport() {
      $objDatabase = Manufacturer::GetDatabase();
      if (isset($this->arrOldItemArray))
        foreach ($this->arrOldItemArray as $intItemId => $objOldItem) {
          $strQuery = sprintf("UPDATE `manufacturer` SET `short_description`='%s', `long_description`='%s' WHERE `manufacturer_id`='%s'", $objOldItem->ShortDescription, $objOldItem->LongDescription, $objOldItem->ManufacturerId);
          $objDatabase->NonQuery($strQuery);
          $strCFVArray = array();
          foreach ($this->arrItemCustomField as $objCustomField) {
            $strCFV = $objOldItem->GetVirtualAttribute($objCustomField->CustomFieldId);
            $strCFVArray[] = sprintf("`cfv_%s`='%s'", $objCustomField->CustomFieldId, $strCFV);
          }
          $strQuery = sprintf("UPDATE `manufacturer_custom_field_helper` SET %s WHERE `manufacturer_id`='%s'", implode(", ", $strCFVArray), $intItemId);
          $objDatabase->NonQuery($strQuery);
      }
		  if (count($this->objNewManufacturerArray)) {
        $strQuery = sprintf("DELETE FROM `manufacturer` WHERE `manufacturer_id` IN (%s)", implode(", ", array_keys($this->objNewManufacturerArray)));
        $objDatabase->NonQuery($strQuery);
		  }
		  //$strQuery = "SET FOREIGN_KEY_CHECKS=1;";
      //$objDatabase->NonQuery($strQuery);
    }

    protected function PutSkippedRecordInFile ($file, $strRowArray) {
      fputcsv($file, $strRowArray, $this->FileCsvData->settings['delimiter'], $this->FileCsvData->settings['escape']);
    }

    protected function btnAddField_Click() {
 	      $intTotalCount = count($this->lstMapHeaderArray);
 	      $this->lstMapHeader_Create($this, $intTotalCount-1, ($this->chkHeaderRow->Checked) ? "addfield" : null);
 	      $objTemp = $this->lstMapHeaderArray[$intTotalCount];
 	      $this->lstMapHeaderArray[$intTotalCount] = $this->lstMapHeaderArray[$intTotalCount-1];
 	      $this->lstMapHeaderArray[$intTotalCount-1] = $objTemp;
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

 	      $btnRemove = new QButton($this);
 	      $btnRemove->Text = "Remove";
 	      $btnRemove->ActionParameter = $intTotalCount-1;
 	      $btnRemove->AddAction(new QClickEvent(), new QServerAction('btnRemove_Click'));
 	      $btnRemove->AddAction(new QEnterKeyEvent(), new QServerAction('btnRemove_Click'));
 	      $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());

 	      if (isset($this->arrMapFields[$intTotalCount-1])) {
 	        unset($this->arrMapFields[$intTotalCount-1]);
 	      }

 	      $this->btnRemoveArray[$intTotalCount-1] = $btnRemove;
 	    }

 	    protected function btnRemove_Click($strFormId, $strControlId, $strParameter) {
 	      $intId = (int)$strParameter;
 	      $intTotalCount = count($this->lstMapHeaderArray)-1;

 	      if ($intId < count($this->lstMapHeaderArray)-2) {
 	        for ($i=$intId; $i<count($this->lstMapHeaderArray)-1; $i++) {
 	          $this->lstMapHeaderArray[$i] = $this->lstMapHeaderArray[$i+1];
 	          if (isset($this->txtMapDefaultValueArray[$i+1])) {
 	            $this->txtMapDefaultValueArray[$i] = $this->txtMapDefaultValueArray[$i+1];
 	            $this->lstMapDefaultValueArray[$i] = $this->lstMapDefaultValueArray[$i+1];
 	            $this->dtpDateArray[$i] = $this->dtpDateArray[$i+1];
 	            $this->btnRemoveArray[$i] = $this->btnRemoveArray[$i+1];
 	            $this->btnRemoveArray[$i]->ActionParameter = $i;
 	          }
 	          else {
 	            unset($this->txtMapDefaultValueArray[$i]);
 	            unset($this->lstMapDefaultValueArray[$i]);
 	            unset($this->dtpDateArray[$i]);
 	            unset($this->btnRemoveArray[$i]);
 	          }
 	        }
 	        unset($this->lstMapHeaderArray[$intTotalCount]);
 	      }
 	      else {
 	        $this->lstMapHeaderArray[$intId] = $this->lstMapHeaderArray[$intId+1];
 	        unset($this->lstMapHeaderArray[$intId+1]);
 	        unset($this->txtMapDefaultValueArray[$intId]);
 	        unset($this->lstMapDefaultValueArray[$intId]);
 	        unset($this->dtpDateArray[$intId]);
 	        unset($this->btnRemoveArray[$intId]);
 	      }
 	    }

	}
	// Go ahead and run this form object to generate the page
	AdminLabelsForm::Run('AdminLabelsForm', 'manufacturer_import.tpl.php');
?>
