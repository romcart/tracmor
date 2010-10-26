<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the ShippingAccount class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of ShippingAccount objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ShippingAccountListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ShippingAccountListFormBase extends QForm {
		protected $dtgShippingAccount;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colShippingAccountId;
		protected $colCourierId;
		protected $colShortDescription;
		protected $colAccessId;
		protected $colAccessCode;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgShippingAccount_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colShippingAccountId = new QDataGridColumn(QApplication::Translate('Shipping Account Id'), '<?= $_ITEM->ShippingAccountId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ShippingAccountId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ShippingAccountId, false)));
			$this->colCourierId = new QDataGridColumn(QApplication::Translate('Courier Id'), '<?= $_FORM->dtgShippingAccount_Courier_Render($_ITEM); ?>');
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ShortDescription, false)));
			$this->colAccessId = new QDataGridColumn(QApplication::Translate('Access Id'), '<?= QString::Truncate($_ITEM->AccessId, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->AccessId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->AccessId, false)));
			$this->colAccessCode = new QDataGridColumn(QApplication::Translate('Access Code'), '<?= QString::Truncate($_ITEM->AccessCode, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->AccessCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->AccessCode, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgShippingAccount_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgShippingAccount_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgShippingAccount_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::ShippingAccount()->ModifiedDate, false)));

			// Setup DataGrid
			$this->dtgShippingAccount = new QDataGrid($this);
			$this->dtgShippingAccount->CellSpacing = 0;
			$this->dtgShippingAccount->CellPadding = 4;
			$this->dtgShippingAccount->BorderStyle = QBorderStyle::Solid;
			$this->dtgShippingAccount->BorderWidth = 1;
			$this->dtgShippingAccount->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgShippingAccount->Paginator = new QPaginator($this->dtgShippingAccount);
			$this->dtgShippingAccount->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgShippingAccount->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgShippingAccount->SetDataBinder('dtgShippingAccount_Bind');

			$this->dtgShippingAccount->AddColumn($this->colEditLinkColumn);
			$this->dtgShippingAccount->AddColumn($this->colShippingAccountId);
			$this->dtgShippingAccount->AddColumn($this->colCourierId);
			$this->dtgShippingAccount->AddColumn($this->colShortDescription);
			$this->dtgShippingAccount->AddColumn($this->colAccessId);
			$this->dtgShippingAccount->AddColumn($this->colAccessCode);
			$this->dtgShippingAccount->AddColumn($this->colCreatedBy);
			$this->dtgShippingAccount->AddColumn($this->colCreationDate);
			$this->dtgShippingAccount->AddColumn($this->colModifiedBy);
			$this->dtgShippingAccount->AddColumn($this->colModifiedDate);
		}
		
		public function dtgShippingAccount_EditLinkColumn_Render(ShippingAccount $objShippingAccount) {
			return sprintf('<a href="shipping_account_edit.php?intShippingAccountId=%s">%s</a>',
				$objShippingAccount->ShippingAccountId, 
				QApplication::Translate('Edit'));
		}

		public function dtgShippingAccount_Courier_Render(ShippingAccount $objShippingAccount) {
			if (!is_null($objShippingAccount->Courier))
				return $objShippingAccount->Courier->__toString();
			else
				return null;
		}

		public function dtgShippingAccount_CreatedByObject_Render(ShippingAccount $objShippingAccount) {
			if (!is_null($objShippingAccount->CreatedByObject))
				return $objShippingAccount->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgShippingAccount_CreationDate_Render(ShippingAccount $objShippingAccount) {
			if (!is_null($objShippingAccount->CreationDate))
				return $objShippingAccount->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgShippingAccount_ModifiedByObject_Render(ShippingAccount $objShippingAccount) {
			if (!is_null($objShippingAccount->ModifiedByObject))
				return $objShippingAccount->ModifiedByObject->__toString();
			else
				return null;
		}


		protected function dtgShippingAccount_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgShippingAccount->TotalItemCount = ShippingAccount::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgShippingAccount->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgShippingAccount->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all ShippingAccount objects, given the clauses above
			$this->dtgShippingAccount->DataSource = ShippingAccount::LoadAll($objClauses);
		}
	}
?>