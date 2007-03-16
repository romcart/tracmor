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
	require(__DATAGEN_CLASSES__ . '/ModuleGen.class.php');

	/**
	 * The Module class defined here contains any
	 * customized code for the Module class in the
	 * Object Relational Model.  It represents the "module" table 
	 * in the database, and extends from the code generated abstract ModuleGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Module extends ModuleGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objModule->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strShortDescription);
		}
		
		/**
		 * This returns all Module objects except for the Home module
		 * It is intended to use for the role_edit page because the home module always grants full authorization
		 *
		 * @return Array Module Objects
		 */
		public static function LoadAllButHome() {
			
			$objModuleArray = Module::QueryArray(QQ::NotEqual(QQN::Module()->ModuleId, 1));
			
			return $objModuleArray;
		}
	}
?>