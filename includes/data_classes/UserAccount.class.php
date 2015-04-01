<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
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
				if (QApplication::$objUserAccount)
					$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
			}

			if ($this->OwnerFlag == null) {
				$this->OwnerFlag = '0';
			}
			
			parent::Save($blnForceInsert, $blnForceUpdate);
		}
		
		public function __toStringWithLink() {
			return sprintf('<a href="user_account_edit.php?intUserAccountId=%s">%s</a>', $this->intUserAccountId, $this->__toString());
		}
		
		// Returns an <img> tag based on the boolean value (either a check or an X)
		public function __toStringActiveFlag() {
			
			return QApplication::BooleanImage($this->ActiveFlag);
		}
		
		// Returns an <img> tag based on the boolean value (either a check or an X)
		public function __toStringAdminFlag() {
			
			return QApplication::BooleanImage($this->AdminFlag);
		}

        public function __getProfileImage(){
            $size = 40;
            $email = $this->EmailAddress;
            $strToReturn = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=mm&s=" . $size;

            return $strToReturn;
        }

		public static function LoadOwner() {
			$arrOwner = UserAccount::QueryArray(QQ::Equal(QQN::UserAccount()->OwnerFlag, '1'));
			return (count($arrOwner)) ? $arrOwner[0] : null;
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
		
		/**
		 * Count Active UserAccounts
		 * @return int
		 */
		public static function CountActive() {
			// Call UserAccount::QueryCount to perform the Count query
			return UserAccount::QueryCount(QQ::Equal(QQN::UserAccount()->ActiveFlag,1));
		}
		
		public static function LoadAllAsCustomArray($strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			// Call to ArrayQueryHelper to Get Database Object and Get SQL Clauses
			UserAccount::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $strExpandSelect, $strExpandFrom, $objExpansionMap, $objDatabase);
			
			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
				%s
					`user_account`.`user_account_id` AS `user_account_id`,
					`user_account`.`username` AS `username`
					%s
				FROM
					`user_account` AS `user_account`
					%s
				%s
				%s', $strLimitPrefix, $strExpandSelect, $strExpandFrom,
				$strOrderBy, $strLimitSuffix);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			$objToReturn = array();
			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;			
			$item = Array();
			while ($objDbRow = $objDbResult->GetNextRow()) {				
				$item['user_account_id'] = $objDbRow->GetColumn('user_account_id', 'Integer');
				$item['username'] = $objDbRow->GetColumn('username');
				array_push($objToReturn,$item);
			}
			return $objToReturn;
		}

		public function SendPasswordResetEmail($blnForce = false) {
			// Make sure a valid reset code does not already exist
			if (!$blnForce && $this->PasswordResetCode && $this->PasswordResetExpiry->IsLaterThan(QDateTime::Now())) {
				return;
			}

			$strPasswordResetCode = $this->GeneratePasswordResetCode();

			// Setup Token Array
			$strTokenArray = array(
				'NAME' => $this->FirstName,
				'URL' => sprintf('https://%s%s/password/reset.php?c=%s', 
					$_SERVER['HTTP_HOST'], 
					__SUBDIRECTORY__,
					$strPasswordResetCode),
				'SIGNATURE' => EMAIL_SIGNATURE
			);

			// Send message
			QApplication::SendEmailUsingTemplate('password_recovery', 'Tracmor Account Password Reset', EMAIL_FROM_ADDRESS,
				sprintf('%s <%s>', $this->__toStringFullName(), $this->EmailAddress), $strTokenArray);
		}

		public function GeneratePasswordResetCode() {
			// generate password reset code
			list($usec, $sec) = explode(' ', microtime());
			$seed = (float) $sec + ((float) $usec * 100000);
			srand($seed);
			$alfa = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
			$token = "";
			$code_length = 32;
			for($i = 0; $i < $code_length; $i ++) {
				$token .= $alfa[rand(0, strlen($alfa)-1)];
			}

			// Hash the reset code before saving
			$strCodeHash = QApplication::HashPassword($token);

			// save reset code and expiry in db
			$this->PasswordResetCode = $strCodeHash;
			$this->PasswordResetExpiry = QDateTime::Now()->AddHours(1);
			$this->Save();
			return $token; 
		}

		public static function LoadByPasswordResetCode($strPasswordResetCode) {
			
			// Reset code must be 32 characters
			if (strlen($strPasswordResetCode) != 32) {
				return null;
			}
			
			// Load all users with unexpired reset codes			
			$arrUserAccount = UserAccount::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::UserAccount()->ActiveFlag, 1),
					QQ::IsNotNull(QQN::UserAccount()->PasswordResetCode),
					QQ::GreaterThan(QQN::UserAccount()->PasswordResetExpiry, QDateTime::Now())
				)
			);

			// Check submitted reset code against any valid codes
			foreach ($arrUserAccount as $objUserAccount) {
				if (QApplication::CheckPassword($strPasswordResetCode, $objUserAccount->PasswordResetCode)) {
		
					// Match found
					return $objUserAccount;
				}
			}

			return null;
		}
	}
?>
