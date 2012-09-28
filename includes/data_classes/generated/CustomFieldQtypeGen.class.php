<?php
	/**
	 * The CustomFieldQtype class defined here contains
	 * code for the CustomFieldQtype enumerated type.  It represents
	 * the enumerated values found in the "custom_field_qtype" table
	 * in the database.
	 * 
	 * To use, you should use the CustomFieldQtype subclass which
	 * extends this CustomFieldQtypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CustomFieldQtype class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class CustomFieldQtypeGen extends QBaseClass {
		const text = 1;
		const select = 2;
		const textarea = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'text',
			2 => 'select',
			3 => 'text area');

		public static $TokenArray = array(
			1 => 'text',
			2 => 'select',
			3 => 'textarea');

		public static function ToString($intCustomFieldQtypeId) {
			switch ($intCustomFieldQtypeId) {
				case 1: return 'text';
				case 2: return 'select';
				case 3: return 'text area';
				default:
					throw new QCallerException(sprintf('Invalid intCustomFieldQtypeId: %s', $intCustomFieldQtypeId));
			}
		}

		public static function ToToken($intCustomFieldQtypeId) {
			switch ($intCustomFieldQtypeId) {
				case 1: return 'text';
				case 2: return 'select';
				case 3: return 'textarea';
				default:
					throw new QCallerException(sprintf('Invalid intCustomFieldQtypeId: %s', $intCustomFieldQtypeId));
			}
		}

	}
?>