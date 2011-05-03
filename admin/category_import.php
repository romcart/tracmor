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
		protected $dtgCategory;
		protected $objNewCategoryArray;
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
    protected $intCategoryKey;
    protected $intCategoryDescriptionKey;
    protected $intManufacturerKey;
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

        $file = fopen(sprintf("%s%s/%s_category_skipped.csv", __DOCROOT__ . __SUBDIRECTORY__, __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "r");
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
			foreach (CustomField::LoadArrayByActiveFlagEntity(1, EntityQtype::Category) as $objCustomField) {
			  $this->arrItemCustomField[$objCustomField->CustomFieldId] = $objCustomField;
			}
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

			if ($this->dtgCategory && count($this->objNewCategoryArray) > 0 && $this->dtgCategory->Paginator) {
				$this->dtgCategory->TotalItemCount = count($this->objNewCategoryArray);
      	$this->dtgCategory->DataSource = $this->return_array_chunk($this->dtgCategory, $this->objNewCategoryArray);
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
     
      $this->lblImportCategories = new QLabel($this);
      $this->lblImportCategories->HtmlEntities = false;
      $this->lblImportCategories->Display = false;
      $this->lblImportCategories->CssClass = "title";
      $this->lblImportCategories->Text = "<br/><br/>Last Imported Categories";
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
      $this->pnlStepOne->Template = "category_import_pnl_step1.tpl.php";

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
      $this->pnlStepTwo->Template = "category_import_pnl_step2.tpl.php";
    }

    // Step 3 Panel
    protected function pnlStepThree_Create() {
			$this->pnlStepThree = new QPanel($this->pnlMain);
      $this->pnlStepThree->Template = "category_import_pnl_step3.tpl.php";
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
                $strFilePath = sprintf('%s/%s_cat_%s.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId'], $i);
                $this->strFilePathArray[] = $strFilePath;
                $file_part = fopen($strFilePath, "w+");
                if ($i == 1) {
                  if ($this->blnHeaderRow) {
                    $strHeaderRow = $row;
                  }
                  else {
                    // Add empty row which would be as header row
                    $strHeaderRow = "\n";
                    fwrite($file_part, $strHeaderRow);
                  }
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
              $file_skipped = fopen($this->strFilePath = sprintf('%s/%s_category_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "w+");
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
        $blnCategory = false;
        $blnCategoryId = false;
        for ($i=0; $i < count($this->lstMapHeaderArray)-1; $i++) {
          $lstMapHeader = $this->lstMapHeaderArray[$i];
          $strSelectedValue = strtolower($lstMapHeader->SelectedValue);
          if ($strSelectedValue == "category name") {
            $blnCategory = true;
          }
          elseif ($strSelectedValue == "id") {
            $blnCategoryId = true;
          }
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
        if (!$blnError /*&& $blnAssetCode && $blnAssetModelCode && $blnAssetModelShortDescription && $blnLocation*/ && $blnCategory /*&& $blnManufacturer*/ && ($this->lstImportAction->SelectedValue != 2 || $blnCategoryId)) {
          $this->btnNext->Warning = "";
          // Setup keys for main required fields
          foreach ($this->arrTracmorField as $key => $value) {
            if ($value == 'category name') {
              $this->intCategoryKey = $key;
            }
            elseif ($value == 'category description') {
              $this->intCategoryDescriptionKey = $key;
            }
            elseif ($this->lstImportAction->SelectedValue == 2 && $value == 'id') {
              $this->intItemIdKey = $key;
            }
          }

          $this->objNewCategoryArray = array();
          $this->blnImportEnd = false;
          $j=1;
          
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

          // New categories
          $this->dtgCategory = new QDataGrid($this);
          $this->dtgCategory->Name = 'category_list';
      		$this->dtgCategory->CellPadding = 5;
      		$this->dtgCategory->CellSpacing = 0;
      		$this->dtgCategory->CssClass = "datagrid";
          $this->dtgCategory->UseAjax = true;
          $this->dtgCategory->ShowColumnToggle = false;
          $this->dtgCategory->ShowExportCsv = false;
          $this->dtgCategory->ShowHeader = false;
          $this->dtgCategory->AddColumn(new QDataGridColumnExt('Category', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));

          // Updated categories
          $this->dtgUpdatedItems = new QDataGrid($this);
          $this->dtgUpdatedItems->Name = 'updated_category_list';
      		$this->dtgUpdatedItems->CellPadding = 5;
      		$this->dtgUpdatedItems->CellSpacing = 0;
      		$this->dtgUpdatedItems->CssClass = "datagrid";
          $this->dtgUpdatedItems->UseAjax = true;
          $this->dtgUpdatedItems->ShowColumnToggle = false;
          $this->dtgUpdatedItems->ShowExportCsv = false;
          $this->dtgUpdatedItems->ShowHeader = false;
          $this->dtgUpdatedItems->AddColumn(new QDataGridColumnExt('Category Name', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));

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
        	$this->btnReturnTo->Text = "Return to Categories";
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
		    $file_skipped = fopen($strFilePath = sprintf('%s/%s_category_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "a");
		    if (!$this->blnImportEnd) {
		      // Category
          if ($this->intImportStep == 2) {
            $strCategoryArray = array();
            $this->objNewCategoryArray = array();
            // Load all categories
            foreach (Category::LoadAll() as $objCategory) {
              $strCategoryArray[] = stripslashes($objCategory->ShortDescription);
            }
            // Add Default value
            $txtDefaultValue = trim($this->txtMapDefaultValueArray[$this->intCategoryKey]->Text);
            if ($txtDefaultValue && !$this->in_array_nocase($txtDefaultValue, $strCategoryArray)) {
              $strCategoryArray[] = $txtDefaultValue;
              $objNewCategory = new Category();
              $objNewCategory->ShortDescription = addslashes($txtDefaultValue);
              $objNewCategory->AssetFlag = true;
              $objNewCategory->InventoryFlag = false;
              $objNewCategory->Save();
              $this->objNewCategoryArray[$objNewCategory->CategoryId] = $objNewCategory->ShortDescription;
            }
            $this->btnNext->Warning = "Categories have been imported. Please wait...";
          }
          
          for ($j=$this->intCurrentFile; $j<count($this->strFilePathArray); $j++) {
            $this->FileCsvData->load($this->strFilePathArray[$j]);
            if (!$j) {
              //$this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
            }
            // Category Import
            if ($this->intImportStep == 2) {
              $arrItemCustomField = array();
              foreach ($this->arrTracmorField as $key => $value) {
                if (substr($value, 0, 9) == 'category_') {
                  $intItemCustomFieldKeyArray[substr($value, 9)] = $key;
                  if (array_key_exists(substr($value, 9), $this->arrItemCustomField)) {
                  	$arrItemCustomField[substr($value, 9)] = $this->arrItemCustomField[substr($value, 9)];
                  }
                }
              }
              $strCategoryValuesArray = array();
              $strUpdatedCategoryValuesArray = array();
              $strItemCFVArray = array();
              $strUpdatedItemCFVArray = array();
              $strNewCategoryArray = array();
              $intCategoryArray = array();
              $this->arrOldItemArray = array();
              $this->objUpdatedItemArray = array();
              $objCategoryArray = array();
              foreach (Category::LoadAllWithCustomFieldsHelper() as $objCategory) {
                $objCategoryArray[strtolower($objCategory->ShortDescription)] = $objCategory;
              }
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                $objCategory = null;
                if ($this->lstImportAction->SelectedValue == 2) {
                  $intItemId = intval(trim($strRowArray[$this->intItemIdKey]));
                  foreach ($objCategoryArray as $objItem) {
                    if ($objItem->CategoryId == $intItemId) {
                      $objCategory = $objItem;
                      break;
                    }
                  }
                }
                else {
                  $intItemId = 0;
                }
                // Create action
                if (trim($strRowArray[$this->intCategoryKey]) && (!$intItemId || !$objCategory) && !$this->in_array_nocase(trim($strRowArray[$this->intCategoryKey]), $strCategoryArray)) {
                  $strCategoryArray[] = trim($strRowArray[$this->intCategoryKey]);
                  $strCategoryDescription = "";
                  if (isset($this->intCategoryDescriptionKey))
                    if (trim($strRowArray[$this->intCategoryDescriptionKey]))
                      $strCategoryDescription = trim($strRowArray[$this->intCategoryDescriptionKey]);
                    else
                      $strCategoryDescription = (isset($this->txtMapDefaultValueArray[$this->intCategoryDescriptionKey])) ? trim($this->txtMapDefaultValueArray[$this->intCategoryDescriptionKey]->Text) : '';
                  $strCategoryValuesArray[] = sprintf("('%s', '%s', '1', '1', '%s', NOW())", addslashes(trim($strRowArray[$this->intCategoryKey])), addslashes($strCategoryDescription), $_SESSION['intUserAccountId']);
                  $strNewCategoryArray[] = addslashes(trim($strRowArray[$this->intCategoryKey]));

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
                elseif (trim($strRowArray[$this->intCategoryKey]) && $this->lstImportAction->SelectedValue == 2  && !$this->in_array_nocase(trim($strRowArray[$this->intCategoryKey]), $this->objUpdatedItemArray) && $objCategory) {
                  if (!$blnError) {
                    //$objCategory = $objCategoryArray[strtolower(trim($strRowArray[$this->intCategoryKey]))];
                    $strCategoryDescription = "";
                    if (isset($this->intCategoryDescriptionKey))
                      if (trim($strRowArray[$this->intCategoryDescriptionKey]))
                        $strCategoryDescription = trim($strRowArray[$this->intCategoryDescriptionKey]);
                      else
                        $strCategoryDescription = (isset($this->txtMapDefaultValueArray[$this->intCategoryDescriptionKey])) ? trim($this->txtMapDefaultValueArray[$this->intCategoryDescriptionKey]->Text) : '';
                    $this->arrOldItemArray[$objCategory->CategoryId] = $objCategory;
                    $strUpdatedCategoryValuesArray[] = sprintf("UPDATE `category` SET `short_description`='%s', `long_description`='%s' WHERE `category_id`='%s'", addslashes(trim($strRowArray[$this->intCategoryKey])), addslashes($strCategoryDescription), $objCategory->CategoryId);
                    $this->objUpdatedItemArray[$objCategory->CategoryId] = $objCategory->ShortDescription;

                    foreach ($arrItemCustomField as $objCustomField) {

                      //$objItem = $objCategoryArray[strtolower($objUpdatedItem)];
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
                        $strUpdatedItemCFVArray[$objCategory->CategoryId] = $strCFVArray;
                      }
                      else {
                        $strUpdatedItemCFVArray[$intItemKey] = "";
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

              if (count($strCategoryValuesArray)) {
                $objDatabase = Category::GetDatabase();
                $objDatabase->NonQuery(sprintf("INSERT INTO `category` (`short_description`, `long_description`, `asset_flag`, `inventory_flag`, `created_by`, `creation_date`) VALUES %s;", implode(", ", $strCategoryValuesArray)));
                $intStartId = $objDatabase->InsertId();
                $strItemIdArray = array();
                for ($i=0; $i<count($strNewCategoryArray); $i++) {
                  $this->objNewCategoryArray[$intStartId+$i] = $strNewCategoryArray[$i];
                  $objDatabase = CustomField::GetDatabase();
                  $strItemCFVArray[$i] = sprintf("('%s', %s)", $intStartId+$i, $strItemCFVArray[$i]);
                  $strItemIdArray[$i] = sprintf("(%s)", $intStartId+$i);
                }

                $strCFVNameArray = array();
                foreach ($arrItemCustomField as $objCustomField) {
                  $strCFVNameArray[] = sprintf("`cfv_%s`", $objCustomField->CustomFieldId);
                }
                if (count($strItemCFVArray) > 0 && count($strCFVNameArray) > 0)  {
                	$strQuery = sprintf("INSERT INTO `category_custom_field_helper` (`category_id`, %s) VALUES %s", implode(", ", $strCFVNameArray), implode(", ", $strItemCFVArray));
                } else {
                	$strQuery = sprintf("INSERT INTO `category_custom_field_helper` (`category_id`) VALUES %s", implode(", ", $strItemIdArray));
                }
                $objDatabase->NonQuery($strQuery);
              }
              if (count($strUpdatedCategoryValuesArray)) {
                $objDatabase = Category::GetDatabase();
                foreach ($strUpdatedCategoryValuesArray as $query) {
                  $objDatabase->NonQuery($query);
                }
                foreach ($this->objUpdatedItemArray as $intItemKey => $objUpdatedItem) {
                  if (isset($strUpdatedItemCFVArray[$intItemKey]) && count($strUpdatedItemCFVArray[$intItemKey])) {
                    $strCFVArray = array();
                    foreach ($arrItemCustomField as $objCustomField) {
                      $strCFVArray[] = sprintf("`cfv_%s`=%s", $objCustomField->CustomFieldId, $strUpdatedItemCFVArray[$intItemKey][$objCustomField->CustomFieldId]);
                    }
                    if (count($strCFVArray)) {
                      $strQuery = sprintf("UPDATE `category_custom_field_helper` SET %s WHERE `category_id`='%s'", implode(", ", $strCFVArray), $intItemKey);
                      $objDatabase->NonQuery($strQuery);
                    }
                  }
                }
              }
            }
          }
          if ($this->intImportStep == 6) {
            $this->blnImportEnd = true;
            $this->btnNext->Warning = "";


            $this->lblImportResults->Display = true;
            if (count($this->objUpdatedItemArray)) {
              $this->lblImportUpdatedItems->Display = true;
              $this->dtgUpdatedItems->Paginator = new QPaginator($this->dtgUpdatedItems);
              $this->dtgUpdatedItems->ItemsPerPage = 20;

            }
            if (count($this->objNewCategoryArray)) {
              $this->lblImportCategories->Display = true;
              $this->dtgCategory->Paginator = new QPaginator($this->dtgCategory);
              $this->dtgCategory->ItemsPerPage = 20;
            }
            $this->btnNext->Display = false;
            $this->btnCancel->Display = false;
            $this->btnUndoLastImport->Display = true;
            $this->btnImportMore->Display = true;
            $this->btnReturnTo->Display = true;
            $this->lblImportSuccess->Display = true;
            $this->lblImportSuccess->Text = sprintf("Success:<br/>" .
                                             "<b>%s</b> Records imported successfully<br/>" .
                                             "<b>%s</b> Records skipped due to error<br/>", count($this->objNewCategoryArray) + count($this->objUpdatedItemArray), $this->intSkippedRecordCount);
            if ($this->intSkippedRecordCount) {
               $this->lblImportSuccess->Text .= sprintf("<a href='./category_import.php?intDownloadCsv=1'>Click here to download records that could not be imported</a>");
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
	    $strCategoryGroup = "Category";
	    $lstMapHeader->AddItem("- Not Mapped -", null);
	    // Add ID for update imports only
	    if ($this->lstImportAction->SelectedValue == 2) {
	      $lstMapHeader->AddItem("ID", "ID", ($strName == 'id') ? true : false, $strCategoryGroup, 'CssClass="redtext"');
	    }
	    $lstMapHeader->AddItem("Category Name", "Category Name", ($strName == 'category') ? true : false, $strCategoryGroup, 'CssClass="redtext"');
	    $lstMapHeader->AddItem("Category Description", "Category Description", ($strName == 'description') ? true : false, $strCategoryGroup);
	    $lstMapHeader->AddAction(new QChangeEvent(), new QAjaxAction('lstTramorField_Change'));
	    $this->lstMapHeaderArray[] = $lstMapHeader;
	    foreach ($this->arrItemCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "category_".$objCustomField->CustomFieldId,  ($strName == strtolower($objCustomField->ShortDescription)) ? true : false, $strCategoryGroup);
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
          if (substr($objControl->SelectedValue, 0, 9) == "category_") {
            $objCustomField = CustomField::LoadByCustomFieldId(substr($objControl->SelectedValue, 9));
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

  						$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId(substr($objControl->SelectedValue, 9), QQ::Clause(QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription)));
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
      QApplication::Redirect("./category_import.php");
    }

    protected function btnImportMore_Click() {
      QApplication::Redirect("./category_import.php");
    }

    protected function btnReturnTo_Click() {
      QApplication::Redirect("./category_list.php");
    }

    // Delete All imported Assets, Asset Models, Manufacturers, Categories and Locations
    protected function UndoImport() {
      $objDatabase = Asset::GetDatabase();
      //$strQuery = "SET FOREIGN_KEY_CHECKS=0;";
      //$objDatabase->NonQuery($strQuery);
      /*if (isset($this->arrOldItemArray) && count($this->arrOldItemArray)) {
        $strQuery = "SET FOREIGN_KEY_CHECKS=0;";
        $objDatabase->NonQuery($strQuery);
        foreach ($this->arrOldItemArray as $intAssetId => $arrOldAsset) {
          $strModifiedBy = (!$arrOldAsset['ModifiedBy'] || strtolower($arrOldAsset['ModifiedBy']) == "null" || $arrOldAsset['ModifiedBy'] == '0') ? "null" : "'" . $arrOldAsset['ModifiedBy'] . "'";
          $strModifiedDate = (!$arrOldAsset['ModifiedDate'] || strtolower($arrOldAsset['ModifiedDate']) == "null" || $arrOldAsset['ModifiedDate'] == '0000-00-00 00:00:00') ? "null" : "'" . $arrOldAsset['ModifiedDate'] . "'";
          $strQuery = sprintf("UPDATE `asset` SET `asset_model_id`='%s', `modified_by`=%s, `modified_date`=%s WHERE `asset_id`='%s'", $arrOldAsset['AssetModelId'], $strModifiedBy, $strModifiedDate, $intAssetId);
          $objDatabase->NonQuery($strQuery);
          if (count($arrOldAsset['CFV'])) {
            $strCFV = array();
            foreach ($arrOldAsset['CFV'] as $intCustomFieldId => $strCFV) {
              $strCFVArray[] = sprintf("`cfv_%s`='%s'", $intCustomFieldId, $strCFV);
            }
            $strQuery = sprintf("UPDATE `asset_custom_field_helper` SET %s WHERE `asset_id`='%s'", implode(", ", $strCFVArray), $intAssetId);
            $objDatabase->NonQuery($strQuery);
          }
        }
        $strQuery = "SET FOREIGN_KEY_CHECKS=1;";
        $objDatabase->NonQuery($strQuery);
      }
		  if (count($this->objNewManufacturerArray)) {
        $strQuery = sprintf("DELETE FROM `manufacturer` WHERE `manufacturer_id` IN (%s)" , implode(", ", array_keys($this->objNewManufacturerArray)));
        $objDatabase->NonQuery($strQuery);
		  }*/
      if (isset($this->arrOldItemArray))
        foreach ($this->arrOldItemArray as $intItemId => $objOldItem) {
          $strQuery = sprintf("UPDATE `category` SET `short_description`='%s', `long_description`='%s' WHERE `category_id`='%s'", $objOldItem->ShortDescription, $objOldItem->LongDescription, $objOldItem->CategoryId);
          $objDatabase->NonQuery($strQuery);
          $strCFVArray = array();
          foreach ($this->arrItemCustomField as $objCustomField) {
            $strCFV = $objOldItem->GetVirtualAttribute($objCustomField->CustomFieldId);
            $strCFVArray[] = sprintf("`cfv_%s`='%s'", $objCustomField->CustomFieldId, $strCFV);
          }
          if (count($strCFVArray)) {
            $strQuery = sprintf("UPDATE `category_custom_field_helper` SET %s WHERE `category_id`='%s'", implode(", ", $strCFVArray), $intItemId);
            $objDatabase->NonQuery($strQuery);
          }
      }
		  if (count($this->objNewCategoryArray)) {
        $strQuery = sprintf("DELETE FROM `category` WHERE `category_id` IN (%s)", implode(", ", array_keys($this->objNewCategoryArray)));
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
	AdminLabelsForm::Run('AdminLabelsForm', 'category_import.tpl.php');
?>
