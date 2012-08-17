<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the TransactionType class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single TransactionType object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TransactionTypeMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read TransactionType $TransactionType the actual TransactionType data class being edited
	 * property QLabel $TransactionTypeIdControl
	 * property-read QLabel $TransactionTypeIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QCheckBox $AssetFlagControl
	 * property-read QLabel $AssetFlagLabel
	 * property QCheckBox $InventoryFlagControl
	 * property-read QLabel $InventoryFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TransactionTypeMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var TransactionType objTransactionType
		 * @access protected
		 */
		protected $objTransactionType;

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

		// Controls that allow the editing of TransactionType's individual data fields
        /**
         * @var QLabel lblTransactionTypeId;
         * @access protected
         */
		protected $lblTransactionTypeId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QCheckBox chkAssetFlag;
         * @access protected
         */
		protected $chkAssetFlag;

        /**
         * @var QCheckBox chkInventoryFlag;
         * @access protected
         */
		protected $chkInventoryFlag;


		// Controls that allow the viewing of TransactionType's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblAssetFlag
         * @access protected
         */
		protected $lblAssetFlag;

        /**
         * @var QLabel lblInventoryFlag
         * @access protected
         */
		protected $lblInventoryFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TransactionTypeMetaControl to edit a single TransactionType object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single TransactionType object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionTypeMetaControl
		 * @param TransactionType $objTransactionType new or existing TransactionType object
		 */
		 public function __construct($objParentObject, TransactionType $objTransactionType) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TransactionTypeMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked TransactionType object
			$this->objTransactionType = $objTransactionType;

			// Figure out if we're Editing or Creating New
			if ($this->objTransactionType->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionTypeMetaControl
		 * @param integer $intTransactionTypeId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing TransactionType object creation - defaults to CreateOrEdit
 		 * @return TransactionTypeMetaControl
		 */
		public static function Create($objParentObject, $intTransactionTypeId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intTransactionTypeId)) {
				$objTransactionType = TransactionType::Load($intTransactionTypeId);

				// TransactionType was found -- return it!
				if ($objTransactionType)
					return new TransactionTypeMetaControl($objParentObject, $objTransactionType);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a TransactionType object with PK arguments: ' . $intTransactionTypeId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TransactionTypeMetaControl($objParentObject, new TransactionType());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionTypeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TransactionType object creation - defaults to CreateOrEdit
		 * @return TransactionTypeMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intTransactionTypeId = QApplication::PathInfo(0);
			return TransactionTypeMetaControl::Create($objParentObject, $intTransactionTypeId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionTypeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TransactionType object creation - defaults to CreateOrEdit
		 * @return TransactionTypeMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intTransactionTypeId = QApplication::QueryString('intTransactionTypeId');
			return TransactionTypeMetaControl::Create($objParentObject, $intTransactionTypeId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblTransactionTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionTypeId_Create($strControlId = null) {
			$this->lblTransactionTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionTypeId->Name = QApplication::Translate('Transaction Type Id');
			if ($this->blnEditMode)
				$this->lblTransactionTypeId->Text = $this->objTransactionType->TransactionTypeId;
			else
				$this->lblTransactionTypeId->Text = 'N/A';
			return $this->lblTransactionTypeId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objTransactionType->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = TransactionType::ShortDescriptionMaxLength;
			return $this->txtShortDescription;
		}

		/**
		 * Create and setup QLabel lblShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShortDescription_Create($strControlId = null) {
			$this->lblShortDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblShortDescription->Name = QApplication::Translate('Short Description');
			$this->lblShortDescription->Text = $this->objTransactionType->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QCheckBox chkAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAssetFlag_Create($strControlId = null) {
			$this->chkAssetFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->chkAssetFlag->Checked = $this->objTransactionType->AssetFlag;
			return $this->chkAssetFlag;
		}

		/**
		 * Create and setup QLabel lblAssetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetFlag_Create($strControlId = null) {
			$this->lblAssetFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetFlag->Name = QApplication::Translate('Asset Flag');
			$this->lblAssetFlag->Text = ($this->objTransactionType->AssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAssetFlag;
		}

		/**
		 * Create and setup QCheckBox chkInventoryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInventoryFlag_Create($strControlId = null) {
			$this->chkInventoryFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->chkInventoryFlag->Checked = $this->objTransactionType->InventoryFlag;
			return $this->chkInventoryFlag;
		}

		/**
		 * Create and setup QLabel lblInventoryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInventoryFlag_Create($strControlId = null) {
			$this->lblInventoryFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblInventoryFlag->Name = QApplication::Translate('Inventory Flag');
			$this->lblInventoryFlag->Text = ($this->objTransactionType->InventoryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInventoryFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local TransactionType object.
		 * @param boolean $blnReload reload TransactionType from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTransactionType->Reload();

			if ($this->lblTransactionTypeId) if ($this->blnEditMode) $this->lblTransactionTypeId->Text = $this->objTransactionType->TransactionTypeId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objTransactionType->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objTransactionType->ShortDescription;

			if ($this->chkAssetFlag) $this->chkAssetFlag->Checked = $this->objTransactionType->AssetFlag;
			if ($this->lblAssetFlag) $this->lblAssetFlag->Text = ($this->objTransactionType->AssetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkInventoryFlag) $this->chkInventoryFlag->Checked = $this->objTransactionType->InventoryFlag;
			if ($this->lblInventoryFlag) $this->lblInventoryFlag->Text = ($this->objTransactionType->InventoryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TRANSACTIONTYPE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's TransactionType instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTransactionType() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objTransactionType->ShortDescription = $this->txtShortDescription->Text;
				if ($this->chkAssetFlag) $this->objTransactionType->AssetFlag = $this->chkAssetFlag->Checked;
				if ($this->chkInventoryFlag) $this->objTransactionType->InventoryFlag = $this->chkInventoryFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the TransactionType object
				$this->objTransactionType->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's TransactionType instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTransactionType() {
			$this->objTransactionType->Delete();
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
				case 'TransactionType': return $this->objTransactionType;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to TransactionType fields -- will be created dynamically if not yet created
				case 'TransactionTypeIdControl':
					if (!$this->lblTransactionTypeId) return $this->lblTransactionTypeId_Create();
					return $this->lblTransactionTypeId;
				case 'TransactionTypeIdLabel':
					if (!$this->lblTransactionTypeId) return $this->lblTransactionTypeId_Create();
					return $this->lblTransactionTypeId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'AssetFlagControl':
					if (!$this->chkAssetFlag) return $this->chkAssetFlag_Create();
					return $this->chkAssetFlag;
				case 'AssetFlagLabel':
					if (!$this->lblAssetFlag) return $this->lblAssetFlag_Create();
					return $this->lblAssetFlag;
				case 'InventoryFlagControl':
					if (!$this->chkInventoryFlag) return $this->chkInventoryFlag_Create();
					return $this->chkInventoryFlag;
				case 'InventoryFlagLabel':
					if (!$this->lblInventoryFlag) return $this->lblInventoryFlag_Create();
					return $this->lblInventoryFlag;
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
					// Controls that point to TransactionType fields
					case 'TransactionTypeIdControl':
						return ($this->lblTransactionTypeId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'AssetFlagControl':
						return ($this->chkAssetFlag = QType::Cast($mixValue, 'QControl'));
					case 'InventoryFlagControl':
						return ($this->chkInventoryFlag = QType::Cast($mixValue, 'QControl'));
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