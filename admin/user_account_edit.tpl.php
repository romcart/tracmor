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
		<div class="title">User Accounts: <?php $this->lblHeaderUser->Render(); ?></div>
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
							<td class="record_field_name">Username: </td>
							<td class="record_field_edit"><?php $this->txtUsername->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">First Name: </td>
							<td class="record_field_edit"><?php $this->txtFirstName->RenderWithError(); ?></td>
						</tr>						
						<tr>
							<td class="record_field_name">Last Name: </td>
							<td class="record_field_edit"><?php $this->txtLastName->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Password: </td>
							<td class="record_field_edit"><?php $this->txtPassword->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Confirm Password: </td>
							<td class="record_field_edit"><?php $this->txtPasswordConfirm->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Email Address: </td>
							<td class="record_field_edit"><?php $this->txtEmailAddress->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">User Role: </td>
							<td class="record_field_edit"><?php $this->lstRole->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Active: </td>
							<td class="record_field_edit"><?php $this->chkActiveFlag->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Administrator: </td>
							<td class="record_field_edit"><?php $this->chkAdminFlag->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Portable Access: </td>
							<td class="record_field_edit"><?php $this->chkPortableAccessFlag->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td colspan="2"><?php $this->pnlPortableAccess->RenderWithError(); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>		
	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>