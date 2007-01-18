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
	require(__DATAGEN_CLASSES__ . '/AssetGen.class.php');

	/**
	 * The Asset class defined here contains any
	 * customized code for the Asset class in the
	 * Object Relational Model.  It represents the "asset" table 
	 * in the database, and extends from the code generated abstract AssetGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Asset extends AssetGen {
		
		// public $objCustomAssetFieldArray;
		// I'm not sure this needs to be here ... it is also declared in asset_edit.php
		public $objCustomFieldArray;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAsset->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			// return sprintf('Asset Object %s - %s',  $this->intAssetId,  $this->intAssetModelId);
			return $this->AssetModel->ShortDescription;
		}
		
		// This adds the created by and creation date before saving a new asset
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
		 * "to string" handler that includes a link to the asset_edit page
		 *
		 * @param Asset $objAsset
		 * @param string $cssClass
		 * @return string
		 */
		/*
		public function __toStringWithLink(Asset $objAsset, $cssClass=null) {
			return sprintf('<a href="asset_edit.php?intAssetId=%s" class="%s">%s</a>',
				$objAsset->AssetId, $cssClass, $objAsset->AssetCode);
		}
		*/
		public function __toStringWithLink($cssClass=null) {
			return sprintf('<a href="../assets/asset_edit.php?intAssetId=%s" class="%s">%s</a>',
				$this->AssetId, $cssClass, $this->AssetCode);
		}
		
		public static function __toStringCustomField($intCustomFieldId, $intAssetId) {
			
			$strValue = CustomField::__toStringCustomFieldValue($intCustomFieldId, $intAssetId, 1);
			return $strValue;
		}
		
		/**
		 * Returns an Account object the created the most recent transaction for this asset
		 *
		 * @return Object Account
		 */
		public function GetLastTransactionUser() {
			
			$objClauses = array();
			$objExpansionClause = QQ::Expand(QQN::AssetTransaction()->Transaction->CreatedByObject);
			$objOrderByClause = QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate, false);
			$objLimitClause = QQ::LimitInfo(1, 0);
			array_push($objClauses, $objExpansionClause);
			array_push($objClauses, $objOrderByClause);
			array_push($objClauses, $objLimitClause);
			
			$AssetTransactionArray = AssetTransaction::LoadArrayByAssetId($this->AssetId, $objClauses);
			
			$Account = $AssetTransactionArray[0]->Transaction->CreatedByObject;
			
			return $Account;
		}
				
		
    /**
     * Count the total assets by category_id, which is a column in the asset_model table
     *
     * @param int $intCategoryId
     * @param int $intManufacturerId
     * @param string $strShortDescription
     * @param string $strAssetModelCode
     * @param array $objExpansionMap
     * @return integer Count
     */
		public static function CountBySearch($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $objExpansionMap = null) {
		
			// Call to QueryHelper to Get the Database Object		
			Asset::QueryHelper($objDatabase);
			
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Asset::ExpandQuery('asset', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}

			$arrSearchSql = Asset::GenerateSearchSql($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					COUNT(asset.asset_id) AS row_count
				FROM
					`asset` AS `asset`
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
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrSearchSql['strCustomFieldsFromSql'], 
			$arrSearchSql['strAssetCodeSql'], $arrSearchSql['strLocationSql'], $arrSearchSql['strAssetModelSql'], $arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strOffsiteSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
			
		}
		

				
    /**
     * Load an array of Asset objects
		 * by CategoryId, ManufacturerId Index(es)
		 * AssetModel ShortDescription, or AssetModelCode
     *
     * @param int $intCategoryId
     * @param int $intManufacturerId
     * @param string $strShortDescription
     * @param string $strAssetModelCode
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return Asset[]
     */
		public static function LoadArrayBySearch($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			Asset::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Asset::ExpandQuery('asset', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
					
			$arrSearchSql = Asset::GenerateSearchSql($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);
			$arrCustomFieldSql = CustomField::GenerateSql(1);

			$strQuery = sprintf('
				SELECT
					%s
					`asset`.`asset_id` AS `asset_id`,
					`asset`.`asset_model_id` AS `asset_model_id`,
					`asset`.`location_id` AS `location_id`,
					`asset`.`asset_code` AS `asset_code`,
					`asset`.`image_path` AS `image_path`,
					`asset`.`created_by` AS `created_by`,
					`asset`.`creation_date` AS `creation_date`,
					`asset`.`modified_by` AS `modified_by`,
					`asset`.`modified_date` AS `modified_date`
					%s
					%s
				FROM
					`asset` AS `asset`
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
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'], 
				$objQueryExpansion->GetFromSql("", "\n					"), $arrSearchSql['strCustomFieldsFromSql'], $arrCustomFieldSql['strFrom'], 
				$arrSearchSql['strAssetCodeSql'], $arrSearchSql['strLocationSql'], $arrSearchSql['strAssetModelSql'], $arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strOffsiteSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'],
				$arrSearchSql['strAuthorizationSql'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return Asset::InstantiateDbResult($objDbResult);			
		
		}
		
		/**
		 * This is an internally called method that generates the SQL
		 * for the WHERE portion of the query for searching by Category, 
		 * Manufacturer, Name, or Part Number. This is intended to be called 
		 * from Asset::LoadArrayBySearch() and Asset::CountBySearch
		 * This has been updated for calls from LoadArrayBySimpleSearch() but will
		 * also work with the LoadArrayBySearch() method is well.
		 * This was done in case we revert back to the older, advanced search.
		 *
		 * @param string $strAssetCode
		 * @param int $intLocationId
		 * @param int $intAssetModelId
		 * @param int $intCategoryId
		 * @param int $intManufacturerId
		 * @param string $strAssetModelCode
		 * @param string $strShortDescription
		 * @return array with seven keys, strAssetCodeSql, strLocationSql, strAssetModelSql, strCategorySql, strManufacturerSql, strAssetModelCodeSql, strShortDescriptionSql
		 */
	  protected static function GenerateSearchSql ($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null) {
			
	  	// Define all indexes for the array to be returned
			$arrSearchSql = array("strAssetCodeSql" => "", "strLocationSql" => "", "strAssetModelSql" => "", "strCategorySql" => "", "strManufacturerSql" => "", "strOffsiteSql" => "", "strAssetModelCodeSql" => "", "strShortDescriptionSql" => "", "strCustomFieldsSql" => "", "strCustomFieldsFromSql" => "", "strDateModifiedSql" => "", "strAuthorizationSql" => "");

			if ($strAssetCode) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strAssetCode = QApplication::$Database[1]->SqlVariable("%" . $strAssetCode . "%", false);
				$arrSearchSql['strAssetCodeSql'] = "AND `asset` . `asset_code` LIKE $strAssetCode";
			}
			if ($intLocationId) {
				$intLocationId = QApplication::$Database[1]->SqlVariable($intLocationId, true);
				$arrSearchSql['strLocationSql'] = sprintf("AND `asset` . `location_id`%s", $intLocationId);
			}
			if ($intAssetModelId) {
				$intAssetModelId = QApplication::$Database[1]->SqlVariable($intAssetModelId, true);
				$arrSearchSql['strAssetModelSql'] = sprintf("AND `asset` . `asset_model_id`%s", $intAssetModelId);
			}			
			if ($intCategoryId) {
				$intCategoryId = QApplication::$Database[1]->SqlVariable($intCategoryId, true);
				$arrSearchSql['strCategorySql'] = sprintf("AND `asset__asset_model_id__category_id`.`category_id`%s", $intCategoryId);
			}			
			if ($intManufacturerId) {		
  		  $intManufacturerId = QApplication::$Database[1]->SqlVariable($intManufacturerId, true);
				$arrSearchSql['strManufacturerSql'] = sprintf("AND `asset__asset_model_id__manufacturer_id`.`manufacturer_id`%s", $intManufacturerId);
			}
			if (!$blnOffsite && !$intLocationId) {
				$arrSearchSql['strOffsiteSql'] = "AND `asset` . `location_id` != 2 AND `asset` . `location_id` != 5";
			}
			if ($strShortDescription) {
				$strShortDescription = QApplication::$Database[1]->SqlVariable("%" . $strShortDescription . "%", false);
				$arrSearchSql['strShortDescriptionSql'] = "AND `asset__asset_model_id`.`short_description` LIKE $strShortDescription";
			}
			if ($strAssetModelCode) {
				$strAssetModelCode = QApplication::$Database[1]->SqlVariable("%" . $strAssetModelCode . "%", false);
				$arrSearchSql['strAssetModelCodeSql'] = "AND `asset__asset_model_id`.`asset_model_code` LIKE $strAssetModelCode";
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am 
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`asset`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}			
			if ($arrCustomFields) {
				foreach ($arrCustomFields as $field) {
					if (isset($field['value']) && !empty($field['value'])) {
						// echo("test");
						$field['CustomFieldId'] = QApplication::$Database[1]->SqlVariable($field['CustomFieldId'], false);
						
						$arrSearchSql['strCustomFieldsFromSql'] .= sprintf("\nLEFT JOIN `custom_field_selection` AS `custom_field_selection_%s` ON `asset` . `asset_id` = `custom_field_selection_%s` . `entity_id`", $field['CustomFieldId'], $field['CustomFieldId']);
						$arrSearchSql['strCustomFieldsFromSql'] .= sprintf("\nLEFT JOIN `custom_field_value` AS `custom_field_value_%s` ON `custom_field_selection_%s` . `custom_field_value_id` = `custom_field_value_%s` . `custom_field_value_id`", $field['CustomFieldId'], $field['CustomFieldId'], $field['CustomFieldId']);
						
						$arrSearchSql['strCustomFieldsSql'] .= sprintf("\nAND `custom_field_value_%s` . `custom_field_id` = %s", $field['CustomFieldId'], $field['CustomFieldId']);
						if ($field['input'] instanceof QTextBox) {
							$field['value'] = QApplication::$Database[1]->SqlVariable("%" . $field['value'] . "%", false);
							$arrSearchSql['strCustomFieldsSql'] .= "\nAND `custom_field_value_".$field['CustomFieldId']."` . `short_description` LIKE ".$field['value'];
						}
						elseif ($field['input'] instanceof QListBox) {
							$field['value'] = QApplication::$Database[1]->SqlVariable($field['value'], true);
							$arrSearchSql['strCustomFieldsSql'] .= sprintf("\nAND `custom_field_value_%s` . `custom_field_value_id`%s", $field['CustomFieldId'], $field['value']);
						}
					}
				}
			}
			
			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql('asset');
			
			return $arrSearchSql;

			/* This is what the SQL looks like for custom fields
			SELECT
			  COUNT(asset.asset_id) AS row_count
			  FROM
			    `asset` AS `asset`
			    LEFT JOIN `asset_model` AS `asset__asset_model_id` ON `asset`.`asset_model_id` = `asset__asset_model_id`.`asset_model_id`
			    LEFT JOIN `category` AS `asset__asset_model_id__category_id` ON `asset__asset_model_id`.`category_id` = `asset__asset_model_id__category_id`.`category_id`
			    LEFT JOIN `manufacturer` AS `asset__asset_model_id__manufacturer_id` ON `asset__asset_model_id`.`manufacturer_id` = `asset__asset_model_id__manufacturer_id`.`manufacturer_id`
			    LEFT JOIN `location` AS `asset__location_id` ON `asset`.`location_id` = `asset__location_id`.`location_id`
			    LEFT JOIN `custom_field_selection` AS `custom_field_selection_1` ON `asset`.`asset_id` = `custom_field_selection_1` . `entity_id`
			    LEFT JOIN `custom_field_value` AS `custom_field_value_1` ON `custom_field_selection_1` . `custom_field_value_id` = `custom_field_value_1` . `custom_field_value_id`
			    LEFT JOIN `custom_field_selection` AS `custom_field_selection_5` ON `asset`.`asset_id` = `custom_field_selection_5` . `entity_id`
			    LEFT JOIN `custom_field_value` AS `custom_field_value_5` ON `custom_field_selection_5` . `custom_field_value_id` = `custom_field_value_5` . `custom_field_value_id`			    
			  WHERE
			    1=1
			    AND `custom_field_value_1` . `custom_field_id` = 1
			    AND `custom_field_value_1` . `short_description` LIKE '%1%'
			    AND `custom_field_value_5` . `custom_field_id` = 5
			    AND `custom_field_value_5` . `custom_field_value_id` = 6
			*/			
		}
	}
?>