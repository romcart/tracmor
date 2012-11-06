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

		protected $intTempId;

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

		/**
		 * Returns the HTML needed for the asset list datagrid to show reserved and checked out by icons, with hovertips with the username.
		 * If the asset is neither reserved nor checked out, it returns an empty string.
		 *
		 * @param QDatagrid Object $objControl
		 * @return string
		 */
		public function ToStringHoverTips($objControl) {
			if ($this->blnReservedFlag) {
				$lblReservedImage = new QLabelExt($objControl);
				$lblReservedImage->HtmlEntities = false;
				$lblReservedImage->Text = sprintf('<img src="%s/icons/reserved_datagrid.png" style="vertical-align:middle;">', __IMAGE_ASSETS__);

				$objHoverTip = new QHoverTip($lblReservedImage);
				$objHoverTip->Text = 'Reserved by ' . $this->GetLastTransactionUser()->__toString();
				$lblReservedImage->HoverTip = $objHoverTip;
				$strToReturn = $lblReservedImage->Render(false);
			}

			elseif ($this->blnCheckedOutFlag) {
				$lblCheckedOutImage = new QLabelExt($objControl);
				$lblCheckedOutImage->HtmlEntities = false;
				$lblCheckedOutImage->Text = sprintf('<img src="%s/icons/checked_out_datagrid.png" style="vertical-align:middle;">', __IMAGE_ASSETS__);

				$objHoverTip = new QHoverTip($lblCheckedOutImage);
				//$objHoverTip->Text = 'Checked Out by ' . $this->GetLastTransactionUser()->__toString();
				$arrObjects = $this->GetLastTransactionCheckoutObjectArray();
				$objAccount = $arrObjects['objAccount'];
				$objAssetTransactionCheckout = $arrObjects['objAssetTransactionCheckout'];
				$strReason = $arrObjects['strNote'];
				if (!$objAssetTransactionCheckout)
				  $objHoverTip->Text = 'Checked Out by ' . $objAccount->__toString();
				else {
				  $objHoverTip->Text = 'Checked Out to ';
				  if ($objAssetTransactionCheckout->ToContactId) {
				    $objHoverTip->Text .= $objAssetTransactionCheckout->ToContact->__toString();
				  }
				  else {
				    $objHoverTip->Text .= $objAssetTransactionCheckout->ToUser->__toString();
				  }
				  $objHoverTip->Text .= ' by ' . $objAccount->__toString();
				  if (QApplication::$TracmorSettings->ReasonRequired == "1" || $strReason) {
            $objHoverTip->Text .= "<br />Reason: " . $strReason;
				  }
				  if (QApplication::$TracmorSettings->DueDateRequired == "1" || $objAssetTransactionCheckout->DueDate) {
            $objHoverTip->Text .= sprintf("<br />Due Date: %s", ($objAssetTransactionCheckout->DueDate) ? $objAssetTransactionCheckout->DueDate->format('m/d/Y g:i A') : "");
				  }
				}
				$lblCheckedOutImage->HoverTip = $objHoverTip;
				$strToReturn = $lblCheckedOutImage->Render(false);
			}

			elseif ($this->blnArchivedFlag) {
				$lblArchivedImage = new QLabelExt($objControl);
				$lblArchivedImage->HtmlEntities = false;
				$lblArchivedImage->Text = sprintf('<img src="%s/icons/archived_datagrid.png" style="vertical-align:middle;">', __IMAGE_ASSETS__);

				$objHoverTip = new QHoverTip($lblArchivedImage);
				$objHoverTip->Text = 'Archived by ' . $this->GetLastTransactionUser()->__toString();
				$lblArchivedImage->HoverTip = $objHoverTip;
				$strToReturn = $lblArchivedImage->Render(false);
			}

			elseif ($objPendingShipment = AssetTransaction::PendingShipment($this->AssetId)) {
				$lblShipmentImage = new QLabelExt($objControl);
				$lblShipmentImage->HtmlEntities = false;
				$lblShipmentImage->Text = sprintf('<img src="%s/icons/shipment_datagrid.png" style="Vertical-align:middle;">', __IMAGE_ASSETS__);

				$objHoverTip = new QHoverTip($lblShipmentImage);
				$objHoverTip->Text = 'Scheduled for Shipment by ' . $this->GetLastTransactionUser()->__toString();
				$lblShipmentImage->HoverTip = $objHoverTip;
				$strToReturn = $lblShipmentImage->Render(false);
			}
			elseif ($objPendingReceipt = AssetTransaction::PendingReceipt($this->AssetId)) {
				$lblReceiptImage = new QLabelExt($objControl);
				$lblReceiptImage->HtmlEntities = false;
				$lblReceiptImage->Text = sprintf('<img src="%s/icons/receipt_datagrid.png" style="Vertical-align:middle;">', __IMAGE_ASSETS__);

				$objHoverTip = new QHoverTip($lblReceiptImage);
				$objHoverTip->Text = 'Scheduled for Receipt by ' . $this->GetLastTransactionUser()->__toString();
				$lblReceiptImage->HoverTip = $objHoverTip;
				$strToReturn = $lblReceiptImage->Render(false);
			}
			else {
				$strToReturn = '';
			}

			return $strToReturn;
		}
		
		public function LoadByAssetCodeWithCustomFields($strAssetCode) {
			Asset::QueryHelper($objDatabase);
			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::Asset);
			// escape Asset Tag
			$strAssetCode = QApplication::$Database[1]->SqlVariable($strAssetCode, false);
			// Setup the SQL Query
			$strQuery = sprintf("
				SELECT 
					`asset`.* 
					%s
				FROM 
					`asset` 
					%s
				WHERE `asset`.`asset_code` = %s
			", 
			$arrCustomFieldSql['strSelect'],
			$arrCustomFieldSql['strFrom'],
			$strAssetCode);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			$arrAssets = Asset::InstantiateDbResult($objDbResult);
      if(count($arrAssets)>0){
        return $arrAssets[0];
      }
      else {
        return null;
      }
		}

        public function LoadByAssetIdWithCustomFields($strAssetId) {
            Asset::QueryHelper($objDatabase);
            $arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::Asset);

            // Setup the SQL Query
            $strQuery = sprintf("
				SELECT
					`asset`.*
					%s
				FROM
					`asset`
					%s
				WHERE `asset`.`asset_id` = '%s'
			",
                $arrCustomFieldSql['strSelect'],
                $arrCustomFieldSql['strFrom'],
                $strAssetId);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            $arrAssets = Asset::InstantiateDbResult($objDbResult);
            if(count($arrAssets)>0){
                return $arrAssets[0];
            }
            else {
                return null;
            }
        }

		/**
		 * Load all Assets
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return Asset[]
		*/
		public static function LoadAllIntoArray($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Asset::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`asset`.`asset_id` AS `asset_id`,					
					`asset`.`asset_code` AS `asset_code`
				FROM
					`asset`					
				ORDER BY `asset`.`asset_id`');

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			
			$objToReturn = array();
			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;			
			$item = Array();
			while ($objDbRow = $objDbResult->GetNextRow()) {				
				$item['asset_id'] = $objDbRow->GetColumn('asset_id', 'Integer');
				$item['asset_code'] = $objDbRow->GetColumn('asset_code');
				array_push($objToReturn,$item);
			}						
			return $objToReturn;
		}

		// This adds the created by and creation date before saving a new asset
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
				parent::Save($blnForceInsert, $blnForceUpdate);

				// If we have no errors then will add the data to the helper table
				$objDatabase = Asset::GetDatabase();
				$strQuery = sprintf('INSERT INTO `asset_custom_field_helper` (`asset_id`) VALUES (%s);', $this->AssetId);
				$objDatabase->NonQuery($strQuery);
			}
			else {
				// The only way to fix not updating field on changing custom fields as it doesn't turns asset table
				$this->ModifiedBy = null;
				parent::Save($blnForceInsert, $blnForceUpdate);
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
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
		 * This returns an auto-generated asset code based on the minimum asset code value in the AdminSettings and the highest asset code in the assets table
		 * It will ignore any values that aren't strict integers
		 *
		 * @return integer
		 */
		public static function GenerateAssetCode() {
			$intMinAssetCode = QApplication::$TracmorSettings->MinAssetCode;

			$strQuery = "SELECT MAX(CAST(asset_code AS UNSIGNED)) AS max_asset_code FROM asset WHERE asset_code >= $intMinAssetCode AND asset_code REGEXP '^[0-9]+$'";

			$objDatabase = QApplication::$Database[1];

	    // Perform the Query
	    $objDbResult = $objDatabase->Query($strQuery);

	    $mixRow = $objDbResult->FetchRow();
	    if ($mixRow[0]) {
	    	$intAssetCode = $mixRow[0] + 1;
	    }
	    else {
	    	$intAssetCode = $intMinAssetCode;
	    }

			return $intAssetCode;
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
		 * Returns an array of objects that created the most recent transaction for this asset
		 *
		 * @return array of Object Account, Object AssetTransactionCheckout, string Note
		 */
		public function GetLastTransactionCheckoutObjectArray() {

			$objClauses = array();
			$objExpansionClause = QQ::Expand(QQN::AssetTransaction()->Transaction->CreatedByObject);
			$objOrderByClause = QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate, false);
			$objLimitClause = QQ::LimitInfo(1, 0);
			array_push($objClauses, $objExpansionClause);
			array_push($objClauses, QQ::Expand(QQN::AssetTransaction()->AssetTransactionCheckout->AssetTransactionCheckoutId));
			array_push($objClauses, $objOrderByClause);
			array_push($objClauses, $objLimitClause);

			$AssetTransactionArray = AssetTransaction::LoadArrayByAssetId($this->AssetId, $objClauses);
			/*$intLastAssetTransactionId = $AssetTransactionArray[0]->AssetTransactionId;
  		$objClauses = array();
  		array_push($objClauses, QQ::Expand(QQN::AssetTransactionCheckout()->ToContact));
  		array_push($objClauses, QQ::Expand(QQN::AssetTransactionCheckout()->ToUser));
  		$objAssetTransactionCheckout = AssetTransactionCheckout::QuerySingle(QQ::Equal(QQN::AssetTransactionCheckout()->AssetTransactionId, $intLastAssetTransactionId), $objClauses);*/
  		$objAssetTransactionCheckout = $AssetTransactionArray[0]->AssetTransactionCheckout;
			$objAccount = $AssetTransactionArray[0]->Transaction->CreatedByObject;
			$strReason = $AssetTransactionArray[0]->Transaction->Note;

			return array("objAssetTransactionCheckout" => $objAssetTransactionCheckout, "objAccount" => $objAccount, "strNote" => $strReason);
		}

		/**
		 * Returns a Location object from the most recent shipment transaction for this asset
		 *
		 * @return Object Location
		 */
		public function GetLastShippedFromLocation() {

			$objCondition = QQ::AndCondition(
				QQ::Equal(QQN::AssetTransaction()->AssetId, $this->AssetId),
				QQ::Equal(QQN::AssetTransaction()->Transaction->TransactionTypeId, 6)
			);
			$objClauses = array();
			$objExpansionClause = QQ::Expand(QQN::AssetTransaction()->SourceLocation);
			$objOrderByClause = QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate, false);
			$objLimitClause = QQ::LimitInfo(1, 0);
			array_push($objClauses, $objExpansionClause);
			array_push($objClauses, $objOrderByClause);
			array_push($objClauses, $objLimitClause);

			$AssetTransactionArray = AssetTransaction::QueryArray($objCondition,$objClauses);

			if (count($AssetTransactionArray) > 0) {
				$Location = $AssetTransactionArray[0]->SourceLocation;
			} else {
				$Location = null;
			}

			return $Location;
		}

		/**
		 * Returns due date of the asset that have been checked out
		 * else nothing
		 *
		 * @return string DueDate
		 */
		public function CheckoutDueDate() {
		  if ($this->blnCheckedOutFlag) {
		    $arrObjects = $this->GetLastTransactionCheckoutObjectArray();
				$objAssetTransactionCheckout = $arrObjects['objAssetTransactionCheckout'];
				if ($objAssetTransactionCheckout) {
				  if ($objAssetTransactionCheckout->DueDate) {
            return sprintf("%s", ($objAssetTransactionCheckout->DueDate) ? $objAssetTransactionCheckout->DueDate->format('m/d/Y g:i A') : "&nbsp;");
				  }
				}
		  }
		  return "&nbsp;";
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
		public static function CountBySearch($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $intReservedBy = null, $intCheckedOutBy = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $objExpansionMap = null) {

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

			$arrSearchSql = Asset::GenerateSearchSql($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::Asset);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::Asset);

			$strQuery = sprintf('
				SELECT
					COUNT(DISTINCT asset.asset_id) AS row_count
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
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrAttachmentSql['strFrom'], $arrCustomFieldSql['strFrom'],
			$arrSearchSql['strAssetCodeSql'], $arrSearchSql['strLocationSql'], $arrSearchSql['strAssetModelSql'], $arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strOffsiteSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strReservedBySql'], $arrSearchSql['strCheckedOutBySql'], $arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);

		}

		/**
     * Count the total assets by the search parameters using the asset_custom_field_helper table
     *
     * @param string $strAssetCode
     * @param int $intLocationId
     * @param int $intAssetModelId
     * @param int $intCategoryId
     * @param int $intManufacturerId
     * @param bool $blnOffsite
     * @param string $strAssetModelCode
     * @param integer $intReservedBy
     * @param integer $intCheckedOutBy
     * @param string $strShortDescription
     * @param array $arrCustomFields
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param bool $blnAttachment
     * @param array $objExpansionMap
     * @return integer Count
     */
		public static function CountBySearchHelper($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $intReservedBy = null, $intCheckedOutBy = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strModifiedCreated = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $objExpansionMap = null, $blnIncludeTBR = false, $blnIncludeShipped = false, $blnArchived = false, $intCheckedOutToUser = null, $intCheckedOutToContact = null, $blnChekcedOutPastDue = false) {

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

			$arrSearchSql = Asset::GenerateSearchSql($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strModifiedCreated, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $blnIncludeTBR, $blnIncludeShipped, $blnArchived, $intCheckedOutToUser, $intCheckedOutToContact, $blnChekcedOutPastDue);
			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::Asset);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::Asset);

			$strQuery = sprintf('
				SELECT
					COUNT(DISTINCT asset.asset_id) AS row_count
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
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrAttachmentSql['strFrom'], $arrCustomFieldSql['strFrom'],
			$arrSearchSql['strAssetCodeSql'], $arrSearchSql['strLocationSql'], $arrSearchSql['strAssetModelSql'], $arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strOffsiteSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strReservedBySql'], $arrSearchSql['strCheckedOutBySql'], $arrSearchSql['strCheckedOutToUserSql'], $arrSearchSql['strCheckedOutToContactSql'], $arrSearchSql['strCheckedOutPastDueSql'], $arrSearchSql['strArchivedSql'], $arrSearchSql['strIncludeTBRSql'], $arrSearchSql['strIncludeShippedSql'], $arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);

			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);

		}

	/**
	 * Count Active (non-archived) Assets
	 * @return int
	 */
	public static function CountActive() {
		// Call Asset:QueryCount to perform the Count query
		$intAssetCount = Asset::QueryCount(QQ::All());
		$intArchivedCount = Asset::QueryCount(QQ::Equal(QQN::Asset()->ArchivedFlag, 1));
		return ($intAssetCount - $intArchivedCount);
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
		public static function LoadArrayBySearch($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $intReservedBy = null, $intCheckedOutBy = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {

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

			$arrSearchSql = Asset::GenerateSearchSql($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::Asset);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::Asset);

			$strQuery = sprintf('
				SELECT
					%s
					`asset`.`asset_id` AS `asset_id`,
					`asset`.`asset_model_id` AS `asset_model_id`,
					`asset`.`location_id` AS `location_id`,
					`asset`.`asset_code` AS `asset_code`,
					`asset`.`image_path` AS `image_path`,
					`asset`.`checked_out_flag` AS `checked_out_flag`,
					`asset`.`reserved_flag` AS `reserved_flag`,
					`asset`.`archived_flag` AS `archived_flag`,
					`asset`.`created_by` AS `created_by`,
					`asset`.`creation_date` AS `creation_date`,
					`asset`.`modified_by` AS `modified_by`,
					`asset`.`modified_date` AS `modified_date`
					%s
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
				%s
				%s
				%s
				%s
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"), $arrCustomFieldSql['strSelect'], $arrAttachmentSql['strSelect'],
				$objQueryExpansion->GetFromSql("", "\n					"), $arrCustomFieldSql['strFrom'], $arrAttachmentSql['strFrom'],
				$arrSearchSql['strAssetCodeSql'], $arrSearchSql['strLocationSql'], $arrSearchSql['strAssetModelSql'], $arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strOffsiteSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strReservedBySql'], $arrSearchSql['strCheckedOutBySql'], $arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
				$arrSearchSql['strAuthorizationSql'], $arrAttachmentSql['strGroupBy'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);

			return Asset::InstantiateDbResult($objDbResult);

		}

		/**
     * Load an array of Asset objects
		 * by search parameters using the helper table
     *
     * @param string $strAssetCode
     * @param int $intLocationId
     * @param int $intAssetModelId
     * @param int $intCategoryId
     * @param int $intManufacturerId
     * @param bool $blnOffsite
     * @param string $strAssetModelCode
     * @param integer $intReservedBy
     * @param integer $intCheckedOutBy
     * @param string $strShortDescription
     * @param array $arrCustomFields
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param bool $blnAttachment
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return Asset[]
     */
		public static function LoadArrayBySearchHelper($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $intReservedBy = null, $intCheckedOutBy = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strModifiedCreated, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null, $blnIncludeTBR = false, $blnIncludeShipped = false, $blnArchived = false, $intCheckedOutToUser = null, $intCheckedOutToContact = null, $blnChekcedOutPastDue = false, $intAssetId = null) {

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

			$arrSearchSql = Asset::GenerateSearchSql($strAssetCode, $intLocationId, $intAssetModelId, $intCategoryId, $intManufacturerId, $blnOffsite, $strAssetModelCode, $intReservedBy, $intCheckedOutBy, $strShortDescription, $arrCustomFields, $strDateModified, $strModifiedCreated, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment, $blnIncludeTBR, $blnIncludeShipped, $blnArchived, $intCheckedOutToUser, $intCheckedOutToContact, $blnChekcedOutPastDue, $intAssetId);
			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::Asset);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::Asset);

			$strQuery = sprintf('
				SELECT
					%s
					`asset`.`asset_id` AS `asset_id`,
					`asset`.`asset_model_id` AS `asset_model_id`,
					`asset`.`location_id` AS `location_id`,
					`asset`.`asset_code` AS `asset_code`,
					`asset`.`parent_asset_id` AS `parent_asset_id`,
					`asset`.`image_path` AS `image_path`,
					`asset`.`checked_out_flag` AS `checked_out_flag`,
					`asset`.`reserved_flag` AS `reserved_flag`,
					`asset`.`archived_flag` AS `archived_flag`,
					`asset`.`created_by` AS `created_by`,
					`asset`.`creation_date` AS `creation_date`,
					`asset`.`modified_by` AS `modified_by`,
					`asset`.`modified_date` AS `modified_date`
					%s
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
				$arrSearchSql['strAssetCodeSql'], $arrSearchSql['strLocationSql'], $arrSearchSql['strAssetModelSql'], $arrSearchSql['strCategorySql'], $arrSearchSql['strManufacturerSql'], $arrSearchSql['strOffsiteSql'], $arrSearchSql['strAssetModelCodeSql'], $arrSearchSql['strReservedBySql'], $arrSearchSql['strCheckedOutBySql'], $arrSearchSql['strCheckedOutToUserSql'], $arrSearchSql['strCheckedOutToContactSql'], $arrSearchSql['strCheckedOutPastDueSql'], $arrSearchSql['strAssetIdSql'], $arrSearchSql['strArchivedSql'], $arrSearchSql['strIncludeTBRSql'], $arrSearchSql['strIncludeShippedSql'], $arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
				$arrSearchSql['strAuthorizationSql'], $arrAttachmentSql['strGroupBy'],
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
	  protected static function GenerateSearchSql ($strAssetCode = null, $intLocationId = null, $intAssetModelId = null, $intCategoryId = null, $intManufacturerId = null, $blnOffsite = false, $strAssetModelCode = null, $intReservedBy = null, $intCheckedOutBy = null, $strShortDescription = null, $arrCustomFields = null, $strDateModified = null, $strModifiedCreated, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $blnIncludeTBR = null, $blnIncludeShipped = null, $blnIncludeArchived = null, $intCheckedOutToUser = null, $intCheckedOutToContact = null, $blnChekcedOutPastDue = false, $intAssetId = null) {

	  	// Define all indexes for the array to be returned
			$arrSearchSql = array("strAssetCodeSql" => "", "strLocationSql" => "", "strAssetModelSql" => "", "strCategorySql" => "", "strManufacturerSql" => "", "strOffsiteSql" => "", "strAssetModelCodeSql" => "", "strReservedBySql" => "", "strCheckedOutBySql" => "", "strShortDescriptionSql" => "", "strCustomFieldsSql" => "", "strDateModifiedSql" => "", "strAuthorizationSql" => "", "strAttachmentSql" => "", "strArchivedSql" => "", "strIncludeTBRSql" => "", "strIncludeShippedSql" => "", "strCheckedOutToUserSql" => "", "strCheckedOutToContactSql" => "", "strCheckedOutPastDueSql" => "", "strAssetIdSql" => "");

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
			if ($intAssetId) {
				$intAssetId = QApplication::$Database[1]->SqlVariable($intAssetId, true);
				$arrSearchSql['strAssetIdSql'] = sprintf("AND `asset` . `asset_id`%s", $intAssetId);
			}
			
			/*if (!$blnOffsite && !$intLocationId && !$blnIncludeShipped && !$blnIncludeTBR) {
				$arrSearchSql['strOffsiteSql'] = "AND `asset` . `location_id` != 2 AND `asset` . `location_id` != 5";
			}*/
			if ($strShortDescription) {
				$strShortDescription = QApplication::$Database[1]->SqlVariable("%" . $strShortDescription . "%", false);
				$arrSearchSql['strShortDescriptionSql'] = "AND `asset__asset_model_id`.`short_description` LIKE $strShortDescription";
			}
			if ($strAssetModelCode) {
				$strAssetModelCode = QApplication::$Database[1]->SqlVariable("%" . $strAssetModelCode . "%", false);
				$arrSearchSql['strAssetModelCodeSql'] = "AND `asset__asset_model_id`.`asset_model_code` LIKE $strAssetModelCode";
			}
/*			if ($intReservedBy) {
				$arrSearchSql['strReservedBySql'] = sprintf("AND `asset` . `reserved_flag` = true", $intReservedBy);
				if ($intReservedBy != 'any') {
					$intReservedBy = QApplication::$Database[1]->SqlVariable($intReservedBy, true);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strReservedBySql'] .= sprintf("\nAND (SELECT `created_by` FROM `transaction` WHERE `transaction_type_id` = 8 ORDER BY creation_date DESC LIMIT 0,1)%s", $intReservedBy);
				}
			}
			if ($intCheckedOutBy) {
				$arrSearchSql['strCheckedOutBySql'] = sprintf("AND `asset` . `checked_out_flag` = true", $intCheckedOutBy);
				if ($intCheckedOutBy != 'any') {
					$intCheckedOutBy = QApplication::$Database[1]->SqlVariable($intCheckedOutBy, true);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strCheckedOutBySql'] .= sprintf("\nAND (SELECT `created_by` FROM `transaction` WHERE `transaction_type_id` = 3 ORDER BY creation_date DESC LIMIT 0,1)%s", $intCheckedOutBy);
				}
			}		*/
			if ($intReservedBy) {
				$arrSearchSql['strReservedBySql'] = sprintf("AND `asset` . `reserved_flag` = true");
				if ($intReservedBy != 'any') {
					$intReservedBy = QApplication::$Database[1]->SqlVariable($intReservedBy, true);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strReservedBySql'] .= sprintf("\nAND (SELECT `created_by` FROM `asset_transaction` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)%s", $intReservedBy);
				}
			}
			if ($intCheckedOutBy) {
				$arrSearchSql['strCheckedOutBySql'] = sprintf("AND `asset` . `checked_out_flag` = true");
				if ($intCheckedOutBy != 'any') {
					$intCheckedOutBy = QApplication::$Database[1]->SqlVariable($intCheckedOutBy, true);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strCheckedOutBySql'] .= sprintf("\nAND (SELECT `created_by` FROM `asset_transaction` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)%s", $intCheckedOutBy);
				}
			}

			if ($intCheckedOutToUser) {
			  // Excepts duplicates
				//if (!$intCheckedOutBy)
				  $arrSearchSql['strCheckedOutToUserSql'] = sprintf("AND `asset` . `checked_out_flag` = true");
				/*else
				  $arrSearchSql['strCheckedOutToUserSql'] = "";*/
				if ($intCheckedOutToUser != 'any') {
					$intCheckedOutToUser = QApplication::$Database[1]->SqlVariable($intCheckedOutToUser, true);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strCheckedOutToUserSql'] .= sprintf("\nAND (SELECT `to_user_id` FROM `asset_transaction` LEFT JOIN `asset_transaction_checkout` ON `asset_transaction`.`asset_transaction_id` = `asset_transaction_checkout`.`asset_transaction_id` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)%s", $intCheckedOutToUser);
				}
				else {
				  $arrSearchSql['strCheckedOutToUserSql'] .= sprintf("\nAND (SELECT `to_user_id` FROM `asset_transaction` LEFT JOIN `asset_transaction_checkout` ON `asset_transaction`.`asset_transaction_id` = `asset_transaction_checkout`.`asset_transaction_id` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)IS NOT NULL");
				}
			}

			if ($intCheckedOutToContact) {
			  // Excepts duplicates
				if (!$intCheckedOutBy && !$intCheckedOutToUser)
				  $arrSearchSql['strCheckedOutToContactSql'] = sprintf("AND `asset` . `checked_out_flag` = true");
				else
				  $arrSearchSql['strCheckedOutToContactSql'] = "";
				if (strpos($intCheckedOutToContact, 'any') === false) {
					$intCheckedOutToContact = QApplication::$Database[1]->SqlVariable($intCheckedOutToContact, true);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strCheckedOutToContactSql'] .= sprintf("\nAND (SELECT `to_contact_id` FROM `asset_transaction` LEFT JOIN `asset_transaction_checkout` ON `asset_transaction`.`asset_transaction_id` = `asset_transaction_checkout`.`asset_transaction_id` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)%s", $intCheckedOutToContact);
				}
				elseif ($intCheckedOutToContact != 'any') {
				  // Gets company id
				  $intCompanyId = intval(substr($intCheckedOutToContact, 4));
				  $arrSearchSql['strCheckedOutToUserSql'] .= sprintf("\nAND (SELECT `to_contact_id` FROM `asset_transaction` LEFT JOIN `asset_transaction_checkout` ON `asset_transaction`.`asset_transaction_id` = `asset_transaction_checkout`.`asset_transaction_id` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1) IN (SELECT `contact_id` FROM `contact` WHERE `company_id`='%s')", $intCompanyId);
				}
				else {
				  $arrSearchSql['strCheckedOutToUserSql'] .= sprintf("\nAND (SELECT `to_contact_id` FROM `asset_transaction` LEFT JOIN `asset_transaction_checkout` ON `asset_transaction`.`asset_transaction_id` = `asset_transaction_checkout`.`asset_transaction_id` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)IS NOT NULL");
				}
			}

			if ($blnChekcedOutPastDue) {
			  if (!$intCheckedOutBy && !$intCheckedOutToUser && !$intCheckedOutToContact)
				  $arrSearchSql['strCheckedOutPastDueSql'] = sprintf("AND `asset` . `checked_out_flag` = true");
				else
				  $arrSearchSql['strCheckedOutPastDueSql'] = "";
				$dttNow = new QDateTime(QDateTime::Now);
					// This uses a subquery, and as such cannot be converted to QQuery without hacking as of 2/22/07
					$arrSearchSql['strCheckedOutPastDueSql'] .= sprintf("\nAND (SELECT `asset_transaction_checkout`.`due_date` FROM `asset_transaction` LEFT JOIN `asset_transaction_checkout` ON `asset_transaction`.`asset_transaction_id` = `asset_transaction_checkout`.`asset_transaction_id` WHERE `asset_transaction`.`asset_id` = `asset`.`asset_id` ORDER BY `asset_transaction`.`creation_date` DESC LIMIT 0,1)<'%s'", $dttNow->format('Y-m-d h:i:s'));
			}

			if ($strDateModified) {

				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset`.`%s`) < %s", $strModifiedCreated, $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset`.`%s`) > %s", $strModifiedCreated, $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`asset`.`%s`) > %s", $strModifiedCreated, $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`asset`.`%s`) < %s", $strModifiedCreated, $strDateModifiedLast);
				}
			}
			if ($blnAttachment) {
				$arrSearchSql['strAttachmentSql'] = sprintf("AND attachment.attachment_id IS NOT NULL");
			}

			if (!$blnIncludeTBR) {
				$arrSearchSql['strIncludeTBRSql'] = sprintf("AND `asset`.`location_id`!='5'");
			}

			if (!$blnIncludeShipped) {
				$arrSearchSql['strIncludeShippedSql'] = sprintf("AND `asset`.`location_id`!='2'");
			}

			if (!$blnIncludeArchived) {
				$arrSearchSql['strArchivedSql'] = sprintf("AND `asset`.`archived_flag` IS NOT TRUE");
			}

			if ($arrCustomFields) {
				$arrSearchSql['strCustomFieldsSql'] = CustomField::GenerateSearchHelperSql($arrCustomFields, EntityQtype::Asset);
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

		/**
		 * Loads array of Child Linked Asset Objects
		 *
		 * @param int $intParentAssetId AssetId of the parent asset to load linked assets
		 * @return mixed
		 */
		/*public function LoadChildLinkedArrayByParentAssetId($intParentAssetId) {
		  $objLinkedAssetArray = array();
		  $objChildAssetArray = Asset::LoadArrayByParentAssetIdLinkedFlag($intParentAssetId, 1);
		  if ($objChildAssetArray && count($objChildAssetArray)) {
        foreach ($objChildAssetArray as $objLinkedAsset) {
        	$objLinkedAssetArray[] = $objLinkedAsset;
        	$objNewLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objLinkedAsset->AssetId);
        	if ($objNewLinkedAssetArray) {
          	foreach ($objNewLinkedAssetArray as $objLinkedAsset2) {
          	  $objLinkedAssetArray[] = $objLinkedAsset2;
          	}
        	}
        }
        return $objLinkedAssetArray;
		  }
		  else {
		    return false;
		  }
		}*/

		/**
		 * Loads array of Child Linked Asset Objects with custom field virtual attributes
		 *
		 * @param int $intParentAssetId AssetId of the parent asset to load linked assets
		 * @return mixed
		 */
		public function LoadChildLinkedArrayByParentAssetId($intParentAssetId) {
			$objLinkedAssetArray = array();
			
			Asset::QueryHelper($objDatabase);
			$arrCustomFieldSql = CustomField::GenerateHelperSql(EntityQtype::Asset);

			// Setup the SQL Query
			$strQuery = sprintf("
				SELECT 
					`asset`.* 
					%s
				FROM 
					`asset` 
					%s
				WHERE `asset`.`parent_asset_id` = %s
				AND `asset`.`linked_flag` = 1
			", 
			$arrCustomFieldSql['strSelect'],
			$arrCustomFieldSql['strFrom'],
			$intParentAssetId);
			
			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);

			$objChildAssetArray = Asset::InstantiateDbResult($objDbResult);

			if ($objChildAssetArray && count($objChildAssetArray)) {
				foreach ($objChildAssetArray as $objLinkedAsset) {
					$objLinkedAssetArray[] = $objLinkedAsset;
					$objNewLinkedAssetArray = Asset::LoadChildLinkedArrayByParentAssetId($objLinkedAsset->AssetId);
				
					if ($objNewLinkedAssetArray) {
						foreach ($objNewLinkedAssetArray as $objLinkedAsset2) {
							$objLinkedAssetArray[] = $objLinkedAsset2;
						}
					}
				}
				return $objLinkedAssetArray;
			} else {
				return false;
			}
		}

		/**
		 * Set the child's parent_asset_code to NULL by Parent Asset Code
		 *
		 * @param string $strAssetCode
		 */
		public function ResetParentAssetIdToNullByAssetId($intAssetId) {
		  $strQuery = sprintf("
				UPDATE
					`asset` AS `asset`
				SET
				  `asset`.`parent_asset_id` = NULL,
				  `asset`.`linked_flag` = NULL
				WHERE
				  `asset`.`parent_asset_id` = '%s'
			", $intAssetId);

		  $objDatabase = QApplication::$Database[1];
		  $objDatabase->NonQuery($strQuery);
		}

		/**
		 * Delete all audit_scan records for this AssetId
		 *
		 * @param string $intAssetId
		 */
		public function DeleteAuditScanByAssetId($intAssetId) {
		  $strQuery = sprintf("
				DELETE
				  `audit_scan`.*
				FROM
				  `audit_scan`, `audit`
				WHERE
				  `audit_scan`.`entity_id` = '%s' AND `audit_scan`.`audit_id` = `audit`.`audit_id` AND `audit`.`entity_qtype_id` = 1",
		  $intAssetId);

		  $objDatabase = QApplication::$Database[1];
		  $objDatabase->NonQuery($strQuery);
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
				// AssetId was added so that it can be set to 0 in receipt_edit.php when creating new assets
				// It provides a manner of creating a new, assignable asset (like AssetTransaction->Asset) without saving it to the db
				case 'AssetId':
					/**
					 * Sets the value for intAssetId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAssetId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				// TempId is used as a unique identifier in receipt_edit.php (and possible shipment_edit.php) when AssetId is set to 0
				case 'TempId':
					/**
					 * Sets the value for intTempId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTempId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'TempId':
					/**
					 * Gets the value for intAssetId (Read-Only PK)
					 * @return integer
					 */
					return $this->intTempId;

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
