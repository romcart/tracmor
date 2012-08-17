<?php
	/**
	 * The abstract AssetTransactionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AssetTransaction subclass which
	 * extends this AssetTransactionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AssetTransaction class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetTransactionId the value for intAssetTransactionId (Read-Only PK)
	 * @property integer $AssetId the value for intAssetId (Not Null)
	 * @property integer $TransactionId the value for intTransactionId (Not Null)
	 * @property integer $ParentAssetTransactionId the value for intParentAssetTransactionId 
	 * @property integer $SourceLocationId the value for intSourceLocationId 
	 * @property integer $DestinationLocationId the value for intDestinationLocationId 
	 * @property boolean $NewAssetFlag the value for blnNewAssetFlag 
	 * @property integer $NewAssetId the value for intNewAssetId 
	 * @property boolean $ScheduleReceiptFlag the value for blnScheduleReceiptFlag 
	 * @property QDateTime $ScheduleReceiptDueDate the value for dttScheduleReceiptDueDate 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property Asset $Asset the value for the Asset object referenced by intAssetId (Not Null)
	 * @property Transaction $Transaction the value for the Transaction object referenced by intTransactionId (Not Null)
	 * @property AssetTransaction $ParentAssetTransaction the value for the AssetTransaction object referenced by intParentAssetTransactionId 
	 * @property Location $SourceLocation the value for the Location object referenced by intSourceLocationId 
	 * @property Location $DestinationLocation the value for the Location object referenced by intDestinationLocationId 
	 * @property Asset $NewAsset the value for the Asset object referenced by intNewAssetId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property AssetTransactionCheckout $AssetTransactionCheckout the value for the AssetTransactionCheckout object that uniquely references this AssetTransaction
	 * @property AssetTransaction $_ChildAssetTransaction the value for the private _objChildAssetTransaction (Read-Only) if set due to an expansion on the asset_transaction.parent_asset_transaction_id reverse relationship
	 * @property AssetTransaction[] $_ChildAssetTransactionArray the value for the private _objChildAssetTransactionArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction.parent_asset_transaction_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AssetTransactionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column asset_transaction.asset_transaction_id
		 * @var integer intAssetTransactionId
		 */
		protected $intAssetTransactionId;
		const AssetTransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.asset_id
		 * @var integer intAssetId
		 */
		protected $intAssetId;
		const AssetIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.transaction_id
		 * @var integer intTransactionId
		 */
		protected $intTransactionId;
		const TransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.parent_asset_transaction_id
		 * @var integer intParentAssetTransactionId
		 */
		protected $intParentAssetTransactionId;
		const ParentAssetTransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.source_location_id
		 * @var integer intSourceLocationId
		 */
		protected $intSourceLocationId;
		const SourceLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.destination_location_id
		 * @var integer intDestinationLocationId
		 */
		protected $intDestinationLocationId;
		const DestinationLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.new_asset_flag
		 * @var boolean blnNewAssetFlag
		 */
		protected $blnNewAssetFlag;
		const NewAssetFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.new_asset_id
		 * @var integer intNewAssetId
		 */
		protected $intNewAssetId;
		const NewAssetIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.schedule_receipt_flag
		 * @var boolean blnScheduleReceiptFlag
		 */
		protected $blnScheduleReceiptFlag;
		const ScheduleReceiptFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.schedule_receipt_due_date
		 * @var QDateTime dttScheduleReceiptDueDate
		 */
		protected $dttScheduleReceiptDueDate;
		const ScheduleReceiptDueDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single ChildAssetTransaction object
		 * (of type AssetTransaction), if this AssetTransaction object was restored with
		 * an expansion on the asset_transaction association table.
		 * @var AssetTransaction _objChildAssetTransaction;
		 */
		private $_objChildAssetTransaction;

		/**
		 * Private member variable that stores a reference to an array of ChildAssetTransaction objects
		 * (of type AssetTransaction[]), if this AssetTransaction object was restored with
		 * an ExpandAsArray on the asset_transaction association table.
		 * @var AssetTransaction[] _objChildAssetTransactionArray;
		 */
		private $_objChildAssetTransactionArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.asset_id.
		 *
		 * NOTE: Always use the Asset property getter to correctly retrieve this Asset object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Asset objAsset
		 */
		protected $objAsset;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.transaction_id.
		 *
		 * NOTE: Always use the Transaction property getter to correctly retrieve this Transaction object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Transaction objTransaction
		 */
		protected $objTransaction;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.parent_asset_transaction_id.
		 *
		 * NOTE: Always use the ParentAssetTransaction property getter to correctly retrieve this AssetTransaction object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetTransaction objParentAssetTransaction
		 */
		protected $objParentAssetTransaction;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.source_location_id.
		 *
		 * NOTE: Always use the SourceLocation property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objSourceLocation
		 */
		protected $objSourceLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.destination_location_id.
		 *
		 * NOTE: Always use the DestinationLocation property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objDestinationLocation
		 */
		protected $objDestinationLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.new_asset_id.
		 *
		 * NOTE: Always use the NewAsset property getter to correctly retrieve this Asset object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Asset objNewAsset
		 */
		protected $objNewAsset;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column asset_transaction_checkout.asset_transaction_id.
		 *
		 * NOTE: Always use the AssetTransactionCheckout property getter to correctly retrieve this AssetTransactionCheckout object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetTransactionCheckout objAssetTransactionCheckout
		 */
		protected $objAssetTransactionCheckout;
		
		/**
		 * Used internally to manage whether the adjoined AssetTransactionCheckout object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyAssetTransactionCheckout;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a AssetTransaction from PK Info
		 * @param integer $intAssetTransactionId
		 * @return AssetTransaction
		 */
		public static function Load($intAssetTransactionId) {
			// Use QuerySingle to Perform the Query
			return AssetTransaction::QuerySingle(
				QQ::Equal(QQN::AssetTransaction()->AssetTransactionId, $intAssetTransactionId)
			);
		}

		/**
		 * Load all AssetTransactions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadAll query
			try {
				return AssetTransaction::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AssetTransactions
		 * @return int
		 */
		public static function CountAll() {
			// Call AssetTransaction::QueryCount to perform the CountAll query
			return AssetTransaction::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Create/Build out the QueryBuilder object with AssetTransaction-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asset_transaction');
			AssetTransaction::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('asset_transaction');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single AssetTransaction object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetTransaction the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new AssetTransaction object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AssetTransaction::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return AssetTransaction::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of AssetTransaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetTransaction[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AssetTransaction::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = AssetTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of AssetTransaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'asset_transaction_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AssetTransaction-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AssetTransaction::GetSelectFields($objQueryBuilder);
				AssetTransaction::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetTransaction::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AssetTransaction
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asset_transaction';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_transaction_id', $strAliasPrefix . 'asset_transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_id', $strAliasPrefix . 'asset_id');
			$objBuilder->AddSelectItem($strTableName, 'transaction_id', $strAliasPrefix . 'transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_asset_transaction_id', $strAliasPrefix . 'parent_asset_transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'source_location_id', $strAliasPrefix . 'source_location_id');
			$objBuilder->AddSelectItem($strTableName, 'destination_location_id', $strAliasPrefix . 'destination_location_id');
			$objBuilder->AddSelectItem($strTableName, 'new_asset_flag', $strAliasPrefix . 'new_asset_flag');
			$objBuilder->AddSelectItem($strTableName, 'new_asset_id', $strAliasPrefix . 'new_asset_id');
			$objBuilder->AddSelectItem($strTableName, 'schedule_receipt_flag', $strAliasPrefix . 'schedule_receipt_flag');
			$objBuilder->AddSelectItem($strTableName, 'schedule_receipt_due_date', $strAliasPrefix . 'schedule_receipt_due_date');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AssetTransaction from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AssetTransaction::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AssetTransaction
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAssetTransactionId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'asset_transaction__';


				$strAlias = $strAliasPrefix . 'childassettransaction__asset_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objChildAssetTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objChildAssetTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childassettransaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objChildAssetTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objChildAssetTransactionArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childassettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'asset_transaction__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the AssetTransaction object
			$objToReturn = new AssetTransaction();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_transaction_id'] : $strAliasPrefix . 'asset_transaction_id';
			$objToReturn->intAssetTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_id'] : $strAliasPrefix . 'asset_id';
			$objToReturn->intAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_id'] : $strAliasPrefix . 'transaction_id';
			$objToReturn->intTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_asset_transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_asset_transaction_id'] : $strAliasPrefix . 'parent_asset_transaction_id';
			$objToReturn->intParentAssetTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'source_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'source_location_id'] : $strAliasPrefix . 'source_location_id';
			$objToReturn->intSourceLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'destination_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'destination_location_id'] : $strAliasPrefix . 'destination_location_id';
			$objToReturn->intDestinationLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'new_asset_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'new_asset_flag'] : $strAliasPrefix . 'new_asset_flag';
			$objToReturn->blnNewAssetFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'new_asset_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'new_asset_id'] : $strAliasPrefix . 'new_asset_id';
			$objToReturn->intNewAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'schedule_receipt_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'schedule_receipt_flag'] : $strAliasPrefix . 'schedule_receipt_flag';
			$objToReturn->blnScheduleReceiptFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'schedule_receipt_due_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'schedule_receipt_due_date'] : $strAliasPrefix . 'schedule_receipt_due_date';
			$objToReturn->dttScheduleReceiptDueDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_date'] : $strAliasPrefix . 'modified_date';
			$objToReturn->strModifiedDate = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'asset_transaction__';

			// Check for Asset Early Binding
			$strAlias = $strAliasPrefix . 'asset_id__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Transaction Early Binding
			$strAlias = $strAliasPrefix . 'transaction_id__transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTransaction = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ParentAssetTransaction Early Binding
			$strAlias = $strAliasPrefix . 'parent_asset_transaction_id__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentAssetTransaction = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_asset_transaction_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for SourceLocation Early Binding
			$strAlias = $strAliasPrefix . 'source_location_id__location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSourceLocation = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'source_location_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for DestinationLocation Early Binding
			$strAlias = $strAliasPrefix . 'destination_location_id__location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDestinationLocation = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destination_location_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for NewAsset Early Binding
			$strAlias = $strAliasPrefix . 'new_asset_id__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objNewAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'new_asset_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ModifiedByObject Early Binding
			$strAlias = $strAliasPrefix . 'modified_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objModifiedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'modified_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for AssetTransactionCheckout Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'assettransactioncheckout__asset_transaction_checkout_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objAssetTransactionCheckout = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckout__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objAssetTransactionCheckout = false;
			}



			// Check for ChildAssetTransaction Virtual Binding
			$strAlias = $strAliasPrefix . 'childassettransaction__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objChildAssetTransactionArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childassettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objChildAssetTransaction = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childassettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of AssetTransactions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AssetTransaction[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AssetTransaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AssetTransaction::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AssetTransaction object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AssetTransaction next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return AssetTransaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AssetTransaction object,
		 * by AssetTransactionId Index(es)
		 * @param integer $intAssetTransactionId
		 * @return AssetTransaction
		*/
		public static function LoadByAssetTransactionId($intAssetTransactionId, $objOptionalClauses = null) {
			return AssetTransaction::QuerySingle(
				QQ::Equal(QQN::AssetTransaction()->AssetTransactionId, $intAssetTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByTransactionId($intTransactionId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByTransactionId query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->TransactionId, $intTransactionId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @return int
		*/
		public static function CountByTransactionId($intTransactionId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByTransactionId query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->TransactionId, $intTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by AssetId Index(es)
		 * @param integer $intAssetId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByAssetId($intAssetId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByAssetId query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->AssetId, $intAssetId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by AssetId Index(es)
		 * @param integer $intAssetId
		 * @return int
		*/
		public static function CountByAssetId($intAssetId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByAssetId query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->AssetId, $intAssetId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by SourceLocationId Index(es)
		 * @param integer $intSourceLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayBySourceLocationId($intSourceLocationId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayBySourceLocationId query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->SourceLocationId, $intSourceLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by SourceLocationId Index(es)
		 * @param integer $intSourceLocationId
		 * @return int
		*/
		public static function CountBySourceLocationId($intSourceLocationId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountBySourceLocationId query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->SourceLocationId, $intSourceLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by DestinationLocationId Index(es)
		 * @param integer $intDestinationLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByDestinationLocationId($intDestinationLocationId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByDestinationLocationId query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->DestinationLocationId, $intDestinationLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by DestinationLocationId Index(es)
		 * @param integer $intDestinationLocationId
		 * @return int
		*/
		public static function CountByDestinationLocationId($intDestinationLocationId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByDestinationLocationId query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->DestinationLocationId, $intDestinationLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByCreatedBy query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByModifiedBy query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by NewAssetId Index(es)
		 * @param integer $intNewAssetId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByNewAssetId($intNewAssetId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByNewAssetId query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->NewAssetId, $intNewAssetId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by NewAssetId Index(es)
		 * @param integer $intNewAssetId
		 * @return int
		*/
		public static function CountByNewAssetId($intNewAssetId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByNewAssetId query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->NewAssetId, $intNewAssetId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransaction objects,
		 * by ParentAssetTransactionId Index(es)
		 * @param integer $intParentAssetTransactionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/
		public static function LoadArrayByParentAssetTransactionId($intParentAssetTransactionId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryArray to perform the LoadArrayByParentAssetTransactionId query
			try {
				return AssetTransaction::QueryArray(
					QQ::Equal(QQN::AssetTransaction()->ParentAssetTransactionId, $intParentAssetTransactionId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactions
		 * by ParentAssetTransactionId Index(es)
		 * @param integer $intParentAssetTransactionId
		 * @return int
		*/
		public static function CountByParentAssetTransactionId($intParentAssetTransactionId, $objOptionalClauses = null) {
			// Call AssetTransaction::QueryCount to perform the CountByParentAssetTransactionId query
			return AssetTransaction::QueryCount(
				QQ::Equal(QQN::AssetTransaction()->ParentAssetTransactionId, $intParentAssetTransactionId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this AssetTransaction
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asset_transaction` (
							`asset_id`,
							`transaction_id`,
							`parent_asset_transaction_id`,
							`source_location_id`,
							`destination_location_id`,
							`new_asset_flag`,
							`new_asset_id`,
							`schedule_receipt_flag`,
							`schedule_receipt_due_date`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAssetId) . ',
							' . $objDatabase->SqlVariable($this->intTransactionId) . ',
							' . $objDatabase->SqlVariable($this->intParentAssetTransactionId) . ',
							' . $objDatabase->SqlVariable($this->intSourceLocationId) . ',
							' . $objDatabase->SqlVariable($this->intDestinationLocationId) . ',
							' . $objDatabase->SqlVariable($this->blnNewAssetFlag) . ',
							' . $objDatabase->SqlVariable($this->intNewAssetId) . ',
							' . $objDatabase->SqlVariable($this->blnScheduleReceiptFlag) . ',
							' . $objDatabase->SqlVariable($this->dttScheduleReceiptDueDate) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAssetTransactionId = $objDatabase->InsertId('asset_transaction', 'asset_transaction_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`modified_date`
							FROM
								`asset_transaction`
							WHERE
								`asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('AssetTransaction');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asset_transaction`
						SET
							`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . ',
							`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . ',
							`parent_asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intParentAssetTransactionId) . ',
							`source_location_id` = ' . $objDatabase->SqlVariable($this->intSourceLocationId) . ',
							`destination_location_id` = ' . $objDatabase->SqlVariable($this->intDestinationLocationId) . ',
							`new_asset_flag` = ' . $objDatabase->SqlVariable($this->blnNewAssetFlag) . ',
							`new_asset_id` = ' . $objDatabase->SqlVariable($this->intNewAssetId) . ',
							`schedule_receipt_flag` = ' . $objDatabase->SqlVariable($this->blnScheduleReceiptFlag) . ',
							`schedule_receipt_due_date` = ' . $objDatabase->SqlVariable($this->dttScheduleReceiptDueDate) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined AssetTransactionCheckout object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyAssetTransactionCheckout) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = AssetTransactionCheckout::LoadByAssetTransactionId($this->intAssetTransactionId)) {
						$objAssociated->AssetTransactionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objAssetTransactionCheckout) {
						$this->objAssetTransactionCheckout->AssetTransactionId = $this->intAssetTransactionId;
						$this->objAssetTransactionCheckout->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyAssetTransactionCheckout = false;
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`modified_date`
				FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this AssetTransaction
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AssetTransaction with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			
			
			// Update the adjoined AssetTransactionCheckout object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = AssetTransactionCheckout::LoadByAssetTransactionId($this->intAssetTransactionId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all AssetTransactions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`');
		}

		/**
		 * Truncate asset_transaction table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asset_transaction`');
		}

		/**
		 * Reload this AssetTransaction from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AssetTransaction object.');

			// Reload the Object
			$objReloaded = AssetTransaction::Load($this->intAssetTransactionId);

			// Update $this's local variables to match
			$this->AssetId = $objReloaded->AssetId;
			$this->TransactionId = $objReloaded->TransactionId;
			$this->ParentAssetTransactionId = $objReloaded->ParentAssetTransactionId;
			$this->SourceLocationId = $objReloaded->SourceLocationId;
			$this->DestinationLocationId = $objReloaded->DestinationLocationId;
			$this->blnNewAssetFlag = $objReloaded->blnNewAssetFlag;
			$this->NewAssetId = $objReloaded->NewAssetId;
			$this->blnScheduleReceiptFlag = $objReloaded->blnScheduleReceiptFlag;
			$this->dttScheduleReceiptDueDate = $objReloaded->dttScheduleReceiptDueDate;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModifiedDate = $objReloaded->strModifiedDate;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = AssetTransaction::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `asset_transaction` (
					`asset_transaction_id`,
					`asset_id`,
					`transaction_id`,
					`parent_asset_transaction_id`,
					`source_location_id`,
					`destination_location_id`,
					`new_asset_flag`,
					`new_asset_id`,
					`schedule_receipt_flag`,
					`schedule_receipt_due_date`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAssetTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intAssetId) . ',
					' . $objDatabase->SqlVariable($this->intTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intParentAssetTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intSourceLocationId) . ',
					' . $objDatabase->SqlVariable($this->intDestinationLocationId) . ',
					' . $objDatabase->SqlVariable($this->blnNewAssetFlag) . ',
					' . $objDatabase->SqlVariable($this->intNewAssetId) . ',
					' . $objDatabase->SqlVariable($this->blnScheduleReceiptFlag) . ',
					' . $objDatabase->SqlVariable($this->dttScheduleReceiptDueDate) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAssetTransactionId
		 * @return AssetTransaction[]
		 */
		public static function GetJournalForId($intAssetTransactionId) {
			$objDatabase = AssetTransaction::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM asset_transaction WHERE asset_transaction_id = ' .
				$objDatabase->SqlVariable($intAssetTransactionId) . ' ORDER BY __sys_date');

			return AssetTransaction::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return AssetTransaction[]
		 */
		public function GetJournal() {
			return AssetTransaction::GetJournalForId($this->intAssetTransactionId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'AssetTransactionId':
					// Gets the value for intAssetTransactionId (Read-Only PK)
					// @return integer
					return $this->intAssetTransactionId;

				case 'AssetId':
					// Gets the value for intAssetId (Not Null)
					// @return integer
					return $this->intAssetId;

				case 'TransactionId':
					// Gets the value for intTransactionId (Not Null)
					// @return integer
					return $this->intTransactionId;

				case 'ParentAssetTransactionId':
					// Gets the value for intParentAssetTransactionId 
					// @return integer
					return $this->intParentAssetTransactionId;

				case 'SourceLocationId':
					// Gets the value for intSourceLocationId 
					// @return integer
					return $this->intSourceLocationId;

				case 'DestinationLocationId':
					// Gets the value for intDestinationLocationId 
					// @return integer
					return $this->intDestinationLocationId;

				case 'NewAssetFlag':
					// Gets the value for blnNewAssetFlag 
					// @return boolean
					return $this->blnNewAssetFlag;

				case 'NewAssetId':
					// Gets the value for intNewAssetId 
					// @return integer
					return $this->intNewAssetId;

				case 'ScheduleReceiptFlag':
					// Gets the value for blnScheduleReceiptFlag 
					// @return boolean
					return $this->blnScheduleReceiptFlag;

				case 'ScheduleReceiptDueDate':
					// Gets the value for dttScheduleReceiptDueDate 
					// @return QDateTime
					return $this->dttScheduleReceiptDueDate;

				case 'CreatedBy':
					// Gets the value for intCreatedBy 
					// @return integer
					return $this->intCreatedBy;

				case 'CreationDate':
					// Gets the value for dttCreationDate 
					// @return QDateTime
					return $this->dttCreationDate;

				case 'ModifiedBy':
					// Gets the value for intModifiedBy 
					// @return integer
					return $this->intModifiedBy;

				case 'ModifiedDate':
					// Gets the value for strModifiedDate (Read-Only Timestamp)
					// @return string
					return $this->strModifiedDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Asset':
					// Gets the value for the Asset object referenced by intAssetId (Not Null)
					// @return Asset
					try {
						if ((!$this->objAsset) && (!is_null($this->intAssetId)))
							$this->objAsset = Asset::Load($this->intAssetId);
						return $this->objAsset;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Transaction':
					// Gets the value for the Transaction object referenced by intTransactionId (Not Null)
					// @return Transaction
					try {
						if ((!$this->objTransaction) && (!is_null($this->intTransactionId)))
							$this->objTransaction = Transaction::Load($this->intTransactionId);
						return $this->objTransaction;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentAssetTransaction':
					// Gets the value for the AssetTransaction object referenced by intParentAssetTransactionId 
					// @return AssetTransaction
					try {
						if ((!$this->objParentAssetTransaction) && (!is_null($this->intParentAssetTransactionId)))
							$this->objParentAssetTransaction = AssetTransaction::Load($this->intParentAssetTransactionId);
						return $this->objParentAssetTransaction;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SourceLocation':
					// Gets the value for the Location object referenced by intSourceLocationId 
					// @return Location
					try {
						if ((!$this->objSourceLocation) && (!is_null($this->intSourceLocationId)))
							$this->objSourceLocation = Location::Load($this->intSourceLocationId);
						return $this->objSourceLocation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinationLocation':
					// Gets the value for the Location object referenced by intDestinationLocationId 
					// @return Location
					try {
						if ((!$this->objDestinationLocation) && (!is_null($this->intDestinationLocationId)))
							$this->objDestinationLocation = Location::Load($this->intDestinationLocationId);
						return $this->objDestinationLocation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NewAsset':
					// Gets the value for the Asset object referenced by intNewAssetId 
					// @return Asset
					try {
						if ((!$this->objNewAsset) && (!is_null($this->intNewAssetId)))
							$this->objNewAsset = Asset::Load($this->intNewAssetId);
						return $this->objNewAsset;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					// Gets the value for the UserAccount object referenced by intCreatedBy 
					// @return UserAccount
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = UserAccount::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedByObject':
					// Gets the value for the UserAccount object referenced by intModifiedBy 
					// @return UserAccount
					try {
						if ((!$this->objModifiedByObject) && (!is_null($this->intModifiedBy)))
							$this->objModifiedByObject = UserAccount::Load($this->intModifiedBy);
						return $this->objModifiedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'AssetTransactionCheckout':
					// Gets the value for the AssetTransactionCheckout object that uniquely references this AssetTransaction
					// by objAssetTransactionCheckout (Unique)
					// @return AssetTransactionCheckout
					try {
						if ($this->objAssetTransactionCheckout === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objAssetTransactionCheckout)
							$this->objAssetTransactionCheckout = AssetTransactionCheckout::LoadByAssetTransactionId($this->intAssetTransactionId);
						return $this->objAssetTransactionCheckout;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ChildAssetTransaction':
					// Gets the value for the private _objChildAssetTransaction (Read-Only)
					// if set due to an expansion on the asset_transaction.parent_asset_transaction_id reverse relationship
					// @return AssetTransaction
					return $this->_objChildAssetTransaction;

				case '_ChildAssetTransactionArray':
					// Gets the value for the private _objChildAssetTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction.parent_asset_transaction_id reverse relationship
					// @return AssetTransaction[]
					return (array) $this->_objChildAssetTransactionArray;


				case '__Restored':
					return $this->__blnRestored;

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
				case 'AssetId':
					// Sets the value for intAssetId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAsset = null;
						return ($this->intAssetId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionId':
					// Sets the value for intTransactionId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objTransaction = null;
						return ($this->intTransactionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentAssetTransactionId':
					// Sets the value for intParentAssetTransactionId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentAssetTransaction = null;
						return ($this->intParentAssetTransactionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SourceLocationId':
					// Sets the value for intSourceLocationId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSourceLocation = null;
						return ($this->intSourceLocationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinationLocationId':
					// Sets the value for intDestinationLocationId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objDestinationLocation = null;
						return ($this->intDestinationLocationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NewAssetFlag':
					// Sets the value for blnNewAssetFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnNewAssetFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NewAssetId':
					// Sets the value for intNewAssetId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objNewAsset = null;
						return ($this->intNewAssetId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScheduleReceiptFlag':
					// Sets the value for blnScheduleReceiptFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnScheduleReceiptFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScheduleReceiptDueDate':
					// Sets the value for dttScheduleReceiptDueDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttScheduleReceiptDueDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					// Sets the value for intCreatedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreationDate':
					// Sets the value for dttCreationDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttCreationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedBy':
					// Sets the value for intModifiedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objModifiedByObject = null;
						return ($this->intModifiedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Asset':
					// Sets the value for the Asset object referenced by intAssetId (Not Null)
					// @param Asset $mixValue
					// @return Asset
					if (is_null($mixValue)) {
						$this->intAssetId = null;
						$this->objAsset = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Asset object
						try {
							$mixValue = QType::Cast($mixValue, 'Asset');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Asset object
						if (is_null($mixValue->AssetId))
							throw new QCallerException('Unable to set an unsaved Asset for this AssetTransaction');

						// Update Local Member Variables
						$this->objAsset = $mixValue;
						$this->intAssetId = $mixValue->AssetId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Transaction':
					// Sets the value for the Transaction object referenced by intTransactionId (Not Null)
					// @param Transaction $mixValue
					// @return Transaction
					if (is_null($mixValue)) {
						$this->intTransactionId = null;
						$this->objTransaction = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Transaction object
						try {
							$mixValue = QType::Cast($mixValue, 'Transaction');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Transaction object
						if (is_null($mixValue->TransactionId))
							throw new QCallerException('Unable to set an unsaved Transaction for this AssetTransaction');

						// Update Local Member Variables
						$this->objTransaction = $mixValue;
						$this->intTransactionId = $mixValue->TransactionId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ParentAssetTransaction':
					// Sets the value for the AssetTransaction object referenced by intParentAssetTransactionId 
					// @param AssetTransaction $mixValue
					// @return AssetTransaction
					if (is_null($mixValue)) {
						$this->intParentAssetTransactionId = null;
						$this->objParentAssetTransaction = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AssetTransaction object
						try {
							$mixValue = QType::Cast($mixValue, 'AssetTransaction');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AssetTransaction object
						if (is_null($mixValue->AssetTransactionId))
							throw new QCallerException('Unable to set an unsaved ParentAssetTransaction for this AssetTransaction');

						// Update Local Member Variables
						$this->objParentAssetTransaction = $mixValue;
						$this->intParentAssetTransactionId = $mixValue->AssetTransactionId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SourceLocation':
					// Sets the value for the Location object referenced by intSourceLocationId 
					// @param Location $mixValue
					// @return Location
					if (is_null($mixValue)) {
						$this->intSourceLocationId = null;
						$this->objSourceLocation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Location object
						try {
							$mixValue = QType::Cast($mixValue, 'Location');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Location object
						if (is_null($mixValue->LocationId))
							throw new QCallerException('Unable to set an unsaved SourceLocation for this AssetTransaction');

						// Update Local Member Variables
						$this->objSourceLocation = $mixValue;
						$this->intSourceLocationId = $mixValue->LocationId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DestinationLocation':
					// Sets the value for the Location object referenced by intDestinationLocationId 
					// @param Location $mixValue
					// @return Location
					if (is_null($mixValue)) {
						$this->intDestinationLocationId = null;
						$this->objDestinationLocation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Location object
						try {
							$mixValue = QType::Cast($mixValue, 'Location');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Location object
						if (is_null($mixValue->LocationId))
							throw new QCallerException('Unable to set an unsaved DestinationLocation for this AssetTransaction');

						// Update Local Member Variables
						$this->objDestinationLocation = $mixValue;
						$this->intDestinationLocationId = $mixValue->LocationId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'NewAsset':
					// Sets the value for the Asset object referenced by intNewAssetId 
					// @param Asset $mixValue
					// @return Asset
					if (is_null($mixValue)) {
						$this->intNewAssetId = null;
						$this->objNewAsset = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Asset object
						try {
							$mixValue = QType::Cast($mixValue, 'Asset');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Asset object
						if (is_null($mixValue->AssetId))
							throw new QCallerException('Unable to set an unsaved NewAsset for this AssetTransaction');

						// Update Local Member Variables
						$this->objNewAsset = $mixValue;
						$this->intNewAssetId = $mixValue->AssetId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					// Sets the value for the UserAccount object referenced by intCreatedBy 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this AssetTransaction');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ModifiedByObject':
					// Sets the value for the UserAccount object referenced by intModifiedBy 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intModifiedBy = null;
						$this->objModifiedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this AssetTransaction');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AssetTransactionCheckout':
					// Sets the value for the AssetTransactionCheckout object referenced by objAssetTransactionCheckout (Unique)
					// @param AssetTransactionCheckout $mixValue
					// @return AssetTransactionCheckout
					if (is_null($mixValue)) {
						$this->objAssetTransactionCheckout = null;

						// Make sure we update the adjoined AssetTransactionCheckout object the next time we call Save()
						$this->blnDirtyAssetTransactionCheckout = true;

						return null;
					} else {
						// Make sure $mixValue actually is a AssetTransactionCheckout object
						try {
							$mixValue = QType::Cast($mixValue, 'AssetTransactionCheckout');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objAssetTransactionCheckout to a DIFFERENT $mixValue?
						if ((!$this->AssetTransactionCheckout) || ($this->AssetTransactionCheckout->AssetTransactionCheckoutId != $mixValue->AssetTransactionCheckoutId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined AssetTransactionCheckout object the next time we call Save()
							$this->blnDirtyAssetTransactionCheckout = true;

							// Update Local Member Variable
							$this->objAssetTransactionCheckout = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for ChildAssetTransaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChildAssetTransactions as an array of AssetTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/ 
		public function GetChildAssetTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intAssetTransactionId)))
				return array();

			try {
				return AssetTransaction::LoadArrayByParentAssetTransactionId($this->intAssetTransactionId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChildAssetTransactions
		 * @return int
		*/ 
		public function CountChildAssetTransactions() {
			if ((is_null($this->intAssetTransactionId)))
				return 0;

			return AssetTransaction::CountByParentAssetTransactionId($this->intAssetTransactionId);
		}

		/**
		 * Associates a ChildAssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function AssociateChildAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildAssetTransaction on this unsaved AssetTransaction.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildAssetTransaction on this AssetTransaction with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`parent_asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->ParentAssetTransactionId = $this->intAssetTransactionId;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ChildAssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function UnassociateChildAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAssetTransaction on this unsaved AssetTransaction.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAssetTransaction on this AssetTransaction with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`parent_asset_transaction_id` = null
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`parent_asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->ParentAssetTransactionId = null;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ChildAssetTransactions
		 * @return void
		*/ 
		public function UnassociateAllChildAssetTransactions() {
			if ((is_null($this->intAssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAssetTransaction on this unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByParentAssetTransactionId($this->intAssetTransactionId) as $objAssetTransaction) {
					$objAssetTransaction->ParentAssetTransactionId = null;
					$objAssetTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`parent_asset_transaction_id` = null
				WHERE
					`parent_asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
			');
		}

		/**
		 * Deletes an associated ChildAssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedChildAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAssetTransaction on this unsaved AssetTransaction.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAssetTransaction on this AssetTransaction with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`parent_asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ChildAssetTransactions
		 * @return void
		*/ 
		public function DeleteAllChildAssetTransactions() {
			if ((is_null($this->intAssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAssetTransaction on this unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransaction::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByParentAssetTransactionId($this->intAssetTransactionId) as $objAssetTransaction) {
					$objAssetTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`parent_asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="AssetTransaction"><sequence>';
			$strToReturn .= '<element name="AssetTransactionId" type="xsd:int"/>';
			$strToReturn .= '<element name="Asset" type="xsd1:Asset"/>';
			$strToReturn .= '<element name="Transaction" type="xsd1:Transaction"/>';
			$strToReturn .= '<element name="ParentAssetTransaction" type="xsd1:AssetTransaction"/>';
			$strToReturn .= '<element name="SourceLocation" type="xsd1:Location"/>';
			$strToReturn .= '<element name="DestinationLocation" type="xsd1:Location"/>';
			$strToReturn .= '<element name="NewAssetFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NewAsset" type="xsd1:Asset"/>';
			$strToReturn .= '<element name="ScheduleReceiptFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ScheduleReceiptDueDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AssetTransaction', $strComplexTypeArray)) {
				$strComplexTypeArray['AssetTransaction'] = AssetTransaction::GetSoapComplexTypeXml();
				Asset::AlterSoapComplexTypeArray($strComplexTypeArray);
				Transaction::AlterSoapComplexTypeArray($strComplexTypeArray);
				AssetTransaction::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				Asset::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AssetTransaction::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AssetTransaction();
			if (property_exists($objSoapObject, 'AssetTransactionId'))
				$objToReturn->intAssetTransactionId = $objSoapObject->AssetTransactionId;
			if ((property_exists($objSoapObject, 'Asset')) &&
				($objSoapObject->Asset))
				$objToReturn->Asset = Asset::GetObjectFromSoapObject($objSoapObject->Asset);
			if ((property_exists($objSoapObject, 'Transaction')) &&
				($objSoapObject->Transaction))
				$objToReturn->Transaction = Transaction::GetObjectFromSoapObject($objSoapObject->Transaction);
			if ((property_exists($objSoapObject, 'ParentAssetTransaction')) &&
				($objSoapObject->ParentAssetTransaction))
				$objToReturn->ParentAssetTransaction = AssetTransaction::GetObjectFromSoapObject($objSoapObject->ParentAssetTransaction);
			if ((property_exists($objSoapObject, 'SourceLocation')) &&
				($objSoapObject->SourceLocation))
				$objToReturn->SourceLocation = Location::GetObjectFromSoapObject($objSoapObject->SourceLocation);
			if ((property_exists($objSoapObject, 'DestinationLocation')) &&
				($objSoapObject->DestinationLocation))
				$objToReturn->DestinationLocation = Location::GetObjectFromSoapObject($objSoapObject->DestinationLocation);
			if (property_exists($objSoapObject, 'NewAssetFlag'))
				$objToReturn->blnNewAssetFlag = $objSoapObject->NewAssetFlag;
			if ((property_exists($objSoapObject, 'NewAsset')) &&
				($objSoapObject->NewAsset))
				$objToReturn->NewAsset = Asset::GetObjectFromSoapObject($objSoapObject->NewAsset);
			if (property_exists($objSoapObject, 'ScheduleReceiptFlag'))
				$objToReturn->blnScheduleReceiptFlag = $objSoapObject->ScheduleReceiptFlag;
			if (property_exists($objSoapObject, 'ScheduleReceiptDueDate'))
				$objToReturn->dttScheduleReceiptDueDate = new QDateTime($objSoapObject->ScheduleReceiptDueDate);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'CreationDate'))
				$objToReturn->dttCreationDate = new QDateTime($objSoapObject->CreationDate);
			if ((property_exists($objSoapObject, 'ModifiedByObject')) &&
				($objSoapObject->ModifiedByObject))
				$objToReturn->ModifiedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->ModifiedByObject);
			if (property_exists($objSoapObject, 'ModifiedDate'))
				$objToReturn->strModifiedDate = $objSoapObject->ModifiedDate;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AssetTransaction::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAsset)
				$objObject->objAsset = Asset::GetSoapObjectFromObject($objObject->objAsset, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssetId = null;
			if ($objObject->objTransaction)
				$objObject->objTransaction = Transaction::GetSoapObjectFromObject($objObject->objTransaction, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransactionId = null;
			if ($objObject->objParentAssetTransaction)
				$objObject->objParentAssetTransaction = AssetTransaction::GetSoapObjectFromObject($objObject->objParentAssetTransaction, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentAssetTransactionId = null;
			if ($objObject->objSourceLocation)
				$objObject->objSourceLocation = Location::GetSoapObjectFromObject($objObject->objSourceLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSourceLocationId = null;
			if ($objObject->objDestinationLocation)
				$objObject->objDestinationLocation = Location::GetSoapObjectFromObject($objObject->objDestinationLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDestinationLocationId = null;
			if ($objObject->objNewAsset)
				$objObject->objNewAsset = Asset::GetSoapObjectFromObject($objObject->objNewAsset, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intNewAssetId = null;
			if ($objObject->dttScheduleReceiptDueDate)
				$objObject->dttScheduleReceiptDueDate = $objObject->dttScheduleReceiptDueDate->__toString(QDateTime::FormatSoap);
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = UserAccount::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->dttCreationDate)
				$objObject->dttCreationDate = $objObject->dttCreationDate->__toString(QDateTime::FormatSoap);
			if ($objObject->objModifiedByObject)
				$objObject->objModifiedByObject = UserAccount::GetSoapObjectFromObject($objObject->objModifiedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intModifiedBy = null;
			return $objObject;
		}




		////////////////////////////////////////////////////////
		// METHODS for MANUAL QUERY SUPPORT (aka Beta 2 Queries)
		////////////////////////////////////////////////////////

		/**
		 * Internally called method to assist with SQL Query options/preferences for single row loaders.
		 * Any Load (single row) method can use this method to get the Database object.
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function QueryHelper(&$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];
		}



		/**
		 * Internally called method to assist with SQL Query options/preferences for array loaders.
		 * Any LoadAll or LoadArray method can use this method to setup SQL Query Clauses that deal
		 * with OrderBy, Limit, and Object Expansion.  Strings that contain SQL Query Clauses are
		 * passed in by reference.
		 * @param string $strOrderBy reference to the Order By as passed in to the LoadArray method
		 * @param string $strLimit the Limit as passed in to the LoadArray method
		 * @param string $strLimitPrefix reference to the Limit Prefix to be used in the SQL
		 * @param string $strLimitSuffix reference to the Limit Suffix to be used in the SQL
		 * @param string $strExpandSelect reference to the Expand Select to be used in the SQL
		 * @param string $strExpandFrom reference to the Expand From to be used in the SQL
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function ArrayQueryHelper(&$strOrderBy, $strLimit, &$strLimitPrefix, &$strLimitSuffix, &$strExpandSelect, &$strExpandFrom, $objExpansionMap, &$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];

			// Setup OrderBy and Limit Information (if applicable)
			$strOrderBy = $objDatabase->SqlSortByVariable($strOrderBy);
			$strLimitPrefix = $objDatabase->SqlLimitVariablePrefix($strLimit);
			$strLimitSuffix = $objDatabase->SqlLimitVariableSuffix($strLimit);

			// Setup QueryExpansion (if applicable)
			if ($objExpansionMap) {
				$objQueryExpansion = new QQueryExpansion('AssetTransaction', 'asset_transaction', $objExpansionMap);
				$strExpandSelect = $objQueryExpansion->GetSelectSql();
				$strExpandFrom = $objQueryExpansion->GetFromSql();
			} else {
				$strExpandSelect = null;
				$strExpandFrom = null;
			}
		}



		/**
		 * Internally called method to assist with early binding of objects
		 * on load methods.  Can only early-bind references that this class owns in the database.
		 * @param string $strParentAlias the alias of the parent (if any)
		 * @param string $strAlias the alias of this object
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param QueryExpansion an already instantiated QueryExpansion object (used as a utility object to assist with object expansion)
		 */
		public static function ExpandQuery($strParentAlias, $strAlias, $objExpansionMap, QQueryExpansion $objQueryExpansion) {
			if ($strAlias) {
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `asset_transaction` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_transaction_id` AS `%s__%s__asset_transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_id` AS `%s__%s__asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_id` AS `%s__%s__transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`parent_asset_transaction_id` AS `%s__%s__parent_asset_transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`source_location_id` AS `%s__%s__source_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`destination_location_id` AS `%s__%s__destination_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`new_asset_flag` AS `%s__%s__new_asset_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`new_asset_id` AS `%s__%s__new_asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`schedule_receipt_flag` AS `%s__%s__schedule_receipt_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`schedule_receipt_due_date` AS `%s__%s__schedule_receipt_due_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'asset_id':
							try {
								Asset::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'transaction_id':
							try {
								Transaction::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'parent_asset_transaction_id':
							try {
								AssetTransaction::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'source_location_id':
							try {
								Location::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'destination_location_id':
							try {
								Location::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'new_asset_id':
							try {
								Asset::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'created_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'modified_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						default:
							throw new QCallerException(sprintf('Unknown Object to Expand in %s: %s', $strParentAlias, $strKey));
					}
				}
		}




		////////////////////////////////////////
		// COLUMN CONSTANTS for OBJECT EXPANSION
		////////////////////////////////////////
		const ExpandAsset = 'asset_id';
		const ExpandTransaction = 'transaction_id';
		const ExpandParentAssetTransaction = 'parent_asset_transaction_id';
		const ExpandSourceLocation = 'source_location_id';
		const ExpandDestinationLocation = 'destination_location_id';
		const ExpandNewAsset = 'new_asset_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AssetTransactionId
	 * @property-read QQNode $AssetId
	 * @property-read QQNodeAsset $Asset
	 * @property-read QQNode $TransactionId
	 * @property-read QQNodeTransaction $Transaction
	 * @property-read QQNode $ParentAssetTransactionId
	 * @property-read QQNodeAssetTransaction $ParentAssetTransaction
	 * @property-read QQNode $SourceLocationId
	 * @property-read QQNodeLocation $SourceLocation
	 * @property-read QQNode $DestinationLocationId
	 * @property-read QQNodeLocation $DestinationLocation
	 * @property-read QQNode $NewAssetFlag
	 * @property-read QQNode $NewAssetId
	 * @property-read QQNodeAsset $NewAsset
	 * @property-read QQNode $ScheduleReceiptFlag
	 * @property-read QQNode $ScheduleReceiptDueDate
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAssetTransaction $ChildAssetTransaction
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckout
	 */
	class QQNodeAssetTransaction extends QQNode {
		protected $strTableName = 'asset_transaction';
		protected $strPrimaryKey = 'asset_transaction_id';
		protected $strClassName = 'AssetTransaction';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetTransactionId':
					return new QQNode('asset_transaction_id', 'AssetTransactionId', 'integer', $this);
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'Asset':
					return new QQNodeAsset('asset_id', 'Asset', 'integer', $this);
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'Transaction':
					return new QQNodeTransaction('transaction_id', 'Transaction', 'integer', $this);
				case 'ParentAssetTransactionId':
					return new QQNode('parent_asset_transaction_id', 'ParentAssetTransactionId', 'integer', $this);
				case 'ParentAssetTransaction':
					return new QQNodeAssetTransaction('parent_asset_transaction_id', 'ParentAssetTransaction', 'integer', $this);
				case 'SourceLocationId':
					return new QQNode('source_location_id', 'SourceLocationId', 'integer', $this);
				case 'SourceLocation':
					return new QQNodeLocation('source_location_id', 'SourceLocation', 'integer', $this);
				case 'DestinationLocationId':
					return new QQNode('destination_location_id', 'DestinationLocationId', 'integer', $this);
				case 'DestinationLocation':
					return new QQNodeLocation('destination_location_id', 'DestinationLocation', 'integer', $this);
				case 'NewAssetFlag':
					return new QQNode('new_asset_flag', 'NewAssetFlag', 'boolean', $this);
				case 'NewAssetId':
					return new QQNode('new_asset_id', 'NewAssetId', 'integer', $this);
				case 'NewAsset':
					return new QQNodeAsset('new_asset_id', 'NewAsset', 'integer', $this);
				case 'ScheduleReceiptFlag':
					return new QQNode('schedule_receipt_flag', 'ScheduleReceiptFlag', 'boolean', $this);
				case 'ScheduleReceiptDueDate':
					return new QQNode('schedule_receipt_due_date', 'ScheduleReceiptDueDate', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'ModifiedDate', 'string', $this);
				case 'ChildAssetTransaction':
					return new QQReverseReferenceNodeAssetTransaction($this, 'childassettransaction', 'reverse_reference', 'parent_asset_transaction_id');
				case 'AssetTransactionCheckout':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckout', 'reverse_reference', 'asset_transaction_id', 'AssetTransactionCheckout');

				case '_PrimaryKeyNode':
					return new QQNode('asset_transaction_id', 'AssetTransactionId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $AssetTransactionId
	 * @property-read QQNode $AssetId
	 * @property-read QQNodeAsset $Asset
	 * @property-read QQNode $TransactionId
	 * @property-read QQNodeTransaction $Transaction
	 * @property-read QQNode $ParentAssetTransactionId
	 * @property-read QQNodeAssetTransaction $ParentAssetTransaction
	 * @property-read QQNode $SourceLocationId
	 * @property-read QQNodeLocation $SourceLocation
	 * @property-read QQNode $DestinationLocationId
	 * @property-read QQNodeLocation $DestinationLocation
	 * @property-read QQNode $NewAssetFlag
	 * @property-read QQNode $NewAssetId
	 * @property-read QQNodeAsset $NewAsset
	 * @property-read QQNode $ScheduleReceiptFlag
	 * @property-read QQNode $ScheduleReceiptDueDate
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAssetTransaction $ChildAssetTransaction
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckout
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAssetTransaction extends QQReverseReferenceNode {
		protected $strTableName = 'asset_transaction';
		protected $strPrimaryKey = 'asset_transaction_id';
		protected $strClassName = 'AssetTransaction';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetTransactionId':
					return new QQNode('asset_transaction_id', 'AssetTransactionId', 'integer', $this);
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'Asset':
					return new QQNodeAsset('asset_id', 'Asset', 'integer', $this);
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'Transaction':
					return new QQNodeTransaction('transaction_id', 'Transaction', 'integer', $this);
				case 'ParentAssetTransactionId':
					return new QQNode('parent_asset_transaction_id', 'ParentAssetTransactionId', 'integer', $this);
				case 'ParentAssetTransaction':
					return new QQNodeAssetTransaction('parent_asset_transaction_id', 'ParentAssetTransaction', 'integer', $this);
				case 'SourceLocationId':
					return new QQNode('source_location_id', 'SourceLocationId', 'integer', $this);
				case 'SourceLocation':
					return new QQNodeLocation('source_location_id', 'SourceLocation', 'integer', $this);
				case 'DestinationLocationId':
					return new QQNode('destination_location_id', 'DestinationLocationId', 'integer', $this);
				case 'DestinationLocation':
					return new QQNodeLocation('destination_location_id', 'DestinationLocation', 'integer', $this);
				case 'NewAssetFlag':
					return new QQNode('new_asset_flag', 'NewAssetFlag', 'boolean', $this);
				case 'NewAssetId':
					return new QQNode('new_asset_id', 'NewAssetId', 'integer', $this);
				case 'NewAsset':
					return new QQNodeAsset('new_asset_id', 'NewAsset', 'integer', $this);
				case 'ScheduleReceiptFlag':
					return new QQNode('schedule_receipt_flag', 'ScheduleReceiptFlag', 'boolean', $this);
				case 'ScheduleReceiptDueDate':
					return new QQNode('schedule_receipt_due_date', 'ScheduleReceiptDueDate', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'ModifiedDate', 'string', $this);
				case 'ChildAssetTransaction':
					return new QQReverseReferenceNodeAssetTransaction($this, 'childassettransaction', 'reverse_reference', 'parent_asset_transaction_id');
				case 'AssetTransactionCheckout':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckout', 'reverse_reference', 'asset_transaction_id', 'AssetTransactionCheckout');

				case '_PrimaryKeyNode':
					return new QQNode('asset_transaction_id', 'AssetTransactionId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>