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
require_once('reportDataRepeater.php');
class DepreciationListForm extends QForm {

    // Header Tabs
    protected $ctlHeaderMenu;

    // Shortcut Menu
    protected $ctlShortcutMenu;

    // Basic Inputs
    protected $lstReservedBy;
    protected $lstEndDate;
    protected $lstSortByDate;
    protected $lstGenerateOptions;
    protected $dtpEndDateFirst;
    protected $dtpEndDateLast;
    protected $lblReport;

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

    // Data repeater
    protected $dtrDepreciation;
    public    $totals;

    protected function Form_Create() {

        $this->ctlHeaderMenu_Create();
        $this->ctlShortcutMenu_Create();

        $this->lstEndDate_Create();
        $this->lstGenerateOptions_Create();
        $this->dtpEndDateFirst_Create();
        $this->dtpEndDateLast_Create();
        $this->lstSortByDate_Create();
        $this->btnGenerate_Create();
        $this->btnClear_Create();
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

    protected function lstSortByDate_Create() {
        $this->lstSortByDate = new QListBox($this);
        $this->lstSortByDate->Name = "Sort By Date";
        $this->lstSortByDate->AddItem('ASC', 'ASC');
        $this->lstSortByDate->AddItem('DESC', 'DESC');
    }

    protected function dtpEndDateFirst_Create() {
        $this->dtpEndDateFirst = new QDateTimePicker($this);
        $this->dtpEndDateFirst->Name = '';
        $this->dtpEndDateFirst->DateTime = new QDateTime(QDateTime::Now);
        $this->dtpEndDateFirst->DateTimePickerType = QDateTimePickerType::Date;
        $this->dtpEndDateFirst->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
        $this->dtpEndDateFirst->Enabled = false;
        $this->dtpEndDateFirst->MaximumYear = $this->dtpEndDateFirst->DateTime->Year + 10;
    }

    protected function dtpEndDateLast_Create() {
        $this->dtpEndDateLast = new QDateTimePicker($this);
        $this->dtpEndDateLast->Name = '';
        $this->dtpEndDateLast->DateTime = new QDateTime(QDateTime::Now);
        $this->dtpEndDateLast->DateTimePickerType = QDateTimePickerType::Date;
        $this->dtpEndDateLast->DateTimePickerFormat = QDateTimePickerFormat::MonthDayYear;
        $this->dtpEndDateLast->Enabled = false;
        $this->dtpEndDateLast->MaximumYear = $this->dtpEndDateLast->DateTime->Year + 10;
    }

    protected function lstEndDate_Create() {
        $this->lstEndDate = new QListBox($this);
        $this->lstEndDate->Name = "Transaction Date";
        $this->lstEndDate->AddItem('None', null, true);
        $this->lstEndDate->AddItem('Before', 'before');
        $this->lstEndDate->AddItem('After', 'after');
        $this->lstEndDate->AddItem('Between', 'between');
        $this->lstEndDate->AddAction(new QChangeEvent(), new QAjaxAction('lstEndDate_Select'));
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
        QApplication::Redirect('depreciation_report.php');
    }

    protected function btnGenerate_Click() {
//        if(Asset::CountByEndDate($this->getDateCondition())>0){
            $this->totals = Asset::getTotalsByEndDate($this->getTotalsDateCondition());
            if($this->lstGenerateOptions->SelectedValue == "csv"){
                $dataSource = Asset::LoadByEndDate($this->getDateCondition(), $this->getSortCondition());
                ob_end_clean();
                header("Content-type: text/csv");
                header("Content-Disposition: attachment; filename=Depreciation_Report.csv");
                header("Pragma: no-cache");
                header("Expires: 0");
                print '"Asset ID","Asset Code","Model Name","Purchase Date","Purchase Cost","Current Depreciation","Book Value"'."\r\n";
                foreach($dataSource as $record){
                    $arrColumnText = array( $this->prepare($record->AssetId),
                                            $this->prepare($record->AssetCode),
                                            $this->prepare($record->AssetModel->ShortDescription),
                                            $this->prepare($record->PurchaseDate),
                                            $this->prepare($record->PurchaseCost),
                                            $this->prepare($record->getBookValue()),
                                            $this->prepare($record->getCurrentDepreciation()));
                    $strColumnsHtml = implode('","', $arrColumnText);
                    $strColumnsHtml = '"' . $strColumnsHtml . '"' . "\r\n";
                    print $strColumnsHtml;
                }
                print '"","","","Total:","'
                    . round($this->totals[1],2)
                    . '","'
                    . round(($this->totals[1]-$this->totals[0]),2)
                    .'","'.round($this->totals[0],2)
                    .'"'
                    ."\r\n";
                ob_get_contents();
                @ob_flush();
                flush();
                exit;
            }
            elseif($this->lstGenerateOptions->SelectedValue == "print"){
                $this->dtrDepreciation = new reportDataRepeater($this);
                $this->dtrDepreciation->Paginator = new QPaginator($this);
                $this->dtrDepreciation->ItemsPerPage = 20000;
                $this->dtrDepreciation->Template = 'dtr_depreciation.tpl.php';
                $this->dtrDepreciation->setSummary(array('Total Depreciation'  => $this->totals[0],
                                                         'Total Purchase Cost' => $this->totals[1],
                                                         'Total Book Value'    => ($this->totals[1]-$this->totals[0])));
                $this->dtrDepreciation->SetDataBinder('dtrDepreciation_Bind');
                //print $this->getTitle();
                //print $this->dtrDepreciation->GetReportHtml();
                $content = str_replace("'",'"',$this->dtrDepreciation->GetReportHtml());
                $content = preg_replace('/^\s+|\n|\r|\s+$/m', '',$content);
                QApplication::ExecuteJavaScript("var w = window.open('../reports/depreciation_report.php');var d = w.document.open();d.write('".$content."');window.history.back(-1)");
                exit;
            }
            else{
                $this->dtrDepreciation = new reportDataRepeater($this);
                $this->dtrDepreciation->Paginator = new QPaginator($this);
                $this->dtrDepreciation->ItemsPerPage = 6;
                $this->dtrDepreciation->PaginatorAlternate = new QPaginator($this);
                $this->dtrDepreciation->UseAjax = true;
                $this->dtrDepreciation->Template = 'dtr_depreciation.tpl.php';
                $this->dtrDepreciation->setSummary(array('Total Depreciation'  => $this->totals[0],
                    'Total Purchase Cost' => $this->totals[1],
                    'Total Book Value'    => ($this->totals[1]-$this->totals[0])));
                $this->dtrDepreciation->SetDataBinder('dtrDepreciation_Bind');
            }
//        }
    }

    public function lstEndDate_Select() {
        $value = $this->lstEndDate->SelectedValue;
        if ($value == null) {
            $this->dtpEndDateFirst->Enabled = false;
            $this->dtpEndDateLast->Enabled = false;
        }
        elseif ($value == 'before') {
            $this->dtpEndDateFirst->Enabled = true;
            $this->dtpEndDateLast->Enabled = false;
        }
        elseif ($value == 'after') {
            $this->dtpEndDateFirst->Enabled = true;
            $this->dtpEndDateLast->Enabled = false;
        }
        elseif ($value == 'between') {
            $this->dtpEndDateFirst->Enabled = true;
            $this->dtpEndDateLast->Enabled = true;
        }
    }

    protected function dtrDepreciation_Bind(){
        $this->dtrDepreciation->TotalItemCount = Asset::CountByEndDate($this->getDateCondition());
        $this->dtrDepreciation->DataSource     = Asset::LoadByEndDate($this->getDateCondition(),
                                                                      $this->getSortCondition()
                                                                      );
    }

    public function prepare($strHtml){
        $strHtml = htmlspecialchars_decode($strHtml);
        $strHtml = str_replace('"', '""', $strHtml);
        //$strHtml = $this->StripControls($strHtml);
        $strHtml = strip_tags($strHtml);
        $strHtml = trim($strHtml);
            return $strHtml;
    }

    protected function getSortCondition(){
        return " ORDER BY `end_date` " . $this->lstSortByDate->SelectedValue;
    }

    protected function getDateCondition(){
        $dates_condition = '';
        if ($this->lstEndDate->SelectedValue == 'between'){
            $dates_condition = " HAVING(`end_date` >= STR_TO_DATE('"
                . $this->dtpEndDateFirst->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s')
                                AND `end_date` <= STR_TO_DATE('"
                . $this->dtpEndDateLast->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s'))";
        }
        elseif($this->lstEndDate->SelectedValue == 'before'){
            $dates_condition = " HAVING(`end_date` <= STR_TO_DATE('"
                . $this->dtpEndDateFirst->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s'))";
        }
        elseif($this->lstEndDate->SelectedValue == 'after'){
            $dates_condition = " HAVING(`end_date` >= STR_TO_DATE('"
                . $this->dtpEndDateFirst->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s'))";
        }
        return $dates_condition;
    }

    protected function getTotalsDateCondition(){
        $dates_condition = '1=1';
        if ($this->lstEndDate->SelectedValue == 'between'){
            $dates_condition = " DATE_ADD(`asset`.`purchase_date`, INTERVAL `depreciation_class`.`life` MONTH) >= STR_TO_DATE('"
                . $this->dtpEndDateFirst->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s')
                                AND DATE_ADD(`asset`.`purchase_date`, INTERVAL `depreciation_class`.`life` MONTH) <= STR_TO_DATE('"
                . $this->dtpEndDateLast->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s')";
        }
        elseif($this->lstEndDate->SelectedValue == 'before'){
            $dates_condition = " DATE_ADD(`asset`.`purchase_date`, INTERVAL `depreciation_class`.`life` MONTH) <= STR_TO_DATE('"
                . $this->dtpEndDateFirst->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s')";
        }
        elseif($this->lstEndDate->SelectedValue == 'after'){
            $dates_condition = " DATE_ADD(`asset`.`purchase_date`, INTERVAL `depreciation_class`.`life` MONTH) >= STR_TO_DATE('"
                . $this->dtpEndDateFirst->DateTime->format('Y-m-d g:i:s')
                . "', '%Y-%m-%d %H:%i:%s')";
        }
        return $dates_condition;
    }

    protected function getTitle(){
        $title = '<div class="title">&nbsp Depreciation Report ';
        $dates = ' for assets with End Date ' . $this->lstEndDate->SelectedValue . ' ';
        $titleClose = '</div>';
        if ($this->lstEndDate->SelectedValue == 'between'){
            $dates .= $this->dtpEndDateFirst->DateTime//->format('Y-m-d g:i:s')
                . " AND "
                . $this->dtpEndDateLast->DateTime;//->format('Y-m-d g:i:s')
            $title .= $dates;
        }
        elseif($this->lstEndDate->SelectedValue == 'before'){
            $dates .= $this->dtpEndDateFirst->DateTime;//->format('Y-m-d g:i:s');
            $title .= $dates;
        }
        elseif($this->lstEndDate->SelectedValue == 'after'){
            $dates .= $this->dtpEndDateFirst->DateTime;//->format('Y-m-d g:i:s')
            $title .= $dates;
        }
        $title.= $titleClose;
        return $title;
    }
}

DepreciationListForm::Run('DepreciationListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/reports/depreciation_report.tpl.php');
?>


