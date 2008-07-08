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
          	// Asset Code must be exist
      			if (!($objNewAsset instanceof Asset)) {
      				$blnError = true;
      				$strWarning .= $strAssetCode." - That asset code does not exist.<br />";
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
  				$strWarning .= $strAssetCode." - That asset code does not exist.<br />";
  			}
  			else {
  			  // Check a duplicate asset code
  			  if ($_POST['main_result'] && strstr($_POST['main_result'],$strAssetCode)) {
            $arrLocationAsset = explode('|',$_POST['main_result']);
            foreach ($arrLocationAsset as $strLocationAsset) {
             	list($strLocation, $strAsset) = split('[:]',$strLocationAsset,2);
             	if ($strAsset && strstr($strAsset,$strAssetCode)) {
             	  $blnError = true;
             	  $strWarning .= $strAssetCode." - That asset code has already been added.<br />";
             	}
            }
          }
  			  else $arrCheckedAssetCode[] = $strAssetCode;
  			}
  		}
  		else {
  			$strWarning .= "Please enter an asset code.<br />";
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
?>  Location: <input type="text" id="location" onkeypress="javascript:if(event.keyCode=='13') AddAuditLocation();" size ="10">
  <input type="button" value="Add Location" id="btn_add_location" onclick="javascript:AddAuditLocation();">
  <br /><br />
  Asset Code: <input type="text" id="asset_code" onkeypress="javascript:if(event.keyCode=='13') AddAuditAsset();" size="10" disabled>
  <input type="button" value="Add Asset" id="btn_add_asset" onclick="javascript:AddAuditAsset();" disabled>
  <br /><br />
  <form method="post" name="nextlocation_form" onsubmit="javascript:return NextLocation();">
  <input type="hidden" name="method" value="next_location">
  <input type="hidden" name="result" value="">
  <input type="hidden" name="main_result" value="<?php echo $strCheckedLocationAsset; ?>">
  <input type="hidden" name="location" value="">
  <input type="submit" value="Next Location">
  </form>
  <form method="post" name="main_form" onsubmit="javascript:return AssetsAuditDone();">
  <input type="hidden" name="method" value="complete_transaction">
  <input type="hidden" name="result" value="<?php echo $strCheckedLocationAsset; ?>">
  <input type="submit" value="Done">
  </form>
  <div id="result"></div>

<?php
}
require_once('./includes/footer.inc.php');
?>