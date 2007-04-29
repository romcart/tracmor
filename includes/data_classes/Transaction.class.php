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
	require(__DATAGEN_CLASSES__ . '/TransactionGen.class.php');

	/**
	 * The Transaction class defined here contains any
	 * customized code for the Transaction class in the
	 * Object Relational Model.  It represents the "transaction" table 
	 * in the database, and extends from the code generated abstract TransactionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Transaction extends TransactionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTransaction->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Transaction Object %s',  $this->intTransactionId);
		}
		
		public function __toStringWithLink() {
			// Shipment
			if ($this->TransactionTypeId == 6) {
				$objShipment = Shipment::LoadByTransactionId($this->TransactionId);
				if ($objShipment) {
					$strToReturn = sprintf('<a href="../shipping/shipment_edit.php?intShipmentId=%s">Ship</a>', $objShipment->ShipmentId);
				}
				else {
					$strToReturn = '';
				}
			}
			elseif ($this->TransactionTypeId == 7) {
				$objReceipt = Receipt::LoadByTransactionId($this->TransactionId);
				if ($objReceipt) {
					$strToReturn = sprintf('<a href="../receiving/receipt_edit.php?intReceiptId=%s">Receipt</a>', $objReceipt->ReceiptId);
				}
				else {
					$strToReturn = '';
				}
			}
			else {
				$strToReturn = sprintf('<a href="../common/transaction_edit.php?intTransactionId=%s">%s</a>', $this->TransactionId, $this->TransactionType->__toString());
			}
			
			return $strToReturn;
		}
		
		public function ToStringNumberWithLink() {
			
			$strToReturn = '';
			
			if ($this->objShipment) {
				$strToReturn = sprintf('%s', $this->objShipment->__toStringWithLink());
			}
			elseif ($this->objReceipt) {
				$strToReturn = sprintf('%s', $this->objReceipt->__toStringWithLink());
			}
			
			return $strToReturn;
		}
		
		public function ToStringHoverTips($objControl) {
			
			$strToReturn = '';
			
			if ($this->objShipment) {
				$strToReturn = sprintf('%s', $this->objShipment->__toStringHoverTips($objControl));
			}
			elseif ($this->objReceipt) {
				$strToReturn = sprintf('%s', $this->objReceipt->__toStringHoverTips($objControl));
			}
			
			return $strToReturn;
		}
		
		public function ToStringCompany() {
			
			$strToReturn = '';
			
			if ($this->objShipment) {
				$strToReturn = $this->objShipment->ToCompany->__toString();
			}
			elseif ($this->objReceipt) {
				$strToReturn = $this->objReceipt->FromCompany->__toString();
			}
			
			return $strToReturn;
		}
		
		public function ToStringContact() {

			$strToReturn = '';
			
			if ($this->objShipment) {
				$strToReturn = $this->objShipment->ToContact->__toString();
			}
			elseif ($this->objReceipt) {
				$strToReturn = $this->objReceipt->FromContact->__toString();
			}
			
			return $strToReturn;			
			
		}

		
		public function ToStringStatusStyled() {
			
			$strToReturn = '';
			
			if ($this->objShipment) {
				$strToReturn = $this->objShipment->__toStringStatusStyled();
			}
			elseif ($this->objReceipt) {
				$strToReturn = $this->objReceipt->__toStringStatusStyled();
			}
			
			return $strToReturn;			
			
		}
				
		public function ToStringTrackingNumber() {
			
			$strToReturn = '';
			
			if ($this->objShipment) {
				$strToReturn = $this->objShipment->__toStringTrackingNumber();
			}
			elseif ($this->objReceipt) {
				
			}
			
			return $strToReturn;			
			
		}
		
		/**
		 * Returns a bool that determines whether or not this transaction has any AssetTransactions or InventoryTransactions associated with it
		 *
		 * @return bool
		 */
		public function IsEmpty() {
			$objAssetTransactionArray = AssetTransaction::LoadArrayByTransactionId($this->TransactionId);
			if (empty($objAssetTransactionArray)) {
				$objInventoryTransactionArray = InventoryTransaction::LoadArrayByTransactionId($this->TransactionId);
				if (empty($objInventoryTransactionArray)) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		
		// This adds the created by and creation date before saving a new transaction
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
	}
?>