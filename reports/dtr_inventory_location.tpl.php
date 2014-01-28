<?php

if ($_CONTROL->CurrentItemIndex == 0) {
	_p("<br/><table border='0' cellpadding='5' cellspacing='0'>
			<thead style='background-color:#eeeeee;color:#000000;'>
				<th><b>Location</b></th>
				<th><b>Inventory Code</b></th>
				<th><b>Inventory Model</b></th>
				<th><b>Quantity</b></th>
			</thead>
			<tbody>", false);
} ?>
<?php
if ((($_CONTROL->CurrentItemIndex % 2) != 0)) {
	_p('<tr style="background-color:#f0f0f0 ">', false);
} else {
	_p('<tr>',false);
}
?>
		<td><?php _p($_ITEM->Location->ShortDescription); ?></td>
		<td><?php _p($_ITEM->InventoryModel->InventoryModelCode); ?><br/>
		<td><?php _p($_ITEM->InventoryModel->ShortDescription); ?></td>
		<td><?php _p($_ITEM->Quantity); ?></td>
	</tr>
<?php

if ($_CONTROL->CurrentItemIndex == count($_CONTROL->DataSource) - 1) {
	_p('</tbody></table>',false);
}

?>