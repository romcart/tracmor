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
	require(__DATAGEN_CLASSES__ . '/InventoryTransactionGen.class.php');

	/**
	 * The InventoryTransaction class defined here contains any
	 * customized code for the InventoryTransaction class in the
	 * Object Relational Model.  It represents the "inventory_transaction" table 
	 * in the database, and extends from the code generated abstract InventoryTransactionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class InventoryTransaction extends InventoryTransactionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objInventoryTransaction->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('InventoryTransaction Object %s',  $this->intInventoryTransactionId);
		}
		
		/**
		 * Returns a string denoting status of InventoryTransaction
		 *
		 * @return string either 'Received' or 'Pending'
		 */
		public function __toStringStatus() {
			if ($this->blnReturnReceivedStatus()) {
				$strToReturn = 'Received';
			}
			else {
				$strToReturn = 'Pending';
			}
			return sprintf('%s', $strToReturn);
		}
		
		/**
		 * Returns the SourceLocation of an InventoryTransaction if it exists
		 * This was created in case an InventoryTransaction does not have a SourceLocation - it would generate an error in a datagrid 
		 *
		 * @return string SourceLocation Short Description
		 */		
		public function __toStringSourceLocation() {
			if ($this->intSourceLocationId) {
				$strToReturn = $this->SourceLocation->__toString();
			}
			else {
				$strToReturn = null;
			}
			return sprintf('%s', $strToReturn);
		}
		
		/**
		 * Returns the DestinationLocation of an InventoryTransaction if it exists
		 * This was created because Pending Receipts do not have a Destination Location
		 *
		 * @return string DestinationLocation Short Description
		 */		
		public function __toStringDestinationLocation() {
			if ($this->intDestinationLocationId) {
				$strToReturn = $this->DestinationLocation->__toString();
			}
			else {
				$strToReturn = null;
			}
			return sprintf('%s', $strToReturn);
		}		
		
		/**
		 * Returns a boolean value - false if DestinationLocation is empty, true if it is not
		 * InventoryTransactions with an empty DestinationLocation are Pending Receipts
		 *
		 * @return bool
		 */		
		public function blnReturnReceivedStatus() {
			if ($this->DestinationLocation) {
				return true;
			}
			else {
				return false;
			}
		}
		
		// This adds the created by and creation date before saving a new InventoryTransaction
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
			}
			parent::Save($blnForceInsert, $blnForceUpdate);
		}		

		/**
		 * Load an array of InventoryTransaction objects,
		 * by Inventory ModelId
		 * @param integer $intInventoryModelId
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayByInventoryModelId($intInventoryModelId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryTransaction::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intInventoryModelId = $objDatabase->SqlVariable($intInventoryModelId, true);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`inventory_transaction`.`inventory_transaction_id` AS `inventory_transaction_id`,
					`inventory_transaction`.`inventory_location_id` AS `inventory_location_id`,
					`inventory_transaction`.`transaction_id` AS `transaction_id`,
					`inventory_transaction`.`quantity` AS `quantity`,
					`inventory_transaction`.`source_location_id` AS `source_location_id`,
					`inventory_transaction`.`destination_location_id` AS `destination_location_id`
					%s
				FROM
					`inventory_location` AS `inventory_location`,
					`inventory_transaction` AS `inventory_transaction`
					%s
				WHERE
					`inventory_location`.`inventory_model_id` %s
					AND `inventory_location`.`inventory_location_id` = `inventory_transaction`.`inventory_location_id`
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intInventoryModelId,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return InventoryTransaction::InstantiateDbResult($objDbResult);
		}
		
		/**
		 * Count InventoryTransactions
		 * by InventoryModelId Index(es)
		 * @param integer $intInventoryModelId
		 * @return int
		*/
		public static function CountByInventoryModelId($intInventoryModelId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryTransaction::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intInventoryModelId = $objDatabase->SqlVariable($intInventoryModelId, true);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					COUNT(inventory_transaction.inventory_transaction_id) AS row_count
				FROM
					`inventory_location`,
					`inventory_transaction`
				WHERE
					`inventory_location`.`inventory_model_id` %s
					AND `inventory_location`.`inventory_location_id` = `inventory_transaction`.`inventory_location_id`', $intInventoryModelId);

			// Perform the Query and Return the Count
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}		
		
	}
?>