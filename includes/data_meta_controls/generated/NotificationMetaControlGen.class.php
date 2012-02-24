<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Notification class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Notification object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a NotificationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Notification $Notification the actual Notification data class being edited
	 * property QLabel $NotificationIdControl
	 * property-read QLabel $NotificationIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $LongDescriptionControl
	 * property-read QLabel $LongDescriptionLabel
	 * property QTextBox $CriteriaControl
	 * property-read QLabel $CriteriaLabel
	 * property QTextBox $FrequencyControl
	 * property-read QLabel $FrequencyLabel
	 * property QCheckBox $EnabledFlagControl
	 * property-read QLabel $EnabledFlagLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class NotificationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Notification objNotification
		 * @access protected
		 */
		protected $objNotification;

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

		// Controls that allow the editing of Notification's individual data fields
        /**
         * @var QLabel lblNotificationId;
         * @access protected
         */
		protected $lblNotificationId;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtLongDescription;
         * @access protected
         */
		protected $txtLongDescription;

        /**
         * @var QTextBox txtCriteria;
         * @access protected
         */
		protected $txtCriteria;

        /**
         * @var QTextBox txtFrequency;
         * @access protected
         */
		protected $txtFrequency;

        /**
         * @var QCheckBox chkEnabledFlag;
         * @access protected
         */
		protected $chkEnabledFlag;

        /**
         * @var QListBox lstCreatedByObject;
         * @access protected
         */
		protected $lstCreatedByObject;

        /**
         * @var QDateTimePicker calCreationDate;
         * @access protected
         */
		protected $calCreationDate;

        /**
         * @var QListBox lstModifiedByObject;
         * @access protected
         */
		protected $lstModifiedByObject;

        /**
         * @var QLabel lblModifiedDate;
         * @access protected
         */
		protected $lblModifiedDate;


		// Controls that allow the viewing of Notification's individual data fields
        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblLongDescription
         * @access protected
         */
		protected $lblLongDescription;

        /**
         * @var QLabel lblCriteria
         * @access protected
         */
		protected $lblCriteria;

        /**
         * @var QLabel lblFrequency
         * @access protected
         */
		protected $lblFrequency;

        /**
         * @var QLabel lblEnabledFlag
         * @access protected
         */
		protected $lblEnabledFlag;

        /**
         * @var QLabel lblCreatedBy
         * @access protected
         */
		protected $lblCreatedBy;

        /**
         * @var QLabel lblCreationDate
         * @access protected
         */
		protected $lblCreationDate;

        /**
         * @var QLabel lblModifiedBy
         * @access protected
         */
		protected $lblModifiedBy;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * NotificationMetaControl to edit a single Notification object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Notification object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationMetaControl
		 * @param Notification $objNotification new or existing Notification object
		 */
		 public function __construct($objParentObject, Notification $objNotification) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this NotificationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Notification object
			$this->objNotification = $objNotification;

			// Figure out if we're Editing or Creating New
			if ($this->objNotification->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationMetaControl
		 * @param integer $intNotificationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Notification object creation - defaults to CreateOrEdit
 		 * @return NotificationMetaControl
		 */
		public static function Create($objParentObject, $intNotificationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intNotificationId)) {
				$objNotification = Notification::Load($intNotificationId);

				// Notification was found -- return it!
				if ($objNotification)
					return new NotificationMetaControl($objParentObject, $objNotification);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Notification object with PK arguments: ' . $intNotificationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new NotificationMetaControl($objParentObject, new Notification());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Notification object creation - defaults to CreateOrEdit
		 * @return NotificationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intNotificationId = QApplication::PathInfo(0);
			return NotificationMetaControl::Create($objParentObject, $intNotificationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Notification object creation - defaults to CreateOrEdit
		 * @return NotificationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intNotificationId = QApplication::QueryString('intNotificationId');
			return NotificationMetaControl::Create($objParentObject, $intNotificationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblNotificationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNotificationId_Create($strControlId = null) {
			$this->lblNotificationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblNotificationId->Name = QApplication::Translate('Notification Id');
			if ($this->blnEditMode)
				$this->lblNotificationId->Text = $this->objNotification->NotificationId;
			else
				$this->lblNotificationId->Text = 'N/A';
			return $this->lblNotificationId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objNotification->ShortDescription;
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->MaxLength = Notification::ShortDescriptionMaxLength;
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
			$this->lblShortDescription->Text = $this->objNotification->ShortDescription;
			$this->lblShortDescription->Required = true;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLongDescription_Create($strControlId = null) {
			$this->txtLongDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLongDescription->Name = QApplication::Translate('Long Description');
			$this->txtLongDescription->Text = $this->objNotification->LongDescription;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
			return $this->txtLongDescription;
		}

		/**
		 * Create and setup QLabel lblLongDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLongDescription_Create($strControlId = null) {
			$this->lblLongDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblLongDescription->Name = QApplication::Translate('Long Description');
			$this->lblLongDescription->Text = $this->objNotification->LongDescription;
			return $this->lblLongDescription;
		}

		/**
		 * Create and setup QTextBox txtCriteria
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCriteria_Create($strControlId = null) {
			$this->txtCriteria = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCriteria->Name = QApplication::Translate('Criteria');
			$this->txtCriteria->Text = $this->objNotification->Criteria;
			$this->txtCriteria->MaxLength = Notification::CriteriaMaxLength;
			return $this->txtCriteria;
		}

		/**
		 * Create and setup QLabel lblCriteria
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCriteria_Create($strControlId = null) {
			$this->lblCriteria = new QLabel($this->objParentObject, $strControlId);
			$this->lblCriteria->Name = QApplication::Translate('Criteria');
			$this->lblCriteria->Text = $this->objNotification->Criteria;
			return $this->lblCriteria;
		}

		/**
		 * Create and setup QTextBox txtFrequency
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFrequency_Create($strControlId = null) {
			$this->txtFrequency = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFrequency->Name = QApplication::Translate('Frequency');
			$this->txtFrequency->Text = $this->objNotification->Frequency;
			$this->txtFrequency->Required = true;
			return $this->txtFrequency;
		}

		/**
		 * Create and setup QLabel lblFrequency
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFrequency_Create($strControlId = null) {
			$this->lblFrequency = new QLabel($this->objParentObject, $strControlId);
			$this->lblFrequency->Name = QApplication::Translate('Frequency');
			$this->lblFrequency->Text = $this->objNotification->Frequency;
			$this->lblFrequency->Required = true;
			return $this->lblFrequency;
		}

		/**
		 * Create and setup QCheckBox chkEnabledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkEnabledFlag_Create($strControlId = null) {
			$this->chkEnabledFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkEnabledFlag->Name = QApplication::Translate('Enabled Flag');
			$this->chkEnabledFlag->Checked = $this->objNotification->EnabledFlag;
			return $this->chkEnabledFlag;
		}

		/**
		 * Create and setup QLabel lblEnabledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEnabledFlag_Create($strControlId = null) {
			$this->lblEnabledFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblEnabledFlag->Name = QApplication::Translate('Enabled Flag');
			$this->lblEnabledFlag->Text = ($this->objNotification->EnabledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblEnabledFlag;
		}

		/**
		 * Create and setup QListBox lstCreatedByObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreatedByObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreatedByObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreatedByObjectCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreatedByObject = UserAccount::InstantiateCursor($objCreatedByObjectCursor)) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objNotification->CreatedByObject) && ($this->objNotification->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreatedByObject;
		}

		/**
		 * Create and setup QLabel lblCreatedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreatedBy_Create($strControlId = null) {
			$this->lblCreatedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedBy->Name = QApplication::Translate('Created By Object');
			$this->lblCreatedBy->Text = ($this->objNotification->CreatedByObject) ? $this->objNotification->CreatedByObject->__toString() : null;
			return $this->lblCreatedBy;
		}

		/**
		 * Create and setup QDateTimePicker calCreationDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreationDate_Create($strControlId = null) {
			$this->calCreationDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objNotification->CreationDate;
			$this->calCreationDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calCreationDate;
		}

		/**
		 * Create and setup QLabel lblCreationDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreationDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreationDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreationDate->Name = QApplication::Translate('Creation Date');
			$this->strCreationDateDateTimeFormat = $strDateTimeFormat;
			$this->lblCreationDate->Text = sprintf($this->objNotification->CreationDate) ? $this->objNotification->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
			return $this->lblCreationDate;
		}

		protected $strCreationDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstModifiedByObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstModifiedByObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstModifiedByObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstModifiedByObject->Name = QApplication::Translate('Modified By Object');
			$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objModifiedByObjectCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objModifiedByObject = UserAccount::InstantiateCursor($objModifiedByObjectCursor)) {
				$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
				if (($this->objNotification->ModifiedByObject) && ($this->objNotification->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstModifiedByObject;
		}

		/**
		 * Create and setup QLabel lblModifiedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModifiedBy_Create($strControlId = null) {
			$this->lblModifiedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblModifiedBy->Name = QApplication::Translate('Modified By Object');
			$this->lblModifiedBy->Text = ($this->objNotification->ModifiedByObject) ? $this->objNotification->ModifiedByObject->__toString() : null;
			return $this->lblModifiedBy;
		}

		/**
		 * Create and setup QLabel lblModifiedDate
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModifiedDate_Create($strControlId = null) {
			$this->lblModifiedDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblModifiedDate->Name = QApplication::Translate('Modified Date');
			if ($this->blnEditMode)
				$this->lblModifiedDate->Text = $this->objNotification->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local Notification object.
		 * @param boolean $blnReload reload Notification from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objNotification->Reload();

			if ($this->lblNotificationId) if ($this->blnEditMode) $this->lblNotificationId->Text = $this->objNotification->NotificationId;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objNotification->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objNotification->ShortDescription;

			if ($this->txtLongDescription) $this->txtLongDescription->Text = $this->objNotification->LongDescription;
			if ($this->lblLongDescription) $this->lblLongDescription->Text = $this->objNotification->LongDescription;

			if ($this->txtCriteria) $this->txtCriteria->Text = $this->objNotification->Criteria;
			if ($this->lblCriteria) $this->lblCriteria->Text = $this->objNotification->Criteria;

			if ($this->txtFrequency) $this->txtFrequency->Text = $this->objNotification->Frequency;
			if ($this->lblFrequency) $this->lblFrequency->Text = $this->objNotification->Frequency;

			if ($this->chkEnabledFlag) $this->chkEnabledFlag->Checked = $this->objNotification->EnabledFlag;
			if ($this->lblEnabledFlag) $this->lblEnabledFlag->Text = ($this->objNotification->EnabledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objNotification->CreatedByObject) && ($this->objNotification->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objNotification->CreatedByObject) ? $this->objNotification->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objNotification->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objNotification->CreationDate) ? $this->objNotification->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objNotification->ModifiedByObject) && ($this->objNotification->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objNotification->ModifiedByObject) ? $this->objNotification->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objNotification->ModifiedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC NOTIFICATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Notification instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveNotification() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShortDescription) $this->objNotification->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtLongDescription) $this->objNotification->LongDescription = $this->txtLongDescription->Text;
				if ($this->txtCriteria) $this->objNotification->Criteria = $this->txtCriteria->Text;
				if ($this->txtFrequency) $this->objNotification->Frequency = $this->txtFrequency->Text;
				if ($this->chkEnabledFlag) $this->objNotification->EnabledFlag = $this->chkEnabledFlag->Checked;
				if ($this->lstCreatedByObject) $this->objNotification->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objNotification->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objNotification->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Notification object
				$this->objNotification->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Notification instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteNotification() {
			$this->objNotification->Delete();
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
				case 'Notification': return $this->objNotification;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Notification fields -- will be created dynamically if not yet created
				case 'NotificationIdControl':
					if (!$this->lblNotificationId) return $this->lblNotificationId_Create();
					return $this->lblNotificationId;
				case 'NotificationIdLabel':
					if (!$this->lblNotificationId) return $this->lblNotificationId_Create();
					return $this->lblNotificationId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'LongDescriptionControl':
					if (!$this->txtLongDescription) return $this->txtLongDescription_Create();
					return $this->txtLongDescription;
				case 'LongDescriptionLabel':
					if (!$this->lblLongDescription) return $this->lblLongDescription_Create();
					return $this->lblLongDescription;
				case 'CriteriaControl':
					if (!$this->txtCriteria) return $this->txtCriteria_Create();
					return $this->txtCriteria;
				case 'CriteriaLabel':
					if (!$this->lblCriteria) return $this->lblCriteria_Create();
					return $this->lblCriteria;
				case 'FrequencyControl':
					if (!$this->txtFrequency) return $this->txtFrequency_Create();
					return $this->txtFrequency;
				case 'FrequencyLabel':
					if (!$this->lblFrequency) return $this->lblFrequency_Create();
					return $this->lblFrequency;
				case 'EnabledFlagControl':
					if (!$this->chkEnabledFlag) return $this->chkEnabledFlag_Create();
					return $this->chkEnabledFlag;
				case 'EnabledFlagLabel':
					if (!$this->lblEnabledFlag) return $this->lblEnabledFlag_Create();
					return $this->lblEnabledFlag;
				case 'CreatedByControl':
					if (!$this->lstCreatedByObject) return $this->lstCreatedByObject_Create();
					return $this->lstCreatedByObject;
				case 'CreatedByLabel':
					if (!$this->lblCreatedBy) return $this->lblCreatedBy_Create();
					return $this->lblCreatedBy;
				case 'CreationDateControl':
					if (!$this->calCreationDate) return $this->calCreationDate_Create();
					return $this->calCreationDate;
				case 'CreationDateLabel':
					if (!$this->lblCreationDate) return $this->lblCreationDate_Create();
					return $this->lblCreationDate;
				case 'ModifiedByControl':
					if (!$this->lstModifiedByObject) return $this->lstModifiedByObject_Create();
					return $this->lstModifiedByObject;
				case 'ModifiedByLabel':
					if (!$this->lblModifiedBy) return $this->lblModifiedBy_Create();
					return $this->lblModifiedBy;
				case 'ModifiedDateControl':
					if (!$this->lblModifiedDate) return $this->lblModifiedDate_Create();
					return $this->lblModifiedDate;
				case 'ModifiedDateLabel':
					if (!$this->lblModifiedDate) return $this->lblModifiedDate_Create();
					return $this->lblModifiedDate;
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
					// Controls that point to Notification fields
					case 'NotificationIdControl':
						return ($this->lblNotificationId = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'LongDescriptionControl':
						return ($this->txtLongDescription = QType::Cast($mixValue, 'QControl'));
					case 'CriteriaControl':
						return ($this->txtCriteria = QType::Cast($mixValue, 'QControl'));
					case 'FrequencyControl':
						return ($this->txtFrequency = QType::Cast($mixValue, 'QControl'));
					case 'EnabledFlagControl':
						return ($this->chkEnabledFlag = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
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