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
	require(__DATAGEN_CLASSES__ . '/ContactGen.class.php');

	/**
	 * The Contact class defined here contains any
	 * customized code for the Contact class in the
	 * Object Relational Model.  It represents the "contact" table 
	 * in the database, and extends from the code generated abstract ContactGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Contact extends ContactGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objContact->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s %s',  $this->FirstName, $this->LastName);
		}
		
		public function __toStringWithLink($CssClass = null) {
			return sprintf('<a href="../contacts/contact_edit.php?intContactId=%s" class="%s">%s</a>', $this->intContactId, $CssClass, $this->__toString());
		}

		// This adds the created by and creation date before saving a new contact
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
     * @param string $strFirstName
     * @param string $strLastName
     * @param string $strCompany
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param array $objExpansionMap
     * @return integer Count
     */
		public static function CountBySearch($strFirstName = null, $strLastName = null, $strCompany = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $objExpansionMap = null) {
		
			// Call to QueryHelper to Get the Database Object		
			Contact::QueryHelper($objDatabase);
			
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Contact::ExpandQuery('contact', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			
			$arrSearchSql = Contact::GenerateSearchSql($strFirstName, $strLastName, $strCompany, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);
			

			$strQuery = sprintf('
				SELECT
					COUNT(contact.contact_id) AS row_count
				FROM
					`contact` AS `contact`
					%s
				WHERE
				  1=1
				  %s
				  %s
				  %s
				  %s
				  %s
			', $objQueryExpansion->GetFromSql("", "\n					"),
			$arrSearchSql['strFirstNameSql'], $arrSearchSql['strLastNameSql'], $arrSearchSql['strCompanySql'], $arrSearchSql['strDateModifiedSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
		}
		
    /**
     * Load an array of Contact objects
		 * by FirstName, LastName, or Company ShortDescription
     *
     * @param string $strFirstName
     * @param string $strLastName
     * @param string $strCompany
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return Contact[]
     */
		public static function LoadArrayBySearch($strFirstName = null, $strLastName = null, $strCompany = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			Contact::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Contact::ExpandQuery('contact', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
					
			$arrSearchSql = Contact::GenerateSearchSql($strFirstName, $strLastName, $strCompany, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast);

			$strQuery = sprintf('
				SELECT
					%s
					`contact`.`contact_id` AS `contact_id`,
					`contact`.`address_id` AS `address_id`,
					`contact`.`company_id` AS `company_id`,
					`contact`.`first_name` AS `first_name`,
					`contact`.`last_name` AS `last_name`,
					`contact`.`title` AS `title`,
					`contact`.`email` AS `email`,
					`contact`.`phone_office` AS `phone_office`,
					`contact`.`phone_home` AS `phone_home`,
					`contact`.`phone_mobile` AS `phone_mobile`,
					`contact`.`fax` AS `fax`,
					`contact`.`description` AS `description`,
					`contact`.`created_by` AS `created_by`,
					`contact`.`creation_date` AS `creation_date`,
					`contact`.`modified_by` AS `modified_by`,
					`contact`.`modified_date` AS `modified_date`
					%s
				FROM
					`contact` AS `contact`
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
			', $strLimitPrefix,
				$objQueryExpansion->GetSelectSql(",\n					", ",\n					"),
				$objQueryExpansion->GetFromSql("", "\n					"),
				$arrSearchSql['strFirstNameSql'], $arrSearchSql['strLastNameSql'], $arrSearchSql['strCompanySql'], $arrSearchSql['strDateModifiedSql'],
				$arrSearchSql['strAuthorizationSql'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return Contact::InstantiateDbResult($objDbResult);			
		}
		
		// Returns an array of SQL strings to be used in either the Count or Load BySearch queries
	  protected static function GenerateSearchSql ($strFirstName, $strLastName = null, $strCompany = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null) {

	  	$arrSearchSql = array("strFirstNameSql" => "", "strLastNameSql" => "", "strCompanySql" => "", "strDateModifiedSql" => "", "strAuthorizationSql" => "");
	  	
			if ($strFirstName) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strFirstName = QApplication::$Database[1]->SqlVariable("%" . $strFirstName . "%", false);
				$arrSearchSql['strFirstNameSql'] = "AND `contact` . `first_name` LIKE $strFirstName";
			}
			if ($strLastName) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strLastName = QApplication::$Database[1]->SqlVariable("%" . $strLastName . "%", false);
				$arrSearchSql['strLastNameSql'] = "AND `contact` . `last_name` LIKE $strLastName";
			}
			if ($strCompany) {
				// Properly Escape All Input Parameters using Database->SqlVariable()	
				$strCompany = QApplication::$Database[1]->SqlVariable("%" . $strCompany . "%", false);
				$arrSearchSql['strCompanySql'] = "AND `contact__company_id` . `short_description` LIKE $strCompany";
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`contact`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`contact`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am 
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`contact`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`contact`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}
			
			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql('REPLACE!!!!');			

			return $arrSearchSql;
	  }
	}
?>