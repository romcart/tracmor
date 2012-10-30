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
</table>
<br />
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
