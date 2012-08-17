<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Attachment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Attachment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AttachmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Attachment $Attachment the actual Attachment data class being edited
	 * property QLabel $AttachmentIdControl
	 * property-read QLabel $AttachmentIdLabel
	 * property QListBox $EntityQtypeIdControl
	 * property-read QLabel $EntityQtypeIdLabel
	 * property QIntegerTextBox $EntityIdControl
	 * property-read QLabel $EntityIdLabel
	 * property QTextBox $FilenameControl
	 * property-read QLabel $FilenameLabel
	 * property QTextBox $TmpFilenameControl
	 * property-read QLabel $TmpFilenameLabel
	 * property QTextBox $FileTypeControl
	 * property-read QLabel $FileTypeLabel
	 * property QTextBox $PathControl
	 * property-read QLabel $PathLabel
	 * property QIntegerTextBox $SizeControl
	 * property-read QLabel $SizeLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AttachmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Attachment objAttachment
		 * @access protected
		 */
		protected $objAttachment;

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

		// Controls that allow the editing of Attachment's individual data fields
        /**
         * @var QLabel lblAttachmentId;
         * @access protected
         */
		protected $lblAttachmentId;

        /**
         * @var QListBox lstEntityQtype;
         * @access protected
         */
		protected $lstEntityQtype;

        /**
         * @var QIntegerTextBox txtEntityId;
         * @access protected
         */
		protected $txtEntityId;

        /**
         * @var QTextBox txtFilename;
         * @access protected
         */
		protected $txtFilename;

        /**
         * @var QTextBox txtTmpFilename;
         * @access protected
         */
		protected $txtTmpFilename;

        /**
         * @var QTextBox txtFileType;
         * @access protected
         */
		protected $txtFileType;

        /**
         * @var QTextBox txtPath;
         * @access protected
         */
		protected $txtPath;

        /**
         * @var QIntegerTextBox txtSize;
         * @access protected
         */
		protected $txtSize;

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


		// Controls that allow the viewing of Attachment's individual data fields
        /**
         * @var QLabel lblEntityQtypeId
         * @access protected
         */
		protected $lblEntityQtypeId;

        /**
         * @var QLabel lblEntityId
         * @access protected
         */
		protected $lblEntityId;

        /**
         * @var QLabel lblFilename
         * @access protected
         */
		protected $lblFilename;

        /**
         * @var QLabel lblTmpFilename
         * @access protected
         */
		protected $lblTmpFilename;

        /**
         * @var QLabel lblFileType
         * @access protected
         */
		protected $lblFileType;

        /**
         * @var QLabel lblPath
         * @access protected
         */
		protected $lblPath;

        /**
         * @var QLabel lblSize
         * @access protected
         */
		protected $lblSize;

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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AttachmentMetaControl to edit a single Attachment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Attachment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttachmentMetaControl
		 * @param Attachment $objAttachment new or existing Attachment object
		 */
		 public function __construct($objParentObject, Attachment $objAttachment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AttachmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Attachment object
			$this->objAttachment = $objAttachment;

			// Figure out if we're Editing or Creating New
			if ($this->objAttachment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttachmentMetaControl
		 * @param integer $intAttachmentId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Attachment object creation - defaults to CreateOrEdit
 		 * @return AttachmentMetaControl
		 */
		public static function Create($objParentObject, $intAttachmentId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAttachmentId)) {
				$objAttachment = Attachment::Load($intAttachmentId);

				// Attachment was found -- return it!
				if ($objAttachment)
					return new AttachmentMetaControl($objParentObject, $objAttachment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Attachment object with PK arguments: ' . $intAttachmentId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AttachmentMetaControl($objParentObject, new Attachment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttachmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Attachment object creation - defaults to CreateOrEdit
		 * @return AttachmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAttachmentId = QApplication::PathInfo(0);
			return AttachmentMetaControl::Create($objParentObject, $intAttachmentId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttachmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Attachment object creation - defaults to CreateOrEdit
		 * @return AttachmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAttachmentId = QApplication::QueryString('intAttachmentId');
			return AttachmentMetaControl::Create($objParentObject, $intAttachmentId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAttachmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAttachmentId_Create($strControlId = null) {
			$this->lblAttachmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAttachmentId->Name = QApplication::Translate('Attachment Id');
			if ($this->blnEditMode)
				$this->lblAttachmentId->Text = $this->objAttachment->AttachmentId;
			else
				$this->lblAttachmentId->Text = 'N/A';
			return $this->lblAttachmentId;
		}

		/**
		 * Create and setup QListBox lstEntityQtype
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstEntityQtype_Create($strControlId = null) {
			$this->lstEntityQtype = new QListBox($this->objParentObject, $strControlId);
			$this->lstEntityQtype->Name = QApplication::Translate('Entity Qtype');
			$this->lstEntityQtype->Required = true;

			$this->lstEntityQtype->AddItems(EntityQtype::$NameArray, $this->objAttachment->EntityQtypeId);
			return $this->lstEntityQtype;
		}

		/**
		 * Create and setup QLabel lblEntityQtypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEntityQtypeId_Create($strControlId = null) {
			$this->lblEntityQtypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEntityQtypeId->Name = QApplication::Translate('Entity Qtype');
			$this->lblEntityQtypeId->Text = ($this->objAttachment->EntityQtypeId) ? EntityQtype::$NameArray[$this->objAttachment->EntityQtypeId] : null;
			$this->lblEntityQtypeId->Required = true;
			return $this->lblEntityQtypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtEntityId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtEntityId_Create($strControlId = null) {
			$this->txtEntityId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtEntityId->Name = QApplication::Translate('Entity Id');
			$this->txtEntityId->Text = $this->objAttachment->EntityId;
			$this->txtEntityId->Required = true;
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
			$this->lblEntityId->Text = $this->objAttachment->EntityId;
			$this->lblEntityId->Required = true;
			$this->lblEntityId->Format = $strFormat;
			return $this->lblEntityId;
		}

		/**
		 * Create and setup QTextBox txtFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFilename_Create($strControlId = null) {
			$this->txtFilename = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFilename->Name = QApplication::Translate('Filename');
			$this->txtFilename->Text = $this->objAttachment->Filename;
			$this->txtFilename->Required = true;
			$this->txtFilename->MaxLength = Attachment::FilenameMaxLength;
			return $this->txtFilename;
		}

		/**
		 * Create and setup QLabel lblFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFilename_Create($strControlId = null) {
			$this->lblFilename = new QLabel($this->objParentObject, $strControlId);
			$this->lblFilename->Name = QApplication::Translate('Filename');
			$this->lblFilename->Text = $this->objAttachment->Filename;
			$this->lblFilename->Required = true;
			return $this->lblFilename;
		}

		/**
		 * Create and setup QTextBox txtTmpFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTmpFilename_Create($strControlId = null) {
			$this->txtTmpFilename = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTmpFilename->Name = QApplication::Translate('Tmp Filename');
			$this->txtTmpFilename->Text = $this->objAttachment->TmpFilename;
			$this->txtTmpFilename->MaxLength = Attachment::TmpFilenameMaxLength;
			return $this->txtTmpFilename;
		}

		/**
		 * Create and setup QLabel lblTmpFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTmpFilename_Create($strControlId = null) {
			$this->lblTmpFilename = new QLabel($this->objParentObject, $strControlId);
			$this->lblTmpFilename->Name = QApplication::Translate('Tmp Filename');
			$this->lblTmpFilename->Text = $this->objAttachment->TmpFilename;
			return $this->lblTmpFilename;
		}

		/**
		 * Create and setup QTextBox txtFileType
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFileType_Create($strControlId = null) {
			$this->txtFileType = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFileType->Name = QApplication::Translate('File Type');
			$this->txtFileType->Text = $this->objAttachment->FileType;
			$this->txtFileType->MaxLength = Attachment::FileTypeMaxLength;
			return $this->txtFileType;
		}

		/**
		 * Create and setup QLabel lblFileType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFileType_Create($strControlId = null) {
			$this->lblFileType = new QLabel($this->objParentObject, $strControlId);
			$this->lblFileType->Name = QApplication::Translate('File Type');
			$this->lblFileType->Text = $this->objAttachment->FileType;
			return $this->lblFileType;
		}

		/**
		 * Create and setup QTextBox txtPath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPath_Create($strControlId = null) {
			$this->txtPath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPath->Name = QApplication::Translate('Path');
			$this->txtPath->Text = $this->objAttachment->Path;
			$this->txtPath->MaxLength = Attachment::PathMaxLength;
			return $this->txtPath;
		}

		/**
		 * Create and setup QLabel lblPath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPath_Create($strControlId = null) {
			$this->lblPath = new QLabel($this->objParentObject, $strControlId);
			$this->lblPath->Name = QApplication::Translate('Path');
			$this->lblPath->Text = $this->objAttachment->Path;
			return $this->lblPath;
		}

		/**
		 * Create and setup QIntegerTextBox txtSize
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSize_Create($strControlId = null) {
			$this->txtSize = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSize->Name = QApplication::Translate('Size');
			$this->txtSize->Text = $this->objAttachment->Size;
			return $this->txtSize;
		}

		/**
		 * Create and setup QLabel lblSize
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSize_Create($strControlId = null, $strFormat = null) {
			$this->lblSize = new QLabel($this->objParentObject, $strControlId);
			$this->lblSize->Name = QApplication::Translate('Size');
			$this->lblSize->Text = $this->objAttachment->Size;
			$this->lblSize->Format = $strFormat;
			return $this->lblSize;
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
			$this->lstCreatedByObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreatedByObjectCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreatedByObject = UserAccount::InstantiateCursor($objCreatedByObjectCursor)) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objAttachment->CreatedByObject) && ($this->objAttachment->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objAttachment->CreatedByObject) ? $this->objAttachment->CreatedByObject->__toString() : null;
			$this->lblCreatedBy->Required = true;
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
			$this->calCreationDate->DateTime = $this->objAttachment->CreationDate;
			$this->calCreationDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calCreationDate->Required = true;
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
			$this->lblCreationDate->Text = sprintf($this->objAttachment->CreationDate) ? $this->objAttachment->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
			$this->lblCreationDate->Required = true;
			return $this->lblCreationDate;
		}

		protected $strCreationDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Attachment object.
		 * @param boolean $blnReload reload Attachment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAttachment->Reload();

			if ($this->lblAttachmentId) if ($this->blnEditMode) $this->lblAttachmentId->Text = $this->objAttachment->AttachmentId;

			if ($this->lstEntityQtype) $this->lstEntityQtype->SelectedValue = $this->objAttachment->EntityQtypeId;
			if ($this->lblEntityQtypeId) $this->lblEntityQtypeId->Text = ($this->objAttachment->EntityQtypeId) ? EntityQtype::$NameArray[$this->objAttachment->EntityQtypeId] : null;

			if ($this->txtEntityId) $this->txtEntityId->Text = $this->objAttachment->EntityId;
			if ($this->lblEntityId) $this->lblEntityId->Text = $this->objAttachment->EntityId;

			if ($this->txtFilename) $this->txtFilename->Text = $this->objAttachment->Filename;
			if ($this->lblFilename) $this->lblFilename->Text = $this->objAttachment->Filename;

			if ($this->txtTmpFilename) $this->txtTmpFilename->Text = $this->objAttachment->TmpFilename;
			if ($this->lblTmpFilename) $this->lblTmpFilename->Text = $this->objAttachment->TmpFilename;

			if ($this->txtFileType) $this->txtFileType->Text = $this->objAttachment->FileType;
			if ($this->lblFileType) $this->lblFileType->Text = $this->objAttachment->FileType;

			if ($this->txtPath) $this->txtPath->Text = $this->objAttachment->Path;
			if ($this->lblPath) $this->lblPath->Text = $this->objAttachment->Path;

			if ($this->txtSize) $this->txtSize->Text = $this->objAttachment->Size;
			if ($this->lblSize) $this->lblSize->Text = $this->objAttachment->Size;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objAttachment->CreatedByObject) && ($this->objAttachment->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objAttachment->CreatedByObject) ? $this->objAttachment->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objAttachment->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objAttachment->CreationDate) ? $this->objAttachment->__toString($this->strCreationDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ATTACHMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Attachment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAttachment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEntityQtype) $this->objAttachment->EntityQtypeId = $this->lstEntityQtype->SelectedValue;
				if ($this->txtEntityId) $this->objAttachment->EntityId = $this->txtEntityId->Text;
				if ($this->txtFilename) $this->objAttachment->Filename = $this->txtFilename->Text;
				if ($this->txtTmpFilename) $this->objAttachment->TmpFilename = $this->txtTmpFilename->Text;
				if ($this->txtFileType) $this->objAttachment->FileType = $this->txtFileType->Text;
				if ($this->txtPath) $this->objAttachment->Path = $this->txtPath->Text;
				if ($this->txtSize) $this->objAttachment->Size = $this->txtSize->Text;
				if ($this->lstCreatedByObject) $this->objAttachment->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objAttachment->CreationDate = $this->calCreationDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Attachment object
				$this->objAttachment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Attachment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAttachment() {
			$this->objAttachment->Delete();
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
				case 'Attachment': return $this->objAttachment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Attachment fields -- will be created dynamically if not yet created
				case 'AttachmentIdControl':
					if (!$this->lblAttachmentId) return $this->lblAttachmentId_Create();
					return $this->lblAttachmentId;
				case 'AttachmentIdLabel':
					if (!$this->lblAttachmentId) return $this->lblAttachmentId_Create();
					return $this->lblAttachmentId;
				case 'EntityQtypeIdControl':
					if (!$this->lstEntityQtype) return $this->lstEntityQtype_Create();
					return $this->lstEntityQtype;
				case 'EntityQtypeIdLabel':
					if (!$this->lblEntityQtypeId) return $this->lblEntityQtypeId_Create();
					return $this->lblEntityQtypeId;
				case 'EntityIdControl':
					if (!$this->txtEntityId) return $this->txtEntityId_Create();
					return $this->txtEntityId;
				case 'EntityIdLabel':
					if (!$this->lblEntityId) return $this->lblEntityId_Create();
					return $this->lblEntityId;
				case 'FilenameControl':
					if (!$this->txtFilename) return $this->txtFilename_Create();
					return $this->txtFilename;
				case 'FilenameLabel':
					if (!$this->lblFilename) return $this->lblFilename_Create();
					return $this->lblFilename;
				case 'TmpFilenameControl':
					if (!$this->txtTmpFilename) return $this->txtTmpFilename_Create();
					return $this->txtTmpFilename;
				case 'TmpFilenameLabel':
					if (!$this->lblTmpFilename) return $this->lblTmpFilename_Create();
					return $this->lblTmpFilename;
				case 'FileTypeControl':
					if (!$this->txtFileType) return $this->txtFileType_Create();
					return $this->txtFileType;
				case 'FileTypeLabel':
					if (!$this->lblFileType) return $this->lblFileType_Create();
					return $this->lblFileType;
				case 'PathControl':
					if (!$this->txtPath) return $this->txtPath_Create();
					return $this->txtPath;
				case 'PathLabel':
					if (!$this->lblPath) return $this->lblPath_Create();
					return $this->lblPath;
				case 'SizeControl':
					if (!$this->txtSize) return $this->txtSize_Create();
					return $this->txtSize;
				case 'SizeLabel':
					if (!$this->lblSize) return $this->lblSize_Create();
					return $this->lblSize;
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
					// Controls that point to Attachment fields
					case 'AttachmentIdControl':
						return ($this->lblAttachmentId = QType::Cast($mixValue, 'QControl'));
					case 'EntityQtypeIdControl':
						return ($this->lstEntityQtype = QType::Cast($mixValue, 'QControl'));
					case 'EntityIdControl':
						return ($this->txtEntityId = QType::Cast($mixValue, 'QControl'));
					case 'FilenameControl':
						return ($this->txtFilename = QType::Cast($mixValue, 'QControl'));
					case 'TmpFilenameControl':
						return ($this->txtTmpFilename = QType::Cast($mixValue, 'QControl'));
					case 'FileTypeControl':
						return ($this->txtFileType = QType::Cast($mixValue, 'QControl'));
					case 'PathControl':
						return ($this->txtPath = QType::Cast($mixValue, 'QControl'));
					case 'SizeControl':
						return ($this->txtSize = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
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