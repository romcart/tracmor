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

	include('../includes/header.inc.php');
	$this->RenderBegin();
?>
<!-- Begin Header Menu -->
<?php 
	$this->ctlHeaderMenu->Render();
?>
<!-- End Header Menu -->
<!-- Begin Shortcut Menu -->
<?php
	$this->ctlShortcutMenu->Render();
?>
<!-- End Shortcut Menu -->
		</td>
		<td>
			<img src="../images/empty.gif" width="10">
		</td>
		<td width="100%" valign="top">
	<?php 
	
		// Build array of all fields to display
			$arrAssetModelFields[] = array('name' => 'Short Description:', 'value' => $this->txtShortDescription->RenderWithError(false) . $this->lblShortDescription->Render(false));
			$arrAssetModelFields[] = array('name' => 'Category:', 'value' => $this->lblCategory->Render(false) . $this->lstCategory->RenderWithError(false));
			$arrAssetModelFields[] = array('name' => 'Manufacturer:', 'value' => $this->lblManufacturer->Render(false) . $this->lstManufacturer->RenderWithError(false));
			$arrAssetModelFields[] = array('name' => 'Asset Model Code:', 'value' => $this->lblAssetModelCode->Render(false) . $this->txtAssetModelCode->RenderWithError(false));
			$arrAssetModelFields[] = array('name' => 'Long Description:', 'value' => $this->pnlLongDescription->Render(false) . $this->txtLongDescription->RenderWithError(false));
			$arrAssetModelFields[] = array('name' => 'Image:', 'value' => $this->ifaImage->RenderWithError(false) . $this->lblImage->Render(false));
		// Custom Fields
		if ($this->arrCustomFields) {
			foreach ($this->arrCustomFields as $field) {
					if(!$this->blnEditMode || $field['blnView'])
						$arrAssetModelFields[] = array('name' => $field['lbl']->Name.':', 'value' => $field['lbl']->Render(false).$field['input']->RenderWithError(false));				
				}
				
		}
		
		// Display Metadata fields if this is not a new contact
		//if ($this->blnEditMode) {
		//	$arrAssetModelFields[] = array('name' => 'Date Created:',  'value' => $this->lblCreationDate->Render(false));	
		//	$arrAssetModelFields[] = array('name' => 'Date Modified:',  'value' => $this->lblModifiedDate->Render(false));	
		//}		
	?>
		
		<div class="title">Asset Models: <?php $this->lblAssetModelHeader->Render(); ?></div>
		<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
			<tr>
				<td class="record_header">
					<?php 
						$this->btnEdit->Render();
						$this->btnSave->Render();
						echo('&nbsp;');
						$this->atcAttach->Render();
						echo('&nbsp;');
						$this->btnCancel->Render();
						$this->btnDelete->RenderWithError();
					?>
				</td>
			</tr>
			<tr>
				<td>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td style="vertical-align:top;">
								<table cellpadding="0" cellspacing="0">
								<?php
									if(isset($arrAssetModelFields)){
										for ($i=0;$i<ceil(count($arrAssetModelFields)/2);$i++) {
											echo('<tr>');
											echo('<td class="record_field_name">'. $arrAssetModelFields[$i]['name'] .'</td>');
											echo('<td class="record_field_value">'. $arrAssetModelFields[$i]['value'] .'</td>');
											echo('</tr>');
										}
									}
								?>
								</table>
							</td>
							<td style="vertical-align:top;">
								<table cellpadding="0" cellspacing="0">
								<?php
									if(isset($arrAssetModelFields)){
										for ($i=ceil(count($arrAssetModelFields)/2);$i<count($arrAssetModelFields);$i++) {
											echo('<tr>');
											echo('<td class="record_field_name">'. $arrAssetModelFields[$i]['name'] .'</td>');
											echo('<td class="record_field_value">'. $arrAssetModelFields[$i]['value'] .'</td>');
											echo('</tr>');
										}
									}
								?>				
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
<?php
$this->pnlAttachments->Render();
?>
		
		<br class="item_divider" />
		<br class="item_divider" />
		
	<?php $this->RenderEnd() ?>
	<?php 	require_once('../includes/footer.inc.php'); ?>
