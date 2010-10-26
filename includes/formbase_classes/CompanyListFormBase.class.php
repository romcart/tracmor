<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Company class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Company objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this CompanyListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class CompanyListFormBase extends QForm {
		protected $dtgCompany;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colCompanyId;
		protected $colAddressId;
		protected $colShortDescription;
		protected $colWebsite;
		protected $colTelephone;
		protected $colFax;
		protected $colEmail;
		protected $colLongDescription;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colCompanyCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgCompany_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colCompanyId = new QDataGridColumn(QApplication::Translate('Company Id'), '<?= $_ITEM->CompanyId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->CompanyId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->CompanyId, false)));
			$this->colAddressId = new QDataGridColumn(QApplication::Translate('Address Id'), '<?= $_FORM->dtgCompany_Address_Render($_ITEM); ?>');
			$this->colShortDescription = new QDataGridColumn(QApplication::Translate('Short Description'), '<?= QString::Truncate($_ITEM->ShortDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->ShortDescription, false)));
			$this->colWebsite = new QDataGridColumn(QApplication::Translate('Website'), '<?= QString::Truncate($_ITEM->Website, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->Website), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->Website, false)));
			$this->colTelephone = new QDataGridColumn(QApplication::Translate('Telephone'), '<?= QString::Truncate($_ITEM->Telephone, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->Telephone), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->Telephone, false)));
			$this->colFax = new QDataGridColumn(QApplication::Translate('Fax'), '<?= QString::Truncate($_ITEM->Fax, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->Fax), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->Fax, false)));
			$this->colEmail = new QDataGridColumn(QApplication::Translate('Email'), '<?= QString::Truncate($_ITEM->Email, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->Email), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->Email, false)));
			$this->colLongDescription = new QDataGridColumn(QApplication::Translate('Long Description'), '<?= QString::Truncate($_ITEM->LongDescription, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->LongDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->LongDescription, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgCompany_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgCompany_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgCompany_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Company()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Company()->ModifiedDate, false)));
			$this->colCompanyCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Company Custom Field Helper'), '<?= $_FORM->dtgCompany_CompanyCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgCompany = new QDataGrid($this);
			$this->dtgCompany->CellSpacing = 0;
			$this->dtgCompany->CellPadding = 4;
			$this->dtgCompany->BorderStyle = QBorderStyle::Solid;
			$this->dtgCompany->BorderWidth = 1;
			$this->dtgCompany->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgCompany->Paginator = new QPaginator($this->dtgCompany);
			$this->dtgCompany->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgCompany->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgCompany->SetDataBinder('dtgCompany_Bind');

			$this->dtgCompany->AddColumn($this->colEditLinkColumn);
			$this->dtgCompany->AddColumn($this->colCompanyId);
			$this->dtgCompany->AddColumn($this->colAddressId);
			$this->dtgCompany->AddColumn($this->colShortDescription);
			$this->dtgCompany->AddColumn($this->colWebsite);
			$this->dtgCompany->AddColumn($this->colTelephone);
			$this->dtgCompany->AddColumn($this->colFax);
			$this->dtgCompany->AddColumn($this->colEmail);
			$this->dtgCompany->AddColumn($this->colLongDescription);
			$this->dtgCompany->AddColumn($this->colCreatedBy);
			$this->dtgCompany->AddColumn($this->colCreationDate);
			$this->dtgCompany->AddColumn($this->colModifiedBy);
			$this->dtgCompany->AddColumn($this->colModifiedDate);
			$this->dtgCompany->AddColumn($this->colCompanyCustomFieldHelper);
		}
		
		public function dtgCompany_EditLinkColumn_Render(Company $objCompany) {
			return sprintf('<a href="company_edit.php?intCompanyId=%s">%s</a>',
				$objCompany->CompanyId, 
				QApplication::Translate('Edit'));
		}

		public function dtgCompany_Address_Render(Company $objCompany) {
			if (!is_null($objCompany->Address))
				return $objCompany->Address->__toString();
			else
				return null;
		}

		public function dtgCompany_CreatedByObject_Render(Company $objCompany) {
			if (!is_null($objCompany->CreatedByObject))
				return $objCompany->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgCompany_CreationDate_Render(Company $objCompany) {
			if (!is_null($objCompany->CreationDate))
				return $objCompany->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgCompany_ModifiedByObject_Render(Company $objCompany) {
			if (!is_null($objCompany->ModifiedByObject))
				return $objCompany->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgCompany_CompanyCustomFieldHelper_Render(Company $objCompany) {
			if (!is_null($objCompany->CompanyCustomFieldHelper))
				return $objCompany->CompanyCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgCompany_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgCompany->TotalItemCount = Company::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgCompany->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgCompany->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Company objects, given the clauses above
			$this->dtgCompany->DataSource = Company::LoadAll($objClauses);
		}
	}
?>