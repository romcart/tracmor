<?php
	/**
	 * The abstract TransactionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Transaction subclass which
	 * extends this TransactionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Transaction class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $TransactionId the value for intTransactionId (Read-Only PK)
	 * @property integer $EntityQtypeId the value for intEntityQtypeId (Not Null)
	 * @property integer $TransactionTypeId the value for intTransactionTypeId (Not Null)
	 * @property string $Note the value for strNote 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property TransactionType $TransactionType the value for the TransactionType object referenced by intTransactionTypeId (Not Null)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property Receipt $Receipt the value for the Receipt object that uniquely references this Transaction
	 * @property Shipment $Shipment the value for the Shipment object that uniquely references this Transaction
	 * @property AssetTransaction $_AssetTransaction the value for the private _objAssetTransaction (Read-Only) if set due to an expansion on the asset_transaction.transaction_id reverse relationship
	 * @property AssetTransaction[] $_AssetTransactionArray the value for the private _objAssetTransactionArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction.transaction_id reverse relationship
	 * @property InventoryTransaction $_InventoryTransaction the value for the private _objInventoryTransaction (Read-Only) if set due to an expansion on the inventory_transaction.transaction_id reverse relationship
	 * @property InventoryTransaction[] $_InventoryTransactionArray the value for the private _objInventoryTransactionArray (Read-Only) if set due to an ExpandAsArray on the inventory_transaction.transaction_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TransactionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column transaction.transaction_id
		 * @var integer intTransactionId
		 */
		protected $intTransactionId;
		const TransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.entity_qtype_id
		 * @var integer intEntityQtypeId
		 */
		protected $intEntityQtypeId;
		const EntityQtypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.transaction_type_id
		 * @var integer intTransactionTypeId
		 */
		protected $intTransactionTypeId;
		const TransactionTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.note
		 * @var string strNote
		 */
		protected $strNote;
		const NoteDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single AssetTransaction object
		 * (of type AssetTransaction), if this Transaction object was restored with
		 * an expansion on the asset_transaction association table.
		 * @var AssetTransaction _objAssetTransaction;
		 */
		private $_objAssetTransaction;

		/**
		 * Private member variable that stores a reference to an array of AssetTransaction objects
		 * (of type AssetTransaction[]), if this Transaction object was restored with
		 * an ExpandAsArray on the asset_transaction association table.
		 * @var AssetTransaction[] _objAssetTransactionArray;
		 */
		private $_objAssetTransactionArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryTransaction object
		 * (of type InventoryTransaction), if this Transaction object was restored with
		 * an expansion on the inventory_transaction association table.
		 * @var InventoryTransaction _objInventoryTransaction;
		 */
		private $_objInventoryTransaction;

		/**
		 * Private member variable that stores a reference to an array of InventoryTransaction objects
		 * (of type InventoryTransaction[]), if this Transaction object was restored with
		 * an ExpandAsArray on the inventory_transaction association table.
		 * @var InventoryTransaction[] _objInventoryTransactionArray;
		 */
		private $_objInventoryTransactionArray = array();

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
		 * in the database column transaction.transaction_type_id.
		 *
		 * NOTE: Always use the TransactionType property getter to correctly retrieve this TransactionType object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TransactionType objTransactionType
		 */
		protected $objTransactionType;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column transaction.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column transaction.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column receipt.transaction_id.
		 *
		 * NOTE: Always use the Receipt property getter to correctly retrieve this Receipt object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Receipt objReceipt
		 */
		protected $objReceipt;
		
		/**
		 * Used internally to manage whether the adjoined Receipt object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyReceipt;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column shipment.transaction_id.
		 *
		 * NOTE: Always use the Shipment property getter to correctly retrieve this Shipment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Shipment objShipment
		 */
		protected $objShipment;
		
		/**
		 * Used internally to manage whether the adjoined Shipment object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyShipment;





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
		 * Load a Transaction from PK Info
		 * @param integer $intTransactionId
		 * @return Transaction
		 */
		public static function Load($intTransactionId) {
			// Use QuerySingle to Perform the Query
			return Transaction::QuerySingle(
				QQ::Equal(QQN::Transaction()->TransactionId, $intTransactionId)
			);
		}

		/**
		 * Load all Transactions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadAll query
			try {
				return Transaction::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Transactions
		 * @return int
		 */
		public static function CountAll() {
			// Call Transaction::QueryCount to perform the CountAll query
			return Transaction::QueryCount(QQ::All());
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
			$objDatabase = Transaction::GetDatabase();

			// Create/Build out the QueryBuilder object with Transaction-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'transaction');
			Transaction::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('transaction');

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
		 * Static Qcodo Query method to query for a single Transaction object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transaction the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Transaction object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Transaction::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Transaction::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Transaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transaction[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Transaction::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Transaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Transaction::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'transaction_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Transaction-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Transaction::GetSelectFields($objQueryBuilder);
				Transaction::GetFromFields($objQueryBuilder);

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
			return Transaction::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Transaction
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'transaction';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'transaction_id', $strAliasPrefix . 'transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'entity_qtype_id', $strAliasPrefix . 'entity_qtype_id');
			$objBuilder->AddSelectItem($strTableName, 'transaction_type_id', $strAliasPrefix . 'transaction_type_id');
			$objBuilder->AddSelectItem($strTableName, 'note', $strAliasPrefix . 'note');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Transaction from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Transaction::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Transaction
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intTransactionId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'transaction__';


				$strAlias = $strAliasPrefix . 'assettransaction__asset_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorytransaction__inventory_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryTransactionArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'transaction__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Transaction object
			$objToReturn = new Transaction();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_id'] : $strAliasPrefix . 'transaction_id';
			$objToReturn->intTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'entity_qtype_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'entity_qtype_id'] : $strAliasPrefix . 'entity_qtype_id';
			$objToReturn->intEntityQtypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_type_id'] : $strAliasPrefix . 'transaction_type_id';
			$objToReturn->intTransactionTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'note', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'note'] : $strAliasPrefix . 'note';
			$objToReturn->strNote = $objDbRow->GetColumn($strAliasName, 'Blob');
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
				$strAliasPrefix = 'transaction__';

			// Check for TransactionType Early Binding
			$strAlias = $strAliasPrefix . 'transaction_type_id__transaction_type_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTransactionType = TransactionType::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction_type_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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


			// Check for Receipt Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'receipt__receipt_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objReceipt = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receipt__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objReceipt = false;
			}

			// Check for Shipment Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'shipment__shipment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objShipment = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objShipment = false;
			}



			// Check for AssetTransaction Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransaction__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransaction = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryTransaction Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorytransaction__inventory_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryTransactionArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryTransaction = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Transactions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Transaction[]
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
					$objItem = Transaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Transaction::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Transaction object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Transaction next row resulting from the query
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
			return Transaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Transaction object,
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @return Transaction
		*/
		public static function LoadByTransactionId($intTransactionId, $objOptionalClauses = null) {
			return Transaction::QuerySingle(
				QQ::Equal(QQN::Transaction()->TransactionId, $intTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transaction objects,
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/
		public static function LoadArrayByTransactionTypeId($intTransactionTypeId, $objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadArrayByTransactionTypeId query
			try {
				return Transaction::QueryArray(
					QQ::Equal(QQN::Transaction()->TransactionTypeId, $intTransactionTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transactions
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @return int
		*/
		public static function CountByTransactionTypeId($intTransactionTypeId, $objOptionalClauses = null) {
			// Call Transaction::QueryCount to perform the CountByTransactionTypeId query
			return Transaction::QueryCount(
				QQ::Equal(QQN::Transaction()->TransactionTypeId, $intTransactionTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transaction objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Transaction::QueryArray(
					QQ::Equal(QQN::Transaction()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transactions
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Transaction::QueryCount to perform the CountByCreatedBy query
			return Transaction::QueryCount(
				QQ::Equal(QQN::Transaction()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transaction objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Transaction::QueryArray(
					QQ::Equal(QQN::Transaction()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transactions
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Transaction::QueryCount to perform the CountByModifiedBy query
			return Transaction::QueryCount(
				QQ::Equal(QQN::Transaction()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transaction objects,
		 * by EntityQtypeId Index(es)
		 * @param integer $intEntityQtypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/
		public static function LoadArrayByEntityQtypeId($intEntityQtypeId, $objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadArrayByEntityQtypeId query
			try {
				return Transaction::QueryArray(
					QQ::Equal(QQN::Transaction()->EntityQtypeId, $intEntityQtypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transactions
		 * by EntityQtypeId Index(es)
		 * @param integer $intEntityQtypeId
		 * @return int
		*/
		public static function CountByEntityQtypeId($intEntityQtypeId, $objOptionalClauses = null) {
			// Call Transaction::QueryCount to perform the CountByEntityQtypeId query
			return Transaction::QueryCount(
				QQ::Equal(QQN::Transaction()->EntityQtypeId, $intEntityQtypeId)
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
		 * Save this Transaction
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `transaction` (
							`entity_qtype_id`,
							`transaction_type_id`,
							`note`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
							' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
							' . $objDatabase->SqlVariable($this->strNote) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intTransactionId = $objDatabase->InsertId('transaction', 'transaction_id');

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
								`transaction`
							WHERE
								`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('Transaction');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`transaction`
						SET
							`entity_qtype_id` = ' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
							`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
							`note` = ' . $objDatabase->SqlVariable($this->strNote) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined Receipt object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyReceipt) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = Receipt::LoadByTransactionId($this->intTransactionId)) {
						$objAssociated->TransactionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objReceipt) {
						$this->objReceipt->TransactionId = $this->intTransactionId;
						$this->objReceipt->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyReceipt = false;
				}
		
		
				// Update the adjoined Shipment object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyShipment) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = Shipment::LoadByTransactionId($this->intTransactionId)) {
						$objAssociated->TransactionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objShipment) {
						$this->objShipment->TransactionId = $this->intTransactionId;
						$this->objShipment->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyShipment = false;
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
					`transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Transaction
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Transaction with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			
			
			// Update the adjoined Receipt object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Receipt::LoadByTransactionId($this->intTransactionId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined Shipment object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Shipment::LoadByTransactionId($this->intTransactionId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Transactions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`');
		}

		/**
		 * Truncate transaction table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `transaction`');
		}

		/**
		 * Reload this Transaction from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Transaction object.');

			// Reload the Object
			$objReloaded = Transaction::Load($this->intTransactionId);

			// Update $this's local variables to match
			$this->EntityQtypeId = $objReloaded->EntityQtypeId;
			$this->TransactionTypeId = $objReloaded->TransactionTypeId;
			$this->strNote = $objReloaded->strNote;
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
			$objDatabase = Transaction::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `transaction` (
					`transaction_id`,
					`entity_qtype_id`,
					`transaction_type_id`,
					`note`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
					' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
					' . $objDatabase->SqlVariable($this->strNote) . ',
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
		 * @param integer intTransactionId
		 * @return Transaction[]
		 */
		public static function GetJournalForId($intTransactionId) {
			$objDatabase = Transaction::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM transaction WHERE transaction_id = ' .
				$objDatabase->SqlVariable($intTransactionId) . ' ORDER BY __sys_date');

			return Transaction::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Transaction[]
		 */
		public function GetJournal() {
			return Transaction::GetJournalForId($this->intTransactionId);
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
				case 'TransactionId':
					// Gets the value for intTransactionId (Read-Only PK)
					// @return integer
					return $this->intTransactionId;

				case 'EntityQtypeId':
					// Gets the value for intEntityQtypeId (Not Null)
					// @return integer
					return $this->intEntityQtypeId;

				case 'TransactionTypeId':
					// Gets the value for intTransactionTypeId (Not Null)
					// @return integer
					return $this->intTransactionTypeId;

				case 'Note':
					// Gets the value for strNote 
					// @return string
					return $this->strNote;

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
				case 'TransactionType':
					// Gets the value for the TransactionType object referenced by intTransactionTypeId (Not Null)
					// @return TransactionType
					try {
						if ((!$this->objTransactionType) && (!is_null($this->intTransactionTypeId)))
							$this->objTransactionType = TransactionType::Load($this->intTransactionTypeId);
						return $this->objTransactionType;
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

		
		
				case 'Receipt':
					// Gets the value for the Receipt object that uniquely references this Transaction
					// by objReceipt (Unique)
					// @return Receipt
					try {
						if ($this->objReceipt === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objReceipt)
							$this->objReceipt = Receipt::LoadByTransactionId($this->intTransactionId);
						return $this->objReceipt;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'Shipment':
					// Gets the value for the Shipment object that uniquely references this Transaction
					// by objShipment (Unique)
					// @return Shipment
					try {
						if ($this->objShipment === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objShipment)
							$this->objShipment = Shipment::LoadByTransactionId($this->intTransactionId);
						return $this->objShipment;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AssetTransaction':
					// Gets the value for the private _objAssetTransaction (Read-Only)
					// if set due to an expansion on the asset_transaction.transaction_id reverse relationship
					// @return AssetTransaction
					return $this->_objAssetTransaction;

				case '_AssetTransactionArray':
					// Gets the value for the private _objAssetTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction.transaction_id reverse relationship
					// @return AssetTransaction[]
					return (array) $this->_objAssetTransactionArray;

				case '_InventoryTransaction':
					// Gets the value for the private _objInventoryTransaction (Read-Only)
					// if set due to an expansion on the inventory_transaction.transaction_id reverse relationship
					// @return InventoryTransaction
					return $this->_objInventoryTransaction;

				case '_InventoryTransactionArray':
					// Gets the value for the private _objInventoryTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_transaction.transaction_id reverse relationship
					// @return InventoryTransaction[]
					return (array) $this->_objInventoryTransactionArray;


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
				case 'EntityQtypeId':
					// Sets the value for intEntityQtypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intEntityQtypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionTypeId':
					// Sets the value for intTransactionTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objTransactionType = null;
						return ($this->intTransactionTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Note':
					// Sets the value for strNote 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNote = QType::Cast($mixValue, QType::String));
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
				case 'TransactionType':
					// Sets the value for the TransactionType object referenced by intTransactionTypeId (Not Null)
					// @param TransactionType $mixValue
					// @return TransactionType
					if (is_null($mixValue)) {
						$this->intTransactionTypeId = null;
						$this->objTransactionType = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TransactionType object
						try {
							$mixValue = QType::Cast($mixValue, 'TransactionType');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED TransactionType object
						if (is_null($mixValue->TransactionTypeId))
							throw new QCallerException('Unable to set an unsaved TransactionType for this Transaction');

						// Update Local Member Variables
						$this->objTransactionType = $mixValue;
						$this->intTransactionTypeId = $mixValue->TransactionTypeId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Transaction');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Transaction');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Receipt':
					// Sets the value for the Receipt object referenced by objReceipt (Unique)
					// @param Receipt $mixValue
					// @return Receipt
					if (is_null($mixValue)) {
						$this->objReceipt = null;

						// Make sure we update the adjoined Receipt object the next time we call Save()
						$this->blnDirtyReceipt = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Receipt object
						try {
							$mixValue = QType::Cast($mixValue, 'Receipt');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objReceipt to a DIFFERENT $mixValue?
						if ((!$this->Receipt) || ($this->Receipt->ReceiptId != $mixValue->ReceiptId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Receipt object the next time we call Save()
							$this->blnDirtyReceipt = true;

							// Update Local Member Variable
							$this->objReceipt = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Shipment':
					// Sets the value for the Shipment object referenced by objShipment (Unique)
					// @param Shipment $mixValue
					// @return Shipment
					if (is_null($mixValue)) {
						$this->objShipment = null;

						// Make sure we update the adjoined Shipment object the next time we call Save()
						$this->blnDirtyShipment = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Shipment object
						try {
							$mixValue = QType::Cast($mixValue, 'Shipment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objShipment to a DIFFERENT $mixValue?
						if ((!$this->Shipment) || ($this->Shipment->ShipmentId != $mixValue->ShipmentId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Shipment object the next time we call Save()
							$this->blnDirtyShipment = true;

							// Update Local Member Variable
							$this->objShipment = $mixValue;
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

			
		
		// Related Objects' Methods for AssetTransaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactions as an array of AssetTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/ 
		public function GetAssetTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intTransactionId)))
				return array();

			try {
				return AssetTransaction::LoadArrayByTransactionId($this->intTransactionId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactions
		 * @return int
		*/ 
		public function CountAssetTransactions() {
			if ((is_null($this->intTransactionId)))
				return 0;

			return AssetTransaction::CountByTransactionId($this->intTransactionId);
		}

		/**
		 * Associates a AssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function AssociateAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransaction on this unsaved Transaction.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransaction on this Transaction with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->TransactionId = $this->intTransactionId;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function UnassociateAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Transaction.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this Transaction with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`transaction_id` = null
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->TransactionId = null;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactions
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactions() {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByTransactionId($this->intTransactionId) as $objAssetTransaction) {
					$objAssetTransaction->TransactionId = null;
					$objAssetTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`transaction_id` = null
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Transaction.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this Transaction with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactions
		 * @return void
		*/ 
		public function DeleteAllAssetTransactions() {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByTransactionId($this->intTransactionId) as $objAssetTransaction) {
					$objAssetTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryTransaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryTransactions as an array of InventoryTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/ 
		public function GetInventoryTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intTransactionId)))
				return array();

			try {
				return InventoryTransaction::LoadArrayByTransactionId($this->intTransactionId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryTransactions
		 * @return int
		*/ 
		public function CountInventoryTransactions() {
			if ((is_null($this->intTransactionId)))
				return 0;

			return InventoryTransaction::CountByTransactionId($this->intTransactionId);
		}

		/**
		 * Associates a InventoryTransaction
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function AssociateInventoryTransaction(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransaction on this unsaved Transaction.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransaction on this Transaction with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->TransactionId = $this->intTransactionId;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryTransaction
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function UnassociateInventoryTransaction(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved Transaction.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this Transaction with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`transaction_id` = null
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->TransactionId = null;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryTransactions
		 * @return void
		*/ 
		public function UnassociateAllInventoryTransactions() {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByTransactionId($this->intTransactionId) as $objInventoryTransaction) {
					$objInventoryTransaction->TransactionId = null;
					$objInventoryTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`transaction_id` = null
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');
		}

		/**
		 * Deletes an associated InventoryTransaction
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryTransaction(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved Transaction.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this Transaction with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryTransactions
		 * @return void
		*/ 
		public function DeleteAllInventoryTransactions() {
			if ((is_null($this->intTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByTransactionId($this->intTransactionId) as $objInventoryTransaction) {
					$objInventoryTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Transaction"><sequence>';
			$strToReturn .= '<element name="TransactionId" type="xsd:int"/>';
			$strToReturn .= '<element name="EntityQtypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="TransactionType" type="xsd1:TransactionType"/>';
			$strToReturn .= '<element name="Note" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Transaction', $strComplexTypeArray)) {
				$strComplexTypeArray['Transaction'] = Transaction::GetSoapComplexTypeXml();
				TransactionType::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Transaction::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Transaction();
			if (property_exists($objSoapObject, 'TransactionId'))
				$objToReturn->intTransactionId = $objSoapObject->TransactionId;
			if (property_exists($objSoapObject, 'EntityQtypeId'))
				$objToReturn->intEntityQtypeId = $objSoapObject->EntityQtypeId;
			if ((property_exists($objSoapObject, 'TransactionType')) &&
				($objSoapObject->TransactionType))
				$objToReturn->TransactionType = TransactionType::GetObjectFromSoapObject($objSoapObject->TransactionType);
			if (property_exists($objSoapObject, 'Note'))
				$objToReturn->strNote = $objSoapObject->Note;
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
				array_push($objArrayToReturn, Transaction::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objTransactionType)
				$objObject->objTransactionType = TransactionType::GetSoapObjectFromObject($objObject->objTransactionType, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransactionTypeId = null;
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
				$objQueryExpansion = new QQueryExpansion('Transaction', 'transaction', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `transaction` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_id` AS `%s__%s__transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`entity_qtype_id` AS `%s__%s__entity_qtype_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_type_id` AS `%s__%s__transaction_type_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`note` AS `%s__%s__note`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'transaction_type_id':
							try {
								TransactionType::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandTransactionType = 'transaction_type_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $TransactionId
	 * @property-read QQNode $EntityQtypeId
	 * @property-read QQNode $TransactionTypeId
	 * @property-read QQNodeTransactionType $TransactionType
	 * @property-read QQNode $Note
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransaction
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransaction
	 * @property-read QQReverseReferenceNodeReceipt $Receipt
	 * @property-read QQReverseReferenceNodeShipment $Shipment
	 */
	class QQNodeTransaction extends QQNode {
		protected $strTableName = 'transaction';
		protected $strPrimaryKey = 'transaction_id';
		protected $strClassName = 'Transaction';
		public function __get($strName) {
			switch ($strName) {
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'EntityQtypeId':
					return new QQNode('entity_qtype_id', 'EntityQtypeId', 'integer', $this);
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
				case 'TransactionType':
					return new QQNodeTransactionType('transaction_type_id', 'TransactionType', 'integer', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);
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
				case 'AssetTransaction':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransaction', 'reverse_reference', 'transaction_id');
				case 'InventoryTransaction':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransaction', 'reverse_reference', 'transaction_id');
				case 'Receipt':
					return new QQReverseReferenceNodeReceipt($this, 'receipt', 'reverse_reference', 'transaction_id', 'Receipt');
				case 'Shipment':
					return new QQReverseReferenceNodeShipment($this, 'shipment', 'reverse_reference', 'transaction_id', 'Shipment');

				case '_PrimaryKeyNode':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
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
	 * @property-read QQNode $TransactionId
	 * @property-read QQNode $EntityQtypeId
	 * @property-read QQNode $TransactionTypeId
	 * @property-read QQNodeTransactionType $TransactionType
	 * @property-read QQNode $Note
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransaction
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransaction
	 * @property-read QQReverseReferenceNodeReceipt $Receipt
	 * @property-read QQReverseReferenceNodeShipment $Shipment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeTransaction extends QQReverseReferenceNode {
		protected $strTableName = 'transaction';
		protected $strPrimaryKey = 'transaction_id';
		protected $strClassName = 'Transaction';
		public function __get($strName) {
			switch ($strName) {
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'EntityQtypeId':
					return new QQNode('entity_qtype_id', 'EntityQtypeId', 'integer', $this);
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
				case 'TransactionType':
					return new QQNodeTransactionType('transaction_type_id', 'TransactionType', 'integer', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);
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
				case 'AssetTransaction':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransaction', 'reverse_reference', 'transaction_id');
				case 'InventoryTransaction':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransaction', 'reverse_reference', 'transaction_id');
				case 'Receipt':
					return new QQReverseReferenceNodeReceipt($this, 'receipt', 'reverse_reference', 'transaction_id', 'Receipt');
				case 'Shipment':
					return new QQReverseReferenceNodeShipment($this, 'shipment', 'reverse_reference', 'transaction_id', 'Shipment');

				case '_PrimaryKeyNode':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
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