<?php
	/**
	 * The abstract AssetCustomFieldAssetModelGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AssetCustomFieldAssetModel subclass which
	 * extends this AssetCustomFieldAssetModelGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AssetCustomFieldAssetModel class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetCustomFieldAssetModelId the value for intAssetCustomFieldAssetModelId (Read-Only PK)
	 * @property integer $AssetModelId the value for intAssetModelId (Not Null)
	 * @property integer $CustomFieldId the value for intCustomFieldId (Not Null)
	 * @property AssetModel $AssetModel the value for the AssetModel object referenced by intAssetModelId (Not Null)
	 * @property CustomField $CustomField the value for the CustomField object referenced by intCustomFieldId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AssetCustomFieldAssetModelGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column asset_custom_field_asset_model.asset_custom_field_asset_model_id
		 * @var integer intAssetCustomFieldAssetModelId
		 */
		protected $intAssetCustomFieldAssetModelId;
		const AssetCustomFieldAssetModelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_custom_field_asset_model.asset_model_id
		 * @var integer intAssetModelId
		 */
		protected $intAssetModelId;
		const AssetModelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_custom_field_asset_model.custom_field_id
		 * @var integer intCustomFieldId
		 */
		protected $intCustomFieldId;
		const CustomFieldIdDefault = null;


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
		 * in the database column asset_custom_field_asset_model.asset_model_id.
		 *
		 * NOTE: Always use the AssetModel property getter to correctly retrieve this AssetModel object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetModel objAssetModel
		 */
		protected $objAssetModel;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_custom_field_asset_model.custom_field_id.
		 *
		 * NOTE: Always use the CustomField property getter to correctly retrieve this CustomField object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CustomField objCustomField
		 */
		protected $objCustomField;





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
		 * Load a AssetCustomFieldAssetModel from PK Info
		 * @param integer $intAssetCustomFieldAssetModelId
		 * @return AssetCustomFieldAssetModel
		 */
		public static function Load($intAssetCustomFieldAssetModelId) {
			// Use QuerySingle to Perform the Query
			return AssetCustomFieldAssetModel::QuerySingle(
				QQ::Equal(QQN::AssetCustomFieldAssetModel()->AssetCustomFieldAssetModelId, $intAssetCustomFieldAssetModelId)
			);
		}

		/**
		 * Load all AssetCustomFieldAssetModels
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetCustomFieldAssetModel[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AssetCustomFieldAssetModel::QueryArray to perform the LoadAll query
			try {
				return AssetCustomFieldAssetModel::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AssetCustomFieldAssetModels
		 * @return int
		 */
		public static function CountAll() {
			// Call AssetCustomFieldAssetModel::QueryCount to perform the CountAll query
			return AssetCustomFieldAssetModel::QueryCount(QQ::All());
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
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

			// Create/Build out the QueryBuilder object with AssetCustomFieldAssetModel-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asset_custom_field_asset_model');
			AssetCustomFieldAssetModel::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('asset_custom_field_asset_model');

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
		 * Static Qcodo Query method to query for a single AssetCustomFieldAssetModel object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetCustomFieldAssetModel the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetCustomFieldAssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new AssetCustomFieldAssetModel object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of AssetCustomFieldAssetModel objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetCustomFieldAssetModel[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetCustomFieldAssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AssetCustomFieldAssetModel::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AssetCustomFieldAssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of AssetCustomFieldAssetModel objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetCustomFieldAssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'asset_custom_field_asset_model_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AssetCustomFieldAssetModel-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AssetCustomFieldAssetModel::GetSelectFields($objQueryBuilder);
				AssetCustomFieldAssetModel::GetFromFields($objQueryBuilder);

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
			return AssetCustomFieldAssetModel::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AssetCustomFieldAssetModel
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asset_custom_field_asset_model';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_custom_field_asset_model_id', $strAliasPrefix . 'asset_custom_field_asset_model_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_model_id', $strAliasPrefix . 'asset_model_id');
			$objBuilder->AddSelectItem($strTableName, 'custom_field_id', $strAliasPrefix . 'custom_field_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AssetCustomFieldAssetModel from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AssetCustomFieldAssetModel::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AssetCustomFieldAssetModel
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the AssetCustomFieldAssetModel object
			$objToReturn = new AssetCustomFieldAssetModel();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_custom_field_asset_model_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_custom_field_asset_model_id'] : $strAliasPrefix . 'asset_custom_field_asset_model_id';
			$objToReturn->intAssetCustomFieldAssetModelId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_model_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_model_id'] : $strAliasPrefix . 'asset_model_id';
			$objToReturn->intAssetModelId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'custom_field_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'custom_field_id'] : $strAliasPrefix . 'custom_field_id';
			$objToReturn->intCustomFieldId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'asset_custom_field_asset_model__';

			// Check for AssetModel Early Binding
			$strAlias = $strAliasPrefix . 'asset_model_id__asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAssetModel = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset_model_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CustomField Early Binding
			$strAlias = $strAliasPrefix . 'custom_field_id__custom_field_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCustomField = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'custom_field_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of AssetCustomFieldAssetModels from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AssetCustomFieldAssetModel[]
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
					$objItem = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AssetCustomFieldAssetModel object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AssetCustomFieldAssetModel next row resulting from the query
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
			return AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AssetCustomFieldAssetModel object,
		 * by AssetCustomFieldAssetModelId Index(es)
		 * @param integer $intAssetCustomFieldAssetModelId
		 * @return AssetCustomFieldAssetModel
		*/
		public static function LoadByAssetCustomFieldAssetModelId($intAssetCustomFieldAssetModelId, $objOptionalClauses = null) {
			return AssetCustomFieldAssetModel::QuerySingle(
				QQ::Equal(QQN::AssetCustomFieldAssetModel()->AssetCustomFieldAssetModelId, $intAssetCustomFieldAssetModelId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetCustomFieldAssetModel objects,
		 * by AssetModelId Index(es)
		 * @param integer $intAssetModelId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetCustomFieldAssetModel[]
		*/
		public static function LoadArrayByAssetModelId($intAssetModelId, $objOptionalClauses = null) {
			// Call AssetCustomFieldAssetModel::QueryArray to perform the LoadArrayByAssetModelId query
			try {
				return AssetCustomFieldAssetModel::QueryArray(
					QQ::Equal(QQN::AssetCustomFieldAssetModel()->AssetModelId, $intAssetModelId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetCustomFieldAssetModels
		 * by AssetModelId Index(es)
		 * @param integer $intAssetModelId
		 * @return int
		*/
		public static function CountByAssetModelId($intAssetModelId, $objOptionalClauses = null) {
			// Call AssetCustomFieldAssetModel::QueryCount to perform the CountByAssetModelId query
			return AssetCustomFieldAssetModel::QueryCount(
				QQ::Equal(QQN::AssetCustomFieldAssetModel()->AssetModelId, $intAssetModelId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetCustomFieldAssetModel objects,
		 * by CustomFieldId Index(es)
		 * @param integer $intCustomFieldId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetCustomFieldAssetModel[]
		*/
		public static function LoadArrayByCustomFieldId($intCustomFieldId, $objOptionalClauses = null) {
			// Call AssetCustomFieldAssetModel::QueryArray to perform the LoadArrayByCustomFieldId query
			try {
				return AssetCustomFieldAssetModel::QueryArray(
					QQ::Equal(QQN::AssetCustomFieldAssetModel()->CustomFieldId, $intCustomFieldId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetCustomFieldAssetModels
		 * by CustomFieldId Index(es)
		 * @param integer $intCustomFieldId
		 * @return int
		*/
		public static function CountByCustomFieldId($intCustomFieldId, $objOptionalClauses = null) {
			// Call AssetCustomFieldAssetModel::QueryCount to perform the CountByCustomFieldId query
			return AssetCustomFieldAssetModel::QueryCount(
				QQ::Equal(QQN::AssetCustomFieldAssetModel()->CustomFieldId, $intCustomFieldId)
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
		 * Save this AssetCustomFieldAssetModel
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asset_custom_field_asset_model` (
							`asset_model_id`,
							`custom_field_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
							' . $objDatabase->SqlVariable($this->intCustomFieldId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAssetCustomFieldAssetModelId = $objDatabase->InsertId('asset_custom_field_asset_model', 'asset_custom_field_asset_model_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asset_custom_field_asset_model`
						SET
							`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
							`custom_field_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldId) . '
						WHERE
							`asset_custom_field_asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetCustomFieldAssetModelId) . '
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
		 * Delete this AssetCustomFieldAssetModel
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetCustomFieldAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AssetCustomFieldAssetModel with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_asset_model`
				WHERE
					`asset_custom_field_asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetCustomFieldAssetModelId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all AssetCustomFieldAssetModels
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_asset_model`');
		}

		/**
		 * Truncate asset_custom_field_asset_model table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asset_custom_field_asset_model`');
		}

		/**
		 * Reload this AssetCustomFieldAssetModel from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AssetCustomFieldAssetModel object.');

			// Reload the Object
			$objReloaded = AssetCustomFieldAssetModel::Load($this->intAssetCustomFieldAssetModelId);

			// Update $this's local variables to match
			$this->AssetModelId = $objReloaded->AssetModelId;
			$this->CustomFieldId = $objReloaded->CustomFieldId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `asset_custom_field_asset_model` (
					`asset_custom_field_asset_model_id`,
					`asset_model_id`,
					`custom_field_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAssetCustomFieldAssetModelId) . ',
					' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
					' . $objDatabase->SqlVariable($this->intCustomFieldId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAssetCustomFieldAssetModelId
		 * @return AssetCustomFieldAssetModel[]
		 */
		public static function GetJournalForId($intAssetCustomFieldAssetModelId) {
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM asset_custom_field_asset_model WHERE asset_custom_field_asset_model_id = ' .
				$objDatabase->SqlVariable($intAssetCustomFieldAssetModelId) . ' ORDER BY __sys_date');

			return AssetCustomFieldAssetModel::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return AssetCustomFieldAssetModel[]
		 */
		public function GetJournal() {
			return AssetCustomFieldAssetModel::GetJournalForId($this->intAssetCustomFieldAssetModelId);
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
				case 'AssetCustomFieldAssetModelId':
					// Gets the value for intAssetCustomFieldAssetModelId (Read-Only PK)
					// @return integer
					return $this->intAssetCustomFieldAssetModelId;

				case 'AssetModelId':
					// Gets the value for intAssetModelId (Not Null)
					// @return integer
					return $this->intAssetModelId;

				case 'CustomFieldId':
					// Gets the value for intCustomFieldId (Not Null)
					// @return integer
					return $this->intCustomFieldId;


				///////////////////
				// Member Objects
				///////////////////
				case 'AssetModel':
					// Gets the value for the AssetModel object referenced by intAssetModelId (Not Null)
					// @return AssetModel
					try {
						if ((!$this->objAssetModel) && (!is_null($this->intAssetModelId)))
							$this->objAssetModel = AssetModel::Load($this->intAssetModelId);
						return $this->objAssetModel;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CustomField':
					// Gets the value for the CustomField object referenced by intCustomFieldId (Not Null)
					// @return CustomField
					try {
						if ((!$this->objCustomField) && (!is_null($this->intCustomFieldId)))
							$this->objCustomField = CustomField::Load($this->intCustomFieldId);
						return $this->objCustomField;
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
				case 'AssetModelId':
					// Sets the value for intAssetModelId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAssetModel = null;
						return ($this->intAssetModelId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CustomFieldId':
					// Sets the value for intCustomFieldId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCustomField = null;
						return ($this->intCustomFieldId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'AssetModel':
					// Sets the value for the AssetModel object referenced by intAssetModelId (Not Null)
					// @param AssetModel $mixValue
					// @return AssetModel
					if (is_null($mixValue)) {
						$this->intAssetModelId = null;
						$this->objAssetModel = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AssetModel object
						try {
							$mixValue = QType::Cast($mixValue, 'AssetModel');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AssetModel object
						if (is_null($mixValue->AssetModelId))
							throw new QCallerException('Unable to set an unsaved AssetModel for this AssetCustomFieldAssetModel');

						// Update Local Member Variables
						$this->objAssetModel = $mixValue;
						$this->intAssetModelId = $mixValue->AssetModelId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CustomField':
					// Sets the value for the CustomField object referenced by intCustomFieldId (Not Null)
					// @param CustomField $mixValue
					// @return CustomField
					if (is_null($mixValue)) {
						$this->intCustomFieldId = null;
						$this->objCustomField = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CustomField object
						try {
							$mixValue = QType::Cast($mixValue, 'CustomField');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CustomField object
						if (is_null($mixValue->CustomFieldId))
							throw new QCallerException('Unable to set an unsaved CustomField for this AssetCustomFieldAssetModel');

						// Update Local Member Variables
						$this->objCustomField = $mixValue;
						$this->intCustomFieldId = $mixValue->CustomFieldId;

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
			$strToReturn = '<complexType name="AssetCustomFieldAssetModel"><sequence>';
			$strToReturn .= '<element name="AssetCustomFieldAssetModelId" type="xsd:int"/>';
			$strToReturn .= '<element name="AssetModel" type="xsd1:AssetModel"/>';
			$strToReturn .= '<element name="CustomField" type="xsd1:CustomField"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AssetCustomFieldAssetModel', $strComplexTypeArray)) {
				$strComplexTypeArray['AssetCustomFieldAssetModel'] = AssetCustomFieldAssetModel::GetSoapComplexTypeXml();
				AssetModel::AlterSoapComplexTypeArray($strComplexTypeArray);
				CustomField::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AssetCustomFieldAssetModel::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AssetCustomFieldAssetModel();
			if (property_exists($objSoapObject, 'AssetCustomFieldAssetModelId'))
				$objToReturn->intAssetCustomFieldAssetModelId = $objSoapObject->AssetCustomFieldAssetModelId;
			if ((property_exists($objSoapObject, 'AssetModel')) &&
				($objSoapObject->AssetModel))
				$objToReturn->AssetModel = AssetModel::GetObjectFromSoapObject($objSoapObject->AssetModel);
			if ((property_exists($objSoapObject, 'CustomField')) &&
				($objSoapObject->CustomField))
				$objToReturn->CustomField = CustomField::GetObjectFromSoapObject($objSoapObject->CustomField);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AssetCustomFieldAssetModel::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAssetModel)
				$objObject->objAssetModel = AssetModel::GetSoapObjectFromObject($objObject->objAssetModel, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssetModelId = null;
			if ($objObject->objCustomField)
				$objObject->objCustomField = CustomField::GetSoapObjectFromObject($objObject->objCustomField, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCustomFieldId = null;
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
				$objQueryExpansion = new QQueryExpansion('AssetCustomFieldAssetModel', 'asset_custom_field_asset_model', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `asset_custom_field_asset_model` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_custom_field_asset_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_custom_field_asset_model_id` AS `%s__%s__asset_custom_field_asset_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_model_id` AS `%s__%s__asset_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`custom_field_id` AS `%s__%s__custom_field_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'asset_model_id':
							try {
								AssetModel::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'custom_field_id':
							try {
								CustomField::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandAssetModel = 'asset_model_id';
		const ExpandCustomField = 'custom_field_id';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AssetCustomFieldAssetModelId
	 * @property-read QQNode $AssetModelId
	 * @property-read QQNodeAssetModel $AssetModel
	 * @property-read QQNode $CustomFieldId
	 * @property-read QQNodeCustomField $CustomField
	 */
	class QQNodeAssetCustomFieldAssetModel extends QQNode {
		protected $strTableName = 'asset_custom_field_asset_model';
		protected $strPrimaryKey = 'asset_custom_field_asset_model_id';
		protected $strClassName = 'AssetCustomFieldAssetModel';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetCustomFieldAssetModelId':
					return new QQNode('asset_custom_field_asset_model_id', 'AssetCustomFieldAssetModelId', 'integer', $this);
				case 'AssetModelId':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
				case 'AssetModel':
					return new QQNodeAssetModel('asset_model_id', 'AssetModel', 'integer', $this);
				case 'CustomFieldId':
					return new QQNode('custom_field_id', 'CustomFieldId', 'integer', $this);
				case 'CustomField':
					return new QQNodeCustomField('custom_field_id', 'CustomField', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('asset_custom_field_asset_model_id', 'AssetCustomFieldAssetModelId', 'integer', $this);
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
	 * @property-read QQNode $AssetCustomFieldAssetModelId
	 * @property-read QQNode $AssetModelId
	 * @property-read QQNodeAssetModel $AssetModel
	 * @property-read QQNode $CustomFieldId
	 * @property-read QQNodeCustomField $CustomField
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAssetCustomFieldAssetModel extends QQReverseReferenceNode {
		protected $strTableName = 'asset_custom_field_asset_model';
		protected $strPrimaryKey = 'asset_custom_field_asset_model_id';
		protected $strClassName = 'AssetCustomFieldAssetModel';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetCustomFieldAssetModelId':
					return new QQNode('asset_custom_field_asset_model_id', 'AssetCustomFieldAssetModelId', 'integer', $this);
				case 'AssetModelId':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
				case 'AssetModel':
					return new QQNodeAssetModel('asset_model_id', 'AssetModel', 'integer', $this);
				case 'CustomFieldId':
					return new QQNode('custom_field_id', 'CustomFieldId', 'integer', $this);
				case 'CustomField':
					return new QQNodeCustomField('custom_field_id', 'CustomField', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('asset_custom_field_asset_model_id', 'AssetCustomFieldAssetModelId', 'integer', $this);
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