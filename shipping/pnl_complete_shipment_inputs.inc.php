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
		<td class="record_header">
			<?php $this->btnCompleteShipment->RenderWithError(); ?>
			<?php $this->btnCancelShipment->RenderWithError(); ?>
		</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td class="record_field_name">Package Type: </td>
					<td class="record_field_value"><?php $this->lstPackageType->RenderWithError(); ?></td>
				</tr>
				<tr>
					<td class="record_field_name">Package Weight: </td>
					<td class="record_field_value"><?php $this->txtPackageWeight->RenderWithError(); ?>&nbsp;<?php $this->lstWeightUnit->RenderWithError(); ?></td>
				</tr>
				<tr>
					<td class="record_field_name">Dimensions: </td>
					<td class="record_field_value">
						L&nbsp;<?php $this->txtPackageLength->RenderWithError(); ?>&nbsp;W&nbsp;<?php $this->txtPackageWidth->RenderWithError(); ?>&nbsp;H&nbsp;<?php $this->txtPackageHeight->RenderWithError(); ?>&nbsp;<?php $this->lstLengthUnit->RenderWithError(); ?>
					</td>
				</tr>
				<tr>
					<td class="record_field_name">Declared Value: </td>
					<td class="record_field_value"><?php $this->txtValue->RenderWithError(); ?>&nbsp;<?php $this->lstCurrencyUnit->RenderWithError(); ?></td>
				</tr>		
				<tr>
					<td class="record_field_name">Send Notification: </td>
					<td class="record_field_value"><?php $this->chkNotificationFlag->RenderWithError(); ?></td>
				</tr>
				<tr>
					<td class="record_field_name">Tracking Number: </td>
					<td class="record_field_value"><?php $this->txtTrackingNumber->RenderWithError(); ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php $this->lblPackingListLink->Render(); ?>&nbsp;<?php $this->lblFedexShippingLabelLink->Render(); ?></td>
				</tr>
			</table>			
		</td>
	</tr>
</table>
<br class="item_divider" />