INSERT INTO `admin_setting` (
	`short_description` ,
	`value`
)
VALUES (
	'asset_limit', NULL
);

DELETE `custom_field_value`.* FROM `custom_field_value` LEFT JOIN `custom_field` ON `custom_field_value`.`custom_field_id` = `custom_field`.`custom_field_id` WHERE `custom_field`.`custom_field_qtype_id` != 2;

DROP TABLE `custom_field_selection`;