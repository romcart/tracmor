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
	require(__DATAGEN_CLASSES__ . '/InventoryLocationGen.class.php');

	/**
	 * The InventoryLocation class defined here contains any
	 * customized code for the InventoryLocation class in the
	 * Object Relational Model.  It represents the "inventory_location" table 
	 * in the database, and extends from the code generated abstract InventoryLocationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class InventoryLocation extends InventoryLocationGen {
		
		protected $intTransactionQuantity;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objInventoryLocation->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return $this->Location->__toString();
		}
		
		public function __toStringWithQuantity() {
			return sprintf('%s (%s)', $this->Location->__toString(), $this->Quantity);
		}
		
		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
		
		/**
		 * Load a InventoryLocation from PK Info
		 * @param integer $intInventoryLocationId
		 * @return InventoryLocation
		*/
		public static function LoadLocations($intInventoryLocationId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryLocation::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intInventoryLocationId = $objDatabase->SqlVariable($intInventoryLocationId);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`inventory_location_id`,
					`inventory_model_id`,
					`location_id`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					`modified_date`,
					`inventory_location`.`quantity` AS `__actual_quantity`,
					(`inventory_location`.`quantity` - IFNULL((SELECT SUM(`inventory_transaction`.`quantity`) AS `pending_quantity` FROM `inventory_transaction` AS `inventory_transaction` WHERE `inventory_transaction`.`inventory_location_id` = `inventory_location`.`inventory_location_id` AND `inventory_transaction`.`source_location_id` > 5 AND `inventory_transaction`.`destination_location_id` IS NULL), 0)) AS `quantity`
				FROM
					`inventory_location`
				WHERE
					`inventory_location_id` = %s', $intInventoryLocationId);

			// Perform the Query and Instantiate the Row
			$objDbResult = $objDatabase->Query($strQuery);
			return InventoryLocation::InstantiateDbRow($objDbResult->GetNextRow());
		}		
		
		/**
		 * Load an array of InventoryLocation objects,
		 * by LocationId and InventoryModelId Index(es)
		 * @param integer $intLocationId
		 * @param integer $intInventoryModelId
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return InventoryLocation[]
		*/
		public static function LoadByLocationIdInventoryModelId($intLocationId, $intInventoryModelId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryLocation::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intLocationId = $objDatabase->SqlVariable($intLocationId, true);
			$intInventoryModelId = $objDatabase->SqlVariable($intInventoryModelId, true);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`inventory_location`.`inventory_location_id` AS `inventory_location_id`,
					`inventory_location`.`inventory_model_id` AS `inventory_model_id`,
					`inventory_location`.`location_id` AS `location_id`,
					`inventory_location`.`quantity` AS `quantity`,
					`inventory_location`.`created_by` AS `created_by`,
					`inventory_location`.`creation_date` AS `creation_date`,
					`inventory_location`.`modified_by` AS `modified_by`,
					`inventory_location`.`modified_date` AS `modified_date`
					%s
				FROM
					`inventory_location` AS `inventory_location`
					%s
				WHERE
					`inventory_location`.`location_id` %s
					AND `inventory_location`.`inventory_model_id` %s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intLocationId, $intInventoryModelId,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return InventoryLocation::InstantiateDbRow($objDbResult->GetNextRow());
		}
		
		
		/**
		 * Load an array of InventoryLocation objects,
		 * by InventoryModelId Index(es)
		 * @param integer $intInventoryModelId
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return InventoryLocation[]
		*/
		public static function LoadArrayByInventoryModelIdLocations($intInventoryModelId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryLocation::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intInventoryModelId = $objDatabase->SqlVariable($intInventoryModelId, true);
			
			// This query subtracts any inventory that is pending shipment. That is inventory that has been added to a shipment but the shipment hasn't been included.
			// This pending inventory is the sum of the quantites in InventoryTransaction where the SourceLocation is anything greated than 5 (a custom location) and the Destination IS NULL (incomplete transaction)
			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`inventory_location`.`inventory_location_id` AS `inventory_location_id`,
					`inventory_location`.`inventory_model_id` AS `inventory_model_id`,
					`inventory_location`.`location_id` AS `location_id`,
					`inventory_location`.`created_by` AS `created_by`,
					`inventory_location`.`creation_date` AS `creation_date`,
					`inventory_location`.`modified_by` AS `modified_by`,
					`inventory_location`.`modified_date` AS `modified_date`,
					`inventory_location`.`quantity` AS `__actual_quantity`,
					(`inventory_location`.`quantity` - IFNULL((SELECT SUM(`inventory_transaction`.`quantity`) AS `pending_quantity` FROM `inventory_transaction` AS `inventory_transaction` WHERE `inventory_transaction`.`inventory_location_id` = `inventory_location`.`inventory_location_id` AND `inventory_transaction`.`source_location_id` > 5 AND `inventory_transaction`.`destination_location_id` IS NULL), 0)) AS `quantity`
					%s
				FROM
					`inventory_location` AS `inventory_location`
					%s
				WHERE
					`inventory_location`.`inventory_model_id` %s
					AND `inventory_location`.`location_id` > 5
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intInventoryModelId,
				$strOrderBy, $strLimitSuffix);
				
			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return InventoryLocation::InstantiateDbResult($objDbResult);
		}
		
		/**
		 * Count InventoryLocations
		 * by InventoryModelId Index(es)
		 * @param integer $intInventoryModelId
		 * @return int
		*/
		public static function CountByInventoryModelIdLocations($intInventoryModelId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			InventoryLocation::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intInventoryModelId = $objDatabase->SqlVariable($intInventoryModelId, true);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					COUNT(*) AS row_count
				FROM
					`inventory_location`
				WHERE
					`inventory_model_id` %s
					AND `inventory_location`.`location_id` > 5', $intInventoryModelId);

			// Perform the Query and Return the Count
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}
		
		// This adds the created by and creation date before saving a new shipping account
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
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 * Overridden to add intTransactionQuantity
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'intTransactionQuantity':
					/**
					 * Gets the value for intTransactionQuantity
					 * @return integer
					 */
					return $this->intTransactionQuantity;
					
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}		
		
			/**
	 * Override method to perform a property "Set"
	 * This will set the property $strName to be $mixValue
	 * Overridden to add $intTransactionQuantity
	 *
	 * @param string $strName Name of the property to set
	 * @param string $mixValue New value of the property
	 * @return mixed
	 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'intTransactionQuantity':
					/**
					 * Sets the value for intQuantity (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTransactionQuantity = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}		
		
	}
?>