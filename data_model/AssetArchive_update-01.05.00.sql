ALTER TABLE `asset` ADD
  `archived_flag` BIT(1) NULL AFTER `linked_flag`;
INSERT INTO `transaction_type` VALUES
  (10,'Archive',1,0),
  (11,'Unarchive',1,0);
INSERT INTO shortcut
  (module_id,
  authorization_id,
  short_description,
  link,
  image_path,
  entity_qtype_id,
  create_flag)
  VALUES
    (2,2,'Archive Assets','../assets/asset_edit.php?intTransactionTypeId=10', 'asset_archive.png',1,0),
    (2,2,'Unarchive Assets','../assets/asset_edit.php?intTransactionTypeId=11', 'asset_unarchive.png',1,0);