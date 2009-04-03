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

$strTransactionHeader = null;
$strLocationName = null;
$strSourceName = null;

switch ($this->intTransactionTypeId) {
	case 1:  // Move
		$strTransactionHeader = '<div class="title">Move Inventory</div>';
		$strLocationName = 'Move To:';
		$strSourceName = 'Source Location:';
		break;
	case 4:  // Restock
		$strTransactionHeader = '<div class="title">Restock Inventory</div>';
		$strLocationName = 'Restock To:';
		break;
	case 5:  // Take Out
		$strTransactionHeader = '<div class="title">Take Out Inventory</div>';
		$strSourceName = 'Source Location:';
		break;
}

echo($strTransactionHeader);
?>
<br class="item_divider" />
<?php
$this->btnSave->RenderWithError();
echo('&nbsp;');
$this->btnCancel->RenderWithError();
?>
<table>
	<tr>
		<td class="record_field_name"><?php echo($strLocationName); ?></td>
		<td><?php $this->lstDestinationLocation->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td class="record_field_name">Note: </td>
		<td><?php $this->txtNote->Render() ?><br class="item_divider"/><br class="item_divider"/></td>
	</tr>
	<tr>
		<td class="record_field_name">Inventory Code:</td>
		<td>
		  <table>
		    <tr>
		      <td><?php $this->txtNewInventoryModelCode->RenderWithError(); ?></td>
		      <td><?php $this->lblLookup->Render(); ?></td>
		      <td><?php $this->btnLookup->Render(); ?></td>
		    </tr>
		  </table>
		</td>
	</tr>
	<tr>
		<td class="record_field_name"><?php echo($strSourceName); ?></td>
		<td><?php $this->lstSourceLocation->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td class="record_field_name">Quantity:</td>
		<td>
			<?php $this->txtQuantity->RenderWithError(); ?>
			<?php $this->btnAdd->Render(); ?>
		</td>
	</tr>
</table>

<?php $this->dtgInventoryTransact->RenderWithError(); ?>
<?php $this->ctlInventorySearchTool->Render(); ?>
