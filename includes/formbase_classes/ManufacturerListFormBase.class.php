<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Manufacturer class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Manufacturer objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ManufacturerListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ManufacturerListFormBase extends QForm {
		protected $dtgManufacturer;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colManufacturerId;
		protected $colShortDescription;
		protected $colLongDescription;
		protected $colImagePath;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colManufacturerCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgManufacturer_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colManufacturerId = new QDataGridColumn(QApplication::Translate('Manufacturer Id'), '<?= $_ITEM->ManufacturerId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ManufacturerId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ManufacturerId, false)));
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ShortDescription, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->LongDescription, false)));
			$this->colImagePath = new QDataGridColumn(QApplication::Translate('Image Path'), '<?= QString::Truncate($_ITEM->ImagePath, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ImagePath), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ImagePath, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgManufacturer_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgManufacturer_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgManufacturer_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Manufacturer()->ModifiedDate, false)));
			$this->colManufacturerCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Manufacturer Custom Field Helper'), '<?= $_FORM->dtgManufacturer_ManufacturerCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgManufacturer = new QDataGrid($this);
			$this->dtgManufacturer->CellSpacing = 0;
			$this->dtgManufacturer->CellPadding = 4;
			$this->dtgManufacturer->BorderStyle = QBorderStyle::Solid;
			$this->dtgManufacturer->BorderWidth = 1;
			$this->dtgManufacturer->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgManufacturer->Paginator = new QPaginator($this->dtgManufacturer);
			$this->dtgManufacturer->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgManufacturer->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgManufacturer->SetDataBinder('dtgManufacturer_Bind');

			$this->dtgManufacturer->AddColumn($this->colEditLinkColumn);
			$this->dtgManufacturer->AddColumn($this->colManufacturerId);
			$this->dtgManufacturer->AddColumn($this->colShortDescription);
			$this->dtgManufacturer->AddColumn($this->colLongDescription);
			$this->dtgManufacturer->AddColumn($this->colImagePath);
			$this->dtgManufacturer->AddColumn($this->colCreatedBy);
			$this->dtgManufacturer->AddColumn($this->colCreationDate);
			$this->dtgManufacturer->AddColumn($this->colModifiedBy);
			$this->dtgManufacturer->AddColumn($this->colModifiedDate);
			$this->dtgManufacturer->AddColumn($this->colManufacturerCustomFieldHelper);
		}
		
		public function dtgManufacturer_EditLinkColumn_Render(Manufacturer $objManufacturer) {
			return sprintf('<a href="manufacturer_edit.php?intManufacturerId=%s">%s</a>',
				$objManufacturer->ManufacturerId, 
				QApplication::Translate('Edit'));
		}

		public function dtgManufacturer_CreatedByObject_Render(Manufacturer $objManufacturer) {
			if (!is_null($objManufacturer->CreatedByObject))
				return $objManufacturer->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgManufacturer_CreationDate_Render(Manufacturer $objManufacturer) {
			if (!is_null($objManufacturer->CreationDate))
				return $objManufacturer->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgManufacturer_ModifiedByObject_Render(Manufacturer $objManufacturer) {
			if (!is_null($objManufacturer->ModifiedByObject))
				return $objManufacturer->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgManufacturer_ManufacturerCustomFieldHelper_Render(Manufacturer $objManufacturer) {
			if (!is_null($objManufacturer->ManufacturerCustomFieldHelper))
				return $objManufacturer->ManufacturerCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgManufacturer_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgManufacturer->TotalItemCount = Manufacturer::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgManufacturer->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgManufacturer->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Manufacturer objects, given the clauses above
			$this->dtgManufacturer->DataSource = Manufacturer::LoadAll($objClauses);
		}
	}
?>