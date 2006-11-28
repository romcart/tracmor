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

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php print('../css/tracmor.css'); ?>"></link>
		<title>Packing List</title>
	</head>
	<body>
	<?php $this->RenderBegin() ?>
	<table>
		<tr>
			<td class="packing_slip_field">Shipment Number:</td>
			<td class="packing_slip_value"><?php $this->lblShipmentNumber->Render(); ?></td>
		</tr>
				<tr>
			<td class="packing_slip_field">Ship Date:</td>
			<td class="packing_slip_value"><?php $this->lblShipDate->Render(); ?></td>
		</tr>
				<tr>
			<td class="packing_slip_field">Ship To:</td>
			<td class="packing_slip_value">
				<?php $this->lblToContact->Render(); ?>
				<?php $this->lblToAddress->Render(); ?>
			</td>
		</tr>
				<tr>
			<td class="packing_slip_field">Via:</td>
			<td class="packing_slip_value"><?php $this->lblCourier->Render(); ?></td>
		</tr>
	</table>
	
	
	
	<br class="item_divider" />
	
	
	<br class="item_divider" />
	
	<?php $this->dtgItem->Render(); ?>
	<br class="item_divider" />
	
	<?php $this->RenderEnd() ?>
	</body>
</html>