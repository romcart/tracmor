<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the AssetModel class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of AssetModel objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this AssetModelListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class AssetModelListFormBase extends QForm {
		protected $dtgAssetModel;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colAssetModelId;
		protected $colCategoryId;
		protected $colManufacturerId;
		protected $colAssetModelCode;
		protected $colShortDescription;
		protected $colLongDescription;
		protected $colImagePath;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colAssetModelCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgAssetModel_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colAssetModelId = new QDataGridColumn(QApplication::Translate('Asset Model Id'), '<?= $_ITEM->AssetModelId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->AssetModelId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->AssetModelId, false)));
			$this->colCategoryId = new QDataGridColumn(QApplication::Translate('Category Id'), '<?= $_FORM->dtgAssetModel_Category_Render($_ITEM); ?>');
			$this->colManufacturerId = new QDataGridColumn(QApplication::Translate('Manufacturer Id'), '<?= $_FORM->dtgAssetModel_Manufacturer_Render($_ITEM); ?>');
			$this->colAssetModelCode = new QDataGridColumn(QApplication::Translate('Asset Model Code'), '<?= QString::Truncate($_ITEM->AssetModelCode, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->AssetModelCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->AssetModelCode, false)));
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->ShortDescription, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->LongDescription, false)));
			$this->colImagePath = new QDataGridColumn(QApplication::Translate('Image Path'), '<?= QString::Truncate($_ITEM->ImagePath, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->ImagePath), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->ImagePath, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgAssetModel_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgAssetModel_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgAssetModel_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::AssetModel()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::AssetModel()->ModifiedDate, false)));
			$this->colAssetModelCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Asset Model Custom Field Helper'), '<?= $_FORM->dtgAssetModel_AssetModelCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgAssetModel = new QDataGrid($this);
			$this->dtgAssetModel->CellSpacing = 0;
			$this->dtgAssetModel->CellPadding = 4;
			$this->dtgAssetModel->BorderStyle = QBorderStyle::Solid;
			$this->dtgAssetModel->BorderWidth = 1;
			$this->dtgAssetModel->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgAssetModel->Paginator = new QPaginator($this->dtgAssetModel);
			$this->dtgAssetModel->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgAssetModel->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgAssetModel->SetDataBinder('dtgAssetModel_Bind');

			$this->dtgAssetModel->AddColumn($this->colEditLinkColumn);
			$this->dtgAssetModel->AddColumn($this->colAssetModelId);
			$this->dtgAssetModel->AddColumn($this->colCategoryId);
			$this->dtgAssetModel->AddColumn($this->colManufacturerId);
			$this->dtgAssetModel->AddColumn($this->colAssetModelCode);
			$this->dtgAssetModel->AddColumn($this->colShortDescription);
			$this->dtgAssetModel->AddColumn($this->colLongDescription);
			$this->dtgAssetModel->AddColumn($this->colImagePath);
			$this->dtgAssetModel->AddColumn($this->colCreatedBy);
			$this->dtgAssetModel->AddColumn($this->colCreationDate);
			$this->dtgAssetModel->AddColumn($this->colModifiedBy);
			$this->dtgAssetModel->AddColumn($this->colModifiedDate);
			$this->dtgAssetModel->AddColumn($this->colAssetModelCustomFieldHelper);
		}
		
		public function dtgAssetModel_EditLinkColumn_Render(AssetModel $objAssetModel) {
			return sprintf('<a href="asset_model_edit.php?intAssetModelId=%s">%s</a>',
				$objAssetModel->AssetModelId, 
				QApplication::Translate('Edit'));
		}

		public function dtgAssetModel_Category_Render(AssetModel $objAssetModel) {
			if (!is_null($objAssetModel->Category))
				return $objAssetModel->Category->__toString();
			else
				return null;
		}

		public function dtgAssetModel_Manufacturer_Render(AssetModel $objAssetModel) {
			if (!is_null($objAssetModel->Manufacturer))
				return $objAssetModel->Manufacturer->__toString();
			else
				return null;
		}

		public function dtgAssetModel_CreatedByObject_Render(AssetModel $objAssetModel) {
			if (!is_null($objAssetModel->CreatedByObject))
				return $objAssetModel->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgAssetModel_CreationDate_Render(AssetModel $objAssetModel) {
			if (!is_null($objAssetModel->CreationDate))
				return $objAssetModel->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgAssetModel_ModifiedByObject_Render(AssetModel $objAssetModel) {
			if (!is_null($objAssetModel->ModifiedByObject))
				return $objAssetModel->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgAssetModel_AssetModelCustomFieldHelper_Render(AssetModel $objAssetModel) {
			if (!is_null($objAssetModel->AssetModelCustomFieldHelper))
				return $objAssetModel->AssetModelCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgAssetModel_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgAssetModel->TotalItemCount = AssetModel::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgAssetModel->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgAssetModel->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all AssetModel objects, given the clauses above
			$this->dtgAssetModel->DataSource = AssetModel::LoadAll($objClauses);
		}
	}
?>