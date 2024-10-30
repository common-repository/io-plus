<?php

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Admin
{


    /**
     * Constructor
     *
     * @since  1.0.0
     */
    function __construct()
    {


    }

    /**
     * Init.
     */
    public function init()
    {


        add_action( 'admin_menu', array( $this, 'admin_menu' ), 5 );
	    add_action( 'admin_init', array( $this, 'settings_init' ) );


    }

    public function admin_menu()
    {

        add_menu_page(
            esc_html__('IO Plus', 'io-plus'),
            esc_html__('IO Plus', 'io-plus'),
            'manage_options',
            'io_plus',
            array(
                $this,
                'settings_page'
            ),
            null,
            6

        );


    }

    public function settings_page()
    {
        //******************************
        //Activate Plugin
        $api = new Query;
        $api->activate();
        //******************************

        $options = iop_options();
        $business_type = get_var($options['business_type']);
        if (empty($business_type) and empty($_GET['business_type'])) {
            inc_template('admin/start');
        } else {
            inc_template('admin/settings');
        }

    }


    public function settings_init()
    {
        register_setting(IO_PLUS_SLUG_OPTIONS, IO_PLUS_SLUG_OPTIONS);

        $options = iop_options();
        $main_page_id = get_var($options['main_page']);
        //Update link main page
        if (!empty($main_page_id)) {
            update_option('io_plus_main_page_link', get_permalink($main_page_id));
        }

    }


}












