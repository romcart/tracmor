ALTER TABLE  `fedex_shipment` ADD  `label_printer_type` INT NULL ,
ADD  `label_format_type` INT NULL ,
ADD  `thermal_printer_port` VARCHAR( 255 ) NULL;

INSERT INTO  `admin_setting` (
	`short_description` ,
	`value`
)
VALUES (
	'fedex_label_printer_type',  '1'
), (
	'fedex_label_format_type',  '5'
), (
	'fedex_thermal_printer_port', 'LPT1'
);
