SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state_province_id` int(10) unsigned DEFAULT NULL,
  `postal_code` varchar(50) NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`),
  KEY `address_fkindex1` (`company_id`),
  KEY `address_fkindex2` (`country_id`),
  KEY `address_fkindex3` (`state_province_id`),
  KEY `address_fkindex4` (`modified_by`),
  KEY `address_fkindex5` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

CREATE TABLE IF NOT EXISTS `address_custom_field_helper` (
  `address_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `address_custom_field_helper_fkindex1` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `admin_setting` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`setting_id`),
  UNIQUE KEY `short_description` (`short_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_asset_id` int(10) unsigned DEFAULT NULL,
  `asset_model_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `asset_code` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `checked_out_flag` bit(1) DEFAULT NULL,
  `reserved_flag` bit(1) DEFAULT NULL,
  `linked_flag` bit(1) DEFAULT NULL,
  `archived_flag` bit(1) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_id`),
  UNIQUE KEY `asset_code` (`asset_code`),
  KEY `asset_fkindex1` (`asset_model_id`),
  KEY `asset_fkindex2` (`location_id`),
  KEY `asset_fkindex3` (`created_by`),
  KEY `asset_fkindex4` (`modified_by`),
  KEY `asset_fkindex5` (`parent_asset_id`),
  KEY `parent_asset_id_linked` (`parent_asset_id`,`linked_flag`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

CREATE TABLE IF NOT EXISTS `asset_custom_field_helper` (
  `asset_id` int(10) unsigned NOT NULL,
  `cfv_1` text,
  `cfv_2` text,
  `cfv_3` text,
  `cfv_4` text,
  `cfv_5` text,
  `cfv_6` text,
  `cfv_7` text,
  `cfv_8` text,
  PRIMARY KEY (`asset_id`),
  KEY `asset_custom_field_helper_fkindex1` (`asset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `asset_model` (
  `asset_model_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `manufacturer_id` int(10) unsigned DEFAULT NULL,
  `asset_model_code` varchar(50) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_model_id`),
  KEY `asset_model_fkindex1` (`category_id`),
  KEY `asset_model_fkindex2` (`manufacturer_id`),
  KEY `asset_model_fkindex3` (`created_by`),
  KEY `asset_model_fkindex4` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

CREATE TABLE IF NOT EXISTS `asset_model_custom_field_helper` (
  `asset_model_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`asset_model_id`),
  KEY `asset_model_custom_field_helper_fkindex1` (`asset_model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `asset_transaction` (
  `asset_transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `parent_asset_transaction_id` int(10) unsigned DEFAULT NULL,
  `source_location_id` int(10) unsigned DEFAULT NULL,
  `destination_location_id` int(10) unsigned DEFAULT NULL,
  `new_asset_flag` bit(1) DEFAULT NULL COMMENT 'Set to true if a new asset was created while creating the transaction (a receipt, or shipment, e.g.)',
  `new_asset_id` int(10) unsigned DEFAULT NULL,
  `schedule_receipt_flag` bit(1) DEFAULT NULL COMMENT 'Set to true if an asset is to be scheduled for a receipt',
  `schedule_receipt_due_date` date DEFAULT NULL COMMENT 'Placeholder for automatically scheduled receipts until the shipment is completed',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_transaction_id`),
  KEY `asset_transaction_fkindex2` (`transaction_id`),
  KEY `asset_transaction_fkindex1` (`asset_id`),
  KEY `asset_transaction_fkindex3` (`source_location_id`),
  KEY `asset_transaction_fkindex4` (`destination_location_id`),
  KEY `asset_transaction_fkindex5` (`created_by`),
  KEY `asset_transaction_fkindex6` (`modified_by`),
  KEY `asset_transaction_fkindex7` (`new_asset_id`),
  KEY `asset_transaction_fkindex8` (`parent_asset_transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

CREATE TABLE IF NOT EXISTS `asset_transaction_checkout` (
  `asset_transaction_checkout_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_transaction_id` int(10) unsigned NOT NULL,
  `to_contact_id` int(10) unsigned DEFAULT NULL,
  `to_user_id` int(10) unsigned DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_transaction_checkout_id`),
  UNIQUE KEY `asset_transaction_id` (`asset_transaction_id`),
  KEY `asset_transaction_checkout_fkindex1` (`to_contact_id`),
  KEY `asset_transaction_checkout_fkindex2` (`to_user_id`),
  KEY `asset_transaction_checkout_fkindex3` (`created_by`),
  KEY `asset_transaction_checkout_fkindex4` (`modified_by`),
  KEY `asset_transaction_checkout_fkindex5` (`asset_transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `attachment` (
  `attachment_id` int(10) NOT NULL AUTO_INCREMENT,
  `entity_qtype_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `tmp_filename` varchar(40) DEFAULT NULL,
  `file_type` varchar(40) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `SIZE` int(10) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`attachment_id`),
  KEY `attachment_fkindex1` (`entity_qtype_id`),
  KEY `entity_id` (`entity_id`),
  KEY `attachment_fkindex2` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS `audit` (
  `audit_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `entity_qtype_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_id`),
  KEY `audit_fkindex1` (`entity_qtype_id`),
  KEY `audit_fkindex2` (`created_by`),
  KEY `audit_fkindex3` (`modified_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `audit_scan` (
  `audit_scan_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `audit_id` int(10) NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) DEFAULT NULL COMMENT 'FK',
  `COUNT` int(10) DEFAULT NULL,
  `system_count` int(10) DEFAULT NULL,
  PRIMARY KEY (`audit_scan_id`),
  KEY `audit_scan_fkindex1` (`audit_id`),
  KEY `audit_scan_fkindex2` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `authorization` (
  `authorization_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`authorization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `authorization_level` (
  `authorization_level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`authorization_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `asset_flag` bit(1) NOT NULL COMMENT 'bit specifying whether or not this category applies to assets',
  `inventory_flag` bit(1) NOT NULL COMMENT 'bit specifying whether or not this category applies to inventory',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`),
  KEY `category_fkindex1` (`created_by`),
  KEY `category_fkindex2` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

CREATE TABLE IF NOT EXISTS `category_custom_field_helper` (
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `category_custom_field_helper_fkindex1` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address_id` int(10) unsigned DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `long_description` text,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `short_description` (`short_description`),
  KEY `company_fkindex1` (`address_id`),
  KEY `company_fkindex2` (`created_by`),
  KEY `company_fkindex3` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

CREATE TABLE IF NOT EXISTS `company_custom_field_helper` (
  `company_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`company_id`),
  KEY `company_custom_field_helper_fkindex1` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_office` varchar(50) DEFAULT NULL,
  `phone_home` varchar(50) DEFAULT NULL,
  `phone_mobile` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `description` text,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`),
  KEY `contact_fkindex3` (`modified_by`),
  KEY `contact_fkindex4` (`created_by`),
  KEY `contact_fkindex2` (`address_id`),
  KEY `contact_fkindex1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

CREATE TABLE IF NOT EXISTS `contact_custom_field_helper` (
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `contact_custom_field_helper_fkindex1` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(50) NOT NULL,
  `abbreviation` char(2) DEFAULT NULL,
  `state_flag` bit(1) DEFAULT NULL,
  `province_flag` bit(1) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

CREATE TABLE IF NOT EXISTS `courier` (
  `courier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `active_flag` bit(1) DEFAULT NULL,
  PRIMARY KEY (`courier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `custom_field` (
  `custom_field_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom_field_qtype_id` int(10) unsigned NOT NULL,
  `default_custom_field_value_id` int(10) unsigned DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `active_flag` bit(1) DEFAULT NULL,
  `required_flag` bit(1) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`custom_field_id`),
  KEY `custom_field_fkindex2` (`modified_by`),
  KEY `custom_field_fkindex3` (`created_by`),
  KEY `custom_field_fkindex1` (`custom_field_qtype_id`),
  KEY `custom_field_fkindex4` (`default_custom_field_value_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

CREATE TABLE IF NOT EXISTS `custom_field_qtype` (
  `custom_field_qtype_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`custom_field_qtype_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `custom_field_value` (
  `custom_field_value_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom_field_id` int(10) unsigned NOT NULL,
  `short_description` text,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`custom_field_value_id`),
  KEY `custom_field_value_fkindex2` (`created_by`),
  KEY `custom_field_value_fkindex3` (`modified_by`),
  KEY `custom_field_value_fkindex1` (`custom_field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `datagrid` (
  `datagrid_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  PRIMARY KEY (`datagrid_id`),
  UNIQUE KEY `short_description` (`short_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

CREATE TABLE IF NOT EXISTS `datagrid_column_preference` (
  `datagrid_column_preference_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datagrid_id` int(10) unsigned NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `user_account_id` int(10) unsigned NOT NULL,
  `display_flag` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`datagrid_column_preference_id`),
  UNIQUE KEY `datagrid_id` (`datagrid_id`,`column_name`,`user_account_id`),
  KEY `datagrid_column_preference_fkindex1` (`datagrid_id`),
  KEY `datagrid_column_preference_fkindex2` (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `entity_qtype` (
  `entity_qtype_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`entity_qtype_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

CREATE TABLE IF NOT EXISTS `entity_qtype_custom_field` (
  `entity_qtype_custom_field_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entity_qtype_id` int(10) unsigned NOT NULL,
  `custom_field_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`entity_qtype_custom_field_id`),
  KEY `entity_qtype_custom_field_fkindex1` (`entity_qtype_id`),
  KEY `entity_qtype_custom_field_fkindex2` (`custom_field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

CREATE TABLE IF NOT EXISTS `inventory_location` (
  `inventory_location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_model_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inventory_location_id`),
  KEY `inventory_location_fkindex1` (`location_id`),
  KEY `inventory_location_fkindex2` (`inventory_model_id`),
  KEY `inventory_location_fkindex3` (`modified_by`),
  KEY `inventory_location_fkindex4` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `inventory_model` (
  `inventory_model_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `manufacturer_id` int(10) unsigned DEFAULT NULL,
  `inventory_model_code` varchar(50) NOT NULL COMMENT 'Bar code',
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inventory_model_id`),
  UNIQUE KEY `inventory_model_code` (`inventory_model_code`),
  KEY `inventory_model_fkindex1` (`category_id`),
  KEY `inventory_model_fkindex2` (`manufacturer_id`),
  KEY `inventory_model_fkindex3` (`created_by`),
  KEY `inventory_model_fkindex4` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `inventory_model_custom_field_helper` (
  `inventory_model_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`inventory_model_id`),
  KEY `inventory_model_custom_field_helper_fkindex1` (`inventory_model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `inventory_transaction` (
  `inventory_transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_location_id` int(10) unsigned NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `source_location_id` int(10) unsigned DEFAULT NULL,
  `destination_location_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inventory_transaction_id`),
  KEY `inventory_transaction_fkindex2` (`transaction_id`),
  KEY `inventory_transaction_fkindex3` (`source_location_id`),
  KEY `inventory_transaction_fkindex4` (`destination_location_id`),
  KEY `inventory_transaction_fkindex1` (`inventory_location_id`),
  KEY `inventory_transaction_fkindex5` (`created_by`),
  KEY `inventory_transaction_fkindex6` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `asset_flag` bit(1) NOT NULL DEFAULT b'1',
  `inventory_flag` bit(1) NOT NULL DEFAULT b'1',
  `enabled_flag` bit(1) NOT NULL DEFAULT b'1',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`location_id`),
  UNIQUE KEY `short_description` (`short_description`),
  KEY `location_fkindex1` (`created_by`),
  KEY `location_fkindex2` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`manufacturer_id`),
  KEY `manufacturer_fkindex1` (`created_by`),
  KEY `manufacturer_fkindex2` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

CREATE TABLE IF NOT EXISTS `manufacturer_custom_field_helper` (
  `manufacturer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`manufacturer_id`),
  KEY `manufacturer_custom_field_helper_fkindex1` (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(10) NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `criteria` varchar(255) DEFAULT NULL,
  `frequency` enum('once','daily','weekly','monthly') NOT NULL,
  `enabled_flag` bit(1) NOT NULL DEFAULT b'0',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notification_id`),
  KEY `notification_fkindex1` (`created_by`),
  KEY `notification_fkindex2` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `notification_user_account` (
  `notification_user_account_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(10) unsigned NOT NULL,
  `notification_id` int(10) NOT NULL,
  `level` enum('all','owner') DEFAULT NULL,
  PRIMARY KEY (`notification_user_account_id`),
  KEY `notification_user_account_fkindex1` (`notification_id`),
  KEY `notification_user_account_fkindex2` (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `receipt` (
  `receipt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) unsigned NOT NULL,
  `from_company_id` int(10) unsigned NOT NULL,
  `from_contact_id` int(10) unsigned NOT NULL,
  `to_contact_id` int(10) unsigned NOT NULL,
  `to_address_id` int(10) unsigned NOT NULL,
  `receipt_number` varchar(50) NOT NULL,
  `due_date` date DEFAULT NULL,
  `receipt_date` date DEFAULT NULL,
  `received_flag` bit(1) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`receipt_id`),
  UNIQUE KEY `transaction_id` (`transaction_id`),
  UNIQUE KEY `receipt_number` (`receipt_number`),
  KEY `receipt_fkindex1` (`from_company_id`),
  KEY `receipt_fkindex2` (`from_contact_id`),
  KEY `receipt_fkindex3` (`to_contact_id`),
  KEY `receipt_fkindex4` (`to_address_id`),
  KEY `receipt_fkindex5` (`created_by`),
  KEY `receipt_fkindex6` (`modified_by`),
  KEY `receipt_fkindex7` (`transaction_id`),
  KEY `receipt_index3241` (`receipt_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `receipt_custom_field_helper` (
  `receipt_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`receipt_id`),
  KEY `receipt_custom_field_helper_fkindex1` (`receipt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL,
  `long_description` text,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`),
  KEY `role_fkindex1` (`created_by`),
  KEY `role_fkindex2` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `role_entity_qtype_built_in_authorization` (
  `role_entity_built_in_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `entity_qtype_id` int(10) unsigned NOT NULL,
  `authorization_id` int(10) unsigned NOT NULL,
  `authorized_flag` bit(1) NOT NULL DEFAULT b'0',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_entity_built_in_id`),
  UNIQUE KEY `role_id` (`role_id`,`entity_qtype_id`,`authorization_id`),
  KEY `role_entity_qtype_built_in_authorization_fkindex1` (`role_id`),
  KEY `role_entity_qtype_built_in_authorization_fkindex2` (`entity_qtype_id`),
  KEY `role_entity_qtype_built_in_authorization_fkindex3` (`authorization_id`),
  KEY `role_entity_qtype_built_in_authorization_fkindex4` (`created_by`),
  KEY `role_entity_qtype_built_in_authorization_fkindex5` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

CREATE TABLE IF NOT EXISTS `role_entity_qtype_custom_field_authorization` (
  `role_entity_qtype_custom_field_authorization_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `entity_qtype_custom_field_id` int(10) unsigned NOT NULL,
  `authorization_id` int(10) unsigned NOT NULL,
  `authorized_flag` bit(1) NOT NULL DEFAULT b'0',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_entity_qtype_custom_field_authorization_id`),
  UNIQUE KEY `role_id` (`role_id`,`entity_qtype_custom_field_id`,`authorization_id`),
  KEY `role_entity_qtype_custom_field_authorization_fkindex1` (`role_id`),
  KEY `role_entity_qtype_custom_field_authorization_fkindex2` (`entity_qtype_custom_field_id`),
  KEY `role_entity_qtype_custom_field_authorization_fkindex3` (`authorization_id`),
  KEY `role_entity_qtype_custom_field_authorization_fkindex4` (`created_by`),
  KEY `role_entity_qtype_custom_field_authorization_fkindex5` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

CREATE TABLE IF NOT EXISTS `role_module` (
  `role_module_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `module_id` int(10) unsigned NOT NULL,
  `access_flag` bit(1) NOT NULL COMMENT 'Determines whether this role has access to this module',
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_module_id`),
  KEY `role_module_fkindex1` (`role_id`),
  KEY `role_module_fkindex2` (`module_id`),
  KEY `role_module_fkindex3` (`created_by`),
  KEY `role_module_fkindex4` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

CREATE TABLE IF NOT EXISTS `role_module_authorization` (
  `role_module_authorization_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_module_id` int(10) unsigned DEFAULT NULL,
  `authorization_id` int(10) unsigned DEFAULT NULL,
  `authorization_level_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_module_authorization_id`),
  KEY `role_module_authorization_fkindex1` (`role_module_id`),
  KEY `role_module_authorization_fkindex2` (`authorization_id`),
  KEY `role_module_authorization_fkindex3` (`authorization_level_id`),
  KEY `role_module_authorization_fkindex4` (`created_by`),
  KEY `role_module_authorization_fkindex5` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

CREATE TABLE IF NOT EXISTS `role_transaction_type_authorization` (
  `role_transaction_type_authorization_id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  `authorization_level_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_transaction_type_authorization_id`),
  UNIQUE KEY `role_transaction_type_authorization_UNIQUE` (`role_id`,`transaction_type_id`),
  KEY `role_transaction_type_authorization_FKIndex1` (`created_by`),
  KEY `role_transaction_type_authorization_FKIndex2` (`modified_by`),
  KEY `role_transaction_type_authorization_FKIndex3` (`authorization_level_id`),
  KEY `role_transaction_type_authorization_FKIndex4` (`transaction_type_id`),
  KEY `role_transaction_type_authorization_FKIndex5` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

CREATE TABLE IF NOT EXISTS `shipment` (
  `shipment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipment_number` varchar(50) NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `from_company_id` int(10) unsigned NOT NULL,
  `from_contact_id` int(10) unsigned NOT NULL,
  `from_address_id` int(10) unsigned NOT NULL,
  `to_company_id` int(10) unsigned NOT NULL,
  `to_contact_id` int(10) unsigned NOT NULL,
  `to_address_id` int(10) unsigned NOT NULL,
  `courier_id` int(10) unsigned DEFAULT NULL,
  `tracking_number` varchar(50) DEFAULT NULL,
  `ship_date` date NOT NULL,
  `shipped_flag` bit(1) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipment_id`),
  UNIQUE KEY `shipment_number` (`shipment_number`),
  UNIQUE KEY `transaction_id` (`transaction_id`),
  KEY `shipment_fkindex1` (`transaction_id`),
  KEY `shipment_fkindex4` (`from_address_id`),
  KEY `shipment_fkindex5` (`to_address_id`),
  KEY `shipment_fkindex6` (`to_company_id`),
  KEY `shipment_fkindex8` (`courier_id`),
  KEY `shipment_fkindex13` (`created_by`),
  KEY `shipment_fkindex14` (`modified_by`),
  KEY `shipment_fkindex2` (`from_contact_id`),
  KEY `shipment_fkindex3` (`to_contact_id`),
  KEY `shipment_fkindex16` (`from_company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `shipment_custom_field_helper` (
  `shipment_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`shipment_id`),
  KEY `shipment_custom_field_helper_fkindex1` (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `shipping_account` (
  `shipping_account_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier_id` int(10) unsigned NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `access_id` varchar(255) NOT NULL,
  `access_code` varchar(255) NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipping_account_id`),
  KEY `shipping_account_fkindex1` (`courier_id`),
  KEY `shipping_account_fkindex2` (`modified_by`),
  KEY `shipping_account_fkindex3` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `shortcut` (
  `shortcut_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(10) unsigned NOT NULL,
  `authorization_id` int(10) unsigned DEFAULT NULL,
  `transaction_type_id` int(10) unsigned DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `entity_qtype_id` int(10) unsigned NOT NULL,
  `create_flag` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`shortcut_id`),
  KEY `shortcut_fkindex1` (`module_id`),
  KEY `shortcut_fkindex2` (`authorization_id`),
  KEY `shortcut_fkindex3` (`transaction_type_id`),
  KEY `shortcut_fkindex4` (`entity_qtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

CREATE TABLE IF NOT EXISTS `state_province` (
  `state_province_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned DEFAULT NULL,
  `short_description` varchar(50) DEFAULT NULL,
  `abbreviation` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`state_province_id`),
  KEY `state_province_fkindex1` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entity_qtype_id` int(10) unsigned NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  `note` text,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `transaction_fkindex1` (`transaction_type_id`),
  KEY `transaction_fkindex2` (`created_by`),
  KEY `transaction_fkindex3` (`modified_by`),
  KEY `transaction_fkindex4` (`entity_qtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `transaction_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_description` varchar(50) NOT NULL,
  `asset_flag` bit(1) NOT NULL DEFAULT b'0',
  `inventory_flag` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`transaction_type_id`),
  UNIQUE KEY `short_description` (`short_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_account_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(40) NOT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `active_flag` bit(1) NOT NULL COMMENT 'User account enabled/disabled',
  `admin_flag` bit(1) NOT NULL COMMENT 'Designates user as normal or administrator',
  `portable_access_flag` bit(1) DEFAULT NULL,
  `portable_user_pin` int(10) DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_account_id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_account_fkindex1` (`created_by`),
  KEY `user_account_fkindex2` (`modified_by`),
  KEY `user_account_fkindex3` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='User accounts are stored in this table' AUTO_INCREMENT=11 ;

ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`state_province_id`) REFERENCES `state_province` (`state_province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `address_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `address_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `address_custom_field_helper`
  ADD CONSTRAINT `address_custom_field_helper_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `asset`
  ADD CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`asset_model_id`) REFERENCES `asset_model` (`asset_model_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_ibfk_3` FOREIGN KEY (`parent_asset_id`) REFERENCES `asset` (`asset_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_ibfk_5` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `asset_custom_field_helper`
  ADD CONSTRAINT `asset_custom_field_helper_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`asset_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `asset_model`
  ADD CONSTRAINT `asset_model_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_model_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_model_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_model_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `asset_model_custom_field_helper`
  ADD CONSTRAINT `asset_model_custom_field_helper_ibfk_1` FOREIGN KEY (`asset_model_id`) REFERENCES `asset_model` (`asset_model_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `asset_transaction`
  ADD CONSTRAINT `asset_transaction_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_2` FOREIGN KEY (`source_location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_3` FOREIGN KEY (`destination_location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_4` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`asset_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_6` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_7` FOREIGN KEY (`new_asset_id`) REFERENCES `asset` (`asset_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_ibfk_8` FOREIGN KEY (`parent_asset_transaction_id`) REFERENCES `asset_transaction` (`asset_transaction_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `asset_transaction_checkout`
  ADD CONSTRAINT `asset_transaction_checkout_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_checkout_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_checkout_ibfk_5` FOREIGN KEY (`asset_transaction_id`) REFERENCES `asset_transaction` (`asset_transaction_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_checkout_ibfk_6` FOREIGN KEY (`to_contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asset_transaction_checkout_ibfk_7` FOREIGN KEY (`to_user_id`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`entity_qtype_id`) REFERENCES `entity_qtype` (`entity_qtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attachment_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`entity_qtype_id`) REFERENCES `entity_qtype` (`entity_qtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `audit_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `audit_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `audit_scan`
  ADD CONSTRAINT `audit_scan_ibfk_1` FOREIGN KEY (`audit_id`) REFERENCES `audit` (`audit_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `audit_scan_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `category_custom_field_helper`
  ADD CONSTRAINT `category_custom_field_helper_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `company_custom_field_helper`
  ADD CONSTRAINT `company_custom_field_helper_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `contact_ibfk_4` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `contact_custom_field_helper`
  ADD CONSTRAINT `contact_custom_field_helper_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `custom_field`
  ADD CONSTRAINT `custom_field_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `custom_field_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `custom_field_ibfk_3` FOREIGN KEY (`custom_field_qtype_id`) REFERENCES `custom_field_qtype` (`custom_field_qtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `custom_field_ibfk_4` FOREIGN KEY (`default_custom_field_value_id`) REFERENCES `custom_field_value` (`custom_field_value_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `custom_field_value`
  ADD CONSTRAINT `custom_field_value_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `custom_field_value_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `custom_field_value_ibfk_3` FOREIGN KEY (`custom_field_id`) REFERENCES `custom_field` (`custom_field_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `datagrid_column_preference`
  ADD CONSTRAINT `datagrid_column_preference_ibfk_1` FOREIGN KEY (`datagrid_id`) REFERENCES `datagrid` (`datagrid_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `datagrid_column_preference_ibfk_2` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`user_account_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `entity_qtype_custom_field`
  ADD CONSTRAINT `entity_qtype_custom_field_ibfk_1` FOREIGN KEY (`entity_qtype_id`) REFERENCES `entity_qtype` (`entity_qtype_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `entity_qtype_custom_field_ibfk_2` FOREIGN KEY (`custom_field_id`) REFERENCES `custom_field` (`custom_field_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `inventory_location`
  ADD CONSTRAINT `inventory_location_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_location_ibfk_2` FOREIGN KEY (`inventory_model_id`) REFERENCES `inventory_model` (`inventory_model_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_location_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_location_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `inventory_model`
  ADD CONSTRAINT `inventory_model_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_model_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_model_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_model_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `inventory_model_custom_field_helper`
  ADD CONSTRAINT `inventory_model_custom_field_helper_ibfk_1` FOREIGN KEY (`inventory_model_id`) REFERENCES `inventory_model` (`inventory_model_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `inventory_transaction`
  ADD CONSTRAINT `inventory_transaction_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_transaction_ibfk_2` FOREIGN KEY (`source_location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_transaction_ibfk_3` FOREIGN KEY (`destination_location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_transaction_ibfk_4` FOREIGN KEY (`inventory_location_id`) REFERENCES `inventory_location` (`inventory_location_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_transaction_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_transaction_ibfk_6` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `manufacturer`
  ADD CONSTRAINT `manufacturer_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `manufacturer_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `manufacturer_custom_field_helper`
  ADD CONSTRAINT `manufacturer_custom_field_helper_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `notification_user_account`
  ADD CONSTRAINT `notification_user_account_ibfk_1` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`notification_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notification_user_account_ibfk_2` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`from_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`from_contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `receipt_ibfk_3` FOREIGN KEY (`to_contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `receipt_ibfk_4` FOREIGN KEY (`to_address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `receipt_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `receipt_ibfk_6` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `receipt_ibfk_7` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `receipt_custom_field_helper`
  ADD CONSTRAINT `receipt_custom_field_helper_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`receipt_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `role_entity_qtype_built_in_authorization`
  ADD CONSTRAINT `role_entity_qtype_built_in_authorization_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_built_in_authorization_ibfk_2` FOREIGN KEY (`entity_qtype_id`) REFERENCES `entity_qtype` (`entity_qtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_built_in_authorization_ibfk_3` FOREIGN KEY (`authorization_id`) REFERENCES `authorization` (`authorization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_built_in_authorization_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_built_in_authorization_ibfk_5` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `role_entity_qtype_custom_field_authorization`
  ADD CONSTRAINT `role_entity_qtype_custom_field_authorization_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_custom_field_authorization_ibfk_2` FOREIGN KEY (`entity_qtype_custom_field_id`) REFERENCES `entity_qtype_custom_field` (`entity_qtype_custom_field_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_custom_field_authorization_ibfk_3` FOREIGN KEY (`authorization_id`) REFERENCES `authorization` (`authorization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_custom_field_authorization_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_entity_qtype_custom_field_authorization_ibfk_5` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `role_module`
  ADD CONSTRAINT `role_module_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `role_module_authorization`
  ADD CONSTRAINT `role_module_authorization_ibfk_1` FOREIGN KEY (`role_module_id`) REFERENCES `role_module` (`role_module_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_authorization_ibfk_2` FOREIGN KEY (`authorization_id`) REFERENCES `authorization` (`authorization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_authorization_ibfk_3` FOREIGN KEY (`authorization_level_id`) REFERENCES `authorization_level` (`authorization_level_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_authorization_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_module_authorization_ibfk_5` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `role_transaction_type_authorization`
  ADD CONSTRAINT `role_transaction_type_authorization_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_transaction_type_authorization_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_transaction_type_authorization_ibfk_3` FOREIGN KEY (`authorization_level_id`) REFERENCES `authorization_level` (`authorization_level_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_transaction_type_authorization_ibfk_4` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_type` (`transaction_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_transaction_type_authorization_ibfk_5` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_10` FOREIGN KEY (`from_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`from_address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_3` FOREIGN KEY (`to_address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_4` FOREIGN KEY (`to_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_5` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_7` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_8` FOREIGN KEY (`from_contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_ibfk_9` FOREIGN KEY (`to_contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `shipment_custom_field_helper`
  ADD CONSTRAINT `shipment_custom_field_helper_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `shipping_account`
  ADD CONSTRAINT `shipping_account_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipping_account_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipping_account_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `shortcut`
  ADD CONSTRAINT `shortcut_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shortcut_ibfk_2` FOREIGN KEY (`authorization_id`) REFERENCES `authorization` (`authorization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shortcut_ibfk_3` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_type` (`transaction_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shortcut_ibfk_4` FOREIGN KEY (`entity_qtype_id`) REFERENCES `entity_qtype` (`entity_qtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `state_province`
  ADD CONSTRAINT `state_province_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_type` (`transaction_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`entity_qtype_id`) REFERENCES `entity_qtype` (`entity_qtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_account_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user_account` (`user_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_account_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
