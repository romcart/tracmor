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
/**
 *  @var DepreciationListForm $this
 */
include('../includes/header.inc.php');
$this->RenderBegin();
?>
<!-- Begin Header Menu -->
<?php
$this->ctlHeaderMenu->Render();
?>
<!-- End Header Menu -->

<!-- Begin Shortcut Menu -->
<?php
$this->ctlShortcutMenu->Render();
?>
<!-- End Shortcut Menu -->
</td>
<td>
    <img src="../images/empty.gif" width="10">
</td>
<td width="100%" valign="top">
    <div class="title">&nbsp;Depreciation Reports</div>
    <table style="border:1px solid #AAAAAA;background-color:#EEEEEE;font-family:verdana;font-size:10;color:#444444;height:40" width="100%">
        <tr>
            <td class="item_label">
                <span>End Date </span>
                <?php $this->lstEndDate->RenderWithError("Width=100"); ?>
                <br />
                &nbsp;&nbsp;&nbsp;<?php $this->dtpEndDateFirst->RenderWithError(); ?>
                <br />
                &nbsp;&nbsp;&nbsp;<?php $this->dtpEndDateLast->RenderWithError(); ?>
            </td>
            <td style="vertical-align:top;" noWrap>
                <?php $this->lstSortByDate->RenderWithNameLeft("Width=100"); ?>
            </td>
            <td style="vertical-align:top;" noWrap>
                <?php $this->lstGenerateOptions->Render("Width=90"); ?>&nbsp;<?php $this->btnGenerate->Render() ?>&nbsp;<?php $this->btnClear->Render() ?>
            </td>
        </tr>
    </table>
    <?php $this->lblReport->RenderWithError(); ?>
    <?php if($this->dtrDepreciation instanceof QDataRepeater):?>

    <?php     $this->dtrDepreciation->Render();?>
<!--        <p>Total Purchase Cost:--><?php // echo ($this->totals[2]); ?><!--</p>-->
<!--        <p>Total Depreciation: --><?php // echo ($this->totals[1]); ?><!--</p>-->
<!--        <p>Total Book Value:   --><?php // echo ($this->totals[2] - $this->totals[1]); ?><!--</p>-->
    <?php endif;?>

    <?php  $this->RenderEnd() ?>
<?php 	require_once('../includes/footer.inc.php'); ?>