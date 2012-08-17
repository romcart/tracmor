<?php
	/**
	 * The abstract AssetTransactionCheckoutGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AssetTransactionCheckout subclass which
	 * extends this AssetTransactionCheckoutGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AssetTransactionCheckout class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetTransactionCheckoutId the value for intAssetTransactionCheckoutId (Read-Only PK)
	 * @property integer $AssetTransactionId the value for intAssetTransactionId (Unique)
	 * @property integer $ToContactId the value for intToContactId 
	 * @property integer $ToUserId the value for intToUserId 
	 * @property QDateTime $DueDate the value for dttDueDate 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property AssetTransaction $AssetTransaction the value for the AssetTransaction object referenced by intAssetTransactionId (Unique)
	 * @property Contact $ToContact the value for the Contact object referenced by intToContactId 
	 * @property UserAccount $ToUser the value for the UserAccount object referenced by intToUserId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AssetTransactionCheckoutGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column asset_transaction_checkout.asset_transaction_checkout_id
		 * @var integer intAssetTransactionCheckoutId
		 */
		protected $intAssetTransactionCheckoutId;
		const AssetTransactionCheckoutIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.asset_transaction_id
		 * @var integer intAssetTransactionId
		 */
		protected $intAssetTransactionId;
		const AssetTransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.to_contact_id
		 * @var integer intToContactId
		 */
		protected $intToContactId;
		const ToContactIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.to_user_id
		 * @var integer intToUserId
		 */
		protected $intToUserId;
		const ToUserIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.due_date
		 * @var QDateTime dttDueDate
		 */
		protected $dttDueDate;
		const DueDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_transaction_checkout.modified_date
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
		 * in the database column asset_transaction_checkout.asset_transaction_id.
		 *
		 * NOTE: Always use the AssetTransaction property getter to correctly retrieve this AssetTransaction object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetTransaction objAssetTransaction
		 */
		protected $objAssetTransaction;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction_checkout.to_contact_id.
		 *
		 * NOTE: Always use the ToContact property getter to correctly retrieve this Contact object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Contact objToContact
		 */
		protected $objToContact;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction_checkout.to_user_id.
		 *
		 * NOTE: Always use the ToUser property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objToUser
		 */
		protected $objToUser;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction_checkout.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_transaction_checkout.modified_by.
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
		 * Load a AssetTransactionCheckout from PK Info
		 * @param integer $intAssetTransactionCheckoutId
		 * @return AssetTransactionCheckout
		 */
		public static function Load($intAssetTransactionCheckoutId) {
			// Use QuerySingle to Perform the Query
			return AssetTransactionCheckout::QuerySingle(
				QQ::Equal(QQN::AssetTransactionCheckout()->AssetTransactionCheckoutId, $intAssetTransactionCheckoutId)
			);
		}

		/**
		 * Load all AssetTransactionCheckouts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryArray to perform the LoadAll query
			try {
				return AssetTransactionCheckout::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AssetTransactionCheckouts
		 * @return int
		 */
		public static function CountAll() {
			// Call AssetTransactionCheckout::QueryCount to perform the CountAll query
			return AssetTransactionCheckout::QueryCount(QQ::All());
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
			$objDatabase = AssetTransactionCheckout::GetDatabase();

			// Create/Build out the QueryBuilder object with AssetTransactionCheckout-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asset_transaction_checkout');
			AssetTransactionCheckout::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('asset_transaction_checkout');

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
		 * Static Qcodo Query method to query for a single AssetTransactionCheckout object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetTransactionCheckout the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetTransactionCheckout::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new AssetTransactionCheckout object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AssetTransactionCheckout::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return AssetTransactionCheckout::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of AssetTransactionCheckout objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetTransactionCheckout[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetTransactionCheckout::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AssetTransactionCheckout::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AssetTransactionCheckout::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of AssetTransactionCheckout objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetTransactionCheckout::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AssetTransactionCheckout::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'asset_transaction_checkout_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AssetTransactionCheckout-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AssetTransactionCheckout::GetSelectFields($objQueryBuilder);
				AssetTransactionCheckout::GetFromFields($objQueryBuilder);

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
			return AssetTransactionCheckout::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AssetTransactionCheckout
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asset_transaction_checkout';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_transaction_checkout_id', $strAliasPrefix . 'asset_transaction_checkout_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_transaction_id', $strAliasPrefix . 'asset_transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'to_contact_id', $strAliasPrefix . 'to_contact_id');
			$objBuilder->AddSelectItem($strTableName, 'to_user_id', $strAliasPrefix . 'to_user_id');
			$objBuilder->AddSelectItem($strTableName, 'due_date', $strAliasPrefix . 'due_date');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AssetTransactionCheckout from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AssetTransactionCheckout::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AssetTransactionCheckout
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the AssetTransactionCheckout object
			$objToReturn = new AssetTransactionCheckout();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_transaction_checkout_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_transaction_checkout_id'] : $strAliasPrefix . 'asset_transaction_checkout_id';
			$objToReturn->intAssetTransactionCheckoutId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_transaction_id'] : $strAliasPrefix . 'asset_transaction_id';
			$objToReturn->intAssetTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_contact_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_contact_id'] : $strAliasPrefix . 'to_contact_id';
			$objToReturn->intToContactId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_user_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_user_id'] : $strAliasPrefix . 'to_user_id';
			$objToReturn->intToUserId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'due_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'due_date'] : $strAliasPrefix . 'due_date';
			$objToReturn->dttDueDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
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
				$strAliasPrefix = 'asset_transaction_checkout__';

			// Check for AssetTransaction Early Binding
			$strAlias = $strAliasPrefix . 'asset_transaction_id__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAssetTransaction = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset_transaction_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ToContact Early Binding
			$strAlias = $strAliasPrefix . 'to_contact_id__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objToContact = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'to_contact_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ToUser Early Binding
			$strAlias = $strAliasPrefix . 'to_user_id__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objToUser = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'to_user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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
		 * Instantiate an array of AssetTransactionCheckouts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AssetTransactionCheckout[]
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
					$objItem = AssetTransactionCheckout::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AssetTransactionCheckout object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AssetTransactionCheckout next row resulting from the query
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
			return AssetTransactionCheckout::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AssetTransactionCheckout object,
		 * by AssetTransactionCheckoutId Index(es)
		 * @param integer $intAssetTransactionCheckoutId
		 * @return AssetTransactionCheckout
		*/
		public static function LoadByAssetTransactionCheckoutId($intAssetTransactionCheckoutId, $objOptionalClauses = null) {
			return AssetTransactionCheckout::QuerySingle(
				QQ::Equal(QQN::AssetTransactionCheckout()->AssetTransactionCheckoutId, $intAssetTransactionCheckoutId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single AssetTransactionCheckout object,
		 * by AssetTransactionId Index(es)
		 * @param integer $intAssetTransactionId
		 * @return AssetTransactionCheckout
		*/
		public static function LoadByAssetTransactionId($intAssetTransactionId, $objOptionalClauses = null) {
			return AssetTransactionCheckout::QuerySingle(
				QQ::Equal(QQN::AssetTransactionCheckout()->AssetTransactionId, $intAssetTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransactionCheckout objects,
		 * by ToContactId Index(es)
		 * @param integer $intToContactId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/
		public static function LoadArrayByToContactId($intToContactId, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryArray to perform the LoadArrayByToContactId query
			try {
				return AssetTransactionCheckout::QueryArray(
					QQ::Equal(QQN::AssetTransactionCheckout()->ToContactId, $intToContactId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactionCheckouts
		 * by ToContactId Index(es)
		 * @param integer $intToContactId
		 * @return int
		*/
		public static function CountByToContactId($intToContactId, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryCount to perform the CountByToContactId query
			return AssetTransactionCheckout::QueryCount(
				QQ::Equal(QQN::AssetTransactionCheckout()->ToContactId, $intToContactId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransactionCheckout objects,
		 * by ToUserId Index(es)
		 * @param integer $intToUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/
		public static function LoadArrayByToUserId($intToUserId, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryArray to perform the LoadArrayByToUserId query
			try {
				return AssetTransactionCheckout::QueryArray(
					QQ::Equal(QQN::AssetTransactionCheckout()->ToUserId, $intToUserId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactionCheckouts
		 * by ToUserId Index(es)
		 * @param integer $intToUserId
		 * @return int
		*/
		public static function CountByToUserId($intToUserId, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryCount to perform the CountByToUserId query
			return AssetTransactionCheckout::QueryCount(
				QQ::Equal(QQN::AssetTransactionCheckout()->ToUserId, $intToUserId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransactionCheckout objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return AssetTransactionCheckout::QueryArray(
					QQ::Equal(QQN::AssetTransactionCheckout()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactionCheckouts
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryCount to perform the CountByCreatedBy query
			return AssetTransactionCheckout::QueryCount(
				QQ::Equal(QQN::AssetTransactionCheckout()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetTransactionCheckout objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return AssetTransactionCheckout::QueryArray(
					QQ::Equal(QQN::AssetTransactionCheckout()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetTransactionCheckouts
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call AssetTransactionCheckout::QueryCount to perform the CountByModifiedBy query
			return AssetTransactionCheckout::QueryCount(
				QQ::Equal(QQN::AssetTransactionCheckout()->ModifiedBy, $intModifiedBy)
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
		 * Save this AssetTransactionCheckout
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AssetTransactionCheckout::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asset_transaction_checkout` (
							`asset_transaction_id`,
							`to_contact_id`,
							`to_user_id`,
							`due_date`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAssetTransactionId) . ',
							' . $objDatabase->SqlVariable($this->intToContactId) . ',
							' . $objDatabase->SqlVariable($this->intToUserId) . ',
							' . $objDatabase->SqlVariable($this->dttDueDate) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAssetTransactionCheckoutId = $objDatabase->InsertId('asset_transaction_checkout', 'asset_transaction_checkout_id');

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
								`asset_transaction_checkout`
							WHERE
								`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionCheckoutId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('AssetTransactionCheckout');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asset_transaction_checkout`
						SET
							`asset_transaction_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionId) . ',
							`to_contact_id` = ' . $objDatabase->SqlVariable($this->intToContactId) . ',
							`to_user_id` = ' . $objDatabase->SqlVariable($this->intToUserId) . ',
							`due_date` = ' . $objDatabase->SqlVariable($this->dttDueDate) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionCheckoutId) . '
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
					`asset_transaction_checkout`
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionCheckoutId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this AssetTransactionCheckout
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AssetTransactionCheckout with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AssetTransactionCheckout::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($this->intAssetTransactionCheckoutId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all AssetTransactionCheckouts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AssetTransactionCheckout::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`');
		}

		/**
		 * Truncate asset_transaction_checkout table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AssetTransactionCheckout::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asset_transaction_checkout`');
		}

		/**
		 * Reload this AssetTransactionCheckout from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AssetTransactionCheckout object.');

			// Reload the Object
			$objReloaded = AssetTransactionCheckout::Load($this->intAssetTransactionCheckoutId);

			// Update $this's local variables to match
			$this->AssetTransactionId = $objReloaded->AssetTransactionId;
			$this->ToContactId = $objReloaded->ToContactId;
			$this->ToUserId = $objReloaded->ToUserId;
			$this->dttDueDate = $objReloaded->dttDueDate;
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
			$objDatabase = AssetTransactionCheckout::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `asset_transaction_checkout` (
					`asset_transaction_checkout_id`,
					`asset_transaction_id`,
					`to_contact_id`,
					`to_user_id`,
					`due_date`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAssetTransactionCheckoutId) . ',
					' . $objDatabase->SqlVariable($this->intAssetTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intToContactId) . ',
					' . $objDatabase->SqlVariable($this->intToUserId) . ',
					' . $objDatabase->SqlVariable($this->dttDueDate) . ',
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
		 * @param integer intAssetTransactionCheckoutId
		 * @return AssetTransactionCheckout[]
		 */
		public static function GetJournalForId($intAssetTransactionCheckoutId) {
			$objDatabase = AssetTransactionCheckout::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM asset_transaction_checkout WHERE asset_transaction_checkout_id = ' .
				$objDatabase->SqlVariable($intAssetTransactionCheckoutId) . ' ORDER BY __sys_date');

			return AssetTransactionCheckout::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return AssetTransactionCheckout[]
		 */
		public function GetJournal() {
			return AssetTransactionCheckout::GetJournalForId($this->intAssetTransactionCheckoutId);
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
				case 'AssetTransactionCheckoutId':
					// Gets the value for intAssetTransactionCheckoutId (Read-Only PK)
					// @return integer
					return $this->intAssetTransactionCheckoutId;

				case 'AssetTransactionId':
					// Gets the value for intAssetTransactionId (Unique)
					// @return integer
					return $this->intAssetTransactionId;

				case 'ToContactId':
					// Gets the value for intToContactId 
					// @return integer
					return $this->intToContactId;

				case 'ToUserId':
					// Gets the value for intToUserId 
					// @return integer
					return $this->intToUserId;

				case 'DueDate':
					// Gets the value for dttDueDate 
					// @return QDateTime
					return $this->dttDueDate;

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
				case 'AssetTransaction':
					// Gets the value for the AssetTransaction object referenced by intAssetTransactionId (Unique)
					// @return AssetTransaction
					try {
						if ((!$this->objAssetTransaction) && (!is_null($this->intAssetTransactionId)))
							$this->objAssetTransaction = AssetTransaction::Load($this->intAssetTransactionId);
						return $this->objAssetTransaction;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToContact':
					// Gets the value for the Contact object referenced by intToContactId 
					// @return Contact
					try {
						if ((!$this->objToContact) && (!is_null($this->intToContactId)))
							$this->objToContact = Contact::Load($this->intToContactId);
						return $this->objToContact;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToUser':
					// Gets the value for the UserAccount object referenced by intToUserId 
					// @return UserAccount
					try {
						if ((!$this->objToUser) && (!is_null($this->intToUserId)))
							$this->objToUser = UserAccount::Load($this->intToUserId);
						return $this->objToUser;
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
				case 'AssetTransactionId':
					// Sets the value for intAssetTransactionId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAssetTransaction = null;
						return ($this->intAssetTransactionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToContactId':
					// Sets the value for intToContactId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objToContact = null;
						return ($this->intToContactId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToUserId':
					// Sets the value for intToUserId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objToUser = null;
						return ($this->intToUserId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DueDate':
					// Sets the value for dttDueDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDueDate = QType::Cast($mixValue, QType::DateTime));
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
				case 'AssetTransaction':
					// Sets the value for the AssetTransaction object referenced by intAssetTransactionId (Unique)
					// @param AssetTransaction $mixValue
					// @return AssetTransaction
					if (is_null($mixValue)) {
						$this->intAssetTransactionId = null;
						$this->objAssetTransaction = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AssetTransaction object
						try {
							$mixValue = QType::Cast($mixValue, 'AssetTransaction');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AssetTransaction object
						if (is_null($mixValue->AssetTransactionId))
							throw new QCallerException('Unable to set an unsaved AssetTransaction for this AssetTransactionCheckout');

						// Update Local Member Variables
						$this->objAssetTransaction = $mixValue;
						$this->intAssetTransactionId = $mixValue->AssetTransactionId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ToContact':
					// Sets the value for the Contact object referenced by intToContactId 
					// @param Contact $mixValue
					// @return Contact
					if (is_null($mixValue)) {
						$this->intToContactId = null;
						$this->objToContact = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Contact object
						try {
							$mixValue = QType::Cast($mixValue, 'Contact');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Contact object
						if (is_null($mixValue->ContactId))
							throw new QCallerException('Unable to set an unsaved ToContact for this AssetTransactionCheckout');

						// Update Local Member Variables
						$this->objToContact = $mixValue;
						$this->intToContactId = $mixValue->ContactId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ToUser':
					// Sets the value for the UserAccount object referenced by intToUserId 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intToUserId = null;
						$this->objToUser = null;
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
							throw new QCallerException('Unable to set an unsaved ToUser for this AssetTransactionCheckout');

						// Update Local Member Variables
						$this->objToUser = $mixValue;
						$this->intToUserId = $mixValue->UserAccountId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this AssetTransactionCheckout');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this AssetTransactionCheckout');

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
			$strToReturn = '<complexType name="AssetTransactionCheckout"><sequence>';
			$strToReturn .= '<element name="AssetTransactionCheckoutId" type="xsd:int"/>';
			$strToReturn .= '<element name="AssetTransaction" type="xsd1:AssetTransaction"/>';
			$strToReturn .= '<element name="ToContact" type="xsd1:Contact"/>';
			$strToReturn .= '<element name="ToUser" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="DueDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AssetTransactionCheckout', $strComplexTypeArray)) {
				$strComplexTypeArray['AssetTransactionCheckout'] = AssetTransactionCheckout::GetSoapComplexTypeXml();
				AssetTransaction::AlterSoapComplexTypeArray($strComplexTypeArray);
				Contact::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AssetTransactionCheckout::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AssetTransactionCheckout();
			if (property_exists($objSoapObject, 'AssetTransactionCheckoutId'))
				$objToReturn->intAssetTransactionCheckoutId = $objSoapObject->AssetTransactionCheckoutId;
			if ((property_exists($objSoapObject, 'AssetTransaction')) &&
				($objSoapObject->AssetTransaction))
				$objToReturn->AssetTransaction = AssetTransaction::GetObjectFromSoapObject($objSoapObject->AssetTransaction);
			if ((property_exists($objSoapObject, 'ToContact')) &&
				($objSoapObject->ToContact))
				$objToReturn->ToContact = Contact::GetObjectFromSoapObject($objSoapObject->ToContact);
			if ((property_exists($objSoapObject, 'ToUser')) &&
				($objSoapObject->ToUser))
				$objToReturn->ToUser = UserAccount::GetObjectFromSoapObject($objSoapObject->ToUser);
			if (property_exists($objSoapObject, 'DueDate'))
				$objToReturn->dttDueDate = new QDateTime($objSoapObject->DueDate);
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
				array_push($objArrayToReturn, AssetTransactionCheckout::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAssetTransaction)
				$objObject->objAssetTransaction = AssetTransaction::GetSoapObjectFromObject($objObject->objAssetTransaction, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssetTransactionId = null;
			if ($objObject->objToContact)
				$objObject->objToContact = Contact::GetSoapObjectFromObject($objObject->objToContact, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intToContactId = null;
			if ($objObject->objToUser)
				$objObject->objToUser = UserAccount::GetSoapObjectFromObject($objObject->objToUser, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intToUserId = null;
			if ($objObject->dttDueDate)
				$objObject->dttDueDate = $objObject->dttDueDate->__toString(QDateTime::FormatSoap);
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
				$objQueryExpansion = new QQueryExpansion('AssetTransactionCheckout', 'asset_transaction_checkout', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `asset_transaction_checkout` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_transaction_checkout_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_transaction_checkout_id` AS `%s__%s__asset_transaction_checkout_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_transaction_id` AS `%s__%s__asset_transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`to_contact_id` AS `%s__%s__to_contact_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`to_user_id` AS `%s__%s__to_user_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`due_date` AS `%s__%s__due_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'asset_transaction_id':
							try {
								AssetTransaction::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'to_contact_id':
							try {
								Contact::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'to_user_id':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandAssetTransaction = 'asset_transaction_id';
		const ExpandToContact = 'to_contact_id';
		const ExpandToUser = 'to_user_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AssetTransactionCheckoutId
	 * @property-read QQNode $AssetTransactionId
	 * @property-read QQNodeAssetTransaction $AssetTransaction
	 * @property-read QQNode $ToContactId
	 * @property-read QQNodeContact $ToContact
	 * @property-read QQNode $ToUserId
	 * @property-read QQNodeUserAccount $ToUser
	 * @property-read QQNode $DueDate
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 */
	class QQNodeAssetTransactionCheckout extends QQNode {
		protected $strTableName = 'asset_transaction_checkout';
		protected $strPrimaryKey = 'asset_transaction_checkout_id';
		protected $strClassName = 'AssetTransactionCheckout';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetTransactionCheckoutId':
					return new QQNode('asset_transaction_checkout_id', 'AssetTransactionCheckoutId', 'integer', $this);
				case 'AssetTransactionId':
					return new QQNode('asset_transaction_id', 'AssetTransactionId', 'integer', $this);
				case 'AssetTransaction':
					return new QQNodeAssetTransaction('asset_transaction_id', 'AssetTransaction', 'integer', $this);
				case 'ToContactId':
					return new QQNode('to_contact_id', 'ToContactId', 'integer', $this);
				case 'ToContact':
					return new QQNodeContact('to_contact_id', 'ToContact', 'integer', $this);
				case 'ToUserId':
					return new QQNode('to_user_id', 'ToUserId', 'integer', $this);
				case 'ToUser':
					return new QQNodeUserAccount('to_user_id', 'ToUser', 'integer', $this);
				case 'DueDate':
					return new QQNode('due_date', 'DueDate', 'QDateTime', $this);
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
					return new QQNode('asset_transaction_checkout_id', 'AssetTransactionCheckoutId', 'integer', $this);
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
	 * @property-read QQNode $AssetTransactionCheckoutId
	 * @property-read QQNode $AssetTransactionId
	 * @property-read QQNodeAssetTransaction $AssetTransaction
	 * @property-read QQNode $ToContactId
	 * @property-read QQNodeContact $ToContact
	 * @property-read QQNode $ToUserId
	 * @property-read QQNodeUserAccount $ToUser
	 * @property-read QQNode $DueDate
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAssetTransactionCheckout extends QQReverseReferenceNode {
		protected $strTableName = 'asset_transaction_checkout';
		protected $strPrimaryKey = 'asset_transaction_checkout_id';
		protected $strClassName = 'AssetTransactionCheckout';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetTransactionCheckoutId':
					return new QQNode('asset_transaction_checkout_id', 'AssetTransactionCheckoutId', 'integer', $this);
				case 'AssetTransactionId':
					return new QQNode('asset_transaction_id', 'AssetTransactionId', 'integer', $this);
				case 'AssetTransaction':
					return new QQNodeAssetTransaction('asset_transaction_id', 'AssetTransaction', 'integer', $this);
				case 'ToContactId':
					return new QQNode('to_contact_id', 'ToContactId', 'integer', $this);
				case 'ToContact':
					return new QQNodeContact('to_contact_id', 'ToContact', 'integer', $this);
				case 'ToUserId':
					return new QQNode('to_user_id', 'ToUserId', 'integer', $this);
				case 'ToUser':
					return new QQNodeUserAccount('to_user_id', 'ToUser', 'integer', $this);
				case 'DueDate':
					return new QQNode('due_date', 'DueDate', 'QDateTime', $this);
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
					return new QQNode('asset_transaction_checkout_id', 'AssetTransactionCheckoutId', 'integer', $this);
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