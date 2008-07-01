<?php
	require(__DATAGEN_CLASSES__ . '/AuditScanGen.class.php');

	/**
	 * The AuditScan class defined here contains any
	 * customized code for the AuditScan class in the
	 * Object Relational Model.  It represents the "audit_scan" table 
	 * in the database, and extends from the code generated abstract AuditScanGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class AuditScan extends AuditScanGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAuditScan->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('AuditScan Object %s',  $this->intAuditScanId);
		}



		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of AuditScan objects
			return AuditScan::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::AuditScan()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AuditScan()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single AuditScan object
			return AuditScan::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AuditScan()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AuditScan()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of AuditScan objects
			return AuditScan::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::AuditScan()->Param1, $strParam1),
					QQ::Equal(QQN::AuditScan()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = AuditScan::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`audit_scan`.*
				FROM
					`audit_scan` AS `audit_scan`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return AuditScan::InstantiateDbResult($objDbResult);
		}
*/

		static public function AuditScanExt() {
			return new QQNodeAuditScanExt('audit_scan', null);
		}

		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.

		protected $objAsset;
		//protected $intSystemCount;

		public function __get($strName) {
			switch ($strName) {
				/*case 'SystemCount': return $this->intSystemCount;
					break;
					*/
				case 'Asset': return $this->objAsset;
					break;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
		public function __set($strName, $mixValue) {
			switch ($strName) {
				
				/*case 'SystemCount':
					/**
					 * Sets the value for intCount 
					 * @param integer $mixValue
					 * @return integer
					 */
				/*	try {
						return ($this->intSystemCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}*/
					
				case 'Asset':
					/**
					 * Sets the value for the Location object referenced by intLocationId (Not Null)
					 * @param Location $mixValue
					 * @return Location
					 */
					if (is_null($mixValue)) {
						$this->intEntityId = null;
						$this->objEntity = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Location object
						try {
							$mixValue = QType::Cast($mixValue, 'Asset');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Entity object
						if (is_null($mixValue->AssetId))
							throw new QCallerException('Unable to set an unsaved entity_id for this AuditScan');

						// Update Local Member Variables
						$this->objAsset = $mixValue;
						$this->intEntityId = $mixValue->AssetId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	class QQNodeAuditScanExt extends QQNodeAuditScan {
		
		public function __get($strName) {
			switch ($strName) {
				case 'Asset':
					return new QQNodeAsset('entity_id', 'integer', $this);
				/*case 'Inventory':
					return new QQNodeInventory('entity_id', 'integer', $this);
*/
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