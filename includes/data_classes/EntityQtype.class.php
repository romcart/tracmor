<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
	require(__DATAGEN_CLASSES__ . '/EntityQtypeGen.class.php');

	/**
	 * The EntityQtype class defined here contains any
	 * customized code for the EntityQtype enumerated type. 
	 * 
	 * It represents the enumerated values found in the "entity_qtype" table in the database,
	 * and extends from the code generated abstract EntityQtypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package Application
	 * @subpackage DataObjects
	 */
	abstract class EntityQtype extends EntityQtypeGen {
		
		/**
		 * This function returns the SQL necessary to select an entitie's primary key based on the EntityQtypeId
		 * This will not work for the GenerateSql function in CustomField.class.php because of the difference in the ``
		 *
		 * @param integer $intEntityQtypeId
		 * @return sting $strPrimaryKeySql
		 */
		public static function ToStringPrimaryKeySql($intEntityQtypeId) {
			
			$strTable = EntityQtype::ToStringTable($intEntityQtypeId);
			$strToReturn = sprintf('`%s`.`%s_id`', $strTable, $strTable);
			
			return $strToReturn;
		}
		
		/**
		 * This function returns the name of the table based on the EntityQtypeId
		 *
		 * @param integer $intEntityQtypeId
		 * @return string $strToReturn table name
		 */
		public static function ToStringTable($intEntityQtypeId) {
			
			$strToReturn = '';
			
			switch ($intEntityQtypeId) {
				case 1: $strToReturn = 'asset';
					break;
				case 2: $strToReturn = 'inventory_model';
					break;
				case 4: $strToReturn = 'asset_model';
					break;
				case 5: $strToReturn = 'manufacturer';
					break;
				case 6: $strToReturn = 'category';
					break;
				case 7: $strToReturn = 'company';
					break;
				case 8: $strToReturn = 'contact';
					break;
				case 9: $strToReturn = 'address';
					break;
				case 10: $strToReturn = 'shipment';
					break;
				case 11: $strToReturn = 'receipt';
					break;
				
				default:
					throw new Exception('Not a valid EntityQtypeId.');
			}
			
			return $strToReturn;
		}
	}
?>