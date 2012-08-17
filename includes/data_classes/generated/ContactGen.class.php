<?php
	/**
	 * The abstract ContactGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Contact subclass which
	 * extends this ContactGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Contact class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ContactId the value for intContactId (Read-Only PK)
	 * @property integer $CompanyId the value for intCompanyId (Not Null)
	 * @property integer $AddressId the value for intAddressId 
	 * @property string $FirstName the value for strFirstName 
	 * @property string $LastName the value for strLastName (Not Null)
	 * @property string $Title the value for strTitle 
	 * @property string $Email the value for strEmail 
	 * @property string $PhoneOffice the value for strPhoneOffice 
	 * @property string $PhoneHome the value for strPhoneHome 
	 * @property string $PhoneMobile the value for strPhoneMobile 
	 * @property string $Fax the value for strFax 
	 * @property string $Description the value for strDescription 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property Company $Company the value for the Company object referenced by intCompanyId (Not Null)
	 * @property Address $Address the value for the Address object referenced by intAddressId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property ContactCustomFieldHelper $ContactCustomFieldHelper the value for the ContactCustomFieldHelper object that uniquely references this Contact
	 * @property AssetTransactionCheckout $_AssetTransactionCheckoutAsTo the value for the private _objAssetTransactionCheckoutAsTo (Read-Only) if set due to an expansion on the asset_transaction_checkout.to_contact_id reverse relationship
	 * @property AssetTransactionCheckout[] $_AssetTransactionCheckoutAsToArray the value for the private _objAssetTransactionCheckoutAsToArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction_checkout.to_contact_id reverse relationship
	 * @property Receipt $_ReceiptAsFrom the value for the private _objReceiptAsFrom (Read-Only) if set due to an expansion on the receipt.from_contact_id reverse relationship
	 * @property Receipt[] $_ReceiptAsFromArray the value for the private _objReceiptAsFromArray (Read-Only) if set due to an ExpandAsArray on the receipt.from_contact_id reverse relationship
	 * @property Receipt $_ReceiptAsTo the value for the private _objReceiptAsTo (Read-Only) if set due to an expansion on the receipt.to_contact_id reverse relationship
	 * @property Receipt[] $_ReceiptAsToArray the value for the private _objReceiptAsToArray (Read-Only) if set due to an ExpandAsArray on the receipt.to_contact_id reverse relationship
	 * @property Shipment $_ShipmentAsFrom the value for the private _objShipmentAsFrom (Read-Only) if set due to an expansion on the shipment.from_contact_id reverse relationship
	 * @property Shipment[] $_ShipmentAsFromArray the value for the private _objShipmentAsFromArray (Read-Only) if set due to an ExpandAsArray on the shipment.from_contact_id reverse relationship
	 * @property Shipment $_ShipmentAsTo the value for the private _objShipmentAsTo (Read-Only) if set due to an expansion on the shipment.to_contact_id reverse relationship
	 * @property Shipment[] $_ShipmentAsToArray the value for the private _objShipmentAsToArray (Read-Only) if set due to an ExpandAsArray on the shipment.to_contact_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ContactGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column contact.contact_id
		 * @var integer intContactId
		 */
		protected $intContactId;
		const ContactIdDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.company_id
		 * @var integer intCompanyId
		 */
		protected $intCompanyId;
		const CompanyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.address_id
		 * @var integer intAddressId
		 */
		protected $intAddressId;
		const AddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 50;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 50;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.title
		 * @var string strTitle
		 */
		protected $strTitle;
		const TitleMaxLength = 50;
		const TitleDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.phone_office
		 * @var string strPhoneOffice
		 */
		protected $strPhoneOffice;
		const PhoneOfficeMaxLength = 50;
		const PhoneOfficeDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.phone_home
		 * @var string strPhoneHome
		 */
		protected $strPhoneHome;
		const PhoneHomeMaxLength = 50;
		const PhoneHomeDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.phone_mobile
		 * @var string strPhoneMobile
		 */
		protected $strPhoneMobile;
		const PhoneMobileMaxLength = 50;
		const PhoneMobileDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.fax
		 * @var string strFax
		 */
		protected $strFax;
		const FaxMaxLength = 50;
		const FaxDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column contact.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single AssetTransactionCheckoutAsTo object
		 * (of type AssetTransactionCheckout), if this Contact object was restored with
		 * an expansion on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout _objAssetTransactionCheckoutAsTo;
		 */
		private $_objAssetTransactionCheckoutAsTo;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionCheckoutAsTo objects
		 * (of type AssetTransactionCheckout[]), if this Contact object was restored with
		 * an ExpandAsArray on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout[] _objAssetTransactionCheckoutAsToArray;
		 */
		private $_objAssetTransactionCheckoutAsToArray = array();

		/**
		 * Private member variable that stores a reference to a single ReceiptAsFrom object
		 * (of type Receipt), if this Contact object was restored with
		 * an expansion on the receipt association table.
		 * @var Receipt _objReceiptAsFrom;
		 */
		private $_objReceiptAsFrom;

		/**
		 * Private member variable that stores a reference to an array of ReceiptAsFrom objects
		 * (of type Receipt[]), if this Contact object was restored with
		 * an ExpandAsArray on the receipt association table.
		 * @var Receipt[] _objReceiptAsFromArray;
		 */
		private $_objReceiptAsFromArray = array();

		/**
		 * Private member variable that stores a reference to a single ReceiptAsTo object
		 * (of type Receipt), if this Contact object was restored with
		 * an expansion on the receipt association table.
		 * @var Receipt _objReceiptAsTo;
		 */
		private $_objReceiptAsTo;

		/**
		 * Private member variable that stores a reference to an array of ReceiptAsTo objects
		 * (of type Receipt[]), if this Contact object was restored with
		 * an ExpandAsArray on the receipt association table.
		 * @var Receipt[] _objReceiptAsToArray;
		 */
		private $_objReceiptAsToArray = array();

		/**
		 * Private member variable that stores a reference to a single ShipmentAsFrom object
		 * (of type Shipment), if this Contact object was restored with
		 * an expansion on the shipment association table.
		 * @var Shipment _objShipmentAsFrom;
		 */
		private $_objShipmentAsFrom;

		/**
		 * Private member variable that stores a reference to an array of ShipmentAsFrom objects
		 * (of type Shipment[]), if this Contact object was restored with
		 * an ExpandAsArray on the shipment association table.
		 * @var Shipment[] _objShipmentAsFromArray;
		 */
		private $_objShipmentAsFromArray = array();

		/**
		 * Private member variable that stores a reference to a single ShipmentAsTo object
		 * (of type Shipment), if this Contact object was restored with
		 * an expansion on the shipment association table.
		 * @var Shipment _objShipmentAsTo;
		 */
		private $_objShipmentAsTo;

		/**
		 * Private member variable that stores a reference to an array of ShipmentAsTo objects
		 * (of type Shipment[]), if this Contact object was restored with
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
		 * in the database column contact.company_id.
		 *
		 * NOTE: Always use the Company property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objCompany
		 */
		protected $objCompany;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column contact.address_id.
		 *
		 * NOTE: Always use the Address property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objAddress
		 */
		protected $objAddress;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column contact.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column contact.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column contact_custom_field_helper.contact_id.
		 *
		 * NOTE: Always use the ContactCustomFieldHelper property getter to correctly retrieve this ContactCustomFieldHelper object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ContactCustomFieldHelper objContactCustomFieldHelper
		 */
		protected $objContactCustomFieldHelper;
		
		/**
		 * Used internally to manage whether the adjoined ContactCustomFieldHelper object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyContactCustomFieldHelper;





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
		 * Load a Contact from PK Info
		 * @param integer $intContactId
		 * @return Contact
		 */
		public static function Load($intContactId) {
			// Use QuerySingle to Perform the Query
			return Contact::QuerySingle(
				QQ::Equal(QQN::Contact()->ContactId, $intContactId)
			);
		}

		/**
		 * Load all Contacts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Contact::QueryArray to perform the LoadAll query
			try {
				return Contact::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Contacts
		 * @return int
		 */
		public static function CountAll() {
			// Call Contact::QueryCount to perform the CountAll query
			return Contact::QueryCount(QQ::All());
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
			$objDatabase = Contact::GetDatabase();

			// Create/Build out the QueryBuilder object with Contact-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'contact');
			Contact::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('contact');

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
		 * Static Qcodo Query method to query for a single Contact object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Contact the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Contact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Contact object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Contact::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Contact::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Contact objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Contact[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Contact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Contact::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Contact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Contact objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Contact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Contact::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'contact_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Contact-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Contact::GetSelectFields($objQueryBuilder);
				Contact::GetFromFields($objQueryBuilder);

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
			return Contact::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Contact
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'contact';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'contact_id', $strAliasPrefix . 'contact_id');
			$objBuilder->AddSelectItem($strTableName, 'company_id', $strAliasPrefix . 'company_id');
			$objBuilder->AddSelectItem($strTableName, 'address_id', $strAliasPrefix . 'address_id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'title', $strAliasPrefix . 'title');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'phone_office', $strAliasPrefix . 'phone_office');
			$objBuilder->AddSelectItem($strTableName, 'phone_home', $strAliasPrefix . 'phone_home');
			$objBuilder->AddSelectItem($strTableName, 'phone_mobile', $strAliasPrefix . 'phone_mobile');
			$objBuilder->AddSelectItem($strTableName, 'fax', $strAliasPrefix . 'fax');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Contact from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Contact::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Contact
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intContactId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'contact__';


				$strAlias = $strAliasPrefix . 'assettransactioncheckoutasto__asset_transaction_checkout_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionCheckoutAsToArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionCheckoutAsToArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasto__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionCheckoutAsToArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionCheckoutAsToArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'receiptasfrom__receipt_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objReceiptAsFromArray)) {
						$objPreviousChildItem = $objPreviousItem->_objReceiptAsFromArray[$intPreviousChildItemCount - 1];
						$objChildItem = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasfrom__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objReceiptAsFromArray[] = $objChildItem;
					} else
						$objPreviousItem->_objReceiptAsFromArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasfrom__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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
				else if ($strAliasPrefix == 'contact__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Contact object
			$objToReturn = new Contact();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'contact_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'contact_id'] : $strAliasPrefix . 'contact_id';
			$objToReturn->intContactId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'company_id'] : $strAliasPrefix . 'company_id';
			$objToReturn->intCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_id'] : $strAliasPrefix . 'address_id';
			$objToReturn->intAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title'] : $strAliasPrefix . 'title';
			$objToReturn->strTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone_office', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone_office'] : $strAliasPrefix . 'phone_office';
			$objToReturn->strPhoneOffice = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone_home', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone_home'] : $strAliasPrefix . 'phone_home';
			$objToReturn->strPhoneHome = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone_mobile', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone_mobile'] : $strAliasPrefix . 'phone_mobile';
			$objToReturn->strPhoneMobile = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fax', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fax'] : $strAliasPrefix . 'fax';
			$objToReturn->strFax = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
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
				$strAliasPrefix = 'contact__';

			// Check for Company Early Binding
			$strAlias = $strAliasPrefix . 'company_id__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Address Early Binding
			$strAlias = $strAliasPrefix . 'address_id__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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


			// Check for ContactCustomFieldHelper Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'contactcustomfieldhelper__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objContactCustomFieldHelper = ContactCustomFieldHelper::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactcustomfieldhelper__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objContactCustomFieldHelper = false;
			}



			// Check for AssetTransactionCheckoutAsTo Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactioncheckoutasto__asset_transaction_checkout_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionCheckoutAsToArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionCheckoutAsTo = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ReceiptAsFrom Virtual Binding
			$strAlias = $strAliasPrefix . 'receiptasfrom__receipt_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objReceiptAsFromArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasfrom__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objReceiptAsFrom = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasfrom__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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
		 * Instantiate an array of Contacts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Contact[]
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
					$objItem = Contact::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Contact::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Contact object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Contact next row resulting from the query
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
			return Contact::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Contact object,
		 * by ContactId Index(es)
		 * @param integer $intContactId
		 * @return Contact
		*/
		public static function LoadByContactId($intContactId, $objOptionalClauses = null) {
			return Contact::QuerySingle(
				QQ::Equal(QQN::Contact()->ContactId, $intContactId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Contact objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Contact::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Contact::QueryArray(
					QQ::Equal(QQN::Contact()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Contacts
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Contact::QueryCount to perform the CountByModifiedBy query
			return Contact::QueryCount(
				QQ::Equal(QQN::Contact()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Contact objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Contact::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Contact::QueryArray(
					QQ::Equal(QQN::Contact()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Contacts
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Contact::QueryCount to perform the CountByCreatedBy query
			return Contact::QueryCount(
				QQ::Equal(QQN::Contact()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Contact objects,
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/
		public static function LoadArrayByAddressId($intAddressId, $objOptionalClauses = null) {
			// Call Contact::QueryArray to perform the LoadArrayByAddressId query
			try {
				return Contact::QueryArray(
					QQ::Equal(QQN::Contact()->AddressId, $intAddressId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Contacts
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @return int
		*/
		public static function CountByAddressId($intAddressId, $objOptionalClauses = null) {
			// Call Contact::QueryCount to perform the CountByAddressId query
			return Contact::QueryCount(
				QQ::Equal(QQN::Contact()->AddressId, $intAddressId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Contact objects,
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/
		public static function LoadArrayByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call Contact::QueryArray to perform the LoadArrayByCompanyId query
			try {
				return Contact::QueryArray(
					QQ::Equal(QQN::Contact()->CompanyId, $intCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Contacts
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @return int
		*/
		public static function CountByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call Contact::QueryCount to perform the CountByCompanyId query
			return Contact::QueryCount(
				QQ::Equal(QQN::Contact()->CompanyId, $intCompanyId)
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
		 * Save this Contact
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `contact` (
							`company_id`,
							`address_id`,
							`first_name`,
							`last_name`,
							`title`,
							`email`,
							`phone_office`,
							`phone_home`,
							`phone_mobile`,
							`fax`,
							`description`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							' . $objDatabase->SqlVariable($this->intAddressId) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strTitle) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strPhoneOffice) . ',
							' . $objDatabase->SqlVariable($this->strPhoneHome) . ',
							' . $objDatabase->SqlVariable($this->strPhoneMobile) . ',
							' . $objDatabase->SqlVariable($this->strFax) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intContactId = $objDatabase->InsertId('contact', 'contact_id');

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
								`contact`
							WHERE
								`contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('Contact');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`contact`
						SET
							`company_id` = ' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`title` = ' . $objDatabase->SqlVariable($this->strTitle) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`phone_office` = ' . $objDatabase->SqlVariable($this->strPhoneOffice) . ',
							`phone_home` = ' . $objDatabase->SqlVariable($this->strPhoneHome) . ',
							`phone_mobile` = ' . $objDatabase->SqlVariable($this->strPhoneMobile) . ',
							`fax` = ' . $objDatabase->SqlVariable($this->strFax) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined ContactCustomFieldHelper object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyContactCustomFieldHelper) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = ContactCustomFieldHelper::LoadByContactId($this->intContactId)) {
						$objAssociated->ContactId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objContactCustomFieldHelper) {
						$this->objContactCustomFieldHelper->ContactId = $this->intContactId;
						$this->objContactCustomFieldHelper->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyContactCustomFieldHelper = false;
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
					`contact`
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Contact
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Contact with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			
			
			// Update the adjoined ContactCustomFieldHelper object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = ContactCustomFieldHelper::LoadByContactId($this->intContactId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Contacts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`');
		}

		/**
		 * Truncate contact table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `contact`');
		}

		/**
		 * Reload this Contact from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Contact object.');

			// Reload the Object
			$objReloaded = Contact::Load($this->intContactId);

			// Update $this's local variables to match
			$this->CompanyId = $objReloaded->CompanyId;
			$this->AddressId = $objReloaded->AddressId;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strTitle = $objReloaded->strTitle;
			$this->strEmail = $objReloaded->strEmail;
			$this->strPhoneOffice = $objReloaded->strPhoneOffice;
			$this->strPhoneHome = $objReloaded->strPhoneHome;
			$this->strPhoneMobile = $objReloaded->strPhoneMobile;
			$this->strFax = $objReloaded->strFax;
			$this->strDescription = $objReloaded->strDescription;
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
			$objDatabase = Contact::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `contact` (
					`contact_id`,
					`company_id`,
					`address_id`,
					`first_name`,
					`last_name`,
					`title`,
					`email`,
					`phone_office`,
					`phone_home`,
					`phone_mobile`,
					`fax`,
					`description`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intContactId) . ',
					' . $objDatabase->SqlVariable($this->intCompanyId) . ',
					' . $objDatabase->SqlVariable($this->intAddressId) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strTitle) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->strPhoneOffice) . ',
					' . $objDatabase->SqlVariable($this->strPhoneHome) . ',
					' . $objDatabase->SqlVariable($this->strPhoneMobile) . ',
					' . $objDatabase->SqlVariable($this->strFax) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
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
		 * @param integer intContactId
		 * @return Contact[]
		 */
		public static function GetJournalForId($intContactId) {
			$objDatabase = Contact::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM contact WHERE contact_id = ' .
				$objDatabase->SqlVariable($intContactId) . ' ORDER BY __sys_date');

			return Contact::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Contact[]
		 */
		public function GetJournal() {
			return Contact::GetJournalForId($this->intContactId);
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
				case 'ContactId':
					// Gets the value for intContactId (Read-Only PK)
					// @return integer
					return $this->intContactId;

				case 'CompanyId':
					// Gets the value for intCompanyId (Not Null)
					// @return integer
					return $this->intCompanyId;

				case 'AddressId':
					// Gets the value for intAddressId 
					// @return integer
					return $this->intAddressId;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName (Not Null)
					// @return string
					return $this->strLastName;

				case 'Title':
					// Gets the value for strTitle 
					// @return string
					return $this->strTitle;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;

				case 'PhoneOffice':
					// Gets the value for strPhoneOffice 
					// @return string
					return $this->strPhoneOffice;

				case 'PhoneHome':
					// Gets the value for strPhoneHome 
					// @return string
					return $this->strPhoneHome;

				case 'PhoneMobile':
					// Gets the value for strPhoneMobile 
					// @return string
					return $this->strPhoneMobile;

				case 'Fax':
					// Gets the value for strFax 
					// @return string
					return $this->strFax;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

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

				case 'Address':
					// Gets the value for the Address object referenced by intAddressId 
					// @return Address
					try {
						if ((!$this->objAddress) && (!is_null($this->intAddressId)))
							$this->objAddress = Address::Load($this->intAddressId);
						return $this->objAddress;
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

		
		
				case 'ContactCustomFieldHelper':
					// Gets the value for the ContactCustomFieldHelper object that uniquely references this Contact
					// by objContactCustomFieldHelper (Unique)
					// @return ContactCustomFieldHelper
					try {
						if ($this->objContactCustomFieldHelper === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objContactCustomFieldHelper)
							$this->objContactCustomFieldHelper = ContactCustomFieldHelper::LoadByContactId($this->intContactId);
						return $this->objContactCustomFieldHelper;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AssetTransactionCheckoutAsTo':
					// Gets the value for the private _objAssetTransactionCheckoutAsTo (Read-Only)
					// if set due to an expansion on the asset_transaction_checkout.to_contact_id reverse relationship
					// @return AssetTransactionCheckout
					return $this->_objAssetTransactionCheckoutAsTo;

				case '_AssetTransactionCheckoutAsToArray':
					// Gets the value for the private _objAssetTransactionCheckoutAsToArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction_checkout.to_contact_id reverse relationship
					// @return AssetTransactionCheckout[]
					return (array) $this->_objAssetTransactionCheckoutAsToArray;

				case '_ReceiptAsFrom':
					// Gets the value for the private _objReceiptAsFrom (Read-Only)
					// if set due to an expansion on the receipt.from_contact_id reverse relationship
					// @return Receipt
					return $this->_objReceiptAsFrom;

				case '_ReceiptAsFromArray':
					// Gets the value for the private _objReceiptAsFromArray (Read-Only)
					// if set due to an ExpandAsArray on the receipt.from_contact_id reverse relationship
					// @return Receipt[]
					return (array) $this->_objReceiptAsFromArray;

				case '_ReceiptAsTo':
					// Gets the value for the private _objReceiptAsTo (Read-Only)
					// if set due to an expansion on the receipt.to_contact_id reverse relationship
					// @return Receipt
					return $this->_objReceiptAsTo;

				case '_ReceiptAsToArray':
					// Gets the value for the private _objReceiptAsToArray (Read-Only)
					// if set due to an ExpandAsArray on the receipt.to_contact_id reverse relationship
					// @return Receipt[]
					return (array) $this->_objReceiptAsToArray;

				case '_ShipmentAsFrom':
					// Gets the value for the private _objShipmentAsFrom (Read-Only)
					// if set due to an expansion on the shipment.from_contact_id reverse relationship
					// @return Shipment
					return $this->_objShipmentAsFrom;

				case '_ShipmentAsFromArray':
					// Gets the value for the private _objShipmentAsFromArray (Read-Only)
					// if set due to an ExpandAsArray on the shipment.from_contact_id reverse relationship
					// @return Shipment[]
					return (array) $this->_objShipmentAsFromArray;

				case '_ShipmentAsTo':
					// Gets the value for the private _objShipmentAsTo (Read-Only)
					// if set due to an expansion on the shipment.to_contact_id reverse relationship
					// @return Shipment
					return $this->_objShipmentAsTo;

				case '_ShipmentAsToArray':
					// Gets the value for the private _objShipmentAsToArray (Read-Only)
					// if set due to an ExpandAsArray on the shipment.to_contact_id reverse relationship
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

				case 'AddressId':
					// Sets the value for intAddressId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAddress = null;
						return ($this->intAddressId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					// Sets the value for strFirstName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Title':
					// Sets the value for strTitle 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTitle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					// Sets the value for strEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PhoneOffice':
					// Sets the value for strPhoneOffice 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPhoneOffice = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PhoneHome':
					// Sets the value for strPhoneHome 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPhoneHome = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PhoneMobile':
					// Sets the value for strPhoneMobile 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPhoneMobile = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fax':
					// Sets the value for strFax 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFax = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
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
							throw new QCallerException('Unable to set an unsaved Company for this Contact');

						// Update Local Member Variables
						$this->objCompany = $mixValue;
						$this->intCompanyId = $mixValue->CompanyId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Address':
					// Sets the value for the Address object referenced by intAddressId 
					// @param Address $mixValue
					// @return Address
					if (is_null($mixValue)) {
						$this->intAddressId = null;
						$this->objAddress = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Address object
						try {
							$mixValue = QType::Cast($mixValue, 'Address');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Address object
						if (is_null($mixValue->AddressId))
							throw new QCallerException('Unable to set an unsaved Address for this Contact');

						// Update Local Member Variables
						$this->objAddress = $mixValue;
						$this->intAddressId = $mixValue->AddressId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Contact');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Contact');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ContactCustomFieldHelper':
					// Sets the value for the ContactCustomFieldHelper object referenced by objContactCustomFieldHelper (Unique)
					// @param ContactCustomFieldHelper $mixValue
					// @return ContactCustomFieldHelper
					if (is_null($mixValue)) {
						$this->objContactCustomFieldHelper = null;

						// Make sure we update the adjoined ContactCustomFieldHelper object the next time we call Save()
						$this->blnDirtyContactCustomFieldHelper = true;

						return null;
					} else {
						// Make sure $mixValue actually is a ContactCustomFieldHelper object
						try {
							$mixValue = QType::Cast($mixValue, 'ContactCustomFieldHelper');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objContactCustomFieldHelper to a DIFFERENT $mixValue?
						if ((!$this->ContactCustomFieldHelper) || ($this->ContactCustomFieldHelper->ContactId != $mixValue->ContactId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined ContactCustomFieldHelper object the next time we call Save()
							$this->blnDirtyContactCustomFieldHelper = true;

							// Update Local Member Variable
							$this->objContactCustomFieldHelper = $mixValue;
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

			
		
		// Related Objects' Methods for AssetTransactionCheckoutAsTo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionCheckoutsAsTo as an array of AssetTransactionCheckout objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/ 
		public function GetAssetTransactionCheckoutAsToArray($objOptionalClauses = null) {
			if ((is_null($this->intContactId)))
				return array();

			try {
				return AssetTransactionCheckout::LoadArrayByToContactId($this->intContactId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionCheckoutsAsTo
		 * @return int
		*/ 
		public function CountAssetTransactionCheckoutsAsTo() {
			if ((is_null($this->intContactId)))
				return 0;

			return AssetTransactionCheckout::CountByToContactId($this->intContactId);
		}

		/**
		 * Associates a AssetTransactionCheckoutAsTo
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function AssociateAssetTransactionCheckoutAsTo(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsTo on this unsaved Contact.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsTo on this Contact with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->ToContactId = $this->intContactId;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionCheckoutAsTo
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function UnassociateAssetTransactionCheckoutAsTo(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsTo on this unsaved Contact.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsTo on this Contact with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`to_contact_id` = null
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->ToContactId = null;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionCheckoutsAsTo
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionCheckoutsAsTo() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsTo on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByToContactId($this->intContactId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->ToContactId = null;
					$objAssetTransactionCheckout->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`to_contact_id` = null
				WHERE
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionCheckoutAsTo
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionCheckoutAsTo(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsTo on this unsaved Contact.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsTo on this Contact with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionCheckoutsAsTo
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionCheckoutsAsTo() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsTo on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByToContactId($this->intContactId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}

			
		
		// Related Objects' Methods for ReceiptAsFrom
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ReceiptsAsFrom as an array of Receipt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Receipt[]
		*/ 
		public function GetReceiptAsFromArray($objOptionalClauses = null) {
			if ((is_null($this->intContactId)))
				return array();

			try {
				return Receipt::LoadArrayByFromContactId($this->intContactId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ReceiptsAsFrom
		 * @return int
		*/ 
		public function CountReceiptsAsFrom() {
			if ((is_null($this->intContactId)))
				return 0;

			return Receipt::CountByFromContactId($this->intContactId);
		}

		/**
		 * Associates a ReceiptAsFrom
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function AssociateReceiptAsFrom(Receipt $objReceipt) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsFrom on this unsaved Contact.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsFrom on this Contact with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->FromContactId = $this->intContactId;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ReceiptAsFrom
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function UnassociateReceiptAsFrom(Receipt $objReceipt) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsFrom on this unsaved Contact.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsFrom on this Contact with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`from_contact_id` = null
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->FromContactId = null;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ReceiptsAsFrom
		 * @return void
		*/ 
		public function UnassociateAllReceiptsAsFrom() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsFrom on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByFromContactId($this->intContactId) as $objReceipt) {
					$objReceipt->FromContactId = null;
					$objReceipt->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`from_contact_id` = null
				WHERE
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}

		/**
		 * Deletes an associated ReceiptAsFrom
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function DeleteAssociatedReceiptAsFrom(Receipt $objReceipt) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsFrom on this unsaved Contact.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsFrom on this Contact with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ReceiptsAsFrom
		 * @return void
		*/ 
		public function DeleteAllReceiptsAsFrom() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsFrom on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByFromContactId($this->intContactId) as $objReceipt) {
					$objReceipt->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
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
			if ((is_null($this->intContactId)))
				return array();

			try {
				return Receipt::LoadArrayByToContactId($this->intContactId, $objOptionalClauses);
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
			if ((is_null($this->intContactId)))
				return 0;

			return Receipt::CountByToContactId($this->intContactId);
		}

		/**
		 * Associates a ReceiptAsTo
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function AssociateReceiptAsTo(Receipt $objReceipt) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsTo on this unsaved Contact.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsTo on this Contact with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->ToContactId = $this->intContactId;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ReceiptAsTo
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function UnassociateReceiptAsTo(Receipt $objReceipt) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Contact.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this Contact with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`to_contact_id` = null
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->ToContactId = null;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ReceiptsAsTo
		 * @return void
		*/ 
		public function UnassociateAllReceiptsAsTo() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByToContactId($this->intContactId) as $objReceipt) {
					$objReceipt->ToContactId = null;
					$objReceipt->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`to_contact_id` = null
				WHERE
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}

		/**
		 * Deletes an associated ReceiptAsTo
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function DeleteAssociatedReceiptAsTo(Receipt $objReceipt) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Contact.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this Contact with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
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
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsTo on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByToContactId($this->intContactId) as $objReceipt) {
					$objReceipt->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
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
			if ((is_null($this->intContactId)))
				return array();

			try {
				return Shipment::LoadArrayByFromContactId($this->intContactId, $objOptionalClauses);
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
			if ((is_null($this->intContactId)))
				return 0;

			return Shipment::CountByFromContactId($this->intContactId);
		}

		/**
		 * Associates a ShipmentAsFrom
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function AssociateShipmentAsFrom(Shipment $objShipment) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsFrom on this unsaved Contact.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsFrom on this Contact with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShipment->FromContactId = $this->intContactId;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ShipmentAsFrom
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function UnassociateShipmentAsFrom(Shipment $objShipment) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Contact.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this Contact with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`from_contact_id` = null
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->FromContactId = null;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ShipmentsAsFrom
		 * @return void
		*/ 
		public function UnassociateAllShipmentsAsFrom() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByFromContactId($this->intContactId) as $objShipment) {
					$objShipment->FromContactId = null;
					$objShipment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`from_contact_id` = null
				WHERE
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}

		/**
		 * Deletes an associated ShipmentAsFrom
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function DeleteAssociatedShipmentAsFrom(Shipment $objShipment) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Contact.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this Contact with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
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
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsFrom on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByFromContactId($this->intContactId) as $objShipment) {
					$objShipment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`from_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
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
			if ((is_null($this->intContactId)))
				return array();

			try {
				return Shipment::LoadArrayByToContactId($this->intContactId, $objOptionalClauses);
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
			if ((is_null($this->intContactId)))
				return 0;

			return Shipment::CountByToContactId($this->intContactId);
		}

		/**
		 * Associates a ShipmentAsTo
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function AssociateShipmentAsTo(Shipment $objShipment) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsTo on this unsaved Contact.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsTo on this Contact with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShipment->ToContactId = $this->intContactId;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ShipmentAsTo
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function UnassociateShipmentAsTo(Shipment $objShipment) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Contact.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this Contact with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`to_contact_id` = null
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->ToContactId = null;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ShipmentsAsTo
		 * @return void
		*/ 
		public function UnassociateAllShipmentsAsTo() {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByToContactId($this->intContactId) as $objShipment) {
					$objShipment->ToContactId = null;
					$objShipment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`to_contact_id` = null
				WHERE
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}

		/**
		 * Deletes an associated ShipmentAsTo
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function DeleteAssociatedShipmentAsTo(Shipment $objShipment) {
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Contact.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this Contact with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
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
			if ((is_null($this->intContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsTo on this unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = Contact::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByToContactId($this->intContactId) as $objShipment) {
					$objShipment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`to_contact_id` = ' . $objDatabase->SqlVariable($this->intContactId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Contact"><sequence>';
			$strToReturn .= '<element name="ContactId" type="xsd:int"/>';
			$strToReturn .= '<element name="Company" type="xsd1:Company"/>';
			$strToReturn .= '<element name="Address" type="xsd1:Address"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Title" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="PhoneOffice" type="xsd:string"/>';
			$strToReturn .= '<element name="PhoneHome" type="xsd:string"/>';
			$strToReturn .= '<element name="PhoneMobile" type="xsd:string"/>';
			$strToReturn .= '<element name="Fax" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Contact', $strComplexTypeArray)) {
				$strComplexTypeArray['Contact'] = Contact::GetSoapComplexTypeXml();
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Contact::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Contact();
			if (property_exists($objSoapObject, 'ContactId'))
				$objToReturn->intContactId = $objSoapObject->ContactId;
			if ((property_exists($objSoapObject, 'Company')) &&
				($objSoapObject->Company))
				$objToReturn->Company = Company::GetObjectFromSoapObject($objSoapObject->Company);
			if ((property_exists($objSoapObject, 'Address')) &&
				($objSoapObject->Address))
				$objToReturn->Address = Address::GetObjectFromSoapObject($objSoapObject->Address);
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Title'))
				$objToReturn->strTitle = $objSoapObject->Title;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'PhoneOffice'))
				$objToReturn->strPhoneOffice = $objSoapObject->PhoneOffice;
			if (property_exists($objSoapObject, 'PhoneHome'))
				$objToReturn->strPhoneHome = $objSoapObject->PhoneHome;
			if (property_exists($objSoapObject, 'PhoneMobile'))
				$objToReturn->strPhoneMobile = $objSoapObject->PhoneMobile;
			if (property_exists($objSoapObject, 'Fax'))
				$objToReturn->strFax = $objSoapObject->Fax;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
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
				array_push($objArrayToReturn, Contact::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCompany)
				$objObject->objCompany = Company::GetSoapObjectFromObject($objObject->objCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCompanyId = null;
			if ($objObject->objAddress)
				$objObject->objAddress = Address::GetSoapObjectFromObject($objObject->objAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAddressId = null;
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
				$objQueryExpansion = new QQueryExpansion('Contact', 'contact', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `contact` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`contact_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`contact_id` AS `%s__%s__contact_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`company_id` AS `%s__%s__company_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`address_id` AS `%s__%s__address_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`first_name` AS `%s__%s__first_name`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`last_name` AS `%s__%s__last_name`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`title` AS `%s__%s__title`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`email` AS `%s__%s__email`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`phone_office` AS `%s__%s__phone_office`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`phone_home` AS `%s__%s__phone_home`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`phone_mobile` AS `%s__%s__phone_mobile`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`fax` AS `%s__%s__fax`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`description` AS `%s__%s__description`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
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
						case 'address_id':
							try {
								Address::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandAddress = 'address_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $ContactId
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNode $AddressId
	 * @property-read QQNodeAddress $Address
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Title
	 * @property-read QQNode $Email
	 * @property-read QQNode $PhoneOffice
	 * @property-read QQNode $PhoneHome
	 * @property-read QQNode $PhoneMobile
	 * @property-read QQNode $Fax
	 * @property-read QQNode $Description
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsTo
	 * @property-read QQReverseReferenceNodeContactCustomFieldHelper $ContactCustomFieldHelper
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsFrom
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsTo
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsFrom
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsTo
	 */
	class QQNodeContact extends QQNode {
		protected $strTableName = 'contact';
		protected $strPrimaryKey = 'contact_id';
		protected $strClassName = 'Contact';
		public function __get($strName) {
			switch ($strName) {
				case 'ContactId':
					return new QQNode('contact_id', 'ContactId', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'Address':
					return new QQNodeAddress('address_id', 'Address', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'PhoneOffice':
					return new QQNode('phone_office', 'PhoneOffice', 'string', $this);
				case 'PhoneHome':
					return new QQNode('phone_home', 'PhoneHome', 'string', $this);
				case 'PhoneMobile':
					return new QQNode('phone_mobile', 'PhoneMobile', 'string', $this);
				case 'Fax':
					return new QQNode('fax', 'Fax', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
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
				case 'AssetTransactionCheckoutAsTo':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutasto', 'reverse_reference', 'to_contact_id');
				case 'ContactCustomFieldHelper':
					return new QQReverseReferenceNodeContactCustomFieldHelper($this, 'contactcustomfieldhelper', 'reverse_reference', 'contact_id', 'ContactCustomFieldHelper');
				case 'ReceiptAsFrom':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasfrom', 'reverse_reference', 'from_contact_id');
				case 'ReceiptAsTo':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasto', 'reverse_reference', 'to_contact_id');
				case 'ShipmentAsFrom':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasfrom', 'reverse_reference', 'from_contact_id');
				case 'ShipmentAsTo':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasto', 'reverse_reference', 'to_contact_id');

				case '_PrimaryKeyNode':
					return new QQNode('contact_id', 'ContactId', 'integer', $this);
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
	 * @property-read QQNode $ContactId
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNode $AddressId
	 * @property-read QQNodeAddress $Address
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Title
	 * @property-read QQNode $Email
	 * @property-read QQNode $PhoneOffice
	 * @property-read QQNode $PhoneHome
	 * @property-read QQNode $PhoneMobile
	 * @property-read QQNode $Fax
	 * @property-read QQNode $Description
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsTo
	 * @property-read QQReverseReferenceNodeContactCustomFieldHelper $ContactCustomFieldHelper
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsFrom
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsTo
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsFrom
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsTo
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeContact extends QQReverseReferenceNode {
		protected $strTableName = 'contact';
		protected $strPrimaryKey = 'contact_id';
		protected $strClassName = 'Contact';
		public function __get($strName) {
			switch ($strName) {
				case 'ContactId':
					return new QQNode('contact_id', 'ContactId', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'Address':
					return new QQNodeAddress('address_id', 'Address', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'PhoneOffice':
					return new QQNode('phone_office', 'PhoneOffice', 'string', $this);
				case 'PhoneHome':
					return new QQNode('phone_home', 'PhoneHome', 'string', $this);
				case 'PhoneMobile':
					return new QQNode('phone_mobile', 'PhoneMobile', 'string', $this);
				case 'Fax':
					return new QQNode('fax', 'Fax', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
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
				case 'AssetTransactionCheckoutAsTo':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutasto', 'reverse_reference', 'to_contact_id');
				case 'ContactCustomFieldHelper':
					return new QQReverseReferenceNodeContactCustomFieldHelper($this, 'contactcustomfieldhelper', 'reverse_reference', 'contact_id', 'ContactCustomFieldHelper');
				case 'ReceiptAsFrom':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasfrom', 'reverse_reference', 'from_contact_id');
				case 'ReceiptAsTo':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasto', 'reverse_reference', 'to_contact_id');
				case 'ShipmentAsFrom':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasfrom', 'reverse_reference', 'from_contact_id');
				case 'ShipmentAsTo':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasto', 'reverse_reference', 'to_contact_id');

				case '_PrimaryKeyNode':
					return new QQNode('contact_id', 'ContactId', 'integer', $this);
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