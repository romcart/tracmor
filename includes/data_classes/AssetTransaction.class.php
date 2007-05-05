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
	require(__DATAGEN_CLASSES__ . '/AssetTransactionGen.class.php');

	/**
	 * The AssetTransaction class defined here contains any
	 * customized code for the AssetTransaction class in the
	 * Object Relational Model.  It represents the "asset_transaction" table 
	 * in the database, and extends from the code generated abstract AssetTransactionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class AssetTransaction extends AssetTransactionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAssetTransaction->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('AssetTransaction Object %s',  $this->intAssetTransactionId);
		}
		
		/**
		 * Returns the HTML needed for the shipment asset transaction datagrid to show icons marking transactions with scheduled returns or exchanges
		 * It will return an empty string if it does not meet any of the specifications above.
		 *
		 * @param QDatagrid Object $objControl
		 * @return string
		 */
		public function ToStringHoverTips($objControl) {
			if ($this->blnScheduleReceiptFlag && $this->blnNewAssetFlag) {
				$lblExchangeImage = new QLabelExt($objControl);
				$lblExchangeImage->HtmlEntities = false;
				$lblExchangeImage->Text = sprintf('<img src="%s/icons/receipt_datagrid.png" style="vertical-align:middle;">', __IMAGE_ASSETS__);
				
				if ($this->NewAsset instanceof Asset && $this->NewAsset->AssetCode) {
					$strAssetCode = $this->NewAsset->AssetCode;
				}
				else {
					$strAssetCode = 'Auto Generated';
				}
				
				$objHoverTip = new QHoverTip($lblExchangeImage);
				$objHoverTip->Text = sprintf('Exchange Scheduled: %s', $strAssetCode);
				$lblExchangeImage->HoverTip = $objHoverTip;
				$strToReturn = $lblExchangeImage->Render(false);
			}
			
			elseif ($this->blnScheduleReceiptFlag && !$this->blnNewAssetFlag) {
				$lblReturnImage = new QLabelExt($objControl);
				$lblReturnImage->HtmlEntities = false;
				$lblReturnImage->Text = sprintf('<img src="%s/icons/receipt_datagrid.png" style="vertical-align:middle;">', __IMAGE_ASSETS__);
				
				$objHoverTip = new QHoverTip($lblReturnImage);
				$objHoverTip->Text = 'Return Scheduled';
				$lblReturnImage->HoverTip = $objHoverTip;
				$strToReturn = $lblReturnImage->Render(false);		
			}	
			else {
				$strToReturn = '';
			}

			return $strToReturn;
		}		
		
		/**
		 * Returns a string denoting status of AssetTransaction
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
		 * Returns the SourceLocation of an AssetTransaction if it exists
		 * This was created in case an AssetTransaction does not have a SourceLocation - it would generate an error in a datagrid 
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
		 * Returns the DestinationLocation of an AssetTransaction if it exists
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
		 * AssetTransactions with an empty DestinationLocation are Pending Receipts
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
		
		// This adds the created by and creation date before saving a new AssetTransaction
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
		 * Return a boolean if there is a pending transaction
		 * @param integer $intAssetId
		 * @return bool
		 */
		public static function PendingTransaction($intAssetId) {
			
			if ($objPendingShipment = AssetTransaction::PendingShipment($intAssetId) || $objPendingReceipt = AssetTransaction::PendingReceipt($intAssetId)) {
				return true;
			}
			else {
				return false;
			}
		}
		
		/**
		 * Load a Pending Receipt AssetTransaction
		 * Checks for any AssetTransaction where the source_location_id is 5 (to be received) and the destination is NULL (still pending)
		 * @param integer $intAssetId
		 * @return AssetTransaction
		*/
		public static function PendingReceipt($intAssetId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			AssetTransaction::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intAssetId = $objDatabase->SqlVariable($intAssetId);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`asset_transaction_id`,
					`asset_id`,
					`transaction_id`,
					`source_location_id`,
					`destination_location_id`
				FROM
					`asset_transaction`
				WHERE
					`asset_id` = %s
					AND (`source_location_id` = 5 OR `source_location_id` = 2)
					AND `destination_location_id` IS NULL', $intAssetId);

			// Perform the Query and Instantiate the Row
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetTransaction::InstantiateDbRow($objDbResult->GetNextRow());
		}
		
		/**
		 * Load a Pending Shipment AssetTransaction
		 * Checks for any AssetTransaction where the source_location_id > 5 (any custom created location) and the destination is NULL (still pending)
		 * @param integer $intAssetIed
		 * @return AssetTransaction
		*/
		public static function PendingShipment($intAssetId) {
			// Call to QueryHelper to Get Database Object and Get SQL Clauses
			AssetTransaction::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intAssetId = $objDatabase->SqlVariable($intAssetId);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`asset_transaction_id`,
					`asset_id`,
					`transaction_id`,
					`source_location_id`,
					`destination_location_id`
				FROM
					`asset_transaction`
				WHERE
					`asset_id` = %s
					AND `source_location_id` > 5
					AND `destination_location_id` IS NULL', $intAssetId);

			// Perform the Query and Instantiate the Row
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetTransaction::InstantiateDbRow($objDbResult->GetNextRow());
		}
		
		/**
		 * Determine if a transaction has been conducted after the current AssetTransaction
		 * @return object AssetTransaction
		 */
		public function NewerTransaction() {
			
			$objNewerAssetTransaction = AssetTransaction::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::AssetTransaction()->AssetId, $this->AssetId), QQ::GreaterOrEqual(QQN::AssetTransaction()->CreationDate, $this->CreationDate), QQ::NotEqual(QQN::AssetTransaction()->AssetTransactionId, $this->AssetTransactionId)));
			return $objNewerAssetTransaction;
		}
		
		/**
		 * Count AssetTransactions
		 * by AssetId Index(es), but only those transactions that are Shipments or Receipts
		 * @param integer $intAssetId
		 * @param boolean $blnInclude - include only shipments and receipts or all other transactions
		 * @return int
		*/
		public static function CountShipmentReceiptByAssetId($intAssetId, $blnInclude = true) {
			// Call AssetTransaction::QueryCount to perform the CountByAssetId query
			if ($blnInclude) {
				$arrToReturn = AssetTransaction::QueryCount(
					QQ::AndCondition(
						QQ::Equal(QQN::AssetTransaction()->AssetId, $intAssetId),
						QQ::OrCondition(
							QQ::Equal(QQN::AssetTransaction()->Transaction->TransactionTypeId, 6),
							QQ::Equal(QQN::AssetTransaction()->Transaction->TransactionTypeId, 7)
						)
					)
				);
			}
			else {
				$arrToReturn = AssetTransaction::QueryCount(
					QQ::AndCondition(
						QQ::Equal(QQN::AssetTransaction()->AssetId, $intAssetId),
						QQ::NotEqual(QQN::AssetTransaction()->Transaction->TransactionTypeId, 6),
						QQ::NotEqual(QQN::AssetTransaction()->Transaction->TransactionTypeId, 7)
					)
				);
			}
			
			return $arrToReturn;
		}
	}
?>