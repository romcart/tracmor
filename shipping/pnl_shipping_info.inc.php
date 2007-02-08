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
 
	// Build array of all fields to display
	$arrShipmentFields[] = array('name' => 'Shipment Number:',  'value' => $this->lblShipmentNumber->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship Date:', 'value' => $this->calShipDate->RenderWithError(false) . $this->lblShipDate->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship From Contact:', 'value' => $this->lstFromContact->RenderWithError(false) . $this->lblFromContact->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship From Address:', 'value' => $this->lstFromAddress->RenderWithError(false) . $this->lblFromAddress->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship To Company:', 'value' => $this->lstToCompany->RenderWithError(false) . $this->lblToCompany->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship To Contact:', 'value' => $this->lstToContact->RenderWithError(false) . $this->lblToContact->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship To Address:', 'value' => $this->lstToAddress->RenderWithError(false) . $this->lblToAddress->Render(false) . '<br>' . $this->lblToAddressFull->Render(false));
	$arrShipmentFields[] = array('name' => 'To Telephone:', 'value' => $this->txtToPhone->RenderWithError(false) . $this->lblToPhone->Render(false));
	$arrShipmentFields[] = array('name' => 'Shipping Courier:',  'value' => $this->lstCourier->RenderWithError(false));
	$arrShipmentFields[] = array('name' => 'Other Courier:', 'value' => $this->txtCourierOther->RenderWithError(false) . $this->lblCourier->Render(false));
	$arrShipmentFields[] = array('name' => 'Bill Transportation To:', 'value' => $this->lstShippingAccount->RenderWithError(false));
	$arrShipmentFields[] = array('name' => 'Other Account:', 'value' => $this->txtShippingAccountOther->RenderWithError(false) . $this->lblShippingAccount->Render(false));
	$arrShipmentFields[] = array('name' => 'Service Type:', 'value' => $this->lstFxServiceType->RenderWithError(false) . $this->lblFxServiceType->Render(false));
	$arrShipmentFields[] = array('name' => 'Reference:', 'value' => $this->txtReference->RenderWithError(false) . $this->lblReference->Render(false));
	$arrShipmentFields[] = array('name' => 'Note:', 'value' => $this->txtNote->RenderWithError(false) . $this->pnlNote->Render(false));
?>

<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
	<tr>
		<td class="record_header">
			<?php
				$this->btnEdit->Render();
				$this->btnSave->RenderWithError();
				echo('&nbsp;');
				$this->btnCancel->RenderWithError();
			?>
		</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="vertical-align:top;">
						<table cellpadding="0" cellspacing="0">
						<?php
							for ($i=0;$i<ceil(count($arrShipmentFields)/2);$i++) {
								echo('<tr>');
								echo('<td class="record_field_name">'. $arrShipmentFields[$i]['name'] .'&nbsp;</td>');
								echo('<td class="record_field_value">'. $arrShipmentFields[$i]['value'] .'&nbsp;</td>');
								echo('</tr>');
							}
						?>
						</table>
					</td>
					<td style="vertical-align:top;">
						<table cellpadding="0" cellspacing="0">
						<?php
							for ($i=ceil(count($arrShipmentFields)/2);$i<count($arrShipmentFields);$i++) {
								echo('<tr>');
								echo('<td class="record_field_name">'. $arrShipmentFields[$i]['name'] .'&nbsp;</td>');
								echo('<td class="record_field_value">'. $arrShipmentFields[$i]['value'] .'&nbsp;</td>');
								echo('</tr>');
							}
						?>				
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br class="item_divider" />
<div class="title">Assets to Ship</div>
<table>
	<tr>
		<td><?php $this->txtNewAssetCode->RenderDesigned(); ?></td>
		<td><?php $this->btnAddAsset->Render(); echo('&nbsp;'); $this->lblAdvanced->Render(); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php $this->chkScheduleReceipt->RenderDesigned('DisplayName=false'); $this->rblAssetType->RenderDesigned(); $this->txtReceiptAssetCode->RenderDesigned(); $this->chkAutoGenerateAssetCode->RenderDesigned('DisplayName=false'); ?></td>
	</tr>
</table>
<?php $this->dtgAssetTransact->Render(); ?>
<br class="item_divider" />
	
<div class="title">Inventory to Ship</div>	
<table>
	<tr>
		<td><?php $this->txtNewInventoryModelCode->RenderDesigned(); ?></td>
		<td><?php $this->btnLookup->Render(); ?></td>
	</tr>
	<tr>
		<td><?php $this->lstSourceLocation->RenderDesigned(); ?></td>
		<td></td>
	</tr>
	<tr>
		<td><?php $this->txtQuantity->RenderDesigned(); ?></td>
		<td><?php $this->btnAddInventory->Render(); ?></td>
	</tr>
</table>	
<?php $this->dtgInventoryTransact->Render(); ?>

