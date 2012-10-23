<?php
/**
 * @see InventoryMassEditPanel
 *
 */
?>
<div class="title"> Company Mass Edit - <?php echo count($_CONTROL->arrInventoryToEdit) ;?> records
</div>
<hr />
Select fields to be updated and provide new values.
<table>
	<tr>
		<td><?php $_CONTROL->chkShortDescription->Render(); ?></td>
		<td><?php echo $_CONTROL->txtShortDescription->Name;?></td>
		<td><?php $_CONTROL->txtShortDescription->Render(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkCategory->Render();         ?></td>
		<td><?php echo $_CONTROL->lstCategory->Name;        ?></td>
		<td><?php $_CONTROL->lstCategory->Render();         ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkManufacturer->Render();     ?></td>
		<td><?php echo $_CONTROL->lstManufacturer->Name;    ?></td>
		<td><?php $_CONTROL->lstManufacturer->Render();     ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkLongDescription->Render();  ?></td>
		<td><?php echo $_CONTROL->txtLongDescription->Name; ?></td>
		<td><?php $_CONTROL->txtLongDescription->Render()   ?></td>
	</tr>
</table>
<br />
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
<?php //Short Desc, Category, Manufacturer, Long Description ?>
