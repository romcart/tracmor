<?php
/**
 * @see AssetMassEditPanel
 * @var AssetMassEditPanel $_CONTROL
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
		<td><?php $_CONTROL->lstModel->RenderWithError();            ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkParentAssetCode->Render();  ?></td>
		<td><?php echo $_CONTROL->txtParentAssetCode->Name; ?></td>
		<td><?php $_CONTROL->txtParentAssetCode->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkChkLockToParent->Render();             ?></td>
		<td><?php echo $_CONTROL->chkLockToParent->Name;               ?></td>
		<td><?php $_CONTROL->chkLockToParent->RenderWithError();  ?></td>
	</tr>
	<?php
	if ($_CONTROL->arrCustomFields) {
		foreach ($_CONTROL->arrCustomFields as $field) {
			if ($field['blnView']) {
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
<?php $_CONTROL->btnApply->Render(); ?><?php $_CONTROL->btnCancel->RenderWithError(); ?>
<?php //Short Desc, Model, Long Description ?>