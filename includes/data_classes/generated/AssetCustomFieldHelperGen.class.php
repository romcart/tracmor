<?php
	/**
	 * The abstract AssetCustomFieldHelperGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AssetCustomFieldHelper subclass which
	 * extends this AssetCustomFieldHelperGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AssetCustomFieldHelper class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetId the value for intAssetId (PK)
	 * @property string $Cfv1 the value for strCfv1 
	 * @property string $Cfv3 the value for strCfv3 
	 * @property Asset $Asset the value for the Asset object referenced by intAssetId (PK)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AssetCustomFieldHelperGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column asset_custom_field_helper.asset_id
		 * @var integer intAssetId
		 */
		protected $intAssetId;
		const AssetIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intAssetId;
		 */
		protected $__intAssetId;

		/**
		 * Protected member variable that maps to the database column asset_custom_field_helper.cfv_1
		 * @var string strCfv1
		 */
		protected $strCfv1;
		const Cfv1Default = null;


		/**
		 * Protected member variable that maps to the database column asset_custom_field_helper.cfv_3
		 * @var string strCfv3
		 */
		protected $strCfv3;
		const Cfv3Default = null;


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
		 * in the database column asset_custom_field_helper.asset_id.
		 *
		 * NOTE: Always use the Asset property getter to correctly retrieve this Asset object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Asset objAsset
		 */
		protected $objAsset;





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
		 * Load a AssetCustomFieldHelper from PK Info
		 * @param integer $intAssetId
		 * @return AssetCustomFieldHelper
		 */
		public static function Load($intAssetId) {
			// Use QuerySingle to Perform the Query
			return AssetCustomFieldHelper::QuerySingle(
				QQ::Equal(QQN::AssetCustomFieldHelper()->AssetId, $intAssetId)
			);
		}

		/**
		 * Load all AssetCustomFieldHelpers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetCustomFieldHelper[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AssetCustomFieldHelper::QueryArray to perform the LoadAll query
			try {
				return AssetCustomFieldHelper::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AssetCustomFieldHelpers
		 * @return int
		 */
		public static function CountAll() {
			// Call AssetCustomFieldHelper::QueryCount to perform the CountAll query
			return AssetCustomFieldHelper::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldHelper::GetDatabase();

			// Create/Build out the QueryBuilder object with AssetCustomFieldHelper-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asset_custom_field_helper');
			AssetCustomFieldHelper::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('asset_custom_field_helper');

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
		 * Static Qcodo Query method to query for a single AssetCustomFieldHelper object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetCustomFieldHelper the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new AssetCustomFieldHelper object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AssetCustomFieldHelper::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of AssetCustomFieldHelper objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetCustomFieldHelper[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AssetCustomFieldHelper::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of AssetCustomFieldHelper objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetCustomFieldHelper::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AssetCustomFieldHelper::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'asset_custom_field_helper_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AssetCustomFieldHelper-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AssetCustomFieldHelper::GetSelectFields($objQueryBuilder);
				AssetCustomFieldHelper::GetFromFields($objQueryBuilder);

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
			return AssetCustomFieldHelper::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AssetCustomFieldHelper
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asset_custom_field_helper';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_id', $strAliasPrefix . 'asset_id');
			$objBuilder->AddSelectItem($strTableName, 'cfv_1', $strAliasPrefix . 'cfv_1');
			$objBuilder->AddSelectItem($strTableName, 'cfv_3', $strAliasPrefix . 'cfv_3');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AssetCustomFieldHelper from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AssetCustomFieldHelper::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AssetCustomFieldHelper
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the AssetCustomFieldHelper object
			$objToReturn = new AssetCustomFieldHelper();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_id'] : $strAliasPrefix . 'asset_id';
			$objToReturn->intAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'cfv_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cfv_1'] : $strAliasPrefix . 'cfv_1';
			$objToReturn->strCfv1 = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'cfv_3', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cfv_3'] : $strAliasPrefix . 'cfv_3';
			$objToReturn->strCfv3 = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'asset_custom_field_helper__';

			// Check for Asset Early Binding
			$strAlias = $strAliasPrefix . 'asset_id__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of AssetCustomFieldHelpers from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AssetCustomFieldHelper[]
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
					$objItem = AssetCustomFieldHelper::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AssetCustomFieldHelper::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AssetCustomFieldHelper object,
		 * by AssetId Index(es)
		 * @param integer $intAssetId
		 * @return AssetCustomFieldHelper
		*/
		public static function LoadByAssetId($intAssetId) {
			return AssetCustomFieldHelper::QuerySingle(
				QQ::Equal(QQN::AssetCustomFieldHelper()->AssetId, $intAssetId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this AssetCustomFieldHelper
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldHelper::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asset_custom_field_helper` (
							`asset_id`,
							`cfv_1`,
							`cfv_3`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAssetId) . ',
							' . $objDatabase->SqlVariable($this->strCfv1) . ',
							' . $objDatabase->SqlVariable($this->strCfv3) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asset_custom_field_helper`
						SET
							`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . ',
							`cfv_1` = ' . $objDatabase->SqlVariable($this->strCfv1) . ',
							`cfv_3` = ' . $objDatabase->SqlVariable($this->strCfv3) . '
						WHERE
							`asset_id` = ' . $objDatabase->SqlVariable($this->__intAssetId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intAssetId = $this->intAssetId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this AssetCustomFieldHelper
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AssetCustomFieldHelper with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldHelper::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_helper`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '');
		}

		/**
		 * Delete all AssetCustomFieldHelpers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldHelper::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_helper`');
		}

		/**
		 * Truncate asset_custom_field_helper table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldHelper::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asset_custom_field_helper`');
		}

		/**
		 * Reload this AssetCustomFieldHelper from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AssetCustomFieldHelper object.');

			// Reload the Object
			$objReloaded = AssetCustomFieldHelper::Load($this->intAssetId);

			// Update $this's local variables to match
			$this->AssetId = $objReloaded->AssetId;
			$this->__intAssetId = $this->intAssetId;
			$this->strCfv1 = $objReloaded->strCfv1;
			$this->strCfv3 = $objReloaded->strCfv3;
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
				case 'AssetId':
					// Gets the value for intAssetId (PK)
					// @return integer
					return $this->intAssetId;

				case 'Cfv1':
					// Gets the value for strCfv1 
					// @return string
					return $this->strCfv1;

				case 'Cfv3':
					// Gets the value for strCfv3 
					// @return string
					return $this->strCfv3;


				///////////////////
				// Member Objects
				///////////////////
				case 'Asset':
					// Gets the value for the Asset object referenced by intAssetId (PK)
					// @return Asset
					try {
						if ((!$this->objAsset) && (!is_null($this->intAssetId)))
							$this->objAsset = Asset::Load($this->intAssetId);
						return $this->objAsset;
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
				case 'AssetId':
					// Sets the value for intAssetId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAsset = null;
						return ($this->intAssetId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cfv1':
					// Sets the value for strCfv1 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCfv1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cfv3':
					// Sets the value for strCfv3 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCfv3 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Asset':
					// Sets the value for the Asset object referenced by intAssetId (PK)
					// @param Asset $mixValue
					// @return Asset
					if (is_null($mixValue)) {
						$this->intAssetId = null;
						$this->objAsset = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Asset object
						try {
							$mixValue = QType::Cast($mixValue, 'Asset');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Asset object
						if (is_null($mixValue->AssetId))
							throw new QCallerException('Unable to set an unsaved Asset for this AssetCustomFieldHelper');

						// Update Local Member Variables
						$this->objAsset = $mixValue;
						$this->intAssetId = $mixValue->AssetId;

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
			$strToReturn = '<complexType name="AssetCustomFieldHelper"><sequence>';
			$strToReturn .= '<element name="Asset" type="xsd1:Asset"/>';
			$strToReturn .= '<element name="Cfv1" type="xsd:string"/>';
			$strToReturn .= '<element name="Cfv3" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AssetCustomFieldHelper', $strComplexTypeArray)) {
				$strComplexTypeArray['AssetCustomFieldHelper'] = AssetCustomFieldHelper::GetSoapComplexTypeXml();
				Asset::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AssetCustomFieldHelper::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AssetCustomFieldHelper();
			if ((property_exists($objSoapObject, 'Asset')) &&
				($objSoapObject->Asset))
				$objToReturn->Asset = Asset::GetObjectFromSoapObject($objSoapObject->Asset);
			if (property_exists($objSoapObject, 'Cfv1'))
				$objToReturn->strCfv1 = $objSoapObject->Cfv1;
			if (property_exists($objSoapObject, 'Cfv3'))
				$objToReturn->strCfv3 = $objSoapObject->Cfv3;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AssetCustomFieldHelper::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAsset)
				$objObject->objAsset = Asset::GetSoapObjectFromObject($objObject->objAsset, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssetId = null;
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
				$objQueryExpansion = new QQueryExpansion('AssetCustomFieldHelper', 'asset_custom_field_helper', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `asset_custom_field_helper` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_id` AS `%s__%s__asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`cfv_1` AS `%s__%s__cfv_1`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`cfv_3` AS `%s__%s__cfv_3`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'asset_id':
							try {
								Asset::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandAsset = 'asset_id';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeAssetCustomFieldHelper extends QQNode {
		protected $strTableName = 'asset_custom_field_helper';
		protected $strPrimaryKey = 'asset_id';
		protected $strClassName = 'AssetCustomFieldHelper';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'Asset':
					return new QQNodeAsset('asset_id', 'Asset', 'integer', $this);
				case 'Cfv1':
					return new QQNode('cfv_1', 'Cfv1', 'string', $this);
				case 'Cfv3':
					return new QQNode('cfv_3', 'Cfv3', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeAsset('asset_id', 'AssetId', 'integer', $this);
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

	class QQReverseReferenceNodeAssetCustomFieldHelper extends QQReverseReferenceNode {
		protected $strTableName = 'asset_custom_field_helper';
		protected $strPrimaryKey = 'asset_id';
		protected $strClassName = 'AssetCustomFieldHelper';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'Asset':
					return new QQNodeAsset('asset_id', 'Asset', 'integer', $this);
				case 'Cfv1':
					return new QQNode('cfv_1', 'Cfv1', 'string', $this);
				case 'Cfv3':
					return new QQNode('cfv_3', 'Cfv3', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeAsset('asset_id', 'AssetId', 'integer', $this);
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