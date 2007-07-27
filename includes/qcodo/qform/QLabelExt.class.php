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

/**
 * This class extends the QLabel class and adds a HoverTip to it.
 * It adds the HoverTip as a variable, and renders it in the GetControlHtml.
 *
 */
class QLabelExt extends QLabel {
	
	protected $objHoverTip;
	
	protected function GetControlHtml() {
		$strStyle = $this->GetStyleAttributes();

		if ($strStyle)
			$strStyle = sprintf('style="%s"', $strStyle);

		$strTemplateEvaluated = '';
		if ($this->strTemplate) {
			global $_CONTROL;
			$objCurrentControl = $_CONTROL;
			$_CONTROL = $this;
			$strTemplateEvaluated = $this->objForm->EvaluateTemplate($this->strTemplate);
			$_CONTROL = $objCurrentControl;
		}

		$strToReturn = sprintf('<%s id="%s" %s%s>%s%s%s</%s>%s',
			$this->strTagName,
			$this->strControlId,
			$this->GetAttributes(),
			$strStyle,
			($this->blnHtmlEntities) ? QApplication::HtmlEntities($this->strText) : $this->strText,
			$strTemplateEvaluated,
			($this->blnAutoRenderChildren) ? $this->RenderChildren(false) : '',
			$this->strTagName,
			($this->objHoverTip && !$this->objParentControl->ExportCsv) ? $this->objHoverTip->Render(false) : '');

		return $strToReturn;
	}
	
	public function __get($strName) {
		switch ($strName) {
			// APPEARANCE
			case "HoverTip": return $this->objHoverTip;
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
		$this->blnModified = true;

		switch ($strName) {
			// APPEARANCE
			case "HoverTip":
				try {
					$this->objHoverTip = $mixValue;
					break;
				} catch (QInvalidCastException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}	
			default:
				try {
					parent::__set($strName, $mixValue);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
				break;
		}
	}
}

?>