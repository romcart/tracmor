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

if ($_POST && $_POST['method'] == 'complete_transaction') {
	/*
	Run error checking on the array of asset codes and the destination location
	If there are no errors, then you will add the transaction to the database.
		That will include an entry in the Transaction and Asset Transaction table.
		You will also have to change the asset.location_id to the destination location
	*/
	$arrAssetCodeLocation = explode('#',$_POST['result']);
	
	// !!!Only for test mode
	$blnError = true;
	//$blnError = false;
	$arrCheckedAssetCodeLocation = array();
	foreach ($arrAssetCodeLocation as $strAssetCodeLocation) {
	    list($strAssetCode, $strLocation) = split('[|]',$strAssetCodeLocation,2);
		if ($strAssetCode && $strLocation) {
			// Begin error checking
			// Asset Code must match an existing asset in the system
			$objNewAsset = Asset::LoadByAssetCode($strAssetCode);
			if (!($objNewAsset instanceof Asset)) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset code does not exist.<br />";
			}
			/* ???				
			// Cannot move, check out/in, nor reserve/unreserve any assets that have been shipped
			elseif ($objNewAsset->LocationId == 2) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset has already been shipped.<br />";
			}
			*/
			// The asset.location_id must be 5 "To Be Received"
			elseif ($objNewAsset->LocationId != 5) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset must be scheduled to be received.<br />";
			}
			/* ???
			elseif ($objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset is already in a pending shipment.<br />";
			}
			*/
			// Asset must be in a pending receipt
			elseif (!($objPendingReceipt = AssetTransaction::PendingReceipt($objNewAsset->AssetId))) {
                $blnError = true;
                $strWarning .= $strAssetCode." - That asset must be in a pending receipt.<br />";
			}
			// Asset cannot be checked out
			elseif ($objNewAsset->CheckedOutFlag) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset is checked out.<br />";
			}
			// Asset cannot be reserved
			elseif ($objNewAsset->ReservedFlag) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset is reserved.<br />";
			}
			// Destination Location must match an existing location
			elseif (!($objDestinationLocation = Location::LoadByShortDescription($strLocation))) {
			    $blnError = true;
                $strWarning .= $strLocation." - Destination Location does not exist.<br />";
			}
			else {
			    $arrCheckedAssetCodeLocation[] = $strAssetCodeLocation;
			}
			
			if (!$blnError && $objNewAsset instanceof Asset)  {
				$objAssetArray[] = $objNewAsset;
			}
						
			/* commented out, from receipt_edit.php
			$intAssetTransactionId = $strParameter;
			if ($this->objAssetTransactionArray) {
				
				try {
					// Get an instance of the database
					$objDatabase = QApplication::$Database[1];
					// Begin a MySQL Transaction to be either committed or rolled back
					$objDatabase->TransactionBegin();
					// This boolean later lets us know if we need to flip the ReceivedFlag
					$blnAllAssetsReceived = true;
					foreach ($this->objAssetTransactionArray as &$objAssetTransaction) {
						if ($objAssetTransaction->AssetTransactionId == $intAssetTransactionId) {
							// Get the value of the location where this Asset is being received to
							$lstLocationAssetReceived = $this->GetControl('lstLocationAssetReceived' . $objAssetTransaction->AssetTransactionId);
							if ($lstLocationAssetReceived && $lstLocationAssetReceived->SelectedValue) {
								// Set the DestinationLocation of the AssetTransaction
								$objAssetTransaction->DestinationLocationId = $lstLocationAssetReceived->SelectedValue;
								$objAssetTransaction->Save();
								// Reload AssetTransaction to avoid Optimistic Locking Exception if this receipt is edited and saved.
								$objAssetTransaction = AssetTransaction::Load($objAssetTransaction->AssetTransactionId);
								// Move the asset to the new location
								$objAssetTransaction->Asset->LocationId = $lstLocationAssetReceived->SelectedValue;
								$objAssetTransaction->Asset->Save();
								$objAssetTransaction->Asset = Asset::Load($objAssetTransaction->AssetId);
							}
							else {
								$blnError = true;
								$lstLocationAssetReceived->Warning = "Please Select a Location.";
							}
						}
						// If any AssetTransaction still does not have a DestinationLocation, it is still Pending
						if (!$objAssetTransaction->DestinationLocationId) {
							$blnAllAssetsReceived = false;
						}
					}
				
					// If all the assets have been received, check that all the inventory has been received
					if ($blnAllAssetsReceived) {
						$blnAllInventoryReceived = true;
						if ($this->objInventoryTransactionArray) {
							foreach ($this->objInventoryTransactionArray as $objInventoryTransaction) {
								if (!$objInventoryTransaction->DestinationLocationId) {
									$blnAllInventoryReceived = false;
								}
							}
						}
						// Set the entire receipt as received if assets and inventory have all been received
						if ($blnAllInventoryReceived) {
							$this->objReceipt->ReceivedFlag = true;
							$this->objReceipt->ReceiptDate = new QDateTime(QDateTime::Now);
							$this->objReceipt->Save();
							// Reload to get new timestamp to avoid optimistic locking if edited/saved again without reload
							$this->objReceipt = Receipt::Load($this->objReceipt->ReceiptId);
							// Update labels (specifically we want to update Received Date)
							$this->UpdateReceiptLabels();
						}
					}
					
					// Commit all of the transactions to the database
					$objDatabase->TransactionCommit();
				}
				catch (QExtendedOptimisticLockingException $objExc) {
					
					// Rollback the database transactions if an exception was thrown
					$objDatabase->TransactionRollback();
					
					if ($objExc->Class == 'AssetTransaction' || $objExc->Class == 'Asset') {
						// Set the offending AssetTransaction DestinationLocation to null so that the value doesn't change in the datagrid
						if ($objExc->Class == 'AssetTransaction' && $this->objAssetTransactionArray)
							foreach ($this->objAssetTransactionArray as $objAssetTransaction) {
								if ($objAssetTransaction->AssetTransactionId == $objExc->EntityId) {
									$objAssetTransaction->DestinationLocationId = null;
								}
							}
						$this->dtgAssetTransact->Warning = sprintf('That asset has been added, removed, or received by another user. You must <a href="receipt_edit.php?intReceiptId=%s">Refresh</a> to edit this receipt.', $this->objReceipt->ReceiptId);
					}
					else {
						throw new QOptimisticLockingException($objExc->Class);
					}
				}
			}
			*/
		}
	}
	
	if (!$blnError) {
	    /* commented out, Submit Transaction for Move Assets
        $objDestinationLocation = Location::LoadByShortDescription($_POST['destination_location']);
        if (!$objDestinationLocation) {
            $blnError = true;
            $strWarning .= $_POST['destination_location']." - Destination Location does not exist.<br />";
        }
        else {
    	    $intDestinationLocationId = $objDestinationLocation->LocationId;
    	    
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
            $arrCheckedAssetCodeLocation = "";
        }
        */        
	}
	else {
	    $strWarning .= "This transaction has not been completed.<br />";
	}
	if (is_array($arrCheckedAssetCodeLocation)) {
	    foreach ($arrCheckedAssetCodeLocation as $strAssetCodeLocation) {
	        list($strAssetCode, $strLocation) = split('[|]',$strAssetCodeLocation,2);
	    	$strJavaScriptCode .= "AddAssetLocationPost('".$strAssetCode."','".$strLocation."');";
	    }
	}
}

?>

<html>
<head>
<title>Tracmor Portable Interface - Receive Assets</title>
<link rel="stylesheet" type="text/css" href="/css/portable.css">
<!-- <script type="text/javascript" src="<?php echo __JS_ASSETS__; ?>/portable.js"></script> -->
<script>
var i = 0;
var arrayAssetCode = new Array();
function AddAssetLocation() {
    var strAssetCode = document.getElementById('asset_code').value;
    var strLocation = document.getElementById('destination_location').value
    if (strAssetCode != '' && strLocation != '') {
        document.getElementById('warning').innerHTML = "";
        arrayAssetCode[i++] = strAssetCode + "|" + strLocation;
        document.getElementById('result').innerHTML += "Asset Code: " + strAssetCode + " Location: " + strLocation + "<br/>";
        document.getElementById('asset_code').value = '';
        document.getElementById('destination_location').value = '';
        document.getElementById('asset_code').focus();
    }
    else {
        if (strAssetCode == '') {
            document.getElementById('warning').innerHTML = "Asset Code cannot be empty";
            document.getElementById('asset_code').focus();
        }
        else {
            document.getElementById('warning').innerHTML = "Destination Location cannot be empty";
            document.getElementById('destination_location').focus();
        }
    }
}
function AddAssetLocationPost(strAssetCode,strLocation) {
    if (strAssetCode != '' && strLocation != '') {
        arrayAssetCode[i++] = strAssetCode + "|" + strLocation;
        document.getElementById('result').innerHTML += "Asset Code: " + strAssetCode + " Location: " + strLocation + "<br/>";
        document.getElementById('asset_code').value = '';
        document.getElementById('destination_location').value = '';
        document.getElementById('asset_code').focus();
    }
}
function CompleteReceipt() {
    var strAssetCode = "";
    strAssetCode = arrayAssetCode.join("#");
    if (arrayAssetCode.length == 0) {
        document.getElementById('warning').innerHTML = "You must provide at least one asset";
        return false;
    }
    if (arrayAssetCode.length>0) {
         document.main_form.result.value = strAssetCode;
         return true;
    }
    return false;
}
</script>
</head>
<body onload="document.getElementById('asset_code').value=''; document.getElementById('asset_code').focus(); <?php echo $strJavaScriptCode; ?>">

<h1>TRACMOR PORTABLE INTERFACE</h1>
<h3>Receive Assets</h3>
    <div id="warning"><?php echo $strWarning; ?></div>
    Asset Code: <input type="text" id="asset_code" size="10">
    <br /><br />
    Destination Location: <input type="text" id="destination_location" onkeypress="javascript:if(event.keyCode=='13') AddAssetLocation();" size ="20">
    <input type="button" value="Add Asset" onclick="javascript:AddAssetLocation();">
    <br /><br />
    <form method="post" name="main_form" onsubmit="javascript:return CompleteReceipt();">
    <input type="hidden" name="method" value="complete_transaction">
    <input type="hidden" name="result" value="">
    <input type="submit" value="Complete Receipt " onclick="javascript:CompleteReceipt();">
    </form>
    <div id="result"></div>

<?php
require_once('./includes/footer.inc.php');
?>