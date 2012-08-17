<?php
	/**
	 * The abstract RoleGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Role subclass which
	 * extends this RoleGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Role class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $RoleId the value for intRoleId (Read-Only PK)
	 * @property string $ShortDescription the value for strShortDescription (Not Null)
	 * @property string $LongDescription the value for strLongDescription 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property RoleEntityQtypeBuiltInAuthorization $_RoleEntityQtypeBuiltInAuthorization the value for the private _objRoleEntityQtypeBuiltInAuthorization (Read-Only) if set due to an expansion on the role_entity_qtype_built_in_authorization.role_id reverse relationship
	 * @property RoleEntityQtypeBuiltInAuthorization[] $_RoleEntityQtypeBuiltInAuthorizationArray the value for the private _objRoleEntityQtypeBuiltInAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.role_id reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization $_RoleEntityQtypeCustomFieldAuthorization the value for the private _objRoleEntityQtypeCustomFieldAuthorization (Read-Only) if set due to an expansion on the role_entity_qtype_custom_field_authorization.role_id reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization[] $_RoleEntityQtypeCustomFieldAuthorizationArray the value for the private _objRoleEntityQtypeCustomFieldAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.role_id reverse relationship
	 * @property RoleModule $_RoleModule the value for the private _objRoleModule (Read-Only) if set due to an expansion on the role_module.role_id reverse relationship
	 * @property RoleModule[] $_RoleModuleArray the value for the private _objRoleModuleArray (Read-Only) if set due to an ExpandAsArray on the role_module.role_id reverse relationship
	 * @property RoleTransactionTypeAuthorization $_RoleTransactionTypeAuthorization the value for the private _objRoleTransactionTypeAuthorization (Read-Only) if set due to an expansion on the role_transaction_type_authorization.role_id reverse relationship
	 * @property RoleTransactionTypeAuthorization[] $_RoleTransactionTypeAuthorizationArray the value for the private _objRoleTransactionTypeAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_transaction_type_authorization.role_id reverse relationship
	 * @property UserAccount $_UserAccount the value for the private _objUserAccount (Read-Only) if set due to an expansion on the user_account.role_id reverse relationship
	 * @property UserAccount[] $_UserAccountArray the value for the private _objUserAccountArray (Read-Only) if set due to an ExpandAsArray on the user_account.role_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RoleGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column role.role_id
		 * @var integer intRoleId
		 */
		protected $intRoleId;
		const RoleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column role.long_description
		 * @var string strLongDescription
		 */
		protected $strLongDescription;
		const LongDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column role.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column role.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column role.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column role.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeBuiltInAuthorization object
		 * (of type RoleEntityQtypeBuiltInAuthorization), if this Role object was restored with
		 * an expansion on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization _objRoleEntityQtypeBuiltInAuthorization;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeBuiltInAuthorization objects
		 * (of type RoleEntityQtypeBuiltInAuthorization[]), if this Role object was restored with
		 * an ExpandAsArray on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization[] _objRoleEntityQtypeBuiltInAuthorizationArray;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeCustomFieldAuthorization object
		 * (of type RoleEntityQtypeCustomFieldAuthorization), if this Role object was restored with
		 * an expansion on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization _objRoleEntityQtypeCustomFieldAuthorization;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeCustomFieldAuthorization objects
		 * (of type RoleEntityQtypeCustomFieldAuthorization[]), if this Role object was restored with
		 * an ExpandAsArray on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization[] _objRoleEntityQtypeCustomFieldAuthorizationArray;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleModule object
		 * (of type RoleModule), if this Role object was restored with
		 * an expansion on the role_module association table.
		 * @var RoleModule _objRoleModule;
		 */
		private $_objRoleModule;

		/**
		 * Private member variable that stores a reference to an array of RoleModule objects
		 * (of type RoleModule[]), if this Role object was restored with
		 * an ExpandAsArray on the role_module association table.
		 * @var RoleModule[] _objRoleModuleArray;
		 */
		private $_objRoleModuleArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleTransactionTypeAuthorization object
		 * (of type RoleTransactionTypeAuthorization), if this Role object was restored with
		 * an expansion on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization _objRoleTransactionTypeAuthorization;
		 */
		private $_objRoleTransactionTypeAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleTransactionTypeAuthorization objects
		 * (of type RoleTransactionTypeAuthorization[]), if this Role object was restored with
		 * an ExpandAsArray on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization[] _objRoleTransactionTypeAuthorizationArray;
		 */
		private $_objRoleTransactionTypeAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single UserAccount object
		 * (of type UserAccount), if this Role object was restored with
		 * an expansion on the user_account association table.
		 * @var UserAccount _objUserAccount;
		 */
		private $_objUserAccount;

		/**
		 * Private member variable that stores a reference to an array of UserAccount objects
		 * (of type UserAccount[]), if this Role object was restored with
		 * an ExpandAsArray on the user_account association table.
		 * @var UserAccount[] _objUserAccountArray;
		 */
		private $_objUserAccountArray = array();

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
		 * in the database column role.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role.modified_by.
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
		 * Load a Role from PK Info
		 * @param integer $intRoleId
		 * @return Role
		 */
		public static function Load($intRoleId) {
			// Use QuerySingle to Perform the Query
			return Role::QuerySingle(
				QQ::Equal(QQN::Role()->RoleId, $intRoleId)
			);
		}

		/**
		 * Load all Roles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Role[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Role::QueryArray to perform the LoadAll query
			try {
				return Role::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Roles
		 * @return int
		 */
		public static function CountAll() {
			// Call Role::QueryCount to perform the CountAll query
			return Role::QueryCount(QQ::All());
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
			$objDatabase = Role::GetDatabase();

			// Create/Build out the QueryBuilder object with Role-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'role');
			Role::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('role');

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
		 * Static Qcodo Query method to query for a single Role object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Role the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Role::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Role object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Role::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Role::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Role objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Role[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Role::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Role::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Role::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Role objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Role::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Role::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'role_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Role-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Role::GetSelectFields($objQueryBuilder);
				Role::GetFromFields($objQueryBuilder);

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
			return Role::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Role
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'role';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'role_id', $strAliasPrefix . 'role_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'long_description', $strAliasPrefix . 'long_description');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Role from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Role::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Role
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'role_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intRoleId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'role__';


				$strAlias = $strAliasPrefix . 'roleentityqtypebuiltinauthorization__role_entity_built_in_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorization__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationArray[] = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleentityqtypecustomfieldauthorization__role_entity_qtype_custom_field_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorization__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationArray[] = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'rolemodule__role_module_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleModuleArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleModuleArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemodule__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleModuleArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleModuleArray[] = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemodule__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

				$strAlias = $strAliasPrefix . 'useraccount__user_account_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserAccountArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserAccountArray[$intPreviousChildItemCount - 1];
						$objChildItem = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccount__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserAccountArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserAccountArray[] = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'role__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Role object
			$objToReturn = new Role();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'role_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'role_id'] : $strAliasPrefix . 'role_id';
			$objToReturn->intRoleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'long_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'long_description'] : $strAliasPrefix . 'long_description';
			$objToReturn->strLongDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
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
				$strAliasPrefix = 'role__';

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




			// Check for RoleEntityQtypeBuiltInAuthorization Virtual Binding
			$strAlias = $strAliasPrefix . 'roleentityqtypebuiltinauthorization__role_entity_built_in_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleEntityQtypeBuiltInAuthorizationArray[] = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleEntityQtypeBuiltInAuthorization = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleEntityQtypeCustomFieldAuthorization Virtual Binding
			$strAlias = $strAliasPrefix . 'roleentityqtypecustomfieldauthorization__role_entity_qtype_custom_field_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleEntityQtypeCustomFieldAuthorizationArray[] = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleEntityQtypeCustomFieldAuthorization = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleModule Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemodule__role_module_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleArray[] = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemodule__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModule = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemodule__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

			// Check for UserAccount Virtual Binding
			$strAlias = $strAliasPrefix . 'useraccount__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserAccountArray[] = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUserAccount = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Roles from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Role[]
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
					$objItem = Role::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Role::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Role object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Role next row resulting from the query
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
			return Role::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Role object,
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @return Role
		*/
		public static function LoadByRoleId($intRoleId, $objOptionalClauses = null) {
			return Role::QuerySingle(
				QQ::Equal(QQN::Role()->RoleId, $intRoleId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Role objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Role[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Role::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Role::QueryArray(
					QQ::Equal(QQN::Role()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Roles
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Role::QueryCount to perform the CountByCreatedBy query
			return Role::QueryCount(
				QQ::Equal(QQN::Role()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Role objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Role[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Role::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Role::QueryArray(
					QQ::Equal(QQN::Role()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Roles
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Role::QueryCount to perform the CountByModifiedBy query
			return Role::QueryCount(
				QQ::Equal(QQN::Role()->ModifiedBy, $intModifiedBy)
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
		 * Save this Role
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `role` (
							`short_description`,
							`long_description`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->strLongDescription) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intRoleId = $objDatabase->InsertId('role', 'role_id');

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
								`role`
							WHERE
								`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('Role');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`role`
						SET
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`long_description` = ' . $objDatabase->SqlVariable($this->strLongDescription) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
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
					`role`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Role
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Role with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Roles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role`');
		}

		/**
		 * Truncate role table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `role`');
		}

		/**
		 * Reload this Role from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Role object.');

			// Reload the Object
			$objReloaded = Role::Load($this->intRoleId);

			// Update $this's local variables to match
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->strLongDescription = $objReloaded->strLongDescription;
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
			$objDatabase = Role::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `role` (
					`role_id`,
					`short_description`,
					`long_description`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intRoleId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->strLongDescription) . ',
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
		 * @param integer intRoleId
		 * @return Role[]
		 */
		public static function GetJournalForId($intRoleId) {
			$objDatabase = Role::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM role WHERE role_id = ' .
				$objDatabase->SqlVariable($intRoleId) . ' ORDER BY __sys_date');

			return Role::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Role[]
		 */
		public function GetJournal() {
			return Role::GetJournalForId($this->intRoleId);
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
				case 'RoleId':
					// Gets the value for intRoleId (Read-Only PK)
					// @return integer
					return $this->intRoleId;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Not Null)
					// @return string
					return $this->strShortDescription;

				case 'LongDescription':
					// Gets the value for strLongDescription 
					// @return string
					return $this->strLongDescription;

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

				case '_RoleEntityQtypeBuiltInAuthorization':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorization (Read-Only)
					// if set due to an expansion on the role_entity_qtype_built_in_authorization.role_id reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization
					return $this->_objRoleEntityQtypeBuiltInAuthorization;

				case '_RoleEntityQtypeBuiltInAuthorizationArray':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.role_id reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization[]
					return (array) $this->_objRoleEntityQtypeBuiltInAuthorizationArray;

				case '_RoleEntityQtypeCustomFieldAuthorization':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorization (Read-Only)
					// if set due to an expansion on the role_entity_qtype_custom_field_authorization.role_id reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization
					return $this->_objRoleEntityQtypeCustomFieldAuthorization;

				case '_RoleEntityQtypeCustomFieldAuthorizationArray':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.role_id reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization[]
					return (array) $this->_objRoleEntityQtypeCustomFieldAuthorizationArray;

				case '_RoleModule':
					// Gets the value for the private _objRoleModule (Read-Only)
					// if set due to an expansion on the role_module.role_id reverse relationship
					// @return RoleModule
					return $this->_objRoleModule;

				case '_RoleModuleArray':
					// Gets the value for the private _objRoleModuleArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module.role_id reverse relationship
					// @return RoleModule[]
					return (array) $this->_objRoleModuleArray;

				case '_RoleTransactionTypeAuthorization':
					// Gets the value for the private _objRoleTransactionTypeAuthorization (Read-Only)
					// if set due to an expansion on the role_transaction_type_authorization.role_id reverse relationship
					// @return RoleTransactionTypeAuthorization
					return $this->_objRoleTransactionTypeAuthorization;

				case '_RoleTransactionTypeAuthorizationArray':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_transaction_type_authorization.role_id reverse relationship
					// @return RoleTransactionTypeAuthorization[]
					return (array) $this->_objRoleTransactionTypeAuthorizationArray;

				case '_UserAccount':
					// Gets the value for the private _objUserAccount (Read-Only)
					// if set due to an expansion on the user_account.role_id reverse relationship
					// @return UserAccount
					return $this->_objUserAccount;

				case '_UserAccountArray':
					// Gets the value for the private _objUserAccountArray (Read-Only)
					// if set due to an ExpandAsArray on the user_account.role_id reverse relationship
					// @return UserAccount[]
					return (array) $this->_objUserAccountArray;


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
					// Sets the value for strShortDescription (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strShortDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LongDescription':
					// Sets the value for strLongDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLongDescription = QType::Cast($mixValue, QType::String));
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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Role');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Role');

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

			
		
		// Related Objects' Methods for RoleEntityQtypeBuiltInAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeBuiltInAuthorizations as an array of RoleEntityQtypeBuiltInAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeBuiltInAuthorization[]
		*/ 
		public function GetRoleEntityQtypeBuiltInAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intRoleId)))
				return array();

			try {
				return RoleEntityQtypeBuiltInAuthorization::LoadArrayByRoleId($this->intRoleId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleEntityQtypeBuiltInAuthorizations
		 * @return int
		*/ 
		public function CountRoleEntityQtypeBuiltInAuthorizations() {
			if ((is_null($this->intRoleId)))
				return 0;

			return RoleEntityQtypeBuiltInAuthorization::CountByRoleId($this->intRoleId);
		}

		/**
		 * Associates a RoleEntityQtypeBuiltInAuthorization
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeBuiltInAuthorization(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorization on this unsaved Role.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorization on this Role with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->RoleId = $this->intRoleId;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeBuiltInAuthorization
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeBuiltInAuthorization(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Role.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this Role with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`role_id` = null
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->RoleId = null;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeBuiltInAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeBuiltInAuthorizations() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByRoleId($this->intRoleId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->RoleId = null;
					$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`role_id` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeBuiltInAuthorization
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeBuiltInAuthorization(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Role.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this Role with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleEntityQtypeBuiltInAuthorizations
		 * @return void
		*/ 
		public function DeleteAllRoleEntityQtypeBuiltInAuthorizations() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByRoleId($this->intRoleId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleEntityQtypeCustomFieldAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeCustomFieldAuthorizations as an array of RoleEntityQtypeCustomFieldAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeCustomFieldAuthorization[]
		*/ 
		public function GetRoleEntityQtypeCustomFieldAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intRoleId)))
				return array();

			try {
				return RoleEntityQtypeCustomFieldAuthorization::LoadArrayByRoleId($this->intRoleId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleEntityQtypeCustomFieldAuthorizations
		 * @return int
		*/ 
		public function CountRoleEntityQtypeCustomFieldAuthorizations() {
			if ((is_null($this->intRoleId)))
				return 0;

			return RoleEntityQtypeCustomFieldAuthorization::CountByRoleId($this->intRoleId);
		}

		/**
		 * Associates a RoleEntityQtypeCustomFieldAuthorization
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeCustomFieldAuthorization(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Role.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorization on this Role with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->RoleId = $this->intRoleId;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeCustomFieldAuthorization
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeCustomFieldAuthorization(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Role.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this Role with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`role_id` = null
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->RoleId = null;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeCustomFieldAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeCustomFieldAuthorizations() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByRoleId($this->intRoleId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->RoleId = null;
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`role_id` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeCustomFieldAuthorization
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeCustomFieldAuthorization(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Role.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this Role with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleEntityQtypeCustomFieldAuthorizations
		 * @return void
		*/ 
		public function DeleteAllRoleEntityQtypeCustomFieldAuthorizations() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByRoleId($this->intRoleId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleModule
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModules as an array of RoleModule objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModule[]
		*/ 
		public function GetRoleModuleArray($objOptionalClauses = null) {
			if ((is_null($this->intRoleId)))
				return array();

			try {
				return RoleModule::LoadArrayByRoleId($this->intRoleId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleModules
		 * @return int
		*/ 
		public function CountRoleModules() {
			if ((is_null($this->intRoleId)))
				return 0;

			return RoleModule::CountByRoleId($this->intRoleId);
		}

		/**
		 * Associates a RoleModule
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function AssociateRoleModule(RoleModule $objRoleModule) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModule on this unsaved Role.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModule on this Role with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->RoleId = $this->intRoleId;
				$objRoleModule->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModule
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function UnassociateRoleModule(RoleModule $objRoleModule) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModule on this unsaved Role.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModule on this Role with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`role_id` = null
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->RoleId = null;
				$objRoleModule->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModules
		 * @return void
		*/ 
		public function UnassociateAllRoleModules() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModule on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModule::LoadArrayByRoleId($this->intRoleId) as $objRoleModule) {
					$objRoleModule->RoleId = null;
					$objRoleModule->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`role_id` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

		/**
		 * Deletes an associated RoleModule
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModule(RoleModule $objRoleModule) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModule on this unsaved Role.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModule on this Role with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module`
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleModules
		 * @return void
		*/ 
		public function DeleteAllRoleModules() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModule on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModule::LoadArrayByRoleId($this->intRoleId) as $objRoleModule) {
					$objRoleModule->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
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
			if ((is_null($this->intRoleId)))
				return array();

			try {
				return RoleTransactionTypeAuthorization::LoadArrayByRoleId($this->intRoleId, $objOptionalClauses);
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
			if ((is_null($this->intRoleId)))
				return 0;

			return RoleTransactionTypeAuthorization::CountByRoleId($this->intRoleId);
		}

		/**
		 * Associates a RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function AssociateRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorization on this unsaved Role.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorization on this Role with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->RoleId = $this->intRoleId;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved Role.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this Role with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`role_id` = null
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->RoleId = null;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleTransactionTypeAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleTransactionTypeAuthorizations() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByRoleId($this->intRoleId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->RoleId = null;
					$objRoleTransactionTypeAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`role_id` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

		/**
		 * Deletes an associated RoleTransactionTypeAuthorization
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleTransactionTypeAuthorization(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved Role.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this Role with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
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
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorization on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByRoleId($this->intRoleId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

			
		
		// Related Objects' Methods for UserAccount
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UserAccounts as an array of UserAccount objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		*/ 
		public function GetUserAccountArray($objOptionalClauses = null) {
			if ((is_null($this->intRoleId)))
				return array();

			try {
				return UserAccount::LoadArrayByRoleId($this->intRoleId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UserAccounts
		 * @return int
		*/ 
		public function CountUserAccounts() {
			if ((is_null($this->intRoleId)))
				return 0;

			return UserAccount::CountByRoleId($this->intRoleId);
		}

		/**
		 * Associates a UserAccount
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function AssociateUserAccount(UserAccount $objUserAccount) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAccount on this unsaved Role.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAccount on this Role with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->RoleId = $this->intRoleId;
				$objUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a UserAccount
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function UnassociateUserAccount(UserAccount $objUserAccount) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccount on this unsaved Role.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccount on this Role with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`role_id` = null
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->RoleId = null;
				$objUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all UserAccounts
		 * @return void
		*/ 
		public function UnassociateAllUserAccounts() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccount on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UserAccount::LoadArrayByRoleId($this->intRoleId) as $objUserAccount) {
					$objUserAccount->RoleId = null;
					$objUserAccount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`role_id` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}

		/**
		 * Deletes an associated UserAccount
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function DeleteAssociatedUserAccount(UserAccount $objUserAccount) {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccount on this unsaved Role.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccount on this Role with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . ' AND
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated UserAccounts
		 * @return void
		*/ 
		public function DeleteAllUserAccounts() {
			if ((is_null($this->intRoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccount on this unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = Role::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UserAccount::LoadArrayByRoleId($this->intRoleId) as $objUserAccount) {
					$objUserAccount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Role"><sequence>';
			$strToReturn .= '<element name="RoleId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="LongDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Role', $strComplexTypeArray)) {
				$strComplexTypeArray['Role'] = Role::GetSoapComplexTypeXml();
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Role::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Role();
			if (property_exists($objSoapObject, 'RoleId'))
				$objToReturn->intRoleId = $objSoapObject->RoleId;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'LongDescription'))
				$objToReturn->strLongDescription = $objSoapObject->LongDescription;
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
				array_push($objArrayToReturn, Role::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
				$objQueryExpansion = new QQueryExpansion('Role', 'role', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `role` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`role_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`role_id` AS `%s__%s__role_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`long_description` AS `%s__%s__long_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
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
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $RoleId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $LongDescription
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorization
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorization
	 * @property-read QQReverseReferenceNodeRoleModule $RoleModule
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization
	 * @property-read QQReverseReferenceNodeUserAccount $UserAccount
	 */
	class QQNodeRole extends QQNode {
		protected $strTableName = 'role';
		protected $strPrimaryKey = 'role_id';
		protected $strClassName = 'Role';
		public function __get($strName) {
			switch ($strName) {
				case 'RoleId':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'LongDescription':
					return new QQNode('long_description', 'LongDescription', 'string', $this);
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
				case 'RoleEntityQtypeBuiltInAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorization', 'reverse_reference', 'role_id');
				case 'RoleEntityQtypeCustomFieldAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorization', 'reverse_reference', 'role_id');
				case 'RoleModule':
					return new QQReverseReferenceNodeRoleModule($this, 'rolemodule', 'reverse_reference', 'role_id');
				case 'RoleTransactionTypeAuthorization':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorization', 'reverse_reference', 'role_id');
				case 'UserAccount':
					return new QQReverseReferenceNodeUserAccount($this, 'useraccount', 'reverse_reference', 'role_id');

				case '_PrimaryKeyNode':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
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
	 * @property-read QQNode $RoleId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $LongDescription
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorization
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorization
	 * @property-read QQReverseReferenceNodeRoleModule $RoleModule
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorization
	 * @property-read QQReverseReferenceNodeUserAccount $UserAccount
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRole extends QQReverseReferenceNode {
		protected $strTableName = 'role';
		protected $strPrimaryKey = 'role_id';
		protected $strClassName = 'Role';
		public function __get($strName) {
			switch ($strName) {
				case 'RoleId':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'LongDescription':
					return new QQNode('long_description', 'LongDescription', 'string', $this);
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
				case 'RoleEntityQtypeBuiltInAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorization', 'reverse_reference', 'role_id');
				case 'RoleEntityQtypeCustomFieldAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorization', 'reverse_reference', 'role_id');
				case 'RoleModule':
					return new QQReverseReferenceNodeRoleModule($this, 'rolemodule', 'reverse_reference', 'role_id');
				case 'RoleTransactionTypeAuthorization':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorization', 'reverse_reference', 'role_id');
				case 'UserAccount':
					return new QQReverseReferenceNodeUserAccount($this, 'useraccount', 'reverse_reference', 'role_id');

				case '_PrimaryKeyNode':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
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