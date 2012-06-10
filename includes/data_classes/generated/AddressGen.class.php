<?php
	/**
	 * The abstract AddressGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Address subclass which
	 * extends this AddressGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Address class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AddressId the value for intAddressId (Read-Only PK)
	 * @property integer $CompanyId the value for intCompanyId (Not Null)
	 * @property string $ShortDescription the value for strShortDescription (Not Null)
	 * @property integer $CountryId the value for intCountryId (Not Null)
	 * @property string $Address1 the value for strAddress1 (Not Null)
	 * @property string $Address2 the value for strAddress2 
	 * @property string $City the value for strCity (Not Null)
	 * @property integer $StateProvinceId the value for intStateProvinceId 
	 * @property string $PostalCode the value for strPostalCode (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property Company $Company the value for the Company object referenced by intCompanyId (Not Null)
	 * @property Country $Country the value for the Country object referenced by intCountryId (Not Null)
	 * @property StateProvince $StateProvince the value for the StateProvince object referenced by intStateProvinceId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property AddressCustomFieldHelper $AddressCustomFieldHelper the value for the AddressCustomFieldHelper object that uniquely references this Address
	 * @property Company $_Company the value for the private _objCompany (Read-Only) if set due to an expansion on the company.address_id reverse relationship
	 * @property Company[] $_CompanyArray the value for the private _objCompanyArray (Read-Only) if set due to an ExpandAsArray on the company.address_id reverse relationship
	 * @property Contact $_Contact the value for the private _objContact (Read-Only) if set due to an expansion on the contact.address_id reverse relationship
	 * @property Contact[] $_ContactArray the value for the private _objContactArray (Read-Only) if set due to an ExpandAsArray on the contact.address_id reverse relationship
	 * @property Receipt $_ReceiptAsTo the value for the private _objReceiptAsTo (Read-Only) if set due to an expansion on the receipt.to_address_id reverse relationship
	 * @property Receipt[] $_ReceiptAsToArray the value for the private _objReceiptAsToArray (Read-Only) if set due to an ExpandAsArray on the receipt.to_address_id reverse relationship
	 * @property Shipment $_ShipmentAsFrom the value for the private _objShipmentAsFrom (Read-Only) if set due to an expansion on the shipment.from_address_id reverse relationship
	 * @property Shipment[] $_ShipmentAsFromArray the value for the private _objShipmentAsFromArray (Read-Only) if set due to an ExpandAsArray on the shipment.from_address_id reverse relationship
	 * @property Shipment $_ShipmentAsTo the value for the private _objShipmentAsTo (Read-Only) if set due to an expansion on the shipment.to_address_id reverse relationship
	 * @property Shipment[] $_ShipmentAsToArray the value for the private _objShipmentAsToArray (Read-Only) if set due to an ExpandAsArray on the shipment.to_address_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AddressGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column address.address_id
		 * @var integer intAddressId
		 */
		protected $intAddressId;
		const AddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.company_id
		 * @var integer intCompanyId
		 */
		protected $intCompanyId;
		const CompanyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 255;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column address.country_id
		 * @var integer intCountryId
		 */
		protected $intCountryId;
		const CountryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.address_1
		 * @var string strAddress1
		 */
		protected $strAddress1;
		const Address1MaxLength = 255;
		const Address1Default = null;


		/**
		 * Protected member variable that maps to the database column address.address_2
		 * @var string strAddress2
		 */
		protected $strAddress2;
		const Address2MaxLength = 255;
		const Address2Default = null;


		/**
		 * Protected member variable that maps to the database column address.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 50;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column address.state_province_id
		 * @var integer intStateProvinceId
		 */
		protected $intStateProvinceId;
		const StateProvinceIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.postal_code
		 * @var string strPostalCode
		 */
		protected $strPostalCode;
		const PostalCodeMaxLength = 50;
		const PostalCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column address.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column address.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column address.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column address.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single Company object
		 * (of type Company), if this Address object was restored with
		 * an expansion on the company association table.
		 * @var Company _objCompany;
		 */
		private $_objCompany;

		/**
		 * Private member variable that stores a reference to an array of Company objects
		 * (of type Company[]), if this Address object was restored with
		 * an ExpandAsArray on the company association table.
		 * @var Company[] _objCompanyArray;
		 */
		private $_objCompanyArray = array();

		/**
		 * Private member variable that stores a reference to a single Contact object
		 * (of type Contact), if this Address object was restored with
		 * an expansion on the contact association table.
		 * @var Contact _objContact;
		 */
		private $_objContact;

		/**
		 * Private member variable that stores a reference to an array of Contact objects
		 * (of type Contact[]), if this Address object was restored with
		 * an ExpandAsArray on the contact association table.
		 * @var Contact[] _objContactArray;
		 */
		private $_objContactArray = array();

		/**
		 * Private member variable that stores a reference to a single ReceiptAsTo object
		 * (of type Receipt), if this Address object was restored with
		 * an expansion on the receipt association table.
		 * @var Receipt _objReceiptAsTo;
		 */
		private $_objReceiptAsTo;

		/**
		 * Private member variable that stores a reference to an array of ReceiptAsTo objects
		 * (of type Receipt[]), if this Address object was restored with
		 * an ExpandAsArray on the receipt association table.
		 * @var Receipt[] _objReceiptAsToArray;
		 */
		private $_objReceiptAsToArray = array();

		/**
		 * Private member variable that stores a reference to a single ShipmentAsFrom object
		 * (of type Shipment), if this Address object was restored with
		 * an expansion on the shipment association table.
		 * @var Shipment _objShipmentAsFrom;
		 */
		private $_objShipmentAsFrom;

		/**
		 * Private member variable that stores a reference to an array of ShipmentAsFrom objects
		 * (of type Shipment[]), if this Address object was restored with
		 * an ExpandAsArray on the shipment association table.
		 * @var Shipment[] _objShipmentAsFromArray;
		 */
		private $_objShipmentAsFromArray = array();

		/**
		 * Private member variable that stores a reference to a single ShipmentAsTo object
		 * (of type Shipment), if this Address object was restored with
		 * an expansion on the shipment association table.
		 * @var Shipment _objShipmentAsTo;
		 */
		private $_objShipmentAsTo;

		/**
		 * Private member variable that stores a reference to an array of ShipmentAsTo objects
		 * (of type Shipment[]), if this Address object was restored with
		 * an ExpandAsArray on the shipment association table.
		 * @var Shipment[] _objShipmentAsToArray;
		 */
		private $_objShipmentAsToArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.company_id.
		 *
		 * NOTE: Always use the Company property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objCompany
		 */
		protected $objCompany;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.country_id.
		 *
		 * NOTE: Always use the Country property getter to correctly retrieve this Country object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Country objCountry
		 */
		protected $objCountry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.state_province_id.
		 *
		 * NOTE: Always use the StateProvince property getter to correctly retrieve this StateProvince object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StateProvince objStateProvince
		 */
		protected $objStateProvince;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column address_custom_field_helper.address_id.
		 *
		 * NOTE: Always use the AddressCustomFieldHelper property getter to correctly retrieve this AddressCustomFieldHelper object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AddressCustomFieldHelper objAddressCustomFieldHelper
		 */
		protected $objAddressCustomFieldHelper;
		
		/**
		 * Used internally to manage whether the adjoined AddressCustomFieldHelper object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyAddressCustomFieldHelper;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a Address from PK Info
		 * @param integer $intAddressId
		 * @return Address
		 */
		public static function Load($intAddressId) {
			// Use QuerySingle to Perform the Query
			return Address::QuerySingle(
				QQ::Equal(QQN::Address()->AddressId, $intAddressId)
			);
		}

		/**
		 * Load all Addresses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadAll query
			try {
				return Address::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Addresses
		 * @return int
		 */
		public static function CountAll() {
			// Call Address::QueryCount to perform the CountAll query
			return Address::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Create/Build out the QueryBuilder object with Address-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'address');
			Address::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('address');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single Address object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Address the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Address object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Address::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return Address::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Address objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Address[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Address::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of Address objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'address_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Address-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Address::GetSelectFields($objQueryBuilder);
				Address::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Address::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Address
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'address';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'address_id', $strAliasPrefix . 'address_id');
			$objBuilder->AddSelectItem($strTableName, 'company_id', $strAliasPrefix . 'company_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'country_id', $strAliasPrefix . 'country_id');
			$objBuilder->AddSelectItem($strTableName, 'address_1', $strAliasPrefix . 'address_1');
			$objBuilder->AddSelectItem($strTableName, 'address_2', $strAliasPrefix . 'address_2');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'state_province_id', $strAliasPrefix . 'state_province_id');
			$objBuilder->AddSelectItem($strTableName, 'postal_code', $strAliasPrefix . 'postal_code');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Address from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Address::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Address
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAddressId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'address__';


				$strAlias = $strAliasPrefix . 'company__company_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCompanyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCompanyArray[$intPreviousChildItemCount - 1];
						$objChildItem = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCompanyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCompanyArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'contact__contact_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objContactArray)) {
						$objPreviousChildItem = $objPreviousItem->_objContactArray[$intPreviousChildItemCount - 1];
						$objChildItem = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contact__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objContactArray[] = $objChildItem;
					} else
						$objPreviousItem->_objContactArray[] = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contact__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'receiptasto__receipt_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objReceiptAsToArray)) {
						$objPreviousChildItem = $objPreviousItem->_objReceiptAsToArray[$intPreviousChildItemCount - 1];
						$objChildItem = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasto__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objReceiptAsToArray[] = $objChildItem;
					} else
						$objPreviousItem->_objReceiptAsToArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'shipmentasfrom__shipment_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objShipmentAsFromArray)) {
						$objPreviousChildItem = $objPreviousItem->_objShipmentAsFromArray[$intPreviousChildItemCount - 1];
						$objChildItem = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasfrom__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objShipmentAsFromArray[] = $objChildItem;
					} else
						$objPreviousItem->_objShipmentAsFromArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasfrom__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'shipmentasto__shipment_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objShipmentAsToArray)) {
						$objPreviousChildItem = $objPreviousItem->_objShipmentAsToArray[$intPreviousChildItemCount - 1];
						$objChildItem = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasto__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objShipmentAsToArray[] = $objChildItem;
					} else
						$objPreviousItem->_objShipmentAsToArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'address__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Address object
			$objToReturn = new Address();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_id'] : $strAliasPrefix . 'address_id';
			$objToReturn->intAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'company_id'] : $strAliasPrefix . 'company_id';
			$objToReturn->intCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'country_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country_id'] : $strAliasPrefix . 'country_id';
			$objToReturn->intCountryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_1'] : $strAliasPrefix . 'address_1';
			$objToReturn->strAddress1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_2'] : $strAliasPrefix . 'address_2';
			$objToReturn->strAddress2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'state_province_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'state_province_id'] : $strAliasPrefix . 'state_province_id';
			$objToReturn->intStateProvinceId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'postal_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'postal_code'] : $strAliasPrefix . 'postal_code';
			$objToReturn->strPostalCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_date'] : $strAliasPrefix . 'modified_date';
			$objToReturn->strModifiedDate = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'address__';

			// Check for Company Early Binding
			$strAlias = $strAliasPrefix . 'company_id__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Country Early Binding
			$strAlias = $strAliasPrefix . 'country_id__country_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCountry = Country::InstantiateDbRow($objDbRow, $strAliasPrefix . 'country_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StateProvince Early Binding
			$strAlias = $strAliasPrefix . 'state_province_id__state_province_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStateProvince = StateProvince::InstantiateDbRow($objDbRow, $strAliasPrefix . 'state_province_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ModifiedByObject Early Binding
			$strAlias = $strAliasPrefix . 'modified_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objModifiedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'modified_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for AddressCustomFieldHelper Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'addresscustomfieldhelper__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objAddressCustomFieldHelper = AddressCustomFieldHelper::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addresscustomfieldhelper__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objAddressCustomFieldHelper = false;
			}



			// Check for Company Virtual Binding
			$strAlias = $strAliasPrefix . 'company__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCompanyArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Contact Virtual Binding
			$strAlias = $strAliasPrefix . 'contact__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objContactArray[] = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contact__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objContact = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contact__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ReceiptAsTo Virtual Binding
			$strAlias = $strAliasPrefix . 'receiptasto__receipt_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objReceiptAsToArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objReceiptAsTo = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ShipmentAsFrom Virtual Binding
			$strAlias = $strAliasPrefix . 'shipmentasfrom__shipment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objShipmentAsFromArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasfrom__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objShipmentAsFrom = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasfrom__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ShipmentAsTo Virtual Binding
			$strAlias = $strAliasPrefix . 'shipmentasto__shipment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objShipmentAsToArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objShipmentAsTo = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Addresses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Address[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Address::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Address::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Address object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Address next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return Address::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Address object,
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @return Address
		*/
		public static function LoadByAddressId($intAddressId, $objOptionalClauses = null) {
			return Address::QuerySingle(
				QQ::Equal(QQN::Address()->AddressId, $intAddressId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByCompanyId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->CompanyId, $intCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @return int
		*/
		public static function CountByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByCompanyId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->CompanyId, $intCompanyId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByCountryId($intCountryId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByCountryId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->CountryId, $intCountryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @return int
		*/
		public static function CountByCountryId($intCountryId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByCountryId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->CountryId, $intCountryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by StateProvinceId Index(es)
		 * @param integer $intStateProvinceId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByStateProvinceId($intStateProvinceId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByStateProvinceId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->StateProvinceId, $intStateProvinceId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by StateProvinceId Index(es)
		 * @param integer $intStateProvinceId
		 * @return int
		*/
		public static function CountByStateProvinceId($intStateProvinceId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByStateProvinceId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->StateProvinceId, $intStateProvinceId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByModifiedBy query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByCreatedBy query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Address
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `address` (
							`company_id`,
							`short_description`,
							`country_id`,
							`address_1`,
							`address_2`,
							`city`,
							`state_province_id`,
							`postal_code`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->intCountryId) . ',
							' . $objDatabase->SqlVariable($this->strAddress1) . ',
							' . $objDatabase->SqlVariable($this->strAddress2) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->intStateProvinceId) . ',
							' . $objDatabase->SqlVariable($this->strPostalCode) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAddressId = $objDatabase->InsertId('address', 'address_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`modified_date`
							FROM
								`address`
							WHERE
								`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('Address');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`address`
						SET
							`company_id` = ' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . ',
							`address_1` = ' . $objDatabase->SqlVariable($this->strAddress1) . ',
							`address_2` = ' . $objDatabase->SqlVariable($this->strAddress2) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`state_province_id` = ' . $objDatabase->SqlVariable($this->intStateProvinceId) . ',
							`postal_code` = ' . $objDatabase->SqlVariable($this->strPostalCode) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined AddressCustomFieldHelper object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyAddressCustomFieldHelper) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = AddressCustomFieldHelper::LoadByAddressId($this->intAddressId)) {
						$objAssociated->AddressId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objAddressCustomFieldHelper) {
						$this->objAddressCustomFieldHelper->AddressId = $this->intAddressId;
						$this->objAddressCustomFieldHelper->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyAddressCustomFieldHelper = false;
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`modified_date`
				FROM
					`address`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Address
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Address with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			
			
			// Update the adjoined AddressCustomFieldHelper object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = AddressCustomFieldHelper::LoadByAddressId($this->intAddressId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Addresses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`');
		}

		/**
		 * Truncate address table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `address`');
		}

		/**
		 * Reload this Address from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Address object.');

			// Reload the Object
			$objReloaded = Address::Load($this->intAddressId);

			// Update $this's local variables to match
			$this->CompanyId = $objReloaded->CompanyId;
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->CountryId = $objReloaded->CountryId;
			$this->strAddress1 = $objReloaded->strAddress1;
			$this->strAddress2 = $objReloaded->strAddress2;
			$this->strCity = $objReloaded->strCity;
			$this->StateProvinceId = $objReloaded->StateProvinceId;
			$this->strPostalCode = $objReloaded->strPostalCode;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModifiedDate = $objReloaded->strModifiedDate;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Address::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `address` (
					`address_id`,
					`company_id`,
					`short_description`,
					`country_id`,
					`address_1`,
					`address_2`,
					`city`,
					`state_province_id`,
					`postal_code`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAddressId) . ',
					' . $objDatabase->SqlVariable($this->intCompanyId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->intCountryId) . ',
					' . $objDatabase->SqlVariable($this->strAddress1) . ',
					' . $objDatabase->SqlVariable($this->strAddress2) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->intStateProvinceId) . ',
					' . $objDatabase->SqlVariable($this->strPostalCode) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAddressId
		 * @return Address[]
		 */
		public static function GetJournalForId($intAddressId) {
			$objDatabase = Address::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM address WHERE address_id = ' .
				$objDatabase->SqlVariable($intAddressId) . ' ORDER BY __sys_date');

			return Address::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Address[]
		 */
		public function GetJournal() {
			return Address::GetJournalForId($this->intAddressId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'AddressId':
					// Gets the value for intAddressId (Read-Only PK)
					// @return integer
					return $this->intAddressId;

				case 'CompanyId':
					// Gets the value for intCompanyId (Not Null)
					// @return integer
					return $this->intCompanyId;

				case 'ShortDescription':
					// Gets the value for strShortDescription (Not Null)
					// @return string
					return $this->strShortDescription;

				case 'CountryId':
					// Gets the value for intCountryId (Not Null)
					// @return integer
					return $this->intCountryId;

				case 'Address1':
					// Gets the value for strAddress1 (Not Null)
					// @return string
					return $this->strAddress1;

				case 'Address2':
					// Gets the value for strAddress2 
					// @return string
					return $this->strAddress2;

				case 'City':
					// Gets the value for strCity (Not Null)
					// @return string
					return $this->strCity;

				case 'StateProvinceId':
					// Gets the value for intStateProvinceId 
					// @return integer
					return $this->intStateProvinceId;

				case 'PostalCode':
					// Gets the value for strPostalCode (Not Null)
					// @return string
					return $this->strPostalCode;

				case 'CreatedBy':
					// Gets the value for intCreatedBy 
					// @return integer
					return $this->intCreatedBy;

				case 'CreationDate':
					// Gets the value for dttCreationDate 
					// @return QDateTime
					return $this->dttCreationDate;

				case 'ModifiedBy':
					// Gets the value for intModifiedBy 
					// @return integer
					return $this->intModifiedBy;

				case 'ModifiedDate':
					// Gets the value for strModifiedDate (Read-Only Timestamp)
					// @return string
					return $this->strModifiedDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Company':
					// Gets the value for the Company object referenced by intCompanyId (Not Null)
					// @return Company
					try {
						if ((!$this->objCompany) && (!is_null($this->intCompanyId)))
							$this->objCompany = Company::Load($this->intCompanyId);
						return $this->objCompany;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Country':
					// Gets the value for the Country object referenced by intCountryId (Not Null)
					// @return Country
					try {
						if ((!$this->objCountry) && (!is_null($this->intCountryId)))
							$this->objCountry = Country::Load($this->intCountryId);
						return $this->objCountry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateProvince':
					// Gets the value for the StateProvince object referenced by intStateProvinceId 
					// @return StateProvince
					try {
						if ((!$this->objStateProvince) && (!is_null($this->intStateProvinceId)))
							$this->objStateProvince = StateProvince::Load($this->intStateProvinceId);
						return $this->objStateProvince;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					// Gets the value for the UserAccount object referenced by intCreatedBy 
					// @return UserAccount
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = UserAccount::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedByObject':
					// Gets the value for the UserAccount object referenced by intModifiedBy 
					// @return UserAccount
					try {
						if ((!$this->objModifiedByObject) && (!is_null($this->intModifiedBy)))
							$this->objModifiedByObject = UserAccount::Load($this->intModifiedBy);
						return $this->objModifiedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'AddressCustomFieldHelper':
					// Gets the value for the AddressCustomFieldHelper object that uniquely references this Address
					// by objAddressCustomFieldHelper (Unique)
					// @return AddressCustomFieldHelper
					try {
						if ($this->objAddressCustomFieldHelper === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objAddressCustomFieldHelper)
							$this->objAddressCustomFieldHelper = AddressCustomFieldHelper::LoadByAddressId($this->intAddressId);
						return $this->objAddressCustomFieldHelper;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Company':
					// Gets the value for the private _objCompany (Read-Only)
					// if set due to an expansion on the company.address_id reverse relationship
					// @return Company
					return $this->_objCompany;

				case '_CompanyArray':
					// Gets the value for the private _objCompanyArray (Read-Only)
					// if set due to an ExpandAsArray on the company.address_id reverse relationship
					// @return Company[]
					return (array) $this->_objCompanyArray;

				case '_Contact':
					// Gets the value for the private _objContact (Read-Only)
					// if set due to an expansion on the contact.address_id reverse relationship
					// @return Contact
					return $this->_objContact;

				case '_ContactArray':
					// Gets the value for the private _objContactArray (Read-Only)
					// if set due to an ExpandAsArray on the contact.address_id reverse relationship
					// @return Contact[]
					return (array) $this->_objContactArray;

				case '_ReceiptAsTo':
					// Gets the value for the private _objReceiptAsTo (Read-Only)
					// if set due to an expansion on the receipt.to_address_id reverse relationship
					// @return Receipt
					return $this->_objReceiptAsTo;

				case '_ReceiptAsToArray':
					// Gets the value for the private _objReceiptAsToArray (Read-Only)
					// if set due to an ExpandAsArray on the receipt.to_address_id reverse relationship
					// @return Receipt[]
					return (array) $this->_objReceiptAsToArray;

				case '_ShipmentAsFrom':
					// Gets the value for the private _objShipmentAsFrom (Read-Only)
					// if set due to an expansion on the shipment.from_address_id reverse relationship
					// @return Shipment
					return $this->_objShipmentAsFrom;

				case '_ShipmentAsFromArray':
					// Gets the value for the private _objShipmentAsFromArray (Read-Only)
					// if set due to an ExpandAsArray on the shipment.from_address_id reverse relationship
					// @return Shipment[]
					return (array) $this->_objShipmentAsFromArray;

				case '_ShipmentAsTo':
					// Gets the value for the private _objShipmentAsTo (Read-Only)
					// if set due to an expansion on the shipment.to_address_id reverse relationship
					// @return Shipment
					return $this->_objShipmentAsTo;

				case '_ShipmentAsToArray':
					// Gets the value for the private _objShipmentAsToArray (Read-Only)
					// if set due to an ExpandAsArray on the shipment.to_address_id reverse relationship
					// @return Shipment[]
					return (array) $this->_objShipmentAsToArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
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
				case 'CompanyId':
					// Sets the value for intCompanyId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCompany = null;
						return ($this->intCompanyId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ShortDescription':
					// Sets the value for strShortDescription (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strShortDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CountryId':
					// Sets the value for intCountryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCountry = null;
						return ($this->intCountryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address1':
					// Sets the value for strAddress1 (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address2':
					// Sets the value for strAddress2 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'City':
					// Sets the value for strCity (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateProvinceId':
					// Sets the value for intStateProvinceId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStateProvince = null;
						return ($this->intStateProvinceId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostalCode':
					// Sets the value for strPostalCode (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPostalCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					// Sets the value for intCreatedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreationDate':
					// Sets the value for dttCreationDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttCreationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedBy':
					// Sets the value for intModifiedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objModifiedByObject = null;
						return ($this->intModifiedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Company':
					// Sets the value for the Company object referenced by intCompanyId (Not Null)
					// @param Company $mixValue
					// @return Company
					if (is_null($mixValue)) {
						$this->intCompanyId = null;
						$this->objCompany = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Company object
						try {
							$mixValue = QType::Cast($mixValue, 'Company');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Company object
						if (is_null($mixValue->CompanyId))
							throw new QCallerException('Unable to set an unsaved Company for this Address');

						// Update Local Member Variables
						$this->objCompany = $mixValue;
						$this->intCompanyId = $mixValue->CompanyId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Country':
					// Sets the value for the Country object referenced by intCountryId (Not Null)
					// @param Country $mixValue
					// @return Country
					if (is_null($mixValue)) {
						$this->intCountryId = null;
						$this->objCountry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Country object
						try {
							$mixValue = QType::Cast($mixValue, 'Country');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Country object
						if (is_null($mixValue->CountryId))
							throw new QCallerException('Unable to set an unsaved Country for this Address');

						// Update Local Member Variables
						$this->objCountry = $mixValue;
						$this->intCountryId = $mixValue->CountryId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StateProvince':
					// Sets the value for the StateProvince object referenced by intStateProvinceId 
					// @param StateProvince $mixValue
					// @return StateProvince
					if (is_null($mixValue)) {
						$this->intStateProvinceId = null;
						$this->objStateProvince = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StateProvince object
						try {
							$mixValue = QType::Cast($mixValue, 'StateProvince');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StateProvince object
						if (is_null($mixValue->StateProvinceId))
							throw new QCallerException('Unable to set an unsaved StateProvince for this Address');

						// Update Local Member Variables
						$this->objStateProvince = $mixValue;
						$this->intStateProvinceId = $mixValue->StateProvinceId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					// Sets the value for the UserAccount object referenced by intCreatedBy 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Address');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ModifiedByObject':
					// Sets the value for the UserAccount object referenced by intModifiedBy 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intModifiedBy = null;
						$this->objModifiedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Address');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AddressCustomFieldHelper':
					// Sets the value for the AddressCustomFieldHelper object referenced by objAddressCustomFieldHelper (Unique)
					// @param AddressCustomFieldHelper $mixValue
					// @return AddressCustomFieldHelper
					if (is_null($mixValue)) {
						$this->objAddressCustomFieldHelper = null;

						// Make sure we update the adjoined AddressCustomFieldHelper object the next time we call Save()
						$this->blnDirtyAddressCustomFieldHelper = true;

						return null;
					} else {
						// Make sure $mixValue actually is a AddressCustomFieldHelper object
						try {
							$mixValue = QType::Cast($mixValue, 'AddressCustomFieldHelper');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objAddressCustomFieldHelper to a DIFFERENT $mixValue?
						if ((!$this->AddressCustomFieldHelper) || ($this->AddressCustomFieldHelper->AddressId != $mixValue->AddressId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined AddressCustomFieldHelper object the next time we call Save()
							$this->blnDirtyAddressCustomFieldHelper = true;

							// Update Local Member Variable
							$this->objAddressCustomFieldHelper = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for Company
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Companies as an array of Company objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Company[]
		*/ 
		public function GetCompanyArray($objOptionalClauses = null) {
			if ((is_null($this->intAddressId)))
				return array();

			try {
				return Company::LoadArrayByAddressId($this->intAddressId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Companies
		 * @return int
		*/ 
		public function CountCompanies() {
			if ((is_null($this->intAddressId)))
				return 0;

			return Company::CountByAddressId($this->intAddressId);
		}

		/**
		 * Associates a Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function AssociateCompany(Company $objCompany) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompany on this unsaved Address.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompany on this Address with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCompany->AddressId = $this->intAddressId;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function UnassociateCompany(Company $objCompany) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this Address with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`address_id` = null
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->AddressId = null;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Companies
		 * @return void
		*/ 
		public function UnassociateAllCompanies() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByAddressId($this->intAddressId) as $objCompany) {
					$objCompany->AddressId = null;
					$objCompany->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`address_id` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

		/**
		 * Deletes an associated Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function DeleteAssociatedCompany(Company $objCompany) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this Address with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Companies
		 * @return void
		*/ 
		public function DeleteAllCompanies() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByAddressId($this->intAddressId) as $objCompany) {
					$objCompany->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

			
		
		// Related Objects' Methods for Contact
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Contacts as an array of Contact objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/ 
		public function GetContactArray($objOptionalClauses = null) {
			if ((is_null($this->intAddressId)))
				return array();

			try {
				return Contact::LoadArrayByAddressId($this->intAddressId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Contacts
		 * @return int
		*/ 
		public function CountContacts() {
			if ((is_null($this->intAddressId)))
				return 0;

			return Contact::CountByAddressId($this->intAddressId);
		}

		/**
		 * Associates a Contact
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function AssociateContact(Contact $objContact) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContact on this unsaved Address.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContact on this Address with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objContact->AddressId = $this->intAddressId;
				$objContact->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Contact
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function UnassociateContact(Contact $objContact) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContact on this unsaved Address.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContact on this Address with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`address_id` = null
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objContact->AddressId = null;
				$objContact->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Contacts
		 * @return void
		*/ 
		public function UnassociateAllContacts() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContact on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Contact::LoadArrayByAddressId($this->intAddressId) as $objContact) {
					$objContact->AddressId = null;
					$objContact->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`address_id` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

		/**
		 * Deletes an associated Contact
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function DeleteAssociatedContact(Contact $objContact) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContact on this unsaved Address.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContact on this Address with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objContact->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Contacts
		 * @return void
		*/ 
		public function DeleteAllContacts() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContact on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Contact::LoadArrayByAddressId($this->intAddressId) as $objContact) {
					$objContact->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

			
		
		// Related Objects' Methods for ReceiptAsTo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ReceiptsAsTo as an array of Receipt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Receipt[]
		*/ 
		public function GetReceiptAsToArray($objOptionalClauses = null) {
			if ((is_null($this->intAddressId)))
				return array();

			try {
				return Receipt::LoadArrayByToAddressId($this->intAddressId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ReceiptsAsTo
		 * @return int
		*/ 
		public function CountReceiptsAsTo() {
			if ((is_null($this->intAddressId)))
				return 0;

			return Receipt::CountByToAddressId($this->intAddressId);
		}

		/**
		 * Associates a ReceiptAsTo
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function AssociateReceiptAsTo(Receipt $objReceipt) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsTo on this unsaved Address.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsTo on this Address with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->ToAddressId = $this->intAddressId;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ReceiptAsTo
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function UnassociateReceiptAsTo(Receipt $objReceipt) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Address.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this Address with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`to_address_id` = null
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->ToAddressId = null;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ReceiptsAsTo
		 * @return void
		*/ 
		public function UnassociateAllReceiptsAsTo() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByToAddressId($this->intAddressId) as $objReceipt) {
					$objReceipt->ToAddressId = null;
					$objReceipt->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`to_address_id` = null
				WHERE
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

		/**
		 * Deletes an associated ReceiptAsTo
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function DeleteAssociatedReceiptAsTo(Receipt $objReceipt) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Address.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this Address with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ReceiptsAsTo
		 * @return void
		*/ 
		public function DeleteAllReceiptsAsTo() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByToAddressId($this->intAddressId) as $objReceipt) {
					$objReceipt->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

			
		
		// Related Objects' Methods for ShipmentAsFrom
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ShipmentsAsFrom as an array of Shipment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/ 
		public function GetShipmentAsFromArray($objOptionalClauses = null) {
			if ((is_null($this->intAddressId)))
				return array();

			try {
				return Shipment::LoadArrayByFromAddressId($this->intAddressId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ShipmentsAsFrom
		 * @return int
		*/ 
		public function CountShipmentsAsFrom() {
			if ((is_null($this->intAddressId)))
				return 0;

			return Shipment::CountByFromAddressId($this->intAddressId);
		}

		/**
		 * Associates a ShipmentAsFrom
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function AssociateShipmentAsFrom(Shipment $objShipment) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsFrom on this unsaved Address.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsFrom on this Address with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`from_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShipment->FromAddressId = $this->intAddressId;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ShipmentAsFrom
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function UnassociateShipmentAsFrom(Shipment $objShipment) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Address.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this Address with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`from_address_id` = null
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`from_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->FromAddressId = null;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ShipmentsAsFrom
		 * @return void
		*/ 
		public function UnassociateAllShipmentsAsFrom() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByFromAddressId($this->intAddressId) as $objShipment) {
					$objShipment->FromAddressId = null;
					$objShipment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`from_address_id` = null
				WHERE
					`from_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

		/**
		 * Deletes an associated ShipmentAsFrom
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function DeleteAssociatedShipmentAsFrom(Shipment $objShipment) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Address.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this Address with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`from_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ShipmentsAsFrom
		 * @return void
		*/ 
		public function DeleteAllShipmentsAsFrom() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByFromAddressId($this->intAddressId) as $objShipment) {
					$objShipment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`from_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

			
		
		// Related Objects' Methods for ShipmentAsTo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ShipmentsAsTo as an array of Shipment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/ 
		public function GetShipmentAsToArray($objOptionalClauses = null) {
			if ((is_null($this->intAddressId)))
				return array();

			try {
				return Shipment::LoadArrayByToAddressId($this->intAddressId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ShipmentsAsTo
		 * @return int
		*/ 
		public function CountShipmentsAsTo() {
			if ((is_null($this->intAddressId)))
				return 0;

			return Shipment::CountByToAddressId($this->intAddressId);
		}

		/**
		 * Associates a ShipmentAsTo
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function AssociateShipmentAsTo(Shipment $objShipment) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsTo on this unsaved Address.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsTo on this Address with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShipment->ToAddressId = $this->intAddressId;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ShipmentAsTo
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function UnassociateShipmentAsTo(Shipment $objShipment) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Address.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this Address with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`to_address_id` = null
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->ToAddressId = null;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ShipmentsAsTo
		 * @return void
		*/ 
		public function UnassociateAllShipmentsAsTo() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByToAddressId($this->intAddressId) as $objShipment) {
					$objShipment->ToAddressId = null;
					$objShipment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`to_address_id` = null
				WHERE
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}

		/**
		 * Deletes an associated ShipmentAsTo
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function DeleteAssociatedShipmentAsTo(Shipment $objShipment) {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Address.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this Address with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ShipmentsAsTo
		 * @return void
		*/ 
		public function DeleteAllShipmentsAsTo() {
			if ((is_null($this->intAddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByToAddressId($this->intAddressId) as $objShipment) {
					$objShipment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`to_address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Address"><sequence>';
			$strToReturn .= '<element name="AddressId" type="xsd:int"/>';
			$strToReturn .= '<element name="Company" type="xsd1:Company"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd1:Country"/>';
			$strToReturn .= '<element name="Address1" type="xsd:string"/>';
			$strToReturn .= '<element name="Address2" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="StateProvince" type="xsd1:StateProvince"/>';
			$strToReturn .= '<element name="PostalCode" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Address', $strComplexTypeArray)) {
				$strComplexTypeArray['Address'] = Address::GetSoapComplexTypeXml();
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
				Country::AlterSoapComplexTypeArray($strComplexTypeArray);
				StateProvince::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Address::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Address();
			if (property_exists($objSoapObject, 'AddressId'))
				$objToReturn->intAddressId = $objSoapObject->AddressId;
			if ((property_exists($objSoapObject, 'Company')) &&
				($objSoapObject->Company))
				$objToReturn->Company = Company::GetObjectFromSoapObject($objSoapObject->Company);
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if ((property_exists($objSoapObject, 'Country')) &&
				($objSoapObject->Country))
				$objToReturn->Country = Country::GetObjectFromSoapObject($objSoapObject->Country);
			if (property_exists($objSoapObject, 'Address1'))
				$objToReturn->strAddress1 = $objSoapObject->Address1;
			if (property_exists($objSoapObject, 'Address2'))
				$objToReturn->strAddress2 = $objSoapObject->Address2;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if ((property_exists($objSoapObject, 'StateProvince')) &&
				($objSoapObject->StateProvince))
				$objToReturn->StateProvince = StateProvince::GetObjectFromSoapObject($objSoapObject->StateProvince);
			if (property_exists($objSoapObject, 'PostalCode'))
				$objToReturn->strPostalCode = $objSoapObject->PostalCode;
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'CreationDate'))
				$objToReturn->dttCreationDate = new QDateTime($objSoapObject->CreationDate);
			if ((property_exists($objSoapObject, 'ModifiedByObject')) &&
				($objSoapObject->ModifiedByObject))
				$objToReturn->ModifiedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->ModifiedByObject);
			if (property_exists($objSoapObject, 'ModifiedDate'))
				$objToReturn->strModifiedDate = $objSoapObject->ModifiedDate;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Address::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCompany)
				$objObject->objCompany = Company::GetSoapObjectFromObject($objObject->objCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCompanyId = null;
			if ($objObject->objCountry)
				$objObject->objCountry = Country::GetSoapObjectFromObject($objObject->objCountry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCountryId = null;
			if ($objObject->objStateProvince)
				$objObject->objStateProvince = StateProvince::GetSoapObjectFromObject($objObject->objStateProvince, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStateProvinceId = null;
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = UserAccount::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->dttCreationDate)
				$objObject->dttCreationDate = $objObject->dttCreationDate->__toString(QDateTime::FormatSoap);
			if ($objObject->objModifiedByObject)
				$objObject->objModifiedByObject = UserAccount::GetSoapObjectFromObject($objObject->objModifiedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intModifiedBy = null;
			return $objObject;
		}




		////////////////////////////////////////////////////////
		// METHODS for MANUAL QUERY SUPPORT (aka Beta 2 Queries)
		////////////////////////////////////////////////////////

		/**
		 * Internally called method to assist with SQL Query options/preferences for single row loaders.
		 * Any Load (single row) method can use this method to get the Database object.
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function QueryHelper(&$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];
		}



		/**
		 * Internally called method to assist with SQL Query options/preferences for array loaders.
		 * Any LoadAll or LoadArray method can use this method to setup SQL Query Clauses that deal
		 * with OrderBy, Limit, and Object Expansion.  Strings that contain SQL Query Clauses are
		 * passed in by reference.
		 * @param string $strOrderBy reference to the Order By as passed in to the LoadArray method
		 * @param string $strLimit the Limit as passed in to the LoadArray method
		 * @param string $strLimitPrefix reference to the Limit Prefix to be used in the SQL
		 * @param string $strLimitSuffix reference to the Limit Suffix to be used in the SQL
		 * @param string $strExpandSelect reference to the Expand Select to be used in the SQL
		 * @param string $strExpandFrom reference to the Expand From to be used in the SQL
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function ArrayQueryHelper(&$strOrderBy, $strLimit, &$strLimitPrefix, &$strLimitSuffix, &$strExpandSelect, &$strExpandFrom, $objExpansionMap, &$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];

			// Setup OrderBy and Limit Information (if applicable)
			$strOrderBy = $objDatabase->SqlSortByVariable($strOrderBy);
			$strLimitPrefix = $objDatabase->SqlLimitVariablePrefix($strLimit);
			$strLimitSuffix = $objDatabase->SqlLimitVariableSuffix($strLimit);

			// Setup QueryExpansion (if applicable)
			if ($objExpansionMap) {
				$objQueryExpansion = new QQueryExpansion('Address', 'address', $objExpansionMap);
				$strExpandSelect = $objQueryExpansion->GetSelectSql();
				$strExpandFrom = $objQueryExpansion->GetFromSql();
			} else {
				$strExpandSelect = null;
				$strExpandFrom = null;
			}
		}



		/**
		 * Internally called method to assist with early binding of objects
		 * on load methods.  Can only early-bind references that this class owns in the database.
		 * @param string $strParentAlias the alias of the parent (if any)
		 * @param string $strAlias the alias of this object
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param QueryExpansion an already instantiated QueryExpansion object (used as a utility object to assist with object expansion)
		 */
		public static function ExpandQuery($strParentAlias, $strAlias, $objExpansionMap, QQueryExpansion $objQueryExpansion) {
			if ($strAlias) {
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `address` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`address_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`address_id` AS `%s__%s__address_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`company_id` AS `%s__%s__company_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`short_description` AS `%s__%s__short_description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`country_id` AS `%s__%s__country_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`address_1` AS `%s__%s__address_1`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`address_2` AS `%s__%s__address_2`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`city` AS `%s__%s__city`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`state_province_id` AS `%s__%s__state_province_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`postal_code` AS `%s__%s__postal_code`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'company_id':
							try {
								Company::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'country_id':
							try {
								Country::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'state_province_id':
							try {
								StateProvince::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'created_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'modified_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						default:
							throw new QCallerException(sprintf('Unknown Object to Expand in %s: %s', $strParentAlias, $strKey));
					}
				}
		}




		////////////////////////////////////////
		// COLUMN CONSTANTS for OBJECT EXPANSION
		////////////////////////////////////////
		const ExpandCompany = 'company_id';
		const ExpandCountry = 'country_id';
		const ExpandStateProvince = 'state_province_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AddressId
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $CountryId
	 * @property-read QQNodeCountry $Country
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $City
	 * @property-read QQNode $StateProvinceId
	 * @property-read QQNodeStateProvince $StateProvince
	 * @property-read QQNode $PostalCode
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAddressCustomFieldHelper $AddressCustomFieldHelper
	 * @property-read QQReverseReferenceNodeCompany $Company
	 * @property-read QQReverseReferenceNodeContact $Contact
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsTo
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsFrom
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsTo
	 */
	class QQNodeAddress extends QQNode {
		protected $strTableName = 'address';
		protected $strPrimaryKey = 'address_id';
		protected $strClassName = 'Address';
		public function __get($strName) {
			switch ($strName) {
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'Country':
					return new QQNodeCountry('country_id', 'Country', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address_2', 'Address2', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'StateProvinceId':
					return new QQNode('state_province_id', 'StateProvinceId', 'integer', $this);
				case 'StateProvince':
					return new QQNodeStateProvince('state_province_id', 'StateProvince', 'integer', $this);
				case 'PostalCode':
					return new QQNode('postal_code', 'PostalCode', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'ModifiedDate', 'string', $this);
				case 'AddressCustomFieldHelper':
					return new QQReverseReferenceNodeAddressCustomFieldHelper($this, 'addresscustomfieldhelper', 'reverse_reference', 'address_id', 'AddressCustomFieldHelper');
				case 'Company':
					return new QQReverseReferenceNodeCompany($this, 'company', 'reverse_reference', 'address_id');
				case 'Contact':
					return new QQReverseReferenceNodeContact($this, 'contact', 'reverse_reference', 'address_id');
				case 'ReceiptAsTo':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasto', 'reverse_reference', 'to_address_id');
				case 'ShipmentAsFrom':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasfrom', 'reverse_reference', 'from_address_id');
				case 'ShipmentAsTo':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasto', 'reverse_reference', 'to_address_id');

				case '_PrimaryKeyNode':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
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
	
	/**
	 * @property-read QQNode $AddressId
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $CountryId
	 * @property-read QQNodeCountry $Country
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $City
	 * @property-read QQNode $StateProvinceId
	 * @property-read QQNodeStateProvince $StateProvince
	 * @property-read QQNode $PostalCode
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAddressCustomFieldHelper $AddressCustomFieldHelper
	 * @property-read QQReverseReferenceNodeCompany $Company
	 * @property-read QQReverseReferenceNodeContact $Contact
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsTo
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsFrom
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsTo
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAddress extends QQReverseReferenceNode {
		protected $strTableName = 'address';
		protected $strPrimaryKey = 'address_id';
		protected $strClassName = 'Address';
		public function __get($strName) {
			switch ($strName) {
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'Country':
					return new QQNodeCountry('country_id', 'Country', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address_2', 'Address2', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'StateProvinceId':
					return new QQNode('state_province_id', 'StateProvinceId', 'integer', $this);
				case 'StateProvince':
					return new QQNodeStateProvince('state_province_id', 'StateProvince', 'integer', $this);
				case 'PostalCode':
					return new QQNode('postal_code', 'PostalCode', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'ModifiedDate', 'string', $this);
				case 'AddressCustomFieldHelper':
					return new QQReverseReferenceNodeAddressCustomFieldHelper($this, 'addresscustomfieldhelper', 'reverse_reference', 'address_id', 'AddressCustomFieldHelper');
				case 'Company':
					return new QQReverseReferenceNodeCompany($this, 'company', 'reverse_reference', 'address_id');
				case 'Contact':
					return new QQReverseReferenceNodeContact($this, 'contact', 'reverse_reference', 'address_id');
				case 'ReceiptAsTo':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasto', 'reverse_reference', 'to_address_id');
				case 'ShipmentAsFrom':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasfrom', 'reverse_reference', 'from_address_id');
				case 'ShipmentAsTo':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasto', 'reverse_reference', 'to_address_id');

				case '_PrimaryKeyNode':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
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