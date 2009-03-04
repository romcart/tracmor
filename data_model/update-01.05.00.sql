ALTER TABLE `asset` ADD `parent_asset_code` VARCHAR(50) DEFAULT NULL AFTER `asset_code`;

ALTER TABLE `asset` ADD `linked_flag` BIT(1) NOT NULL DEFAULT 0 AFTER `reserved_flag`;