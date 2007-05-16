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
	require(__DATAGEN_CLASSES__ . '/ShipmentGen.class.php');

	/**
	 * The Shipment class defined here contains any
	 * customized code for the Shipment class in the
	 * Object Relational Model.  It represents the "shipment" table 
	 * in the database, and extends from the code generated abstract ShipmentGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Shipment extends ShipmentGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objShipment->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->intShipmentNumber);
		}
		
		/**
		 * Returns the status of a Shipment based on it's ShippedFlag
		 *
		 * @return string that says either Shipped or Pending
		 */
		public function __toStringStatus() {
			
			if ($this->ShippedFlag) {
				$strToReturn = 'Shipped';
			}
			else {
				$strToReturn = 'Pending';
			}
			return sprintf('%s', $strToReturn);
		}
		
		/**
		 * Returns the styled status of a Shipment based on it's ShippedFlag
		 *
		 * @return string (styled) that says either Shipped or Pending
		 */
		public function __toStringStatusStyled() {
			
			if ($this->ShippedFlag) {
				$strToReturn = 'Shipped';
			}
			else {
				$strToReturn = '<strong style="color:#bc3500;">Pending</strong>';
			}
			return sprintf('%s', $strToReturn);
		}		
		
		/**
		 * Returns the Default __toString (shipment number) with a link to the shipment record
		 *
		 * @param string $CssClass
		 * @return string with link and shipment number
		 */
		public function __toStringWithLink($CssClass = null) {
			return sprintf('<a href="../shipping/shipment_edit.php?intShipmentId=%s" class="%s">%s</a>', $this->intShipmentId, $CssClass, $this->__toString());
		}
		
		public function __toStringTrackingNumber($CssClass = null) {
			if ($this->CourierId == 1) {
				// FedEx Shipment
				$strToReturn = sprintf('<a href="http://www.fedex.com/Tracking?action=track&tracknumbers=%s" target="_blank">%s</a>', $this->TrackingNumber, $this->TrackingNumber);
			}
			elseif ($this->TrackingNumber && QApplication::$TracmorSettings->AutodetectTrackingNumbers) {
				// Attempt auto-detection of tracking number
				$strTrackingNumber = strtoupper(str_replace(" ","",$this->TrackingNumber));
				$intTrackingNumberLength = strlen($strTrackingNumber);
				$intCarrier=0;
				
				// Determine carrier by evaluating the tracking number
				if (substr($strTrackingNumber,0,2) == "1Z") {
					// UPS
					$intCarrier=1;
				} else if (($intTrackingNumberLength >= 12 && $intTrackingNumberLength <= 19) || $intTrackingNumberLength == 22) {
					// FedEx
					if (is_numeric($strTrackingNumber))
						$intCarrier=2;					
				} else if (($intTrackingNumberLength >=20 && $intTrackingNumberLength <=21) || $intTrackingNumberLength == 22) {
					// USPS
					if (is_numeric($strTrackingNumber))
						$intCarrier=3;
				} else if ($intTrackingNumberLength == 10 || $intTrackingNumberLength == 11) {
					// DHL
					if (is_numeric($strTrackingNumber))
						$intCarrier=4;
				}
				
				switch ($intCarrier) {
					case 0: 
						// Unknown
						$strToReturn = $this->TrackingNumber;
						break;
						
					case 1:
						// UPS
						$strToReturn = sprintf('<a href="http://wwwapps.ups.com/etracking/tracking.cgi?InquiryNumber1=%s&TypeOfInquiryNumber=T&AcceptUPSLicenseAgreement=yes&submit=Track" target="_blank">%s</a>',$this->TrackingNumber,$this->TrackingNumber);
						break;
						
					case 2:
						// FedEx
						$strToReturn = sprintf('<a href="http://www.fedex.com/Tracking?tracknumbers=%s&action=track" target="_blank">%s</a>',$this->TrackingNumber,$this->TrackingNumber);
						break;
						
					case 3:
						// USPS
						$strToReturn= sprintf('<a href="http://trkcnfrm1.smi.usps.com/PTSInternetWeb/InterLabelInquiry.do?origTrackNum=%s" target="_blank">%s</a>',$this->TrackingNumber,$this->TrackingNumber);
						break;
						
					case 4:
						// DHL
						$strToReturn = sprintf('<a href="http://track.dhl-usa.com/TrackByNbr.asp?ShipmentNumber=%s" target="_blank">%s</a>',$this->TrackingNumber,$this->TrackingNumber);
						break;
				}				
			}
			elseif ($this->TrackingNumber) {
				$strToReturn = $this->TrackingNumber;
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		/**
		 * Returns the Default __toString (shipment number) with a link to the shipment record
		 *
		 * @param string $CssClass
		 * @return string with link to the packing list
		 */
		public function __toStringPackingListLink($CssClass = null) {
			return sprintf('<a href="packing_list.php?intShipmentId=%s" target="_blank" class="%s">Packing List</a>', $this->ShipmentId, $CssClass);
		}
		
		public function __toStringFedexShippingLabelLink($CssClass = null) {
			if ($this->CourierId == 1 && $this->ShippedFlag) {
				return sprintf('<a href="shipping_label.php?intShipmentId=%s" target="_blank" class="%s">FedEx Shipping Label</a>', $this->ShipmentId, $CssClass);
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		/**
		 * Returns the HTML needed for a shipment datagrid to show asset and inventory icons, with hovertips.
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
				$objHoverTip->Template = __DOCROOT__ . __SUBDIRECTORY__ . '/shipping/hovertip_assets.tpl.php';
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
				$objHoverTip->Template = __DOCROOT__ . __SUBDIRECTORY__ . '/shipping/hovertip_inventory.tpl.php';
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
		
		// This adds the created by and creation date before saving a new shipment
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
		 * Returns a new and unique shipment number.
		 * Selects the MAX shipment number and adds 1.
		 * If no shipment number exists in the DB, starts with 1000.
		 *
		 * @return integer Shipment Number
		 */
		public static function LoadNewShipmentNumber() {
			
			Shipment::QueryHelper($objDatabase);
			
			$strQuery = 'SELECT MAX(shipment_number) AS max_shipment_number FROM shipment';
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
		
    /**
     * Count the total shipments based on the submitted search criteria
     *
     * @param string $strToCompany
     * @param string $strToContact
     * @param string $strShipmentNumber
     * @param string $strAssetCode
     * @param string $strInventoryModelCode
     * @param int $intStatus
     * @param string $strTrackingNumber
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param array $objExpansionMap
     * @return integer Count
     */
		public static function CountBySearch($strToCompany = null, $strToContact = null, $strShipmentNumber = null, $strAssetCode = null, $strInventoryModelCode = null, $intStatus = null, $strTrackingNumber = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $objExpansionMap = null) {
		
			// Call to QueryHelper to Get the Database Object		
			Shipment::QueryHelper($objDatabase);
			
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Shipment::ExpandQuery('shipment', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			
			$arrSearchSql = Shipment::GenerateSearchSql($strToCompany, $strToContact, $strShipmentNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strTrackingNumber, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					COUNT(DISTINCT shipment.shipment_id) AS row_count
				FROM
					`shipment` AS `shipment`
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
			$arrSearchSql['strToCompanySql'], $arrSearchSql['strToContactSql'], $arrSearchSql['strShipmentNumberSql'], $arrSearchSql['strAssetCodeSql'], $arrSearchSql['strInventoryModelCodeSql'], $arrSearchSql['strStatusSql'], $arrSearchSql['strTrackingNumberSql'], $arrSearchSql['strDateModifiedSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}
		
    /**
     * Load an array of Shipment objects
		 * by To Company, To Contact, Shipment Number, Asset Code, Inventory Code, Tracking Number, or Status
     *
     * @param string $strToCompany
     * @param string $strToContact
     * @param string $strShipmentNumber
     * @param string $strAssetCode
     * @param string $strInventoryModelCode
     * @param int $intStatus
     * @param string $strTrackingNumber
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return Shipment[]
     */
		public static function LoadArrayBySearch($strToCompany = null, $strToContact = null, $strShipmentNumber = null, $strAssetCode = null, $strInventoryModelCode = null, $intStatus = null, $strTrackingNumber = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			Shipment::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Shipment::ExpandQuery('shipment', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
					
			$arrSearchSql = Shipment::GenerateSearchSql($strToCompany, $strToContact, $strShipmentNumber, $strAssetCode, $strInventoryModelCode, $intStatus, $strTrackingNumber, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					%s
					DISTINCT
					`shipment`.`shipment_id` AS `shipment_id`,
					`shipment`.`shipment_number` AS `shipment_number`,
					`shipment`.`to_contact_id` AS `to_contact_id`,
					`shipment`.`from_company_id` AS `from_company_id`,
					`shipment`.`from_contact_id` AS `from_contact_id`,
					`shipment`.`transaction_id` AS `transaction_id`,
					`shipment`.`ship_date` AS `ship_date`,
					`shipment`.`from_address_id` AS `from_address_id`,
					`shipment`.`to_company_id` AS `to_company_id`,
					`shipment`.`to_address_id` AS `to_address_id`,
					`shipment`.`courier_id` AS `courier_id`,
					`shipment`.`shipped_flag` AS `shipped_flag`,
					`shipment`.`tracking_number` AS `tracking_number`,
					`shipment`.`created_by` AS `created_by`,
					`shipment`.`creation_date` AS `creation_date`,
					`shipment`.`modified_by` AS `modified_by`,
					`shipment`.`modified_date` AS `modified_date`
					%s
				FROM
					`shipment` AS `shipment`
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
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"),
				$objQueryExpansion->GetFromSql("", "\n					"), $arrSearchSql['strAssetCodeFromSql'], $arrSearchSql['strInventoryModelCodeFromSql'],
				$arrSearchSql['strToCompanySql'], $arrSearchSql['strToContactSql'], $arrSearchSql['strShipmentNumberSql'], $arrSearchSql['strAssetCodeSql'], $arrSearchSql['strInventoryModelCodeSql'], $arrSearchSql['strStatusSql'], $arrSearchSql['strTrackingNumberSql'], $arrSearchSql['strDateModifiedSql'],
				$arrSearchSql['strAuthorizationSql'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return Shipment::InstantiateDbResult($objDbResult);			
		}
		
		// Returns an array of SQL strings to be used in either the Count or Load BySearch queries
	  protected static function GenerateSearchSql ($strToCompany = null, $strToContact = null, $strShipmentNumber = null, $strAssetCode = null, $strInventoryModelCode = null, $intStatus = null, $strTrackingNumber = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null) {

	  	$arrSearchSql = array("strToCompanySql" => "", "strToContactSql" => "", "strShipmentNumberSql" => "","strAssetCodeFromSql" => "", "strAssetCodeSql" => "","strInventoryModelCodeFromSql" => "", "strInventoryModelCodeSql" => "", "strStatusSql" => "", "strTrackingNumberSql" => "", "strDateModifiedSql" => "");
	  	
			if ($strToCompany) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strToCompany = QApplication::$Database[1]->SqlVariable("%" . $strToCompany . "%", false);
				$arrSearchSql['strToCompanySql'] = "AND `shipment__to_company_id` . `short_description` LIKE $strToCompany";
			}
			if ($strToContact) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strToContact = QApplication::$Database[1]->SqlVariable("%" . $strToContact . "%", false);
				$arrSearchSql['strToContactSql'] = "AND (`shipment__to_contact_id` . `first_name` LIKE $strToContact";
				$arrSearchSql['strToContactSql'] .= " OR `shipment__to_contact_id` . `last_name` LIKE $strToContact";
				$arrSearchSql['strToContactSql'] .= " OR CONCAT(`shipment__to_contact_id` . `first_name`, ' ', `shipment__to_contact_id` . `last_name`) LIKE $strToContact)";
			}
			if ($strShipmentNumber) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strShipmentNumber = QApplication::$Database[1]->SqlVariable("%" . $strShipmentNumber . "%", false);
				$arrSearchSql['strShipmentNumberSql'] = "AND `shipment` . `shipment_number` LIKE $strShipmentNumber";
			}
			if ($strAssetCode) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strAssetCode = QApplication::$Database[1]->SqlVariable("%" . $strAssetCode . "%", false);
				$arrSearchSql['strAssetCodeFromSql'] = ",`asset_transaction`, `asset`";
				$arrSearchSql['strAssetCodeSql'] = "AND `shipment` . `transaction_id`=`asset_transaction`.`transaction_id` AND `asset_transaction`.`asset_id`=`asset`.`asset_id` AND `asset`.`asset_code` LIKE $strAssetCode";
			}
			if ($strInventoryModelCode) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strInventoryModelCode = QApplication::$Database[1]->SqlVariable("%" . $strInventoryModelCode . "%", false);
				$arrSearchSql['strInventoryModelCodeFromSql'] = ",`inventory_transaction`, `inventory_location`, `inventory_model`";
				$arrSearchSql['strInventoryModelCodeSql'] = "AND `shipment` . `transaction_id`=`inventory_transaction`.`transaction_id` AND `inventory_transaction`.`inventory_location_id`=`inventory_location`.`inventory_location_id` AND `inventory_location`.`inventory_model_id`=`inventory_model`.`inventory_model_id` AND `inventory_model`.`inventory_model_code` LIKE $strInventoryModelCode";
			}
			if ($intStatus) {
				// Pending
				if ($intStatus == 1) {
					$intStatus = QApplication::$Database[1]->SqlVariable($intStatus, true);
					$arrSearchSql['strStatusSql'] = "AND `shipment` . `shipped_flag` = false";
				}
				// Shipped
				elseif ($intStatus == 2) {
					$intStatus = QApplication::$Database[1]->SqlVariable($intStatus, true);
					$arrSearchSql['strStatusSql'] = "AND `shipment` . `shipped_flag` = true";
				}
			}
			if ($strTrackingNumber) {
				// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strTrackingNumber = QApplication::$Database[1]->SqlVariable("%" . $strTrackingNumber . "%", false);
				$arrSearchSql['strTrackingNumberSql'] = "AND `shipment` . `tracking_number` LIKE $strTrackingNumber";
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`shipment`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`shipment`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am 
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`shipment`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`shipment`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}
			
			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql('shipment');			

			return $arrSearchSql;
	  }
	
/*
This is correct
SELECT asset_model.short_description AS short_description, asset.asset_code AS code, 'N/A' AS quantity FROM asset_transaction 
LEFT JOIN asset ON asset_transaction.asset_id = asset.asset_id
LEFT JOIN asset_model ON asset.asset_model_id = asset_model.asset_model_id
WHERE asset_transaction.transaction_id = 1
UNION
SELECT inventory_model.short_description AS short_description, inventory_model.inventory_model_code AS code, inventory_transaction.quantity AS quantity FROM inventory_transaction
LEFT JOIN inventory_location ON inventory_transaction.inventory_location_id = inventory_location.inventory_location_id
LEFT JOIN inventory_model ON inventory_location.inventory_model_id = inventory_model.inventory_model_id
WHERE inventory_transaction.transaction_id = 1
*/
	}
?>
