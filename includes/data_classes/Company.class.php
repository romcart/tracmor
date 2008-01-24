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
	require(__DATAGEN_CLASSES__ . '/CompanyGen.class.php');

	/**
	 * The Company class defined here contains any
	 * customized code for the Company class in the
	 * Object Relational Model.  It represents the "company" table 
	 * in the database, and extends from the code generated abstract CompanyGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Company extends CompanyGen {
		
		public $objCustomFieldArray;
		
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCompany->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->ShortDescription);
		}
		
		public function __toStringWithLink($cssClass = null) {
			return sprintf('<a href="company_edit.php?intCompanyId=%s" class="%s">%s</a>', $this->CompanyId, $cssClass, $this->ShortDescription);
		}
		
		// Return the City of the primary address for this company, or return an empty string
		// This is necessary to show the city in datagrids
		public function __toStringCity() {
			if ($this->Address) {
				$strToReturn = $this->Address->City;
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		// Return the state/province of the primary address for this company
		// Or return an empty string if there is no primary address
		// This is necessary to show the province in the company datagrid
		public function __toStringStateProvince() {
			if ($this->AddressId && $this->Address->StateProvinceId) {
				$strToReturn = $this->Address->StateProvince->__toString();
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		// Return the Country of the primary address for this company
		// Or return an empty string if there is no primary address
		// This is necessary to show the country in the company datagrid
		public function __toStringCountry() {
			if ($this->Address) {
				$strToReturn = $this->Address->Country->__toString();
			}
			else {
				$strToReturn = '';
			}
			return $strToReturn;
		}
		
		// This adds the created by and creation date before saving a new company
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
     * @param int $strShortDescription
     * @param int $strCity
     * @param string $intStateProvinceId
     * @param string $intCountryId
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param array $objExpansionMap
     * @return integer Count
     */
		public static function CountBySearch($strShortDescription = null, $strCity = null, $intStateProvinceId = null, $intCountryId = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $objExpansionMap = null) {
		
			// Call to QueryHelper to Get the Database Object		
			Company::QueryHelper($objDatabase);
			
		  // Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Company::ExpandQuery('company', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			
			// Generate the search SQL used
			$arrSearchSql = Company::GenerateSearchSql($strShortDescription, $strCity, $intStateProvinceId, $intCountryId, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::Company);
			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::Company);
			
			$strQuery = sprintf('
				SELECT
					COUNT(company.company_id) AS row_count
				FROM
					`company` AS `company`
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
			', $objQueryExpansion->GetFromSql("", "\n					"), $arrCustomFieldSql['strFrom'], $arrAttachmentSql['strFrom'],
			$arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCitySql'], $arrSearchSql['strStateProvinceSql'], $arrSearchSql['strCountrySql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
			$arrSearchSql['strAuthorizationSql']);

			$objDbResult = $objDatabase->Query($strQuery);
			$strDbRow = $objDbResult->FetchRow();
			return QType::Cast($strDbRow[0], QType::Integer);
			
		}
		
    /**
     * Load an array of Company objects
		 * by ShortDescription, City, StateProvince, or Country
     *
     * @param string $strShortDescription
     * @param string $strCity
     * @param integer $intStateProvinceId
     * @param integer $intCountryId
     * @param string $strDateModified
     * @param string $strDateModifiedFirst
     * @param string $strDateModifiedLast
     * @param string $strOrderBy
     * @param string $strLimit
     * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
     * @return Company[]
     */
		public static function LoadArrayBySearch($strShortDescription = null, $strCity = null, $intStateProvinceId = null, $intCountryId = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			Company::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup QueryExpansion
			$objQueryExpansion = new QQueryExpansion();
			if ($objExpansionMap) {
				try {
					Company::ExpandQuery('company', null, $objExpansionMap, $objQueryExpansion);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			
			// Generate an array of SQL strings to be used in the search query
			$arrSearchSql = Company::GenerateSearchSql($strShortDescription, $strCity, $intStateProvinceId, $intCountryId, $arrCustomFields, $strDateModified, $strDateModifiedFirst, $strDateModifiedLast, $blnAttachment);
			$arrAttachmentSql = Attachment::GenerateSql(EntityQtype::Company);
			$arrCustomFieldSql = CustomField::GenerateSql(EntityQtype::Company);

			$strQuery = sprintf('
				SELECT
					%s
					`company`.`company_id` AS `company_id`,
					`company`.`address_id` AS `address_id`,
					`company`.`short_description` AS `short_description`,
					`company`.`website` AS `website`,
					`company`.`telephone` AS `telephone`,
					`company`.`fax` AS `fax`,
					`company`.`email` AS `email`,
					`company`.`long_description` AS `long_description`,
					`company`.`created_by` AS `created_by`,
					`company`.`creation_date` AS `creation_date`,
					`company`.`modified_by` AS `modified_by`,
					`company`.`modified_date` AS `modified_date`
					%s
					%s
					%s
				FROM
					`company` AS `company`
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
				$arrSearchSql['strShortDescriptionSql'], $arrSearchSql['strCitySql'], $arrSearchSql['strStateProvinceSql'], $arrSearchSql['strCountrySql'], $arrSearchSql['strCustomFieldsSql'], $arrSearchSql['strDateModifiedSql'], $arrSearchSql['strAttachmentSql'],
				$arrSearchSql['strAuthorizationSql'], $arrAttachmentSql['strGroupBy'],
				$strOrderBy, $strLimitSuffix);

			$objDbResult = $objDatabase->Query($strQuery);				
			return Company::InstantiateDbResult($objDbResult);			
		
		}
		
		// Generate SQL strings to be used in both the Count and Load BySearch Queries
	  protected static function GenerateSearchSql ($strShortDescription = null, $strCity = null, $intStateProvinceId = null, $intCountryId = null, $arrCustomFields = null, $strDateModified = null, $strDateModifiedFirst = null, $strDateModifiedLast = null, $blnAttachment = null) {

	  	$arrSearchSql = array("strShortDescriptionSql" => "", "strCitySql" => "", "strStateProvinceSql" => "", "strCountrySql" => "", "strCustomFieldsSql" => "", "strDateModifiedSql" => "", "strAttachmentSql" => "", "strAuthorizationSql" => "");
	  	
			if ($strShortDescription) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strShortDescription = QApplication::$Database[1]->SqlVariable("%" . $strShortDescription . "%", false);
				$arrSearchSql['strShortDescriptionSql'] = "AND `company` . `short_description` LIKE $strShortDescription";
			}
			if ($strCity) {
  			// Properly Escape All Input Parameters using Database->SqlVariable()		
				$strCity = QApplication::$Database[1]->SqlVariable("%" . $strCity . "%", false);
				$arrSearchSql['strCitySql'] = "AND `company__address_id` . `city` LIKE $strCity";
			}
			if ($intStateProvinceId) {
				// Properly Escape All Input Parameters using Database->SqlVariable()	
				$intStateProvinceId = QApplication::$Database[1]->SqlVariable($intStateProvinceId, true);
				$arrSearchSql['strStateProvinceSql'] = sprintf("AND `company__address_id` . `state_province_id`%s", $intStateProvinceId);
			}
			if ($intCountryId) {
				// Properly Escape All Input Parameters using Database->SqlVariable()	
				$intCountryId = QApplication::$Database[1]->SqlVariable($intCountryId, true);
				$arrSearchSql['strCountrySql'] = sprintf("AND `company__address_id` . `country_id`%s", $intCountryId);
			}
			if ($strDateModified) {
				if ($strDateModified == "before" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`company`.`modified_date`) < %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "after" && $strDateModifiedFirst instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`company`.`modified_date`) > %s", $strDateModifiedFirst);
				}
				elseif ($strDateModified == "between" && $strDateModifiedFirst instanceof QDateTime && $strDateModifiedLast instanceof QDateTime) {
					$strDateModifiedFirst = QApplication::$Database[1]->SqlVariable($strDateModifiedFirst->Timestamp, false);
					// Added 86399 (23 hrs., 59 mins., 59 secs) because the After variable needs to include the date given
					// When only a date is given, conversion to a timestamp assumes 12:00am 
					$strDateModifiedLast = QApplication::$Database[1]->SqlVariable($strDateModifiedLast->Timestamp, false) + 86399;
					$arrSearchSql['strDateModifiedSql'] = sprintf("AND UNIX_TIMESTAMP(`company`.`modified_date`) > %s", $strDateModifiedFirst);
					$arrSearchSql['strDateModifiedSql'] .= sprintf("\nAND UNIX_TIMESTAMP(`company`.`modified_date`) < %s", $strDateModifiedLast);
				}
			}
			if ($blnAttachment) {
				$arrSearchSql['strAttachmentSql'] = sprintf("AND attachment.attachment_id IS NOT NULL");
			}
			
			if ($arrCustomFields) {
				$arrSearchSql['strCustomFieldsSql'] = CustomField::GenerateSearchSql($arrCustomFields);
			}
			
			// Generate Authorization SQL based on the QApplication::$objRoleModule
			$arrSearchSql['strAuthorizationSql'] = QApplication::AuthorizationSql('company');			

			return $arrSearchSql;
	  }
	}
?>