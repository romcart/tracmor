<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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
	require(__DATAGEN_CLASSES__ . '/TransactionTypeGen.class.php');

	/**
	 * The TransactionType class defined here contains any
	 * customized code for the TransactionType class in the
	 * Object Relational Model.  It represents the "transaction_type" table 
	 * in the database, and extends from the code generated abstract TransactionTypeGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Application
	 * @subpackage DataObjects
	 * 
	 */
	class TransactionType extends TransactionTypeGen {
		/**
		 * Default "to string" handler
		 * Allows pages to "echo" or "print" this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTransactionType->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			// return sprintf('TransactionType Object %s',  $this->intTransactionTypeId);
			return $this->strShortDescription;
		}
		
		/**
		 * Load all TransactionTypes
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return TransactionType[]
		*/
		public static function LoadArrayByAssetFlag($blnAssetFlag, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			TransactionType::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			$blnAssetFlag = $objDatabase->SqlVariable($blnAssetFlag, true);
			
			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`transaction_type`.`transaction_type_id` AS `transaction_type_id`,
					`transaction_type`.`short_description` AS `short_description`,
					`transaction_type`.`asset_flag` AS `asset_flag`,
					`transaction_type`.`inventory_flag` AS `inventory_flag`
					%s
				FROM
					`transaction_type` AS `transaction_type`
					%s
				WHERE
					`asset_flag` %s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$blnAssetFlag, 
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return TransactionType::InstantiateDbResult($objDbResult);
		}
	}
?>