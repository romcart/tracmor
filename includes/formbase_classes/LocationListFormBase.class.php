<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Location class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Location objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this LocationListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class LocationListFormBase extends QForm {
		protected $dtgLocation;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colLocationId;
		protected $colShortDescription;
		protected $colLongDescription;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgLocation_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colLocationId = new QDataGridColumn(QApplication::Translate('Location Id'), '<?= $_ITEM->LocationId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->LocationId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->LocationId, false)));
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->ShortDescription, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->LongDescription, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgLocation_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgLocation_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgLocation_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Location()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Location()->ModifiedDate, false)));

			// Setup DataGrid
			$this->dtgLocation = new QDataGrid($this);
			$this->dtgLocation->CellSpacing = 0;
			$this->dtgLocation->CellPadding = 4;
			$this->dtgLocation->BorderStyle = QBorderStyle::Solid;
			$this->dtgLocation->BorderWidth = 1;
			$this->dtgLocation->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgLocation->Paginator = new QPaginator($this->dtgLocation);
			$this->dtgLocation->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgLocation->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgLocation->SetDataBinder('dtgLocation_Bind');

			$this->dtgLocation->AddColumn($this->colEditLinkColumn);
			$this->dtgLocation->AddColumn($this->colLocationId);
			$this->dtgLocation->AddColumn($this->colShortDescription);
			$this->dtgLocation->AddColumn($this->colLongDescription);
			$this->dtgLocation->AddColumn($this->colCreatedBy);
			$this->dtgLocation->AddColumn($this->colCreationDate);
			$this->dtgLocation->AddColumn($this->colModifiedBy);
			$this->dtgLocation->AddColumn($this->colModifiedDate);
		}
		
		public function dtgLocation_EditLinkColumn_Render(Location $objLocation) {
			return sprintf('<a href="location_edit.php?intLocationId=%s">%s</a>',
				$objLocation->LocationId, 
				QApplication::Translate('Edit'));
		}

		public function dtgLocation_CreatedByObject_Render(Location $objLocation) {
			if (!is_null($objLocation->CreatedByObject))
				return $objLocation->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgLocation_CreationDate_Render(Location $objLocation) {
			if (!is_null($objLocation->CreationDate))
				return $objLocation->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgLocation_ModifiedByObject_Render(Location $objLocation) {
			if (!is_null($objLocation->ModifiedByObject))
				return $objLocation->ModifiedByObject->__toString();
			else
				return null;
		}


		protected function dtgLocation_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgLocation->TotalItemCount = Location::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgLocation->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgLocation->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Location objects, given the clauses above
			$this->dtgLocation->DataSource = Location::LoadAll($objClauses);
		}
	}
?>