<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ReceiptCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ReceiptCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ReceiptCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ReceiptCustomFieldHelper $ReceiptCustomFieldHelper the actual ReceiptCustomFieldHelper data class being edited
	 * property QListBox $ReceiptIdControl
	 * property-read QLabel $ReceiptIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ReceiptCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ReceiptCustomFieldHelper objReceiptCustomFieldHelper
		 * @access protected
		 */
		protected $objReceiptCustomFieldHelper;

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

		// Controls that allow the editing of ReceiptCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstReceipt;
         * @access protected
         */
		protected $lstReceipt;


		// Controls that allow the viewing of ReceiptCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblReceiptId
         * @access protected
         */
		protected $lblReceiptId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ReceiptCustomFieldHelperMetaControl to edit a single ReceiptCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ReceiptCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptCustomFieldHelperMetaControl
		 * @param ReceiptCustomFieldHelper $objReceiptCustomFieldHelper new or existing ReceiptCustomFieldHelper object
		 */
		 public function __construct($objParentObject, ReceiptCustomFieldHelper $objReceiptCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ReceiptCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ReceiptCustomFieldHelper object
			$this->objReceiptCustomFieldHelper = $objReceiptCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objReceiptCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptCustomFieldHelperMetaControl
		 * @param integer $intReceiptId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ReceiptCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return ReceiptCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intReceiptId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intReceiptId)) {
				$objReceiptCustomFieldHelper = ReceiptCustomFieldHelper::Load($intReceiptId);

				// ReceiptCustomFieldHelper was found -- return it!
				if ($objReceiptCustomFieldHelper)
					return new ReceiptCustomFieldHelperMetaControl($objParentObject, $objReceiptCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ReceiptCustomFieldHelper object with PK arguments: ' . $intReceiptId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ReceiptCustomFieldHelperMetaControl($objParentObject, new ReceiptCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ReceiptCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ReceiptCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intReceiptId = QApplication::PathInfo(0);
			return ReceiptCustomFieldHelperMetaControl::Create($objParentObject, $intReceiptId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReceiptCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ReceiptCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ReceiptCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intReceiptId = QApplication::QueryString('intReceiptId');
			return ReceiptCustomFieldHelperMetaControl::Create($objParentObject, $intReceiptId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstReceipt
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstReceipt_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstReceipt = new QListBox($this->objParentObject, $strControlId);
			$this->lstReceipt->Name = QApplication::Translate('Receipt');
			$this->lstReceipt->Required = true;
			if (!$this->blnEditMode)
				$this->lstReceipt->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objReceiptCursor = Receipt::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objReceipt = Receipt::InstantiateCursor($objReceiptCursor)) {
				$objListItem = new QListItem($objReceipt->__toString(), $objReceipt->ReceiptId);
				if (($this->objReceiptCustomFieldHelper->Receipt) && ($this->objReceiptCustomFieldHelper->Receipt->ReceiptId == $objReceipt->ReceiptId))
					$objListItem->Selected = true;
				$this->lstReceipt->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstReceipt;
		}

		/**
		 * Create and setup QLabel lblReceiptId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceiptId_Create($strControlId = null) {
			$this->lblReceiptId = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceiptId->Name = QApplication::Translate('Receipt');
			$this->lblReceiptId->Text = ($this->objReceiptCustomFieldHelper->Receipt) ? $this->objReceiptCustomFieldHelper->Receipt->__toString() : null;
			$this->lblReceiptId->Required = true;
			return $this->lblReceiptId;
		}



		/**
		 * Refresh this MetaControl with Data from the local ReceiptCustomFieldHelper object.
		 * @param boolean $blnReload reload ReceiptCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objReceiptCustomFieldHelper->Reload();

			if ($this->lstReceipt) {
					$this->lstReceipt->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstReceipt->AddItem(QApplication::Translate('- Select One -'), null);
				$objReceiptArray = Receipt::LoadAll();
				if ($objReceiptArray) foreach ($objReceiptArray as $objReceipt) {
					$objListItem = new QListItem($objReceipt->__toString(), $objReceipt->ReceiptId);
					if (($this->objReceiptCustomFieldHelper->Receipt) && ($this->objReceiptCustomFieldHelper->Receipt->ReceiptId == $objReceipt->ReceiptId))
						$objListItem->Selected = true;
					$this->lstReceipt->AddItem($objListItem);
				}
			}
			if ($this->lblReceiptId) $this->lblReceiptId->Text = ($this->objReceiptCustomFieldHelper->Receipt) ? $this->objReceiptCustomFieldHelper->Receipt->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RECEIPTCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ReceiptCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveReceiptCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstReceipt) $this->objReceiptCustomFieldHelper->ReceiptId = $this->lstReceipt->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ReceiptCustomFieldHelper object
				$this->objReceiptCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ReceiptCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteReceiptCustomFieldHelper() {
			$this->objReceiptCustomFieldHelper->Delete();
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
				case 'ReceiptCustomFieldHelper': return $this->objReceiptCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ReceiptCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'ReceiptIdControl':
					if (!$this->lstReceipt) return $this->lstReceipt_Create();
					return $this->lstReceipt;
				case 'ReceiptIdLabel':
					if (!$this->lblReceiptId) return $this->lblReceiptId_Create();
					return $this->lblReceiptId;
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
					// Controls that point to ReceiptCustomFieldHelper fields
					case 'ReceiptIdControl':
						return ($this->lstReceipt = QType::Cast($mixValue, 'QControl'));
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