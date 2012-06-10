<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the NotificationUserAccount class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single NotificationUserAccount object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a NotificationUserAccountMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read NotificationUserAccount $NotificationUserAccount the actual NotificationUserAccount data class being edited
	 * property QLabel $NotificationUserAccountIdControl
	 * property-read QLabel $NotificationUserAccountIdLabel
	 * property QListBox $UserAccountIdControl
	 * property-read QLabel $UserAccountIdLabel
	 * property QListBox $NotificationIdControl
	 * property-read QLabel $NotificationIdLabel
	 * property QTextBox $LevelControl
	 * property-read QLabel $LevelLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class NotificationUserAccountMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var NotificationUserAccount objNotificationUserAccount
		 * @access protected
		 */
		protected $objNotificationUserAccount;

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

		// Controls that allow the editing of NotificationUserAccount's individual data fields
        /**
         * @var QLabel lblNotificationUserAccountId;
         * @access protected
         */
		protected $lblNotificationUserAccountId;

        /**
         * @var QListBox lstUserAccount;
         * @access protected
         */
		protected $lstUserAccount;

        /**
         * @var QListBox lstNotification;
         * @access protected
         */
		protected $lstNotification;

        /**
         * @var QTextBox txtLevel;
         * @access protected
         */
		protected $txtLevel;


		// Controls that allow the viewing of NotificationUserAccount's individual data fields
        /**
         * @var QLabel lblUserAccountId
         * @access protected
         */
		protected $lblUserAccountId;

        /**
         * @var QLabel lblNotificationId
         * @access protected
         */
		protected $lblNotificationId;

        /**
         * @var QLabel lblLevel
         * @access protected
         */
		protected $lblLevel;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * NotificationUserAccountMetaControl to edit a single NotificationUserAccount object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single NotificationUserAccount object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationUserAccountMetaControl
		 * @param NotificationUserAccount $objNotificationUserAccount new or existing NotificationUserAccount object
		 */
		 public function __construct($objParentObject, NotificationUserAccount $objNotificationUserAccount) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this NotificationUserAccountMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked NotificationUserAccount object
			$this->objNotificationUserAccount = $objNotificationUserAccount;

			// Figure out if we're Editing or Creating New
			if ($this->objNotificationUserAccount->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationUserAccountMetaControl
		 * @param integer $intNotificationUserAccountId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing NotificationUserAccount object creation - defaults to CreateOrEdit
 		 * @return NotificationUserAccountMetaControl
		 */
		public static function Create($objParentObject, $intNotificationUserAccountId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intNotificationUserAccountId)) {
				$objNotificationUserAccount = NotificationUserAccount::Load($intNotificationUserAccountId);

				// NotificationUserAccount was found -- return it!
				if ($objNotificationUserAccount)
					return new NotificationUserAccountMetaControl($objParentObject, $objNotificationUserAccount);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a NotificationUserAccount object with PK arguments: ' . $intNotificationUserAccountId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new NotificationUserAccountMetaControl($objParentObject, new NotificationUserAccount());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationUserAccountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing NotificationUserAccount object creation - defaults to CreateOrEdit
		 * @return NotificationUserAccountMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intNotificationUserAccountId = QApplication::PathInfo(0);
			return NotificationUserAccountMetaControl::Create($objParentObject, $intNotificationUserAccountId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NotificationUserAccountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing NotificationUserAccount object creation - defaults to CreateOrEdit
		 * @return NotificationUserAccountMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intNotificationUserAccountId = QApplication::QueryString('intNotificationUserAccountId');
			return NotificationUserAccountMetaControl::Create($objParentObject, $intNotificationUserAccountId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblNotificationUserAccountId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNotificationUserAccountId_Create($strControlId = null) {
			$this->lblNotificationUserAccountId = new QLabel($this->objParentObject, $strControlId);
			$this->lblNotificationUserAccountId->Name = QApplication::Translate('Notification User Account Id');
			if ($this->blnEditMode)
				$this->lblNotificationUserAccountId->Text = $this->objNotificationUserAccount->NotificationUserAccountId;
			else
				$this->lblNotificationUserAccountId->Text = 'N/A';
			return $this->lblNotificationUserAccountId;
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
				if (($this->objNotificationUserAccount->UserAccount) && ($this->objNotificationUserAccount->UserAccount->UserAccountId == $objUserAccount->UserAccountId))
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
			$this->lblUserAccountId->Text = ($this->objNotificationUserAccount->UserAccount) ? $this->objNotificationUserAccount->UserAccount->__toString() : null;
			$this->lblUserAccountId->Required = true;
			return $this->lblUserAccountId;
		}

		/**
		 * Create and setup QListBox lstNotification
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstNotification_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstNotification = new QListBox($this->objParentObject, $strControlId);
			$this->lstNotification->Name = QApplication::Translate('Notification');
			$this->lstNotification->Required = true;
			if (!$this->blnEditMode)
				$this->lstNotification->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objNotificationCursor = Notification::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objNotification = Notification::InstantiateCursor($objNotificationCursor)) {
				$objListItem = new QListItem($objNotification->__toString(), $objNotification->NotificationId);
				if (($this->objNotificationUserAccount->Notification) && ($this->objNotificationUserAccount->Notification->NotificationId == $objNotification->NotificationId))
					$objListItem->Selected = true;
				$this->lstNotification->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstNotification;
		}

		/**
		 * Create and setup QLabel lblNotificationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNotificationId_Create($strControlId = null) {
			$this->lblNotificationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblNotificationId->Name = QApplication::Translate('Notification');
			$this->lblNotificationId->Text = ($this->objNotificationUserAccount->Notification) ? $this->objNotificationUserAccount->Notification->__toString() : null;
			$this->lblNotificationId->Required = true;
			return $this->lblNotificationId;
		}

		/**
		 * Create and setup QTextBox txtLevel
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLevel_Create($strControlId = null) {
			$this->txtLevel = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLevel->Name = QApplication::Translate('Level');
			$this->txtLevel->Text = $this->objNotificationUserAccount->Level;
			return $this->txtLevel;
		}

		/**
		 * Create and setup QLabel lblLevel
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLevel_Create($strControlId = null) {
			$this->lblLevel = new QLabel($this->objParentObject, $strControlId);
			$this->lblLevel->Name = QApplication::Translate('Level');
			$this->lblLevel->Text = $this->objNotificationUserAccount->Level;
			return $this->lblLevel;
		}



		/**
		 * Refresh this MetaControl with Data from the local NotificationUserAccount object.
		 * @param boolean $blnReload reload NotificationUserAccount from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objNotificationUserAccount->Reload();

			if ($this->lblNotificationUserAccountId) if ($this->blnEditMode) $this->lblNotificationUserAccountId->Text = $this->objNotificationUserAccount->NotificationUserAccountId;

			if ($this->lstUserAccount) {
					$this->lstUserAccount->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstUserAccount->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserAccountArray = UserAccount::LoadAll();
				if ($objUserAccountArray) foreach ($objUserAccountArray as $objUserAccount) {
					$objListItem = new QListItem($objUserAccount->__toString(), $objUserAccount->UserAccountId);
					if (($this->objNotificationUserAccount->UserAccount) && ($this->objNotificationUserAccount->UserAccount->UserAccountId == $objUserAccount->UserAccountId))
						$objListItem->Selected = true;
					$this->lstUserAccount->AddItem($objListItem);
				}
			}
			if ($this->lblUserAccountId) $this->lblUserAccountId->Text = ($this->objNotificationUserAccount->UserAccount) ? $this->objNotificationUserAccount->UserAccount->__toString() : null;

			if ($this->lstNotification) {
					$this->lstNotification->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstNotification->AddItem(QApplication::Translate('- Select One -'), null);
				$objNotificationArray = Notification::LoadAll();
				if ($objNotificationArray) foreach ($objNotificationArray as $objNotification) {
					$objListItem = new QListItem($objNotification->__toString(), $objNotification->NotificationId);
					if (($this->objNotificationUserAccount->Notification) && ($this->objNotificationUserAccount->Notification->NotificationId == $objNotification->NotificationId))
						$objListItem->Selected = true;
					$this->lstNotification->AddItem($objListItem);
				}
			}
			if ($this->lblNotificationId) $this->lblNotificationId->Text = ($this->objNotificationUserAccount->Notification) ? $this->objNotificationUserAccount->Notification->__toString() : null;

			if ($this->txtLevel) $this->txtLevel->Text = $this->objNotificationUserAccount->Level;
			if ($this->lblLevel) $this->lblLevel->Text = $this->objNotificationUserAccount->Level;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC NOTIFICATIONUSERACCOUNT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's NotificationUserAccount instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveNotificationUserAccount() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstUserAccount) $this->objNotificationUserAccount->UserAccountId = $this->lstUserAccount->SelectedValue;
				if ($this->lstNotification) $this->objNotificationUserAccount->NotificationId = $this->lstNotification->SelectedValue;
				if ($this->txtLevel) $this->objNotificationUserAccount->Level = $this->txtLevel->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the NotificationUserAccount object
				$this->objNotificationUserAccount->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's NotificationUserAccount instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteNotificationUserAccount() {
			$this->objNotificationUserAccount->Delete();
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
				case 'NotificationUserAccount': return $this->objNotificationUserAccount;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to NotificationUserAccount fields -- will be created dynamically if not yet created
				case 'NotificationUserAccountIdControl':
					if (!$this->lblNotificationUserAccountId) return $this->lblNotificationUserAccountId_Create();
					return $this->lblNotificationUserAccountId;
				case 'NotificationUserAccountIdLabel':
					if (!$this->lblNotificationUserAccountId) return $this->lblNotificationUserAccountId_Create();
					return $this->lblNotificationUserAccountId;
				case 'UserAccountIdControl':
					if (!$this->lstUserAccount) return $this->lstUserAccount_Create();
					return $this->lstUserAccount;
				case 'UserAccountIdLabel':
					if (!$this->lblUserAccountId) return $this->lblUserAccountId_Create();
					return $this->lblUserAccountId;
				case 'NotificationIdControl':
					if (!$this->lstNotification) return $this->lstNotification_Create();
					return $this->lstNotification;
				case 'NotificationIdLabel':
					if (!$this->lblNotificationId) return $this->lblNotificationId_Create();
					return $this->lblNotificationId;
				case 'LevelControl':
					if (!$this->txtLevel) return $this->txtLevel_Create();
					return $this->txtLevel;
				case 'LevelLabel':
					if (!$this->lblLevel) return $this->lblLevel_Create();
					return $this->lblLevel;
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
					// Controls that point to NotificationUserAccount fields
					case 'NotificationUserAccountIdControl':
						return ($this->lblNotificationUserAccountId = QType::Cast($mixValue, 'QControl'));
					case 'UserAccountIdControl':
						return ($this->lstUserAccount = QType::Cast($mixValue, 'QControl'));
					case 'NotificationIdControl':
						return ($this->lstNotification = QType::Cast($mixValue, 'QControl'));
					case 'LevelControl':
						return ($this->txtLevel = QType::Cast($mixValue, 'QControl'));
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