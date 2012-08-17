<?php
	/**
	 * The abstract AuthorizationLevelGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AuthorizationLevel subclass which
	 * extends this AuthorizationLevelGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AuthorizationLevel class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AuthorizationLevelId the value for intAuthorizationLevelId (Read-Only PK)
	 * @property string $ShortDescription the value for strShortDescription 
	 * @property RoleModuleAuthorization $_RoleModuleAuthorization the value for the private _objRoleModuleAuthorization (Read-Only) if set due to an expansion on the role_module_authorization.authorization_level_id reverse relationship
	 * @property RoleModuleAuthorization[] $_RoleModuleAuthorizationArray the value for the private _objRoleModuleAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_module_authorization.authorization_level_id reverse relationship
	 * @property RoleTransactionTypeAuthorization $_RoleTransactionTypeAuthorization the value for the private _objRoleTransactionTypeAuthorization (Read-Only) if set due to an expansion on the role_transaction_type_authorization.authorization_level_id reverse relationship
	 * @property RoleTransactionTypeAuthorization[] $_RoleTransactionTypeAuthorizationArray the value for the private _objRoleTransactionTypeAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_transaction_type_authorization.authorization_level_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AuthorizationLevelGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column authorization_level.authorization_level_id
		 * @var integer intAuthorizationLevelId
		 */
		protected $intAuthorizationLevelId;
		const AuthorizationLevelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column authorization_level.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Private member variable that stores a reference to a single RoleModuleAuthorization object
		 * (of type RoleModuleAuthorization), if this AuthorizationLevel object was restored with
		 * an expansion on the role_module_authorization association table.
		 * @var RoleModuleAuthorization _objRoleModuleAuthorization;
		 */
		private $_objRoleModuleAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleModuleAuthorization objects
		 * (of type RoleModuleAuthorization[]), if this AuthorizationLevel object was restored with
		 * an ExpandAsArray on the role_module_authorization association table.
		 * @var RoleModuleAuthorization[] _objRoleModuleAuthorizationArray;
		 */
		private $_objRoleModuleAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleTransactionTypeAuthorization object
		 * (of type RoleTransactionTypeAuthorization), if this AuthorizationLevel object was restored with
		 * an expansion on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization _objRoleTransactionTypeAuthorization;
		 */
		private $_objRoleTransactionTypeAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleTransactionTypeAuthorization objects
		 * (of type RoleTransactionTypeAuthorization[]), if this AuthorizationLevel object was restored with
		 * an ExpandAsArray on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization[] _objRoleTransactionTypeAuthorizationArray;
		 */
		private $_objRoleTransactionTypeAuthorizationArray = array();

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
		 * Load a AuthorizationLevel from PK Info
		 * @param integer $intAuthorizationLevelId
		 * @return AuthorizationLevel
		 */
		public static function Load($intAuthorizationLevelId) {
			// Use QuerySingle to Perform the Query
			return AuthorizationLevel::QuerySingle(
				QQ::Equal(QQN::AuthorizationLevel()->AuthorizationLevelId, $intAuthorizationLevelId)
			);
		}

		/**
		 * Load all AuthorizationLevels
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AuthorizationLevel[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AuthorizationLevel::QueryArray to perform the LoadAll query
			try {
				return AuthorizationLevel::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AuthorizationLevels
		 * @return int
		 */
		public static function CountAll() {
			// Call AuthorizationLevel::QueryCount to perform the CountAll query
			return AuthorizationLevel::QueryCount(QQ::All());
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
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Create/Build out the QueryBuilder object with AuthorizationLevel-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'authorization_level');
			AuthorizationLevel::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('authorization_level');

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
		 * Static Qcodo Query method to query for a single AuthorizationLevel object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AuthorizationLevel the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AuthorizationLevel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new AuthorizationLevel object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AuthorizationLevel::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return AuthorizationLevel::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of AuthorizationLevel objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AuthorizationLevel[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AuthorizationLevel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AuthorizationLevel::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AuthorizationLevel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of AuthorizationLevel objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AuthorizationLevel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'authorization_level_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AuthorizationLevel-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AuthorizationLevel::GetSelectFields($objQueryBuilder);
				AuthorizationLevel::GetFromFields($objQueryBuilder);

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
			return AuthorizationLevel::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AuthorizationLevel
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'authorization_level';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'authorization_level_id', $strAliasPrefix . 'authorization_level_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AuthorizationLevel from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AuthorizationLevel::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AuthorizationLevel
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'authorization_level_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAuthorizationLevelId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'authorization_level__';


				$strAlias = $strAliasPrefix . 'rolemoduleauthorization__role_module_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleModuleAuthorizationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleModuleAuthorizationArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorization__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleModuleAuthorizationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleModuleAuthorizationArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'authorization_level__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the AuthorizationLevel object
			$objToReturn = new AuthorizationLevel();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_level_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_level_id'] : $strAliasPrefix . 'authorization_level_id';
			$objToReturn->intAuthorizationLevelId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'authorization_level__';




			// Check for RoleModuleAuthorization Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemoduleauthorization__role_module_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleAuthorizationArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModuleAuthorization = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleTransactionTypeAuthorization Virtual Binding
			$strAlias = $strAliasPrefix . 'roletransactiontypeauthorization__role_transaction_type_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleTransactionTypeAuthorizationArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleTransactionTypeAuthorization = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of AuthorizationLevels from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AuthorizationLevel[]
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
					$objItem = AuthorizationLevel::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AuthorizationLevel::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AuthorizationLevel object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AuthorizationLevel next row resulting from the query
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
			return AuthorizationLevel::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AuthorizationLevel object,
		 * by AuthorizationLevelId Index(es)
		 * @param integer $intAuthorizationLevelId
		 * @return AuthorizationLevel
		*/
		public static function LoadByAuthorizationLevelId($intAuthorizationLevelId, $objOptionalClauses = null) {
			return AuthorizationLevel::QuerySingle(
				QQ::Equal(QQN::AuthorizationLevel()->AuthorizationLevelId, $intAuthorizationLevelId)
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
		 * Save this AuthorizationLevel
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `authorization_level` (
							`short_description`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strShortDescription) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAuthorizationLevelId = $objDatabase->InsertId('authorization_level', 'authorization_level_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`authorization_level`
						SET
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . '
						WHERE
							`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
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
		 * Delete this AuthorizationLevel
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AuthorizationLevel with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`authorization_level`
				WHERE
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all AuthorizationLevels
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`authorization_level`');
		}

		/**
		 * Truncate authorization_level table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `authorization_level`');
		}

		/**
		 * Reload this AuthorizationLevel from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AuthorizationLevel object.');

			// Reload the Object
			$objReloaded = AuthorizationLevel::Load($this->intAuthorizationLevelId);

			// Update $this's local variables to match
			$this->strShortDescription = $objReloaded->strShortDescription;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = AuthorizationLevel::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `authorization_level` (
					`authorization_level_id`,
					`short_description`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAuthorizationLevelId
		 * @return AuthorizationLevel[]
		 */
		public static function GetJournalForId($intAuthorizationLevelId) {
			$objDatabase = AuthorizationLevel::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM authorization_level WHERE authorization_level_id = ' .
				$objDatabase->SqlVariable($intAuthorizationLevelId) . ' ORDER BY __sys_date');

			return AuthorizationLevel::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return AuthorizationLevel[]
		 */
		public function GetJournal() {
			return AuthorizationLevel::GetJournalForId($this->intAuthorizationLevelId);
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
				case 'AuthorizationLevelId':
					// Gets the value for intAuthorizationLevelId (Read-Only PK)
					// @return integer
					return $this->intAuthorizationLevelId;

				case 'ShortDescription':
					// Gets the value for strShortDescription 
					// @return string
					return $this->strShortDescription;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_RoleModuleAuthorization':
					// Gets the value for the private _objRoleModuleAuthorization (Read-Only)
					// if set due to an expansion on the role_module_authorization.authorization_level_id reverse relationship
					// @return RoleModuleAuthorization
					return $this->_objRoleModuleAuthorization;

				case '_RoleModuleAuthorizationArray':
					// Gets the value for the private _objRoleModuleAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module_authorization.authorization_level_id reverse relationship
					// @return RoleModuleAuthorization[]
					return (array) $this->_objRoleModuleAuthorizationArray;

				case '_RoleTransactionTypeAuthorization':
					// Gets the value for the private _objRoleTransactionTypeAuthorization (Read-Only)
					// if set due to an expansion on the role_transaction_type_authorization.authorization_level_id reverse relationship
					// @return RoleTransactionTypeAuthorization
					return $this->_objRoleTransactionTypeAuthorization;

				case '_RoleTransactionTypeAuthorizationArray':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_transaction_type_authorization.authorization_level_id reverse relationship
					// @return RoleTransactionTypeAuthorization[]
					return (array) $this->_objRoleTransactionTypeAuthorizationArray;


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
					// Sets the value for strShortDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strShortDescription = QType::Cast($mixValue, QType::String));
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

			
		
		// Related Objects' Methods for RoleModuleAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModuleAuthorizations as an array of RoleModuleAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/ 
		public function GetRoleModuleAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intAuthorizationLevelId)))
				return array();

			try {
				return RoleModuleAuthorization::LoadArrayByAuthorizationLevelId($this->intAuthorizationLevelId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleModuleAuthorizations
		 * @return int
		*/ 
		public function CountRoleModuleAuthorizations() {
			if ((is_null($this->intAuthorizationLevelId)))
				return 0;

			return RoleModuleAuthorization::CountByAuthorizationLevelId($this->intAuthorizationLevelId);
		}

		/**
		 * Associates a RoleModuleAuthorization
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function AssociateRoleModuleAuthorization(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorization on this unsaved AuthorizationLevel.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorization on this AuthorizationLevel with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->AuthorizationLevelId = $this->intAuthorizationLevelId;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModuleAuthorization
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleModuleAuthorization(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved AuthorizationLevel.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this AuthorizationLevel with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`authorization_level_id` = null
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->AuthorizationLevelId = null;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModuleAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleModuleAuthorizations() {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved AuthorizationLevel.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByAuthorizationLevelId($this->intAuthorizationLevelId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->AuthorizationLevelId = null;
					$objRoleModuleAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`authorization_level_id` = null
				WHERE
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');
		}

		/**
		 * Deletes an associated RoleModuleAuthorization
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModuleAuthorization(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved AuthorizationLevel.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this AuthorizationLevel with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleModuleAuthorizations
		 * @return void
		*/ 
		public function DeleteAllRoleModuleAuthorizations() {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved AuthorizationLevel.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByAuthorizationLevelId($this->intAuthorizationLevelId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleTransactionTypeAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleTransactionTypeAuthorizations as an array of RoleTransactionTypeAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/ 
		public function GetRoleTransactionTypeAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intAuthorizationLevelId)))
				return array();

			try {
				return RoleTransactionTypeAuthorization::LoadArrayByAuthorizationLevelId($this->intAuthorizationLevelId, $objOptionalClauses);
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
			if ((is_null($this->intAuthorizationLevelId)))
				return 0;

			return RoleTransactionTypeAuthorization::CountByAuthorizationLevelId($this->intAuthorizationLevelId);
		}

		/**
		 * Associates a RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function AssociateRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorization on this unsaved AuthorizationLevel.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorization on this AuthorizationLevel with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->AuthorizationLevelId = $this->intAuthorizationLevelId;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved AuthorizationLevel.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this AuthorizationLevel with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`authorization_level_id` = null
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->AuthorizationLevelId = null;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleTransactionTypeAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleTransactionTypeAuthorizations() {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved AuthorizationLevel.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByAuthorizationLevelId($this->intAuthorizationLevelId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->AuthorizationLevelId = null;
					$objRoleTransactionTypeAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`authorization_level_id` = null
				WHERE
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');
		}

		/**
		 * Deletes an associated RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved AuthorizationLevel.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this AuthorizationLevel with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
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
			if ((is_null($this->intAuthorizationLevelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved AuthorizationLevel.');

			// Get the Database Object for this Class
			$objDatabase = AuthorizationLevel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByAuthorizationLevelId($this->intAuthorizationLevelId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="AuthorizationLevel"><sequence>';
			$strToReturn .= '<element name="AuthorizationLevelId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AuthorizationLevel', $strComplexTypeArray)) {
				$strComplexTypeArray['AuthorizationLevel'] = AuthorizationLevel::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AuthorizationLevel::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AuthorizationLevel();
			if (property_exists($objSoapObject, 'AuthorizationLevelId'))
				$objToReturn->intAuthorizationLevelId = $objSoapObject->AuthorizationLevelId;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AuthorizationLevel::GetSoapObjectFromObject($objObject, true));

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
				$objQueryExpansion = new QQueryExpansion('AuthorizationLevel', 'authorization_level', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `authorization_level` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`authorization_level_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`authorization_level_id` AS `%s__%s__authorization_level_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

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
	 * @property-read QQNode $AuthorizationLevelId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorization
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization
	 */
	class QQNodeAuthorizationLevel extends QQNode {
		protected $strTableName = 'authorization_level';
		protected $strPrimaryKey = 'authorization_level_id';
		protected $strClassName = 'AuthorizationLevel';
		public function __get($strName) {
			switch ($strName) {
				case 'AuthorizationLevelId':
					return new QQNode('authorization_level_id', 'AuthorizationLevelId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'RoleModuleAuthorization':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorization', 'reverse_reference', 'authorization_level_id');
				case 'RoleTransactionTypeAuthorization':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorization', 'reverse_reference', 'authorization_level_id');

				case '_PrimaryKeyNode':
					return new QQNode('authorization_level_id', 'AuthorizationLevelId', 'integer', $this);
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
	 * @property-read QQNode $AuthorizationLevelId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorization
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAuthorizationLevel extends QQReverseReferenceNode {
		protected $strTableName = 'authorization_level';
		protected $strPrimaryKey = 'authorization_level_id';
		protected $strClassName = 'AuthorizationLevel';
		public function __get($strName) {
			switch ($strName) {
				case 'AuthorizationLevelId':
					return new QQNode('authorization_level_id', 'AuthorizationLevelId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'RoleModuleAuthorization':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorization', 'reverse_reference', 'authorization_level_id');
				case 'RoleTransactionTypeAuthorization':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorization', 'reverse_reference', 'authorization_level_id');

				case '_PrimaryKeyNode':
					return new QQNode('authorization_level_id', 'AuthorizationLevelId', 'integer', $this);
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