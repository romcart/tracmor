<?php
	require(__DATAGEN_CLASSES__ . '/AssetTransactionCheckoutGen.class.php');

	/**
	 * The AssetTransactionCheckout class defined here contains any
	 * customized code for the AssetTransactionCheckout class in the
	 * Object Relational Model.  It represents the "asset_transaction_checkout" table
	 * in the database, and extends from the code generated abstract AssetTransactionCheckoutGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My Application
	 * @subpackage DataObjects
	 *
	 */
	class AssetTransactionCheckout extends AssetTransactionCheckoutGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAssetTransactionCheckout->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('AssetTransactionCheckout Object %s',  $this->intAssetTransactionCheckoutId);
		}

    // This adds the created by and creation date before saving a new AssetTransactionCheckout
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			if ((!$this->__blnRestored) || ($blnForceInsert)) {
				$this->CreatedBy = QApplication::$objUserAccount->UserAccountId;
				$this->CreationDate = new QDateTime(QDateTime::Now);
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
			else {
				$this->ModifiedBy = QApplication::$objUserAccount->UserAccountId;
				parent::Save($blnForceInsert, $blnForceUpdate);
			}
		}

		/**
		 * Load a single AssetTransactionCheckout object,
		 * by AssetId
		 * @param integer $intAssetId
		 * @return object $objAssetTransactionCheckout
		*/
		public function LoadAssetTransactionCheckoutByAssetId($intAssetId = null) {
		  // Loads objAssetTransaction
			$objClauses = array();
			$objOrderByClause = QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate, false);
  		$objLimitClause = QQ::LimitInfo(1, 0);
  		array_push($objClauses, $objOrderByClause);
  		array_push($objClauses, $objLimitClause);
  		$AssetTransactionArray = AssetTransaction::LoadArrayByAssetId($this->AssetId, $objClauses);
  		$intLastTransactionId = $AssetTransactionArray[0]->Transaction->TransactionId;
  		$objAssetTransactionCheckout = AssetTransactionCheckout::LoadByTransactionId($intLastTransactionId);

  		return $objAssetTransactionCheckout;
		}

		/**
		 * Load a single AssetTransactionCheckout object with expansion map of Contact and UserAccount,
		 * by TransactionId
		 * @param integer $intAssetId
		 * @return object $objAssetTransactionCheckout
		*/
		public function LoadWithToContactToUserByTransactionId($intTransactionId = null) {
		  $objClauses = array();
  		array_push($objClauses, QQ::Expand(QQN::AssetTransactionCheckout()->ToContact));
  		array_push($objClauses, QQ::Expand(QQN::AssetTransactionCheckout()->ToUser));
  		$objAssetTransactionCheckout = AssetTransactionCheckout::QuerySingle(QQ::Equal(QQN::AssetTransactionCheckout()->TransactionId, $intTransactionId), $objClauses);

  		return $objAssetTransactionCheckout;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of AssetTransactionCheckout objects
			return AssetTransactionCheckout::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::AssetTransactionCheckout()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AssetTransactionCheckout()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single AssetTransactionCheckout object
			return AssetTransactionCheckout::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AssetTransactionCheckout()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AssetTransactionCheckout()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of AssetTransactionCheckout objects
			return AssetTransactionCheckout::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::AssetTransactionCheckout()->Param1, $strParam1),
					QQ::Equal(QQN::AssetTransactionCheckout()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = AssetTransactionCheckout::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`asset_transaction_checkout`.*
				FROM
					`asset_transaction_checkout` AS `asset_transaction_checkout`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetTransactionCheckout::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

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
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>