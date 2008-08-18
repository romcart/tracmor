SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO datagrid
           (short_description)
VALUES     ('asset_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('asset_model_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('inventory_model_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('company_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('contact_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('category_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('manufacturer_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('receipt_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('shipment_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('asset_audit_list');

INSERT INTO datagrid
           (short_description)
VALUES     ('inventory_audit_list');

INSERT INTO datagrid
           (short_description) 
VALUES     ('location_list')

INSERT INTO datagrid
           (short_description) 
VALUES     ('user_list');

INSERT INTO notification
           (notification_id,
            short_description,
            long_description,
            criteria,
            frequency,
            enabled_flag)
VALUES     (1,'Overdue Receipt','Send notification when a receipt is overdue',
            '10','once',false);

INSERT INTO `location`
           (location_id,
            short_description,
            long_description,
            created_by,
            creation_date,
            modified_by,
            modified_date)
VALUES     (1,'Checked Out',NULL,NULL,NULL,NULL,NULL);

INSERT INTO `location`
           (location_id,
            short_description,
            long_description,
            created_by,
            creation_date,
            modified_by,
            modified_date)
VALUES     (2,'Shipped',NULL,NULL,NULL,NULL,NULL);

INSERT INTO `location`
           (location_id,
            short_description,
            long_description,
            created_by,
            creation_date,
            modified_by,
            modified_date)
VALUES     (3,'Taken Out',NULL,NULL,NULL,NULL,NULL);

INSERT INTO `location`
           (location_id,
            short_description,
            long_description,
            created_by,
            creation_date,
            modified_by,
            modified_date)
VALUES     (4,'New Inventory',NULL,NULL,NULL,NULL,NULL);

INSERT INTO `location`
           (location_id,
            short_description,
            long_description,
            created_by,
            creation_date,
            modified_by,
            modified_date)
VALUES     (5,'To Be Received',NULL,NULL,NULL,NULL,NULL);

INSERT INTO `transaction_type`
VALUES     (1,'Move',1,1),
           (2,'Check In',1,0),
           (3,'Check Out',1,0),
           (4,'Restock',0,1),
           (5,'Take Out',0,1),
           (6,'Ship',1,1),
           (7,'Receive',1,1),
           (8,'Reserve',1,0),
           (9,'Unreserve',1,0);

INSERT INTO `user_account`
           (user_account_id,
            first_name,
            last_name,
            username,
            password_hash,
            active_flag,
            admin_flag,
            role_id,
            created_by,
            creation_date)
VALUES     (1,'Admin','User','admin','d033e22ae348aeb5660fc2140aec35850c4da997',
            1,1,1,1,NOW());

INSERT INTO `custom_field_qtype`
           (name)
VALUES     ('text');

INSERT INTO `custom_field_qtype`
           (name)
VALUES     ('select');

INSERT INTO `custom_field_qtype`
           (name)
VALUES     ('textarea');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (1,'Asset');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (2,'Inventory');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (3,'AssetInventory');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (4,'AssetModel');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (5,'Manufacturer');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (6,'Category');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (7,'Company');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (8,'Contact');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (9,'Address');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (10,'Shipment');

INSERT INTO `entity_qtype`
           (entity_qtype_id,
            name)
VALUES     (11,'Receipt');

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (1,'Afghanistan','AF',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (2,'Albania','AL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (3,'Algeria','DZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (4,'American Samoa','AS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (5,'Andorra','AD',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (6,'Angola','AO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (7,'Anguilla','AI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (8,'Antigua','AG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (9,'Argentina','AR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (10,'Armenia','AM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (11,'Aruba','AW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (12,'Australia','AU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (13,'Austria','AT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (14,'Azerbaijan','AZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (15,'Bahamas','BS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (16,'Bahrain','BH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (17,'Bangladesh','BD',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (18,'Barbados','BB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (19,'Barbuda(Antigua)','AG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (20,'Belarus','BY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (21,'Belgium','BE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (22,'Benin','BJ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (23,'Bermuda','BM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (24,'Belize','BZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (25,'Bolivia','BO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (26,'Bonaire(Netherlands Antilles)','AN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (27,'Bosnia-Herzegovina','BA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (28,'Botswana','BW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (29,'Bhutan','BT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (30,'Brazil','BR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (31,'British Virgin Islands','VG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (32,'Brunei','BN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (33,'Bulgaria','BG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (34,'Burkina Faso','BF',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (35,'Burundi','BI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (36,'Cambodia','KH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (37,'Cameroon','CM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (38,'Canada','CA',NULL,1);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (39,'Canary Islands(Spain)','ES',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (40,'Cape Verde','CV',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (41,'Chad','TD',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (42,'Channel Islands(United Kingdom)','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (43,'Cayman Islands','KY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (44,'Chile','CL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (45,'China','CN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (46,'Colombia','CO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (47,'Congo','CG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (48,'Congo, Democratic Republic of','CD',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (49,'Cook Islands','CK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (50,'Croatia','HR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (51,'Curacao(Netherlands Antilles)','AN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (52,'Costa Rica','CR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (53,'Cyprus','CY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (54,'Czech Republic','CZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (55,'Denmark','DK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (56,'Djibouti','DJ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (57,'Dominica','DM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (58,'Dominican Republic','DO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (59,'East Timor','TP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (60,'Ecuador','EC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (61,'Egypt','EG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (62,'El Salvador','SV',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (63,'England(United Kingdom)','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (64,'Equatorial Guinea','GQ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (65,'Eritrea','ER',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (66,'Estonia','EE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (67,'Ethiopia','ET',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (68,'Faeroe Islands','FO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (69,'Fiji','FJ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (70,'Finland','FI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (71,'France','FR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (72,'French Guiana','GF',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (73,'French Polynesia','PF',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (74,'Gabon','GA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (75,'Gambia','GM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (76,'Georgia','GE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (77,'Germany','DE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (78,'Ghana','GH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (79,'Gibraltar','GI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (80,'Grand Cayman(Cayman Islands)','KY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (81,'Great Britain(United Kingdom)','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (82,'Great Thatch Islands(British Virgin Islands)',
            'VG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (83,'Great Tobago Islands(British Virgin Islands)',
            'VG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (84,'Greece','GR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (85,'Greenland','GL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (86,'Grenada','GD',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (87,'Guadeloupe','GP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (88,'Guam','GU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (89,'Guatemala','GT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (90,'Guinea','GN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (91,'Guyana','GY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (92,'Haiti','HT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (93,'Holland(Netherlands)','NL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (94,'Honduras','HS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (95,'Hong Kong','HK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (96,'Hungary','HU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (97,'Iceland','IS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (98,'India','IN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (99,'Indonesia','ID',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (100,'Iraq','IQ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (101,'Ireland','IE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (102,'Israel','IL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (103,'Italy','IT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (104,'Ivory Coast','CI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (105,'Jamaica','JM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (106,'Japan','JP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (107,'Jordan','JO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (108,'Jost Van Dyke Islands(British Virgin Islands)',
            'VG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (109,'Kazakhstan','KZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (110,'Kenya','KE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (111,'Kiribati','KI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (112,'Kuwait','KW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (113,'Kyrgyzstan','KG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (114,'Laos','LA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (115,'Latvia','LV',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (116,'Lebanon','LB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (117,'Lesotho','LS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (118,'Liberia','LR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (119,'Libya','LY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (120,'Liechtenstein','LI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (121,'Lithuania','LT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (122,'Luxembourg','LU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (123,'Macau','MO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (124,'Macedonia','MK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (125,'Madagascar','MG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (126,'Malaysia','MY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (127,'Malawi','MW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (128,'Maldives','MV',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (129,'Mali','ML',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (130,'Malta','MT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (131,'Marshall Islands','MH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (132,'Martinique','MQ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (133,'Mauritania','MR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (134,'Mauritius','MU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (135,'Mexico','MX',1,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (136,'Micronesia','FM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (137,'Moldova','MD',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (138,'Monaco','MC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (139,'Mongolia','MN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (140,'Montserrat','MS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (141,'Morocco','MA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (142,'Mozambique','MZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (143,'Nauru','NR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (144,'Namibia','NA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (145,'Nepal','NP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (146,'Netherlands','NL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (147,'Netherlands Antilles','AN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (148,'New Caledonia','NC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (149,'New Zealand','NZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (150,'Nicaragua','NI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (151,'Niger','NE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (152,'Nigeria','NG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (153,'Niue','NU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (154,'Norman Island(British Virgin Islands)','VG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (155,'Northern Ireland(United Kingdom)','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (156,'Northern Mariana Islands','MP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (157,'Norway','NO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (158,'Oman','OM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (159,'Pakistan','PK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (160,'Paraguay','PY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (161,'Palau','PW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (162,'Palestine','PS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (163,'Panama','PA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (164,'Papua New Guinea','PG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (165,'Peru','PE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (166,'Philippines','PH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (167,'Poland','PL',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (168,'Portugal','PT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (169,'Puerto Rico','PR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (170,'Qatar','QA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (171,'Reunion','RE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (172,'Romania','RO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (173,'Rota(Northern Mariana Islands)','MP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (174,'Russia','RU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (175,'Rwanda','RW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (176,'Saba(Netherlands Antilles)','AN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (177,'Saipan(Northern Mariana Islands)','MP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (178,'Samoa','WS',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (179,'San Marino(Italy)','IT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (180,'Saudi Arabia','SA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (181,'Scotland(United Kingdom)','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (182,'Senegal','SN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (183,'Serbia and Montenegro','YU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (184,'Seychelles','SC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (185,'Singapore','SG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (186,'Slovak Republic','SK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (187,'Slovenia','SI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (188,'Solomon Islands','SB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (189,'South Africa','ZA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (190,'South Korea','KR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (191,'Spain','ES',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (192,'Sri Lanka','LK',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (193,'St. Barthelemy(Guadeloupe)','GP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (194,'St. Christopher(St. Kitts And Nevis)','KN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (195,'St. Croix Island(U S Virgin Islands)','VI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (196,'St. Eustatius(Netherlands Antilles)','AN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (197,'St. John(U S Virgin Islands)','VI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (198,'St. Kitts And Nevis','KN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (199,'St. Lucia','LC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (200,'St. Maarten(Netherlands Antilles)','AN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (201,'St. Thomas(U S Virgin Islands)','VI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (202,'St. Vincent','VC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (203,'Suriname','SR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (204,'Swaziland','SZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (205,'Sweden','SE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (206,'Switzerland','CH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (207,'Syria','SY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (208,'Tahiti(French Polynesia)','PF',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (209,'Taiwan','TW',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (210,'Tanzania','TZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (211,'Thailand','TH',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (212,'Tinian(Northern Mariana Islands)','MP',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (213,'Togo','TG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (214,'Tonga','TO',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (215,'Tortola Island(British Virgin Islands)','VG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (216,'Trinidad \+ Tobago','TT',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (217,'Tunisia','TN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (218,'Turkey','TR',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (219,'Turkmenistan','TM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (220,'Turks And Caicos Islands','TC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (221,'Tuvalu','TV',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (222,'United Arab Emirates','AE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (223,'U S Virgin Islands','VI',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (224,'Uganda','UG',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (225,'Ukraine','UA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (226,'Union Island(St. Vincent)','VC',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (227,'United Kingdom','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (228,'United States','US',1,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (229,'Uruguay','UY',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (230,'Uzbekistan','UZ',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (231,'Vanuatu','VU',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (232,'Vatican City(Italy)','VA',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (233,'Venezuela','VE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (234,'Vietnam','VN',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (235,'Wales(United Kingdom)','GB',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (236,'Wallis \+ Futuna Islands','WF',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (237,'Yemen','YE',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (238,'Zambia','ZM',NULL,NULL);

INSERT INTO `country`
           (`country_id`,
            `short_description`,
            `abbreviation`,
            `state_flag`,
            `province_flag`)
VALUES     (239,'Zimbabwe','ZW',NULL,NULL);

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (1,228,'Alabama','AL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (2,228,'Alaska','AK');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (3,228,'Arizona','AZ');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (4,228,'Arkansas','AR');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (5,228,'California','CA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (6,228,'Colorado','CO');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (7,228,'Connecticut','CT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (8,228,'Delaware','DE');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (9,228,'District of Columbia','DC');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (10,228,'Florida','FL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (11,228,'Georgia','GA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (12,228,'Hawaii','HI');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (13,228,'Idaho','ID');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (14,228,'Illinois','IL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (15,228,'Indiana','IN');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (16,228,'Iowa','IA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (17,228,'Kansas','KS');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (18,228,'Kentucky','KY');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (19,228,'Louisiana','LA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (20,228,'Maine','ME');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (21,228,'Maryland','MD');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (22,228,'Massachusetts','MA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (23,228,'Michigan','MI');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (24,228,'Minnesota','MN');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (25,228,'Mississippi','MS');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (26,228,'Missouri','MO');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (27,228,'Montana','MT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (28,228,'Nebraska','NE');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (29,228,'Nevada','NV');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (30,228,'New Hampshire','NH');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (31,228,'New Jersey','NJ');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (32,228,'New Mexico','NM');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (33,228,'New York','NY');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (34,228,'North Carolina','NC');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (35,228,'North Dakota','ND');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (36,228,'Ohio','OH');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (37,228,'Oklahoma','OK');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (38,228,'Oregon','OR');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (39,228,'Pennsylvania','PA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (40,228,'Rhode Island','RI');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (41,228,'South Carolina','SC');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (42,228,'South Dakota','SD');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (43,228,'Tennessee','TN');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (44,228,'Texas','TX');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (45,228,'Utah','UT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (46,228,'Vermont','VT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (47,228,'Virginia','VA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (48,228,'Washington','WA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (49,228,'West Virginia','WV');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (50,228,'Wisconsin','WI');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (51,228,'Wyoming','WY');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (52,38,'Alberta','AB');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (53,38,'British Columbia','BC');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (54,38,'Manitoba','MB');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (55,38,'New Brunswick','NB');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (56,38,'Newfoundland','NF');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (57,38,'Northwest Territories / Nunavut','NT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (58,38,'Nova Scotia','NS');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (59,38,'Ontario','ON');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (60,38,'Prince Edward Island','PE');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (61,38,'Quebec','PQ');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (62,38,'Saskatchewan','SK');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (63,38,'Yukon','YT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (64,135,'Aguascalientes','AG');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (65,135,'Baja California Norte','BC');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (66,135,'Baja California Sur','BS');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (67,135,'Chihuahua','CH');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (68,135,'Colima','CL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (69,135,'Campeche','CM');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (70,135,'Coahuila','CO');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (71,135,'Chiapas','CS');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (72,135,'Distrito Federal','DF');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (73,135,'Durango','DG');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (74,135,'Guerrero','GR');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (75,135,'Guanajuato','GT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (76,135,'Hidalgo','HG');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (77,135,'Jalisco','JA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (78,135,'Michoacan','MI');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (79,135,'Morelos','MO');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (80,135,'Estado de Mexico','MX');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (81,135,'Nayarit','NA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (82,135,'Nuevo Leon','NL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (83,135,'Oaxaca','OA');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (84,135,'Puebla','PU');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (85,135,'Quintana Roo','QR');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (86,135,'Queretaro','QT');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (87,135,'Sinaloa','SI');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (88,135,'San Luis Potosi','SL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (89,135,'Sonora','SO');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (90,135,'Tabasco','TB');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (91,135,'Tlaxcala','TL');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (92,135,'Tamaulipas','TM');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (93,135,'Veracruz','VE');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (94,135,'Yucatan','YU');

INSERT INTO `state_province`
           (`state_province_id`,
            `country_id`,
            `short_description`,
            `abbreviation`)
VALUES     (95,135,'Zacatecas','ZA');

INSERT INTO `courier`
           (`courier_id`,
            `short_description`,
            `active_flag`)
VALUES     (1,'FedEx',1);

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('Other packaging',1,'01');

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('FedEx Pak',1,'02');

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('FedEx Box',1,'03');

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('FedEx Tube',1,'04');

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('FedEx Envelope',1,'06');

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('FedEx 10kg Box',1,'15');

INSERT INTO `package_type`
           (`short_description`,
            `courier_id`,
            `value`)
VALUES     ('FedEx 25kg Box',1,'25');

INSERT INTO weight_unit
           (`weight_unit_id`,
            `short_description`)
VALUES     (1,'LBS');

INSERT INTO weight_unit
           (`weight_unit_id`,
            `short_description`)
VALUES     (2,'KGS');

INSERT INTO `length_unit`
           (`length_unit_id`,
            `short_description`)
VALUES     (1,'in');

INSERT INTO `length_unit`
           (`length_unit_id`,
            `short_description`)
VALUES     (2,'cm');

INSERT INTO currency_unit
           (`currency_unit_id`,
            `short_description`,
            `symbol`)
VALUES     (1,'USD','\+#36;');

INSERT INTO currency_unit
           (`currency_unit_id`,
            `short_description`,
            `symbol`)
VALUES     (2,'GBP','\+#163;');

INSERT INTO currency_unit
           (`currency_unit_id`,
            `short_description`,
            `symbol`)
VALUES     (3,'EUR','\+#128;');

INSERT INTO role
           (role_id,
            short_description,
            long_description,
            created_by,
            creation_date)
VALUES     (1,'Administrator','Administrator account will access to everything',
            1,NOW());
            
INSERT INTO module
           (`module_id`,
            `short_description`)
VALUES     (1,'home'),
           (2,'assets'),
           (3,'inventory'),
           (4,'contacts'),
           (5,'shipping'),
           (6,'receiving'),
           (7,'reports');

INSERT INTO `role_module`
           (`role_module_id`,
            `role_id`,
            `module_id`,
            `access_flag`)
VALUES     (1,1,1,1),
           (2,1,2,1),
           (3,1,3,1),
           (4,1,4,1),
           (5,1,5,1),
           (6,1,6,1),
           (7,1,7,1);

INSERT INTO authorization
           (`authorization_id`,
            `short_description`)
VALUES     (1,'view'),
           (2,'edit'),
           (3,'delete');

INSERT INTO authorization_level
           (`authorization_level_id`,
            `short_description`)
VALUES     (1,'all'),
           (2,'owner'),
           (3,'none');

INSERT INTO `role_module_authorization`
           (`role_module_authorization_id`,
            `role_module_id`,
            `authorization_id`,
            `authorization_level_id`)
VALUES     (1,1,1,1),
           (2,1,2,1),
           (3,1,3,1),
           (4,2,1,1),
           (5,2,2,1),
           (6,2,3,1),
           (7,3,1,1),
           (8,3,2,1),
           (9,3,3,1),
           (10,4,1,1),
           (11,4,2,1),
           (12,4,3,1),
           (13,5,1,1),
           (14,5,2,1),
           (15,5,3,1),
           (16,6,1,1),
           (17,6,2,1),
           (18,6,3,1),
           (19,7,1,1),
           (20,7,2,1),
           (21,7,3,1);

INSERT INTO `role_entity_qtype_built_in_authorization` (`role_entity_built_in_id`, `role_id`, `entity_qtype_id`, `authorization_id`, `authorized_flag`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 1, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(2, 1, 1, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(3, 1, 4, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(4, 1, 4, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(5, 1, 2, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(6, 1, 2, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(7, 1, 7, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(8, 1, 7, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(9, 1, 8, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(10, 1, 8, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(11, 1, 9, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(12, 1, 9, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(13, 1, 10, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(14, 1, 10, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(15, 1, 11, 1, 1, 1, '2008-07-11 22:14:47', NULL, NULL),
(16, 1, 11, 2, 1, 1, '2008-07-11 22:14:47', NULL, NULL);

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (1,'company_id');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (2,'image_upload_prefix');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (3,'fedex_gateway_URI');

INSERT INTO `admin_setting`
           (setting_id,
            short_description,
            VALUE)
VALUES     (4,'company_logo','empty.gif');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (5,'packing_list_terms');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (6,'packing_list_logo');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (7,'min_asset_code');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (8,'fedex_account_id');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (9,'autodetect_tracking_numbers');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (10,'custom_shipment_numbers');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (11,'custom_receipt_numbers');

INSERT INTO `admin_setting`
           (setting_id,
            short_description)
VALUES     (12,'receive_to_last_location');

INSERT INTO `admin_setting`
           (setting_id,
            short_description,
            VALUE)
VALUES     (13,'portable_pin_required','1');

INSERT INTO fedex_service_type
           (`fedex_service_type_id`,
            `short_description`,
            `value`)
VALUES     (1,'Express Priority Overnight','01');

INSERT INTO fedex_service_type
           (`fedex_service_type_id`,
            `short_description`,
            `value`)
VALUES     (2,'Express Economy Two Day','03');

INSERT INTO fedex_service_type
           (`fedex_service_type_id`,
            `short_description`,
            `value`)
VALUES     (3,'Express Standard Overnight','05');

INSERT INTO fedex_service_type
           (`fedex_service_type_id`,
            `short_description`,
            `value`)
VALUES     (4,'Express First Overnight','06');

INSERT INTO fedex_service_type
           (`fedex_service_type_id`,
            `short_description`,
            `value`)
VALUES     (5,'Express Saver','20');

INSERT INTO fedex_service_type
           (`fedex_service_type_id`,
            `short_description`,
            `value`)
VALUES     (6,'FedEx Ground Service','92');

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,2,'Create Asset Model','../assets/asset_model_edit.php','asset_model_create.png',4,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,1,'Asset Models','../assets/asset_model_list.php','asset_model.png',4,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,2,'Create Asset','../assets/asset_edit.php','asset_create.png',1,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,1,'Assets','../assets/asset_list.php','asset.png',1,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,2,'Move Assets','../assets/asset_edit.php?intTransactionTypeId=1',
            'asset_move.png',1,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,2,'Check Out Assets','../assets/asset_edit.php?intTransactionTypeId=3',
            'asset_checkout.png',1,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,2,'Check In Assets','../assets/asset_edit.php?intTransactionTypeId=2',
            'asset_checkin.png',1,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (2,2,'Reserve Assets','../assets/asset_edit.php?intTransactionTypeId=8',
            'asset_reserve.png',1,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (3,2,'Create Inventory','../inventory/inventory_edit.php','inventory_create.png',2,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (3,1,'Inventory','../inventory/inventory_model_list.php','inventory.png',2,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (3,2,'Move Inventory','../inventory/inventory_edit.php?intTransactionTypeId=1',
            'inventory_move.png',2,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (3,2,'Take Out Inventory','../inventory/inventory_edit.php?intTransactionTypeId=5',
            'inventory_takeout.png',2,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (3,2,'Restock Inventory','../inventory/inventory_edit.php?intTransactionTypeId=4',
            'inventory_restock.png',2,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (4,2,'Create Company','../contacts/company_edit.php','company_create.png',7,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (4,1,'Companies','../contacts/company_list.php','company.png',7,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (4,2,'Create Contact','../contacts/contact_edit.php','contact_create.png',8,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (4,1,'Contacts','../contacts/contact_list.php','contact.png',8,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (5,2,'Schedule Shipment','../shipping/shipment_edit.php','shipment_schedule.png',10,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (5,1,'Shipments','../shipping/shipment_list.php','shipment.png',10,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (6,2,'Schedule Receipt','../receiving/receipt_edit.php','receipt_schedule.png',11,1);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (6,1,'Receipts','../receiving/receipt_list.php','receipt.png',11,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (7,1,'Asset Audit Reports','../reports/asset_audit_list.php','receipt.png',1,0);

INSERT INTO shortcut
           (module_id,
            authorization_id,
            short_description,
            link,
            image_path,
            entity_qtype_id,
            create_flag)
VALUES     (7,1,'Inventory Audit Reports','../reports/inventory_audit_list.php','receipt.png',2,0);

SET FOREIGN_KEY_CHECKS = 1;
