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
	include('shortcut_menu.inc.php');
?>
<!-- End Shortcut Menu -->
		</td>
		<td>
			<img src="../images/empty.gif" width="10">
		</td>
		<td width="100%" valign="top">
		<div class="title">Administration Settings</div>
		<div class="instructions" style="font-size:10;">
			Update the administrative settings below and save the changes.<br /><br />
		</div>
		<table class="datagrid" cellpadding="5" cellspacing="0" border="0">
			<tr>
				<td class="record_header">
					<?php 
						$this->btnSave->Render();
						echo('&nbsp;');
					?>
				</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td class="record_field_name">Minimum Asset Code: </td>
							<td class="record_field_edit"><?php $this->txtMinAssetCode->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Image Upload Prefix: </td>
							<td class="record_field_edit"><?php $this->txtImageUploadPrefix->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Fedex Gateway Uri: </td>
							<td class="record_field_edit"><?php $this->txtFedexGatewayUri->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Form State Path: </td>
							<td class="record_field_edit"><?php $this->txtFormStatePath->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Packing List Terms: </td>
							<td class="record_field_edit"><?php $this->txtPackingListTerms->RenderWithError("Rows=10"); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>		
		
<?php $this->RenderEnd() ?>		
<?php require_once('../includes/footer.inc.php'); ?>