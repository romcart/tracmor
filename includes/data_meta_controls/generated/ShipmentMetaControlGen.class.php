<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Shipment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Shipment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ShipmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Shipment $Shipment the actual Shipment data class being edited
	 * property QLabel $ShipmentIdControl
	 * property-read QLabel $ShipmentIdLabel
	 * property QTextBox $ShipmentNumberControl
	 * property-read QLabel $ShipmentNumberLabel
	 * property QListBox $TransactionIdControl
	 * property-read QLabel $TransactionIdLabel
	 * property QListBox $FromCompanyIdControl
	 * property-read QLabel $FromCompanyIdLabel
	 * property QListBox $FromContactIdControl
	 * property-read QLabel $FromContactIdLabel
	 * property QListBox $FromAddressIdControl
	 * property-read QLabel $FromAddressIdLabel
	 * property QListBox $ToCompanyIdControl
	 * property-read QLabel $ToCompanyIdLabel
	 * property QListBox $ToContactIdControl
	 * property-read QLabel $ToContactIdLabel
	 * property QListBox $ToAddressIdControl
	 * property-read QLabel $ToAddressIdLabel
	 * property QListBox $CourierIdControl
	 * property-read QLabel $CourierIdLabel
	 * property QTextBox $TrackingNumberControl
	 * property-read QLabel $TrackingNumberLabel
	 * property QDateTimePicker $ShipDateControl
	 * property-read QLabel $ShipDateLabel
	 * property QCheckBox $ShippedFlagControl
	 * property-read QLabel $ShippedFlagLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedDateControl
	 * property-read QLabel $ModifiedDateLabel
	 * property QListBox $ShipmentCustomFieldHelperControl
	 * property-read QLabel $ShipmentCustomFieldHelperLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ShipmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Shipment objShipment
		 * @access protected
		 */
		protected $objShipment;

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

		// Controls that allow the editing of Shipment's individual data fields
        /**
         * @var QLabel lblShipmentId;
         * @access protected
         */
		protected $lblShipmentId;

        /**
         * @var QTextBox txtShipmentNumber;
         * @access protected
         */
		protected $txtShipmentNumber;

        /**
         * @var QListBox lstTransaction;
         * @access protected
         */
		protected $lstTransaction;

        /**
         * @var QListBox lstFromCompany;
         * @access protected
         */
		protected $lstFromCompany;

        /**
         * @var QListBox lstFromContact;
         * @access protected
         */
		protected $lstFromContact;

        /**
         * @var QListBox lstFromAddress;
         * @access protected
         */
		protected $lstFromAddress;

        /**
         * @var QListBox lstToCompany;
         * @access protected
         */
		protected $lstToCompany;

        /**
         * @var QListBox lstToContact;
         * @access protected
         */
		protected $lstToContact;

        /**
         * @var QListBox lstToAddress;
         * @access protected
         */
		protected $lstToAddress;

        /**
         * @var QListBox lstCourier;
         * @access protected
         */
		protected $lstCourier;

        /**
         * @var QTextBox txtTrackingNumber;
         * @access protected
         */
		protected $txtTrackingNumber;

        /**
         * @var QDateTimePicker calShipDate;
         * @access protected
         */
		protected $calShipDate;

        /**
         * @var QCheckBox chkShippedFlag;
         * @access protected
         */
		protected $chkShippedFlag;

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


		// Controls that allow the viewing of Shipment's individual data fields
        /**
         * @var QLabel lblShipmentNumber
         * @access protected
         */
		protected $lblShipmentNumber;

        /**
         * @var QLabel lblTransactionId
         * @access protected
         */
		protected $lblTransactionId;

        /**
         * @var QLabel lblFromCompanyId
         * @access protected
         */
		protected $lblFromCompanyId;

        /**
         * @var QLabel lblFromContactId
         * @access protected
         */
		protected $lblFromContactId;

        /**
         * @var QLabel lblFromAddressId
         * @access protected
         */
		protected $lblFromAddressId;

        /**
         * @var QLabel lblToCompanyId
         * @access protected
         */
		protected $lblToCompanyId;

        /**
         * @var QLabel lblToContactId
         * @access protected
         */
		protected $lblToContactId;

        /**
         * @var QLabel lblToAddressId
         * @access protected
         */
		protected $lblToAddressId;

        /**
         * @var QLabel lblCourierId
         * @access protected
         */
		protected $lblCourierId;

        /**
         * @var QLabel lblTrackingNumber
         * @access protected
         */
		protected $lblTrackingNumber;

        /**
         * @var QLabel lblShipDate
         * @access protected
         */
		protected $lblShipDate;

        /**
         * @var QLabel lblShippedFlag
         * @access protected
         */
		protected $lblShippedFlag;

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
        /**
         * @var QListBox lstShipmentCustomFieldHelper
         * @access protected
         */
		protected $lstShipmentCustomFieldHelper;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblShipmentCustomFieldHelper
         * @access protected
         */
		protected $lblShipmentCustomFieldHelper;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ShipmentMetaControl to edit a single Shipment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Shipment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentMetaControl
		 * @param Shipment $objShipment new or existing Shipment object
		 */
		 public function __construct($objParentObject, Shipment $objShipment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ShipmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Shipment object
			$this->objShipment = $objShipment;

			// Figure out if we're Editing or Creating New
			if ($this->objShipment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentMetaControl
		 * @param integer $intShipmentId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Shipment object creation - defaults to CreateOrEdit
 		 * @return ShipmentMetaControl
		 */
		public static function Create($objParentObject, $intShipmentId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intShipmentId)) {
				$objShipment = Shipment::Load($intShipmentId);

				// Shipment was found -- return it!
				if ($objShipment)
					return new ShipmentMetaControl($objParentObject, $objShipment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Shipment object with PK arguments: ' . $intShipmentId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ShipmentMetaControl($objParentObject, new Shipment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Shipment object creation - defaults to CreateOrEdit
		 * @return ShipmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intShipmentId = QApplication::PathInfo(0);
			return ShipmentMetaControl::Create($objParentObject, $intShipmentId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShipmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Shipment object creation - defaults to CreateOrEdit
		 * @return ShipmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intShipmentId = QApplication::QueryString('intShipmentId');
			return ShipmentMetaControl::Create($objParentObject, $intShipmentId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblShipmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShipmentId_Create($strControlId = null) {
			$this->lblShipmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblShipmentId->Name = QApplication::Translate('Shipment Id');
			if ($this->blnEditMode)
				$this->lblShipmentId->Text = $this->objShipment->ShipmentId;
			else
				$this->lblShipmentId->Text = 'N/A';
			return $this->lblShipmentId;
		}

		/**
		 * Create and setup QTextBox txtShipmentNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShipmentNumber_Create($strControlId = null) {
			$this->txtShipmentNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShipmentNumber->Name = QApplication::Translate('Shipment Number');
			$this->txtShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			$this->txtShipmentNumber->Required = true;
			$this->txtShipmentNumber->MaxLength = Shipment::ShipmentNumberMaxLength;
			return $this->txtShipmentNumber;
		}

		/**
		 * Create and setup QLabel lblShipmentNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShipmentNumber_Create($strControlId = null) {
			$this->lblShipmentNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblShipmentNumber->Name = QApplication::Translate('Shipment Number');
			$this->lblShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			$this->lblShipmentNumber->Required = true;
			return $this->lblShipmentNumber;
		}

		/**
		 * Create and setup QListBox lstTransaction
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTransaction_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTransaction = new QListBox($this->objParentObject, $strControlId);
			$this->lstTransaction->Name = QApplication::Translate('Transaction');
			$this->lstTransaction->Required = true;
			if (!$this->blnEditMode)
				$this->lstTransaction->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTransactionCursor = Transaction::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTransaction = Transaction::InstantiateCursor($objTransactionCursor)) {
				$objListItem = new QListItem($objTransaction->__toString(), $objTransaction->TransactionId);
				if (($this->objShipment->Transaction) && ($this->objShipment->Transaction->TransactionId == $objTransaction->TransactionId))
					$objListItem->Selected = true;
				$this->lstTransaction->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTransaction;
		}

		/**
		 * Create and setup QLabel lblTransactionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionId_Create($strControlId = null) {
			$this->lblTransactionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionId->Name = QApplication::Translate('Transaction');
			$this->lblTransactionId->Text = ($this->objShipment->Transaction) ? $this->objShipment->Transaction->__toString() : null;
			$this->lblTransactionId->Required = true;
			return $this->lblTransactionId;
		}

		/**
		 * Create and setup QListBox lstFromCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFromCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFromCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstFromCompany->Name = QApplication::Translate('From Company');
			$this->lstFromCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFromCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFromCompany = Company::InstantiateCursor($objFromCompanyCursor)) {
				$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
				if (($this->objShipment->FromCompany) && ($this->objShipment->FromCompany->CompanyId == $objFromCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstFromCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFromCompany;
		}

		/**
		 * Create and setup QLabel lblFromCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromCompanyId_Create($strControlId = null) {
			$this->lblFromCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromCompanyId->Name = QApplication::Translate('From Company');
			$this->lblFromCompanyId->Text = ($this->objShipment->FromCompany) ? $this->objShipment->FromCompany->__toString() : null;
			$this->lblFromCompanyId->Required = true;
			return $this->lblFromCompanyId;
		}

		/**
		 * Create and setup QListBox lstFromContact
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFromContact_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFromContact = new QListBox($this->objParentObject, $strControlId);
			$this->lstFromContact->Name = QApplication::Translate('From Contact');
			$this->lstFromContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromContact->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFromContactCursor = Contact::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFromContact = Contact::InstantiateCursor($objFromContactCursor)) {
				$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
				if (($this->objShipment->FromContact) && ($this->objShipment->FromContact->ContactId == $objFromContact->ContactId))
					$objListItem->Selected = true;
				$this->lstFromContact->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFromContact;
		}

		/**
		 * Create and setup QLabel lblFromContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromContactId_Create($strControlId = null) {
			$this->lblFromContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromContactId->Name = QApplication::Translate('From Contact');
			$this->lblFromContactId->Text = ($this->objShipment->FromContact) ? $this->objShipment->FromContact->__toString() : null;
			$this->lblFromContactId->Required = true;
			return $this->lblFromContactId;
		}

		/**
		 * Create and setup QListBox lstFromAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFromAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFromAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstFromAddress->Name = QApplication::Translate('From Address');
			$this->lstFromAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstFromAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFromAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFromAddress = Address::InstantiateCursor($objFromAddressCursor)) {
				$objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
				if (($this->objShipment->FromAddress) && ($this->objShipment->FromAddress->AddressId == $objFromAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstFromAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFromAddress;
		}

		/**
		 * Create and setup QLabel lblFromAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromAddressId_Create($strControlId = null) {
			$this->lblFromAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromAddressId->Name = QApplication::Translate('From Address');
			$this->lblFromAddressId->Text = ($this->objShipment->FromAddress) ? $this->objShipment->FromAddress->__toString() : null;
			$this->lblFromAddressId->Required = true;
			return $this->lblFromAddressId;
		}

		/**
		 * Create and setup QListBox lstToCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstToCompany->Name = QApplication::Translate('To Company');
			$this->lstToCompany->Required = true;
			if (!$this->blnEditMode)
				$this->lstToCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToCompany = Company::InstantiateCursor($objToCompanyCursor)) {
				$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
				if (($this->objShipment->ToCompany) && ($this->objShipment->ToCompany->CompanyId == $objToCompany->CompanyId))
					$objListItem->Selected = true;
				$this->lstToCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToCompany;
		}

		/**
		 * Create and setup QLabel lblToCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToCompanyId_Create($strControlId = null) {
			$this->lblToCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToCompanyId->Name = QApplication::Translate('To Company');
			$this->lblToCompanyId->Text = ($this->objShipment->ToCompany) ? $this->objShipment->ToCompany->__toString() : null;
			$this->lblToCompanyId->Required = true;
			return $this->lblToCompanyId;
		}

		/**
		 * Create and setup QListBox lstToContact
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToContact_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToContact = new QListBox($this->objParentObject, $strControlId);
			$this->lstToContact->Name = QApplication::Translate('To Contact');
			$this->lstToContact->Required = true;
			if (!$this->blnEditMode)
				$this->lstToContact->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToContactCursor = Contact::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToContact = Contact::InstantiateCursor($objToContactCursor)) {
				$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
				if (($this->objShipment->ToContact) && ($this->objShipment->ToContact->ContactId == $objToContact->ContactId))
					$objListItem->Selected = true;
				$this->lstToContact->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToContact;
		}

		/**
		 * Create and setup QLabel lblToContactId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToContactId_Create($strControlId = null) {
			$this->lblToContactId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToContactId->Name = QApplication::Translate('To Contact');
			$this->lblToContactId->Text = ($this->objShipment->ToContact) ? $this->objShipment->ToContact->__toString() : null;
			$this->lblToContactId->Required = true;
			return $this->lblToContactId;
		}

		/**
		 * Create and setup QListBox lstToAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstToAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstToAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstToAddress->Name = QApplication::Translate('To Address');
			$this->lstToAddress->Required = true;
			if (!$this->blnEditMode)
				$this->lstToAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objToAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objToAddress = Address::InstantiateCursor($objToAddressCursor)) {
				$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
				if (($this->objShipment->ToAddress) && ($this->objShipment->ToAddress->AddressId == $objToAddress->AddressId))
					$objListItem->Selected = true;
				$this->lstToAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstToAddress;
		}

		/**
		 * Create and setup QLabel lblToAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToAddressId_Create($strControlId = null) {
			$this->lblToAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblToAddressId->Name = QApplication::Translate('To Address');
			$this->lblToAddressId->Text = ($this->objShipment->ToAddress) ? $this->objShipment->ToAddress->__toString() : null;
			$this->lblToAddressId->Required = true;
			return $this->lblToAddressId;
		}

		/**
		 * Create and setup QListBox lstCourier
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCourier_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCourier = new QListBox($this->objParentObject, $strControlId);
			$this->lstCourier->Name = QApplication::Translate('Courier');
			$this->lstCourier->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCourierCursor = Courier::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCourier = Courier::InstantiateCursor($objCourierCursor)) {
				$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
				if (($this->objShipment->Courier) && ($this->objShipment->Courier->CourierId == $objCourier->CourierId))
					$objListItem->Selected = true;
				$this->lstCourier->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCourier;
		}

		/**
		 * Create and setup QLabel lblCourierId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCourierId_Create($strControlId = null) {
			$this->lblCourierId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCourierId->Name = QApplication::Translate('Courier');
			$this->lblCourierId->Text = ($this->objShipment->Courier) ? $this->objShipment->Courier->__toString() : null;
			return $this->lblCourierId;
		}

		/**
		 * Create and setup QTextBox txtTrackingNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTrackingNumber_Create($strControlId = null) {
			$this->txtTrackingNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTrackingNumber->Name = QApplication::Translate('Tracking Number');
			$this->txtTrackingNumber->Text = $this->objShipment->TrackingNumber;
			$this->txtTrackingNumber->MaxLength = Shipment::TrackingNumberMaxLength;
			return $this->txtTrackingNumber;
		}

		/**
		 * Create and setup QLabel lblTrackingNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTrackingNumber_Create($strControlId = null) {
			$this->lblTrackingNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblTrackingNumber->Name = QApplication::Translate('Tracking Number');
			$this->lblTrackingNumber->Text = $this->objShipment->TrackingNumber;
			return $this->lblTrackingNumber;
		}

		/**
		 * Create and setup QDateTimePicker calShipDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calShipDate_Create($strControlId = null) {
			$this->calShipDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calShipDate->Name = QApplication::Translate('Ship Date');
			$this->calShipDate->DateTime = $this->objShipment->ShipDate;
			$this->calShipDate->DateTimePickerType = QDateTimePickerType::Date;
			$this->calShipDate->Required = true;
			return $this->calShipDate;
		}

		/**
		 * Create and setup QLabel lblShipDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblShipDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblShipDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblShipDate->Name = QApplication::Translate('Ship Date');
			$this->strShipDateDateTimeFormat = $strDateTimeFormat;
			$this->lblShipDate->Text = sprintf($this->objShipment->ShipDate) ? $this->objShipment->ShipDate->__toString($this->strShipDateDateTimeFormat) : null;
			$this->lblShipDate->Required = true;
			return $this->lblShipDate;
		}

		protected $strShipDateDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkShippedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkShippedFlag_Create($strControlId = null) {
			$this->chkShippedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkShippedFlag->Name = QApplication::Translate('Shipped Flag');
			$this->chkShippedFlag->Checked = $this->objShipment->ShippedFlag;
			return $this->chkShippedFlag;
		}

		/**
		 * Create and setup QLabel lblShippedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShippedFlag_Create($strControlId = null) {
			$this->lblShippedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblShippedFlag->Name = QApplication::Translate('Shipped Flag');
			$this->lblShippedFlag->Text = ($this->objShipment->ShippedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblShippedFlag;
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
				if (($this->objShipment->CreatedByObject) && ($this->objShipment->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
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
			$this->lblCreatedBy->Text = ($this->objShipment->CreatedByObject) ? $this->objShipment->CreatedByObject->__toString() : null;
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
			$this->calCreationDate->DateTime = $this->objShipment->CreationDate;
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
			$this->lblCreationDate->Text = sprintf($this->objShipment->CreationDate) ? $this->objShipment->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
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
				if (($this->objShipment->ModifiedByObject) && ($this->objShipment->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
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
			$this->lblModifiedBy->Text = ($this->objShipment->ModifiedByObject) ? $this->objShipment->ModifiedByObject->__toString() : null;
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
				$this->lblModifiedDate->Text = $this->objShipment->ModifiedDate;
			else
				$this->lblModifiedDate->Text = 'N/A';
			return $this->lblModifiedDate;
		}

		/**
		 * Create and setup QListBox lstShipmentCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstShipmentCustomFieldHelper_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstShipmentCustomFieldHelper = new QListBox($this->objParentObject, $strControlId);
			$this->lstShipmentCustomFieldHelper->Name = QApplication::Translate('Shipment Custom Field Helper');
			$this->lstShipmentCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objShipmentCustomFieldHelperCursor = ShipmentCustomFieldHelper::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objShipmentCustomFieldHelper = ShipmentCustomFieldHelper::InstantiateCursor($objShipmentCustomFieldHelperCursor)) {
				$objListItem = new QListItem($objShipmentCustomFieldHelper->__toString(), $objShipmentCustomFieldHelper->ShipmentId);
				if ($objShipmentCustomFieldHelper->ShipmentId == $this->objShipment->ShipmentId)
					$objListItem->Selected = true;
				$this->lstShipmentCustomFieldHelper->AddItem($objListItem);
			}

			// Because ShipmentCustomFieldHelper's ShipmentCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
			if ($this->lstShipmentCustomFieldHelper->SelectedValue)
				$this->lstShipmentCustomFieldHelper->Enabled = false;

			// Return the QListBox
			return $this->lstShipmentCustomFieldHelper;
		}

		/**
		 * Create and setup QLabel lblShipmentCustomFieldHelper
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShipmentCustomFieldHelper_Create($strControlId = null) {
			$this->lblShipmentCustomFieldHelper = new QLabel($this->objParentObject, $strControlId);
			$this->lblShipmentCustomFieldHelper->Name = QApplication::Translate('Shipment Custom Field Helper');
			$this->lblShipmentCustomFieldHelper->Text = ($this->objShipment->ShipmentCustomFieldHelper) ? $this->objShipment->ShipmentCustomFieldHelper->__toString() : null;
			return $this->lblShipmentCustomFieldHelper;
		}



		/**
		 * Refresh this MetaControl with Data from the local Shipment object.
		 * @param boolean $blnReload reload Shipment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objShipment->Reload();

			if ($this->lblShipmentId) if ($this->blnEditMode) $this->lblShipmentId->Text = $this->objShipment->ShipmentId;

			if ($this->txtShipmentNumber) $this->txtShipmentNumber->Text = $this->objShipment->ShipmentNumber;
			if ($this->lblShipmentNumber) $this->lblShipmentNumber->Text = $this->objShipment->ShipmentNumber;

			if ($this->lstTransaction) {
					$this->lstTransaction->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTransaction->AddItem(QApplication::Translate('- Select One -'), null);
				$objTransactionArray = Transaction::LoadAll();
				if ($objTransactionArray) foreach ($objTransactionArray as $objTransaction) {
					$objListItem = new QListItem($objTransaction->__toString(), $objTransaction->TransactionId);
					if (($this->objShipment->Transaction) && ($this->objShipment->Transaction->TransactionId == $objTransaction->TransactionId))
						$objListItem->Selected = true;
					$this->lstTransaction->AddItem($objListItem);
				}
			}
			if ($this->lblTransactionId) $this->lblTransactionId->Text = ($this->objShipment->Transaction) ? $this->objShipment->Transaction->__toString() : null;

			if ($this->lstFromCompany) {
					$this->lstFromCompany->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstFromCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objFromCompanyArray = Company::LoadAll();
				if ($objFromCompanyArray) foreach ($objFromCompanyArray as $objFromCompany) {
					$objListItem = new QListItem($objFromCompany->__toString(), $objFromCompany->CompanyId);
					if (($this->objShipment->FromCompany) && ($this->objShipment->FromCompany->CompanyId == $objFromCompany->CompanyId))
						$objListItem->Selected = true;
					$this->lstFromCompany->AddItem($objListItem);
				}
			}
			if ($this->lblFromCompanyId) $this->lblFromCompanyId->Text = ($this->objShipment->FromCompany) ? $this->objShipment->FromCompany->__toString() : null;

			if ($this->lstFromContact) {
					$this->lstFromContact->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstFromContact->AddItem(QApplication::Translate('- Select One -'), null);
				$objFromContactArray = Contact::LoadAll();
				if ($objFromContactArray) foreach ($objFromContactArray as $objFromContact) {
					$objListItem = new QListItem($objFromContact->__toString(), $objFromContact->ContactId);
					if (($this->objShipment->FromContact) && ($this->objShipment->FromContact->ContactId == $objFromContact->ContactId))
						$objListItem->Selected = true;
					$this->lstFromContact->AddItem($objListItem);
				}
			}
			if ($this->lblFromContactId) $this->lblFromContactId->Text = ($this->objShipment->FromContact) ? $this->objShipment->FromContact->__toString() : null;

			if ($this->lstFromAddress) {
					$this->lstFromAddress->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstFromAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objFromAddressArray = Address::LoadAll();
				if ($objFromAddressArray) foreach ($objFromAddressArray as $objFromAddress) {
					$objListItem = new QListItem($objFromAddress->__toString(), $objFromAddress->AddressId);
					if (($this->objShipment->FromAddress) && ($this->objShipment->FromAddress->AddressId == $objFromAddress->AddressId))
						$objListItem->Selected = true;
					$this->lstFromAddress->AddItem($objListItem);
				}
			}
			if ($this->lblFromAddressId) $this->lblFromAddressId->Text = ($this->objShipment->FromAddress) ? $this->objShipment->FromAddress->__toString() : null;

			if ($this->lstToCompany) {
					$this->lstToCompany->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstToCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objToCompanyArray = Company::LoadAll();
				if ($objToCompanyArray) foreach ($objToCompanyArray as $objToCompany) {
					$objListItem = new QListItem($objToCompany->__toString(), $objToCompany->CompanyId);
					if (($this->objShipment->ToCompany) && ($this->objShipment->ToCompany->CompanyId == $objToCompany->CompanyId))
						$objListItem->Selected = true;
					$this->lstToCompany->AddItem($objListItem);
				}
			}
			if ($this->lblToCompanyId) $this->lblToCompanyId->Text = ($this->objShipment->ToCompany) ? $this->objShipment->ToCompany->__toString() : null;

			if ($this->lstToContact) {
					$this->lstToContact->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstToContact->AddItem(QApplication::Translate('- Select One -'), null);
				$objToContactArray = Contact::LoadAll();
				if ($objToContactArray) foreach ($objToContactArray as $objToContact) {
					$objListItem = new QListItem($objToContact->__toString(), $objToContact->ContactId);
					if (($this->objShipment->ToContact) && ($this->objShipment->ToContact->ContactId == $objToContact->ContactId))
						$objListItem->Selected = true;
					$this->lstToContact->AddItem($objListItem);
				}
			}
			if ($this->lblToContactId) $this->lblToContactId->Text = ($this->objShipment->ToContact) ? $this->objShipment->ToContact->__toString() : null;

			if ($this->lstToAddress) {
					$this->lstToAddress->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstToAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objToAddressArray = Address::LoadAll();
				if ($objToAddressArray) foreach ($objToAddressArray as $objToAddress) {
					$objListItem = new QListItem($objToAddress->__toString(), $objToAddress->AddressId);
					if (($this->objShipment->ToAddress) && ($this->objShipment->ToAddress->AddressId == $objToAddress->AddressId))
						$objListItem->Selected = true;
					$this->lstToAddress->AddItem($objListItem);
				}
			}
			if ($this->lblToAddressId) $this->lblToAddressId->Text = ($this->objShipment->ToAddress) ? $this->objShipment->ToAddress->__toString() : null;

			if ($this->lstCourier) {
					$this->lstCourier->RemoveAllItems();
				$this->lstCourier->AddItem(QApplication::Translate('- Select One -'), null);
				$objCourierArray = Courier::LoadAll();
				if ($objCourierArray) foreach ($objCourierArray as $objCourier) {
					$objListItem = new QListItem($objCourier->__toString(), $objCourier->CourierId);
					if (($this->objShipment->Courier) && ($this->objShipment->Courier->CourierId == $objCourier->CourierId))
						$objListItem->Selected = true;
					$this->lstCourier->AddItem($objListItem);
				}
			}
			if ($this->lblCourierId) $this->lblCourierId->Text = ($this->objShipment->Courier) ? $this->objShipment->Courier->__toString() : null;

			if ($this->txtTrackingNumber) $this->txtTrackingNumber->Text = $this->objShipment->TrackingNumber;
			if ($this->lblTrackingNumber) $this->lblTrackingNumber->Text = $this->objShipment->TrackingNumber;

			if ($this->calShipDate) $this->calShipDate->DateTime = $this->objShipment->ShipDate;
			if ($this->lblShipDate) $this->lblShipDate->Text = sprintf($this->objShipment->ShipDate) ? $this->objShipment->__toString($this->strShipDateDateTimeFormat) : null;

			if ($this->chkShippedFlag) $this->chkShippedFlag->Checked = $this->objShipment->ShippedFlag;
			if ($this->lblShippedFlag) $this->lblShippedFlag->Text = ($this->objShipment->ShippedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objShipment->CreatedByObject) && ($this->objShipment->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objShipment->CreatedByObject) ? $this->objShipment->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objShipment->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objShipment->CreationDate) ? $this->objShipment->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = UserAccount::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->UserAccountId);
					if (($this->objShipment->ModifiedByObject) && ($this->objShipment->ModifiedByObject->UserAccountId == $objModifiedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objShipment->ModifiedByObject) ? $this->objShipment->ModifiedByObject->__toString() : null;

			if ($this->lblModifiedDate) if ($this->blnEditMode) $this->lblModifiedDate->Text = $this->objShipment->ModifiedDate;

			if ($this->lstShipmentCustomFieldHelper) {
				$this->lstShipmentCustomFieldHelper->RemoveAllItems();
				$this->lstShipmentCustomFieldHelper->AddItem(QApplication::Translate('- Select One -'), null);
				$objShipmentCustomFieldHelperArray = ShipmentCustomFieldHelper::LoadAll();
				if ($objShipmentCustomFieldHelperArray) foreach ($objShipmentCustomFieldHelperArray as $objShipmentCustomFieldHelper) {
					$objListItem = new QListItem($objShipmentCustomFieldHelper->__toString(), $objShipmentCustomFieldHelper->ShipmentId);
					if ($objShipmentCustomFieldHelper->ShipmentId == $this->objShipment->ShipmentId)
						$objListItem->Selected = true;
					$this->lstShipmentCustomFieldHelper->AddItem($objListItem);
				}
				// Because ShipmentCustomFieldHelper's ShipmentCustomFieldHelper is not null, if a value is already selected, it cannot be changed.
				if ($this->lstShipmentCustomFieldHelper->SelectedValue)
					$this->lstShipmentCustomFieldHelper->Enabled = false;
				else
					$this->lstShipmentCustomFieldHelper->Enabled = true;
			}
			if ($this->lblShipmentCustomFieldHelper) $this->lblShipmentCustomFieldHelper->Text = ($this->objShipment->ShipmentCustomFieldHelper) ? $this->objShipment->ShipmentCustomFieldHelper->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SHIPMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Shipment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveShipment() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtShipmentNumber) $this->objShipment->ShipmentNumber = $this->txtShipmentNumber->Text;
				if ($this->lstTransaction) $this->objShipment->TransactionId = $this->lstTransaction->SelectedValue;
				if ($this->lstFromCompany) $this->objShipment->FromCompanyId = $this->lstFromCompany->SelectedValue;
				if ($this->lstFromContact) $this->objShipment->FromContactId = $this->lstFromContact->SelectedValue;
				if ($this->lstFromAddress) $this->objShipment->FromAddressId = $this->lstFromAddress->SelectedValue;
				if ($this->lstToCompany) $this->objShipment->ToCompanyId = $this->lstToCompany->SelectedValue;
				if ($this->lstToContact) $this->objShipment->ToContactId = $this->lstToContact->SelectedValue;
				if ($this->lstToAddress) $this->objShipment->ToAddressId = $this->lstToAddress->SelectedValue;
				if ($this->lstCourier) $this->objShipment->CourierId = $this->lstCourier->SelectedValue;
				if ($this->txtTrackingNumber) $this->objShipment->TrackingNumber = $this->txtTrackingNumber->Text;
				if ($this->calShipDate) $this->objShipment->ShipDate = $this->calShipDate->DateTime;
				if ($this->chkShippedFlag) $this->objShipment->ShippedFlag = $this->chkShippedFlag->Checked;
				if ($this->lstCreatedByObject) $this->objShipment->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objShipment->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstModifiedByObject) $this->objShipment->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstShipmentCustomFieldHelper) $this->objShipment->ShipmentCustomFieldHelper = ShipmentCustomFieldHelper::Load($this->lstShipmentCustomFieldHelper->SelectedValue);

				// Save the Shipment object
				$this->objShipment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Shipment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteShipment() {
			$this->objShipment->Delete();
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
				case 'Shipment': return $this->objShipment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Shipment fields -- will be created dynamically if not yet created
				case 'ShipmentIdControl':
					if (!$this->lblShipmentId) return $this->lblShipmentId_Create();
					return $this->lblShipmentId;
				case 'ShipmentIdLabel':
					if (!$this->lblShipmentId) return $this->lblShipmentId_Create();
					return $this->lblShipmentId;
				case 'ShipmentNumberControl':
					if (!$this->txtShipmentNumber) return $this->txtShipmentNumber_Create();
					return $this->txtShipmentNumber;
				case 'ShipmentNumberLabel':
					if (!$this->lblShipmentNumber) return $this->lblShipmentNumber_Create();
					return $this->lblShipmentNumber;
				case 'TransactionIdControl':
					if (!$this->lstTransaction) return $this->lstTransaction_Create();
					return $this->lstTransaction;
				case 'TransactionIdLabel':
					if (!$this->lblTransactionId) return $this->lblTransactionId_Create();
					return $this->lblTransactionId;
				case 'FromCompanyIdControl':
					if (!$this->lstFromCompany) return $this->lstFromCompany_Create();
					return $this->lstFromCompany;
				case 'FromCompanyIdLabel':
					if (!$this->lblFromCompanyId) return $this->lblFromCompanyId_Create();
					return $this->lblFromCompanyId;
				case 'FromContactIdControl':
					if (!$this->lstFromContact) return $this->lstFromContact_Create();
					return $this->lstFromContact;
				case 'FromContactIdLabel':
					if (!$this->lblFromContactId) return $this->lblFromContactId_Create();
					return $this->lblFromContactId;
				case 'FromAddressIdControl':
					if (!$this->lstFromAddress) return $this->lstFromAddress_Create();
					return $this->lstFromAddress;
				case 'FromAddressIdLabel':
					if (!$this->lblFromAddressId) return $this->lblFromAddressId_Create();
					return $this->lblFromAddressId;
				case 'ToCompanyIdControl':
					if (!$this->lstToCompany) return $this->lstToCompany_Create();
					return $this->lstToCompany;
				case 'ToCompanyIdLabel':
					if (!$this->lblToCompanyId) return $this->lblToCompanyId_Create();
					return $this->lblToCompanyId;
				case 'ToContactIdControl':
					if (!$this->lstToContact) return $this->lstToContact_Create();
					return $this->lstToContact;
				case 'ToContactIdLabel':
					if (!$this->lblToContactId) return $this->lblToContactId_Create();
					return $this->lblToContactId;
				case 'ToAddressIdControl':
					if (!$this->lstToAddress) return $this->lstToAddress_Create();
					return $this->lstToAddress;
				case 'ToAddressIdLabel':
					if (!$this->lblToAddressId) return $this->lblToAddressId_Create();
					return $this->lblToAddressId;
				case 'CourierIdControl':
					if (!$this->lstCourier) return $this->lstCourier_Create();
					return $this->lstCourier;
				case 'CourierIdLabel':
					if (!$this->lblCourierId) return $this->lblCourierId_Create();
					return $this->lblCourierId;
				case 'TrackingNumberControl':
					if (!$this->txtTrackingNumber) return $this->txtTrackingNumber_Create();
					return $this->txtTrackingNumber;
				case 'TrackingNumberLabel':
					if (!$this->lblTrackingNumber) return $this->lblTrackingNumber_Create();
					return $this->lblTrackingNumber;
				case 'ShipDateControl':
					if (!$this->calShipDate) return $this->calShipDate_Create();
					return $this->calShipDate;
				case 'ShipDateLabel':
					if (!$this->lblShipDate) return $this->lblShipDate_Create();
					return $this->lblShipDate;
				case 'ShippedFlagControl':
					if (!$this->chkShippedFlag) return $this->chkShippedFlag_Create();
					return $this->chkShippedFlag;
				case 'ShippedFlagLabel':
					if (!$this->lblShippedFlag) return $this->lblShippedFlag_Create();
					return $this->lblShippedFlag;
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
				case 'ShipmentCustomFieldHelperControl':
					if (!$this->lstShipmentCustomFieldHelper) return $this->lstShipmentCustomFieldHelper_Create();
					return $this->lstShipmentCustomFieldHelper;
				case 'ShipmentCustomFieldHelperLabel':
					if (!$this->lblShipmentCustomFieldHelper) return $this->lblShipmentCustomFieldHelper_Create();
					return $this->lblShipmentCustomFieldHelper;
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
					// Controls that point to Shipment fields
					case 'ShipmentIdControl':
						return ($this->lblShipmentId = QType::Cast($mixValue, 'QControl'));
					case 'ShipmentNumberControl':
						return ($this->txtShipmentNumber = QType::Cast($mixValue, 'QControl'));
					case 'TransactionIdControl':
						return ($this->lstTransaction = QType::Cast($mixValue, 'QControl'));
					case 'FromCompanyIdControl':
						return ($this->lstFromCompany = QType::Cast($mixValue, 'QControl'));
					case 'FromContactIdControl':
						return ($this->lstFromContact = QType::Cast($mixValue, 'QControl'));
					case 'FromAddressIdControl':
						return ($this->lstFromAddress = QType::Cast($mixValue, 'QControl'));
					case 'ToCompanyIdControl':
						return ($this->lstToCompany = QType::Cast($mixValue, 'QControl'));
					case 'ToContactIdControl':
						return ($this->lstToContact = QType::Cast($mixValue, 'QControl'));
					case 'ToAddressIdControl':
						return ($this->lstToAddress = QType::Cast($mixValue, 'QControl'));
					case 'CourierIdControl':
						return ($this->lstCourier = QType::Cast($mixValue, 'QControl'));
					case 'TrackingNumberControl':
						return ($this->txtTrackingNumber = QType::Cast($mixValue, 'QControl'));
					case 'ShipDateControl':
						return ($this->calShipDate = QType::Cast($mixValue, 'QControl'));
					case 'ShippedFlagControl':
						return ($this->chkShippedFlag = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedDateControl':
						return ($this->lblModifiedDate = QType::Cast($mixValue, 'QControl'));
					case 'ShipmentCustomFieldHelperControl':
						return ($this->lstShipmentCustomFieldHelper = QType::Cast($mixValue, 'QControl'));
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