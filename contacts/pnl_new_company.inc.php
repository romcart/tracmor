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

		$arrCompanyFields[] = array('name' => 'Name:',  'value' => $this->txtCompanyShortDescription->RenderWithError(false));
		$arrCompanyFields[] = array('name' => 'Description:',  'value' => $this->txtCompanyLongDescription->RenderWithError(false));		
		$arrCompanyFields[] = array('name' => 'Website:',  'value' => $this->txtCompanyWebsite->RenderWithError(false));
		$arrCompanyFields[] = array('name' => 'Email:',  'value' => $this->txtCompanyEmail->RenderWithError(false));		
		$arrCompanyFields[] = array('name' => 'Telephone:',  'value' => $this->txtCompanyTelephone->RenderWithError(false));	
		$arrCompanyFields[] = array('name' => 'Fax:',  'value' => $this->txtCompanyFax->RenderWithError(false));	
		
		// Custom Fields
		if ($this->arrCompanyCustomFields) {
			foreach ($this->arrCompanyCustomFields as $field) {
				$arrCompanyFields[] = array('name' => $field['input']->Name . ":", 'value' => $field['input']->RenderWithError(false));
			}
		}
		
?>
<br class="item_divider">
<div class="title">New Company</div><br />
<table cellpadding="0" cellspacing="0">
	<tr>
		<td style="vertical-align:top;">
			<table cellpadding="0" cellspacing="0">
			<?php
				for ($i=0;$i<ceil(count($arrCompanyFields)/2);$i++) {
					echo('<tr>');
					echo('<td class="record_field_name">'. $arrCompanyFields[$i]['name'] .'&nbsp;</td>');
					echo('<td class="record_field_value">'. $arrCompanyFields[$i]['value'] .'&nbsp;</td>');
					echo('</tr>');
				}
			?>
			</table>
		</td>
		<td style="vertical-align:top;">
			<table cellpadding="0" cellspacing="0">
			<?php
				for ($i=ceil(count($arrCompanyFields)/2);$i<count($arrCompanyFields);$i++) {
					echo('<tr>');
					echo('<td class="record_field_name">'. $arrCompanyFields[$i]['name'] .'&nbsp;</td>');
					echo('<td class="record_field_value">'. $arrCompanyFields[$i]['value'] .'&nbsp;</td>');
					echo('</tr>');
				}
			?>				
			</table>
		</td>
	</tr>
</table>