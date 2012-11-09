<?php
/*
 * This script updates a Tracmor database to version 0.4.1
 */
require_once('../includes/prepend.inc.php');

$objDatabase = QApplication::$Database[1];

// Put the following in a transaction and rollback if there are any problems
try {
$objDatabase->TransactionBegin();

// Make _version updateable
$strQuery = "ALTER TABLE `_version` CHANGE COLUMN `version` `version` VARCHAR(50) NOT NULL
, ADD PRIMARY KEY (`version`) ;";
$objDatabase->NonQuery($strQuery);
//

// Set version to 0.4.0
$strQuery = "UPDATE `_version` SET `version`='0.4.1' WHERE `version` <>'0.4.1';";
$objDatabase->NonQuery($strQuery);

// Change default value for custom_field all_asset_model_flag
$strQuery = "ALTER TABLE `custom_field` CHANGE
             COLUMN `all_asset_models_flag` `all_asset_models_flag` BIT(1) NULL DEFAULT 1;";
$objDatabase->NonQuery($strQuery);

// Change asset_model table
$strQuery =
"ALTER TABLE `asset_model` ADD COLUMN `depreciation_class_id` INTEGER UNSIGNED NULL;";
$objDatabase->NonQuery($strQuery);
$strQuery ="ALTER TABLE `asset_model` ADD INDEX `asset_model_fkindex5` ( depreciation_class_id )";
$objDatabase->NonQuery($strQuery);

// Change asset table
$strQuery = "
  ALTER TABLE `asset` ADD COLUMN `depreciation_flag` BIT(1) DEFAULT NULL,
					  ADD COLUMN `purchase_date`    DATETIME  DEFAULT NULL,
					  ADD COLUMN `purchase_cost`    DECIMAL(10,2) DEFAULT NULL;
";
$objDatabase->NonQuery($strQuery);


// Add new Depreciation Tables and set foreign keys for them
$strQuery =
"  CREATE TABLE  depreciation_class(
   depreciation_class_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
   depreciation_method_qtype_id INTEGER UNSIGNED NOT NULL,
   short_description VARCHAR(255)   NOT NULL,
   life INTEGER UNSIGNED   NULL,
   PRIMARY KEY (depreciation_class_id),
   INDEX depreciation_class_fkindex1 ( depreciation_class_id ),
   UNIQUE (depreciation_method_qtype_id),
   UNIQUE (short_description),
   INDEX depreciation_class_fkindex2 ( depreciation_method_qtype_id )
)
ENGINE = INNODB;";
$objDatabase->NonQuery($strQuery);

// Create Depreciation method qtype table
$strQuery="
CREATE TABLE depreciation_method_qtype(
  depreciation_method_qtype_id  INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  short_description  VARCHAR(255)   NOT NULL,
  PRIMARY KEY (depreciation_method_qtype_id),
  INDEX depreciation_method_qtype_fkindex1 (depreciation_method_qtype_id))
ENGINE = INNODB;";
$objDatabase->NonQuery($strQuery);

// Add foreign key to Depreciation class table
$strQuery =
"ALTER TABLE depreciation_class
  ADD CONSTRAINT FOREIGN KEY(depreciation_method_qtype_id) references depreciation_method_qtype (
    depreciation_method_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;";
$objDatabase->NonQuery($strQuery);

// Add foreign key to Asset Model table
$strQuery = "ALTER TABLE `asset_model`
  ADD CONSTRAINT FOREIGN KEY(depreciation_class_id) references `depreciation_class` (`depreciation_class_id`)
ON Delete NO ACTION ON Update NO ACTION;
";
$objDatabase->NonQuery($strQuery);

/**
 *  INSERTIONS
 */

// Unset foreign keys
$strQuery="SET FOREIGN_KEY_CHECKS = 0;";
$objDatabase->NonQuery($strQuery);

// Add admin_settings
$strQuery = "INSERT INTO `admin_setting` (`setting_id`,`short_description`,`value`) VALUES
	(24,'depreciation_flag','1');";
$objDatabase->NonQuery($strQuery);

// Insert date for default depreciation class
$strQuery = "INSERT INTO `depreciation_method_qtype` (`depreciation_method_qtype_id`, `short_description`) VALUES (1, 'Straight Line');";
$objDatabase->NonQuery($strQuery);
$strQuery = "INSERT INTO `depreciation_class` (`depreciation_class_id`, `depreciation_method_qtype_id`, `short_description`,`life`) VALUES (1, 1, 'Straight Line Depreciation',60);";
$objDatabase->NonQuery($strQuery);

// Setup foreign keys check	again;
$strQuery = "SET FOREIGN_KEY_CHECKS = 1;";
$objDatabase->NonQuery($strQuery);

$objDatabase->TransactionCommit();
echo('Update successful!');

} catch (QMySqlDatabaseException $objExc) {
// Something went wrong
$objDatabase->TransactionRollback();
echo('Update failed!');

}