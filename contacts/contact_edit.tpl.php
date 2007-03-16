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
		$arrContactFields[] = array('name' => 'Company:', 'value' => $this->lblCompany->Render(false) . $this->lstCompany->RenderWithError(false));
		$arrContactFields[] = array('name' => 'First Name:', 'value' => $this->lblFirstName->Render(false) . $this->txtFirstName->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Last Name:', 'value' => $this->lblLastName->Render(false) . $this->txtLastName->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Title:', 'value' => $this->lblTitle->Render(false) . $this->txtTitle->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Email:', 'value' => $this->lblEmail->Render(false) . $this->txtEmail->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Description:', 'value' => $this->pnlDescription->Render(false) . $this->txtDescription->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Office Phone:', 'value' => $this->lblPhoneOffice->Render(false) . $this->txtPhoneOffice->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Home Phone:', 'value' => $this->lblPhoneHome->Render(false) . $this->txtPhoneHome->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Mobile Phone:', 'value' => $this->lblPhoneMobile->Render(false) . $this->txtPhoneMobile->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Fax:', 'value' => $this->lblFax->Render(false) . $this->txtFax->RenderWithError(false));
		$arrContactFields[] = array('name' => 'Address:', 'value' => $this->lblAddress->Render(false) . $this->lstAddress->RenderWithError(false));
		
		if ($this->arrCustomFields) {
			foreach ($this->arrCustomFields as $field) {
				$arrContactFields[] = array('name' => $field['lbl']->Name . ":", 'value' => $field['lbl']->RenderWithError(false) . $field['input']->RenderWithError(false));
			}
		}		
	
		// Display Metadata fields if this is not a new contact
		if ($this->blnEditMode) {
			$arrContactFields[] = array('name' => 'Date Created:',  'value' => $this->lblCreationDate->Render(false));	
			$arrContactFields[] = array('name' => 'Date Modified:',  'value' => $this->lblModifiedDate->Render(false));	
		}		
	?>
		<div class="title">Contacts: <?php $this->lblHeaderContact->Render(); ?></div>
		<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
			<tr>
				<td class="record_header">
					<?php 
						$this->btnEdit->Render();
						$this->btnSave->Render();
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
									for ($i=0;$i<ceil(count($arrContactFields)/2);$i++) {
										echo('<tr>');
										echo('<td class="record_field_name">'. $arrContactFields[$i]['name'] .'&nbsp;</td>');
										echo('<td class="record_field_value">'. $arrContactFields[$i]['value'] .'&nbsp;</td>');
										echo('</tr>');
									}
								?>
								</table>
							</td>
							<td style="vertical-align:top;">
								<table cellpadding="0" cellspacing="0">
								<?php
									for ($i=ceil(count($arrContactFields)/2);$i<count($arrContactFields);$i++) {
										echo('<tr>');
										echo('<td class="record_field_name">'. $arrContactFields[$i]['name'] .'&nbsp;</td>');
										echo('<td class="record_field_value">'. $arrContactFields[$i]['value'] .'&nbsp;</td>');
										echo('</tr>');
									}
								?>				
								</table>
							</td>
						</tr>
					</table>
					<?php $this->pnlNewCompany->Render(); ?>
				</td>
			</tr>
		</table>
	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>