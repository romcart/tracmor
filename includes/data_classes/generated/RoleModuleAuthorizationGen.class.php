<?php
	/**
	 * The abstract RoleModuleAuthorizationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the RoleModuleAuthorization subclass which
	 * extends this RoleModuleAuthorizationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RoleModuleAuthorization class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $RoleModuleAuthorizationId the value for intRoleModuleAuthorizationId (Read-Only PK)
	 * @property integer $RoleModuleId the value for intRoleModuleId 
	 * @property integer $AuthorizationId the value for intAuthorizationId 
	 * @property integer $AuthorizationLevelId the value for intAuthorizationLevelId 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property RoleModule $RoleModule the value for the RoleModule object referenced by intRoleModuleId 
	 * @property Authorization $Authorization the value for the Authorization object referenced by intAuthorizationId 
	 * @property AuthorizationLevel $AuthorizationLevel the value for the AuthorizationLevel object referenced by intAuthorizationLevelId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RoleModuleAuthorizationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column role_module_authorization.role_module_authorization_id
		 * @var integer intRoleModuleAuthorizationId
		 */
		protected $intRoleModuleAuthorizationId;
		const RoleModuleAuthorizationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.role_module_id
		 * @var integer intRoleModuleId
		 */
		protected $intRoleModuleId;
		const RoleModuleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.authorization_id
		 * @var integer intAuthorizationId
		 */
		protected $intAuthorizationId;
		const AuthorizationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.authorization_level_id
		 * @var integer intAuthorizationLevelId
		 */
		protected $intAuthorizationLevelId;
		const AuthorizationLevelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column role_module_authorization.modified_date
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
		 * in the database column role_module_authorization.role_module_id.
		 *
		 * NOTE: Always use the RoleModule property getter to correctly retrieve this RoleModule object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var RoleModule objRoleModule
		 */
		protected $objRoleModule;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_module_authorization.authorization_id.
		 *
		 * NOTE: Always use the Authorization property getter to correctly retrieve this Authorization object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Authorization objAuthorization
		 */
		protected $objAuthorization;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_module_authorization.authorization_level_id.
		 *
		 * NOTE: Always use the AuthorizationLevel property getter to correctly retrieve this AuthorizationLevel object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AuthorizationLevel objAuthorizationLevel
		 */
		protected $objAuthorizationLevel;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_module_authorization.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_module_authorization.modified_by.
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
		 * Load a RoleModuleAuthorization from PK Info
		 * @param integer $intRoleModuleAuthorizationId
		 * @return RoleModuleAuthorization
		 */
		public static function Load($intRoleModuleAuthorizationId) {
			// Use QuerySingle to Perform the Query
			return RoleModuleAuthorization::QuerySingle(
				QQ::Equal(QQN::RoleModuleAuthorization()->RoleModuleAuthorizationId, $intRoleModuleAuthorizationId)
			);
		}

		/**
		 * Load all RoleModuleAuthorizations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryArray to perform the LoadAll query
			try {
				return RoleModuleAuthorization::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all RoleModuleAuthorizations
		 * @return int
		 */
		public static function CountAll() {
			// Call RoleModuleAuthorization::QueryCount to perform the CountAll query
			return RoleModuleAuthorization::QueryCount(QQ::All());
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
			$objDatabase = RoleModuleAuthorization::GetDatabase();

			// Create/Build out the QueryBuilder object with RoleModuleAuthorization-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'role_module_authorization');
			RoleModuleAuthorization::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('role_module_authorization');

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
		 * Static Qcodo Query method to query for a single RoleModuleAuthorization object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RoleModuleAuthorization the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RoleModuleAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new RoleModuleAuthorization object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = RoleModuleAuthorization::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return RoleModuleAuthorization::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of RoleModuleAuthorization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RoleModuleAuthorization[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RoleModuleAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RoleModuleAuthorization::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = RoleModuleAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of RoleModuleAuthorization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RoleModuleAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = RoleModuleAuthorization::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'role_module_authorization_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with RoleModuleAuthorization-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				RoleModuleAuthorization::GetSelectFields($objQueryBuilder);
				RoleModuleAuthorization::GetFromFields($objQueryBuilder);

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
			return RoleModuleAuthorization::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this RoleModuleAuthorization
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'role_module_authorization';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'role_module_authorization_id', $strAliasPrefix . 'role_module_authorization_id');
			$objBuilder->AddSelectItem($strTableName, 'role_module_id', $strAliasPrefix . 'role_module_id');
			$objBuilder->AddSelectItem($strTableName, 'authorization_id', $strAliasPrefix . 'authorization_id');
			$objBuilder->AddSelectItem($strTableName, 'authorization_level_id', $strAliasPrefix . 'authorization_level_id');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a RoleModuleAuthorization from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this RoleModuleAuthorization::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return RoleModuleAuthorization
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the RoleModuleAuthorization object
			$objToReturn = new RoleModuleAuthorization();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'role_module_authorization_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'role_module_authorization_id'] : $strAliasPrefix . 'role_module_authorization_id';
			$objToReturn->intRoleModuleAuthorizationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'role_module_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'role_module_id'] : $strAliasPrefix . 'role_module_id';
			$objToReturn->intRoleModuleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_id'] : $strAliasPrefix . 'authorization_id';
			$objToReturn->intAuthorizationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_level_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_level_id'] : $strAliasPrefix . 'authorization_level_id';
			$objToReturn->intAuthorizationLevelId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'role_module_authorization__';

			// Check for RoleModule Early Binding
			$strAlias = $strAliasPrefix . 'role_module_id__role_module_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRoleModule = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'role_module_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Authorization Early Binding
			$strAlias = $strAliasPrefix . 'authorization_id__authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAuthorization = Authorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'authorization_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for AuthorizationLevel Early Binding
			$strAlias = $strAliasPrefix . 'authorization_level_id__authorization_level_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAuthorizationLevel = AuthorizationLevel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'authorization_level_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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
		 * Instantiate an array of RoleModuleAuthorizations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return RoleModuleAuthorization[]
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
					$objItem = RoleModuleAuthorization::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single RoleModuleAuthorization object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return RoleModuleAuthorization next row resulting from the query
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
			return RoleModuleAuthorization::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single RoleModuleAuthorization object,
		 * by RoleModuleAuthorizationId Index(es)
		 * @param integer $intRoleModuleAuthorizationId
		 * @return RoleModuleAuthorization
		*/
		public static function LoadByRoleModuleAuthorizationId($intRoleModuleAuthorizationId, $objOptionalClauses = null) {
			return RoleModuleAuthorization::QuerySingle(
				QQ::Equal(QQN::RoleModuleAuthorization()->RoleModuleAuthorizationId, $intRoleModuleAuthorizationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RoleModuleAuthorization objects,
		 * by RoleModuleId Index(es)
		 * @param integer $intRoleModuleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/
		public static function LoadArrayByRoleModuleId($intRoleModuleId, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryArray to perform the LoadArrayByRoleModuleId query
			try {
				return RoleModuleAuthorization::QueryArray(
					QQ::Equal(QQN::RoleModuleAuthorization()->RoleModuleId, $intRoleModuleId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleModuleAuthorizations
		 * by RoleModuleId Index(es)
		 * @param integer $intRoleModuleId
		 * @return int
		*/
		public static function CountByRoleModuleId($intRoleModuleId, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryCount to perform the CountByRoleModuleId query
			return RoleModuleAuthorization::QueryCount(
				QQ::Equal(QQN::RoleModuleAuthorization()->RoleModuleId, $intRoleModuleId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RoleModuleAuthorization objects,
		 * by AuthorizationId Index(es)
		 * @param integer $intAuthorizationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/
		public static function LoadArrayByAuthorizationId($intAuthorizationId, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryArray to perform the LoadArrayByAuthorizationId query
			try {
				return RoleModuleAuthorization::QueryArray(
					QQ::Equal(QQN::RoleModuleAuthorization()->AuthorizationId, $intAuthorizationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleModuleAuthorizations
		 * by AuthorizationId Index(es)
		 * @param integer $intAuthorizationId
		 * @return int
		*/
		public static function CountByAuthorizationId($intAuthorizationId, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryCount to perform the CountByAuthorizationId query
			return RoleModuleAuthorization::QueryCount(
				QQ::Equal(QQN::RoleModuleAuthorization()->AuthorizationId, $intAuthorizationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RoleModuleAuthorization objects,
		 * by AuthorizationLevelId Index(es)
		 * @param integer $intAuthorizationLevelId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/
		public static function LoadArrayByAuthorizationLevelId($intAuthorizationLevelId, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryArray to perform the LoadArrayByAuthorizationLevelId query
			try {
				return RoleModuleAuthorization::QueryArray(
					QQ::Equal(QQN::RoleModuleAuthorization()->AuthorizationLevelId, $intAuthorizationLevelId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleModuleAuthorizations
		 * by AuthorizationLevelId Index(es)
		 * @param integer $intAuthorizationLevelId
		 * @return int
		*/
		public static function CountByAuthorizationLevelId($intAuthorizationLevelId, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryCount to perform the CountByAuthorizationLevelId query
			return RoleModuleAuthorization::QueryCount(
				QQ::Equal(QQN::RoleModuleAuthorization()->AuthorizationLevelId, $intAuthorizationLevelId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RoleModuleAuthorization objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return RoleModuleAuthorization::QueryArray(
					QQ::Equal(QQN::RoleModuleAuthorization()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleModuleAuthorizations
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryCount to perform the CountByCreatedBy query
			return RoleModuleAuthorization::QueryCount(
				QQ::Equal(QQN::RoleModuleAuthorization()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RoleModuleAuthorization objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return RoleModuleAuthorization::QueryArray(
					QQ::Equal(QQN::RoleModuleAuthorization()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleModuleAuthorizations
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call RoleModuleAuthorization::QueryCount to perform the CountByModifiedBy query
			return RoleModuleAuthorization::QueryCount(
				QQ::Equal(QQN::RoleModuleAuthorization()->ModifiedBy, $intModifiedBy)
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
		 * Save this RoleModuleAuthorization
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = RoleModuleAuthorization::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `role_module_authorization` (
							`role_module_id`,
							`authorization_id`,
							`authorization_level_id`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intRoleModuleId) . ',
							' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
							' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intRoleModuleAuthorizationId = $objDatabase->InsertId('role_module_authorization', 'role_module_authorization_id');

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
								`role_module_authorization`
							WHERE
								`role_module_authorization_id` = ' . $objDatabase->SqlVariable($this->intRoleModuleAuthorizationId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('RoleModuleAuthorization');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`role_module_authorization`
						SET
							`role_module_id` = ' . $objDatabase->SqlVariable($this->intRoleModuleId) . ',
							`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
							`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`role_module_authorization_id` = ' . $objDatabase->SqlVariable($this->intRoleModuleAuthorizationId) . '
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
					`role_module_authorization`
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($this->intRoleModuleAuthorizationId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this RoleModuleAuthorization
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intRoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this RoleModuleAuthorization with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = RoleModuleAuthorization::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($this->intRoleModuleAuthorizationId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all RoleModuleAuthorizations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = RoleModuleAuthorization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`');
		}

		/**
		 * Truncate role_module_authorization table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = RoleModuleAuthorization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `role_module_authorization`');
		}

		/**
		 * Reload this RoleModuleAuthorization from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved RoleModuleAuthorization object.');

			// Reload the Object
			$objReloaded = RoleModuleAuthorization::Load($this->intRoleModuleAuthorizationId);

			// Update $this's local variables to match
			$this->RoleModuleId = $objReloaded->RoleModuleId;
			$this->AuthorizationId = $objReloaded->AuthorizationId;
			$this->AuthorizationLevelId = $objReloaded->AuthorizationLevelId;
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
			$objDatabase = RoleModuleAuthorization::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `role_module_authorization` (
					`role_module_authorization_id`,
					`role_module_id`,
					`authorization_id`,
					`authorization_level_id`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intRoleModuleAuthorizationId) . ',
					' . $objDatabase->SqlVariable($this->intRoleModuleId) . ',
					' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
					' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . ',
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
		 * @param integer intRoleModuleAuthorizationId
		 * @return RoleModuleAuthorization[]
		 */
		public static function GetJournalForId($intRoleModuleAuthorizationId) {
			$objDatabase = RoleModuleAuthorization::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM role_module_authorization WHERE role_module_authorization_id = ' .
				$objDatabase->SqlVariable($intRoleModuleAuthorizationId) . ' ORDER BY __sys_date');

			return RoleModuleAuthorization::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return RoleModuleAuthorization[]
		 */
		public function GetJournal() {
			return RoleModuleAuthorization::GetJournalForId($this->intRoleModuleAuthorizationId);
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
				case 'RoleModuleAuthorizationId':
					// Gets the value for intRoleModuleAuthorizationId (Read-Only PK)
					// @return integer
					return $this->intRoleModuleAuthorizationId;

				case 'RoleModuleId':
					// Gets the value for intRoleModuleId 
					// @return integer
					return $this->intRoleModuleId;

				case 'AuthorizationId':
					// Gets the value for intAuthorizationId 
					// @return integer
					return $this->intAuthorizationId;

				case 'AuthorizationLevelId':
					// Gets the value for intAuthorizationLevelId 
					// @return integer
					return $this->intAuthorizationLevelId;

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
				case 'RoleModule':
					// Gets the value for the RoleModule object referenced by intRoleModuleId 
					// @return RoleModule
					try {
						if ((!$this->objRoleModule) && (!is_null($this->intRoleModuleId)))
							$this->objRoleModule = RoleModule::Load($this->intRoleModuleId);
						return $this->objRoleModule;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Authorization':
					// Gets the value for the Authorization object referenced by intAuthorizationId 
					// @return Authorization
					try {
						if ((!$this->objAuthorization) && (!is_null($this->intAuthorizationId)))
							$this->objAuthorization = Authorization::Load($this->intAuthorizationId);
						return $this->objAuthorization;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationLevel':
					// Gets the value for the AuthorizationLevel object referenced by intAuthorizationLevelId 
					// @return AuthorizationLevel
					try {
						if ((!$this->objAuthorizationLevel) && (!is_null($this->intAuthorizationLevelId)))
							$this->objAuthorizationLevel = AuthorizationLevel::Load($this->intAuthorizationLevelId);
						return $this->objAuthorizationLevel;
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
				case 'RoleModuleId':
					// Sets the value for intRoleModuleId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objRoleModule = null;
						return ($this->intRoleModuleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationId':
					// Sets the value for intAuthorizationId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAuthorization = null;
						return ($this->intAuthorizationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationLevelId':
					// Sets the value for intAuthorizationLevelId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAuthorizationLevel = null;
						return ($this->intAuthorizationLevelId = QType::Cast($mixValue, QType::Integer));
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
				case 'RoleModule':
					// Sets the value for the RoleModule object referenced by intRoleModuleId 
					// @param RoleModule $mixValue
					// @return RoleModule
					if (is_null($mixValue)) {
						$this->intRoleModuleId = null;
						$this->objRoleModule = null;
						return null;
					} else {
						// Make sure $mixValue actually is a RoleModule object
						try {
							$mixValue = QType::Cast($mixValue, 'RoleModule');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED RoleModule object
						if (is_null($mixValue->RoleModuleId))
							throw new QCallerException('Unable to set an unsaved RoleModule for this RoleModuleAuthorization');

						// Update Local Member Variables
						$this->objRoleModule = $mixValue;
						$this->intRoleModuleId = $mixValue->RoleModuleId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Authorization':
					// Sets the value for the Authorization object referenced by intAuthorizationId 
					// @param Authorization $mixValue
					// @return Authorization
					if (is_null($mixValue)) {
						$this->intAuthorizationId = null;
						$this->objAuthorization = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Authorization object
						try {
							$mixValue = QType::Cast($mixValue, 'Authorization');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Authorization object
						if (is_null($mixValue->AuthorizationId))
							throw new QCallerException('Unable to set an unsaved Authorization for this RoleModuleAuthorization');

						// Update Local Member Variables
						$this->objAuthorization = $mixValue;
						$this->intAuthorizationId = $mixValue->AuthorizationId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AuthorizationLevel':
					// Sets the value for the AuthorizationLevel object referenced by intAuthorizationLevelId 
					// @param AuthorizationLevel $mixValue
					// @return AuthorizationLevel
					if (is_null($mixValue)) {
						$this->intAuthorizationLevelId = null;
						$this->objAuthorizationLevel = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AuthorizationLevel object
						try {
							$mixValue = QType::Cast($mixValue, 'AuthorizationLevel');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AuthorizationLevel object
						if (is_null($mixValue->AuthorizationLevelId))
							throw new QCallerException('Unable to set an unsaved AuthorizationLevel for this RoleModuleAuthorization');

						// Update Local Member Variables
						$this->objAuthorizationLevel = $mixValue;
						$this->intAuthorizationLevelId = $mixValue->AuthorizationLevelId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this RoleModuleAuthorization');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this RoleModuleAuthorization');

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
			$strToReturn = '<complexType name="RoleModuleAuthorization"><sequence>';
			$strToReturn .= '<element name="RoleModuleAuthorizationId" type="xsd:int"/>';
			$strToReturn .= '<element name="RoleModule" type="xsd1:RoleModule"/>';
			$strToReturn .= '<element name="Authorization" type="xsd1:Authorization"/>';
			$strToReturn .= '<element name="AuthorizationLevel" type="xsd1:AuthorizationLevel"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('RoleModuleAuthorization', $strComplexTypeArray)) {
				$strComplexTypeArray['RoleModuleAuthorization'] = RoleModuleAuthorization::GetSoapComplexTypeXml();
				RoleModule::AlterSoapComplexTypeArray($strComplexTypeArray);
				Authorization::AlterSoapComplexTypeArray($strComplexTypeArray);
				AuthorizationLevel::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, RoleModuleAuthorization::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new RoleModuleAuthorization();
			if (property_exists($objSoapObject, 'RoleModuleAuthorizationId'))
				$objToReturn->intRoleModuleAuthorizationId = $objSoapObject->RoleModuleAuthorizationId;
			if ((property_exists($objSoapObject, 'RoleModule')) &&
				($objSoapObject->RoleModule))
				$objToReturn->RoleModule = RoleModule::GetObjectFromSoapObject($objSoapObject->RoleModule);
			if ((property_exists($objSoapObject, 'Authorization')) &&
				($objSoapObject->Authorization))
				$objToReturn->Authorization = Authorization::GetObjectFromSoapObject($objSoapObject->Authorization);
			if ((property_exists($objSoapObject, 'AuthorizationLevel')) &&
				($objSoapObject->AuthorizationLevel))
				$objToReturn->AuthorizationLevel = AuthorizationLevel::GetObjectFromSoapObject($objSoapObject->AuthorizationLevel);
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
				array_push($objArrayToReturn, RoleModuleAuthorization::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRoleModule)
				$objObject->objRoleModule = RoleModule::GetSoapObjectFromObject($objObject->objRoleModule, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRoleModuleId = null;
			if ($objObject->objAuthorization)
				$objObject->objAuthorization = Authorization::GetSoapObjectFromObject($objObject->objAuthorization, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAuthorizationId = null;
			if ($objObject->objAuthorizationLevel)
				$objObject->objAuthorizationLevel = AuthorizationLevel::GetSoapObjectFromObject($objObject->objAuthorizationLevel, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAuthorizationLevelId = null;
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
				$objQueryExpansion = new QQueryExpansion('RoleModuleAuthorization', 'role_module_authorization', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `role_module_authorization` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`role_module_authorization_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`role_module_authorization_id` AS `%s__%s__role_module_authorization_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`role_module_id` AS `%s__%s__role_module_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`authorization_id` AS `%s__%s__authorization_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`authorization_level_id` AS `%s__%s__authorization_level_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'role_module_id':
							try {
								RoleModule::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'authorization_id':
							try {
								Authorization::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'authorization_level_id':
							try {
								AuthorizationLevel::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandRoleModule = 'role_module_id';
		const ExpandAuthorization = 'authorization_id';
		const ExpandAuthorizationLevel = 'authorization_level_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $RoleModuleAuthorizationId
	 * @property-read QQNode $RoleModuleId
	 * @property-read QQNodeRoleModule $RoleModule
	 * @property-read QQNode $AuthorizationId
	 * @property-read QQNodeAuthorization $Authorization
	 * @property-read QQNode $AuthorizationLevelId
	 * @property-read QQNodeAuthorizationLevel $AuthorizationLevel
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 */
	class QQNodeRoleModuleAuthorization extends QQNode {
		protected $strTableName = 'role_module_authorization';
		protected $strPrimaryKey = 'role_module_authorization_id';
		protected $strClassName = 'RoleModuleAuthorization';
		public function __get($strName) {
			switch ($strName) {
				case 'RoleModuleAuthorizationId':
					return new QQNode('role_module_authorization_id', 'RoleModuleAuthorizationId', 'integer', $this);
				case 'RoleModuleId':
					return new QQNode('role_module_id', 'RoleModuleId', 'integer', $this);
				case 'RoleModule':
					return new QQNodeRoleModule('role_module_id', 'RoleModule', 'integer', $this);
				case 'AuthorizationId':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
				case 'Authorization':
					return new QQNodeAuthorization('authorization_id', 'Authorization', 'integer', $this);
				case 'AuthorizationLevelId':
					return new QQNode('authorization_level_id', 'AuthorizationLevelId', 'integer', $this);
				case 'AuthorizationLevel':
					return new QQNodeAuthorizationLevel('authorization_level_id', 'AuthorizationLevel', 'integer', $this);
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
					return new QQNode('role_module_authorization_id', 'RoleModuleAuthorizationId', 'integer', $this);
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
	 * @property-read QQNode $RoleModuleAuthorizationId
	 * @property-read QQNode $RoleModuleId
	 * @property-read QQNodeRoleModule $RoleModule
	 * @property-read QQNode $AuthorizationId
	 * @property-read QQNodeAuthorization $Authorization
	 * @property-read QQNode $AuthorizationLevelId
	 * @property-read QQNodeAuthorizationLevel $AuthorizationLevel
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRoleModuleAuthorization extends QQReverseReferenceNode {
		protected $strTableName = 'role_module_authorization';
		protected $strPrimaryKey = 'role_module_authorization_id';
		protected $strClassName = 'RoleModuleAuthorization';
		public function __get($strName) {
			switch ($strName) {
				case 'RoleModuleAuthorizationId':
					return new QQNode('role_module_authorization_id', 'RoleModuleAuthorizationId', 'integer', $this);
				case 'RoleModuleId':
					return new QQNode('role_module_id', 'RoleModuleId', 'integer', $this);
				case 'RoleModule':
					return new QQNodeRoleModule('role_module_id', 'RoleModule', 'integer', $this);
				case 'AuthorizationId':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
				case 'Authorization':
					return new QQNodeAuthorization('authorization_id', 'Authorization', 'integer', $this);
				case 'AuthorizationLevelId':
					return new QQNode('authorization_level_id', 'AuthorizationLevelId', 'integer', $this);
				case 'AuthorizationLevel':
					return new QQNodeAuthorizationLevel('authorization_level_id', 'AuthorizationLevel', 'integer', $this);
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
					return new QQNode('role_module_authorization_id', 'RoleModuleAuthorizationId', 'integer', $this);
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