<?php
/**
 * @see AssetMassEditPanel
 *
 */
?>
<div class="title"> Asset Mass Edit - <?php echo count($_CONTROL->arrAssetToEdit) ;?> records
</div>
<hr />
Select fields to be updated and provide new values.
<table>
	<tr>
		<td><?php $_CONTROL->chkModel->Render();            ?></td>
		<td><?php echo $_CONTROL->lstModel->Name;           ?></td>
		<td><?php $_CONTROL->lstModel->Render();            ?></td>
	</tr>
    <tr>
        <td></td>
        <td>parent asset</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>lock to parent</td>
        <td></td>
    </tr>
    <?php
    if($_CONTROL->arrCustomFields){
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
<?php //Short Desc, Model, Long Description ?>