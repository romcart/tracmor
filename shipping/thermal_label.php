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

	require_once('../includes/prepend.inc.php');

	class ThermalLabelForm extends QForm {
		
		// General Form Variables
		protected $objShipment;
		protected $objFedexShipment;
		
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

				$this->objFedexShipment = FedexShipment::LoadByShipmentId($this->objShipment->ShipmentId);

				if (!$this->objFedexShipment)
					throw new Exception('Could not find a Fedex Shipment object with PK arguments: ' . $intShipmentId);
			}
		}
		
		//protected function Form_PreRender() {
			
		//	$this->dtgItem->DataSource = Item::LoadArrayByShipmentId($this->objShipment->ShipmentId);
		//}
		
		protected function lblImage_Create() {
			$this->lblImage = new QLabel($this);
			$this->lblImage->HtmlEntities = false;
			if (AWS_S3) {
				$strSrc = 'http://s3.amazonaws.com/' . AWS_BUCKET . '/images/shipping_labels/fedex/';
			}
			else {
				$strSrc = sprintf('http://%s/images/shipping_labels/fedex/', $_SERVER['SERVER_NAME'] . __SUBDIRECTORY__);
			}

			$strLabelExtension = ($this->objFedexShipment->LabelPrinterType == '5') ? '.zpl' : '.epl';

			$this->lblImage->Text = '<applet code="com.tracmor.applet.ThermalLabelPrint.class" archive="../includes/java/jars/ThermalLabelPrint.jar" style="width:1px;height:1px;float:left;">';
			$this->lblImage->Text.= '<param name="type" value="nio">';
			$this->lblImage->Text.= '<param name="url" value="'.$strSrc . QApplication::$TracmorSettings->ImageUploadPrefix . $this->objShipment->ShipmentNumber . $strLabelExtension.'">';
			$this->lblImage->Text.= '<param name="printer" value="'.$this->objFedexShipment->ThermalPrinterPort.'"></applet>';
		}
	}
	
	ThermalLabelForm::Run('ThermalLabelForm', 'thermal_label.tpl.php');

?>
