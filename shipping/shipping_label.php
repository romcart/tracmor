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

	require_once('../includes/prepend.inc.php');

	class ShippingLabelForm extends QForm {
		
		// General Form Variables
		protected $objShipment;
		
		// Labels
		protected $lblImage;
		
		protected function Form_Create() {
			$this->SetupShipment();
			$this->lblImage_Create();
		}
		
		protected function SetupShipment() {
			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			$intShipmentId = QApplication::QueryString('intShipmentId');
			if (($intShipmentId)) {
				$this->objShipment = Shipment::Load(($intShipmentId));

				if (!$this->objShipment)
					throw new Exception('Could not find a Shipment object with PK arguments: ' . $intShipmentId);
			}
		}
		
		//protected function Form_PreRender() {
			
		//	$this->dtgItem->DataSource = Item::LoadArrayByShipmentId($this->objShipment->ShipmentId);
		//}
		
		protected function lblImage_Create() {
			$this->lblImage = new QLabel($this);
			$this->lblImage->HtmlEntities = false;
			$this->lblImage->Text = '<img src="../images/shipping_labels/fedex/'. QApplication::$TracmorSettings->ImageUploadPrefix . $this->objShipment->ShipmentNumber . '.png" style="width:7in;height:4.75in;">';			
		}
	}
	
	ShippingLabelForm::Run('ShippingLabelForm', 'shipping_label.tpl.php');

?>