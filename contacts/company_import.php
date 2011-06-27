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
	//require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	//QApplication::Authenticate();
  require_once('../includes/prepend.inc.php');
	require(__DOCROOT__ . __PHP_ASSETS__ . '/csv/DataSource.php');
	QApplication::Authenticate(4);
	//require_once(__FORMBASE_CLASSES__ . '/ContactListFormBase.class.php');


	class ContactListForm extends QForm {
		// Header Tabs
		protected $ctlHeaderMenu;

		// Shortcut Menu
		protected $ctlShortcutMenu;

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
		protected $dtgCompany;
		protected $objNewCompanyArray;
		protected $arrOldItemArray;
		protected $dtgUpdatedItems;
		protected $objUpdatedItemArray;
		protected $blnImportEnd;
		protected $intImportStep;
		protected $intLocationKey;
    protected $intCompanyKey;
    protected $intCompanyDescriptionKey;
    protected $intWebsiteKey;
    protected $intEmailKey;
    protected $intTelephoneKey;
    protected $intFaxKey;
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
    protected $lblImportCompanies;

		protected function Form_Create() {
			if (QApplication::QueryString('intDownloadCsv')) {
        $this->RenderBegin(false);

  			session_cache_limiter('must-revalidate');    // force a "no cache" effect
        header("Pragma: hack"); // IE chokes on "no cache", so set to something, anything, else.
        $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT";
        header($ExpStr);
        header('Content-Type: text/csv');
  			header('Content-Disposition: csv; filename=skipped_records.csv');

        $file = fopen(sprintf("%s%s/%s_company_skipped.csv", __DOCROOT__ . __SUBDIRECTORY__, __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "r");
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
			//$this->ctlShortcutMenu_Create();
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
			foreach (CustomField::LoadArrayByActiveFlagEntity(1, EntityQtype::Company) as $objCustomField) {
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

			if ($this->dtgCompany && count($this->objNewCompanyArray) > 0 && $this->dtgCompany->Paginator) {
				$this->dtgCompany->TotalItemCount = count($this->objNewCompanyArray);
      	$this->dtgCompany->DataSource = $this->return_array_chunk($this->dtgCompany, $this->objNewCompanyArray);
			}

			if ($this->dtgUpdatedItems && count($this->objUpdatedItemArray) > 0 && $this->dtgUpdatedItems->Paginator) {
				$this->dtgUpdatedItems->TotalItemCount = count($this->objUpdatedItemArray);
      	$this->dtgUpdatedItems->DataSource = $this->return_array_chunk($this->dtgUpdatedItems, $this->objUpdatedItemArray);
			}

		}

    // Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
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
      $this->lblImportUpdatedItems->Text = "Last Updated Companies";

      $this->lblImportCompanies = new QLabel($this);
      $this->lblImportCompanies->HtmlEntities = false;
      $this->lblImportCompanies->Display = false;
      $this->lblImportCompanies->CssClass = "title";
      $this->lblImportCompanies->Text = "<br/><br/>Last Imported Companies";
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
      $this->pnlStepOne->Template = "company_import_pnl_step1.tpl.php";

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
      $this->pnlStepTwo->Template = "company_import_pnl_step2.tpl.php";
    }

    // Step 3 Panel
    protected function pnlStepThree_Create() {
			$this->pnlStepThree = new QPanel($this->pnlMain);
      $this->pnlStepThree->Template = "company_import_pnl_step3.tpl.php";
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
                $strFilePath = sprintf('%s/%s_com_%s.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId'], $i);
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
              $file_skipped = fopen($this->strFilePath = sprintf('%s/%s_company_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "w+");
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
        $blnCompany = false;
        $blnCompanyId = false;
        for ($i=0; $i < count($this->lstMapHeaderArray)-1; $i++) {
          $lstMapHeader = $this->lstMapHeaderArray[$i];
          $strSelectedValue = strtolower($lstMapHeader->SelectedValue);
          if ($strSelectedValue == "company name") {
            $blnCompany = true;
          }
          elseif ($strSelectedValue == "id") {
            $blnCompanyId = true;
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
        if (!$blnError && $blnCompany && ($this->lstImportAction->SelectedValue != 2 || $blnCompanyId)) {
          $this->btnNext->Warning = "";
          // Setup keys for main required fields
          foreach ($this->arrTracmorField as $key => $value) {
            if ($value == 'company name') {
              $this->intCompanyKey = $key;
            }
            elseif ($value == 'description') {
              $this->intCompanyDescriptionKey = $key;
            }
            elseif ($value == 'website') {
              $this->intWebsiteKey = $key;
            }
            elseif ($value == 'email') {
              $this->intEmailKey = $key;
            }
            elseif ($value == 'telephone') {
              $this->intTelephoneKey = $key;
            }
            elseif ($value == 'fax') {
              $this->intFaxKey = $key;
            }
            elseif ($this->lstImportAction->SelectedValue == 2 && $value == 'id') {
              $this->intItemIdKey = $key;
            }
          }

          $this->objNewCompanyArray = array();
          $this->blnImportEnd = false;
          $j=1;

          $this->btnNext->RemoveAllActions('onclick');
          // Add new ajax actions for button
          $this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
          $this->btnNext->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnNext));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnNext_Click'));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QToggleEnableAction($this->btnNext));
    			$this->btnNext->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $this->btnNext->Warning = "Please wait...";
          $this->intImportStep = 2;
          $this->intCurrentFile = 0;
          $this->strSelectedValueArray = array();

          // New categories
          $this->dtgCompany = new QDataGrid($this);
          $this->dtgCompany->Name = 'company_list';
      		$this->dtgCompany->CellPadding = 5;
      		$this->dtgCompany->CellSpacing = 0;
      		$this->dtgCompany->CssClass = "datagrid";
          $this->dtgCompany->UseAjax = true;
          $this->dtgCompany->ShowColumnToggle = false;
          $this->dtgCompany->ShowExportCsv = false;
          $this->dtgCompany->ShowHeader = false;
          $this->dtgCompany->AddColumn(new QDataGridColumnExt('Company', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));

          // Updated categories
          $this->dtgUpdatedItems = new QDataGrid($this);
          $this->dtgUpdatedItems->Name = 'updated_company_list';
      		$this->dtgUpdatedItems->CellPadding = 5;
      		$this->dtgUpdatedItems->CellSpacing = 0;
      		$this->dtgUpdatedItems->CssClass = "datagrid";
          $this->dtgUpdatedItems->UseAjax = true;
          $this->dtgUpdatedItems->ShowColumnToggle = false;
          $this->dtgUpdatedItems->ShowExportCsv = false;
          $this->dtgUpdatedItems->ShowHeader = false;
          $this->dtgUpdatedItems->AddColumn(new QDataGridColumnExt('Company Name', '<?= $_ITEM ?>', 'CssClass="dtg_column"', 'HtmlEntities="false"'));

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
        	$this->btnReturnTo->Text = "Return to Companies";
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
		    $file_skipped = fopen($strFilePath = sprintf('%s/%s_company_skipped.csv', __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__, $_SESSION['intUserAccountId']), "a");
		    if (!$this->blnImportEnd) {
		      // Category
          if ($this->intImportStep == 2) {
            $strCompanyArray = array();
            $this->objNewCompanyArray = array();
            // Load all categories
            foreach (Company::LoadAll() as $objCompany) {
              $strCompanyArray[] = stripslashes($objCompany->ShortDescription);
            }
            // Add Default value
            $txtDefaultValue = trim($this->txtMapDefaultValueArray[$this->intCompanyKey]->Text);
            if ($txtDefaultValue && !$this->in_array_nocase($txtDefaultValue, $strCompanyArray)) {
              $strCompanyArray[] = $txtDefaultValue;
              $objNewCompany = new Company();
              $objNewCompany->ShortDescription = addslashes($txtDefaultValue);
              $objNewCompany->Save();
              $this->objNewCompanyArray[$objNewCompany->CompanyId] = $objNewCompany->ShortDescription;
            }
            $this->btnNext->Warning = "Companies have been imported. Please wait...";
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
                if (substr($value, 0, 8) == 'company_') {
                  $intItemCustomFieldKeyArray[substr($value, 8)] = $key;
                  if (array_key_exists(substr($value, 8), $this->arrItemCustomField)) {
                  	$arrItemCustomField[substr($value, 8)] = $this->arrItemCustomField[substr($value, 8)];
                  }
                }
              }
              $strCompanyValuesArray = array();
              $strUpdatedCompanyValuesArray = array();
              $strItemCFVArray = array();
              $strUpdatedItemCFVArray = array();
              $strNewCompanyArray = array();
              $this->arrOldItemArray = array();
              $this->objUpdatedItemArray = array();
              $objCompanyArray = array();
              $objExpansionMap[Company::ExpandAddress][Address::ExpandStateProvince] = true;
			        $objExpansionMap[Company::ExpandAddress][Address::ExpandCountry] = true;
              foreach (Company::LoadArrayBySearchHelper(null, null, null, null, null, null, null, null, null, null, null, $objExpansionMap) as $objCompany) {
                $objCompanyArray[strtolower($objCompany->ShortDescription)] = $objCompany;
              }
              for ($i=0; $i<$this->FileCsvData->countRows(); $i++) {
                $strRowArray = $this->FileCsvData->getRow($i);
                $objCompany = null;
                if ($this->lstImportAction->SelectedValue == 2) {
                  $intItemId = intval(trim($strRowArray[$this->intItemIdKey]));
                  foreach ($objCompanyArray as $objItem) {
                    if ($objItem->CompanyId == $intItemId) {
                      $objCompany = $objItem;
                      break;
                    }
                  }
                }
                else {
                  $intItemId = 0;
                }
                // Create action
                if (trim($strRowArray[$this->intCompanyKey]) && (!$intItemId || !$objCompany) && !$this->in_array_nocase(trim($strRowArray[$this->intCompanyKey]), $strCompanyArray)) {
                  $strCompanyArray[] = trim($strRowArray[$this->intCompanyKey]);
                  $strCompanyDescription = "";
                  if (isset($this->intCompanyDescriptionKey))
                    if (trim($strRowArray[$this->intCompanyDescriptionKey]))
                      $strCompanyDescription = trim($strRowArray[$this->intCompanyDescriptionKey]);
                    else
                      $strCompanyDescription = (isset($this->txtMapDefaultValueArray[$this->intCompanyDescriptionKey])) ? trim($this->txtMapDefaultValueArray[$this->intCompanyDescriptionKey]->Text) : '';
                  $strWebsite = "";
                  if (isset($this->intWebsiteKey))
                    if (trim($strRowArray[$this->intWebsiteKey]))
                      $strWebsite = trim($strRowArray[$this->intWebsiteKey]);
                    else
                      $strWebsite = (isset($this->txtMapDefaultValueArray[$this->intWebsiteKey])) ? trim($this->txtMapDefaultValueArray[$this->intWebsiteKey]->Text) : '';
                  $strEmail = "";
                  if (isset($this->intEmailKey))
                    if (trim($strRowArray[$this->intEmailKey]))
                      $strEmail = trim($strRowArray[$this->intEmailKey]);
                    else
                      $strEmail = (isset($this->txtMapDefaultValueArray[$this->intEmailKey])) ? trim($this->txtMapDefaultValueArray[$this->intEmailKey]->Text) : '';
                  $strTelephone = "";
                  if (isset($this->intTelephoneKey))
                    if (trim($strRowArray[$this->intTelephoneKey]))
                      $strTelephone = trim($strRowArray[$this->intTelephoneKey]);
                    else
                      $strTelephone = (isset($this->txtMapDefaultValueArray[$this->intTelephoneKey])) ? trim($this->txtMapDefaultValueArray[$this->intTelephoneKey]->Text) : '';
                  $strFax = "";
                  if (isset($this->intFaxKey))
                    if (trim($strRowArray[$this->intFaxKey]))
                      $strFax = trim($strRowArray[$this->intFaxKey]);
                    else
                      $strFax = (isset($this->txtMapDefaultValueArray[$this->intFaxKey])) ? trim($this->txtMapDefaultValueArray[$this->intFaxKey]->Text) : '';

                  $strCompanyValuesArray[] = sprintf("('%s', '%s', '%s', '%s', '%s', '%s', '%s', NOW())", addslashes(trim($strRowArray[$this->intCompanyKey])), addslashes($strCompanyDescription), addslashes($strWebsite), addslashes($strEmail), addslashes($strTelephone), addslashes($strFax), $_SESSION['intUserAccountId']);
                  $strNewCompanyArray[] = addslashes(trim($strRowArray[$this->intCompanyKey]));

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
                elseif (trim($strRowArray[$this->intCompanyKey]) && $this->lstImportAction->SelectedValue == 2  && !$this->in_array_nocase(trim($strRowArray[$this->intCompanyKey]), $this->objUpdatedItemArray) && $objCompany) {
                  if (!$blnError) {
                    //$objCompany = $objCompanyArray[strtolower(trim($strRowArray[$this->intCompanyKey]))];
                    $strUpdateFieldArray = array();
                    if (isset($this->intCompanyKey)) {
                      if (trim($strRowArray[$this->intCompanyKey]))
                        $strCompany = trim($strRowArray[$this->intCompanyKey]);
                      else
                        $strCompany = (isset($this->txtMapDefaultValueArray[$this->intCompanyKey])) ? trim($this->txtMapDefaultValueArray[$this->intCompanyKey]->Text) : '';
                      $strUpdateFieldArray[] = sprintf("`short_description`='%s'", $strCompany);
                    }
                    if (isset($this->intCompanyDescriptionKey)) {
                      if (trim($strRowArray[$this->intCompanyDescriptionKey]))
                        $strCompanyDescription = trim($strRowArray[$this->intCompanyDescriptionKey]);
                      else
                        $strCompanyDescription = (isset($this->txtMapDefaultValueArray[$this->intCompanyDescriptionKey])) ? trim($this->txtMapDefaultValueArray[$this->intCompanyDescriptionKey]->Text) : '';
                      $strUpdateFieldArray[] = sprintf("`long_description`='%s'", $strCompanyDescription);
                    }
                    $strWebsite = "";
                    if (isset($this->intWebsiteKey)) {
                      if (trim($strRowArray[$this->intWebsiteKey]))
                        $strWebsite = trim($strRowArray[$this->intWebsiteKey]);
                      else
                        $strWebsite = (isset($this->txtMapDefaultValueArray[$this->intWebsiteKey])) ? trim($this->txtMapDefaultValueArray[$this->intWebsiteKey]->Text) : '';
                      $strUpdateFieldArray[] = sprintf("`website`='%s'", $strWebsite);
                    }
                    $strEmail = "";
                    if (isset($this->intEmailKey)) {
                      if (trim($strRowArray[$this->intEmailKey]))
                        $strEmail = trim($strRowArray[$this->intEmailKey]);
                      else
                        $strEmail = (isset($this->txtMapDefaultValueArray[$this->intEmailKey])) ? trim($this->txtMapDefaultValueArray[$this->intEmailKey]->Text) : '';
                      $strUpdateFieldArray[] = sprintf("`email`='%s'", $strEmail);
                    }
                    $strTelephone = "";
                    if (isset($this->intTelephoneKey)) {
                      if (trim($strRowArray[$this->intTelephoneKey]))
                        $strTelephone = trim($strRowArray[$this->intTelephoneKey]);
                      else
                        $strTelephone = (isset($this->txtMapDefaultValueArray[$this->intTelephoneKey])) ? trim($this->txtMapDefaultValueArray[$this->intTelephoneKey]->Text) : '';
                      $strUpdateFieldArray[] = sprintf("`telephone`='%s'", $strTelephone);
                    }
                    $strFax = "";
                    if (isset($this->intFaxKey)) {
                      if (trim($strRowArray[$this->intFaxKey]))
                        $strFax = trim($strRowArray[$this->intFaxKey]);
                      else
                        $strFax = (isset($this->txtMapDefaultValueArray[$this->intFaxKey])) ? trim($this->txtMapDefaultValueArray[$this->intFaxKey]->Text) : '';
                      $strUpdateFieldArray[] = sprintf("`fax`='%s'", $strFax);
                    }
                    $strUpdateFieldArray[] = sprintf("modified_by='%s'", $_SESSION['intUserAccountId']);
                    $this->arrOldItemArray[$objCompany->CompanyId] = $objCompany;
                    $strUpdatedCompanyValuesArray[] = sprintf("UPDATE `company` SET %s WHERE `company_id`='%s'", implode(", ", $strUpdateFieldArray), $objCompany->CompanyId);
                    $this->objUpdatedItemArray[$objCompany->CompanyId] = $objCompany->ShortDescription;

                    foreach ($arrItemCustomField as $objCustomField) {

                      //$objItem = $objCompanyArray[strtolower($objUpdatedItem)];
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
                        $strUpdatedItemCFVArray[$objCompany->CompanyId] = $strCFVArray;
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

              if (count($strCompanyValuesArray)) {
                $objDatabase = Company::GetDatabase();
                $objDatabase->NonQuery(sprintf("INSERT INTO `company` (`short_description`, `long_description`, `website`, `email`, `telephone`, `fax`, `created_by`, `creation_date`) VALUES %s;", implode(", ", $strCompanyValuesArray)));
                $intStartId = $objDatabase->InsertId();
                $strItemIdArray = array();
                for ($i=0; $i<count($strNewCompanyArray); $i++) {
                  $this->objNewCompanyArray[$intStartId+$i] = $strNewCompanyArray[$i];
                  $objDatabase = CustomField::GetDatabase();
                  $strItemCFVArray[$i] = sprintf("('%s', %s)", $intStartId+$i, $strItemCFVArray[$i]);
                  $strItemIdArray[$i] = sprintf("(%s)", $intStartId+$i);
                }

                $strCFVNameArray = array();
                foreach ($arrItemCustomField as $objCustomField) {
                  $strCFVNameArray[] = sprintf("`cfv_%s`", $objCustomField->CustomFieldId);
                }
                if (count($strItemCFVArray) > 0 && count($strCFVNameArray) > 0)  {
                	$strQuery = sprintf("INSERT INTO `company_custom_field_helper` (`company_id`, %s) VALUES %s", implode(", ", $strCFVNameArray), implode(", ", $strItemCFVArray));
                } else {
                	$strQuery = sprintf("INSERT INTO `company_custom_field_helper` (`company_id`) VALUES %s", implode(", ", $strItemIdArray));
                }
                $objDatabase->NonQuery($strQuery);
              }
              if (count($strUpdatedCompanyValuesArray)) {
                $objDatabase = Category::GetDatabase();
                foreach ($strUpdatedCompanyValuesArray as $query) {
                  $objDatabase->NonQuery($query);
                }
                foreach ($this->objUpdatedItemArray as $intItemKey => $objUpdatedItem) {
                  if (isset($strUpdatedItemCFVArray[$intItemKey]) && count($strUpdatedItemCFVArray[$intItemKey])) {
                    $strCFVArray = array();
                    foreach ($arrItemCustomField as $objCustomField) {
                      $strCFVArray[] = sprintf("`cfv_%s`=%s", $objCustomField->CustomFieldId, $strUpdatedItemCFVArray[$intItemKey][$objCustomField->CustomFieldId]);
                    }
                    if (count($strCFVArray)) {
                      $strQuery = sprintf("UPDATE `company_custom_field_helper` SET %s WHERE `company_id`='%s'", implode(", ", $strCFVArray), $intItemKey);
                      $objDatabase->NonQuery($strQuery);
                    }
                  }
                }
              }
              $this->intImportStep = 6; // The import have been completed
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
            if (count($this->objNewCompanyArray)) {
              $this->lblImportCompanies->Display = true;
              $this->dtgCompany->Paginator = new QPaginator($this->dtgCompany);
              $this->dtgCompany->ItemsPerPage = 20;
            }
            $this->btnNext->Display = false;
            $this->btnCancel->Display = false;
            $this->btnUndoLastImport->Display = true;
            $this->btnImportMore->Display = true;
            $this->btnReturnTo->Display = true;
            $this->lblImportSuccess->Display = true;
            $this->lblImportSuccess->Text = sprintf("Success:<br/>" .
                                             "<b>%s</b> Records imported successfully<br/>" .
                                             "<b>%s</b> Records skipped due to error<br/>", count($this->objNewCompanyArray) + count($this->objUpdatedItemArray), $this->intSkippedRecordCount);
            if ($this->intSkippedRecordCount) {
               $this->lblImportSuccess->Text .= sprintf("<a href='./company_import.php?intDownloadCsv=1'>Click here to download records that could not be imported</a>");
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
	    $strCompanyGroup = "Company";
	    $lstMapHeader->AddItem("- Not Mapped -", null);
	    // Add ID for update imports only
	    if ($this->lstImportAction->SelectedValue == 2) {
	      $lstMapHeader->AddItem("ID", "ID", ($strName == 'id') ? true : false, $strCompanyGroup, 'CssClass="redtext"');
	    }
	    $lstMapHeader->AddItem("Company Name", "Company Name", ($strName == 'company') ? true : false, $strCompanyGroup, 'CssClass="redtext"');
	    $lstMapHeader->AddItem("Description", "Description", ($strName == 'description') ? true : false, $strCompanyGroup);
	    $lstMapHeader->AddItem("Website", "Website", ($strName == 'website') ? true : false, $strCompanyGroup);
	    $lstMapHeader->AddItem("Email", "Email", ($strName == 'email') ? true : false, $strCompanyGroup);
	    $lstMapHeader->AddItem("Telephone", "Telephone", ($strName == 'telephone') ? true : false, $strCompanyGroup);
	    $lstMapHeader->AddItem("Fax", "Fax", ($strName == 'fax') ? true : false, $strCompanyGroup);
	    $lstMapHeader->AddAction(new QChangeEvent(), new QAjaxAction('lstTramorField_Change'));
	    $this->lstMapHeaderArray[] = $lstMapHeader;
	    foreach ($this->arrItemCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "company_".$objCustomField->CustomFieldId,  ($strName == strtolower($objCustomField->ShortDescription)) ? true : false, $strCompanyGroup);
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
          if (substr($objControl->SelectedValue, 0, 8) == "company_") {
            $objCustomField = CustomField::LoadByCustomFieldId(substr($objControl->SelectedValue, 8));
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

  						$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId(substr($objControl->SelectedValue, 8), QQ::Clause(QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription)));
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
      QApplication::Redirect("./company_import.php");
    }

    protected function btnImportMore_Click() {
      QApplication::Redirect("./company_import.php");
    }

    protected function btnReturnTo_Click() {
      QApplication::Redirect("./company_list.php");
    }

    // Delete All imported Assets, Asset Models, Manufacturers, Categories and Locations
    protected function UndoImport() {
      $objDatabase = Company::GetDatabase();
      //$strQuery = "SET FOREIGN_KEY_CHECKS=0;";
      //$objDatabase->NonQuery($strQuery);
      /*if (isset($this->arrOldItemArray) && count($this->arrOldItemArray)) {
       foreach ($this->arrOldItemArray as $intItemId => $arrOldItem) {
          //$strModifiedBy = (!$arrOldItem['ModifiedBy'] || strtolower($arrOldItem['ModifiedBy']) == "null" || $arrOldItem['ModifiedBy'] == '0') ? "null" : "'" . $arrOldItem['ModifiedBy'] . "'";
          //$strModifiedDate = (!$arrOldItem['ModifiedDate'] || strtolower($arrOldItem['ModifiedDate']) == "null" || $arrOldItem['ModifiedDate'] == '0000-00-00 00:00:00') ? "null" : "'" . $arrOldItem['ModifiedDate'] . "'";
          $strQuery = sprintf("UPDATE `company` SET `modified_by`='%s', `modified_date`='%s' WHERE `company_id`='%s'", $arrOldItem->ModifiedBy, $arrOldItem->ModifiedDate, $intItemId);
          $objDatabase->NonQuery($strQuery);
          /*if (count($arrOldItem['CFV'])) {
            $strCFV = array();
            foreach ($arrOldItem['CFV'] as $intCustomFieldId => $strCFV) {
              $strCFVArray[] = sprintf("`cfv_%s`='%s'", $intCustomFieldId, $strCFV);
            }
            $strQuery = sprintf("UPDATE `company_custom_field_helper` SET %s WHERE `company_id`='%s'", implode(", ", $strCFVArray), $intItemId);
            $objDatabase->NonQuery($strQuery);
          }*/
        /*}
        //$strQuery = "SET FOREIGN_KEY_CHECKS=1;";
        //$objDatabase->NonQuery($strQuery);
      }*/
		  if (isset($this->arrOldItemArray)) {
        $strQuery = "SET FOREIGN_KEY_CHECKS=0;";
        $objDatabase->NonQuery($strQuery);
        foreach ($this->arrOldItemArray as $intItemId => $objOldItem) {
          $strQuery = sprintf("UPDATE `company` SET `short_description`='%s', `long_description`='%s', `website`='%s', `email`='%s', `telephone`='%s', `fax`='%s', `modified_by`=%s, `modified_date`=%s WHERE `company_id`='%s'", $objOldItem->ShortDescription, $objOldItem->LongDescription, $objOldItem->Website, $objOldItem->Email, $objOldItem->Telephone, $objOldItem->Fax, (!$objOldItem->ModifiedBy) ? "NULL" : $objOldItem->ModifiedBy, (!$objOldItem->ModifiedBy) ? "NULL" : sprintf("'%s'", $objOldItem->ModifiedDate), $objOldItem->CompanyId);
          $objDatabase->NonQuery($strQuery);
          $strCFVArray = array();
          foreach ($this->arrItemCustomField as $objCustomField) {
            $strCFV = $objOldItem->GetVirtualAttribute($objCustomField->CustomFieldId);
            $strCFVArray[] = sprintf("`cfv_%s`='%s'", $objCustomField->CustomFieldId, $strCFV);
          }
          if (count($strCFVArray)) {
            $strQuery = sprintf("UPDATE `company_custom_field_helper` SET %s WHERE `company_id`='%s'", implode(", ", $strCFVArray), $intItemId);
            $objDatabase->NonQuery($strQuery);
          }
        }
        $strQuery = "SET FOREIGN_KEY_CHECKS=1;";
        $objDatabase->NonQuery($strQuery);
      }
		  if (count($this->objNewCompanyArray)) {
        $strQuery = sprintf("DELETE FROM `company` WHERE `company_id` IN (%s)", implode(", ", array_keys($this->objNewCompanyArray)));
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
	ContactListForm::Run('ContactListForm', 'company_import.tpl.php');
?>
