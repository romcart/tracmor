<?php
require_once('../includes/prepend.inc.php');

// Check that the user is properly authenticated
if (!isset($_SESSION['intUserAccountId'])) {
  // authenticate error
	QApplication::Redirect('./index.php');
}
else QApplication::$objUserAccount = UserAccount::Load($_SESSION['intUserAccountId']);

$strWarning = "";
$arrCheckedInventoryCodeLocationQuantity = "";
$strJavaScriptCode = "";

if ($_POST && $_POST['method'] == 'complete_transaction') {
	/*
	Run error checking on the array of asset codes and the destination location
	If there are no errors, then you will add the transaction to the database.
		That will include an entry in the Transaction and Asset Transaction table.
		You will also have to change the asset.location_id to the destination location
	*/
	$arrInventoryCodeLocationQuantity = array_unique(explode('#',$_POST['result']));
	
	$blnError = false;
	$arrCheckedInventoryCodeLocationQuantity = array();
	
	foreach ($arrInventoryCodeLocationQuantity as $strInventoryCodeLocationQuantity) {
	  $blnErrorCurrentInventory = false;
	  list($strInventoryModelCode, $strSourceLocation, $intQuantity) = split('[|]',$strInventoryCodeLocationQuantity,3);
	  if ($strInventoryModelCode && $strSourceLocation && $intQuantity) {
		  $intNewInventoryLocationId = 0;
		  // Begin error checking
	    // Load the inventory model object based on the inventory_model_code submitted
			$objInventoryModel = InventoryModel::LoadByInventoryModelCode($strInventoryModelCode);
			if ($objInventoryModel) {
				// Load the array of InventoryLocations based on the InventoryModelId of the InventoryModel object
				$InventorySourceLocationArray = InventoryLocation::LoadArrayByInventoryModelIdLocations($objInventoryModel->InventoryModelId);
				if ($InventorySourceLocationArray) {
				  $blnErrorCurrentInventory = true;
					foreach ($InventorySourceLocationArray as $InventoryLocation) {
						if ($InventoryLocation->Quantity != 0) {
							if (strtoupper($InventoryLocation->__toString()) == strtoupper($strSourceLocation)) {
							  $blnErrorCurrentInventory = false;
							  $intNewInventoryLocationId = $InventoryLocation->InventoryLocationId;
							  $objNewInventoryLocation = $InventoryLocation;
							}
						}
					}
					if ($blnErrorCurrentInventory) {
					  $strWarning .= $strInventoryModelCode." - There is no source location for that inventory code.<br />";
					  $blnError = true;
					}
				}
				else {
				  $blnError = true;
				  $blnErrorCurrentInventory = true;
					$strWarning .= $strInventoryModelCode." - There is no source location for that inventory code.<br />";
				}
			}
			else {
			  $blnError = true;
			  $blnErrorCurrentInventory = true;
				$strWarning .= $strInventoryModelCode." - That is not a valid inventory code.<br />";
			}
			
			if (isset($objInventoryLocationArray)) {
  			foreach ($objInventoryLocationArray as $objInventoryLocation) {
  				if ($objInventoryLocation && $objInventoryLocation->InventoryLocationId == $intNewInventoryLocationId) {
  					$blnError = true;
  					$blnErrorCurrentInventory = true;
  					$strWarning .= $strInventoryModelCode." - That Inventory has already been added.<br />";
  				}
  			}
			}
			
			if (!$blnError) {
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
				// Take Out
				elseif ($objNewInventoryLocation->Quantity < $intQuantity) {
					$strWarning .= $strInventoryModelCode." - Quantity taken out cannot exceed quantity available.<br />";
					$blnErrorCurrentInventory = true;
					$blnError = true;
				}
			}
		
  		if (!$blnError && $objNewInventoryLocation instanceof InventoryLocation)  {
  			$objNewInventoryLocation->intTransactionQuantity = $intQuantity;
  			$objInventoryLocationArray[] = $objNewInventoryLocation;
  		}
  		
  		if (!$blnErrorCurrentInventory) {
  		  $arrCheckedInventoryCodeLocationQuantity[] = $strInventoryCodeLocationQuantity;
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
    if (!$blnError) {
			// Create the new transaction object and save it
			$objTransaction = new Transaction();
			$objTransaction->EntityQtypeId = EntityQtype::Inventory;
			$objTransaction->TransactionTypeId = 5; // Take Out
			$objTransaction->Save();
			
			// Assign different source and destinations depending on transaction type
			foreach ($objInventoryLocationArray as $objInventoryLocation) {
				$SourceLocationId = $objInventoryLocation->LocationId;
				// LocationId = 3 - 'Taken Out'
				$DestinationLocationId = 3;
				
				// Remove the inventory quantity from the source for moves and take outs
				//$objInventoryLocation->Quantity = $objInventoryLocation->Quantity - $objInventoryLocation->intTransactionQuantity;
				$objInventoryLocation->Quantity = $objInventoryLocation->GetVirtualAttribute('actual_quantity') - $objInventoryLocation->intTransactionQuantity;
				$objInventoryLocation->Save();
					
				// Create the new InventoryTransaction object and save it
				$objInventoryTransaction = new InventoryTransaction();
				$objInventoryTransaction->InventoryLocationId = $objInventoryLocation->InventoryLocationId;
				$objInventoryTransaction->TransactionId = $objTransaction->TransactionId;
				$objInventoryTransaction->Quantity = $objInventoryLocation->intTransactionQuantity;
				$objInventoryTransaction->SourceLocationId = $SourceLocationId;
				$objInventoryTransaction->DestinationLocationId = $DestinationLocationId;
				$objInventoryTransaction->Save();
			}
			
			$strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='inventory_menu.php'>Inventory Menu</a><br />";
			//Remove that flag when transaction is compelete or exists some errors
      unset($_SESSION['intUserAccountId']);
      $blnTransactionComplete = true;
      $arrCheckedInventoryCodeLocationQuantity = "";
		}
  }
  
  if ($blnError) {
    $strWarning .= "This transaction has not been completed.<br />";
  }
  
  if (is_array($arrCheckedInventoryCodeLocationQuantity)) {
	  foreach ($arrCheckedInventoryCodeLocationQuantity as $strInventoryCodeLocationQuantity) {
	    list($strInventoryModelCode, $strSourceLocation, $intQuantity) = split('[|]',$strInventoryCodeLocationQuantity,3);
	  	$strJavaScriptCode .= "AddInventoryPost('".$strInventoryModelCode."','".$strSourceLocation."','".$intQuantity."');";
	  }
	}
}

$strTitle = "Take Out Inventory";
$strBodyOnLoad = "document.getElementById('inventory_code').focus();".$strJavaScriptCode;

require_once('./includes/header.inc.php');
?>

  <div id="warning"><?php echo $strWarning; ?></div>
<?php
if (!isset($blnTransactionComplete) ||  !$blnTransactionComplete) {
?>
  Inventory Code: <input type="text" id="inventory_code" size="20">
  <br /><br />
  Source Location: <input type="text" id="source_location" size="20">
  <br /><br />
  Quantity: <input type="text" id="quantity" size="10" onkeypress="javascript:if(event.keyCode=='13') AddInventory();">
  <input type="button" value="Add" onclick="javascript:AddInventory();">
  <br /><br />
  <form method="post" name="main_form" onsubmit="javascript:return CompleteTakeOutInventory();">
  <input type="hidden" name="method" value="complete_transaction">
  <input type="hidden" name="result" value="">
  <input type="submit" value="Complete Take Out">
  </form>
  <div id="output"></div>

<?php
}
require_once('./includes/footer.inc.php');
?>