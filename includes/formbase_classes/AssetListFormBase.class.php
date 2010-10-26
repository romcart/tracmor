<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Asset class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Asset objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this AssetListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class AssetListFormBase extends QForm {
		protected $dtgAsset;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colAssetId;
		protected $colParentAssetId;
		protected $colAssetModelId;
		protected $colLocationId;
		protected $colAssetCode;
		protected $colImagePath;
		protected $colCheckedOutFlag;
		protected $colReservedFlag;
		protected $colLinkedFlag;
		protected $colArchivedFlag;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colAssetCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgAsset_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colAssetId = new QDataGridColumn(QApplication::Translate('Asset Id'), '<?= $_ITEM->AssetId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->AssetId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->AssetId, false)));
			$this->colParentAssetId = new QDataGridColumn(QApplication::Translate('Parent Asset Id'), '<?= $_FORM->dtgAsset_ParentAsset_Render($_ITEM); ?>');
			$this->colAssetModelId = new QDataGridColumn(QApplication::Translate('Asset Model Id'), '<?= $_FORM->dtgAsset_AssetModel_Render($_ITEM); ?>');
			$this->colLocationId = new QDataGridColumn(QApplication::Translate('Location Id'), '<?= $_FORM->dtgAsset_Location_Render($_ITEM); ?>');
			$this->colAssetCode = new QDataGridColumn(QApplication::Translate('Asset Code'), '<?= QString::Truncate($_ITEM->AssetCode, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->AssetCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->AssetCode, false)));
			$this->colImagePath = new QDataGridColumn(QApplication::Translate('Image Path'), '<?= QString::Truncate($_ITEM->ImagePath, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->ImagePath), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->ImagePath, false)));
			$this->colCheckedOutFlag = new QDataGridColumn(QApplication::Translate('Checked Out Flag'), '<?= ($_ITEM->CheckedOutFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->CheckedOutFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->CheckedOutFlag, false)));
			$this->colReservedFlag = new QDataGridColumn(QApplication::Translate('Reserved Flag'), '<?= ($_ITEM->ReservedFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->ReservedFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->ReservedFlag, false)));
			$this->colLinkedFlag = new QDataGridColumn(QApplication::Translate('Linked Flag'), '<?= ($_ITEM->LinkedFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->LinkedFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->LinkedFlag, false)));
			$this->colArchivedFlag = new QDataGridColumn(QApplication::Translate('Archived Flag'), '<?= ($_ITEM->ArchivedFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->ArchivedFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->ArchivedFlag, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgAsset_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgAsset_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgAsset_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->ModifiedDate, false)));
			$this->colAssetCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Asset Custom Field Helper'), '<?= $_FORM->dtgAsset_AssetCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgAsset = new QDataGrid($this);
			$this->dtgAsset->CellSpacing = 0;
			$this->dtgAsset->CellPadding = 4;
			$this->dtgAsset->BorderStyle = QBorderStyle::Solid;
			$this->dtgAsset->BorderWidth = 1;
			$this->dtgAsset->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgAsset->Paginator = new QPaginator($this->dtgAsset);
			$this->dtgAsset->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgAsset->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgAsset->SetDataBinder('dtgAsset_Bind');

			$this->dtgAsset->AddColumn($this->colEditLinkColumn);
			$this->dtgAsset->AddColumn($this->colAssetId);
			$this->dtgAsset->AddColumn($this->colParentAssetId);
			$this->dtgAsset->AddColumn($this->colAssetModelId);
			$this->dtgAsset->AddColumn($this->colLocationId);
			$this->dtgAsset->AddColumn($this->colAssetCode);
			$this->dtgAsset->AddColumn($this->colImagePath);
			$this->dtgAsset->AddColumn($this->colCheckedOutFlag);
			$this->dtgAsset->AddColumn($this->colReservedFlag);
			$this->dtgAsset->AddColumn($this->colLinkedFlag);
			$this->dtgAsset->AddColumn($this->colArchivedFlag);
			$this->dtgAsset->AddColumn($this->colCreatedBy);
			$this->dtgAsset->AddColumn($this->colCreationDate);
			$this->dtgAsset->AddColumn($this->colModifiedBy);
			$this->dtgAsset->AddColumn($this->colModifiedDate);
			$this->dtgAsset->AddColumn($this->colAssetCustomFieldHelper);
		}
		
		public function dtgAsset_EditLinkColumn_Render(Asset $objAsset) {
			return sprintf('<a href="asset_edit.php?intAssetId=%s">%s</a>',
				$objAsset->AssetId, 
				QApplication::Translate('Edit'));
		}

		public function dtgAsset_ParentAsset_Render(Asset $objAsset) {
			if (!is_null($objAsset->ParentAsset))
				return $objAsset->ParentAsset->__toString();
			else
				return null;
		}

		public function dtgAsset_AssetModel_Render(Asset $objAsset) {
			if (!is_null($objAsset->AssetModel))
				return $objAsset->AssetModel->__toString();
			else
				return null;
		}

		public function dtgAsset_Location_Render(Asset $objAsset) {
			if (!is_null($objAsset->Location))
				return $objAsset->Location->__toString();
			else
				return null;
		}

		public function dtgAsset_CreatedByObject_Render(Asset $objAsset) {
			if (!is_null($objAsset->CreatedByObject))
				return $objAsset->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgAsset_CreationDate_Render(Asset $objAsset) {
			if (!is_null($objAsset->CreationDate))
				return $objAsset->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgAsset_ModifiedByObject_Render(Asset $objAsset) {
			if (!is_null($objAsset->ModifiedByObject))
				return $objAsset->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgAsset_AssetCustomFieldHelper_Render(Asset $objAsset) {
			if (!is_null($objAsset->AssetCustomFieldHelper))
				return $objAsset->AssetCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgAsset_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgAsset->TotalItemCount = Asset::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgAsset->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgAsset->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Asset objects, given the clauses above
			$this->dtgAsset->DataSource = Asset::LoadAll($objClauses);
		}
	}
?>