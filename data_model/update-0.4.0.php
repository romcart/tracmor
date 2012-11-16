<?php
/* 
 * This script updates a Tracmor database to version 0.4.0
 */

require_once('../includes/prepend.inc.php');

$objDatabase = QApplication::$Database[1];

// Check if this script has already been run
$objDbResult = $objDatabase->Query("SHOW TABLES LIKE '_version'");
if (count($objDbResult->FetchArray())) {
	echo('This script has already been run! Exiting...');
	exit;
}

// Put the following in a transaction and rollback if there are any problems
try {
	$objDatabase->TransactionBegin();

	// Create _version table
	$strQuery = "CREATE TABLE `_version` (`version` VARCHAR(50)) ENGINE = INNODB";
	$objDatabase->NonQuery($strQuery);

	// Set version to 0.4.0
	$strQuery = "INSERT INTO `_version` (`version`) VALUES ('0.4.0')";
	$objDatabase->NonQuery($strQuery);

	// Change `textarea` custom field type name to `text area`
	$strQuery = "UPDATE `custom_field_qtype` SET `name` = 'text area' WHERE `custom_field_qtype_id` = 3";
	$objDatabase->NonQuery($strQuery);

	// Update terminology in Asset module shortcuts
	$strQuery = "UPDATE `shortcut` SET `short_description`='Models' WHERE `shortcut_id`='2'";
	$objDatabase->NonQuery($strQuery);

	$strQuery = "UPDATE `shortcut` SET `short_description`='Import Models' WHERE `shortcut_id`='3'";
	$objDatabase->NonQuery($strQuery);

	$strQuery = "UPDATE `shortcut` SET `short_description`='Create Model' WHERE `shortcut_id`='1'";
	$objDatabase->NonQuery($strQuery);

	// Change password_hash length to varchar(60)
	$strQuery = "ALTER TABLE  `user_account` CHANGE  `password_hash`  `password_hash` VARCHAR( 60 ) NOT NULL";
	$objDatabase->NonQuery($strQuery);

	// Update existing SHA1 hashes to PHPass hashes
	require('../includes/php/PasswordHash.php');
	$objHasher = new PasswordHash(8, PORTABLE_PASSWORDS);
	$objUserAccountArray = UserAccount::QueryArray(QQ::All());

	foreach($objUserAccountArray as $objUserAccount) {
		$strNewHash = $objHasher->HashPassword($objUserAccount->PasswordHash);
		$strQuery = sprintf("UPDATE `user_account` SET `password_hash` = '%s' WHERE `user_account_id` = %s", $strNewHash, $objUserAccount->UserAccountId);
		$objDatabase->NonQuery($strQuery);
	}

	$objDatabase->TransactionCommit();
	echo('Update successful!');

} catch (Exception $objExc) {
	// Something went wrong
	$objDatabase->TransactionRollback();
	echo('Update failed!');

}

?>