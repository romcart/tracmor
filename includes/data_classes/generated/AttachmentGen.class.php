<?php
	/**
	 * The abstract AttachmentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Attachment subclass which
	 * extends this AttachmentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Attachment class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AttachmentId the value for intAttachmentId (Read-Only PK)
	 * @property integer $EntityQtypeId the value for intEntityQtypeId (Not Null)
	 * @property integer $EntityId the value for intEntityId (Not Null)
	 * @property string $Filename the value for strFilename (Not Null)
	 * @property string $TmpFilename the value for strTmpFilename 
	 * @property string $FileType the value for strFileType 
	 * @property string $Path the value for strPath 
	 * @property integer $Size the value for intSize 
	 * @property integer $CreatedBy the value for intCreatedBy (Not Null)
	 * @property QDateTime $CreationDate the value for dttCreationDate (Not Null)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AttachmentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column attachment.attachment_id
		 * @var integer intAttachmentId
		 */
		protected $intAttachmentId;
		const AttachmentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.entity_qtype_id
		 * @var integer intEntityQtypeId
		 */
		protected $intEntityQtypeId;
		const EntityQtypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.entity_id
		 * @var integer intEntityId
		 */
		protected $intEntityId;
		const EntityIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.filename
		 * @var string strFilename
		 */
		protected $strFilename;
		const FilenameMaxLength = 255;
		const FilenameDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.tmp_filename
		 * @var string strTmpFilename
		 */
		protected $strTmpFilename;
		const TmpFilenameMaxLength = 40;
		const TmpFilenameDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.file_type
		 * @var string strFileType
		 */
		protected $strFileType;
		const FileTypeMaxLength = 40;
		const FileTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.path
		 * @var string strPath
		 */
		protected $strPath;
		const PathMaxLength = 255;
		const PathDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.SIZE
		 * @var integer intSize
		 */
		protected $intSize;
		const SizeDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column attachment.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


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
		 * in the database column attachment.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;





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
		 * Load a Attachment from PK Info
		 * @param integer $intAttachmentId
		 * @return Attachment
		 */
		public static function Load($intAttachmentId) {
			// Use QuerySingle to Perform the Query
			return Attachment::QuerySingle(
				QQ::Equal(QQN::Attachment()->AttachmentId, $intAttachmentId)
			);
		}

		/**
		 * Load all Attachments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attachment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Attachment::QueryArray to perform the LoadAll query
			try {
				return Attachment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Attachments
		 * @return int
		 */
		public static function CountAll() {
			// Call Attachment::QueryCount to perform the CountAll query
			return Attachment::QueryCount(QQ::All());
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
			$objDatabase = Attachment::GetDatabase();

			// Create/Build out the QueryBuilder object with Attachment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'attachment');
			Attachment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('attachment');

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
		 * Static Qcodo Query method to query for a single Attachment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Attachment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Attachment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Attachment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Attachment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Attachment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Attachment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Attachment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Attachment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Attachment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Attachment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Attachment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Attachment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Attachment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'attachment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Attachment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Attachment::GetSelectFields($objQueryBuilder);
				Attachment::GetFromFields($objQueryBuilder);

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
			return Attachment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Attachment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'attachment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'attachment_id', $strAliasPrefix . 'attachment_id');
			$objBuilder->AddSelectItem($strTableName, 'entity_qtype_id', $strAliasPrefix . 'entity_qtype_id');
			$objBuilder->AddSelectItem($strTableName, 'entity_id', $strAliasPrefix . 'entity_id');
			$objBuilder->AddSelectItem($strTableName, 'filename', $strAliasPrefix . 'filename');
			$objBuilder->AddSelectItem($strTableName, 'tmp_filename', $strAliasPrefix . 'tmp_filename');
			$objBuilder->AddSelectItem($strTableName, 'file_type', $strAliasPrefix . 'file_type');
			$objBuilder->AddSelectItem($strTableName, 'path', $strAliasPrefix . 'path');
			$objBuilder->AddSelectItem($strTableName, 'SIZE', $strAliasPrefix . 'SIZE');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Attachment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Attachment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Attachment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Attachment object
			$objToReturn = new Attachment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'attachment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'attachment_id'] : $strAliasPrefix . 'attachment_id';
			$objToReturn->intAttachmentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'entity_qtype_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'entity_qtype_id'] : $strAliasPrefix . 'entity_qtype_id';
			$objToReturn->intEntityQtypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'entity_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'entity_id'] : $strAliasPrefix . 'entity_id';
			$objToReturn->intEntityId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'filename', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'filename'] : $strAliasPrefix . 'filename';
			$objToReturn->strFilename = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'tmp_filename', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tmp_filename'] : $strAliasPrefix . 'tmp_filename';
			$objToReturn->strTmpFilename = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'file_type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'file_type'] : $strAliasPrefix . 'file_type';
			$objToReturn->strFileType = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'path', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'path'] : $strAliasPrefix . 'path';
			$objToReturn->strPath = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'SIZE', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'SIZE'] : $strAliasPrefix . 'SIZE';
			$objToReturn->intSize = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'attachment__';

			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Attachments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Attachment[]
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
					$objItem = Attachment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Attachment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Attachment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Attachment next row resulting from the query
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
			return Attachment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Attachment object,
		 * by AttachmentId Index(es)
		 * @param integer $intAttachmentId
		 * @return Attachment
		*/
		public static function LoadByAttachmentId($intAttachmentId, $objOptionalClauses = null) {
			return Attachment::QuerySingle(
				QQ::Equal(QQN::Attachment()->AttachmentId, $intAttachmentId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Attachment objects,
		 * by EntityQtypeId Index(es)
		 * @param integer $intEntityQtypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attachment[]
		*/
		public static function LoadArrayByEntityQtypeId($intEntityQtypeId, $objOptionalClauses = null) {
			// Call Attachment::QueryArray to perform the LoadArrayByEntityQtypeId query
			try {
				return Attachment::QueryArray(
					QQ::Equal(QQN::Attachment()->EntityQtypeId, $intEntityQtypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Attachments
		 * by EntityQtypeId Index(es)
		 * @param integer $intEntityQtypeId
		 * @return int
		*/
		public static function CountByEntityQtypeId($intEntityQtypeId, $objOptionalClauses = null) {
			// Call Attachment::QueryCount to perform the CountByEntityQtypeId query
			return Attachment::QueryCount(
				QQ::Equal(QQN::Attachment()->EntityQtypeId, $intEntityQtypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Attachment objects,
		 * by EntityId Index(es)
		 * @param integer $intEntityId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attachment[]
		*/
		public static function LoadArrayByEntityId($intEntityId, $objOptionalClauses = null) {
			// Call Attachment::QueryArray to perform the LoadArrayByEntityId query
			try {
				return Attachment::QueryArray(
					QQ::Equal(QQN::Attachment()->EntityId, $intEntityId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Attachments
		 * by EntityId Index(es)
		 * @param integer $intEntityId
		 * @return int
		*/
		public static function CountByEntityId($intEntityId, $objOptionalClauses = null) {
			// Call Attachment::QueryCount to perform the CountByEntityId query
			return Attachment::QueryCount(
				QQ::Equal(QQN::Attachment()->EntityId, $intEntityId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Attachment objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attachment[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Attachment::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Attachment::QueryArray(
					QQ::Equal(QQN::Attachment()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Attachments
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Attachment::QueryCount to perform the CountByCreatedBy query
			return Attachment::QueryCount(
				QQ::Equal(QQN::Attachment()->CreatedBy, $intCreatedBy)
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
		 * Save this Attachment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Attachment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `attachment` (
							`entity_qtype_id`,
							`entity_id`,
							`filename`,
							`tmp_filename`,
							`file_type`,
							`path`,
							`SIZE`,
							`created_by`,
							`creation_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
							' . $objDatabase->SqlVariable($this->intEntityId) . ',
							' . $objDatabase->SqlVariable($this->strFilename) . ',
							' . $objDatabase->SqlVariable($this->strTmpFilename) . ',
							' . $objDatabase->SqlVariable($this->strFileType) . ',
							' . $objDatabase->SqlVariable($this->strPath) . ',
							' . $objDatabase->SqlVariable($this->intSize) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAttachmentId = $objDatabase->InsertId('attachment', 'attachment_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`attachment`
						SET
							`entity_qtype_id` = ' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
							`entity_id` = ' . $objDatabase->SqlVariable($this->intEntityId) . ',
							`filename` = ' . $objDatabase->SqlVariable($this->strFilename) . ',
							`tmp_filename` = ' . $objDatabase->SqlVariable($this->strTmpFilename) . ',
							`file_type` = ' . $objDatabase->SqlVariable($this->strFileType) . ',
							`path` = ' . $objDatabase->SqlVariable($this->strPath) . ',
							`SIZE` = ' . $objDatabase->SqlVariable($this->intSize) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . '
						WHERE
							`attachment_id` = ' . $objDatabase->SqlVariable($this->intAttachmentId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Attachment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAttachmentId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Attachment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Attachment::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attachment`
				WHERE
					`attachment_id` = ' . $objDatabase->SqlVariable($this->intAttachmentId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Attachments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Attachment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attachment`');
		}

		/**
		 * Truncate attachment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Attachment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `attachment`');
		}

		/**
		 * Reload this Attachment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Attachment object.');

			// Reload the Object
			$objReloaded = Attachment::Load($this->intAttachmentId);

			// Update $this's local variables to match
			$this->EntityQtypeId = $objReloaded->EntityQtypeId;
			$this->intEntityId = $objReloaded->intEntityId;
			$this->strFilename = $objReloaded->strFilename;
			$this->strTmpFilename = $objReloaded->strTmpFilename;
			$this->strFileType = $objReloaded->strFileType;
			$this->strPath = $objReloaded->strPath;
			$this->intSize = $objReloaded->intSize;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Attachment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `attachment` (
					`attachment_id`,
					`entity_qtype_id`,
					`entity_id`,
					`filename`,
					`tmp_filename`,
					`file_type`,
					`path`,
					`SIZE`,
					`created_by`,
					`creation_date`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAttachmentId) . ',
					' . $objDatabase->SqlVariable($this->intEntityQtypeId) . ',
					' . $objDatabase->SqlVariable($this->intEntityId) . ',
					' . $objDatabase->SqlVariable($this->strFilename) . ',
					' . $objDatabase->SqlVariable($this->strTmpFilename) . ',
					' . $objDatabase->SqlVariable($this->strFileType) . ',
					' . $objDatabase->SqlVariable($this->strPath) . ',
					' . $objDatabase->SqlVariable($this->intSize) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAttachmentId
		 * @return Attachment[]
		 */
		public static function GetJournalForId($intAttachmentId) {
			$objDatabase = Attachment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM attachment WHERE attachment_id = ' .
				$objDatabase->SqlVariable($intAttachmentId) . ' ORDER BY __sys_date');

			return Attachment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Attachment[]
		 */
		public function GetJournal() {
			return Attachment::GetJournalForId($this->intAttachmentId);
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
				case 'AttachmentId':
					// Gets the value for intAttachmentId (Read-Only PK)
					// @return integer
					return $this->intAttachmentId;

				case 'EntityQtypeId':
					// Gets the value for intEntityQtypeId (Not Null)
					// @return integer
					return $this->intEntityQtypeId;

				case 'EntityId':
					// Gets the value for intEntityId (Not Null)
					// @return integer
					return $this->intEntityId;

				case 'Filename':
					// Gets the value for strFilename (Not Null)
					// @return string
					return $this->strFilename;

				case 'TmpFilename':
					// Gets the value for strTmpFilename 
					// @return string
					return $this->strTmpFilename;

				case 'FileType':
					// Gets the value for strFileType 
					// @return string
					return $this->strFileType;

				case 'Path':
					// Gets the value for strPath 
					// @return string
					return $this->strPath;

				case 'Size':
					// Gets the value for intSize 
					// @return integer
					return $this->intSize;

				case 'CreatedBy':
					// Gets the value for intCreatedBy (Not Null)
					// @return integer
					return $this->intCreatedBy;

				case 'CreationDate':
					// Gets the value for dttCreationDate (Not Null)
					// @return QDateTime
					return $this->dttCreationDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'CreatedByObject':
					// Gets the value for the UserAccount object referenced by intCreatedBy (Not Null)
					// @return UserAccount
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = UserAccount::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
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
				case 'EntityQtypeId':
					// Sets the value for intEntityQtypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intEntityQtypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EntityId':
					// Sets the value for intEntityId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intEntityId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Filename':
					// Sets the value for strFilename (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFilename = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TmpFilename':
					// Sets the value for strTmpFilename 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTmpFilename = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FileType':
					// Sets the value for strFileType 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFileType = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Path':
					// Sets the value for strPath 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPath = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Size':
					// Sets the value for intSize 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSize = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					// Sets the value for intCreatedBy (Not Null)
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
					// Sets the value for dttCreationDate (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttCreationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CreatedByObject':
					// Sets the value for the UserAccount object referenced by intCreatedBy (Not Null)
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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Attachment');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->UserAccountId;

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
			$strToReturn = '<complexType name="Attachment"><sequence>';
			$strToReturn .= '<element name="AttachmentId" type="xsd:int"/>';
			$strToReturn .= '<element name="EntityQtypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="EntityId" type="xsd:int"/>';
			$strToReturn .= '<element name="Filename" type="xsd:string"/>';
			$strToReturn .= '<element name="TmpFilename" type="xsd:string"/>';
			$strToReturn .= '<element name="FileType" type="xsd:string"/>';
			$strToReturn .= '<element name="Path" type="xsd:string"/>';
			$strToReturn .= '<element name="Size" type="xsd:int"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Attachment', $strComplexTypeArray)) {
				$strComplexTypeArray['Attachment'] = Attachment::GetSoapComplexTypeXml();
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Attachment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Attachment();
			if (property_exists($objSoapObject, 'AttachmentId'))
				$objToReturn->intAttachmentId = $objSoapObject->AttachmentId;
			if (property_exists($objSoapObject, 'EntityQtypeId'))
				$objToReturn->intEntityQtypeId = $objSoapObject->EntityQtypeId;
			if (property_exists($objSoapObject, 'EntityId'))
				$objToReturn->intEntityId = $objSoapObject->EntityId;
			if (property_exists($objSoapObject, 'Filename'))
				$objToReturn->strFilename = $objSoapObject->Filename;
			if (property_exists($objSoapObject, 'TmpFilename'))
				$objToReturn->strTmpFilename = $objSoapObject->TmpFilename;
			if (property_exists($objSoapObject, 'FileType'))
				$objToReturn->strFileType = $objSoapObject->FileType;
			if (property_exists($objSoapObject, 'Path'))
				$objToReturn->strPath = $objSoapObject->Path;
			if (property_exists($objSoapObject, 'Size'))
				$objToReturn->intSize = $objSoapObject->Size;
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'CreationDate'))
				$objToReturn->dttCreationDate = new QDateTime($objSoapObject->CreationDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Attachment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = UserAccount::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->dttCreationDate)
				$objObject->dttCreationDate = $objObject->dttCreationDate->__toString(QDateTime::FormatSoap);
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
				$objQueryExpansion = new QQueryExpansion('Attachment', 'attachment', $objExpansionMap);
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
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `attachment` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`attachment_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`attachment_id` AS `%s__%s__attachment_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`entity_qtype_id` AS `%s__%s__entity_qtype_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`entity_id` AS `%s__%s__entity_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`filename` AS `%s__%s__filename`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`tmp_filename` AS `%s__%s__tmp_filename`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`file_type` AS `%s__%s__file_type`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`path` AS `%s__%s__path`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`SIZE` AS `%s__%s__SIZE`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'created_by':
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
		const ExpandCreatedByObject = 'created_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AttachmentId
	 * @property-read QQNode $EntityQtypeId
	 * @property-read QQNode $EntityId
	 * @property-read QQNode $Filename
	 * @property-read QQNode $TmpFilename
	 * @property-read QQNode $FileType
	 * @property-read QQNode $Path
	 * @property-read QQNode $Size
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 */
	class QQNodeAttachment extends QQNode {
		protected $strTableName = 'attachment';
		protected $strPrimaryKey = 'attachment_id';
		protected $strClassName = 'Attachment';
		public function __get($strName) {
			switch ($strName) {
				case 'AttachmentId':
					return new QQNode('attachment_id', 'AttachmentId', 'integer', $this);
				case 'EntityQtypeId':
					return new QQNode('entity_qtype_id', 'EntityQtypeId', 'integer', $this);
				case 'EntityId':
					return new QQNode('entity_id', 'EntityId', 'integer', $this);
				case 'Filename':
					return new QQNode('filename', 'Filename', 'string', $this);
				case 'TmpFilename':
					return new QQNode('tmp_filename', 'TmpFilename', 'string', $this);
				case 'FileType':
					return new QQNode('file_type', 'FileType', 'string', $this);
				case 'Path':
					return new QQNode('path', 'Path', 'string', $this);
				case 'Size':
					return new QQNode('SIZE', 'Size', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('attachment_id', 'AttachmentId', 'integer', $this);
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
	 * @property-read QQNode $AttachmentId
	 * @property-read QQNode $EntityQtypeId
	 * @property-read QQNode $EntityId
	 * @property-read QQNode $Filename
	 * @property-read QQNode $TmpFilename
	 * @property-read QQNode $FileType
	 * @property-read QQNode $Path
	 * @property-read QQNode $Size
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAttachment extends QQReverseReferenceNode {
		protected $strTableName = 'attachment';
		protected $strPrimaryKey = 'attachment_id';
		protected $strClassName = 'Attachment';
		public function __get($strName) {
			switch ($strName) {
				case 'AttachmentId':
					return new QQNode('attachment_id', 'AttachmentId', 'integer', $this);
				case 'EntityQtypeId':
					return new QQNode('entity_qtype_id', 'EntityQtypeId', 'integer', $this);
				case 'EntityId':
					return new QQNode('entity_id', 'EntityId', 'integer', $this);
				case 'Filename':
					return new QQNode('filename', 'Filename', 'string', $this);
				case 'TmpFilename':
					return new QQNode('tmp_filename', 'TmpFilename', 'string', $this);
				case 'FileType':
					return new QQNode('file_type', 'FileType', 'string', $this);
				case 'Path':
					return new QQNode('path', 'Path', 'string', $this);
				case 'Size':
					return new QQNode('SIZE', 'Size', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('attachment_id', 'AttachmentId', 'integer', $this);
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