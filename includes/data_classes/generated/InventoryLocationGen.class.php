<?php
	/**
	 * The abstract InventoryLocationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the InventoryLocation subclass which
	 * extends this InventoryLocationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the InventoryLocation class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $InventoryLocationId the value for intInventoryLocationId (Read-Only PK)
	 * @property integer $InventoryModelId the value for intInventoryModelId (Not Null)
	 * @property integer $LocationId the value for intLocationId (Not Null)
	 * @property integer $Quantity the value for intQuantity (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property InventoryModel $InventoryModel the value for the InventoryModel object referenced by intInventoryModelId (Not Null)
	 * @property Location $Location the value for the Location object referenced by intLocationId (Not Null)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property InventoryTransaction $_InventoryTransaction the value for the private _objInventoryTransaction (Read-Only) if set due to an expansion on the inventory_transaction.inventory_location_id reverse relationship
	 * @property InventoryTransaction[] $_InventoryTransactionArray the value for the private _objInventoryTransactionArray (Read-Only) if set due to an ExpandAsArray on the inventory_transaction.inventory_location_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class InventoryLocationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column inventory_location.inventory_location_id
		 * @var integer intInventoryLocationId
		 */
		protected $intInventoryLocationId;
		const InventoryLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.inventory_model_id
		 * @var integer intInventoryModelId
		 */
		protected $intInventoryModelId;
		const InventoryModelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.location_id
		 * @var integer intLocationId
		 */
		protected $intLocationId;
		const LocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.quantity
		 * @var integer intQuantity
		 */
		protected $intQuantity;
		const QuantityDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column inventory_location.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single InventoryTransaction object
		 * (of type InventoryTransaction), if this InventoryLocation object was restored with
		 * an expansion on the inventory_transaction association table.
		 * @var InventoryTransaction _objInventoryTransaction;
		 */
		private $_objInventoryTransaction;

		/**
		 * Private member variable that stores a reference to an array of InventoryTransaction objects
		 * (of type InventoryTransaction[]), if this InventoryLocation object was restored with
		 * an ExpandAsArray on the inventory_transaction association table.
		 * @var InventoryTransaction[] _objInventoryTransactionArray;
		 */
		private $_objInventoryTransactionArray = array();

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
		 * in the database column inventory_location.inventory_model_id.
		 *
		 * NOTE: Always use the InventoryModel property getter to correctly retrieve this InventoryModel object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var InventoryModel objInventoryModel
		 */
		protected $objInventoryModel;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_location.location_id.
		 *
		 * NOTE: Always use the Location property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objLocation
		 */
		protected $objLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_location.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column inventory_location.modified_by.
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
		 * Load a InventoryLocation from PK Info
		 * @param integer $intInventoryLocationId
		 * @return InventoryLocation
		 */
		public static function Load($intInventoryLocationId) {
			// Use QuerySingle to Perform the Query
			return InventoryLocation::QuerySingle(
				QQ::Equal(QQN::InventoryLocation()->InventoryLocationId, $intInventoryLocationId)
			);
		}

		/**
		 * Load all InventoryLocations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call InventoryLocation::QueryArray to perform the LoadAll query
			try {
				return InventoryLocation::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all InventoryLocations
		 * @return int
		 */
		public static function CountAll() {
			// Call InventoryLocation::QueryCount to perform the CountAll query
			return InventoryLocation::QueryCount(QQ::All());
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
			$objDatabase = InventoryLocation::GetDatabase();

			// Create/Build out the QueryBuilder object with InventoryLocation-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'inventory_location');
			InventoryLocation::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('inventory_location');

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
		 * Static Qcodo Query method to query for a single InventoryLocation object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return InventoryLocation the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = InventoryLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new InventoryLocation object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = InventoryLocation::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return InventoryLocation::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of InventoryLocation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return InventoryLocation[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = InventoryLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return InventoryLocation::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = InventoryLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of InventoryLocation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = InventoryLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = InventoryLocation::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'inventory_location_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with InventoryLocation-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				InventoryLocation::GetSelectFields($objQueryBuilder);
				InventoryLocation::GetFromFields($objQueryBuilder);

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
			return InventoryLocation::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this InventoryLocation
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'inventory_location';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'inventory_location_id', $strAliasPrefix . 'inventory_location_id');
			$objBuilder->AddSelectItem($strTableName, 'inventory_model_id', $strAliasPrefix . 'inventory_model_id');
			$objBuilder->AddSelectItem($strTableName, 'location_id', $strAliasPrefix . 'location_id');
			$objBuilder->AddSelectItem($strTableName, 'quantity', $strAliasPrefix . 'quantity');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a InventoryLocation from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this InventoryLocation::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return InventoryLocation
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'inventory_location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intInventoryLocationId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'inventory_location__';


				$strAlias = $strAliasPrefix . 'inventorytransaction__inventory_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryTransactionArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'inventory_location__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the InventoryLocation object
			$objToReturn = new InventoryLocation();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'inventory_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inventory_location_id'] : $strAliasPrefix . 'inventory_location_id';
			$objToReturn->intInventoryLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'inventory_model_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inventory_model_id'] : $strAliasPrefix . 'inventory_model_id';
			$objToReturn->intInventoryModelId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location_id'] : $strAliasPrefix . 'location_id';
			$objToReturn->intLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity'] : $strAliasPrefix . 'quantity';
			$objToReturn->intQuantity = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'inventory_location__';

			// Check for InventoryModel Early Binding
			$strAlias = $strAliasPrefix . 'inventory_model_id__inventory_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objInventoryModel = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventory_model_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Location Early Binding
			$strAlias = $strAliasPrefix . 'location_id__location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLocation = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'location_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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




			// Check for InventoryTransaction Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorytransaction__inventory_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryTransactionArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryTransaction = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of InventoryLocations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return InventoryLocation[]
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
					$objItem = InventoryLocation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = InventoryLocation::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single InventoryLocation object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return InventoryLocation next row resulting from the query
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
			return InventoryLocation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single InventoryLocation object,
		 * by InventoryLocationId Index(es)
		 * @param integer $intInventoryLocationId
		 * @return InventoryLocation
		*/
		public static function LoadByInventoryLocationId($intInventoryLocationId, $objOptionalClauses = null) {
			return InventoryLocation::QuerySingle(
				QQ::Equal(QQN::InventoryLocation()->InventoryLocationId, $intInventoryLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryLocation objects,
		 * by LocationId Index(es)
		 * @param integer $intLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		*/
		public static function LoadArrayByLocationId($intLocationId, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryArray to perform the LoadArrayByLocationId query
			try {
				return InventoryLocation::QueryArray(
					QQ::Equal(QQN::InventoryLocation()->LocationId, $intLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryLocations
		 * by LocationId Index(es)
		 * @param integer $intLocationId
		 * @return int
		*/
		public static function CountByLocationId($intLocationId, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryCount to perform the CountByLocationId query
			return InventoryLocation::QueryCount(
				QQ::Equal(QQN::InventoryLocation()->LocationId, $intLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryLocation objects,
		 * by InventoryModelId Index(es)
		 * @param integer $intInventoryModelId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		*/
		public static function LoadArrayByInventoryModelId($intInventoryModelId, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryArray to perform the LoadArrayByInventoryModelId query
			try {
				return InventoryLocation::QueryArray(
					QQ::Equal(QQN::InventoryLocation()->InventoryModelId, $intInventoryModelId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryLocations
		 * by InventoryModelId Index(es)
		 * @param integer $intInventoryModelId
		 * @return int
		*/
		public static function CountByInventoryModelId($intInventoryModelId, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryCount to perform the CountByInventoryModelId query
			return InventoryLocation::QueryCount(
				QQ::Equal(QQN::InventoryLocation()->InventoryModelId, $intInventoryModelId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryLocation objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return InventoryLocation::QueryArray(
					QQ::Equal(QQN::InventoryLocation()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryLocations
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryCount to perform the CountByModifiedBy query
			return InventoryLocation::QueryCount(
				QQ::Equal(QQN::InventoryLocation()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of InventoryLocation objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return InventoryLocation::QueryArray(
					QQ::Equal(QQN::InventoryLocation()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count InventoryLocations
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call InventoryLocation::QueryCount to perform the CountByCreatedBy query
			return InventoryLocation::QueryCount(
				QQ::Equal(QQN::InventoryLocation()->CreatedBy, $intCreatedBy)
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
		 * Save this InventoryLocation
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `inventory_location` (
							`inventory_model_id`,
							`location_id`,
							`quantity`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intInventoryModelId) . ',
							' . $objDatabase->SqlVariable($this->intLocationId) . ',
							' . $objDatabase->SqlVariable($this->intQuantity) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intInventoryLocationId = $objDatabase->InsertId('inventory_location', 'inventory_location_id');

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
								`inventory_location`
							WHERE
								`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('InventoryLocation');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`inventory_location`
						SET
							`inventory_model_id` = ' . $objDatabase->SqlVariable($this->intInventoryModelId) . ',
							`location_id` = ' . $objDatabase->SqlVariable($this->intLocationId) . ',
							`quantity` = ' . $objDatabase->SqlVariable($this->intQuantity) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
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
					`inventory_location`
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this InventoryLocation
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intInventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this InventoryLocation with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_location`
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all InventoryLocations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_location`');
		}

		/**
		 * Truncate inventory_location table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `inventory_location`');
		}

		/**
		 * Reload this InventoryLocation from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved InventoryLocation object.');

			// Reload the Object
			$objReloaded = InventoryLocation::Load($this->intInventoryLocationId);

			// Update $this's local variables to match
			$this->InventoryModelId = $objReloaded->InventoryModelId;
			$this->LocationId = $objReloaded->LocationId;
			$this->intQuantity = $objReloaded->intQuantity;
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
			$objDatabase = InventoryLocation::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `inventory_location` (
					`inventory_location_id`,
					`inventory_model_id`,
					`location_id`,
					`quantity`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intInventoryLocationId) . ',
					' . $objDatabase->SqlVariable($this->intInventoryModelId) . ',
					' . $objDatabase->SqlVariable($this->intLocationId) . ',
					' . $objDatabase->SqlVariable($this->intQuantity) . ',
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
		 * @param integer intInventoryLocationId
		 * @return InventoryLocation[]
		 */
		public static function GetJournalForId($intInventoryLocationId) {
			$objDatabase = InventoryLocation::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM inventory_location WHERE inventory_location_id = ' .
				$objDatabase->SqlVariable($intInventoryLocationId) . ' ORDER BY __sys_date');

			return InventoryLocation::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return InventoryLocation[]
		 */
		public function GetJournal() {
			return InventoryLocation::GetJournalForId($this->intInventoryLocationId);
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
				case 'InventoryLocationId':
					// Gets the value for intInventoryLocationId (Read-Only PK)
					// @return integer
					return $this->intInventoryLocationId;

				case 'InventoryModelId':
					// Gets the value for intInventoryModelId (Not Null)
					// @return integer
					return $this->intInventoryModelId;

				case 'LocationId':
					// Gets the value for intLocationId (Not Null)
					// @return integer
					return $this->intLocationId;

				case 'Quantity':
					// Gets the value for intQuantity (Not Null)
					// @return integer
					return $this->intQuantity;

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
				case 'InventoryModel':
					// Gets the value for the InventoryModel object referenced by intInventoryModelId (Not Null)
					// @return InventoryModel
					try {
						if ((!$this->objInventoryModel) && (!is_null($this->intInventoryModelId)))
							$this->objInventoryModel = InventoryModel::Load($this->intInventoryModelId);
						return $this->objInventoryModel;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Location':
					// Gets the value for the Location object referenced by intLocationId (Not Null)
					// @return Location
					try {
						if ((!$this->objLocation) && (!is_null($this->intLocationId)))
							$this->objLocation = Location::Load($this->intLocationId);
						return $this->objLocation;
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

				case '_InventoryTransaction':
					// Gets the value for the private _objInventoryTransaction (Read-Only)
					// if set due to an expansion on the inventory_transaction.inventory_location_id reverse relationship
					// @return InventoryTransaction
					return $this->_objInventoryTransaction;

				case '_InventoryTransactionArray':
					// Gets the value for the private _objInventoryTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_transaction.inventory_location_id reverse relationship
					// @return InventoryTransaction[]
					return (array) $this->_objInventoryTransactionArray;


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
				case 'InventoryModelId':
					// Sets the value for intInventoryModelId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objInventoryModel = null;
						return ($this->intInventoryModelId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LocationId':
					// Sets the value for intLocationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLocation = null;
						return ($this->intLocationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Quantity':
					// Sets the value for intQuantity (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantity = QType::Cast($mixValue, QType::Integer));
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
				case 'InventoryModel':
					// Sets the value for the InventoryModel object referenced by intInventoryModelId (Not Null)
					// @param InventoryModel $mixValue
					// @return InventoryModel
					if (is_null($mixValue)) {
						$this->intInventoryModelId = null;
						$this->objInventoryModel = null;
						return null;
					} else {
						// Make sure $mixValue actually is a InventoryModel object
						try {
							$mixValue = QType::Cast($mixValue, 'InventoryModel');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED InventoryModel object
						if (is_null($mixValue->InventoryModelId))
							throw new QCallerException('Unable to set an unsaved InventoryModel for this InventoryLocation');

						// Update Local Member Variables
						$this->objInventoryModel = $mixValue;
						$this->intInventoryModelId = $mixValue->InventoryModelId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Location':
					// Sets the value for the Location object referenced by intLocationId (Not Null)
					// @param Location $mixValue
					// @return Location
					if (is_null($mixValue)) {
						$this->intLocationId = null;
						$this->objLocation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Location object
						try {
							$mixValue = QType::Cast($mixValue, 'Location');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Location object
						if (is_null($mixValue->LocationId))
							throw new QCallerException('Unable to set an unsaved Location for this InventoryLocation');

						// Update Local Member Variables
						$this->objLocation = $mixValue;
						$this->intLocationId = $mixValue->LocationId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this InventoryLocation');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this InventoryLocation');

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

			
		
		// Related Objects' Methods for InventoryTransaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryTransactions as an array of InventoryTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/ 
		public function GetInventoryTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intInventoryLocationId)))
				return array();

			try {
				return InventoryTransaction::LoadArrayByInventoryLocationId($this->intInventoryLocationId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryTransactions
		 * @return int
		*/ 
		public function CountInventoryTransactions() {
			if ((is_null($this->intInventoryLocationId)))
				return 0;

			return InventoryTransaction::CountByInventoryLocationId($this->intInventoryLocationId);
		}

		/**
		 * Associates a InventoryTransaction
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function AssociateInventoryTransaction(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intInventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransaction on this unsaved InventoryLocation.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransaction on this InventoryLocation with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->InventoryLocationId = $this->intInventoryLocationId;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryTransaction
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function UnassociateInventoryTransaction(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intInventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved InventoryLocation.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this InventoryLocation with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`inventory_location_id` = null
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->InventoryLocationId = null;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryTransactions
		 * @return void
		*/ 
		public function UnassociateAllInventoryTransactions() {
			if ((is_null($this->intInventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByInventoryLocationId($this->intInventoryLocationId) as $objInventoryTransaction) {
					$objInventoryTransaction->InventoryLocationId = null;
					$objInventoryTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`inventory_location_id` = null
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
			');
		}

		/**
		 * Deletes an associated InventoryTransaction
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryTransaction(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intInventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved InventoryLocation.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this InventoryLocation with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryTransactions
		 * @return void
		*/ 
		public function DeleteAllInventoryTransactions() {
			if ((is_null($this->intInventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransaction on this unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = InventoryLocation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByInventoryLocationId($this->intInventoryLocationId) as $objInventoryTransaction) {
					$objInventoryTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($this->intInventoryLocationId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="InventoryLocation"><sequence>';
			$strToReturn .= '<element name="InventoryLocationId" type="xsd:int"/>';
			$strToReturn .= '<element name="InventoryModel" type="xsd1:InventoryModel"/>';
			$strToReturn .= '<element name="Location" type="xsd1:Location"/>';
			$strToReturn .= '<element name="Quantity" type="xsd:int"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('InventoryLocation', $strComplexTypeArray)) {
				$strComplexTypeArray['InventoryLocation'] = InventoryLocation::GetSoapComplexTypeXml();
				InventoryModel::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, InventoryLocation::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new InventoryLocation();
			if (property_exists($objSoapObject, 'InventoryLocationId'))
				$objToReturn->intInventoryLocationId = $objSoapObject->InventoryLocationId;
			if ((property_exists($objSoapObject, 'InventoryModel')) &&
				($objSoapObject->InventoryModel))
				$objToReturn->InventoryModel = InventoryModel::GetObjectFromSoapObject($objSoapObject->InventoryModel);
			if ((property_exists($objSoapObject, 'Location')) &&
				($objSoapObject->Location))
				$objToReturn->Location = Location::GetObjectFromSoapObject($objSoapObject->Location);
			if (property_exists($objSoapObject, 'Quantity'))
				$objToReturn->intQuantity = $objSoapObject->Quantity;
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
				array_push($objArrayToReturn, InventoryLocation::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objInventoryModel)
				$objObject->objInventoryModel = InventoryModel::GetSoapObjectFromObject($objObject->objInventoryModel, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intInventoryModelId = null;
			if ($objObject->objLocation)
				$objObject->objLocation = Location::GetSoapObjectFromObject($objObject->objLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLocationId = null;
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
				$objQueryExpansion = new QQueryExpansion('InventoryLocation', 'inventory_location', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `inventory_location` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`inventory_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`inventory_location_id` AS `%s__%s__inventory_location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`inventory_model_id` AS `%s__%s__inventory_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`location_id` AS `%s__%s__location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`quantity` AS `%s__%s__quantity`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'inventory_model_id':
							try {
								InventoryModel::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'location_id':
							try {
								Location::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandInventoryModel = 'inventory_model_id';
		const ExpandLocation = 'location_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $InventoryLocationId
	 * @property-read QQNode $InventoryModelId
	 * @property-read QQNodeInventoryModel $InventoryModel
	 * @property-read QQNode $LocationId
	 * @property-read QQNodeLocation $Location
	 * @property-read QQNode $Quantity
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransaction
	 */
	class QQNodeInventoryLocation extends QQNode {
		protected $strTableName = 'inventory_location';
		protected $strPrimaryKey = 'inventory_location_id';
		protected $strClassName = 'InventoryLocation';
		public function __get($strName) {
			switch ($strName) {
				case 'InventoryLocationId':
					return new QQNode('inventory_location_id', 'InventoryLocationId', 'integer', $this);
				case 'InventoryModelId':
					return new QQNode('inventory_model_id', 'InventoryModelId', 'integer', $this);
				case 'InventoryModel':
					return new QQNodeInventoryModel('inventory_model_id', 'InventoryModel', 'integer', $this);
				case 'LocationId':
					return new QQNode('location_id', 'LocationId', 'integer', $this);
				case 'Location':
					return new QQNodeLocation('location_id', 'Location', 'integer', $this);
				case 'Quantity':
					return new QQNode('quantity', 'Quantity', 'integer', $this);
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
				case 'InventoryTransaction':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransaction', 'reverse_reference', 'inventory_location_id');

				case '_PrimaryKeyNode':
					return new QQNode('inventory_location_id', 'InventoryLocationId', 'integer', $this);
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
	 * @property-read QQNode $InventoryLocationId
	 * @property-read QQNode $InventoryModelId
	 * @property-read QQNodeInventoryModel $InventoryModel
	 * @property-read QQNode $LocationId
	 * @property-read QQNodeLocation $Location
	 * @property-read QQNode $Quantity
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransaction
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeInventoryLocation extends QQReverseReferenceNode {
		protected $strTableName = 'inventory_location';
		protected $strPrimaryKey = 'inventory_location_id';
		protected $strClassName = 'InventoryLocation';
		public function __get($strName) {
			switch ($strName) {
				case 'InventoryLocationId':
					return new QQNode('inventory_location_id', 'InventoryLocationId', 'integer', $this);
				case 'InventoryModelId':
					return new QQNode('inventory_model_id', 'InventoryModelId', 'integer', $this);
				case 'InventoryModel':
					return new QQNodeInventoryModel('inventory_model_id', 'InventoryModel', 'integer', $this);
				case 'LocationId':
					return new QQNode('location_id', 'LocationId', 'integer', $this);
				case 'Location':
					return new QQNodeLocation('location_id', 'Location', 'integer', $this);
				case 'Quantity':
					return new QQNode('quantity', 'Quantity', 'integer', $this);
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
				case 'InventoryTransaction':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransaction', 'reverse_reference', 'inventory_location_id');

				case '_PrimaryKeyNode':
					return new QQNode('inventory_location_id', 'InventoryLocationId', 'integer', $this);
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