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
		 * by QApplication::$objRoleModule->RoleModuleId and by the Role Edit Access to the Built-in Fields of the Module.
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
			$intRoleId = $objDatabase->SqlVariable(QApplication::$objRoleModule->RoleId, true);
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
			
			//Set the entities sql according to the Module
			
			switch (QApplication::$objRoleModule->ModuleId) {
				case 2:
					$strEntitiesSql= 'AND (`FLA`.`entity_qtype_id`=1 OR `FLA`.`entity_qtype_id`=4)';
				break;
				case 3:
					$strEntitiesSql= 'AND (`FLA`.`entity_qtype_id`=2)';
				break;
				case 4:
					$strEntitiesSql= 'AND (`FLA`.`entity_qtype_id`=7 OR `FLA`.`entity_qtype_id`=8 OR `FLA`.`entity_qtype_id`=9)';
				break;
				case 5:
					$strEntitiesSql= 'AND (`FLA`.`entity_qtype_id`=10)';
				break;
				case 6:
					$strEntitiesSql= 'AND (`FLA`.`entity_qtype_id`=11)';
				break;
				case 7:
					$strEntitiesSql= '';
				break;
			}		

			// Setup the SQL Query that checks "edit" authorization to the module
			$strQuery = sprintf('
				SELECT
				%s
					`shortcut`.`shortcut_id` AS `shortcut_id`,
					`shortcut`.`module_id` AS `module_id`,
					`shortcut`.`authorization_id` AS `authorization_id`,
					`shortcut`.`short_description` AS `short_description`,
					`shortcut`.`link` AS `link`,
					`shortcut`.`image_path` AS `image_path`,
					`shortcut`.`entity_qtype_id` AS `entity_qtype_id`,
					`shortcut`.`create_flag` AS `create_flag`
					%s
				FROM
					`shortcut` AS `shortcut`,
					`role_entity_qtype_built_in_authorization` AS `FLA`					
					%s
				WHERE
					(`FLA`.`role_id` %s
					%s
					AND `FLA`.`authorization_id`=2)				
					AND `shortcut`.`module_id` %s
					%s
					AND (`shortcut`.`entity_qtype_id`=`FLA`.`entity_qtype_id`)
					AND (`shortcut`.`create_flag`=0 OR `FLA`.`authorized_flag`=1)					
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$intRoleId,$strEntitiesSql,
				$intModuleId, $strAuthorizationSql,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Shortcut::InstantiateDbResult($objDbResult);
		}		
/*
		SELECT 
		`shortcut`.`shortcut_id` AS `shortcut_id`,
 `shortcut`.`module_id` AS `module_id`,
 `shortcut`.`authorization_id` AS `authorization_id`,
 `shortcut`.`short_description` AS `short_description`,
 `shortcut`.`link` AS `link`,
 `shortcut`.`image_path` AS `image_path`,
 `shortcut`.`entity_qtype_id` AS `entity_qtype_id`,
 `shortcut`.`create_flag` AS `create_flag` 
FROM 
`shortcut` AS `shortcut`,
 `role_entity_qtype_built_in_authorization` AS `FLA` 
WHERE 
(`FLA`.`role_id` = 1 
AND (`FLA`.`entity_qtype_id`=1) 
AND `FLA`.`authorization_id`=2)
 
AND `shortcut`.`module_id` = 2 
AND (`shortcut`.`authorization_id` = 1 OR `shortcut`.`authorization_id` = 2)
AND (`shortcut`.`create_flag`=`FLA`.`entity_qtype_id`) 
AND (`shortcut`.`create_flag`=0 OR `FLA`.`authorized_flag`=1) 
	*/	
		
		/*
		 SELECT 
			FLA.*,
			`shortcut`.`shortcut_id` AS `shortcut_id`,
			 `shortcut`.`module_id` AS `module_id`,
			 `shortcut`.`authorization_id` AS `authorization_id`,
			 `shortcut`.`short_description` AS `short_description`,
			 `shortcut`.`link` AS `link`, 
			`shortcut`.`image_path` AS `image_path`, 
			`shortcut`.`create_flag` AS `create_flag`
			FROM 
			`shortcut` AS `shortcut`,
			 `role_entity_qtype_built_in_authorization` AS `FLA` 
			WHERE 
			(`FLA`.`role_id` = 1 
			AND (`FLA`.`entity_qtype_id`=1 OR `FLA`.`entity_qtype_id`=4) 
			AND `FLA`.`authorization_id`=2) 
			AND `shortcut`.`module_id` = 2 
			AND (`shortcut`.`authorization_id` = 1 OR `shortcut`.`authorization_id` = 2) 
			AND(`shortcut`.`create_flag`=`FLA`.`entity_qtype_id`)
			AND (`shortcut`.`flag_create`=0 OR `FLA`.`authorized_flag`=1)
		 */
	}
?>