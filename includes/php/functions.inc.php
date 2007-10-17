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
	 * This returns the html for either a check or an x based on the boolean value
	 *
	 * @param bool $blnValue
	 * @return string HTML img tag for the check or the string
	 */
	function BooleanImage($blnValue = true) {
				
		if ($blnValue) {
			$strToReturn = sprintf('<img src="%s">', '../images/icons/check.png');
		}
		else {
			$strToReturn = sprintf('<img src="%s">', '../images/icons/x.png');
		}
		
		return $strToReturn;
	}

?>