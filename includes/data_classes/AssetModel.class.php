<?php
/*
 * Copyright (c)  2009, Tracmor, LLC
 *
 * This file is part of Tracmor.
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
	require(__DATAGEN_CLASSES__ . '/AssetModelGen.class.php');

	/**
	 * The AssetModel class defined here contains any
	 * customized code for the AssetModel class in the
	 * Object Relational Model.  It represents the "asset_model" table
	 * in the database, and extends from the code generated abstract AssetModelGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My Application
	 * @subpackage DataObjects
	 *
	 */
	class AssetModel extends AssetModelGen {

		protected $intAssetCount;
		public $objCustomFieldArray;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAssetModel->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
      return sprintf($this->strShortDescription);
		}
		public function __toStringWithLink($cssClass=null) {
			return sprintf('<a href="../assets/asset_model_edit.php?intAssetModelId=%s" class="%s">%s</a>',
				$this->AssetModelId, $cssClass, $this->__toString());
		}
		public function __toStringWithAssetCountLink($cssClass=null) {
			return sprintf('<a href="../assets/asset_list.php?intAssetModelId=%s" class="%s">(%s)</a>', $this->AssetModelId, $cssClass, $this->intAssetCount);
		}

		// This adds the created by and creation date before saving a new asset model
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
				parent::Save($blnForceInsert, $blnForceUpdate);

			  $objDatabase = AssetModel::GetDatabase();
  			$strQuery = sprintf('INSERT INTO `asset_model_custom_field_helper` (`asset_model_id`) VALUES (%s);', $this->AssetModelId);
  			$objDatabase->NonQuery($strQuery);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
		}

		/**
		 * Load a AssetModel from PK Info
		 * @param integer $intAssetModelId
		 * @return AssetModel
		*/
		public static function LoadWithAssetCount($intAssetModelId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			AssetModel::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intAssetModelId = $objDatabase->SqlVariable($intAssetModelId);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					COUNT( `asset`.`asset_id` ) AS asset_count,
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
					`modified_date`
				FROM
					`asset_model`
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id` = `asset`.`asset_model_id` AND `asset`.`location_id` != 2 AND `asset`.`location_id` != 5 AND `asset`.`location_id` != 6
				WHERE
					`asset_model_id` = %s
				GROUP BY `asset_model_id`', $intAssetModelId);

			// Perform the Query and Instantiate the Row
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetModel::InstantiateDbRow($objDbResult->GetNextRow());
		}
		
		/**
		 * Load all AssetModels
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return AssetModel[]
		*/
		public static function LoadAllIntoArray($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			AssetModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`asset_model`.`asset_model_id` AS `asset_model_id`,					
					`asset_model`.`short_description` AS `short_description`
				FROM
					`asset_model`					
				ORDER BY `asset_model`.`short_description`');

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			
			$objToReturn = array();
			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;			
			$item = Array();
			while ($objDbRow = $objDbResult->GetNextRow()) {				
				$item['asset_model_id'] = $objDbRow->GetColumn('asset_model_id', 'Integer');
				$item['short_description'] = $objDbRow->GetColumn('short_description');
				array_push($objToReturn,$item);
			}						
			return $objToReturn;
		}

		/**
		 * Load all AssetModels
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return AssetModel[]
		*/
		public static function LoadAllWithAssetCount($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			AssetModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
				  COUNT( `asset`.`asset_id`) AS asset_count,
					`asset_model`.`asset_model_id` AS `asset_model_id`,
					`asset_model`.`category_id` AS `category_id`,
					`asset_model`.`manufacturer_id` AS `manufacturer_id`,
					`asset_model`.`asset_model_code` AS `asset_model_code`,
					`asset_model`.`short_description` AS `short_description`,
					`asset_model`.`long_description` AS `long_description`,
					`asset_model`.`image_path` AS `image_path`,
					`asset_model`.`created_by` AS `created_by`,
					`asset_model`.`creation_date` AS `creation_date`,
					`asset_model`.`modified_by` AS `modified_by`,
					`asset_model`.`modified_date` AS `modified_date`
					%s
				FROM
					`asset_model` AS `asset_model`
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id`=`asset`.`asset_model_id` AND `asset`.`location_id` != 2 AND `asset`.`location_id` != 5 AND `asset`.`location_id` != 6
					%s
				GROUP BY `asset_model_id`
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetModel::InstantiateDbResult($objDbResult);
		}

		public static function CountAssetsByAssetModel(AssetModel $objAssetModel) {
			AssetModel::QueryHelper($objDatabase);

			$intAssetModelId = QApplication::$Database[1]->SqlVariable($objAssetModel->AssetModelId, true);

			$strQuery = sprintf('
				SELECT
					COUNT(asset.asset_id) AS row_count
				FROM
					`asset` AS `asset`
				WHERE
					`asset` . `asset_model_id` %s AND
					`asset`.`location_id` != 2 AND
					`asset`.`location_id` != 5 AND
					`asset`.`location_id` != 6
			', $intAssetModelId);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}

		public static function CountBySearch($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $objExpansionMap = null) {

			// Call to QueryHelper to Get the Database Object
			AssetModel::QueryHelper($objDatabase);

		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					AssetModel::ExpandQuery('asset_model', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrSearchSql = AssetModel::GenerateSearchSql($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::AssetModel);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::AssetModel);

			$strQuery = sprintf('
				SELECT
					COUNT(asset_model.asset_model_id) AS row_count
				FROM
					`asset_model` AS `asset_model`
					%s
					%s
					%s
				WHERE
				  1=1
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrAttachmentSql['strFrom'], $arrCustomFieldSql['strFrom'],
			$arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strDescriptionSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
			$arrSearchSql['strAuthorizationSql']);

			//echo($strQuery); exit;
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}

		public static function CountBySearchHelper($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $objExpansionMap = null) {

			// Call to QueryHelper to Get the Database Object
			AssetModel::QueryHelper($objDatabase);

		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					AssetModel::ExpandQuery('asset_model', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrSearchSql = AssetModel::GenerateSearchSql($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::AssetModel);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::AssetModel);

			$strQuery = sprintf('
				SELECT
					COUNT(asset_model.asset_model_id) AS row_count
				FROM
					`asset_model` AS `asset_model`
					%s
					%s
					%s
				WHERE
				  1=1
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrAttachmentSql['strFrom'], $arrCustomFieldSql['strFrom'],
			$arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strDescriptionSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
			$arrSearchSql['strAuthorizationSql']);
			
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}

		public static function LoadArrayBySearch($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			AssetModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					AssetModel::ExpandQuery('asset_model', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrSearchSql = AssetModel::GenerateSearchSql($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::AssetModel);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::AssetModel);

			$strQuery = sprintf('
				SELECT
					%s
					COUNT( `asset`.`asset_id`) AS asset_count,
					`asset_model`.`asset_model_id` AS `asset_model_id`,
					`asset_model`.`category_id` AS `category_id`,
					`asset_model`.`manufacturer_id` AS `manufacturer_id`,
					`asset_model`.`asset_model_code` AS `asset_model_code`,
					`asset_model`.`short_description` AS `short_description`,
					`asset_model`.`long_description` AS `long_description`,
					`asset_model`.`image_path` AS `image_path`,
					`asset_model`.`created_by` AS `created_by`,
					`asset_model`.`creation_date` AS `creation_date`,
					`asset_model`.`modified_by` AS `modified_by`,
					`asset_model`.`modified_date` AS `modified_date`
					%s
					%s
					%s
				FROM
					`asset_model` AS `asset_model`
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id` = `asset`.`asset_model_id` AND `asset`.`location_id` != 2 AND `asset`.`location_id` != 5 AND `asset`.`location_id` != 6
					%s
					%s
					%s
				WHERE
				1=1
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'], $arrAttachmentSql['strSelect'],
				$objQueryExpansion->GetFromSql("", "\n					"), $arrCustomFieldSql['strFrom'], $arrAttachmentSql['strFrom'],
				$arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strDescriptionSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
				$arrSearchSql['strAuthorizationSql'], $arrAttachmentSql['strGroupBy'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);
			return AssetModel::InstantiateDbResult($objDbResult);

		}

		public static function LoadArrayBySearchHelper($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

			AssetModel::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					AssetModel::ExpandQuery('asset_model', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrSearchSql = AssetModel::GenerateSearchSql($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::AssetModel);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::AssetModel);

			$strQuery = sprintf('
				SELECT
					%s
					COUNT( `asset`.`asset_id`) AS asset_count,
					`asset_model`.`asset_model_id` AS `asset_model_id`,
					`asset_model`.`category_id` AS `category_id`,
					`asset_model`.`manufacturer_id` AS `manufacturer_id`,
					`asset_model`.`asset_model_code` AS `asset_model_code`,
					`asset_model`.`short_description` AS `short_description`,
					`asset_model`.`long_description` AS `long_description`,
					`asset_model`.`image_path` AS `image_path`,
					`asset_model`.`created_by` AS `created_by`,
					`asset_model`.`creation_date` AS `creation_date`,
					`asset_model`.`modified_by` AS `modified_by`,
					`asset_model`.`modified_date` AS `modified_date`
					%s
					%s
					%s
				FROM
					`asset_model` AS `asset_model`
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id` = `asset`.`asset_model_id` AND `asset`.`location_id` != 2 AND `asset`.`location_id` != 5 AND `asset`.`location_id` != 6
					%s
					%s
					%s
				WHERE
				1=1
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'], $arrAttachmentSql['strSelect'],
				$objQueryExpansion->GetFromSql("", "\n					"), $arrCustomFieldSql['strFrom'], $arrAttachmentSql['strFrom'],
				$arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strDescriptionSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
				$arrSearchSql['strAuthorizationSql'], $arrAttachmentSql['strGroupBy'],
				$strOrderBy, $strLimitSuffix);
				
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetModel::InstantiateDbResult($objDbResult);

		}

	  protected static function GenerateSearchSql ($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null) {

			$arrSearchSql = array("strCategorySql" => "", "strManufacturerSql" => "", "strDescriptionSql" => "", "strAssetModelCodeSql" => "", "strCustomFieldsSql" => "", "strDateModifiedSql" => "", "strAttachmentSql" => "", "strAuthorizationSql" => "");

			if ($intCategoryId) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()
				$intCategoryId = QApplication::$Database[1]->SqlVariable($intCategoryId, true);
				$arrSearchSql['strCategorySql'] = sprintf("AND `asset_model__category_id`.`category_id`%s", $intCategoryId);
			}
			if ($intManufacturerId) {
  		  $intManufacturerId = QApplication::$Database[1]->SqlVariable($intManufacturerId, true);
				$arrSearchSql['strManufacturerSql'] = sprintf("AND `asset_model__manufacturer_id`.`manufacturer_id`%s", $intManufacturerId);
			}
			if ($strDescription) {
				$strDescription = QApplication::$Database[1]->SqlVariable("%" . $strDescription . "%", false);
				$arrSearchSql['strDescriptionSql'] = "AND ( `asset_model`.`short_description` LIKE $strDescription OR `asset_model`.`long_description` LIKE $strDescription )";
			}
			if ($strAssetModelCode) {
				$strAssetModelCode = QApplication::$Database[1]->SqlVariable("%" . $strAssetModelCode . "%", false);
				$arrSearchSql['strAssetModelCodeSql'] = "AND `asset_model`.`asset_model_code` LIKE $strAssetModelCode";
			}
			if ($blnAttachment) {
				$arrSearchSql['strAttachmentSql'] = sprintf("AND attachment.attachment_id IS NOT NULL");
			}

			if ($arrCustomFields) {
				$arrSearchSql['strCustomFieldsSql'] = CustomField::GenerateSearchHelperSql($arrCustomFields, EntityQtype::AssetModel);
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset_model`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset_model`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset_model`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`asset_model`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}

			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql('asset_model');

			return $arrSearchSql;

		}

		/**
		 * Instantiate an AssetModel object from a Database Row.
		 * Calls parent function, and adds asset_count.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @return AssetModel
		*/

		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null) {

			$objToReturn = parent::InstantiateDbRow($objDbRow, $strAliasPrefix, $strExpandAsArrayNodes, $objPreviousItem);
			$objToReturn->intAssetCount = $objDbRow->GetColumn($strAliasPrefix . 'asset_count', 'Integer');

			return $objToReturn;

		}

	}
?>