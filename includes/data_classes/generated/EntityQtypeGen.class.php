<?php
	/**
	 * The EntityQtype class defined here contains
	 * code for the EntityQtype enumerated type.  It represents
	 * the enumerated values found in the "entity_qtype" table
	 * in the database.
	 * 
	 * To use, you should use the EntityQtype subclass which
	 * extends this EntityQtypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EntityQtype class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class EntityQtypeGen extends QBaseClass {
		const Asset = 1;
		const Inventory = 2;
		const AssetInventory = 3;
		const AssetModel = 4;
		const Manufacturer = 5;
		const Category = 6;
		const Company = 7;
		const Contact = 8;
		const Address = 9;
		const Shipment = 10;
		const Receipt = 11;

		const MaxId = 11;

		public static $NameArray = array(
			1 => 'Asset',
			2 => 'Inventory',
			3 => 'AssetInventory',
			4 => 'AssetModel',
			5 => 'Manufacturer',
			6 => 'Category',
			7 => 'Company',
			8 => 'Contact',
			9 => 'Address',
			10 => 'Shipment',
			11 => 'Receipt');

		public static $TokenArray = array(
			1 => 'Asset',
			2 => 'Inventory',
			3 => 'AssetInventory',
			4 => 'AssetModel',
			5 => 'Manufacturer',
			6 => 'Category',
			7 => 'Company',
			8 => 'Contact',
			9 => 'Address',
			10 => 'Shipment',
			11 => 'Receipt');

		public static function ToString($intEntityQtypeId) {
			switch ($intEntityQtypeId) {
				case 1: return 'Asset';
				case 2: return 'Inventory';
				case 3: return 'AssetInventory';
				case 4: return 'AssetModel';
				case 5: return 'Manufacturer';
				case 6: return 'Category';
				case 7: return 'Company';
				case 8: return 'Contact';
				case 9: return 'Address';
				case 10: return 'Shipment';
				case 11: return 'Receipt';
				default:
					throw new QCallerException(sprintf('Invalid intEntityQtypeId: %s', $intEntityQtypeId));
			}
		}

		public static function ToToken($intEntityQtypeId) {
			switch ($intEntityQtypeId) {
				case 1: return 'Asset';
				case 2: return 'Inventory';
				case 3: return 'AssetInventory';
				case 4: return 'AssetModel';
				case 5: return 'Manufacturer';
				case 6: return 'Category';
				case 7: return 'Company';
				case 8: return 'Contact';
				case 9: return 'Address';
				case 10: return 'Shipment';
				case 11: return 'Receipt';
				default:
					throw new QCallerException(sprintf('Invalid intEntityQtypeId: %s', $intEntityQtypeId));
			}
		}

	}
?>