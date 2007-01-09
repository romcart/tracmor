<?php
	// This defines a specific column <td> for a DataGrid
	// All the appearance properties should be self-explanatory.
	
	// The SortByCommand and ReverseSortByCommand are both optional -- and are explained in more
	// depth in DataGrid.inc
	
	// "Name" is the name of the column, as displayed in the DataGrid's header row for that column
	// "Html" is the contents of the column itself -- the $this->strHtml contents can contain backticks ` to
	// deliniate commands that are to be PHP evaled (again, see DataGrid.inc for more info)
	
	// Comments above are from the original QDataGridColumn
	// QDataGridColumnExt was created to add a Display property to allow for the customizable datagrid

	class QDataGridColumnExt extends QDataGridColumn {
		
		protected $blnDisplay = true;
		protected $strControlId;
		
		public function __construct($strName, $strHtml = null, $objOverrideParameters = null) {
			
			$objOverrideArray = func_get_args();
			if (count($objOverrideArray) > 2)
				try {
					unset($objOverrideArray[0]);
					unset($objOverrideArray[1]);
					$this->OverrideAttributes($objOverrideArray);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			
			parent::__construct($strName, $strHtml);
		}
		
		public function GetAttributes($blnIncludeCustom = true, $blnIncludeAction = true) {
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
			
			if ($this->strWidth) {
				if (is_numeric($this->strWidth))
					$strStyle .= sprintf("width:%spx;", $this->strWidth);
				else
					$strStyle .= sprintf("width:%s;", $this->strWidth);
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
			
			if (!$this->blnDisplay) {
				$strStyle .= sprintf("display:none;");
			}
			
			if ($strStyle)
				$strToReturn .= sprintf('style="%s" ', $strStyle);
			
			return $strToReturn;
		}
		
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "Display": return $this->blnDisplay;
			
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
			switch ($strName) {
				// APPEARANCE
				case "Display":
					try {
						$this->blnDisplay = QType::Cast($mixValue, QType::Boolean);
						// $this->MarkAsWrapperModified();
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
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