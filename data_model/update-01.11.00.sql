ALTER TABLE `asset_transaction_checkout` DROP FOREIGN KEY `asset_transaction_checkout_ibfk_1` ;
ALTER TABLE `asset_transaction_checkout` ADD FOREIGN KEY ( `to_contact_id` ) REFERENCES `tracmor`.`contact` (
`contact_id` 
) ON DELETE NO ACTION ON UPDATE NO ACTION ;
ALTER TABLE `asset_transaction_checkout` DROP FOREIGN KEY `asset_transaction_checkout_ibfk_2` ;
ALTER TABLE `asset_transaction_checkout` ADD FOREIGN KEY ( `to_user_id` ) REFERENCES `tracmor`.`user_account` (
`user_account_id` 
) ON DELETE NO ACTION ON UPDATE NO ACTION ;
ALTER TABLE  `asset_transaction` DROP FOREIGN KEY  `asset_transaction_ibfk_8` ;
ALTER TABLE  `asset_transaction` ADD FOREIGN KEY (  `parent_asset_transaction_id` ) REFERENCES  `asset_transaction` (
`asset_transaction_id`
) ON DELETE SET NULL ON UPDATE NO ACTION ;
