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
	
	// !!!Only for test mode
	//$blnError = true;
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
			// Asset must either be 'To Be Received' or 'Shipped
			elseif (!($objNewAsset->LocationId == 5 || $objNewAsset->LocationId == 2)) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset has already been received.<br />";
			}
			/* ???
			elseif ($objPendingShipment = AssetTransaction::PendingShipment($objNewAsset->AssetId)) {
				$blnError = true;
				$strWarning .= $strAssetCode." - That asset is in a pending shipment.<br />";
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
				//$arrPendingReceiptId[] = $objPendingReceipt->ReceiptId;
			}
		}
	}
	
	if (!$blnError) {
    	/*$objTransaction = new Transaction();
    	$objTransaction->EntityQtypeId = EntityQtype::Asset;
    	$objTransaction->TransactionTypeId = 7; // Receive
    	$objTransaction->Save();*/
    	    
    	foreach ($objAssetArray as $objAsset) {
    	    $objDestinationLocationId = $arrLocation[$objAsset->AssetId];
    	    $intDestinationLocationId = $objDestinationLocation->LocationId;
    	    /*
      		$objAssetTransaction = new AssetTransaction();
      		//$objAssetTransaction->TransactionId = $objTransaction->TransactionId;
      		//$objAssetTransaction->AssetId = $objAsset->AssetId;
      		//$objAssetTransaction->SourceLocationId = $objAsset->LocationId;
      		$objAssetTransaction->DestinationLocationId = $intDestinationLocationId;
      		$objAssetTransaction->Save();
      		*/
      		$objAsset->LocationId = $intDestinationLocationId;
      		$objAsset->Save();
      	}
    	$strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='asset_menu.php'>Manage Assets</a><br />";
    	//Remove that flag when transaction is compelete or exists some errors
        unset($_SESSION['intUserAccountId']);
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