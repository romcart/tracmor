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
	// This is a custom class extending QFileControl
	// The purpose is to add MAX_FILE_SIZE error checking

	class QFileControlExt extends QFileControl {
		
		protected $intError;
		
		public function ParsePostData() {
			// Check to see if this Control's Value was passed in via the POST data
			if ((array_key_exists($this->strControlId, $_FILES)) && ($_FILES[$this->strControlId]['tmp_name'])) {
				// It was -- update this Control's value with the new value passed in via the POST arguments
				$this->strFileName = $_FILES[$this->strControlId]['name'];
				$this->strType = $_FILES[$this->strControlId]['type'];
				$this->intSize = QType::Cast($_FILES[$this->strControlId]['size'], QType::Integer);
				$this->strFile = $_FILES[$this->strControlId]['tmp_name'];
			}
			elseif (array_key_exists($this->strControlId, $_FILES) && ($_FILES[$this->strControlId]['error'])) {
				$this->intError = $_FILES[$this->strControlId]['error'];
			}
		}
		
		protected function GetControlHtml() {
			// Reset Internal Values
			$this->strFileName = null;
			$this->strType = null;
			$this->intSize = null;
			$this->strFile = null;

			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s"', $strStyle);

			$strToReturn = sprintf('<input type="hidden" name="MAX_FILE_SIZE" value="10000000"><input type="file" name="%s" id="%s" %s%s />',
				$this->strControlId,
				$this->strControlId,
				$this->GetAttributes(),
				$strStyle);

			return $strToReturn;
		}
		
		public function __get($strName) {
			switch ($strName) {
				// MISC
				case "FileName": return $this->strFileName;
				case "Type": return $this->strType;
				case "Size": return $this->intSize;
				case "File": return $this->strFile;
				case "Error"; return $this->intError;

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