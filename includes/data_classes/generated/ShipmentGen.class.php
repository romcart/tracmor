<?php
	/**
	 * The abstract ShipmentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Shipment subclass which
	 * extends this ShipmentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Shipment class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ShipmentId the value for intShipmentId (Read-Only PK)
	 * @property string $ShipmentNumber the value for strShipmentNumber (Unique)
	 * @property integer $TransactionId the value for intTransactionId (Unique)
	 * @property integer $FromCompanyId the value for intFromCompanyId (Not Null)
	 * @property integer $FromContactId the value for intFromContactId (Not Null)
	 * @property integer $FromAddressId the value for intFromAddressId (Not Null)
	 * @property integer $ToCompanyId the value for intToCompanyId (Not Null)
	 * @property integer $ToContactId the value for intToContactId (Not Null)
	 * @property integer $ToAddressId the value for intToAddressId (Not Null)
	 * @property integer $CourierId the value for intCourierId 
	 * @property string $TrackingNumber the value for strTrackingNumber 
	 * @property QDateTime $ShipDate the value for dttShipDate (Not Null)
	 * @property boolean $ShippedFlag the value for blnShippedFlag 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property Transaction $Transaction the value for the Transaction object referenced by intTransactionId (Unique)
	 * @property Company $FromCompany the value for the Company object referenced by intFromCompanyId (Not Null)
	 * @property Contact $FromContact the value for the Contact object referenced by intFromContactId (Not Null)
	 * @property Address $FromAddress the value for the Address object referenced by intFromAddressId (Not Null)
	 * @property Company $ToCompany the value for the Company object referenced by intToCompanyId (Not Null)
	 * @property Contact $ToContact the value for the Contact object referenced by intToContactId (Not Null)
	 * @property Address $ToAddress the value for the Address object referenced by intToAddressId (Not Null)
	 * @property Courier $Courier the value for the Courier object referenced by intCourierId 
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property ShipmentCustomFieldHelper $ShipmentCustomFieldHelper the value for the ShipmentCustomFieldHelper object that uniquely references this Shipment
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ShipmentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column shipment.shipment_id
		 * @var integer intShipmentId
		 */
		protected $intShipmentId;
		const ShipmentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.shipment_number
		 * @var string strShipmentNumber
		 */
		protected $strShipmentNumber;
		const ShipmentNumberMaxLength = 50;
		const ShipmentNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.transaction_id
		 * @var integer intTransactionId
		 */
		protected $intTransactionId;
		const TransactionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.from_company_id
		 * @var integer intFromCompanyId
		 */
		protected $intFromCompanyId;
		const FromCompanyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.from_contact_id
		 * @var integer intFromContactId
		 */
		protected $intFromContactId;
		const FromContactIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.from_address_id
		 * @var integer intFromAddressId
		 */
		protected $intFromAddressId;
		const FromAddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.to_company_id
		 * @var integer intToCompanyId
		 */
		protected $intToCompanyId;
		const ToCompanyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.to_contact_id
		 * @var integer intToContactId
		 */
		protected $intToContactId;
		const ToContactIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.to_address_id
		 * @var integer intToAddressId
		 */
		protected $intToAddressId;
		const ToAddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.courier_id
		 * @var integer intCourierId
		 */
		protected $intCourierId;
		const CourierIdDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.tracking_number
		 * @var string strTrackingNumber
		 */
		protected $strTrackingNumber;
		const TrackingNumberMaxLength = 50;
		const TrackingNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.ship_date
		 * @var QDateTime dttShipDate
		 */
		protected $dttShipDate;
		const ShipDateDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.shipped_flag
		 * @var boolean blnShippedFlag
		 */
		protected $blnShippedFlag;
		const ShippedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column shipment.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


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
		 * in the database column shipment.transaction_id.
		 *
		 * NOTE: Always use the Transaction property getter to correctly retrieve this Transaction object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Transaction objTransaction
		 */
		protected $objTransaction;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.from_company_id.
		 *
		 * NOTE: Always use the FromCompany property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objFromCompany
		 */
		protected $objFromCompany;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.from_contact_id.
		 *
		 * NOTE: Always use the FromContact property getter to correctly retrieve this Contact object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Contact objFromContact
		 */
		protected $objFromContact;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.from_address_id.
		 *
		 * NOTE: Always use the FromAddress property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objFromAddress
		 */
		protected $objFromAddress;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.to_company_id.
		 *
		 * NOTE: Always use the ToCompany property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objToCompany
		 */
		protected $objToCompany;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.to_contact_id.
		 *
		 * NOTE: Always use the ToContact property getter to correctly retrieve this Contact object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Contact objToContact
		 */
		protected $objToContact;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.to_address_id.
		 *
		 * NOTE: Always use the ToAddress property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objToAddress
		 */
		protected $objToAddress;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.courier_id.
		 *
		 * NOTE: Always use the Courier property getter to correctly retrieve this Courier object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Courier objCourier
		 */
		protected $objCourier;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column shipment.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column shipment_custom_field_helper.shipment_id.
		 *
		 * NOTE: Always use the ShipmentCustomFieldHelper property getter to correctly retrieve this ShipmentCustomFieldHelper object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ShipmentCustomFieldHelper objShipmentCustomFieldHelper
		 */
		protected $objShipmentCustomFieldHelper;
		
		/**
		 * Used internally to manage whether the adjoined ShipmentCustomFieldHelper object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyShipmentCustomFieldHelper;





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
		 * Load a Shipment from PK Info
		 * @param integer $intShipmentId
		 * @return Shipment
		 */
		public static function Load($intShipmentId) {
			// Use QuerySingle to Perform the Query
			return Shipment::QuerySingle(
				QQ::Equal(QQN::Shipment()->ShipmentId, $intShipmentId)
			);
		}

		/**
		 * Load all Shipments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadAll query
			try {
				return Shipment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Shipments
		 * @return int
		 */
		public static function CountAll() {
			// Call Shipment::QueryCount to perform the CountAll query
			return Shipment::QueryCount(QQ::All());
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
			$objDatabase = Shipment::GetDatabase();

			// Create/Build out the QueryBuilder object with Shipment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'shipment');
			Shipment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('shipment');

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
		 * Static Qcodo Query method to query for a single Shipment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Shipment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Shipment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Shipment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Shipment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Shipment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Shipment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Shipment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Shipment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Shipment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Shipment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Shipment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Shipment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Shipment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'shipment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Shipment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Shipment::GetSelectFields($objQueryBuilder);
				Shipment::GetFromFields($objQueryBuilder);

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
			return Shipment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Shipment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'shipment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'shipment_id', $strAliasPrefix . 'shipment_id');
			$objBuilder->AddSelectItem($strTableName, 'shipment_number', $strAliasPrefix . 'shipment_number');
			$objBuilder->AddSelectItem($strTableName, 'transaction_id', $strAliasPrefix . 'transaction_id');
			$objBuilder->AddSelectItem($strTableName, 'from_company_id', $strAliasPrefix . 'from_company_id');
			$objBuilder->AddSelectItem($strTableName, 'from_contact_id', $strAliasPrefix . 'from_contact_id');
			$objBuilder->AddSelectItem($strTableName, 'from_address_id', $strAliasPrefix . 'from_address_id');
			$objBuilder->AddSelectItem($strTableName, 'to_company_id', $strAliasPrefix . 'to_company_id');
			$objBuilder->AddSelectItem($strTableName, 'to_contact_id', $strAliasPrefix . 'to_contact_id');
			$objBuilder->AddSelectItem($strTableName, 'to_address_id', $strAliasPrefix . 'to_address_id');
			$objBuilder->AddSelectItem($strTableName, 'courier_id', $strAliasPrefix . 'courier_id');
			$objBuilder->AddSelectItem($strTableName, 'tracking_number', $strAliasPrefix . 'tracking_number');
			$objBuilder->AddSelectItem($strTableName, 'ship_date', $strAliasPrefix . 'ship_date');
			$objBuilder->AddSelectItem($strTableName, 'shipped_flag', $strAliasPrefix . 'shipped_flag');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Shipment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Shipment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Shipment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Shipment object
			$objToReturn = new Shipment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'shipment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'shipment_id'] : $strAliasPrefix . 'shipment_id';
			$objToReturn->intShipmentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'shipment_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'shipment_number'] : $strAliasPrefix . 'shipment_number';
			$objToReturn->strShipmentNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_id'] : $strAliasPrefix . 'transaction_id';
			$objToReturn->intTransactionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'from_company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'from_company_id'] : $strAliasPrefix . 'from_company_id';
			$objToReturn->intFromCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'from_contact_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'from_contact_id'] : $strAliasPrefix . 'from_contact_id';
			$objToReturn->intFromContactId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'from_address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'from_address_id'] : $strAliasPrefix . 'from_address_id';
			$objToReturn->intFromAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_company_id'] : $strAliasPrefix . 'to_company_id';
			$objToReturn->intToCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_contact_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_contact_id'] : $strAliasPrefix . 'to_contact_id';
			$objToReturn->intToContactId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_address_id'] : $strAliasPrefix . 'to_address_id';
			$objToReturn->intToAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'courier_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'courier_id'] : $strAliasPrefix . 'courier_id';
			$objToReturn->intCourierId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'tracking_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tracking_number'] : $strAliasPrefix . 'tracking_number';
			$objToReturn->strTrackingNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'ship_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ship_date'] : $strAliasPrefix . 'ship_date';
			$objToReturn->dttShipDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'shipped_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'shipped_flag'] : $strAliasPrefix . 'shipped_flag';
			$objToReturn->blnShippedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
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
				$strAliasPrefix = 'shipment__';

			// Check for Transaction Early Binding
			$strAlias = $strAliasPrefix . 'transaction_id__transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTransaction = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FromCompany Early Binding
			$strAlias = $strAliasPrefix . 'from_company_id__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFromCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'from_company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FromContact Early Binding
			$strAlias = $strAliasPrefix . 'from_contact_id__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFromContact = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'from_contact_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FromAddress Early Binding
			$strAlias = $strAliasPrefix . 'from_address_id__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFromAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'from_address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ToCompany Early Binding
			$strAlias = $strAliasPrefix . 'to_company_id__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objToCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'to_company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ToContact Early Binding
			$strAlias = $strAliasPrefix . 'to_contact_id__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objToContact = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'to_contact_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ToAddress Early Binding
			$strAlias = $strAliasPrefix . 'to_address_id__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objToAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'to_address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Courier Early Binding
			$strAlias = $strAliasPrefix . 'courier_id__courier_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCourier = Courier::InstantiateDbRow($objDbRow, $strAliasPrefix . 'courier_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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


			// Check for ShipmentCustomFieldHelper Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'shipmentcustomfieldhelper__shipment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objShipmentCustomFieldHelper = ShipmentCustomFieldHelper::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentcustomfieldhelper__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objShipmentCustomFieldHelper = false;
			}



			return $objToReturn;
		}

		/**
		 * Instantiate an array of Shipments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Shipment[]
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
					$objItem = Shipment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Shipment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Shipment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Shipment next row resulting from the query
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
			return Shipment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Shipment object,
		 * by ShipmentId Index(es)
		 * @param integer $intShipmentId
		 * @return Shipment
		*/
		public static function LoadByShipmentId($intShipmentId, $objOptionalClauses = null) {
			return Shipment::QuerySingle(
				QQ::Equal(QQN::Shipment()->ShipmentId, $intShipmentId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single Shipment object,
		 * by ShipmentNumber Index(es)
		 * @param string $strShipmentNumber
		 * @return Shipment
		*/
		public static function LoadByShipmentNumber($strShipmentNumber, $objOptionalClauses = null) {
			return Shipment::QuerySingle(
				QQ::Equal(QQN::Shipment()->ShipmentNumber, $strShipmentNumber)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single Shipment object,
		 * by TransactionId Index(es)
		 * @param integer $intTransactionId
		 * @return Shipment
		*/
		public static function LoadByTransactionId($intTransactionId, $objOptionalClauses = null) {
			return Shipment::QuerySingle(
				QQ::Equal(QQN::Shipment()->TransactionId, $intTransactionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by FromAddressId Index(es)
		 * @param integer $intFromAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByFromAddressId($intFromAddressId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByFromAddressId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->FromAddressId, $intFromAddressId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by FromAddressId Index(es)
		 * @param integer $intFromAddressId
		 * @return int
		*/
		public static function CountByFromAddressId($intFromAddressId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByFromAddressId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->FromAddressId, $intFromAddressId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by ToAddressId Index(es)
		 * @param integer $intToAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByToAddressId($intToAddressId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByToAddressId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->ToAddressId, $intToAddressId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by ToAddressId Index(es)
		 * @param integer $intToAddressId
		 * @return int
		*/
		public static function CountByToAddressId($intToAddressId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByToAddressId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->ToAddressId, $intToAddressId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by ToCompanyId Index(es)
		 * @param integer $intToCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByToCompanyId($intToCompanyId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByToCompanyId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->ToCompanyId, $intToCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by ToCompanyId Index(es)
		 * @param integer $intToCompanyId
		 * @return int
		*/
		public static function CountByToCompanyId($intToCompanyId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByToCompanyId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->ToCompanyId, $intToCompanyId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByCourierId($intCourierId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByCourierId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->CourierId, $intCourierId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @return int
		*/
		public static function CountByCourierId($intCourierId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByCourierId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->CourierId, $intCourierId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByCreatedBy query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByModifiedBy query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by FromContactId Index(es)
		 * @param integer $intFromContactId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByFromContactId($intFromContactId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByFromContactId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->FromContactId, $intFromContactId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by FromContactId Index(es)
		 * @param integer $intFromContactId
		 * @return int
		*/
		public static function CountByFromContactId($intFromContactId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByFromContactId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->FromContactId, $intFromContactId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by ToContactId Index(es)
		 * @param integer $intToContactId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByToContactId($intToContactId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByToContactId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->ToContactId, $intToContactId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by ToContactId Index(es)
		 * @param integer $intToContactId
		 * @return int
		*/
		public static function CountByToContactId($intToContactId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByToContactId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->ToContactId, $intToContactId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Shipment objects,
		 * by FromCompanyId Index(es)
		 * @param integer $intFromCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/
		public static function LoadArrayByFromCompanyId($intFromCompanyId, $objOptionalClauses = null) {
			// Call Shipment::QueryArray to perform the LoadArrayByFromCompanyId query
			try {
				return Shipment::QueryArray(
					QQ::Equal(QQN::Shipment()->FromCompanyId, $intFromCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Shipments
		 * by FromCompanyId Index(es)
		 * @param integer $intFromCompanyId
		 * @return int
		*/
		public static function CountByFromCompanyId($intFromCompanyId, $objOptionalClauses = null) {
			// Call Shipment::QueryCount to perform the CountByFromCompanyId query
			return Shipment::QueryCount(
				QQ::Equal(QQN::Shipment()->FromCompanyId, $intFromCompanyId)
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
		 * Save this Shipment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Shipment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `shipment` (
							`shipment_number`,
							`transaction_id`,
							`from_company_id`,
							`from_contact_id`,
							`from_address_id`,
							`to_company_id`,
							`to_contact_id`,
							`to_address_id`,
							`courier_id`,
							`tracking_number`,
							`ship_date`,
							`shipped_flag`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strShipmentNumber) . ',
							' . $objDatabase->SqlVariable($this->intTransactionId) . ',
							' . $objDatabase->SqlVariable($this->intFromCompanyId) . ',
							' . $objDatabase->SqlVariable($this->intFromContactId) . ',
							' . $objDatabase->SqlVariable($this->intFromAddressId) . ',
							' . $objDatabase->SqlVariable($this->intToCompanyId) . ',
							' . $objDatabase->SqlVariable($this->intToContactId) . ',
							' . $objDatabase->SqlVariable($this->intToAddressId) . ',
							' . $objDatabase->SqlVariable($this->intCourierId) . ',
							' . $objDatabase->SqlVariable($this->strTrackingNumber) . ',
							' . $objDatabase->SqlVariable($this->dttShipDate) . ',
							' . $objDatabase->SqlVariable($this->blnShippedFlag) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intShipmentId = $objDatabase->InsertId('shipment', 'shipment_id');

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
								`shipment`
							WHERE
								`shipment_id` = ' . $objDatabase->SqlVariable($this->intShipmentId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('Shipment');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`shipment`
						SET
							`shipment_number` = ' . $objDatabase->SqlVariable($this->strShipmentNumber) . ',
							`transaction_id` = ' . $objDatabase->SqlVariable($this->intTransactionId) . ',
							`from_company_id` = ' . $objDatabase->SqlVariable($this->intFromCompanyId) . ',
							`from_contact_id` = ' . $objDatabase->SqlVariable($this->intFromContactId) . ',
							`from_address_id` = ' . $objDatabase->SqlVariable($this->intFromAddressId) . ',
							`to_company_id` = ' . $objDatabase->SqlVariable($this->intToCompanyId) . ',
							`to_contact_id` = ' . $objDatabase->SqlVariable($this->intToContactId) . ',
							`to_address_id` = ' . $objDatabase->SqlVariable($this->intToAddressId) . ',
							`courier_id` = ' . $objDatabase->SqlVariable($this->intCourierId) . ',
							`tracking_number` = ' . $objDatabase->SqlVariable($this->strTrackingNumber) . ',
							`ship_date` = ' . $objDatabase->SqlVariable($this->dttShipDate) . ',
							`shipped_flag` = ' . $objDatabase->SqlVariable($this->blnShippedFlag) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`shipment_id` = ' . $objDatabase->SqlVariable($this->intShipmentId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined ShipmentCustomFieldHelper object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyShipmentCustomFieldHelper) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = ShipmentCustomFieldHelper::LoadByShipmentId($this->intShipmentId)) {
						$objAssociated->ShipmentId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objShipmentCustomFieldHelper) {
						$this->objShipmentCustomFieldHelper->ShipmentId = $this->intShipmentId;
						$this->objShipmentCustomFieldHelper->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyShipmentCustomFieldHelper = false;
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
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($this->intShipmentId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Shipment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intShipmentId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Shipment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Shipment::GetDatabase();

			
			
			// Update the adjoined ShipmentCustomFieldHelper object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = ShipmentCustomFieldHelper::LoadByShipmentId($this->intShipmentId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($this->intShipmentId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Shipments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Shipment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`');
		}

		/**
		 * Truncate shipment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Shipment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `shipment`');
		}

		/**
		 * Reload this Shipment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Shipment object.');

			// Reload the Object
			$objReloaded = Shipment::Load($this->intShipmentId);

			// Update $this's local variables to match
			$this->strShipmentNumber = $objReloaded->strShipmentNumber;
			$this->TransactionId = $objReloaded->TransactionId;
			$this->FromCompanyId = $objReloaded->FromCompanyId;
			$this->FromContactId = $objReloaded->FromContactId;
			$this->FromAddressId = $objReloaded->FromAddressId;
			$this->ToCompanyId = $objReloaded->ToCompanyId;
			$this->ToContactId = $objReloaded->ToContactId;
			$this->ToAddressId = $objReloaded->ToAddressId;
			$this->CourierId = $objReloaded->CourierId;
			$this->strTrackingNumber = $objReloaded->strTrackingNumber;
			$this->dttShipDate = $objReloaded->dttShipDate;
			$this->blnShippedFlag = $objReloaded->blnShippedFlag;
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
			$objDatabase = Shipment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `shipment` (
					`shipment_id`,
					`shipment_number`,
					`transaction_id`,
					`from_company_id`,
					`from_contact_id`,
					`from_address_id`,
					`to_company_id`,
					`to_contact_id`,
					`to_address_id`,
					`courier_id`,
					`tracking_number`,
					`ship_date`,
					`shipped_flag`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intShipmentId) . ',
					' . $objDatabase->SqlVariable($this->strShipmentNumber) . ',
					' . $objDatabase->SqlVariable($this->intTransactionId) . ',
					' . $objDatabase->SqlVariable($this->intFromCompanyId) . ',
					' . $objDatabase->SqlVariable($this->intFromContactId) . ',
					' . $objDatabase->SqlVariable($this->intFromAddressId) . ',
					' . $objDatabase->SqlVariable($this->intToCompanyId) . ',
					' . $objDatabase->SqlVariable($this->intToContactId) . ',
					' . $objDatabase->SqlVariable($this->intToAddressId) . ',
					' . $objDatabase->SqlVariable($this->intCourierId) . ',
					' . $objDatabase->SqlVariable($this->strTrackingNumber) . ',
					' . $objDatabase->SqlVariable($this->dttShipDate) . ',
					' . $objDatabase->SqlVariable($this->blnShippedFlag) . ',
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
		 * @param integer intShipmentId
		 * @return Shipment[]
		 */
		public static function GetJournalForId($intShipmentId) {
			$objDatabase = Shipment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM shipment WHERE shipment_id = ' .
				$objDatabase->SqlVariable($intShipmentId) . ' ORDER BY __sys_date');

			return Shipment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Shipment[]
		 */
		public function GetJournal() {
			return Shipment::GetJournalForId($this->intShipmentId);
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
				case 'ShipmentId':
					// Gets the value for intShipmentId (Read-Only PK)
					// @return integer
					return $this->intShipmentId;

				case 'ShipmentNumber':
					// Gets the value for strShipmentNumber (Unique)
					// @return string
					return $this->strShipmentNumber;

				case 'TransactionId':
					// Gets the value for intTransactionId (Unique)
					// @return integer
					return $this->intTransactionId;

				case 'FromCompanyId':
					// Gets the value for intFromCompanyId (Not Null)
					// @return integer
					return $this->intFromCompanyId;

				case 'FromContactId':
					// Gets the value for intFromContactId (Not Null)
					// @return integer
					return $this->intFromContactId;

				case 'FromAddressId':
					// Gets the value for intFromAddressId (Not Null)
					// @return integer
					return $this->intFromAddressId;

				case 'ToCompanyId':
					// Gets the value for intToCompanyId (Not Null)
					// @return integer
					return $this->intToCompanyId;

				case 'ToContactId':
					// Gets the value for intToContactId (Not Null)
					// @return integer
					return $this->intToContactId;

				case 'ToAddressId':
					// Gets the value for intToAddressId (Not Null)
					// @return integer
					return $this->intToAddressId;

				case 'CourierId':
					// Gets the value for intCourierId 
					// @return integer
					return $this->intCourierId;

				case 'TrackingNumber':
					// Gets the value for strTrackingNumber 
					// @return string
					return $this->strTrackingNumber;

				case 'ShipDate':
					// Gets the value for dttShipDate (Not Null)
					// @return QDateTime
					return $this->dttShipDate;

				case 'ShippedFlag':
					// Gets the value for blnShippedFlag 
					// @return boolean
					return $this->blnShippedFlag;

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
				case 'Transaction':
					// Gets the value for the Transaction object referenced by intTransactionId (Unique)
					// @return Transaction
					try {
						if ((!$this->objTransaction) && (!is_null($this->intTransactionId)))
							$this->objTransaction = Transaction::Load($this->intTransactionId);
						return $this->objTransaction;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromCompany':
					// Gets the value for the Company object referenced by intFromCompanyId (Not Null)
					// @return Company
					try {
						if ((!$this->objFromCompany) && (!is_null($this->intFromCompanyId)))
							$this->objFromCompany = Company::Load($this->intFromCompanyId);
						return $this->objFromCompany;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromContact':
					// Gets the value for the Contact object referenced by intFromContactId (Not Null)
					// @return Contact
					try {
						if ((!$this->objFromContact) && (!is_null($this->intFromContactId)))
							$this->objFromContact = Contact::Load($this->intFromContactId);
						return $this->objFromContact;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromAddress':
					// Gets the value for the Address object referenced by intFromAddressId (Not Null)
					// @return Address
					try {
						if ((!$this->objFromAddress) && (!is_null($this->intFromAddressId)))
							$this->objFromAddress = Address::Load($this->intFromAddressId);
						return $this->objFromAddress;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToCompany':
					// Gets the value for the Company object referenced by intToCompanyId (Not Null)
					// @return Company
					try {
						if ((!$this->objToCompany) && (!is_null($this->intToCompanyId)))
							$this->objToCompany = Company::Load($this->intToCompanyId);
						return $this->objToCompany;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToContact':
					// Gets the value for the Contact object referenced by intToContactId (Not Null)
					// @return Contact
					try {
						if ((!$this->objToContact) && (!is_null($this->intToContactId)))
							$this->objToContact = Contact::Load($this->intToContactId);
						return $this->objToContact;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToAddress':
					// Gets the value for the Address object referenced by intToAddressId (Not Null)
					// @return Address
					try {
						if ((!$this->objToAddress) && (!is_null($this->intToAddressId)))
							$this->objToAddress = Address::Load($this->intToAddressId);
						return $this->objToAddress;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Courier':
					// Gets the value for the Courier object referenced by intCourierId 
					// @return Courier
					try {
						if ((!$this->objCourier) && (!is_null($this->intCourierId)))
							$this->objCourier = Courier::Load($this->intCourierId);
						return $this->objCourier;
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

		
		
				case 'ShipmentCustomFieldHelper':
					// Gets the value for the ShipmentCustomFieldHelper object that uniquely references this Shipment
					// by objShipmentCustomFieldHelper (Unique)
					// @return ShipmentCustomFieldHelper
					try {
						if ($this->objShipmentCustomFieldHelper === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objShipmentCustomFieldHelper)
							$this->objShipmentCustomFieldHelper = ShipmentCustomFieldHelper::LoadByShipmentId($this->intShipmentId);
						return $this->objShipmentCustomFieldHelper;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
				case 'ShipmentNumber':
					// Sets the value for strShipmentNumber (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strShipmentNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionId':
					// Sets the value for intTransactionId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objTransaction = null;
						return ($this->intTransactionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromCompanyId':
					// Sets the value for intFromCompanyId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objFromCompany = null;
						return ($this->intFromCompanyId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromContactId':
					// Sets the value for intFromContactId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objFromContact = null;
						return ($this->intFromContactId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromAddressId':
					// Sets the value for intFromAddressId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objFromAddress = null;
						return ($this->intFromAddressId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToCompanyId':
					// Sets the value for intToCompanyId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objToCompany = null;
						return ($this->intToCompanyId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToContactId':
					// Sets the value for intToContactId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objToContact = null;
						return ($this->intToContactId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToAddressId':
					// Sets the value for intToAddressId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objToAddress = null;
						return ($this->intToAddressId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CourierId':
					// Sets the value for intCourierId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCourier = null;
						return ($this->intCourierId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TrackingNumber':
					// Sets the value for strTrackingNumber 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTrackingNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ShipDate':
					// Sets the value for dttShipDate (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttShipDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ShippedFlag':
					// Sets the value for blnShippedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnShippedFlag = QType::Cast($mixValue, QType::Boolean));
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
				case 'Transaction':
					// Sets the value for the Transaction object referenced by intTransactionId (Unique)
					// @param Transaction $mixValue
					// @return Transaction
					if (is_null($mixValue)) {
						$this->intTransactionId = null;
						$this->objTransaction = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Transaction object
						try {
							$mixValue = QType::Cast($mixValue, 'Transaction');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Transaction object
						if (is_null($mixValue->TransactionId))
							throw new QCallerException('Unable to set an unsaved Transaction for this Shipment');

						// Update Local Member Variables
						$this->objTransaction = $mixValue;
						$this->intTransactionId = $mixValue->TransactionId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FromCompany':
					// Sets the value for the Company object referenced by intFromCompanyId (Not Null)
					// @param Company $mixValue
					// @return Company
					if (is_null($mixValue)) {
						$this->intFromCompanyId = null;
						$this->objFromCompany = null;
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
							throw new QCallerException('Unable to set an unsaved FromCompany for this Shipment');

						// Update Local Member Variables
						$this->objFromCompany = $mixValue;
						$this->intFromCompanyId = $mixValue->CompanyId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FromContact':
					// Sets the value for the Contact object referenced by intFromContactId (Not Null)
					// @param Contact $mixValue
					// @return Contact
					if (is_null($mixValue)) {
						$this->intFromContactId = null;
						$this->objFromContact = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Contact object
						try {
							$mixValue = QType::Cast($mixValue, 'Contact');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Contact object
						if (is_null($mixValue->ContactId))
							throw new QCallerException('Unable to set an unsaved FromContact for this Shipment');

						// Update Local Member Variables
						$this->objFromContact = $mixValue;
						$this->intFromContactId = $mixValue->ContactId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FromAddress':
					// Sets the value for the Address object referenced by intFromAddressId (Not Null)
					// @param Address $mixValue
					// @return Address
					if (is_null($mixValue)) {
						$this->intFromAddressId = null;
						$this->objFromAddress = null;
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
							throw new QCallerException('Unable to set an unsaved FromAddress for this Shipment');

						// Update Local Member Variables
						$this->objFromAddress = $mixValue;
						$this->intFromAddressId = $mixValue->AddressId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ToCompany':
					// Sets the value for the Company object referenced by intToCompanyId (Not Null)
					// @param Company $mixValue
					// @return Company
					if (is_null($mixValue)) {
						$this->intToCompanyId = null;
						$this->objToCompany = null;
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
							throw new QCallerException('Unable to set an unsaved ToCompany for this Shipment');

						// Update Local Member Variables
						$this->objToCompany = $mixValue;
						$this->intToCompanyId = $mixValue->CompanyId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ToContact':
					// Sets the value for the Contact object referenced by intToContactId (Not Null)
					// @param Contact $mixValue
					// @return Contact
					if (is_null($mixValue)) {
						$this->intToContactId = null;
						$this->objToContact = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Contact object
						try {
							$mixValue = QType::Cast($mixValue, 'Contact');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Contact object
						if (is_null($mixValue->ContactId))
							throw new QCallerException('Unable to set an unsaved ToContact for this Shipment');

						// Update Local Member Variables
						$this->objToContact = $mixValue;
						$this->intToContactId = $mixValue->ContactId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ToAddress':
					// Sets the value for the Address object referenced by intToAddressId (Not Null)
					// @param Address $mixValue
					// @return Address
					if (is_null($mixValue)) {
						$this->intToAddressId = null;
						$this->objToAddress = null;
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
							throw new QCallerException('Unable to set an unsaved ToAddress for this Shipment');

						// Update Local Member Variables
						$this->objToAddress = $mixValue;
						$this->intToAddressId = $mixValue->AddressId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Courier':
					// Sets the value for the Courier object referenced by intCourierId 
					// @param Courier $mixValue
					// @return Courier
					if (is_null($mixValue)) {
						$this->intCourierId = null;
						$this->objCourier = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Courier object
						try {
							$mixValue = QType::Cast($mixValue, 'Courier');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Courier object
						if (is_null($mixValue->CourierId))
							throw new QCallerException('Unable to set an unsaved Courier for this Shipment');

						// Update Local Member Variables
						$this->objCourier = $mixValue;
						$this->intCourierId = $mixValue->CourierId;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Shipment');

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Shipment');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ShipmentCustomFieldHelper':
					// Sets the value for the ShipmentCustomFieldHelper object referenced by objShipmentCustomFieldHelper (Unique)
					// @param ShipmentCustomFieldHelper $mixValue
					// @return ShipmentCustomFieldHelper
					if (is_null($mixValue)) {
						$this->objShipmentCustomFieldHelper = null;

						// Make sure we update the adjoined ShipmentCustomFieldHelper object the next time we call Save()
						$this->blnDirtyShipmentCustomFieldHelper = true;

						return null;
					} else {
						// Make sure $mixValue actually is a ShipmentCustomFieldHelper object
						try {
							$mixValue = QType::Cast($mixValue, 'ShipmentCustomFieldHelper');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objShipmentCustomFieldHelper to a DIFFERENT $mixValue?
						if ((!$this->ShipmentCustomFieldHelper) || ($this->ShipmentCustomFieldHelper->ShipmentId != $mixValue->ShipmentId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined ShipmentCustomFieldHelper object the next time we call Save()
							$this->blnDirtyShipmentCustomFieldHelper = true;

							// Update Local Member Variable
							$this->objShipmentCustomFieldHelper = $mixValue;
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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Shipment"><sequence>';
			$strToReturn .= '<element name="ShipmentId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShipmentNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="Transaction" type="xsd1:Transaction"/>';
			$strToReturn .= '<element name="FromCompany" type="xsd1:Company"/>';
			$strToReturn .= '<element name="FromContact" type="xsd1:Contact"/>';
			$strToReturn .= '<element name="FromAddress" type="xsd1:Address"/>';
			$strToReturn .= '<element name="ToCompany" type="xsd1:Company"/>';
			$strToReturn .= '<element name="ToContact" type="xsd1:Contact"/>';
			$strToReturn .= '<element name="ToAddress" type="xsd1:Address"/>';
			$strToReturn .= '<element name="Courier" type="xsd1:Courier"/>';
			$strToReturn .= '<element name="TrackingNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="ShipDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ShippedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Shipment', $strComplexTypeArray)) {
				$strComplexTypeArray['Shipment'] = Shipment::GetSoapComplexTypeXml();
				Transaction::AlterSoapComplexTypeArray($strComplexTypeArray);
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
				Contact::AlterSoapComplexTypeArray($strComplexTypeArray);
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
				Contact::AlterSoapComplexTypeArray($strComplexTypeArray);
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
				Courier::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Shipment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Shipment();
			if (property_exists($objSoapObject, 'ShipmentId'))
				$objToReturn->intShipmentId = $objSoapObject->ShipmentId;
			if (property_exists($objSoapObject, 'ShipmentNumber'))
				$objToReturn->strShipmentNumber = $objSoapObject->ShipmentNumber;
			if ((property_exists($objSoapObject, 'Transaction')) &&
				($objSoapObject->Transaction))
				$objToReturn->Transaction = Transaction::GetObjectFromSoapObject($objSoapObject->Transaction);
			if ((property_exists($objSoapObject, 'FromCompany')) &&
				($objSoapObject->FromCompany))
				$objToReturn->FromCompany = Company::GetObjectFromSoapObject($objSoapObject->FromCompany);
			if ((property_exists($objSoapObject, 'FromContact')) &&
				($objSoapObject->FromContact))
				$objToReturn->FromContact = Contact::GetObjectFromSoapObject($objSoapObject->FromContact);
			if ((property_exists($objSoapObject, 'FromAddress')) &&
				($objSoapObject->FromAddress))
				$objToReturn->FromAddress = Address::GetObjectFromSoapObject($objSoapObject->FromAddress);
			if ((property_exists($objSoapObject, 'ToCompany')) &&
				($objSoapObject->ToCompany))
				$objToReturn->ToCompany = Company::GetObjectFromSoapObject($objSoapObject->ToCompany);
			if ((property_exists($objSoapObject, 'ToContact')) &&
				($objSoapObject->ToContact))
				$objToReturn->ToContact = Contact::GetObjectFromSoapObject($objSoapObject->ToContact);
			if ((property_exists($objSoapObject, 'ToAddress')) &&
				($objSoapObject->ToAddress))
				$objToReturn->ToAddress = Address::GetObjectFromSoapObject($objSoapObject->ToAddress);
			if ((property_exists($objSoapObject, 'Courier')) &&
				($objSoapObject->Courier))
				$objToReturn->Courier = Courier::GetObjectFromSoapObject($objSoapObject->Courier);
			if (property_exists($objSoapObject, 'TrackingNumber'))
				$objToReturn->strTrackingNumber = $objSoapObject->TrackingNumber;
			if (property_exists($objSoapObject, 'ShipDate'))
				$objToReturn->dttShipDate = new QDateTime($objSoapObject->ShipDate);
			if (property_exists($objSoapObject, 'ShippedFlag'))
				$objToReturn->blnShippedFlag = $objSoapObject->ShippedFlag;
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
				array_push($objArrayToReturn, Shipment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objTransaction)
				$objObject->objTransaction = Transaction::GetSoapObjectFromObject($objObject->objTransaction, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransactionId = null;
			if ($objObject->objFromCompany)
				$objObject->objFromCompany = Company::GetSoapObjectFromObject($objObject->objFromCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFromCompanyId = null;
			if ($objObject->objFromContact)
				$objObject->objFromContact = Contact::GetSoapObjectFromObject($objObject->objFromContact, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFromContactId = null;
			if ($objObject->objFromAddress)
				$objObject->objFromAddress = Address::GetSoapObjectFromObject($objObject->objFromAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFromAddressId = null;
			if ($objObject->objToCompany)
				$objObject->objToCompany = Company::GetSoapObjectFromObject($objObject->objToCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intToCompanyId = null;
			if ($objObject->objToContact)
				$objObject->objToContact = Contact::GetSoapObjectFromObject($objObject->objToContact, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intToContactId = null;
			if ($objObject->objToAddress)
				$objObject->objToAddress = Address::GetSoapObjectFromObject($objObject->objToAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intToAddressId = null;
			if ($objObject->objCourier)
				$objObject->objCourier = Courier::GetSoapObjectFromObject($objObject->objCourier, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCourierId = null;
			if ($objObject->dttShipDate)
				$objObject->dttShipDate = $objObject->dttShipDate->__toString(QDateTime::FormatSoap);
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
				$objQueryExpansion = new QQueryExpansion('Shipment', 'shipment', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `shipment` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`shipment_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`shipment_id` AS `%s__%s__shipment_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`shipment_number` AS `%s__%s__shipment_number`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`transaction_id` AS `%s__%s__transaction_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`from_company_id` AS `%s__%s__from_company_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`from_contact_id` AS `%s__%s__from_contact_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`from_address_id` AS `%s__%s__from_address_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`to_company_id` AS `%s__%s__to_company_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`to_contact_id` AS `%s__%s__to_contact_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`to_address_id` AS `%s__%s__to_address_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`courier_id` AS `%s__%s__courier_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`tracking_number` AS `%s__%s__tracking_number`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`ship_date` AS `%s__%s__ship_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`shipped_flag` AS `%s__%s__shipped_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'transaction_id':
							try {
								Transaction::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'from_company_id':
							try {
								Company::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'from_contact_id':
							try {
								Contact::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'from_address_id':
							try {
								Address::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'to_company_id':
							try {
								Company::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'to_contact_id':
							try {
								Contact::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'to_address_id':
							try {
								Address::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'courier_id':
							try {
								Courier::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
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
		const ExpandTransaction = 'transaction_id';
		const ExpandFromCompany = 'from_company_id';
		const ExpandFromContact = 'from_contact_id';
		const ExpandFromAddress = 'from_address_id';
		const ExpandToCompany = 'to_company_id';
		const ExpandToContact = 'to_contact_id';
		const ExpandToAddress = 'to_address_id';
		const ExpandCourier = 'courier_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $ShipmentId
	 * @property-read QQNode $ShipmentNumber
	 * @property-read QQNode $TransactionId
	 * @property-read QQNodeTransaction $Transaction
	 * @property-read QQNode $FromCompanyId
	 * @property-read QQNodeCompany $FromCompany
	 * @property-read QQNode $FromContactId
	 * @property-read QQNodeContact $FromContact
	 * @property-read QQNode $FromAddressId
	 * @property-read QQNodeAddress $FromAddress
	 * @property-read QQNode $ToCompanyId
	 * @property-read QQNodeCompany $ToCompany
	 * @property-read QQNode $ToContactId
	 * @property-read QQNodeContact $ToContact
	 * @property-read QQNode $ToAddressId
	 * @property-read QQNodeAddress $ToAddress
	 * @property-read QQNode $CourierId
	 * @property-read QQNodeCourier $Courier
	 * @property-read QQNode $TrackingNumber
	 * @property-read QQNode $ShipDate
	 * @property-read QQNode $ShippedFlag
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeShipmentCustomFieldHelper $ShipmentCustomFieldHelper
	 */
	class QQNodeShipment extends QQNode {
		protected $strTableName = 'shipment';
		protected $strPrimaryKey = 'shipment_id';
		protected $strClassName = 'Shipment';
		public function __get($strName) {
			switch ($strName) {
				case 'ShipmentId':
					return new QQNode('shipment_id', 'ShipmentId', 'integer', $this);
				case 'ShipmentNumber':
					return new QQNode('shipment_number', 'ShipmentNumber', 'string', $this);
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'Transaction':
					return new QQNodeTransaction('transaction_id', 'Transaction', 'integer', $this);
				case 'FromCompanyId':
					return new QQNode('from_company_id', 'FromCompanyId', 'integer', $this);
				case 'FromCompany':
					return new QQNodeCompany('from_company_id', 'FromCompany', 'integer', $this);
				case 'FromContactId':
					return new QQNode('from_contact_id', 'FromContactId', 'integer', $this);
				case 'FromContact':
					return new QQNodeContact('from_contact_id', 'FromContact', 'integer', $this);
				case 'FromAddressId':
					return new QQNode('from_address_id', 'FromAddressId', 'integer', $this);
				case 'FromAddress':
					return new QQNodeAddress('from_address_id', 'FromAddress', 'integer', $this);
				case 'ToCompanyId':
					return new QQNode('to_company_id', 'ToCompanyId', 'integer', $this);
				case 'ToCompany':
					return new QQNodeCompany('to_company_id', 'ToCompany', 'integer', $this);
				case 'ToContactId':
					return new QQNode('to_contact_id', 'ToContactId', 'integer', $this);
				case 'ToContact':
					return new QQNodeContact('to_contact_id', 'ToContact', 'integer', $this);
				case 'ToAddressId':
					return new QQNode('to_address_id', 'ToAddressId', 'integer', $this);
				case 'ToAddress':
					return new QQNodeAddress('to_address_id', 'ToAddress', 'integer', $this);
				case 'CourierId':
					return new QQNode('courier_id', 'CourierId', 'integer', $this);
				case 'Courier':
					return new QQNodeCourier('courier_id', 'Courier', 'integer', $this);
				case 'TrackingNumber':
					return new QQNode('tracking_number', 'TrackingNumber', 'string', $this);
				case 'ShipDate':
					return new QQNode('ship_date', 'ShipDate', 'QDateTime', $this);
				case 'ShippedFlag':
					return new QQNode('shipped_flag', 'ShippedFlag', 'boolean', $this);
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
				case 'ShipmentCustomFieldHelper':
					return new QQReverseReferenceNodeShipmentCustomFieldHelper($this, 'shipmentcustomfieldhelper', 'reverse_reference', 'shipment_id', 'ShipmentCustomFieldHelper');

				case '_PrimaryKeyNode':
					return new QQNode('shipment_id', 'ShipmentId', 'integer', $this);
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
	 * @property-read QQNode $ShipmentId
	 * @property-read QQNode $ShipmentNumber
	 * @property-read QQNode $TransactionId
	 * @property-read QQNodeTransaction $Transaction
	 * @property-read QQNode $FromCompanyId
	 * @property-read QQNodeCompany $FromCompany
	 * @property-read QQNode $FromContactId
	 * @property-read QQNodeContact $FromContact
	 * @property-read QQNode $FromAddressId
	 * @property-read QQNodeAddress $FromAddress
	 * @property-read QQNode $ToCompanyId
	 * @property-read QQNodeCompany $ToCompany
	 * @property-read QQNode $ToContactId
	 * @property-read QQNodeContact $ToContact
	 * @property-read QQNode $ToAddressId
	 * @property-read QQNodeAddress $ToAddress
	 * @property-read QQNode $CourierId
	 * @property-read QQNodeCourier $Courier
	 * @property-read QQNode $TrackingNumber
	 * @property-read QQNode $ShipDate
	 * @property-read QQNode $ShippedFlag
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeShipmentCustomFieldHelper $ShipmentCustomFieldHelper
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeShipment extends QQReverseReferenceNode {
		protected $strTableName = 'shipment';
		protected $strPrimaryKey = 'shipment_id';
		protected $strClassName = 'Shipment';
		public function __get($strName) {
			switch ($strName) {
				case 'ShipmentId':
					return new QQNode('shipment_id', 'ShipmentId', 'integer', $this);
				case 'ShipmentNumber':
					return new QQNode('shipment_number', 'ShipmentNumber', 'string', $this);
				case 'TransactionId':
					return new QQNode('transaction_id', 'TransactionId', 'integer', $this);
				case 'Transaction':
					return new QQNodeTransaction('transaction_id', 'Transaction', 'integer', $this);
				case 'FromCompanyId':
					return new QQNode('from_company_id', 'FromCompanyId', 'integer', $this);
				case 'FromCompany':
					return new QQNodeCompany('from_company_id', 'FromCompany', 'integer', $this);
				case 'FromContactId':
					return new QQNode('from_contact_id', 'FromContactId', 'integer', $this);
				case 'FromContact':
					return new QQNodeContact('from_contact_id', 'FromContact', 'integer', $this);
				case 'FromAddressId':
					return new QQNode('from_address_id', 'FromAddressId', 'integer', $this);
				case 'FromAddress':
					return new QQNodeAddress('from_address_id', 'FromAddress', 'integer', $this);
				case 'ToCompanyId':
					return new QQNode('to_company_id', 'ToCompanyId', 'integer', $this);
				case 'ToCompany':
					return new QQNodeCompany('to_company_id', 'ToCompany', 'integer', $this);
				case 'ToContactId':
					return new QQNode('to_contact_id', 'ToContactId', 'integer', $this);
				case 'ToContact':
					return new QQNodeContact('to_contact_id', 'ToContact', 'integer', $this);
				case 'ToAddressId':
					return new QQNode('to_address_id', 'ToAddressId', 'integer', $this);
				case 'ToAddress':
					return new QQNodeAddress('to_address_id', 'ToAddress', 'integer', $this);
				case 'CourierId':
					return new QQNode('courier_id', 'CourierId', 'integer', $this);
				case 'Courier':
					return new QQNodeCourier('courier_id', 'Courier', 'integer', $this);
				case 'TrackingNumber':
					return new QQNode('tracking_number', 'TrackingNumber', 'string', $this);
				case 'ShipDate':
					return new QQNode('ship_date', 'ShipDate', 'QDateTime', $this);
				case 'ShippedFlag':
					return new QQNode('shipped_flag', 'ShippedFlag', 'boolean', $this);
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
				case 'ShipmentCustomFieldHelper':
					return new QQReverseReferenceNodeShipmentCustomFieldHelper($this, 'shipmentcustomfieldhelper', 'reverse_reference', 'shipment_id', 'ShipmentCustomFieldHelper');

				case '_PrimaryKeyNode':
					return new QQNode('shipment_id', 'ShipmentId', 'integer', $this);
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