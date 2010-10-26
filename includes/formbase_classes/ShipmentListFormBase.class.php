<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Shipment class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Shipment objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ShipmentListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ShipmentListFormBase extends QForm {
		protected $dtgShipment;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colShipmentId;
		protected $colShipmentNumber;
		protected $colTransactionId;
		protected $colFromCompanyId;
		protected $colFromContactId;
		protected $colFromAddressId;
		protected $colToCompanyId;
		protected $colToContactId;
		protected $colToAddressId;
		protected $colCourierId;
		protected $colTrackingNumber;
		protected $colShipDate;
		protected $colShippedFlag;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colShipmentCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgShipment_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colShipmentId = new QDataGridColumn(QApplication::Translate('Shipment Id'), '<?= $_ITEM->ShipmentId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->ShipmentId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->ShipmentId, false)));
			$this->colShipmentNumber = new QDataGridColumn(QApplication::Translate('Shipment Number'), '<?= QString::Truncate($_ITEM->ShipmentNumber, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->ShipmentNumber), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->ShipmentNumber, false)));
			$this->colTransactionId = new QDataGridColumn(QApplication::Translate('Transaction Id'), '<?= $_FORM->dtgShipment_Transaction_Render($_ITEM); ?>');
			$this->colFromCompanyId = new QDataGridColumn(QApplication::Translate('From Company Id'), '<?= $_FORM->dtgShipment_FromCompany_Render($_ITEM); ?>');
			$this->colFromContactId = new QDataGridColumn(QApplication::Translate('From Contact Id'), '<?= $_FORM->dtgShipment_FromContact_Render($_ITEM); ?>');
			$this->colFromAddressId = new QDataGridColumn(QApplication::Translate('From Address Id'), '<?= $_FORM->dtgShipment_FromAddress_Render($_ITEM); ?>');
			$this->colToCompanyId = new QDataGridColumn(QApplication::Translate('To Company Id'), '<?= $_FORM->dtgShipment_ToCompany_Render($_ITEM); ?>');
			$this->colToContactId = new QDataGridColumn(QApplication::Translate('To Contact Id'), '<?= $_FORM->dtgShipment_ToContact_Render($_ITEM); ?>');
			$this->colToAddressId = new QDataGridColumn(QApplication::Translate('To Address Id'), '<?= $_FORM->dtgShipment_ToAddress_Render($_ITEM); ?>');
			$this->colCourierId = new QDataGridColumn(QApplication::Translate('Courier Id'), '<?= $_FORM->dtgShipment_Courier_Render($_ITEM); ?>');
			$this->colTrackingNumber = new QDataGridColumn(QApplication::Translate('Tracking Number'), '<?= QString::Truncate($_ITEM->TrackingNumber, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->TrackingNumber), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->TrackingNumber, false)));
			$this->colShipDate = new QDataGridColumn(QApplication::Translate('Ship Date'), '<?= $_FORM->dtgShipment_ShipDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->ShipDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->ShipDate, false)));
			$this->colShippedFlag = new QDataGridColumn(QApplication::Translate('Shipped Flag'), '<?= ($_ITEM->ShippedFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->ShippedFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->ShippedFlag, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgShipment_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgShipment_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgShipment_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Shipment()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Shipment()->ModifiedDate, false)));
			$this->colShipmentCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Shipment Custom Field Helper'), '<?= $_FORM->dtgShipment_ShipmentCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgShipment = new QDataGrid($this);
			$this->dtgShipment->CellSpacing = 0;
			$this->dtgShipment->CellPadding = 4;
			$this->dtgShipment->BorderStyle = QBorderStyle::Solid;
			$this->dtgShipment->BorderWidth = 1;
			$this->dtgShipment->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgShipment->Paginator = new QPaginator($this->dtgShipment);
			$this->dtgShipment->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgShipment->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgShipment->SetDataBinder('dtgShipment_Bind');

			$this->dtgShipment->AddColumn($this->colEditLinkColumn);
			$this->dtgShipment->AddColumn($this->colShipmentId);
			$this->dtgShipment->AddColumn($this->colShipmentNumber);
			$this->dtgShipment->AddColumn($this->colTransactionId);
			$this->dtgShipment->AddColumn($this->colFromCompanyId);
			$this->dtgShipment->AddColumn($this->colFromContactId);
			$this->dtgShipment->AddColumn($this->colFromAddressId);
			$this->dtgShipment->AddColumn($this->colToCompanyId);
			$this->dtgShipment->AddColumn($this->colToContactId);
			$this->dtgShipment->AddColumn($this->colToAddressId);
			$this->dtgShipment->AddColumn($this->colCourierId);
			$this->dtgShipment->AddColumn($this->colTrackingNumber);
			$this->dtgShipment->AddColumn($this->colShipDate);
			$this->dtgShipment->AddColumn($this->colShippedFlag);
			$this->dtgShipment->AddColumn($this->colCreatedBy);
			$this->dtgShipment->AddColumn($this->colCreationDate);
			$this->dtgShipment->AddColumn($this->colModifiedBy);
			$this->dtgShipment->AddColumn($this->colModifiedDate);
			$this->dtgShipment->AddColumn($this->colShipmentCustomFieldHelper);
		}
		
		public function dtgShipment_EditLinkColumn_Render(Shipment $objShipment) {
			return sprintf('<a href="shipment_edit.php?intShipmentId=%s">%s</a>',
				$objShipment->ShipmentId, 
				QApplication::Translate('Edit'));
		}

		public function dtgShipment_Transaction_Render(Shipment $objShipment) {
			if (!is_null($objShipment->Transaction))
				return $objShipment->Transaction->__toString();
			else
				return null;
		}

		public function dtgShipment_FromCompany_Render(Shipment $objShipment) {
			if (!is_null($objShipment->FromCompany))
				return $objShipment->FromCompany->__toString();
			else
				return null;
		}

		public function dtgShipment_FromContact_Render(Shipment $objShipment) {
			if (!is_null($objShipment->FromContact))
				return $objShipment->FromContact->__toString();
			else
				return null;
		}

		public function dtgShipment_FromAddress_Render(Shipment $objShipment) {
			if (!is_null($objShipment->FromAddress))
				return $objShipment->FromAddress->__toString();
			else
				return null;
		}

		public function dtgShipment_ToCompany_Render(Shipment $objShipment) {
			if (!is_null($objShipment->ToCompany))
				return $objShipment->ToCompany->__toString();
			else
				return null;
		}

		public function dtgShipment_ToContact_Render(Shipment $objShipment) {
			if (!is_null($objShipment->ToContact))
				return $objShipment->ToContact->__toString();
			else
				return null;
		}

		public function dtgShipment_ToAddress_Render(Shipment $objShipment) {
			if (!is_null($objShipment->ToAddress))
				return $objShipment->ToAddress->__toString();
			else
				return null;
		}

		public function dtgShipment_Courier_Render(Shipment $objShipment) {
			if (!is_null($objShipment->Courier))
				return $objShipment->Courier->__toString();
			else
				return null;
		}

		public function dtgShipment_ShipDate_Render(Shipment $objShipment) {
			if (!is_null($objShipment->ShipDate))
				return $objShipment->ShipDate->__toString(QDateTime::FormatDisplayDate);
			else
				return null;
		}

		public function dtgShipment_CreatedByObject_Render(Shipment $objShipment) {
			if (!is_null($objShipment->CreatedByObject))
				return $objShipment->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgShipment_CreationDate_Render(Shipment $objShipment) {
			if (!is_null($objShipment->CreationDate))
				return $objShipment->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgShipment_ModifiedByObject_Render(Shipment $objShipment) {
			if (!is_null($objShipment->ModifiedByObject))
				return $objShipment->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgShipment_ShipmentCustomFieldHelper_Render(Shipment $objShipment) {
			if (!is_null($objShipment->ShipmentCustomFieldHelper))
				return $objShipment->ShipmentCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgShipment_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgShipment->TotalItemCount = Shipment::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgShipment->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgShipment->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Shipment objects, given the clauses above
			$this->dtgShipment->DataSource = Shipment::LoadAll($objClauses);
		}
	}
?>