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
		
			<script type="text/javascript">
			  function ConfirmDeleteAudit(intAuditId) {
			    if (confirm("Are you sure you want to delete this audit?")) {
			      parent.location = './inventory_audit_list.php?method=delete&intAuditId=' + intAuditId;
			    }
			  }
			</script> 
		</td>
		<td width="100%" valign="top">
		<div class="title">&nbsp;Inventory Audit Reports</div><br />
      <table>
<?php 

if ($this->objAuditArray) {
	foreach ($this->objAuditArray as $objAudit) {
	  // Inventory only
	  if ($objAudit->EntityQtypeId == 2)
		  echo "<tr><td><a href='./inventory_audit_view.php?intAuditId=".$objAudit->AuditId."'>Audit by ".$objAudit->CreatedByObject->FirstName." ".$objAudit->CreatedByObject->LastName."</a> on ".$objAudit->CreationDate->PHPDate("Y-m-d H:i:s")." <a href='#' onclick='javascript:ConfirmDeleteAudit(".$objAudit->AuditId.");'>Delete</a></td></tr>";
	}
}

?>
    </table>
   </td>


		
<?php $this->RenderEnd() ?>		
<?php require_once('../includes/footer.inc.php'); ?>