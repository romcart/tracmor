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

	// Build array of all fields to display
	$arrAssetViewFields = array();

	//Only display the built-in fields if the user is authorized according to FLA(Field-Level-Authorization)
	// Built-in fields for Assets are:
	// Asset Code
	// Asset Model

		if (!$this->blnEditMode){
			$arrAssetFields[] = array('name' => 'Asset Model:',  'value' => $this->lstAssetModel->RenderWithError(false) . '&nbsp;' . $this->lblNewAssetModel->Render(false));
		}
		else{
			$arrAssetFields[] = array('name' => 'Asset Model:',  'value' => $this->lstAssetModel->Render(false) . $this->lblNewAssetModel->Render(false) . $this->lblAssetModel->Render(false));
		}

		$arrAssetFields[] = array('name' => 'Asset Code:',   'value' => $this->txtAssetCode->RenderWithError(false) . $this->chkAutoGenerateAssetCode->Render(false) . $this->lblAssetCode->Render(false));

		$arrAssetFields[] = array('name' => 'Category:',     'value' => $this->lblCategory->Render(false));
		$arrAssetFields[] = array('name' => 'Manufacturer:', 'value' => $this->lblManufacturer->Render(false));
		$arrAssetFields[] = array('name' => 'Asset Model Code:',  'value' => $this->lblAssetModelCode->Render(false));
		if (!$this->blnEditMode) {
			$arrAssetFields[] = array('name' => 'Location:',     'value' => $this->lstLocation->RenderWithError(false));
		}
		else {
			$arrAssetFields[] = array('name' => 'Location:', 'value' => $this->lblLocation->RenderWithError(false));
		}

		// Only display 'Reserved By' if the asset is reserved
		if ($this->lblReservedBy->Visible) {
			$arrAssetFields[] = array('name' => 'Reserved By:', 'value' => $this->lblReservedBy->Render(false));
		}

	  // Only display 'Checked Out To' if the asset is checked out
		if ($this->lblCheckedOutTo->Visible) {
			$arrAssetFields[] = array('name' => 'Checked Out To:', 'value' => $this->lblCheckedOutTo->Render(false));
		}

	// Custom Fields
	if ($this->arrCustomFields) {
		foreach ($this->arrCustomFields as $field) {
			if(!$this->blnEditMode || $field['blnView'])
				$arrAssetFields[] = array('name' => $field['lbl']->Name.':', 'value' => $field['lbl']->Render(false).$field['input']->RenderWithError(false));
		}
	}

	$arrAssetFields[] = array('name' => 'Parent Asset:', 'value' => $this->lblParentAssetCode->Render(false) . $this->txtParentAssetCode->RenderWithError(false) . $this->lblIconParentAssetCode->Render(false) . $this->chkLockToParent->RenderWithError(false) . $this->lblLockedToParent->Render(false));

	// Display Metadata fields in Edit mode only
	if ($this->blnEditMode) {
		$arrAssetFields[] = array('name' => 'Date Created:', 'value' => $this->lblCreationDate->Render(false));
		$arrAssetFields[] = array('name' => 'Date Modified:', 'value' => $this->lblModifiedDate->Render(false));
	}
	
	$arrAssetFields[] = array('name' => 'Image:', 'value' => $this->ifcImage->RenderWithError(false) . $this->lblImage->Render(false));

?>

<div class="title">Assets: <?php $this->lblHeaderAssetCode->Render(); ?></div>
<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >
	<tr>
		<td class="record_header">
			<?php
				$this->btnEdit->Render();
				$this->btnSave->RenderWithError();
				echo('&nbsp;');
				$this->btnCancel->RenderWithError();
				$this->btnClone->Render();
				echo('&nbsp;');
				$this->atcAttach->Render();
				echo('&nbsp;');
				$this->btnPrintAssetTag->Render();
				echo('&nbsp;');
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
							if(isset($arrAssetFields)){
								for ($i=0;$i<ceil(count($arrAssetFields)/2);$i++) {
									echo('<tr>');
									echo('<td class="record_field_name">'. $arrAssetFields[$i]['name'] .'</td>');
									echo('<td class="record_field_value">'. $arrAssetFields[$i]['value'] .'</td>');
									echo('</tr>');
								}
							}
						?>
						</table>
					</td>
					<td style="vertical-align:top;">
						<table cellpadding="0" cellspacing="0">
						<?php
							if($arrAssetFields){
								for ($i=ceil(count($arrAssetFields)/2);$i<count($arrAssetFields);$i++) {
									echo('<tr>');
									echo('<td class="record_field_name">'. $arrAssetFields[$i]['name'] .'</td>');
									echo('<td class="record_field_value">'. $arrAssetFields[$i]['value'] .'</td>');
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
<?php
	if ($this->blnEditMode) {
		$this->btnMove->Render();
		$this->btnCheckOut->Render();
		$this->btnCheckIn->Render();
		$this->btnReserve->Render();
		$this->btnUnreserve->Render();
		$this->btnShip->Render();
		$this->btnReceive->Render();
		$this->btnArchive->Render();
		echo '<br class="item_divider">';
		echo '<br class="item_divider">';
		echo '<div class="title">Transactions</div>';
		$this->dtgAssetTransaction->RenderWithError();
	}
?>
<br class="item_divider">
<?php
if ($this->blnEditMode) {
	$this->lblShipmentReceipt->Render();
	$this->dtgShipmentReceipt->RenderWithError();
}

$this->dlgNewAssetModel->Render();
?>