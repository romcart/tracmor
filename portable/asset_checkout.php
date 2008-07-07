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
	$arrAssetCode = array_unique(explode('#',$_POST['result']));
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
			// Check Out
			elseif ($objNewAsset->CheckedOutFlag) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset is already checked out.<br />";
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
    // There is a 1 to Many relationship between Transaction and AssetTransaction so each Transaction can have many AssetTransactions.
  	$objTransaction = new Transaction();
  	$objTransaction->EntityQtypeId = EntityQtype::Asset;
  	$objTransaction->TransactionTypeId = 3; // Check Out
  	$objTransaction->Save();
  	  
  	$intDestinationLocationId = 1; // Check Out
  		
  	foreach ($objAssetArray as $objAsset) {
			$objAssetTransaction = new AssetTransaction();
    	$objAssetTransaction->AssetId = $objAsset->AssetId;
    	$objAssetTransaction->TransactionId = $objTransaction->TransactionId;
    	$objAssetTransaction->SourceLocationId = $objAsset->LocationId;
    	$objAssetTransaction->DestinationLocationId = $intDestinationLocationId;
    	$objAssetTransaction->Save();
    		
    	$objAsset->LocationId = $intDestinationLocationId;
    	$objAsset->CheckedOutFlag = true;
    	$objAsset->Save();
    }
  	$strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='asset_menu.php'>Manage Assets</a><br />";
  	//Remove that flag when transaction is compelete or exists some errors
    unset($_SESSION['intUserAccountId']);
    $blnTransactionComplete = true;
    $arrCheckedAssetCode = "";
  }
	else {
	  $strWarning .= "This transaction has not been completed.<br />";
	}
	if (is_array($arrCheckedAssetCode)) {
	  foreach ($arrCheckedAssetCode as $strAssetCode) {
	  	$strJavaScriptCode .= "AddAssetPost('".$strAssetCode."');";
	  }
	}
}

$strTitle = "Check Out Asset";
$strBodyOnLoad = "document.getElementById('asset_code').value=''; document.getElementById('asset_code').focus();".$strJavaScriptCode;

require_once('./includes/header.inc.php');
?>

  <div id="warning"><?php echo $strWarning; ?></div>
<?php
if (!isset($blnTransactionComplete) ||  !$blnTransactionComplete) {
?>
  Asset Code: <input type="text" id="asset_code" onkeypress="javascript:if(event.keyCode=='13') AddAsset();" size="10">
  <input type="button" value="Add Asset" onclick="javascript:AddAsset();">
  <br /><br />
  <form method="post" name="main_form" onsubmit="javascript:return CompleteCheckOut();">
  <input type="hidden" name="method" value="complete_transaction">
  <input type="hidden" name="result" value="">
  <input type="submit" value="Complete Check Out">
  </form>
  <div id="result"></div>

<?php
}
require_once('./includes/footer.inc.php');
?>