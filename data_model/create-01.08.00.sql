CREATE TABLE category (
  category_id       INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
  long_description  TEXT   NULL,
  image_path        VARCHAR(255)   NULL,
  asset_flag        BIT   NOT NULL   COMMENT 'bit specifying whether or not this category applies to assets',
  inventory_flag    BIT   NOT NULL   COMMENT 'bit specifying whether or not this category applies to inventory',
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( category_id ),
    INDEX category_fkindex1 ( created_by ),
    INDEX category_fkindex2 ( modified_by ))
TYPE = INNODB;

CREATE TABLE manufacturer (
  manufacturer_id   INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
  long_description  TEXT   NULL,
  image_path        VARCHAR(255)   NULL,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( manufacturer_id ),
    INDEX manufacturer_fkindex1 ( created_by ),
    INDEX manufacturer_fkindex2 ( modified_by ))
TYPE = INNODB;

CREATE TABLE location (
  location_id       INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
  long_description  TEXT   NULL,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( location_id ),
    INDEX location_fkindex1 ( created_by ),
    INDEX location_fkindex2 ( modified_by ),
    UNIQUE (short_description ))
TYPE = INNODB;

CREATE TABLE asset_model (
  asset_model_id    INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  category_id       INTEGER UNSIGNED   NULL,
  manufacturer_id   INTEGER UNSIGNED   NULL,
  asset_model_code  VARCHAR(50)   NULL,
  short_description VARCHAR(255)   NOT NULL,
  long_description  TEXT   NULL,
  image_path        VARCHAR(255)   NULL,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( asset_model_id ),
    INDEX asset_model_fkindex1 ( category_id ),
    INDEX asset_model_fkindex2 ( manufacturer_id ),
    INDEX asset_model_fkindex3 ( created_by ),
    INDEX asset_model_fkindex4 ( modified_by ))
TYPE = INNODB;

CREATE TABLE `asset` (
  `asset_id`         INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  `parent_asset_id` INTEGER UNSIGNED DEFAULT NULL,
  `asset_model_id`   INTEGER UNSIGNED   NOT NULL,
  `location_id`      INTEGER UNSIGNED   NULL,
  `asset_code`       VARCHAR(50)   NOT NULL,
  `image_path`       VARCHAR(255)   NULL,
  `checked_out_flag` BIT   NULL,
  `reserved_flag`    BIT   NULL,
  `linked_flag`		 BIT(1) DEFAULT NULL,
  `archived_flag`    BIT(1) DEFAULT NULL,
  `created_by`       INTEGER UNSIGNED   NULL,
  `creation_date`    DATETIME   NULL   DEFAULT NULL,
  `modified_by`      INTEGER UNSIGNED   NULL,
  `modified_date`    TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( `asset_id` ),
    INDEX asset_fkindex1 ( `asset_model_id` ),
    INDEX asset_fkindex2 ( `location_id` ),
    INDEX asset_fkindex3 ( `created_by` ),
    INDEX asset_fkindex4 ( `modified_by` ),
    INDEX asset_fkindex5 ( `parent_asset_id` ),
    INDEX `parent_asset_id_linked` ( `parent_asset_id` , `linked_flag` ),
    UNIQUE (asset_code ))
TYPE = INNODB;

CREATE TABLE asset_transaction (
  asset_transaction_id        INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  asset_id                    INTEGER UNSIGNED   NOT NULL,
  transaction_id              INTEGER UNSIGNED   NOT NULL,
  parent_asset_transaction_id INTEGER UNSIGNED   NULL,
  source_location_id          INTEGER UNSIGNED   NULL,
  destination_location_id     INTEGER UNSIGNED   NULL,
  new_asset_flag              BIT   NULL   COMMENT 'Set to true if a new asset was created while creating the transaction (a receipt, or shipment, e.g.)',
  new_asset_id                INTEGER UNSIGNED   NULL,
  schedule_receipt_flag       BIT   NULL   COMMENT 'Set to true if an asset is to be scheduled for a receipt',
  schedule_receipt_due_date   DATE   NULL   COMMENT 'Placeholder for automatically scheduled receipts until the shipment is completed',
  created_by                  INTEGER UNSIGNED   NULL,
  creation_date               DATETIME   NULL   DEFAULT NULL,
  modified_by                 INTEGER UNSIGNED   NULL,
  modified_date               TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( asset_transaction_id ),
    INDEX asset_transaction_fkindex2 ( transaction_id ),
    INDEX asset_transaction_fkindex1 ( asset_id ),
    INDEX asset_transaction_fkindex3 ( source_location_id ),
    INDEX asset_transaction_fkindex4 ( destination_location_id ),
    INDEX asset_transaction_fkindex5 ( created_by ),
    INDEX asset_transaction_fkindex6 ( modified_by ),
    INDEX asset_transaction_fkindex7 ( new_asset_id ),
    INDEX asset_transaction_fkindex8 ( parent_asset_transaction_id ))
TYPE = INNODB;

CREATE TABLE transaction_type (
  transaction_type_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description   VARCHAR(50)   NOT NULL,
  asset_flag          BIT   NOT NULL   DEFAULT 0,
  inventory_flag      BIT   NOT NULL   DEFAULT 0,
    PRIMARY KEY ( transaction_type_id ),
    UNIQUE (short_description ))
TYPE = INNODB;

CREATE TABLE inventory_model (
  inventory_model_id   INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  category_id          INTEGER UNSIGNED   NULL,
  manufacturer_id      INTEGER UNSIGNED   NULL,
  inventory_model_code VARCHAR(50)   NOT NULL   COMMENT 'Bar code',
  short_description    VARCHAR(255)   NOT NULL,
  long_description     TEXT   NULL,
  image_path           VARCHAR(255)   NULL,
  price                DECIMAL(12,2)   NULL,
  created_by           INTEGER UNSIGNED   NULL,
  creation_date        DATETIME   NULL   DEFAULT NULL,
  modified_by          INTEGER UNSIGNED   NULL,
  modified_date        TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( inventory_model_id ),
    INDEX inventory_model_fkindex1 ( category_id ),
    INDEX inventory_model_fkindex2 ( manufacturer_id ),
    INDEX inventory_model_fkindex3 ( created_by ),
    INDEX inventory_model_fkindex4 ( modified_by ),
    UNIQUE (inventory_model_code ))
TYPE = INNODB;

CREATE TABLE inventory_location (
  inventory_location_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  inventory_model_id    INTEGER UNSIGNED   NOT NULL,
  location_id           INTEGER UNSIGNED   NOT NULL,
  quantity              INTEGER UNSIGNED   NOT NULL,
  created_by            INTEGER UNSIGNED   NULL,
  creation_date         DATETIME   NULL   DEFAULT NULL,
  modified_by           INTEGER UNSIGNED   NULL,
  modified_date         TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( inventory_location_id ),
    INDEX inventory_location_fkindex1 ( location_id ),
    INDEX inventory_location_fkindex2 ( inventory_model_id ),
    INDEX inventory_location_fkindex3 ( modified_by ),
    INDEX inventory_location_fkindex4 ( created_by ))
TYPE = INNODB;

CREATE TABLE inventory_transaction (
  inventory_transaction_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  inventory_location_id    INTEGER UNSIGNED   NOT NULL,
  transaction_id           INTEGER UNSIGNED   NOT NULL,
  quantity                 INTEGER UNSIGNED   NOT NULL,
  source_location_id       INTEGER UNSIGNED   NULL,
  destination_location_id  INTEGER UNSIGNED   NULL,
  created_by               INTEGER UNSIGNED   NULL,
  creation_date            DATETIME   NULL   DEFAULT NULL,
  modified_by              INTEGER UNSIGNED   NULL,
  modified_date            TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( inventory_transaction_id ),
    INDEX inventory_transaction_fkindex2 ( transaction_id ),
    INDEX inventory_transaction_fkindex3 ( source_location_id ),
    INDEX inventory_transaction_fkindex4 ( destination_location_id ),
    INDEX inventory_transaction_fkindex1 ( inventory_location_id ),
    INDEX inventory_transaction_fkindex5 ( created_by ),
    INDEX inventory_transaction_fkindex6 ( modified_by ))
TYPE = INNODB;

CREATE TABLE user_account (
  user_account_id      INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  first_name           VARCHAR(50)   NOT NULL,
  last_name            VARCHAR(50)   NOT NULL,
  username             VARCHAR(30)   NOT NULL,
  password_hash        VARCHAR(40)   NOT NULL,
  email_address        VARCHAR(50)   NULL,
  active_flag          BIT   NOT NULL   COMMENT 'User account enabled/disabled',
  admin_flag           BIT   NOT NULL   COMMENT 'Designates user as normal or administrator',
  portable_access_flag BIT   NULL,
  portable_user_pin    INT(10)   NULL,
  role_id              INTEGER UNSIGNED   NOT NULL,
  created_by           INTEGER UNSIGNED   NULL,
  creation_date        DATETIME   NULL   DEFAULT NULL,
  modified_by          INTEGER UNSIGNED   NULL,
  modified_date        TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( user_account_id ),
    INDEX user_account_fkindex1 ( created_by ),
    INDEX user_account_fkindex2 ( modified_by ),
    INDEX user_account_fkindex3 ( role_id ),
    UNIQUE (username ))
COMMENT 'User accounts are stored in this table'
TYPE = INNODB;

CREATE TABLE transaction (
  transaction_id      INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  entity_qtype_id     INTEGER UNSIGNED   NOT NULL,
  transaction_type_id INTEGER UNSIGNED   NOT NULL,
  note                TEXT   NULL,
  created_by          INTEGER UNSIGNED   NULL,
  creation_date       DATETIME   NULL   DEFAULT NULL,
  modified_by         INTEGER UNSIGNED   NULL,
  modified_date       TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( transaction_id ),
    INDEX transaction_fkindex1 ( transaction_type_id ),
    INDEX transaction_fkindex2 ( created_by ),
    INDEX transaction_fkindex3 ( modified_by ),
    INDEX transaction_fkindex4 ( entity_qtype_id ))
TYPE = INNODB;

CREATE TABLE custom_field (
  custom_field_id               INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  custom_field_qtype_id         INTEGER UNSIGNED   NOT NULL,
  default_custom_field_value_id INTEGER UNSIGNED   NULL,
  short_description             VARCHAR(255)   NOT NULL,
  active_flag                   BIT   NULL,
  required_flag                 BIT   NULL,
  created_by                    INTEGER UNSIGNED   NULL,
  creation_date                 DATETIME   NULL,
  modified_by                   INTEGER UNSIGNED   NULL,
  modified_date                 TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( custom_field_id ),
    INDEX custom_field_fkindex2 ( modified_by ),
    INDEX custom_field_fkindex3 ( created_by ),
    INDEX custom_field_fkindex1 ( custom_field_qtype_id ),
    INDEX custom_field_fkindex4 ( default_custom_field_value_id ))
TYPE = INNODB;

CREATE TABLE custom_field_value (
  custom_field_value_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  custom_field_id       INTEGER UNSIGNED   NOT NULL,
  short_description     TEXT   NULL,
  created_by            INTEGER UNSIGNED   NULL,
  creation_date         DATETIME   NULL,
  modified_by           INTEGER UNSIGNED   NULL,
  modified_date         TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( custom_field_value_id ),
    INDEX custom_field_value_fkindex2 ( created_by ),
    INDEX custom_field_value_fkindex3 ( modified_by ),
    INDEX custom_field_value_fkindex1 ( custom_field_id ))
TYPE = INNODB;

CREATE TABLE custom_field_qtype (
  custom_field_qtype_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  name                  VARCHAR(10)   NOT NULL,
    PRIMARY KEY ( custom_field_qtype_id ),
    UNIQUE (name ))
TYPE = INNODB;

CREATE TABLE entity_qtype (
  entity_qtype_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  name            VARCHAR(50)   NOT NULL,
    PRIMARY KEY ( entity_qtype_id ),
    UNIQUE (name ))
TYPE = INNODB;

CREATE TABLE entity_qtype_custom_field (
  entity_qtype_custom_field_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  entity_qtype_id              INTEGER UNSIGNED   NOT NULL,
  custom_field_id              INTEGER UNSIGNED   NOT NULL,
    PRIMARY KEY ( entity_qtype_custom_field_id ),
    INDEX entity_qtype_custom_field_fkindex1 ( entity_qtype_id ),
    INDEX entity_qtype_custom_field_fkindex2 ( custom_field_id ))
TYPE = INNODB;

CREATE TABLE company (
  company_id        INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  address_id        INTEGER UNSIGNED   NULL,
  short_description VARCHAR(255)   NOT NULL,
  website           VARCHAR(255)   NULL,
  telephone         VARCHAR(50)   NULL,
  fax               VARCHAR(50)   NULL,
  email             VARCHAR(50)   NULL,
  long_description  TEXT   NULL,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( company_id ),
    INDEX company_fkindex1 ( address_id ),
    INDEX company_fkindex2 ( created_by ),
    INDEX company_fkindex3 ( modified_by ),
    UNIQUE (short_description ))
TYPE = INNODB;

CREATE TABLE contact (
  contact_id    INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  company_id    INTEGER UNSIGNED   NOT NULL,
  address_id    INTEGER UNSIGNED   NULL,
  first_name    VARCHAR(50)   NULL,
  last_name     VARCHAR(50)   NOT NULL,
  title         VARCHAR(50)   NULL,
  email         VARCHAR(50)   NULL,
  phone_office  VARCHAR(50)   NULL,
  phone_home    VARCHAR(50)   NULL,
  phone_mobile  VARCHAR(50)   NULL,
  fax           VARCHAR(50)   NULL,
  description   TEXT   NULL,
  created_by    INTEGER UNSIGNED   NULL,
  creation_date DATETIME   NULL   DEFAULT NULL,
  modified_by   INTEGER UNSIGNED   NULL,
  modified_date TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( contact_id ),
    INDEX contact_fkindex3 ( modified_by ),
    INDEX contact_fkindex4 ( created_by ),
    INDEX contact_fkindex2 ( address_id ),
    INDEX contact_fkindex1 ( company_id ))
TYPE = INNODB;

CREATE TABLE address (
  address_id        INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  company_id        INTEGER UNSIGNED   NOT NULL,
  short_description VARCHAR(255)   NOT NULL,
  country_id        INTEGER UNSIGNED   NOT NULL,
  address_1         VARCHAR(255)   NOT NULL,
  address_2         VARCHAR(255)   NULL,
  city              VARCHAR(50)   NOT NULL,
  state_province_id INTEGER UNSIGNED   NULL,
  postal_code       VARCHAR(50)   NOT NULL,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( address_id ),
    INDEX address_fkindex1 ( company_id ),
    INDEX address_fkindex2 ( country_id ),
    INDEX address_fkindex3 ( state_province_id ),
    INDEX address_fkindex4 ( modified_by ),
    INDEX address_fkindex5 ( created_by ))
TYPE = INNODB;

CREATE TABLE country (
  country_id        INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(50)   NOT NULL,
  abbreviation      CHAR(2)   NULL,
  state_flag        BIT   NULL,
  province_flag     BIT   NULL,
    PRIMARY KEY ( country_id ))
TYPE = INNODB;

CREATE TABLE state_province (
  state_province_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  country_id        INTEGER UNSIGNED   NULL,
  short_description VARCHAR(50)   NULL,
  abbreviation      VARCHAR(2)   NULL,
    PRIMARY KEY ( state_province_id ),
    INDEX state_province_fkindex1 ( country_id ))
TYPE = INNODB;

CREATE TABLE shipment (
  shipment_id     INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  shipment_number VARCHAR(50)   NOT NULL,
  transaction_id  INTEGER UNSIGNED   NOT NULL,
  from_company_id INTEGER UNSIGNED   NOT NULL,
  from_contact_id INTEGER UNSIGNED   NOT NULL,
  from_address_id INTEGER UNSIGNED   NOT NULL,
  to_company_id   INTEGER UNSIGNED   NOT NULL,
  to_contact_id   INTEGER UNSIGNED   NOT NULL,
  to_address_id   INTEGER UNSIGNED   NOT NULL,
  courier_id      INTEGER UNSIGNED   NULL,
  tracking_number VARCHAR(50)   NULL,
  ship_date       DATE   NOT NULL,
  shipped_flag    BIT   NULL,
  created_by      INTEGER UNSIGNED   NULL,
  creation_date   DATETIME   NULL,
  modified_by     INTEGER UNSIGNED   NULL,
  modified_date   TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( shipment_id ),
    INDEX shipment_fkindex1 ( transaction_id ),
    INDEX shipment_fkindex4 ( from_address_id ),
    INDEX shipment_fkindex5 ( to_address_id ),
    INDEX shipment_fkindex6 ( to_company_id ),
    INDEX shipment_fkindex8 ( courier_id ),
    INDEX shipment_fkindex13 ( created_by ),
    INDEX shipment_fkindex14 ( modified_by ),
    INDEX shipment_fkindex2 ( from_contact_id ),
    INDEX shipment_fkindex3 ( to_contact_id ),
    UNIQUE (shipment_number ),
    UNIQUE (transaction_id ),
    INDEX shipment_fkindex16 ( from_company_id ))
TYPE = INNODB;

CREATE TABLE shipping_account (
  shipping_account_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  courier_id          INTEGER UNSIGNED   NOT NULL,
  short_description   VARCHAR(255)   NOT NULL,
  access_id           VARCHAR(255)   NOT NULL,
  access_code         VARCHAR(255)   NOT NULL,
  created_by          INTEGER UNSIGNED   NULL,
  creation_date       DATETIME   NULL   DEFAULT NULL,
  modified_by         INTEGER UNSIGNED   NULL,
  modified_date       TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( shipping_account_id ),
    INDEX shipping_account_fkindex1 ( courier_id ),
    INDEX shipping_account_fkindex2 ( modified_by ),
    INDEX shipping_account_fkindex3 ( created_by ))
TYPE = INNODB;

CREATE TABLE courier (
  courier_id        INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
  active_flag       BIT   NULL,
    PRIMARY KEY ( courier_id ))
TYPE = INNODB;

CREATE TABLE `package_type` (
  `package_type_id`   INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  `short_description` VARCHAR(255)   NOT NULL,
  `courier_id`        INTEGER UNSIGNED   NOT NULL,
  `value`             VARCHAR(50)   NULL,
    PRIMARY KEY ( `package_type_id` ),
    INDEX package_type_fkindex1 ( `courier_id` ))
TYPE = INNODB;

CREATE TABLE weight_unit (
  weight_unit_id    INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NULL,
    PRIMARY KEY ( weight_unit_id ))
TYPE = INNODB;

CREATE TABLE length_unit (
  length_unit_id    INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NULL,
    PRIMARY KEY ( length_unit_id ))
TYPE = INNODB;

CREATE TABLE currency_unit (
  currency_unit_id  INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NULL,
  symbol            CHAR(6)   NULL,
    PRIMARY KEY ( currency_unit_id ))
TYPE = INNODB;

CREATE TABLE receipt (
  receipt_id      INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  transaction_id  INTEGER UNSIGNED   NOT NULL,
  from_company_id INTEGER UNSIGNED   NOT NULL,
  from_contact_id INTEGER UNSIGNED   NOT NULL,
  to_contact_id   INTEGER UNSIGNED   NOT NULL,
  to_address_id   INTEGER UNSIGNED   NOT NULL,
  receipt_number  VARCHAR(50)   NOT NULL,
  due_date        DATE   NULL,
  receipt_date    DATE   NULL,
  received_flag   BIT   NULL,
  created_by      INTEGER UNSIGNED   NULL,
  creation_date   DATETIME   NULL,
  modified_by     INTEGER UNSIGNED   NULL,
  modified_date   TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( receipt_id ),
    INDEX receipt_fkindex1 ( from_company_id ),
    INDEX receipt_fkindex2 ( from_contact_id ),
    INDEX receipt_fkindex3 ( to_contact_id ),
    INDEX receipt_fkindex4 ( to_address_id ),
    INDEX receipt_fkindex5 ( created_by ),
    INDEX receipt_fkindex6 ( modified_by ),
    INDEX receipt_fkindex7 ( transaction_id ),
    UNIQUE (transaction_id ),
    INDEX receipt_index3241 ( receipt_number ),
    UNIQUE (receipt_number ))
TYPE = INNODB;

CREATE TABLE role (
  role_id           INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
  long_description  TEXT   NULL,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( role_id ),
    INDEX role_fkindex1 ( created_by ),
    INDEX role_fkindex2 ( modified_by ))
TYPE = INNODB;

CREATE TABLE module (
  module_id         INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NULL,
    PRIMARY KEY ( module_id ))
TYPE = INNODB;

CREATE TABLE role_module (
  role_module_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  role_id        INTEGER UNSIGNED   NOT NULL,
  module_id      INTEGER UNSIGNED   NOT NULL,
  access_flag    BIT   NOT NULL   COMMENT 'Determines whether this role has access to this module',
  created_by     INTEGER UNSIGNED   NULL,
  creation_date  DATETIME   NULL   DEFAULT NULL,
  modified_by    INTEGER UNSIGNED   NULL,
  modified_date  TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( role_module_id ),
    INDEX role_module_fkindex1 ( role_id ),
    INDEX role_module_fkindex2 ( module_id ),
    INDEX role_module_fkindex3 ( created_by ),
    INDEX role_module_fkindex4 ( modified_by ))
TYPE = INNODB;

CREATE TABLE authorization (
  authorization_id  INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NULL,
    PRIMARY KEY ( authorization_id ))
TYPE = INNODB;

CREATE TABLE authorization_level (
  authorization_level_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description      VARCHAR(255)   NULL,
    PRIMARY KEY ( authorization_level_id ))
TYPE = INNODB;

CREATE TABLE role_module_authorization (
  role_module_authorization_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  role_module_id               INTEGER UNSIGNED   NULL,
  authorization_id             INTEGER UNSIGNED   NULL,
  authorization_level_id       INTEGER UNSIGNED   NULL,
  created_by                   INTEGER UNSIGNED   NULL,
  creation_date                DATETIME   NULL   DEFAULT NULL,
  modified_by                  INTEGER UNSIGNED   NULL,
  modified_date                TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( role_module_authorization_id ),
    INDEX role_module_authorization_fkindex1 ( role_module_id ),
    INDEX role_module_authorization_fkindex2 ( authorization_id ),
    INDEX role_module_authorization_fkindex3 ( authorization_level_id ),
    INDEX role_module_authorization_fkindex4 ( created_by ),
    INDEX role_module_authorization_fkindex5 ( modified_by ))
TYPE = INNODB;

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

CREATE TABLE `admin_setting` (
  `setting_id`        INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  `short_description` VARCHAR(255)   NOT NULL,
  `value`             TEXT   NULL,
    PRIMARY KEY ( `setting_id` ),
    UNIQUE (`short_description` ))
TYPE = INNODB;

CREATE TABLE `fedex_service_type` (
  `fedex_service_type_id` INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  `short_description`     VARCHAR(255)   NOT NULL,
  `value`                 VARCHAR(50)   NOT NULL,
    PRIMARY KEY ( `fedex_service_type_id` ),
    UNIQUE (`value` ))
TYPE = INNODB;

CREATE TABLE shortcut (
  shortcut_id       INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  module_id         INTEGER UNSIGNED   NOT NULL,
  authorization_id  INTEGER UNSIGNED   NULL,
  transaction_type_id INTEGER UNSIGNED NULL,
  short_description VARCHAR(255)   NOT NULL,
  link              VARCHAR(255)   NOT NULL,
  image_path        VARCHAR(255)   NULL,
  entity_qtype_id   INTEGER UNSIGNED   NOT NULL,
  create_flag       TINYINT(1) UNSIGNED   NOT NULL,
    PRIMARY KEY ( shortcut_id ),
    INDEX shortcut_fkindex1 ( module_id ),
    INDEX shortcut_fkindex2 ( authorization_id ),
    INDEX shortcut_fkindex3 ( transaction_type_id ),
    INDEX shortcut_fkindex4 ( entity_qtype_id ))
TYPE = INNODB;

CREATE TABLE fedex_shipment (
  fedex_shipment_id               INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  shipment_id                     INTEGER UNSIGNED   NOT NULL,
  package_type_id                 INTEGER UNSIGNED   NULL,
  shipping_account_id             INTEGER UNSIGNED   NULL,
  fedex_service_type_id           INTEGER UNSIGNED   NULL,
  currency_unit_id                INTEGER UNSIGNED   NULL,
  weight_unit_id                  INTEGER UNSIGNED   NULL,
  length_unit_id                  INTEGER UNSIGNED   NULL,
  to_phone                        VARCHAR(25)   NULL,
  pay_type                        INTEGER UNSIGNED   NULL,
  payer_account_number            VARCHAR(12)   NULL,
  package_weight                  FLOAT(8,2)   NULL,
  package_length                  FLOAT(8,2)   NULL,
  package_width                   FLOAT(8,2)   NULL,
  package_height                  FLOAT(8,2)   NULL,
  declared_value                  DECIMAL(10,2)   NULL,
  reference                       TEXT   NULL,
  saturday_delivery_flag          BIT   NULL,
  notify_sender_email             VARCHAR(50)   NULL,
  notify_sender_ship_flag         BIT   NULL,
  notify_sender_exception_flag    BIT   NULL,
  notify_sender_delivery_flag     BIT   NULL,
  notify_recipient_email          VARCHAR(50)   NULL,
  notify_recipient_ship_flag      BIT   NULL,
  notify_recipient_exception_flag BIT   NULL,
  notify_recipient_delivery_flag  BIT   NULL,
  notify_other_email              VARCHAR(50)   NULL,
  notify_other_ship_flag          BIT   NULL,
  notify_other_exception_flag     BIT   NULL,
  notify_other_delivery_flag      BIT   NULL,
  hold_at_location_flag           BIT   NULL,
  hold_at_location_address        VARCHAR(255)   NULL,
  hold_at_location_city           VARCHAR(50)   NULL,
  hold_at_location_state          INTEGER UNSIGNED   NULL,
  hold_at_location_postal_code    VARCHAR(50)   NULL,
  label_printer_type              INTEGER UNSIGNED   NULL,
  label_format_type               INTEGER UNSIGNED   NULL,
  thermal_printer_port            VARCHAR(255)   NULL,
    PRIMARY KEY ( fedex_shipment_id ),
    INDEX fedex_shipment_fkindex1 ( shipping_account_id ),
    INDEX fedex_shipment_fkindex2 ( shipment_id ),
    INDEX fedex_shipment_fkindex3 ( fedex_service_type_id ),
    INDEX fedex_shipment_fkindex4 ( length_unit_id ),
    INDEX fedex_shipment_fkindex5 ( weight_unit_id ),
    INDEX fedex_shipment_fkindex6 ( currency_unit_id ),
    INDEX fedex_shipment_fkindex7 ( package_type_id ),
    INDEX fedex_shipment_fkindex8 ( hold_at_location_state ))
TYPE = INNODB;

CREATE TABLE datagrid (
  datagrid_id       INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
    PRIMARY KEY ( datagrid_id ),
    UNIQUE (short_description ))
TYPE = INNODB;

CREATE TABLE datagrid_column_preference (
  datagrid_column_preference_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  datagrid_id                   INTEGER UNSIGNED   NOT NULL,
  column_name                   VARCHAR(255)   NOT NULL,
  user_account_id               INTEGER UNSIGNED   NOT NULL,
  display_flag                  BIT   NOT NULL   DEFAULT 1,
    PRIMARY KEY ( datagrid_column_preference_id ),
    UNIQUE (datagrid_id,column_name,user_account_id ),
    INDEX datagrid_column_preference_fkindex1 ( datagrid_id ),
    INDEX datagrid_column_preference_fkindex2 ( user_account_id ))
TYPE = INNODB;

CREATE TABLE notification (
  notification_id   INT(10)   NOT NULL   AUTO_INCREMENT,
  short_description VARCHAR(255)   NOT NULL,
  long_description  TEXT   NULL,
  criteria          VARCHAR(255)   NULL   DEFAULT NULL,
  frequency         ENUM('once','daily','weekly','monthly')   NOT NULL,
  enabled_flag      BIT(1)   NOT NULL   DEFAULT false,
  created_by        INTEGER UNSIGNED   NULL,
  creation_date     DATETIME   NULL   DEFAULT NULL,
  modified_by       INTEGER UNSIGNED   NULL,
  modified_date     TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( notification_id ),
    INDEX notification_fkindex1 ( created_by ),
    INDEX notification_fkindex2 ( modified_by ))
TYPE = INNODB;

CREATE TABLE notification_user_account (
  notification_user_account_id INT(10)   NOT NULL   AUTO_INCREMENT,
  user_account_id              INTEGER UNSIGNED   NOT NULL,
  notification_id              INT(10)   NOT NULL,
  level                        ENUM('all','owner')   NULL,
    PRIMARY KEY ( notification_user_account_id ),
    INDEX notification_user_account_fkindex1 ( notification_id ),
    INDEX notification_user_account_fkindex2 ( user_account_id ))
TYPE = INNODB;

CREATE TABLE attachment (
  attachment_id   INT(10)   NOT NULL   AUTO_INCREMENT,
  entity_qtype_id INTEGER UNSIGNED   NOT NULL,
  entity_id       INTEGER UNSIGNED   NOT NULL,
  filename        VARCHAR(255)   NOT NULL,
  tmp_filename    VARCHAR(40)   NULL,
  file_type       VARCHAR(40)   NULL,
  path            VARCHAR(255)   NULL,
  SIZE            INT(10)   NULL,
  created_by      INTEGER UNSIGNED   NOT NULL,
  creation_date   DATETIME   NOT NULL,
    PRIMARY KEY ( attachment_id ),
    INDEX attachment_fkindex1 ( entity_qtype_id ),
    INDEX ( entity_id ),
    INDEX attachment_fkindex2 ( created_by ))
TYPE = INNODB;

CREATE TABLE audit (
  audit_id        INT(10)   NOT NULL   AUTO_INCREMENT   COMMENT 'PK',
  entity_qtype_id INTEGER UNSIGNED   NOT NULL,
  created_by      INTEGER UNSIGNED   NULL,
  creation_date   DATETIME   NULL,
  modified_by     INTEGER UNSIGNED   NULL,
  modified_date   TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL,
    PRIMARY KEY ( audit_id ),
    INDEX audit_fkindex1 ( entity_qtype_id ),
    INDEX audit_fkindex2 ( created_by ),
    INDEX audit_fkindex3 ( modified_by ))
TYPE = INNODB;

CREATE TABLE audit_scan (
  audit_scan_id INT(10)   NOT NULL   AUTO_INCREMENT   COMMENT 'PK',
  audit_id      INT(10)   NOT NULL,
  location_id   INTEGER UNSIGNED   NOT NULL,
  entity_id     INT(10)   NULL   COMMENT 'FK',
  COUNT         INT(10)   NULL,
  system_count  INT(10)   NULL,
    PRIMARY KEY ( audit_scan_id ),
    INDEX audit_scan_fkindex1 ( audit_id ),
    INDEX audit_scan_fkindex2 ( location_id ))
TYPE = INNODB;

CREATE TABLE role_entity_qtype_built_in_authorization (
  role_entity_built_in_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  role_id                 INTEGER UNSIGNED   NOT NULL,
  entity_qtype_id         INTEGER UNSIGNED   NOT NULL,
  authorization_id        INTEGER UNSIGNED   NOT NULL,
  authorized_flag         BIT(1)   NOT NULL   DEFAULT false,
  created_by              INTEGER UNSIGNED   NULL,
  creation_date           DATETIME   NULL   DEFAULT NULL,
  modified_by             INTEGER UNSIGNED   NULL,
  modified_date           TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( role_entity_built_in_id ),
    INDEX role_entity_qtype_built_in_authorization_fkindex1 ( role_id ),
    INDEX role_entity_qtype_built_in_authorization_fkindex2 ( entity_qtype_id ),
    INDEX role_entity_qtype_built_in_authorization_fkindex3 ( authorization_id ),
    UNIQUE (role_id,entity_qtype_id,authorization_id ),
    INDEX role_entity_qtype_built_in_authorization_fkindex4 ( created_by ),
    INDEX role_entity_qtype_built_in_authorization_fkindex5 ( modified_by ))
TYPE = INNODB;

CREATE TABLE role_entity_qtype_custom_field_authorization (
  role_entity_qtype_custom_field_authorization_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  role_id                                         INTEGER UNSIGNED   NOT NULL,
  entity_qtype_custom_field_id                    INTEGER UNSIGNED   NOT NULL,
  authorization_id                                INTEGER UNSIGNED   NOT NULL,
  authorized_flag                                 BIT(1)   NOT NULL   DEFAULT false,
  created_by                                      INTEGER UNSIGNED   NULL,
  creation_date                                   DATETIME   NULL   DEFAULT NULL,
  modified_by                                     INTEGER UNSIGNED   NULL,
  modified_date                                   TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( role_entity_qtype_custom_field_authorization_id ),
    INDEX role_entity_qtype_custom_field_authorization_fkindex1 ( role_id ),
    INDEX role_entity_qtype_custom_field_authorization_fkindex2 ( entity_qtype_custom_field_id ),
    INDEX role_entity_qtype_custom_field_authorization_fkindex3 ( authorization_id ),
    INDEX role_entity_qtype_custom_field_authorization_fkindex4 ( created_by ),
    INDEX role_entity_qtype_custom_field_authorization_fkindex5 ( modified_by ),
    UNIQUE (role_id,entity_qtype_custom_field_id,authorization_id ))
TYPE = INNODB;

CREATE TABLE address_custom_field_helper (
  address_id INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY ( address_id),
        INDEX address_custom_field_helper_fkindex1 ( address_id ))
TYPE = INNODB;

CREATE TABLE asset_custom_field_helper (
  asset_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( asset_id), 
  	INDEX asset_custom_field_helper_fkindex1 ( asset_id ))
TYPE = INNODB;

CREATE TABLE inventory_model_custom_field_helper (
  inventory_model_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( inventory_model_id), 
  	INDEX inventory_model_custom_field_helper_fkindex1 ( inventory_model_id ))
TYPE = INNODB;

CREATE TABLE asset_model_custom_field_helper (
  asset_model_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( asset_model_id), 
  	INDEX asset_model_custom_field_helper_fkindex1 ( asset_model_id ))
TYPE = INNODB;

CREATE TABLE manufacturer_custom_field_helper (
  manufacturer_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( manufacturer_id), 
  	INDEX manufacturer_custom_field_helper_fkindex1 ( manufacturer_id ))
TYPE = INNODB;

CREATE TABLE category_custom_field_helper (
  category_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( category_id), 
  	INDEX category_custom_field_helper_fkindex1 ( category_id ))
TYPE = INNODB;

CREATE TABLE company_custom_field_helper (
  company_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( company_id), 
  	INDEX company_custom_field_helper_fkindex1 ( company_id ))
TYPE = INNODB;

CREATE TABLE contact_custom_field_helper (
  contact_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( contact_id), 
  	INDEX contact_custom_field_helper_fkindex1 ( contact_id ))
TYPE = INNODB;

CREATE TABLE shipment_custom_field_helper (
  shipment_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( shipment_id), 
  	INDEX shipment_custom_field_helper_fkindex1 ( shipment_id ))
TYPE = INNODB;

CREATE TABLE receipt_custom_field_helper (
  receipt_id INTEGER UNSIGNED NOT NULL,
  	PRIMARY KEY ( receipt_id), 
  	INDEX receipt_custom_field_helper_fkindex1 ( receipt_id ))
TYPE = INNODB;

ALTER TABLE asset_model
  ADD CONSTRAINT FOREIGN KEY( category_id) references category (
    category_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_model
  ADD CONSTRAINT FOREIGN KEY( manufacturer_id) references manufacturer (
    manufacturer_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset
  ADD CONSTRAINT FOREIGN KEY( asset_model_id) references asset_model (
    asset_model_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset
  ADD CONSTRAINT FOREIGN KEY( location_id) references location (
    location_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset 
	ADD CONSTRAINT FOREIGN KEY ( `parent_asset_id` ) REFERENCES `asset` ( `asset_id` )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_model
  ADD CONSTRAINT FOREIGN KEY( category_id) references category (
    category_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_model
  ADD CONSTRAINT FOREIGN KEY( manufacturer_id) references manufacturer (
    manufacturer_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_location
  ADD CONSTRAINT FOREIGN KEY( location_id) references location (
    location_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE inventory_location
  ADD CONSTRAINT FOREIGN KEY( inventory_model_id) references inventory_model (
    inventory_model_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE user_account
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE user_account
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_model
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_model
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE location
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE location
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE manufacturer
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE manufacturer
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_model
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_model
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE category
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE category
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_transaction
  ADD CONSTRAINT FOREIGN KEY( transaction_id) references transaction (
    transaction_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE transaction
  ADD CONSTRAINT FOREIGN KEY( transaction_type_id) references transaction_type (
    transaction_type_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_transaction
  ADD CONSTRAINT FOREIGN KEY( source_location_id) references location (
    location_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_transaction
  ADD CONSTRAINT FOREIGN KEY( destination_location_id) references location (
    location_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE transaction
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE transaction
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( transaction_id) references transaction (
    transaction_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( source_location_id) references location (
    location_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( destination_location_id) references location (
    location_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE custom_field
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE custom_field
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE custom_field_value
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE custom_field_value
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE custom_field
  ADD CONSTRAINT FOREIGN KEY( custom_field_qtype_id) references custom_field_qtype (
    custom_field_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE custom_field_value
  ADD CONSTRAINT FOREIGN KEY( custom_field_id) references custom_field (
    custom_field_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE entity_qtype_custom_field
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_id) references entity_qtype (
    entity_qtype_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE entity_qtype_custom_field
  ADD CONSTRAINT FOREIGN KEY( custom_field_id) references custom_field (
    custom_field_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( asset_id) references asset (
    asset_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE address
  ADD CONSTRAINT FOREIGN KEY( company_id) references company (
    company_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE address
  ADD CONSTRAINT FOREIGN KEY( country_id) references country (
    country_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE state_province
  ADD CONSTRAINT FOREIGN KEY( country_id) references country (
    country_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE address
  ADD CONSTRAINT FOREIGN KEY( state_province_id) references state_province (
    state_province_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_transaction
  ADD CONSTRAINT FOREIGN KEY( inventory_location_id) references inventory_location (
    inventory_location_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE transaction
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_id) references entity_qtype (
    entity_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE company
  ADD CONSTRAINT FOREIGN KEY( address_id) references address (
    address_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE company
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE company
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE contact
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE contact
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE address
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE address
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE contact
  ADD CONSTRAINT FOREIGN KEY( address_id) references address (
    address_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( transaction_id) references transaction (
    transaction_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( from_address_id) references address (
    address_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( to_address_id) references address (
    address_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( to_company_id) references company (
    company_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipping_account
  ADD CONSTRAINT FOREIGN KEY( courier_id) references courier (
    courier_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( courier_id) references courier (
    courier_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( from_company_id) references company (
    company_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( from_contact_id) references contact (
    contact_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( to_contact_id) references contact (
    contact_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( to_address_id) references address (
    address_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE receipt
  ADD CONSTRAINT FOREIGN KEY( transaction_id) references transaction (
    transaction_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE contact
  ADD CONSTRAINT FOREIGN KEY( company_id) references company (
    company_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( from_contact_id) references contact (
    contact_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( to_contact_id) references contact (
    contact_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE user_account
  ADD CONSTRAINT FOREIGN KEY( role_id) references role (
    role_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_module
  ADD CONSTRAINT FOREIGN KEY( role_id) references role (
    role_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE role_module
  ADD CONSTRAINT FOREIGN KEY( module_id) references module (
    module_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_module_authorization
  ADD CONSTRAINT FOREIGN KEY( role_module_id) references role_module (
    role_module_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE role_module_authorization
  ADD CONSTRAINT FOREIGN KEY( authorization_id) references authorization (
    authorization_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_module_authorization
  ADD CONSTRAINT FOREIGN KEY( authorization_level_id) references authorization_level (
    authorization_level_id
  )
ON Delete NO ACTION ON Update NO ACTION;

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

ALTER TABLE role
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shortcut
  ADD CONSTRAINT FOREIGN KEY( module_id) references module (
    module_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shortcut
  ADD CONSTRAINT FOREIGN KEY( authorization_id) references authorization (
    authorization_id
  )
ON Delete NO ACTION ON Update NO ACTION;

alter table shortcut
	add constraint 
	foreign key (			
		transaction_type_id
	) references transaction_type (
		transaction_type_id
	)
	ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE package_type
  ADD CONSTRAINT FOREIGN KEY( courier_id) references courier (
    courier_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE inventory_location
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE inventory_location
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE inventory_transaction
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE inventory_transaction
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE shipping_account
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE shipping_account
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE role_module
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE role_module
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE role_module_authorization
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE role_module_authorization
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE custom_field
  ADD CONSTRAINT FOREIGN KEY( default_custom_field_value_id) references custom_field_value (
    custom_field_value_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( new_asset_id) references asset (
    asset_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE shipment
  ADD CONSTRAINT FOREIGN KEY( from_company_id) references company (
    company_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( shipping_account_id) references shipping_account (
    shipping_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( shipment_id) references shipment (
    shipment_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( fedex_service_type_id) references fedex_service_type (
    fedex_service_type_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( length_unit_id) references length_unit (
    length_unit_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( weight_unit_id) references weight_unit (
    weight_unit_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( currency_unit_id) references currency_unit (
    currency_unit_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( package_type_id) references package_type (
    package_type_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE datagrid_column_preference
  ADD CONSTRAINT FOREIGN KEY( datagrid_id) references datagrid (
    datagrid_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE datagrid_column_preference
  ADD CONSTRAINT FOREIGN KEY( user_account_id) references user_account (
    user_account_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE notification
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE notification
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE notification_user_account
  ADD CONSTRAINT FOREIGN KEY( notification_id) references notification (
    notification_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE notification_user_account
  ADD CONSTRAINT FOREIGN KEY( user_account_id) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE attachment
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_id) references entity_qtype (
    entity_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE attachment
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE fedex_shipment
  ADD CONSTRAINT FOREIGN KEY( hold_at_location_state) references state_province (
    state_province_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_transaction
  ADD CONSTRAINT FOREIGN KEY( parent_asset_transaction_id) references asset_transaction (
    asset_transaction_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE audit
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_id) references entity_qtype (
    entity_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE audit
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE audit
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE audit_scan
  ADD CONSTRAINT FOREIGN KEY( audit_id) references audit (
    audit_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE audit_scan
  ADD CONSTRAINT FOREIGN KEY( location_id) references location (
    location_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_built_in_authorization
  ADD CONSTRAINT FOREIGN KEY( role_id) references role (
    role_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_built_in_authorization
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_id) references entity_qtype (
    entity_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_built_in_authorization
  ADD CONSTRAINT FOREIGN KEY( authorization_id) references authorization (
    authorization_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_custom_field_authorization
  ADD CONSTRAINT FOREIGN KEY( role_id) references role (
    role_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_custom_field_authorization
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_custom_field_id) references entity_qtype_custom_field (
    entity_qtype_custom_field_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_custom_field_authorization
  ADD CONSTRAINT FOREIGN KEY( authorization_id) references authorization (
    authorization_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_custom_field_authorization
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_custom_field_authorization
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_built_in_authorization
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE role_entity_qtype_built_in_authorization
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE shortcut
  ADD CONSTRAINT FOREIGN KEY( entity_qtype_id) references entity_qtype (
    entity_qtype_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE address_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( address_id) references address (
    address_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE asset_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( asset_id) references asset (
    asset_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE inventory_model_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( inventory_model_id) references  inventory_model (
    inventory_model_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE asset_model_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( asset_model_id) references asset_model (
    asset_model_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE manufacturer_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( manufacturer_id) references manufacturer (
    manufacturer_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE category_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( category_id) references category (
    category_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE company_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( company_id) references company (
    company_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE contact_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( contact_id) references contact (
    contact_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE shipment_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( shipment_id) references shipment (
    shipment_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE receipt_custom_field_helper
  ADD CONSTRAINT FOREIGN KEY( receipt_id) references receipt (
    receipt_id
  )
ON Delete CASCADE ON Update NO ACTION;
