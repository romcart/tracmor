<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
			}
			parent::Save($blnForceInsert, $blnForceUpdate);
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
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id` = `asset`.`asset_model_id`
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
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id`=`asset`.`asset_model_id`
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
					`asset` . `asset_model_id` %s
			', $intAssetModelId);
			
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);			
		}
		
		public static function CountBySearch($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $objExpansionMap = null) {
		
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

			$arrSearchSql = AssetModel::GenerateSearchSql($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode);

			$strQuery = sprintf('
				SELECT
					COUNT(asset_model.asset_model_id) AS row_count
				FROM
					`asset_model` AS `asset_model`
					%s
				WHERE
				  1=1
				  %s
				  %s
				  %s
				  %s
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"), 
			$arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strDescriptionSql'], $arrSearchSql['strAssetModelCodeSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}
		
		public static function LoadArrayBySearch($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
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
					
			$arrSearchSql = AssetModel::GenerateSearchSql($intCategoryId, $intManufacturerId, $strDescription, $strAssetModelCode);

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
					LEFT JOIN `asset` AS `asset` ON `asset_model`.`asset_model_id` = `asset`.`asset_model_id`
					%s
				WHERE
				1=1
				%s
				%s
				%s
				%s
				%s
				GROUP BY `asset_model_id`
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"),
				$objQueryExpansion->GetFromSql("", "\n					"),
				$arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strDescriptionSql'], $arrSearchSql['strAssetModelCodeSql'],
				$arrSearchSql['strAuthorizationSql'], 
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return AssetModel::InstantiateDbResult($objDbResult);			
		
		}		
		
	  protected static function GenerateSearchSql ($intCategoryId = null, $intManufacturerId = null, $strDescription = null, $strAssetModelCode = null) {
			
			$arrSearchSql = array("strCategorySql" => "", "strManufacturerSql" => "", "strDescriptionSql" => "", "strAssetModelCodeSql" => "", "strAuthorizationSql" => "");
			
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
		
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null) {
			
			$objToReturn = parent::InstantiateDbRow($objDbRow, $strAliasPrefix);
			$objToReturn->intAssetCount = $objDbRow->GetColumn($strAliasPrefix . 'asset_count', 'Integer');
			
			return $objToReturn;
			
		}		
		
	}
?>