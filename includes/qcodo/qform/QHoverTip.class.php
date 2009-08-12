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
 */

/**
 * This class extends the QPanel class. It is currently only to be used in conjunction with a QLabelExt, which is the only control which will render it
 * It could be built out for a lot of other controls. It is limited though because it is rendered right next to the parent control.
 * This would mean that if the parent contrl were all the way on the right side of the screen, it would popup off the side of the screen.
 * That can be fixed by utilizing a javascript absolute positioning, but it wasn't necessary just for the shipment and receipt datagrids
 *
 */
class QHoverTip extends QPanel {
	
	public function __construct($objParentObject, $strControlId = null) {
		
		parent::__construct($objParentObject, $strControlId);
		$this->Display = false;
		
		// Set some default values. These can be overridden
		$this->BorderWidth = 1;
		$this->Position = QPosition::Absolute;
		$this->BackColor = 'white';
		$this->SetCustomStyle('padding', '2px');
		
		// Add the mouseover actions to display the hovertip when the mouse is over the parent object.
		$objParentObject->AddAction(new QMouseOverEvent(), new QToggleDisplayAction($this));
		$objParentObject->AddAction(new QMouseOutEvent(), new QToggleDisplayAction($this));
	}
}

?>