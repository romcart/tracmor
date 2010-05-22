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

		/**
		 * Load an array of objAssetTransactions
		 * @param $blnReturnStrQuery - true/false (return strSqlQuery / return objAssetTransaction[])
		 * @param $strAssetModel
		 * @param $strAssetCode
		 * @param $strAssetModelCode
		 * @param $strUser
		 * @param $intCheckedOutBy
		 * @param $intReservedBy
		 * @param $strCategory
		 * @param $strManufacturer
		 * @param $strSortByDate
		 * @param $strDateModified
		 * @param $strDateModifiedFirst
		 * @param $strDateModifiedLast
		 * @param $arrTransactionTypes
		 * @param $objExpansionMap
		 * @return strSqlQuery / objAssetTransaction[]
		*/
		public function LoadArrayBySearch($blnReturnStrQuery = true, $strAssetModel = null, $strAssetCode = null, $strAssetModelCode = null, $strUser = null, $intCheckedOutBy = null, $intReservedBy = null, $strCategory = null, $strManufacturer = null, $strSortByDate = "ASC", $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $arrTransactionTypes = null, $objExpansionMap = null) {
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					AssetTransaction::ExpandQuery('asset_transaction', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$strTransactionTypes = "";
			if ($arrTransactionTypes) {
			  $strTransactionTypes = sprintf("AND `asset_transaction__transaction_id`.`transaction_type_id` IN ('%s') ", implode("', '", $arrTransactionTypes));
			}
			if ($strAssetModel) {
			  $strAssetModel = "AND `asset_transaction__asset_id__asset_model_id`.`short_description` LIKE '%".$strAssetModel."%'\n";
			}
			if ($strAssetCode) {
			  $strAssetCode = "AND `asset_transaction__asset_id`.`asset_code` LIKE '%".$strAssetCode."%'\n";
			}
			if ($strAssetModelCode) {
			  $strAssetModelCode = "AND `asset_transaction__asset_id__asset_model_id`.`asset_model_code` LIKE '%".$strAssetModelCode."%'\n";
			}
			if ($strUser) {
			  $strUser = sprintf("AND (`asset_transaction__transaction_id__created_by`.`user_account_id` = '%s' OR `asset_transaction__transaction_id__modified_by`.`user_account_id` = '%s')\n", $strUser, $strUser);
			}
			$strCheckedOutBy = "";
			if ($intCheckedOutBy) {
			  $strCheckedOutBy = sprintf("AND `asset_transaction__asset_id`.`checked_out_flag` = true\n");
				if ($intCheckedOutBy != 'any') {
					$strCheckedOutBy .= sprintf("AND `asset_transaction`.`created_by` = '%s'\n", $intCheckedOutBy);
				}
			}
			$strReservedBy = "";
			if ($intReservedBy) {
			  $strReservedBy = sprintf("AND `asset_transaction__asset_id`.`reserved_flag` = true\n");
				if ($intReservedBy != 'any') {
					$strReservedBy .= sprintf("AND `asset_transaction`.`created_by` = '%s'\n", $intReservedBy);
				}
			}
			if ($strCategory) {
			  $strCategory = sprintf("AND `asset_transaction__asset_id__asset_model_id`.`category_id` = '%s'\n", $strCategory);
			}
			if ($strManufacturer) {
			  $strManufacturer = sprintf("AND `asset_transaction__asset_id__asset_model_id`.`manufacturer_id` = '%s'\n", $strManufacturer);
			}
			$arrSearchSql['strDateModifiedSql'] = null;
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND (UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) < %s OR UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) < %s)\n", $strDateModifiedFirst, $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND (UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) > %s OR UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) > %s)\n", $strDateModifiedFirst, $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND (UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) > %s AND UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) < %s", $strDateModifiedFirst, $strDateModifiedLast);
					$arrSearchSql['strDateModifiedSql'] .= sprintf(" OR UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) > %s AND UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) < %s)\n", $strDateModifiedFirst, $strDateModifiedLast);
				}
			}
			$strSortByDate = sprintf("
        `asset_transaction__transaction_id__modified_date` %s,
        `asset_transaction__transaction_id__creation_date` %s,
			", $strSortByDate, $strSortByDate);

			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::Asset);
			$strQuery = sprintf('
        SELECT
        	`asset_transaction`.`asset_transaction_id` AS `asset_transaction_id`,
        	`asset_transaction`.`asset_id` AS `asset_id`,
        	`asset_transaction`.`transaction_id` AS `transaction_id`,
        	`asset_transaction`.`parent_asset_transaction_id` AS `parent_asset_transaction_id`,
        	`asset_transaction`.`source_location_id` AS `source_location_id`,
        	`asset_transaction`.`destination_location_id` AS `destination_location_id`,
        	`asset_transaction`.`new_asset_flag` AS `new_asset_flag`,
        	`asset_transaction`.`new_asset_id` AS `new_asset_id`,
        	`asset_transaction`.`schedule_receipt_flag` AS `schedule_receipt_flag`,
        	`asset_transaction`.`schedule_receipt_due_date` AS `schedule_receipt_due_date`,
        	`asset_transaction`.`created_by` AS `created_by`,
        	`asset_transaction`.`creation_date` AS `creation_date`,
        	`asset_transaction`.`modified_by` AS `modified_by`,
        	`asset_transaction`.`modified_date` AS `modified_date`
        	%s
        	%s
        FROM
        	`asset_transaction` AS `asset_transaction`
        	%s
        	%s
        WHERE
          1=1
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
        ORDER BY
          %s
          `transaction_id`,
          `asset_transaction__asset_id__asset_code`
      ', $objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'],
        $objQueryExpansion->GetFromSql("", "\n					"), str_replace("`asset`.`asset_id`", " `asset_transaction__asset_id`.`asset_id`", $arrCustomFieldSql['strFrom']),
        $strTransactionTypes, $strAssetModel, $strAssetCode, $strAssetModelCode, $strUser, $strCheckedOutBy, $strReservedBy, $strCategory, $strManufacturer, $arrSearchSql['strDateModifiedSql'],
        $strSortByDate);
        
      if ($blnReturnStrQuery) {
			  return $strQuery;
			}
			else {
			  $objDatabase = AssetTransaction::GetDatabase();
        $objDbResult = $objDatabase->Query($strQuery);
        return AssetTransaction::InstantiateDbResult($objDbResult);
			}
		}

		/**
		 * Count DISTINCT Transactions
		 * @param $strAssetModel
		 * @param $strAssetCode
		 * @param $strAssetModelCode
		 * @param $strUser
		 * @param $intCheckedOutBy
		 * @param $intReservedBy
		 * @param $strCategory
		 * @param $strManufacturer
		 * @param $strDateModified
		 * @param $strDateModifiedFirst
		 * @param $strDateModifiedLast
		 * @param $arrTransactionTypes
		 * @param $objExpansionMap
		 * @return int
		*/
		public function CountTransactionsBySearch($strAssetModel = null, $strAssetCode = null, $strAssetModelCode = null, $strUser = null, $intCheckedOutBy = null, $intReservedBy = null, $strCategory = null, $strManufacturer = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $arrTransactionTypes = null, $objExpansionMap = null) {
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					AssetTransaction::ExpandQuery('asset_transaction', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$strTransactionTypes = "";
			if ($arrTransactionTypes) {
			  $strTransactionTypes = sprintf("AND `asset_transaction__transaction_id`.`transaction_type_id` IN ('%s') ", implode("', '", $arrTransactionTypes));
			}
			if ($strAssetModel) {
			  $strAssetModel = "AND `asset_transaction__asset_id__asset_model_id`.`short_description` LIKE '%".$strAssetModel."%'\n";
			}
			if ($strAssetCode) {
			  $strAssetCode = "AND `asset_transaction__asset_id`.`asset_code` LIKE '%".$strAssetCode."%'\n";
			}
			if ($strAssetModelCode) {
			  $strAssetModelCode = "AND `asset_transaction__asset_id__asset_model_id`.`asset_model_code` LIKE '%".$strAssetModelCode."%'\n";
			}
			if ($strUser) {
			  $strUser = sprintf("AND (`asset_transaction__transaction_id__created_by`.`user_account_id` = '%s' OR `asset_transaction__transaction_id__modified_by`.`user_account_id` = '%s')\n", $strUser, $strUser);
			}
			$strCheckedOutBy = "";
			if ($intCheckedOutBy) {
			  $strCheckedOutBy = sprintf("AND `asset_transaction__asset_id`.`checked_out_flag` = true\n");
				if ($intCheckedOutBy != 'any') {
					$strCheckedOutBy .= sprintf("AND `asset_transaction`.`created_by` = '%s'\n", $intCheckedOutBy);
				}
			}
			$strReservedBy = "";
			if ($intReservedBy) {
			  $strReservedBy = sprintf("AND `asset_transaction__asset_id`.`reserved_flag` = true\n");
				if ($intReservedBy != 'any') {
					$strReservedBy .= sprintf("AND `asset_transaction`.`created_by` = '%s'\n", $intReservedBy);
				}
			}
			if ($strCategory) {
			  $strCategory = sprintf("AND `asset_transaction__asset_id__asset_model_id`.`category_id` = '%s'\n", $strCategory);
			}
			if ($strManufacturer) {
			  $strManufacturer = sprintf("AND `asset_transaction__asset_id__asset_model_id`.`manufacturer_id` = '%s'\n", $strManufacturer);
			}
			$arrSearchSql['strDateModifiedSql'] = null;
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND (UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) < %s OR UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) < %s)\n", $strDateModifiedFirst, $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND (UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) > %s OR UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) > %s)\n", $strDateModifiedFirst, $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND (UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) > %s AND UNIX_TIMESTAMP(`asset_transaction`.`modified_date`) < %s", $strDateModifiedFirst, $strDateModifiedLast);
					$arrSearchSql['strDateModifiedSql'] .= sprintf(" OR UNIX_TIMESTAMP(`asset_transaction`.`creation_date`) > %s AND UNIX_TIMESTAMP(`asset_transaction`.`creation_date`))\n", $strDateModifiedFirst, $strDateModifiedLast);
				}
			}

			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::Asset);
/*			$strQuery = sprintf('
        SELECT
        	COUNT(DISTINCT `asset_transaction`.`transaction_id`) AS row_count
        FROM
        	`asset_transaction` AS `asset_transaction`
        	%s
        	%s
        WHERE
          1=1
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          OR `asset_transaction__asset_id`.`archived_flag` is TRUE
      ', $objQueryExpansion->GetFromSql("", "\n					"), str_replace("`asset`.`asset_id`", " `asset_transaction__asset_id`.`asset_id`", $arrCustomFieldSql['strFrom']),
        $strTransactionTypes, $strAssetModel, $strAssetCode, $strAssetModelCode, $strUser, $strCheckedOutBy, $strReservedBy, $strCategory, $strManufacturer, $arrSearchSql['strDateModifiedSql']
       );*/

			$strQuery = sprintf('
        SELECT
        	COUNT(DISTINCT `asset_transaction`.`transaction_id`) AS row_count
        FROM
        	`asset_transaction` AS `asset_transaction`
        	%s
        WHERE
          1=1
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          %s
          OR `asset_transaction__asset_id`.`archived_flag` is TRUE
      ', $objQueryExpansion->GetFromSql("", "\n					"),
        $strTransactionTypes, $strAssetModel, $strAssetCode, $strAssetModelCode, $strUser, $strCheckedOutBy, $strReservedBy, $strCategory, $strManufacturer, $arrSearchSql['strDateModifiedSql']
       );
       
       //echo($strQuery); exit;

     $objDatabase = AssetTransaction::GetDatabase();
     $objDbResult = $objDatabase->Query($strQuery);
     $strDbRow = $objDbResult->FetchRow();
     return QType::Cast($strDbRow[0], QType::Integer);
		}

		/**
		 * Load an array (excluding transactions for linked assets) of AssetTransaction objects,
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByTransactionIdLinkedFlag($intTransactionId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByTransactionId query
			try {
				return AssetTransaction::QueryArray(QQ::AndCondition(
				  QQ::Equal(QQN::AssetTransaction()->TransactionId, $intTransactionId),
				  QQ::NotEqual(QQN::AssetTransaction()->Asset->LinkedFlag, true))
					,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions (excluding transactions for linked assets)
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @return int
		*/
		public static function CountByTransactionIdLinkedFlag($intTransactionId) {
			// Call AssetTransaction::QueryCount to perform the CountByTransactionId query
			return AssetTransaction::QueryCount(QQ::AndCondition(
				QQ::Equal(QQN::AssetTransaction()->TransactionId, $intTransactionId),
				QQ::NotEqual(QQN::AssetTransaction()->Asset->LinkedFlag, true))
			);
		}
	}
?>