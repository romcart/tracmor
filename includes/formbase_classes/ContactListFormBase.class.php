<?php
	/**
	 * This is the abstract Form class for the List All functionality
	 * of the Contact class.  This code-generated class
	 * contains a Qform datagrid to display an HTML page that can
	 * list a collection of Contact objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new Form which extends this ContactListFormBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage FormBaseObjects
	 * 
	 */
	abstract class ContactListFormBase extends QForm {
		protected $dtgContact;

		// DataGrid Columns
		protected $colEditLinkColumn;
		protected $colContactId;
		protected $colCompanyId;
		protected $colAddressId;
		protected $colFirstName;
		protected $colLastName;
		protected $colTitle;
		protected $colEmail;
		protected $colPhoneOffice;
		protected $colPhoneHome;
		protected $colPhoneMobile;
		protected $colFax;
		protected $colDescription;
		protected $colCreatedBy;
		protected $colCreationDate;
		protected $colModifiedBy;
		protected $colModifiedDate;
		protected $colContactCustomFieldHelper;


		protected function Form_Create() {
			// Setup DataGrid Columns
			$this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgContact_EditLinkColumn_Render($_ITEM) ?>');
			$this->colEditLinkColumn->HtmlEntities = false;
			$this->colContactId = new QDataGridColumn(QApplication::Translate('Contact Id'), '<?= $_ITEM->ContactId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->ContactId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->ContactId, false)));
			$this->colCompanyId = new QDataGridColumn(QApplication::Translate('Company Id'), '<?= $_FORM->dtgContact_Company_Render($_ITEM); ?>');
			$this->colAddressId = new QDataGridColumn(QApplication::Translate('Address Id'), '<?= $_FORM->dtgContact_Address_Render($_ITEM); ?>');
			$this->colFirstName = new QDataGridColumn(QApplication::Translate('First Name'), '<?= QString::Truncate($_ITEM->FirstName, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->FirstName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->FirstName, false)));
			$this->colLastName = new QDataGridColumn(QApplication::Translate('Last Name'), '<?= QString::Truncate($_ITEM->LastName, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->LastName, false)));
			$this->colTitle = new QDataGridColumn(QApplication::Translate('Title'), '<?= QString::Truncate($_ITEM->Title, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->Title), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->Title, false)));
			$this->colEmail = new QDataGridColumn(QApplication::Translate('Email'), '<?= QString::Truncate($_ITEM->Email, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->Email), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->Email, false)));
			$this->colPhoneOffice = new QDataGridColumn(QApplication::Translate('Phone Office'), '<?= QString::Truncate($_ITEM->PhoneOffice, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->PhoneOffice), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->PhoneOffice, false)));
			$this->colPhoneHome = new QDataGridColumn(QApplication::Translate('Phone Home'), '<?= QString::Truncate($_ITEM->PhoneHome, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->PhoneHome), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->PhoneHome, false)));
			$this->colPhoneMobile = new QDataGridColumn(QApplication::Translate('Phone Mobile'), '<?= QString::Truncate($_ITEM->PhoneMobile, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->PhoneMobile), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->PhoneMobile, false)));
			$this->colFax = new QDataGridColumn(QApplication::Translate('Fax'), '<?= QString::Truncate($_ITEM->Fax, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->Fax), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->Fax, false)));
			$this->colDescription = new QDataGridColumn(QApplication::Translate('Description'), '<?= QString::Truncate($_ITEM->Description, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->Description), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->Description, false)));
			$this->colCreatedBy = new QDataGridColumn(QApplication::Translate('Created By'), '<?= $_FORM->dtgContact_CreatedByObject_Render($_ITEM); ?>');
			$this->colCreationDate = new QDataGridColumn(QApplication::Translate('Creation Date'), '<?= $_FORM->dtgContact_CreationDate_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->CreationDate, false)));
			$this->colModifiedBy = new QDataGridColumn(QApplication::Translate('Modified By'), '<?= $_FORM->dtgContact_ModifiedByObject_Render($_ITEM); ?>');
			$this->colModifiedDate = new QDataGridColumn(QApplication::Translate('Modified Date'), '<?= QString::Truncate($_ITEM->ModifiedDate, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::Contact()->ModifiedDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Contact()->ModifiedDate, false)));
			$this->colContactCustomFieldHelper = new QDataGridColumn(QApplication::Translate('Contact Custom Field Helper'), '<?= $_FORM->dtgContact_ContactCustomFieldHelper_Render($_ITEM); ?>');

			// Setup DataGrid
			$this->dtgContact = new QDataGrid($this);
			$this->dtgContact->CellSpacing = 0;
			$this->dtgContact->CellPadding = 4;
			$this->dtgContact->BorderStyle = QBorderStyle::Solid;
			$this->dtgContact->BorderWidth = 1;
			$this->dtgContact->GridLines = QGridLines::Both;

			// Datagrid Paginator
			$this->dtgContact->Paginator = new QPaginator($this->dtgContact);
			$this->dtgContact->ItemsPerPage = 10;

			// Specify Whether or Not to Refresh using Ajax
			$this->dtgContact->UseAjax = false;

			// Specify the local databind method this datagrid will use
			$this->dtgContact->SetDataBinder('dtgContact_Bind');

			$this->dtgContact->AddColumn($this->colEditLinkColumn);
			$this->dtgContact->AddColumn($this->colContactId);
			$this->dtgContact->AddColumn($this->colCompanyId);
			$this->dtgContact->AddColumn($this->colAddressId);
			$this->dtgContact->AddColumn($this->colFirstName);
			$this->dtgContact->AddColumn($this->colLastName);
			$this->dtgContact->AddColumn($this->colTitle);
			$this->dtgContact->AddColumn($this->colEmail);
			$this->dtgContact->AddColumn($this->colPhoneOffice);
			$this->dtgContact->AddColumn($this->colPhoneHome);
			$this->dtgContact->AddColumn($this->colPhoneMobile);
			$this->dtgContact->AddColumn($this->colFax);
			$this->dtgContact->AddColumn($this->colDescription);
			$this->dtgContact->AddColumn($this->colCreatedBy);
			$this->dtgContact->AddColumn($this->colCreationDate);
			$this->dtgContact->AddColumn($this->colModifiedBy);
			$this->dtgContact->AddColumn($this->colModifiedDate);
			$this->dtgContact->AddColumn($this->colContactCustomFieldHelper);
		}
		
		public function dtgContact_EditLinkColumn_Render(Contact $objContact) {
			return sprintf('<a href="contact_edit.php?intContactId=%s">%s</a>',
				$objContact->ContactId, 
				QApplication::Translate('Edit'));
		}

		public function dtgContact_Company_Render(Contact $objContact) {
			if (!is_null($objContact->Company))
				return $objContact->Company->__toString();
			else
				return null;
		}

		public function dtgContact_Address_Render(Contact $objContact) {
			if (!is_null($objContact->Address))
				return $objContact->Address->__toString();
			else
				return null;
		}

		public function dtgContact_CreatedByObject_Render(Contact $objContact) {
			if (!is_null($objContact->CreatedByObject))
				return $objContact->CreatedByObject->__toString();
			else
				return null;
		}

		public function dtgContact_CreationDate_Render(Contact $objContact) {
			if (!is_null($objContact->CreationDate))
				return $objContact->CreationDate->__toString(QDateTime::FormatDisplayDateTime);
			else
				return null;
		}

		public function dtgContact_ModifiedByObject_Render(Contact $objContact) {
			if (!is_null($objContact->ModifiedByObject))
				return $objContact->ModifiedByObject->__toString();
			else
				return null;
		}

		public function dtgContact_ContactCustomFieldHelper_Render(Contact $objContact) {
			if (!is_null($objContact->ContactCustomFieldHelper))
				return $objContact->ContactCustomFieldHelper->__toString();
			else
				return null;
		}


		protected function dtgContact_Bind() {
			// Because we want to enable pagination AND sorting, we need to setup the $objClauses array to send to LoadAll()

			// Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
			$this->dtgContact->TotalItemCount = Contact::CountAll();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgContact->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgContact->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be the array of all Contact objects, given the clauses above
			$this->dtgContact->DataSource = Contact::LoadAll($objClauses);
		}
	}
?>