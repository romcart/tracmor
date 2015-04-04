<?php
/*
 * This script updates a Tracmor database to version 0.4.1
 */
require_once('../includes/prepend.inc.php');

$objDatabase = QApplication::$Database[1];

// Check if this script has already been run
$objDbResult = $objDatabase->Query("SELECT `version` FROM `_version`");
$arrRecord = $objDbResult->FetchArray();
if ($arrRecord['version'] == '0.4.2') {
        echo('This script has already been run! Exiting...');
        exit;
}

// Put the following in a transaction and rollback if there are any problems
try {
	$objDatabase->TransactionBegin();

	// Add user_account.owner_flag
	$strQuery = "ALTER TABLE `user_account` ADD COLUMN `owner_flag` BIT(1) NOT NULL DEFAULT b'0' AFTER `admin_flag`;";
	$objDatabase->NonQuery($strQuery);

	// Make user_account.email_address unique
	$strQuery = "ALTER TABLE `user_account` ADD UNIQUE(`email_address`);";
	$objDatabase->NonQuery($strQuery);

	// Add user_account.password_reset_code
	$strQuery =	"ALTER TABLE `user_account` ADD COLUMN `password_reset_code` VARCHAR(64) DEFAULT NULL AFTER `role_id`;";
	$objDatabase->NonQuery($strQuery);

	// Add user_account.password_reset_expiry
	$strQuery =	"ALTER TABLE `user_account` ADD COLUMN `password_reset_expiry` DATETIME DEFAULT NULL AFTER `password_reset_code`;";
	$objDatabase->NonQuery($strQuery);

	// Create email_queue table
	$strQuery = 
	"CREATE TABLE `email_queue` (
		`email_queue_id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		`to_address` VARCHAR(128) DEFAULT NULL,
		`from_address` VARCHAR(128) DEFAULT NULL,
		`subject` VARCHAR(255) DEFAULT NULL,
		`body` TEXT,
		`html` TEXT,
		`error_flag` BOOLEAN DEFAULT NULL,
		`error_message` VARCHAR(255) DEFAULT NULL,
		PRIMARY KEY (`email_queue_id`)
	) ENGINE=INNODB DEFAULT CHARSET=utf8;";
	$objDatabase->NonQuery($strQuery);

	// Set version
	$strQuery = "UPDATE `_version` SET `version`='0.4.2';";
	$objDatabase->NonQuery($strQuery);

	$objDatabase->TransactionCommit();
	echo('Update successful!');

} catch (Exception $objExc) {
	// Something went wrong
	$objDatabase->TransactionRollback();
	echo('Update failed!');
}
