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

	include('../includes/header.inc.php');
	$this->RenderBegin();
?>

<?php 

	if ($this->objTransaction->EntityQtypeId == EntityQtype::Asset) {
		$strEntityType = 'Assets';
	} elseif ($this->objTransaction->EntityQtypeId == EntityQtype::Inventory) {
		$strEntityType = 'Inventory';
	}
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
	
	<div class="title"><?php echo($this->objTransaction->TransactionType->__toString() . ' ' .$strEntityType); ?></div>
	<br class="item_divide" />
	
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td class="record_field_name">Date:</td>
			<td class="record_field_value"><?php $this->lblCreationDate->Render(); ?></td>
		</tr>
		<tr>
			<td class="record_field_name">User: </td>
			<td class="record_field_value"><?php $this->lblUser->Render(); ?></td>
		</tr>
		<tr>
			<td class="record_field_name">Note:</td>
			<td class="record_field_value"><?php $this->lblNote->Render(); ?></td>
		</tr>
	</table>
	<br class="item_divide" />
		
	<?php $this->dtgEntity->Render(); ?>
	<br class="item_divide" />
	
	<br class="item_divide" />
	<a href="../assets/asset_list.php">Asset List</a>
	<br class="item_divide" />
	<a href="../inventory/inventory_model_list.php">Inventory List</a>

	<?php $this->RenderEnd() ?>		
	</body>
</html>
