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
	$this->dlgExchange->Render();
	$this->dlgDueDate->Render();
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

	<div class="title">Shipping: <?php $this->lblHeaderShipment->Render(); ?></div>
	<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
		<tr>
			<td class="record_header">
				<?php $this->lblFedexShippingLabelLink->Render(); ?>
				&nbsp;
				<?php $this->lblPackingListLink->Render(); ?>
				<?php
					if (!$this->objShipment->ShippedFlag) { 
						$this->btnEdit->Render();
						$this->btnSave->RenderWithError();
						echo('&nbsp;');
						$this->btnCompleteShipment->RenderWithError();
						echo('&nbsp;');
						$this->btnDelete->RenderWithError();
						$this->btnCancel->RenderWithError();
					}
					else {
						echo('&nbsp;');
						$this->btnCancelCompleteShipment->RenderWithError();
					}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td style="vertical-align:top;">
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td colspan="2" class="record_subheader">Sender Information</td>
								</tr>
								<tr>
									<td class="record_field_name">Company:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstFromCompany->RenderWithError();$this->lblFromCompany->Render(); $this->lblNewFromCompany->RenderWithError(); ?></td>
								</tr>
								<tr>
									<td class="record_field_name">Contact:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstFromContact->RenderWithError();$this->lblFromContact->Render(); $this->lblNewFromContact->RenderWithError();  ?></td>
								</tr>
								<tr>
									<td class="record_field_name">Address:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstFromAddress->RenderWithError();$this->lblFromAddress->Render();  $this->lblNewFromAddress->RenderWithError(); ?><br><?php $this->lblFromAddressFull->Render(); ?></td>
								</tr>
							</table>
							<br class="item_divider" />
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td colspan="2" class="record_subheader">Recipient Information</td>
								</tr>
								<tr>
									<td class="record_field_name">Company:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstToCompany->RenderWithError();$this->lblToCompany->Render(); $this->lblNewToCompany->RenderWithError(); ?></td>
								</tr>
								<tr>
									<td class="record_field_name">Contact:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstToContact->RenderWithError();$this->lblToContact->Render();  $this->lblNewToContact->RenderWithError(); ?></td>
								</tr>
								<tr>
									<td class="record_field_name">Address:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstToAddress->RenderWithError();$this->lblToAddress->Render(); $this->lblNewToAddress->RenderWithError(); ?><br><?php $this->lblToAddressFull->Render(); ?></td>
								</tr>						
							</table>
						</td>
						<td style="width:16px">&nbsp;</td>
						<td style="vertical-align:top;">
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td colspan="2" class="record_subheader">Shipment Information</td>
								</tr>
								<tr>
									<td class="record_field_name">Shipping Courier:&nbsp;</td>
									<td class="record_field_value"><?php $this->lstCourier->RenderWithError();$this->lblCourier->Render(); ?>&nbsp;</td>
								</tr>
								<?php $tnDisplay = ($this->blnEditMode && $this->objShipment->CourierId===1 && !$this->objShipment->ShippedFlag) ? "display:none;" : ""; ?>
								<tr id="trackingNumber" style="<?php echo($tnDisplay); ?>">
									<td class="record_field_name">Tracking Number:&nbsp;</td>
									<td class="record_field_value"><?php $this->txtTrackingNumber->RenderWithError();$this->lblTrackingNumber->Render(); ?>&nbsp;</td>
								</tr>								
								<tr>
									<td class="record_field_name">Note:&nbsp;</td>
									<td class="record_field_value"><?php $this->txtNote->RenderWithError();$this->pnlNote->Render(); ?>&nbsp;</td>
								</tr>									
								<tr>
									<td class="record_field_name">Ship Date:&nbsp;</td>
									<td class="record_field_value"><?php $this->calShipDate->RenderWithError();$this->lblShipDate->Render(); ?>&nbsp;</td>
								</tr>									
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>	

<br class="item_divider" />
<?php $this->pnlFedExShipment->Render(); ?>
<br class="item_divider" />
<div class="title">Assets to Ship</div>
<table>
	<tr>
		<td><?php $this->txtNewAssetCode->RenderDesigned(); ?></td>
		<td><?php $this->btnAddAsset->Render(); //$this->lblAdvanced->Render(); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php //$this->chkScheduleReceipt->RenderDesigned('DisplayName=false'); //$this->rblAssetType->RenderDesigned(); //$this->txtReceiptAssetCode->RenderDesigned(); //$this->chkAutoGenerateAssetCode->RenderDesigned('DisplayName=false'); ?></td>
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

<?php $this->dlgNew->Render(); ?>
<?php $this->RenderEnd() ?>
<?php include('../includes/footer.inc.php'); ?>