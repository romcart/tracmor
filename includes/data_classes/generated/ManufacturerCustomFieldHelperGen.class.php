<?php
	/**
	 * The abstract ManufacturerCustomFieldHelperGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ManufacturerCustomFieldHelper subclass which
	 * extends this ManufacturerCustomFieldHelperGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ManufacturerCustomFieldHelper class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ManufacturerId the value for intManufacturerId (PK)
	 * @property Manufacturer $Manufacturer the value for the Manufacturer object referenced by intManufacturerId (PK)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ManufacturerCustomFieldHelperGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column manufacturer_custom_field_helper.manufacturer_id
		 * @var integer intManufacturerId
		 */
		protected $intManufacturerId;
		const ManufacturerIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intManufacturerId;
		 */
		protected $__intManufacturerId;

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
		 * in the database column manufacturer_custom_field_helper.manufacturer_id.
		 *
		 * NOTE: Always use the Manufacturer property getter to correctly retrieve this Manufacturer object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Manufacturer objManufacturer
		 */
		protected $objManufacturer;





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
		 * Load a ManufacturerCustomFieldHelper from PK Info
		 * @param integer $intManufacturerId
		 * @return ManufacturerCustomFieldHelper
		 */
		public static function Load($intManufacturerId) {
			// Use QuerySingle to Perform the Query
			return ManufacturerCustomFieldHelper::QuerySingle(
				QQ::Equal(QQN::ManufacturerCustomFieldHelper()->ManufacturerId, $intManufacturerId)
			);
		}

		/**
		 * Load all ManufacturerCustomFieldHelpers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManufacturerCustomFieldHelper[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ManufacturerCustomFieldHelper::QueryArray to perform the LoadAll query
			try {
				return ManufacturerCustomFieldHelper::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ManufacturerCustomFieldHelpers
		 * @return int
		 */
		public static function CountAll() {
			// Call ManufacturerCustomFieldHelper::QueryCount to perform the CountAll query
			return ManufacturerCustomFieldHelper::QueryCount(QQ::All());
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
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase();

			// Create/Build out the QueryBuilder object with ManufacturerCustomFieldHelper-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'manufacturer_custom_field_helper');
			ManufacturerCustomFieldHelper::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('manufacturer_custom_field_helper');

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
		 * Static Qcodo Query method to query for a single ManufacturerCustomFieldHelper object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ManufacturerCustomFieldHelper the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ManufacturerCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ManufacturerCustomFieldHelper object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ManufacturerCustomFieldHelper::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ManufacturerCustomFieldHelper::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ManufacturerCustomFieldHelper objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ManufacturerCustomFieldHelper[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ManufacturerCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ManufacturerCustomFieldHelper::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ManufacturerCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ManufacturerCustomFieldHelper objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ManufacturerCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'manufacturer_custom_field_helper_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ManufacturerCustomFieldHelper-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ManufacturerCustomFieldHelper::GetSelectFields($objQueryBuilder);
				ManufacturerCustomFieldHelper::GetFromFields($objQueryBuilder);

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
			return ManufacturerCustomFieldHelper::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ManufacturerCustomFieldHelper
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'manufacturer_custom_field_helper';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'manufacturer_id', $strAliasPrefix . 'manufacturer_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ManufacturerCustomFieldHelper from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ManufacturerCustomFieldHelper::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ManufacturerCustomFieldHelper
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ManufacturerCustomFieldHelper object
			$objToReturn = new ManufacturerCustomFieldHelper();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'manufacturer_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'manufacturer_id'] : $strAliasPrefix . 'manufacturer_id';
			$objToReturn->intManufacturerId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intManufacturerId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'manufacturer_custom_field_helper__';

			// Check for Manufacturer Early Binding
			$strAlias = $strAliasPrefix . 'manufacturer_id__manufacturer_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objManufacturer = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturer_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ManufacturerCustomFieldHelpers from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ManufacturerCustomFieldHelper[]
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
					$objItem = ManufacturerCustomFieldHelper::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ManufacturerCustomFieldHelper::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ManufacturerCustomFieldHelper object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ManufacturerCustomFieldHelper next row resulting from the query
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
			return ManufacturerCustomFieldHelper::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ManufacturerCustomFieldHelper object,
		 * by ManufacturerId Index(es)
		 * @param integer $intManufacturerId
		 * @return ManufacturerCustomFieldHelper
		*/
		public static function LoadByManufacturerId($intManufacturerId, $objOptionalClauses = null) {
			return ManufacturerCustomFieldHelper::QuerySingle(
				QQ::Equal(QQN::ManufacturerCustomFieldHelper()->ManufacturerId, $intManufacturerId)
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
		 * Save this ManufacturerCustomFieldHelper
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `manufacturer_custom_field_helper` (
							`manufacturer_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intManufacturerId) . '
						)
					');



					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`manufacturer_custom_field_helper`
						SET
							`manufacturer_id` = ' . $objDatabase->SqlVariable($this->intManufacturerId) . '
						WHERE
							`manufacturer_id` = ' . $objDatabase->SqlVariable($this->__intManufacturerId) . '
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
			$this->__intManufacturerId = $this->intManufacturerId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ManufacturerCustomFieldHelper
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ManufacturerCustomFieldHelper with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manufacturer_custom_field_helper`
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($this->intManufacturerId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ManufacturerCustomFieldHelpers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manufacturer_custom_field_helper`');
		}

		/**
		 * Truncate manufacturer_custom_field_helper table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `manufacturer_custom_field_helper`');
		}

		/**
		 * Reload this ManufacturerCustomFieldHelper from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ManufacturerCustomFieldHelper object.');

			// Reload the Object
			$objReloaded = ManufacturerCustomFieldHelper::Load($this->intManufacturerId);

			// Update $this's local variables to match
			$this->ManufacturerId = $objReloaded->ManufacturerId;
			$this->__intManufacturerId = $this->intManufacturerId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `manufacturer_custom_field_helper` (
					`manufacturer_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intManufacturerId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intManufacturerId
		 * @return ManufacturerCustomFieldHelper[]
		 */
		public static function GetJournalForId($intManufacturerId) {
			$objDatabase = ManufacturerCustomFieldHelper::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM manufacturer_custom_field_helper WHERE manufacturer_id = ' .
				$objDatabase->SqlVariable($intManufacturerId) . ' ORDER BY __sys_date');

			return ManufacturerCustomFieldHelper::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ManufacturerCustomFieldHelper[]
		 */
		public function GetJournal() {
			return ManufacturerCustomFieldHelper::GetJournalForId($this->intManufacturerId);
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
				case 'ManufacturerId':
					// Gets the value for intManufacturerId (PK)
					// @return integer
					return $this->intManufacturerId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Manufacturer':
					// Gets the value for the Manufacturer object referenced by intManufacturerId (PK)
					// @return Manufacturer
					try {
						if ((!$this->objManufacturer) && (!is_null($this->intManufacturerId)))
							$this->objManufacturer = Manufacturer::Load($this->intManufacturerId);
						return $this->objManufacturer;
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
				case 'ManufacturerId':
					// Sets the value for intManufacturerId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objManufacturer = null;
						return ($this->intManufacturerId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Manufacturer':
					// Sets the value for the Manufacturer object referenced by intManufacturerId (PK)
					// @param Manufacturer $mixValue
					// @return Manufacturer
					if (is_null($mixValue)) {
						$this->intManufacturerId = null;
						$this->objManufacturer = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Manufacturer object
						try {
							$mixValue = QType::Cast($mixValue, 'Manufacturer');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Manufacturer object
						if (is_null($mixValue->ManufacturerId))
							throw new QCallerException('Unable to set an unsaved Manufacturer for this ManufacturerCustomFieldHelper');

						// Update Local Member Variables
						$this->objManufacturer = $mixValue;
						$this->intManufacturerId = $mixValue->ManufacturerId;

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
			$strToReturn = '<complexType name="ManufacturerCustomFieldHelper"><sequence>';
			$strToReturn .= '<element name="Manufacturer" type="xsd1:Manufacturer"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ManufacturerCustomFieldHelper', $strComplexTypeArray)) {
				$strComplexTypeArray['ManufacturerCustomFieldHelper'] = ManufacturerCustomFieldHelper::GetSoapComplexTypeXml();
				Manufacturer::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ManufacturerCustomFieldHelper::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ManufacturerCustomFieldHelper();
			if ((property_exists($objSoapObject, 'Manufacturer')) &&
				($objSoapObject->Manufacturer))
				$objToReturn->Manufacturer = Manufacturer::GetObjectFromSoapObject($objSoapObject->Manufacturer);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ManufacturerCustomFieldHelper::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objManufacturer)
				$objObject->objManufacturer = Manufacturer::GetSoapObjectFromObject($objObject->objManufacturer, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intManufacturerId = null;
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
				$objQueryExpansion = new QQueryExpansion('ManufacturerCustomFieldHelper', 'manufacturer_custom_field_helper', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `manufacturer_custom_field_helper` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`manufacturer_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`manufacturer_id` AS `%s__%s__manufacturer_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'manufacturer_id':
							try {
								Manufacturer::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandManufacturer = 'manufacturer_id';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $ManufacturerId
	 * @property-read QQNodeManufacturer $Manufacturer
	 */
	class QQNodeManufacturerCustomFieldHelper extends QQNode {
		protected $strTableName = 'manufacturer_custom_field_helper';
		protected $strPrimaryKey = 'manufacturer_id';
		protected $strClassName = 'ManufacturerCustomFieldHelper';
		public function __get($strName) {
			switch ($strName) {
				case 'ManufacturerId':
					return new QQNode('manufacturer_id', 'ManufacturerId', 'integer', $this);
				case 'Manufacturer':
					return new QQNodeManufacturer('manufacturer_id', 'Manufacturer', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeManufacturer('manufacturer_id', 'ManufacturerId', 'integer', $this);
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
	 * @property-read QQNode $ManufacturerId
	 * @property-read QQNodeManufacturer $Manufacturer
	 * @property-read QQNodeManufacturer $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeManufacturerCustomFieldHelper extends QQReverseReferenceNode {
		protected $strTableName = 'manufacturer_custom_field_helper';
		protected $strPrimaryKey = 'manufacturer_id';
		protected $strClassName = 'ManufacturerCustomFieldHelper';
		public function __get($strName) {
			switch ($strName) {
				case 'ManufacturerId':
					return new QQNode('manufacturer_id', 'ManufacturerId', 'integer', $this);
				case 'Manufacturer':
					return new QQNodeManufacturer('manufacturer_id', 'Manufacturer', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeManufacturer('manufacturer_id', 'ManufacturerId', 'integer', $this);
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