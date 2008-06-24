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
  	/*
  	Run error checking on the array of asset codes and the destination location
  	If there are no errors, then you will add the transaction to the database.
  		That will include an entry in the Transaction and Asset Transaction table.
  		You will also have to change the asset.location_id to the destination location
  	*/
  	/*
  	$arrAssetCode =  array_unique(explode('#',$_POST['result']));
  	$blnError = false;
  	$arrCheckedAssetCode = array();
  	foreach ($arrAssetCode as $strAssetCode) {
  		if ($strAssetCode) {
  			// Begin error checking
  			$objNewAsset = Asset::LoadByAssetCode($strAssetCode);
  			if (!($objNewAsset instanceof Asset)) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset code does not exist.<br />";
  			}				
  			// Cannot move, check out/in, nor reserve/unreserve any assets that have been shipped
  			elseif ($objNewAsset->LocationId == 2) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset has already been shipped.<br />";
  			}
  			// Cannot move, check out/in, nor reserve/unreserve any assets that are scheduled to  be received
  			elseif ($objNewAsset->LocationId == 5) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset is currently scheduled to be received.<br />";
  			}
  			elseif ($objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset is already in a pending shipment.<br />";
  			}
  			// Move
  			elseif ($objNewAsset->CheckedOutFlag) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset is checked out.<br />";
  			}
  			elseif ($objNewAsset->ReservedFlag) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset is reserved.<br />";
  			}
  			else {
  			  $arrCheckedAssetCode[] = $strAssetCode;
  			}
  			
  			if (!$blnError && $objNewAsset instanceof Asset)  {
  				$objAssetArray[] = $objNewAsset;
  			}
  		}
  		else {
  			$strWarning .= "Please enter an asset code.<br />";
  		}
  	}
  	
  	if (!$blnError) {
      $objDestinationLocation = Location::LoadByShortDescription($_POST['destination_location']);
      if (!$objDestinationLocation) {
        $blnError = true;
        $strWarning .= $_POST['destination_location']." - Destination Location does not exist.<br />";
      }
      else {
    	  $intDestinationLocationId = $objDestinationLocation->LocationId;
    	  
    	   // There is a 1 to Many relationship between Transaction and AssetTransaction so each Transaction can have many AssetTransactions.
    	  $objTransaction = new Transaction();
    		$objTransaction->EntityQtypeId = EntityQtype::Asset;
    		$objTransaction->TransactionTypeId = 1; // Move
    		$objTransaction->Save();
    	  
    	  foreach ($objAssetArray as $objAsset) {
      			$objAssetTransaction = new AssetTransaction();
      			$objAssetTransaction->AssetId = $objAsset->AssetId;
      			$objAssetTransaction->TransactionId = $objTransaction->TransactionId;
      			$objAssetTransaction->SourceLocationId = $objAsset->LocationId;
      			$objAssetTransaction->DestinationLocationId = $intDestinationLocationId;
      			$objAssetTransaction->Save();
      			
      			$objAsset->LocationId = $intDestinationLocationId;
      			$objAsset->Save();
      		}
    		$strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='asset_menu.php'>Manage Assets</a><br />";
    		//Remove that flag when transaction is compelete or exists some errors
        unset($_SESSION['intUserAccountId']);
        $arrCheckedAssetCode = "";
      }    
  	}
  	else {
  	  $strWarning .= "This transaction has not been completed.<br />";
  	}
  	if (is_array($arrCheckedAssetCode)) {
  	  foreach ($arrCheckedAssetCode as $strAssetCode) {
  	  	$strJavaScriptCode .= "AddAssetPost('".$strAssetCode."');";
  	  }
  	}
  	*/
  }
  elseif ($_POST['method'] == 'next_location') {
    if ($_POST['main_result']) {
      $strCheckedLocationAsset = $_POST['main_result'];
    }
    $arrCheckedAssetCode = array();
    $arrAssetCode =  array_unique(explode('#',$_POST['result']));
  	$blnError = false;
  	$arrCheckedAssetCode = array();
  	foreach ($arrAssetCode as $strAssetCode) {
  		if ($strAssetCode) {
  			// Begin error checking
  			$objNewAsset = Asset::LoadByAssetCode($strAssetCode);
  			if (!($objNewAsset instanceof Asset)) {
  				$blnError = true;
  				$strWarning .= $strAssetCode." - That asset code does not exist.<br />";
  			}
  			else {
  			  if ($_POST['main_result'] && (strstr($_POST['main_result'],$strAssetCode) /*|| strstr($_POST['main_result'],$_POST['location'])*/)) {
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
  	
  	$objDestinationLocation = Location::LoadByShortDescription($_POST['location']);
  	if ($objDestinationLocation) {
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
  Location: <input type="text" id="location" onkeypress="javascript:if(event.keyCode=='13') AddAuditLocation();" size ="10">
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
  <form method="post" name="main_form" onsubmit="javascript:return CompleteMove();">
  <input type="hidden" name="method" value="complete_transaction">
  <input type="hidden" name="result" value="<?php echo $strCheckedLocationAsset; ?>">
  <input type="submit" value="Done">
  </form>
  <div id="result"></div>

<?php
require_once('./includes/footer.inc.php');
?>