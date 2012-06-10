<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ContactCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ContactCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ContactCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ContactCustomFieldHelper $ContactCustomFieldHelper the actual ContactCustomFieldHelper data class being edited
	 * property QListBox $ContactIdControl
	 * property-read QLabel $ContactIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ContactCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ContactCustomFieldHelper objContactCustomFieldHelper
		 * @access protected
		 */
		protected $objContactCustomFieldHelper;

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

		// Controls that allow the editing of ContactCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstContact;
         * @access protected
         */
		protected $lstContact;


		// Controls that allow the viewing of ContactCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblContactId
         * @access protected
         */
		protected $lblContactId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ContactCustomFieldHelperMetaControl to edit a single ContactCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ContactCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactCustomFieldHelperMetaControl
		 * @param ContactCustomFieldHelper $objContactCustomFieldHelper new or existing ContactCustomFieldHelper object
		 */
		 public function __construct($objParentObject, ContactCustomFieldHelper $objContactCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ContactCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ContactCustomFieldHelper object
			$this->objContactCustomFieldHelper = $objContactCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objContactCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactCustomFieldHelperMetaControl
		 * @param integer $intContactId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ContactCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return ContactCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intContactId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intContactId)) {
				$objContactCustomFieldHelper = ContactCustomFieldHelper::Load($intContactId);

				// ContactCustomFieldHelper was found -- return it!
				if ($objContactCustomFieldHelper)
					return new ContactCustomFieldHelperMetaControl($objParentObject, $objContactCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ContactCustomFieldHelper object with PK arguments: ' . $intContactId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ContactCustomFieldHelperMetaControl($objParentObject, new ContactCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ContactCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ContactCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intContactId = QApplication::PathInfo(0);
			return ContactCustomFieldHelperMetaControl::Create($objParentObject, $intContactId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ContactCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ContactCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ContactCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intContactId = QApplication::QueryString('intContactId');
			return ContactCustomFieldHelperMetaControl::Create($objParentObject, $intContactId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstContact
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstContact_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstContact = new QListBox($this->objParentObject, $strControlId);
			$this->lstContact->Name = QApplication::Translate('Contact');
			$this->lstContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstContact->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objContactCursor = Contact::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objContact = Contact::InstantiateCursor($objContactCursor)) {
				$objListItem = new QListItem($objContact->__toString(), $objContact->ContactId);
				if (($this->objContactCustomFieldHelper->Contact) && ($this->objContactCustomFieldHelper->Contact->ContactId == $objContact->ContactId))
					$objListItem->Selected = true;
				$this->lstContact->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstContact;
		}

		/**
		 * Create and setup QLabel lblContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContactId_Create($strControlId = null) {
			$this->lblContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblContactId->Name = QApplication::Translate('Contact');
			$this->lblContactId->Text = ($this->objContactCustomFieldHelper->Contact) ? $this->objContactCustomFieldHelper->Contact->__toString() : null;
			$this->lblContactId->Required = true;
			return $this->lblContactId;
		}



		/**
		 * Refresh this MetaControl with Data from the local ContactCustomFieldHelper object.
		 * @param boolean $blnReload reload ContactCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objContactCustomFieldHelper->Reload();

			if ($this->lstContact) {
					$this->lstContact->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstContact->AddItem(QApplication::Translate('- Select One -'), null);
				$objContactArray = Contact::LoadAll();
				if ($objContactArray) foreach ($objContactArray as $objContact) {
					$objListItem = new QListItem($objContact->__toString(), $objContact->ContactId);
					if (($this->objContactCustomFieldHelper->Contact) && ($this->objContactCustomFieldHelper->Contact->ContactId == $objContact->ContactId))
						$objListItem->Selected = true;
					$this->lstContact->AddItem($objListItem);
				}
			}
			if ($this->lblContactId) $this->lblContactId->Text = ($this->objContactCustomFieldHelper->Contact) ? $this->objContactCustomFieldHelper->Contact->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CONTACTCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ContactCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveContactCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstContact) $this->objContactCustomFieldHelper->ContactId = $this->lstContact->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ContactCustomFieldHelper object
				$this->objContactCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ContactCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteContactCustomFieldHelper() {
			$this->objContactCustomFieldHelper->Delete();
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
				case 'ContactCustomFieldHelper': return $this->objContactCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ContactCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'ContactIdControl':
					if (!$this->lstContact) return $this->lstContact_Create();
					return $this->lstContact;
				case 'ContactIdLabel':
					if (!$this->lblContactId) return $this->lblContactId_Create();
					return $this->lblContactId;
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
					// Controls that point to ContactCustomFieldHelper fields
					case 'ContactIdControl':
						return ($this->lstContact = QType::Cast($mixValue, 'QControl'));
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