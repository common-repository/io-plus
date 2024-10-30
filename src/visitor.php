<?php

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Visitor
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
        add_action('init', array($this, 'add_post_type_visitor'));

        add_filter('rwmb_meta_boxes', array($this, 'get_meta_boxes'));

    }

    public function add_post_type_visitor()
    {
        $labels = array(
            'name' => _x('Visitor', 'Visitor', 'io-plus'),
            'singular_name' => _x('Visitor', 'Visitor', 'io-plus'),
            'menu_name' => _x('Visitor', 'Visitor', 'io-plus'),
            'name_admin_bar' => _x('Visitor', 'Visitor', 'io-plus'),
            'add_new' => __('Add New', 'io-plus'),
            'add_new_item' => __('Add New Visitor', 'io-plus'),
            'new_item' => __('New Visitor', 'io-plus'),
            'edit_item' => __('Edit Visitor', 'io-plus'),
            'view_item' => __('View Visitor', 'io-plus'),
            'all_items' => __('Visitor', 'io-plus'),
            'search_items' => __('Search Visitor', 'io-plus'),
            'parent_item_colon' => __('Parent Visitor:', 'io-plus'),
            'not_found' => __('No visitor found.', 'io-plus'),
            'not_found_in_trash' => __('No visitor found in Trash.', 'io-plus'),
        );


        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'rewrite' => array('slug' => 'io_plus_visitor'),
            'show_in_rest' => true,
            'show_in_menu' => 'io_plus'
        );


        register_post_type('io_plus_visitor', $args);
    }

    /**
     * Create metaboxes for projects and media custom post type.
     * @return array
     */
    public function get_meta_boxes($meta_boxes)
    {
        $post_id = rget('post');
        $business = get_post_meta($post_id, 'business_id');
        $visit = get_post_meta($post_id, 'visit');
        $html_business = '';
        $html_visit = '';
        if (is_array($business)) {

            foreach ($business as $item) {
                $html_business .= "<span>" . esc_html($item) . "</span> / ";
            }

        }
        if (is_array($visit)) {
            $id_event = array();
            $html_visit .= '<table>';
            $html_visit .= '<tr><td>' . esc_html__('Business', 'io-plus') . '</td><td>' . esc_html__('Time', 'io-plus') . '</td><td>' . esc_html__('Event', 'io-plus') . '</td></tr>';
            foreach ($visit as $item) {

                $bPost = get_post($item['business']);
                $name = $bPost->post_title;
                if (strlen($name) > 20) $name = mb_substr($name, 20) . '...';
                $html_visit .= "<tr>";
                $html_visit .= '<td><a href="/wp-admin/post.php?post=' . $item['business'] . '&action=edit" target="_blink">' . esc_html($name) . '</a></td>';
                $html_visit .= "<td>" . date('Y-m-d H:i:s', $item['time']) . "</td> ";
                if (empty($id_event[$item['business']])) {
                    $text_event = esc_html__('entered', 'io-plus');
                    $id_event[$item['business']] = true;
                } else {
                    $text_event = esc_html__('left', 'io-plus');
                    $id_event[$item['business']] = null;
                }
                $html_visit .= "<td>" . esc_html($text_event) . "</td>";
                $html_visit .= "</tr>";

                if (empty($id_event[$item['business']])) {
                    $html_visit .= '<tr><td></td><td></td><td>.</td></tr>';
                }
            }
            $html_visit .= '</table>';

        }

        $fields = array(


            array(
                'id' => 'client_id',
                'type' => 'custom_html',
                'name' => esc_html__('Client ID', 'io-plus'),
                'std' => esc_html__(get_post_meta($post_id, 'client_id', true))
            ),
            /*array(
                'id'   => 'business_id',
                'type' => 'custom_html',
                'name' => esc_html__( 'Business ID', 'io-plus' ),
                'std'  => $html_business
            ),*/

            array(
                'id' => 'visit',
                'type' => 'custom_html',
                'name' => esc_html__('Visit', 'io-plus'),
                'std' => $html_visit
            ),
            array(
                'id' => 'user_email',
                'type' => 'text',
                'name' => esc_html__('Email', 'io-plus'),
            ),
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
                'id' => 'info',
                'type' => 'custom_html',
                'name' => esc_html__('Family Name', 'io-plus'),
                'std' => esc_html__(print_r(get_post_meta($post_id, 'user_info'), true))
            ),


        );
        $employee_id = get_post_meta($post_id, 'employee_id', true);
        if (!empty($employee_id)) {
            $fields[] = array(
                'id' => 'employee_id',
                'type' => 'custom_html',
                'name' => esc_html__('Employee', 'io-plus'),
                'std' => '<a href="/wp-admin/post.php?post=' . esc_html($employee_id) . '&action=edit">' . esc_html__('Show Employee', 'io-plus') . '</a>'
            );
        }

        $meta_boxes[] = array(
            'id' => 'Visitor Details',
            'title' => esc_html__('Visitor Details', 'io-plus'),
            'post_types' => array('io_plus_visitor'),
            'context' => 'normal',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => $fields


        );


        return $meta_boxes;

    }

}
