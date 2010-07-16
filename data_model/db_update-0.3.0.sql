ALTER TABLE `asset` ADD
  `archived_flag` BIT(1) NULL AFTER `linked_flag`;

INSERT INTO `transaction_type` VALUES
  (10,'Archive',1,0),
  (11,'Unarchive',1,0);

INSERT INTO `shortcut`
  (`module_id`,
  `authorization_id`,
  `short_description`,
  `link`,
  `image_path`,
  `entity_qtype_id`,
  `create_flag`)
  VALUES
    (2,2,'Archive Assets','../assets/asset_edit.php?intTransactionTypeId=10', 'asset_archive.png',1,0),
    (2,2,'Unarchive Assets','../assets/asset_edit.php?intTransactionTypeId=11', 'asset_unarchive.png',1,0);

CREATE TABLE `address_custom_field_helper` (
  `address_id` INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( `address_id` ), 
        INDEX `address_custom_field_helper_fkindex1` ( `address_id` ))
TYPE = INNODB;

ALTER TABLE `address_custom_field_helper`
  ADD CONSTRAINT FOREIGN KEY( `address_id` ) references `address` (
    `address_id`
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE  `fedex_shipment` 
  ADD  `label_printer_type` INT NULL,
  ADD  `label_format_type` INT NULL ,
  ADD  `thermal_printer_port` VARCHAR( 255 ) NULL;

INSERT INTO  `admin_setting` (
  `short_description` ,
  `value`)
  VALUES 
    ('fedex_label_printer_type',  '1'), 
    ('fedex_label_format_type',  '5'),
    ('fedex_thermal_printer_port', 'LPT1'),
    ('asset_limit', NULL);

ALTER  TABLE  `attachment`  ADD  INDEX (  `entity_id`  );

ALTER TABLE  `inventory_location` DROP FOREIGN KEY  `inventory_location_ibfk_2` ;
ALTER TABLE  `inventory_location` ADD FOREIGN KEY (  `inventory_model_id` ) REFERENCES  `tracmor`.`inventory_model` (
`inventory_model_id`
) ON DELETE CASCADE ON UPDATE NO ACTION ;

ALTER TABLE  `inventory_transaction` DROP FOREIGN KEY  `inventory_transaction_ibfk_4` ;
ALTER TABLE  `inventory_transaction` ADD FOREIGN KEY (  `inventory_location_id` ) REFERENCES  `tracmor`.`inventory_location` (
`inventory_location_id`
) ON DELETE CASCADE ON UPDATE NO ACTION ;

ALTER TABLE address_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( address_id) references address (
    address_id
  )
ON Delete CASCADE ON Update NO ACTION;
