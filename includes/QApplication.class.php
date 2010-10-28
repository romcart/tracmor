<?php
	/**
	 * The Application class is an abstract class that statically provides
	 * information and global utilities for the entire web application.
	 *
	 * Custom constants for this webapp, as well as global variables and global
	 * methods should be declared in this abstract class (declared statically).
	 *
	 * This Application class should extend from the ApplicationBase class in
	 * the framework.
	 */
	abstract class QApplication extends QApplicationBase {
		/**
		 * This is called by the PHP5 Autoloader.  This method overrides the
		 * one in ApplicationBase.
		 *
		 * @return void
		 */
		public static function Autoload($strClassName) {
			// First use the Qcodo Autoloader
			if (!parent::Autoload($strClassName)) {
				// NOTE: Run any custom autoloading functionality (if any) here...
				if (file_exists($strFilePath = sprintf('%s/%s.class.php', __DATA_CLASSES__, $strClassName))) {
					require($strFilePath);
					return true;
				}
			}
			return false;			
		}

		/**
		 * Method will setup Internationalization.
		 * NOTE: This method has been INTENTIONALLY left incomplete.
		 * @return void
		 */
		public static function InitializeI18n() {
			if (isset($_SESSION)) {
				if (array_key_exists('country_code', $_SESSION))
					QApplication::$CountryCode = $_SESSION['country_code'];
				if (array_key_exists('language_code', $_SESSION))
					QApplication::$LanguageCode = $_SESSION['language_code'];
			}

			/*
			 * NOTE: This is where you would implement code to do Language Setting discovery, as well, for example:
			 *   Checking against $_GET['language_code']
			 *   checking against session (example provided below)
			 *   Checking the URL
			 *   etc.
			 * Options to do this are left to the developer.
			 */

			// Initialize I18n if QApplication::$LanguageCode is set
			if (QApplication::$LanguageCode)
				QI18n::Initialize();

			// Otherwise, you could optionally run with some defaults
			else {
				// QApplication::$CountryCode = 'us';
				// QApplication::$LanguageCode = 'en';
				// QI18n::Initialize();
			}
		}

		////////////////////////////
		// QApplication Customizations (e.g. EncodingType, Disallowing PHP Session, etc.)
		////////////////////////////
		public static $EncodingType = 'UTF-8';
		// public static $EnableSession = false;
		
		// System Wide Settings Object
		public static $TracmorSettings;
		// User Account Object for logged in user
		public static $objUserAccount;
		// RoleModule object based on the user that is logged in and the module they are accessing
		public static $objRoleModule;

		////////////////////////////
		// Additional Static Methods
		////////////////////////////
		// NOTE: Define any other custom global WebApplication functions (if any) here...

		// Load the Tracmor Settings for global accessibility
		public static function LoadTracmorSettings() {
			
			QApplication::$TracmorSettings = new TracmorSettings();
		}
		
		// Assign the UserAccountId to a session variable
		public static function Login(UserAccount $objUserAccount) {
			// Assign the UserAccountId as a session variable
			// This is the only variable that is assigned as a session variable, all others are stored in QApplication
			$_SESSION['intUserAccountId'] = $objUserAccount->UserAccountId;
		}
		
		// Destroy the user session and redirect the user to the login page
		public static function Logout() {
			unset($_SESSION['intUserAccountId']);
			session_destroy();
			QApplication::Redirect('../login.php');
		}
		
		// Authenticate a certain module based on the module and the Role of the logged in user
		public static function Authenticate($intModuleId = null) {
			
			if (array_key_exists('intUserAccountId', $_SESSION)) {
				$objUserAccount = UserAccount::Load($_SESSION['intUserAccountId']);
				if ($objUserAccount) {
					// Assign the UserAccount object to the globally available QApplication
					QApplication::$objUserAccount = $objUserAccount;
			
					// If they are not in the admin panel
					if ($intModuleId) {
						$objRoleModule = RoleModule::LoadByRoleIdModuleId($objUserAccount->RoleId, $intModuleId);
						// If they do not have access to this module
						if (!$objRoleModule->AccessFlag) {
							QApplication::Redirect('../common/trespass.php');
						}
						// Assign the RoleModule to QApplication
						else {
							QApplication::$objRoleModule = $objRoleModule;
						}
					}
					// ModuleId is null for the admin panel
					// Check if the user is an admin
					elseif (!$objUserAccount->AdminFlag) {
						QApplication::Redirect('../common/trespass.php');
					}
				}
				else {
					QApplication::Redirect('../common/trespass.php');
				}
			}
			else {
				QApplication::Redirect('../login.php');
			}
		}
		
		/**
		 * Authorizes any control to determine if the user has access
		 * If not, it sets the objControl->Visible to false
		 *
		 * @param object $objEntity - any entity with a created_by column (asset, location, etc.)
		 * @param object $objControl - the control which is being evaluated - any QControl where visible is a property
		 * @param integer $intAuthorizationId - the authorization required to see this control (view(1), edit(2), or delete(3))
		 */
		public static function AuthorizeControl($objEntity, $objControl, $intAuthorizationId, $intModuleId = null) {
			
			if ($intModuleId == null) {
				$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, $intAuthorizationId);
			}
			else {
				$objRoleModule = RoleModule::LoadByRoleIdModuleId(QApplication::$objRoleModule->RoleId, $intModuleId);
				$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId($objRoleModule->RoleModuleId, $intAuthorizationId);
			}
			// Added if $objEntity == null for the ship button shortcut on the asset page.
			if ($objRoleModuleAuthorization->AuthorizationLevelId == 1 || ($objRoleModuleAuthorization->AuthorizationLevelId == 2 && $objEntity == null) || ($objRoleModuleAuthorization->AuthorizationLevelId == 2 && $objEntity->CreatedBy == QApplication::$objUserAccount->UserAccountId)) {
				$objControl->Visible = true;
			}
			else {
				$objControl->Visible = false;
			}
		}
		
		/**
		 * Authorizes an entity for viewing or editing. If the user is not authorized to view/create this entity, then they are sent to the trespass page.
		 *
		 * @param object $objEntity
		 * @param bool $blnEditMode
		 */
		public static function AuthorizeEntity($objEntity, $blnEditMode) {
			
			// If it is an existing entity, check that the user has 'View' Authorization
			if ($blnEditMode) {
				$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, 1);
				// If the user doesn't have an 'All' Authorization Level, or an 'Owner' Authorization Level and owns this entity, redirect
				if ($objRoleModuleAuthorization->AuthorizationLevelId != 1 && !($objRoleModuleAuthorization->AuthorizationLevelId == 2 && $objEntity->CreatedBy == QApplication::$objUserAccount->UserAccountId)) {
					QApplication::Redirect('../common/trespass.php');
				}
			}
			// If it is a new entity, check that the user has 'Edit' Authorization
			else {
				$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, 2);
				// The user must have either an 'All' or 'Owner' Authorization Level to create a new entity
				if (!$objRoleModuleAuthorization->AuthorizationLevelId == 1 && !$objRoleModuleAuthorization->AuthorizationLevelId == 2) {
					QApplication::Redirect('../common/trespass.php');
				}
			}
		}
		
		/**
		 * Authorizes an entity for editing and returns a boolean value for error checking purposes
		 * 
		 * @param object $objEntity
		 * @param integer $intAuthorizationId
		 * @return bool $blnAuthorized
		 */
		public static function AuthorizeEntityBoolean($objEntity, $intAuthorizationId) {
			$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, $intAuthorizationId);
			if ($objRoleModuleAuthorization->AuthorizationLevelId != 1 && !($objRoleModuleAuthorization->AuthorizationLevelId == 2 && $objEntity->CreatedBy == QApplication::$objUserAccount->UserAccountId)) {
				$blnAuthorized = false;
			}
			else {
				$blnAuthorized = true;
			}
			
			return $blnAuthorized;
		}
		
		/**
		 * This function returns the SQL necessary for all Load and Count scripts for list pages
		 *
		 * @param string $strEntity 'asset', 'company', e.g., the name of the table
		 */
		public static function AuthorizationSql($strEntity) {
			
			
			// if $objRoleModule is empty, then they are in the administration module so they have access to everything
			if (empty(QApplication::$objRoleModule)) {
				$strToReturn = '';
			}
			else {
				// Load the RoleModuleAuthorization
				$objRoleModuleAuthorization = RoleModuleAuthorization::LoadByRoleModuleIdAuthorizationId(QApplication::$objRoleModule->RoleModuleId, 1);
				if (!$objRoleModuleAuthorization) {
					throw new Exception('No valid RoleModuleAuthorization for this User Role.');
				}
				// Owner - Return only entities where the logged in user is the owner
				elseif ($objRoleModuleAuthorization->AuthorizationLevelId == 2) {
					$strToReturn = sprintf('AND `%s` . `created_by` = %s', $strEntity, QApplication::$objUserAccount->UserAccountId);
				}
				// None - Do not return any entities
				elseif ($objRoleModuleAuthorization->AuthorizationLevelId == 3) {
					$strToReturn = sprintf('AND `%s` . `created_by` = 0', $strEntity);
				}
				// All - Return all entities, so do not limit the query at all
				else {
					$strToReturn = '';
				}
			}
			
			return $strToReturn;
		}
		
		/**
		 * This returns the html for either a check or an x based on the boolean value
		 *
		 * @param bool $blnValue
		 * @return string HTML img tag for the check or the string
		 */
		public static function BooleanImage($blnValue = true) {
					
			if ($blnValue) {
				$strToReturn = sprintf('<img src="%s">', '../images/icons/check.png');
			}
			else {
				$strToReturn = sprintf('<img src="%s">', '../images/icons/x.png');
			}
			
			return $strToReturn;
		}
		
		/**
		* This moves a file from the local filesystem to the S3 file system provided in the tracmor_configuration.inc.php file
		*
		* @param string $strPath should not include trailing slash
		* @param string $strFileName
		* @param string $strType MIME type of the file
		* @param string $strS3Path path to S3 folder (do not include bucket) - '/images/shipping_labels' for example
		* @return bool
		*/
		// strPath and strS3Path should not include trailing slash but this will still work if it doesn't
		// strS3Path should include beginning slash '/images/shipping_labels' for example
		public static function MoveToS3($strPath, $strFileName, $strType, $strS3Path) {
			
			rtrim($strPath, '/');
			rtrim($strS3Path, '/');
			
			if (file_exists($strPath . '/' . $strFileName)) {
				require_once( __DOCROOT__ . __PHP_ASSETS__ . '/s3.class.php');
				$objS3 = new S3();
				$objS3->putBucket(AWS_BUCKET);
				
				$fh = fopen($strPath . '/' . $strFileName, 'rb');
				$contents = fread($fh, filesize($strPath . '/' . $strFileName));
				fclose($fh);
				$objS3->putObject($strFileName, $contents, AWS_BUCKET . $strS3Path, 'public-read', $strType);
				
				unlink($strPath . '/' . $strFileName);
				unset($objS3);
				return true;
			}
			else {
				return false;
			}
		}
	}
?>
