CREATE TABLE role_transaction_type_authorization (
  role_transaction_type_authorization_id INT(10) NOT NULL AUTO_INCREMENT,
  role_id INTEGER UNSIGNED NOT NULL,
  transaction_type_id INTEGER UNSIGNED NOT NULL,
  authorization_level_id INTEGER UNSIGNED NOT NULL,
  created_by INTEGER UNSIGNED NULL,
  creation_date DATETIME NULL DEFAULT NULL,
  modified_by INTEGER UNSIGNED NULL,
  modified_date TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(role_transaction_type_authorization_id),
    INDEX role_transaction_type_authorization_FKIndex1(created_by),
    INDEX role_transaction_type_authorization_FKIndex2(modified_by),
    INDEX role_transaction_type_authorization_FKIndex3(authorization_level_id),
    INDEX role_transaction_type_authorization_FKIndex4(transaction_type_id),
    INDEX role_transaction_type_authorization_FKIndex5(role_id),
    UNIQUE role_transaction_type_authorization_UNIQUE(role_id, transaction_type_id)
)
TYPE=InnoDB;

alter table role_transaction_type_authorization
        add constraint 
        foreign key (                   
                created_by
        ) references user_account (
                user_account_id
        )
        ON Delete NO ACTION ON Update NO ACTION;

alter table role_transaction_type_authorization
        add constraint 
        foreign key (                   
                modified_by
        ) references user_account (
                user_account_id
        )
        ON Delete NO ACTION ON Update NO ACTION;
        
alter table role_transaction_type_authorization
        add constraint 
        foreign key (                   
                authorization_level_id
        ) references authorization_level (
                authorization_level_id
        )
        ON Delete NO ACTION ON Update NO ACTION;
        
alter table role_transaction_type_authorization
        add constraint 
        foreign key (                   
                transaction_type_id
        ) references transaction_type (
                transaction_type_id
        )
        ON Delete NO ACTION ON Update NO ACTION;

alter table role_transaction_type_authorization
        add constraint 
        foreign key (                   
                role_id
        ) references role (
                role_id
        )
        ON Delete CASCADE ON Update NO ACTION;
        
alter table shortcut
  ADD transaction_type_id INTEGER UNSIGNED NULL;
  
alter table shortcut
        add constraint 
        foreign key (                   
                transaction_type_id
        ) references transaction_type (
                transaction_type_id
        )
        ON Delete NO ACTION ON Update NO ACTION;


UPDATE shortcut SET transaction_type_id=1 WHERE shortcut_id=5;
UPDATE shortcut SET transaction_type_id=3 WHERE shortcut_id=6;
UPDATE shortcut SET transaction_type_id=2 WHERE shortcut_id=7;
UPDATE shortcut SET transaction_type_id=8 WHERE shortcut_id=8;
UPDATE shortcut SET transaction_type_id=1 WHERE shortcut_id=11;
UPDATE shortcut SET transaction_type_id=5 WHERE shortcut_id=12;
UPDATE shortcut SET transaction_type_id=4 WHERE shortcut_id=13;

INSERT INTO datagrid 
           (short_description) 
VALUES     ('location_list'), 
           ('user_list');

CREATE TABLE asset_custom_field_helper (
  asset_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( asset_id),
        INDEX asset_custom_field_helper_fkindex1 ( asset_id ))
TYPE = INNODB;

ALTER TABLE asset_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( asset_id) references asset (
    asset_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE inventory_model_custom_field_helper (
  inventory_model_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( inventory_model_id), 
        INDEX inventory_model_custom_field_helper_fkindex1 ( inventory_model_id ))
TYPE = INNODB;

ALTER TABLE inventory_model_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( inventory_model_id) references  inventory_model (
    inventory_model_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE asset_model_custom_field_helper (
  asset_model_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( asset_model_id), 
        INDEX asset_model_custom_field_helper_fkindex1 ( asset_model_id ))
TYPE = INNODB;

ALTER TABLE asset_model_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( asset_model_id) references asset_model (
    asset_model_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE manufacturer_custom_field_helper (
  manufacturer_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( manufacturer_id), 
        INDEX manufacturer_custom_field_helper_fkindex1 ( manufacturer_id ))
TYPE = INNODB;

ALTER TABLE manufacturer_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( manufacturer_id) references manufacturer (
    manufacturer_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE category_custom_field_helper (
  category_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( category_id), 
        INDEX category_custom_field_helper_fkindex1 ( category_id ))
TYPE = INNODB;

ALTER TABLE category_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( category_id) references category (
    category_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE company_custom_field_helper (
  company_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( company_id), 
        INDEX company_custom_field_helper_fkindex1 ( company_id ))
TYPE = INNODB;

ALTER TABLE company_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( company_id) references company (
    company_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE contact_custom_field_helper (
  contact_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( contact_id), 
        INDEX contact_custom_field_helper_fkindex1 ( contact_id ))
TYPE = INNODB;

ALTER TABLE contact_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( contact_id) references contact (
    contact_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE shipment_custom_field_helper (
  shipment_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( shipment_id), 
        INDEX shipment_custom_field_helper_fkindex1 ( shipment_id ))
TYPE = INNODB;

ALTER TABLE shipment_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( shipment_id) references shipment (
    shipment_id
  )
ON Delete CASCADE ON Update NO ACTION;

CREATE TABLE receipt_custom_field_helper (
  receipt_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( receipt_id), 
        INDEX receipt_custom_field_helper_fkindex1 ( receipt_id ))
TYPE = INNODB;

ALTER TABLE receipt_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( receipt_id) references receipt (
    receipt_id
  )
ON Delete CASCADE ON Update NO ACTION;

INSERT INTO `shortcut` (`module_id`, `authorization_id`, `short_description`, `image_path`, `link`, `entity_qtype_id`, `create_flag`) VALUES (7, 1, 'Asset Transaction Report', 'asset.png','../reports/asset_transaction_report.php', 1, 0);

ALTER TABLE `asset`
        ADD `parent_asset_id` INTEGER UNSIGNED DEFAULT NULL AFTER `asset_id`,
        ADD INDEX asset_fkindex5 (`parent_asset_id`),
        ADD INDEX `parent_asset_id_linked` ( `parent_asset_id` , `linked_flag` ),
        ADD `linked_flag` BIT(1) DEFAULT NULL AFTER `reserved_flag`;

INSERT INTO `admin_setting` (`setting_id`,`short_description`,`value`) VALUES (14,'user_limit',NULL);
