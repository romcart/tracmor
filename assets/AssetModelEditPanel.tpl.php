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
?>

<?php

	// Build array of all fields to display
	$arrAssetModelFields[] = array('name' => $_CONTROL->txtShortDescription->Name.':', 'value' => $_CONTROL->txtShortDescription->RenderWithError(false));
	$arrAssetModelFields[] = array('name' => $_CONTROL->lstCategory->Name.':', 'value' => $_CONTROL->lstCategory->RenderWithError(false));
	$arrAssetModelFields[] = array('name' => $_CONTROL->lstManufacturer->Name.':', 'value' => $_CONTROL->lstManufacturer->RenderWithError(false));
	$arrAssetModelFields[] = array('name' => $_CONTROL->txtAssetModelCode->Name.':', 'value' => $_CONTROL->txtAssetModelCode->RenderWithError(false));
	$arrAssetModelFields[] = array('name' => $_CONTROL->txtLongDescription->Name.':', 'value' => $_CONTROL->txtLongDescription->RenderWithError(false));
	$arrAssetModelFields[] = array('name' => $_CONTROL->ifaImage->Name.':', 'value' => $_CONTROL->ifaImage->RenderWithError(false));
	
	// Custom Fields
	if ($_CONTROL->arrCustomFields) {
		foreach ($_CONTROL->arrCustomFields as $field) {
			if(!$this->blnEditMode || $field['blnView']){
				$arrAssetModelFields[] = array('name' => $field['input']->Name.':', 'value' => $field['input']->RenderWithError(false));
			}
		}
	}
	
?>

<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
	<tr>
		<td class="record_header" colspan="2">
			<?php 
				$_CONTROL->btnSave->Render();
				echo('&nbsp;');
				$_CONTROL->btnCancel->Render();
			?>
		</td>
	</tr>
	<?php 
		foreach ($arrAssetModelFields as $arrAssetModelField) {
			echo '<tr>';
			echo('<td class="record_field_name">'. $arrAssetModelField['name'] .'&nbsp;</td>');
			echo('<td class="record_field_value">'. $arrAssetModelField['value'] .'&nbsp;</td>');
			echo('</tr>');
		}
	?>
</table>
