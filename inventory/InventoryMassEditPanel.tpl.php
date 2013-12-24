<?php
/**
 * @see InventoryMassEditPanel
 *
 */
?>
<div class="title"> Inventory Mass Edit - <?php echo count($_CONTROL->arrInventoryToEdit) ;?> records
</div>
<hr />
Select fields to be updated and provide new values.
<table>
	<tr>
		<td><?php $_CONTROL->chkShortDescription->Render(); ?></td>
		<td><?php echo $_CONTROL->txtShortDescription->Name;?></td>
		<td><?php $_CONTROL->txtShortDescription->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkCategory->Render();                  ?></td>
		<td><?php echo $_CONTROL->lstCategory->Name;                 ?></td>
		<td><?php $_CONTROL->lstCategory->RenderWithError();         ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkManufacturer->Render();              ?></td>
		<td><?php echo $_CONTROL->lstManufacturer->Name;             ?></td>
		<td><?php $_CONTROL->lstManufacturer->RenderWithError();     ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkLongDescription->Render();  ?></td>
		<td><?php echo $_CONTROL->txtLongDescription->Name; ?></td>
		<td><?php $_CONTROL->txtLongDescription->RenderWithError()   ?></td>
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
<br />
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
<?php //Short Desc, Category, Manufacturer, Long Description ?>
