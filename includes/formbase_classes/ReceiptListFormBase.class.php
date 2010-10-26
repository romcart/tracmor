<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Receipt class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Receipt objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ReceiptListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ReceiptListFormBase extends QForm {
		protected $dtgReceipt;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colReceiptId;
		protected $colTransactionId;
		protected $colFromCompanyId;
		protected $colFromContactId;
		protected $colToContactId;
		protected $colToAddressId;
		protected $colReceiptNumber;
		protected $colDueDate;
		protected $colReceiptDate;
		protected $colReceivedFlag;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colReceiptCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgReceipt_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colReceiptId = new QDataGridColumn(QApplication::Translate('Receipt Id'), '<?= $_ITEM->ReceiptId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceiptId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceiptId, false)));
			$this->colTransactionId = new QDataGridColumn(QApplication::Translate('Transaction Id'), '<?= $_FORM->dtgReceipt_Transaction_Render($_ITEM); ?>');
			$this->colFromCompanyId = new QDataGridColumn(QApplication::Translate('From Company Id'), '<?= $_FORM->dtgReceipt_FromCompany_Render($_ITEM); ?>');
			$this->colFromContactId = new QDataGridColumn(QApplication::Translate('From Contact Id'), '<?= $_FORM->dtgReceipt_FromContact_Render($_ITEM); ?>');
			$this->colToContactId = new QDataGridColumn(QApplication::Translate('To Contact Id'), '<?= $_FORM->dtgReceipt_ToContact_Render($_ITEM); ?>');
			$this->colToAddressId = new QDataGridColumn(QApplication::Translate('To Address Id'), '<?= $_FORM->dtgReceipt_ToAddress_Render($_ITEM); ?>');
			$this->colReceiptNumber = new QDataGridColumn(QApplication::Translate('Receipt Number'), '<?= QString::Truncate($_ITEM->ReceiptNumber, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceiptNumber), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceiptNumber, false)));
			$this->colDueDate = new QDataGridColumn(QApplication::Translate('Due Date'), '<?= $_FORM->dtgReceipt_DueDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->DueDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->DueDate, false)));
			$this->colReceiptDate = new QDataGridColumn(QApplication::Translate('Receipt Date'), '<?= $_FORM->dtgReceipt_ReceiptDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceiptDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceiptDate, false)));
			$this->colReceivedFlag = new QDataGridColumn(QApplication::Translate('Received Flag'), '<?= ($_ITEM->ReceivedFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceivedFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->ReceivedFlag, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgReceipt_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgReceipt_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgReceipt_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Receipt()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Receipt()->ModifiedDate, false)));
			$this->colReceiptCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Receipt Custom Field Helper'), '<?= $_FORM->dtgReceipt_ReceiptCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgReceipt = new QDataGrid($this);
			$this->dtgReceipt->CellSpacing = 0;
			$this->dtgReceipt->CellPadding = 4;
			$this->dtgReceipt->BorderStyle = QBorderStyle::Solid;
			$this->dtgReceipt->BorderWidth = 1;
			$this->dtgReceipt->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgReceipt->Paginator = new QPaginator($this->dtgReceipt);
			$this->dtgReceipt->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgReceipt->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgReceipt->SetDataBinder('dtgReceipt_Bind');

			$this->dtgReceipt->AddColumn($this->colEditLinkColumn);
			$this->dtgReceipt->AddColumn($this->colReceiptId);
			$this->dtgReceipt->AddColumn($this->colTransactionId);
			$this->dtgReceipt->AddColumn($this->colFromCompanyId);
			$this->dtgReceipt->AddColumn($this->colFromContactId);
			$this->dtgReceipt->AddColumn($this->colToContactId);
			$this->dtgReceipt->AddColumn($this->colToAddressId);
			$this->dtgReceipt->AddColumn($this->colReceiptNumber);
			$this->dtgReceipt->AddColumn($this->colDueDate);
			$this->dtgReceipt->AddColumn($this->colReceiptDate);
			$this->dtgReceipt->AddColumn($this->colReceivedFlag);
			$this->dtgReceipt->AddColumn($this->colCreatedBy);
			$this->dtgReceipt->AddColumn($this->colCreationDate);
			$this->dtgReceipt->AddColumn($this->colModifiedBy);
			$this->dtgReceipt->AddColumn($this->colModifiedDate);
			$this->dtgReceipt->AddColumn($this->colReceiptCustomFieldHelper);
		}
		
		public function dtgReceipt_EditLinkColumn_Render(Receipt $objReceipt) {
			return sprintf('<a href="receipt_edit.php?intReceiptId=%s">%s</a>',
				$objReceipt->ReceiptId, 
				QApplication::Translate('Edit'));
		}

		public function dtgReceipt_Transaction_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->Transaction))
				return $objReceipt->Transaction->__toString();
			else
				return null;
		}

		public function dtgReceipt_FromCompany_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->FromCompany))
				return $objReceipt->FromCompany->__toString();
			else
				return null;
		}

		public function dtgReceipt_FromContact_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->FromContact))
				return $objReceipt->FromContact->__toString();
			else
				return null;
		}

		public function dtgReceipt_ToContact_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->ToContact))
				return $objReceipt->ToContact->__toString();
			else
				return null;
		}

		public function dtgReceipt_ToAddress_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->ToAddress))
				return $objReceipt->ToAddress->__toString();
			else
				return null;
		}

		public function dtgReceipt_DueDate_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->DueDate))
				return $objReceipt->DueDate->__toString(QDateTime::FormatDisplayDate);
			else
				return null;
		}

		public function dtgReceipt_ReceiptDate_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->ReceiptDate))
				return $objReceipt->ReceiptDate->__toString(QDateTime::FormatDisplayDate);
			else
				return null;
		}

		public function dtgReceipt_CreatedByObject_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->CreatedByObject))
				return $objReceipt->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgReceipt_CreationDate_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->CreationDate))
				return $objReceipt->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgReceipt_ModifiedByObject_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->ModifiedByObject))
				return $objReceipt->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgReceipt_ReceiptCustomFieldHelper_Render(Receipt $objReceipt) {
			if (!is_null($objReceipt->ReceiptCustomFieldHelper))
				return $objReceipt->ReceiptCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgReceipt_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgReceipt->TotalItemCount = Receipt::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgReceipt->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgReceipt->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Receipt objects, given the clauses above
			$this->dtgReceipt->DataSource = Receipt::LoadAll($objClauses);
		}
	}
?>