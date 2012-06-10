<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AuditScan class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AuditScan object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AuditScanMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read AuditScan $AuditScan the actual AuditScan data class being edited
	 * property QLabel $AuditScanIdControl
	 * property-read QLabel $AuditScanIdLabel
	 * property QListBox $AuditIdControl
	 * property-read QLabel $AuditIdLabel
	 * property QListBox $LocationIdControl
	 * property-read QLabel $LocationIdLabel
	 * property QIntegerTextBox $EntityIdControl
	 * property-read QLabel $EntityIdLabel
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QIntegerTextBox $SystemCountControl
	 * property-read QLabel $SystemCountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AuditScanMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var AuditScan objAuditScan
		 * @access protected
		 */
		protected $objAuditScan;

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

		// Controls that allow the editing of AuditScan's individual data fields
        /**
         * @var QLabel lblAuditScanId;
         * @access protected
         */
		protected $lblAuditScanId;

        /**
         * @var QListBox lstAudit;
         * @access protected
         */
		protected $lstAudit;

        /**
         * @var QListBox lstLocation;
         * @access protected
         */
		protected $lstLocation;

        /**
         * @var QIntegerTextBox txtEntityId;
         * @access protected
         */
		protected $txtEntityId;

        /**
         * @var QIntegerTextBox txtCount;
         * @access protected
         */
		protected $txtCount;

        /**
         * @var QIntegerTextBox txtSystemCount;
         * @access protected
         */
		protected $txtSystemCount;


		// Controls that allow the viewing of AuditScan's individual data fields
        /**
         * @var QLabel lblAuditId
         * @access protected
         */
		protected $lblAuditId;

        /**
         * @var QLabel lblLocationId
         * @access protected
         */
		protected $lblLocationId;

        /**
         * @var QLabel lblEntityId
         * @access protected
         */
		protected $lblEntityId;

        /**
         * @var QLabel lblCount
         * @access protected
         */
		protected $lblCount;

        /**
         * @var QLabel lblSystemCount
         * @access protected
         */
		protected $lblSystemCount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AuditScanMetaControl to edit a single AuditScan object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AuditScan object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuditScanMetaControl
		 * @param AuditScan $objAuditScan new or existing AuditScan object
		 */
		 public function __construct($objParentObject, AuditScan $objAuditScan) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AuditScanMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AuditScan object
			$this->objAuditScan = $objAuditScan;

			// Figure out if we're Editing or Creating New
			if ($this->objAuditScan->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuditScanMetaControl
		 * @param integer $intAuditScanId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AuditScan object creation - defaults to CreateOrEdit
 		 * @return AuditScanMetaControl
		 */
		public static function Create($objParentObject, $intAuditScanId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAuditScanId)) {
				$objAuditScan = AuditScan::Load($intAuditScanId);

				// AuditScan was found -- return it!
				if ($objAuditScan)
					return new AuditScanMetaControl($objParentObject, $objAuditScan);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AuditScan object with PK arguments: ' . $intAuditScanId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AuditScanMetaControl($objParentObject, new AuditScan());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuditScanMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AuditScan object creation - defaults to CreateOrEdit
		 * @return AuditScanMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAuditScanId = QApplication::PathInfo(0);
			return AuditScanMetaControl::Create($objParentObject, $intAuditScanId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AuditScanMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AuditScan object creation - defaults to CreateOrEdit
		 * @return AuditScanMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAuditScanId = QApplication::QueryString('intAuditScanId');
			return AuditScanMetaControl::Create($objParentObject, $intAuditScanId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAuditScanId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuditScanId_Create($strControlId = null) {
			$this->lblAuditScanId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuditScanId->Name = QApplication::Translate('Audit Scan Id');
			if ($this->blnEditMode)
				$this->lblAuditScanId->Text = $this->objAuditScan->AuditScanId;
			else
				$this->lblAuditScanId->Text = 'N/A';
			return $this->lblAuditScanId;
		}

		/**
		 * Create and setup QListBox lstAudit
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAudit_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAudit = new QListBox($this->objParentObject, $strControlId);
			$this->lstAudit->Name = QApplication::Translate('Audit');
			$this->lstAudit->Required = true;
			if (!$this->blnEditMode)
				$this->lstAudit->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAuditCursor = Audit::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAudit = Audit::InstantiateCursor($objAuditCursor)) {
				$objListItem = new QListItem($objAudit->__toString(), $objAudit->AuditId);
				if (($this->objAuditScan->Audit) && ($this->objAuditScan->Audit->AuditId == $objAudit->AuditId))
					$objListItem->Selected = true;
				$this->lstAudit->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAudit;
		}

		/**
		 * Create and setup QLabel lblAuditId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuditId_Create($strControlId = null) {
			$this->lblAuditId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuditId->Name = QApplication::Translate('Audit');
			$this->lblAuditId->Text = ($this->objAuditScan->Audit) ? $this->objAuditScan->Audit->__toString() : null;
			$this->lblAuditId->Required = true;
			return $this->lblAuditId;
		}

		/**
		 * Create and setup QListBox lstLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstLocation->Name = QApplication::Translate('Location');
			$this->lstLocation->Required = true;
			if (!$this->blnEditMode)
				$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLocationCursor = Location::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLocation = Location::InstantiateCursor($objLocationCursor)) {
				$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
				if (($this->objAuditScan->Location) && ($this->objAuditScan->Location->LocationId == $objLocation->LocationId))
					$objListItem->Selected = true;
				$this->lstLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLocation;
		}

		/**
		 * Create and setup QLabel lblLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocationId_Create($strControlId = null) {
			$this->lblLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocationId->Name = QApplication::Translate('Location');
			$this->lblLocationId->Text = ($this->objAuditScan->Location) ? $this->objAuditScan->Location->__toString() : null;
			$this->lblLocationId->Required = true;
			return $this->lblLocationId;
		}

		/**
		 * Create and setup QIntegerTextBox txtEntityId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtEntityId_Create($strControlId = null) {
			$this->txtEntityId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtEntityId->Name = QApplication::Translate('Entity Id');
			$this->txtEntityId->Text = $this->objAuditScan->EntityId;
			return $this->txtEntityId;
		}

		/**
		 * Create and setup QLabel lblEntityId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblEntityId_Create($strControlId = null, $strFormat = null) {
			$this->lblEntityId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEntityId->Name = QApplication::Translate('Entity Id');
			$this->lblEntityId->Text = $this->objAuditScan->EntityId;
			$this->lblEntityId->Format = $strFormat;
			return $this->lblEntityId;
		}

		/**
		 * Create and setup QIntegerTextBox txtCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCount_Create($strControlId = null) {
			$this->txtCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCount->Name = QApplication::Translate('Count');
			$this->txtCount->Text = $this->objAuditScan->Count;
			return $this->txtCount;
		}

		/**
		 * Create and setup QLabel lblCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCount_Create($strControlId = null, $strFormat = null) {
			$this->lblCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblCount->Name = QApplication::Translate('Count');
			$this->lblCount->Text = $this->objAuditScan->Count;
			$this->lblCount->Format = $strFormat;
			return $this->lblCount;
		}

		/**
		 * Create and setup QIntegerTextBox txtSystemCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSystemCount_Create($strControlId = null) {
			$this->txtSystemCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSystemCount->Name = QApplication::Translate('System Count');
			$this->txtSystemCount->Text = $this->objAuditScan->SystemCount;
			return $this->txtSystemCount;
		}

		/**
		 * Create and setup QLabel lblSystemCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSystemCount_Create($strControlId = null, $strFormat = null) {
			$this->lblSystemCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblSystemCount->Name = QApplication::Translate('System Count');
			$this->lblSystemCount->Text = $this->objAuditScan->SystemCount;
			$this->lblSystemCount->Format = $strFormat;
			return $this->lblSystemCount;
		}



		/**
		 * Refresh this MetaControl with Data from the local AuditScan object.
		 * @param boolean $blnReload reload AuditScan from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAuditScan->Reload();

			if ($this->lblAuditScanId) if ($this->blnEditMode) $this->lblAuditScanId->Text = $this->objAuditScan->AuditScanId;

			if ($this->lstAudit) {
					$this->lstAudit->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAudit->AddItem(QApplication::Translate('- Select One -'), null);
				$objAuditArray = Audit::LoadAll();
				if ($objAuditArray) foreach ($objAuditArray as $objAudit) {
					$objListItem = new QListItem($objAudit->__toString(), $objAudit->AuditId);
					if (($this->objAuditScan->Audit) && ($this->objAuditScan->Audit->AuditId == $objAudit->AuditId))
						$objListItem->Selected = true;
					$this->lstAudit->AddItem($objListItem);
				}
			}
			if ($this->lblAuditId) $this->lblAuditId->Text = ($this->objAuditScan->Audit) ? $this->objAuditScan->Audit->__toString() : null;

			if ($this->lstLocation) {
					$this->lstLocation->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objLocationArray = Location::LoadAll();
				if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
					$objListItem = new QListItem($objLocation->__toString(), $objLocation->LocationId);
					if (($this->objAuditScan->Location) && ($this->objAuditScan->Location->LocationId == $objLocation->LocationId))
						$objListItem->Selected = true;
					$this->lstLocation->AddItem($objListItem);
				}
			}
			if ($this->lblLocationId) $this->lblLocationId->Text = ($this->objAuditScan->Location) ? $this->objAuditScan->Location->__toString() : null;

			if ($this->txtEntityId) $this->txtEntityId->Text = $this->objAuditScan->EntityId;
			if ($this->lblEntityId) $this->lblEntityId->Text = $this->objAuditScan->EntityId;

			if ($this->txtCount) $this->txtCount->Text = $this->objAuditScan->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objAuditScan->Count;

			if ($this->txtSystemCount) $this->txtSystemCount->Text = $this->objAuditScan->SystemCount;
			if ($this->lblSystemCount) $this->lblSystemCount->Text = $this->objAuditScan->SystemCount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC AUDITSCAN OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AuditScan instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAuditScan() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAudit) $this->objAuditScan->AuditId = $this->lstAudit->SelectedValue;
				if ($this->lstLocation) $this->objAuditScan->LocationId = $this->lstLocation->SelectedValue;
				if ($this->txtEntityId) $this->objAuditScan->EntityId = $this->txtEntityId->Text;
				if ($this->txtCount) $this->objAuditScan->Count = $this->txtCount->Text;
				if ($this->txtSystemCount) $this->objAuditScan->SystemCount = $this->txtSystemCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AuditScan object
				$this->objAuditScan->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AuditScan instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAuditScan() {
			$this->objAuditScan->Delete();
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
				case 'AuditScan': return $this->objAuditScan;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AuditScan fields -- will be created dynamically if not yet created
				case 'AuditScanIdControl':
					if (!$this->lblAuditScanId) return $this->lblAuditScanId_Create();
					return $this->lblAuditScanId;
				case 'AuditScanIdLabel':
					if (!$this->lblAuditScanId) return $this->lblAuditScanId_Create();
					return $this->lblAuditScanId;
				case 'AuditIdControl':
					if (!$this->lstAudit) return $this->lstAudit_Create();
					return $this->lstAudit;
				case 'AuditIdLabel':
					if (!$this->lblAuditId) return $this->lblAuditId_Create();
					return $this->lblAuditId;
				case 'LocationIdControl':
					if (!$this->lstLocation) return $this->lstLocation_Create();
					return $this->lstLocation;
				case 'LocationIdLabel':
					if (!$this->lblLocationId) return $this->lblLocationId_Create();
					return $this->lblLocationId;
				case 'EntityIdControl':
					if (!$this->txtEntityId) return $this->txtEntityId_Create();
					return $this->txtEntityId;
				case 'EntityIdLabel':
					if (!$this->lblEntityId) return $this->lblEntityId_Create();
					return $this->lblEntityId;
				case 'CountControl':
					if (!$this->txtCount) return $this->txtCount_Create();
					return $this->txtCount;
				case 'CountLabel':
					if (!$this->lblCount) return $this->lblCount_Create();
					return $this->lblCount;
				case 'SystemCountControl':
					if (!$this->txtSystemCount) return $this->txtSystemCount_Create();
					return $this->txtSystemCount;
				case 'SystemCountLabel':
					if (!$this->lblSystemCount) return $this->lblSystemCount_Create();
					return $this->lblSystemCount;
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
					// Controls that point to AuditScan fields
					case 'AuditScanIdControl':
						return ($this->lblAuditScanId = QType::Cast($mixValue, 'QControl'));
					case 'AuditIdControl':
						return ($this->lstAudit = QType::Cast($mixValue, 'QControl'));
					case 'LocationIdControl':
						return ($this->lstLocation = QType::Cast($mixValue, 'QControl'));
					case 'EntityIdControl':
						return ($this->txtEntityId = QType::Cast($mixValue, 'QControl'));
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'SystemCountControl':
						return ($this->txtSystemCount = QType::Cast($mixValue, 'QControl'));
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