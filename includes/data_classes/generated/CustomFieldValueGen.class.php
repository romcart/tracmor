<?php
	/**
	 * The abstract CustomFieldValueGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CustomFieldValue subclass which
	 * extends this CustomFieldValueGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CustomFieldValue class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $CustomFieldValueId the value for intCustomFieldValueId (Read-Only PK)
	 * @property integer $CustomFieldId the value for intCustomFieldId (Not Null)
	 * @property string $ShortDescription the value for strShortDescription 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property CustomField $CustomField the value for the CustomField object referenced by intCustomFieldId (Not Null)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property CustomField $_CustomFieldAsDefault the value for the private _objCustomFieldAsDefault (Read-Only) if set due to an expansion on the custom_field.default_custom_field_value_id reverse relationship
	 * @property CustomField[] $_CustomFieldAsDefaultArray the value for the private _objCustomFieldAsDefaultArray (Read-Only) if set due to an ExpandAsArray on the custom_field.default_custom_field_value_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CustomFieldValueGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column custom_field_value.custom_field_value_id
		 * @var integer intCustomFieldValueId
		 */
		protected $intCustomFieldValueId;
		const CustomFieldValueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_value.custom_field_id
		 * @var integer intCustomFieldId
		 */
		protected $intCustomFieldId;
		const CustomFieldIdDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_value.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_value.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_value.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_value.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column custom_field_value.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single CustomFieldAsDefault object
		 * (of type CustomField), if this CustomFieldValue object was restored with
		 * an expansion on the custom_field association table.
		 * @var CustomField _objCustomFieldAsDefault;
		 */
		private $_objCustomFieldAsDefault;

		/**
		 * Private member variable that stores a reference to an array of CustomFieldAsDefault objects
		 * (of type CustomField[]), if this CustomFieldValue object was restored with
		 * an ExpandAsArray on the custom_field association table.
		 * @var CustomField[] _objCustomFieldAsDefaultArray;
		 */
		private $_objCustomFieldAsDefaultArray = array();

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
		 * in the database column custom_field_value.custom_field_id.
		 *
		 * NOTE: Always use the CustomField property getter to correctly retrieve this CustomField object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CustomField objCustomField
		 */
		protected $objCustomField;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column custom_field_value.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column custom_field_value.modified_by.
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
		 * Load a CustomFieldValue from PK Info
		 * @param integer $intCustomFieldValueId
		 * @return CustomFieldValue
		 */
		public static function Load($intCustomFieldValueId) {
			// Use QuerySingle to Perform the Query
			return CustomFieldValue::QuerySingle(
				QQ::Equal(QQN::CustomFieldValue()->CustomFieldValueId, $intCustomFieldValueId)
			);
		}

		/**
		 * Load all CustomFieldValues
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomFieldValue[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call CustomFieldValue::QueryArray to perform the LoadAll query
			try {
				return CustomFieldValue::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CustomFieldValues
		 * @return int
		 */
		public static function CountAll() {
			// Call CustomFieldValue::QueryCount to perform the CountAll query
			return CustomFieldValue::QueryCount(QQ::All());
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
			$objDatabase = CustomFieldValue::GetDatabase();

			// Create/Build out the QueryBuilder object with CustomFieldValue-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'custom_field_value');
			CustomFieldValue::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('custom_field_value');

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
		 * Static Qcodo Query method to query for a single CustomFieldValue object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CustomFieldValue the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CustomFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new CustomFieldValue object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CustomFieldValue::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return CustomFieldValue::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of CustomFieldValue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CustomFieldValue[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CustomFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CustomFieldValue::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CustomFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of CustomFieldValue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CustomFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CustomFieldValue::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'custom_field_value_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with CustomFieldValue-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				CustomFieldValue::GetSelectFields($objQueryBuilder);
				CustomFieldValue::GetFromFields($objQueryBuilder);

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
			return CustomFieldValue::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CustomFieldValue
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'custom_field_value';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'custom_field_value_id', $strAliasPrefix . 'custom_field_value_id');
			$objBuilder->AddSelectItem($strTableName, 'custom_field_id', $strAliasPrefix . 'custom_field_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CustomFieldValue from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CustomFieldValue::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CustomFieldValue
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'custom_field_value_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intCustomFieldValueId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'custom_field_value__';


				$strAlias = $strAliasPrefix . 'customfieldasdefault__custom_field_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCustomFieldAsDefaultArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCustomFieldAsDefaultArray[$intPreviousChildItemCount - 1];
						$objChildItem = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasdefault__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCustomFieldAsDefaultArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCustomFieldAsDefaultArray[] = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasdefault__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'custom_field_value__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the CustomFieldValue object
			$objToReturn = new CustomFieldValue();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'custom_field_value_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'custom_field_value_id'] : $strAliasPrefix . 'custom_field_value_id';
			$objToReturn->intCustomFieldValueId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'custom_field_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'custom_field_id'] : $strAliasPrefix . 'custom_field_id';
			$objToReturn->intCustomFieldId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
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
				$strAliasPrefix = 'custom_field_value__';

			// Check for CustomField Early Binding
			$strAlias = $strAliasPrefix . 'custom_field_id__custom_field_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCustomField = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'custom_field_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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




			// Check for CustomFieldAsDefault Virtual Binding
			$strAlias = $strAliasPrefix . 'customfieldasdefault__custom_field_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCustomFieldAsDefaultArray[] = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasdefault__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCustomFieldAsDefault = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasdefault__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of CustomFieldValues from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CustomFieldValue[]
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
					$objItem = CustomFieldValue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CustomFieldValue::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single CustomFieldValue object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CustomFieldValue next row resulting from the query
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
			return CustomFieldValue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CustomFieldValue object,
		 * by CustomFieldValueId Index(es)
		 * @param integer $intCustomFieldValueId
		 * @return CustomFieldValue
		*/
		public static function LoadByCustomFieldValueId($intCustomFieldValueId, $objOptionalClauses = null) {
			return CustomFieldValue::QuerySingle(
				QQ::Equal(QQN::CustomFieldValue()->CustomFieldValueId, $intCustomFieldValueId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of CustomFieldValue objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomFieldValue[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call CustomFieldValue::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return CustomFieldValue::QueryArray(
					QQ::Equal(QQN::CustomFieldValue()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CustomFieldValues
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call CustomFieldValue::QueryCount to perform the CountByCreatedBy query
			return CustomFieldValue::QueryCount(
				QQ::Equal(QQN::CustomFieldValue()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of CustomFieldValue objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomFieldValue[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call CustomFieldValue::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return CustomFieldValue::QueryArray(
					QQ::Equal(QQN::CustomFieldValue()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CustomFieldValues
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call CustomFieldValue::QueryCount to perform the CountByModifiedBy query
			return CustomFieldValue::QueryCount(
				QQ::Equal(QQN::CustomFieldValue()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of CustomFieldValue objects,
		 * by CustomFieldId Index(es)
		 * @param integer $intCustomFieldId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomFieldValue[]
		*/
		public static function LoadArrayByCustomFieldId($intCustomFieldId, $objOptionalClauses = null) {
			// Call CustomFieldValue::QueryArray to perform the LoadArrayByCustomFieldId query
			try {
				return CustomFieldValue::QueryArray(
					QQ::Equal(QQN::CustomFieldValue()->CustomFieldId, $intCustomFieldId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CustomFieldValues
		 * by CustomFieldId Index(es)
		 * @param integer $intCustomFieldId
		 * @return int
		*/
		public static function CountByCustomFieldId($intCustomFieldId, $objOptionalClauses = null) {
			// Call CustomFieldValue::QueryCount to perform the CountByCustomFieldId query
			return CustomFieldValue::QueryCount(
				QQ::Equal(QQN::CustomFieldValue()->CustomFieldId, $intCustomFieldId)
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
		 * Save this CustomFieldValue
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `custom_field_value` (
							`custom_field_id`,
							`short_description`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCustomFieldId) . ',
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCustomFieldValueId = $objDatabase->InsertId('custom_field_value', 'custom_field_value_id');

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
								`custom_field_value`
							WHERE
								`custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('CustomFieldValue');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`custom_field_value`
						SET
							`custom_field_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldId) . ',
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
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
					`custom_field_value`
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this CustomFieldValue
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CustomFieldValue with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field_value`
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all CustomFieldValues
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field_value`');
		}

		/**
		 * Truncate custom_field_value table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `custom_field_value`');
		}

		/**
		 * Reload this CustomFieldValue from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CustomFieldValue object.');

			// Reload the Object
			$objReloaded = CustomFieldValue::Load($this->intCustomFieldValueId);

			// Update $this's local variables to match
			$this->CustomFieldId = $objReloaded->CustomFieldId;
			$this->strShortDescription = $objReloaded->strShortDescription;
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
			$objDatabase = CustomFieldValue::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `custom_field_value` (
					`custom_field_value_id`,
					`custom_field_id`,
					`short_description`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . ',
					' . $objDatabase->SqlVariable($this->intCustomFieldId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
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
		 * @param integer intCustomFieldValueId
		 * @return CustomFieldValue[]
		 */
		public static function GetJournalForId($intCustomFieldValueId) {
			$objDatabase = CustomFieldValue::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM custom_field_value WHERE custom_field_value_id = ' .
				$objDatabase->SqlVariable($intCustomFieldValueId) . ' ORDER BY __sys_date');

			return CustomFieldValue::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return CustomFieldValue[]
		 */
		public function GetJournal() {
			return CustomFieldValue::GetJournalForId($this->intCustomFieldValueId);
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
				case 'CustomFieldValueId':
					// Gets the value for intCustomFieldValueId (Read-Only PK)
					// @return integer
					return $this->intCustomFieldValueId;

				case 'CustomFieldId':
					// Gets the value for intCustomFieldId (Not Null)
					// @return integer
					return $this->intCustomFieldId;

				case 'ShortDescription':
					// Gets the value for strShortDescription 
					// @return string
					return $this->strShortDescription;

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

				case '_CustomFieldAsDefault':
					// Gets the value for the private _objCustomFieldAsDefault (Read-Only)
					// if set due to an expansion on the custom_field.default_custom_field_value_id reverse relationship
					// @return CustomField
					return $this->_objCustomFieldAsDefault;

				case '_CustomFieldAsDefaultArray':
					// Gets the value for the private _objCustomFieldAsDefaultArray (Read-Only)
					// if set due to an ExpandAsArray on the custom_field.default_custom_field_value_id reverse relationship
					// @return CustomField[]
					return (array) $this->_objCustomFieldAsDefaultArray;


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
							throw new QCallerException('Unable to set an unsaved CustomField for this CustomFieldValue');

						// Update Local Member Variables
						$this->objCustomField = $mixValue;
						$this->intCustomFieldId = $mixValue->CustomFieldId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this CustomFieldValue');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this CustomFieldValue');

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

			
		
		// Related Objects' Methods for CustomFieldAsDefault
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CustomFieldsAsDefault as an array of CustomField objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomField[]
		*/ 
		public function GetCustomFieldAsDefaultArray($objOptionalClauses = null) {
			if ((is_null($this->intCustomFieldValueId)))
				return array();

			try {
				return CustomField::LoadArrayByDefaultCustomFieldValueId($this->intCustomFieldValueId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CustomFieldsAsDefault
		 * @return int
		*/ 
		public function CountCustomFieldsAsDefault() {
			if ((is_null($this->intCustomFieldValueId)))
				return 0;

			return CustomField::CountByDefaultCustomFieldValueId($this->intCustomFieldValueId);
		}

		/**
		 * Associates a CustomFieldAsDefault
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function AssociateCustomFieldAsDefault(CustomField $objCustomField) {
			if ((is_null($this->intCustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldAsDefault on this unsaved CustomFieldValue.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldAsDefault on this CustomFieldValue with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`default_custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->DefaultCustomFieldValueId = $this->intCustomFieldValueId;
				$objCustomField->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CustomFieldAsDefault
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function UnassociateCustomFieldAsDefault(CustomField $objCustomField) {
			if ((is_null($this->intCustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsDefault on this unsaved CustomFieldValue.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsDefault on this CustomFieldValue with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`default_custom_field_value_id` = null
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . ' AND
					`default_custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->DefaultCustomFieldValueId = null;
				$objCustomField->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CustomFieldsAsDefault
		 * @return void
		*/ 
		public function UnassociateAllCustomFieldsAsDefault() {
			if ((is_null($this->intCustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsDefault on this unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomField::LoadArrayByDefaultCustomFieldValueId($this->intCustomFieldValueId) as $objCustomField) {
					$objCustomField->DefaultCustomFieldValueId = null;
					$objCustomField->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`default_custom_field_value_id` = null
				WHERE
					`default_custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
			');
		}

		/**
		 * Deletes an associated CustomFieldAsDefault
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function DeleteAssociatedCustomFieldAsDefault(CustomField $objCustomField) {
			if ((is_null($this->intCustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsDefault on this unsaved CustomFieldValue.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsDefault on this CustomFieldValue with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field`
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . ' AND
					`default_custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CustomFieldsAsDefault
		 * @return void
		*/ 
		public function DeleteAllCustomFieldsAsDefault() {
			if ((is_null($this->intCustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsDefault on this unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = CustomFieldValue::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomField::LoadArrayByDefaultCustomFieldValueId($this->intCustomFieldValueId) as $objCustomField) {
					$objCustomField->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field`
				WHERE
					`default_custom_field_value_id` = ' . $objDatabase->SqlVariable($this->intCustomFieldValueId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CustomFieldValue"><sequence>';
			$strToReturn .= '<element name="CustomFieldValueId" type="xsd:int"/>';
			$strToReturn .= '<element name="CustomField" type="xsd1:CustomField"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CustomFieldValue', $strComplexTypeArray)) {
				$strComplexTypeArray['CustomFieldValue'] = CustomFieldValue::GetSoapComplexTypeXml();
				CustomField::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CustomFieldValue::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CustomFieldValue();
			if (property_exists($objSoapObject, 'CustomFieldValueId'))
				$objToReturn->intCustomFieldValueId = $objSoapObject->CustomFieldValueId;
			if ((property_exists($objSoapObject, 'CustomField')) &&
				($objSoapObject->CustomField))
				$objToReturn->CustomField = CustomField::GetObjectFromSoapObject($objSoapObject->CustomField);
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
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
				array_push($objArrayToReturn, CustomFieldValue::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCustomField)
				$objObject->objCustomField = CustomField::GetSoapObjectFromObject($objObject->objCustomField, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCustomFieldId = null;
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
				$objQueryExpansion = new QQueryExpansion('CustomFieldValue', 'custom_field_value', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `custom_field_value` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`custom_field_value_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`custom_field_value_id` AS `%s__%s__custom_field_value_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`custom_field_id` AS `%s__%s__custom_field_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'custom_field_id':
							try {
								CustomField::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandCustomField = 'custom_field_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $CustomFieldValueId
	 * @property-read QQNode $CustomFieldId
	 * @property-read QQNodeCustomField $CustomField
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeCustomField $CustomFieldAsDefault
	 */
	class QQNodeCustomFieldValue extends QQNode {
		protected $strTableName = 'custom_field_value';
		protected $strPrimaryKey = 'custom_field_value_id';
		protected $strClassName = 'CustomFieldValue';
		public function __get($strName) {
			switch ($strName) {
				case 'CustomFieldValueId':
					return new QQNode('custom_field_value_id', 'CustomFieldValueId', 'integer', $this);
				case 'CustomFieldId':
					return new QQNode('custom_field_id', 'CustomFieldId', 'integer', $this);
				case 'CustomField':
					return new QQNodeCustomField('custom_field_id', 'CustomField', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
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
				case 'CustomFieldAsDefault':
					return new QQReverseReferenceNodeCustomField($this, 'customfieldasdefault', 'reverse_reference', 'default_custom_field_value_id');

				case '_PrimaryKeyNode':
					return new QQNode('custom_field_value_id', 'CustomFieldValueId', 'integer', $this);
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
	 * @property-read QQNode $CustomFieldValueId
	 * @property-read QQNode $CustomFieldId
	 * @property-read QQNodeCustomField $CustomField
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeCustomField $CustomFieldAsDefault
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeCustomFieldValue extends QQReverseReferenceNode {
		protected $strTableName = 'custom_field_value';
		protected $strPrimaryKey = 'custom_field_value_id';
		protected $strClassName = 'CustomFieldValue';
		public function __get($strName) {
			switch ($strName) {
				case 'CustomFieldValueId':
					return new QQNode('custom_field_value_id', 'CustomFieldValueId', 'integer', $this);
				case 'CustomFieldId':
					return new QQNode('custom_field_id', 'CustomFieldId', 'integer', $this);
				case 'CustomField':
					return new QQNodeCustomField('custom_field_id', 'CustomField', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
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
				case 'CustomFieldAsDefault':
					return new QQReverseReferenceNodeCustomField($this, 'customfieldasdefault', 'reverse_reference', 'default_custom_field_value_id');

				case '_PrimaryKeyNode':
					return new QQNode('custom_field_value_id', 'CustomFieldValueId', 'integer', $this);
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