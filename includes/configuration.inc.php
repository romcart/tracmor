<?php
	// This is the "recommended" version of configuration.inc.php, without any comments, and restructured in a way
	// that should make sense for most pro-users of Qcodo.

	// While it is recommended (for ease of code readability) to use this version of configuration.inc.php-dist,
	// the configuration.inc.php-full version could potentially be more useful for newer users of Qcodo as it has
	// comments inline within the file.

	// To use, simply rename or copy this file to includes/configuration.inc.php, and begin making modifications
	// to the configuration constants as it makes sense for your PHP and docroot installation.

	define('SERVER_INSTANCE', 'dev');

	switch (SERVER_INSTANCE) {
		case 'dev':
		case 'test':
		case 'stage':
		case 'prod':
			define ('__DOCROOT__', '/var/www/tracmor');
			define ('__VIRTUAL_DIRECTORY__', '');
			define ('__SUBDIRECTORY__', '');

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => 'localhost',
				'port' => null,
				'database' => 'tracmor',
				'username' => '',
				'password' => '',
				'profiling' => false,
				'encoding' => 'utf8')));
			break;

	}

	define('ALLOW_REMOTE_ADMIN', false);
	define ('__URL_REWRITE__', 'none');

	define ('__DEVTOOLS_CLI__', __DOCROOT__ . __SUBDIRECTORY__ . '/cli');
	define ('__INCLUDES__', __DOCROOT__ .  __SUBDIRECTORY__ . '/includes');
	define ('__QCODO__', __INCLUDES__ . '/qcodo');
	define ('__QCODO_CORE__', __INCLUDES__ . '/qcodo/_core');
	define ('__DATA_CLASSES__', __INCLUDES__ . '/data_classes');
	define ('__DATAGEN_CLASSES__', __INCLUDES__ . '/data_classes/generated');
	define ('__DATA_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls');
	define ('__DATAGEN_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls/generated');
	
	// Added during upgrade to 0.4.14
	define ('__FORMBASE_CLASSES__', __INCLUDES__ . '/formbase_classes');
	define ('__PANELBASE_CLASSES__', __INCLUDES__ . '/panelbase_classes');

	define ('__FORM_DRAFTS__', __SUBDIRECTORY__ . '/drafts');
	define ('__PANEL_DRAFTS__', __SUBDIRECTORY__ . '/drafts/dashboard');

	// Examples and Devtools are deprecated as of 0.4.0, but these constants are still here to
	// support any QPM packages that may still want to use them
	define ('__DEVTOOLS__', null);
	define ('__EXAMPLES__', null);

	define ('__JS_ASSETS__', __SUBDIRECTORY__ . '/js');
	define ('__CSS_ASSETS__', __SUBDIRECTORY__ . '/css');
	define ('__IMAGE_ASSETS__', __SUBDIRECTORY__ . '/images');
	define ('__IMAGE_CACHE__', __IMAGE_ASSETS__ . '/cache');
	define ('__PHP_ASSETS__', __SUBDIRECTORY__ . '/includes/php');

	if ((function_exists('date_default_timezone_set')) && (!ini_get('date.timezone')))
		date_default_timezone_set('America/Los_Angeles');

	define('ERROR_LOG_PATH', null);
	define('ERROR_LOG_FLAG', false);
	//define('ERROR_FRIENDLY_PAGE_PATH', '/absolute/path/to/friendly_error_page.html');
	//define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Oops!  An error has occurred.\r\n\r\nThe error was logged, and we will take a look into this right away.');

	// It is highly recommended to change this to false if all your servers are running PHP 5.3 or above.
	// See http://www.openwall.com/phpass/ for more information.
	define('PORTABLE_PASSWORDS', true);

	// If using Amazon S3 for storage, change AWS_S3 to true and enter AWS info.
	DEFINE('AWS_S3', false);
	DEFINE('AWS_ACCESS_KEY', '');
	DEFINE('AWS_SECRET_KEY', '');
	DEFINE('AWS_BUCKET', '');	// S3 Bucket to store Tracmor files. Example: MyBucket
	DEFINE('AWS_PATH', ''); 	// Path in AWS_BUCKET to store Tracmor files, including leading slash. Example: /tracmor/files
	
	// Location of tmp directory
	DEFINE('__TRACMOR_TMP__', __DOCROOT__ . __SUBDIRECTORY__ . '/tmp');

	// SMTP configuration
	define('SMTP_SERVER', '');
	define('SMTP_PORT', 587);
	define('SMTP_USERNAME', '');
	define('SMTP_PASSWORD', '');

	// Email settings
	define('EMAIL_FROM_ADDRESS', '');
	define('EMAIL_SIGNATURE', '');

	// Terms of Service and Privacy Policy URLs
	define('TOS_URL', '');
	define('PRIVACY_URL', '');
?>
