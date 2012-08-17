<?php
	/**
	 * The abstract CountryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Country subclass which
	 * extends this CountryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Country class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $CountryId the value for intCountryId (Read-Only PK)
	 * @property string $ShortDescription the value for strShortDescription (Not Null)
	 * @property string $Abbreviation the value for strAbbreviation 
	 * @property boolean $StateFlag the value for blnStateFlag 
	 * @property boolean $ProvinceFlag the value for blnProvinceFlag 
	 * @property Address $_Address the value for the private _objAddress (Read-Only) if set due to an expansion on the address.country_id reverse relationship
	 * @property Address[] $_AddressArray the value for the private _objAddressArray (Read-Only) if set due to an ExpandAsArray on the address.country_id reverse relationship
	 * @property StateProvince $_StateProvince the value for the private _objStateProvince (Read-Only) if set due to an expansion on the state_province.country_id reverse relationship
	 * @property StateProvince[] $_StateProvinceArray the value for the private _objStateProvinceArray (Read-Only) if set due to an ExpandAsArray on the state_province.country_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CountryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column country.country_id
		 * @var integer intCountryId
		 */
		protected $intCountryId;
		const CountryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column country.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 50;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column country.abbreviation
		 * @var string strAbbreviation
		 */
		protected $strAbbreviation;
		const AbbreviationMaxLength = 2;
		const AbbreviationDefault = null;


		/**
		 * Protected member variable that maps to the database column country.state_flag
		 * @var boolean blnStateFlag
		 */
		protected $blnStateFlag;
		const StateFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column country.province_flag
		 * @var boolean blnProvinceFlag
		 */
		protected $blnProvinceFlag;
		const ProvinceFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single Address object
		 * (of type Address), if this Country object was restored with
		 * an expansion on the address association table.
		 * @var Address _objAddress;
		 */
		private $_objAddress;

		/**
		 * Private member variable that stores a reference to an array of Address objects
		 * (of type Address[]), if this Country object was restored with
		 * an ExpandAsArray on the address association table.
		 * @var Address[] _objAddressArray;
		 */
		private $_objAddressArray = array();

		/**
		 * Private member variable that stores a reference to a single StateProvince object
		 * (of type StateProvince), if this Country object was restored with
		 * an expansion on the state_province association table.
		 * @var StateProvince _objStateProvince;
		 */
		private $_objStateProvince;

		/**
		 * Private member variable that stores a reference to an array of StateProvince objects
		 * (of type StateProvince[]), if this Country object was restored with
		 * an ExpandAsArray on the state_province association table.
		 * @var StateProvince[] _objStateProvinceArray;
		 */
		private $_objStateProvinceArray = array();

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
		 * Load a Country from PK Info
		 * @param integer $intCountryId
		 * @return Country
		 */
		public static function Load($intCountryId) {
			// Use QuerySingle to Perform the Query
			return Country::QuerySingle(
				QQ::Equal(QQN::Country()->CountryId, $intCountryId)
			);
		}

		/**
		 * Load all Countries
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Country[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Country::QueryArray to perform the LoadAll query
			try {
				return Country::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Countries
		 * @return int
		 */
		public static function CountAll() {
			// Call Country::QueryCount to perform the CountAll query
			return Country::QueryCount(QQ::All());
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
			$objDatabase = Country::GetDatabase();

			// Create/Build out the QueryBuilder object with Country-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'country');
			Country::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('country');

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
		 * Static Qcodo Query method to query for a single Country object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Country the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Country::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Country object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Country::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Country::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Country objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Country[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Country::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Country::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Country::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Country objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Country::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Country::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'country_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Country-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Country::GetSelectFields($objQueryBuilder);
				Country::GetFromFields($objQueryBuilder);

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
			return Country::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Country
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'country';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'country_id', $strAliasPrefix . 'country_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'abbreviation', $strAliasPrefix . 'abbreviation');
			$objBuilder->AddSelectItem($strTableName, 'state_flag', $strAliasPrefix . 'state_flag');
			$objBuilder->AddSelectItem($strTableName, 'province_flag', $strAliasPrefix . 'province_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Country from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Country::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Country
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'country_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intCountryId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'country__';


				$strAlias = $strAliasPrefix . 'address__address_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAddressArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAddressArray[$intPreviousChildItemCount - 1];
						$objChildItem = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAddressArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAddressArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stateprovince__state_province_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStateProvinceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStateProvinceArray[$intPreviousChildItemCount - 1];
						$objChildItem = StateProvince::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stateprovince__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStateProvinceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStateProvinceArray[] = StateProvince::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stateprovince__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'country__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Country object
			$objToReturn = new Country();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'country_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country_id'] : $strAliasPrefix . 'country_id';
			$objToReturn->intCountryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'abbreviation', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'abbreviation'] : $strAliasPrefix . 'abbreviation';
			$objToReturn->strAbbreviation = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'state_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'state_flag'] : $strAliasPrefix . 'state_flag';
			$objToReturn->blnStateFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'province_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'province_flag'] : $strAliasPrefix . 'province_flag';
			$objToReturn->blnProvinceFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'country__';




			// Check for Address Virtual Binding
			$strAlias = $strAliasPrefix . 'address__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAddressArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StateProvince Virtual Binding
			$strAlias = $strAliasPrefix . 'stateprovince__state_province_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStateProvinceArray[] = StateProvince::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stateprovince__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStateProvince = StateProvince::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stateprovince__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Countries from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Country[]
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
					$objItem = Country::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Country::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Country object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Country next row resulting from the query
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
			return Country::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Country object,
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @return Country
		*/
		public static function LoadByCountryId($intCountryId, $objOptionalClauses = null) {
			return Country::QuerySingle(
				QQ::Equal(QQN::Country()->CountryId, $intCountryId)
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
		 * Save this Country
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `country` (
							`short_description`,
							`abbreviation`,
							`state_flag`,
							`province_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->strAbbreviation) . ',
							' . $objDatabase->SqlVariable($this->blnStateFlag) . ',
							' . $objDatabase->SqlVariable($this->blnProvinceFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCountryId = $objDatabase->InsertId('country', 'country_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`country`
						SET
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`abbreviation` = ' . $objDatabase->SqlVariable($this->strAbbreviation) . ',
							`state_flag` = ' . $objDatabase->SqlVariable($this->blnStateFlag) . ',
							`province_flag` = ' . $objDatabase->SqlVariable($this->blnProvinceFlag) . '
						WHERE
							`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
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
		 * Delete this Country
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Country with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`country`
				WHERE
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Countries
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`country`');
		}

		/**
		 * Truncate country table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `country`');
		}

		/**
		 * Reload this Country from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Country object.');

			// Reload the Object
			$objReloaded = Country::Load($this->intCountryId);

			// Update $this's local variables to match
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->strAbbreviation = $objReloaded->strAbbreviation;
			$this->blnStateFlag = $objReloaded->blnStateFlag;
			$this->blnProvinceFlag = $objReloaded->blnProvinceFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Country::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `country` (
					`country_id`,
					`short_description`,
					`abbreviation`,
					`state_flag`,
					`province_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intCountryId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->strAbbreviation) . ',
					' . $objDatabase->SqlVariable($this->blnStateFlag) . ',
					' . $objDatabase->SqlVariable($this->blnProvinceFlag) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intCountryId
		 * @return Country[]
		 */
		public static function GetJournalForId($intCountryId) {
			$objDatabase = Country::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM country WHERE country_id = ' .
				$objDatabase->SqlVariable($intCountryId) . ' ORDER BY __sys_date');

			return Country::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Country[]
		 */
		public function GetJournal() {
			return Country::GetJournalForId($this->intCountryId);
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
				case 'CountryId':
					// Gets the value for intCountryId (Read-Only PK)
					// @return integer
					return $this->intCountryId;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Not Null)
					// @return string
					return $this->strShortDescription;

				case 'Abbreviation':
					// Gets the value for strAbbreviation 
					// @return string
					return $this->strAbbreviation;

				case 'StateFlag':
					// Gets the value for blnStateFlag 
					// @return boolean
					return $this->blnStateFlag;

				case 'ProvinceFlag':
					// Gets the value for blnProvinceFlag 
					// @return boolean
					return $this->blnProvinceFlag;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Address':
					// Gets the value for the private _objAddress (Read-Only)
					// if set due to an expansion on the address.country_id reverse relationship
					// @return Address
					return $this->_objAddress;

				case '_AddressArray':
					// Gets the value for the private _objAddressArray (Read-Only)
					// if set due to an ExpandAsArray on the address.country_id reverse relationship
					// @return Address[]
					return (array) $this->_objAddressArray;

				case '_StateProvince':
					// Gets the value for the private _objStateProvince (Read-Only)
					// if set due to an expansion on the state_province.country_id reverse relationship
					// @return StateProvince
					return $this->_objStateProvince;

				case '_StateProvinceArray':
					// Gets the value for the private _objStateProvinceArray (Read-Only)
					// if set due to an ExpandAsArray on the state_province.country_id reverse relationship
					// @return StateProvince[]
					return (array) $this->_objStateProvinceArray;


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

				case 'Abbreviation':
					// Sets the value for strAbbreviation 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAbbreviation = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateFlag':
					// Sets the value for blnStateFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnStateFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProvinceFlag':
					// Sets the value for blnProvinceFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnProvinceFlag = QType::Cast($mixValue, QType::Boolean));
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

			
		
		// Related Objects' Methods for Address
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Addresses as an array of Address objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/ 
		public function GetAddressArray($objOptionalClauses = null) {
			if ((is_null($this->intCountryId)))
				return array();

			try {
				return Address::LoadArrayByCountryId($this->intCountryId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Addresses
		 * @return int
		*/ 
		public function CountAddresses() {
			if ((is_null($this->intCountryId)))
				return 0;

			return Address::CountByCountryId($this->intCountryId);
		}

		/**
		 * Associates a Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function AssociateAddress(Address $objAddress) {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddress on this unsaved Country.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddress on this Country with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAddress->CountryId = $this->intCountryId;
				$objAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function UnassociateAddress(Address $objAddress) {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Country.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this Country with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`country_id` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . ' AND
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAddress->CountryId = null;
				$objAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Addresses
		 * @return void
		*/ 
		public function UnassociateAllAddresses() {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Country.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Address::LoadArrayByCountryId($this->intCountryId) as $objAddress) {
					$objAddress->CountryId = null;
					$objAddress->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`country_id` = null
				WHERE
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');
		}

		/**
		 * Deletes an associated Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function DeleteAssociatedAddress(Address $objAddress) {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Country.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this Country with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . ' AND
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAddress->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Addresses
		 * @return void
		*/ 
		public function DeleteAllAddresses() {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Country.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Address::LoadArrayByCountryId($this->intCountryId) as $objAddress) {
					$objAddress->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');
		}

			
		
		// Related Objects' Methods for StateProvince
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StateProvinces as an array of StateProvince objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StateProvince[]
		*/ 
		public function GetStateProvinceArray($objOptionalClauses = null) {
			if ((is_null($this->intCountryId)))
				return array();

			try {
				return StateProvince::LoadArrayByCountryId($this->intCountryId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StateProvinces
		 * @return int
		*/ 
		public function CountStateProvinces() {
			if ((is_null($this->intCountryId)))
				return 0;

			return StateProvince::CountByCountryId($this->intCountryId);
		}

		/**
		 * Associates a StateProvince
		 * @param StateProvince $objStateProvince
		 * @return void
		*/ 
		public function AssociateStateProvince(StateProvince $objStateProvince) {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStateProvince on this unsaved Country.');
			if ((is_null($objStateProvince->StateProvinceId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStateProvince on this Country with an unsaved StateProvince.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`state_province`
				SET
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
				WHERE
					`state_province_id` = ' . $objDatabase->SqlVariable($objStateProvince->StateProvinceId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStateProvince->CountryId = $this->intCountryId;
				$objStateProvince->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StateProvince
		 * @param StateProvince $objStateProvince
		 * @return void
		*/ 
		public function UnassociateStateProvince(StateProvince $objStateProvince) {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStateProvince on this unsaved Country.');
			if ((is_null($objStateProvince->StateProvinceId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStateProvince on this Country with an unsaved StateProvince.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`state_province`
				SET
					`country_id` = null
				WHERE
					`state_province_id` = ' . $objDatabase->SqlVariable($objStateProvince->StateProvinceId) . ' AND
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStateProvince->CountryId = null;
				$objStateProvince->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StateProvinces
		 * @return void
		*/ 
		public function UnassociateAllStateProvinces() {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStateProvince on this unsaved Country.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StateProvince::LoadArrayByCountryId($this->intCountryId) as $objStateProvince) {
					$objStateProvince->CountryId = null;
					$objStateProvince->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`state_province`
				SET
					`country_id` = null
				WHERE
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');
		}

		/**
		 * Deletes an associated StateProvince
		 * @param StateProvince $objStateProvince
		 * @return void
		*/ 
		public function DeleteAssociatedStateProvince(StateProvince $objStateProvince) {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStateProvince on this unsaved Country.');
			if ((is_null($objStateProvince->StateProvinceId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStateProvince on this Country with an unsaved StateProvince.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`state_province`
				WHERE
					`state_province_id` = ' . $objDatabase->SqlVariable($objStateProvince->StateProvinceId) . ' AND
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStateProvince->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StateProvinces
		 * @return void
		*/ 
		public function DeleteAllStateProvinces() {
			if ((is_null($this->intCountryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStateProvince on this unsaved Country.');

			// Get the Database Object for this Class
			$objDatabase = Country::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StateProvince::LoadArrayByCountryId($this->intCountryId) as $objStateProvince) {
					$objStateProvince->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`state_province`
				WHERE
					`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Country"><sequence>';
			$strToReturn .= '<element name="CountryId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="Abbreviation" type="xsd:string"/>';
			$strToReturn .= '<element name="StateFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ProvinceFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Country', $strComplexTypeArray)) {
				$strComplexTypeArray['Country'] = Country::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Country::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Country();
			if (property_exists($objSoapObject, 'CountryId'))
				$objToReturn->intCountryId = $objSoapObject->CountryId;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'Abbreviation'))
				$objToReturn->strAbbreviation = $objSoapObject->Abbreviation;
			if (property_exists($objSoapObject, 'StateFlag'))
				$objToReturn->blnStateFlag = $objSoapObject->StateFlag;
			if (property_exists($objSoapObject, 'ProvinceFlag'))
				$objToReturn->blnProvinceFlag = $objSoapObject->ProvinceFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Country::GetSoapObjectFromObject($objObject, true));

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
				$objQueryExpansion = new QQueryExpansion('Country', 'country', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `country` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`country_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`country_id` AS `%s__%s__country_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`abbreviation` AS `%s__%s__abbreviation`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`state_flag` AS `%s__%s__state_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`province_flag` AS `%s__%s__province_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

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
	 * @property-read QQNode $CountryId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Abbreviation
	 * @property-read QQNode $StateFlag
	 * @property-read QQNode $ProvinceFlag
	 * @property-read QQReverseReferenceNodeAddress $Address
	 * @property-read QQReverseReferenceNodeStateProvince $StateProvince
	 */
	class QQNodeCountry extends QQNode {
		protected $strTableName = 'country';
		protected $strPrimaryKey = 'country_id';
		protected $strClassName = 'Country';
		public function __get($strName) {
			switch ($strName) {
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Abbreviation':
					return new QQNode('abbreviation', 'Abbreviation', 'string', $this);
				case 'StateFlag':
					return new QQNode('state_flag', 'StateFlag', 'boolean', $this);
				case 'ProvinceFlag':
					return new QQNode('province_flag', 'ProvinceFlag', 'boolean', $this);
				case 'Address':
					return new QQReverseReferenceNodeAddress($this, 'address', 'reverse_reference', 'country_id');
				case 'StateProvince':
					return new QQReverseReferenceNodeStateProvince($this, 'stateprovince', 'reverse_reference', 'country_id');

				case '_PrimaryKeyNode':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
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
	 * @property-read QQNode $CountryId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Abbreviation
	 * @property-read QQNode $StateFlag
	 * @property-read QQNode $ProvinceFlag
	 * @property-read QQReverseReferenceNodeAddress $Address
	 * @property-read QQReverseReferenceNodeStateProvince $StateProvince
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeCountry extends QQReverseReferenceNode {
		protected $strTableName = 'country';
		protected $strPrimaryKey = 'country_id';
		protected $strClassName = 'Country';
		public function __get($strName) {
			switch ($strName) {
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Abbreviation':
					return new QQNode('abbreviation', 'Abbreviation', 'string', $this);
				case 'StateFlag':
					return new QQNode('state_flag', 'StateFlag', 'boolean', $this);
				case 'ProvinceFlag':
					return new QQNode('province_flag', 'ProvinceFlag', 'boolean', $this);
				case 'Address':
					return new QQReverseReferenceNodeAddress($this, 'address', 'reverse_reference', 'country_id');
				case 'StateProvince':
					return new QQReverseReferenceNodeStateProvince($this, 'stateprovince', 'reverse_reference', 'country_id');

				case '_PrimaryKeyNode':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
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