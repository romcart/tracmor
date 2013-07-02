<?php
	/**
	 * The abstract DepreciationClassGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DepreciationClass subclass which
	 * extends this DepreciationClassGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DepreciationClass class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $DepreciationClassId the value for intDepreciationClassId (Read-Only PK)
	 * @property integer $DepreciationMethodQtypeId the value for intDepreciationMethodQtypeId (Not Null)
	 * @property string $ShortDescription the value for strShortDescription (Unique)
	 * @property integer $Life the value for intLife 
	 * @property AssetModel $_AssetModel the value for the private _objAssetModel (Read-Only) if set due to an expansion on the asset_model.depreciation_class_id reverse relationship
	 * @property AssetModel[] $_AssetModelArray the value for the private _objAssetModelArray (Read-Only) if set due to an ExpandAsArray on the asset_model.depreciation_class_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DepreciationClassGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column depreciation_class.depreciation_class_id
		 * @var integer intDepreciationClassId
		 */
		protected $intDepreciationClassId;
		const DepreciationClassIdDefault = null;


		/**
		 * Protected member variable that maps to the database column depreciation_class.depreciation_method_qtype_id
		 * @var integer intDepreciationMethodQtypeId
		 */
		protected $intDepreciationMethodQtypeId;
		const DepreciationMethodQtypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column depreciation_class.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column depreciation_class.life
		 * @var integer intLife
		 */
		protected $intLife;
		const LifeDefault = null;


		/**
		 * Private member variable that stores a reference to a single AssetModel object
		 * (of type AssetModel), if this DepreciationClass object was restored with
		 * an expansion on the asset_model association table.
		 * @var AssetModel _objAssetModel;
		 */
		private $_objAssetModel;

		/**
		 * Private member variable that stores a reference to an array of AssetModel objects
		 * (of type AssetModel[]), if this DepreciationClass object was restored with
		 * an ExpandAsArray on the asset_model association table.
		 * @var AssetModel[] _objAssetModelArray;
		 */
		private $_objAssetModelArray = array();

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
		 * Load a DepreciationClass from PK Info
		 * @param integer $intDepreciationClassId
		 * @return DepreciationClass
		 */
		public static function Load($intDepreciationClassId) {
			// Use QuerySingle to Perform the Query
			return DepreciationClass::QuerySingle(
				QQ::Equal(QQN::DepreciationClass()->DepreciationClassId, $intDepreciationClassId)
			);
		}

		/**
		 * Load all DepreciationClasses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DepreciationClass[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call DepreciationClass::QueryArray to perform the LoadAll query
			try {
				return DepreciationClass::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DepreciationClasses
		 * @return int
		 */
		public static function CountAll() {
			// Call DepreciationClass::QueryCount to perform the CountAll query
			return DepreciationClass::QueryCount(QQ::All());
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
			$objDatabase = DepreciationClass::GetDatabase();

			// Create/Build out the QueryBuilder object with DepreciationClass-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'depreciation_class');
			DepreciationClass::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('depreciation_class');

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
		 * Static Qcodo Query method to query for a single DepreciationClass object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DepreciationClass the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DepreciationClass::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new DepreciationClass object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DepreciationClass::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return DepreciationClass::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of DepreciationClass objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DepreciationClass[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DepreciationClass::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DepreciationClass::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DepreciationClass::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of DepreciationClass objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DepreciationClass::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DepreciationClass::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'depreciation_class_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with DepreciationClass-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				DepreciationClass::GetSelectFields($objQueryBuilder);
				DepreciationClass::GetFromFields($objQueryBuilder);

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
			return DepreciationClass::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DepreciationClass
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'depreciation_class';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'depreciation_class_id', $strAliasPrefix . 'depreciation_class_id');
			$objBuilder->AddSelectItem($strTableName, 'depreciation_method_qtype_id', $strAliasPrefix . 'depreciation_method_qtype_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'life', $strAliasPrefix . 'life');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a DepreciationClass from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DepreciationClass::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return DepreciationClass
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'depreciation_class_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intDepreciationClassId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'depreciation_class__';


				$strAlias = $strAliasPrefix . 'assetmodel__asset_model_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetModelArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetModelArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodel__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetModelArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetModelArray[] = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodel__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'depreciation_class__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the DepreciationClass object
			$objToReturn = new DepreciationClass();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'depreciation_class_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'depreciation_class_id'] : $strAliasPrefix . 'depreciation_class_id';
			$objToReturn->intDepreciationClassId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'depreciation_method_qtype_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'depreciation_method_qtype_id'] : $strAliasPrefix . 'depreciation_method_qtype_id';
			$objToReturn->intDepreciationMethodQtypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'life', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'life'] : $strAliasPrefix . 'life';
			$objToReturn->intLife = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'depreciation_class__';




			// Check for AssetModel Virtual Binding
			$strAlias = $strAliasPrefix . 'assetmodel__asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetModelArray[] = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodel__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetModel = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodel__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of DepreciationClasses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return DepreciationClass[]
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
					$objItem = DepreciationClass::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DepreciationClass::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single DepreciationClass object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DepreciationClass next row resulting from the query
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
			return DepreciationClass::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single DepreciationClass object,
		 * by DepreciationClassId Index(es)
		 * @param integer $intDepreciationClassId
		 * @return DepreciationClass
		*/
		public static function LoadByDepreciationClassId($intDepreciationClassId, $objOptionalClauses = null) {
			return DepreciationClass::QuerySingle(
				QQ::Equal(QQN::DepreciationClass()->DepreciationClassId, $intDepreciationClassId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single DepreciationClass object,
		 * by ShortDescription Index(es)
		 * @param string $strShortDescription
		 * @return DepreciationClass
		*/
		public static function LoadByShortDescription($strShortDescription, $objOptionalClauses = null) {
			return DepreciationClass::QuerySingle(
				QQ::Equal(QQN::DepreciationClass()->ShortDescription, $strShortDescription)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of DepreciationClass objects,
		 * by DepreciationMethodQtypeId Index(es)
		 * @param integer $intDepreciationMethodQtypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DepreciationClass[]
		*/
		public static function LoadArrayByDepreciationMethodQtypeId($intDepreciationMethodQtypeId, $objOptionalClauses = null) {
			// Call DepreciationClass::QueryArray to perform the LoadArrayByDepreciationMethodQtypeId query
			try {
				return DepreciationClass::QueryArray(
					QQ::Equal(QQN::DepreciationClass()->DepreciationMethodQtypeId, $intDepreciationMethodQtypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DepreciationClasses
		 * by DepreciationMethodQtypeId Index(es)
		 * @param integer $intDepreciationMethodQtypeId
		 * @return int
		*/
		public static function CountByDepreciationMethodQtypeId($intDepreciationMethodQtypeId, $objOptionalClauses = null) {
			// Call DepreciationClass::QueryCount to perform the CountByDepreciationMethodQtypeId query
			return DepreciationClass::QueryCount(
				QQ::Equal(QQN::DepreciationClass()->DepreciationMethodQtypeId, $intDepreciationMethodQtypeId)
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
		 * Save this DepreciationClass
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `depreciation_class` (
							`depreciation_method_qtype_id`,
							`short_description`,
							`life`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intDepreciationMethodQtypeId) . ',
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->intLife) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intDepreciationClassId = $objDatabase->InsertId('depreciation_class', 'depreciation_class_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`depreciation_class`
						SET
							`depreciation_method_qtype_id` = ' . $objDatabase->SqlVariable($this->intDepreciationMethodQtypeId) . ',
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`life` = ' . $objDatabase->SqlVariable($this->intLife) . '
						WHERE
							`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
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
		 * Delete this DepreciationClass
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intDepreciationClassId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DepreciationClass with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`depreciation_class`
				WHERE
					`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all DepreciationClasses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`depreciation_class`');
		}

		/**
		 * Truncate depreciation_class table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `depreciation_class`');
		}

		/**
		 * Reload this DepreciationClass from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DepreciationClass object.');

			// Reload the Object
			$objReloaded = DepreciationClass::Load($this->intDepreciationClassId);

			// Update $this's local variables to match
			$this->DepreciationMethodQtypeId = $objReloaded->DepreciationMethodQtypeId;
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->intLife = $objReloaded->intLife;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = DepreciationClass::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `depreciation_class` (
					`depreciation_class_id`,
					`depreciation_method_qtype_id`,
					`short_description`,
					`life`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intDepreciationClassId) . ',
					' . $objDatabase->SqlVariable($this->intDepreciationMethodQtypeId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->intLife) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intDepreciationClassId
		 * @return DepreciationClass[]
		 */
		public static function GetJournalForId($intDepreciationClassId) {
			$objDatabase = DepreciationClass::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM depreciation_class WHERE depreciation_class_id = ' .
				$objDatabase->SqlVariable($intDepreciationClassId) . ' ORDER BY __sys_date');

			return DepreciationClass::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return DepreciationClass[]
		 */
		public function GetJournal() {
			return DepreciationClass::GetJournalForId($this->intDepreciationClassId);
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
				case 'DepreciationClassId':
					// Gets the value for intDepreciationClassId (Read-Only PK)
					// @return integer
					return $this->intDepreciationClassId;

				case 'DepreciationMethodQtypeId':
					// Gets the value for intDepreciationMethodQtypeId (Not Null)
					// @return integer
					return $this->intDepreciationMethodQtypeId;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Unique)
					// @return string
					return $this->strShortDescription;

				case 'Life':
					// Gets the value for intLife 
					// @return integer
					return $this->intLife;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AssetModel':
					// Gets the value for the private _objAssetModel (Read-Only)
					// if set due to an expansion on the asset_model.depreciation_class_id reverse relationship
					// @return AssetModel
					return $this->_objAssetModel;

				case '_AssetModelArray':
					// Gets the value for the private _objAssetModelArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_model.depreciation_class_id reverse relationship
					// @return AssetModel[]
					return (array) $this->_objAssetModelArray;


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
				case 'DepreciationMethodQtypeId':
					// Sets the value for intDepreciationMethodQtypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intDepreciationMethodQtypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Life':
					// Sets the value for intLife 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intLife = QType::Cast($mixValue, QType::Integer));
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

			
		
		// Related Objects' Methods for AssetModel
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetModels as an array of AssetModel objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/ 
		public function GetAssetModelArray($objOptionalClauses = null) {
			if ((is_null($this->intDepreciationClassId)))
				return array();

			try {
				return AssetModel::LoadArrayByDepreciationClassId($this->intDepreciationClassId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetModels
		 * @return int
		*/ 
		public function CountAssetModels() {
			if ((is_null($this->intDepreciationClassId)))
				return 0;

			return AssetModel::CountByDepreciationClassId($this->intDepreciationClassId);
		}

		/**
		 * Associates a AssetModel
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function AssociateAssetModel(AssetModel $objAssetModel) {
			if ((is_null($this->intDepreciationClassId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetModel on this unsaved DepreciationClass.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetModel on this DepreciationClass with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->DepreciationClassId = $this->intDepreciationClassId;
				$objAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetModel
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function UnassociateAssetModel(AssetModel $objAssetModel) {
			if ((is_null($this->intDepreciationClassId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModel on this unsaved DepreciationClass.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModel on this DepreciationClass with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`depreciation_class_id` = null
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . ' AND
					`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->DepreciationClassId = null;
				$objAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetModels
		 * @return void
		*/ 
		public function UnassociateAllAssetModels() {
			if ((is_null($this->intDepreciationClassId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModel on this unsaved DepreciationClass.');

			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetModel::LoadArrayByDepreciationClassId($this->intDepreciationClassId) as $objAssetModel) {
					$objAssetModel->DepreciationClassId = null;
					$objAssetModel->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`depreciation_class_id` = null
				WHERE
					`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
			');
		}

		/**
		 * Deletes an associated AssetModel
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function DeleteAssociatedAssetModel(AssetModel $objAssetModel) {
			if ((is_null($this->intDepreciationClassId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModel on this unsaved DepreciationClass.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModel on this DepreciationClass with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . ' AND
					`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetModels
		 * @return void
		*/ 
		public function DeleteAllAssetModels() {
			if ((is_null($this->intDepreciationClassId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModel on this unsaved DepreciationClass.');

			// Get the Database Object for this Class
			$objDatabase = DepreciationClass::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetModel::LoadArrayByDepreciationClassId($this->intDepreciationClassId) as $objAssetModel) {
					$objAssetModel->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="DepreciationClass"><sequence>';
			$strToReturn .= '<element name="DepreciationClassId" type="xsd:int"/>';
			$strToReturn .= '<element name="DepreciationMethodQtypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="Life" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DepreciationClass', $strComplexTypeArray)) {
				$strComplexTypeArray['DepreciationClass'] = DepreciationClass::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DepreciationClass::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DepreciationClass();
			if (property_exists($objSoapObject, 'DepreciationClassId'))
				$objToReturn->intDepreciationClassId = $objSoapObject->DepreciationClassId;
			if (property_exists($objSoapObject, 'DepreciationMethodQtypeId'))
				$objToReturn->intDepreciationMethodQtypeId = $objSoapObject->DepreciationMethodQtypeId;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'Life'))
				$objToReturn->intLife = $objSoapObject->Life;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DepreciationClass::GetSoapObjectFromObject($objObject, true));

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
				$objQueryExpansion = new QQueryExpansion('DepreciationClass', 'depreciation_class', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `depreciation_class` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`depreciation_class_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`depreciation_class_id` AS `%s__%s__depreciation_class_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`depreciation_method_qtype_id` AS `%s__%s__depreciation_method_qtype_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`life` AS `%s__%s__life`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

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
	 * @property-read QQNode $DepreciationClassId
	 * @property-read QQNode $DepreciationMethodQtypeId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Life
	 * @property-read QQReverseReferenceNodeAssetModel $AssetModel
	 */
	class QQNodeDepreciationClass extends QQNode {
		protected $strTableName = 'depreciation_class';
		protected $strPrimaryKey = 'depreciation_class_id';
		protected $strClassName = 'DepreciationClass';
		public function __get($strName) {
			switch ($strName) {
				case 'DepreciationClassId':
					return new QQNode('depreciation_class_id', 'DepreciationClassId', 'integer', $this);
				case 'DepreciationMethodQtypeId':
					return new QQNode('depreciation_method_qtype_id', 'DepreciationMethodQtypeId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Life':
					return new QQNode('life', 'Life', 'integer', $this);
				case 'AssetModel':
					return new QQReverseReferenceNodeAssetModel($this, 'assetmodel', 'reverse_reference', 'depreciation_class_id');

				case '_PrimaryKeyNode':
					return new QQNode('depreciation_class_id', 'DepreciationClassId', 'integer', $this);
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
	 * @property-read QQNode $DepreciationClassId
	 * @property-read QQNode $DepreciationMethodQtypeId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Life
	 * @property-read QQReverseReferenceNodeAssetModel $AssetModel
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeDepreciationClass extends QQReverseReferenceNode {
		protected $strTableName = 'depreciation_class';
		protected $strPrimaryKey = 'depreciation_class_id';
		protected $strClassName = 'DepreciationClass';
		public function __get($strName) {
			switch ($strName) {
				case 'DepreciationClassId':
					return new QQNode('depreciation_class_id', 'DepreciationClassId', 'integer', $this);
				case 'DepreciationMethodQtypeId':
					return new QQNode('depreciation_method_qtype_id', 'DepreciationMethodQtypeId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Life':
					return new QQNode('life', 'Life', 'integer', $this);
				case 'AssetModel':
					return new QQReverseReferenceNodeAssetModel($this, 'assetmodel', 'reverse_reference', 'depreciation_class_id');

				case '_PrimaryKeyNode':
					return new QQNode('depreciation_class_id', 'DepreciationClassId', 'integer', $this);
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