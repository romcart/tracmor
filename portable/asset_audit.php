<?php
require_once('../includes/prepend.inc.php');

// Check that the user is properly authenticated
if (!isset($_SESSION['intUserAccountId'])) {
  // authenticate error
	QApplication::Redirect('./index.php');
}
else QApplication::$objUserAccount = UserAccount::Load($_SESSION['intUserAccountId']);

$strWarning = "";
$arrCheckedAssetCode = "";
$strJavaScriptCode = "";
$strCheckedLocationAsset = "";

if ($_POST) {
  if  ($_POST['method'] == 'complete_transaction') {
  	$arrLocationAssetCode =  array_unique(explode('|',$_POST['result']));
  	$blnError = false;
  	$intLocationIdArray = array();
  	$intAssetIdArray = array();
  	// Begin error checking for assets
  	foreach ($arrLocationAssetCode as $strLocationAssetCode) {
  		if ($strLocationAssetCode) {
  		  list($strLocation, $strAssetCodeArray) = split('[:]',$strLocationAssetCode,2);
  		  // Location must be exist
        $objDestinationLocation = Location::LoadByShortDescription($strLocation);
        if (!$objDestinationLocation) {
          $strWarning .= $strLocation." - Location does not exist.<br />";
          $blnError = true;
        }
        else {
          $intLocationIdArray[] = $objDestinationLocation->LocationId;
          $arrAssetCode =  array_unique(explode('#',$strAssetCodeArray));
          foreach ($arrAssetCode as $strAssetCode) {
          	$objNewAsset = Asset::LoadByAssetCode($strAssetCode);
          	// Asset Tag must be exist
      			if (!($objNewAsset instanceof Asset)) {
      				$blnError = true;
      				$strWarning .= $strAssetCode." - That asset tag does not exist.<br />";
      			}
      			elseif ($objNewAsset->ArchivedFlag) {
      				$blnError = true;
      				$strWarning .= $strAssetCode." - That asset tag is invalid.<br />";
      			}
      			elseif ($objNewAsset->LinkedFlag) {
      			  $blnError = true;
      			  $strWarning .= $strAssetCode." - That asset is locked to parent asset " . $objNewAsset->ParentAssetCode . ".<br />";
      			}
      			elseif (!$blnError && $objNewAsset instanceof Asset)  {
      			  $intAssetIdArray[] = $objNewAsset->AssetId;
      			  $objAuditScan = new AuditScan();
              $objAuditScan->LocationId = $objDestinationLocation->LocationId;
              $objAuditScan->EntityId = $objNewAsset->AssetId;
              $objAuditScan->Count = 1;
              if ($objDestinationLocation->LocationId != $objNewAsset->LocationId) {
                $objAuditScan->SystemCount = 0;
              }
              else {
                $objAuditScan->SystemCount = 1;
              }
              $objAuditScanArray[] = $objAuditScan;

              // Load an array of linked child assets and add to array
              $objLinkedChildAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objNewAsset->AssetId);
              if ($objLinkedChildAssetArray) {
                foreach ($objLinkedChildAssetArray as $objLinkedChildAsset) {
                  $intAssetIdArray[] = $objLinkedChildAsset->AssetId;
                  $objAuditScan = new AuditScan();
                  $objAuditScan->LocationId = $objDestinationLocation->LocationId;
                  $objAuditScan->EntityId = $objLinkedChildAsset->AssetId;
                  $objAuditScan->Count = 1;
                  if ($objDestinationLocation->LocationId != $objLinkedChildAsset->LocationId) {
                    $objAuditScan->SystemCount = 0;
                  }
                  else {
                    $objAuditScan->SystemCount = 1;
                  }
                  $objAuditScanArray[] = $objAuditScan;
                }
              }
    			  }
          }
        }
  		}
  	}

  	// Submit
  	if (!$blnError) {
  	  // Add missing assets that should have been at a location covered by the audit session but were not scanned
  	  if ($intLocationIdArray) {
  	    foreach ($intLocationIdArray as $intLocationId) {
  	    	$objAssetLocationArray = Asset::LoadArrayByLocationId($intLocationId);
  	     	if ($objAssetLocationArray) {
  	    		foreach ($objAssetLocationArray as $objAsset) {
  	     			if (!in_array($objAsset->AssetId, $intAssetIdArray)) {
  	     				$objNewAuditScan = new AuditScan();
  	     			  $objNewAuditScan->LocationId = $intLocationId;
  	     				$objNewAuditScan->Asset = $objAsset;
  	     				$objNewAuditScan->Count = 0;
  	     				$objNewAuditScan->SystemCount = 1;
  	     				$objAuditScanArray[] = $objNewAuditScan;
  	     				unset($objNewAuditScan);
  	     			}
  	     		}
  	     	}
  	    }
      }
  	  try {
        // Get an instance of the database
				$objDatabase = QApplication::$Database[1];
				// Begin a MySQL Transaction to be either committed or rolled back
				$objDatabase->TransactionBegin();

				$objAudit = new Audit();
        $objAudit->EntityQtypeId = 1; // Asset
        $objAudit->Save();

    	  foreach ($objAuditScanArray as $objAuditScan) {
    	  	$objAuditScan->AuditId = $objAudit->AuditId;
    	  	$objAuditScan->Save();
    	  }

    	  $objDatabase->TransactionCommit();

    	  $strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='asset_menu.php'>Manage Assets</a><br />";
    		//Remove that flag when transaction is compelete or exists some errors
        unset($_SESSION['intUserAccountId']);
        $blnTransactionComplete = true;
  	  }
  	  catch (QExtendedOptimisticLockingException $objExc) {
  	    // Rollback the database
  	    $objDatabase->TransactionRollback();
  	  }
  	}
  }
  elseif ($_POST['method'] == 'next_location') {
    // Load locations that have already been added
    if ($_POST['main_result']) {
      $strCheckedLocationAsset = $_POST['main_result'];
    }
    $arrCheckedAssetCode = array();
    $arrAssetCode =  array_unique(explode('#',$_POST['result']));
  	$blnError = false;
  	$arrCheckedAssetCode = array();
  	// Begin error checking for assets
  	foreach ($arrAssetCode as $strAssetCode) {
  		if ($strAssetCode) {
  			$objNewAsset = Asset::LoadByAssetCode($strAssetCode);
  			if (!($objNewAsset instanceof Asset)) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset tag does not exist.<br />";
  			}
  			else {
  			  // Check a duplicate asset tag
  			  if ($_POST['main_result'] && strstr($_POST['main_result'],$strAssetCode)) {
            $arrLocationAsset = explode('|',$_POST['main_result']);
            foreach ($arrLocationAsset as $strLocationAsset) {
             	list($strLocation, $strAsset) = split('[:]',$strLocationAsset,2);
             	if ($strAsset && strstr($strAsset,$strAssetCode)) {
             	  $blnError = true;
             	  $strWarning .= $strAssetCode." - That asset tag has already been added.<br />";
             	}
            }
          }
  			  else $arrCheckedAssetCode[] = $strAssetCode;
  			}
  		}
  		else {
  			$strWarning .= "Please enter an asset tag.<br />";
  		}
  	}
  	// Location must be exist
  	$objDestinationLocation = Location::LoadByShortDescription($_POST['location']);
  	if ($objDestinationLocation) {
  	  // Check a duplicate location
  	  if ($_POST['main_result'] && strstr($_POST['main_result'],$_POST['location'])) {
  	    $arrLocationAsset = explode('|',$_POST['main_result']);
        foreach ($arrLocationAsset as $strLocationAsset) {
          list($strLocation, $strAsset) = split('[:]',$strLocationAsset,2);
          if ($strAsset && strstr($strLocation,$_POST['location'])) {
            $blnError = true;
            $strWarning .= $_POST['location']." - That location has already been added.<br />";
            break;
          }
        }
  	  }
  	}
    if (!$objDestinationLocation) {
      $strWarning .= $_POST['location']." - Location does not exist. Please provide another location.<br />";
      $blnError = true;
    }
    elseif (!$blnError) {
      $strWarning .= $_POST['location']." - Location added. Please provide another location or click 'Done'.<br />";
      if ($_POST['main_result']) {
        $strCheckedLocationAsset .= "|".$_POST['location'].":".$_POST['result'];
      }
      else {
        $strCheckedLocationAsset = $_POST['location'].":".$_POST['result'];
      }
    }

    if ($blnError && is_array($arrCheckedAssetCode)) {
      $strJavaScriptCode .= " strCheckedAssetCode = '".implode("#",$arrCheckedAssetCode)."';";
      $strJavaScriptCode .= " document.getElementById('location').value = '".$_POST['location']."';";
    }
  }
}

$strTitle = "Assets Audit";
$strBodyOnLoad = "document.getElementById('location').disabled = false; document.getElementById('btn_add_location').disabled = false; document.getElementById('asset_code').disabled = true; document.getElementById('btn_add_asset').disabled = true; document.getElementById('location').focus();".$strJavaScriptCode;

require_once('./includes/header.inc.php');
?>

  <div id="warning"><?php echo $strWarning; ?></div>
<?php
if (!isset($blnTransactionComplete) ||  !$blnTransactionComplete) {
?>
<table border=0 style="padding-top:16px;">
	<tr>
		<td align="right"><h2>Location:</h2><input style="display:none;" type="button" value="Add Location" id="btn_add_location" onclick="javascript:AddAuditLocation();"></td>
		<td valign="top"><input type="text" id="location" onkeypress="javascript:if(event.keyCode=='13') AddAuditLocation();" style="width:170px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'"></td>
	</tr>
	<tr>
		<td align="right"><h2>Asset Tag:</h2><input style="display:none" type="button" value="Add Asset" id="btn_add_asset" onclick="javascript:AddAuditAsset();" disabled></td>
		<td valign="top"><input type="text" id="asset_code" onkeypress="javascript:if(event.keyCode=='13') AddAuditAsset();" style="width:170px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'" disabled></td>
	</tr>
	<form method="post" name="nextlocation_form" onsubmit="javascript:return NextLocation();">
	<input type="hidden" name="method" value="next_location">
	<input type="hidden" name="result" value="">
	<input type="hidden" name="main_result" value="<?php echo $strCheckedLocationAsset; ?>">
	<input type="hidden" name="location" value="">
	<tr>
		<td colspan="2" align="center"><input type="submit" id="btn_next" value="Next Location" style="width:216px;height:56px;font-size:24;"></td>
	</tr>
	</form>
	<form method="post" name="main_form" onsubmit="javascript:return AssetsAuditDone();">
	<input type="hidden" name="method" value="complete_transaction">
	<input type="hidden" name="result" value="<?php echo $strCheckedLocationAsset; ?>">
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Done" style="width:216px;height:56px;font-size:24;"></td>
	</tr>
	</form>
</table><p>
<div id="output" style="font-size:24;width:100%;border-top:1px solid #CCCCCC;"></div>

<?php
}
require_once('./includes/footer.inc.php');
?>
