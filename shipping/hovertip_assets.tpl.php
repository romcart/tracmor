<table cellpadding="0" cellspacing="8" border="0">
	<thead>
	<tr>
		<th><strong>Asset Code</strong></th>
		<td><strong>Model</strong></th>
		<th><strong>Location</strong></th>
	</tr>
	</thead>
	<tbody>
<?php
if ($this->objAssetTransactionArray) {
	//print_r($this->objAssetTransactionArray); exit;
	foreach ($this->objAssetTransactionArray as $intIndex => $objAssetTransaction) {
		//print_r($objAssetTransaction); exit;
/*		if ($intIndex < 10) {
			printf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
			", $objAssetTransaction->Asset->AssetCode, $objAssetTransaction->Asset->AssetModel->__toString(), $objAssetTransaction->Asset->Location->__toString());
		}
		else {
			echo '<tr><td colspan="3">More ...</td></tr>';
		}*/
		if ($intIndex < 10) {
			printf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
			", $objAssetTransaction['asset_transaction__asset_id__asset_code'], $objAssetTransaction['asset_transaction__asset_id__asset_model_id__short_description'], $objAssetTransaction['asset_transaction__source_location_id__short_description']);
		}
		else {
			echo '<tr><td colspan="3">More ...</td></tr>';
		}
	}
	$this->objAssetTransactionArray = null;
}

	
?>
	</tbody>
</table>