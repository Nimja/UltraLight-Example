<?php

/**
 * Core path, where config.php and load.php are situated. All paths need trailing /'s
 */
define('PATH_CORE', realpath(dirname(__FILE__) . '/../..') . '/core/');
require(PATH_CORE . 'base/config.php');
require(PATH_CORE . 'base/load.php');

/**
 * Application specific configuration, overriding the general one.
 */
$GLOBALS['config']['table_prefix'] = 'ul_';
$GLOBALS['config']['database'] = 'dev';
$GLOBALS['config']['routes'] = array(
	'source' => 'tools/source',
	#Catch-all route, for pages that cannot be found.
	'*' => 'index',
);

/**
 * Override default server headers to avoid version/OS-specific exploits if your host is slow with updating.
 * Disabling will have no effect on performance, but will change headers.
 */
header('Server: UltraLight');
header('X-Powered-By: Nimja');

/**
 * 
 * 
 * All paths must have a trailing /
 * These paths will always be absolute. 
 * If you want/need a different path structure, it can be changed here. 
 * Specific per app, basically.
 */
define('PATH_BASE', realpath(dirname(__FILE__)) . '/');

define('PATH_APP', PATH_BASE . 'application/');
define('PATH_ASSETS', PATH_BASE . 'assets/');
define('PATH_CACHE', PATH_BASE . 'cache/');

define('PATH_CONTROLLERS', PATH_APP . 'controllers/');
define('PATH_VIEWS', PATH_APP . 'views/');
define('PATH_LOGS', PATH_APP . 'logs/');

/**
 * Check loading has happened properly.
 */
if (empty($GLOBALS['config']) || !class_exists('Load'))
	show_exit('Basic files missing in ' . PATH_CORE . ', did you install everything?');

/**
 * Failsafe for debug variable.
 */
if (!defined('DEBUG'))
	define('DEBUG', FALSE);

/**
 * If debug is enabled, we show PHP errors, otherwise we do not.
 */
ini_set('display_errors', 1);

/**
 * Initialize the loading and load the controller.
 */
Load::init();

/**
 * Create the page.
 */
$page = new Page();