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
  		$intLastAssetTransactionId = $AssetTransactionArray[0]->AssetTransactionId;
  		$objAssetTransactionCheckout = AssetTransactionCheckout::LoadByAssetTransactionId($intAssetLastTransactionId);

  		return $objAssetTransactionCheckout;
		}

		/**
		 * Load a single AssetTransactionCheckout object with expansion map of Contact and UserAccount,
		 * by TransactionId
		 * @param integer $intAssetId
		 * @return object $objAssetTransactionCheckout
		*/
		public function LoadWithToContactToUserByTransactionId($intAssetTransactionId = null) {
		  $objClauses = array();
  		array_push($objClauses, QQ::Expand(QQN::AssetTransactionCheckout()->ToContact));
  		array_push($objClauses, QQ::Expand(QQN::AssetTransactionCheckout()->ToUser));
  		$objAssetTransactionCheckout = AssetTransactionCheckout::QuerySingle(QQ::Equal(QQN::AssetTransactionCheckout()->AssetTransactionId, $intAssetTransactionId), $objClauses);

  		return $objAssetTransactionCheckout;
		}
	}
?>