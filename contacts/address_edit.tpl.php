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
<?php

	// Build array of all fields to display
			$arrAddressFields[] = array('name' => 'Address Name:', 'value' => $this->lblShortDescription->Render(false) . $this->txtShortDescription->RenderWithError(false));
			$arrAddressFields[] = array('name' => 'Country:', 'value' => $this->lblCountry->Render(false) . $this->lstCountry->RenderWithError(false));
			$arrAddressFields[] = array('name' => 'Address Line 1:', 'value' => $this->lblAddress1->Render(false) . $this->txtAddress1->RenderWithError(false));
			$arrAddressFields[] = array('name' => 'Address Line 2:', 'value' => $this->lblAddress2->Render(false) . $this->txtAddress2->RenderWithError(false));	
			$arrAddressFields[] = array('name' => 'City:', 'value' => $this->lblCity->Render(false) . $this->txtCity->RenderWithError(false));
			$arrAddressFields[] = array('name' => 'State/Province:', 'value' => $this->lblStateProvince->Render(false) . $this->lstStateProvince->RenderWithError(false));
			$arrAddressFields[] = array('name' => 'Postal Code:', 'value' => $this->lblPostalCode->Render(false) . $this->txtPostalCode->RenderWithError(false));
	
	if ($this->arrCustomFields) {
		foreach ($this->arrCustomFields as $field) {
			if(!$this->blnEditMode || $field['blnView'])
				$arrAddressFields[] = array('name' => $field['lbl']->Name . ":", 'value' => $field['lbl']->RenderWithError(false) . $field['input']->RenderWithError(false));
		}
	}	
	
	if ($this->blnEditMode) {
		$arrAddressFields[] = array('name' => 'Date Created:',  'value' => $this->lblCreationDate->Render(false));
		$arrAddressFields[] = array('name' => 'Date Modified:',  'value' => $this->lblModifiedDate->Render(false));	
	}
	
?>
		</td>
		<td>
			<img src="../images/empty.gif" width="10">
		</td>
		<td width="100%" valign="top">
	
		<div class="title">
			Companies: <?php $this->lblCompany->Render();
			echo(': ');
			$this->lblHeaderAddress->Render(); ?>
		</div>	
		<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
			<tr>
				<td class="record_header">
					<?php 
						$this->btnEdit->Render();
						$this->btnSave->Render();
						echo('&nbsp;');
						$this->atcAttach->RenderWithError();
						echo('&nbsp;');
						$this->btnCancel->RenderWithError();
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
									if($arrAddressFields){
										for ($i=0;$i<ceil(count($arrAddressFields)/2);$i++) {
											echo('<tr>');
											echo('<td class="record_field_name">'. $arrAddressFields[$i]['name'] .'&nbsp;</td>');
											echo('<td class="record_field_value">'. $arrAddressFields[$i]['value'] .'&nbsp;</td>');
											echo('</tr>');
										}
									}
								?>
								</table>
							</td>
							<td style="vertical-align:top;">
								<table cellpadding="0" cellspacing="0">
								<?php
									if($arrAddressFields){
										for ($i=ceil(count($arrAddressFields)/2);$i<count($arrAddressFields);$i++) {
											echo('<tr>');
											echo('<td class="record_field_name">'. $arrAddressFields[$i]['name'] .'&nbsp;</td>');
											echo('<td class="record_field_value">'. $arrAddressFields[$i]['value'] .'&nbsp;</td>');
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
		
	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>
	</body>
</html>
