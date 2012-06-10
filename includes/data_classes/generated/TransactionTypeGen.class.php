<?php
	/**
	 * The abstract TransactionTypeGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TransactionType subclass which
	 * extends this TransactionTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TransactionType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $TransactionTypeId the value for intTransactionTypeId (Read-Only PK)
	 * @property string $ShortDescription the value for strShortDescription (Unique)
	 * @property boolean $AssetFlag the value for blnAssetFlag (Not Null)
	 * @property boolean $InventoryFlag the value for blnInventoryFlag (Not Null)
	 * @property RoleTransactionTypeAuthorization $_RoleTransactionTypeAuthorization the value for the private _objRoleTransactionTypeAuthorization (Read-Only) if set due to an expansion on the role_transaction_type_authorization.transaction_type_id reverse relationship
	 * @property RoleTransactionTypeAuthorization[] $_RoleTransactionTypeAuthorizationArray the value for the private _objRoleTransactionTypeAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_transaction_type_authorization.transaction_type_id reverse relationship
	 * @property Shortcut $_Shortcut the value for the private _objShortcut (Read-Only) if set due to an expansion on the shortcut.transaction_type_id reverse relationship
	 * @property Shortcut[] $_ShortcutArray the value for the private _objShortcutArray (Read-Only) if set due to an ExpandAsArray on the shortcut.transaction_type_id reverse relationship
	 * @property Transaction $_Transaction the value for the private _objTransaction (Read-Only) if set due to an expansion on the transaction.transaction_type_id reverse relationship
	 * @property Transaction[] $_TransactionArray the value for the private _objTransactionArray (Read-Only) if set due to an ExpandAsArray on the transaction.transaction_type_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TransactionTypeGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column transaction_type.transaction_type_id
		 * @var integer intTransactionTypeId
		 */
		protected $intTransactionTypeId;
		const TransactionTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction_type.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 50;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction_type.asset_flag
		 * @var boolean blnAssetFlag
		 */
		protected $blnAssetFlag;
		const AssetFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction_type.inventory_flag
		 * @var boolean blnInventoryFlag
		 */
		protected $blnInventoryFlag;
		const InventoryFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single RoleTransactionTypeAuthorization object
		 * (of type RoleTransactionTypeAuthorization), if this TransactionType object was restored with
		 * an expansion on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization _objRoleTransactionTypeAuthorization;
		 */
		private $_objRoleTransactionTypeAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleTransactionTypeAuthorization objects
		 * (of type RoleTransactionTypeAuthorization[]), if this TransactionType object was restored with
		 * an ExpandAsArray on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization[] _objRoleTransactionTypeAuthorizationArray;
		 */
		private $_objRoleTransactionTypeAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single Shortcut object
		 * (of type Shortcut), if this TransactionType object was restored with
		 * an expansion on the shortcut association table.
		 * @var Shortcut _objShortcut;
		 */
		private $_objShortcut;

		/**
		 * Private member variable that stores a reference to an array of Shortcut objects
		 * (of type Shortcut[]), if this TransactionType object was restored with
		 * an ExpandAsArray on the shortcut association table.
		 * @var Shortcut[] _objShortcutArray;
		 */
		private $_objShortcutArray = array();

		/**
		 * Private member variable that stores a reference to a single Transaction object
		 * (of type Transaction), if this TransactionType object was restored with
		 * an expansion on the transaction association table.
		 * @var Transaction _objTransaction;
		 */
		private $_objTransaction;

		/**
		 * Private member variable that stores a reference to an array of Transaction objects
		 * (of type Transaction[]), if this TransactionType object was restored with
		 * an ExpandAsArray on the transaction association table.
		 * @var Transaction[] _objTransactionArray;
		 */
		private $_objTransactionArray = array();

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
		 * Load a TransactionType from PK Info
		 * @param integer $intTransactionTypeId
		 * @return TransactionType
		 */
		public static function Load($intTransactionTypeId) {
			// Use QuerySingle to Perform the Query
			return TransactionType::QuerySingle(
				QQ::Equal(QQN::TransactionType()->TransactionTypeId, $intTransactionTypeId)
			);
		}

		/**
		 * Load all TransactionTypes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TransactionType[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call TransactionType::QueryArray to perform the LoadAll query
			try {
				return TransactionType::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TransactionTypes
		 * @return int
		 */
		public static function CountAll() {
			// Call TransactionType::QueryCount to perform the CountAll query
			return TransactionType::QueryCount(QQ::All());
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
			$objDatabase = TransactionType::GetDatabase();

			// Create/Build out the QueryBuilder object with TransactionType-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'transaction_type');
			TransactionType::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('transaction_type');

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
		 * Static Qcodo Query method to query for a single TransactionType object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TransactionType the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TransactionType::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new TransactionType object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TransactionType::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return TransactionType::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of TransactionType objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TransactionType[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TransactionType::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TransactionType::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TransactionType::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of TransactionType objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TransactionType::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TransactionType::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'transaction_type_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with TransactionType-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				TransactionType::GetSelectFields($objQueryBuilder);
				TransactionType::GetFromFields($objQueryBuilder);

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
			return TransactionType::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TransactionType
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'transaction_type';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'transaction_type_id', $strAliasPrefix . 'transaction_type_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'asset_flag', $strAliasPrefix . 'asset_flag');
			$objBuilder->AddSelectItem($strTableName, 'inventory_flag', $strAliasPrefix . 'inventory_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a TransactionType from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TransactionType::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return TransactionType
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'transaction_type_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intTransactionTypeId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'transaction_type__';


				$strAlias = $strAliasPrefix . 'roletransactiontypeauthorization__role_transaction_type_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleTransactionTypeAuthorizationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleTransactionTypeAuthorizationArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorization__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleTransactionTypeAuthorizationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleTransactionTypeAuthorizationArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'shortcut__shortcut_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objShortcutArray)) {
						$objPreviousChildItem = $objPreviousItem->_objShortcutArray[$intPreviousChildItemCount - 1];
						$objChildItem = Shortcut::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shortcut__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objShortcutArray[] = $objChildItem;
					} else
						$objPreviousItem->_objShortcutArray[] = Shortcut::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shortcut__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'transaction__transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTransactionArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'transaction_type__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the TransactionType object
			$objToReturn = new TransactionType();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_type_id'] : $strAliasPrefix . 'transaction_type_id';
			$objToReturn->intTransactionTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_flag'] : $strAliasPrefix . 'asset_flag';
			$objToReturn->blnAssetFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'inventory_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inventory_flag'] : $strAliasPrefix . 'inventory_flag';
			$objToReturn->blnInventoryFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'transaction_type__';




			// Check for RoleTransactionTypeAuthorization Virtual Binding
			$strAlias = $strAliasPrefix . 'roletransactiontypeauthorization__role_transaction_type_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleTransactionTypeAuthorizationArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Shortcut Virtual Binding
			$strAlias = $strAliasPrefix . 'shortcut__shortcut_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objShortcutArray[] = Shortcut::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shortcut__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objShortcut = Shortcut::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shortcut__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Transaction Virtual Binding
			$strAlias = $strAliasPrefix . 'transaction__transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTransactionArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTransaction = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of TransactionTypes from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return TransactionType[]
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
					$objItem = TransactionType::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TransactionType::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single TransactionType object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TransactionType next row resulting from the query
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
			return TransactionType::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single TransactionType object,
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @return TransactionType
		*/
		public static function LoadByTransactionTypeId($intTransactionTypeId, $objOptionalClauses = null) {
			return TransactionType::QuerySingle(
				QQ::Equal(QQN::TransactionType()->TransactionTypeId, $intTransactionTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single TransactionType object,
		 * by ShortDescription Index(es)
		 * @param string $strShortDescription
		 * @return TransactionType
		*/
		public static function LoadByShortDescription($strShortDescription, $objOptionalClauses = null) {
			return TransactionType::QuerySingle(
				QQ::Equal(QQN::TransactionType()->ShortDescription, $strShortDescription)
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
		 * Save this TransactionType
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `transaction_type` (
							`short_description`,
							`asset_flag`,
							`inventory_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->blnAssetFlag) . ',
							' . $objDatabase->SqlVariable($this->blnInventoryFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intTransactionTypeId = $objDatabase->InsertId('transaction_type', 'transaction_type_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`transaction_type`
						SET
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`asset_flag` = ' . $objDatabase->SqlVariable($this->blnAssetFlag) . ',
							`inventory_flag` = ' . $objDatabase->SqlVariable($this->blnInventoryFlag) . '
						WHERE
							`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
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


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this TransactionType
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TransactionType with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction_type`
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all TransactionTypes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction_type`');
		}

		/**
		 * Truncate transaction_type table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `transaction_type`');
		}

		/**
		 * Reload this TransactionType from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TransactionType object.');

			// Reload the Object
			$objReloaded = TransactionType::Load($this->intTransactionTypeId);

			// Update $this's local variables to match
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->blnAssetFlag = $objReloaded->blnAssetFlag;
			$this->blnInventoryFlag = $objReloaded->blnInventoryFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = TransactionType::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `transaction_type` (
					`transaction_type_id`,
					`short_description`,
					`asset_flag`,
					`inventory_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->blnAssetFlag) . ',
					' . $objDatabase->SqlVariable($this->blnInventoryFlag) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intTransactionTypeId
		 * @return TransactionType[]
		 */
		public static function GetJournalForId($intTransactionTypeId) {
			$objDatabase = TransactionType::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM transaction_type WHERE transaction_type_id = ' .
				$objDatabase->SqlVariable($intTransactionTypeId) . ' ORDER BY __sys_date');

			return TransactionType::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return TransactionType[]
		 */
		public function GetJournal() {
			return TransactionType::GetJournalForId($this->intTransactionTypeId);
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
				case 'TransactionTypeId':
					// Gets the value for intTransactionTypeId (Read-Only PK)
					// @return integer
					return $this->intTransactionTypeId;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Unique)
					// @return string
					return $this->strShortDescription;

				case 'AssetFlag':
					// Gets the value for blnAssetFlag (Not Null)
					// @return boolean
					return $this->blnAssetFlag;

				case 'InventoryFlag':
					// Gets the value for blnInventoryFlag (Not Null)
					// @return boolean
					return $this->blnInventoryFlag;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_RoleTransactionTypeAuthorization':
					// Gets the value for the private _objRoleTransactionTypeAuthorization (Read-Only)
					// if set due to an expansion on the role_transaction_type_authorization.transaction_type_id reverse relationship
					// @return RoleTransactionTypeAuthorization
					return $this->_objRoleTransactionTypeAuthorization;

				case '_RoleTransactionTypeAuthorizationArray':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_transaction_type_authorization.transaction_type_id reverse relationship
					// @return RoleTransactionTypeAuthorization[]
					return (array) $this->_objRoleTransactionTypeAuthorizationArray;

				case '_Shortcut':
					// Gets the value for the private _objShortcut (Read-Only)
					// if set due to an expansion on the shortcut.transaction_type_id reverse relationship
					// @return Shortcut
					return $this->_objShortcut;

				case '_ShortcutArray':
					// Gets the value for the private _objShortcutArray (Read-Only)
					// if set due to an ExpandAsArray on the shortcut.transaction_type_id reverse relationship
					// @return Shortcut[]
					return (array) $this->_objShortcutArray;

				case '_Transaction':
					// Gets the value for the private _objTransaction (Read-Only)
					// if set due to an expansion on the transaction.transaction_type_id reverse relationship
					// @return Transaction
					return $this->_objTransaction;

				case '_TransactionArray':
					// Gets the value for the private _objTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the transaction.transaction_type_id reverse relationship
					// @return Transaction[]
					return (array) $this->_objTransactionArray;


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
				case 'ShortDescription':
					// Sets the value for strShortDescription (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strShortDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AssetFlag':
					// Sets the value for blnAssetFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAssetFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InventoryFlag':
					// Sets the value for blnInventoryFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnInventoryFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for RoleTransactionTypeAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleTransactionTypeAuthorizations as an array of RoleTransactionTypeAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/ 
		public function GetRoleTransactionTypeAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intTransactionTypeId)))
				return array();

			try {
				return RoleTransactionTypeAuthorization::LoadArrayByTransactionTypeId($this->intTransactionTypeId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleTransactionTypeAuthorizations
		 * @return int
		*/ 
		public function CountRoleTransactionTypeAuthorizations() {
			if ((is_null($this->intTransactionTypeId)))
				return 0;

			return RoleTransactionTypeAuthorization::CountByTransactionTypeId($this->intTransactionTypeId);
		}

		/**
		 * Associates a RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function AssociateRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorization on this unsaved TransactionType.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorization on this TransactionType with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->TransactionTypeId = $this->intTransactionTypeId;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved TransactionType.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this TransactionType with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`transaction_type_id` = null
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->TransactionTypeId = null;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleTransactionTypeAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleTransactionTypeAuthorizations() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved TransactionType.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByTransactionTypeId($this->intTransactionTypeId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->TransactionTypeId = null;
					$objRoleTransactionTypeAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`transaction_type_id` = null
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');
		}

		/**
		 * Deletes an associated RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved TransactionType.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this TransactionType with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleTransactionTypeAuthorizations
		 * @return void
		*/ 
		public function DeleteAllRoleTransactionTypeAuthorizations() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved TransactionType.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByTransactionTypeId($this->intTransactionTypeId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');
		}

			
		
		// Related Objects' Methods for Shortcut
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Shortcuts as an array of Shortcut objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shortcut[]
		*/ 
		public function GetShortcutArray($objOptionalClauses = null) {
			if ((is_null($this->intTransactionTypeId)))
				return array();

			try {
				return Shortcut::LoadArrayByTransactionTypeId($this->intTransactionTypeId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Shortcuts
		 * @return int
		*/ 
		public function CountShortcuts() {
			if ((is_null($this->intTransactionTypeId)))
				return 0;

			return Shortcut::CountByTransactionTypeId($this->intTransactionTypeId);
		}

		/**
		 * Associates a Shortcut
		 * @param Shortcut $objShortcut
		 * @return void
		*/ 
		public function AssociateShortcut(Shortcut $objShortcut) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShortcut on this unsaved TransactionType.');
			if ((is_null($objShortcut->ShortcutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShortcut on this TransactionType with an unsaved Shortcut.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shortcut`
				SET
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($objShortcut->ShortcutId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShortcut->TransactionTypeId = $this->intTransactionTypeId;
				$objShortcut->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Shortcut
		 * @param Shortcut $objShortcut
		 * @return void
		*/ 
		public function UnassociateShortcut(Shortcut $objShortcut) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved TransactionType.');
			if ((is_null($objShortcut->ShortcutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this TransactionType with an unsaved Shortcut.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shortcut`
				SET
					`transaction_type_id` = null
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($objShortcut->ShortcutId) . ' AND
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShortcut->TransactionTypeId = null;
				$objShortcut->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Shortcuts
		 * @return void
		*/ 
		public function UnassociateAllShortcuts() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved TransactionType.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shortcut::LoadArrayByTransactionTypeId($this->intTransactionTypeId) as $objShortcut) {
					$objShortcut->TransactionTypeId = null;
					$objShortcut->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shortcut`
				SET
					`transaction_type_id` = null
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');
		}

		/**
		 * Deletes an associated Shortcut
		 * @param Shortcut $objShortcut
		 * @return void
		*/ 
		public function DeleteAssociatedShortcut(Shortcut $objShortcut) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved TransactionType.');
			if ((is_null($objShortcut->ShortcutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this TransactionType with an unsaved Shortcut.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shortcut`
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($objShortcut->ShortcutId) . ' AND
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShortcut->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Shortcuts
		 * @return void
		*/ 
		public function DeleteAllShortcuts() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved TransactionType.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shortcut::LoadArrayByTransactionTypeId($this->intTransactionTypeId) as $objShortcut) {
					$objShortcut->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shortcut`
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');
		}

			
		
		// Related Objects' Methods for Transaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Transactions as an array of Transaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/ 
		public function GetTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intTransactionTypeId)))
				return array();

			try {
				return Transaction::LoadArrayByTransactionTypeId($this->intTransactionTypeId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Transactions
		 * @return int
		*/ 
		public function CountTransactions() {
			if ((is_null($this->intTransactionTypeId)))
				return 0;

			return Transaction::CountByTransactionTypeId($this->intTransactionTypeId);
		}

		/**
		 * Associates a Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function AssociateTransaction(Transaction $objTransaction) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransaction on this unsaved TransactionType.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransaction on this TransactionType with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->TransactionTypeId = $this->intTransactionTypeId;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function UnassociateTransaction(Transaction $objTransaction) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved TransactionType.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this TransactionType with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`transaction_type_id` = null
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . ' AND
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->TransactionTypeId = null;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Transactions
		 * @return void
		*/ 
		public function UnassociateAllTransactions() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved TransactionType.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByTransactionTypeId($this->intTransactionTypeId) as $objTransaction) {
					$objTransaction->TransactionTypeId = null;
					$objTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`transaction_type_id` = null
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');
		}

		/**
		 * Deletes an associated Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedTransaction(Transaction $objTransaction) {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved TransactionType.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this TransactionType with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . ' AND
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Transactions
		 * @return void
		*/ 
		public function DeleteAllTransactions() {
			if ((is_null($this->intTransactionTypeId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved TransactionType.');

			// Get the Database Object for this Class
			$objDatabase = TransactionType::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByTransactionTypeId($this->intTransactionTypeId) as $objTransaction) {
					$objTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="TransactionType"><sequence>';
			$strToReturn .= '<element name="TransactionTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="AssetFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="InventoryFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TransactionType', $strComplexTypeArray)) {
				$strComplexTypeArray['TransactionType'] = TransactionType::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TransactionType::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TransactionType();
			if (property_exists($objSoapObject, 'TransactionTypeId'))
				$objToReturn->intTransactionTypeId = $objSoapObject->TransactionTypeId;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'AssetFlag'))
				$objToReturn->blnAssetFlag = $objSoapObject->AssetFlag;
			if (property_exists($objSoapObject, 'InventoryFlag'))
				$objToReturn->blnInventoryFlag = $objSoapObject->InventoryFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TransactionType::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
				$objQueryExpansion = new QQueryExpansion('TransactionType', 'transaction_type', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `transaction_type` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`transaction_type_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_type_id` AS `%s__%s__transaction_type_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_flag` AS `%s__%s__asset_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`inventory_flag` AS `%s__%s__inventory_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						default:
							throw new QCallerException(sprintf('Unknown Object to Expand in %s: %s', $strParentAlias, $strKey));
					}
				}
		}




		////////////////////////////////////////
		// COLUMN CONSTANTS for OBJECT EXPANSION
		////////////////////////////////////////

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $TransactionTypeId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $AssetFlag
	 * @property-read QQNode $InventoryFlag
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization
	 * @property-read QQReverseReferenceNodeShortcut $Shortcut
	 * @property-read QQReverseReferenceNodeTransaction $Transaction
	 */
	class QQNodeTransactionType extends QQNode {
		protected $strTableName = 'transaction_type';
		protected $strPrimaryKey = 'transaction_type_id';
		protected $strClassName = 'TransactionType';
		public function __get($strName) {
			switch ($strName) {
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'AssetFlag':
					return new QQNode('asset_flag', 'AssetFlag', 'boolean', $this);
				case 'InventoryFlag':
					return new QQNode('inventory_flag', 'InventoryFlag', 'boolean', $this);
				case 'RoleTransactionTypeAuthorization':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorization', 'reverse_reference', 'transaction_type_id');
				case 'Shortcut':
					return new QQReverseReferenceNodeShortcut($this, 'shortcut', 'reverse_reference', 'transaction_type_id');
				case 'Transaction':
					return new QQReverseReferenceNodeTransaction($this, 'transaction', 'reverse_reference', 'transaction_type_id');

				case '_PrimaryKeyNode':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
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
	 * @property-read QQNode $TransactionTypeId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $AssetFlag
	 * @property-read QQNode $InventoryFlag
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization
	 * @property-read QQReverseReferenceNodeShortcut $Shortcut
	 * @property-read QQReverseReferenceNodeTransaction $Transaction
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeTransactionType extends QQReverseReferenceNode {
		protected $strTableName = 'transaction_type';
		protected $strPrimaryKey = 'transaction_type_id';
		protected $strClassName = 'TransactionType';
		public function __get($strName) {
			switch ($strName) {
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'AssetFlag':
					return new QQNode('asset_flag', 'AssetFlag', 'boolean', $this);
				case 'InventoryFlag':
					return new QQNode('inventory_flag', 'InventoryFlag', 'boolean', $this);
				case 'RoleTransactionTypeAuthorization':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorization', 'reverse_reference', 'transaction_type_id');
				case 'Shortcut':
					return new QQReverseReferenceNodeShortcut($this, 'shortcut', 'reverse_reference', 'transaction_type_id');
				case 'Transaction':
					return new QQReverseReferenceNodeTransaction($this, 'transaction', 'reverse_reference', 'transaction_type_id');

				case '_PrimaryKeyNode':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
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