<?php
	/**
	 * The abstract ShortcutGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Shortcut subclass which
	 * extends this ShortcutGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Shortcut class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ShortcutId the value for intShortcutId (Read-Only PK)
	 * @property integer $ModuleId the value for intModuleId (Not Null)
	 * @property integer $AuthorizationId the value for intAuthorizationId 
	 * @property integer $TransactionTypeId the value for intTransactionTypeId 
	 * @property string $ShortDescription the value for strShortDescription (Not Null)
	 * @property string $Link the value for strLink (Not Null)
	 * @property string $ImagePath the value for strImagePath 
	 * @property integer $EntityQtypeId the value for intEntityQtypeId (Not Null)
	 * @property boolean $CreateFlag the value for blnCreateFlag (Not Null)
	 * @property Module $Module the value for the Module object referenced by intModuleId (Not Null)
	 * @property Authorization $Authorization the value for the Authorization object referenced by intAuthorizationId 
	 * @property TransactionType $TransactionType the value for the TransactionType object referenced by intTransactionTypeId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ShortcutGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column shortcut.shortcut_id
		 * @var integer intShortcutId
		 */
		protected $intShortcutId;
		const ShortcutIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.module_id
		 * @var integer intModuleId
		 */
		protected $intModuleId;
		const ModuleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.authorization_id
		 * @var integer intAuthorizationId
		 */
		protected $intAuthorizationId;
		const AuthorizationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.transaction_type_id
		 * @var integer intTransactionTypeId
		 */
		protected $intTransactionTypeId;
		const TransactionTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.link
		 * @var string strLink
		 */
		protected $strLink;
		const LinkMaxLength = 255;
		const LinkDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.image_path
		 * @var string strImagePath
		 */
		protected $strImagePath;
		const ImagePathMaxLength = 255;
		const ImagePathDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.entity_qtype_id
		 * @var integer intEntityQtypeId
		 */
		protected $intEntityQtypeId;
		const EntityQtypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shortcut.create_flag
		 * @var boolean blnCreateFlag
		 */
		protected $blnCreateFlag;
		const CreateFlagDefault = null;


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
		 * in the database column shortcut.module_id.
		 *
		 * NOTE: Always use the Module property getter to correctly retrieve this Module object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Module objModule
		 */
		protected $objModule;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shortcut.authorization_id.
		 *
		 * NOTE: Always use the Authorization property getter to correctly retrieve this Authorization object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Authorization objAuthorization
		 */
		protected $objAuthorization;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shortcut.transaction_type_id.
		 *
		 * NOTE: Always use the TransactionType property getter to correctly retrieve this TransactionType object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TransactionType objTransactionType
		 */
		protected $objTransactionType;





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
		 * Load a Shortcut from PK Info
		 * @param integer $intShortcutId
		 * @return Shortcut
		 */
		public static function Load($intShortcutId) {
			// Use QuerySingle to Perform the Query
			return Shortcut::QuerySingle(
				QQ::Equal(QQN::Shortcut()->ShortcutId, $intShortcutId)
			);
		}

		/**
		 * Load all Shortcuts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shortcut[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Shortcut::QueryArray to perform the LoadAll query
			try {
				return Shortcut::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Shortcuts
		 * @return int
		 */
		public static function CountAll() {
			// Call Shortcut::QueryCount to perform the CountAll query
			return Shortcut::QueryCount(QQ::All());
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
			$objDatabase = Shortcut::GetDatabase();

			// Create/Build out the QueryBuilder object with Shortcut-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'shortcut');
			Shortcut::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('shortcut');

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
		 * Static Qcodo Query method to query for a single Shortcut object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Shortcut the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Shortcut::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Shortcut object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Shortcut::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Shortcut::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Shortcut objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Shortcut[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Shortcut::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Shortcut::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Shortcut::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Shortcut objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Shortcut::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Shortcut::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'shortcut_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Shortcut-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Shortcut::GetSelectFields($objQueryBuilder);
				Shortcut::GetFromFields($objQueryBuilder);

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
			return Shortcut::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Shortcut
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'shortcut';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'shortcut_id', $strAliasPrefix . 'shortcut_id');
			$objBuilder->AddSelectItem($strTableName, 'module_id', $strAliasPrefix . 'module_id');
			$objBuilder->AddSelectItem($strTableName, 'authorization_id', $strAliasPrefix . 'authorization_id');
			$objBuilder->AddSelectItem($strTableName, 'transaction_type_id', $strAliasPrefix . 'transaction_type_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'link', $strAliasPrefix . 'link');
			$objBuilder->AddSelectItem($strTableName, 'image_path', $strAliasPrefix . 'image_path');
			$objBuilder->AddSelectItem($strTableName, 'entity_qtype_id', $strAliasPrefix . 'entity_qtype_id');
			$objBuilder->AddSelectItem($strTableName, 'create_flag', $strAliasPrefix . 'create_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Shortcut from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Shortcut::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Shortcut
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Shortcut object
			$objToReturn = new Shortcut();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'shortcut_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'shortcut_id'] : $strAliasPrefix . 'shortcut_id';
			$objToReturn->intShortcutId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'module_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'module_id'] : $strAliasPrefix . 'module_id';
			$objToReturn->intModuleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_id'] : $strAliasPrefix . 'authorization_id';
			$objToReturn->intAuthorizationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_type_id'] : $strAliasPrefix . 'transaction_type_id';
			$objToReturn->intTransactionTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'link', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'link'] : $strAliasPrefix . 'link';
			$objToReturn->strLink = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'image_path', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'image_path'] : $strAliasPrefix . 'image_path';
			$objToReturn->strImagePath = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'entity_qtype_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'entity_qtype_id'] : $strAliasPrefix . 'entity_qtype_id';
			$objToReturn->intEntityQtypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'create_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'create_flag'] : $strAliasPrefix . 'create_flag';
			$objToReturn->blnCreateFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'shortcut__';

			// Check for Module Early Binding
			$strAlias = $strAliasPrefix . 'module_id__module_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objModule = Module::InstantiateDbRow($objDbRow, $strAliasPrefix . 'module_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Authorization Early Binding
			$strAlias = $strAliasPrefix . 'authorization_id__authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAuthorization = Authorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'authorization_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for TransactionType Early Binding
			$strAlias = $strAliasPrefix . 'transaction_type_id__transaction_type_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTransactionType = TransactionType::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction_type_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Shortcuts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Shortcut[]
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
					$objItem = Shortcut::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Shortcut::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Shortcut object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Shortcut next row resulting from the query
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
			return Shortcut::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Shortcut object,
		 * by ShortcutId Index(es)
		 * @param integer $intShortcutId
		 * @return Shortcut
		*/
		public static function LoadByShortcutId($intShortcutId, $objOptionalClauses = null) {
			return Shortcut::QuerySingle(
				QQ::Equal(QQN::Shortcut()->ShortcutId, $intShortcutId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shortcut objects,
		 * by ModuleId Index(es)
		 * @param integer $intModuleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shortcut[]
		*/
		public static function LoadArrayByModuleId($intModuleId, $objOptionalClauses = null) {
			// Call Shortcut::QueryArray to perform the LoadArrayByModuleId query
			try {
				return Shortcut::QueryArray(
					QQ::Equal(QQN::Shortcut()->ModuleId, $intModuleId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shortcuts
		 * by ModuleId Index(es)
		 * @param integer $intModuleId
		 * @return int
		*/
		public static function CountByModuleId($intModuleId, $objOptionalClauses = null) {
			// Call Shortcut::QueryCount to perform the CountByModuleId query
			return Shortcut::QueryCount(
				QQ::Equal(QQN::Shortcut()->ModuleId, $intModuleId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shortcut objects,
		 * by AuthorizationId Index(es)
		 * @param integer $intAuthorizationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shortcut[]
		*/
		public static function LoadArrayByAuthorizationId($intAuthorizationId, $objOptionalClauses = null) {
			// Call Shortcut::QueryArray to perform the LoadArrayByAuthorizationId query
			try {
				return Shortcut::QueryArray(
					QQ::Equal(QQN::Shortcut()->AuthorizationId, $intAuthorizationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shortcuts
		 * by AuthorizationId Index(es)
		 * @param integer $intAuthorizationId
		 * @return int
		*/
		public static function CountByAuthorizationId($intAuthorizationId, $objOptionalClauses = null) {
			// Call Shortcut::QueryCount to perform the CountByAuthorizationId query
			return Shortcut::QueryCount(
				QQ::Equal(QQN::Shortcut()->AuthorizationId, $intAuthorizationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shortcut objects,
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shortcut[]
		*/
		public static function LoadArrayByTransactionTypeId($intTransactionTypeId, $objOptionalClauses = null) {
			// Call Shortcut::QueryArray to perform the LoadArrayByTransactionTypeId query
			try {
				return Shortcut::QueryArray(
					QQ::Equal(QQN::Shortcut()->TransactionTypeId, $intTransactionTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shortcuts
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @return int
		*/
		public static function CountByTransactionTypeId($intTransactionTypeId, $objOptionalClauses = null) {
			// Call Shortcut::QueryCount to perform the CountByTransactionTypeId query
			return Shortcut::QueryCount(
				QQ::Equal(QQN::Shortcut()->TransactionTypeId, $intTransactionTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shortcut objects,
		 * by EntityQtypeId Index(es)
		 * @param integer $intEntityQtypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shortcut[]
		*/
		public static function LoadArrayByEntityQtypeId($intEntityQtypeId, $objOptionalClauses = null) {
			// Call Shortcut::QueryArray to perform the LoadArrayByEntityQtypeId query
			try {
				return Shortcut::QueryArray(
					QQ::Equal(QQN::Shortcut()->EntityQtypeId, $intEntityQtypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shortcuts
		 * by EntityQtypeId Index(es)
		 * @param integer $intEntityQtypeId
		 * @return int
		*/
		public static function CountByEntityQtypeId($intEntityQtypeId, $objOptionalClauses = null) {
			// Call Shortcut::QueryCount to perform the CountByEntityQtypeId query
			return Shortcut::QueryCount(
				QQ::Equal(QQN::Shortcut()->EntityQtypeId, $intEntityQtypeId)
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
		 * Save this Shortcut
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Shortcut::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `shortcut` (
							`module_id`,
							`authorization_id`,
							`transaction_type_id`,
							`short_description`,
							`link`,
							`image_path`,
							`entity_qtype_id`,
							`create_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intModuleId) . ',
							' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
							' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->strLink) . ',
							' . $objDatabase->SqlVariable($this->strImagePath) . ',
							' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
							' . $objDatabase->SqlVariable($this->blnCreateFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intShortcutId = $objDatabase->InsertId('shortcut', 'shortcut_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`shortcut`
						SET
							`module_id` = ' . $objDatabase->SqlVariable($this->intModuleId) . ',
							`authorization_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
							`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`link` = ' . $objDatabase->SqlVariable($this->strLink) . ',
							`image_path` = ' . $objDatabase->SqlVariable($this->strImagePath) . ',
							`entity_qtype_id` = ' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
							`create_flag` = ' . $objDatabase->SqlVariable($this->blnCreateFlag) . '
						WHERE
							`shortcut_id` = ' . $objDatabase->SqlVariable($this->intShortcutId) . '
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
		 * Delete this Shortcut
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intShortcutId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Shortcut with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Shortcut::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shortcut`
				WHERE
					`shortcut_id` = ' . $objDatabase->SqlVariable($this->intShortcutId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Shortcuts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Shortcut::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shortcut`');
		}

		/**
		 * Truncate shortcut table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Shortcut::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `shortcut`');
		}

		/**
		 * Reload this Shortcut from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Shortcut object.');

			// Reload the Object
			$objReloaded = Shortcut::Load($this->intShortcutId);

			// Update $this's local variables to match
			$this->ModuleId = $objReloaded->ModuleId;
			$this->AuthorizationId = $objReloaded->AuthorizationId;
			$this->TransactionTypeId = $objReloaded->TransactionTypeId;
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->strLink = $objReloaded->strLink;
			$this->strImagePath = $objReloaded->strImagePath;
			$this->EntityQtypeId = $objReloaded->EntityQtypeId;
			$this->blnCreateFlag = $objReloaded->blnCreateFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Shortcut::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `shortcut` (
					`shortcut_id`,
					`module_id`,
					`authorization_id`,
					`transaction_type_id`,
					`short_description`,
					`link`,
					`image_path`,
					`entity_qtype_id`,
					`create_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intShortcutId) . ',
					' . $objDatabase->SqlVariable($this->intModuleId) . ',
					' . $objDatabase->SqlVariable($this->intAuthorizationId) . ',
					' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->strLink) . ',
					' . $objDatabase->SqlVariable($this->strImagePath) . ',
					' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
					' . $objDatabase->SqlVariable($this->blnCreateFlag) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intShortcutId
		 * @return Shortcut[]
		 */
		public static function GetJournalForId($intShortcutId) {
			$objDatabase = Shortcut::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM shortcut WHERE shortcut_id = ' .
				$objDatabase->SqlVariable($intShortcutId) . ' ORDER BY __sys_date');

			return Shortcut::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Shortcut[]
		 */
		public function GetJournal() {
			return Shortcut::GetJournalForId($this->intShortcutId);
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
				case 'ShortcutId':
					// Gets the value for intShortcutId (Read-Only PK)
					// @return integer
					return $this->intShortcutId;

				case 'ModuleId':
					// Gets the value for intModuleId (Not Null)
					// @return integer
					return $this->intModuleId;

				case 'AuthorizationId':
					// Gets the value for intAuthorizationId 
					// @return integer
					return $this->intAuthorizationId;

				case 'TransactionTypeId':
					// Gets the value for intTransactionTypeId 
					// @return integer
					return $this->intTransactionTypeId;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Not Null)
					// @return string
					return $this->strShortDescription;

				case 'Link':
					// Gets the value for strLink (Not Null)
					// @return string
					return $this->strLink;

				case 'ImagePath':
					// Gets the value for strImagePath 
					// @return string
					return $this->strImagePath;

				case 'EntityQtypeId':
					// Gets the value for intEntityQtypeId (Not Null)
					// @return integer
					return $this->intEntityQtypeId;

				case 'CreateFlag':
					// Gets the value for blnCreateFlag (Not Null)
					// @return boolean
					return $this->blnCreateFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'Module':
					// Gets the value for the Module object referenced by intModuleId (Not Null)
					// @return Module
					try {
						if ((!$this->objModule) && (!is_null($this->intModuleId)))
							$this->objModule = Module::Load($this->intModuleId);
						return $this->objModule;
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

				case 'TransactionType':
					// Gets the value for the TransactionType object referenced by intTransactionTypeId 
					// @return TransactionType
					try {
						if ((!$this->objTransactionType) && (!is_null($this->intTransactionTypeId)))
							$this->objTransactionType = TransactionType::Load($this->intTransactionTypeId);
						return $this->objTransactionType;
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
				case 'ModuleId':
					// Sets the value for intModuleId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objModule = null;
						return ($this->intModuleId = QType::Cast($mixValue, QType::Integer));
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

				case 'TransactionTypeId':
					// Sets the value for intTransactionTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objTransactionType = null;
						return ($this->intTransactionTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Link':
					// Sets the value for strLink (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLink = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ImagePath':
					// Sets the value for strImagePath 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strImagePath = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'CreateFlag':
					// Sets the value for blnCreateFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCreateFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Module':
					// Sets the value for the Module object referenced by intModuleId (Not Null)
					// @param Module $mixValue
					// @return Module
					if (is_null($mixValue)) {
						$this->intModuleId = null;
						$this->objModule = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Module object
						try {
							$mixValue = QType::Cast($mixValue, 'Module');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Module object
						if (is_null($mixValue->ModuleId))
							throw new QCallerException('Unable to set an unsaved Module for this Shortcut');

						// Update Local Member Variables
						$this->objModule = $mixValue;
						$this->intModuleId = $mixValue->ModuleId;

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
							throw new QCallerException('Unable to set an unsaved Authorization for this Shortcut');

						// Update Local Member Variables
						$this->objAuthorization = $mixValue;
						$this->intAuthorizationId = $mixValue->AuthorizationId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TransactionType':
					// Sets the value for the TransactionType object referenced by intTransactionTypeId 
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
							throw new QCallerException('Unable to set an unsaved TransactionType for this Shortcut');

						// Update Local Member Variables
						$this->objTransactionType = $mixValue;
						$this->intTransactionTypeId = $mixValue->TransactionTypeId;

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
			$strToReturn = '<complexType name="Shortcut"><sequence>';
			$strToReturn .= '<element name="ShortcutId" type="xsd:int"/>';
			$strToReturn .= '<element name="Module" type="xsd1:Module"/>';
			$strToReturn .= '<element name="Authorization" type="xsd1:Authorization"/>';
			$strToReturn .= '<element name="TransactionType" type="xsd1:TransactionType"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="Link" type="xsd:string"/>';
			$strToReturn .= '<element name="ImagePath" type="xsd:string"/>';
			$strToReturn .= '<element name="EntityQtypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="CreateFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Shortcut', $strComplexTypeArray)) {
				$strComplexTypeArray['Shortcut'] = Shortcut::GetSoapComplexTypeXml();
				Module::AlterSoapComplexTypeArray($strComplexTypeArray);
				Authorization::AlterSoapComplexTypeArray($strComplexTypeArray);
				TransactionType::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Shortcut::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Shortcut();
			if (property_exists($objSoapObject, 'ShortcutId'))
				$objToReturn->intShortcutId = $objSoapObject->ShortcutId;
			if ((property_exists($objSoapObject, 'Module')) &&
				($objSoapObject->Module))
				$objToReturn->Module = Module::GetObjectFromSoapObject($objSoapObject->Module);
			if ((property_exists($objSoapObject, 'Authorization')) &&
				($objSoapObject->Authorization))
				$objToReturn->Authorization = Authorization::GetObjectFromSoapObject($objSoapObject->Authorization);
			if ((property_exists($objSoapObject, 'TransactionType')) &&
				($objSoapObject->TransactionType))
				$objToReturn->TransactionType = TransactionType::GetObjectFromSoapObject($objSoapObject->TransactionType);
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'Link'))
				$objToReturn->strLink = $objSoapObject->Link;
			if (property_exists($objSoapObject, 'ImagePath'))
				$objToReturn->strImagePath = $objSoapObject->ImagePath;
			if (property_exists($objSoapObject, 'EntityQtypeId'))
				$objToReturn->intEntityQtypeId = $objSoapObject->EntityQtypeId;
			if (property_exists($objSoapObject, 'CreateFlag'))
				$objToReturn->blnCreateFlag = $objSoapObject->CreateFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Shortcut::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objModule)
				$objObject->objModule = Module::GetSoapObjectFromObject($objObject->objModule, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intModuleId = null;
			if ($objObject->objAuthorization)
				$objObject->objAuthorization = Authorization::GetSoapObjectFromObject($objObject->objAuthorization, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAuthorizationId = null;
			if ($objObject->objTransactionType)
				$objObject->objTransactionType = TransactionType::GetSoapObjectFromObject($objObject->objTransactionType, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransactionTypeId = null;
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
				$objQueryExpansion = new QQueryExpansion('Shortcut', 'shortcut', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `shortcut` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`shortcut_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`shortcut_id` AS `%s__%s__shortcut_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`module_id` AS `%s__%s__module_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`authorization_id` AS `%s__%s__authorization_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_type_id` AS `%s__%s__transaction_type_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`link` AS `%s__%s__link`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`image_path` AS `%s__%s__image_path`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`entity_qtype_id` AS `%s__%s__entity_qtype_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`create_flag` AS `%s__%s__create_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'module_id':
							try {
								Module::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
						case 'transaction_type_id':
							try {
								TransactionType::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandModule = 'module_id';
		const ExpandAuthorization = 'authorization_id';
		const ExpandTransactionType = 'transaction_type_id';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $ShortcutId
	 * @property-read QQNode $ModuleId
	 * @property-read QQNodeModule $Module
	 * @property-read QQNode $AuthorizationId
	 * @property-read QQNodeAuthorization $Authorization
	 * @property-read QQNode $TransactionTypeId
	 * @property-read QQNodeTransactionType $TransactionType
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Link
	 * @property-read QQNode $ImagePath
	 * @property-read QQNode $EntityQtypeId
	 * @property-read QQNode $CreateFlag
	 */
	class QQNodeShortcut extends QQNode {
		protected $strTableName = 'shortcut';
		protected $strPrimaryKey = 'shortcut_id';
		protected $strClassName = 'Shortcut';
		public function __get($strName) {
			switch ($strName) {
				case 'ShortcutId':
					return new QQNode('shortcut_id', 'ShortcutId', 'integer', $this);
				case 'ModuleId':
					return new QQNode('module_id', 'ModuleId', 'integer', $this);
				case 'Module':
					return new QQNodeModule('module_id', 'Module', 'integer', $this);
				case 'AuthorizationId':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
				case 'Authorization':
					return new QQNodeAuthorization('authorization_id', 'Authorization', 'integer', $this);
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
				case 'TransactionType':
					return new QQNodeTransactionType('transaction_type_id', 'TransactionType', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Link':
					return new QQNode('link', 'Link', 'string', $this);
				case 'ImagePath':
					return new QQNode('image_path', 'ImagePath', 'string', $this);
				case 'EntityQtypeId':
					return new QQNode('entity_qtype_id', 'EntityQtypeId', 'integer', $this);
				case 'CreateFlag':
					return new QQNode('create_flag', 'CreateFlag', 'boolean', $this);

				case '_PrimaryKeyNode':
					return new QQNode('shortcut_id', 'ShortcutId', 'integer', $this);
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
	 * @property-read QQNode $ShortcutId
	 * @property-read QQNode $ModuleId
	 * @property-read QQNodeModule $Module
	 * @property-read QQNode $AuthorizationId
	 * @property-read QQNodeAuthorization $Authorization
	 * @property-read QQNode $TransactionTypeId
	 * @property-read QQNodeTransactionType $TransactionType
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Link
	 * @property-read QQNode $ImagePath
	 * @property-read QQNode $EntityQtypeId
	 * @property-read QQNode $CreateFlag
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeShortcut extends QQReverseReferenceNode {
		protected $strTableName = 'shortcut';
		protected $strPrimaryKey = 'shortcut_id';
		protected $strClassName = 'Shortcut';
		public function __get($strName) {
			switch ($strName) {
				case 'ShortcutId':
					return new QQNode('shortcut_id', 'ShortcutId', 'integer', $this);
				case 'ModuleId':
					return new QQNode('module_id', 'ModuleId', 'integer', $this);
				case 'Module':
					return new QQNodeModule('module_id', 'Module', 'integer', $this);
				case 'AuthorizationId':
					return new QQNode('authorization_id', 'AuthorizationId', 'integer', $this);
				case 'Authorization':
					return new QQNodeAuthorization('authorization_id', 'Authorization', 'integer', $this);
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'TransactionTypeId', 'integer', $this);
				case 'TransactionType':
					return new QQNodeTransactionType('transaction_type_id', 'TransactionType', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Link':
					return new QQNode('link', 'Link', 'string', $this);
				case 'ImagePath':
					return new QQNode('image_path', 'ImagePath', 'string', $this);
				case 'EntityQtypeId':
					return new QQNode('entity_qtype_id', 'EntityQtypeId', 'integer', $this);
				case 'CreateFlag':
					return new QQNode('create_flag', 'CreateFlag', 'boolean', $this);

				case '_PrimaryKeyNode':
					return new QQNode('shortcut_id', 'ShortcutId', 'integer', $this);
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