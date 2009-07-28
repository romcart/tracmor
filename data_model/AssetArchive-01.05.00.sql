ALTER TABLE `asset` ADD
  `archived_flag` BIT(1) NULL AFTER `linked_flag`;
INSERT INTO `transaction_type` VALUES
  (10,'Archive',1,0),
  (11,'Unarchive',1,0);