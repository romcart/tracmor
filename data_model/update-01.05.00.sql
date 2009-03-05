ALTER TABLE `asset` 
	ADD `parent_asset_code` VARCHAR(50) DEFAULT NULL AFTER `asset_code`, 
	ADD INDEX asset_fkindex5 (`parent_asset_code`),
	ADD `linked_flag` BIT(1) NOT NULL DEFAULT 0 AFTER `reserved_flag`;