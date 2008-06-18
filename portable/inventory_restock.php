<?php
require_once('../includes/prepend.inc.php');

// Check that the user is properly authenticated
if (!isset($_SESSION['intUserAccountId'])) {
    // authenticate error
	QApplication::Redirect('./index.php');
}
else QApplication::$objUserAccount = UserAccount::Load($_SESSION['intUserAccountId']);

$strWarning = "";
$arrCheckedInventoryCodeQuantity = "";
$strJavaScriptCode = "";

if ($_POST && $_POST['method'] == 'complete_transaction') {
	/*
	Run error checking on the array of asset codes and the destination location
	If there are no errors, then you will add the transaction to the database.
		That will include an entry in the Transaction and Asset Transaction table.
		You will also have to change the asset.location_id to the destination location
	*/
	$arrInventoryCodeQuantity = array_unique(explode('#',$_POST['result']));
	
	$blnError = false;
	$arrCheckedInventoryCodeQuantity = array();
	
	foreach ($arrInventoryCodeQuantity as $strInventoryCodeQuantity) {
	    $blnErrorCurrentInventory = false;
	    list($strInventoryModelCode, $intQuantity) = split('[|]',$strInventoryCodeQuantity,2);
	    if ($strInventoryModelCode && $intQuantity) {
		    // Begin error checking
	        // Load the inventory model object based on the inventory_model_code submitted
			$objNewInventoryModel = InventoryModel::LoadByInventoryModelCode($strInventoryModelCode);
			if (!$objNewInventoryModel) {
			    $blnError = true;
			    $blnErrorCurrentInventory = true;
				$strWarning .= $strInventoryModelCode." - That is not a valid inventory code.<br />";
			}
			else {
			    $intInventoryModelId = $objNewInventoryModel->InventoryModelId;
			}
			
			if (isset($objInventoryLocationArray) && !$blnErrorCurrentInventory) {
    			foreach ($objInventoryLocationArray as $objInventoryLocation) {
    				if ($objInventoryLocation && $objInventoryLocation->InventoryModelId == $intInventoryModelId) {
    					$blnError = true;
    					$blnErrorCurrentInventory = true;
    					$strWarning .= $strInventoryModelCode." - That Inventory has already been added.<br />";
    				}
    			}
			}
			
			if (!$blnError) {
				// Create a new InventoryLocation for the time being
				// Before saving we will check to see if it already exists 
				$objNewInventoryLocation = new InventoryLocation();
				$objNewInventoryLocation->InventoryModelId = $objNewInventoryModel->InventoryModelId;
				$objNewInventoryLocation->Quantity = 0;
				// LocationID = 4 is 'New Inventory' Location
				$objNewInventoryLocation->LocationId = 4;
			
			    // This should not be possible because the list is populated with existing InventoryLocations
				if (!($objNewInventoryLocation instanceof InventoryLocation)) {
					$strWarning .= $strInventoryModelCode." - That Inventory location does not exist.<br />";
					$blnErrorCurrentInventory = true;
					$blnError = true;
				}
				elseif (!ctype_digit($intQuantity) || $intQuantity <= 0) {
					$strWarning .= $strInventoryModelCode." - That is not a valid quantity.<br />";
					$blnErrorCurrentInventory = true;
					$blnError = true;
				}
			}
		
    		if (!$blnError && $objNewInventoryLocation instanceof InventoryLocation)  {
    			$objNewInventoryLocation->intTransactionQuantity = $intQuantity;
    			$objInventoryLocationArray[] = $objNewInventoryLocation;
    		}
    		
    		if (!$blnErrorCurrentInventory) {
    		    $arrCheckedInventoryCodeQuantity[] = $strInventoryCodeQuantity;
    		}
    	}
    	else {
    	    if (!ctype_digit($intQuantity) || $intQuantity <= 0) {
    	        $strWarning .= $strInventoryModelCode." - That is not a valid quantity.<br />";
       			$blnError = true;
    	    }
    	}
	}
	
	if (isset($objInventoryLocationArray)) {
        // Destination Location must match an existing location
        $strDestinationLocation = $_POST['destination_location'];
		if (!($objDestinationLocation = Location::LoadByShortDescription($strDestinationLocation))) {
		    $blnError = true;
            $strWarning .= $strDestinationLocation." - Destination Location does not exist.<br />";
		}
		
		if (!$blnError) {
			// Create the new transaction object and save it
			$objTransaction = new Transaction();
			$objTransaction->EntityQtypeId = EntityQtype::Inventory;
			$objTransaction->TransactionTypeId = 4; // Restock
			$objTransaction->Save();
			
			// Assign different source and destinations depending on transaction type
			foreach ($objInventoryLocationArray as $objInventoryLocation) {
				// Restock
				$SourceLocationId = 4;
				$DestinationLocationId = $objDestinationLocation->LocationId;
				
				// Add the new quantity where it belongs for moves and restocks
				$objNewInventoryLocation = InventoryLocation::LoadByLocationIdInventoryModelId($DestinationLocationId, $objInventoryLocation->InventoryModelId);
				if ($objNewInventoryLocation) {
					$objNewInventoryLocation->Quantity = $objNewInventoryLocation->Quantity + $objInventoryLocation->intTransactionQuantity;
				}
				else {
					$objNewInventoryLocation = new InventoryLocation();
					$objNewInventoryLocation->InventoryModelId = $objInventoryLocation->InventoryModelId;
					$objNewInventoryLocation->Quantity = $objInventoryLocation->intTransactionQuantity;
				}
				$objNewInventoryLocation->LocationId = $DestinationLocationId;
				$objNewInventoryLocation->Save();
				
				// Create the new InventoryTransaction object and save it
				$objInventoryTransaction = new InventoryTransaction();
				$objInventoryTransaction->InventoryLocationId = $objNewInventoryLocation->InventoryLocationId;
				$objInventoryTransaction->TransactionId = $objTransaction->TransactionId;
				$objInventoryTransaction->Quantity = $objInventoryLocation->intTransactionQuantity;
				$objInventoryTransaction->SourceLocationId = $SourceLocationId;
				$objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
				$objInventoryTransaction->Save();
			}
			
			$strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='inventory_menu.php'>Inventory Menu</a><br />";
			//Remove that flag when transaction is compelete or exists some errors
            unset($_SESSION['intUserAccountId']);
            $arrCheckedInventoryCodeQuantity = "";
		}
    }
    
    if ($blnError) {
        $strWarning .= "This transaction has not been completed.<br />";
    }
    
    if (is_array($arrCheckedInventoryCodeQuantity)) {
	    foreach ($arrCheckedInventoryCodeQuantity as $strInventoryCodeQuantity) {
	        list($strInventoryModelCode, $intQuantity) = split('[|]',$strInventoryCodeQuantity,2);
	    	$strJavaScriptCode .= "AddInventoryQuantityPost('".$strInventoryModelCode."','".$intQuantity."');";
	    }
	}
}

$strTitle = "Restock Inventory";
$strBodyOnLoad = "document.getElementById('inventory_code').focus();".$strJavaScriptCode;

require_once('./includes/header.inc.php');
?>

    <div id="warning"><?php echo $strWarning; ?></div>
    Inventory Code: <input type="text" id="inventory_code" size="20">
    <br /><br />
    Quantity: <input type="text" id="quantity" size="10" onkeypress="javascript:if(event.keyCode=='13') AddInventoryQuantity();">
    <input type="button" value="Add" onclick="javascript:AddInventoryQuantity();">
    <br /><br />
    <form method="post" name="main_form" onsubmit="javascript:return CompleteMoveInventory();">
    <input type="hidden" name="method" value="complete_transaction">
    <input type="hidden" name="result" value="">
    Destination Location: <input type="text" name="destination_location" onkeypress="javascript:if(event.keyCode=='13') CompleteMoveInventory();" size="20">
    <input type="submit" value="Complete Move">
    </form>
    <div id="result"></div>

<?php
require_once('./includes/footer.inc.php');
?>