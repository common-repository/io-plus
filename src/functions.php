<?php
/**
 *
 * @package IO-PLUS/Functions
 */

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Plugin functions
 *
 * @since  1.0.0
 */


//Simple template connection
function inc_template($name)
{

    $file_path = IO_PLUS_PATH . 'templates/' . esc_attr($name) . '.php';
    if (file_exists($file_path) === true) {
        include($file_path);
    }

}

//Get request $_POST
function post_variables($key, $value = '')
{

	if ( ! empty( $_POST[ $key ] ) ) {
		$value = sanitize_text_field( $_POST[ $key ] );
	}

	return $value;
}

//Get request $_GET
function rget($key, $value = '')
{

    if (!empty($_GET[$key])) {
	    $value = sanitize_text_field($_GET[ $key ]);
    }

	return $value ;
}

//Get variable
function get_var( &$value, $default = '' ) {

	if ( empty( $value ) ) {
		$value = $default;
	}
	if(!is_array($value)) $value = sanitize_text_field( $value );
	
	return $value;
}

function iop_options() {
	$options = get_option( IO_PLUS_SLUG_OPTIONS, true );

	if ( empty( $options ) || ! is_array( $options ) ) {
		$options = array();
	}

	return $options;
}


function iop_option_partner() {
	$partner = false;
	$options = iop_options();
	if ( ! empty( $options['partner'] ) ) {
		$partner = true;
	}

	return $partner;
}

function iop_search_post_in_metabox( $type, $meta_key, $meta_value ) {

	$post = get_posts( array(
		'post_type'      => $type,
		'posts_per_page' => - 1,
		'meta_query'     => array(
			array(
				'key'     => $meta_key,
				'value'   => $meta_value,
				'compare' => 'LIKE'
			)
		),
	) );

	if ( empty( $post ) ) {
		return false;
	}

	return $post;
}


function iop_is_main_page() {

	$result = false;

	$main_page_link = get_option( 'io_plus_main_page_link' );

	if ( ! empty( $main_page_link ) ) {

		if ( home_url() . $_SERVER['REQUEST_URI'] === $main_page_link ) {
			$result = true;
		}
	}

	if ( ! empty( $_GET['io_plus_page_settings'] ) ) {
		$result = true;
	}

	return $result;
}


function iop_is_business_page_start() {

	$result = false;

	if ( strpos( $_SERVER['REQUEST_URI'], '/io/' ) === 0 ) {
		$result = true;
	}

	return $result;
}

function iop_is_business_page() {

	$result = false;

	if ( get_post_type( get_the_ID() ) == 'io_plus_business' && ! is_admin() ) {
		$result = true;
	}

	return $result;
}





