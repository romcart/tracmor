ALTER TABLE  `location` ADD  `inventory_flag` BIT( 1 ) NOT NULL DEFAULT b'1' AFTER  `long_description`;
ALTER TABLE  `location` ADD  `asset_flag`     BIT( 1 ) NOT NULL DEFAULT b'1' AFTER  `long_description`;
