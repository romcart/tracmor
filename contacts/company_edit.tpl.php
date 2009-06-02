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
			$arrCompanyFields[] = array('name' => 'Company Name:',  'value' => $this->lblShortDescription->Render(false) . $this->txtShortDescription->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'Description:',  'value' => $this->pnlLongDescription->Render(false) . $this->txtLongDescription->RenderWithError(false));		
			$arrCompanyFields[] = array('name' => 'Website:',  'value' => $this->lblWebsite->Render(false) . $this->txtWebsite->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'Email:',  'value' => $this->lblEmail->Render(false) . $this->txtEmail->RenderWithError(false));		
			$arrCompanyFields[] = array('name' => 'Telephone:',  'value' => $this->lblTelephone->Render(false) . $this->txtTelephone->RenderWithError(false));	
			$arrCompanyFields[] = array('name' => 'Fax:',  'value' => $this->lblFax->Render(false) . $this->txtFax->RenderWithError(false));
	    
			// Custom Fields
		if ($this->arrCustomFields) {
			foreach ($this->arrCustomFields as $field) {
				if(!$this->blnEditMode || $field['blnView']){
					$arrCompanyFields[] = array('name' => $field['lbl']->Name . ":", 'value' => $field['lbl']->RenderWithError(false) . $field['input']->RenderWithError(false));
				}
			}
		}
		
		// Only display Primary Address field if this is not a new company
		if ($this->blnEditMode) {
			$arrCompanyFields[] = array('name' => 'Primary Address:',  'value' => $this->lblAddress->Render(false) . $this->lstAddress->RenderWithError(false));	
		}
		// Show address fields to create the primary address
		else {
			$arrCompanyFields[] = array('name' => 'Address Name:', 'value' => $this->txtAddressShortDescription->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'Address Line 1:', 'value' => $this->txtAddress1->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'Address Line 2:', 'value' => $this->txtAddress2->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'City:', 'value' => $this->txtCity->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'State/Province:', 'value' => $this->lstStateProvince->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'Postal Code:', 'value' => $this->txtPostalCode->RenderWithError(false));
			$arrCompanyFields[] = array('name' => 'Country:', 'value' => $this->lstCountry->RenderWithError(false));
			if ($this->arrAddressCustomFields) {
				foreach ($this->arrAddressCustomFields as $field) {
					if(!$this->blnEditMode || $field['blnView']){
						$arrCompanyFields[] = array('name' => $field['input']->Name . ":", 'value' => $field['input']->RenderWithError(false));
					}
				}
			}
		}

		// Display Metadata fields if this is not a new company
		if ($this->blnEditMode) {
			$arrCompanyFields[] = array('name' => 'Date Created:',  'value' => $this->lblCreationDate->Render(false));	
			$arrCompanyFields[] = array('name' => 'Date Modified:',  'value' => $this->lblModifiedDate->Render(false));	
		}
		
	?>
	</td>
	<td>
		<img src="../images/empty.gif" width="10">
	</td>
	<td width="100%" valign="top">	
	<div class="title">Companies: <?php $this->lblHeaderCompanyName->Render(); ?></div>
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
								if(isset($arrCompanyFields))for ($i=0;$i<ceil(count($arrCompanyFields)/2);$i++) {
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
								if(isset($arrCompanyFields))for ($i=ceil(count($arrCompanyFields)/2);$i<count($arrCompanyFields);$i++) {
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
			</td>
		</tr>
	</table>
	
<?php
$this->pnlAttachments->Render();
?>	

		<?php //$this->btnDelete->Render(); ?>
		<br class="item_divider" />
		<?php 
			if ($this->blnEditMode) { 
				echo('<div class="title">Contacts</div>');
				$this->btnCreateContact->Render();
				echo('<br class="item_divider" />');
				$this->dtgContact->Render();
				echo('<br class="item_divider" /><br class="item_divider" />');
				echo('<div class="title">Addresses</div>');
				$this->btnCreateAddress->Render();
				echo('<br class="item_divider" />');
				$this->dtgAddress->Render();
			}
		?>

	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>
