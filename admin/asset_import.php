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

		protected $pnlStepOne;
		protected $pnlStepTwo;
		protected $pnlStepThree;
		protected $lstFieldSeparator;
		protected $txtFieldSeparator;
    protected $lstTextDelimiter;
		protected $txtTextDelimiter;
		protected $flcFileCsv;
		protected $File;
		protected $FileCsvData;
		protected $arrCsvHeader;
		protected $strFilePathArray;
		protected $strAcceptibleMimeArray;
		protected $chkHeaderRow;
		protected $btnNext;
		protected $btnCancel;
		protected $intStep;
		protected $lblStepTwo;
		protected $arrAssetCustomField;
		protected $arrAssetModelCustomField;

		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->pnlStepOne_Create();
			$this->pnlStepTwo_Create();
			$this->pnlStepThree_Create();
			$this->Buttons_Create();
			$this->intStep = 1;
			$this->arrAssetCustomField = CustomField::LoadArrayByActiveFlagEntity(1, 1);
			if (!$this->arrAssetCustomField) {
			  $this->arrAssetCustomField = array();
			}
			$this->arrAssetModelCustomField = CustomField::LoadArrayByActiveFlagEntity(1, 4);
			if (!$this->arrAssetModelCustomField) {
			  $this->arrAssetModelCustomField = array();
			}
			$this->strAcceptibleMimeArray = array(
						'text/plain' => 'txt',
  				  'application/vnd.ms-excel' => 'csv');
		}

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		protected function pnlStepOne_Create() {
			$this->pnlStepOne = new QPanel($this);
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
			$this->pnlStepTwo = new QPanel($this);
			$this->pnlStepTwo->AutoRenderChildren = true;
			$this->pnlStepTwo->Display = false;

      // Step 2
      $this->lblStepTwo = new QLabel($this->pnlStepTwo);
      $this->lblStepTwo->Text = "Step 2: Map Fields and Import<br/>";
      $this->lblStepTwo->CssClass = "title";
      $this->lblStepTwo->HtmlEntities = false;
    }

    protected function pnlStepThree_Create() {
			$this->pnlStepThree = new QPanel($this);
      $this->pnlStepThree->Display = false;
      $this->pnlStepThree->AutoRenderChildren = true;

      // Step 3

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
  				$strTempFilePath = __DOCROOT__ . __SUBDIRECTORY__ . __TRACMOR_TMP__ . '/'.$_SESSION['intUserAccountId'] .'.' . 'csv';
  				copy($this->flcFileCsv->File, $strTempFilePath);
  				$this->File = $strTempFilePath;

  				// Cleanup and Save Filename
  				//$this->strFileName = preg_replace('/[^A-Z^a-z^0-9_\-]/', '', $strBaseFilename) . '.' . $strExtension;
  			}
  			if (!$blnError) {
  			  $this->FileCsvData = new File_CSV_DataSource();
  			  $this->FileCsvData->settings($this->GetCsvSettings());
  			  $file = fopen($this->File, "r");
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
          // Load first file
          $this->FileCsvData->load($this->strFilePathArray[0]);
          $blnHeader = false;
          // Get Headers
          if ($this->chkHeaderRow->Checked) {
            $this->arrCsvHeader = $this->FileCsvData->getHeaders();
            $blnHeader = true;
          }
          else {
            $this->FileCsvData->appendRow($this->FileCsvData->getHeaders());
          }
          $strFirstRowArray = $this->FileCsvData->getRow(0);
          for ($i=0; $i<count($strFirstRowArray); $i++) {
            $this->lstMapHeader_Create($this->pnlStepTwo, $i);
            if ($this->chkHeaderRow->Checked) {
              $lblHeaderRow = new QLabel($this->pnlStepTwo);
              $lblHeaderRow->Text = "  " . $this->arrCsvHeader[$i];
            }
            $txtDefaultValue = new QTextBox($this->pnlStepTwo);
            $txtDefaultValue->Width = 100;
            $lblRow1 = new QLabel($this->pnlStepTwo);
            $lblRow1->Text = "  " . $strFirstRowArray[$i] . "<br/>";
            $lblRow1->HtmlEntities = false;
          }
  			}
		  }
		  elseif ($this->intStep == 2) {
		    // Step 2 complete

		  }
		  else {
		    // Step 3 complete

		  }
		  if (!$blnError) {
		    $this->intStep++;
  		  $this->DisplayStepForm($this->intStep);
		  }
	  }

	  protected function lstMapHeader_Create($objParentObject, $intId) {
	    $lstMapHeader = new QListBox($objParentObject);
	    $lstMapHeader->Name = "lst".$intId;
	    $strAssetGroup = "Asset";
	    $strAssetModelGroup = "Asset Model";
	    $lstMapHeader->AddItem("- Not Mapped -", null);
	    $lstMapHeader->AddItem("Asset Code", "Asset Code", null, $strAssetGroup);
	    foreach ($this->arrAssetCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "CustomField_".$objCustomField->CustomFieldId, null, $strAssetGroup);
	    }
	    $lstMapHeader->AddItem("Location", "Location", null, $strAssetGroup);
	    $lstMapHeader->AddItem("Created By", "Created By", null, $strAssetGroup);
	    $lstMapHeader->AddItem("Created Date", "Created Date", null, $strAssetGroup);
	    $lstMapHeader->AddItem("Modified By", "Modified By", null, $strAssetGroup);
	    $lstMapHeader->AddItem("Modified Date", "Modified Date", null, $strAssetGroup);
	    $lstMapHeader->AddItem("Asset Model Code", "Asset Model Code", null, $strAssetModelGroup);
	    $lstMapHeader->AddItem("Asset Model Short Description", "Asset Model Short Description", null, $strAssetModelGroup);
	    $lstMapHeader->AddItem("Asset Model Long Description", "Asset Model Long Description", null, $strAssetModelGroup);
	    foreach ($this->arrAssetModelCustomField as $objCustomField) {
	      $lstMapHeader->AddItem($objCustomField->ShortDescription, "CustomField_".$objCustomField->CustomFieldId, null, $strAssetModelGroup);
	    }
	    $lstMapHeader->AddItem("Category", "Category", null, $strAssetModelGroup);
	    $lstMapHeader->AddItem("Manufacturer", "Manufacturer", null, $strAssetModelGroup);
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
	        $strSeparator = $this->txtFieldSeparator;
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
	        $strDelimiter = $this->txtTextDelimiter;
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
         $this->pnlStepOne->Display = true;
		     $this->pnlStepOne->Visible = true;
		     $this->pnlStepTwo->Display = false;
		     $this->pnlStepTwo->Visible = false;
		     $this->pnlStepThree->Display = false;
		     $this->pnlStepThree->Visible = false;
		     break;
		   case 2:
		     $this->pnlStepOne->Display = false;
		     $this->pnlStepOne->Visible = false;
		     $this->pnlStepTwo->Display = true;
		     $this->pnlStepTwo->Visible = true;
		     $this->pnlStepThree->Display = false;
		     $this->pnlStepThree->Visible = false;
		     break;
		   case 3:
		     $this->pnlStepOne->Display = false;
		     $this->pnlStepOne->Visible = false;
		     $this->pnlStepTwo->Display = false;
		     $this->pnlStepTwo->Visible = false;
		     $this->pnlStepThree->Display = true;
		     $this->pnlStepThree->Visible = true;
		     break;
		   case 4:
		     $this->DisplayStepForm(1);
		     $this->intStep = 1;
		     break;
      }
    }

		// Cancel button click action
		protected function btnCancel_Click() {

    }

	}
	// Go ahead and run this form object to generate the page
	AdminLabelsForm::Run('AdminLabelsForm', 'asset_import.tpl.php');
?>