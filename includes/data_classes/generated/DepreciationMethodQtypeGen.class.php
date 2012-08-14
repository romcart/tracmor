<?php
	/**
	 * The DepreciationMethodQtype class defined here contains
	 * code for the DepreciationMethodQtype enumerated type.  It represents
	 * the enumerated values found in the "depreciation_method_qtype" table
	 * in the database.
	 * 
	 * To use, you should use the DepreciationMethodQtype subclass which
	 * extends this DepreciationMethodQtypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DepreciationMethodQtype class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class DepreciationMethodQtypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intDepreciationMethodQtypeId) {
			switch ($intDepreciationMethodQtypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intDepreciationMethodQtypeId: %s', $intDepreciationMethodQtypeId));
			}
		}

		public static function ToToken($intDepreciationMethodQtypeId) {
			switch ($intDepreciationMethodQtypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intDepreciationMethodQtypeId: %s', $intDepreciationMethodQtypeId));
			}
		}

	}
?>