<?php
/* @var reportDataRepeater $_CONTROL */

if ($_CONTROL->CurrentItemIndex == 0) {
    _p("<table>
            <thead style='background-color:#0000ff;color:#ffffff'>
                <th>Asset Code</th>
                <th>Asset Model Name </th>
                <th>Purchase Cost</th>
                <th>Purchase Date</th>
                <th>Current Depreciation</th>
                <th>Book Value</th>
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
    <td><?php  _p($_ITEM->PurchaseCost); ?></td>
    <td><?php  _p($_ITEM->PurchaseDate); ?></td>

    <?php
    //Predefining Book Value Purchase Cost – (Purchase Cost * ((current date – purchase date)/life))
    $interval = QDateTime::Now()->diff($_ITEM->PurchaseDate);
    $interval = $interval->y*12 + $interval->m;
    $fltBookValue =	$_ITEM->PurchaseCost - ($_ITEM->PurchaseCost * ($interval/$_ITEM->AssetModel->DepreciationClass->Life));
    ?>
    <td><?php _p($_ITEM->PurchaseCost - $fltBookValue) ?>
    </td>
    <td><?php _p($fltBookValue) ?></td>
</tr>

<?php
if($_CONTROL->CurrentItemIndex == count($_CONTROL->DataSource) - 1){
    _p("</tbody><tfoot>",false);
    _p($_CONTROL->getSummaryHtml(),false);
    _p("</tfoot></table>",false);
}
?>