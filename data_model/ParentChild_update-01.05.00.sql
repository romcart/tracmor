SET FOREIGN_KEY_CHECKS = 0;
ALTER TABLE `asset`
	ADD `parent_asset_id` INTEGER UNSIGNED DEFAULT NULL AFTER `asset_id`,
	ADD INDEX asset_fkindex5 (`parent_asset_id`),
	ADD INDEX `parent_asset_id_linked` ( `parent_asset_id` , `linked_flag` ),
	ADD `linked_flag` BIT(1) DEFAULT NULL AFTER `reserved_flag`,
  ADD CONSTRAINT
    FOREIGN KEY ( `parent_asset_id` ) REFERENCES `asset` ( `asset_id` )
    ON Delete NO ACTION ON Update NO ACTION;
SET FOREIGN_KEY_CHECKS = 1;