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

	// Build array of all fields to display
	$arrShipmentFields[] = array('name' => 'Package Type:',  'value' => $this->lblPackageType->Render(false));
	$arrShipmentFields[] = array('name' => 'Package Weight:',  'value' => $this->lblPackageWeight->Render(false) . '&nbsp;' . $this->lblWeightUnit->Render(false));
	$arrShipmentFields[] = array('name' => 'Package Dimensions:',  'value' => 'L'.$this->lblPackageLength->Render(false).'&nbsp;W'.$this->lblPackageWidth->Render(false).'&nbsp;H'.$this->lblPackageHeight->Render(false) . '&nbsp;' . $this->lblLengthUnit->Render(false));
	$arrShipmentFields[] = array('name' => 'Declared Value:',  'value' => $this->lblValue->Render(false).'&nbsp;'.$this->lblCurrencyUnit->Render(false));
	$arrShipmentFields[] = array('name' => 'Send Notification:',  'value' => $this->lblNotificationFlag->Render(false));
	$arrShipmentFields[] = array('name' => 'Tracking Number:',  'value' => $this->lblTrackingNumber->Render(false));
?>

<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
	<tr>
		<td class="record_header">
			&nbsp;
			<?php $this->lblFedexShippingLabelLink->Render(); ?>
			&nbsp;
			<?php $this->lblPackingListLink->Render(); ?>
		</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0">
			<?php
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
