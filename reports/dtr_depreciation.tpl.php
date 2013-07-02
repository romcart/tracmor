<?php
/* @var reportDataRepeater $_CONTROL */

if ($_CONTROL->CurrentItemIndex == 0) {
    _p("<table border='0' cellpadding='5' cellspacing='0'>
            <thead style='background-color:#eeeeee;color:#000000;'>
                <th><b>Asset Code</b></th>
                <th><b>Asset Model Name </b></th>
                <th><b>Purchase Date</b></th>
                <th><b>Purchase Cost</b></th>
                <th><b>Book Value</b></th>
                <th><b>Current Depreciation</b></th>

            </thead>
            <tbody>", false);
} ?>
<?php
if ((($_CONTROL->CurrentItemIndex % 2) != 0))
    {
        _p('<tr style="background-color:#f0f0f0 ">', false);
    }
else
    {
        _p('<tr>',false);
    }
?>


    <td><?php  _p($_ITEM->AssetCode); ?></td>
    <td><?php  _p($_ITEM->AssetModel->ShortDescription); ?><br/>
    <td><?php  _p($_ITEM->PurchaseDate); ?></td>
    <td><?php  _p($_ITEM->PurchaseCost); ?></td>


    <?php
    //Predefining Book Value Purchase Cost – (Purchase Cost * ((current date – purchase date)/life))
    $interval = QDateTime::Now()->diff($_ITEM->PurchaseDate);
    $interval = $interval->y*12 + $interval->m;
    $fltBookValue =	$_ITEM->PurchaseCost - ($_ITEM->PurchaseCost * ($interval/$_ITEM->AssetModel->DepreciationClass->Life));
    $fltBookValue = $fltBookValue < 0 ? 0 : round($fltBookValue,2);
    ?>
    <td><?php _p($_ITEM->getBookValue()) ?></td>
    <td><?php _p($_ITEM->getCurrentDepreciation()) ?>
    </td>

</tr>

<?php

if($_CONTROL->CurrentItemIndex == count($_CONTROL->DataSource) - 1){
    if(is_array($_CONTROL->getSummary())){
        $summary = $_CONTROL->getSummary();
        _p("<tr><td></td><td></td><td><b>Total:</b></td><td>",false);
        _p(round($summary['Total Purchase Cost'],2),false);
        _p("</td><td>",false);
        _p(round($summary['Total Book Value'],2),false);
        _p("</td><td>",false);
        _p(round($summary['Total Depreciation'],2),false);
        _p("</td></tr></tbody></table>",false);
    }
}
?>