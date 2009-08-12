<?php
/* This script allows to add new location 'Archived' (location_id=6)
 * in the existing database
 */
require_once('../includes/prepend.inc.php');
QApplication::Authenticate();
$objDatabase = Location::GetDatabase();
// Load the Location Object by location_id=6
$objLocation = Location::Load(6);
// If the location exist or already updated
if ($objLocation && $objLocation->ShortDescription != 'Archived') {

  $objDatabase->NonQuery("SET FOREIGN_KEY_CHECKS = 0;");
  // Update location_id=6 to 'Archived'
  $strQuery = sprintf("UPDATE `location`
                      SET `short_description`='Archived', `created_by`=NULL, `modified_by`=NULL, `creation_date`=NULL, `modified_date`=NULL, `long_description`=NULL
                      WHERE `location_id`='6';");
  $objDatabase->NonQuery($strQuery);
  // Save existing location with new location_id
  $strQuery = sprintf("INSERT INTO `location` VALUES
    (NULL, '$objLocation->ShortDescription', '$objLocation->LongDescription', '$objLocation->CreatedBy', '".$objLocation->CreationDate->PHPDate('Y-m-d H:i:s')."', '$objLocation->ModifiedBy', '$objLocation->ModifiedDate');");
  // Save and reload old location
  $objDatabase->NonQuery($strQuery);
  $objNewLocation = Location::LoadByShortDescription($objLocation->ShortDescription);
  // Get new location_id
  $objNewLocationId = $objNewLocation->LocationId;

  // Update all foreign keys and links
  // Added `modified_date`=`modified_date` to avoid the attribute "ON UPDATE CURRENT_TIMESTAMP"
  $strQuery = sprintf("UPDATE `asset`
                      SET `location_id`='%s', `modified_date`=`modified_date`
                      WHERE `location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);
  $strQuery = sprintf("UPDATE `audit_scan`
                      SET `location_id`='%s'
                      WHERE `location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);
  $strQuery = sprintf("UPDATE `inventory_location`
                      SET `location_id`='%s', `modified_date`=`modified_date`
                      WHERE `location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);
  $strQuery = sprintf("UPDATE `asset_transaction`
                      SET `source_location_id`='%s', `modified_date`=`modified_date`
                      WHERE `source_location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);
  $strQuery = sprintf("UPDATE `asset_transaction`
                      SET `destination_location_id`='%s', `modified_date`=`modified_date`
                      WHERE `destination_location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);
  $strQuery = sprintf("UPDATE `inventory_transaction`
                      SET `source_location_id`='%s', `modified_date`=`modified_date`
                      WHERE `source_location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);
   $strQuery = sprintf("UPDATE `inventory_transaction`
                      SET `destination_location_id`='%s', `modified_date`=`modified_date`
                      WHERE `destination_location_id`='6';", $objNewLocationId);
  $objDatabase->NonQuery($strQuery);

  CreateRoleTransactionTypeAuthorizations();

  $objDatabase->NonQuery("SET FOREIGN_KEY_CHECKS = 1;");

  echo "Updated!";
}
elseif ($objLocation) {
  echo "Already updated!";
}
// If location_id=6 doesn't exist
else {
  $strQuery = sprintf("INSERT INTO `location` VALUES (6, 'Archived', NULL, NULL, NULL, NULL, NULL);");
  $objDatabase->NonQuery($strQuery);
  CreateRoleTransactionTypeAuthorizations();
  echo "Updated!";
}

function CreateRoleTransactionTypeAuthorizations() {
  $intRoleTransactionTypeAuthorizationArray = RoleTransactionTypeAuthorization::CountAll();
  if (count($intRoleTransactionTypeAuthorizationArray)) {
    foreach (Role::LoadAll() as $objRole) {
      // Archive
      $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
      $objRoleTransactionTypeAuthorization->RoleId = $objRole->RoleId;
      $objRoleTransactionTypeAuthorization->TransactionTypeId = 10;
      $objRoleTransactionTypeAuthorization->AuthorizationLevelId = 1;
      $objRoleTransactionTypeAuthorization->Save();
      // Unarchive
      $objRoleTransactionTypeAuthorization = new RoleTransactionTypeAuthorization();
      $objRoleTransactionTypeAuthorization->RoleId = $objRole->RoleId;
      $objRoleTransactionTypeAuthorization->TransactionTypeId = 11;
      $objRoleTransactionTypeAuthorization->AuthorizationLevelId = 1;
      $objRoleTransactionTypeAuthorization->Save();
    }
  }
}
?>
