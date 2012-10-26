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
		<td><?php $_CONTROL->chkShortDescription->Render(); ?></td>
		<td><?php echo $_CONTROL->txtShortDescription->Name;?></td>
		<td><?php $_CONTROL->txtShortDescription->Render(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkModel->Render();            ?></td>
		<td><?php echo $_CONTROL->lstModel->Name;           ?></td>
		<td><?php $_CONTROL->lstModel->Render();            ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkLongDescription->Render();  ?></td>
		<td><?php echo $_CONTROL->txtLongDescription->Name; ?></td>
		<td><?php $_CONTROL->txtLongDescription->Render()   ?></td>
	</tr>
</table>
<br />
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
<?php //Short Desc, Model, Long Description ?>