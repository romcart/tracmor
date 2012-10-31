<?php
/**
 * @see ShipmentMassEditPanel
 * @var  QCheckBox      $chkFromCompany
 * @var  QCheckBox      $chkToCompany
 * @var  QCheckBox      $chkCourier
 * @var  QCheckBox      $chkNote
 * @var  QCheckBox      $chkShipDate
 */

?>
<div class="title"> Shipment Mass Edit - <?php echo count($_CONTROL->arrShipmentToEdit) ;?> records
</div>
<hr />
Select fields to be updated and provide new values.
<table>
	<tr>
		<td><?php $_CONTROL->chkFromCompany->Render(); ?></td>
		<td><?php echo $_CONTROL->lstFromCompany->Name;?></td>
		<td><?php $_CONTROL->lstFromCompany->Render(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstFromContact->Name;?></td>
		<td><?php $_CONTROL->lstFromContact->Render(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstFromAddress->Name;?></td>
		<td><?php $_CONTROL->lstFromAddress->Render(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkToCompany->Render(); ?></td>
		<td><?php echo $_CONTROL->lstToCompany->Name;?></td>
		<td><?php $_CONTROL->lstToCompany->Render(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstToContact->Name;?></td>
		<td><?php $_CONTROL->lstToContact->Render(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstToAddress->Name;?></td>
		<td><?php $_CONTROL->lstToAddress->Render(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkCourier->Render();   ?></td>
		<td><?php echo $_CONTROL->lstCourier->Name;  ?></td>
		<td><?php $_CONTROL->lstCourier->Render();   ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkNote->Render();     ?></td>
		<td><?php echo $_CONTROL->txtNote->Name;    ?></td>
		<td><?php $_CONTROL->txtNote->Render();     ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkShipDate->Render();  ?></td>
		<td><?php echo $_CONTROL->calShipDate->Name; ?></td>
		<td><?php $_CONTROL->calShipDate->Render()   ?></td>
	</tr>
</table>
<br />
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
