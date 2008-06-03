<?php
require_once('../includes/prepend.inc.php');

// Check that the user is properly authenticated
if (!isset($_SESSION['AuthenticateSuccess'])) {
    // authenticate error
	QApplication::Redirect('./index.php');
}

if ($_POST && $_POST['method'] == 'complete_transaction') {
	/*
	Run error checking on the array of asset codes and the destination location
	If there are no errors, then you will add the transaction to the database.
		That will include an entry in the Transaction and Asset Transaction table.
		You will also have to change the asset.location_id to the destination location
	*/
	/*
	if (!$blnError) {
	
		$intDestinationLocationid = Location::LoadByShortDescription($_POST['destination_location']);
	
		foreach ($arrAssetCode as $strAssetCode) {
			
			$objAsset = Asset::LoadByAssetCode($strAssetCode);
			
			$objTransaction = new Transaction();
			$objTransaction->EntityQtypeId = EntityQtype::Asset;
			$objTransaction->TransactionTypeId = 1; // Move
			$objTransaction->Save();
			
			$objAssetTransaction = new AssetTransaction();
			$objAssetTransaction->AssetId = $objAsset->AssetId;
			$objAssetTransaction->TransactionId = $objTransaction->TransactionId;
			$objAssetTransaction->SourceLocationId = $objAsset->SourceLocationId;
			$objAssetTransaction->DestinationLocationId = $intDestinationLocationId;
			$objAssetTransaction->Save();
			
			$objAsset->LocationId = $intDestinationLocationId;
			$objAsset->Save();
		}
	}
	*/
}
//Remove that flag when transaction is compelete or exists some errors
unset($_SESSION['intUserAccountId']);
?>

<html>
<head>
<title>Tracmor Portable Interface - Move Assets</title>
<link rel="stylesheet" type="text/css" href="/css/portable.css">
</head>
<body onload="document.main_form.asset_code.value=''; document.main_form.asset_code.focus();">

<h1>TRACMOR PORTABLE INTERFACE</h1>
<h3>Move Assets</h3>

Asset Code: <input type="text" name="asset_code" size="10">
<input type="button" value="Add Asset">
<!-- When the user clicks Add Asset, we need to add that asset code to an array using Javascript to prepare for submitting the transaction -->
<br /><br />
<form method="post" name="main_form">
<input type="hidden" name="method" value="complete_transaction">
Destination Location: <input type="text" name="location" size ="20">
<input type="submit" value="Complete Move">
</form>

</body>
</html>