CREATE TABLE asset_transaction_checkout (
  asset_transaction_checkout_id      INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  asset_transaction_id  INTEGER UNSIGNED   NOT NULL,
  to_contact_id   INTEGER UNSIGNED   NULL,
  to_user_id   INTEGER UNSIGNED   NULL,
  due_date        DATETIME   NULL,
  created_by      INTEGER UNSIGNED   NULL,
  creation_date   DATETIME   NULL,
  modified_by     INTEGER UNSIGNED   NULL,
  modified_date   TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   NULL   DEFAULT NULL,
    PRIMARY KEY ( asset_transaction_checkout_id ),
    INDEX asset_transaction_checkout_fkindex1 ( to_contact_id ),
    INDEX asset_transaction_checkout_fkindex2 ( to_user_id ),
    INDEX asset_transaction_checkout_fkindex3 ( created_by ),
    INDEX asset_transaction_checkout_fkindex4 ( modified_by ),
    INDEX asset_transaction_checkout_fkindex5 ( asset_transaction_id ),
    UNIQUE (asset_transaction_id ))
ENGINE = INNODB;

ALTER TABLE asset_transaction_checkout
  ADD CONSTRAINT FOREIGN KEY( to_contact_id) references contact (
    contact_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE asset_transaction_checkout
  ADD CONSTRAINT FOREIGN KEY( to_user_id) references user_account (
    user_account_id
  )
ON Delete SET NULL ON Update NO ACTION;

ALTER TABLE asset_transaction_checkout
  ADD CONSTRAINT FOREIGN KEY( created_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_transaction_checkout
  ADD CONSTRAINT FOREIGN KEY( modified_by) references user_account (
    user_account_id
  )
ON Delete NO ACTION ON Update NO ACTION;

ALTER TABLE asset_transaction_checkout
  ADD CONSTRAINT FOREIGN KEY( asset_transaction_id) references asset_transaction (
    asset_transaction_id
  )
ON Delete CASCADE ON Update NO ACTION;

INSERT INTO `admin_setting` (`short_description`,`value`) VALUES
	('check_out_to_other_users',NULL),
	('check_out_to_contacts',NULL),
	('due_date_required',NULL),
	('reason_required',NULL),
	('default_check_out_period','24');