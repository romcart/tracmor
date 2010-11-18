<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the UserAccount class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of UserAccount objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this UserAccountListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class UserAccountListFormBase extends QForm {
		protected $dtgUserAccount;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colUserAccountId;
		protected $colFirstName;
		protected $colLastName;
		protected $colUsername;
		protected $colPasswordHash;
		protected $colEmailAddress;
		protected $colActiveFlag;
		protected $colAdminFlag;
		protected $colPortableAccessFlag;
		protected $colPortableUserPin;
		protected $colRoleId;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgUserAccount_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colUserAccountId = new QDataGridColumn(QApplication::Translate('User Account Id'), '<?= $_ITEM->UserAccountId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->UserAccountId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->UserAccountId, false)));
			$this->colFirstName = new QDataGridColumn(QApplication::Translate('First Name'), '<?= QString::Truncate($_ITEM->FirstName, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->FirstName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->FirstName, false)));
			$this->colLastName = new QDataGridColumn(QApplication::Translate('Last Name'), '<?= QString::Truncate($_ITEM->LastName, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->LastName, false)));
			$this->colUsername = new QDataGridColumn(QApplication::Translate('Username'), '<?= QString::Truncate($_ITEM->Username, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->Username), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->Username, false)));
			$this->colPasswordHash = new QDataGridColumn(QApplication::Translate('Password Hash'), '<?= QString::Truncate($_ITEM->PasswordHash, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->PasswordHash), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->PasswordHash, false)));
			$this->colEmailAddress = new QDataGridColumn(QApplication::Translate('Email Address'), '<?= QString::Truncate($_ITEM->EmailAddress, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->EmailAddress), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->EmailAddress, false)));
			$this->colActiveFlag = new QDataGridColumn(QApplication::Translate('Active Flag'), '<?= ($_ITEM->ActiveFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->ActiveFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->ActiveFlag, false)));
			$this->colAdminFlag = new QDataGridColumn(QApplication::Translate('Admin Flag'), '<?= ($_ITEM->AdminFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->AdminFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->AdminFlag, false)));
			$this->colPortableAccessFlag = new QDataGridColumn(QApplication::Translate('Portable Access Flag'), '<?= ($_ITEM->PortableAccessFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->PortableAccessFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->PortableAccessFlag, false)));
			$this->colPortableUserPin = new QDataGridColumn(QApplication::Translate('Portable User Pin'), '<?= $_ITEM->PortableUserPin; ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->PortableUserPin), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->PortableUserPin, false)));
			$this->colRoleId = new QDataGridColumn(QApplication::Translate('Role Id'), '<?= $_FORM->dtgUserAccount_Role_Render($_ITEM); ?>');
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgUserAccount_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgUserAccount_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgUserAccount_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::UserAccount()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::UserAccount()->ModifiedDate, false)));

			// Setup DataGrid
			$this->dtgUserAccount = new QDataGrid($this);
			$this->dtgUserAccount->CellSpacing = 0;
			$this->dtgUserAccount->CellPadding = 4;
			$this->dtgUserAccount->BorderStyle = QBorderStyle::Solid;
			$this->dtgUserAccount->BorderWidth = 1;
			$this->dtgUserAccount->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgUserAccount->Paginator = new QPaginator($this->dtgUserAccount);
			$this->dtgUserAccount->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgUserAccount->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgUserAccount->SetDataBinder('dtgUserAccount_Bind');

			$this->dtgUserAccount->AddColumn($this->colEditLinkColumn);
			$this->dtgUserAccount->AddColumn($this->colUserAccountId);
			$this->dtgUserAccount->AddColumn($this->colFirstName);
			$this->dtgUserAccount->AddColumn($this->colLastName);
			$this->dtgUserAccount->AddColumn($this->colUsername);
			$this->dtgUserAccount->AddColumn($this->colPasswordHash);
			$this->dtgUserAccount->AddColumn($this->colEmailAddress);
			$this->dtgUserAccount->AddColumn($this->colActiveFlag);
			$this->dtgUserAccount->AddColumn($this->colAdminFlag);
			$this->dtgUserAccount->AddColumn($this->colPortableAccessFlag);
			$this->dtgUserAccount->AddColumn($this->colPortableUserPin);
			$this->dtgUserAccount->AddColumn($this->colRoleId);
			$this->dtgUserAccount->AddColumn($this->colCreatedBy);
			$this->dtgUserAccount->AddColumn($this->colCreationDate);
			$this->dtgUserAccount->AddColumn($this->colModifiedBy);
			$this->dtgUserAccount->AddColumn($this->colModifiedDate);
		}
		
		public function dtgUserAccount_EditLinkColumn_Render(UserAccount $objUserAccount) {
			return sprintf('<a href="user_account_edit.php?intUserAccountId=%s">%s</a>',
				$objUserAccount->UserAccountId, 
				QApplication::Translate('Edit'));
		}

		public function dtgUserAccount_Role_Render(UserAccount $objUserAccount) {
			if (!is_null($objUserAccount->Role))
				return $objUserAccount->Role->__toString();
			else
				return null;
		}

		public function dtgUserAccount_CreatedByObject_Render(UserAccount $objUserAccount) {
			if (!is_null($objUserAccount->CreatedByObject))
				return $objUserAccount->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgUserAccount_CreationDate_Render(UserAccount $objUserAccount) {
			if (!is_null($objUserAccount->CreationDate))
				return $objUserAccount->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgUserAccount_ModifiedByObject_Render(UserAccount $objUserAccount) {
			if (!is_null($objUserAccount->ModifiedByObject))
				return $objUserAccount->ModifiedByObject->__toString();
			else
				return null;
		}


		protected function dtgUserAccount_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgUserAccount->TotalItemCount = UserAccount::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgUserAccount->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgUserAccount->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all UserAccount objects, given the clauses above
			$this->dtgUserAccount->DataSource = UserAccount::LoadAll($objClauses);
		}
	}
?>