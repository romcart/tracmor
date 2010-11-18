<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the InventoryModel class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of InventoryModel objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this InventoryModelListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class InventoryModelListFormBase extends QForm {
		protected $dtgInventoryModel;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colInventoryModelId;
		protected $colCategoryId;
		protected $colManufacturerId;
		protected $colInventoryModelCode;
		protected $colShortDescription;
		protected $colLongDescription;
		protected $colImagePath;
		protected $colPrice;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colInventoryModelCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgInventoryModel_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colInventoryModelId = new QDataGridColumn(QApplication::Translate('Inventory Model Id'), '<?= $_ITEM->InventoryModelId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->InventoryModelId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->InventoryModelId, false)));
			$this->colCategoryId = new QDataGridColumn(QApplication::Translate('Category Id'), '<?= $_FORM->dtgInventoryModel_Category_Render($_ITEM); ?>');
			$this->colManufacturerId = new QDataGridColumn(QApplication::Translate('Manufacturer Id'), '<?= $_FORM->dtgInventoryModel_Manufacturer_Render($_ITEM); ?>');
			$this->colInventoryModelCode = new QDataGridColumn(QApplication::Translate('Inventory Model Code'), '<?= QString::Truncate($_ITEM->InventoryModelCode, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->InventoryModelCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->InventoryModelCode, false)));
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->ShortDescription, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->LongDescription, false)));
			$this->colImagePath = new QDataGridColumn(QApplication::Translate('Image Path'), '<?= QString::Truncate($_ITEM->ImagePath, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->ImagePath), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->ImagePath, false)));
			$this->colPrice = new QDataGridColumn(QApplication::Translate('Price'), '<?= $_ITEM->Price; ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->Price), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->Price, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgInventoryModel_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgInventoryModel_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgInventoryModel_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::InventoryModel()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::InventoryModel()->ModifiedDate, false)));
			$this->colInventoryModelCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Inventory Model Custom Field Helper'), '<?= $_FORM->dtgInventoryModel_InventoryModelCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgInventoryModel = new QDataGrid($this);
			$this->dtgInventoryModel->CellSpacing = 0;
			$this->dtgInventoryModel->CellPadding = 4;
			$this->dtgInventoryModel->BorderStyle = QBorderStyle::Solid;
			$this->dtgInventoryModel->BorderWidth = 1;
			$this->dtgInventoryModel->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgInventoryModel->Paginator = new QPaginator($this->dtgInventoryModel);
			$this->dtgInventoryModel->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgInventoryModel->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgInventoryModel->SetDataBinder('dtgInventoryModel_Bind');

			$this->dtgInventoryModel->AddColumn($this->colEditLinkColumn);
			$this->dtgInventoryModel->AddColumn($this->colInventoryModelId);
			$this->dtgInventoryModel->AddColumn($this->colCategoryId);
			$this->dtgInventoryModel->AddColumn($this->colManufacturerId);
			$this->dtgInventoryModel->AddColumn($this->colInventoryModelCode);
			$this->dtgInventoryModel->AddColumn($this->colShortDescription);
			$this->dtgInventoryModel->AddColumn($this->colLongDescription);
			$this->dtgInventoryModel->AddColumn($this->colImagePath);
			$this->dtgInventoryModel->AddColumn($this->colPrice);
			$this->dtgInventoryModel->AddColumn($this->colCreatedBy);
			$this->dtgInventoryModel->AddColumn($this->colCreationDate);
			$this->dtgInventoryModel->AddColumn($this->colModifiedBy);
			$this->dtgInventoryModel->AddColumn($this->colModifiedDate);
			$this->dtgInventoryModel->AddColumn($this->colInventoryModelCustomFieldHelper);
		}
		
		public function dtgInventoryModel_EditLinkColumn_Render(InventoryModel $objInventoryModel) {
			return sprintf('<a href="inventory_model_edit.php?intInventoryModelId=%s">%s</a>',
				$objInventoryModel->InventoryModelId, 
				QApplication::Translate('Edit'));
		}

		public function dtgInventoryModel_Category_Render(InventoryModel $objInventoryModel) {
			if (!is_null($objInventoryModel->Category))
				return $objInventoryModel->Category->__toString();
			else
				return null;
		}

		public function dtgInventoryModel_Manufacturer_Render(InventoryModel $objInventoryModel) {
			if (!is_null($objInventoryModel->Manufacturer))
				return $objInventoryModel->Manufacturer->__toString();
			else
				return null;
		}

		public function dtgInventoryModel_CreatedByObject_Render(InventoryModel $objInventoryModel) {
			if (!is_null($objInventoryModel->CreatedByObject))
				return $objInventoryModel->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgInventoryModel_CreationDate_Render(InventoryModel $objInventoryModel) {
			if (!is_null($objInventoryModel->CreationDate))
				return $objInventoryModel->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgInventoryModel_ModifiedByObject_Render(InventoryModel $objInventoryModel) {
			if (!is_null($objInventoryModel->ModifiedByObject))
				return $objInventoryModel->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgInventoryModel_InventoryModelCustomFieldHelper_Render(InventoryModel $objInventoryModel) {
			if (!is_null($objInventoryModel->InventoryModelCustomFieldHelper))
				return $objInventoryModel->InventoryModelCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgInventoryModel_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgInventoryModel->TotalItemCount = InventoryModel::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgInventoryModel->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgInventoryModel->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all InventoryModel objects, given the clauses above
			$this->dtgInventoryModel->DataSource = InventoryModel::LoadAll($objClauses);
		}
	}
?>