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


?>

<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
	<tr>
		<td class="fedex_masthead">
			<img src="../images/fedexlogo.png" alt="&nbsp;&nbsp;FedEx">
		</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="vertical-align:top;">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td class="record_field_name">Recipient Phone:&nbsp;</td>
								<td class="record_field_value"><?php $this->txtToPhone->RenderWithError(); $this->lblToPhone->Render(); ?>&nbsp;</td>
							</tr>
						</table>
						<br class="item_divider" />
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="fedex_subheader">Billing Details</td>
							</tr>
							<tr>
								<td class="record_field_name">Bill to:&nbsp;</td>
								<td class="record_field_value"><?php $this->lstBillTransportationTo->RenderWithError(); $this->lblBillTransportationTo->Render(); ?>&nbsp;</td>
							</tr>
							<tr>
								<td class="record_field_name"><?php $this->lblSenderLabel->Render(); ?>:&nbsp;</td>
								<td class="record_field_value"><?php $this->lstShippingAccount->RenderWithError();$this->txtRecipientThirdPartyAccount->RenderWithError(); $this->lblPayerAccount->Render(); ?>&nbsp;</td>
							</tr>			
							<tr>
								<td class="record_field_name">Your reference:&nbsp;</td>
								<td class="record_field_value"><?php $this->txtReference->RenderWithError(); $this->lblReference->Render(); ?>&nbsp;</td>
							</tr>			
						</table>
						<br class="item_divider" />
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="fedex_subheader">Package & Shipment Details</td>
							</tr>
							<tr>
								<td class="record_field_name">Service Type:&nbsp;</td>
								<td class="record_field_value"><?php $this->lstFxServiceType->RenderWithError(); $this->lblFxServiceType->Render(); ?>&nbsp;</td>
							</tr>
							<tr>
								<td class="record_field_name">Package Type:&nbsp;</td>
								<td class="record_field_value"><?php $this->lstPackageType->RenderWithError(); $this->lblPackageType->RenderWithError(); ?>&nbsp;</td>
							</tr>	
							<tr>
								<td class="record_field_name">Estimated Weight:&nbsp;</td>
								<td class="record_field_value"><?php $this->txtPackageWeight->RenderWithError(); $this->lblPackageWeight->RenderWithError(); ?>&nbsp;<?php $this->lstWeightUnit->RenderWithError(); ?>&nbsp;<?php $this->lblWeightUnit->Render(); ?></td>
							</tr>
							<tr>
								<td class="record_field_name">Dimensions:&nbsp;</td>
								<td class="record_field_value">L&nbsp;<?php $this->txtPackageLength->RenderWithError(); $this->lblPackageLength->Render(); ?>&nbsp;W&nbsp;<?php $this->txtPackageWidth->RenderWithError(); $this->lblPackageWidth->Render(); ?>&nbsp;H&nbsp;<?php $this->txtPackageHeight->RenderWithError(); $this->lblPackageHeight->Render(); ?>&nbsp;<?php $this->lstLengthUnit->RenderWithError(); ?>&nbsp;<?php $this->lblLengthUnit->Render(); ?></td>
							</tr>		
							<tr>
								<td class="record_field_name">Declared Value:&nbsp;</td>
								<td class="record_field_value"><?php $this->txtValue->RenderWithError(); $this->lblValue->Render(); ?>&nbsp;<?php $this->lstCurrencyUnit->RenderWithError(); ?>&nbsp;<?php $this->lblCurrencyUnit->Render(); ?></td>
							</tr>
						</table>								
					</td>
					<td style="width:16px">&nbsp;</td>
					<td style="vertical-align:top;">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="fedex_subheader">Special Services</td>
							</tr>
							<tr>
								<td class="record_field_name">Saturday Delivery:&nbsp;</td>
								<td class="record_field_value"><?php $this->chkSaturdayDeliveryFlag->RenderWithError(); ?></td>
							</tr>
							<tr>
								<td class="record_field_name">Hold at Location:&nbsp;</td>
								<td class="record_field_value"><?php $this->chkHoldAtLocationFlag->RenderWithError(); ?></td>
							</tr>									
						</table>
						<?php $HALDisplay = ($this->blnEditMode && $this->objShipment->CourierId===1 && $this->objFedexShipment->HoldAtLocationFlag) ? "" : "display:none;"; ?>
						<table style="<?php echo($HALDisplay); ?>" cellpadding="0" cellspacing="0" id="HAL">
							<tr><td></td><td><div style="font-size:8pt;">Enter the address of the FedEx location where the package is to be held. This service is not available at every FedEx location. Contact your local FedEx office for more details.</div></tr>
							<tr>
								<td class="record_field_name">Address</td>
								<td class="record_field_value"><?php $this->txtHoldAtLocationAddress->RenderWithError(); $this->lblHoldAtLocationAddress->Render(); ?>&nbsp;</td>
							</tr>
							<tr>
								<td class="record_field_name">City</td>
								<td class="record_field_value"><?php $this->txtHoldAtLocationCity->RenderWithError(); $this->lblHoldAtLocationCity->Render(); ?>&nbsp;</td>
							</tr>
							<tr>
								<td class="record_field_name">State</td>
								<td class="record_field_value"><?php $this->lstHoldAtLocationState->RenderWithError(); $this->lblHoldAtLocationState->Render(); ?>&nbsp;</td>
							</tr>
							<tr>
								<td class="record_field_name">Postal Code</td>
								<td class="record_field_value"><?php $this->txtHoldAtLocationPostalCode->RenderWithError(); $this->lblHoldAtLocationPostalCode->Render(); ?>&nbsp;</td>
							</tr>														
						</table>
						<br class="item_divider" />
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="fedex_subheader">Shipment Notifications</td>
							</tr>
							<tr>
								<td class="record_field_name">Sender:&nbsp;</td>
								<td class="record_field_value">
									<?php $this->txtFedexNotifySenderEmail->RenderWithError(); $this->lblFedexNotifySenderEmail->Render(); ?>&nbsp;<br>
									<?php $this->chkFedexNotifySenderShipFlag->RenderWithError(); ?>Ship&nbsp;&nbsp;&nbsp;<?php $this->chkFedexNotifySenderExceptionFlag->RenderWithError(); ?>Exception&nbsp;&nbsp;&nbsp;<?php $this->chkFedexNotifySenderDeliveryFlag->RenderWithError(); ?>Delivery
								</td>
							</tr>
							<tr>
								<td class="record_field_name">Recipient:&nbsp;</td>
								<td class="record_field_value">
									<?php $this->txtFedexNotifyRecipientEmail->RenderWithError(); $this->lblFedexNotifyRecipientEmail->Render(); ?>&nbsp;<br>
									<?php $this->chkFedexNotifyRecipientShipFlag->RenderWithError(); ?>Ship&nbsp;&nbsp;&nbsp;<?php $this->chkFedexNotifyRecipientExceptionFlag->RenderWithError(); ?>Exception&nbsp;&nbsp;&nbsp;<?php $this->chkFedexNotifyRecipientDeliveryFlag->RenderWithError(); ?>Delivery
								</td>
							</tr>
							<tr>
								<td class="record_field_name">Other:&nbsp;</td>
								<td class="record_field_value">
									<?php $this->txtFedexNotifyOtherEmail->RenderWithError(); $this->lblFedexNotifyOtherEmail->Render(); ?>&nbsp;<br>
									<?php $this->chkFedexNotifyOtherShipFlag->RenderWithError(); ?>Ship&nbsp;&nbsp;&nbsp;<?php $this->chkFedexNotifyOtherExceptionFlag->RenderWithError(); ?>Exception&nbsp;&nbsp;&nbsp;<?php $this->chkFedexNotifyOtherDeliveryFlag->RenderWithError(); ?>Delivery
								</td>
							</tr>					
						</table>
						<br class="item_divider" />
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="fedex_subheader">Shipping Label</td>
							</tr>
							<tr>
								<td class="record_field_name">Printer Type:&nbsp;</td>
								<td class="record_field_value">
									<?php $this->lstFedexLabelPrinterType->RenderWithError(); $this->lblFedexLabelPrinterType->Render(); ?>
								</td>
							</tr>
						</table>
						<?php $TLPDisplay = ($this->blnEditMode && $this->objShipment->CourierId===1 && $this->objFedexShipment->LabelPrinterType!='1') ? "" : "display:none;"; ?>
						<table style="<?php echo($TLPDisplay); ?>" cellpadding="0" cellspacing="0" id="TLP">
							<tr>
								<td class="record_field_name">Label Format:&nbsp;</td>
								<td class="record_field_value">
									<?php $this->lstFedexLabelFormatType->RenderWithError(); $this->lblFedexLabelFormatType->Render(); ?>
								</td>
							</tr>
							<tr>
								<td class="record_field_name">Printer Port:&nbsp;</td>
								<td class="record_field_value">
									<?php $this->txtFedexThermalPrinterPort->RenderWithError(); $this->lblFedexThermalPrinterPort->Render(); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

