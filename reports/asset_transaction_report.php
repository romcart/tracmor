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
	ini_set("include_path",ini_get("include_path"). PATH_SEPARATOR . __INCLUDES__ . "/php/PHPReports/" . PATH_SEPARATOR);
	require_once('PHPReportMaker.php');
	$_SESSION["phpReportsLanguage"] = null;

	class AssetTransactionListForm extends QForm {

		// Header Tabs
		protected $ctlHeaderMenu;

		// Shortcut Menu
		protected $ctlShortcutMenu;

		// Basic Inputs
		protected $lstCategory;
		protected $lstManufacturer;
		protected $lstUser;
		protected $lstCheckedOutBy;
		protected $lstReservedBy;
		protected $lstTransactionDate;
		protected $lstSortByDate;
		protected $lstGenerateOptions;
		protected $dtpTransactionDateFirst;
		protected $dtpTransactionDateLast;
		protected $txtShortDescription;
		protected $txtAssetCode;
		protected $txtAssetModelCode;
		protected $chkMove;
		protected $chkCheckIn;
		protected $chkCheckOut;
		protected $chkReserve;
		protected $chkUnreserve;
		protected $lblAssetModelId;
		protected $lblReport;
		protected $arrCustomFields;
		protected $pnlCustomFields;
		protected $chkCustomFieldArray;

		// Buttons
		protected $btnGenerate;
		protected $blnGenerate;
		protected $btnClear;

		// Search Values
		protected $intAssetModelId;
		protected $strShortDescription;
		protected $strAssetCode;
		protected $intCategoryId;
		protected $intManufacturerId;
		protected $strAssetModelCode;
		protected $intReservedBy;
		protected $intCheckedOutBy;
		protected $strDateModified;
		protected $strDateModifiedFirst;
		protected $strDateModifiedLast;

		protected function Form_Create() {

			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();

      $this->lstCategory_Create();
      $this->lstManufacturer_Create();
      $this->lstUserCheckedOutReserved_Create();
      $this->lstTransactionDate_Create();
      $this->lstGenerateOptions_Create();
      $this->dtpTransactionDateFirst_Create();
      $this->dtpTransactionDateLast_Create();
      $this->lstSortByDate_Create();
      $this->txtShortDescription_Create();
      $this->txtAssetCode_Create();
      $this->txtAssetModelCode_Create();
      $this->chkTransactionType_Create();
      $this->lblAssetModelId_Create();
      $this->btnGenerate_Create();
      $this->btnClear_Create();
      $this->customFields_Create();
      // The report code will be render in a Qlabel
      $this->lblReport = new QLabel($this);
      // If don't put this you will see HTML code instead of a report
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
  	  $this->lstGenerateOptions->AddItem('Print View', 'print');
  	  $this->lstGenerateOptions->AddItem('CSV Export', 'csv');
  	}

		protected function lstCategory_Create() {
	  	$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = 'Category';
			$this->lstCategory->AddItem('- ALL -', null);
			foreach (Category::LoadAllWithFlags(true, false, 'short_description') as $objCategory) {
				$this->lstCategory->AddItem($objCategory->ShortDescription, $objCategory->CategoryId);
			}
	  }

	  protected function lstManufacturer_Create() {
      $this->lstManufacturer = new QListBox($this);
			$this->lstManufacturer->Name = 'Manufacturer';
			$this->lstManufacturer->AddItem('- ALL -', null);
			foreach (Manufacturer::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Manufacturer()->ShortDescription))) as $objManufacturer) {
				$this->lstManufacturer->AddItem($objManufacturer->ShortDescription, $objManufacturer->ManufacturerId);
			}
	  }

	  protected function lstUserCheckedOutReserved_Create() {
	    $this->lstUser = new QListBox($this);
	    $this->lstUser->Name = 'User';
	    $this->lstUser->AddItem('- Select One -', null);
	    $this->lstCheckedOutBy = new QListBox($this);
	    $this->lstCheckedOutBy->Name = 'Checked Out By';
	    $this->lstCheckedOutBy->AddItem('- Select One -', null);
	    //$this->lstCheckedOutBy->AddItem('- Any -', 'any');
	    $this->lstReservedBy = new QListBox($this);
	    $this->lstReservedBy->Name = 'Reserved By';
	    $this->lstReservedBy->AddItem('- Select One -', null);
	    //$this->lstReservedBy->AddItem('- Any -', 'any');
	    foreach (UserAccount::LoadAll(QQ::Clause(QQ::OrderBy(QQN::UserAccount()->Username))) as $objUserAccount) {
        $this->lstUser->AddItem($objUserAccount->Username, $objUserAccount->UserAccountId);
        $this->lstCheckedOutBy->AddItem($objUserAccount->Username, $objUserAccount->UserAccountId);
        $this->lstReservedBy->AddItem($objUserAccount->Username, $objUserAccount->UserAccountId);
	    }
	  }

	  protected function lstSortByDate_Create() {
	    $this->lstSortByDate = new QListBox($this);
	    $this->lstSortByDate->Name = "Sort By Date";
	    $this->lstSortByDate->AddItem('ASC', 'ASC');
	    $this->lstSortByDate->AddItem('DESC', 'DESC');
	  }

	  protected function txtShortDescription_Create() {
	    $this->txtShortDescription = new QTextBox($this);
			$this->txtShortDescription->Name = 'Asset Model';
			// Because the enter key will also call form.submit() on some browsers, which we
      // absolutely DON'T want to have happen, let's be sure to terminate any additional
      // actions on EnterKey
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QServerAction('btnGenerate_Click'));
      $this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());

	  }

	  protected function txtAssetCode_Create() {
	  	$this->txtAssetCode = new QTextBox($this);
	  	$this->txtAssetCode->Name = 'Asset Code';
	  	$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnGenerate_Click'));
	  	$this->txtAssetCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }

	  protected function txtAssetModelCode_Create() {
	  	$this->txtAssetModelCode = new QTextBox($this);
	  	$this->txtAssetModelCode->Name = 'Asset Model Code';
	  	$this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QServerAction('btnGenerate_Click'));
	  	$this->txtAssetModelCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	  }

	  protected function chkTransactionType_Create() {
	  	$this->chkMove = new QCheckBox($this);
	  	$this->chkMove->Text = 'Move';
	  	$this->chkMove->Checked = true;
	  	$this->chkCheckIn = new QCheckBox($this);
	  	$this->chkCheckIn->Text = 'Check In';
	  	$this->chkCheckIn->Checked = true;
	  	$this->chkCheckOut = new QCheckBox($this);
	  	$this->chkCheckOut->Text = 'Check Out';
	  	$this->chkCheckOut->Checked = true;
	  	$this->chkReserve = new QCheckBox($this);
	  	$this->chkReserve->Text = 'Reserve';
	  	$this->chkReserve->Checked = true;
	  	$this->chkUnreserve = new QCheckBox($this);
	  	$this->chkUnreserve->Text = 'Unreserve';
	  	$this->chkUnreserve->Checked = true;
	  }

	  protected function lblAssetModelId_Create() {
	  	$this->lblAssetModelId = new QLabel($this);
	  	$this->lblAssetModelId->Text = '';
	  	$this->lblAssetModelId->Visible = false;
	  }

	  protected function dtpTransactionDateFirst_Create() {
    	$this->dtpTransactionDateFirst = new QDateTimePicker($this);
    	$this->dtpTransactionDateFirst->Name = '';
    	$this->dtpTransactionDateFirst->DateTime = new QDateTime(QDateTime::Now);
    	$this->dtpTransactionDateFirst->DateTimePickerType = QDateTimePickerType::Date;
    	$this->dtpTransactionDateFirst->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
    	$this->dtpTransactionDateFirst->Enabled = false;
    }

    protected function dtpTransactionDateLast_Create() {
    	$this->dtpTransactionDateLast = new QDateTimePicker($this);
    	$this->dtpTransactionDateLast->Name = '';
    	$this->dtpTransactionDateLast->DateTime = new QDateTime(QDateTime::Now);
    	$this->dtpTransactionDateLast->DateTimePickerType = QDateTimePickerType::Date;
    	$this->dtpTransactionDateLast->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
    	$this->dtpTransactionDateLast->Enabled = false;
    }

  	protected function lstTransactionDate_Create() {
  		$this->lstTransactionDate = new QListBox($this);
  		$this->lstTransactionDate->Name = "Transaction Date";
  		$this->lstTransactionDate->AddItem('None', null, true);
  		$this->lstTransactionDate->AddItem('Before', 'before');
  		$this->lstTransactionDate->AddItem('After', 'after');
  		$this->lstTransactionDate->AddItem('Between', 'between');
  		$this->lstTransactionDate->AddAction(new QChangeEvent(), new QAjaxAction('lstTransactionDate_Select'));
  	}

  	protected function customFields_Create() {
      // Create QPanel with AutoRenderChildren to add cutom fields dynamically
  	  $this->pnlCustomFields = new QPanel($this);
  		$this->pnlCustomFields->AutoRenderChildren = true;
  		// Load all custom fields and their values into an array objCustomFieldArray->CustomFieldSelection->CustomFieldValue
  		$this->arrCustomFields = CustomField::LoadObjCustomFieldArray(1, false, null);
  		$i = 0;
  		foreach ($this->arrCustomFields as $objCustomField) {
        $this->chkCustomFieldArray[$i] = new QCheckBox($this->pnlCustomFields);
        $this->chkCustomFieldArray[$i]->Text = $objCustomField->ShortDescription;
        $this->chkCustomFieldArray[$i]->ActionParameter = $objCustomField->CustomFieldId;
        $i++;
  		}
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
      QApplication::Redirect('asset_transaction_report.php');
	  }

	  protected function btnGenerate_Click() {
	  	$this->blnGenerate = true;

	  	// Expand the Asset object to include the AssetModel, Category, Manufacturer, and Location Objects
      $objExpansionMap[AssetTransaction::ExpandAsset][Asset::ExpandAssetModel][AssetModel::ExpandCategory] = true;
      $objExpansionMap[AssetTransaction::ExpandAsset][Asset::ExpandAssetModel][AssetModel::ExpandManufacturer] = true;
      $objExpansionMap[AssetTransaction::ExpandSourceLocation] = true;
      $objExpansionMap[AssetTransaction::ExpandDestinationLocation] = true;
      $objExpansionMap[AssetTransaction::ExpandTransaction][Transaction::ExpandTransactionType] = true;
      $objExpansionMap[AssetTransaction::ExpandTransaction][Transaction::ExpandCreatedByObject ] = true;
      $objExpansionMap[AssetTransaction::ExpandTransaction][Transaction::ExpandModifiedByObject] = true;

      $arrTransactionTypes = array();
      // Create an array of checked transaction types
      if ($this->chkMove->Checked) {
        $arrTransactionTypes[] = 1;
      }
      if ($this->chkCheckIn->Checked) {
        $arrTransactionTypes[] = 2;
      }
      if ($this->chkCheckOut->Checked) {
        $arrTransactionTypes[] = 3;
      }
      if ($this->chkReserve->Checked) {
        $arrTransactionTypes[] = 8;
      }
      if ($this->chkUnreserve->Checked) {
        $arrTransactionTypes[] = 9;
      }

      // If checked at least one transaction type
      if (count($arrTransactionTypes)) {
        $this->lblReport->Warning = "";
        // Total Transactions Count
        $intTotalTransactionCount = AssetTransaction::CountTransactionsBySearch($this->txtShortDescription->Text, $this->txtAssetCode->Text, $this->txtAssetModelCode->Text, $this->lstUser->SelectedValue, $this->lstCheckedOutBy->SelectedValue, $this->lstReservedBy->SelectedValue, $this->lstCategory->SelectedValue, $this->lstManufacturer->SelectedValue, $this->lstTransactionDate->SelectedValue, $this->dtpTransactionDateFirst->DateTime, $this->dtpTransactionDateLast->DateTime, $arrTransactionTypes, $objExpansionMap);

        // Total Transactions Count > 0 to avoid bug with NoDataMsg
        if ($intTotalTransactionCount) {
          // begins the report process
          $oRpt = new PHPReportMaker();
          // Create the constant to use in xml template
          $oRpt->putEnvObj("TotalTransactions", $intTotalTransactionCount);
          //some data to show in the report
          $sSql = AssetTransaction::LoadArrayBySearch(true, $this->txtShortDescription->Text, $this->txtAssetCode->Text, $this->txtAssetModelCode->Text, $this->lstUser->SelectedValue, $this->lstCheckedOutBy->SelectedValue, $this->lstReservedBy->SelectedValue, $this->lstCategory->SelectedValue, $this->lstManufacturer->SelectedValue, $this->lstSortByDate->SelectedValue, $this->lstTransactionDate->SelectedValue, $this->dtpTransactionDateFirst->DateTime, $this->dtpTransactionDateLast->DateTime, $arrTransactionTypes, $objExpansionMap);
          $strXmlColNameByCustomField = "";
          $strXmlFieldByCustomField = "";
          $intCustomFieldCount = 0;
          if ($this->chkCustomFieldArray) {
	          foreach ($this->chkCustomFieldArray as $chkCustomField) {
	            if ($chkCustomField->Checked) {
	              $strXmlColNameByCustomField .= "<COL CELLCLASS='report_column_header'>".$chkCustomField->Text."</COL>";
	              $strXmlFieldByCustomField .= "<COL TYPE='FIELD' CELLCLASS='report_cell'>__".$chkCustomField->ActionParameter."</COL>";
	              $intCustomFieldCount++;
	            }
	          }
          }
          $oGroups = "
            <GROUP NAME='transaction_id' EXPRESSION='transaction_id' PAGEBREAK='FALSE'>
              <HEADER>
                <ROW>
                  <COL ALIGN='LEFT' TYPE='EXPRESSION' COLSPAN='".(4 + $intCustomFieldCount)."' CELLCLASS='report_section_heading'>\$this->getValue('asset_transaction__transaction_id__transaction_type_id__short_description').' by '.(\$this->getValue('asset_transaction__transaction_id__modified_by')?\$this->getValue('asset_transaction__transaction_id__modified_by__first_name').' '.\$this->getValue('asset_transaction__transaction_id__modified_by__last_name').' on '.\$this->getValue('asset_transaction__transaction_id__modified_date'):\$this->getValue('asset_transaction__transaction_id__created_by__first_name').' '.\$this->getValue('asset_transaction__transaction_id__created_by__last_name').' on '.\$this->getValue('asset_transaction__transaction_id__creation_date'))</COL>
                </ROW>
                <ROW>
                  <COL CELLCLASS='report_column_header'>Asset Code:</COL>
                  <COL CELLCLASS='report_column_header'>Asset Model:</COL>
                  <COL CELLCLASS='report_column_header'>From:</COL>
                  <COL CELLCLASS='report_column_header'>To:</COL>
                  $strXmlColNameByCustomField
                </ROW>
              </HEADER>
              <FIELDS>
                <ROW>
                  <COL TYPE='FIELD' CELLCLASS='report_cell'><LINK TYPE='EXPRESSION'>'". __SUBDIRECTORY__ ."/assets/asset_edit.php?intAssetId='.\$this->getValue('asset_transaction__asset_id__asset_id')</LINK>asset_transaction__asset_id__asset_code</COL>
                  <COL TYPE='FIELD' CELLCLASS='report_cell'><LINK TYPE='EXPRESSION'>'". __SUBDIRECTORY__ ."/assets/asset_model_edit.php?intAssetModelId='.\$this->getValue('asset_transaction__asset_id__asset_model_id__asset_model_id')</LINK>asset_transaction__asset_id__asset_model_id__short_description</COL>
                  <COL TYPE='FIELD' CELLCLASS='report_cell'>asset_transaction__source_location_id__short_description</COL>
                  <COL TYPE='FIELD' CELLCLASS='report_cell'>asset_transaction__destination_location_id__short_description</COL>
                  $strXmlFieldByCustomField
                </ROW>
              </FIELDS>
            </GROUP>";

          $arrDBInfo = unserialize(DB_CONNECTION_1);

          $oRpt->setSQL($sSql);
          $oRpt->setUser($arrDBInfo['username']);
          $oRpt->setPassword($arrDBInfo['password']);
          $oRpt->setConnection($arrDBInfo['server']);
          $oRpt->setDatabaseInterface('mysql');
          $oRpt->setDatabase($arrDBInfo['database']);
          $oRpt->setNoDataMsg("No data was found, check your query");
          $oRpt->setPageSize(200000000);

          if ($this->lstGenerateOptions->SelectedValue == "print") {
          	// Start the output buffer
          	ob_start();
          	$this->lblReport->Text = "";
            $oDocs = "<CSS>../css/tracmor.css</CSS>";
            $fOut = fopen(".." . __TRACMOR_TMP__ . "/" . $_SESSION['intUserAccountId'] . "_asset_transaction_report.htm", "w");
            $oRpt->createFromTemplate('Asset Transaction Report', __DOCROOT__ . __SUBDIRECTORY__ . '/reports/asset_transaction_report.xml',null,$oDocs,$oGroups);
            $oRpt->run();
            fwrite($fOut, ob_get_contents());
            ob_end_clean();
            fclose($fOut);
            // Open generated Report in new window
    		    QApplication::ExecuteJavaScript("window.open('.." . __TRACMOR_TMP__ . "/" . $_SESSION['intUserAccountId']."_asset_transaction_report.htm','AssetTransactionReport','resizeable=yes,menubar=yes,scrollbars=yes,left=0,top=0,width=800,height=600');history.go(-1);");
    		    exit();
          }
          else if ($this->lstGenerateOptions->SelectedValue == "csv") {		
			$this->RenderCsvBegin(false);
			session_cache_limiter('must-revalidate');    // force a "no cache" effect
    		header("Pragma: hack"); // IE chokes on "no cache", so set to something, anything, else.
			$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT";
			header($ExpStr);
			header('Content-Type: text/csv');
			header('Content-Disposition: csv; filename=export.csv');
			ob_end_clean();
			$oRpt->createFromTemplate('Asset Transaction Report', __DOCROOT__ . __SUBDIRECTORY__ . '/reports/asset_transaction_report.xml',null,null,$oGroups);
          	$oOut = $oRpt->createOutputPlugin("csv");
          	$oRpt->setOutputPlugin($oOut);			
			$oRpt->run();
			ob_get_contents();
			@ob_flush();
			flush();
			
			$this->RenderCsvEnd(false);
			exit();
          }
          else {
            // Start the output buffer
          	ob_start();
          	
          	// The head of the final html will be write by the Qform
            $oRpt->setBody(false);
            $oRpt->createFromTemplate('Asset Transaction Report', __DOCROOT__ . __SUBDIRECTORY__ . '/reports/asset_transaction_report.xml',null,null,$oGroups);
            $oRpt->run();
            // Put the output buffer content in the Qlabel
            $this->lblReport->Text = ob_get_contents();
            // Clean the output buffer
            ob_end_clean();
          }
          // Begin rendering the QForm
          //$this->RenderBegin(false);
          //ob_end_clean();
          // Process the report
          //$oOut = $oRpt->createOutputPlugin("csv");
          //$oRpt->setOutputPlugin($oOut);
          //$this->RenderEnd(false);
          //exit();

        }
        else {
          $this->lblReport->Text = "";
          $this->lblReport->Warning = "No data was found, check your query.";
        }
      }
      else {
        $this->lblReport->Text = "";
        $this->lblReport->Warning = "You must check at least one transaction type.";
      }
      $this->blnGenerate = false;
	  }

	  public function lstTransactionDate_Select() {
  		$value = $this->lstTransactionDate->SelectedValue;
  		if ($value == null) {
  			$this->dtpTransactionDateFirst->Enabled = false;
  			$this->dtpTransactionDateLast->Enabled = false;
  		}
  		elseif ($value == 'before') {
  			$this->dtpTransactionDateFirst->Enabled = true;
  			$this->dtpTransactionDateLast->Enabled = false;
  		}
  		elseif ($value == 'after') {
  			$this->dtpTransactionDateFirst->Enabled = true;
  			$this->dtpTransactionDateLast->Enabled = false;
  		}
  		elseif ($value == 'between') {
  			$this->dtpTransactionDateFirst->Enabled = true;
  			$this->dtpTransactionDateLast->Enabled = true;
  		}
  	}
	}

	AssetTransactionListForm::Run('AssetTransactionListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/reports/asset_transaction_report.tpl.php');
?>
