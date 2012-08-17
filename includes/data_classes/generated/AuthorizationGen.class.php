<?php
	/**
	 * The abstract AuthorizationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Authorization subclass which
	 * extends this AuthorizationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Authorization class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AuthorizationId the value for intAuthorizationId (Read-Only PK)
	 * @property string $ShortDescription the value for strShortDescription 
	 * @property RoleEntityQtypeBuiltInAuthorization $_RoleEntityQtypeBuiltInAuthorization the value for the private _objRoleEntityQtypeBuiltInAuthorization (Read-Only) if set due to an expansion on the role_entity_qtype_built_in_authorization.authorization_id reverse relationship
	 * @property RoleEntityQtypeBuiltInAuthorization[] $_RoleEntityQtypeBuiltInAuthorizationArray the value for the private _objRoleEntityQtypeBuiltInAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.authorization_id reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization $_RoleEntityQtypeCustomFieldAuthorization the value for the private _objRoleEntityQtypeCustomFieldAuthorization (Read-Only) if set due to an expansion on the role_entity_qtype_custom_field_authorization.authorization_id reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization[] $_RoleEntityQtypeCustomFieldAuthorizationArray the value for the private _objRoleEntityQtypeCustomFieldAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.authorization_id reverse relationship
	 * @property RoleModuleAuthorization $_RoleModuleAuthorization the value for the private _objRoleModuleAuthorization (Read-Only) if set due to an expansion on the role_module_authorization.authorization_id reverse relationship
	 * @property RoleModuleAuthorization[] $_RoleModuleAuthorizationArray the value for the private _objRoleModuleAuthorizationArray (Read-Only) if set due to an ExpandAsArray on the role_module_authorization.authorization_id reverse relationship
	 * @property Shortcut $_Shortcut the value for the private _objShortcut (Read-Only) if set due to an expansion on the shortcut.authorization_id reverse relationship
	 * @property Shortcut[] $_ShortcutArray the value for the private _objShortcutArray (Read-Only) if set due to an ExpandAsArray on the shortcut.authorization_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AuthorizationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column authorization.authorization_id
		 * @var integer intAuthorizationId
		 */
		protected $intAuthorizationId;
		const AuthorizationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column authorization.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeBuiltInAuthorization object
		 * (of type RoleEntityQtypeBuiltInAuthorization), if this Authorization object was restored with
		 * an expansion on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization _objRoleEntityQtypeBuiltInAuthorization;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeBuiltInAuthorization objects
		 * (of type RoleEntityQtypeBuiltInAuthorization[]), if this Authorization object was restored with
		 * an ExpandAsArray on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization[] _objRoleEntityQtypeBuiltInAuthorizationArray;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeCustomFieldAuthorization object
		 * (of type RoleEntityQtypeCustomFieldAuthorization), if this Authorization object was restored with
		 * an expansion on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization _objRoleEntityQtypeCustomFieldAuthorization;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeCustomFieldAuthorization objects
		 * (of type RoleEntityQtypeCustomFieldAuthorization[]), if this Authorization object was restored with
		 * an ExpandAsArray on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization[] _objRoleEntityQtypeCustomFieldAuthorizationArray;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleModuleAuthorization object
		 * (of type RoleModuleAuthorization), if this Authorization object was restored with
		 * an expansion on the role_module_authorization association table.
		 * @var RoleModuleAuthorization _objRoleModuleAuthorization;
		 */
		private $_objRoleModuleAuthorization;

		/**
		 * Private member variable that stores a reference to an array of RoleModuleAuthorization objects
		 * (of type RoleModuleAuthorization[]), if this Authorization object was restored with
		 * an ExpandAsArray on the role_module_authorization association table.
		 * @var RoleModuleAuthorization[] _objRoleModuleAuthorizationArray;
		 */
		private $_objRoleModuleAuthorizationArray = array();

		/**
		 * Private member variable that stores a reference to a single Shortcut object
		 * (of type Shortcut), if this Authorization object was restored with
		 * an expansion on the shortcut association table.
		 * @var Shortcut _objShortcut;
		 */
		private $_objShortcut;

		/**
		 * Private member variable that stores a reference to an array of Shortcut objects
		 * (of type Shortcut[]), if this Authorization object was restored with
		 * an ExpandAsArray on the shortcut association table.
		 * @var Shortcut[] _objShortcutArray;
		 */
		private $_objShortcutArray = array();

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
		 * Load a Authorization from PK Info
		 * @param integer $intAuthorizationId
		 * @return Authorization
		 */
		public static function Load($intAuthorizationId) {
			// Use QuerySingle to Perform the Query
			return Authorization::QuerySingle(
				QQ::Equal(QQN::Authorization()->AuthorizationId, $intAuthorizationId)
			);
		}

		/**
		 * Load all Authorizations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Authorization[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Authorization::QueryArray to perform the LoadAll query
			try {
				return Authorization::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Authorizations
		 * @return int
		 */
		public static function CountAll() {
			// Call Authorization::QueryCount to perform the CountAll query
			return Authorization::QueryCount(QQ::All());
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
			$objDatabase = Authorization::GetDatabase();

			// Create/Build out the QueryBuilder object with Authorization-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'authorization');
			Authorization::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('authorization');

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
		 * Static Qcodo Query method to query for a single Authorization object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Authorization the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Authorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Authorization object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Authorization::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Authorization::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Authorization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Authorization[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Authorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Authorization::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Authorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Authorization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Authorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Authorization::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'authorization_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Authorization-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Authorization::GetSelectFields($objQueryBuilder);
				Authorization::GetFromFields($objQueryBuilder);

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
			return Authorization::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Authorization
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'authorization';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'authorization_id', $strAliasPrefix . 'authorization_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Authorization from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Authorization::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Authorization
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAuthorizationId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'authorization__';


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'authorization__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Authorization object
			$objToReturn = new Authorization();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_id'] : $strAliasPrefix . 'authorization_id';
			$objToReturn->intAuthorizationId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'authorization__';




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

			// Check for RoleModuleAuthorization Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemoduleauthorization__role_module_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleAuthorizationArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModuleAuthorization = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Authorizations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Authorization[]
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
					$objItem = Authorization::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Authorization::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Authorization object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Authorization next row resulting from the query
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
			return Authorization::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Authorization object,
		 * by AuthorizationId Index(es)
		 * @param integer $intAuthorizationId
		 * @return Authorization
		*/
		public static function LoadByAuthorizationId($intAuthorizationId, $objOptionalClauses = null) {
			return Authorization::QuerySingle(
				QQ::Equal(QQN::Authorization()->AuthorizationId, $intAuthorizationId)
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
		 * Save this Authorization
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `authorization` (
							`short_description`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strShortDescription) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAuthorizationId = $objDatabase->InsertId('authorization', 'authorization_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`authorization`
						SET
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . '
						WHERE
							`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
		 * Delete this Authorization
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Authorization with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`authorization`
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Authorizations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`authorization`');
		}

		/**
		 * Truncate authorization table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `authorization`');
		}

		/**
		 * Reload this Authorization from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Authorization object.');

			// Reload the Object
			$objReloaded = Authorization::Load($this->intAuthorizationId);

			// Update $this's local variables to match
			$this->strShortDescription = $objReloaded->strShortDescription;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Authorization::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `authorization` (
					`authorization_id`,
					`short_description`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
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
		 * @param integer intAuthorizationId
		 * @return Authorization[]
		 */
		public static function GetJournalForId($intAuthorizationId) {
			$objDatabase = Authorization::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM authorization WHERE authorization_id = ' .
				$objDatabase->SqlVariable($intAuthorizationId) . ' ORDER BY __sys_date');

			return Authorization::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Authorization[]
		 */
		public function GetJournal() {
			return Authorization::GetJournalForId($this->intAuthorizationId);
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
				case 'AuthorizationId':
					// Gets the value for intAuthorizationId (Read-Only PK)
					// @return integer
					return $this->intAuthorizationId;

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

				case '_RoleEntityQtypeBuiltInAuthorization':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorization (Read-Only)
					// if set due to an expansion on the role_entity_qtype_built_in_authorization.authorization_id reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization
					return $this->_objRoleEntityQtypeBuiltInAuthorization;

				case '_RoleEntityQtypeBuiltInAuthorizationArray':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.authorization_id reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization[]
					return (array) $this->_objRoleEntityQtypeBuiltInAuthorizationArray;

				case '_RoleEntityQtypeCustomFieldAuthorization':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorization (Read-Only)
					// if set due to an expansion on the role_entity_qtype_custom_field_authorization.authorization_id reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization
					return $this->_objRoleEntityQtypeCustomFieldAuthorization;

				case '_RoleEntityQtypeCustomFieldAuthorizationArray':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.authorization_id reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization[]
					return (array) $this->_objRoleEntityQtypeCustomFieldAuthorizationArray;

				case '_RoleModuleAuthorization':
					// Gets the value for the private _objRoleModuleAuthorization (Read-Only)
					// if set due to an expansion on the role_module_authorization.authorization_id reverse relationship
					// @return RoleModuleAuthorization
					return $this->_objRoleModuleAuthorization;

				case '_RoleModuleAuthorizationArray':
					// Gets the value for the private _objRoleModuleAuthorizationArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module_authorization.authorization_id reverse relationship
					// @return RoleModuleAuthorization[]
					return (array) $this->_objRoleModuleAuthorizationArray;

				case '_Shortcut':
					// Gets the value for the private _objShortcut (Read-Only)
					// if set due to an expansion on the shortcut.authorization_id reverse relationship
					// @return Shortcut
					return $this->_objShortcut;

				case '_ShortcutArray':
					// Gets the value for the private _objShortcutArray (Read-Only)
					// if set due to an ExpandAsArray on the shortcut.authorization_id reverse relationship
					// @return Shortcut[]
					return (array) $this->_objShortcutArray;


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

			
		
		// Related Objects' Methods for RoleEntityQtypeBuiltInAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeBuiltInAuthorizations as an array of RoleEntityQtypeBuiltInAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeBuiltInAuthorization[]
		*/ 
		public function GetRoleEntityQtypeBuiltInAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intAuthorizationId)))
				return array();

			try {
				return RoleEntityQtypeBuiltInAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId, $objOptionalClauses);
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
			if ((is_null($this->intAuthorizationId)))
				return 0;

			return RoleEntityQtypeBuiltInAuthorization::CountByAuthorizationId($this->intAuthorizationId);
		}

		/**
		 * Associates a RoleEntityQtypeBuiltInAuthorization
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeBuiltInAuthorization(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorization on this Authorization with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->AuthorizationId = $this->intAuthorizationId;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeBuiltInAuthorization
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeBuiltInAuthorization(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this Authorization with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`authorization_id` = null
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->AuthorizationId = null;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeBuiltInAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeBuiltInAuthorizations() {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->AuthorizationId = null;
					$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`authorization_id` = null
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeBuiltInAuthorization
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeBuiltInAuthorization(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this Authorization with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorization on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
			if ((is_null($this->intAuthorizationId)))
				return array();

			try {
				return RoleEntityQtypeCustomFieldAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId, $objOptionalClauses);
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
			if ((is_null($this->intAuthorizationId)))
				return 0;

			return RoleEntityQtypeCustomFieldAuthorization::CountByAuthorizationId($this->intAuthorizationId);
		}

		/**
		 * Associates a RoleEntityQtypeCustomFieldAuthorization
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeCustomFieldAuthorization(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorization on this Authorization with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->AuthorizationId = $this->intAuthorizationId;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeCustomFieldAuthorization
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeCustomFieldAuthorization(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this Authorization with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`authorization_id` = null
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->AuthorizationId = null;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeCustomFieldAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeCustomFieldAuthorizations() {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->AuthorizationId = null;
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`authorization_id` = null
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeCustomFieldAuthorization
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeCustomFieldAuthorization(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this Authorization with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorization on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleModuleAuthorization
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModuleAuthorizations as an array of RoleModuleAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/ 
		public function GetRoleModuleAuthorizationArray($objOptionalClauses = null) {
			if ((is_null($this->intAuthorizationId)))
				return array();

			try {
				return RoleModuleAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId, $objOptionalClauses);
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
			if ((is_null($this->intAuthorizationId)))
				return 0;

			return RoleModuleAuthorization::CountByAuthorizationId($this->intAuthorizationId);
		}

		/**
		 * Associates a RoleModuleAuthorization
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function AssociateRoleModuleAuthorization(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorization on this Authorization with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->AuthorizationId = $this->intAuthorizationId;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModuleAuthorization
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleModuleAuthorization(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this Authorization with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`authorization_id` = null
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->AuthorizationId = null;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModuleAuthorizations
		 * @return void
		*/ 
		public function UnassociateAllRoleModuleAuthorizations() {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->AuthorizationId = null;
					$objRoleModuleAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`authorization_id` = null
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');
		}

		/**
		 * Deletes an associated RoleModuleAuthorization
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModuleAuthorization(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved Authorization.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this Authorization with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorization on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
			if ((is_null($this->intAuthorizationId)))
				return array();

			try {
				return Shortcut::LoadArrayByAuthorizationId($this->intAuthorizationId, $objOptionalClauses);
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
			if ((is_null($this->intAuthorizationId)))
				return 0;

			return Shortcut::CountByAuthorizationId($this->intAuthorizationId);
		}

		/**
		 * Associates a Shortcut
		 * @param Shortcut $objShortcut
		 * @return void
		*/ 
		public function AssociateShortcut(Shortcut $objShortcut) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShortcut on this unsaved Authorization.');
			if ((is_null($objShortcut->ShortcutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShortcut on this Authorization with an unsaved Shortcut.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shortcut`
				SET
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($objShortcut->ShortcutId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShortcut->AuthorizationId = $this->intAuthorizationId;
				$objShortcut->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Shortcut
		 * @param Shortcut $objShortcut
		 * @return void
		*/ 
		public function UnassociateShortcut(Shortcut $objShortcut) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved Authorization.');
			if ((is_null($objShortcut->ShortcutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this Authorization with an unsaved Shortcut.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shortcut`
				SET
					`authorization_id` = null
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($objShortcut->ShortcutId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShortcut->AuthorizationId = null;
				$objShortcut->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Shortcuts
		 * @return void
		*/ 
		public function UnassociateAllShortcuts() {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shortcut::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objShortcut) {
					$objShortcut->AuthorizationId = null;
					$objShortcut->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shortcut`
				SET
					`authorization_id` = null
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');
		}

		/**
		 * Deletes an associated Shortcut
		 * @param Shortcut $objShortcut
		 * @return void
		*/ 
		public function DeleteAssociatedShortcut(Shortcut $objShortcut) {
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved Authorization.');
			if ((is_null($objShortcut->ShortcutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this Authorization with an unsaved Shortcut.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shortcut`
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($objShortcut->ShortcutId) . ' AND
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
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
			if ((is_null($this->intAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShortcut on this unsaved Authorization.');

			// Get the Database Object for this Class
			$objDatabase = Authorization::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shortcut::LoadArrayByAuthorizationId($this->intAuthorizationId) as $objShortcut) {
					$objShortcut->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shortcut`
				WHERE
					`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Authorization"><sequence>';
			$strToReturn .= '<element name="AuthorizationId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Authorization', $strComplexTypeArray)) {
				$strComplexTypeArray['Authorization'] = Authorization::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Authorization::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Authorization();
			if (property_exists($objSoapObject, 'AuthorizationId'))
				$objToReturn->intAuthorizationId = $objSoapObject->AuthorizationId;
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
				array_push($objArrayToReturn, Authorization::GetSoapObjectFromObject($objObject, true));

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
				$objQueryExpansion = new QQueryExpansion('Authorization', 'authorization', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `authorization` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`authorization_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`authorization_id` AS `%s__%s__authorization_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
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
	 * @property-read QQNode $AuthorizationId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorization
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorization
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorization
	 * @property-read QQReverseReferenceNodeShortcut $Shortcut
	 */
	class QQNodeAuthorization extends QQNode {
		protected $strTableName = 'authorization';
		protected $strPrimaryKey = 'authorization_id';
		protected $strClassName = 'Authorization';
		public function __get($strName) {
			switch ($strName) {
				case 'AuthorizationId':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'RoleEntityQtypeBuiltInAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorization', 'reverse_reference', 'authorization_id');
				case 'RoleEntityQtypeCustomFieldAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorization', 'reverse_reference', 'authorization_id');
				case 'RoleModuleAuthorization':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorization', 'reverse_reference', 'authorization_id');
				case 'Shortcut':
					return new QQReverseReferenceNodeShortcut($this, 'shortcut', 'reverse_reference', 'authorization_id');

				case '_PrimaryKeyNode':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
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
	 * @property-read QQNode $AuthorizationId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorization
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorization
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorization
	 * @property-read QQReverseReferenceNodeShortcut $Shortcut
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAuthorization extends QQReverseReferenceNode {
		protected $strTableName = 'authorization';
		protected $strPrimaryKey = 'authorization_id';
		protected $strClassName = 'Authorization';
		public function __get($strName) {
			switch ($strName) {
				case 'AuthorizationId':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'RoleEntityQtypeBuiltInAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorization', 'reverse_reference', 'authorization_id');
				case 'RoleEntityQtypeCustomFieldAuthorization':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorization', 'reverse_reference', 'authorization_id');
				case 'RoleModuleAuthorization':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorization', 'reverse_reference', 'authorization_id');
				case 'Shortcut':
					return new QQReverseReferenceNodeShortcut($this, 'shortcut', 'reverse_reference', 'authorization_id');

				case '_PrimaryKeyNode':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
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