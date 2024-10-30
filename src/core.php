<?php
/**
 * User:
 * @package IO_Plus/Core
 */

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Class Core of Plugin.
 *
 * @since  1.0.0
 */
class Core
{

    /**
     * Instance. Holds the plugin instance.
     *
     * @since  1.0.0
     * @access public
     * @static
     * @var $instance
     */
    public static $instance = null;

    public $fn = null;

    /**
     * Instance.
     *
     * @return Core|null
     * @throws \Exception Exception.
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();

            /**
             * IO-PLUS loaded.
             *
             * @since 1.0.0
             */
            do_action('io_plus_loaded');
        }

        return self::$instance;
    }

    /**
     * Constructor loads API functions, defines paths and adds required wp actions
     *
     * @throws \Exception Exception.
     * @since  1.0
     */
    private function __construct()
    {

        // Include autoloader.php.
        require dirname(__FILE__) . '/autoloader.php';

        /*
         * Register autoloader and add namespaces
         *
         */
        $this->register_autoloader();

        /**
         * Init components.
         */
        $this->init_components();

        // Load translations.
        add_action('after_setup_theme', array($this, 'load_translations'));

    }


    /**
     * Register autoloader.
     *
     * @throws \Exception Exception.
     * @since  1.0.0
     * @access private
     */
    private function register_autoloader()
    {

        // Get the autoloader.
        $loader = new Autoloader();

        // Register the autoloader.
        $loader->register();

        // Register the base directories for the namespace prefix.
        $loader->add_namespace('IO_Plus', IO_PLUS_PATH . 'src');

    }

    /**
     * Init IO-PLUS components.
     *
     * @since  1.0.0
     * @access private
     */
    public function init_components()
    {


        // Admin
        $admin = new Admin();
        $admin->init();

        // Ajax
        $ajax = new Ajax();
        $ajax->init();

        // Ajax
        $auth = new Auth();
        $auth->init();

        // Business
        $company = new Business();
        $company->init();

        // Enqueue all scripts and styles.
        $enqueue = new Enqueue();
        $enqueue->init();

        // Shortcodes
        $shortcodes = new Shortcodes();
        $shortcodes->init();

        // Employee
        $employee = new Employee();
        $employee->init();

        // Visitors
        $visitor = new Visitor();
        $visitor->init();

		// Questions
        $questions = new Questions();
        $questions->init();


        /**
         * IO-PLUS init.
         *
         * @since 1.0.0
         */
        do_action('io_plus_init');
    }

    /**
     * Load plugin translations
     *
     * @return void
     */
    public static function load_translations()
    {
        load_plugin_textdomain('io-plus', false, plugin_basename(dirname(__FILE__)) . '/languages');
    }


}

Core::instance();
