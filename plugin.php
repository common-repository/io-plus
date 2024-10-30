<?php
/**
 * Plugin Name: IO Plus
 * Plugin URI: https://ioplus.org/
 * Description: IoPlus is a contact tracing solution for retail, restaurants, not for profit companies, and corporations.
 * Author: Wael Hassan
 * Author URI: http://waelhassan.com
 * Version: 1.0.0
 * Text Domain: io-plus
 *
 * @package IO_PLUS
 */

// If this file is accessed directory, then abort.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


define('IO_PLUS_VERSION', '1.0.1');
define('IO_PLUS_PATH', dirname(__FILE__) . '/');
define('IO_PLUS_URL', plugin_dir_url(__FILE__));
define('IO_PLUS_SLUG', 'io_plus');
define('IO_PLUS_DOMAIN', 'io-plus');
define('IO_PLUS_SLUG_OPTIONS', 'io_plus_options');



include_once(ABSPATH . 'wp-admin/includes/plugin.php');

/*
 * Include libraries
 */
include_once 'vendor/autoload.php';

/*
 * Include core of plugin
 */
require IO_PLUS_PATH . 'src/functions.php';
if (!class_exists('IO_Plus\\Core')) {
    require IO_PLUS_PATH . 'src/core.php';
}





