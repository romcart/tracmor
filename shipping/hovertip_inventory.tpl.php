<table cellpadding="0" cellspacing="8" border="0">
	<thead>
	<tr>
		<th><strong>Inventory Code</strong></th>
		<td><strong>Inventory Model</strong></th>
		<th><strong>Source Location</strong></th>
		<th><strong>Quantity</strong></th>
	</tr>
	</thead>
	<tbody>
<?php
if ($this->objInventoryTransactionArray) {
	foreach ($this->objInventoryTransactionArray as $intIndex => $objInventoryTransaction) {
/*		if ($intIndex < 10) {		
			printf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
			", $objInventoryTransaction->InventoryLocation->InventoryModel->__toString(), $objInventoryTransaction->InventoryLocation->InventoryModel->ShortDescription, $objInventoryTransaction->SourceLocation->__toString(), $objInventoryTransaction->Quantity);
		}
		else {
			echo '<tr><td colspan="4">More ...</td></tr>';
		}*/
		if ($intIndex < 10 && !($objInventoryTransaction instanceof InventoryTransaction)) {		
			printf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
			", $objInventoryTransaction['inventory_transaction__inventory_location_id__inventory_model_id__inventory_model_code'], $objInventoryTransaction['inventory_transaction__inventory_location_id__inventory_model_id__short_description'], $objInventoryTransaction['inventory_transaction__inventory_location_id__location_id__short_description'], $objInventoryTransaction['quantity']);
		}
		else {
			echo '<tr><td colspan="4">More ...</td></tr>';
		}
	}
	$this->objInventoryTransactionArray = null;
}
?>
	</tbody>
</table>