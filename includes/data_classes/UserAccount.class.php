<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
	require(__DATAGEN_CLASSES__ . '/UserAccountGen.class.php');

	/**
	 * The UserAccount class defined here contains any
	 * customized code for the UserAccount class in the
	 * Object Relational Model.  It represents the "user_account" table 
	 * in the database, and extends from the code generated abstract UserAccountGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class UserAccount extends UserAccountGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objUserAccount->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('%s',  $this->strUsername);
		}
		
		public function __toStringFullName() {
			return sprintf('%s %s', $this->strFirstName, $this->strLastName);
		}
		
		// This adds the created by and creation date before saving a new user account
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
		
		public function __toStringWithLink() {
			return sprintf('<a href="user_account_edit.php?intUserAccountId=%s">%s</a>', $this->intUserAccountId, $this->__toString());
		}
		
		// Returns an <img> tag based on the boolean value (either a check or an X)
		public function __toStringActiveFlag() {
			
			return BooleanImage($this->ActiveFlag);
		}
		
		// Returns an <img> tag based on the boolean value (either a check or an X)
		public function __toStringAdminFlag() {
			
			return BooleanImage($this->AdminFlag);
		}
		
		/**
		 * Load a UserAccount Object based on the UserAccountId and PortableUserPin
		 * Returns false if the ID and Pin do not match
		 *
		 * @param integer $intUserAccountId
		 * @param string $strPortableUserPin
		 * @return UserAccount Object
		 */
		// Returns true if UserAccountId/UserPin are correct and false otherwise
		public function LoadByUserAccountIdPortableUserPin($intUserAccountId, $strPortableUserPin) {
			
			return UserAccount::QuerySingle(
				QQ::AndCondition(QQ::Equal(QQN::UserAccount()->UserAccountId, $intUserAccountId), QQ::Equal(QQN::UserAccount()->PortableUserPin, $strPortableUserPin))
			);
			
		    /*$strQuery = "SELECT * FROM `user_account` where `user_account_id`='$intUserAccountId' AND `portable_user_pin`='$strPortableUserPin'";
		    
		    $objDatabase = QApplication::$Database[1];
	
    	    // Perform the Query
    	    $objDbResult = $objDatabase->Query($strQuery);
    	    
    	    $mixArray = $objDbResult->FetchArray();
    	    if ($mixArray) {
    	    	return $mixArray;
	        }
		    return false;*/
		}
	}
?>