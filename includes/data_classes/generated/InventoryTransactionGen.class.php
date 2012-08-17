<?php
	/**
	 * The abstract InventoryTransactionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the InventoryTransaction subclass which
	 * extends this InventoryTransactionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the InventoryTransaction class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $InventoryTransactionId the value for intInventoryTransactionId (Read-Only PK)
	 * @property integer $InventoryLocationId the value for intInventoryLocationId (Not Null)
	 * @property integer $TransactionId the value for intTransactionId (Not Null)
	 * @property integer $Quantity the value for intQuantity (Not Null)
	 * @property integer $SourceLocationId the value for intSourceLocationId 
	 * @property integer $DestinationLocationId the value for intDestinationLocationId 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property InventoryLocation $InventoryLocation the value for the InventoryLocation object referenced by intInventoryLocationId (Not Null)
	 * @property Transaction $Transaction the value for the Transaction object referenced by intTransactionId (Not Null)
	 * @property Location $SourceLocation the value for the Location object referenced by intSourceLocationId 
	 * @property Location $DestinationLocation the value for the Location object referenced by intDestinationLocationId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class InventoryTransactionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column inventory_transaction.inventory_transaction_id
		 * @var integer intInventoryTransactionId
		 */
		protected $intInventoryTransactionId;
		const InventoryTransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.inventory_location_id
		 * @var integer intInventoryLocationId
		 */
		protected $intInventoryLocationId;
		const InventoryLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.transaction_id
		 * @var integer intTransactionId
		 */
		protected $intTransactionId;
		const TransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.quantity
		 * @var integer intQuantity
		 */
		protected $intQuantity;
		const QuantityDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.source_location_id
		 * @var integer intSourceLocationId
		 */
		protected $intSourceLocationId;
		const SourceLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.destination_location_id
		 * @var integer intDestinationLocationId
		 */
		protected $intDestinationLocationId;
		const DestinationLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_transaction.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


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
		 * in the database column inventory_transaction.inventory_location_id.
		 *
		 * NOTE: Always use the InventoryLocation property getter to correctly retrieve this InventoryLocation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var InventoryLocation objInventoryLocation
		 */
		protected $objInventoryLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_transaction.transaction_id.
		 *
		 * NOTE: Always use the Transaction property getter to correctly retrieve this Transaction object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Transaction objTransaction
		 */
		protected $objTransaction;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_transaction.source_location_id.
		 *
		 * NOTE: Always use the SourceLocation property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objSourceLocation
		 */
		protected $objSourceLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_transaction.destination_location_id.
		 *
		 * NOTE: Always use the DestinationLocation property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objDestinationLocation
		 */
		protected $objDestinationLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_transaction.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_transaction.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;





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
		 * Load a InventoryTransaction from PK Info
		 * @param integer $intInventoryTransactionId
		 * @return InventoryTransaction
		 */
		public static function Load($intInventoryTransactionId) {
			// Use QuerySingle to Perform the Query
			return InventoryTransaction::QuerySingle(
				QQ::Equal(QQN::InventoryTransaction()->InventoryTransactionId, $intInventoryTransactionId)
			);
		}

		/**
		 * Load all InventoryTransactions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadAll query
			try {
				return InventoryTransaction::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all InventoryTransactions
		 * @return int
		 */
		public static function CountAll() {
			// Call InventoryTransaction::QueryCount to perform the CountAll query
			return InventoryTransaction::QueryCount(QQ::All());
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
			$objDatabase = InventoryTransaction::GetDatabase();

			// Create/Build out the QueryBuilder object with InventoryTransaction-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'inventory_transaction');
			InventoryTransaction::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('inventory_transaction');

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
		 * Static Qcodo Query method to query for a single InventoryTransaction object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return InventoryTransaction the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = InventoryTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new InventoryTransaction object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = InventoryTransaction::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return InventoryTransaction::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of InventoryTransaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return InventoryTransaction[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = InventoryTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return InventoryTransaction::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = InventoryTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of InventoryTransaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = InventoryTransaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = InventoryTransaction::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'inventory_transaction_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with InventoryTransaction-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				InventoryTransaction::GetSelectFields($objQueryBuilder);
				InventoryTransaction::GetFromFields($objQueryBuilder);

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
			return InventoryTransaction::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this InventoryTransaction
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'inventory_transaction';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'inventory_transaction_id', $strAliasPrefix . 'inventory_transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'inventory_location_id', $strAliasPrefix . 'inventory_location_id');
			$objBuilder->AddSelectItem($strTableName, 'transaction_id', $strAliasPrefix . 'transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'quantity', $strAliasPrefix . 'quantity');
			$objBuilder->AddSelectItem($strTableName, 'source_location_id', $strAliasPrefix . 'source_location_id');
			$objBuilder->AddSelectItem($strTableName, 'destination_location_id', $strAliasPrefix . 'destination_location_id');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a InventoryTransaction from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this InventoryTransaction::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return InventoryTransaction
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the InventoryTransaction object
			$objToReturn = new InventoryTransaction();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'inventory_transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inventory_transaction_id'] : $strAliasPrefix . 'inventory_transaction_id';
			$objToReturn->intInventoryTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'inventory_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inventory_location_id'] : $strAliasPrefix . 'inventory_location_id';
			$objToReturn->intInventoryLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_id'] : $strAliasPrefix . 'transaction_id';
			$objToReturn->intTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity'] : $strAliasPrefix . 'quantity';
			$objToReturn->intQuantity = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'source_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'source_location_id'] : $strAliasPrefix . 'source_location_id';
			$objToReturn->intSourceLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'destination_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'destination_location_id'] : $strAliasPrefix . 'destination_location_id';
			$objToReturn->intDestinationLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'inventory_transaction__';

			// Check for InventoryLocation Early Binding
			$strAlias = $strAliasPrefix . 'inventory_location_id__inventory_location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objInventoryLocation = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventory_location_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Transaction Early Binding
			$strAlias = $strAliasPrefix . 'transaction_id__transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTransaction = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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




			return $objToReturn;
		}

		/**
		 * Instantiate an array of InventoryTransactions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return InventoryTransaction[]
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
					$objItem = InventoryTransaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = InventoryTransaction::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single InventoryTransaction object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return InventoryTransaction next row resulting from the query
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
			return InventoryTransaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single InventoryTransaction object,
		 * by InventoryTransactionId Index(es)
		 * @param integer $intInventoryTransactionId
		 * @return InventoryTransaction
		*/
		public static function LoadByInventoryTransactionId($intInventoryTransactionId, $objOptionalClauses = null) {
			return InventoryTransaction::QuerySingle(
				QQ::Equal(QQN::InventoryTransaction()->InventoryTransactionId, $intInventoryTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryTransaction objects,
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayByTransactionId($intTransactionId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadArrayByTransactionId query
			try {
				return InventoryTransaction::QueryArray(
					QQ::Equal(QQN::InventoryTransaction()->TransactionId, $intTransactionId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryTransactions
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @return int
		*/
		public static function CountByTransactionId($intTransactionId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryCount to perform the CountByTransactionId query
			return InventoryTransaction::QueryCount(
				QQ::Equal(QQN::InventoryTransaction()->TransactionId, $intTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryTransaction objects,
		 * by SourceLocationId Index(es)
		 * @param integer $intSourceLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayBySourceLocationId($intSourceLocationId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadArrayBySourceLocationId query
			try {
				return InventoryTransaction::QueryArray(
					QQ::Equal(QQN::InventoryTransaction()->SourceLocationId, $intSourceLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryTransactions
		 * by SourceLocationId Index(es)
		 * @param integer $intSourceLocationId
		 * @return int
		*/
		public static function CountBySourceLocationId($intSourceLocationId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryCount to perform the CountBySourceLocationId query
			return InventoryTransaction::QueryCount(
				QQ::Equal(QQN::InventoryTransaction()->SourceLocationId, $intSourceLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryTransaction objects,
		 * by DestinationLocationId Index(es)
		 * @param integer $intDestinationLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayByDestinationLocationId($intDestinationLocationId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadArrayByDestinationLocationId query
			try {
				return InventoryTransaction::QueryArray(
					QQ::Equal(QQN::InventoryTransaction()->DestinationLocationId, $intDestinationLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryTransactions
		 * by DestinationLocationId Index(es)
		 * @param integer $intDestinationLocationId
		 * @return int
		*/
		public static function CountByDestinationLocationId($intDestinationLocationId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryCount to perform the CountByDestinationLocationId query
			return InventoryTransaction::QueryCount(
				QQ::Equal(QQN::InventoryTransaction()->DestinationLocationId, $intDestinationLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryTransaction objects,
		 * by InventoryLocationId Index(es)
		 * @param integer $intInventoryLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayByInventoryLocationId($intInventoryLocationId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadArrayByInventoryLocationId query
			try {
				return InventoryTransaction::QueryArray(
					QQ::Equal(QQN::InventoryTransaction()->InventoryLocationId, $intInventoryLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryTransactions
		 * by InventoryLocationId Index(es)
		 * @param integer $intInventoryLocationId
		 * @return int
		*/
		public static function CountByInventoryLocationId($intInventoryLocationId, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryCount to perform the CountByInventoryLocationId query
			return InventoryTransaction::QueryCount(
				QQ::Equal(QQN::InventoryTransaction()->InventoryLocationId, $intInventoryLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryTransaction objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return InventoryTransaction::QueryArray(
					QQ::Equal(QQN::InventoryTransaction()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryTransactions
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryCount to perform the CountByCreatedBy query
			return InventoryTransaction::QueryCount(
				QQ::Equal(QQN::InventoryTransaction()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryTransaction objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return InventoryTransaction::QueryArray(
					QQ::Equal(QQN::InventoryTransaction()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryTransactions
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call InventoryTransaction::QueryCount to perform the CountByModifiedBy query
			return InventoryTransaction::QueryCount(
				QQ::Equal(QQN::InventoryTransaction()->ModifiedBy, $intModifiedBy)
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
		 * Save this InventoryTransaction
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = InventoryTransaction::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `inventory_transaction` (
							`inventory_location_id`,
							`transaction_id`,
							`quantity`,
							`source_location_id`,
							`destination_location_id`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intInventoryLocationId) . ',
							' . $objDatabase->SqlVariable($this->intTransactionId) . ',
							' . $objDatabase->SqlVariable($this->intQuantity) . ',
							' . $objDatabase->SqlVariable($this->intSourceLocationId) . ',
							' . $objDatabase->SqlVariable($this->intDestinationLocationId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intInventoryTransactionId = $objDatabase->InsertId('inventory_transaction', 'inventory_transaction_id');

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
								`inventory_transaction`
							WHERE
								`inventory_transaction_id` = ' . $objDatabase->SqlVariable($this->intInventoryTransactionId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('InventoryTransaction');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`inventory_transaction`
						SET
							`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . ',
							`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . ',
							`quantity` = ' . $objDatabase->SqlVariable($this->intQuantity) . ',
							`source_location_id` = ' . $objDatabase->SqlVariable($this->intSourceLocationId) . ',
							`destination_location_id` = ' . $objDatabase->SqlVariable($this->intDestinationLocationId) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`inventory_transaction_id` = ' . $objDatabase->SqlVariable($this->intInventoryTransactionId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
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
					`inventory_transaction`
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($this->intInventoryTransactionId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this InventoryTransaction
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intInventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this InventoryTransaction with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = InventoryTransaction::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($this->intInventoryTransactionId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all InventoryTransactions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = InventoryTransaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`');
		}

		/**
		 * Truncate inventory_transaction table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = InventoryTransaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `inventory_transaction`');
		}

		/**
		 * Reload this InventoryTransaction from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved InventoryTransaction object.');

			// Reload the Object
			$objReloaded = InventoryTransaction::Load($this->intInventoryTransactionId);

			// Update $this's local variables to match
			$this->InventoryLocationId = $objReloaded->InventoryLocationId;
			$this->TransactionId = $objReloaded->TransactionId;
			$this->intQuantity = $objReloaded->intQuantity;
			$this->SourceLocationId = $objReloaded->SourceLocationId;
			$this->DestinationLocationId = $objReloaded->DestinationLocationId;
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
			$objDatabase = InventoryTransaction::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `inventory_transaction` (
					`inventory_transaction_id`,
					`inventory_location_id`,
					`transaction_id`,
					`quantity`,
					`source_location_id`,
					`destination_location_id`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intInventoryTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intInventoryLocationId) . ',
					' . $objDatabase->SqlVariable($this->intTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intQuantity) . ',
					' . $objDatabase->SqlVariable($this->intSourceLocationId) . ',
					' . $objDatabase->SqlVariable($this->intDestinationLocationId) . ',
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
		 * @param integer intInventoryTransactionId
		 * @return InventoryTransaction[]
		 */
		public static function GetJournalForId($intInventoryTransactionId) {
			$objDatabase = InventoryTransaction::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM inventory_transaction WHERE inventory_transaction_id = ' .
				$objDatabase->SqlVariable($intInventoryTransactionId) . ' ORDER BY __sys_date');

			return InventoryTransaction::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return InventoryTransaction[]
		 */
		public function GetJournal() {
			return InventoryTransaction::GetJournalForId($this->intInventoryTransactionId);
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
				case 'InventoryTransactionId':
					// Gets the value for intInventoryTransactionId (Read-Only PK)
					// @return integer
					return $this->intInventoryTransactionId;

				case 'InventoryLocationId':
					// Gets the value for intInventoryLocationId (Not Null)
					// @return integer
					return $this->intInventoryLocationId;

				case 'TransactionId':
					// Gets the value for intTransactionId (Not Null)
					// @return integer
					return $this->intTransactionId;

				case 'Quantity':
					// Gets the value for intQuantity (Not Null)
					// @return integer
					return $this->intQuantity;

				case 'SourceLocationId':
					// Gets the value for intSourceLocationId 
					// @return integer
					return $this->intSourceLocationId;

				case 'DestinationLocationId':
					// Gets the value for intDestinationLocationId 
					// @return integer
					return $this->intDestinationLocationId;

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
				case 'InventoryLocation':
					// Gets the value for the InventoryLocation object referenced by intInventoryLocationId (Not Null)
					// @return InventoryLocation
					try {
						if ((!$this->objInventoryLocation) && (!is_null($this->intInventoryLocationId)))
							$this->objInventoryLocation = InventoryLocation::Load($this->intInventoryLocationId);
						return $this->objInventoryLocation;
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
				case 'InventoryLocationId':
					// Sets the value for intInventoryLocationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objInventoryLocation = null;
						return ($this->intInventoryLocationId = QType::Cast($mixValue, QType::Integer));
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

				case 'Quantity':
					// Sets the value for intQuantity (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantity = QType::Cast($mixValue, QType::Integer));
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
				case 'InventoryLocation':
					// Sets the value for the InventoryLocation object referenced by intInventoryLocationId (Not Null)
					// @param InventoryLocation $mixValue
					// @return InventoryLocation
					if (is_null($mixValue)) {
						$this->intInventoryLocationId = null;
						$this->objInventoryLocation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a InventoryLocation object
						try {
							$mixValue = QType::Cast($mixValue, 'InventoryLocation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED InventoryLocation object
						if (is_null($mixValue->InventoryLocationId))
							throw new QCallerException('Unable to set an unsaved InventoryLocation for this InventoryTransaction');

						// Update Local Member Variables
						$this->objInventoryLocation = $mixValue;
						$this->intInventoryLocationId = $mixValue->InventoryLocationId;

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
							throw new QCallerException('Unable to set an unsaved Transaction for this InventoryTransaction');

						// Update Local Member Variables
						$this->objTransaction = $mixValue;
						$this->intTransactionId = $mixValue->TransactionId;

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
							throw new QCallerException('Unable to set an unsaved SourceLocation for this InventoryTransaction');

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
							throw new QCallerException('Unable to set an unsaved DestinationLocation for this InventoryTransaction');

						// Update Local Member Variables
						$this->objDestinationLocation = $mixValue;
						$this->intDestinationLocationId = $mixValue->LocationId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this InventoryTransaction');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this InventoryTransaction');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="InventoryTransaction"><sequence>';
			$strToReturn .= '<element name="InventoryTransactionId" type="xsd:int"/>';
			$strToReturn .= '<element name="InventoryLocation" type="xsd1:InventoryLocation"/>';
			$strToReturn .= '<element name="Transaction" type="xsd1:Transaction"/>';
			$strToReturn .= '<element name="Quantity" type="xsd:int"/>';
			$strToReturn .= '<element name="SourceLocation" type="xsd1:Location"/>';
			$strToReturn .= '<element name="DestinationLocation" type="xsd1:Location"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('InventoryTransaction', $strComplexTypeArray)) {
				$strComplexTypeArray['InventoryTransaction'] = InventoryTransaction::GetSoapComplexTypeXml();
				InventoryLocation::AlterSoapComplexTypeArray($strComplexTypeArray);
				Transaction::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, InventoryTransaction::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new InventoryTransaction();
			if (property_exists($objSoapObject, 'InventoryTransactionId'))
				$objToReturn->intInventoryTransactionId = $objSoapObject->InventoryTransactionId;
			if ((property_exists($objSoapObject, 'InventoryLocation')) &&
				($objSoapObject->InventoryLocation))
				$objToReturn->InventoryLocation = InventoryLocation::GetObjectFromSoapObject($objSoapObject->InventoryLocation);
			if ((property_exists($objSoapObject, 'Transaction')) &&
				($objSoapObject->Transaction))
				$objToReturn->Transaction = Transaction::GetObjectFromSoapObject($objSoapObject->Transaction);
			if (property_exists($objSoapObject, 'Quantity'))
				$objToReturn->intQuantity = $objSoapObject->Quantity;
			if ((property_exists($objSoapObject, 'SourceLocation')) &&
				($objSoapObject->SourceLocation))
				$objToReturn->SourceLocation = Location::GetObjectFromSoapObject($objSoapObject->SourceLocation);
			if ((property_exists($objSoapObject, 'DestinationLocation')) &&
				($objSoapObject->DestinationLocation))
				$objToReturn->DestinationLocation = Location::GetObjectFromSoapObject($objSoapObject->DestinationLocation);
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
				array_push($objArrayToReturn, InventoryTransaction::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objInventoryLocation)
				$objObject->objInventoryLocation = InventoryLocation::GetSoapObjectFromObject($objObject->objInventoryLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intInventoryLocationId = null;
			if ($objObject->objTransaction)
				$objObject->objTransaction = Transaction::GetSoapObjectFromObject($objObject->objTransaction, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransactionId = null;
			if ($objObject->objSourceLocation)
				$objObject->objSourceLocation = Location::GetSoapObjectFromObject($objObject->objSourceLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSourceLocationId = null;
			if ($objObject->objDestinationLocation)
				$objObject->objDestinationLocation = Location::GetSoapObjectFromObject($objObject->objDestinationLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDestinationLocationId = null;
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
				$objQueryExpansion = new QQueryExpansion('InventoryTransaction', 'inventory_transaction', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `inventory_transaction` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`inventory_transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`inventory_transaction_id` AS `%s__%s__inventory_transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`inventory_location_id` AS `%s__%s__inventory_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_id` AS `%s__%s__transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`quantity` AS `%s__%s__quantity`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`source_location_id` AS `%s__%s__source_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`destination_location_id` AS `%s__%s__destination_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'inventory_location_id':
							try {
								InventoryLocation::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandInventoryLocation = 'inventory_location_id';
		const ExpandTransaction = 'transaction_id';
		const ExpandSourceLocation = 'source_location_id';
		const ExpandDestinationLocation = 'destination_location_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $InventoryTransactionId
	 * @property-read QQNode $InventoryLocationId
	 * @property-read QQNodeInventoryLocation $InventoryLocation
	 * @property-read QQNode $TransactionId
	 * @property-read QQNodeTransaction $Transaction
	 * @property-read QQNode $Quantity
	 * @property-read QQNode $SourceLocationId
	 * @property-read QQNodeLocation $SourceLocation
	 * @property-read QQNode $DestinationLocationId
	 * @property-read QQNodeLocation $DestinationLocation
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 */
	class QQNodeInventoryTransaction extends QQNode {
		protected $strTableName = 'inventory_transaction';
		protected $strPrimaryKey = 'inventory_transaction_id';
		protected $strClassName = 'InventoryTransaction';
		public function __get($strName) {
			switch ($strName) {
				case 'InventoryTransactionId':
					return new QQNode('inventory_transaction_id', 'InventoryTransactionId', 'integer', $this);
				case 'InventoryLocationId':
					return new QQNode('inventory_location_id', 'InventoryLocationId', 'integer', $this);
				case 'InventoryLocation':
					return new QQNodeInventoryLocation('inventory_location_id', 'InventoryLocation', 'integer', $this);
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'Transaction':
					return new QQNodeTransaction('transaction_id', 'Transaction', 'integer', $this);
				case 'Quantity':
					return new QQNode('quantity', 'Quantity', 'integer', $this);
				case 'SourceLocationId':
					return new QQNode('source_location_id', 'SourceLocationId', 'integer', $this);
				case 'SourceLocation':
					return new QQNodeLocation('source_location_id', 'SourceLocation', 'integer', $this);
				case 'DestinationLocationId':
					return new QQNode('destination_location_id', 'DestinationLocationId', 'integer', $this);
				case 'DestinationLocation':
					return new QQNodeLocation('destination_location_id', 'DestinationLocation', 'integer', $this);
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

				case '_PrimaryKeyNode':
					return new QQNode('inventory_transaction_id', 'InventoryTransactionId', 'integer', $this);
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
	 * @property-read QQNode $InventoryTransactionId
	 * @property-read QQNode $InventoryLocationId
	 * @property-read QQNodeInventoryLocation $InventoryLocation
	 * @property-read QQNode $TransactionId
	 * @property-read QQNodeTransaction $Transaction
	 * @property-read QQNode $Quantity
	 * @property-read QQNode $SourceLocationId
	 * @property-read QQNodeLocation $SourceLocation
	 * @property-read QQNode $DestinationLocationId
	 * @property-read QQNodeLocation $DestinationLocation
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeInventoryTransaction extends QQReverseReferenceNode {
		protected $strTableName = 'inventory_transaction';
		protected $strPrimaryKey = 'inventory_transaction_id';
		protected $strClassName = 'InventoryTransaction';
		public function __get($strName) {
			switch ($strName) {
				case 'InventoryTransactionId':
					return new QQNode('inventory_transaction_id', 'InventoryTransactionId', 'integer', $this);
				case 'InventoryLocationId':
					return new QQNode('inventory_location_id', 'InventoryLocationId', 'integer', $this);
				case 'InventoryLocation':
					return new QQNodeInventoryLocation('inventory_location_id', 'InventoryLocation', 'integer', $this);
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'Transaction':
					return new QQNodeTransaction('transaction_id', 'Transaction', 'integer', $this);
				case 'Quantity':
					return new QQNode('quantity', 'Quantity', 'integer', $this);
				case 'SourceLocationId':
					return new QQNode('source_location_id', 'SourceLocationId', 'integer', $this);
				case 'SourceLocation':
					return new QQNodeLocation('source_location_id', 'SourceLocation', 'integer', $this);
				case 'DestinationLocationId':
					return new QQNode('destination_location_id', 'DestinationLocationId', 'integer', $this);
				case 'DestinationLocation':
					return new QQNodeLocation('destination_location_id', 'DestinationLocation', 'integer', $this);
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

				case '_PrimaryKeyNode':
					return new QQNode('inventory_transaction_id', 'InventoryTransactionId', 'integer', $this);
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