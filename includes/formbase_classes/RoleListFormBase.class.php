<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Role class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Role objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this RoleListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class RoleListFormBase extends QForm {
		protected $dtgRole;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colRoleId;
		protected $colShortDescription;
		protected $colLongDescription;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgRole_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colRoleId = new QDataGridColumn(QApplication::Translate('Role Id'), '<?= $_ITEM->RoleId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->RoleId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->RoleId, false)));
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->ShortDescription, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->LongDescription, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgRole_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgRole_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgRole_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Role()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Role()->ModifiedDate, false)));

			// Setup DataGrid
			$this->dtgRole = new QDataGrid($this);
			$this->dtgRole->CellSpacing = 0;
			$this->dtgRole->CellPadding = 4;
			$this->dtgRole->BorderStyle = QBorderStyle::Solid;
			$this->dtgRole->BorderWidth = 1;
			$this->dtgRole->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgRole->Paginator = new QPaginator($this->dtgRole);
			$this->dtgRole->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgRole->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgRole->SetDataBinder('dtgRole_Bind');

			$this->dtgRole->AddColumn($this->colEditLinkColumn);
			$this->dtgRole->AddColumn($this->colRoleId);
			$this->dtgRole->AddColumn($this->colShortDescription);
			$this->dtgRole->AddColumn($this->colLongDescription);
			$this->dtgRole->AddColumn($this->colCreatedBy);
			$this->dtgRole->AddColumn($this->colCreationDate);
			$this->dtgRole->AddColumn($this->colModifiedBy);
			$this->dtgRole->AddColumn($this->colModifiedDate);
		}
		
		public function dtgRole_EditLinkColumn_Render(Role $objRole) {
			return sprintf('<a href="role_edit.php?intRoleId=%s">%s</a>',
				$objRole->RoleId, 
				QApplication::Translate('Edit'));
		}

		public function dtgRole_CreatedByObject_Render(Role $objRole) {
			if (!is_null($objRole->CreatedByObject))
				return $objRole->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgRole_CreationDate_Render(Role $objRole) {
			if (!is_null($objRole->CreationDate))
				return $objRole->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgRole_ModifiedByObject_Render(Role $objRole) {
			if (!is_null($objRole->ModifiedByObject))
				return $objRole->ModifiedByObject->__toString();
			else
				return null;
		}


		protected function dtgRole_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgRole->TotalItemCount = Role::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgRole->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgRole->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Role objects, given the clauses above
			$this->dtgRole->DataSource = Role::LoadAll($objClauses);
		}
	}
?>