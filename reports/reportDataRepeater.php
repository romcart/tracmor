<?php
class reportDataRepeater extends QDataRepeater{

    protected $summary = array();

    public function getReportHtml(){
         return $this->GetControlHtml();
    }

    public function  setSummary(array $arrSummary){
        $this->summary = $arrSummary;
    }

    public function  getSummary(){
        return $this->summary;
    }

    public function getSummaryHtml(){
        $footContent = '';
        foreach ($this->summary as $key => $value){
            $footContent .= $key . ": <b>". $value ."</b><br/>";
        }
        return $footContent;
    }
}