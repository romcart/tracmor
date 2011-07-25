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
		<div class="title">Check In/Out</div>
		<div style="padding:5px"><?php $this->pnlSaveNotification->Render(); ?></div>
		<table class="datagrid" cellpadding="5" cellspacing="0">
			<tr>
				<td class="record_header">
					<?php
						$this->btnSave->Render();
						echo('&nbsp;');
					?>
				</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td class="record_field_name">Strict Check-In Policy: </td>
							<td class="record_field_edit"><?php $this->chkStrictCheckinPolicy->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Check-out to other users: </td>
							<td class="record_field_edit"><?php $this->chkCheckOutToOtherUsers->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Check-out to contacts: </td>
							<td class="record_field_edit"><?php $this->chkCheckOutToContacts->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Due date required: </td>
							<td class="record_field_edit"><?php $this->chkDueDateRequired->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Reason required: </td>
							<td class="record_field_edit"><?php $this->chkReasonRequired->RenderWithError(); ?></td>
						</tr>
						<tr>
							<td class="record_field_name">Default check-out period: </td>
							<td class="record_field_edit"><?php $this->txtDefaultCheckOutPeriod->RenderWithError(); ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

<?php $this->RenderEnd() ?>
<?php require_once('../includes/footer.inc.php'); ?>