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
	$arrAddressFields[] = array('name' => 'Company:', 'value' => $_CONTROL->lstCompany->RenderWithError(false));
	$arrAddressFields[] = array('name' => 'Address Name:', 'value' => $_CONTROL->txtShortDescription->RenderWithError(false));
	$arrAddressFields[] = array('name' => 'Country:', 'value' => $_CONTROL->lstCountry->RenderWithError(false));
	$arrAddressFields[] = array('name' => 'Address Line 1:', 'value' => $_CONTROL->txtAddress1->RenderWithError(false));
	$arrAddressFields[] = array('name' => 'Address Line 2:', 'value' => $_CONTROL->txtAddress2->RenderWithError(false));	
	$arrAddressFields[] = array('name' => 'City:', 'value' => $_CONTROL->txtCity->RenderWithError(false));
	$arrAddressFields[] = array('name' => 'State/Province:', 'value' => $_CONTROL->lstStateProvince->RenderWithError(false));
	$arrAddressFields[] = array('name' => 'Postal Code:', 'value' => $_CONTROL->txtPostalCode->RenderWithError(false));
	
	// Custom Fields
	if ($_CONTROL->arrCustomFields) {
		foreach ($_CONTROL->arrCustomFields as $field) {
			if(!$this->blnEditMode || $field['blnView']){
				$arrAddressFields[] = array('name' => $field['input']->Name.':', 'value' => $field['input']->RenderWithError(false));
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
		if($arrAddressFields){
			foreach ($arrAddressFields as $arrAddressField) {
				echo '<tr>';
				echo('<td class="record_field_name">'. $arrAddressField['name'] .'&nbsp;</td>');
				echo('<td class="record_field_value">'. $arrAddressField['value'] .'&nbsp;</td>');
				echo('</tr>');
			}
		}
	?>
</table>
