<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ShipmentCustomFieldHelper class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ShipmentCustomFieldHelper object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ShipmentCustomFieldHelperMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ShipmentCustomFieldHelper $ShipmentCustomFieldHelper the actual ShipmentCustomFieldHelper data class being edited
	 * property QListBox $ShipmentIdControl
	 * property-read QLabel $ShipmentIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ShipmentCustomFieldHelperMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ShipmentCustomFieldHelper objShipmentCustomFieldHelper
		 * @access protected
		 */
		protected $objShipmentCustomFieldHelper;

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

		// Controls that allow the editing of ShipmentCustomFieldHelper's individual data fields
        /**
         * @var QListBox lstShipment;
         * @access protected
         */
		protected $lstShipment;


		// Controls that allow the viewing of ShipmentCustomFieldHelper's individual data fields
        /**
         * @var QLabel lblShipmentId
         * @access protected
         */
		protected $lblShipmentId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ShipmentCustomFieldHelperMetaControl to edit a single ShipmentCustomFieldHelper object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ShipmentCustomFieldHelper object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentCustomFieldHelperMetaControl
		 * @param ShipmentCustomFieldHelper $objShipmentCustomFieldHelper new or existing ShipmentCustomFieldHelper object
		 */
		 public function __construct($objParentObject, ShipmentCustomFieldHelper $objShipmentCustomFieldHelper) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ShipmentCustomFieldHelperMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ShipmentCustomFieldHelper object
			$this->objShipmentCustomFieldHelper = $objShipmentCustomFieldHelper;

			// Figure out if we're Editing or Creating New
			if ($this->objShipmentCustomFieldHelper->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentCustomFieldHelperMetaControl
		 * @param integer $intShipmentId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ShipmentCustomFieldHelper object creation - defaults to CreateOrEdit
 		 * @return ShipmentCustomFieldHelperMetaControl
		 */
		public static function Create($objParentObject, $intShipmentId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intShipmentId)) {
				$objShipmentCustomFieldHelper = ShipmentCustomFieldHelper::Load($intShipmentId);

				// ShipmentCustomFieldHelper was found -- return it!
				if ($objShipmentCustomFieldHelper)
					return new ShipmentCustomFieldHelperMetaControl($objParentObject, $objShipmentCustomFieldHelper);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ShipmentCustomFieldHelper object with PK arguments: ' . $intShipmentId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ShipmentCustomFieldHelperMetaControl($objParentObject, new ShipmentCustomFieldHelper());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ShipmentCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ShipmentCustomFieldHelperMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intShipmentId = QApplication::PathInfo(0);
			return ShipmentCustomFieldHelperMetaControl::Create($objParentObject, $intShipmentId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentCustomFieldHelperMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ShipmentCustomFieldHelper object creation - defaults to CreateOrEdit
		 * @return ShipmentCustomFieldHelperMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intShipmentId = QApplication::QueryString('intShipmentId');
			return ShipmentCustomFieldHelperMetaControl::Create($objParentObject, $intShipmentId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstShipment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstShipment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstShipment = new QListBox($this->objParentObject, $strControlId);
			$this->lstShipment->Name = QApplication::Translate('Shipment');
			$this->lstShipment->Required = true;
			if (!$this->blnEditMode)
				$this->lstShipment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objShipmentCursor = Shipment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objShipment = Shipment::InstantiateCursor($objShipmentCursor)) {
				$objListItem = new QListItem($objShipment->__toString(), $objShipment->ShipmentId);
				if (($this->objShipmentCustomFieldHelper->Shipment) && ($this->objShipmentCustomFieldHelper->Shipment->ShipmentId == $objShipment->ShipmentId))
					$objListItem->Selected = true;
				$this->lstShipment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstShipment;
		}

		/**
		 * Create and setup QLabel lblShipmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShipmentId_Create($strControlId = null) {
			$this->lblShipmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblShipmentId->Name = QApplication::Translate('Shipment');
			$this->lblShipmentId->Text = ($this->objShipmentCustomFieldHelper->Shipment) ? $this->objShipmentCustomFieldHelper->Shipment->__toString() : null;
			$this->lblShipmentId->Required = true;
			return $this->lblShipmentId;
		}



		/**
		 * Refresh this MetaControl with Data from the local ShipmentCustomFieldHelper object.
		 * @param boolean $blnReload reload ShipmentCustomFieldHelper from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objShipmentCustomFieldHelper->Reload();

			if ($this->lstShipment) {
					$this->lstShipment->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstShipment->AddItem(QApplication::Translate('- Select One -'), null);
				$objShipmentArray = Shipment::LoadAll();
				if ($objShipmentArray) foreach ($objShipmentArray as $objShipment) {
					$objListItem = new QListItem($objShipment->__toString(), $objShipment->ShipmentId);
					if (($this->objShipmentCustomFieldHelper->Shipment) && ($this->objShipmentCustomFieldHelper->Shipment->ShipmentId == $objShipment->ShipmentId))
						$objListItem->Selected = true;
					$this->lstShipment->AddItem($objListItem);
				}
			}
			if ($this->lblShipmentId) $this->lblShipmentId->Text = ($this->objShipmentCustomFieldHelper->Shipment) ? $this->objShipmentCustomFieldHelper->Shipment->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SHIPMENTCUSTOMFIELDHELPER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ShipmentCustomFieldHelper instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveShipmentCustomFieldHelper() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstShipment) $this->objShipmentCustomFieldHelper->ShipmentId = $this->lstShipment->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ShipmentCustomFieldHelper object
				$this->objShipmentCustomFieldHelper->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ShipmentCustomFieldHelper instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteShipmentCustomFieldHelper() {
			$this->objShipmentCustomFieldHelper->Delete();
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
				case 'ShipmentCustomFieldHelper': return $this->objShipmentCustomFieldHelper;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ShipmentCustomFieldHelper fields -- will be created dynamically if not yet created
				case 'ShipmentIdControl':
					if (!$this->lstShipment) return $this->lstShipment_Create();
					return $this->lstShipment;
				case 'ShipmentIdLabel':
					if (!$this->lblShipmentId) return $this->lblShipmentId_Create();
					return $this->lblShipmentId;
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
					// Controls that point to ShipmentCustomFieldHelper fields
					case 'ShipmentIdControl':
						return ($this->lstShipment = QType::Cast($mixValue, 'QControl'));
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