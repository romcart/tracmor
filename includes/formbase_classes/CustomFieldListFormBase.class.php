<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the CustomField class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of CustomField objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CustomFieldListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CustomFieldListFormBase extends QForm {
		protected $dtgCustomField;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colCustomFieldId;
		protected $colCustomFieldQtypeId;
		protected $colDefaultCustomFieldValueId;
		protected $colShortDescription;
		protected $colActiveFlag;
		protected $colRequiredFlag;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgCustomField_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colCustomFieldId = new QDataGridColumn(QApplication::Translate('Custom Field Id'), '<?= $_ITEM->CustomFieldId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->CustomFieldId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CustomFieldId, false)));
			$this->colCustomFieldQtypeId = new QDataGridColumn(QApplication::Translate('Custom Field Qtype'), '<?= $_FORM->dtgCustomField_CustomFieldQtypeId_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->CustomFieldQtypeId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CustomFieldQtypeId, false)));
			$this->colDefaultCustomFieldValueId = new QDataGridColumn(QApplication::Translate('Default Custom Field Value Id'), '<?= $_FORM->dtgCustomField_DefaultCustomFieldValue_Render($_ITEM); ?>');
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->ShortDescription, false)));
			$this->colActiveFlag = new QDataGridColumn(QApplication::Translate('Active Flag'), '<?= ($_ITEM->ActiveFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->ActiveFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->ActiveFlag, false)));
			$this->colRequiredFlag = new QDataGridColumn(QApplication::Translate('Required Flag'), '<?= ($_ITEM->RequiredFlag) ? "true" : "false" ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->RequiredFlag), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->RequiredFlag, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgCustomField_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgCustomField_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgCustomField_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomField()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomField()->ModifiedDate, false)));

			// Setup DataGrid
			$this->dtgCustomField = new QDataGrid($this);
			$this->dtgCustomField->CellSpacing = 0;
			$this->dtgCustomField->CellPadding = 4;
			$this->dtgCustomField->BorderStyle = QBorderStyle::Solid;
			$this->dtgCustomField->BorderWidth = 1;
			$this->dtgCustomField->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgCustomField->Paginator = new QPaginator($this->dtgCustomField);
			$this->dtgCustomField->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgCustomField->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgCustomField->SetDataBinder('dtgCustomField_Bind');

			$this->dtgCustomField->AddColumn($this->colEditLinkColumn);
			$this->dtgCustomField->AddColumn($this->colCustomFieldId);
			$this->dtgCustomField->AddColumn($this->colCustomFieldQtypeId);
			$this->dtgCustomField->AddColumn($this->colDefaultCustomFieldValueId);
			$this->dtgCustomField->AddColumn($this->colShortDescription);
			$this->dtgCustomField->AddColumn($this->colActiveFlag);
			$this->dtgCustomField->AddColumn($this->colRequiredFlag);
			$this->dtgCustomField->AddColumn($this->colCreatedBy);
			$this->dtgCustomField->AddColumn($this->colCreationDate);
			$this->dtgCustomField->AddColumn($this->colModifiedBy);
			$this->dtgCustomField->AddColumn($this->colModifiedDate);
		}
		
		public function dtgCustomField_EditLinkColumn_Render(CustomField $objCustomField) {
			return sprintf('<a href="custom_field_edit.php?intCustomFieldId=%s">%s</a>',
				$objCustomField->CustomFieldId, 
				QApplication::Translate('Edit'));
		}

		public function dtgCustomField_CustomFieldQtypeId_Render(CustomField $objCustomField) {
			if (!is_null($objCustomField->CustomFieldQtypeId))
				return CustomFieldQtype::ToString($objCustomField->CustomFieldQtypeId);
			else
				return null;
		}

		public function dtgCustomField_DefaultCustomFieldValue_Render(CustomField $objCustomField) {
			if (!is_null($objCustomField->DefaultCustomFieldValue))
				return $objCustomField->DefaultCustomFieldValue->__toString();
			else
				return null;
		}

		public function dtgCustomField_CreatedByObject_Render(CustomField $objCustomField) {
			if (!is_null($objCustomField->CreatedByObject))
				return $objCustomField->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgCustomField_CreationDate_Render(CustomField $objCustomField) {
			if (!is_null($objCustomField->CreationDate))
				return $objCustomField->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgCustomField_ModifiedByObject_Render(CustomField $objCustomField) {
			if (!is_null($objCustomField->ModifiedByObject))
				return $objCustomField->ModifiedByObject->__toString();
			else
				return null;
		}


		protected function dtgCustomField_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgCustomField->TotalItemCount = CustomField::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgCustomField->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgCustomField->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all CustomField objects, given the clauses above
			$this->dtgCustomField->DataSource = CustomField::LoadAll($objClauses);
		}
	}
?>