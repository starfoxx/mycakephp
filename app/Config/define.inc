<?php

/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
Configure::write('Acl.database', 'mycakephp');
CakePlugin::load('DebugKit');
define('BASE_PATH', dirname(dirname(dirname(__FILE__))) . DS);
define('PARENT_PATH', dirname(BASE_PATH));
define('APP_PATH', BASE_PATH . 'app' . DS);
define('VENDOR_PATH', APP_PATH . 'Vendor' . DS);
define('MODEL_PATH', APP_PATH . 'Model' . DS);
define('VIEW_PATH', APP_PATH . 'View' . DS);
define('LIB_PATH', APP_PATH . 'Lib' . DS);
define('PLUGIN_PATH', APP_PATH . 'Plugin' . DS);
define('CONFIG_PATH', dirname(__FILE__) . DS);
define('WEBROOT_PATH', getcwd() . DS);
define('LANG_PATH', LIB_PATH . 'lang' . DS);
define('LOG_PATH', APP_PATH . 'tmp' . DS . 'logs' . DS);
define('DIR_NAME', basename(BASE_PATH));
set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH.'/google-api/src');
App::uses('AppError', 'Lib');
App::uses('GlobalVar', 'Lib');
//Configure::write('debug', 1handleE);
//ChromePhp::error('123');


if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('SYSTEM_EVIRONMENT', 'localhost');
} else if (strrpos($_SERVER['HTTP_HOST'], "test") !== false || strrpos($_SERVER['HTTP_HOST'], "dev") !== false){
    define('SYSTEM_EVIRONMENT', 'development'); // x10
} else {
    define('SYSTEM_EVIRONMENT', 'production');
}

function is_localhost() {
    return SYSTEM_EVIRONMENT == 'localhost';
}

function is_development() {
    return SYSTEM_EVIRONMENT == 'development';
}

function is_production() {
    return SYSTEM_EVIRONMENT == 'production';
}

if (is_localhost()) {
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'mycakephp');
    define('DB_PASSWORD', '123456a@');
    define('DB_NAME', 'mycakephp');
    define('DB_PREFIX', '');
} else if (is_development()) {
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'dev');
    define('DB_PASSWORD', '123456a@');
    define('DB_NAME', 'dev');
    define('DB_PREFIX', 'tuyennq');
} else if (is_production()) {
    
}