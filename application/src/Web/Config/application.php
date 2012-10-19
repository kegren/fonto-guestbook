<?php
/**
 * Part of Fonto Framework
 *
 * Application settings
 */

 return array(
 	/**
 	 * Default timezone
 	 */
 	'timezone' => 'Europe/Stockholm',

 	/**
 	 * Database settings
 	 */
 	'database' => array(
 		'type' => 'mysql',
 		'host' => 'localhost',
 		'user' => 'root',
 		'pass' => '',
 		'name' => '105992-skola'
 	),

 	/**
 	 * Application environment, development enables error_reporting(-1)
 	 */
 	'environment' => 'production',
 );