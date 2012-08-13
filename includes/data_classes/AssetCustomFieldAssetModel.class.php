<?php
	require(__DATAGEN_CLASSES__ . '/AssetCustomFieldAssetModelGen.class.php');

	/**
	 * The AssetCustomFieldAssetModel class defined here contains any
	 * customized code for the AssetCustomFieldAssetModel class in the
	 * Object Relational Model.  It represents the "asset_custom_field_asset_model" table 
	 * in the database, and extends from the code generated abstract AssetCustomFieldAssetModelGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class AssetCustomFieldAssetModel extends AssetCustomFieldAssetModelGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAssetCustomFieldAssetModel->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('AssetCustomFieldAssetModel Object %s',  $this->intAssetCustomFieldAssetModelId);
		}

	public function deleteAllByCustomField($intCustomFieldId){
		// Get the Database Object for this Class
		$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

		// Perform the Query
		$objDatabase->NonQuery('
				DELETE FROM
					`asset_custom_field_asset_model` WHERE `custom_field_id` = '
			         . $objDatabase->SqlVariable($intCustomFieldId));
	}
    // Returns row if specific field assigned for current asset model
	public static function isCustomFieldForAssetModel($intCustomFieldId, $intAssetModelId, $objOptionalClauses = null) {
		// This will return a count of AssetCustomFieldAssetModel objects
		return AssetCustomFieldAssetModel::QueryCount(
			QQ::AndCondition(
				QQ::Equal(QQN::AssetCustomFieldAssetModel()->CustomFieldId, $intCustomFieldId),
				QQ::Equal(QQN::AssetCustomFieldAssetModel()->AssetModelId, $intAssetModelId)
			),
			$objOptionalClauses
		);
	}


		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of AssetCustomFieldAssetModel objects
			return AssetCustomFieldAssetModel::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::AssetCustomFieldAssetModel()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AssetCustomFieldAssetModel()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single AssetCustomFieldAssetModel object
			return AssetCustomFieldAssetModel::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AssetCustomFieldAssetModel()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AssetCustomFieldAssetModel()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of AssetCustomFieldAssetModel objects
			return AssetCustomFieldAssetModel::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::AssetCustomFieldAssetModel()->Param1, $strParam1),
					QQ::Equal(QQN::AssetCustomFieldAssetModel()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = AssetCustomFieldAssetModel::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`asset_custom_field_asset_model`.*
				FROM
					`asset_custom_field_asset_model` AS `asset_custom_field_asset_model`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return AssetCustomFieldAssetModel::InstantiateDbResult($objDbResult);
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