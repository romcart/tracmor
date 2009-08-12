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
	require(__DATAGEN_CLASSES__ . '/RoleModuleAuthorizationGen.class.php');

	/**
	 * The RoleModuleAuthorization class defined here contains any
	 * customized code for the RoleModuleAuthorization class in the
	 * Object Relational Model.  It represents the "role_module_authorization" table 
	 * in the database, and extends from the code generated abstract RoleModuleAuthorizationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class RoleModuleAuthorization extends RoleModuleAuthorizationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objRoleModuleAuthorization->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('RoleModuleAuthorization Object %s',  $this->intRoleModuleAuthorizationId);
		}

		/**
		 * Load a RoleModuleAuthorization from PK Info
		 * @param integer $intRoleModuleAuthorizationId
		 * @return RoleModuleAuthorization
		*/
		public static function LoadByRoleModuleIdAuthorizationId($intRoleModuleId, $intAuthorizationId) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			RoleModuleAuthorization::QueryHelper($objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intRoleModuleId = $objDatabase->SqlVariable($intRoleModuleId);
			$intAuthorizationId = $objDatabase->SqlVariable($intAuthorizationId);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`role_module_authorization_id`,
					`role_module_id`,
					`authorization_id`,
					`authorization_level_id`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					`modified_date`
				FROM
					`role_module_authorization`
				WHERE
					`role_module_id` = %s
					AND `authorization_id` = %s', $intRoleModuleId, $intAuthorizationId);

			// Perform the Query and Instantiate the Row
			$objDbResult = $objDatabase->Query($strQuery);
			return RoleModuleAuthorization::InstantiateDbRow($objDbResult->GetNextRow());
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