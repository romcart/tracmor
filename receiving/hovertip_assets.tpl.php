<table cellpadding="0" cellspacing="8" border="0">
	<thead>
	<tr>
		<th><strong>Asset Tag</strong></th>
		<th><strong>Model</strong></th>
		<th><strong>Status</strong></th>
	</tr>
	</thead>
	<tbody>
<?php
if ($this->objAssetTransactionArray) {
	foreach ($this->objAssetTransactionArray as $intIndex => $objAssetTransaction) {
		if ($intIndex < 10) {
			printf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
			", $objAssetTransaction->Asset->AssetCode, $objAssetTransaction->Asset->AssetModel->__toString(), $objAssetTransaction->__toStringStatus());
		}
		else {
			echo '<tr><td colspan="3">More ...</td></tr>';
		}
	}
}

	
?>
	</tbody>
</table>