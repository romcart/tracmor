<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DatagridColumnPreference class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DatagridColumnPreference object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DatagridColumnPreferenceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DatagridColumnPreference $DatagridColumnPreference the actual DatagridColumnPreference data class being edited
	 * property QLabel $DatagridColumnPreferenceIdControl
	 * property-read QLabel $DatagridColumnPreferenceIdLabel
	 * property QListBox $DatagridIdControl
	 * property-read QLabel $DatagridIdLabel
	 * property QTextBox $ColumnNameControl
	 * property-read QLabel $ColumnNameLabel
	 * property QListBox $UserAccountIdControl
	 * property-read QLabel $UserAccountIdLabel
	 * property QCheckBox $DisplayFlagControl
	 * property-read QLabel $DisplayFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DatagridColumnPreferenceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DatagridColumnPreference objDatagridColumnPreference
		 * @access protected
		 */
		protected $objDatagridColumnPreference;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of DatagridColumnPreference's individual data fields
        /**
         * @var QLabel lblDatagridColumnPreferenceId;
         * @access protected
         */
		protected $lblDatagridColumnPreferenceId;

        /**
         * @var QListBox lstDatagrid;
         * @access protected
         */
		protected $lstDatagrid;

        /**
         * @var QTextBox txtColumnName;
         * @access protected
         */
		protected $txtColumnName;

        /**
         * @var QListBox lstUserAccount;
         * @access protected
         */
		protected $lstUserAccount;

        /**
         * @var QCheckBox chkDisplayFlag;
         * @access protected
         */
		protected $chkDisplayFlag;


		// Controls that allow the viewing of DatagridColumnPreference's individual data fields
        /**
         * @var QLabel lblDatagridId
         * @access protected
         */
		protected $lblDatagridId;

        /**
         * @var QLabel lblColumnName
         * @access protected
         */
		protected $lblColumnName;

        /**
         * @var QLabel lblUserAccountId
         * @access protected
         */
		protected $lblUserAccountId;

        /**
         * @var QLabel lblDisplayFlag
         * @access protected
         */
		protected $lblDisplayFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DatagridColumnPreferenceMetaControl to edit a single DatagridColumnPreference object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DatagridColumnPreference object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridColumnPreferenceMetaControl
		 * @param DatagridColumnPreference $objDatagridColumnPreference new or existing DatagridColumnPreference object
		 */
		 public function __construct($objParentObject, DatagridColumnPreference $objDatagridColumnPreference) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DatagridColumnPreferenceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DatagridColumnPreference object
			$this->objDatagridColumnPreference = $objDatagridColumnPreference;

			// Figure out if we're Editing or Creating New
			if ($this->objDatagridColumnPreference->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridColumnPreferenceMetaControl
		 * @param integer $intDatagridColumnPreferenceId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DatagridColumnPreference object creation - defaults to CreateOrEdit
 		 * @return DatagridColumnPreferenceMetaControl
		 */
		public static function Create($objParentObject, $intDatagridColumnPreferenceId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intDatagridColumnPreferenceId)) {
				$objDatagridColumnPreference = DatagridColumnPreference::Load($intDatagridColumnPreferenceId);

				// DatagridColumnPreference was found -- return it!
				if ($objDatagridColumnPreference)
					return new DatagridColumnPreferenceMetaControl($objParentObject, $objDatagridColumnPreference);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DatagridColumnPreference object with PK arguments: ' . $intDatagridColumnPreferenceId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DatagridColumnPreferenceMetaControl($objParentObject, new DatagridColumnPreference());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridColumnPreferenceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DatagridColumnPreference object creation - defaults to CreateOrEdit
		 * @return DatagridColumnPreferenceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDatagridColumnPreferenceId = QApplication::PathInfo(0);
			return DatagridColumnPreferenceMetaControl::Create($objParentObject, $intDatagridColumnPreferenceId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DatagridColumnPreferenceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DatagridColumnPreference object creation - defaults to CreateOrEdit
		 * @return DatagridColumnPreferenceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDatagridColumnPreferenceId = QApplication::QueryString('intDatagridColumnPreferenceId');
			return DatagridColumnPreferenceMetaControl::Create($objParentObject, $intDatagridColumnPreferenceId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblDatagridColumnPreferenceId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDatagridColumnPreferenceId_Create($strControlId = null) {
			$this->lblDatagridColumnPreferenceId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDatagridColumnPreferenceId->Name = QApplication::Translate('Datagrid Column Preference Id');
			if ($this->blnEditMode)
				$this->lblDatagridColumnPreferenceId->Text = $this->objDatagridColumnPreference->DatagridColumnPreferenceId;
			else
				$this->lblDatagridColumnPreferenceId->Text = 'N/A';
			return $this->lblDatagridColumnPreferenceId;
		}

		/**
		 * Create and setup QListBox lstDatagrid
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDatagrid_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDatagrid = new QListBox($this->objParentObject, $strControlId);
			$this->lstDatagrid->Name = QApplication::Translate('Datagrid');
			$this->lstDatagrid->Required = true;
			if (!$this->blnEditMode)
				$this->lstDatagrid->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDatagridCursor = Datagrid::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDatagrid = Datagrid::InstantiateCursor($objDatagridCursor)) {
				$objListItem = new QListItem($objDatagrid->__toString(), $objDatagrid->DatagridId);
				if (($this->objDatagridColumnPreference->Datagrid) && ($this->objDatagridColumnPreference->Datagrid->DatagridId == $objDatagrid->DatagridId))
					$objListItem->Selected = true;
				$this->lstDatagrid->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDatagrid;
		}

		/**
		 * Create and setup QLabel lblDatagridId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDatagridId_Create($strControlId = null) {
			$this->lblDatagridId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDatagridId->Name = QApplication::Translate('Datagrid');
			$this->lblDatagridId->Text = ($this->objDatagridColumnPreference->Datagrid) ? $this->objDatagridColumnPreference->Datagrid->__toString() : null;
			$this->lblDatagridId->Required = true;
			return $this->lblDatagridId;
		}

		/**
		 * Create and setup QTextBox txtColumnName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtColumnName_Create($strControlId = null) {
			$this->txtColumnName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtColumnName->Name = QApplication::Translate('Column Name');
			$this->txtColumnName->Text = $this->objDatagridColumnPreference->ColumnName;
			$this->txtColumnName->Required = true;
			$this->txtColumnName->MaxLength = DatagridColumnPreference::ColumnNameMaxLength;
			return $this->txtColumnName;
		}

		/**
		 * Create and setup QLabel lblColumnName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblColumnName_Create($strControlId = null) {
			$this->lblColumnName = new QLabel($this->objParentObject, $strControlId);
			$this->lblColumnName->Name = QApplication::Translate('Column Name');
			$this->lblColumnName->Text = $this->objDatagridColumnPreference->ColumnName;
			$this->lblColumnName->Required = true;
			return $this->lblColumnName;
		}

		/**
		 * Create and setup QListBox lstUserAccount
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUserAccount_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUserAccount = new QListBox($this->objParentObject, $strControlId);
			$this->lstUserAccount->Name = QApplication::Translate('User Account');
			$this->lstUserAccount->Required = true;
			if (!$this->blnEditMode)
				$this->lstUserAccount->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserAccountCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUserAccount = UserAccount::InstantiateCursor($objUserAccountCursor)) {
				$objListItem = new QListItem($objUserAccount->__toString(), $objUserAccount->UserAccountId);
				if (($this->objDatagridColumnPreference->UserAccount) && ($this->objDatagridColumnPreference->UserAccount->UserAccountId == $objUserAccount->UserAccountId))
					$objListItem->Selected = true;
				$this->lstUserAccount->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstUserAccount;
		}

		/**
		 * Create and setup QLabel lblUserAccountId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUserAccountId_Create($strControlId = null) {
			$this->lblUserAccountId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUserAccountId->Name = QApplication::Translate('User Account');
			$this->lblUserAccountId->Text = ($this->objDatagridColumnPreference->UserAccount) ? $this->objDatagridColumnPreference->UserAccount->__toString() : null;
			$this->lblUserAccountId->Required = true;
			return $this->lblUserAccountId;
		}

		/**
		 * Create and setup QCheckBox chkDisplayFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDisplayFlag_Create($strControlId = null) {
			$this->chkDisplayFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDisplayFlag->Name = QApplication::Translate('Display Flag');
			$this->chkDisplayFlag->Checked = $this->objDatagridColumnPreference->DisplayFlag;
			return $this->chkDisplayFlag;
		}

		/**
		 * Create and setup QLabel lblDisplayFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDisplayFlag_Create($strControlId = null) {
			$this->lblDisplayFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDisplayFlag->Name = QApplication::Translate('Display Flag');
			$this->lblDisplayFlag->Text = ($this->objDatagridColumnPreference->DisplayFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDisplayFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local DatagridColumnPreference object.
		 * @param boolean $blnReload reload DatagridColumnPreference from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDatagridColumnPreference->Reload();

			if ($this->lblDatagridColumnPreferenceId) if ($this->blnEditMode) $this->lblDatagridColumnPreferenceId->Text = $this->objDatagridColumnPreference->DatagridColumnPreferenceId;

			if ($this->lstDatagrid) {
					$this->lstDatagrid->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstDatagrid->AddItem(QApplication::Translate('- Select One -'), null);
				$objDatagridArray = Datagrid::LoadAll();
				if ($objDatagridArray) foreach ($objDatagridArray as $objDatagrid) {
					$objListItem = new QListItem($objDatagrid->__toString(), $objDatagrid->DatagridId);
					if (($this->objDatagridColumnPreference->Datagrid) && ($this->objDatagridColumnPreference->Datagrid->DatagridId == $objDatagrid->DatagridId))
						$objListItem->Selected = true;
					$this->lstDatagrid->AddItem($objListItem);
				}
			}
			if ($this->lblDatagridId) $this->lblDatagridId->Text = ($this->objDatagridColumnPreference->Datagrid) ? $this->objDatagridColumnPreference->Datagrid->__toString() : null;

			if ($this->txtColumnName) $this->txtColumnName->Text = $this->objDatagridColumnPreference->ColumnName;
			if ($this->lblColumnName) $this->lblColumnName->Text = $this->objDatagridColumnPreference->ColumnName;

			if ($this->lstUserAccount) {
					$this->lstUserAccount->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstUserAccount->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserAccountArray = UserAccount::LoadAll();
				if ($objUserAccountArray) foreach ($objUserAccountArray as $objUserAccount) {
					$objListItem = new QListItem($objUserAccount->__toString(), $objUserAccount->UserAccountId);
					if (($this->objDatagridColumnPreference->UserAccount) && ($this->objDatagridColumnPreference->UserAccount->UserAccountId == $objUserAccount->UserAccountId))
						$objListItem->Selected = true;
					$this->lstUserAccount->AddItem($objListItem);
				}
			}
			if ($this->lblUserAccountId) $this->lblUserAccountId->Text = ($this->objDatagridColumnPreference->UserAccount) ? $this->objDatagridColumnPreference->UserAccount->__toString() : null;

			if ($this->chkDisplayFlag) $this->chkDisplayFlag->Checked = $this->objDatagridColumnPreference->DisplayFlag;
			if ($this->lblDisplayFlag) $this->lblDisplayFlag->Text = ($this->objDatagridColumnPreference->DisplayFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DATAGRIDCOLUMNPREFERENCE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DatagridColumnPreference instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDatagridColumnPreference() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstDatagrid) $this->objDatagridColumnPreference->DatagridId = $this->lstDatagrid->SelectedValue;
				if ($this->txtColumnName) $this->objDatagridColumnPreference->ColumnName = $this->txtColumnName->Text;
				if ($this->lstUserAccount) $this->objDatagridColumnPreference->UserAccountId = $this->lstUserAccount->SelectedValue;
				if ($this->chkDisplayFlag) $this->objDatagridColumnPreference->DisplayFlag = $this->chkDisplayFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DatagridColumnPreference object
				$this->objDatagridColumnPreference->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DatagridColumnPreference instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDatagridColumnPreference() {
			$this->objDatagridColumnPreference->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'DatagridColumnPreference': return $this->objDatagridColumnPreference;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DatagridColumnPreference fields -- will be created dynamically if not yet created
				case 'DatagridColumnPreferenceIdControl':
					if (!$this->lblDatagridColumnPreferenceId) return $this->lblDatagridColumnPreferenceId_Create();
					return $this->lblDatagridColumnPreferenceId;
				case 'DatagridColumnPreferenceIdLabel':
					if (!$this->lblDatagridColumnPreferenceId) return $this->lblDatagridColumnPreferenceId_Create();
					return $this->lblDatagridColumnPreferenceId;
				case 'DatagridIdControl':
					if (!$this->lstDatagrid) return $this->lstDatagrid_Create();
					return $this->lstDatagrid;
				case 'DatagridIdLabel':
					if (!$this->lblDatagridId) return $this->lblDatagridId_Create();
					return $this->lblDatagridId;
				case 'ColumnNameControl':
					if (!$this->txtColumnName) return $this->txtColumnName_Create();
					return $this->txtColumnName;
				case 'ColumnNameLabel':
					if (!$this->lblColumnName) return $this->lblColumnName_Create();
					return $this->lblColumnName;
				case 'UserAccountIdControl':
					if (!$this->lstUserAccount) return $this->lstUserAccount_Create();
					return $this->lstUserAccount;
				case 'UserAccountIdLabel':
					if (!$this->lblUserAccountId) return $this->lblUserAccountId_Create();
					return $this->lblUserAccountId;
				case 'DisplayFlagControl':
					if (!$this->chkDisplayFlag) return $this->chkDisplayFlag_Create();
					return $this->chkDisplayFlag;
				case 'DisplayFlagLabel':
					if (!$this->lblDisplayFlag) return $this->lblDisplayFlag_Create();
					return $this->lblDisplayFlag;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to DatagridColumnPreference fields
					case 'DatagridColumnPreferenceIdControl':
						return ($this->lblDatagridColumnPreferenceId = QType::Cast($mixValue, 'QControl'));
					case 'DatagridIdControl':
						return ($this->lstDatagrid = QType::Cast($mixValue, 'QControl'));
					case 'ColumnNameControl':
						return ($this->txtColumnName = QType::Cast($mixValue, 'QControl'));
					case 'UserAccountIdControl':
						return ($this->lstUserAccount = QType::Cast($mixValue, 'QControl'));
					case 'DisplayFlagControl':
						return ($this->chkDisplayFlag = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>