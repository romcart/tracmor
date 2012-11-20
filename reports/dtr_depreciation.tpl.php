<div class="description">
    <b>Asset #<?php _p($_ITEM->getEndDate());
        ?></b><br/>
    Asset Code: <b><?php  _p($_ITEM->AssetCode); ?></b><br/>
    Asset Model Name: <?php  _p($_ITEM->AssetModel->ShortDescription); ?><br/>
    Purchase Cost: <b><?php  _p($_ITEM->PurchaseCost); ?></b><br/>
    Purchase Date: <b><?php  _p($_ITEM->PurchaseDate); ?></b><br/>
    <?php
    //Predefining Book Value Purchase Cost – (Purchase Cost * ((current date – purchase date)/life))
    $interval = QDateTime::Now()->diff($_ITEM->PurchaseDate);
    $interval = $interval->y*12 + $interval->m;
    $fltBookValue =	$_ITEM->PurchaseCost - ($_ITEM->PurchaseCost * ($interval/$_ITEM->AssetModel->DepreciationClass->Life));
    ?>
    Current Depreciation:<?php _p($_ITEM->PurchaseCost - $fltBookValue) ?><br/>
    Book Value:<?php _p($fltBookValue) ?><br/>
</div>

<?php
if ((($_CONTROL->CurrentItemIndex % 2) != 0) ||
    ($_CONTROL->CurrentItemIndex == count($_CONTROL->DataSource) - 1))
    _p('<br style="clear:both;"/>', false);
?>