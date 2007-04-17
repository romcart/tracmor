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
	<div style="border:1px solid #000000;background-color:#AAAAAA;text-align:center;padding-top:0.03in;">
		<strong style="color:#FFFFFF;font-size:11pt;">Packing Slip</strong>
	</div>
	<table width="100%">
		<tr>
			<td class="packing_slip_value" style="line-height:1.2">
				<?php $this->lblLogo->Render(); ?><br>
				<?php $this->lblFromAddress->Render(); ?>
			</td>
			<td align="right" style="vertical-align:top;">
				<table style="border:1px solid #000000;" align="right">
					<tr>
						<td class="packing_slip_value" style="line-height:1.2">
							Shipment #:  <?php $this->lblShipmentNumber->Render(); ?><br>
							Shipped:  <?php $this->lblShipDate->Render(); ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><br>
				<table style="width:3.5in;border:1px solid #000000;" cellspacing="0" cellpadding="4">
					<tr>
						<td colspan="2" style="background-color:#DDDDDD;border-bottom:1px solid #000000;"><strong>Ship To:</strong></td>
					</tr>
					<tr>
						<td class="packing_slip_value" style="line-height:1.2">
							<?php $this->lblToContact->Render(); ?><br>
							<?php $this->lblToCompany->Render(); ?><br>
							<?php $this->lblToAddress->Render(); ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>			
	</table>
	
	
	
	<br class="item_divider" />
	<br class="item_divider" />
	
	<?php $this->dtgItem->Render(); ?>
	<br class="item_divider" />
	<br class="item_divider" />
	<br class="item_divider" />
	<?php $this->lblTerms->Render(); ?>
	<?php $this->RenderEnd() ?>
	</body>
</html>