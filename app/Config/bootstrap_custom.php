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
define('BASE_PATH', dirname(dirname(dirname(__FILE__))) . '/');
define('PARENT_PATH', dirname(BASE_PATH));
define('APP_PATH', BASE_PATH . 'app/');
define('VENDOR_PATH', APP_PATH . 'Vendor/');
define('MODEL_PATH', APP_PATH . 'Model/');
define('VIEW_PATH', APP_PATH . 'View/');
define('LIB_PATH', APP_PATH . 'Lib/');
define('PLUGIN_PATH', APP_PATH . 'Plugin/');
define('CONFIG_PATH', dirname(__FILE__) . '/');
define('WEBROOT_PATH', getcwd() . '/');
define('LANG_PATH', LIB_PATH . 'lang/');
define('LOG_PATH', APP_PATH . 'tmp/logs/');
define('DIR_NAME', basename(BASE_PATH));
App::uses('AppError', 'Lib');
//Configure::write('debug', 1handleE);
//ChromePhp::error('123');

