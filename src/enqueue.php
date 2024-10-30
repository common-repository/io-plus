<?php
/**
 *
 * @package IO-PLUS/Enqueue
 */

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Enqueue scripts and styles.
 *
 * @since  1.0.0
 */
class Enqueue
{


    /**
     * Path of plugin.
     *
     * @var $data_path
     */
    private $data_path;

    /**
     * Url of plugin.
     *
     * @var $data_url
     */
    private $data_url;

    /**
     * Enqueue constructor.
     *
     * @since  1.0.0
     * @access public
     */
    public function __construct()
    {
        $this->data_path = IO_PLUS_PATH . 'data/';
        //$this->data_url  = IO_PLUS_URL . 'data/';
        $this->data_url = IO_PLUS_URL;
    }

    /**
     * Run all hooks.
     */
    public function init()
    {


        //Clear CSS
        if (iop_is_main_page() == true or iop_is_business_page_start() == true) {
            // Enqueue css and js files on frond-end.
            add_action('wp_enqueue_scripts', array($this, 'enqueue_css_js'));


            add_action('wp_print_styles', array(&$this, 'remove_all_styles'), 100);
            add_filter('show_admin_bar', '__return_false');
            //Add Theme
            add_filter('theme_page_templates', array(&$this, 'add_page_template_to_dropdown'));
            add_filter('template_include', array(&$this, 'change_page_template'), 99);
        }


        // Enqueue css and js files on back-end.
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_css_js'));


    }

    /**
     * Enqueue CSS an JS
     *
     * @return void
     */
    public function enqueue_css_js()
    {

        $options = iop_options();

        /**
         * IO-PLUS enqueue.
         *
         * @since 1.0.0
         */
        do_action('io_plus_before_enqueue');

        wp_enqueue_style(
            'io-plus-font-awesome',
            $this->data_url . 'assets/css/font-awesome.min.css', // font icon awesome
            null,
            IO_PLUS_VERSION // filemtime — Gets file modification time.
        );


        wp_enqueue_style(
            'io-plus-font-inter',
            $this->data_url . 'assets/css/fonts/inter/stylesheet.css', // font icon inter
            null,
            IO_PLUS_VERSION // filemtime — Gets file modification time.
        );

        wp_enqueue_style(
            'io-plus-flatpickr',
            $this->data_url . 'assets/css/flatpickr.css',
            null,
            IO_PLUS_VERSION // filemtime — Gets file modification time.
        );
        wp_enqueue_style(
            'io-plus-swiper',
            $this->data_url . 'assets/css/swiper.min.css',
            null,
            IO_PLUS_VERSION // filemtime — Gets file modification time.
        );


        wp_enqueue_style(
            'io-plus-css',
            $this->data_url . 'assets/css/style.css', // register the block here.
            null,
            IO_PLUS_VERSION // filemtime — Gets file modification time.
        );

        //Google Button
        //https://apis.google.com/js/platform.js?onload=renderButton
        wp_enqueue_script(
            'io-plus-js-google-platform',
            $this->data_url . 'assets/js/platform.js?onload=renderButton', // Google.
            array(
                'io-plus-js-script',
            ),
            IO_PLUS_VERSION,
            true
        );


        if ( ! empty( $options['api_key'] ) ) {
	        wp_enqueue_script(
		        'io-plus-googlemaps',
		        'https://maps.googleapis.com/maps/api/js?key=' . get_var( $options['api_key'] ) . '&libraries=places&v=weekly', // Google.
		        array(
			        'io-plus-js-script',
		        ),
		        IO_PLUS_VERSION,
		        true
	        );
        }

        wp_enqueue_script(
            'io-plus-qrcode',
            $this->data_url . 'assets/js/jquery.qrcode.min.js', // all scripts.
            array(
                'jquery',
            ),
            IO_PLUS_VERSION,
            true
        );
        wp_enqueue_script(
            'io-plus-custom',
            $this->data_url . 'assets/js/custom.js', // all scripts.
            array(
                'io-plus-qrcode',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_enqueue_script(
            'io-plus-swiper',
            $this->data_url . 'assets/js/swiper.min.js', // all scripts.
            array(
                'jquery',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_enqueue_script(
            'io-plus-client',
            $this->data_url . 'assets/js/client.min.js', // client id
            array(
                'jquery',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_enqueue_script(
            'io-plus-flatpickr',
            $this->data_url . 'assets/js/flatpickr.js',
            array(
                'io-plus-client',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_enqueue_script(
            'smooth-scrollbar',
            $this->data_url . 'assets/js/smooth-scrollbar.min.js', // all scripts.
            array(
                'io-plus-flatpickr',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_enqueue_script(
            'overscroll',
            $this->data_url . 'assets/js/overscroll.min.js', // all scripts.
            array(
                'io-plus-flatpickr',
                'smooth-scrollbar',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_enqueue_script(
            'io-plus-js-script',
            $this->data_url . 'assets/js/script.js', // all scripts.
            array(
                'io-plus-flatpickr',
            ),
            IO_PLUS_VERSION,
            true
        );

        wp_localize_script('io-plus-js-script', 'io_plus_object', array(
	        'ajaxurl'    => admin_url( 'admin-ajax.php' ),
	        'nonce'      => wp_create_nonce( 'iop-ajax-nonce' ),
	        'api_key'    => get_var( $options['api_key'] ),
	        'redirect'   => home_url(),
	        'plagin_url' => IO_PLUS_URL,
        ));


        /**
         * IO-PLUS enqueue.
         *
         * @since 1.0.0
         */
        do_action('io_plus_after_enqueue');

    }

    /**
     * Admin enqueue scripts.
     */
    public function admin_enqueue_css_js()
    {

        /**
         * IO-PLUS enqueue.
         *
         * @since 1.0.0
         */
        do_action('io_plus_before_admin_enqueue');


        /**
         * IO-PLUS enqueue.
         *
         * @since 1.0.0
         */
        do_action('io_plus_after_admin_enqueue');


        wp_enqueue_style('io-plus', $this->data_url . 'assets/css/admin.css');

        wp_enqueue_script(
            'io-plus-client',
            $this->data_url . 'assets/js/admin.js', //
            array(
                'jquery',
            ),
            IO_PLUS_VERSION,
            true
        );

    }


    public function remove_all_styles()
    {


        $allowed_css = array(
            'io-plus',
            'io-plus-font-awesome',
            'io-plus-font-poppins',
            'io-plus-font-inter',
            'io-plus-flatpickr',
            'io-plus-swiper',
            'io-plus-css'
        );
        global $wp_styles;
        //$wp_styles->queue = array();
        foreach ($wp_styles->queue as $key => $css) {
            if (array_search($css, $allowed_css) === false) {
                unset($wp_styles->queue[$key]);
            }
        }

    }

    /* Add page templates.
    *
    * @param  array  $templates  The list of page templates
    *
    * @return array  $templates  The modified list of page templates
    */
    public function add_page_template_to_dropdown($templates)
    {
        $path = IO_PLUS_PATH . 'templates/themes/io-plus.php';
        $templates[$path] = __('IO Plus', 'io-plus');

        return $templates;
    }

    public function change_page_template($template)
    {

        if (is_page()) {
            $meta = get_post_meta(get_the_ID());

            if (!empty($meta['_wp_page_template'][0]) && $meta['_wp_page_template'][0] != $template) {
                $template = $meta['_wp_page_template'][0];
            }

            //Fix
            $template = IO_PLUS_PATH . 'templates/themes/io-plus.php';
        }

        return $template;
    }

}
