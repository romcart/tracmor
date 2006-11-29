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
	$arrShipmentFields[] = array('name' => 'Shipping Courier:',  'value' => $this->lblCourier->Render(false));
	$arrShipmentFields[] = array('name' => 'Ship Date:',  'value' => $this->lblShipDate->Render(false));
	$arrShipmentFields[] = array('name' => 'Bill Transportation To:',  'value' => $this->lblShippingAccount->Render(false));
	$arrShipmentFields[] = array('name' => 'From Contact:',  'value' => $this->lblFromContact->Render(false));
	$arrShipmentFields[] = array('name' => 'Service Type:',  'value' => $this->lblFxServiceType->Render(false));
	$arrShipmentFields[] = array('name' => 'From Address:',  'value' => $this->lblFromAddress->Render(false));
	$arrShipmentFields[] = array('name' => 'Reference:',  'value' => $this->lblReference->Render(false));	
	$arrShipmentFields[] = array('name' => 'To Company:',  'value' => $this->lblToCompany->Render(false));
	$arrShipmentFields[] = array('name' => 'Note:',  'value' => $this->pnlNote->Render(false));
	$arrShipmentFields[] = array('name' => 'To Contact:',  'value' => $this->lblToContact->Render(false));
	$arrShipmentFields[] = array('name' => 'To Address:',  'value' => $this->lblToAddress->Render(false));
	$arrShipmentFields[] = array('name' => 'To Telphone:', 'value' => $this->lblToPhone->Render(false));
	

	$newRow = true;
	for ($i=0;$i<count($arrShipmentFields);$i++) {
		if ($newRow) {
			echo('<tr>');
		}
		echo('<td class="record_field_name">'. $arrShipmentFields[$i]['name'] .'&nbsp;</td>');
		echo('<td class="record_field_value">'. $arrShipmentFields[$i]['value'] .'&nbsp;</td>');

		if (!$newRow) {
			echo("</tr>");
			$newRow = true;
		} else {
			echo("<td>&nbsp;</td>");
			if ($i == count($arrShipmentFields) - 1) {
				echo('<td></td></tr>');
			}
			$newRow = false;
		}
	}
?>

			</table>
		</td>
	</tr>
</table>
<br class="item_divider" />
<div class="title">Assets to Ship</div>
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
  $this->dtgAssetTransact->Render(); ?>
<br class="item_divider" />
<div class="title">Inventory to Ship</div>
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
  $this->dtgInventoryTransact->Render(); ?>