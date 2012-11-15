<?php
	/**
	 * The abstract AssetGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Asset subclass which
	 * extends this AssetGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Asset class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetId the value for intAssetId (Read-Only PK)
	 * @property integer $ParentAssetId the value for intParentAssetId 
	 * @property integer $AssetModelId the value for intAssetModelId (Not Null)
	 * @property integer $LocationId the value for intLocationId 
	 * @property string $AssetCode the value for strAssetCode (Unique)
	 * @property string $ImagePath the value for strImagePath 
	 * @property boolean $CheckedOutFlag the value for blnCheckedOutFlag 
	 * @property boolean $ReservedFlag the value for blnReservedFlag 
	 * @property boolean $LinkedFlag the value for blnLinkedFlag 
	 * @property boolean $ArchivedFlag the value for blnArchivedFlag 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property boolean $DepreciationFlag the value for blnDepreciationFlag 
	 * @property QDateTime $PurchaseDate the value for dttPurchaseDate 
	 * @property double $PurchaseCost the value for fltPurchaseCost 
	 * @property Asset $ParentAsset the value for the Asset object referenced by intParentAssetId 
	 * @property AssetModel $AssetModel the value for the AssetModel object referenced by intAssetModelId (Not Null)
	 * @property Location $Location the value for the Location object referenced by intLocationId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property AssetCustomFieldHelper $AssetCustomFieldHelper the value for the AssetCustomFieldHelper object that uniquely references this Asset
	 * @property Asset $_ChildAsset the value for the private _objChildAsset (Read-Only) if set due to an expansion on the asset.parent_asset_id reverse relationship
	 * @property Asset[] $_ChildAssetArray the value for the private _objChildAssetArray (Read-Only) if set due to an ExpandAsArray on the asset.parent_asset_id reverse relationship
	 * @property AssetTransaction $_AssetTransaction the value for the private _objAssetTransaction (Read-Only) if set due to an expansion on the asset_transaction.asset_id reverse relationship
	 * @property AssetTransaction[] $_AssetTransactionArray the value for the private _objAssetTransactionArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction.asset_id reverse relationship
	 * @property AssetTransaction $_AssetTransactionAsNew the value for the private _objAssetTransactionAsNew (Read-Only) if set due to an expansion on the asset_transaction.new_asset_id reverse relationship
	 * @property AssetTransaction[] $_AssetTransactionAsNewArray the value for the private _objAssetTransactionAsNewArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction.new_asset_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AssetGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column asset.asset_id
		 * @var integer intAssetId
		 */
		protected $intAssetId;
		const AssetIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.parent_asset_id
		 * @var integer intParentAssetId
		 */
		protected $intParentAssetId;
		const ParentAssetIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.asset_model_id
		 * @var integer intAssetModelId
		 */
		protected $intAssetModelId;
		const AssetModelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.location_id
		 * @var integer intLocationId
		 */
		protected $intLocationId;
		const LocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.asset_code
		 * @var string strAssetCode
		 */
		protected $strAssetCode;
		const AssetCodeMaxLength = 50;
		const AssetCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.image_path
		 * @var string strImagePath
		 */
		protected $strImagePath;
		const ImagePathMaxLength = 255;
		const ImagePathDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.checked_out_flag
		 * @var boolean blnCheckedOutFlag
		 */
		protected $blnCheckedOutFlag;
		const CheckedOutFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.reserved_flag
		 * @var boolean blnReservedFlag
		 */
		protected $blnReservedFlag;
		const ReservedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.linked_flag
		 * @var boolean blnLinkedFlag
		 */
		protected $blnLinkedFlag;
		const LinkedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.archived_flag
		 * @var boolean blnArchivedFlag
		 */
		protected $blnArchivedFlag;
		const ArchivedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.depreciation_flag
		 * @var boolean blnDepreciationFlag
		 */
		protected $blnDepreciationFlag;
		const DepreciationFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.purchase_date
		 * @var QDateTime dttPurchaseDate
		 */
		protected $dttPurchaseDate;
		const PurchaseDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset.purchase_cost
		 * @var double fltPurchaseCost
		 */
		protected $fltPurchaseCost;
		const PurchaseCostDefault = null;


		/**
		 * Private member variable that stores a reference to a single ChildAsset object
		 * (of type Asset), if this Asset object was restored with
		 * an expansion on the asset association table.
		 * @var Asset _objChildAsset;
		 */
		private $_objChildAsset;

		/**
		 * Private member variable that stores a reference to an array of ChildAsset objects
		 * (of type Asset[]), if this Asset object was restored with
		 * an ExpandAsArray on the asset association table.
		 * @var Asset[] _objChildAssetArray;
		 */
		private $_objChildAssetArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransaction object
		 * (of type AssetTransaction), if this Asset object was restored with
		 * an expansion on the asset_transaction association table.
		 * @var AssetTransaction _objAssetTransaction;
		 */
		private $_objAssetTransaction;

		/**
		 * Private member variable that stores a reference to an array of AssetTransaction objects
		 * (of type AssetTransaction[]), if this Asset object was restored with
		 * an ExpandAsArray on the asset_transaction association table.
		 * @var AssetTransaction[] _objAssetTransactionArray;
		 */
		private $_objAssetTransactionArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransactionAsNew object
		 * (of type AssetTransaction), if this Asset object was restored with
		 * an expansion on the asset_transaction association table.
		 * @var AssetTransaction _objAssetTransactionAsNew;
		 */
		private $_objAssetTransactionAsNew;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionAsNew objects
		 * (of type AssetTransaction[]), if this Asset object was restored with
		 * an ExpandAsArray on the asset_transaction association table.
		 * @var AssetTransaction[] _objAssetTransactionAsNewArray;
		 */
		private $_objAssetTransactionAsNewArray = array();

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
		 * in the database column asset.parent_asset_id.
		 *
		 * NOTE: Always use the ParentAsset property getter to correctly retrieve this Asset object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Asset objParentAsset
		 */
		protected $objParentAsset;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset.asset_model_id.
		 *
		 * NOTE: Always use the AssetModel property getter to correctly retrieve this AssetModel object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetModel objAssetModel
		 */
		protected $objAssetModel;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset.location_id.
		 *
		 * NOTE: Always use the Location property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objLocation
		 */
		protected $objLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column asset_custom_field_helper.asset_id.
		 *
		 * NOTE: Always use the AssetCustomFieldHelper property getter to correctly retrieve this AssetCustomFieldHelper object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetCustomFieldHelper objAssetCustomFieldHelper
		 */
		protected $objAssetCustomFieldHelper;
		
		/**
		 * Used internally to manage whether the adjoined AssetCustomFieldHelper object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyAssetCustomFieldHelper;





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
		 * Load a Asset from PK Info
		 * @param integer $intAssetId
		 * @return Asset
		 */
		public static function Load($intAssetId) {
			// Use QuerySingle to Perform the Query
			return Asset::QuerySingle(
				QQ::Equal(QQN::Asset()->AssetId, $intAssetId)
			);
		}

		/**
		 * Load all Assets
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadAll query
			try {
				return Asset::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Assets
		 * @return int
		 */
		public static function CountAll() {
			// Call Asset::QueryCount to perform the CountAll query
			return Asset::QueryCount(QQ::All());
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
			$objDatabase = Asset::GetDatabase();

			// Create/Build out the QueryBuilder object with Asset-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asset');
			Asset::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('asset');

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
		 * Static Qcodo Query method to query for a single Asset object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Asset the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Asset::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Asset object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Asset::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Asset::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Asset objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Asset[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Asset::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Asset::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Asset::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Asset objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Asset::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Asset::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'asset_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Asset-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Asset::GetSelectFields($objQueryBuilder);
				Asset::GetFromFields($objQueryBuilder);

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
			return Asset::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Asset
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asset';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_id', $strAliasPrefix . 'asset_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_asset_id', $strAliasPrefix . 'parent_asset_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_model_id', $strAliasPrefix . 'asset_model_id');
			$objBuilder->AddSelectItem($strTableName, 'location_id', $strAliasPrefix . 'location_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_code', $strAliasPrefix . 'asset_code');
			$objBuilder->AddSelectItem($strTableName, 'image_path', $strAliasPrefix . 'image_path');
			$objBuilder->AddSelectItem($strTableName, 'checked_out_flag', $strAliasPrefix . 'checked_out_flag');
			$objBuilder->AddSelectItem($strTableName, 'reserved_flag', $strAliasPrefix . 'reserved_flag');
			$objBuilder->AddSelectItem($strTableName, 'linked_flag', $strAliasPrefix . 'linked_flag');
			$objBuilder->AddSelectItem($strTableName, 'archived_flag', $strAliasPrefix . 'archived_flag');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
			$objBuilder->AddSelectItem($strTableName, 'depreciation_flag', $strAliasPrefix . 'depreciation_flag');
			$objBuilder->AddSelectItem($strTableName, 'purchase_date', $strAliasPrefix . 'purchase_date');
			$objBuilder->AddSelectItem($strTableName, 'purchase_cost', $strAliasPrefix . 'purchase_cost');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Asset from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Asset::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Asset
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAssetId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'asset__';


				$strAlias = $strAliasPrefix . 'childasset__asset_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objChildAssetArray)) {
						$objPreviousChildItem = $objPreviousItem->_objChildAssetArray[$intPreviousChildItemCount - 1];
						$objChildItem = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childasset__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objChildAssetArray[] = $objChildItem;
					} else
						$objPreviousItem->_objChildAssetArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childasset__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransaction__asset_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransactionasnew__asset_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionAsNewArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionAsNewArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasnew__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionAsNewArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionAsNewArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasnew__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'asset__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Asset object
			$objToReturn = new Asset();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_id'] : $strAliasPrefix . 'asset_id';
			$objToReturn->intAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_asset_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_asset_id'] : $strAliasPrefix . 'parent_asset_id';
			$objToReturn->intParentAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_model_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_model_id'] : $strAliasPrefix . 'asset_model_id';
			$objToReturn->intAssetModelId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location_id'] : $strAliasPrefix . 'location_id';
			$objToReturn->intLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_code'] : $strAliasPrefix . 'asset_code';
			$objToReturn->strAssetCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'image_path', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'image_path'] : $strAliasPrefix . 'image_path';
			$objToReturn->strImagePath = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'checked_out_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'checked_out_flag'] : $strAliasPrefix . 'checked_out_flag';
			$objToReturn->blnCheckedOutFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'reserved_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'reserved_flag'] : $strAliasPrefix . 'reserved_flag';
			$objToReturn->blnReservedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'linked_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'linked_flag'] : $strAliasPrefix . 'linked_flag';
			$objToReturn->blnLinkedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'archived_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'archived_flag'] : $strAliasPrefix . 'archived_flag';
			$objToReturn->blnArchivedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_date'] : $strAliasPrefix . 'modified_date';
			$objToReturn->strModifiedDate = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'depreciation_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'depreciation_flag'] : $strAliasPrefix . 'depreciation_flag';
			$objToReturn->blnDepreciationFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'purchase_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'purchase_date'] : $strAliasPrefix . 'purchase_date';
			$objToReturn->dttPurchaseDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'purchase_cost', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'purchase_cost'] : $strAliasPrefix . 'purchase_cost';
			$objToReturn->fltPurchaseCost = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'asset__';

			// Check for ParentAsset Early Binding
			$strAlias = $strAliasPrefix . 'parent_asset_id__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_asset_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for AssetModel Early Binding
			$strAlias = $strAliasPrefix . 'asset_model_id__asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAssetModel = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset_model_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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


			// Check for AssetCustomFieldHelper Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'assetcustomfieldhelper__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objAssetCustomFieldHelper = AssetCustomFieldHelper::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetcustomfieldhelper__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objAssetCustomFieldHelper = false;
			}



			// Check for ChildAsset Virtual Binding
			$strAlias = $strAliasPrefix . 'childasset__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objChildAssetArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childasset__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objChildAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childasset__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransaction Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransaction__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransaction = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransactionAsNew Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactionasnew__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionAsNewArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasnew__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionAsNew = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasnew__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Assets from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Asset[]
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
					$objItem = Asset::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Asset::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Asset object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Asset next row resulting from the query
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
			return Asset::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Asset object,
		 * by AssetId Index(es)
		 * @param integer $intAssetId
		 * @return Asset
		*/
		public static function LoadByAssetId($intAssetId, $objOptionalClauses = null) {
			return Asset::QuerySingle(
				QQ::Equal(QQN::Asset()->AssetId, $intAssetId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single Asset object,
		 * by AssetCode Index(es)
		 * @param string $strAssetCode
		 * @return Asset
		*/
		public static function LoadByAssetCode($strAssetCode, $objOptionalClauses = null) {
			return Asset::QuerySingle(
				QQ::Equal(QQN::Asset()->AssetCode, $strAssetCode)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Asset objects,
		 * by AssetModelId Index(es)
		 * @param integer $intAssetModelId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/
		public static function LoadArrayByAssetModelId($intAssetModelId, $objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadArrayByAssetModelId query
			try {
				return Asset::QueryArray(
					QQ::Equal(QQN::Asset()->AssetModelId, $intAssetModelId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Assets
		 * by AssetModelId Index(es)
		 * @param integer $intAssetModelId
		 * @return int
		*/
		public static function CountByAssetModelId($intAssetModelId, $objOptionalClauses = null) {
			// Call Asset::QueryCount to perform the CountByAssetModelId query
			return Asset::QueryCount(
				QQ::Equal(QQN::Asset()->AssetModelId, $intAssetModelId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Asset objects,
		 * by LocationId Index(es)
		 * @param integer $intLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/
		public static function LoadArrayByLocationId($intLocationId, $objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadArrayByLocationId query
			try {
				return Asset::QueryArray(
					QQ::Equal(QQN::Asset()->LocationId, $intLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Assets
		 * by LocationId Index(es)
		 * @param integer $intLocationId
		 * @return int
		*/
		public static function CountByLocationId($intLocationId, $objOptionalClauses = null) {
			// Call Asset::QueryCount to perform the CountByLocationId query
			return Asset::QueryCount(
				QQ::Equal(QQN::Asset()->LocationId, $intLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Asset objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Asset::QueryArray(
					QQ::Equal(QQN::Asset()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Assets
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Asset::QueryCount to perform the CountByCreatedBy query
			return Asset::QueryCount(
				QQ::Equal(QQN::Asset()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Asset objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Asset::QueryArray(
					QQ::Equal(QQN::Asset()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Assets
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Asset::QueryCount to perform the CountByModifiedBy query
			return Asset::QueryCount(
				QQ::Equal(QQN::Asset()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Asset objects,
		 * by ParentAssetId Index(es)
		 * @param integer $intParentAssetId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/
		public static function LoadArrayByParentAssetId($intParentAssetId, $objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadArrayByParentAssetId query
			try {
				return Asset::QueryArray(
					QQ::Equal(QQN::Asset()->ParentAssetId, $intParentAssetId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Assets
		 * by ParentAssetId Index(es)
		 * @param integer $intParentAssetId
		 * @return int
		*/
		public static function CountByParentAssetId($intParentAssetId, $objOptionalClauses = null) {
			// Call Asset::QueryCount to perform the CountByParentAssetId query
			return Asset::QueryCount(
				QQ::Equal(QQN::Asset()->ParentAssetId, $intParentAssetId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Asset objects,
		 * by ParentAssetId, LinkedFlag Index(es)
		 * @param integer $intParentAssetId
		 * @param boolean $blnLinkedFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/
		public static function LoadArrayByParentAssetIdLinkedFlag($intParentAssetId, $blnLinkedFlag, $objOptionalClauses = null) {
			// Call Asset::QueryArray to perform the LoadArrayByParentAssetIdLinkedFlag query
			try {
				return Asset::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Asset()->ParentAssetId, $intParentAssetId),
					QQ::Equal(QQN::Asset()->LinkedFlag, $blnLinkedFlag)
					),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Assets
		 * by ParentAssetId, LinkedFlag Index(es)
		 * @param integer $intParentAssetId
		 * @param boolean $blnLinkedFlag
		 * @return int
		*/
		public static function CountByParentAssetIdLinkedFlag($intParentAssetId, $blnLinkedFlag, $objOptionalClauses = null) {
			// Call Asset::QueryCount to perform the CountByParentAssetIdLinkedFlag query
			return Asset::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Asset()->ParentAssetId, $intParentAssetId),
				QQ::Equal(QQN::Asset()->LinkedFlag, $blnLinkedFlag)
				)
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
		 * Save this Asset
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asset` (
							`parent_asset_id`,
							`asset_model_id`,
							`location_id`,
							`asset_code`,
							`image_path`,
							`checked_out_flag`,
							`reserved_flag`,
							`linked_flag`,
							`archived_flag`,
							`created_by`,
							`creation_date`,
							`modified_by`,
							`depreciation_flag`,
							`purchase_date`,
							`purchase_cost`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intParentAssetId) . ',
							' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
							' . $objDatabase->SqlVariable($this->intLocationId) . ',
							' . $objDatabase->SqlVariable($this->strAssetCode) . ',
							' . $objDatabase->SqlVariable($this->strImagePath) . ',
							' . $objDatabase->SqlVariable($this->blnCheckedOutFlag) . ',
							' . $objDatabase->SqlVariable($this->blnReservedFlag) . ',
							' . $objDatabase->SqlVariable($this->blnLinkedFlag) . ',
							' . $objDatabase->SqlVariable($this->blnArchivedFlag) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							' . $objDatabase->SqlVariable($this->blnDepreciationFlag) . ',
							' . $objDatabase->SqlVariable($this->dttPurchaseDate) . ',
							' . $objDatabase->SqlVariable($this->fltPurchaseCost) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAssetId = $objDatabase->InsertId('asset', 'asset_id');

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
								`asset`
							WHERE
								`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('Asset');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asset`
						SET
							`parent_asset_id` = ' . $objDatabase->SqlVariable($this->intParentAssetId) . ',
							`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
							`location_id` = ' . $objDatabase->SqlVariable($this->intLocationId) . ',
							`asset_code` = ' . $objDatabase->SqlVariable($this->strAssetCode) . ',
							`image_path` = ' . $objDatabase->SqlVariable($this->strImagePath) . ',
							`checked_out_flag` = ' . $objDatabase->SqlVariable($this->blnCheckedOutFlag) . ',
							`reserved_flag` = ' . $objDatabase->SqlVariable($this->blnReservedFlag) . ',
							`linked_flag` = ' . $objDatabase->SqlVariable($this->blnLinkedFlag) . ',
							`archived_flag` = ' . $objDatabase->SqlVariable($this->blnArchivedFlag) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							`depreciation_flag` = ' . $objDatabase->SqlVariable($this->blnDepreciationFlag) . ',
							`purchase_date` = ' . $objDatabase->SqlVariable($this->dttPurchaseDate) . ',
							`purchase_cost` = ' . $objDatabase->SqlVariable($this->fltPurchaseCost) . '
						WHERE
							`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined AssetCustomFieldHelper object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyAssetCustomFieldHelper) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = AssetCustomFieldHelper::LoadByAssetId($this->intAssetId)) {
						$objAssociated->AssetId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objAssetCustomFieldHelper) {
						$this->objAssetCustomFieldHelper->AssetId = $this->intAssetId;
						$this->objAssetCustomFieldHelper->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyAssetCustomFieldHelper = false;
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
					`asset`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Asset
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Asset with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			
			
			// Update the adjoined AssetCustomFieldHelper object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = AssetCustomFieldHelper::LoadByAssetId($this->intAssetId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Assets
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`');
		}

		/**
		 * Truncate asset table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asset`');
		}

		/**
		 * Reload this Asset from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Asset object.');

			// Reload the Object
			$objReloaded = Asset::Load($this->intAssetId);

			// Update $this's local variables to match
			$this->ParentAssetId = $objReloaded->ParentAssetId;
			$this->AssetModelId = $objReloaded->AssetModelId;
			$this->LocationId = $objReloaded->LocationId;
			$this->strAssetCode = $objReloaded->strAssetCode;
			$this->strImagePath = $objReloaded->strImagePath;
			$this->blnCheckedOutFlag = $objReloaded->blnCheckedOutFlag;
			$this->blnReservedFlag = $objReloaded->blnReservedFlag;
			$this->blnLinkedFlag = $objReloaded->blnLinkedFlag;
			$this->blnArchivedFlag = $objReloaded->blnArchivedFlag;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModifiedDate = $objReloaded->strModifiedDate;
			$this->blnDepreciationFlag = $objReloaded->blnDepreciationFlag;
			$this->dttPurchaseDate = $objReloaded->dttPurchaseDate;
			$this->fltPurchaseCost = $objReloaded->fltPurchaseCost;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Asset::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `asset` (
					`asset_id`,
					`parent_asset_id`,
					`asset_model_id`,
					`location_id`,
					`asset_code`,
					`image_path`,
					`checked_out_flag`,
					`reserved_flag`,
					`linked_flag`,
					`archived_flag`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					`depreciation_flag`,
					`purchase_date`,
					`purchase_cost`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAssetId) . ',
					' . $objDatabase->SqlVariable($this->intParentAssetId) . ',
					' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
					' . $objDatabase->SqlVariable($this->intLocationId) . ',
					' . $objDatabase->SqlVariable($this->strAssetCode) . ',
					' . $objDatabase->SqlVariable($this->strImagePath) . ',
					' . $objDatabase->SqlVariable($this->blnCheckedOutFlag) . ',
					' . $objDatabase->SqlVariable($this->blnReservedFlag) . ',
					' . $objDatabase->SqlVariable($this->blnLinkedFlag) . ',
					' . $objDatabase->SqlVariable($this->blnArchivedFlag) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
					' . $objDatabase->SqlVariable($this->blnDepreciationFlag) . ',
					' . $objDatabase->SqlVariable($this->dttPurchaseDate) . ',
					' . $objDatabase->SqlVariable($this->fltPurchaseCost) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAssetId
		 * @return Asset[]
		 */
		public static function GetJournalForId($intAssetId) {
			$objDatabase = Asset::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM asset WHERE asset_id = ' .
				$objDatabase->SqlVariable($intAssetId) . ' ORDER BY __sys_date');

			return Asset::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Asset[]
		 */
		public function GetJournal() {
			return Asset::GetJournalForId($this->intAssetId);
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
					// Gets the value for intAssetId (Read-Only PK)
					// @return integer
					return $this->intAssetId;

				case 'ParentAssetId':
					// Gets the value for intParentAssetId 
					// @return integer
					return $this->intParentAssetId;

				case 'AssetModelId':
					// Gets the value for intAssetModelId (Not Null)
					// @return integer
					return $this->intAssetModelId;

				case 'LocationId':
					// Gets the value for intLocationId 
					// @return integer
					return $this->intLocationId;

				case 'AssetCode':
					// Gets the value for strAssetCode (Unique)
					// @return string
					return $this->strAssetCode;

				case 'ImagePath':
					// Gets the value for strImagePath 
					// @return string
					return $this->strImagePath;

				case 'CheckedOutFlag':
					// Gets the value for blnCheckedOutFlag 
					// @return boolean
					return $this->blnCheckedOutFlag;

				case 'ReservedFlag':
					// Gets the value for blnReservedFlag 
					// @return boolean
					return $this->blnReservedFlag;

				case 'LinkedFlag':
					// Gets the value for blnLinkedFlag 
					// @return boolean
					return $this->blnLinkedFlag;

				case 'ArchivedFlag':
					// Gets the value for blnArchivedFlag 
					// @return boolean
					return $this->blnArchivedFlag;

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

				case 'DepreciationFlag':
					// Gets the value for blnDepreciationFlag 
					// @return boolean
					return $this->blnDepreciationFlag;

				case 'PurchaseDate':
					// Gets the value for dttPurchaseDate 
					// @return QDateTime
					return $this->dttPurchaseDate;

				case 'PurchaseCost':
					// Gets the value for fltPurchaseCost 
					// @return double
					return $this->fltPurchaseCost;


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentAsset':
					// Gets the value for the Asset object referenced by intParentAssetId 
					// @return Asset
					try {
						if ((!$this->objParentAsset) && (!is_null($this->intParentAssetId)))
							$this->objParentAsset = Asset::Load($this->intParentAssetId);
						return $this->objParentAsset;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Location':
					// Gets the value for the Location object referenced by intLocationId 
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

		
		
				case 'AssetCustomFieldHelper':
					// Gets the value for the AssetCustomFieldHelper object that uniquely references this Asset
					// by objAssetCustomFieldHelper (Unique)
					// @return AssetCustomFieldHelper
					try {
						if ($this->objAssetCustomFieldHelper === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objAssetCustomFieldHelper)
							$this->objAssetCustomFieldHelper = AssetCustomFieldHelper::LoadByAssetId($this->intAssetId);
						return $this->objAssetCustomFieldHelper;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ChildAsset':
					// Gets the value for the private _objChildAsset (Read-Only)
					// if set due to an expansion on the asset.parent_asset_id reverse relationship
					// @return Asset
					return $this->_objChildAsset;

				case '_ChildAssetArray':
					// Gets the value for the private _objChildAssetArray (Read-Only)
					// if set due to an ExpandAsArray on the asset.parent_asset_id reverse relationship
					// @return Asset[]
					return (array) $this->_objChildAssetArray;

				case '_AssetTransaction':
					// Gets the value for the private _objAssetTransaction (Read-Only)
					// if set due to an expansion on the asset_transaction.asset_id reverse relationship
					// @return AssetTransaction
					return $this->_objAssetTransaction;

				case '_AssetTransactionArray':
					// Gets the value for the private _objAssetTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction.asset_id reverse relationship
					// @return AssetTransaction[]
					return (array) $this->_objAssetTransactionArray;

				case '_AssetTransactionAsNew':
					// Gets the value for the private _objAssetTransactionAsNew (Read-Only)
					// if set due to an expansion on the asset_transaction.new_asset_id reverse relationship
					// @return AssetTransaction
					return $this->_objAssetTransactionAsNew;

				case '_AssetTransactionAsNewArray':
					// Gets the value for the private _objAssetTransactionAsNewArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction.new_asset_id reverse relationship
					// @return AssetTransaction[]
					return (array) $this->_objAssetTransactionAsNewArray;


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
				case 'ParentAssetId':
					// Sets the value for intParentAssetId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentAsset = null;
						return ($this->intParentAssetId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'LocationId':
					// Sets the value for intLocationId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLocation = null;
						return ($this->intLocationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AssetCode':
					// Sets the value for strAssetCode (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAssetCode = QType::Cast($mixValue, QType::String));
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

				case 'CheckedOutFlag':
					// Sets the value for blnCheckedOutFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCheckedOutFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReservedFlag':
					// Sets the value for blnReservedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnReservedFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LinkedFlag':
					// Sets the value for blnLinkedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnLinkedFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ArchivedFlag':
					// Sets the value for blnArchivedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnArchivedFlag = QType::Cast($mixValue, QType::Boolean));
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

				case 'DepreciationFlag':
					// Sets the value for blnDepreciationFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnDepreciationFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PurchaseDate':
					// Sets the value for dttPurchaseDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttPurchaseDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PurchaseCost':
					// Sets the value for fltPurchaseCost 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltPurchaseCost = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentAsset':
					// Sets the value for the Asset object referenced by intParentAssetId 
					// @param Asset $mixValue
					// @return Asset
					if (is_null($mixValue)) {
						$this->intParentAssetId = null;
						$this->objParentAsset = null;
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
							throw new QCallerException('Unable to set an unsaved ParentAsset for this Asset');

						// Update Local Member Variables
						$this->objParentAsset = $mixValue;
						$this->intParentAssetId = $mixValue->AssetId;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved AssetModel for this Asset');

						// Update Local Member Variables
						$this->objAssetModel = $mixValue;
						$this->intAssetModelId = $mixValue->AssetModelId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Location':
					// Sets the value for the Location object referenced by intLocationId 
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
							throw new QCallerException('Unable to set an unsaved Location for this Asset');

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Asset');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Asset');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AssetCustomFieldHelper':
					// Sets the value for the AssetCustomFieldHelper object referenced by objAssetCustomFieldHelper (Unique)
					// @param AssetCustomFieldHelper $mixValue
					// @return AssetCustomFieldHelper
					if (is_null($mixValue)) {
						$this->objAssetCustomFieldHelper = null;

						// Make sure we update the adjoined AssetCustomFieldHelper object the next time we call Save()
						$this->blnDirtyAssetCustomFieldHelper = true;

						return null;
					} else {
						// Make sure $mixValue actually is a AssetCustomFieldHelper object
						try {
							$mixValue = QType::Cast($mixValue, 'AssetCustomFieldHelper');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objAssetCustomFieldHelper to a DIFFERENT $mixValue?
						if ((!$this->AssetCustomFieldHelper) || ($this->AssetCustomFieldHelper->AssetId != $mixValue->AssetId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined AssetCustomFieldHelper object the next time we call Save()
							$this->blnDirtyAssetCustomFieldHelper = true;

							// Update Local Member Variable
							$this->objAssetCustomFieldHelper = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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

			
		
		// Related Objects' Methods for ChildAsset
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChildAssets as an array of Asset objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/ 
		public function GetChildAssetArray($objOptionalClauses = null) {
			if ((is_null($this->intAssetId)))
				return array();

			try {
				return Asset::LoadArrayByParentAssetId($this->intAssetId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChildAssets
		 * @return int
		*/ 
		public function CountChildAssets() {
			if ((is_null($this->intAssetId)))
				return 0;

			return Asset::CountByParentAssetId($this->intAssetId);
		}

		/**
		 * Associates a ChildAsset
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function AssociateChildAsset(Asset $objAsset) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildAsset on this unsaved Asset.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildAsset on this Asset with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`parent_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAsset->ParentAssetId = $this->intAssetId;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ChildAsset
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function UnassociateChildAsset(Asset $objAsset) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAsset on this unsaved Asset.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAsset on this Asset with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`parent_asset_id` = null
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`parent_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->ParentAssetId = null;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ChildAssets
		 * @return void
		*/ 
		public function UnassociateAllChildAssets() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAsset on this unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByParentAssetId($this->intAssetId) as $objAsset) {
					$objAsset->ParentAssetId = null;
					$objAsset->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`parent_asset_id` = null
				WHERE
					`parent_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
		}

		/**
		 * Deletes an associated ChildAsset
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function DeleteAssociatedChildAsset(Asset $objAsset) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAsset on this unsaved Asset.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAsset on this Asset with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`parent_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ChildAssets
		 * @return void
		*/ 
		public function DeleteAllChildAssets() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildAsset on this unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByParentAssetId($this->intAssetId) as $objAsset) {
					$objAsset->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`parent_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactions as an array of AssetTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/ 
		public function GetAssetTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intAssetId)))
				return array();

			try {
				return AssetTransaction::LoadArrayByAssetId($this->intAssetId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactions
		 * @return int
		*/ 
		public function CountAssetTransactions() {
			if ((is_null($this->intAssetId)))
				return 0;

			return AssetTransaction::CountByAssetId($this->intAssetId);
		}

		/**
		 * Associates a AssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function AssociateAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransaction on this unsaved Asset.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransaction on this Asset with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->AssetId = $this->intAssetId;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function UnassociateAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Asset.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this Asset with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`asset_id` = null
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->AssetId = null;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactions
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactions() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByAssetId($this->intAssetId) as $objAssetTransaction) {
					$objAssetTransaction->AssetId = null;
					$objAssetTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`asset_id` = null
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransaction
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransaction(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Asset.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this Asset with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactions
		 * @return void
		*/ 
		public function DeleteAllAssetTransactions() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransaction on this unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByAssetId($this->intAssetId) as $objAssetTransaction) {
					$objAssetTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransactionAsNew
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionsAsNew as an array of AssetTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/ 
		public function GetAssetTransactionAsNewArray($objOptionalClauses = null) {
			if ((is_null($this->intAssetId)))
				return array();

			try {
				return AssetTransaction::LoadArrayByNewAssetId($this->intAssetId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionsAsNew
		 * @return int
		*/ 
		public function CountAssetTransactionsAsNew() {
			if ((is_null($this->intAssetId)))
				return 0;

			return AssetTransaction::CountByNewAssetId($this->intAssetId);
		}

		/**
		 * Associates a AssetTransactionAsNew
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function AssociateAssetTransactionAsNew(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionAsNew on this unsaved Asset.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionAsNew on this Asset with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`new_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->NewAssetId = $this->intAssetId;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionAsNew
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function UnassociateAssetTransactionAsNew(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsNew on this unsaved Asset.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsNew on this Asset with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`new_asset_id` = null
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`new_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->NewAssetId = null;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionsAsNew
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionsAsNew() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsNew on this unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByNewAssetId($this->intAssetId) as $objAssetTransaction) {
					$objAssetTransaction->NewAssetId = null;
					$objAssetTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`new_asset_id` = null
				WHERE
					`new_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionAsNew
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionAsNew(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsNew on this unsaved Asset.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsNew on this Asset with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`new_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionsAsNew
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionsAsNew() {
			if ((is_null($this->intAssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsNew on this unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = Asset::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByNewAssetId($this->intAssetId) as $objAssetTransaction) {
					$objAssetTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`new_asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Asset"><sequence>';
			$strToReturn .= '<element name="AssetId" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentAsset" type="xsd1:Asset"/>';
			$strToReturn .= '<element name="AssetModel" type="xsd1:AssetModel"/>';
			$strToReturn .= '<element name="Location" type="xsd1:Location"/>';
			$strToReturn .= '<element name="AssetCode" type="xsd:string"/>';
			$strToReturn .= '<element name="ImagePath" type="xsd:string"/>';
			$strToReturn .= '<element name="CheckedOutFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ReservedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="LinkedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ArchivedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="DepreciationFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PurchaseDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="PurchaseCost" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Asset', $strComplexTypeArray)) {
				$strComplexTypeArray['Asset'] = Asset::GetSoapComplexTypeXml();
				Asset::AlterSoapComplexTypeArray($strComplexTypeArray);
				AssetModel::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Asset::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Asset();
			if (property_exists($objSoapObject, 'AssetId'))
				$objToReturn->intAssetId = $objSoapObject->AssetId;
			if ((property_exists($objSoapObject, 'ParentAsset')) &&
				($objSoapObject->ParentAsset))
				$objToReturn->ParentAsset = Asset::GetObjectFromSoapObject($objSoapObject->ParentAsset);
			if ((property_exists($objSoapObject, 'AssetModel')) &&
				($objSoapObject->AssetModel))
				$objToReturn->AssetModel = AssetModel::GetObjectFromSoapObject($objSoapObject->AssetModel);
			if ((property_exists($objSoapObject, 'Location')) &&
				($objSoapObject->Location))
				$objToReturn->Location = Location::GetObjectFromSoapObject($objSoapObject->Location);
			if (property_exists($objSoapObject, 'AssetCode'))
				$objToReturn->strAssetCode = $objSoapObject->AssetCode;
			if (property_exists($objSoapObject, 'ImagePath'))
				$objToReturn->strImagePath = $objSoapObject->ImagePath;
			if (property_exists($objSoapObject, 'CheckedOutFlag'))
				$objToReturn->blnCheckedOutFlag = $objSoapObject->CheckedOutFlag;
			if (property_exists($objSoapObject, 'ReservedFlag'))
				$objToReturn->blnReservedFlag = $objSoapObject->ReservedFlag;
			if (property_exists($objSoapObject, 'LinkedFlag'))
				$objToReturn->blnLinkedFlag = $objSoapObject->LinkedFlag;
			if (property_exists($objSoapObject, 'ArchivedFlag'))
				$objToReturn->blnArchivedFlag = $objSoapObject->ArchivedFlag;
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
			if (property_exists($objSoapObject, 'DepreciationFlag'))
				$objToReturn->blnDepreciationFlag = $objSoapObject->DepreciationFlag;
			if (property_exists($objSoapObject, 'PurchaseDate'))
				$objToReturn->dttPurchaseDate = new QDateTime($objSoapObject->PurchaseDate);
			if (property_exists($objSoapObject, 'PurchaseCost'))
				$objToReturn->fltPurchaseCost = $objSoapObject->PurchaseCost;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Asset::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objParentAsset)
				$objObject->objParentAsset = Asset::GetSoapObjectFromObject($objObject->objParentAsset, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentAssetId = null;
			if ($objObject->objAssetModel)
				$objObject->objAssetModel = AssetModel::GetSoapObjectFromObject($objObject->objAssetModel, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssetModelId = null;
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
			if ($objObject->dttPurchaseDate)
				$objObject->dttPurchaseDate = $objObject->dttPurchaseDate->__toString(QDateTime::FormatSoap);
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
				$objQueryExpansion = new QQueryExpansion('Asset', 'asset', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `asset` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_id` AS `%s__%s__asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`parent_asset_id` AS `%s__%s__parent_asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_model_id` AS `%s__%s__asset_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`location_id` AS `%s__%s__location_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_code` AS `%s__%s__asset_code`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`image_path` AS `%s__%s__image_path`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`checked_out_flag` AS `%s__%s__checked_out_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`reserved_flag` AS `%s__%s__reserved_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`linked_flag` AS `%s__%s__linked_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`archived_flag` AS `%s__%s__archived_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`depreciation_flag` AS `%s__%s__depreciation_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`purchase_date` AS `%s__%s__purchase_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`purchase_cost` AS `%s__%s__purchase_cost`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'parent_asset_id':
							try {
								Asset::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'asset_model_id':
							try {
								AssetModel::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandParentAsset = 'parent_asset_id';
		const ExpandAssetModel = 'asset_model_id';
		const ExpandLocation = 'location_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AssetId
	 * @property-read QQNode $ParentAssetId
	 * @property-read QQNodeAsset $ParentAsset
	 * @property-read QQNode $AssetModelId
	 * @property-read QQNodeAssetModel $AssetModel
	 * @property-read QQNode $LocationId
	 * @property-read QQNodeLocation $Location
	 * @property-read QQNode $AssetCode
	 * @property-read QQNode $ImagePath
	 * @property-read QQNode $CheckedOutFlag
	 * @property-read QQNode $ReservedFlag
	 * @property-read QQNode $LinkedFlag
	 * @property-read QQNode $ArchivedFlag
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $DepreciationFlag
	 * @property-read QQNode $PurchaseDate
	 * @property-read QQNode $PurchaseCost
	 * @property-read QQReverseReferenceNodeAsset $ChildAsset
	 * @property-read QQReverseReferenceNodeAssetCustomFieldHelper $AssetCustomFieldHelper
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransaction
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransactionAsNew
	 */
	class QQNodeAsset extends QQNode {
		protected $strTableName = 'asset';
		protected $strPrimaryKey = 'asset_id';
		protected $strClassName = 'Asset';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'ParentAssetId':
					return new QQNode('parent_asset_id', 'ParentAssetId', 'integer', $this);
				case 'ParentAsset':
					return new QQNodeAsset('parent_asset_id', 'ParentAsset', 'integer', $this);
				case 'AssetModelId':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
				case 'AssetModel':
					return new QQNodeAssetModel('asset_model_id', 'AssetModel', 'integer', $this);
				case 'LocationId':
					return new QQNode('location_id', 'LocationId', 'integer', $this);
				case 'Location':
					return new QQNodeLocation('location_id', 'Location', 'integer', $this);
				case 'AssetCode':
					return new QQNode('asset_code', 'AssetCode', 'string', $this);
				case 'ImagePath':
					return new QQNode('image_path', 'ImagePath', 'string', $this);
				case 'CheckedOutFlag':
					return new QQNode('checked_out_flag', 'CheckedOutFlag', 'boolean', $this);
				case 'ReservedFlag':
					return new QQNode('reserved_flag', 'ReservedFlag', 'boolean', $this);
				case 'LinkedFlag':
					return new QQNode('linked_flag', 'LinkedFlag', 'boolean', $this);
				case 'ArchivedFlag':
					return new QQNode('archived_flag', 'ArchivedFlag', 'boolean', $this);
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
				case 'DepreciationFlag':
					return new QQNode('depreciation_flag', 'DepreciationFlag', 'boolean', $this);
				case 'PurchaseDate':
					return new QQNode('purchase_date', 'PurchaseDate', 'QDateTime', $this);
				case 'PurchaseCost':
					return new QQNode('purchase_cost', 'PurchaseCost', 'double', $this);
				case 'ChildAsset':
					return new QQReverseReferenceNodeAsset($this, 'childasset', 'reverse_reference', 'parent_asset_id');
				case 'AssetCustomFieldHelper':
					return new QQReverseReferenceNodeAssetCustomFieldHelper($this, 'assetcustomfieldhelper', 'reverse_reference', 'asset_id', 'AssetCustomFieldHelper');
				case 'AssetTransaction':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransaction', 'reverse_reference', 'asset_id');
				case 'AssetTransactionAsNew':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransactionasnew', 'reverse_reference', 'new_asset_id');

				case '_PrimaryKeyNode':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
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
	 * @property-read QQNode $AssetId
	 * @property-read QQNode $ParentAssetId
	 * @property-read QQNodeAsset $ParentAsset
	 * @property-read QQNode $AssetModelId
	 * @property-read QQNodeAssetModel $AssetModel
	 * @property-read QQNode $LocationId
	 * @property-read QQNodeLocation $Location
	 * @property-read QQNode $AssetCode
	 * @property-read QQNode $ImagePath
	 * @property-read QQNode $CheckedOutFlag
	 * @property-read QQNode $ReservedFlag
	 * @property-read QQNode $LinkedFlag
	 * @property-read QQNode $ArchivedFlag
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $DepreciationFlag
	 * @property-read QQNode $PurchaseDate
	 * @property-read QQNode $PurchaseCost
	 * @property-read QQReverseReferenceNodeAsset $ChildAsset
	 * @property-read QQReverseReferenceNodeAssetCustomFieldHelper $AssetCustomFieldHelper
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransaction
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransactionAsNew
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAsset extends QQReverseReferenceNode {
		protected $strTableName = 'asset';
		protected $strPrimaryKey = 'asset_id';
		protected $strClassName = 'Asset';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'ParentAssetId':
					return new QQNode('parent_asset_id', 'ParentAssetId', 'integer', $this);
				case 'ParentAsset':
					return new QQNodeAsset('parent_asset_id', 'ParentAsset', 'integer', $this);
				case 'AssetModelId':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
				case 'AssetModel':
					return new QQNodeAssetModel('asset_model_id', 'AssetModel', 'integer', $this);
				case 'LocationId':
					return new QQNode('location_id', 'LocationId', 'integer', $this);
				case 'Location':
					return new QQNodeLocation('location_id', 'Location', 'integer', $this);
				case 'AssetCode':
					return new QQNode('asset_code', 'AssetCode', 'string', $this);
				case 'ImagePath':
					return new QQNode('image_path', 'ImagePath', 'string', $this);
				case 'CheckedOutFlag':
					return new QQNode('checked_out_flag', 'CheckedOutFlag', 'boolean', $this);
				case 'ReservedFlag':
					return new QQNode('reserved_flag', 'ReservedFlag', 'boolean', $this);
				case 'LinkedFlag':
					return new QQNode('linked_flag', 'LinkedFlag', 'boolean', $this);
				case 'ArchivedFlag':
					return new QQNode('archived_flag', 'ArchivedFlag', 'boolean', $this);
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
				case 'DepreciationFlag':
					return new QQNode('depreciation_flag', 'DepreciationFlag', 'boolean', $this);
				case 'PurchaseDate':
					return new QQNode('purchase_date', 'PurchaseDate', 'QDateTime', $this);
				case 'PurchaseCost':
					return new QQNode('purchase_cost', 'PurchaseCost', 'double', $this);
				case 'ChildAsset':
					return new QQReverseReferenceNodeAsset($this, 'childasset', 'reverse_reference', 'parent_asset_id');
				case 'AssetCustomFieldHelper':
					return new QQReverseReferenceNodeAssetCustomFieldHelper($this, 'assetcustomfieldhelper', 'reverse_reference', 'asset_id', 'AssetCustomFieldHelper');
				case 'AssetTransaction':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransaction', 'reverse_reference', 'asset_id');
				case 'AssetTransactionAsNew':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransactionasnew', 'reverse_reference', 'new_asset_id');

				case '_PrimaryKeyNode':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
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