<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc.
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
    <div class="title">&nbsp;Asset Transaction Reports</div>
		<table style="border:1px solid #AAAAAA;background-color:#EEEEEE;font-family:verdana;font-size:10;color:#444444;height:40" width="100%">
			<tr>
			 <td colspan="3">
			   <table>
			     <tr>
			       <td class="item_label">Transaction Type:</span></td>
			       <td><?php $this->chkMove->Render(); ?></td>
			       <td><?php $this->chkCheckIn->Render(); ?></td>
			       <td><?php $this->chkCheckOut->Render(); ?></td>
			       <td><?php $this->chkReserve->Render(); ?></td>
			       <td><?php $this->chkUnreserve->Render(); ?></td>
			     </tr>
			     <tr>
			       <td class="item_label">Custom Fields:</span></td>
			       <td colspan="5"><?php $this->pnlCustomFields->Render(); ?></td>
			     </tr>
			   </table>
			 </td>
			</tr>
		  <tr>
				<td style="vertical-align:top;" noWrap>
					<?php $this->txtShortDescription->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php $this->txtAssetCode->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php $this->txtAssetModelCode->RenderWithNameLeft("Width=150") ?>
				</td>
			</tr>
			<tr>
        <td style="vertical-align:top;" noWrap>
          <?php $this->lstUser->RenderWithNameLeft("Width=150") ?>
        </td>
        <td style="vertical-align:top;" noWrap>
          <?php $this->lstCheckedOutBy->RenderWithNameLeft("Width=150") ?>
        </td>
        <td style="vertical-align:top;" noWrap>
          <?php $this->lstReservedBy->RenderWithNameLeft("Width=150") ?>
        </td>
			</tr>
			<tr>
				<td style="vertical-align:top;" noWrap>
					<?php $this->lstCategory->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php $this->lstManufacturer->RenderWithNameLeft("Width=150") ?>
				</td>
			</tr>
			<tr>
			  <td class="item_label">
			   <span>Transaction Date </span>
  			  <?php $this->lstTransactionDate->RenderWithError("Width=100"); ?>
  			  <br />
  			  &nbsp;&nbsp;&nbsp;<?php $this->dtpTransactionDateFirst->RenderWithError(); ?>
  			  <br />
  			  &nbsp;&nbsp;&nbsp;<?php $this->dtpTransactionDateLast->RenderWithError(); ?>
			  </td>
			  <td style="vertical-align:top;" noWrap>
			   <?php $this->lstSortByDate->RenderWithNameLeft("Width=100"); ?>
			  </td>
			  <td style="vertical-align:top;padding-right:8;" align="right" noWrap>
      	  <?php $this->btnGenerate->Render() ?>&nbsp;<?php $this->btnClear->Render() ?>
      	</td>
			</tr>
	 </table>
    <?php $this->lblReport->RenderWithError(); ?>
		<br />

	<?php  $this->RenderEnd() ?>
	<?php 	require_once('../includes/footer.inc.php'); ?>