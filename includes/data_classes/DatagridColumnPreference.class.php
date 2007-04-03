<?php
	require(__DATAGEN_CLASSES__ . '/DatagridColumnPreferenceGen.class.php');

	/**
	 * The DatagridColumnPreference class defined here contains any
	 * customized code for the DatagridColumnPreference class in the
	 * Object Relational Model.  It represents the "datagrid_column_preference" table 
	 * in the database, and extends from the code generated abstract DatagridColumnPreferenceGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class DatagridColumnPreference extends DatagridColumnPreferenceGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objDatagridColumnPreference->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('DatagridColumnPreference Object %s',  $this->intDatagridColumnPreferenceId);
		}
		
		/**
		 * Load a single DatagridColumnPreference object,
		 * by DatagridId, DatagridColumnId, UserAccountId Index(es)
		 * @param integer $intDatagridId
		 * @param integer $intDatagridColumnId
		 * @param integer $intUserAccountId
		 * @return DatagridColumnPreference
		*/
		public static function LoadByDatagridShortDescriptionColumnNameUserAccountId($strDatagridShortDescription, $strColumnName, $intUserAccountId) {
			$objDatagrid = Datagrid::LoadByShortDescription($strDatagridShortDescription);
			if ($objDatagrid) {
				return DatagridColumnPreference::LoadByDatagridIdColumnNameUserAccountId($objDatagrid->DatagridId, $strColumnName, $intUserAccountId);
			}
			else {
				throw new Exception(sprintf('The datagrid %s is not represented in the datagrid table in the database', $strDatagridShortDescription));
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of DatagridColumnPreference objects
			return DatagridColumnPreference::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DatagridColumnPreference()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DatagridColumnPreference()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single DatagridColumnPreference object
			return DatagridColumnPreference::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DatagridColumnPreference()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DatagridColumnPreference()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of DatagridColumnPreference objects
			return DatagridColumnPreference::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DatagridColumnPreference()->Param1, $strParam1),
					QQ::Equal(QQN::DatagridColumnPreference()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = DatagridColumnPreference::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`datagrid_column_preference`.*
				FROM
					`datagrid_column_preference` AS `datagrid_column_preference`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return DatagridColumnPreference::InstantiateDbResult($objDbResult);
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