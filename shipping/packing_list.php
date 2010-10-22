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

	class PackingListForm extends QForm {
		
		// General Form Variables
		protected $objShipment;
		
		// Labels
		protected $lblShipmentNumber;
		protected $lblShipDate;
		protected $lblToCompany;
		protected $lblToContact;
		protected $lblToAddress;
		protected $lblFromAddress;
		protected $lblCourier;
		protected $lblLogo;
		protected $lblTerms;
		
		// Datagrid
		protected $dtgItem;
		
		protected function Form_Create() {
			
			$this->SetupShipment();
			$this->lblShipmentNumber_Create();
			$this->lblShipDate_Create();
			$this->lblToCompany_Create();
			$this->lblToContact_Create();
			$this->lblToAddress_Create();
			$this->lblFromAddress_Create();
			$this->lblCourier_Create();
			$this->dtgItem_Create();
			$this->lblLogo_Create();
			$this->lblTerms_Create();
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
		
		protected function Form_PreRender() {
			
			$this->dtgItem->DataSource = Item::LoadArrayByShipmentId($this->objShipment->ShipmentId);
		}
		
		protected function lblShipmentNumber_Create() {
			$this->lblShipmentNumber = new QLabel($this);
			$this->lblShipmentNumber->Name = 'Shipment Number';
			$this->lblShipmentNumber->Text = $this->objShipment->ShipmentNumber;
		}
		
		// Create and Setup lblShipDate
		protected function lblShipDate_Create() {
			$this->lblShipDate = new QLabel($this);
			$this->lblShipDate->Name = QApplication::Translate('Ship Date');
			if ($this->objShipment->ShipDate) {
				$this->lblShipDate->Text = $this->objShipment->ShipDate->__toString();
			}
		}
		
		// Create and Setup lblToCompany
		protected function lblToCompany_Create() {
			$this->lblToCompany = new QLabel($this);
			$this->lblToCompany->Name = '';
			if ($this->objShipment->ToCompanyId) {
				$this->lblToCompany->Text = $this->objShipment->ToCompany->__toString();
			}
		}
		
		// Create and Setup lblToContact
		protected function lblToContact_Create() {
			$this->lblToContact = new QLabel($this);
			$this->lblToContact->Name = 'Ship To';
			if ($this->objShipment->ToContactId) {
				$this->lblToContact->Text = $this->objShipment->ToContact->__toString();
			}
		}

		// Create and Setp lblToAddress
		protected function lblToAddress_Create() {
			$this->lblToAddress = new QLabel($this);
			$this->lblToAddress->HtmlEntities=false;
			$this->lblToAddress->Name = '';
			if ($this->objShipment->ToAddressId) {
				$this->lblToAddress->Text = $this->objShipment->ToAddress->__toStringFullAddress();
			}
		}

		// Create and Setup lblFromAddress
		protected function lblFromAddress_Create() {
			$this->lblFromAddress = new QLabel($this);
			$this->lblFromAddress->HtmlEntities=false;
			$this->lblFromAddress->Name = '';
			if ($this->objShipment->FromAddressId) {
				$this->lblFromAddress->Text = $this->objShipment->FromAddress->__toStringFullAddressWithWebsite();
			}
		}
		
		// Create and Setup lblCourier
		protected function lblCourier_Create() {
			$this->lblCourier = new QLabel($this);
			$this->lblCourier->HtmlEntities=false;
			$this->lblCourier->Name = 'Via';
			$this->lblCourier->Text = ($this->objShipment->CourierId) ? $this->lblCourier->Text = $this->objShipment->Courier->__toString() : 'Other';
		}
		
		// Create and Setup dtgItem
		protected function dtgItem_Create() {
			
			$this->dtgItem = new QDataGrid($this);
			$this->dtgItem->CellPadding = 5;
			$this->dtgItem->CellSpacing = 0;
			$this->dtgItem->CssClass = "datagrid_print";

    	$this->dtgItem->AddColumn(new QDataGridColumn('Item', '<?= $_ITEM->ShortDescription ?>', 'CssClass="dtg_column_print"'));
		$this->dtgItem->AddColumn(new QDataGridColumn('Code', '<?= $_ITEM->RenderBarcode() ?>', 'Width=200', 'CssClass="dtg_column_print"', 'HtmlEntities=false'));
	    $this->dtgItem->AddColumn(new QDataGridColumn('Qty', '<?= $_ITEM->Quantity ?>', 'Width=100','CssClass=dtg_column_print'));
	    $this->dtgItem->AddColumn(new QDataGridColumn('Receipt #', '<?= $_ITEM->ReceiptNumber ?>', 'CssClass=dtg_column_print'));
	    
	    $objStyle = $this->dtgItem->RowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#FFFFFF';
	    $objStyle->FontSize = 12;
	
	    $objStyle = $this->dtgItem->AlternateRowStyle;
	    $objStyle->BackColor = '#EFEFEF';
	
	    $objStyle = $this->dtgItem->HeaderRowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#DDDDDD';
	    $objStyle->CssClass = 'dtg_header_print';	    
		}
		
		// Create and Setup lblLogo
		protected function lblLogo_Create() {
			$this->lblLogo = new QLabel($this);
			$this->lblLogo->HtmlEntities=false;
			$strImagePath = (AWS_S3) ? sprintf('http://s3.amazonaws.com/%s/images', AWS_BUCKET) : '../images';
			$this->lblLogo->Text = sprintf('<img src="%s/%s" style="padding:4px;">', $strImagePath, QApplication::$TracmorSettings->PackingListLogo);
		}
		
		// Create and Setup lblTerms
		protected function lblTerms_Create() {
			$this->lblTerms = new QPanel($this);
			$this->lblTerms->HtmlEntities=false;
			$this->lblTerms->Text = QApplication::$TracmorSettings->PackingListTerms;
		}	
	}
	
	PackingListForm::Run('PackingListForm', __DOCROOT__ . __SUBDIRECTORY__ . '/shipping/packing_list.tpl.php');

?>