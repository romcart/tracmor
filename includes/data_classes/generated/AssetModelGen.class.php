<?php
	/**
	 * The abstract AssetModelGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AssetModel subclass which
	 * extends this AssetModelGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AssetModel class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetModelId the value for intAssetModelId (Read-Only PK)
	 * @property integer $CategoryId the value for intCategoryId 
	 * @property integer $ManufacturerId the value for intManufacturerId 
	 * @property string $AssetModelCode the value for strAssetModelCode 
	 * @property string $ShortDescription the value for strShortDescription (Not Null)
	 * @property string $LongDescription the value for strLongDescription 
	 * @property string $ImagePath the value for strImagePath 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property integer $DepreciationClassId the value for intDepreciationClassId 
	 * @property Category $Category the value for the Category object referenced by intCategoryId 
	 * @property Manufacturer $Manufacturer the value for the Manufacturer object referenced by intManufacturerId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property DepreciationClass $DepreciationClass the value for the DepreciationClass object referenced by intDepreciationClassId 
	 * @property AssetModelCustomFieldHelper $AssetModelCustomFieldHelper the value for the AssetModelCustomFieldHelper object that uniquely references this AssetModel
	 * @property Asset $_Asset the value for the private _objAsset (Read-Only) if set due to an expansion on the asset.asset_model_id reverse relationship
	 * @property Asset[] $_AssetArray the value for the private _objAssetArray (Read-Only) if set due to an ExpandAsArray on the asset.asset_model_id reverse relationship
	 * @property AssetCustomFieldAssetModel $_AssetCustomFieldAssetModel the value for the private _objAssetCustomFieldAssetModel (Read-Only) if set due to an expansion on the asset_custom_field_asset_model.asset_model_id reverse relationship
	 * @property AssetCustomFieldAssetModel[] $_AssetCustomFieldAssetModelArray the value for the private _objAssetCustomFieldAssetModelArray (Read-Only) if set due to an ExpandAsArray on the asset_custom_field_asset_model.asset_model_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AssetModelGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column asset_model.asset_model_id
		 * @var integer intAssetModelId
		 */
		protected $intAssetModelId;
		const AssetModelIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.category_id
		 * @var integer intCategoryId
		 */
		protected $intCategoryId;
		const CategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.manufacturer_id
		 * @var integer intManufacturerId
		 */
		protected $intManufacturerId;
		const ManufacturerIdDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.asset_model_code
		 * @var string strAssetModelCode
		 */
		protected $strAssetModelCode;
		const AssetModelCodeMaxLength = 50;
		const AssetModelCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.long_description
		 * @var string strLongDescription
		 */
		protected $strLongDescription;
		const LongDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.image_path
		 * @var string strImagePath
		 */
		protected $strImagePath;
		const ImagePathMaxLength = 255;
		const ImagePathDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Protected member variable that maps to the database column asset_model.depreciation_class_id
		 * @var integer intDepreciationClassId
		 */
		protected $intDepreciationClassId;
		const DepreciationClassIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single Asset object
		 * (of type Asset), if this AssetModel object was restored with
		 * an expansion on the asset association table.
		 * @var Asset _objAsset;
		 */
		private $_objAsset;

		/**
		 * Private member variable that stores a reference to an array of Asset objects
		 * (of type Asset[]), if this AssetModel object was restored with
		 * an ExpandAsArray on the asset association table.
		 * @var Asset[] _objAssetArray;
		 */
		private $_objAssetArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetCustomFieldAssetModel object
		 * (of type AssetCustomFieldAssetModel), if this AssetModel object was restored with
		 * an expansion on the asset_custom_field_asset_model association table.
		 * @var AssetCustomFieldAssetModel _objAssetCustomFieldAssetModel;
		 */
		private $_objAssetCustomFieldAssetModel;

		/**
		 * Private member variable that stores a reference to an array of AssetCustomFieldAssetModel objects
		 * (of type AssetCustomFieldAssetModel[]), if this AssetModel object was restored with
		 * an ExpandAsArray on the asset_custom_field_asset_model association table.
		 * @var AssetCustomFieldAssetModel[] _objAssetCustomFieldAssetModelArray;
		 */
		private $_objAssetCustomFieldAssetModelArray = array();

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
		 * in the database column asset_model.category_id.
		 *
		 * NOTE: Always use the Category property getter to correctly retrieve this Category object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Category objCategory
		 */
		protected $objCategory;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_model.manufacturer_id.
		 *
		 * NOTE: Always use the Manufacturer property getter to correctly retrieve this Manufacturer object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Manufacturer objManufacturer
		 */
		protected $objManufacturer;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_model.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_model.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column asset_model.depreciation_class_id.
		 *
		 * NOTE: Always use the DepreciationClass property getter to correctly retrieve this DepreciationClass object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DepreciationClass objDepreciationClass
		 */
		protected $objDepreciationClass;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column asset_model_custom_field_helper.asset_model_id.
		 *
		 * NOTE: Always use the AssetModelCustomFieldHelper property getter to correctly retrieve this AssetModelCustomFieldHelper object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AssetModelCustomFieldHelper objAssetModelCustomFieldHelper
		 */
		protected $objAssetModelCustomFieldHelper;
		
		/**
		 * Used internally to manage whether the adjoined AssetModelCustomFieldHelper object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyAssetModelCustomFieldHelper;





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
		 * Load a AssetModel from PK Info
		 * @param integer $intAssetModelId
		 * @return AssetModel
		 */
		public static function Load($intAssetModelId) {
			// Use QuerySingle to Perform the Query
			return AssetModel::QuerySingle(
				QQ::Equal(QQN::AssetModel()->AssetModelId, $intAssetModelId)
			);
		}

		/**
		 * Load all AssetModels
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AssetModel::QueryArray to perform the LoadAll query
			try {
				return AssetModel::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AssetModels
		 * @return int
		 */
		public static function CountAll() {
			// Call AssetModel::QueryCount to perform the CountAll query
			return AssetModel::QueryCount(QQ::All());
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
			$objDatabase = AssetModel::GetDatabase();

			// Create/Build out the QueryBuilder object with AssetModel-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asset_model');
			AssetModel::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('asset_model');

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
		 * Static Qcodo Query method to query for a single AssetModel object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetModel the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new AssetModel object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AssetModel::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return AssetModel::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of AssetModel objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AssetModel[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AssetModel::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of AssetModel objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AssetModel::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AssetModel::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'asset_model_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AssetModel-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AssetModel::GetSelectFields($objQueryBuilder);
				AssetModel::GetFromFields($objQueryBuilder);

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
			return AssetModel::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AssetModel
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asset_model';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_model_id', $strAliasPrefix . 'asset_model_id');
			$objBuilder->AddSelectItem($strTableName, 'category_id', $strAliasPrefix . 'category_id');
			$objBuilder->AddSelectItem($strTableName, 'manufacturer_id', $strAliasPrefix . 'manufacturer_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_model_code', $strAliasPrefix . 'asset_model_code');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'long_description', $strAliasPrefix . 'long_description');
			$objBuilder->AddSelectItem($strTableName, 'image_path', $strAliasPrefix . 'image_path');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
			$objBuilder->AddSelectItem($strTableName, 'depreciation_class_id', $strAliasPrefix . 'depreciation_class_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AssetModel from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AssetModel::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AssetModel
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAssetModelId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'asset_model__';


				$strAlias = $strAliasPrefix . 'asset__asset_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetArray[$intPreviousChildItemCount - 1];
						$objChildItem = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assetcustomfieldassetmodel__asset_custom_field_asset_model_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetCustomFieldAssetModelArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetCustomFieldAssetModelArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetcustomfieldassetmodel__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetCustomFieldAssetModelArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetCustomFieldAssetModelArray[] = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetcustomfieldassetmodel__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'asset_model__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the AssetModel object
			$objToReturn = new AssetModel();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_model_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_model_id'] : $strAliasPrefix . 'asset_model_id';
			$objToReturn->intAssetModelId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'category_id'] : $strAliasPrefix . 'category_id';
			$objToReturn->intCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'manufacturer_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'manufacturer_id'] : $strAliasPrefix . 'manufacturer_id';
			$objToReturn->intManufacturerId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_model_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_model_code'] : $strAliasPrefix . 'asset_model_code';
			$objToReturn->strAssetModelCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'long_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'long_description'] : $strAliasPrefix . 'long_description';
			$objToReturn->strLongDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'image_path', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'image_path'] : $strAliasPrefix . 'image_path';
			$objToReturn->strImagePath = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_date'] : $strAliasPrefix . 'modified_date';
			$objToReturn->strModifiedDate = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'depreciation_class_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'depreciation_class_id'] : $strAliasPrefix . 'depreciation_class_id';
			$objToReturn->intDepreciationClassId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'asset_model__';

			// Check for Category Early Binding
			$strAlias = $strAliasPrefix . 'category_id__category_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCategory = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Manufacturer Early Binding
			$strAlias = $strAliasPrefix . 'manufacturer_id__manufacturer_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objManufacturer = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturer_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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

			// Check for DepreciationClass Early Binding
			$strAlias = $strAliasPrefix . 'depreciation_class_id__depreciation_class_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDepreciationClass = DepreciationClass::InstantiateDbRow($objDbRow, $strAliasPrefix . 'depreciation_class_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for AssetModelCustomFieldHelper Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'assetmodelcustomfieldhelper__asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objAssetModelCustomFieldHelper = AssetModelCustomFieldHelper::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelcustomfieldhelper__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objAssetModelCustomFieldHelper = false;
			}



			// Check for Asset Virtual Binding
			$strAlias = $strAliasPrefix . 'asset__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetCustomFieldAssetModel Virtual Binding
			$strAlias = $strAliasPrefix . 'assetcustomfieldassetmodel__asset_custom_field_asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetCustomFieldAssetModelArray[] = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetcustomfieldassetmodel__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetCustomFieldAssetModel = AssetCustomFieldAssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetcustomfieldassetmodel__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of AssetModels from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AssetModel[]
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
					$objItem = AssetModel::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AssetModel::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AssetModel object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AssetModel next row resulting from the query
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
			return AssetModel::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AssetModel object,
		 * by AssetModelId Index(es)
		 * @param integer $intAssetModelId
		 * @return AssetModel
		*/
		public static function LoadByAssetModelId($intAssetModelId, $objOptionalClauses = null) {
			return AssetModel::QuerySingle(
				QQ::Equal(QQN::AssetModel()->AssetModelId, $intAssetModelId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetModel objects,
		 * by CategoryId Index(es)
		 * @param integer $intCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/
		public static function LoadArrayByCategoryId($intCategoryId, $objOptionalClauses = null) {
			// Call AssetModel::QueryArray to perform the LoadArrayByCategoryId query
			try {
				return AssetModel::QueryArray(
					QQ::Equal(QQN::AssetModel()->CategoryId, $intCategoryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetModels
		 * by CategoryId Index(es)
		 * @param integer $intCategoryId
		 * @return int
		*/
		public static function CountByCategoryId($intCategoryId, $objOptionalClauses = null) {
			// Call AssetModel::QueryCount to perform the CountByCategoryId query
			return AssetModel::QueryCount(
				QQ::Equal(QQN::AssetModel()->CategoryId, $intCategoryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetModel objects,
		 * by ManufacturerId Index(es)
		 * @param integer $intManufacturerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/
		public static function LoadArrayByManufacturerId($intManufacturerId, $objOptionalClauses = null) {
			// Call AssetModel::QueryArray to perform the LoadArrayByManufacturerId query
			try {
				return AssetModel::QueryArray(
					QQ::Equal(QQN::AssetModel()->ManufacturerId, $intManufacturerId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetModels
		 * by ManufacturerId Index(es)
		 * @param integer $intManufacturerId
		 * @return int
		*/
		public static function CountByManufacturerId($intManufacturerId, $objOptionalClauses = null) {
			// Call AssetModel::QueryCount to perform the CountByManufacturerId query
			return AssetModel::QueryCount(
				QQ::Equal(QQN::AssetModel()->ManufacturerId, $intManufacturerId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetModel objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call AssetModel::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return AssetModel::QueryArray(
					QQ::Equal(QQN::AssetModel()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetModels
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call AssetModel::QueryCount to perform the CountByCreatedBy query
			return AssetModel::QueryCount(
				QQ::Equal(QQN::AssetModel()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetModel objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call AssetModel::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return AssetModel::QueryArray(
					QQ::Equal(QQN::AssetModel()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetModels
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call AssetModel::QueryCount to perform the CountByModifiedBy query
			return AssetModel::QueryCount(
				QQ::Equal(QQN::AssetModel()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of AssetModel objects,
		 * by DepreciationClassId Index(es)
		 * @param integer $intDepreciationClassId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/
		public static function LoadArrayByDepreciationClassId($intDepreciationClassId, $objOptionalClauses = null) {
			// Call AssetModel::QueryArray to perform the LoadArrayByDepreciationClassId query
			try {
				return AssetModel::QueryArray(
					QQ::Equal(QQN::AssetModel()->DepreciationClassId, $intDepreciationClassId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AssetModels
		 * by DepreciationClassId Index(es)
		 * @param integer $intDepreciationClassId
		 * @return int
		*/
		public static function CountByDepreciationClassId($intDepreciationClassId, $objOptionalClauses = null) {
			// Call AssetModel::QueryCount to perform the CountByDepreciationClassId query
			return AssetModel::QueryCount(
				QQ::Equal(QQN::AssetModel()->DepreciationClassId, $intDepreciationClassId)
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
		 * Save this AssetModel
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asset_model` (
							`category_id`,
							`manufacturer_id`,
							`asset_model_code`,
							`short_description`,
							`long_description`,
							`image_path`,
							`created_by`,
							`creation_date`,
							`modified_by`,
							`depreciation_class_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCategoryId) . ',
							' . $objDatabase->SqlVariable($this->intManufacturerId) . ',
							' . $objDatabase->SqlVariable($this->strAssetModelCode) . ',
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->strLongDescription) . ',
							' . $objDatabase->SqlVariable($this->strImagePath) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAssetModelId = $objDatabase->InsertId('asset_model', 'asset_model_id');

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
								`asset_model`
							WHERE
								`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('AssetModel');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asset_model`
						SET
							`category_id` = ' . $objDatabase->SqlVariable($this->intCategoryId) . ',
							`manufacturer_id` = ' . $objDatabase->SqlVariable($this->intManufacturerId) . ',
							`asset_model_code` = ' . $objDatabase->SqlVariable($this->strAssetModelCode) . ',
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`long_description` = ' . $objDatabase->SqlVariable($this->strLongDescription) . ',
							`image_path` = ' . $objDatabase->SqlVariable($this->strImagePath) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							`depreciation_class_id` = ' . $objDatabase->SqlVariable($this->intDepreciationClassId) . '
						WHERE
							`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined AssetModelCustomFieldHelper object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyAssetModelCustomFieldHelper) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = AssetModelCustomFieldHelper::LoadByAssetModelId($this->intAssetModelId)) {
						$objAssociated->AssetModelId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objAssetModelCustomFieldHelper) {
						$this->objAssetModelCustomFieldHelper->AssetModelId = $this->intAssetModelId;
						$this->objAssetModelCustomFieldHelper->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyAssetModelCustomFieldHelper = false;
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
					`asset_model`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this AssetModel
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AssetModel with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			
			
			// Update the adjoined AssetModelCustomFieldHelper object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = AssetModelCustomFieldHelper::LoadByAssetModelId($this->intAssetModelId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all AssetModels
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`');
		}

		/**
		 * Truncate asset_model table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asset_model`');
		}

		/**
		 * Reload this AssetModel from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AssetModel object.');

			// Reload the Object
			$objReloaded = AssetModel::Load($this->intAssetModelId);

			// Update $this's local variables to match
			$this->CategoryId = $objReloaded->CategoryId;
			$this->ManufacturerId = $objReloaded->ManufacturerId;
			$this->strAssetModelCode = $objReloaded->strAssetModelCode;
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->strLongDescription = $objReloaded->strLongDescription;
			$this->strImagePath = $objReloaded->strImagePath;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModifiedDate = $objReloaded->strModifiedDate;
			$this->DepreciationClassId = $objReloaded->DepreciationClassId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = AssetModel::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `asset_model` (
					`asset_model_id`,
					`category_id`,
					`manufacturer_id`,
					`asset_model_code`,
					`short_description`,
					`long_description`,
					`image_path`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					`depreciation_class_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAssetModelId) . ',
					' . $objDatabase->SqlVariable($this->intCategoryId) . ',
					' . $objDatabase->SqlVariable($this->intManufacturerId) . ',
					' . $objDatabase->SqlVariable($this->strAssetModelCode) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->strLongDescription) . ',
					' . $objDatabase->SqlVariable($this->strImagePath) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
					' . $objDatabase->SqlVariable($this->intDepreciationClassId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAssetModelId
		 * @return AssetModel[]
		 */
		public static function GetJournalForId($intAssetModelId) {
			$objDatabase = AssetModel::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM asset_model WHERE asset_model_id = ' .
				$objDatabase->SqlVariable($intAssetModelId) . ' ORDER BY __sys_date');

			return AssetModel::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return AssetModel[]
		 */
		public function GetJournal() {
			return AssetModel::GetJournalForId($this->intAssetModelId);
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
				case 'AssetModelId':
					// Gets the value for intAssetModelId (Read-Only PK)
					// @return integer
					return $this->intAssetModelId;

				case 'CategoryId':
					// Gets the value for intCategoryId 
					// @return integer
					return $this->intCategoryId;

				case 'ManufacturerId':
					// Gets the value for intManufacturerId 
					// @return integer
					return $this->intManufacturerId;

				case 'AssetModelCode':
					// Gets the value for strAssetModelCode 
					// @return string
					return $this->strAssetModelCode;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Not Null)
					// @return string
					return $this->strShortDescription;

				case 'LongDescription':
					// Gets the value for strLongDescription 
					// @return string
					return $this->strLongDescription;

				case 'ImagePath':
					// Gets the value for strImagePath 
					// @return string
					return $this->strImagePath;

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

				case 'DepreciationClassId':
					// Gets the value for intDepreciationClassId 
					// @return integer
					return $this->intDepreciationClassId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Category':
					// Gets the value for the Category object referenced by intCategoryId 
					// @return Category
					try {
						if ((!$this->objCategory) && (!is_null($this->intCategoryId)))
							$this->objCategory = Category::Load($this->intCategoryId);
						return $this->objCategory;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Manufacturer':
					// Gets the value for the Manufacturer object referenced by intManufacturerId 
					// @return Manufacturer
					try {
						if ((!$this->objManufacturer) && (!is_null($this->intManufacturerId)))
							$this->objManufacturer = Manufacturer::Load($this->intManufacturerId);
						return $this->objManufacturer;
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

				case 'DepreciationClass':
					// Gets the value for the DepreciationClass object referenced by intDepreciationClassId 
					// @return DepreciationClass
					try {
						if ((!$this->objDepreciationClass) && (!is_null($this->intDepreciationClassId)))
							$this->objDepreciationClass = DepreciationClass::Load($this->intDepreciationClassId);
						return $this->objDepreciationClass;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'AssetModelCustomFieldHelper':
					// Gets the value for the AssetModelCustomFieldHelper object that uniquely references this AssetModel
					// by objAssetModelCustomFieldHelper (Unique)
					// @return AssetModelCustomFieldHelper
					try {
						if ($this->objAssetModelCustomFieldHelper === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objAssetModelCustomFieldHelper)
							$this->objAssetModelCustomFieldHelper = AssetModelCustomFieldHelper::LoadByAssetModelId($this->intAssetModelId);
						return $this->objAssetModelCustomFieldHelper;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Asset':
					// Gets the value for the private _objAsset (Read-Only)
					// if set due to an expansion on the asset.asset_model_id reverse relationship
					// @return Asset
					return $this->_objAsset;

				case '_AssetArray':
					// Gets the value for the private _objAssetArray (Read-Only)
					// if set due to an ExpandAsArray on the asset.asset_model_id reverse relationship
					// @return Asset[]
					return (array) $this->_objAssetArray;

				case '_AssetCustomFieldAssetModel':
					// Gets the value for the private _objAssetCustomFieldAssetModel (Read-Only)
					// if set due to an expansion on the asset_custom_field_asset_model.asset_model_id reverse relationship
					// @return AssetCustomFieldAssetModel
					return $this->_objAssetCustomFieldAssetModel;

				case '_AssetCustomFieldAssetModelArray':
					// Gets the value for the private _objAssetCustomFieldAssetModelArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_custom_field_asset_model.asset_model_id reverse relationship
					// @return AssetCustomFieldAssetModel[]
					return (array) $this->_objAssetCustomFieldAssetModelArray;


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
				case 'CategoryId':
					// Sets the value for intCategoryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCategory = null;
						return ($this->intCategoryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ManufacturerId':
					// Sets the value for intManufacturerId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objManufacturer = null;
						return ($this->intManufacturerId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AssetModelCode':
					// Sets the value for strAssetModelCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAssetModelCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'LongDescription':
					// Sets the value for strLongDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLongDescription = QType::Cast($mixValue, QType::String));
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

				case 'DepreciationClassId':
					// Sets the value for intDepreciationClassId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objDepreciationClass = null;
						return ($this->intDepreciationClassId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Category':
					// Sets the value for the Category object referenced by intCategoryId 
					// @param Category $mixValue
					// @return Category
					if (is_null($mixValue)) {
						$this->intCategoryId = null;
						$this->objCategory = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Category object
						try {
							$mixValue = QType::Cast($mixValue, 'Category');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Category object
						if (is_null($mixValue->CategoryId))
							throw new QCallerException('Unable to set an unsaved Category for this AssetModel');

						// Update Local Member Variables
						$this->objCategory = $mixValue;
						$this->intCategoryId = $mixValue->CategoryId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Manufacturer':
					// Sets the value for the Manufacturer object referenced by intManufacturerId 
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
							throw new QCallerException('Unable to set an unsaved Manufacturer for this AssetModel');

						// Update Local Member Variables
						$this->objManufacturer = $mixValue;
						$this->intManufacturerId = $mixValue->ManufacturerId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this AssetModel');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this AssetModel');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DepreciationClass':
					// Sets the value for the DepreciationClass object referenced by intDepreciationClassId 
					// @param DepreciationClass $mixValue
					// @return DepreciationClass
					if (is_null($mixValue)) {
						$this->intDepreciationClassId = null;
						$this->objDepreciationClass = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DepreciationClass object
						try {
							$mixValue = QType::Cast($mixValue, 'DepreciationClass');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED DepreciationClass object
						if (is_null($mixValue->DepreciationClassId))
							throw new QCallerException('Unable to set an unsaved DepreciationClass for this AssetModel');

						// Update Local Member Variables
						$this->objDepreciationClass = $mixValue;
						$this->intDepreciationClassId = $mixValue->DepreciationClassId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AssetModelCustomFieldHelper':
					// Sets the value for the AssetModelCustomFieldHelper object referenced by objAssetModelCustomFieldHelper (Unique)
					// @param AssetModelCustomFieldHelper $mixValue
					// @return AssetModelCustomFieldHelper
					if (is_null($mixValue)) {
						$this->objAssetModelCustomFieldHelper = null;

						// Make sure we update the adjoined AssetModelCustomFieldHelper object the next time we call Save()
						$this->blnDirtyAssetModelCustomFieldHelper = true;

						return null;
					} else {
						// Make sure $mixValue actually is a AssetModelCustomFieldHelper object
						try {
							$mixValue = QType::Cast($mixValue, 'AssetModelCustomFieldHelper');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objAssetModelCustomFieldHelper to a DIFFERENT $mixValue?
						if ((!$this->AssetModelCustomFieldHelper) || ($this->AssetModelCustomFieldHelper->AssetModelId != $mixValue->AssetModelId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined AssetModelCustomFieldHelper object the next time we call Save()
							$this->blnDirtyAssetModelCustomFieldHelper = true;

							// Update Local Member Variable
							$this->objAssetModelCustomFieldHelper = $mixValue;
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

			
		
		// Related Objects' Methods for Asset
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Assets as an array of Asset objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/ 
		public function GetAssetArray($objOptionalClauses = null) {
			if ((is_null($this->intAssetModelId)))
				return array();

			try {
				return Asset::LoadArrayByAssetModelId($this->intAssetModelId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Assets
		 * @return int
		*/ 
		public function CountAssets() {
			if ((is_null($this->intAssetModelId)))
				return 0;

			return Asset::CountByAssetModelId($this->intAssetModelId);
		}

		/**
		 * Associates a Asset
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function AssociateAsset(Asset $objAsset) {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAsset on this unsaved AssetModel.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAsset on this AssetModel with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAsset->AssetModelId = $this->intAssetModelId;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Asset
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function UnassociateAsset(Asset $objAsset) {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsset on this unsaved AssetModel.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsset on this AssetModel with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`asset_model_id` = null
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->AssetModelId = null;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Assets
		 * @return void
		*/ 
		public function UnassociateAllAssets() {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsset on this unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByAssetModelId($this->intAssetModelId) as $objAsset) {
					$objAsset->AssetModelId = null;
					$objAsset->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`asset_model_id` = null
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');
		}

		/**
		 * Deletes an associated Asset
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function DeleteAssociatedAsset(Asset $objAsset) {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsset on this unsaved AssetModel.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsset on this AssetModel with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Assets
		 * @return void
		*/ 
		public function DeleteAllAssets() {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsset on this unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByAssetModelId($this->intAssetModelId) as $objAsset) {
					$objAsset->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetCustomFieldAssetModel
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetCustomFieldAssetModels as an array of AssetCustomFieldAssetModel objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetCustomFieldAssetModel[]
		*/ 
		public function GetAssetCustomFieldAssetModelArray($objOptionalClauses = null) {
			if ((is_null($this->intAssetModelId)))
				return array();

			try {
				return AssetCustomFieldAssetModel::LoadArrayByAssetModelId($this->intAssetModelId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetCustomFieldAssetModels
		 * @return int
		*/ 
		public function CountAssetCustomFieldAssetModels() {
			if ((is_null($this->intAssetModelId)))
				return 0;

			return AssetCustomFieldAssetModel::CountByAssetModelId($this->intAssetModelId);
		}

		/**
		 * Associates a AssetCustomFieldAssetModel
		 * @param AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel
		 * @return void
		*/ 
		public function AssociateAssetCustomFieldAssetModel(AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel) {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetCustomFieldAssetModel on this unsaved AssetModel.');
			if ((is_null($objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetCustomFieldAssetModel on this AssetModel with an unsaved AssetCustomFieldAssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_custom_field_asset_model`
				SET
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
				WHERE
					`asset_custom_field_asset_model_id` = ' . $objDatabase->SqlVariable($objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetCustomFieldAssetModel->AssetModelId = $this->intAssetModelId;
				$objAssetCustomFieldAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetCustomFieldAssetModel
		 * @param AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel
		 * @return void
		*/ 
		public function UnassociateAssetCustomFieldAssetModel(AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel) {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetCustomFieldAssetModel on this unsaved AssetModel.');
			if ((is_null($objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetCustomFieldAssetModel on this AssetModel with an unsaved AssetCustomFieldAssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_custom_field_asset_model`
				SET
					`asset_model_id` = null
				WHERE
					`asset_custom_field_asset_model_id` = ' . $objDatabase->SqlVariable($objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId) . ' AND
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetCustomFieldAssetModel->AssetModelId = null;
				$objAssetCustomFieldAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetCustomFieldAssetModels
		 * @return void
		*/ 
		public function UnassociateAllAssetCustomFieldAssetModels() {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetCustomFieldAssetModel on this unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetCustomFieldAssetModel::LoadArrayByAssetModelId($this->intAssetModelId) as $objAssetCustomFieldAssetModel) {
					$objAssetCustomFieldAssetModel->AssetModelId = null;
					$objAssetCustomFieldAssetModel->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_custom_field_asset_model`
				SET
					`asset_model_id` = null
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');
		}

		/**
		 * Deletes an associated AssetCustomFieldAssetModel
		 * @param AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel
		 * @return void
		*/ 
		public function DeleteAssociatedAssetCustomFieldAssetModel(AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel) {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetCustomFieldAssetModel on this unsaved AssetModel.');
			if ((is_null($objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetCustomFieldAssetModel on this AssetModel with an unsaved AssetCustomFieldAssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_asset_model`
				WHERE
					`asset_custom_field_asset_model_id` = ' . $objDatabase->SqlVariable($objAssetCustomFieldAssetModel->AssetCustomFieldAssetModelId) . ' AND
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetCustomFieldAssetModel->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetCustomFieldAssetModels
		 * @return void
		*/ 
		public function DeleteAllAssetCustomFieldAssetModels() {
			if ((is_null($this->intAssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetCustomFieldAssetModel on this unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = AssetModel::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetCustomFieldAssetModel::LoadArrayByAssetModelId($this->intAssetModelId) as $objAssetCustomFieldAssetModel) {
					$objAssetCustomFieldAssetModel->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_asset_model`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($this->intAssetModelId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="AssetModel"><sequence>';
			$strToReturn .= '<element name="AssetModelId" type="xsd:int"/>';
			$strToReturn .= '<element name="Category" type="xsd1:Category"/>';
			$strToReturn .= '<element name="Manufacturer" type="xsd1:Manufacturer"/>';
			$strToReturn .= '<element name="AssetModelCode" type="xsd:string"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="LongDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="ImagePath" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="DepreciationClass" type="xsd1:DepreciationClass"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AssetModel', $strComplexTypeArray)) {
				$strComplexTypeArray['AssetModel'] = AssetModel::GetSoapComplexTypeXml();
				Category::AlterSoapComplexTypeArray($strComplexTypeArray);
				Manufacturer::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				DepreciationClass::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AssetModel::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AssetModel();
			if (property_exists($objSoapObject, 'AssetModelId'))
				$objToReturn->intAssetModelId = $objSoapObject->AssetModelId;
			if ((property_exists($objSoapObject, 'Category')) &&
				($objSoapObject->Category))
				$objToReturn->Category = Category::GetObjectFromSoapObject($objSoapObject->Category);
			if ((property_exists($objSoapObject, 'Manufacturer')) &&
				($objSoapObject->Manufacturer))
				$objToReturn->Manufacturer = Manufacturer::GetObjectFromSoapObject($objSoapObject->Manufacturer);
			if (property_exists($objSoapObject, 'AssetModelCode'))
				$objToReturn->strAssetModelCode = $objSoapObject->AssetModelCode;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'LongDescription'))
				$objToReturn->strLongDescription = $objSoapObject->LongDescription;
			if (property_exists($objSoapObject, 'ImagePath'))
				$objToReturn->strImagePath = $objSoapObject->ImagePath;
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
			if ((property_exists($objSoapObject, 'DepreciationClass')) &&
				($objSoapObject->DepreciationClass))
				$objToReturn->DepreciationClass = DepreciationClass::GetObjectFromSoapObject($objSoapObject->DepreciationClass);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AssetModel::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCategory)
				$objObject->objCategory = Category::GetSoapObjectFromObject($objObject->objCategory, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCategoryId = null;
			if ($objObject->objManufacturer)
				$objObject->objManufacturer = Manufacturer::GetSoapObjectFromObject($objObject->objManufacturer, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intManufacturerId = null;
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
			if ($objObject->objDepreciationClass)
				$objObject->objDepreciationClass = DepreciationClass::GetSoapObjectFromObject($objObject->objDepreciationClass, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDepreciationClassId = null;
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
				$objQueryExpansion = new QQueryExpansion('AssetModel', 'asset_model', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `asset_model` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_model_id` AS `%s__%s__asset_model_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`category_id` AS `%s__%s__category_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`manufacturer_id` AS `%s__%s__manufacturer_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_model_code` AS `%s__%s__asset_model_code`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`long_description` AS `%s__%s__long_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`image_path` AS `%s__%s__image_path`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`depreciation_class_id` AS `%s__%s__depreciation_class_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'category_id':
							try {
								Category::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'manufacturer_id':
							try {
								Manufacturer::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
						case 'depreciation_class_id':
							try {
								DepreciationClass::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandCategory = 'category_id';
		const ExpandManufacturer = 'manufacturer_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';
		const ExpandDepreciationClass = 'depreciation_class_id';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AssetModelId
	 * @property-read QQNode $CategoryId
	 * @property-read QQNodeCategory $Category
	 * @property-read QQNode $ManufacturerId
	 * @property-read QQNodeManufacturer $Manufacturer
	 * @property-read QQNode $AssetModelCode
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $LongDescription
	 * @property-read QQNode $ImagePath
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $DepreciationClassId
	 * @property-read QQNodeDepreciationClass $DepreciationClass
	 * @property-read QQReverseReferenceNodeAsset $Asset
	 * @property-read QQReverseReferenceNodeAssetCustomFieldAssetModel $AssetCustomFieldAssetModel
	 * @property-read QQReverseReferenceNodeAssetModelCustomFieldHelper $AssetModelCustomFieldHelper
	 */
	class QQNodeAssetModel extends QQNode {
		protected $strTableName = 'asset_model';
		protected $strPrimaryKey = 'asset_model_id';
		protected $strClassName = 'AssetModel';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetModelId':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
				case 'CategoryId':
					return new QQNode('category_id', 'CategoryId', 'integer', $this);
				case 'Category':
					return new QQNodeCategory('category_id', 'Category', 'integer', $this);
				case 'ManufacturerId':
					return new QQNode('manufacturer_id', 'ManufacturerId', 'integer', $this);
				case 'Manufacturer':
					return new QQNodeManufacturer('manufacturer_id', 'Manufacturer', 'integer', $this);
				case 'AssetModelCode':
					return new QQNode('asset_model_code', 'AssetModelCode', 'string', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'LongDescription':
					return new QQNode('long_description', 'LongDescription', 'string', $this);
				case 'ImagePath':
					return new QQNode('image_path', 'ImagePath', 'string', $this);
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
				case 'DepreciationClassId':
					return new QQNode('depreciation_class_id', 'DepreciationClassId', 'integer', $this);
				case 'DepreciationClass':
					return new QQNodeDepreciationClass('depreciation_class_id', 'DepreciationClass', 'integer', $this);
				case 'Asset':
					return new QQReverseReferenceNodeAsset($this, 'asset', 'reverse_reference', 'asset_model_id');
				case 'AssetCustomFieldAssetModel':
					return new QQReverseReferenceNodeAssetCustomFieldAssetModel($this, 'assetcustomfieldassetmodel', 'reverse_reference', 'asset_model_id');
				case 'AssetModelCustomFieldHelper':
					return new QQReverseReferenceNodeAssetModelCustomFieldHelper($this, 'assetmodelcustomfieldhelper', 'reverse_reference', 'asset_model_id', 'AssetModelCustomFieldHelper');

				case '_PrimaryKeyNode':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
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
	 * @property-read QQNode $AssetModelId
	 * @property-read QQNode $CategoryId
	 * @property-read QQNodeCategory $Category
	 * @property-read QQNode $ManufacturerId
	 * @property-read QQNodeManufacturer $Manufacturer
	 * @property-read QQNode $AssetModelCode
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $LongDescription
	 * @property-read QQNode $ImagePath
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQNode $DepreciationClassId
	 * @property-read QQNodeDepreciationClass $DepreciationClass
	 * @property-read QQReverseReferenceNodeAsset $Asset
	 * @property-read QQReverseReferenceNodeAssetCustomFieldAssetModel $AssetCustomFieldAssetModel
	 * @property-read QQReverseReferenceNodeAssetModelCustomFieldHelper $AssetModelCustomFieldHelper
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAssetModel extends QQReverseReferenceNode {
		protected $strTableName = 'asset_model';
		protected $strPrimaryKey = 'asset_model_id';
		protected $strClassName = 'AssetModel';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetModelId':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
				case 'CategoryId':
					return new QQNode('category_id', 'CategoryId', 'integer', $this);
				case 'Category':
					return new QQNodeCategory('category_id', 'Category', 'integer', $this);
				case 'ManufacturerId':
					return new QQNode('manufacturer_id', 'ManufacturerId', 'integer', $this);
				case 'Manufacturer':
					return new QQNodeManufacturer('manufacturer_id', 'Manufacturer', 'integer', $this);
				case 'AssetModelCode':
					return new QQNode('asset_model_code', 'AssetModelCode', 'string', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'LongDescription':
					return new QQNode('long_description', 'LongDescription', 'string', $this);
				case 'ImagePath':
					return new QQNode('image_path', 'ImagePath', 'string', $this);
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
				case 'DepreciationClassId':
					return new QQNode('depreciation_class_id', 'DepreciationClassId', 'integer', $this);
				case 'DepreciationClass':
					return new QQNodeDepreciationClass('depreciation_class_id', 'DepreciationClass', 'integer', $this);
				case 'Asset':
					return new QQReverseReferenceNodeAsset($this, 'asset', 'reverse_reference', 'asset_model_id');
				case 'AssetCustomFieldAssetModel':
					return new QQReverseReferenceNodeAssetCustomFieldAssetModel($this, 'assetcustomfieldassetmodel', 'reverse_reference', 'asset_model_id');
				case 'AssetModelCustomFieldHelper':
					return new QQReverseReferenceNodeAssetModelCustomFieldHelper($this, 'assetmodelcustomfieldhelper', 'reverse_reference', 'asset_model_id', 'AssetModelCustomFieldHelper');

				case '_PrimaryKeyNode':
					return new QQNode('asset_model_id', 'AssetModelId', 'integer', $this);
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