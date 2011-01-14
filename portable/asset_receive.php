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
	$arrAssetCodeLocation = array_unique(explode('#',$_POST['result']));

	$blnError = false;
	$arrCheckedAssetCodeLocation = array();
	$arrLocation = array();
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
			elseif ($objNewAsset->ArchivedFlag) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset code is invalid.<br />";
			}
			elseif ($objNewAsset->LinkedFlag) {
			  $blnError = true;
			  $strWarning .= $strAssetCode." - That asset is locked to a parent asset.";
			}
			// Asset must either be 'To Be Received' or 'Shipped'
			elseif (!($objNewAsset->LocationId == 5 || $objNewAsset->LocationId == 2)) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset has already been received.<br />";
			}
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
			  if (!array_key_exists($objNewAsset->AssetId,$arrLocation)) {
			    $arrLocation[$objNewAsset->AssetId] = $objDestinationLocation;
			    $arrCheckedAssetCodeLocation[] = $strAssetCodeLocation;
			  }
			  else {
			    $blnError = true;
			    $strWarning .= $strAssetCode." - That is a duplicate asset code.<br />";
			  }
			}

			if (!$blnError && $objNewAsset instanceof Asset)  {
			  $objAssetArray[] = $objNewAsset;
  			$arrPendingReceiptId[] = $objPendingReceipt->Transaction->Receipt->ReceiptId;
  			$objAssetTransactionArray[$objNewAsset->AssetId] = $objPendingReceipt;
			}
		}
	}

	if (!$blnError) {
	  $arrPendingReceiptId = array_unique($arrPendingReceiptId);

  	foreach ($objAssetArray as $objAsset) {
  	  $objDestinationLocation = $arrLocation[$objAsset->AssetId];
  	  $intDestinationLocationId = $objDestinationLocation->LocationId;

  	  // Set the DestinationLocation of the AssetTransaction
  	  $objAssetTransaction = $objAssetTransactionArray[$objAsset->AssetId];
    	$objAssetTransaction->DestinationLocationId = $intDestinationLocationId;
    	$objAssetTransaction->Save();

    	$objAsset->LocationId = $intDestinationLocationId;
			$objAsset->Save();

			if ($objLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objAsset->AssetId)) {
  		  foreach ($objLinkedAssetArray as $objLinkedAsset) {
  		    $objLinkedAsset->LocationId = $intDestinationLocationId;
  		    $objLinkedAsset->Save();
  		    if ($objChildPendingReceipt = AssetTransaction::PendingReceipt($objLinkedAsset->AssetId)) {
  		      $objChildPendingReceipt->DestinationLocationId = $intDestinationLocationId;
  		      $objChildPendingReceipt->Save();
  		    }
  		  }
  		}
    }

  	foreach ($arrPendingReceiptId as $intReceiptId) {
  	  Receipt::ReceiptComplete($intReceiptId);
  	}

  	$strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='asset_menu.php'>Manage Assets</a><br />";
  	//Remove that flag when transaction is compelete or exists some errors
    unset($_SESSION['intUserAccountId']);
    $blnTransactionComplete = true;
    $arrCheckedAssetCodeLocation = "";
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

$strTitle = "Receive Assets";
$strBodyOnLoad = "document.getElementById('asset_code').value=''; document.getElementById('asset_code').focus();".$strJavaScriptCode;

require_once('./includes/header.inc.php');
?>

  <div id="warning"><?php echo $strWarning; ?></div>
<?php
if (!isset($blnTransactionComplete) ||  !$blnTransactionComplete) {
?>
<table border=0 style="padding-top:16px;">
	<tr>
		<td align="right"><h2>Asset Code:</h2></td>
		<td valign="top"><input type="text" id="asset_code" size="10" onkeypress="javascript:if(event.keyCode=='13') document.getElementById('destination_location').focus();" style="width:170px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'"></td>
	</tr>
	<tr>
		<td align="right"><h2>Destination Location:</h2></td>
		<td><input type="text" id="destination_location" onkeypress="javascript:if(event.keyCode=='13') AddAssetLocation();" style="width:170px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'"></td>
	</tr>
	<form method="post" name="main_form" onsubmit="javascript:return CompleteReceipt();">
	<input type="hidden" name="method" value="complete_transaction">
	<input type="hidden" name="result" value="">
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Complete Receipt" style="width:216px;height:56px;font-size:24;"></td>
	</tr>
	</form>
</table><p>
<div id="output" style="font-size:24;width:100%;border-top:1px solid #CCCCCC;"></div>

<?php
}
require_once('./includes/footer.inc.php');
?>
