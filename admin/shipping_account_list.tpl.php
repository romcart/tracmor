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
		<div class="title">Shipping/Receiving</div>
		<div style="padding:5px"><?php $this->pnlSaveNotification->Render(); ?></div>
		<table class="datagrid" cellpadding="5" cellspacing="0">
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
							<td class="record_field_name">Default Company:</td>
							<td class="record_field_edit"><?php $this->lstCompany->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Default FedEx&reg; Account:</td>
							<td class="record_field_edit"><?php $this->lstFedexAccount->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">FedEx&reg; Gateway URI:</td>
							<td class="record_field_edit"><?php $this->txtFedexGatewayUri->RenderWithError(); ?></td>
						</tr>			
						<tr>
							<td class="record_field_name">Detect Tracking Numbers:</td>
							<td class="record_field_edit"><?php $this->chkAutoDetectTrackingNumbers->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Packing List Terms:</td>
							<td class="record_field_edit"><?php $this->fckPackingListTerms->RenderWithError(); ?></td>
						</tr>
					</table>	
				</td>
			</tr>
		</table>
		<br class="item_divider" />		
		<div class="title"><?php _t('Shipping Accounts'); ?></div>		
		<br class="item_divider" />	
		<?php $this->btnNew->Render() ?>
		<br class="item_divider" />
		<?php $this->dtgShippingAccount->Render() ?>

	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>	