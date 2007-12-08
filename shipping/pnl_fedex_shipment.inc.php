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
								<td class="record_field_name">Recipient Telephone:&nbsp;</td>
								<td class="record_field_value"><?php $this->txtToPhone->RenderWithError(); $this->lblToPhone->Render(); ?>&nbsp;</td>
							</tr>
						</table>
						<br class="item_divider" />
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td colspan="2" class="fedex_subheader">Billing Details</td>
							</tr>
							<tr>
								<td class="record_field_name">Bill transportation to:&nbsp;</td>
								<td class="record_field_value"><?php $this->lstBillTransportationTo->RenderWithError(); $this->lblBillTransportationTo->Render(); ?></td>
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
					</td>
					<td style="width:16px">&nbsp;</td>
					<td style="vertical-align:top;">
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
							<!--<tr>
								<td class="record_field_name"></td>
								<td class="record_field_value"><?php //$this->chkNotificationFlag->RenderWithError(); ?>&nbsp;Send notification</td>
							</tr>-->																															
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
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

