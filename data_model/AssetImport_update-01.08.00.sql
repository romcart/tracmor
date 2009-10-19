INSERT INTO `admin_setting` (
	`short_description` ,
	`value`
)
VALUES (
	'asset_limit', NULL
);

DELETE `custom_field_value`.* FROM `custom_field_value` LEFT JOIN `custom_field` ON `custom_field_value`.`custom_field_id` = `custom_field`.`custom_field_id` WHERE `custom_field`.`custom_field_qtype_id` != 2;

DROP TABLE `custom_field_selection`;

CREATE TABLE address_custom_field_helper (
  address_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( address_id), 
  	INDEX address_custom_field_helper_fkindex1 ( address_id ))
TYPE = INNODB;

ALTER TABLE address_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( address_id) references address (
    address_id
  )
ON Delete CASCADE ON Update NO ACTION;