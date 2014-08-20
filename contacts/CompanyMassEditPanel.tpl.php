<div class="title"> Company Mass Edit - <?php echo count($_CONTROL->arrCompaniesToEdit) ;?> records
</div>
<hr />
<table>
	<?php
	if ($_CONTROL->arrCustomFields) {
		?>
		<tr>
			<td><?php $_CONTROL->chkLongDescription->Render();   ?></td>
			<td><?php  echo $_CONTROL->txtLongDescription->Name; ?></td>
			<td><?php  $_CONTROL->txtLongDescription->Render();  ?></td>
		</tr>
		<?php
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
	} else {
		?>
		<tr>
			<td><?php  echo $_CONTROL->txtLongDescription->Name; ?></td>
			<td><?php  $_CONTROL->txtLongDescription->Render();  ?></td>
		</tr>
		<?php
	}
	?>
</table>

<?php  $_CONTROL->btnSave->Render(); ?>
<?php  $_CONTROL->btnCancel->Render(); ?>