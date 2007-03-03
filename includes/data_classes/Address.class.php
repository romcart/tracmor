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
	require(__DATAGEN_CLASSES__ . '/AddressGen.class.php');

	/**
	 * The Address class defined here contains any
	 * customized code for the Address class in the
	 * Object Relational Model.  It represents the "address" table 
	 * in the database, and extends from the code generated abstract AddressGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Address extends AddressGen {
		
		public $objCustomFieldArray;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAddress->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf($this->ShortDescription);
		}
		
		public function __toStringWithLink($cssClass = null) {
			return sprintf('<a href="../contacts/address_edit.php?intAddressId=%s" class="%s">%s</a>', $this->intAddressId, $cssClass, $this->__toString());
		}
		
		// Return the full address in HTML form on three lines, e.g.:
		// 4501 Mission Bay Dr.
		// Suite 3G
		// San Diego, CA 92109
		public function __toStringFullAddress($cssClass = null) {
			$strToReturn = sprintf('%s<br />', $this->Address1);
			if ($this->Address2) {
				$strToReturn .= sprintf('%s<br />', $this->Address2);
			}
			
			if ($this->StateProvince) {
				$strToReturn .= sprintf('%s, %s %s', $this->strCity, $this->StateProvince->Abbreviation, $this->PostalCode);					
			} else {
				$strToReturn .= sprintf('%s %s', $this->strCity, $this->PostalCode);	
			}
			
			return $strToReturn;
		}
		
		public function __toStringStateProvinceAbbreviation() {
			if ($this->StateProvinceId) {
				$strToReturn = $this->StateProvince->Abbreviation;
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		public function __toStringCountryAbbreviation() {
			if ($this->CountryId) {
				$strToReturn = $this->Country->Abbreviation;
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		// This adds the created by and creation date before saving a new address
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