<?php
	require(__DATAGEN_CLASSES__ . '/RoleEntityQtypeCustomFieldAuthorizationGen.class.php');

	/**
	 * The RoleEntityQtypeCustomFieldAuthorization class defined here contains any
	 * customized code for the RoleEntityQtypeCustomFieldAuthorization class in the
	 * Object Relational Model.  It represents the "role_entity_qtype_custom_field_authorization" table 
	 * in the database, and extends from the code generated abstract RoleEntityQtypeCustomFieldAuthorizationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class RoleEntityQtypeCustomFieldAuthorization extends RoleEntityQtypeCustomFieldAuthorizationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objRoleEntityQtypeCustomFieldAuthorization->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('RoleEntityQtypeCustomFieldAuthorization Object %s',  $this->intRoleEntityQtypeCustomFieldAuthorizationId);
		}
		// This adds the created by and creation date before saving a new role
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
			}
			parent::Save($blnForceInsert, $blnForceUpdate);
		}
		
	}
?>