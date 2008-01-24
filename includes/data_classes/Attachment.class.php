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

	require(__DATAGEN_CLASSES__ . '/AttachmentGen.class.php');

	/**
	 * The Attachment class defined here contains any
	 * customized code for the Attachment class in the
	 * Object Relational Model.  It represents the "attachment" table 
	 * in the database, and extends from the code generated abstract AttachmentGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Attachment extends AttachmentGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAttachment->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Attachment Object %s',  $this->intAttachmentId);
		}
		
		public static function toStringIcon($intAttachmentCount) {
			if ($intAttachmentCount > 0) {
				if ($intAttachmentCount > 1) {
					$strToReturn = sprintf('<img src="../images/icons/attachment_gray.gif" title="%s Attachments" alt="%s Attachments">', $intAttachmentCount, $intAttachmentCount);
				}
				else {
					$strToReturn = sprintf('<img src="../images/icons/attachment_gray.gif" title="%s Attachment" alt="%s Attachment">', $intAttachmentCount, $intAttachmentCount);
				}
			}
			else {
				$strToReturn = '';
			}
			
			return $strToReturn;
		}
		
		// This adds the created by and creation date before saving a new asset
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
			}
			
			parent::Save($blnForceInsert, $blnForceUpdate);
		}
		
		public static function CountByEntityQtypeIdEntityId($intEntityQtypeId, $intEntityId, $objOptionalClauses = null) {
			
			// Call Attachment::QueryCount to perform the CountByEntityQtypeId query
			return Attachment::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Attachment()->EntityQtypeId, $intEntityQtypeId),
					QQ::Equal(QQN::Attachment()->EntityId, $intEntityId)
				),
				$objOptionalClauses
			);
		}
		
		public static function LoadArrayByEntityQtypeIdEntityId($intEntityQtypeId, $intEntityId, $objOptionalClauses = null) {
			return Attachment::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Attachment()->EntityQtypeId, $intEntityQtypeId),
					QQ::Equal(QQN::Attachment()->EntityId, $intEntityId)
				),
				$objOptionalClauses
			);
		}
		
		/**
		 * Generate the SQL for a list page to include attachments as virtual attributes (add __ before an alias to make a virutal attribute)
		 * The virtual attributes can then be accessed by $objAsset->GetVirtualAttribute('name_of_attribute') where the name doesn't include the __
		 * This method was added so that attachments can be added to the customizable datagrids
		 *
		 * @param integer $intEntityQtypeId
		 * @return array $arrAttachmentSql - with three elements: strSelect, strFrom, and strGroupBy which are to be included in a SQL statement
		 */
		public static function GenerateSql($intEntityQtypeId) {
			$arrAttachmentSql = array();
			$arrAttachmentSql['strSelect'] = ', COUNT(`attachment`.`attachment_id`) AS `__attachment_count`';
			$arrAttachmentSql['strFrom'] = sprintf('LEFT JOIN `attachment` ON (`attachment`.`entity_qtype_id` = %s AND `attachment`.`entity_id` = %s)', $intEntityQtypeId, EntityQtype::ToStringPrimaryKeySql($intEntityQtypeId));
			$arrAttachmentSql['strGroupBy'] = sprintf('GROUP BY %s', EntityQtype::ToStringPrimaryKeySql($intEntityQtypeId));
			
			return $arrAttachmentSql;
		}		

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Attachment objects
			return Attachment::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Attachment()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Attachment()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Attachment object
			return Attachment::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Attachment()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Attachment()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Attachment objects
			return Attachment::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Attachment()->Param1, $strParam1),
					QQ::Equal(QQN::Attachment()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Attachment::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`attachment`.*
				FROM
					`attachment` AS `attachment`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Attachment::InstantiateDbResult($objDbResult);
		}
*/



		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>