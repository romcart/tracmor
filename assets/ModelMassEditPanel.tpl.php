<?php
/**
 * @see ModelMassEditPanel
 *
 */
?>
<div class="title"> Company Mass Edit - <?php echo count($_CONTROL->arrModelsToEdit) ;?> records
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
	<tr>
		<td><?php $_CONTROL->chkImage->Render();            ?></td>
	    <td><?php echo $_CONTROL->txtImagePath->Name;       ?></td>
		<td><?php $_CONTROL->ifcImage->Render();        ?></td>
	</tr>
    <?php
    // Custom Fields
    if ($_CONTROL->arrCustomFields) {
        foreach ($_CONTROL->arrCustomFields as $field) {
            if($field['blnView']){
                echo (count($_CONTROL->arrCheckboxes));
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
<?php //Short Desc, Category, Manufacturer, Long Description, Image ?>
