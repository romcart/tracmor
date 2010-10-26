<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Category class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Category objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CategoryListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CategoryListFormBase extends QForm {
		protected $dtgCategory;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colCategoryId;
		protected $colShortDescription;
		protected $colLongDescription;
		protected $colImagePath;
		protected $colAssetFlag;
		protected $colInventoryFlag;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colCategoryCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgCategory_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colCategoryId = new QDataGridColumn(QApplication::Translate('Category Id'), '<?= $_ITEM->CategoryId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->CategoryId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->CategoryId, false)));
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->ShortDescription, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->LongDescription, false)));
			$this->colImagePath = new QDataGridColumn(QApplication::Translate('Image Path'), '<?= QString::Truncate($_ITEM->ImagePath, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->ImagePath), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->ImagePath, false)));
			$this->colAssetFlag = new QDataGridColumn(QApplication::Translate('Asset Flag'), '<?= ($_ITEM->AssetFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->AssetFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->AssetFlag, false)));
			$this->colInventoryFlag = new QDataGridColumn(QApplication::Translate('Inventory Flag'), '<?= ($_ITEM->InventoryFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->InventoryFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->InventoryFlag, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgCategory_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgCategory_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgCategory_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Category()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Category()->ModifiedDate, false)));
			$this->colCategoryCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Category Custom Field Helper'), '<?= $_FORM->dtgCategory_CategoryCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgCategory = new QDataGrid($this);
			$this->dtgCategory->CellSpacing = 0;
			$this->dtgCategory->CellPadding = 4;
			$this->dtgCategory->BorderStyle = QBorderStyle::Solid;
			$this->dtgCategory->BorderWidth = 1;
			$this->dtgCategory->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgCategory->Paginator = new QPaginator($this->dtgCategory);
			$this->dtgCategory->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgCategory->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgCategory->SetDataBinder('dtgCategory_Bind');

			$this->dtgCategory->AddColumn($this->colEditLinkColumn);
			$this->dtgCategory->AddColumn($this->colCategoryId);
			$this->dtgCategory->AddColumn($this->colShortDescription);
			$this->dtgCategory->AddColumn($this->colLongDescription);
			$this->dtgCategory->AddColumn($this->colImagePath);
			$this->dtgCategory->AddColumn($this->colAssetFlag);
			$this->dtgCategory->AddColumn($this->colInventoryFlag);
			$this->dtgCategory->AddColumn($this->colCreatedBy);
			$this->dtgCategory->AddColumn($this->colCreationDate);
			$this->dtgCategory->AddColumn($this->colModifiedBy);
			$this->dtgCategory->AddColumn($this->colModifiedDate);
			$this->dtgCategory->AddColumn($this->colCategoryCustomFieldHelper);
		}
		
		public function dtgCategory_EditLinkColumn_Render(Category $objCategory) {
			return sprintf('<a href="category_edit.php?intCategoryId=%s">%s</a>',
				$objCategory->CategoryId, 
				QApplication::Translate('Edit'));
		}

		public function dtgCategory_CreatedByObject_Render(Category $objCategory) {
			if (!is_null($objCategory->CreatedByObject))
				return $objCategory->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgCategory_CreationDate_Render(Category $objCategory) {
			if (!is_null($objCategory->CreationDate))
				return $objCategory->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgCategory_ModifiedByObject_Render(Category $objCategory) {
			if (!is_null($objCategory->ModifiedByObject))
				return $objCategory->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgCategory_CategoryCustomFieldHelper_Render(Category $objCategory) {
			if (!is_null($objCategory->CategoryCustomFieldHelper))
				return $objCategory->CategoryCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgCategory_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgCategory->TotalItemCount = Category::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgCategory->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgCategory->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Category objects, given the clauses above
			$this->dtgCategory->DataSource = Category::LoadAll($objClauses);
		}
	}
?>