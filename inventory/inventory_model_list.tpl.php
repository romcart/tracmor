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
<!-- Begin Search Menu -->
<?php
	$this->ctlSearchMenu->Render();
?>
<!-- End Search  Menu -->
<!--
    <div class="title">&nbsp;Inventory Search</div>
		<table style="border:1px solid #AAAAAA;background-color:#EEEEEE;font-family:verdana;font-size:10px;color:#444444;height:40px" width="100%">
			<tr>
				<td style="vertical-align:top;" noWrap>
					<?php //$this->txtShortDescription->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php //$this->txtInventoryModelCode->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php //$this->lstLocation->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;padding-right:8px;"align="right" noWrap>
					<?php //$this->btnSearch->Render() ?>&nbsp;<?php //$this->btnClear->Render() ?>
				</td>
			</tr>
			<tr>
				<td style="vertical-align:top;" noWrap>
					<?php //$this->lstCategory->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php //$this->lstManufacturer->RenderWithNameLeft("Width=150") ?>
				</td>
				<td></td>
				<td>
					<?php //$this->lblAdvanced->Render(); ?>
				</td>
			</tr>
			<tr>
			  <td style="vertical-align:top;" colspan="4" nowrap>
			  	<?php //$this->ctlAdvanced->Render(); ?>
			  </td>
			</tr>
		</table>		

		<?php //$this->dtgInventoryModel->Render() ?>
		<br />
    -->
	<?php $this->RenderEnd() ?>
	<?php 	require_once('../includes/footer.inc.php'); ?>