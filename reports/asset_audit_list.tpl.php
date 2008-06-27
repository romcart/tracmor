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
      <table>
<?php 

if ($this->objAuditArray) {
	foreach ($this->objAuditArray as $objAudit) {
		// This is where you will display the list of audits in the form "Audit by Justin Sinclair on 2008-06-09 17:07:11"
		// Then you will display a delete link. something like ./asset_audit_list.php?method=delete&intAuditId=X ...
		// and you will need to create a method to delete the audit. This should have a javascript warning: "Are you sure you want to delete this audit?"
	  if ($objAudit->EntityQtypeId != 1) break; // Assets reports only
		echo "<tr><td>Audit by ".$objAudit->CreatedByObject->FirstName." ".$objAudit->CreatedByObject->LastName." on ".$objAudit->CreationDate->PHPDate("Y-m-d H:i:s")." <a href='./asset_audit_list.php?method=delete&intAuditId=".$objAudit->AuditId."'>Delete report</a></td></tr>";
	  echo "<tr><td><table cellspacing='5' cellpadding='5' border='1'><tr><td>Location</td><td>Asset Code</td><td>Asset Model</td><td>PDT Count</td><td>System Count</td></tr>";
	  // Load AuditScan objects with short descriptions of locations
	  $objAuditScanArray = AuditScan::LoadArrayByAuditId($objAudit->AuditId,QQ::Clause(QQ::Expand(QQN::AuditScan()->Location)));
		$intEntityIdArray = array();
		// Array of AssetId in that audit
		foreach ($objCopyAuditScanArray=&$objAuditScanArray as $objNewAuditScan) {
			$intEntityIdArray[] = $objNewAuditScan->EntityId;
		}
		// Load Asset objects by array of AssetId
		$objAssetArray = Asset::QueryArray(QQ::In(QQN::Asset()->AssetId,$intEntityIdArray),QQ::Clause(QQ::Expand(QQN::Asset()->AssetModel)));
		foreach ($objAssetArray as $objAsset) {
			$objAssetArrayById[$objAsset->AssetId] = $objAsset;
		}
		// Display the report table
	  foreach ($objAuditScanArray as $objAuditScan) {
	    $intAssetId = $objAuditScan->EntityId;
	    echo "<tr><td>".$objAuditScan->Location->ShortDescription."</td><td>".$objAssetArrayById[$intAssetId]->AssetCode."</td><td>".$objAssetArrayById[$intAssetId]->AssetModel."</td><td>".$objAuditScan->Count."</td><td>";
	  	if ($objAuditScan->Location->LocationId != $objAssetArrayById[$intAssetId]->LocationId) {
	  	  echo "0";
	  	}
	  	else {
	  	  echo "1";
	  	}
	  	echo "</td></tr>";
	  }
	  echo "</table></td></tr>";
	}
}

?>
    </table>
   </td>


		
<?php $this->RenderEnd() ?>		
<?php require_once('../includes/footer.inc.php'); ?>