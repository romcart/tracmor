<?php
	/**
	 * The abstract UserAccountGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the UserAccount subclass which
	 * extends this UserAccountGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the UserAccount class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $UserAccountId the value for intUserAccountId (Read-Only PK)
	 * @property string $FirstName the value for strFirstName (Not Null)
	 * @property string $LastName the value for strLastName (Not Null)
	 * @property string $Username the value for strUsername (Unique)
	 * @property string $PasswordHash the value for strPasswordHash (Not Null)
	 * @property string $EmailAddress the value for strEmailAddress 
	 * @property boolean $ActiveFlag the value for blnActiveFlag (Not Null)
	 * @property boolean $AdminFlag the value for blnAdminFlag (Not Null)
	 * @property boolean $PortableAccessFlag the value for blnPortableAccessFlag 
	 * @property integer $PortableUserPin the value for intPortableUserPin 
	 * @property integer $RoleId the value for intRoleId (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $ModifiedDate the value for strModifiedDate (Read-Only Timestamp)
	 * @property Role $Role the value for the Role object referenced by intRoleId (Not Null)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy 
	 * @property UserAccount $ModifiedByObject the value for the UserAccount object referenced by intModifiedBy 
	 * @property Address $_AddressAsCreatedBy the value for the private _objAddressAsCreatedBy (Read-Only) if set due to an expansion on the address.created_by reverse relationship
	 * @property Address[] $_AddressAsCreatedByArray the value for the private _objAddressAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the address.created_by reverse relationship
	 * @property Address $_AddressAsModifiedBy the value for the private _objAddressAsModifiedBy (Read-Only) if set due to an expansion on the address.modified_by reverse relationship
	 * @property Address[] $_AddressAsModifiedByArray the value for the private _objAddressAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the address.modified_by reverse relationship
	 * @property Asset $_AssetAsModifiedBy the value for the private _objAssetAsModifiedBy (Read-Only) if set due to an expansion on the asset.modified_by reverse relationship
	 * @property Asset[] $_AssetAsModifiedByArray the value for the private _objAssetAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the asset.modified_by reverse relationship
	 * @property Asset $_AssetAsCreatedBy the value for the private _objAssetAsCreatedBy (Read-Only) if set due to an expansion on the asset.created_by reverse relationship
	 * @property Asset[] $_AssetAsCreatedByArray the value for the private _objAssetAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the asset.created_by reverse relationship
	 * @property AssetModel $_AssetModelAsModifiedBy the value for the private _objAssetModelAsModifiedBy (Read-Only) if set due to an expansion on the asset_model.modified_by reverse relationship
	 * @property AssetModel[] $_AssetModelAsModifiedByArray the value for the private _objAssetModelAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the asset_model.modified_by reverse relationship
	 * @property AssetModel $_AssetModelAsCreatedBy the value for the private _objAssetModelAsCreatedBy (Read-Only) if set due to an expansion on the asset_model.created_by reverse relationship
	 * @property AssetModel[] $_AssetModelAsCreatedByArray the value for the private _objAssetModelAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the asset_model.created_by reverse relationship
	 * @property AssetTransaction $_AssetTransactionAsCreatedBy the value for the private _objAssetTransactionAsCreatedBy (Read-Only) if set due to an expansion on the asset_transaction.created_by reverse relationship
	 * @property AssetTransaction[] $_AssetTransactionAsCreatedByArray the value for the private _objAssetTransactionAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction.created_by reverse relationship
	 * @property AssetTransaction $_AssetTransactionAsModifiedBy the value for the private _objAssetTransactionAsModifiedBy (Read-Only) if set due to an expansion on the asset_transaction.modified_by reverse relationship
	 * @property AssetTransaction[] $_AssetTransactionAsModifiedByArray the value for the private _objAssetTransactionAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction.modified_by reverse relationship
	 * @property AssetTransactionCheckout $_AssetTransactionCheckoutAsToUser the value for the private _objAssetTransactionCheckoutAsToUser (Read-Only) if set due to an expansion on the asset_transaction_checkout.to_user_id reverse relationship
	 * @property AssetTransactionCheckout[] $_AssetTransactionCheckoutAsToUserArray the value for the private _objAssetTransactionCheckoutAsToUserArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction_checkout.to_user_id reverse relationship
	 * @property AssetTransactionCheckout $_AssetTransactionCheckoutAsCreatedBy the value for the private _objAssetTransactionCheckoutAsCreatedBy (Read-Only) if set due to an expansion on the asset_transaction_checkout.created_by reverse relationship
	 * @property AssetTransactionCheckout[] $_AssetTransactionCheckoutAsCreatedByArray the value for the private _objAssetTransactionCheckoutAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction_checkout.created_by reverse relationship
	 * @property AssetTransactionCheckout $_AssetTransactionCheckoutAsModifiedBy the value for the private _objAssetTransactionCheckoutAsModifiedBy (Read-Only) if set due to an expansion on the asset_transaction_checkout.modified_by reverse relationship
	 * @property AssetTransactionCheckout[] $_AssetTransactionCheckoutAsModifiedByArray the value for the private _objAssetTransactionCheckoutAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the asset_transaction_checkout.modified_by reverse relationship
	 * @property Attachment $_AttachmentAsCreatedBy the value for the private _objAttachmentAsCreatedBy (Read-Only) if set due to an expansion on the attachment.created_by reverse relationship
	 * @property Attachment[] $_AttachmentAsCreatedByArray the value for the private _objAttachmentAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the attachment.created_by reverse relationship
	 * @property Audit $_AuditAsModifiedBy the value for the private _objAuditAsModifiedBy (Read-Only) if set due to an expansion on the audit.modified_by reverse relationship
	 * @property Audit[] $_AuditAsModifiedByArray the value for the private _objAuditAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the audit.modified_by reverse relationship
	 * @property Audit $_AuditAsCreatedBy the value for the private _objAuditAsCreatedBy (Read-Only) if set due to an expansion on the audit.created_by reverse relationship
	 * @property Audit[] $_AuditAsCreatedByArray the value for the private _objAuditAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the audit.created_by reverse relationship
	 * @property Category $_CategoryAsModifiedBy the value for the private _objCategoryAsModifiedBy (Read-Only) if set due to an expansion on the category.modified_by reverse relationship
	 * @property Category[] $_CategoryAsModifiedByArray the value for the private _objCategoryAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the category.modified_by reverse relationship
	 * @property Category $_CategoryAsCreatedBy the value for the private _objCategoryAsCreatedBy (Read-Only) if set due to an expansion on the category.created_by reverse relationship
	 * @property Category[] $_CategoryAsCreatedByArray the value for the private _objCategoryAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the category.created_by reverse relationship
	 * @property Company $_CompanyAsModifiedBy the value for the private _objCompanyAsModifiedBy (Read-Only) if set due to an expansion on the company.modified_by reverse relationship
	 * @property Company[] $_CompanyAsModifiedByArray the value for the private _objCompanyAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the company.modified_by reverse relationship
	 * @property Company $_CompanyAsCreatedBy the value for the private _objCompanyAsCreatedBy (Read-Only) if set due to an expansion on the company.created_by reverse relationship
	 * @property Company[] $_CompanyAsCreatedByArray the value for the private _objCompanyAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the company.created_by reverse relationship
	 * @property Contact $_ContactAsModifiedBy the value for the private _objContactAsModifiedBy (Read-Only) if set due to an expansion on the contact.modified_by reverse relationship
	 * @property Contact[] $_ContactAsModifiedByArray the value for the private _objContactAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the contact.modified_by reverse relationship
	 * @property Contact $_ContactAsCreatedBy the value for the private _objContactAsCreatedBy (Read-Only) if set due to an expansion on the contact.created_by reverse relationship
	 * @property Contact[] $_ContactAsCreatedByArray the value for the private _objContactAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the contact.created_by reverse relationship
	 * @property CustomField $_CustomFieldAsModifiedBy the value for the private _objCustomFieldAsModifiedBy (Read-Only) if set due to an expansion on the custom_field.modified_by reverse relationship
	 * @property CustomField[] $_CustomFieldAsModifiedByArray the value for the private _objCustomFieldAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the custom_field.modified_by reverse relationship
	 * @property CustomField $_CustomFieldAsCreatedBy the value for the private _objCustomFieldAsCreatedBy (Read-Only) if set due to an expansion on the custom_field.created_by reverse relationship
	 * @property CustomField[] $_CustomFieldAsCreatedByArray the value for the private _objCustomFieldAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the custom_field.created_by reverse relationship
	 * @property CustomFieldValue $_CustomFieldValueAsCreatedBy the value for the private _objCustomFieldValueAsCreatedBy (Read-Only) if set due to an expansion on the custom_field_value.created_by reverse relationship
	 * @property CustomFieldValue[] $_CustomFieldValueAsCreatedByArray the value for the private _objCustomFieldValueAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the custom_field_value.created_by reverse relationship
	 * @property CustomFieldValue $_CustomFieldValueAsModifiedBy the value for the private _objCustomFieldValueAsModifiedBy (Read-Only) if set due to an expansion on the custom_field_value.modified_by reverse relationship
	 * @property CustomFieldValue[] $_CustomFieldValueAsModifiedByArray the value for the private _objCustomFieldValueAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the custom_field_value.modified_by reverse relationship
	 * @property DatagridColumnPreference $_DatagridColumnPreference the value for the private _objDatagridColumnPreference (Read-Only) if set due to an expansion on the datagrid_column_preference.user_account_id reverse relationship
	 * @property DatagridColumnPreference[] $_DatagridColumnPreferenceArray the value for the private _objDatagridColumnPreferenceArray (Read-Only) if set due to an ExpandAsArray on the datagrid_column_preference.user_account_id reverse relationship
	 * @property InventoryLocation $_InventoryLocationAsCreatedBy the value for the private _objInventoryLocationAsCreatedBy (Read-Only) if set due to an expansion on the inventory_location.created_by reverse relationship
	 * @property InventoryLocation[] $_InventoryLocationAsCreatedByArray the value for the private _objInventoryLocationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the inventory_location.created_by reverse relationship
	 * @property InventoryLocation $_InventoryLocationAsModifiedBy the value for the private _objInventoryLocationAsModifiedBy (Read-Only) if set due to an expansion on the inventory_location.modified_by reverse relationship
	 * @property InventoryLocation[] $_InventoryLocationAsModifiedByArray the value for the private _objInventoryLocationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the inventory_location.modified_by reverse relationship
	 * @property InventoryModel $_InventoryModelAsModifiedBy the value for the private _objInventoryModelAsModifiedBy (Read-Only) if set due to an expansion on the inventory_model.modified_by reverse relationship
	 * @property InventoryModel[] $_InventoryModelAsModifiedByArray the value for the private _objInventoryModelAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the inventory_model.modified_by reverse relationship
	 * @property InventoryModel $_InventoryModelAsCreatedBy the value for the private _objInventoryModelAsCreatedBy (Read-Only) if set due to an expansion on the inventory_model.created_by reverse relationship
	 * @property InventoryModel[] $_InventoryModelAsCreatedByArray the value for the private _objInventoryModelAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the inventory_model.created_by reverse relationship
	 * @property InventoryTransaction $_InventoryTransactionAsModifiedBy the value for the private _objInventoryTransactionAsModifiedBy (Read-Only) if set due to an expansion on the inventory_transaction.modified_by reverse relationship
	 * @property InventoryTransaction[] $_InventoryTransactionAsModifiedByArray the value for the private _objInventoryTransactionAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the inventory_transaction.modified_by reverse relationship
	 * @property InventoryTransaction $_InventoryTransactionAsCreatedBy the value for the private _objInventoryTransactionAsCreatedBy (Read-Only) if set due to an expansion on the inventory_transaction.created_by reverse relationship
	 * @property InventoryTransaction[] $_InventoryTransactionAsCreatedByArray the value for the private _objInventoryTransactionAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the inventory_transaction.created_by reverse relationship
	 * @property Location $_LocationAsModifiedBy the value for the private _objLocationAsModifiedBy (Read-Only) if set due to an expansion on the location.modified_by reverse relationship
	 * @property Location[] $_LocationAsModifiedByArray the value for the private _objLocationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the location.modified_by reverse relationship
	 * @property Location $_LocationAsCreatedBy the value for the private _objLocationAsCreatedBy (Read-Only) if set due to an expansion on the location.created_by reverse relationship
	 * @property Location[] $_LocationAsCreatedByArray the value for the private _objLocationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the location.created_by reverse relationship
	 * @property Manufacturer $_ManufacturerAsModifiedBy the value for the private _objManufacturerAsModifiedBy (Read-Only) if set due to an expansion on the manufacturer.modified_by reverse relationship
	 * @property Manufacturer[] $_ManufacturerAsModifiedByArray the value for the private _objManufacturerAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the manufacturer.modified_by reverse relationship
	 * @property Manufacturer $_ManufacturerAsCreatedBy the value for the private _objManufacturerAsCreatedBy (Read-Only) if set due to an expansion on the manufacturer.created_by reverse relationship
	 * @property Manufacturer[] $_ManufacturerAsCreatedByArray the value for the private _objManufacturerAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the manufacturer.created_by reverse relationship
	 * @property Notification $_NotificationAsModifiedBy the value for the private _objNotificationAsModifiedBy (Read-Only) if set due to an expansion on the notification.modified_by reverse relationship
	 * @property Notification[] $_NotificationAsModifiedByArray the value for the private _objNotificationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the notification.modified_by reverse relationship
	 * @property Notification $_NotificationAsCreatedBy the value for the private _objNotificationAsCreatedBy (Read-Only) if set due to an expansion on the notification.created_by reverse relationship
	 * @property Notification[] $_NotificationAsCreatedByArray the value for the private _objNotificationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the notification.created_by reverse relationship
	 * @property NotificationUserAccount $_NotificationUserAccount the value for the private _objNotificationUserAccount (Read-Only) if set due to an expansion on the notification_user_account.user_account_id reverse relationship
	 * @property NotificationUserAccount[] $_NotificationUserAccountArray the value for the private _objNotificationUserAccountArray (Read-Only) if set due to an ExpandAsArray on the notification_user_account.user_account_id reverse relationship
	 * @property Receipt $_ReceiptAsCreatedBy the value for the private _objReceiptAsCreatedBy (Read-Only) if set due to an expansion on the receipt.created_by reverse relationship
	 * @property Receipt[] $_ReceiptAsCreatedByArray the value for the private _objReceiptAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the receipt.created_by reverse relationship
	 * @property Receipt $_ReceiptAsModifiedBy the value for the private _objReceiptAsModifiedBy (Read-Only) if set due to an expansion on the receipt.modified_by reverse relationship
	 * @property Receipt[] $_ReceiptAsModifiedByArray the value for the private _objReceiptAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the receipt.modified_by reverse relationship
	 * @property Role $_RoleAsModifiedBy the value for the private _objRoleAsModifiedBy (Read-Only) if set due to an expansion on the role.modified_by reverse relationship
	 * @property Role[] $_RoleAsModifiedByArray the value for the private _objRoleAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the role.modified_by reverse relationship
	 * @property Role $_RoleAsCreatedBy the value for the private _objRoleAsCreatedBy (Read-Only) if set due to an expansion on the role.created_by reverse relationship
	 * @property Role[] $_RoleAsCreatedByArray the value for the private _objRoleAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the role.created_by reverse relationship
	 * @property RoleEntityQtypeBuiltInAuthorization $_RoleEntityQtypeBuiltInAuthorizationAsModifiedBy the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsModifiedBy (Read-Only) if set due to an expansion on the role_entity_qtype_built_in_authorization.modified_by reverse relationship
	 * @property RoleEntityQtypeBuiltInAuthorization[] $_RoleEntityQtypeBuiltInAuthorizationAsModifiedByArray the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.modified_by reverse relationship
	 * @property RoleEntityQtypeBuiltInAuthorization $_RoleEntityQtypeBuiltInAuthorizationAsCreatedBy the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsCreatedBy (Read-Only) if set due to an expansion on the role_entity_qtype_built_in_authorization.created_by reverse relationship
	 * @property RoleEntityQtypeBuiltInAuthorization[] $_RoleEntityQtypeBuiltInAuthorizationAsCreatedByArray the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.created_by reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization $_RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy (Read-Only) if set due to an expansion on the role_entity_qtype_custom_field_authorization.modified_by reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization[] $_RoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.modified_by reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization $_RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy (Read-Only) if set due to an expansion on the role_entity_qtype_custom_field_authorization.created_by reverse relationship
	 * @property RoleEntityQtypeCustomFieldAuthorization[] $_RoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.created_by reverse relationship
	 * @property RoleModule $_RoleModuleAsModifiedBy the value for the private _objRoleModuleAsModifiedBy (Read-Only) if set due to an expansion on the role_module.modified_by reverse relationship
	 * @property RoleModule[] $_RoleModuleAsModifiedByArray the value for the private _objRoleModuleAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the role_module.modified_by reverse relationship
	 * @property RoleModule $_RoleModuleAsCreatedBy the value for the private _objRoleModuleAsCreatedBy (Read-Only) if set due to an expansion on the role_module.created_by reverse relationship
	 * @property RoleModule[] $_RoleModuleAsCreatedByArray the value for the private _objRoleModuleAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the role_module.created_by reverse relationship
	 * @property RoleModuleAuthorization $_RoleModuleAuthorizationAsModifiedBy the value for the private _objRoleModuleAuthorizationAsModifiedBy (Read-Only) if set due to an expansion on the role_module_authorization.modified_by reverse relationship
	 * @property RoleModuleAuthorization[] $_RoleModuleAuthorizationAsModifiedByArray the value for the private _objRoleModuleAuthorizationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the role_module_authorization.modified_by reverse relationship
	 * @property RoleModuleAuthorization $_RoleModuleAuthorizationAsCreatedBy the value for the private _objRoleModuleAuthorizationAsCreatedBy (Read-Only) if set due to an expansion on the role_module_authorization.created_by reverse relationship
	 * @property RoleModuleAuthorization[] $_RoleModuleAuthorizationAsCreatedByArray the value for the private _objRoleModuleAuthorizationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the role_module_authorization.created_by reverse relationship
	 * @property RoleTransactionTypeAuthorization $_RoleTransactionTypeAuthorizationAsCreatedBy the value for the private _objRoleTransactionTypeAuthorizationAsCreatedBy (Read-Only) if set due to an expansion on the role_transaction_type_authorization.created_by reverse relationship
	 * @property RoleTransactionTypeAuthorization[] $_RoleTransactionTypeAuthorizationAsCreatedByArray the value for the private _objRoleTransactionTypeAuthorizationAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the role_transaction_type_authorization.created_by reverse relationship
	 * @property RoleTransactionTypeAuthorization $_RoleTransactionTypeAuthorizationAsModifiedBy the value for the private _objRoleTransactionTypeAuthorizationAsModifiedBy (Read-Only) if set due to an expansion on the role_transaction_type_authorization.modified_by reverse relationship
	 * @property RoleTransactionTypeAuthorization[] $_RoleTransactionTypeAuthorizationAsModifiedByArray the value for the private _objRoleTransactionTypeAuthorizationAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the role_transaction_type_authorization.modified_by reverse relationship
	 * @property Shipment $_ShipmentAsCreatedBy the value for the private _objShipmentAsCreatedBy (Read-Only) if set due to an expansion on the shipment.created_by reverse relationship
	 * @property Shipment[] $_ShipmentAsCreatedByArray the value for the private _objShipmentAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the shipment.created_by reverse relationship
	 * @property Shipment $_ShipmentAsModifiedBy the value for the private _objShipmentAsModifiedBy (Read-Only) if set due to an expansion on the shipment.modified_by reverse relationship
	 * @property Shipment[] $_ShipmentAsModifiedByArray the value for the private _objShipmentAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the shipment.modified_by reverse relationship
	 * @property Transaction $_TransactionAsCreatedBy the value for the private _objTransactionAsCreatedBy (Read-Only) if set due to an expansion on the transaction.created_by reverse relationship
	 * @property Transaction[] $_TransactionAsCreatedByArray the value for the private _objTransactionAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the transaction.created_by reverse relationship
	 * @property Transaction $_TransactionAsModifiedBy the value for the private _objTransactionAsModifiedBy (Read-Only) if set due to an expansion on the transaction.modified_by reverse relationship
	 * @property Transaction[] $_TransactionAsModifiedByArray the value for the private _objTransactionAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the transaction.modified_by reverse relationship
	 * @property UserAccount $_UserAccountAsCreatedBy the value for the private _objUserAccountAsCreatedBy (Read-Only) if set due to an expansion on the user_account.created_by reverse relationship
	 * @property UserAccount[] $_UserAccountAsCreatedByArray the value for the private _objUserAccountAsCreatedByArray (Read-Only) if set due to an ExpandAsArray on the user_account.created_by reverse relationship
	 * @property UserAccount $_UserAccountAsModifiedBy the value for the private _objUserAccountAsModifiedBy (Read-Only) if set due to an expansion on the user_account.modified_by reverse relationship
	 * @property UserAccount[] $_UserAccountAsModifiedByArray the value for the private _objUserAccountAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the user_account.modified_by reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class UserAccountGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column user_account.user_account_id
		 * @var integer intUserAccountId
		 */
		protected $intUserAccountId;
		const UserAccountIdDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 50;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 50;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.username
		 * @var string strUsername
		 */
		protected $strUsername;
		const UsernameMaxLength = 30;
		const UsernameDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.password_hash
		 * @var string strPasswordHash
		 */
		protected $strPasswordHash;
		const PasswordHashMaxLength = 60;
		const PasswordHashDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.email_address
		 * @var string strEmailAddress
		 */
		protected $strEmailAddress;
		const EmailAddressMaxLength = 50;
		const EmailAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.admin_flag
		 * @var boolean blnAdminFlag
		 */
		protected $blnAdminFlag;
		const AdminFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.portable_access_flag
		 * @var boolean blnPortableAccessFlag
		 */
		protected $blnPortableAccessFlag;
		const PortableAccessFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.portable_user_pin
		 * @var integer intPortableUserPin
		 */
		protected $intPortableUserPin;
		const PortableUserPinDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.role_id
		 * @var integer intRoleId
		 */
		protected $intRoleId;
		const RoleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column user_account.modified_date
		 * @var string strModifiedDate
		 */
		protected $strModifiedDate;
		const ModifiedDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single AddressAsCreatedBy object
		 * (of type Address), if this UserAccount object was restored with
		 * an expansion on the address association table.
		 * @var Address _objAddressAsCreatedBy;
		 */
		private $_objAddressAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AddressAsCreatedBy objects
		 * (of type Address[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the address association table.
		 * @var Address[] _objAddressAsCreatedByArray;
		 */
		private $_objAddressAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AddressAsModifiedBy object
		 * (of type Address), if this UserAccount object was restored with
		 * an expansion on the address association table.
		 * @var Address _objAddressAsModifiedBy;
		 */
		private $_objAddressAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of AddressAsModifiedBy objects
		 * (of type Address[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the address association table.
		 * @var Address[] _objAddressAsModifiedByArray;
		 */
		private $_objAddressAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetAsModifiedBy object
		 * (of type Asset), if this UserAccount object was restored with
		 * an expansion on the asset association table.
		 * @var Asset _objAssetAsModifiedBy;
		 */
		private $_objAssetAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetAsModifiedBy objects
		 * (of type Asset[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset association table.
		 * @var Asset[] _objAssetAsModifiedByArray;
		 */
		private $_objAssetAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetAsCreatedBy object
		 * (of type Asset), if this UserAccount object was restored with
		 * an expansion on the asset association table.
		 * @var Asset _objAssetAsCreatedBy;
		 */
		private $_objAssetAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetAsCreatedBy objects
		 * (of type Asset[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset association table.
		 * @var Asset[] _objAssetAsCreatedByArray;
		 */
		private $_objAssetAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetModelAsModifiedBy object
		 * (of type AssetModel), if this UserAccount object was restored with
		 * an expansion on the asset_model association table.
		 * @var AssetModel _objAssetModelAsModifiedBy;
		 */
		private $_objAssetModelAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetModelAsModifiedBy objects
		 * (of type AssetModel[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_model association table.
		 * @var AssetModel[] _objAssetModelAsModifiedByArray;
		 */
		private $_objAssetModelAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetModelAsCreatedBy object
		 * (of type AssetModel), if this UserAccount object was restored with
		 * an expansion on the asset_model association table.
		 * @var AssetModel _objAssetModelAsCreatedBy;
		 */
		private $_objAssetModelAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetModelAsCreatedBy objects
		 * (of type AssetModel[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_model association table.
		 * @var AssetModel[] _objAssetModelAsCreatedByArray;
		 */
		private $_objAssetModelAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransactionAsCreatedBy object
		 * (of type AssetTransaction), if this UserAccount object was restored with
		 * an expansion on the asset_transaction association table.
		 * @var AssetTransaction _objAssetTransactionAsCreatedBy;
		 */
		private $_objAssetTransactionAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionAsCreatedBy objects
		 * (of type AssetTransaction[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_transaction association table.
		 * @var AssetTransaction[] _objAssetTransactionAsCreatedByArray;
		 */
		private $_objAssetTransactionAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransactionAsModifiedBy object
		 * (of type AssetTransaction), if this UserAccount object was restored with
		 * an expansion on the asset_transaction association table.
		 * @var AssetTransaction _objAssetTransactionAsModifiedBy;
		 */
		private $_objAssetTransactionAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionAsModifiedBy objects
		 * (of type AssetTransaction[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_transaction association table.
		 * @var AssetTransaction[] _objAssetTransactionAsModifiedByArray;
		 */
		private $_objAssetTransactionAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransactionCheckoutAsToUser object
		 * (of type AssetTransactionCheckout), if this UserAccount object was restored with
		 * an expansion on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout _objAssetTransactionCheckoutAsToUser;
		 */
		private $_objAssetTransactionCheckoutAsToUser;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionCheckoutAsToUser objects
		 * (of type AssetTransactionCheckout[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout[] _objAssetTransactionCheckoutAsToUserArray;
		 */
		private $_objAssetTransactionCheckoutAsToUserArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransactionCheckoutAsCreatedBy object
		 * (of type AssetTransactionCheckout), if this UserAccount object was restored with
		 * an expansion on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout _objAssetTransactionCheckoutAsCreatedBy;
		 */
		private $_objAssetTransactionCheckoutAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionCheckoutAsCreatedBy objects
		 * (of type AssetTransactionCheckout[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout[] _objAssetTransactionCheckoutAsCreatedByArray;
		 */
		private $_objAssetTransactionCheckoutAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AssetTransactionCheckoutAsModifiedBy object
		 * (of type AssetTransactionCheckout), if this UserAccount object was restored with
		 * an expansion on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout _objAssetTransactionCheckoutAsModifiedBy;
		 */
		private $_objAssetTransactionCheckoutAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of AssetTransactionCheckoutAsModifiedBy objects
		 * (of type AssetTransactionCheckout[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the asset_transaction_checkout association table.
		 * @var AssetTransactionCheckout[] _objAssetTransactionCheckoutAsModifiedByArray;
		 */
		private $_objAssetTransactionCheckoutAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AttachmentAsCreatedBy object
		 * (of type Attachment), if this UserAccount object was restored with
		 * an expansion on the attachment association table.
		 * @var Attachment _objAttachmentAsCreatedBy;
		 */
		private $_objAttachmentAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AttachmentAsCreatedBy objects
		 * (of type Attachment[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the attachment association table.
		 * @var Attachment[] _objAttachmentAsCreatedByArray;
		 */
		private $_objAttachmentAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AuditAsModifiedBy object
		 * (of type Audit), if this UserAccount object was restored with
		 * an expansion on the audit association table.
		 * @var Audit _objAuditAsModifiedBy;
		 */
		private $_objAuditAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of AuditAsModifiedBy objects
		 * (of type Audit[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the audit association table.
		 * @var Audit[] _objAuditAsModifiedByArray;
		 */
		private $_objAuditAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single AuditAsCreatedBy object
		 * (of type Audit), if this UserAccount object was restored with
		 * an expansion on the audit association table.
		 * @var Audit _objAuditAsCreatedBy;
		 */
		private $_objAuditAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of AuditAsCreatedBy objects
		 * (of type Audit[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the audit association table.
		 * @var Audit[] _objAuditAsCreatedByArray;
		 */
		private $_objAuditAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CategoryAsModifiedBy object
		 * (of type Category), if this UserAccount object was restored with
		 * an expansion on the category association table.
		 * @var Category _objCategoryAsModifiedBy;
		 */
		private $_objCategoryAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of CategoryAsModifiedBy objects
		 * (of type Category[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the category association table.
		 * @var Category[] _objCategoryAsModifiedByArray;
		 */
		private $_objCategoryAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CategoryAsCreatedBy object
		 * (of type Category), if this UserAccount object was restored with
		 * an expansion on the category association table.
		 * @var Category _objCategoryAsCreatedBy;
		 */
		private $_objCategoryAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of CategoryAsCreatedBy objects
		 * (of type Category[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the category association table.
		 * @var Category[] _objCategoryAsCreatedByArray;
		 */
		private $_objCategoryAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CompanyAsModifiedBy object
		 * (of type Company), if this UserAccount object was restored with
		 * an expansion on the company association table.
		 * @var Company _objCompanyAsModifiedBy;
		 */
		private $_objCompanyAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of CompanyAsModifiedBy objects
		 * (of type Company[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the company association table.
		 * @var Company[] _objCompanyAsModifiedByArray;
		 */
		private $_objCompanyAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CompanyAsCreatedBy object
		 * (of type Company), if this UserAccount object was restored with
		 * an expansion on the company association table.
		 * @var Company _objCompanyAsCreatedBy;
		 */
		private $_objCompanyAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of CompanyAsCreatedBy objects
		 * (of type Company[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the company association table.
		 * @var Company[] _objCompanyAsCreatedByArray;
		 */
		private $_objCompanyAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ContactAsModifiedBy object
		 * (of type Contact), if this UserAccount object was restored with
		 * an expansion on the contact association table.
		 * @var Contact _objContactAsModifiedBy;
		 */
		private $_objContactAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of ContactAsModifiedBy objects
		 * (of type Contact[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the contact association table.
		 * @var Contact[] _objContactAsModifiedByArray;
		 */
		private $_objContactAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ContactAsCreatedBy object
		 * (of type Contact), if this UserAccount object was restored with
		 * an expansion on the contact association table.
		 * @var Contact _objContactAsCreatedBy;
		 */
		private $_objContactAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of ContactAsCreatedBy objects
		 * (of type Contact[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the contact association table.
		 * @var Contact[] _objContactAsCreatedByArray;
		 */
		private $_objContactAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CustomFieldAsModifiedBy object
		 * (of type CustomField), if this UserAccount object was restored with
		 * an expansion on the custom_field association table.
		 * @var CustomField _objCustomFieldAsModifiedBy;
		 */
		private $_objCustomFieldAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of CustomFieldAsModifiedBy objects
		 * (of type CustomField[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the custom_field association table.
		 * @var CustomField[] _objCustomFieldAsModifiedByArray;
		 */
		private $_objCustomFieldAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CustomFieldAsCreatedBy object
		 * (of type CustomField), if this UserAccount object was restored with
		 * an expansion on the custom_field association table.
		 * @var CustomField _objCustomFieldAsCreatedBy;
		 */
		private $_objCustomFieldAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of CustomFieldAsCreatedBy objects
		 * (of type CustomField[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the custom_field association table.
		 * @var CustomField[] _objCustomFieldAsCreatedByArray;
		 */
		private $_objCustomFieldAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CustomFieldValueAsCreatedBy object
		 * (of type CustomFieldValue), if this UserAccount object was restored with
		 * an expansion on the custom_field_value association table.
		 * @var CustomFieldValue _objCustomFieldValueAsCreatedBy;
		 */
		private $_objCustomFieldValueAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of CustomFieldValueAsCreatedBy objects
		 * (of type CustomFieldValue[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the custom_field_value association table.
		 * @var CustomFieldValue[] _objCustomFieldValueAsCreatedByArray;
		 */
		private $_objCustomFieldValueAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single CustomFieldValueAsModifiedBy object
		 * (of type CustomFieldValue), if this UserAccount object was restored with
		 * an expansion on the custom_field_value association table.
		 * @var CustomFieldValue _objCustomFieldValueAsModifiedBy;
		 */
		private $_objCustomFieldValueAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of CustomFieldValueAsModifiedBy objects
		 * (of type CustomFieldValue[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the custom_field_value association table.
		 * @var CustomFieldValue[] _objCustomFieldValueAsModifiedByArray;
		 */
		private $_objCustomFieldValueAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single DatagridColumnPreference object
		 * (of type DatagridColumnPreference), if this UserAccount object was restored with
		 * an expansion on the datagrid_column_preference association table.
		 * @var DatagridColumnPreference _objDatagridColumnPreference;
		 */
		private $_objDatagridColumnPreference;

		/**
		 * Private member variable that stores a reference to an array of DatagridColumnPreference objects
		 * (of type DatagridColumnPreference[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the datagrid_column_preference association table.
		 * @var DatagridColumnPreference[] _objDatagridColumnPreferenceArray;
		 */
		private $_objDatagridColumnPreferenceArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryLocationAsCreatedBy object
		 * (of type InventoryLocation), if this UserAccount object was restored with
		 * an expansion on the inventory_location association table.
		 * @var InventoryLocation _objInventoryLocationAsCreatedBy;
		 */
		private $_objInventoryLocationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of InventoryLocationAsCreatedBy objects
		 * (of type InventoryLocation[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the inventory_location association table.
		 * @var InventoryLocation[] _objInventoryLocationAsCreatedByArray;
		 */
		private $_objInventoryLocationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryLocationAsModifiedBy object
		 * (of type InventoryLocation), if this UserAccount object was restored with
		 * an expansion on the inventory_location association table.
		 * @var InventoryLocation _objInventoryLocationAsModifiedBy;
		 */
		private $_objInventoryLocationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of InventoryLocationAsModifiedBy objects
		 * (of type InventoryLocation[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the inventory_location association table.
		 * @var InventoryLocation[] _objInventoryLocationAsModifiedByArray;
		 */
		private $_objInventoryLocationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryModelAsModifiedBy object
		 * (of type InventoryModel), if this UserAccount object was restored with
		 * an expansion on the inventory_model association table.
		 * @var InventoryModel _objInventoryModelAsModifiedBy;
		 */
		private $_objInventoryModelAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of InventoryModelAsModifiedBy objects
		 * (of type InventoryModel[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the inventory_model association table.
		 * @var InventoryModel[] _objInventoryModelAsModifiedByArray;
		 */
		private $_objInventoryModelAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryModelAsCreatedBy object
		 * (of type InventoryModel), if this UserAccount object was restored with
		 * an expansion on the inventory_model association table.
		 * @var InventoryModel _objInventoryModelAsCreatedBy;
		 */
		private $_objInventoryModelAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of InventoryModelAsCreatedBy objects
		 * (of type InventoryModel[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the inventory_model association table.
		 * @var InventoryModel[] _objInventoryModelAsCreatedByArray;
		 */
		private $_objInventoryModelAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryTransactionAsModifiedBy object
		 * (of type InventoryTransaction), if this UserAccount object was restored with
		 * an expansion on the inventory_transaction association table.
		 * @var InventoryTransaction _objInventoryTransactionAsModifiedBy;
		 */
		private $_objInventoryTransactionAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of InventoryTransactionAsModifiedBy objects
		 * (of type InventoryTransaction[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the inventory_transaction association table.
		 * @var InventoryTransaction[] _objInventoryTransactionAsModifiedByArray;
		 */
		private $_objInventoryTransactionAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single InventoryTransactionAsCreatedBy object
		 * (of type InventoryTransaction), if this UserAccount object was restored with
		 * an expansion on the inventory_transaction association table.
		 * @var InventoryTransaction _objInventoryTransactionAsCreatedBy;
		 */
		private $_objInventoryTransactionAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of InventoryTransactionAsCreatedBy objects
		 * (of type InventoryTransaction[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the inventory_transaction association table.
		 * @var InventoryTransaction[] _objInventoryTransactionAsCreatedByArray;
		 */
		private $_objInventoryTransactionAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single LocationAsModifiedBy object
		 * (of type Location), if this UserAccount object was restored with
		 * an expansion on the location association table.
		 * @var Location _objLocationAsModifiedBy;
		 */
		private $_objLocationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of LocationAsModifiedBy objects
		 * (of type Location[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the location association table.
		 * @var Location[] _objLocationAsModifiedByArray;
		 */
		private $_objLocationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single LocationAsCreatedBy object
		 * (of type Location), if this UserAccount object was restored with
		 * an expansion on the location association table.
		 * @var Location _objLocationAsCreatedBy;
		 */
		private $_objLocationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of LocationAsCreatedBy objects
		 * (of type Location[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the location association table.
		 * @var Location[] _objLocationAsCreatedByArray;
		 */
		private $_objLocationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ManufacturerAsModifiedBy object
		 * (of type Manufacturer), if this UserAccount object was restored with
		 * an expansion on the manufacturer association table.
		 * @var Manufacturer _objManufacturerAsModifiedBy;
		 */
		private $_objManufacturerAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of ManufacturerAsModifiedBy objects
		 * (of type Manufacturer[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the manufacturer association table.
		 * @var Manufacturer[] _objManufacturerAsModifiedByArray;
		 */
		private $_objManufacturerAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ManufacturerAsCreatedBy object
		 * (of type Manufacturer), if this UserAccount object was restored with
		 * an expansion on the manufacturer association table.
		 * @var Manufacturer _objManufacturerAsCreatedBy;
		 */
		private $_objManufacturerAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of ManufacturerAsCreatedBy objects
		 * (of type Manufacturer[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the manufacturer association table.
		 * @var Manufacturer[] _objManufacturerAsCreatedByArray;
		 */
		private $_objManufacturerAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single NotificationAsModifiedBy object
		 * (of type Notification), if this UserAccount object was restored with
		 * an expansion on the notification association table.
		 * @var Notification _objNotificationAsModifiedBy;
		 */
		private $_objNotificationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of NotificationAsModifiedBy objects
		 * (of type Notification[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the notification association table.
		 * @var Notification[] _objNotificationAsModifiedByArray;
		 */
		private $_objNotificationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single NotificationAsCreatedBy object
		 * (of type Notification), if this UserAccount object was restored with
		 * an expansion on the notification association table.
		 * @var Notification _objNotificationAsCreatedBy;
		 */
		private $_objNotificationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of NotificationAsCreatedBy objects
		 * (of type Notification[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the notification association table.
		 * @var Notification[] _objNotificationAsCreatedByArray;
		 */
		private $_objNotificationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single NotificationUserAccount object
		 * (of type NotificationUserAccount), if this UserAccount object was restored with
		 * an expansion on the notification_user_account association table.
		 * @var NotificationUserAccount _objNotificationUserAccount;
		 */
		private $_objNotificationUserAccount;

		/**
		 * Private member variable that stores a reference to an array of NotificationUserAccount objects
		 * (of type NotificationUserAccount[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the notification_user_account association table.
		 * @var NotificationUserAccount[] _objNotificationUserAccountArray;
		 */
		private $_objNotificationUserAccountArray = array();

		/**
		 * Private member variable that stores a reference to a single ReceiptAsCreatedBy object
		 * (of type Receipt), if this UserAccount object was restored with
		 * an expansion on the receipt association table.
		 * @var Receipt _objReceiptAsCreatedBy;
		 */
		private $_objReceiptAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of ReceiptAsCreatedBy objects
		 * (of type Receipt[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the receipt association table.
		 * @var Receipt[] _objReceiptAsCreatedByArray;
		 */
		private $_objReceiptAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ReceiptAsModifiedBy object
		 * (of type Receipt), if this UserAccount object was restored with
		 * an expansion on the receipt association table.
		 * @var Receipt _objReceiptAsModifiedBy;
		 */
		private $_objReceiptAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of ReceiptAsModifiedBy objects
		 * (of type Receipt[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the receipt association table.
		 * @var Receipt[] _objReceiptAsModifiedByArray;
		 */
		private $_objReceiptAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleAsModifiedBy object
		 * (of type Role), if this UserAccount object was restored with
		 * an expansion on the role association table.
		 * @var Role _objRoleAsModifiedBy;
		 */
		private $_objRoleAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleAsModifiedBy objects
		 * (of type Role[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role association table.
		 * @var Role[] _objRoleAsModifiedByArray;
		 */
		private $_objRoleAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleAsCreatedBy object
		 * (of type Role), if this UserAccount object was restored with
		 * an expansion on the role association table.
		 * @var Role _objRoleAsCreatedBy;
		 */
		private $_objRoleAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleAsCreatedBy objects
		 * (of type Role[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role association table.
		 * @var Role[] _objRoleAsCreatedByArray;
		 */
		private $_objRoleAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeBuiltInAuthorizationAsModifiedBy object
		 * (of type RoleEntityQtypeBuiltInAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization _objRoleEntityQtypeBuiltInAuthorizationAsModifiedBy;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorizationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeBuiltInAuthorizationAsModifiedBy objects
		 * (of type RoleEntityQtypeBuiltInAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization[] _objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeBuiltInAuthorizationAsCreatedBy object
		 * (of type RoleEntityQtypeBuiltInAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization _objRoleEntityQtypeBuiltInAuthorizationAsCreatedBy;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorizationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeBuiltInAuthorizationAsCreatedBy objects
		 * (of type RoleEntityQtypeBuiltInAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_entity_qtype_built_in_authorization association table.
		 * @var RoleEntityQtypeBuiltInAuthorization[] _objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray;
		 */
		private $_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy object
		 * (of type RoleEntityQtypeCustomFieldAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization _objRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy objects
		 * (of type RoleEntityQtypeCustomFieldAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization[] _objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy object
		 * (of type RoleEntityQtypeCustomFieldAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization _objRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy objects
		 * (of type RoleEntityQtypeCustomFieldAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_entity_qtype_custom_field_authorization association table.
		 * @var RoleEntityQtypeCustomFieldAuthorization[] _objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray;
		 */
		private $_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleModuleAsModifiedBy object
		 * (of type RoleModule), if this UserAccount object was restored with
		 * an expansion on the role_module association table.
		 * @var RoleModule _objRoleModuleAsModifiedBy;
		 */
		private $_objRoleModuleAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleModuleAsModifiedBy objects
		 * (of type RoleModule[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_module association table.
		 * @var RoleModule[] _objRoleModuleAsModifiedByArray;
		 */
		private $_objRoleModuleAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleModuleAsCreatedBy object
		 * (of type RoleModule), if this UserAccount object was restored with
		 * an expansion on the role_module association table.
		 * @var RoleModule _objRoleModuleAsCreatedBy;
		 */
		private $_objRoleModuleAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleModuleAsCreatedBy objects
		 * (of type RoleModule[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_module association table.
		 * @var RoleModule[] _objRoleModuleAsCreatedByArray;
		 */
		private $_objRoleModuleAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleModuleAuthorizationAsModifiedBy object
		 * (of type RoleModuleAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_module_authorization association table.
		 * @var RoleModuleAuthorization _objRoleModuleAuthorizationAsModifiedBy;
		 */
		private $_objRoleModuleAuthorizationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleModuleAuthorizationAsModifiedBy objects
		 * (of type RoleModuleAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_module_authorization association table.
		 * @var RoleModuleAuthorization[] _objRoleModuleAuthorizationAsModifiedByArray;
		 */
		private $_objRoleModuleAuthorizationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleModuleAuthorizationAsCreatedBy object
		 * (of type RoleModuleAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_module_authorization association table.
		 * @var RoleModuleAuthorization _objRoleModuleAuthorizationAsCreatedBy;
		 */
		private $_objRoleModuleAuthorizationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleModuleAuthorizationAsCreatedBy objects
		 * (of type RoleModuleAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_module_authorization association table.
		 * @var RoleModuleAuthorization[] _objRoleModuleAuthorizationAsCreatedByArray;
		 */
		private $_objRoleModuleAuthorizationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleTransactionTypeAuthorizationAsCreatedBy object
		 * (of type RoleTransactionTypeAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization _objRoleTransactionTypeAuthorizationAsCreatedBy;
		 */
		private $_objRoleTransactionTypeAuthorizationAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleTransactionTypeAuthorizationAsCreatedBy objects
		 * (of type RoleTransactionTypeAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization[] _objRoleTransactionTypeAuthorizationAsCreatedByArray;
		 */
		private $_objRoleTransactionTypeAuthorizationAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single RoleTransactionTypeAuthorizationAsModifiedBy object
		 * (of type RoleTransactionTypeAuthorization), if this UserAccount object was restored with
		 * an expansion on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization _objRoleTransactionTypeAuthorizationAsModifiedBy;
		 */
		private $_objRoleTransactionTypeAuthorizationAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of RoleTransactionTypeAuthorizationAsModifiedBy objects
		 * (of type RoleTransactionTypeAuthorization[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the role_transaction_type_authorization association table.
		 * @var RoleTransactionTypeAuthorization[] _objRoleTransactionTypeAuthorizationAsModifiedByArray;
		 */
		private $_objRoleTransactionTypeAuthorizationAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ShipmentAsCreatedBy object
		 * (of type Shipment), if this UserAccount object was restored with
		 * an expansion on the shipment association table.
		 * @var Shipment _objShipmentAsCreatedBy;
		 */
		private $_objShipmentAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of ShipmentAsCreatedBy objects
		 * (of type Shipment[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the shipment association table.
		 * @var Shipment[] _objShipmentAsCreatedByArray;
		 */
		private $_objShipmentAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ShipmentAsModifiedBy object
		 * (of type Shipment), if this UserAccount object was restored with
		 * an expansion on the shipment association table.
		 * @var Shipment _objShipmentAsModifiedBy;
		 */
		private $_objShipmentAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of ShipmentAsModifiedBy objects
		 * (of type Shipment[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the shipment association table.
		 * @var Shipment[] _objShipmentAsModifiedByArray;
		 */
		private $_objShipmentAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single TransactionAsCreatedBy object
		 * (of type Transaction), if this UserAccount object was restored with
		 * an expansion on the transaction association table.
		 * @var Transaction _objTransactionAsCreatedBy;
		 */
		private $_objTransactionAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of TransactionAsCreatedBy objects
		 * (of type Transaction[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the transaction association table.
		 * @var Transaction[] _objTransactionAsCreatedByArray;
		 */
		private $_objTransactionAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single TransactionAsModifiedBy object
		 * (of type Transaction), if this UserAccount object was restored with
		 * an expansion on the transaction association table.
		 * @var Transaction _objTransactionAsModifiedBy;
		 */
		private $_objTransactionAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of TransactionAsModifiedBy objects
		 * (of type Transaction[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the transaction association table.
		 * @var Transaction[] _objTransactionAsModifiedByArray;
		 */
		private $_objTransactionAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single UserAccountAsCreatedBy object
		 * (of type UserAccount), if this UserAccount object was restored with
		 * an expansion on the user_account association table.
		 * @var UserAccount _objUserAccountAsCreatedBy;
		 */
		private $_objUserAccountAsCreatedBy;

		/**
		 * Private member variable that stores a reference to an array of UserAccountAsCreatedBy objects
		 * (of type UserAccount[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the user_account association table.
		 * @var UserAccount[] _objUserAccountAsCreatedByArray;
		 */
		private $_objUserAccountAsCreatedByArray = array();

		/**
		 * Private member variable that stores a reference to a single UserAccountAsModifiedBy object
		 * (of type UserAccount), if this UserAccount object was restored with
		 * an expansion on the user_account association table.
		 * @var UserAccount _objUserAccountAsModifiedBy;
		 */
		private $_objUserAccountAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of UserAccountAsModifiedBy objects
		 * (of type UserAccount[]), if this UserAccount object was restored with
		 * an ExpandAsArray on the user_account association table.
		 * @var UserAccount[] _objUserAccountAsModifiedByArray;
		 */
		private $_objUserAccountAsModifiedByArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column user_account.role_id.
		 *
		 * NOTE: Always use the Role property getter to correctly retrieve this Role object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Role objRole
		 */
		protected $objRole;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column user_account.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column user_account.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objModifiedByObject
		 */
		protected $objModifiedByObject;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a UserAccount from PK Info
		 * @param integer $intUserAccountId
		 * @return UserAccount
		 */
		public static function Load($intUserAccountId) {
			// Use QuerySingle to Perform the Query
			return UserAccount::QuerySingle(
				QQ::Equal(QQN::UserAccount()->UserAccountId, $intUserAccountId)
			);
		}

		/**
		 * Load all UserAccounts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call UserAccount::QueryArray to perform the LoadAll query
			try {
				return UserAccount::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all UserAccounts
		 * @return int
		 */
		public static function CountAll() {
			// Call UserAccount::QueryCount to perform the CountAll query
			return UserAccount::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Create/Build out the QueryBuilder object with UserAccount-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'user_account');
			UserAccount::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('user_account');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single UserAccount object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return UserAccount the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UserAccount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new UserAccount object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = UserAccount::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return UserAccount::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of UserAccount objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return UserAccount[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UserAccount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return UserAccount::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = UserAccount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of UserAccount objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UserAccount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'user_account_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with UserAccount-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				UserAccount::GetSelectFields($objQueryBuilder);
				UserAccount::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return UserAccount::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this UserAccount
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'user_account';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'user_account_id', $strAliasPrefix . 'user_account_id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'username', $strAliasPrefix . 'username');
			$objBuilder->AddSelectItem($strTableName, 'password_hash', $strAliasPrefix . 'password_hash');
			$objBuilder->AddSelectItem($strTableName, 'email_address', $strAliasPrefix . 'email_address');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
			$objBuilder->AddSelectItem($strTableName, 'admin_flag', $strAliasPrefix . 'admin_flag');
			$objBuilder->AddSelectItem($strTableName, 'portable_access_flag', $strAliasPrefix . 'portable_access_flag');
			$objBuilder->AddSelectItem($strTableName, 'portable_user_pin', $strAliasPrefix . 'portable_user_pin');
			$objBuilder->AddSelectItem($strTableName, 'role_id', $strAliasPrefix . 'role_id');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified_date', $strAliasPrefix . 'modified_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a UserAccount from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this UserAccount::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return UserAccount
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intUserAccountId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'user_account__';


				$strAlias = $strAliasPrefix . 'addressascreatedby__address_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAddressAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAddressAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAddressAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAddressAsCreatedByArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'addressasmodifiedby__address_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAddressAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAddressAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAddressAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAddressAsModifiedByArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assetasmodifiedby__asset_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetAsModifiedByArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assetascreatedby__asset_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetAsCreatedByArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assetmodelasmodifiedby__asset_model_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetModelAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetModelAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetModelAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetModelAsModifiedByArray[] = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assetmodelascreatedby__asset_model_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetModelAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetModelAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetModelAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetModelAsCreatedByArray[] = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransactionascreatedby__asset_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionAsCreatedByArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransactionasmodifiedby__asset_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionAsModifiedByArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransactioncheckoutastouser__asset_transaction_checkout_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionCheckoutAsToUserArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionCheckoutAsToUserArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutastouser__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionCheckoutAsToUserArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionCheckoutAsToUserArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutastouser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransactioncheckoutascreatedby__asset_transaction_checkout_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionCheckoutAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionCheckoutAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionCheckoutAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionCheckoutAsCreatedByArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'assettransactioncheckoutasmodifiedby__asset_transaction_checkout_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAssetTransactionCheckoutAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAssetTransactionCheckoutAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAssetTransactionCheckoutAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAssetTransactionCheckoutAsModifiedByArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'attachmentascreatedby__attachment_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttachmentAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttachmentAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Attachment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attachmentascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttachmentAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttachmentAsCreatedByArray[] = Attachment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attachmentascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'auditasmodifiedby__audit_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAuditAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAuditAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAuditAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAuditAsModifiedByArray[] = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'auditascreatedby__audit_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAuditAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAuditAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAuditAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAuditAsCreatedByArray[] = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'categoryasmodifiedby__category_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCategoryAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCategoryAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCategoryAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCategoryAsModifiedByArray[] = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'categoryascreatedby__category_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCategoryAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCategoryAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCategoryAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCategoryAsCreatedByArray[] = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'companyasmodifiedby__company_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCompanyAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCompanyAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCompanyAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCompanyAsModifiedByArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'companyascreatedby__company_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCompanyAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCompanyAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCompanyAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCompanyAsCreatedByArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'contactasmodifiedby__contact_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objContactAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objContactAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objContactAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objContactAsModifiedByArray[] = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'contactascreatedby__contact_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objContactAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objContactAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objContactAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objContactAsCreatedByArray[] = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'customfieldasmodifiedby__custom_field_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCustomFieldAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCustomFieldAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCustomFieldAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCustomFieldAsModifiedByArray[] = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'customfieldascreatedby__custom_field_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCustomFieldAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCustomFieldAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCustomFieldAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCustomFieldAsCreatedByArray[] = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'customfieldvalueascreatedby__custom_field_value_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCustomFieldValueAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCustomFieldValueAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCustomFieldValueAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCustomFieldValueAsCreatedByArray[] = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'customfieldvalueasmodifiedby__custom_field_value_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCustomFieldValueAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCustomFieldValueAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCustomFieldValueAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCustomFieldValueAsModifiedByArray[] = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'datagridcolumnpreference__datagrid_column_preference_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objDatagridColumnPreferenceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objDatagridColumnPreferenceArray[$intPreviousChildItemCount - 1];
						$objChildItem = DatagridColumnPreference::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datagridcolumnpreference__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objDatagridColumnPreferenceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objDatagridColumnPreferenceArray[] = DatagridColumnPreference::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datagridcolumnpreference__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorylocationascreatedby__inventory_location_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryLocationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryLocationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryLocationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryLocationAsCreatedByArray[] = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorylocationasmodifiedby__inventory_location_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryLocationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryLocationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryLocationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryLocationAsModifiedByArray[] = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorymodelasmodifiedby__inventory_model_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryModelAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryModelAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryModelAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryModelAsModifiedByArray[] = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorymodelascreatedby__inventory_model_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryModelAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryModelAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryModelAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryModelAsCreatedByArray[] = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorytransactionasmodifiedby__inventory_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryTransactionAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryTransactionAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryTransactionAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryTransactionAsModifiedByArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'inventorytransactionascreatedby__inventory_transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objInventoryTransactionAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objInventoryTransactionAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objInventoryTransactionAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objInventoryTransactionAsCreatedByArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'locationasmodifiedby__location_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLocationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLocationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLocationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLocationAsModifiedByArray[] = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'locationascreatedby__location_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLocationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLocationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLocationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLocationAsCreatedByArray[] = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'manufacturerasmodifiedby__manufacturer_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objManufacturerAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objManufacturerAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objManufacturerAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objManufacturerAsModifiedByArray[] = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'manufacturerascreatedby__manufacturer_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objManufacturerAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objManufacturerAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objManufacturerAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objManufacturerAsCreatedByArray[] = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'notificationasmodifiedby__notification_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objNotificationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objNotificationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objNotificationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objNotificationAsModifiedByArray[] = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'notificationascreatedby__notification_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objNotificationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objNotificationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objNotificationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objNotificationAsCreatedByArray[] = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'notificationuseraccount__notification_user_account_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objNotificationUserAccountArray)) {
						$objPreviousChildItem = $objPreviousItem->_objNotificationUserAccountArray[$intPreviousChildItemCount - 1];
						$objChildItem = NotificationUserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationuseraccount__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objNotificationUserAccountArray[] = $objChildItem;
					} else
						$objPreviousItem->_objNotificationUserAccountArray[] = NotificationUserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationuseraccount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'receiptascreatedby__receipt_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objReceiptAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objReceiptAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objReceiptAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objReceiptAsCreatedByArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'receiptasmodifiedby__receipt_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objReceiptAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objReceiptAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objReceiptAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objReceiptAsModifiedByArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleasmodifiedby__role_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleAsModifiedByArray[] = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleascreatedby__role_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleAsCreatedByArray[] = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleentityqtypebuiltinauthorizationasmodifiedby__role_entity_built_in_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray[] = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleentityqtypebuiltinauthorizationascreatedby__role_entity_built_in_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray[] = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationasmodifiedby__role_entity_qtype_custom_field_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray[] = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationascreatedby__role_entity_qtype_custom_field_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray[] = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'rolemoduleasmodifiedby__role_module_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleModuleAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleModuleAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleModuleAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleModuleAsModifiedByArray[] = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'rolemoduleascreatedby__role_module_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleModuleAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleModuleAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleModuleAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleModuleAsCreatedByArray[] = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'rolemoduleauthorizationasmodifiedby__role_module_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleModuleAuthorizationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleModuleAuthorizationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleModuleAuthorizationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleModuleAuthorizationAsModifiedByArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'rolemoduleauthorizationascreatedby__role_module_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleModuleAuthorizationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleModuleAuthorizationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleModuleAuthorizationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleModuleAuthorizationAsCreatedByArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roletransactiontypeauthorizationascreatedby__role_transaction_type_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleTransactionTypeAuthorizationAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleTransactionTypeAuthorizationAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleTransactionTypeAuthorizationAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleTransactionTypeAuthorizationAsCreatedByArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'roletransactiontypeauthorizationasmodifiedby__role_transaction_type_authorization_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRoleTransactionTypeAuthorizationAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRoleTransactionTypeAuthorizationAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRoleTransactionTypeAuthorizationAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRoleTransactionTypeAuthorizationAsModifiedByArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'shipmentascreatedby__shipment_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objShipmentAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objShipmentAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objShipmentAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objShipmentAsCreatedByArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'shipmentasmodifiedby__shipment_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objShipmentAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objShipmentAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objShipmentAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objShipmentAsModifiedByArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'transactionascreatedby__transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTransactionAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTransactionAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTransactionAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTransactionAsCreatedByArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'transactionasmodifiedby__transaction_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTransactionAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTransactionAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTransactionAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTransactionAsModifiedByArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'useraccountascreatedby__user_account_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserAccountAsCreatedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserAccountAsCreatedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountascreatedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserAccountAsCreatedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserAccountAsCreatedByArray[] = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'useraccountasmodifiedby__user_account_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserAccountAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserAccountAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserAccountAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserAccountAsModifiedByArray[] = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'user_account__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the UserAccount object
			$objToReturn = new UserAccount();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'user_account_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'user_account_id'] : $strAliasPrefix . 'user_account_id';
			$objToReturn->intUserAccountId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'username', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'username'] : $strAliasPrefix . 'username';
			$objToReturn->strUsername = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password_hash', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password_hash'] : $strAliasPrefix . 'password_hash';
			$objToReturn->strPasswordHash = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_address'] : $strAliasPrefix . 'email_address';
			$objToReturn->strEmailAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'admin_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'admin_flag'] : $strAliasPrefix . 'admin_flag';
			$objToReturn->blnAdminFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'portable_access_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'portable_access_flag'] : $strAliasPrefix . 'portable_access_flag';
			$objToReturn->blnPortableAccessFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'portable_user_pin', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'portable_user_pin'] : $strAliasPrefix . 'portable_user_pin';
			$objToReturn->intPortableUserPin = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'role_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'role_id'] : $strAliasPrefix . 'role_id';
			$objToReturn->intRoleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_date'] : $strAliasPrefix . 'modified_date';
			$objToReturn->strModifiedDate = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'user_account__';

			// Check for Role Early Binding
			$strAlias = $strAliasPrefix . 'role_id__role_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRole = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'role_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ModifiedByObject Early Binding
			$strAlias = $strAliasPrefix . 'modified_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objModifiedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'modified_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for AddressAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'addressascreatedby__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAddressAsCreatedByArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAddressAsCreatedBy = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AddressAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'addressasmodifiedby__address_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAddressAsModifiedByArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAddressAsModifiedBy = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'addressasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assetasmodifiedby__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetAsModifiedByArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetAsModifiedBy = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assetascreatedby__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetAsCreatedByArray[] = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetAsCreatedBy = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetModelAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assetmodelasmodifiedby__asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetModelAsModifiedByArray[] = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetModelAsModifiedBy = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetModelAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assetmodelascreatedby__asset_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetModelAsCreatedByArray[] = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetModelAsCreatedBy = AssetModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assetmodelascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransactionAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactionascreatedby__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionAsCreatedByArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionAsCreatedBy = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransactionAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactionasmodifiedby__asset_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionAsModifiedByArray[] = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionAsModifiedBy = AssetTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransactionCheckoutAsToUser Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactioncheckoutastouser__asset_transaction_checkout_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionCheckoutAsToUserArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutastouser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionCheckoutAsToUser = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutastouser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransactionCheckoutAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactioncheckoutascreatedby__asset_transaction_checkout_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionCheckoutAsCreatedByArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionCheckoutAsCreatedBy = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AssetTransactionCheckoutAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'assettransactioncheckoutasmodifiedby__asset_transaction_checkout_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAssetTransactionCheckoutAsModifiedByArray[] = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAssetTransactionCheckoutAsModifiedBy = AssetTransactionCheckout::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assettransactioncheckoutasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AttachmentAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'attachmentascreatedby__attachment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttachmentAsCreatedByArray[] = Attachment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attachmentascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttachmentAsCreatedBy = Attachment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attachmentascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AuditAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'auditasmodifiedby__audit_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAuditAsModifiedByArray[] = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAuditAsModifiedBy = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AuditAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'auditascreatedby__audit_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAuditAsCreatedByArray[] = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAuditAsCreatedBy = Audit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'auditascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CategoryAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'categoryasmodifiedby__category_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCategoryAsModifiedByArray[] = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCategoryAsModifiedBy = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CategoryAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'categoryascreatedby__category_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCategoryAsCreatedByArray[] = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCategoryAsCreatedBy = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'categoryascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CompanyAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'companyasmodifiedby__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCompanyAsModifiedByArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCompanyAsModifiedBy = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CompanyAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'companyascreatedby__company_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCompanyAsCreatedByArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCompanyAsCreatedBy = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'companyascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ContactAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'contactasmodifiedby__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objContactAsModifiedByArray[] = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objContactAsModifiedBy = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ContactAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'contactascreatedby__contact_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objContactAsCreatedByArray[] = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objContactAsCreatedBy = Contact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contactascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CustomFieldAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'customfieldasmodifiedby__custom_field_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCustomFieldAsModifiedByArray[] = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCustomFieldAsModifiedBy = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CustomFieldAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'customfieldascreatedby__custom_field_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCustomFieldAsCreatedByArray[] = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCustomFieldAsCreatedBy = CustomField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CustomFieldValueAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'customfieldvalueascreatedby__custom_field_value_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCustomFieldValueAsCreatedByArray[] = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCustomFieldValueAsCreatedBy = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CustomFieldValueAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'customfieldvalueasmodifiedby__custom_field_value_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCustomFieldValueAsModifiedByArray[] = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCustomFieldValueAsModifiedBy = CustomFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'customfieldvalueasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for DatagridColumnPreference Virtual Binding
			$strAlias = $strAliasPrefix . 'datagridcolumnpreference__datagrid_column_preference_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objDatagridColumnPreferenceArray[] = DatagridColumnPreference::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datagridcolumnpreference__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objDatagridColumnPreference = DatagridColumnPreference::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datagridcolumnpreference__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryLocationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorylocationascreatedby__inventory_location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryLocationAsCreatedByArray[] = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryLocationAsCreatedBy = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryLocationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorylocationasmodifiedby__inventory_location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryLocationAsModifiedByArray[] = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryLocationAsModifiedBy = InventoryLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorylocationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryModelAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorymodelasmodifiedby__inventory_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryModelAsModifiedByArray[] = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryModelAsModifiedBy = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryModelAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorymodelascreatedby__inventory_model_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryModelAsCreatedByArray[] = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryModelAsCreatedBy = InventoryModel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorymodelascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryTransactionAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorytransactionasmodifiedby__inventory_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryTransactionAsModifiedByArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryTransactionAsModifiedBy = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for InventoryTransactionAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'inventorytransactionascreatedby__inventory_transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objInventoryTransactionAsCreatedByArray[] = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objInventoryTransactionAsCreatedBy = InventoryTransaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'inventorytransactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LocationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'locationasmodifiedby__location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLocationAsModifiedByArray[] = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLocationAsModifiedBy = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LocationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'locationascreatedby__location_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLocationAsCreatedByArray[] = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLocationAsCreatedBy = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'locationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ManufacturerAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'manufacturerasmodifiedby__manufacturer_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objManufacturerAsModifiedByArray[] = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objManufacturerAsModifiedBy = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ManufacturerAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'manufacturerascreatedby__manufacturer_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objManufacturerAsCreatedByArray[] = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objManufacturerAsCreatedBy = Manufacturer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manufacturerascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for NotificationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'notificationasmodifiedby__notification_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objNotificationAsModifiedByArray[] = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objNotificationAsModifiedBy = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for NotificationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'notificationascreatedby__notification_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objNotificationAsCreatedByArray[] = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objNotificationAsCreatedBy = Notification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for NotificationUserAccount Virtual Binding
			$strAlias = $strAliasPrefix . 'notificationuseraccount__notification_user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objNotificationUserAccountArray[] = NotificationUserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationuseraccount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objNotificationUserAccount = NotificationUserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificationuseraccount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ReceiptAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'receiptascreatedby__receipt_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objReceiptAsCreatedByArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objReceiptAsCreatedBy = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ReceiptAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'receiptasmodifiedby__receipt_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objReceiptAsModifiedByArray[] = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objReceiptAsModifiedBy = Receipt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receiptasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roleasmodifiedby__role_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleAsModifiedByArray[] = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleAsModifiedBy = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roleascreatedby__role_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleAsCreatedByArray[] = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleAsCreatedBy = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleEntityQtypeBuiltInAuthorizationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roleentityqtypebuiltinauthorizationasmodifiedby__role_entity_built_in_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray[] = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedBy = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleEntityQtypeBuiltInAuthorizationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roleentityqtypebuiltinauthorizationascreatedby__role_entity_built_in_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray[] = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedBy = RoleEntityQtypeBuiltInAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypebuiltinauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationasmodifiedby__role_entity_qtype_custom_field_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray[] = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationascreatedby__role_entity_qtype_custom_field_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray[] = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy = RoleEntityQtypeCustomFieldAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roleentityqtypecustomfieldauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleModuleAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemoduleasmodifiedby__role_module_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleAsModifiedByArray[] = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModuleAsModifiedBy = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleModuleAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemoduleascreatedby__role_module_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleAsCreatedByArray[] = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModuleAsCreatedBy = RoleModule::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleModuleAuthorizationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemoduleauthorizationasmodifiedby__role_module_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleAuthorizationAsModifiedByArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModuleAuthorizationAsModifiedBy = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleModuleAuthorizationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'rolemoduleauthorizationascreatedby__role_module_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleModuleAuthorizationAsCreatedByArray[] = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleModuleAuthorizationAsCreatedBy = RoleModuleAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rolemoduleauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleTransactionTypeAuthorizationAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roletransactiontypeauthorizationascreatedby__role_transaction_type_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleTransactionTypeAuthorizationAsCreatedByArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleTransactionTypeAuthorizationAsCreatedBy = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RoleTransactionTypeAuthorizationAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'roletransactiontypeauthorizationasmodifiedby__role_transaction_type_authorization_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRoleTransactionTypeAuthorizationAsModifiedByArray[] = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRoleTransactionTypeAuthorizationAsModifiedBy = RoleTransactionTypeAuthorization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'roletransactiontypeauthorizationasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ShipmentAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'shipmentascreatedby__shipment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objShipmentAsCreatedByArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objShipmentAsCreatedBy = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ShipmentAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'shipmentasmodifiedby__shipment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objShipmentAsModifiedByArray[] = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objShipmentAsModifiedBy = Shipment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'shipmentasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TransactionAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'transactionascreatedby__transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTransactionAsCreatedByArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTransactionAsCreatedBy = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TransactionAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'transactionasmodifiedby__transaction_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTransactionAsModifiedByArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTransactionAsModifiedBy = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transactionasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for UserAccountAsCreatedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'useraccountascreatedby__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserAccountAsCreatedByArray[] = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUserAccountAsCreatedBy = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountascreatedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for UserAccountAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'useraccountasmodifiedby__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserAccountAsModifiedByArray[] = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUserAccountAsModifiedBy = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'useraccountasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of UserAccounts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return UserAccount[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = UserAccount::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = UserAccount::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single UserAccount object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return UserAccount next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return UserAccount::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single UserAccount object,
		 * by UserAccountId Index(es)
		 * @param integer $intUserAccountId
		 * @return UserAccount
		*/
		public static function LoadByUserAccountId($intUserAccountId, $objOptionalClauses = null) {
			return UserAccount::QuerySingle(
				QQ::Equal(QQN::UserAccount()->UserAccountId, $intUserAccountId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single UserAccount object,
		 * by Username Index(es)
		 * @param string $strUsername
		 * @return UserAccount
		*/
		public static function LoadByUsername($strUsername, $objOptionalClauses = null) {
			return UserAccount::QuerySingle(
				QQ::Equal(QQN::UserAccount()->Username, $strUsername)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of UserAccount objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call UserAccount::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return UserAccount::QueryArray(
					QQ::Equal(QQN::UserAccount()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UserAccounts
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call UserAccount::QueryCount to perform the CountByCreatedBy query
			return UserAccount::QueryCount(
				QQ::Equal(QQN::UserAccount()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of UserAccount objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call UserAccount::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return UserAccount::QueryArray(
					QQ::Equal(QQN::UserAccount()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UserAccounts
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call UserAccount::QueryCount to perform the CountByModifiedBy query
			return UserAccount::QueryCount(
				QQ::Equal(QQN::UserAccount()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of UserAccount objects,
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		*/
		public static function LoadArrayByRoleId($intRoleId, $objOptionalClauses = null) {
			// Call UserAccount::QueryArray to perform the LoadArrayByRoleId query
			try {
				return UserAccount::QueryArray(
					QQ::Equal(QQN::UserAccount()->RoleId, $intRoleId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UserAccounts
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @return int
		*/
		public static function CountByRoleId($intRoleId, $objOptionalClauses = null) {
			// Call UserAccount::QueryCount to perform the CountByRoleId query
			return UserAccount::QueryCount(
				QQ::Equal(QQN::UserAccount()->RoleId, $intRoleId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this UserAccount
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `user_account` (
							`first_name`,
							`last_name`,
							`username`,
							`password_hash`,
							`email_address`,
							`active_flag`,
							`admin_flag`,
							`portable_access_flag`,
							`portable_user_pin`,
							`role_id`,
							`created_by`,
							`creation_date`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strUsername) . ',
							' . $objDatabase->SqlVariable($this->strPasswordHash) . ',
							' . $objDatabase->SqlVariable($this->strEmailAddress) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							' . $objDatabase->SqlVariable($this->blnAdminFlag) . ',
							' . $objDatabase->SqlVariable($this->blnPortableAccessFlag) . ',
							' . $objDatabase->SqlVariable($this->intPortableUserPin) . ',
							' . $objDatabase->SqlVariable($this->intRoleId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intUserAccountId = $objDatabase->InsertId('user_account', 'user_account_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`modified_date`
							FROM
								`user_account`
							WHERE
								`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModifiedDate)
							throw new QOptimisticLockingException('UserAccount');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`user_account`
						SET
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`username` = ' . $objDatabase->SqlVariable($this->strUsername) . ',
							`password_hash` = ' . $objDatabase->SqlVariable($this->strPasswordHash) . ',
							`email_address` = ' . $objDatabase->SqlVariable($this->strEmailAddress) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							`admin_flag` = ' . $objDatabase->SqlVariable($this->blnAdminFlag) . ',
							`portable_access_flag` = ' . $objDatabase->SqlVariable($this->blnPortableAccessFlag) . ',
							`portable_user_pin` = ' . $objDatabase->SqlVariable($this->intPortableUserPin) . ',
							`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						WHERE
							`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`modified_date`
				FROM
					`user_account`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModifiedDate = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this UserAccount
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this UserAccount with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all UserAccounts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`');
		}

		/**
		 * Truncate user_account table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `user_account`');
		}

		/**
		 * Reload this UserAccount from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved UserAccount object.');

			// Reload the Object
			$objReloaded = UserAccount::Load($this->intUserAccountId);

			// Update $this's local variables to match
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strUsername = $objReloaded->strUsername;
			$this->strPasswordHash = $objReloaded->strPasswordHash;
			$this->strEmailAddress = $objReloaded->strEmailAddress;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
			$this->blnAdminFlag = $objReloaded->blnAdminFlag;
			$this->blnPortableAccessFlag = $objReloaded->blnPortableAccessFlag;
			$this->intPortableUserPin = $objReloaded->intPortableUserPin;
			$this->RoleId = $objReloaded->RoleId;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModifiedDate = $objReloaded->strModifiedDate;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = UserAccount::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `user_account` (
					`user_account_id`,
					`first_name`,
					`last_name`,
					`username`,
					`password_hash`,
					`email_address`,
					`active_flag`,
					`admin_flag`,
					`portable_access_flag`,
					`portable_user_pin`,
					`role_id`,
					`created_by`,
					`creation_date`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intUserAccountId) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strUsername) . ',
					' . $objDatabase->SqlVariable($this->strPasswordHash) . ',
					' . $objDatabase->SqlVariable($this->strEmailAddress) . ',
					' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
					' . $objDatabase->SqlVariable($this->blnAdminFlag) . ',
					' . $objDatabase->SqlVariable($this->blnPortableAccessFlag) . ',
					' . $objDatabase->SqlVariable($this->intPortableUserPin) . ',
					' . $objDatabase->SqlVariable($this->intRoleId) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intUserAccountId
		 * @return UserAccount[]
		 */
		public static function GetJournalForId($intUserAccountId) {
			$objDatabase = UserAccount::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM user_account WHERE user_account_id = ' .
				$objDatabase->SqlVariable($intUserAccountId) . ' ORDER BY __sys_date');

			return UserAccount::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return UserAccount[]
		 */
		public function GetJournal() {
			return UserAccount::GetJournalForId($this->intUserAccountId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'UserAccountId':
					// Gets the value for intUserAccountId (Read-Only PK)
					// @return integer
					return $this->intUserAccountId;

				case 'FirstName':
					// Gets the value for strFirstName (Not Null)
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName (Not Null)
					// @return string
					return $this->strLastName;

				case 'Username':
					// Gets the value for strUsername (Unique)
					// @return string
					return $this->strUsername;

				case 'PasswordHash':
					// Gets the value for strPasswordHash (Not Null)
					// @return string
					return $this->strPasswordHash;

				case 'EmailAddress':
					// Gets the value for strEmailAddress 
					// @return string
					return $this->strEmailAddress;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag (Not Null)
					// @return boolean
					return $this->blnActiveFlag;

				case 'AdminFlag':
					// Gets the value for blnAdminFlag (Not Null)
					// @return boolean
					return $this->blnAdminFlag;

				case 'PortableAccessFlag':
					// Gets the value for blnPortableAccessFlag 
					// @return boolean
					return $this->blnPortableAccessFlag;

				case 'PortableUserPin':
					// Gets the value for intPortableUserPin 
					// @return integer
					return $this->intPortableUserPin;

				case 'RoleId':
					// Gets the value for intRoleId (Not Null)
					// @return integer
					return $this->intRoleId;

				case 'CreatedBy':
					// Gets the value for intCreatedBy 
					// @return integer
					return $this->intCreatedBy;

				case 'CreationDate':
					// Gets the value for dttCreationDate 
					// @return QDateTime
					return $this->dttCreationDate;

				case 'ModifiedBy':
					// Gets the value for intModifiedBy 
					// @return integer
					return $this->intModifiedBy;

				case 'ModifiedDate':
					// Gets the value for strModifiedDate (Read-Only Timestamp)
					// @return string
					return $this->strModifiedDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Role':
					// Gets the value for the Role object referenced by intRoleId (Not Null)
					// @return Role
					try {
						if ((!$this->objRole) && (!is_null($this->intRoleId)))
							$this->objRole = Role::Load($this->intRoleId);
						return $this->objRole;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					// Gets the value for the UserAccount object referenced by intCreatedBy 
					// @return UserAccount
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = UserAccount::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedByObject':
					// Gets the value for the UserAccount object referenced by intModifiedBy 
					// @return UserAccount
					try {
						if ((!$this->objModifiedByObject) && (!is_null($this->intModifiedBy)))
							$this->objModifiedByObject = UserAccount::Load($this->intModifiedBy);
						return $this->objModifiedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AddressAsCreatedBy':
					// Gets the value for the private _objAddressAsCreatedBy (Read-Only)
					// if set due to an expansion on the address.created_by reverse relationship
					// @return Address
					return $this->_objAddressAsCreatedBy;

				case '_AddressAsCreatedByArray':
					// Gets the value for the private _objAddressAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the address.created_by reverse relationship
					// @return Address[]
					return (array) $this->_objAddressAsCreatedByArray;

				case '_AddressAsModifiedBy':
					// Gets the value for the private _objAddressAsModifiedBy (Read-Only)
					// if set due to an expansion on the address.modified_by reverse relationship
					// @return Address
					return $this->_objAddressAsModifiedBy;

				case '_AddressAsModifiedByArray':
					// Gets the value for the private _objAddressAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the address.modified_by reverse relationship
					// @return Address[]
					return (array) $this->_objAddressAsModifiedByArray;

				case '_AssetAsModifiedBy':
					// Gets the value for the private _objAssetAsModifiedBy (Read-Only)
					// if set due to an expansion on the asset.modified_by reverse relationship
					// @return Asset
					return $this->_objAssetAsModifiedBy;

				case '_AssetAsModifiedByArray':
					// Gets the value for the private _objAssetAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset.modified_by reverse relationship
					// @return Asset[]
					return (array) $this->_objAssetAsModifiedByArray;

				case '_AssetAsCreatedBy':
					// Gets the value for the private _objAssetAsCreatedBy (Read-Only)
					// if set due to an expansion on the asset.created_by reverse relationship
					// @return Asset
					return $this->_objAssetAsCreatedBy;

				case '_AssetAsCreatedByArray':
					// Gets the value for the private _objAssetAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset.created_by reverse relationship
					// @return Asset[]
					return (array) $this->_objAssetAsCreatedByArray;

				case '_AssetModelAsModifiedBy':
					// Gets the value for the private _objAssetModelAsModifiedBy (Read-Only)
					// if set due to an expansion on the asset_model.modified_by reverse relationship
					// @return AssetModel
					return $this->_objAssetModelAsModifiedBy;

				case '_AssetModelAsModifiedByArray':
					// Gets the value for the private _objAssetModelAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_model.modified_by reverse relationship
					// @return AssetModel[]
					return (array) $this->_objAssetModelAsModifiedByArray;

				case '_AssetModelAsCreatedBy':
					// Gets the value for the private _objAssetModelAsCreatedBy (Read-Only)
					// if set due to an expansion on the asset_model.created_by reverse relationship
					// @return AssetModel
					return $this->_objAssetModelAsCreatedBy;

				case '_AssetModelAsCreatedByArray':
					// Gets the value for the private _objAssetModelAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_model.created_by reverse relationship
					// @return AssetModel[]
					return (array) $this->_objAssetModelAsCreatedByArray;

				case '_AssetTransactionAsCreatedBy':
					// Gets the value for the private _objAssetTransactionAsCreatedBy (Read-Only)
					// if set due to an expansion on the asset_transaction.created_by reverse relationship
					// @return AssetTransaction
					return $this->_objAssetTransactionAsCreatedBy;

				case '_AssetTransactionAsCreatedByArray':
					// Gets the value for the private _objAssetTransactionAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction.created_by reverse relationship
					// @return AssetTransaction[]
					return (array) $this->_objAssetTransactionAsCreatedByArray;

				case '_AssetTransactionAsModifiedBy':
					// Gets the value for the private _objAssetTransactionAsModifiedBy (Read-Only)
					// if set due to an expansion on the asset_transaction.modified_by reverse relationship
					// @return AssetTransaction
					return $this->_objAssetTransactionAsModifiedBy;

				case '_AssetTransactionAsModifiedByArray':
					// Gets the value for the private _objAssetTransactionAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction.modified_by reverse relationship
					// @return AssetTransaction[]
					return (array) $this->_objAssetTransactionAsModifiedByArray;

				case '_AssetTransactionCheckoutAsToUser':
					// Gets the value for the private _objAssetTransactionCheckoutAsToUser (Read-Only)
					// if set due to an expansion on the asset_transaction_checkout.to_user_id reverse relationship
					// @return AssetTransactionCheckout
					return $this->_objAssetTransactionCheckoutAsToUser;

				case '_AssetTransactionCheckoutAsToUserArray':
					// Gets the value for the private _objAssetTransactionCheckoutAsToUserArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction_checkout.to_user_id reverse relationship
					// @return AssetTransactionCheckout[]
					return (array) $this->_objAssetTransactionCheckoutAsToUserArray;

				case '_AssetTransactionCheckoutAsCreatedBy':
					// Gets the value for the private _objAssetTransactionCheckoutAsCreatedBy (Read-Only)
					// if set due to an expansion on the asset_transaction_checkout.created_by reverse relationship
					// @return AssetTransactionCheckout
					return $this->_objAssetTransactionCheckoutAsCreatedBy;

				case '_AssetTransactionCheckoutAsCreatedByArray':
					// Gets the value for the private _objAssetTransactionCheckoutAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction_checkout.created_by reverse relationship
					// @return AssetTransactionCheckout[]
					return (array) $this->_objAssetTransactionCheckoutAsCreatedByArray;

				case '_AssetTransactionCheckoutAsModifiedBy':
					// Gets the value for the private _objAssetTransactionCheckoutAsModifiedBy (Read-Only)
					// if set due to an expansion on the asset_transaction_checkout.modified_by reverse relationship
					// @return AssetTransactionCheckout
					return $this->_objAssetTransactionCheckoutAsModifiedBy;

				case '_AssetTransactionCheckoutAsModifiedByArray':
					// Gets the value for the private _objAssetTransactionCheckoutAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the asset_transaction_checkout.modified_by reverse relationship
					// @return AssetTransactionCheckout[]
					return (array) $this->_objAssetTransactionCheckoutAsModifiedByArray;

				case '_AttachmentAsCreatedBy':
					// Gets the value for the private _objAttachmentAsCreatedBy (Read-Only)
					// if set due to an expansion on the attachment.created_by reverse relationship
					// @return Attachment
					return $this->_objAttachmentAsCreatedBy;

				case '_AttachmentAsCreatedByArray':
					// Gets the value for the private _objAttachmentAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the attachment.created_by reverse relationship
					// @return Attachment[]
					return (array) $this->_objAttachmentAsCreatedByArray;

				case '_AuditAsModifiedBy':
					// Gets the value for the private _objAuditAsModifiedBy (Read-Only)
					// if set due to an expansion on the audit.modified_by reverse relationship
					// @return Audit
					return $this->_objAuditAsModifiedBy;

				case '_AuditAsModifiedByArray':
					// Gets the value for the private _objAuditAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the audit.modified_by reverse relationship
					// @return Audit[]
					return (array) $this->_objAuditAsModifiedByArray;

				case '_AuditAsCreatedBy':
					// Gets the value for the private _objAuditAsCreatedBy (Read-Only)
					// if set due to an expansion on the audit.created_by reverse relationship
					// @return Audit
					return $this->_objAuditAsCreatedBy;

				case '_AuditAsCreatedByArray':
					// Gets the value for the private _objAuditAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the audit.created_by reverse relationship
					// @return Audit[]
					return (array) $this->_objAuditAsCreatedByArray;

				case '_CategoryAsModifiedBy':
					// Gets the value for the private _objCategoryAsModifiedBy (Read-Only)
					// if set due to an expansion on the category.modified_by reverse relationship
					// @return Category
					return $this->_objCategoryAsModifiedBy;

				case '_CategoryAsModifiedByArray':
					// Gets the value for the private _objCategoryAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the category.modified_by reverse relationship
					// @return Category[]
					return (array) $this->_objCategoryAsModifiedByArray;

				case '_CategoryAsCreatedBy':
					// Gets the value for the private _objCategoryAsCreatedBy (Read-Only)
					// if set due to an expansion on the category.created_by reverse relationship
					// @return Category
					return $this->_objCategoryAsCreatedBy;

				case '_CategoryAsCreatedByArray':
					// Gets the value for the private _objCategoryAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the category.created_by reverse relationship
					// @return Category[]
					return (array) $this->_objCategoryAsCreatedByArray;

				case '_CompanyAsModifiedBy':
					// Gets the value for the private _objCompanyAsModifiedBy (Read-Only)
					// if set due to an expansion on the company.modified_by reverse relationship
					// @return Company
					return $this->_objCompanyAsModifiedBy;

				case '_CompanyAsModifiedByArray':
					// Gets the value for the private _objCompanyAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the company.modified_by reverse relationship
					// @return Company[]
					return (array) $this->_objCompanyAsModifiedByArray;

				case '_CompanyAsCreatedBy':
					// Gets the value for the private _objCompanyAsCreatedBy (Read-Only)
					// if set due to an expansion on the company.created_by reverse relationship
					// @return Company
					return $this->_objCompanyAsCreatedBy;

				case '_CompanyAsCreatedByArray':
					// Gets the value for the private _objCompanyAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the company.created_by reverse relationship
					// @return Company[]
					return (array) $this->_objCompanyAsCreatedByArray;

				case '_ContactAsModifiedBy':
					// Gets the value for the private _objContactAsModifiedBy (Read-Only)
					// if set due to an expansion on the contact.modified_by reverse relationship
					// @return Contact
					return $this->_objContactAsModifiedBy;

				case '_ContactAsModifiedByArray':
					// Gets the value for the private _objContactAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the contact.modified_by reverse relationship
					// @return Contact[]
					return (array) $this->_objContactAsModifiedByArray;

				case '_ContactAsCreatedBy':
					// Gets the value for the private _objContactAsCreatedBy (Read-Only)
					// if set due to an expansion on the contact.created_by reverse relationship
					// @return Contact
					return $this->_objContactAsCreatedBy;

				case '_ContactAsCreatedByArray':
					// Gets the value for the private _objContactAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the contact.created_by reverse relationship
					// @return Contact[]
					return (array) $this->_objContactAsCreatedByArray;

				case '_CustomFieldAsModifiedBy':
					// Gets the value for the private _objCustomFieldAsModifiedBy (Read-Only)
					// if set due to an expansion on the custom_field.modified_by reverse relationship
					// @return CustomField
					return $this->_objCustomFieldAsModifiedBy;

				case '_CustomFieldAsModifiedByArray':
					// Gets the value for the private _objCustomFieldAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the custom_field.modified_by reverse relationship
					// @return CustomField[]
					return (array) $this->_objCustomFieldAsModifiedByArray;

				case '_CustomFieldAsCreatedBy':
					// Gets the value for the private _objCustomFieldAsCreatedBy (Read-Only)
					// if set due to an expansion on the custom_field.created_by reverse relationship
					// @return CustomField
					return $this->_objCustomFieldAsCreatedBy;

				case '_CustomFieldAsCreatedByArray':
					// Gets the value for the private _objCustomFieldAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the custom_field.created_by reverse relationship
					// @return CustomField[]
					return (array) $this->_objCustomFieldAsCreatedByArray;

				case '_CustomFieldValueAsCreatedBy':
					// Gets the value for the private _objCustomFieldValueAsCreatedBy (Read-Only)
					// if set due to an expansion on the custom_field_value.created_by reverse relationship
					// @return CustomFieldValue
					return $this->_objCustomFieldValueAsCreatedBy;

				case '_CustomFieldValueAsCreatedByArray':
					// Gets the value for the private _objCustomFieldValueAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the custom_field_value.created_by reverse relationship
					// @return CustomFieldValue[]
					return (array) $this->_objCustomFieldValueAsCreatedByArray;

				case '_CustomFieldValueAsModifiedBy':
					// Gets the value for the private _objCustomFieldValueAsModifiedBy (Read-Only)
					// if set due to an expansion on the custom_field_value.modified_by reverse relationship
					// @return CustomFieldValue
					return $this->_objCustomFieldValueAsModifiedBy;

				case '_CustomFieldValueAsModifiedByArray':
					// Gets the value for the private _objCustomFieldValueAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the custom_field_value.modified_by reverse relationship
					// @return CustomFieldValue[]
					return (array) $this->_objCustomFieldValueAsModifiedByArray;

				case '_DatagridColumnPreference':
					// Gets the value for the private _objDatagridColumnPreference (Read-Only)
					// if set due to an expansion on the datagrid_column_preference.user_account_id reverse relationship
					// @return DatagridColumnPreference
					return $this->_objDatagridColumnPreference;

				case '_DatagridColumnPreferenceArray':
					// Gets the value for the private _objDatagridColumnPreferenceArray (Read-Only)
					// if set due to an ExpandAsArray on the datagrid_column_preference.user_account_id reverse relationship
					// @return DatagridColumnPreference[]
					return (array) $this->_objDatagridColumnPreferenceArray;

				case '_InventoryLocationAsCreatedBy':
					// Gets the value for the private _objInventoryLocationAsCreatedBy (Read-Only)
					// if set due to an expansion on the inventory_location.created_by reverse relationship
					// @return InventoryLocation
					return $this->_objInventoryLocationAsCreatedBy;

				case '_InventoryLocationAsCreatedByArray':
					// Gets the value for the private _objInventoryLocationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_location.created_by reverse relationship
					// @return InventoryLocation[]
					return (array) $this->_objInventoryLocationAsCreatedByArray;

				case '_InventoryLocationAsModifiedBy':
					// Gets the value for the private _objInventoryLocationAsModifiedBy (Read-Only)
					// if set due to an expansion on the inventory_location.modified_by reverse relationship
					// @return InventoryLocation
					return $this->_objInventoryLocationAsModifiedBy;

				case '_InventoryLocationAsModifiedByArray':
					// Gets the value for the private _objInventoryLocationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_location.modified_by reverse relationship
					// @return InventoryLocation[]
					return (array) $this->_objInventoryLocationAsModifiedByArray;

				case '_InventoryModelAsModifiedBy':
					// Gets the value for the private _objInventoryModelAsModifiedBy (Read-Only)
					// if set due to an expansion on the inventory_model.modified_by reverse relationship
					// @return InventoryModel
					return $this->_objInventoryModelAsModifiedBy;

				case '_InventoryModelAsModifiedByArray':
					// Gets the value for the private _objInventoryModelAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_model.modified_by reverse relationship
					// @return InventoryModel[]
					return (array) $this->_objInventoryModelAsModifiedByArray;

				case '_InventoryModelAsCreatedBy':
					// Gets the value for the private _objInventoryModelAsCreatedBy (Read-Only)
					// if set due to an expansion on the inventory_model.created_by reverse relationship
					// @return InventoryModel
					return $this->_objInventoryModelAsCreatedBy;

				case '_InventoryModelAsCreatedByArray':
					// Gets the value for the private _objInventoryModelAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_model.created_by reverse relationship
					// @return InventoryModel[]
					return (array) $this->_objInventoryModelAsCreatedByArray;

				case '_InventoryTransactionAsModifiedBy':
					// Gets the value for the private _objInventoryTransactionAsModifiedBy (Read-Only)
					// if set due to an expansion on the inventory_transaction.modified_by reverse relationship
					// @return InventoryTransaction
					return $this->_objInventoryTransactionAsModifiedBy;

				case '_InventoryTransactionAsModifiedByArray':
					// Gets the value for the private _objInventoryTransactionAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_transaction.modified_by reverse relationship
					// @return InventoryTransaction[]
					return (array) $this->_objInventoryTransactionAsModifiedByArray;

				case '_InventoryTransactionAsCreatedBy':
					// Gets the value for the private _objInventoryTransactionAsCreatedBy (Read-Only)
					// if set due to an expansion on the inventory_transaction.created_by reverse relationship
					// @return InventoryTransaction
					return $this->_objInventoryTransactionAsCreatedBy;

				case '_InventoryTransactionAsCreatedByArray':
					// Gets the value for the private _objInventoryTransactionAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the inventory_transaction.created_by reverse relationship
					// @return InventoryTransaction[]
					return (array) $this->_objInventoryTransactionAsCreatedByArray;

				case '_LocationAsModifiedBy':
					// Gets the value for the private _objLocationAsModifiedBy (Read-Only)
					// if set due to an expansion on the location.modified_by reverse relationship
					// @return Location
					return $this->_objLocationAsModifiedBy;

				case '_LocationAsModifiedByArray':
					// Gets the value for the private _objLocationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the location.modified_by reverse relationship
					// @return Location[]
					return (array) $this->_objLocationAsModifiedByArray;

				case '_LocationAsCreatedBy':
					// Gets the value for the private _objLocationAsCreatedBy (Read-Only)
					// if set due to an expansion on the location.created_by reverse relationship
					// @return Location
					return $this->_objLocationAsCreatedBy;

				case '_LocationAsCreatedByArray':
					// Gets the value for the private _objLocationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the location.created_by reverse relationship
					// @return Location[]
					return (array) $this->_objLocationAsCreatedByArray;

				case '_ManufacturerAsModifiedBy':
					// Gets the value for the private _objManufacturerAsModifiedBy (Read-Only)
					// if set due to an expansion on the manufacturer.modified_by reverse relationship
					// @return Manufacturer
					return $this->_objManufacturerAsModifiedBy;

				case '_ManufacturerAsModifiedByArray':
					// Gets the value for the private _objManufacturerAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the manufacturer.modified_by reverse relationship
					// @return Manufacturer[]
					return (array) $this->_objManufacturerAsModifiedByArray;

				case '_ManufacturerAsCreatedBy':
					// Gets the value for the private _objManufacturerAsCreatedBy (Read-Only)
					// if set due to an expansion on the manufacturer.created_by reverse relationship
					// @return Manufacturer
					return $this->_objManufacturerAsCreatedBy;

				case '_ManufacturerAsCreatedByArray':
					// Gets the value for the private _objManufacturerAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the manufacturer.created_by reverse relationship
					// @return Manufacturer[]
					return (array) $this->_objManufacturerAsCreatedByArray;

				case '_NotificationAsModifiedBy':
					// Gets the value for the private _objNotificationAsModifiedBy (Read-Only)
					// if set due to an expansion on the notification.modified_by reverse relationship
					// @return Notification
					return $this->_objNotificationAsModifiedBy;

				case '_NotificationAsModifiedByArray':
					// Gets the value for the private _objNotificationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the notification.modified_by reverse relationship
					// @return Notification[]
					return (array) $this->_objNotificationAsModifiedByArray;

				case '_NotificationAsCreatedBy':
					// Gets the value for the private _objNotificationAsCreatedBy (Read-Only)
					// if set due to an expansion on the notification.created_by reverse relationship
					// @return Notification
					return $this->_objNotificationAsCreatedBy;

				case '_NotificationAsCreatedByArray':
					// Gets the value for the private _objNotificationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the notification.created_by reverse relationship
					// @return Notification[]
					return (array) $this->_objNotificationAsCreatedByArray;

				case '_NotificationUserAccount':
					// Gets the value for the private _objNotificationUserAccount (Read-Only)
					// if set due to an expansion on the notification_user_account.user_account_id reverse relationship
					// @return NotificationUserAccount
					return $this->_objNotificationUserAccount;

				case '_NotificationUserAccountArray':
					// Gets the value for the private _objNotificationUserAccountArray (Read-Only)
					// if set due to an ExpandAsArray on the notification_user_account.user_account_id reverse relationship
					// @return NotificationUserAccount[]
					return (array) $this->_objNotificationUserAccountArray;

				case '_ReceiptAsCreatedBy':
					// Gets the value for the private _objReceiptAsCreatedBy (Read-Only)
					// if set due to an expansion on the receipt.created_by reverse relationship
					// @return Receipt
					return $this->_objReceiptAsCreatedBy;

				case '_ReceiptAsCreatedByArray':
					// Gets the value for the private _objReceiptAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the receipt.created_by reverse relationship
					// @return Receipt[]
					return (array) $this->_objReceiptAsCreatedByArray;

				case '_ReceiptAsModifiedBy':
					// Gets the value for the private _objReceiptAsModifiedBy (Read-Only)
					// if set due to an expansion on the receipt.modified_by reverse relationship
					// @return Receipt
					return $this->_objReceiptAsModifiedBy;

				case '_ReceiptAsModifiedByArray':
					// Gets the value for the private _objReceiptAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the receipt.modified_by reverse relationship
					// @return Receipt[]
					return (array) $this->_objReceiptAsModifiedByArray;

				case '_RoleAsModifiedBy':
					// Gets the value for the private _objRoleAsModifiedBy (Read-Only)
					// if set due to an expansion on the role.modified_by reverse relationship
					// @return Role
					return $this->_objRoleAsModifiedBy;

				case '_RoleAsModifiedByArray':
					// Gets the value for the private _objRoleAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role.modified_by reverse relationship
					// @return Role[]
					return (array) $this->_objRoleAsModifiedByArray;

				case '_RoleAsCreatedBy':
					// Gets the value for the private _objRoleAsCreatedBy (Read-Only)
					// if set due to an expansion on the role.created_by reverse relationship
					// @return Role
					return $this->_objRoleAsCreatedBy;

				case '_RoleAsCreatedByArray':
					// Gets the value for the private _objRoleAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role.created_by reverse relationship
					// @return Role[]
					return (array) $this->_objRoleAsCreatedByArray;

				case '_RoleEntityQtypeBuiltInAuthorizationAsModifiedBy':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsModifiedBy (Read-Only)
					// if set due to an expansion on the role_entity_qtype_built_in_authorization.modified_by reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization
					return $this->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedBy;

				case '_RoleEntityQtypeBuiltInAuthorizationAsModifiedByArray':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.modified_by reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization[]
					return (array) $this->_objRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray;

				case '_RoleEntityQtypeBuiltInAuthorizationAsCreatedBy':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsCreatedBy (Read-Only)
					// if set due to an expansion on the role_entity_qtype_built_in_authorization.created_by reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization
					return $this->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedBy;

				case '_RoleEntityQtypeBuiltInAuthorizationAsCreatedByArray':
					// Gets the value for the private _objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_built_in_authorization.created_by reverse relationship
					// @return RoleEntityQtypeBuiltInAuthorization[]
					return (array) $this->_objRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray;

				case '_RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy (Read-Only)
					// if set due to an expansion on the role_entity_qtype_custom_field_authorization.modified_by reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization
					return $this->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy;

				case '_RoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.modified_by reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization[]
					return (array) $this->_objRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray;

				case '_RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy (Read-Only)
					// if set due to an expansion on the role_entity_qtype_custom_field_authorization.created_by reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization
					return $this->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy;

				case '_RoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray':
					// Gets the value for the private _objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_entity_qtype_custom_field_authorization.created_by reverse relationship
					// @return RoleEntityQtypeCustomFieldAuthorization[]
					return (array) $this->_objRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray;

				case '_RoleModuleAsModifiedBy':
					// Gets the value for the private _objRoleModuleAsModifiedBy (Read-Only)
					// if set due to an expansion on the role_module.modified_by reverse relationship
					// @return RoleModule
					return $this->_objRoleModuleAsModifiedBy;

				case '_RoleModuleAsModifiedByArray':
					// Gets the value for the private _objRoleModuleAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module.modified_by reverse relationship
					// @return RoleModule[]
					return (array) $this->_objRoleModuleAsModifiedByArray;

				case '_RoleModuleAsCreatedBy':
					// Gets the value for the private _objRoleModuleAsCreatedBy (Read-Only)
					// if set due to an expansion on the role_module.created_by reverse relationship
					// @return RoleModule
					return $this->_objRoleModuleAsCreatedBy;

				case '_RoleModuleAsCreatedByArray':
					// Gets the value for the private _objRoleModuleAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module.created_by reverse relationship
					// @return RoleModule[]
					return (array) $this->_objRoleModuleAsCreatedByArray;

				case '_RoleModuleAuthorizationAsModifiedBy':
					// Gets the value for the private _objRoleModuleAuthorizationAsModifiedBy (Read-Only)
					// if set due to an expansion on the role_module_authorization.modified_by reverse relationship
					// @return RoleModuleAuthorization
					return $this->_objRoleModuleAuthorizationAsModifiedBy;

				case '_RoleModuleAuthorizationAsModifiedByArray':
					// Gets the value for the private _objRoleModuleAuthorizationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module_authorization.modified_by reverse relationship
					// @return RoleModuleAuthorization[]
					return (array) $this->_objRoleModuleAuthorizationAsModifiedByArray;

				case '_RoleModuleAuthorizationAsCreatedBy':
					// Gets the value for the private _objRoleModuleAuthorizationAsCreatedBy (Read-Only)
					// if set due to an expansion on the role_module_authorization.created_by reverse relationship
					// @return RoleModuleAuthorization
					return $this->_objRoleModuleAuthorizationAsCreatedBy;

				case '_RoleModuleAuthorizationAsCreatedByArray':
					// Gets the value for the private _objRoleModuleAuthorizationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_module_authorization.created_by reverse relationship
					// @return RoleModuleAuthorization[]
					return (array) $this->_objRoleModuleAuthorizationAsCreatedByArray;

				case '_RoleTransactionTypeAuthorizationAsCreatedBy':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationAsCreatedBy (Read-Only)
					// if set due to an expansion on the role_transaction_type_authorization.created_by reverse relationship
					// @return RoleTransactionTypeAuthorization
					return $this->_objRoleTransactionTypeAuthorizationAsCreatedBy;

				case '_RoleTransactionTypeAuthorizationAsCreatedByArray':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_transaction_type_authorization.created_by reverse relationship
					// @return RoleTransactionTypeAuthorization[]
					return (array) $this->_objRoleTransactionTypeAuthorizationAsCreatedByArray;

				case '_RoleTransactionTypeAuthorizationAsModifiedBy':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationAsModifiedBy (Read-Only)
					// if set due to an expansion on the role_transaction_type_authorization.modified_by reverse relationship
					// @return RoleTransactionTypeAuthorization
					return $this->_objRoleTransactionTypeAuthorizationAsModifiedBy;

				case '_RoleTransactionTypeAuthorizationAsModifiedByArray':
					// Gets the value for the private _objRoleTransactionTypeAuthorizationAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the role_transaction_type_authorization.modified_by reverse relationship
					// @return RoleTransactionTypeAuthorization[]
					return (array) $this->_objRoleTransactionTypeAuthorizationAsModifiedByArray;

				case '_ShipmentAsCreatedBy':
					// Gets the value for the private _objShipmentAsCreatedBy (Read-Only)
					// if set due to an expansion on the shipment.created_by reverse relationship
					// @return Shipment
					return $this->_objShipmentAsCreatedBy;

				case '_ShipmentAsCreatedByArray':
					// Gets the value for the private _objShipmentAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the shipment.created_by reverse relationship
					// @return Shipment[]
					return (array) $this->_objShipmentAsCreatedByArray;

				case '_ShipmentAsModifiedBy':
					// Gets the value for the private _objShipmentAsModifiedBy (Read-Only)
					// if set due to an expansion on the shipment.modified_by reverse relationship
					// @return Shipment
					return $this->_objShipmentAsModifiedBy;

				case '_ShipmentAsModifiedByArray':
					// Gets the value for the private _objShipmentAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the shipment.modified_by reverse relationship
					// @return Shipment[]
					return (array) $this->_objShipmentAsModifiedByArray;

				case '_TransactionAsCreatedBy':
					// Gets the value for the private _objTransactionAsCreatedBy (Read-Only)
					// if set due to an expansion on the transaction.created_by reverse relationship
					// @return Transaction
					return $this->_objTransactionAsCreatedBy;

				case '_TransactionAsCreatedByArray':
					// Gets the value for the private _objTransactionAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the transaction.created_by reverse relationship
					// @return Transaction[]
					return (array) $this->_objTransactionAsCreatedByArray;

				case '_TransactionAsModifiedBy':
					// Gets the value for the private _objTransactionAsModifiedBy (Read-Only)
					// if set due to an expansion on the transaction.modified_by reverse relationship
					// @return Transaction
					return $this->_objTransactionAsModifiedBy;

				case '_TransactionAsModifiedByArray':
					// Gets the value for the private _objTransactionAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the transaction.modified_by reverse relationship
					// @return Transaction[]
					return (array) $this->_objTransactionAsModifiedByArray;

				case '_UserAccountAsCreatedBy':
					// Gets the value for the private _objUserAccountAsCreatedBy (Read-Only)
					// if set due to an expansion on the user_account.created_by reverse relationship
					// @return UserAccount
					return $this->_objUserAccountAsCreatedBy;

				case '_UserAccountAsCreatedByArray':
					// Gets the value for the private _objUserAccountAsCreatedByArray (Read-Only)
					// if set due to an ExpandAsArray on the user_account.created_by reverse relationship
					// @return UserAccount[]
					return (array) $this->_objUserAccountAsCreatedByArray;

				case '_UserAccountAsModifiedBy':
					// Gets the value for the private _objUserAccountAsModifiedBy (Read-Only)
					// if set due to an expansion on the user_account.modified_by reverse relationship
					// @return UserAccount
					return $this->_objUserAccountAsModifiedBy;

				case '_UserAccountAsModifiedByArray':
					// Gets the value for the private _objUserAccountAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the user_account.modified_by reverse relationship
					// @return UserAccount[]
					return (array) $this->_objUserAccountAsModifiedByArray;


				case '__Restored':
					return $this->__blnRestored;

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
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'FirstName':
					// Sets the value for strFirstName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Username':
					// Sets the value for strUsername (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strUsername = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PasswordHash':
					// Sets the value for strPasswordHash (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPasswordHash = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailAddress':
					// Sets the value for strEmailAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmailAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ActiveFlag':
					// Sets the value for blnActiveFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnActiveFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AdminFlag':
					// Sets the value for blnAdminFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAdminFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PortableAccessFlag':
					// Sets the value for blnPortableAccessFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnPortableAccessFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PortableUserPin':
					// Sets the value for intPortableUserPin 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPortableUserPin = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RoleId':
					// Sets the value for intRoleId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objRole = null;
						return ($this->intRoleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					// Sets the value for intCreatedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreationDate':
					// Sets the value for dttCreationDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttCreationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedBy':
					// Sets the value for intModifiedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objModifiedByObject = null;
						return ($this->intModifiedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Role':
					// Sets the value for the Role object referenced by intRoleId (Not Null)
					// @param Role $mixValue
					// @return Role
					if (is_null($mixValue)) {
						$this->intRoleId = null;
						$this->objRole = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Role object
						try {
							$mixValue = QType::Cast($mixValue, 'Role');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Role object
						if (is_null($mixValue->RoleId))
							throw new QCallerException('Unable to set an unsaved Role for this UserAccount');

						// Update Local Member Variables
						$this->objRole = $mixValue;
						$this->intRoleId = $mixValue->RoleId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					// Sets the value for the UserAccount object referenced by intCreatedBy 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this UserAccount');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ModifiedByObject':
					// Sets the value for the UserAccount object referenced by intModifiedBy 
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intModifiedBy = null;
						$this->objModifiedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this UserAccount');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for AddressAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AddressesAsCreatedBy as an array of Address objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/ 
		public function GetAddressAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Address::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AddressesAsCreatedBy
		 * @return int
		*/ 
		public function CountAddressesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Address::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AddressAsCreatedBy
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function AssociateAddressAsCreatedBy(Address $objAddress) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddressAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddressAsCreatedBy on this UserAccount with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAddress->CreatedBy = $this->intUserAccountId;
				$objAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AddressAsCreatedBy
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function UnassociateAddressAsCreatedBy(Address $objAddress) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsCreatedBy on this UserAccount with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`created_by` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAddress->CreatedBy = null;
				$objAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AddressesAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAddressesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Address::LoadArrayByCreatedBy($this->intUserAccountId) as $objAddress) {
					$objAddress->CreatedBy = null;
					$objAddress->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AddressAsCreatedBy
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function DeleteAssociatedAddressAsCreatedBy(Address $objAddress) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsCreatedBy on this UserAccount with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAddress->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AddressesAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAddressesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Address::LoadArrayByCreatedBy($this->intUserAccountId) as $objAddress) {
					$objAddress->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AddressAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AddressesAsModifiedBy as an array of Address objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/ 
		public function GetAddressAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Address::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AddressesAsModifiedBy
		 * @return int
		*/ 
		public function CountAddressesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Address::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AddressAsModifiedBy
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function AssociateAddressAsModifiedBy(Address $objAddress) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddressAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddressAsModifiedBy on this UserAccount with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAddress->ModifiedBy = $this->intUserAccountId;
				$objAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AddressAsModifiedBy
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function UnassociateAddressAsModifiedBy(Address $objAddress) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsModifiedBy on this UserAccount with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`modified_by` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAddress->ModifiedBy = null;
				$objAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AddressesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllAddressesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Address::LoadArrayByModifiedBy($this->intUserAccountId) as $objAddress) {
					$objAddress->ModifiedBy = null;
					$objAddress->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AddressAsModifiedBy
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function DeleteAssociatedAddressAsModifiedBy(Address $objAddress) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAddress->AddressId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsModifiedBy on this UserAccount with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($objAddress->AddressId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAddress->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AddressesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllAddressesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddressAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Address::LoadArrayByModifiedBy($this->intUserAccountId) as $objAddress) {
					$objAddress->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetsAsModifiedBy as an array of Asset objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/ 
		public function GetAssetAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Asset::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetsAsModifiedBy
		 * @return int
		*/ 
		public function CountAssetsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Asset::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetAsModifiedBy
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function AssociateAssetAsModifiedBy(Asset $objAsset) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetAsModifiedBy on this UserAccount with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAsset->ModifiedBy = $this->intUserAccountId;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetAsModifiedBy
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function UnassociateAssetAsModifiedBy(Asset $objAsset) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsModifiedBy on this UserAccount with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`modified_by` = null
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->ModifiedBy = null;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByModifiedBy($this->intUserAccountId) as $objAsset) {
					$objAsset->ModifiedBy = null;
					$objAsset->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetAsModifiedBy
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function DeleteAssociatedAssetAsModifiedBy(Asset $objAsset) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsModifiedBy on this UserAccount with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllAssetsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByModifiedBy($this->intUserAccountId) as $objAsset) {
					$objAsset->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetsAsCreatedBy as an array of Asset objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asset[]
		*/ 
		public function GetAssetAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Asset::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetsAsCreatedBy
		 * @return int
		*/ 
		public function CountAssetsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Asset::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetAsCreatedBy
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function AssociateAssetAsCreatedBy(Asset $objAsset) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetAsCreatedBy on this UserAccount with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAsset->CreatedBy = $this->intUserAccountId;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetAsCreatedBy
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function UnassociateAssetAsCreatedBy(Asset $objAsset) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsCreatedBy on this UserAccount with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`created_by` = null
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->CreatedBy = null;
				$objAsset->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByCreatedBy($this->intUserAccountId) as $objAsset) {
					$objAsset->CreatedBy = null;
					$objAsset->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetAsCreatedBy
		 * @param Asset $objAsset
		 * @return void
		*/ 
		public function DeleteAssociatedAssetAsCreatedBy(Asset $objAsset) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAsset->AssetId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsCreatedBy on this UserAccount with an unsaved Asset.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`asset_id` = ' . $objDatabase->SqlVariable($objAsset->AssetId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAsset->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAssetsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Asset::LoadArrayByCreatedBy($this->intUserAccountId) as $objAsset) {
					$objAsset->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetModelAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetModelsAsModifiedBy as an array of AssetModel objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/ 
		public function GetAssetModelAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetModel::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetModelsAsModifiedBy
		 * @return int
		*/ 
		public function CountAssetModelsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetModel::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetModelAsModifiedBy
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function AssociateAssetModelAsModifiedBy(AssetModel $objAssetModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetModelAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetModelAsModifiedBy on this UserAccount with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->ModifiedBy = $this->intUserAccountId;
				$objAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetModelAsModifiedBy
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function UnassociateAssetModelAsModifiedBy(AssetModel $objAssetModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsModifiedBy on this UserAccount with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`modified_by` = null
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->ModifiedBy = null;
				$objAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetModelsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetModelsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetModel::LoadArrayByModifiedBy($this->intUserAccountId) as $objAssetModel) {
					$objAssetModel->ModifiedBy = null;
					$objAssetModel->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetModelAsModifiedBy
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function DeleteAssociatedAssetModelAsModifiedBy(AssetModel $objAssetModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsModifiedBy on this UserAccount with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetModelsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllAssetModelsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetModel::LoadArrayByModifiedBy($this->intUserAccountId) as $objAssetModel) {
					$objAssetModel->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetModelAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetModelsAsCreatedBy as an array of AssetModel objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetModel[]
		*/ 
		public function GetAssetModelAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetModel::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetModelsAsCreatedBy
		 * @return int
		*/ 
		public function CountAssetModelsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetModel::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetModelAsCreatedBy
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function AssociateAssetModelAsCreatedBy(AssetModel $objAssetModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetModelAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetModelAsCreatedBy on this UserAccount with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->CreatedBy = $this->intUserAccountId;
				$objAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetModelAsCreatedBy
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function UnassociateAssetModelAsCreatedBy(AssetModel $objAssetModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsCreatedBy on this UserAccount with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`created_by` = null
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->CreatedBy = null;
				$objAssetModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetModelsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetModelsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetModel::LoadArrayByCreatedBy($this->intUserAccountId) as $objAssetModel) {
					$objAssetModel->CreatedBy = null;
					$objAssetModel->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_model`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetModelAsCreatedBy
		 * @param AssetModel $objAssetModel
		 * @return void
		*/ 
		public function DeleteAssociatedAssetModelAsCreatedBy(AssetModel $objAssetModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetModel->AssetModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsCreatedBy on this UserAccount with an unsaved AssetModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`asset_model_id` = ' . $objDatabase->SqlVariable($objAssetModel->AssetModelId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetModel->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetModelsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAssetModelsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetModelAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetModel::LoadArrayByCreatedBy($this->intUserAccountId) as $objAssetModel) {
					$objAssetModel->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_model`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransactionAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionsAsCreatedBy as an array of AssetTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/ 
		public function GetAssetTransactionAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetTransaction::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionsAsCreatedBy
		 * @return int
		*/ 
		public function CountAssetTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetTransaction::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetTransactionAsCreatedBy
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function AssociateAssetTransactionAsCreatedBy(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionAsCreatedBy on this UserAccount with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->CreatedBy = $this->intUserAccountId;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionAsCreatedBy
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function UnassociateAssetTransactionAsCreatedBy(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsCreatedBy on this UserAccount with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`created_by` = null
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->CreatedBy = null;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByCreatedBy($this->intUserAccountId) as $objAssetTransaction) {
					$objAssetTransaction->CreatedBy = null;
					$objAssetTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionAsCreatedBy
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionAsCreatedBy(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsCreatedBy on this UserAccount with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByCreatedBy($this->intUserAccountId) as $objAssetTransaction) {
					$objAssetTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransactionAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionsAsModifiedBy as an array of AssetTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransaction[]
		*/ 
		public function GetAssetTransactionAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetTransaction::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionsAsModifiedBy
		 * @return int
		*/ 
		public function CountAssetTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetTransaction::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetTransactionAsModifiedBy
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function AssociateAssetTransactionAsModifiedBy(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionAsModifiedBy on this UserAccount with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->ModifiedBy = $this->intUserAccountId;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionAsModifiedBy
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function UnassociateAssetTransactionAsModifiedBy(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsModifiedBy on this UserAccount with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`modified_by` = null
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->ModifiedBy = null;
				$objAssetTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByModifiedBy($this->intUserAccountId) as $objAssetTransaction) {
					$objAssetTransaction->ModifiedBy = null;
					$objAssetTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionAsModifiedBy
		 * @param AssetTransaction $objAssetTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionAsModifiedBy(AssetTransaction $objAssetTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransaction->AssetTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsModifiedBy on this UserAccount with an unsaved AssetTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`asset_transaction_id` = ' . $objDatabase->SqlVariable($objAssetTransaction->AssetTransactionId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransaction::LoadArrayByModifiedBy($this->intUserAccountId) as $objAssetTransaction) {
					$objAssetTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransactionCheckoutAsToUser
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionCheckoutsAsToUser as an array of AssetTransactionCheckout objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/ 
		public function GetAssetTransactionCheckoutAsToUserArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetTransactionCheckout::LoadArrayByToUserId($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionCheckoutsAsToUser
		 * @return int
		*/ 
		public function CountAssetTransactionCheckoutsAsToUser() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetTransactionCheckout::CountByToUserId($this->intUserAccountId);
		}

		/**
		 * Associates a AssetTransactionCheckoutAsToUser
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function AssociateAssetTransactionCheckoutAsToUser(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsToUser on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsToUser on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`to_user_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->ToUserId = $this->intUserAccountId;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionCheckoutAsToUser
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function UnassociateAssetTransactionCheckoutAsToUser(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsToUser on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsToUser on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`to_user_id` = null
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`to_user_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->ToUserId = null;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionCheckoutsAsToUser
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionCheckoutsAsToUser() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsToUser on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByToUserId($this->intUserAccountId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->ToUserId = null;
					$objAssetTransactionCheckout->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`to_user_id` = null
				WHERE
					`to_user_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionCheckoutAsToUser
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionCheckoutAsToUser(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsToUser on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsToUser on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`to_user_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionCheckoutsAsToUser
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionCheckoutsAsToUser() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsToUser on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByToUserId($this->intUserAccountId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`to_user_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransactionCheckoutAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionCheckoutsAsCreatedBy as an array of AssetTransactionCheckout objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/ 
		public function GetAssetTransactionCheckoutAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetTransactionCheckout::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionCheckoutsAsCreatedBy
		 * @return int
		*/ 
		public function CountAssetTransactionCheckoutsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetTransactionCheckout::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetTransactionCheckoutAsCreatedBy
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function AssociateAssetTransactionCheckoutAsCreatedBy(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsCreatedBy on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->CreatedBy = $this->intUserAccountId;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionCheckoutAsCreatedBy
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function UnassociateAssetTransactionCheckoutAsCreatedBy(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsCreatedBy on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`created_by` = null
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->CreatedBy = null;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionCheckoutsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionCheckoutsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByCreatedBy($this->intUserAccountId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->CreatedBy = null;
					$objAssetTransactionCheckout->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionCheckoutAsCreatedBy
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionCheckoutAsCreatedBy(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsCreatedBy on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionCheckoutsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionCheckoutsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByCreatedBy($this->intUserAccountId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AssetTransactionCheckoutAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AssetTransactionCheckoutsAsModifiedBy as an array of AssetTransactionCheckout objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AssetTransactionCheckout[]
		*/ 
		public function GetAssetTransactionCheckoutAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return AssetTransactionCheckout::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AssetTransactionCheckoutsAsModifiedBy
		 * @return int
		*/ 
		public function CountAssetTransactionCheckoutsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return AssetTransactionCheckout::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AssetTransactionCheckoutAsModifiedBy
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function AssociateAssetTransactionCheckoutAsModifiedBy(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAssetTransactionCheckoutAsModifiedBy on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->ModifiedBy = $this->intUserAccountId;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AssetTransactionCheckoutAsModifiedBy
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function UnassociateAssetTransactionCheckoutAsModifiedBy(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsModifiedBy on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`modified_by` = null
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->ModifiedBy = null;
				$objAssetTransactionCheckout->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AssetTransactionCheckoutsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllAssetTransactionCheckoutsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByModifiedBy($this->intUserAccountId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->ModifiedBy = null;
					$objAssetTransactionCheckout->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asset_transaction_checkout`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AssetTransactionCheckoutAsModifiedBy
		 * @param AssetTransactionCheckout $objAssetTransactionCheckout
		 * @return void
		*/ 
		public function DeleteAssociatedAssetTransactionCheckoutAsModifiedBy(AssetTransactionCheckout $objAssetTransactionCheckout) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAssetTransactionCheckout->AssetTransactionCheckoutId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsModifiedBy on this UserAccount with an unsaved AssetTransactionCheckout.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`asset_transaction_checkout_id` = ' . $objDatabase->SqlVariable($objAssetTransactionCheckout->AssetTransactionCheckoutId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAssetTransactionCheckout->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AssetTransactionCheckoutsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllAssetTransactionCheckoutsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAssetTransactionCheckoutAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (AssetTransactionCheckout::LoadArrayByModifiedBy($this->intUserAccountId) as $objAssetTransactionCheckout) {
					$objAssetTransactionCheckout->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asset_transaction_checkout`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AttachmentAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AttachmentsAsCreatedBy as an array of Attachment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attachment[]
		*/ 
		public function GetAttachmentAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Attachment::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AttachmentsAsCreatedBy
		 * @return int
		*/ 
		public function CountAttachmentsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Attachment::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AttachmentAsCreatedBy
		 * @param Attachment $objAttachment
		 * @return void
		*/ 
		public function AssociateAttachmentAsCreatedBy(Attachment $objAttachment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttachmentAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAttachment->AttachmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttachmentAsCreatedBy on this UserAccount with an unsaved Attachment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attachment`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`attachment_id` = ' . $objDatabase->SqlVariable($objAttachment->AttachmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAttachment->CreatedBy = $this->intUserAccountId;
				$objAttachment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AttachmentAsCreatedBy
		 * @param Attachment $objAttachment
		 * @return void
		*/ 
		public function UnassociateAttachmentAsCreatedBy(Attachment $objAttachment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttachmentAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAttachment->AttachmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttachmentAsCreatedBy on this UserAccount with an unsaved Attachment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attachment`
				SET
					`created_by` = null
				WHERE
					`attachment_id` = ' . $objDatabase->SqlVariable($objAttachment->AttachmentId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAttachment->CreatedBy = null;
				$objAttachment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AttachmentsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAttachmentsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttachmentAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Attachment::LoadArrayByCreatedBy($this->intUserAccountId) as $objAttachment) {
					$objAttachment->CreatedBy = null;
					$objAttachment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attachment`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AttachmentAsCreatedBy
		 * @param Attachment $objAttachment
		 * @return void
		*/ 
		public function DeleteAssociatedAttachmentAsCreatedBy(Attachment $objAttachment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttachmentAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAttachment->AttachmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttachmentAsCreatedBy on this UserAccount with an unsaved Attachment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attachment`
				WHERE
					`attachment_id` = ' . $objDatabase->SqlVariable($objAttachment->AttachmentId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAttachment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AttachmentsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAttachmentsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttachmentAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Attachment::LoadArrayByCreatedBy($this->intUserAccountId) as $objAttachment) {
					$objAttachment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attachment`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AuditAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AuditsAsModifiedBy as an array of Audit objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audit[]
		*/ 
		public function GetAuditAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Audit::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AuditsAsModifiedBy
		 * @return int
		*/ 
		public function CountAuditsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Audit::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AuditAsModifiedBy
		 * @param Audit $objAudit
		 * @return void
		*/ 
		public function AssociateAuditAsModifiedBy(Audit $objAudit) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAuditAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAudit->AuditId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAuditAsModifiedBy on this UserAccount with an unsaved Audit.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`audit`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`audit_id` = ' . $objDatabase->SqlVariable($objAudit->AuditId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAudit->ModifiedBy = $this->intUserAccountId;
				$objAudit->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AuditAsModifiedBy
		 * @param Audit $objAudit
		 * @return void
		*/ 
		public function UnassociateAuditAsModifiedBy(Audit $objAudit) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAudit->AuditId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsModifiedBy on this UserAccount with an unsaved Audit.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`audit`
				SET
					`modified_by` = null
				WHERE
					`audit_id` = ' . $objDatabase->SqlVariable($objAudit->AuditId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAudit->ModifiedBy = null;
				$objAudit->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AuditsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllAuditsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Audit::LoadArrayByModifiedBy($this->intUserAccountId) as $objAudit) {
					$objAudit->ModifiedBy = null;
					$objAudit->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`audit`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AuditAsModifiedBy
		 * @param Audit $objAudit
		 * @return void
		*/ 
		public function DeleteAssociatedAuditAsModifiedBy(Audit $objAudit) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objAudit->AuditId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsModifiedBy on this UserAccount with an unsaved Audit.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`audit`
				WHERE
					`audit_id` = ' . $objDatabase->SqlVariable($objAudit->AuditId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAudit->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AuditsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllAuditsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Audit::LoadArrayByModifiedBy($this->intUserAccountId) as $objAudit) {
					$objAudit->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`audit`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for AuditAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AuditsAsCreatedBy as an array of Audit objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Audit[]
		*/ 
		public function GetAuditAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Audit::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AuditsAsCreatedBy
		 * @return int
		*/ 
		public function CountAuditsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Audit::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a AuditAsCreatedBy
		 * @param Audit $objAudit
		 * @return void
		*/ 
		public function AssociateAuditAsCreatedBy(Audit $objAudit) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAuditAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAudit->AuditId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAuditAsCreatedBy on this UserAccount with an unsaved Audit.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`audit`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`audit_id` = ' . $objDatabase->SqlVariable($objAudit->AuditId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objAudit->CreatedBy = $this->intUserAccountId;
				$objAudit->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a AuditAsCreatedBy
		 * @param Audit $objAudit
		 * @return void
		*/ 
		public function UnassociateAuditAsCreatedBy(Audit $objAudit) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAudit->AuditId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsCreatedBy on this UserAccount with an unsaved Audit.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`audit`
				SET
					`created_by` = null
				WHERE
					`audit_id` = ' . $objDatabase->SqlVariable($objAudit->AuditId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAudit->CreatedBy = null;
				$objAudit->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all AuditsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllAuditsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Audit::LoadArrayByCreatedBy($this->intUserAccountId) as $objAudit) {
					$objAudit->CreatedBy = null;
					$objAudit->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`audit`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated AuditAsCreatedBy
		 * @param Audit $objAudit
		 * @return void
		*/ 
		public function DeleteAssociatedAuditAsCreatedBy(Audit $objAudit) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objAudit->AuditId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsCreatedBy on this UserAccount with an unsaved Audit.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`audit`
				WHERE
					`audit_id` = ' . $objDatabase->SqlVariable($objAudit->AuditId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objAudit->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated AuditsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllAuditsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAuditAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Audit::LoadArrayByCreatedBy($this->intUserAccountId) as $objAudit) {
					$objAudit->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`audit`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CategoryAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CategoriesAsModifiedBy as an array of Category objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Category[]
		*/ 
		public function GetCategoryAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Category::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CategoriesAsModifiedBy
		 * @return int
		*/ 
		public function CountCategoriesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Category::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CategoryAsModifiedBy
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function AssociateCategoryAsModifiedBy(Category $objCategory) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCategoryAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCategory->CategoryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCategoryAsModifiedBy on this UserAccount with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`category`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->CategoryId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCategory->ModifiedBy = $this->intUserAccountId;
				$objCategory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CategoryAsModifiedBy
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function UnassociateCategoryAsModifiedBy(Category $objCategory) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCategory->CategoryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsModifiedBy on this UserAccount with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`category`
				SET
					`modified_by` = null
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->CategoryId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCategory->ModifiedBy = null;
				$objCategory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CategoriesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllCategoriesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Category::LoadArrayByModifiedBy($this->intUserAccountId) as $objCategory) {
					$objCategory->ModifiedBy = null;
					$objCategory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`category`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CategoryAsModifiedBy
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function DeleteAssociatedCategoryAsModifiedBy(Category $objCategory) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCategory->CategoryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsModifiedBy on this UserAccount with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`category`
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->CategoryId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCategory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CategoriesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllCategoriesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Category::LoadArrayByModifiedBy($this->intUserAccountId) as $objCategory) {
					$objCategory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`category`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CategoryAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CategoriesAsCreatedBy as an array of Category objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Category[]
		*/ 
		public function GetCategoryAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Category::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CategoriesAsCreatedBy
		 * @return int
		*/ 
		public function CountCategoriesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Category::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CategoryAsCreatedBy
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function AssociateCategoryAsCreatedBy(Category $objCategory) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCategoryAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCategory->CategoryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCategoryAsCreatedBy on this UserAccount with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`category`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->CategoryId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCategory->CreatedBy = $this->intUserAccountId;
				$objCategory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CategoryAsCreatedBy
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function UnassociateCategoryAsCreatedBy(Category $objCategory) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCategory->CategoryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsCreatedBy on this UserAccount with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`category`
				SET
					`created_by` = null
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->CategoryId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCategory->CreatedBy = null;
				$objCategory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CategoriesAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllCategoriesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Category::LoadArrayByCreatedBy($this->intUserAccountId) as $objCategory) {
					$objCategory->CreatedBy = null;
					$objCategory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`category`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CategoryAsCreatedBy
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function DeleteAssociatedCategoryAsCreatedBy(Category $objCategory) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCategory->CategoryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsCreatedBy on this UserAccount with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`category`
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->CategoryId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCategory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CategoriesAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllCategoriesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategoryAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Category::LoadArrayByCreatedBy($this->intUserAccountId) as $objCategory) {
					$objCategory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`category`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CompanyAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CompaniesAsModifiedBy as an array of Company objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Company[]
		*/ 
		public function GetCompanyAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Company::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CompaniesAsModifiedBy
		 * @return int
		*/ 
		public function CountCompaniesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Company::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CompanyAsModifiedBy
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function AssociateCompanyAsModifiedBy(Company $objCompany) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompanyAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompanyAsModifiedBy on this UserAccount with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCompany->ModifiedBy = $this->intUserAccountId;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CompanyAsModifiedBy
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function UnassociateCompanyAsModifiedBy(Company $objCompany) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsModifiedBy on this UserAccount with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`modified_by` = null
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->ModifiedBy = null;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CompaniesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllCompaniesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByModifiedBy($this->intUserAccountId) as $objCompany) {
					$objCompany->ModifiedBy = null;
					$objCompany->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CompanyAsModifiedBy
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function DeleteAssociatedCompanyAsModifiedBy(Company $objCompany) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsModifiedBy on this UserAccount with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CompaniesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllCompaniesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByModifiedBy($this->intUserAccountId) as $objCompany) {
					$objCompany->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CompanyAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CompaniesAsCreatedBy as an array of Company objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Company[]
		*/ 
		public function GetCompanyAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Company::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CompaniesAsCreatedBy
		 * @return int
		*/ 
		public function CountCompaniesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Company::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CompanyAsCreatedBy
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function AssociateCompanyAsCreatedBy(Company $objCompany) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompanyAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompanyAsCreatedBy on this UserAccount with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCompany->CreatedBy = $this->intUserAccountId;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CompanyAsCreatedBy
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function UnassociateCompanyAsCreatedBy(Company $objCompany) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsCreatedBy on this UserAccount with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`created_by` = null
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->CreatedBy = null;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CompaniesAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllCompaniesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByCreatedBy($this->intUserAccountId) as $objCompany) {
					$objCompany->CreatedBy = null;
					$objCompany->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CompanyAsCreatedBy
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function DeleteAssociatedCompanyAsCreatedBy(Company $objCompany) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCompany->CompanyId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsCreatedBy on this UserAccount with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->CompanyId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CompaniesAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllCompaniesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompanyAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByCreatedBy($this->intUserAccountId) as $objCompany) {
					$objCompany->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ContactAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContactsAsModifiedBy as an array of Contact objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/ 
		public function GetContactAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Contact::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContactsAsModifiedBy
		 * @return int
		*/ 
		public function CountContactsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Contact::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ContactAsModifiedBy
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function AssociateContactAsModifiedBy(Contact $objContact) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContactAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContactAsModifiedBy on this UserAccount with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objContact->ModifiedBy = $this->intUserAccountId;
				$objContact->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ContactAsModifiedBy
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function UnassociateContactAsModifiedBy(Contact $objContact) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsModifiedBy on this UserAccount with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`modified_by` = null
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objContact->ModifiedBy = null;
				$objContact->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ContactsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllContactsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Contact::LoadArrayByModifiedBy($this->intUserAccountId) as $objContact) {
					$objContact->ModifiedBy = null;
					$objContact->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ContactAsModifiedBy
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function DeleteAssociatedContactAsModifiedBy(Contact $objContact) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsModifiedBy on this UserAccount with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objContact->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ContactsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllContactsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Contact::LoadArrayByModifiedBy($this->intUserAccountId) as $objContact) {
					$objContact->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ContactAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContactsAsCreatedBy as an array of Contact objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Contact[]
		*/ 
		public function GetContactAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Contact::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContactsAsCreatedBy
		 * @return int
		*/ 
		public function CountContactsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Contact::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ContactAsCreatedBy
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function AssociateContactAsCreatedBy(Contact $objContact) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContactAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContactAsCreatedBy on this UserAccount with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objContact->CreatedBy = $this->intUserAccountId;
				$objContact->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ContactAsCreatedBy
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function UnassociateContactAsCreatedBy(Contact $objContact) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsCreatedBy on this UserAccount with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`created_by` = null
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objContact->CreatedBy = null;
				$objContact->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ContactsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllContactsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Contact::LoadArrayByCreatedBy($this->intUserAccountId) as $objContact) {
					$objContact->CreatedBy = null;
					$objContact->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contact`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ContactAsCreatedBy
		 * @param Contact $objContact
		 * @return void
		*/ 
		public function DeleteAssociatedContactAsCreatedBy(Contact $objContact) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objContact->ContactId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsCreatedBy on this UserAccount with an unsaved Contact.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`contact_id` = ' . $objDatabase->SqlVariable($objContact->ContactId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objContact->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ContactsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllContactsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContactAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Contact::LoadArrayByCreatedBy($this->intUserAccountId) as $objContact) {
					$objContact->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contact`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CustomFieldAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CustomFieldsAsModifiedBy as an array of CustomField objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomField[]
		*/ 
		public function GetCustomFieldAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return CustomField::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CustomFieldsAsModifiedBy
		 * @return int
		*/ 
		public function CountCustomFieldsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return CustomField::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CustomFieldAsModifiedBy
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function AssociateCustomFieldAsModifiedBy(CustomField $objCustomField) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldAsModifiedBy on this UserAccount with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->ModifiedBy = $this->intUserAccountId;
				$objCustomField->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CustomFieldAsModifiedBy
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function UnassociateCustomFieldAsModifiedBy(CustomField $objCustomField) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsModifiedBy on this UserAccount with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`modified_by` = null
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->ModifiedBy = null;
				$objCustomField->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CustomFieldsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllCustomFieldsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomField::LoadArrayByModifiedBy($this->intUserAccountId) as $objCustomField) {
					$objCustomField->ModifiedBy = null;
					$objCustomField->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CustomFieldAsModifiedBy
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function DeleteAssociatedCustomFieldAsModifiedBy(CustomField $objCustomField) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsModifiedBy on this UserAccount with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field`
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CustomFieldsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllCustomFieldsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomField::LoadArrayByModifiedBy($this->intUserAccountId) as $objCustomField) {
					$objCustomField->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CustomFieldAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CustomFieldsAsCreatedBy as an array of CustomField objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomField[]
		*/ 
		public function GetCustomFieldAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return CustomField::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CustomFieldsAsCreatedBy
		 * @return int
		*/ 
		public function CountCustomFieldsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return CustomField::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CustomFieldAsCreatedBy
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function AssociateCustomFieldAsCreatedBy(CustomField $objCustomField) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldAsCreatedBy on this UserAccount with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->CreatedBy = $this->intUserAccountId;
				$objCustomField->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CustomFieldAsCreatedBy
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function UnassociateCustomFieldAsCreatedBy(CustomField $objCustomField) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsCreatedBy on this UserAccount with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`created_by` = null
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->CreatedBy = null;
				$objCustomField->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CustomFieldsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllCustomFieldsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomField::LoadArrayByCreatedBy($this->intUserAccountId) as $objCustomField) {
					$objCustomField->CreatedBy = null;
					$objCustomField->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CustomFieldAsCreatedBy
		 * @param CustomField $objCustomField
		 * @return void
		*/ 
		public function DeleteAssociatedCustomFieldAsCreatedBy(CustomField $objCustomField) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCustomField->CustomFieldId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsCreatedBy on this UserAccount with an unsaved CustomField.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field`
				WHERE
					`custom_field_id` = ' . $objDatabase->SqlVariable($objCustomField->CustomFieldId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomField->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CustomFieldsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllCustomFieldsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomField::LoadArrayByCreatedBy($this->intUserAccountId) as $objCustomField) {
					$objCustomField->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CustomFieldValueAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CustomFieldValuesAsCreatedBy as an array of CustomFieldValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomFieldValue[]
		*/ 
		public function GetCustomFieldValueAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return CustomFieldValue::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CustomFieldValuesAsCreatedBy
		 * @return int
		*/ 
		public function CountCustomFieldValuesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return CustomFieldValue::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CustomFieldValueAsCreatedBy
		 * @param CustomFieldValue $objCustomFieldValue
		 * @return void
		*/ 
		public function AssociateCustomFieldValueAsCreatedBy(CustomFieldValue $objCustomFieldValue) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldValueAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCustomFieldValue->CustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldValueAsCreatedBy on this UserAccount with an unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field_value`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($objCustomFieldValue->CustomFieldValueId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCustomFieldValue->CreatedBy = $this->intUserAccountId;
				$objCustomFieldValue->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CustomFieldValueAsCreatedBy
		 * @param CustomFieldValue $objCustomFieldValue
		 * @return void
		*/ 
		public function UnassociateCustomFieldValueAsCreatedBy(CustomFieldValue $objCustomFieldValue) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCustomFieldValue->CustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsCreatedBy on this UserAccount with an unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field_value`
				SET
					`created_by` = null
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($objCustomFieldValue->CustomFieldValueId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomFieldValue->CreatedBy = null;
				$objCustomFieldValue->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CustomFieldValuesAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllCustomFieldValuesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomFieldValue::LoadArrayByCreatedBy($this->intUserAccountId) as $objCustomFieldValue) {
					$objCustomFieldValue->CreatedBy = null;
					$objCustomFieldValue->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field_value`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CustomFieldValueAsCreatedBy
		 * @param CustomFieldValue $objCustomFieldValue
		 * @return void
		*/ 
		public function DeleteAssociatedCustomFieldValueAsCreatedBy(CustomFieldValue $objCustomFieldValue) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objCustomFieldValue->CustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsCreatedBy on this UserAccount with an unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field_value`
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($objCustomFieldValue->CustomFieldValueId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomFieldValue->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CustomFieldValuesAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllCustomFieldValuesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomFieldValue::LoadArrayByCreatedBy($this->intUserAccountId) as $objCustomFieldValue) {
					$objCustomFieldValue->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field_value`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for CustomFieldValueAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CustomFieldValuesAsModifiedBy as an array of CustomFieldValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CustomFieldValue[]
		*/ 
		public function GetCustomFieldValueAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return CustomFieldValue::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CustomFieldValuesAsModifiedBy
		 * @return int
		*/ 
		public function CountCustomFieldValuesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return CustomFieldValue::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a CustomFieldValueAsModifiedBy
		 * @param CustomFieldValue $objCustomFieldValue
		 * @return void
		*/ 
		public function AssociateCustomFieldValueAsModifiedBy(CustomFieldValue $objCustomFieldValue) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldValueAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCustomFieldValue->CustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCustomFieldValueAsModifiedBy on this UserAccount with an unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field_value`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($objCustomFieldValue->CustomFieldValueId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCustomFieldValue->ModifiedBy = $this->intUserAccountId;
				$objCustomFieldValue->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CustomFieldValueAsModifiedBy
		 * @param CustomFieldValue $objCustomFieldValue
		 * @return void
		*/ 
		public function UnassociateCustomFieldValueAsModifiedBy(CustomFieldValue $objCustomFieldValue) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCustomFieldValue->CustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsModifiedBy on this UserAccount with an unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field_value`
				SET
					`modified_by` = null
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($objCustomFieldValue->CustomFieldValueId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomFieldValue->ModifiedBy = null;
				$objCustomFieldValue->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CustomFieldValuesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllCustomFieldValuesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomFieldValue::LoadArrayByModifiedBy($this->intUserAccountId) as $objCustomFieldValue) {
					$objCustomFieldValue->ModifiedBy = null;
					$objCustomFieldValue->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`custom_field_value`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated CustomFieldValueAsModifiedBy
		 * @param CustomFieldValue $objCustomFieldValue
		 * @return void
		*/ 
		public function DeleteAssociatedCustomFieldValueAsModifiedBy(CustomFieldValue $objCustomFieldValue) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objCustomFieldValue->CustomFieldValueId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsModifiedBy on this UserAccount with an unsaved CustomFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field_value`
				WHERE
					`custom_field_value_id` = ' . $objDatabase->SqlVariable($objCustomFieldValue->CustomFieldValueId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCustomFieldValue->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CustomFieldValuesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllCustomFieldValuesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCustomFieldValueAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CustomFieldValue::LoadArrayByModifiedBy($this->intUserAccountId) as $objCustomFieldValue) {
					$objCustomFieldValue->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`custom_field_value`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for DatagridColumnPreference
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DatagridColumnPreferences as an array of DatagridColumnPreference objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatagridColumnPreference[]
		*/ 
		public function GetDatagridColumnPreferenceArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return DatagridColumnPreference::LoadArrayByUserAccountId($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DatagridColumnPreferences
		 * @return int
		*/ 
		public function CountDatagridColumnPreferences() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return DatagridColumnPreference::CountByUserAccountId($this->intUserAccountId);
		}

		/**
		 * Associates a DatagridColumnPreference
		 * @param DatagridColumnPreference $objDatagridColumnPreference
		 * @return void
		*/ 
		public function AssociateDatagridColumnPreference(DatagridColumnPreference $objDatagridColumnPreference) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatagridColumnPreference on this unsaved UserAccount.');
			if ((is_null($objDatagridColumnPreference->DatagridColumnPreferenceId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatagridColumnPreference on this UserAccount with an unsaved DatagridColumnPreference.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datagrid_column_preference`
				SET
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`datagrid_column_preference_id` = ' . $objDatabase->SqlVariable($objDatagridColumnPreference->DatagridColumnPreferenceId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objDatagridColumnPreference->UserAccountId = $this->intUserAccountId;
				$objDatagridColumnPreference->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a DatagridColumnPreference
		 * @param DatagridColumnPreference $objDatagridColumnPreference
		 * @return void
		*/ 
		public function UnassociateDatagridColumnPreference(DatagridColumnPreference $objDatagridColumnPreference) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatagridColumnPreference on this unsaved UserAccount.');
			if ((is_null($objDatagridColumnPreference->DatagridColumnPreferenceId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatagridColumnPreference on this UserAccount with an unsaved DatagridColumnPreference.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datagrid_column_preference`
				SET
					`user_account_id` = null
				WHERE
					`datagrid_column_preference_id` = ' . $objDatabase->SqlVariable($objDatagridColumnPreference->DatagridColumnPreferenceId) . ' AND
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDatagridColumnPreference->UserAccountId = null;
				$objDatagridColumnPreference->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all DatagridColumnPreferences
		 * @return void
		*/ 
		public function UnassociateAllDatagridColumnPreferences() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatagridColumnPreference on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DatagridColumnPreference::LoadArrayByUserAccountId($this->intUserAccountId) as $objDatagridColumnPreference) {
					$objDatagridColumnPreference->UserAccountId = null;
					$objDatagridColumnPreference->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datagrid_column_preference`
				SET
					`user_account_id` = null
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated DatagridColumnPreference
		 * @param DatagridColumnPreference $objDatagridColumnPreference
		 * @return void
		*/ 
		public function DeleteAssociatedDatagridColumnPreference(DatagridColumnPreference $objDatagridColumnPreference) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatagridColumnPreference on this unsaved UserAccount.');
			if ((is_null($objDatagridColumnPreference->DatagridColumnPreferenceId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatagridColumnPreference on this UserAccount with an unsaved DatagridColumnPreference.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datagrid_column_preference`
				WHERE
					`datagrid_column_preference_id` = ' . $objDatabase->SqlVariable($objDatagridColumnPreference->DatagridColumnPreferenceId) . ' AND
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDatagridColumnPreference->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated DatagridColumnPreferences
		 * @return void
		*/ 
		public function DeleteAllDatagridColumnPreferences() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatagridColumnPreference on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DatagridColumnPreference::LoadArrayByUserAccountId($this->intUserAccountId) as $objDatagridColumnPreference) {
					$objDatagridColumnPreference->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datagrid_column_preference`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryLocationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryLocationsAsCreatedBy as an array of InventoryLocation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		*/ 
		public function GetInventoryLocationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return InventoryLocation::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryLocationsAsCreatedBy
		 * @return int
		*/ 
		public function CountInventoryLocationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return InventoryLocation::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a InventoryLocationAsCreatedBy
		 * @param InventoryLocation $objInventoryLocation
		 * @return void
		*/ 
		public function AssociateInventoryLocationAsCreatedBy(InventoryLocation $objInventoryLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryLocationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryLocation->InventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryLocationAsCreatedBy on this UserAccount with an unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_location`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($objInventoryLocation->InventoryLocationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryLocation->CreatedBy = $this->intUserAccountId;
				$objInventoryLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryLocationAsCreatedBy
		 * @param InventoryLocation $objInventoryLocation
		 * @return void
		*/ 
		public function UnassociateInventoryLocationAsCreatedBy(InventoryLocation $objInventoryLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryLocation->InventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsCreatedBy on this UserAccount with an unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_location`
				SET
					`created_by` = null
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($objInventoryLocation->InventoryLocationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryLocation->CreatedBy = null;
				$objInventoryLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryLocationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllInventoryLocationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryLocation::LoadArrayByCreatedBy($this->intUserAccountId) as $objInventoryLocation) {
					$objInventoryLocation->CreatedBy = null;
					$objInventoryLocation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_location`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated InventoryLocationAsCreatedBy
		 * @param InventoryLocation $objInventoryLocation
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryLocationAsCreatedBy(InventoryLocation $objInventoryLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryLocation->InventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsCreatedBy on this UserAccount with an unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_location`
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($objInventoryLocation->InventoryLocationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryLocation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryLocationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllInventoryLocationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryLocation::LoadArrayByCreatedBy($this->intUserAccountId) as $objInventoryLocation) {
					$objInventoryLocation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_location`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryLocationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryLocationsAsModifiedBy as an array of InventoryLocation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryLocation[]
		*/ 
		public function GetInventoryLocationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return InventoryLocation::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryLocationsAsModifiedBy
		 * @return int
		*/ 
		public function CountInventoryLocationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return InventoryLocation::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a InventoryLocationAsModifiedBy
		 * @param InventoryLocation $objInventoryLocation
		 * @return void
		*/ 
		public function AssociateInventoryLocationAsModifiedBy(InventoryLocation $objInventoryLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryLocationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryLocation->InventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryLocationAsModifiedBy on this UserAccount with an unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_location`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($objInventoryLocation->InventoryLocationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryLocation->ModifiedBy = $this->intUserAccountId;
				$objInventoryLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryLocationAsModifiedBy
		 * @param InventoryLocation $objInventoryLocation
		 * @return void
		*/ 
		public function UnassociateInventoryLocationAsModifiedBy(InventoryLocation $objInventoryLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryLocation->InventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsModifiedBy on this UserAccount with an unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_location`
				SET
					`modified_by` = null
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($objInventoryLocation->InventoryLocationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryLocation->ModifiedBy = null;
				$objInventoryLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryLocationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllInventoryLocationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryLocation::LoadArrayByModifiedBy($this->intUserAccountId) as $objInventoryLocation) {
					$objInventoryLocation->ModifiedBy = null;
					$objInventoryLocation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_location`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated InventoryLocationAsModifiedBy
		 * @param InventoryLocation $objInventoryLocation
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryLocationAsModifiedBy(InventoryLocation $objInventoryLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryLocation->InventoryLocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsModifiedBy on this UserAccount with an unsaved InventoryLocation.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_location`
				WHERE
					`inventory_location_id` = ' . $objDatabase->SqlVariable($objInventoryLocation->InventoryLocationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryLocation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryLocationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllInventoryLocationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryLocationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryLocation::LoadArrayByModifiedBy($this->intUserAccountId) as $objInventoryLocation) {
					$objInventoryLocation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_location`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryModelAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryModelsAsModifiedBy as an array of InventoryModel objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryModel[]
		*/ 
		public function GetInventoryModelAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return InventoryModel::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryModelsAsModifiedBy
		 * @return int
		*/ 
		public function CountInventoryModelsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return InventoryModel::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a InventoryModelAsModifiedBy
		 * @param InventoryModel $objInventoryModel
		 * @return void
		*/ 
		public function AssociateInventoryModelAsModifiedBy(InventoryModel $objInventoryModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryModelAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryModel->InventoryModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryModelAsModifiedBy on this UserAccount with an unsaved InventoryModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_model`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`inventory_model_id` = ' . $objDatabase->SqlVariable($objInventoryModel->InventoryModelId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryModel->ModifiedBy = $this->intUserAccountId;
				$objInventoryModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryModelAsModifiedBy
		 * @param InventoryModel $objInventoryModel
		 * @return void
		*/ 
		public function UnassociateInventoryModelAsModifiedBy(InventoryModel $objInventoryModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryModel->InventoryModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsModifiedBy on this UserAccount with an unsaved InventoryModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_model`
				SET
					`modified_by` = null
				WHERE
					`inventory_model_id` = ' . $objDatabase->SqlVariable($objInventoryModel->InventoryModelId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryModel->ModifiedBy = null;
				$objInventoryModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryModelsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllInventoryModelsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryModel::LoadArrayByModifiedBy($this->intUserAccountId) as $objInventoryModel) {
					$objInventoryModel->ModifiedBy = null;
					$objInventoryModel->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_model`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated InventoryModelAsModifiedBy
		 * @param InventoryModel $objInventoryModel
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryModelAsModifiedBy(InventoryModel $objInventoryModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryModel->InventoryModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsModifiedBy on this UserAccount with an unsaved InventoryModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_model`
				WHERE
					`inventory_model_id` = ' . $objDatabase->SqlVariable($objInventoryModel->InventoryModelId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryModel->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryModelsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllInventoryModelsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryModel::LoadArrayByModifiedBy($this->intUserAccountId) as $objInventoryModel) {
					$objInventoryModel->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_model`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryModelAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryModelsAsCreatedBy as an array of InventoryModel objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryModel[]
		*/ 
		public function GetInventoryModelAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return InventoryModel::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryModelsAsCreatedBy
		 * @return int
		*/ 
		public function CountInventoryModelsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return InventoryModel::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a InventoryModelAsCreatedBy
		 * @param InventoryModel $objInventoryModel
		 * @return void
		*/ 
		public function AssociateInventoryModelAsCreatedBy(InventoryModel $objInventoryModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryModelAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryModel->InventoryModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryModelAsCreatedBy on this UserAccount with an unsaved InventoryModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_model`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`inventory_model_id` = ' . $objDatabase->SqlVariable($objInventoryModel->InventoryModelId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryModel->CreatedBy = $this->intUserAccountId;
				$objInventoryModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryModelAsCreatedBy
		 * @param InventoryModel $objInventoryModel
		 * @return void
		*/ 
		public function UnassociateInventoryModelAsCreatedBy(InventoryModel $objInventoryModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryModel->InventoryModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsCreatedBy on this UserAccount with an unsaved InventoryModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_model`
				SET
					`created_by` = null
				WHERE
					`inventory_model_id` = ' . $objDatabase->SqlVariable($objInventoryModel->InventoryModelId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryModel->CreatedBy = null;
				$objInventoryModel->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryModelsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllInventoryModelsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryModel::LoadArrayByCreatedBy($this->intUserAccountId) as $objInventoryModel) {
					$objInventoryModel->CreatedBy = null;
					$objInventoryModel->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_model`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated InventoryModelAsCreatedBy
		 * @param InventoryModel $objInventoryModel
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryModelAsCreatedBy(InventoryModel $objInventoryModel) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryModel->InventoryModelId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsCreatedBy on this UserAccount with an unsaved InventoryModel.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_model`
				WHERE
					`inventory_model_id` = ' . $objDatabase->SqlVariable($objInventoryModel->InventoryModelId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryModel->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryModelsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllInventoryModelsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryModelAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryModel::LoadArrayByCreatedBy($this->intUserAccountId) as $objInventoryModel) {
					$objInventoryModel->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_model`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryTransactionAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryTransactionsAsModifiedBy as an array of InventoryTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/ 
		public function GetInventoryTransactionAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return InventoryTransaction::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryTransactionsAsModifiedBy
		 * @return int
		*/ 
		public function CountInventoryTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return InventoryTransaction::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a InventoryTransactionAsModifiedBy
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function AssociateInventoryTransactionAsModifiedBy(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransactionAsModifiedBy on this UserAccount with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->ModifiedBy = $this->intUserAccountId;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryTransactionAsModifiedBy
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function UnassociateInventoryTransactionAsModifiedBy(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsModifiedBy on this UserAccount with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`modified_by` = null
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->ModifiedBy = null;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryTransactionsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllInventoryTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByModifiedBy($this->intUserAccountId) as $objInventoryTransaction) {
					$objInventoryTransaction->ModifiedBy = null;
					$objInventoryTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated InventoryTransactionAsModifiedBy
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryTransactionAsModifiedBy(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsModifiedBy on this UserAccount with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryTransactionsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllInventoryTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByModifiedBy($this->intUserAccountId) as $objInventoryTransaction) {
					$objInventoryTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for InventoryTransactionAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated InventoryTransactionsAsCreatedBy as an array of InventoryTransaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return InventoryTransaction[]
		*/ 
		public function GetInventoryTransactionAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return InventoryTransaction::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated InventoryTransactionsAsCreatedBy
		 * @return int
		*/ 
		public function CountInventoryTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return InventoryTransaction::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a InventoryTransactionAsCreatedBy
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function AssociateInventoryTransactionAsCreatedBy(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateInventoryTransactionAsCreatedBy on this UserAccount with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->CreatedBy = $this->intUserAccountId;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a InventoryTransactionAsCreatedBy
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function UnassociateInventoryTransactionAsCreatedBy(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsCreatedBy on this UserAccount with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`created_by` = null
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->CreatedBy = null;
				$objInventoryTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all InventoryTransactionsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllInventoryTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByCreatedBy($this->intUserAccountId) as $objInventoryTransaction) {
					$objInventoryTransaction->CreatedBy = null;
					$objInventoryTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`inventory_transaction`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated InventoryTransactionAsCreatedBy
		 * @param InventoryTransaction $objInventoryTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedInventoryTransactionAsCreatedBy(InventoryTransaction $objInventoryTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objInventoryTransaction->InventoryTransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsCreatedBy on this UserAccount with an unsaved InventoryTransaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`inventory_transaction_id` = ' . $objDatabase->SqlVariable($objInventoryTransaction->InventoryTransactionId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objInventoryTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated InventoryTransactionsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllInventoryTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateInventoryTransactionAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (InventoryTransaction::LoadArrayByCreatedBy($this->intUserAccountId) as $objInventoryTransaction) {
					$objInventoryTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`inventory_transaction`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for LocationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LocationsAsModifiedBy as an array of Location objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Location[]
		*/ 
		public function GetLocationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Location::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LocationsAsModifiedBy
		 * @return int
		*/ 
		public function CountLocationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Location::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a LocationAsModifiedBy
		 * @param Location $objLocation
		 * @return void
		*/ 
		public function AssociateLocationAsModifiedBy(Location $objLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLocationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objLocation->LocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLocationAsModifiedBy on this UserAccount with an unsaved Location.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`location`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`location_id` = ' . $objDatabase->SqlVariable($objLocation->LocationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLocation->ModifiedBy = $this->intUserAccountId;
				$objLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LocationAsModifiedBy
		 * @param Location $objLocation
		 * @return void
		*/ 
		public function UnassociateLocationAsModifiedBy(Location $objLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objLocation->LocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsModifiedBy on this UserAccount with an unsaved Location.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`location`
				SET
					`modified_by` = null
				WHERE
					`location_id` = ' . $objDatabase->SqlVariable($objLocation->LocationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLocation->ModifiedBy = null;
				$objLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LocationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllLocationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Location::LoadArrayByModifiedBy($this->intUserAccountId) as $objLocation) {
					$objLocation->ModifiedBy = null;
					$objLocation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`location`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated LocationAsModifiedBy
		 * @param Location $objLocation
		 * @return void
		*/ 
		public function DeleteAssociatedLocationAsModifiedBy(Location $objLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objLocation->LocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsModifiedBy on this UserAccount with an unsaved Location.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`location`
				WHERE
					`location_id` = ' . $objDatabase->SqlVariable($objLocation->LocationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLocation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LocationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllLocationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Location::LoadArrayByModifiedBy($this->intUserAccountId) as $objLocation) {
					$objLocation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`location`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for LocationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LocationsAsCreatedBy as an array of Location objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Location[]
		*/ 
		public function GetLocationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Location::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LocationsAsCreatedBy
		 * @return int
		*/ 
		public function CountLocationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Location::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a LocationAsCreatedBy
		 * @param Location $objLocation
		 * @return void
		*/ 
		public function AssociateLocationAsCreatedBy(Location $objLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLocationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objLocation->LocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLocationAsCreatedBy on this UserAccount with an unsaved Location.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`location`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`location_id` = ' . $objDatabase->SqlVariable($objLocation->LocationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLocation->CreatedBy = $this->intUserAccountId;
				$objLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LocationAsCreatedBy
		 * @param Location $objLocation
		 * @return void
		*/ 
		public function UnassociateLocationAsCreatedBy(Location $objLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objLocation->LocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsCreatedBy on this UserAccount with an unsaved Location.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`location`
				SET
					`created_by` = null
				WHERE
					`location_id` = ' . $objDatabase->SqlVariable($objLocation->LocationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLocation->CreatedBy = null;
				$objLocation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LocationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllLocationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Location::LoadArrayByCreatedBy($this->intUserAccountId) as $objLocation) {
					$objLocation->CreatedBy = null;
					$objLocation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`location`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated LocationAsCreatedBy
		 * @param Location $objLocation
		 * @return void
		*/ 
		public function DeleteAssociatedLocationAsCreatedBy(Location $objLocation) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objLocation->LocationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsCreatedBy on this UserAccount with an unsaved Location.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`location`
				WHERE
					`location_id` = ' . $objDatabase->SqlVariable($objLocation->LocationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLocation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LocationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllLocationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLocationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Location::LoadArrayByCreatedBy($this->intUserAccountId) as $objLocation) {
					$objLocation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`location`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ManufacturerAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ManufacturersAsModifiedBy as an array of Manufacturer objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Manufacturer[]
		*/ 
		public function GetManufacturerAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Manufacturer::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ManufacturersAsModifiedBy
		 * @return int
		*/ 
		public function CountManufacturersAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Manufacturer::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ManufacturerAsModifiedBy
		 * @param Manufacturer $objManufacturer
		 * @return void
		*/ 
		public function AssociateManufacturerAsModifiedBy(Manufacturer $objManufacturer) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManufacturerAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objManufacturer->ManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManufacturerAsModifiedBy on this UserAccount with an unsaved Manufacturer.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manufacturer`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($objManufacturer->ManufacturerId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objManufacturer->ModifiedBy = $this->intUserAccountId;
				$objManufacturer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ManufacturerAsModifiedBy
		 * @param Manufacturer $objManufacturer
		 * @return void
		*/ 
		public function UnassociateManufacturerAsModifiedBy(Manufacturer $objManufacturer) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objManufacturer->ManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsModifiedBy on this UserAccount with an unsaved Manufacturer.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manufacturer`
				SET
					`modified_by` = null
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($objManufacturer->ManufacturerId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objManufacturer->ModifiedBy = null;
				$objManufacturer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ManufacturersAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllManufacturersAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Manufacturer::LoadArrayByModifiedBy($this->intUserAccountId) as $objManufacturer) {
					$objManufacturer->ModifiedBy = null;
					$objManufacturer->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manufacturer`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ManufacturerAsModifiedBy
		 * @param Manufacturer $objManufacturer
		 * @return void
		*/ 
		public function DeleteAssociatedManufacturerAsModifiedBy(Manufacturer $objManufacturer) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objManufacturer->ManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsModifiedBy on this UserAccount with an unsaved Manufacturer.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manufacturer`
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($objManufacturer->ManufacturerId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objManufacturer->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ManufacturersAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllManufacturersAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Manufacturer::LoadArrayByModifiedBy($this->intUserAccountId) as $objManufacturer) {
					$objManufacturer->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manufacturer`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ManufacturerAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ManufacturersAsCreatedBy as an array of Manufacturer objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Manufacturer[]
		*/ 
		public function GetManufacturerAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Manufacturer::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ManufacturersAsCreatedBy
		 * @return int
		*/ 
		public function CountManufacturersAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Manufacturer::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ManufacturerAsCreatedBy
		 * @param Manufacturer $objManufacturer
		 * @return void
		*/ 
		public function AssociateManufacturerAsCreatedBy(Manufacturer $objManufacturer) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManufacturerAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objManufacturer->ManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManufacturerAsCreatedBy on this UserAccount with an unsaved Manufacturer.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manufacturer`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($objManufacturer->ManufacturerId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objManufacturer->CreatedBy = $this->intUserAccountId;
				$objManufacturer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ManufacturerAsCreatedBy
		 * @param Manufacturer $objManufacturer
		 * @return void
		*/ 
		public function UnassociateManufacturerAsCreatedBy(Manufacturer $objManufacturer) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objManufacturer->ManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsCreatedBy on this UserAccount with an unsaved Manufacturer.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manufacturer`
				SET
					`created_by` = null
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($objManufacturer->ManufacturerId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objManufacturer->CreatedBy = null;
				$objManufacturer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ManufacturersAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllManufacturersAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Manufacturer::LoadArrayByCreatedBy($this->intUserAccountId) as $objManufacturer) {
					$objManufacturer->CreatedBy = null;
					$objManufacturer->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manufacturer`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ManufacturerAsCreatedBy
		 * @param Manufacturer $objManufacturer
		 * @return void
		*/ 
		public function DeleteAssociatedManufacturerAsCreatedBy(Manufacturer $objManufacturer) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objManufacturer->ManufacturerId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsCreatedBy on this UserAccount with an unsaved Manufacturer.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manufacturer`
				WHERE
					`manufacturer_id` = ' . $objDatabase->SqlVariable($objManufacturer->ManufacturerId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objManufacturer->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ManufacturersAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllManufacturersAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManufacturerAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Manufacturer::LoadArrayByCreatedBy($this->intUserAccountId) as $objManufacturer) {
					$objManufacturer->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manufacturer`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for NotificationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotificationsAsModifiedBy as an array of Notification objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Notification[]
		*/ 
		public function GetNotificationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Notification::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotificationsAsModifiedBy
		 * @return int
		*/ 
		public function CountNotificationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Notification::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a NotificationAsModifiedBy
		 * @param Notification $objNotification
		 * @return void
		*/ 
		public function AssociateNotificationAsModifiedBy(Notification $objNotification) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objNotification->NotificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificationAsModifiedBy on this UserAccount with an unsaved Notification.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`notification_id` = ' . $objDatabase->SqlVariable($objNotification->NotificationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objNotification->ModifiedBy = $this->intUserAccountId;
				$objNotification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a NotificationAsModifiedBy
		 * @param Notification $objNotification
		 * @return void
		*/ 
		public function UnassociateNotificationAsModifiedBy(Notification $objNotification) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objNotification->NotificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsModifiedBy on this UserAccount with an unsaved Notification.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification`
				SET
					`modified_by` = null
				WHERE
					`notification_id` = ' . $objDatabase->SqlVariable($objNotification->NotificationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objNotification->ModifiedBy = null;
				$objNotification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all NotificationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllNotificationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Notification::LoadArrayByModifiedBy($this->intUserAccountId) as $objNotification) {
					$objNotification->ModifiedBy = null;
					$objNotification->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated NotificationAsModifiedBy
		 * @param Notification $objNotification
		 * @return void
		*/ 
		public function DeleteAssociatedNotificationAsModifiedBy(Notification $objNotification) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objNotification->NotificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsModifiedBy on this UserAccount with an unsaved Notification.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notification`
				WHERE
					`notification_id` = ' . $objDatabase->SqlVariable($objNotification->NotificationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objNotification->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated NotificationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllNotificationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Notification::LoadArrayByModifiedBy($this->intUserAccountId) as $objNotification) {
					$objNotification->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notification`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for NotificationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotificationsAsCreatedBy as an array of Notification objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Notification[]
		*/ 
		public function GetNotificationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Notification::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotificationsAsCreatedBy
		 * @return int
		*/ 
		public function CountNotificationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Notification::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a NotificationAsCreatedBy
		 * @param Notification $objNotification
		 * @return void
		*/ 
		public function AssociateNotificationAsCreatedBy(Notification $objNotification) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objNotification->NotificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificationAsCreatedBy on this UserAccount with an unsaved Notification.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`notification_id` = ' . $objDatabase->SqlVariable($objNotification->NotificationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objNotification->CreatedBy = $this->intUserAccountId;
				$objNotification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a NotificationAsCreatedBy
		 * @param Notification $objNotification
		 * @return void
		*/ 
		public function UnassociateNotificationAsCreatedBy(Notification $objNotification) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objNotification->NotificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsCreatedBy on this UserAccount with an unsaved Notification.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification`
				SET
					`created_by` = null
				WHERE
					`notification_id` = ' . $objDatabase->SqlVariable($objNotification->NotificationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objNotification->CreatedBy = null;
				$objNotification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all NotificationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllNotificationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Notification::LoadArrayByCreatedBy($this->intUserAccountId) as $objNotification) {
					$objNotification->CreatedBy = null;
					$objNotification->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated NotificationAsCreatedBy
		 * @param Notification $objNotification
		 * @return void
		*/ 
		public function DeleteAssociatedNotificationAsCreatedBy(Notification $objNotification) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objNotification->NotificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsCreatedBy on this UserAccount with an unsaved Notification.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notification`
				WHERE
					`notification_id` = ' . $objDatabase->SqlVariable($objNotification->NotificationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objNotification->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated NotificationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllNotificationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Notification::LoadArrayByCreatedBy($this->intUserAccountId) as $objNotification) {
					$objNotification->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notification`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for NotificationUserAccount
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotificationUserAccounts as an array of NotificationUserAccount objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotificationUserAccount[]
		*/ 
		public function GetNotificationUserAccountArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return NotificationUserAccount::LoadArrayByUserAccountId($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotificationUserAccounts
		 * @return int
		*/ 
		public function CountNotificationUserAccounts() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return NotificationUserAccount::CountByUserAccountId($this->intUserAccountId);
		}

		/**
		 * Associates a NotificationUserAccount
		 * @param NotificationUserAccount $objNotificationUserAccount
		 * @return void
		*/ 
		public function AssociateNotificationUserAccount(NotificationUserAccount $objNotificationUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificationUserAccount on this unsaved UserAccount.');
			if ((is_null($objNotificationUserAccount->NotificationUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificationUserAccount on this UserAccount with an unsaved NotificationUserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification_user_account`
				SET
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`notification_user_account_id` = ' . $objDatabase->SqlVariable($objNotificationUserAccount->NotificationUserAccountId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objNotificationUserAccount->UserAccountId = $this->intUserAccountId;
				$objNotificationUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a NotificationUserAccount
		 * @param NotificationUserAccount $objNotificationUserAccount
		 * @return void
		*/ 
		public function UnassociateNotificationUserAccount(NotificationUserAccount $objNotificationUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationUserAccount on this unsaved UserAccount.');
			if ((is_null($objNotificationUserAccount->NotificationUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationUserAccount on this UserAccount with an unsaved NotificationUserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification_user_account`
				SET
					`user_account_id` = null
				WHERE
					`notification_user_account_id` = ' . $objDatabase->SqlVariable($objNotificationUserAccount->NotificationUserAccountId) . ' AND
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objNotificationUserAccount->UserAccountId = null;
				$objNotificationUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all NotificationUserAccounts
		 * @return void
		*/ 
		public function UnassociateAllNotificationUserAccounts() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationUserAccount on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (NotificationUserAccount::LoadArrayByUserAccountId($this->intUserAccountId) as $objNotificationUserAccount) {
					$objNotificationUserAccount->UserAccountId = null;
					$objNotificationUserAccount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notification_user_account`
				SET
					`user_account_id` = null
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated NotificationUserAccount
		 * @param NotificationUserAccount $objNotificationUserAccount
		 * @return void
		*/ 
		public function DeleteAssociatedNotificationUserAccount(NotificationUserAccount $objNotificationUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationUserAccount on this unsaved UserAccount.');
			if ((is_null($objNotificationUserAccount->NotificationUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationUserAccount on this UserAccount with an unsaved NotificationUserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notification_user_account`
				WHERE
					`notification_user_account_id` = ' . $objDatabase->SqlVariable($objNotificationUserAccount->NotificationUserAccountId) . ' AND
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objNotificationUserAccount->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated NotificationUserAccounts
		 * @return void
		*/ 
		public function DeleteAllNotificationUserAccounts() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificationUserAccount on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (NotificationUserAccount::LoadArrayByUserAccountId($this->intUserAccountId) as $objNotificationUserAccount) {
					$objNotificationUserAccount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notification_user_account`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ReceiptAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ReceiptsAsCreatedBy as an array of Receipt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Receipt[]
		*/ 
		public function GetReceiptAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Receipt::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ReceiptsAsCreatedBy
		 * @return int
		*/ 
		public function CountReceiptsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Receipt::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ReceiptAsCreatedBy
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function AssociateReceiptAsCreatedBy(Receipt $objReceipt) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsCreatedBy on this UserAccount with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->CreatedBy = $this->intUserAccountId;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ReceiptAsCreatedBy
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function UnassociateReceiptAsCreatedBy(Receipt $objReceipt) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsCreatedBy on this UserAccount with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`created_by` = null
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->CreatedBy = null;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ReceiptsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllReceiptsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByCreatedBy($this->intUserAccountId) as $objReceipt) {
					$objReceipt->CreatedBy = null;
					$objReceipt->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ReceiptAsCreatedBy
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function DeleteAssociatedReceiptAsCreatedBy(Receipt $objReceipt) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsCreatedBy on this UserAccount with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ReceiptsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllReceiptsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByCreatedBy($this->intUserAccountId) as $objReceipt) {
					$objReceipt->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ReceiptAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ReceiptsAsModifiedBy as an array of Receipt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Receipt[]
		*/ 
		public function GetReceiptAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Receipt::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ReceiptsAsModifiedBy
		 * @return int
		*/ 
		public function CountReceiptsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Receipt::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ReceiptAsModifiedBy
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function AssociateReceiptAsModifiedBy(Receipt $objReceipt) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReceiptAsModifiedBy on this UserAccount with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->ModifiedBy = $this->intUserAccountId;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ReceiptAsModifiedBy
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function UnassociateReceiptAsModifiedBy(Receipt $objReceipt) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsModifiedBy on this UserAccount with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`modified_by` = null
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->ModifiedBy = null;
				$objReceipt->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ReceiptsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllReceiptsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByModifiedBy($this->intUserAccountId) as $objReceipt) {
					$objReceipt->ModifiedBy = null;
					$objReceipt->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`receipt`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ReceiptAsModifiedBy
		 * @param Receipt $objReceipt
		 * @return void
		*/ 
		public function DeleteAssociatedReceiptAsModifiedBy(Receipt $objReceipt) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objReceipt->ReceiptId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsModifiedBy on this UserAccount with an unsaved Receipt.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`receipt_id` = ' . $objDatabase->SqlVariable($objReceipt->ReceiptId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objReceipt->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ReceiptsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllReceiptsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReceiptAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Receipt::LoadArrayByModifiedBy($this->intUserAccountId) as $objReceipt) {
					$objReceipt->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`receipt`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RolesAsModifiedBy as an array of Role objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Role[]
		*/ 
		public function GetRoleAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Role::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RolesAsModifiedBy
		 * @return int
		*/ 
		public function CountRolesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Role::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleAsModifiedBy
		 * @param Role $objRole
		 * @return void
		*/ 
		public function AssociateRoleAsModifiedBy(Role $objRole) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRole->RoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleAsModifiedBy on this UserAccount with an unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($objRole->RoleId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRole->ModifiedBy = $this->intUserAccountId;
				$objRole->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleAsModifiedBy
		 * @param Role $objRole
		 * @return void
		*/ 
		public function UnassociateRoleAsModifiedBy(Role $objRole) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRole->RoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsModifiedBy on this UserAccount with an unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role`
				SET
					`modified_by` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($objRole->RoleId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRole->ModifiedBy = null;
				$objRole->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RolesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllRolesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Role::LoadArrayByModifiedBy($this->intUserAccountId) as $objRole) {
					$objRole->ModifiedBy = null;
					$objRole->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleAsModifiedBy
		 * @param Role $objRole
		 * @return void
		*/ 
		public function DeleteAssociatedRoleAsModifiedBy(Role $objRole) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRole->RoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsModifiedBy on this UserAccount with an unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($objRole->RoleId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRole->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RolesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllRolesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Role::LoadArrayByModifiedBy($this->intUserAccountId) as $objRole) {
					$objRole->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RolesAsCreatedBy as an array of Role objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Role[]
		*/ 
		public function GetRoleAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Role::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RolesAsCreatedBy
		 * @return int
		*/ 
		public function CountRolesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Role::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleAsCreatedBy
		 * @param Role $objRole
		 * @return void
		*/ 
		public function AssociateRoleAsCreatedBy(Role $objRole) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRole->RoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleAsCreatedBy on this UserAccount with an unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($objRole->RoleId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRole->CreatedBy = $this->intUserAccountId;
				$objRole->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleAsCreatedBy
		 * @param Role $objRole
		 * @return void
		*/ 
		public function UnassociateRoleAsCreatedBy(Role $objRole) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRole->RoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsCreatedBy on this UserAccount with an unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role`
				SET
					`created_by` = null
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($objRole->RoleId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRole->CreatedBy = null;
				$objRole->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RolesAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllRolesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Role::LoadArrayByCreatedBy($this->intUserAccountId) as $objRole) {
					$objRole->CreatedBy = null;
					$objRole->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleAsCreatedBy
		 * @param Role $objRole
		 * @return void
		*/ 
		public function DeleteAssociatedRoleAsCreatedBy(Role $objRole) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRole->RoleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsCreatedBy on this UserAccount with an unsaved Role.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role`
				WHERE
					`role_id` = ' . $objDatabase->SqlVariable($objRole->RoleId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRole->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RolesAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllRolesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Role::LoadArrayByCreatedBy($this->intUserAccountId) as $objRole) {
					$objRole->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleEntityQtypeBuiltInAuthorizationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeBuiltInAuthorizationsAsModifiedBy as an array of RoleEntityQtypeBuiltInAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeBuiltInAuthorization[]
		*/ 
		public function GetRoleEntityQtypeBuiltInAuthorizationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleEntityQtypeBuiltInAuthorization::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleEntityQtypeBuiltInAuthorizationsAsModifiedBy
		 * @return int
		*/ 
		public function CountRoleEntityQtypeBuiltInAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleEntityQtypeBuiltInAuthorization::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleEntityQtypeBuiltInAuthorizationAsModifiedBy
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->ModifiedBy = $this->intUserAccountId;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeBuiltInAuthorizationAsModifiedBy
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`modified_by` = null
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->ModifiedBy = null;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeBuiltInAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeBuiltInAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->ModifiedBy = null;
					$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeBuiltInAuthorizationAsModifiedBy
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeBuiltInAuthorizationAsModifiedBy(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleEntityQtypeBuiltInAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllRoleEntityQtypeBuiltInAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleEntityQtypeBuiltInAuthorizationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeBuiltInAuthorizationsAsCreatedBy as an array of RoleEntityQtypeBuiltInAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeBuiltInAuthorization[]
		*/ 
		public function GetRoleEntityQtypeBuiltInAuthorizationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleEntityQtypeBuiltInAuthorization::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleEntityQtypeBuiltInAuthorizationsAsCreatedBy
		 * @return int
		*/ 
		public function CountRoleEntityQtypeBuiltInAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleEntityQtypeBuiltInAuthorization::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleEntityQtypeBuiltInAuthorizationAsCreatedBy
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->CreatedBy = $this->intUserAccountId;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeBuiltInAuthorizationAsCreatedBy
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`created_by` = null
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->CreatedBy = null;
				$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeBuiltInAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeBuiltInAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->CreatedBy = null;
					$objRoleEntityQtypeBuiltInAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_built_in_authorization`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeBuiltInAuthorizationAsCreatedBy
		 * @param RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeBuiltInAuthorizationAsCreatedBy(RoleEntityQtypeBuiltInAuthorization $objRoleEntityQtypeBuiltInAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleEntityQtypeBuiltInAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`role_entity_built_in_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeBuiltInAuthorization->RoleEntityBuiltInId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleEntityQtypeBuiltInAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllRoleEntityQtypeBuiltInAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeBuiltInAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeBuiltInAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleEntityQtypeBuiltInAuthorization) {
					$objRoleEntityQtypeBuiltInAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_built_in_authorization`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy as an array of RoleEntityQtypeCustomFieldAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeCustomFieldAuthorization[]
		*/ 
		public function GetRoleEntityQtypeCustomFieldAuthorizationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleEntityQtypeCustomFieldAuthorization::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy
		 * @return int
		*/ 
		public function CountRoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleEntityQtypeCustomFieldAuthorization::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->ModifiedBy = $this->intUserAccountId;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`modified_by` = null
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->ModifiedBy = null;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->ModifiedBy = null;
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllRoleEntityQtypeCustomFieldAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy as an array of RoleEntityQtypeCustomFieldAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleEntityQtypeCustomFieldAuthorization[]
		*/ 
		public function GetRoleEntityQtypeCustomFieldAuthorizationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleEntityQtypeCustomFieldAuthorization::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy
		 * @return int
		*/ 
		public function CountRoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleEntityQtypeCustomFieldAuthorization::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function AssociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->CreatedBy = $this->intUserAccountId;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`created_by` = null
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->CreatedBy = null;
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->CreatedBy = null;
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_entity_qtype_custom_field_authorization`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy
		 * @param RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy(RoleEntityQtypeCustomFieldAuthorization $objRoleEntityQtypeCustomFieldAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleEntityQtypeCustomFieldAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`role_entity_qtype_custom_field_authorization_id` = ' . $objDatabase->SqlVariable($objRoleEntityQtypeCustomFieldAuthorization->RoleEntityQtypeCustomFieldAuthorizationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllRoleEntityQtypeCustomFieldAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleEntityQtypeCustomFieldAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleEntityQtypeCustomFieldAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleEntityQtypeCustomFieldAuthorization) {
					$objRoleEntityQtypeCustomFieldAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_entity_qtype_custom_field_authorization`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleModuleAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModulesAsModifiedBy as an array of RoleModule objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModule[]
		*/ 
		public function GetRoleModuleAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleModule::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleModulesAsModifiedBy
		 * @return int
		*/ 
		public function CountRoleModulesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleModule::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleModuleAsModifiedBy
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function AssociateRoleModuleAsModifiedBy(RoleModule $objRoleModule) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAsModifiedBy on this UserAccount with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->ModifiedBy = $this->intUserAccountId;
				$objRoleModule->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModuleAsModifiedBy
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function UnassociateRoleModuleAsModifiedBy(RoleModule $objRoleModule) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsModifiedBy on this UserAccount with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`modified_by` = null
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->ModifiedBy = null;
				$objRoleModule->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModulesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleModulesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModule::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleModule) {
					$objRoleModule->ModifiedBy = null;
					$objRoleModule->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleModuleAsModifiedBy
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModuleAsModifiedBy(RoleModule $objRoleModule) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsModifiedBy on this UserAccount with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module`
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleModulesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllRoleModulesAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModule::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleModule) {
					$objRoleModule->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleModuleAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModulesAsCreatedBy as an array of RoleModule objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModule[]
		*/ 
		public function GetRoleModuleAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleModule::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleModulesAsCreatedBy
		 * @return int
		*/ 
		public function CountRoleModulesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleModule::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleModuleAsCreatedBy
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function AssociateRoleModuleAsCreatedBy(RoleModule $objRoleModule) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAsCreatedBy on this UserAccount with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->CreatedBy = $this->intUserAccountId;
				$objRoleModule->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModuleAsCreatedBy
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function UnassociateRoleModuleAsCreatedBy(RoleModule $objRoleModule) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsCreatedBy on this UserAccount with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`created_by` = null
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->CreatedBy = null;
				$objRoleModule->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModulesAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleModulesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModule::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleModule) {
					$objRoleModule->CreatedBy = null;
					$objRoleModule->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleModuleAsCreatedBy
		 * @param RoleModule $objRoleModule
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModuleAsCreatedBy(RoleModule $objRoleModule) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModule->RoleModuleId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsCreatedBy on this UserAccount with an unsaved RoleModule.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module`
				WHERE
					`role_module_id` = ' . $objDatabase->SqlVariable($objRoleModule->RoleModuleId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModule->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleModulesAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllRoleModulesAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModule::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleModule) {
					$objRoleModule->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleModuleAuthorizationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModuleAuthorizationsAsModifiedBy as an array of RoleModuleAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/ 
		public function GetRoleModuleAuthorizationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleModuleAuthorization::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleModuleAuthorizationsAsModifiedBy
		 * @return int
		*/ 
		public function CountRoleModuleAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleModuleAuthorization::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleModuleAuthorizationAsModifiedBy
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function AssociateRoleModuleAuthorizationAsModifiedBy(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->ModifiedBy = $this->intUserAccountId;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModuleAuthorizationAsModifiedBy
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleModuleAuthorizationAsModifiedBy(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`modified_by` = null
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->ModifiedBy = null;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModuleAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleModuleAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->ModifiedBy = null;
					$objRoleModuleAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleModuleAuthorizationAsModifiedBy
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModuleAuthorizationAsModifiedBy(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleModuleAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllRoleModuleAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleModuleAuthorizationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleModuleAuthorizationsAsCreatedBy as an array of RoleModuleAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleModuleAuthorization[]
		*/ 
		public function GetRoleModuleAuthorizationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleModuleAuthorization::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleModuleAuthorizationsAsCreatedBy
		 * @return int
		*/ 
		public function CountRoleModuleAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleModuleAuthorization::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleModuleAuthorizationAsCreatedBy
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function AssociateRoleModuleAuthorizationAsCreatedBy(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleModuleAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->CreatedBy = $this->intUserAccountId;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleModuleAuthorizationAsCreatedBy
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleModuleAuthorizationAsCreatedBy(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`created_by` = null
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->CreatedBy = null;
				$objRoleModuleAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleModuleAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleModuleAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->CreatedBy = null;
					$objRoleModuleAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_module_authorization`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleModuleAuthorizationAsCreatedBy
		 * @param RoleModuleAuthorization $objRoleModuleAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleModuleAuthorizationAsCreatedBy(RoleModuleAuthorization $objRoleModuleAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleModuleAuthorization->RoleModuleAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleModuleAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`role_module_authorization_id` = ' . $objDatabase->SqlVariable($objRoleModuleAuthorization->RoleModuleAuthorizationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleModuleAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleModuleAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllRoleModuleAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleModuleAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleModuleAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleModuleAuthorization) {
					$objRoleModuleAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_module_authorization`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleTransactionTypeAuthorizationAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleTransactionTypeAuthorizationsAsCreatedBy as an array of RoleTransactionTypeAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/ 
		public function GetRoleTransactionTypeAuthorizationAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleTransactionTypeAuthorization::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleTransactionTypeAuthorizationsAsCreatedBy
		 * @return int
		*/ 
		public function CountRoleTransactionTypeAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleTransactionTypeAuthorization::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleTransactionTypeAuthorizationAsCreatedBy
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function AssociateRoleTransactionTypeAuthorizationAsCreatedBy(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->CreatedBy = $this->intUserAccountId;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleTransactionTypeAuthorizationAsCreatedBy
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleTransactionTypeAuthorizationAsCreatedBy(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`created_by` = null
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->CreatedBy = null;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleTransactionTypeAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleTransactionTypeAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->CreatedBy = null;
					$objRoleTransactionTypeAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleTransactionTypeAuthorizationAsCreatedBy
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleTransactionTypeAuthorizationAsCreatedBy(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsCreatedBy on this UserAccount with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleTransactionTypeAuthorizationsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllRoleTransactionTypeAuthorizationsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByCreatedBy($this->intUserAccountId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for RoleTransactionTypeAuthorizationAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RoleTransactionTypeAuthorizationsAsModifiedBy as an array of RoleTransactionTypeAuthorization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RoleTransactionTypeAuthorization[]
		*/ 
		public function GetRoleTransactionTypeAuthorizationAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return RoleTransactionTypeAuthorization::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RoleTransactionTypeAuthorizationsAsModifiedBy
		 * @return int
		*/ 
		public function CountRoleTransactionTypeAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return RoleTransactionTypeAuthorization::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a RoleTransactionTypeAuthorizationAsModifiedBy
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function AssociateRoleTransactionTypeAuthorizationAsModifiedBy(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRoleTransactionTypeAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->ModifiedBy = $this->intUserAccountId;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RoleTransactionTypeAuthorizationAsModifiedBy
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function UnassociateRoleTransactionTypeAuthorizationAsModifiedBy(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`modified_by` = null
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->ModifiedBy = null;
				$objRoleTransactionTypeAuthorization->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RoleTransactionTypeAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllRoleTransactionTypeAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->ModifiedBy = null;
					$objRoleTransactionTypeAuthorization->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`role_transaction_type_authorization`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated RoleTransactionTypeAuthorizationAsModifiedBy
		 * @param RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization
		 * @return void
		*/ 
		public function DeleteAssociatedRoleTransactionTypeAuthorizationAsModifiedBy(RoleTransactionTypeAuthorization $objRoleTransactionTypeAuthorization) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsModifiedBy on this UserAccount with an unsaved RoleTransactionTypeAuthorization.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`role_transaction_type_authorization_id` = ' . $objDatabase->SqlVariable($objRoleTransactionTypeAuthorization->RoleTransactionTypeAuthorizationId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRoleTransactionTypeAuthorization->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RoleTransactionTypeAuthorizationsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllRoleTransactionTypeAuthorizationsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRoleTransactionTypeAuthorizationAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RoleTransactionTypeAuthorization::LoadArrayByModifiedBy($this->intUserAccountId) as $objRoleTransactionTypeAuthorization) {
					$objRoleTransactionTypeAuthorization->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`role_transaction_type_authorization`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ShipmentAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ShipmentsAsCreatedBy as an array of Shipment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/ 
		public function GetShipmentAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Shipment::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ShipmentsAsCreatedBy
		 * @return int
		*/ 
		public function CountShipmentsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Shipment::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ShipmentAsCreatedBy
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function AssociateShipmentAsCreatedBy(Shipment $objShipment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsCreatedBy on this UserAccount with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShipment->CreatedBy = $this->intUserAccountId;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ShipmentAsCreatedBy
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function UnassociateShipmentAsCreatedBy(Shipment $objShipment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsCreatedBy on this UserAccount with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`created_by` = null
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->CreatedBy = null;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ShipmentsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllShipmentsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByCreatedBy($this->intUserAccountId) as $objShipment) {
					$objShipment->CreatedBy = null;
					$objShipment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ShipmentAsCreatedBy
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function DeleteAssociatedShipmentAsCreatedBy(Shipment $objShipment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsCreatedBy on this UserAccount with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ShipmentsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllShipmentsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByCreatedBy($this->intUserAccountId) as $objShipment) {
					$objShipment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for ShipmentAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ShipmentsAsModifiedBy as an array of Shipment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Shipment[]
		*/ 
		public function GetShipmentAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Shipment::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ShipmentsAsModifiedBy
		 * @return int
		*/ 
		public function CountShipmentsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Shipment::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a ShipmentAsModifiedBy
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function AssociateShipmentAsModifiedBy(Shipment $objShipment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateShipmentAsModifiedBy on this UserAccount with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objShipment->ModifiedBy = $this->intUserAccountId;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ShipmentAsModifiedBy
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function UnassociateShipmentAsModifiedBy(Shipment $objShipment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsModifiedBy on this UserAccount with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`modified_by` = null
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->ModifiedBy = null;
				$objShipment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ShipmentsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllShipmentsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByModifiedBy($this->intUserAccountId) as $objShipment) {
					$objShipment->ModifiedBy = null;
					$objShipment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`shipment`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated ShipmentAsModifiedBy
		 * @param Shipment $objShipment
		 * @return void
		*/ 
		public function DeleteAssociatedShipmentAsModifiedBy(Shipment $objShipment) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objShipment->ShipmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsModifiedBy on this UserAccount with an unsaved Shipment.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`shipment_id` = ' . $objDatabase->SqlVariable($objShipment->ShipmentId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objShipment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ShipmentsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllShipmentsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateShipmentAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Shipment::LoadArrayByModifiedBy($this->intUserAccountId) as $objShipment) {
					$objShipment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`shipment`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for TransactionAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TransactionsAsCreatedBy as an array of Transaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/ 
		public function GetTransactionAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Transaction::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TransactionsAsCreatedBy
		 * @return int
		*/ 
		public function CountTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Transaction::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a TransactionAsCreatedBy
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function AssociateTransactionAsCreatedBy(Transaction $objTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransactionAsCreatedBy on this UserAccount with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->CreatedBy = $this->intUserAccountId;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TransactionAsCreatedBy
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function UnassociateTransactionAsCreatedBy(Transaction $objTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsCreatedBy on this UserAccount with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`created_by` = null
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->CreatedBy = null;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TransactionsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByCreatedBy($this->intUserAccountId) as $objTransaction) {
					$objTransaction->CreatedBy = null;
					$objTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated TransactionAsCreatedBy
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedTransactionAsCreatedBy(Transaction $objTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsCreatedBy on this UserAccount with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TransactionsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllTransactionsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByCreatedBy($this->intUserAccountId) as $objTransaction) {
					$objTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for TransactionAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TransactionsAsModifiedBy as an array of Transaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/ 
		public function GetTransactionAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return Transaction::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TransactionsAsModifiedBy
		 * @return int
		*/ 
		public function CountTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return Transaction::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a TransactionAsModifiedBy
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function AssociateTransactionAsModifiedBy(Transaction $objTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransactionAsModifiedBy on this UserAccount with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->ModifiedBy = $this->intUserAccountId;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TransactionAsModifiedBy
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function UnassociateTransactionAsModifiedBy(Transaction $objTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsModifiedBy on this UserAccount with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`modified_by` = null
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->ModifiedBy = null;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TransactionsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByModifiedBy($this->intUserAccountId) as $objTransaction) {
					$objTransaction->ModifiedBy = null;
					$objTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated TransactionAsModifiedBy
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedTransactionAsModifiedBy(Transaction $objTransaction) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objTransaction->TransactionId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsModifiedBy on this UserAccount with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`transaction_id` = ' . $objDatabase->SqlVariable($objTransaction->TransactionId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TransactionsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllTransactionsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransactionAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByModifiedBy($this->intUserAccountId) as $objTransaction) {
					$objTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for UserAccountAsCreatedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UserAccountsAsCreatedBy as an array of UserAccount objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		*/ 
		public function GetUserAccountAsCreatedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return UserAccount::LoadArrayByCreatedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UserAccountsAsCreatedBy
		 * @return int
		*/ 
		public function CountUserAccountsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return UserAccount::CountByCreatedBy($this->intUserAccountId);
		}

		/**
		 * Associates a UserAccountAsCreatedBy
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function AssociateUserAccountAsCreatedBy(UserAccount $objUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAccountAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAccountAsCreatedBy on this UserAccount with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->CreatedBy = $this->intUserAccountId;
				$objUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a UserAccountAsCreatedBy
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function UnassociateUserAccountAsCreatedBy(UserAccount $objUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsCreatedBy on this UserAccount with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`created_by` = null
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->CreatedBy = null;
				$objUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all UserAccountsAsCreatedBy
		 * @return void
		*/ 
		public function UnassociateAllUserAccountsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UserAccount::LoadArrayByCreatedBy($this->intUserAccountId) as $objUserAccount) {
					$objUserAccount->CreatedBy = null;
					$objUserAccount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`created_by` = null
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated UserAccountAsCreatedBy
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function DeleteAssociatedUserAccountAsCreatedBy(UserAccount $objUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsCreatedBy on this unsaved UserAccount.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsCreatedBy on this UserAccount with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . ' AND
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated UserAccountsAsCreatedBy
		 * @return void
		*/ 
		public function DeleteAllUserAccountsAsCreatedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsCreatedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UserAccount::LoadArrayByCreatedBy($this->intUserAccountId) as $objUserAccount) {
					$objUserAccount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`created_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

			
		
		// Related Objects' Methods for UserAccountAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UserAccountsAsModifiedBy as an array of UserAccount objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UserAccount[]
		*/ 
		public function GetUserAccountAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intUserAccountId)))
				return array();

			try {
				return UserAccount::LoadArrayByModifiedBy($this->intUserAccountId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UserAccountsAsModifiedBy
		 * @return int
		*/ 
		public function CountUserAccountsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				return 0;

			return UserAccount::CountByModifiedBy($this->intUserAccountId);
		}

		/**
		 * Associates a UserAccountAsModifiedBy
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function AssociateUserAccountAsModifiedBy(UserAccount $objUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAccountAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAccountAsModifiedBy on this UserAccount with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->ModifiedBy = $this->intUserAccountId;
				$objUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a UserAccountAsModifiedBy
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function UnassociateUserAccountAsModifiedBy(UserAccount $objUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsModifiedBy on this UserAccount with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`modified_by` = null
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->ModifiedBy = null;
				$objUserAccount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all UserAccountsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllUserAccountsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UserAccount::LoadArrayByModifiedBy($this->intUserAccountId) as $objUserAccount) {
					$objUserAccount->ModifiedBy = null;
					$objUserAccount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user_account`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}

		/**
		 * Deletes an associated UserAccountAsModifiedBy
		 * @param UserAccount $objUserAccount
		 * @return void
		*/ 
		public function DeleteAssociatedUserAccountAsModifiedBy(UserAccount $objUserAccount) {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsModifiedBy on this unsaved UserAccount.');
			if ((is_null($objUserAccount->UserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsModifiedBy on this UserAccount with an unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`user_account_id` = ' . $objDatabase->SqlVariable($objUserAccount->UserAccountId) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUserAccount->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated UserAccountsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllUserAccountsAsModifiedBy() {
			if ((is_null($this->intUserAccountId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAccountAsModifiedBy on this unsaved UserAccount.');

			// Get the Database Object for this Class
			$objDatabase = UserAccount::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UserAccount::LoadArrayByModifiedBy($this->intUserAccountId) as $objUserAccount) {
					$objUserAccount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_account`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intUserAccountId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="UserAccount"><sequence>';
			$strToReturn .= '<element name="UserAccountId" type="xsd:int"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Username" type="xsd:string"/>';
			$strToReturn .= '<element name="PasswordHash" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="AdminFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PortableAccessFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PortableUserPin" type="xsd:int"/>';
			$strToReturn .= '<element name="Role" type="xsd1:Role"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="ModifiedDate" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('UserAccount', $strComplexTypeArray)) {
				$strComplexTypeArray['UserAccount'] = UserAccount::GetSoapComplexTypeXml();
				Role::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, UserAccount::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new UserAccount();
			if (property_exists($objSoapObject, 'UserAccountId'))
				$objToReturn->intUserAccountId = $objSoapObject->UserAccountId;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Username'))
				$objToReturn->strUsername = $objSoapObject->Username;
			if (property_exists($objSoapObject, 'PasswordHash'))
				$objToReturn->strPasswordHash = $objSoapObject->PasswordHash;
			if (property_exists($objSoapObject, 'EmailAddress'))
				$objToReturn->strEmailAddress = $objSoapObject->EmailAddress;
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, 'AdminFlag'))
				$objToReturn->blnAdminFlag = $objSoapObject->AdminFlag;
			if (property_exists($objSoapObject, 'PortableAccessFlag'))
				$objToReturn->blnPortableAccessFlag = $objSoapObject->PortableAccessFlag;
			if (property_exists($objSoapObject, 'PortableUserPin'))
				$objToReturn->intPortableUserPin = $objSoapObject->PortableUserPin;
			if ((property_exists($objSoapObject, 'Role')) &&
				($objSoapObject->Role))
				$objToReturn->Role = Role::GetObjectFromSoapObject($objSoapObject->Role);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'CreationDate'))
				$objToReturn->dttCreationDate = new QDateTime($objSoapObject->CreationDate);
			if ((property_exists($objSoapObject, 'ModifiedByObject')) &&
				($objSoapObject->ModifiedByObject))
				$objToReturn->ModifiedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->ModifiedByObject);
			if (property_exists($objSoapObject, 'ModifiedDate'))
				$objToReturn->strModifiedDate = $objSoapObject->ModifiedDate;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, UserAccount::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRole)
				$objObject->objRole = Role::GetSoapObjectFromObject($objObject->objRole, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRoleId = null;
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = UserAccount::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->dttCreationDate)
				$objObject->dttCreationDate = $objObject->dttCreationDate->__toString(QDateTime::FormatSoap);
			if ($objObject->objModifiedByObject)
				$objObject->objModifiedByObject = UserAccount::GetSoapObjectFromObject($objObject->objModifiedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intModifiedBy = null;
			return $objObject;
		}




		////////////////////////////////////////////////////////
		// METHODS for MANUAL QUERY SUPPORT (aka Beta 2 Queries)
		////////////////////////////////////////////////////////

		/**
		 * Internally called method to assist with SQL Query options/preferences for single row loaders.
		 * Any Load (single row) method can use this method to get the Database object.
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function QueryHelper(&$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];
		}



		/**
		 * Internally called method to assist with SQL Query options/preferences for array loaders.
		 * Any LoadAll or LoadArray method can use this method to setup SQL Query Clauses that deal
		 * with OrderBy, Limit, and Object Expansion.  Strings that contain SQL Query Clauses are
		 * passed in by reference.
		 * @param string $strOrderBy reference to the Order By as passed in to the LoadArray method
		 * @param string $strLimit the Limit as passed in to the LoadArray method
		 * @param string $strLimitPrefix reference to the Limit Prefix to be used in the SQL
		 * @param string $strLimitSuffix reference to the Limit Suffix to be used in the SQL
		 * @param string $strExpandSelect reference to the Expand Select to be used in the SQL
		 * @param string $strExpandFrom reference to the Expand From to be used in the SQL
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function ArrayQueryHelper(&$strOrderBy, $strLimit, &$strLimitPrefix, &$strLimitSuffix, &$strExpandSelect, &$strExpandFrom, $objExpansionMap, &$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];

			// Setup OrderBy and Limit Information (if applicable)
			$strOrderBy = $objDatabase->SqlSortByVariable($strOrderBy);
			$strLimitPrefix = $objDatabase->SqlLimitVariablePrefix($strLimit);
			$strLimitSuffix = $objDatabase->SqlLimitVariableSuffix($strLimit);

			// Setup QueryExpansion (if applicable)
			if ($objExpansionMap) {
				$objQueryExpansion = new QQueryExpansion('UserAccount', 'user_account', $objExpansionMap);
				$strExpandSelect = $objQueryExpansion->GetSelectSql();
				$strExpandFrom = $objQueryExpansion->GetFromSql();
			} else {
				$strExpandSelect = null;
				$strExpandFrom = null;
			}
		}



		/**
		 * Internally called method to assist with early binding of objects
		 * on load methods.  Can only early-bind references that this class owns in the database.
		 * @param string $strParentAlias the alias of the parent (if any)
		 * @param string $strAlias the alias of this object
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param QueryExpansion an already instantiated QueryExpansion object (used as a utility object to assist with object expansion)
		 */
		public static function ExpandQuery($strParentAlias, $strAlias, $objExpansionMap, QQueryExpansion $objQueryExpansion) {
			if ($strAlias) {
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `user_account` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`user_account_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`user_account_id` AS `%s__%s__user_account_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`first_name` AS `%s__%s__first_name`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`last_name` AS `%s__%s__last_name`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`username` AS `%s__%s__username`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`password_hash` AS `%s__%s__password_hash`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`email_address` AS `%s__%s__email_address`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`active_flag` AS `%s__%s__active_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`admin_flag` AS `%s__%s__admin_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`portable_access_flag` AS `%s__%s__portable_access_flag`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`portable_user_pin` AS `%s__%s__portable_user_pin`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`role_id` AS `%s__%s__role_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_by` AS `%s__%s__modified_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`modified_date` AS `%s__%s__modified_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'role_id':
							try {
								Role::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'created_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'modified_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						default:
							throw new QCallerException(sprintf('Unknown Object to Expand in %s: %s', $strParentAlias, $strKey));
					}
				}
		}




		////////////////////////////////////////
		// COLUMN CONSTANTS for OBJECT EXPANSION
		////////////////////////////////////////
		const ExpandRole = 'role_id';
		const ExpandCreatedByObject = 'created_by';
		const ExpandModifiedByObject = 'modified_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $UserAccountId
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Username
	 * @property-read QQNode $PasswordHash
	 * @property-read QQNode $EmailAddress
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $AdminFlag
	 * @property-read QQNode $PortableAccessFlag
	 * @property-read QQNode $PortableUserPin
	 * @property-read QQNode $RoleId
	 * @property-read QQNodeRole $Role
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAddress $AddressAsCreatedBy
	 * @property-read QQReverseReferenceNodeAddress $AddressAsModifiedBy
	 * @property-read QQReverseReferenceNodeAsset $AssetAsModifiedBy
	 * @property-read QQReverseReferenceNodeAsset $AssetAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetModel $AssetModelAsModifiedBy
	 * @property-read QQReverseReferenceNodeAssetModel $AssetModelAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransactionAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransactionAsModifiedBy
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsToUser
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsModifiedBy
	 * @property-read QQReverseReferenceNodeAttachment $AttachmentAsCreatedBy
	 * @property-read QQReverseReferenceNodeAudit $AuditAsModifiedBy
	 * @property-read QQReverseReferenceNodeAudit $AuditAsCreatedBy
	 * @property-read QQReverseReferenceNodeCategory $CategoryAsModifiedBy
	 * @property-read QQReverseReferenceNodeCategory $CategoryAsCreatedBy
	 * @property-read QQReverseReferenceNodeCompany $CompanyAsModifiedBy
	 * @property-read QQReverseReferenceNodeCompany $CompanyAsCreatedBy
	 * @property-read QQReverseReferenceNodeContact $ContactAsModifiedBy
	 * @property-read QQReverseReferenceNodeContact $ContactAsCreatedBy
	 * @property-read QQReverseReferenceNodeCustomField $CustomFieldAsModifiedBy
	 * @property-read QQReverseReferenceNodeCustomField $CustomFieldAsCreatedBy
	 * @property-read QQReverseReferenceNodeCustomFieldValue $CustomFieldValueAsCreatedBy
	 * @property-read QQReverseReferenceNodeCustomFieldValue $CustomFieldValueAsModifiedBy
	 * @property-read QQReverseReferenceNodeDatagridColumnPreference $DatagridColumnPreference
	 * @property-read QQReverseReferenceNodeInventoryLocation $InventoryLocationAsCreatedBy
	 * @property-read QQReverseReferenceNodeInventoryLocation $InventoryLocationAsModifiedBy
	 * @property-read QQReverseReferenceNodeInventoryModel $InventoryModelAsModifiedBy
	 * @property-read QQReverseReferenceNodeInventoryModel $InventoryModelAsCreatedBy
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransactionAsModifiedBy
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransactionAsCreatedBy
	 * @property-read QQReverseReferenceNodeLocation $LocationAsModifiedBy
	 * @property-read QQReverseReferenceNodeLocation $LocationAsCreatedBy
	 * @property-read QQReverseReferenceNodeManufacturer $ManufacturerAsModifiedBy
	 * @property-read QQReverseReferenceNodeManufacturer $ManufacturerAsCreatedBy
	 * @property-read QQReverseReferenceNodeNotification $NotificationAsModifiedBy
	 * @property-read QQReverseReferenceNodeNotification $NotificationAsCreatedBy
	 * @property-read QQReverseReferenceNodeNotificationUserAccount $NotificationUserAccount
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsCreatedBy
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsModifiedBy
	 * @property-read QQReverseReferenceNodeRole $RoleAsModifiedBy
	 * @property-read QQReverseReferenceNodeRole $RoleAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleModule $RoleModuleAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleModule $RoleModuleAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsCreatedBy
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsModifiedBy
	 * @property-read QQReverseReferenceNodeTransaction $TransactionAsCreatedBy
	 * @property-read QQReverseReferenceNodeTransaction $TransactionAsModifiedBy
	 * @property-read QQReverseReferenceNodeUserAccount $UserAccountAsCreatedBy
	 * @property-read QQReverseReferenceNodeUserAccount $UserAccountAsModifiedBy
	 */
	class QQNodeUserAccount extends QQNode {
		protected $strTableName = 'user_account';
		protected $strPrimaryKey = 'user_account_id';
		protected $strClassName = 'UserAccount';
		public function __get($strName) {
			switch ($strName) {
				case 'UserAccountId':
					return new QQNode('user_account_id', 'UserAccountId', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'PasswordHash':
					return new QQNode('password_hash', 'PasswordHash', 'string', $this);
				case 'EmailAddress':
					return new QQNode('email_address', 'EmailAddress', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'AdminFlag':
					return new QQNode('admin_flag', 'AdminFlag', 'boolean', $this);
				case 'PortableAccessFlag':
					return new QQNode('portable_access_flag', 'PortableAccessFlag', 'boolean', $this);
				case 'PortableUserPin':
					return new QQNode('portable_user_pin', 'PortableUserPin', 'integer', $this);
				case 'RoleId':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
				case 'Role':
					return new QQNodeRole('role_id', 'Role', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'ModifiedDate', 'string', $this);
				case 'AddressAsCreatedBy':
					return new QQReverseReferenceNodeAddress($this, 'addressascreatedby', 'reverse_reference', 'created_by');
				case 'AddressAsModifiedBy':
					return new QQReverseReferenceNodeAddress($this, 'addressasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetAsModifiedBy':
					return new QQReverseReferenceNodeAsset($this, 'assetasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetAsCreatedBy':
					return new QQReverseReferenceNodeAsset($this, 'assetascreatedby', 'reverse_reference', 'created_by');
				case 'AssetModelAsModifiedBy':
					return new QQReverseReferenceNodeAssetModel($this, 'assetmodelasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetModelAsCreatedBy':
					return new QQReverseReferenceNodeAssetModel($this, 'assetmodelascreatedby', 'reverse_reference', 'created_by');
				case 'AssetTransactionAsCreatedBy':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransactionascreatedby', 'reverse_reference', 'created_by');
				case 'AssetTransactionAsModifiedBy':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransactionasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetTransactionCheckoutAsToUser':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutastouser', 'reverse_reference', 'to_user_id');
				case 'AssetTransactionCheckoutAsCreatedBy':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutascreatedby', 'reverse_reference', 'created_by');
				case 'AssetTransactionCheckoutAsModifiedBy':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AttachmentAsCreatedBy':
					return new QQReverseReferenceNodeAttachment($this, 'attachmentascreatedby', 'reverse_reference', 'created_by');
				case 'AuditAsModifiedBy':
					return new QQReverseReferenceNodeAudit($this, 'auditasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AuditAsCreatedBy':
					return new QQReverseReferenceNodeAudit($this, 'auditascreatedby', 'reverse_reference', 'created_by');
				case 'CategoryAsModifiedBy':
					return new QQReverseReferenceNodeCategory($this, 'categoryasmodifiedby', 'reverse_reference', 'modified_by');
				case 'CategoryAsCreatedBy':
					return new QQReverseReferenceNodeCategory($this, 'categoryascreatedby', 'reverse_reference', 'created_by');
				case 'CompanyAsModifiedBy':
					return new QQReverseReferenceNodeCompany($this, 'companyasmodifiedby', 'reverse_reference', 'modified_by');
				case 'CompanyAsCreatedBy':
					return new QQReverseReferenceNodeCompany($this, 'companyascreatedby', 'reverse_reference', 'created_by');
				case 'ContactAsModifiedBy':
					return new QQReverseReferenceNodeContact($this, 'contactasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ContactAsCreatedBy':
					return new QQReverseReferenceNodeContact($this, 'contactascreatedby', 'reverse_reference', 'created_by');
				case 'CustomFieldAsModifiedBy':
					return new QQReverseReferenceNodeCustomField($this, 'customfieldasmodifiedby', 'reverse_reference', 'modified_by');
				case 'CustomFieldAsCreatedBy':
					return new QQReverseReferenceNodeCustomField($this, 'customfieldascreatedby', 'reverse_reference', 'created_by');
				case 'CustomFieldValueAsCreatedBy':
					return new QQReverseReferenceNodeCustomFieldValue($this, 'customfieldvalueascreatedby', 'reverse_reference', 'created_by');
				case 'CustomFieldValueAsModifiedBy':
					return new QQReverseReferenceNodeCustomFieldValue($this, 'customfieldvalueasmodifiedby', 'reverse_reference', 'modified_by');
				case 'DatagridColumnPreference':
					return new QQReverseReferenceNodeDatagridColumnPreference($this, 'datagridcolumnpreference', 'reverse_reference', 'user_account_id');
				case 'InventoryLocationAsCreatedBy':
					return new QQReverseReferenceNodeInventoryLocation($this, 'inventorylocationascreatedby', 'reverse_reference', 'created_by');
				case 'InventoryLocationAsModifiedBy':
					return new QQReverseReferenceNodeInventoryLocation($this, 'inventorylocationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'InventoryModelAsModifiedBy':
					return new QQReverseReferenceNodeInventoryModel($this, 'inventorymodelasmodifiedby', 'reverse_reference', 'modified_by');
				case 'InventoryModelAsCreatedBy':
					return new QQReverseReferenceNodeInventoryModel($this, 'inventorymodelascreatedby', 'reverse_reference', 'created_by');
				case 'InventoryTransactionAsModifiedBy':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransactionasmodifiedby', 'reverse_reference', 'modified_by');
				case 'InventoryTransactionAsCreatedBy':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransactionascreatedby', 'reverse_reference', 'created_by');
				case 'LocationAsModifiedBy':
					return new QQReverseReferenceNodeLocation($this, 'locationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'LocationAsCreatedBy':
					return new QQReverseReferenceNodeLocation($this, 'locationascreatedby', 'reverse_reference', 'created_by');
				case 'ManufacturerAsModifiedBy':
					return new QQReverseReferenceNodeManufacturer($this, 'manufacturerasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ManufacturerAsCreatedBy':
					return new QQReverseReferenceNodeManufacturer($this, 'manufacturerascreatedby', 'reverse_reference', 'created_by');
				case 'NotificationAsModifiedBy':
					return new QQReverseReferenceNodeNotification($this, 'notificationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'NotificationAsCreatedBy':
					return new QQReverseReferenceNodeNotification($this, 'notificationascreatedby', 'reverse_reference', 'created_by');
				case 'NotificationUserAccount':
					return new QQReverseReferenceNodeNotificationUserAccount($this, 'notificationuseraccount', 'reverse_reference', 'user_account_id');
				case 'ReceiptAsCreatedBy':
					return new QQReverseReferenceNodeReceipt($this, 'receiptascreatedby', 'reverse_reference', 'created_by');
				case 'ReceiptAsModifiedBy':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleAsModifiedBy':
					return new QQReverseReferenceNodeRole($this, 'roleasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleAsCreatedBy':
					return new QQReverseReferenceNodeRole($this, 'roleascreatedby', 'reverse_reference', 'created_by');
				case 'RoleEntityQtypeBuiltInAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleEntityQtypeBuiltInAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleModuleAsModifiedBy':
					return new QQReverseReferenceNodeRoleModule($this, 'rolemoduleasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleModuleAsCreatedBy':
					return new QQReverseReferenceNodeRoleModule($this, 'rolemoduleascreatedby', 'reverse_reference', 'created_by');
				case 'RoleModuleAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleModuleAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleTransactionTypeAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleTransactionTypeAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ShipmentAsCreatedBy':
					return new QQReverseReferenceNodeShipment($this, 'shipmentascreatedby', 'reverse_reference', 'created_by');
				case 'ShipmentAsModifiedBy':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasmodifiedby', 'reverse_reference', 'modified_by');
				case 'TransactionAsCreatedBy':
					return new QQReverseReferenceNodeTransaction($this, 'transactionascreatedby', 'reverse_reference', 'created_by');
				case 'TransactionAsModifiedBy':
					return new QQReverseReferenceNodeTransaction($this, 'transactionasmodifiedby', 'reverse_reference', 'modified_by');
				case 'UserAccountAsCreatedBy':
					return new QQReverseReferenceNodeUserAccount($this, 'useraccountascreatedby', 'reverse_reference', 'created_by');
				case 'UserAccountAsModifiedBy':
					return new QQReverseReferenceNodeUserAccount($this, 'useraccountasmodifiedby', 'reverse_reference', 'modified_by');

				case '_PrimaryKeyNode':
					return new QQNode('user_account_id', 'UserAccountId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $UserAccountId
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Username
	 * @property-read QQNode $PasswordHash
	 * @property-read QQNode $EmailAddress
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $AdminFlag
	 * @property-read QQNode $PortableAccessFlag
	 * @property-read QQNode $PortableUserPin
	 * @property-read QQNode $RoleId
	 * @property-read QQNodeRole $Role
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUserAccount $ModifiedByObject
	 * @property-read QQNode $ModifiedDate
	 * @property-read QQReverseReferenceNodeAddress $AddressAsCreatedBy
	 * @property-read QQReverseReferenceNodeAddress $AddressAsModifiedBy
	 * @property-read QQReverseReferenceNodeAsset $AssetAsModifiedBy
	 * @property-read QQReverseReferenceNodeAsset $AssetAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetModel $AssetModelAsModifiedBy
	 * @property-read QQReverseReferenceNodeAssetModel $AssetModelAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransactionAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetTransaction $AssetTransactionAsModifiedBy
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsToUser
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsCreatedBy
	 * @property-read QQReverseReferenceNodeAssetTransactionCheckout $AssetTransactionCheckoutAsModifiedBy
	 * @property-read QQReverseReferenceNodeAttachment $AttachmentAsCreatedBy
	 * @property-read QQReverseReferenceNodeAudit $AuditAsModifiedBy
	 * @property-read QQReverseReferenceNodeAudit $AuditAsCreatedBy
	 * @property-read QQReverseReferenceNodeCategory $CategoryAsModifiedBy
	 * @property-read QQReverseReferenceNodeCategory $CategoryAsCreatedBy
	 * @property-read QQReverseReferenceNodeCompany $CompanyAsModifiedBy
	 * @property-read QQReverseReferenceNodeCompany $CompanyAsCreatedBy
	 * @property-read QQReverseReferenceNodeContact $ContactAsModifiedBy
	 * @property-read QQReverseReferenceNodeContact $ContactAsCreatedBy
	 * @property-read QQReverseReferenceNodeCustomField $CustomFieldAsModifiedBy
	 * @property-read QQReverseReferenceNodeCustomField $CustomFieldAsCreatedBy
	 * @property-read QQReverseReferenceNodeCustomFieldValue $CustomFieldValueAsCreatedBy
	 * @property-read QQReverseReferenceNodeCustomFieldValue $CustomFieldValueAsModifiedBy
	 * @property-read QQReverseReferenceNodeDatagridColumnPreference $DatagridColumnPreference
	 * @property-read QQReverseReferenceNodeInventoryLocation $InventoryLocationAsCreatedBy
	 * @property-read QQReverseReferenceNodeInventoryLocation $InventoryLocationAsModifiedBy
	 * @property-read QQReverseReferenceNodeInventoryModel $InventoryModelAsModifiedBy
	 * @property-read QQReverseReferenceNodeInventoryModel $InventoryModelAsCreatedBy
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransactionAsModifiedBy
	 * @property-read QQReverseReferenceNodeInventoryTransaction $InventoryTransactionAsCreatedBy
	 * @property-read QQReverseReferenceNodeLocation $LocationAsModifiedBy
	 * @property-read QQReverseReferenceNodeLocation $LocationAsCreatedBy
	 * @property-read QQReverseReferenceNodeManufacturer $ManufacturerAsModifiedBy
	 * @property-read QQReverseReferenceNodeManufacturer $ManufacturerAsCreatedBy
	 * @property-read QQReverseReferenceNodeNotification $NotificationAsModifiedBy
	 * @property-read QQReverseReferenceNodeNotification $NotificationAsCreatedBy
	 * @property-read QQReverseReferenceNodeNotificationUserAccount $NotificationUserAccount
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsCreatedBy
	 * @property-read QQReverseReferenceNodeReceipt $ReceiptAsModifiedBy
	 * @property-read QQReverseReferenceNodeRole $RoleAsModifiedBy
	 * @property-read QQReverseReferenceNodeRole $RoleAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization $RoleEntityQtypeBuiltInAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization $RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleModule $RoleModuleAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleModule $RoleModuleAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeRoleModuleAuthorization $RoleModuleAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorizationAsCreatedBy
	 * @property-read QQReverseReferenceNodeRoleTransactionTypeAuthorization $RoleTransactionTypeAuthorizationAsModifiedBy
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsCreatedBy
	 * @property-read QQReverseReferenceNodeShipment $ShipmentAsModifiedBy
	 * @property-read QQReverseReferenceNodeTransaction $TransactionAsCreatedBy
	 * @property-read QQReverseReferenceNodeTransaction $TransactionAsModifiedBy
	 * @property-read QQReverseReferenceNodeUserAccount $UserAccountAsCreatedBy
	 * @property-read QQReverseReferenceNodeUserAccount $UserAccountAsModifiedBy
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeUserAccount extends QQReverseReferenceNode {
		protected $strTableName = 'user_account';
		protected $strPrimaryKey = 'user_account_id';
		protected $strClassName = 'UserAccount';
		public function __get($strName) {
			switch ($strName) {
				case 'UserAccountId':
					return new QQNode('user_account_id', 'UserAccountId', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'PasswordHash':
					return new QQNode('password_hash', 'PasswordHash', 'string', $this);
				case 'EmailAddress':
					return new QQNode('email_address', 'EmailAddress', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'AdminFlag':
					return new QQNode('admin_flag', 'AdminFlag', 'boolean', $this);
				case 'PortableAccessFlag':
					return new QQNode('portable_access_flag', 'PortableAccessFlag', 'boolean', $this);
				case 'PortableUserPin':
					return new QQNode('portable_user_pin', 'PortableUserPin', 'integer', $this);
				case 'RoleId':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
				case 'Role':
					return new QQNodeRole('role_id', 'Role', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUserAccount('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'ModifiedDate':
					return new QQNode('modified_date', 'ModifiedDate', 'string', $this);
				case 'AddressAsCreatedBy':
					return new QQReverseReferenceNodeAddress($this, 'addressascreatedby', 'reverse_reference', 'created_by');
				case 'AddressAsModifiedBy':
					return new QQReverseReferenceNodeAddress($this, 'addressasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetAsModifiedBy':
					return new QQReverseReferenceNodeAsset($this, 'assetasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetAsCreatedBy':
					return new QQReverseReferenceNodeAsset($this, 'assetascreatedby', 'reverse_reference', 'created_by');
				case 'AssetModelAsModifiedBy':
					return new QQReverseReferenceNodeAssetModel($this, 'assetmodelasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetModelAsCreatedBy':
					return new QQReverseReferenceNodeAssetModel($this, 'assetmodelascreatedby', 'reverse_reference', 'created_by');
				case 'AssetTransactionAsCreatedBy':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransactionascreatedby', 'reverse_reference', 'created_by');
				case 'AssetTransactionAsModifiedBy':
					return new QQReverseReferenceNodeAssetTransaction($this, 'assettransactionasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AssetTransactionCheckoutAsToUser':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutastouser', 'reverse_reference', 'to_user_id');
				case 'AssetTransactionCheckoutAsCreatedBy':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutascreatedby', 'reverse_reference', 'created_by');
				case 'AssetTransactionCheckoutAsModifiedBy':
					return new QQReverseReferenceNodeAssetTransactionCheckout($this, 'assettransactioncheckoutasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AttachmentAsCreatedBy':
					return new QQReverseReferenceNodeAttachment($this, 'attachmentascreatedby', 'reverse_reference', 'created_by');
				case 'AuditAsModifiedBy':
					return new QQReverseReferenceNodeAudit($this, 'auditasmodifiedby', 'reverse_reference', 'modified_by');
				case 'AuditAsCreatedBy':
					return new QQReverseReferenceNodeAudit($this, 'auditascreatedby', 'reverse_reference', 'created_by');
				case 'CategoryAsModifiedBy':
					return new QQReverseReferenceNodeCategory($this, 'categoryasmodifiedby', 'reverse_reference', 'modified_by');
				case 'CategoryAsCreatedBy':
					return new QQReverseReferenceNodeCategory($this, 'categoryascreatedby', 'reverse_reference', 'created_by');
				case 'CompanyAsModifiedBy':
					return new QQReverseReferenceNodeCompany($this, 'companyasmodifiedby', 'reverse_reference', 'modified_by');
				case 'CompanyAsCreatedBy':
					return new QQReverseReferenceNodeCompany($this, 'companyascreatedby', 'reverse_reference', 'created_by');
				case 'ContactAsModifiedBy':
					return new QQReverseReferenceNodeContact($this, 'contactasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ContactAsCreatedBy':
					return new QQReverseReferenceNodeContact($this, 'contactascreatedby', 'reverse_reference', 'created_by');
				case 'CustomFieldAsModifiedBy':
					return new QQReverseReferenceNodeCustomField($this, 'customfieldasmodifiedby', 'reverse_reference', 'modified_by');
				case 'CustomFieldAsCreatedBy':
					return new QQReverseReferenceNodeCustomField($this, 'customfieldascreatedby', 'reverse_reference', 'created_by');
				case 'CustomFieldValueAsCreatedBy':
					return new QQReverseReferenceNodeCustomFieldValue($this, 'customfieldvalueascreatedby', 'reverse_reference', 'created_by');
				case 'CustomFieldValueAsModifiedBy':
					return new QQReverseReferenceNodeCustomFieldValue($this, 'customfieldvalueasmodifiedby', 'reverse_reference', 'modified_by');
				case 'DatagridColumnPreference':
					return new QQReverseReferenceNodeDatagridColumnPreference($this, 'datagridcolumnpreference', 'reverse_reference', 'user_account_id');
				case 'InventoryLocationAsCreatedBy':
					return new QQReverseReferenceNodeInventoryLocation($this, 'inventorylocationascreatedby', 'reverse_reference', 'created_by');
				case 'InventoryLocationAsModifiedBy':
					return new QQReverseReferenceNodeInventoryLocation($this, 'inventorylocationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'InventoryModelAsModifiedBy':
					return new QQReverseReferenceNodeInventoryModel($this, 'inventorymodelasmodifiedby', 'reverse_reference', 'modified_by');
				case 'InventoryModelAsCreatedBy':
					return new QQReverseReferenceNodeInventoryModel($this, 'inventorymodelascreatedby', 'reverse_reference', 'created_by');
				case 'InventoryTransactionAsModifiedBy':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransactionasmodifiedby', 'reverse_reference', 'modified_by');
				case 'InventoryTransactionAsCreatedBy':
					return new QQReverseReferenceNodeInventoryTransaction($this, 'inventorytransactionascreatedby', 'reverse_reference', 'created_by');
				case 'LocationAsModifiedBy':
					return new QQReverseReferenceNodeLocation($this, 'locationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'LocationAsCreatedBy':
					return new QQReverseReferenceNodeLocation($this, 'locationascreatedby', 'reverse_reference', 'created_by');
				case 'ManufacturerAsModifiedBy':
					return new QQReverseReferenceNodeManufacturer($this, 'manufacturerasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ManufacturerAsCreatedBy':
					return new QQReverseReferenceNodeManufacturer($this, 'manufacturerascreatedby', 'reverse_reference', 'created_by');
				case 'NotificationAsModifiedBy':
					return new QQReverseReferenceNodeNotification($this, 'notificationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'NotificationAsCreatedBy':
					return new QQReverseReferenceNodeNotification($this, 'notificationascreatedby', 'reverse_reference', 'created_by');
				case 'NotificationUserAccount':
					return new QQReverseReferenceNodeNotificationUserAccount($this, 'notificationuseraccount', 'reverse_reference', 'user_account_id');
				case 'ReceiptAsCreatedBy':
					return new QQReverseReferenceNodeReceipt($this, 'receiptascreatedby', 'reverse_reference', 'created_by');
				case 'ReceiptAsModifiedBy':
					return new QQReverseReferenceNodeReceipt($this, 'receiptasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleAsModifiedBy':
					return new QQReverseReferenceNodeRole($this, 'roleasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleAsCreatedBy':
					return new QQReverseReferenceNodeRole($this, 'roleascreatedby', 'reverse_reference', 'created_by');
				case 'RoleEntityQtypeBuiltInAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleEntityQtypeBuiltInAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeBuiltInAuthorization($this, 'roleentityqtypebuiltinauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleEntityQtypeCustomFieldAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleEntityQtypeCustomFieldAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleEntityQtypeCustomFieldAuthorization($this, 'roleentityqtypecustomfieldauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleModuleAsModifiedBy':
					return new QQReverseReferenceNodeRoleModule($this, 'rolemoduleasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleModuleAsCreatedBy':
					return new QQReverseReferenceNodeRoleModule($this, 'rolemoduleascreatedby', 'reverse_reference', 'created_by');
				case 'RoleModuleAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'RoleModuleAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleModuleAuthorization($this, 'rolemoduleauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleTransactionTypeAuthorizationAsCreatedBy':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorizationascreatedby', 'reverse_reference', 'created_by');
				case 'RoleTransactionTypeAuthorizationAsModifiedBy':
					return new QQReverseReferenceNodeRoleTransactionTypeAuthorization($this, 'roletransactiontypeauthorizationasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ShipmentAsCreatedBy':
					return new QQReverseReferenceNodeShipment($this, 'shipmentascreatedby', 'reverse_reference', 'created_by');
				case 'ShipmentAsModifiedBy':
					return new QQReverseReferenceNodeShipment($this, 'shipmentasmodifiedby', 'reverse_reference', 'modified_by');
				case 'TransactionAsCreatedBy':
					return new QQReverseReferenceNodeTransaction($this, 'transactionascreatedby', 'reverse_reference', 'created_by');
				case 'TransactionAsModifiedBy':
					return new QQReverseReferenceNodeTransaction($this, 'transactionasmodifiedby', 'reverse_reference', 'modified_by');
				case 'UserAccountAsCreatedBy':
					return new QQReverseReferenceNodeUserAccount($this, 'useraccountascreatedby', 'reverse_reference', 'created_by');
				case 'UserAccountAsModifiedBy':
					return new QQReverseReferenceNodeUserAccount($this, 'useraccountasmodifiedby', 'reverse_reference', 'modified_by');

				case '_PrimaryKeyNode':
					return new QQNode('user_account_id', 'UserAccountId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>