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



	// Build array of all fields to display
	$arrAdvancedSearchFields = array();
	if (get_class($this->objParentObject) == 'AssetListForm') {
		$arrAdvancedSearchFields[] = array('name' => 'Asset Model Code:',  'value' => $this->txtAssetModelCode->RenderWithError(false));	
	}
	$arrAdvancedSearchFields[] = array('name' => 'Date Modified:',   'value' => $this->lstDateModified->RenderWithError(false));
	$arrAdvancedSearchFields[] = array('name' => '&nbsp;', 'value' => $this->dtpDateModifiedFirst->RenderWithError(false));
	$arrAdvancedSearchFields[] = array('name' => '&nbsp;', 'value' => $this->dtpDateModifiedLast->RenderWithError(false));
	
	// Custom Fields
	if ($this->arrCustomFields) {
		foreach ($this->arrCustomFields as $field) {
			$arrAdvancedSearchFields[] = array('name' => $field['input']->Name.':', 'value' => $field['input']->RenderWithError(false));
		}
	}
	
?>

<!--
<table cellpadding="0" cellspacing="0">
	<tr>
		<td style="vertical-align:top;">-->
			<table cellpadding="2" cellspacing="0">
			<?php
				for ($i=0;$i<count($arrAdvancedSearchFields);$i++) {
					echo('<tr>');
					echo('<td class="item_label">'. $arrAdvancedSearchFields[$i]['name'] .'&nbsp;</td>');
					echo('<td>'. $arrAdvancedSearchFields[$i]['value'] .'&nbsp;</td>');
					echo('</tr>');
				}
			?>
			</table>
		<!--</td>
	</tr>
</table>-->