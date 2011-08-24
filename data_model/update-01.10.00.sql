ALTER TABLE  `location` ADD  `enabled_flag` BIT( 1 ) NOT NULL DEFAULT b'1' AFTER  `long_description`;

UPDATE `location` SET `enabled_flag` = '1';
