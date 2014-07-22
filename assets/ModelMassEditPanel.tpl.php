<?php
/*
 * Copyright (c)  2009, Tracmor, LLC
 *
 * This file is part of Tracmor.
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * @see AssetMassEditPanel
 * @var AssetMassEditPanel $_CONTROL
 */
?>
<div class="title" style="margin-left:2px;"> Model Mass Edit - <?php echo count($_CONTROL->arrModelsToEdit) ;?> records</div>
<hr />
Select fields to be updated and provide new values.
<table>
	<tr>
		<td><?php $_CONTROL->chkCategory->Render(); ?></td>
		<td><?php echo $_CONTROL->lstCategory->Name; ?></td>
		<td><?php $_CONTROL->lstCategory->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkManufacturer->Render(); ?></td>
		<td><?php echo $_CONTROL->lstManufacturer->Name; ?></td>
		<td><?php $_CONTROL->lstManufacturer->RenderWithError(); ?></td>
	</tr>
	<tr>
		<td><?php $_CONTROL->chkLongDescription->Render(); ?></td>
		<td><?php echo $_CONTROL->txtLongDescription->Name; ?></td>
		<td><?php $_CONTROL->txtLongDescription->RenderWithError(); ?></td>
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