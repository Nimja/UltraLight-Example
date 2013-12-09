<?php
/**
 * Core and App path, where config.php and core.php are situated. All paths need trailing /'s
 */
define('PATH_BASE', realpath(dirname(__FILE__)) . '/');
define('PATH_CORE', realpath(PATH_BASE . '/../../..') . '/core4/');
define('PATH_APP', PATH_BASE . 'application/');
/**
 * These are the basic application specific paths.
 */
define('PATH_ASSETS', PATH_BASE . 'assets/');
define('PATH_CACHE', PATH_BASE . 'cache/');
/**
 * Require the core file.
 */
require_once PATH_CORE . 'core.php';
/**
 * Start the application.
 */
Core::start();