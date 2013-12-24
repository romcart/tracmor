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
        public function  __toStringCreated() {
            if (!empty($this->ModifiedBy)){
                return $this->ModifiedByObject->__getProfileImage();
            }
            else {
                return $this->CreatedByObject->__getProfileImage();
            }
        }

        public function __toIconName() {
            switch($this->TransactionTypeId){
                case 1: return 'asset_move' ;
                break;
                case 2: return 'asset_checkin' ;
                break;
                case 3: return 'asset_checkout' ;
                break;
                case 6: return 'shipment' ;
                break;
                case 7: return 'receipt' ;
                break;
                case 8: return 'asset_reserve' ;
                break;
                case 9: return 'asset_reserve' ;
                break;
                case 10: return 'asset_archive' ;
                break;
                case 11: return 'asset_unarchive' ;
                break;
            }
        }

        public function __toStringVerbWithLink(){
            if ($this->TransactionTypeId == 6) {
         				$objShipment = Shipment::LoadByTransactionId($this->TransactionId);
         				if ($objShipment) {
                             if ($objShipment->ShippedFlag){
                                 $verb = 'shipped';
                             }
                             else{
                                 $verb = 'scheduled shipment';
                             }
         					$strToReturn = sprintf('<a href="../shipping/shipment_edit.php?intShipmentId=%s">%s</a>', $objShipment->ShipmentId, $verb);
         				}
         				else {
         					$strToReturn = '';
         				}
         			}
         			elseif ($this->TransactionTypeId == 7) {
         				$objReceipt = Receipt::LoadByTransactionId($this->TransactionId);
         				if ($objReceipt) {
                             if ($objReceipt->ReceivedFlag){
                                 $verb = 'received';
                             }
                             else{
                                 $verb = 'scheduled receipt';
                             }
         					$strToReturn = sprintf('<a href="../receiving/receipt_edit.php?intReceiptId=%s">%s</a>', $objReceipt->ReceiptId, $verb);
         				}
         				else {
         					$strToReturn = '';
         				}
         			}
         			else {
                         $verb = strtolower($this->TransactionType->__toString());
                         if (str_word_count($verb)>1){
                            $verb = explode(" ", $verb);
                            $verb =  $verb[0] . 'ed ' . $verb[1];
                         }
                         else {
                             $verb = $verb . 'd';
                         }
         				$strToReturn = sprintf('<a href="../common/transaction_edit.php?intTransactionId=%s">%s</a>', $this->TransactionId, $verb);
         			}

         			return $strToReturn;
            return '';
        }

        public function  __toStringDate() {
            if(!empty($this->ModifiedDate)){
                return $this->ModifiedDate->PHPDate('F d, Y');
            }
            else{
                return $this->CreationDate->PHPDate('F d, Y');
            }
        }

        public function  __toStringUser() {
            if(!empty($this->ModifiedBy)){
                return $this->ModifiedByObject->__toStringFullName();
            }
            else{
                return $this->CreatedByObject->__toStringFullName();
            }
        }

        public  function __toStringNote(){
            if ($this->Note){
                return $this->Note;
            }
            else{
                return '[No note entered]';
            }
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

        public function ToStringCompanyWithLink(){
            $strToReturn = '';

         	if ($this->objShipment) {
         		$strToReturn = sprintf('<a href="../contacts/company_edit.php?intCompanyId=%s">%s</a>', $this->objShipment->ToCompanyId, $this->objShipment->ToCompany->__toString());
         	}
         	elseif ($this->objReceipt) {
         		$strToReturn = sprintf('<a href="../contacts/company_edit.php?intCompanyId=%s">%s</a>',$this->objReceipt->FromCompanyId, $this->objReceipt->FromCompany->__toString());
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