<?php


namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Employee
{

    /**
     * Enqueue constructor.
     *
     * @since  1.0.0
     * @access public
     */
    public function __construct()
    {

    }

    /**
     * Init.
     */
    public function init()
    {
        add_action('init', array($this, 'add_post_type_employee'));

        add_filter('rwmb_meta_boxes', array($this, 'get_meta_boxes'));

        add_action('save_post_io_plus_employee', array($this, 'create_employee'), 10);
    }

    public function add_post_type_employee()
    {
        $labels = array(
            'name' => _x('Employee', 'Employee', 'io-plus'),
            'singular_name' => _x('Employee', 'Employee', 'io-plus'),
            'menu_name' => _x('Employee', 'Employee', 'io-plus'),
            'name_admin_bar' => _x('Employee', 'Employee', 'io-plus'),
            'add_new' => __('Add New', 'io-plus'),
            'add_new_item' => __('Add New Employee', 'io-plus'),
            'new_item' => __('New Employee', 'io-plus'),
            'edit_item' => __('Edit Employee', 'io-plus'),
            'view_item' => __('View Employee', 'io-plus'),
            'all_items' => __('Employee', 'io-plus'),
            'search_items' => __('Search Employee', 'io-plus'),
            'parent_item_colon' => __('Parent Employee:', 'io-plus'),
            'not_found' => __('No employee found.', 'io-plus'),
            'not_found_in_trash' => __('No employee found in Trash.', 'io-plus'),
        );


        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => 5,
            'rewrite' => array('slug' => 'io_plus_employee'),
            'show_in_rest' => true,
            'show_in_menu' => 'io_plus'
        );


        register_post_type('io_plus_employee', $args);
    }


    /**
     * Create metaboxes for projects and media custom post type.
     * @return array
     */
    public function get_meta_boxes($meta_boxes)
    {
        $post_id = rget('post');


        $user_role = get_post_meta($post_id, 'user_type', true);

        $fields = array(


            array(
                'id' => 'user_name',
                'type' => 'custom_html',
                'name' => esc_html__('Name', 'io-plus'),
                'std' => esc_html__(get_post_meta($post_id, 'user_name', true))
            ),
            array(
                'id' => 'user_given_name',
                'type' => 'custom_html',
                'name' => esc_html__('Given Name', 'io-plus'),
                'std' => esc_html__(get_post_meta($post_id, 'user_given_name', true))
            ),
            array(
                'id' => 'user_family_name',
                'type' => 'custom_html',
                'name' => esc_html__('Family Name', 'io-plus'),
                'std' => esc_html__(get_post_meta($post_id, 'user_family_name', true))
            ),
            array(
                'id' => 'user_email',
                'type' => 'custom_html',
                'name' => esc_html__('Email', 'io-plus'),
                'std' => esc_html__(get_post_meta($post_id, 'user_email', true))
            ),
            array(
                'id' => 'user_type',
                'type' => 'select',
                'name' => esc_html__('Role', 'io-plus'),
                'options' => array(
                    $user_role => $user_role,
                    'employee' => 'employee',
                    'manager' => 'manager',
                    'owner' => 'owner',
                )
            ),
            array(
                'id' => 'user_client',
                'type' => 'custom_html',
                'name' => esc_html__('Client id', 'io-plus'),
                'std' => esc_html__(get_post_meta($post_id, 'user_client', true))
            ),


        );

        $business_id = get_post_meta($post_id, 'business_id');

        if (!empty($business_id)) {
            $html = '';

            foreach ($business_id as $item) {

                $bs_post = get_post($item);
                if (empty($bs_post)) {
                    continue;
                }
                $business_main_id = $bs_post->post_parent;
                $business_main = get_post($business_main_id);
                if (empty($business_main)) {
                    continue;
                }
                $html .= '<a href="/wp-admin/post.php?post=' . esc_attr($item) . '&action=edit">' . esc_html__($business_main->post_title, 'io-plus') . '</a> ';

            }

            $fields[] = array(
                'id' => 'business_id',
                'type' => 'custom_html',
                'name' => esc_html__('Business', 'io-plus'),
                'std' => $html
            );
        }

        $meta_boxes[] = array(
            'id' => 'Employee Details',
            'title' => esc_html__('Employee Details', 'io-plus'),
            'post_types' => array('io_plus_employee'),
            'context' => 'normal',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => $fields


        );


        return $meta_boxes;

    }

    public function create_employee($post_id)
    {
	    if ( ! empty( $_POST['user_type'] ) ) {
		    update_post_meta( $post_id, 'user_type', post_variables('user_type') );
	    }
    }
}
