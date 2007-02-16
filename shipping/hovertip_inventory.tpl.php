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
		if ($intIndex < 10) {		
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
		}
	}
}
?>
	</tbody>
</table>