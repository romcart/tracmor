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
	require(__DATAGEN_CLASSES__ . '/ShortcutGen.class.php');

	/**
	 * The Shortcut class defined here contains any
	 * customized code for the Shortcut class in the
	 * Object Relational Model.  It represents the "shortcut" table 
	 * in the database, and extends from the code generated abstract ShortcutGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Shortcut extends ShortcutGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objShortcut->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strShortDescription);
		}
		
		public function __toStringWithLink($strCssClass = null) {
			return sprintf('<a href="%s" class="%s">%s</a>', $this->strLink, $strCssClass, $this->__toString());
		}
		
		public function __toStringIcon() {
			return sprintf('%s', $this->strImagePath);
		}
		
		/**
		 * Load an array of Shortcut objects,
		 * by ModuleId Index(es)
		 * @param integer $intModuleId
		 * @param string $strOrderBy
		 * @param string $strLimit
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @return Shortcut[]
		*/
		public static function LoadArrayByRoleModule($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			Shortcut::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$intModuleId = $objDatabase->SqlVariable(QApplication::$objRoleModule->ModuleId, true);
			$objViewRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, 1);
			if (!$objViewRoleModuleAuthorization) {
				throw new Exception('No valid RoleModuleAuthorization for this User Role.');
			}
			elseif ($objViewRoleModuleAuthorization->AuthorizationLevelId == 1 || $objViewRoleModuleAuthorization->AuthorizationLevelId == 2) {
				$blnView = true;
			}
			else {
				$blnView = false;
			}
			
			$objEditRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, 2);
			if (!$objEditRoleModuleAuthorization) {
				throw new Exception('No valid RoleModuleAuthorization for this User Role.');
			}
			elseif ($objEditRoleModuleAuthorization->AuthorizationLevelId == 1 || $objEditRoleModuleAuthorization->AuthorizationLevelId == 2) {
				$blnEdit = true;
			}
			else {
				$blnEdit = false;
			}
			
			if ($blnView && $blnEdit) {
				$strAuthorizationSql = 'AND (`shortcut`.`authorization_id` = 1 OR `shortcut`.`authorization_id` = 2)';
			}
			elseif ($blnView) {
				$strAuthorizationSql = 'AND `shortcut`.`authorization_id` = 1';
			}
			elseif ($blnEdit) {
				$strAuthorizationSql = 'AND `shortcut`.`authorization_id` = 2';
			}
			else {
				$strAuthorizationSql = 'AND `shortcut`.`authorization_id` != 1 AND `shortcut`.`authorization_id` != 2';
			}

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`shortcut`.`shortcut_id` AS `shortcut_id`,
					`shortcut`.`module_id` AS `module_id`,
					`shortcut`.`authorization_id` AS `authorization_id`,
					`shortcut`.`short_description` AS `short_description`,
					`shortcut`.`link` AS `link`,
					`shortcut`.`image_path` AS `image_path`
					%s
				FROM
					`shortcut` AS `shortcut`
					%s
				WHERE
					`shortcut`.`module_id` %s
					%s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intModuleId, $strAuthorizationSql,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Shortcut::InstantiateDbResult($objDbResult);
		}		
	}
?>