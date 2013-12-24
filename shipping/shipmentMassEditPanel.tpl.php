<?php
/**
 * @var $_CONTROL ShipmentMassEditPanel
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
		<td><?php $_CONTROL->lstFromCompany->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstFromContact->Name;?></td>
		<td><?php $_CONTROL->lstFromContact->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstFromAddress->Name;?></td>
		<td><?php $_CONTROL->lstFromAddress->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkToCompany->Render(); ?></td>
		<td><?php echo $_CONTROL->lstToCompany->Name;?></td>
		<td><?php $_CONTROL->lstToCompany->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstToContact->Name;?></td>
		<td><?php $_CONTROL->lstToContact->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $_CONTROL->lstToAddress->Name;?></td>
		<td><?php $_CONTROL->lstToAddress->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkCourier->Render();   ?></td>
		<td><?php echo $_CONTROL->lstCourier->Name;  ?></td>
		<td><?php $_CONTROL->lstCourier->RenderWithError();   ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkNote->Render();     ?></td>
		<td><?php echo $_CONTROL->txtNote->Name;    ?></td>
		<td><?php $_CONTROL->txtNote->RenderWithError();     ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkShipDate->Render();  ?></td>
		<td><?php echo $_CONTROL->calShipDate->Name; ?></td>
		<td><?php $_CONTROL->calShipDate->RenderWithError()   ?></td>
	</tr>
    <?php
    // Custom Fields
    if ($_CONTROL->arrCustomFields) {
        foreach ($_CONTROL->arrCustomFields as $field) {
            if($field['blnView']){
                ?>
                <tr>
                    <td><?php $_CONTROL->arrCheckboxes[$field['input']->ControlId]->Render(); ?></td>
                    <td><?php echo $field['input']->Name; ?>
                    <td><?php echo $field['input']->RenderWithError(false); ?></td>
                </tr><?php
            }
        }

    }
    ?>
</table>
<?php $_CONTROL->lblWarning->Render(); ?>
<br />
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
