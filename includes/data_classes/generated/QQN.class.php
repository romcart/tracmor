<?php
	class QQN {
		/**
		 * @return QQNodeVersion
		 */
		static public function Version() {
			return new QQNodeVersion('_version', null, null);
		}
		/**
		 * @return QQNodeAddress
		 */
		static public function Address() {
			return new QQNodeAddress('address', null, null);
		}
		/**
		 * @return QQNodeAddressCustomFieldHelper
		 */
		static public function AddressCustomFieldHelper() {
			return new QQNodeAddressCustomFieldHelper('address_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeAdminSetting
		 */
		static public function AdminSetting() {
			return new QQNodeAdminSetting('admin_setting', null, null);
		}
		/**
		 * @return QQNodeAsset
		 */
		static public function Asset() {
			return new QQNodeAsset('asset', null, null);
		}
		/**
		 * @return QQNodeAssetCustomFieldAssetModel
		 */
		static public function AssetCustomFieldAssetModel() {
			return new QQNodeAssetCustomFieldAssetModel('asset_custom_field_asset_model', null, null);
		}
		/**
		 * @return QQNodeAssetCustomFieldHelper
		 */
		static public function AssetCustomFieldHelper() {
			return new QQNodeAssetCustomFieldHelper('asset_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeAssetModel
		 */
		static public function AssetModel() {
			return new QQNodeAssetModel('asset_model', null, null);
		}
		/**
		 * @return QQNodeAssetModelCustomFieldHelper
		 */
		static public function AssetModelCustomFieldHelper() {
			return new QQNodeAssetModelCustomFieldHelper('asset_model_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeAssetTransaction
		 */
		static public function AssetTransaction() {
			return new QQNodeAssetTransaction('asset_transaction', null, null);
		}
		/**
		 * @return QQNodeAssetTransactionCheckout
		 */
		static public function AssetTransactionCheckout() {
			return new QQNodeAssetTransactionCheckout('asset_transaction_checkout', null, null);
		}
		/**
		 * @return QQNodeAttachment
		 */
		static public function Attachment() {
			return new QQNodeAttachment('attachment', null, null);
		}
		/**
		 * @return QQNodeAudit
		 */
		static public function Audit() {
			return new QQNodeAudit('audit', null, null);
		}
		/**
		 * @return QQNodeAuditScan
		 */
		static public function AuditScan() {
			return new QQNodeAuditScan('audit_scan', null, null);
		}
		/**
		 * @return QQNodeAuthorization
		 */
		static public function Authorization() {
			return new QQNodeAuthorization('authorization', null, null);
		}
		/**
		 * @return QQNodeAuthorizationLevel
		 */
		static public function AuthorizationLevel() {
			return new QQNodeAuthorizationLevel('authorization_level', null, null);
		}
		/**
		 * @return QQNodeCategory
		 */
		static public function Category() {
			return new QQNodeCategory('category', null, null);
		}
		/**
		 * @return QQNodeCategoryCustomFieldHelper
		 */
		static public function CategoryCustomFieldHelper() {
			return new QQNodeCategoryCustomFieldHelper('category_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeCompany
		 */
		static public function Company() {
			return new QQNodeCompany('company', null, null);
		}
		/**
		 * @return QQNodeCompanyCustomFieldHelper
		 */
		static public function CompanyCustomFieldHelper() {
			return new QQNodeCompanyCustomFieldHelper('company_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeContact
		 */
		static public function Contact() {
			return new QQNodeContact('contact', null, null);
		}
		/**
		 * @return QQNodeContactCustomFieldHelper
		 */
		static public function ContactCustomFieldHelper() {
			return new QQNodeContactCustomFieldHelper('contact_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeCountry
		 */
		static public function Country() {
			return new QQNodeCountry('country', null, null);
		}
		/**
		 * @return QQNodeCourier
		 */
		static public function Courier() {
			return new QQNodeCourier('courier', null, null);
		}
		/**
		 * @return QQNodeCustomField
		 */
		static public function CustomField() {
			return new QQNodeCustomField('custom_field', null, null);
		}
		/**
		 * @return QQNodeCustomFieldValue
		 */
		static public function CustomFieldValue() {
			return new QQNodeCustomFieldValue('custom_field_value', null, null);
		}
		/**
		 * @return QQNodeDatagrid
		 */
		static public function Datagrid() {
			return new QQNodeDatagrid('datagrid', null, null);
		}
		/**
		 * @return QQNodeDatagridColumnPreference
		 */
		static public function DatagridColumnPreference() {
			return new QQNodeDatagridColumnPreference('datagrid_column_preference', null, null);
		}
		/**
		 * @return QQNodeDepreciationClass
		 */
		static public function DepreciationClass() {
			return new QQNodeDepreciationClass('depreciation_class', null, null);
		}
		/**
		 * @return QQNodeEntityQtypeCustomField
		 */
		static public function EntityQtypeCustomField() {
			return new QQNodeEntityQtypeCustomField('entity_qtype_custom_field', null, null);
		}
		/**
		 * @return QQNodeInventoryLocation
		 */
		static public function InventoryLocation() {
			return new QQNodeInventoryLocation('inventory_location', null, null);
		}
		/**
		 * @return QQNodeInventoryModel
		 */
		static public function InventoryModel() {
			return new QQNodeInventoryModel('inventory_model', null, null);
		}
		/**
		 * @return QQNodeInventoryModelCustomFieldHelper
		 */
		static public function InventoryModelCustomFieldHelper() {
			return new QQNodeInventoryModelCustomFieldHelper('inventory_model_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeInventoryTransaction
		 */
		static public function InventoryTransaction() {
			return new QQNodeInventoryTransaction('inventory_transaction', null, null);
		}
		/**
		 * @return QQNodeLocation
		 */
		static public function Location() {
			return new QQNodeLocation('location', null, null);
		}
		/**
		 * @return QQNodeManufacturer
		 */
		static public function Manufacturer() {
			return new QQNodeManufacturer('manufacturer', null, null);
		}
		/**
		 * @return QQNodeManufacturerCustomFieldHelper
		 */
		static public function ManufacturerCustomFieldHelper() {
			return new QQNodeManufacturerCustomFieldHelper('manufacturer_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeModule
		 */
		static public function Module() {
			return new QQNodeModule('module', null, null);
		}
		/**
		 * @return QQNodeNotification
		 */
		static public function Notification() {
			return new QQNodeNotification('notification', null, null);
		}
		/**
		 * @return QQNodeNotificationUserAccount
		 */
		static public function NotificationUserAccount() {
			return new QQNodeNotificationUserAccount('notification_user_account', null, null);
		}
		/**
		 * @return QQNodeReceipt
		 */
		static public function Receipt() {
			return new QQNodeReceipt('receipt', null, null);
		}
		/**
		 * @return QQNodeReceiptCustomFieldHelper
		 */
		static public function ReceiptCustomFieldHelper() {
			return new QQNodeReceiptCustomFieldHelper('receipt_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeRole
		 */
		static public function Role() {
			return new QQNodeRole('role', null, null);
		}
		/**
		 * @return QQNodeRoleEntityQtypeBuiltInAuthorization
		 */
		static public function RoleEntityQtypeBuiltInAuthorization() {
			return new QQNodeRoleEntityQtypeBuiltInAuthorization('role_entity_qtype_built_in_authorization', null, null);
		}
		/**
		 * @return QQNodeRoleEntityQtypeCustomFieldAuthorization
		 */
		static public function RoleEntityQtypeCustomFieldAuthorization() {
			return new QQNodeRoleEntityQtypeCustomFieldAuthorization('role_entity_qtype_custom_field_authorization', null, null);
		}
		/**
		 * @return QQNodeRoleModule
		 */
		static public function RoleModule() {
			return new QQNodeRoleModule('role_module', null, null);
		}
		/**
		 * @return QQNodeRoleModuleAuthorization
		 */
		static public function RoleModuleAuthorization() {
			return new QQNodeRoleModuleAuthorization('role_module_authorization', null, null);
		}
		/**
		 * @return QQNodeRoleTransactionTypeAuthorization
		 */
		static public function RoleTransactionTypeAuthorization() {
			return new QQNodeRoleTransactionTypeAuthorization('role_transaction_type_authorization', null, null);
		}
		/**
		 * @return QQNodeShipment
		 */
		static public function Shipment() {
			return new QQNodeShipment('shipment', null, null);
		}
		/**
		 * @return QQNodeShipmentCustomFieldHelper
		 */
		static public function ShipmentCustomFieldHelper() {
			return new QQNodeShipmentCustomFieldHelper('shipment_custom_field_helper', null, null);
		}
		/**
		 * @return QQNodeShortcut
		 */
		static public function Shortcut() {
			return new QQNodeShortcut('shortcut', null, null);
		}
		/**
		 * @return QQNodeStateProvince
		 */
		static public function StateProvince() {
			return new QQNodeStateProvince('state_province', null, null);
		}
		/**
		 * @return QQNodeTransaction
		 */
		static public function Transaction() {
			return new QQNodeTransaction('transaction', null, null);
		}
		/**
		 * @return QQNodeTransactionType
		 */
		static public function TransactionType() {
			return new QQNodeTransactionType('transaction_type', null, null);
		}
		/**
		 * @return QQNodeUserAccount
		 */
		static public function UserAccount() {
			return new QQNodeUserAccount('user_account', null, null);
		}
	}
?>