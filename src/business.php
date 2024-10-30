<?php
/**
 * PostType
 */

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Business
{


    public function __construct()
    {

    }

    /**
     * Run all hooks.
     */
    public function init()
    {
        add_action('init', array($this, 'add_post_type_business'));
        add_filter('rwmb_meta_boxes', array($this, 'get_meta_boxes'));

        add_action( 'save_post_io_plus_business', array( &$this, 'save_business' ), 10 );


    }

    public function add_post_type_business()
    {

        $labels = array(
            'name' => _x('Business', 'Business', 'io-plus'),
            'singular_name' => _x('Business', 'Business', 'io-plus'),
            'menu_name' => _x('Business', 'Business', 'io-plus'),
            'name_admin_bar' => _x('Business', 'Business', 'io-plus'),
            'add_new' => __('Add New', 'io-plus'),
            'add_new_item' => __('Add New Business', 'io-plus'),
            'new_item' => __('New Business', 'io-plus'),
            'edit_item' => __('Edit Business', 'io-plus'),
            'view_item' => __('View Business', 'io-plus'),
            'all_items' => __('Business', 'io-plus'),
            'search_items' => __('Search Business', 'io-plus'),
            'parent_item_colon' => __('Parent Business:', 'io-plus'),
            'not_found' => __('No business found.', 'io-plus'),
            'not_found_in_trash' => __('No business found in Trash.', 'io-plus'),
        );


        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'menu_position' => 5,
            'rewrite' => array('slug' => 'io'),
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_in_menu' => 'io_plus',
            'supports' => array(
                'title',
                'editor',
                'page-attributes',
            )
        );


        register_post_type('io_plus_business', $args);


    }

    /**
     * Create metaboxes for projects and media custom post type.
     * @return array
     */
    public function get_meta_boxes($meta_boxes)
    {

        $post_id = rget('post');

        $api = new Query;
        $get_business = $api->get_business($post_id);
        if (empty($get_business)) $get_business = array();

        $fields = array(

	        array(
		        'id'   => 'business',
		        'type' => 'text',
		        'name' => esc_html__( 'Business', 'io-plus' ),
		        'std'  => get_var( $get_business['business'] ),
	        ),
	        array(
		        'id'   => 'address',
		        'type' => 'text',
		        'name' => esc_html__( 'Address', 'io-plus' ),
		        'std'  => get_var( $get_business['address'] ),
	        ),
	        array(
		        'id'   => 'pin_code',
		        'type' => 'text',
		        'name' => esc_html__( 'Pin Code', 'io-plus' ),
		        'std'  => get_var( $get_business['pin_code'] ),
	        ),
	        array(
		        'id'   => 'occupancy',
		        'type' => 'text',
		        'name' => esc_html__( 'Occupancy', 'io-plus' ),
		        'std'  => get_var( $get_business['occupancy'] ),
	        ),
	        array(
		        'id'   => 'emergency_number',
		        'type' => 'text',
		        'name' => esc_html__( 'Emergency Number', 'io-plus' ),
		        'std'  => get_var( $get_business['emergency_number'] ),
	        ),
	        array(
		        'id'   => 'visitors_count',
		        'type' => 'text',
		        'name' => esc_html__( 'Visitors', 'io-plus' ),
		        'std'  => get_var( $get_business['visitors_count'] ),
	        ),


	        array(
		        'id'   => 'rating',
		        'type' => 'custom_html',
		        'name' => esc_html__( 'Rating', 'io-plus' ),
		        'std'  => get_var( $get_business['rating'] ),
	        ),


        );

	    $owner = get_post_meta( $post_id, 'owner', true );

	    if ( ! empty( $owner ) ) {
		    $fields[] = array(
			    'id'   => 'owner',
			    'type' => 'custom_html',
			    'name' => esc_html__( 'Owner', 'io-plus' ),
			    'std'  => '<a href="/wp-admin/post.php?post=' . esc_attr( $owner ) . '&action=edit">' . esc_html__( 'Show owner', 'io-plus' ) . '</a>'
		    );
	    }

	    /*$io_plus_business_id = get_post_meta($post_id, 'io_plus_business_id', true);

		$fields[] = array(
			'id' => 'io_plus_business_id',
			'type' => 'custom_html',
			'name' => esc_html__('io_plus_business_id', 'io-plus'),
			'std' => print_r($io_plus_business_id,true)
		);


		$fields[] = array(
			'id' => 'get_business',
			'type' => 'custom_html',
			'name' => esc_html__('get_business', 'io-plus'),
			'std' => print_r($get_business,true)
		);*/


        $meta_boxes[] = array(
	        'id'         => 'business_details',
	        'title'      => esc_html__( 'Business Details', 'io-plus' ),
	        'post_types' => array( 'io_plus_business' ),
	        'context'    => 'normal',
	        'priority'   => 'default',
	        'autosave'   => 'false',
	        'fields'     => $fields


        );


	    return $meta_boxes;

    }


	public function save_business( $post_id ) {

		$iop_post_id = get_post_meta( $post_id, 'io_plus_business_id', true );

		$data = array(
			'id' => $iop_post_id,
		);

		if ( ! empty( $_POST['occupancy'] ) ) {
			$data['occupancy'] = post_variables('occupancy');
		}
		if ( ! empty( $_POST['emergency_number'] ) ) {
			$data['emergency_number'] = post_variables('emergency_number');
		}
		if ( ! empty( $_POST['visitors_count'] ) ) {
			$data['visitors_count'] = post_variables('visitors_count');
		}

		if ( ! empty( $_POST['visitors_count'] ) ) {
			$data['visitors_count'] = post_variables('visitors_count');
		}

		$api = new Query;
		$api->api( 'save_settings_business', $data );


	}


}


