<?php

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Questions
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
        add_action('init', array($this, 'add_post_type_question'));

        add_filter('rwmb_meta_boxes', array($this, 'get_meta_boxes'));

		add_action('save_post_io_plus_question', array($this, 'save_question'), 10);


    }

    public function add_post_type_question()
    {
        $labels = array(
            'name' => _x('Question', 'Question', 'io-plus'),
            'singular_name' => _x('Question', 'Question', 'io-plus'),
            'menu_name' => _x('Questions', 'Question', 'io-plus'),
            'name_admin_bar' => _x('Question', 'Question', 'io-plus'),
            'add_new' => __('Add New', 'io-plus'),
            'add_new_item' => __('Add New Question', 'io-plus'),
            'new_item' => __('New Question', 'io-plus'),
            'edit_item' => __('Edit Question', 'io-plus'),
            'view_item' => __('View Question', 'io-plus'),
            'all_items' => __('Question', 'io-plus'),
            'search_items' => __('Search Question', 'io-plus'),
            'parent_item_colon' => __('Parent Question:', 'io-plus'),
            'not_found' => __('No question found.', 'io-plus'),
            'not_found_in_trash' => __('No question found in Trash.', 'io-plus'),
        );


        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => 8,
            'rewrite' => array('slug' => 'io_plus_question'),
            'show_in_rest' => true,
            'show_in_menu' => 'io_plus'
        );


        register_post_type('io_plus_question', $args);
    }


    /**
     * Create metaboxes for projects and media custom post type.
     * @return array
     */
    public function get_meta_boxes($meta_boxes)
    {
        $post_id = rget('post');



        $fields = array(


            array(
                'id' => 'state',
                'type' => 'select',
                'name' => esc_html__('State', 'io-plus'),
                'options' => array(
                    'fever' => esc_html__('Fever', 'io-plus'),
                    'visit' => esc_html__('Visitor', 'io-plus'),
                    'family_positive' => esc_html__('Family Positive', 'io-plus'),
                )
            ),
			 array(
                'id' => 'test',
                'type' => 'text',
                'name' => esc_html__('test', 'io-plus'),
            ),


        );



        $meta_boxes[] = array(
            'id' => 'Question Question',
            'title' => esc_html__('Question Details', 'io-plus'),
            'post_types' => array('io_plus_question'),
            'context' => 'normal',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => $fields


        );


        return $meta_boxes;

    }

	public function save_question($post_id){
		if (!empty($_POST['state'])) {
			update_post_meta( $post_id, 'state', post_variables('state') );
        }
	}


}
