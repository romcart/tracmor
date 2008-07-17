<?php
	/**
	 * The abstract RoleTransactionTypeAuthorizationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the RoleTransactionTypeAuthorization subclass which
	 * extends this RoleTransactionTypeAuthorizationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RoleTransactionTypeAuthorization class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * 
	 */
	class RoleTransactionTypeAuthorizationGen extends QBaseClass {
		///////////////////////////////
		// COMMON LOAD METHODS
		///////////////////////////////

		/**
		 * Load a RoleTransactionTypeAuthorization from PK Info
		 * @param integer $intIdRoleTransactionTypeAuthorization
		 * @return RoleTransactionTypeAuthorization
		 */
		public static function Load($intIdRoleTransactionTypeAuthorization) {
			// Use QuerySingle to Perform the Query
			return RoleTransactionTypeAuthorization::QuerySingle(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->IdRoleTransactionTypeAuthorization, $intIdRoleTransactionTypeAuthorization)
			);
		}

		/**
		 * Load all RoleTransactionTypeAuthorizations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadAll query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all RoleTransactionTypeAuthorizations
		 * @return int
		 */
		public static function CountAll() {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountAll query
			return RoleTransactionTypeAuthorization::QueryCount(QQ::All());
		}



		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = RoleTransactionTypeAuthorization::GetDatabase();

			// Create/Build out the QueryBuilder object with RoleTransactionTypeAuthorization-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'role_transaction_type_authorization');
			RoleTransactionTypeAuthorization::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('`role_transaction_type_authorization` AS `role_transaction_type_authorization`');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				$objConditions->UpdateQueryBuilder($objQueryBuilder);

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if (!is_array($objOptionalClauses))
					throw new QCallerException('Optional Clauses must be a QQ::Clause() or an array of QQClause objects');
				foreach ($objOptionalClauses as $objClause)
					$objClause->UpdateQueryBuilder($objQueryBuilder);
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
		 * Static Qcodo Query method to query for a single RoleTransactionTypeAuthorization object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RoleTransactionTypeAuthorization the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RoleTransactionTypeAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new RoleTransactionTypeAuthorization object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RoleTransactionTypeAuthorization::InstantiateDbRow($objDbResult->GetNextRow());
		}

		/**
		 * Static Qcodo Query method to query for an array of RoleTransactionTypeAuthorization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RoleTransactionTypeAuthorization[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RoleTransactionTypeAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RoleTransactionTypeAuthorization::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes);
		}

		/**
		 * Static Qcodo Query method to query for a count of RoleTransactionTypeAuthorization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RoleTransactionTypeAuthorization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = RoleTransactionTypeAuthorization::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'role_transaction_type_authorization_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with RoleTransactionTypeAuthorization-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				RoleTransactionTypeAuthorization::GetSelectFields($objQueryBuilder);
				RoleTransactionTypeAuthorization::GetFromFields($objQueryBuilder);

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
			return RoleTransactionTypeAuthorization::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this RoleTransactionTypeAuthorization
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = '`' . $strPrefix . '`';
				$strAliasPrefix = '`' . $strPrefix . '__';
			} else {
				$strTableName = '`role_transaction_type_authorization`';
				$strAliasPrefix = '`';
			}

			$objBuilder->AddSelectItem($strTableName . '.`id_role_transaction_type_authorization` AS ' . $strAliasPrefix . 'id_role_transaction_type_authorization`');
			$objBuilder->AddSelectItem($strTableName . '.`role_id` AS ' . $strAliasPrefix . 'role_id`');
			$objBuilder->AddSelectItem($strTableName . '.`transaction_type_id` AS ' . $strAliasPrefix . 'transaction_type_id`');
			$objBuilder->AddSelectItem($strTableName . '.`authorization_level_id` AS ' . $strAliasPrefix . 'authorization_level_id`');
			$objBuilder->AddSelectItem($strTableName . '.`created_by` AS ' . $strAliasPrefix . 'created_by`');
			$objBuilder->AddSelectItem($strTableName . '.`creation_date` AS ' . $strAliasPrefix . 'creation_date`');
			$objBuilder->AddSelectItem($strTableName . '.`modified_by` AS ' . $strAliasPrefix . 'modified_by`');
			$objBuilder->AddSelectItem($strTableName . '.`modified_date` AS ' . $strAliasPrefix . 'modified_date`');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a RoleTransactionTypeAuthorization from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this RoleTransactionTypeAuthorization::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @return RoleTransactionTypeAuthorization
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the RoleTransactionTypeAuthorization object
			$objToReturn = new RoleTransactionTypeAuthorization();
			$objToReturn->__blnRestored = true;

			$objToReturn->intIdRoleTransactionTypeAuthorization = $objDbRow->GetColumn($strAliasPrefix . 'id_role_transaction_type_authorization', 'Integer');
			$objToReturn->intRoleId = $objDbRow->GetColumn($strAliasPrefix . 'role_id', 'Integer');
			$objToReturn->intTransactionTypeId = $objDbRow->GetColumn($strAliasPrefix . 'transaction_type_id', 'Integer');
			$objToReturn->intAuthorizationLevelId = $objDbRow->GetColumn($strAliasPrefix . 'authorization_level_id', 'Integer');
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasPrefix . 'created_by', 'Integer');
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasPrefix . 'creation_date', 'DateTime');
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasPrefix . 'modified_by', 'Integer');
			$objToReturn->dttModifiedDate = $objDbRow->GetColumn($strAliasPrefix . 'modified_date', 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'role_transaction_type_authorization__';

			// Check for Role Early Binding
			if (!is_null($objDbRow->GetColumn($strAliasPrefix . 'role_id__role_id')))
				$objToReturn->objRole = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'role_id__', $strExpandAsArrayNodes);

			// Check for TransactionType Early Binding
			if (!is_null($objDbRow->GetColumn($strAliasPrefix . 'transaction_type_id__transaction_type_id')))
				$objToReturn->objTransactionType = TransactionType::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction_type_id__', $strExpandAsArrayNodes);

			// Check for AuthorizationLevel Early Binding
			if (!is_null($objDbRow->GetColumn($strAliasPrefix . 'authorization_level_id__authorization_level_id')))
				$objToReturn->objAuthorizationLevel = AuthorizationLevel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'authorization_level_id__', $strExpandAsArrayNodes);

			// Check for CreatedByObject Early Binding
			if (!is_null($objDbRow->GetColumn($strAliasPrefix . 'created_by__user_account_id')))
				$objToReturn->objCreatedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $strExpandAsArrayNodes);

			// Check for ModifiedByObject Early Binding
			if (!is_null($objDbRow->GetColumn($strAliasPrefix . 'modified_by__user_account_id')))
				$objToReturn->objModifiedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'modified_by__', $strExpandAsArrayNodes);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of RoleTransactionTypeAuthorizations from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @return RoleTransactionTypeAuthorization[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null) {
			$objToReturn = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem);
					if ($objItem) {
						array_push($objToReturn, $objItem);
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					array_push($objToReturn, RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow));
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single RoleTransactionTypeAuthorization object,
		 * by IdRoleTransactionTypeAuthorization Index(es)
		 * @param integer $intIdRoleTransactionTypeAuthorization
		 * @return RoleTransactionTypeAuthorization
		*/
		public static function LoadByIdRoleTransactionTypeAuthorization($intIdRoleTransactionTypeAuthorization) {
			return RoleTransactionTypeAuthorization::QuerySingle(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->IdRoleTransactionTypeAuthorization, $intIdRoleTransactionTypeAuthorization)
			);
		}
			
		/**
		 * Load an array of RoleTransactionTypeAuthorization objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->CreatedBy, $intCreatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleTransactionTypeAuthorizations
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy) {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountByCreatedBy query
			return RoleTransactionTypeAuthorization::QueryCount(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->CreatedBy, $intCreatedBy)
			);
		}
			
		/**
		 * Load an array of RoleTransactionTypeAuthorization objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleTransactionTypeAuthorizations
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy) {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountByModifiedBy query
			return RoleTransactionTypeAuthorization::QueryCount(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->ModifiedBy, $intModifiedBy)
			);
		}
			
		/**
		 * Load an array of RoleTransactionTypeAuthorization objects,
		 * by AuthorizationLevelId Index(es)
		 * @param integer $intAuthorizationLevelId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/
		public static function LoadArrayByAuthorizationLevelId($intAuthorizationLevelId, $objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadArrayByAuthorizationLevelId query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->AuthorizationLevelId, $intAuthorizationLevelId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleTransactionTypeAuthorizations
		 * by AuthorizationLevelId Index(es)
		 * @param integer $intAuthorizationLevelId
		 * @return int
		*/
		public static function CountByAuthorizationLevelId($intAuthorizationLevelId) {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountByAuthorizationLevelId query
			return RoleTransactionTypeAuthorization::QueryCount(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->AuthorizationLevelId, $intAuthorizationLevelId)
			);
		}
			
		/**
		 * Load an array of RoleTransactionTypeAuthorization objects,
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/
		public static function LoadArrayByTransactionTypeId($intTransactionTypeId, $objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadArrayByTransactionTypeId query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->TransactionTypeId, $intTransactionTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleTransactionTypeAuthorizations
		 * by TransactionTypeId Index(es)
		 * @param integer $intTransactionTypeId
		 * @return int
		*/
		public static function CountByTransactionTypeId($intTransactionTypeId) {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountByTransactionTypeId query
			return RoleTransactionTypeAuthorization::QueryCount(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->TransactionTypeId, $intTransactionTypeId)
			);
		}
			
		/**
		 * Load an array of RoleTransactionTypeAuthorization objects,
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/
		public static function LoadArrayByRoleId($intRoleId, $objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadArrayByRoleId query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->RoleId, $intRoleId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleTransactionTypeAuthorizations
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @return int
		*/
		public static function CountByRoleId($intRoleId) {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountByRoleId query
			return RoleTransactionTypeAuthorization::QueryCount(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->RoleId, $intRoleId)
			);
		}
			
		/**
		 * Load an array of RoleTransactionTypeAuthorization objects,
		 * by RoleId, TransactionTypeId Index(es)
		 * @param integer $intRoleId
		 * @param integer $intTransactionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/
		public static function LoadArrayByRoleIdTransactionTypeId($intRoleId, $intTransactionTypeId, $objOptionalClauses = null) {
			// Call RoleTransactionTypeAuthorization::QueryArray to perform the LoadArrayByRoleIdTransactionTypeId query
			try {
				return RoleTransactionTypeAuthorization::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->RoleId, $intRoleId),
					QQ::Equal(QQN::RoleTransactionTypeAuthorization()->TransactionTypeId, $intTransactionTypeId)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RoleTransactionTypeAuthorizations
		 * by RoleId, TransactionTypeId Index(es)
		 * @param integer $intRoleId
		 * @param integer $intTransactionTypeId
		 * @return int
		*/
		public static function CountByRoleIdTransactionTypeId($intRoleId, $intTransactionTypeId) {
			// Call RoleTransactionTypeAuthorization::QueryCount to perform the CountByRoleIdTransactionTypeId query
			return RoleTransactionTypeAuthorization::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->RoleId, $intRoleId),
				QQ::Equal(QQN::RoleTransactionTypeAuthorization()->TransactionTypeId, $intTransactionTypeId)
				)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////



		//////////////////
		// SAVE AND DELETE
		//////////////////

		/**
		 * Save this RoleTransactionTypeAuthorization
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		*/
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = RoleTransactionTypeAuthorization::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `role_transaction_type_authorization` (
							`role_id`,
							`transaction_type_id`,
							`authorization_level_id`,
							`created_by`,
							`creation_date`,
							`modified_by`,
							`modified_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intRoleId) . ',
							' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
							' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							' . $objDatabase->SqlVariable($this->dttModifiedDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdRoleTransactionTypeAuthorization = $objDatabase->InsertId('role_transaction_type_authorization', 'id_role_transaction_type_authorization');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`role_transaction_type_authorization`
						SET
							`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . ',
							`transaction_type_id` = ' . $objDatabase->SqlVariable($this->intTransactionTypeId) . ',
							`authorization_level_id` = ' . $objDatabase->SqlVariable($this->intAuthorizationLevelId) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							`modified_date` = ' . $objDatabase->SqlVariable($this->dttModifiedDate) . '
						WHERE
							`id_role_transaction_type_authorization` = ' . $objDatabase->SqlVariable($this->intIdRoleTransactionTypeAuthorization) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

				/**
		 * Delete this RoleTransactionTypeAuthorization
		 * @return void
		*/
		public function Delete() {
			if ((is_null($this->intIdRoleTransactionTypeAuthorization)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this RoleTransactionTypeAuthorization with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = RoleTransactionTypeAuthorization::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`id_role_transaction_type_authorization` = ' . $objDatabase->SqlVariable($this->intIdRoleTransactionTypeAuthorization) . '');
		}

		/**
		 * Delete all RoleTransactionTypeAuthorizations
		 * @return void
		*/
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = RoleTransactionTypeAuthorization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`');
		}

		/**
		 * Truncate role_transaction_type_authorization table
		 * @return void
		*/
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = RoleTransactionTypeAuthorization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `role_transaction_type_authorization`');
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
				case 'IdRoleTransactionTypeAuthorization':
					/**
					 * Gets the value for intIdRoleTransactionTypeAuthorization (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdRoleTransactionTypeAuthorization;

				case 'RoleId':
					/**
					 * Gets the value for intRoleId (Not Null)
					 * @return integer
					 */
					return $this->intRoleId;

				case 'TransactionTypeId':
					/**
					 * Gets the value for intTransactionTypeId (Not Null)
					 * @return integer
					 */
					return $this->intTransactionTypeId;

				case 'AuthorizationLevelId':
					/**
					 * Gets the value for intAuthorizationLevelId (Not Null)
					 * @return integer
					 */
					return $this->intAuthorizationLevelId;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy (Not Null)
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'CreationDate':
					/**
					 * Gets the value for dttCreationDate 
					 * @return QDateTime
					 */
					return $this->dttCreationDate;

				case 'ModifiedBy':
					/**
					 * Gets the value for intModifiedBy (Not Null)
					 * @return integer
					 */
					return $this->intModifiedBy;

				case 'ModifiedDate':
					/**
					 * Gets the value for dttModifiedDate 
					 * @return QDateTime
					 */
					return $this->dttModifiedDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Role':
					/**
					 * Gets the value for the Role object referenced by intRoleId (Not Null)
					 * @return Role
					 */
					try {
						if ((!$this->objRole) && (!is_null($this->intRoleId)))
							$this->objRole = Role::Load($this->intRoleId);
						return $this->objRole;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionType':
					/**
					 * Gets the value for the TransactionType object referenced by intTransactionTypeId (Not Null)
					 * @return TransactionType
					 */
					try {
						if ((!$this->objTransactionType) && (!is_null($this->intTransactionTypeId)))
							$this->objTransactionType = TransactionType::Load($this->intTransactionTypeId);
						return $this->objTransactionType;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationLevel':
					/**
					 * Gets the value for the AuthorizationLevel object referenced by intAuthorizationLevelId (Not Null)
					 * @return AuthorizationLevel
					 */
					try {
						if ((!$this->objAuthorizationLevel) && (!is_null($this->intAuthorizationLevelId)))
							$this->objAuthorizationLevel = AuthorizationLevel::Load($this->intAuthorizationLevelId);
						return $this->objAuthorizationLevel;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					/**
					 * Gets the value for the UserAccount object referenced by intCreatedBy (Not Null)
					 * @return UserAccount
					 */
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = UserAccount::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedByObject':
					/**
					 * Gets the value for the UserAccount object referenced by intModifiedBy (Not Null)
					 * @return UserAccount
					 */
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
				case 'RoleId':
					/**
					 * Sets the value for intRoleId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRole = null;
						return ($this->intRoleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionTypeId':
					/**
					 * Sets the value for intTransactionTypeId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTransactionType = null;
						return ($this->intTransactionTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationLevelId':
					/**
					 * Sets the value for intAuthorizationLevelId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAuthorizationLevel = null;
						return ($this->intAuthorizationLevelId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreationDate':
					/**
					 * Sets the value for dttCreationDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedBy':
					/**
					 * Sets the value for intModifiedBy (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objModifiedByObject = null;
						return ($this->intModifiedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedDate':
					/**
					 * Sets the value for dttModifiedDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttModifiedDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Role':
					/**
					 * Sets the value for the Role object referenced by intRoleId (Not Null)
					 * @param Role $mixValue
					 * @return Role
					 */
					if (is_null($mixValue)) {
						$this->intRoleId = null;
						$this->objRole = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Role object
						try {
							$mixValue = QType::Cast($mixValue, 'Role');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Role object
						if (is_null($mixValue->RoleId))
							throw new QCallerException('Unable to set an unsaved Role for this RoleTransactionTypeAuthorization');

						// Update Local Member Variables
						$this->objRole = $mixValue;
						$this->intRoleId = $mixValue->RoleId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TransactionType':
					/**
					 * Sets the value for the TransactionType object referenced by intTransactionTypeId (Not Null)
					 * @param TransactionType $mixValue
					 * @return TransactionType
					 */
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
							throw new QCallerException('Unable to set an unsaved TransactionType for this RoleTransactionTypeAuthorization');

						// Update Local Member Variables
						$this->objTransactionType = $mixValue;
						$this->intTransactionTypeId = $mixValue->TransactionTypeId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AuthorizationLevel':
					/**
					 * Sets the value for the AuthorizationLevel object referenced by intAuthorizationLevelId (Not Null)
					 * @param AuthorizationLevel $mixValue
					 * @return AuthorizationLevel
					 */
					if (is_null($mixValue)) {
						$this->intAuthorizationLevelId = null;
						$this->objAuthorizationLevel = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AuthorizationLevel object
						try {
							$mixValue = QType::Cast($mixValue, 'AuthorizationLevel');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AuthorizationLevel object
						if (is_null($mixValue->AuthorizationLevelId))
							throw new QCallerException('Unable to set an unsaved AuthorizationLevel for this RoleTransactionTypeAuthorization');

						// Update Local Member Variables
						$this->objAuthorizationLevel = $mixValue;
						$this->intAuthorizationLevelId = $mixValue->AuthorizationLevelId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					/**
					 * Sets the value for the UserAccount object referenced by intCreatedBy (Not Null)
					 * @param UserAccount $mixValue
					 * @return UserAccount
					 */
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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this RoleTransactionTypeAuthorization');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ModifiedByObject':
					/**
					 * Sets the value for the UserAccount object referenced by intModifiedBy (Not Null)
					 * @param UserAccount $mixValue
					 * @return UserAccount
					 */
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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this RoleTransactionTypeAuthorization');

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
		// ASSOCIATED OBJECTS
		///////////////////////////////




		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column role_transaction_type_authorization.id_role_transaction_type_authorization
		 * @var integer intIdRoleTransactionTypeAuthorization
		 */
		protected $intIdRoleTransactionTypeAuthorization;
		const IdRoleTransactionTypeAuthorizationDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.role_id
		 * @var integer intRoleId
		 */
		protected $intRoleId;
		const RoleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.transaction_type_id
		 * @var integer intTransactionTypeId
		 */
		protected $intTransactionTypeId;
		const TransactionTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.authorization_level_id
		 * @var integer intAuthorizationLevelId
		 */
		protected $intAuthorizationLevelId;
		const AuthorizationLevelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column role_transaction_type_authorization.modified_date
		 * @var QDateTime dttModifiedDate
		 */
		protected $dttModifiedDate;
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
		 * in the database column role_transaction_type_authorization.role_id.
		 *
		 * NOTE: Always use the Role property getter to correctly retrieve this Role object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Role objRole
		 */
		protected $objRole;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_transaction_type_authorization.transaction_type_id.
		 *
		 * NOTE: Always use the TransactionType property getter to correctly retrieve this TransactionType object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TransactionType objTransactionType
		 */
		protected $objTransactionType;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_transaction_type_authorization.authorization_level_id.
		 *
		 * NOTE: Always use the AuthorizationLevel property getter to correctly retrieve this AuthorizationLevel object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AuthorizationLevel objAuthorizationLevel
		 */
		protected $objAuthorizationLevel;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_transaction_type_authorization.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column role_transaction_type_authorization.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;






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
				$objQueryExpansion = new QQueryExpansion('RoleTransactionTypeAuthorization', 'role_transaction_type_authorization', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `role_transaction_type_authorization` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`id_role_transaction_type_authorization`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`id_role_transaction_type_authorization` AS `%s__%s__id_role_transaction_type_authorization`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`role_id` AS `%s__%s__role_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_type_id` AS `%s__%s__transaction_type_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`authorization_level_id` AS `%s__%s__authorization_level_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'role_id':
							try {
								Role::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
						case 'authorization_level_id':
							try {
								AuthorizationLevel::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandRole = 'role_id';
		const ExpandTransactionType = 'transaction_type_id';
		const ExpandAuthorizationLevel = 'authorization_level_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';




		////////////////////////////////////////
		// METHODS for WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="RoleTransactionTypeAuthorization"><sequence>';
			$strToReturn .= '<element name="IdRoleTransactionTypeAuthorization" type="xsd:int"/>';
			$strToReturn .= '<element name="Role" type="xsd1:Role"/>';
			$strToReturn .= '<element name="TransactionType" type="xsd1:TransactionType"/>';
			$strToReturn .= '<element name="AuthorizationLevel" type="xsd1:AuthorizationLevel"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('RoleTransactionTypeAuthorization', $strComplexTypeArray)) {
				$strComplexTypeArray['RoleTransactionTypeAuthorization'] = RoleTransactionTypeAuthorization::GetSoapComplexTypeXml();
				Role::AlterSoapComplexTypeArray($strComplexTypeArray);
				TransactionType::AlterSoapComplexTypeArray($strComplexTypeArray);
				AuthorizationLevel::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, RoleTransactionTypeAuthorization::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new RoleTransactionTypeAuthorization();
			if (property_exists($objSoapObject, 'IdRoleTransactionTypeAuthorization'))
				$objToReturn->intIdRoleTransactionTypeAuthorization = $objSoapObject->IdRoleTransactionTypeAuthorization;
			if ((property_exists($objSoapObject, 'Role')) &&
				($objSoapObject->Role))
				$objToReturn->Role = Role::GetObjectFromSoapObject($objSoapObject->Role);
			if ((property_exists($objSoapObject, 'TransactionType')) &&
				($objSoapObject->TransactionType))
				$objToReturn->TransactionType = TransactionType::GetObjectFromSoapObject($objSoapObject->TransactionType);
			if ((property_exists($objSoapObject, 'AuthorizationLevel')) &&
				($objSoapObject->AuthorizationLevel))
				$objToReturn->AuthorizationLevel = AuthorizationLevel::GetObjectFromSoapObject($objSoapObject->AuthorizationLevel);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'CreationDate'))
				$objToReturn->dttCreationDate = new QDateTime($objSoapObject->CreationDate);
			if ((property_exists($objSoapObject, 'ModifiedByObject')) &&
				($objSoapObject->ModifiedByObject))
				$objToReturn->ModifiedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->ModifiedByObject);
			if (property_exists($objSoapObject, 'ModifiedDate'))
				$objToReturn->dttModifiedDate = new QDateTime($objSoapObject->ModifiedDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, RoleTransactionTypeAuthorization::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRole)
				$objObject->objRole = Role::GetSoapObjectFromObject($objObject->objRole, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRoleId = null;
			if ($objObject->objTransactionType)
				$objObject->objTransactionType = TransactionType::GetSoapObjectFromObject($objObject->objTransactionType, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransactionTypeId = null;
			if ($objObject->objAuthorizationLevel)
				$objObject->objAuthorizationLevel = AuthorizationLevel::GetSoapObjectFromObject($objObject->objAuthorizationLevel, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAuthorizationLevelId = null;
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
			if ($objObject->dttModifiedDate)
				$objObject->dttModifiedDate = $objObject->dttModifiedDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}
	}





	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeRoleTransactionTypeAuthorization extends QQNode {
		protected $strTableName = 'role_transaction_type_authorization';
		protected $strPrimaryKey = 'id_role_transaction_type_authorization';
		protected $strClassName = 'RoleTransactionTypeAuthorization';
		public function __get($strName) {
			switch ($strName) {
				case 'IdRoleTransactionTypeAuthorization':
					return new QQNode('id_role_transaction_type_authorization', 'integer', $this);
				case 'RoleId':
					return new QQNode('role_id', 'integer', $this);
				case 'Role':
					return new QQNodeRole('role_id', 'integer', $this);
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'integer', $this);
				case 'TransactionType':
					return new QQNodeTransactionType('transaction_type_id', 'integer', $this);
				case 'AuthorizationLevelId':
					return new QQNode('authorization_level_id', 'integer', $this);
				case 'AuthorizationLevel':
					return new QQNodeAuthorizationLevel('authorization_level_id', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id_role_transaction_type_authorization', 'integer', $this);
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

	class QQReverseReferenceNodeRoleTransactionTypeAuthorization extends QQReverseReferenceNode {
		protected $strTableName = 'role_transaction_type_authorization';
		protected $strPrimaryKey = 'id_role_transaction_type_authorization';
		protected $strClassName = 'RoleTransactionTypeAuthorization';
		public function __get($strName) {
			switch ($strName) {
				case 'IdRoleTransactionTypeAuthorization':
					return new QQNode('id_role_transaction_type_authorization', 'integer', $this);
				case 'RoleId':
					return new QQNode('role_id', 'integer', $this);
				case 'Role':
					return new QQNodeRole('role_id', 'integer', $this);
				case 'TransactionTypeId':
					return new QQNode('transaction_type_id', 'integer', $this);
				case 'TransactionType':
					return new QQNodeTransactionType('transaction_type_id', 'integer', $this);
				case 'AuthorizationLevelId':
					return new QQNode('authorization_level_id', 'integer', $this);
				case 'AuthorizationLevel':
					return new QQNodeAuthorizationLevel('authorization_level_id', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id_role_transaction_type_authorization', 'integer', $this);
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