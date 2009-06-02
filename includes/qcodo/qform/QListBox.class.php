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
	 * 
	 * Original Qcodo code under the MIT License. See qcodo.inc.php for more information.
	 */
?>

<?php
	class QListBox extends QListBoxBase {
		///////////////////////////
		// ListBox Preferences
		///////////////////////////

		// Feel free to specify global display preferences/defaults for all QListBox controls
		protected $strCssClass = 'listbox';
//		protected $strFontNames = QFontFamily::Verdana;
//		protected $strFontSize = '12px';
//		protected $strWidth = '250px';

		// For multiple-select based listboxes, you can define the way a "Reset" button should look
		protected function GetResetButtonHtml() {
			$strToReturn = sprintf(' <a href="javascript:__resetListBox(%s, %s)" style="font-family: verdana, arial, helvetica; font-size: 8pt; text-decoration: none;">%s</a>',
				"'" . $this->Form->FormId . "'",
				"'" . $this->strControlId . "'",
				QApplication::Translate('Reset'));

			return $strToReturn;
		}
		
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {		
				case "SelectedValue":
				for ($intIndex = 0; $intIndex < count($this->objItemsArray); $intIndex++) {
					if($this->objItemsArray[$intIndex]->Value == $mixValue) {
				  	$this->objItemsArray[$intIndex]->Selected = true;
					}
					else {
						$this->objItemsArray[$intIndex]->Selected = false;
					}
				}
				break;
							
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>