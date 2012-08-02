ALTER TABLE  `custom_field` ADD  `all_asset_models_flag` BIT( 1 ) NULL DEFAULT 1 AFTER  `required_flag`;
ALTER TABLE  `custom_field` ADD  `searchable_flag` BIT( 1 ) NULL AFTER  `all_asset_models_flag`;

CREATE TABLE asset_custom_field_asset_model (
  asset_custom_field_asset_model_id INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
  asset_model_id              INTEGER UNSIGNED   NOT NULL,
  custom_field_id             INTEGER UNSIGNED   NOT NULL,
	PRIMARY KEY ( asset_custom_field_asset_model_id ),
	INDEX asset_custom_field_asset_model_fkindex1 ( asset_model_id ),
	INDEX asset_custom_field_asset_model_fkindex2 ( custom_field_id ))
ENGINE = INNODB;

ALTER TABLE asset_custom_field_asset_model
  ADD CONSTRAINT FOREIGN KEY( asset_model_id) references asset_model (
   asset_model_id
  )
ON Delete CASCADE ON Update NO ACTION;

ALTER TABLE asset_custom_field_asset_model
  ADD CONSTRAINT FOREIGN KEY( custom_field_id) references custom_field (
	custom_field_id
  )
ON Delete CASCADE ON Update NO ACTION;
