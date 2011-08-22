<?php
	// This defines a the stle for a row <tr> for a DataGrid
	// All the appearance properties should be self-explanatory.

	// For more information about DataGrid appearance, please see DataGrid.inc
	
	class QDataGridRowStyleExt extends QDataGridRowStyle {

		public function GetAttributes($blnIncludeCustom = true, $blnIncludeAction = true, $objColumn = null) {
			$strToReturn = "";

			if (!$this->blnWrap)
				$strToReturn .= 'nowrap="nowrap" ';

			switch ($this->strHorizontalAlign) {
				case QHorizontalAlign::Left:
					$strToReturn .= 'align="left" ';
					break;
				case QHorizontalAlign::Right:
					$strToReturn .= 'align="right" ';
					break;
				case QHorizontalAlign::Center:
					$strToReturn .= 'align="center" ';
					break;
				case QHorizontalAlign::Justify:
					$strToReturn .= 'align="justify" ';
					break;
			}

			switch ($this->strVerticalAlign) {
				case QVerticalAlign::Top:
					$strToReturn .= 'valign="top" ';
					break;
				case QVerticalAlign::Middle:
					$strToReturn .= 'valign="middle" ';
					break;
				case QVerticalAlign::Bottom:
					$strToReturn .= 'valign="bottom" ';
					break;
			}

			if ($this->strCssClass)
				$strToReturn .= sprintf('class="%s" ', $this->strCssClass);

			$strStyle = "";			
			
			if ($this->strHeight) {
				if (is_numeric($this->strHeight))
					$strStyle .= sprintf("height:%s;", $this->strHeight);
				else
					$strStyle .= sprintf("height:%spx;", $this->strHeight);
			}
			if ($this->strForeColor)
				$strStyle .= sprintf("color:%s;", $this->strForeColor);
			if ($this->strBackColor)
				$strStyle .= sprintf("background-color:%s;", $this->strBackColor);
			if ($this->strBorderColor)
				$strStyle .= sprintf("border-color:%s;", $this->strBorderColor);
			if ($this->strBorderWidth) {
				$strStyle .= sprintf("border-width:%s;", $this->strBorderWidth);
				if ((!$this->strBorderStyle) || ($this->strBorderStyle == QBorderStyle::NotSet))
					// For "No Border Style" -- apply a "solid" style because width is set
					$strStyle .= "border-style:solid;";
			}
			if (($this->strBorderStyle) && ($this->strBorderStyle != QBorderStyle::NotSet))
				$strStyle .= sprintf("border-style:%s;", $this->strBorderStyle);
			
			if ($this->strFontNames)
				$strStyle .= sprintf("font-family:%s;", $this->strFontNames);
			if ($this->strFontSize) {
				if (is_numeric($this->strFontSize))
					$strStyle .= sprintf("font-size:%spx;", $this->strFontSize);
				else
					$strStyle .= sprintf("font-size:%s;", $this->strFontSize);
			}
			if ($this->blnFontBold)
				$strStyle .= "font-weight:bold;";
			if ($this->blnFontItalic)
				$strStyle .= "font-style:italic;";
			
			$strTextDecoration = "";
			if ($this->blnFontUnderline)
				$strTextDecoration .= "underline ";
			if ($this->blnFontOverline)
				$strTextDecoration .= "overline ";
			if ($this->blnFontStrikeout)
				$strTextDecoration .= "line-through ";
			
			if ($strTextDecoration) {
				$strTextDecoration = trim($strTextDecoration);
				$strStyle .= sprintf("text-decoration:%s;", $strTextDecoration);
			}
			
			if ($objColumn && $objColumn instanceof QDataGridColumnExt) {
				if (!$objColumn->Display) {
					$strStyle .= sprintf("display:none;");
				}
			}
			
			if ($strStyle)
				$strToReturn .= sprintf('style="%s" ', $strStyle);
			
			return $strToReturn;
		}
	}
?>