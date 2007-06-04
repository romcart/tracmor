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
	require(__DATAGEN_CLASSES__ . '/ReceiptGen.class.php');

	/**
	 * The Receipt class defined here contains any
	 * customized code for the Receipt class in the
	 * Object Relational Model.  It represents the "receipt" table 
	 * in the database, and extends from the code generated abstract ReceiptGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Receipt extends ReceiptGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objReceipt->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->intReceiptNumber);
		}

		/**
		 * Returns the status of a Receipt based on it's ReceivedFlag
		 *
		 * @return string that says either Received or Pending
		 */
		public function __toStringStatus() {
			
			if ($this->ReceivedFlag) {
				$strToReturn = 'Received';
			}
			else {
				$strToReturn = 'Pending';
			}
			return sprintf('%s', $strToReturn);
		}
		
		/**
		 * Returns the status (styled) of a Receipt based on it's ReceivedFlag
		 *
		 * @return string that says either Received or Pending
		 */
		public function __toStringStatusStyled() {
			
			if ($this->ReceivedFlag) {
				$strToReturn = 'Received';
			}
			elseif ($this->DueDate && $this->DueDate->IsEarlierThan(new QDateTime(QDateTime::Now)) ) {
				$now = new QDateTime(QDateTime::Now);
				$dtsDifference = $now->Difference($this->DueDate);
				$strToReturn = sprintf('<strong style="color:#BC3500;">Pending</strong>', $dtsDifference->Days);
			}
			else {
				$strToReturn = '<strong style="color:#CC9933;">Pending</strong>';
			}
			return sprintf('%s', $strToReturn);
		}

		/**
		 * Returns the status (with hovertip) of a Receipt based on it's ReceivedFlag
		 * 
		 * @param QDatagrid Object $objControl
		 * @return string that says either Received or Pending with a hovertip if the Receipt is overdue
		 */
		public function __toStringStatusWithHovertip($objControl) {
			
			$dtsDueDate = new QDateTime($this->DueDate);
			$dtsToday = new QDateTime(date('Y-m-d'));
			
			if ($this->ReceivedFlag) {
				$strToReturn = 'Received';
			}
			elseif ($this->DueDate && $dtsDueDate->IsEarlierThan($dtsToday) ) {
				//$now = new QDateTime(QDateTime::Now);
				$dtsDifference = $dtsToday->Difference($dtsDueDate);
				
				$lblStatus = new QLabelExt($objControl);
				$lblStatus->HtmlEntities = false;
				$lblStatus->Text = '<strong style="color:#BC3500;">Pending</strong>';
			
				// create hovertip
				$objHoverTip = new QHoverTip($lblStatus);
				$lblOverdue = new QLabel($objHoverTip);
				$lblOverdue->Text = ($dtsDifference->Days == 0) ? 'Due today' : sprintf('%s days overdue',$dtsDifference->Days);
				$objHoverTip->AutoRenderChildren = true;
				$lblStatus->HoverTip = $objHoverTip;
				
				$strToReturn = $lblStatus->Render(false);
				
			}
			elseif ($this->DueDate && ($dtsDueDate->IsLaterThan($dtsToday) || ($dtsDueDate->IsEqualTo($dtsToday)))) {
				$dtsDifference = $dtsDueDate->Difference($dtsToday);	
				
				$lblStatus = new QLabelExt($objControl);
				$lblStatus->HtmlEntities = false;
				$lblStatus->Text = '<strong style="color:#CC9933">Pending</strong>';
				
				// create hovertip
				$objHoverTip = new QHoverTip($lblStatus);
				$lblDueIn = new QLabel($objHoverTip);
				$lblDueIn->Text = ($dtsDifference->Days == 0) ? 'Due today': sprintf('Due in %s days',$dtsDifference->Days);
				$objHoverTip->AutoRenderChildren = true;
				$lblStatus->HoverTip = $objHoverTip;
							
				$strToReturn = $lblStatus->Render(false);
			}
			else {
				$strToReturn = '<strong style="color:#CC9933;">Pending</strong>';
			}
			return sprintf('%s', $strToReturn);
		}		
		
		/**
		 * Returns the Default __toString (receipt number) with a link to the receipt record
		 *
		 * @param string $CssClass
		 * @return string with link and receipt number
		 */
		public function __toStringWithLink($CssClass = null) {
			return sprintf('<a href="../receiving/receipt_edit.php?intReceiptId=%s" class="%s">%s</a>', $this->intReceiptId, $CssClass, $this->__toString());
		}
		
		/**
		 * Returns the HTML needed for a receipt datagrid to show asset and inventory icons, with hovertips.
		 *
		 * @param QDatagrid Object $objControl
		 * @return string
		 */
		public function __toStringHoverTips($objControl) {
			
			// Create the Asset Image label, with corresponding assets hovertip
			if ($this->Transaction->EntityQtypeId == EntityQtype::AssetInventory || $this->Transaction->EntityQtypeId == EntityQtype::Asset) {
				$lblAssetImage = new QLabelExt($objControl);
				$lblAssetImage->HtmlEntities = false;
				$lblAssetImage->Text = sprintf('<img src="%s/icons/asset_datagrid.png" style="vertical-align:middle;">', __IMAGE_ASSETS__);
				
				// create
				$objHoverTip = new QHoverTip($lblAssetImage);
				$objHoverTip->Template = __DOCROOT__ . __SUBDIRECTORY__ . '/receiving/hovertip_assets.tpl.php';
				$lblAssetImage->HoverTip = $objHoverTip;
				
				// Load the AssetTransaction Array on the form so that it can be used by the hovertip panel
				$objClauses = array();
				if ($objClause = QQ::LimitInfo(11, 0))
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->Asset->AssetModel))
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->SourceLocation));
					array_push($objClauses, $objClause);
				$objControl->Form->objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->TransactionId, $objClauses);
				$objClauses = null;
			}
			
			// Create the Inventory Image label with corresponding inventory hovertip
			if ($this->Transaction->EntityQtypeId == EntityQtype::AssetInventory || $this->Transaction->EntityQtypeId == EntityQtype::Inventory) {
				$lblInventoryImage = new QLabelExt($objControl);
				$lblInventoryImage->HtmlEntities = false;
				$lblInventoryImage->Text = sprintf('<img src="%s/icons/inventory_datagrid.png" style="vertical-align:middle;"', __IMAGE_ASSETS__);
				
				// Create the inventory hovertip
				$objHoverTip = new QHoverTip($lblInventoryImage);
				$objHoverTip->Template = __DOCROOT__ . __SUBDIRECTORY__ . '/receiving/hovertip_inventory.tpl.php';
				$lblInventoryImage->HoverTip = $objHoverTip;
				
				// Load the InventoryTransaction Array on the form so that it can be used by the hovertip panel
				$objClauses = array();
				if ($objClause = QQ::LimitInfo(11, 0))
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::InventoryTransaction()->InventoryLocation->InventoryModel));
					array_push($objClauses, $objClause);
				$objControl->Form->objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->TransactionId, $objClauses);
				$objClauses = null;
			}
			
			// Display the appropriate images
			if ($this->Transaction->EntityQtypeId == EntityQtype::AssetInventory) {
				$strToReturn = $lblAssetImage->Render(false) . '&nbsp;' . $lblInventoryImage->Render(false);
			}
			elseif ($this->Transaction->EntityQtypeId == EntityQtype::Asset) {
				$strToReturn = $lblAssetImage->Render(false);
			}
			elseif ($this->Transaction->EntityQtypeId == EntityQtype::Inventory) {
				$strToReturn = $lblInventoryImage->Render(false);
			}
			return $strToReturn;
		}		

		/**
		 * Returns a new and unique receipt number.
		 * Selects the MAX receipt number and adds 1.
		 * If no receipt number exists in the DB, starts with 1000.
		 *
		 * @return integer Receipt Number
		 */
		public static function LoadNewReceiptNumber() {
			
			Receipt::QueryHelper($objDatabase);
			
			$strQuery = 'SELECT MAX(receipt_number) AS max_receipt_number FROM receipt';
			// Perform the Query and Return the Count
			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			if ($strDbRow[0]) {
				return QType::Cast($strDbRow[0], QType::Integer) + 1;
			}
			else {
				return 1000;
			}
		}
		
		// This adds the created by and creation date before saving a new receipt
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
     * Count the total companies based on the submitted search criteria
     *
     * @param string $strFromCompany
     * @param string $strFromContact
     * @param string $strReceiptNumber
     * @param string $strAssetCode
     * @param string $strInventoryModelCode
     * @param int $intStatus
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param array $objExpansionMap
     * @return integer Count
     */		
		public static function CountBySearch($strFromCompany = null, $strFromContact = null, $strReceiptNumber = null, $strAssetCode = null, $strInventoryModelCode = null, $intStatus = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $objExpansionMap = null) {
		
			// Call to QueryHelper to Get the Database Object		
			Receipt::QueryHelper($objDatabase);
			
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Receipt::ExpandQuery('receipt', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			
			$arrSearchSql = Receipt::GenerateSearchSql($strFromCompany, $strFromContact, $strReceiptNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					COUNT(DISTINCT receipt.receipt_id) AS row_count
				FROM
					`receipt` AS `receipt`
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
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrSearchSql['strAssetCodeFromSql'], $arrSearchSql['strInventoryModelCodeFromSql'],
			$arrSearchSql['strFromCompanySql'], $arrSearchSql['strFromContactSql'], $arrSearchSql['strReceiptNumberSql'], $arrSearchSql['strAssetCodeSql'], $arrSearchSql['strInventoryModelCodeSql'], $arrSearchSql['strStatusSql'], $arrSearchSql['strDateModifiedSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}
		
    /**
     * Load an array of Receipt objects
		 * by Company, Contact, Receipt Number, Asset Code, InventoryModelCode, or Status
     *
     * @param string $strFromCompany
     * @param string $strFromContact
     * @param string $strReceiptNumber
     * @param string $strAssetCode
     * @param string $strInventoryModelCode
     * @param int $intStatus
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return Receipt[]
     */
		public static function LoadArrayBySearch($strFromCompany = null, $strFromContact = null, $strReceiptNumber = null, $strAssetCode = null, $strInventoryModelCode = null, $intStatus = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			Receipt::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Receipt::ExpandQuery('receipt', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
					
			$arrSearchSql = Receipt::GenerateSearchSql($strFromCompany, $strFromContact, $strReceiptNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					%s
					DISTINCT
					`receipt`.`receipt_id` AS `receipt_id`,
					`receipt`.`transaction_id` AS `transaction_id`,
					`receipt`.`from_company_id` AS `from_company_id`,
					`receipt`.`from_contact_id` AS `from_contact_id`,
					`receipt`.`to_contact_id` AS `to_contact_id`,
					`receipt`.`to_address_id` AS `to_address_id`,
					`receipt`.`receipt_number` AS `receipt_number`,
					`receipt`.`due_date` AS `due_date`,
					`receipt`.`receipt_date` AS `receipt_date`,
					`receipt`.`received_flag` AS `received_flag`,
					`receipt`.`created_by` AS `created_by`,
					`receipt`.`creation_date` AS `creation_date`,
					`receipt`.`modified_by` AS `modified_by`,
					`receipt`.`modified_date` AS `modified_date`
					%s
				FROM
					`receipt` AS `receipt`
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
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"),
				$objQueryExpansion->GetFromSql("", "\n					"), $arrSearchSql['strAssetCodeFromSql'], $arrSearchSql['strInventoryModelCodeFromSql'],
				$arrSearchSql['strFromCompanySql'], $arrSearchSql['strFromContactSql'], $arrSearchSql['strReceiptNumberSql'], $arrSearchSql['strAssetCodeSql'], $arrSearchSql['strInventoryModelCodeSql'], $arrSearchSql['strStatusSql'], $arrSearchSql['strDateModifiedSql'],
				$arrSearchSql['strAuthorizationSql'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return Receipt::InstantiateDbResult($objDbResult);			
		}
		
		// Returns an array of SQL strings to be used in either the Count or Load BySearch queries
	  protected static function GenerateSearchSql ($strFromCompany = null, $strFromContact = null, $strReceiptNumber = null, $strAssetCode = null, $strInventoryModelCode = null, $intStatus = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null) {

	  	$arrSearchSql = array("strFromCompanySql" => "", "strFromContactSql" => "", "strReceiptNumberSql" => "","strAssetCodeFromSql" => "", "strAssetCodeSql" => "","strInventoryModelCodeFromSql" => "", "strInventoryModelCodeSql" => "", "strStatusSql" => "", "strDateModifiedSql" => "", "strAuthorizationSql" => "");
	  	
			if ($strFromCompany) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strFromCompany = QApplication::$Database[1]->SqlVariable("%" . $strFromCompany . "%", false);
				$arrSearchSql['strFromCompanySql'] = "AND `receipt__from_company_id` . `short_description` LIKE $strFromCompany";
			}
			if ($strFromContact) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strFromContact = QApplication::$Database[1]->SqlVariable("%" . $strFromContact . "%", false);
				$arrSearchSql['strFromContactSql'] = "AND (`receipt__from_contact_id` . `first_name` LIKE $strFromContact";
				$arrSearchSql['strFromContactSql'] .= " OR `receipt__from_contact_id` . `last_name` LIKE $strFromContact";
				$arrSearchSql['strFromContactSql'] .= " OR CONCAT(`receipt__from_contact_id` . `first_name`, ' ', `receipt__from_contact_id` . `last_name`) LIKE $strFromContact)";
			}
			if ($strReceiptNumber) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strReceiptNumber = QApplication::$Database[1]->SqlVariable("%" . $strReceiptNumber . "%", false);
				$arrSearchSql['strReceiptNumberSql'] = "AND `receipt` . `receipt_number` LIKE $strReceiptNumber";
			}
			if ($strAssetCode) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strAssetCode = QApplication::$Database[1]->SqlVariable("%" . $strAssetCode . "%", false);
				$arrSearchSql['strAssetCodeFromSql'] = ",`asset_transaction`, `asset`";
				$arrSearchSql['strAssetCodeSql'] = "AND `receipt` . `transaction_id`=`asset_transaction`.`transaction_id` AND `asset_transaction`.`asset_id`=`asset`.`asset_id` AND `asset`.`asset_code` LIKE $strAssetCode";
			}
			if ($strInventoryModelCode) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strInventoryModelCode = QApplication::$Database[1]->SqlVariable("%" . $strInventoryModelCode . "%", false);
				$arrSearchSql['strInventoryModelCodeFromSql'] = ",`inventory_transaction`, `inventory_location`, `inventory_model`";
				$arrSearchSql['strInventoryModelCodeSql'] = "AND `receipt` . `transaction_id`=`inventory_transaction`.`transaction_id` AND `inventory_transaction`.`inventory_location_id`=`inventory_location`.`inventory_location_id` AND `inventory_location`.`inventory_model_id`=`inventory_model`.`inventory_model_id` AND `inventory_model`.`inventory_model_code` LIKE $strInventoryModelCode";
			}
			if ($intStatus) {
				// Pending
				if ($intStatus == 1) {
					$intStatus = QApplication::$Database[1]->SqlVariable($intStatus, true);
					$arrSearchSql['strStatusSql'] = "AND `receipt` . `received_flag` = false";
				}
				// Received
				elseif ($intStatus == 2) {
					$intStatus = QApplication::$Database[1]->SqlVariable($intStatus, true);
					$arrSearchSql['strStatusSql'] = "AND `receipt` . `received_flag` = true";
				}
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`receipt`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`receipt`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am 
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`receipt`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`receipt`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}
			
			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql(6);			

			return $arrSearchSql;
	  }
	}
?>