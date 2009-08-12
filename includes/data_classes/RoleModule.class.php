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
	require(__DATAGEN_CLASSES__ . '/RoleModuleGen.class.php');

	/**
	 * The RoleModule class defined here contains any
	 * customized code for the RoleModule class in the
	 * Object Relational Model.  It represents the "role_module" table 
	 * in the database, and extends from the code generated abstract RoleModuleGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class RoleModule extends RoleModuleGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objRoleModule->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('RoleModule Object %s',  $this->intRoleModuleId);
		}
		
		/**
		 * Load a RoleModule from PK Info
		 * @param integer $intRoleId
		 * @param integer $intModuleId
		 * @return RoleModule
		*/
		public static function LoadByRoleIdModuleId($intRoleId, $intModuleId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			RoleModule::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intRoleId = $objDatabase->SqlVariable($intRoleId);
			$intModuleId = $objDatabase->SqlVariable($intModuleId);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`role_module_id`,
					`role_id`,
					`module_id`,
					`access_flag`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					`modified_date`
				FROM
					`role_module`
				WHERE
					`role_id` = %s
					AND module_id = %s', $intRoleId, $intModuleId);

			// Perform the Query and Instantiate the Row
			$objDbResult = $objDatabase->Query($strQuery);
			return RoleModule::InstantiateDbRow($objDbResult->GetNextRow());
		}		

		/**
		 * Load an array of RoleModule objects, based on the RoleId and Access Flag
		 * @param int intRoleId
		 * @param bit blnAccessFlag
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return RoleModule[]
		*/
		public static function LoadArrayByRoleIdAccessFlag($intRoleId, $blnAccessFlag, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			RoleModule::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intRoleId = $objDatabase->SqlVariable($intRoleId);
			$blnAccessFlag = $objDatabase->SqlVariable($blnAccessFlag);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`role_module`.*
					%s
				FROM
					`role_module` AS `role_module`
					%s
				WHERE
					`role_module`.`role_id` = %s AND
					`role_module`.`access_flag` = %s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intRoleId, $blnAccessFlag,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return RoleModule::InstantiateDbResult($objDbResult);
		}
		
		// This adds the created by and creation date before saving a new role
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