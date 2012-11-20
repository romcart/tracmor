<?php
class reportDataRepeater extends QDataRepeater{

    public function getReportHtml($strTitle = null){
        return $this->GetControlHtml();
    }
}