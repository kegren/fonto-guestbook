<?php
/**
 * Part of Fonto Framework
 *
 * Creates a new application
 */

if (!isset($_SESSION)) {
	session_start();
}


/**
 * Include files
 */
include APPPATH . 'helpers' . EXT;
include SYSCOREPATH . 'Application' . EXT;

/**
 * Namespace alias
 */
use Fonto\Core\Application as App;

/**
 * Run application
 */
$app = new App();
$app->loadActiveRecord();
$app->run();