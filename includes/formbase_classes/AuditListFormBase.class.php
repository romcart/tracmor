<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Audit class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Audit objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this AuditListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class AuditListFormBase extends QForm {
		protected $dtgAudit;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colAuditId;
		protected $colEntityQtypeId;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgAudit_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colAuditId = new QDataGridColumn(QApplication::Translate('Audit Id'), '<?= $_ITEM->AuditId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Audit()->AuditId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Audit()->AuditId, false)));
			$this->colEntityQtypeId = new QDataGridColumn(QApplication::Translate('Entity Qtype'), '<?= $_FORM->dtgAudit_EntityQtypeId_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Audit()->EntityQtypeId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Audit()->EntityQtypeId, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgAudit_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgAudit_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Audit()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Audit()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgAudit_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Audit()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Audit()->ModifiedDate, false)));

			// Setup DataGrid
			$this->dtgAudit = new QDataGrid($this);
			$this->dtgAudit->CellSpacing = 0;
			$this->dtgAudit->CellPadding = 4;
			$this->dtgAudit->BorderStyle = QBorderStyle::Solid;
			$this->dtgAudit->BorderWidth = 1;
			$this->dtgAudit->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgAudit->Paginator = new QPaginator($this->dtgAudit);
			$this->dtgAudit->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgAudit->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgAudit->SetDataBinder('dtgAudit_Bind');

			$this->dtgAudit->AddColumn($this->colEditLinkColumn);
			$this->dtgAudit->AddColumn($this->colAuditId);
			$this->dtgAudit->AddColumn($this->colEntityQtypeId);
			$this->dtgAudit->AddColumn($this->colCreatedBy);
			$this->dtgAudit->AddColumn($this->colCreationDate);
			$this->dtgAudit->AddColumn($this->colModifiedBy);
			$this->dtgAudit->AddColumn($this->colModifiedDate);
		}
		
		public function dtgAudit_EditLinkColumn_Render(Audit $objAudit) {
			return sprintf('<a href="audit_edit.php?intAuditId=%s">%s</a>',
				$objAudit->AuditId, 
				QApplication::Translate('Edit'));
		}

		public function dtgAudit_EntityQtypeId_Render(Audit $objAudit) {
			if (!is_null($objAudit->EntityQtypeId))
				return EntityQtype::ToString($objAudit->EntityQtypeId);
			else
				return null;
		}

		public function dtgAudit_CreatedByObject_Render(Audit $objAudit) {
			if (!is_null($objAudit->CreatedByObject))
				return $objAudit->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgAudit_CreationDate_Render(Audit $objAudit) {
			if (!is_null($objAudit->CreationDate))
				return $objAudit->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgAudit_ModifiedByObject_Render(Audit $objAudit) {
			if (!is_null($objAudit->ModifiedByObject))
				return $objAudit->ModifiedByObject->__toString();
			else
				return null;
		}


		protected function dtgAudit_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgAudit->TotalItemCount = Audit::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgAudit->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgAudit->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Audit objects, given the clauses above
			$this->dtgAudit->DataSource = Audit::LoadAll($objClauses);
		}
	}
?>