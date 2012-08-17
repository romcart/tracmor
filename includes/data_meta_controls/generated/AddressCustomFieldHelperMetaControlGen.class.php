<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AddressCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AddressCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AddressCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AddressCustomFieldHelper $AddressCustomFieldHelper the actual AddressCustomFieldHelper data class being edited
	 * property QListBox $AddressIdControl
	 * property-read QLabel $AddressIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AddressCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AddressCustomFieldHelper objAddressCustomFieldHelper
		 * @access protected
		 */
		protected $objAddressCustomFieldHelper;

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

		// Controls that allow the editing of AddressCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstAddress;
         * @access protected
         */
		protected $lstAddress;


		// Controls that allow the viewing of AddressCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblAddressId
         * @access protected
         */
		protected $lblAddressId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AddressCustomFieldHelperMetaControl to edit a single AddressCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AddressCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressCustomFieldHelperMetaControl
		 * @param AddressCustomFieldHelper $objAddressCustomFieldHelper new or existing AddressCustomFieldHelper object
		 */
		 public function __construct($objParentObject, AddressCustomFieldHelper $objAddressCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AddressCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AddressCustomFieldHelper object
			$this->objAddressCustomFieldHelper = $objAddressCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objAddressCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressCustomFieldHelperMetaControl
		 * @param integer $intAddressId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AddressCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return AddressCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intAddressId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAddressId)) {
				$objAddressCustomFieldHelper = AddressCustomFieldHelper::Load($intAddressId);

				// AddressCustomFieldHelper was found -- return it!
				if ($objAddressCustomFieldHelper)
					return new AddressCustomFieldHelperMetaControl($objParentObject, $objAddressCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AddressCustomFieldHelper object with PK arguments: ' . $intAddressId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AddressCustomFieldHelperMetaControl($objParentObject, new AddressCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AddressCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return AddressCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAddressId = QApplication::PathInfo(0);
			return AddressCustomFieldHelperMetaControl::Create($objParentObject, $intAddressId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AddressCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return AddressCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAddressId = QApplication::QueryString('intAddressId');
			return AddressCustomFieldHelperMetaControl::Create($objParentObject, $intAddressId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstAddress->Name = QApplication::Translate('Address');
			$this->lstAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAddress = Address::InstantiateCursor($objAddressCursor)) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
				if (($this->objAddressCustomFieldHelper->Address) && ($this->objAddressCustomFieldHelper->Address->AddressId == $objAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAddress;
		}

		/**
		 * Create and setup QLabel lblAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressId_Create($strControlId = null) {
			$this->lblAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressId->Name = QApplication::Translate('Address');
			$this->lblAddressId->Text = ($this->objAddressCustomFieldHelper->Address) ? $this->objAddressCustomFieldHelper->Address->__toString() : null;
			$this->lblAddressId->Required = true;
			return $this->lblAddressId;
		}



		/**
		 * Refresh this MetaControl with Data from the local AddressCustomFieldHelper object.
		 * @param boolean $blnReload reload AddressCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAddressCustomFieldHelper->Reload();

			if ($this->lstAddress) {
					$this->lstAddress->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objAddressArray = Address::LoadAll();
				if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
					$objListItem = new QListItem($objAddress->__toString(), $objAddress->AddressId);
					if (($this->objAddressCustomFieldHelper->Address) && ($this->objAddressCustomFieldHelper->Address->AddressId == $objAddress->AddressId))
						$objListItem->Selected = true;
					$this->lstAddress->AddItem($objListItem);
				}
			}
			if ($this->lblAddressId) $this->lblAddressId->Text = ($this->objAddressCustomFieldHelper->Address) ? $this->objAddressCustomFieldHelper->Address->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ADDRESSCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AddressCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAddressCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAddress) $this->objAddressCustomFieldHelper->AddressId = $this->lstAddress->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AddressCustomFieldHelper object
				$this->objAddressCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AddressCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAddressCustomFieldHelper() {
			$this->objAddressCustomFieldHelper->Delete();
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
				case 'AddressCustomFieldHelper': return $this->objAddressCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AddressCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'AddressIdControl':
					if (!$this->lstAddress) return $this->lstAddress_Create();
					return $this->lstAddress;
				case 'AddressIdLabel':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
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
					// Controls that point to AddressCustomFieldHelper fields
					case 'AddressIdControl':
						return ($this->lstAddress = QType::Cast($mixValue, 'QControl'));
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