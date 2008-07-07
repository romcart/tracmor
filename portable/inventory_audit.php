<?php
require_once('../includes/prepend.inc.php');

// Check that the user is properly authenticated
if (!isset($_SESSION['intUserAccountId'])) {
  // authenticate error
	QApplication::Redirect('./index.php');
}
else QApplication::$objUserAccount = UserAccount::Load($_SESSION['intUserAccountId']);

$strWarning = "";
$arrCheckedInventoryQuantity = "";
$strJavaScriptCode = "";
$strCheckedLocationInventory = "";

if ($_POST) {
  if  ($_POST['method'] == 'complete_transaction') {
  	$blnError = false;
  	$arrLocationInventoryCodeQuantity = array_unique(explode('!',$_POST['result']));
  	foreach ($arrLocationInventoryCodeQuantity as $strLocationInventoryCodeQuantity) {
      if ($strLocationInventoryCodeQuantity) {
        list($strLocation, $strInventoryCodeQuantity) = split('[:]',$strLocationInventoryCodeQuantity,2);
        // Location must be exist
      	$objDestinationLocation = Location::LoadByShortDescription($strLocation);
      	if (!$objDestinationLocation) {
          $strWarning .= $strLocation." - Location does not exist.<br />";
          $blnError = true;
        }
        $arrInventoryCodeQuantity = array_unique(explode('#',$strInventoryCodeQuantity));
        foreach ($arrInventoryCodeQuantity as $strInventoryCodeQuantity) {
       	  list($strInventoryModelCode, $intQuantity) = split('[|]',$strInventoryCodeQuantity,2);
        	$blnSourceLocationError = true;
       	  if ($strInventoryModelCode && $intQuantity) {
          	// Begin error checking
            // Load the inventory model object based on the inventory_model_code submitted
          	$objNewInventoryModel = InventoryModel::LoadByInventoryModelCode($strInventoryModelCode);
          	if (!$objNewInventoryModel) {
          	  $blnError = true;
          		$strWarning .= $strInventoryModelCode." - That is not a valid inventory code.<br />";
          	}
          	else {
          	  $InventorySourceLocationArray = InventoryLocation::LoadArrayByInventoryModelIdLocations($objNewInventoryModel->InventoryModelId);
      				if ($InventorySourceLocationArray) {
      					foreach ($InventorySourceLocationArray as $InventoryLocation) {
      						if (strtoupper($InventoryLocation->__toString()) == strtoupper($strLocation)) {
      						  $intNewInventoryLocationId = $InventoryLocation->InventoryLocationId;
      						  $objNewInventoryLocation = $InventoryLocation;
      						  $blnSourceLocationError = false;
      						}
      					}
      				}	
          	}
          	
          	if (!$blnError) {
          	  // This should not be possible because the list is populated with existing InventoryLocations
          		if (!($objNewInventoryModel instanceof InventoryModel)) {
          			$strWarning .= $strInventoryModelCode." - That Inventory location does not exist.<br />";
          			$blnError = true;
          		}
          		elseif (!ctype_digit($intQuantity) || $intQuantity <= 0) {
          			$strWarning .= $strInventoryModelCode." - That is not a valid quantity.<br />";
          			$blnError = true;
          		}
        	  }
        
     			  if (!$blnError && $objNewInventoryModel instanceof InventoryModel)  {
         			$objAuditScan = new AuditScan();
              $objAuditScan->LocationId = $objDestinationLocation->LocationId;
              $objAuditScan->EntityId = $objNewInventoryModel->InventoryModelId;
              $objAuditScan->Count = $intQuantity;
              if (!$blnSourceLocationError && $objNewInventoryLocation instanceof InventoryLocation) {
                $objAuditScan->SystemCount = $objNewInventoryLocation->Quantity;
              }
              else {
                $objAuditScan->SystemCount = 0;
              }
    				  $objAuditScanArray[] = $objAuditScan;
         		} 			
       		}
        }
      }
  	}

  	// Submit
  	if (!$blnError) {
  	  try {
        // Get an instance of the database
				$objDatabase = QApplication::$Database[1];
				// Begin a MySQL Transaction to be either committed or rolled back
				$objDatabase->TransactionBegin();
				
				$objAudit = new Audit();
        $objAudit->EntityQtypeId = 2; // Inventory
        $objAudit->Save();
        
    	  foreach ($objAuditScanArray as $objAuditScan) {
    	  	$objAuditScan->AuditId = $objAudit->AuditId;
    	  	$objAuditScan->Save();
    	  }
    	  
    	  $objDatabase->TransactionCommit();
    	  
    	  $strWarning .= "Your transaction has successfully completed<br /><a href='index.php'>Main Menu</a> | <a href='inventory_menu.php'>Inventory Menu</a><br />";
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
      $strCheckedLocationInventory = $_POST['main_result'];
    }
    $arrCheckedInventoryQuantity = array();
    $blnError = false;
    $blnErrorCurrentInventory = false;
  	$arrCheckedInventory = array();
  	$arrInventoryCodeQuantity = array_unique(explode('#',$_POST['result']));
  	
  	// Location must be exist
  	$objDestinationLocation = Location::LoadByShortDescription($_POST['location']);
  	if ($objDestinationLocation) {
  	  // Check a duplicate location
  	  if ($_POST['main_result'] && strstr($_POST['main_result'],$_POST['location'])) {
  	    $arrLocationInventoryQuantity = explode('!',$_POST['main_result']);
        foreach ($arrLocationInventoryQuantity as $strLocationInventoryQuantity) {
          list($strLocation, $strInventory) = split('[:]',$strLocationInventoryQuantity,2);
          if ($strInventory && strstr($strLocation,$_POST['location'])) {
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
    		
    		if (!$blnErrorCurrentInventory) {
    		  // This should not be possible because the list is populated with existing InventoryLocations
    			if (!($objNewInventoryModel instanceof InventoryModel)) {
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
  
  			if (!$blnErrorCurrentInventory) {
    		  $arrCheckedInventoryQuantity[] = $strInventoryCodeQuantity;
    		} 			
    	}
    }
  	
    if (!$blnError) {
      $strWarning .= $_POST['location']." - Location added. Please provide another location or click 'Done'.<br />";
      if ($_POST['main_result']) {
        $strCheckedLocationInventory .= "!".$_POST['location'].":".$_POST['result'];
      }
      else {
        $strCheckedLocationInventory = $_POST['location'].":".$_POST['result'];
      }
    }
    
    if ($blnError && is_array($arrCheckedInventoryQuantity)) {
      $strJavaScriptCode .= " strCheckedInventoryQuantity = '".implode("#",$arrCheckedInventoryQuantity)."';";
      $strJavaScriptCode .= " document.getElementById('location').value = '".$_POST['location']."';";
    }
  }
}

$strTitle = "Inventory Audit";
$strBodyOnLoad = "document.getElementById('location').disabled = false; document.getElementById('btn_add_location').disabled = false; document.getElementById('inventory_code').disabled = true; document.getElementById('quantity').disabled = true; document.getElementById('btn_add_inventory').disabled = true; document.getElementById('location').focus();".$strJavaScriptCode;

require_once('./includes/header.inc.php');
?>

  <div id="warning"><?php echo $strWarning; ?></div>
<?php
if (!isset($blnTransactionComplete) ||  !$blnTransactionComplete) {
?>
  Location: <input type="text" id="location" onkeypress="javascript:if(event.keyCode=='13') AddAuditInventoryLocation();" size ="10">
  <input type="button" value="Add Location" id="btn_add_location" onclick="javascript:AddAuditInventoryLocation();">
  <br /><br />
  Inventory Code: <input type="text" id="inventory_code" size="10" disabled>
  <br /><br />
  Quantity: <input type="text" id="quantity" onkeypress="javascript:if(event.keyCode=='13') AddAuditInventory();" size="10" disabled>
  <input type="button" value="Add Inventory" id="btn_add_inventory" onclick="javascript:AddAuditInventory();" disabled>
  <br /><br />
  <form method="post" name="nextlocation_form" onsubmit="javascript:return NextLocationInventory();">
  <input type="hidden" name="method" value="next_location">
  <input type="hidden" name="result" value="">
  <input type="hidden" name="main_result" value="<?php echo $strCheckedLocationInventory; ?>">
  <input type="hidden" name="location" value="">
  <input type="submit" value="Next Location">
  </form>
  <form method="post" name="main_form" onsubmit="javascript:return AssetsAuditDone();">
  <input type="hidden" name="method" value="complete_transaction">
  <input type="hidden" name="result" value="<?php echo $strCheckedLocationInventory; ?>">
  <input type="submit" value="Done">
  </form>
  <div id="result"></div>

<?php
}
require_once('./includes/footer.inc.php');
?>