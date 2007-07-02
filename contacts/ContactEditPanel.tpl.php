<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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
		$arrContactFields[] = array('name' => 'Company:', 'value' => $_CONTROL->lstCompany->RenderWithError(false));
		$arrContactFields[] = array('name' => 'First Name:', 'value' => $_CONTROL->txtFirstName->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Last Name:', 'value' => $_CONTROL->txtLastName->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Title:', 'value' => $_CONTROL->txtTitle->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Email:', 'value' => $_CONTROL->txtEmail->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Description:', 'value' => $_CONTROL->txtDescription->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Office Phone:', 'value' => $_CONTROL->txtPhoneOffice->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Home Phone:', 'value' => $_CONTROL->txtPhoneHome->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Mobile Phone:', 'value' => $_CONTROL->txtPhoneMobile->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Fax:', 'value' => $_CONTROL->txtFax->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Address:', 'value' => $_CONTROL->lstAddress->RenderWithError(false));
	
	// Custom Fields
	if ($_CONTROL->arrCustomFields) {
		foreach ($_CONTROL->arrCustomFields as $field) {
			$arrContactFields[] = array('name' => $field['input']->Name.':', 'value' => $field['input']->RenderWithError(false));
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
		foreach ($arrContactFields as $arrContactField) {
			echo '<tr>';
			echo('<td class="record_field_name">'. $arrContactField['name'] .'&nbsp;</td>');
			echo('<td class="record_field_value">'. $arrContactField['value'] .'&nbsp;</td>');
			echo('</tr>');
		}
	?>
</table>
