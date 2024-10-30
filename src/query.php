<?php

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Query {

	public $host = 'https://ioplus.ca/api/ioplus/api';
	private $key = '';


	function __construct() {

		$this->key = get_option( 'io_plus_activate_key', '' );
	}

	public function activate( $business = array() ) {

		if ( ! empty( $this->key ) ) {
			return false;
		}
		$data = array(
			'action'      => 'activate',
			'site_domain' => home_url()
		);

		$activate = $this->Request( $data );

		if ( ! empty( $activate ) ) {
			update_option( 'io_plus_activate_key', sanitize_text_field( $activate['key'] ) );
			update_option( 'io_plus_host_id', sanitize_text_field( $activate['host_id'] ) );
		}
	}


	public function get_business( $post_id ) {
		$iop_post_id = get_post_meta( $post_id, 'io_plus_business_id', true );
		if ( empty( $iop_post_id ) ) {
			return false;
		}
		$data = array(
			'id' => $iop_post_id
		);

		return $this->api( 'get_business', $data );
	}

	public function api( $action, $data ) {

		if ( empty( $this->key ) ) {
			return false;
		}
		if ( ! is_array( $data ) ) {
			return false;
		}

		$data['action'] = $action;
		$data['key']    = $this->key;

		return $this->Request( $data );
	}


	public function Request( $data = array() ) {

		if ( empty( $data ) ) {
			return false;
		}
		if ( ! is_array( $data ) ) {
			return false;
		}

		$args = array(
			'method' => 'POST',
			'body'   => $data
		);

		$response = wp_remote_request( $this->host, $args );

		if ( empty( $response ) ) {
			return false;
		}
		$response = $response['body'];

		$response = json_decode( $response, true );

		return $response;
	}


}















