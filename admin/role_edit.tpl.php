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
	include('shortcut_menu.inc.php');
?>
<!-- End Shortcut Menu -->

		</td>
		<td>
			<img src="../images/empty.gif" width="10">
		</td>
		<td width="100%" valign="top">
		<div class="title">User Roles: <?php $this->lblHeaderRole->Render(); ?></div>
		<table class="datagrid" cellpadding="5" cellspacing="0" border="0">
			<tr>
				<td class="record_header">
					<?php
						$this->btnSave->Render();
						echo('&nbsp;');
						$this->btnDelete->Render();
						echo('&nbsp;');
						$this->btnCancel->RenderWithError();
					?>
				</td>
			</tr>
			<tr>
				<td>
				  <table>
						<tr>
							<td class="record_field_name">Role Name: </td>
							<td class="record_field_edit"><?php $this->txtShortDescription->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Description: </td>
							<td class="record_field_edit"><?php $this->txtLongDescription->RenderWithError(); ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
				  <div class="title">&nbsp;Module Permissions</div>
					<table>
						<tr>
							<th></th>
							<th class="role_table_header">Access</th>
							<th class="role_table_header">View</th>
							<th class="role_table_header">Edit</th>
							<th class="role_table_header">Delete</th>
						</tr>
						<!--
						<tr>
							<td class="role_table_left">Home</td>
							<td class="role_table_cell"><?php //$this->arrControls['home']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php //$this->arrControls['home']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php //$this->arrControls['home']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php //$this->arrControls['home']['delete']->RenderWithName(); ?></td>
						</tr>
						-->
						<tr>
							<td class="role_table_left">Assets</td>
							<td class="role_table_cell"><?php $this->arrControls['assets']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['assets']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['assets']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['assets']['delete']->RenderWithName(); ?></td>
							<td><?php $this->lblAssetsAdvanced->Render(); ?></td>
						</tr>
						<tr>
			  				<td style="role_table_cell" colspan="5" nowrap>
							<?php $this->pnlAssets->Render();?>
							<?php $this->pnlAssetModel->Render();?>
							</td>
						</tr>
						<tr>
							<td class="role_table_left">Inventory</td>
							<td class="role_table_cell"><?php $this->arrControls['inventory']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['inventory']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['inventory']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['inventory']['delete']->RenderWithName(); ?></td>
							<td><?php $this->lblInventoryAdvanced->Render(); ?></td>
						</tr>

						<tr>
			  				<td style="vertical-align:top;" colspan="5" nowrap>
							<?php $this->pnlInventory->Render();?>
							</td>
						</tr>
						<tr>
							<td class="role_table_left">Contacts</td>
							<td class="role_table_cell"><?php $this->arrControls['contacts']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['contacts']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['contacts']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['contacts']['delete']->RenderWithName(); ?></td>
							<td><?php $this->lblContactsAdvanced->Render(); ?></td>
						</tr>
						<tr>
			  				<td style="role_table_cell" colspan="5" nowrap>
							<?php $this->pnlContact->Render();?>
							<?php $this->pnlCompany->Render();?>
							<?php $this->pnlAddress->Render();?>
							</td>
						</tr>
						<tr>
							<td class="role_table_left">Shipping</td>
							<td class="role_table_cell"><?php $this->arrControls['shipping']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['shipping']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['shipping']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['shipping']['delete']->RenderWithName(); ?></td>
							<td><?php $this->lblShippingAdvanced->Render(); ?></td>
						</tr>
						<tr>
			  				<td style="role_table_cell" colspan="5" nowrap>
							<?php $this->pnlShipping->Render();?>
							</td>
						</tr>
						<tr>
							<td class="role_table_left">Receiving</td>
							<td class="role_table_cell"><?php $this->arrControls['receiving']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['receiving']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['receiving']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['receiving']['delete']->RenderWithName(); ?></td>
							<td><?php $this->lblReceivingAdvanced->Render(); ?></td>
						</tr>
						<tr>
			  				<td style="role_table_cell" colspan="5" nowrap>
							<?php $this->pnlReceiving->Render();?>
							</td>
						</tr>
						<tr>
							<td class="role_table_left">Reports</td>
							<td class="role_table_cell"><?php $this->arrControls['reports']['access']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['reports']['view']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['reports']['edit']->RenderWithName(); ?></td>
							<td class="role_table_cell"><?php $this->arrControls['reports']['delete']->RenderWithName(); ?></td>
						</tr>
					</table>
					<br/>
					<div class="title">&nbsp;Transaction Permissions</div>
					<table>
            <tr>
							<td class="role_table_left">Move</td>
							<td class="role_table_cell"><?php $this->arrControls['move']->RenderWithName(); ?></td>
						</tr>
						<tr>
							<td class="role_table_left">Check In/Out</td>
							<td class="role_table_cell"><?php $this->arrControls['check_in_out']->RenderWithName(); ?></td>
						</tr>
						<tr>
							<td class="role_table_left">Reserve/Unreserve</td>
							<td class="role_table_cell"><?php $this->arrControls['reserve_unreserve']->RenderWithName(); ?></td>
						</tr>
						<tr>
							<td class="role_table_left">Take Out</td>
							<td class="role_table_cell"><?php $this->arrControls['take_out']->RenderWithName(); ?></td>
						</tr>
						<tr>
							<td class="role_table_left">Restock</td>
							<td class="role_table_cell"><?php $this->arrControls['restock']->RenderWithName(); ?></td>
						</tr>
						<tr>
							<td class="role_table_left">Archive/Unarchive</td>
							<td class="role_table_cell"><?php $this->arrControls['archive_unarchive']->RenderWithName(); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>