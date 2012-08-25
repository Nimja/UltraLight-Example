<?php

/**
 * Core and App path, where config.php and core.php are situated. All paths need trailing /'s
 */
define('PATH_BASE', realpath(dirname(__FILE__)) . '/');
define('PATH_CORE', realpath(PATH_BASE . '../..') . '/core2/');
define('PATH_APP', PATH_BASE . 'application/');
require_once PATH_CORE . 'core.php';

/**
 * Application specific configuration, overriding the general one.
 */
$GLOBALS['config']['table_prefix'] = 'example_';
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
 * All paths must have a trailing /
 * These paths will always be absolute. 
 * If you want/need a different path structure, it can be changed here. 
 * Specific per app, basically.
 */
define('PATH_ASSETS', PATH_BASE . 'assets/');
define('PATH_CACHE', PATH_BASE . 'cache/');
define('PATH_LOGS', PATH_APP . 'logs/');

/**
 * If debug is enabled, we show PHP errors, otherwise we do not.
 */
ini_set('display_errors', 1);

/**
 * Initialize the loading and load the controller.
 */
Core::start();