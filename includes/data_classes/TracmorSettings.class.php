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

	class TracmorSettings extends QBaseClass {
		
		protected $objAdminSettingArray;

		public function __construct() {
			if (class_exists('AdminSettingGen')) {
				$objAdminSettingArray = AdminSetting::LoadAll();
			}
		}
		
		public function __get($strName) {
			
			// These are included here because this class is constructed before code generation
			// include_once(__INCLUDES__ . '/qcodo/_core/codegen/QConvertNotationBase.class.php');
			include_once(__INCLUDES__ .'/qcodo/codegen/QConvertNotation.class.php');
			
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////

				default:
					try {
						$objAdminSetting = AdminSetting::LoadByShortDescription(QConvertNotation::UnderscoreFromCamelCase($strName));
						return $objAdminSetting->Value;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
		
		// The public setter here actually saves the value to the database, so all you have to do is set a TracmorSettings to save it.
		public function __set($strName, $mixValue) {
			
			// These are included here because this class is constructed before code generation
			// include_once(__INCLUDES__ . '/qcodo/_core/codegen/QConvertNotationBase.class.php');
			include_once(__INCLUDES__ .'/qcodo/codegen/QConvertNotation.class.php');
			
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				
				default:
					try {
						$objAdminSetting = AdminSetting::LoadByShortDescription(QConvertNotation::UnderscoreFromCamelCase($strName));
						$objAdminSetting->Value = $mixValue;
						return ($objAdminSetting->Save());
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}



?>