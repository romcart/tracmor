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
		<?php $this->ctlAssetEdit->Render(); ?>
		<?php if (!$this->intTransactionTypeId) { ?>
		<br class="item_divider" />
		<?php $this->lblChildAssets->Render(); ?>
	  <table>
	   <tr>
	     <td width="275px" valign="top"><?php $this->lblAssetCode->Render(); ?>&nbsp;<?php $this->txtAddChild->RenderWithError(); ?></td>
	     <td valign="top"><?php $this->lblAddChild->Render(); ?></td>
	     <td valign="top"><?php $this->btnAddChild->Render(); ?></td>
	   </tr>
	  </table>
	  <?php $this->dtgChildAssets->RenderWithError(); ?>
	  <?php $this->btnChildAssetsRemove->Render() . "&nbsp;" . $this->btnReassign->Render() . "&nbsp;" . $this->btnLinkToParent->Render() . "&nbsp;" . $this->btnUnlink->RenderWithError(); ?>
    <br class="item_divider" />
    <?php $this->dlgAssetSearchTool->Render(); ?>
	  <?php }
	  if ($this->ctlAssetEdit->blnEditMode || $this->intTransactionTypeId) $this->ctlAssetTransact->Render(); ?>
    <br class="item_divider" />
	<?php $this->RenderEnd() ?>
	<?php require_once('../includes/footer.inc.php'); ?>